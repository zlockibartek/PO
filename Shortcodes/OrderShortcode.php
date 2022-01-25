<?php

namespace src\Shortcodes;

use DateTime;
use src\Controller;
use src\DBManager\DBManager;
use src\DBManager\Tables\Address;
use src\DBManager\Tables\Note;
use src\DBManager\Tables\OrderEntity;
use src\DBManager\Tables\OrderPosition;

class OrderShortcode extends Controller
{

	public $tag = 'order';

	function handler($atts)
	{

		if ($_POST) {
			if (get_current_user_id() == 0 && $_POST['price'] > 100) {
				$this->renderHTML('message', ['message' => "Przy zamówieniach powyżej 100zł musisz być zalogowany!", 'status' => 'danger']);
				die();
			}
			$this->summary();
			return;
		}
		
		$this->enqueueScript('order');
		$this->enqueueStyle('product-list');
		$this->enqueueStyle('Products');
		$this->renderHTML('Shortcodes/order');
	}

	public function summary()
	{
		$dbManager = new DBManager();
		$em = $dbManager->entityManager;
		if (isset($_POST['price'])){
			$price = $_POST['price'];
			$weight = $_POST['weight'];
			$products = $_POST['products'];
			unset($_POST['price']);
			unset($_POST['weight']);
			unset($_POST['products']);
		}
		
		if ($_POST) {
			$this->saveToDB($price, $weight, $products);
		}

		$userId = get_current_user_id();
		$user = array(
			'name' => get_user_meta($userId, 'first_name', true),
			'surname' => get_user_meta($userId, 'last_name', true),
			'phone' => get_user_meta($userId, 'phone', true),
		);
		$deliveryAddressId = get_user_meta($userId, 'delivery_address', true);
		$paymentAddressId = get_user_meta($userId,'payment_address', true);
		$deliveryAddress = new Address();
		$paymentAddress = new Address();
		if ($paymentAddressId) {
			$paymentAddress = $em->getRepository('src\DBManager\Tables\Address')->findBy(['id' => $paymentAddressId])[0];
		}
		if ($deliveryAddressId) {
			$deliveryAddress = $em->getRepository('src\DBManager\Tables\Address')->findBy(['id' => $deliveryAddressId])[0];
		}
		$deliverer = $em->getRepository('src\DBManager\Tables\Deliverer')->findAll();
		$taxes = array('5%','8%', '23%');
		$this->enqueueScript('fill-address', null, ['user' => $user, 'paymentAddress' => $paymentAddress, 'deliveryAddress' => $deliveryAddress], 'ORDER');
		$this->renderHTML('Shortcodes/summary-form', array(
			'deliverers' => $deliverer,
			'taxes' => $taxes,
			'price' => $price,
			'weight' => $weight,
			'products' => $products,
		));
	}

	public function saveToDB($price, $weight, $products)
	{
		$dbManager = new DBManager();
		$em = $dbManager->entityManager;
		$order = new OrderEntity();
		$note = new Note();

		$userId = get_current_user_id();
		if ($userId == 0) {
			$this->createUser($em);
			$userId = get_current_user_id();
		}
		$addresses = $this->addAddress($em, $userId);
		$products = explode(';', $products);

		$note->setNIP($_POST['nip']);
		$note->setTax($_POST['tax']);
		$note->setDate(new DateTime('now'));

		$order->setDeliveryAddressId($addresses[0]);
		$order->setPaymentAddressId($addresses[1]);
		$order->setPaymentMethod($_POST['paymentMethod']);
		$order->setPrice($price);
		$order->setWeight($weight);
		$order->setDelivererId($_POST['deliverer']);
		$order->setClientId($userId);
		$order->setPaymentStatus('Nieopłacony');
		$order->setDeliveryStatus('W przygotowaniu');
		$order->setOrderStatus('W realizacji');
		
		$em->persist($order);
		$em->flush();
		
		$note->setOrderId($order->getId());
		$em->persist($note);
		$em->flush();
		$order->setNoteId($note->getId());
		$em->persist($order);
		$em->flush();
		
		foreach ($products as $product) {
			$details = explode(',',$product);
			if (empty($details[0])) {
				continue;
			}
			
			$orderPosition = new OrderPosition();
			$orderPosition->setProductId($details[0]);
			$orderPosition->setOrderId($order->getId());
			$orderPosition->setQuantity($details[1]);
			$product = $em->getRepository('src\DBManager\Tables\Product')->findBy(['id' => $details[0]])[0];
			$product->setQuantity($product->getQuantity() - $details[1]);
			$em->persist($orderPosition);
			$em->flush();
			$em->persist($product);
			$em->flush();
		}
		$this->enqueueScript('clear-basket');
	}

	public function createUser()
	{
		$anonymousMail = time() . '@anonymous.com';
		$userdata = array(
			'user_login' => $anonymousMail,
			'user_pass' => wp_generate_password(),
			'user_email' => $anonymousMail,
			'role' => 'client'
		);
		$new = wp_insert_user($userdata);
		wp_set_current_user($new);
		$userId = get_current_user_id();

		wp_update_user([
			'ID' => $userId,
			'first_name' => $_POST['name'],
			'last_name' => $_POST['surname'],
			'phone' => isset($_POST['phone']) ? $_POST['phone'] : '',
		]);
	}

	public function addAddress($em, $userId)
	{
		$paymentAddressId = get_user_meta($userId, 'payment_address', true);
		$deliveryAddressId = get_user_meta($userId, 'delivery_address', true);
		
		if ($userId == 0 || !isset($_POST['ownPayment']) ) {
			$paymentAddress = new Address();
			$paymentAddress->setTown($_POST['paymentCity']);
			$paymentAddress->setStreet($_POST['paymentStreet']);
			$paymentAddress->setBuilding($_POST['paymentBuilding']);
			$paymentAddress->setPostalCode($_POST['paymentPostalCode']);
			$paymentAddress->setApartament($_POST['paymentApartment']);
			$em->persist($paymentAddress);
			$em->flush();
		} else {
			$paymentAddress = $em->getRepository('src\DBManager\Tables\Address')->findBy(['id' => $paymentAddressId])[0];
		}
		if ($userId == 0 || !isset($_POST['ownDelivery']) ) {
			$deliveryAddress = new Address();
			$deliveryAddress->setTown($_POST['deliveryCity']);
			$deliveryAddress->setStreet($_POST['deliveryStreet']);
			$deliveryAddress->setBuilding($_POST['deliveryBuilding']);
			$deliveryAddress->setPostalCode($_POST['deliveryPostalCode']);
			$deliveryAddress->setApartament($_POST['deliveryApartment']);
			$em->persist($deliveryAddress);
			$em->flush();
		} else {
			$deliveryAddress = $em->getRepository('src\DBManager\Tables\Address')->findBy(['id' => $deliveryAddressId])[0];
		}
		return [$deliveryAddress->getId(), $paymentAddress->getId()];
	}
}

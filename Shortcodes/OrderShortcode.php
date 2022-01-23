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

		if ($_GET) {
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
		if ($_POST) {
			$this->saveToDB();
		}
		$deliverer = $em->getRepository('src\DBManager\Tables\Deliverer')->findAll();
		$taxes = array('5%','8%', '23%');
		$this->enqueueScript('fill-address');
		$this->renderHTML('Shortcodes/summary-form', array(
			'deliverers' => $deliverer,
			'taxes' => $taxes,
		));
	}

	public function saveToDB()
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

		$products = $_GET['order'];
		$products = explode(';', $products);

		$note->setNIP($_POST['nip']);
		$note->setTax($_POST['tax']);
		$note->setDate(new DateTime('now'));

		$order->setDeliveryAddressId($addresses[0]);
		$order->setPaymentAddressId($addresses[1]);
		$order->setPaymentMethod($_POST['paymentMethod']);
		$order->setPrice(100);
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
		if ($userId == 0 || isset($_POST['ownPayment']) || !$paymentAddressId) {
			$paymentAddress = new Address();
			$paymentAddress->setTown($_POST['paymentCity']);
			$paymentAddress->setStreet($_POST['paymentStreet']);
			$paymentAddress->setBuilding($_POST['paymentBuilding']);
			$paymentAddress->setPostalCode($_POST['paymentPostalCode']);
			$paymentAddress->setApartament($_POST['paymentApartment']);
			$em->persist($paymentAddress);
			$em->flush();
		} else {
			$paymentAddress = $em->getRepository('src\DBManager\Tables\Address')->findBy($paymentAddressId);
		}
		if ($userId == 0 || isset($_POST['ownDelivery']) || !$paymentAddressId) {
			$deliveryAddress = new Address();
			$deliveryAddress->setTown($_POST['deliveryCity']);
			$deliveryAddress->setStreet($_POST['deliveryStreet']);
			$deliveryAddress->setBuilding($_POST['deliveryBuilding']);
			$deliveryAddress->setPostalCode($_POST['deliveryPostalCode']);
			$deliveryAddress->setApartament($_POST['deliveryApartment']);
			$em->persist($deliveryAddress);
			$em->flush();
		} else {
			$deliveryAddress = $em->getRepository('src\DBManager\Tables\Address')->findBy($deliveryAddressId);
		}
		return [$deliveryAddress->getId(), $paymentAddress->getId()];
	}
}

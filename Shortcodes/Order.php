<?php

namespace src\Shortcodes;

use src\Controller;
use src\DBManager\DBManager;
use src\DBManager\Tables\Address;
use src\DBManager\Tables\Deliverer;
use src\DBManager\Tables\Note;
use src\DBManager\Tables\OrderEntity;
use src\DBManager\Tables\OrderPosition;

class Order extends Controller
{

	public $tag = 'order';

	function handler($atts)
	{
		if ($_GET) {
			$this->summary();
			return;
		}
		$dbManager = new DBManager();
		$em = $dbManager->entityManager;
		$deliverer = $em->getRepository('src\DBManager\Tables\Deliverer')->findAll();

		$this->enqueueScript('order');
		$this->enqueueStyle('product-list');
		$this->enqueueStyle('Products');
		$this->renderHTML('Shortcodes/order');
	}

	public function summary()
	{
		if ($_POST) {
			$this->saveToDB();
			return;
		}
		$this->enqueueScript('fill-address');
		$this->renderHTML('Shortcodes/summary-form');
	}

	public function saveToDB()
	{
		$dbManager = new DBManager();
		$em = $dbManager->entityManager;
		$order = new OrderEntity();
		$orderPosition = new OrderPosition();
		$note = new Note();

		$userId = get_current_user_id();
		if ($userId == 0) {
			$addressId = $this->createUser($em);
			$userId = get_current_user_id();
		}
		$products = $_GET['order'];
		$products = explode(';', $products);

		$note->setNIP($_POST['nip']);
		$note->setTax($_POST['tax']);
		$note->setDate(time());

		$order->setPaymentMethod($_POST['paymentMethod']);
		$order->setPrice($_POST['price']);
		$order->setDelivererId($_POST['delivery']);
		$order->setNoteId($note->getId());
		$order->setClientId($userId);
		$order->setPaymentStatus('');
		$order->setDeliveryStatus('');

		$em->persist($order);
		$em->flush();


		$note->setOrderId($order->getId());
		$em->persist($note);
		$em->flush();

		foreach ($products as $product) {
			$details = explode($product, ',');
			$orderPosition->setProductId($details[0]);
			$orderPosition->setOrderId($order->getId());
			$orderPosition->setQuantity($details[1]);
			$em->persist($orderPosition);
			$em->flush();
		}
	}

	public function createUser($em)
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

		$address = new Address();
		wp_update_user([
			'ID' => $userId,
			'first_name' => $_POST['name'],
			'last_name' => $_POST['surname'],
			'phone' => isset($_POST['phone']) ? $_POST['phone'] : '',
		]);


		$address->setTown($_POST['city']);
		$address->setStreet($_POST['street']);
		$address->setBuilding($_POST['building']);
		$address->setPostalCode($_POST['postal_code']);
		$address->setApartament($_POST['apartment']);
		$em->persist($address);
		$em->flush();

		return $address->getId();
	}
}

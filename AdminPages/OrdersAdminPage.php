<?php

namespace src\AdminPages;

use DateTime;
use src\Controller;
use src\DBManager\DBManager;

class OrdersAdminPage extends Controller
{
	public function register()
	{
		add_menu_page(
			'Zamówienia',
			'Zamówienia',
			'manage_options',
			'orders',
			array($this, 'handler'),
		);
	}

	public function handler()
	{
		$DBManager = new DBManager();
		$em = $DBManager->entityManager;
		if (isset($_GET['edit'])) {
			$this->edit($_GET['edit']);
			return;
		}
		wp_enqueue_style('datatable', '//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css');
		wp_enqueue_script('datatable', '//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js');
		$this->enqueueScript('product-pagination');
		$orders = $em->getRepository('src\DBManager\Tables\OrderEntity')->findAll();
		
		$this->renderHTML('AdminPages/Orders/order-list', ['backButton' => get_permalink(), 'adminURL' => admin_url('?page=orders'), 'orders' => $orders]);
	}

	public function edit($orderId) {
		$DBManager = new DBManager();
		$em = $DBManager->entityManager;
		$order = $em->getRepository('src\DBManager\Tables\OrderEntity')->findBy(['id' => $orderId])[0];
		$note = $em->getRepository('src\DBManager\Tables\Note')->findBy(['id' => $order->getNoteId()])[0];
		$orderOptions = array('Anulowany', 'Zwrócony', 'W realizacji', 'Zakończony');
		$paymentOptions = array('Opłacone', 'Nieopłacone');
		$deliveryOptions = array('W przygotowaniu', 'Spakowana', 'Wysłana', 'Odebrana');
		
		if ($_POST) {
			$order = $this->updateData($order);
			$em->persist($order);
			$em->flush();
		}
		
		$userId = $order->getClientId();
		$user = array(
			'name' => get_user_meta($userId, 'first_name', true),
			'surname' => get_user_meta($userId, 'last_name', true),
			'nip' => $note->getNIP(),
			'tax' => $note->getTax(),
			'userDate' => $note->getDate()->format('Y-m-d'),
		);
		$this->enqueueScript('show-date');
		$this->renderHTML('AdminPages/Orders/order-details', array(
			'deliveryOptions' => $deliveryOptions,
			'orderOptions' => $orderOptions,
			'paymentOptions' => $paymentOptions,
			'user' => $user,
			'deliverer' => $order->getDelivererId(),
			'order' => $order,
			'backButton' => 'http://po.apache:8081/wp-admin/?page=orders',
		));

	}

	public function updateData($order) {
		$order->setDeliveryStatus($_POST['delivery']);
		$order->setPaymentStatus($_POST['payment']);
		$order->setOrderStatus($_POST['order']);
		$order->setPaymentDate($_POST['paymentDate'] ? new DateTime($_POST['paymentDate']) : null);
		return $order;
	}
}

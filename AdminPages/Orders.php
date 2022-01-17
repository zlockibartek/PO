<?php

namespace src\AdminPages;

use src\Controller;
use src\DBManager\DBManager;

class Orders extends Controller
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
		wp_enqueue_style('datatable', '//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css');
		wp_enqueue_script('datatable', '//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js');
		
		$products = $em->getRepository('src\DBManager\Tables\OrderEntity')->findAll();
		
		$this->renderHTML('AdminPages/order-list', ['backButton' => get_permalink(), 'adminURL' => admin_url('?page=user-data'), 'products' => $products]);
	}
}

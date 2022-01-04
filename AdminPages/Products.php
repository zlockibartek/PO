<?php

namespace src\AdminPages;

use src\Controller;

class Products extends Controller
{
	public function register()
	{
		add_menu_page(
			'Produkty',
			'Produkty',
			'manage_options',
			'user-data',
			array($this, 'handler'),
		);
	}

	public function handler()
	{
		global $wpdb;
		$action = isset($_GET['action']) ? $_GET['action'] : '';
		$adminURL = admin_url('?page=user-data');
		$backButton = get_permalink();
		$sql = "SELECT * from `wp_coffee`";
		$result = $wpdb->get_results($sql);
		switch ($action) {
			case 'add':
				$this->enqueueScript('switch-product');
				$this->renderHTML('AdminPages/product-data');
				break;
			case 'edit':
				$this->renderHTML('AdminPages/product-data');
				break;
			default:
				$this->renderHTML('AdminPages/product-panel', ['backButton' => $backButton, 'adminURL' => $adminURL]);
				break;
		}
	}
}

// function productMenu()
// {
// 	add_menu_page('Produkty', 'Produkty', 'manage_options', 'po/user-data.php', 'showContent', '',);
// 	add_submenu_page('products', 'Dodaj produkt', 'Dodaj produkt', 'manage_options', 'add-products', '');
// }

<?php

namespace src\AdminPages;

use src\Controller;
use src\DBManager\DBManager;
use src\DBManager\Tables\Product;

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
		$DBManager = new DBManager();
		$em = $DBManager->entityManager;

		if (isset($_GET['edit'])) {
			$this->modifyProduct($_GET['edit'], $em);
			return;
		}

		if ($_GET['remove']) {
			$product = $em->find('src\DBManager\Tables\Product', $_GET['remove']);
			$em->remove($product);
			$em->flush();
		}
		
		$products = $em->getRepository('src\DBManager\Tables\Product')->findAll();
		$this->renderHTML('AdminPages/product-panel', ['backButton' => get_permalink(), 'adminURL' => admin_url('?page=user-data'), 'products' => $products]);
	}

	public function modifyProduct($id, $em)
	{
		$countriesTea = $em->getRepository('src\DBManager\Tables\Country')->findBy(['type' => 'tea'], ['name' => 'ASC']);
		$countriesCoffee = $em->getRepository('src\DBManager\Tables\Country')->findBy(['type' => 'coffee'], ['name' => 'ASC']);
		$brewTime = array('1-3 min', '3-5 min', '5-7 min');
		$teaTypes = array('Biała', 'Czarna', 'Pu-erh', 'Rooibos', 'Ulung', 'Zielona' );
		$coffeeTypes = array('Aromatyzowana', 'Klasyczna');
		$weight = array('50g', '150g', '250g');
		$grind = array('Drobne', "Średnie", "Grube");
		$brewQuantity = array(1, 2, 3, 5);
		$type = '';
		
		if ($id != 0) {
			$product = $em->find('src\DBManager\Tables\Product', $id);
			$type = $product->getType();
		} else {
			$product = new Product();
			$this->enqueueScript('switch-product');
		}

		$this->renderHTML('AdminPages/product-data', array(
			'countriesTea' => $countriesTea,
			'countriesCoffee' => $countriesCoffee,
			'product' => $product,
			'backButton' => get_permalink(),
			'type' => $type,
			'brewQuantity' => $brewQuantity,
			'brewTime' => $brewTime,
			'teaTypes' => $teaTypes,
			'weight' => $weight,
			'coffeeTypes' => $coffeeTypes,
			'grind' => $grind,
		));
	}
}

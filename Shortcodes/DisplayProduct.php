<?php

namespace src\Shortcodes;

use src\Controller;
use src\DBManager\DBManager;

class DisplayProduct extends Controller
{

	public $tag = 'displayTee';

	function handler($atts)
	{
		$DBManager = new DBManager();
		$em = $DBManager->entityManager;
		$products = $em->getRepository('src\DBManager\Tables\Product')->findAll();
		$results = [];
		foreach ($products as $product) {
			$quantity = $product->getQuantity();
			if ($quantity == 0) 
				continue;
			$discount = $product->getDiscount();
			$price = $product->getPrice();
			$price = $discount ? $price * ((100 -$discount) / 100) : $price;
			
			$results[] = array(
				'id' => $product->getId(),
				'img' => $product->getPath(),
				'price' => number_format($price, 2),
				'name' => $product->getTitle(),
				'weight' => $product->getWeight(),
				'quantity' => $quantity,
			);
		}
		$this->enqueueStyle('index');
		$this->enqueueStyle('cart');
		$this->enqueueStyle('Header');
		$this->enqueueStyle('Products');
		$this->enqueueStyle('Shopping');
		wp_enqueue_script('font', 'https://use.fontawesome.com/c560c025cf.js');
		$this->enqueueScript('root');
		$this->enqueueScript('catalog');
		$this->enqueueScript('localStorageUtil');
		$this->enqueueScript('Products', null, ['Products' => $results], 'PRODUCTS');
		$this->enqueueScript('Shopping');
		$this->enqueueScript('Header');

		$this->renderHTML('Shortcodes/product-list');
	}

}

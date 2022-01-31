<?php

namespace src\Hooks;

use src\Controller;
use src\DBManager\DBManager;

class AjaxDataHook extends Controller
{
	protected $tag = 'wp_ajax_orders';

	public function handler()
	{
		$cart = $_POST['products'];
		$results = [];
		foreach ($cart as $item) {
			$dbManager = new DBManager();
			$em = $dbManager->entityManager;
			$product = $em->getRepository('src\DBManager\Tables\Product')->findBy(['id' => $item['id']])[0];
			$discount = $product->getDiscount();
			$price = $product->getPrice();
			$price = $discount ? $price * ((100 -$discount) / 100) : $price;
			$results[] = array(
				'id' => $product->getId(),
				'img' => $product->getPath(),
				'price' => number_format($price, 2),
				'name' => $product->getTitle(),
				'weight' => $product->getWeight(),
				'quantity' => $item['count'],
			);
		}
		wp_send_json($results);
	}
}

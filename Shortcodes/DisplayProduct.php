<?php

namespace src\Shortcodes;

use src\Controller;

class DisplayProduct extends Controller
{

	public $tag = 'displayTee';

	function handler($atts)
	{
		global $wpdb;
		$name = $atts['name'];
		$table  = $wpdb->prefix . $name;
		$sql = "SELECT * FROM $table;";
		$results = $wpdb->get_results($sql);
		
		$this->enqueueStyle('product-list');
		$this->enqueueStyle('cart');
		$this->enqueueStyle('Products');
		$this->enqueueStyle('Shopping');
		$this->enqueueStyle('Header');
		wp_enqueue_script('font', 'https://use.fontawesome.com/c560c025cf.js');
		$this->enqueueScript('root');
		$this->enqueueScript('catalog');
		$this->enqueueScript('localStorageUtil');
		$this->enqueueScript('Products', null, ['Products' => array('id' => 1)], 'PRODUCTS');
		$this->enqueueScript('Header');
		$this->enqueueScript('Shopping');

		$this->renderHTML('Shortcodes/product-list', ['results' => $results]);
	}

}

<?php

namespace src\Hooks;

use src\Controller;

class NavbarHook extends Controller {
	protected $tag = 'wp_enqueue_scripts';

	public function handler() {

		wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
		wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js');
		$this->enqueueScript('navbar', null, ['user' => get_current_user_id(), 'url' => 'http://po.apache:8081/zamowienie/', 'main' => substr(get_permalink(), 0, -1) == get_site_url()] , 'NAVBAR');
	}
}
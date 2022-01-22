<?php

namespace src\Hooks;

use src\Controller;

class NavbarHook extends Controller {
	protected $tag = 'wp_enqueue_scripts';

	public function handler() {
		// wp_enqueue_script('font', 'https://use.fontawesome.com/c560c025cf.js');
		// $this->enqueueScript('root');
		// $this->enqueueScript('localStorageUtil');
		// $this->enqueueScript('Header');
		$this->enqueueScript('navbar', null, ['user' => get_current_user_id(), 'url' => 'http://multi.localhost/zamowienie/', 'main' => substr(get_permalink(), 0, -1) == get_site_url()] , 'NAVBAR');
		// $this->enqueueStyle('Header');
	}
}
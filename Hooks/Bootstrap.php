<?php

namespace src\Hooks;

use src\Controller;

class Bootstrap extends Controller {
	protected $tag = 'admin_enqueue_scripts';

	public function handler() {

		wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
		wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js');
	}
}
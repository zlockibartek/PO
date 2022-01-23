<?php

namespace src\Hooks;

use src\Controller;

class RemoveFieldsHook extends Controller {
	protected $tag = 'admin_enqueue_scripts';

	public function handler() {
		$fileName = $_SERVER['PHP_SELF'];
		if (strpos($fileName, 'user-edit') || strpos($fileName, 'profile')) {
			$this->enqueueScript('remove-fields');
		} 
		if (strpos($fileName, 'users')) {
			$this->enqueueScript('remove-roles');
		}
		// echo '<pre>';
		// var_dump($_SERVER);
		// echo '</pre>';
		
	}
}
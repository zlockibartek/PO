<?php

namespace src\Shortcodes;

use src\Controller;
use src\DBManager\DBManager;

class Login extends Controller
{

	public $tag = 'login';

	function handler($atts)
	{
		$this->register();
		$this->renderHTML('Shortcodes/register');
		return;
	}

	public function register()
	{
		if ($_POST) {
			$error = wp_insert_user(array(
				'user_login' => $_POST['login'],
				'user_password' => $_POST['password'],
				'first_name' => $_POST['name'],
				'last_name' => $_POST['surname'],
				'user_email' => $_POST['email'],
				'role' => 'client',
			));
			if (is_int($error)) {
				wp_set_password($_POST['password'], $error);
			}
		}
	}
}

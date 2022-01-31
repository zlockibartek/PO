<?php

namespace src\Shortcodes;

use src\Controller;

class LoginShortcode
 extends Controller
{

	public $tag = 'login';

	function handler($atts)
	{
		if (!$this->register())
			$this->renderHTML('Shortcodes/register');
	}

	public function register()
	{
		
		if ($_POST) {
			$error = wp_insert_user(array(
				'user_login' => $_POST['login'],
				'user_pass' => $_POST['password'],
				'first_name' => $_POST['username'],
				'last_name' => $_POST['surname'],
				'user_email' => $_POST['email'],
				'role' => 'client',
			));
			if (is_int($error)) {
				wp_set_password($_POST['password'], $error);
				$this->renderHTML('message', ['message' => 'Pomyślnie założono konto!', 'status' => 'success']);
				return true;
			}
			else {
				if (username_exists($_POST['login'])) {
					$this->renderHTML('message', ['message' => 'Użytkownik z podanym loginem istnieje w bazie!', 'status' => 'danger']);
					return true;
				}
				$this->renderHTML('message', ['message' => 'Wystąpił problem z utworzeniem konta!', 'status' => 'danger']);
				return true;
			}
		}
	}
}

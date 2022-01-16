<?php

namespace src\Shortcodes;

use src\Controller;

class UserPanel extends Controller
{
	public $tag = 'userPanel';
	public function handler()
	{
		$action = isset($_GET['action']) ? $_GET['action'] : '';
		$this->enqueueScript('root');
		$this->enqueueScript('localStorageUtil');
		$this->enqueueScript('Header');
		$this->enqueueScript('navbar', null, ['user' => get_current_user_id()], 'NAVBAR');
		$this->enqueueStyle('Header');
		$backButton = get_permalink();
		switch ($action) {
			case 'address':
				ob_flush();
				include $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/po/Views/AdminPages/user-data.view.php';
				$html = ob_get_clean();
				break;
			case 'password':
				ob_flush();
				include $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/po/Views/user-password.view.php';
				$html = ob_get_clean();
				break;
			case 'history':
				ob_flush();
				include $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/po/Views/user-orders.view.php';
				$html = ob_get_clean();
				break;
			case 'details':
				ob_flush();
				include $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/po/Views/order-details.view.php';
				$html = ob_get_clean();
				break;
			default:
				ob_flush();
				include $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/po/Views/Shortcodes/user-panel.view.php';
				$html = ob_get_clean();
				break;
		}
		echo $html;
	}
}

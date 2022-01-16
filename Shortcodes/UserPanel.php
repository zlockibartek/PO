<?php

namespace src\Shortcodes;

class UserPanel
{
	public $tag = 'userPanel';
	public function handler()
	{
		$action = isset($_GET['action']) ? $_GET['action'] : '';
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
				include $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/po/Views/AdminPages/user-panel.view.php';
				$html = ob_get_clean();
				break;
		}
		echo $html;
	}
}

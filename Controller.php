<?php

namespace src;
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/po/DBManager/DBManager.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/po/DBManager/Tables/Product.php');

use src\DBManager\EntityManager;
use src\DBManager\Tables\Product;

class Controller
{
	const PATH = __DIR__;
	const VIEWS = __DIR__ . '/Views/';
	const ASSETS = __DIR__ . '/assets/';
	const NAMESPACE = '\src\\';

	protected $DBManager;

	public function __construct()
	{
		$this->addRoles();
	}
	
	public function registerShortcodes()
	{
		$shortcodePath = self::PATH . '\Shortcodes';
		$shortcodes = scandir($shortcodePath);
		foreach ($shortcodes as $shortcode) {
			if (strpos($shortcode, '.php')) {
				$classNamespace = self::NAMESPACE . 'Shortcodes\\' . str_replace('.php', '', $shortcode);
				require_once($shortcodePath . '\\' . $shortcode);
				$class = new $classNamespace();	
				add_shortcode($class->tag, array($class, 'handler'));
			}
		}
	}
	
	public function registerAdminPages()
	{
		$adminPagesPath = self::PATH . '\AdminPages';
		$adminPages = scandir($adminPagesPath);
		foreach ($adminPages as $adminPage) {
			if (strpos($adminPage, '.php')) {
				$classNamespace = self::NAMESPACE . 'AdminPages\\' . str_replace('.php', '', $adminPage);
				require_once($adminPagesPath . '\\' . $adminPage);
				$class = new $classNamespace();	
				add_action('admin_menu', array($class, 'register'));
			}
		}
	}
	
	public function renderHTML($path, $variables = [])
	{
		extract($variables);
		ob_flush();
		include self::VIEWS . $path . '.view.php';
		$html = ob_get_clean();
		echo $html;
	}

	public function enqueueStyle($name, $path = null) {
		\wp_enqueue_style($name, plugins_url('', __FILE__) . '/assets/css/' . $name .'.css');
	}

	public function enqueueScript($name, $path = null, $data = null, $dataName = null) {
		\wp_enqueue_script($name, plugins_url('', __FILE__) . '/assets/js/' . $name .'.js');
		if ($data) {	
			\wp_add_inline_script($name, 'const ' . $dataName . ' = ' . json_encode($data), 'before');	
		}
	}

	private function addRoles() {
		add_role('employee', 'Pracownik', array());	
		add_role('manager', 'Kierownik', array());	
		
	}
}

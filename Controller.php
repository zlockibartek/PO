<?php

namespace src;
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/po/DBManager/DBManager.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/po/DBManager/Tables/Product.php');

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

	public function registerHooks()
	{
		$hookPath = self::PATH . '\Hooks';
		$hooks = scandir($hookPath);
		foreach ($hooks as $hook) {
			if (strpos($hook, '.php')) {
				$classNamespace = self::NAMESPACE . 'Hooks\\' . str_replace('.php', '', $hook);
				require_once($hookPath . '\\' . $hook);
				$class = new $classNamespace();	
				add_action($class->tag, array($class, 'handler'));
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

	public function registerFilters()
	{
		$filtersPath = self::PATH . '\Filters';
		$filters = scandir($filtersPath);
		foreach ($filters as $filter) {
			if (strpos($filter, '.php')) {
				$classNamespace = self::NAMESPACE . 'Filters\\' . str_replace('.php', '', $filter);
				require_once($filtersPath . '\\' . $filter);
				$class = new $classNamespace();	
				add_filter($class->tag, array($class, 'handler'));
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
		\wp_enqueue_script($name, plugins_url('', __FILE__) . '/assets/js/' . $name .'.js', ['jquery'], false, true);
		if ($data) {	
			\wp_add_inline_script($name, 'const ' . $dataName . ' = ' . json_encode($data), 'before');	
		}
	}

	private function addRoles() {
		add_role('employee', 'Pracownik', array(
			'edit_dashboard' => true,
		));	
		add_role('manager', 'Administrator', array(
			'delete_users' => true,
			'create_users' => true,
			'edit_users' => true,
			'remove_users' => true,
			'promote_users' => true,
			'edit_dashboard' => true,
			'read' => true,
		));	
		add_role('client', 'Klient', array());

		$role = get_role('manager');
		
		$role->add_cap('delete_users');
		$role->add_cap('create_users');
		$role->add_cap('edit_users');
		$role->add_cap('remove_users');
		$role->add_cap('promote_users');
		$role->add_cap('edit_dashboard');
		$role->add_cap('manage_options');
		$role->add_cap('manage_links');
		$role->add_cap('edit_posts');
		$role->add_cap('edit_pages');
		$role->add_cap('read');
		$role->add_cap('list_users');
		$role->add_cap('update_core');

		$role = get_role('employee');
		$role->add_cap('read');
		$role->add_cap('manage_options');
		$role->add_cap('edit_dashboard');
		
		
	}
	
}

<?php

namespace src\Hooks;

use src\Controller;

class HideDashboardItems extends Controller
{
	protected $tag = 'admin_init';

	public function handler()
	{
		$userMeta = get_userdata(get_current_user_id());
		$userRoles = $userMeta->roles;
		foreach ($userRoles as $role) {
			if ($role == 'employee') {
				remove_menu_page('edit.php'); // Posts
				remove_menu_page('upload.php'); // Media
				remove_menu_page('link-manager.php'); // Links
				remove_menu_page('edit-comments.php'); // Comments
				remove_menu_page('edit.php?post_type=page'); // Pages
				remove_menu_page('plugins.php'); // Plugins
				remove_menu_page('themes.php'); // Appearance
				remove_menu_page('users.php'); // Users
				remove_menu_page('tools.php'); // Tools
				remove_menu_page('export-personal-data.php'); // Tools
				remove_menu_page('options-general.php'); // Settings
				return;
			}
		}
	}
}

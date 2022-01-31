<?php

namespace src;


/**
 * Plugin name: Projektowanie oprogramowania
 *
 */
global $wpdb;

require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/po/Controller.php');
require_once('vendor/autoload.php');

$controller = new Controller();
$controller->addRoles();
$controller->registerShortcodes();
$controller->registerAdminPages();
$controller->registerFilters();
$controller->registerHooks();

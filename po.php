<?php

namespace src;


/**
 * Plugin name: Projektowanie oprogramowania
 *
 */
global $wpdb;

require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/po/Activate/CreateTables.php');
// require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/po/DBManager/EntityManager.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/po/Controller.php');
require_once('vendor/autoload.php');

$controller = new Controller();
$controller->registerShortcodes();
$controller->registerAdminPages();
$controller->registerHooks();

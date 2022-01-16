<?php
require_once('C:\xampp\htdocs\wordpress_multisite\wp-content\plugins\po\DBManager\DBManager.php');

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use src\DBManager\DBManager;

$DBManager = new DBManager();

return ConsoleRunner::createHelperSet($DBManager->entityManager);
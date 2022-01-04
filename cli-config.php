<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/po/DBManager/EntityManager.php');

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use src\DBManager\EntityManager;

$entityManager = new EntityManager();

return ConsoleRunner::createHelperSet($entityManager);
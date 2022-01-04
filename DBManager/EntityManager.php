<?php

namespace src\DBManager;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager as EM;

require_once "vendor/autoload.php";

class EntityManager
{

	public function __construct()
	{
		$isDevMode = true;
		$proxyDir = null;
		$cache = null;
		$useSimpleAnnotationReader = false;
		$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "\DBManager\Tables"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

		$conn = array(
			'dbname' => 'temp',
			'user' => 'root',
			'password' => '',
			'host' => 'localhost',
			'driver' => 'pdo_mysql'
		);
		echo '<pre>';
		var_dump($config);
		echo '</pre>';

		$entityManager = EM::create($conn, $config);
		echo '<pre>';
		var_dump($entityManager);
		echo '</pre>';
		return $entityManager;
	}
}

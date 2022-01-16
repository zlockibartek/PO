<?php

namespace src\DBManager;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager as EM;

require_once "C:\\xampp\htdocs\wordpress_multisite\wp-content\plugins\po\\vendor\autoload.php";

class DBManager
{
	const PATH = 'C:/xampp/htdocs/wordpress_multisite/wp-content/plugins/po/DBManager/Tables/';

	public $entityManager;
	public function __construct()
	{
		$entities = scandir(self::PATH);
		foreach ($entities as $entity) {
			if (strpos($entity, '.php')) {
				require_once(self::PATH . '\\' . $entity);
			}
		}
		$isDevMode = true;
		$proxyDir = null;
		$cache = null;
		$useSimpleAnnotationReader = false;
		$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . '\Tables'), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
		$conn = array(
			'dbname' => 'temp',
			'user' => 'root',
			'password' => '',
			'host' => 'localhost',
			'driver' => 'pdo_mysql'
		);

		$this->entityManager = EM::create($conn, $config);
	}
}

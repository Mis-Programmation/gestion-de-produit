<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = null;
$cache = null;
$path = dirname(__DIR__). "/src/EntityOrm/";
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(array($path), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

// or if you prefer XML
// database configuration parameters

$conn = array(
//    'path' => './config/db.sqlite',
//    'driver' => 'pdo_sqlite',
//    "user"
    'dbname' => 'gestionProduit',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
);
// obtaining the entity manager
global $entityManager;
$entityManager = EntityManager::create($conn, $config);

function entityManager()
{
    global $entityManager;

    return $entityManager;
}


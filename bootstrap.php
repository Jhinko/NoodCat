<?php
namespace App;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use DotEnv;

require_once "vendor/autoload.php";
require_once 'dotenv.php';

(new DotEnv())->load();

<<<<<<< HEAD
=======

>>>>>>> f7a44a4... premier commit avec ajout des entités Cat, CatBar, Table, Reservation, PicturesCate et leurs annotations Doctrines
// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = __DIR__."/src/Proxies";
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src/Entity"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
$config->setAutoGenerateProxyClasses(1);
// or if you prefer yaml or XML
// $config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
// $config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// database configuration parameters
$conn = array(
    'driver' => 'pdo_mysql',
    'user'     => getenv('APP_USER'),
    'password' => getenv('APP_PASS'),
    'dbname'   => getenv('APP_BDD'),
    'host'     => getenv('APP_HOST')
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);


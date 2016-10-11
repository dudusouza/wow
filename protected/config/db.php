<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

$path = array(MODEL_PATH);
$config = Setup::createConfiguration(IS_DEV);
$driver = new AnnotationDriver(new AnnotationReader(),$path);

AnnotationRegistry::registerLoader('class_exists');
$config->setMetadataDriverImpl($driver);
// or if you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);
// database configuration parameters
$conn = array(
    'dbname' => DB_NAME,
    'user' => DB_USER,
    'port' => DB_PORT,
    'password' => DB_PASS,
    'host' => DB_SERVER,
    'driver' => 'pdo_mysql',
);
//var_dump($conn);die
// obtaining the entity manager

$entityManager = EntityManager::create($conn, $config);


if (defined('SITE_PATH')) {
    \system\core\Conn::loadModels();
    \system\core\Conn::$em = $entityManager;
}

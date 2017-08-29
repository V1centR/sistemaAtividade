<?php

require_once "vendor/autoload.php";
//require_once "Model/ApplicationRun.php";
//require_once "Controller/RegiaoController.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Cache\ArrayCache;


define(VIEW, "./view/");


$paths = array("./Core");
$isDevMode = true;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'info1999',
    'dbname'   => 'asbr',
    'charset'  => 'utf8',
);

$cache = new ArrayCache();
$reader = new AnnotationReader();
$driver = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($reader, $paths);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$config->setMetadataCacheImpl( $cache );
$config->setQueryCacheImpl( $cache );
$config->setMetadataDriverImpl( $driver );
$config->setEntityNamespaces($paths);

$entityManager = EntityManager::create($dbParams, $config);
$platform = $entityManager->getConnection()->getDatabasePlatform();
$platform->registerDoctrineTypeMapping('enum', 'string');

//$region = new \Controller\RegiaoController($entityManager);
//$regiao = $region->getRegions();
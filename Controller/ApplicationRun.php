<?php

namespace Controller;

require_once __DIR__ . "/../vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Cache\ArrayCache;

/**
 * Description of applicationRun
 *
 * @author dev
 */
class ApplicationRun {

    public function databaseRun() {

        $paths = array("./Model/entity");
        $isDevMode = true;

        // the connection configuration
        $dbParams = array(
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => 'info1999',
            'dbname' => 'sistemaAtividade',
            'charset' => 'utf8',
        );

        $cache = new ArrayCache();
        $reader = new AnnotationReader();
        $driver = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($reader, $paths);

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);
        $config->setMetadataDriverImpl($driver);
        $config->setEntityNamespaces($paths);

        $entityManager = EntityManager::create($dbParams, $config);

        return $entityManager;
    }

}

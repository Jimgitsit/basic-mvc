<?php

/**
 * Move this file from the project root to vendor/doctrine/mongodb-odm/tools/sandbox
 * replacing the existing file there. This allows the mongodb command line interface to work.
 */

use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

if (!file_exists($file = 'vendor/autoload.php')) {
    echo($file);
    throw new RuntimeException('Install dependencies to run this script.');
}

$loader = require_once $file;

$loader->add('MongoDocs', "app/models/MongoDocs");

$connection = new Connection(MONGO_DB_HOST);
$config = new Configuration();
$config->setProxyDir('../cache/mongo/proxies');
$config->setProxyNamespace('MongoProxies');
$config->setHydratorDir('../cache/mongo/hydrators');
$config->setHydratorNamespace('MongoHydrators');
$config->setDefaultDB(MONGO_DB_NAME);
$config->setMetadataDriverImpl(AnnotationDriver::create('app/models/MongoDocs'));
AnnotationDriver::registerAnnotationClasses();
$dm = DocumentManager::create($connection, $config);

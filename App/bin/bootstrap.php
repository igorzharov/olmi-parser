<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once __DIR__ . '/../../vendor/autoload.php';

// Create a simple "default" Doctrine ORM configuration for Attributes
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: array(__DIR__."/Entity"),
    isDevMode: true,
);

// database configuration parameters
$conn = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'dbuser',
    'password' => 'root',
    'host'     => 'db',
    'dbname'   => 'rent',
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);
<?php

declare(strict_types=1);

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use App\Parsers\ParserFactory;

require_once '../vendor/autoload.php';

$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: array(__DIR__."/Entity"),
    isDevMode: true,
);

$conn = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'dbuser',
    'password' => 'root',
    'host'     => 'db',
    'dbname'   => 'rent',
);

$entityManager = EntityManager::create($conn, $config);

$parser = ParserFactory::from('ParserSportal')->create($entityManager);

$categories = $parser->parserStart();
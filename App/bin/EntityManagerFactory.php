<?php

namespace App\bin;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

final class EntityManagerFactory
{
    public static function create() : EntityManager
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: array(__DIR__."/../Entity"),
            isDevMode: true,
        );

        $conn = array(
            'driver'   => 'pdo_mysql',
            'user'     => 'dbuser',
            'password' => 'root',
            'host'     => 'db',
            'dbname'   => 'rent',
        );

        return EntityManager::create($conn, $config);
    }
}
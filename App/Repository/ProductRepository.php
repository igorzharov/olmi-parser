<?php

declare(strict_types=1);

namespace App\Repository;

use App\bin\EntityManagerFactory;
use App\Entity\Product;
use Doctrine\ORM\EntityManager;

class ProductRepository
{

    public static function getNotSentProducts(string $parserClassName): array
    {
        return EntityManagerFactory::create()->getRepository(Product::class)->findBy(
            criteria: [
                'status' => true,
                'is_sent' => false,
                'parser_class_name' => $parserClassName
            ]
        );
    }

    public static function getSentProducts(string $parserClassName): array
    {
        return EntityManagerFactory::create()->getRepository(Product::class)->findBy(
            criteria: [
                'status' => true,
                'is_sent' => true,
                'parser_class_name' => $parserClassName
            ]
        );
    }

}
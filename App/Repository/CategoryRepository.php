<?php

declare(strict_types=1);

namespace App\Repository;

use App\bin\EntityManagerFactory;
use App\Entity\Category;
use App\Entity\Product;
use Doctrine\ORM\EntityManager;

class CategoryRepository
{
    public static function getCategories(string $parserClassName): array
    {
        return (EntityManagerFactory::create())->getRepository(Category::class)->findBy(
            criteria: [
                'parser_class_name' => $parserClassName
            ]
        );
    }

}
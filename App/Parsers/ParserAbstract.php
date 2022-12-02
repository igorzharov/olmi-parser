<?php

declare(strict_types=1);

namespace App\Parsers;

use App\bin\EntityManagerFactory;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DomCrawler\Crawler;

abstract class ParserAbstract
{
    protected readonly EntityManager $entityManager;

    public function __construct()
    {
        $this->entityManager = EntityManagerFactory::create();
    }

    abstract public function getProductTitle(Crawler $crawler): string;

    abstract public function getProductDescription(Crawler $crawler): string;

    abstract public function getProductPrice(Crawler $crawler): int;

    abstract public function getProductImage(Crawler $crawler): string;

    public function getParserClassName() : string {
        return (new \ReflectionClass(get_called_class()))->getShortName();
    }
}
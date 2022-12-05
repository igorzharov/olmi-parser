<?php

declare(strict_types=1);

namespace App\Parsers;

use App\bin\EntityManagerFactory;
use App\Entity\Product;
use App\Services\ImageResizeService;
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

    public function imageResize() {

        $productRepository = $this->entityManager->getRepository(Product::class);

        $products = $productRepository->findBy(criteria: ['parser_class_name' => $this->getParserClassName()]);

        /** @var $products Product[] */
        foreach ($products as $product) {

            if ($product->getImage() == '') continue;

            $image = str_replace('catalog/', 'var/image/', $product->getImage());

            $sizes = [80, 275, 550, 1100];

            foreach ($sizes as $size) {
                $imageResizeService = new ImageResizeService($image);
                $imageResizeService->resize($image, $size, $size);
                $imageResizeService->save();
            }

        }

    }

    public function getParserClassName() : string {
        return (new \ReflectionClass(get_called_class()))->getShortName();
    }
}
<?php

declare(strict_types=1);

namespace App\Parsers;

use App\Entity\Category;

use App\Entity\Product;
use App\Helpers\DownloadHtmlTrait;
use App\Helpers\DownloadImageTrait;
use App\Helpers\GetHtmlTrait;
use App\Helpers\LogTrait;
use App\Helpers\PriceToNormalTrait;
use App\Helpers\StringToNormalTrait;
use Symfony\Component\DomCrawler\Crawler;

class ParserSportal extends ParserAbstract
{

    use DownloadHtmlTrait;
    use DownloadImageTrait;
    use GetHtmlTrait;
    use StringToNormalTrait;
    use LogTrait;
    use PriceToNormalTrait;

    private string $siteUrl = 'https://tdsportal.ru';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\Exception\ORMException
     */
    private function parserCategories()
    {
        $categories = ParserSportalCategoriesRepository::getCategories();

        $categoryRepository = $this->entityManager->getRepository(Category::class);

        foreach ($categories as $category) {

            $hasCategory = $categoryRepository->findOneBy(['name' => $category->getName()]);

            if ($hasCategory) {
                continue;
            }

            $category->setParserClassName($this->getParserClassName());

            $this->entityManager->persist($category);
            $this->entityManager->flush($category);
        }
    }

    /**
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\Exception\ORMException
     */
    private function parserGetCategoriesPagesUrls()
    {
        $categoryRepository = $this->entityManager->getRepository(Category::class);

        /** @var $categories Category[] */
        $categories = $categoryRepository->findAll();

        foreach ($categories as $category) {

            $html = $this->getHtml($this->downloadHtml($category->getUrl(), 'Category'));

            $crawler = new Crawler($html);

            $paginationElement = $crawler->filter('.module-pagination');

            $paginationElementMax = $crawler->filter('.module-pagination .nums > a:last-child');

            $category->addPageUrl($category->getUrl());

            if ($paginationElement->count()) {
                $numberOfPages = $paginationElementMax->text();

                for ($i = 2; $i <= $numberOfPages; $i++) {
                    $url = $category->getUrl() . '?PAGEN_1=' . $i;

                    $category->addPageUrl($url);
                }
            }

            $this->entityManager->flush($category);
        }
    }

    /**
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\Exception\ORMException
     */
    private function parserGetCategoriesProductsUrls()
    {
        $categoryRepository = $this->entityManager->getRepository(Category::class);

        /** @var $categories Category[] */
        $categories = $categoryRepository->findAll();

        foreach ($categories as $category) {

            $pagesUrls = $category->getPagesUrls();

            foreach ($pagesUrls as $pageUrl) {
                $html = $this->getHtml($this->downloadHtml($pageUrl, 'CategoriesPages'));

                $crawler = new Crawler($html);

                $crawler->filter('.catalog_block .item_block')->each(function (Crawler $node) use ($category) {
                    $url = $this->siteUrl . $node->filter('.catalog_item_wrapp .catalog_item div .item-title a')->attr(
                            'href'
                        );

                    $category->addProductUrl($url);
                });
            }

            $this->entityManager->flush($category);
        }
    }

    /**
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\Exception\ORMException
     */
    private function parserProducts()
    {
        $categoryRepository = $this->entityManager->getRepository(Category::class);

        /** @var $categories Category[] */
        $categories = $categoryRepository->findAll();

        $productRepository = $this->entityManager->getRepository(Product::class);

        foreach ($categories as $category) {

            $productUrls = $category->getProductUrls();

            foreach ($productUrls as $productUrl) {
                $html = $this->getHtml(
                    $this->downloadHtml(
                        url: $productUrl,
                        foldername: 'Products'
                    )
                );

                $crawler = new Crawler($html);

                $product = new Product();

                $hasProduct = $productRepository->findOneBy(['name' => $this->getProductTitle($crawler)]);

                if ($hasProduct) {
                    continue;
                }

                $product->setName($this->getProductTitle($crawler));

                $product->setDescription($this->getProductDescription($crawler));

                $product->setPrice($this->getProductPrice($crawler));

                $product->setImage($this->getProductImage($crawler));

                $product->setUrl($productUrl);

                $product->setParserClassName($this->getParserClassName());

                $this->entityManager->persist($product);
                $this->entityManager->flush($product);

                $category->addProduct($product);
                $this->entityManager->flush($category);
            }
        }
    }

    /**
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\Exception\ORMException
     */
    public function parserStart()
    {
        $this->parserCategories();
        $this->parserGetCategoriesPagesUrls();
        $this->parserGetCategoriesProductsUrls();
        $this->parserProducts();
    }

    public function getProductTitle(Crawler $crawler): string
    {
        return $this->stringToNormal($crawler->filter('#pagetitle')->text());
    }

    public function getProductDescription(Crawler $crawler): string
    {
        try {
            $description = '';

            $descriptionText = $crawler->filter('.tab-content .detail_text');

            $characteristics = $crawler->filter('.tab-content table.props_list');

            if ($descriptionText->count()) {
                $description .= trim($descriptionText->html());
                $description .= '<br>';
                $description .= '<br>';
            }

            if ($characteristics->count()) {
                $description .= trim($characteristics->html());
            }

            return $description;
        } catch (\Exception $exception) {
            return '';
        }
    }

    public function getProductPrice(Crawler $crawler): int
    {
        $price = 0;

        $price_selector = $crawler->filter(
            '.item_main_info .info_item .middle_info .prices_block .cost > .price .values_wrapper'
        );

        if ($price_selector->count()) {
            $price = $price_selector->text();
        }

        $price_selector = $crawler->filter('.item_main_info .price_value');

        if ($price_selector->count()) {
            $price = $price_selector->text();
        }

        return $this->priceToNormalTrait($price);
    }

    public function getProductImage(Crawler $crawler): string
    {
        try {
            $url = $this->siteUrl . $crawler->filter('.item_main_info .slides a')->attr('href');

            if ($url == '') {
                return '';
            }

            return $this->downloadImage($url, $this->getParserClassName());
        } catch (\Exception $exception) {
            return '';
        }
    }

}
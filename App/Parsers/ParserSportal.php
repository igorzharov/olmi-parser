<?php

declare(strict_types=1);

namespace App\Parsers;

use App\Entity\Category;

use App\Entity\Product;
use App\EntityContainers\CategoriesContainer;
use App\EntityContainers\ProductsContainer;
use App\Helpers\DownloadHtmlTrait;
use App\Helpers\DownloadImageTrait;
use App\Helpers\GetHtmlTrait;
use App\Helpers\LogTrait;
use App\Helpers\PriceToNormalTrait;
use App\Helpers\StringToNormalTrait;
use Doctrine\ORM\EntityManager;
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

    public function __construct(private readonly EntityManager $entityManager)
    {
        parent::__construct();
    }

    private function parserCategories()
    {
        $category = new Category();
        $category->setName('Беговые лыжи 1');
        $category->setUrl('https://tdsportal.ru/catalog/lyzhi/');
        $category->setRemoteId(0);

        $this->entityManager->flush($category);
    }

    private function parserGetCategoriesPageLinks()
    {
        $categories = CategoriesContainer::getInstance()->get();

        foreach ($categories as $category) {
            $html = $this->getHtml($category->getPathHtmlFile());

            $crawler = new Crawler($html);

            $paginationElement = $crawler->filter('.module-pagination');

            $paginationElementMax = $crawler->filter('.module-pagination .nums > a:last-child');

            $category->addPageLink($category->getUrl());

            if ($paginationElement->count()) {
                $numberOfPages = $paginationElementMax->text();

                for ($i = 2; $i <= $numberOfPages; $i++) {
                    $url = $category->getUrl() . '?PAGEN_1=' . $i;

                    $category->addPageLink($url);
                }
            }
        }
    }

    private function parserGetCategoriesProductLinks()
    {
        $categories = CategoriesContainer::getInstance()->get();

        foreach ($categories as $category) {
            $pageLinks = $category->getPageLinks();

            foreach ($pageLinks as $pageLink) {
                $html = $this->getHtml($this->downloadHtml($pageLink, 'CategoriesPages'));

                $crawler = new Crawler($html);

                $crawler->filter('.catalog_block .item_block')->each(function (Crawler $node) use ($category) {
                    $link = $this->siteUrl . $node->filter('.catalog_item_wrapp .catalog_item div .item-title a')->attr(
                            'href'
                        );

                    $category->addProductUrl($link);
                });
            }
        }

        $this->writeLog($categories, '$categories');
    }

    private function parserProducts()
    {
        $categories = CategoriesContainer::getInstance()->get();

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

                $title = $this->getProductTitle($crawler);
                $description = $this->getProductDescription($crawler);
                $price = $this->getProductPrice($crawler);
                $image = $this->getProductImage($crawler);

//                $options = $this->getProductOptions();

                $product = new Product(
                    title: $title,
                    description: $description,
                    price: $price,
                    image: $image,
                    url: $productUrl
                );

                $product->setParserClassName($this->getParserClassName());

                $product->set();

                ProductsContainer::getInstance()->set($product);
            }
        }
    }

    public function parserStart()
    {
        $this->parserCategories();
//        $this->parserGetCategoriesPageLinks();
//        $this->parserGetCategoriesProductLinks();
//        $this->parserProducts();
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

        $price_selector = $crawler->filter('.item_main_info .info_item .middle_info .prices_block .cost > .price .values_wrapper');

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
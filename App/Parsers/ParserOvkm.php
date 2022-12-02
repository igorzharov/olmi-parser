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
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Component\DomCrawler\Crawler;

class ParserOvkm extends ParserAbstract
{

    use DownloadHtmlTrait;
    use DownloadImageTrait;
    use GetHtmlTrait;
    use StringToNormalTrait;
    use LogTrait;
    use PriceToNormalTrait;

    private string $siteUrl = 'https://ovkm74.ru';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function parserStart()
    {
//        $this->parserCategories();
//        $this->parserGetCategories();
//        $this->parserGetCategoriesProductsUrls();
        $this->parserProducts();
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    private function parserCategories()
    {
        $categories = ParserOvkmCategoriesRepository::getCategories();

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
     * @throws OptimisticLockException
     * @throws ORMException
     */
    private function parserGetCategories()
    {
        $categoryRepository = $this->entityManager->getRepository(Category::class);

        /** @var $categories Category[] */
        $categories = $categoryRepository->findAll();

        foreach ($categories as $category) {
            $html = $this->getHtml($this->downloadHtml($category->getUrl(), 'Category'));

            $crawler = new Crawler($html);

            $hasChildCategories = $crawler->filter('.item.iblock.section_item_inner')->count() >= 1;

            if ($hasChildCategories) {
                $crawler->filter('.item.iblock.section_item_inner')->each(function (Crawler $crawler) use ($category) {
                    $url = $this->siteUrl . $crawler->filter('.right-data.section_info .item-title a')->attr('href');

                    $category->addPageUrl($url . '?SHOWALL_1=1');

                    $this->entityManager->flush($category);
                });
            }

            if (!$hasChildCategories) {
                $category->addPageUrl($category->getUrl() . '?SHOWALL_1=1');
                $this->entityManager->flush($category);
            }
        }
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
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

                $crawler->filter('.ajax_load.block .catalog_block .catalog_item_wrapp')->each(
                    function (Crawler $node) use ($category) {
                        $url = $this->siteUrl . $node->filter('.catalog_item div .item_info .item-title a')->attr(
                                'href'
                            );

                        $category->addProductUrl($url);
                    }
                );
            }

            $this->entityManager->flush($category);
        }
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    private function parserProducts()
    {
        $categories = ParserOvkmCategoriesRepository::getCategories();

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

                var_dump($this->getProductTitle($crawler));

                if ($crawler->filter('.slides #photo-0 img')->attr(
                        'src'
                    ) == '/bitrix/templates/aspro_mshop/images/no_photo_medium.png') {
                    continue;
                }

                if ($crawler->filter('.slides #photo-0 img')->count() < 1) {
                    continue;
                }

                if ($crawler->filter('.errortext')->count() >= 1) {
                    continue;
                }

                $product->setName($this->getProductTitle($crawler));

                $product->setDescription($this->getProductDescription($crawler));

                $product->setPrice($this->getProductPrice($crawler));

                try {
                    $product->setImage($this->getProductImage($crawler));
                } catch (\Exception) {

                    $product->setImage('');
                }

                $product->setUrl($productUrl);

                $product->setParserClassName($this->getParserClassName());

                $this->entityManager->persist($product);
                $this->entityManager->flush($product);

                $category->addProduct($product);
                $this->entityManager->flush($category);
            }
        }
    }

    public function getProductTitle(Crawler $crawler): string
    {
        return $this->stringToNormal($crawler->filter('#pagetitle')->text());
    }

    public function getProductDescription(Crawler $crawler): string
    {

        if ($crawler->filter('.tabs1.main_tabs1.tabs-head .current')->attr('id') == 'product_reviews_tab') {
            return '';
        }

        if ($crawler->filter('.tabs_content.tabs-body .detail_text')->count()) {

            return $crawler->filter('.tabs_content.tabs-body .detail_text')->html();

        }

        return '';
    }

    public function getProductPrice(Crawler $crawler): int
    {
        if ($crawler->filter(
            '.values_wrapper .price_value'
        )->count() == 0) {
            return 0;
        }

        $price = $crawler->filter(
            '.values_wrapper .price_value'
        )->text();

        return $this->priceToNormalTrait($price);
    }

    public function getProductImage(Crawler $crawler): string
    {
        $url = $this->siteUrl . $crawler->filter('#photo-0 a')->attr('href');

        return $this->downloadImage($url, $this->getParserClassName());
    }

}
<?php

declare(strict_types=1);

namespace App\Services;

use App\Parsers\ParserFactory;
use App\Repository\CategoryRemoteRepository;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use App\Repository\ProductSenderRepository;

class ProductService
{
    private ProductRepository $productRepository;

    private ProductSenderRepository  $sender;
    private CategoryRepository       $categoryRepository;
    private CategoryRemoteRepository $categoryRemoteRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();

        $this->categoryRepository = new CategoryRepository();

        $this->categoryRemoteRepository = new CategoryRemoteRepository();

        $this->sender = new ProductSenderRepository();
    }

    public function send($parserClassName)
    {
        $products = $this->getProducts();

        $start = microtime(true);

        $data = $this->generateData($products, $parserClassName);

        echo 'Сформировал данные для отправки - ' . round(microtime(true) - $start, 3) . ' сек.' . PHP_EOL;

        $this->sender->addProducts($data);
    }

    private function getProducts(): array
    {
        return $this->productRepository->getProducts();
    }

    private function generateData($products, $parserClassName): array
    {
        $dateNow = date('Y-m-d H:i:s');

        $data = [];

        $parser = ParserFactory::from($parserClassName)->create();

        $categoryMatching = $parser->getConfig()->categoryMatching;

        $categoriesPath = $this->categoryRepository->getCategoriesPath();
        $categoriesRemotePath = $this->categoryRemoteRepository->getCategoriesPath();

        foreach ($products as $index => $product)
        {
            $data[] = ['id' => $product['product_id'], 'name' => $product['title'], 'description' => $product['description'], 'meta_title' => 'Купить ' . $product['title'] . ' в Челябинске - ТК ОРБИТА', 'meta_description' => 'Онлайн каталог товаров торгового центра Орбита. Более 110 продавцов, тысячи товаров по низкой цене. Работает доставка курьером и самовывоз. Заказывай онлайн', 'model' => '', 'location' => 'ТК Орибта - Свердловский тракт, 8 - 101 секция; 1 этаж', 'quantity' => 100, 'stock_status_id' => 1, 'image' => $product['image'], 'shipping' => 1, 'price' => $product['price'], 'tax_class_id' => 0, 'date_available' => $dateNow, 'moderate_status' => 1, 'date_added' => $dateNow, 'date_modified' => $dateNow, 'id_external' => $product['product_id'], 'store_id' => 0, 'layout_id' => 1, 'language_id' => 1, 'renter_id' => 68, 'user_id' => 79, 'status' => 1, 'category_id' => MapperService::map($categoryMatching, $categoriesPath, $categoriesRemotePath, $product['category_id'])];
        }

        return $data;
    }
}
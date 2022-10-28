<?php

declare(strict_types=1);

namespace App\Services;

use App\Entity\Category;
use App\Entity\Product;
use App\Parsers\ParserFactory;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;

class ProductDataFactoryService
{
    public function getGeneratedData(string $parserClassName): array
    {
        $data = [];

        $start = microtime(true);

        $categories = CategoryRepository::getCategories($parserClassName);

        /** @var $categories Category[] */
        foreach ($categories as $category)
        {
            $products = $category->getProducts();

            $categoryId = 466;

            /** @var $categories Product[] */
            foreach ($products as $product) {

                $data[] = $this->getPreparedData($product, $categoryId);

            }
        }

        echo 'Сформировал данные для отправки - ' . round(microtime(true) - $start, 3) . ' сек.' . PHP_EOL;

        return $data;
    }

    private function getPreparedData(Product $product, int $categoryId) : array {

        $metaTitle = 'Купить ' . $product->getName() . ' в Челябинске - ТК ОРБИТА';

        $metaDescription = 'Онлайн каталог товаров торгового центра Орбита. Более 110 продавцов, тысячи товаров по низкой цене. Работает доставка курьером и самовывоз. Заказывай онлайн';

        $location = 'ТК Орибта - Свердловский тракт, 8';

        $quantity = 100;

        $date = date('Y-m-d H:i:s');

        $renterId = 100;

        $userId = 1;

        return [
            'name' => $product->getName(),
            'description' => $product->getDescription(),
            'meta_title' => $metaTitle,
            'meta_description' => $metaDescription,
            'model' => $product->getName(),
            'location' => $location,
            'quantity' => $quantity,
            'stock_status_id' => 1,
            'image' => $product->getImage(),
            'shipping' => 1,
            'price' => $product->getPrice(),
            'tax_class_id' => 0,
            'date_available' => $date,
            'moderate_status' => 1,
            'date_added' => $date,
            'date_modified' => $date,
            'id_external' => $product->getId(),
            'store_id' => 0,
            'layout_id' => 1,
            'language_id' => 1,
            'renter_id' => $renterId,
            'user_id' => $userId,
            'status' => 1,
            'category_id' => $categoryId
        ];

    }
}
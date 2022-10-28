<?php

namespace App\Sender;

use App\DB\DBRemote;
use App\Services\ProductDataFactoryService;

class ProductSender
{
    private readonly DBRemote $db;

    public function __construct()
    {
        $this->db = new DBRemote();
    }

    public function send(string $parserName) {

        $data = (new ProductDataFactoryService())->getGeneratedData($parserName);

        $this->sendProducts($data);

    }

    public function sendProducts(array $data)
    {
        $packageData = [];

        $countAddPackages = 0;

        $packageSize = 100;

        $count_packages = round(count($data) / $packageSize);

        foreach ($data as $key)
        {
            $start = microtime(true);

            $product_id = $this->sendProduct($key);

            echo 'Отправил Товар ' . $key['name'] . ' - ' . round(microtime(true) - $start, 3) . ' сек.' . PHP_EOL;

            $key['product_id'] = $product_id;

            $packageData[] = $key;

            if ($count_packages == $countAddPackages)
            {
                $this->sendPackage($packageData);
                echo '!!! Отправил Пакет - ' . round(microtime(true) - $start, 3) . ' сек.' . PHP_EOL;
                $packageData = [];
            }

            if (count($packageData) == $packageSize)
            {
                $start = microtime(true);
                $this->sendPackage($packageData);
                echo '!!! Отправил Пакет - ' . round(microtime(true) - $start, 3) . ' сек.' . PHP_EOL;
                $packageData = [];
                $countAddPackages++;
            }
        }
    }

    private function sendProduct($data): int
    {
        unset($data['id'], $data['name'], $data['description'], $data['meta_title'], $data['meta_description'], $data['renter_id'], $data['category_id'], $data['store_id'], $data['layout_id'], $data['language_id']);

        $this->db->insert('oc_product', $data);

        return $this->db->id();
    }

    private function sendPackage($packageData)
    {
        $this->sendDescriptionPackage($packageData);
        $this->sendImagePackage($packageData);
        $this->sendCategoryPackage($packageData);
        $this->sendStorePackage($packageData);
        $this->sendRenterPackage($packageData);
    }

    private function sendDescriptionPackage($packageData)
    {
        $data = [];

        foreach ($packageData as $key)
        {
            $data[] = ['product_id' => $key['product_id'], 'language_id' => $key['language_id'], 'name' => $key['name'], 'description' => $key['description'], 'meta_title' => $key['meta_title'], 'meta_description' => $key['meta_description']];
        }

        $this->db->insert('oc_product_description', $data);
    }

    private function sendImagePackage($packageData)
    {
        $data = [];

        foreach ($packageData as $key)
        {
            $data[] = ['product_id' => $key['product_id'], 'image' => $key['image'], 'sort_order' => 0];
        }

        $this->db->insert('oc_product_image', $data);
    }

    private function sendCategoryPackage($packageData)
    {
        $data = [];

        foreach ($packageData as $key)
        {

            $categories = $this->db->select('oc_category_path', ['category_id', 'path_id'], [
                'category_id[=]' => $key['category_id'],
                'ORDER' => ['path_id' => 'ASC']
            ]);

            foreach ($categories as $category) {

                $data[] = ['product_id' => $key['product_id'], 'category_id' => $category['path_id']];

            }


        }

        $this->db->insert('oc_product_to_category', $data);
    }

    private function sendStorePackage($packageData)
    {
        $data = [];

        foreach ($packageData as $key)
        {
            $data[] = ['product_id' => $key['product_id'], 'store_id' => $key['store_id']];
        }

        $this->db->insert('oc_product_to_store', $data);
    }

    private function sendRenterPackage($packageData)
    {
        $data = [];

        foreach ($packageData as $key)
        {
            $data[] = ['product_id' => $key['product_id'], 'renter_id' => $key['renter_id']];
        }

        $this->db->insert('oc_product_to_renter', $data);
    }
}
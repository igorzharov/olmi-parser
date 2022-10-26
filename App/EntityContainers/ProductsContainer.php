<?php

namespace App\EntityContainers;

use App\Entity\Product;

class ProductsContainer
{
    private array $products;

    private static ?ProductsContainer $instance = null;

    private function __clone() {}
    private function __construct() {}

    public static function getInstance(): ?ProductsContainer
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function set(Product $product) {
        $this->products[] = $product;
    }

    public function get() : array {
        return $this->products;
    }
}
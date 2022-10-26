<?php

namespace App\EntityContainers;

use App\Entity\Category;

class CategoriesContainer
{
    private array $categories;

    private static ?CategoriesContainer $instance = null;

    private function __clone() {}
    private function __construct() {}

    public static function getInstance(): ?CategoriesContainer
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function set(Category $category) {
        $this->categories[] = $category;
    }

    public function get() : array {
        return $this->categories;
    }
}
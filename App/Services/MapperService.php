<?php

declare(strict_types=1);

namespace App\Services;

use App\Repository\CategoryRemoteRepository;
use App\Repository\CategoryRepository;

class MapperService
{
    public static function map($categoryMatching, $categoriesPath, $categoriesRemotePath, $categoryId) : array
    {

        $index = array_search($categoryId, array_column($categoriesPath, 'category_id'));

        $path = $categoriesPath[$index]['path'];

        $path = explode(',', $path);

        $data = [];

        foreach ($path as $key)
        {
            if (!isset($categoryMatching[$key])) continue;

            $data[] = $key;
        }

        $id = end($data);

        $id = $categoryMatching[$id];

        $index = array_search($id, array_column($categoriesRemotePath, 'category_id'));

        $path = $categoriesRemotePath[$index]['path'];

        return explode(',', $path);
    }
}
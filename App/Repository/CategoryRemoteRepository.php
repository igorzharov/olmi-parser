<?php

declare(strict_types=1);

namespace App\Repository;

use App\DB\DBRemote;

class CategoryRemoteRepository
{
    private DBRemote $db;

    public function __construct()
    {
        $this->db = new DBRemote();
    }

    public function getCategoriesPath(): array
    {
        $query = $this->db->query("SELECT category_id, GROUP_CONCAT(path_id ORDER BY path_id SEPARATOR ',') as 'path' FROM oc_category_path GROUP BY category_id");

        return $query->fetchAll();
    }

    public function getCategoryPath($categoryId): string
    {
        $query = $this->db->query("SELECT category_id, GROUP_CONCAT(path_id ORDER BY path_id SEPARATOR ',') as 'path' FROM oc_category_path WHERE category_id = " . $categoryId);

        return $query->fetch()['path'];
    }


}
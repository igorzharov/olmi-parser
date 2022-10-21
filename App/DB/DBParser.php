<?php

declare(strict_types=1);

namespace App\DB;

use Medoo\Medoo;
use PDO;

class DBParser extends DB
{
    public function __construct()
    {
        $pdo = new PDO('mysql:dbname=rent;host=db', 'dbuser', 'root');

        $this->db = new Medoo(['pdo' => $pdo, 'type' => 'mysql']);
    }
}


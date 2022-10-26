<?php

namespace App;

use App\DB\DBParser;
use App\DB\DBRemote;
use App\Helpers\DownloadHtmlTrait;

require_once 'vendor/autoload.php';

class test
{
    public DBParser $db;

    public function __construct() {
        $this->db = new DBParser();
    }

    use DownloadHtmlTrait;

    public function test()
    {
//        $products = $this->db->select('products', ['product_id','image']);
//
//        foreach ($products as $product)
//        {
//            $image = str_replace('image/', '', $product['image']);
//
//            $this->db->update('products', ['image' => $image], ['product_id' => $product['product_id']]);
//        }

        $this->downloadHtml('https://www.sanopt74.ru/catalog/sidenya_dlya_unitaza/sidene_dlya_unitaza_detskoe_s_ruchkami_dk_ruchki_rozovye_105030/', '/relations1');
    }
}

$test = new test();

$test->test();
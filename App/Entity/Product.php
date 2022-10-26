<?php

declare(strict_types=1);

namespace App\Entity;

use App\DB\DBParser;

class Product extends AbstractEntity
{
    public function __construct(string $title, string $description, int $price, string $image, string $url)
    {
        parent::__construct($title, $url);

        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }

    public function set() {
        (new DBParser())->insert(
            table: 'products',
            data: [
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
                'image' => $this->image,
                'url' => $this->url,
                'parser_class' => $this->parserClassName
            ]
        );
    }

    public function get() : array {
        return (new DBParser())->select(
            table: 'products',
            columns: [
                'title',
                'description',
                'price',
                'image',
                'url',
                'parser_class'
            ],
            where: [
                'remote_id' => $this->remoteId
            ]
        );
    }
}
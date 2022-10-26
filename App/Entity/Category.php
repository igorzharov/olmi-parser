<?php

declare(strict_types=1);

namespace App\Entity;

use App\DB\DBParser;

class Category extends AbstractEntity
{
    private array $pageLinks = [];
    private array $productUrls = [];

    public function __construct(string $title, string $url, int $remoteId)
    {
        parent::__construct($title, $url);

        $this->remoteId = $remoteId;
    }

    public function set()
    {
        (new DBParser())->insert(
            table: 'categories',
            data: [
                'title'        => $this->title,
                'url'          => $this->url,
                'remote_id'    => $this->remoteId,
                'parser_class' => $this->parserClassName
            ]
        );
    }

    public function get(): array
    {
        return (new DBParser())->select(
            table: 'categories',
            columns: [
                'title',
                'url',
                'remote_id',
                'parser_class'
            ],
            where: [
                'remote_id' => $this->remoteId
            ]
        );
    }

    public function addPageLink(string $link)
    {
        $this->pageLinks[] = $link;
    }

    public function getPageLinks(): array
    {
        return $this->pageLinks;
    }

    public function addProductUrl(string $url)
    {
        $this->productUrls[] = $url;
    }

    public function getProductUrls(): array
    {
        return $this->productUrls;
    }
}
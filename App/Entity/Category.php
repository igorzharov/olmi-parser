<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'categories')]
class Category
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $name;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $url;

    #[ORM\Column(type: 'integer')]
    private int $remoteId = 0;

    #[ORM\Column(type: 'json', nullable: true)]
    private ?array $pagesUrls;

    #[ORM\Column(type: 'json', nullable: true)]
    private ?array $productUrls;

    public function __construct(string $name, string $url, int $remoteId)
    {
        $this->name = $name;
        $this->url = $url;
        $this->remoteId = $remoteId;

        $this->relations = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url) : void
    {
        $this->url = $url;
    }

    public function getRemoteId(): int
    {
        return $this->remoteId;
    }

    public function setRemoteId(int $remoteId) : void
    {
        $this->remoteId = $remoteId;
    }

    public function getPagesUrls(): array
    {
        return $this->pagesUrls;
    }

    public function addPageUrl(string $pageUrl) : void
    {
        $this->pagesUrls[] = $pageUrl;
    }

    public function clearPagesUrls()
    {
        $this->pagesUrls = [];
    }

    public function getProductUrls(): array
    {
        return $this->productUrls;
    }

    public function addProductUrl(string $productUrl) : void
    {
        $this->productUrls[] = $productUrl;
    }

    public function clearProductUrls()
    {
        $this->productUrls = [];
    }
}
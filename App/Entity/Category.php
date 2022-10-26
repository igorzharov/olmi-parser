<?php

declare(strict_types=1);

namespace App\Entity;

namespace App\Entity;

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
    private ?array $pages;

    #[ORM\Column(type: 'json', nullable: true)]
    private ?array $productUrls;

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

    public function getPages(): array
    {
        return $this->pages;
    }

    public function setPages(array $pages) : void
    {
        $this->pages = $pages;
    }

    public function getProductUrls(): array
    {
        return $this->pages;
    }

    public function setProductUrls(array $productUrls) : void
    {
        $this->pages = $productUrls;
    }
}
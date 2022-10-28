<?php

declare(strict_types=1);

namespace App\Entity;

use Cassandra\Date;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Query\AST\Functions\CurrentTimeFunction;

#[ORM\Entity]
#[ORM\Table(name: 'products')]
class Product
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $name;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description;

    #[ORM\Column(type: 'integer')]
    private int $price;

    #[ORM\Column(type: 'string', length: 255)]
    private string $image;

    #[ORM\Column(type: 'string', length: 255)]
    private string $url;

    #[ORM\Column(type: 'string', length: 255)]
    private string $parser_class_name;

    #[ORM\Column(type: 'datetime')]
    private DateTime $date_create;

    #[ORM\Column(type: 'datetime')]
    private DateTime $date_modify;

    #[ORM\Column(type: 'boolean')]
    private bool $is_update;

    #[ORM\Column(type: 'boolean')]
    private bool $is_sent;

    #[ORM\Column(type: 'boolean')]
    private bool $status;

    public function __construct()
    {
        $this->date_create = new DateTime();
        $this->date_modify = new DateTime();
        $this->is_update = true;
        $this->is_sent = false;
        $this->status = true;
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

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price) : void
    {
        $this->price = $price;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image) : void
    {
        $this->image = $image;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url) : void
    {
        $this->url = $url;
    }

    public function setParserClassName(string $parserClassName) : void
    {
        $this->parser_class_name = $parserClassName;
    }

    public function getParserClassName() : string
    {
        return $this->parser_class_name;
    }

    public function setCreated(DateTime $created)
    {
        $this->created = $created;
    }

    public function setUpdated(DateTime $updated)
    {
        $this->updated = $updated;
    }

    public function setStatus(bool $status)
    {
        $this->status = $status;
    }

    public function setIsUpdate(bool $isUpdate)
    {
        $this->is_update = $isUpdate;
    }

    public function setIsSent(bool $isSent)
    {
        $this->is_sent = $isSent;
    }

}
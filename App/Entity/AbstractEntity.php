<?php

declare(strict_types=1);

namespace App\Entity;

abstract class AbstractEntity
{
    protected string $title;
    protected string $description;
    protected int $price;
    protected string $image;
    protected string $url;
    protected int $remoteId;

    protected string $parserClassName;
    protected string $pathHtmlFile;
    protected string $type;

    public function __construct(string $title, string $url)
    {
        $this->title = $title;
        $this->url = $url;

        $this->type = (new \ReflectionClass(get_called_class()))->getShortName();
    }

    public function getTitle() : string {
        return $this->title;
    }

    public function setTitle(string $title) {
        $this->title = $title;
    }

    public function getDescription() : string {
        return $this->description ?? '';
    }

    public function setDescription(string $description) {
        $this->description = $description;
    }

    public function getUrl() : string {
        return $this->url;
    }

    public function setUrl(string $url) {
        $this->url = $url;
    }

    public function getRemoteId() : int {
        return $this->remoteId;
    }

    public function setRemoteId(int $remoteId) {
        $this->remoteId = $remoteId;
    }

    public function getPathHtmlFile() : string {
        return $this->pathHtmlFile;
    }

    public function setPathHtmlFile(string $pathHtmlFile) {
        $this->pathHtmlFile = $pathHtmlFile;
    }

    public function getParserClassName() : string {
        return $this->parserClassName;
    }

    public function setParserClassName(string $parserClassName) {
        $this->parserClassName = $parserClassName;
    }
}
<?php

namespace Downloader;
abstract class ProviderAbstract
{
    protected $url;
    protected $name;

    public function __construct($url)
    {
        $this->init($url);
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function init(string $url): void;
}
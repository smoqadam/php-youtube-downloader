<?php

namespace Downloader\Providers;

use Downloader\ProviderAbstract;

class Direct extends ProviderAbstract
{

    public function init(string $url): void
    {
        $this->url = $url;
        $this->name = basename($url);
    }
}
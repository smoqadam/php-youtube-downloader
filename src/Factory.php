<?php

namespace Downloader;

use Downloader\Providers\Direct;
use Downloader\Providers\Youtube;

class Factory
{
    public static function make(string $url): ProviderAbstract
    {
        switch (true) {
            case preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $matches):
                return new Youtube($url);
            default:
                return new Direct($url);
        }
    }
}
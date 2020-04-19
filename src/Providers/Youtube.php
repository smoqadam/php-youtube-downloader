<?php

namespace Downloader\Providers;

use Downloader\ProviderAbstract;
use Smoqadam\Video;

class Youtube extends ProviderAbstract
{
    protected $pattern = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';

    public function init(string $url): void
    {
        $video = new Video($this->getVideoId($url));
        $formats = $video->getFormats();
        print("\nVideo formats");
        foreach ($formats as $index => $format) {
            printf("\n%d: %s - %d", $index + 1, $format->getMimeType(), $format->getSize());
        }
        printf("\nWhich format do you want to download? (default: 1):");
        $i = readline();
        if (!$i) {
            $i = 1;
        }
        $format = $formats[$i - 1];
        $this->url = $format->getUrl();
        $this->name = $video->getDetails()->getTitle();
    }

    private function getVideoId($url)
    {
        preg_match($this->pattern, $url, $match);
        return $match[1];
    }

}
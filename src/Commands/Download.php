<?php

namespace Downloader\Commands;

use Downloader\Downloader;
use Downloader\Factory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Download extends Command
{
    protected static $defaultName = "dl";

    private $arg = 'url';

    protected function configure()
    {
        $this->setDescription("URL")
            ->addArgument($this->arg, InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $url = $input->getArgument($this->arg);
        $output->write("<info>{$url}</info>");
        $downloader = new Downloader(Factory::make($url));
        $downloader->download();
        return 0;
    }
}
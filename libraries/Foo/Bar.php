<?php

use OmekaCli\Application;
use OmekaCli\Command\AbstractCommand;

class Foo_bar extends AbstractCommand
{
    public function getDescription()
    {
        return 'print something to stdout';
    }

    public function getUsage()
    {
        $usage = 'Usage:' . PHP_EOL
               . '    bar' . PHP_EOL
               . PHP_EOL
               . 'Print something to stdout.' . PHP_EOL;

        return $usage;
    }

    public function run($options, $args, Application $application)
    {
        if (!empty($options) || !empty($args)) {
            $this->logger->error($this->getUsage());
            return 1;
        }
        echo 'Hello, omeka-cli!' . PHP_EOL;

        return 0;
    }
}

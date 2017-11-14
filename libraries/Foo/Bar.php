<?php

use OmekaCli\Command\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Foo_Bar extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('foo:bar');
        $this->setAliases(array('bar'));
        $this->setDescription('print something to stdout');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Hello, omeka-cli!');

        return 0;
    }
}

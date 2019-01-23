<?php

namespace Xterr\SupervisorBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Xterr\SupervisorBundle\Contracts\Exporter\IAnnotationSupervisorExporter;

/**
 * Class DumpCommand
 * @package Xterr\SupervisorBundle
 */
class DumpCommand extends Command
{
    protected static $defaultName = 'xterr:supervisor:dump';

    private $_oAnnotationSupervisorExporter;

    public function __construct(IAnnotationSupervisorExporter $oAnnotationSupervisorExporter)
    {
        parent::__construct(NULL);

        $this->_oAnnotationSupervisorExporter = $oAnnotationSupervisorExporter;
    }

    protected function configure()
    {
        $this
            ->setDescription('Dump the supervisor configuration for annotated commands')
            ->addOption('user',   NULL,  InputOption::VALUE_OPTIONAL, 'The desired user to invoke the command as')
            ->addOption('server', NULL, InputOption::VALUE_OPTIONAL,  'Only include programs for the specified server')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $commands = $this->getApplication()->all();
        $output->write($this->_oAnnotationSupervisorExporter->export($commands, $this->parseOptions($input)));
    }
    private function parseOptions(InputInterface $input)
    {
        $options = [];

        if ($user = $input->getOption('user'))
        {
            $options['user'] = $user;
        }

        if ($env = $input->getOption('env'))
        {
            $options['environment'] = $env;
        }

        if ($server = $input->getOption('server'))
        {
            $options['server'] = $server;
        }

        return $options;
    }
}

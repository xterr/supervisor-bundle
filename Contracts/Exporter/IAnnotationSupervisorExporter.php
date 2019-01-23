<?php

namespace Xterr\SupervisorBundle\Contracts\Exporter;

use Symfony\Component\Console\Command\Command;

/**
 * Interface IAnnotationSupervisorExporter
 * @package Xterr\SupervisorBundle\Contracts\Exporter
 */
interface IAnnotationSupervisorExporter
{
    /**
     * @param Command[] $commands
     * @param array $options Runtime options that have been defined
     *
     * @return string The supervisor configuration
     */
    public function export(array $commands, array $options);
}

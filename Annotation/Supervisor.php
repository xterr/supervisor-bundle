<?php

namespace Xterr\SupervisorBundle\Annotation;

use Doctrine\Common\Annotations\Annotation;

/**
 * Class Supervisor
 * @package Xterr\SupervisorBundle\Annotation
 *
 * @Annotation
 * @Target("CLASS")
 */
class Supervisor
{
    /**
     * @var integer
     */
    public $processes;
    /**
     * @var string
     */
    public $params;
    /**
     * @var string
     */
    public $executor;
    /**
     * @var string
     */
    public $server;
}

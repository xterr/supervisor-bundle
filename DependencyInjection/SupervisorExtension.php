<?php

namespace Xterr\SupervisorBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Config\FileLocator;

/**
 * Class SupervisorExtension
 * @package Xterr\SupervisorBundle\DependencyInjection
 */
class SupervisorExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new Configuration(), $configs);
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
        $exporterConfig = isset($config['exporter']) ? $config['exporter'] : array();
        $container->setParameter('xterr.supervisor_bundle.exporter_config', $exporterConfig);
    }
}

<?php

namespace Xterr\SupervisorBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package Xterr\SupervisorBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('supervisor');
        $rootNode
            ->children()
                ->arrayNode('exporter')
                    ->children()
                        ->variableNode('program')->end()
                        ->scalarNode('executor')->example('php')->end()
                        ->scalarNode('console')->example('bin/console')->end()
                        ->scalarNode('default_params')->example('--no-debug')->end()
                        ->arrayNode('extra_commands')
                            ->arrayPrototype()
                                ->children()
                                    ->scalarNode('name')->end()
                                    ->scalarNode('params')->end()
                                    ->scalarNode('processes')->end()
                                    ->scalarNode('executor')->end()
                                    ->scalarNode('server')->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
        return $treeBuilder;
    }
}

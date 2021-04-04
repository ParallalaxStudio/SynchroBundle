<?php

namespace Parallalax\SynchroBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('parallalax_synchro');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        $treeBuilder->getRootNode()
            ->children()
                ->arrayNode('api_provider')
                    ->children()
                        ->arrayNode('memory')
                            ->children()
                                ->arrayNode('users')
                                    ->children()
                                        ->arrayNode('api_user')
                                            ->arrayPrototype()
                                                ->children()
                                                    ->scalarNode('roles')
                                                    ->defaultValue('ROLE_API')
                                                    ->end()
                                                    ->scalarNode('password')
                                                    ->defaultValue('token')
                                                    ->end()
                                                ->end()
                                            ->end()
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();


        return $treeBuilder;
    }
}

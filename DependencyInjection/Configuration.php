<?php

namespace Jarobe\XeroBundle\DependencyInjection;

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
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('jarobe_xero');

        $rootNode
            ->children()
                ->scalarNode('key')->end()
                ->scalarNode('secret')->end()
                ->scalarNode('private_key')->end()
                ->scalarNode('public_key')->end()
                ->scalarNode('application_type')->end()
                ->scalarNode('user_agent')->end()
                ->scalarNode('oauth_callback')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}

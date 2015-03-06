<?php

namespace Jarobe\XeroBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class JarobeXeroExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $container->setParameter('jarobe_xero.key', $config['key']);
        $container->setParameter('jarobe_xero.secret', $config['secret']);
        $container->setParameter('jarobe_xero.private_key', $config['private_key']);
        $container->setParameter('jarobe_xero.public_key', $config['public_key']);
        $container->setParameter('jarobe_xero.application_type', $config['application_type']);
        $container->setParameter('jarobe_xero.user_agent', $config['user_agent']);
        $container->setParameter('jarobe_xero.oauth_callback', $config['oauth_callback']);
        $container->setParameter('jarobe_xero.account_id', isset($config['account_id']) ? $config['account_id'] : null);
    }
}

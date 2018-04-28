<?php

namespace Bpa\Notifications\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Adds mappings to the notification service
 */
class MappingCompilerPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        $services = $container->findTaggedServiceIds('bpa_notification_mapping');
        $definition = $container->findDefinition('bpa_notifications_service');

        foreach ($services as $service) {
            $definition->addMethodCall('addMapping', new Reference($service['id']));
        }
    }
}

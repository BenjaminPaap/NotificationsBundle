<?php

namespace Bpa\Notifications\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Adds handlers to the notification service
 */
class HandlerCompilerPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        $services = $container->findTaggedServiceIds('bpa_notification_handler');
        $definition = $container->findDefinition('bpa_notifications_service');

        foreach (array_keys($services) as $id) {
            $definition->addMethodCall('addHandler', [new Reference($id)]);
        }
    }
}

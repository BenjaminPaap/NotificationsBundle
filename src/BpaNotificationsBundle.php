<?php

namespace Bpa\Notifications;

use Bpa\Notifications\DependencyInjection\HandlerCompilerPass;
use Bpa\Notifications\DependencyInjection\MappingCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Notification Bundle
 */
class BpaNotificationsBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new HandlerCompilerPass());
    }
}

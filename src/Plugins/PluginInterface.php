<?php


namespace RSFin\Plugins;


use RSFin\ServiceContainerInterface;

interface PluginInterface
{
    public function register(ServiceContainerInterface $container);
}

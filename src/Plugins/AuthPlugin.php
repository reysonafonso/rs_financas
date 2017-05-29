<?php
declare(strict_types=1);
namespace RSFin\Plugins;

use Interop\Container\ContainerInterface;
use RSFin\Auth\Auth;
use RSFin\Auth\JasnyAuth;
use RSFin\ServiceContainerInterface;



class AuthPlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy(
            'jasny.auth', function (ContainerInterface $container) {
                return new JasnyAuth($container->get('user.repository'));
            }
        );
        $container->addLazy(
            'auth', function (ContainerInterface $container) {
                return new Auth($container->get('jasny.auth'));
            }
        );


    }

}

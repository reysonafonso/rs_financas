<?php
declare(strict_types=1);
namespace RSFin\Plugins;

use Interop\Container\ContainerInterface;
use RSFin\Models\BillPay;
use RSFin\Models\BillReceive;
use RSFin\Models\CategoryCost;
use RSFin\Models\User;
use RSFin\Repository\CategoryCostRepository;
use RSFin\Repository\CategoryCostsRepository;
use RSFin\Repository\RepositoryFactory;
use RSFin\Repository\StatementRepository;
use RSFin\ServiceContainerInterface;
use Illuminate\Database\Capsule\Manager as Capsule;


class DbPlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $capsule = new Capsule();
        $config = include __DIR__.'/../../config/db.php';

        $capsule->addConnection($config['default_connection']);
        $capsule->bootEloquent();

        $container->add('repository.factory', new RepositoryFactory());
        $container->addLazy(
            'category-cost.repository', function () {
                return new CategoryCostRepository();
            }
        );

        $container->addLazy(
            'bill-receive.repository', function (ContainerInterface $container) {
                return $container->get('repository.factory')->factory(BillReceive::class);
            }
        );

        $container->addLazy(
            'bill-pay.repository', function (ContainerInterface $container) {
                return $container->get('repository.factory')->factory(BillPay::class);
            }
        );

        $container->addLazy(
            'user.repository', function (ContainerInterface $container) {
                return $container->get('repository.factory')->factory(User::class);
            }
        );

        $container->addLazy(
            'statement.repository', function () {
                return new StatementRepository();
            }
        );
    }

}

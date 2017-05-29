<?php
use RSFin\Application;
use RSFin\Plugins\DbPlugin;
use RSFin\Plugins\AuthPlugin;
use RSFin\ServiceContainer;

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);


$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());

return $app;


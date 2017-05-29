<?php

use Dotenv\Dotenv;
use Psr\Http\Message\ServerRequestInterface;
use RSFin\Plugins\AuthPlugin;
use RSFin\Plugins\DbPlugin;
use RSFin\Plugins\RoutePlugin;
use RSFin\Plugins\ViewPlugin;
use RSFin\ServiceContainer;
use RSFin\Application;

require_once __DIR__.'/../vendor/autoload.php';

if(file_exists(__DIR__.'/../.env')){
    $dotenv = new Dotenv(__DIR__. '/../');
    $dotenv->overload();
}

require_once __DIR__.'/../src/helpers.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());


$app->get('/home/{name}', function(ServerRequestInterface $request){
    $response = new \Zend\Diactoros\Response();
    $response->getBody()->write("response com emmiter do diactoros");
    return $response;
});

require_once __DIR__. '/../src/controllers/charts.php';
require_once __DIR__. '/../src/controllers/statements.php';
require_once __DIR__. '/../src/controllers/category-costs.php';
require_once __DIR__. '/../src/controllers/bill-receives.php';
require_once __DIR__. '/../src/controllers/bill-pays.php';
require_once __DIR__. '/../src/controllers/users.php';
require_once __DIR__. '/../src/controllers/auth.php';


$app->start();

<?php

use src\app\Router;
use src\app\CoinCap;
use src\controllers\HomeController;
use src\controllers\WalletController;

require 'src/app/Router.php';
require 'src/controllers/HomeController.php';
require 'src/controllers/WalletController.php';

$path = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$router = new Router($path, $method);

$router->get('/', function(){
    $home = new HomeController();
    $home->index();
});

$router->get('/wallet', function(){
    $home = new WalletController();
    $home->index();
});

$router->get('/crypto_coin_exchange_data', function(){
    $data = new CoinCap();
    echo $data->get_json_data();
});

$router->run();
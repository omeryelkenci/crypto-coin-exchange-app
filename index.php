<?php

use src\app\Router;
use src\app\CoinCap;
use src\controllers\Auth\LoginController;
use src\controllers\Auth\RegisterController;
use src\controllers\HomeController;
use src\controllers\WalletController;

require 'src/app/Router.php';
require 'src/controllers/Auth/RegisterController.php';
require 'src/controllers/Auth/LoginController.php';
require 'src/controllers/HomeController.php';
require 'src/controllers/WalletController.php';

$path = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$router = new Router($path, $method);

$router->get('/login', function(){
    $login = new LoginController();
    $login->get();
});

$router->post('/login', function(){
    $login = new LoginController();
    $login->post();
});

$router->get('/logout', function(){
    $login = new LoginController();
    $login->logout();
});


$router->get('/register', function(){

    $register = new RegisterController();
    $register->get();
});

$router->post('/register', function(){
    $register = new RegisterController();
    $register->post();
});

$router->get('/', function(){


    $home = new HomeController();
    $home->index();
});

$router->get('/wallet', function(){
    $wallet = new WalletController();
    $wallet->index();
});

$router->get('/crypto_coin_exchange_data', function(){
    $data = new CoinCap();
    echo $data->get_json_data();
});

$router->run();
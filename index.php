<?php

use src\app\Router;
use src\controllers\HomeController;

require 'src/app/Router.php';
require 'src/controllers/HomeController.php';

$path = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$router = new Router($path, $method);

$router->get('/', function(){
    $home = new HomeController();
    $home->index();
});

$router->get('/wallet', function(){
    echo '<h1>wallet page</h1>';
});

$router->run();
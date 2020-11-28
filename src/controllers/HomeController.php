<?php

namespace src\controllers;

require 'src/app/CoinCap.php';

use src\app\CoinCap;

class HomeController {
    public function __construct() {
        session_start();
        // Check if the user is logged in, if not then redirect him to login page
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            header("location: login");
            exit;
        }
    }

    public function index() {
        $crypto_data_controller = New CoinCap();
        $data =  json_decode($crypto_data_controller->get_json_data());
        $title = 'Home';
        $content = 'src/views/home.php';

        require 'src/views/layouts/app.php';
    }

}
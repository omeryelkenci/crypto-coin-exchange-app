<?php

namespace src\controllers;

require 'src/app/CryptoCoinExchange.php';

use src\app\CryptoCoinExchange;

class HomeController {
    public function index() {
        $crypto_data_controller = New CryptoCoinExchange();
        $data =  json_decode($crypto_data_controller->get_json_data());
        $title = 'Home';
        $content = 'src/views/home.php';

        require 'src/views/layouts/app.php';
    }

}
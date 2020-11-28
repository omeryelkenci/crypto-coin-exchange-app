<?php

namespace src\controllers;

class WalletController {
    public function __construct() {
        session_start();
        // Check if the user is logged in, if not then redirect him to login page
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            header("location: login");
            exit;
        }
    }

    public function index() {
        $title = 'Wallet';
        $content = 'src/views/wallet.php';

        require 'src/views/layouts/app.php';
    }

}
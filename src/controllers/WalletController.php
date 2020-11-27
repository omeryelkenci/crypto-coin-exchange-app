<?php

namespace src\controllers;

class WalletController {
    public function index() {

        $title = 'Wallet';
        $content = 'src/views/wallet.php';

        require 'src/views/layouts/app.php';
    }

}
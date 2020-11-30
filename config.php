<?php

define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'crypto_coin_exchange_db');
define('PORT', 3306);

$db_config = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, PORT);

// Check connection
if ($db_config === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Check users table
$sql = 'show tables like "users";';
if ($stmt = mysqli_prepare($db_config, $sql)) {
    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) != 1) {
            $sql = 'CREATE TABLE users (
                    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    username VARCHAR(50) NOT NULL UNIQUE,
                    password VARCHAR(255) NOT NULL,
                    balance TEXT NULL,
                    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
                );';
            if ($stmt = mysqli_prepare($db_config, $sql)) {
                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        echo 'users table created.';
                    }
                }
            }
        } 
    } else {
        echo "Something went wrong. Please try again later.";
        return 1;
    }
} else {
    echo "Something went wrong. Please try again later.";
    return 1;
}

// Check user_purchase_histories table
$sql = 'show tables like "user_purchase_histories";';
if ($stmt = mysqli_prepare($db_config, $sql)) {
    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) != 1) {
            $sql = 'CREATE TABLE user_purchase_histories (
                    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    user_id INT NOT NULL,
                    coin_id VARCHAR(255) NOT NULL,
                    purchased_coin_price TEXT NULL,
                    purchased_total_price TEXT NULL,
                    purchased_quantity TEXT NULL,
                    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
                );';
            if ($stmt = mysqli_prepare($db_config, $sql)) {
                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        echo 'user_purchase_histories table created.';
                    }
                }
            }
        }
    } else {
        echo "Something went wrong. Please try again later.";
        return 1;
    }
} else {
    echo "Something went wrong. Please try again later.";
    return 1;
}

return $db_config;


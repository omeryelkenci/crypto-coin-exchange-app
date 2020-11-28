<?php

namespace src\controllers;

class WalletController
{
    public function __construct()
    {
        session_start();
        // Check if the user is logged in, if not then redirect him to login page
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            header("location: login");
            exit;
        }
    }

    public function index()
    {
        $title = 'Wallet';
        $content = 'src/views/wallet.php';

        // Include config file
        $db_config = require_once "config.php";
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            // Prepare a select statement
            $sql = "SELECT balance FROM users WHERE id = ?";
            if ($stmt = mysqli_prepare($db_config, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_user_id);
                // Set parameters
                $param_user_id = $_SESSION["id"];
                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        $stmt->execute();
                        $param_current_balance = (float)$stmt->get_result()->fetch_array(MYSQLI_NUM)[0];
                    }
                }
            }


        }

        require 'src/views/layouts/app.php';
    }

    public function update_user_balance()
    {
        // Include config file
        $db_config = require_once "config.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate balance
            if (empty(trim($_POST["balance"]))) {
                $balance_err = "Please enter a user balance.";
            } else {
                // Prepare a select statement
                $sql = "SELECT balance FROM users WHERE id = ?";

                if ($stmt = mysqli_prepare($db_config, $sql)) {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_user_id);

                    // Set parameters
                    $param_user_id = $_SESSION["id"];

                    // Attempt to execute the prepared statement
                    if (mysqli_stmt_execute($stmt)) {
                        /* store result */
                        mysqli_stmt_store_result($stmt);

                        if (mysqli_stmt_num_rows($stmt) == 1) {
                            // Set parameters
                            $param_user_id = $_SESSION["id"];
                            $stmt->execute();
                            $param_balance= (float)$stmt->get_result()->fetch_array(MYSQLI_NUM)[0] + (float)trim($_POST["balance"]);

                            $sql = "UPDATE users SET balance=". $param_balance ." WHERE id=" . $param_user_id;

                            if ($stmt = mysqli_prepare($db_config, $sql)) {
                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmt)) {
                                    // Redirect to login page
                                    header("location: /wallet");
                                } else {
                                    echo "Something went wrong. Please try again later.";
                                    return 1;
                                }

                                // Close statement
                                mysqli_stmt_close($stmt);
                            } else {
                                header("location: /wallet");
                            }

                        } else {
                            echo "Oops! Something went wrong. User not found.";
                            return 1;
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                        return 1;
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                    return 1;
                }
            }
        } else {
            echo "Oops! Something went wrong. Please try again later. ";
            return 1;
        }
    }

}
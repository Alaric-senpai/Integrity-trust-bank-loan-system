<?php
require 'client.php';
session_start(); // Make sure session is started if not already

$users = $database->users;
$login = $database->login;

if (isset($_POST['login'])) {
    try {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        // Find the user in the users collection
        $loginuser = $users->findOne(['email' => $email]);

        if ($loginuser) {
            // Find the user in the login collection
            $loginDetails = $login->findOne(['email' => $email]);
            
            if ($loginDetails) {
                $hashedPassword = $loginDetails['password'];

                if (password_verify($password, $hashedPassword)) {
                    try {
                        $token = $loginDetails['token'];
                        $_SESSION['token'] = $token;
                        $_SESSION['usertype'] = $loginuser['usertype']; // Store usertype in session

                        if ($loginuser['usertype'] == "customer") {
                            header("Location: customer/dashboard.php");
                            exit();
                        } elseif ($loginuser['usertype'] == "admin") {
                            header("Location: admin/dashboard.php");
                            exit();
                        }
                    } catch (Exception $e) {
                        echo $e->getMessage();
                        die();
                    }
                } else {
                    $_SESSION['error'] = "Invalid password";
                    header("Location: login.php");
                    exit();
                }
            } else {
                $_SESSION['error'] = "User not found in login collection";
                header("Location: login.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "User not found in users collection";
            header("Location: login.php");
            exit();
        }
    } catch (Exception $e) {
        printf("Error: %s", $e->getMessage());
    }
} else {
    header("Location: index.php");
    exit();
}
?>

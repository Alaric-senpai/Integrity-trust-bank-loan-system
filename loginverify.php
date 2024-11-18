<?php
require 'client.php'; // Ensure this file initializes $database and starts a session

$users = $database->users;
$login = $database->login_beta;

if (isset($_POST['login'])) {
    try {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        // Find the user in the users collection
        $loginuser = $users->findOne(['email' => $email]);

        if ($loginuser) {
            // Convert BSONDocument to an array for easier access
            $loginuserArray = (array)$loginuser;

            // Debugging (optional): Print user details for verification
            // Remove this in production
            echo "<pre>";
            print_r($loginuserArray);
            echo "</pre>";
            // Remove or comment out the die() after testing
            // die();

            // Find the user in the login collection
            $loginDetails = $login->findOne(['email' => $email]);

            if ($loginDetails) {
                $loginDetailsArray = (array)$loginDetails;
                $hashedPassword = $loginDetailsArray['password'];

                if (password_verify($password, $hashedPassword)) {
                    try {
                        $token = $loginDetailsArray['token'];
                        $_SESSION['token'] = $token;
                        $_SESSION['usertype'] = $loginuserArray['usertype']; // Store usertype in session

                        if ($loginuserArray['usertype'] == "customer") {
                            header("Location: customer/dashboard.php");
                            exit();
                        } elseif ($loginuserArray['usertype'] == "admin") {
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
        $_SESSION['error'] = $e->getMessage();
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>

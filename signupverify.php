<?php
require 'client.php';

$users = $database->users;
$login = $database->login_beta;

try {
    // Create unique indexes
    $users->createIndex(['email' => 1], ['unique' => true]);
    $login->createIndex(['email' => 1], ['unique' => true]);

    if (isset($_POST['signup'])) {
        $newemail = $_POST['email'];
        $password = $_POST['password'];
        $cpass = $_POST['cpassword'];
        $phone = $_POST['phone'];
        $usertype = "customer";
        $email = filter_var($newemail, FILTER_SANITIZE_EMAIL);

        // Check if email already exists
        $existingUserByEmail = $users->findOne(['email' => $email]);

        if ($existingUserByEmail) {
            $_SESSION['error'] = "Email already exists";
            header("Location: signup.php");
            exit();
        }

        if ($password === $cpass) {
            $hashpass = password_hash($password, PASSWORD_DEFAULT);
            $tokenkey = $email . $phone . $hashpass;
            $token = hash('sha256', $tokenkey);

            // Insert user details into the users collection
            $userinsert = $users->insertOne([
                'email' => $email,
                'phone_number' => $phone,
                'usertype' => $usertype,
            ]);

            if ($userinsert->getInsertedCount() === 1) {
                // Insert login details into the login collection
                $loginInsert = $login->insertOne([
                    'email' => $email,
                    'password' => $hashpass,
                    'token' => $token,
                ]);

                if ($loginInsert->getInsertedCount() === 1) {
                    $_SESSION['regok'] = "Registration was successful";
                    header("Location: success.php");
                    exit();
                } else {
                    echo "User add failed at stage 2";
                }
            } else {
                echo "User add failed at stage 1";
            }
        } else {
            $_SESSION['error'] = "Passwords do not match";
            header("Location: signup.php");
            exit();
        }
    } else {
        header("Location: index.php");
        exit();
    }
} catch (Exception $e) {
    printf("Error: %s", $e->getMessage());
}
?>

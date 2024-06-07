<?php
require 'client.php';

$users = $database->users;
$login = $database->login;

try {
    // Create unique indexes
    $users->createIndex(['email' => 1], ['unique' => true]);
    $users->createIndex(['id_number' => 1], ['unique' => true]);
    $login->createIndex(['email' => 1], ['unique' => true]);
    $login->createIndex(['id_number' => 1], ['unique' => true]);

    if (isset($_POST['signup'])) {
        $newemail = $_POST['email'];
        $idnum = $_POST['idnum'];
        $password = $_POST['password'];
        $cpass = $_POST['cpassword'];
        $phone = $_POST['phone'];

        $email = filter_var($newemail, FILTER_SANITIZE_EMAIL);

        if ($password === $cpass) {
            $hashpass = password_hash($password, PASSWORD_DEFAULT);

            $tokenkey = $email . $idnum . $phone;
            $token = hash('sha256', $tokenkey);

            // Insert user details into the users collection
            $userinsert = $users->insertOne([
                'email' => $email,
                'id_number' => $idnum,
                'phone_number' => $phone,
            ]);

            if ($userinsert) {
                // Insert login details into the login collection
                $loginInsert = $login->insertOne([
                    'email' => $email,
                    'password' => $hashpass,
                    'token' => $token,
                ]);

                if ($loginInsert) {
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

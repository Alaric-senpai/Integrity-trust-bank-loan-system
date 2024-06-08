<?php
require '../../client.php';
require '../config/database.php';

if (isset($_POST['add']) && $_SERVER['REQUEST_METHOD'] === "POST") {
    $admail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $adfname = $_POST['fname'];
    $adlname = $_POST['lname'];
    $adIdnum = $_POST['idnum'];
    $adphone = $_POST['phone'];
    $adusertype = "admin";
    $adusername = $_POST['uname'];
    $defpass = "password";
    $hashpass = password_hash($defpass, PASSWORD_DEFAULT);
    $status = "active";
    $adtokenkey = $admail . $adIdnum . $adphone;
    $adtoken = hash('sha256', $adtokenkey);

    // Check if the email or id_number already exists in the users collection
    $existingUser = $users->findOne(['$or' => [['email' => $admail], ['id_number' => $adIdnum]]]);

    if ($existingUser) {
        $message = "User with this email or ID number already exists.";
        $_SESSION['message'] = $message;
        header("location:" . home_admin . "admin_add.php");
        exit();
    }

    // Check if the email or id_number already exists in the login collection
    $existingLogin = $login->findOne(['$or' => [['email' => $admail], ['id_number' => $adIdnum]]]);

    if ($existingLogin) {
        $message = "Login with this email or ID number already exists.";
        $_SESSION['message'] = $message;
        header("location:" . home_admin . "admin_add.php");
        exit();
    }

    // Proceed to insert into the users collection
    $insertadmin = $users->insertOne([
        'email' => $admail,
        'firstname' => $adfname,
        'lastname' => $adlname,
        'username' => $adusername,
        'id_number' => $adIdnum,
        'phone_number' => $adphone,
        'usertype' => $adusertype,
    ]);

    if ($insertadmin) {
        // Proceed to insert into the login collection
        $loginadmin = $login->insertOne([
            'email' => $admail,
            'password' => $hashpass,
            'token' => $adtoken,
            'id_number' => $adIdnum, // Ensure id_number is included
        ]);

        if ($loginadmin) {
            // Proceed to insert into the admintb collection
            $adminadd = $admintb->insertOne([
                'email' => $admail,
                'status' => $status,
            ]);

            if ($adminadd) {
                $message = "Admin addition was successful.";
                $_SESSION['message'] = $message;
                header("location:" . home_admin . "admin_add.php");
                exit();
            } else {
                $message = "Insert into admin table failed.";
                $_SESSION['message'] = $message;
                header("location:" . home_admin . "admin_add.php");
                exit();
            }
        } else {
            $message = "Insert into login failed.";
            $_SESSION['message'] = $message;
            header("location:" . home_admin . "admin_add.php");
            exit();
        }
    } else {
        $message = "Insert into users failed.";
        $_SESSION['message'] = $message;
        header("location:" . home_admin . "admin_add.php");
        exit();
    }
} else {
    $message = "Method not set properly.";
    $_SESSION['message'] = $message;
    header("location:" . home_admin . "admin_add.php");
    exit();
}
?>

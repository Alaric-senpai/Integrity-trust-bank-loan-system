<?php

require '../../client.php';
require '../config/database.php';

if(isset($_POST['update']) && $_SERVER['REQUEST_METHOD'] == "POST"){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $usnname = $_POST['username'];  // Fixed typo here
    $idnum = $_POST['idnum'];
    $phone = $_POST['phone'];
    // Assuming email is passed through POST, if not, get it from the session or database

    // Uncomment and implement this block if needed
    // $checkidexist = $users->findOne(
    //     [
    //         'id_number'=> $idnum
    //     ]
    // );
    // if($checkidexist){
    //     $message = "ID number exists";
    //     $_SESSION['update'] = $message;
    //     header("Location: ".home_admin."profile_update.php");
    //     exit();
    // }

    $updateadmin = $users->updateOne(
        ['email' => $email],
        [
            '$set' => [
                'firstname' => $fname,
                'lastname' => $lname,
                'username' => $usnname,
                'id_number' => $idnum,
                'phone_number' => $phone,
            ]
        ]
    );

    if($updateadmin->getModifiedCount() == 1){
        $message = "Update was successful";
        $_SESSION['update'] = $message;
        header("Location: ".home_admin."profile_update.php");
        exit();
    } else {
        $message = "Update failed";
        $_SESSION['update'] = $message;
        header("Location: ".home_admin."profile_update.php");
        exit();
    }
}
?>

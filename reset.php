<?php

require 'client.php'; // Ensure $database is initialized correctly

$users = $database->users;
$login = $database->login_beta;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate email input
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Validate password input
    if (empty($_POST['password']) || strlen($_POST['password']) < 6) {
        die("Password must be at least 6 characters long");
    }
    $password = $_POST['password'];

    // Hash the new password
    $hashpass = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Update the user's password in the database
        $update = $login->updateOne(
            ['email' => $email],
            [
                '$set' => ['password' => $hashpass],
                '$currentDate' => ['lastModified' => true]
            ]
        );

        // Check if the update was successful
        if ($update->getModifiedCount() > 0) {
            // Redirect to login page
            header("Location: login.php");
            exit();
        } else {
            die("Password reset failed. Email not found or no changes made.");
        }
    } catch (Exception $e) {
        die("An error occurred: " . $e->getMessage());
    }
} else {
    // If accessed via GET, redirect to the password reset form
    header("Location: forgotpassword.php");
    exit();
}
?>

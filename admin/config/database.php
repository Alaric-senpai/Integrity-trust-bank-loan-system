<?php
define("home_admin", "http://localhost/loan%20system/admin/");

if(!isset($_SESSION['token']) && $_SESSION['usertype'] !== "admin"){
    header("location:".URL."login.php");
    exit();
}
// $token = $_SESSION['token'];
$users = $database->users;
$login = $database->login;
$loan = $database->loans;
$admintb = $database->admin;
$token = $_SESSION['token'];

$query = $login->findOne(
    ['token' => $token]
);

$email = $query['email'];

$user = $users->findOne(
    ['email' => $email]
);

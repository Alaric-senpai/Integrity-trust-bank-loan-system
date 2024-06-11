<?php
define("home_admin", "http://localhost:4200/admin/");

if(!isset($_SESSION['token']) && $_SESSION['usertype'] !== "admin"){
    header("location:".URL."login.php");
    exit();
}
// $token = $_SESSION['token'];
$users = $database->users;
$login = $database->login;
$login_beta = $database->login_beta;
$loan = $database->loans;
$admintb = $database->admin;
$token = $_SESSION['token'];

$query = $login_beta->findOne(
    ['token' => $token]
);

$email = $query['email'];

$user = $users->findOne(
    ['email' => $email]
);

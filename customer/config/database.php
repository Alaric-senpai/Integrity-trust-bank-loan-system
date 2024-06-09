<?php
define("home", "http://localhost:4200/custome/");
if(!isset($_SESSION['token'])){
    header("location:".URL."login.php");
    exit();
    }
    // $token = $_SESSION['token'];
$users = $database->users;
$login = $database->login_beta;
$loan = $database->loans;
$userloan = $database->user_loans;
$token = $_SESSION['token'];

$query = $login->findOne(
    ['token' => $token]
    );
    
    $email = $query['email'];
    
    $user = $users->findOne(
        ['email' => $email]
        );
        
require 'loans.php';
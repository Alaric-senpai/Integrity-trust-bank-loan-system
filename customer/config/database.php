<?php
define("home", "http://localhost:4200/customer/");
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
        
// require 'loans.php';
function isLoanListNotEmpty($loan) {
    $loanslist = $loan->find([]);
    // Use iterator_to_array to check if the cursor has any documents
    $loansArray = iterator_to_array($loanslist);
    return !empty($loansArray);
}
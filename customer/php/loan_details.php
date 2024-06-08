<?php
require '../../client.php';
require '../config/database.php';
if(isset($_POST['confirm'])){
    $applicant = $_POST['applicant'];
    $lnamount = $_POST['amount'];
    $lnperiod = $_POST['period'];
    $lnint = $_POST['interest'];
    $lntype = $_POST['type'];

    if(isset($_GET['id'])){
        $loanid = $_GET['id'];
    }

    $_SESSION['loan_details'] = [
        'type' => $lntype,
        'applicant' => $applicant,
        'period' => $lnperiod,
        'interest'=> $lnint,
        'amount' => $lnamount,
        'loan_id' => $loanid 
    ];
    header("location:".home."loan_confirmation.php");
    exit();
}
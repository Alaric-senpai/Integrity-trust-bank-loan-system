<?php

require '../../client.php';
require '../config/database.php';

if($_SERVER['REQUEST_METHOD'] == "GET"){
    $applicant = $_GET['applicant'];
    $lnamount = $_GET['amount'];
    $lnperiod = $_GET['period'];
    $lnint = $_GET['interest_rate'];
    $lntype = $_GET['type'];
    $loanid = $_GET['loan_id'];
    $totlIntrest = $_GET['total_interest'];
    $monthlyinst = $_GET['monthly_installment'];
    $installments = $_GET['installments'];
    $totalamnt = $_GET['total_amount'];
    // $loandate = new DateTime()
    $appaction_date = new DateTime(); 
    $installmentdate  = clone $appaction_date;
    $interval = new DateInterval("P1M");
    $installmentdate->add($interval);
    $status = "pending";


    // Insert the loan application into the database
    $loanObjectId = new MongoDB\BSON\ObjectId($loanid);

    $insertloan = $userloan->insertOne(
        [   
            'applicant' => $applicant,
            'amount' => $lnamount,
            'loan_type' => $lntype,
            'loan_id' => $loanid,
            'total_interest' => $totlIntrest,
            'monthly_installment' => $monthlyinst,
            'total_amount' => $totalamnt,
            'loan_status' => $status,
            'installments' => $installments,
            'loan_date' => new MongoDB\BSON\UTCDateTime($appaction_date->getTimestamp() * 1000),
            'transactions' => [],

        ]
    );

    if($insertloan->getInsertedCount() == 1 ){
        $_SESSION['loan_added'] = "loan applied successfully";
        header("location:".home."explore.php");
        exit();
    }else{
        $_SESSION['loan_added'] = "loan application failed";
        header("location:".home."explore.php");
        exit();
    }


}
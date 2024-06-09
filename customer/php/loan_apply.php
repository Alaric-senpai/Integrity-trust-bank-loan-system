<?php

require '../../client.php';
require '../config/database.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $applicant = $_POST['applicant'];
    $lnamount = $_POST['amount'];
    $lnperiod = $_POST['period'];
    $lnint = $_POST['interest_rate'];
    $lntype = $_POST['type'];
    $loanid = $_POST['loan_id'];
    $totlIntrest = $_POST['total_interest'];
    $monthlyinst = $_POST['monthly_installment'];
    $installments = $_POST['installments'];
    $totalamnt = $_POST['total_amount'];
    // $loandate = new DateTime()
    $appaction_date = new DateTime(); 
    $installmentdate  = clone $appaction_date;
    $interval = new DateInterval("P1M");
    $installmentdate->add($interval);
    $status = "pending";
    // Insert the loan application into the database
    $loanObjectId = new MongoDB\BSON\ObjectId($loanid);

    $insertloan = $loan->insertOne(
        [   
            'applicant' => $applicant,
            'loan_id' => $loanObjectId,
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
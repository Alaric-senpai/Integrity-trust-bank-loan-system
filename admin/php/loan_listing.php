<?php 
require '../../client.php';
require '../config/database.php';

if(isset($_POST['register']) && $_SERVER['REQUEST_METHOD'] === "POST"){
    $loanname = $_POST['name'];
    $lnamount = $_POST['amount'];
    $lntype = $_POST['type'];
    $lnintr = $_POST['interest'];
    $lndurtn = $_POST['duration'];
    $approcess = $_POST['process'];
    $approval = $_POST['approval'];
    $colateral = $_POST['colateral'];
    $svquality = $_POST['quality'];
    $applicant = $_POST['applicant'];

    // Array to collect the checked tags
    $tags = [];

    // Check each tag checkbox and add the tag to the array if checked
    if(isset($_POST['co_signed'])){
        $tags[] = "co-signed";
    }
    if(isset($_POST['affordable'])){
        $tags[] = "Affordable";
    }
    if(isset($_POST['mortgage'])){
        $tags[] = "Mortgage";
    }
    if(isset($_POST['instant'])){
        $tags[] = "instant";
    }
    if(isset($_POST['emergency'])){
        $tags[] = "Emergency";
    }
    if(isset($_POST['consolidation'])){
        $tags[] = "consolidation";
    }
    if(isset($_POST['refinance'])){
        $tags[] = "Refinance";
    }
    if(isset($_POST['quick'])){
        $tags[] = "Quick";
    }
    if(isset($_POST['low_fee'])){
        $tags[] = "Low-fee";
    }
    if(isset($_POST['cheap'])){
        $tags[] = "Cheap";
    }

    $Addloan = $loan->insertOne(
        [
            'name' => $loanname,
            'amount' => $lnamount,
            'type' => $lntype,
            'interest_rate' => $lnintr,
            'loan_duration' => $lndurtn,
            'approval' => $approval,
            'process' => $approcess,
            'collateral' => $colateral,
            'applicants' => $applicant,
            'service_quality' => $svquality,
            'tags' => $tags
        ]
    );

    if($Addloan){
        $message = "Loan was added successfully";
        $_SESSION['loan_ok'] = $message;
        header("location:".home_admin."loans.php");
        exit();
    }
}else{
    $message = "method failure check for errors in code";
    $_SESSION['loan_ok'] = $message;
    header("location:".home_admin."loans.php");
    exit();
}
?>

<?php
require '../../client.php';
require '../config/database.php';

session_start();

if (isset($_POST['pay'])) {
    // Installment amount
    $amount = (float)$_POST['amount'];

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header("location:" . home . "loan_details.php");
        exit();
    }

    $ObjectId = new MongoDB\BSON\ObjectId($id);

    $findrecord = $userloan->findOne(['_id' => $ObjectId]);

    if (!$findrecord) {
        $message = "Record not found.";
        $_SESSION['inst_ok'] = $message;
        header("location:" . home . "loan_details.php?id=" . $id);
        exit();
    }

    $loan_id = $findrecord['loan_id'];

    $loanDetail = $loan->findOne(['_id' => new MongoDB\BSON\ObjectId($loan_id)]);

    if (!$loanDetail) {
        $message = "Loan detail not found.";
        $_SESSION['inst_ok'] = $message;
        header("location:" . home . "loan_details.php?id=" . $id);
        exit();
    }

    // Principal amount 
    $principal = $loanDetail['amount'];

    // Monthly interest
    $monthly_intr = $findrecord['total_interest'] / $findrecord['installments'];

    // Balance
    $balance = isset($findrecord['balance']) ? $findrecord['balance'] : $findrecord['total_amount'];
    $balance -= $amount;

    // Installment date
    $installment_date = new DateTime();
    $interval = new DateInterval("P1M");
    $next_installment = clone $installment_date;
    $next_installment->add($interval);
    $next_date = new MongoDB\BSON\UTCDateTime($next_installment->getTimestamp() * 1000);
    // Installment record
    $installment = [
        'amount' => $amount,
        'installment_date' => new MongoDB\BSON\UTCDateTime($installment_date->getTimestamp() * 1000),
        'next_installment' => new MongoDB\BSON\UTCDateTime($next_installment->getTimestamp() * 1000),
        'principal_amount' => $principal,
        'monthly_interest' => $monthly_intr
    ];

    $makeinstallment = $userloan->updateOne(
        ['_id' => $ObjectId],
        [
            '$push' => ['transactions' => $installment],
            '$set' => ['balance' => $balance]
        ]
    );

    if ($makeinstallment->getModifiedCount() == 1) {
        $next_date_set = $userloan->updateOne(
            ['_id' => $ObjectId],
            ['$set' => ['next_date' => $next_date]]
        );

        if($next_date_set->getModifiedCount() == 1){

            $message = "Installment made successfully.";
            $_SESSION['inst_ok'] = $message;
            header("location:" . home . "loan_details.php?id=" . $id);
            exit();
        }else{

            $message = "Installment date add failed.";
            $_SESSION['inst_ok'] = $message;
            header("location:" . home . "loan_details.php?id=" . $id);
            exit();
        }
    } else {
        $message = "Installment not made, errors available.";
        $_SESSION['inst_ok'] = $message;
        header("location:" . home . "loan_details.php?id=" . $id);
        exit();
    }
} else {
    $message = "Submission method has errors.";
    $_SESSION['inst_ok'] = $message;
    header("location:" . home . "loan_details.php?id=" . $id);
    exit();
}

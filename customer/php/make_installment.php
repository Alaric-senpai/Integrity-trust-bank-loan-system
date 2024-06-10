<?php
require '../../client.php';

require '../config/database.php';

if(isset($_POST['pay'])){
    //installment amount
    $amount = $_POST['amount'];

    // echo $amount;
    // echo "<br>" . (float) $amount + (float) $amount ;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        header("location:" .home."loan_details.php");
        exit();
    }
    $ObjectId = new MongoDB\BSON\ObjectId($id);

    $findrecord = $userloan->findOne(
        [
            '_id' => $ObjectId 
        ]
    );

    $loan_id = $findrecord['loan_id'];
    
    $loanDetail = $loan->findOne(
        [
            '_id' => new MongoDB\BSON\ObjectId($loan_id)
        ]
    );

    //principal amount 
    $principal = $loanDetail['amount'];

    //monthly interest
    $monthly_intr = $findrecord['total_interest'] / $findrecord['installments'];
    // echo "<br> montly interest" . $monthly_intr;

    // var_dump($findrecord);

    if(isset($findrecord['balance'])){
        $balance = $findrecord['balance'];
    }else{

        $balance = $findrecord['total_amount'];
    }
    // echo " <br>balance" .$balance;
    //balance
    $balance = $balance - $amount;
    // echo " <br>balance" .$balance;
    //installment_date
    $installment_date = new Datetime();
    $interval = new DateInterval("P1M");
    $next_installment = clone $installment_date;
    //next_installment_date
    $next_installment->add($interval);

    // $installment_date = $installment_date->getTimestamp()*1000 ;
    // echo "<br>". $next_installment->format("d/m/Y h:i:s a");
    //installment record
    $installment = [
        'amount'=>$amount,
        'installment_date' => new MongoDB\BSON\UTCDateTime($installment_date->getTimestamp() * 1000),
        'next_installment' => new MongoDB\BSON\UTCDateTime($next_installment->getTimestamp() * 1000),
        'principal_amount' => $principal,
        'monthly_interest' => $monthly_intr
    ];

    $makeinstallment = $userloan->updateOne(
        [
            '_id'=> $ObjectId
        ],
        [
            '$push'=>['transactions' => $installment]
        ],
        [
            '$set' => ['balance' => $balance]
        ]
    );

    if($makeinstallment->getModifiedCount() == 1){
        $message = "Installment made sucessfully";
        $_SESSION['inst_ok']= $message;
        header("location:".home."loan_details.php?id=".$id);
        exit();
    }else{
        $message = "Installment not made erros available";
        // echo $message;
        $_SESSION['inst_ok']= $message;
        header("location:".home."loan_details.php?id=".$id);
        exit();
    }


}else{
    $message = "Submission method has errors";
        $_SESSION['inst_ok']= $message;
        header("location:".home."loan_details.php?id=".$id);
        exit();
}
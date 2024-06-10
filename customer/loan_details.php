<?php
require '../client.php';
require './config/database.php';

if(!isset($_GET['id'])){
    header("location: history.php");
    exit();
}

$id = $_GET['id'];

$objectid = new MongoDB\BSON\ObjectId($id);

$loan_record = $userloan->findOne(
    ['_id' => $objectid]
);

$loanid = $loan_record['loan_id'];
$originalID = new MongoDB\BSON\ObjectId($loanid);
$loan_exist = $loan->findOne(
    ['_id' => $originalID]
);

$transactions = $loan_record['transactions'];
$loan_amount = (int)$loan_exist['amount'];
// $loan_interest = $loan_exist['interest_rate'];
// $loan_duration = $loan_exist['loan_duration'];
// $loan_type  = $loan_exist['type'];
$installments = (int)$loan_record['installments'];
// $month_installment = $loan_record['monthly_installment'];
$total_amnt =  (int)$loan_record['total_amount'];
// $loan_date = $loan_record['loan_date'];

$month_intr = number_format(($total_amnt- $loan_amount)/$installments, 2);

// echo "\$loan_amount (Loan Amount): " . $loan_exist['amount'] . "<br>";
// echo "\$loan_interest (Interest Rate): " . $loan_exist['interest_rate'] . "<br>";
// echo "\$loan_duration (Loan Duration): " . $loan_exist['loan_duration'] . "<br>";
// echo "\$loan_type (Loan Type): " . $loan_exist['type'] . "<br>";
// echo "\$installments (Installments): " . $loan_record['installments'] . "<br>";
// echo "\$month_installment (Monthly Installment): " . $loan_record['monthly_installment'] . "<br>";
// echo "\$total_amnt (Total Amount): " . $loan_record['total_amount'] . "<br>";
// echo "\$loan_date (Loan Date): " . $loan_record['loan_date'] . "<br>";

// var_dump($loan_record);

// echo "<br>";

// var_dump($loan_exist);

// die()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan details</title>
    <?php require '../favicon.php'; ?>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/loan.css">
    <style>
        .notice{
            position: fixed;
            top: 40px;
            z-index: 1000;
            right: 40px;
            
        }
    </style>
</head>
<body>
    <div class="container-full">
        <?php require './config/sidebar.php'; require 'invalid.php'; ?>
        <div class="content" id="content">
        <?php
            if(isset($_SESSION['inst_ok'])){
            ?>
                <div class="alert alert-success alert-dismissible notice">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Success!</strong> <?php echo $_SESSION['inst_ok']; ?>
                </div>
            <?php
            unset($_SESSION['inst_ok']);
            }
            ?>
            <div class="loan-infromation text-bg-dark w-98 ">
                <h3>Loan information</h3>
                <div class="info-details loan-holder">
                    <div class="loan-type ">
                        <h5>Loan type</h5>
                        <p><?php echo $loan_record['loan_type']; ?></p>
                    </div>
                    <div class="loan-amount">
                        <h5>Loan Amount</h5>
                        <p>Ksh. <?php echo number_format((int)$loan_exist['amount']); ?></p>
                    </div>
                </div>
                <div class="loan-holder loan-interest">
                    <div class="interest-rate">
                        <h5>Interest rate</h5>
                        <p><?php echo number_format((float)$loan_exist['interest_rate'], 1); ?></p>
                    </div>
                    <div class="repayment">
                        <h5>Repayment term</h5>
                        <p><?php echo number_format((int)$loan_exist['loan_duration']); ?> months</p>
                    </div>
                </div>
                <div class="loan-schedule loan-holder">
                    <div class="due-date">
                        <h5>Next installment date</h5>
                        <p>12/2/2024</p>
                    </div>
                    <div class="balance">
                        <h5>Remaining Balance</h5>
                        <p>Ksh. 5000</p>
                    </div>
                </div>
            </div>
            <div class="payment-schedule text-bg-dark w-98">
                <h4>Repayment schedule</h4>
                <table class="table table-dark p-2 table-hover">
                    <thead>
                        </tr>
                        <tr>
                            <td scope="col">#</td>
                            <td scope="col">Installment date</td>
                            <td scope="col">Installation amount</td>
                            <td scope="col">Principal Amount</td>
                            <td scope="col">Interest Amount</td>
                            <td scope="col">Remaining balance</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if(is_array($transactions) && !empty($transactions)){

                            foreach($transactions as $transaction){

                                $installmentdate = $transaction['installment_date'];
                                $phpdate =$installmentdate->toDateTime();
                                $installmentdate = $phpdate->format("d/m/Y");
                            

                        ?>
                        <tr>
                            <th scope="row">1</th>
                            <td><?php echo $installmentdate; ?></td>
                            <td><?php echo $transaction['inst_amount']; ?></td>
                            <td>Ksh. <?php echo $loan_record['balance']; ?></td>
                            <td>Ksh. <?php echo $month_intr; ?></td>
                            <td>Ksh. <?php echo number_format(($loan_record['balance'])); ?></td>
                        </tr>
                        <?php
                            }
                        }else{
                            ?>
                            <tr>
                                <td colspan="6" class="alert alert-info">no transaction records</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="manage-actions text-bg-dark w-98">
                <h4>Manage options</h4>
                <div class="row-top grid-2">
                    <a type="button"  href="./make_payment.php?id=<?php echo $loan_record['_id']; ?>" class="btn btn-success w-100">Make a payment</a>
                    <button type="button"  href="#" class="btn btn-success w-100">request bank statement</a>
                </div>
                <div class="row-top grid-2 mb-2">
                    <a type="button"  href="" class="btn btn-success w-100">Modify repayment schedule</a>
                    <a type="button"  href="./customer_support.php" class="btn btn-success w-100">Contact customer support</a>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>
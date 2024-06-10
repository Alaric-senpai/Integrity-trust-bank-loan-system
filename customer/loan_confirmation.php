<?php
require '../client.php';
require 'config/database.php';

if(!isset($_SESSION['loan_details'])){
    header("location:dashboard.php");
    exit();
}
$type = $_SESSION['loan_details']['type'];
$applicant = $_SESSION['loan_details']['applicant'];
$amount = (int)$_SESSION['loan_details']['amount'];
$interest_rate = (float)$_SESSION['loan_details']['interest'];
$loanid = $_SESSION['loan_details']['loan_id'];
$duration = (int)$_SESSION['loan_details']['period'];
$loanobjectid =new MongoDB\BSON\ObjectId($loanid);
$installments = $duration - 1;
$loandetails = $loan->findOne(
    ['_id' => $loanobjectid]
);

$lname = $loandetails['name'];

$monthly_interest_rate = ($interest_rate / 100) / 12;
$monthly_installment = ($amount * $monthly_interest_rate) / (1 - pow(1 + $monthly_interest_rate, -$duration));
$total_amount_paid = $monthly_installment * $duration;
$total_interest_paid = $total_amount_paid - $amount;

// $total_amount_paid = 
// $total_interest_paid = 
// $monthly_installment = 

$appaction_date = new DateTime(); 
$installmentdate  = clone $appaction_date;
$interval = new DateInterval("P1M");
$installmentdate->add($interval);

$params = "type=$type&applicant=$applicant&amount=$amount&interest_rate=$interest_rate&loan_id=$loanid&period=$duration&total_amount=$total_amount_paid&monthly_installment=$monthly_installment&total_interest=$total_interest_paid&installments=$installments";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan confirmation</title>
    <?php require '../favicon.php'; ?>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/loan.css">
    <link rel="stylesheet" href="css/loanc.css">
</head>
<body>
    <div class="container-full">
        <?php require './config/sidebar.php'; require 'invalid.php'; ?>
        <div class="content" id="content">
            <div class="loan-confirm w-98 text-bg-dark rounded-2 p-3">
                <h1 >Loan confirmation</h1>
                <div class="loan_confirm">
                    <div class="left">
                        <h2 class="max"><?php echo $lname; ?></h2>
                        <h4 class="max">interest rate (p/a)</h4>
                        <p class="min"><?php echo $interest_rate; ?>%</p>
                        <h4 class="max">loan amount</h4>
                        <p class="min"><?php echo number_format($amount); ?></p>
                        <h4 class="max">Duration</h4>
                        <p class="min"><?php echo $duration; ?> months</p>
                        <h4 class="max">Loan interest</h4>
                        <p class="min">Ksh. <?php echo number_format($total_interest_paid, 2); ?></p>
                        <h4 class="max">Total amount to pay</h4>
                        <p class="min">Ksh. <?php echo number_format($total_amount_paid, 2); ?></p>

                    </div>
                    <div class="right">
                        <h4 class="max">Application date</h4>
                        <p class="min"><?php echo $appaction_date->format("Y/m/d h:i:s a"); ?></p>
                        <h4 class="max">First installment date</h4>
                        <p class="min"><?php echo $installmentdate->format("Y/m/d h:i:s a"); ?></p>
                        <h4 class="max">Total installments</h4>
                        <p class="min"><?php echo $installments; ?></p>
                        <h4 class="max">Installment amount monthly</h4>
                        <p class="min">Ksh. <?php echo number_format($monthly_installment, 2); ?></p>
                    </div>


                </div>
                <div class="confirm_actions m-4 w-100 ">
                    <a href="php/loan_apply.php?<?php echo $params;?>" name="proceed" class="btn btn-success" >Proceed</a>
                    <button type="submit" name="cancel" class="btn btn-danger">cancel</button>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/script.js"></script>
    
</body>
</html>
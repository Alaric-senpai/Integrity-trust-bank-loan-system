<?php
require '../client.php';
if(!isset($_SESSION['token'])){
    header("location: login.php");
    exit();
}
$token = $_SESSION['token'];
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
</head>
<body>
    <div class="container-full">
        <?php require './config/sidebar.php'; require 'invalid.php'; ?>
        <div class="content" id="content">
            <div class="loan-infromation text-bg-dark w-98 ">
                <h3>Loan information</h3>
                <div class="info-details loan-holder">
                    <div class="loan-type ">
                        <h5>Loan type</h5>
                        <p>Personal loan</p>
                    </div>
                    <div class="loan-amount">
                        <h5>Loan Amount</h5>
                        <p>Ksh. 50000</p>
                    </div>
                </div>
                <div class="loan-holder loan-interest">
                    <div class="interest-rate">
                        <h5>Interest rate</h5>
                        <p>5%</p>
                    </div>
                    <div class="repayment">
                        <h5>Repayment term</h5>
                        <p>24 months</p>
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
                            <td scope="col">Due date</td>
                            <td scope="col">Installation amount</td>
                            <td scope="col">Principal Amount</td>
                            <td scope="col">Interest Amount</td>
                            <td scope="col">Remaining balance</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>12/1/2-2024</td>
                            <td>Ksh. 400</td>
                            <td>Ksh. 50000</td>
                            <td>Ksh. 40</td>
                            <td>Ksh. 3600</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>12/1/2-2024</td>
                            <td>Ksh. 400</td>
                            <td>Ksh. 50000</td>
                            <td>Ksh. 40</td>
                            <td>Ksh. 3600</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>12/1/2-2024</td>
                            <td>Ksh. 400</td>
                            <td>Ksh. 50000</td>
                            <td>Ksh. 40</td>
                            <td>Ksh. 3600</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="manage-actions text-bg-dark w-98">
                <h4>Manage options</h4>
                <div class="row-top grid-2">
                    <a type="button"  href="./make_payment.php" class="btn btn-success w-100">Make a payment</a>
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
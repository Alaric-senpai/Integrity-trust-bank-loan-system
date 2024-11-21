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

$installments = (int)$loan_record['installments'];

$total_amnt =  (int)$loan_record['total_amount'];

$month_intr = number_format(($total_amnt - $loan_amount)/$installments, 2);

if(isset($loan_record['next_date'])){
    $next_date = $loan_record['next_date']->toDateTime()->format("d/m/Y");
}else{
    $next_date = "next month";
}

if(isset($loan_record['balance'])){
    $balance = $loan_record['balance'];
}else{
    $balance = $loan_record['amount'];
}

// Update loan status if balance is 0 or less
if($balance <= 0){
    $loanComplete = $userloan->updateOne(
        ['_id' => $objectid],
        ['$set' => ['status' => "Paid"]]
    );
}
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
        .noticer{
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
                <div class="alert alert-success alert-dismissible noticer">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Success!</strong> <?php echo $_SESSION['inst_ok']; ?>
                </div>
            <?php
            unset($_SESSION['inst_ok']);
            }
        ?>
            <div class="loan-infromation text-bg-dark w-98">
                <h3>Loan information</h3>
                <div class="info-details loan-holder">
                    <div class="loan-type">
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
                        <p><?php echo $next_date; ?></p>
                    </div>
                    <div class="balance">
                        <h5>Remaining Balance</h5>
                        <p>Ksh. <?php echo number_format($balance, 2) ?></p>
                    </div>
                </div>
            </div>
            <div class="payment-schedule text-bg-dark w-98">
                <h4>Repayment schedule</h4>
                <table class="table table-dark p-2 table-hover">
                    <thead>
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
                    if (!empty($transactions)) {
                        $counter = 1;
                        foreach ($transactions as $transaction) {
                            $installment_date = $transaction['installment_date']->toDateTime()->format("d/m/Y");
                            $next_date = $transaction['next_installment']->toDateTime()->format("d/m/Y");
                            $_SESSION['next'] = $next_date;
                            $installment_amount = $transaction['amount'];
                            $principal_amount = $transaction['principal_amount'];
                            $interest_amount = $transaction['monthly_interest'];
                            $remaining_balance = isset($transaction['balance']) ? $transaction['balance'] : $balance;
                            ?>
                            <tr>
                                <td><?php echo $counter++; ?></td>
                                <td><?php echo $installment_date; ?></td>
                                <td><?php echo number_format($installment_amount, 2); ?></td>
                                <td>Ksh. <?php echo number_format($principal_amount); ?></td>
                                <td>Ksh. <?php echo number_format($interest_amount); ?></td>
                                <td>Ksh. <?php echo number_format($remaining_balance, 2) ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="6" class="bg-info">No transaction records</td>
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
                    <?php if($balance > 0) { ?>
                        <a href="./make_payment.php?id=<?php echo $id; ?>" class="btn btn-success w-100">Make a payment</a>
                    <?php } else { ?>
                        <p>Loan is cleared</p>
                    <?php } ?>
                    <button class="btn btn-success w-100">Request bank statement</button>
                </div>
                <div class="row-top grid-2 mb-2">
                    <a href="" class="btn btn-success w-100">Modify repayment schedule</a>
                    <a href="./customer_support.php" class="btn btn-success w-100">Contact customer support</a>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>
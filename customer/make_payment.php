<?php
require '../client.php';
require './config/database.php';

if(!isset($_GET['id'])){
    header("location: loan_details.php");
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

$loandate = $loan_record['loan_date'];
$phpdate = $loandate->toDateTime();
$loandate = $phpdate->format("d/m/Y h:i:s a");

if(isset($loan_record['balance'])){
    $balance = $loan_record['balance'];
}else{
    $balance = $loan_record['total_amount'];
}


$mothly_install = $loan_record['monthly_installment'];
// echo $balance;
// var_dump($loan_record);
// die()

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan repayment</title>
    <?php require '../favicon.php'; ?>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/loan.css">
</head>
<body>
    <div class="container-full">
        <?php require './config/sidebar.php'; require 'invalid.php'; ?>
        <div class="content" id="content">
            <div class="make-payment w-98 text-bg-dark">
                <h1>Loan Agreement</h1>
                <h6>Loan initiated on <?php echo $loandate; ?></h6>
                <br><br>
                <h3>Total Balance : Ksh. <?php echo number_format($balance, 2); ?></h3>

                <hr class="w-98 m-auto border-primary border-3">

                <form action="./php//make_installment.php?id=<?php echo $loan_record['_id']; ?>" method="post" class="w-75 p-1">
                    <!-- <div class="mb-3 d-flex align-items-center flex-10 w-100 p-2">
                        <label for="date" class="form-label">Payment date</label>
                        <input type="date" name="date" id="date" required class="form-control w-50">
                    </div> -->
                    <div class="mb-3 d-flex align-items-center flex-10 w-100 p-2">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="text" name="amount" id="amount" required class="form-control w-50" value="<?php echo $mothly_install; ?>"  >
                    </div>
                    <div class="mb-3 d-flex flex-10 w-100">
                        <button type="submit" class="btn btn-success" name="pay">confirm payment</button>
                        <a type="button" href="./loan_details.php" class="btn btn-success">cancel payment</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>
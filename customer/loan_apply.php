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
    <title>Loan application</title>
    <?php require '../favicon.php'; ?>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/loan.css">
</head>
<body>
    <div class="container-full">
        <?php require './config/sidebar.php'; require 'invalid.php'; ?>
        <div class="content" id="content">
        <div class="make-payment w-98 text-bg-dark">
                <h1>Loan Application</h1>
                <h6>Loan initiated at 12/2/2023 at 11:30 pm</h6>
                <br><br>
                <h3>loan</h3>
                <hr class="w-98 m-auto border-primary border-3">
                <form action="#" method="post" class="w-75 p-1">
                    <div class="mb-3 d-flex align-items-center flex-10 w-100 p-2">
                        <label for="date" class="form-label">loan Date</label>
                        <input type="date" name="date" id="date" required class="form-control w-50">
                    </div>
                    <div class="mb-3 d-flex align-items-center flex-10 w-100 p-2">
                        <label for="applicant">Applicant</label>
                        <input type="email" name="applicant" id="applicant" placeholder="applicant email" class="form-control w-50">
                    </div>
                    <div class="mb-3 d-flex align-items-center flex-10 w-100 p-2">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" name="amount" id="amount" required class="form-control w-50" placeholder="amount in Ksh">
                    </div>
                    <div class="mb-3 d-flex align-items-center flex-10 w-100 p-2">
                        <label for="period" class="form-label">Period</label>
                        <input type="text" name="period" id="period" placeholder="loan period in months" class="form-control w-50">
                    </div>
                    <div class="mb-3 d-flex align-items-center flex-10 w-100 p-2">
                        <label for="interest" class="form-label">interest rate</label>
                        <input type="number" name="interest" id="interest" value="5.3" readonly class="form-control w-50" step="0.1">
                    </div>

                    <div class="mb-3 d-flex align-items-center flex-10 w-100 p-2">
                        <label for="type" class="form-label">Loan type</label>
                        <select name="type" id="type" class="form-control w-50">
                            <option value="null" selected disabled>Choose loan type</option>
                            <option value="personal">Personal loan</option>
                            <option value="business">Business loan</option>
                            <option value="home">Mortgage Loan</option>
                        </select>
                    </div>   
                    
                    <div class="mb-3 d-flex flex-10 w-100">
                        <button type="submit" class="btn btn-success">confirm loan</button>
                        <a type="button" href="./loan_details.php" class="btn btn-success">cancel</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>
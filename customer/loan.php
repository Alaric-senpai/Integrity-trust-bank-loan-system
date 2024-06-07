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
    <title>Loans page</title>
    <?php require '../favicon.php'; ?>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-full">
        <?php require './config/sidebar.php'; require 'invalid.php'; ?>
        <div class="content" id="content">
            <div class="navbar container-fluid text-bg-dark top-bar">
                <div class="intro-top">
                <i class="fa-solid fa-bars text-white menu-toggle bg-success p-1  rounded" id="toggler">Menu</i>
                    loans
                </div>
                <div class="search-top d-flex  align-items-center justify-content-between me-2 ">
                    <div class="form">
                        <form action="#" method="post" class="d-flex">
                            <input type="search" name="search" id="search" class="form-control">
                            <button type="submit" class="btn btn-success">Search</button>
                        </form>
                    </div>
                    <div class="account d-flex mx-1">
                    <i class="fa-solid fa-user-tie text-white"></i>
                    
                    </div>
                </div>
            </div>
            <div class="custom-loans text-white">
                <div class="custom-loan">
                    <div class="header">
                        <h3><span>View loan information</span> <span><i class="fa-regular fa-circle-up"></i> <span class="intrate">5.3%</span></span></h3>
                    </div>
                    <div class="heading">
                        <p>detailed information</p>
                        <h1>Personal loan</h1>
                    </div>
                    <div class="loan-details">
                        <h5>Loan terms</h5>
                        <p>Flexible repayment options</p>
                        <h5>Loan amount</h5>
                        <p>Custom amount</p>
                    </div>
                    <div class="links text-bg-success">
                        <a href="./explore_loan.php" class="links">view details</a>
                    </div>
                </div>
                <div class="custom-loan">
                    <div class="header">
                        <h3><span>Mortgage loan</span> <span><i class="fa-regular fa-circle-up"></i> <span class="intrate">1.5%</span></span></h3>
                    </div>
                    <div class="heading">
                        <p>property coletaral</p>
                        <h1>Home loan</h1>
                    </div>
                    <div class="loan-details">
                        <h5>Loan terms</h5>
                        <p>Flexible repayment options</p>
                        <h5>Loan amount</h5>
                        <p>Loan guaranter details</p>
                    </div>
                    <div class="links text-bg-success">
                        <a href="./explore_loan.php" class="links">view details</a>
                    </div>
                </div>
                <div class="custom-loan">
                    <div class="header">
                        <h3><span>Car loan</span> <span><i class="fa-regular fa-circle-up"></i> <span class="intrate">3.6%</span></span></h3>
                    </div>
                    <div class="heading">
                        <p>Vehicle details required</p>
                        <h1>Business loan</h1>
                    </div>
                    <div class="loan-details">
                        <h5>Loan application form</h5>
                        <p>Business plan required</p>
                        <h5>Financial statement needed</h5>
                        <p>Loan repayment</p>
                    </div>
                    <div class="links text-bg-success">
                        <a href="./explore_loan.php" class="links">view details</a>
                    </div>
                </div>
            </div>
            <div class="loan-options">
                
            </div>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>
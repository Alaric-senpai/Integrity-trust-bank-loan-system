<?php
require '../client.php';
require './config/database.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore loan options</title>
    <?php require '../favicon.php'; ?>
    <link rel="stylesheet" href="css/style.css">
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
            if(isset($_SESSION['loan_added'])){
            ?>
                <div class="alert alert-success alert-dismissible noticer">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Success!</strong> <?php echo $_SESSION['loan_added']; ?>
                </div>
            <?php
            unset($_SESSION['loan_added']);
            }
            ?>
            <div class="navbar container-fluid text-bg-dark top-bar">
                <div class="intro-top">
                <i class="fa-solid fa-bars text-white menu-toggle bg-success p-1  rounded" id="toggler">Menu</i>
                    Explore
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
            <div class="loans text-white">
                <?php
                if(isLoanListNotEmpty($loan)){
                    $loanslist = $loan->find([]);
                    foreach($loanslist as $loanitem){
                ?>
                    <div class="loan ">
                        <div class="loan-image">
                            <img src="https://cdn.pixabay.com/photo/2017/08/30/07/56/money-2696229_640.jpg" alt="loan image">
                        </div>
                        <div class="description">
                            <p class="name"><?php echo $loanitem['name'] ?></p>
                            <p class="detail combine"><?php echo $loanitem['approval'] ?></p>
                            <p class="combine"><span class="type"><?php echo $loanitem['name'] ?></span> <span class="colateral"><?php echo $loanitem['collateral'] ?></span></p>
                            <p class="detail2"><?php echo $loanitem['process'] ?> process</p>
                            <p class="distro combine"><?php echo $loanitem['approval'] ?></p>
                            <p class="tags mt-2">
                                <?php 
                                foreach($loanitem['tags'] as $tag){
                                
                                 ?>
                                    <span class="tag bg-success p-2">#<?php echo $tag; ?></span>
                                <?php
                                }
                                ?>
                            </p>
                        </div>
                        <div class="action">
                            <div class="feedback">
                                <div class="left">
                                    <p class="rate"><?php echo $loanitem['service_quality'] ?></p>
                                    <p class="satisfied">5000 people</p>
                                </div>
                                <div class="rating bg-success p-3 rounded ">
                                    9.7
                                </div>
                            </div>
                            <div class="details">
                                <div class="amount">
                                    Ksh. <?php echo number_format($loanitem['amount']) ?>
                                </div>
                                <div class="duration">
                                    <span class="time"><?php echo $loanitem['loan_duration'] ?> months</span>
                                    <span class="applicants">1 applicant</span>
                                </div>
                            </div>
                            <div class="act">
                                <a href="./explore_loan.php?id=<?php echo $loanitem['_id'] ?>" class="btn btn-success">View details</a>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="more w-100 d-flex alin-items-center justify-content-center">
                <a href="./loan.php" class="btn ">Custom loan</a>
            </div>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>
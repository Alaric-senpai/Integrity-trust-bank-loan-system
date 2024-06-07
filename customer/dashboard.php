<?php
require '../client.php';
require 'config/database.php';



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer dashboard</title>
    <?php require '../favicon.php'; ?>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/loan.css">
</head>
<body>
    <div class="container-full">
        <?php require './config/sidebar.php'; require 'invalid.php'; ?>
        <div class="content" id="content">
            <div class="navbar container-fluid text-bg-dark top-bar">
                <div class="intro-top">
                <i class="fa-solid fa-bars text-white menu-toggle bg-success p-1  rounded" id="toggler">Menu</i>
                    Dashboard
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
            <div class="my-4 text-bg-dark w-98 p-4 bordered-2">
                <h4>
                    Hello <?php echo $user['username']; ?> ✌✌✌
                </h4>
            </div>
            <?php
            if (
                (!isset($user['firstname']) || empty($user['firstname'])) ||
                (!isset($user['lastname']) || empty($user['lastname'])) ||
                (!isset($user['username']) || empty($user['username']))
            ) {
            
            ?>
            <div class="notice alert alert-danger alert-dismissible fade show p-2" role="alert">
                <div class="data">

                    Please provide us with all your details to continue <br>
                <a href="./profile_details.php" class="btn btn-warning">Click here</a>
                </div>
                <div class="exit">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
                </div>
            </div>
            <?php } ?>
            <div class="rows w-98">
                <div class="s-card">
                    <h3>Total loans</h3>
                    <p>23</p>
                </div>
                <div class="s-card">
                    <h3>Credit score</h3>
                    <p>100%</p>
                </div>
                <div class="s-card">
                    <H3>Pending loans</H3>
                    <h2>5</h2>
                </div>
                <div class="s-card">
                    <h3>Loan eligibility</h3>
                    <p>not eligible</p>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>
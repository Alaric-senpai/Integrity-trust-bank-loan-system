<?php
require '../client.php';
require 'config/database.php';

$cursor = $userloan->find(['applicant' => $email]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan history</title>
    <?php require '../favicon.php'; ?>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-full">
        <?php require './config/sidebar.php'; require 'invalid.php'; ?>
        <div class="content" id="content">
            <div class="navbar container-fluid text-bg-dark top-bar">
                <div class="intro-top">
                    <i class="fa-solid fa-bars text-white menu-toggle bg-success p-1 rounded" id="toggler">Menu</i>
                    Loan history
                </div>
                <div class="search-top d-flex align-items-center justify-content-between me-2">
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
           
            <div class="history">
                <?php
                // Check if there are any documents in the cursor
                if ($cursor->isDead()) {
                    ?>
                    <div class="alert alert-info">
                        No loan history
                    </div>
                    <?php
                } else {
                    foreach ($cursor as $history) {
                        ?>
                        <div class="record p-2">
                            <h3>Loan amount: <?php echo number_format($history->amount); ?></h3>
                            <p>Loan type: <?php echo $history->loan_type; ?></p>
                            <p>Repayment status: <?php echo $history->loan_status; ?></p>
                            <p>Repayment Schedule: Monthly</p>
                            <a type="button" href="./loan_details.php?id=<?php echo $history->_id; ?>" class="btn btn-success">View details</a>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>

<?php
require '../client.php';
require './config/database.php';

if(isset($_GET['id'])){
    $loanid = $_GET['id'];
    // @ts-ignore
    // @phpstan-ignore-next-line
    $loanObjectId = new MongoDB\BSON\ObjectId($loanid);
}else{
    header("location:".home."explore.php");
    exit();
}
$loandetail = $loan->findOne(
    ['_id' => $loanObjectId]
);
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
            <div class="navbar container-fluid text-bg-dark top-bar">
                <div class="intro-top">
                <i class="fa-solid fa-bars text-white menu-toggle bg-success p-1  rounded" id="toggler">Menu</i>
                    Loan details
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
            <div class="text-bg-dark w-98 rounded-2 grid-2">
                <div class="explore-loan">
                    <div class="explore-profile">
                        <img src="https://cdn.pixabay.com/photo/2017/08/30/07/56/money-2696229_640.jpg" alt="">
                    </div>
                    <div class="explore-details">
                        <h2 class="max"><?php echo $loandetail['name']; ?></h2>
                        <h3 class="max">Loan Amount: ksh. <?php echo number_format($loandetail['amount']);?></h3>
                        <div class="flex-10">
                            <p class="min">Approval : <?php echo $loandetail['approval']; ?></p>
                            <p class="min">Colateral: <?php echo $loandetail['collateral']; ?></p>

                        </div>
                        <h2><?php echo $loandetail['process']; ?></h2>
                        
                    </div>
                </div>
                <div class="explore-actions">
                <div class="explore-rating">
                    <p class="max">Interest rate : <?php echo $loandetail['interest_rate']; ?>%</p>
                    <p class="max"><?php echo $loandetail['service_quality']; ?></p>
                    <p class="min">Period: <?php echo $loandetail['loan_duration']; ?> months</p>
                    <p class="min">Apllicants: 
                        <?php
                     if(isset($loandetail['applicant'])){
                        echo $loandetail['applicant'];
                     }else{
                        echo "1";
                     }
                     ?> applicant(s)</p>
                    <p class="min">Popularity: 
                    <?php
                     if(isset($loandetail['rating'])){
                        echo $loandetail['rating'];
                     }else{
                        echo "0";
                     }
                     ?>
                         </p>
                </div>
                <div class="explore-action w-100">
                    <div class="like grid-2 w-100">
                        <a href="#" type="button" class="btn-btn-primary"><img src="https://img.icons8.com/?size=100&id=63261&format=png&color=000000" alt=""></a>
                        <a href="#" type="button" class="btn-btn-primary"><img src="https://img.icons8.com/?size=100&id=6CyuSVH1KEji&format=png&color=F70707" alt=""></a>

                    </div>
                </div>
                <div class="apply">
                    <a href="./loan_apply.php?id=<?php echo $loanObjectId; ?>" class="btn btn-success ">Apply loan</a>
                    <a href="./explore.php" class="btn btn-primary">Go back</a>
                </div>
                </div>
            </div>
            <!-- do not touch  -->
           <div class="w-98 text-bg-dark">
            <h1>Terms and conditions</h1>
            <h3>1. Loan Amount and Purpose:</h3>
            <p class="min">- The Loan shall is a <?php echo $loandetail['type']; ?>.</p>
            <p class="min">- The Loan amount shall be Ksh. <?php echo number_format($loandetail['amount']); ?>.</p>
            
            <h3>2. Interest Rate:</h3>
            <p class="min">- The interest rate on the Loan shall be <?php echo $loandetail['interest_rate']; ?> per annum.</p>
            
            <h3>3. Repayment Schedule:</h3>
            <p class="min">- The Borrower shall repay the Loan in [insert number] installments of [insert amount] each.</p>
            <p class="min">- The first installment shall be due a month after application, and subsequent installments shall be on a mothly interval.</p>
            
            <h3>4. Prepayment:</h3>
            <p class="min">- The Borrower may prepay the Loan, in whole or in part, at any time without penalty.</p>
            
            <h3>5. Late Payments:</h3>
            <p class="min">- In the event of late payment, the Borrower shall be liable to pay late fees as per the terms agreed upon.</p>
            
            <h3>6. Security:</h3>
            <p class="min">- The Loan shall be secured using the specified collateral .</p>

            <h3>7. Default:</h3>
            <p class="min">- If the Borrower fails to make any payment when due or breaches any other provision of these Terms, the Loan shall be considered in default, and the Lender may take appropriate legal action to recover the outstanding amount.</p>

            <h3>8. Amendments:</h3>
            <p class="min">- These Terms may be amended by mutual agreement between the Lender and the Borrower in writing.</p>

            <h3>9. Governing Law and Jurisdiction:</h3>
            <p class="min">- These Terms shall be governed by and construed in accordance with the laws of [insert jurisdiction]. Any dispute arising out of or in connection with these Terms shall be subject to the exclusive jurisdiction of the courts of [insert jurisdiction].</p>

            <h3>10. Severability:</h3>
            <p class="min">- If any provision of these Terms is found to be invalid or unenforceable, the remaining provisions shall remain in full force and effect.</p>

            <h3>11. Entire Agreement:</h3>
            <p class="min">- These Terms constitute the entire agreement between the parties with respect to the subject matter hereof and supersede all prior agreements and understandings, whether oral or written.</p>

           </div>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>
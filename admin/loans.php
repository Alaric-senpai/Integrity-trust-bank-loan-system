<?php
require '../client.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loans management</title>
    <?php require '../favicon.php' ?>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="text-bg-dark">
    <div class="container-full">
        <?php require './config/sidebar.php' ?>
        <div class="content">
            <?php
            if(isset($_SESSION['loan_ok'])){

            
            ?>
                <div class="alert alert-success alert-dismissible notice">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Success!</strong> <?php echo $_SESSION['loan_ok']; ?>
                </div>
            <?php
            unset($_SESSION['loan_ok']);
            }
            ?>
        <div class="w-98 ">
            <h4>Loan Listing</h4>
            
                <form action="./php/loan_listing.php" method="post" class="w-75 m-auto">
                    <div class="input-group mb-3">
                        <label for="name" class="input-group-text text-bg-success text-white">Loan Name</label>
                        <input type="text" name="name" id="name" required class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <label for="type" class="input-group-text text-bg-success text-white">Loan Type</label>
                        <input type="text" name="type" id="type" required class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <label for="interest" class="input-group-text text-bg-success text-white">Loan interest rate (P/A) </label>
                        <input type="number" name="interest" id="interest" required class="form-control" step="0.1">
                    </div>
                    <div class="input-group mb-3">
                        <label for="amount" class="input-group-text text-bg-success text-white">Loan amount</label>
                        <input type="number" name="amount" id="amount" required class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <label for="duration" class="input-group-text text-bg-success text-white">Loan duration months</label>
                        <input type="number" name="duration" id="duration" required class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <label for="applicant" class="input-group-text text-bg-success text-white">N0 of co-signers</label>
                        <input type="number" name="applicant" id="applicant" required class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <label for="process" class="input-group-text text-bg-success text-white">Application process</label>
                        <input type="text" name="process" id="process" required class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <label for="approval" class="input-group-text text-bg-success text-white">Approval </label>
                        <input type="text" name="approval" id="approval" required class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <label for="colateral" class="input-group-text text-bg-success text-white">Colateral</label>
                        <input type="text" name="colateral" id="colateral" required class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <label for="quality" class="input-group-text text-bg-success text-white">Service quality</label>
                        <input type="text" name="quality" id="quality" required class="form-control">
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="check1" name="co_signed" value="co_signed">
                        <label class="form-check-label" for="check1">Co-signed</label><br>

                        <input class="form-check-input" type="checkbox" id="check2" name="affordable" value="affordable">
                        <label class="form-check-label" for="check2">Affordable</label><br>

                        <input class="form-check-input" type="checkbox" id="check3" name="mortgage" value="mortgage">
                        <label class="form-check-label" for="check3">Mortgage</label><br>

                        <input class="form-check-input" type="checkbox" id="check4" name="instant" value="instant">
                        <label class="form-check-label" for="check4">Instant</label><br>

                        <input class="form-check-input" type="checkbox" id="check5" name="quick" value="quick">
                        <label class="form-check-label" for="check5">Quick</label><br>

                        <input class="form-check-input" type="checkbox" id="check6" name="emergency" value="emergency">
                        <label class="form-check-label" for="check6">Emergency</label><br>

                        <input class="form-check-input" type="checkbox" id="check7" name="consolidation" value="consolidation">
                        <label class="form-check-label" for="check7">Consolidation</label><br>

                        <input class="form-check-input" type="checkbox" id="check8" name="refinance" value="refinance">
                        <label class="form-check-label" for="check8">Refinance</label><br>

                        <input class="form-check-input" type="checkbox" id="check9" name="low_fee" value="low_fee">
                        <label class="form-check-label" for="check9">Low-fee</label><br>

                        <input class="form-check-input" type="checkbox" id="check10" name="cheap" value="cheap">
                        <label class="form-check-label" for="check10">Cheap</label>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="register" class="btn btn-primary" name="register">Register loan</button>
                    </div>
                </form>
        </div>
    </div>
</body>
</html>
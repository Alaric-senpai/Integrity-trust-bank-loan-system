<?php
require '../client.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <?php require '../favicon.php' ?>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="text-bg-dark">
    <div class="container-full">
        <?php require './config/sidebar.php' ?>
        <div class="content">
        <div class="alert alert-success alert-dismissible notice">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Success!</strong> Loan registered sucessfully
        </div>
        <div class="w-98 ">
            <h4>Loan Listing</h4>
            
                <form action="#" method="post" class="w-75 m-auto">
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
                        <input type="number" name="interest" id="interest" required class="form-control">
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
                        <label for="amount" class="input-group-text text-bg-success text-white">Loan amount</label>
                        <input type="number" name="amount" id="amount" required class="form-control">
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
                        <input class="form-check-input" type="checkbox" id="check1" name="student" value="student">
                        <label class="form-check-label" for="check1">Student</label><br>

                        <input class="form-check-input" type="checkbox" id="check2" name="payday" value="payday">
                        <label class="form-check-label" for="check2">Payday</label><br>

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

                        <input class="form-check-input" type="checkbox" id="check9" name="collateral" value="collateral">
                        <label class="form-check-label" for="check9">Collateral</label><br>

                        <input class="form-check-input" type="checkbox" id="check10" name="online" value="online">
                        <label class="form-check-label" for="check10">Online</label>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="register" class="btn btn-primary">Register loan</button>
                    </div>
                </form>
        </div>
    </div>
</body>
</html>
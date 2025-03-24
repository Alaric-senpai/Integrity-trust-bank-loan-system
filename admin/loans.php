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
            
            <form action="./php/loan_listing.php" method="post" class=" p-4 rounded shadow-lg">
                    <div class="mb-3">
                        <label for="name" class="form-label">Loan Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Loan Type</label>
                        <input type="text" name="type" id="type" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="interest" class="form-label">Loan Interest Rate (P/A)</label>
                        <input type="number" name="interest" id="interest" class="form-control" step="0.1" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Loan Amount</label>
                        <input type="number" name="amount" id="amount" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Loan Duration (Months)</label>
                        <input type="number" name="duration" id="duration" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="applicant" class="form-label">Number of Co-signers</label>
                        <input type="number" name="applicant" id="applicant" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="process" class="form-label">Application Process</label>
                        <input type="text" name="process" id="process" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="approval" class="form-label">Approval</label>
                        <input type="text" name="approval" id="approval" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="colateral" class="form-label">Collateral</label>
                        <input type="text" name="colateral" id="colateral" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="quality" class="form-label">Service Quality</label>
                        <input type="text" name="quality" id="quality" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Loan Features</label>
                        <div class="row row-cols-2 row-cols-md-3 g-2">
                            <?php 
                            $features = ["co_signed" => "Co-signed", "affordable" => "Affordable", "mortgage" => "Mortgage", 
                                         "instant" => "Instant", "quick" => "Quick", "emergency" => "Emergency", 
                                         "consolidation" => "Consolidation", "refinance" => "Refinance", 
                                         "low_fee" => "Low-fee", "cheap" => "Cheap"];
                            foreach ($features as $key => $label): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="<?php echo $key; ?>" name="<?php echo $key; ?>" value="<?php echo $key; ?>">
                                    <label class="form-check-label" for="<?php echo $key; ?>"> <?php echo $label; ?> </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="register" class="btn btn-primary">Register Loan</button>
                    </div>
                </form>
        </div>
    </div>
</body>
</html>
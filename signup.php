<?php 
require 'client.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integity Bank Signup</title>
    <?php require 'favicon.php';
     ?>
    <link rel="stylesheet" href="css/login.css">
</head>
<body class="bg-secondary">
    <div class="container-fluid">
    <?php
            if(isset($_SESSION['error'])){

            
            ?>
                <div class="alert alert-success alert-dismissible notice">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Notice!</strong> <?php echo $_SESSION['error']; ?>
                </div>
            <?php
            unset($_SESSION['error']);
            }
            ?>
    <form action="./signupverify.php" method="post" class="needs-validation w-50 text-bg-dark p-3 rounded-3 m-auto mt-5 d-grid">
    <div class="mb-1">
        
        </div>
        <div class="mb-3 text-center">
            <a href="index.php" class="f-bold m-2 fs-1 text-decoration-none">Integrity Trust Bank</a>
            <h3 class="h1 w-100 text-center f-bold fs-1 lh-1">SIGNUP</h3>
        </div>
        <!-- <div class="mb-3">
            <label for="idnum" class="from-label">Id Number</label>
            <input type="number" name="idnum" id="idnum" class="form-control">
        </div> -->
        <div class="mb-3">
            <label for="phone" class="form-label">Phone number</label>
            <input type="number" name="phone" id="phone" class="form-control" placeholder="start with country code no plus sign">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label mb-1 text-center w-100 ">Email</label>
            <input type="email" name="email" id="email" class="form-control w-100" required>
        </div>
        <div class="mb-3 position-relative">
            <label for="password" class="form-label w-100 text-center mb-2">Password</label>
            <input type="password" name="password" id="password" class="form-control w-90 password"><i class="fa-regular fa-eye show p-2 rounded" required></i>
        </div>
        <div class="mb-3 position-relative">
            <label for="cpassword" class="form-label w-100 text-center mb-2">Password</label>
            <input type="password" name="cpassword" id="cpassword" class="form-control w-90 password"><i class="fa-regular fa-eye show p-2 rounded" required></i>
        </div>
        <div class="mb-3 w-100 text-center">
            <button type="submit" name="signup" class="btn btn-success w-25">Signup</button>
        </div>
        <div class="mb-3 text-center">
            <p>Already have an account <a href="./login.php">Signup Now</a></p>
        </div>
        
    </form>
    </div>
    <script src="js/password.js"></script>
</body>
</html>
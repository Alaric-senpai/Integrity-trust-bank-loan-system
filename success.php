<?php

require 'client.php';

if(!isset($_SESSION['regok'])){
    header("location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucessfull signup</title>
    <?php require 'favicon.php'; ?>
</head>
<body class="text-bg-dark p-5">
    <div class="container text-bg-primary d-flex w-50 p-3 align-items-center justify-content-center flex-column rounded-2">
        <p class="alert alert-info">
            <?php echo $_SESSION['regok']; ?> <br>
        </p>
        <a href="./login.php" class="btn btn-success">Login Now</a>
    </div>
</body>
</html>
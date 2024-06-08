<?php
require '../client.php';
require './config/database.php';
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
            <div class="w-98 p-3 hello rounded-2 mt-2">
                <h2>Hello <?php echo $user['username']; ?></h2>
            </div>
        <div class="intro w-98">
                <div class="row text-white g-2">
                    <div class="col4">
                        <h3>Registered loans</h3>
                        <p>300+</p>
                    </div>
                    <div class="col4">
                        <h3>Registered customers</h3>
                        <p>12+</p>
                    </div>
                    <div class="col4">
                        <h3>Total income</h3>
                        <p>ksh. 1,200,000,000</p>
                    </div>
                </div>
                <div class="actions w-80">
                    <h3>Manage</h3>
                    <div class="links">
                        <a href="./admin_add.php" class="btn btn-success">Add admin</a>
                    </div>
                </div>
            </div>
        </div>     
        </div>
</body>
</html>
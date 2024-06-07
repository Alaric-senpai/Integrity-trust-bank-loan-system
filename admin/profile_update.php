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
            <form action="#" method="post" class="form w-80 p-4 bordered-2">
                <h2>Profile update</h2>
                <div class="mb-3">
                    <label class="form-label" for="fname">First name</label>
                    <input type="text" name="fname" id="fname" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="lname">Last name</label>
                    <input class="form-control" type="text" name="lname" id="lname">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="uname">Username</label>
                    <input class="form-control" type="text" name="uname" id="uname">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="idnum">Id number</label>
                    <input class="form-control" type="number" name="idnum" id="idnum">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="phone">Phone number</label>
                    <input class="form-control" type="number" name="phone" id="phone">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn  btn-success" name="update">Make changes</button>
                    <a href="./settings.php" type="button" class="btn btn-primary">Discard changes</a>
                </div>
            </form>
        </div>     
    </div>
</body>
</html>
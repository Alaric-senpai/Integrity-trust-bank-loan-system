<?php
require '../client.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile update</title>
    <?php require '../favicon.php' ?>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="text-bg-dark">
    <div class="container-full">
        <?php require './config/sidebar.php' ?>
        <div class="content">
            <form action="#" method="post" class="form w-80 p-4 bordered-2">
                <h2>Profile picture update</h2>
                <div class="mb-3">
                    <input type="file" name="picture" id="picture" class="form-control">
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
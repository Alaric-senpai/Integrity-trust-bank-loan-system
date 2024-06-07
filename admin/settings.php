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
        <div class="w-98 personal rounded-2 p-3">
            <div class="profile">
                <img src="http://m.gettywallpapers.com/wp-content/uploads/2023/11/Luffy-joyboy-Profile-Image.jpg" alt="">
            </div>
            <div class="details">
                <div class=" mb-3">
                    <label class="form-label">Username</label>
                    <p class="form-control">Alaric</p>
                </div>
                <div class=" mb-3">
                    <label class="form-label">First name</label>
                    <p class="form-control">Alaric</p>
                </div>
                <div class=" mb-3">
                    <label class="form-label">Last name</label>
                    <p class="form-control">Alaric</p>
                </div>
                <div class=" mb-3">
                    <label class="form-label">Phone number</label>
                    <p class="form-control">Alaric</p>
                </div>
                <div class=" mb-3">
                    <label class="">ID nmber</label>
                    <p class="form-control">Alaric</p>
                </div>
                <div class="mb-3">
                    <a href="./profile_update.php" class="btn btn-success">Make changes</a>
                    <a href="./profile_pic.php" class="btn btn-success">Change Profile picture</a>

                </div>
            </div>
        </div>
        </div>     
        </div>
</body>
</html>
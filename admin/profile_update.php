<?php
require '../client.php';
require './config/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Management</title>
    <?php require '../favicon.php'; ?>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="text-bg-dark">
    <div class="container-full">
        <?php require './config/sidebar.php'; ?>
        <div class="content">
            <?php
            if(isset($_SESSION['update'])){
            ?>
                <div class="alert alert-info alert-dismissible notice">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Alert!</strong> <?php echo $_SESSION['update']; ?>
                </div>
            <?php
                unset($_SESSION['update']);
            }
            ?>
            <form action="./php/profile_update.php" method="post" class="form w-80 p-4 bordered-2">
                <h2>Profile Update</h2>
                <div class="mb-3">
                    <label class="form-label" for="fname">First Name</label>
                    <input type="text" name="fname" id="fname" class="form-control" required value="<?php echo $user['firstname']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="lname">Last Name</label>
                    <input class="form-control" type="text" name="lname" id="lname" required value="<?php echo $user['lastname']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="uname">Username</label>
                    <input class="form-control" type="text" name="username" id="uname" required value="<?php echo $user['username']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="idnum">ID Number</label>
                    <input class="form-control" type="number" name="idnum" id="idnum" readonly required value="<?php echo $user['id_number']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="phone">Phone Number</label>
                    <input class="form-control" type="number" name="phone" id="phone" required value="<?php echo $user['phone_number']; ?>">
                </div>
                
                <div class="mb-3">
                    <button type="submit" class="btn btn-success" name="update">Make Changes</button>
                    <a href="./settings.php" type="button" class="btn btn-primary">Discard Changes</a>
                </div>
            </form>
        </div>     
    </div>
</body>
</html>

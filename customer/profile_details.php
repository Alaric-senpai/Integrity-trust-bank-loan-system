<?php
require '../client.php';
require './config/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer details</title>
    <?php require '../favicon.php'; ?>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/loan.css">
</head>
<body>
    <div class="container-full">
        <?php require './config/sidebar.php'; require 'invalid.php'; ?>
        <div class="content" id="content">
        <div class="make-payment w-98 text-bg-dark">
                <h1>Personal details</h1>
                <br><br>
                <h3>form</h3>
                <hr class="w-98 m-auto border-primary border-3">
                <form action="php/update_details.php" method="post" class="w-75 p-1">
                    <div class="mb-3 d-flex align-items-center flex-10 w-100 p-2">
                        <label for="name" class="form-label">Firstname</label>
                        <input type="text" name="name" id="name" required class="form-control w-50" value="<?php echo $user['firstname']; ?>">
                    </div>
                    <div class="mb-3 d-flex align-items-center flex-10 w-100 p-2">
                        <label for="sname" class="form-label">Lastname</label>
                        <input type="text" name="sname" id="sname" required class="form-control w-50" value="<?php echo $user['lastname']; ?>">
                    </div>
                    <div class="mb-3 d-flex align-items-center flex-10 w-100 p-2">
                        <label for="uname" class="form-label">Username</label>
                        <input type="text" name="uname" id="uname" required class="form-control w-50" value="<?php echo $user['username']; ?>">
                    </div>
                    
                    <div class="mb-3 d-flex align-items-center flex-10 w-100 p-2">
                        <label for="id_number" class="form-label">Id number</label>
                        <input type="number" name="id_number" id="id_number" required class="form-control w-50" value="<?php echo $user['id_number']; ?>" readonly>
                    </div>
                    <div class="mb-3 d-flex align-items-center flex-10 w-100 p-2">
                        <label for="phone" class="form-label">Phone number</label>
                        <input type="number" name="phone" id="phone" required class="form-control w-50" value="<?php echo $user['phone_number']; ?>">
                    </div>
                    <div class="mb-3 d-flex flex-10 w-100">
                        <button type="submit" class="btn btn-success" name="update">Update details</button>
                        <a type="button" href="./profile.php" class="btn btn-success">cancel</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>
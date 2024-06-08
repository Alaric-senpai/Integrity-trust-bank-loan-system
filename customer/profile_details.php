<?php
require '../client.php';
require './config/database.php';

if(isset($user['firstname']) || !empty($user['firstname'])){
    $firstname = $user['firstname'];
}else{
    $firstname = "";
}
if(isset($user['lastname']) || !empty($user['lastname'])){
    $lastname = $user['lastname'];
}else{
    $lastname = "";
}
if(isset($user['username']) || !empty($user['username'])){
    $username = $user['username'];
}else{
    $username = "";
}
if(isset($user['id_number']) || !empty($user['id_number'])){
    $id_number = $user['id_number'];
}else{
    $id_number = "";
}
if(isset($user['phone_number']) || !empty($user['phone_number'])){
    $phone_number = $user['phone_number'];
}else{
    $phone_number = "";
}




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
    <style>
        .notice{
            position: fixed;
            top: 40px;
            right: 40px;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <div class="container-full">
        <?php require './config/sidebar.php'; require 'invalid.php'; ?>
        <div class="content" id="content">
        <?php
            if(isset($_SESSION['exists'])){

            
            ?>
                <div class="alert alert-success alert-dismissible notice">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Notice!</strong> <?php echo $_SESSION['exists']; ?>
                </div>
            <?php
            unset($_SESSION['exists']);
            }
            ?>
        <div class="make-payment w-98 text-bg-dark">
                <h1>Personal details</h1>
                <br><br>
                <h3>form</h3>
                <hr class="w-98 m-auto border-primary border-3">
                <form action="php/update_details.php" method="post" class="w-75 p-1">
                    <div class="mb-3 d-flex align-items-center flex-10 w-100 p-2">
                        <label for="name" class="form-label">Firstname</label>
                        <input type="text" name="name" id="name" required class="form-control w-50" value="<?php echo $firstname; ?>">
                    </div>
                    <div class="mb-3 d-flex align-items-center flex-10 w-100 p-2">
                        <label for="sname" class="form-label">Lastname</label>
                        <input type="text" name="sname" id="sname" required class="form-control w-50" value="<?php echo $lastname; ?>">
                    </div>
                    <div class="mb-3 d-flex align-items-center flex-10 w-100 p-2">
                        <label for="uname" class="form-label">Username</label>
                        <input type="text" name="uname" id="uname" required class="form-control w-50" value="<?php  echo $username; ?>">
                    </div>
                    
                    <div class="mb-3 d-flex align-items-center flex-10 w-100 p-2">
                        <label for="id_number" class="form-label">Id number</label>
                        <input type="number" name="id_number" id="id_number" required class="form-control w-50" value="<?php  echo $id_number; ?>" >
                    </div>
                    <div class="mb-3 d-flex align-items-center flex-10 w-100 p-2">
                        <label for="phone" class="form-label">Phone number</label>
                        <input type="number" name="phone" id="phone" required class="form-control w-50" value="<?php echo $phone_number; ?>">
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
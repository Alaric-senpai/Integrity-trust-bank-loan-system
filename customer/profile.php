<?php
require '../client.php';
require './config/database.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile page</title>
    <?php require '../favicon.php'; ?>
    <style>
        .notice{
            position: fixed;
            top: 40px;
            right: 40px;
            z-index: 1000;
        }
    </style>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-full">
        <?php require './config/sidebar.php'; require 'invalid.php'; ?>
        <div class="content" id="content">
            
            <div class="navbar container-fluid text-bg-dark top-bar">
                <div class="intro-top">
                <i class="fa-solid fa-bars text-white menu-toggle bg-success p-1  rounded" id="toggler">Menu</i>
                Profile
                </div>
                <div class="search-top d-flex  align-items-center justify-content-between me-2 ">
                    <div class="form">
                        <form action="#" method="post" class="d-flex">
                            <input type="search" name="search" id="search" class="form-control">
                            <button type="submit" class="btn btn-success">Search</button>
                        </form>
                    </div>
                    <div class="account d-flex mx-1">
                    <i class="fa-solid fa-user-tie text-white"></i>
                    
                    </div>
                </div>
            </div>
            <?php
            if(isset($_SESSION['updateok'])){

            ?>
                <div class="notice alert alert-danger alert-dismissible fade show p-2" role="alert">
                    <?php echo $_SESSION['updateok'];
                     unset($_SESSION['updateok']);
                    ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
                </div>
            <?php } 
            ?>
            <div class="profile m-3">
                <div class="prof-details text-bg-dark p-3">
                    <div class="profile-pic">
                        <div class="image img-thumbnail">
                            <img src="https://assets-global.website-files.com/5ec7dad2e6f6295a9e2a23dd/5edfa7c6604c77b1b4bd658a_profilephoto5.jpeg" alt="">
                        </div>
                        <div class="pic-details">
                            <p class="username">Loanuser1</p>
                            <a href="#">Change profile pic</a>
                        </div>
                    </div>
                    <div class="personal-info">
                        <div class="mb-3">
                            <p class="form-label">First name</p>
                            <p class="form-control"><?php echo $user['firstname']; ?></p>
                        </div>
                        <div class="mb-3">
                            <p class="form-label">Last name</p>
                            <p class="form-control"><?php echo $user['lastname']; ?></p>
                        </div>
                        <div class="mb-3">
                            <p class="form-label">Username</p>
                            <p class="form-control"><?php echo $user['username']; ?></p>
                        </div>
                        <div class="mb-3">
                            <p class="form-label">Email</p>
                            <p class="form-control"><?php echo $user['email']; ?></p>
                        </div>
                        <div class="mb-3">
                            <p class="form-label">Phone number</p>
                            <p class="form-control">+<?php echo $user['phone_number']; ?></p>
                        </div>
                        <div class="mb-3">
                            <p class="form-label">Id number</p>
                            <p class="form-control"><?php echo $user['id_number']; ?></p>
                        </div>
                        <div class="mb-3 w-100 btn-div">
                            <a href="./profile_details.php" type="button" class="btn btn-success">Make changes</a>
                        </div>
                    </div>
                </div>
                <div class="documents  d-flex flex-column h-100 ">
                    <div class="loan-documents d-flex flex-column w-100 p-3 text-bg-dark">
                        <h2>Loan Documents</h2>
                        <span class="mb-2 py-2 pb-3">
                            <span class="inside"><i class="fa-solid fa-file-pdf bg-success p-2"></i> Document 1.pdf</span><a href="https://file-examples.com/wp-content/storage/2017/10/file-sample_150kB.pdf" target="_blank" download="document sample 1" > View</a>
                        </span>
                        <span class="mb-2 py-2 pb-3">
                            <span class="inside"><i class="fa-solid fa-file-pdf bg-success p-2"></i> Document 2.pdf</span><a href="https://file-examples.com/wp-content/storage/2017/10/file-sample_150kB.pdf" target="_blank" download="document sample 1" > View</a>
                        </span>
                        <span class="mb-2 py-2 pb-3">
                            <span class="inside"><i class="fa-solid fa-file-pdf bg-success p-2"></i> Document 3.pdf</span><a href="https://file-examples.com/wp-content/storage/2017/10/file-sample_150kB.pdf" target="_blank" download="document sample 1" > View</a>
                        </span>
                        <span class="mb-2 py-2 pb-3">
                            <span class="inside"><i class="fa-solid fa-file-pdf bg-success p-2"></i> Document 4.pdf</span><a href="https://file-examples.com/wp-content/storage/2017/10/file-sample_150kB.pdf" target="_blank" download="document sample 1" > View</a>
                        </span>
                    </div>
                    <div class="proof-documents text-bg-dark w-100 d-flex flex-column p-3">
                        <h2>Identification documents</h2>
                        <span class="my-2 py-2 pb-3"><span class="inside"><i class="fa-solid fa-passport bg-success p-2"></i>Identity card</span><a href="#"> View/edit</a></span>
                        <span class="my-2 py-2 pb-3"><span class="inside"><i class="fa-solid fa-passport bg-success p-2"></i>Passport</span><a href="#"> View/edit</a></span>
                        <span class="my-2 py-2 pb-3"><span class="inside"><i class="fa-solid fa-passport bg-success p-2"></i>Bank statement</span><a href="#"> View/edit</a></span>
                        <div class="mb-3 w-100 btn-div">
                            <button type="button" class="btn btn-success">Add document</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>
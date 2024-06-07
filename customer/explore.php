<?php
require '../client.php';
if(!isset($_SESSION['token'])){
    header("location: login.php");
    exit();
}
$token = $_SESSION['token'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore loan options</title>
    <?php require '../favicon.php'; ?>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-full">
        <?php require './config/sidebar.php'; require 'invalid.php'; ?>
        <div class="content" id="content">
            <div class="navbar container-fluid text-bg-dark top-bar">
                <div class="intro-top">
                <i class="fa-solid fa-bars text-white menu-toggle bg-success p-1  rounded" id="toggler">Menu</i>
                    Explore
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
            <div class="loans text-white">
                <div class="loan ">
                    <div class="loan-image">
                        <img src="https://cdn.pixabay.com/photo/2017/08/30/07/56/money-2696229_640.jpg" alt="loan image">
                    </div>
                    <div class="description">
                        <p class="name">Loan express</p>
                        <p class="detail combine">Quick approval process</p>
                        <p class="combine"><span class="type">Express Loan</span> <span class="colateral">No colateral</span></p>
                        <p class="detail2">Convenient application process</p>
                        <p class="distro combine">Quick distributement</p>
                        <p class="tags mt-2">
                            <span class="tag bg-success p-2">#convenient</span>
                            <span class="tag bg-success p-2">#easy</span>
                        </p>
                    </div>
                    <div class="action">
                        <div class="feedback">
                            <div class="left">
                                <p class="rate">Good Service</p>
                                <p class="satisfied">5000 people</p>
                            </div>
                            <div class="rating bg-success p-3 rounded ">
                                9.7
                            </div>
                        </div>
                        <div class="details">
                            <div class="amount">
                                Ksh. 5000
                            </div>
                            <div class="duration">
                                <span class="time">5 years</span>
                                <span class="applicants">1 applicant</span>
                            </div>
                        </div>
                        <div class="act">
                            <a href="./explore_loan.php" class="btn btn-success">View details</a>
                        </div>
                    </div>
                </div>
                <div class="loan ">
                    <div class="loan-image">
                        <img src="https://images.freeimages.com/images/large-previews/61d/money-3-1423590.jpg?fmt" alt="loan image">
                    </div>
                    <div class="description">
                        <p class="name">Loan express</p>
                        <p class="detail combine">Quick approval process</p>
                        <p class="combine"><span class="type">Express Loan</span> <span class="colateral">No colateral</span></p>
                        <p class="detail2">Convenient application process</p>
                        <p class="distro combine">Quick distributement</p>
                        <p class="tags mt-2">
                            <span class="tag bg-success p-2">#convenient</span>
                            <span class="tag bg-success p-2">#easy</span>
                        </p>
                    </div>
                    <div class="action">
                        <div class="feedback">
                            <div class="left">
                                <p class="rate">Good Service</p>
                                <p class="satisfied">5000 people</p>
                            </div>
                            <div class="rating bg-success p-3 rounded ">
                                9.7
                            </div>
                        </div>
                        <div class="details">
                            <div class="amount">
                                Ksh. 5000
                            </div>
                            <div class="duration">
                                <span class="time">5 years</span>
                                <span class="applicants">1 applicant</span>
                            </div>
                        </div>
                        <div class="act">
                            <a href="#" class="btn btn-success">View details</a>
                        </div>
                    </div>
                </div>
                <div class="loan ">
                    <div class="loan-image">
                        <img src="https://img.freepik.com/premium-photo/hundred-dollars-bill-benjamin-franklin-selective-focus_94046-100.jpg?size=626&ext=jpg" alt="loan image">
                    </div>
                    <div class="description">
                        <p class="name">Loan express</p>
                        <p class="detail combine">Quick approval process</p>
                        <p class="combine"><span class="type">Express Loan</span> <span class="colateral">No colateral</span></p>
                        <p class="detail2">Convenient application process</p>
                        <p class="distro combine">Quick distributement</p>
                        <p class="tags mt-2">
                            <span class="tag bg-success p-2">#convenient</span>
                            <span class="tag bg-success p-2">#easy</span>
                        </p>
                    </div>
                    <div class="action">
                        <div class="feedback">
                            <div class="left">
                                <p class="rate">Good Service</p>
                                <p class="satisfied">5000 people</p>
                            </div>
                            <div class="rating bg-success p-3 rounded ">
                                9.7
                            </div>
                        </div>
                        <div class="details">
                            <div class="amount">
                                Ksh. 5000
                            </div>
                            <div class="duration">
                                <span class="time">5 years</span>
                                <span class="applicants">1 applicant</span>
                            </div>
                        </div>
                        <div class="act">
                            <a href="#" class="btn btn-success">View details</a>
                        </div>
                    </div>
                </div>
                <div class="loan ">
                    <div class="loan-image">
                        <img src="https://images.freeimages.com/images/large-previews/9b5/money-1-1238235.jpg?fmt" alt="loan image">
                    </div>
                    <div class="description">
                        <p class="name">Loan express</p>
                        <p class="detail combine">Quick approval process</p>
                        <p class="combine"><span class="type">Express Loan</span> <span class="colateral">No colateral</span></p>
                        <p class="detail2">Convenient application process</p>
                        <p class="distro combine">Quick distributement</p>
                        <p class="tags mt-2">
                            <span class="tag bg-success p-2">#convenient</span>
                            <span class="tag bg-success p-2">#easy</span>
                        </p>
                    </div>
                    <div class="action">
                        <div class="feedback">
                            <div class="left">
                                <p class="rate">Good Service</p>
                                <p class="satisfied">5000 people</p>
                            </div>
                            <div class="rating bg-success p-3 rounded ">
                                9.7
                            </div>
                        </div>
                        <div class="details">
                            <div class="amount">
                                Ksh. 5000
                            </div>
                            <div class="duration">
                                <span class="time">5 years</span>
                                <span class="applicants">1 applicant</span>
                            </div>
                        </div>
                        <div class="act">
                            <a href="#" class="btn btn-success">Apply Loan</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="more w-100 d-flex alin-items-center justify-content-center">
                <a href="./loan.php" class="btn ">Custom loan</a>
            </div>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>
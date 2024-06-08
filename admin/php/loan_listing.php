<?php 
require '../../client.php';
require '../config/database.php';

if(isset($_POST['register']) && $_SERVER['REQUEST_METHOD'] === "POST"){
    $loanname = $_POST['name'];
    $lnamount = $_POST['amount'];
    $lntype = $_POST['type'];
    $lnintr = $_POST['interest'];
    $lndurtn = $_POST['duration'];
    $approcess = $_POST['process'];
    $approval = $_POST['approval'];
    $colateral = $_POST['colateral'];
    $svquality = $_POST['quality'];
}
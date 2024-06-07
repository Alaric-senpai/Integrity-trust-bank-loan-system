<?php
session_start();
define("URL", "http://localhost:4200/");

require_once __DIR__ . '/vendor/autoload.php';

use MongoDB\Client;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

try{
    $url = "mongodb+srv://ckagenou96:shadowatomic@cluster0.ontkwwd.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0";

    $client = new MongoDB\Client($url);

    $database = $client->selectDatabase("integrity_bank");

}catch(Exception $e){
    echo $e->getMessage();
}

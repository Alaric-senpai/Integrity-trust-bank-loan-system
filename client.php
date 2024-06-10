<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
define("URL", "http://localhost:4200/");
date_default_timezone_set('Africa/Nairobi');
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


use MongoDB\Client;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

try{
    $url = $_ENV['MONGO_URL'];

    $client = new MongoDB\Client($url);

    $database = $client->selectDatabase("integrity_bank");

}catch(Exception $e){
    echo $e->getMessage();
}

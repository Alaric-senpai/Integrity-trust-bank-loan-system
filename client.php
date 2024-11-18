<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define constants
define("URL", "http://localhost:4200/");
date_default_timezone_set('Africa/Nairobi');

// Load Composer dependencies
require 'vendor/autoload.php';

// Load environment variables
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Import MongoDB and PHPMailer namespaces
use MongoDB\Client;
use MongoDB\Model\BSONArray;
use MongoDB\Model\BSONDocument;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

try {
    // MongoDB connection URL from environment variables
    $url = $_ENV['MONGO_URL'];

    // Initialize MongoDB client
    $client = new Client($url);

    // Select the database
    $database = $client->selectDatabase("integrity_bank");

    // Optional: Test connection (uncomment for debugging only)
    // $client->selectDatabase('admin')->command(['ping' => 1]);
    // echo "Connected to MongoDB successfully.";
} catch (Exception $e) {
    // Handle connection errors gracefully
    die("MongoDB Connection Error: " . $e->getMessage());
}

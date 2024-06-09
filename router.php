<?php
// router.php

// Define the base directory for your project
$baseDir = __DIR__;

// Get the requested file path
$requestUri = $_SERVER['REQUEST_URI'];
$file = $baseDir . $requestUri;

// Serve PHP files using the built-in server
if (pathinfo($file, PATHINFO_EXTENSION) === 'php' && file_exists($file)) {
    return false; // Let the built-in server handle PHP files
}

// Serve JavaScript files
if (pathinfo($file, PATHINFO_EXTENSION) === 'js' && file_exists($file)) {
    header('Content-Type: text/javascript');
    readfile($file);
    exit;
}

// If the file does not exist, return 404 Not Found
http_response_code(404);
echo "404 Not Found";

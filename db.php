<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ai_kshetra";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // Log error instead of showing it to user in production
    error_log("Connection failed: " . $conn->connect_error);
    die("Connection failed. Please try again later.");
}

// Set charset to utf8mb4 for security and proper character handling
$conn->set_charset("utf8mb4");
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ai_kshetra";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Drop existing tables
$conn->query("DROP TABLE IF EXISTS registrations_build_with_ai");
$conn->query("DROP TABLE IF EXISTS registrations_codewarz");
$conn->query("DROP TABLE IF EXISTS registrations_prompt_craft");
$conn->query("DROP TABLE IF EXISTS registrations_dream_frame");

// SQL to create tables
$sql_build = "CREATE TABLE registrations_build_with_ai (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    member1_name VARCHAR(50) NOT NULL,
    member1_email VARCHAR(50) NOT NULL,
    member1_phone VARCHAR(20) NOT NULL,
    member1_college VARCHAR(100) NOT NULL,
    member1_roll VARCHAR(50) NOT NULL,
    member2_name VARCHAR(50) NOT NULL,
    member2_email VARCHAR(50) NOT NULL,
    member2_phone VARCHAR(20) NOT NULL,
    member2_college VARCHAR(100) NOT NULL,
    member2_roll VARCHAR(50) NOT NULL,
    member3_name VARCHAR(50),
    member3_email VARCHAR(50),
    member3_phone VARCHAR(20),
    member3_college VARCHAR(100),
    member3_roll VARCHAR(50),
    member4_name VARCHAR(50),
    member4_email VARCHAR(50),
    member4_phone VARCHAR(20),
    member4_college VARCHAR(100),
    member4_roll VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$sql_code = "CREATE TABLE registrations_codewarz (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    member1_name VARCHAR(50) NOT NULL,
    member1_email VARCHAR(50) NOT NULL,
    member1_phone VARCHAR(20) NOT NULL,
    member1_college VARCHAR(100) NOT NULL,
    member1_roll VARCHAR(50) NOT NULL,
    member2_name VARCHAR(50),
    member2_email VARCHAR(50),
    member2_phone VARCHAR(20),
    member2_college VARCHAR(100),
    member2_roll VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$sql_prompt = "CREATE TABLE registrations_prompt_craft (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    participant_name VARCHAR(50) NOT NULL,
    participant_email VARCHAR(50) NOT NULL,
    participant_phone VARCHAR(20) NOT NULL,
    participant_college VARCHAR(100) NOT NULL,
    participant_roll VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$sql_dream = "CREATE TABLE registrations_dream_frame (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    participant_name VARCHAR(50) NOT NULL,
    participant_email VARCHAR(50) NOT NULL,
    participant_phone VARCHAR(20) NOT NULL,
    participant_college VARCHAR(100) NOT NULL,
    participant_roll VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql_build) === TRUE) {
    echo "Table registrations_build_with_ai created successfully<br>";
} else {
    echo "Error creating table registrations_build_with_ai: " . $conn->error . "<br>";
}

if ($conn->query($sql_code) === TRUE) {
    echo "Table registrations_codewarz created successfully<br>";
} else {
    echo "Error creating table registrations_codewarz: " . $conn->error . "<br>";
}

if ($conn->query($sql_prompt) === TRUE) {
    echo "Table registrations_prompt_craft created successfully<br>";
} else {
    echo "Error creating table registrations_prompt_craft: " . $conn->error . "<br>";
}

if ($conn->query($sql_dream) === TRUE) {
    echo "Table registrations_dream_frame created successfully<br>";
} else {
    echo "Error creating table registrations_dream_frame: " . $conn->error . "<br>";
}

$conn->close();
?>

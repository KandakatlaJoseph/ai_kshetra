<?php
include 'db.php';

// SQL to create tables (IF NOT EXISTS)
$sql_build = "CREATE TABLE IF NOT EXISTS registrations_build_with_ai (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    member1_name VARCHAR(50) NOT NULL,
    member1_email VARCHAR(50) NOT NULL,
    member1_phone VARCHAR(20) NOT NULL,
    member1_college VARCHAR(100) NOT NULL,
    member1_branch VARCHAR(100) NOT NULL,
    member1_roll VARCHAR(50) NOT NULL,
    member2_name VARCHAR(50) NOT NULL,
    member2_email VARCHAR(50) NOT NULL,
    member2_phone VARCHAR(20) NOT NULL,
    member2_college VARCHAR(100) NOT NULL,
    member2_branch VARCHAR(100) NOT NULL,
    member2_roll VARCHAR(50) NOT NULL,
    member3_name VARCHAR(50),
    member3_email VARCHAR(50),
    member3_phone VARCHAR(20),
    member3_college VARCHAR(100),
    member3_branch VARCHAR(100),
    member3_roll VARCHAR(50),
    member4_name VARCHAR(50),
    member4_email VARCHAR(50),
    member4_phone VARCHAR(20),
    member4_college VARCHAR(100),
    member4_branch VARCHAR(100),
    member4_roll VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY uq_build_leader_phone (member1_phone)
)";

$sql_code = "CREATE TABLE IF NOT EXISTS registrations_codewarz (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    member1_name VARCHAR(50) NOT NULL,
    member1_email VARCHAR(50) NOT NULL,
    member1_phone VARCHAR(20) NOT NULL,
    member1_college VARCHAR(100) NOT NULL,
    member1_branch VARCHAR(100) NOT NULL,
    member1_roll VARCHAR(50) NOT NULL,
    member2_name VARCHAR(50) NOT NULL,
    member2_email VARCHAR(50) NOT NULL,
    member2_phone VARCHAR(20) NOT NULL,
    member2_college VARCHAR(100) NOT NULL,
    member2_branch VARCHAR(100) NOT NULL,
    member2_roll VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY uq_code_leader_phone (member1_phone)
)";

$sql_prompt = "CREATE TABLE IF NOT EXISTS registrations_prompt_craft (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    participant_name VARCHAR(50) NOT NULL,
    participant_email VARCHAR(50) NOT NULL,
    participant_phone VARCHAR(20) NOT NULL,
    participant_college VARCHAR(100) NOT NULL,
    participant_branch VARCHAR(100) NOT NULL,
    participant_roll VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY uq_prompt_phone (participant_phone)
)";

$sql_dream = "CREATE TABLE IF NOT EXISTS registrations_dream_frame (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    participant_name VARCHAR(50) NOT NULL,
    participant_email VARCHAR(50) NOT NULL,
    participant_phone VARCHAR(20) NOT NULL,
    participant_college VARCHAR(100) NOT NULL,
    participant_branch VARCHAR(100) NOT NULL,
    participant_roll VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY uq_dream_phone (participant_phone)
)";

// Execute CREATE queries
if ($conn->query($sql_build) === TRUE) {
    echo "Table registrations_build_with_ai checked/created successfully<br>";
} else {
    echo "Error checking/creating table registrations_build_with_ai: " . $conn->error . "<br>";
}

if ($conn->query($sql_code) === TRUE) {
    echo "Table registrations_codewarz checked/created successfully<br>";
} else {
    echo "Error checking/creating table registrations_codewarz: " . $conn->error . "<br>";
}

if ($conn->query($sql_prompt) === TRUE) {
    echo "Table registrations_prompt_craft checked/created successfully<br>";
} else {
    echo "Error checking/creating table registrations_prompt_craft: " . $conn->error . "<br>";
}

if ($conn->query($sql_dream) === TRUE) {
    echo "Table registrations_dream_frame checked/created successfully<br>";
} else {
    echo "Error checking/creating table registrations_dream_frame: " . $conn->error . "<br>";
}

// Add columns if they don't exist (for existing tables)
$alter_queries = [
    "ALTER TABLE registrations_build_with_ai ADD COLUMN IF NOT EXISTS member1_branch VARCHAR(100) NOT NULL AFTER member1_college",
    "ALTER TABLE registrations_build_with_ai ADD COLUMN IF NOT EXISTS member2_branch VARCHAR(100) NOT NULL AFTER member2_college",
    "ALTER TABLE registrations_build_with_ai ADD COLUMN IF NOT EXISTS member3_branch VARCHAR(100) AFTER member3_college",
    "ALTER TABLE registrations_build_with_ai ADD COLUMN IF NOT EXISTS member4_branch VARCHAR(100) AFTER member4_college",
    
    "ALTER TABLE registrations_codewarz ADD COLUMN IF NOT EXISTS member1_branch VARCHAR(100) NOT NULL AFTER member1_college",
    "ALTER TABLE registrations_codewarz ADD COLUMN IF NOT EXISTS member2_branch VARCHAR(100) AFTER member2_college",
    
    "ALTER TABLE registrations_prompt_craft ADD COLUMN IF NOT EXISTS participant_branch VARCHAR(100) NOT NULL AFTER participant_college",
    
    "ALTER TABLE registrations_dream_frame ADD COLUMN IF NOT EXISTS participant_branch VARCHAR(100) NOT NULL AFTER participant_college",

    // Add Unique Keys if they don't exist (using IGNORE to avoid errors if key exists)
    "ALTER IGNORE TABLE registrations_build_with_ai ADD UNIQUE INDEX uq_build_leader_phone (member1_phone)",
    "ALTER IGNORE TABLE registrations_codewarz ADD UNIQUE INDEX uq_code_leader_phone (member1_phone)",
    "ALTER IGNORE TABLE registrations_prompt_craft ADD UNIQUE INDEX uq_prompt_phone (participant_phone)",
    "ALTER IGNORE TABLE registrations_dream_frame ADD UNIQUE INDEX uq_dream_phone (participant_phone)"
];

foreach ($alter_queries as $query) {
    if ($conn->query($query) === TRUE) {
        // success
    } else {
        // Ignore error if column exists (MariaDB < 10.2.1 doesn't support IF NOT EXISTS in ALTER, but we assume modern XAMPP)
        // echo "Error altering table: " . $conn->error . "<br>";
    }
}

$conn->close();
?>

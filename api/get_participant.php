<?php
/**
 * API Endpoint: Get Participant Details
 * 
 * Purpose: This endpoint receives POST requests from the Django college server
 * and returns participant details (name and college) based on mobile number and event name.
 * 
 * Expected POST Data:
 * {
 *   "mobile_number": "1234567890",
 *   "event_name": "Build with AI" or "CodeWarz"
 * }
 * 
 * Response Format:
 * Success: {"success": true, "name": "John Doe", "college": "ABC College"}
 * Error: {"success": false, "message": "Error description"}
 */

// Set headers for CORS and JSON response
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Allow all origins
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode([
        'success' => false,
        'message' => 'Only POST requests are allowed'
    ]);
    exit();
}

// Include database connection
require_once '../db.php';

// Get JSON input from request body
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Validate input data exists
if (!$data) {
    http_response_code(400); // Bad Request
    echo json_encode([
        'success' => false,
        'message' => 'Invalid JSON data'
    ]);
    exit();
}

// Extract and validate required parameters
$mobile_number = isset($data['mobile_number']) ? trim($data['mobile_number']) : '';
$event_name = isset($data['event_name']) ? trim($data['event_name']) : '';

// Validate mobile number (must be exactly 10 digits)
if (empty($mobile_number) || !preg_match('/^\d{10}$/', $mobile_number)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Invalid mobile number. Must be exactly 10 digits.'
    ]);
    exit();
}

// Validate event name and map to database table
$event_table_map = [
    'Build with AI' => 'registrations_build_with_ai',
    'CodeWarz' => 'registrations_codewarz'
];

if (empty($event_name) || !isset($event_table_map[$event_name])) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Invalid event name. Allowed values: "Build with AI", "CodeWarz"'
    ]);
    exit();
}

// Get the correct table name
$table_name = $event_table_map[$event_name];

// Prepare SQL query to fetch participant details
// We search by member1_phone (leader's phone number)
$sql = "SELECT member1_name, member1_college FROM $table_name WHERE member1_phone = ? LIMIT 1";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    http_response_code(500); // Internal Server Error
    error_log("Database prepare failed: " . $conn->error);
    echo json_encode([
        'success' => false,
        'message' => 'Database error occurred'
    ]);
    exit();
}

// Bind parameters and execute
$stmt->bind_param("s", $mobile_number);
$stmt->execute();
$result = $stmt->get_result();

// Check if participant found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    http_response_code(200); // OK
    echo json_encode([
        'success' => true,
        'name' => $row['member1_name'],
        'college' => $row['member1_college']
    ]);
} else {
    http_response_code(404); // Not Found
    echo json_encode([
        'success' => false,
        'message' => 'Participant not found for the given mobile number and event'
    ]);
}

// Clean up
$stmt->close();
$conn->close();
?>

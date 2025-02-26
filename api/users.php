<?php
header("Access-Control-Allow-Origin: *");  // Allow requests from any origin
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
// api/users.php
header('Content-Type: application/json');

// Sample user data
$users = [
    ['id' => 1, 'goals' => ["to toot", "to fart", "to tooty"], 'date' => date("l")],
    ['id' => 2, 'goals' => ['Jane Smith'], 'date' => date("l")]
];

// Return the user data as JSON;
echo json_encode($users);
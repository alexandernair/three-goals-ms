<?php
header("Access-Control-Allow-Origin: *");  // Allow requests from any origin
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
// api/users.php
header('Content-Type: application/json');

// Sample user data
$users = [
    ['id' => 1, 'name' => 'John Doe', 'description' => 'Goober'],
    ['id' => 2, 'name' => 'Jane Smith', 'description' => 'Funny']
];

// Return the user data as JSON
echo json_encode($users);
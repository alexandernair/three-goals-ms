<?php
// api/users.php
header('Content-Type: application/json');

// Sample user data
$users = [
    ['id' => 1, 'name' => 'John Doe'],
    ['id' => 2, 'name' => 'Jane Smith']
];

// Return the user data as JSON
echo json_encode($users);
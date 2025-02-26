<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Check the request method to ensure it is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the raw POST data (the body sent with the POST request)
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if the 'goals' array is provided in the request body
    if (isset($data['goals']) && is_array($data['goals'])) {
        $goals = $data['goals'];

        // You can process the goals array here (e.g., save it to the database or perform some logic)
        echo json_encode([
            'status' => 'success',
            'message' => 'Goals received successfully',
            'goals' => $goals,
        ]);
    } else {
        // If no goals array is provided, return an error
        echo json_encode([
            'status' => 'error',
            'message' => 'No valid goals array received',
        ]);
    }
} else {
    // If the request method is not POST, return an error message
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request method. Expected POST.',
    ]);
}
/*
function POST_GOALS($data){
    try {
        $pdo = new PDO('sqlite:./Data/my_database.db');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Prepare an SQL statement for insertion
        $stmt = $pdo->prepare("INSERT INTO users (name, description) VALUES (:name, :description)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
    
        // Execute the statement
        $name = 'John Doe';
        $description = 'Goober';
        $stmt->execute();
    
        echo "Record added successfully!";
    
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}*/
?>

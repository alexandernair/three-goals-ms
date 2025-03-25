
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Handle API requests
$method = $_SERVER["REQUEST_METHOD"];

if ($method === "GET") {
    // Fetch all habits
    $pdo = new PDO('sqlite:../Data/my_database.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM habits");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} elseif ($method === "POST") {
    // Get JSON input
    $pdo = new PDO('sqlite:../Data/my_database.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $data = json_decode(file_get_contents("php://input"), true);
    
    if (isset($data["habit"])) {
        // Insert new habit
        $stmt = $pdo->prepare("INSERT INTO habits (habit) VALUES (?)");
        $stmt->execute([$data["habit"]]);
        echo json_encode(["message" => "Habit added!"]);
    } elseif (isset($data["habit_id"], $data["date"], $data["completed"])) {
        // Update habit completion status
        $stmt = $pdo->prepare("INSERT INTO habit_tracking (habit_id, date, completed) VALUES (?, ?, ?)
                               ON CONFLICT(habit_id, date) DO UPDATE SET completed = excluded.completed");
        $stmt->execute([$data["habit_id"], $data["date"], $data["completed"]]);
        echo json_encode(["message" => "Progress updated!"]);
    }
}
?>

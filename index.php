<?php
// index.php - The entry point

echo "Welcome to my PHP backend!";

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
try {
    $pdo = new PDO('sqlite:./Data/my_database.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute a query
    $stmt = $pdo->query("SELECT * FROM users");

    // Fetch all rows
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: " . $row['id'] . " - Name: " . $row['name'] . " - Description: " . $row['description'] . "<br>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
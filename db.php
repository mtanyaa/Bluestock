<?php
// Database configuration
$host = '127.0.0.1';   // Use '127.0.0.1' for localhost
$port = '8889';        // MAMP MySQL default port
$username = 'root';    // MySQL username for MAMP
$password = 'root';    // MySQL password for MAMP
$dbname = 'Bluestock'; // Your database name

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Set the charset to utf8mb4 for full Unicode support
    $pdo->exec("SET NAMES 'utf8mb4'");
    
    // Optionally, check if the connection is successful
    echo "Connection successful!";
} catch (PDOException $e) {
    // If connection fails, display the error message
    echo "Connection failed: " . $e->getMessage();
}
?>
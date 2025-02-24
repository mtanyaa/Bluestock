<?php
require 'db.php';  // Include the database connection

// Check if a table name is provided in the URL
if (isset($_GET['table'])) {
    $table = $_GET['table'];

    // Prepare the SQL query to select all data from the selected table
    $stmt = $pdo->prepare("SELECT * FROM $table");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display table data
    if ($data) {
        echo "<h1>Data from Table: $table</h1>";
        echo "<table border='1'><tr>";

        // Display column headers
        foreach (array_keys($data[0]) as $column) {
            echo "<th>$column</th>";
        }
        echo "</tr>";

        // Display table rows
        foreach ($data as $row) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No data found in this table.</p>";
    }
} else {
    echo "<p>No table selected.</p>";
}
?>
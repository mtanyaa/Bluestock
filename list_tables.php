<?php
require 'db.php';  // Include the database connection

// Fetch all table names
function getTables() {
    global $pdo;
    $stmt = $pdo->query("SHOW TABLES");
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

$tables = getTables();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tables in Bluestock Database</title>
</head>
<body>
    <h1>Tables in Bluestock Database</h1>
    <ul>
        <?php foreach ($tables as $table): ?>
            <li><a href="view_table.php?table=<?php echo $table; ?>"><?php echo $table; ?></a></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
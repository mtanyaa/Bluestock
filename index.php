<?php
// Include the database connection from db.php
require 'db.php'; // This will include the db.php file and create the $pdo variable

// Fetch data from the four tables (balance_sheet, cash_flow, overview, profit_loss)
$overviewQuery = "SELECT * FROM overview LIMIT 1";
$profitLossQuery = "SELECT * FROM profit_loss LIMIT 1";
$balanceSheetQuery = "SELECT * FROM balance_sheet LIMIT 1";
$cashFlowQuery = "SELECT * FROM cash_flow LIMIT 1";

// Execute the queries using the $pdo connection
$overviewResult = $pdo->query($overviewQuery);
$profitLossResult = $pdo->query($profitLossQuery);
$balanceSheetResult = $pdo->query($balanceSheetQuery);
$cashFlowResult = $pdo->query($cashFlowQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Overview</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Financial Overview of Bluestock</h1>
</header>

<section>
    <h2>Company Information</h2>
    <p><strong>Symbol:</strong> BLU</p>
    <p><strong>Company Name:</strong> Bluestock</p>
    <p><strong>Website:</strong> <a href="https://www.bluestock.com" target="_blank">www.bluestock.com</a></p>
    
    <!-- Display Company Logo -->
    <img src="company_logo.jpg" alt="Company Logo">
</section>

<section>
    <h2>Financial Data</h2>

    <!-- Overview Section -->
    <h3>Company Overview</h3>
    <?php
    if ($overviewResult->rowCount() > 0) { // Use rowCount() for PDO
        $overviewRow = $overviewResult->fetch(PDO::FETCH_ASSOC);
        echo "<p><strong>Year:</strong> " . htmlspecialchars($overviewRow['year']) . "</p>";
        echo "<p><strong>Description:</strong> " . htmlspecialchars($overviewRow['description']) . "</p>";
    } else {
        echo "<p>No data available for Company Overview.</p>";
    }
    ?>

    <!-- Profit and Loss Section -->
    <h3>Profit & Loss</h3>
    <?php
    if ($profitLossResult->rowCount() > 0) { // Use rowCount() for PDO
        $profitLossRow = $profitLossResult->fetch(PDO::FETCH_ASSOC);
        echo "<p><strong>Year:</strong> " . htmlspecialchars($profitLossRow['year']) . "</p>";
        echo "<p><strong>Sales:</strong> ₹" . number_format($profitLossRow['sales'], 2) . "</p>";
        echo "<p><strong>Operating Profit:</strong> ₹" . number_format($profitLossRow['operating_profit'], 2) . "</p>";
        echo "<p><strong>Net Profit:</strong> ₹" . number_format($profitLossRow['net_profit'], 2) . "</p>";
    } else {
        echo "<p>No data available for Profit & Loss.</p>";
    }
    ?>

    <!-- Balance Sheet Section -->
    <h3>Balance Sheet</h3>
    <?php
    if ($balanceSheetResult->rowCount() > 0) { // Use rowCount() for PDO
        $balanceSheetRow = $balanceSheetResult->fetch(PDO::FETCH_ASSOC);
        echo "<p><strong>Year:</strong> " . htmlspecialchars($balanceSheetRow['year']) . "</p>";
        echo "<p><strong>Assets:</strong> ₹" . number_format($balanceSheetRow['assets'], 2) . "</p>";
        echo "<p><strong>Liabilities:</strong> ₹" . number_format($balanceSheetRow['liabilities'], 2) . "</p>";
    } else {
        echo "<p>No data available for Balance Sheet.</p>";
    }
    ?>

    <!-- Cash Flow Section -->
    <h3>Cash Flow</h3>
    <?php
    if ($cashFlowResult->rowCount() > 0) { // Use rowCount() for PDO
        $cashFlowRow = $cashFlowResult->fetch(PDO::FETCH_ASSOC);
        echo "<p><strong>Year:</strong> " . htmlspecialchars($cashFlowRow['year']) . "</p>";
        echo "<p><strong>Cash Inflow:</strong> ₹" . number_format($cashFlowRow['cash_inflow'], 2) . "</p>";
        echo "<p><strong>Cash Outflow:</strong> ₹" . number_format($cashFlowRow['cash_outflow'], 2) . "</p>";
    } else {
        echo "<p>No data available for Cash Flow.</p>";
    }
    ?>
</section>

<footer>
    <p>&copy; 2025 Bluestock Financial Data</p>
</footer>

</body>
</html>

<?php
// Close the database connection
$pdo = null;
?>
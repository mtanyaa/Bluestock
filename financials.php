<?php
// Include the database connection file
include('db.php');

// Define the company symbol
$companySymbol = 'INFY';  // Update with the correct symbol or use dynamic input

// Fetch company overview
$overviewStmt = $pdo->prepare("SELECT * FROM overview WHERE company_symbol = :symbol");
$overviewStmt->bindParam(':symbol', $companySymbol, PDO::PARAM_STR);
$overviewStmt->execute();
$overview = $overviewStmt->fetch(PDO::FETCH_ASSOC);

// Fetch Profit & Loss data
$profitLossStmt = $pdo->prepare("SELECT * FROM profit_loss WHERE company_symbol = :symbol");
$profitLossStmt->bindParam(':symbol', $companySymbol, PDO::PARAM_STR);
$profitLossStmt->execute();
$profitLoss = $profitLossStmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch Balance Sheet data
$balanceSheetStmt = $pdo->prepare("SELECT * FROM balance_sheet WHERE company_symbol = :symbol");
$balanceSheetStmt->bindParam(':symbol', $companySymbol, PDO::PARAM_STR);
$balanceSheetStmt->execute();
$balanceSheet = $balanceSheetStmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch Cash Flow data
$cashFlowStmt = $pdo->prepare("SELECT * FROM cash_flow WHERE company_symbol = :symbol");
$cashFlowStmt->bindParam(':symbol', $companySymbol, PDO::PARAM_STR);
$cashFlowStmt->execute();
$cashFlow = $cashFlowStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Overview</title>
</head>
<body>
    <header>
        <h1>Financial Overview of <?php echo htmlspecialchars($overview['company_name']); ?></h1>
    </header>

    <section class="company-overview">
        <h2>Company Information</h2>
        <p><strong>Symbol:</strong> <?php echo htmlspecialchars($overview['company_symbol']); ?></p>
        <p><strong>Company Name:</strong> <?php echo htmlspecialchars($overview['company_name']); ?></p>
        <p><strong>Website:</strong> <a href="<?php echo htmlspecialchars($overview['website']); ?>" target="_blank"><?php echo htmlspecialchars($overview['website']); ?></a></p>
        <img src="<?php echo htmlspecialchars($overview['logo']); ?>" alt="Company Logo">
    </section>

    <section class="financials">
        <h2>Financial Data</h2>

        <h3>Profit & Loss</h3>
        <?php if ($profitLoss): ?>
            <?php foreach ($profitLoss as $record): ?>
                <div>
                    <p><strong>Year:</strong> <?php echo htmlspecialchars($record['year']); ?></p>
                    <p><strong>Sales:</strong> <?php echo htmlspecialchars($record['sales']); ?></p>
                    <p><strong>Operating Profit:</strong> <?php echo htmlspecialchars($record['operating_profit']); ?></p>
                    <p><strong>Net Profit:</strong> <?php echo htmlspecialchars($record['net_profit']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No Profit & Loss data available.</p>
        <?php endif; ?>

        <h3>Balance Sheet</h3>
        <?php if ($balanceSheet): ?>
            <?php foreach ($balanceSheet as $record): ?>
                <div>
                    <p><strong>Year:</strong> <?php echo htmlspecialchars($record['year']); ?></p>
                    <p><strong>Assets:</strong> <?php echo htmlspecialchars($record['total_assets']); ?></p>
                    <p><strong>Liabilities:</strong> <?php echo htmlspecialchars($record['total_liabilities']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No Balance Sheet data available.</p>
        <?php endif; ?>

        <h3>Cash Flow</h3>
        <?php if ($cashFlow): ?>
            <?php foreach ($cashFlow as $record): ?>
                <div>
                    <p><strong>Year:</strong> <?php echo htmlspecialchars($record['year']); ?></p>
                    <p><strong>Cash Inflow:</strong> <?php echo htmlspecialchars($record['cash_from_operating_activity']); ?></p>
                    <p><strong>Cash Outflow:</strong> <?php echo htmlspecialchars($record['cash_from_financing_activity']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No Cash Flow data available.</p>
        <?php endif; ?>
    </section>
</body>
</html>
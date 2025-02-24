<?php
require 'db.php';  // Include database connection

// Fetch data from the `overview` table
function getCompanyData($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM overview WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);  // Returns company data
}

// Fetch Profit & Loss data
function getProfitLossData($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM profit_loss WHERE company_id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Returns all rows for Profit & Loss
}

// Fetch Balance Sheet data
function getBalanceSheetData($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM balance_sheet WHERE company_id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Returns all rows for Balance Sheet
}

// Fetch Cash Flow data
function getCashFlowData($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM cash_flow WHERE company_id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Returns all rows for Cash Flow
}

// Respond with JSON data
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $companyId = intval($_GET['id']);
    
    // Fetch company data
    $companyData = getCompanyData($companyId);
    
    if ($companyData) {
        // If company data exists, fetch financial data and send response
        $response = [
            'company' => $companyData,
            'profit_loss' => getProfitLossData($companyId),
            'balance_sheet' => getBalanceSheetData($companyId),
            'cash_flow' => getCashFlowData($companyId)
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // If company not found, return 404 error
        http_response_code(404);
        echo json_encode(['error' => 'Company not found']);
    }
} else {
    // Return an error if the request method is incorrect or 'id' is missing
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
}
?>
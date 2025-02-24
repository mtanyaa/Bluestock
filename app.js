document.addEventListener('DOMContentLoaded', function () {
    fetchFinancialData();
});

function fetchFinancialData() {
    fetch('http://localhost:8000/api.php?id=1') // Replace '1' with dynamic company ID if needed
        .then(response => response.json())
        .then(data => {
            let financialHTML = `<h3>Profit & Loss</h3>`;
            
            // Loop through the profit_loss data and create HTML
            data.profit_loss.forEach(record => {
                financialHTML += `
                    <div>
                        <p><strong>Year:</strong> ${record.year}</p>
                        <p><strong>Sales:</strong> ${record.sales}</p>
                        <p><strong>Operating Profit:</strong> ${record.operating_profit}</p>
                        <p><strong>Net Profit:</strong> ${record.net_profit}</p>
                    </div>
                    <hr>
                `;
            });

            // Add Balance Sheet data
            financialHTML += `<h3>Balance Sheet</h3>`;
            data.balance_sheet.forEach(record => {
                financialHTML += `
                    <div>
                        <p><strong>Year:</strong> ${record.year}</p>
                        <p><strong>Assets:</strong> ${record.assets}</p>
                        <p><strong>Liabilities:</strong> ${record.liabilities}</p>
                    </div>
                    <hr>
                `;
            });

            // Add Cash Flow data
            financialHTML += `<h3>Cash Flow</h3>`;
            data.cash_flow.forEach(record => {
                financialHTML += `
                    <div>
                        <p><strong>Year:</strong> ${record.year}</p>
                        <p><strong>Cash Inflow:</strong> ${record.cash_inflow}</p>
                        <p><strong>Cash Outflow:</strong> ${record.cash_outflow}</p>
                    </div>
                    <hr>
                `;
            });

            // Insert the generated HTML into the 'financial-data' section of the page
            document.getElementById('financial-data').innerHTML = financialHTML;
        })
        .catch(error => console.error('Error fetching financial data:', error));
}
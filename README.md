# BlueStock
# Bluestock Financial Analysis Platform

## Project Overview

Bluestock is a financial analysis platform that allows users to view detailed financial data about a company. The platform includes sections for the company overview, profit & loss statement, balance sheet, and cash flow data. This project is built using PHP for the backend and MySQL for the database.

## Features

The platform displays the following information:
1. **Overview**: 
   - Symbol (Company Short Name)
   - Company Logo
   - Company Name
   - TradingView chart link
   - Company description
   - Website and stock exchange profiles (NSE & BSE)
   - Face Value, Book Value, ROCE, and ROE

2. **Profit & Loss** (Last 13 Years):
   - Sales
   - Operating Profit
   - Net Profit
   - EPS
   - Dividend Payout %

3. **Balance Sheet** (Last 13 Years):
   - Equity Capital, Reserves, Borrowings, Total Liabilities, and Assets

4. **Cash Flow** (Last 13 Years):
   - Cash from Operating, Investing, and Financing Activities

## Technologies Used

- **Backend**: PHP
- **Database**: MySQL
- **Frontend**: HTML (for displaying the data)
- **Deployment**: GitHub, Google Cloud SQL (for MySQL database)

## Project Setup

### Prerequisites
1. **MAMP/WAMP/XAMPP**: For local testing with PHP and MySQL.
2. **Google Cloud SQL**: For production MySQL database deployment.
3. **GitHub**: For version control and deployment.

### Steps for Setup

1. **Database Setup**:
   - Import the `Bluestock.sql` file into your MySQL database.
   - Use the `db.php` file for the connection configuration.

2. **File Configuration**:
   - Update `db.php` with your database credentials (host, username, password, and database name).
   - `index.php` will retrieve and display the financial data from the database.

3. **Deployment**:
   - Push the project files (`db.php`, `index.php`, and others) to your GitHub repository.
   - For live deployment, host the PHP files on a web server and ensure the database is hosted (e.g., Google Cloud SQL).

## Usage

- After setting up the database and PHP files, navigate to `index.php` to view the Bluestock Financial Platform.
- The page will fetch data from the MySQL database and display it in a user-friendly format.
  
## Known Issues

- Make sure the database credentials are correctly set in `db.php` for the connection to work.

## License

This project is open-source and available under the MIT License.

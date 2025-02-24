-- Adminer 4.8.4 MySQL 8.0.40 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `balance_sheet`;
CREATE TABLE `balance_sheet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_symbol` varchar(10) NOT NULL,
  `year` int NOT NULL,
  `equity_capital` decimal(20,2) DEFAULT NULL,
  `reserves` decimal(20,2) DEFAULT NULL,
  `borrowings` decimal(20,2) DEFAULT NULL,
  `other_liabilities` decimal(20,2) DEFAULT NULL,
  `total_liabilities` decimal(20,2) DEFAULT NULL,
  `fixed_assets` decimal(20,2) DEFAULT NULL,
  `cwip` decimal(20,2) DEFAULT NULL,
  `investments` decimal(20,2) DEFAULT NULL,
  `other_assets` decimal(20,2) DEFAULT NULL,
  `total_assets` decimal(20,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `balance_sheet` (`id`, `company_symbol`, `year`, `equity_capital`, `reserves`, `borrowings`, `other_liabilities`, `total_liabilities`, `fixed_assets`, `cwip`, `investments`, `other_assets`, `total_assets`, `created_at`) VALUES
(1,	'INFY',	2023,	1000000.00,	2000000.00,	500000.00,	300000.00,	4000000.00,	500000.00,	100000.00,	200000.00,	150000.00,	4600000.00,	'2025-01-13 22:21:53'),
(2,	'INFY',	2023,	NULL,	NULL,	NULL,	NULL,	300000.00,	NULL,	NULL,	NULL,	NULL,	500000.00,	'2025-01-14 00:36:31');

DROP TABLE IF EXISTS `cash_flow`;
CREATE TABLE `cash_flow` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_symbol` varchar(10) NOT NULL,
  `year` int NOT NULL,
  `cash_from_operating_activity` decimal(20,2) DEFAULT NULL,
  `cash_from_investing_activity` decimal(20,2) DEFAULT NULL,
  `cash_from_financing_activity` decimal(20,2) DEFAULT NULL,
  `net_cash_flow` decimal(20,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `cash_flow` (`id`, `company_symbol`, `year`, `cash_from_operating_activity`, `cash_from_investing_activity`, `cash_from_financing_activity`, `net_cash_flow`, `created_at`) VALUES
(1,	'INFY',	2023,	2000000.00,	-300000.00,	50000.00,	1700000.00,	'2025-01-13 22:21:53'),
(2,	'INFY',	2023,	25000.00,	NULL,	5000.00,	NULL,	'2025-01-14 00:36:37');

DROP TABLE IF EXISTS `overview`;
CREATE TABLE `overview` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_symbol` varchar(10) NOT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `chart_link` varchar(255) DEFAULT NULL,
  `about_company` text,
  `website` varchar(255) DEFAULT NULL,
  `nse_profile` text,
  `bse_profile` text,
  `face_value` decimal(10,2) DEFAULT NULL,
  `book_value` decimal(10,2) DEFAULT NULL,
  `roce` decimal(5,2) DEFAULT NULL,
  `roe` decimal(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `overview` (`id`, `company_symbol`, `company_logo`, `company_name`, `chart_link`, `about_company`, `website`, `nse_profile`, `bse_profile`, `face_value`, `book_value`, `roce`, `roe`, `created_at`) VALUES
(1,	'INFY',	'https://example.com/logo.png',	'Infosys',	'https://www.tradingview.com/symbols/INFY/',	'Infosys is a global leader...',	'https://www.infosys.com',	'Infosys NSE Profile',	'Infosys BSE Profile',	5.00,	12.50,	18.40,	21.20,	'2025-01-13 22:21:53');

DROP TABLE IF EXISTS `profit_loss`;
CREATE TABLE `profit_loss` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_symbol` varchar(10) NOT NULL,
  `year` int NOT NULL,
  `sales` decimal(20,2) DEFAULT NULL,
  `expenses` decimal(20,2) DEFAULT NULL,
  `operating_profit` decimal(20,2) DEFAULT NULL,
  `opm_percentage` decimal(5,2) DEFAULT NULL,
  `other_income` decimal(20,2) DEFAULT NULL,
  `interest` decimal(20,2) DEFAULT NULL,
  `depreciation` decimal(20,2) DEFAULT NULL,
  `profit_before_tax` decimal(20,2) DEFAULT NULL,
  `tax_percentage` decimal(5,2) DEFAULT NULL,
  `net_profit` decimal(20,2) DEFAULT NULL,
  `eps` decimal(10,2) DEFAULT NULL,
  `dividend_payout_percentage` decimal(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `profit_loss` (`id`, `company_symbol`, `year`, `sales`, `expenses`, `operating_profit`, `opm_percentage`, `other_income`, `interest`, `depreciation`, `profit_before_tax`, `tax_percentage`, `net_profit`, `eps`, `dividend_payout_percentage`, `created_at`) VALUES
(1,	'INFY',	2023,	2500000.00,	800000.00,	1700000.00,	68.00,	50000.00,	20000.00,	30000.00,	1650000.00,	25.00,	1250000.00,	70.00,	40.00,	'2025-01-13 22:21:53'),
(2,	'INFY',	2023,	150000.00,	NULL,	30000.00,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	20000.00,	NULL,	NULL,	'2025-01-14 00:36:24');

-- 2025-01-14 01:06:47

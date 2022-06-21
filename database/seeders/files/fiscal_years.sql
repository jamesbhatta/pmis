-- phpMyAdmin SQL Dump
-- version 5.0.4deb2ubuntu5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 21, 2022 at 08:31 AM
-- Server version: 8.0.29-0ubuntu0.21.10.2
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sifaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `fiscal_years`
--

CREATE TABLE IF NOT EXISTS `fiscal_years` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_ad` date DEFAULT NULL,
  `end` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_ad` date DEFAULT NULL,
  `is_running` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fiscal_years`
--

INSERT INTO `fiscal_years` (`id`, `name`, `start`, `start_ad`, `end`, `end_ad`, `is_running`, `created_at`, `updated_at`) VALUES
(1, '२०७३/०७४', '2073-04-01', '2016-07-16', '2074-03-31', '2017-07-15', 0, '2020-12-21 11:32:46', '2022-02-19 15:06:18'),
(3, '२०७४/०७५', '2074-04-01', '2017-07-16', '2075-03-32', '2018-07-16', 0, '2020-12-21 12:07:23', '2022-02-19 15:06:18'),
(4, '२०७५/०७६', '2075-04-01', '2018-07-17', '2076-03-31', '2019-07-16', 0, '2020-12-21 12:08:09', '2022-02-19 15:06:18'),
(5, '२०७६/०७७', '2076-04-01', '2019-07-17', '2077-03-31', '2020-07-15', 0, '2020-12-21 12:09:11', '2022-02-19 15:06:18'),
(6, '२०७७/०७८', '2077-04-01', '2020-07-16', '2078-03-31', '2021-07-15', 0, '2020-12-21 12:10:12', '2022-02-19 15:06:18'),
(7, '२०७८/०७९', '2078-04-01', '2021-07-16', '2079-03-31', '2022-07-15', 1, '2021-07-18 13:58:04', '2022-02-19 15:06:18'),
(8, '२०७२/०७३', '2072-04-01', '2015-07-17', '2073-03-31', '2016-07-15', 0, '2020-12-20 13:25:01', '2022-02-19 15:06:18');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

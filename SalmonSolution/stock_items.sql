-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2023 at 11:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salmon_solution`
--

-- --------------------------------------------------------

--
-- Table structure for table `stock_items`
--

CREATE TABLE `stock_items` (
  `Code` varchar(4) DEFAULT NULL,
  `Description` varchar(30) NOT NULL,
  `Flavour` varchar(20) NOT NULL,
  `Size` int(11) NOT NULL,
  `Pallet_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_items`
--

INSERT INTO `stock_items` (`Code`, `Description`, `Flavour`, `Size`, `Pallet_qty`) VALUES
('B250', '[Guava 250 ml]', 'Berry', 250, 2880),
('B500', '[Guava 250 ml]', 'Berry', 500, 2550),
('G250', '[Guava 250 ml]', 'Guava', 250, 2880),
('G500', 'Guava 500 ml', 'Guava', 500, 2550),
('G750', 'Guava 750 ml', 'Guava', 750, 2220),
('M250', 'Mango 250 ml', 'Mango', 250, 2880),
('M500', 'Mango 500 ml', 'Mango', 500, 2550),
('M750', 'Mango 750 ml', 'Mango', 750, 2220),
('O250', 'Orange 250 ml', 'Orange', 250, 2880),
('O500', 'Orange 500 ml', 'Orange', 500, 2550),
('O750', 'Orange 750 ml', 'Orange', 750, 2220),
('P250', 'Peach 250 ml', 'Peach', 250, 2880),
('P750', 'Peach', 'Peach', 750, 2220);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

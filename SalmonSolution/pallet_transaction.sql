-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2023 at 11:06 PM
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
-- Table structure for table `pallet_transaction`
--

CREATE TABLE `pallet_transaction` (
  `id` int(11) NOT NULL,
  `pallet_id` varchar(10) NOT NULL,
  `pallet_description` varchar(30) NOT NULL,
  `expiry_date` varchar(35) NOT NULL,
  `stock_code` varchar(4) NOT NULL,
  `qty` int(11) NOT NULL,
  `flavour` varchar(20) NOT NULL,
  `size` int(11) NOT NULL,
  `layer_boards` int(11) NOT NULL,
  `pallet` varchar(10) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pallet_transaction`
--

INSERT INTO `pallet_transaction` (`id`, `pallet_id`, `pallet_description`, `expiry_date`, `stock_code`, `qty`, `flavour`, `size`, `layer_boards`, `pallet`, `date_created`, `username`) VALUES
(1, '202304id', 'Aprid', '2023-5-15', 'M500', 2550, 'Mango', 500, 4, 'plastic', '2023-04-25', 'sellop'),
(4, '202304id', 'Apr 0000', '2023-5-15', 'B250', 2880, 'Berry', 250, 2, 'wood', '2023-04-25', 'sellop'),
(5, '2023040000', 'Apr 0000', '2023-5-15', 'B250', 2880, 'Berry', 250, 2, 'wood', '2023-04-25', 'sellop'),
(6, '2023040000', 'Apr 0000', '2023-5-15', 'B250', 2880, 'Mango', 250, 4, 'wood', '2023-04-25', 'sellop'),
(7, '2023040000', 'Apr 0000', '2023-5-15', 'B250', 2880, 'Mango', 250, 4, 'wood', '2023-04-25', 'sellop'),
(8, '2023040000', 'Apr 0000', '2023-5-15', 'B250', 2880, 'Mango', 250, 4, 'wood', '2023-04-25', 'sellop'),
(9, '2023040000', 'Apr 0000', '2023-5-15', 'B250', 2880, 'Mango', 250, 4, 'wood', '2023-04-25', 'sellop'),
(10, '2023040000', 'Apr 0000', '2023-5-15', 'B250', 2880, 'Mango', 250, 4, 'wood', '2023-04-25', 'sellop'),
(11, '2023040000', 'Apr 0000', '2023-5-15', 'B250', 2880, 'Mango', 250, 4, 'wood', '2023-04-25', 'sellop');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pallet_transaction`
--
ALTER TABLE `pallet_transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pallet_transaction`
--
ALTER TABLE `pallet_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2025 at 04:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donorpage`
--

-- --------------------------------------------------------

--
-- Table structure for table `donorregistration`
--

DROP TABLE IF EXISTS `donorregistration`;
CREATE TABLE `donorregistration` (
  `Donor_id` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `dorr` enum('Donor','Receiver') NOT NULL,
  `Phone Number` int(10) NOT NULL,
  `E_mail` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Confirm password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donorregistration`
--

INSERT INTO `donorregistration` (`Donor_id`, `Name`, `dorr`, `Phone Number`, `E_mail`, `Password`, `Confirm password`) VALUES
(1, 'Kanika jain', 'Donor', 2147483647, 'Kanikaj0210@gmail.com', '$2y$10$86vx8m0Wn6OVPS5U7z0N1.BbLf1Wsu/bOh7JUvE0qKRU/6iX8fCu.', '$2y$10$86vx8m0Wn6OVPS5U7z0N1.BbLf1Wsu/bOh7JUvE0qKRU/6iX8fCu.'),
(2, 'Kanika jain', 'Receiver', 2147483647, 'Kaanikaj0210@gmail.com', '$2y$10$JgurK.xvhfM1fh3C5kTNQezDx3B1grVDZ0Y1GMewq4eqoaYrpRQIq', '$2y$10$JgurK.xvhfM1fh3C5kTNQezDx3B1grVDZ0Y1GMewq4eqoaYrpRQIq'),
(3, 'Kanika', 'Donor', 2147483647, 'Kanikaj20210@gmail.com', '$2y$10$97H2XaNJnoHslpaFcUt2AeP0gf5LxB7bT7THNcXCyFlWSRDL5b8FG', '$2y$10$97H2XaNJnoHslpaFcUt2AeP0gf5LxB7bT7THNcXCyFlWSRDL5b8FG');

-- --------------------------------------------------------

--
-- Table structure for table `foodentry`
--

DROP TABLE IF EXISTS `foodentry`;
CREATE TABLE `foodentry` (
  `food_name` varchar(50) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `location` varchar(300) NOT NULL,
  `contact` int(10) NOT NULL,
  `expiry` date NOT NULL,
  `status` enum('claimed','unclaimed') NOT NULL DEFAULT 'unclaimed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foodentry`
--

INSERT INTO `foodentry` (`food_name`, `quantity`, `location`, `contact`, `expiry`, `status`) VALUES
('Wheat', '2 kg', 'xyz', 1234567897, '2025-07-14', 'unclaimed'),
('Wheat', '2 kg', 'xyz', 1234567897, '2025-07-10', 'unclaimed');

-- --------------------------------------------------------

--
-- Table structure for table `fundraisers`
--

DROP TABLE IF EXISTS `fundraisers`;
CREATE TABLE `fundraisers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `News_update` varchar(500) DEFAULT NULL,
  `amount_raised` int(11) DEFAULT NULL,
  `goal_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fundraisers`
--

INSERT INTO `fundraisers` (`id`, `name`, `description`, `image_url`, `News_update`, `amount_raised`, `goal_amount`) VALUES
(3, 'xyz', 'qqqnbbbb', NULL, 'qqqqqqqqqqqqq', 10, 101000);

-- --------------------------------------------------------

--
-- Table structure for table `money`
--

DROP TABLE IF EXISTS `money`;
CREATE TABLE `money` (
  `id` int(100) NOT NULL,
  `Your Name` varchar(50) NOT NULL,
  `iden` enum('Donor','Receiver') NOT NULL,
  `Phone Number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `money`
--

INSERT INTO `money` (`id`, `Your Name`, `iden`, `Phone Number`) VALUES
(1, 'Kanika jain', '', '7000805873'),
(2, 'Kanika jain', '', '7000805873'),
(3, 'Kanika jain', '', '7000805873'),
(4, 'Kanika jain', 'Receiver', '7000805873'),
(5, 'Kanika jain', 'Donor', '7000805873');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donorregistration`
--
ALTER TABLE `donorregistration`
  ADD PRIMARY KEY (`Donor_id`),
  ADD UNIQUE KEY `UNIQUE` (`E_mail`),
  ADD UNIQUE KEY `E_mail` (`E_mail`);

--
-- Indexes for table `fundraisers`
--
ALTER TABLE `fundraisers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `money`
--
ALTER TABLE `money`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donorregistration`
--
ALTER TABLE `donorregistration`
  MODIFY `Donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fundraisers`
--
ALTER TABLE `fundraisers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `money`
--
ALTER TABLE `money`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

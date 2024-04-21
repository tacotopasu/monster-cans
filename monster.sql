-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 01:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monster`
--

-- --------------------------------------------------------

--
-- Table structure for table `cans`
--

CREATE TABLE `cans` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `day_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cans`
--

INSERT INTO `cans` (`id`, `name`, `image`, `description`, `day_added`) VALUES
(5, 'Ultra Blue', 'monster-ultra-blue[1].jpg', 'Comprada aqui: https://www.ubuy.com.pt/pt/product/6LNIHV20-monster-energy-drink-ultra-blue-16fl-oz-pack-of-16 <br> Importei-a no dia x-x-xxxx', '2024-04-07'),
(6, 'Pipeline Punch', '91H7J0Io5KL._AC_UL600_SR600,600_[1].jpg', 'Comprada aqui:https://www.amazon.com.br/dp/B0866BSTK3 <br> Importei-a no dia x-x-xxxx', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cans`
--
ALTER TABLE `cans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cans`
--
ALTER TABLE `cans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

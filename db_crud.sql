-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2019 at 10:41 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `emp_name` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'William Lyimo', 'Kibaha Mailimoja', '2019-09-19 00:00:00', '2019-09-18 21:00:00'),
(2, 'Magoti Marwa', 'Dodoma Mjini', '2019-09-19 00:00:00', '2019-09-18 21:00:00'),
(3, 'Baraka Itwadh', 'Dodoma Mjini', '2019-09-19 00:00:00', '2019-09-18 21:00:00'),
(4, 'Peter Lyimo', 'Himo Moshi', '2019-09-19 00:00:00', '2019-09-18 21:00:00'),
(5, 'Jason Derulo', 'Miami USA', '2019-09-20 11:45:07', '2019-09-20 09:45:07'),
(6, '50 cent', 'New york USA', '2019-09-20 11:45:44', '2019-09-20 09:45:44'),
(7, 'Joseph Magufuli', 'Dar es salaam', '2019-09-20 17:10:57', '2019-09-20 15:10:57'),
(8, 'Kassim Majaliwa', 'Dar es salaam', '2019-09-20 17:24:47', '2019-09-20 15:24:47'),
(9, 'Joseph Pombe Magufuli', 'Dar es salaam', '2019-09-20 18:47:34', '2019-09-20 16:47:34'),
(10, 'Joseph P Magufuli', 'Dar es salaam', '2019-09-20 18:51:34', '2019-09-20 16:51:34'),
(11, 'Joseph Pm Magufuli', 'Dar es salaam', '2019-09-20 18:54:16', '2019-09-20 16:54:16'),
(12, 'Joseph Pmbe Magufuli', 'Dar es salaam', '2019-09-20 19:08:30', '2019-09-20 17:08:30'),
(13, 'Joseph Pmbeo Magufuli', 'Dar es salaam', '2019-09-20 19:08:50', '2019-09-20 17:08:50'),
(14, 'Joseph Pmbeno Magufuli', 'Dar es salaam', '2019-09-20 19:09:14', '2019-09-20 17:09:14'),
(15, 'Justin Maleko', 'Moshi', '2019-09-20 19:14:09', '2019-09-20 17:14:09'),
(16, 'Samson', 'Arusha', '2019-09-20 22:20:53', '2019-09-20 20:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_code` varchar(15) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_code`, `product_name`, `product_price`) VALUES
('N22', 'Nokia 2.2', 270000),
('S2', 'Samsung', 450000);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `full_name` varchar(40) NOT NULL,
  `school_name` varchar(40) NOT NULL,
  `age` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `full_name`, `school_name`, `age`) VALUES
(1, 'William Lyimo', 'Mieresini', 27),
(2, 'Peter Simon', 'Mieresini', 23),
(3, 'Magoti Marwa', 'Ubungo', 35),
(4, 'Baraka Itwadh', 'Umbwe', 26),
(5, 'Rachel Lyimo', 'Mieresini', 20),
(6, 'Chacha Marwa', 'Tambaza', 26),
(7, 'Charles Magori', 'Same', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

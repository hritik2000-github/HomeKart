-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 07:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homekart`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `Order_id` int(100) NOT NULL,
  `Full_Name` text NOT NULL,
  `Phone_No` bigint(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Pay_Mode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_manager`
--

INSERT INTO `order_manager` (`Order_id`, `Full_Name`, `Phone_No`, `Email`, `Address`, `Pay_Mode`) VALUES
(26, 'Hritik Ranjan', 1234567890, 'hritikranjan.hr@gmail.com', 'Samastipur,Bihar', 'COD'),
(27, 'ISHIKA SINHA', 1234567890, 'sssinhaishika@gmail.com', 'Samastipur,Bihar', 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `ptype` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `qty` int(10) NOT NULL DEFAULT 0,
  `image` varchar(1024) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `ptype`, `name`, `price`, `qty`, `image`, `email`, `description`) VALUES
(19, 'watches', 'watch', 999, 1, 'mambawatches-ukJdqKqFcDA-unsplash.jpg', 'ishika@gmail.com', 'watch'),
(20, 'edibles', 'Laddoo', 99, 10, 'ladoo.jpg', 'hritik@gmail.com', 'Laddoo'),
(22, 'womens-clothing', 'kurti', 999, 5, 'w2.jpg', 'ishika@gmail.com', 'Women Clothing'),
(24, 'furniture', 'Premium Sofa', 19999, 2, 'furniture-2.jpg', 'ishika@gmail.com', 'Furnitures');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phonenumber` int(10) NOT NULL,
  `aadhar` int(20) NOT NULL,
  `pan` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `username`, `lastname`, `address`, `phonenumber`, `aadhar`, `pan`, `email`, `password`) VALUES
(1, 'ISHIKA ', 'SINHA', 'Samastipur,Bihar', 1234567890, 2147483647, 'ABCD2145', 'ishika@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'Hritik', 'iCABS', 'Samastipur,Bihar', 1234567890, 12345678, 'HR1234', 'hritikranjan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'hritik@gmail.com', 'iCABS', 'Samastipur,Bihar', 1234567890, 1234475960, 'HR12345', 'hritik@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'HR', 'ab', 'Samastipur,Bihar', 1234567890, 153748930, 'HR12345678', 'hritikhr@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email2` varchar(255) NOT NULL,
  `phonenumber` int(10) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `lastname`, `email2`, `phonenumber`, `dob`, `email`, `password`) VALUES
(1, 'a', '', '', 0, '0000-00-00', 'abcd@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'HRITIK', '', '', 0, '0000-00-00', 'hritik@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'HRITIK', 'RANJAN', '', 0, '0000-00-00', 'hr@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'ISHIKA ', 'SINHA', 'ishika@gmail.com', 1234567890, '2022-02-02', 'ishika@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 'Priyanka', 'Kumari', 'priyanka@gmail.com', 2147483647, '2022-02-02', 'priyanka@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 'Hritik', 'Ranjan', 'hritikranjan.hr@gmail.com', 1234567890, '2022-02-26', 'hritikranjan.hr@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(7, 'ISHIKA ', 'SINHA', 'sssinhaishika@gmail.com', 1234567890, '2022-02-26', 'sssinhaishika@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `Order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 08, 2021 at 07:19 AM
-- Server version: 5.7.34-0ubuntu0.18.04.1
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `preliminary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `roleId` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`, `roleId`, `status`) VALUES
(1, 'bhupindersingh75890@gmail.com', 'e6e061838856bf47e1de730719fb2609', 'admin', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `type` int(11) NOT NULL,
  `categoriesStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `email`, `type`, `categoriesStatus`) VALUES
(49, 'bhupindersingh75890@gmail.com', 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `email`, `password`, `phone`, `address`, `type`, `status`, `role`) VALUES
(2, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(3, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(4, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(5, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(6, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(7, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(8, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(9, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(10, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(11, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(12, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(13, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(14, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(15, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(16, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(17, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(18, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(19, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(20, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(21, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(22, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(23, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(24, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(25, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(26, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 1, 1, 0),
(28, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 2, 1, 0),
(29, 'fsdfsdfs', 'dfsdffsf@gmail.com', '', 23323, '213', 2, 1, 0),
(30, 'Bhupinder singh Gill', 'vinod@1wayit.co.uk', '', 7589000177, 'ropar', 2, 0, 0),
(31, 'Bhupinder singh Gill', 'test1234@yopmail.com', '', 7589000177, 'ropar', 2, 0, 0),
(32, 'Bhupinder singh Gill', 'test1234@yopmail.com', '', 7589000177, 'ropar', 2, 0, 0),
(33, 'Bhupinder singh Gill', 'test1234@yopmail.com', '', 7589000177, 'ropar', 2, 0, 0),
(34, 'Bhupinder singh Gill', 'test1234@yopmail.com', '', 7589000177, 'ropar', 2, 0, 0),
(35, 'Bhupinder singh Gill', 'test1234@yopmail.com', '', 7589000177, 'ropar', 2, 0, 0),
(36, 'Bhupinder singh Gill', 'test1234@yopmail.com', '', 7589000177, 'ropar', 2, 0, 0),
(37, 'Bhupinder singh Gill', 'test1234@yopmail.com', '', 7589000177, 'ropar', 2, 0, 0),
(38, 'Bhupinder singh Gill', 'vinod11111111@1wayit.co.uk', '', 7589000177, NULL, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `variation`
--

CREATE TABLE `variation` (
  `variationId` int(11) NOT NULL,
  `variationName` varchar(200) NOT NULL,
  `variationStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variation`
--

INSERT INTO `variation` (`variationId`, `variationName`, `variationStatus`) VALUES
(14, 'color', 1),
(15, 'size', 1),
(17, 'colorcnvn', 1),
(18, 'sfsfsdfsfsdf', 1),
(19, 'sfsfsdfsfsdf', 1),
(20, 'sfsfsdfsfsdf', 1),
(21, 'sfsfsdfsfsdf', 1),
(22, 'sfsfsdfsfsdf', 1),
(23, 'sfsfsdfsfsdf', 1),
(24, 'sfsfsdfsfsdf', 1),
(25, 'sfsfsdfsfsdf', 1),
(26, 'sfsfsdfsfsdf', 1),
(27, 'sfsfsdfsfsdf', 1),
(28, 'sfsfsdfsfsdf', 1),
(29, 'sfsfsdfsfsdf', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `variation`
--
ALTER TABLE `variation`
  ADD PRIMARY KEY (`variationId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `variation`
--
ALTER TABLE `variation`
  MODIFY `variationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 08:47 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `block`
--
CREATE DATABASE IF NOT EXISTS `block` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `block`;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `depName` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `depName`) VALUES
(1, 'Computer Science'),
(2, 'Library and Information Science'),
(3, 'Science and Laboratory Technology');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `course` varchar(30) NOT NULL,
  `dep` int(11) NOT NULL,
  `uType` varchar(200) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `nounce` varchar(30) NOT NULL,
  `phash` varchar(300) NOT NULL,
  `nhash` varchar(300) NOT NULL,
  `status` varchar(12) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `course`, `dep`, `uType`, `filename`, `nounce`, `phash`, `nhash`, `status`, `comments`) VALUES
(4, 'com 101', 1, 'examiner', '835.xlsx', '301', '000000000000000000000', '8e2ec7b5f4cb48334e2eb2c53f6c6491', 'Approve', ''),
(5, 'com 101', 1, 'auditor', '835.xlsx', '602', '8e2ec7b5f4cb48334e2eb2c53f6c6491', '0b81bb50ba39ddffda1f64ebb048d2b5', 'Approve', 'Good'),
(6, 'com 101', 1, 'exam-officer', '423.xlsx', '1204', '0b81bb50ba39ddffda1f64ebb048d2b5', 'b45f8d73cae7e48d95abfa1c2111811f', '', ''),
(10, 'com 213', 1, 'examiner', '516.xlsx', '376', '000000000000000000000', 'e67669bba8e8a5d1a3749ef7b9fd5550', 'Approve', ''),
(11, 'com 213', 1, 'auditor', '516.xlsx', '752', 'e67669bba8e8a5d1a3749ef7b9fd5550', 'aec630763477c161f56aeaee48e4bbda', '', ''),
(12, 'com 213', 1, 'exam-officer', '516.xlsx', '1504', 'aec630763477c161f56aeaee48e4bbda', '54700f5f64f098829ab05f3db21e1d5a', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `dep` varchar(11) NOT NULL,
  `course` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `dep`, `course`) VALUES
(1, 'admin@gmail.com', '32250170a0dca92d53ec9624f336ca24', 'admin', '', ''),
(2, 'exam@gmail.com', '32250170a0dca92d53ec9624f336ca24', 'examiner', '1', 'com 101, com 213'),
(3, 'auditor@gmail.com', '32250170a0dca92d53ec9624f336ca24', 'auditor', '1', ''),
(4, 'exaofficer@gmail.com', '32250170a0dca92d53ec9624f336ca24', 'exam-officer', '1', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

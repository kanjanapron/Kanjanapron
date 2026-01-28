-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2025 at 10:15 AM
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
-- Database: `4122db`
--
CREATE DATABASE IF NOT EXISTS `4122db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `4122db`;

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE `app` (
  `a_id` int(7) NOT NULL,
  `a_position` varchar(255) NOT NULL,
  `a_perfix` varchar(255) NOT NULL,
  `a_fullname` varchar(255) NOT NULL,
  `a_birthday` varchar(255) NOT NULL,
  `a_education` varchar(100) NOT NULL,
  `a_skills` text NOT NULL,
  `a_experience` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app`
--

INSERT INTO `app` (`a_id`, `a_position`, `a_perfix`, `a_fullname`, `a_birthday`, `a_education`, `a_skills`, `a_experience`) VALUES
(1, 'Data Analyst', '', 'สมศรี', '2009-07-08', 'ปริญญาตรี', '{skills}', '{experience}'),
(2, 'Software Developer', '', 'สมศรี', '2006-08-19', 'ปริญญาเอก', 'นอน', 'ไม่มี');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `r_id` int(7) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_phone` varchar(255) NOT NULL,
  `r_height` int(3) NOT NULL,
  `r_address` text NOT NULL,
  `r_birthday` varchar(255) NOT NULL,
  `r_color` varchar(50) NOT NULL,
  `r_major` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`r_id`, `r_name`, `r_phone`, `r_height`, `r_address`, `r_birthday`, `r_color`, `r_major`) VALUES
(1, 'กาญจนาภรณ์ วินทะไชย', '', 0, '', '', '', ''),
(2, 'สมชาย', '', 0, '', '', '', ''),
(3, 'สมชาย', '0821377815', 162, '', '', '', ''),
(4, 'สมชาย', '0821377815', 162, '', '', '', ''),
(5, 'สมศรี', '0821377815', 165, '122', '2004-06-12', '#611414', 'การตลาด');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app`
--
ALTER TABLE `app`
  MODIFY `a_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `r_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

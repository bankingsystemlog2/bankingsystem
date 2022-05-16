-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2022 at 12:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `request_contract`
--

CREATE TABLE `request_contract` (
  `id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `req_class` varchar(200) NOT NULL,
  `fname` text DEFAULT NULL,
  `mname` text DEFAULT NULL,
  `lname` text DEFAULT NULL,
  `type_of_contract` varchar(250) DEFAULT NULL,
  `department` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `date_of_request` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_contract`
--

INSERT INTO `request_contract` (`id`, `req_id`, `req_class`, `fname`, `mname`, `lname`, `type_of_contract`, `department`, `status`, `date_of_request`) VALUES
(1, 3033003, 'Employee', 'darryl', 'o', 'deleon', 'employee contract', 'HR1', 'pending', '2022-04-23 18:04:17'),
(2, 2554654, 'Employee', 'jon', 'f', 'doe', 'memorandum', 'CORE1', 'pending', '2022-04-23 18:39:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `request_contract`
--
ALTER TABLE `request_contract`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `request_contract`
--
ALTER TABLE `request_contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

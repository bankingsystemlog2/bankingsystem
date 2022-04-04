-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2022 at 01:38 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

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
-- Table structure for table `v_info`
--

CREATE TABLE `v_info` (
  `fleetid` int(20) NOT NULL,
  `v_category` int(11) NOT NULL,
  `v_model` varchar(100) CHARACTER SET latin1 NOT NULL,
  `v_year` int(5) NOT NULL,
  `v_color` varchar(60) CHARACTER SET latin1 NOT NULL,
  `v_regnum` varchar(50) CHARACTER SET latin1 NOT NULL,
  `v_serialnum` varchar(11) CHARACTER SET latin1 NOT NULL,
  `v_capacity` int(10) NOT NULL,
  `v_datepur` date DEFAULT NULL,
  `v_manu` varchar(100) CHARACTER SET latin1 NOT NULL,
  `v_enginetype` varchar(100) CHARACTER SET latin1 NOT NULL,
  `v_loc` varchar(100) CHARACTER SET latin1 NOT NULL,
  `v_fueltype` varchar(50) CHARACTER SET latin1 NOT NULL,
  `v_fuelcap` varchar(50) CHARACTER SET latin1 NOT NULL,
  `v_license` varchar(100) CHARACTER SET latin1 NOT NULL,
  `v_condition` varchar(100) CHARACTER SET latin1 NOT NULL,
  `v_avail` int(3) NOT NULL,
  `fleetimg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `v_info`
--

INSERT INTO `v_info` (`fleetid`, `v_category`, `v_model`, `v_year`, `v_color`, `v_regnum`, `v_serialnum`, `v_capacity`, `v_datepur`, `v_manu`, `v_enginetype`, `v_loc`, `v_fueltype`, `v_fuelcap`, `v_license`, `v_condition`, `v_avail`, `fleetimg`) VALUES
(7, 3, 'Starex', 2015, 'Gold', '5273423', '1234555', 9, '2017-03-23', 'Hyundai', 'Automatic', 'Baguio City', 'Diesel', '100L', '41231313', 'Good', 1, NULL),
(8, 3, 'a', 1, 'a', '1', '1', 1, '2022-04-18', 'a', 'a', 'a', 'a', '1', '2', 'good', 1, 'techies.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `v_info`
--
ALTER TABLE `v_info`
  ADD PRIMARY KEY (`fleetid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `v_info`
--
ALTER TABLE `v_info`
  MODIFY `fleetid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

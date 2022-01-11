-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 11:26 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `sec_dep` text NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `Body` text NOT NULL,
  `preparedby` text NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`id`, `title`, `sec_dep`, `date_from`, `date_to`, `Body`, `preparedby`, `status`, `date_created`) VALUES
(10, 'TEST2', 'QWE', '2022-01-12', '2022-01-25', 'QWER', 'QWE', 2, '2022-01-11'),
(11, 'Supplies', 'Warehouse', '2022-01-12', '2022-01-19', 'Stored 150 Facemask', 'admin', 3, '2022-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` int(10) NOT NULL,
  `module` varchar(150) NOT NULL,
  `action_taken` varchar(300) NOT NULL,
  `users_id` int(10) NOT NULL,
  `datetime_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `module`, `action_taken`, `users_id`, `datetime_created`) VALUES
(1, 'Vendor', 'User 1 Added new application form', 10, '2021-12-18 15:50:39'),
(2, 'vendor_delete.php', 'Delete a records where id is 53', 1, '2021-12-18 23:12:52'),
(3, 'vendor_delete.php', 'Delete a records where id is 55', 1, '2021-12-23 21:18:41'),
(4, 'vendor_delete.php', 'Delete a records where id is 56', 1, '2021-12-23 21:26:59'),
(5, 'vendor_delete.php', 'Delete a records where id is 57', 1, '2021-12-23 21:27:22'),
(6, 'vendor_delete.php', 'Delete a records where id is 58', 1, '2021-12-23 21:31:33'),
(7, 'vendor_delete.php', 'Delete a records where id is 59', 1, '2021-12-23 21:31:51'),
(8, 'fleet_addvehicle.php', 'New added record where model is asd', 1, '2021-12-27 20:17:16'),
(9, 'vendor_form.php', 'New added record where vendor is lester', 10, '2021-12-27 20:42:15'),
(10, 'vendor_approval.php', ' Record has been approved where vendor is Lester', 1, '2021-12-27 21:04:10'),
(11, 'vendor_approval.php', ' Record has been approved where vendor is Lester', 1, '2021-12-27 21:17:18'),
(12, 'vendor_form.php', 'New added record where vendor is qwerty', 10, '2021-12-27 21:19:09'),
(13, 'vendor_approval.php', ' Record has been Update where vendor is Qwerty', 1, '2021-12-27 21:19:33'),
(14, 'vendor_delete.php', 'Delete a records where id is 61', 1, '2022-01-07 17:15:45'),
(15, 'vendor_form.php', 'New added record where vendor is sa', 1, '2022-01-10 17:27:23'),
(16, 'vendor_form.php', 'New added record where vendor is sa', 1, '2022-01-10 17:29:01'),
(17, 'vendor_form.php', 'New added record where vendor is test', 1, '2022-01-10 17:30:07'),
(18, 'vendor_approval.php', ' Record has been Update where vendor is Lesterr', 1, '2022-01-10 18:07:49'),
(19, 'vendor_approval.php', ' Record has been Update where vendor is Sa', 1, '2022-01-10 20:30:04'),
(20, 'vendor_approval.php', ' Record has been Update where vendor is Lesterr', 1, '2022-01-10 20:30:22'),
(21, 'vendor_approval.php', ' Record has been Update where vendor is Lesterr', 1, '2022-01-10 20:30:26'),
(22, 'vendor_form.php', 'New added record where vendor is lester', 1, '2022-01-11 15:00:37'),
(23, 'vendor_approval.php', ' Record has been Update where vendor is Testing', 1, '2022-01-11 15:43:20'),
(24, 'vendor_delete.php', 'Delete a records where id is 76', 1, '2022-01-11 17:52:12'),
(25, 'vendor_delete.php', 'Delete a records where id is 78', 1, '2022-01-11 17:52:14'),
(26, 'vendor_delete.php', 'Delete a records where id is 79', 1, '2022-01-11 17:52:17'),
(27, 'vendor_approval.php', ' Record has been Update where vendor is James', 1, '2022-01-11 18:03:20'),
(28, 'vendor_delete.php', 'Delete a records where id is 82', 1, '2022-01-11 18:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(15) CHARACTER SET latin1 NOT NULL,
  `firstname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `address` text CHARACTER SET latin1 NOT NULL,
  `birthdate` date NOT NULL,
  `contact_info` varchar(100) CHARACTER SET latin1 NOT NULL,
  `gender` varchar(10) CHARACTER SET latin1 NOT NULL,
  `position_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `photo` varchar(200) CHARACTER SET latin1 NOT NULL,
  `create_on` date NOT NULL,
  `lastname` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_description` text NOT NULL,
  `Date_Created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `Date_Created`) VALUES
(1, 'facemask', 'standard quality', '2022-01-10 10:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
(1, 'Admin', 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '21bvuwk1.png', 1, '2022-01-11 18:07:54'),
(10, 'Peter', 'user', '12dea96fec20593566ab75692c9949596833adc9', 1, 'vmffvpxo10.jpg', 1, '2022-01-11 18:10:58'),
(11, 'Eddie Brock', 'venom', '93f792c9533345761d191e104743ac597f6c6806', 2, 'nu59ekud11.jpg', 1, '2021-08-11 18:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Admin', 1, 1),
(3, 'User', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` text NOT NULL,
  `Company` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `item_description` text NOT NULL,
  `Offer` varchar(250) NOT NULL,
  `Phone` int(11) NOT NULL,
  `users_id` int(11) UNSIGNED DEFAULT NULL,
  `statuss` int(1) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `product_id`, `Name`, `Address`, `Company`, `Email`, `item_description`, `Offer`, `Phone`, `users_id`, `statuss`, `category`) VALUES
(60, 0, 'Lester', '123asdawda', 'Adawdasd', 'Wadsd@gmail.com', '', '21312', 2147483647, 10, 1, '0'),
(62, 0, 'Qwerty', '123asdwqe', 'Asdwdad', 'As@gmail.com', '', '2141213', 12512312, 10, 2, '1'),
(63, 0, 'Sa', 'Sa', 'Sa', 'Sa@gmail.com', '', '15000', 123, 1, 2, '1'),
(64, 0, 'sa', 'sa', 'sa', 'sa', '', '12', 21, 1, 0, '0'),
(65, 0, 'test', '123asdwad', 'dwad', 'test@gmail.com', '', '124123', 0, 1, 0, '1'),
(74, 12, 'teste', 'asdwata', 'wdasdas', 'teste@gmail.com', '', '125123', 2147483647, NULL, 0, '1'),
(75, 0, 'lester', 'quezon city', 'asdwad', 'lester@gmail.com', '', '1251231', 5123123, NULL, 0, '1'),
(77, 0, 'lester', 'asdwad', 'asdwa', 'dasd', '', 'awdasd', 0, 1, 0, '1'),
(80, 1, 'Test', 'test', 'test', 'test@gmail.com', '', '21315123', 51231123, NULL, 0, '1'),
(81, 1, 'James', 'Asdawdasd', 'Awdasdwa', 'James@gmail.com', 'Item Description Test', '231251231', 2147483647, NULL, 1, '1'),
(83, 1, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 0, NULL, 0, '1'),
(84, 1, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 0, 10, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `v_info`
--

CREATE TABLE `v_info` (
  `fleetid` int(11) NOT NULL,
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
  `v_avail` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `v_info`
--

INSERT INTO `v_info` (`fleetid`, `v_category`, `v_model`, `v_year`, `v_color`, `v_regnum`, `v_serialnum`, `v_capacity`, `v_datepur`, `v_manu`, `v_enginetype`, `v_loc`, `v_fueltype`, `v_fuelcap`, `v_license`, `v_condition`, `v_avail`) VALUES
(1, 1, '1', 1, 'asd', '12', '13', 1, '2020-10-10', 'asd', 'a', 'asd', 'ad', '12', '123', 'ad', 0),
(2, 1, '2', 2019, 'asd', '1313', '1313`', 20, '2021-11-11', 'asd', 'dasd', 'asd', 'asd', '123', '131', 'asd', 0),
(3, 2, 'sa', 2020, 'blue', 'sa', 'sa', 0, '0000-00-00', 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', 0),
(4, 2, 'asd', 1, 'red', '123', '12456', 4, '2021-12-27', 'asdwa', 'asdwaga', 'asdwafaw', 'asdwaw', '12', '125124512', 'asdwaaw', 0),
(5, 2, 'asd', 1, 'red', '123', '421312', 1, '2020-10-10', 'adwad', 'asdgasd', 'qdasda', 'agasd', '132', '12123421', 'asdasdad', 0),
(6, 1, 'test', 12, 'red', '12512', '1231412', 123, '2020-10-10', 'wqe', 'qwe', 'qwe', 'qwe', 'qwe', '123141', 'qwasda', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_level` (`user_level`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_level` (`group_level`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_info`
--
ALTER TABLE `v_info`
  ADD PRIMARY KEY (`fleetid`),
  ADD KEY `v_category` (`v_category`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `v_info`
--
ALTER TABLE `v_info`
  MODIFY `fleetid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2022 at 04:50 AM
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
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `sec_dep` text NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `Body` text NOT NULL,
  `preparedby` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `urlpath` varchar(350) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`id`, `title`, `sec_dep`, `date_from`, `date_to`, `Body`, `preparedby`, `status`, `urlpath`, `date_created`) VALUES
(10, 'TEST2', 'QWE', '2022-01-12', '2022-01-25', 'QWER', '0', 1, '', '2022-01-11'),
(11, 'Supplies', 'Warehouse', '2022-01-12', '2022-01-19', 'Stored 150 Facemask', '0', 3, '', '2022-01-11'),
(12, 'testing', 'testing', '2022-01-11', '2022-01-19', 'testing', '0', 1, '', '2022-01-11'),
(13, 'Testing', 'Testing', '2022-01-11', '2022-01-19', 'Testing123', '0', 5, '', '2022-01-11'),
(14, 'testing', 'testing', '2022-01-11', '2022-01-19', 'testing2421', 'Antigua &amp; Barbuda', 2, 'uploads/Andrea Villamor.docx', '2022-01-11'),
(15, 'testtt', 'testtt', '2022-01-11', '2022-01-12', 'testttt', 'Antigua &amp; Barbuda', 1, 'uploads/CONCEPTUAL FRAMEWORK.docx', '2022-01-11'),
(16, 'tester', 'tester', '2022-01-11', '2022-01-13', 'tester', 'Armenia', 1, 'uploads/FORMAT.docx', '2022-01-11'),
(17, 'qsa', 'sa', '2022-01-13', '2022-01-12', 'sa', 'Azerbaijan', 1, 'uploads/helen.jpg', '2022-01-11'),
(18, 'qwrqw', 'qweqwr', '2022-01-11', '2022-01-20', 'qtqweqwe', 'Lester', 1, 'uploads/CONCEPTUAL FRAMEWORK.docx', '2022-01-11'),
(19, 'Qweasdwa', 'Qwrqwdasdwad', '2022-01-11', '2022-01-19', 'Aweqdasdwad', '0', 3, 'uploads/FORMAT.docx', '2022-01-11'),
(20, 'Papot', 'Papot', '2022-01-11', '2022-01-19', 'Papot Upload', '0', 3, 'uploads/Energy Pyramid.docx', '2022-01-11'),
(21, 'Eqwe', 'Rtqweq', '2022-01-11', '2022-01-12', 'Audit Papot', '0', 3, 'uploads/Andrea Villamor.docx', '2022-01-11'),
(22, 'New', 'New', '2022-02-21', '2022-02-22', 'New', '0', 3, 'uploads/VILLAMOR, JOHN LESTER VERSOZA eRenewal Form.pdf', '2022-02-20');

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
(7, 'vendor_delete.php', 'Delete a records where id is 59', 1, '2021-12-23 21:31:51');

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
(1, 'Admin', 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '7mne8gu71.jpg', 1, '2022-03-12 11:41:42'),
(10, 'Peter', 'user', '12dea96fec20593566ab75692c9949596833adc9', 2, 'vmffvpxo10.jpg', 1, '2021-10-14 18:19:58'),
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
-- Table structure for table `v_cate`
--

CREATE TABLE `v_cate` (
  `fleetid` int(20) NOT NULL,
  `vcateg` varchar(50) CHARACTER SET latin1 NOT NULL,
  `vnumber` int(11) NOT NULL,
  `vstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `v_cate`
--

INSERT INTO `v_cate` (`fleetid`, `vcateg`, `vnumber`, `vstatus`) VALUES
(1, 'Car', 1, 1),
(2, 'Van', 2, 1);

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
  `v_avail` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `v_info`
--

INSERT INTO `v_info` (`fleetid`, `v_category`, `v_model`, `v_year`, `v_color`, `v_regnum`, `v_serialnum`, `v_capacity`, `v_datepur`, `v_manu`, `v_enginetype`, `v_loc`, `v_fueltype`, `v_fuelcap`, `v_license`, `v_condition`, `v_avail`) VALUES
(1, 2, 'INNOVA 2.8L V DSL A/T', 2021, 'White Pearl Crystal Shine', 'YTU546', '6245234234', 1, '0000-00-00', 'Toyota', '4-Cylinder, In-Line 16 Valve, Double Overhead Camshaft (Variable Nozzle Turbo Charger W/ Intercooler', 'Quezon City', 'Diesel', '10L', '1234123124123', 'Excellent', 1),
(2, 1, '1.5L EcoBoost Trend CVT', 2020, 'Gloss Black', 'TIR633', '42354524234', 2, '2020-01-30', 'Ford', '1.5L EcoBoost (M/A)', 'Caloocan City', 'Diesel', '20L', '123123123124141', 'Good', 1),
(5, 3, 'Armored Test', 2000, 'purpula', 'TTP111', '15123123', 7, '2010-07-09', 'Kenaizacess', 'Bubbles', 'Krusty Krab', 'Krabby Patty', '50 Gallons', '5123123123', '555', 1);

-- --------------------------------------------------------

--
-- Table structure for table `v_res`
--

CREATE TABLE `v_res` (
  `res_id` int(20) NOT NULL,
  `fleetid` int(20) NOT NULL,
  `emp_id` int(20) NOT NULL,
  `res_date` date NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `v_cate`
--
ALTER TABLE `v_cate`
  ADD PRIMARY KEY (`fleetid`),
  ADD UNIQUE KEY `vnumber` (`vnumber`);

--
-- Indexes for table `v_info`
--
ALTER TABLE `v_info`
  ADD PRIMARY KEY (`fleetid`),
  ADD KEY `v_category` (`v_category`) USING BTREE;

--
-- Indexes for table `v_res`
--
ALTER TABLE `v_res`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `fleetid` (`fleetid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `v_info`
--
ALTER TABLE `v_info`
  MODIFY `fleetid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `v_res`
--
ALTER TABLE `v_res`
  MODIFY `res_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `v_res`
--
ALTER TABLE `v_res`
  ADD CONSTRAINT `v_res_ibfk_1` FOREIGN KEY (`fleetid`) REFERENCES `v_info` (`fleetid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

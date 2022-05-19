-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2021 at 04:53 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

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
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `applicant_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `contact_number` int(20) NOT NULL,
  `birth_date` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`applicant_id`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `contact_number`, `birth_date`, `age`, `gender`, `address`, `last_login`) VALUES
(4, 'darryl', 'opiasas', 'deleon', 'darryl917deleon@gmail.com', 'de6677cf23fca78efc3f68359c91cf46af486d35', 2147483647, '2001-01-05', 20, 'Male', 'sauyo', '2021-11-05 10:05:05'),
(5, 'darryl', 'opiasas', 'deleon', 'darryl917deleon@gmail.com', 'de6677cf23fca78efc3f68359c91cf46af486d35', 2147483647, '2001-01-05', 20, 'Male', 'sauyo', '2021-11-05 10:05:05'),
(6, 'darryl', 'opiasas', 'deleon', 'darryl917deleon@gmail.com', 'de6677cf23fca78efc3f68359c91cf46af486d35', 2147483647, '2001-01-05', 20, 'Male', 'sauyo', '2021-11-05 10:05:05'),
(7, 'darryl', 'opiasas', 'deleon', 'darryl917deleon@gmail.com', 'de6677cf23fca78efc3f68359c91cf46af486d35', 2147483647, '2001-01-05', 20, 'Male', 'sauyo', '2021-11-05 10:05:05'),
(8, 'darryl', 'opiasas', 'deleon', 'darryl917deleon@gmail.com', 'de6677cf23fca78efc3f68359c91cf46af486d35', 2147483647, '2001-01-05', 20, 'Male', 'sauyo', '2021-11-05 10:05:05'),
(9, 'darryl', 'opiasas', 'deleon', 'darryl917deleon@gmail.com', 'de6677cf23fca78efc3f68359c91cf46af486d35', 2147483647, '2001-01-05', 20, 'Male', 'sauyo', '2021-11-05 10:05:05'),
(10, 'darryl', 'opiasas', 'deleon', 'darryl917deleon@gmail.com', 'de6677cf23fca78efc3f68359c91cf46af486d35', 2147483647, '2001-01-05', 20, 'Male', 'sauyo', '2021-11-05 10:05:05'),
(11, 'darryl', 'opiasa', 'deleon', 'darryl917deleon@gmail.com', 'ad74998526ee8dbd4c638d267acfe847fa03d9ec', 2147483647, '2001-02-07', 20, 'Male', 'daasd', '2021-11-05 10:05:05'),
(12, 'czxzxczx', 'zxcz', 'zczx', 'abc@abc.com', '66f1015dac1190a4ca6b384745893350755caddd', 12, '2001-02-05', 20, 'Male', 'sdf', '2021-11-05 10:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `education_background`
--

CREATE TABLE `education_background` (
  `id` int(11) NOT NULL,
  `elementary` varchar(500) NOT NULL,
  `high_school` varchar(500) NOT NULL,
  `college` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education_background`
--

INSERT INTO `education_background` (`id`, `elementary`, `high_school`, `college`) VALUES
(3, 'tes', 'ths', 'bcp'),
(4, 'tes', 'ths', 'bcp'),
(5, 'tes', 'ths', 'bcp'),
(6, 'tes', 'ths', 'bcp'),
(7, 'tes', 'ths', 'bcp'),
(8, 'tes', 'ths', 'bcp'),
(9, 'tes', 'ths', 'bcp'),
(10, 'asd', 'ad', 'asd'),
(11, 'sdf', 'sdf', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `job_history`
--

CREATE TABLE `job_history` (
  `id` int(11) NOT NULL,
  `company` varchar(500) NOT NULL,
  `position` varchar(500) NOT NULL,
  `years_of_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_history`
--

INSERT INTO `job_history` (`id`, `company`, `position`, `years_of_service`) VALUES
(3, 'asd', 'asd', 46),
(4, 'sdf', 'sdf', 20);

-- --------------------------------------------------------

--
-- Table structure for table `job_vacancy`
--

CREATE TABLE `job_vacancy` (
  `job_id` int(10) NOT NULL,
  `job_title` varchar(250) NOT NULL,
  `no_of_vacancy` int(10) NOT NULL,
  `job_description` varchar(1000) NOT NULL,
  `job_qualification` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_vacancy`
--

INSERT INTO `job_vacancy` (`job_id`, `job_title`, `no_of_vacancy`, `job_description`, `job_qualification`) VALUES
(1, 'programmer', 5, 'web development', 'IT Graduate');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_level` int(15) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` int(2) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
(1, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '', 1, '2021-11-01 14:37:59'),
(2, 'eric', 'eric', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 3, '', 1, '2021-11-01 14:27:28'),
(3, 'johnpaul', 'jp', '8cb2237d0679ca88db6464eac60da96345513964', 2, '', 1, '2021-11-05 07:44:55'),
(4, 'mark', 'mark', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 6, '', 1, '2021-11-01 14:25:14'),
(5, 'darrel', 'darrel', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 5, '', 1, '2021-11-01 14:26:06'),
(6, 'darryl', 'darryl', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 4, '', 1, '2021-11-01 14:35:39');

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
(1, 'HR Manager', 1, 1),
(2, 'Recruitment Staff', 2, 1),
(3, 'Applicant Manager', 3, 1),
(4, 'Onboarding Manager', 4, 1),
(5, 'Performance Manager', 5, 1),
(6, 'Social Recognition Manager', 6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `education_background`
--
ALTER TABLE `education_background`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_history`
--
ALTER TABLE `job_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_level` (`group_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `education_background`
--
ALTER TABLE `education_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `job_history`
--
ALTER TABLE `job_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  MODIFY `job_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

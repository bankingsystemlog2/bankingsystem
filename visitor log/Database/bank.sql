-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 05:32 AM
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
-- Table structure for table `blacklist_person`
--

CREATE TABLE `blacklist_person` (
  `id` bigint(11) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `mname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `contact_no` bigint(11) NOT NULL,
  `company_department` varchar(250) NOT NULL,
  `reason` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blacklist_person`
--

INSERT INTO `blacklist_person` (`id`, `fname`, `mname`, `lname`, `contact_no`, `company_department`, `reason`, `date`) VALUES
(1000, 'afaf', '', '', 0, '', '', '2022-03-18 21:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `budgetreleasing`
--

CREATE TABLE `budgetreleasing` (
  `P_ID` int(200) UNSIGNED NOT NULL,
  `P_Code` int(200) NOT NULL,
  `P_Department` varchar(200) NOT NULL,
  `P_Requestor` varchar(200) NOT NULL,
  `P_Purpose` varchar(200) NOT NULL,
  `P_Amount` int(200) NOT NULL,
  `P_Date` date NOT NULL,
  `P_Tablename` varchar(200) NOT NULL,
  `P_Status` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `car_loans`
--

CREATE TABLE `car_loans` (
  `id` bigint(11) NOT NULL,
  `car_type` varchar(250) DEFAULT NULL,
  `unit` varchar(250) DEFAULT NULL,
  `vehicle_price` bigint(11) DEFAULT NULL,
  `loan_amount` bigint(11) DEFAULT NULL,
  `downpayment` bigint(11) DEFAULT NULL,
  `payment_terms` varchar(250) DEFAULT NULL,
  `fname` varchar(250) DEFAULT NULL,
  `mname` varchar(250) DEFAULT NULL,
  `lname` varchar(250) DEFAULT NULL,
  `sex` varchar(250) DEFAULT NULL,
  `civil_status` varchar(250) DEFAULT NULL,
  `home_address` varchar(250) DEFAULT NULL,
  `perma_address` varchar(250) DEFAULT NULL,
  `date_0f_birth` varchar(250) DEFAULT NULL,
  `place_of_birth` varchar(250) DEFAULT NULL,
  `mobile_no` bigint(11) DEFAULT NULL,
  `email_address` varchar(250) DEFAULT NULL,
  `tin_sss_gsis_no` bigint(11) DEFAULT NULL,
  `source_of_income` varchar(250) DEFAULT NULL,
  `monthly_income` varchar(250) DEFAULT NULL,
  `employeer_name` varchar(250) DEFAULT NULL,
  `position` varchar(250) DEFAULT NULL,
  `date_of_loan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_loans`
--

INSERT INTO `car_loans` (`id`, `car_type`, `unit`, `vehicle_price`, `loan_amount`, `downpayment`, `payment_terms`, `fname`, `mname`, `lname`, `sex`, `civil_status`, `home_address`, `perma_address`, `date_0f_birth`, `place_of_birth`, `mobile_no`, `email_address`, `tin_sss_gsis_no`, `source_of_income`, `monthly_income`, `employeer_name`, `position`, `date_of_loan`) VALUES
(18010545, 'da', 'dad', 2, 1, 212, 'faf', 'faf', 'faf', 'faf', 'faf', 'faf', 'fafafa', 'fafa', 'afafaf', 'affaf', 12561261, 'lilgabs08@gmail.com', 2626, 'dafaf', '1616', 'fafa', 'faf', '2022-03-17 21:59:58'),
(18010546, 'daddad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-17 22:57:53');

-- --------------------------------------------------------

--
-- Table structure for table `client_information_core1`
--

CREATE TABLE `client_information_core1` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `Body` text DEFAULT NULL,
  `preparedby` varchar(250) DEFAULT NULL,
  `urlpath` varchar(250) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `sec_dep` text DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_information_core1`
--

INSERT INTO `client_information_core1` (`id`, `title`, `Body`, `preparedby`, `urlpath`, `date_created`, `sec_dep`, `date_from`, `date_to`, `status`) VALUES
(14, 'mkpmp', 'nmpmpm', 'Admin', 'uploads/group 3.docx', '2022-04-09', 'mpmp', '2022-04-10', '2022-04-17', 1),
(15, 'dexter gabule ', 'IDOLO', 'Admin', 'uploads/GABULE.docx', '2022-04-09', 'HR', '2022-04-17', '2022-04-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `Co_Code` int(100) NOT NULL,
  `LS_Account_name` varchar(200) NOT NULL,
  `A_Number` int(100) NOT NULL,
  `Co_Status` int(100) NOT NULL,
  `LS_Date` date NOT NULL,
  `LS_Address` varchar(200) NOT NULL,
  `LS_City` varchar(200) NOT NULL,
  `LS_Country` varchar(200) NOT NULL,
  `LS_Desc` varchar(255) NOT NULL,
  `LS_Department` varchar(200) NOT NULL,
  `LS_Type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`Co_Code`, `LS_Account_name`, `A_Number`, `Co_Status`, `LS_Date`, `LS_Address`, `LS_City`, `LS_Country`, `LS_Desc`, `LS_Department`, `LS_Type`) VALUES
(101, 'ian james barbosa', 18011424, 102, '2021-12-11', 'Sanbenisa Garden villas', 'Quezon city', 'Philippines', 'This Record is a paid through agreed Contract', 'Core 1', 'Loans'),
(103, 'Ellie Barbosa', 10999212, 102, '2021-12-11', 'Sanbenisa Garden villas', 'Quezon City', 'Philippines', 'This Record is a paid through agreed Contract', 'Core 1', 'Loans'),
(104, 'Cristy Vargas', 18013999, 102, '2022-01-04', 'Cloocan kaligayahan villas', 'Quezon City', 'Philippines', 'This Record is a record of deposit by the user', 'Core 1', 'Deposits'),
(105, 'Thedore jhon', 16052100, 102, '2022-01-04', 'Pasig uranbo villas', 'Pasig City', 'Philippines', 'This Record is a record of deposit by the user', 'Core 1', 'Deposits'),
(106, 'Andrew Artis', 16013231, 102, '2022-01-12', 'Bagong Silang, caloocan City', 'Calocan City', 'Philippines', 'This Record is a record of deposit by the user', 'Core 1', 'Deposits'),
(107, 'Will Baylie', 18202542, 102, '2022-01-13', 'Camarin, Caloocan City', 'Calocan City', 'Philippines', 'This Record is a record of deposit by the user', 'Core 1', 'Loans'),
(108, 'Aron Legaspi', 18014278, 102, '2022-01-14', 'Lagro, Quezon City', 'Quezon City', 'Philippines', 'This Record is a record of deposit by the user', 'Core 1', 'Deposits'),
(109, 'Berry Jhon', 16010051, 102, '2022-01-15', 'North Fairview, Quezon City', 'Quezon City', 'Philippines', 'This Record is a record of deposit by the user', 'Core 1', 'Loans'),
(110, 'Cecille Alex', 17012232, 102, '2022-01-16', 'Novaliches, Quezon City', 'Quezon City', 'Philippines', 'This Record is a record of deposit by the user', 'Core 1', 'Deposits'),
(111, 'Eva Chavez', 12316737, 102, '2022-01-12', 'Zabarte road, Caloocan City', 'Calocan City', 'Philippines', 'This Record is a record of deposit by the user', 'Core 1', 'Loans'),
(112, 'Frits Howard', 18956875, 102, '2022-01-12', 'Liano, Caloocan', 'Calocan City', 'Philippines', 'This Record is a record of deposit by the user', 'Core 1', 'Deposits'),
(113, 'Edward Cruz', 27326143, 102, '2022-01-12', '11th avenue, caloocan City', 'Calocan City', 'Philippines', 'This Record is a record of deposit by the user', 'Core 1', 'Loans'),
(114, 'Stephen curry', 41120130, 102, '2022-01-20', 'Talisayan, Caloocan City', 'Calocan City', 'Philippines', 'This Record is a record of deposit by the user', 'Core 1', 'Loans'),
(115, 'Daniel Daviz', 59067090, 102, '2022-01-21', 'tondo, manila', 'Manila', 'Philippines', 'This Record is a record of deposit by the user', 'Core 1', 'Deposits'),
(116, 'James Thomas', 12837248, 102, '2022-01-22', 'alfonso, tondo, manila', 'Manila', 'Philippines', 'This Record is a record of deposit by the user', 'Core 1', 'Loans');

-- --------------------------------------------------------

--
-- Table structure for table `collection_transactions`
--

CREATE TABLE `collection_transactions` (
  `LT_id` int(200) NOT NULL,
  `LT_Recieved` int(200) NOT NULL,
  `LT_Charges` int(200) NOT NULL,
  `LT_date` date NOT NULL,
  `A_Number` int(200) NOT NULL,
  `LT_Type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collection_transactions`
--

INSERT INTO `collection_transactions` (`LT_id`, `LT_Recieved`, `LT_Charges`, `LT_date`, `A_Number`, `LT_Type`) VALUES
(1, 1000, 70, '2021-04-05', 18011424, 'Loan Payment'),
(2, 1000, 60, '2021-05-05', 18011424, 'Loan Payment'),
(3, 200, 10, '2021-06-05', 18011424, 'Loan Payment'),
(4, 2000, 40, '2021-06-15', 10999212, 'Loan Payment'),
(5, 2000, 40, '2021-07-15', 10999212, 'Loan Payment'),
(6, 2000, 40, '2021-08-15', 10999212, 'Loan Payment'),
(7, 3000, 50, '2021-09-15', 10999212, 'Loan Payment'),
(8, 500000, 20, '2021-12-13', 18013999, 'deposit'),
(9, 100000, 20, '2021-12-14', 16052100, 'deposit'),
(10, 80000, 20, '2021-12-15', 16013231, 'deposit'),
(11, 95000, 20, '2021-12-18', 18014278, 'deposit'),
(12, 8500, 40, '2021-12-19', 16010051, 'Loan Payment'),
(13, 100000, 20, '2021-12-21', 17012232, 'deposit'),
(14, 4000, 50, '2021-12-22', 12316737, 'Loan Payment'),
(15, 70000, 20, '2021-12-23', 18956875, 'deposit'),
(16, 1000, 30, '2021-12-26', 27326143, 'Loan Payment'),
(17, 2500, 40, '2021-12-27', 41120130, 'Loan Payment'),
(18, 15000, 20, '2021-12-29', 59067090, 'deposit'),
(19, 4000, 50, '2022-01-02', 12837248, 'Loan Payment'),
(21, 3000, 40, '2022-01-03', 18202542, 'Loan Payment');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `id` bigint(11) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `mname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `gmail` varchar(250) NOT NULL,
  `company` varchar(250) NOT NULL,
  `type_of_complain` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `fname`, `mname`, `lname`, `gmail`, `company`, `type_of_complain`, `description`, `date`) VALUES
(1, 'dexter', 'attres', 'gabule', 'lilgabs08@gmail.com', 'administrative ', 'loan ', 'gasgasgsgsgsgsgsgsgs', '2021-12-13 18:07:26'),
(2, 'gfag', 'gag', 'gag', 'gag', 'gag', 'gag', ' gag', '2021-12-13 18:32:40'),
(3, 'jean', 'jhsdh', 'jkhdfqeh', 'amat0siiwue', 'dhtrfy', 'tyuyr', ' ertry', '2021-12-17 01:38:12'),
(4, '', '', '', '', '', '', ' ', '2021-12-17 01:40:22'),
(5, 'ffdfdfd', '', '', '', '', '', '', '2022-01-13 00:00:45'),
(6, 'tite', '', '', '', '', '', '', '2022-01-13 00:00:58'),
(7, 'dexter', 'attres', 'gabule', '', '', '', '', '2022-01-13 00:03:20'),
(8, 'netoy', 'attress', 'gabule', '', '', '', '', '2022-01-13 00:08:21'),
(9, 'fafa', 'faf', 'faf', '', '', 'fafaf', 'fafaf', '2022-01-13 00:08:31'),
(10, '', '', '', 'fafafaf', 'fafafaf', '', '', '2022-01-13 00:10:13'),
(11, 'adad', 'dadad', 'dad', 'dad@gmail.com', 'dadad', 'dadad', 'daad', '2022-01-13 00:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `contractrequest`
--

CREATE TABLE `contractrequest` (
  `id` int(11) NOT NULL,
  `department` varchar(250) NOT NULL,
  `client_id` int(11) NOT NULL,
  `name_of_client` varchar(250) NOT NULL,
  `complete_address` int(11) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `reason_to_credit` varchar(250) NOT NULL,
  `internal_billing` bigint(20) NOT NULL,
  `Amount_of_Credits` bigint(20) NOT NULL,
  `invoice_no` bigint(20) NOT NULL,
  `status` varchar(250) NOT NULL,
  `date_of_request` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contractrequest`
--

INSERT INTO `contractrequest` (`id`, `department`, `client_id`, `name_of_client`, `complete_address`, `phone_no`, `email`, `reason_to_credit`, `internal_billing`, `Amount_of_Credits`, `invoice_no`, `status`, `date_of_request`) VALUES
(1001, '', 0, '', 0, 0, '', '', 0, 0, 0, '', '2022-03-27 15:17:11'),
(1007, 'fafaf', 0, '', 0, 0, '', '', 0, 0, 0, '', '2022-03-31 10:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `Body` text DEFAULT NULL,
  `preparedby` varchar(250) DEFAULT NULL,
  `urlpath` varchar(250) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `sec_dep` text DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `title`, `Body`, `preparedby`, `urlpath`, `date_created`, `sec_dep`, `date_from`, `date_to`, `status`) VALUES
(3, 'Memorandom Agreement', 'Agreement to loan of clients', 'Admin', 'uploads/2226013712.pdf', '2022-03-23', '', NULL, NULL, NULL),
(8, 'dadad', 'dadad', 'Staff', 'uploads/dexter-gabuleresume (1).docx', '2022-03-26', 'dadad', '2022-03-25', '2022-03-27', 1),
(9, 'fafaf', 'fafaf', 'Admin', 'uploads/Costumer-Complaint-Form.docx', '2022-03-26', 'fafaf', '2022-03-27', '2022-03-20', 1),
(10, 'f', 'fafaf', 'Staff', 'uploads/CREDIT-MEMO.docx', '2022-03-26', 'f', '2022-03-20', '2022-03-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `core1files`
--

CREATE TABLE `core1files` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `Body` text DEFAULT NULL,
  `preparedby` varchar(250) DEFAULT NULL,
  `urlpath` varchar(250) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `sec_dep` text DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core1files`
--

INSERT INTO `core1files` (`id`, `title`, `Body`, `preparedby`, `urlpath`, `date_created`, `sec_dep`, `date_from`, `date_to`, `status`) VALUES
(9, 'dad', 'dadad', 'Staff', 'uploads/stakeholder.docx', '2022-03-26', 'dddddddddd', '2022-03-13', '2022-03-27', 1),
(10, 'faf', 'fafaf', 'Admin', 'uploads/Costumer-Complaint-Form.docx', '2022-03-27', 'afaf', '2022-03-20', '2022-03-31', 1),
(11, 'gaga', 'gagagag', 'Admin', 'uploads/Costumer-Complaint-Form.docx', '2022-03-31', 'gagag', '2022-03-25', '2022-03-30', 1),
(12, 'faf', 'fafaf', 'Admin', 'uploads/stakeholder.docx', '2022-04-02', 'fafaf', '2022-04-15', '2022-04-10', 1),
(13, 'd', 'd', 'Staff', 'uploads/List of core 1 Contract.xlsx', '2022-04-02', 'd', '2022-04-16', '2022-04-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
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
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `sec_dep`, `date_from`, `date_to`, `Body`, `preparedby`, `status`, `urlpath`, `date_created`) VALUES
(10, 'TEST2', 'QWE', '2022-01-12', '2022-01-25', 'QWER', '0', 1, '', '2022-01-11'),
(11, 'Supplies', 'Warehouse', '2022-01-12', '2022-01-19', 'Stored 150 Facemask', '0', 3, '', '2022-01-11'),
(12, 'testing', 'testing', '2022-01-11', '2022-01-19', 'testing', '0', 1, '', '2022-01-11'),
(13, 'Testing', 'Testing', '2022-01-11', '2022-01-19', 'Testing123', '0', 5, '', '2022-01-11'),
(14, 'Testing', 'Testing', '2022-01-11', '2022-01-19', 'Testing2421', '0', 0, 'uploads/Andrea Villamor.docx', '2022-01-11'),
(15, 'testtt', 'testtt', '2022-01-11', '2022-01-12', 'testttt', 'Antigua &amp; Barbuda', 1, 'uploads/CONCEPTUAL FRAMEWORK.docx', '2022-01-11'),
(16, 'tester', 'tester', '2022-01-11', '2022-01-13', 'tester', 'Armenia', 1, 'uploads/FORMAT.docx', '2022-01-11'),
(17, 'qsa', 'sa', '2022-01-13', '2022-01-12', 'sa', 'Azerbaijan', 1, 'uploads/helen.jpg', '2022-01-11'),
(18, 'qwrqw', 'qweqwr', '2022-01-11', '2022-01-20', 'qtqweqwe', 'Lester', 1, 'uploads/CONCEPTUAL FRAMEWORK.docx', '2022-01-11'),
(19, 'Qweasdwa', 'Qwrqwdasdwad', '2022-01-11', '2022-01-19', 'Aweqdasdwad', '0', 3, 'uploads/FORMAT.docx', '2022-01-11'),
(20, 'Papot', 'Papot', '2022-01-11', '2022-01-19', 'Papot Upload', '0', 2, 'uploads/Energy Pyramid.docx', '2022-01-11'),
(21, 'Eqwe', 'Rtqweq', '2022-01-11', '2022-01-12', 'Audit Papot', '0', 3, 'uploads/Andrea Villamor.docx', '2022-01-11'),
(0, 'fafaf', 'fafafaf', '2022-03-05', '2022-03-06', 'fafafafaf', 'Angola', 1, 'uploads/dexter-gabuleresume (1).docx', '2022-03-19'),
(0, 'adadadad', 'dadadaad', '2022-03-06', '2022-03-06', 'dadadadadad', 'Armenia', 1, 'uploads/dexter-gabuleresume (1).docx', '2022-03-19'),
(0, 'ddddddddddd', 'ddddddddd', '2022-03-22', '2022-03-23', 'ddddddd', 'Admin', 1, 'uploads/Costumer-Complaint-Form.pdf', '2022-03-22'),
(0, 'memo', 'dadadad', '2022-03-23', '2022-03-23', 'daddad', 'Staff', 1, 'uploads/PRACTICE.xlsx', '2022-03-22'),
(0, 'my god', 'dadad', '2022-03-23', '2022-03-24', 'dadad', 'Admin', 1, 'uploads/2226013701.pdf', '2022-03-22'),
(0, 'dfafaf', 'fafaffa', '2022-03-27', '2022-03-31', 'fafafaf', 'Admin', 1, 'uploads/CREDIT-MEMO.docx', '2022-03-26'),
(0, 'dexter', 'fafaf', '2022-03-25', '2022-03-31', 'fafaf', 'Staff', 1, 'uploads/Costumer-Complaint-Form.docx', '2022-03-26');

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
-- Table structure for table `employee_documents`
--

CREATE TABLE `employee_documents` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `resume` varchar(100) NOT NULL,
  `sss` varchar(100) NOT NULL,
  `philhealth` varchar(100) NOT NULL,
  `pag_ibig` varchar(100) NOT NULL,
  `nbi` varchar(100) NOT NULL,
  `other_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee_information_core_human`
--

CREATE TABLE `employee_information_core_human` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `Body` text DEFAULT NULL,
  `preparedby` varchar(250) DEFAULT NULL,
  `urlpath` varchar(250) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `sec_dep` text DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_information_core_human`
--

INSERT INTO `employee_information_core_human` (`id`, `title`, `Body`, `preparedby`, `urlpath`, `date_created`, `sec_dep`, `date_from`, `date_to`, `status`) VALUES
(14, 'mkpmp', 'nmpmpm', 'Admin', 'uploads/group 3.docx', '2022-04-09', 'mpmp', '2022-04-10', '2022-04-17', 1),
(15, 'fafaf', 'fafaf', 'Staff', 'uploads/GABULE.docx', '2022-04-09', 'fafaf', '2022-04-17', '2022-04-23', 1),
(16, 'fafaf', 'fafaf', 'Staff', 'uploads/group 3.docx', '2022-04-09', 'fafaf', '2022-04-16', '2022-04-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_contract_req`
--

CREATE TABLE `emp_contract_req` (
  `id` int(11) NOT NULL,
  `type_of_contract` varchar(250) DEFAULT NULL,
  `requestor` varchar(250) DEFAULT NULL,
  `emp_name` varchar(250) DEFAULT NULL,
  `emp_middle_name` varchar(250) DEFAULT NULL,
  `emp_last_name` varchar(250) DEFAULT NULL,
  `start_of_job` varchar(250) DEFAULT NULL,
  `end_of_job` varchar(250) DEFAULT NULL,
  `position` varchar(250) DEFAULT NULL,
  `dept_of_emp` varchar(250) DEFAULT NULL,
  `salary` bigint(20) NOT NULL,
  `status` varchar(250) DEFAULT NULL,
  `date_of_request` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_contract_req`
--

INSERT INTO `emp_contract_req` (`id`, `type_of_contract`, `requestor`, `emp_name`, `emp_middle_name`, `emp_last_name`, `start_of_job`, `end_of_job`, `position`, `dept_of_emp`, `salary`, `status`, `date_of_request`) VALUES
(1, NULL, 'shenobi', 'erick', 's.', 'salvador', 'march 22, 2022', 'december 25, 2023', 'programmer', 'HR Department', 10000, 'pending', '2022-03-31 10:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_complain`
--

CREATE TABLE `equipment_complain` (
  `id` bigint(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `gmail` varchar(250) NOT NULL,
  `company` varchar(250) NOT NULL,
  `type_of_equipment` varchar(250) NOT NULL,
  `complain` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `equipment_reservation`
--

CREATE TABLE `equipment_reservation` (
  `id` bigint(11) NOT NULL,
  `lname` varchar(250) DEFAULT NULL,
  `fname` varchar(250) DEFAULT NULL,
  `mname` varchar(250) DEFAULT NULL,
  `department` varchar(250) DEFAULT NULL,
  `position` varchar(250) DEFAULT NULL,
  `time_date_request` varchar(250) DEFAULT NULL,
  `list_equipment_request` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment_reservation`
--

INSERT INTO `equipment_reservation` (`id`, `lname`, `fname`, `mname`, `department`, `position`, `time_date_request`, `list_equipment_request`) VALUES
(1, 'gabule', 'dexter', 'attres', 'office of administration', 'manager', 'november 21, 2021 \r\n9:00 am', '1 long table \r\n10 chair\r\n1 microphone\r\n2 speaker\r\n'),
(2, 'faf', 'faf', 'faf', 'faf', 'faf', '2021-12-15 23:31:30', 'faf'),
(3, 'fsfsgs', 'gsgsg', 'gsg', NULL, NULL, NULL, NULL),
(4, '', '', '', '', '', '2021-12-16 01:45:13', ''),
(5, '', '', '', '', '', '2021-12-16 02:04:23', ''),
(6, '', '', '', '', '', '2021-12-16 02:06:40', ''),
(7, '', '', '', '', '', '2021-12-16 02:13:06', ''),
(8, 'ff', 'faf', 'faf', 'fafa', 'faf', '2021-12-16 03:21:03', 'faf'),
(9, 'hgeh', 'hdhd', 'hdhd', 'dhdh', 'hdh', '2021-12-18 22:08:52', 'hdhd'),
(10, 'ffaf', 'fafaf', 'fafa', 'faf', 'faf', '2022-01-03 22:09:48', 'gfag'),
(11, 'fafaf', '', '', '', '', '2022-01-13 00:30:54', '');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `Id` int(200) NOT NULL,
  `Expenses` int(200) NOT NULL,
  `Date` date NOT NULL,
  `Collection` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`Id`, `Expenses`, `Date`, `Collection`) VALUES
(29, 0, '2021-12-12', 0),
(73, 0, '2022-01-06', 2340),
(74, 0, '2022-01-06', 5020),
(82, 0, '2022-01-10', 2340),
(83, 0, '2022-01-10', 10020),
(84, 0, '2022-01-11', 9170),
(85, 2400, '2022-01-11', 0),
(86, 3140, '2022-01-11', 0),
(87, 0, '2022-01-21', 2340),
(88, 0, '2022-01-21', 500020),
(89, 250, '2022-01-21', 0),
(90, 0, '2022-03-11', 2340),
(91, 0, '2022-03-11', 500020),
(92, 0, '2022-03-11', 100020),
(93, 0, '2022-03-11', 2340),
(94, 0, '2022-03-11', 9170),
(95, 0, '2022-03-11', 500020),
(96, 0, '2022-03-12', 2340),
(97, 0, '2022-03-15', 2340);

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `id` bigint(11) NOT NULL,
  `name_of_room` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id`, `name_of_room`, `status`) VALUES
(1, 'Conference Room', 'Available'),
(2, 'Looby Room', 'Non-Available'),
(3, 'Luxury Executive Office', 'Non-Available'),
(4, 'Computer Labotary', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `facility_complain`
--

CREATE TABLE `facility_complain` (
  `id` bigint(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `gmail` varchar(250) NOT NULL,
  `company` varchar(250) NOT NULL,
  `type_of_facility` varchar(250) NOT NULL,
  `complain` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facility_complain`
--

INSERT INTO `facility_complain` (`id`, `fullname`, `gmail`, `company`, `type_of_facility`, `complain`, `description`, `date`) VALUES
(1, 'dadad', 'dadad', 'dad', '', 'dadad', 'dadad', '2021-12-13 18:49:51'),
(2, 'faf', 'faf', 'faf', 'faf', 'faf', 'faf', '2021-12-13 18:58:31'),
(3, '', '', '', '', '', '', '2021-12-13 20:08:21'),
(4, '', '', '', '', '', '', '2021-12-13 20:09:11'),
(5, 'faf', '', 'af', 'faf', '', 'faf', '2021-12-13 20:10:45'),
(6, 'faf', '', 'faf', 'faf', '', 'faf', '2021-12-13 20:12:16'),
(7, 'daf', '', 'faf', 'faf', '', 'fa', '2021-12-13 20:13:41'),
(8, 'afaf', 'faf', 'faf', 'faf', 'faf', 'af', '2021-12-13 20:19:33'),
(9, 'fqffaf', '', '', '', '', '', '2022-01-12 22:44:34'),
(10, 'ggggggggggggggggggg', '', '', '', '', '', '2022-01-12 22:45:56'),
(11, 'aaaaaaaaaaaaaaaaa', 'fafafaf@gmail.com', 'dad', 'fafaf', 'faf', 'fafaf', '2022-01-12 22:49:06'),
(12, 'adadadadadaddddddddddddd', 'd@gmail.com', 'aaa', 'aaa', 'aaa', 'aaa', '2022-01-12 22:50:08'),
(13, 'gggggggggggggggggggggggggg', 'ffafaf@gmail.com', 'dadad', 'dadad', 'dad', 'dadada', '2022-01-12 23:56:08'),
(14, 'dadad', 'dada@gmail.com', 'dadad', 'dadad', 'dadad', 'dadaddadddddddddddddddddddddd', '2022-01-13 00:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `facility_reservation`
--

CREATE TABLE `facility_reservation` (
  `id` bigint(11) NOT NULL,
  `approval_number` bigint(11) DEFAULT NULL,
  `lname` varchar(250) DEFAULT NULL,
  `fname` varchar(250) DEFAULT NULL,
  `mname` varchar(250) NOT NULL,
  `contact` bigint(11) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `department` varchar(250) DEFAULT NULL,
  `position` varchar(250) DEFAULT NULL,
  `event_type` varchar(250) DEFAULT NULL,
  `facility_type` varchar(250) DEFAULT NULL,
  `reservation_date` varchar(250) DEFAULT NULL,
  `start` varchar(250) DEFAULT NULL,
  `until` varchar(250) DEFAULT NULL,
  `purpose` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facility_reservation`
--

INSERT INTO `facility_reservation` (`id`, `approval_number`, `lname`, `fname`, `mname`, `contact`, `email`, `department`, `position`, `event_type`, `facility_type`, `reservation_date`, `start`, `until`, `purpose`) VALUES
(7, 0, '', '', '', 0, '', '', '', '', '', '2021-12-07 22:08:29', '', '', ''),
(8, 535, '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(9, 0, '', '', '', 0, '', '', '', '', 'faf', '2021-12-07 22:11:20', '', '', ''),
(10, 0, '', '', '', 0, '', '', '', '', '', '2021-12-07 22:12:25', '', '', 'f'),
(11, 56454, 'fafa', 'faf', 'faf', 4343, 'fafa', 'fafa', 'fafa', 'fafa', 'fafa', '2021-12-07 23:11:24', 'fafa', 'faf', 'fafa'),
(12, 65464, 'agag', 'gag', 'gag', 54564, 'gagag', 'gaga', 'gaga', 'gaga', 'gag', '2021-12-08 21:31:16', 'gag', 'gag', 'gaga'),
(13, 0, '', '', 'gagaga', 0, '', '', '', '', '', '2021-12-15 05:30:19', '', '', ''),
(14, 0, '', '', '', 0, 'fafafafa', '', '', '', '', '2021-12-15 05:30:37', '', '', ''),
(15, 0, '', '', '', 0, 'gg', '', '', '', '', '2021-12-15 05:45:39', '', '', ''),
(16, 788675665, 'paps', 'mams', 'chuchu', 0, '', '', '', '', '', '2021-12-30 15:03:26', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `hr1files`
--

CREATE TABLE `hr1files` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `Body` text DEFAULT NULL,
  `preparedby` varchar(250) DEFAULT NULL,
  `urlpath` varchar(250) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `sec_dep` text DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr1files`
--

INSERT INTO `hr1files` (`id`, `title`, `Body`, `preparedby`, `urlpath`, `date_created`, `sec_dep`, `date_from`, `date_to`, `status`) VALUES
(11, 'faf', 'fafafaf', 'Staff', 'uploads/List of Request Contract.xlsx', '2022-03-31', 'agagag', '2022-03-18', '2022-03-25', 1),
(12, 'ddd', 'd', 'Admin', 'uploads/List of Request Contract.xlsx', '2022-04-02', 'ddd', '2022-04-17', '2022-04-24', 1),
(13, 'jiibobo', 'vuvbib', 'Admin', 'uploads/GRP 3.docx', '2022-04-08', 'viuguigvuigvu', '2022-04-09', '2022-04-10', 1),
(14, 'gsg', 'gsg', 'Admin', 'uploads/GABULE.docx', '2022-04-09', 'gsgsg', '2022-04-10', '2022-04-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` bigint(20) NOT NULL,
  `file` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `size` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `file`, `type`, `size`) VALUES
(1, '10807-1st-activity.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '12.3291015625');

-- --------------------------------------------------------

--
-- Table structure for table `mortgages`
--

CREATE TABLE `mortgages` (
  `id` bigint(11) NOT NULL,
  `loan_amount` bigint(11) DEFAULT NULL,
  `loan_terms` varchar(250) DEFAULT NULL,
  `property_address` varchar(250) DEFAULT NULL,
  `property_type` varchar(250) DEFAULT NULL,
  `fname` varchar(250) DEFAULT NULL,
  `mname` varchar(250) DEFAULT NULL,
  `lname` varchar(250) DEFAULT NULL,
  `sex` varchar(250) DEFAULT NULL,
  `civil_status` varchar(250) DEFAULT NULL,
  `home_address` varchar(250) DEFAULT NULL,
  `perma_address` varchar(250) DEFAULT NULL,
  `date_0f_birth` varchar(250) DEFAULT NULL,
  `place_of_birth` varchar(250) DEFAULT NULL,
  `mobile_no` bigint(11) DEFAULT NULL,
  `email_address` varchar(250) DEFAULT NULL,
  `tin_sss_gsis_no` bigint(11) DEFAULT NULL,
  `source_of_income` varchar(250) DEFAULT NULL,
  `monthly_income` bigint(11) DEFAULT NULL,
  `employeer_name` varchar(250) DEFAULT NULL,
  `position` varchar(250) DEFAULT NULL,
  `date_of_loan` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mortgages`
--

INSERT INTO `mortgages` (`id`, `loan_amount`, `loan_terms`, `property_address`, `property_type`, `fname`, `mname`, `lname`, `sex`, `civil_status`, `home_address`, `perma_address`, `date_0f_birth`, `place_of_birth`, `mobile_no`, `email_address`, `tin_sss_gsis_no`, `source_of_income`, `monthly_income`, `employeer_name`, `position`, `date_of_loan`) VALUES
(11002111100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-15 02:01:14'),
(11002111101, 50000, 'faf', 'faf', NULL, 'dexter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-15 02:02:24'),
(11002111102, 0, 'fffc', 'fffc', 'fffc', '', '', '', '', '', '', '', '', '', 0, '', 0, '', 0, '', '', '2021-12-30 14:07:23'),
(11002111103, 4535646, '3 tyrd', '3 tyrd', '3 tyrd', 'shaloyou', '', '', '', '', '', '', '', '', 0, '', 0, '', 0, '', '', '2021-12-30 14:08:27'),
(11002111104, 84195385767, '3 yeyh', '3 yeyh', '3 yeyh', 'kim', '', '', '', '', '', '', '', '', 0, '', 0, '', 0, '', '', '2021-12-30 14:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `obudget`
--

CREATE TABLE `obudget` (
  `Id` int(200) NOT NULL,
  `Budget` int(200) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obudget`
--

INSERT INTO `obudget` (`Id`, `Budget`, `Date`) VALUES
(1, 3994210, '2021-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `personal_loan`
--

CREATE TABLE `personal_loan` (
  `id` bigint(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `birthdate` varchar(250) NOT NULL,
  `phone_no` bigint(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `type_of_id` varchar(250) NOT NULL,
  `id_no` bigint(11) NOT NULL,
  `home_address` varchar(250) NOT NULL,
  `property_owned_ship` varchar(250) NOT NULL,
  `marital_status` varchar(250) NOT NULL,
  `place_of_work` varchar(250) NOT NULL,
  `job_title` varchar(250) NOT NULL,
  `years_of_employeed` varchar(250) NOT NULL,
  `monthly_income` bigint(11) NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `branch` varchar(250) NOT NULL,
  `account_number` bigint(11) NOT NULL,
  `purpose_of_loan` varchar(250) NOT NULL,
  `terms` varchar(250) NOT NULL,
  `guarantor_name` varchar(250) NOT NULL,
  `relation` varchar(250) NOT NULL,
  `guarantor_place_of_work` varchar(250) NOT NULL,
  `work_address` varchar(250) NOT NULL,
  `guarantor_income` bigint(11) NOT NULL,
  `guarantor_id_type` varchar(250) NOT NULL,
  `guarantor_id_number` bigint(11) NOT NULL,
  `guarantor_phone_number` bigint(11) NOT NULL,
  `date_of_loan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_loan`
--

INSERT INTO `personal_loan` (`id`, `fullname`, `birthdate`, `phone_no`, `email`, `type_of_id`, `id_no`, `home_address`, `property_owned_ship`, `marital_status`, `place_of_work`, `job_title`, `years_of_employeed`, `monthly_income`, `bank_name`, `branch`, `account_number`, `purpose_of_loan`, `terms`, `guarantor_name`, `relation`, `guarantor_place_of_work`, `work_address`, `guarantor_income`, `guarantor_id_type`, `guarantor_id_number`, `guarantor_phone_number`, `date_of_loan`) VALUES
(1, 'RT', '', 0, '', '', 0, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', '', '', 0, '', 0, 0, '2021-12-15 03:45:17'),
(2, 'fafafaf', '', 0, '', '', 0, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', '', '', 0, '', 0, 0, '2022-01-03 00:12:41'),
(3, '', '', 0, '', '', 0, '', '', '', '', '', '', 0, 'fafaf', '', 0, '', '', '', '', '', '', 0, '', 0, 0, '2022-01-13 00:22:33'),
(18010545, '', '', 0, '', '', 0, '', '', '', '', '', '', 0, '', '', 0, '', '', '', '', '', '', 0, '', 0, 0, '2022-03-27 11:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `procurment`
--

CREATE TABLE `procurment` (
  `Co_Code` int(200) NOT NULL,
  `PRO_Requestor` varchar(200) NOT NULL,
  `PRO_Department` varchar(200) NOT NULL,
  `Co_Status` int(200) NOT NULL,
  `PRO_Desc` varchar(200) NOT NULL,
  `PRO_Amount` int(200) NOT NULL,
  `PRO_Date` date NOT NULL,
  `PRO_Supplier` varchar(255) NOT NULL,
  `PRO_City` varchar(255) NOT NULL,
  `PRO_Country` varchar(255) NOT NULL,
  `PRO_Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `procurment`
--

INSERT INTO `procurment` (`Co_Code`, `PRO_Requestor`, `PRO_Department`, `Co_Status`, `PRO_Desc`, `PRO_Amount`, `PRO_Date`, `PRO_Supplier`, `PRO_City`, `PRO_Country`, `PRO_Address`) VALUES
(101, 'Elvira Barbosa', 'Logistics 2', 102, 'For purchase of new machines', 3000000, '2021-11-30', 'Hp links', 'Quezon city', 'Philippines', 'san ben calocas kaligayahan'),
(102, 'Critina Vargas', 'Logistics 2', 102, 'For purchase of land', 4000000, '2021-11-29', 'Camella', 'Calocan', 'Philippines', 'san ben calocas kaligayahan'),
(104, 'Allie Adams', 'Logistics 2', 102, 'For purchase of new machines', 3000000, '2022-01-11', 'hexa mech tools', 'Quezon city', 'Philippines', 'san bartolome, Q.C.'),
(105, 'Alex Abadi', 'Logistics 2', 102, 'For purchase of new machines', 3000000, '2022-01-12', 'Forward machines', 'Quezon city', 'Philippines', 'san bartolome, Q.C.'),
(106, 'Kara Mary', 'Logistics 2', 102, 'For purchase of new machines', 3000000, '2022-01-13', 'Vision tools', 'Calocan City', 'Philippines', 'Reparo, Caloocan City'),
(107, 'Rickiew Aliman', 'Logistics 2', 102, 'For purchase of new machines', 3000000, '2022-01-14', 'belter tools', 'Valenzuela City', 'Philippines', 'Gen-T, Valenzuela City'),
(108, 'Daniel Alexander', 'Logistics 2', 102, 'For purchase of land', 3000000, '2022-01-15', 'Camella', 'Pasay City', 'Philippines', 'Diosdado, Pasay City'),
(109, 'Sam Allen', 'Logistics 2', 102, 'For purchase of land', 3000000, '2022-01-16', 'Villar', 'Paraniaque City', 'Philippines', 'Reparo, Caloocan City'),
(110, 'Lucy Alvarez', 'Logistics 2', 102, 'For purchase of new machines', 3000000, '2022-01-17', 'Factory machines', 'Makati City', 'Philippines', 'Reparo, Caloocan City');

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
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `Co_Code` int(200) NOT NULL,
  `PR_Department` varchar(255) NOT NULL,
  `PR_Requestor` varchar(255) NOT NULL,
  `PR_Amount` int(200) NOT NULL,
  `PR_Date` date NOT NULL,
  `Co_Status` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`Co_Code`, `PR_Department`, `PR_Requestor`, `PR_Amount`, `PR_Date`, `Co_Status`) VALUES
(1100, 'HR1', 'jonathan', 300000, '2022-01-13', 102),
(1101, 'HR2', 'Ian james', 300000, '2022-01-13', 102),
(1103, 'HR3', 'Jaymie cabradillia', 300000, '2022-01-13', 102),
(1104, 'HR4', 'Maricor guilliermo bituin', 300000, '2022-01-13', 102),
(1105, 'CORE 1', 'jamela cruz', 400000, '2022-01-13', 102),
(1106, 'CORE 2', 'Eliie sabinay', 400000, '2022-01-13', 102),
(1107, 'LOG 1', 'theodore jhon valera', 300000, '2022-01-13', 102),
(1108, 'LOG 2', 'Karl angelo', 300000, '2022-01-13', 102),
(1109, 'Admin', 'michaela leigh valera', 300000, '2022-01-13', 101);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `PU_id` int(200) NOT NULL,
  `Co_Code` int(200) NOT NULL,
  `Pu_Item` varchar(200) NOT NULL,
  `Pu_Quantity` int(200) NOT NULL,
  `Pu_Price` int(200) NOT NULL,
  `Pu_Date` date NOT NULL,
  `Pu_Total` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`PU_id`, `Co_Code`, `Pu_Item`, `Pu_Quantity`, `Pu_Price`, `Pu_Date`, `Pu_Total`) VALUES
(1, 1001, 'Bus Fare', 5, 50, '2021-10-12', 250),
(2, 1002, 'Meal', 10, 150, '2021-11-12', 1500),
(3, 1002, 'Drinks', 15, 40, '2021-11-12', 600),
(4, 1002, 'Deserts', 12, 20, '2021-11-12', 240),
(5, 1003, 'Laptop', 1, 20000, '2021-12-12', 20000),
(6, 1002, 'Drinks', 20, 40, '2021-12-13', 800),
(7, 1003, 'Printer', 1, 30000, '2021-12-13', 30000),
(8, 101, 'Printers', 5, 50000, '2021-12-14', 500000),
(9, 102, 'Processor', 4, 16000, '2021-12-14', 16000),
(10, 1, 'electricity', 1, 5000, '2022-01-04', 5000),
(11, 1, 'gas', 1, 6000, '2022-01-04', 6000),
(12, 1, 'Internet connections', 1, 2500, '2022-01-04', 2500),
(13, 1, 'telephones', 1, 2300, '2022-01-04', 2300),
(14, 1, 'water', 1, 2500, '2022-01-04', 2500),
(15, 1004, 'chicken ', 5, 150, '2022-01-02', 750),
(16, 1004, 'Meat', 5, 300, '2022-01-02', 1500),
(17, 1004, 'drinks', 10, 15, '2022-01-02', 150),
(18, 1005, 'laptop - Acer Nitro 5', 1, 21, '2022-01-03', 21),
(19, 1006, 'keybroad-PSR- EW300', 1, 19998, '2022-01-04', 19998),
(20, 1007, 'Bond paper - Hard copy ', 1, 815, '2022-01-04', 815),
(21, 104, 'BTools 82 pcs tools socket', 1, 1729, '2022-01-03', 1729),
(22, 105, 'CNC pressure spring machine', 1, 74200, '2022-01-05', 74200),
(23, 106, 'Antenna Alignment tool ', 1, 6995, '2022-01-05', 6995),
(24, 107, 'lotus Sheet finish Sander', 1, 1210, '2022-01-06', 1210),
(25, 108, 'M-R-3 Acquired Property ', 1, 1000000, '2022-01-06', 1000000),
(26, 109, 'Forbes Park property ', 1, 4000000, '2022-01-07', 4000000),
(27, 110, 'Paper cup making machine', 1, 720000, '2022-01-08', 720000),
(28, 2, 'Renovation ', 0, 200000, '2022-01-03', 200000),
(29, 3, 'Transportation', 0, 100000, '2022-01-09', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `reimbursment`
--

CREATE TABLE `reimbursment` (
  `Co_Code` int(200) NOT NULL,
  `Co_Source` varchar(200) NOT NULL,
  `Co_Desc` varchar(200) NOT NULL,
  `Co_Date` date NOT NULL,
  `Co_Status` varchar(200) NOT NULL,
  `Co_Purpose` varchar(200) NOT NULL,
  `Co_Supplier` varchar(200) NOT NULL,
  `Co_Address` varchar(200) NOT NULL,
  `Co_City` varchar(200) NOT NULL,
  `Co_Country` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reimbursment`
--

INSERT INTO `reimbursment` (`Co_Code`, `Co_Source`, `Co_Desc`, `Co_Date`, `Co_Status`, `Co_Purpose`, `Co_Supplier`, `Co_Address`, `Co_City`, `Co_Country`) VALUES
(1001, 'HR3', 'maircor bituin', '2021-10-12', '102', 'for buying equipment', 'HP technologies', 'sanbenisa', 'Quezon city', 'philippines'),
(1002, 'HR3', 'ian james barbosa', '2021-10-12', '102', 'for buying machines', 'intel core', 'caloocan city, brgy kaligayahan', 'Caloocan city', 'philippines'),
(1003, 'HR3', 'ellie sabinay', '2021-10-13', '102', 'for buying food', 'jollibee corp', 'caloocan city, brgy kaligayahan', 'Caloocan city', 'philippines'),
(1004, 'HR3', 'melanie cabradilla', '2021-10-13', '102', 'for buying food', 'mang inasa corp', 'caloocan city, brgy kaligayahan', 'Caloocan city', 'philippines'),
(1005, 'HR3', 'elvira Aliga', '2022-01-11', '102', 'for loptop', 'ASUS', 'novaliches, quezon city', 'Quezon city', 'philippines'),
(1006, 'HR3', 'Tin Pachoco', '2022-01-11', '102', 'for key board', 'FANTECH', 'cubao, quezon city', 'Quezon city', 'philippines'),
(1007, 'HR3', 'Theodore jhon valera', '2022-01-11', '102', 'for bondpaper', 'HARD COPY', 'sampaloc, manila city', 'Manila city', 'philippines');

-- --------------------------------------------------------

--
-- Table structure for table `request_equipment`
--

CREATE TABLE `request_equipment` (
  `id` bigint(11) NOT NULL,
  `equipment_approval_id` bigint(11) NOT NULL,
  `facility_id` bigint(11) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `mname` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL,
  `time_date_request` datetime NOT NULL DEFAULT current_timestamp(),
  `list_equipment_request` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request_facility`
--

CREATE TABLE `request_facility` (
  `id` bigint(11) NOT NULL,
  `approval_number` bigint(11) DEFAULT NULL,
  `lname` varchar(250) DEFAULT NULL,
  `fname` varchar(250) DEFAULT NULL,
  `mname` varchar(250) DEFAULT NULL,
  `contact` bigint(11) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `department` varchar(250) DEFAULT NULL,
  `position` varchar(250) DEFAULT NULL,
  `event_type` varchar(250) DEFAULT NULL,
  `facility_type` varchar(250) DEFAULT NULL,
  `reservation_date` datetime DEFAULT current_timestamp(),
  `start` varchar(250) DEFAULT NULL,
  `until` varchar(250) DEFAULT NULL,
  `purpose` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_facility`
--

INSERT INTO `request_facility` (`id`, `approval_number`, `lname`, `fname`, `mname`, `contact`, `email`, `department`, `position`, `event_type`, `facility_type`, `reservation_date`, `start`, `until`, `purpose`) VALUES
(35, NULL, 'agaga', 'gag', 'gag', NULL, 'gag', 'gag', NULL, NULL, NULL, '2021-12-16 00:14:58', NULL, NULL, NULL),
(36, 5555, 'park', 'jimin', 'suga', 9777123244, 'shamtanpark@gmail.com', 'registrar', 'head', 'meeting', 'conference room', '2021-12-16 02:43:36', '8:00 am', '5:00 pm', 'tff'),
(38, 0, 'gabule', 'dexter', 'attres', 0, 'lilgabs08@gmail.com', '', '', '', '', '2022-04-06 17:04:45', '', '', ''),
(39, 0, 'DELA CRUZ', 'KIM', 'MAAT', 9352423007, '', 'HR DEPT.', 'MANAGER', '', '', '2022-04-06 17:06:11', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `Status_Code` int(200) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`Status_Code`, `Name`) VALUES
(101, 'Approved'),
(102, 'Pending'),
(103, 'Settled'),
(104, 'Credit'),
(105, 'Debit');

-- --------------------------------------------------------

--
-- Table structure for table `student_loan`
--

CREATE TABLE `student_loan` (
  `id` bigint(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `phone_no` bigint(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `name_of_university` varchar(250) NOT NULL,
  `degree` varchar(250) NOT NULL,
  `course` varchar(250) NOT NULL,
  `present_semester` varchar(250) NOT NULL,
  `start_year` varchar(250) NOT NULL,
  `end_year` varchar(250) NOT NULL,
  `loan_purpose` varchar(250) NOT NULL,
  `loan_application_date` varchar(250) NOT NULL,
  `loan_effective_date` varchar(250) NOT NULL,
  `loan_maturity_date` varchar(250) NOT NULL,
  `total_loan_amount` bigint(11) NOT NULL,
  `interest_amount` bigint(11) NOT NULL,
  `firstloan_repayment_date` varchar(250) NOT NULL,
  `lastloan_repayment_date` varchar(250) NOT NULL,
  `loan_repayment_amount` varchar(250) NOT NULL,
  `terms` varchar(250) NOT NULL,
  `loan_repayment_frequency` varchar(250) NOT NULL,
  `loan_repayment_method` varchar(250) NOT NULL,
  `date_of_loan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_loan`
--

INSERT INTO `student_loan` (`id`, `fullname`, `phone_no`, `email`, `address`, `name_of_university`, `degree`, `course`, `present_semester`, `start_year`, `end_year`, `loan_purpose`, `loan_application_date`, `loan_effective_date`, `loan_maturity_date`, `total_loan_amount`, `interest_amount`, `firstloan_repayment_date`, `lastloan_repayment_date`, `loan_repayment_amount`, `terms`, `loan_repayment_frequency`, `loan_repayment_method`, `date_of_loan`) VALUES
(1, 'gh', 0, '', '', '', '0', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '2021-12-15 03:28:33'),
(3, '', 535353, '', '', '', '0', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '2022-01-02 15:37:33'),
(4, '', 0, 'faf', 'fafag', 'gaga', '0', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '2022-01-02 15:40:30'),
(9, '', 0, '', '', '', '', '', '', '', '', '', '', 'fafa', 'faf', 0, 0, '', '', '', '', '', '', '2022-01-02 15:56:02'),
(10, '', 0, '', '', '', '', '', '', '', '', '', 'gsgs', 'gsgsg', 'gsgsg', 0, 0, '', '', '', '', '', '', '2022-01-02 15:57:58'),
(11, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', 'fafaf', '', '', '2022-01-02 16:07:39'),
(12, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '2022-01-02 23:35:44'),
(13, 'fafafafafaf', 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '2022-01-02 23:36:19'),
(14, 'gsgsgsgsgg', 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '2022-01-02 23:38:09'),
(15, '', 0, '', '', 'jhojpujpp0[', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '2022-01-02 23:39:59'),
(16, 'gsgsgsgsg', 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '2022-01-02 23:41:22'),
(17, 'fafafafafaf', 446646, 'agag', 'gagag', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '2022-01-02 23:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `uexpenses`
--

CREATE TABLE `uexpenses` (
  `Co_Code` int(200) NOT NULL,
  `UE_Department` varchar(200) NOT NULL,
  `UE_Requestor` varchar(200) NOT NULL,
  `UE_date` date NOT NULL,
  `UE_Desc` varchar(200) NOT NULL,
  `Co_Status` int(200) NOT NULL,
  `UE_Supplier` varchar(200) NOT NULL,
  `UE_Address` varchar(200) NOT NULL,
  `UE_City` varchar(200) NOT NULL,
  `UE_Country` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uexpenses`
--

INSERT INTO `uexpenses` (`Co_Code`, `UE_Department`, `UE_Requestor`, `UE_date`, `UE_Desc`, `Co_Status`, `UE_Supplier`, `UE_Address`, `UE_City`, `UE_Country`) VALUES
(1, 'Admin', 'Admin manager', '2021-12-03', 'for utilities and expenses', 102, 'Admin', 'Quirino Highway, Novaliches', 'Quezon City', 'Philippines'),
(2, 'Admin', 'Admin manager', '2021-12-04', 'maintenance', 102, 'Admin', 'Quirino Highway, Novaliches', 'Quezon City', 'Philippines'),
(3, 'Admin', 'Admin manager', '2021-12-07', 'Transportation', 102, 'Admin', 'Quirino Highway, Novaliches', 'Quezon City', 'Philippines');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `fname`, `name`) VALUES
(1, '20220404134948_Costumer-Complaint-Form.docx', 'Costumer-Complaint-Form.docx'),
(2, '20220404135100_bank (1).sql', 'bank (1).sql'),
(3, '20220404170045_CREDIT-MEMO.docx', 'CREDIT-MEMO.docx');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_files`
--

CREATE TABLE `uploaded_files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `new_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploaded_files`
--

INSERT INTO `uploaded_files` (`id`, `name`, `new_name`) VALUES
(1, 'text-animation.zip', '2711201606481769text-animation.zip'),
(2, 'TL.png', '2711201606481879TL.png'),
(3, 'TL.png', '2711201606482588TL.png'),
(4, 'TL.png', '2711201606482604TL.png'),
(5, 'TL.png', '2711201606482636TL.png'),
(6, 'text-animation.zip', '2711201606483139text-animation.zip'),
(7, '1st activity.docx', '22122116401838891st activity.docx');

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
(10, 'Peter', 'Admin', '134096e12368b9bce038ccac61963716c01fa8ee', 1, 'lsu2olid10.jpg', 1, '2022-03-22 18:31:29'),
(14, 'AnotherAdmin', 'AnotherAdmin11', '8451ba8a14d79753d34cb33b51ba46b4b025eb81', 1, 'no_image.jpg', 1, '2022-03-15 00:04:21'),
(15, 'Dexter Gabule', 'Netoy', '74c1aa7c4e1d92b89e253ce9c7dac9c0c377825a', 1, 'dnt743ff15.jpg', 1, '2022-04-09 08:11:05'),
(16, 'talion gerard', 'admin', '063e0ffb4d5b4441916eef12d276c3e06363dcdf', 1, 'no_image.jpg', 1, NULL),
(17, 'fafafafaf', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2, 'no_image.jpg', 1, NULL);

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
-- Table structure for table `visitor_log`
--

CREATE TABLE `visitor_log` (
  `visit_id` bigint(20) NOT NULL,
  `visitor_id` bigint(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `time_in` time NOT NULL,
  `time_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visitor_registration`
--

CREATE TABLE `visitor_registration` (
  `visitor_id` int(11) NOT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `middle_name` varchar(250) DEFAULT NULL,
  `department` varchar(250) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `contact` bigint(11) DEFAULT NULL,
  `visitor_type` varchar(250) DEFAULT NULL,
  `visitor_purpose` varchar(250) DEFAULT NULL,
  `time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor_registration`
--

INSERT INTO `visitor_registration` (`visitor_id`, `last_name`, `first_name`, `middle_name`, `department`, `address`, `email`, `contact`, `visitor_type`, `visitor_purpose`, `time`) VALUES
(1000100, '', 'dexter', 'a.', 'ADMINISTRATIVE', '48 talisay street payatas b. quezon city', 'lilgabs08@gmail.com', 9098374504, 'admin of hr department', 'hanap jowawi sa kabilang department iidolodddddd', '2022-03-31 15:51:47'),
(1000114, 'fafaf', 'faf', 'fafa', 'aaaaa', 'aaaaaaaaaa', ' admin@admin.com', 12345678921, 'faf', 'faf', '2022-04-05 07:31:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blacklist_person`
--
ALTER TABLE `blacklist_person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budgetreleasing`
--
ALTER TABLE `budgetreleasing`
  ADD PRIMARY KEY (`P_ID`),
  ADD KEY `FK_budgetreleasing_s` (`P_Status`),
  ADD KEY `FK_procurmentreleasing` (`P_Code`);

--
-- Indexes for table `car_loans`
--
ALTER TABLE `car_loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_information_core1`
--
ALTER TABLE `client_information_core1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`Co_Code`);

--
-- Indexes for table `collection_transactions`
--
ALTER TABLE `collection_transactions`
  ADD PRIMARY KEY (`LT_id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractrequest`
--
ALTER TABLE `contractrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core1files`
--
ALTER TABLE `core1files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_documents`
--
ALTER TABLE `employee_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_docu` (`applicant_id`);

--
-- Indexes for table `employee_information_core_human`
--
ALTER TABLE `employee_information_core_human`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_contract_req`
--
ALTER TABLE `emp_contract_req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_complain`
--
ALTER TABLE `equipment_complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_reservation`
--
ALTER TABLE `equipment_reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility_complain`
--
ALTER TABLE `facility_complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility_reservation`
--
ALTER TABLE `facility_reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr1files`
--
ALTER TABLE `hr1files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mortgages`
--
ALTER TABLE `mortgages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obudget`
--
ALTER TABLE `obudget`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `personal_loan`
--
ALTER TABLE `personal_loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procurment`
--
ALTER TABLE `procurment`
  ADD PRIMARY KEY (`Co_Code`),
  ADD KEY `FK_procurment` (`Co_Status`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`Co_Code`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`PU_id`);

--
-- Indexes for table `reimbursment`
--
ALTER TABLE `reimbursment`
  ADD PRIMARY KEY (`Co_Code`);

--
-- Indexes for table `request_equipment`
--
ALTER TABLE `request_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_facility`
--
ALTER TABLE `request_facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Status_Code`);

--
-- Indexes for table `student_loan`
--
ALTER TABLE `student_loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uexpenses`
--
ALTER TABLE `uexpenses`
  ADD PRIMARY KEY (`Co_Code`),
  ADD KEY `FK_uexpenses` (`Co_Status`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
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
-- Indexes for table `visitor_registration`
--
ALTER TABLE `visitor_registration`
  ADD PRIMARY KEY (`visitor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blacklist_person`
--
ALTER TABLE `blacklist_person`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;

--
-- AUTO_INCREMENT for table `budgetreleasing`
--
ALTER TABLE `budgetreleasing`
  MODIFY `P_ID` int(200) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `car_loans`
--
ALTER TABLE `car_loans`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18010547;

--
-- AUTO_INCREMENT for table `client_information_core1`
--
ALTER TABLE `client_information_core1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `Co_Code` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `collection_transactions`
--
ALTER TABLE `collection_transactions`
  MODIFY `LT_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contractrequest`
--
ALTER TABLE `contractrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `core1files`
--
ALTER TABLE `core1files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employee_documents`
--
ALTER TABLE `employee_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee_information_core_human`
--
ALTER TABLE `employee_information_core_human`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `emp_contract_req`
--
ALTER TABLE `emp_contract_req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `equipment_complain`
--
ALTER TABLE `equipment_complain`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `equipment_reservation`
--
ALTER TABLE `equipment_reservation`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `Id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `facility_complain`
--
ALTER TABLE `facility_complain`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `facility_reservation`
--
ALTER TABLE `facility_reservation`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hr1files`
--
ALTER TABLE `hr1files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mortgages`
--
ALTER TABLE `mortgages`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11002111105;

--
-- AUTO_INCREMENT for table `obudget`
--
ALTER TABLE `obudget`
  MODIFY `Id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_loan`
--
ALTER TABLE `personal_loan`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18010546;

--
-- AUTO_INCREMENT for table `procurment`
--
ALTER TABLE `procurment`
  MODIFY `Co_Code` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `Co_Code` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1110;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `PU_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `reimbursment`
--
ALTER TABLE `reimbursment`
  MODIFY `Co_Code` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT for table `request_equipment`
--
ALTER TABLE `request_equipment`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `request_facility`
--
ALTER TABLE `request_facility`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `Status_Code` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `student_loan`
--
ALTER TABLE `student_loan`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `uexpenses`
--
ALTER TABLE `uexpenses`
  MODIFY `Co_Code` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `visitor_registration`
--
ALTER TABLE `visitor_registration`
  MODIFY `visitor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000115;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `budgetreleasing`
--
ALTER TABLE `budgetreleasing`
  ADD CONSTRAINT `FK_budgetreleasing_s` FOREIGN KEY (`P_Status`) REFERENCES `status` (`Status_Code`);

--
-- Constraints for table `uexpenses`
--
ALTER TABLE `uexpenses`
  ADD CONSTRAINT `FK_uexpenses` FOREIGN KEY (`Co_Status`) REFERENCES `status` (`Status_Code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

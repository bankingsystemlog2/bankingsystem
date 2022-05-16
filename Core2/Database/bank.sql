-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2022 at 10:53 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
(1, 'second hand', 'honda', 75000, 50000, 7500, '8 years', 'dexter', 'attress', 'gabule', 'male', 'single yern', '48 talisay street payatas b. quezon city', '48 talisay street payatas b. quezon city', 'nov 8, 1999', 'quezon city', 9098374504, 'lilgabs08@gmail.com', 123456789, 'shabu', '15000', 'dexter gabule breebree', 'bossing', '2021-11-28 05:39:31'),
(14, '', '', 0, 0, 0, '', '', '', '', '', '', '', 'fag', 'gagag', 'gaga', 53535, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-01 23:05:22'),
(15, '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 0, 'gsg', 64646, '', NULL, NULL, NULL, '2022-01-01 23:10:35'),
(16, '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 0, '', 0, 'fafaf', NULL, NULL, NULL, '2022-01-01 23:13:25'),
(17, '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 0, '', 0, 'gag', '', '', '', '2022-01-01 23:16:43'),
(18, '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 0, '', 0, '', '45454', '', 'faf', '2022-01-01 23:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `client_information`
--

CREATE TABLE `client_information` (
  `id` int(30) NOT NULL,
  `Full_name` varchar(30) NOT NULL,
  `Birthdate` date NOT NULL,
  `Email_add` text NOT NULL,
  `cstatus` varchar(15) NOT NULL,
  `wstatus` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `typeofloan` varchar(30) NOT NULL,
  `t_amount` int(30) NOT NULL,
  `t_payable` int(30) NOT NULL,
  `m_payable` int(20) NOT NULL,
  `termofpayment` varchar(30) NOT NULL,
  `datereleased` date NOT NULL,
  `Co_Status` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_information`
--

INSERT INTO `client_information` (`id`, `Full_name`, `Birthdate`, `Email_add`, `cstatus`, `wstatus`, `address`, `typeofloan`, `t_amount`, `t_payable`, `m_payable`, `termofpayment`, `datereleased`, `Co_Status`) VALUES
(1, 'NOEL BUNA CRUZ PONTEJO', '1998-09-27', 'noelpontejo.27@gmail.com', 'married', 'employed', '47 freedom park 5 batasan hills quezon city', 'Home Loan', 400000, 408000, 5000, 'debit credit', '2022-01-15', 105),
(2, 'CHRISTIAN KENNETH ABUNGAN', '1998-12-31', 'kennethskie@gmail.com', 'married', 'employed', 'rockville village caloocan city', 'Personal Loan', 80000, 83000, 4150, 'debit credit', '2022-01-16', 105);

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
-- Table structure for table `contract2`
--

CREATE TABLE `contract2` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `Body` text NOT NULL,
  `preparedby` varchar(250) NOT NULL,
  `urlpath` varchar(250) NOT NULL,
  `date_created` date NOT NULL,
  `sec_dep` text NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(9, 'dad', 'dadad', 'Staff', 'uploads/stakeholder.docx', '2022-03-26', 'dddddddddd', '2022-03-13', '2022-03-27', 1);

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
-- Table structure for table `house_loan`
--

CREATE TABLE `house_loan` (
  `id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `L_amount` int(11) NOT NULL,
  `L_term` varchar(50) NOT NULL,
  `Property_add` varchar(50) NOT NULL,
  `Property_type` varchar(50) NOT NULL,
  `F_name` varchar(25) NOT NULL,
  `M_name` varchar(25) NOT NULL,
  `L_name` varchar(25) NOT NULL,
  `sex` varchar(9) NOT NULL,
  `civil_status` varchar(25) NOT NULL,
  `home_address` varchar(50) NOT NULL,
  `perma_address` varchar(50) NOT NULL,
  `d_birth` date NOT NULL,
  `p_birth` varchar(25) NOT NULL,
  `m_number` bigint(11) NOT NULL,
  `e_address` varchar(25) NOT NULL,
  `tin_sss_gsis_no` int(20) NOT NULL,
  `source_income` varchar(25) NOT NULL,
  `monthly_income` int(11) NOT NULL,
  `employeer_name` varchar(25) NOT NULL,
  `position` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `loan_details`
--

CREATE TABLE `loan_details` (
  `id` int(30) NOT NULL,
  `Full_name` varchar(40) NOT NULL,
  `L_type` varchar(30) NOT NULL,
  `Plan` varchar(30) NOT NULL,
  `t_amount` int(30) NOT NULL,
  `T_payable` int(30) NOT NULL,
  `M_payable` int(30) NOT NULL,
  `total_paid` int(30) NOT NULL,
  `d_released` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_details`
--

INSERT INTO `loan_details` (`id`, `Full_name`, `L_type`, `Plan`, `t_amount`, `T_payable`, `M_payable`, `total_paid`, `d_released`) VALUES
(1, 'NOEL BUNA CRUZ PONTEJO', 'Home Loan', '36months', 400000, 180000, 5000, 180000, '2022-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `loan_list`
--

CREATE TABLE `loan_list` (
  `id` int(11) NOT NULL,
  `L_amount` int(11) NOT NULL,
  `L_term` varchar(11) NOT NULL,
  `Propoerty_add` varchar(50) NOT NULL,
  `Property_type` varchar(50) NOT NULL,
  `F_name` varchar(25) NOT NULL,
  `M_name` varchar(50) NOT NULL,
  `L_name` varchar(50) NOT NULL,
  `sex` varchar(11) NOT NULL,
  `civil_status` varchar(11) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `perma_address` varchar(255) NOT NULL,
  `d_birth` date NOT NULL,
  `p_birth` varchar(50) NOT NULL,
  `m_number` bigint(11) NOT NULL,
  `e_address` varchar(255) NOT NULL,
  `tin_sss_gsis_no` int(25) NOT NULL,
  `source_income` varchar(255) NOT NULL,
  `monthly_income` int(11) NOT NULL,
  `employeer_name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan_payment_monitoring`
--

CREATE TABLE `loan_payment_monitoring` (
  `id` int(30) NOT NULL,
  `Full_name` varchar(40) NOT NULL,
  `Ref_number` text NOT NULL,
  `next_payment_monitoring` date NOT NULL,
  `status` varchar(15) NOT NULL,
  `d_released` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_payment_monitoring`
--

INSERT INTO `loan_payment_monitoring` (`id`, `Full_name`, `Ref_number`, `next_payment_monitoring`, `status`, `d_released`) VALUES
(1, 'NOEL BUNA CRUZ PONTEJO', '123456', '2021-12-09', 'approved', '2022-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `loan_processing_approval`
--

CREATE TABLE `loan_processing_approval` (
  `id` int(30) NOT NULL,
  `Full_Name` varchar(35) NOT NULL,
  `Ref_Number` text NOT NULL,
  `Type_of_loan` varchar(35) NOT NULL,
  `Amount_loan` int(30) NOT NULL,
  `Status` varchar(15) NOT NULL,
  `D_released` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_processing_approval`
--

INSERT INTO `loan_processing_approval` (`id`, `Full_Name`, `Ref_Number`, `Type_of_loan`, `Amount_loan`, `Status`, `D_released`) VALUES
(1, 'NOEL BUNA CRUZ PONTEJO', '123456', 'Home Loan', 400000, 'Denied', '2022-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `loan_restructuring`
--

CREATE TABLE `loan_restructuring` (
  `id` int(30) NOT NULL,
  `Full_name` varchar(30) NOT NULL,
  `ref_number` text NOT NULL,
  `type_of_loan` varchar(30) NOT NULL,
  `type_of_restruct` varchar(30) NOT NULL,
  `status` varchar(25) NOT NULL,
  `date_released` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_restructuring`
--

INSERT INTO `loan_restructuring` (`id`, `Full_name`, `ref_number`, `type_of_loan`, `type_of_restruct`, `status`, `date_released`) VALUES
(1, 'NOEL BUNA CRUZ PONTEJO', '123456', 'home credit', 'Payment Extension', 'approved', '2022-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `mortgages`
--

CREATE TABLE `mortgages` (
  `id` bigint(11) NOT NULL,
  `ref_no` int(11) NOT NULL,
  `loan_amount` bigint(11) DEFAULT NULL,
  `loan_terms` varchar(250) DEFAULT NULL,
  `fname` varchar(250) DEFAULT NULL,
  `mname` varchar(250) DEFAULT NULL,
  `lname` varchar(250) DEFAULT NULL,
  `sex` varchar(250) DEFAULT NULL,
  `civil_status` varchar(250) DEFAULT NULL,
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

INSERT INTO `mortgages` (`id`, `ref_no`, `loan_amount`, `loan_terms`, `fname`, `mname`, `lname`, `sex`, `civil_status`, `perma_address`, `date_0f_birth`, `place_of_birth`, `mobile_no`, `email_address`, `tin_sss_gsis_no`, `source_of_income`, `monthly_income`, `employeer_name`, `position`, `date_of_loan`) VALUES
(1, 94701526, 800000, '12 Months', 'Noel', 'Buna Cruz', 'Pontejo', 'Male', 'Single', '47 Freedom Park 5 Batasan Hills Quezon City', '2022-04-12', 'Quezon City', 9102290706, 'noelpontejo.27@gmail.com', 12345678912, 'Business', 30000, 'Noel Pontejo', 'CEO', '2022-04-10 06:37:35');

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
(3, '', '', 0, '', '', 0, '', '', '', '', '', '', 0, 'fafaf', '', 0, '', '', '', '', '', '', 0, '', 0, 0, '2022-01-13 00:22:33');

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
(2, 2554654, 'Employee', 'jon', 'f', 'doe', 'memorandum', 'CORE1', 'pending', '2022-04-23 18:39:55'),
(4, 0, 'fafa', 'faf', 'fafa', 'fafafa', ' 88888', 'afaf', NULL, '2022-05-01 16:30:26');

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
(10, 'Peter', 'Admin', '134096e12368b9bce038ccac61963716c01fa8ee', 1, 'lsu2olid10.jpg', 1, '2022-05-01 15:46:23'),
(12, 'Mae Ann Caunca', 'User', '12dea96fec20593566ab75692c9949596833adc9', 2, '3gy5cpqg12.jpg', 0, '2022-03-23 09:42:05'),
(14, 'AnotherAdmin', 'AnotherAdmin11', '8451ba8a14d79753d34cb33b51ba46b4b025eb81', 1, 'no_image.jpg', 1, '2022-03-15 00:04:21');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budgetreleasing`
--
ALTER TABLE `budgetreleasing`
  ADD PRIMARY KEY (`P_ID`),
  ADD KEY `FK_budgetreleasing_s` (`P_Status`),
  ADD KEY `FK_procurmentreleasing` (`P_Code`);

--
-- Indexes for table `client_information`
--
ALTER TABLE `client_information`
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
-- Indexes for table `contract2`
--
ALTER TABLE `contract2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core1files`
--
ALTER TABLE `core1files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `house_loan`
--
ALTER TABLE `house_loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_details`
--
ALTER TABLE `loan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_list`
--
ALTER TABLE `loan_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_payment_monitoring`
--
ALTER TABLE `loan_payment_monitoring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_processing_approval`
--
ALTER TABLE `loan_processing_approval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_restructuring`
--
ALTER TABLE `loan_restructuring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obudget`
--
ALTER TABLE `obudget`
  ADD PRIMARY KEY (`Id`);

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
-- Indexes for table `request_contract`
--
ALTER TABLE `request_contract`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Status_Code`);

--
-- Indexes for table `uexpenses`
--
ALTER TABLE `uexpenses`
  ADD PRIMARY KEY (`Co_Code`),
  ADD KEY `FK_uexpenses` (`Co_Status`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budgetreleasing`
--
ALTER TABLE `budgetreleasing`
  MODIFY `P_ID` int(200) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `client_information`
--
ALTER TABLE `client_information`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `core1files`
--
ALTER TABLE `core1files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `Id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `loan_details`
--
ALTER TABLE `loan_details`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loan_payment_monitoring`
--
ALTER TABLE `loan_payment_monitoring`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loan_processing_approval`
--
ALTER TABLE `loan_processing_approval`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loan_restructuring`
--
ALTER TABLE `loan_restructuring`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `obudget`
--
ALTER TABLE `obudget`
  MODIFY `Id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `request_contract`
--
ALTER TABLE `request_contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `Status_Code` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `uexpenses`
--
ALTER TABLE `uexpenses`
  MODIFY `Co_Code` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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

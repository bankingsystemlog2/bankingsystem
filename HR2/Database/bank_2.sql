-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2022 at 07:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

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
-- Table structure for table `applicantl`
--

CREATE TABLE `applicantl` (
  `app_id` int(11) NOT NULL,
  `app_aid` varchar(100) NOT NULL,
  `app_fname` varchar(100) NOT NULL,
  `app_mname` varchar(100) NOT NULL,
  `app_lname` varchar(100) NOT NULL,
  `app_bdate` varchar(100) NOT NULL,
  `app_gender` varchar(100) NOT NULL,
  `app_address` varchar(100) NOT NULL,
  `app_contact` varchar(100) NOT NULL,
  `app_email` varchar(100) NOT NULL,
  `app_status` varchar(100) NOT NULL,
  `app_for` varchar(100) NOT NULL,
  `app_adate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applicantl`
--

INSERT INTO `applicantl` (`app_id`, `app_aid`, `app_fname`, `app_mname`, `app_lname`, `app_bdate`, `app_gender`, `app_address`, `app_contact`, `app_email`, `app_status`, `app_for`, `app_adate`) VALUES
(1, 'a000001', 'Manny', 'Pacman', 'Paquiao', '1950-02-01', 'Male', 'General Santos City.', '01923456789', 'pacman@gmail.com', 'Reject', 'Teller', '2022-04-01'),
(2, 'a000002', 'Leni', '', 'Robredo', '1950-02-01', 'Female', 'Mars', '01923456789', 'lugaw@gmail.com', 'New', 'Guard', '2022-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `att`
--

CREATE TABLE `att` (
  `att_id` int(11) NOT NULL,
  `att_ide` varchar(11) NOT NULL,
  `att_d` varchar(25) NOT NULL,
  `att_i` varchar(25) NOT NULL,
  `att_o` varchar(25) NOT NULL,
  `att_s` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `att`
--

INSERT INTO `att` (`att_id`, `att_ide`, `att_d`, `att_i`, `att_o`, `att_s`) VALUES
(1, '15', '2022-01-01', '07:55:25', '', 'Present'),
(2, '15', '2022-01-01', '', '17:05:30', 'Present'),
(3, '15', '2022-01-02', '', '', 'Absent');

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
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `c_id` int(11) NOT NULL,
  `c_eid` varchar(11) NOT NULL,
  `c_status` varchar(20) NOT NULL,
  `c_rank` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`c_id`, `c_eid`, `c_status`, `c_rank`) VALUES
(1, '1001', 'Active', '1');

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
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `con_id` int(11) NOT NULL,
  `con_eid` varchar(100) NOT NULL,
  `con_type` varchar(100) NOT NULL,
  `con_detail` varchar(100) NOT NULL,
  `con_from` varchar(100) NOT NULL,
  `con_to` varchar(100) NOT NULL,
  `con_status` varchar(100) NOT NULL,
  `con_sdate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`con_id`, `con_eid`, `con_type`, `con_detail`, `con_from`, `con_to`, `con_status`, `con_sdate`) VALUES
(1, 'e000001', 'Regular', 'Contract Test Details.', '2022-04-01', '2022-10-01', 'Signed', '2022-04-01'),
(2, 'e000002', 'Casual', 'Casual Test Details.', '2022-05-01', '2022-11-01', 'Unsigned', '');

-- --------------------------------------------------------

--
-- Table structure for table `evalcom`
--

CREATE TABLE `evalcom` (
  `ec_id` int(11) NOT NULL,
  `ec_eid` varchar(100) NOT NULL,
  `ec_gt` varchar(100) NOT NULL,
  `ec_ge` varchar(100) NOT NULL,
  `ec_total` varchar(100) NOT NULL,
  `ec_status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `evalcom`
--

INSERT INTO `evalcom` (`ec_id`, `ec_eid`, `ec_gt`, `ec_ge`, `ec_total`, `ec_status`) VALUES
(1, '17', '50', '50', '100', ''),
(2, '16', '25', '49', '74', '');

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
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `job_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_name`) VALUES
(1, 'Manager'),
(2, 'Teller'),
(3, 'Guard');

-- --------------------------------------------------------

--
-- Table structure for table `jobplan`
--

CREATE TABLE `jobplan` (
  `jp_id` int(11) NOT NULL,
  `jp_position` varchar(100) NOT NULL,
  `jp_type` varchar(100) NOT NULL,
  `jp_exp` varchar(100) NOT NULL,
  `jp_salrate` int(11) NOT NULL,
  `jp_drate` int(11) NOT NULL,
  `jp_hrate` int(11) NOT NULL,
  `jp_otrate` int(11) NOT NULL,
  `jp_ph` int(11) NOT NULL,
  `jp_sss` int(11) NOT NULL,
  `jp_pi` int(11) NOT NULL,
  `jp_tax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobplan`
--

INSERT INTO `jobplan` (`jp_id`, `jp_position`, `jp_type`, `jp_exp`, `jp_salrate`, `jp_drate`, `jp_hrate`, `jp_otrate`, `jp_ph`, `jp_sss`, `jp_pi`, `jp_tax`) VALUES
(1, 'Manager', 'Regular', '2-Years', 50000, 1666, 138, 69, 100, 150, 50, 500),
(2, 'Manager', 'Casual', '1-Year', 30000, 1000, 125, 62, 50, 75, 25, 250),
(3, 'Teller', 'Regular', '2-Years', 40000, 1333, 166, 83, 90, 130, 40, 400),
(4, 'Guard', 'Casual', '1-Year', 15000, 500, 62, 31, 50, 75, 25, 250),
(5, 'Teller', 'Casual', '1-Year', 30000, 1000, 125, 31, 75, 100, 50, 500);

-- --------------------------------------------------------

--
-- Table structure for table `listcom`
--

CREATE TABLE `listcom` (
  `lc_id` int(11) NOT NULL,
  `lc_eid` varchar(100) NOT NULL,
  `lc_en` varchar(100) NOT NULL,
  `lc_mot` varchar(100) NOT NULL,
  `lc_ad` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `listcom`
--

INSERT INTO `listcom` (`lc_id`, `lc_eid`, `lc_en`, `lc_mot`, `lc_ad`) VALUES
(1, '17', 'Communication skills (verbal)', 'Communication skills (written)', 'Group-oriented leadership'),
(2, '16', 'Customer-oriented', 'Acting innovatively', 'Delegating');

-- --------------------------------------------------------

--
-- Table structure for table `lv`
--

CREATE TABLE `lv` (
  `lv_id` int(11) NOT NULL,
  `lv_ide` varchar(11) NOT NULL,
  `lv_tp` varchar(100) NOT NULL,
  `lv_f` varchar(25) NOT NULL,
  `lv_t` varchar(25) NOT NULL,
  `lv_d` varchar(25) NOT NULL,
  `lv_r` varchar(255) NOT NULL,
  `lv_s` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lv`
--

INSERT INTO `lv` (`lv_id`, `lv_ide`, `lv_tp`, `lv_f`, `lv_t`, `lv_d`, `lv_r`, `lv_s`) VALUES
(1, '15', 'Test Leave Type', '2022-01-02', '2022-01-05', '3', 'Test Leave Reason', 'Pending'),
(2, '15', 'Casual Leave', '2022-01-15', '2022-01-20', '5', 'Family Vacation', 'Pending'),
(3, '15', 'Sick Leave', '2022-01-01', '2022-01-02', '', 'Soka Tae', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `lvtype`
--

CREATE TABLE `lvtype` (
  `l_id` int(11) NOT NULL,
  `l_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lvtype`
--

INSERT INTO `lvtype` (`l_id`, `l_name`) VALUES
(1, 'Casual Leave'),
(2, 'Sick Leave');

-- --------------------------------------------------------

--
-- Table structure for table `mst_question`
--

CREATE TABLE `mst_question` (
  `que_id` int(5) NOT NULL,
  `test_id` int(5) DEFAULT NULL,
  `que_desc` varchar(150) DEFAULT NULL,
  `ans1` varchar(75) DEFAULT NULL,
  `ans2` varchar(75) DEFAULT NULL,
  `ans3` varchar(75) DEFAULT NULL,
  `ans4` varchar(75) DEFAULT NULL,
  `true_ans` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_question`
--

INSERT INTO `mst_question` (`que_id`, `test_id`, `que_desc`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`) VALUES
(1, 1, 'Tanong Lang?', 'Sagot', 'Hindi1', 'Hindi2', 'Hindi3', 1),
(2, 1, 'Tanong lang 2?', 'Hindi1', 'Sagot', 'Hindi2', 'Hindi3', 2),
(3, 1, 'Tanong lang 3?', 'Hindi1', 'Hindi2', 'Sagot', 'Hindi3', 3),
(4, 2, 'What is Number After 0', '1', '2', '3', '4', 1),
(5, 2, 'What is Number After 1', '1', '2', '3', '4', 2),
(6, 2, 'What is Number After 2', '1', '2', '3', '4', 3),
(7, 2, 'What is Number After 3', '1', '2', '3', '4', 4),
(8, 2, 'What is Number After 4', '2', '3', '4', '5', 4),
(9, 3, 'Ano Numer Sunod sa 1', 'Edi 1', 'Edi 2', 'Edi 3', 'Edi 4', 1),
(10, 3, 'Ano Numer Sunod sa 2', 'Edi 1', 'Edi 2', 'Edi 3', 'Edi 4', 1),
(11, 3, 'Ano Numer Sunod sa  3', 'Edi 1', 'Edi 2', 'Edi 3', 'Edi 4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_result`
--

CREATE TABLE `mst_result` (
  `res_id` int(11) NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `test_id` int(5) DEFAULT NULL,
  `test_date` date DEFAULT NULL,
  `score` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_result`
--

INSERT INTO `mst_result` (`res_id`, `login`, `test_id`, `test_date`, `score`) VALUES
(6, '15', 1, '0000-00-00', 3),
(7, '15', 2, '0000-00-00', 5),
(8, '15', 2, '0000-00-00', 2),
(9, '16', 1, '0000-00-00', 1),
(10, '17', 1, '0000-00-00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mst_subject`
--

CREATE TABLE `mst_subject` (
  `sub_id` int(5) NOT NULL,
  `sub_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_subject`
--

INSERT INTO `mst_subject` (`sub_id`, `sub_name`) VALUES
(1, 'Test'),
(2, 'NewOne'),
(7, 'TestSubj');

-- --------------------------------------------------------

--
-- Table structure for table `mst_test`
--

CREATE TABLE `mst_test` (
  `test_id` int(5) NOT NULL,
  `sub_id` int(5) DEFAULT NULL,
  `test_name` varchar(30) DEFAULT NULL,
  `total_que` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_test`
--

INSERT INTO `mst_test` (`test_id`, `sub_id`, `test_name`, `total_que`) VALUES
(1, 1, 'Test Exam', '3'),
(2, 2, 'NewOneExam', '5'),
(3, 7, 'TestSubjName', '3');

-- --------------------------------------------------------

--
-- Table structure for table `mst_useranswer`
--

CREATE TABLE `mst_useranswer` (
  `ans_id` int(11) NOT NULL,
  `sess_id` varchar(80) DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  `que_des` varchar(200) DEFAULT NULL,
  `ans1` varchar(50) DEFAULT NULL,
  `ans2` varchar(50) DEFAULT NULL,
  `ans3` varchar(50) DEFAULT NULL,
  `ans4` varchar(50) DEFAULT NULL,
  `true_ans` int(11) DEFAULT NULL,
  `your_ans` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_useranswer`
--

INSERT INTO `mst_useranswer` (`ans_id`, `sess_id`, `test_id`, `que_des`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`, `your_ans`) VALUES
(18, '63bf1c11732f991c7ef1349cd0993c95', 1, 'Tanong Lang?', 'Sagot', 'Hindi1', 'Hindi2', 'Hindi3', 1, 1),
(19, '63bf1c11732f991c7ef1349cd0993c95', 1, 'Tanong lang 2?', 'Hindi1', 'Sagot', 'Hindi2', 'Hindi3', 2, 2),
(20, '63bf1c11732f991c7ef1349cd0993c95', 1, 'Tanong lang 3?', 'Hindi1', 'Hindi2', 'Sagot', 'Hindi3', 3, 3),
(21, '63bf1c11732f991c7ef1349cd0993c95', 2, 'What is Number After 0', '1', '2', '3', '4', 1, 1),
(22, '63bf1c11732f991c7ef1349cd0993c95', 2, 'What is Number After 1', '1', '2', '3', '4', 2, 2),
(23, '63bf1c11732f991c7ef1349cd0993c95', 2, 'What is Number After 2', '1', '2', '3', '4', 3, 3),
(24, '63bf1c11732f991c7ef1349cd0993c95', 2, 'What is Number After 3', '1', '2', '3', '4', 4, 4),
(25, '63bf1c11732f991c7ef1349cd0993c95', 2, 'What is Number After 4', '2', '3', '4', '5', 4, 4),
(26, '63bf1c11732f991c7ef1349cd0993c95', 2, 'What is Number After 0', '1', '2', '3', '4', 1, 2),
(27, '63bf1c11732f991c7ef1349cd0993c95', 2, 'What is Number After 1', '1', '2', '3', '4', 2, 3),
(28, '63bf1c11732f991c7ef1349cd0993c95', 2, 'What is Number After 2', '1', '2', '3', '4', 3, 4),
(29, '63bf1c11732f991c7ef1349cd0993c95', 2, 'What is Number After 3', '1', '2', '3', '4', 4, 4),
(30, '63bf1c11732f991c7ef1349cd0993c95', 2, 'What is Number After 4', '2', '3', '4', '5', 4, 4),
(31, '63bf1c11732f991c7ef1349cd0993c95', 1, 'Tanong Lang?', 'Sagot', 'Hindi1', 'Hindi2', 'Hindi3', 1, 2),
(32, '63bf1c11732f991c7ef1349cd0993c95', 1, 'Tanong lang 2?', 'Hindi1', 'Sagot', 'Hindi2', 'Hindi3', 2, 2),
(33, '63bf1c11732f991c7ef1349cd0993c95', 1, 'Tanong lang 3?', 'Hindi1', 'Hindi2', 'Sagot', 'Hindi3', 3, 2),
(34, '63bf1c11732f991c7ef1349cd0993c95', 1, 'Tanong Lang?', 'Sagot', 'Hindi1', 'Hindi2', 'Hindi3', 1, 1),
(35, '63bf1c11732f991c7ef1349cd0993c95', 1, 'Tanong lang 2?', 'Hindi1', 'Sagot', 'Hindi2', 'Hindi3', 2, 2),
(36, '63bf1c11732f991c7ef1349cd0993c95', 1, 'Tanong lang 3?', 'Hindi1', 'Hindi2', 'Sagot', 'Hindi3', 3, 3);

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
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `p_id` int(11) NOT NULL,
  `p_eid` varchar(100) NOT NULL,
  `p_bs` int(11) NOT NULL,
  `p_ot` int(11) NOT NULL,
  `p_hra` int(11) NOT NULL,
  `p_con` int(11) NOT NULL,
  `p_oa` int(11) NOT NULL,
  `p_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`p_id`, `p_eid`, `p_bs`, `p_ot`, `p_hra`, `p_con`, `p_oa`, `p_date`) VALUES
(1, 'e000001', 240, 120, 1000, 2000, 3000, '2022-04-01'),
(2, 'e000002', 240, 120, 500, 1000, 2000, '2022-04-01'),
(3, 'e000003', 240, 120, 500, 1000, 1500, '2022-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `pln_id` int(11) NOT NULL,
  `pln_name` varchar(100) NOT NULL,
  `pln_desc` varchar(255) NOT NULL,
  `pln_type` varchar(100) NOT NULL,
  `pln_job` varchar(100) NOT NULL,
  `pln_status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`pln_id`, `pln_name`, `pln_desc`, `pln_type`, `pln_job`, `pln_status`) VALUES
(1, 'Plan 1', 'Test Plan 1', 'Job', 'Test Job', 'Active');

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
-- Table structure for table `prom`
--

CREATE TABLE `prom` (
  `p_id` int(11) NOT NULL,
  `p_eid` varchar(100) NOT NULL,
  `p_type` varchar(100) NOT NULL,
  `p_date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prom`
--

INSERT INTO `prom` (`p_id`, `p_eid`, `p_type`, `p_date`) VALUES
(1, '16', 'Investment Banker', '2022-02-01'),
(2, '17', 'Financial Advisor', '2022-01-31'),
(5, '12', 'Manager', '');

-- --------------------------------------------------------

--
-- Table structure for table `promoted`
--

CREATE TABLE `promoted` (
  `pr_id` int(11) NOT NULL,
  `pr_eid` varchar(100) NOT NULL,
  `pr_from` varchar(100) NOT NULL,
  `pr_to` varchar(100) NOT NULL,
  `pr_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promoted`
--

INSERT INTO `promoted` (`pr_id`, `pr_eid`, `pr_from`, `pr_to`, `pr_date`) VALUES
(1, 'e000001', 'Casual', 'Regular', '2022-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `promsl`
--

CREATE TABLE `promsl` (
  `psl_id` int(11) NOT NULL,
  `psl_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promsl`
--

INSERT INTO `promsl` (`psl_id`, `psl_name`) VALUES
(1, 'Manager'),
(2, 'Investment Banker'),
(3, 'Financial Advisor');

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
-- Table structure for table `resigned`
--

CREATE TABLE `resigned` (
  `rs_id` int(11) NOT NULL,
  `rs_eid` varchar(100) NOT NULL,
  `rs_reason` varchar(100) NOT NULL,
  `rs_date` varchar(100) NOT NULL,
  `rs_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resigned`
--

INSERT INTO `resigned` (`rs_id`, `rs_eid`, `rs_reason`, `rs_date`, `rs_status`) VALUES
(1, 'e000002', 'Mag reresign nako kasi napaka bobo ko promise!', '2022-04-05', 'Approved'),
(2, 'e000003', 'Yokona sa earth!', '2022-04-06', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `sc`
--

CREATE TABLE `sc` (
  `sc_id` int(11) NOT NULL,
  `sc_ide` varchar(11) NOT NULL,
  `sc_dpt` varchar(100) NOT NULL,
  `sc_d` varchar(255) NOT NULL,
  `sc_t1` varchar(20) NOT NULL,
  `sc_t2` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sc`
--

INSERT INTO `sc` (`sc_id`, `sc_ide`, `sc_dpt`, `sc_d`, `sc_t1`, `sc_t2`) VALUES
(1, '15', 'Loan Servicing Department', '2022-01-01', '08:00', '17:00'),
(2, '15', 'Loan Servicing Department', '2022-01-02', '08:00', '17:00');

-- --------------------------------------------------------

--
-- Table structure for table `sl`
--

CREATE TABLE `sl` (
  `s_id` int(11) NOT NULL,
  `s_ide` varchar(11) NOT NULL,
  `s_basic` varchar(100) NOT NULL,
  `s_sss` varchar(20) NOT NULL,
  `s_pi` varchar(20) NOT NULL,
  `s_ph` varchar(20) NOT NULL,
  `s_loan` varchar(20) NOT NULL,
  `s_total` varchar(25) NOT NULL,
  `s_d` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sl`
--

INSERT INTO `sl` (`s_id`, `s_ide`, `s_basic`, `s_sss`, `s_pi`, `s_ph`, `s_loan`, `s_total`, `s_d`) VALUES
(1, '15', '4500', '15', '12', '10', '250', '4213', '2021-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `slcom`
--

CREATE TABLE `slcom` (
  `sl_id` int(11) NOT NULL,
  `sl_en` varchar(100) NOT NULL,
  `sl_mot` varchar(100) NOT NULL,
  `sl_ad` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slcom`
--

INSERT INTO `slcom` (`sl_id`, `sl_en`, `sl_mot`, `sl_ad`) VALUES
(1, 'Communication skills (verbal)', 'Communication skills (written)', 'Group-oriented leadership'),
(2, 'Customer-oriented', 'Acting innovatively', 'Delegating');

-- --------------------------------------------------------

--
-- Table structure for table `sp_passedaway`
--

CREATE TABLE `sp_passedaway` (
  `pa_id` int(11) NOT NULL,
  `pa_eid` varchar(11) NOT NULL,
  `pa_status` varchar(100) NOT NULL,
  `pa_date` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sp_retired`
--

CREATE TABLE `sp_retired` (
  `sp_id` int(11) NOT NULL,
  `sp_eid` varchar(11) NOT NULL,
  `sp_status` varchar(100) NOT NULL,
  `sp_rtdate` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sp_retired`
--

INSERT INTO `sp_retired` (`sp_id`, `sp_eid`, `sp_status`, `sp_rtdate`) VALUES
(1, '1001', 'Retired', '2021-12-20');

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
-- Table structure for table `tcourse`
--

CREATE TABLE `tcourse` (
  `tc_id` int(11) NOT NULL,
  `tc_name` varchar(100) NOT NULL,
  `tc_desc` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tcourse`
--

INSERT INTO `tcourse` (`tc_id`, `tc_name`, `tc_desc`) VALUES
(1, 'Training#1', 'Test 1'),
(2, 'Training#2', 'Test 2'),
(3, 'Training#3', 'Test 3');

-- --------------------------------------------------------

--
-- Table structure for table `teval`
--

CREATE TABLE `teval` (
  `te_id` int(11) NOT NULL,
  `te_tname` varchar(100) NOT NULL,
  `te_eid` varchar(100) NOT NULL,
  `te_test1` varchar(100) NOT NULL,
  `te_test2` varchar(100) NOT NULL,
  `te_test3` varchar(100) NOT NULL,
  `te_test4` varchar(100) NOT NULL,
  `te_test5` varchar(100) NOT NULL,
  `te_total` varchar(100) NOT NULL,
  `te_status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teval`
--

INSERT INTO `teval` (`te_id`, `te_tname`, `te_eid`, `te_test1`, `te_test2`, `te_test3`, `te_test4`, `te_test5`, `te_total`, `te_status`) VALUES
(1, 'Training#1', '17', '1', '1', '1', '1', '1', '5', 'Passed'),
(2, 'Training#2', '16', '0', '0', '0', '0', '0', '0', ''),
(4, 'Training#2', '15', '1', '1', '1', '1', '1', '5', '');

-- --------------------------------------------------------

--
-- Table structure for table `tsched`
--

CREATE TABLE `tsched` (
  `ts_id` int(11) NOT NULL,
  `ts_sid` varchar(100) NOT NULL,
  `ts_name` varchar(100) NOT NULL,
  `ts_part` varchar(100) NOT NULL,
  `ts_from` varchar(100) NOT NULL,
  `ts_to` varchar(100) NOT NULL,
  `ts_maxtrain` varchar(100) NOT NULL,
  `ts_status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tsched`
--

INSERT INTO `tsched` (`ts_id`, `ts_sid`, `ts_name`, `ts_part`, `ts_from`, `ts_to`, `ts_maxtrain`, `ts_status`) VALUES
(1, '100000', '', '', '', '', '', 'DISAB'),
(2, '100001', 'Training#1', '16', '2022-01-20', '2022-01-25', '5', 'Active'),
(17, '100002', 'Training#2', '18', '2022-04-05', '2022-04-01', '2', 'Active'),
(16, '100001', 'Training#1', '12', '2022-01-20', '2022-01-25', '5', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `tp_id` int(11) NOT NULL,
  `tp_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`tp_id`, `tp_name`) VALUES
(1, ''),
(2, 'Regular'),
(3, 'Casual');

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
  `employee_id` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `name` varchar(60) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `bdate` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
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

INSERT INTO `users` (`id`, `employee_id`, `position`, `type`, `name`, `mname`, `lname`, `bdate`, `gender`, `address`, `contact`, `email`, `username`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
(10, '', '', '', 'Peter', '', '', '', '', '', '', '', 'Admin', '134096e12368b9bce038ccac61963716c01fa8ee', 1, 'lsu2olid10.jpg', 1, '2022-04-11 12:52:39'),
(12, '', '', '', 'Mae', 'Ann', 'Caunca', '2022-01-01', 'Female', 'Somewhere in Philippines', '09123456789', 'mae@gmail.com', 'User1', '12dea96fec20593566ab75692c9949596833adc9', 2, '3gy5cpqg12.jpg', 0, '2022-04-11 12:21:24'),
(14, '', '', '', 'AnotherAdmin', '', '', '', '', '', '', '', 'AnotherAdmin11', '8451ba8a14d79753d34cb33b51ba46b4b025eb81', 1, 'no_image.jpg', 1, '2022-03-15 00:04:21'),
(15, 'e000001', 'Manager', 'Regular', 'Melbert', '', 'Villasoto', '2000-03-01', 'Male', 'Quezon City', '09987654321', 'berto@gmail.com', 'User2', '12dea96fec20593566ab75692c9949596833adc9', 2, '3gy5cpqg12.jpg', 0, '2022-04-11 12:52:59'),
(16, 'e000002', 'Guard', 'Casual', 'Leni Robredo', '', '', '', '', '', '', '', 'User3', '12dea96fec20593566ab75692c9949596833adc9', 2, '3gy5cpqg12.jpg', 0, '2022-04-11 10:32:05'),
(17, 'e000003', 'Teller', 'Casual', 'Kiko Pangilinan', '', '', '', '', '', '', '', 'User4', '12dea96fec20593566ab75692c9949596833adc9', 2, '3gy5cpqg12.jpg', 0, '2022-03-15 20:49:39'),
(18, 'e000004', 'Teller', 'Regular', 'Manny Paquiao', '', '', '', '', '', '', '', 'User5', '12dea96fec20593566ab75692c9949596833adc9', 2, '3gy5cpqg12.jpg', 0, '2022-03-15 20:49:39');

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
-- Indexes for table `applicantl`
--
ALTER TABLE `applicantl`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `att`
--
ALTER TABLE `att`
  ADD PRIMARY KEY (`att_id`);

--
-- Indexes for table `budgetreleasing`
--
ALTER TABLE `budgetreleasing`
  ADD PRIMARY KEY (`P_ID`),
  ADD KEY `FK_budgetreleasing_s` (`P_Status`),
  ADD KEY `FK_procurmentreleasing` (`P_Code`);

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
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `evalcom`
--
ALTER TABLE `evalcom`
  ADD PRIMARY KEY (`ec_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `jobplan`
--
ALTER TABLE `jobplan`
  ADD PRIMARY KEY (`jp_id`);

--
-- Indexes for table `listcom`
--
ALTER TABLE `listcom`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `lv`
--
ALTER TABLE `lv`
  ADD PRIMARY KEY (`lv_id`);

--
-- Indexes for table `mst_question`
--
ALTER TABLE `mst_question`
  ADD PRIMARY KEY (`que_id`);

--
-- Indexes for table `mst_result`
--
ALTER TABLE `mst_result`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `mst_subject`
--
ALTER TABLE `mst_subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `mst_test`
--
ALTER TABLE `mst_test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `obudget`
--
ALTER TABLE `obudget`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `procurment`
--
ALTER TABLE `procurment`
  ADD PRIMARY KEY (`Co_Code`),
  ADD KEY `FK_procurment` (`Co_Status`);

--
-- Indexes for table `prom`
--
ALTER TABLE `prom`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `promoted`
--
ALTER TABLE `promoted`
  ADD PRIMARY KEY (`pr_id`);

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
-- Indexes for table `resigned`
--
ALTER TABLE `resigned`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `sc`
--
ALTER TABLE `sc`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `sl`
--
ALTER TABLE `sl`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Status_Code`);

--
-- Indexes for table `tcourse`
--
ALTER TABLE `tcourse`
  ADD PRIMARY KEY (`tc_id`);

--
-- Indexes for table `teval`
--
ALTER TABLE `teval`
  ADD PRIMARY KEY (`te_id`);

--
-- Indexes for table `tsched`
--
ALTER TABLE `tsched`
  ADD PRIMARY KEY (`ts_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`tp_id`);

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
-- AUTO_INCREMENT for table `applicantl`
--
ALTER TABLE `applicantl`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `att`
--
ALTER TABLE `att`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `budgetreleasing`
--
ALTER TABLE `budgetreleasing`
  MODIFY `P_ID` int(200) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

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
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `evalcom`
--
ALTER TABLE `evalcom`
  MODIFY `ec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `Id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobplan`
--
ALTER TABLE `jobplan`
  MODIFY `jp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `listcom`
--
ALTER TABLE `listcom`
  MODIFY `lc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lv`
--
ALTER TABLE `lv`
  MODIFY `lv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_question`
--
ALTER TABLE `mst_question`
  MODIFY `que_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mst_subject`
--
ALTER TABLE `mst_subject`
  MODIFY `sub_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mst_test`
--
ALTER TABLE `mst_test`
  MODIFY `test_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `obudget`
--
ALTER TABLE `obudget`
  MODIFY `Id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `procurment`
--
ALTER TABLE `procurment`
  MODIFY `Co_Code` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `prom`
--
ALTER TABLE `prom`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `promoted`
--
ALTER TABLE `promoted`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `resigned`
--
ALTER TABLE `resigned`
  MODIFY `rs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sc`
--
ALTER TABLE `sc`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sl`
--
ALTER TABLE `sl`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `Status_Code` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tcourse`
--
ALTER TABLE `tcourse`
  MODIFY `tc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teval`
--
ALTER TABLE `teval`
  MODIFY `te_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tsched`
--
ALTER TABLE `tsched`
  MODIFY `ts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uexpenses`
--
ALTER TABLE `uexpenses`
  MODIFY `Co_Code` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2022 at 05:10 PM
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
-- Table structure for table `account_verification`
--

CREATE TABLE `account_verification` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `vkey` varchar(300) NOT NULL,
  `verified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_verification`
--

INSERT INTO `account_verification` (`id`, `applicant_id`, `vkey`, `verified`) VALUES
(1, 20220001, '0df4753aac486c620f99db1992cef752', 1),
(2, 20220002, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(8, 20220003, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(10, 20220004, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(11, 20220005, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(12, 20220006, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(13, 20220007, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(14, 20220008, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(15, 20220009, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(16, 20220010, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(17, 20220011, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(18, 20220012, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(19, 20220013, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(20, 20220014, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(21, 20220015, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(22, 20220016, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(23, 20220017, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(24, 20220018, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(25, 20220019, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(26, 20220020, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(27, 20220021, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(28, 20220022, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(29, 20220023, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(30, 20220024, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(31, 20220025, '3bce0f94eae81cab578c4eb1af0865a7', 1),
(32, 20220028, 'fd789c042e70b0dfb3916debc6ac123e', 1),
(33, 20220026, '6cfa02e471127cc311af355718c7c70d27dfe013', 1),
(34, 20220027, '6cfa02e471127cc311af355718c7c70d27dfe013', 1),
(35, 20220029, '6cfa02e471127cc311af355718c7c70d27dfe013', 1),
(36, 20220030, '6cfa02e471127cc311af355718c7c70d27dfe013', 1),
(37, 20220031, '6cfa02e471127cc311af355718c7c70d27dfe013', 1),
(38, 20220032, '6cfa02e471127cc311af355718c7c70d27dfe013', 1),
(39, 20220033, 'aea12b5326e069703c66b7e334770807', 1);

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
  `contact_number` varchar(20) NOT NULL,
  `birth_date` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `civil_status` varchar(25) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_pic` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`applicant_id`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `contact_number`, `birth_date`, `age`, `gender`, `civil_status`, `religion`, `address`, `last_login`, `profile_pic`) VALUES
(20220001, 'darryl', 'opiasa', 'deleon', 'darryl917deleon@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09515901340', '2000-02-07', 21, 'Male', 'Single', 'inc', '103 npc area b talipapa caloocan city', '2022-01-10 12:12:55', ''),
(20220002, 'john paul', 'din', 'barruga', 'barrugajohnpaul7@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '09991760132', '2000-04-16', 21, 'Male', 'Single', 'catholic', '25 mulawinan lawang bato valenzuela city', '2022-01-05 09:39:49', ''),
(20220003, 'Monica', 'Din', 'Barruga', 'barrugamonica04@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09081416374', '2001-09-04', 20, 'Female', 'Single', 'Catholic', '25 Mulawinan Lawang Bato Valenzuela City', '2022-01-05 11:51:05', ''),
(20220004, 'Harold', 'Lazaro', 'Baldoz', 'BaldozHarold12Q@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09205254132', '1997-01-10', 25, 'Male', 'Single', 'Catholic', '36 Malinis Lawang Bato Valenzuela City', '2022-01-05 11:51:09', ''),
(20220005, 'Manuel', 'Boctot', 'Carr', 'manuelcarr@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09093213356', '1998-10-30', 24, 'Male', 'Single', 'catholic', 'Malinta Valenzuela', '2022-01-05 17:05:39', ''),
(20220006, 'miguel', 'luna', 'bucao', 'miguelbucao@gmail.com', 'dd4bee80840a7929dcf0a1670199b26581b9f24b', '09194562814', '1998-02-14', 24, 'Male', 'Single', 'catholic', 'brgy concepcion gulayan Malabon City', '2022-04-13 14:12:49', ''),
(20220007, 'jasper', 'apuyan', 'sarmiento', 'jaspersarmiento@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09197509438', '1999-03-26', 22, 'Male', 'Single', 'catholic', 'commonwealth Quezon City', '2022-01-05 11:51:23', ''),
(20220008, 'jericho', 'aduana', 'tagoctoc', 'jerichotagoctoc@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09093412765', '1999-05-07', 22, 'Male', 'Single', 'catholic', 'vista verde caloocan city', '2022-01-05 11:51:31', ''),
(20220009, 'rico', 'reyes', 'camaddu', 'ricocamaddu@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09081227651', '1998-11-12', 23, 'Male', 'Single', 'catholic', 'shelterville caloocan city', '2022-01-05 11:51:35', ''),
(20220010, 'emely', 'rueras', 'gudmalin', 'emelygudmalin@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09194906321', '1996-03-24', 25, 'Female', 'Single', 'catholic', 'mulawinan lawang bato valenzuela city', '2022-01-05 11:50:49', ''),
(20220011, 'edwin', 'gudmalin', 'rueras', 'edwinrueras@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09124376452', '1996-06-26', 23, 'Male', 'Single', 'catholic', 'Mulawinan lawang bato valenzuela city', '2022-01-05 11:50:43', ''),
(20220012, 'eric', 'ladion', 'cabrillos', 'cabrilloseric65@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09484523704', '1999-09-11', 22, 'Male', 'Single', 'catholic', 'domigpe compound lawang bato valenzuela city', '2022-01-05 11:50:38', ''),
(20220013, 'alvin', 'barruga', 'vidal', 'alvinvidal@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09991327641', '1996-12-11', 25, 'Male', 'Single', 'catholic', 'brgy concepcion gulayan malabon city', '2022-01-05 11:50:32', ''),
(20220014, 'johnpaul', 'ronquillo', 'umanito', 'johnpaulumanito@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09125587612', '1999-07-19', 22, 'Male', 'Single', 'catholic', 'caybiga caloocan city', '2022-01-05 11:50:26', ''),
(20220015, 'nicko', 'tan', 'eduarte', 'nickoeduarte@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09093476117', '1999-10-11', 22, 'Male', 'Single', 'catholic', 'arty concas valenzuela city', '2022-01-05 11:50:22', ''),
(20220016, 'Riza', 'barbin', 'din', 'rizadin@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09998761765', '1995-05-11', 26, 'Female', 'Single', 'catholic', 'makati city', '2022-01-05 11:50:15', ''),
(20220017, 'christian dave', 'de guzman', 'garcia', 'christiandavegarcia@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09091576982', '2000-10-15', 21, 'Male', 'Single', 'catholic', 'phase 4 valenzuela city', '2022-01-05 11:50:11', ''),
(20220018, 'denzel', 'fernandez', 'dela cruz', 'denzeldelacruz@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09194978344', '1999-04-11', 22, 'Male', 'Single', 'catholic', 'bagong silang caloocan city', '2022-01-05 11:50:07', ''),
(20220019, 'regor', 'fernandez', 'catacutan', 'regorcatacutan@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09206532776', '1999-02-22', 22, 'Male', 'Single', 'catholic', 'arty concas valenzuela city', '2022-01-05 11:50:03', ''),
(20220020, 'jinky', 'fernadez', 'de guzman', 'jinkydeguzman@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09091822437', '1998-11-09', 23, 'Female', 'Single', 'catholic', 'bagong silang caloocan city', '2022-01-05 11:49:59', ''),
(20220021, 'aldrich', 'lim', 'ramos', 'aldrichramos@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09993476182', '1997-12-30', 24, 'Male', 'Single', 'catholic', 'maysan valenzuela city', '2022-01-05 11:49:54', ''),
(20220022, 'albert', 'cruz', 'ubana', 'albertubana@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09192375143', '2000-08-11', 21, 'Male', 'Single', 'catholic', 'Bagbaguin caloocan city', '2022-01-05 11:49:48', ''),
(20220023, 'annalyn', 'reyes', 'san jose', 'annalynsanjose@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09993412674', '1999-04-11', 22, 'Female', 'Single', 'catholic', 'bagumbong valenzuela city', '2022-01-05 11:49:42', ''),
(20220024, 'ricardo', 'magcamit', 'dalisay', 'ricardodalisay@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09991438743', '1997-11-01', 24, 'Male', 'Single', 'catholic', 'Tondo manila city', '2022-01-05 11:49:36', ''),
(20220025, 'victorino', 'baylosis', 'magtanggol', 'victorinomagtanggol@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09205613167', '1999-03-19', 22, 'Male', 'Single', 'catholic', 'taguig city', '2022-01-05 11:49:30', ''),
(20220026, 'nicanor', 'maglangit', 'torres', 'nicanortorres@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09091417983', '1998-04-17', 23, 'Male', 'Single', 'catholic', 'catmon malabon city', '2022-01-05 11:49:20', ''),
(20220027, 'angelica', 'garcia', 'tolentino', 'angelicatolentino@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09193254896', '1999-06-20', 22, 'Female', 'Single', 'catholic', 'novaliches quezon city', '2022-01-05 11:49:14', ''),
(20220028, 'richie', 'dacuma', 'carrion', 'richie.c@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09122456771', '1999-01-12', 22, 'Male', 'Single', 'catholic', 'novaliches quezon city', '2022-01-05 11:47:59', ''),
(20220029, 'bryan', 'dy', 'lao', 'bryanlao@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09195684867', '1997-10-01', 24, 'Male', 'Single', 'Catholic', 'Tondo Manila City', '2022-01-05 16:50:50', ''),
(20220030, 'alaric', 'ching', 'yuzon', 'anygma@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09043860493', '1995-03-10', 26, 'Male', 'Single', 'Catholic', 'Pinagbuhatan Pasig City', '2022-01-05 16:53:02', ''),
(20220031, 'benjie', 'toledo', 'cruz', 'benjtol@gmail.com', '72ca3686131a8a7733a912ec154fd42d2b97cdf3', '09424960192', '1993-01-03', 29, 'Male', 'Single', 'Catholic', 'Masinag Antipolo City', '2022-04-08 11:14:52', ''),
(20220032, 'John', 'juts', 'gutierrez', 'kingb@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09472935873', '1998-10-27', 23, 'Male', 'Married', 'Catholic', 'Novaliches Quezon City', '2022-01-05 16:58:41', ''),
(20220033, 'mark', 'desuyo', 'vergara', 'mark.eron18@gmail.com', '07cc36db5072ef3ea21a610dfdaceb78e42fe767', '12345678910', '2000-06-12', 21, 'Male', 'Single', 'hfsfsf', 'valenzuela city', '2022-01-11 05:01:18', '');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `job_title` varchar(200) NOT NULL,
  `date_of_application` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `job_id`, `applicant_id`, `job_title`, `date_of_application`, `status`, `remarks`) VALUES
(20, 110004, 20220028, 'relationship manager', '2021-12-29', 'pending', ''),
(28, 110006, 20220009, 'financial analyst', '2021-12-29', 'pending', ''),
(29, 110004, 20220014, 'relationship manager', '2021-12-28', 'pending', ''),
(35, 110006, 20220018, 'financial analyst', '2021-12-29', 'pending', ''),
(37, 110005, 20220029, 'financial analyst', '2021-11-10', 'pending', ''),
(40, 110005, 20220032, 'financial advisor', '2021-12-12', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `appreciation_awards`
--

CREATE TABLE `appreciation_awards` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `award_title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appreciation_awards`
--

INSERT INTO `appreciation_awards` (`id`, `employee_id`, `award_title`, `date`, `status`) VALUES
(1, 30330030, 'Employee of the Month', '2022-04-12', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `available_job`
--

CREATE TABLE `available_job` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `job_title` varchar(250) NOT NULL,
  `job_description` varchar(500) NOT NULL,
  `job_qualification` varchar(500) NOT NULL,
  `no_of_vacancy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `id` int(11) NOT NULL,
  `applicant_id` int(100) NOT NULL,
  `name_of_school` varchar(250) NOT NULL,
  `course` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`id`, `applicant_id`, `name_of_school`, `course`) VALUES
(9, 20220001, 'asd', 'asd'),
(12, 20220003, 'Beslink College of Philippines', 'Business Administration  Major in Marketing'),
(13, 20220028, 'quezon city university', 'Information technology'),
(14, 20220002, 'beslink college of the philippines', 'information technology'),
(15, 20220004, 'valenzuela polytecnic college', 'computer engineering'),
(16, 20220005, 'pamantasan lungsod ng valenzuela college', 'elementary education major in english '),
(17, 20220006, 'city of malabon university', 'business administration major in marketing'),
(18, 20220007, 'beslink college of philippines', 'information technology'),
(19, 20220008, 'university of caloocan city', 'information technology'),
(20, 20220009, 'university of caloocan city', 'accounting'),
(21, 20220010, 'sti antique', 'computer science'),
(22, 20220011, 'sti caloocan', 'information technology'),
(23, 20220012, 'beslink college of the philippines', 'information technology'),
(24, 20220013, 'city of malabon university', 'accounting'),
(25, 20220014, 'beslink college of philippines', 'information technology'),
(26, 20220015, 'our lady of fatima college', 'computer science'),
(27, 20220016, 'sorsogon state college', 'elementary education major in mathematics'),
(28, 20220017, 'our lady lourdes college', 'information technology'),
(29, 20220018, 'beslink college of the philippines', 'information technology'),
(30, 20220019, 'our lady of lourdes college', 'business administration major in marketing'),
(31, 20220020, 'university of caloocan city', 'accounting'),
(32, 20220021, 'pamantasan lungsod ng valenzuela college', 'elementary education major in mathematics'),
(33, 20220022, 'beslink college of  the philippines', 'information technology'),
(34, 20220023, 'beslink college of the philippines', 'information technology'),
(35, 20220024, 'university of valenzuela', 'business administration major in marketing'),
(36, 20220025, 'taguig city university', 'entrepreneural management'),
(37, 20220026, 'city of malabon university', 'business administration major in marketing'),
(38, 20220027, 'sti caloocan', 'information technology'),
(39, 20220033, 'fgfdgd', 'dfergr');

-- --------------------------------------------------------

--
-- Table structure for table `contract_signing`
--

CREATE TABLE `contract_signing` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deployed_employees`
--

CREATE TABLE `deployed_employees` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `deployment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deployment`
--

CREATE TABLE `deployment` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `department` varchar(100) NOT NULL,
  `location` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `education_background`
--

CREATE TABLE `education_background` (
  `id` int(11) NOT NULL,
  `elementary` varchar(500) NOT NULL,
  `junior_high_school` varchar(500) NOT NULL,
  `senior_high_school` varchar(100) NOT NULL,
  `applicant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education_background`
--

INSERT INTO `education_background` (`id`, `elementary`, `junior_high_school`, `senior_high_school`, `applicant_id`) VALUES
(9, 'talipapa elementary school', 'talipapa high school', 'bestlink college of the philippines', 20220001),
(12, 'Lawang Bato Elementary School', 'Lawang Bato National High  School', 'Lawang Bato National High  School', 20220003),
(13, 'novaliches elementary school', 'novaliches high school', 'novaliches high school', 20220028),
(14, 'lawang bato elementary school', 'lawang bato national high school', 'st gregory college of philippines', 20220002),
(15, 'lawang bato elementary school', 'lawang bato national high school', 'bignay highschool', 20220004),
(16, 'malinta elementary school', 'malinta high school', 'malinta highschool', 20220005),
(17, 'burgos elementary school', 'burgos high school', 'burgos highschool', 20220006),
(18, ' commonwealth elementary school', 'commonwealth high school', 'beslink college of philippines', 20220007),
(19, 'lawang bato elementary school', 'lawang bato national high school', 'st gregory college of philippines', 20220008),
(20, 'shelterville elementary school', 'shelverville highschool', 'shelterville highschool', 20220009),
(21, 'lawang bato elementary school', 'lawang bato highschool', ',lawang bato highschool', 20220010),
(22, 'lawang bato elementary school', 'lawang bato high school', 'lawang bato national highschool', 20220011),
(23, 'lawang bato elementary school', 'lawang bato high school', 'meycauayan college', 20220012),
(24, 'burgos elementary school', 'burgos high school', 'jose rizal highschool', 20220013),
(25, 'caybiga elementary school', 'caybiga high school', 'caybiga highschool', 20220014),
(26, 'lawang bato elementary school', 'lawang bato high school', 'fatima college', 20220015),
(27, 'bacon sorsogon elementary school', 'bacon high school', 'university of makati', 20220016),
(28, 'lawang bato elementary school', 'lawang bato high school', 'punturin national high school', 20220017),
(29, 'bagong silang  elementary school', 'bagong silang  high school', 'bagong silang high school', 20220018),
(30, 'lawang bato elementary school', 'lawang bato national high school', 'st gregory college of philippines', 20220019),
(31, 'bagong silang elementary school', 'bagong silang high school', 'bagong silang high school', 20220020),
(32, 'maysan elementary school', 'maysan high school', 'pamantasan lungsod ng valenzuela collega', 20220021),
(34, 'bagbaguin elementary school', 'babaguin national high school', 'university of caloocan city', 20220022),
(35, 'bagumbong elementary school', 'bagumbong national high school', 'st gregory college of valenzuela', 20220023),
(36, 'tondo elementary school', 'tondo high school', 'st. theresas college', 20220024),
(37, 'gat andres  elementary school', 'tipas high school', 'upper bicutan national high school ', 20220025),
(38, 'catmon elementary school', 'catmon high school', 'arellano senior high', 20220026),
(39, 'novaliches elementary school', 'novaliches high school', 'university of caloocan city', 20220027),
(40, 'tondo elementary school', 'novaliches high school', 'st. theresas college', 20220029),
(41, 'ateneo de manila university', 'ateneo de manila university', 'ateneo de manila university', 20220030),
(42, 'ateneo de manila university', 'ateneo de manila university', 'ateneo de manila university', 20220032),
(43, 'ateneo de manila university', 'ateneo de manila university', 'ateneo de manila university', 20220031),
(44, 'adfds', 'cdcd', 'cdcd', 20220033);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(500) NOT NULL,
  `middle_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `civil_status` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `date_hired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `first_name`, `middle_name`, `last_name`, `email`, `birth_date`, `age`, `gender`, `civil_status`, `religion`, `contact_number`, `address`, `designation`, `department`, `date_hired`) VALUES
(30330028, 'aldrich', 'lim', 'ramos', 'aldrichramos@gmail.com', '1997-12-30', 24, 'Male', 'Single', 'catholic', 2147483647, 'maysan valenzuela city', 'financial analyst', 'IT Department', '2022-03-20'),
(30330029, 'miguel', 'luna', 'bucao', 'miguelbucao@gmail.com', '1998-02-14', 24, 'Male', 'Single', 'catholic', 2147483647, 'brgy concepcion gulayan Malabon City', 'credit analyst', '', '2022-03-22'),
(30330030, 'alvin', 'barruga', 'vidal', 'alvinvidal@gmail.com', '1996-12-11', 25, 'Male', 'Single', 'catholic', 2147483647, 'brgy concepcion gulayan malabon city', 'financial advisor', 'IT dept', '2022-04-02'),
(30330035, 'benjie', 'toledo', 'cruz', 'benjtol@gmail.com', '1993-01-03', 29, 'Male', 'Single', 'Catholic', 2147483647, 'Masinag Antipolo City', 'Recruitment', 'HR1', '2022-04-08'),
(30330036, 'miguel', 'luna', 'bucao', 'miguelbucao@gmail.com', '1998-02-14', 24, 'Male', 'Single', 'catholic', 2147483647, 'brgy concepcion gulayan Malabon City', 'relationship manager', 'IT dept', '2022-04-13');

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

--
-- Dumping data for table `employee_documents`
--

INSERT INTO `employee_documents` (`id`, `applicant_id`, `employee_id`, `resume`, `sss`, `philhealth`, `pag_ibig`, `nbi`, `other_id`) VALUES
(20, 20220031, 30330035, '6250105e54ec18.32582930.jpg', '6250105e54eb54.54682135.jpg', '6250105e54ec59.31719909.jpg', '6250105e54ec83.78353571.jpg', '6250105e54ecb8.34288783.jpg', '6250105e54ece8.79837393.jpg'),
(22, 20220006, 30330029, '62568c0a8eaac6.63024845.jpg', '62568c0a8eaa01.30305718.jpg', '62568c0a8eaaf4.47905724.jpg', '62568c0a8eab36.29547143.jpg', '62568c0a8eab77.73377535.jpg', '62568c0a8eaba8.46053183.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `emp_contract_req`
--

CREATE TABLE `emp_contract_req` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
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
-- Table structure for table `final_interview`
--

CREATE TABLE `final_interview` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(500) NOT NULL,
  `final_average` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final_interview`
--

INSERT INTO `final_interview` (`id`, `applicant_id`, `date`, `time`, `location`, `final_average`) VALUES
(37, 20220021, '2022-03-02', '22:29:00', 'zzx', 90),
(39, 20220013, '2022-03-24', '19:55:00', 'd', 90);

-- --------------------------------------------------------

--
-- Table structure for table `initial_interview`
--

CREATE TABLE `initial_interview` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(500) NOT NULL,
  `initial_average` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `initial_interview`
--

INSERT INTO `initial_interview` (`id`, `applicant_id`, `date`, `time`, `location`, `initial_average`) VALUES
(60, 20220021, '2022-03-02', '15:34:00', 's', 90),
(62, 20220013, '2022-03-24', '19:52:00', 'sasda', 90);

-- --------------------------------------------------------

--
-- Table structure for table `job_history`
--

CREATE TABLE `job_history` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `company` varchar(500) NOT NULL,
  `position` varchar(500) NOT NULL,
  `date_started` date NOT NULL,
  `date_ended` date NOT NULL,
  `years_of_service` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_vacancy`
--

CREATE TABLE `job_vacancy` (
  `job_id` int(10) NOT NULL,
  `job_title` varchar(250) NOT NULL,
  `no_of_vacancy` int(10) NOT NULL,
  `job_description` varchar(1000) NOT NULL,
  `job_qualification` varchar(1000) NOT NULL,
  `department` varchar(100) NOT NULL,
  `salary` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_vacancy`
--

INSERT INTO `job_vacancy` (`job_id`, `job_title`, `no_of_vacancy`, `job_description`, `job_qualification`, `department`, `salary`) VALUES
(110001, 'HR staff', 4, ' A bank teller works in a bank and is responsible for helping members cash checks, withdraw money, move transactions to different accounts, create checking and savings accounts, and provide checks to customers. Bank tellers should have ethical standards and practice confidentiality to uphold member account information. They should also have good problem-solving skills and be able to communicate verbally. Typically, bank teller candidates need at least a high school diploma or GED to qualify for a position.', 'Bachelor\'s degree in a relevant field may be preferred.\r\nCash handling experience and on-the-job training may be required.\r\nAbility to pass a background check.\r\nExceptional time management, communication, and customer service skills.', 'HR1', 30000),
(110002, 'Bank Teller', 2, ' A banker works at a bank or financial institution. They are responsible for meeting with bank members (both individuals or companies) and helping them acquire loans through the bank. By doing this, they aim to help the bank earn money by applying fees and interest rates to those loans. Bankers can also meet with clients for a paid consultation to advise them on financial matters such as investments and capital resources.', 'Candidates must have passed class 12th in commerce stream from a recognised board. Must have a bachelor\'s degree in B.com/ B.A. (Economics) degree from a recognised university. Candidates must have an MBA degree in investment banking to become an investment banker.', 'IT dept', 30000),
(110003, 'credit analyst', 3, 'A credit analyst can work for an investment bank, an investment firm, credit card companies and any other institution where lending money is involved. They are responsible for reviewing an applicant\'s financial history and credit score. The main difference between a credit analyst and other professions like a loan processor is that they can only provide a recommendation as to whether or not an applicant should be approved. Credit analysts usually have a Bachelor\'s Degree in Finance or Economics and extensive knowledge of statistics, financial statements and ratio analysis.', 'Accounting skills.\r\nKnowledge of industry.\r\nComputing skills.\r\nCommunication skills.\r\nProblem-solving.\r\nAttention to detail.\r\nDocumentation and organization skills.\r\nKnowledge in risk analysis.', 'IT dept', 30000),
(110004, 'relationship manager', 4, ' A relationship manager works for a bank or financial institution and acts as the point of communication between members and the institution itself. Their main job duty includes maintaining customer loyalty by checking in with them by email or phone. They are also responsible for fostering relationships with new customers by helping them gain bank membership and create a checking or savings accountant. Relationship managers should have a bachelor\'s degree in communications, finance or business administration and should be excellent communicators.', 'Bachelor in business administration, marketing or a related field.\r\nThree or more years\' experience in customer service, sales or a related position.\r\nExcellent verbal and written communication skills.\r\nAbility to lead and work within a team.', 'IT dept', 30000),
(110005, 'financial advisor', 5, ' A financial advisor works as part of a financial institution to help clients determine their financial goals and the best means to achieve them. This entails trading for them in the stock markets, reviewing their financial history and providing them with advice for the best decisions they can make for their finances. Financial advisor candidates need to have at least a bachelor\'s degree in an area like economics, statistics, finance or business. They should also have a few years of experience in a finance-related role, like an investment specialist/banker or credit analyst.', '\r\nknowledge of economics and accounting for understanding financial markets and products. maths knowledge for creating financial plans. the ability to sell products and services. excellent verbal communication skills.', 'IT dept', 30000),
(110006, 'financial analyst', 5, 'A financial analyst is responsible for monitoring market trends across industries and using their expertise to guide businesses and clients on when, where and how to invest. Financial analysts typically work for major corporations, financial institutions, insurance companies and banks. To become a financial analyst, you should have at least a bachelor\'s degree in economics, finance or accounting. For senior positions, most employers prefer that you have a master\'s degree in a specialty area like statistics.', 'bachelor\'s degree specifically in a field related to finance, including finance and accounting, economics, statistics, analytics, business management, or mathematics.', 'IT dept', 30000),
(110007, 'internal auditor', 2, ' Internal auditors for banks have a responsibility to complete routine assessments of the bank\'s internal procedures, loan and spending habits, employment expenses and other risk management factors. Their main goal is to determine whether the bank complies with laws and regulations and if they are financially stable. Internal auditor candidates should have at least a bachelor\'s degree in management, accounting, business administration or finance. A master\'s degree may be preferred for more senior roles.', 'An entry-level internal auditor position generally requires at least a bachelor\'s degree, preferably in a business discipline such as accounting, finance, management, public administration or computer information systems. Some companies may seek out entry-level job candidates with degrees in engineering or other technical subjects related to the company\'s operations.\r\n\r\nSenior positions in the field typically require bachelor\'s degrees and substantial professional experience in internal auditing. While a graduate degree is not usually required for advancement in the field, a Master\'s in Business Administration (MBA) or another relevant subject can provide an important advantage in the job market, especially for leadership positions in internal audit departments.', 'IT dept', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `learning_management`
--

CREATE TABLE `learning_management` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `seminar_title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `learning_management`
--

INSERT INTO `learning_management` (`id`, `employee_id`, `seminar_title`, `date`, `status`) VALUES
(7, 30330028, 'First Aid', '2022-03-19', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `new_hires`
--

CREATE TABLE `new_hires` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_hires`
--

INSERT INTO `new_hires` (`id`, `employee_id`, `status`) VALUES
(42, 30330029, 'ongoing orientation'),
(45, 30330029, 'ongoing orientation');

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
-- Table structure for table `orientation`
--

CREATE TABLE `orientation` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `passed_applicant`
--

CREATE TABLE `passed_applicant` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passed_applicant`
--

INSERT INTO `passed_applicant` (`id`, `applicant_id`) VALUES
(27, 20220013),
(24, 20220021),
(25, 20220021);

-- --------------------------------------------------------

--
-- Table structure for table `performance_review`
--

CREATE TABLE `performance_review` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `rel_with_colleagues` int(11) NOT NULL,
  `problem_solving` int(11) NOT NULL,
  `decision_making` int(11) NOT NULL,
  `punctuality` int(11) NOT NULL,
  `attitude` int(11) NOT NULL,
  `leadership` int(11) NOT NULL,
  `communication` int(11) NOT NULL,
  `accuracy` int(11) NOT NULL,
  `work_ethics` int(11) NOT NULL,
  `productivity` int(11) NOT NULL,
  `time_management` int(11) NOT NULL,
  `collaboration_and_teamwork` int(11) NOT NULL,
  `average` float NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performance_review`
--

INSERT INTO `performance_review` (`id`, `employee_id`, `date`, `rel_with_colleagues`, `problem_solving`, `decision_making`, `punctuality`, `attitude`, `leadership`, `communication`, `accuracy`, `work_ethics`, `productivity`, `time_management`, `collaboration_and_teamwork`, `average`, `status`) VALUES
(18, 30330030, '2022-04-09', 91, 87, 98, 95, 93, 90, 89, 83, 88, 83, 97, 96, 90.8333, 'approved'),
(19, 30330028, '2022-04-12', 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `posted_jobs`
--

CREATE TABLE `posted_jobs` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `no_of_vacancy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posted_jobs`
--

INSERT INTO `posted_jobs` (`id`, `job_id`, `status`, `no_of_vacancy`) VALUES
(25, 110004, 'posted', 4),
(26, 110005, 'posted', 5),
(27, 110006, 'posted', 5),
(29, 110007, 'posted', 2),
(34, 110002, 'request for approval', 2),
(35, 110003, 'posted', 3);

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
-- Table structure for table `qualified_applicants`
--

CREATE TABLE `qualified_applicants` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualified_applicants`
--

INSERT INTO `qualified_applicants` (`id`, `applicant_id`) VALUES
(47, 20220013),
(44, 20220021);

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
-- Table structure for table `social_recognition`
--

CREATE TABLE `social_recognition` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `award` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_recognition`
--

INSERT INTO `social_recognition` (`id`, `employee_id`, `date`, `award`, `status`) VALUES
(19, 30330028, '2022-03-19', 'First Aid', 'approved'),
(20, 30330028, '2022-03-23', 'Leadership', 'approved'),
(24, 30330030, '2022-04-12', 'Employee of the Month', 'approved');

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
-- Table structure for table `time_and_attendance`
--

CREATE TABLE `time_and_attendance` (
  `time_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `user_level` int(11) NOT NULL,
  `calculated_work` int(11) NOT NULL,
  `working` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_and_attendance`
--

INSERT INTO `time_and_attendance` (`time_id`, `user_id`, `login_time`, `logout_time`, `username`, `name`, `user_level`, `calculated_work`, `working`) VALUES
(1, 8, '2021-12-19 12:08:21', '2021-12-19 15:08:21', 'darryl', 'darryl', 4, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `department` varchar(100) NOT NULL,
  `location` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `training_management`
--

CREATE TABLE `training_management` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `training_title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training_management`
--

INSERT INTO `training_management` (`id`, `employee_id`, `training_title`, `date`, `status`) VALUES
(8, 30330028, 'Leadership', '2022-03-23', 'complete');

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
  `position` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `position`, `department`, `status`, `last_login`) VALUES
(15, 'John Paul Barruga', 'HR1_recruitment', '4cb85808db938aba79a98a46f2fdfd16dc075319', 2, NULL, 'Recruitment', '', 1, '2022-04-13 17:26:04'),
(16, 'eric cabrillos', 'HR1_applicantmanagement', '9b0713efca11ecb76c29cb3d0ac5b1f5525de815', 2, NULL, 'Applicant Management', '', 1, '2022-04-13 17:25:42'),
(17, 'darryl deleon', 'HR1_newhired_onboard', '578a88c68edae58909dce352f1fdb63545eba399', 2, NULL, 'New Hire Onboard', '', 1, '2022-04-13 21:53:57'),
(18, 'darrel palconit', 'HR1_performance_management', '475a5473e9d9149eebdba70f8bb90793385c63f8', 2, '', 'Performance Management', 'HR1', 1, '2022-04-12 22:12:08'),
(19, 'mark eron vergara', 'HR1_social_recognition', '747d431243bba7bd800d63f4e242ace97bc00a07', 2, '', 'Social Recognition', 'HR1', 1, '2022-04-13 13:06:50'),
(21, 'Manager', 'HR1_manager', '861e497cf9e085e40a8e6019227622325d2b1dbd', 1, '', 'HR1 Manager', 'HR1', 1, '2022-04-13 21:57:21'),
(22, 'benjie', 'benjie_Recruitment', 'da28e4f46f84bfe2af6063633cec5381c2e59b36', 2, 'no_image.jpg', 'Recruitment', 'HR1', 1, '2022-04-13 22:05:11');

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
-- Indexes for table `account_verification`
--
ALTER TABLE `account_verification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`applicant_id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_applications` (`applicant_id`),
  ADD KEY `FK_jobORDER` (`job_id`);

--
-- Indexes for table `appreciation_awards`
--
ALTER TABLE `appreciation_awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `available_job`
--
ALTER TABLE `available_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_job_id` (`job_id`);

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
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`id`),
  ADD KEY `KF_college` (`applicant_id`);

--
-- Indexes for table `contract_signing`
--
ALTER TABLE `contract_signing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_employees` (`employee_id`);

--
-- Indexes for table `deployed_employees`
--
ALTER TABLE `deployed_employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_emp` (`employee_id`);

--
-- Indexes for table `deployment`
--
ALTER TABLE `deployment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_deploy` (`employee_id`);

--
-- Indexes for table `education_background`
--
ALTER TABLE `education_background`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_educ` (`applicant_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_documents`
--
ALTER TABLE `employee_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_docu` (`applicant_id`);

--
-- Indexes for table `emp_contract_req`
--
ALTER TABLE `emp_contract_req`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_empcon` (`employee_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `final_interview`
--
ALTER TABLE `final_interview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_applicant_id` (`applicant_id`);

--
-- Indexes for table `initial_interview`
--
ALTER TABLE `initial_interview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_applicant` (`applicant_id`);

--
-- Indexes for table `job_history`
--
ALTER TABLE `job_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_job_history` (`applicant_id`);

--
-- Indexes for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `learning_management`
--
ALTER TABLE `learning_management`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_laerning` (`employee_id`);

--
-- Indexes for table `new_hires`
--
ALTER TABLE `new_hires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_employee` (`employee_id`);

--
-- Indexes for table `obudget`
--
ALTER TABLE `obudget`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `orientation`
--
ALTER TABLE `orientation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_employeeid` (`employee_id`);

--
-- Indexes for table `passed_applicant`
--
ALTER TABLE `passed_applicant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant` (`applicant_id`);

--
-- Indexes for table `performance_review`
--
ALTER TABLE `performance_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_performance` (`employee_id`);

--
-- Indexes for table `posted_jobs`
--
ALTER TABLE `posted_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_jobID` (`job_id`);

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
-- Indexes for table `qualified_applicants`
--
ALTER TABLE `qualified_applicants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qualified_applicants_ibfk_1` (`applicant_id`);

--
-- Indexes for table `reimbursment`
--
ALTER TABLE `reimbursment`
  ADD PRIMARY KEY (`Co_Code`);

--
-- Indexes for table `social_recognition`
--
ALTER TABLE `social_recognition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_award` (`employee_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Status_Code`);

--
-- Indexes for table `time_and_attendance`
--
ALTER TABLE `time_and_attendance`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_emp_training` (`employee_id`);

--
-- Indexes for table `training_management`
--
ALTER TABLE `training_management`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_training` (`employee_id`);

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
-- AUTO_INCREMENT for table `account_verification`
--
ALTER TABLE `account_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20220034;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `appreciation_awards`
--
ALTER TABLE `appreciation_awards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `available_job`
--
ALTER TABLE `available_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `contract_signing`
--
ALTER TABLE `contract_signing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `deployed_employees`
--
ALTER TABLE `deployed_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deployment`
--
ALTER TABLE `deployment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `education_background`
--
ALTER TABLE `education_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30330037;

--
-- AUTO_INCREMENT for table `employee_documents`
--
ALTER TABLE `employee_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `emp_contract_req`
--
ALTER TABLE `emp_contract_req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `Id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `final_interview`
--
ALTER TABLE `final_interview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `initial_interview`
--
ALTER TABLE `initial_interview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `job_history`
--
ALTER TABLE `job_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  MODIFY `job_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110008;

--
-- AUTO_INCREMENT for table `learning_management`
--
ALTER TABLE `learning_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `new_hires`
--
ALTER TABLE `new_hires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `obudget`
--
ALTER TABLE `obudget`
  MODIFY `Id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orientation`
--
ALTER TABLE `orientation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `passed_applicant`
--
ALTER TABLE `passed_applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `performance_review`
--
ALTER TABLE `performance_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `posted_jobs`
--
ALTER TABLE `posted_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
-- AUTO_INCREMENT for table `qualified_applicants`
--
ALTER TABLE `qualified_applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `reimbursment`
--
ALTER TABLE `reimbursment`
  MODIFY `Co_Code` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT for table `social_recognition`
--
ALTER TABLE `social_recognition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `Status_Code` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `time_and_attendance`
--
ALTER TABLE `time_and_attendance`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `training_management`
--
ALTER TABLE `training_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `uexpenses`
--
ALTER TABLE `uexpenses`
  MODIFY `Co_Code` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_verification`
--
ALTER TABLE `account_verification`
  ADD CONSTRAINT `account_verification_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `FK_applications` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_jobORDER` FOREIGN KEY (`job_id`) REFERENCES `posted_jobs` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `available_job`
--
ALTER TABLE `available_job`
  ADD CONSTRAINT `FK_job_id` FOREIGN KEY (`job_id`) REFERENCES `job_vacancy` (`job_id`);

--
-- Constraints for table `budgetreleasing`
--
ALTER TABLE `budgetreleasing`
  ADD CONSTRAINT `FK_budgetreleasing_s` FOREIGN KEY (`P_Status`) REFERENCES `status` (`Status_Code`);

--
-- Constraints for table `college`
--
ALTER TABLE `college`
  ADD CONSTRAINT `KF_college` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contract_signing`
--
ALTER TABLE `contract_signing`
  ADD CONSTRAINT `FK_employees` FOREIGN KEY (`employee_id`) REFERENCES `new_hires` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deployed_employees`
--
ALTER TABLE `deployed_employees`
  ADD CONSTRAINT `FK_emp` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deployment`
--
ALTER TABLE `deployment`
  ADD CONSTRAINT `FK_deploy` FOREIGN KEY (`employee_id`) REFERENCES `new_hires` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `education_background`
--
ALTER TABLE `education_background`
  ADD CONSTRAINT `FK_educ` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_documents`
--
ALTER TABLE `employee_documents`
  ADD CONSTRAINT `FK_docu` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `emp_contract_req`
--
ALTER TABLE `emp_contract_req`
  ADD CONSTRAINT `FK_empcon` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `final_interview`
--
ALTER TABLE `final_interview`
  ADD CONSTRAINT `FK_applicant_id` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `initial_interview`
--
ALTER TABLE `initial_interview`
  ADD CONSTRAINT `FK_applicant` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_history`
--
ALTER TABLE `job_history`
  ADD CONSTRAINT `FK_job_history` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `learning_management`
--
ALTER TABLE `learning_management`
  ADD CONSTRAINT `FK_laerning` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `new_hires`
--
ALTER TABLE `new_hires`
  ADD CONSTRAINT `FK_employee` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE;

--
-- Constraints for table `orientation`
--
ALTER TABLE `orientation`
  ADD CONSTRAINT `FK_employeeid` FOREIGN KEY (`employee_id`) REFERENCES `new_hires` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `passed_applicant`
--
ALTER TABLE `passed_applicant`
  ADD CONSTRAINT `applicant` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `performance_review`
--
ALTER TABLE `performance_review`
  ADD CONSTRAINT `FK_performance` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posted_jobs`
--
ALTER TABLE `posted_jobs`
  ADD CONSTRAINT `FK_jobID` FOREIGN KEY (`job_id`) REFERENCES `job_vacancy` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `qualified_applicants`
--
ALTER TABLE `qualified_applicants`
  ADD CONSTRAINT `qualified_applicants_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `social_recognition`
--
ALTER TABLE `social_recognition`
  ADD CONSTRAINT `FK_award` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `FK_emp_training` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `training_management`
--
ALTER TABLE `training_management`
  ADD CONSTRAINT `FK_training` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uexpenses`
--
ALTER TABLE `uexpenses`
  ADD CONSTRAINT `FK_uexpenses` FOREIGN KEY (`Co_Status`) REFERENCES `status` (`Status_Code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 06:34 AM
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
-- Table structure for table `account_list`
--

CREATE TABLE `account_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `definedStat` int(200) NOT NULL,
  `Amount` int(200) NOT NULL,
  `Co_Code` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(39, 20220033, 'aea12b5326e069703c66b7e334770807', 1),
(42, 20220036, '5dacdf4072c7ae9dd918902d5ea75878', 1),
(43, 20220037, 'e10ddd4970c6b1c008bd5de2afd3998f', 1);

-- --------------------------------------------------------

--
-- Table structure for table `am`
--

CREATE TABLE `am` (
  `item_number` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Unit_price` int(11) DEFAULT NULL,
  `Total_stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `am`
--

INSERT INTO `am` (`item_number`, `product_id`, `item_name`, `status`, `Quantity`, `Unit_price`, `Total_stock`) VALUES
(1234, 1, 'asd', 'asd', 123, 123, 123);

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
(20220001, 'darryl', 'opiasa', 'deleon', 'darryl917deleon@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09515901340', '2000-02-07', 21, 'Male', 'Single', 'inc', '103 npc area b talipapa caloocan city', '2022-01-10 04:12:55', ''),
(20220002, 'john paul', 'din', 'barruga', 'barrugajohnpaul7@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '09991760132', '2000-04-16', 21, 'Male', 'Single', 'catholic', '25 mulawinan lawang bato valenzuela city', '2022-01-05 01:39:49', ''),
(20220003, 'Monica', 'Din', 'Barruga', 'barrugamonica04@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09081416374', '2001-09-04', 20, 'Female', 'Single', 'Catholic', '25 Mulawinan Lawang Bato Valenzuela City', '2022-01-05 03:51:05', ''),
(20220004, 'Harold', 'Lazaro', 'Baldoz', 'BaldozHarold12Q@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09205254132', '1997-01-10', 25, 'Male', 'Single', 'Catholic', '36 Malinis Lawang Bato Valenzuela City', '2022-01-05 03:51:09', ''),
(20220005, 'Manuel', 'Boctot', 'Carr', 'manuelcarr@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09093213356', '1998-10-30', 24, 'Male', 'Single', 'catholic', 'Malinta Valenzuela', '2022-01-05 09:05:39', ''),
(20220006, 'miguel', 'luna', 'bucao', 'miguelbucao@gmail.com', 'dd4bee80840a7929dcf0a1670199b26581b9f24b', '09194562814', '1998-02-14', 24, 'Male', 'Single', 'catholic', 'brgy concepcion gulayan Malabon City', '2022-04-30 05:57:42', ''),
(20220007, 'jasper', 'apuyan', 'sarmiento', 'jaspersarmiento@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09197509438', '1999-03-26', 22, 'Male', 'Single', 'catholic', 'commonwealth Quezon City', '2022-01-05 03:51:23', ''),
(20220008, 'jericho', 'aduana', 'tagoctoc', 'jerichotagoctoc@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09093412765', '1999-05-07', 22, 'Male', 'Single', 'catholic', 'vista verde caloocan city', '2022-01-05 03:51:31', ''),
(20220009, 'rico', 'reyes', 'camaddu', 'ricocamaddu@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09081227651', '1998-11-12', 23, 'Male', 'Single', 'catholic', 'shelterville caloocan city', '2022-01-05 03:51:35', ''),
(20220010, 'emely', 'rueras', 'gudmalin', 'emelygudmalin@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09194906321', '1996-03-24', 25, 'Female', 'Single', 'catholic', 'mulawinan lawang bato valenzuela city', '2022-01-05 03:50:49', ''),
(20220011, 'edwin', 'gudmalin', 'rueras', 'edwinrueras@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09124376452', '1996-06-26', 23, 'Male', 'Single', 'catholic', 'Mulawinan lawang bato valenzuela city', '2022-01-05 03:50:43', ''),
(20220012, 'eric', 'ladion', 'cabrillos', 'cabrilloseric65@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09484523704', '1999-09-11', 22, 'Male', 'Single', 'catholic', 'domigpe compound lawang bato valenzuela city', '2022-01-05 03:50:38', ''),
(20220013, 'alvin', 'barruga', 'vidal', 'alvinvidal@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09991327641', '1996-12-11', 25, 'Male', 'Single', 'catholic', 'brgy concepcion gulayan malabon city', '2022-01-05 03:50:32', ''),
(20220014, 'johnpaul', 'ronquillo', 'umanito', 'johnpaulumanito@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09125587612', '1999-07-19', 22, 'Male', 'Single', 'catholic', 'caybiga caloocan city', '2022-01-05 03:50:26', ''),
(20220015, 'nicko', 'tan', 'eduarte', 'nickoeduarte@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09093476117', '1999-10-11', 22, 'Male', 'Single', 'catholic', 'arty concas valenzuela city', '2022-01-05 03:50:22', ''),
(20220016, 'Riza', 'barbin', 'din', 'rizadin@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09998761765', '1995-05-11', 26, 'Female', 'Single', 'catholic', 'makati city', '2022-01-05 03:50:15', ''),
(20220017, 'christian dave', 'de guzman', 'garcia', 'christiandavegarcia@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09091576982', '2000-10-15', 21, 'Male', 'Single', 'catholic', 'phase 4 valenzuela city', '2022-01-05 03:50:11', ''),
(20220018, 'denzel', 'fernandez', 'dela cruz', 'denzeldelacruz@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09194978344', '1999-04-11', 22, 'Male', 'Single', 'catholic', 'bagong silang caloocan city', '2022-01-05 03:50:07', ''),
(20220019, 'regor', 'fernandez', 'catacutan', 'regorcatacutan@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09206532776', '1999-02-22', 22, 'Male', 'Single', 'catholic', 'arty concas valenzuela city', '2022-01-05 03:50:03', ''),
(20220020, 'jinky', 'fernadez', 'de guzman', 'jinkydeguzman@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09091822437', '1998-11-09', 23, 'Female', 'Single', 'catholic', 'bagong silang caloocan city', '2022-01-05 03:49:59', ''),
(20220021, 'aldrich', 'lim', 'ramos', 'aldrichramos@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09993476182', '1997-12-30', 24, 'Male', 'Single', 'catholic', 'maysan valenzuela city', '2022-01-05 03:49:54', ''),
(20220022, 'albert', 'cruz', 'ubana', 'albertubana@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09192375143', '2000-08-11', 21, 'Male', 'Single', 'catholic', 'Bagbaguin caloocan city', '2022-01-05 03:49:48', ''),
(20220023, 'annalyn', 'reyes', 'san jose', 'annalynsanjose@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09993412674', '1999-04-11', 22, 'Female', 'Single', 'catholic', 'bagumbong valenzuela city', '2022-01-05 03:49:42', ''),
(20220024, 'ricardo', 'magcamit', 'dalisay', 'ricardodalisay@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09991438743', '1997-11-01', 24, 'Male', 'Single', 'catholic', 'Tondo manila city', '2022-01-05 03:49:36', ''),
(20220025, 'victorino', 'baylosis', 'magtanggol', 'victorinomagtanggol@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09205613167', '1999-03-19', 22, 'Male', 'Single', 'catholic', 'taguig city', '2022-01-05 03:49:30', ''),
(20220026, 'nicanor', 'maglangit', 'torres', 'nicanortorres@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09091417983', '1998-04-17', 23, 'Male', 'Single', 'catholic', 'catmon malabon city', '2022-01-05 03:49:20', ''),
(20220027, 'angelica', 'garcia', 'tolentino', 'angelicatolentino@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09193254896', '1999-06-20', 22, 'Female', 'Single', 'catholic', 'novaliches quezon city', '2022-01-05 03:49:14', ''),
(20220028, 'richie', 'dacuma', 'carrion', 'richie.c@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09122456771', '1999-01-12', 22, 'Male', 'Single', 'catholic', 'novaliches quezon city', '2022-01-05 03:47:59', ''),
(20220029, 'bryan', 'dy', 'lao', 'bryanlao@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09195684867', '1997-10-01', 24, 'Male', 'Single', 'Catholic', 'Tondo Manila City', '2022-01-05 08:50:50', ''),
(20220030, 'alaric', 'ching', 'yuzon', 'anygma@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09043860493', '1995-03-10', 26, 'Male', 'Single', 'Catholic', 'Pinagbuhatan Pasig City', '2022-01-05 08:53:02', ''),
(20220031, 'benjie', 'toledo', 'cruz', 'benjtol@gmail.com', '72ca3686131a8a7733a912ec154fd42d2b97cdf3', '09424960192', '1993-01-03', 29, 'Male', 'Single', 'Catholic', 'Masinag Antipolo City', '2022-04-08 03:14:52', ''),
(20220032, 'John', 'juts', 'gutierrez', 'kingb@gmail.com', '6cfa02e471127cc311af355718c7c70d27dfe013', '09472935873', '1998-10-27', 23, 'Male', 'Married', 'Catholic', 'Novaliches Quezon City', '2022-01-05 08:58:41', ''),
(20220033, 'mark', 'desuyo', 'vergara', 'mark.eron18@gmail.com', '07cc36db5072ef3ea21a610dfdaceb78e42fe767', '12345678910', '2000-06-12', 21, 'Male', 'Single', 'hfsfsf', 'valenzuela city', '2022-01-10 21:01:18', ''),
(20220036, 'jiraiyah', 'sanin', 'golib', 'jiraiyah623@gmail.com', '5ed5d228da1d00d947818b658c3e97fb5b4d5786', '09123846012', '2000-02-07', 22, 'Male', 'Single', 'catholic', 'caloocan city', '2022-05-01 15:20:58', ''),
(20220037, 'Paul', 'B', 'Din', 'pauldin0416@gmail.com', '6e0ea0f575a458fe5a3502c2a8532731e8564569', '09991760132', '2000-04-16', 22, 'Male', 'Single', 'Catholic', 'Mulawinan Valenzuela', '2022-05-03 15:17:51', '');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_documents`
--

CREATE TABLE `applicant_documents` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `resume` varchar(200) NOT NULL,
  `pag_ibig` varchar(200) NOT NULL,
  `sss` varchar(200) NOT NULL,
  `philhealth` varchar(200) NOT NULL,
  `nbi` varchar(200) NOT NULL,
  `others_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_documents`
--

INSERT INTO `applicant_documents` (`id`, `applicant_id`, `resume`, `pag_ibig`, `sss`, `philhealth`, `nbi`, `others_id`) VALUES
(2, 20220036, 'docu_uploads/626d66f299b768.32550305.jpg', 'docu_uploads/626d66f299b782.61990313.jpg', 'docu_uploads/626d66f299b638.24108565.jpg', 'docu_uploads/626d66f299b778.16402011.jpg', 'docu_uploads/626d66f299b799.56299899.jpg', 'docu_uploads/626d66f299b7a9.72907106.jpg'),
(3, 20220037, 'docu_uploads/627147d4c65cd4.01662557.docx', 'docu_uploads/627147d4c65cf0.19232259.docx', 'docu_uploads/627147d4c65bd8.63431530.docx', 'docu_uploads/627147d4c65ce3.99824832.docx', 'docu_uploads/627147d4c65d08.87223351.docx', 'docu_uploads/627147d4c65d13.40393609.docx');

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
(60, 110004, 20220036, 'relationship manager', '2022-05-01', 'pending', '');

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
-- Table structure for table `archive_visitor_registration`
--

CREATE TABLE `archive_visitor_registration` (
  `id` int(11) NOT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `middle_name` varchar(250) DEFAULT NULL,
  `department` varchar(250) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `contact` bigint(11) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `visitor_type` varchar(250) DEFAULT NULL,
  `visitor_purpose` varchar(250) DEFAULT NULL,
  `time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archive_visitor_registration`
--

INSERT INTO `archive_visitor_registration` (`id`, `last_name`, `first_name`, `middle_name`, `department`, `address`, `email`, `contact`, `gender`, `visitor_type`, `visitor_purpose`, `time`) VALUES
(1000124, 'fafa', 'fafa', 'faf', 'HR DEPARTMENT', 'Payatas A Quezon, city', ' lilgabs08@gmail.com', 9098374504, '', 'RIDER', 'fafafa', '2022-05-12 06:18:31'),
(1000125, 'fafa', 'af', 'fa', 'fa', 'f', ' fafaffafaffafafaf@gmail.con', 9098374504, 'faf', 'RIDER', 'fsfsfsfs', '2022-05-15 00:55:08'),
(1000126, 'faf', 'bbi', 'bibi', 'HR DEPARTMENT', 'gggagagag', 'ikesepria12@gmail.c', 9098374504, 'male', 'RIDERddd', '', '2022-05-14 10:18:46'),
(1000127, 'fafa', 'affa', 'faf', 'faf', 'faf', ' fafaffafaffafafaf@gmail.con', 9098374504, 'faf', 'faf', 'fsfsfsfs', '2022-05-15 01:38:03'),
(1000128, 'fafa', 'affa', 'faf', 'af', 'afaf', ' fdafag@gmail.com', 4, 'faf', 'RIDER', 'fafafaf', '2022-05-15 01:48:22');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `Co_Code` int(200) NOT NULL,
  `As_name` varchar(200) NOT NULL,
  `As_description` varchar(200) NOT NULL,
  `As_Amount` int(200) NOT NULL,
  `As_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`Co_Code`, `As_name`, `As_description`, `As_Amount`, `As_date`) VALUES
(1, 'Buildings', 'this asset is owned by the company', 180000, '2022-05-05 12:12:49'),
(2, 'Machineries', 'this asset is owned by the company', 30000, '2022-05-05 12:12:54'),
(3, 'Land', 'this asset is owned by the company', 190000, '2022-05-05 12:13:59');

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `id` int(11) NOT NULL,
  `asset` varchar(1000) NOT NULL,
  `preparedby` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`id`, `asset`, `preparedby`, `date_created`, `status`) VALUES
(4, 'Expenses', 30330051, '2022-05-25', 0),
(11, 'Purchases', 30330051, '2022-05-20', 0),
(12, 'Facility', 30330051, '2022-05-25', 1),
(13, 'Payroll', 30330051, '2022-05-27', 1),
(14, 'Reimbursment', 30330051, '2022-05-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auditor_done`
--

CREATE TABLE `auditor_done` (
  `id` int(11) NOT NULL,
  `auditor` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `filepath` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `task_audited` varchar(11) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auditor_done`
--

INSERT INTO `auditor_done` (`id`, `auditor`, `status`, `filepath`, `date_created`, `task_audited`, `remarks`) VALUES
(1, 30330073, '1', 'uploads/BANKING-AND-FINANCE-LOGISTICS-II.pdf', '2022-06-13', 'Purchases', 'All approved');

-- --------------------------------------------------------

--
-- Table structure for table `auditor_tasks`
--

CREATE TABLE `auditor_tasks` (
  `id` int(11) NOT NULL,
  `auditor` varchar(1000) NOT NULL,
  `filepath` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `task` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(27, 'vendor_approval.php', ' Record has been Update where vendor is James', 1, '2022-01-11 18:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `audit_task`
--

CREATE TABLE `audit_task` (
  `id` int(11) NOT NULL,
  `audit_task` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1009, 'fafafa', 'fafaf', 'fafaf', 123564845, 'ffaf', ' faffassss', '2022-05-15 03:25:55');

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
  `P_Status` int(200) NOT NULL,
  `P_PaymentMode` varchar(200) NOT NULL,
  `P_Description` varchar(200) NOT NULL
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
(18010546, 'daddad', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 0, '', 0, '', '', '', '', '2022-03-17 22:57:53');

-- --------------------------------------------------------

--
-- Table structure for table `change_pass_request`
--

CREATE TABLE `change_pass_request` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `reason` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `change_pass_request`
--

INSERT INTO `change_pass_request` (`id`, `employee_id`, `reason`, `department`, `status`) VALUES
(5, 30330028, 'adas', 'HR1', 'approved'),
(6, 30330030, 'adsdasdas', 'HR1', 'pending');

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
  `LT_Penalty` int(200) NOT NULL,
  `LT_date` date NOT NULL,
  `A_Number` int(200) NOT NULL,
  `LT_Type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collection_transactions`
--

INSERT INTO `collection_transactions` (`LT_id`, `LT_Recieved`, `LT_Penalty`, `LT_date`, `A_Number`, `LT_Type`) VALUES
(1, 1000, 100, '2021-04-05', 18011424, 'Loan Payment'),
(2, 1000, 100, '2021-05-05', 18011424, 'Loan Payment'),
(3, 200, 0, '2021-06-05', 18011424, 'Loan Payment'),
(4, 2000, 0, '2021-06-15', 10999212, 'Loan Payment'),
(5, 2000, 0, '2021-07-15', 10999212, 'Loan Payment'),
(6, 2000, 0, '2021-08-15', 10999212, 'Loan Payment'),
(7, 3000, 0, '2021-09-15', 10999212, 'Loan Payment'),
(8, 500000, 0, '2021-12-13', 18013999, 'deposit'),
(9, 100000, 0, '2021-12-14', 16052100, 'deposit'),
(10, 80000, 0, '2021-12-15', 16013231, 'deposit'),
(11, 95000, 0, '2021-12-18', 18014278, 'deposit'),
(12, 8500, 0, '2021-12-19', 16010051, 'Loan Payment'),
(13, 100000, 0, '2021-12-21', 17012232, 'deposit'),
(14, 4000, 100, '2021-12-22', 12316737, 'Loan Payment'),
(15, 70000, 0, '2021-12-23', 18956875, 'deposit'),
(16, 1000, 0, '2021-12-26', 27326143, 'Loan Payment'),
(17, 2500, 0, '2021-12-27', 41120130, 'Loan Payment'),
(18, 15000, 0, '2021-12-29', 59067090, 'deposit'),
(19, 4000, 100, '2022-01-02', 12837248, 'Loan Payment'),
(21, 3000, 0, '2022-01-03', 18202542, 'Loan Payment'),
(24, 1100, 100, '2022-04-23', 18011424, 'Loan Payment');

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
(22, 20220011, 'sti caloocan', 'information technology');

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
  `status` varchar(250) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `com_announcement`
--

CREATE TABLE `com_announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `com_announcement`
--

INSERT INTO `com_announcement` (`id`, `title`, `description`, `date`) VALUES
(16, 'fafaaacf', 'fafafaaaaaaa', '2022-05-14 17:37:46');

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
(2, 'e000002', 'Casual', 'Casual Test Details.', '2022-05-01', '2022-04-01', 'Signed', '2022-04-15'),
(3, 'e000003', 'Regular', 'Contract Details.', '2022-04-11', '2022-04-16', 'Unsigned', ''),
(4, 'e000004', 'Casual', 'Casual Contract Details', '2022-04-20', '2022-04-12', 'Unsigned', '');

-- --------------------------------------------------------

--
-- Table structure for table `contractor_form`
--

CREATE TABLE `contractor_form` (
  `id` int(11) NOT NULL,
  `vendors_fname` varchar(150) NOT NULL,
  `vendors_mi` varchar(15) NOT NULL,
  `vendors_lname` varchar(150) NOT NULL,
  `vendors_address` varchar(150) NOT NULL,
  `vendors_email` varchar(150) NOT NULL,
  `vendors_contact` int(11) NOT NULL,
  `vendors_status` varchar(150) NOT NULL,
  `vendor_pathurl` varchar(300) NOT NULL,
  `vendors_category` varchar(150) NOT NULL,
  `contractor_status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contractor_form`
--

INSERT INTO `contractor_form` (`id`, `vendors_fname`, `vendors_mi`, `vendors_lname`, `vendors_address`, `vendors_email`, `vendors_contact`, `vendors_status`, `vendor_pathurl`, `vendors_category`, `contractor_status`) VALUES
(7, 'kenneth', 'V', 'Brce', 'Sadasda', 'Ksds@gmail.com', 2147483647, 'Approved', 'uploads/Document Tracking (1).pdf', '0', 'Approved'),
(8, 'tasdwasd', 'tasdawda', 'sdadadadada', 'Lot 21 Block 7 Package 2 Phase 6 Camarin Caloocan City', 'Leedskenneth12@gmail.com', 2147483647, 'Approved', 'uploads/DEFINITION OF TERMS_LEDDE,ALAIZAM..pdf', '0', 'Pending'),
(9, 'tasdwasd', 'tasdawda', 'sdadadadada', 'Lot 21 Block 7 Package 2 Phase 6 Camarin Caloocan City', 'Leedskenneth12@gmail.com', 2147483647, 'Approved', 'uploads/Filipino-8-Q4-Week-1-2 (2).pdf', '0', 'Approved'),
(10, 'tasdwasd', 'tasdawda', 'sdadadadada', 'Lot 21 Block 7 Package 2 Phase 6 Camarin Caloocan City', 'Leedskenneth12@gmail.com', 2147483647, 'Approved', 'uploads/GROUP 6 OF 12HUMSS-PLATO.pdf', '0', 'Approved'),
(11, 'Kenneth', 'B', 'Ledde', 'Lot 21 Block 7 Package 2 Phase 6 Camarin Caloocan City', 'Leedskenneth12@gmail.com', 2147483647, 'Approved', 'uploads/74bcedc08847b858c278fd60d10a732d.pdf', '0', 'Pending'),
(12, 'wewewewe', 'wewewewew', 'wewewewew', 'ewewewew', 'leedskenneth12@gmail.com', 2147483647, 'Pending', 'uploads/AP 8 Q3 Week 1 (1).pdf', '0', 'Pending'),
(13, 'Kenneth', 'B', 'Ledde', 'Lot 21 Block 7 Package 2 Phase 6 Camarin Caloocan City', 'Leedskenneth12@gmail.com', 2147483647, 'Approved', 'uploads/Filipino-8-Q4-Week-1-2 (2).pdf', '0', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `contractor_request`
--

CREATE TABLE `contractor_request` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `request_stat` varchar(150) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contractor_request`
--

INSERT INTO `contractor_request` (`id`, `employee_id`, `request_stat`, `remarks`, `date`) VALUES
(1, 30330028, 'Approved', 'experience in something chuchu', '2022-05-27');

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
-- Table structure for table `core1files`
--

CREATE TABLE `core1files` (
  `id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `Body` text DEFAULT NULL,
  `preparedby` varchar(250) DEFAULT NULL,
  `urlpath` varchar(250) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `sec_dep` text DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core1files`
--

INSERT INTO `core1files` (`id`, `req_id`, `title`, `Body`, `preparedby`, `urlpath`, `date_created`, `sec_dep`, `date_from`, `date_to`, `status`) VALUES
(31, 0, ' Memorandum Aggrement', 'fafaf', 'Admin', 'uploads/SOCIAL-MEDIA-ADDICTION.docx', '2022-05-13', 'CORE1', '2022-05-14', '2022-05-20', '1'),
(32, 55, ' Memorandum Aggrement', 'fafaf', 'Admin', 'contract/SOCIAL-MEDIA-ADDICTION.docx', '2022-05-13', '', '2022-05-14', '2022-05-20', '2'),
(33, 55, ' Memorandum Aggrement', 'fafaf', 'Admin', 'contract/SOCIAL-MEDIA-ADDICTION.docx', '2022-05-13', 'CORE1', '2022-05-14', '2022-05-20', 'Downloaded'),
(34, 55, ' Memorandum Aggrement', 'fafaf', 'Staff', 'contract/SOCIAL-MEDIA-ADDICTION.docx', '2022-05-13', 'CORE1', '2022-05-21', '2022-05-22', 'Downloaded');

-- --------------------------------------------------------

--
-- Table structure for table `department_expenses`
--

CREATE TABLE `department_expenses` (
  `id` int(200) NOT NULL,
  `Expenses` varchar(200) NOT NULL,
  `Total` int(200) NOT NULL,
  `Comments` varchar(200) NOT NULL,
  `Co_Code` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_expenses`
--

INSERT INTO `department_expenses` (`id`, `Expenses`, `Total`, `Comments`, `Co_Code`) VALUES
(1, 'Collection Costs', 75000, 'This includes expenditures for hiring a collection agency. Some contracts and regulations prescribe liquidated damages for collection costs.', 1100),
(2, 'Computer Hardware and Software', 200000, 'For aquiring of hardware and software', 1100),
(3, 'Maintenance and Licenses', 150000, 'For mentainance memberships', 1100),
(4, 'Non- Capital Equipment', 40000, 'equipment or other physical assets with an acquisition cost of 35,000 to 80,000', 1100),
(5, 'Furniture', 25000, 'Office/Department Amenities', 1100),
(6, 'Athletic Fund', 60000, 'Department Activities', 1100),
(7, 'Office Supplies', 45000, 'Department office supplies', 1100),
(8, 'Machinery and Equipment', 150000, 'Department Equipment', 1100),
(9, 'Insurance', 400000, 'Department Insurance Costs', 1100),
(10, 'Emergency Fund', 350000, 'A budget set aside as a financial safety net for future mishaps or unexpected expenses', 1100);

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
(0, 'dexter', 'fafaf', '2022-03-25', '2022-03-31', 'fafaf', 'Staff', 1, 'uploads/Costumer-Complaint-Form.docx', '2022-03-26'),
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
-- Table structure for table `docu_tracking`
--

CREATE TABLE `docu_tracking` (
  `id` int(11) NOT NULL,
  `Document_Sender` varchar(150) NOT NULL,
  `Action` varchar(255) NOT NULL,
  `Document_Subject` varchar(255) NOT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `Location` varchar(255) NOT NULL,
  `Date_Created` datetime NOT NULL,
  `docu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `docu_tracking`
--

INSERT INTO `docu_tracking` (`id`, `Document_Sender`, `Action`, `Document_Subject`, `Remarks`, `Location`, `Date_Created`, `docu_id`) VALUES
(4, '15', 'Add new Applicant Lester', 'uploads/BANKING-AND-FINANCE-LOGISTICS-II.pdf', '', 'Vendor', '2022-04-14 18:36:01', 0),
(5, '15', 'Add new Applicant kenneth', 'uploads/BANKING-AND-FINANCE-LOGISTICS-II (2).pdf', '', 'Vendor', '2022-05-14 11:37:16', 0),
(6, '15', 'Add new Applicant aaaaa', 'uploads/Q3_WEEK-1-2-edited.pdf', '', 'Vendor', '2022-05-14 11:47:18', 0),
(7, '15', 'Add new Applicant testkenneth', 'uploads/BANKING-AND-FINANCE-LOGISTICS-II (2).pdf', '', 'Vendor', '2022-05-14 11:50:06', 0),
(8, '33', 'Add new Applicant dexter', 'uploads/11562-Anonymized manuscript-21230-3-10-20190222.pdf', '', 'Vendor', '2022-05-14 23:32:29', 0),
(9, '', 'Add new Applicant kleddde9999', 'uploads/Cynthia_qtp.pdf', NULL, 'Vendor', '2022-05-19 16:20:27', 0),
(10, '', 'Add new Applicant Janina Fruta', 'uploads/Cynthia_qtp.pdf', NULL, 'Vendor', '2022-05-21 11:59:33', 0),
(11, '', 'Add new Applicant eunice', 'uploads/74bcedc08847b858c278fd60d10a732d.pdf', NULL, 'Vendor', '2022-05-21 17:52:37', 0),
(12, '', 'Add new Applicant jasmine', 'uploads/Cynthia_qtp.pdf', NULL, 'Vendor', '2022-05-21 17:56:48', 0),
(13, '', 'Add new Applicant testing', 'uploads/Document Tracking.pdf', NULL, 'Vendor', '2022-05-21 17:58:22', 0),
(14, '', 'Add new Applicant lagay', 'uploads/Cynthia_qtp.pdf', NULL, 'Vendor', '2022-05-21 18:00:59', 0),
(15, '', 'Add new Applicant hahah', 'uploads/Q3_WEEK-1-2-edited.pdf', NULL, 'Vendor', '2022-05-21 18:02:14', 0),
(16, '', 'Add new Applicant kjasjksakj', 'uploads/74bcedc08847b858c278fd60d10a732d.pdf', NULL, 'Vendor', '2022-05-21 18:07:43', 0),
(17, '', 'Add new Applicant jsjkdjkajkd', 'uploads/Filipino-8-Q4-Week-1-2 (2).pdf', NULL, 'Vendor', '2022-05-21 18:13:46', 0),
(18, '', 'Add new Applicant dedelete', 'uploads/James-resume.pdf', NULL, 'Vendor', '2022-05-21 18:24:33', 0),
(19, '', 'Add new Applicant practice', 'uploads/Q3_WEEK-1-2-edited.pdf', NULL, 'Vendor', '2022-05-21 18:29:48', 0),
(20, '', 'Add new Applicant kkkkk', 'uploads/Filipino-8-Q4-Week-1-2 (2).pdf', NULL, 'Vendor', '2022-05-21 18:31:06', 0),
(21, '', 'Add new Applicant jjjj', 'uploads/James-resume.pdf', NULL, 'Vendor', '2022-05-21 18:32:32', 0),
(22, '', 'Add new Applicant trytry', 'uploads/Cynthia_qtp.pdf', NULL, 'Vendor', '2022-05-21 23:39:04', 0),
(23, '', 'Add new Applicant testing', 'uploads/Document Tracking (1).pdf', NULL, 'Vendor', '2022-05-21 23:49:03', 0),
(24, '33', 'Add new Applicant has', 'uploads/BANKING-AND-FINANCE-LOGISTICS-II.pdf', NULL, 'Vendor', '2022-05-22 00:05:37', 0),
(25, '2', 'Add new Applicant jester', 'uploads/sustainability-13-05311.pdf', NULL, 'Vendor', '2022-05-22 02:58:56', 0),
(26, '2', 'Add new Applicant carry', 'uploads/Cynthia_qtp.pdf', NULL, 'Vendor', '2022-05-22 03:34:39', 0),
(27, '2', 'Add new Applicant lester', 'uploads/Document Tracking (1).pdf', NULL, 'Vendor', '2022-05-22 04:02:08', 0),
(28, '2', 'Add new Applicant hot', 'uploads/Document Tracking (1).pdf', NULL, 'Vendor', '2022-05-22 04:05:42', 0),
(29, '', 'Add new Applicant ', 'uploads/DEFINITION OF TERMS_LEDDE,ALAIZAM..pdf', NULL, 'Vendor', '2022-05-29 03:15:57', 0),
(30, '', 'Add new Applicant ', 'uploads/Filipino-8-Q4-Week-1-2 (2).pdf', NULL, 'Vendor', '2022-05-29 03:16:16', 0),
(31, '', 'Add new Applicant ', 'uploads/GROUP 6 OF 12HUMSS-PLATO.pdf', NULL, 'Vendor', '2022-05-29 03:16:36', 0),
(32, '', 'Add new Applicant ', 'uploads/74bcedc08847b858c278fd60d10a732d.pdf', NULL, 'Vendor', '2022-05-29 03:27:34', 0),
(33, '', 'Add new Applicant ', 'uploads/AP 8 Q3 Week 1 (1).pdf', NULL, 'Vendor', '2022-05-29 03:27:54', 0),
(34, '', 'Add new Applicant ', 'uploads/Filipino-8-Q4-Week-1-2 (2).pdf', NULL, 'Vendor', '2022-05-29 03:29:39', 0);

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
(34, 'bagbaguin elementary school', 'babaguin national high school', 'university of caloocan city', 20220022);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(500) NOT NULL,
  `middle_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `civil_status` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `date_hired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `first_name`, `middle_name`, `last_name`, `pos_id`, `dept_id`, `email`, `birth_date`, `age`, `gender`, `civil_status`, `religion`, `contact_number`, `address`, `designation`, `department`, `date_hired`) VALUES
(1, 'Super', 'Owner', 'Admin', 0, 0, '', '0000-00-00', 0, '', '', '', '', '', 'SuperAdmin', 'Administration', '0000-00-00'),
(30330028, 'aldrich', 'lim', 'ramos', 0, 0, 'darryl917deleon@gmail.com', '1997-12-30', 24, 'Male', 'Single', 'catholic', '2147483647', 'maysan valenzuela city', 'Social Recognition', 'HR1', '2022-03-20'),
(30330029, 'miguel', 'luna', 'bucao', 0, 0, 'miguelbucao@gmail.com', '1998-02-14', 24, 'Male', 'Single', 'catholic', '2147483647', 'brgy concepcion gulayan Malabon City', 'HR1 manager', 'HR1', '2022-03-22'),
(30330030, 'alvin', 'barruga', 'vidal', 0, 0, 'alvinvidal@gmail.com', '1996-12-11', 25, 'Male', 'Single', 'catholic', '2147483647', 'brgy concepcion gulayan malabon city', 'Performance Management', 'HR1', '2022-04-02'),
(30330035, 'benjie', 'toledo', 'cruz', 0, 0, 'benjtol@gmail.com', '1993-01-03', 29, 'Male', 'Single', 'Catholic', '2147483647', 'Masinag Antipolo City', 'Recruitment', 'HR1', '2022-04-08'),
(30330036, 'maria', 'luna', 'juana', 0, 0, 'miguelbucao@gmail.com', '1998-02-14', 24, 'Male', 'Single', 'catholic', '2147483647', 'brgy concepcion gulayan Malabon City', 'New Hire Onboard', 'HR1', '2022-04-13'),
(30330037, 'james', 'carter', 'ian', 0, 0, 'ianjames@gmail.com', '2000-12-25', 21, 'male', 'single', 'catholic', '5', 'quezon city', 'Finance Manager', 'Finance', '2018-04-16'),
(30330038, 'eric', 'siga', 'cabrillos', 0, 0, 'cabrilloseric@gmail.com', '2000-06-19', 21, 'male', 'single', 'catholic', '09537496312', 'quezon city', 'Applicant Management', 'HR1', '2020-07-23'),
(30330039, 'ian', 'lebron', 'james', 0, 0, 'james@gmail.com', '1999-05-07', 22, 'male', 'single', 'catholic', '09573658263', 'quezon city', 'Disbursment officer', 'Finance', '2017-09-18'),
(30330041, 'mae', 'ann', 'caunca', 0, 0, 'cauncamae@gmail.com', '2001-04-23', 21, 'female', 'married', 'catholic', '09123456778', 'quezon city', 'Collection officer', 'Finance', '2021-02-19'),
(30330042, 'peter', 'fly', 'pan', 0, 0, 'peterpan@gmail.com', '1997-06-06', 24, 'male', 'single', 'catholic', '09237538475', 'quezon city', 'Finance Manager', 'Finance', '2017-05-19'),
(30330043, 'dexter', 'a.', 'gabule', 0, 0, 'lilgabs08@gmail.com', '1999-08-11', 22, 'male', 'single', 'catholic', '09098374504', 'talisay street', 'administrative Manager', 'adminitrative', '2022-04-30'),
(30330044, 'julius', 'a.', 'talion', 0, 0, 'lilgabs08@gmail.com', '1999-11-01', 22, 'male', 'single', 'catholic', '09098374504', 'sapphire', 'administrative staff', 'administrative', '2022-04-30'),
(30330046, 'julius', 'julius', 'talion', 0, 0, 'taliom@gmail.com', '2000-05-16', 21, 'male', 'single', 'catholic', '09583759534', 'quezon city', 'HR4 Manager', 'HR4', '2021-04-18'),
(30330047, 'Paul', 'B', 'Din', 0, 0, 'pauldin0416@gmail.com', '2000-04-16', 22, 'Male', 'Single', 'Catholic', '09991760132', 'Mulawinan Valenzuela', 'HR1 Manager', 'Recruitment', '2022-05-03'),
(30330048, 'Lea', 'b.', 'Cassey', 0, 0, 'lilgabs08@gmail.com', '1999-08-11', 22, 'female', 'single', 'catholic', '09098374504', 'afafafaffaf', 'core1 manager', 'core1', '0000-00-00'),
(30330049, 'netoy', 'f', 'netoy', 0, 0, 'lilgabs08@gmail.com', '1999-08-11', 22, 'male', 'single', 'catholic', '09098374504', 'fafafafafafafafa', 'core2admin', 'core2', '0000-00-00'),
(30330050, 'justin', 'b.', 'Lopez', 0, 0, 'lilgabs08@gmail.com', '1999-08-11', 22, 'female', 'single', 'catholic', '09098374504', 'dadadadadadadad', 'logistic1 manager', 'logistic1', '2022-05-06'),
(30330051, 'janina', 'v', 'mamaril', 0, 0, 'janina@gmial.com', '1999-08-11', 22, 'female', 'single', 'catholic', '09098374504', 'dadadsg', 'logistic_manager', 'logistic2', '2022-04-30'),
(30330071, 'Eunice', 'D.', 'Rodriguez', 38, 9, '38', '0000-00-00', 0, '1999-02-05', '23', 'female', 'Single', 'Catholic', '09618002503', 'Meycauyan', '2022-05-17'),
(30330072, 'grock', 'D.', 'Rodriguez', 38, 9, '38', '0000-00-00', 0, '1999-02-05', '23', 'female', 'Single', 'Catholic', '09618012503', 'Meycauyan', '2022-05-17'),
(30330073, 'Lovely', 'M.', 'Ledde', 38, 9, 'lovelyLedde@gmail.com', '1998-08-06', 23, 'Female', 'Married', 'Christian Born again', '09984144515', 'Tagaytay', 'dasdwad', 'logistic2', '2022-05-05'),
(30330074, 'Alaiza', 'M.', 'Ledde', 31, 9, 'changethis@gmail.com', '2004-09-09', 17, 'Female', 'Single', 'Roman Catholic', '09984144515', 'Caloocan City', 'log2 driver', 'logistic2', '2022-06-15');

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
-- Table structure for table `ended_project_list`
--

CREATE TABLE `ended_project_list` (
  `id` int(11) NOT NULL,
  `prop_proj` varchar(255) NOT NULL,
  `proj_name` varchar(255) NOT NULL,
  `loc` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `proj_man` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ended_project_list`
--

INSERT INTO `ended_project_list` (`id`, `prop_proj`, `proj_name`, `loc`, `cost`, `start_date`, `end_date`, `proj_man`) VALUES
(8, 'bildingggggggg', 'asd', 'barangay 173', '', '2022-05-06', '2022-04-30', 'JUSTINE BLESS LOPEZ'),
(9, 'ADDITIONAL FACILITY', 'WAREHOUSE BUILDING', '1', '', '2022-05-07', '2022-10-20', 'AKO'),
(10, 'asd', 'asd', 'asd', 'sad', '2022-05-07', '2022-05-31', 'asd'),
(11, 'asd', 'asd', 'asd', 'sad', '2022-05-07', '2022-05-31', 'asd'),
(12, 'asd', 'asd', 'asd', 'sad', '2022-05-07', '2022-05-31', 'asd'),
(13, 'asd', 'asd', 'asd', 'sad', '2022-05-07', '2022-05-31', 'asd'),
(14, 'asd', 'asd', 'asd', 'sad', '2022-05-07', '2022-05-31', 'asd'),
(15, 'asd', 'asd', 'asd', 'sad', '2022-05-07', '2022-05-31', 'asd'),
(16, 'asd', 'asd', 'asd', 'sad', '2022-05-07', '2022-05-31', 'asd'),
(17, 'asd', 'asd', 'asd', 'sad', '2022-05-07', '2022-05-31', 'asd'),
(18, 'asd', 'asd', 'asd', 'sad', '2022-05-07', '2022-05-31', 'asd');

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
  `status` varchar(100) DEFAULT NULL,
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
  `start_date` varchar(100) DEFAULT NULL,
  `until` varchar(100) DEFAULT NULL,
  `time_date_request` varchar(250) DEFAULT NULL,
  `list_equipment_request` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment_reservation`
--

INSERT INTO `equipment_reservation` (`id`, `lname`, `fname`, `mname`, `department`, `position`, `start_date`, `until`, `time_date_request`, `list_equipment_request`) VALUES
(1, 'gabule', 'dexter', 'attres', 'office of administration', 'manager', '', '', 'november 21, 2021 \r\n9:00 am', '1 long table \r\n10 chair\r\n1 microphone\r\n2 speaker\r\n'),
(2, 'faf', 'faf', 'faf', 'faf', 'faf', '', '', '2021-12-15 23:31:30', 'faf'),
(3, 'fsfsgs', 'gsgsg', 'gsg', '', '', '', '', '', ''),
(4, '', '', '', '', '', '', '', '2021-12-16 01:45:13', ''),
(5, '', '', '', '', '', '', '', '2021-12-16 02:04:23', ''),
(6, '', '', '', '', '', '', '', '2021-12-16 02:06:40', ''),
(7, '', '', '', '', '', '', '', '2021-12-16 02:13:06', ''),
(8, 'ff', 'faf', 'faf', 'fafa', 'faf', '', '', '2021-12-16 03:21:03', 'faf'),
(9, 'hgeh', 'hdhd', 'hdhd', 'dhdh', 'hdh', '', '', '2021-12-18 22:08:52', 'hdhd'),
(10, 'ffaf', 'fafaf', 'fafa', 'faf', 'faf', '', '', '2022-01-03 22:09:48', 'gfag'),
(11, 'fafaf', '', '', '', '', '', '', '2022-01-13 00:30:54', '');

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
(113, 0, '2022-04-23', 0),
(154, 0, '2022-04-23', 1010),
(155, 0, '2022-04-23', 1010),
(156, 0, '2022-04-23', 1100),
(157, 250, '2022-04-25', 0),
(158, 3004, '2022-04-26', 0),
(159, 250, '2022-04-26', 0),
(160, 3004, '2022-04-26', 0),
(161, 3004, '2022-04-26', 0),
(162, 3004, '2022-04-26', 0),
(163, 3004, '2022-04-26', 0),
(164, 3004, '2022-04-26', 0),
(165, 3004, '2022-04-26', 0),
(166, 3004, '2022-04-26', 0),
(167, 3004, '2022-04-26', 0),
(168, 3004, '2022-04-26', 0),
(169, 3004, '2022-04-26', 0),
(170, 3004, '2022-04-26', 0),
(171, 3004, '2022-04-26', 0),
(172, 3004, '2022-04-26', 0),
(173, 3004, '2022-04-26', 0),
(174, 3004, '2022-04-26', 0),
(175, 250, '2022-04-26', 0),
(176, 3004, '2022-04-26', 0),
(177, 3004, '2022-04-26', 0),
(178, 3140, '2022-04-26', 0),
(179, 250, '2022-04-27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `id` int(11) NOT NULL,
  `image` varchar(250) CHARACTER SET latin1 NOT NULL,
  `name_of_room` varchar(250) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id`, `image`, `name_of_room`, `description`, `status`) VALUES
(39, 'upload/comlab_1651685826.jpg', 'fafaf', 'a', 'Not-Avalable');

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
-- Table structure for table `facility_status`
--

CREATE TABLE `facility_status` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facility_status`
--

INSERT INTO `facility_status` (`id`, `title`) VALUES
(1, 'Available'),
(2, 'unavailable');

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
-- Table structure for table `general_journal`
--

CREATE TABLE `general_journal` (
  `id` int(200) NOT NULL,
  `code` varchar(255) NOT NULL,
  `journal_date` date NOT NULL,
  `description` text NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `group_list`
--

CREATE TABLE `group_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Debit, 2= Credit',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1= Active',
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = No, 1 = Yes ',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_list`
--

INSERT INTO `group_list` (`id`, `name`, `description`, `type`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Assets', 'The cash, inventory, and other resources you owned.', 1, 1, 0, '2022-02-01 09:56:35', '2022-02-01 09:56:58'),
(2, 'Revenue', 'Cash coming into your business through sales and other types of payments', 2, 1, 0, '2022-02-01 09:57:45', '0000-00-00 00:00:00'),
(3, 'Expenses', 'The amount you’re spending on services and other items, like payroll, utility bills, and fees for contractors.', 1, 1, 0, '2022-02-01 09:58:09', '2022-02-01 09:59:13'),
(4, 'Liabilities', 'The money you still owe on loans, debts, and other obligations.', 2, 1, 0, '2022-02-01 09:58:34', '0000-00-00 00:00:00'),
(5, 'Equity', 'How much is remaining after you subtract liabilities from assets.', 2, 1, 0, '2022-02-01 09:59:05', '0000-00-00 00:00:00'),
(6, 'Dividend', 'Form of income that shareholders of corporations receive for each share of stock that they hold.', 1, 1, 0, '2022-02-01 10:00:13', '0000-00-00 00:00:00'),
(7, 'Sample101', 'Sample', 1, 0, 1, '2022-02-01 10:01:35', '2022-02-01 10:03:28'),
(8, 'Cash', 'paid in cash', 2, 1, 0, '2022-04-01 15:05:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hr1files`
--

CREATE TABLE `hr1files` (
  `id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `Body` text DEFAULT NULL,
  `preparedby` varchar(250) DEFAULT NULL,
  `urlpath` varchar(250) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `sec_dep` text DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr1files`
--

INSERT INTO `hr1files` (`id`, `req_id`, `title`, `Body`, `preparedby`, `urlpath`, `date_created`, `sec_dep`, `date_from`, `date_to`, `status`) VALUES
(22, 30330045, 'employee contract', 'idodloooo', 'Admin', 'uploads/Template.docx', '2022-05-01', 'HR1', '2022-05-13', '2022-05-26', 'signed'),
(23, 30330045, 'Project Proposal Contract', 'NEW BUILDING', 'Admin', 'contract_uploads/dexter-gabule-ojt-formWeek4.docx', '2022-05-03', 'Logistic 1', '2022-05-04', '2022-06-03', '1'),
(24, 30330047, 'employee contract', 'zadsa', 'Admin', 'uploads/CCS-GRADING-SHEET-CAP1-3 Banking System HR 1.docx', '2022-05-03', 'HR1', '2022-05-03', '2022-05-18', 'signed'),
(25, 30330047, 'employee contract', 'asdasd', 'Admin', 'contract_uploads/CCS-GRADING-SHEET-CAP1-3 Banking System HR 1.docx', '2022-05-03', 'HR1', '2022-05-06', '2022-05-04', '1');

-- --------------------------------------------------------

--
-- Table structure for table `image_tb`
--

CREATE TABLE `image_tb` (
  `imageid` int(11) NOT NULL,
  `img_location` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_tb`
--

INSERT INTO `image_tb` (`imageid`, `img_location`) VALUES
(23, 'upload/comlab_1651685826.jpg'),
(24, 'upload/conference_1651733951.jpg'),
(25, 'upload/Luxury Office_1651736023.jpg'),
(26, 'upload/lobby_1651736031.jpg'),
(27, 'upload/271913542_621039062325095_8928246852636406045_n_1651741605.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `income_statement`
--

CREATE TABLE `income_statement` (
  `id` int(200) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Amount` int(200) NOT NULL,
  `Type` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income_statement`
--

INSERT INTO `income_statement` (`id`, `Name`, `Amount`, `Type`, `date`) VALUES
(1, 'Collection Revenue', 392910, '1', '2022-05-17 18:01:10'),
(4, 'Salaries Expenses', 50000, '2', '2022-05-17 18:35:57'),
(5, 'Claims And reimbursments', 100000, '2', '2022-05-17 18:42:57'),
(6, 'Procurments', 600000, '2', '2022-05-17 18:44:02');

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
(60, 20220021, '2022-03-14', '15:34:00', 's', 90),
(62, 20220013, '2022-03-24', '19:52:00', 'sasda', 90),
(66, 20220029, '2022-04-14', '15:41:00', 'sogo', 0),
(67, 20220018, '2022-04-16', '15:59:00', 'Sugo', 0),
(68, 20220032, '2022-04-16', '15:08:00', 'BCP', 0),
(69, 20220014, '2022-04-16', '15:13:00', 'Sugo', 0),
(70, 20220028, '2022-04-16', '15:24:00', 'Sugo', 0);

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
(2, 'Manager', 'Casual', '1-Year', 30000, 1000, 125, 62, 50, 75, 25, 250),
(11, 'Manager', 'Regular', '2-year', 1000, 457, 68, 5, 150, 150, 150, 150),
(12, 'logistic_manager', 'Regular', '3-years', 7500, 457, 68, 48, 200, 200, 200, 200);

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
-- Table structure for table `job_qualifications`
--

CREATE TABLE `job_qualifications` (
  `id` int(11) NOT NULL,
  `job_title` varchar(200) NOT NULL,
  `job_desc` varchar(1000) NOT NULL,
  `job_quali` varchar(1000) NOT NULL,
  `salary` int(11) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_qualifications`
--

INSERT INTO `job_qualifications` (`id`, `job_title`, `job_desc`, `job_quali`, `salary`, `department`) VALUES
(1, 'Recruitment Staff', 'The person who manages the recruitment process of the company', 'Atleast bachelors degree in BSBA major in Human resource or any other related course', 210000, 'hr'),
(2, 'Personal assistant', 'perform secretarial work and provide senior managers with day-to-day administrative support. Their duties include answering phone calls and managing correspondence, scheduling appointments, and making travel arrangements. They may also be required to organize events.', 'Computer literacy. Verbal and written articulacy. Professional discretion. Efficiency. Well-developed time management skills. Strong organisational skills.', 133632, 'hr'),
(3, 'Training Manager', 'Training managers are specialists who help businesses by developing, facilitating and supervising training programs for employees. They assess the needs of a business, implement training and development plans, and facilitate a wide variety of training programs that enhance the effectiveness of the workforce', 'Proven work experience as a Training Manager. Track record in designing and executing successful training programs. Familiarity with traditional and modern training methods (mentoring, coaching, on-the-job or in classroom training, e-learning, workshops, simulations etc)', 729329, 'hr'),
(4, 'HR Manager', 'Responsible for overseeing personnel and daily operations of the human resources department. Their duties include hiring HR personnel, managing the hiring and onboarding procedures for other company employees and coordinating with members of their department to provide support to company employees regarding personal and professional incidents. ', 'Strong computer skills and experience with offices management and communication software. Ability to understand statistical data and mathematical concepts and how to apply them to HR processes. Excellent leadership, training and development skills. Strong decision-making skills. Exceptional verbal and written communication skills. Expert in labor laws set by governing authorities and organizations. Ability to comprehend complex language, theories and methodologies. Time management and organizational skills. ', 25000, 'hr'),
(5, 'dbsksnx', 'bdirofppvb', 'dbcisn', 1, 'log'),
(6, 'Supervisor ', 'responsible for managing the workflow and training new hires on how they can best serve customers and teams of employees. They also create schedules that keep everyone busy with deadlines met to prevent gaps or downtime while giving direction and feedback about what needs improvement.', ' complete degree programs in business or office administration to qualify for a position. Courses in a business administration program include management, organizational behavior and human resource management, which prepare the supervisor to direct and lead others in a work setting.', 23924, 'hr'),
(8, 'Administrative staff', '-Answering incoming calls; taking messages and re-directing calls as required -Dealing with email enquiries -Diary management and arranging appointments, booking meeting rooms and conference facilities Data entry (sales figures, property listings etc.) -General office management such as ordering stationary Organising travel and accommodation for staff and customers -Arranging both internal and external events -Possibly maintaining the company social media accounts -Providing administration support to Sales Reps, Property Managers and Senior Management', 'High school diploma or general education degree (GED) required. associate\'s degree in Business Administration preferred.', 21000, 'admin'),
(14, 'Financial manager', 'The Financial Manager is responsible for the financial well-being of the organization. They develop strategies and plans for the organization’s long-term financial objectives, produce financial reports, and direct investment activities.', 'Proven work experience as a Finance Officer or similar role Solid knowledge of financial and accounting procedures Experience using financial software Advanced MS Excel skills Knowledge of financial regulations Excellent analytical and numerical skills Sharp time management skills Strong ethics, with an ability to manage confidential data BSc degree in Finance, Accounting or Economics Professional qualification as a CFA/CPA is considered a plus', 46732, 'financials'),
(15, 'Logistics manager ', 'responsible for managing the workflow and training new hires on how they can best serve customers and teams of employees. They also create schedules that keep everyone busy with deadlines met to prevent gaps or downtime while giving direction and feedback about what needs improvement.', 'professionals who are responsible for ensuring that the supply chain is efficient and effective throughout their organization. They organize, store and monitor the distribution of goods to ensure items and resources are shipped to their appropriate destinations. ', 481188, 'log'),
(16, 'Client Service', 'Managing client inquiries via phone, email, online, or in person. Directing client complaints or complex queries to relevant departments in a timely manner. Providing clients with technical assistance on products and services. Expediting s', 'Business degree or related qualification. Strong communication skills. Ability to meet deadlines. Computer literacy. Calm, polite, and professional behavior. Reliable and self-motivated. General business knowledge. High service orientation.', 246864, 'financials'),
(17, 'Customer Service – Finance.', 'Customer service representatives in financial institutions process customers\' financial transactions and provide information on related banking products and services. They are employed by banks, trust companies, credit unions and similar financial institutions', 'Completed at least 2 year associate degree or 2 years in college with no back subjects. Must possess good English communication skills. No experience required; BPO or customer facing experience an advantage. Amenable to work on shifting schedule. Willing to work in Makati (near EDSA)', 32, 'financials'),
(18, 'Chief Financial Officer (CFO)', 'The chief financial officer (CFOs) holds the top financial position in an organization. They are responsible for tracking cash flow and financial planning and analyzing the company\'s financial strengths and weaknesses and proposing strategic directions', 'Serving as a CFO requires a background in accounting or finance and an advanced business degree, generally including an MBA. CFOs must also have experience analyzing data to make recommendations on financial and organizational strategy', 2400000, 'financials'),
(19, 'Junior financial analyst', 'The Financial Manager is responsible for the financial well-being of the organization. They develop strategies and plans for the organization’s long-term financial objectives, produce financial reports, and direct investment activities.', 'A financial analyst culls data to help companies make business decisions or investors take action, such as to buy or sell a stock or other security. They weigh macroeconomic and microeconomic issues, and company fundamentals to make predictions about firms, sectors, and industries. A bachelor\'s degree in something math or finance-related is a given and moving up to the senior level means getting certifications and/or an MBA. A recent college graduate can expect to start at the junior level, under the supervision of a more senior analyst. Someone with a few years of experience, several key certifications, and an MBA from a prestigious university can move up to a senior role.', 21025, 'financials'),
(22, 'Payroll assistant', 'Payroll assistants gather timesheets, capture time worked, and draft paychecks before employees are compensated. Payroll assistants are commonly known as payroll clerks. Completely free trial, no card required', 'Proven work experience as a Payroll Officer, Payroll Clerk or similar role. Hands-on experience with HRIS and accounting software. Strong math skills with an ability to spot numerical errors. Good knowledge of labor legislation. Time-management skills. Ability to handle confidential information.', 17226, 'financials'),
(24, 'Finance clerk', 'Preparing and processing financial documents such as bills, receipts, and invoices. Updating and maintaining the database, financial records, and filing systems. Tracking and monitoring financial transactions. Reviewing financial records, documents, and information to ensure their accuracy.', 'Proven experience as a Finance Clerk. Knowledge of basic bookkeeping and financial transactions. Familiarity with financial regulations, i.e. Generally Accepted Accounting Principles (GAAP) Knowledge of MS Office and databases. Attention to detail. Organizational and multitasking abilities.', 18301, 'financials'),
(25, 'Sales Manager', 'Sales managers are responsible for leading sales teams to reach sales targets. Sales managers are primarily tasked with hiring and training team members, setting quotas, evaluating and adjusting performance, and developing processes that drive sales. Sales managers are oftentimes expected to travel.', 'Bachelor\'s degree in marketing or business administration. 7+ years in sales management within a corporate setting. Proven track record of success the sales cycle from plan to close. Excellent communication, interpersonal, and organizational skills. Superb leadership ability', 719117, 'core'),
(26, 'Financial advisor assistant', 'Responsibilities · Assist financial advisors with daily activities, including maintaining calendars, preparing correspondence, and providing customer service ', 'Bachelor\'s degree in business, finance, or related field. 1-2 years of sales experience. Must have current FINRA Series 7 and 63 Securities Registration (66 or 65 preferred). Life and health license. Valid driver’s license. Knowledge of mutual funds, securities, and insurance industries. Proficient in Word, Excel, Outlook, and PowerPoint. Comfortable using a computer for various tasks. Experience providing quality financial advice.', 35704, 'financials'),
(27, 'Logistics manager ', 'responsible for managing the workflow and training new hires on how they can best serve customers and teams of employees. They also create schedules that keep everyone busy with deadlines met to prevent gaps or downtime while giving direction and feedback about what needs improvement.', 'professionals who are responsible for ensuring that the supply chain is efficient and effective throughout their organization. They organize, store and monitor the distribution of goods to ensure items and resources are shipped to their appropriate destinations. ', 481188, 'log'),
(28, 'Office management', 'Duties and responsibilities include scheduling meetings and appointments, making office supplies arrangements, greeting visitors and providing general administrative support to our employees', 'A bachelor degree or equivalent. Five years of experience in office administration. Office management experience. Excellent computer skills, including a high degree of proficiency in Microsoft Word, Excel, Outlook, and PowerPoint.', 366, 'admin'),
(29, 'Office management', 'Duties and responsibilities include scheduling meetings and appointments, making office supplies arrangements, greeting visitors and providing general administrative support to our employees', 'A bachelor degree or equivalent. Five years of experience in office administration. Office management experience. Excellent computer skills, including a high degree of proficiency in Microsoft Word, Excel, Outlook, and PowerPoint.', 366, 'admin'),
(30, 'Office management', 'Duties and responsibilities include scheduling meetings and appointments, making office supplies arrangements, greeting visitors and providing general administrative support to our employees', 'A bachelor degree or equivalent. Five years of experience in office administration. Office management experience. Excellent computer skills, including a high degree of proficiency in Microsoft Word, Excel, Outlook, and PowerPoint.', 366, 'admin'),
(31, 'Office management', 'responsible for keeping an office running smoothly and overseeing administrative support. The job can range widely in duties and responsibilities, from reception, copy editing and support, to handling a specific type of paperwork or filing for a specific department.', 'A bachelor degree or equivalent five years of experience in office administration office management experience excellent computer skills including a high degree of proficiency in microsoft word,excel,outlook,and powerpoint.', 336, 'admin'),
(32, 'Office management', 'responsible for keeping an office running smoothly and overseeing administrative support. The job can range widely in duties and responsibilities, from reception, copy editing and support, to handling a specific type of paperwork or filing for a specific department.', 'A bachelor degree or equivalent five years of experience in office administration office management experience excellent computer skills including a high degree of proficiency in microsoft word,excel,outlook,and powerpoint.', 336, 'admin'),
(33, 'Office management', 'responsible for keeping an office running smoothly and overseeing administrative support. The job can range widely in duties and responsibilities, from reception, copy editing and support, to handling a specific type of paperwork or filing for a specific department.', 'A bachelor degree or equivalent five years of experience in office administration office management experience excellent computer skills including a high degree of proficiency in microsoft word,excel,outlook,and powerpoint.', 336, 'admin');

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
  `salary` int(10) NOT NULL,
  `date_of_request` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_vacancy`
--

INSERT INTO `job_vacancy` (`job_id`, `job_title`, `no_of_vacancy`, `job_description`, `job_qualification`, `department`, `salary`, `date_of_request`, `status`) VALUES
(110001, 'HR staff', 4, ' A bank teller works in a bank and is responsible for helping members cash checks, withdraw money, move transactions to different accounts, create checking and savings accounts, and provide checks to customers. Bank tellers should have ethical standards and practice confidentiality to uphold member account information. They should also have good problem-solving skills and be able to communicate verbally. Typically, bank teller candidates need at least a high school diploma or GED to qualify for a position.', 'Bachelor\'s degree in a relevant field may be preferred.\r\nCash handling experience and on-the-job training may be required.\r\nAbility to pass a background check.\r\nExceptional time management, communication, and customer service skills.', 'HR1', 30000, '2022-01-03', 'pending'),
(110002, 'Bank Teller', 2, ' A banker works at a bank or financial institution. They are responsible for meeting with bank members (both individuals or companies) and helping them acquire loans through the bank. By doing this, they aim to help the bank earn money by applying fees and interest rates to those loans. Bankers can also meet with clients for a paid consultation to advise them on financial matters such as investments and capital resources.', 'Candidates must have passed class 12th in commerce stream from a recognised board. Must have a bachelor\'s degree in B.com/ B.A. (Economics) degree from a recognised university. Candidates must have an MBA degree in investment banking to become an investment banker.', 'IT dept', 30000, '2021-10-01', 'pending'),
(110003, 'credit analyst', 3, 'A credit analyst can work for an investment bank, an investment firm, credit card companies and any other institution where lending money is involved. They are responsible for reviewing an applicant\'s financial history and credit score. The main difference between a credit analyst and other professions like a loan processor is that they can only provide a recommendation as to whether or not an applicant should be approved. Credit analysts usually have a Bachelor\'s Degree in Finance or Economics and extensive knowledge of statistics, financial statements and ratio analysis.', 'Accounting skills.\r\nKnowledge of industry.\r\nComputing skills.\r\nCommunication skills.\r\nProblem-solving.\r\nAttention to detail.\r\nDocumentation and organization skills.\r\nKnowledge in risk analysis.', 'IT dept', 30000, '2022-04-14', 'pending'),
(110004, 'relationship manager', 1, ' A relationship manager works for a bank or financial institution and acts as the point of communication between members and the institution itself. Their main job duty includes maintaining customer loyalty by checking in with them by email or phone. They are also responsible for fostering relationships with new customers by helping them gain bank membership and create a checking or savings accountant. Relationship managers should have a bachelor\'s degree in communications, finance or business administration and should be excellent communicators.', 'Bachelor in business administration, marketing or a related field.\r\nThree or more years\' experience in customer service, sales or a related position.\r\nExcellent verbal and written communication skills.\r\nAbility to lead and work within a team.', 'IT dept', 30000, '2022-02-23', 'approved'),
(110005, 'financial advisor', 5, ' A financial advisor works as part of a financial institution to help clients determine their financial goals and the best means to achieve them. This entails trading for them in the stock markets, reviewing their financial history and providing them with advice for the best decisions they can make for their finances. Financial advisor candidates need to have at least a bachelor\'s degree in an area like economics, statistics, finance or business. They should also have a few years of experience in a finance-related role, like an investment specialist/banker or credit analyst.', '\r\nknowledge of economics and accounting for understanding financial markets and products. maths knowledge for creating financial plans. the ability to sell products and services. excellent verbal communication skills.', 'IT dept', 30000, '2022-03-09', 'pending'),
(110006, 'financial analyst', 5, 'A financial analyst is responsible for monitoring market trends across industries and using their expertise to guide businesses and clients on when, where and how to invest. Financial analysts typically work for major corporations, financial institutions, insurance companies and banks. To become a financial analyst, you should have at least a bachelor\'s degree in economics, finance or accounting. For senior positions, most employers prefer that you have a master\'s degree in a specialty area like statistics.', 'bachelor\'s degree specifically in a field related to finance, including finance and accounting, economics, statistics, analytics, business management, or mathematics.', 'IT dept', 30000, '2022-04-12', 'pending'),
(110007, 'internal auditor', 2, ' Internal auditors for banks have a responsibility to complete routine assessments of the bank\'s internal procedures, loan and spending habits, employment expenses and other risk management factors. Their main goal is to determine whether the bank complies with laws and regulations and if they are financially stable. Internal auditor candidates should have at least a bachelor\'s degree in management, accounting, business administration or finance. A master\'s degree may be preferred for more senior roles.', 'An entry-level internal auditor position generally requires at least a bachelor\'s degree, preferably in a business discipline such as accounting, finance, management, public administration or computer information systems. Some companies may seek out entry-level job candidates with degrees in engineering or other technical subjects related to the company\'s operations.\r\n\r\nSenior positions in the field typically require bachelor\'s degrees and substantial professional experience in internal auditing. While a graduate degree is not usually required for advancement in the field, a Master\'s in Business Administration (MBA) or another relevant subject can provide an important advantage in the job market, especially for leadership positions in internal audit departments.', 'IT dept', 30000, '2022-04-22', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `journal_items`
--

CREATE TABLE `journal_items` (
  `journal_id` int(30) NOT NULL,
  `account_id` int(30) NOT NULL,
  `group_id` int(30) NOT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journal_items`
--

INSERT INTO `journal_items` (`journal_id`, `account_id`, `group_id`, `amount`, `date_created`) VALUES
(35, 107, 1, 3004, '2022-04-26 22:57:44'),
(35, 1, 8, 3004, '2022-04-26 22:57:44'),
(36, 1002, 3, 3140, '2022-04-26 23:22:10'),
(36, 1, 8, 3140, '2022-04-26 23:22:10'),
(37, 1001, 3, 250, '2022-04-27 13:30:30'),
(37, 1, 8, 250, '2022-04-27 13:30:30');

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
-- Table structure for table `loan_payment`
--

CREATE TABLE `loan_payment` (
  `id` int(200) NOT NULL,
  `P_Amount` int(200) NOT NULL,
  `P_Penalty` int(200) NOT NULL,
  `P_Date` date NOT NULL,
  `A_Number` int(200) NOT NULL,
  `P_RemainingBalance` int(200) NOT NULL,
  `P_Type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_payment`
--

INSERT INTO `loan_payment` (`id`, `P_Amount`, `P_Penalty`, `P_Date`, `A_Number`, `P_RemainingBalance`, `P_Type`) VALUES
(1, 1000, 100, '2022-04-23', 18011424, 50000, 'Loan Payment');

-- --------------------------------------------------------

--
-- Table structure for table `logistic1files`
--

CREATE TABLE `logistic1files` (
  `id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `Body` text DEFAULT NULL,
  `preparedby` varchar(250) DEFAULT NULL,
  `urlpath` varchar(250) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `sec_dep` text DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logistic1files`
--

INSERT INTO `logistic1files` (`id`, `req_id`, `title`, `Body`, `preparedby`, `urlpath`, `date_created`, `sec_dep`, `date_from`, `date_to`, `status`) VALUES
(39, 4, ' Project Contract', 'fafaf', 'Admin', 'contract/CREDIT-MEMO.docx', '2022-05-09', 'LOGISTIC1', '2022-05-30', '2022-05-31', 'Downloaded'),
(40, 4, ' Project Contract', 'fafafaf', 'Staff', 'contract/BSIT_January_16_1Pm UPDATED KUNO.docx', '2022-05-11', 'LOGISTIC1', '2022-05-15', '2022-05-22', 'Downloaded'),
(41, 35535353, ' project contract', 'fafafaf', 'Admin', 'contract/CREDIT-MEMO.docx', '2022-05-14', 'LOGISTIC1', '2022-05-21', '2022-05-15', 'Downloaded');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_request`
--

CREATE TABLE `maintenance_request` (
  `id` int(11) NOT NULL,
  `requestor` varchar(250) DEFAULT NULL,
  `department` varchar(250) DEFAULT NULL,
  `name_of_equipment` varchar(250) DEFAULT NULL,
  `issue` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintenance_request`
--

INSERT INTO `maintenance_request` (`id`, `requestor`, `department`, `name_of_equipment`, `issue`, `status`, `date`) VALUES
(16, 'hgsshshshshh', '', '', '', '', '2022-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `manpower_request`
--

CREATE TABLE `manpower_request` (
  `request_id` int(11) NOT NULL,
  `employee_needed` int(11) NOT NULL,
  `qualification_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date_of_request` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manpower_request`
--

INSERT INTO `manpower_request` (`request_id`, `employee_needed`, `qualification_id`, `status`, `date_of_request`) VALUES
(1, 3, 1, 'pending', '2022-05-01');

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
(11002111100, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, '', 0, '', '', '2021-12-15 02:01:14'),
(11002111101, 50000, 'faf', 'faf', '', 'dexter', '', '', '', '', '', '', '', '', 0, '', 0, '', 0, '', '', '2021-12-15 02:02:24'),
(11002111102, 0, 'fffc', 'fffc', 'fffc', '', '', '', '', '', '', '', '', '', 0, '', 0, '', 0, '', '', '2021-12-30 14:07:23'),
(11002111103, 4535646, '3 tyrd', '3 tyrd', '3 tyrd', 'shaloyou', '', '', '', '', '', '', '', '', 0, '', 0, '', 0, '', '', '2021-12-30 14:08:27'),
(11002111104, 84195385767, '3 yeyh', '3 yeyh', '3 yeyh', 'kim', '', '', '', '', '', '', '', '', 0, '', 0, '', 0, '', '', '2021-12-30 14:10:17');

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
(1, 773441, '2021-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `ongoing_project_list`
--

CREATE TABLE `ongoing_project_list` (
  `id` int(11) NOT NULL,
  `prop_proj` varchar(255) NOT NULL,
  `proj_name` varchar(255) NOT NULL,
  `loc` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `proj_man` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongoing_project_list`
--

INSERT INTO `ongoing_project_list` (`id`, `prop_proj`, `proj_name`, `loc`, `cost`, `start_date`, `end_date`, `proj_man`) VALUES
(18, 'asd', 'asd', 'asd', 'asd', '2022-05-07', '2022-05-31', 'asdasd');

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
-- Table structure for table `pass_key`
--

CREATE TABLE `pass_key` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `pkey` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(25, 'e000001', 457, 3, 500, 300, 300, '2022-04-28'),
(27, '30330051', 457, 3, 300, 300, 300, '2022-05-19');

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
  `remark` varchar(1000) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performance_review`
--

INSERT INTO `performance_review` (`id`, `employee_id`, `date`, `rel_with_colleagues`, `problem_solving`, `decision_making`, `punctuality`, `attitude`, `leadership`, `communication`, `accuracy`, `work_ethics`, `productivity`, `time_management`, `collaboration_and_teamwork`, `average`, `remark`, `status`) VALUES
(18, 30330030, '2022-04-09', 91, 87, 98, 95, 93, 90, 89, 83, 88, 83, 97, 96, 90.8333, '', 'approved'),
(19, 30330028, '2022-01-12', 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, '', 'approved'),
(20, 30330042, '2022-02-02', 90, 78, 93, 89, 86, 86, 84, 87, 89, 90, 87, 76, 86.25, '', 'approved'),
(21, 30330044, '2022-03-02', 85, 78, 78, 78, 78, 78, 78, 89, 83, 81, 96, 71, 81.0833, '', 'approved'),
(22, 30330043, '2022-05-02', 54, 80, 67, 78, 83, 96, 93, 86, 93, 83, 84, 84, 81.75, '', 'approved'),
(23, 30330038, '2022-05-02', 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, '', 'approved'),
(24, 30330035, '2022-05-02', 30, 30, 33, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30.25, '', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `pos_id` int(11) NOT NULL,
  `pos_name` varchar(100) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`pos_id`, `pos_name`, `dept_id`) VALUES
(1, 'recruitment_staff', 1),
(2, 'applicant_managing_staff', 1),
(3, 'onboarding_staff', 1),
(4, 'performance_ monitoring_staff', 1),
(5, 'social_recognition_staff', 1),
(6, 'hr1_manager', 1),
(7, 'administrative_manager', 5),
(8, 'administrative_staff', 5),
(9, 'hr4_manager', 4),
(10, 'hr4_staff', 4),
(11, 'financials_manager', 10),
(12, 'collection_officer', 10),
(13, 'disbursement_officer', 10),
(14, 'bookeeper', 10),
(15, 'budget_officer', 10),
(20, 'core1_manager', 6),
(21, 'core1_staff', 6),
(22, 'core2_manager', 7),
(23, 'teller', 7),
(24, 'hr2_manager', 2),
(25, 'hr_officer', 2),
(26, 'training_officer', 2),
(27, 'logistics2_manager', 9),
(28, 'fleet_manager', 9),
(29, 'logistics_staff', 9),
(30, 'vendor_manager', 9),
(31, 'driver', 9),
(32, 'logistics_manager', 8),
(33, 'logistics_staff', 8),
(36, 'hr3_manager', 3),
(37, 'hr3_staff', 3),
(38, 'logistics2_auditor', 9);

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
(36, 110004, 'posted', 1);

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
  `Co_Amount` int(200) NOT NULL,
  `PRO_Date` date NOT NULL,
  `PRO_Supplier` varchar(255) NOT NULL,
  `PRO_City` varchar(255) NOT NULL,
  `PRO_Country` varchar(255) NOT NULL,
  `PRO_Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `procurment`
--

INSERT INTO `procurment` (`Co_Code`, `PRO_Requestor`, `PRO_Department`, `Co_Status`, `PRO_Desc`, `Co_Amount`, `PRO_Date`, `PRO_Supplier`, `PRO_City`, `PRO_Country`, `PRO_Address`) VALUES
(101, 'Elvira Barbosa', 'Logistics 2', 102, 'For purchase of new machines', 3000000, '2021-11-30', 'Hp links', 'Quezon city', 'Philippines', 'san ben calocas kaligayahan'),
(102, 'Critina Vargas', 'Logistics 2', 102, 'For purchase of land', 4000000, '2021-11-29', 'Camella', 'Calocan', 'Philippines', 'san ben calocas kaligayahan'),
(104, 'Allie Adams', 'Logistics 2', 102, 'For purchase of new machines', 3000000, '2022-01-11', 'hexa mech tools', 'Quezon city', 'Philippines', 'san bartolome, Q.C.'),
(105, 'Alex Abadi', 'Logistics 2', 102, 'For purchase of new machines', 3000000, '2022-01-12', 'Forward machines', 'Quezon city', 'Philippines', 'san bartolome, Q.C.'),
(106, 'Kara Mary', 'Logistics 2', 102, 'For purchase of new machines', 3000000, '2022-01-13', 'Vision tools', 'Calocan City', 'Philippines', 'Reparo, Caloocan City'),
(107, 'Rickiew Aliman', 'Logistics 2', 102, 'For purchase of new machines', 3004, '2022-01-14', 'belter tools', 'Valenzuela City', 'Philippines', 'Gen-T, Valenzuela City'),
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
  `Date_Created` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `Date_Created`, `status`) VALUES
(1, 'facemask', 'standard quality', '2022-01-10 10:49:35', 0),
(3, 'toothpaste', 'For fresh breathe', '2022-05-19 16:25:58', 0),
(4, 'bondpaper', 'long 2 boxes', '2022-05-19 16:29:01', 0);

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
(1, 'e000001', 'Casual', 'Regular', '2022-05-01'),
(2, 'e000002', 'Casual', 'Regular', '2005-01-23'),
(3, 'e000004', 'Casual', 'Regular', '2022-04-12'),
(4, 'e000003', 'Casual', 'Regular', '2022-04-28');

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
(57, 20220014),
(55, 20220018),
(44, 20220021),
(58, 20220028),
(54, 20220029),
(56, 20220032);

-- --------------------------------------------------------

--
-- Table structure for table `reimbursements`
--

CREATE TABLE `reimbursements` (
  `reimbursement_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_level` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reimbursement` varchar(100) NOT NULL,
  `reimbursement_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `accepted` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT 'blank.jpg',
  `remarks` varchar(255) NOT NULL DEFAULT 'No remarks'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reimbursements`
--

INSERT INTO `reimbursements` (`reimbursement_id`, `username`, `name`, `user_level`, `user_id`, `reimbursement`, `reimbursement_date`, `amount`, `status`, `accepted`, `picture`, `remarks`) VALUES
(5, 'sb18011168', 'Bardon Sharmine', 3, 32, 'I purchase an additional monitor for my workplace.', '2022-05-15', 3100, 'Accepted by Mamuyac Robert ', 1, '189084995Receipt-Form.jpg', 'No remarks');

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
  `Co_Country` varchar(200) NOT NULL,
  `Co_Amount` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reimbursment`
--

INSERT INTO `reimbursment` (`Co_Code`, `Co_Source`, `Co_Desc`, `Co_Date`, `Co_Status`, `Co_Purpose`, `Co_Supplier`, `Co_Address`, `Co_City`, `Co_Country`, `Co_Amount`) VALUES
(1001, 'HR3', 'maircor bituin', '2021-10-12', '102', 'for buying equipment', 'HP technologies', 'sanbenisa', 'Quezon city', 'philippines', 75000),
(1002, 'HR3', 'ian james barbosa', '2021-10-12', '102', 'for buying machines', 'intel core', 'caloocan city, brgy kaligayahan.', 'Caloocan city', 'philippines', 75000),
(1003, 'HR3', 'ellie sabinay', '2021-10-13', '102', 'for buying food', 'jollibee corp', 'caloocan city, brgy kaligayahan.', 'Caloocan city', 'philippines', 85000),
(1004, 'HR3', 'melanie cabradilla', '2021-10-13', '102', 'for buying food', 'mang inasa corp', 'caloocan city, brgy kaligayahan.', 'Caloocan city', 'philippines', 85000),
(1005, 'HR3', 'elvira Aliga', '2022-01-11', '102', 'for loptop', 'ASUS', 'novaliches, quezon city.', 'Quezon city', 'philippines', 55000),
(1006, 'HR3', 'Tin Pachoco', '2022-01-11', '102', 'for key board', 'FANTECH', 'cubao, quezon city.', 'Quezon city', 'philippines', 55000),
(1007, 'HR3', 'Theodore jhon valera', '2022-01-11', '102', 'for bondpaper', 'HARD COPY', 'sampaloc, manila city.', 'Manila city', 'philippines', 95000);

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
(22, 66676, 'Client', 'fafaf', 'fafaf', 'fafa', ' Memorandum Aggrement', 'CORE1', 'pending', '2022-05-09 22:07:02'),
(23, 434343, '', '', '', '', ' ', 'CORE1', 'Pending', '2022-05-09 22:15:48'),
(24, 5665, '', '', '', '', ' ', 'CORE1', 'Pending', '2022-05-09 22:19:22'),
(25, 666, '', '', '', '', ' ', 'CORE1', 'Pending', '2022-05-09 22:24:07'),
(26, 43343, 'project manager', 'dafaf', 'faf', 'faf', ' Project Contract', 'LOGISTIC1', 'Pending', '2022-05-09 22:34:17'),
(27, 4, 'project manager', 'a', 'a', 'a', ' Project Contract', 'LOGISTIC1', 'Pending', '2022-05-09 22:40:47'),
(28, 4, 'Project Manager', 'fffffffffff', 'fffffffff', 'faf', ' project contract', 'LOGISTIC1', 'Pending', '2022-05-09 22:44:00'),
(29, 54444, 'project manager', 'fafaffafa', 'fafa', 'fafaf', ' project contract', 'LOGISTIC1', 'Pending', '2022-05-11 23:52:03'),
(30, 55, 'Client', 'ffa', 'fafa', 'faf', ' Memorandum Aggrement', 'CORE1', 'Approve', '2022-05-13 21:25:44'),
(31, 35535353, 'project manager', 'fafafaf', 'afaf', 'fafaf', ' project contract', 'LOGISTIC1', 'Pending', '2022-05-14 20:49:15');

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

--
-- Dumping data for table `request_equipment`
--

INSERT INTO `request_equipment` (`id`, `equipment_approval_id`, `facility_id`, `lname`, `fname`, `mname`, `department`, `position`, `time_date_request`, `list_equipment_request`) VALUES
(10, 0, 0, 'ggagag', 'gagag', 'gagag', 'gaga', 'gaga', '2022-05-06 00:53:33', 'gagag');

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
  `date_start` varchar(250) DEFAULT NULL,
  `until` varchar(250) DEFAULT NULL,
  `purpose` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_facility`
--

INSERT INTO `request_facility` (`id`, `approval_number`, `lname`, `fname`, `mname`, `contact`, `email`, `department`, `position`, `event_type`, `facility_type`, `reservation_date`, `date_start`, `until`, `purpose`) VALUES
(35, 0, 'agaga', 'gag', 'gag', 0, 'gag', 'gag', '', '', '', '2021-12-16 00:14:58', '', '', ''),
(36, 5555, 'park', 'jimin', 'suga', 9777123244, 'shamtanpark@gmail.com', 'registrar', 'head', 'meeting', 'conference room', '2021-12-16 02:43:36', '8:00 am', '5:00 pm', 'tff'),
(38, 0, 'gabule', 'dexter', 'attres', 0, 'lilgabs08@gmail.com', '', '', '', '', '2022-04-06 17:04:45', '', '', ''),
(39, 0, 'DELA CRUZ', 'KIM', 'MAAT', 9352423007, '', 'HR DEPT.', 'MANAGER', '', '', '2022-04-06 17:06:11', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `resigned`
--

CREATE TABLE `resigned` (
  `rs_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `rs_reason` varchar(100) NOT NULL,
  `rs_date` varchar(100) NOT NULL,
  `rs_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resigned`
--

INSERT INTO `resigned` (`rs_id`, `employee_id`, `rs_reason`, `rs_date`, `rs_status`) VALUES
(4, 30330039, 'Professional development', '2022-04-16', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `rules_and_regulation`
--

CREATE TABLE `rules_and_regulation` (
  `id` int(11) NOT NULL,
  `ra_no` bigint(20) NOT NULL,
  `date` varchar(250) NOT NULL,
  `Description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rules_and_regulation`
--

INSERT INTO `rules_and_regulation` (`id`, `ra_no`, `date`, `Description`) VALUES
(12, 121, '2022-05-14', 'fafafaf');

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
(105, 'Debit'),
(106, 'Ongoing'),
(107, 'Awaiting');

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
-- Table structure for table `supplier_user`
--

CREATE TABLE `supplier_user` (
  `id` int(11) NOT NULL,
  `vendor_fname` varchar(150) NOT NULL,
  `vendor_mi` varchar(150) NOT NULL,
  `vendor_lname` varchar(150) NOT NULL,
  `vendor_email` varchar(150) NOT NULL,
  `vendor_cell` int(11) NOT NULL,
  `vendor_pass` varchar(150) NOT NULL,
  `vendor_bday` date NOT NULL,
  `vendor_gender` varchar(150) NOT NULL,
  `vendor_cstatus` varchar(150) NOT NULL,
  `vendor_religion` varchar(150) NOT NULL,
  `vendor_address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_user`
--

INSERT INTO `supplier_user` (`id`, `vendor_fname`, `vendor_mi`, `vendor_lname`, `vendor_email`, `vendor_cell`, `vendor_pass`, `vendor_bday`, `vendor_gender`, `vendor_cstatus`, `vendor_religion`, `vendor_address`) VALUES
(1, 'Kenneth', 'Mabansay', 'Ledde', 'leedskenneth12@gmail.com', 2147483647, 'Kledde0909-', '1999-07-25', 'Male', 'Single', 'Catholic', 'Caloocan City'),
(2, 'John Lester', 'Versoza', 'Villamor', 'lestervillamor025@gmail.com', 2147483647, 'Lester,.25', '2000-07-25', 'Male', 'Single', 'Catholic', 'Holy Spirit, Quezon City.');

-- --------------------------------------------------------

--
-- Table structure for table `tblleaves`
--

CREATE TABLE `tblleaves` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(110) NOT NULL,
  `FromDate` varchar(120) NOT NULL,
  `ToDate` varchar(120) NOT NULL,
  `Description` mediumtext NOT NULL,
  `PostingDate` date NOT NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `AdminRemarkDate` varchar(120) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `IsRead` int(1) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `emp_read` int(1) NOT NULL,
  `amount_of_days` int(50) NOT NULL,
  `remaining_days` int(50) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblleaves`
--

INSERT INTO `tblleaves` (`id`, `LeaveType`, `FromDate`, `ToDate`, `Description`, `PostingDate`, `AdminRemark`, `AdminRemarkDate`, `Status`, `IsRead`, `employee_id`, `emp_read`, `amount_of_days`, `remaining_days`) VALUES
(1, 'Vacation leave', '2021-12-15', '2021-12-19', 'I have to refresh myself, I am in a stressful scene of my life right now.', '2021-12-15', 'Okay', '2021-12-15 23:38:42 ', 1, 1, 30330030, 0, 5, 4);

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
  `UE_Country` varchar(200) NOT NULL,
  `Co_Amount` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uexpenses`
--

INSERT INTO `uexpenses` (`Co_Code`, `UE_Department`, `UE_Requestor`, `UE_date`, `UE_Desc`, `Co_Status`, `UE_Supplier`, `UE_Address`, `UE_City`, `UE_Country`, `Co_Amount`) VALUES
(1, 'Admin', 'Admin manager', '2021-12-03', 'for utilities and expenses', 102, 'Admin', 'Quirino Highway, Novaliches', 'Quezon City', 'Philippines', 18000),
(2, 'Admin', 'Admin manager', '2021-12-04', 'maintenance', 102, 'Admin', 'Quirino Highway, Novaliches', 'Quezon City', 'Philippines', 18200),
(3, 'Admin', 'Admin manager', '2021-12-07', 'Transportation', 102, 'Admin', 'Quirino Highway, Novaliches', 'Quezon City', 'Philippines', 18500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `Department` varchar(255) NOT NULL,
  `Position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employee_id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`, `Department`, `Position`) VALUES
(10, 30330042, 'Carrot Sai', 'Finance', 'ce8cef9b50a7f693620f4d1936ce047a63031039', 1, 'frzaya7v10.png', 1, '2022-05-03 22:40:59', 'Finance', 'Finance Manager'),
(12, 30330041, 'Mae Ann Caunca', 'User', '12dea96fec20593566ab75692c9949596833adc9', 2, '3gy5cpqg12.jpg', 1, '2022-05-03 11:44:06', 'Finance', 'Collection Officer'),
(14, 1, 'Alejandro martinez', 'SuperAdmin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'yk69bjdc14.png', 1, '2022-05-03 00:45:15', 'SuperAdmin', 'Administrator'),
(16, 30330039, 'ian james', 'Semaj', 'f90409b98ffb61424a01b4bb718aa602cebd5ee2', 2, 'no_image.jpg', 0, '0000-00-00 00:00:00', 'Finance', 'Disbursment officer'),
(17, 30330037, 'James Ian', 'Collection manager', '134096e12368b9bce038ccac61963716c01fa8ee', 1, 'no_image.jpg', 1, '0000-00-00 00:00:00', 'Finance', 'Finance Manager'),
(18, 30330038, 'eric cabrillos', 'HR1_applicantmanagement', '9b0713efca11ecb76c29cb3d0ac5b1f5525de815', 2, '', 1, '2022-04-30 21:39:58', 'HR1', 'Applicant Management'),
(19, 30330036, 'maria juana', 'HR1_newhired_onboard', '578a88c68edae58909dce352f1fdb63545eba399', 2, '', 1, '2022-04-13 21:53:57', 'HR1', 'New Hire Onboard'),
(20, 30330030, 'alvin vidal', 'HR1_performance_management', '475a5473e9d9149eebdba70f8bb90793385c63f8', 2, '', 1, '2022-04-12 22:12:08', 'HR1', 'Performance Management'),
(21, 30330028, 'aldrich ramos', 'HR1_social_recognition', 'd852d6bae02639a9e131204a96cdb7fc8e7bfe97', 2, '', 1, '2022-05-01 23:17:37', 'HR1', 'Social Recognition'),
(22, 30330029, 'Darryl Deleon', 'HR1_manager', '861e497cf9e085e40a8e6019227622325d2b1dbd', 1, 'yvxmdnlq22.jpg', 1, '2022-05-17 15:02:39', 'HR1', 'HR1 Manager'),
(23, 30330035, 'benjie', 'benjie_Recruitment', 'da28e4f46f84bfe2af6063633cec5381c2e59b36', 2, 'no_image.jpg', 1, '2022-04-30 21:37:49', 'HR1', 'Recruitment'),
(24, 30330043, 'dexter', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'bikufw0v24.jpg', 1, '2022-05-16 20:27:36', 'administrative', 'administrative manager'),
(25, 30330044, 'julius', 'adminstaff', '89cb671fc1307d288bde416dc5bf6de28be8c58d', 2, 'no_image.jpg', 1, '2022-04-30 22:32:53', 'administrative', 'administrative staff'),
(26, 30330046, 'julius', 'HR4_admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'no_image.jpg', 1, '2022-05-29 13:28:10', 'HR4', 'HR4 Manager'),
(30, 30330048, 'cassey', 'core1admin', 'befec8e9b702b405874234f4302edb490d8b3896', 1, 'no_image.jpg', 1, '2022-05-17 14:56:43', 'core1', 'core1 manager'),
(31, 30330049, 'dexter', 'core2admin', '236523049e73125e47db32656e78279cb22272e3', 1, 'no_image.jpg', 1, '2022-05-06 03:37:41', 'core2', 'core2 admin'),
(32, 30330050, 'bless lopez', 'adminlogistic1', '178e4d75b6dace0e3ce9bdc72fac98d642dd0f92', 1, 'no_image.jpg', 1, '2022-05-15 00:34:24', 'logistic1', 'logistic1 manager'),
(33, 30330051, 'janina mamaril', 'logistic2admin', 'a98e4a5eb71069c6d73969aa38800fba2617d933', 1, 'no_image.jpg', 1, '2022-06-21 18:34:12', 'logistic2', 'logistic_manager'),
(34, 30330074, 'Alaiza M. Ledde', 'alaizadriver', '30d7bb8990c20f2c87c7b9da90f52cca05f63aab', 3, 'no_image.jpg', 1, '2022-06-07 15:53:38', 'logistic2', 'Driver'),
(35, 30330073, 'Lovely T. Ledde', 'lovelyauditor', '31149fa71329f67a0f841b281c077a3e8adb774a', 4, 'no_image.jpg', 1, '2022-06-22 00:36:50', 'logistic2', 'auditor');

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
  `Phone` varchar(11) NOT NULL,
  `users_id` int(11) UNSIGNED DEFAULT NULL,
  `statuss` int(1) NOT NULL,
  `category` varchar(20) NOT NULL,
  `path_url` varchar(350) NOT NULL,
  `bidding_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `product_id`, `Name`, `Address`, `Company`, `Email`, `item_description`, `Offer`, `Phone`, `users_id`, `statuss`, `category`, `path_url`, `bidding_status`) VALUES
(62, 4, 'Kenneth Ledde', 'Caloocan City', 'Kenaizacess', 'kenaizacess@gmail.com', 'thick and high quality paper', '₱900/box', '09994123682', 10, 0, '1', '', 0),
(90, 1, 'Alaiza Mabansay', 'Quezon city', 'Maskforall', 'masks11@gmail.com', 'High quality and durable masks', '₱50/box', '09481367352', 33, 0, '1', 'uploads/BANKING-AND-FINANCE-LOGISTICS-II.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_request_tbl`
--

CREATE TABLE `vendor_request_tbl` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `req_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_of_request` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_request_tbl`
--

INSERT INTO `vendor_request_tbl` (`id`, `fname`, `mname`, `lname`, `position`, `department`, `req_type`, `status`, `date_of_request`) VALUES
(1, 'Vhon Lester', 'Bunao', 'Partosa', 'HR1_Manager', 'LOGISTIC1', 'Vendor Request', 'Pending', '2022-05-19 19:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `visitorpolicy`
--

CREATE TABLE `visitorpolicy` (
  `id` int(11) NOT NULL,
  `policy` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitorpolicy`
--

INSERT INTO `visitorpolicy` (`id`, `policy`, `description`, `datecreated`) VALUES
(1, 'Visits by nonemployees', 'State such visits are not allowed unless authorized by the company.', '2022-04-22 21:46:45'),
(5, 'Authorization procedures', 'How does a visitor obtain authorization? Who within the company has the power to authorize visitors?', '2022-04-22 22:57:07'),
(6, 'Off-limit areas', ' Identify any areas that are off limits to all visitors (e.g., confidential records, equipment, computer network).', '2022-04-22 23:00:31'),
(7, 'Identification of visitors', 'Must visitors sign in and out? Must they present a photo identification? What type of photo identification? Must visitors wear identification badges or passes? Must they be escorted by a supervisor or company official?', '2022-04-22 23:00:48'),
(8, 'Heightened requirements.', 'Are there times when you need to increase restrictions (e.g., after hours, while key operations or processes are in progress, during holidays and weekends, after terrorist alerts)?', '2022-04-22 23:01:11'),
(9, 'Visits by employees during nonworking hours', 'Some companies restrict regular employees’ access to the plant or office during off-hours. What procedures should be followed by an employee who has a legitimate reason to visit the premises after work hours?', '2022-04-22 23:06:50'),
(10, 'Visits by employees on leave', 'Employees who are on leave may also stop by. Address how these individuals should be treated. For example, can the proud parent on a parental leave bring the newborn to the office for co-workers to see? What access is permitted for employees who are ', '2022-04-22 23:07:12'),
(11, 'Former employees', 'How are former employees treated? Are they treated just like nonemployees?', '2022-04-22 23:07:44'),
(12, 'Vendors, suppliers, and contractors. ', 'Are vendors and others required to sign-in? Is there a color-coded badge? Are they escorted everywhere? Is their access limited?', '2022-04-22 23:08:10'),
(13, 'Temporary employees', 'Are temporary employees treated like regular employees or like contractors?', '2022-04-22 23:08:29'),
(14, 'Visits by friends and family members. ', 'Some employers consider friends and family members “outsiders” and restrict their visits accordingly; others feel that with the supervisor’s authorization, family members in particular should be allowed to visit on occasion to see where the employee ', '2022-04-22 23:09:18'),
(15, 'Recording devices', ' May visitors bring into your building recording devices, such as cameras, camera phones, etc.?', '2022-04-22 23:32:35'),
(18, 'Supervisors’ responsibilities.', 'Should supervisors challenge unescorted strangers who aren’t wearing the proper identification? Should they direct or escort unauthorized visitors to the front office or out of the building? Should they contact Security or escort someone in Human Res', '2022-04-23 00:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_registration`
--

CREATE TABLE `visitor_registration` (
  `id` int(11) NOT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `middle_name` varchar(250) DEFAULT NULL,
  `department` varchar(250) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `contact` bigint(11) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `visitor_type` varchar(250) DEFAULT NULL,
  `visitor_purpose` varchar(250) DEFAULT NULL,
  `time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor_registration`
--

INSERT INTO `visitor_registration` (`id`, `last_name`, `first_name`, `middle_name`, `department`, `address`, `email`, `contact`, `gender`, `visitor_type`, `visitor_purpose`, `time`) VALUES
(1000135, 'fafgag', 'gagag', 'gagag', 'gagag', 'gaga', ' lilgabs08@gmail.com', 9098374504, 'fafaf', 'RIDER', 'fafa', '2022-05-15 02:44:16');

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
  `v_avail` int(3) NOT NULL,
  `fleetimg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `v_info`
--

INSERT INTO `v_info` (`fleetid`, `v_category`, `v_model`, `v_year`, `v_color`, `v_regnum`, `v_serialnum`, `v_capacity`, `v_datepur`, `v_manu`, `v_enginetype`, `v_loc`, `v_fueltype`, `v_fuelcap`, `v_license`, `v_condition`, `v_avail`, `fleetimg`) VALUES
(12, 2, 'Starex', 2020, 'gold', '4324243234', '756454', 8, '2022-06-02', 'Hyundai', 'Automatic', 'Quezon city', 'Diesel', '100L', '', 'Excellent', 0, 'starex-gold.jpg'),
(13, 1, 'Civic', 2018, 'silver', '8592345', '53424', 4, '2022-06-01', 'Civic', 'Manual', 'Baguio city', 'Diesel', '80L', '', 'Excellent', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `v_res`
--

CREATE TABLE `v_res` (
  `res_id` int(20) NOT NULL,
  `fleetid` int(20) NOT NULL,
  `emp_id` int(20) NOT NULL,
  `driver` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `location` text NOT NULL,
  `Remarks` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `v_res`
--

INSERT INTO `v_res` (`res_id`, `fleetid`, `emp_id`, `driver`, `from_date`, `to_date`, `location`, `Remarks`) VALUES
(6, 8, 33, 30330074, '2022-06-08', '2022-06-09', 'caloocan', '1st'),
(7, 12, 33, 30330074, '2022-06-15', '2022-06-16', 'Quezon city branch', 'I have some documents and fragile items'),
(8, 12, 33, 30330074, '2022-06-18', '2022-06-19', 'Caloocan North Branch', 'OJT transportation total of 4 people');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_list`
--
ALTER TABLE `account_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_verification`
--
ALTER TABLE `account_verification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`applicant_id`);

--
-- Indexes for table `am`
--
ALTER TABLE `am`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `applicant_documents`
--
ALTER TABLE `applicant_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_appli` (`applicant_id`);

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
-- Indexes for table `archive_visitor_registration`
--
ALTER TABLE `archive_visitor_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`Co_Code`);

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`preparedby`) USING BTREE;

--
-- Indexes for table `auditor_done`
--
ALTER TABLE `auditor_done`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_auditor` (`auditor`);

--
-- Indexes for table `auditor_tasks`
--
ALTER TABLE `auditor_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_task`
--
ALTER TABLE `audit_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `available_job`
--
ALTER TABLE `available_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_job_id` (`job_id`);

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
-- Indexes for table `change_pass_request`
--
ALTER TABLE `change_pass_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_em` (`employee_id`);

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
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `com_announcement`
--
ALTER TABLE `com_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `contractor_form`
--
ALTER TABLE `contractor_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_signing`
--
ALTER TABLE `contract_signing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_employees` (`employee_id`);

--
-- Indexes for table `core1files`
--
ALTER TABLE `core1files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_expenses`
--
ALTER TABLE `department_expenses`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `docu_tracking`
--
ALTER TABLE `docu_tracking`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `employee_information_core_human`
--
ALTER TABLE `employee_information_core_human`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_contract_req`
--
ALTER TABLE `emp_contract_req`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_empcon` (`employee_id`);

--
-- Indexes for table `ended_project_list`
--
ALTER TABLE `ended_project_list`
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
-- Indexes for table `facility_status`
--
ALTER TABLE `facility_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_interview`
--
ALTER TABLE `final_interview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_applicant_id` (`applicant_id`);

--
-- Indexes for table `general_journal`
--
ALTER TABLE `general_journal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_list`
--
ALTER TABLE `group_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr1files`
--
ALTER TABLE `hr1files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_tb`
--
ALTER TABLE `image_tb`
  ADD PRIMARY KEY (`imageid`);

--
-- Indexes for table `income_statement`
--
ALTER TABLE `income_statement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_income_type` (`Type`);

--
-- Indexes for table `initial_interview`
--
ALTER TABLE `initial_interview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_applicant` (`applicant_id`);

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
-- Indexes for table `job_history`
--
ALTER TABLE `job_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_job_history` (`applicant_id`);

--
-- Indexes for table `job_qualifications`
--
ALTER TABLE `job_qualifications`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `loan_payment`
--
ALTER TABLE `loan_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logistic1files`
--
ALTER TABLE `logistic1files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_request`
--
ALTER TABLE `maintenance_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manpower_request`
--
ALTER TABLE `manpower_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `FK_quali` (`qualification_id`);

--
-- Indexes for table `mortgages`
--
ALTER TABLE `mortgages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `ongoing_project_list`
--
ALTER TABLE `ongoing_project_list`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pass_key`
--
ALTER TABLE `pass_key`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `performance_review`
--
ALTER TABLE `performance_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_performance` (`employee_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`pos_id`),
  ADD KEY `FK_dept` (`dept_id`);

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
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

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
-- Indexes for table `qualified_applicants`
--
ALTER TABLE `qualified_applicants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qualified_applicants_ibfk_1` (`applicant_id`);

--
-- Indexes for table `reimbursements`
--
ALTER TABLE `reimbursements`
  ADD PRIMARY KEY (`reimbursement_id`);

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
-- Indexes for table `resigned`
--
ALTER TABLE `resigned`
  ADD PRIMARY KEY (`rs_id`),
  ADD KEY `FK_resign` (`employee_id`);

--
-- Indexes for table `rules_and_regulation`
--
ALTER TABLE `rules_and_regulation`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `student_loan`
--
ALTER TABLE `student_loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_user`
--
ALTER TABLE `supplier_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblleaves`
--
ALTER TABLE `tblleaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_empl` (`employee_id`);

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
  ADD KEY `user_level` (`user_level`),
  ADD KEY `FK_empl` (`employee_id`);

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
-- Indexes for table `visitorpolicy`
--
ALTER TABLE `visitorpolicy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor_registration`
--
ALTER TABLE `visitor_registration`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`fleetid`);

--
-- Indexes for table `v_res`
--
ALTER TABLE `v_res`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `fleetid` (`fleetid`),
  ADD KEY `id` (`emp_id`),
  ADD KEY `v_driver_fk` (`driver`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_list`
--
ALTER TABLE `account_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `account_verification`
--
ALTER TABLE `account_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `am`
--
ALTER TABLE `am`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20220038;

--
-- AUTO_INCREMENT for table `applicant_documents`
--
ALTER TABLE `applicant_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `appreciation_awards`
--
ALTER TABLE `appreciation_awards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `archive_visitor_registration`
--
ALTER TABLE `archive_visitor_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000129;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `Co_Code` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `auditor_done`
--
ALTER TABLE `auditor_done`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auditor_tasks`
--
ALTER TABLE `auditor_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audit_task`
--
ALTER TABLE `audit_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `available_job`
--
ALTER TABLE `available_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blacklist_person`
--
ALTER TABLE `blacklist_person`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT for table `budgetreleasing`
--
ALTER TABLE `budgetreleasing`
  MODIFY `P_ID` int(200) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT for table `car_loans`
--
ALTER TABLE `car_loans`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18010547;

--
-- AUTO_INCREMENT for table `change_pass_request`
--
ALTER TABLE `change_pass_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `Co_Code` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `collection_transactions`
--
ALTER TABLE `collection_transactions`
  MODIFY `LT_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `com_announcement`
--
ALTER TABLE `com_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contractor_form`
--
ALTER TABLE `contractor_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contract_signing`
--
ALTER TABLE `contract_signing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `core1files`
--
ALTER TABLE `core1files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `department_expenses`
--
ALTER TABLE `department_expenses`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `deployed_employees`
--
ALTER TABLE `deployed_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deployment`
--
ALTER TABLE `deployment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `docu_tracking`
--
ALTER TABLE `docu_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `education_background`
--
ALTER TABLE `education_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30330075;

--
-- AUTO_INCREMENT for table `employee_documents`
--
ALTER TABLE `employee_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- AUTO_INCREMENT for table `ended_project_list`
--
ALTER TABLE `ended_project_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `Id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
-- AUTO_INCREMENT for table `facility_status`
--
ALTER TABLE `facility_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `final_interview`
--
ALTER TABLE `final_interview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `general_journal`
--
ALTER TABLE `general_journal`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `group_list`
--
ALTER TABLE `group_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hr1files`
--
ALTER TABLE `hr1files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `image_tb`
--
ALTER TABLE `image_tb`
  MODIFY `imageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `income_statement`
--
ALTER TABLE `income_statement`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `initial_interview`
--
ALTER TABLE `initial_interview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobplan`
--
ALTER TABLE `jobplan`
  MODIFY `jp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `job_history`
--
ALTER TABLE `job_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_qualifications`
--
ALTER TABLE `job_qualifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
-- AUTO_INCREMENT for table `loan_payment`
--
ALTER TABLE `loan_payment`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logistic1files`
--
ALTER TABLE `logistic1files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `maintenance_request`
--
ALTER TABLE `maintenance_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `manpower_request`
--
ALTER TABLE `manpower_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mortgages`
--
ALTER TABLE `mortgages`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11002111105;

--
-- AUTO_INCREMENT for table `new_hires`
--
ALTER TABLE `new_hires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `obudget`
--
ALTER TABLE `obudget`
  MODIFY `Id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ongoing_project_list`
--
ALTER TABLE `ongoing_project_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orientation`
--
ALTER TABLE `orientation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `passed_applicant`
--
ALTER TABLE `passed_applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pass_key`
--
ALTER TABLE `pass_key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `performance_review`
--
ALTER TABLE `performance_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `posted_jobs`
--
ALTER TABLE `posted_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `procurment`
--
ALTER TABLE `procurment`
  MODIFY `Co_Code` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `promoted`
--
ALTER TABLE `promoted`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `reimbursment`
--
ALTER TABLE `reimbursment`
  MODIFY `Co_Code` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT for table `request_contract`
--
ALTER TABLE `request_contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `request_equipment`
--
ALTER TABLE `request_equipment`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `request_facility`
--
ALTER TABLE `request_facility`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `resigned`
--
ALTER TABLE `resigned`
  MODIFY `rs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rules_and_regulation`
--
ALTER TABLE `rules_and_regulation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `Status_Code` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `student_loan`
--
ALTER TABLE `student_loan`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `supplier_user`
--
ALTER TABLE `supplier_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblleaves`
--
ALTER TABLE `tblleaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `time_and_attendance`
--
ALTER TABLE `time_and_attendance`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `training_management`
--
ALTER TABLE `training_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `visitorpolicy`
--
ALTER TABLE `visitorpolicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `visitor_registration`
--
ALTER TABLE `visitor_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000136;

--
-- AUTO_INCREMENT for table `v_info`
--
ALTER TABLE `v_info`
  MODIFY `fleetid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `v_res`
--
ALTER TABLE `v_res`
  MODIFY `res_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_verification`
--
ALTER TABLE `account_verification`
  ADD CONSTRAINT `account_verification_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applicant_documents`
--
ALTER TABLE `applicant_documents`
  ADD CONSTRAINT `FK_appli` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `FK_applications` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_jobORDER` FOREIGN KEY (`job_id`) REFERENCES `posted_jobs` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auditor_done`
--
ALTER TABLE `auditor_done`
  ADD CONSTRAINT `FK_auditor` FOREIGN KEY (`auditor`) REFERENCES `employees` (`employee_id`);

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
-- Constraints for table `change_pass_request`
--
ALTER TABLE `change_pass_request`
  ADD CONSTRAINT `FK_em` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

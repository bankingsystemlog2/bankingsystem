/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.24-MariaDB : Database - bank
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bank` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `bank`;

/*Table structure for table `account_list` */

DROP TABLE IF EXISTS `account_list`;

CREATE TABLE `account_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;

/*Data for the table `account_list` */

insert  into `account_list`(`id`,`name`,`description`,`status`,`delete_flag`,`date_created`,`date_updated`) values 
(1,'Cash','Cash',1,0,'2022-02-01 10:09:26',NULL),
(2,'Petty Cash','Petty Cash',1,0,'2022-02-01 10:09:40',NULL),
(3,'Cash Equivalents','Cash Equivalents',1,0,'2022-02-01 10:09:56',NULL),
(4,'Accounts Receivable','Accounts Receivable',1,0,'2022-02-01 10:10:22',NULL),
(5,'Interest Receivable','Interest Receivable',1,0,'2022-02-01 10:10:57',NULL),
(6,'Office Supplies','Office Supplies',1,0,'2022-02-01 10:11:13',NULL),
(7,'Accounts Payable','Accounts Payable',1,0,'2022-02-01 10:11:55',NULL),
(8,'Insurance Payable','Insurance Payable',1,0,'2022-02-01 10:12:07',NULL),
(9,'Interest Payable','Interest Payable',1,0,'2022-02-01 10:12:20',NULL),
(10,'Legal Fees Payable','Legal Fees Payable',1,0,'2022-02-01 10:12:35',NULL),
(11,'Office Salaries Payable','Office Salaries Payable',1,0,'2022-02-01 10:12:51',NULL),
(12,'Salaries Payable','Salaries Payable',1,0,'2022-02-01 10:13:03',NULL),
(13,'Wages Payable','Wages Payable',1,0,'2022-02-01 10:13:24',NULL);

/*Table structure for table `budgetreleasing` */

DROP TABLE IF EXISTS `budgetreleasing`;

CREATE TABLE `budgetreleasing` (
  `P_ID` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `P_Code` int(200) NOT NULL,
  `P_Department` varchar(200) NOT NULL,
  `P_Requestor` varchar(200) NOT NULL,
  `P_Purpose` varchar(200) NOT NULL,
  `P_Amount` int(200) NOT NULL,
  `P_Date` date NOT NULL,
  `P_Tablename` varchar(200) NOT NULL,
  `P_Status` int(200) NOT NULL,
  PRIMARY KEY (`P_ID`),
  KEY `FK_budgetreleasing_s` (`P_Status`),
  KEY `FK_procurmentreleasing` (`P_Code`),
  CONSTRAINT `FK_budgetreleasing_s` FOREIGN KEY (`P_Status`) REFERENCES `status` (`Status_Code`)
) ENGINE=InnoDB AUTO_INCREMENT=274 DEFAULT CHARSET=utf8mb4;

/*Data for the table `budgetreleasing` */

insert  into `budgetreleasing`(`P_ID`,`P_Code`,`P_Department`,`P_Requestor`,`P_Purpose`,`P_Amount`,`P_Date`,`P_Tablename`,`P_Status`) values 
(269,1001,'HR3','maircor bituin','for buying equipment',250,'2021-10-12','reimbursment',104),
(270,1002,'HR3','ian james barbosa','for buying machines',3140,'2021-10-12','reimbursment',101),
(271,101,'Logistics 2','Elvira Barbosa','For purchase of new machines',3000000,'2021-11-30','procurment',101),
(272,101,'Core 1','ian james barbosa','This Record is a paid through agreed Contract',2340,'2021-12-11','',105),
(273,102,'Logistics 2','Critina Vargas','For purchase of land',4000000,'2021-11-29','procurment',101);

/*Table structure for table `collection` */

DROP TABLE IF EXISTS `collection`;

CREATE TABLE `collection` (
  `Co_Code` int(100) NOT NULL AUTO_INCREMENT,
  `LS_Account_name` varchar(200) NOT NULL,
  `A_Number` int(100) NOT NULL,
  `Co_Status` int(100) NOT NULL,
  `LS_Date` date NOT NULL,
  `LS_Address` varchar(200) NOT NULL,
  `LS_City` varchar(200) NOT NULL,
  `LS_Country` varchar(200) NOT NULL,
  `LS_Desc` varchar(255) NOT NULL,
  `LS_Department` varchar(200) NOT NULL,
  `LS_Type` varchar(200) NOT NULL,
  PRIMARY KEY (`Co_Code`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4;

/*Data for the table `collection` */

insert  into `collection`(`Co_Code`,`LS_Account_name`,`A_Number`,`Co_Status`,`LS_Date`,`LS_Address`,`LS_City`,`LS_Country`,`LS_Desc`,`LS_Department`,`LS_Type`) values 
(101,'ian james barbosa',18011424,105,'2021-12-11','Sanbenisa Garden villas','Quezon city','Philippines','This Record is a paid through agreed Contract','Core 1','Loans'),
(103,'Ellie Barbosa',10999212,102,'2021-12-11','Sanbenisa Garden villas','Quezon City','Philippines','This Record is a paid through agreed Contract','Core 1','Loans'),
(104,'Cristy Vargas',18013999,102,'2022-01-04','Cloocan kaligayahan villas','Quezon City','Philippines','This Record is a record of deposit by the user','Core 1','Deposits'),
(105,'Thedore jhon',16052100,102,'2022-01-04','Pasig uranbo villas','Pasig City','Philippines','This Record is a record of deposit by the user','Core 1','Deposits'),
(106,'Andrew Artis',16013231,102,'2022-01-12','Bagong Silang, caloocan City','Calocan City','Philippines','This Record is a record of deposit by the user','Core 1','Deposits'),
(107,'Will Baylie',18202542,102,'2022-01-13','Camarin, Caloocan City','Calocan City','Philippines','This Record is a record of deposit by the user','Core 1','Loans'),
(108,'Aron Legaspi',18014278,102,'2022-01-14','Lagro, Quezon City','Quezon City','Philippines','This Record is a record of deposit by the user','Core 1','Deposits'),
(109,'Berry Jhon',16010051,102,'2022-01-15','North Fairview, Quezon City','Quezon City','Philippines','This Record is a record of deposit by the user','Core 1','Loans'),
(110,'Cecille Alex',17012232,102,'2022-01-16','Novaliches, Quezon City','Quezon City','Philippines','This Record is a record of deposit by the user','Core 1','Deposits'),
(111,'Eva Chavez',12316737,102,'2022-01-12','Zabarte road, Caloocan City','Calocan City','Philippines','This Record is a record of deposit by the user','Core 1','Loans'),
(112,'Frits Howard',18956875,102,'2022-01-12','Liano, Caloocan','Calocan City','Philippines','This Record is a record of deposit by the user','Core 1','Deposits'),
(113,'Edward Cruz',27326143,102,'2022-01-12','11th avenue, caloocan City','Calocan City','Philippines','This Record is a record of deposit by the user','Core 1','Loans'),
(114,'Stephen curry',41120130,102,'2022-01-20','Talisayan, Caloocan City','Calocan City','Philippines','This Record is a record of deposit by the user','Core 1','Loans'),
(115,'Daniel Daviz',59067090,102,'2022-01-21','tondo, manila','Manila','Philippines','This Record is a record of deposit by the user','Core 1','Deposits'),
(116,'James Thomas',12837248,102,'2022-01-22','alfonso, tondo, manila','Manila','Philippines','This Record is a record of deposit by the user','Core 1','Loans');

/*Table structure for table `collection_transactions` */

DROP TABLE IF EXISTS `collection_transactions`;

CREATE TABLE `collection_transactions` (
  `LT_id` int(200) NOT NULL AUTO_INCREMENT,
  `LT_Recieved` int(200) NOT NULL,
  `LT_Charges` int(200) NOT NULL,
  `LT_date` date NOT NULL,
  `A_Number` int(200) NOT NULL,
  `LT_Type` varchar(200) NOT NULL,
  PRIMARY KEY (`LT_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

/*Data for the table `collection_transactions` */

insert  into `collection_transactions`(`LT_id`,`LT_Recieved`,`LT_Charges`,`LT_date`,`A_Number`,`LT_Type`) values 
(1,1000,70,'2021-04-05',18011424,'Loan Payment'),
(2,1000,60,'2021-05-05',18011424,'Loan Payment'),
(3,200,10,'2021-06-05',18011424,'Loan Payment'),
(4,2000,40,'2021-06-15',10999212,'Loan Payment'),
(5,2000,40,'2021-07-15',10999212,'Loan Payment'),
(6,2000,40,'2021-08-15',10999212,'Loan Payment'),
(7,3000,50,'2021-09-15',10999212,'Loan Payment'),
(8,500000,20,'2021-12-13',18013999,'deposit'),
(9,100000,20,'2021-12-14',16052100,'deposit'),
(10,80000,20,'2021-12-15',16013231,'deposit'),
(11,95000,20,'2021-12-18',18014278,'deposit'),
(12,8500,40,'2021-12-19',16010051,'Loan Payment'),
(13,100000,20,'2021-12-21',17012232,'deposit'),
(14,4000,50,'2021-12-22',12316737,'Loan Payment'),
(15,70000,20,'2021-12-23',18956875,'deposit'),
(16,1000,30,'2021-12-26',27326143,'Loan Payment'),
(17,2500,40,'2021-12-27',41120130,'Loan Payment'),
(18,15000,20,'2021-12-29',59067090,'deposit'),
(19,4000,50,'2022-01-02',12837248,'Loan Payment'),
(21,3000,40,'2022-01-03',18202542,'Loan Payment');

/*Table structure for table `expenses` */

DROP TABLE IF EXISTS `expenses`;

CREATE TABLE `expenses` (
  `Id` int(200) NOT NULL AUTO_INCREMENT,
  `Expenses` int(200) NOT NULL,
  `Date` date NOT NULL,
  `Collection` int(200) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4;

/*Data for the table `expenses` */

insert  into `expenses`(`Id`,`Expenses`,`Date`,`Collection`) values 
(29,0,'2021-12-12',0),
(73,0,'2022-01-06',2340),
(74,0,'2022-01-06',5020),
(82,0,'2022-01-10',2340),
(83,0,'2022-01-10',10020),
(84,0,'2022-01-11',9170),
(85,2400,'2022-01-11',0),
(86,3140,'2022-01-11',0),
(87,0,'2022-01-21',2340),
(88,0,'2022-01-21',500020),
(89,250,'2022-01-21',0),
(90,0,'2022-03-11',2340),
(91,0,'2022-03-11',500020),
(92,0,'2022-03-11',100020),
(93,0,'2022-03-11',2340),
(94,0,'2022-03-11',9170),
(95,0,'2022-03-11',500020),
(96,0,'2022-03-12',2340),
(97,0,'2022-03-15',2340),
(98,0,'2022-03-27',2340),
(99,0,'2022-04-01',3040),
(100,250,'2022-04-01',0),
(101,0,'2022-04-07',2340),
(102,250,'2022-04-07',0);

/*Table structure for table `general_journal` */

DROP TABLE IF EXISTS `general_journal`;

CREATE TABLE `general_journal` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `journal_date` date NOT NULL,
  `description` text NOT NULL,
  `user_id` int(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `general_journal` */

insert  into `general_journal`(`id`,`code`,`journal_date`,`description`,`user_id`,`date_created`,`date_updated`) values 
(3,'202202-00001','2022-02-01','Capital',1,'2022-02-01 14:08:50','0000-00-00 00:00:00'),
(4,'202202-00002','2022-02-01','Sample',1,'2022-02-01 15:55:46','0000-00-00 00:00:00'),
(5,'202202-00003','2022-02-01','Sample 102',1,'2022-02-01 15:59:34','0000-00-00 00:00:00'),
(7,'202204-00002','2022-04-01','purchase of new machines',1,'2022-04-01 14:24:02','0000-00-00 00:00:00'),
(10,'202204-00005','2022-04-01','Purchase a new machine',1,'2022-04-01 15:23:16','0000-00-00 00:00:00'),
(11,'202204-00006','2022-04-01','water bill',1,'2022-04-01 15:25:51','0000-00-00 00:00:00'),
(12,'202204-00007','2022-04-01','Purchase a machine',1,'2022-04-01 15:29:37','0000-00-00 00:00:00');

/*Table structure for table `group_list` */

DROP TABLE IF EXISTS `group_list`;

CREATE TABLE `group_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Debit, 2= Credit',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1= Active',
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = No, 1 = Yes ',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `group_list` */

insert  into `group_list`(`id`,`name`,`description`,`type`,`status`,`delete_flag`,`date_created`,`date_updated`) values 
(1,'Assets','The cash, inventory, and other resources you owned.',1,1,0,'2022-02-01 09:56:35','2022-02-01 09:56:58'),
(2,'Revenue','Cash coming into your business through sales and other types of payments',2,1,0,'2022-02-01 09:57:45',NULL),
(3,'Expenses','The amount you’re spending on services and other items, like payroll, utility bills, and fees for contractors.',1,1,0,'2022-02-01 09:58:09','2022-02-01 09:59:13'),
(4,'Liabilities','The money you still owe on loans, debts, and other obligations.',2,1,0,'2022-02-01 09:58:34',NULL),
(5,'Equity','How much is remaining after you subtract liabilities from assets.',2,1,0,'2022-02-01 09:59:05',NULL),
(6,'Dividend','Form of income that shareholders of corporations receive for each share of stock that they hold.',1,1,0,'2022-02-01 10:00:13',NULL),
(7,'Sample101','Sample',1,0,1,'2022-02-01 10:01:35','2022-02-01 10:03:28'),
(8,'Cash','paid in cash',2,1,0,'2022-04-01 15:05:20',NULL);

/*Table structure for table `journal_items` */

DROP TABLE IF EXISTS `journal_items`;

CREATE TABLE `journal_items` (
  `journal_id` int(30) NOT NULL,
  `account_id` int(30) NOT NULL,
  `group_id` int(30) NOT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `journal_items` */

insert  into `journal_items`(`journal_id`,`account_id`,`group_id`,`amount`,`date_created`) values 
(3,1,1,15000,'2022-02-01 14:52:56'),
(3,14,5,15000,'2022-02-01 14:52:56'),
(4,42,3,5000,'2022-02-01 15:55:46'),
(4,11,4,5000,'2022-02-01 15:55:46'),
(5,31,2,5000,'2022-02-01 15:59:34'),
(5,31,2,3000,'2022-02-01 15:59:34'),
(5,4,1,8000,'2022-02-01 15:59:34');

/*Table structure for table `obudget` */

DROP TABLE IF EXISTS `obudget`;

CREATE TABLE `obudget` (
  `Id` int(200) NOT NULL AUTO_INCREMENT,
  `Budget` int(200) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `obudget` */

insert  into `obudget`(`Id`,`Budget`,`Date`) values 
(1,3993710,'2021-03-12');

/*Table structure for table `procurment` */

DROP TABLE IF EXISTS `procurment`;

CREATE TABLE `procurment` (
  `Co_Code` int(200) NOT NULL AUTO_INCREMENT,
  `PRO_Requestor` varchar(200) NOT NULL,
  `PRO_Department` varchar(200) NOT NULL,
  `Co_Status` int(200) NOT NULL,
  `PRO_Desc` varchar(200) NOT NULL,
  `PRO_Amount` int(200) NOT NULL,
  `PRO_Date` date NOT NULL,
  `PRO_Supplier` varchar(255) NOT NULL,
  `PRO_City` varchar(255) NOT NULL,
  `PRO_Country` varchar(255) NOT NULL,
  `PRO_Address` varchar(255) NOT NULL,
  PRIMARY KEY (`Co_Code`),
  KEY `FK_procurment` (`Co_Status`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4;

/*Data for the table `procurment` */

insert  into `procurment`(`Co_Code`,`PRO_Requestor`,`PRO_Department`,`Co_Status`,`PRO_Desc`,`PRO_Amount`,`PRO_Date`,`PRO_Supplier`,`PRO_City`,`PRO_Country`,`PRO_Address`) values 
(101,'Elvira Barbosa','Logistics 2',101,'For purchase of new machines',3000000,'2021-11-30','Hp links','Quezon city','Philippines','san ben calocas kaligayahan'),
(102,'Critina Vargas','Logistics 2',101,'For purchase of land',4000000,'2021-11-29','Camella','Calocan','Philippines','san ben calocas kaligayahan'),
(104,'Allie Adams','Logistics 2',102,'For purchase of new machines',3000000,'2022-01-11','hexa mech tools','Quezon city','Philippines','san bartolome, Q.C.'),
(105,'Alex Abadi','Logistics 2',102,'For purchase of new machines',3000000,'2022-01-12','Forward machines','Quezon city','Philippines','san bartolome, Q.C.'),
(106,'Kara Mary','Logistics 2',102,'For purchase of new machines',3000000,'2022-01-13','Vision tools','Calocan City','Philippines','Reparo, Caloocan City'),
(107,'Rickiew Aliman','Logistics 2',102,'For purchase of new machines',3000000,'2022-01-14','belter tools','Valenzuela City','Philippines','Gen-T, Valenzuela City'),
(108,'Daniel Alexander','Logistics 2',102,'For purchase of land',3000000,'2022-01-15','Camella','Pasay City','Philippines','Diosdado, Pasay City'),
(109,'Sam Allen','Logistics 2',102,'For purchase of land',3000000,'2022-01-16','Villar','Paraniaque City','Philippines','Reparo, Caloocan City'),
(110,'Lucy Alvarez','Logistics 2',102,'For purchase of new machines',3000000,'2022-01-17','Factory machines','Makati City','Philippines','Reparo, Caloocan City');

/*Table structure for table `proposals` */

DROP TABLE IF EXISTS `proposals`;

CREATE TABLE `proposals` (
  `Co_Code` int(200) NOT NULL AUTO_INCREMENT,
  `PR_Department` varchar(255) NOT NULL,
  `PR_Requestor` varchar(255) NOT NULL,
  `PR_Amount` int(200) NOT NULL,
  `PR_Date` date NOT NULL,
  `Co_Status` int(200) NOT NULL,
  PRIMARY KEY (`Co_Code`)
) ENGINE=InnoDB AUTO_INCREMENT=1110 DEFAULT CHARSET=utf8mb4;

/*Data for the table `proposals` */

insert  into `proposals`(`Co_Code`,`PR_Department`,`PR_Requestor`,`PR_Amount`,`PR_Date`,`Co_Status`) values 
(1100,'HR1','jonathan',300000,'2022-01-13',102),
(1101,'HR2','Ian james',300000,'2022-01-13',102),
(1103,'HR3','Jaymie cabradillia',300000,'2022-01-13',102),
(1104,'HR4','Maricor guilliermo bituin',300000,'2022-01-13',102),
(1105,'CORE 1','jamela cruz',400000,'2022-01-13',102),
(1106,'CORE 2','Eliie sabinay',400000,'2022-01-13',102),
(1107,'LOG 1','theodore jhon valera',300000,'2022-01-13',102),
(1108,'LOG 2','Karl angelo',300000,'2022-01-13',102),
(1109,'Admin','michaela leigh valera',300000,'2022-01-13',101);

/*Table structure for table `purchases` */

DROP TABLE IF EXISTS `purchases`;

CREATE TABLE `purchases` (
  `PU_id` int(200) NOT NULL AUTO_INCREMENT,
  `Co_Code` int(200) NOT NULL,
  `Pu_Item` varchar(200) NOT NULL,
  `Pu_Quantity` int(200) NOT NULL,
  `Pu_Price` int(200) NOT NULL,
  `Pu_Date` date NOT NULL,
  `Pu_Total` int(200) NOT NULL,
  PRIMARY KEY (`PU_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

/*Data for the table `purchases` */

insert  into `purchases`(`PU_id`,`Co_Code`,`Pu_Item`,`Pu_Quantity`,`Pu_Price`,`Pu_Date`,`Pu_Total`) values 
(1,1001,'Bus Fare',5,50,'2021-10-12',250),
(2,1002,'Meal',10,150,'2021-11-12',1500),
(3,1002,'Drinks',15,40,'2021-11-12',600),
(4,1002,'Deserts',12,20,'2021-11-12',240),
(5,1003,'Laptop',1,20000,'2021-12-12',20000),
(6,1002,'Drinks',20,40,'2021-12-13',800),
(7,1003,'Printer',1,30000,'2021-12-13',30000),
(8,101,'Printers',5,50000,'2021-12-14',500000),
(9,102,'Processor',4,16000,'2021-12-14',16000),
(10,1,'electricity',1,5000,'2022-01-04',5000),
(11,1,'gas',1,6000,'2022-01-04',6000),
(12,1,'Internet connections',1,2500,'2022-01-04',2500),
(13,1,'telephones',1,2300,'2022-01-04',2300),
(14,1,'water',1,2500,'2022-01-04',2500),
(15,1004,'chicken ',5,150,'2022-01-02',750),
(16,1004,'Meat',5,300,'2022-01-02',1500),
(17,1004,'drinks',10,15,'2022-01-02',150),
(18,1005,'laptop - Acer Nitro 5',1,21,'2022-01-03',21),
(19,1006,'keybroad-PSR- EW300',1,19998,'2022-01-04',19998),
(20,1007,'Bond paper - Hard copy ',1,815,'2022-01-04',815),
(21,104,'BTools 82 pcs tools socket',1,1729,'2022-01-03',1729),
(22,105,'CNC pressure spring machine',1,74200,'2022-01-05',74200),
(23,106,'Antenna Alignment tool ',1,6995,'2022-01-05',6995),
(24,107,'lotus Sheet finish Sander',1,1210,'2022-01-06',1210),
(25,108,'M-R-3 Acquired Property ',1,1000000,'2022-01-06',1000000),
(26,109,'Forbes Park property ',1,4000000,'2022-01-07',4000000),
(27,110,'Paper cup making machine',1,720000,'2022-01-08',720000),
(28,2,'Renovation ',0,200000,'2022-01-03',200000),
(29,3,'Transportation',0,100000,'2022-01-09',100000);

/*Table structure for table `reimbursment` */

DROP TABLE IF EXISTS `reimbursment`;

CREATE TABLE `reimbursment` (
  `Co_Code` int(200) NOT NULL AUTO_INCREMENT,
  `Co_Source` varchar(200) NOT NULL,
  `Co_Desc` varchar(200) NOT NULL,
  `Co_Date` date NOT NULL,
  `Co_Status` varchar(200) NOT NULL,
  `Co_Purpose` varchar(200) NOT NULL,
  `Co_Supplier` varchar(200) NOT NULL,
  `Co_Address` varchar(200) NOT NULL,
  `Co_City` varchar(200) NOT NULL,
  `Co_Country` varchar(200) NOT NULL,
  PRIMARY KEY (`Co_Code`)
) ENGINE=InnoDB AUTO_INCREMENT=1008 DEFAULT CHARSET=utf8mb4;

/*Data for the table `reimbursment` */

insert  into `reimbursment`(`Co_Code`,`Co_Source`,`Co_Desc`,`Co_Date`,`Co_Status`,`Co_Purpose`,`Co_Supplier`,`Co_Address`,`Co_City`,`Co_Country`) values 
(1001,'HR3','maircor bituin','2021-10-12','103','for buying equipment','HP technologies','sanbenisa','Quezon city','philippines'),
(1002,'HR3','ian james barbosa','2021-10-12','101','for buying machines','intel core','caloocan city, brgy kaligayahan.','Caloocan city','philippines'),
(1003,'HR3','ellie sabinay','2021-10-13','102','for buying food','jollibee corp','caloocan city, brgy kaligayahan.','Caloocan city','philippines'),
(1004,'HR3','melanie cabradilla','2021-10-13','102','for buying food','mang inasa corp','caloocan city, brgy kaligayahan.','Caloocan city','philippines'),
(1005,'HR3','elvira Aliga','2022-01-11','102','for loptop','ASUS','novaliches, quezon city.','Quezon city','philippines'),
(1006,'HR3','Tin Pachoco','2022-01-11','102','for key board','FANTECH','cubao, quezon city.','Quezon city','philippines'),
(1007,'HR3','Theodore jhon valera','2022-01-11','102','for bondpaper','HARD COPY','sampaloc, manila city.','Manila city','philippines');

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `Status_Code` int(200) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) NOT NULL,
  PRIMARY KEY (`Status_Code`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4;

/*Data for the table `status` */

insert  into `status`(`Status_Code`,`Name`) values 
(101,'Approved'),
(102,'Pending'),
(103,'Settled'),
(104,'Credit'),
(105,'Debit');

/*Table structure for table `uexpenses` */

DROP TABLE IF EXISTS `uexpenses`;

CREATE TABLE `uexpenses` (
  `Co_Code` int(200) NOT NULL AUTO_INCREMENT,
  `UE_Department` varchar(200) NOT NULL,
  `UE_Requestor` varchar(200) NOT NULL,
  `UE_date` date NOT NULL,
  `UE_Desc` varchar(200) NOT NULL,
  `Co_Status` int(200) NOT NULL,
  `UE_Supplier` varchar(200) NOT NULL,
  `UE_Address` varchar(200) NOT NULL,
  `UE_City` varchar(200) NOT NULL,
  `UE_Country` varchar(200) NOT NULL,
  PRIMARY KEY (`Co_Code`),
  KEY `FK_uexpenses` (`Co_Status`),
  CONSTRAINT `FK_uexpenses` FOREIGN KEY (`Co_Status`) REFERENCES `status` (`Status_Code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `uexpenses` */

insert  into `uexpenses`(`Co_Code`,`UE_Department`,`UE_Requestor`,`UE_date`,`UE_Desc`,`Co_Status`,`UE_Supplier`,`UE_Address`,`UE_City`,`UE_Country`) values 
(1,'Admin','Admin manager','2021-12-03','for utilities and expenses',102,'Admin','Quirino Highway, Novaliches','Quezon City','Philippines'),
(2,'Admin','Admin manager','2021-12-04','maintenance',102,'Admin','Quirino Highway, Novaliches','Quezon City','Philippines'),
(3,'Admin','Admin manager','2021-12-07','Transportation',102,'Admin','Quirino Highway, Novaliches','Quezon City','Philippines');

/*Table structure for table `user_groups` */

DROP TABLE IF EXISTS `user_groups`;

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_level` (`group_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_groups` */

insert  into `user_groups`(`id`,`group_name`,`group_level`,`group_status`) values 
(1,'Admin',1,1),
(3,'User',2,1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `Department` varchar(255) NOT NULL,
  `Position` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_level` (`user_level`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`username`,`password`,`user_level`,`image`,`status`,`last_login`,`Department`,`Position`) values 
(10,'Peter','Finance','134096e12368b9bce038ccac61963716c01fa8ee',1,'lsu2olid10.jpg',1,'2022-04-11 21:39:00','Finance','Manager'),
(12,'Mae Ann Caunca','User','12dea96fec20593566ab75692c9949596833adc9',2,'3gy5cpqg12.jpg',1,'2022-04-08 10:53:42','Finance','Collection Officer'),
(14,'AnotherAdmin','SuperAdmin','134096e12368b9bce038ccac61963716c01fa8ee',1,'auj1s3xo14.png',1,'2022-04-08 10:52:50','SuperAdmin','Administrator'),
(15,'Elvira','HR1','134096e12368b9bce038ccac61963716c01fa8ee',1,'no_image.jpg',1,'2022-03-28 14:34:04','HR1','Manager'),
(16,'James Ian','Semaj','f90409b98ffb61424a01b4bb718aa602cebd5ee2',2,'no_image.jpg',1,NULL,'Finance','Disbursment officer'),
(17,'James Ian','Collection manager','134096e12368b9bce038ccac61963716c01fa8ee',1,'no_image.jpg',1,NULL,'Finance','Manager');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

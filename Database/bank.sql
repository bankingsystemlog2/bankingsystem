/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.22-MariaDB : Database - bank
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
) ENGINE=InnoDB AUTO_INCREMENT=257 DEFAULT CHARSET=utf8mb4;

/*Data for the table `budgetreleasing` */

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
(101,'ian james barbosa',18011424,102,'2021-12-11','Sanbenisa Garden villas','Quezon city','Philippines','This Record is a paid through agreed Contract','Core 1','Loans'),
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
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4;

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
(97,0,'2022-03-15',2340);

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
(1,3994210,'2021-03-12');

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
(101,'Elvira Barbosa','Logistics 2',102,'For purchase of new machines',3000000,'2021-11-30','Hp links','Quezon city','Philippines','san ben calocas kaligayahan'),
(102,'Critina Vargas','Logistics 2',102,'For purchase of land',4000000,'2021-11-29','Camella','Calocan','Philippines','san ben calocas kaligayahan'),
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
(1001,'HR3','maircor bituin','2021-10-12','102','for buying equipment','HP technologies','sanbenisa','Quezon city','philippines'),
(1002,'HR3','ian james barbosa','2021-10-12','102','for buying machines','intel core','caloocan city, brgy kaligayahan','Caloocan city','philippines'),
(1003,'HR3','ellie sabinay','2021-10-13','102','for buying food','jollibee corp','caloocan city, brgy kaligayahan','Caloocan city','philippines'),
(1004,'HR3','melanie cabradilla','2021-10-13','102','for buying food','mang inasa corp','caloocan city, brgy kaligayahan','Caloocan city','philippines'),
(1005,'HR3','elvira Aliga','2022-01-11','102','for loptop','ASUS','novaliches, quezon city','Quezon city','philippines'),
(1006,'HR3','Tin Pachoco','2022-01-11','102','for key board','FANTECH','cubao, quezon city','Quezon city','philippines'),
(1007,'HR3','Theodore jhon valera','2022-01-11','102','for bondpaper','HARD COPY','sampaloc, manila city','Manila city','philippines');

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
  PRIMARY KEY (`id`),
  KEY `user_level` (`user_level`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`username`,`password`,`user_level`,`image`,`status`,`last_login`) values 
(10,'Peter','Admin','134096e12368b9bce038ccac61963716c01fa8ee',1,'lsu2olid10.jpg',1,'2022-03-15 20:50:06'),
(12,'Mae Ann Caunca','User','12dea96fec20593566ab75692c9949596833adc9',2,'3gy5cpqg12.jpg',0,'2022-03-15 20:49:39'),
(14,'AnotherAdmin','AnotherAdmin11','8451ba8a14d79753d34cb33b51ba46b4b025eb81',1,'no_image.jpg',1,'2022-03-15 00:04:21');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;



CREATE TABLE `account_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `definedStat` int(200) NOT NULL,
  `Amount` int(200) NOT NULL,
  `Co_Code` int(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `account_verification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  `vkey` varchar(300) NOT NULL,
  `verified` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`applicant_id`),
  CONSTRAINT `account_verification_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

INSERT INTO account_verification VALUES("1","20220001","0df4753aac486c620f99db1992cef752","1");
INSERT INTO account_verification VALUES("2","20220002","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("8","20220003","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("10","20220004","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("11","20220005","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("12","20220006","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("13","20220007","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("14","20220008","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("15","20220009","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("16","20220010","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("17","20220011","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("18","20220012","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("19","20220013","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("20","20220014","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("21","20220015","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("22","20220016","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("23","20220017","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("24","20220018","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("25","20220019","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("26","20220020","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("27","20220021","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("28","20220022","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("29","20220023","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("30","20220024","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("31","20220025","3bce0f94eae81cab578c4eb1af0865a7","1");
INSERT INTO account_verification VALUES("32","20220028","fd789c042e70b0dfb3916debc6ac123e","1");
INSERT INTO account_verification VALUES("33","20220026","6cfa02e471127cc311af355718c7c70d27dfe013","1");
INSERT INTO account_verification VALUES("34","20220027","6cfa02e471127cc311af355718c7c70d27dfe013","1");
INSERT INTO account_verification VALUES("35","20220029","6cfa02e471127cc311af355718c7c70d27dfe013","1");
INSERT INTO account_verification VALUES("36","20220030","6cfa02e471127cc311af355718c7c70d27dfe013","1");
INSERT INTO account_verification VALUES("37","20220031","6cfa02e471127cc311af355718c7c70d27dfe013","1");
INSERT INTO account_verification VALUES("38","20220032","6cfa02e471127cc311af355718c7c70d27dfe013","1");
INSERT INTO account_verification VALUES("39","20220033","aea12b5326e069703c66b7e334770807","1");
INSERT INTO account_verification VALUES("42","20220036","5dacdf4072c7ae9dd918902d5ea75878","1");
INSERT INTO account_verification VALUES("43","20220037","e10ddd4970c6b1c008bd5de2afd3998f","1");



CREATE TABLE `am` (
  `item_number` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Unit_price` int(11) DEFAULT NULL,
  `Total_stock` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO am VALUES("1234","1","asd","asd","123","123","123");



CREATE TABLE `applicant_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  `resume` varchar(200) NOT NULL,
  `pag_ibig` varchar(200) NOT NULL,
  `sss` varchar(200) NOT NULL,
  `philhealth` varchar(200) NOT NULL,
  `nbi` varchar(200) NOT NULL,
  `others_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_appli` (`applicant_id`),
  CONSTRAINT `FK_appli` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO applicant_documents VALUES("2","20220036","docu_uploads/626d66f299b768.32550305.jpg","docu_uploads/626d66f299b782.61990313.jpg","docu_uploads/626d66f299b638.24108565.jpg","docu_uploads/626d66f299b778.16402011.jpg","docu_uploads/626d66f299b799.56299899.jpg","docu_uploads/626d66f299b7a9.72907106.jpg");
INSERT INTO applicant_documents VALUES("3","20220037","docu_uploads/627147d4c65cd4.01662557.docx","docu_uploads/627147d4c65cf0.19232259.docx","docu_uploads/627147d4c65bd8.63431530.docx","docu_uploads/627147d4c65ce3.99824832.docx","docu_uploads/627147d4c65d08.87223351.docx","docu_uploads/627147d4c65d13.40393609.docx");



CREATE TABLE `applicants` (
  `applicant_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `profile_pic` varchar(250) NOT NULL,
  PRIMARY KEY (`applicant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20220038 DEFAULT CHARSET=utf8mb4;

INSERT INTO applicants VALUES("20220001","darryl","opiasa","deleon","darryl917deleon@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09515901340","2000-02-07","21","Male","Single","inc","103 npc area b talipapa caloocan city","2022-01-10 20:12:55","");
INSERT INTO applicants VALUES("20220002","john paul","din","barruga","barrugajohnpaul7@gmail.com","d033e22ae348aeb5660fc2140aec35850c4da997","09991760132","2000-04-16","21","Male","Single","catholic","25 mulawinan lawang bato valenzuela city","2022-01-05 17:39:49","");
INSERT INTO applicants VALUES("20220003","Monica","Din","Barruga","barrugamonica04@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09081416374","2001-09-04","20","Female","Single","Catholic","25 Mulawinan Lawang Bato Valenzuela City","2022-01-05 19:51:05","");
INSERT INTO applicants VALUES("20220004","Harold","Lazaro","Baldoz","BaldozHarold12Q@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09205254132","1997-01-10","25","Male","Single","Catholic","36 Malinis Lawang Bato Valenzuela City","2022-01-05 19:51:09","");
INSERT INTO applicants VALUES("20220005","Manuel","Boctot","Carr","manuelcarr@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09093213356","1998-10-30","24","Male","Single","catholic","Malinta Valenzuela","2022-01-06 01:05:39","");
INSERT INTO applicants VALUES("20220006","miguel","luna","bucao","miguelbucao@gmail.com","dd4bee80840a7929dcf0a1670199b26581b9f24b","09194562814","1998-02-14","24","Male","Single","catholic","brgy concepcion gulayan Malabon City","2022-04-30 21:57:42","");
INSERT INTO applicants VALUES("20220007","jasper","apuyan","sarmiento","jaspersarmiento@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09197509438","1999-03-26","22","Male","Single","catholic","commonwealth Quezon City","2022-01-05 19:51:23","");
INSERT INTO applicants VALUES("20220008","jericho","aduana","tagoctoc","jerichotagoctoc@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09093412765","1999-05-07","22","Male","Single","catholic","vista verde caloocan city","2022-01-05 19:51:31","");
INSERT INTO applicants VALUES("20220009","rico","reyes","camaddu","ricocamaddu@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09081227651","1998-11-12","23","Male","Single","catholic","shelterville caloocan city","2022-01-05 19:51:35","");
INSERT INTO applicants VALUES("20220010","emely","rueras","gudmalin","emelygudmalin@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09194906321","1996-03-24","25","Female","Single","catholic","mulawinan lawang bato valenzuela city","2022-01-05 19:50:49","");
INSERT INTO applicants VALUES("20220011","edwin","gudmalin","rueras","edwinrueras@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09124376452","1996-06-26","23","Male","Single","catholic","Mulawinan lawang bato valenzuela city","2022-01-05 19:50:43","");
INSERT INTO applicants VALUES("20220012","eric","ladion","cabrillos","cabrilloseric65@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09484523704","1999-09-11","22","Male","Single","catholic","domigpe compound lawang bato valenzuela city","2022-01-05 19:50:38","");
INSERT INTO applicants VALUES("20220013","alvin","barruga","vidal","alvinvidal@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09991327641","1996-12-11","25","Male","Single","catholic","brgy concepcion gulayan malabon city","2022-01-05 19:50:32","");
INSERT INTO applicants VALUES("20220014","johnpaul","ronquillo","umanito","johnpaulumanito@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09125587612","1999-07-19","22","Male","Single","catholic","caybiga caloocan city","2022-01-05 19:50:26","");
INSERT INTO applicants VALUES("20220015","nicko","tan","eduarte","nickoeduarte@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09093476117","1999-10-11","22","Male","Single","catholic","arty concas valenzuela city","2022-01-05 19:50:22","");
INSERT INTO applicants VALUES("20220016","Riza","barbin","din","rizadin@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09998761765","1995-05-11","26","Female","Single","catholic","makati city","2022-01-05 19:50:15","");
INSERT INTO applicants VALUES("20220017","christian dave","de guzman","garcia","christiandavegarcia@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09091576982","2000-10-15","21","Male","Single","catholic","phase 4 valenzuela city","2022-01-05 19:50:11","");
INSERT INTO applicants VALUES("20220018","denzel","fernandez","dela cruz","denzeldelacruz@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09194978344","1999-04-11","22","Male","Single","catholic","bagong silang caloocan city","2022-01-05 19:50:07","");
INSERT INTO applicants VALUES("20220019","regor","fernandez","catacutan","regorcatacutan@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09206532776","1999-02-22","22","Male","Single","catholic","arty concas valenzuela city","2022-01-05 19:50:03","");
INSERT INTO applicants VALUES("20220020","jinky","fernadez","de guzman","jinkydeguzman@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09091822437","1998-11-09","23","Female","Single","catholic","bagong silang caloocan city","2022-01-05 19:49:59","");
INSERT INTO applicants VALUES("20220021","aldrich","lim","ramos","aldrichramos@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09993476182","1997-12-30","24","Male","Single","catholic","maysan valenzuela city","2022-01-05 19:49:54","");
INSERT INTO applicants VALUES("20220022","albert","cruz","ubana","albertubana@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09192375143","2000-08-11","21","Male","Single","catholic","Bagbaguin caloocan city","2022-01-05 19:49:48","");
INSERT INTO applicants VALUES("20220023","annalyn","reyes","san jose","annalynsanjose@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09993412674","1999-04-11","22","Female","Single","catholic","bagumbong valenzuela city","2022-01-05 19:49:42","");
INSERT INTO applicants VALUES("20220024","ricardo","magcamit","dalisay","ricardodalisay@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09991438743","1997-11-01","24","Male","Single","catholic","Tondo manila city","2022-01-05 19:49:36","");
INSERT INTO applicants VALUES("20220025","victorino","baylosis","magtanggol","victorinomagtanggol@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09205613167","1999-03-19","22","Male","Single","catholic","taguig city","2022-01-05 19:49:30","");
INSERT INTO applicants VALUES("20220026","nicanor","maglangit","torres","nicanortorres@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09091417983","1998-04-17","23","Male","Single","catholic","catmon malabon city","2022-01-05 19:49:20","");
INSERT INTO applicants VALUES("20220027","angelica","garcia","tolentino","angelicatolentino@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09193254896","1999-06-20","22","Female","Single","catholic","novaliches quezon city","2022-01-05 19:49:14","");
INSERT INTO applicants VALUES("20220028","richie","dacuma","carrion","richie.c@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09122456771","1999-01-12","22","Male","Single","catholic","novaliches quezon city","2022-01-05 19:47:59","");
INSERT INTO applicants VALUES("20220029","bryan","dy","lao","bryanlao@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09195684867","1997-10-01","24","Male","Single","Catholic","Tondo Manila City","2022-01-06 00:50:50","");
INSERT INTO applicants VALUES("20220030","alaric","ching","yuzon","anygma@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09043860493","1995-03-10","26","Male","Single","Catholic","Pinagbuhatan Pasig City","2022-01-06 00:53:02","");
INSERT INTO applicants VALUES("20220031","benjie","toledo","cruz","benjtol@gmail.com","72ca3686131a8a7733a912ec154fd42d2b97cdf3","09424960192","1993-01-03","29","Male","Single","Catholic","Masinag Antipolo City","2022-04-08 19:14:52","");
INSERT INTO applicants VALUES("20220032","John","juts","gutierrez","kingb@gmail.com","6cfa02e471127cc311af355718c7c70d27dfe013","09472935873","1998-10-27","23","Male","Married","Catholic","Novaliches Quezon City","2022-01-06 00:58:41","");
INSERT INTO applicants VALUES("20220033","mark","desuyo","vergara","mark.eron18@gmail.com","07cc36db5072ef3ea21a610dfdaceb78e42fe767","12345678910","2000-06-12","21","Male","Single","hfsfsf","valenzuela city","2022-01-11 13:01:18","");
INSERT INTO applicants VALUES("20220036","jiraiyah","sanin","golib","jiraiyah623@gmail.com","5ed5d228da1d00d947818b658c3e97fb5b4d5786","09123846012","2000-02-07","22","Male","Single","catholic","caloocan city","2022-05-02 07:20:58","");
INSERT INTO applicants VALUES("20220037","Paul","B","Din","pauldin0416@gmail.com","6e0ea0f575a458fe5a3502c2a8532731e8564569","09991760132","2000-04-16","22","Male","Single","Catholic","Mulawinan Valenzuela","2022-05-04 07:17:51","");



CREATE TABLE `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `job_title` varchar(200) NOT NULL,
  `date_of_application` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_applications` (`applicant_id`),
  KEY `FK_jobORDER` (`job_id`),
  CONSTRAINT `FK_applications` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_jobORDER` FOREIGN KEY (`job_id`) REFERENCES `posted_jobs` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;

INSERT INTO applications VALUES("60","110004","20220036","relationship manager","2022-05-01","pending","");



CREATE TABLE `appreciation_awards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `award_title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO appreciation_awards VALUES("1","30330030","Employee of the Month","2022-04-12","pending");



CREATE TABLE `archive_visitor_registration` (
  `visitor_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `time` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`visitor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1000125 DEFAULT CHARSET=utf8mb4;

INSERT INTO archive_visitor_registration VALUES("1000124","fafa","fafa","faf","HR DEPARTMENT","Payatas A Quezon, city"," lilgabs08@gmail.com","9098374504","","RIDER","fafafa","2022-05-12 22:18:31");



CREATE TABLE `audit_logs` (
  `id` int(10) NOT NULL,
  `module` varchar(150) NOT NULL,
  `action_taken` varchar(300) NOT NULL,
  `users_id` int(10) NOT NULL,
  `datetime_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO audit_logs VALUES("1","Vendor","User 1 Added new application form","10","2021-12-18 15:50:39");
INSERT INTO audit_logs VALUES("2","vendor_delete.php","Delete a records where id is 53","1","2021-12-18 23:12:52");
INSERT INTO audit_logs VALUES("3","vendor_delete.php","Delete a records where id is 55","1","2021-12-23 21:18:41");
INSERT INTO audit_logs VALUES("4","vendor_delete.php","Delete a records where id is 56","1","2021-12-23 21:26:59");
INSERT INTO audit_logs VALUES("5","vendor_delete.php","Delete a records where id is 57","1","2021-12-23 21:27:22");
INSERT INTO audit_logs VALUES("6","vendor_delete.php","Delete a records where id is 58","1","2021-12-23 21:31:33");
INSERT INTO audit_logs VALUES("7","vendor_delete.php","Delete a records where id is 59","1","2021-12-23 21:31:51");
INSERT INTO audit_logs VALUES("8","fleet_addvehicle.php","New added record where model is asd","1","2021-12-27 20:17:16");
INSERT INTO audit_logs VALUES("9","vendor_form.php","New added record where vendor is lester","10","2021-12-27 20:42:15");
INSERT INTO audit_logs VALUES("10","vendor_approval.php"," Record has been approved where vendor is Lester","1","2021-12-27 21:04:10");
INSERT INTO audit_logs VALUES("11","vendor_approval.php"," Record has been approved where vendor is Lester","1","2021-12-27 21:17:18");
INSERT INTO audit_logs VALUES("12","vendor_form.php","New added record where vendor is qwerty","10","2021-12-27 21:19:09");
INSERT INTO audit_logs VALUES("13","vendor_approval.php"," Record has been Update where vendor is Qwerty","1","2021-12-27 21:19:33");
INSERT INTO audit_logs VALUES("14","vendor_delete.php","Delete a records where id is 61","1","2022-01-07 17:15:45");
INSERT INTO audit_logs VALUES("15","vendor_form.php","New added record where vendor is sa","1","2022-01-10 17:27:23");
INSERT INTO audit_logs VALUES("16","vendor_form.php","New added record where vendor is sa","1","2022-01-10 17:29:01");
INSERT INTO audit_logs VALUES("17","vendor_form.php","New added record where vendor is test","1","2022-01-10 17:30:07");
INSERT INTO audit_logs VALUES("18","vendor_approval.php"," Record has been Update where vendor is Lesterr","1","2022-01-10 18:07:49");
INSERT INTO audit_logs VALUES("19","vendor_approval.php"," Record has been Update where vendor is Sa","1","2022-01-10 20:30:04");
INSERT INTO audit_logs VALUES("20","vendor_approval.php"," Record has been Update where vendor is Lesterr","1","2022-01-10 20:30:22");
INSERT INTO audit_logs VALUES("21","vendor_approval.php"," Record has been Update where vendor is Lesterr","1","2022-01-10 20:30:26");
INSERT INTO audit_logs VALUES("22","vendor_form.php","New added record where vendor is lester","1","2022-01-11 15:00:37");
INSERT INTO audit_logs VALUES("23","vendor_approval.php"," Record has been Update where vendor is Testing","1","2022-01-11 15:43:20");
INSERT INTO audit_logs VALUES("24","vendor_delete.php","Delete a records where id is 76","1","2022-01-11 17:52:12");
INSERT INTO audit_logs VALUES("25","vendor_delete.php","Delete a records where id is 78","1","2022-01-11 17:52:14");
INSERT INTO audit_logs VALUES("26","vendor_delete.php","Delete a records where id is 79","1","2022-01-11 17:52:17");
INSERT INTO audit_logs VALUES("27","vendor_approval.php"," Record has been Update where vendor is James","1","2022-01-11 18:03:20");
INSERT INTO audit_logs VALUES("28","vendor_delete.php","Delete a records where id is 82","1","2022-01-11 18:04:44");
INSERT INTO audit_logs VALUES("0","delete_user.php","Delete a records where id is 29","24","2022-05-06 22:03:32");



CREATE TABLE `available_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `job_title` varchar(250) NOT NULL,
  `job_description` varchar(500) NOT NULL,
  `job_qualification` varchar(500) NOT NULL,
  `no_of_vacancy` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_job_id` (`job_id`),
  CONSTRAINT `FK_job_id` FOREIGN KEY (`job_id`) REFERENCES `job_vacancy` (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `blacklist_person` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(250) NOT NULL,
  `mname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `contact_no` bigint(11) NOT NULL,
  `company_department` varchar(250) NOT NULL,
  `reason` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1009 DEFAULT CHARSET=utf8mb4;




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
  `P_PaymentMode` varchar(200) NOT NULL,
  `P_Description` varchar(200) NOT NULL,
  PRIMARY KEY (`P_ID`),
  KEY `FK_budgetreleasing_s` (`P_Status`),
  KEY `FK_procurmentreleasing` (`P_Code`),
  CONSTRAINT `FK_budgetreleasing_s` FOREIGN KEY (`P_Status`) REFERENCES `status` (`Status_Code`)
) ENGINE=InnoDB AUTO_INCREMENT=348 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `car_loans` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
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
  `date_of_loan` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18010547 DEFAULT CHARSET=utf8mb4;

INSERT INTO car_loans VALUES("18010545","da","dad","2","1","212","faf","faf","faf","faf","faf","faf","fafafa","fafa","afafaf","affaf","12561261","lilgabs08@gmail.com","2626","dafaf","1616","fafa","faf","2022-03-17 21:59:58");
INSERT INTO car_loans VALUES("18010546","daddad","","","","","","","","","","","","","","","","","","","","","","2022-03-17 22:57:53");



CREATE TABLE `change_pass_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `reason` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_em` (`employee_id`),
  CONSTRAINT `FK_em` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO change_pass_request VALUES("5","30330028","adas","HR1","approved");
INSERT INTO change_pass_request VALUES("6","30330030","adsdasdas","HR1","pending");



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

INSERT INTO collection VALUES("101","ian james barbosa","18011424","102","2021-12-11","Sanbenisa Garden villas","Quezon city","Philippines","This Record is a paid through agreed Contract","Core 1","Loans");
INSERT INTO collection VALUES("103","Ellie Barbosa","10999212","102","2021-12-11","Sanbenisa Garden villas","Quezon City","Philippines","This Record is a paid through agreed Contract","Core 1","Loans");
INSERT INTO collection VALUES("104","Cristy Vargas","18013999","102","2022-01-04","Cloocan kaligayahan villas","Quezon City","Philippines","This Record is a record of deposit by the user","Core 1","Deposits");
INSERT INTO collection VALUES("105","Thedore jhon","16052100","102","2022-01-04","Pasig uranbo villas","Pasig City","Philippines","This Record is a record of deposit by the user","Core 1","Deposits");
INSERT INTO collection VALUES("106","Andrew Artis","16013231","102","2022-01-12","Bagong Silang, caloocan City","Calocan City","Philippines","This Record is a record of deposit by the user","Core 1","Deposits");
INSERT INTO collection VALUES("107","Will Baylie","18202542","102","2022-01-13","Camarin, Caloocan City","Calocan City","Philippines","This Record is a record of deposit by the user","Core 1","Loans");
INSERT INTO collection VALUES("108","Aron Legaspi","18014278","102","2022-01-14","Lagro, Quezon City","Quezon City","Philippines","This Record is a record of deposit by the user","Core 1","Deposits");
INSERT INTO collection VALUES("109","Berry Jhon","16010051","102","2022-01-15","North Fairview, Quezon City","Quezon City","Philippines","This Record is a record of deposit by the user","Core 1","Loans");
INSERT INTO collection VALUES("110","Cecille Alex","17012232","102","2022-01-16","Novaliches, Quezon City","Quezon City","Philippines","This Record is a record of deposit by the user","Core 1","Deposits");
INSERT INTO collection VALUES("111","Eva Chavez","12316737","102","2022-01-12","Zabarte road, Caloocan City","Calocan City","Philippines","This Record is a record of deposit by the user","Core 1","Loans");
INSERT INTO collection VALUES("112","Frits Howard","18956875","102","2022-01-12","Liano, Caloocan","Calocan City","Philippines","This Record is a record of deposit by the user","Core 1","Deposits");
INSERT INTO collection VALUES("113","Edward Cruz","27326143","102","2022-01-12","11th avenue, caloocan City","Calocan City","Philippines","This Record is a record of deposit by the user","Core 1","Loans");
INSERT INTO collection VALUES("114","Stephen curry","41120130","102","2022-01-20","Talisayan, Caloocan City","Calocan City","Philippines","This Record is a record of deposit by the user","Core 1","Loans");
INSERT INTO collection VALUES("115","Daniel Daviz","59067090","102","2022-01-21","tondo, manila","Manila","Philippines","This Record is a record of deposit by the user","Core 1","Deposits");
INSERT INTO collection VALUES("116","James Thomas","12837248","102","2022-01-22","alfonso, tondo, manila","Manila","Philippines","This Record is a record of deposit by the user","Core 1","Loans");



CREATE TABLE `collection_transactions` (
  `LT_id` int(200) NOT NULL AUTO_INCREMENT,
  `LT_Recieved` int(200) NOT NULL,
  `LT_Penalty` int(200) NOT NULL,
  `LT_date` date NOT NULL,
  `A_Number` int(200) NOT NULL,
  `LT_Type` varchar(200) NOT NULL,
  PRIMARY KEY (`LT_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

INSERT INTO collection_transactions VALUES("1","1000","100","2021-04-05","18011424","Loan Payment");
INSERT INTO collection_transactions VALUES("2","1000","100","2021-05-05","18011424","Loan Payment");
INSERT INTO collection_transactions VALUES("3","200","0","2021-06-05","18011424","Loan Payment");
INSERT INTO collection_transactions VALUES("4","2000","0","2021-06-15","10999212","Loan Payment");
INSERT INTO collection_transactions VALUES("5","2000","0","2021-07-15","10999212","Loan Payment");
INSERT INTO collection_transactions VALUES("6","2000","0","2021-08-15","10999212","Loan Payment");
INSERT INTO collection_transactions VALUES("7","3000","0","2021-09-15","10999212","Loan Payment");
INSERT INTO collection_transactions VALUES("8","500000","0","2021-12-13","18013999","deposit");
INSERT INTO collection_transactions VALUES("9","100000","0","2021-12-14","16052100","deposit");
INSERT INTO collection_transactions VALUES("10","80000","0","2021-12-15","16013231","deposit");
INSERT INTO collection_transactions VALUES("11","95000","0","2021-12-18","18014278","deposit");
INSERT INTO collection_transactions VALUES("12","8500","0","2021-12-19","16010051","Loan Payment");
INSERT INTO collection_transactions VALUES("13","100000","0","2021-12-21","17012232","deposit");
INSERT INTO collection_transactions VALUES("14","4000","100","2021-12-22","12316737","Loan Payment");
INSERT INTO collection_transactions VALUES("15","70000","0","2021-12-23","18956875","deposit");
INSERT INTO collection_transactions VALUES("16","1000","0","2021-12-26","27326143","Loan Payment");
INSERT INTO collection_transactions VALUES("17","2500","0","2021-12-27","41120130","Loan Payment");
INSERT INTO collection_transactions VALUES("18","15000","0","2021-12-29","59067090","deposit");
INSERT INTO collection_transactions VALUES("19","4000","100","2022-01-02","12837248","Loan Payment");
INSERT INTO collection_transactions VALUES("21","3000","0","2022-01-03","18202542","Loan Payment");
INSERT INTO collection_transactions VALUES("24","1100","100","2022-04-23","18011424","Loan Payment");



CREATE TABLE `college` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(100) NOT NULL,
  `name_of_school` varchar(250) NOT NULL,
  `course` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `KF_college` (`applicant_id`),
  CONSTRAINT `KF_college` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

INSERT INTO college VALUES("9","20220001","asd","asd");
INSERT INTO college VALUES("12","20220003","Beslink College of Philippines","Business Administration  Major in Marketing");
INSERT INTO college VALUES("13","20220028","quezon city university","Information technology");
INSERT INTO college VALUES("14","20220002","beslink college of the philippines","information technology");
INSERT INTO college VALUES("15","20220004","valenzuela polytecnic college","computer engineering");
INSERT INTO college VALUES("16","20220005","pamantasan lungsod ng valenzuela college","elementary education major in english ");
INSERT INTO college VALUES("17","20220006","city of malabon university","business administration major in marketing");
INSERT INTO college VALUES("18","20220007","beslink college of philippines","information technology");
INSERT INTO college VALUES("19","20220008","university of caloocan city","information technology");
INSERT INTO college VALUES("20","20220009","university of caloocan city","accounting");
INSERT INTO college VALUES("21","20220010","sti antique","computer science");
INSERT INTO college VALUES("22","20220011","sti caloocan","information technology");
INSERT INTO college VALUES("23","20220012","beslink college of the philippines","information technology");
INSERT INTO college VALUES("24","20220013","city of malabon university","accounting");
INSERT INTO college VALUES("25","20220014","beslink college of philippines","information technology");
INSERT INTO college VALUES("26","20220015","our lady of fatima college","computer science");
INSERT INTO college VALUES("27","20220016","sorsogon state college","elementary education major in mathematics");
INSERT INTO college VALUES("28","20220017","our lady lourdes college","information technology");
INSERT INTO college VALUES("29","20220018","beslink college of the philippines","information technology");
INSERT INTO college VALUES("30","20220019","our lady of lourdes college","business administration major in marketing");
INSERT INTO college VALUES("31","20220020","university of caloocan city","accounting");
INSERT INTO college VALUES("32","20220021","pamantasan lungsod ng valenzuela college","elementary education major in mathematics");
INSERT INTO college VALUES("33","20220022","beslink college of  the philippines","information technology");
INSERT INTO college VALUES("34","20220023","beslink college of the philippines","information technology");
INSERT INTO college VALUES("35","20220024","university of valenzuela","business administration major in marketing");
INSERT INTO college VALUES("36","20220025","taguig city university","entrepreneural management");
INSERT INTO college VALUES("37","20220026","city of malabon university","business administration major in marketing");
INSERT INTO college VALUES("38","20220027","sti caloocan","information technology");
INSERT INTO college VALUES("39","20220033","fgfdgd","dfergr");
INSERT INTO college VALUES("42","20220036","bcp","bsit");
INSERT INTO college VALUES("43","20220037","Beslink of the philippines","BSIT");



CREATE TABLE `com_announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `complain` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(250) NOT NULL,
  `mname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `gmail` varchar(250) NOT NULL,
  `company` varchar(250) NOT NULL,
  `type_of_complain` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` varchar(250) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `contract` (
  `con_id` int(11) NOT NULL AUTO_INCREMENT,
  `con_eid` varchar(100) NOT NULL,
  `con_type` varchar(100) NOT NULL,
  `con_detail` varchar(100) NOT NULL,
  `con_from` varchar(100) NOT NULL,
  `con_to` varchar(100) NOT NULL,
  `con_status` varchar(100) NOT NULL,
  `con_sdate` varchar(100) NOT NULL,
  PRIMARY KEY (`con_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO contract VALUES("1","e000001","Regular","Contract Test Details.","2022-04-01","2022-10-01","Signed","2022-04-01");
INSERT INTO contract VALUES("2","e000002","Casual","Casual Test Details.","2022-05-01","2022-04-01","Signed","2022-04-15");
INSERT INTO contract VALUES("3","e000003","Regular","Contract Details.","2022-04-11","2022-04-16","Unsigned","");
INSERT INTO contract VALUES("4","e000004","Casual","Casual Contract Details","2022-04-20","2022-04-12","Unsigned","");



CREATE TABLE `contract_signing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_employees` (`employee_id`),
  CONSTRAINT `FK_employees` FOREIGN KEY (`employee_id`) REFERENCES `new_hires` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `core1files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `req_id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `Body` text DEFAULT NULL,
  `preparedby` varchar(250) DEFAULT NULL,
  `urlpath` varchar(250) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `sec_dep` text DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

INSERT INTO core1files VALUES("31","0"," Memorandum Aggrement","fafaf","Admin","uploads/SOCIAL-MEDIA-ADDICTION.docx","2022-05-13","CORE1","2022-05-14","2022-05-20","1");
INSERT INTO core1files VALUES("32","55"," Memorandum Aggrement","fafaf","Admin","contract/SOCIAL-MEDIA-ADDICTION.docx","2022-05-13","","2022-05-14","2022-05-20","2");
INSERT INTO core1files VALUES("33","55"," Memorandum Aggrement","fafaf","Admin","contract/SOCIAL-MEDIA-ADDICTION.docx","2022-05-13","CORE1","2022-05-14","2022-05-20","Downloaded");
INSERT INTO core1files VALUES("34","55"," Memorandum Aggrement","fafaf","Staff","contract/SOCIAL-MEDIA-ADDICTION.docx","2022-05-13","CORE1","2022-05-21","2022-05-22","Downloaded");



CREATE TABLE `deployed_employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `deployment_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_emp` (`employee_id`),
  CONSTRAINT `FK_emp` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `deployment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `department` varchar(100) NOT NULL,
  `location` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_deploy` (`employee_id`),
  CONSTRAINT `FK_deploy` FOREIGN KEY (`employee_id`) REFERENCES `new_hires` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;




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

INSERT INTO documents VALUES("10","TEST2","QWE","2022-01-12","2022-01-25","QWER","0","1","","2022-01-11");
INSERT INTO documents VALUES("11","Supplies","Warehouse","2022-01-12","2022-01-19","Stored 150 Facemask","0","3","","2022-01-11");
INSERT INTO documents VALUES("12","testing","testing","2022-01-11","2022-01-19","testing","0","1","","2022-01-11");
INSERT INTO documents VALUES("13","Testing","Testing","2022-01-11","2022-01-19","Testing123","0","5","","2022-01-11");
INSERT INTO documents VALUES("14","Testing","Testing","2022-01-11","2022-01-19","Testing2421","0","0","uploads/Andrea Villamor.docx","2022-01-11");
INSERT INTO documents VALUES("15","testtt","testtt","2022-01-11","2022-01-12","testttt","Antigua &amp; Barbuda","1","uploads/CONCEPTUAL FRAMEWORK.docx","2022-01-11");
INSERT INTO documents VALUES("16","tester","tester","2022-01-11","2022-01-13","tester","Armenia","1","uploads/FORMAT.docx","2022-01-11");
INSERT INTO documents VALUES("17","qsa","sa","2022-01-13","2022-01-12","sa","Azerbaijan","1","uploads/helen.jpg","2022-01-11");
INSERT INTO documents VALUES("18","qwrqw","qweqwr","2022-01-11","2022-01-20","qtqweqwe","Lester","1","uploads/CONCEPTUAL FRAMEWORK.docx","2022-01-11");
INSERT INTO documents VALUES("19","Qweasdwa","Qwrqwdasdwad","2022-01-11","2022-01-19","Aweqdasdwad","0","3","uploads/FORMAT.docx","2022-01-11");
INSERT INTO documents VALUES("20","Papot","Papot","2022-01-11","2022-01-19","Papot Upload","0","2","uploads/Energy Pyramid.docx","2022-01-11");
INSERT INTO documents VALUES("21","Eqwe","Rtqweq","2022-01-11","2022-01-12","Audit Papot","0","3","uploads/Andrea Villamor.docx","2022-01-11");
INSERT INTO documents VALUES("0","fafaf","fafafaf","2022-03-05","2022-03-06","fafafafaf","Angola","1","uploads/dexter-gabuleresume (1).docx","2022-03-19");
INSERT INTO documents VALUES("0","adadadad","dadadaad","2022-03-06","2022-03-06","dadadadadad","Armenia","1","uploads/dexter-gabuleresume (1).docx","2022-03-19");
INSERT INTO documents VALUES("0","ddddddddddd","ddddddddd","2022-03-22","2022-03-23","ddddddd","Admin","1","uploads/Costumer-Complaint-Form.pdf","2022-03-22");
INSERT INTO documents VALUES("0","memo","dadadad","2022-03-23","2022-03-23","daddad","Staff","1","uploads/PRACTICE.xlsx","2022-03-22");
INSERT INTO documents VALUES("0","my god","dadad","2022-03-23","2022-03-24","dadad","Admin","1","uploads/2226013701.pdf","2022-03-22");
INSERT INTO documents VALUES("0","dfafaf","fafaffa","2022-03-27","2022-03-31","fafafaf","Admin","1","uploads/CREDIT-MEMO.docx","2022-03-26");
INSERT INTO documents VALUES("0","dexter","fafaf","2022-03-25","2022-03-31","fafaf","Staff","1","uploads/Costumer-Complaint-Form.docx","2022-03-26");



CREATE TABLE `education_background` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `elementary` varchar(500) NOT NULL,
  `junior_high_school` varchar(500) NOT NULL,
  `senior_high_school` varchar(100) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_educ` (`applicant_id`),
  CONSTRAINT `FK_educ` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

INSERT INTO education_background VALUES("9","talipapa elementary school","talipapa high school","bestlink college of the philippines","20220001");
INSERT INTO education_background VALUES("12","Lawang Bato Elementary School","Lawang Bato National High  School","Lawang Bato National High  School","20220003");
INSERT INTO education_background VALUES("13","novaliches elementary school","novaliches high school","novaliches high school","20220028");
INSERT INTO education_background VALUES("14","lawang bato elementary school","lawang bato national high school","st gregory college of philippines","20220002");
INSERT INTO education_background VALUES("15","lawang bato elementary school","lawang bato national high school","bignay highschool","20220004");
INSERT INTO education_background VALUES("16","malinta elementary school","malinta high school","malinta highschool","20220005");
INSERT INTO education_background VALUES("17","burgos elementary school","burgos high school","burgos highschool","20220006");
INSERT INTO education_background VALUES("18"," commonwealth elementary school","commonwealth high school","beslink college of philippines","20220007");
INSERT INTO education_background VALUES("19","lawang bato elementary school","lawang bato national high school","st gregory college of philippines","20220008");
INSERT INTO education_background VALUES("20","shelterville elementary school","shelverville highschool","shelterville highschool","20220009");
INSERT INTO education_background VALUES("21","lawang bato elementary school","lawang bato highschool",",lawang bato highschool","20220010");
INSERT INTO education_background VALUES("22","lawang bato elementary school","lawang bato high school","lawang bato national highschool","20220011");
INSERT INTO education_background VALUES("23","lawang bato elementary school","lawang bato high school","meycauayan college","20220012");
INSERT INTO education_background VALUES("24","burgos elementary school","burgos high school","jose rizal highschool","20220013");
INSERT INTO education_background VALUES("25","caybiga elementary school","caybiga high school","caybiga highschool","20220014");
INSERT INTO education_background VALUES("26","lawang bato elementary school","lawang bato high school","fatima college","20220015");
INSERT INTO education_background VALUES("27","bacon sorsogon elementary school","bacon high school","university of makati","20220016");
INSERT INTO education_background VALUES("28","lawang bato elementary school","lawang bato high school","punturin national high school","20220017");
INSERT INTO education_background VALUES("29","bagong silang  elementary school","bagong silang  high school","bagong silang high school","20220018");
INSERT INTO education_background VALUES("30","lawang bato elementary school","lawang bato national high school","st gregory college of philippines","20220019");
INSERT INTO education_background VALUES("31","bagong silang elementary school","bagong silang high school","bagong silang high school","20220020");
INSERT INTO education_background VALUES("32","maysan elementary school","maysan high school","pamantasan lungsod ng valenzuela collega","20220021");
INSERT INTO education_background VALUES("34","bagbaguin elementary school","babaguin national high school","university of caloocan city","20220022");
INSERT INTO education_background VALUES("35","bagumbong elementary school","bagumbong national high school","st gregory college of valenzuela","20220023");
INSERT INTO education_background VALUES("36","tondo elementary school","tondo high school","st. theresas college","20220024");
INSERT INTO education_background VALUES("37","gat andres  elementary school","tipas high school","upper bicutan national high school ","20220025");
INSERT INTO education_background VALUES("38","catmon elementary school","catmon high school","arellano senior high","20220026");
INSERT INTO education_background VALUES("39","novaliches elementary school","novaliches high school","university of caloocan city","20220027");
INSERT INTO education_background VALUES("40","tondo elementary school","novaliches high school","st. theresas college","20220029");
INSERT INTO education_background VALUES("41","ateneo de manila university","ateneo de manila university","ateneo de manila university","20220030");
INSERT INTO education_background VALUES("42","ateneo de manila university","ateneo de manila university","ateneo de manila university","20220032");
INSERT INTO education_background VALUES("43","ateneo de manila university","ateneo de manila university","ateneo de manila university","20220031");
INSERT INTO education_background VALUES("44","adfds","cdcd","cdcd","20220033");
INSERT INTO education_background VALUES("47","talipapa elementary school","talipapa high school","talipapa high school","20220036");
INSERT INTO education_background VALUES("48","Lawang Bato Elementary school","Lawang Bato National highschool","Lawang Bato National highschool","20220037");



CREATE TABLE `emp_contract_req` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `date_of_request` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_empcon` (`employee_id`),
  CONSTRAINT `FK_empcon` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `employee_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `resume` varchar(100) NOT NULL,
  `sss` varchar(100) NOT NULL,
  `philhealth` varchar(100) NOT NULL,
  `pag_ibig` varchar(100) NOT NULL,
  `nbi` varchar(100) NOT NULL,
  `other_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_docu` (`applicant_id`),
  CONSTRAINT `FK_docu` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

INSERT INTO employee_documents VALUES("20","20220031","30330035","6250105e54ec18.32582930.jpg","6250105e54eb54.54682135.jpg","6250105e54ec59.31719909.jpg","6250105e54ec83.78353571.jpg","6250105e54ecb8.34288783.jpg","6250105e54ece8.79837393.jpg");
INSERT INTO employee_documents VALUES("22","20220006","30330029","62568c0a8eaac6.63024845.jpg","62568c0a8eaa01.30305718.jpg","62568c0a8eaaf4.47905724.jpg","62568c0a8eab36.29547143.jpg","62568c0a8eab77.73377535.jpg","62568c0a8eaba8.46053183.jpg");



CREATE TABLE `employee_information_core_human` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text DEFAULT NULL,
  `Body` text DEFAULT NULL,
  `preparedby` varchar(250) DEFAULT NULL,
  `urlpath` varchar(250) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `sec_dep` text DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

INSERT INTO employee_information_core_human VALUES("14","mkpmp","nmpmpm","Admin","uploads/group 3.docx","2022-04-09","mpmp","2022-04-10","2022-04-17","1");
INSERT INTO employee_information_core_human VALUES("15","fafaf","fafaf","Staff","uploads/GABULE.docx","2022-04-09","fafaf","2022-04-17","2022-04-23","1");
INSERT INTO employee_information_core_human VALUES("16","fafaf","fafaf","Staff","uploads/group 3.docx","2022-04-09","fafaf","2022-04-16","2022-04-17","1");



CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(500) NOT NULL,
  `middle_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
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
  `date_hired` date NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30330051 DEFAULT CHARSET=utf8mb4;

INSERT INTO employees VALUES("1","Super","Owner","Admin","","0000-00-00","0","","","","","","SuperAdmin","Administration","0000-00-00");
INSERT INTO employees VALUES("30330028","aldrich","lim","ramos","darryl917deleon@gmail.com","1997-12-30","24","Male","Single","catholic","2147483647","maysan valenzuela city","Social Recognition","HR1","2022-03-20");
INSERT INTO employees VALUES("30330029","miguel","luna","bucao","miguelbucao@gmail.com","1998-02-14","24","Male","Single","catholic","2147483647","brgy concepcion gulayan Malabon City","HR1 manager","HR1","2022-03-22");
INSERT INTO employees VALUES("30330030","alvin","barruga","vidal","alvinvidal@gmail.com","1996-12-11","25","Male","Single","catholic","2147483647","brgy concepcion gulayan malabon city","Performance Management","HR1","2022-04-02");
INSERT INTO employees VALUES("30330035","benjie","toledo","cruz","benjtol@gmail.com","1993-01-03","29","Male","Single","Catholic","2147483647","Masinag Antipolo City","Recruitment","HR1","2022-04-08");
INSERT INTO employees VALUES("30330036","maria","luna","juana","miguelbucao@gmail.com","1998-02-14","24","Male","Single","catholic","2147483647","brgy concepcion gulayan Malabon City","New Hire Onboard","HR1","2022-04-13");
INSERT INTO employees VALUES("30330037","james","carter","ian","ianjames@gmail.com","2000-12-25","21","male","single","catholic","5","quezon city","Finance Manager","Finance","2018-04-16");
INSERT INTO employees VALUES("30330038","eric","siga","cabrillos","cabrilloseric@gmail.com","2000-06-19","21","male","single","catholic","09537496312","quezon city","Applicant Management","HR1","2020-07-23");
INSERT INTO employees VALUES("30330039","ian","lebron","james","james@gmail.com","1999-05-07","22","male","single","catholic","09573658263","quezon city","Disbursment officer","Finance","2017-09-18");
INSERT INTO employees VALUES("30330041","mae","ann","caunca","cauncamae@gmail.com","2001-04-23","21","female","married","catholic","09123456778","quezon city","Collection officer","Finance","2021-02-19");
INSERT INTO employees VALUES("30330042","peter","fly","pan","peterpan@gmail.com","1997-06-06","24","male","single","catholic","09237538475","quezon city","Finance Manager","Finance","2017-05-19");
INSERT INTO employees VALUES("30330043","dexter","a.","gabule","lilgabs08@gmail.com","1999-08-11","22","male","single","catholic","09098374504","talisay street","administrative Manager","adminitrative","2022-04-30");
INSERT INTO employees VALUES("30330044","julius","a.","talion","lilgabs08@gmail.com","1999-11-01","22","male","single","catholic","09098374504","sapphire","administrative staff","administrative","2022-04-30");
INSERT INTO employees VALUES("30330046","julius","julius","talion","taliom@gmail.com","2000-05-16","21","male","single","catholic","09583759534","quezon city","HR4 Manager","HR4","2021-04-18");
INSERT INTO employees VALUES("30330047","Paul","B","Din","pauldin0416@gmail.com","2000-04-16","22","Male","Single","Catholic","09991760132","Mulawinan Valenzuela","HR1 Manager","Recruitment","2022-05-03");
INSERT INTO employees VALUES("30330048","Lea","b.","Cassey","lilgabs08@gmail.com","1999-08-11","22","female","single","catholic","09098374504","afafafaffaf","core1 manager","core1","0000-00-00");
INSERT INTO employees VALUES("30330049","netoy","f","netoy","lilgabs08@gmail.com","1999-08-11","22","male","single","catholic","09098374504","fafafafafafafafa","core2admin","core2","0000-00-00");
INSERT INTO employees VALUES("30330050","justin","b.","Lopez","lilgabs08@gmail.com","1999-08-11","22","female","single","catholic","09098374504","dadadadadadadad","logistic1 manager","logistic1","2022-05-06");



CREATE TABLE `ended_project_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prop_proj` varchar(255) NOT NULL,
  `proj_name` varchar(255) NOT NULL,
  `loc` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `proj_man` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

INSERT INTO ended_project_list VALUES("8","bildingggggggg","asd","barangay 173","","2022-05-06","2022-04-30","JUSTINE BLESS LOPEZ");
INSERT INTO ended_project_list VALUES("9","ADDITIONAL FACILITY","WAREHOUSE BUILDING","1","","2022-05-07","2022-10-20","AKO");
INSERT INTO ended_project_list VALUES("10","asd","asd","asd","sad","2022-05-07","2022-05-31","asd");
INSERT INTO ended_project_list VALUES("11","asd","asd","asd","sad","2022-05-07","2022-05-31","asd");
INSERT INTO ended_project_list VALUES("12","asd","asd","asd","sad","2022-05-07","2022-05-31","asd");
INSERT INTO ended_project_list VALUES("13","asd","asd","asd","sad","2022-05-07","2022-05-31","asd");
INSERT INTO ended_project_list VALUES("14","asd","asd","asd","sad","2022-05-07","2022-05-31","asd");
INSERT INTO ended_project_list VALUES("15","asd","asd","asd","sad","2022-05-07","2022-05-31","asd");
INSERT INTO ended_project_list VALUES("16","asd","asd","asd","sad","2022-05-07","2022-05-31","asd");
INSERT INTO ended_project_list VALUES("17","asd","asd","asd","sad","2022-05-07","2022-05-31","asd");
INSERT INTO ended_project_list VALUES("18","asd","asd","asd","sad","2022-05-07","2022-05-31","asd");



CREATE TABLE `equipment_complain` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(250) NOT NULL,
  `gmail` varchar(250) NOT NULL,
  `company` varchar(250) NOT NULL,
  `type_of_equipment` varchar(250) NOT NULL,
  `complain` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `equipment_reservation` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(250) DEFAULT NULL,
  `fname` varchar(250) DEFAULT NULL,
  `mname` varchar(250) DEFAULT NULL,
  `department` varchar(250) DEFAULT NULL,
  `position` varchar(250) DEFAULT NULL,
  `start_date` varchar(100) DEFAULT NULL,
  `until` varchar(100) DEFAULT NULL,
  `time_date_request` varchar(250) DEFAULT NULL,
  `list_equipment_request` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO equipment_reservation VALUES("1","gabule","dexter","attres","office of administration","manager","","","november 21, 2021 
9:00 am","1 long table 
10 chair
1 microphone
2 speaker
");
INSERT INTO equipment_reservation VALUES("2","faf","faf","faf","faf","faf","","","2021-12-15 23:31:30","faf");
INSERT INTO equipment_reservation VALUES("3","fsfsgs","gsgsg","gsg","","","","","","");
INSERT INTO equipment_reservation VALUES("4","","","","","","","","2021-12-16 01:45:13","");
INSERT INTO equipment_reservation VALUES("5","","","","","","","","2021-12-16 02:04:23","");
INSERT INTO equipment_reservation VALUES("6","","","","","","","","2021-12-16 02:06:40","");
INSERT INTO equipment_reservation VALUES("7","","","","","","","","2021-12-16 02:13:06","");
INSERT INTO equipment_reservation VALUES("8","ff","faf","faf","fafa","faf","","","2021-12-16 03:21:03","faf");
INSERT INTO equipment_reservation VALUES("9","hgeh","hdhd","hdhd","dhdh","hdh","","","2021-12-18 22:08:52","hdhd");
INSERT INTO equipment_reservation VALUES("10","ffaf","fafaf","fafa","faf","faf","","","2022-01-03 22:09:48","gfag");
INSERT INTO equipment_reservation VALUES("11","fafaf","","","","","","","2022-01-13 00:30:54","");



CREATE TABLE `expenses` (
  `Id` int(200) NOT NULL AUTO_INCREMENT,
  `Expenses` int(200) NOT NULL,
  `Date` date NOT NULL,
  `Collection` int(200) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=utf8mb4;

INSERT INTO expenses VALUES("113","0","2022-04-23","0");
INSERT INTO expenses VALUES("154","0","2022-04-23","1010");
INSERT INTO expenses VALUES("155","0","2022-04-23","1010");
INSERT INTO expenses VALUES("156","0","2022-04-23","1100");
INSERT INTO expenses VALUES("157","250","2022-04-25","0");
INSERT INTO expenses VALUES("158","3004","2022-04-26","0");
INSERT INTO expenses VALUES("159","250","2022-04-26","0");
INSERT INTO expenses VALUES("160","3004","2022-04-26","0");
INSERT INTO expenses VALUES("161","3004","2022-04-26","0");
INSERT INTO expenses VALUES("162","3004","2022-04-26","0");
INSERT INTO expenses VALUES("163","3004","2022-04-26","0");
INSERT INTO expenses VALUES("164","3004","2022-04-26","0");
INSERT INTO expenses VALUES("165","3004","2022-04-26","0");
INSERT INTO expenses VALUES("166","3004","2022-04-26","0");
INSERT INTO expenses VALUES("167","3004","2022-04-26","0");
INSERT INTO expenses VALUES("168","3004","2022-04-26","0");
INSERT INTO expenses VALUES("169","3004","2022-04-26","0");
INSERT INTO expenses VALUES("170","3004","2022-04-26","0");
INSERT INTO expenses VALUES("171","3004","2022-04-26","0");
INSERT INTO expenses VALUES("172","3004","2022-04-26","0");
INSERT INTO expenses VALUES("173","3004","2022-04-26","0");
INSERT INTO expenses VALUES("174","3004","2022-04-26","0");
INSERT INTO expenses VALUES("175","250","2022-04-26","0");
INSERT INTO expenses VALUES("176","3004","2022-04-26","0");
INSERT INTO expenses VALUES("177","3004","2022-04-26","0");
INSERT INTO expenses VALUES("178","3140","2022-04-26","0");
INSERT INTO expenses VALUES("179","250","2022-04-27","0");



CREATE TABLE `facility` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(250) CHARACTER SET latin1 NOT NULL,
  `name_of_room` varchar(250) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `status` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

INSERT INTO facility VALUES("39","upload/comlab_1651685826.jpg","fafaf","fafafaddddddddddddzzzzz","Not-Avalable");



CREATE TABLE `facility_complain` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(250) NOT NULL,
  `gmail` varchar(250) NOT NULL,
  `company` varchar(250) NOT NULL,
  `type_of_facility` varchar(250) NOT NULL,
  `complain` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

INSERT INTO facility_complain VALUES("1","dadad","dadad","dad","","dadad","dadad","2021-12-13 18:49:51");
INSERT INTO facility_complain VALUES("2","faf","faf","faf","faf","faf","faf","2021-12-13 18:58:31");
INSERT INTO facility_complain VALUES("3","","","","","","","2021-12-13 20:08:21");
INSERT INTO facility_complain VALUES("4","","","","","","","2021-12-13 20:09:11");
INSERT INTO facility_complain VALUES("5","faf","","af","faf","","faf","2021-12-13 20:10:45");
INSERT INTO facility_complain VALUES("6","faf","","faf","faf","","faf","2021-12-13 20:12:16");
INSERT INTO facility_complain VALUES("7","daf","","faf","faf","","fa","2021-12-13 20:13:41");
INSERT INTO facility_complain VALUES("8","afaf","faf","faf","faf","faf","af","2021-12-13 20:19:33");
INSERT INTO facility_complain VALUES("9","fqffaf","","","","","","2022-01-12 22:44:34");
INSERT INTO facility_complain VALUES("10","ggggggggggggggggggg","","","","","","2022-01-12 22:45:56");
INSERT INTO facility_complain VALUES("11","aaaaaaaaaaaaaaaaa","fafafaf@gmail.com","dad","fafaf","faf","fafaf","2022-01-12 22:49:06");
INSERT INTO facility_complain VALUES("12","adadadadadaddddddddddddd","d@gmail.com","aaa","aaa","aaa","aaa","2022-01-12 22:50:08");
INSERT INTO facility_complain VALUES("13","gggggggggggggggggggggggggg","ffafaf@gmail.com","dadad","dadad","dad","dadada","2022-01-12 23:56:08");
INSERT INTO facility_complain VALUES("14","dadad","dada@gmail.com","dadad","dadad","dadad","dadaddadddddddddddddddddddddd","2022-01-13 00:12:52");



CREATE TABLE `facility_reservation` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
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
  `purpose` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

INSERT INTO facility_reservation VALUES("7","0","","","","0","","","","","","2021-12-07 22:08:29","","","");
INSERT INTO facility_reservation VALUES("8","535","","","","0","","","","","","","","","");
INSERT INTO facility_reservation VALUES("9","0","","","","0","","","","","faf","2021-12-07 22:11:20","","","");
INSERT INTO facility_reservation VALUES("10","0","","","","0","","","","","","2021-12-07 22:12:25","","","f");
INSERT INTO facility_reservation VALUES("11","56454","fafa","faf","faf","4343","fafa","fafa","fafa","fafa","fafa","2021-12-07 23:11:24","fafa","faf","fafa");
INSERT INTO facility_reservation VALUES("12","65464","agag","gag","gag","54564","gagag","gaga","gaga","gaga","gag","2021-12-08 21:31:16","gag","gag","gaga");
INSERT INTO facility_reservation VALUES("13","0","","","gagaga","0","","","","","","2021-12-15 05:30:19","","","");
INSERT INTO facility_reservation VALUES("14","0","","","","0","fafafafa","","","","","2021-12-15 05:30:37","","","");
INSERT INTO facility_reservation VALUES("15","0","","","","0","gg","","","","","2021-12-15 05:45:39","","","");
INSERT INTO facility_reservation VALUES("16","788675665","paps","mams","chuchu","0","","","","","","2021-12-30 15:03:26","","","");



CREATE TABLE `facility_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO facility_status VALUES("1","Available");
INSERT INTO facility_status VALUES("2","unavailable");



CREATE TABLE `final_interview` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(500) NOT NULL,
  `final_average` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_applicant_id` (`applicant_id`),
  CONSTRAINT `FK_applicant_id` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

INSERT INTO final_interview VALUES("37","20220021","2022-03-02","22:29:00","zzx","90");
INSERT INTO final_interview VALUES("39","20220013","2022-03-24","19:55:00","d","90");



CREATE TABLE `general_journal` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `journal_date` date NOT NULL,
  `description` text NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;




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

INSERT INTO group_list VALUES("1","Assets","The cash, inventory, and other resources you owned.","1","1","0","2022-02-01 09:56:35","2022-02-01 09:56:58");
INSERT INTO group_list VALUES("2","Revenue","Cash coming into your business through sales and other types of payments","2","1","0","2022-02-01 09:57:45","");
INSERT INTO group_list VALUES("3","Expenses","The amount you’re spending on services and other items, like payroll, utility bills, and fees for contractors.","1","1","0","2022-02-01 09:58:09","2022-02-01 09:59:13");
INSERT INTO group_list VALUES("4","Liabilities","The money you still owe on loans, debts, and other obligations.","2","1","0","2022-02-01 09:58:34","");
INSERT INTO group_list VALUES("5","Equity","How much is remaining after you subtract liabilities from assets.","2","1","0","2022-02-01 09:59:05","");
INSERT INTO group_list VALUES("6","Dividend","Form of income that shareholders of corporations receive for each share of stock that they hold.","1","1","0","2022-02-01 10:00:13","");
INSERT INTO group_list VALUES("7","Sample101","Sample","1","0","1","2022-02-01 10:01:35","2022-02-01 10:03:28");
INSERT INTO group_list VALUES("8","Cash","paid in cash","2","1","0","2022-04-01 15:05:20","");



CREATE TABLE `hr1files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `req_id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `Body` text DEFAULT NULL,
  `preparedby` varchar(250) DEFAULT NULL,
  `urlpath` varchar(250) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `sec_dep` text DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

INSERT INTO hr1files VALUES("22","30330045","employee contract","idodloooo","Admin","uploads/Template.docx","2022-05-01","HR1","2022-05-13","2022-05-26","signed");
INSERT INTO hr1files VALUES("23","30330045","Project Proposal Contract","NEW BUILDING","Admin","contract_uploads/dexter-gabule-ojt-formWeek4.docx","2022-05-03","Logistic 1","2022-05-04","2022-06-03","1");
INSERT INTO hr1files VALUES("24","30330047","employee contract","zadsa","Admin","uploads/CCS-GRADING-SHEET-CAP1-3 Banking System HR 1.docx","2022-05-03","HR1","2022-05-03","2022-05-18","signed");
INSERT INTO hr1files VALUES("25","30330047","employee contract","asdasd","Admin","contract_uploads/CCS-GRADING-SHEET-CAP1-3 Banking System HR 1.docx","2022-05-03","HR1","2022-05-06","2022-05-04","1");



CREATE TABLE `image_tb` (
  `imageid` int(11) NOT NULL AUTO_INCREMENT,
  `img_location` varchar(150) NOT NULL,
  PRIMARY KEY (`imageid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

INSERT INTO image_tb VALUES("23","upload/comlab_1651685826.jpg");
INSERT INTO image_tb VALUES("24","upload/conference_1651733951.jpg");
INSERT INTO image_tb VALUES("25","upload/Luxury Office_1651736023.jpg");
INSERT INTO image_tb VALUES("26","upload/lobby_1651736031.jpg");
INSERT INTO image_tb VALUES("27","upload/271913542_621039062325095_8928246852636406045_n_1651741605.jpg");



CREATE TABLE `initial_interview` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(500) NOT NULL,
  `initial_average` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_applicant` (`applicant_id`),
  CONSTRAINT `FK_applicant` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4;

INSERT INTO initial_interview VALUES("60","20220021","2022-03-14","15:34:00","s","90");
INSERT INTO initial_interview VALUES("62","20220013","2022-03-24","19:52:00","sasda","90");
INSERT INTO initial_interview VALUES("66","20220029","2022-04-14","15:41:00","sogo","0");
INSERT INTO initial_interview VALUES("67","20220018","2022-04-16","15:59:00","Sugo","0");
INSERT INTO initial_interview VALUES("68","20220032","2022-04-16","15:08:00","BCP","0");
INSERT INTO initial_interview VALUES("69","20220014","2022-04-16","15:13:00","Sugo","0");
INSERT INTO initial_interview VALUES("70","20220028","2022-04-16","15:24:00","Sugo","0");



CREATE TABLE `job` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_name` varchar(100) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO job VALUES("1","Manager");
INSERT INTO job VALUES("2","Teller");
INSERT INTO job VALUES("3","Guard");



CREATE TABLE `job_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  `company` varchar(500) NOT NULL,
  `position` varchar(500) NOT NULL,
  `date_started` date NOT NULL,
  `date_ended` date NOT NULL,
  `years_of_service` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_job_history` (`applicant_id`),
  CONSTRAINT `FK_job_history` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `job_qualifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(200) NOT NULL,
  `job_desc` varchar(1000) NOT NULL,
  `job_quali` varchar(1000) NOT NULL,
  `salary` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

INSERT INTO job_qualifications VALUES("1","Recruitment Staff","The person who manages the recruitment process of the company","Atleast bachelors degree in BSBA major in Human resource or any other related course","210000","hr");
INSERT INTO job_qualifications VALUES("2","Personal assistant","perform secretarial work and provide senior managers with day-to-day administrative support. Their duties include answering phone calls and managing correspondence, scheduling appointments, and making travel arrangements. They may also be required to organize events.","Computer literacy. Verbal and written articulacy. Professional discretion. Efficiency. Well-developed time management skills. Strong organisational skills.","133632","hr");
INSERT INTO job_qualifications VALUES("3","Training Manager","Training managers are specialists who help businesses by developing, facilitating and supervising training programs for employees. They assess the needs of a business, implement training and development plans, and facilitate a wide variety of training programs that enhance the effectiveness of the workforce","Proven work experience as a Training Manager. Track record in designing and executing successful training programs. Familiarity with traditional and modern training methods (mentoring, coaching, on-the-job or in classroom training, e-learning, workshops, simulations etc)","729329","hr");
INSERT INTO job_qualifications VALUES("4","HR Manager","Responsible for overseeing personnel and daily operations of the human resources department. Their duties include hiring HR personnel, managing the hiring and onboarding procedures for other company employees and coordinating with members of their department to provide support to company employees regarding personal and professional incidents. ","Strong computer skills and experience with offices management and communication software. Ability to understand statistical data and mathematical concepts and how to apply them to HR processes. Excellent leadership, training and development skills. Strong decision-making skills. Exceptional verbal and written communication skills. Expert in labor laws set by governing authorities and organizations. Ability to comprehend complex language, theories and methodologies. Time management and organizational skills. ","25000","hr");
INSERT INTO job_qualifications VALUES("5","dbsksnx","bdirofppvb","dbcisn","1","log");
INSERT INTO job_qualifications VALUES("6","Supervisor ","responsible for managing the workflow and training new hires on how they can best serve customers and teams of employees. They also create schedules that keep everyone busy with deadlines met to prevent gaps or downtime while giving direction and feedback about what needs improvement."," complete degree programs in business or office administration to qualify for a position. Courses in a business administration program include management, organizational behavior and human resource management, which prepare the supervisor to direct and lead others in a work setting.","23924","hr");
INSERT INTO job_qualifications VALUES("8","Administrative staff","-Answering incoming calls; taking messages and re-directing calls as required -Dealing with email enquiries -Diary management and arranging appointments, booking meeting rooms and conference facilities Data entry (sales figures, property listings etc.) -General office management such as ordering stationary Organising travel and accommodation for staff and customers -Arranging both internal and external events -Possibly maintaining the company social media accounts -Providing administration support to Sales Reps, Property Managers and Senior Management","High school diploma or general education degree (GED) required. associate's degree in Business Administration preferred.","21000","admin");
INSERT INTO job_qualifications VALUES("14","Financial manager","The Financial Manager is responsible for the financial well-being of the organization. They develop strategies and plans for the organization’s long-term financial objectives, produce financial reports, and direct investment activities.","Proven work experience as a Finance Officer or similar role Solid knowledge of financial and accounting procedures Experience using financial software Advanced MS Excel skills Knowledge of financial regulations Excellent analytical and numerical skills Sharp time management skills Strong ethics, with an ability to manage confidential data BSc degree in Finance, Accounting or Economics Professional qualification as a CFA/CPA is considered a plus","46732","financials");
INSERT INTO job_qualifications VALUES("15","Logistics manager ","responsible for managing the workflow and training new hires on how they can best serve customers and teams of employees. They also create schedules that keep everyone busy with deadlines met to prevent gaps or downtime while giving direction and feedback about what needs improvement.","professionals who are responsible for ensuring that the supply chain is efficient and effective throughout their organization. They organize, store and monitor the distribution of goods to ensure items and resources are shipped to their appropriate destinations. ","481188","log");
INSERT INTO job_qualifications VALUES("16","Client Service","Managing client inquiries via phone, email, online, or in person. Directing client complaints or complex queries to relevant departments in a timely manner. Providing clients with technical assistance on products and services. Expediting s","Business degree or related qualification. Strong communication skills. Ability to meet deadlines. Computer literacy. Calm, polite, and professional behavior. Reliable and self-motivated. General business knowledge. High service orientation.","246864","financials");
INSERT INTO job_qualifications VALUES("17","Customer Service – Finance.","Customer service representatives in financial institutions process customers' financial transactions and provide information on related banking products and services. They are employed by banks, trust companies, credit unions and similar financial institutions","Completed at least 2 year associate degree or 2 years in college with no back subjects. Must possess good English communication skills. No experience required; BPO or customer facing experience an advantage. Amenable to work on shifting schedule. Willing to work in Makati (near EDSA)","32","financials");
INSERT INTO job_qualifications VALUES("18","Chief Financial Officer (CFO)","The chief financial officer (CFOs) holds the top financial position in an organization. They are responsible for tracking cash flow and financial planning and analyzing the company's financial strengths and weaknesses and proposing strategic directions","Serving as a CFO requires a background in accounting or finance and an advanced business degree, generally including an MBA. CFOs must also have experience analyzing data to make recommendations on financial and organizational strategy","2400000","financials");
INSERT INTO job_qualifications VALUES("19","Junior financial analyst","The Financial Manager is responsible for the financial well-being of the organization. They develop strategies and plans for the organization’s long-term financial objectives, produce financial reports, and direct investment activities.","A financial analyst culls data to help companies make business decisions or investors take action, such as to buy or sell a stock or other security. They weigh macroeconomic and microeconomic issues, and company fundamentals to make predictions about firms, sectors, and industries. A bachelor's degree in something math or finance-related is a given and moving up to the senior level means getting certifications and/or an MBA. A recent college graduate can expect to start at the junior level, under the supervision of a more senior analyst. Someone with a few years of experience, several key certifications, and an MBA from a prestigious university can move up to a senior role.","21025","financials");
INSERT INTO job_qualifications VALUES("22","Payroll assistant","Payroll assistants gather timesheets, capture time worked, and draft paychecks before employees are compensated. Payroll assistants are commonly known as payroll clerks. Completely free trial, no card required","Proven work experience as a Payroll Officer, Payroll Clerk or similar role. Hands-on experience with HRIS and accounting software. Strong math skills with an ability to spot numerical errors. Good knowledge of labor legislation. Time-management skills. Ability to handle confidential information.","17226","financials");
INSERT INTO job_qualifications VALUES("24","Finance clerk","Preparing and processing financial documents such as bills, receipts, and invoices. Updating and maintaining the database, financial records, and filing systems. Tracking and monitoring financial transactions. Reviewing financial records, documents, and information to ensure their accuracy.","Proven experience as a Finance Clerk. Knowledge of basic bookkeeping and financial transactions. Familiarity with financial regulations, i.e. Generally Accepted Accounting Principles (GAAP) Knowledge of MS Office and databases. Attention to detail. Organizational and multitasking abilities.","18301","financials");
INSERT INTO job_qualifications VALUES("25","Sales Manager","Sales managers are responsible for leading sales teams to reach sales targets. Sales managers are primarily tasked with hiring and training team members, setting quotas, evaluating and adjusting performance, and developing processes that drive sales. Sales managers are oftentimes expected to travel.","Bachelor's degree in marketing or business administration. 7+ years in sales management within a corporate setting. Proven track record of success the sales cycle from plan to close. Excellent communication, interpersonal, and organizational skills. Superb leadership ability","719117","core");
INSERT INTO job_qualifications VALUES("26","Financial advisor assistant","Responsibilities · Assist financial advisors with daily activities, including maintaining calendars, preparing correspondence, and providing customer service ","Bachelor's degree in business, finance, or related field. 1-2 years of sales experience. Must have current FINRA Series 7 and 63 Securities Registration (66 or 65 preferred). Life and health license. Valid driver’s license. Knowledge of mutual funds, securities, and insurance industries. Proficient in Word, Excel, Outlook, and PowerPoint. Comfortable using a computer for various tasks. Experience providing quality financial advice.","35704","financials");
INSERT INTO job_qualifications VALUES("27","Logistics manager ","responsible for managing the workflow and training new hires on how they can best serve customers and teams of employees. They also create schedules that keep everyone busy with deadlines met to prevent gaps or downtime while giving direction and feedback about what needs improvement.","professionals who are responsible for ensuring that the supply chain is efficient and effective throughout their organization. They organize, store and monitor the distribution of goods to ensure items and resources are shipped to their appropriate destinations. ","481188","log");
INSERT INTO job_qualifications VALUES("28","Office management","Duties and responsibilities include scheduling meetings and appointments, making office supplies arrangements, greeting visitors and providing general administrative support to our employees","A bachelor degree or equivalent. Five years of experience in office administration. Office management experience. Excellent computer skills, including a high degree of proficiency in Microsoft Word, Excel, Outlook, and PowerPoint.","366","admin");
INSERT INTO job_qualifications VALUES("29","Office management","Duties and responsibilities include scheduling meetings and appointments, making office supplies arrangements, greeting visitors and providing general administrative support to our employees","A bachelor degree or equivalent. Five years of experience in office administration. Office management experience. Excellent computer skills, including a high degree of proficiency in Microsoft Word, Excel, Outlook, and PowerPoint.","366","admin");
INSERT INTO job_qualifications VALUES("30","Office management","Duties and responsibilities include scheduling meetings and appointments, making office supplies arrangements, greeting visitors and providing general administrative support to our employees","A bachelor degree or equivalent. Five years of experience in office administration. Office management experience. Excellent computer skills, including a high degree of proficiency in Microsoft Word, Excel, Outlook, and PowerPoint.","366","admin");
INSERT INTO job_qualifications VALUES("31","Office management","responsible for keeping an office running smoothly and overseeing administrative support. The job can range widely in duties and responsibilities, from reception, copy editing and support, to handling a specific type of paperwork or filing for a specific department.","A bachelor degree or equivalent five years of experience in office administration office management experience excellent computer skills including a high degree of proficiency in microsoft word,excel,outlook,and powerpoint.","336","admin");
INSERT INTO job_qualifications VALUES("32","Office management","responsible for keeping an office running smoothly and overseeing administrative support. The job can range widely in duties and responsibilities, from reception, copy editing and support, to handling a specific type of paperwork or filing for a specific department.","A bachelor degree or equivalent five years of experience in office administration office management experience excellent computer skills including a high degree of proficiency in microsoft word,excel,outlook,and powerpoint.","336","admin");
INSERT INTO job_qualifications VALUES("33","Office management","responsible for keeping an office running smoothly and overseeing administrative support. The job can range widely in duties and responsibilities, from reception, copy editing and support, to handling a specific type of paperwork or filing for a specific department.","A bachelor degree or equivalent five years of experience in office administration office management experience excellent computer skills including a high degree of proficiency in microsoft word,excel,outlook,and powerpoint.","336","admin");



CREATE TABLE `job_vacancy` (
  `job_id` int(10) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(250) NOT NULL,
  `no_of_vacancy` int(10) NOT NULL,
  `job_description` varchar(1000) NOT NULL,
  `job_qualification` varchar(1000) NOT NULL,
  `department` varchar(100) NOT NULL,
  `salary` int(10) NOT NULL,
  `date_of_request` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=110008 DEFAULT CHARSET=utf8mb4;

INSERT INTO job_vacancy VALUES("110001","HR staff","4"," A bank teller works in a bank and is responsible for helping members cash checks, withdraw money, move transactions to different accounts, create checking and savings accounts, and provide checks to customers. Bank tellers should have ethical standards and practice confidentiality to uphold member account information. They should also have good problem-solving skills and be able to communicate verbally. Typically, bank teller candidates need at least a high school diploma or GED to qualify for a position.","Bachelor's degree in a relevant field may be preferred.
Cash handling experience and on-the-job training may be required.
Ability to pass a background check.
Exceptional time management, communication, and customer service skills.","HR1","30000","2022-01-03","pending");
INSERT INTO job_vacancy VALUES("110002","Bank Teller","2"," A banker works at a bank or financial institution. They are responsible for meeting with bank members (both individuals or companies) and helping them acquire loans through the bank. By doing this, they aim to help the bank earn money by applying fees and interest rates to those loans. Bankers can also meet with clients for a paid consultation to advise them on financial matters such as investments and capital resources.","Candidates must have passed class 12th in commerce stream from a recognised board. Must have a bachelor's degree in B.com/ B.A. (Economics) degree from a recognised university. Candidates must have an MBA degree in investment banking to become an investment banker.","IT dept","30000","2021-10-01","pending");
INSERT INTO job_vacancy VALUES("110003","credit analyst","3","A credit analyst can work for an investment bank, an investment firm, credit card companies and any other institution where lending money is involved. They are responsible for reviewing an applicant's financial history and credit score. The main difference between a credit analyst and other professions like a loan processor is that they can only provide a recommendation as to whether or not an applicant should be approved. Credit analysts usually have a Bachelor's Degree in Finance or Economics and extensive knowledge of statistics, financial statements and ratio analysis.","Accounting skills.
Knowledge of industry.
Computing skills.
Communication skills.
Problem-solving.
Attention to detail.
Documentation and organization skills.
Knowledge in risk analysis.","IT dept","30000","2022-04-14","pending");
INSERT INTO job_vacancy VALUES("110004","relationship manager","1"," A relationship manager works for a bank or financial institution and acts as the point of communication between members and the institution itself. Their main job duty includes maintaining customer loyalty by checking in with them by email or phone. They are also responsible for fostering relationships with new customers by helping them gain bank membership and create a checking or savings accountant. Relationship managers should have a bachelor's degree in communications, finance or business administration and should be excellent communicators.","Bachelor in business administration, marketing or a related field.
Three or more years' experience in customer service, sales or a related position.
Excellent verbal and written communication skills.
Ability to lead and work within a team.","IT dept","30000","2022-02-23","approved");
INSERT INTO job_vacancy VALUES("110005","financial advisor","5"," A financial advisor works as part of a financial institution to help clients determine their financial goals and the best means to achieve them. This entails trading for them in the stock markets, reviewing their financial history and providing them with advice for the best decisions they can make for their finances. Financial advisor candidates need to have at least a bachelor's degree in an area like economics, statistics, finance or business. They should also have a few years of experience in a finance-related role, like an investment specialist/banker or credit analyst.","
knowledge of economics and accounting for understanding financial markets and products. maths knowledge for creating financial plans. the ability to sell products and services. excellent verbal communication skills.","IT dept","30000","2022-03-09","pending");
INSERT INTO job_vacancy VALUES("110006","financial analyst","5","A financial analyst is responsible for monitoring market trends across industries and using their expertise to guide businesses and clients on when, where and how to invest. Financial analysts typically work for major corporations, financial institutions, insurance companies and banks. To become a financial analyst, you should have at least a bachelor's degree in economics, finance or accounting. For senior positions, most employers prefer that you have a master's degree in a specialty area like statistics.","bachelor's degree specifically in a field related to finance, including finance and accounting, economics, statistics, analytics, business management, or mathematics.","IT dept","30000","2022-04-12","pending");
INSERT INTO job_vacancy VALUES("110007","internal auditor","2"," Internal auditors for banks have a responsibility to complete routine assessments of the bank's internal procedures, loan and spending habits, employment expenses and other risk management factors. Their main goal is to determine whether the bank complies with laws and regulations and if they are financially stable. Internal auditor candidates should have at least a bachelor's degree in management, accounting, business administration or finance. A master's degree may be preferred for more senior roles.","An entry-level internal auditor position generally requires at least a bachelor's degree, preferably in a business discipline such as accounting, finance, management, public administration or computer information systems. Some companies may seek out entry-level job candidates with degrees in engineering or other technical subjects related to the company's operations.

Senior positions in the field typically require bachelor's degrees and substantial professional experience in internal auditing. While a graduate degree is not usually required for advancement in the field, a Master's in Business Administration (MBA) or another relevant subject can provide an important advantage in the job market, especially for leadership positions in internal audit departments.","IT dept","30000","2022-04-22","pending");



CREATE TABLE `jobplan` (
  `jp_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `jp_tax` int(11) NOT NULL,
  PRIMARY KEY (`jp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO jobplan VALUES("2","Manager","Casual","1-Year","30000","1000","125","62","50","75","25","250");
INSERT INTO jobplan VALUES("11","Manager","Regular","2-year","1000","457","68","5","150","150","150","150");
INSERT INTO jobplan VALUES("12","Teller","Regular","3-years","7500","457","68","48","200","200","200","200");



CREATE TABLE `journal_items` (
  `journal_id` int(30) NOT NULL,
  `account_id` int(30) NOT NULL,
  `group_id` int(30) NOT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO journal_items VALUES("35","107","1","3004","2022-04-26 22:57:44");
INSERT INTO journal_items VALUES("35","1","8","3004","2022-04-26 22:57:44");
INSERT INTO journal_items VALUES("36","1002","3","3140","2022-04-26 23:22:10");
INSERT INTO journal_items VALUES("36","1","8","3140","2022-04-26 23:22:10");
INSERT INTO journal_items VALUES("37","1001","3","250","2022-04-27 13:30:30");
INSERT INTO journal_items VALUES("37","1","8","250","2022-04-27 13:30:30");



CREATE TABLE `learning_management` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `seminar_title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_laerning` (`employee_id`),
  CONSTRAINT `FK_laerning` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO learning_management VALUES("7","30330028","First Aid","2022-03-19","complete");



CREATE TABLE `loan_payment` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `P_Amount` int(200) NOT NULL,
  `P_Penalty` int(200) NOT NULL,
  `P_Date` date NOT NULL,
  `A_Number` int(200) NOT NULL,
  `P_RemainingBalance` int(200) NOT NULL,
  `P_Type` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO loan_payment VALUES("1","1000","100","2022-04-23","18011424","50000","Loan Payment");



CREATE TABLE `logistic1files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `req_id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `Body` text DEFAULT NULL,
  `preparedby` varchar(250) DEFAULT NULL,
  `urlpath` varchar(250) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `sec_dep` text DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

INSERT INTO logistic1files VALUES("39","4"," Project Contract","fafaf","Admin","contract/CREDIT-MEMO.docx","2022-05-09","LOGISTIC1","2022-05-30","2022-05-31","Downloaded");
INSERT INTO logistic1files VALUES("40","4"," Project Contract","fafafaf","Staff","contract/BSIT_January_16_1Pm UPDATED KUNO.docx","2022-05-11","LOGISTIC1","2022-05-15","2022-05-22","Downloaded");



CREATE TABLE `maintenance_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requestor` varchar(250) DEFAULT NULL,
  `department` varchar(250) DEFAULT NULL,
  `name_of_equipment` varchar(250) DEFAULT NULL,
  `issue` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `manpower_request` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_needed` int(11) NOT NULL,
  `qualification_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date_of_request` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`request_id`),
  KEY `FK_quali` (`qualification_id`),
  CONSTRAINT `FK_quali` FOREIGN KEY (`qualification_id`) REFERENCES `job_qualifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO manpower_request VALUES("1","3","1","pending","2022-05-01");



CREATE TABLE `mortgages` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
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
  `date_of_loan` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11002111105 DEFAULT CHARSET=utf8mb4;

INSERT INTO mortgages VALUES("11002111100","","","","","","","","","","","","","","","","","","","","","2021-12-15 02:01:14");
INSERT INTO mortgages VALUES("11002111101","50000","faf","faf","","dexter","","","","","","","","","","","","","","","","2021-12-15 02:02:24");
INSERT INTO mortgages VALUES("11002111102","0","fffc","fffc","fffc","","","","","","","","","","0","","0","","0","","","2021-12-30 14:07:23");
INSERT INTO mortgages VALUES("11002111103","4535646","3 tyrd","3 tyrd","3 tyrd","shaloyou","","","","","","","","","0","","0","","0","","","2021-12-30 14:08:27");
INSERT INTO mortgages VALUES("11002111104","84195385767","3 yeyh","3 yeyh","3 yeyh","kim","","","","","","","","","0","","0","","0","","","2021-12-30 14:10:17");



CREATE TABLE `new_hires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_employee` (`employee_id`),
  CONSTRAINT `FK_employee` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;

INSERT INTO new_hires VALUES("42","30330029","ongoing orientation");
INSERT INTO new_hires VALUES("45","30330029","ongoing orientation");



CREATE TABLE `obudget` (
  `Id` int(200) NOT NULL AUTO_INCREMENT,
  `Budget` int(200) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO obudget VALUES("1","773441","2021-03-12");



CREATE TABLE `ongoing_project_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prop_proj` varchar(255) NOT NULL,
  `proj_name` varchar(255) NOT NULL,
  `loc` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `proj_man` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

INSERT INTO ongoing_project_list VALUES("18","asd","asd","asd","asd","2022-05-07","2022-05-31","asdasd");



CREATE TABLE `orientation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_employeeid` (`employee_id`),
  CONSTRAINT `FK_employeeid` FOREIGN KEY (`employee_id`) REFERENCES `new_hires` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `pass_key` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `pkey` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE TABLE `passed_applicant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `applicant` (`applicant_id`),
  CONSTRAINT `applicant` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

INSERT INTO passed_applicant VALUES("27","20220013");
INSERT INTO passed_applicant VALUES("24","20220021");
INSERT INTO passed_applicant VALUES("25","20220021");



CREATE TABLE `payroll` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_eid` varchar(100) NOT NULL,
  `p_bs` int(11) NOT NULL,
  `p_ot` int(11) NOT NULL,
  `p_hra` int(11) NOT NULL,
  `p_con` int(11) NOT NULL,
  `p_oa` int(11) NOT NULL,
  `p_date` varchar(100) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

INSERT INTO payroll VALUES("1","e000001","240","120","1000","2000","3000","2022-04-01");
INSERT INTO payroll VALUES("25","e000001","457","3","500","300","300","2022-04-28");
INSERT INTO payroll VALUES("27","e000002","457","3","300","300","300","2022-05-19");



CREATE TABLE `performance_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_performance` (`employee_id`),
  CONSTRAINT `FK_performance` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

INSERT INTO performance_review VALUES("18","30330030","2022-04-09","91","87","98","95","93","90","89","83","88","83","97","96","90.8333","","approved");
INSERT INTO performance_review VALUES("19","30330028","2022-01-12","90","90","90","90","90","90","90","90","90","90","90","90","90","","approved");
INSERT INTO performance_review VALUES("20","30330042","2022-02-02","90","78","93","89","86","86","84","87","89","90","87","76","86.25","","approved");
INSERT INTO performance_review VALUES("21","30330044","2022-03-02","85","78","78","78","78","78","78","89","83","81","96","71","81.0833","","approved");
INSERT INTO performance_review VALUES("22","30330043","2022-05-02","54","80","67","78","83","96","93","86","93","83","84","84","81.75","","approved");
INSERT INTO performance_review VALUES("23","30330038","2022-05-02","60","60","60","60","60","60","60","60","60","60","60","60","60","","approved");
INSERT INTO performance_review VALUES("24","30330035","2022-05-02","30","30","33","30","30","30","30","30","30","30","30","30","30.25","","approved");



CREATE TABLE `posted_jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `no_of_vacancy` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_jobID` (`job_id`),
  CONSTRAINT `FK_jobID` FOREIGN KEY (`job_id`) REFERENCES `job_vacancy` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

INSERT INTO posted_jobs VALUES("36","110004","posted","1");



CREATE TABLE `procurment` (
  `Co_Code` int(200) NOT NULL AUTO_INCREMENT,
  `PRO_Requestor` varchar(200) NOT NULL,
  `PRO_Department` varchar(200) NOT NULL,
  `Co_Status` int(200) NOT NULL,
  `PRO_Desc` varchar(200) NOT NULL,
  `Co_Amount` int(200) NOT NULL,
  `PRO_Date` date NOT NULL,
  `PRO_Supplier` varchar(255) NOT NULL,
  `PRO_City` varchar(255) NOT NULL,
  `PRO_Country` varchar(255) NOT NULL,
  `PRO_Address` varchar(255) NOT NULL,
  PRIMARY KEY (`Co_Code`),
  KEY `FK_procurment` (`Co_Status`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4;

INSERT INTO procurment VALUES("101","Elvira Barbosa","Logistics 2","102","For purchase of new machines","3000000","2021-11-30","Hp links","Quezon city","Philippines","san ben calocas kaligayahan");
INSERT INTO procurment VALUES("102","Critina Vargas","Logistics 2","102","For purchase of land","4000000","2021-11-29","Camella","Calocan","Philippines","san ben calocas kaligayahan");
INSERT INTO procurment VALUES("104","Allie Adams","Logistics 2","102","For purchase of new machines","3000000","2022-01-11","hexa mech tools","Quezon city","Philippines","san bartolome, Q.C.");
INSERT INTO procurment VALUES("105","Alex Abadi","Logistics 2","102","For purchase of new machines","3000000","2022-01-12","Forward machines","Quezon city","Philippines","san bartolome, Q.C.");
INSERT INTO procurment VALUES("106","Kara Mary","Logistics 2","102","For purchase of new machines","3000000","2022-01-13","Vision tools","Calocan City","Philippines","Reparo, Caloocan City");
INSERT INTO procurment VALUES("107","Rickiew Aliman","Logistics 2","102","For purchase of new machines","3004","2022-01-14","belter tools","Valenzuela City","Philippines","Gen-T, Valenzuela City");
INSERT INTO procurment VALUES("108","Daniel Alexander","Logistics 2","102","For purchase of land","3000000","2022-01-15","Camella","Pasay City","Philippines","Diosdado, Pasay City");
INSERT INTO procurment VALUES("109","Sam Allen","Logistics 2","102","For purchase of land","3000000","2022-01-16","Villar","Paraniaque City","Philippines","Reparo, Caloocan City");
INSERT INTO procurment VALUES("110","Lucy Alvarez","Logistics 2","102","For purchase of new machines","3000000","2022-01-17","Factory machines","Makati City","Philippines","Reparo, Caloocan City");



CREATE TABLE `promoted` (
  `pr_id` int(11) NOT NULL AUTO_INCREMENT,
  `pr_eid` varchar(100) NOT NULL,
  `pr_from` varchar(100) NOT NULL,
  `pr_to` varchar(100) NOT NULL,
  `pr_date` varchar(100) NOT NULL,
  PRIMARY KEY (`pr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO promoted VALUES("1","e000001","Casual","Regular","2022-05-01");
INSERT INTO promoted VALUES("2","e000002","Casual","Regular","2005-01-23");
INSERT INTO promoted VALUES("3","e000004","Casual","Regular","2022-04-12");
INSERT INTO promoted VALUES("4","e000003","Casual","Regular","2022-04-28");



CREATE TABLE `proposals` (
  `Co_Code` int(200) NOT NULL AUTO_INCREMENT,
  `PR_Department` varchar(255) NOT NULL,
  `PR_Requestor` varchar(255) NOT NULL,
  `PR_Amount` int(200) NOT NULL,
  `PR_Date` date NOT NULL,
  `Co_Status` int(200) NOT NULL,
  PRIMARY KEY (`Co_Code`)
) ENGINE=InnoDB AUTO_INCREMENT=1110 DEFAULT CHARSET=utf8mb4;

INSERT INTO proposals VALUES("1100","HR1","jonathan","300000","2022-01-13","102");
INSERT INTO proposals VALUES("1101","HR2","Ian james","300000","2022-01-13","102");
INSERT INTO proposals VALUES("1103","HR3","Jaymie cabradillia","300000","2022-01-13","102");
INSERT INTO proposals VALUES("1104","HR4","Maricor guilliermo bituin","300000","2022-01-13","102");
INSERT INTO proposals VALUES("1105","CORE 1","jamela cruz","400000","2022-01-13","102");
INSERT INTO proposals VALUES("1106","CORE 2","Eliie sabinay","400000","2022-01-13","102");
INSERT INTO proposals VALUES("1107","LOG 1","theodore jhon valera","300000","2022-01-13","102");
INSERT INTO proposals VALUES("1108","LOG 2","Karl angelo","300000","2022-01-13","102");
INSERT INTO proposals VALUES("1109","Admin","michaela leigh valera","300000","2022-01-13","101");



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

INSERT INTO purchases VALUES("1","1001","Bus Fare","5","50","2021-10-12","250");
INSERT INTO purchases VALUES("2","1002","Meal","10","150","2021-11-12","1500");
INSERT INTO purchases VALUES("3","1002","Drinks","15","40","2021-11-12","600");
INSERT INTO purchases VALUES("4","1002","Deserts","12","20","2021-11-12","240");
INSERT INTO purchases VALUES("5","1003","Laptop","1","20000","2021-12-12","20000");
INSERT INTO purchases VALUES("6","1002","Drinks","20","40","2021-12-13","800");
INSERT INTO purchases VALUES("7","1003","Printer","1","30000","2021-12-13","30000");
INSERT INTO purchases VALUES("8","101","Printers","5","50000","2021-12-14","500000");
INSERT INTO purchases VALUES("9","102","Processor","4","16000","2021-12-14","16000");
INSERT INTO purchases VALUES("10","1","electricity","1","5000","2022-01-04","5000");
INSERT INTO purchases VALUES("11","1","gas","1","6000","2022-01-04","6000");
INSERT INTO purchases VALUES("12","1","Internet connections","1","2500","2022-01-04","2500");
INSERT INTO purchases VALUES("13","1","telephones","1","2300","2022-01-04","2300");
INSERT INTO purchases VALUES("14","1","water","1","2500","2022-01-04","2500");
INSERT INTO purchases VALUES("15","1004","chicken ","5","150","2022-01-02","750");
INSERT INTO purchases VALUES("16","1004","Meat","5","300","2022-01-02","1500");
INSERT INTO purchases VALUES("17","1004","drinks","10","15","2022-01-02","150");
INSERT INTO purchases VALUES("18","1005","laptop - Acer Nitro 5","1","21","2022-01-03","21");
INSERT INTO purchases VALUES("19","1006","keybroad-PSR- EW300","1","19998","2022-01-04","19998");
INSERT INTO purchases VALUES("20","1007","Bond paper - Hard copy ","1","815","2022-01-04","815");
INSERT INTO purchases VALUES("21","104","BTools 82 pcs tools socket","1","1729","2022-01-03","1729");
INSERT INTO purchases VALUES("22","105","CNC pressure spring machine","1","74200","2022-01-05","74200");
INSERT INTO purchases VALUES("23","106","Antenna Alignment tool ","1","6995","2022-01-05","6995");
INSERT INTO purchases VALUES("24","107","lotus Sheet finish Sander","1","1210","2022-01-06","1210");
INSERT INTO purchases VALUES("25","108","M-R-3 Acquired Property ","1","1000000","2022-01-06","1000000");
INSERT INTO purchases VALUES("26","109","Forbes Park property ","1","4000000","2022-01-07","4000000");
INSERT INTO purchases VALUES("27","110","Paper cup making machine","1","720000","2022-01-08","720000");
INSERT INTO purchases VALUES("28","2","Renovation ","0","200000","2022-01-03","200000");
INSERT INTO purchases VALUES("29","3","Transportation","0","100000","2022-01-09","100000");



CREATE TABLE `qualified_applicants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `qualified_applicants_ibfk_1` (`applicant_id`),
  CONSTRAINT `qualified_applicants_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4;

INSERT INTO qualified_applicants VALUES("47","20220013");
INSERT INTO qualified_applicants VALUES("57","20220014");
INSERT INTO qualified_applicants VALUES("55","20220018");
INSERT INTO qualified_applicants VALUES("44","20220021");
INSERT INTO qualified_applicants VALUES("58","20220028");
INSERT INTO qualified_applicants VALUES("54","20220029");
INSERT INTO qualified_applicants VALUES("56","20220032");



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
  `Co_Amount` int(200) NOT NULL,
  PRIMARY KEY (`Co_Code`)
) ENGINE=InnoDB AUTO_INCREMENT=1008 DEFAULT CHARSET=utf8mb4;

INSERT INTO reimbursment VALUES("1001","HR3","maircor bituin","2021-10-12","102","for buying equipment","HP technologies","sanbenisa","Quezon city","philippines","75000");
INSERT INTO reimbursment VALUES("1002","HR3","ian james barbosa","2021-10-12","102","for buying machines","intel core","caloocan city, brgy kaligayahan.","Caloocan city","philippines","75000");
INSERT INTO reimbursment VALUES("1003","HR3","ellie sabinay","2021-10-13","102","for buying food","jollibee corp","caloocan city, brgy kaligayahan.","Caloocan city","philippines","85000");
INSERT INTO reimbursment VALUES("1004","HR3","melanie cabradilla","2021-10-13","102","for buying food","mang inasa corp","caloocan city, brgy kaligayahan.","Caloocan city","philippines","85000");
INSERT INTO reimbursment VALUES("1005","HR3","elvira Aliga","2022-01-11","102","for loptop","ASUS","novaliches, quezon city.","Quezon city","philippines","55000");
INSERT INTO reimbursment VALUES("1006","HR3","Tin Pachoco","2022-01-11","102","for key board","FANTECH","cubao, quezon city.","Quezon city","philippines","55000");
INSERT INTO reimbursment VALUES("1007","HR3","Theodore jhon valera","2022-01-11","102","for bondpaper","HARD COPY","sampaloc, manila city.","Manila city","philippines","95000");



CREATE TABLE `request_contract` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `req_id` int(11) NOT NULL,
  `req_class` varchar(200) NOT NULL,
  `fname` text DEFAULT NULL,
  `mname` text DEFAULT NULL,
  `lname` text DEFAULT NULL,
  `type_of_contract` varchar(250) DEFAULT NULL,
  `department` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `date_of_request` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

INSERT INTO request_contract VALUES("22","66676","Client","fafaf","fafaf","fafa"," Memorandum Aggrement","CORE1","pending","2022-05-09 22:07:02");
INSERT INTO request_contract VALUES("23","434343","","","",""," ","CORE1","Pending","2022-05-09 22:15:48");
INSERT INTO request_contract VALUES("24","5665","","","",""," ","CORE1","Pending","2022-05-09 22:19:22");
INSERT INTO request_contract VALUES("25","666","","","",""," ","CORE1","Pending","2022-05-09 22:24:07");
INSERT INTO request_contract VALUES("26","43343","project manager","dafaf","faf","faf"," Project Contract","LOGISTIC1","Pending","2022-05-09 22:34:17");
INSERT INTO request_contract VALUES("27","4","project manager","a","a","a"," Project Contract","LOGISTIC1","Pending","2022-05-09 22:40:47");
INSERT INTO request_contract VALUES("28","4","Project Manager","fffffffffff","fffffffff","faf"," project contract","LOGISTIC1","Pending","2022-05-09 22:44:00");
INSERT INTO request_contract VALUES("29","54444","project manager","fafaffafa","fafa","fafaf"," project contract","LOGISTIC1","Pending","2022-05-11 23:52:03");
INSERT INTO request_contract VALUES("30","55","Client","ffa","fafa","faf"," Memorandum Aggrement","CORE1","Approve","2022-05-13 21:25:44");



CREATE TABLE `request_equipment` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `equipment_approval_id` bigint(11) NOT NULL,
  `facility_id` bigint(11) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `mname` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL,
  `time_date_request` datetime NOT NULL DEFAULT current_timestamp(),
  `list_equipment_request` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO request_equipment VALUES("10","0","0","ggagag","gagag","gagag","gaga","gaga","2022-05-06 00:53:33","gagag");



CREATE TABLE `request_facility` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
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
  `purpose` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

INSERT INTO request_facility VALUES("35","","agaga","gag","gag","","gag","gag","","","","2021-12-16 00:14:58","","","");
INSERT INTO request_facility VALUES("36","5555","park","jimin","suga","9777123244","shamtanpark@gmail.com","registrar","head","meeting","conference room","2021-12-16 02:43:36","8:00 am","5:00 pm","tff");
INSERT INTO request_facility VALUES("38","0","gabule","dexter","attres","0","lilgabs08@gmail.com","","","","","2022-04-06 17:04:45","","","");
INSERT INTO request_facility VALUES("39","0","DELA CRUZ","KIM","MAAT","9352423007","","HR DEPT.","MANAGER","","","2022-04-06 17:06:11","","","");



CREATE TABLE `resigned` (
  `rs_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `rs_reason` varchar(100) NOT NULL,
  `rs_date` varchar(100) NOT NULL,
  `rs_status` varchar(100) NOT NULL,
  PRIMARY KEY (`rs_id`),
  KEY `FK_resign` (`employee_id`),
  CONSTRAINT `FK_resign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO resigned VALUES("4","30330039","Professional development","2022-04-16","Approved");



CREATE TABLE `rules_and_regulation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ra_no` bigint(20) NOT NULL,
  `date` varchar(250) NOT NULL,
  `Description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO rules_and_regulation VALUES("12","121","2022-05-14","fafafaf");



CREATE TABLE `social_recognition` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `award` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_award` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO social_recognition VALUES("19","30330028","2022-03-19","First Aid","approved");
INSERT INTO social_recognition VALUES("20","30330028","2022-03-23","Leadership","approved");
INSERT INTO social_recognition VALUES("24","30330030","2022-04-12","Employee of the Month","approved");



CREATE TABLE `status` (
  `Status_Code` int(200) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) NOT NULL,
  PRIMARY KEY (`Status_Code`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4;

INSERT INTO status VALUES("101","Approved");
INSERT INTO status VALUES("102","Pending");
INSERT INTO status VALUES("103","Settled");
INSERT INTO status VALUES("104","Credit");
INSERT INTO status VALUES("105","Debit");
INSERT INTO status VALUES("106","Ongoing");
INSERT INTO status VALUES("107","Awaiting");



CREATE TABLE `student_loan` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
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
  `date_of_loan` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

INSERT INTO student_loan VALUES("1","gh","0","","","","0","","","","","","","","","0","0","","","","","","","2021-12-15 03:28:33");
INSERT INTO student_loan VALUES("3","","535353","","","","0","","","","","","","","","0","0","","","","","","","2022-01-02 15:37:33");
INSERT INTO student_loan VALUES("4","","0","faf","fafag","gaga","0","","","","","","","","","0","0","","","","","","","2022-01-02 15:40:30");
INSERT INTO student_loan VALUES("9","","0","","","","","","","","","","","fafa","faf","0","0","","","","","","","2022-01-02 15:56:02");
INSERT INTO student_loan VALUES("10","","0","","","","","","","","","","gsgs","gsgsg","gsgsg","0","0","","","","","","","2022-01-02 15:57:58");
INSERT INTO student_loan VALUES("11","","0","","","","","","","","","","","","","0","0","","","","fafaf","","","2022-01-02 16:07:39");
INSERT INTO student_loan VALUES("12","","0","","","","","","","","","","","","","0","0","","","","","","","2022-01-02 23:35:44");
INSERT INTO student_loan VALUES("13","fafafafafaf","0","","","","","","","","","","","","","0","0","","","","","","","2022-01-02 23:36:19");
INSERT INTO student_loan VALUES("14","gsgsgsgsgg","0","","","","","","","","","","","","","0","0","","","","","","","2022-01-02 23:38:09");
INSERT INTO student_loan VALUES("15","","0","","","jhojpujpp0[","","","","","","","","","","0","0","","","","","","","2022-01-02 23:39:59");
INSERT INTO student_loan VALUES("16","gsgsgsgsg","0","","","","","","","","","","","","","0","0","","","","","","","2022-01-02 23:41:22");
INSERT INTO student_loan VALUES("17","fafafafafaf","446646","agag","gagag","","","","","","","","","","","0","0","","","","","","","2022-01-02 23:45:27");



CREATE TABLE `tblleaves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `remaining_days` int(50) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_empl` (`employee_id`),
  CONSTRAINT `FK_leave` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tblleaves VALUES("1","Vacation leave","2021-12-15","2021-12-19","I have to refresh myself, I am in a stressful scene of my life right now.","2021-12-15","Okay","2021-12-15 23:38:42 ","1","1","30330030","0","5","4");



CREATE TABLE `time_and_attendance` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `user_level` int(11) NOT NULL,
  `calculated_work` int(11) NOT NULL,
  `working` int(11) NOT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO time_and_attendance VALUES("1","8","2021-12-19 12:08:21","2021-12-19 15:08:21","darryl","darryl","4","8","0");



CREATE TABLE `training` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `department` varchar(100) NOT NULL,
  `location` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_emp_training` (`employee_id`),
  CONSTRAINT `FK_emp_training` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `training_management` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `training_title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_training` (`employee_id`),
  CONSTRAINT `FK_training` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO training_management VALUES("8","30330028","Leadership","2022-03-23","complete");



CREATE TABLE `type` (
  `tp_id` int(11) NOT NULL AUTO_INCREMENT,
  `tp_name` varchar(100) NOT NULL,
  PRIMARY KEY (`tp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO type VALUES("1","");
INSERT INTO type VALUES("2","Regular");
INSERT INTO type VALUES("3","Casual");



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
  `Co_Amount` int(200) NOT NULL,
  PRIMARY KEY (`Co_Code`),
  KEY `FK_uexpenses` (`Co_Status`),
  CONSTRAINT `FK_uexpenses` FOREIGN KEY (`Co_Status`) REFERENCES `status` (`Status_Code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO uexpenses VALUES("1","Admin","Admin manager","2021-12-03","for utilities and expenses","102","Admin","Quirino Highway, Novaliches","Quezon City","Philippines","18000");
INSERT INTO uexpenses VALUES("2","Admin","Admin manager","2021-12-04","maintenance","102","Admin","Quirino Highway, Novaliches","Quezon City","Philippines","18200");
INSERT INTO uexpenses VALUES("3","Admin","Admin manager","2021-12-07","Transportation","102","Admin","Quirino Highway, Novaliches","Quezon City","Philippines","18500");



CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_level` (`group_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO user_groups VALUES("1","Admin","1","1");
INSERT INTO user_groups VALUES("3","User","2","1");



CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
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
  KEY `user_level` (`user_level`),
  KEY `FK_empl` (`employee_id`),
  CONSTRAINT `FK_empl` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

INSERT INTO users VALUES("10","30330042","Carrot Sai","Finance","ce8cef9b50a7f693620f4d1936ce047a63031039","1","frzaya7v10.png","1","2022-05-03 22:40:59","Finance","Finance Manager");
INSERT INTO users VALUES("12","30330041","Mae Ann Caunca","User","12dea96fec20593566ab75692c9949596833adc9","2","3gy5cpqg12.jpg","1","2022-05-03 11:44:06","Finance","Collection Officer");
INSERT INTO users VALUES("14","1","Alejandro martinez","SuperAdmin","d033e22ae348aeb5660fc2140aec35850c4da997","1","yk69bjdc14.png","1","2022-05-03 00:45:15","SuperAdmin","Administrator");
INSERT INTO users VALUES("16","30330039","ian james","Semaj","f90409b98ffb61424a01b4bb718aa602cebd5ee2","2","no_image.jpg","0","","Finance","Disbursment officer");
INSERT INTO users VALUES("17","30330037","James Ian","Collection manager","134096e12368b9bce038ccac61963716c01fa8ee","1","no_image.jpg","1","","Finance","Finance Manager");
INSERT INTO users VALUES("18","30330038","eric cabrillos","HR1_applicantmanagement","9b0713efca11ecb76c29cb3d0ac5b1f5525de815","2","","1","2022-04-30 21:39:58","HR1","Applicant Management");
INSERT INTO users VALUES("19","30330036","maria juana","HR1_newhired_onboard","578a88c68edae58909dce352f1fdb63545eba399","2","","1","2022-04-13 21:53:57","HR1","New Hire Onboard");
INSERT INTO users VALUES("20","30330030","alvin vidal","HR1_performance_management","475a5473e9d9149eebdba70f8bb90793385c63f8","2","","1","2022-04-12 22:12:08","HR1","Performance Management");
INSERT INTO users VALUES("21","30330028","aldrich ramos","HR1_social_recognition","d852d6bae02639a9e131204a96cdb7fc8e7bfe97","2","","1","2022-05-01 23:17:37","HR1","Social Recognition");
INSERT INTO users VALUES("22","30330029","Darryl Deleon","HR1_manager","861e497cf9e085e40a8e6019227622325d2b1dbd","1","yvxmdnlq22.jpg","1","2022-05-04 00:51:18","HR1","HR1 Manager");
INSERT INTO users VALUES("23","30330035","benjie","benjie_Recruitment","da28e4f46f84bfe2af6063633cec5381c2e59b36","2","no_image.jpg","1","2022-04-30 21:37:49","HR1","Recruitment");
INSERT INTO users VALUES("24","30330043","dexter","admin","d033e22ae348aeb5660fc2140aec35850c4da997","1","bikufw0v24.jpg","1","2022-05-14 11:37:05","administrative","administrative manager");
INSERT INTO users VALUES("25","30330044","julius","adminstaff","89cb671fc1307d288bde416dc5bf6de28be8c58d","2","no_image.jpg","1","2022-04-30 22:32:53","administrative","administrative staff");
INSERT INTO users VALUES("26","30330046","julius","HR4_admin","d033e22ae348aeb5660fc2140aec35850c4da997","1","no_image.jpg","1","2022-05-05 16:43:39","HR4","HR4 Manager");
INSERT INTO users VALUES("30","30330048","cassey","core1admin","befec8e9b702b405874234f4302edb490d8b3896","1","no_image.jpg","1","2022-05-13 21:25:29","core1","core1 manager");
INSERT INTO users VALUES("31","30330049","dexter","core2admin","236523049e73125e47db32656e78279cb22272e3","1","no_image.jpg","1","2022-05-06 03:37:41","core2","core2 admin");
INSERT INTO users VALUES("32","30330050","bless lopez","adminlogistic1","178e4d75b6dace0e3ce9bdc72fac98d642dd0f92","1","no_image.jpg","1","2022-05-13 20:47:19","logistic1","logistic1 manager");



CREATE TABLE `visitor_registration` (
  `visitor_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `time` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`visitor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1000125 DEFAULT CHARSET=utf8mb4;

INSERT INTO visitor_registration VALUES("1000124","fafa","fafa","faf","HR DEPARTMENT","Payatas A Quezon, city"," lilgabs08@gmail.com","9098374504","","RIDER","fafafa","2022-05-12 22:18:31");



CREATE TABLE `visitorpolicy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `policy` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

INSERT INTO visitorpolicy VALUES("1","Visits by nonemployees","State such visits are not allowed unless authorized by the company.","2022-04-23 13:46:45");
INSERT INTO visitorpolicy VALUES("5","Authorization procedures","How does a visitor obtain authorization? Who within the company has the power to authorize visitors?","2022-04-23 14:57:07");
INSERT INTO visitorpolicy VALUES("6","Off-limit areas"," Identify any areas that are off limits to all visitors (e.g., confidential records, equipment, computer network).","2022-04-23 15:00:31");
INSERT INTO visitorpolicy VALUES("7","Identification of visitors","Must visitors sign in and out? Must they present a photo identification? What type of photo identification? Must visitors wear identification badges or passes? Must they be escorted by a supervisor or company official?","2022-04-23 15:00:48");
INSERT INTO visitorpolicy VALUES("8","Heightened requirements.","Are there times when you need to increase restrictions (e.g., after hours, while key operations or processes are in progress, during holidays and weekends, after terrorist alerts)?","2022-04-23 15:01:11");
INSERT INTO visitorpolicy VALUES("9","Visits by employees during nonworking hours","Some companies restrict regular employees’ access to the plant or office during off-hours. What procedures should be followed by an employee who has a legitimate reason to visit the premises after work hours?","2022-04-23 15:06:50");
INSERT INTO visitorpolicy VALUES("10","Visits by employees on leave","Employees who are on leave may also stop by. Address how these individuals should be treated. For example, can the proud parent on a parental leave bring the newborn to the office for co-workers to see? What access is permitted for employees who are ","2022-04-23 15:07:12");
INSERT INTO visitorpolicy VALUES("11","Former employees","How are former employees treated? Are they treated just like nonemployees?","2022-04-23 15:07:44");
INSERT INTO visitorpolicy VALUES("12","Vendors, suppliers, and contractors. ","Are vendors and others required to sign-in? Is there a color-coded badge? Are they escorted everywhere? Is their access limited?","2022-04-23 15:08:10");
INSERT INTO visitorpolicy VALUES("13","Temporary employees","Are temporary employees treated like regular employees or like contractors?","2022-04-23 15:08:29");
INSERT INTO visitorpolicy VALUES("14","Visits by friends and family members. ","Some employers consider friends and family members “outsiders” and restrict their visits accordingly; others feel that with the supervisor’s authorization, family members in particular should be allowed to visit on occasion to see where the employee ","2022-04-23 15:09:18");
INSERT INTO visitorpolicy VALUES("15","Recording devices"," May visitors bring into your building recording devices, such as cameras, camera phones, etc.?","2022-04-23 15:32:35");
INSERT INTO visitorpolicy VALUES("18","Supervisors’ responsibilities.","Should supervisors challenge unescorted strangers who aren’t wearing the proper identification? Should they direct or escort unauthorized visitors to the front office or out of the building? Should they contact Security or escort someone in Human Res","2022-04-23 16:23:37");


CREATE DATABASE  IF NOT EXISTS `sec_it_portal` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sec_it_portal`;
-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: sec_it_portal
-- ------------------------------------------------------
-- Server version	5.5.37-0ubuntu0.13.10.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `computers`
--

DROP TABLE IF EXISTS `computers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `computers` (
  `pc_id` int(11) NOT NULL AUTO_INCREMENT,
  `pc_user` varchar(255) NOT NULL,
  `pc_ip` varchar(255) NOT NULL,
  `pc_subnet` varchar(20) NOT NULL,
  `pc_desc` text,
  `pc_state` text,
  PRIMARY KEY (`pc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `computers`
--

LOCK TABLES `computers` WRITE;
/*!40000 ALTER TABLE `computers` DISABLE KEYS */;
INSERT INTO `computers` VALUES (9,'New User','147.110.166.4','147.110.166.0','At the Call Centre','New in 2010'),(10,'NCC Router Board','147.110.184.254','147.110.184.0','Router Board at NCC','New'),(11,'NCC','147.110.188.2','147.110.188.0','HP MICROWAVE GW - NCC','New'),(12,'Shiselweni Regional','147.110.189.62','147.110.189.0','CISCO ROUTER - SHISELWENI REG\r\n','New'),(13,'Pigg\'s Peak','147.110.191.30','147.110.191.0','Pigg\'s Peak Revenue','New'),(14,'Brian: 3199','147.110.192.177','147.110.192.0','Desktop: IT Dept.','New in 2014'),(15,'1199','147.110.192.146','147.110.192.0','User','New'),(16,'DCC','147.110.165.1','147.110.165.0','HP 1810G-8 DCC FIBER SWITCH','...'),(17,'NCC','147.110.165.2','147.110.165.0','DARK FIBER GW',''),(18,'STONEHENGE','147.110.165.3','147.110.165.0','HP STONEHENGE','');
/*!40000 ALTER TABLE `computers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dbms`
--

DROP TABLE IF EXISTS `dbms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dbms` (
  `dbms_id` int(11) NOT NULL AUTO_INCREMENT,
  `dbms_name` varchar(50) NOT NULL,
  `dbms_vendor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dbms_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dbms`
--

LOCK TABLES `dbms` WRITE;
/*!40000 ALTER TABLE `dbms` DISABLE KEYS */;
INSERT INTO `dbms` VALUES (1,'DBase',''),(2,'Sybase',''),(3,'MongoDB',''),(4,'Mysql','Open source'),(5,'Oracle 10g','Oracle'),(6,'Oracle 11g','Oracle'),(7,'Oracle 12c','Oracle'),(8,'MS SQL Server 2003','Microsoft'),(9,'MS SQL Server 2008','Microsoft'),(10,'MS SQL Server 2012','Microsoft'),(11,'MS Access','Microsoft'),(12,'Adabas','Adabas');
/*!40000 ALTER TABLE `dbms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_changes`
--

DROP TABLE IF EXISTS `ip_changes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_changes` (
  `change_id` int(11) NOT NULL AUTO_INCREMENT,
  `change_time` varchar(100) NOT NULL,
  `change_user` varchar(255) NOT NULL,
  `change_init` text,
  `change_after` text,
  `change_reason` text,
  PRIMARY KEY (`change_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_changes`
--

LOCK TABLES `ip_changes` WRITE;
/*!40000 ALTER TABLE `ip_changes` DISABLE KEYS */;
INSERT INTO `ip_changes` VALUES (2,'07/28/2014 01:11:04','sec3200','147.110.165.3','Njabuliso: 3200','Update'),(3,'07/28/2014 01:11:57','sec3200','147.110.165.3','Brian Sihlongonyane','Given to Brian'),(5,'07/28/2014 01:13:45','sec3199','147.110.165.3','Make Mdee','Brian Got New Laptop'),(6,'07/28/2014 01:16:14','sec3199','147.110.165.3','Mpendulo: 3130','Mpendulo Laptop Broke'),(7,'07/28/2014 11:38:41','sec3200','','',''),(8,'07/28/2014 11:40:36','sec3200','147.110.165.3','Tsepo','New Machine'),(9,'07/29/2014 07:35:55','sec3200','','',''),(10,'07/29/2014 07:36:31','sec3200','147.110.165.63','New','New'),(11,'07/29/2014 02:17:32','sec3200','','',''),(12,'07/29/2014 06:40:02','sec3199','','',''),(13,'07/30/2014 05:57:21','sec3199','','',''),(14,'07/30/2014 05:57:35','sec3199','','',''),(15,'07/30/2014 05:57:54','sec3199','','',''),(16,'07/30/2014 05:58:03','sec3199','','',''),(17,'07/31/2014 11:46:21','sec3200','','',''),(18,'08/04/2014 07:55:20','sec3200','','',''),(19,'08/04/2014 12:37:21','sec1278','','','Newly Deployed'),(20,'08/04/2014 12:38:20','sec1278','','','Newly Deployed'),(21,'08/04/2014 02:46:31','sec1278','','','Newly Deployed'),(22,'09/10/2014 10:52:57','sec3200','','','Newly Deployed'),(23,'09/11/2014 11:00:56','sec3200','','',''),(24,'09/11/2014 11:01:09','sec3200','','',''),(25,'09/11/2014 11:03:10','sec3200','','','');
/*!40000 ALTER TABLE `ip_changes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `it_sections`
--

DROP TABLE IF EXISTS `it_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `it_sections` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(50) DEFAULT NULL,
  `section_leader` int(11) DEFAULT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `it_sections`
--

LOCK TABLES `it_sections` WRITE;
/*!40000 ALTER TABLE `it_sections` DISABLE KEYS */;
INSERT INTO `it_sections` VALUES (0,'system administration',1005),(1,'root',3199),(2,'system administration',1005),(3,'system analysis',1284),(4,'networking',720),(5,'manager',904);
/*!40000 ALTER TABLE `it_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operating_systems`
--

DROP TABLE IF EXISTS `operating_systems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operating_systems` (
  `os_id` int(11) NOT NULL AUTO_INCREMENT,
  `os_name` varchar(50) NOT NULL,
  `os_vendor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`os_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operating_systems`
--

LOCK TABLES `operating_systems` WRITE;
/*!40000 ALTER TABLE `operating_systems` DISABLE KEYS */;
INSERT INTO `operating_systems` VALUES (1,'Windows7','Microsoft'),(2,'WindowsXP','Microsoft'),(3,'Windows8','Microsoft'),(4,'Windows Server 2003','Microsoft'),(5,'Windows Server 2008','Microsoft'),(6,'Windows Server 2012','Microsoft'),(7,'Windows Vista','Microsoft'),(8,'Redhat Linux','Open Source'),(9,'Linux Mint','Open Source'),(10,'Centos','Open Source'),(11,'Linux Fedori','Open Source'),(12,'Oracle Linux','Open Source'),(13,'Mac OS','Apple'),(14,'Linux','Open Source'),(15,'HP-Unix 11i','Unix'),(16,'other',''),(17,'none',NULL);
/*!40000 ALTER TABLE `operating_systems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prints`
--

DROP TABLE IF EXISTS `prints`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prints` (
  `print_id` int(11) NOT NULL AUTO_INCREMENT,
  `print_name` varchar(100) NOT NULL,
  `print_ip` varchar(20) NOT NULL,
  `print_desc` text,
  PRIMARY KEY (`print_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prints`
--

LOCK TABLES `prints` WRITE;
/*!40000 ALTER TABLE `prints` DISABLE KEYS */;
INSERT INTO `prints` VALUES (1,'HR Printer','147.110.192.169','Printer at HR office');
/*!40000 ALTER TABLE `prints` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `proj_id` int(11) NOT NULL AUTO_INCREMENT,
  `proj_name` varchar(50) DEFAULT NULL,
  `proj_owner_pf` int(11) NOT NULL,
  `proj_stage` varchar(50) NOT NULL DEFAULT 'INITIATION',
  `proj_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `proj_desc` varchar(255) DEFAULT NULL,
  `proj_documents_link` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`proj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (4,'IT Portal',3199,'Last phase','2014-10-30 22:00:00','Creation of it portal','../ProjectDocs/IT Portal/');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remotesite`
--

DROP TABLE IF EXISTS `remotesite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `remotesite` (
  `site_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_subnet` varchar(20) NOT NULL,
  `site_name` varchar(100) NOT NULL,
  `site_ip` varchar(20) NOT NULL,
  `site_desc` text,
  PRIMARY KEY (`site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remotesite`
--

LOCK TABLES `remotesite` WRITE;
/*!40000 ALTER TABLE `remotesite` DISABLE KEYS */;
INSERT INTO `remotesite` VALUES (1,'147.110.192.0','Core Switch 1','147.110.192.5','HP 2910al-48G-CORE SWTICH1 SERVER. ROOM'),(2,'147.110.188.0','NCC Microwave','147.110.188.2','HP MICROWAVE GW - NCC'),(3,'147.110.165.0','DCC Fibre Switch','147.110.165.1','HP 1810G-8 DCC FIBER SWITCH'),(4,'147.110.191.0','Pigg\'s Peak Revenue','147.110.191.30','CISCO ROUTER - PPK REV'),(5,'147.110.189.0','Shiselweni Regional','147.110.189.62','CISCO ROUTER - SHISELWENI REG'),(9,'147.110.165.0','Fibre Connection','147.110.165.2','DARK FIBER GW\r\n'),(10,'147.110.165.0','Stonehenge','147.110.165.3','HP STONEHENGE'),(11,'147.110.166.0','IOL CLIENT','147.110.166.2','IOL CLIENT\r\n'),(12,'147.110.166.0','MATATA-REV','147.110.166.14','CISCO ROUTER\r\n\r\n'),(13,'147.110.184.0','NCC','147.110.184.254','ROUTER BOARD\r\n'),(14,'147.110.188.0','DWALENI COMMS ROOM','147.110.188.3','HP PROCURVE 1810G-8 - DWALENI COMMS ROOM'),(15,'147.110.188.0','STEKI DEPOT','147.110.188.4','HP PROCURVE 1810G-8 - STEKI DEPOT'),(16,'147.110.188.0','MLKNS - COMMS ROOM','147.110.188.5','HP PROCURVE 1810G-8 -MLKNS - COMMS ROOM\r\n'),(17,'147.110.188.0','DWALENI 2','147.110.188.7','HP PROCURVE 2524 - DWALENI 2\r\n'),(18,'147.110.188.0','MLKNS REV','147.110.188.8','HP PROCURVE 1810G-8 - MLKNS REV'),(19,'147.110.188.0','BBEND DEPOT_COMMS ROOM','147.110.188.9','HP PROCURVE 1810G-8 - BBEND DEPOT_COMMS ROOM\r\n'),(20,'147.110.188.0','NEW BLD - MTS CSO','147.110.188.10','HP PROCURVE 1810G-24 NEW BLD - MTS CSO\r\n'),(21,'147.110.188.0','BBEND DEPOT','147.110.188.11','HP PROCURVE 2524  - BBEND DEPOT\r\n'),(22,'147.110.189.0','LUBOMBO','147.110.189.94','CISCO ROUTER - LUBOMBO\r\n');
/*!40000 ALTER TABLE `remotesite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sec_departments`
--

DROP TABLE IF EXISTS `sec_departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_departments` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(45) NOT NULL,
  `dept_manager` varchar(45) NOT NULL,
  `dept_division` int(11) DEFAULT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_departments`
--

LOCK TABLES `sec_departments` WRITE;
/*!40000 ALTER TABLE `sec_departments` DISABLE KEYS */;
INSERT INTO `sec_departments` VALUES (1,'Information Technology','Melusi Malinga',1),(2,'Treasurey','Tiletsile',1),(3,'Purchasing','Kunene',1),(4,'Payments','Eric',1),(5,'Human Resources','Noncedo Mabuza',3),(6,'Audit','Elizabeth',2),(7,'Consultant','Max',3);
/*!40000 ALTER TABLE `sec_departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sec_divisions`
--

DROP TABLE IF EXISTS `sec_divisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_divisions` (
  `division_id` int(11) NOT NULL AUTO_INCREMENT,
  `division_name` varchar(50) NOT NULL,
  `general_manager` varchar(50) NOT NULL,
  PRIMARY KEY (`division_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_divisions`
--

LOCK TABLES `sec_divisions` WRITE;
/*!40000 ALTER TABLE `sec_divisions` DISABLE KEYS */;
INSERT INTO `sec_divisions` VALUES (1,'Finance','Mr Nsibande'),(2,'Corporate Services','Mr Mathunjwa'),(3,'Customer Service','Max Mkhonta'),(4,'Operations','Earnest Mkhonta'),(5,'MD\'s Office','Sengiphile Simelane'),(6,'Support Services','Sfiso Dlamini');
/*!40000 ALTER TABLE `sec_divisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sec_locations`
--

DROP TABLE IF EXISTS `sec_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sec_locations` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(50) NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_locations`
--

LOCK TABLES `sec_locations` WRITE;
/*!40000 ALTER TABLE `sec_locations` DISABLE KEYS */;
INSERT INTO `sec_locations` VALUES (1,'Head Quarters'),(2,'Stonehenge Depot'),(3,'Mbabane Revenue'),(4,'Mbabane Service Center'),(5,'Manzini Region'),(6,'Matsapha Depot'),(7,'Matsapha Revenue'),(8,'Manzini Depot'),(9,'Nhlangano Revenue'),(10,'Bigbend Revenue'),(11,'Mhlume Revenue'),(12,'BigBend Depot'),(13,'Hluti Revenue');
/*!40000 ALTER TABLE `sec_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subnets`
--

DROP TABLE IF EXISTS `subnets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subnets` (
  `subnet_id` varchar(50) NOT NULL,
  `subnet_desc` text NOT NULL,
  PRIMARY KEY (`subnet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subnets`
--

LOCK TABLES `subnets` WRITE;
/*!40000 ALTER TABLE `subnets` DISABLE KEYS */;
INSERT INTO `subnets` VALUES ('10.10.14.0','Wireless'),('147.110.165.0','Manzini'),('147.110.166.0','Matata Revenue'),('147.110.184.0','NCC'),('147.110.188.0','The Core Subnet: Covering Essentially the Whole Country'),('147.110.189.0','Shiselweni'),('147.110.191.0','Revenues'),('147.110.192.0','HQ Wi-Fi');
/*!40000 ALTER TABLE `subnets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_vendors`
--

DROP TABLE IF EXISTS `sys_vendors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_vendors` (
  `vendor_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(50) NOT NULL,
  `contact_person` varchar(50) DEFAULT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `contact_phone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_vendors`
--

LOCK TABLES `sys_vendors` WRITE;
/*!40000 ALTER TABLE `sys_vendors` DISABLE KEYS */;
INSERT INTO `sys_vendors` VALUES (1,'Software AG','Criso',NULL,NULL),(2,'Itron','Vuyiswa','',''),(3,'Acctech','Rynat','',''),(4,'LGR telecommunication','Ayanda','',''),(5,'Aptronics','Awelani',NULL,NULL),(6,'Ventyx','Kobas',NULL,NULL),(7,'Metrofiler SA','N/A',NULL,NULL),(8,'Syspro','N/A',NULL,NULL),(9,'PowerTech IST','N/A',NULL,NULL),(10,'Accyss','N/A',NULL,NULL),(11,'Mtatane','Hlophe',NULL,NULL),(12,'SEC','Melusi Malinga','',NULL),(13,'None',NULL,NULL,'');
/*!40000 ALTER TABLE `sys_vendors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systems`
--

DROP TABLE IF EXISTS `systems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systems` (
  `sys_id` int(11) NOT NULL AUTO_INCREMENT,
  `sys_name` varchar(50) DEFAULT NULL,
  `sys_vendor` int(11) DEFAULT NULL,
  `sys_brand_name` varchar(50) DEFAULT NULL,
  `sys_business_processes` varchar(255) DEFAULT NULL,
  `sys_os` int(11) DEFAULT NULL,
  `sys_db` varchar(50) DEFAULT NULL,
  `sys_h_ware` varchar(255) DEFAULT NULL,
  `sys_link` varchar(50) DEFAULT NULL,
  `sys_documents_link` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sys_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systems`
--

LOCK TABLES `systems` WRITE;
/*!40000 ALTER TABLE `systems` DISABLE KEYS */;
INSERT INTO `systems` VALUES (1,'Post paid biling',1,'In house','Post Paid Customer Information Management\r\n,Post Paid Customers Billing \r\n,Receipting Payments',15,'12','HP Blade (BL360)','147.110.192.253','../systemDocs/Post paid biling/'),(3,'Ellipse8.4',6,'Ellipse','1. Asset and Work management\r\n2. Financial Management\r\n3. Supply chain management\r\n4. Intelligent workflow deployment',15,'6','HP Blade (BL860c)','147.110.192.58','../systemDocs/Ellipse8.4/'),(4,'CRM',3,'Sage CRM','1. Applications\r\n2. Cases\r\n3. Reporting',5,'9','Virtual [under ellipse HP blade (BL 860c)]','147.110.192.93','../systemDocs/CRM/'),(5,'Document Management System',7,'Metrofiler','1. Documents Management\r\n2. Scanning of documents\r\n\r\n',5,'8','HP Blade (BL 860c)]','147.110.192.57','../systemDocs/Document Management System/'),(6,'AMR',9,'ECWIN','1.Remote Meter Reading\r\n2.Remote Meter Profiling\r\n\r\n',5,'9','HP DL380 G7','147.110.19.','../systemDocs/AMR/'),(7,'Syspro',8,'Syspro','HP DL380 G7',5,'9','HP DL380 G7','147.110.192','../systemDocs/Syspro/'),(8,'Accys',10,'Accys','1. Payroll Management\r\n2. Leave Management',5,'9','HP DL380 G7','147.110.192.','../systemDocs/Accys/'),(9,'Receipting',11,'Receipting System','1.Receiving all payments due to SEC',5,'1','HP DL380 G7','147.110.192.53','../systemDocs/Prepaid system/'),(10,'Intranet',12,'Joomla','1. Internal Document management\r\n2. Internal Information Sharing.\r\n',8,'4','HP DL260 G6','147.110.192.49','../systemDocs/Intranet/'),(11,'Email Server',5,'Zimbra Enterprise','1. Email Exchange\r\n2. Calendar Management\r\n3. Email Archiving\r\n5. Mobile Email Exchange',8,'11','HP Blade (BL 860c)]','147.110.192.1','../systemDocs/Email Server/'),(12,'Prepaid system',2,'3E/EVG','1. Vend\r\n2. Retail Management\r\n3. Voucher Administration\r\n4. Reporting Platforms\r\n5. Access Control\r\n6. Meter Operations\r\n7. Customer Information Management\r\n8. Security Management',5,'6','1.Dell PowerEdge R720 [3E & DB]','10.253.200.10,11,12,13,14,15','../systemDocs/Prepaid system/');
/*!40000 ALTER TABLE `systems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_info`
--

DROP TABLE IF EXISTS `team_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_info` (
  `pf_num` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_first_name` varchar(50) DEFAULT NULL,
  `user_middle_name` varchar(50) DEFAULT NULL,
  `user_last_name` varchar(50) DEFAULT NULL,
  `user_gender` varchar(50) DEFAULT NULL,
  `user_job_title` varchar(50) DEFAULT NULL,
  `user_work_phone` int(11) DEFAULT NULL,
  `user_cell_number` int(11) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_access_level` varchar(50) NOT NULL,
  `pass_status` varchar(2) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `user_section` int(11) NOT NULL,
  PRIMARY KEY (`pf_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_info`
--

LOCK TABLES `team_info` WRITE;
/*!40000 ALTER TABLE `team_info` DISABLE KEYS */;
INSERT INTO `team_info` VALUES (0,'root','7ee9c4f86007ba41bc79bbfab1cd8a68','','/','','','',0,0,'/','root','1','../photos/IMG_1599.JPG',1),(506,'sec506','c7b414ca91fc3e5d7d505ba332528b44','Themba','Tsep','Zikalala','Male','PC technician',4191,76235418,'themba.zikalala@sec.co.sz','Admin','0','../photos/default-pic_males.jpg',4),(524,'sec524','c7b414ca91fc3e5d7d505ba332528b44','Bongile','Mdee','Magagula','Female','System Business Operator',4192,76030068,'bongile.magagula@sec.co.sz','Admin','0','../photos/default_pic_females.jpg',0),(720,'sec720','c7b414ca91fc3e5d7d505ba332528b44','Mduduzi','Ngcamane','Maseko','Male','Network and Security engineer',4994,76028767,'mduduzi.maseko@sec.co.sz','Admin','0','../photos/default-pic_males.jpg',4),(904,'sec904','c7b414ca91fc3e5d7d505ba332528b44','Melusi','Melusi','Malinga','Male','IT manager',4112,76024595,'melusi.malinga@sec.co.sz','Admin','0','../photos/default-pic_males.jpg',5),(1005,'sec1005','c7b414ca91fc3e5d7d505ba332528b44','Sicelo','Mndzebele','Mndzebele','Male','System application engineer',4290,76022089,'sicelo.mndzebele@sec.co.sz','Admin','0','../photos/default-pic_males.jpg',0),(1082,'sec1082','c7b414ca91fc3e5d7d505ba332528b44','Melusi','Nceku','Masuku','Male','System analyst',4271,76483746,'melusi.masuku@sec.co.sz','Admin','0','../photos/default-pic_males.jpg',3),(1207,'sec1207','c7b414ca91fc3e5d7d505ba332528b44','Ziyanda','Zee','Radebe','Female','System administrator',4250,76363547,'ziyanda.radebe@sec.co.sz','Admin','0','../photos/default_pic_females.jpg',0),(1227,'sec1227','c7b414ca91fc3e5d7d505ba332528b44','Nontobeko','Ntobza','Hlongwane','Female','System administrator',4204,78653214,'nontobeko.hlongwane@sec.co.sz','Admin','0','../photos/default_pic_females.jpg',2),(1278,'sec1278','c7b414ca91fc3e5d7d505ba332528b44','Phiwokwakhe','Charlie','Dlamini','Male','Network administrator',4291,76285816,'phiwokwakhe.dlamini@sec.co.sz','Admin','0','../photos/default-pic_males.jpg',4),(1284,'sec1284','c7b414ca91fc3e5d7d505ba332528b44','Nhlanhla','Madee','Maduna','Male','System support engineer',4289,76778824,'nhlanhla.maduna@sec.co.sz','Admin','0','../photos/default-pic_males.jpg',3),(3031,'sec3031','c7b414ca91fc3e5d7d505ba332528b44','Mpendulo','Dovoza','Mamba','Male','System analyst',4150,76472655,'mpendulo.mamba@sec.co.sz','Admin','0','../photos/default-pic_males.jpg',3),(3199,'sec3199','d41d8cd98f00b204e9800998ecf8427e','Brian','Bristo','Sihlongonyane','Male','GIT',4289,76428722,'brian.sihlongonyane@sec','Admin','0','../photos/IMG_1654.JPG',0),(3200,'sec3200','c7b414ca91fc3e5d7d505ba332528b44','Njabuliso','Njabulito','Nsibande','Male','GIT',4150,76800024,'njabuliso.nsibande@sec.co.sz','Admin','0','../photos/default-pic_males.jpg',0);
/*!40000 ALTER TABLE `team_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wireless_ip_addresses`
--

DROP TABLE IF EXISTS `wireless_ip_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wireless_ip_addresses` (
  `wireless_ip_id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_addr` varchar(50) NOT NULL,
  `ip_user_pf` int(11) NOT NULL,
  `ip_user_name` varchar(50) NOT NULL,
  `ip_user_department` int(11) DEFAULT NULL,
  `ip_user_location` int(11) DEFAULT NULL,
  `ip_pc_name` varchar(50) NOT NULL,
  `ip_subnet` varchar(50) NOT NULL,
  PRIMARY KEY (`wireless_ip_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wireless_ip_addresses`
--

LOCK TABLES `wireless_ip_addresses` WRITE;
/*!40000 ALTER TABLE `wireless_ip_addresses` DISABLE KEYS */;
INSERT INTO `wireless_ip_addresses` VALUES (22,'10.10.14.1',627,'Hlonphile Dlamini',5,1,'SEC627','10.10.14.0'),(23,'10.10.14.32',125,'Sibongile Shongwe',NULL,NULL,'SIBONGILE-SHONGWE','10.10.14.0'),(24,'10.10.14.28',877,'Mphumuzi Maziya',NULL,NULL,'SEC877','10.10.14.0'),(25,'10.10.14.53',3027,'Nokukhanya Dlamini',NULL,NULL,'SEC3027-HP','10.10.14.0'),(26,'10.10.14.34',1172,'Bongani Mdluli',NULL,NULL,'SEC1172','10.10.14.0'),(27,'10.10.14.51',3303,'Tenele Dhladla',NULL,NULL,'SEC3303','10.10.14.0'),(28,'10.10.14.38',1206,'Zanele Mavuso',5,1,'SEC1206','10.10.14.0'),(29,'10.10.14.116',1254,'Sthembiso Dlamini',5,1,'Sithembiso-PC','10.10.14.0'),(30,'10.10.14.49',1111,'Metrofiler',NULL,1,'metrofiler','10.10.14.0'),(31,'10.10.14.50',1111,'Metrofiler',7,1,'metrofiler','10.10.14.0');
/*!40000 ALTER TABLE `wireless_ip_addresses` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-14 23:48:39

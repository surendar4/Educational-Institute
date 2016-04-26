-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: srit
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.10.1

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('admin','123');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `srit_acad_per`
--

DROP TABLE IF EXISTS `srit_acad_per`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `srit_acad_per` (
  `SID` varchar(10) NOT NULL DEFAULT '',
  `SEM` varchar(10) NOT NULL DEFAULT '',
  `CID` varchar(10) NOT NULL DEFAULT '',
  `GRADE` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`SID`,`SEM`,`CID`),
  KEY `CID` (`CID`),
  CONSTRAINT `srit_acad_per_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `srit_sprofile` (`SID`),
  CONSTRAINT `srit_acad_per_ibfk_2` FOREIGN KEY (`CID`) REFERENCES `srit_courses` (`CID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `srit_acad_per`
--

LOCK TABLES `srit_acad_per` WRITE;
/*!40000 ALTER TABLE `srit_acad_per` DISABLE KEYS */;
/*!40000 ALTER TABLE `srit_acad_per` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `srit_attendance`
--

DROP TABLE IF EXISTS `srit_attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `srit_attendance` (
  `SEM` varchar(10) NOT NULL DEFAULT '',
  `SID` varchar(10) NOT NULL DEFAULT '',
  `CID` varchar(10) NOT NULL DEFAULT '',
  `CLS_ATT` int(11) DEFAULT '0',
  `CLS_TKN` int(11) DEFAULT '0',
  PRIMARY KEY (`SEM`,`SID`,`CID`),
  KEY `SID` (`SID`),
  KEY `CID` (`CID`),
  CONSTRAINT `srit_attendance_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `srit_sprofile` (`SID`),
  CONSTRAINT `srit_attendance_ibfk_2` FOREIGN KEY (`CID`) REFERENCES `srit_courses` (`CID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `srit_attendance`
--

LOCK TABLES `srit_attendance` WRITE;
/*!40000 ALTER TABLE `srit_attendance` DISABLE KEYS */;
/*!40000 ALTER TABLE `srit_attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `srit_courses`
--

DROP TABLE IF EXISTS `srit_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `srit_courses` (
  `CID` varchar(10) NOT NULL,
  `NAME` varchar(30) DEFAULT NULL,
  `FID` varchar(10) DEFAULT NULL,
  `CREDITS` int(11) DEFAULT NULL,
  `slot` varchar(2) DEFAULT NULL,
  `course_sr_no` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`CID`),
  UNIQUE KEY `course_sr_no` (`course_sr_no`),
  KEY `FID` (`FID`),
  CONSTRAINT `srit_courses_ibfk_1` FOREIGN KEY (`FID`) REFERENCES `srit_fprofile` (`FID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `srit_courses`
--

LOCK TABLES `srit_courses` WRITE;
/*!40000 ALTER TABLE `srit_courses` DISABLE KEYS */;
INSERT INTO `srit_courses` VALUES ('C16003CS','Computer architecture','F1600004CS',4,'A',3),('C16004CS','DBMS','F1600004CS',4,'B',4),('C16005CS','Operating Systems','F1600005CS',4,'C',5),('C16006CS','Dbms LAb','F1600004CS',3,'F',6),('C16007CS','WEP Programming','F1600007CS',4,'D',7),('C16008CS','Computer architecturep','F1600004CS',5,'D',8);
/*!40000 ALTER TABLE `srit_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `srit_fprofile`
--

DROP TABLE IF EXISTS `srit_fprofile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `srit_fprofile` (
  `FID` varchar(10) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `DATE_OF_JOIN` date NOT NULL,
  `DESTINATION` varchar(30) NOT NULL,
  `PASSWORD` varchar(40) NOT NULL,
  `BRANCH` varchar(10) DEFAULT NULL,
  `faculty_sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`faculty_sr_no`),
  UNIQUE KEY `FID` (`FID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `srit_fprofile`
--

LOCK TABLES `srit_fprofile` WRITE;
/*!40000 ALTER TABLE `srit_fprofile` DISABLE KEYS */;
INSERT INTO `srit_fprofile` VALUES ('F1600002EE','NANUDA','2016-04-21','DEE','1234','EEE',2,'nanuda2004@gmail.com'),('F1600003CE','Mothiram','2016-04-21','Assistant Professor','1234','CE',3,'mothiram@gmail.com'),('F1600004CS','ramesh','2016-04-22','adhoc','1234','CS',4,'ramesh@srit.ac.in'),('F1600005CS','SAMBA','2016-04-22','Assistant Professor','1234','CS',5,'samba@srit.ac.in'),('F1600006CS','Prem','2016-04-22','PROFESSOR','1234','CS',6,'prem@srit.ac.in'),('F1600007CS','Adity','2016-04-22','Assistant Professor','1234','CS',7,'adityaa@srit.ac.in');
/*!40000 ALTER TABLE `srit_fprofile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `srit_pre_reg`
--

DROP TABLE IF EXISTS `srit_pre_reg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `srit_pre_reg` (
  `SID` varchar(10) NOT NULL DEFAULT '',
  `CID` varchar(10) NOT NULL DEFAULT '',
  `SEM` varchar(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`SID`,`CID`),
  UNIQUE KEY `sr_no` (`sr_no`),
  KEY `CID` (`CID`),
  CONSTRAINT `srit_pre_reg_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `srit_sprofile` (`SID`),
  CONSTRAINT `srit_pre_reg_ibfk_2` FOREIGN KEY (`CID`) REFERENCES `srit_courses` (`CID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `srit_pre_reg`
--

LOCK TABLES `srit_pre_reg` WRITE;
/*!40000 ALTER TABLE `srit_pre_reg` DISABLE KEYS */;
INSERT INTO `srit_pre_reg` VALUES ('S1600008CS','C16007CS','W16','requested',3);
/*!40000 ALTER TABLE `srit_pre_reg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `srit_reg_course`
--

DROP TABLE IF EXISTS `srit_reg_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `srit_reg_course` (
  `SID` varchar(10) NOT NULL DEFAULT '',
  `CID` varchar(10) NOT NULL DEFAULT '',
  `SEM` varchar(10) NOT NULL DEFAULT '',
  `GRADE` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`SID`,`CID`,`SEM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `srit_reg_course`
--

LOCK TABLES `srit_reg_course` WRITE;
/*!40000 ALTER TABLE `srit_reg_course` DISABLE KEYS */;
INSERT INTO `srit_reg_course` VALUES ('S1600008CS','C16003CS','W16','A'),('S1600008CS','C16006CS','W16','A');
/*!40000 ALTER TABLE `srit_reg_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `srit_sprofile`
--

DROP TABLE IF EXISTS `srit_sprofile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `srit_sprofile` (
  `SID` varchar(10) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `FNAME` varchar(30) NOT NULL,
  `JOINED_ON` date NOT NULL,
  `CURRENT_SEM` varchar(10) NOT NULL,
  `CGPA` double NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `BRANCH` varchar(10) DEFAULT NULL,
  `stud_sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`stud_sr_no`),
  UNIQUE KEY `SID` (`SID`),
  UNIQUE KEY `stud_sr_no` (`stud_sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `srit_sprofile`
--

LOCK TABLES `srit_sprofile` WRITE;
/*!40000 ALTER TABLE `srit_sprofile` DISABLE KEYS */;
INSERT INTO `srit_sprofile` VALUES ('S1600008CS','Surendar','Mothiram','2016-04-21','W16',0,'abc','CS',8,NULL),('S1600009CS','vivek','sathya narayana','2016-04-21','W16',0,'abc','CS',9,NULL),('S1600010EC','Surendar','Mothiram','2016-04-21','W16',0,'abc','EC',10,NULL),('S1600011CS','Kranthi','Rajendar','2016-04-21','W16',0,'abc','CS',11,NULL),('S1600013EC','jithendar','mothiram','2016-04-22','W16',0,'abc','EC',13,'jithulfb@gmail.com'),('S1600014CS','Kranthi kumar','Rajendar','2016-04-22','W16',0,'abc','CS',14,'kranthi@gmail.com');
/*!40000 ALTER TABLE `srit_sprofile` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-22 15:33:42

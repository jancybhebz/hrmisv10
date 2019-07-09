-- MySQL dump 10.13  Distrib 5.5.62, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: hrmis-schema-upt
-- ------------------------------------------------------
-- Server version	5.5.62-0ubuntu0.14.04.1

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
-- Table structure for table `tblAgency`
--

DROP TABLE IF EXISTS `tblAgency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblAgency` (
  `agencyName` varchar(100) NOT NULL DEFAULT '',
  `abbreviation` varchar(10) NOT NULL DEFAULT '',
  `dtrScheme` varchar(10) NOT NULL DEFAULT '',
  `fixedFrom` time DEFAULT '00:00:00',
  `address` varchar(255) NOT NULL DEFAULT '',
  `zipCode` varchar(4) NOT NULL DEFAULT '',
  `telephone` varchar(50) NOT NULL DEFAULT '',
  `facsimile` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(80) NOT NULL DEFAULT '',
  `website` varchar(80) NOT NULL DEFAULT '',
  `fixedTo` time DEFAULT '00:00:00',
  `morningFrom` time DEFAULT '00:00:00',
  `morningTo` time DEFAULT '00:00:00',
  `afternoonFrom` time DEFAULT '00:00:00',
  `afternoonTo` time DEFAULT '00:00:00',
  `salarySchedule` varchar(10) NOT NULL DEFAULT '',
  `pagibigId` varchar(20) NOT NULL DEFAULT '',
  `gsisId` varchar(20) NOT NULL DEFAULT '',
  `gsisEmpShare` int(4) NOT NULL DEFAULT '0',
  `gsisEmprShare` int(4) NOT NULL DEFAULT '0',
  `pagibigEmpShare` int(4) NOT NULL DEFAULT '0',
  `pagibigEmprShare` int(4) NOT NULL DEFAULT '0',
  `philhealthEmpShare` int(4) DEFAULT '0',
  `philhealthEmprShare` int(11) DEFAULT '0',
  `providentEmpShare` int(4) DEFAULT '0',
  `providentEmprShare` int(4) DEFAULT '0',
  `philhealthPercentage` decimal(4,2) NOT NULL DEFAULT '0.00',
  `lbStartMonth` int(2) NOT NULL DEFAULT '0',
  `lbStartYear` int(4) NOT NULL DEFAULT '0',
  `agencyTin` varchar(25) NOT NULL DEFAULT '',
  `PhilhealthNum` varchar(20) DEFAULT NULL,
  `Vision` text,
  `Mission` text,
  `Mandate` text NOT NULL,
  `zonecode` varchar(20) NOT NULL DEFAULT '',
  `region` varchar(20) NOT NULL DEFAULT '',
  `AccountNum` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`agencyName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblAgencyImages`
--

DROP TABLE IF EXISTS `tblAgencyImages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblAgencyImages` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `agencyLogo` longblob NOT NULL,
  `agencyName` varchar(70) NOT NULL DEFAULT '',
  `filename` varchar(50) NOT NULL DEFAULT '',
  `filesize` varchar(50) NOT NULL DEFAULT '',
  `filetype` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblAppointment`
--

DROP TABLE IF EXISTS `tblAppointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblAppointment` (
  `appointmentId` int(11) NOT NULL AUTO_INCREMENT,
  `appointmentCode` varchar(20) NOT NULL DEFAULT '',
  `appointmentDesc` varchar(50) NOT NULL DEFAULT '',
  `header` varchar(255) NOT NULL DEFAULT '',
  `leaveEntitled` char(1) NOT NULL DEFAULT '',
  `paymentBasis` varchar(5) NOT NULL DEFAULT '',
  `system` tinyint(1) NOT NULL DEFAULT '0',
  `incPlantilla` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`appointmentId`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblAttendanceCode`
--

DROP TABLE IF EXISTS `tblAttendanceCode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblAttendanceCode` (
  `code` varchar(5) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblAttendanceScheme`
--

DROP TABLE IF EXISTS `tblAttendanceScheme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblAttendanceScheme` (
  `schemeCode` varchar(5) NOT NULL DEFAULT '',
  `schemeName` varchar(255) NOT NULL DEFAULT '',
  `schemeType` varchar(20) NOT NULL DEFAULT '',
  `amTimeinFrom` time NOT NULL DEFAULT '00:00:00',
  `amTimeinTo` time NOT NULL DEFAULT '00:00:00',
  `pmTimeoutFrom` time DEFAULT NULL,
  `pmTimeoutTo` time DEFAULT NULL,
  `nnTimeoutFrom` time DEFAULT NULL,
  `nnTimeoutTo` time DEFAULT NULL,
  `nnTimeinFrom` time DEFAULT NULL,
  `nnTimeinTo` time DEFAULT NULL,
  `overtimeStarts` time NOT NULL DEFAULT '00:00:00',
  `overtimeEnds` time NOT NULL DEFAULT '00:00:00',
  `gracePeriod` int(2) NOT NULL DEFAULT '0',
  `gpLeaveCredits` char(1) NOT NULL DEFAULT 'Y',
  `gpLate` char(1) NOT NULL DEFAULT 'N',
  `wrkhrLeave` int(2) NOT NULL DEFAULT '0',
  `hlfLateUnd` char(1) NOT NULL DEFAULT 'N',
  `fixMonday` char(1) NOT NULL,
  PRIMARY KEY (`schemeCode`),
  KEY `schemeName` (`schemeName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblBackUpScheduler`
--

DROP TABLE IF EXISTS `tblBackUpScheduler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblBackUpScheduler` (
  `id` int(10) NOT NULL DEFAULT '0',
  `scriptpath` varchar(100) NOT NULL DEFAULT '',
  `time_interval` int(10) DEFAULT NULL,
  `fire_time` int(10) NOT NULL DEFAULT '0',
  `time_last_fired` int(10) DEFAULT NULL,
  `name` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblBackup`
--

DROP TABLE IF EXISTS `tblBackup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblBackup` (
  `id` int(11) NOT NULL DEFAULT '0',
  `db_backup_name` varchar(100) NOT NULL DEFAULT '',
  `time_last_run` int(11) NOT NULL DEFAULT '0',
  `next_run_time` int(11) NOT NULL DEFAULT '0',
  `status` varchar(10) NOT NULL DEFAULT '',
  `xversion` varchar(6) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblBackupConfig`
--

DROP TABLE IF EXISTS `tblBackupConfig`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblBackupConfig` (
  `id` int(10) NOT NULL DEFAULT '0',
  `time_interval` int(10) DEFAULT NULL,
  `fire_time` int(11) NOT NULL DEFAULT '0',
  `time_last_fired` int(11) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '',
  `ftpadd` varchar(50) NOT NULL DEFAULT '',
  `ftpuname` varchar(20) NOT NULL DEFAULT '',
  `ftppass` varchar(20) NOT NULL DEFAULT '',
  `xtable` text NOT NULL,
  `xstatus` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblBrokenSched`
--

DROP TABLE IF EXISTS `tblBrokenSched`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblBrokenSched` (
  `rec_ID` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `empNumber` varchar(20) NOT NULL DEFAULT '',
  `schemeCode` varchar(5) NOT NULL DEFAULT '',
  `dateFrom` date NOT NULL DEFAULT '0000-00-00',
  `dateTo` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`rec_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblChangeLog`
--

DROP TABLE IF EXISTS `tblChangeLog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblChangeLog` (
  `changeLogId` int(10) NOT NULL AUTO_INCREMENT,
  `empNumber` varchar(30) NOT NULL DEFAULT '',
  `module` varchar(20) NOT NULL DEFAULT '',
  `tablename` varchar(30) NOT NULL DEFAULT '',
  `databaseevent` varchar(15) NOT NULL DEFAULT '',
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` longtext NOT NULL,
  `data` longtext NOT NULL,
  `data2` longtext NOT NULL,
  `ip` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`changeLogId`)
) ENGINE=MyISAM AUTO_INCREMENT=159450 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblComputation`
--

DROP TABLE IF EXISTS `tblComputation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblComputation` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `fk_id` int(5) NOT NULL DEFAULT '0',
  `empNumber` varchar(30) NOT NULL DEFAULT '',
  `code` varchar(20) NOT NULL DEFAULT '0',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4398741 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblComputationDetails`
--

DROP TABLE IF EXISTS `tblComputationDetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblComputationDetails` (
  `fk_id` int(5) NOT NULL DEFAULT '0',
  `empNumber` varchar(20) NOT NULL DEFAULT '',
  `periodMonth` int(2) NOT NULL DEFAULT '0',
  `periodYear` year(4) NOT NULL DEFAULT '0000',
  `workingDays` int(2) NOT NULL DEFAULT '0',
  `nodaysPresent` int(2) NOT NULL DEFAULT '0',
  `nodaysAbsent` int(2) NOT NULL DEFAULT '0',
  `hazardCode` varchar(20) NOT NULL DEFAULT '',
  `hazard` decimal(10,2) NOT NULL DEFAULT '0.00',
  `laundryCode` varchar(20) NOT NULL DEFAULT '',
  `laundry` decimal(10,2) NOT NULL DEFAULT '0.00',
  `subsisCode` varchar(20) NOT NULL DEFAULT '',
  `subsistence` decimal(10,2) NOT NULL DEFAULT '0.00',
  `salaryCode` varchar(20) NOT NULL DEFAULT '',
  `salary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `longi` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ra` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `hpFactor` int(2) NOT NULL DEFAULT '0',
  `ctr_8h` int(11) NOT NULL DEFAULT '0',
  `ctr_6h` int(11) NOT NULL DEFAULT '0',
  `ctr_5h` int(11) NOT NULL DEFAULT '0',
  `ctr_4h` int(11) NOT NULL DEFAULT '0',
  `ctr_wmeal` int(11) NOT NULL DEFAULT '0',
  `ctr_diem` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ctr_laundry` int(11) NOT NULL DEFAULT '0',
  `rataAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rataVehicle` char(1) NOT NULL DEFAULT '',
  `rataCode` varchar(10) NOT NULL DEFAULT '',
  `daysWithVehicle` int(2) NOT NULL DEFAULT '0',
  `raPercent` int(2) NOT NULL DEFAULT '0',
  `taPercent` int(2) NOT NULL DEFAULT '0',
  `latest` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblComputationInstance`
--

DROP TABLE IF EXISTS `tblComputationInstance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblComputationInstance` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `month` int(2) NOT NULL DEFAULT '0',
  `year` int(4) NOT NULL DEFAULT '0',
  `appointmentCode` varchar(20) NOT NULL DEFAULT '',
  `pmonth` int(2) NOT NULL DEFAULT '0',
  `pyear` int(4) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `totalNumDays` int(11) NOT NULL DEFAULT '0',
  `processed` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5108 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblContact`
--

DROP TABLE IF EXISTS `tblContact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblContact` (
  `agencyCode` varchar(10) NOT NULL DEFAULT '',
  `agency` varchar(255) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `middleInitial` char(1) NOT NULL DEFAULT '',
  `surname` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(5) NOT NULL DEFAULT '',
  `position` varchar(255) NOT NULL DEFAULT '',
  `address` text NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`agencyCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblCountry`
--

DROP TABLE IF EXISTS `tblCountry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblCountry` (
  `countryId` int(11) NOT NULL AUTO_INCREMENT,
  `countryName` varchar(100) NOT NULL,
  `countryCode` varchar(80) NOT NULL,
  PRIMARY KEY (`countryId`)
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblCourse`
--

DROP TABLE IF EXISTS `tblCourse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblCourse` (
  `courseId` int(11) DEFAULT NULL,
  `courseCode` varchar(10) NOT NULL DEFAULT '',
  `courseDesc` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`courseCode`),
  UNIQUE KEY `courseId` (`courseId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblCustodian`
--

DROP TABLE IF EXISTS `tblCustodian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblCustodian` (
  `custodianId` int(5) NOT NULL AUTO_INCREMENT,
  `officeCode` varchar(20) NOT NULL DEFAULT '',
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`custodianId`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblDailyQuote`
--

DROP TABLE IF EXISTS `tblDailyQuote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblDailyQuote` (
  `day` int(2) NOT NULL DEFAULT '0',
  `quote` text NOT NULL,
  PRIMARY KEY (`day`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblDeduction`
--

DROP TABLE IF EXISTS `tblDeduction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblDeduction` (
  `deduction_id` int(11) NOT NULL AUTO_INCREMENT,
  `deductionCode` varchar(20) NOT NULL DEFAULT '',
  `deductionDesc` varchar(50) NOT NULL DEFAULT '',
  `deductionType` varchar(20) NOT NULL DEFAULT '',
  `deductionGroupCode` varchar(20) DEFAULT NULL,
  `deductionAccountCode` varchar(50) NOT NULL DEFAULT '0',
  `agency_field` varchar(50) DEFAULT NULL,
  `is_mandatory` int(11) NOT NULL DEFAULT '0',
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`deduction_id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblDeductionGroup`
--

DROP TABLE IF EXISTS `tblDeductionGroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblDeductionGroup` (
  `deductionGroupCode` varchar(20) DEFAULT NULL,
  `deductionGroupDesc` varchar(50) DEFAULT NULL,
  `deductionGroupAccountCode` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblDuties`
--

DROP TABLE IF EXISTS `tblDuties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblDuties` (
  `duties_index` int(11) NOT NULL AUTO_INCREMENT,
  `positionCode` varchar(20) NOT NULL DEFAULT '',
  `duties` text NOT NULL,
  `percentWork` int(5) NOT NULL DEFAULT '0',
  `dutyNumber` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`duties_index`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEducationalLevel`
--

DROP TABLE IF EXISTS `tblEducationalLevel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEducationalLevel` (
  `levelId` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL DEFAULT '0',
  `levelCode` varchar(30) NOT NULL DEFAULT '',
  `levelDesc` varchar(50) NOT NULL DEFAULT '',
  `system` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`levelCode`),
  UNIQUE KEY `levelId` (`levelId`),
  KEY `levelDesc` (`levelDesc`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpAccount`
--

DROP TABLE IF EXISTS `tblEmpAccount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpAccount` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `userName` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `userPassword` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `userLevel` int(2) NOT NULL DEFAULT '5',
  `userPermission` varchar(20) NOT NULL DEFAULT 'Employee',
  `accessPermission` varchar(15) NOT NULL DEFAULT '1234',
  `assignedGroup` varchar(20) NOT NULL DEFAULT '',
  `signatory` text NOT NULL,
  `signatoryPosition` text NOT NULL,
  PRIMARY KEY (`empNumber`),
  KEY `Emp_No` (`empNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpAddIncome`
--

DROP TABLE IF EXISTS `tblEmpAddIncome`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpAddIncome` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `incomeCode` varchar(20) NOT NULL DEFAULT '',
  `incomeYear` year(4) NOT NULL DEFAULT '0000',
  `incomeMonth` int(2) NOT NULL DEFAULT '0',
  `incomeAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `incomeTaxAmount` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpAppointment`
--

DROP TABLE IF EXISTS `tblEmpAppointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpAppointment` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `positionCode` varchar(20) NOT NULL DEFAULT '',
  `dateIssued` date NOT NULL DEFAULT '0000-00-00',
  `datePublished` date NOT NULL DEFAULT '0000-00-00',
  `placePublished` varchar(100) NOT NULL DEFAULT '',
  `relevantExperience` text NOT NULL,
  `relevantTraining` text NOT NULL,
  `appointmentissuedcode` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`appointmentissuedcode`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpBenefits`
--

DROP TABLE IF EXISTS `tblEmpBenefits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpBenefits` (
  `benefitCode` int(10) NOT NULL AUTO_INCREMENT,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `incomeCode` varchar(20) NOT NULL DEFAULT '',
  `incomeMonth` int(2) NOT NULL DEFAULT '0',
  `incomeYear` int(11) DEFAULT NULL,
  `incomeAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ITW` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period1` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period3` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period4` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (`benefitCode`)
) ENGINE=MyISAM AUTO_INCREMENT=707422 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpChild`
--

DROP TABLE IF EXISTS `tblEmpChild`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpChild` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `childCode` mediumint(9) NOT NULL AUTO_INCREMENT,
  `childName` varchar(80) NOT NULL DEFAULT '',
  `childBirthDate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`childCode`)
) ENGINE=MyISAM AUTO_INCREMENT=737 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpDTR`
--

DROP TABLE IF EXISTS `tblEmpDTR`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpDTR` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empNumber` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `dtrDate` date DEFAULT NULL,
  `inAM` time NOT NULL DEFAULT '00:00:00',
  `outAM` time NOT NULL DEFAULT '00:00:00',
  `inPM` time DEFAULT NULL,
  `outPM` time DEFAULT NULL,
  `inOT` time DEFAULT NULL,
  `outOT` time DEFAULT NULL,
  `DTRreason` varchar(100) NOT NULL,
  `remarks` varchar(255) NOT NULL DEFAULT '',
  `otherInfo` varchar(255) NOT NULL DEFAULT '',
  `OT` int(1) NOT NULL DEFAULT '0',
  `name` text NOT NULL,
  `ip` text NOT NULL,
  `editdate` text NOT NULL,
  `perdiem` char(1) NOT NULL DEFAULT '',
  `oldValue` text,
  PRIMARY KEY (`id`),
  KEY `idx_dtrDate` (`dtrDate`),
  KEY `idx_empNumber` (`empNumber`)
) ENGINE=MyISAM AUTO_INCREMENT=374552 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpDTR_log`
--

DROP TABLE IF EXISTS `tblEmpDTR_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpDTR_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empNumber` varchar(20) NOT NULL,
  `log_date` datetime NOT NULL,
  `log_sql` text NOT NULL,
  `log_notify` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=230653 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpDeductLoan`
--

DROP TABLE IF EXISTS `tblEmpDeductLoan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpDeductLoan` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `deductionCode` varchar(20) NOT NULL DEFAULT '',
  `loanCode` int(100) NOT NULL AUTO_INCREMENT,
  `amountGranted` decimal(10,2) NOT NULL DEFAULT '0.00',
  `dateGranted` date DEFAULT NULL,
  `deductAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `actualStartYear` year(4) NOT NULL DEFAULT '0000',
  `actualStartMonth` int(2) NOT NULL DEFAULT '0',
  `actualEndYear` year(4) NOT NULL DEFAULT '0000',
  `actualEndMonth` int(2) NOT NULL DEFAULT '0',
  `status` char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (`loanCode`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpDeductLoanConAdjust`
--

DROP TABLE IF EXISTS `tblEmpDeductLoanConAdjust`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpDeductLoanConAdjust` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `code` int(100) NOT NULL DEFAULT '0',
  `deductionCode` varchar(20) NOT NULL DEFAULT '',
  `deductMonth` varchar(10) NOT NULL DEFAULT '',
  `deductYear` year(4) NOT NULL DEFAULT '0000',
  `deductAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `type` varchar(20) NOT NULL DEFAULT '',
  `adjustSwitch` char(1) NOT NULL DEFAULT '',
  `adjustMonth` varchar(10) NOT NULL DEFAULT '0',
  `adjustYear` year(4) NOT NULL DEFAULT '0000',
  `adjustPeriod` int(4) NOT NULL DEFAULT '0',
  `xappointmentCode` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpDeductionRemit`
--

DROP TABLE IF EXISTS `tblEmpDeductionRemit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpDeductionRemit` (
  `processID` int(11) NOT NULL DEFAULT '0',
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `code` int(100) NOT NULL DEFAULT '0',
  `deductionCode` varchar(20) NOT NULL DEFAULT '',
  `deductMonth` int(11) NOT NULL DEFAULT '0',
  `deductYear` year(4) NOT NULL DEFAULT '0000',
  `deductAmount` decimal(10,2) DEFAULT NULL,
  `period1` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period3` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period4` decimal(10,2) NOT NULL DEFAULT '0.00',
  `orNumber` varchar(20) DEFAULT NULL,
  `orDate` date DEFAULT NULL,
  `TYPE` varchar(20) NOT NULL DEFAULT '',
  `appointmentCode` varchar(20) NOT NULL DEFAULT '',
  `employerAmount` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpDeductions`
--

DROP TABLE IF EXISTS `tblEmpDeductions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpDeductions` (
  `deductCode` int(10) NOT NULL AUTO_INCREMENT,
  `empNumber` varchar(20) DEFAULT NULL,
  `deductionCode` varchar(20) NOT NULL DEFAULT '',
  `amountGranted` decimal(10,2) NOT NULL DEFAULT '0.00',
  `dateGranted` date NOT NULL DEFAULT '0000-00-00',
  `actualStartYear` year(4) NOT NULL DEFAULT '0000',
  `actualStartMonth` int(2) NOT NULL DEFAULT '0',
  `actualEndYear` year(4) NOT NULL DEFAULT '0000',
  `actualEndMonth` int(2) NOT NULL DEFAULT '0',
  `annual` decimal(10,2) NOT NULL DEFAULT '0.00',
  `monthly` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period1` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period3` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period4` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (`deductCode`)
) ENGINE=MyISAM AUTO_INCREMENT=6445 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpDuties`
--

DROP TABLE IF EXISTS `tblEmpDuties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpDuties` (
  `empduties_index` int(11) NOT NULL AUTO_INCREMENT,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `percentWork` decimal(5,2) NOT NULL DEFAULT '0.00',
  `duties` text NOT NULL,
  PRIMARY KEY (`empduties_index`)
) ENGINE=MyISAM AUTO_INCREMENT=1567 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpExam`
--

DROP TABLE IF EXISTS `tblEmpExam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpExam` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `examCode` varchar(20) NOT NULL DEFAULT '',
  `examDate` date NOT NULL DEFAULT '0000-00-00',
  `examRating` decimal(4,2) NOT NULL DEFAULT '0.00',
  `examPlace` varchar(100) NOT NULL DEFAULT '',
  `licenseNumber` varchar(15) DEFAULT NULL,
  `dateRelease` date NOT NULL DEFAULT '0000-00-00',
  `ExamIndex` int(10) NOT NULL AUTO_INCREMENT,
  `verifier` varchar(50) NOT NULL,
  `reviewer` varchar(50) NOT NULL,
  PRIMARY KEY (`ExamIndex`),
  KEY `Emp_No` (`empNumber`)
) ENGINE=MyISAM AUTO_INCREMENT=744 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpIncome`
--

DROP TABLE IF EXISTS `tblEmpIncome`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpIncome` (
  `processID` int(11) NOT NULL DEFAULT '0',
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `incomeCode` varchar(20) NOT NULL DEFAULT '',
  `incomeYear` year(4) NOT NULL DEFAULT '0000',
  `incomeMonth` int(2) NOT NULL DEFAULT '0',
  `actualSalary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `positionCode` varchar(20) NOT NULL DEFAULT '',
  `officeCode` varchar(20) NOT NULL DEFAULT '',
  `incomeAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ITW` decimal(10,2) NOT NULL DEFAULT '0.00',
  `appointmentCode` varchar(20) NOT NULL DEFAULT '',
  `zonecode` varchar(20) NOT NULL DEFAULT '',
  `netPay` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period1` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period3` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period4` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=166475 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpIncomeAdjust`
--

DROP TABLE IF EXISTS `tblEmpIncomeAdjust`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpIncomeAdjust` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `incomeCode` varchar(20) NOT NULL DEFAULT '',
  `incomeMonth` varchar(10) NOT NULL DEFAULT '',
  `incomeYear` year(4) NOT NULL DEFAULT '0000',
  `incomeAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `type` varchar(20) NOT NULL DEFAULT '',
  `adjustSwitch` char(1) NOT NULL DEFAULT '',
  `adjustMonth` varchar(10) NOT NULL DEFAULT '0',
  `adjustYear` year(4) NOT NULL DEFAULT '0000',
  `adjustPeriod` int(4) NOT NULL DEFAULT '0',
  `appointmentCode` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpIncomeRATA`
--

DROP TABLE IF EXISTS `tblEmpIncomeRATA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpIncomeRATA` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `incRAAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `incTAAmount` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpLeave`
--

DROP TABLE IF EXISTS `tblEmpLeave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpLeave` (
  `leaveID` int(11) NOT NULL AUTO_INCREMENT,
  `dateFiled` date NOT NULL DEFAULT '0000-00-00',
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `requestID` varchar(10) NOT NULL DEFAULT '',
  `leaveCode` char(3) NOT NULL DEFAULT '',
  `specificLeave` varchar(20) NOT NULL DEFAULT '',
  `reason` varchar(50) DEFAULT NULL,
  `leaveFrom` date NOT NULL DEFAULT '0000-00-00',
  `leaveTo` date NOT NULL DEFAULT '0000-00-00',
  `certifyHR` char(1) NOT NULL DEFAULT 'N',
  `approveChief` char(1) NOT NULL DEFAULT 'N',
  `approveRequest` char(1) NOT NULL DEFAULT 'N',
  `remarks` varchar(50) DEFAULT NULL,
  `inoutpatient` varchar(20) NOT NULL DEFAULT '',
  `vllocation` varchar(20) NOT NULL DEFAULT '',
  `commutation` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`leaveID`)
) ENGINE=MyISAM AUTO_INCREMENT=5015 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpLeaveBalance`
--

DROP TABLE IF EXISTS `tblEmpLeaveBalance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpLeaveBalance` (
  `lb_id` int(11) NOT NULL AUTO_INCREMENT,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '0',
  `periodMonth` int(2) NOT NULL DEFAULT '0',
  `periodYear` year(4) NOT NULL DEFAULT '0000',
  `vlEarned` decimal(6,3) NOT NULL DEFAULT '0.000',
  `trut_notimes` int(10) NOT NULL DEFAULT '0',
  `trut_totalminutes` varchar(20) NOT NULL DEFAULT '',
  `vltrut_wpay` decimal(6,3) NOT NULL DEFAULT '0.000',
  `vl_wpay` decimal(6,3) NOT NULL DEFAULT '0.000',
  `vlAbsUndWPay` decimal(6,3) NOT NULL DEFAULT '0.000',
  `vlPreBalance` decimal(6,3) NOT NULL DEFAULT '0.000',
  `vlBalance` decimal(6,3) NOT NULL DEFAULT '0.000',
  `vltrut_wopay` decimal(6,3) NOT NULL DEFAULT '0.000',
  `vl_wopay` decimal(6,3) NOT NULL DEFAULT '0.000',
  `vlAbsUndWoPay` decimal(6,3) NOT NULL DEFAULT '0.000',
  `slEarned` decimal(6,3) NOT NULL DEFAULT '0.000',
  `slAbsUndWPay` decimal(6,3) NOT NULL DEFAULT '0.000',
  `slPreBalance` decimal(6,3) NOT NULL DEFAULT '0.000',
  `slBalance` decimal(6,3) NOT NULL DEFAULT '0.000',
  `slAbsUndWoPay` decimal(6,3) NOT NULL DEFAULT '0.000',
  `vlWoPayAmount` decimal(10,0) NOT NULL DEFAULT '0',
  `slWoPayAmount` decimal(10,0) NOT NULL DEFAULT '0',
  `nodays_awol` int(11) NOT NULL DEFAULT '0',
  `nodays_absent` int(11) NOT NULL DEFAULT '0',
  `nodays_present` int(11) DEFAULT '0',
  `nodays_actualpresent` int(11) NOT NULL DEFAULT '0',
  `nodays_vl` int(11) DEFAULT '0',
  `nodays_sl` int(11) DEFAULT '0',
  `nodays_undertime` int(2) NOT NULL DEFAULT '0',
  `totalTardyHour` int(3) NOT NULL DEFAULT '0',
  `totalTardyMinute` int(3) NOT NULL DEFAULT '0',
  `setAsDeduction` char(1) NOT NULL DEFAULT '0',
  `excess` varchar(20) NOT NULL DEFAULT '0.000000',
  `off_bal` int(10) NOT NULL DEFAULT '0',
  `off_gain` int(10) NOT NULL DEFAULT '0',
  `off_used` int(10) NOT NULL DEFAULT '0',
  `flBalance` int(2) NOT NULL DEFAULT '0',
  `flPreBalance` int(2) NOT NULL DEFAULT '0',
  `plBalance` int(2) NOT NULL DEFAULT '0',
  `plPreBalance` int(2) NOT NULL DEFAULT '0',
  `mtlBalance` int(2) NOT NULL DEFAULT '0',
  `mtlPreBalance` int(2) NOT NULL DEFAULT '0',
  `ptlBalance` int(2) NOT NULL DEFAULT '0',
  `ptlPreBalance` int(2) NOT NULL DEFAULT '0',
  `stlBalance` int(2) NOT NULL DEFAULT '0',
  `stlPreBalance` int(2) NOT NULL DEFAULT '0',
  `numOfPerdiem` int(11) NOT NULL DEFAULT '0',
  `ctr_8h` int(11) NOT NULL DEFAULT '0',
  `ctr_6h` int(11) NOT NULL DEFAULT '0',
  `ctr_5h` int(11) NOT NULL DEFAULT '0',
  `ctr_4h` int(11) NOT NULL DEFAULT '0',
  `ctr_wmeal` int(11) NOT NULL DEFAULT '0',
  `ctr_diem` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ctr_laundry` int(11) NOT NULL,
  `processBy` varchar(20) NOT NULL DEFAULT '',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `processDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`lb_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9708 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpLocalHoliday`
--

DROP TABLE IF EXISTS `tblEmpLocalHoliday`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpLocalHoliday` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `holidayCode` varchar(20) NOT NULL DEFAULT '',
  `empNumber` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpLongevity`
--

DROP TABLE IF EXISTS `tblEmpLongevity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpLongevity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empNumber` varchar(20) NOT NULL DEFAULT '',
  `longiDate` date NOT NULL DEFAULT '0000-00-00',
  `longiAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `longiPercent` int(2) NOT NULL DEFAULT '0',
  `longiPay` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=272 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpMealDetails`
--

DROP TABLE IF EXISTS `tblEmpMealDetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpMealDetails` (
  `processID` int(11) NOT NULL DEFAULT '0',
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `incomeCode` varchar(12) NOT NULL DEFAULT '',
  `mealAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `incomeYear` year(4) NOT NULL DEFAULT '0000',
  `incomeMonth` int(2) NOT NULL DEFAULT '0',
  `noOfDays` int(11) NOT NULL DEFAULT '0',
  `datesCovered` text NOT NULL,
  `incomeAmount` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpMeeting`
--

DROP TABLE IF EXISTS `tblEmpMeeting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpMeeting` (
  `meetingID` int(11) NOT NULL AUTO_INCREMENT,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `dateFiled` date NOT NULL DEFAULT '0000-00-00',
  `meetingTitle` text NOT NULL,
  `meetingDate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`meetingID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpMonetization`
--

DROP TABLE IF EXISTS `tblEmpMonetization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpMonetization` (
  `mon_id` int(11) NOT NULL AUTO_INCREMENT,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `vlMonetize` decimal(5,3) NOT NULL DEFAULT '0.000',
  `slMonetize` decimal(5,3) NOT NULL DEFAULT '0.000',
  `processMonth` int(2) NOT NULL DEFAULT '0',
  `processYear` int(4) NOT NULL DEFAULT '0',
  `monetizeMonth` int(2) NOT NULL DEFAULT '0',
  `monetizeYear` year(4) NOT NULL DEFAULT '0000',
  `monetizeAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `processBy` varchar(20) NOT NULL DEFAULT '',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `processDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`mon_id`)
) ENGINE=MyISAM AUTO_INCREMENT=153 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpNetPay`
--

DROP TABLE IF EXISTS `tblEmpNetPay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpNetPay` (
  `periodMonth` int(11) NOT NULL DEFAULT '0',
  `periodYear` int(11) NOT NULL DEFAULT '0',
  `empNumber` varchar(20) NOT NULL DEFAULT '',
  `period1` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period3` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period4` decimal(10,2) NOT NULL DEFAULT '0.00',
  UNIQUE KEY `uid` (`periodMonth`,`periodYear`,`empNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpOB`
--

DROP TABLE IF EXISTS `tblEmpOB`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpOB` (
  `obID` int(11) NOT NULL AUTO_INCREMENT,
  `dateFiled` date DEFAULT NULL,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `requestID` varchar(10) NOT NULL DEFAULT '',
  `obDateFrom` date DEFAULT NULL,
  `obDateTo` date DEFAULT NULL,
  `obTimeFrom` varchar(11) DEFAULT NULL,
  `obTimeTo` varchar(11) DEFAULT NULL,
  `obPlace` varchar(100) NOT NULL DEFAULT '',
  `obMeal` char(1) NOT NULL DEFAULT '',
  `purpose` text NOT NULL,
  `official` char(1) NOT NULL DEFAULT 'N',
  `approveRequest` char(1) NOT NULL DEFAULT 'N',
  `approveChief` char(1) NOT NULL DEFAULT 'N',
  `approveHR` char(1) NOT NULL DEFAULT 'N',
  `is_override` int(11) NOT NULL DEFAULT '0',
  `override_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`obID`),
  KEY `obDateFrom` (`obDateFrom`),
  KEY `obDateTo` (`obDateTo`),
  KEY `empNumber` (`empNumber`)
) ENGINE=MyISAM AUTO_INCREMENT=25201 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpOTDetails`
--

DROP TABLE IF EXISTS `tblEmpOTDetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpOTDetails` (
  `processID` int(11) NOT NULL DEFAULT '0',
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `incomeYear` year(4) NOT NULL DEFAULT '0000',
  `incomeMonth` int(2) NOT NULL DEFAULT '0',
  `actualSalary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `wdNoHrs` int(11) NOT NULL DEFAULT '0',
  `wdNoMins` int(11) NOT NULL DEFAULT '0',
  `weNoHrs` int(11) NOT NULL DEFAULT '0',
  `weNoMins` int(11) NOT NULL DEFAULT '0',
  `ratePerHr` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ratePerMin` decimal(10,2) NOT NULL DEFAULT '0.00',
  `wdGrossHr` decimal(10,2) NOT NULL DEFAULT '0.00',
  `wdGrossMin` decimal(10,2) NOT NULL DEFAULT '0.00',
  `weGrossHr` decimal(10,2) NOT NULL DEFAULT '0.00',
  `weGrossMin` decimal(10,2) NOT NULL DEFAULT '0.00',
  `earnedPeriod` decimal(10,2) NOT NULL DEFAULT '0.00',
  `percent` int(11) NOT NULL DEFAULT '0',
  `ITW` decimal(10,2) NOT NULL DEFAULT '0.00',
  `adjustment` decimal(10,2) NOT NULL DEFAULT '0.00',
  `incomeAmount` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpOtherSched`
--

DROP TABLE IF EXISTS `tblEmpOtherSched`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpOtherSched` (
  `rec_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `empNumber` varchar(20) NOT NULL DEFAULT '0',
  `fromDate` date NOT NULL DEFAULT '0000-00-00',
  `toDate` date NOT NULL DEFAULT '0000-00-00',
  `schemeCode` varchar(5) NOT NULL DEFAULT '',
  PRIMARY KEY (`rec_ID`),
  KEY `idx_empNumber` (`empNumber`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpOvertime`
--

DROP TABLE IF EXISTS `tblEmpOvertime`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpOvertime` (
  `otID` int(11) NOT NULL AUTO_INCREMENT,
  `dateFiled` date NOT NULL DEFAULT '0000-00-00',
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `otPurpose` text NOT NULL,
  `otOutput` text NOT NULL,
  `docNumber` varchar(15) NOT NULL DEFAULT '',
  `otDateFrom` date NOT NULL DEFAULT '0000-00-00',
  `otDateTo` date NOT NULL DEFAULT '0000-00-00',
  `otTimeFrom` varchar(11) NOT NULL DEFAULT '00:00:00 AM',
  `otTimeTo` varchar(11) NOT NULL DEFAULT '00:00:00 AM',
  PRIMARY KEY (`otID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpPersonal`
--

DROP TABLE IF EXISTS `tblEmpPersonal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpPersonal` (
  `empID` int(11) NOT NULL AUTO_INCREMENT,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `surname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `middlename` varchar(50) NOT NULL DEFAULT '',
  `middleInitial` varchar(10) DEFAULT NULL,
  `nameExtension` varchar(10) DEFAULT '',
  `salutation` varchar(15) NOT NULL,
  `sex` char(1) NOT NULL DEFAULT 'M',
  `civilStatus` varchar(20) NOT NULL DEFAULT 'Single',
  `spouse` varchar(80) NOT NULL DEFAULT '',
  `spouseSurname` varchar(80) NOT NULL,
  `spouseFirstname` varchar(80) NOT NULL,
  `spouseMiddlename` varchar(80) NOT NULL,
  `spousenameExtension` varchar(80) NOT NULL,
  `spouseWork` varchar(50) NOT NULL DEFAULT '',
  `spouseBusName` varchar(70) NOT NULL DEFAULT '',
  `spouseBusAddress` text,
  `spouseTelephone` varchar(10) DEFAULT NULL,
  `tin` varchar(20) DEFAULT NULL,
  `citizenship` varchar(10) NOT NULL DEFAULT '',
  `dualCitizenshipType` varchar(20) NOT NULL,
  `dualCitizenshipCountryId` int(11) NOT NULL,
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `birthPlace` varchar(80) NOT NULL DEFAULT '',
  `bloodType` varchar(6) DEFAULT NULL,
  `height` decimal(5,2) NOT NULL DEFAULT '0.00',
  `weight` decimal(5,2) NOT NULL DEFAULT '0.00',
  `residentialAddress` text,
  `lot1` varchar(10) NOT NULL,
  `street1` varchar(50) NOT NULL,
  `subdivision1` varchar(50) NOT NULL,
  `barangay1` varchar(50) NOT NULL,
  `city1` varchar(50) NOT NULL,
  `province1` varchar(50) NOT NULL,
  `zipCode1` int(4) DEFAULT NULL,
  `telephone1` varchar(20) DEFAULT NULL,
  `permanentAddress` text,
  `lot2` varchar(10) NOT NULL,
  `street2` varchar(50) NOT NULL,
  `subdivision2` varchar(50) NOT NULL,
  `barangay2` varchar(50) NOT NULL,
  `city2` varchar(50) NOT NULL,
  `province2` varchar(50) NOT NULL,
  `zipCode2` int(4) DEFAULT NULL,
  `telephone2` varchar(20) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `fatherName` varchar(80) NOT NULL DEFAULT '',
  `fatherSurname` varchar(80) NOT NULL,
  `fatherFirstname` varchar(80) NOT NULL,
  `fatherMiddlename` varchar(80) NOT NULL,
  `fathernameExtension` varchar(80) NOT NULL,
  `motherName` varchar(80) NOT NULL DEFAULT '',
  `motherSurname` varchar(80) NOT NULL,
  `motherFirstname` varchar(80) NOT NULL,
  `motherMiddlename` varchar(80) NOT NULL,
  `parentAddress` text,
  `skills` text NOT NULL,
  `nadr` text,
  `miao` text,
  `relatedThird` char(1) DEFAULT NULL,
  `relatedDegreeParticularsThird` text,
  `relatedFourth` char(1) DEFAULT NULL,
  `relatedDegreeParticulars` text,
  `violateLaw` char(1) DEFAULT NULL,
  `violateLawParticulars` text,
  `formallyCharged` char(1) DEFAULT NULL,
  `formallyChargedParticulars` text,
  `adminCase` char(1) DEFAULT NULL,
  `adminCaseParticulars` text,
  `forcedResign` char(1) DEFAULT NULL,
  `forcedResignParticulars` text,
  `candidate` char(1) DEFAULT NULL,
  `candidateParticulars` text,
  `campaign` char(1) NOT NULL,
  `campaignParticulars` text NOT NULL,
  `immigrant` char(1) NOT NULL,
  `immigrantParticulars` text NOT NULL,
  `indigenous` char(1) DEFAULT NULL,
  `indigenousParticulars` text,
  `disabled` char(1) DEFAULT NULL,
  `disabledParticulars` text,
  `soloParent` char(1) DEFAULT NULL,
  `soloParentParticulars` text,
  `signature` varchar(50) NOT NULL DEFAULT '',
  `dateAccomplished` date DEFAULT '0000-00-00',
  `comTaxNumber` varchar(10) NOT NULL DEFAULT '',
  `issuedAt` varchar(50) DEFAULT NULL,
  `issuedOn` date NOT NULL DEFAULT '0000-00-00',
  `gsisNumber` varchar(25) DEFAULT NULL,
  `businessPartnerNumber` varchar(25) NOT NULL,
  `philHealthNumber` varchar(14) DEFAULT NULL,
  `sssNumber` varchar(20) DEFAULT '',
  `pagibigNumber` varchar(14) DEFAULT NULL,
  `AccountNum` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`empNumber`),
  KEY `Emp_No` (`empNumber`),
  KEY `empID` (`empID`),
  FULLTEXT KEY `surname` (`surname`)
) ENGINE=MyISAM AUTO_INCREMENT=663 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpPosition`
--

DROP TABLE IF EXISTS `tblEmpPosition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpPosition` (
  `empNumber` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `appointmentCode` varchar(20) NOT NULL DEFAULT '',
  `statusOfAppointment` varchar(50) NOT NULL DEFAULT '',
  `positionCode` varchar(20) NOT NULL DEFAULT '',
  `serviceCode` varchar(20) NOT NULL DEFAULT '',
  `plantillaGroupCode` varchar(10) NOT NULL DEFAULT '',
  `divisionCode` varchar(20) NOT NULL DEFAULT '',
  `sectionCode` varchar(20) NOT NULL DEFAULT '',
  `taxStatCode` varchar(20) NOT NULL DEFAULT '',
  `itemNumber` varchar(50) NOT NULL DEFAULT '',
  `salaryGradeNumber` int(2) NOT NULL DEFAULT '0',
  `authorizeSalary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `actualSalary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `contractEndDate` date DEFAULT NULL,
  `effectiveDate` date DEFAULT NULL,
  `positionDate` date DEFAULT NULL,
  `longevityDate` date DEFAULT NULL,
  `longevityGap` decimal(4,2) DEFAULT '0.00',
  `firstDayAgency` date DEFAULT NULL,
  `firstDayGov` date DEFAULT NULL,
  `assignPlace` varchar(50) DEFAULT NULL,
  `stepNumber` int(2) NOT NULL DEFAULT '0',
  `dateIncremented` date DEFAULT NULL,
  `personnelAction` varchar(20) NOT NULL DEFAULT '',
  `employmentBasis` varchar(20) NOT NULL DEFAULT 'Fulltime',
  `categoryService` varchar(20) NOT NULL DEFAULT 'Career',
  `nature` varchar(20) NOT NULL DEFAULT 'Support',
  `hpFactor` decimal(2,0) NOT NULL DEFAULT '0',
  `longiFactor` decimal(2,0) DEFAULT '0',
  `payrollSwitch` char(1) NOT NULL DEFAULT 'N',
  `schemeCode` varchar(20) NOT NULL DEFAULT 'GEN',
  `itwSwitch` char(1) NOT NULL DEFAULT 'Y',
  `lifeRetSwitch` char(1) NOT NULL DEFAULT 'Y',
  `pagibigSwitch` char(1) NOT NULL DEFAULT 'Y',
  `philhealthSwitch` char(1) NOT NULL DEFAULT 'Y',
  `providentSwitch` char(1) NOT NULL DEFAULT '',
  `premiumAidSwitch` char(1) NOT NULL DEFAULT 'Y',
  `dtrSwitch` char(1) NOT NULL DEFAULT 'Y',
  `mcSwitch` char(1) NOT NULL DEFAULT 'Y',
  `hazardSwitch` char(1) NOT NULL DEFAULT 'Y',
  `longevitySwitch` char(1) NOT NULL DEFAULT 'Y',
  `PERASwitch` char(1) NOT NULL DEFAULT 'Y',
  `ADCOMSwitch` char(1) NOT NULL DEFAULT 'Y',
  `dependents` decimal(2,0) NOT NULL DEFAULT '0',
  `healthProvider` char(1) NOT NULL DEFAULT 'N',
  `tmpStepNumber` int(2) NOT NULL DEFAULT '0',
  `tmpActualSalary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tmpDateIncremented` date DEFAULT NULL,
  `tmpPositionDate` date DEFAULT NULL,
  `regularDedSwitch` char(1) NOT NULL DEFAULT '',
  `contriDedSwitch` char(1) NOT NULL DEFAULT '',
  `loanDedSwitch` char(1) NOT NULL DEFAULT '',
  `zonecode` varchar(20) NOT NULL DEFAULT '',
  `riceSwitch` char(1) NOT NULL DEFAULT '',
  `detailedfrom` char(1) NOT NULL DEFAULT '',
  `departmentcode` varchar(5) NOT NULL DEFAULT '',
  `groupCode` varchar(10) DEFAULT NULL,
  `firefighter` char(1) NOT NULL DEFAULT 'N',
  `security` char(1) NOT NULL DEFAULT 'N',
  `uniqueItemNumber` varchar(50) NOT NULL DEFAULT '',
  `physician` char(1) DEFAULT 'N',
  `officecode` varchar(20) NOT NULL DEFAULT '',
  `service` varchar(50) NOT NULL DEFAULT '',
  `payrollGroupCode` varchar(50) DEFAULT NULL,
  `taxAmount` decimal(10,2) DEFAULT '0.00',
  `hpTax` decimal(10,2) DEFAULT NULL,
  `lpTax` decimal(10,2) DEFAULT NULL,
  `laundrySwitch` char(1) NOT NULL DEFAULT 'Y',
  `addPAGIBIGContri` decimal(10,2) NOT NULL DEFAULT '0.00',
  `includeSecondment` int(1) NOT NULL DEFAULT '0',
  `group1` varchar(20) NOT NULL DEFAULT '',
  `group2` varchar(20) NOT NULL DEFAULT '',
  `group3` varchar(20) NOT NULL DEFAULT '',
  `group4` varchar(20) NOT NULL DEFAULT '',
  `group5` varchar(20) NOT NULL DEFAULT '',
  `RATACode` char(3) DEFAULT NULL,
  `RATAVehicle` char(1) DEFAULT NULL,
  `taxRate` int(2) DEFAULT NULL,
  `taxSwitch` char(1) NOT NULL,
  `is_override` int(11) NOT NULL DEFAULT '0',
  `override_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`empNumber`),
  KEY `AppointmentCode` (`appointmentCode`),
  KEY `DivisionCode` (`divisionCode`),
  KEY `Emp_No` (`empNumber`),
  KEY `PositionCode` (`positionCode`),
  KEY `SectionCode` (`sectionCode`),
  KEY `ServiceCode` (`serviceCode`),
  KEY `TaxStatusCode` (`taxStatCode`),
  KEY `idx_empNumber` (`empNumber`),
  FULLTEXT KEY `assignPlace` (`assignPlace`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpReference`
--

DROP TABLE IF EXISTS `tblEmpReference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpReference` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `refName` varchar(80) NOT NULL DEFAULT '',
  `refAddress` varchar(255) NOT NULL DEFAULT '',
  `refTelephone` varchar(20) DEFAULT NULL,
  `ReferenceIndex` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ReferenceIndex`)
) ENGINE=MyISAM AUTO_INCREMENT=1302 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpRequest`
--

DROP TABLE IF EXISTS `tblEmpRequest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpRequest` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `requestID` int(6) NOT NULL AUTO_INCREMENT,
  `requestCode` varchar(20) NOT NULL DEFAULT '',
  `requestDate` date NOT NULL DEFAULT '0000-00-00',
  `requestDetails` text,
  `requestStatus` varchar(30) NOT NULL DEFAULT '',
  `statusDate` date DEFAULT '0000-00-00',
  `remarks` varchar(50) DEFAULT NULL,
  `signatory` varchar(50) NOT NULL DEFAULT '',
  `listDisplay` int(1) NOT NULL DEFAULT '1',
  `Signatory1` text NOT NULL,
  `Sig1DateTime` datetime NOT NULL,
  `Signatory2` text NOT NULL,
  `Sig2DateTime` datetime NOT NULL,
  `Signatory3` text NOT NULL,
  `Sig3DateTime` datetime NOT NULL,
  `SignatoryFin` text NOT NULL,
  `SigFinDateTime` datetime NOT NULL,
  PRIMARY KEY (`requestID`)
) ENGINE=MyISAM AUTO_INCREMENT=6846 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpScholarship`
--

DROP TABLE IF EXISTS `tblEmpScholarship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpScholarship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empSchoolCode` int(10) NOT NULL DEFAULT '0',
  `empNumber` varchar(20) NOT NULL DEFAULT '',
  `ScholarshipCode` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1204 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpSchool`
--

DROP TABLE IF EXISTS `tblEmpSchool`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpSchool` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `levelCode` varchar(20) NOT NULL DEFAULT '',
  `schoolName` varchar(80) NOT NULL DEFAULT '',
  `course` varchar(50) NOT NULL DEFAULT '',
  `yearGraduated` varchar(4) DEFAULT '',
  `units` varchar(15) DEFAULT NULL,
  `schoolFromDate` varchar(4) NOT NULL DEFAULT '0000',
  `schoolToDate` varchar(4) NOT NULL DEFAULT '0000',
  `ScholarshipCode` varchar(50) NOT NULL,
  `honors` text,
  `courseCode` varchar(10) NOT NULL DEFAULT '',
  `SchoolIndex` int(11) NOT NULL AUTO_INCREMENT,
  `licensed` char(1) NOT NULL DEFAULT '',
  `graduated` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`SchoolIndex`),
  KEY `SchoolType` (`levelCode`)
) ENGINE=MyISAM AUTO_INCREMENT=2308 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpTraining`
--

DROP TABLE IF EXISTS `tblEmpTraining`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpTraining` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `XtrainingCode` varchar(10) NOT NULL DEFAULT '',
  `trainingTitle` text NOT NULL,
  `trainingContractDate` date DEFAULT '0000-00-00',
  `trainingStartDate` date NOT NULL DEFAULT '0000-00-00',
  `trainingEndDate` date NOT NULL DEFAULT '0000-00-00',
  `trainingHours` decimal(5,2) NOT NULL DEFAULT '0.00',
  `trainingTypeofLD` varchar(100) NOT NULL,
  `trainingConductedBy` varchar(100) NOT NULL DEFAULT '',
  `trainingVenue` varchar(100) NOT NULL DEFAULT '',
  `trainingCost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `trainingDesc` varchar(200) NOT NULL DEFAULT '',
  `TrainingIndex` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`TrainingIndex`),
  KEY `Emp_No` (`empNumber`),
  KEY `TrainingID` (`XtrainingCode`)
) ENGINE=MyISAM AUTO_INCREMENT=6525 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpTravelOrder`
--

DROP TABLE IF EXISTS `tblEmpTravelOrder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpTravelOrder` (
  `toID` int(10) NOT NULL AUTO_INCREMENT,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `dateFiled` date NOT NULL DEFAULT '0000-00-00',
  `toDateFrom` date NOT NULL DEFAULT '0000-00-00',
  `toDateTo` date NOT NULL DEFAULT '0000-00-00',
  `destination` text NOT NULL,
  `purpose` text NOT NULL,
  `fund` varchar(30) NOT NULL DEFAULT '',
  `transportation` varchar(30) NOT NULL DEFAULT '',
  `perdiem` char(1) NOT NULL DEFAULT '',
  `wmeal` char(1) NOT NULL,
  PRIMARY KEY (`toID`)
) ENGINE=MyISAM AUTO_INCREMENT=1112 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpTripTicket`
--

DROP TABLE IF EXISTS `tblEmpTripTicket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpTripTicket` (
  `ttID` int(11) NOT NULL AUTO_INCREMENT,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `dateFiled` date NOT NULL DEFAULT '0000-00-00',
  `destination` text NOT NULL,
  `purpose` text NOT NULL,
  `ttDateFrom` date NOT NULL DEFAULT '0000-00-00',
  `ttDateTo` date NOT NULL DEFAULT '0000-00-00',
  `perdiem` char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (`ttID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblEmpVoluntaryWork`
--

DROP TABLE IF EXISTS `tblEmpVoluntaryWork`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEmpVoluntaryWork` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `vwName` varchar(50) DEFAULT NULL,
  `vwAddress` text,
  `vwDateFrom` date DEFAULT '0000-00-00',
  `vwDateTo` date DEFAULT '0000-00-00',
  `vwHours` decimal(4,2) DEFAULT '0.00',
  `vwPosition` varchar(50) DEFAULT NULL,
  `VoluntaryIndex` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`VoluntaryIndex`)
) ENGINE=MyISAM AUTO_INCREMENT=325 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblExamType`
--

DROP TABLE IF EXISTS `tblExamType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblExamType` (
  `examId` int(11) NOT NULL AUTO_INCREMENT,
  `examCode` varchar(20) NOT NULL DEFAULT '',
  `examDesc` varchar(50) NOT NULL DEFAULT '',
  `csElligible` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`examCode`),
  UNIQUE KEY `ExamId` (`examId`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblFlagCeremony`
--

DROP TABLE IF EXISTS `tblFlagCeremony`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblFlagCeremony` (
  `flag_id` int(11) NOT NULL AUTO_INCREMENT,
  `flag_empNumber` varchar(35) NOT NULL,
  `flag_datetime` datetime NOT NULL,
  `flag_added_by` varchar(35) NOT NULL,
  `flag_added_by_ip` varchar(35) NOT NULL,
  PRIMARY KEY (`flag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2493 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblGroup`
--

DROP TABLE IF EXISTS `tblGroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblGroup` (
  `groupcode` varchar(10) NOT NULL DEFAULT '',
  `officecode` varchar(10) NOT NULL DEFAULT '',
  `groupname` varchar(255) NOT NULL DEFAULT '',
  `grouphead` varchar(50) NOT NULL DEFAULT '',
  `groupheadtitle` varchar(50) NOT NULL DEFAULT '',
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`groupcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblGroup1`
--

DROP TABLE IF EXISTS `tblGroup1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblGroup1` (
  `group1Code` varchar(20) NOT NULL DEFAULT '',
  `group1Name` text NOT NULL,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `group1HeadTitle` varchar(20) NOT NULL DEFAULT '',
  `group1Secretary` varchar(20) NOT NULL DEFAULT '',
  `group1Custodian` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblGroup2`
--

DROP TABLE IF EXISTS `tblGroup2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblGroup2` (
  `group1Code` varchar(20) NOT NULL DEFAULT '',
  `group2Code` varchar(20) NOT NULL DEFAULT '',
  `group2Name` text NOT NULL,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `group2HeadTitle` varchar(10) NOT NULL DEFAULT '',
  `group2Secretary` varchar(20) NOT NULL DEFAULT '',
  `group2Custodian` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblGroup3`
--

DROP TABLE IF EXISTS `tblGroup3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblGroup3` (
  `group1Code` varchar(20) NOT NULL DEFAULT '',
  `group2Code` varchar(20) NOT NULL DEFAULT '',
  `group3Code` varchar(20) NOT NULL DEFAULT '',
  `group3Name` text NOT NULL,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `group3HeadTitle` varchar(10) NOT NULL DEFAULT '',
  `group3Secretary` varchar(20) NOT NULL DEFAULT '',
  `group3Custodian` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblGroup4`
--

DROP TABLE IF EXISTS `tblGroup4`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblGroup4` (
  `group1Code` varchar(20) NOT NULL DEFAULT '',
  `group2Code` varchar(20) NOT NULL DEFAULT '',
  `group3Code` varchar(20) NOT NULL DEFAULT '',
  `group4Code` varchar(20) NOT NULL DEFAULT '',
  `group4Name` text NOT NULL,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `group4HeadTitle` varchar(10) NOT NULL DEFAULT '',
  `group4Secretary` varchar(20) NOT NULL DEFAULT '',
  `group4Custodian` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblGroup5`
--

DROP TABLE IF EXISTS `tblGroup5`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblGroup5` (
  `group1Code` varchar(20) NOT NULL DEFAULT '',
  `group2Code` varchar(20) NOT NULL DEFAULT '',
  `group3Code` varchar(20) NOT NULL DEFAULT '',
  `group4Code` varchar(20) NOT NULL DEFAULT '',
  `group5Code` varchar(20) NOT NULL DEFAULT '',
  `group5Name` text NOT NULL,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `group5HeadTitle` varchar(10) NOT NULL DEFAULT '',
  `group5Secretary` varchar(20) NOT NULL DEFAULT '',
  `group5Custodian` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblHoliday`
--

DROP TABLE IF EXISTS `tblHoliday`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblHoliday` (
  `holidayCode` varchar(20) NOT NULL DEFAULT '',
  `holidayName` varchar(30) NOT NULL DEFAULT '',
  `holidayMonth` varchar(10) DEFAULT NULL,
  `holidayDay` char(2) DEFAULT NULL,
  `fixedHoliday` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`holidayCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblHolidayYear`
--

DROP TABLE IF EXISTS `tblHolidayYear`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblHolidayYear` (
  `holidayId` int(11) NOT NULL AUTO_INCREMENT,
  `holidayCode` varchar(20) NOT NULL DEFAULT '',
  `holidayDate` date NOT NULL DEFAULT '0000-00-00',
  `holidayTime` varchar(15) NOT NULL,
  PRIMARY KEY (`holidayId`),
  KEY `idx_holidayDate` (`holidayDate`)
) ENGINE=MyISAM AUTO_INCREMENT=286 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblID`
--

DROP TABLE IF EXISTS `tblID`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblID` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2147483647 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblIncome`
--

DROP TABLE IF EXISTS `tblIncome`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblIncome` (
  `incomeCode` varchar(15) NOT NULL DEFAULT '',
  `incomeDesc` varchar(50) NOT NULL DEFAULT '',
  `fixedSwitch` char(1) NOT NULL DEFAULT '',
  `incomeAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `incomeType` varchar(20) NOT NULL DEFAULT '0',
  `recipient` varchar(150) NOT NULL DEFAULT 'ALL',
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  KEY `incomeCode` (`incomeCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblLeave`
--

DROP TABLE IF EXISTS `tblLeave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblLeave` (
  `leave_id` int(11) NOT NULL AUTO_INCREMENT,
  `leaveCode` char(5) NOT NULL DEFAULT '',
  `leaveType` varchar(50) NOT NULL DEFAULT '',
  `numOfDays` float NOT NULL DEFAULT '0',
  `system` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`leave_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblLocalHoliday`
--

DROP TABLE IF EXISTS `tblLocalHoliday`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblLocalHoliday` (
  `holidayCode` varchar(20) NOT NULL DEFAULT '',
  `holidayName` varchar(30) NOT NULL DEFAULT '',
  `holidayMonth` varchar(10) NOT NULL DEFAULT '',
  `holidayDay` char(2) NOT NULL DEFAULT '',
  `holidayYear` varchar(10) NOT NULL DEFAULT '',
  `holidayDate` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblManualDTR`
--

DROP TABLE IF EXISTS `tblManualDTR`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblManualDTR` (
  `dtr_id` int(11) NOT NULL AUTO_INCREMENT,
  `dtr_name` varchar(50) NOT NULL,
  `dtr_ip` varchar(30) NOT NULL,
  PRIMARY KEY (`dtr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblNonPermComputation`
--

DROP TABLE IF EXISTS `tblNonPermComputation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblNonPermComputation` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `fk_id` int(5) NOT NULL DEFAULT '0',
  `empNumber` varchar(30) NOT NULL DEFAULT '',
  `salary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `basicSalary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `nodays_absent` int(11) NOT NULL DEFAULT '0',
  `nodays_present` int(11) NOT NULL DEFAULT '0',
  `totalOTHour` int(11) NOT NULL DEFAULT '0',
  `totalOTMinute` int(11) NOT NULL DEFAULT '0',
  `totalTardyHour` int(11) NOT NULL DEFAULT '0',
  `totalTardyMinute` int(11) NOT NULL DEFAULT '0',
  `no_workingdays` int(11) NOT NULL DEFAULT '0',
  `Remarks` text NOT NULL,
  `dayabsentamount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `hourOTamount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `minuteOTamount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tardyhouramount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tardyminuteamount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `lateamount` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=144295 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblNonPermComputationInstance`
--

DROP TABLE IF EXISTS `tblNonPermComputationInstance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblNonPermComputationInstance` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `startDate` date NOT NULL DEFAULT '0000-00-00',
  `endDate` date NOT NULL DEFAULT '0000-00-00',
  `appointmentCode` varchar(20) NOT NULL DEFAULT '',
  `pmonth` int(2) NOT NULL DEFAULT '0',
  `pyear` int(4) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `period` int(2) NOT NULL DEFAULT '0',
  `payrollGroupCode` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10392 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblOTComputation`
--

DROP TABLE IF EXISTS `tblOTComputation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblOTComputation` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `fk_id` int(5) NOT NULL DEFAULT '0',
  `empNumber` varchar(30) NOT NULL DEFAULT '',
  `salary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `basicSalary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalOTHour` int(11) NOT NULL DEFAULT '0',
  `totalOTMinute` int(11) NOT NULL DEFAULT '0',
  `hourOTamount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `minuteOTamount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `taxOTAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `creditableAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1074 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblOTComputationInstance`
--

DROP TABLE IF EXISTS `tblOTComputationInstance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblOTComputationInstance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startDate` date NOT NULL DEFAULT '0000-00-00',
  `endDate` date NOT NULL DEFAULT '0000-00-00',
  `appointmentCode` varchar(20) NOT NULL DEFAULT '',
  `pmonth` int(2) NOT NULL DEFAULT '0',
  `pyear` int(4) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `payrollGroupCode` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblOverride`
--

DROP TABLE IF EXISTS `tblOverride`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblOverride` (
  `override_id` int(11) NOT NULL AUTO_INCREMENT,
  `override_type` int(11) NOT NULL COMMENT '1=ob;2=exdtr;3=gendtr',
  `office_type` varchar(20) NOT NULL,
  `office` varchar(20) NOT NULL,
  `appt_status` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `lastupdated_date` datetime DEFAULT NULL,
  `lastupdate_dby` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`override_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblPayrolRegister`
--

DROP TABLE IF EXISTS `tblPayrolRegister`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblPayrolRegister` (
  `period` int(1) NOT NULL DEFAULT '0',
  `employeeAppoint` varchar(20) NOT NULL DEFAULT '',
  `pageNo` int(5) NOT NULL DEFAULT '0',
  `BASIC` decimal(10,2) NOT NULL DEFAULT '0.00',
  `BASIC2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `EARNED` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ACA` decimal(10,2) NOT NULL DEFAULT '0.00',
  `PERA` decimal(10,2) NOT NULL DEFAULT '0.00',
  `RA` decimal(10,2) NOT NULL DEFAULT '0.00',
  `TA` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ADJUST` decimal(10,2) NOT NULL DEFAULT '0.00',
  `RICE` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ITW` decimal(10,2) NOT NULL DEFAULT '0.00',
  `GSIS` decimal(10,2) NOT NULL DEFAULT '0.00',
  `GSL` decimal(10,2) NOT NULL DEFAULT '0.00',
  `PROVI` decimal(10,2) NOT NULL DEFAULT '0.00',
  `OTHERDEDUCT` decimal(10,2) NOT NULL DEFAULT '0.00',
  `NETPAY` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payRegMonth` int(2) NOT NULL DEFAULT '0',
  `payRegYear` year(4) NOT NULL DEFAULT '0000',
  `dateTime` varchar(30) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblPayrolRegisterZone`
--

DROP TABLE IF EXISTS `tblPayrolRegisterZone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblPayrolRegisterZone` (
  `period` int(1) NOT NULL DEFAULT '0',
  `employeeAppoint` varchar(20) NOT NULL DEFAULT '',
  `pageNo` int(5) NOT NULL DEFAULT '0',
  `BASIC` decimal(10,2) NOT NULL DEFAULT '0.00',
  `BASIC2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `EARNED` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ACA` decimal(10,2) NOT NULL DEFAULT '0.00',
  `PERA` decimal(10,2) NOT NULL DEFAULT '0.00',
  `RA` decimal(10,2) NOT NULL DEFAULT '0.00',
  `TA` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ADJUST` decimal(10,2) NOT NULL DEFAULT '0.00',
  `RICE` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ITW` decimal(10,2) NOT NULL DEFAULT '0.00',
  `GSIS` decimal(10,2) NOT NULL DEFAULT '0.00',
  `GSL` decimal(10,2) NOT NULL DEFAULT '0.00',
  `PROVI` decimal(10,2) NOT NULL DEFAULT '0.00',
  `OTHERDEDUCT` decimal(10,2) NOT NULL DEFAULT '0.00',
  `NETPAY` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payRegMonth` int(2) NOT NULL DEFAULT '0',
  `payRegYear` year(4) NOT NULL DEFAULT '0000',
  `dateTime` varchar(30) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblPayrollGroup`
--

DROP TABLE IF EXISTS `tblPayrollGroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblPayrollGroup` (
  `payrollGroupId` int(11) NOT NULL AUTO_INCREMENT,
  `payrollGroupCode` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `payrollGroupName` varchar(200) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `projectCode` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `payrollGroupOrder` int(11) NOT NULL DEFAULT '0',
  `payrollGroupRC` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT '-',
  PRIMARY KEY (`payrollGroupCode`),
  UNIQUE KEY `payrollGroupId` (`payrollGroupId`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblPayrollOfficer`
--

DROP TABLE IF EXISTS `tblPayrollOfficer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblPayrollOfficer` (
  `poID` int(11) NOT NULL AUTO_INCREMENT,
  `empNumber` varchar(20) NOT NULL DEFAULT '',
  `payrollGroupCode` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`poID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblPayrollProcess`
--

DROP TABLE IF EXISTS `tblPayrollProcess`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblPayrollProcess` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointmentCode` varchar(20) NOT NULL DEFAULT '',
  `processWith` varchar(200) NOT NULL DEFAULT '',
  `computation` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`appointment_id`),
  KEY `appointmentCode` (`appointmentCode`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblPhilhealthRange`
--

DROP TABLE IF EXISTS `tblPhilhealthRange`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblPhilhealthRange` (
  `philHealthId` int(11) NOT NULL AUTO_INCREMENT,
  `philhealthFrom` decimal(10,2) NOT NULL DEFAULT '0.00',
  `philhealthTo` decimal(10,2) NOT NULL DEFAULT '0.00',
  `philSalaryBase` decimal(10,2) NOT NULL DEFAULT '0.00',
  `philMonthlyContri` decimal(10,2) NOT NULL DEFAULT '0.00',
  UNIQUE KEY `payrollGroupId` (`philHealthId`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblPlantilla`
--

DROP TABLE IF EXISTS `tblPlantilla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblPlantilla` (
  `plantillaID` int(11) NOT NULL AUTO_INCREMENT,
  `itemNumber` varchar(50) NOT NULL DEFAULT '',
  `positionCode` varchar(20) NOT NULL DEFAULT '',
  `authorizeSalary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `authorizeSalaryYear` decimal(15,2) NOT NULL DEFAULT '0.00',
  `salaryGrade` int(2) NOT NULL DEFAULT '0',
  `xstepNumber` int(2) NOT NULL DEFAULT '0',
  `plantillaGroupCode` varchar(20) NOT NULL DEFAULT '',
  `uniqueItemNumber` varchar(50) NOT NULL DEFAULT '',
  `plantillaItemOrder` int(5) NOT NULL DEFAULT '0',
  `payrollGroupCode` varchar(20) NOT NULL DEFAULT '',
  `agencyHead` int(1) NOT NULL DEFAULT '0',
  `rationalized` tinyint(1) NOT NULL DEFAULT '0',
  `salarySched` int(11) NOT NULL DEFAULT '0',
  `level` varchar(20) NOT NULL DEFAULT '',
  `areaCode` varchar(20) NOT NULL DEFAULT '',
  `areaType` varchar(20) NOT NULL DEFAULT '',
  `examCode` varchar(20) NOT NULL DEFAULT '',
  `examCode2` varchar(20) NOT NULL DEFAULT '',
  `educational` varchar(100) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `training` varchar(100) NOT NULL,
  PRIMARY KEY (`plantillaID`),
  KEY `itemNumber` (`itemNumber`)
) ENGINE=MyISAM AUTO_INCREMENT=214 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblPlantillaDuties`
--

DROP TABLE IF EXISTS `tblPlantillaDuties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblPlantillaDuties` (
  `plantilla_duties_index` int(11) NOT NULL AUTO_INCREMENT,
  `itemNumber` varchar(50) NOT NULL DEFAULT '',
  `percentWork` int(5) NOT NULL DEFAULT '0',
  `itemDuties` text,
  `dutyNumber` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`plantilla_duties_index`)
) ENGINE=MyISAM AUTO_INCREMENT=743 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblPlantillaGroup`
--

DROP TABLE IF EXISTS `tblPlantillaGroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblPlantillaGroup` (
  `plantillaGroupId` int(11) NOT NULL AUTO_INCREMENT,
  `plantillaGroupCode` varchar(20) NOT NULL DEFAULT '',
  `plantillaGroupName` varchar(255) NOT NULL DEFAULT '',
  `plantillaGroupOrder` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `plantillaGroupId` (`plantillaGroupId`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblPosition`
--

DROP TABLE IF EXISTS `tblPosition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblPosition` (
  `positionId` int(11) NOT NULL AUTO_INCREMENT,
  `positionCode` varchar(20) NOT NULL DEFAULT '',
  `positionAbb` varchar(50) NOT NULL DEFAULT '',
  `positionDesc` varchar(70) NOT NULL DEFAULT '',
  `educational` varchar(100) NOT NULL DEFAULT '',
  `experience` varchar(100) NOT NULL DEFAULT '',
  `eligibility` varchar(100) NOT NULL DEFAULT '',
  `training` varchar(200) NOT NULL DEFAULT '',
  `level` varchar(5) NOT NULL DEFAULT '',
  PRIMARY KEY (`positionCode`),
  UNIQUE KEY `positionId` (`positionId`)
) ENGINE=MyISAM AUTO_INCREMENT=584 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblProcess`
--

DROP TABLE IF EXISTS `tblProcess`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblProcess` (
  `processID` int(11) NOT NULL AUTO_INCREMENT,
  `employeeAppoint` varchar(20) NOT NULL DEFAULT '',
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `processDate` date DEFAULT NULL,
  `processMonth` int(11) DEFAULT NULL,
  `processYear` int(11) DEFAULT NULL,
  `processCode` varchar(15) DEFAULT NULL,
  `payrollGroupCode` varchar(50) NOT NULL DEFAULT '',
  `salarySchedule` varchar(10) NOT NULL DEFAULT '',
  `period` int(11) NOT NULL DEFAULT '0',
  `publish` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`processID`)
) ENGINE=MyISAM AUTO_INCREMENT=5603 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblProcessedEmployees`
--

DROP TABLE IF EXISTS `tblProcessedEmployees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblProcessedEmployees` (
  `processID` int(11) NOT NULL DEFAULT '0',
  `appointmentCode` varchar(20) NOT NULL DEFAULT '',
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `surname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `middlename` varchar(50) NOT NULL DEFAULT '',
  `middleInitial` varchar(10) NOT NULL DEFAULT '',
  `nameExtension` varchar(10) NOT NULL DEFAULT '',
  `positionAbb` varchar(50) NOT NULL DEFAULT '',
  `processDate` date DEFAULT NULL,
  `processMonth` int(11) DEFAULT NULL,
  `processYear` int(11) DEFAULT NULL,
  `processCode` varchar(15) DEFAULT NULL,
  `payrollGroupCode` varchar(50) NOT NULL DEFAULT '',
  `projectCode` varchar(20) NOT NULL DEFAULT '',
  `netPayPeriod1` decimal(10,2) NOT NULL DEFAULT '0.00',
  `netPayPeriod2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `netPay` decimal(10,2) NOT NULL DEFAULT '0.00',
  `actualSalary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `positionCode` varchar(20) NOT NULL DEFAULT '',
  `officeCode` varchar(20) NOT NULL DEFAULT '',
  `salarySchedule` varchar(10) NOT NULL DEFAULT '',
  `period` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblProcessedPayrollGroup`
--

DROP TABLE IF EXISTS `tblProcessedPayrollGroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblProcessedPayrollGroup` (
  `processID` int(11) NOT NULL DEFAULT '0',
  `payrollGroupCode` varchar(20) NOT NULL DEFAULT '',
  `payrollGroupName` varchar(200) NOT NULL DEFAULT '',
  `projectCode` varchar(20) NOT NULL DEFAULT '',
  `payrollGroupOrder` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblProcessedProject`
--

DROP TABLE IF EXISTS `tblProcessedProject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblProcessedProject` (
  `processID` int(11) NOT NULL DEFAULT '0',
  `projectCode` varchar(100) NOT NULL DEFAULT '',
  `projectDesc` text NOT NULL,
  `projectOrder` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblProject`
--

DROP TABLE IF EXISTS `tblProject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblProject` (
  `projectId` int(11) NOT NULL AUTO_INCREMENT,
  `projectCode` varchar(100) NOT NULL DEFAULT '',
  `projectDesc` text NOT NULL,
  `projectOrder` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`projectCode`),
  UNIQUE KEY `projectId` (`projectId`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblRATA`
--

DROP TABLE IF EXISTS `tblRATA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblRATA` (
  `RATACode` char(3) NOT NULL DEFAULT '',
  `RATAAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`RATACode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblReportType`
--

DROP TABLE IF EXISTS `tblReportType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblReportType` (
  `reportCode` varchar(10) NOT NULL DEFAULT '',
  `reportDesc` text NOT NULL,
  `reportType` varchar(255) NOT NULL DEFAULT '',
  `reportModule` varchar(4) NOT NULL DEFAULT '',
  `numberOfSignatory` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reportCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblReports`
--

DROP TABLE IF EXISTS `tblReports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblReports` (
  `reportCode` varchar(10) NOT NULL DEFAULT '',
  `reportDesc` text NOT NULL,
  `reportType` varchar(255) NOT NULL DEFAULT '',
  `reportModule` varchar(4) NOT NULL DEFAULT '',
  `reportStatus` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`reportCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblRequestApplicant`
--

DROP TABLE IF EXISTS `tblRequestApplicant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblRequestApplicant` (
  `AppliCode` varchar(100) NOT NULL DEFAULT '',
  `Applicant` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`AppliCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblRequestFlow`
--

DROP TABLE IF EXISTS `tblRequestFlow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblRequestFlow` (
  `reqID` int(2) NOT NULL AUTO_INCREMENT,
  `RequestType` varchar(100) NOT NULL DEFAULT '',
  `Applicant` varchar(100) NOT NULL DEFAULT '',
  `Signatory1` varchar(100) NOT NULL DEFAULT '',
  `Signatory2` varchar(100) NOT NULL DEFAULT '',
  `Signatory3` varchar(100) NOT NULL DEFAULT '',
  `SignatoryFin` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`reqID`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblRequestSignatory`
--

DROP TABLE IF EXISTS `tblRequestSignatory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblRequestSignatory` (
  `SignCode` varchar(50) NOT NULL DEFAULT '',
  `Signatory` varchar(100) NOT NULL DEFAULT '',
  `SignHead` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`SignCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblRequestSignatoryAction`
--

DROP TABLE IF EXISTS `tblRequestSignatoryAction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblRequestSignatoryAction` (
  `ID` int(2) NOT NULL AUTO_INCREMENT,
  `ActionDesc` varchar(50) NOT NULL DEFAULT '',
  `ActionCode` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblRequestType`
--

DROP TABLE IF EXISTS `tblRequestType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblRequestType` (
  `requestCode` varchar(20) NOT NULL DEFAULT '',
  `requestDesc` text NOT NULL,
  PRIMARY KEY (`requestCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblSalarySched`
--

DROP TABLE IF EXISTS `tblSalarySched`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblSalarySched` (
  `stepNumber` int(2) NOT NULL DEFAULT '0',
  `salaryGradeNumber` int(2) NOT NULL DEFAULT '0',
  `actualSalary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `version` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblSalarySchedVersion`
--

DROP TABLE IF EXISTS `tblSalarySchedVersion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblSalarySchedVersion` (
  `version` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(50) NOT NULL DEFAULT '',
  `effectivity` date NOT NULL DEFAULT '0000-00-00',
  `unused` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblScheduler_Logs`
--

DROP TABLE IF EXISTS `tblScheduler_Logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblScheduler_Logs` (
  `id` int(10) NOT NULL DEFAULT '0',
  `script` varchar(130) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `output` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `execution_time` varchar(130) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblScholarship`
--

DROP TABLE IF EXISTS `tblScholarship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblScholarship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblSecurityCode`
--

DROP TABLE IF EXISTS `tblSecurityCode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblSecurityCode` (
  `securityID` int(11) NOT NULL AUTO_INCREMENT,
  `empNumber` varchar(20) NOT NULL DEFAULT '',
  `securityQuestion` varchar(30) NOT NULL DEFAULT '',
  `securityAnswer` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`securityID`)
) ENGINE=MyISAM AUTO_INCREMENT=245 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblSecurityQuestion`
--

DROP TABLE IF EXISTS `tblSecurityQuestion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblSecurityQuestion` (
  `securityCode` int(11) NOT NULL AUTO_INCREMENT,
  `securityQuestion` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`securityCode`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblSeparationCause`
--

DROP TABLE IF EXISTS `tblSeparationCause`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblSeparationCause` (
  `separationCause` varchar(50) NOT NULL DEFAULT '',
  `system` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`separationCause`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblServiceCode`
--

DROP TABLE IF EXISTS `tblServiceCode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblServiceCode` (
  `serviceId` int(11) NOT NULL AUTO_INCREMENT,
  `serviceCode` varchar(20) NOT NULL DEFAULT '',
  `serviceDesc` varchar(50) NOT NULL DEFAULT '',
  `system` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`serviceCode`),
  UNIQUE KEY `serviceId` (`serviceId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblServiceRecord`
--

DROP TABLE IF EXISTS `tblServiceRecord`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblServiceRecord` (
  `serviceRecID` int(11) NOT NULL AUTO_INCREMENT,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `serviceFromDate` date NOT NULL DEFAULT '0000-00-00',
  `serviceToDate` varchar(10) NOT NULL DEFAULT '0000-00-00',
  `tmpServiceToDate` varchar(25) NOT NULL DEFAULT 'Present',
  `positionCode` varchar(10) NOT NULL DEFAULT '',
  `positionDesc` text NOT NULL,
  `salary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `salaryPer` varchar(10) NOT NULL DEFAULT '',
  `stationAgency` varchar(50) NOT NULL DEFAULT '',
  `salaryGrade` varchar(10) DEFAULT '',
  `appointmentCode` varchar(50) NOT NULL DEFAULT '',
  `governService` varchar(5) DEFAULT NULL,
  `NCCRA` varchar(20) DEFAULT NULL,
  `separationCause` varchar(20) DEFAULT NULL,
  `separationDate` varchar(10) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `currency` varchar(10) NOT NULL DEFAULT '',
  `remarks` varchar(50) NOT NULL DEFAULT '',
  `lwop` int(3) NOT NULL DEFAULT '0',
  `processor` varchar(50) NOT NULL,
  `signee` varchar(50) NOT NULL,
  PRIMARY KEY (`serviceRecID`),
  KEY `empNumber` (`empNumber`)
) ENGINE=MyISAM AUTO_INCREMENT=8609 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblSignatory`
--

DROP TABLE IF EXISTS `tblSignatory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblSignatory` (
  `signatoryId` int(11) NOT NULL AUTO_INCREMENT,
  `payrollGroupCode` varchar(20) NOT NULL DEFAULT '',
  `signatory` text NOT NULL,
  `signatoryPosition` text NOT NULL,
  `signatoryOrder` int(11) NOT NULL DEFAULT '0',
  `sig_module` tinyint(4) DEFAULT NULL COMMENT '1=hr;0=payroll',
  PRIMARY KEY (`signatoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=168 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblSignatory_edited`
--

DROP TABLE IF EXISTS `tblSignatory_edited`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblSignatory_edited` (
  `signatoryId` int(11) NOT NULL AUTO_INCREMENT,
  `payrollGroupCode` varchar(20) NOT NULL DEFAULT '',
  `signatory` text NOT NULL,
  `signatoryPosition` text NOT NULL,
  `signatoryOrder` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`signatoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=168 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblSpecificLeave`
--

DROP TABLE IF EXISTS `tblSpecificLeave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblSpecificLeave` (
  `leaveCode` char(3) NOT NULL DEFAULT '',
  `specifyLeave` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblTaxDetails`
--

DROP TABLE IF EXISTS `tblTaxDetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblTaxDetails` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `otherDependent` varchar(50) DEFAULT NULL,
  `dRelationship` varchar(15) DEFAULT NULL,
  `dBirthDate` date DEFAULT NULL,
  `pTin` varchar(20) DEFAULT NULL,
  `pAddress` text NOT NULL,
  `pEmployer` varchar(50) DEFAULT NULL,
  `pZipCode` varchar(6) DEFAULT NULL,
  `pTin1` varchar(20) DEFAULT NULL,
  `pAddress1` text NOT NULL,
  `pEmployer1` varchar(50) DEFAULT NULL,
  `pZipCode1` varchar(6) DEFAULT NULL,
  `pTin2` varchar(20) DEFAULT NULL,
  `pAddress2` text,
  `pEmployer2` varchar(50) NOT NULL DEFAULT '',
  `pZipCode2` varchar(6) NOT NULL DEFAULT '',
  `pTaxComp` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pTaxWheld` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblTaxExempt`
--

DROP TABLE IF EXISTS `tblTaxExempt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblTaxExempt` (
  `taxStatus` varchar(20) NOT NULL DEFAULT '',
  `exemptAmount` float(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`taxStatus`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblTaxRange`
--

DROP TABLE IF EXISTS `tblTaxRange`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblTaxRange` (
  `taxableFrom` decimal(10,2) NOT NULL DEFAULT '0.00',
  `taxableTo` decimal(10,2) NOT NULL DEFAULT '0.00',
  `taxFactor` decimal(10,2) NOT NULL DEFAULT '0.00',
  `taxBase` decimal(10,2) NOT NULL DEFAULT '0.00',
  `taxDeduct` decimal(10,2) NOT NULL DEFAULT '0.00',
  `orderNumber` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblTempNotification`
--

DROP TABLE IF EXISTS `tblTempNotification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblTempNotification` (
  `tmpDate` date NOT NULL DEFAULT '0000-00-00',
  `tmpStepIncrement` int(11) NOT NULL DEFAULT '0',
  `tmpBirthday` int(11) NOT NULL DEFAULT '0',
  `tmpEmployeesMovement` int(11) NOT NULL DEFAULT '0',
  `tmpVacantPosition` int(11) NOT NULL DEFAULT '0',
  `tmpRetiree` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblWorkZone`
--

DROP TABLE IF EXISTS `tblWorkZone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblWorkZone` (
  `currentWorkZone` varchar(20) DEFAULT NULL,
  `currentchiefworkzone` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='stores the current working zone. 201 display depend on which';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblZone`
--

DROP TABLE IF EXISTS `tblZone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblZone` (
  `zonecode` varchar(20) NOT NULL DEFAULT '',
  `zonedesc` varchar(255) NOT NULL DEFAULT '',
  `serverName` varchar(30) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(30) NOT NULL DEFAULT '',
  `databaseName` varchar(30) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblraffle`
--

DROP TABLE IF EXISTS `tblraffle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblraffle` (
  `name` text NOT NULL,
  `amount` double(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-02  9:17:57

-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2018 at 08:43 AM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrmis_upcol`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblAgency`
--

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
  `AccountNum` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblAgencyImages`
--

CREATE TABLE `tblAgencyImages` (
  `id` int(4) NOT NULL,
  `agencyLogo` longblob NOT NULL,
  `agencyName` varchar(70) NOT NULL DEFAULT '',
  `filename` varchar(50) NOT NULL DEFAULT '',
  `filesize` varchar(50) NOT NULL DEFAULT '',
  `filetype` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblAppointment`
--

CREATE TABLE `tblAppointment` (
  `appointmentId` int(11) NOT NULL,
  `appointmentCode` varchar(20) NOT NULL DEFAULT '',
  `appointmentDesc` varchar(50) NOT NULL DEFAULT '',
  `header` varchar(255) NOT NULL DEFAULT '',
  `leaveEntitled` char(1) NOT NULL DEFAULT '',
  `paymentBasis` varchar(5) NOT NULL DEFAULT '',
  `system` tinyint(1) NOT NULL DEFAULT '0',
  `incPlantilla` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblAppointmentx`
--

CREATE TABLE `tblAppointmentx` (
  `appointmentCode` varchar(20) NOT NULL DEFAULT '',
  `appointmentDesc` varchar(50) NOT NULL DEFAULT '',
  `header` varchar(255) NOT NULL DEFAULT '',
  `leaveEntitled` char(1) NOT NULL DEFAULT '',
  `paymentBasis` varchar(5) NOT NULL DEFAULT '',
  `system` tinyint(1) NOT NULL DEFAULT '0',
  `incPlantilla` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblAttendanceCode`
--

CREATE TABLE `tblAttendanceCode` (
  `code` varchar(5) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblAttendanceScheme`
--

CREATE TABLE `tblAttendanceScheme` (
  `schemeCode` varchar(5) NOT NULL DEFAULT '',
  `schemeName` varchar(255) NOT NULL DEFAULT '',
  `schemeType` varchar(20) NOT NULL DEFAULT '',
  `amTimeinFrom` time NOT NULL DEFAULT '00:00:00',
  `amTimeinTo` time NOT NULL DEFAULT '00:00:00',
  `pmTimeoutFrom` time NOT NULL DEFAULT '00:00:00',
  `pmTimeoutTo` time NOT NULL DEFAULT '00:00:00',
  `nnTimeoutFrom` time NOT NULL DEFAULT '00:00:00',
  `nnTimeoutTo` time NOT NULL DEFAULT '00:00:00',
  `nnTimeinFrom` time NOT NULL DEFAULT '00:00:00',
  `nnTimeinTo` time NOT NULL DEFAULT '00:00:00',
  `overtimeStarts` time NOT NULL DEFAULT '00:00:00',
  `overtimeEnds` time NOT NULL DEFAULT '00:00:00',
  `gracePeriod` int(2) NOT NULL DEFAULT '0',
  `gpLeaveCredits` char(1) NOT NULL DEFAULT 'Y',
  `gpLate` char(1) NOT NULL DEFAULT 'N',
  `wrkhrLeave` int(2) NOT NULL DEFAULT '0',
  `hlfLateUnd` char(1) NOT NULL DEFAULT 'N',
  `fixMonday` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblBackup`
--

CREATE TABLE `tblBackup` (
  `id` int(11) NOT NULL DEFAULT '0',
  `db_backup_name` varchar(100) NOT NULL DEFAULT '',
  `time_last_run` int(11) NOT NULL DEFAULT '0',
  `next_run_time` int(11) NOT NULL DEFAULT '0',
  `status` varchar(10) NOT NULL DEFAULT '',
  `xversion` varchar(6) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblBackupConfig`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `tblBackUpScheduler`
--

CREATE TABLE `tblBackUpScheduler` (
  `id` int(10) NOT NULL DEFAULT '0',
  `scriptpath` varchar(100) NOT NULL DEFAULT '',
  `time_interval` int(10) DEFAULT NULL,
  `fire_time` int(10) NOT NULL DEFAULT '0',
  `time_last_fired` int(10) DEFAULT NULL,
  `name` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblBrokenSched`
--

CREATE TABLE `tblBrokenSched` (
  `rec_ID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `empNumber` varchar(20) NOT NULL DEFAULT '',
  `schemeCode` varchar(5) NOT NULL DEFAULT '',
  `dateFrom` date NOT NULL DEFAULT '0000-00-00',
  `dateTo` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblChangeLog`
--

CREATE TABLE `tblChangeLog` (
  `changeLogId` int(10) NOT NULL,
  `empNumber` varchar(30) NOT NULL DEFAULT '',
  `module` varchar(20) NOT NULL DEFAULT '',
  `tablename` varchar(30) NOT NULL DEFAULT '',
  `databaseevent` varchar(15) NOT NULL DEFAULT '',
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` longtext NOT NULL,
  `data` longtext NOT NULL,
  `data2` longtext NOT NULL,
  `ip` varchar(30) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblComputation`
--

CREATE TABLE `tblComputation` (
  `id` int(5) NOT NULL,
  `fk_id` int(5) NOT NULL DEFAULT '0',
  `empNumber` varchar(30) NOT NULL DEFAULT '',
  `code` varchar(20) NOT NULL DEFAULT '0',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblComputationDetails`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `tblComputationDetails_03012017`
--

CREATE TABLE `tblComputationDetails_03012017` (
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

-- --------------------------------------------------------

--
-- Table structure for table `tblComputationInstance`
--

CREATE TABLE `tblComputationInstance` (
  `id` int(5) NOT NULL,
  `month` int(2) NOT NULL DEFAULT '0',
  `year` int(4) NOT NULL DEFAULT '0',
  `appointmentCode` varchar(20) NOT NULL DEFAULT '',
  `pmonth` int(2) NOT NULL DEFAULT '0',
  `pyear` int(4) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `totalNumDays` int(11) NOT NULL DEFAULT '0',
  `processed` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblContact`
--

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
  `email` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblCountry`
--

CREATE TABLE `tblCountry` (
  `countryId` int(11) NOT NULL,
  `countryName` varchar(100) NOT NULL,
  `countryCode` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblCourse`
--

CREATE TABLE `tblCourse` (
  `courseId` int(11) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `courseDesc` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblCoursex`
--

CREATE TABLE `tblCoursex` (
  `courseId` int(11) NOT NULL,
  `courseDesc` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblCustodian`
--

CREATE TABLE `tblCustodian` (
  `custodianId` int(5) NOT NULL,
  `officeCode` varchar(20) NOT NULL DEFAULT '',
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblDailyQuote`
--

CREATE TABLE `tblDailyQuote` (
  `day` int(2) NOT NULL DEFAULT '0',
  `quote` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblDeduction`
--

CREATE TABLE `tblDeduction` (
  `deductionCode` varchar(20) NOT NULL DEFAULT '',
  `deductionDesc` varchar(50) NOT NULL DEFAULT '',
  `deductionType` varchar(20) NOT NULL DEFAULT '',
  `deductionGroupCode` varchar(20) DEFAULT NULL,
  `deductionAccountCode` varchar(50) NOT NULL DEFAULT '0',
  `hidden` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblDeductionGroup`
--

CREATE TABLE `tblDeductionGroup` (
  `deductionGroupCode` varchar(20) DEFAULT NULL,
  `deductionGroupDesc` varchar(50) DEFAULT NULL,
  `deductionGroupAccountCode` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblDuties`
--

CREATE TABLE `tblDuties` (
  `positionCode` varchar(20) NOT NULL DEFAULT '',
  `duties` text NOT NULL,
  `percentWork` int(5) NOT NULL DEFAULT '0',
  `dutyNumber` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEducationalLevel`
--

CREATE TABLE `tblEducationalLevel` (
  `levelId` int(11) NOT NULL DEFAULT '0',
  `levelCode` varchar(30) NOT NULL DEFAULT '',
  `levelDesc` varchar(50) NOT NULL DEFAULT '',
  `system` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpAccount`
--

CREATE TABLE `tblEmpAccount` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `userName` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `userPassword` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `userLevel` int(2) NOT NULL DEFAULT '5',
  `userPermission` varchar(20) NOT NULL DEFAULT 'Employee',
  `accessPermission` varchar(15) NOT NULL DEFAULT '1234',
  `assignedGroup` varchar(20) NOT NULL DEFAULT '',
  `signatory` text NOT NULL,
  `signatoryPosition` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpAddIncome`
--

CREATE TABLE `tblEmpAddIncome` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `incomeCode` varchar(20) NOT NULL DEFAULT '',
  `incomeYear` year(4) NOT NULL DEFAULT '0000',
  `incomeMonth` int(2) NOT NULL DEFAULT '0',
  `incomeAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `incomeTaxAmount` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpAppointment`
--

CREATE TABLE `tblEmpAppointment` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `positionCode` varchar(20) NOT NULL DEFAULT '',
  `dateIssued` date NOT NULL DEFAULT '0000-00-00',
  `datePublished` date NOT NULL DEFAULT '0000-00-00',
  `placePublished` varchar(100) NOT NULL DEFAULT '',
  `relevantExperience` text NOT NULL,
  `relevantTraining` text NOT NULL,
  `appointmentissuedcode` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpBenefits`
--

CREATE TABLE `tblEmpBenefits` (
  `benefitCode` int(10) NOT NULL,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `incomeCode` varchar(20) NOT NULL DEFAULT '',
  `incomeMonth` int(2) NOT NULL DEFAULT '0',
  `incomeAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ITW` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period1` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period3` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period4` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` char(1) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpChild`
--

CREATE TABLE `tblEmpChild` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `childCode` mediumint(9) NOT NULL,
  `childName` varchar(80) NOT NULL DEFAULT '',
  `childBirthDate` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpDeductionRemit`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpDeductions`
--

CREATE TABLE `tblEmpDeductions` (
  `deductCode` int(10) NOT NULL,
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
  `status` char(1) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpDeductLoan`
--

CREATE TABLE `tblEmpDeductLoan` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `deductionCode` varchar(20) NOT NULL DEFAULT '',
  `loanCode` int(100) NOT NULL,
  `amountGranted` decimal(10,2) NOT NULL DEFAULT '0.00',
  `dateGranted` date DEFAULT NULL,
  `deductAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `actualStartYear` year(4) NOT NULL DEFAULT '0000',
  `actualStartMonth` int(2) NOT NULL DEFAULT '0',
  `actualEndYear` year(4) NOT NULL DEFAULT '0000',
  `actualEndMonth` int(2) NOT NULL DEFAULT '0',
  `status` char(1) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpDeductLoanConAdjust`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpDTR`
--

CREATE TABLE `tblEmpDTR` (
  `id` int(11) NOT NULL,
  `empNumber` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `dtrDate` date NOT NULL DEFAULT '0000-00-00',
  `inAM` time NOT NULL DEFAULT '00:00:00',
  `outAM` time NOT NULL DEFAULT '00:00:00',
  `inPM` time NOT NULL DEFAULT '00:00:00',
  `outPM` time NOT NULL DEFAULT '00:00:00',
  `inOT` time NOT NULL DEFAULT '00:00:00',
  `outOT` time NOT NULL DEFAULT '00:00:00',
  `DTRreason` varchar(100) NOT NULL,
  `remarks` varchar(255) NOT NULL DEFAULT '',
  `otherInfo` varchar(255) NOT NULL DEFAULT '',
  `OT` int(1) NOT NULL DEFAULT '0',
  `name` text NOT NULL,
  `ip` text NOT NULL,
  `editdate` text NOT NULL,
  `perdiem` char(1) NOT NULL DEFAULT '',
  `oldValue` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpDTR_log`
--

CREATE TABLE `tblEmpDTR_log` (
  `id` int(11) NOT NULL,
  `empNumber` varchar(20) NOT NULL,
  `log_date` datetime NOT NULL,
  `log_sql` text NOT NULL,
  `log_notify` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpDuties`
--

CREATE TABLE `tblEmpDuties` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `percentWork` decimal(5,2) NOT NULL DEFAULT '0.00',
  `duties` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpExam`
--

CREATE TABLE `tblEmpExam` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `examCode` varchar(20) NOT NULL DEFAULT '',
  `examDate` date NOT NULL DEFAULT '0000-00-00',
  `examRating` decimal(4,2) NOT NULL DEFAULT '0.00',
  `examPlace` varchar(100) NOT NULL DEFAULT '',
  `licenseNumber` varchar(15) DEFAULT NULL,
  `dateRelease` date NOT NULL DEFAULT '0000-00-00',
  `ExamIndex` int(10) NOT NULL,
  `verifier` varchar(50) NOT NULL,
  `reviewer` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpIncome`
--

CREATE TABLE `tblEmpIncome` (
  `processID` int(11) NOT NULL DEFAULT '0',
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `code` int(11) NOT NULL,
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
  `period4` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpIncomeAdjust`
--

CREATE TABLE `tblEmpIncomeAdjust` (
  `code` int(11) NOT NULL,
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
  `appointmentCode` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpIncomeRATA`
--

CREATE TABLE `tblEmpIncomeRATA` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `incRAAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `incTAAmount` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpLeave`
--

CREATE TABLE `tblEmpLeave` (
  `leaveID` int(11) NOT NULL,
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
  `commutation` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpLeaveBalance`
--

CREATE TABLE `tblEmpLeaveBalance` (
  `lb_id` int(11) NOT NULL,
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
  `processDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpLeaveBalance_040716`
--

CREATE TABLE `tblEmpLeaveBalance_040716` (
  `lb_id` int(11) NOT NULL,
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
  `ctr_4h` int(11) NOT NULL DEFAULT '0',
  `ctr_wmeal` int(11) NOT NULL DEFAULT '0',
  `ctr_laundry` int(11) NOT NULL,
  `processBy` varchar(20) NOT NULL DEFAULT '',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `processDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpLeaveBalance_11242016`
--

CREATE TABLE `tblEmpLeaveBalance_11242016` (
  `lb_id` int(11) NOT NULL,
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
  `ctr_laundry` int(11) NOT NULL,
  `processBy` varchar(20) NOT NULL DEFAULT '',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `processDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpLeaveBalance_Aug16`
--

CREATE TABLE `tblEmpLeaveBalance_Aug16` (
  `lb_id` int(11) NOT NULL,
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
  `ctr_laundry` int(11) NOT NULL,
  `processBy` varchar(20) NOT NULL DEFAULT '',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `processDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpLeaveBalance_Jan2017`
--

CREATE TABLE `tblEmpLeaveBalance_Jan2017` (
  `lb_id` int(11) NOT NULL,
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
  `processDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpLeaveBalance_w/Dec2016`
--

CREATE TABLE `tblEmpLeaveBalance_w/Dec2016` (
  `lb_id` int(11) NOT NULL,
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
  `processDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpLeaveBalance_w/o_Nov2016`
--

CREATE TABLE `tblEmpLeaveBalance_w/o_Nov2016` (
  `lb_id` int(11) NOT NULL,
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
  `ctr_laundry` int(11) NOT NULL,
  `processBy` varchar(20) NOT NULL DEFAULT '',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `processDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpLocalHoliday`
--

CREATE TABLE `tblEmpLocalHoliday` (
  `id` int(11) NOT NULL,
  `holidayCode` varchar(20) NOT NULL DEFAULT '',
  `empNumber` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpLongevity`
--

CREATE TABLE `tblEmpLongevity` (
  `id` int(11) NOT NULL,
  `empNumber` varchar(20) NOT NULL DEFAULT '',
  `longiDate` date NOT NULL DEFAULT '0000-00-00',
  `longiAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `longiPercent` int(2) NOT NULL DEFAULT '0',
  `longiPay` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpMealDetails`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpMeeting`
--

CREATE TABLE `tblEmpMeeting` (
  `meetingID` int(11) NOT NULL,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `dateFiled` date NOT NULL DEFAULT '0000-00-00',
  `meetingTitle` text NOT NULL,
  `meetingDate` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpMonetization`
--

CREATE TABLE `tblEmpMonetization` (
  `mon_id` int(11) NOT NULL,
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
  `processDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpNetPay`
--

CREATE TABLE `tblEmpNetPay` (
  `periodMonth` int(11) NOT NULL DEFAULT '0',
  `periodYear` int(11) NOT NULL DEFAULT '0',
  `empNumber` varchar(20) NOT NULL DEFAULT '',
  `period1` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period3` decimal(10,2) NOT NULL DEFAULT '0.00',
  `period4` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpOB`
--

CREATE TABLE `tblEmpOB` (
  `obID` int(11) NOT NULL,
  `dateFiled` date NOT NULL DEFAULT '0000-00-00',
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `requestID` varchar(10) NOT NULL DEFAULT '',
  `obDateFrom` date NOT NULL DEFAULT '0000-00-00',
  `obDateTo` date NOT NULL DEFAULT '0000-00-00',
  `obTimeFrom` varchar(11) NOT NULL DEFAULT '00:00:00 AM',
  `obTimeTo` varchar(11) NOT NULL DEFAULT '00:00:00 AM',
  `obPlace` varchar(100) NOT NULL DEFAULT '',
  `obMeal` char(1) NOT NULL DEFAULT '',
  `purpose` text NOT NULL,
  `official` char(1) NOT NULL DEFAULT 'N',
  `approveRequest` char(1) NOT NULL DEFAULT 'N',
  `approveChief` char(1) NOT NULL DEFAULT 'N',
  `approveHR` char(1) NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpOTDetails`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpOtherSched`
--

CREATE TABLE `tblEmpOtherSched` (
  `rec_ID` int(11) UNSIGNED NOT NULL,
  `empNumber` varchar(20) NOT NULL DEFAULT '0',
  `fromDate` date NOT NULL DEFAULT '0000-00-00',
  `toDate` date NOT NULL DEFAULT '0000-00-00',
  `schemeCode` varchar(5) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpOvertime`
--

CREATE TABLE `tblEmpOvertime` (
  `otID` int(11) NOT NULL,
  `dateFiled` date NOT NULL DEFAULT '0000-00-00',
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `otPurpose` text NOT NULL,
  `otOutput` text NOT NULL,
  `docNumber` varchar(15) NOT NULL DEFAULT '',
  `otDateFrom` date NOT NULL DEFAULT '0000-00-00',
  `otDateTo` date NOT NULL DEFAULT '0000-00-00',
  `otTimeFrom` varchar(11) NOT NULL DEFAULT '00:00:00 AM',
  `otTimeTo` varchar(11) NOT NULL DEFAULT '00:00:00 AM'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpPersonal`
--

CREATE TABLE `tblEmpPersonal` (
  `empID` int(11) NOT NULL,
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
  `AccountNum` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpPersonalx`
--

CREATE TABLE `tblEmpPersonalx` (
  `empID` int(11) NOT NULL,
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
  `AccountNum` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpPosition`
--

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
  `contractEndDate` date DEFAULT '0000-00-00',
  `effectiveDate` date NOT NULL DEFAULT '0000-00-00',
  `positionDate` date NOT NULL DEFAULT '0000-00-00',
  `longevityDate` date NOT NULL DEFAULT '0000-00-00',
  `longevityGap` decimal(4,2) DEFAULT '0.00',
  `firstDayAgency` date NOT NULL DEFAULT '0000-00-00',
  `firstDayGov` date NOT NULL DEFAULT '0000-00-00',
  `assignPlace` varchar(50) DEFAULT NULL,
  `stepNumber` int(2) NOT NULL DEFAULT '0',
  `dateIncremented` date NOT NULL DEFAULT '0000-00-00',
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
  `tmpDateIncremented` date NOT NULL DEFAULT '0000-00-00',
  `tmpPositionDate` date NOT NULL DEFAULT '0000-00-00',
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
  `taxSwitch` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpReference`
--

CREATE TABLE `tblEmpReference` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `refName` varchar(80) NOT NULL DEFAULT '',
  `refAddress` varchar(255) NOT NULL DEFAULT '',
  `refTelephone` varchar(20) DEFAULT NULL,
  `ReferenceIndex` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpRequest`
--

CREATE TABLE `tblEmpRequest` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `requestID` int(6) NOT NULL,
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
  `SigFinDateTime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpScholarship`
--

CREATE TABLE `tblEmpScholarship` (
  `id` int(11) NOT NULL,
  `empSchoolCode` int(10) NOT NULL DEFAULT '0',
  `empNumber` varchar(20) NOT NULL DEFAULT '',
  `ScholarshipCode` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpSchool`
--

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
  `SchoolIndex` int(11) NOT NULL,
  `licensed` char(1) NOT NULL DEFAULT '',
  `graduated` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpTraining`
--

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
  `TrainingIndex` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpTravelOrder`
--

CREATE TABLE `tblEmpTravelOrder` (
  `toID` int(10) NOT NULL,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `dateFiled` date NOT NULL DEFAULT '0000-00-00',
  `toDateFrom` date NOT NULL DEFAULT '0000-00-00',
  `toDateTo` date NOT NULL DEFAULT '0000-00-00',
  `destination` text NOT NULL,
  `purpose` text NOT NULL,
  `fund` varchar(30) NOT NULL DEFAULT '',
  `transportation` varchar(30) NOT NULL DEFAULT '',
  `perdiem` char(1) NOT NULL DEFAULT '',
  `wmeal` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpTripTicket`
--

CREATE TABLE `tblEmpTripTicket` (
  `ttID` int(11) NOT NULL,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `dateFiled` date NOT NULL DEFAULT '0000-00-00',
  `destination` text NOT NULL,
  `purpose` text NOT NULL,
  `ttDateFrom` date NOT NULL DEFAULT '0000-00-00',
  `ttDateTo` date NOT NULL DEFAULT '0000-00-00',
  `perdiem` char(1) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEmpVoluntaryWork`
--

CREATE TABLE `tblEmpVoluntaryWork` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `vwName` varchar(50) DEFAULT NULL,
  `vwAddress` text,
  `vwDateFrom` date DEFAULT '0000-00-00',
  `vwDateTo` date DEFAULT '0000-00-00',
  `vwHours` decimal(4,2) DEFAULT '0.00',
  `vwPosition` varchar(50) DEFAULT NULL,
  `VoluntaryIndex` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblExamType`
--

CREATE TABLE `tblExamType` (
  `examId` int(11) NOT NULL,
  `examCode` varchar(20) NOT NULL DEFAULT '',
  `examDesc` varchar(50) NOT NULL DEFAULT '',
  `csElligible` char(1) NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblFlagCeremony`
--

CREATE TABLE `tblFlagCeremony` (
  `flag_id` int(11) NOT NULL,
  `flag_empNumber` varchar(35) NOT NULL,
  `flag_datetime` datetime NOT NULL,
  `flag_added_by` varchar(35) NOT NULL,
  `flag_added_by_ip` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblGroup`
--

CREATE TABLE `tblGroup` (
  `groupcode` varchar(10) NOT NULL DEFAULT '',
  `officecode` varchar(10) NOT NULL DEFAULT '',
  `groupname` varchar(255) NOT NULL DEFAULT '',
  `grouphead` varchar(50) NOT NULL DEFAULT '',
  `groupheadtitle` varchar(50) NOT NULL DEFAULT '',
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblGroup1`
--

CREATE TABLE `tblGroup1` (
  `group1Code` varchar(20) NOT NULL DEFAULT '',
  `group1Name` text NOT NULL,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `group1HeadTitle` varchar(20) NOT NULL DEFAULT '',
  `group1Secretary` varchar(20) NOT NULL DEFAULT '',
  `group1Custodian` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblGroup2`
--

CREATE TABLE `tblGroup2` (
  `group1Code` varchar(20) NOT NULL DEFAULT '',
  `group2Code` varchar(20) NOT NULL DEFAULT '',
  `group2Name` text NOT NULL,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `group2HeadTitle` varchar(10) NOT NULL DEFAULT '',
  `group2Secretary` varchar(20) NOT NULL DEFAULT '',
  `group2Custodian` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblGroup3`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `tblGroup4`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `tblGroup5`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `tblHoliday`
--

CREATE TABLE `tblHoliday` (
  `holidayCode` varchar(20) NOT NULL DEFAULT '',
  `holidayName` varchar(30) NOT NULL DEFAULT '',
  `holidayMonth` varchar(10) DEFAULT NULL,
  `holidayDay` char(2) DEFAULT NULL,
  `fixedHoliday` char(1) NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblHolidayYear`
--

CREATE TABLE `tblHolidayYear` (
  `holidayId` int(11) NOT NULL,
  `holidayCode` varchar(20) NOT NULL DEFAULT '',
  `holidayDate` date NOT NULL DEFAULT '0000-00-00',
  `holidayTime` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblID`
--

CREATE TABLE `tblID` (
  `ID` int(5) NOT NULL,
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblIncome`
--

CREATE TABLE `tblIncome` (
  `incomeCode` varchar(15) NOT NULL DEFAULT '',
  `incomeDesc` varchar(50) NOT NULL DEFAULT '',
  `fixedSwitch` char(1) NOT NULL DEFAULT '',
  `incomeAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `incomeType` varchar(20) NOT NULL DEFAULT '0',
  `recipient` varchar(150) NOT NULL DEFAULT 'ALL',
  `hidden` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblLeave`
--

CREATE TABLE `tblLeave` (
  `leaveCode` char(3) NOT NULL DEFAULT '',
  `leaveType` varchar(50) NOT NULL DEFAULT '',
  `numOfDays` int(2) NOT NULL DEFAULT '0',
  `system` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblLocalHoliday`
--

CREATE TABLE `tblLocalHoliday` (
  `holidayCode` varchar(20) NOT NULL DEFAULT '',
  `holidayName` varchar(30) NOT NULL DEFAULT '',
  `holidayMonth` varchar(10) NOT NULL DEFAULT '',
  `holidayDay` char(2) NOT NULL DEFAULT '',
  `holidayYear` varchar(10) NOT NULL DEFAULT '',
  `holidayDate` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblNonPermComputation`
--

CREATE TABLE `tblNonPermComputation` (
  `id` int(5) NOT NULL,
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
  `lateamount` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblNonPermComputationInstance`
--

CREATE TABLE `tblNonPermComputationInstance` (
  `id` int(5) NOT NULL,
  `startDate` date NOT NULL DEFAULT '0000-00-00',
  `endDate` date NOT NULL DEFAULT '0000-00-00',
  `appointmentCode` varchar(20) NOT NULL DEFAULT '',
  `pmonth` int(2) NOT NULL DEFAULT '0',
  `pyear` int(4) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `period` int(2) NOT NULL DEFAULT '0',
  `payrollGroupCode` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblOfficex`
--

CREATE TABLE `tblOfficex` (
  `officecode` varchar(10) NOT NULL DEFAULT '',
  `officename` varchar(255) NOT NULL DEFAULT '',
  `officehead` varchar(50) NOT NULL DEFAULT '',
  `officeheadtitle` varchar(50) NOT NULL DEFAULT '',
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblOTComputation`
--

CREATE TABLE `tblOTComputation` (
  `id` int(5) NOT NULL,
  `fk_id` int(5) NOT NULL DEFAULT '0',
  `empNumber` varchar(30) NOT NULL DEFAULT '',
  `salary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `basicSalary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalOTHour` int(11) NOT NULL DEFAULT '0',
  `totalOTMinute` int(11) NOT NULL DEFAULT '0',
  `hourOTamount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `minuteOTamount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `taxOTAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `creditableAmount` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblOTComputationInstance`
--

CREATE TABLE `tblOTComputationInstance` (
  `id` int(11) NOT NULL,
  `startDate` date NOT NULL DEFAULT '0000-00-00',
  `endDate` date NOT NULL DEFAULT '0000-00-00',
  `appointmentCode` varchar(20) NOT NULL DEFAULT '',
  `pmonth` int(2) NOT NULL DEFAULT '0',
  `pyear` int(4) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `payrollGroupCode` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblPayrollGroup`
--

CREATE TABLE `tblPayrollGroup` (
  `payrollGroupId` int(11) NOT NULL,
  `payrollGroupCode` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `payrollGroupName` varchar(200) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `projectCode` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `payrollGroupOrder` int(11) NOT NULL DEFAULT '0',
  `payrollGroupRC` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT '-'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblPayrollOfficer`
--

CREATE TABLE `tblPayrollOfficer` (
  `poID` int(11) NOT NULL,
  `empNumber` varchar(20) NOT NULL DEFAULT '',
  `payrollGroupCode` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblPayrollProcess`
--

CREATE TABLE `tblPayrollProcess` (
  `appointmentCode` varchar(20) NOT NULL DEFAULT '',
  `processWith` varchar(200) NOT NULL DEFAULT '',
  `computation` varchar(30) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblPayrolRegister`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `tblPayrolRegisterZone`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `tblPhilhealthRange`
--

CREATE TABLE `tblPhilhealthRange` (
  `philhealthFrom` decimal(10,2) NOT NULL DEFAULT '0.00',
  `philhealthTo` decimal(10,2) NOT NULL DEFAULT '0.00',
  `philSalaryBase` decimal(10,2) NOT NULL DEFAULT '0.00',
  `philMonthlyContri` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblPlantilla`
--

CREATE TABLE `tblPlantilla` (
  `plantillaID` int(11) NOT NULL,
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
  `training` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblPlantillaDuties`
--

CREATE TABLE `tblPlantillaDuties` (
  `itemNumber` varchar(50) NOT NULL DEFAULT '',
  `percentWork` int(5) NOT NULL DEFAULT '0',
  `itemDuties` text,
  `dutyNumber` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblPlantillaGroup`
--

CREATE TABLE `tblPlantillaGroup` (
  `plantillaGroupId` int(11) NOT NULL,
  `plantillaGroupCode` varchar(20) NOT NULL DEFAULT '',
  `plantillaGroupName` varchar(255) NOT NULL DEFAULT '',
  `plantillaGroupOrder` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblPosition`
--

CREATE TABLE `tblPosition` (
  `positionId` int(11) NOT NULL,
  `positionCode` varchar(20) NOT NULL DEFAULT '',
  `positionAbb` varchar(50) NOT NULL DEFAULT '',
  `positionDesc` varchar(70) NOT NULL DEFAULT '',
  `educational` varchar(100) NOT NULL DEFAULT '',
  `experience` varchar(100) NOT NULL DEFAULT '',
  `eligibility` varchar(100) NOT NULL DEFAULT '',
  `training` varchar(200) NOT NULL DEFAULT '',
  `level` varchar(5) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblProcess`
--

CREATE TABLE `tblProcess` (
  `processID` int(11) NOT NULL,
  `employeeAppoint` varchar(20) NOT NULL DEFAULT '',
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `processDate` date DEFAULT NULL,
  `processMonth` int(11) DEFAULT NULL,
  `processYear` int(11) DEFAULT NULL,
  `processCode` varchar(15) DEFAULT NULL,
  `payrollGroupCode` varchar(50) NOT NULL DEFAULT '',
  `salarySchedule` varchar(10) NOT NULL DEFAULT '',
  `period` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblProcessedEmployees`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `tblProcessedPayrollGroup`
--

CREATE TABLE `tblProcessedPayrollGroup` (
  `processID` int(11) NOT NULL DEFAULT '0',
  `payrollGroupCode` varchar(20) NOT NULL DEFAULT '',
  `payrollGroupName` varchar(200) NOT NULL DEFAULT '',
  `projectCode` varchar(20) NOT NULL DEFAULT '',
  `payrollGroupOrder` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblProcessedProject`
--

CREATE TABLE `tblProcessedProject` (
  `processID` int(11) NOT NULL DEFAULT '0',
  `projectCode` varchar(100) NOT NULL DEFAULT '',
  `projectDesc` text NOT NULL,
  `projectOrder` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblProject`
--

CREATE TABLE `tblProject` (
  `projectId` int(11) NOT NULL,
  `projectCode` varchar(100) NOT NULL DEFAULT '',
  `projectDesc` text NOT NULL,
  `projectOrder` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblRATA`
--

CREATE TABLE `tblRATA` (
  `RATACode` char(3) NOT NULL DEFAULT '',
  `RATAAmount` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblReports`
--

CREATE TABLE `tblReports` (
  `reportCode` varchar(10) NOT NULL DEFAULT '',
  `reportDesc` text NOT NULL,
  `reportType` varchar(255) NOT NULL DEFAULT '',
  `reportModule` varchar(4) NOT NULL DEFAULT '',
  `reportStatus` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblReportType`
--

CREATE TABLE `tblReportType` (
  `reportCode` varchar(10) NOT NULL DEFAULT '',
  `reportDesc` text NOT NULL,
  `reportType` varchar(255) NOT NULL DEFAULT '',
  `reportModule` varchar(4) NOT NULL DEFAULT '',
  `numberOfSignatory` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblRequestApplicant`
--

CREATE TABLE `tblRequestApplicant` (
  `AppliCode` varchar(100) NOT NULL DEFAULT '',
  `Applicant` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblRequestFlow`
--

CREATE TABLE `tblRequestFlow` (
  `reqID` int(2) NOT NULL,
  `RequestType` varchar(100) NOT NULL DEFAULT '',
  `Applicant` varchar(100) NOT NULL DEFAULT '',
  `Signatory1` varchar(100) NOT NULL DEFAULT '',
  `Signatory2` varchar(100) NOT NULL DEFAULT '',
  `Signatory3` varchar(100) NOT NULL DEFAULT '',
  `SignatoryFin` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblRequestSignatory`
--

CREATE TABLE `tblRequestSignatory` (
  `SignCode` varchar(50) NOT NULL DEFAULT '',
  `Signatory` varchar(100) NOT NULL DEFAULT '',
  `SignHead` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblRequestSignatoryAction`
--

CREATE TABLE `tblRequestSignatoryAction` (
  `ID` int(2) NOT NULL,
  `ActionDesc` varchar(50) NOT NULL DEFAULT '',
  `ActionCode` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblRequestType`
--

CREATE TABLE `tblRequestType` (
  `requestCode` varchar(20) NOT NULL DEFAULT '',
  `requestDesc` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblSalarySched`
--

CREATE TABLE `tblSalarySched` (
  `stepNumber` int(2) NOT NULL DEFAULT '0',
  `salaryGradeNumber` int(2) NOT NULL DEFAULT '0',
  `actualSalary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `version` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblSalarySchedVersion`
--

CREATE TABLE `tblSalarySchedVersion` (
  `version` int(10) NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(50) NOT NULL DEFAULT '',
  `effectivity` date NOT NULL DEFAULT '0000-00-00',
  `unused` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblScheduler_Logs`
--

CREATE TABLE `tblScheduler_Logs` (
  `id` int(10) NOT NULL DEFAULT '0',
  `script` varchar(130) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `output` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `execution_time` varchar(130) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblScholarship`
--

CREATE TABLE `tblScholarship` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblSecurityCode`
--

CREATE TABLE `tblSecurityCode` (
  `securityID` int(11) NOT NULL,
  `empNumber` varchar(20) NOT NULL DEFAULT '',
  `securityQuestion` varchar(30) NOT NULL DEFAULT '',
  `securityAnswer` varchar(30) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblSecurityQuestion`
--

CREATE TABLE `tblSecurityQuestion` (
  `securityCode` int(11) NOT NULL,
  `securityQuestion` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblSeparationCause`
--

CREATE TABLE `tblSeparationCause` (
  `separationCause` varchar(50) NOT NULL DEFAULT '',
  `system` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblServiceCode`
--

CREATE TABLE `tblServiceCode` (
  `serviceId` int(11) NOT NULL,
  `serviceCode` varchar(20) NOT NULL DEFAULT '',
  `serviceDesc` varchar(50) NOT NULL DEFAULT '',
  `system` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblServiceRecord`
--

CREATE TABLE `tblServiceRecord` (
  `serviceRecID` int(11) NOT NULL,
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
  `signee` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblSignatory`
--

CREATE TABLE `tblSignatory` (
  `signatoryId` int(11) NOT NULL,
  `payrollGroupCode` varchar(20) NOT NULL DEFAULT '',
  `signatory` text NOT NULL,
  `signatoryPosition` text NOT NULL,
  `signatoryOrder` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblSignatory_edited`
--

CREATE TABLE `tblSignatory_edited` (
  `signatoryId` int(11) NOT NULL,
  `payrollGroupCode` varchar(20) NOT NULL DEFAULT '',
  `signatory` text NOT NULL,
  `signatoryPosition` text NOT NULL,
  `signatoryOrder` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblSpecificLeave`
--

CREATE TABLE `tblSpecificLeave` (
  `leaveCode` char(3) NOT NULL DEFAULT '',
  `specifyLeave` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblTaxDetails`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `tblTaxExempt`
--

CREATE TABLE `tblTaxExempt` (
  `taxStatus` varchar(20) NOT NULL DEFAULT '',
  `exemptAmount` float(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblTaxRange`
--

CREATE TABLE `tblTaxRange` (
  `taxableFrom` decimal(10,2) NOT NULL DEFAULT '0.00',
  `taxableTo` decimal(10,2) NOT NULL DEFAULT '0.00',
  `taxFactor` decimal(10,2) NOT NULL DEFAULT '0.00',
  `taxBase` decimal(10,2) NOT NULL DEFAULT '0.00',
  `taxDeduct` decimal(10,2) NOT NULL DEFAULT '0.00',
  `orderNumber` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblTempNotification`
--

CREATE TABLE `tblTempNotification` (
  `tmpDate` date NOT NULL DEFAULT '0000-00-00',
  `tmpStepIncrement` int(11) NOT NULL DEFAULT '0',
  `tmpBirthday` int(11) NOT NULL DEFAULT '0',
  `tmpEmployeesMovement` int(11) NOT NULL DEFAULT '0',
  `tmpVacantPosition` int(11) NOT NULL DEFAULT '0',
  `tmpRetiree` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblWorkZone`
--

CREATE TABLE `tblWorkZone` (
  `currentWorkZone` varchar(20) DEFAULT NULL,
  `currentchiefworkzone` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='stores the current working zone. 201 display depend on which';

-- --------------------------------------------------------

--
-- Table structure for table `tblZone`
--

CREATE TABLE `tblZone` (
  `zonecode` varchar(20) NOT NULL DEFAULT '',
  `zonedesc` varchar(255) NOT NULL DEFAULT '',
  `serverName` varchar(30) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(30) NOT NULL DEFAULT '',
  `databaseName` varchar(30) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempEmpDeduct`
--

CREATE TABLE `tempEmpDeduct` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `deductionCode` varchar(20) NOT NULL DEFAULT '',
  `deductionDesc` varchar(30) NOT NULL DEFAULT '',
  `deductAmount` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempEmpIncome`
--

CREATE TABLE `tempEmpIncome` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `incomeCode` varchar(20) NOT NULL DEFAULT '',
  `incomeDesc` varchar(30) NOT NULL DEFAULT '',
  `incomeAmount` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xbacktblEmpPersonal`
--

CREATE TABLE `xbacktblEmpPersonal` (
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `surname` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `middlename` varchar(50) NOT NULL DEFAULT '',
  `middleInitial` varchar(10) DEFAULT NULL,
  `nameExtension` varchar(10) DEFAULT '',
  `sex` char(1) NOT NULL DEFAULT 'M',
  `civilStatus` varchar(20) NOT NULL DEFAULT 'Single',
  `spouse` varchar(80) NOT NULL DEFAULT '',
  `spouseWork` varchar(50) NOT NULL DEFAULT '',
  `spouseBusName` varchar(70) NOT NULL DEFAULT '',
  `spouseBusAddress` text,
  `spouseTelephone` varchar(10) DEFAULT NULL,
  `tin` varchar(20) DEFAULT NULL,
  `citizenship` varchar(10) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `birthPlace` varchar(80) NOT NULL DEFAULT '',
  `bloodType` varchar(6) DEFAULT NULL,
  `height` decimal(5,2) NOT NULL DEFAULT '0.00',
  `weight` decimal(5,2) NOT NULL DEFAULT '0.00',
  `residentialAddress` text,
  `zipCode1` int(4) DEFAULT NULL,
  `telephone1` varchar(20) DEFAULT NULL,
  `permanentAddress` text,
  `zipCode2` int(4) DEFAULT NULL,
  `telephone2` varchar(20) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `fatherName` varchar(80) NOT NULL DEFAULT '',
  `motherName` varchar(80) NOT NULL DEFAULT '',
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
  `philHealthNumber` varchar(14) DEFAULT NULL,
  `sssNumber` varchar(20) DEFAULT '',
  `pagibigNumber` varchar(14) DEFAULT NULL,
  `AccountNum` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xbacktblEmpPosition`
--

CREATE TABLE `xbacktblEmpPosition` (
  `empNumber` varchar(15) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
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
  `contractEndDate` date DEFAULT '0000-00-00',
  `effectiveDate` date NOT NULL DEFAULT '0000-00-00',
  `positionDate` date NOT NULL DEFAULT '0000-00-00',
  `longevityDate` date NOT NULL DEFAULT '0000-00-00',
  `longevityGap` decimal(4,2) DEFAULT '0.00',
  `firstDayAgency` date NOT NULL DEFAULT '0000-00-00',
  `firstDayGov` date NOT NULL DEFAULT '0000-00-00',
  `assignPlace` varchar(50) DEFAULT NULL,
  `stepNumber` int(2) NOT NULL DEFAULT '0',
  `dateIncremented` date NOT NULL DEFAULT '0000-00-00',
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
  `tmpDateIncremented` date NOT NULL DEFAULT '0000-00-00',
  `tmpPositionDate` date NOT NULL DEFAULT '0000-00-00',
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
  `group5` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xesessions`
--

CREATE TABLE `xesessions` (
  `sess_id` varchar(32) NOT NULL DEFAULT '',
  `sess_sec_level` tinyint(3) UNSIGNED NOT NULL DEFAULT '255',
  `sess_created` int(11) NOT NULL DEFAULT '0',
  `sess_expiry` int(11) NOT NULL DEFAULT '0',
  `sess_timeout` int(11) NOT NULL DEFAULT '0',
  `sess_locked` tinyint(1) NOT NULL DEFAULT '1',
  `sess_value` text NOT NULL,
  `sess_enc_iv` varchar(32) NOT NULL DEFAULT '',
  `sess_sec_id` varchar(32) NOT NULL DEFAULT '',
  `sess_trace` tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='This table stores PHP session data';

-- --------------------------------------------------------

--
-- Table structure for table `xphpjobscheduler`
--

CREATE TABLE `xphpjobscheduler` (
  `id` int(11) NOT NULL,
  `scriptpath` varchar(255) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `time_interval` int(11) DEFAULT NULL,
  `fire_time` int(11) NOT NULL DEFAULT '0',
  `time_last_fired` int(11) DEFAULT NULL,
  `run_only_once` tinyint(1) NOT NULL DEFAULT '0',
  `currently_running` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xphpjobscheduler_logs`
--

CREATE TABLE `xphpjobscheduler_logs` (
  `id` int(11) NOT NULL DEFAULT '0',
  `script` varchar(128) DEFAULT NULL,
  `output` text,
  `execution_time` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xtblBackUpScheduler`
--

CREATE TABLE `xtblBackUpScheduler` (
  `id` int(10) NOT NULL DEFAULT '0',
  `time_interval` int(10) DEFAULT NULL,
  `fire_time` int(10) NOT NULL DEFAULT '0',
  `time_last_fired` int(10) DEFAULT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `ftpip` varchar(20) NOT NULL DEFAULT '',
  `ftpuname` varchar(20) NOT NULL DEFAULT '',
  `ftppass` varchar(20) NOT NULL DEFAULT '',
  `ftppath` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xtblDept`
--

CREATE TABLE `xtblDept` (
  `departmentcode` varchar(10) NOT NULL DEFAULT '',
  `groupcode` varchar(10) NOT NULL DEFAULT '',
  `departmentname` varchar(255) NOT NULL DEFAULT '',
  `departmenthead` varchar(50) NOT NULL DEFAULT '',
  `departmentheadtitle` varchar(50) NOT NULL DEFAULT '',
  `empNumber` varchar(15) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xtblDivision`
--

CREATE TABLE `xtblDivision` (
  `divisionCode` varchar(20) NOT NULL DEFAULT '',
  `divisionName` varchar(100) NOT NULL DEFAULT '',
  `projectCode` text NOT NULL,
  `empNumber` varchar(15) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `divisionHead` varchar(50) NOT NULL DEFAULT '',
  `divisionHeadTitle` varchar(50) NOT NULL DEFAULT '',
  `divisionCustodian` varchar(15) NOT NULL DEFAULT '',
  `divisionSecretary` varchar(15) NOT NULL DEFAULT '',
  `departmentcode` varchar(10) NOT NULL DEFAULT '',
  `serviceCode` varchar(20) NOT NULL DEFAULT '',
  `eoCode` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xtblEmpDeductConRemit`
--

CREATE TABLE `xtblEmpDeductConRemit` (
  `processID` int(11) NOT NULL DEFAULT '0',
  `empNumber` varchar(15) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `code` int(100) NOT NULL DEFAULT '0',
  `deductionCode` varchar(20) NOT NULL DEFAULT '',
  `deductMonth` varchar(10) NOT NULL DEFAULT '',
  `deductYear` year(4) NOT NULL DEFAULT '0000',
  `deductAmount` decimal(10,2) DEFAULT NULL,
  `orNumber` varchar(20) DEFAULT NULL,
  `orDate` date NOT NULL DEFAULT '0000-00-00',
  `TYPE` varchar(20) NOT NULL DEFAULT '',
  `appointmentCode` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xtblEmpDeductContri`
--

CREATE TABLE `xtblEmpDeductContri` (
  `empNumber` varchar(15) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `deductionCode` varchar(20) NOT NULL DEFAULT '',
  `deductAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `contriCode` int(100) NOT NULL,
  `status` char(1) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xtblEmpDeductOtherAdjust`
--

CREATE TABLE `xtblEmpDeductOtherAdjust` (
  `empNumber` varchar(15) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `deductionCode` varchar(20) NOT NULL DEFAULT '',
  `deductMonth` varchar(10) NOT NULL DEFAULT '',
  `deductYear` year(4) NOT NULL DEFAULT '0000',
  `deductAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `adjustSwitch` char(1) NOT NULL DEFAULT '',
  `adjustMonth` varchar(10) NOT NULL DEFAULT '0',
  `adjustYear` year(4) NOT NULL DEFAULT '0000',
  `appointmentCode` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xtblEmpDeductOtherRemit`
--

CREATE TABLE `xtblEmpDeductOtherRemit` (
  `processID` int(11) DEFAULT NULL,
  `empNumber` varchar(15) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `deductionCode` varchar(20) NOT NULL DEFAULT '',
  `deductMonth` varchar(10) NOT NULL DEFAULT '',
  `deductYear` year(4) NOT NULL DEFAULT '0000',
  `deductAmount` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xtblEmpDeductReguAdjust`
--

CREATE TABLE `xtblEmpDeductReguAdjust` (
  `empNumber` varchar(15) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `deductionCode` varchar(20) NOT NULL DEFAULT '',
  `deductMonth` varchar(10) NOT NULL DEFAULT '',
  `deductYear` year(4) NOT NULL DEFAULT '0000',
  `deductAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `orNumber` varchar(20) DEFAULT NULL,
  `orDate` date DEFAULT NULL,
  `employerAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `adjustSwitch` char(1) NOT NULL DEFAULT '',
  `adjustMonth` varchar(10) NOT NULL DEFAULT '0',
  `adjustYear` year(4) NOT NULL DEFAULT '0000',
  `appointmentCode` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xtblEmpDeductReguRemit`
--

CREATE TABLE `xtblEmpDeductReguRemit` (
  `processID` int(11) NOT NULL DEFAULT '0',
  `empNumber` varchar(15) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `deductionCode` varchar(20) NOT NULL DEFAULT '',
  `deductMonth` varchar(10) NOT NULL DEFAULT '',
  `deductYear` year(4) NOT NULL DEFAULT '0000',
  `positionCode` varchar(20) NOT NULL DEFAULT '',
  `actualSalary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `deductAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `orNumber` varchar(20) DEFAULT NULL,
  `orDate` date DEFAULT NULL,
  `employerAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `appointmentCode` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xtblExeOffice`
--

CREATE TABLE `xtblExeOffice` (
  `eoCode` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `eoName` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `empNumber` varchar(15) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `eoHead` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `eoHeadTitle` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `eoCustodian` varchar(15) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `eoSecretary` varchar(15) COLLATE latin1_general_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `xtblPlantillaGroup2`
--

CREATE TABLE `xtblPlantillaGroup2` (
  `plantillaGroupCode` varchar(20) NOT NULL DEFAULT '',
  `plantillaGroupName` varchar(255) NOT NULL DEFAULT '',
  `plantillaGroupOrder` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xtblSection`
--

CREATE TABLE `xtblSection` (
  `sectionCode` varchar(20) NOT NULL DEFAULT '',
  `divisionCode` varchar(20) NOT NULL DEFAULT '',
  `sectionName` varchar(50) NOT NULL DEFAULT '',
  `empNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `sectionHead` varchar(50) NOT NULL DEFAULT '',
  `sectionHeadTitle` varchar(50) NOT NULL DEFAULT '',
  `sectionCustodian` varchar(15) NOT NULL DEFAULT '',
  `sectionSecretary` varchar(15) NOT NULL DEFAULT '',
  `eoCode` varchar(20) NOT NULL DEFAULT '',
  `serviceCode` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xtblService`
--

CREATE TABLE `xtblService` (
  `serviceCode` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `serviceName` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `empNumber` varchar(15) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `serviceHead` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `serviceHeadTitle` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `serviceCustodian` varchar(15) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `serviceSecretary` varchar(15) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `eoCode` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `xtblURLparam`
--

CREATE TABLE `xtblURLparam` (
  `url` text NOT NULL,
  `param` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblAgency`
--
ALTER TABLE `tblAgency`
  ADD PRIMARY KEY (`agencyName`);

--
-- Indexes for table `tblAgencyImages`
--
ALTER TABLE `tblAgencyImages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblAppointment`
--
ALTER TABLE `tblAppointment`
  ADD PRIMARY KEY (`appointmentId`);

--
-- Indexes for table `tblAppointmentx`
--
ALTER TABLE `tblAppointmentx`
  ADD PRIMARY KEY (`appointmentCode`);

--
-- Indexes for table `tblAttendanceCode`
--
ALTER TABLE `tblAttendanceCode`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `tblAttendanceScheme`
--
ALTER TABLE `tblAttendanceScheme`
  ADD PRIMARY KEY (`schemeCode`),
  ADD KEY `schemeName` (`schemeName`);

--
-- Indexes for table `tblBackup`
--
ALTER TABLE `tblBackup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblBrokenSched`
--
ALTER TABLE `tblBrokenSched`
  ADD PRIMARY KEY (`rec_ID`);

--
-- Indexes for table `tblChangeLog`
--
ALTER TABLE `tblChangeLog`
  ADD PRIMARY KEY (`changeLogId`);

--
-- Indexes for table `tblComputation`
--
ALTER TABLE `tblComputation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblComputationInstance`
--
ALTER TABLE `tblComputationInstance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblContact`
--
ALTER TABLE `tblContact`
  ADD PRIMARY KEY (`agencyCode`);

--
-- Indexes for table `tblCountry`
--
ALTER TABLE `tblCountry`
  ADD PRIMARY KEY (`countryId`);

--
-- Indexes for table `tblCourse`
--
ALTER TABLE `tblCourse`
  ADD PRIMARY KEY (`courseId`),
  ADD UNIQUE KEY `courseCode` (`courseCode`) USING BTREE;

--
-- Indexes for table `tblCoursex`
--
ALTER TABLE `tblCoursex`
  ADD PRIMARY KEY (`courseId`);

--
-- Indexes for table `tblCustodian`
--
ALTER TABLE `tblCustodian`
  ADD PRIMARY KEY (`custodianId`);

--
-- Indexes for table `tblDailyQuote`
--
ALTER TABLE `tblDailyQuote`
  ADD PRIMARY KEY (`day`);

--
-- Indexes for table `tblDeduction`
--
ALTER TABLE `tblDeduction`
  ADD PRIMARY KEY (`deductionCode`);

--
-- Indexes for table `tblEducationalLevel`
--
ALTER TABLE `tblEducationalLevel`
  ADD PRIMARY KEY (`levelCode`),
  ADD KEY `levelDesc` (`levelDesc`);

--
-- Indexes for table `tblEmpAccount`
--
ALTER TABLE `tblEmpAccount`
  ADD PRIMARY KEY (`empNumber`),
  ADD KEY `Emp_No` (`empNumber`);

--
-- Indexes for table `tblEmpAppointment`
--
ALTER TABLE `tblEmpAppointment`
  ADD PRIMARY KEY (`appointmentissuedcode`);

--
-- Indexes for table `tblEmpBenefits`
--
ALTER TABLE `tblEmpBenefits`
  ADD PRIMARY KEY (`benefitCode`);

--
-- Indexes for table `tblEmpChild`
--
ALTER TABLE `tblEmpChild`
  ADD PRIMARY KEY (`childCode`);

--
-- Indexes for table `tblEmpDeductions`
--
ALTER TABLE `tblEmpDeductions`
  ADD PRIMARY KEY (`deductCode`);

--
-- Indexes for table `tblEmpDeductLoan`
--
ALTER TABLE `tblEmpDeductLoan`
  ADD PRIMARY KEY (`loanCode`);

--
-- Indexes for table `tblEmpDTR`
--
ALTER TABLE `tblEmpDTR`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_dtrDate` (`dtrDate`),
  ADD KEY `idx_empNumber` (`empNumber`);

--
-- Indexes for table `tblEmpDTR_log`
--
ALTER TABLE `tblEmpDTR_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblEmpExam`
--
ALTER TABLE `tblEmpExam`
  ADD PRIMARY KEY (`ExamIndex`),
  ADD KEY `Emp_No` (`empNumber`);

--
-- Indexes for table `tblEmpIncome`
--
ALTER TABLE `tblEmpIncome`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `tblEmpIncomeAdjust`
--
ALTER TABLE `tblEmpIncomeAdjust`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `tblEmpLeave`
--
ALTER TABLE `tblEmpLeave`
  ADD PRIMARY KEY (`leaveID`);

--
-- Indexes for table `tblEmpLeaveBalance`
--
ALTER TABLE `tblEmpLeaveBalance`
  ADD PRIMARY KEY (`lb_id`);

--
-- Indexes for table `tblEmpLeaveBalance_040716`
--
ALTER TABLE `tblEmpLeaveBalance_040716`
  ADD PRIMARY KEY (`lb_id`);

--
-- Indexes for table `tblEmpLeaveBalance_11242016`
--
ALTER TABLE `tblEmpLeaveBalance_11242016`
  ADD PRIMARY KEY (`lb_id`);

--
-- Indexes for table `tblEmpLeaveBalance_Aug16`
--
ALTER TABLE `tblEmpLeaveBalance_Aug16`
  ADD PRIMARY KEY (`lb_id`);

--
-- Indexes for table `tblEmpLeaveBalance_Jan2017`
--
ALTER TABLE `tblEmpLeaveBalance_Jan2017`
  ADD PRIMARY KEY (`lb_id`);

--
-- Indexes for table `tblEmpLeaveBalance_w/Dec2016`
--
ALTER TABLE `tblEmpLeaveBalance_w/Dec2016`
  ADD PRIMARY KEY (`lb_id`);

--
-- Indexes for table `tblEmpLeaveBalance_w/o_Nov2016`
--
ALTER TABLE `tblEmpLeaveBalance_w/o_Nov2016`
  ADD PRIMARY KEY (`lb_id`);

--
-- Indexes for table `tblEmpLocalHoliday`
--
ALTER TABLE `tblEmpLocalHoliday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblEmpLongevity`
--
ALTER TABLE `tblEmpLongevity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblEmpMeeting`
--
ALTER TABLE `tblEmpMeeting`
  ADD PRIMARY KEY (`meetingID`);

--
-- Indexes for table `tblEmpMonetization`
--
ALTER TABLE `tblEmpMonetization`
  ADD PRIMARY KEY (`mon_id`);

--
-- Indexes for table `tblEmpNetPay`
--
ALTER TABLE `tblEmpNetPay`
  ADD UNIQUE KEY `uid` (`periodMonth`,`periodYear`,`empNumber`);

--
-- Indexes for table `tblEmpOB`
--
ALTER TABLE `tblEmpOB`
  ADD PRIMARY KEY (`obID`),
  ADD KEY `obDateFrom` (`obDateFrom`),
  ADD KEY `obDateTo` (`obDateTo`),
  ADD KEY `empNumber` (`empNumber`);

--
-- Indexes for table `tblEmpOtherSched`
--
ALTER TABLE `tblEmpOtherSched`
  ADD PRIMARY KEY (`rec_ID`),
  ADD KEY `idx_empNumber` (`empNumber`);

--
-- Indexes for table `tblEmpOvertime`
--
ALTER TABLE `tblEmpOvertime`
  ADD PRIMARY KEY (`otID`);

--
-- Indexes for table `tblEmpPersonal`
--
ALTER TABLE `tblEmpPersonal`
  ADD PRIMARY KEY (`empNumber`),
  ADD KEY `Emp_No` (`empNumber`),
  ADD KEY `empID` (`empID`);

--
-- Indexes for table `tblEmpPersonalx`
--
ALTER TABLE `tblEmpPersonalx`
  ADD PRIMARY KEY (`empNumber`),
  ADD KEY `Emp_No` (`empNumber`),
  ADD KEY `empID` (`empID`);

--
-- Indexes for table `tblEmpPosition`
--
ALTER TABLE `tblEmpPosition`
  ADD PRIMARY KEY (`empNumber`),
  ADD KEY `AppointmentCode` (`appointmentCode`),
  ADD KEY `DivisionCode` (`divisionCode`),
  ADD KEY `Emp_No` (`empNumber`),
  ADD KEY `PositionCode` (`positionCode`),
  ADD KEY `SectionCode` (`sectionCode`),
  ADD KEY `ServiceCode` (`serviceCode`),
  ADD KEY `TaxStatusCode` (`taxStatCode`),
  ADD KEY `idx_empNumber` (`empNumber`);

--
-- Indexes for table `tblEmpReference`
--
ALTER TABLE `tblEmpReference`
  ADD PRIMARY KEY (`ReferenceIndex`);

--
-- Indexes for table `tblEmpRequest`
--
ALTER TABLE `tblEmpRequest`
  ADD PRIMARY KEY (`requestID`);

--
-- Indexes for table `tblEmpScholarship`
--
ALTER TABLE `tblEmpScholarship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblEmpSchool`
--
ALTER TABLE `tblEmpSchool`
  ADD PRIMARY KEY (`SchoolIndex`),
  ADD KEY `SchoolType` (`levelCode`);

--
-- Indexes for table `tblEmpTraining`
--
ALTER TABLE `tblEmpTraining`
  ADD PRIMARY KEY (`TrainingIndex`),
  ADD KEY `Emp_No` (`empNumber`),
  ADD KEY `TrainingID` (`XtrainingCode`);

--
-- Indexes for table `tblEmpTravelOrder`
--
ALTER TABLE `tblEmpTravelOrder`
  ADD PRIMARY KEY (`toID`);

--
-- Indexes for table `tblEmpTripTicket`
--
ALTER TABLE `tblEmpTripTicket`
  ADD PRIMARY KEY (`ttID`);

--
-- Indexes for table `tblEmpVoluntaryWork`
--
ALTER TABLE `tblEmpVoluntaryWork`
  ADD PRIMARY KEY (`VoluntaryIndex`);

--
-- Indexes for table `tblExamType`
--
ALTER TABLE `tblExamType`
  ADD PRIMARY KEY (`examId`);

--
-- Indexes for table `tblFlagCeremony`
--
ALTER TABLE `tblFlagCeremony`
  ADD PRIMARY KEY (`flag_id`);

--
-- Indexes for table `tblGroup`
--
ALTER TABLE `tblGroup`
  ADD PRIMARY KEY (`groupcode`);

--
-- Indexes for table `tblHoliday`
--
ALTER TABLE `tblHoliday`
  ADD PRIMARY KEY (`holidayCode`);

--
-- Indexes for table `tblHolidayYear`
--
ALTER TABLE `tblHolidayYear`
  ADD PRIMARY KEY (`holidayId`),
  ADD KEY `idx_holidayDate` (`holidayDate`);

--
-- Indexes for table `tblID`
--
ALTER TABLE `tblID`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblLeave`
--
ALTER TABLE `tblLeave`
  ADD PRIMARY KEY (`leaveCode`);

--
-- Indexes for table `tblNonPermComputation`
--
ALTER TABLE `tblNonPermComputation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblNonPermComputationInstance`
--
ALTER TABLE `tblNonPermComputationInstance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblOfficex`
--
ALTER TABLE `tblOfficex`
  ADD PRIMARY KEY (`officecode`);

--
-- Indexes for table `tblOTComputation`
--
ALTER TABLE `tblOTComputation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblOTComputationInstance`
--
ALTER TABLE `tblOTComputationInstance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblPayrollGroup`
--
ALTER TABLE `tblPayrollGroup`
  ADD PRIMARY KEY (`payrollGroupId`);

--
-- Indexes for table `tblPayrollOfficer`
--
ALTER TABLE `tblPayrollOfficer`
  ADD PRIMARY KEY (`poID`);

--
-- Indexes for table `tblPlantilla`
--
ALTER TABLE `tblPlantilla`
  ADD PRIMARY KEY (`plantillaID`),
  ADD KEY `itemNumber` (`itemNumber`);

--
-- Indexes for table `tblPlantillaGroup`
--
ALTER TABLE `tblPlantillaGroup`
  ADD PRIMARY KEY (`plantillaGroupId`);

--
-- Indexes for table `tblPosition`
--
ALTER TABLE `tblPosition`
  ADD PRIMARY KEY (`positionId`);

--
-- Indexes for table `tblProcess`
--
ALTER TABLE `tblProcess`
  ADD PRIMARY KEY (`processID`);

--
-- Indexes for table `tblProject`
--
ALTER TABLE `tblProject`
  ADD PRIMARY KEY (`projectId`);

--
-- Indexes for table `tblRATA`
--
ALTER TABLE `tblRATA`
  ADD PRIMARY KEY (`RATACode`);

--
-- Indexes for table `tblReports`
--
ALTER TABLE `tblReports`
  ADD PRIMARY KEY (`reportCode`);

--
-- Indexes for table `tblReportType`
--
ALTER TABLE `tblReportType`
  ADD PRIMARY KEY (`reportCode`);

--
-- Indexes for table `tblRequestApplicant`
--
ALTER TABLE `tblRequestApplicant`
  ADD PRIMARY KEY (`AppliCode`);

--
-- Indexes for table `tblRequestFlow`
--
ALTER TABLE `tblRequestFlow`
  ADD PRIMARY KEY (`reqID`);

--
-- Indexes for table `tblRequestSignatory`
--
ALTER TABLE `tblRequestSignatory`
  ADD PRIMARY KEY (`SignCode`);

--
-- Indexes for table `tblRequestSignatoryAction`
--
ALTER TABLE `tblRequestSignatoryAction`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblRequestType`
--
ALTER TABLE `tblRequestType`
  ADD PRIMARY KEY (`requestCode`);

--
-- Indexes for table `tblSalarySchedVersion`
--
ALTER TABLE `tblSalarySchedVersion`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `tblScholarship`
--
ALTER TABLE `tblScholarship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblSecurityCode`
--
ALTER TABLE `tblSecurityCode`
  ADD PRIMARY KEY (`securityID`);

--
-- Indexes for table `tblSecurityQuestion`
--
ALTER TABLE `tblSecurityQuestion`
  ADD PRIMARY KEY (`securityCode`);

--
-- Indexes for table `tblSeparationCause`
--
ALTER TABLE `tblSeparationCause`
  ADD PRIMARY KEY (`separationCause`);

--
-- Indexes for table `tblServiceCode`
--
ALTER TABLE `tblServiceCode`
  ADD PRIMARY KEY (`serviceId`);

--
-- Indexes for table `tblServiceRecord`
--
ALTER TABLE `tblServiceRecord`
  ADD PRIMARY KEY (`serviceRecID`),
  ADD KEY `empNumber` (`empNumber`);

--
-- Indexes for table `tblSignatory`
--
ALTER TABLE `tblSignatory`
  ADD PRIMARY KEY (`signatoryId`);

--
-- Indexes for table `tblSignatory_edited`
--
ALTER TABLE `tblSignatory_edited`
  ADD PRIMARY KEY (`signatoryId`);

--
-- Indexes for table `tblTaxExempt`
--
ALTER TABLE `tblTaxExempt`
  ADD PRIMARY KEY (`taxStatus`);

--
-- Indexes for table `xbacktblEmpPersonal`
--
ALTER TABLE `xbacktblEmpPersonal`
  ADD PRIMARY KEY (`empNumber`),
  ADD KEY `Emp_No` (`empNumber`);

--
-- Indexes for table `xbacktblEmpPosition`
--
ALTER TABLE `xbacktblEmpPosition`
  ADD PRIMARY KEY (`empNumber`),
  ADD KEY `AppointmentCode` (`appointmentCode`),
  ADD KEY `DivisionCode` (`divisionCode`),
  ADD KEY `Emp_No` (`empNumber`),
  ADD KEY `PositionCode` (`positionCode`),
  ADD KEY `SectionCode` (`sectionCode`),
  ADD KEY `ServiceCode` (`serviceCode`),
  ADD KEY `TaxStatusCode` (`taxStatCode`);

--
-- Indexes for table `xesessions`
--
ALTER TABLE `xesessions`
  ADD PRIMARY KEY (`sess_id`);

--
-- Indexes for table `xphpjobscheduler`
--
ALTER TABLE `xphpjobscheduler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fire_time` (`fire_time`);

--
-- Indexes for table `xphpjobscheduler_logs`
--
ALTER TABLE `xphpjobscheduler_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xtblDept`
--
ALTER TABLE `xtblDept`
  ADD PRIMARY KEY (`departmentcode`);

--
-- Indexes for table `xtblDivision`
--
ALTER TABLE `xtblDivision`
  ADD PRIMARY KEY (`divisionCode`);

--
-- Indexes for table `xtblEmpDeductContri`
--
ALTER TABLE `xtblEmpDeductContri`
  ADD PRIMARY KEY (`contriCode`);

--
-- Indexes for table `xtblExeOffice`
--
ALTER TABLE `xtblExeOffice`
  ADD PRIMARY KEY (`eoCode`);

--
-- Indexes for table `xtblSection`
--
ALTER TABLE `xtblSection`
  ADD PRIMARY KEY (`sectionCode`);

--
-- Indexes for table `xtblService`
--
ALTER TABLE `xtblService`
  ADD PRIMARY KEY (`serviceCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblAgencyImages`
--
ALTER TABLE `tblAgencyImages`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `tblAppointment`
--
ALTER TABLE `tblAppointment`
  MODIFY `appointmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tblBrokenSched`
--
ALTER TABLE `tblBrokenSched`
  MODIFY `rec_ID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblChangeLog`
--
ALTER TABLE `tblChangeLog`
  MODIFY `changeLogId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120279;
--
-- AUTO_INCREMENT for table `tblComputation`
--
ALTER TABLE `tblComputation`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2924527;
--
-- AUTO_INCREMENT for table `tblComputationInstance`
--
ALTER TABLE `tblComputationInstance`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3556;
--
-- AUTO_INCREMENT for table `tblCountry`
--
ALTER TABLE `tblCountry`
  MODIFY `countryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;
--
-- AUTO_INCREMENT for table `tblCourse`
--
ALTER TABLE `tblCourse`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;
--
-- AUTO_INCREMENT for table `tblCoursex`
--
ALTER TABLE `tblCoursex`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;
--
-- AUTO_INCREMENT for table `tblCustodian`
--
ALTER TABLE `tblCustodian`
  MODIFY `custodianId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `tblEmpAppointment`
--
ALTER TABLE `tblEmpAppointment`
  MODIFY `appointmentissuedcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tblEmpBenefits`
--
ALTER TABLE `tblEmpBenefits`
  MODIFY `benefitCode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=596893;
--
-- AUTO_INCREMENT for table `tblEmpChild`
--
ALTER TABLE `tblEmpChild`
  MODIFY `childCode` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=729;
--
-- AUTO_INCREMENT for table `tblEmpDeductions`
--
ALTER TABLE `tblEmpDeductions`
  MODIFY `deductCode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5853;
--
-- AUTO_INCREMENT for table `tblEmpDeductLoan`
--
ALTER TABLE `tblEmpDeductLoan`
  MODIFY `loanCode` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblEmpDTR`
--
ALTER TABLE `tblEmpDTR`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326115;
--
-- AUTO_INCREMENT for table `tblEmpDTR_log`
--
ALTER TABLE `tblEmpDTR_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131609;
--
-- AUTO_INCREMENT for table `tblEmpExam`
--
ALTER TABLE `tblEmpExam`
  MODIFY `ExamIndex` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=732;
--
-- AUTO_INCREMENT for table `tblEmpIncome`
--
ALTER TABLE `tblEmpIncome`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93026;
--
-- AUTO_INCREMENT for table `tblEmpIncomeAdjust`
--
ALTER TABLE `tblEmpIncomeAdjust`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblEmpLeave`
--
ALTER TABLE `tblEmpLeave`
  MODIFY `leaveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3772;
--
-- AUTO_INCREMENT for table `tblEmpLeaveBalance`
--
ALTER TABLE `tblEmpLeaveBalance`
  MODIFY `lb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8110;
--
-- AUTO_INCREMENT for table `tblEmpLeaveBalance_040716`
--
ALTER TABLE `tblEmpLeaveBalance_040716`
  MODIFY `lb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2338;
--
-- AUTO_INCREMENT for table `tblEmpLeaveBalance_11242016`
--
ALTER TABLE `tblEmpLeaveBalance_11242016`
  MODIFY `lb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3349;
--
-- AUTO_INCREMENT for table `tblEmpLeaveBalance_Aug16`
--
ALTER TABLE `tblEmpLeaveBalance_Aug16`
  MODIFY `lb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3345;
--
-- AUTO_INCREMENT for table `tblEmpLeaveBalance_Jan2017`
--
ALTER TABLE `tblEmpLeaveBalance_Jan2017`
  MODIFY `lb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3623;
--
-- AUTO_INCREMENT for table `tblEmpLeaveBalance_w/Dec2016`
--
ALTER TABLE `tblEmpLeaveBalance_w/Dec2016`
  MODIFY `lb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3857;
--
-- AUTO_INCREMENT for table `tblEmpLeaveBalance_w/o_Nov2016`
--
ALTER TABLE `tblEmpLeaveBalance_w/o_Nov2016`
  MODIFY `lb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3482;
--
-- AUTO_INCREMENT for table `tblEmpLocalHoliday`
--
ALTER TABLE `tblEmpLocalHoliday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `tblEmpLongevity`
--
ALTER TABLE `tblEmpLongevity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;
--
-- AUTO_INCREMENT for table `tblEmpMeeting`
--
ALTER TABLE `tblEmpMeeting`
  MODIFY `meetingID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblEmpMonetization`
--
ALTER TABLE `tblEmpMonetization`
  MODIFY `mon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `tblEmpOB`
--
ALTER TABLE `tblEmpOB`
  MODIFY `obID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11908;
--
-- AUTO_INCREMENT for table `tblEmpOtherSched`
--
ALTER TABLE `tblEmpOtherSched`
  MODIFY `rec_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblEmpOvertime`
--
ALTER TABLE `tblEmpOvertime`
  MODIFY `otID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblEmpPersonal`
--
ALTER TABLE `tblEmpPersonal`
  MODIFY `empID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=636;
--
-- AUTO_INCREMENT for table `tblEmpPersonalx`
--
ALTER TABLE `tblEmpPersonalx`
  MODIFY `empID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=615;
--
-- AUTO_INCREMENT for table `tblEmpReference`
--
ALTER TABLE `tblEmpReference`
  MODIFY `ReferenceIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1275;
--
-- AUTO_INCREMENT for table `tblEmpRequest`
--
ALTER TABLE `tblEmpRequest`
  MODIFY `requestID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5346;
--
-- AUTO_INCREMENT for table `tblEmpScholarship`
--
ALTER TABLE `tblEmpScholarship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1161;
--
-- AUTO_INCREMENT for table `tblEmpSchool`
--
ALTER TABLE `tblEmpSchool`
  MODIFY `SchoolIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2263;
--
-- AUTO_INCREMENT for table `tblEmpTraining`
--
ALTER TABLE `tblEmpTraining`
  MODIFY `TrainingIndex` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6462;
--
-- AUTO_INCREMENT for table `tblEmpTravelOrder`
--
ALTER TABLE `tblEmpTravelOrder`
  MODIFY `toID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=642;
--
-- AUTO_INCREMENT for table `tblEmpTripTicket`
--
ALTER TABLE `tblEmpTripTicket`
  MODIFY `ttID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblEmpVoluntaryWork`
--
ALTER TABLE `tblEmpVoluntaryWork`
  MODIFY `VoluntaryIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;
--
-- AUTO_INCREMENT for table `tblExamType`
--
ALTER TABLE `tblExamType`
  MODIFY `examId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `tblFlagCeremony`
--
ALTER TABLE `tblFlagCeremony`
  MODIFY `flag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tblHolidayYear`
--
ALTER TABLE `tblHolidayYear`
  MODIFY `holidayId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;
--
-- AUTO_INCREMENT for table `tblID`
--
ALTER TABLE `tblID`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12902005;
--
-- AUTO_INCREMENT for table `tblNonPermComputation`
--
ALTER TABLE `tblNonPermComputation`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130059;
--
-- AUTO_INCREMENT for table `tblNonPermComputationInstance`
--
ALTER TABLE `tblNonPermComputationInstance`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10051;
--
-- AUTO_INCREMENT for table `tblOTComputation`
--
ALTER TABLE `tblOTComputation`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1074;
--
-- AUTO_INCREMENT for table `tblOTComputationInstance`
--
ALTER TABLE `tblOTComputationInstance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tblPayrollGroup`
--
ALTER TABLE `tblPayrollGroup`
  MODIFY `payrollGroupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `tblPayrollOfficer`
--
ALTER TABLE `tblPayrollOfficer`
  MODIFY `poID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblPlantilla`
--
ALTER TABLE `tblPlantilla`
  MODIFY `plantillaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;
--
-- AUTO_INCREMENT for table `tblPlantillaGroup`
--
ALTER TABLE `tblPlantillaGroup`
  MODIFY `plantillaGroupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tblPosition`
--
ALTER TABLE `tblPosition`
  MODIFY `positionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=583;
--
-- AUTO_INCREMENT for table `tblProcess`
--
ALTER TABLE `tblProcess`
  MODIFY `processID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5262;
--
-- AUTO_INCREMENT for table `tblProject`
--
ALTER TABLE `tblProject`
  MODIFY `projectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tblRequestFlow`
--
ALTER TABLE `tblRequestFlow`
  MODIFY `reqID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `tblRequestSignatoryAction`
--
ALTER TABLE `tblRequestSignatoryAction`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblSalarySchedVersion`
--
ALTER TABLE `tblSalarySchedVersion`
  MODIFY `version` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblScholarship`
--
ALTER TABLE `tblScholarship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tblSecurityCode`
--
ALTER TABLE `tblSecurityCode`
  MODIFY `securityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;
--
-- AUTO_INCREMENT for table `tblSecurityQuestion`
--
ALTER TABLE `tblSecurityQuestion`
  MODIFY `securityCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tblServiceCode`
--
ALTER TABLE `tblServiceCode`
  MODIFY `serviceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tblServiceRecord`
--
ALTER TABLE `tblServiceRecord`
  MODIFY `serviceRecID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8544;
--
-- AUTO_INCREMENT for table `tblSignatory`
--
ALTER TABLE `tblSignatory`
  MODIFY `signatoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT for table `tblSignatory_edited`
--
ALTER TABLE `tblSignatory_edited`
  MODIFY `signatoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT for table `xphpjobscheduler`
--
ALTER TABLE `xphpjobscheduler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `xtblEmpDeductContri`
--
ALTER TABLE `xtblEmpDeductContri`
  MODIFY `contriCode` int(100) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

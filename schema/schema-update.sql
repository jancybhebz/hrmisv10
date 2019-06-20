set global sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
set session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';

# RUN THIS TO SQL WINDOW

## DROP INDEX THEN ADD AUTO INCREMENT PRIMARY KEY
DROP INDEX `PRIMARY` ON tblAppointment;
ALTER TABLE  `tblAppointment` ADD  `appointmentId` INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;

ALTER TABLE  `tblEmpAccount` CHANGE  `userPassword`  `userPassword` VARCHAR( 255 ) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT  '';

# ALTER TABLE `tblAttendanceScheme` ADD `wrkhrLeave` INT(2) NOT NULL DEFAULT '0' AFTER `gpLate`, ADD `hlfLateUnd` CHAR(1) NOT NULL DEFAULT 'N' AFTER `wrkhrLeave`;

ALTER TABLE `tblPosition` ADD `positionId` INT NOT NULL AUTO_INCREMENT FIRST, ADD UNIQUE `positionId` (`positionId`);

ALTER TABLE `tblEducationalLevel` ADD `levelId` INT NOT NULL AUTO_INCREMENT FIRST, ADD UNIQUE `levelId` (`levelId`);

ALTER TABLE `tblExamType` ADD `examId` INT NOT NULL AUTO_INCREMENT FIRST, ADD UNIQUE `ExamId` (`examId`);

ALTER TABLE `tblPayrollGroup` ADD `payrollGroupId` INT NOT NULL AUTO_INCREMENT FIRST, ADD UNIQUE `payrollGroupId` (`payrollGroupId`);

ALTER TABLE `tblPhilhealthRange` ADD `philHealthId` INT NOT NULL AUTO_INCREMENT FIRST, ADD UNIQUE `payrollGroupId` (`philHealthId`);

ALTER TABLE `tblPlantillaGroup` ADD `plantillaGroupId` INT NOT NULL AUTO_INCREMENT FIRST, ADD UNIQUE `plantillaGroupId` (`plantillaGroupId`);

ALTER TABLE `tblProject` ADD `projectId` INT NOT NULL AUTO_INCREMENT FIRST, ADD UNIQUE `projectId` (`projectId`);

ALTER TABLE `tblServiceCode` ADD `serviceId` INT NOT NULL AUTO_INCREMENT FIRST, ADD UNIQUE `serviceId` (`serviceId`);

ALTER TABLE `tblSignatory` ADD `sig_module` TINYINT NULL AFTER `signatoryOrder`;
ALTER TABLE  `tblSignatory` CHANGE  `sig_module`  `sig_module` TINYINT( 4 ) NULL DEFAULT NULL COMMENT  '1=hr;0=payroll';

ALTER TABLE  `tblEmpDuties` ADD  `empduties_index` INT NOT NULL AUTO_INCREMENT FIRST , ADD PRIMARY KEY (  `empduties_index` ) ;

ALTER TABLE  `tblDuties` ADD  `duties_index` INT NOT NULL AUTO_INCREMENT FIRST , ADD PRIMARY KEY (  `duties_index` ) ;

ALTER TABLE  `tblPlantillaDuties` ADD  `plantilla_duties_index` INT NOT NULL AUTO_INCREMENT FIRST , ADD PRIMARY KEY (  `plantilla_duties_index` ) ;

# Create table override
CREATE TABLE `tblOverride` (
  `override_id` int(11) NOT NULL,
  `override_type` int(11) NOT NULL COMMENT '1=ob;2=exdtr;3=gendtr',
  `office_type` varchar(20) NOT NULL,
  `office` varchar(20) NOT NULL,
  `appt_status` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `lastupdated_date` datetime DEFAULT NULL,
  `lastupdate_dby` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `tblOverride`
  ADD PRIMARY KEY (`override_id`);
ALTER TABLE `tblOverride`
  MODIFY `override_id` int(11) NOT NULL AUTO_INCREMENT;

## OB Override
# FIX TABLE
ALTER TABLE `tblEmpOB` CHANGE `dateFiled` `dateFiled` VARCHAR(11) NULL DEFAULT NULL, CHANGE `obDateFrom` `obDateFrom` VARCHAR(11) NULL DEFAULT NULL, CHANGE `obDateTo` `obDateTo` VARCHAR(11) NULL DEFAULT NULL, CHANGE `obTimeFrom` `obTimeFrom` VARCHAR(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL, CHANGE `obTimeTo` `obTimeTo` VARCHAR(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;

UPDATE `tblEmpOB` SET `dateFiled` = NULL where dateFiled = '0000-00-00';
UPDATE `tblEmpOB` SET `obDateFrom` = NULL where `obDateFrom` = '0000-00-00';
UPDATE `tblEmpOB` SET `obDateTo` = NULL where `obDateTo` = '0000-00-00';
UPDATE `tblEmpOB` SET `obTimeFrom` = NULL where `obTimeFrom` = '00:00:00 AM' OR `obTimeFrom` = '00:00:00 PM';
UPDATE `tblEmpOB` SET `obTimeTo` = NULL where `obTimeTo` = '00:00:00 AM' OR `obTimeTo` = '00:00:00 PM';

ALTER TABLE `tblEmpOB` CHANGE `dateFiled` `dateFiled` DATE NULL DEFAULT NULL, CHANGE `obDateFrom` `obDateFrom` DATE NULL DEFAULT NULL, CHANGE `obDateTo` `obDateTo` DATE NULL DEFAULT NULL, CHANGE `obTimeFrom` `obTimeFrom` VARCHAR(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL, CHANGE `obTimeTo` `obTimeTo` VARCHAR(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;
#

ALTER TABLE  `tblEmpOB` ADD  `is_override` INT NOT NULL DEFAULT  '0';
ALTER TABLE  `tblEmpOB` ADD  `override_id` INT NULL ;

# FIX tblEmposition Table
ALTER TABLE  `tblEmpPosition` CHANGE  `contractEndDate`  `contractEndDate` VARCHAR( 11 ) NULL DEFAULT NULL ,
CHANGE  `effectiveDate`  `effectiveDate` VARCHAR( 11 ) NULL DEFAULT NULL ,
CHANGE  `positionDate`  `positionDate` VARCHAR( 11 ) NULL DEFAULT NULL ,
CHANGE  `longevityDate`  `longevityDate` VARCHAR( 11 ) NULL DEFAULT NULL ,
CHANGE  `firstDayAgency`  `firstDayAgency` VARCHAR( 11 ) NULL DEFAULT NULL ,
CHANGE  `firstDayGov`  `firstDayGov` VARCHAR( 11 ) NULL DEFAULT NULL ,
CHANGE  `dateIncremented`  `dateIncremented` VARCHAR( 11 ) NULL DEFAULT NULL ,
CHANGE  `tmpDateIncremented`  `tmpDateIncremented` VARCHAR( 11 ) NULL DEFAULT NULL ,
CHANGE  `tmpPositionDate`  `tmpPositionDate` VARCHAR( 11 ) NULL DEFAULT NULL ;

UPDATE `tblEmpPosition` set contractEndDate = NULL where contractEndDate = '0000-00-00';
UPDATE `tblEmpPosition` set effectiveDate = NULL where effectiveDate = '0000-00-00';
UPDATE `tblEmpPosition` set positionDate = NULL where positionDate = '0000-00-00';
UPDATE `tblEmpPosition` set longevityDate = NULL where longevityDate = '0000-00-00';
UPDATE `tblEmpPosition` set firstDayAgency = NULL where firstDayAgency = '0000-00-00';
UPDATE `tblEmpPosition` set firstDayGov = NULL where firstDayGov = '0000-00-00';
UPDATE `tblEmpPosition` set dateIncremented = NULL where dateIncremented = '0000-00-00';
UPDATE `tblEmpPosition` set tmpDateIncremented = NULL where tmpDateIncremented = '0000-00-00';
UPDATE `tblEmpPosition` set tmpPositionDate = NULL where tmpPositionDate = '0000-00-00';

ALTER TABLE  `tblEmpPosition` CHANGE  `contractEndDate`  `contractEndDate` DATE NULL DEFAULT NULL ,
CHANGE  `effectiveDate`  `effectiveDate` DATE NULL DEFAULT NULL ,
CHANGE  `positionDate`  `positionDate` DATE NULL DEFAULT NULL ,
CHANGE  `longevityDate`  `longevityDate` DATE NULL DEFAULT NULL ,
CHANGE  `firstDayAgency`  `firstDayAgency` DATE NULL DEFAULT NULL ,
CHANGE  `firstDayGov`  `firstDayGov` DATE NULL DEFAULT NULL ,
CHANGE  `dateIncremented`  `dateIncremented` DATE NULL DEFAULT NULL ,
CHANGE  `tmpDateIncremented`  `tmpDateIncremented` DATE NULL DEFAULT NULL ,
CHANGE  `tmpPositionDate`  `tmpPositionDate` DATE NULL DEFAULT NULL ;

## EXCLUDE DTR
ALTER TABLE  `tblEmpPosition` ADD  `is_override` INT NOT NULL DEFAULT  '0', ADD  `override_id` INT NULL ;

# LIBRARIES / COURSE
ALTER TABLE  `tblCourse` ADD  `courseId` INT NULL FIRST , ADD UNIQUE ( `courseId` );

## SET INDEX in payroll processs
ALTER TABLE  `tblPayrollProcess` ADD INDEX (  `appointmentCode` );
ALTER TABLE  `tblPayrollProcess` ADD  `appointment_id` INT NOT NULL AUTO_INCREMENT FIRST ,
ADD PRIMARY KEY (  `appointment_id` ) ;
	
ALTER TABLE  `tblEmpBenefits` ADD  `incomeYear` INT NULL AFTER  `incomeMonth`;

ALTER TABLE  `tblIncome` ADD INDEX (  `incomeCode` ) ;

# Employee Shares
ALTER TABLE  `tblDeduction` ADD  `agency_field` VARCHAR( 50 ) NULL AFTER  `deductionAccountCode`;
# Employee Shares new data
UPDATE  `tblDeduction` SET  `agency_field` =  'gsisEmprShare' WHERE  `tblDeduction`.`deductionCode` =  'LIFE';
UPDATE  `tblDeduction` SET  `agency_field` =  'philhealthEmprShare' WHERE  `tblDeduction`.`deductionCode` =  'PAGIBIG';
UPDATE  `tblDeduction` SET  `agency_field` =  'pagibigEmprShare' WHERE  `tblDeduction`.`deductionCode` =  'PHILHEALTH';
ALTER TABLE  `tblDeduction` ADD  `is_mandatory` INT NOT NULL DEFAULT  '0' AFTER  `agency_field`;
UPDATE  `tblDeduction` SET  `is_mandatory` =  '1' WHERE  `tblDeduction`.`deductionCode` =  'LIFE';
UPDATE  `tblDeduction` SET  `is_mandatory` =  '1' WHERE  `tblDeduction`.`deductionCode` =  'PAGIBIG';
UPDATE  `tblDeduction` SET  `is_mandatory` =  '1' WHERE  `tblDeduction`.`deductionCode` =  'PHILHEALTH';

## DROP INDEX THEN ADD AUTO INCREMENT PRIMARY KEY
DROP INDEX `PRIMARY` ON tblDeduction;
ALTER TABLE  `tblDeduction` ADD  `deduction_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;

## LEAVE
DROP INDEX `PRIMARY` ON tblLeave;
ALTER TABLE  `tblLeave` ADD  `leave_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;
ALTER TABLE `tblLeave` CHANGE `leaveCode` `leaveCode` CHAR(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '';
ALTER TABLE  `tblLeave` CHANGE  `numOfDays`  `numOfDays` FLOAT( 3 ) NOT NULL DEFAULT  '0';

INSERT INTO `tblLeave` (`leaveCode`, `leaveType`, `numOfDays`, `system`) VALUES ('HSTL', 'Half Study Leave', '0.5', '0');
INSERT INTO `tblLeave` (`leaveCode`, `leaveType`, `numOfDays`, `system`) VALUES ('HFL', 'Half Forced Leave', '0.5', '0');
INSERT INTO `tblLeave` (`leaveCode`, `leaveType`, `numOfDays`, `system`) VALUES ('HSL', 'Half Sick Leave', '0.5', '0');
INSERT INTO `tblLeave` (`leaveCode`, `leaveType`, `numOfDays`, `system`) VALUES ('HVL', 'Half Vacation Leave', '0.5', '0');
INSERT INTO `tblLeave` (`leaveCode`, `leaveType`, `numOfDays`, `system`) VALUES ('HPL', 'Half Special Leave', '0.5', '0');
INSERT INTO `tblLeave` (`leaveCode`, `leaveType`, `numOfDays`, `system`) VALUES ('HMTL', 'Half Maternity Leave', '0.5', '0');
INSERT INTO `tblLeave` (`leaveCode`, `leaveType`, `numOfDays`, `system`) VALUES ('HPTL', 'Half Paternity Leave', '0.5', '0');

# INITIAL DATA
UPDATE  `tblEmpAccount` SET  `userPassword` =  '$2y$10$n.QQrx3mdXY4EJ7VpYwUyeJ7Br7QAxo4E672pwPq7.5yrd5U4O1hm';
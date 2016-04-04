-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.27 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table moe.degree
CREATE TABLE IF NOT EXISTS `degree` (
  `degreeID` int(11) NOT NULL AUTO_INCREMENT,
  `degreeName` varchar(200) NOT NULL,
  `university` varchar(200) NOT NULL,
  PRIMARY KEY (`degreeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table moe.degree: ~0 rows (approximately)
/*!40000 ALTER TABLE `degree` DISABLE KEYS */;
/*!40000 ALTER TABLE `degree` ENABLE KEYS */;


-- Dumping structure for table moe.designation
CREATE TABLE IF NOT EXISTS `designation` (
  `designationTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`designationTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table moe.designation: ~5 rows (approximately)
/*!40000 ALTER TABLE `designation` DISABLE KEYS */;
INSERT INTO `designation` (`designationTypeID`, `designation`) VALUES
	(1, 'ministryOfficer'),
	(2, 'provincial Officer'),
	(3, 'zonal Officer'),
	(4, 'principal'),
	(5, 'teacher');
/*!40000 ALTER TABLE `designation` ENABLE KEYS */;


-- Dumping structure for table moe.designation_history
CREATE TABLE IF NOT EXISTS `designation_history` (
  `designationHistoryID` int(11) NOT NULL AUTO_INCREMENT,
  `affectedUserID` varchar(12) NOT NULL,
  `designationTypeID` int(11) NOT NULL,
  `editedBynic` varchar(12) NOT NULL,
  `affectedDate` date NOT NULL,
  PRIMARY KEY (`designationHistoryID`),
  KEY `designationHistory_employeenic_idx` (`affectedUserID`),
  KEY `DesignationHistory_designationTypeID_idx` (`designationTypeID`),
  KEY `designationHistory_editedby_idx` (`editedBynic`),
  CONSTRAINT `DesignationHistory_designationTypeID` FOREIGN KEY (`designationTypeID`) REFERENCES `designation` (`designationTypeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `designationHistory_editedby` FOREIGN KEY (`editedBynic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `designationHistory_employeenic` FOREIGN KEY (`affectedUserID`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table moe.designation_history: ~0 rows (approximately)
/*!40000 ALTER TABLE `designation_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `designation_history` ENABLE KEYS */;


-- Dumping structure for table moe.edit_log
CREATE TABLE IF NOT EXISTS `edit_log` (
  `editLogID` varchar(45) NOT NULL,
  `affectedUsernic` varchar(12) NOT NULL,
  `editedBynic` varchar(12) NOT NULL,
  `description` varchar(300) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`editLogID`),
  KEY `editLog_affectednic_idx` (`affectedUsernic`),
  KEY `editLog_editedbynic_idx` (`editedBynic`),
  CONSTRAINT `editLog_affectednic` FOREIGN KEY (`affectedUsernic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `editLog_editedbynic` FOREIGN KEY (`editedBynic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table moe.edit_log: ~0 rows (approximately)
/*!40000 ALTER TABLE `edit_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `edit_log` ENABLE KEYS */;


-- Dumping structure for table moe.employee
CREATE TABLE IF NOT EXISTS `employee` (
  `nic` varchar(12) NOT NULL,
  `instituteID` int(11) NOT NULL,
  `roleType` int(11) NOT NULL,
  `designationTypeID` int(11) NOT NULL,
  `nameWithInitials` varchar(100) DEFAULT NULL,
  `fullName` varchar(200) DEFAULT NULL,
  `employeementID` varchar(45) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `currentAddress` varchar(200) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `marrigeState` varchar(10) DEFAULT NULL,
  `mobileNum` int(10) DEFAULT NULL,
  PRIMARY KEY (`nic`),
  KEY `employee_instituteID_idx` (`instituteID`),
  KEY `employee_roleTypeID_idx` (`roleType`),
  KEY `employee_designationTypeID_idx` (`designationTypeID`),
  CONSTRAINT `employee_designationTypeID` FOREIGN KEY (`designationTypeID`) REFERENCES `designation` (`designationTypeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employee_instituteID` FOREIGN KEY (`instituteID`) REFERENCES `institute` (`instituteID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employee_roleTypeID` FOREIGN KEY (`roleType`) REFERENCES `role_type` (`roleTypeID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table moe.employee: ~1 rows (approximately)
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` (`nic`, `instituteID`, `roleType`, `designationTypeID`, `nameWithInitials`, `fullName`, `employeementID`, `email`, `currentAddress`, `gender`, `marrigeState`, `mobileNum`) VALUES
	('894564565v', 9, 4, 5, 'Ayesh', '', '123678', 'ayesh@gmail.com', 'Gonawala', '2', '3', 774254565),
	('921003072v', 1, 1, 1, 'ymkk yaparathne', 'kalinga yapa', '13001426', 'kkyapa@gmail.com', 'kandy', 'male', NULL, 719335699),
	('921474558v', 2, 2, 2, 'Sanjeewa', '', '123456', 'san@gmail.com', 'Digana', '2', '3', 716545624),
	('924565658v', 7, 2, 3, 'Chamal', '', '159456', 'chamal@gmail.com', 'Galle', '2', '3', 712585456),
	('924585565v', 1, 2, 1, 'Dineth', '', '1545458', 'dineth@gmail.com', 'Matara', '2', '3', 775456585),
	('924585652v', 1, 2, 1, 'Pasindu', '', '132254', 'pasi@gmail.com', 'Galle', '2', '3', 715456585),
	('95456545v', 9, 2, 5, 'dasda', '', '', 'w@gmail.com', 'Galle', '2', '2', 333),
	('954565654v', 1, 4, 1, 'A.M.Amal', '', '15456', 'amal@gmail.com', 'kandy', '2', '2', 716545856),
	('956545857v', 9, 5, 4, 'nilusha', '', '154585', 'n@gmail.com', 'Gonawala', '2', '3', 715839496),
	('981232526v', 9, 3, 5, 'asen', '', '159564', 'asen@gmail.com', 'kandy', '2', '3', 714855698);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;


-- Dumping structure for table moe.employee_degree
CREATE TABLE IF NOT EXISTS `employee_degree` (
  `nic` varchar(12) NOT NULL,
  `degreeID` int(11) NOT NULL,
  PRIMARY KEY (`nic`,`degreeID`),
  KEY `emolyeeDegree_degreeID_idx` (`degreeID`),
  CONSTRAINT `emolyeeDegree_degreeID` FOREIGN KEY (`degreeID`) REFERENCES `degree` (`degreeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `emolyeeDegree_employeenic` FOREIGN KEY (`nic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table moe.employee_degree: ~0 rows (approximately)
/*!40000 ALTER TABLE `employee_degree` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_degree` ENABLE KEYS */;


-- Dumping structure for table moe.institute
CREATE TABLE IF NOT EXISTS `institute` (
  `instituteID` int(11) NOT NULL AUTO_INCREMENT,
  `instituteTypeID` int(11) NOT NULL,
  PRIMARY KEY (`instituteID`),
  KEY `institute_instituteTypeID_idx` (`instituteTypeID`),
  CONSTRAINT `institute_instituteTypeID` FOREIGN KEY (`instituteTypeID`) REFERENCES `intitute_type` (`instituteTypeID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table moe.institute: ~9 rows (approximately)
/*!40000 ALTER TABLE `institute` DISABLE KEYS */;
INSERT INTO `institute` (`instituteID`, `instituteTypeID`) VALUES
	(1, 1),
	(2, 2),
	(3, 2),
	(4, 2),
	(5, 2),
	(6, 2),
	(7, 3),
	(8, 3),
	(9, 4);
/*!40000 ALTER TABLE `institute` ENABLE KEYS */;


-- Dumping structure for table moe.intitute_type
CREATE TABLE IF NOT EXISTS `intitute_type` (
  `instituteTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `instituteType` varchar(100) NOT NULL,
  PRIMARY KEY (`instituteTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table moe.intitute_type: ~4 rows (approximately)
/*!40000 ALTER TABLE `intitute_type` DISABLE KEYS */;
INSERT INTO `intitute_type` (`instituteTypeID`, `instituteType`) VALUES
	(1, 'ministry'),
	(2, 'provinceOffice'),
	(3, 'zonalOffice'),
	(4, 'school');
/*!40000 ALTER TABLE `intitute_type` ENABLE KEYS */;


-- Dumping structure for table moe.ministry_officer
CREATE TABLE IF NOT EXISTS `ministry_officer` (
  `ministryOfficerID` int(11) NOT NULL AUTO_INCREMENT,
  `nic` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`ministryOfficerID`),
  KEY `ministryOfficer_employeenic_idx` (`nic`),
  CONSTRAINT `ministryOfficer_employeenic` FOREIGN KEY (`nic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table moe.ministry_officer: ~0 rows (approximately)
/*!40000 ALTER TABLE `ministry_officer` DISABLE KEYS */;
INSERT INTO `ministry_officer` (`ministryOfficerID`, `nic`) VALUES
	(5, '924585565v'),
	(4, '924585652v'),
	(3, '954565654v');
/*!40000 ALTER TABLE `ministry_officer` ENABLE KEYS */;


-- Dumping structure for table moe.principal
CREATE TABLE IF NOT EXISTS `principal` (
  `principalID` int(11) NOT NULL AUTO_INCREMENT,
  `nic` varchar(12) NOT NULL,
  `zonalOfficeID` int(11) NOT NULL,
  `provinceOfficerID` int(11) NOT NULL,
  PRIMARY KEY (`principalID`),
  KEY `principal_employeenic_idx` (`nic`),
  KEY `pricipal_zonalOfficeID_idx` (`zonalOfficeID`),
  KEY `principal_ProvinceOfficeID_idx` (`provinceOfficerID`),
  CONSTRAINT `principal_employeenic` FOREIGN KEY (`nic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `principal_ProvinceOfficeID` FOREIGN KEY (`provinceOfficerID`) REFERENCES `province_office` (`provinceID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `principal_zonalOfficeID` FOREIGN KEY (`zonalOfficeID`) REFERENCES `zonal_office` (`zonalID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table moe.principal: ~0 rows (approximately)
/*!40000 ALTER TABLE `principal` DISABLE KEYS */;
INSERT INTO `principal` (`principalID`, `nic`, `zonalOfficeID`, `provinceOfficerID`) VALUES
	(1, '956545857v', 1, 1);
/*!40000 ALTER TABLE `principal` ENABLE KEYS */;


-- Dumping structure for table moe.province_office
CREATE TABLE IF NOT EXISTS `province_office` (
  `provinceID` int(11) NOT NULL AUTO_INCREMENT,
  `instituteID` int(11) NOT NULL,
  `province` varchar(45) NOT NULL,
  `numOfEmployees` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`provinceID`),
  KEY `province_InstituteID_idx` (`instituteID`),
  CONSTRAINT `province_InstituteID` FOREIGN KEY (`instituteID`) REFERENCES `institute` (`instituteID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table moe.province_office: ~5 rows (approximately)
/*!40000 ALTER TABLE `province_office` DISABLE KEYS */;
INSERT INTO `province_office` (`provinceID`, `instituteID`, `province`, `numOfEmployees`, `name`) VALUES
	(1, 2, 'centralProvince', 100, 'centralProvinceEdu'),
	(2, 3, 'westernProvince', 150, 'westernProvinceEdu'),
	(3, 4, 'sothernProvince', 100, 'sothernProvinceEdu'),
	(4, 5, 'NothernProvince', 150, 'NothernProvinceEdu'),
	(5, 6, 'esternProvince', 100, 'esternProvinceEdu');
/*!40000 ALTER TABLE `province_office` ENABLE KEYS */;


-- Dumping structure for table moe.province_officer
CREATE TABLE IF NOT EXISTS `province_officer` (
  `provinceOfficerID` int(11) NOT NULL AUTO_INCREMENT,
  `nic` varchar(12) NOT NULL,
  PRIMARY KEY (`provinceOfficerID`),
  KEY `proviceOfficer_employeenic_idx` (`nic`),
  CONSTRAINT `proviceOfficer_employeenic` FOREIGN KEY (`nic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table moe.province_officer: ~0 rows (approximately)
/*!40000 ALTER TABLE `province_officer` DISABLE KEYS */;
INSERT INTO `province_officer` (`provinceOfficerID`, `nic`) VALUES
	(1, '921474558v');
/*!40000 ALTER TABLE `province_officer` ENABLE KEYS */;


-- Dumping structure for table moe.role_type
CREATE TABLE IF NOT EXISTS `role_type` (
  `roleTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `roleType` varchar(45) NOT NULL,
  PRIMARY KEY (`roleTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table moe.role_type: ~5 rows (approximately)
/*!40000 ALTER TABLE `role_type` DISABLE KEYS */;
INSERT INTO `role_type` (`roleTypeID`, `roleType`) VALUES
	(1, 'sysAdmin'),
	(2, 'role2'),
	(3, 'role3'),
	(4, 'role4'),
	(5, 'role5');
/*!40000 ALTER TABLE `role_type` ENABLE KEYS */;


-- Dumping structure for table moe.school
CREATE TABLE IF NOT EXISTS `school` (
  `schoolID` int(11) NOT NULL AUTO_INCREMENT,
  `schoolName` varchar(150) NOT NULL DEFAULT '0',
  `instituteID` int(11) NOT NULL,
  `provinceOfficeID` int(11) NOT NULL,
  `zonalOfficeID` int(11) NOT NULL,
  `schoolTypeID` int(11) NOT NULL,
  `numOfStudents` int(11) DEFAULT NULL,
  PRIMARY KEY (`schoolID`),
  KEY `schoolInstituteID_idx` (`instituteID`),
  KEY `school_schooltypeID_idx` (`schoolTypeID`),
  KEY `school_zonalID_idx` (`zonalOfficeID`),
  KEY `school_provinceID_idx` (`provinceOfficeID`),
  CONSTRAINT `schoolInstituteID` FOREIGN KEY (`instituteID`) REFERENCES `institute` (`instituteID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `school_provinceID` FOREIGN KEY (`provinceOfficeID`) REFERENCES `province_office` (`provinceID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `school_schooltypeID` FOREIGN KEY (`schoolTypeID`) REFERENCES `school_type` (`schoolTypeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `school_zonalID` FOREIGN KEY (`zonalOfficeID`) REFERENCES `zonal_office` (`zonalID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table moe.school: ~1 rows (approximately)
/*!40000 ALTER TABLE `school` DISABLE KEYS */;
INSERT INTO `school` (`schoolID`, `schoolName`, `instituteID`, `provinceOfficeID`, `zonalOfficeID`, `schoolTypeID`, `numOfStudents`) VALUES
	(1, 'CWW Kannangara maha vidyalaya', 9, 1, 1, 1, 250);
/*!40000 ALTER TABLE `school` ENABLE KEYS */;


-- Dumping structure for table moe.school_type
CREATE TABLE IF NOT EXISTS `school_type` (
  `schoolTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `schoolType` varchar(100) NOT NULL,
  PRIMARY KEY (`schoolTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table moe.school_type: ~1 rows (approximately)
/*!40000 ALTER TABLE `school_type` DISABLE KEYS */;
INSERT INTO `school_type` (`schoolTypeID`, `schoolType`) VALUES
	(1, 'Mix');
/*!40000 ALTER TABLE `school_type` ENABLE KEYS */;


-- Dumping structure for table moe.subject
CREATE TABLE IF NOT EXISTS `subject` (
  `subjectID` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`subjectID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table moe.subject: ~1 rows (approximately)
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` (`subjectID`, `subject`) VALUES
	(1, 'Mathematics');
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;


-- Dumping structure for table moe.subject_combination
CREATE TABLE IF NOT EXISTS `subject_combination` (
  `teacherID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  PRIMARY KEY (`teacherID`,`subjectID`,`grade`),
  KEY `subjectCombination_subjectID_idx` (`subjectID`),
  CONSTRAINT `subjectCombination_subjectID` FOREIGN KEY (`subjectID`) REFERENCES `subject` (`subjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subjectCombination_teacherID` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`teachetID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table moe.subject_combination: ~0 rows (approximately)
/*!40000 ALTER TABLE `subject_combination` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject_combination` ENABLE KEYS */;


-- Dumping structure for table moe.teacher
CREATE TABLE IF NOT EXISTS `teacher` (
  `teachetID` int(11) NOT NULL AUTO_INCREMENT,
  `nic` varchar(12) NOT NULL,
  `zonalOfficeID` int(11) NOT NULL,
  `provinceOfficeID` int(11) NOT NULL,
  `currentState` varchar(45) NOT NULL DEFAULT 'working',
  `appoinmentSubject` int(2) NOT NULL,
  PRIMARY KEY (`teachetID`),
  KEY `teacher_employeenic_idx` (`nic`),
  KEY `teacher_zonalOfficeID_idx` (`zonalOfficeID`),
  KEY `teacher_provinceOfficeID_idx` (`provinceOfficeID`),
  KEY `teacher_appoinmentSubjectID` (`appoinmentSubject`),
  CONSTRAINT `teacher_appoinmentSubjectID` FOREIGN KEY (`appoinmentSubject`) REFERENCES `subject` (`subjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `teacher_employeenic` FOREIGN KEY (`nic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `teacher_provinceOfficeID` FOREIGN KEY (`provinceOfficeID`) REFERENCES `province_office` (`provinceID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `teacher_zonalOfficeID` FOREIGN KEY (`zonalOfficeID`) REFERENCES `zonal_office` (`zonalID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table moe.teacher: ~0 rows (approximately)
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` (`teachetID`, `nic`, `zonalOfficeID`, `provinceOfficeID`, `currentState`, `appoinmentSubject`) VALUES
	(4, '981232526v', 1, 1, 'working', 1);
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;


-- Dumping structure for table moe.user
CREATE TABLE IF NOT EXISTS `user` (
  `nic` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `roleTypeID` int(11) NOT NULL,
  PRIMARY KEY (`nic`),
  KEY `user_roleType_idx` (`roleTypeID`),
  CONSTRAINT `user_nic` FOREIGN KEY (`nic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_roleType` FOREIGN KEY (`roleTypeID`) REFERENCES `role_type` (`roleTypeID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table moe.user: ~1 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`nic`, `password`, `roleTypeID`) VALUES
	('921003072v', 'Myvilage', 1),
	('921474558v', '921474558v', 2),
	('924565658v', '924565658v', 2),
	('924585565v', '924585565v', 2),
	('924585652v', '924585652v', 2),
	('954565654v', '954565654v', 4),
	('956545857v', '956545857v', 5),
	('981232526v', '981232526v', 3);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table moe.working_history
CREATE TABLE IF NOT EXISTS `working_history` (
  `workingHistoryID` int(11) NOT NULL AUTO_INCREMENT,
  `nic` varchar(12) NOT NULL,
  `instituteID` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`workingHistoryID`),
  KEY `workingHistory_employeenic_idx` (`nic`),
  KEY `workingHistory_instituteID_idx` (`instituteID`),
  CONSTRAINT `workingHistory_employeenic` FOREIGN KEY (`nic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `workingHistory_instituteID` FOREIGN KEY (`instituteID`) REFERENCES `institute` (`instituteID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table moe.working_history: ~0 rows (approximately)
/*!40000 ALTER TABLE `working_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `working_history` ENABLE KEYS */;


-- Dumping structure for table moe.zonal_office
CREATE TABLE IF NOT EXISTS `zonal_office` (
  `zonalID` int(11) NOT NULL AUTO_INCREMENT,
  `zonalName` varchar(100) NOT NULL,
  `instituteID` int(11) NOT NULL,
  `provinceOfficeID` int(11) NOT NULL,
  PRIMARY KEY (`zonalID`),
  KEY `zonal_instituteID_idx` (`instituteID`),
  KEY `zonal_provinceID_idx` (`provinceOfficeID`),
  CONSTRAINT `zonal_instituteID` FOREIGN KEY (`instituteID`) REFERENCES `institute` (`instituteID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `zonal_provinceID` FOREIGN KEY (`provinceOfficeID`) REFERENCES `province_office` (`provinceID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table moe.zonal_office: ~2 rows (approximately)
/*!40000 ALTER TABLE `zonal_office` DISABLE KEYS */;
INSERT INTO `zonal_office` (`zonalID`, `zonalName`, `instituteID`, `provinceOfficeID`) VALUES
	(1, 'waththegama', 7, 1),
	(2, 'pathadumbara', 8, 1);
/*!40000 ALTER TABLE `zonal_office` ENABLE KEYS */;


-- Dumping structure for table moe.zonal_officer
CREATE TABLE IF NOT EXISTS `zonal_officer` (
  `zonalOfficerID` int(11) NOT NULL AUTO_INCREMENT,
  `nic` varchar(12) NOT NULL,
  `provinceOfficeID` int(11) NOT NULL,
  PRIMARY KEY (`zonalOfficerID`),
  KEY `zonalOfficer_employeeID_idx` (`nic`),
  KEY `zonalOfficer_provinceOfficeID_idx` (`provinceOfficeID`),
  CONSTRAINT `zonalOfficer_employeeID` FOREIGN KEY (`nic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `zonalOfficer_provinceOfficeID` FOREIGN KEY (`provinceOfficeID`) REFERENCES `province_office` (`provinceID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table moe.zonal_officer: ~0 rows (approximately)
/*!40000 ALTER TABLE `zonal_officer` DISABLE KEYS */;
INSERT INTO `zonal_officer` (`zonalOfficerID`, `nic`, `provinceOfficeID`) VALUES
	(1, '924565658v', 1);
/*!40000 ALTER TABLE `zonal_officer` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

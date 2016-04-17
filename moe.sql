-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2016 at 06:43 ප.ව.
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `moe`
--

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE IF NOT EXISTS `degree` (
  `degreeID` int(11) NOT NULL AUTO_INCREMENT,
  `degreeName` varchar(200) NOT NULL,
  `university` varchar(200) NOT NULL,
  PRIMARY KEY (`degreeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `designationTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`designationTypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designationTypeID`, `designation`) VALUES
(1, 'ministryOfficer'),
(2, 'provincial Officer'),
(3, 'zonal Officer'),
(4, 'principal'),
(5, 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `designation_history`
--

CREATE TABLE IF NOT EXISTS `designation_history` (
  `designationHistoryID` int(11) NOT NULL AUTO_INCREMENT,
  `affectedUserID` varchar(12) NOT NULL,
  `designationTypeID` int(11) NOT NULL,
  `editedBynic` varchar(12) NOT NULL,
  `affectedDate` date NOT NULL,
  PRIMARY KEY (`designationHistoryID`),
  KEY `designationHistory_employeenic_idx` (`affectedUserID`),
  KEY `DesignationHistory_designationTypeID_idx` (`designationTypeID`),
  KEY `designationHistory_editedby_idx` (`editedBynic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `edit_log`
--

CREATE TABLE IF NOT EXISTS `edit_log` (
  `editLogID` varchar(45) NOT NULL,
  `affectedUsernic` varchar(12) NOT NULL,
  `editedBynic` varchar(12) NOT NULL,
  `description` varchar(300) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`editLogID`),
  KEY `editLog_affectednic_idx` (`affectedUsernic`),
  KEY `editLog_editedbynic_idx` (`editedBynic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

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
  KEY `employee_designationTypeID_idx` (`designationTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`nic`, `instituteID`, `roleType`, `designationTypeID`, `nameWithInitials`, `fullName`, `employeementID`, `email`, `currentAddress`, `gender`, `marrigeState`, `mobileNum`) VALUES
('8011111111v', 1, 2, 1, 'duminda', 'Yapa', '123234', 'dumi@gmail.com', 'kandy', '2', '3', 712854724),
('812222222v', 2, 3, 2, 'sanjeewa', 'yapa', '147586', 'sanjee@gmail.com', 'kandy', '2', '2', 716545624),
('8211111111v', 7, 4, 3, 'kkyapa', 'Yaparathna', '12456', 'kk@gmail.com', 'kandy', '2', '2', 719335699),
('834444444v', 9, 5, 4, 'Poornima', 'Karunarathne', '187656', 'pooh@gmail.com', 'Panadura', '3', '2', 715685458),
('849999999v', 9, 3, 5, 'ymnrYaparathne', 'RoshanYaparathne', '177626', 'nilu@gmail.com', 'kandy', '2', '2', 715839496),
('8812545854v', 9, 5, 5, 'Kaaaali', 'Yaparathhne', '9545658', 'kaali@gmail.com', 'kandy', '2', '2', 714585458),
('92000000v', 8, 3, 3, 'Seetha', 'Kumari', '123569', 'seetha@gmail.com', 'kandy', '2', '2', 714585658),
('921003072v', 1, 1, 1, 'ymkk yaparathne', 'kalinga yapa', '13001426', 'kkyapa@gmail.com', 'kandy', '2', '3', 719335699),
('921474558v', 2, 2, 2, 'Sanjeewa', '', '123456', 'san@gmail.com', 'Digana', '2', '3', 716545624),
('921595654v', 3, 5, 2, 'somba', 'Deeya', '123432', 'somba@gmail.com', 'Galle', '2', '2', 718767654),
('945855456v', 9, 3, 4, 'kbc', 'Herath', '123485', 'kb@gmail.com', 'Kandy', '2', '2', 2345),
('951232545v', 9, 2, 5, 'ymnkYaparathne', 'Nilusha Roshan', '14758', 'rosh@gmail.com', 'wepathana', '2', '2', 715839496);

-- --------------------------------------------------------

--
-- Table structure for table `employee_degree`
--

CREATE TABLE IF NOT EXISTS `employee_degree` (
  `nic` varchar(12) NOT NULL,
  `degreeID` int(11) NOT NULL,
  PRIMARY KEY (`nic`,`degreeID`),
  KEY `emolyeeDegree_degreeID_idx` (`degreeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
  `gradeID` int(5) NOT NULL AUTO_INCREMENT,
  `gradeName` varchar(15) NOT NULL,
  PRIMARY KEY (`gradeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`gradeID`, `gradeName`) VALUES
(1, 'Grade 1'),
(2, 'Grade 2'),
(3, 'Grade 3'),
(4, 'Grade 4'),
(5, 'Grade 5'),
(6, 'Grade 6'),
(7, 'Grade 7'),
(8, 'Grade 8'),
(9, 'Grade 9'),
(10, 'Grade 10'),
(11, 'Grade 11');

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

CREATE TABLE IF NOT EXISTS `institute` (
  `instituteID` int(11) NOT NULL AUTO_INCREMENT,
  `instituteTypeID` int(11) NOT NULL,
  PRIMARY KEY (`instituteID`),
  KEY `institute_instituteTypeID_idx` (`instituteTypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `institute`
--

INSERT INTO `institute` (`instituteID`, `instituteTypeID`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 3),
(8, 3),
(9, 4),
(10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `intitute_type`
--

CREATE TABLE IF NOT EXISTS `intitute_type` (
  `instituteTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `instituteType` varchar(100) NOT NULL,
  PRIMARY KEY (`instituteTypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `intitute_type`
--

INSERT INTO `intitute_type` (`instituteTypeID`, `instituteType`) VALUES
(1, 'ministry'),
(2, 'provinceOffice'),
(3, 'zonalOffice'),
(4, 'school');

-- --------------------------------------------------------

--
-- Table structure for table `ministry_officer`
--

CREATE TABLE IF NOT EXISTS `ministry_officer` (
  `ministryOfficerID` int(11) NOT NULL AUTO_INCREMENT,
  `nic` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`ministryOfficerID`),
  KEY `ministryOfficer_employeenic_idx` (`nic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ministry_officer`
--

INSERT INTO `ministry_officer` (`ministryOfficerID`, `nic`) VALUES
(8, '8011111111v');

-- --------------------------------------------------------

--
-- Table structure for table `principal`
--

CREATE TABLE IF NOT EXISTS `principal` (
  `principalID` int(11) NOT NULL AUTO_INCREMENT,
  `nic` varchar(12) NOT NULL,
  `zonalOfficeID` int(11) NOT NULL,
  `provinceOfficerID` int(11) NOT NULL,
  PRIMARY KEY (`principalID`),
  KEY `principal_employeenic_idx` (`nic`),
  KEY `pricipal_zonalOfficeID_idx` (`zonalOfficeID`),
  KEY `principal_ProvinceOfficeID_idx` (`provinceOfficerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `principal`
--

INSERT INTO `principal` (`principalID`, `nic`, `zonalOfficeID`, `provinceOfficerID`) VALUES
(2, '945855456v', 1, 1),
(3, '834444444v', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `province_office`
--

CREATE TABLE IF NOT EXISTS `province_office` (
  `provinceID` int(11) NOT NULL AUTO_INCREMENT,
  `instituteID` int(11) NOT NULL,
  `province` varchar(45) NOT NULL,
  `numOfEmployees` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`provinceID`),
  KEY `province_InstituteID_idx` (`instituteID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `province_office`
--

INSERT INTO `province_office` (`provinceID`, `instituteID`, `province`, `numOfEmployees`, `name`) VALUES
(1, 2, 'centralProvince', 100, 'centralProvinceEdu'),
(2, 3, 'westernProvince', 150, 'westernProvinceEdu'),
(3, 4, 'sothernProvince', 100, 'sothernProvinceEdu'),
(4, 5, 'NothernProvince', 150, 'NothernProvinceEdu'),
(5, 6, 'esternProvince', 100, 'esternProvinceEdu');

-- --------------------------------------------------------

--
-- Table structure for table `province_officer`
--

CREATE TABLE IF NOT EXISTS `province_officer` (
  `provinceOfficerID` int(11) NOT NULL AUTO_INCREMENT,
  `nic` varchar(12) NOT NULL,
  PRIMARY KEY (`provinceOfficerID`),
  KEY `proviceOfficer_employeenic_idx` (`nic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `province_officer`
--

INSERT INTO `province_officer` (`provinceOfficerID`, `nic`) VALUES
(3, '812222222v'),
(1, '921474558v'),
(2, '921595654v');

-- --------------------------------------------------------

--
-- Table structure for table `role_type`
--

CREATE TABLE IF NOT EXISTS `role_type` (
  `roleTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `roleType` varchar(45) NOT NULL,
  PRIMARY KEY (`roleTypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `role_type`
--

INSERT INTO `role_type` (`roleTypeID`, `roleType`) VALUES
(1, 'sysAdmin'),
(2, 'role2'),
(3, 'role3'),
(4, 'role4'),
(5, 'role5');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

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
  KEY `school_provinceID_idx` (`provinceOfficeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`schoolID`, `schoolName`, `instituteID`, `provinceOfficeID`, `zonalOfficeID`, `schoolTypeID`, `numOfStudents`) VALUES
(1, 'CWW Kannangara maha vidyalaya', 9, 1, 1, 1, 250),
(2, 'Gonawala Maha Vidyalaya,waththegama', 10, 1, 1, 1, 200);

-- --------------------------------------------------------

--
-- Table structure for table `school_type`
--

CREATE TABLE IF NOT EXISTS `school_type` (
  `schoolTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `schoolType` varchar(100) NOT NULL,
  PRIMARY KEY (`schoolTypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `school_type`
--

INSERT INTO `school_type` (`schoolTypeID`, `schoolType`) VALUES
(1, 'Mix');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subjectID` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`subjectID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectID`, `subject`) VALUES
(1, 'Mathematics'),
(2, 'Science'),
(3, 'Buddhism');

-- --------------------------------------------------------

--
-- Table structure for table `subject_combination`
--

CREATE TABLE IF NOT EXISTS `subject_combination` (
  `teacherID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  PRIMARY KEY (`teacherID`,`subjectID`,`grade`),
  KEY `subjectCombination_subjectID_idx` (`subjectID`),
  KEY `subjectCombination_GradeID` (`grade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_combination`
--

INSERT INTO `subject_combination` (`teacherID`, `subjectID`, `grade`) VALUES
(5, 1, 1),
(5, 1, 5),
(8, 2, 7),
(8, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

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
  KEY `teacher_appoinmentSubjectID` (`appoinmentSubject`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teachetID`, `nic`, `zonalOfficeID`, `provinceOfficeID`, `currentState`, `appoinmentSubject`) VALUES
(5, '951232545v', 1, 1, 'working', 3),
(8, '849999999v', 1, 1, 'working', 2),
(9, '8812545854v', 1, 1, 'working', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `nic` varchar(12) NOT NULL,
  `password` varchar(50) NOT NULL,
  `roleTypeID` int(11) NOT NULL,
  PRIMARY KEY (`nic`),
  KEY `user_roleType_idx` (`roleTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nic`, `password`, `roleTypeID`) VALUES
('8011111111v', '8011111111v', 2),
('812222222v', '812222222v', 3),
('8211111111v', '8211111111v', 4),
('834444444v', '834444444v', 5),
('849999999v', '849999999v', 3),
('8812545854v', '918264e13515d70f21886ea5c965fb13890de391', 5),
('92000000v', '92000000v', 3),
('921003072V', '1b7b3bb43ee47fb92f715b866a888ba3e8fd40de', 1),
('921474558V', '9350d1db852e518c0e27107fe1349bfa83e18281', 2),
('921595654v', '921595654v', 5),
('945855456v', '945855456v', 3),
('951232545v', '951232545v', 2);

-- --------------------------------------------------------

--
-- Table structure for table `working_history`
--

CREATE TABLE IF NOT EXISTS `working_history` (
  `workingHistoryID` int(11) NOT NULL AUTO_INCREMENT,
  `nic` varchar(12) NOT NULL,
  `instituteID` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`workingHistoryID`),
  KEY `workingHistory_employeenic_idx` (`nic`),
  KEY `workingHistory_instituteID_idx` (`instituteID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `zonal_office`
--

CREATE TABLE IF NOT EXISTS `zonal_office` (
  `zonalID` int(11) NOT NULL AUTO_INCREMENT,
  `zonalName` varchar(100) NOT NULL,
  `instituteID` int(11) NOT NULL,
  `provinceOfficeID` int(11) NOT NULL,
  PRIMARY KEY (`zonalID`),
  KEY `zonal_instituteID_idx` (`instituteID`),
  KEY `zonal_provinceID_idx` (`provinceOfficeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `zonal_office`
--

INSERT INTO `zonal_office` (`zonalID`, `zonalName`, `instituteID`, `provinceOfficeID`) VALUES
(1, 'waththegama', 7, 1),
(2, 'pathadumbara', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `zonal_officer`
--

CREATE TABLE IF NOT EXISTS `zonal_officer` (
  `zonalOfficerID` int(11) NOT NULL AUTO_INCREMENT,
  `nic` varchar(12) NOT NULL,
  `provinceOfficeID` int(11) NOT NULL,
  PRIMARY KEY (`zonalOfficerID`),
  KEY `zonalOfficer_employeeID_idx` (`nic`),
  KEY `zonalOfficer_provinceOfficeID_idx` (`provinceOfficeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `zonal_officer`
--

INSERT INTO `zonal_officer` (`zonalOfficerID`, `nic`, `provinceOfficeID`) VALUES
(3, '92000000v', 1),
(4, '8211111111v', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `designation_history`
--
ALTER TABLE `designation_history`
  ADD CONSTRAINT `DesignationHistory_designationTypeID` FOREIGN KEY (`designationTypeID`) REFERENCES `designation` (`designationTypeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `designationHistory_editedby` FOREIGN KEY (`editedBynic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `designationHistory_employeenic` FOREIGN KEY (`affectedUserID`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `edit_log`
--
ALTER TABLE `edit_log`
  ADD CONSTRAINT `editLog_affectednic` FOREIGN KEY (`affectedUsernic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `editLog_editedbynic` FOREIGN KEY (`editedBynic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_designationTypeID` FOREIGN KEY (`designationTypeID`) REFERENCES `designation` (`designationTypeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_instituteID` FOREIGN KEY (`instituteID`) REFERENCES `institute` (`instituteID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_roleTypeID` FOREIGN KEY (`roleType`) REFERENCES `role_type` (`roleTypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_degree`
--
ALTER TABLE `employee_degree`
  ADD CONSTRAINT `emolyeeDegree_degreeID` FOREIGN KEY (`degreeID`) REFERENCES `degree` (`degreeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emolyeeDegree_employeenic` FOREIGN KEY (`nic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `institute`
--
ALTER TABLE `institute`
  ADD CONSTRAINT `institute_instituteTypeID` FOREIGN KEY (`instituteTypeID`) REFERENCES `intitute_type` (`instituteTypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ministry_officer`
--
ALTER TABLE `ministry_officer`
  ADD CONSTRAINT `ministryOfficer_employeenic` FOREIGN KEY (`nic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `principal`
--
ALTER TABLE `principal`
  ADD CONSTRAINT `principal_employeenic` FOREIGN KEY (`nic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `principal_ProvinceOfficeID` FOREIGN KEY (`provinceOfficerID`) REFERENCES `province_office` (`provinceID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `principal_zonalOfficeID` FOREIGN KEY (`zonalOfficeID`) REFERENCES `zonal_office` (`zonalID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `province_office`
--
ALTER TABLE `province_office`
  ADD CONSTRAINT `province_InstituteID` FOREIGN KEY (`instituteID`) REFERENCES `institute` (`instituteID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `province_officer`
--
ALTER TABLE `province_officer`
  ADD CONSTRAINT `proviceOfficer_employeenic` FOREIGN KEY (`nic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `school`
--
ALTER TABLE `school`
  ADD CONSTRAINT `schoolInstituteID` FOREIGN KEY (`instituteID`) REFERENCES `institute` (`instituteID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `school_provinceID` FOREIGN KEY (`provinceOfficeID`) REFERENCES `province_office` (`provinceID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `school_schooltypeID` FOREIGN KEY (`schoolTypeID`) REFERENCES `school_type` (`schoolTypeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `school_zonalID` FOREIGN KEY (`zonalOfficeID`) REFERENCES `zonal_office` (`zonalID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_combination`
--
ALTER TABLE `subject_combination`
  ADD CONSTRAINT `subjectCombination_GradeID` FOREIGN KEY (`grade`) REFERENCES `grade` (`gradeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjectCombination_subjectID` FOREIGN KEY (`subjectID`) REFERENCES `subject` (`subjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjectCombination_teacherID` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`teachetID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_appoinmentSubjectID` FOREIGN KEY (`appoinmentSubject`) REFERENCES `subject` (`subjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_employeenic` FOREIGN KEY (`nic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_provinceOfficeID` FOREIGN KEY (`provinceOfficeID`) REFERENCES `province_office` (`provinceID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_zonalOfficeID` FOREIGN KEY (`zonalOfficeID`) REFERENCES `zonal_office` (`zonalID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_nic` FOREIGN KEY (`nic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_roleType` FOREIGN KEY (`roleTypeID`) REFERENCES `role_type` (`roleTypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `working_history`
--
ALTER TABLE `working_history`
  ADD CONSTRAINT `workingHistory_employeenic` FOREIGN KEY (`nic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `workingHistory_instituteID` FOREIGN KEY (`instituteID`) REFERENCES `institute` (`instituteID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zonal_office`
--
ALTER TABLE `zonal_office`
  ADD CONSTRAINT `zonal_instituteID` FOREIGN KEY (`instituteID`) REFERENCES `institute` (`instituteID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zonal_provinceID` FOREIGN KEY (`provinceOfficeID`) REFERENCES `province_office` (`provinceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zonal_officer`
--
ALTER TABLE `zonal_officer`
  ADD CONSTRAINT `zonalOfficer_employeeID` FOREIGN KEY (`nic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zonalOfficer_provinceOfficeID` FOREIGN KEY (`provinceOfficeID`) REFERENCES `province_office` (`provinceID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

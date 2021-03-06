-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 07, 2016 at 09:05 පෙ.ව.
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
  `province_OfficeID` int(2) DEFAULT NULL,
  `zonalOffics_ID` int(2) DEFAULT NULL,
  `SchoolID` int(2) DEFAULT NULL,
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

INSERT INTO `employee` (`nic`, `instituteID`, `province_OfficeID`, `zonalOffics_ID`, `SchoolID`, `roleType`, `designationTypeID`, `nameWithInitials`, `fullName`, `employeementID`, `email`, `currentAddress`, `gender`, `marrigeState`, `mobileNum`) VALUES
('921003072V', 1, NULL, NULL, NULL, 1, 1, 'ymkk yaparathne', 'kalinga yapa', '13001426', 'kkyapa@gmail.com', 'kandy', '2', '3', 719335699),
('921371746V', 4, 3, NULL, NULL, 5, 2, 'DG Pasindu', 'Pasindu Deeyagahage', 'E00134', 'pasi@gmail.com', 'wellahena, wewahamanduwa', '2', '2', 713858989),
('922843775V', 25, 3, 12, 5, 5, 5, 'H G D Madusara', 'Dineth Madusara', 'E0002', 'dineth454@gmail.com', 'No 32, Siridammarathana Mw, Matara', '2', '2', 717504859),
('922843776V', 25, 3, 12, 5, 4, 4, 'A B Silva', 'Abc', 'E0005', 'absilva@gmail.com', 'vjdjhd', '2', '2', 711111111),
('922843890V', 1, NULL, NULL, NULL, 2, 1, 'dfcq', 'ecfef', 'e003', 'sd@gmail.com', 'xqsq', '3', '2', 717504859),
('924765432V', 3, 2, NULL, NULL, 3, 2, 'D madusara', 'Dineth Madusara', 'E0003', 'madusara3@gmail.com', 'Colombo ', '2', '3', 713467835),
('925751406V', 1, NULL, NULL, NULL, 2, 1, 'K Yaparathna', 'Kalinga Yaparathna', 'E00012', 'yaparathna12@gmail.com', 'Colombo ', '2', '3', 712347882),
('927542974V', 4, 3, NULL, NULL, 3, 2, 'I Dilshani', 'Imasha Dilshani', 'E00023', 'imasha23@gmail.com', 'Galle', '3', '3', 776453298),
('934672664V', 24, 3, 12, NULL, 3, 3, 'P Deyagahage', 'Pasindu Deeyagahage', 'E0009', 'pasindu9@gmail.com', 'Matara', '2', '3', 775629275);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

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
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(22, 3),
(23, 3),
(24, 3),
(26, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(9, 4),
(10, 4),
(19, 4),
(20, 4),
(21, 4),
(25, 4),
(27, 4),
(38, 4),
(39, 4),
(40, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ministry_officer`
--

INSERT INTO `ministry_officer` (`ministryOfficerID`, `nic`) VALUES
(1, '922843890V'),
(2, '925751406V');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `notID` varchar(5) NOT NULL,
  `type` varchar(20) NOT NULL,
  `action` varchar(10) NOT NULL,
  `description` longtext NOT NULL,
  `sender` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`notID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notID`, `type`, `action`, `description`, `sender`, `date`) VALUES
('not16', 'Vacancy', 'tomoe', '5', '922843776V', '2016-08-07 07:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `notification_all`
--

CREATE TABLE IF NOT EXISTS `notification_all` (
  `notID` varchar(11) COLLATE utf8mb4_swedish_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_swedish_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_swedish_ci NOT NULL,
  `reply` longtext COLLATE utf8mb4_swedish_ci,
  `sender` varchar(15) COLLATE utf8mb4_swedish_ci NOT NULL,
  `reciever` varchar(15) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dateReply` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`notID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `notification_all`
--

INSERT INTO `notification_all` (`notID`, `type`, `description`, `reply`, `sender`, `reciever`, `date`, `dateReply`) VALUES
('not1', 'Transer', 'test 2', 'ok test', '921003072V', '921003072V', '2016-06-25 12:17:48', '2016-06-25 12:18:31'),
('not10', 'Vacancy', '1', NULL, '922843776V', NULL, '2016-08-06 16:12:17', NULL),
('not11', 'Vacancy', '1', NULL, '922843776V', NULL, '2016-08-06 16:14:24', NULL),
('not12', 'Vacancy', '1', NULL, '922843776V', NULL, '2016-08-06 16:14:48', NULL),
('not13', 'Vacancy', '2', NULL, '922843776V', NULL, '2016-08-06 16:15:53', NULL),
('not14', 'Vacancy', '3', NULL, '922843776V', NULL, '2016-08-06 16:18:55', NULL),
('not15', 'Vacancy', '4', NULL, '922843776V', NULL, '2016-08-07 06:27:30', NULL),
('not16', 'Vacancy', '5', NULL, '922843776V', NULL, '2016-08-07 07:03:42', NULL),
('not2', 'Vacancy', '', NULL, '922843776V', NULL, '2016-08-06 14:33:17', NULL),
('not3', 'Vacancy', '', NULL, '922843776V', NULL, '2016-08-06 15:01:44', NULL),
('not4', 'Vacancy', '', NULL, '922843776V', NULL, '2016-08-06 15:02:31', NULL),
('not5', 'Vacancy', '', NULL, '922843776V', NULL, '2016-08-06 15:04:26', NULL),
('not6', 'Vacancy', '', NULL, '922843776V', NULL, '2016-08-06 15:04:36', NULL),
('not7', 'Vacancy', '', NULL, '922843776V', NULL, '2016-08-06 15:28:10', NULL),
('not8', 'Vacancy', '', NULL, '922843776V', NULL, '2016-08-06 15:28:23', NULL),
('not9', 'Vacancy', '1', NULL, '922843776V', NULL, '2016-08-06 16:09:51', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `principal`
--

INSERT INTO `principal` (`principalID`, `nic`, `zonalOfficeID`, `provinceOfficerID`) VALUES
(7, '922843776V', 12, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `province_officer`
--

INSERT INTO `province_officer` (`provinceOfficerID`, `nic`) VALUES
(6, '921371746V'),
(8, '924765432V'),
(7, '927542974V');

-- --------------------------------------------------------

--
-- Table structure for table `role_type`
--

CREATE TABLE IF NOT EXISTS `role_type` (
  `roleTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `roleType` varchar(45) NOT NULL,
  PRIMARY KEY (`roleTypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `role_type`
--

INSERT INTO `role_type` (`roleTypeID`, `roleType`) VALUES
(1, 'Admin'),
(2, 'Ministry User'),
(3, 'PZInstitute User'),
(4, 'Extended Principal User'),
(5, 'General Principal User'),
(6, 'General User');

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
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  PRIMARY KEY (`schoolID`),
  KEY `schoolInstituteID_idx` (`instituteID`),
  KEY `school_schooltypeID_idx` (`schoolTypeID`),
  KEY `school_zonalID_idx` (`zonalOfficeID`),
  KEY `school_provinceID_idx` (`provinceOfficeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`schoolID`, `schoolName`, `instituteID`, `provinceOfficeID`, `zonalOfficeID`, `schoolTypeID`, `numOfStudents`, `lat`, `lng`) VALUES
(1, 'CWW Kannangara maha vidyalaya', 9, 1, 1, 1, 251, 7.31858, 80.7299),
(2, 'Gonawala Maha Vidyalaya', 10, 1, 1, 1, 200, 7.30957, 80.7334),
(3, 'Hasalaka Gamini Central College', 20, 1, 7, 1, 526, 7.356, 80.9522),
(4, 'Dharmaraja College Kandy', 21, 1, 9, 3, 1254, 7.28967, 80.648),
(5, 'Shariputra College, Pamburana, Matara', 25, 3, 12, 1, 1350, 5.94533, 80.5294),
(6, 'Siddhartha College, Weligama', 27, 3, 13, 1, 1200, 5.97361, 80.4261),
(7, 'Mahinda College', 38, 3, 22, 3, 3700, 6.0501, 80.2149),
(8, 'Anuladevi Bhalika Vidyalaya', 39, 3, 22, 2, 1750, 6.0532, 80.5049),
(9, 'Matara Central College', 40, 3, 12, 1, 2200, 5.9459, 80.556);

-- --------------------------------------------------------

--
-- Table structure for table `school_type`
--

CREATE TABLE IF NOT EXISTS `school_type` (
  `schoolTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `schoolType` varchar(100) NOT NULL,
  PRIMARY KEY (`schoolTypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `school_type`
--

INSERT INTO `school_type` (`schoolTypeID`, `schoolType`) VALUES
(1, 'Mix'),
(2, 'Girls'),
(3, 'Boys'),
(4, 'Primary Girls'),
(5, 'Primary Boys'),
(6, 'Primary Mix'),
(7, 'Secondary Girls'),
(8, 'Secondary Boys'),
(9, 'Secondary Mix');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subjectID` int(11) NOT NULL AUTO_INCREMENT,
  `subjectCode` varchar(10) NOT NULL,
  `subject` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`subjectID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectID`, `subjectCode`, `subject`) VALUES
(1, 'S1', 'Math'),
(2, 'S2', 'Science'),
(3, 'S3', 'Buddhism'),
(4, 'S4', 'English'),
(5, 'S5', 'Drama'),
(6, 'S6', 'Physics'),
(7, 'S7', 'Health'),
(8, 'S8', 'Sinhala'),
(9, 'S9', 'Tamil'),
(10, 'S10', 'Law'),
(11, 'S11', 'Management'),
(12, 'S12', 'ICT');

-- --------------------------------------------------------

--
-- Table structure for table `subject_combinat`
--

CREATE TABLE IF NOT EXISTS `subject_combinat` (
  `teacherID` int(5) NOT NULL,
  `subjectID` int(5) NOT NULL,
  `grade` int(5) NOT NULL,
  `SchoolID` int(5) NOT NULL,
  PRIMARY KEY (`teacherID`,`subjectID`,`grade`),
  KEY `subjectFKConstraint` (`subjectID`),
  KEY `gradeFKConstraint` (`grade`),
  KEY `SchoolIndex` (`SchoolID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_combinat`
--

INSERT INTO `subject_combinat` (`teacherID`, `subjectID`, `grade`, `SchoolID`) VALUES
(17, 3, 9, 1),
(17, 2, 10, 5),
(17, 4, 11, 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teachetID`, `nic`, `zonalOfficeID`, `provinceOfficeID`, `currentState`, `appoinmentSubject`) VALUES
(17, '922843775V', 12, 3, 'working', 1);

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
('921003072V', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1),
('921371746V', 'b5b7aa5864308f36ac3d17cfca7aadd187c5b7f8', 5),
('922843775V', '955974f9cddbaf493d8abe0b1e27f15236674141', 5),
('922843776V', 'b697ca6741cd1e1bc0fbaef1a8bb06980e6a38fb', 4),
('922843890V', '9aee414826e68617ba8c833686307c09381e1856', 2),
('924765432V', 'b1c1bf3c02b14364fe143dbe27d2b66e06f3d724', 3),
('925751406V', 'a42ef169ffc19dd802d709fb9b4c22c57b3cd5b9', 2),
('927542974V', '196ef5f4d8825a3fd7d1ef23c8ffe548db9a49ce', 3),
('934672664V', '63f925005b5c80f4a5e934fb4b1b2301c6b97006', 3);

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE IF NOT EXISTS `vacancies` (
  `Vacancy_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Subject_ID` int(11) NOT NULL,
  `Grade` int(11) NOT NULL,
  `Num_of_teachers` int(11) NOT NULL,
  `ProvinceID` int(11) NOT NULL,
  `ZonalID` int(11) NOT NULL,
  `schoolId` int(5) DEFAULT NULL,
  PRIMARY KEY (`Vacancy_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`Vacancy_ID`, `Subject_ID`, `Grade`, `Num_of_teachers`, `ProvinceID`, `ZonalID`, `schoolId`) VALUES
(1, 2, 7, 1, 3, 12, 5),
(2, 3, 1, 1, 3, 12, 5),
(3, 8, 8, 2, 3, 12, 5),
(4, 9, 6, 1, 3, 12, 5),
(5, 2, 11, 2, 3, 12, 5);

-- --------------------------------------------------------

--
-- Table structure for table `working_history`
--

CREATE TABLE IF NOT EXISTS `working_history` (
  `workingHistoryID` int(11) NOT NULL AUTO_INCREMENT,
  `nic` varchar(12) NOT NULL,
  `instituteID` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `affectedDate` date DEFAULT NULL,
  PRIMARY KEY (`workingHistoryID`),
  KEY `workingHistory_employeenic_idx` (`nic`),
  KEY `workingHistory_instituteID_idx` (`instituteID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `working_history`
--

INSERT INTO `working_history` (`workingHistoryID`, `nic`, `instituteID`, `description`, `affectedDate`) VALUES
(1, '922843775V', 25, 'PassedWorked', '2016-06-15');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `zonal_office`
--

INSERT INTO `zonal_office` (`zonalID`, `zonalName`, `instituteID`, `provinceOfficeID`) VALUES
(1, 'waththegama', 7, 1),
(2, 'pathadumbara', 8, 1),
(6, 'Medadumbara', 14, 1),
(7, 'Hasalaka', 15, 1),
(8, 'Homagama', 16, 2),
(9, 'Kandy', 18, 1),
(10, 'Hewaheta', 22, 1),
(11, 'Kadugannawa', 23, 1),
(12, 'Matara', 24, 3),
(13, 'Weligama', 26, 3),
(14, 'Colombo', 28, 2),
(15, 'Gampaha', 29, 2),
(16, 'Kalutara', 30, 2),
(17, 'Jaffna', 31, 4),
(18, 'Vavuniya', 32, 4),
(19, 'Mannar', 33, 4),
(20, 'Ampara', 34, 5),
(21, 'Trincomalee', 35, 5),
(22, 'Galle', 36, 3),
(23, 'Hambantota', 37, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `zonal_officer`
--

INSERT INTO `zonal_officer` (`zonalOfficerID`, `nic`, `provinceOfficeID`) VALUES
(1, '934672664V', 3);

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
  ADD CONSTRAINT `principal_ProvinceOfficeID` FOREIGN KEY (`provinceOfficerID`) REFERENCES `province_office` (`provinceID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `principal_employeenic` FOREIGN KEY (`nic`) REFERENCES `employee` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE,
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
-- Constraints for table `subject_combinat`
--
ALTER TABLE `subject_combinat`
  ADD CONSTRAINT `gradeFKConstraint` FOREIGN KEY (`grade`) REFERENCES `grade` (`gradeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schoolFKConstraint` FOREIGN KEY (`SchoolID`) REFERENCES `school` (`schoolID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjectFKConstraint` FOREIGN KEY (`subjectID`) REFERENCES `subject` (`subjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacherFKConstraint` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`teachetID`) ON DELETE CASCADE ON UPDATE CASCADE;

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

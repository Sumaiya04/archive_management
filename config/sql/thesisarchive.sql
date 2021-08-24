-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2017 at 04:15 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesisarchive`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `ID` varchar(40) NOT NULL,
  `CourseNo` varchar(40) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Credit` double NOT NULL,
  `CourseTypeID` varchar(40) NOT NULL,
  `DisciplineID` varchar(40) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`ID`, `CourseNo`, `Title`, `Credit`, `CourseTypeID`, `DisciplineID`, `IsDeleted`) VALUES
('1', 'MATH 3218', 'Vector', 3, '1', '{0CF37516-06FE-41CD-93AD-D2D1652509D6}', 0),
('2', 'CSE 2101', 'Advanced Programming Laboratory', 1.5, '2', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 0),
('3', 'CSE 2201', 'Software Development Programming', 1.5, '4', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 0),
('4', 'CSE 3101', 'Database', 3, '3', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 0),
('5', 'CSE 3201', 'Web Programming Laboratory', 1.5, '1', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 0),
('6', 'CSE 3203', 'Software Engineering Laboratory', 1.5, '3', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_sessional_type`
--

CREATE TABLE `tbl_course_sessional_type` (
  `ID` varchar(40) NOT NULL,
  `Name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course_sessional_type`
--

INSERT INTO `tbl_course_sessional_type` (`ID`, `Name`) VALUES
('1', 60),
('2', 30),
('3', 15),
('4', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_type`
--

CREATE TABLE `tbl_course_type` (
  `ID` varchar(40) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `SessionalTypeID` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course_type`
--

INSERT INTO `tbl_course_type` (`ID`, `Name`, `SessionalTypeID`) VALUES
('1', 'Project', '1'),
('2', 'Thesis', '2'),
('3', 'Research', '3'),
('4', 'Project', '4'),
('5', 'Thesis', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discipline`
--

CREATE TABLE `tbl_discipline` (
  `ID` varchar(40) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `ShortCode` varchar(20) DEFAULT NULL,
  `SchoolID` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_discipline`
--

INSERT INTO `tbl_discipline` (`ID`, `Name`, `ShortCode`, `SchoolID`) VALUES
('{0CF37516-06FE-41CD-93AD-D2D1652509D6}', 'Mathematics', 'MATH', '39DDC0C2-CFC2-4246-8748-8812B1751A5C'),
('{560A0FC0-6221-497D-8D41-E584EE4BBEE3}', 'Architecture', 'ARCHI', '39DDC0C2-CFC2-4246-8748-8812B1751A5C'),
('{AF41CC9F-3BCD-4952-9D02-17184CC40C79}', 'Biotechnology & Genetic Engineering', 'BGE', '4D46079B-AFA3-40F1-B8D1-6CC9E9F56812'),
('{B34A0580-0B92-49BD-84FB-929297B104C5}', 'Pharmacy', 'PHA', '4D46079B-AFA3-40F1-B8D1-6CC9E9F56812'),
('{E03C2DC3-CAF3-477E-A851-0C11DF93FD3B}', 'Chemistry', 'CHEM', '39DDC0C2-CFC2-4246-8748-8812B1751A5C'),
('{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'Computer Science and Engineering', 'CSE', '39DDC0C2-CFC2-4246-8748-8812B1751A5C');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `ID` varchar(40) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`ID`, `Name`) VALUES
('administrator', 'Administrator'),
('registration coordinator', 'Registration Coordinator'),
('student', 'Student'),
('stuff', 'Stuff'),
('tabulator', 'Tabulator'),
('teacher', 'Teacher'),
('visitor', 'Visitor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school`
--

CREATE TABLE `tbl_school` (
  `ID` varchar(40) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `DeanID` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_school`
--

INSERT INTO `tbl_school` (`ID`, `Name`, `DeanID`) VALUES
('39DDC0C2-CFC2-4246-8748-8812B1751A5C', 'Science Engineering and Technology', 'dean@gmail.com'),
('4D46079B-AFA3-40F1-B8D1-6CC9E9F56812', 'Life Science', 'dean@gmail.com'),
('86E0F021-B30D-48D2-B177-247180633C5E', 'Social Science', 'dean@gmail.com'),
('879375F7-0A15-4705-AC90-C6786D279EF1', 'Law and Humanities', 'dean@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_term`
--

CREATE TABLE `tbl_term` (
  `ID` varchar(40) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_term`
--

INSERT INTO `tbl_term` (`ID`, `Name`) VALUES
('{19B15CDF-264C-4924-8608-258673BCC448}', 'B.Sc 1st'),
('{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', 'B.Sc 2nd'),
('{298E9628-8DE2-4742-8F93-0491C01BB152}', 'M.Sc 1st'),
('{9C84629E-11FA-4459-A593-C9AD9CF0D3F2}', 'M.Sc 2nd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `ID` varchar(40) NOT NULL,
  `UniversityID` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `IsLogged` smallint(1) DEFAULT NULL,
  `IsArchived` smallint(1) DEFAULT NULL,
  `IsDeleted` smallint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`ID`, `UniversityID`, `Email`, `Password`, `FirstName`, `LastName`, `Status`, `IsLogged`, `IsArchived`, `IsDeleted`) VALUES
('abid@gmail.com', '150210', 'abid@gmail.com', '123', 'Abid', 'Shahariar', 'approved', NULL, NULL, NULL),
('alamin@gmail.com', '150212', 'alamin@gmail.com', '123', 'Al', 'Amin ', 'approved', NULL, NULL, NULL),
('anik@gmail.com', '150231', 'anik@gmail.com', '123', 'Ashfiqur', 'Rahman', 'approved', NULL, NULL, NULL),
('azoadahnaf@gmail.com', '150222', 'azoadahnaf@gmail.com', '123', 'Azoad', 'Ahnaf', 'approved', NULL, NULL, NULL),
('dean@gmail.com', '020202', 'dean@gmail.com', '123', 'I AM', 'DEAN ', 'approved', NULL, NULL, NULL),
('durjoy@gmail.com', '150229', 'durjoy@gmail.com', '123', 'Durjoy', 'Bapery ', 'approved', NULL, NULL, NULL),
('imran@gmail.com', '150203', 'imran@gmail.com', '123', 'Imran', 'Hossain', 'approved', NULL, NULL, NULL),
('pranta.cse@gmail.com', '150215', 'pranta.cse@gmail.com', '123', 'Pranta', 'Protik', 'approved', NULL, NULL, NULL),
('ratul@gamil.com', '150226', 'ratul@gamil.com', '123', 'Siamul', 'Haque', 'approved', NULL, NULL, NULL),
('sakeef@gmail.com', '150217', 'sakeef@gmail.com', '123', 'Nazmus', 'Sakeef', 'approved', NULL, NULL, NULL),
('sayed@gmail.com', '150220', 'sayed@gmail.com', '123', 'Abu', 'Sayed', 'approved', NULL, NULL, NULL),
('shahidul@gmail.com', '150206', 'shahidul@gmail.com', '123', 'Shahidul', 'Islam', 'approved', NULL, NULL, NULL),
('shuvo@gmail.com', '150233', 'shuvo@gmail.com', '123', 'Wahid', 'Shuvo', 'approved', NULL, NULL, NULL),
('sudipto@gmail.com', '150223', 'sudipto@gmail.com', '123', 'Sudipto', 'Das', 'approved', NULL, NULL, NULL),
('swajon@gmail.com', '150214', 'swajon@gmail.com', '123', 'Swajon', 'Golder', 'approved', NULL, NULL, NULL),
('tanmai@gmail.com', '150232', 'tanmai@gmail.com', '123', 'Tanmai', 'Ghosh', 'approved', NULL, NULL, NULL),
('teacher@gmail.com', '020203', 'teacher@gmail.com', '123', 'I am', 'teacher', 'approved', NULL, NULL, NULL),
('test@test.com', '020201', 'test@test.com', '123', 'I am', 'admin ', 'approved', NULL, NULL, NULL),
('zubayer@gmail.com', '150208', 'zubayer@gmail.com', '123', 'Zubayer', 'Rayhan', 'approved', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `ID` int(11) NOT NULL,
  `UserID` varchar(40) NOT NULL,
  `RoleID` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`ID`, `UserID`, `RoleID`) VALUES
(104, 'dean@gmail.com', 'teacher'),
(106, 'teacher@gmail.com', 'teacher'),
(116, 'imran@gmail.com', 'student'),
(117, 'shahidul@gmail.com', 'student'),
(118, 'zubayer@gmail.com', 'student'),
(120, 'swajon@gmail.com', 'student'),
(121, 'pranta.cse@gmail.com', 'student'),
(122, 'sakeef@gmail.com', 'student'),
(123, 'sayed@gmail.com', 'student'),
(124, 'azoadahnaf@gmail.com', 'student'),
(125, 'sudipto@gmail.com', 'student'),
(126, 'ratul@gamil.com', 'student'),
(128, 'anik@gmail.com', 'student'),
(129, 'tanmai@gmail.com', 'student'),
(130, 'shuvo@gmail.com', 'student'),
(131, 'abid@gmail.com', 'student'),
(157, 'alamin@gmail.com', 'student'),
(174, 'test@test.com', 'administrator'),
(175, 'test@test.com', 'teacher'),
(177, 'durjoy@gmail.com', 'stuff');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year`
--

CREATE TABLE `tbl_year` (
  `ID` varchar(40) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_year`
--

INSERT INTO `tbl_year` (`ID`, `Name`) VALUES
('1', '1st'),
('2', '2nd'),
('3', '3rd'),
('4', '4th');

-- --------------------------------------------------------

--
-- Table structure for table `tms_link_thesis`
--

CREATE TABLE `tms_link_thesis` (
  `id` varchar(40) NOT NULL,
  `link` text NOT NULL,
  `thesis_id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_link_thesis`
--

INSERT INTO `tms_link_thesis` (`id`, `link`, `thesis_id`) VALUES
('{992CDFDF-98CE-45C4-B5B6-4EFD77EB530A}', 'https://stackoverflow.com/questions/34500423/remove-top-padding-on-bootstrap-navbar', '{A905A916-1B2C-4F31-BBC2-094E4B199569}'),
('{C811FFEC-3F7F-4C8A-AE5D-4030E85AA25F}', 'https://stackoverflow.com/questions/34500423/remove-top-padding-on-bootstrap-navbar', '{77590E83-76A0-4725-A4C0-48B4DFC34D4D}'),
('{E0103054-7585-4A1E-896C-F035AB4FBCB0}', 'https://stackoverflow.com/questions/26727581/how-to-remove-default-padding-from-bootstrap-nav-bar', '{77590E83-76A0-4725-A4C0-48B4DFC34D4D}');

-- --------------------------------------------------------

--
-- Table structure for table `tms_student_thesis`
--

CREATE TABLE `tms_student_thesis` (
  `id` varchar(40) NOT NULL,
  `student_id` varchar(40) NOT NULL,
  `thesis_id` varchar(40) NOT NULL,
  `contribution` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_student_thesis`
--

INSERT INTO `tms_student_thesis` (`id`, `student_id`, `thesis_id`, `contribution`) VALUES
('{046A0615-5600-4AD9-BB83-4C452A94074D}', 'imran@gmail.com', '{A54D497B-C365-43F7-855D-233AC4FE4B9C}', 25),
('{3F64CF68-E345-45B0-A13D-6C7A2A7B4AC4}', 'imran@gmail.com', '{A905A916-1B2C-4F31-BBC2-094E4B199569}', 34),
('{4362D91E-5A5C-4BE0-A96D-A0D5733B2462}', 'alamin@gmail.com', '{326303FD-7149-4F45-95CB-858B96C81508}', 0),
('{5A72C6F2-2B66-457A-81BA-91992305D4B1}', 'imran@gmail.com', '{77590E83-76A0-4725-A4C0-48B4DFC34D4D}', 34),
('{5BE6D7B7-0D11-49FD-B5CF-88F38A0F3F92}', 'ratul@gamil.com', '{6FBA3E23-0106-443A-A703-C29AC3F7FDDE}', 0),
('{6EE98A15-9690-4858-AF9B-D52160B1632F}', 'swajon@gmail.com', '{7CB1DE81-EF72-4BDA-98C5-D281D2FAAA23}', 0),
('{BD303286-9BBE-4F84-B961-D16297CD900C}', 'shahidul@gmail.com', '{A54D497B-C365-43F7-855D-233AC4FE4B9C}', 75),
('{C2D55D2B-3959-485E-8989-A6137AB17D9B}', 'sayed@gmail.com', '{7CB1DE81-EF72-4BDA-98C5-D281D2FAAA23}', 0),
('{C3D560A4-FDE3-4D4C-AB08-A36C0214D479}', 'shahidul@gmail.com', '{647F6FA4-CB2E-42BA-951C-B8A2F3F4D7FD}', 0),
('{E4905276-59E2-41B0-90E9-7D0894276E17}', 'zubayer@gmail.com', '{647F6FA4-CB2E-42BA-951C-B8A2F3F4D7FD}', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tms_supervisor_thesis`
--

CREATE TABLE `tms_supervisor_thesis` (
  `id` varchar(40) NOT NULL,
  `supervisor_id` varchar(40) NOT NULL,
  `thesis_id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_supervisor_thesis`
--

INSERT INTO `tms_supervisor_thesis` (`id`, `supervisor_id`, `thesis_id`) VALUES
('{0402A89D-09B7-4FBB-AFE7-0279F713335A}', 'dean@gmail.com', '{7CB1DE81-EF72-4BDA-98C5-D281D2FAAA23}'),
('{11A059D4-A5D5-47CD-AD54-234DF28F6953}', 'teacher@gmail.com', '{6FBA3E23-0106-443A-A703-C29AC3F7FDDE}'),
('{1A164A80-37FC-48E9-ABED-EDE2A7C1AF4D}', 'teacher@gmail.com', '{647F6FA4-CB2E-42BA-951C-B8A2F3F4D7FD}'),
('{1FB59F5F-00C9-45A2-8B68-44048033ABA2}', 'teacher@gmail.com', '{326303FD-7149-4F45-95CB-858B96C81508}'),
('{22070EEE-C342-40CF-A82C-83D4DD39642F}', 'teacher@gmail.com', '{7CB1DE81-EF72-4BDA-98C5-D281D2FAAA23}'),
('{39992637-55E3-4C2F-B186-7BC34BC242A5}', 'teacher@gmail.com', '{77590E83-76A0-4725-A4C0-48B4DFC34D4D}'),
('{3ABC21EF-FD90-4E02-A893-A5497FBD321C}', 'teacher@gmail.com', '{A54D497B-C365-43F7-855D-233AC4FE4B9C}'),
('{A9336057-E97E-48A4-8573-888A8EA6BBA9}', 'teacher@gmail.com', '{A905A916-1B2C-4F31-BBC2-094E4B199569}');

-- --------------------------------------------------------

--
-- Table structure for table `tms_thesis`
--

CREATE TABLE `tms_thesis` (
  `id` varchar(40) NOT NULL,
  `thumbnail` text NOT NULL,
  `title` varchar(256) NOT NULL,
  `pdf_link` text,
  `description` text NOT NULL,
  `year_id` varchar(40) NOT NULL,
  `term_id` varchar(40) NOT NULL,
  `course_id` varchar(40) NOT NULL,
  `discipline_id` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_thesis`
--

INSERT INTO `tms_thesis` (`id`, `thumbnail`, `title`, `pdf_link`, `description`, `year_id`, `term_id`, `course_id`, `discipline_id`, `created_at`, `updated_at`) VALUES
('{326303FD-7149-4F45-95CB-858B96C81508}', './resources/img/thumbnails/Study of bank customers and employee in 4 local bank of malaysia.ico', 'Study of bank customers and employee in 4 local bank of malaysia', './resources/pdf/report/Study of bank customers and employee in 4 local bank of malaysia.pdf', 'Study of bank customers and employee in 4 local bank of malaysia Study of bank customers and employee in 4 local bank of malaysia Study of bank customers and employee in 4 local bank of malaysia Study of bank customers and employee in 4 local bank of malaysia Study of bank customers and employee in 4 local bank of malaysia Study of bank customers and employee in 4 local bank of malaysia Study of bank customers and employee in 4 local bank of malaysia Study of bank customers and employee in 4 local bank of malaysia Study of bank customers and employee in 4 local bank of malaysia Study of bank customers and employee in 4 local bank of malaysia Study of bank customers and employee in 4 local bank of malaysia Study of bank customers and employee in 4 local bank of malaysia Study of bank customers and employee in 4 local bank of malaysia Study of bank customers and employee in 4 local bank of malaysia Study of bank customers and employee in 4 local bank of malaysia Study of bank customers and employee in 4 local bank of malaysia Study of bank customers and employee in 4 local bank of malaysia Study of bank customers and employee in 4 local bank of malaysia', '4', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', '2017-09-25 04:11:29', '2017-10-12 06:57:38'),
('{647F6FA4-CB2E-42BA-951C-B8A2F3F4D7FD}', './resources/img/thumbnails/Analytical study of premium CREDIT card.ico', 'Analytical study of premium CREDIT card', './resources/pdf/report/Analytical study of premium CREDIT card.pdf', 'Analytical study of premium CREDIT card Analytical study of premium CREDIT card Analytical study of premium CREDIT card Analytical study of premium CREDIT card Analytical study of premium CREDIT card Analytical study of premium CREDIT card Analytical study of premium CREDIT card Analytical study of premium CREDIT card Analytical study of premium CREDIT card Analytical study of premium CREDIT card Analytical study of premium CREDIT card', '4', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', '2017-09-25 04:17:41', '2017-10-05 04:34:52'),
('{6FBA3E23-0106-443A-A703-C29AC3F7FDDE}', './resources/img/thumbnails/Analysis on equity share price behaviour.png', 'Analysis on equity share price behaviour', './resources/pdf/report/Analysis on equity share price behaviour.pdf', 'Analysis on equity share price behaviour Analysis on equity share price behaviour Analysis on equity share price behaviour Analysis on equity share price behaviour Analysis on equity share price behaviour Analysis on equity share price behaviour Analysis on equity share price behaviour Analysis on equity share price behaviour Analysis on equity share price behaviour Analysis on equity share price behaviour', '4', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', '2017-09-25 04:15:53', '2017-10-05 04:32:32'),
('{77590E83-76A0-4725-A4C0-48B4DFC34D4D}', './resources/img/thumbnails/Evolution of mgt technique.png', 'Evolution of mgt technique', './resources/pdf/report/Evolution of mgt technique.pdf', 'Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique Evolution of mgt technique', '4', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', '2017-09-25 04:30:28', '2017-10-05 04:34:15'),
('{7CA833C5-AD32-432E-BA00-4D8562CE37E8}', './resources/img/thumbnails/hall management.png', 'hall management', './resources/pdf/report/hall management.pdf', 'huadhfud', '3', '{19B15CDF-264C-4924-8608-258673BCC448}', '6', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', '2017-11-04 05:20:36', '2017-11-04 05:20:36'),
('{7CB1DE81-EF72-4BDA-98C5-D281D2FAAA23}', './resources/img/thumbnails/Exchange traded fund.png', 'Exchange traded fund', './resources/pdf/report/Exchange traded fund.pdf', 'Exchange traded fund Exchange traded fund Exchange traded fund Exchange traded fund Exchange traded fund Exchange traded fund Exchange traded fund Exchange traded fund Exchange traded fund Exchange traded fund Exchange traded fund', '4', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', '2017-09-25 04:32:57', '2017-10-05 04:32:47'),
('{A54D497B-C365-43F7-855D-233AC4FE4B9C}', './resources/img/thumbnails/Study on effectiveness of training programme.png', 'Study on effectiveness of training programme', './resources/pdf/report/Study on effectiveness of training programme.pdf', 'Study on effectiveness of training programme Study on effectiveness of training programme Study on effectiveness of training programme Study on effectiveness of training programme Study on effectiveness of training programme Study on effectiveness of training programme Study on effectiveness of training programme Study on effectiveness of training programme Study on effectiveness of training programme Study on effectiveness of training programme Study on effectiveness of training programme Study on effectiveness of training programme Study on effectiveness of training programme Study on effectiveness of training programme', '4', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', '2017-09-25 04:15:03', '2017-10-13 05:33:50'),
('{A905A916-1B2C-4F31-BBC2-094E4B199569}', './resources/img/thumbnails/Study on customer perception towards UTI mutual fund.png', 'Study on customer perception towards UTI mutual fund', '', 'Study on customer perception towards UTI mutual fund Study on customer perception towards UTI mutual fund Study on customer perception towards UTI mutual fund Study on customer perception towards UTI mutual fund Study on customer perception towards UTI mutual fund Study on customer perception towards UTI mutual fund Study on customer perception towards UTI mutual fund Study on customer perception towards UTI mutual fund Study on customer perception towards UTI mutual fund Study on customer perception towards UTI mutual fund Study on customer perception towards UTI mutual fund', '4', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', '2017-09-25 04:14:00', '2017-10-13 05:33:58'),
('{D02FDF5E-0705-4563-BC62-13E13997D0AE}', './resources/img/thumbnails/Analysis of the trade finance pattern.ico', 'Analysis of the trade finance pattern', './resources/pdf/report/Analysis of the trade finance pattern.pdf', 'Analysis of the trade finance pattern Analysis of the trade finance pattern Analysis of the trade finance pattern Analysis of the trade finance pattern Analysis of the trade finance pattern Analysis of the trade finance pattern Analysis of the trade finance pattern Analysis of the trade finance pattern Analysis of the trade finance pattern Analysis of the trade finance pattern Analysis of the trade finance pattern Analysis of the trade finance pattern Analysis of the trade finance pattern', '4', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', '2017-09-25 04:16:48', '2017-10-05 04:34:30'),
('{DA4F1E3B-CCBA-4801-8CB9-47E5467D5035}', './resources/img/thumbnails/Health & welfare measures in WOVEN TEXTILE COMPANY.png', 'Health & welfare measures in WOVEN TEXTILE COMPANY', './resources/pdf/report/Health & welfare measures in WOVEN TEXTILE COMPANY.pdf', 'Health & welfare measures in WOVEN TEXTILE COMPANY Health & welfare measures in WOVEN TEXTILE COMPANY Health & welfare measures in WOVEN TEXTILE COMPANY Health & welfare measures in WOVEN TEXTILE COMPANY Health & welfare measures in WOVEN TEXTILE COMPANY Health & welfare measures in WOVEN TEXTILE COMPANY Health & welfare measures in WOVEN TEXTILE COMPANY Health & welfare measures in WOVEN TEXTILE COMPANY Health & welfare measures in WOVEN TEXTILE COMPANY', '4', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', '2017-09-25 04:31:57', '2017-10-13 05:34:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CourseTypeID` (`CourseTypeID`),
  ADD KEY `DisciplineID` (`DisciplineID`);

--
-- Indexes for table `tbl_course_sessional_type`
--
ALTER TABLE `tbl_course_sessional_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_course_type`
--
ALTER TABLE `tbl_course_type`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SessionalTypeID` (`SessionalTypeID`);

--
-- Indexes for table `tbl_discipline`
--
ALTER TABLE `tbl_discipline`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SchoolID` (`SchoolID`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_school`
--
ALTER TABLE `tbl_school`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `DeanID` (`DeanID`);

--
-- Indexes for table `tbl_term`
--
ALTER TABLE `tbl_term`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `UniversityID` (`UniversityID`);

--
-- Indexes for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_year`
--
ALTER TABLE `tbl_year`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tms_link_thesis`
--
ALTER TABLE `tms_link_thesis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thesis_id` (`thesis_id`);

--
-- Indexes for table `tms_student_thesis`
--
ALTER TABLE `tms_student_thesis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `thesis_id` (`thesis_id`);

--
-- Indexes for table `tms_supervisor_thesis`
--
ALTER TABLE `tms_supervisor_thesis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supervisor_id` (`supervisor_id`),
  ADD KEY `thesis_id` (`thesis_id`);

--
-- Indexes for table `tms_thesis`
--
ALTER TABLE `tms_thesis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `year_id` (`year_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `discipline_id` (`discipline_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD CONSTRAINT `tbl_course_ibfk_1` FOREIGN KEY (`CourseTypeID`) REFERENCES `tbl_course_type` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_course_ibfk_2` FOREIGN KEY (`DisciplineID`) REFERENCES `tbl_discipline` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_course_type`
--
ALTER TABLE `tbl_course_type`
  ADD CONSTRAINT `tbl_course_type_ibfk_1` FOREIGN KEY (`SessionalTypeID`) REFERENCES `tbl_course_sessional_type` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_discipline`
--
ALTER TABLE `tbl_discipline`
  ADD CONSTRAINT `tbl_discipline_ibfk_1` FOREIGN KEY (`SchoolID`) REFERENCES `tbl_school` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_school`
--
ALTER TABLE `tbl_school`
  ADD CONSTRAINT `tbl_school_ibfk_1` FOREIGN KEY (`DeanID`) REFERENCES `tbl_user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tms_link_thesis`
--
ALTER TABLE `tms_link_thesis`
  ADD CONSTRAINT `tms_link_thesis_ibfk_1` FOREIGN KEY (`thesis_id`) REFERENCES `tms_thesis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tms_student_thesis`
--
ALTER TABLE `tms_student_thesis`
  ADD CONSTRAINT `tms_student_thesis_ibfk_1` FOREIGN KEY (`thesis_id`) REFERENCES `tms_thesis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tms_student_thesis_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `tbl_user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tms_supervisor_thesis`
--
ALTER TABLE `tms_supervisor_thesis`
  ADD CONSTRAINT `tms_supervisor_thesis_ibfk_1` FOREIGN KEY (`thesis_id`) REFERENCES `tms_thesis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tms_supervisor_thesis_ibfk_2` FOREIGN KEY (`supervisor_id`) REFERENCES `tbl_user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tms_thesis`
--
ALTER TABLE `tms_thesis`
  ADD CONSTRAINT `tms_thesis_ibfk_1` FOREIGN KEY (`year_id`) REFERENCES `tbl_year` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tms_thesis_ibfk_2` FOREIGN KEY (`term_id`) REFERENCES `tbl_term` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tms_thesis_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tms_thesis_ibfk_4` FOREIGN KEY (`discipline_id`) REFERENCES `tbl_discipline` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

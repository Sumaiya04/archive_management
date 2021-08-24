-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2017 at 04:07 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectarchive`
--

-- --------------------------------------------------------

--
-- Table structure for table `pms_link_project`
--

CREATE TABLE `pms_link_project` (
  `id` varchar(40) NOT NULL,
  `link` text NOT NULL,
  `project_id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_link_project`
--

INSERT INTO `pms_link_project` (`id`, `link`, `project_id`) VALUES
('{32D64873-5C27-4B1E-A90A-CD262D4A706B}', 'https://stackoverflow.com/questions/26727581/how-to-remove-default-padding-from-bootstrap-nav-bar', '{7D42D76F-3EE9-43CE-B2F9-A63051D028E3}'),
('{42F54C4C-5925-4667-B058-9FF70FA1459B}', 'https://stackoverflow.com/questions/34500423/remove-top-padding-on-bootstrap-navbar', '{F33491F4-516A-40B3-8D03-557F9A244D1E}'),
('{43A54675-59FC-468C-B928-CD32B2C94ED7}', 'https://stackoverflow.com/questions/26727581/how-to-remove-default-padding-from-bootstrap-nav-bar', '{66B187F3-123B-46C7-A2DB-84C26C40DCBB}'),
('{70017732-32D7-4688-BFDD-53878DE6ACB7}', 'http://cse.ku.dgted.com/', '{E0DDFBEC-EB89-472D-9802-03E322A59281}'),
('{9BE1DB6E-F7E1-4D2D-B3CA-CF7F2A704013}', 'https://stackoverflow.com/questions/34500423/remove-top-padding-on-bootstrap-navbar', '{7D42D76F-3EE9-43CE-B2F9-A63051D028E3}'),
('{A7054D61-1F25-469A-A37E-07BE3058239B}', 'https://www.youtube.com/watch?v=PjcRfTnI0kU&pbjreload=10', '{7D42D76F-3EE9-43CE-B2F9-A63051D028E3}'),
('{FA964E29-1FC8-403A-81DD-405E732771F4}', 'https://stackoverflow.com/questions/26727581/how-to-remove-default-padding-from-bootstrap-nav-bar', '{66B187F3-123B-46C7-A2DB-84C26C40DCBB}');

-- --------------------------------------------------------

--
-- Table structure for table `pms_project`
--

CREATE TABLE `pms_project` (
  `id` varchar(40) NOT NULL,
  `thumbnail` text NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `language` varchar(256) NOT NULL,
  `year_id` varchar(40) NOT NULL,
  `term_id` varchar(40) NOT NULL,
  `course_id` varchar(40) NOT NULL,
  `discipline_id` varchar(40) NOT NULL,
  `teacher_id` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_project`
--

INSERT INTO `pms_project` (`id`, `thumbnail`, `title`, `description`, `language`, `year_id`, `term_id`, `course_id`, `discipline_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
('{0C262E4E-80F5-436-AF8C-48FA39EAE4C0}', './resources/img/thumbnails/Transport Management System.png', 'Transport Management System', '"Create vehicles as assets. Assign drivers, helpers to bus along with their contact information. \r\n\r\nCreate routes and the stopage along with the google map options \r\n\r\nAdd more features to it, be creative"', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-10-10 15:12:20', '2017-10-10 15:12:20'),
('{0C262E4E-80F5-4367-AF8C-48FA39EAE4C0}', './resources/img/thumbnails/Transport Management System.png', 'Transport Management System', '"Create vehicles as assets. Assign drivers, helpers to bus along with their contact information. \r\n\r\nCreate routes and the stopage along with the google map options \r\n\r\nAdd more features to it, be creative"', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-08-28 10:35:47', '2017-08-28 10:35:47'),
('{0C262E4E-80F5-437-AF8C-48FA39EAE4C0}', './resources/img/thumbnails/Transport Management System.png', 'Transport Management System', '"Create vehicles as assets. Assign drivers, helpers to bus along with their contact information. \r\n\r\nCreate routes and the stopage along with the google map options \r\n\r\nAdd more features to it, be creative"', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-10-10 15:11:48', '2017-10-10 15:11:48'),
('{0C62E4E-80F5-4367-AF8C-48FA39EAE4C0}', './resources/img/thumbnails/Transport Management System.png', 'Transport Management System', '"Create vehicles as assets. Assign drivers, helpers to bus along with their contact information. \r\n\r\nCreate routes and the stopage along with the google map options \r\n\r\nAdd more features to it, be creative"', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-10-10 15:12:14', '2017-10-10 15:12:14'),
('{66B187F3-123B-46C7-A2DB-84C26C40DCBB}', './resources/img/thumbnails/Improved CSE Discipline website (OOP).png', 'Improved CSE Discipline website (OOP)', '"refresh current website with the given template. \r\n\r\none group work with the new templating. \r\n\r\nOther group work with the admin part for the current database"', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-08-28 08:09:20', '2017-10-11 19:54:45'),
('{6F28DF7E-D7D4-4305-B116-D7466C8CDE03}', './resources/img/thumbnails/Meal Management.png', 'Meal Management', 'dsf', 'PHP', '2', '{298E9628-8DE2-4742-8F93-0491C01BB152}', '2', '{AF41CC9F-3BCD-4952-9D02-17184CC40C79}', 'teacher@gmail.com', '2017-10-12 05:36:43', '2017-10-12 05:36:43'),
('{7D42D76F-3EE9-43CE-B2F9-A63051D028E3}', './resources/img/thumbnails/Improved file-folder management system..png', 'Improved file-folder management system.', '"improve the available SimTire file folder system, File allocation, file versioning, file relation should be present\r\n\r\nCreate a beatiful file browsing system"', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-08-28 10:09:17', '2017-08-28 10:09:17'),
('{7D42DF-3EE9-43CE-B2F9-A63051D028E3}', './resources/img/thumbnails/Improved file-folder management system..png', 'Improved file-folder management system.', '"improve the available SimTire file folder system, File allocation, file versioning, file relation should be present\r\n\r\nCreate a beatiful file browsing system"', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-10-10 15:12:01', '2017-10-10 15:12:01'),
('{A5298EE6-822A-4ABF-981D-825CE0FE189B}', './resources/img/thumbnails/Meal Management.png', 'Meal Management', '"Meal system where you create meal at different times of the day, create menu, cost, SimTire user can subscribe and unsuscribe and pay for the meal to consume it\r\n\r\nIdeally it should be related to the housing. So a meal would created on a housing and consumed from there\r\n\r\nDaily, weekly, monthly consumption report, most likely menus, ranking of the meal should be also present"', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-08-28 10:08:43', '2017-10-13 04:52:12'),
('{A94A0ABA-1AFA-461E-A09D-808A4FB8B522}', './resources/img/thumbnails/Payment Management System.png', 'Payment Management System', '"First of all user can load his account with money. This is just dummy money\r\n\r\nPayment can be done by SimTire user related to different things may be medical bill, library fine, buying stuffs from canteen.\r\n\r\nThere will be a store of items and their price will be there. User can buy things from that store and pay using their balance from the account. \r\n\r\nFor buying something (e.g. book) from the store user will get credit and later credit can be converted to a balance using some forumla."', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-08-28 10:11:12', '2017-08-28 10:11:12'),
('{CEC76C2B-FA03-4B33-AB9A-B523B7334145}', './resources/img/thumbnails/Improved advanced event calendar.png', 'Improved advanced event calendar', '"apply SimTire on the available event calendar code and new features to it\r\n\r\nVarious types of searching"', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-08-28 10:06:10', '2017-09-14 06:27:31'),
('{D283BD24-F48F-45FA-A397-ACFABF690E9C}', './resources/img/thumbnails/Project Archieve.png', 'Project Archieve', '"improve current project module to SimTire based project. Project should also inclue member names and their partnership in the project\r\n\r\nA front page for the project module where all the projects along with their thumnail pictures and title are shown using pagination. You select one project and you can see the details of the project and the members of the project. Also, the partneship of project if applicable\r\n\r\nPersone wise project lists should also be there"', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-08-28 10:10:39', '2017-08-28 10:10:39'),
('{E0DDFBEC-EB89-472D-9802-03E322A59281}', './resources/img/thumbnails/Library Management.png', 'Library Management', 'create library, create books, create shelfs, assing book to shelfs to a specific library, search books different ways, student can take books and return bookscreate library, create books, create shelfs, assing book to shelfs to a specific library, search books different ways, student can take books and return bookscreate library, create books, create shelfs, assing book to shelfs to a specific library, search books different ways, student can take books and return books', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-08-28 10:09:46', '2017-09-12 06:00:55'),
('{F33491F4-516A-40B3-8D03-557F9A244D1E}', './resources/img/thumbnails/Student Hall Dorm Teacher Staff housing Management.png', 'Student Hall Dorm Teacher Staff housing Management', '"CRUD of hall/dorm/teacher/staff housing, every hall/others will have rooms, each room will have seats. a student will be selected from the SimTire user and will be assigned to a seat\r\nVarious types of searching "', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-08-28 10:07:55', '2017-10-11 20:13:08'),
('{FB511786-370C-4AA9-9686-59EA7C8D1B2B}', './resources/img/thumbnails/Medical Service Management.ico', 'Medical Service Management', '"create doctors, nurse, medicine stock, university people assigned to doctor, doctor see patient, write prescriptions, and medicine \r\nthen medicine is given to a person and stock gets updated"', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-08-28 10:10:17', '2017-08-28 10:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `pms_student_project`
--

CREATE TABLE `pms_student_project` (
  `id` varchar(40) NOT NULL,
  `student_id` varchar(40) NOT NULL,
  `project_id` varchar(40) NOT NULL,
  `contribution` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_student_project`
--

INSERT INTO `pms_student_project` (`id`, `student_id`, `project_id`, `contribution`) VALUES
('{0058AF12-CF2A-4CC3-97C9-34A23FA11457}', 'zubayer@gmail.com', '{CEC76C2B-FA03-4B33-AB9A-B523B7334145}', 65),
('{0DFA6FE8-A794-46AD-8736-92D62F47C8F0}', 'imran@gmail.com', '{7D42D76F-3EE9-43CE-B2F9-A63051D028E3}', 0),
('{0EC59379-2D22-41D0-B04A-B3019DFD0753}', 'pranta.cse@gmail.com', '{D283BD24-F48F-45FA-A397-ACFABF690E9C}', 0),
('{11232E59-FF84-4B74-AA65-2168888FBD07}', 'shuvo@gmail.com', '{66B187F3-123B-46C7-A2DB-84C26C40DCBB}', 0),
('{22CC1D41-8C86-4C65-AE8E-AD5D13227B2E}', 'imran@gmail.com', '{FB511786-370C-4AA9-9686-59EA7C8D1B2B}', 0),
('{330E2402-9EAB-4694-A532-31238064EE88}', 'imran@gmail.com', '{CEC76C2B-FA03-4B33-AB9A-B523B7334145}', 23),
('{3B20A933-25D7-4FCF-8FDE-9D8DBECBE9C8}', 'sakeef@gmail.com', '{D283BD24-F48F-45FA-A397-ACFABF690E9C}', 0),
('{6928ED6C-7DF1-43AF-8DD4-F54D3C769D60}', 'zubayer@gmail.com', '{FB511786-370C-4AA9-9686-59EA7C8D1B2B}', 0),
('{7399A4CE-258D-4F7C-8CA9-C59DBA7795F4}', 'imran@gmail.com', '{F33491F4-516A-40B3-8D03-557F9A244D1E}', 23),
('{7D2A676A-875C-4B96-8D57-6B0D0FF3151F}', 'azoadahnaf@gmail.com', '{A5298EE6-822A-4ABF-981D-825CE0FE189B}', 0),
('{9277AD4B-2FBD-462B-B132-54DA763DD22D}', 'durjoy@gmail.com', '{7D42D76F-3EE9-43CE-B2F9-A63051D028E3}', 0),
('{A3F7A699-E6CF-4377-9711-602D503C5D76}', 'imran@gmail.com', '{66B187F3-123B-46C7-A2DB-84C26C40DCBB}', 0),
('{A9BC0288-1DF9-4026-AEE1-D734AF2350AD}', 'shahidul@gmail.com', '{66B187F3-123B-46C7-A2DB-84C26C40DCBB}', 0),
('{B6CBE46F-0CE4-4831-B61F-F74DAFD700E0}', 'swajon@gmail.com', '{FB511786-370C-4AA9-9686-59EA7C8D1B2B}', 0),
('{BF747D37-653E-4D0B-AFA5-608D8BC41D13}', 'shahidul@gmail.com', '{E0DDFBEC-EB89-472D-9802-03E322A59281}', 100),
('{C18347DC-0769-445E-8FF3-BFA1499664E2}', 'pranta.cse@gmail.com', '{66B187F3-123B-46C7-A2DB-84C26C40DCBB}', 0),
('{C231CCBA-DD44-462B-9094-033A79B5580F}', 'tanmai@gmail.com', '{D283BD24-F48F-45FA-A397-ACFABF690E9C}', 0),
('{CAD5408B-AB81-4445-BF3B-3B1BE2229536}', 'zubayer@gmail.com', '{7D42D76F-3EE9-43CE-B2F9-A63051D028E3}', 0),
('{E2377C13-3040-4DF3-B858-CFE5774761FE}', 'alamin@gmail.com', '{F33491F4-516A-40B3-8D03-557F9A244D1E}', 33);

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
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `ID` varchar(40) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`ID`, `Name`) VALUES
('{1BFE76DB-C2AA-4FAA-A23B-F43E6150A2F6}', 'Section Officer'),
('{2E024DF5-BD45-4EF2-A5E3-43BCA3E9777F}', 'Pro-vice Chancellor'),
('{64D25DDA-16B6-47B8-BBFC-4E2AAF5680C7}', 'Assistant Professor'),
('{7CDA1F32-A2F8-4469-B5A8-C2038FCE1F9A}', 'Lecturer'),
('{818DE12F-60CC-42E4-BAEC-48EAAED65179}', 'Dean of School'),
('{928EE9FF-E02D-470F-9A6A-AD0EB38B848F}', 'Vice Chancellor'),
('{92FDDA3F-1E91-4AA3-918F-EB595F85790C}', 'Daywise Worker'),
('{932CB0EE-76C2-448E-A40E-2D167EECC479}', 'Registrar'),
('{ADA027D3-21C1-47AF-A21D-759CAFCFE58D}', 'Assistant Registrar'),
('{B76EB035-EA26-4CEB-B029-1C6129574D98}', 'Librarian'),
('{B78C7A7B-4D38-4025-8170-7B8C9F291946}', 'Head of Discipline'),
('{C27B6BCF-FB83-4F3D-85CA-B7870D8B12D0}', 'Associate Professor'),
('{EB4880E2-01B3-4C6E-A2C9-89B6E5427C0A}', 'Professor');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pms_link_project`
--
ALTER TABLE `pms_link_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `pms_project`
--
ALTER TABLE `pms_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `year_id` (`year_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `discipline_id` (`discipline_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `pms_student_project`
--
ALTER TABLE `pms_student_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `project_id` (`project_id`);

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
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`ID`);

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
-- Constraints for table `pms_link_project`
--
ALTER TABLE `pms_link_project`
  ADD CONSTRAINT `pms_link_project_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `pms_project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pms_project`
--
ALTER TABLE `pms_project`
  ADD CONSTRAINT `pms_project_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pms_project_ibfk_2` FOREIGN KEY (`term_id`) REFERENCES `tbl_term` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pms_project_ibfk_3` FOREIGN KEY (`year_id`) REFERENCES `tbl_year` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pms_project_ibfk_4` FOREIGN KEY (`discipline_id`) REFERENCES `tbl_discipline` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pms_project_ibfk_5` FOREIGN KEY (`teacher_id`) REFERENCES `tbl_user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pms_student_project`
--
ALTER TABLE `pms_student_project`
  ADD CONSTRAINT `pms_student_project_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `tbl_user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pms_student_project_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `pms_project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

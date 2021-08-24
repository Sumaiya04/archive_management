-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2017 at 03:59 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `based`
--

-- --------------------------------------------------------

--
-- Table structure for table `ams_asset`
--

DROP TABLE IF EXISTS `ams_asset`;
CREATE TABLE IF NOT EXISTS `ams_asset` (
  `id` varchar(40) NOT NULL,
  `type_id` int(11) NOT NULL,
  `serialNo` varchar(256) NOT NULL,
  `modelNo` varchar(256) NOT NULL,
  `brand` varchar(256) NOT NULL,
  `purchaseDate` date NOT NULL,
  `status` varchar(256) NOT NULL,
  `configuration` text NOT NULL,
  `stuff_id` varchar(40) NOT NULL,
  `purchasedFrom` varchar(256) NOT NULL,
  `cost` double NOT NULL,
  `warrantyLimit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_asset`
--

INSERT INTO `ams_asset` (`id`, `type_id`, `serialNo`, `modelNo`, `brand`, `purchaseDate`, `status`, `configuration`, `stuff_id`, `purchasedFrom`, `cost`, `warrantyLimit`) VALUES
('{3EAF698D-2FC9-4F07-8C9C-0F0D778EECBE}', 3, 'c101', 'GKU97', 'uhl', '2017-12-31', 'Working', 'sadhk', 'test@test.com', 'asd', 21, '2018-12-31'),
('{4AA59D87-B0CC-4229-80A8-E35430DEF68D}', 6, 'r101', 'FEU89', 'TP-Link', '2016-12-31', 'Damaged', 'Configuration', 'test@test.com', 'New Tech', 1300, '2017-12-31'),
('{60587C04-FDD2-47EB-96BD-40C2C108F509}', 4, 'm101', 'wqwe', 'dasd', '2017-11-01', 'On Repair', 'asd', 'test@test.com', 'sad', 4, '2017-11-02'),
('{BBA16347-A695-4CAC-A918-336B382596C4}', 1, 't101', 'a', 'q', '2017-11-01', 'On Repair', 'sda', 'test@test.com', 'awds', 2, '2017-11-02'),
('{DF6F512E-62DF-4142-B758-6EFA68F9E3BF}', 1, 'l102', '89OIJND', 'Dell', '2016-12-31', 'Working', 'Configuration', 'test@test.com', 'Shop', 60000, '2017-08-01'),
('{E50C8FEC-D088-4BAD-BF0E-6CC98378C368}', 1, 'l101', '213DWSA', 'ASUS', '2016-12-31', 'Working', 'Ram: 8GB \r\nProcessor: Intel Core i5 \r\nGeneration: 6th', 'test@test.com', 'Rayans', 70000, '2017-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `ams_asset_type`
--

CREATE TABLE `ams_asset_type` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_asset_type`
--

INSERT INTO `ams_asset_type` (`id`, `name`) VALUES
(1, 'Laptop'),
(3, 'CPU'),
(4, 'Monitor'),
(5, 'Projector'),
(6, 'Router');

-- --------------------------------------------------------

--
-- Table structure for table `ams_repair`
--

CREATE TABLE `ams_repair` (
  `id` varchar(40) NOT NULL,
  `asset_id` varchar(40) NOT NULL,
  `problem` text NOT NULL,
  `sendingDate` date NOT NULL,
  `receivingDate` date DEFAULT NULL,
  `status` varchar(256) DEFAULT NULL,
  `sent_by` varchar(40) NOT NULL,
  `received_by` varchar(40) DEFAULT NULL,
  `repaired_from` varchar(256) NOT NULL,
  `cost` double DEFAULT NULL,
  `onWarranty` tinyint(1) NOT NULL,
  `isReceived` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_repair`
--

INSERT INTO `ams_repair` (`id`, `asset_id`, `problem`, `sendingDate`, `receivingDate`, `status`, `sent_by`, `received_by`, `repaired_from`, `cost`, `onWarranty`, `isReceived`) VALUES
('{29009978-4607-482C-A1EA-4D839462DDCB}', '{BBA16347-A695-4CAC-A918-336B382596C4}', 'asds', '2018-01-01', '2017-12-01', 'Partially Repaired', 'test@test.com', 'test@test.com', 'Alu', 3, 0, 1),
('{61C0676A-03C2-41A0-81A2-720B0396CF31}', '{BBA16347-A695-4CAC-A918-336B382596C4}', 'klm', '2016-12-31', NULL, NULL, 'test@test.com', NULL, 'asd', NULL, 1, 0),
('{79A79983-1481-47DE-8C0F-3AEE1E3B0C07}', '{4AA59D87-B0CC-4229-80A8-E35430DEF68D}', 'dawd', '2019-12-31', '2017-01-31', 'Not Repaired', 'test@test.com', 'test@test.com', 'sdasd', 2, 0, 1),
('{9D4B2838-6CC6-46C7-87EE-4A01DB495A6B}', '{E50C8FEC-D088-4BAD-BF0E-6CC98378C368}', 'LLII', '2018-12-31', '2019-12-01', 'Partially Repaired', 'test@test.com', 'test@test.com', 'Alu', 5, 0, 1),
('{DE303E22-31B5-4B2D-8BE4-2FF7FDA1EA48}', '{DF6F512E-62DF-4142-B758-6EFA68F9E3BF}', 'Shutdown Problem', '2016-12-01', '2017-12-01', 'Repaired', 'test@test.com', 'test@test.com', 'Alu', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ams_user_asset`
--

CREATE TABLE `ams_user_asset` (
  `id` varchar(40) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `asset_id` varchar(40) NOT NULL,
  `lendingDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ems_email`
--

CREATE TABLE `ems_email` (
  `id` varchar(40) NOT NULL,
  `firstName` varchar(256) NOT NULL,
  `lastName` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `contact` varchar(256) NOT NULL,
  `contactEmail` varchar(256) NOT NULL,
  `address` text NOT NULL,
  `created_at` date NOT NULL,
  `expire_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ems_email`
--

INSERT INTO `ems_email` (`id`, `firstName`, `lastName`, `email`, `contact`, `contactEmail`, `address`, `created_at`, `expire_at`) VALUES
('{0534126C-2AAD-4241-8E0C-3EEADE5EFDAE}', 'Pranta', 'Protik', 'nlowe@gmail.com', '0100000009', 'pranta@gmail.com', 'dasd', '2016-12-31', '2017-12-31'),
('{6D1BBB6B-B812-4EC6-8CBD-8C080A8800C3}', 'Abu', 'sayed', 'abu1520@cseku.ac.bd', '0100000009', 'sayed@gmail.com', 'sada', '2018-12-31', '2017-10-25'),
('{90EAC518-9EDF-4C04-ADE0-7C1CD6BF0AC6}', 'Pranta', 'Protik', 'pranta.cse@gmail.com', '0100000009', 'pranta@gmail.com', 'Kasd', '2017-12-31', '2016-12-31'),
('{0258FDCA-5DF7-477A-9DE1-A1EBADFD63AB}','Nakshi','Saha','nakshisaha@gmail.com','01521337861','nakshisaha@gmail.com','asj af jekk khg','2021-08-20','2021-09-11'),
('{0E80FF70-9D35-4E40-90F4-9A6C1A12C12C}','Sumaiya','Tasnim','sumaiya1704@cseku.ac.bd','01521337861','sumaiya1704@cseku.ac.bd','aghj shjk shj','2021-08-23','2021-08-28');

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
  `pdf_link` text,
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

INSERT INTO `pms_project` (`id`, `thumbnail`, `title`, `description`,`pdf_link`, `language`, `year_id`, `term_id`, `course_id`, `discipline_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
('{0C262E4E-80F5-436-AF8C-48FA39EAE4C0}', './resources/img/thumbnails/Transport Management System.png', 'Transport Management System', '"Create vehicles as assets. Assign drivers, helpers to bus along with their contact information. \r\n\r\nCreate routes and the stopage along with the google map options \r\n\r\nAdd more features to it, be creative"','', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-10-10 15:12:20', '2017-10-10 15:12:20'),
('{0C262E4E-80F5-4367-AF8C-48FA39EAE4C0}', './resources/img/thumbnails/Transport Management System.png', 'Transport Management System', '"Create vehicles as assets. Assign drivers, helpers to bus along with their contact information. \r\n\r\nCreate routes and the stopage along with the google map options \r\n\r\nAdd more features to it, be creative"','', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-08-28 10:35:47', '2017-08-28 10:35:47'),
('{0C262E4E-80F5-437-AF8C-48FA39EAE4C0}', './resources/img/thumbnails/Transport Management System.png', 'Transport Management System', '"Create vehicles as assets. Assign drivers, helpers to bus along with their contact information. \r\n\r\nCreate routes and the stopage along with the google map options \r\n\r\nAdd more features to it, be creative"','', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-10-10 15:11:48', '2017-10-10 15:11:48'),
('{0C62E4E-80F5-4367-AF8C-48FA39EAE4C0}', './resources/img/thumbnails/Transport Management System.png', 'Transport Management System', '"Create vehicles as assets. Assign drivers, helpers to bus along with their contact information. \r\n\r\nCreate routes and the stopage along with the google map options \r\n\r\nAdd more features to it, be creative"','', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-10-10 15:12:14', '2017-10-10 15:12:14'),
('{66B187F3-123B-46C7-A2DB-84C26C40DCBB}', './resources/img/thumbnails/Improved CSE Discipline website (OOP).png', 'Improved CSE Discipline website (OOP)', '"refresh current website with the given template. \r\n\r\none group work with the new templating. \r\n\r\nOther group work with the admin part for the current database"','', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-08-28 08:09:20', '2017-10-11 19:54:45'),
('{6F28DF7E-D7D4-4305-B116-D7466C8CDE03}', './resources/img/thumbnails/Meal Management.png', 'Meal Management', 'dsf','', 'PHP', '2', '{298E9628-8DE2-4742-8F93-0491C01BB152}', '2', '{AF41CC9F-3BCD-4952-9D02-17184CC40C79}', 'teacher@gmail.com', '2017-10-12 05:36:43', '2017-10-12 05:36:43'),
('{7D42D76F-3EE9-43CE-B2F9-A63051D028E3}', './resources/img/thumbnails/Improved file-folder management system..png', 'Improved file-folder management system.', '"improve the available SimTire file folder system, File allocation, file versioning, file relation should be present\r\n\r\nCreate a beatiful file browsing system"','', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-08-28 10:09:17', '2017-08-28 10:09:17'),
('{7D42DF-3EE9-43CE-B2F9-A63051D028E3}', './resources/img/thumbnails/Improved file-folder management system..png', 'Improved file-folder management system.', '"improve the available SimTire file folder system, File allocation, file versioning, file relation should be present\r\n\r\nCreate a beatiful file browsing system"','', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-10-10 15:12:01', '2017-10-10 15:12:01'),
('{A5298EE6-822A-4ABF-981D-825CE0FE189B}', './resources/img/thumbnails/Meal Management.png', 'Meal Management', '"Meal system where you create meal at different times of the day, create menu, cost, SimTire user can subscribe and unsuscribe and pay for the meal to consume it\r\n\r\nIdeally it should be related to the housing. So a meal would created on a housing and consumed from there\r\n\r\nDaily, weekly, monthly consumption report, most likely menus, ranking of the meal should be also present"','', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-08-28 10:08:43', '2017-10-13 04:52:12'),
('{A94A0ABA-1AFA-461E-A09D-808A4FB8B522}', './resources/img/thumbnails/Payment Management System.png', 'Payment Management System', '"First of all user can load his account with money. This is just dummy money\r\n\r\nPayment can be done by SimTire user related to different things may be medical bill, library fine, buying stuffs from canteen.\r\n\r\nThere will be a store of items and their price will be there. User can buy things from that store and pay using their balance from the account. \r\n\r\nFor buying something (e.g. book) from the store user will get credit and later credit can be converted to a balance using some forumla."','', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-08-28 10:11:12', '2017-08-28 10:11:12'),
('{CEC76C2B-FA03-4B33-AB9A-B523B7334145}', './resources/img/thumbnails/Improved advanced event calendar.png', 'Improved advanced event calendar', '"apply SimTire on the available event calendar code and new features to it\r\n\r\nVarious types of searching"','', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-08-28 10:06:10', '2017-09-14 06:27:31'),
('{D283BD24-F48F-45FA-A397-ACFABF690E9C}', './resources/img/thumbnails/Project Archieve.png', 'Project Archieve', '"improve current project module to SimTire based project. Project should also inclue member names and their partnership in the project\r\n\r\nA front page for the project module where all the projects along with their thumnail pictures and title are shown using pagination. You select one project and you can see the details of the project and the members of the project. Also, the partneship of project if applicable\r\n\r\nPersone wise project lists should also be there"','', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-08-28 10:10:39', '2017-08-28 10:10:39'),
('{E0DDFBEC-EB89-472D-9802-03E322A59281}', './resources/img/thumbnails/Library Management.png', 'Library Management', 'create library, create books, create shelfs, assing book to shelfs to a specific library, search books different ways, student can take books and return bookscreate library, create books, create shelfs, assing book to shelfs to a specific library, search books different ways, student can take books and return bookscreate library, create books, create shelfs, assing book to shelfs to a specific library, search books different ways, student can take books and return books','', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-08-28 10:09:46', '2017-09-12 06:00:55'),
('{F33491F4-516A-40B3-8D03-557F9A244D1E}', './resources/img/thumbnails/Student Hall Dorm Teacher Staff housing Management.png', 'Student Hall Dorm Teacher Staff housing Management', '"CRUD of hall/dorm/teacher/staff housing, every hall/others will have rooms, each room will have seats. a student will be selected from the SimTire user and will be assigned to a seat\r\nVarious types of searching "','', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-08-28 10:07:55', '2017-10-11 20:13:08'),
('{FB511786-370C-4AA9-9686-59EA7C8D1B2B}', './resources/img/thumbnails/Medical Service Management.ico', 'Medical Service Management', '"create doctors, nurse, medicine stock, university people assigned to doctor, doctor see patient, write prescriptions, and medicine \r\nthen medicine is given to a person and stock gets updated"','', 'PHP', '3', '{22EDE2D2-D36C-4160-9D2A-80184B8AD35B}', '5', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', 'teacher@gmail.com', '2017-08-28 10:10:17', '2017-08-28 10:10:17');

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
-- Table structure for table `tms_publication`
--

DROP TABLE IF EXISTS `tms_publication`;
CREATE TABLE IF NOT EXISTS `tms_publication` (
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
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `year_id` (`year_id`),
  KEY `term_id` (`term_id`),
  KEY `course_id` (`course_id`),
  KEY `discipline_id` (`discipline_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_publication`
--

INSERT INTO `tms_publication` (`id`, `thumbnail`, `title`, `pdf_link`, `description`, `year_id`, `term_id`, `course_id`, `discipline_id`, `created_at`, `updated_at`) VALUES
('{37CFB680-82C8-432C-9E44-D7932BA740F7}', './resources/img/thumbnails/pay.jpg', 'pay', './resources/pdf/report/pay.pdf', 'library', '{EA335D18-A1A8-4D15-9C7B-4A4700AD4543}', '{AF8B217E-4E76-41B8-A02A-7115BD4A6BE6}', '{B17BDB32-6D88-4537-9545-65D940E17EEF}', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', '2019-10-25 02:29:17', '2019-10-25 02:29:17'),
('{68A66F13-46EB-450C-8BBB-EA7958CDDA8E}', './resources/img/thumbnails/Artificial Intelligence Basics.jpg', 'Artificial Intelligence Basics', '', 'fnjfjfjk', '{6780C884-E112-4F58-9503-E2110B615547}', '{6DE3CF58-3A1A-4D6A-88CF-83F22C27E0BA}', '{1CD0842E-9FCF-4F58-BB6B-FB7E7B73E664}', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', '2019-10-09 18:16:01', '2019-10-09 18:16:01'),
('{EECB2809-4270-443A-8F30-86260966CB8F}', './resources/img/thumbnails/Image Processing.png', 'Image Processing', '', 'ndjdfjdfjkdfj', '{1FAC0F1A-9D60-43F6-AB07-C933D5A4AA30}', '{6DE3CF58-3A1A-4D6A-88CF-83F22C27E0BA}', '{53650FB7-D76E-459D-8B56-BC7A4919C0F6}', '{FFDB1CB8-AF34-4381-8971-9784DCB516C5}', '2019-10-09 18:15:13', '2019-10-09 18:15:13');
-- -----------------------------------------

--
-- Table structure for table `tms_link_publication`
--

DROP TABLE IF EXISTS `tms_link_publication`;
CREATE TABLE IF NOT EXISTS `tms_link_publication` (
  `id` varchar(40) NOT NULL,
  `link` text NOT NULL,
  `publication_id` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `publication_id` (`publication_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tms_student_publication`
--

DROP TABLE IF EXISTS `tms_student_publication`;
CREATE TABLE IF NOT EXISTS `tms_student_publication` (
  `id` varchar(40) NOT NULL,
  `student_id` varchar(40) NOT NULL,
  `publication_id` varchar(40) NOT NULL,
  `contribution` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `publication_id` (`publication_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tms_supervisor_publication`
--

DROP TABLE IF EXISTS `tms_supervisor_publication`;
CREATE TABLE IF NOT EXISTS `tms_supervisor_publication` (
  `id` varchar(40) NOT NULL,
  `supervisor_id` varchar(40) NOT NULL,
  `publication_id` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `supervisor_id` (`supervisor_id`),
  KEY `publication_id` (`publication_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `tbl_discussion`
--

CREATE TABLE `tbl_discussion` (
  `ID` varchar(40) NOT NULL,
  `Title` varchar(150) NOT NULL,
  `CategoryID` varchar(40) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Tag` varchar(200) NOT NULL,
  `CreationDate` datetime NOT NULL,
  `CreatorID` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_discussion`
--

INSERT INTO `tbl_discussion` (`ID`, `Title`, `CategoryID`, `Description`, `Tag`, `CreationDate`, `CreatorID`) VALUES
('{C9FB74F8-8341-4706-BE40-93BFDC3444D0}', 'what is oop', '{3D212234-2F34-4AB0-83EF-1A772068403B}', 'describe oop', 'oop', '2017-04-29 00:00:00', 'mkazi078@uottawa.ca'),
('{DA408BD0-9C9E-46F6-8CF2-00A631B06A26}', 'what is c#', '{44CAEE8D-A9D7-48C8-A2EA-A7463E00FCD6}', 'this is c#', 'oop', '2017-04-29 00:00:00', 'mkazi078@uottawa.ca');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discussion_category`
--

CREATE TABLE `tbl_discussion_category` (
  `ID` varchar(40) NOT NULL,
  `Name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_discussion_category`
--

INSERT INTO `tbl_discussion_category` (`ID`, `Name`) VALUES
('{3D212234-2F34-4AB0-83EF-1A772068403B}', 'java'),
('{44CAEE8D-A9D7-48C8-A2EA-A7463E00FCD6}', 'c#'),
('{974DE90C-BCAC-4FA3-8B9B-518A3CE6834A}', 'programming contest');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discussion_comment`
--

CREATE TABLE `tbl_discussion_comment` (
  `CommentID` varchar(50) NOT NULL,
  `DiscussionID` varchar(40) NOT NULL,
  `Comment` varchar(300) NOT NULL,
  `CreatorID` varchar(40) NOT NULL,
  `CommentTime` datetime NOT NULL,
  `CommentIDTop` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_discussion_comment`
--

INSERT INTO `tbl_discussion_comment` (`CommentID`, `DiscussionID`, `Comment`, `CreatorID`, `CommentTime`, `CommentIDTop`) VALUES
('{00AADED4-6799-4F2C-BECB-ED50F7B03DDE}', '{C9FB74F8-8341-4706-BE40-93BFDC3444D0}', 'new comment', 'mkazi078@uottawa.ca', '2017-06-26 19:18:08', NULL),
('{1634B01B-5F82-43EF-96F8-E6149F488424}', '{C9FB74F8-8341-4706-BE40-93BFDC3444D0}', 'it is PIE', 'mkazi078@uottawa.ca', '0000-00-00 00:00:00', NULL),
('{550A15FC-06B8-43DF-83EE-097E35920170}', '{C9FB74F8-8341-4706-BE40-93BFDC3444D0}', 'little difficult', 'mohidul@gmail.com', '0000-00-00 00:00:00', NULL),
('{A15517C2-883F-4E5E-B0AC-9A1DB556741F}', '{C9FB74F8-8341-4706-BE40-93BFDC3444D0}', 'Polymorphism, inheritence, encapsulation', 'mkazi078@uottawa.ca', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission`
--

CREATE TABLE `tbl_permission` (
  `ID` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permission`
--

INSERT INTO `tbl_permission` (`ID`, `Name`, `Category`) VALUES
('ASSET_C', 'ASSET_C', 'ASSET'),
('ASSET_D', 'ASSET_D', 'ASSET'),
('ASSET_R', 'ASSET_R', 'ASSET'),
('ASSET_U', 'ASSET_U', 'ASSET'),
('COURSE_C', 'COURSE_C', 'COURSE'),
('COURSE_D', 'COURSE_D', 'COURSE'),
('COURSE_R', 'COURSE_R', 'COURSE'),
('COURSE_U', 'COURSE_U', 'COURSE'),
('DISCIPLINE_C', 'DISCIPLINE_C', 'DISCIPLINE'),
('DISCIPLINE_D', 'DISCIPLINE_D', 'DISCIPLINE'),
('DISCIPLINE_R', 'DISCIPLINE_R', 'DISCIPLINE'),
('DISCIPLINE_U', 'DISCIPLINE_U', 'DISCIPLINE'),
('DISCUSSION_C', 'DISCUSSION_C', 'DISCUSSION'),
('DISCUSSION_CAT_C', 'DISCUSSION_CAT_C', 'DISCUSSION CATEGORY'),
('DISCUSSION_CAT_D', 'DISCUSSION_CAT_D', 'DISCUSSION CATEGORY'),
('DISCUSSION_CAT_R', 'DISCUSSION_CAT_R', 'DISCUSSION CATEGORY'),
('DISCUSSION_CAT_U', 'DISCUSSION_CAT_U', 'DISCUSSION CATEGORY'),
('DISCUSSION_COMMENT_C', 'DISCUSSION_COMMENT_C', 'DISCUSSION COMMENT'),
('DISCUSSION_COMMENT_D', 'DISCUSSION_COMMENT_D', 'DISCUSSION COMMENT'),
('DISCUSSION_COMMENT_R', 'DISCUSSION_COMMENT_R', 'DISCUSSION COMMENT'),
('DISCUSSION_COMMENT_U', 'DISCUSSION_COMMENT_U', 'DISCUSSION COMMENT'),
('DISCUSSION_D', 'DISCUSSION_D', 'DISCUSSION'),
('DISCUSSION_R', 'DISCUSSION_R', 'DISCUSSION'),
('DISCUSSION_U', 'DISCUSSION_U', 'DISCUSSION'),
('EMAIL_C', 'EMAIL_C', 'EMAIL'),
('EMAIL_D', 'EMAIL_D', 'EMAIL'),
('EMAIL_R', 'EMAIL_R', 'EMAIL'),
('EMAIL_U', 'EMAIL_U', 'EMAIL'),
('HALL_C', 'HALL_C', 'HALL'),
('HALL_D', 'HALL_D', 'HALL'),
('HALL_R', 'HALL_R', 'HALL'),
('HALL_U', 'HALL_U', 'HALL'),
('ORGANISATION_C', 'ORGANISATION_C', 'ORGANISATION'),
('ORGANISATION_D', 'ORGANISATION_D', 'ORGANISATION'),
('ORGANISATION_R', 'ORGANISATION_R', 'ORGANISATION'),
('ORGANISATION_U', 'ORGANISATION_U', 'ORGANISATION'),
('PERMISSION_C', 'PERMISSION_C', 'PERMISSION'),
('PERMISSION_D', 'PERMISSION_D', 'PERMISSION'),
('PERMISSION_R', 'PERMISSION_R', 'PERMISSION'),
('PERMISSION_U', 'PERMISSION_U', 'PERMISSION'),
('POSITION_C', 'POSITION_C', 'POSITION'),
('POSITION_D', 'POSITION_D', 'POSITION'),
('POSITION_R', 'POSITION_R', 'POSITION'),
('POSITION_U', 'POSITION_U', 'POSITION'),
('PROJECT_C', 'PROJECT_C', 'PROJECT'),
('PROJECT_D', 'PROJECT_D', 'PROJECT'),
('PROJECT_R', 'PROJECT_R', 'PROJECT'),
('PROJECT_U', 'PROJECT_U', 'PROJECT'),
('PUBLICATION_C', 'PUBLICATION_C', 'PUBLICATION'),
('PUBLICATION_D', 'PUBLICATION_D', 'PUBLICATION'),
('PUBLICATION_R', 'PUBLICATION_R', 'PUBLICATION'),
('PUBLICATION_U', 'PUBLICATION_U', 'PUBLICATION'),
('ROLE_C', 'ROLE_C', 'ROLE'),
('ROLE_D', 'ROLE_D', 'ROLE'),
('ROLE_R', 'ROLE_R', 'ROLE'),
('ROLE_U', 'ROLE_U', 'ROLE'),
('SCHOOL_C', 'SCHOOL_C', 'SCHOOL'),
('SCHOOL_D', 'SCHOOL_D', 'SCHOOL'),
('SCHOOL_R', 'SCHOOL_R', 'SCHOOL'),
('SCHOOL_U', 'SCHOOL_U', 'SCHOOL'),
('TERM_C', 'TERM_C', 'TERM'),
('TERM_D', 'TERM_D', 'TERM'),
('TERM_R', 'TERM_R', 'TERM'),
('TERM_U', 'TERM_U', 'TERM'),
('THESIS_C', 'THESIS_C', 'THESIS'),
('THESIS_D', 'THESIS_D', 'THESIS'),
('THESIS_R', 'THESIS_R', 'THESIS'),
('THESIS_U', 'THESIS_U', 'THESIS'),
('USER_C', 'USER_C', 'USER'),
('USER_D', 'USER_D', 'USER'),
('USER_R', 'USER_R', 'USER'),
('USER_U', 'USER_U', 'USER'),
('YEAR_C', 'YEAR_C', 'YEAR'),
('YEAR_D', 'YEAR_D', 'YEAR'),
('YEAR_R', 'YEAR_R', 'YEAR'),
('YEAR_U', 'YEAR_U', 'YEAR');

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
-- Table structure for table `tbl_role_permission`
--

CREATE TABLE `tbl_role_permission` (
  `Row` int(11) NOT NULL,
  `RoleID` varchar(40) NOT NULL,
  `PermissionID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role_permission`
--

INSERT INTO `tbl_role_permission` (`Row`, `RoleID`, `PermissionID`) VALUES
(1616, 'student', 'PROJECT_D'),
(1617, 'student', 'STUDENT_PROJECT_D'),
(1618, 'teacher', 'PROJECT_D'),
(1619, 'teacher', 'STUDENT_PROJECT_D'),
(1900, 'administrator', 'ASSET_C'),
(1901, 'administrator', 'ASSET_D'),
(1902, 'administrator', 'ASSET_R'),
(1903, 'administrator', 'ASSET_U'),
(1904, 'administrator', 'COURSE_C'),
(1905, 'administrator', 'COURSE_D'),
(1906, 'administrator', 'COURSE_R'),
(1907, 'administrator', 'COURSE_U'),
(1908, 'administrator', 'DISCIPLINE_C'),
(1909, 'administrator', 'DISCIPLINE_D'),
(1910, 'administrator', 'DISCIPLINE_R'),
(1911, 'administrator', 'DISCIPLINE_U'),
(1912, 'administrator', 'DISCUSSION_C'),
(1913, 'administrator', 'DISCUSSION_D'),
(1914, 'administrator', 'DISCUSSION_R'),
(1915, 'administrator', 'DISCUSSION_U'),
(1916, 'administrator', 'DISCUSSION_CAT_C'),
(1917, 'administrator', 'DISCUSSION_CAT_D'),
(1918, 'administrator', 'DISCUSSION_CAT_R'),
(1919, 'administrator', 'DISCUSSION_CAT_U'),
(1920, 'administrator', 'DISCUSSION_COMMENT_C'),
(1921, 'administrator', 'DISCUSSION_COMMENT_D'),
(1922, 'administrator', 'DISCUSSION_COMMENT_R'),
(1923, 'administrator', 'DISCUSSION_COMMENT_U'),
(1924, 'administrator', 'EMAIL_C'),
(1925, 'administrator', 'EMAIL_D'),
(1926, 'administrator', 'EMAIL_R'),
(1927, 'administrator', 'EMAIL_U'),
(1928, 'administrator', 'PERMISSION_C'),
(1929, 'administrator', 'PERMISSION_D'),
(1930, 'administrator', 'PERMISSION_R'),
(1931, 'administrator', 'PERMISSION_U'),
(1932, 'administrator', 'POSITION_C'),
(1933, 'administrator', 'POSITION_D'),
(1934, 'administrator', 'POSITION_R'),
(1935, 'administrator', 'POSITION_U'),
(1936, 'administrator', 'PROJECT_C'),
(1937, 'administrator', 'PROJECT_D'),
(1938, 'administrator', 'PROJECT_R'),
(1939, 'administrator', 'PROJECT_U'),
(1940, 'administrator', 'ROLE_C'),
(1941, 'administrator', 'ROLE_D'),
(1942, 'administrator', 'ROLE_R'),
(1943, 'administrator', 'ROLE_U'),
(1944, 'administrator', 'SCHOOL_C'),
(1945, 'administrator', 'SCHOOL_D'),
(1946, 'administrator', 'SCHOOL_R'),
(1947, 'administrator', 'SCHOOL_U'),
(1948, 'administrator', 'TERM_C'),
(1949, 'administrator', 'TERM_D'),
(1950, 'administrator', 'TERM_R'),
(1951, 'administrator', 'TERM_U'),
(1952, 'administrator', 'THESIS_C'),
(1953, 'administrator', 'THESIS_D'),
(1954, 'administrator', 'THESIS_R'),
(1955, 'administrator', 'THESIS_U'),
(1956, 'administrator', 'USER_C'),
(1957, 'administrator', 'USER_D'),
(1958, 'administrator', 'USER_R'),
(1959, 'administrator', 'USER_U'),
(1960, 'administrator', 'YEAR_C'),
(1961, 'administrator', 'YEAR_D'),
(1962, 'administrator', 'YEAR_R'),
(1963, 'administrator', 'YEAR_U'),
(1964, 'administrator', 'ORGANISATION_C'),
(1965, 'administrator', 'ORGANISATION_D'),
(1966, 'administrator', 'ORGANISATION_R'),
(1967, 'administrator', 'ORGANISATION_U'),
(1968, 'administrator', 'PUBLICATION_C'),
(1969, 'administrator', 'PUBLICATION_D'),
(1970, 'administrator', 'PUBLICATION_R'),
(1971, 'administrator', 'PUBLICATION_U');

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
-- Table structure for table `tbl_user_details`
--

CREATE TABLE `tbl_user_details` (
  `ID` varchar(40) NOT NULL,
  `Image` text,
  `FatherName` varchar(100) DEFAULT NULL,
  `MotherName` varchar(100) DEFAULT NULL,
  `PermanentAddress` varchar(200) DEFAULT NULL,
  `HomePhone` varchar(20) DEFAULT NULL,
  `CurrentAddress` varchar(200) DEFAULT NULL,
  `MobilePhone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_details`
--

INSERT INTO `tbl_user_details` (`ID`, `Image`, `FatherName`, `MotherName`, `PermanentAddress`, `HomePhone`, `CurrentAddress`, `MobilePhone`) VALUES
('abid@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL),
('alamin@gmail.com', './resources/img/profile/alamin@gmail.com.jpg', 'Al', 'Amin', 'Gopalgonj', '017123425221', 'Khulna', '01937582953 '),
('anik@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL),
('azoadahnaf@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL),
('dean@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL),
('durjoy@gmail.com', '', 'Father', 'Mother', 'Address', 'Phome', 'Address', '012432342543 '),
('imran@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL),
('pranta.cse@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL),
('ratul@gamil.com', '', NULL, NULL, NULL, NULL, NULL, NULL),
('sakeef@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL),
('sayed@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL),
('shahidul@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL),
('shuvo@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL),
('sudipto@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL),
('swajon@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL),
('tanmai@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL),
('teacher@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL),
('test@test.com', './resources/img/profile/test@test.com.jpg', 'My father', 'My mother', 'My address', '04100000', 'Same', '0171100000 '),
('zubayer@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_discipline`
--

CREATE TABLE `tbl_user_discipline` (
  `UserID` varchar(40) NOT NULL,
  `DisciplineID` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_position`
--

CREATE TABLE `tbl_user_position` (
  `ID` int(11) NOT NULL,
  `UserID` varchar(40) NOT NULL,
  `PositionID` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_position`
--

INSERT INTO `tbl_user_position` (`ID`, `UserID`, `PositionID`) VALUES
(4, '{693F944F-328D-433A-9F94-459D92841645}', '{EB4880E2-01B3-4C6E-A2C9-89B6E5427C0A}'),
(14, '{E0F0AE1A-AECF-46C1-A148-4485036F3CCF}', '{EB4880E2-01B3-4C6E-A2C9-89B6E5427C0A}'),
(16, '{A4F96981-F014-46F6-BB93-87500C3CBB03}', '{7CDA1F32-A2F8-4469-B5A8-C2038FCE1F9A}'),
(17, '{0B2F4F89-2048-4504-AB17-0412CC624A05}', '{64D25DDA-16B6-47B8-BBFC-4E2AAF5680C7}'),
(19, '{8104FB4F-8E63-489D-8D90-DB45A9A2327B}', '{64D25DDA-16B6-47B8-BBFC-4E2AAF5680C7}'),
(21, '{8B24B76D-9969-4F71-ABC4-6EE59355C686}', '{64D25DDA-16B6-47B8-BBFC-4E2AAF5680C7}'),
(24, '{9E2E6363-A0FF-4C0F-B58F-D162725FB702}', '{C27B6BCF-FB83-4F3D-85CA-B7870D8B12D0}'),
(30, 'mohidul@gmail.com', '{64D25DDA-16B6-47B8-BBFC-4E2AAF5680C7}'),
(37, 'mkazi078@uottawa.ca', '{64D25DDA-16B6-47B8-BBFC-4E2AAF5680C7}'),
(38, 'dean@gmail.com', '{818DE12F-60CC-42E4-BAEC-48EAAED65179}'),
(39, 'teacher@gmail.com', '{EB4880E2-01B3-4C6E-A2C9-89B6E5427C0A}');

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
-- Table structure for table `oms_organisation`
--

CREATE TABLE `oms_organisation` (
  `id` varchar(40) NOT NULL,
  `logo` text NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `motto` varchar(256) NOT NULL,
  `link_add` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oms_organisation`
--

INSERT INTO `oms_organisation`(`id`, `logo`, `name`, `description`, `motto`, `link_add`, `created_at`, `updated_at`) VALUES 
('{ED888ACF-B94D-4A2B-86BA-816518E6DB24}','./resources/img/thumbnails/Badhon.jpg','Badhon','It is a blood donating organisation','We serve for the humanity','https://www.facebook.com/mdmasudrana749','2021-08-23 00:51:04','2021-08-23 00:51:0'),
('{FEA3569D-FD73-4BC9-A3FD-65F9944CEF51}','./resources/img/thumbnails/Noiyaeek.jpg','Noiyaeek','It is a debating org','we think from the logic','https://web.facebook.com/groups/49093787849','2021-08-23 00:56:17','2021-08-23 00:58:4'),
('{E68F8AC5-B008-4C42-805C-1385DED40495}','./resources/img/thumbnails/Chayabritto.jpg','Chayabritto','It is a free educational organisation for underprivileged children','We serve for the unprivileged.','https://www.facebook.com/Chhayabritto','2021-08-23 13:29:22','2021-08-23 13:29:22');

--
-- Table structure for table `tbl_blood`
--

CREATE TABLE `tbl_blood` (
  `ID` varchar(40) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blood`
--

INSERT INTO `tbl_blood` (`ID`, `Name`) VALUES
('1', 'A+'),
('2', 'A-'),
('3', 'B+'),
('4', 'B-'),
('5', 'O+'),
('6', 'O-'),
('7', 'AB+'),
('8', 'AB-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `ID` varchar(40) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blood`
--

INSERT INTO `tbl_post` (`ID`, `Name`) VALUES
('1', 'President'),
('2', 'Vice President'),
('3', 'Manager'),
('4', 'Executive member'),
('5', 'Ambassador'),
('6', 'Program Manager'),
('7', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `pms_member`
--

CREATE TABLE `pms_member` (
  `id` varchar(40) NOT NULL,
  `photo` text NOT NULL,
  `name` varchar(256) NOT NULL,
  `address` text NOT NULL,
  `year_id` varchar(40) NOT NULL,
  `blood_id` varchar(40) NOT NULL,
  `post_id` varchar(40) NOT NULL,
  `discipline_id` varchar(40) NOT NULL,
  `organisation_id` varchar(40) NOT NULL,
  `contact` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_member`
--

INSERT INTO `pms_member`(`id`, `photo`, `name`, `address`, `year_id`, `blood_id`, `post_id`, `discipline_id`, `organisation_id`, `contact`) VALUES  
('{7C5D1381-E61C-41F9-BD7F-F9E93D376178}','./resources/img/thumbnails/Sumaiya Tasnim.jpg','Sumaiya Tasnim','fg dyj arh d','4','5','7','{FFDB1CB8-AF34-4381-8971-9784DCB516C5}','{ED888ACF-B94D-4A2B-86BA-816518E6DB24}','01521337861'),
('{8C710968-2D10-43CE-895C-C4E2B58B32D5}','./resources/img/thumbnails/Nakshi Shaha.jpg','Nakshi Shaha','dfgh khu ghj','4','3','5','{FFDB1CB8-AF34-4381-8971-9784DCB516C5}','{FEA3569D-FD73-4BC9-A3FD-65F9944CEF51}','01521337861');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `ams_asset`
--
ALTER TABLE `ams_asset`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `serialNo` (`serialNo`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `user_id` (`stuff_id`);

--
-- Indexes for table `ams_asset_type`
--
ALTER TABLE `ams_asset_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ams_repair`
--
ALTER TABLE `ams_repair`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sent_by` (`sent_by`),
  ADD KEY `received_by` (`received_by`),
  ADD KEY `asset_id` (`asset_id`);

--
-- Indexes for table `ams_user_asset`
--
ALTER TABLE `ams_user_asset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `asset_id` (`asset_id`);

--
-- Indexes for table `ems_email`
--
ALTER TABLE `ems_email`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `oms_organisation`
--
ALTER TABLE `oms_organisation`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_discussion`
--
ALTER TABLE `tbl_discussion`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_discussion_category`
--
ALTER TABLE `tbl_discussion_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_discussion_comment`
--
ALTER TABLE `tbl_discussion_comment`
  ADD PRIMARY KEY (`CommentID`);

--
-- Indexes for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`ID`);

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
-- Indexes for table `tbl_role_permission`
--
ALTER TABLE `tbl_role_permission`
  ADD PRIMARY KEY (`Row`);

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
-- Indexes for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_user_position`
--
ALTER TABLE `tbl_user_position`
  ADD PRIMARY KEY (`ID`);

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
-- AUTO_INCREMENT for table `ams_asset_type`
--
ALTER TABLE `ams_asset_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_role_permission`
--
ALTER TABLE `tbl_role_permission`
  MODIFY `Row` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1964;
--
-- AUTO_INCREMENT for table `tbl_user_position`
--
ALTER TABLE `tbl_user_position`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ams_asset`
--
ALTER TABLE `ams_asset`
  ADD CONSTRAINT `ams_asset_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `ams_asset_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ams_asset_ibfk_2` FOREIGN KEY (`stuff_id`) REFERENCES `tbl_user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ams_repair`
--
ALTER TABLE `ams_repair`
  ADD CONSTRAINT `ams_repair_ibfk_1` FOREIGN KEY (`asset_id`) REFERENCES `ams_asset` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ams_repair_ibfk_2` FOREIGN KEY (`sent_by`) REFERENCES `tbl_user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ams_repair_ibfk_3` FOREIGN KEY (`received_by`) REFERENCES `tbl_user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ams_user_asset`
--
ALTER TABLE `ams_user_asset`
  ADD CONSTRAINT `ams_user_asset_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ams_user_asset_ibfk_2` FOREIGN KEY (`asset_id`) REFERENCES `ams_asset` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

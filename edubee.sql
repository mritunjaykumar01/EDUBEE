-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2016 at 10:22 AM
-- Server version: 5.6.29
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edubee`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `id` int(25) NOT NULL,
  `sectionName` varchar(255) DEFAULT NULL,
  `courseId` varchar(25) DEFAULT NULL,
  `assignName` varchar(255) DEFAULT NULL,
  `question` text,
  `SIFile` varchar(300) DEFAULT NULL,
  `SOFile` varchar(300) DEFAULT NULL,
  `language` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `sectionName`, `courseId`, `assignName`, `question`, `SIFile`, `SOFile`, `language`) VALUES
(3, 'test', 'abcd', 'first', 'question.txt', 'input.txt', 'output.txt', 'c'),
(4, 'More about C', 'CS101', 'Reverse number', 'question.txt', 'input.txt', 'output.txt', 'c'),
(5, 'More about C', 'CS101', 'Factorial', 'question.txt', 'input.txt', 'output.txt', 'c'),
(7, 'Minimum spanning tree', 'CS204', 'minimum spanning tree', 'question.txt', 'sampleInput.txt', 'sampleOutput.txt', 'java'),
(8, 'More about C', 'CS101', 'reverse a number', 'question.txt', 'input.txt', 'output.txt', 'c'),
(9, 'Intro', 'bittu', 'BASIC', 'q1.txt', 'input.txt', 'output.txt', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `full_name`, `email`, `subject`, `text`) VALUES
(1, 'Dnyaneshwar Shendurwadkar', 'dnysdk@gmail.com', 'test', 'This is for test'),
(2, 'Alan Aipe', 'imalanaipe@facebook.com', '1401CS50_Lab8', 'wlfwfjbfjksbdfjksbd'),
(3, 'Alan Aipe', 'imalanaipe@facebook.com', '1401CS50_Lab8', 'wlfwfjbfjksbdfjksbd'),
(4, 'Alan Aipe', 'imalanaipe@facebook.com', '1401CS50_Lab8', 'wlfwfjbfjksbdfjksbd'),
(5, 'Alan Aipe', 'imalanaipe@facebook.com', '1401CS50_Lab8', 'wlfwfjbfjksbdfjksbd'),
(6, 'Alan Aipe', 'imalanaipe@facebook.com', '1401CS50_Lab8', 'wlfwfjbfjksbdfjksbd'),
(7, 'Alan Aipe', 'imalanaipe@facebook.com', '1401CS50_Lab8', 'wlfwfjbfjksbdfjksbd'),
(8, 'Alan Aipe', 'imalanaipe@facebook.com', '1401CS50_Lab8', 'wlfwfjbfjksbdfjksbd'),
(9, 'sd', 'sdf@ds.com', 'sdf sdf', 'sdfsdfsd'),
(10, 'sadkand', 'klasnflka@jnsfjsn.com', 'nfwfnjn', 'sdfkweanfjnj'),
(11, 'sadkand', 'klasnflka@jnsfjsn.com', 'nfwfnjn', 'sdfkweanfjnj'),
(12, 'sadkand', 'klasnflka@jnsfjsn.com', 'nfwfnjn', 'sdfkweanfjnj'),
(13, 'sadkand', 'klasnflka@jnsfjsn.com', 'nfwfnjn', 'sdfkweanfjnj'),
(14, 'sadkand', 'klasnflka@jnsfjsn.com', 'nfwfnjn', 'sdfkweanfjnj'),
(15, 'sadkand', 'klasnflka@jnsfjsn.com', 'nfwfnjn', 'sdfkweanfjnj'),
(16, 'sadkand', 'klasnflka@jnsfjsn.com', 'nfwfnjn', 'sdfkweanfjnj'),
(17, 'sadkand', 'klasnflka@jnsfjsn.com', 'nfwfnjn', 'sdfkweanfjnj'),
(18, 'sadkand', 'klasnflka@jnsfjsn.com', 'nfwfnjn', 'sdfkweanfjnj'),
(19, 'sadkand', 'klasnflka@jnsfjsn.com', 'nfwfnjn', 'sdfkweanfjnj'),
(20, 'sadkand', 'klasnflka@jnsfjsn.com', 'nfwfnjn', 'sdfkweanfjnj'),
(21, 'sadkand', 'klasnflka@jnsfjsn.com', 'nfwfnjn', 'sdfkweanfjnj'),
(22, 'ALan Aipe', 'alanaipe@gmail.com', 'Test sub', 'suugabdvkacv uoge'),
(23, 'ggggg', 'asd@gmail.com', 'fddd', 'f'),
(24, 'Rajdeep Seth', 'rajdeep.cs14@iitp.ac.in', 'Not satisfied', 'please  improve'),
(25, 'Dnyaneshwar Shendurwadkar', 'dnysdk@gmail.com', 'this is for test', ';''''/\r\n''//\r\n''/?}{{\r\n/cak''sd''jfifdj lzks''jdfvpzsdjpovsd'' pljgpojbpdlf;sd'),
(26, 'Jitendra', 'jitendra.cs14@iitp.ac.in', 'feedback', 'hi'),
(27, 'bittu', 'bittu@sabbittuhai.com', 'bittu', 'why there are so many bugs here...\r\nWhy??????\r\nwhy yo did this??????????????\r\nthere is so much scope of Improvement here... \r\nSo sad after this\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `section` varchar(255) DEFAULT NULL,
  `courseId` varchar(255) DEFAULT NULL,
  `videoTitle` varchar(255) DEFAULT NULL,
  `videoLink` varchar(255) DEFAULT NULL,
  `materialName` varchar(255) DEFAULT NULL,
  `materialFileName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `time_created`, `time_modified`, `section`, `courseId`, `videoTitle`, `videoLink`, `materialName`, `materialFileName`) VALUES
(92, '2016-04-20 18:10:04', '2016-04-20 18:10:04', 'Section1', 'TST101', NULL, NULL, NULL, NULL),
(93, '2016-04-20 18:10:25', '2016-04-20 18:10:25', 'Section1', 'TST101', 'Video1', 'https://www.youtube.com/embed/tP-15bw-7og', NULL, NULL),
(94, '2016-04-20 18:11:54', '2016-04-20 18:11:54', 'Introduction', 'CS241', NULL, NULL, NULL, NULL),
(95, '2016-04-20 18:13:32', '2016-04-20 18:14:45', 'Introduction', 'CS241', 'Introduction', 'https://www.youtube.com/embed/Z6f9ckEElsU&list=PL69F7688E60182201', NULL, NULL),
(96, '2016-04-20 18:14:17', '2016-04-20 18:14:17', 'Introduction', 'CS241', NULL, NULL, 'Introduction', '1_Intro.pdf'),
(97, '2016-04-20 18:16:40', '2016-04-20 18:16:40', 'Introduction', 'CS222', NULL, NULL, NULL, NULL),
(98, '2016-04-20 18:17:15', '2016-04-21 04:17:27', 'Introduction', 'CS222', 'Introduction', 'https://www.youtube.com/embed/4TzMyXmzL8M&list=PL59E5B57A04EAE09C', NULL, NULL),
(100, '2016-04-20 18:22:18', '2016-04-20 18:22:18', 'Minimum spanning tree', 'CS204', NULL, NULL, NULL, NULL),
(101, '2016-04-20 18:23:03', '2016-04-21 04:18:53', 'Minimum spanning tree', 'CS204', 'minimum spanning tree', 'https://www.youtube.com/embed/YyLaRffCdk4', NULL, NULL),
(103, '2016-04-20 18:25:50', '2016-04-20 18:25:50', 'INTRODUCTION', 'CS101', NULL, NULL, NULL, NULL),
(104, '2016-04-20 18:29:05', '2016-04-20 18:29:05', 'INTRODUCTION', 'CS101', 'First Step', 'https://www.youtube.com/embed/SGvc-NC0hQo', NULL, NULL),
(105, '2016-04-20 18:29:39', '2016-04-20 18:29:39', 'More about C', 'CS101', NULL, NULL, NULL, NULL),
(106, '2016-04-20 18:31:55', '2016-04-20 18:31:55', 'More about C', 'CS101', 'My first Program', 'https://www.youtube.com/embed/AWliApDc61w', NULL, NULL),
(107, '2016-04-20 18:33:14', '2016-04-20 18:33:14', 'INTRODUCTION', 'CS101', 'Applications of c ', 'https://www.youtube.com/embed/VHLJzxj-rGs', NULL, NULL),
(108, '2016-04-20 18:35:38', '2016-04-20 18:35:38', 'INTRODUCTION', 'CS101', NULL, NULL, 'What is C ?', '1_Intro.pdf'),
(109, '2016-04-20 18:37:30', '2016-04-20 18:37:30', 'Section1', 'TST101', NULL, NULL, 'Material1', '784014790032582570.png'),
(111, '2016-04-21 08:06:42', '2016-04-21 08:06:42', 'INTRODUCTION', 'CS101', NULL, NULL, 'Sample', 'btech_curriculum_cse_full.pdf'),
(112, '2016-04-21 08:09:47', '2016-04-21 08:09:47', 'Minimum spanning tree', 'CS204', NULL, NULL, 'minimum spanning tree', 'T_cormen.pdf'),
(113, '2016-04-21 08:10:19', '2016-04-21 08:10:19', 'cormen', 'CS204', NULL, NULL, NULL, NULL),
(114, '2016-04-21 08:10:41', '2016-04-21 08:10:41', 'cormen', 'CS204', NULL, NULL, 'Introduction to cormen', 'T_cormen.pdf'),
(115, '2016-04-21 08:14:48', '2016-04-21 08:14:48', 'cormen', 'CS204', NULL, NULL, 'common subsequence', 'common subsequences  cormen '),
(116, '2016-04-21 08:15:32', '2016-04-21 08:15:32', 'Minimum spanning tree', 'CS204', NULL, NULL, 'sdlc', ''),
(118, '2016-04-21 08:57:25', '2016-04-21 08:57:25', 'Section1', 'ML101', 'test Video', 'https://www.youtube.com/embed/tP-15bw-7og', NULL, NULL),
(119, '2016-04-21 08:58:29', '2016-04-21 08:58:29', 'Section1', 'ML101', NULL, NULL, 'Material2', 'assembly_tutorial.pdf'),
(120, '2016-04-21 09:37:02', '2016-04-21 09:37:02', 'Introduction', 'MA201', NULL, NULL, NULL, NULL),
(121, '2016-04-21 09:38:05', '2016-04-21 09:38:05', 'Introduction', 'MA201', 'VideoIntro1', 'https://www.youtube.com/embed/nuAGbNsQ4-c', NULL, NULL),
(122, '2016-04-21 09:41:02', '2016-04-21 09:41:02', 'Introduction', 'MA201', 'VideoIntro2', '//www.dailymotion.com/embed/video/x456y17_health-benefits-of-green-tea-care-tv_lifestyle', NULL, NULL),
(123, '2016-04-21 09:42:26', '2016-04-21 09:42:26', 'INTRODUCTION', 'CS101', NULL, NULL, 'material rand', 'Wk15-graphs1.pdf'),
(124, '2016-04-21 09:43:30', '2016-04-21 09:43:30', 'INTRODUCTION', 'CS101', NULL, NULL, 'asidohasiud', 'index.jpeg'),
(125, '2016-04-21 09:46:12', '2016-04-21 09:46:12', 'INTRODUCTION', 'CS101', NULL, NULL, 'imaged', 'img.eps'),
(126, '2016-04-21 10:17:48', '2016-04-21 10:17:48', 'Section4', 'CS101', NULL, NULL, NULL, NULL),
(127, '2016-04-21 10:18:56', '2016-04-21 10:18:56', 'Section4', 'CS101', 'Video Introdsadas', 'https://www.youtube.com/embed/Dit45telSsc', NULL, NULL),
(128, '2016-04-21 17:30:32', '2016-04-21 17:30:32', 'Intro', 'bittu', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courseinfo`
--

CREATE TABLE IF NOT EXISTS `courseinfo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `courseId` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text,
  `duration` varchar(255) DEFAULT NULL,
  `imgFile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseinfo`
--

INSERT INTO `courseinfo` (`id`, `name`, `courseId`, `author`, `subtitle`, `description`, `duration`, `imgFile`) VALUES
(16, 'TEST1', 'TST101', 'opticod', NULL, 'TestTest...', '1hr', 'img/TST101/Screenshot_20160324-031107.png'),
(17, 'Software Engg.', 'CS241', 'Raj', NULL, 'Its all about software devolopment . Software devolopment life cycle', '4 months', 'img/CS241/software.png'),
(18, 'Computer Architecture', 'CS222', 'Raj', NULL, 'Computer Architecture and Organisation\r\n', '4 months', 'img/CS222/CS222.jpg'),
(19, 'Algorithms', 'CS204', 'jitendra', NULL, 'algorithms', '4 months', 'img/CS204/algo.jpg'),
(20, 'Learn C', 'CS101', 'dnysdk', NULL, 'this is c', '1 months', 'img/CS101/c programming.jpg'),
(21, 'OS', 'CS341', 'jitendra', NULL, 'Operating systems ', '4 months', 'img/CS341/OperatingSystems.jpg'),
(22, 'Databases', 'CS344', 'jitendra', NULL, 'Database managment ', '4 months', 'img/CS344/databases.jpg'),
(25, 'Mathematics', 'MA201', 'dnysdk', NULL, 'Tests.', '5days', 'img/MA201/ic engines.jpg'),
(26, 'asdf', 'asfd', 'chirag.cs14', NULL, 'asdfasdf', 'asdf', ''),
(27, 'BittuPanti', 'bittu', 'bittu', NULL, 'Its All About The BittuPanti....', 'Lifetime', 'img/bittu/index.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `projectinfo`
--

CREATE TABLE IF NOT EXISTS `projectinfo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `projectId` varchar(255) NOT NULL,
  `mentors` varchar(500) DEFAULT NULL,
  `contributors` varchar(500) DEFAULT NULL,
  `milestones` varchar(1000) DEFAULT NULL,
  `startDates` varchar(500) DEFAULT NULL,
  `endDates` varchar(500) DEFAULT NULL,
  `imgFile` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `owner` varchar(100) NOT NULL,
  `reqmentors` text,
  `reqcontributors` text
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectinfo`
--

INSERT INTO `projectinfo` (`id`, `name`, `projectId`, `mentors`, `contributors`, `milestones`, `startDates`, `endDates`, `imgFile`, `description`, `owner`, `reqmentors`, `reqcontributors`) VALUES
(5, 'HPVC', 'pr789', '', '', '', '', '', 'img/hpvc.jpg', 'ASME''s International Human Powered Vehicle Challenge (HPVC) provides an opportunity for students to demonstrate the application of sound engineering design principles in the development of sustainable and practical transportation alternatives. In the HPVC, students work in teams to design and build efficient, highly engineered vehicles for everyday useâ€”from commuting to work, to carrying goods to market.', 'alanaipe', 'opticod,bittu', 'edubee123456,bittu'),
(6, 'College Timetable Scheduling', 'pr10001', ',alan', ',alan', 'phase 5,phase 10,phase 11', '3/14/2014,3/14/2014,6/12/2013', '12/04/2017,1/23/2015,12/04/2017', 'img/college-timetable-scheduling.jpg', 'To develop an efficient algorithm to develop the timetable for different courses run in the college and also assign rooms based on room availibility and teacher preferences\r\n', 'alanaipe', 'bittu', 'bittu'),
(7, 'Gymkhana', 'pr1002', 'jitu,alan', ',hitesh,Dnyaneshwar Shendurwadkar', 'pase 2', '6/12/2013', '05/06/2016', 'img/gymkhana elections e voting.jpg', 'Project to develop online portal to conduct free and fair  election									', 'alanaipe', 'dnysdk,bittu', 'bittu'),
(8, 'Quadcopter Design', 'pr1000', '', '', '', '', '', 'img/quadcopter.jpg', 'Understand how to design the different parts, do calculations and controls to finally create a Quadcopter from scratch', 'alanaipe', '', ''),
(9, 'Robotic Arm Development', 'pr15423', '', '', '', '', '', 'img/robotic-arm.jpg', 'Develop a robotic arm from scratch integrating principles of mechanics and control theory.', 'alanaipe', '', ''),
(11, 'Gymkhana E', 'pr1234', '', '', '', '', '', 'img/quadcopter.jpg', 'sjdfsdfsdfskdf skdf ', 'alanaipe', 'dnysdk,Raj', 'Raj'),
(17, 'EDubee2', 'ed202', NULL, NULL, NULL, NULL, NULL, 'img//solar.jpg', 'Smallest to Tallest\r\nDon''t you even MMO\r\nAll Things Being Equal\r\nOne Yellow Balloon\r\nThe Flea\r\nTragedy\r\nThe Hand and the Cookie Jar\r\nWhere is he going?\r\nPyjama Bottoms\r\nRock\r\nThievery and a Drippy Nose\r\nArt\r\nDeath by Water Bottle Contest\r\nThe Robot \r\nCalamity\r\nDemise \r\nFloodgates\r\nThe Cutoff \r\nLamentation\r\nA Fight \r\nThe Internet\r\nThe Dino DocSmallest to Tallest\r\nDon''t you even MMO\r\nAll Things Being Equal\r\nOne Yellow Balloon\r\nThe Flea\r\nTragedy\r\nThe Hand and the Cookie Jar\r\nWhere is he going?\r\nPyjama Bottoms\r\nRock\r\nThievery and a Drippy Nose\r\nArt\r\nDeath by Water Bottle Contest\r\nThe Robot \r\nCalamity\r\nDemise \r\nFloodgates\r\nThe Cutoff \r\nLamentation\r\nA Fight \r\nThe Internet\r\nThe Dino DocSmallest to Tallest\r\nDon''t you even MMO\r\nAll Things Being Equal\r\nOne Yellow Balloon\r\nThe Flea\r\nTragedy\r\nThe Hand and the Cookie Jar\r\nWhere is he going?\r\nPyjama Bottoms\r\nRock\r\nThievery and a Drippy Nose\r\nArt\r\nDeath by Water Bottle Contest\r\nThe Robot \r\nCalamity\r\nDemise \r\nFloodgates\r\nThe Cutoff \r\nLamentation\r\nA Fight \r\nThe Internet\r\nThe Dino DocSmallest to Tallest\r\nDon''t you even MMO\r\nAll Things Being Equal\r\nOne Yellow Balloon\r\nThe Flea\r\nTragedy\r\nThe Hand and the Cookie Jar\r\nWhere is he going?\r\nPyjama Bottoms\r\nRock\r\nThievery and a Drippy Nose\r\nArt\r\nDeath by Water Bottle Contest\r\nThe Robot \r\nCalamity\r\nDemise \r\nFloodgates\r\nThe Cutoff \r\nLamentation\r\nA Fight \r\nThe Internet\r\nThe Dino DocSmallest to Tallest\r\nDon''t you even MMO\r\nAll Things Being Equal\r\nOne Yellow Balloon\r\nThe Flea\r\nTragedy\r\nThe Hand and the Cookie Jar\r\nWhere is he going?\r\nPyjama Bottoms\r\nRock\r\nThievery and a Drippy Nose\r\nArt\r\nDeath by Water Bottle Contest\r\nThe Robot \r\nCalamity\r\nDemise \r\nFloodgates\r\nThe Cutoff \r\nLamentation\r\nA Fight \r\nThe Internet\r\nThe Dino DocSmallest to Tallest\r\nDon''t you even MMO\r\nAll Things Being Equal\r\nOne Yellow Balloon\r\nThe Flea\r\nTragedy\r\nThe Hand and the Cookie Jar\r\nWhere is he going?\r\nPyjama Bottoms\r\nRock\r\nThievery and a Drippy Nose\r\nArt\r\nDeath by Water Bottle Contest\r\nThe Robot \r\nCalamity\r\nDemise \r\nFloodgates\r\nThe Cutoff \r\nLamentation\r\nA Fight \r\nThe Internet\r\nThe Dino DocSmallest to Tallest\r\nDon''t you even MMO\r\nAll Things Being Equal\r\nOne Yellow Balloon\r\nThe Flea\r\nTragedy\r\nThe Hand and the Cookie Jar\r\nWhere is he going?\r\nPyjama Bottoms\r\nRock\r\nThievery and a Drippy Nose\r\nArt\r\nDeath by Water Bottle Contest\r\nThe Robot \r\nCalamity\r\nDemise \r\nFloodgates\r\nThe Cutoff \r\nLamentation\r\nA Fight \r\nThe Internet\r\nThe Dino DocSmallest to Tallest\r\nDon''t you even MMO\r\nAll Things Being Equal\r\nOne Yellow Balloon\r\nThe Flea\r\nTragedy\r\nThe Hand and the Cookie Jar\r\nWhere is he going?\r\nPyjama Bottoms\r\nRock\r\nThievery and a Drippy Nose\r\nArt\r\nDeath by Water Bottle Contest\r\nThe Robot \r\nCalamity\r\nDemise \r\nFloodgates\r\nThe Cutoff \r\nLamentation\r\nA Fight \r\nThe Internet\r\nThe Dino Doc', 'opticod', 'bittu', 'bittu'),
(20, 'Webzine', 'WB101', NULL, NULL, NULL, NULL, NULL, 'img//webzinejpg', 'Webzine is kind of E-magazine', 'dnysdk', 'bittu', 'bittu'),
(22, 'machine learning', 'ml102', ',opticod,bittu', ',bittu', ',design,testing,dev', ',01/23/2016,06/12/2016,02/12/2016', ',02/21/2016,08/12/2015,03/12/2017', 'img//nlp project.jpg', 'this is test description', 'dnysdk', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_fill`
--

CREATE TABLE IF NOT EXISTS `quiz_fill` (
  `id` int(11) NOT NULL,
  `courseId` varchar(255) NOT NULL,
  `quiz_name` varchar(255) NOT NULL,
  `question` text,
  `ans` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COMMENT='for fill in th blanks type question';

--
-- Dumping data for table `quiz_fill`
--

INSERT INTO `quiz_fill` (`id`, `courseId`, `quiz_name`, `question`, `ans`) VALUES
(11, 'CS204', 'Quiz-2', 'When array is already sorted , the best sorting algorithm is............*1137* In Binary trees nodes with no successor are called ......', 'insertion sort*1137*leaf node'),
(12, 'CS101', 'quiz2', 'my name is .................', 'dnysdk'),
(13, 'CS101', 'quiz 10', 'What is header file for strstr?', 'string.h'),
(14, 'bittu', 'BAsic Quiz', 'What according to You is BittuPanti???*1137*what is this course name.........................?', 'BittuPanti cannot be Expressed in words.. :p*1137*bittupanti');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_mcq`
--

CREATE TABLE IF NOT EXISTS `quiz_mcq` (
  `id` int(11) NOT NULL,
  `courseId` varchar(255) NOT NULL,
  `quiz_name` varchar(255) NOT NULL,
  `question` text,
  `option_a` varchar(255) DEFAULT NULL,
  `option_b` varchar(255) DEFAULT NULL,
  `option_c` varchar(255) DEFAULT NULL,
  `option_d` varchar(255) DEFAULT NULL,
  `ans` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1 COMMENT='mcq quiz table';

--
-- Dumping data for table `quiz_mcq`
--

INSERT INTO `quiz_mcq` (`id`, `courseId`, `quiz_name`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `ans`) VALUES
(40, 'CS204', 'Quiz-1', 'Which of the following data structure can''t store the non-homogeneous data elements?', 'Arrays', 'Pointers', 'structures', 'stack', 'A'),
(42, 'CS204', 'Quiz-2', 'Which of the following data structure is non-linear type?', 'strings', 'list', 'stack', 'tree', 'D'),
(43, 'CS101', 'quiz2', 'what is capital of india?', 'delhi', 'mumbai', 'pune', 'patna', 'A'),
(44, 'CS101', 'quiz 10', 'Which header file contains the function strstr()?', 'string.h', 'stdio.h', 'iostream.h', 'math.h', 'A'),
(45, 'bittu', 'BAsic Quiz', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `full_name`, `email`, `password`) VALUES
(3, 'hitz', 'hitesh', 'hitesh@gmail.com', '$2y$10$MmMzODM2MjNjOTExYTVlYuDohr2rbYjXML6gRzSFbj4Zh1fc8wWli'),
(4, 'edu', 'Dnyaneshwar Shendurwadkar', 'edu@edu.com', '$2y$10$MzUzNWIxNzllMTYwNDUyNubSGAYCFWYHNLUivc4xFOd2zt6pA0xLC'),
(5, 'jitu_', 'jitu', 'jitu@gmail.com', '$2y$10$MGQ2YjI1ZWZkNzhhZjc4YuABdB20lGfgZc1jcZypF74SvVI/gBBpG'),
(6, 'opticod', 'Anupam Das', 'anupam.das.bwn@gmail.com', '$2y$10$YzdkYjdkY2YyOTAyODA5N.haw7KjrQQ67iU6y5OkjVIbSeKR9UKam'),
(13, 'dnysdk', 'Dnyaneshwar Shendurwadkar', 'dnysdk@gmail.com', '$2y$10$NGJlOWQ5NDdiMzc0OWViNupq9E66XmlFil1i5gnNwjzY.Ogt3MD1y'),
(14, 'alanaipe', 'alan aipe', 'alan@gmail.com', '$2y$10$ZjBhODA0ZmNkMDdjNWMxYeLsX.uF9uUrHR/5JeMlHdZtQkxHD1Jmu'),
(15, 'Hitesh Golchha', 'Hitesh Golchha', 'hitesh.me14@iitp.ac.in', '$2y$10$MTZjMjVlYjZhNzZmOTM0NO7IezLjHoCGhz.cYveolbcxkn2BAMrfu'),
(16, 'edubee123456', 'TD', 'tanmay.cs14@iitp.ac.in', '$2y$10$ZmE0YjZlNDJjNDdjY2ZjMeRaO3wvnTZODvhMvt/4SXqv9ejaqeoA6'),
(17, 'Raj', 'Rajdeep', 'rajdeep.cs14@iitp.ac.in', '$2y$10$NTg0NmI4N2ZkODIyNWFlMe.MI1YnOWfiBB0IKER5LaE7zFk9QYDUe'),
(18, 'qwerty', 'raunak', 'raunaksengupta@gmail.com', '$2y$10$M2QwOTVlZmY0ODgwYjAyNeOBp0jmC/uMgCGphX4QBbJ/2iAeV8/l6'),
(19, 'Apoorva', 'Apoorva Shrivastava', 'apoorva.ch14@iitp.ac.in', '$2y$10$MjFlM2MxZDc0NGZiNjE5Zem7cWUDUET8TnR3VoSRoG0gUfXLeI55m'),
(20, 'sarthak.me14', 'SARTHAK RASTOGI', 'sarthakrastogi95@gmail.com', '$2y$10$YmIwYzhlZTE3YmUxOTU0ZebJOMZa3rZXw9sicH3EnQP.HzD1Iyvxi'),
(21, 'js', 'jeevan', 'js@js.com', '$2y$10$NGMxZTgwMzkzMjNiMzk2YOHx/uYYfbSXxUHtdaZod3fUpjUsN/7hC'),
(22, 'skverma', 'Shubham Kumar Verma', 'skverma973@gmail.com', '$2y$10$NGZmZDFmNzgxN2ZlZTk3Ye072sx6vIIb/w/90/y9vaWzToVLxabr6'),
(23, 'jitendra', 'Jitendra kumar', 'jitendra.cs14@iitp.ac.in', '$2y$10$YWRhYmY3M2U4MmIyODNlYuISZXlm1FTKMTTToiFhqHSQPQo/ybvI6'),
(24, 'mritunjayk029', 'mritunjay kumar', 'mritunjayk029@gmail.com', '$2y$10$ZDM0Y2NkNGQwYjAyZjZkZO/TDm24Ag/dLMUxgzwqUfxe6ZQsPJSqK'),
(25, 'Rakesh', 'Rakesh Sarkar', 'rakeshsarkarmail@gmail.com', '$2y$10$YTg3ZTIyNDUzMGQ1YWJmZ.mDDHQH/QeCkgSpuRBJmKfLwXGhO8bGy'),
(26, 'teja', 'teja', 'pulagam.ch14@iitp.ac.in', '$2y$10$Yzk3MjRhMmQ1ODRiOTlmMeUe4Il7bsnZ7NvMY4dvQLOjLLRncv6Qm'),
(27, 'mithu98765', 'Sushant Kumar', 'mithu987654321@gmail.com', '$2y$10$YzRhOTQ1NDllNzlhMzExNeweWQgrG.ZeHZeANZf8ttMhbgpJoFTR2'),
(28, 'cc15', 'Chirag Wadhera', 'chiragwadhera15@gmail.com', '$2y$10$ZjY5NWJiZGZlNjA0N2VmMuTS087ib15Aa8gsXdRe6hcM8UBq6wHTu'),
(29, 'chirag.cs14', 'Chirag Soni', 'chirag.cs14@iitp.ac.in', '$2y$10$YmNiY2NkNDRmNjcyNzgyNupmSgl1CaQd47eux8D75Ug/BpSy3FAXO'),
(30, 'v', 'b', 'f@gmail.com', '$2y$10$MmVjMDE3Y2FlNjg4M2ZmZ.uLa6IunNTEaHFjECP4itbyQ/b2nFGl6'),
(31, 'daksshdrolia', 'Daksh', 'dakshdroliafunatcollege@gmail.com', '$2y$10$YzMxYjliYmQ0NWM3YzIxYeCZ9nzcGAnKwRLy9exCLetB.4W6phGZu'),
(32, 'dakshdrolia', 'Daksh', 'drolia.cs15@iitp.ac.in', '$2y$10$YjVmYjljY2M1ZmQ3NTE2OOku0ca/Pl3UXwvy88hf7w0ySQ.6LyLfm'),
(33, 'bittu', 'bittu', 'bittu@malinator.com', '$2y$10$ZmUxY2FmYzEwOGVkOTU2Yu9wPKDnnauWNW/Kf703iIigM7FgHWuoK'),
(34, 'scopeinfinity', 'Gagan Kumar', 'gagan.cs14@iitp.ac.in', '$2y$10$ZGZkZDFlOWY2Yjg5ZDA0ZOctIjNS1xuLl6KcDBcm9heJqRLMkjrIy'),
(35, 'abcdef', 'abafa', 'abcd@abcd.com', '$2y$10$YTE3MTc0NjEzOGM1ZmZkNujO6uqG1I25jcz7UVhSqq/18gcVi5B6i'),
(36, '!nviNcible', 'Tarun Kumar', 'meets2tarun@gmail.com', '$2y$10$ZTgwNWU2NjU1NjFjOGRkNeJT2dNcyMXdIcAO83lYdyZSxudQvLRBy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseinfo`
--
ALTER TABLE `courseinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projectinfo`
--
ALTER TABLE `projectinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_fill`
--
ALTER TABLE `quiz_fill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_mcq`
--
ALTER TABLE `quiz_mcq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `courseinfo`
--
ALTER TABLE `courseinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `projectinfo`
--
ALTER TABLE `projectinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `quiz_fill`
--
ALTER TABLE `quiz_fill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `quiz_mcq`
--
ALTER TABLE `quiz_mcq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

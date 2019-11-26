-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2019 at 01:16 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `research`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_projects`
--

CREATE TABLE `assigned_projects` (
  `assign_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `researcher_id` int(11) NOT NULL,
  `submitted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigned_projects`
--

INSERT INTO `assigned_projects` (`assign_id`, `project_id`, `researcher_id`, `submitted`) VALUES
(5, 78, 8, 1),
(6, 80, 8, 1),
(7, 94, 10, 1),
(8, 84, 2, 1),
(9, 92, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_role`
--

CREATE TABLE `employee_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_role`
--

INSERT INTO `employee_role` (`role_id`, `role_name`) VALUES
(1, 'Manager'),
(2, 'Researcher');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(11) NOT NULL,
  `m_fname` varchar(100) NOT NULL,
  `m_lname` varchar(100) NOT NULL,
  `m_email` varchar(100) NOT NULL,
  `m_password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `m_fname`, `m_lname`, `m_email`, `m_password`, `role_id`) VALUES
(11, 'Victor', 'Muguna', 'victor.mbaabu@strathmore.edu', 'Muguna6956', 1),
(12, 'Joeseph', 'Maina', 'joseph.maina@gmail.com', 'Joseph123', 1),
(13, 'Joy', 'Maina', 'j.maina@strathmore.edu', 'Maina123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `project_duration` varchar(100) NOT NULL,
  `assignment_status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `project_duration`, `assignment_status`) VALUES
(78, 'POST MALONE', 'short_term', 1),
(79, 'POST MALONE', 'short_term', 0),
(80, 'DRAKE', 'long_term', 1),
(81, 'DRAKE', 'long_term', 0),
(82, 'GUMZO', 'short_term', 0),
(83, 'GUMZO', 'short_term', 0),
(84, 'GUMZO', 'long_term', 1),
(85, 'GUMZO', 'long_term', 0),
(86, 'MULTIMEDIA', 'short_term', 0),
(87, 'MULTIMEDIA', 'short_term', 0),
(88, 'GAME PROGRAMMING', 'short_term', 0),
(89, 'GAME PROGRAMMING', 'short_term', 0),
(90, 'CRYPOGRAPHY AND NETWORK SECURITY', 'long_term', 0),
(91, 'CRYPOGRAPHY AND NETWORK SECURITY', 'long_term', 0),
(92, 'TRAVIS', 'long_term', 1),
(93, 'TRAVIS', 'long_term', 0),
(94, 'MARKETING', 'long_term', 1),
(95, 'MARKETING', 'long_term', 0),
(96, 'LAN DESIGN', 'long_term', 0),
(97, 'LAN DESIGN', 'long_term', 0),
(98, 'GAME PROGRAMMING', 'short_term', 0),
(99, 'GAME PROGRAMMING', 'short_term', 0),
(100, 'MAKMOHAN', 'long_term', 0),
(101, 'MAKMOHAN', 'long_term', 0),
(102, 'FORENSICS', 'short_term', 0),
(103, 'FORENSICS', 'long_term', 0),
(104, 'HELB', 'long_term', 0),
(105, 'HELB', 'long_term', 0),
(106, 'REFORMS', 'long_term', 0),
(107, 'REFORMS', 'long_term', 0),
(108, 'CHRISTMAS', 'long_term', 0),
(109, 'CHRISTMAS', 'long_term', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_application`
--

CREATE TABLE `project_application` (
  `application_id` int(11) NOT NULL,
  `researcher_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `project_pitch` varchar(500) NOT NULL,
  `cv` varchar(100) DEFAULT NULL,
  `assignment_status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_application`
--

INSERT INTO `project_application` (`application_id`, `researcher_id`, `project_id`, `project_pitch`, `cv`, `assignment_status`) VALUES
(17, 8, 78, 'Perfect for my skills.', '20954-block-ciphers-and-des.pdf', 1),
(18, 8, 80, 'My kind pitch.', '11376-db_schema.pdf', 1),
(19, 10, 94, 'Please consider my application. I have a vast knowledge on market strategies.', '98725-1.-wan-introduction-to-wans.pdf', 1),
(20, 6, 84, 'I have done this before.', '96272-tco2.pdf', 1),
(22, 10, 92, 'MBVHXMYDRMCDJRTDCMGCX', '45375-fee-4.2.pdf', 1),
(23, 8, 92, 'I have vast experience on the project on TRAVIS', '33351-bbt-4201---information-systems-auditing-â€“-april-2018.pdf', 1),
(24, 10, 92, 'yes we can', '49427-bbt-4201---information-systems-audit---november-2018.pdf', 1),
(25, 2, 84, 'I have dealt with governors before.', '8380-receipt.pdf', 1),
(26, 11, 92, 'dsjsdgfdcvccfgzdifjkdxbfjhvxdjbfvjxbhcgvxf', '62201-fee-4.2.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_description`
--

CREATE TABLE `project_description` (
  `description_id` int(11) NOT NULL,
  `p_description` varchar(500) NOT NULL,
  `p_attachment` varchar(100) DEFAULT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_description`
--

INSERT INTO `project_description` (`description_id`, `p_description`, `p_attachment`, `project_id`) VALUES
(23, 'White Iverson', '35618-890092.pdf', 78),
(24, 'SCORPION', '8942-26059380.pdf', 80),
(25, 'GOVERNORS', '65269-examcard-095507.pdf', 84),
(26, 'LOGO', '2661-fee-4.2.pdf', 86),
(27, 'MECANIM', '14101-installment-plan.pdf', 88),
(28, 'CIPHERS', '2208-marksreport-095507-(1).pdf', 90),
(29, 'FLEX', '51421-receipt.pdf', 92),
(30, 'NETWORK', '77759-victormuguna-bbit2c3105itn-certificate.pdf', 94),
(31, '3-TIER MODEL', '51641-victormuguna-it+fundamentals+(bbi-certificate.pdf', 96),
(32, 'GAME', '8796-receipt.pdf', 98),
(33, 'Blueberry', '19213-bbt-4201---information-systems-auditing-â€“-august-2018.pdf', 100),
(34, 'autopsy software ', '48247-risk-management-introduction.pdf', 102),
(35, 'pay your loan', '16221-fee-4.2.pdf', 104),
(36, 'police force reforms', '43455-installment-plan.pdf', 106),
(37, 'its on 25', '83549-marksreport-095507-(1).pdf', 108);

-- --------------------------------------------------------

--
-- Table structure for table `researcher`
--

CREATE TABLE `researcher` (
  `researcher_id` int(11) NOT NULL,
  `r_fname` varchar(100) NOT NULL,
  `r_lname` varchar(100) NOT NULL,
  `r_email` varchar(100) NOT NULL,
  `r_password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `researcher`
--

INSERT INTO `researcher` (`researcher_id`, `r_fname`, `r_lname`, `r_email`, `r_password`, `role_id`) VALUES
(2, 'Faith', 'Kamau', 'faith.kamau@gmail.com', 'Faith123', 2),
(3, 'David', 'Omagwa', 'david.omagwa@strathmore.edu', 'David123', 2),
(4, 'Frank', 'Mbaabu', 'frank.mbaabu@gmail.com', 'Frank123', 2),
(5, 'June', 'Katunge', 'june.katunge@strathmore.edu', 'June123', 2),
(6, 'Roy', 'Khasiani', 'roy.khasiani@gmail.com', 'Roy123', 2),
(7, 'Naomi', 'nkirote', 'nao@gmail.com', 'nao123', 2),
(8, 'doris', 'mwari', 'd.mwari@gmail.com', 'Doris123', 2),
(9, 'Frank', 'Manyara', 'f.manyara@gmail.com', 'Frank123', 2),
(10, 'Frank', 'Manyara', 'f.manyara@gmail.com', 'Frank123', 2),
(11, 'christmas', 'Maina', 'c.maina@gmail.com', 'Maina123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `submission_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `researcher_id` int(11) NOT NULL,
  `submission_date` varchar(100) NOT NULL,
  `attachment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`submission_id`, `project_id`, `researcher_id`, `submission_date`, `attachment`) VALUES
(5, 78, 8, '2019-11-24 15:13:27', '92848-DB_SCHEMA.pdf'),
(6, 80, 8, '2019-11-24 17:49:31', '38176-DB_SCHEMA.pdf'),
(7, 84, 2, '2019-11-26 11:57:55', '47847-VictorMuguna-BBIT2C3105ITN-Certificate.pdf'),
(8, 94, 10, '2019-11-26 14:19:58', '21761-ExamCard-095507.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_projects`
--
ALTER TABLE `assigned_projects`
  ADD PRIMARY KEY (`assign_id`),
  ADD KEY `researcher_id` (`researcher_id`),
  ADD KEY `project_id_fk23` (`project_id`);

--
-- Indexes for table `employee_role`
--
ALTER TABLE `employee_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`),
  ADD KEY `role_id_fk1` (`role_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_application`
--
ALTER TABLE `project_application`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `researcher_id_fk1` (`researcher_id`),
  ADD KEY `project_id_fk2` (`project_id`);

--
-- Indexes for table `project_description`
--
ALTER TABLE `project_description`
  ADD PRIMARY KEY (`description_id`),
  ADD KEY `project_id_fk1` (`project_id`);

--
-- Indexes for table `researcher`
--
ALTER TABLE `researcher`
  ADD PRIMARY KEY (`researcher_id`),
  ADD KEY `role_id_fk2` (`role_id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`submission_id`),
  ADD KEY `researcher_id_fk3` (`researcher_id`),
  ADD KEY `project_id_fk233` (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned_projects`
--
ALTER TABLE `assigned_projects`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee_role`
--
ALTER TABLE `employee_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `project_application`
--
ALTER TABLE `project_application`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `project_description`
--
ALTER TABLE `project_description`
  MODIFY `description_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `researcher`
--
ALTER TABLE `researcher`
  MODIFY `researcher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `submission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_projects`
--
ALTER TABLE `assigned_projects`
  ADD CONSTRAINT `project_id_fk23` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `researcher_id_fk2` FOREIGN KEY (`researcher_id`) REFERENCES `researcher` (`researcher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `role_id_fk1` FOREIGN KEY (`role_id`) REFERENCES `employee_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_application`
--
ALTER TABLE `project_application`
  ADD CONSTRAINT `project_id_fk2` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `researcher_id_fk1` FOREIGN KEY (`researcher_id`) REFERENCES `researcher` (`researcher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `project_description`
--
ALTER TABLE `project_description`
  ADD CONSTRAINT `project_id_fk1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `researcher`
--
ALTER TABLE `researcher`
  ADD CONSTRAINT `role_id_fk2` FOREIGN KEY (`role_id`) REFERENCES `employee_role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `project_id_fk233` FOREIGN KEY (`project_id`) REFERENCES `assigned_projects` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `researcher_id_fk3` FOREIGN KEY (`researcher_id`) REFERENCES `assigned_projects` (`researcher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

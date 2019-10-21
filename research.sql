-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2019 at 03:27 PM
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
  `project_duration` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `project_duration`) VALUES
(1, 'asdfasd', 'short_term'),
(2, 'pp', 'short_term'),
(3, 'pp', 'short_term'),
(4, 'pp', 'short_term'),
(5, 'pp', 'short_term'),
(6, 'pp', 'short_term'),
(7, 'pp', 'short_term'),
(8, 'pp', 'short_term'),
(9, 'pp', 'short_term'),
(11, 'pp', 'short_term'),
(13, 'pp', 'short_term'),
(14, 'stm', 'short_term'),
(15, 'pp', 'short_term'),
(17, 'pp', 'short_term'),
(19, 'pp', 'short_term'),
(21, 'pp', 'short_term'),
(23, 'pp', 'short_term'),
(24, 'Multimedia', 'long_term'),
(25, 'Multimedia', 'long_term'),
(26, 'Game Programming', 'long_term'),
(27, 'Game Programming', 'long_term'),
(28, 'Switching', 'long_term'),
(29, 'Switching', 'long_term'),
(30, 'Crypography and Network Security', 'short_term'),
(31, 'Crypography and Network Security', 'short_term'),
(32, 'Web Dev', 'long_term'),
(33, 'Web development', 'short_term'),
(34, 'Special Topics in IT', 'short_term'),
(35, 'Special topics', 'short_term'),
(36, 'Android', 'short_term'),
(37, 'Android', 'short_term'),
(39, 'Php', 'long_term'),
(41, 'New Project', 'short_term'),
(43, 'Another One', 'short_term'),
(44, 'stc', 'long_term'),
(45, 'stc', 'long_term'),
(47, 'ooad', 'long_term'),
(48, 'Gumzo', 'long_term'),
(49, 'Gumzo', 'long_term'),
(51, 'ewfsd', 'short_term'),
(52, 'Gumzo', 'short_term'),
(53, 'Gumzo', 'short_term'),
(54, 'Gumzo', 'short_term'),
(55, 'Gumzo', 'short_term'),
(57, 'Gumzo', 'short_term'),
(59, 'networking', 'long_term'),
(60, 'Gumzo', 'long_term'),
(61, 'Gumzo', 'long_term');

-- --------------------------------------------------------

--
-- Table structure for table `project_application`
--

CREATE TABLE `project_application` (
  `application_id` int(11) NOT NULL,
  `researcher_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `project_pitch` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_application`
--

INSERT INTO `project_application` (`application_id`, `researcher_id`, `project_id`, `project_pitch`) VALUES
(1, 8, 44, 'Kuja na ngwai'),
(2, 8, 36, 'Okay thanks.'),
(3, 8, 24, 'Awesome logo meru mzima'),
(4, 8, 32, 'Bora systems.'),
(5, 8, 32, 'I will do a good job'),
(6, 8, 24, 'i can do it\r\nvery'),
(7, 8, 36, 'i have workedbdshgcbvi;ufcbjvnsfnubj');

-- --------------------------------------------------------

--
-- Table structure for table `project_description`
--

CREATE TABLE `project_description` (
  `description_id` int(11) NOT NULL,
  `p_description` varchar(500) NOT NULL,
  `p_attachment` longblob NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_description`
--

INSERT INTO `project_description` (`description_id`, `p_description`, `p_attachment`, `project_id`) VALUES
(3, 'sir thomas more', 0x3520746820666c6f6f72, 14),
(8, 'make a logo', 0x6d756e64616d61, 24),
(9, 'create a game', 0x50726f6a6f, 26),
(10, 'LAN design and STP', 0x5370616e6e696e6720747265652070726f746f63616c20646f63756d656e74, 28),
(11, 'Term Paper', 0x4e656c736f6e, 30),
(12, 'Create web forms', 0x6162636465666768, 32),
(13, 'Create an animation clip', 0x4176617461722066726f6d2061737365742073746f7265, 34),
(14, 'create a mobile app', 0x55736520616e64726f69642073747564696f, 36),
(18, 'Third floor', 0x7573652074686520656c657661746f72, 44);

-- --------------------------------------------------------

--
-- Table structure for table `researcher`
--

CREATE TABLE `researcher` (
  `researcher_id` int(11) NOT NULL,
  `r_fname` varchar(100) NOT NULL,
  `r_lname` varchar(100) NOT NULL,
  `project_id` int(11) NOT NULL,
  `r_email` varchar(100) NOT NULL,
  `r_password` varchar(100) NOT NULL,
  `r_skills` varchar(500) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `researcher`
--

INSERT INTO `researcher` (`researcher_id`, `r_fname`, `r_lname`, `project_id`, `r_email`, `r_password`, `r_skills`, `phone_number`, `role_id`) VALUES
(2, 'Faith', 'Kamau', 0, 'faith.kamau@gmail.com', 'Faith123', '', 0, 2),
(3, 'David', 'Omagwa', 0, 'david.omagwa@strathmore.edu', 'David123', '', 0, 2),
(4, 'Frank', 'Mbaabu', 0, 'frank.mbaabu@gmail.com', 'Frank123', '', 0, 2),
(5, 'June', 'Katunge', 0, 'june.katunge@strathmore.edu', 'June123', '', 0, 2),
(6, 'Roy', 'Khasiani', 0, 'roy.khasiani@gmail.com', 'Roy123', '', 0, 2),
(7, 'Naomi', 'nkirote', 0, 'nao@gmail.com', 'nao123', '', 0, 2),
(8, 'doris', 'mwari', 0, 'd.mwari@gmail.com', 'Doris123', '', 0, 2);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `project_application`
--
ALTER TABLE `project_application`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `project_description`
--
ALTER TABLE `project_description`
  MODIFY `description_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `researcher`
--
ALTER TABLE `researcher`
  MODIFY `researcher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

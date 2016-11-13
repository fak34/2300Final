-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 02, 2016 at 10:11 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `info230_SP16_jnfnsp16`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admins`
--

DROP TABLE IF EXISTS `Admins`;
CREATE TABLE `Admins` (
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admins`
--

INSERT INTO `Admins` (`username`, `password`) VALUES
('jnfn', '$2y$10$1rCoyseKrwHEncGU2MAVX.55YWEaV6Fv4N8fp8MCpHLFFUErq2Zny');

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

DROP TABLE IF EXISTS `Events`;
CREATE TABLE `Events` (
  `eventID` int(11) NOT NULL,
  `event_name` int(250) NOT NULL,
  `event_description` text NOT NULL,
  `event_date` date NOT NULL,
  `event_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Grads`
--

DROP TABLE IF EXISTS `Grads`;
CREATE TABLE `Grads` (
  `gradID` int(11) NOT NULL,
  `grad_name` varchar(30) NOT NULL,
  `grad_photo` varchar(30) DEFAULT NULL,
  `grad_description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Grads`
--

INSERT INTO `Grads` (`gradID`, `grad_name`, `grad_photo`, `grad_description`) VALUES
(1, 'Ying-Ying Tran', NULL, 'PhD. Candidate, Mathematics (2014-15, 2015-16)'),
(2, 'Jamie Barnes', NULL, 'PhD. Candidate, Mathematics.(2015-16)');

-- --------------------------------------------------------

--
-- Table structure for table `ParticipatesIn`
--

DROP TABLE IF EXISTS `ParticipatesIn`;
CREATE TABLE `ParticipatesIn` (
  `participate_ID` int(11) NOT NULL,
  `stuID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `gradID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Photos`
--

DROP TABLE IF EXISTS `Photos`;
CREATE TABLE `Photos` (
  `photoID` int(11) NOT NULL,
  `p_name` varchar(250) NOT NULL,
  `p_caption` text NOT NULL,
  `p_fiilepath` text NOT NULL,
  `p_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Photos`
--

INSERT INTO `Photos` (`photoID`, `p_name`, `p_caption`, `p_fiilepath`, `p_date`) VALUES
(1, 'raguso_mathcounts', 'Circle Girl Liana Raguso at MathCounts Chapters at SUNY Delhi, top female competitor (Top Girl), February 2016.\r\n', 'images/raguso_mathcounts.jpg', '2016-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `Sponsors`
--

DROP TABLE IF EXISTS `Sponsors`;
CREATE TABLE `Sponsors` (
  `sponID` int(11) NOT NULL,
  `spon_name` varchar(30) NOT NULL,
  `spon_description` text NOT NULL,
  `spon_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Students`
--

DROP TABLE IF EXISTS `Students`;
CREATE TABLE `Students` (
  `stuID` int(11) NOT NULL,
  `senior?` tinyint(1) NOT NULL,
  `stu_name` varchar(30) NOT NULL,
  `stu_photo` text NOT NULL,
  `stu_description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Students`
--

INSERT INTO `Students` (`stuID`, `senior?`, `stu_name`, `stu_photo`, `stu_description`) VALUES
(1, 1, 'Lisa Yoo', '', ''),
(2, 1, 'Inbal Grossman', '', ''),
(3, 1, 'Miryam Ginsparg', '', ''),
(4, 1, 'Robin Steuteville', '', ''),
(5, 1, 'Hannah Han', '', ''),
(6, 1, 'Sherrie Qian', '', ''),
(7, 1, 'Meghana Gavirneni', '', ''),
(8, 1, 'Asha Duhan', '', ''),
(9, 0, 'Liana Raguso', '', ''),
(10, 0, 'Lillian Hwang-Geddes', '', ''),
(11, 0, 'Alice Hu', '', ''),
(12, 0, 'Bella Hu', '', ''),
(13, 0, 'Zhaoran Chen', '', ''),
(14, 0, 'Sophia Li', '', ''),
(15, 0, 'Lena Wu', '', ''),
(16, 0, 'Irene Lee', '', ''),
(17, 0, 'Jakin Ng', '', ''),
(18, 0, 'Niha Kumar', '', ''),
(19, 0, 'Diva Shrivastava', '', ''),
(20, 0, 'Srisha Gaur', '', ''),
(21, 0, ' Lily Mueller', '', ''),
(22, 0, 'Ana Duke-Cardenas', '', ''),
(23, 0, 'Grace Utz', '', ''),
(24, 0, 'Noam Ginsparg', '', 'Guest\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `Grads`
--
ALTER TABLE `Grads`
  ADD PRIMARY KEY (`gradID`);

--
-- Indexes for table `ParticipatesIn`
--
ALTER TABLE `ParticipatesIn`
  ADD PRIMARY KEY (`participate_ID`),
  ADD UNIQUE KEY `stuID` (`stuID`,`eventID`,`gradID`);

--
-- Indexes for table `Photos`
--
ALTER TABLE `Photos`
  ADD PRIMARY KEY (`photoID`);

--
-- Indexes for table `Sponsors`
--
ALTER TABLE `Sponsors`
  ADD PRIMARY KEY (`sponID`);

--
-- Indexes for table `Students`
--
ALTER TABLE `Students`
  ADD PRIMARY KEY (`stuID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Events`
--
ALTER TABLE `Events`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Grads`
--
ALTER TABLE `Grads`
  MODIFY `gradID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ParticipatesIn`
--
ALTER TABLE `ParticipatesIn`
  MODIFY `participate_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Photos`
--
ALTER TABLE `Photos`
  MODIFY `photoID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Sponsors`
--
ALTER TABLE `Sponsors`
  MODIFY `sponID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Students`
--
ALTER TABLE `Students`
  MODIFY `stuID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

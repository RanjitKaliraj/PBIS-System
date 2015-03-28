-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2014 at 03:35 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pbis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `Name` varchar(50) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Contact` varchar(15) DEFAULT NULL,
  `Division` varchar(20) DEFAULT NULL,
  `DivisionRole` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Name`, `Address`, `Contact`, `Division`, `DivisionRole`) VALUES
('Dipkar Uprety', 'kathmandu', '9851044390', 'IT Division', 'chief'),
('Hari Krishna', 'kathmandu', '9855453344', 'Administration', 'chief'),
('Carl Jepson', 'Kathmandu', '9818670229', 'exco', 'ceo'),
('Ed Sheeran', 'kathmandu', '9859859554', 'exco', 'md'),
('William apple', 'Kathmandu', '9898989898', 'IT Division', 'staff'),
('Ronald Subba', 'kathmandu', '9879879876', 'HR Division', 'chief'),
('Ramlal Bahadur', 'pokhara', '4343434343', 'IT Division', 'staff'),
('Kewa Rai', 'kathmandu', '3232323232', 'HR Division', 'staff'),
('Aashique Ali', 'kathmandu', '7676767676', 'RTE Division', 'chief'),
('Rahul Shrestha', 'pokhara', '7676767676', 'HR Division', 'staff'),
('Dipendra shakya', 'dharan', '5434543456', 'IT Division', 'staff'),
('Rakesh Risal', 'dharan', '2346543464', 'RTE Division', 'staff'),
('Ranjit Kaliraj', 'Kathmandu', '9818670229', 'IT Division', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Division` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Username`, `Password`, `Division`) VALUES
('IT Division', '1f3870be274f6c49b3e31a0c6728957f', 'IT Division'),
('HR Division', '1f3870be274f6c49b3e31a0c6728957f', 'HR Division'),
('RTE Division', '1f3870be274f6c49b3e31a0c6728957f', 'RTE Division'),
('Exco1-CEO', '1f3870be274f6c49b3e31a0c6728957f', 'Exco1'),
('Exco2-MD', '1f3870be274f6c49b3e31a0c6728957f', 'Exco2'),
('Administration', '1f3870be274f6c49b3e31a0c6728957f', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `pbis_percentage`
--

CREATE TABLE IF NOT EXISTS `pbis_percentage` (
  `Division` varchar(50) DEFAULT NULL,
  `firstQuarter2014` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pbis_percentage`
--

INSERT INTO `pbis_percentage` (`Division`, `firstQuarter2014`) VALUES
('IT Division', '66.25'),
('HR Division', '59.33'),
('RTE Division', '48');

-- --------------------------------------------------------

--
-- Table structure for table `progressform`
--

CREATE TABLE IF NOT EXISTS `progressform` (
  `SN` int(11) NOT NULL,
  `ActivityName` varchar(100) DEFAULT NULL,
  `Unit` varchar(50) DEFAULT NULL,
  `Weightage` varchar(50) DEFAULT NULL,
  `PI_100` varchar(50) DEFAULT NULL,
  `PI_75` varchar(50) DEFAULT NULL,
  `PI_50` varchar(50) DEFAULT NULL,
  `PI_less50` varchar(50) DEFAULT NULL,
  `Measurement` varchar(50) DEFAULT NULL,
  `Score` int(11) DEFAULT NULL,
  `Progress` int(11) DEFAULT NULL,
  `IMB` varchar(100) DEFAULT NULL,
  `Quarter` varchar(20) DEFAULT NULL,
  `Year` varchar(20) DEFAULT NULL,
  `Division` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progressform`
--

INSERT INTO `progressform` (`SN`, `ActivityName`, `Unit`, `Weightage`, `PI_100`, `PI_75`, `PI_50`, `PI_less50`, `Measurement`, `Score`, `Progress`, `IMB`, `Quarter`, `Year`, `Division`) VALUES
(0, 'kjhkjhkjh', 'kjhkjhkjh', 'kjhkjhkjh', 'kjhkj', 'hkjh', 'kjh', 'kjh', 'KJH', 87, 66, '67868', 'first', '2014', 'HR Division'),
(1, 'kjh', 'kj', 'khk', 'jhk', 'jhkjhkj', 'hkjhkjh', 'kjhkjh', '67', 87, 55, '86', 'first', '2014', 'HR Division'),
(2, 'kjhkddd', 'hg', 'hgh', 'kghj', 'gh', 'gj', 'hgj', '465', 76, 57, '0KJHK', 'first', '2014', 'HR Division'),
(0, 'jhkj machete', 'kjh', 'kjh', 'kjhk', 'jhk', 'jhkj', 'hklj', 'iy', 78, 77, '897', 'first', '2014', 'RTE Division'),
(1, 'hklj', 'hlkjh', 'kjh', 'kjlh', 'kljh', 'kjh', 'kjlh', '9bnn', 7, 56, '979', 'first', '2014', 'RTE Division'),
(2, 'kljh', 'kljhk', 'jlh', 'kljhk', 'jlhkj', 'hklj', 'hkl', 'hkjhk', 78, 9, '098', 'first', '2014', 'RTE Division'),
(3, 'jkh', 'i', 'iu', 'yiuy', 'iu', 'y', 'uyt', '80980809', 66, 58, '7868969', 'first', '2014', 'RTE Division'),
(4, 'gj', 'jhgiu', 'yi', 'uyiu', 'yiu', 'yiuy', 'iyiu', '86', 5, 40, 'cd', 'first', '2014', 'RTE Division'),
(0, 'Web Site Maintainance edited', 'Time', '20', '1 days', '2 days', '3 days', '>3 days', '2 days', 75, 75, 'office record', 'first', '2014', 'IT Division'),
(1, 'SMS System Development editedas', 'Time', '60', 'within 15th', 'within 20th', 'within 25th', 'within 30th', '14th', 100, 100, 'office record', 'first', '2014', 'IT Division'),
(2, 'Anti Virus Installation edited', 'Nos', '40', '60Â ', '50', '40', '30', '40', 50, 50, 'office record', 'first', '2014', 'IT Division'),
(3, 'Hard Disk replacement edited', 'Nos', '50', '50', '40', '30', '20', '50', 20, 40, 'office record', 'first', '2014', 'IT Division');

-- --------------------------------------------------------

--
-- Table structure for table `progressformstatus`
--

CREATE TABLE IF NOT EXISTS `progressformstatus` (
  `DivisionName` varchar(50) DEFAULT NULL,
  `DivisionChief` varchar(50) DEFAULT NULL,
  `Quarter` varchar(20) DEFAULT NULL,
  `Date` varchar(20) DEFAULT NULL,
  `Year` varchar(20) DEFAULT NULL,
  `SubmitStatus` varchar(20) DEFAULT NULL,
  `AdminForwardStatus` varchar(20) DEFAULT NULL,
  `Exco1ApproveStatus` varchar(20) DEFAULT NULL,
  `Exco2ApproveStatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progressformstatus`
--

INSERT INTO `progressformstatus` (`DivisionName`, `DivisionChief`, `Quarter`, `Date`, `Year`, `SubmitStatus`, `AdminForwardStatus`, `Exco1ApproveStatus`, `Exco2ApproveStatus`) VALUES
('HR Division', 'Ronald Subba', 'first', '10/04/2014', '2014', 'yes', 'yes', 'Approved', 'Approved'),
('RTE Division', 'Aashique Ali', 'first', '10/04/2014', '2014', 'yes', 'yes', 'Approved', 'Approved'),
('IT Division', 'Dipkar Uprety', 'first', '27/04/2014', '2014', 'yes', 'yes', 'Approved', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `workform`
--

CREATE TABLE IF NOT EXISTS `workform` (
  `SN` int(11) NOT NULL,
  `ActivityName` varchar(100) DEFAULT NULL,
  `Unit` varchar(50) DEFAULT NULL,
  `Weightage` varchar(50) DEFAULT NULL,
  `PI_100` varchar(50) DEFAULT NULL,
  `PI_75` varchar(50) DEFAULT NULL,
  `PI_50` varchar(50) DEFAULT NULL,
  `PI_less50` varchar(50) DEFAULT NULL,
  `Quarter` varchar(20) DEFAULT NULL,
  `Year` varchar(20) DEFAULT NULL,
  `Division` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workform`
--

INSERT INTO `workform` (`SN`, `ActivityName`, `Unit`, `Weightage`, `PI_100`, `PI_75`, `PI_50`, `PI_less50`, `Quarter`, `Year`, `Division`) VALUES
(0, 'kjhkjhkjh', 'kjhkjhkjh', 'kjhkjhkjh', 'kjhkj', 'hkjh', 'kjh', 'kjh', 'first', '2014', 'HR Division'),
(1, 'kjh', 'kj', 'khk', 'jhk', 'jhkjhkj', 'hkjhkjh', 'kjhkjh', 'first', '2014', 'HR Division'),
(2, 'kjhkddd', 'hg', 'hgh', 'kghj', 'gh', 'gj', 'hgj', 'first', '2014', 'HR Division'),
(0, 'jhkj machete', 'kjh', 'kjh', 'kjhk', 'jhk', 'jhkj', 'hklj', 'first', '2014', 'RTE Division'),
(1, 'hklj', 'hlkjh', 'kjh', 'kjlh', 'kljh', 'kjh', 'kjlh', 'first', '2014', 'RTE Division'),
(2, 'kljh', 'kljhk', 'jlh', 'kljhk', 'jlhkj', 'hklj', 'hkl', 'first', '2014', 'RTE Division'),
(3, 'jkh', 'i', 'iu', 'yiuy', 'iu', 'y', 'uyt', 'first', '2014', 'RTE Division'),
(4, 'gj', 'jhgiu', 'yi', 'uyiu', 'yiu', 'yiuy', 'iyiu', 'first', '2014', 'RTE Division'),
(0, 'Website Maintainence edited', 'Time', '20', '1 days', '2 days', '3 days', '>3 days', 'first', '2014', 'IT Division'),
(1, 'SMS System Development edited', 'Time', '60', 'within 15th', 'within 20th', 'within 25th', 'within 30th', 'first', '2014', 'IT Division'),
(2, 'Anti Virus Installation edited', 'Nos', '40', '60', '50', '40', '30', 'first', '2014', 'IT Division'),
(3, 'Hard Disk replacement edited', 'Nos', '50', '50', '40', '30', '20', 'first', '2014', 'IT Division');

-- --------------------------------------------------------

--
-- Table structure for table `workformstatus`
--

CREATE TABLE IF NOT EXISTS `workformstatus` (
  `DivisionName` varchar(50) DEFAULT NULL,
  `DivisionChief` varchar(50) DEFAULT NULL,
  `Quarter` varchar(20) DEFAULT NULL,
  `Date` varchar(20) DEFAULT NULL,
  `Year` varchar(20) DEFAULT NULL,
  `SubmitStatus` varchar(20) DEFAULT NULL,
  `ApproveStatus` varchar(20) DEFAULT NULL,
  `AdminDataChange` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workformstatus`
--

INSERT INTO `workformstatus` (`DivisionName`, `DivisionChief`, `Quarter`, `Date`, `Year`, `SubmitStatus`, `ApproveStatus`, `AdminDataChange`) VALUES
('HR Division', 'Ronald Subba', 'first', '10/04/2014', '2014', 'yes', 'Approved', NULL),
('RTE Division', 'Aashique Ali', 'first', '10/04/2014', '2014', 'yes', 'Approved', NULL),
('IT Division', 'Dipkar Uprety', 'first', '27/04/2014', '2014', 'yes', 'Approved', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

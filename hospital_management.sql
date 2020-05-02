-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2018 at 05:36 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hospital_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `dateofappointment` varchar(255) NOT NULL,
  `problem` varchar(255) NOT NULL,
  `confirmation` int(11) NOT NULL,
  `attended` int(11) NOT NULL,
  `prid` int(11) DEFAULT NULL,
  `delivered` int(11) DEFAULT NULL,
  PRIMARY KEY (`aid`),
  UNIQUE KEY `prid` (`prid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`aid`, `pid`, `did`, `dateofappointment`, `problem`, `confirmation`, `attended`, `prid`, `delivered`) VALUES
(1, 1, 1, '0000-00-00', 'sdfhsdkf', 2, 0, NULL, 0),
(2, 4, 8, '19/12/2017', 'stomach pain', 1, 1, 2, 1),
(3, 2, 7, '19/12/2017', 'kdsjnfiemxvvklslhdlwf', 0, 0, NULL, 0),
(4, 4, 1, '19/12/2017', 'stunt', 1, 1, 4, 1),
(5, 4, 1, '19/12/2017', 'stunt', 1, 1, 5, 0),
(6, 1, 8, '25/12/2017', 'vomitings', 1, 1, 6, 1),
(7, 1, 7, '07/06/2018', 'Itching on hand and legs', 0, 0, NULL, 0),
(8, 5, 9, '23/08/2018', 'rashes', 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `dno` int(5) NOT NULL AUTO_INCREMENT,
  `dname` varchar(20) NOT NULL,
  PRIMARY KEY (`dno`),
  UNIQUE KEY `dname` (`dname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dno`, `dname`) VALUES
(1, 'Cardiology'),
(2, 'Dental'),
(3, 'Dermatology'),
(4, 'Diabetology'),
(5, 'Endocrinology'),
(6, 'ENT'),
(7, 'Eye'),
(8, 'Gastrology'),
(9, 'General'),
(10, 'Neurology'),
(11, 'Orthopaedics'),
(13, 'Paediatrics'),
(14, 'Psychology'),
(12, 'Pulmonology');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `doctor_id` int(11) NOT NULL AUTO_INCREMENT,
  `dno` int(5) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` int(5) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `place` varchar(15) NOT NULL,
  `aadhar` bigint(15) NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`doctor_id`),
  UNIQUE KEY `aadhar` (`aadhar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `dno`, `password`, `status`, `fname`, `lname`, `email`, `mobile`, `gender`, `place`, `aadhar`, `dob`) VALUES
(1, 1, 'Prasanth@123', 1, 'Prasanth', 'Sikakollu', '', '8106268127', 'Male', 'Vijayawada', 655394121120, '2016-11-30'),
(5, 2, 'Prasanth@123', 0, 'Prasanth', 'Sikakollu', 'prasanth.sikakollu12@gmail.com', '8106268128', 'Male', 'Vijayawada', 655394121121, '2016-11-30'),
(7, 3, 'Prasanth@123', 1, 'Prasanth', 'Sikakollu', 'prasanth.sikakollu12@gmail.com', '8106268128', 'Male', 'Vijayawada', 655394121122, '1998-05-29'),
(8, 8, 'Harin@123', 1, 'Harin Santosh', 'Dabbiru', 'harindabbiru@gmail.com', '9493418254', 'Male', 'Amadalavalasa', 789654123012, '1999-10-05'),
(9, 3, '741258963012', 1, 'Asutosh ', 'Palanki', 'asutoshnasa@gmail.com', '8309334023', 'Male', 'Vijayawada', 741258963012, '1998-11-30'),
(10, 12, '546987563215', 1, 'Abhishek', 'Desai', 'abhishek2424@yahoo.com', '7986456612', 'Male', 'Vijayawada', 546987563215, '1998-12-02'),
(11, 4, '478596321455', 1, 'Rohith ', 'Manikanta', 'msdcsk07@yahoo.com', '8549732143', 'Male', 'Vijayawada', 478596321455, '1998-06-06'),
(12, 5, '345236987452', 1, 'Saleem', 'Basha', 'saleembasha@gmail.com', '8546321478', 'Male', 'Vijayawada', 345236987452, '1998-11-23'),
(13, 6, '598746321453', 1, 'Lokesh', 'Kadagala', 'lokeshkadagala@gmail.com', '7854123698', 'Male', 'Vijayawada', 598746321453, '1998-11-05'),
(14, 7, '547896321145', 1, 'Yash', 'Kinger', 'yashkinger@gmail.com', '9874521369', 'Male', 'Vijayawada', 547896321145, '1998-05-12'),
(15, 9, '569874125547', 1, 'Supriya', 'Sadhu', 'supriyasadhu@gmail.com', '8546321478', 'Female', 'Vijayawada', 569874125547, '1998-10-30'),
(16, 10, '698745214598', 1, 'Sailaja', 'Sailu', 'sailajasailu@gmail.com', '7895463212', 'Female', 'Vijayawada', 698745214598, '1998-12-14'),
(17, 11, '458796632114', 1, 'Chiranjeevi', 'Chiru', 'chiruchiranjeevi@gmail.com', '7979233713', 'Female', 'Srikakulam', 458796632114, '1997-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `pid` int(8) NOT NULL AUTO_INCREMENT,
  `aadhar` bigint(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `place` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `age` int(5) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `aadhar` (`aadhar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `aadhar`, `fname`, `lname`, `mobile`, `email`, `gender`, `place`, `dob`, `age`, `password`) VALUES
(1, 655394121121, 'Prasanth', 'Sikakollu', '8106268128', 'prasanth.sikakollu12@gmail.com', 'Male', 'Vijayawada', '1998-05-29', 19, 'Prasanth@123'),
(4, 655394121120, 'Prasanth', 'Sikakollu', '8106268128', 'prasanth.sikakollu12@gmail.com', 'Male', 'Vijayawada', '1998-05-29', 19, 'Prasanth@123'),
(5, 254978965412, 'Prasanth', 'Sikakollu', '8639787330', 'prasanth.sikakollu12@gmail.com', 'Male', 'Vijayawada', '1998-05-29', 20, 'Prashu@123');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_lines`
--

CREATE TABLE IF NOT EXISTS `prescription_lines` (
  `prid` int(11) NOT NULL,
  `lineno` int(11) NOT NULL,
  `medicine` varchar(255) NOT NULL,
  `mbf` int(11) NOT NULL,
  `maf` int(11) NOT NULL,
  `abf` int(11) NOT NULL,
  `aaf` int(11) NOT NULL,
  `nbf` int(11) NOT NULL,
  `naf` int(11) NOT NULL,
  `cost` double NOT NULL,
  `qty` int(11) NOT NULL,
  `amt` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription_lines`
--

INSERT INTO `prescription_lines` (`prid`, `lineno`, `medicine`, `mbf`, `maf`, `abf`, `aaf`, `nbf`, `naf`, `cost`, `qty`, `amt`) VALUES
(4, 1, 'Cold', 0, 0, 0, 1, 0, 0, 5, 5, 25),
(4, 2, 'Paracetamol', 0, 0, 0, 0, 0, 1, 2, 5, 10),
(4, 3, 'Digene', 0, 1, 0, 1, 0, 1, 100, 1, 100),
(5, 1, 'Cold', 0, 1, 0, 1, 0, 0, 0, 5, 0),
(5, 2, 'Paracetamol', 0, 1, 0, 0, 0, 1, 0, 5, 0),
(2, 1, 'Digene', 0, 0, 0, 1, 0, 1, 50, 1, 50),
(6, 1, 'gytf', 0, 0, 0, 1, 0, 1, 25, 1, 25),
(6, 2, 'bbhvtbj', 1, 0, 0, 0, 0, 0, 10, 2, 20),
(6, 3, 'bjhbuyh', 0, 0, 0, 0, 0, 1, 20, 3, 60);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `password` varchar(15) NOT NULL,
  `job` int(5) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1006 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `password`, `job`) VALUES
(1001, 'prasanth', 1),
(1002, 'prasanth', 2),
(1003, 'prasanth', 3),
(1004, 'prasanth', 4),
(1005, 'prasanth', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2018 at 10:40 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intelbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `username`, `email`, `pass`) VALUES
('admin', 'admin123', 'admin@somaiya.edu', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `e_sub1`
--

CREATE TABLE `e_sub1` (
  `jan` double DEFAULT NULL,
  `feb` double DEFAULT NULL,
  `mar` double DEFAULT NULL,
  `apr` double DEFAULT NULL,
  `may` double DEFAULT NULL,
  `email` text,
  `rollno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e_sub1`
--

INSERT INTO `e_sub1` (`jan`, `feb`, `mar`, `apr`, `may`, `email`, `rollno`) VALUES
(45, 23, 35, 0, 5, 'hussain.r@somaiya.edu', 1514040),
(56, 34, 0, 20, 0, 'niket.kini@somaiya.edu', 1514025);

-- --------------------------------------------------------

--
-- Table structure for table `e_sub2`
--

CREATE TABLE `e_sub2` (
  `jan` double DEFAULT NULL,
  `feb` double DEFAULT NULL,
  `mar` double DEFAULT NULL,
  `apr` double DEFAULT NULL,
  `may` double DEFAULT NULL,
  `email` text,
  `rollno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `e_sub3`
--

CREATE TABLE `e_sub3` (
  `jan` double DEFAULT NULL,
  `feb` double DEFAULT NULL,
  `mar` double DEFAULT NULL,
  `apr` double DEFAULT NULL,
  `may` double DEFAULT NULL,
  `email` text,
  `rollno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `e_sub4`
--

CREATE TABLE `e_sub4` (
  `jan` double DEFAULT NULL,
  `feb` double DEFAULT NULL,
  `mar` double DEFAULT NULL,
  `apr` double DEFAULT NULL,
  `may` double DEFAULT NULL,
  `email` text,
  `rollno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `e_sub5`
--

CREATE TABLE `e_sub5` (
  `jan` double DEFAULT NULL,
  `feb` double DEFAULT NULL,
  `mar` double DEFAULT NULL,
  `apr` double DEFAULT NULL,
  `may` double DEFAULT NULL,
  `email` text,
  `rollno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `f_register`
--

CREATE TABLE `f_register` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_register`
--

INSERT INTO `f_register` (`name`, `email`, `dept`, `pass`) VALUES
('Purnima Ahirao', 'purnimaahirao@somaiya.edu', 'cs', 'purnima123');

-- --------------------------------------------------------

--
-- Table structure for table `o_sub1`
--

CREATE TABLE `o_sub1` (
  `jul` double DEFAULT NULL,
  `aug` double DEFAULT NULL,
  `sept` double DEFAULT NULL,
  `oct` double DEFAULT NULL,
  `nov` double DEFAULT NULL,
  `email` text,
  `rollno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `o_sub1`
--

INSERT INTO `o_sub1` (`jul`, `aug`, `sept`, `oct`, `nov`, `email`, `rollno`) VALUES
(23, 24, 25, 26, 27, 'niket.kini@soma.edu', 1514025);

-- --------------------------------------------------------

--
-- Table structure for table `o_sub2`
--

CREATE TABLE `o_sub2` (
  `jul` double DEFAULT NULL,
  `aug` double DEFAULT NULL,
  `sept` double DEFAULT NULL,
  `oct` double DEFAULT NULL,
  `nov` double DEFAULT NULL,
  `email` text,
  `rollno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `o_sub3`
--

CREATE TABLE `o_sub3` (
  `jul` double DEFAULT NULL,
  `aug` double DEFAULT NULL,
  `sept` double DEFAULT NULL,
  `oct` double DEFAULT NULL,
  `nov` double DEFAULT NULL,
  `email` text,
  `rollno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `o_sub4`
--

CREATE TABLE `o_sub4` (
  `jul` double DEFAULT NULL,
  `aug` double DEFAULT NULL,
  `sept` double DEFAULT NULL,
  `oct` double DEFAULT NULL,
  `nov` double DEFAULT NULL,
  `email` text,
  `rollno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `o_sub5`
--

CREATE TABLE `o_sub5` (
  `jul` double DEFAULT NULL,
  `aug` double DEFAULT NULL,
  `sept` double DEFAULT NULL,
  `oct` double DEFAULT NULL,
  `nov` double DEFAULT NULL,
  `email` text,
  `rollno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p_register`
--

CREATE TABLE `p_register` (
  `name` varchar(50) NOT NULL,
  `child_name` varchar(50) NOT NULL,
  `child_roll` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_register`
--

INSERT INTO `p_register` (`name`, `child_name`, `child_roll`, `email`, `pass`) VALUES
('Kakarot', 'Dhruv Gada', 1514016, 'kakarot@somaiya.edu', 'gohan'),
('balwant', 'Prasad Gujar', 1514019, 'balwant@somaiya.edu', 'balwant123');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rollno` int(11) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`name`, `email`, `rollno`, `pass`) VALUES
('Abhishek Doshi', 'abhi@somaiya.edu', 1514015, 'abhi123'),
('Dhruv Gada', 'dhruv.gada@somaiya.edu', 1514016, 'dhruv123'),
('Hussain', 'hussain.r@somaiya.edu', 1514040, 'hussain123'),
('Mehul Chudasama', 'mehul.chudasama@somaiya.edu', 1514011, 'mehul123'),
('Prasad Gujar', 'prasad.gujar@somaiya.edu', 1514019, 'prasad123'),
('Rishi Ghai', 'rishi.ghai@somaiya.edu', 1514018, 'rishi123'),
('Shardul Aeer', 'trump.aeer@somaiya.edu', 1514003, 'trump123'),
('Sneha Dama', 'sneha.dama@somaiya.edu', 1514012, 'sneha123'),
('Soham Hichkad', 'soham.hichkad@somaiya.edu', 1514021, 'soham123');

-- --------------------------------------------------------

--
-- Table structure for table `sem`
--

CREATE TABLE `sem` (
  `sem1` double NOT NULL DEFAULT '0',
  `sem2` double NOT NULL DEFAULT '0',
  `sem3` double NOT NULL DEFAULT '0',
  `sem4` double NOT NULL DEFAULT '0',
  `sem5` double NOT NULL DEFAULT '0',
  `sem6` double NOT NULL DEFAULT '0',
  `sem7` double NOT NULL DEFAULT '0',
  `sem8` double NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL,
  `rollno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem`
--

INSERT INTO `sem` (`sem1`, `sem2`, `sem3`, `sem4`, `sem5`, `sem6`, `sem7`, `sem8`, `email`, `rollno`) VALUES
(7.9, 7.6, 7.8, 7.83, 0, 0, 0, 0, 'mehul.chudasama@somaiya.edu', 1514011),
(7.9, 7.6, 8, 8.3, 0, 0, 0, 0, 'dhruv.gada@somaiya.edu', 1514016),
(9, 9, 9, 9, 0, 0, 0, 0, 'soham.hichkad@somaiya.edu', 1514021),
(9, 9, 9, 9, 0, 0, 0, 0, 'prasad.gujar@somaiya.edu', 1514019),
(7, 7, 7, 7, 0, 0, 0, 0, 'add@somaiya.edu', 1514015),
(8, 8.5, 8.7, 7.8, 0, 0, 0, 0, 'rishi.ghai@somaiya.edu', 1514018),
(7, 7.6, 8, 8.2, 0, 0, 0, 0, 'sneha.dama@somaiya.edu', 1514012),
(8.5, 8.3, 7.5, 7.4, 10, 9, 0, 0, 'trump.aeer@somaiya.edu', 1514003);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uploadsa`
--

CREATE TABLE `uploadsa` (
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploadsa`
--

INSERT INTO `uploadsa` (`path`) VALUES
('uploads/odd.xlsx');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `f_register`
--
ALTER TABLE `f_register`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

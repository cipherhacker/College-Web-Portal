-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 07:26 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

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
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `date` date NOT NULL,
  `details` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `rollno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rollno` int(11) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`name`, `email`, `rollno`, `password`) VALUES
('Abhishek Doshi', 'add@somaiya.edu', 1514015, 'abhi123'),
('Dhruv Gada', 'dhruv.gada@somaiya.edu', 1514016, 'dhruv123'),
('Mehul Chudasama', 'mehul.chudasama@somaiya.edu', 1514011, 'mehul123'),
('Prasad Gujar', 'prasad.gujar@somaiya.edu', 1514019, 'prasad123'),
('Purnima Ahirao', 'purnimaahirao@somaiya.edu', 1, 'purnima123'),
('Rishi Ghai', 'rishi.ghai@somaiya.edu', 1514018, 'rishi123'),
('Sneha Dama', 'sneha.dama@somaiya.edu', 1514012, 'sneha123'),
('Soham Hichkad', 'soham.hichkad@somaiya.edu', 1514021, 'soham123'),
('Shardul Aeer', 'trump.aeer@somaiya.edu', 1514003, 'trump123');

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
(8.1, 8.5, 8.4, 8.8, 0, 0, 0, 0, 'dhruv.gada@somaiya.edu', 1514016);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`path`) VALUES
('uploads/wpsem.xls');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD KEY `email` (`email`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`email`) REFERENCES `register` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

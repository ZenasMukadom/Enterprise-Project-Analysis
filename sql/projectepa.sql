-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 09:19 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectepa`
--
CREATE Database projectepa;
-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empid` varchar(50) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Salary` int(50) NOT NULL,
  `Contact` int(100) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `Firstname`, `Lastname`, `Username`, `Pass`, `usertype`, `Designation`, `Department`, `Email`, `Salary`, `Contact`, `Date`) VALUES
('10', 'user10', 'user10name', 'user10', 'user10', 'user', 'App dev', 'cmpn', 'user10@gmail.com', 170000, 928376382, '2004-03-08'),
('11', 'user11', 'user11name', 'user11', 'user11', 'user', 'App dev', 'cmpn', 'user11@gmail.com', 170000, 2147483647, '2005-03-08'),
('12', 'user12', 'user12name', 'user12', 'user12', 'user', 'Ux Designer', 'cmpn', 'user12@gmail.com', 270000, 2147483647, '2006-03-08'),
('13', 'user13', 'user13name', 'user13', 'user13', 'user', 'Ux Designer', 'cmpn', 'user13@gmail.com', 220000, 2147483647, '2006-08-08'),
('14', 'user14', 'user14name', 'user14', 'user14', 'user', 'Full Stack', 'cmpn', 'user14@gmail.com', 221000, 2147483647, '2006-12-03'),
('15', 'user15', 'user15name', 'user15', 'user15', 'user', 'Full Stack', 'cmpn', 'user15@gmail.com', 19000, 2147483647, '2007-01-06'),
('16', 'user16', 'user16name', 'user16', 'user16', 'user', 'Mean Stack', 'cmpn', 'user16@gmail.com', 29000, 2147483647, '2007-04-09'),
('17', 'user17', 'user17name', 'user17', 'user17', 'user', 'Mean Stack', 'cmpn', 'user17@gmail.com', 39000, 2147483647, '2007-05-09'),
('18', 'user18', 'user18name', 'user18', 'user18', 'user', 'Mean Stack', 'cmpn', 'user18@gmail.com', 32000, 2147483647, '2009-05-09'),
('19', 'user19', 'user19name', 'user19', 'user19', 'user', 'Full Stack', 'cmpn', 'user19@gmail.com', 52000, 2147483647, '2009-08-21'),
('2', 'user2', 'user2name', 'user2', 'user2', 'user', 'Web dev', 'cmpn', 'user2@gmail.com', 2439999, 2147483647, '1990-02-02'),
('20', 'user20', 'user20name', 'user20', 'user20', 'user', 'Full Stack', 'cmpn', 'user20@gmail.com', 57000, 2147483647, '2010-11-30'),
('21', 'user21', 'user21name', 'user21', 'user21', 'user', 'Frame Specialist', 'cmpn', 'user21@gmail.com', 58000, 2147483647, '2010-12-30'),
('22', 'user22', 'user22name', 'user22', 'user22', 'user', 'Frame Specialist', 'cmpn', 'user22@gmail.com', 18000, 2147483647, '2011-05-07'),
('23', 'user23', 'user23name', 'user23', 'user23', 'user', 'Frame Specialist', 'cmpn', 'user23@gmail.com', 28000, 2147483647, '2011-07-20'),
('24', 'user24', 'user24name', 'user24', 'user24', 'user', 'Frame Specialist', 'cmpn', 'user24@gmail.com', 38000, 2147483647, '2011-09-20'),
('25', 'user25', 'user25name', 'user25', 'user25', 'user', 'Frame Specialist', 'cmpn', 'user25@gmail.com', 88000, 2147483647, '2011-10-30'),
('26', 'user26', 'user26name', 'user26', 'user26', 'user', 'Frame Specialist', 'cmpn', 'user26@gmail.com', 80000, 2147483647, '2012-05-05'),
('27', 'user27', 'user27name', 'user27', 'user27', 'user', 'Frame Specialist', 'cmpn', 'user27@gmail.com', 90000, 2147483647, '2012-08-09'),
('28', 'user28', 'user28name', 'user28', 'user28', 'user', 'DB Dev', 'cmpn', 'user28@gmail.com', 60000, 2147483647, '2013-10-16'),
('29', 'user29', 'user29name', 'user29', 'user29', 'user', 'DB Dev', 'cmpn', 'user29@gmail.com', 30000, 913432482, '2015-04-27'),
('3', 'user3', 'user3name', 'user3', 'user3', 'user', 'Front dev', 'cmpn', 'user3@gmail.com', 242999, 983737732, '2001-01-07'),
('30', 'user30', 'user30name', 'user30', 'user30', 'user', 'DB Dev', 'cmpn', 'user30@gmail.com', 60000, 913432482, '2015-05-14'),
('4', 'user4', 'user4name', 'user4', 'user4', 'user', 'App dev', 'cmpn', 'user4@gmail.com', 150000, 928376382, '2003-09-01'),
('5', 'bob', 'mukadom', 'sha1', 'sha1', 'user', 'mean stack', 'cmpn', 'aaronshadow7@gmail.com', 25000, 2147483647, '1998-03-04'),
('6', 'dave', 'mukadom', 'sha2', 'sha2', 'user', 'mean stack', 'cmpn', 'aaronshadow7@gmail.com', 25000, 2147483647, '1998-03-04'),
('7', 'ted', 'mukadom', 'sha3', 'sha3', 'user', 'mean stack', 'cmpn', 'aaronshadow7@gmail.com', 25000, 2147483647, '1998-03-04'),
('8', 'barney', 'flynn', 'admin123', 'admin123', 'admin', 'full stack', 'comps', 'barney@gmail.com', 100000, 2147483647, '1998-03-04'),
('9', 'jack', 'ryan', 'jackr', 'jackr', 'user', 'support dev', 'cmpn', 'jackryan@gmail.com', 500000, 2147483647, '1990-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projectname` varchar(100) DEFAULT NULL,
  `projectid` varchar(100) NOT NULL,
  `projectdesc` varchar(255) NOT NULL,
  `projectleader` varchar(100) DEFAULT NULL,
  `projectcompletionaverage` int(50) DEFAULT NULL,
  `startdate` varchar(50) NOT NULL,
  `enddate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectname`, `projectid`, `projectdesc`, `projectleader`, `projectcompletionaverage`, `startdate`, `enddate`) VALUES
('erp', '1', 'asasdasdasdadadasd', 'zenas', 90, '22-03-2019', '22-06-2019'),
('salesman tracking system', '10', 'this system is used to track activities of the salesman.', 'zenas', 0, '15-05-2019', '20-09-2019'),
('online shopping site', '11', 'this system is used for shopping online.', 'alisha', 340, '01-04-2019', '03-09-2019'),
('sap', '2', 'gfdgdfgdgdfgdf', 'diparth', 0, '22-04-2019', '23-09-2020'),
('sas', '3', 'asdasdasda', 'ted', 0, '29-04-2019', '30-07-2019'),
('asdasd', '5', 'asdasdasd', 'asasddasdada', 0, '02-12-2018', '04-04-2019'),
('sababab', '7', 'absbabsab', 'sbasbasb', 0, '24-03-2019', '24-06-2019');

-- --------------------------------------------------------

--
-- Table structure for table `subtask`
--

CREATE TABLE `subtask` (
  `projectid` varchar(100) NOT NULL,
  `taskid` varchar(100) NOT NULL,
  `subtaskid` varchar(100) NOT NULL,
  `subtaskname` varchar(100) DEFAULT NULL,
  `empid` varchar(100) NOT NULL,
  `subtaskcompletionaverage` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subtask`
--

INSERT INTO `subtask` (`projectid`, `taskid`, `subtaskid`, `subtaskname`, `empid`, `subtaskcompletionaverage`) VALUES
('1', '1', '1', 'front-end', '9', 30),
('1', '1', '2', 'back-end', '7', 50),
('1', '2', '1', 'unit testing', '8', 10),
('10', '1', '1', 'requirement gathering', '5', 0),
('10', '1', '2', 'specifications', '6', 0),
('10', '1', '3', 'design', '4', 0),
('10', '2', '1', 'front end', '3', 0),
('10', '2', '2', 'backend', '2', 0),
('10', '2', '3', 'database', '10', 0),
('10', '3', '1', 'unit testing', '11', 0),
('10', '3', '2', 'integration testing', '12', 0),
('10', '3', '3', 'system testing', '13', 0),
('11', '1', '1', 'requirement gathering', '14', 70),
('11', '1', '2', 'specifications', '15', 60),
('11', '1', '3', 'design', '16', 40),
('11', '2', '1', 'front end', '17', 50),
('11', '2', '2', 'backend ', '18', 60),
('11', '2', '3', 'database', '19', 60),
('5', '1', '1', 'ggbyhbh', '8', 70),
('7', '1', '1', 'sbasbsab', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `projectid` varchar(100) NOT NULL,
  `taskname` varchar(100) DEFAULT NULL,
  `taskid` varchar(100) NOT NULL,
  `taskcompletionaverage` int(50) DEFAULT NULL,
  `startdate` varchar(50) NOT NULL,
  `enddate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`projectid`, `taskname`, `taskid`, `taskcompletionaverage`, `startdate`, `enddate`) VALUES
('1', 'coding', '1', 80, '23-03.2019', '30-03-2019'),
('1', 'testing', '2', 10, '02-04-3019', '21-04-3019'),
('10', 'planning', '1', 0, '15-05-2019', '25-5-2019'),
('10', 'coding', '2', 0, '20-05-2019', '30-08-2019'),
('10', 'testing', '3', 0, '30-06-2019', '11-09-2019'),
('11', 'planning', '1', 170, '01-04-2019', '25-04-2019'),
('11', 'coding', '2', 170, '20-04-2019', '01-08-2019'),
('3', 'planning', '1', 0, '29-04-2019', '30-05-2019'),
('5', 'sadsadsad', '1', 60, '01-01-2019', '02-03-2019'),
('7', 'sbasbab', '1', 0, '24-03-2019', '07-04-2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectid`);

--
-- Indexes for table `subtask`
--
ALTER TABLE `subtask`
  ADD PRIMARY KEY (`projectid`,`taskid`,`subtaskid`,`empid`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`projectid`,`taskid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

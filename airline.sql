-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 06, 2017 at 05:36 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airline`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `pid` varchar(10) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `pmobile` varchar(20) NOT NULL,
  `pemailid` varchar(25) NOT NULL,
  `paddress` varchar(50) NOT NULL,
  `pseatno` varchar(10) NOT NULL,
  `flightno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`pid`, `pname`, `pmobile`, `pemailid`, `paddress`, `pseatno`, `flightno`) VALUES
('1483631796', 'Smb', '8904452325', 'smb@gmail.com', 'PESIT,Bangalore', 'p0', 'F001'),
('1483634853', 'shankar', '9916254421', 'shankar@gmail.com', 'PSEIT,Bangalore', 'p106', 'F004'),
('1483556371', 'Chandru', '9872872872', 'chandru872@gmail.com', 'Haggribhommana Halli,Karnataka', 'p112', 'F003'),
('1483556945', 'Ram', '9549549549', 'lodRam@gmail.com', 'Raameshwara,Tamil Nadu', 'p115', 'F003'),
('u6', 'Bob', '9121121121', 'B4@bob.com', 'Beggars Colony,Bangalore', 'p121', 'F005'),
('1483556945', 'Ram', '9549549549', 'lodRam@gmail.com', 'Raameshwara,Tamil Nadu', 'p122', 'F003'),
('u7', 'Ashish', '9123123123', 'kid@henti.com', 'Jaya Akka Nagar,Bangalore', 'p123', 'F001'),
('u2', 'Varun', '9126126126', '69@lol.com', 'Ra Tri Nagar,Delhi', 'p126', 'F002'),
('1483634853', 'shankar', '9916254421', 'shankar@gmail.com', 'PSEIT,Bangalore', 'p128', 'F004'),
('1483631796', 'Smb', '8904452325', 'smb@gmail.com', 'PESIT,Bangalore', 'p13', 'F001'),
('u8', 'Xyz', '9135135135', 'none@email.com', 'Malgudi,Bangalore', 'p135', 'F001'),
('u4', 'Rajkumara', '7123123123', 'raj@kumara.com', 'Sadashiv Nagar', 'p141', 'F003'),
('u1', 'Alice', '9143143143', 'alice@ilu.com', 'Lombards,Bangalore', 'p143', 'F001'),
('1483556371', 'Chandru', '9872872872', 'chandru872@gmail.com', 'Haggribhommana Halli,Karnataka', 'p144', 'F003'),
('1483631796', 'Smb', '8904452325', 'smb@gmail.com', 'PESIT,Bangalore', 'p21', 'F003'),
('1483631796', 'Smb', '8904452325', 'smb@gmail.com', 'PESIT,Bangalore', 'p22', 'F003'),
('1483631796', 'Smb', '8904452325', 'smb@gmail.com', 'PESIT,Bangalore', 'p23', 'F003'),
('u5', 'Cherry', '8908908901', 'cherry890@gmail.com', 'Morbin,Jaipur', 'p28', 'F004'),
('u3', 'Rajkumara', '7123123123', 'raj@kumara.com', 'Sadashiv Nagar', 'p36', 'F003'),
('u6', 'Bob', '9121121121', 'B4@bob.com', 'Beggars Colony,Bangalore', 'p37', 'F001'),
('u3', 'Rajkumara', '7123123123', 'raj@kumara.com', 'Sadashiv Nagar', 'p40', 'F003'),
('u6', 'Bob', '9121121121', 'B4@bob.com', 'Beggars Colony,Bangalore', 'p44', 'F001'),
('u5', 'Cherry', '8908908901', 'cherry890@gmail.com', 'Morbin,Jaipur', 'p44', 'F004'),
('u6', 'Bob', '9121121121', 'B4@bob.com', 'Beggars Colony,Bangalore', 'p45', 'F005'),
('u5', 'Cherry', '8908908901', 'cherry890@gmail.com', 'Morbin,Jaipur', 'p46', 'F004'),
('1483631796', 'Smb', '8904452325', 'smb@gmail.com', 'PESIT,Bangalore', 'p5', 'F001'),
('u3', 'Rajkumara', '7123123123', 'raj@kumara.com', 'Sadashiv Nagar', 'p51', 'F003'),
('u6', 'Bob', '9121121121', 'B4@bob.com', 'Beggars Colony,Bangalore', 'p55', 'F001'),
('u4', 'Preetham', '9074074074', 'psych@machha!.com', 'Valkyre Nagar,Bangalore', 'p74', 'F001'),
('u6', 'Bob', '9121121121', 'B4@bob.com', 'Beggars Colony,Bangalore', 'p77', 'F005'),
('1483556945', 'Ram', '9549549549', 'lodRam@gmail.com', 'Raameshwara,Tamil Nadu', 'p79', 'F003'),
('u1', 'Alice', '9143143143', 'alice@ilu.com', 'Lombards,Bangalore', 'p95', 'F001'),
('1483556371', 'Chandru', '9872872872', 'chandru872@gmail.com', 'Haggribhommana Halli,Karnataka', 'p96', 'F003'),
('1483634853', 'shankar', '9916254421', 'shankar@gmail.com', 'PSEIT,Bangalore', 'p97', 'F004');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flightno` varchar(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `fromloc` varchar(20) NOT NULL,
  `toloc` varchar(20) NOT NULL,
  `depdate` date NOT NULL,
  `deptime` time NOT NULL,
  `arrdate` date NOT NULL,
  `arrtime` time NOT NULL,
  `seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='flight details';

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flightno`, `fname`, `fromloc`, `toloc`, `depdate`, `deptime`, `arrdate`, `arrtime`, `seats`) VALUES
('F001', 'AIR INDIA', 'BANGALORE', 'HYDERABAD', '2017-01-18', '03:33:00', '2017-01-18', '07:27:00', 150),
('F002', 'GOAIR', 'NEW DELHI', 'CHENNAI', '2016-12-14', '10:13:00', '2016-12-14', '16:46:00', 160),
('F003', 'SPICEJET', 'MUMBAI', 'KOLKATA', '2017-01-26', '05:21:00', '2017-01-26', '08:38:00', 150),
('F004', 'INDIGO', 'JAIPUR', 'RANCHI', '2017-01-17', '11:00:00', '2017-01-17', '16:00:00', 150),
('F005', 'AIRASIA', 'BANGALORE', 'HYDERABAD', '2017-01-18', '07:29:00', '2017-01-18', '11:00:00', 170);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `pid` varchar(10) NOT NULL DEFAULT 'guest',
  `pname` varchar(20) NOT NULL,
  `pmobile` varchar(20) NOT NULL,
  `pemailid` varchar(25) NOT NULL,
  `paddress` varchar(50) NOT NULL,
  `ppassword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`pid`, `pname`, `pmobile`, `pemailid`, `paddress`, `ppassword`) VALUES
('1483556371', 'Chandru', '9872872872', 'chandru872@gmail.com', 'Haggribhommana Halli,Karnataka', 'chandru'),
('1483556945', 'Ram', '9549549549', 'lodRam@gmail.com', 'Raameshwara,Tamil Nadu', 'ram'),
('1483631796', 'Smb', '8904452325', 'smb@gmail.com', 'PESIT,Bangalore', 'smb'),
('1483634853', 'shankar', '9916254421', 'shankar@gmail.com', 'PSEIT,Bangalore', 'shankar'),
('u1', 'Alice', '9143143143', 'alice@ilu.com', 'Lombards,Bangalore', 'alice'),
('u2', 'Varun', '9126126126', '69@lol.com', 'Ra Tri Nagar,Delhi', 'varun'),
('u3', 'Rajkumara', '7123123123', 'raj@kumara.com', 'Sadashiv Nagar', 'rajkumara'),
('u4', 'Preetham', '9074074074', 'psych@machha!.com', 'Valkyre Nagar,Bangalore', 'preetham'),
('u5', 'Cherry', '8908908901', 'cherry890@gmail.com', 'Morbin,Jaipur', 'cherry'),
('u6', 'Bob', '9121121121', 'B4@bob.com', 'Beggars Colony,Bangalore', 'bob'),
('u7', 'Ashish', '9123123123', 'kid@henti.com', 'Jaya Akka Nagar,Bangalore', 'ashish'),
('u8', 'Xyz', '9135135135', 'none@email.com', 'Malgudi,Bangalore', 'xyz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`pseatno`,`flightno`),
  ADD KEY `foreign_key` (`flightno`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flightno`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `pmobile` (`pmobile`),
  ADD KEY `pemailid` (`pemailid`),
  ADD KEY `pname` (`pname`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `foreign_key` FOREIGN KEY (`flightno`) REFERENCES `flight` (`flightno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pid_for_key` FOREIGN KEY (`pid`) REFERENCES `user` (`pid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

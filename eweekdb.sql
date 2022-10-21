-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 06:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eweekdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `adminid` int(11) NOT NULL,
  `adminname` varchar(50) NOT NULL,
  `adminemail` varchar(50) NOT NULL,
  `adminpassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlog`
--

INSERT INTO `adminlog` (`adminid`, `adminname`, `adminemail`, `adminpassword`) VALUES
(1, 'Anuka Mithara Karunanayaka', 'anukamithara@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `athlatics`
--

CREATE TABLE `athlatics` (
  `eventid` int(11) NOT NULL,
  `gameid` int(11) NOT NULL,
  `playerid` varchar(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `points` decimal(4,2) NOT NULL,
  `comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `athlatics`
--

INSERT INTO `athlatics` (`eventid`, `gameid`, `playerid`, `rank`, `points`, `comments`) VALUES
(1, 17, '2018/E/003', 1, '20.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `creativeactivities`
--

CREATE TABLE `creativeactivities` (
  `eventid` int(11) NOT NULL,
  `gameid` int(11) NOT NULL,
  `playerid` varchar(11) NOT NULL,
  `points` decimal(4,2) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `creativeactivities`
--

INSERT INTO `creativeactivities` (`eventid`, `gameid`, `playerid`, `points`, `rank`) VALUES
(1, 10, '2019/E/054', '10.00', 2),
(2, 10, '2021/E/069', '20.00', 1),
(3, 12, '2020/E/044', '20.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `gameid` int(11) NOT NULL,
  `gamename` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`gameid`, `gamename`, `type`) VALUES
(1, 'Cricket', 'Team'),
(2, 'Volleyball', 'Team'),
(3, 'Netball', 'Team'),
(4, 'Elle', 'Team'),
(5, 'Table tennis', 'Solo'),
(6, 'Table tennis', 'Team'),
(7, 'Badminton', 'Solo'),
(8, 'Badminton', 'Team'),
(9, 'Chess', 'Solo'),
(10, 'Singing', 'Solo'),
(11, 'Drawing', 'Solo'),
(12, 'Dancing', 'Solo'),
(13, 'Poem writing', 'Solo'),
(14, 'Running 100m', 'Solo'),
(15, 'Running 800m', 'Solo'),
(16, 'Running 3000m', 'Solo'),
(17, 'Hurdles', 'Solo'),
(18, 'Long jump', 'Solo'),
(19, 'Carom', 'Solo');

-- --------------------------------------------------------

--
-- Table structure for table `groupspactivities`
--

CREATE TABLE `groupspactivities` (
  `eventid` int(11) NOT NULL,
  `gameid` int(11) NOT NULL,
  `team1id` int(11) NOT NULL,
  `team2id` int(11) NOT NULL,
  `win` int(11) NOT NULL,
  `team1_points` decimal(4,2) NOT NULL,
  `team2_points` decimal(4,2) NOT NULL,
  `comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groupspactivities`
--

INSERT INTO `groupspactivities` (`eventid`, `gameid`, `team1id`, `team2id`, `win`, `team1_points`, `team2_points`, `comments`) VALUES
(1, 2, 1, 2, 1, '99.99', '50.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `individualspactivities`
--

CREATE TABLE `individualspactivities` (
  `eventid` int(11) NOT NULL,
  `gameid` int(11) NOT NULL,
  `player1id` varchar(11) NOT NULL,
  `player2id` varchar(11) NOT NULL,
  `win` varchar(11) NOT NULL,
  `player1_points` decimal(4,2) NOT NULL,
  `player2_points` decimal(4,2) NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `individualspactivities`
--

INSERT INTO `individualspactivities` (`eventid`, `gameid`, `player1id`, `player2id`, `win`, `player1_points`, `player2_points`, `comments`) VALUES
(1, 7, '2019/E/054', '2021/E/069', '2021/E/069', '10.00', '20.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `playerid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `registrationid` varchar(11) NOT NULL,
  `batch` varchar(3) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `healthissues` varchar(255) NOT NULL,
  `points` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`playerid`, `firstname`, `lastname`, `registrationid`, `batch`, `gender`, `healthissues`, `points`) VALUES
(1, 'Anuka Mithara', 'Karunanayaka', '2019/E/054', 'E19', 'Male', 'No', '20.00'),
(2, 'Nadun', 'Channa', '2018/E/003', 'E18', 'Male', 'Muscle pain', '20.00'),
(3, 'Sadaru', 'Madawa', '2020/E/044', 'E20', 'Male', 'No', '20.00'),
(4, 'Sanduni', 'Nipunika', '2021/E/069', 'E21', 'Female', 'No', '40.00');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `teamid` int(11) NOT NULL,
  `gameid` int(11) NOT NULL,
  `playerid` varchar(11) NOT NULL,
  `batch` varchar(3) NOT NULL,
  `jerseynum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`teamid`, `gameid`, `playerid`, `batch`, `jerseynum`) VALUES
(1, 2, '2019/E/054', 'E19', 4),
(2, 2, '2018/E/003', 'E18', 5),
(3, 6, '2020/E/044', 'E20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `userpassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`userid`, `username`, `useremail`, `userpassword`) VALUES
(3, 'Anuka Mithara Karunanayaka', 'anukamithara@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlog`
--
ALTER TABLE `adminlog`
  ADD PRIMARY KEY (`adminid`),
  ADD UNIQUE KEY `UNIQUE` (`adminemail`),
  ADD KEY `adminname` (`adminname`),
  ADD KEY `adminemail` (`adminemail`),
  ADD KEY `adminpassword` (`adminpassword`);

--
-- Indexes for table `athlatics`
--
ALTER TABLE `athlatics`
  ADD PRIMARY KEY (`eventid`,`rank`);

--
-- Indexes for table `creativeactivities`
--
ALTER TABLE `creativeactivities`
  ADD PRIMARY KEY (`eventid`,`rank`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`gameid`),
  ADD KEY `gamename` (`gamename`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `groupspactivities`
--
ALTER TABLE `groupspactivities`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `individualspactivities`
--
ALTER TABLE `individualspactivities`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`playerid`),
  ADD UNIQUE KEY `UNIQUE` (`registrationid`),
  ADD KEY `registrationid` (`registrationid`),
  ADD KEY `gender` (`gender`),
  ADD KEY `batch` (`batch`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`teamid`,`playerid`),
  ADD KEY `gameid` (`gameid`),
  ADD KEY `batch` (`batch`),
  ADD KEY `jerceynum` (`jerseynum`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `UNIQUE` (`useremail`),
  ADD KEY `userid` (`userid`),
  ADD KEY `username` (`username`),
  ADD KEY `useremail` (`useremail`),
  ADD KEY `userpassword` (`userpassword`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlog`
--
ALTER TABLE `adminlog`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

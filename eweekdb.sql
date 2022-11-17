-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 03:52 PM
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
(1, 'Anuka Mithara Karunanayaka', 'anukamithara@gmail.com', '1234'),
(2, 'Anuka Mithara Karunanayaka', 'anukamithara2@gmail.com', '1234'),
(3, 'Anuka Mithara Karunanayaka', 'anukamithara3@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `athlatics`
--

CREATE TABLE `athlatics` (
  `eventid` int(11) NOT NULL,
  `gameid` int(11) NOT NULL,
  `playerid` varchar(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `points` decimal(5,2) NOT NULL,
  `comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `athlatics`
--

INSERT INTO `athlatics` (`eventid`, `gameid`, `playerid`, `rank`, `points`, `comments`) VALUES
(1, 17, '2018/E/003', 1, '20.00', ''),
(2, 14, '2018/E/003', 1, '50.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `creativeactivities`
--

CREATE TABLE `creativeactivities` (
  `eventid` int(11) NOT NULL,
  `gameid` int(11) NOT NULL,
  `playerid` varchar(11) NOT NULL,
  `points` decimal(5,2) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `creativeactivities`
--

INSERT INTO `creativeactivities` (`eventid`, `gameid`, `playerid`, `points`, `rank`) VALUES
(1, 10, '2019/E/054', '10.00', 2),
(2, 10, '2021/E/069', '20.00', 1),
(3, 12, '2020/E/044', '20.00', 1),
(4, 10, '2019/E/054', '10.00', 1);

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
  `team1_points` decimal(5,2) NOT NULL,
  `team2_points` decimal(5,2) NOT NULL,
  `comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groupspactivities`
--

INSERT INTO `groupspactivities` (`eventid`, `gameid`, `team1id`, `team2id`, `win`, `team1_points`, `team2_points`, `comments`) VALUES
(1, 2, 1, 2, 1, '99.99', '50.00', ''),
(2, 2, 1, 2, 1, '99.99', '99.99', ''),
(3, 2, 1, 2, 2, '10.00', '20.00', '');

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
  `player1_points` decimal(5,2) NOT NULL,
  `player2_points` decimal(5,2) NOT NULL,
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
  `points` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`playerid`, `firstname`, `lastname`, `registrationid`, `batch`, `gender`, `healthissues`, `points`) VALUES
(2, 'Nadun', 'Channa', '2018/E/003', 'E18', 'Male', 'Muscle pain', '70.00'),
(4, 'Sanduni', 'Nipunika', '2021/E/069', 'E21', 'Female', 'No', '40.00'),
(5, 'Pabasara', 'piyumanga', '2019/E/001', 'E19', 'Male', '', '0.00'),
(6, 'Chamath', 'Perera', '2019/E/011', 'E19', 'Male', 'Headache', '0.00'),
(7, 'Pabasara', 'piyumanga', '2019/E/002', 'E19', 'Male', 'No', '0.00'),
(8, 'Navindu', 'Wijerathna', '2019/E/003', 'E19', 'Male', 'No', '20.00'),
(9, 'Namal', 'priyankara', '2019/E/004', 'E19', 'Male', '', '0.00'),
(11, 'Anushika', 'Erandathie', '2019/E/006', 'E19', 'Female', 'Headache', '0.00'),
(12, 'Bhanuka', 'wijesinghe', '2019/E/007', 'E19', 'Male', 'No', '0.00'),
(13, 'Hasintha', 'chamal', '2019/E/008', 'E19', 'Male', 'Faint', '0.00'),
(14, 'Himaka', 'Geethanjana', '2019/E/009', 'E19', 'Male', '', '0.00'),
(15, 'Chathura', 'Heshan', '2019/E/010', 'E19', 'Male', 'No', '0.00'),
(16, 'Sachira', 'Heshan', '2020/E/001', 'E20', 'Male', '', '0.00'),
(17, 'Chanaka', 'Chathuranga', '2020/E/002', 'E20', 'Male', '', '0.00'),
(18, 'Ayesh', 'Mithila', '2020/E/003', 'E20', 'Male', 'Headache', '0.00'),
(19, 'Kavishka', 'Dilshan', '2020/E/004', 'E20', 'Male', '', '0.00'),
(20, 'Ayani', 'Nilusha', '2020/E/005', 'E20', 'Female', 'No', '0.00'),
(21, 'Umali', 'Imalka', '2020/E/006', 'E20', 'Female', '', '0.00'),
(22, 'Upanika', 'Rathnayake', '2020/E/007', 'E20', 'Female', 'No', '0.00'),
(23, 'Nawanjana', 'Ravihansi', '2020/E/008', 'E20', 'Female', '', '0.00'),
(24, 'Rusiru', 'Nimesh', '2020/E/009', 'E20', 'Male', 'Headache', '0.00'),
(25, 'Neshan', 'Rankoth', '2020/E/010', 'E20', 'Male', '', '0.00'),
(26, 'Dilanka', 'Malshan', '2021/E/001', 'E21', 'Male', 'No', '0.00'),
(27, 'Namal', 'kumara', '2021/E/002', 'E21', 'Male', '', '0.00'),
(28, 'Gihan', 'Madhusanka', '2021/E/003', 'E21', 'Male', '', '0.00'),
(29, 'Ruvindya', 'Sachinthani', '2021/E/004', 'E21', 'Female', '', '0.00'),
(30, 'Lahiru', 'randima', '2021/E/005', 'E21', 'Male', 'Faint', '0.00'),
(31, 'Mihiri', 'priyabhashanie', '2021/E/006', 'E21', 'Female', '', '0.00'),
(32, 'Kavindu', 'pathum', '2021/E/007', 'E21', 'Male', 'No', '0.00'),
(33, 'Akila', 'Dimath', '2021/E/008', 'E21', 'Male', '', '0.00'),
(34, 'Kasun', 'Prabhash', '2021/E/009', 'E21', 'Male', 'No', '0.00'),
(35, 'Milinda', 'Chamara', '2021/E/010', 'E21', 'Male', '', '0.00'),
(36, 'Yasiru', 'Kawsala', '2018/E/001', 'E18', 'Male', 'Headache', '0.00'),
(37, 'Jayani', 'Upeksha', '2018/E/002', 'E18', 'Female', '', '0.00'),
(38, 'Adeesha', 'Induwara', '2018/E/011', 'E18', 'Male', '', '0.00'),
(39, 'Salitha', 'Isuranga', '2018/E/004', 'E18', 'Male', 'No', '0.00'),
(40, 'Samitha', 'Dasun', '2018/E/005', 'E18', 'Male', '', '0.00'),
(41, 'Parami', 'Himasha', '2018/E/006', 'E18', 'Female', '', '0.00'),
(43, 'Yesuru', 'thejan', '2018/E/008', 'E18', 'Male', 'No', '0.00'),
(44, 'Thilini', 'Wasana', '2018/E/009', 'E18', 'Female', 'Headache', '0.00'),
(45, 'Chamod ', 'Lakshan', '2018/E/010', 'E18', 'Male', '', '0.00'),
(48, 'Anuka Mithara', 'Karunanayaka', '2019/E/060', 'E18', 'Male', '', '0.00'),
(49, 'Anuka Mithara', 'Karunanayaka', '2019/E/059', 'E18', 'Male', '', '0.00'),
(50, 'Kasun', 'Virajith', '2019/E/005', 'E19', 'Male', 'No', '0.00'),
(51, 'Anuka Mithara', 'Karunanayaka', '2019/E/054', 'E19', 'Male', '', '10.00');

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
(2, 2, '2019/E/001', 'E19', 6),
(2, 2, '2019/E/002', 'E19', 7),
(2, 2, '2019/E/003', 'E19', 1),
(2, 2, '2019/E/005', 'E19', 10),
(2, 2, '2019/E/007', 'E19', 12),
(4, 2, '2018/E/003', 'E18', 38),
(4, 2, '2018/E/004', 'E18', 39),
(4, 2, '2018/E/005', 'E18', 40);

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
  ADD PRIMARY KEY (`eventid`,`rank`),
  ADD KEY `athlatics_ibfk_1` (`gameid`);

--
-- Indexes for table `creativeactivities`
--
ALTER TABLE `creativeactivities`
  ADD PRIMARY KEY (`eventid`,`rank`),
  ADD KEY `gameid` (`gameid`);

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
  ADD PRIMARY KEY (`eventid`),
  ADD KEY `gameid` (`gameid`);

--
-- Indexes for table `individualspactivities`
--
ALTER TABLE `individualspactivities`
  ADD PRIMARY KEY (`eventid`),
  ADD KEY `gameid` (`gameid`);

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
  ADD KEY `jerceynum` (`jerseynum`),
  ADD KEY `playerid` (`playerid`);

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `athlatics`
--
ALTER TABLE `athlatics`
  ADD CONSTRAINT `athlatics_ibfk_1` FOREIGN KEY (`gameid`) REFERENCES `games` (`gameid`);

--
-- Constraints for table `creativeactivities`
--
ALTER TABLE `creativeactivities`
  ADD CONSTRAINT `creativeactivities_ibfk_1` FOREIGN KEY (`gameid`) REFERENCES `games` (`gameid`);

--
-- Constraints for table `groupspactivities`
--
ALTER TABLE `groupspactivities`
  ADD CONSTRAINT `groupspactivities_ibfk_1` FOREIGN KEY (`gameid`) REFERENCES `games` (`gameid`);

--
-- Constraints for table `individualspactivities`
--
ALTER TABLE `individualspactivities`
  ADD CONSTRAINT `individualspactivities_ibfk_1` FOREIGN KEY (`gameid`) REFERENCES `games` (`gameid`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`playerid`) REFERENCES `player` (`registrationid`),
  ADD CONSTRAINT `team_ibfk_2` FOREIGN KEY (`gameid`) REFERENCES `games` (`gameid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

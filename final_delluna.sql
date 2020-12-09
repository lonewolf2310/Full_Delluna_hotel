-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 03:07 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_delluna`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(30) NOT NULL,
  `adminname` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminname`, `password`, `email`, `phone`, `createdate`, `updatedate`) VALUES
(1, 'admin@111', 'admin@20', 'admin.20@gmail.com', '09772538202', '2020-12-08 13:36:58', '2020-12-08 08:06:58 PM');

-- --------------------------------------------------------

--
-- Table structure for table `ballroom`
--

CREATE TABLE `ballroom` (
  `ballroomid` int(11) NOT NULL,
  `ballroomname` varchar(30) NOT NULL,
  `ballroomtype` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `limit_person` int(11) NOT NULL,
  `bimage` varchar(255) NOT NULL,
  `bimage1` varchar(255) NOT NULL,
  `bimage2` varchar(255) NOT NULL,
  `bimage3` varchar(255) NOT NULL,
  `decoration` longtext NOT NULL,
  `decoration2` longtext NOT NULL,
  `createbdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatebdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ballroom`
--

INSERT INTO `ballroom` (`ballroomid`, `ballroomname`, `ballroomtype`, `price`, `limit_person`, `bimage`, `bimage1`, `bimage2`, `bimage3`, `decoration`, `decoration2`, `createbdate`, `updatebdate`) VALUES
(1, 'Meeting Room I', '1', 0, 150, 'meetingroom1.jpg', 'meeting1.jpg', 'meeting2.jpg', 'meeting3.jpg', '<ul><li style=\"text-align: left;\">Nice Air Condition</li><li style=\"text-align: left;\">Nice Vocal</li><li style=\"text-align: left;\">Free Internet</li></ul>', '', '2020-12-04 18:26:01', ''),
(2, 'Meeting Room II', '1', 0, 120, 'meetingroom2.jpg', 'meeting4.jpg', 'meeting5.jpg', 'meeting6.jpg', '<div style=\"text-align: left;\"><ul><li>Free Internet</li><li>Nice Air Condition</li><li>Nice Cooler System</li></ul></div>', '', '2020-12-05 14:21:00', ''),
(3, 'Weeding Room I', '2', 0, 230, 'meetingroom3.jpg', 'meeting7.jpg', 'meeting8.jpg', 'meeting9.jpg', '', '<ul><li style=\"text-align: left;\">Free Internet</li><li style=\"text-align: left;\">Cooler System</li><li style=\"text-align: left;\">Vocal</li></ul>', '2020-12-05 14:32:01', '2020-12-06 10:08:06 PM'),
(4, 'Weeding Room II', '2', 0, 250, 'broom2.jpg', 'b4.jpg', 'b5.jpg', 'b6.jpg', '<div style=\"text-align: left;\"><ul><li>Nice Air Condition</li><li>Nice Cooler System</li><li>Free Internet</li></ul></div>', '', '2020-12-05 14:37:49', ''),
(5, 'Meeting Room III', '1', 0, 100, 'meetingroom3.jpg', 'meeting7.jpg', 'meeting8.jpg', 'meeting9.jpg', '<ul><li style=\"text-align: left;\">Nice Vocal</li></ul>', '<ul><li style=\"text-align: left;\">Free Internet</li><li style=\"text-align: left;\">Cooler System</li><li style=\"text-align: left;\">Vocal</li></ul>', '2020-12-05 14:26:36', '2020-12-08 07:57:51 PM');

-- --------------------------------------------------------

--
-- Table structure for table `ballroombooking`
--

CREATE TABLE `ballroombooking` (
  `bbookid` int(11) NOT NULL,
  `bbookdate` varchar(255) NOT NULL,
  `bhour` time NOT NULL,
  `bbookperson` int(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `confirm_date` date DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ballroombooking`
--

INSERT INTO `ballroombooking` (`bbookid`, `bbookdate`, `bhour`, `bbookperson`, `username`, `phone`, `confirm_date`, `status`) VALUES
(4, '12/09/2020', '00:00:11', 5, 'Anonymous S', '09251344523', NULL, 0),
(6, '12/08/2020', '00:00:07', 11, 'Hotel', '09123456789', NULL, 0),
(7, '12/08/2020', '00:00:01', 4, 'Developer Mode On', '097979797979', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ballroomtype`
--

CREATE TABLE `ballroomtype` (
  `ballroomtypeid` int(11) NOT NULL,
  `ballroomtypename` varchar(30) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ballroomtype`
--

INSERT INTO `ballroomtype` (`ballroomtypeid`, `ballroomtypename`, `create_date`, `update_date`) VALUES
(1, 'Meeting Room', '2020-11-28 12:08:26', ''),
(2, 'Weeding Room', '2020-11-28 12:08:39', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackid`, `username`, `text`) VALUES
(1, 'Music', ' Enter your text here.. '),
(2, 'Music', 'Hello'),
(3, 'Music', '<ul><li>Moon&nbsp;</li><li>Sunshine&nbsp;</li><li>Star&nbsp;</li><li>Cute</li><li>Cool&nbsp;</li><li>Die&nbsp;</li></ul>'),
(4, 'Music', ' Hello'),
(5, 'Thet Mhue Wai', ' Very Nice'),
(6, 'Thet Mhue Wai', ' Kill This Love'),
(7, 'Burgur', '<b><i>Playing with fire</i></b>'),
(11, 'Thet Mhue Wai', '<font face=\"Comic Sans MS\">Very Very Very Good</font>'),
(12, 'Hotels', ' Enter your text here..sss'),
(13, 'JUNO', '<font face=\"Impact\"> I Love You</font>'),
(14, 'Developer Mode On', ' Developer Mode On'),
(15, 'Developer Mode On', '<font face=\"Arial Black\"> Hello</font>');

-- --------------------------------------------------------

--
-- Table structure for table `meetingbooking`
--

CREATE TABLE `meetingbooking` (
  `meetbookid` int(11) NOT NULL,
  `mbookdate` varchar(255) NOT NULL,
  `mhour` varchar(30) NOT NULL,
  `musername` varchar(30) NOT NULL,
  `mphone` varchar(30) NOT NULL,
  `mbookperson` int(30) NOT NULL,
  `mstatus` int(11) NOT NULL,
  `mconfirm_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meetingbooking`
--

INSERT INTO `meetingbooking` (`meetbookid`, `mbookdate`, `mhour`, `musername`, `mphone`, `mbookperson`, `mstatus`, `mconfirm_date`) VALUES
(4, '12/06/2020', '9: 00 to 12:00', 'Hotel', '09776226020', 2, 0, NULL),
(5, '12/07/2020', '12: 00 to 3:00', 'Developer Mode On', '09123456789', 3, 0, NULL),
(7, '12/07/2020', '12: 00 to 3:00', 'Admin Team', '09760819637', 2, 0, NULL),
(8, '12/08/2020', '9: 00 to 12:00', 'Hotel', '09123456789', 11, 0, NULL),
(9, '12/08/2020', '9: 00 to 12:00', 'Developer Mode On', '097979797979', 3, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomid` int(11) NOT NULL,
  `roomtype` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `decoration` longtext NOT NULL,
  `decoration1` varchar(255) NOT NULL,
  `createrdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updaterdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomid`, `roomtype`, `price`, `image`, `image1`, `image2`, `image3`, `decoration`, `decoration1`, `createrdate`, `updaterdate`) VALUES
(1, '3', 67, 'deluxsuiteroom1.jpg', 'deluxsuite.jpg', 'deluxsuite1.jpg', 'deluxsuite2.jpg', '<ul><li style=\"text-align: left;\">Free Cooking</li><li style=\"text-align: left;\">Free Wifi</li><li style=\"text-align: left;\">Contain Kitchen</li></ul>', '', '2020-12-04 01:31:39', ''),
(2, '4', 80, 'executiveroom1.jpg', 'executive.jpg', 'executive1.jpg', 'executive2.jpg', '<ul><li style=\"text-align: left;\">Contain Water Pool</li><li style=\"text-align: left;\">Free Internet</li><li style=\"text-align: left;\">Free Parking</li><li style=\"text-align: left;\">Contain Kitchen</li><li style=\"text-align: left;\">Free Cooking<br></li></ul>', '', '2020-12-04 01:21:33', ''),
(3, '5', 90, 'superiorroom1.jpg', 'superior.jpg', 'superior1.jpg', 'superior2.jpg', '', '<div style=\"text-align: left;\"><ul><li>Free Wifi</li><li>Free Parking</li></ul></div>', '2020-12-04 00:52:07', '2020-12-06 10:05:57 PM'),
(4, '2', 30, 'superiorroom1.jpg', 'superior.jpg', 'superior1.jpg', 'superior2.jpg', '<div style=\"text-align: left;\"><ul><li>Free For All</li></ul></div>', '<div style=\"text-align: left;\"><ul><li>Free Wifi</li><li>Free Parking</li></ul></div>', '2020-12-04 01:02:33', '2020-12-08 07:57:09 PM');

-- --------------------------------------------------------

--
-- Table structure for table `roombooking`
--

CREATE TABLE `roombooking` (
  `roombookid` int(11) NOT NULL,
  `buname` varchar(30) NOT NULL,
  `checkin` varchar(255) NOT NULL,
  `checkout` varchar(255) NOT NULL,
  `tdays` varchar(30) NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `rtype` varchar(255) NOT NULL,
  `roomqty` int(30) NOT NULL,
  `totalamount` varchar(30) NOT NULL,
  `confirm_date` date DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roombooking`
--

INSERT INTO `roombooking` (`roombookid`, `buname`, `checkin`, `checkout`, `tdays`, `adult`, `child`, `rtype`, `roomqty`, `totalamount`, `confirm_date`, `status`) VALUES
(14, 'Developer Mode On', '12/03/2020', '12/06/2020', '3 days', 3, 0, 'Superior Room                ', 1, '$60', '2020-12-08', 1),
(16, 'Hotel', '12/08/2020', '12/10/2020', '2 days', 3, 1, 'Executive Suite Room                ', 1, '$180', NULL, 0),
(17, 'Developer Mode On', '12/08/2020', '12/09/2020', '1 days', 4, 0, 'Executive Suite Room                ', 2, '$180', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `roomtypeid` int(11) NOT NULL,
  `roomtypename` varchar(30) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`roomtypeid`, `roomtypename`, `create_date`, `update_date`) VALUES
(2, 'Green Room', '2020-11-29 14:39:37', ''),
(3, 'Delux Suite Room', '2020-11-29 14:39:58', '2020-11-28 06:26:54 PM'),
(4, 'Executive Room', '2020-11-29 14:40:20', ''),
(5, 'Executive Suite Room', '2020-11-29 14:40:51', '2020-11-28 06:27:14 PM'),
(8, 'Superior Room', '2020-12-08 13:30:12', '2020-12-08 08:00:23 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tablebooking`
--

CREATE TABLE `tablebooking` (
  `tbookingid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `tbookdate` varchar(255) NOT NULL,
  `tbooktime` time NOT NULL,
  `tbookperson` int(30) NOT NULL,
  `confirm_date` date DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tablebooking`
--

INSERT INTO `tablebooking` (`tbookingid`, `username`, `phone`, `tbookdate`, `tbooktime`, `tbookperson`, `confirm_date`, `status`) VALUES
(9, 'Hotel', '09776226020', '12/06/2020', '14:02:00', 2, '2020-12-07', 1),
(12, 'Zero One', '09797979797', '12/09/2020', '10:45:00', 4, NULL, 0),
(13, 'Developer Mode On', '09451222334', '12/09/2020', '12:49:00', 5, NULL, 0),
(15, 'Black Pink', '09797979797', '12/07/2020', '19:33:00', 4, NULL, 0),
(16, 'Hotel', '09123456789', '12/08/2020', '10:12:00', 5, NULL, 0),
(17, 'Developer Mode On', '097979797979', '12/08/2020', '09:23:00', 4, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(80) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `register_date` date DEFAULT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `email`, `phone`, `address`, `profile_image`, `register_date`, `role`) VALUES
(1, 'Thet Mhue Wai', '132002', 'waimhuethet@gmail.com', '09441544141', 'Yangon', 'Lovepik_com-401092354-neon-guitar.png', '2020-11-20', 'user'),
(4, 'Circle', 'circle123', 'circle123@gmail.com', '09776226020', 'Japan', 'Lovepik_com-832539831-E-commerce minimalist colorful contrast neon border round frame .png', '2020-11-24', 'user'),
(5, 'Music', 'music12345', 'music@gmail.com', '09776226020', 'Korea', 'Lovepik_com-611703468-Vector creative music symbol.png', '2020-11-29', 'user'),
(6, 'Hein Htet Soe', 'HH123456', 'HeinHtet@gmail.com', '09123456789', 'Yangon', 'Z.png', '2020-12-06', 'user'),
(7, 'Developer Mode On', 'DMO1234', 'DMO@gmial.com', '097979797979', 'Yangon', '129136296_1046488019185393_7293471419555247025_o.jpg', '2020-12-06', 'user'),
(8, 'Zero One', 'Z1234567', 'ZeroOne@gmail.com', '09782389279', 'Mandalay', 'Z.png', '2020-12-06', 'user'),
(9, 'Hotel', '12345678', 'hotel@gmail.com', '09123456789', 'Yangon', 'Kali Linux.png', '2020-12-08', 'user'),
(10, 'Admin', 'admin', 'admin@gmail.com', '09123456789 ', 'Yangon', 'Z.png', '2020-12-08', 'user'),
(11, 'admin', '12345678', 'admin@gmail.com', '09123456789 ', 'Yangon', 'Z.png', '2020-12-08', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `ballroom`
--
ALTER TABLE `ballroom`
  ADD PRIMARY KEY (`ballroomid`);

--
-- Indexes for table `ballroombooking`
--
ALTER TABLE `ballroombooking`
  ADD PRIMARY KEY (`bbookid`);

--
-- Indexes for table `ballroomtype`
--
ALTER TABLE `ballroomtype`
  ADD PRIMARY KEY (`ballroomtypeid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackid`);

--
-- Indexes for table `meetingbooking`
--
ALTER TABLE `meetingbooking`
  ADD PRIMARY KEY (`meetbookid`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomid`);

--
-- Indexes for table `roombooking`
--
ALTER TABLE `roombooking`
  ADD PRIMARY KEY (`roombookid`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`roomtypeid`);

--
-- Indexes for table `tablebooking`
--
ALTER TABLE `tablebooking`
  ADD PRIMARY KEY (`tbookingid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ballroom`
--
ALTER TABLE `ballroom`
  MODIFY `ballroomid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ballroombooking`
--
ALTER TABLE `ballroombooking`
  MODIFY `bbookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ballroomtype`
--
ALTER TABLE `ballroomtype`
  MODIFY `ballroomtypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `meetingbooking`
--
ALTER TABLE `meetingbooking`
  MODIFY `meetbookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roombooking`
--
ALTER TABLE `roombooking`
  MODIFY `roombookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `roomtypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tablebooking`
--
ALTER TABLE `tablebooking`
  MODIFY `tbookingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

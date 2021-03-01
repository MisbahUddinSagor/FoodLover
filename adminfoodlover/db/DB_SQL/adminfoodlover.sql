-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2018 at 06:43 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foodworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `comment` longtext NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`c_id`, `c_name`, `c_date`, `comment`, `rating`) VALUES
(1, 'Md. Anayet Hossain', '0000-00-00 00:00:00.000000', 'WebstaurantStore is an online restaurant supply company based in Lititz, Pennsylvania. The company offers commercial-grade equipment to the food service industry through online ordering and commercial shipping.', 5),
(2, 'Anayet', '0000-00-00 00:00:00.000000', ' by the Central Penn Business Journal.[1] In 2014, Clark Associates, Inc. was also rated as the fourth largest distributor of restaurant supplies by Foodservice ', 5),
(3, 'Tanvir', '0000-00-00 00:00:00.000000', ' Central Penn Business Journal.[1] In 2014, Clark Associates, Inc. was also rated as the fourth largest distributor of restaurant supplies by Foodservice Equipment', 5),
(4, 'Md. Anayet Hossain', '0000-00-00 00:00:00.000000', 'Central Penn Business Journal.[1] In 2014, Clark Associates, Inc. was also rated as the fourth largest distributor of restaurant supplies by Foodservice Equipment', 5),
(5, 'Anayet', '0000-00-00 00:00:00.000000', 'Burger King (BK) is an American global chain of hamburger fast food restaurants. Headquartered in the unincorporated area of Miami-Dade County, Florida, the company was founded in 1953 as InstaBurger King, a Jacksonville, Florida-based restaurant chain.', 4),
(6, 'Tanvir', '0000-00-00 00:00:00.000000', 'Pizza Hut is an American restaurant chain and international franchise founded in 1958 by Dan and Frank Carney. The company is known for its Italian-American cuisine menu including pizza and pasta, ', 4),
(7, 'Anayet', '0000-00-00 00:00:00.000000', 'insert and select date and time from mysql', 5),
(8, 'Md. Anayet Hossain', '2019-02-22 08:35:44.000000', 'nded in 1958 by Dan and Frank Carney. The company is known for its Italian-American cuisine menu inclu', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
`UserID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Address` longtext NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `UserName` varchar(60) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `UserLevel` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`UserID`, `FirstName`, `LastName`, `Address`, `Email`, `Phone`, `Gender`, `UserName`, `Password`, `UserLevel`) VALUES
(1, 'Some', 'One', '32/4 Mohammadpur<br />\r\nDhaka', 'someone@gmail.com', '01711', 'Male', 'someone', '123', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
 ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

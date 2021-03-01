-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2019 at 08:36 AM
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
(8, 'Md. Anayet Hossain', '2018-02-22 08:35:44.000000', 'nded in 1958 by Dan and Frank Carney. The company is known for its Italian-American cuisine menu inclu', 5);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`contact_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `msg` longtext NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `phone`, `msg`) VALUES
(1, 'Tanvir', 'aatanvir99@yahoo.com', '01682208185', 'aaaaaaaaaaaaaaaaaa'),
(2, 'aaa', 'aatanvir99@yahoo.com', '111', 'asdffggh');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
`delivery_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_discount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `vat` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `order_id`, `customer_name`, `product_name`, `product_price`, `product_discount`, `total`, `vat`, `grand_total`, `date`) VALUES
(1, 5, 'Tanvir', 'Pizza', 336, 17, 319, 48, 367, '0000-00-00 00:00:00'),
(2, 6, 'Tanvir', 'Pasta', 261, 8, 272, 39, 300, '0000-00-00 00:00:00'),
(3, 7, 'Tanvir', 'Pasta', 1882, 840, 1960, 282, 2164, '0000-00-00 00:00:00'),
(4, 8, 'Tanvir', 'Pasta', 1882, 840, 1960, 282, 2164, '0000-00-00 00:00:00'),
(5, 9, 'Tanvir', 'Pasta', 2607, 84, 2716, 391, 2998, '0000-00-00 00:00:00'),
(6, 10, 'aaaaaa', 'Pasta', 2800, 84, 2716, 391, 2998, '0000-00-00 00:00:00'),
(7, 11, 'aaaa', 'Pizza', 3500, 175, 3325, 479, 3671, '0000-00-00 00:00:00'),
(8, 12, 'aa', 'Pizza', 1750, 88, 1663, 239, 1835, '0000-00-00 00:00:00'),
(9, 13, 'Tanvir', 'Pizza', 1750, 88, 1663, 249, 1912, '0000-00-00 00:00:00'),
(10, 14, 'aaaa', 'Pizza', 700, 35, 665, 100, 765, '0000-00-00 00:00:00'),
(11, 15, 'aaaa', 'Pizza', 700, 35, 665, 100, 765, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
`o_id` int(11) NOT NULL,
  `o_res_name` varchar(255) NOT NULL,
  `o_c_id` int(11) NOT NULL,
  `o_name` varchar(255) NOT NULL,
  `o_d_address` longtext NOT NULL,
  `o_phone` varchar(255) NOT NULL,
  `o_email` varchar(255) NOT NULL,
  `o_tot_amount` varchar(255) NOT NULL,
  `o_dis_amount` varchar(255) NOT NULL,
  `o_pay_amount` varchar(255) NOT NULL,
  `o_status` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1001 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
`od_id` int(11) NOT NULL,
  `od_o_id` int(11) NOT NULL,
  `od_item_id` int(11) NOT NULL,
  `od_item_price` varchar(255) NOT NULL,
  `od_item_qty` varchar(255) NOT NULL,
  `od_amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE IF NOT EXISTS `order_table` (
`order_id` int(11) NOT NULL,
  `restaurant_name` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `Customer_address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_amount` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_id`, `restaurant_name`, `product_id`, `customer_name`, `Customer_address`, `email`, `phone`, `date`, `order_amount`) VALUES
(1, 'Appeliano', 1, 'Tanvir', '', 'aatanvir99@yahoo.com', '016852', '2018-04-07 16:18:14', 3),
(2, 'Appeliano', 1, 'Tanvir', 'dsfdgjhjhnjkkkkkkkkkkkn<br />\r\njkkbhcgdf', 'aatanvir99@yahoo.com', '016852', '2018-04-07 16:25:45', 3),
(3, 'Cafe', 1, 'Tanvir', 'ughgjhfhg', 'aatanvir99@yahoo.com', '016852', '2018-04-07 16:39:27', 300),
(4, 'Cafe', 1, 'Tanvir', 'hlkjklm ml,', 'aatanvir99@yahoo.com', '016852', '2018-04-07 16:40:36', 288),
(5, 'Appeliano', 1, 'Tanvir', 'asdasada', 'aatanvir99@yahoo.com', '11654', '2018-04-07 17:50:28', 5),
(6, 'Appeliano', 2, 'Tanvir', 'asdacsdv', 'wesdsc', '5163', '2018-04-07 17:58:06', 10),
(7, 'Appeliano', 2, 'Tanvir', 'aaaaaaaa', 'aatanvir99@yahoo.com', '2161', '2018-04-07 18:01:31', 10),
(8, 'Appeliano', 2, 'Tanvir', 'llllllll', 'aatanvir99@yahoo.com', '016852', '2018-04-07 18:07:05', 10),
(9, 'Appeliano', 2, 'Tanvir', 'sdasdfa', 'aatanvir99@yahoo.com', '0126', '2018-04-07 18:20:39', 10),
(10, 'Appeliano', 2, 'aaaaaa', 'aaaaaaaaaaaa', 'aaaaaaa', '22222222', '2018-04-07 18:23:26', 10),
(11, 'Appeliano', 1, 'aaaa', 'aaaaa', 'aatanvir99@yahoo.com', '1264', '2018-04-07 18:30:05', 10),
(12, 'Appeliano', 1, 'aa', 'aaaa', 'aaa', '21212', '2018-04-07 18:33:40', 5),
(13, 'Appeliano', 1, 'Tanvir', 'aaaaaa', 'aatanvir99@yahoo.com', '0164', '2018-04-08 03:52:26', 5),
(14, 'Appeliano', 1, 'aaaa', 'aaaaa', 'aaaaaa', '016852', '2018-04-08 04:55:00', 2),
(15, 'Appeliano', 1, 'aaaa', 'aaaaaaaa', 'aaaaaaaaa', '0134', '2018-04-08 12:12:40', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`product_id` int(11) NOT NULL,
  `restaurant_name` varchar(255) NOT NULL,
  `restaurant_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `product_discount` int(11) NOT NULL,
  `product_photo` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `restaurant_name`, `restaurant_id`, `product_name`, `product_price`, `product_discount`, `product_photo`) VALUES
(1, 'Appeliano', '1', 'Pizza', 350, 5, '005.jpg'),
(2, 'Appeliano', '1', 'Pasta', 280, 3, '002.jpg'),
(3, 'Cafe Theater', '2', 'Set Menu 1', 230, 2, 'aaa.jpg'),
(4, 'Grind House', '3', 'Set Menu 2', 250, 2, 'bbb.jpg'),
(5, 'Appeliano', '1', 'FRIED WONTHON ', 120, 0, ''),
(6, 'Appeliano', '1', 'SPRING ROLL', 250, 0, ''),
(7, 'Appeliano', '1', 'FRIED PRAWN BALL 8PE', 220, 0, ''),
(8, 'Appeliano', '1', 'FRIED WINGS', 250, 0, ''),
(9, 'Appeliano', '1', 'TOM YAM SOUP GOONG', 370, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE IF NOT EXISTS `restaurant` (
`r_id` int(11) NOT NULL,
  `restaurant_name` varchar(50) NOT NULL,
  `area_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `rat_rating` int(11) NOT NULL,
  `r_image` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`r_id`, `restaurant_name`, `area_name`, `address`, `email`, `phone`, `rat_rating`, `r_image`) VALUES
(1, 'Appeliano', 'Khilgaon', 'Sahid Baki Road, Khilgaon, Taltola, Dhaka 1219', 'appeliano@gmail.com', 1723684068, 5, 'appeliano_250.jpg'),
(2, 'Cafe Theater', 'Khilgaon', 'House - 566/A, Block-C,Khilgaon Taltola(4th Floor)', 'theater@gmail.com', 1725798139, 4, 'Cafe_Theater_250.jpg'),
(3, 'Grind House', 'Khilgaon', '566/A, Block-C, Khilgaon Taltola, Shahid Baki Road', 'grindhouse@gmail.com', 1680242691, 4, 'grind_house_250.jpg'),
(4, 'TraditionBD', 'Khilgaon', '568/C, Block C, Shahid Baki Road, Dhaka 1219', 'td_BD@gmail.com', 1723684068, 5, 'TBD_250.jpg'),
(5, 'Tune & Bite', 'Khilgaon', '566/A, Block-C, Khilgaon Taltola, Shahid Baki Rd, ', 'tune&bite@gmail.com', 1671984484, 4, 'T&T_250.jpg');

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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
 ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
 ADD PRIMARY KEY (`od_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
 ADD PRIMARY KEY (`r_id`);

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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1001;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

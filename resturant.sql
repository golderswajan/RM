-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2017 at 07:18 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resturant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'dreamless', '150214'),
(2, 'abcd', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `chef`
--

CREATE TABLE `chef` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chef`
--

INSERT INTO `chef` (`id`, `name`, `image`, `qualification`) VALUES
(1, 'Mithu ahammed ', '../images/', 'Master in chick '),
(2, 'Khalek', '../images/out.PNG', 'Pizza master'),
(4, 'Mokhlech', '../images/Capture.PNG', 'adada'),
(5, 'abcd', '../images/', 'ff'),
(6, 'abcd', '../images/', 'ff'),
(11, 'Swajan', '../images/download.jpg', 'ajdkad');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(255) NOT NULL,
  `visits` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `username`, `password`, `address`, `contact`, `visits`) VALUES
(1, 'swajan golder s', 'swajan', '150214', 'khulna,Bangladesh', '01571777609l', 8),
(2, 'wahid shuvo', 'shuvo', '150233', 'madaripur', '019996267761', 6),
(3, 'd', 'fz', 'z', 'y', '12', 1),
(4, 'Durjoy Bapery', 'durjoy', '150229', 'New Market', '01571777609', 3),
(5, 'test', 'test', 'test', 'sss', '012', 1),
(6, 'test2', 'test2', 'test2', 'test2', '324', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `customerid` int(11) NOT NULL,
  `foodid` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `comment`, `customerid`, `foodid`, `date`) VALUES
(7, 'it is good', 1, 3, '2017-10-26'),
(9, 'This is a good food', 1, 1, '2017-11-03'),
(10, 'delicious food', 1, 1, '2017-11-03'),
(11, '100!!! Taka!!!!', 5, 3, '2017-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `foodmenu`
--

CREATE TABLE `foodmenu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `foodimage` varchar(255) NOT NULL,
  `ingredients` text NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foodmenu`
--

INSERT INTO `foodmenu` (`id`, `name`, `foodimage`, `ingredients`, `price`, `type`) VALUES
(1, 'Pizza', '../images/pizza.jpg', 'It is a delicious food made of sugar, salt, butter,chicken', 50, 'Breakfast'),
(3, 'Burgers', '../images/burger.jpg', 'It is a delicious food made of sugar, salt, butter,chicken', 100, 'Breakfast'),
(5, 'Chicken Grill', '../images/images.jpg', 'It is a delicious food made of sugar, salt, butter,chicken', 400, 'Dinner'),
(6, 'Noodles', '../images/new-user-offer-flat-40-cashback-on-first-food-order-at-foodpanda-1483952952.jpg', 'It is a delicious food made of sugar, salt, butter,chicken', 300, 'Breakfast'),
(7, 'Nugget', '../images/front-3-1008x500.jpg', 'It is a delicious food made of sugar, salt, butter,chicken', 130, 'Breakfast'),
(8, 'Fried Rice', '../images/friedricechikcken.jpg', 'It is a delicious food made of sugar, salt, butter,chicken', 160, 'Lunch'),
(9, 'Faluda', '../images/faluda.jpg', 'It is a delicious food made of sugar, salt, butter,chicken', 60, 'Snacks'),
(10, 'Donats', '../images/donats.jpg', 'It is a delicious food made of sugar, salt, butter,chicken', 30, 'Snacks'),
(11, 'Custard', '../images/fruit-custard.jpg', 'It is a delicious food made of sugar, salt, butter,chicken', 55, 'Lunch'),
(12, 'Icecream', '../images/icecream.jpeg', 'It is a delicious food made of sugar, salt, butter,chicken', 70, 'Dinner'),
(13, 'Sandwitch', '../images/sandwitch.jpg', 'It is a delicious food made of sugar, salt, butter,chicken', 25, 'Lunch'),
(14, 'Saslik', '../images/saslik.jpg', 'It is a delicious food made of sugar, salt, butter,chicken', 35, 'Lunch'),
(15, 'Chicken Biriany', '../images/chettinad-chicken-biryani1.jpg', 'It is a delicious food made of sugar, salt, butter,chicken', 150, 'Dinner'),
(17, 'Fggs', '../images/download.jpg', 'It is a delicious food made of sugar, salt, butter,chicken', 34, 'Breakfast');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `customerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `date`, `customerId`) VALUES
(1, '2017-11-09', 1),
(5, '2017-11-04', 1),
(6, '2017-11-04', 2),
(7, '2017-11-04', 4),
(8, '2017-11-04', 4),
(9, '2017-11-04', 1),
(10, '2017-11-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `id` int(11) NOT NULL,
  `foodid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `orderid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`id`, `foodid`, `amount`, `orderid`) VALUES
(10, 6, 1, 8),
(13, 9, 1, 10),
(14, 15, 2, 10),
(17, 12, 2, 12),
(18, 15, 1, 12),
(19, 1, 1, 13),
(20, 6, 1, 13),
(21, 7, 29, 13),
(22, 6, 1, 14),
(23, 17, 1, 15),
(24, 3, 1, 16),
(25, 17, 2, 17),
(26, 1, 4, 18),
(27, 3, 7, 18);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderdate` date NOT NULL,
  `delivarydate` date NOT NULL,
  `delivarytime` time(6) NOT NULL,
  `phoneno` int(11) NOT NULL,
  `delivaryaddress` text NOT NULL,
  `confirmation` tinyint(1) NOT NULL DEFAULT '0',
  `validity` tinyint(1) DEFAULT '0',
  `served` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(255) DEFAULT '',
  `customerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderdate`, `delivarydate`, `delivarytime`, `phoneno`, `delivaryaddress`, `confirmation`, `validity`, `served`, `status`, `customerid`) VALUES
(8, '2017-10-23', '2017-10-26', '05:04:00.000000', 1, 'jk', 1, 0, 0, 'please enter valid address and re order', 1),
(10, '2017-10-25', '2017-10-27', '04:05:00.000000', 1717728721, 'Rajshahi', 0, 1, 0, '', 2),
(12, '2017-10-25', '2017-10-28', '17:30:00.000000', 1999626776, 'Khulna univarsity', 1, 1, 0, 'We will contact with you in no time.', 1),
(13, '2017-10-26', '2017-10-28', '03:50:00.000000', 4345, 'khulna', 1, 0, 0, 'it is ok', 2),
(14, '2017-11-03', '2017-11-13', '05:08:00.000000', 2147483647, 'rtrr', 1, 0, 1, 'Welcome You', 1),
(15, '2017-11-03', '2017-11-22', '21:00:00.000000', 23423, 'sdfsc', 0, 0, 0, '', 1),
(16, '2017-11-03', '2017-11-09', '13:00:00.000000', 64564646, 'njhb', 1, 1, 0, 'jhjklkjkjknkj', 2),
(17, '2017-11-04', '2017-11-04', '02:00:00.000000', 1, 'sersdfydfh', 0, 0, 1, '', 5),
(18, '2017-11-04', '2017-11-04', '05:00:00.000000', 8, 'f', 0, 0, 1, '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_name`) VALUES
('Breakfast'),
('Dinner'),
('Lunch'),
('Snacks');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chef`
--
ALTER TABLE `chef`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `foodid` (`foodid`);

--
-- Indexes for table `foodmenu`
--
ALTER TABLE `foodmenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foodid` (`foodid`),
  ADD KEY `orderid` (`orderid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerid` (`customerid`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `chef`
--
ALTER TABLE `chef`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `foodmenu`
--
ALTER TABLE `foodmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`foodid`) REFERENCES `foodmenu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foodmenu`
--
ALTER TABLE `foodmenu`
  ADD CONSTRAINT `foodmenu_ibfk_1` FOREIGN KEY (`type`) REFERENCES `type` (`type_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`foodid`) REFERENCES `foodmenu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`orderid`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

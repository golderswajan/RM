-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2017 at 05:09 AM
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
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `username`, `password`, `address`, `contact`) VALUES
(1, 'swajan golder', 'swajan', '150214', 'khulna', '01571777609'),
(2, 'wahid shuvo', 'shuvo', '150233', 'madaripur', '01999626776');

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
(3, 'Good', 1, 1, '2017-10-28'),
(6, 'it is good', 1, 4, '2017-10-26'),
(7, 'it is good', 1, 3, '2017-10-26'),
(8, 'it is delicious', 1, 3, '2017-10-26');

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
(1, 'Pizza', 'images/pizza.jpg', 'It is a delicious food made of chiken butter.jhjfdgghdvhvxhgvcghxvxhgvxhbvbxvvnbx sbvfnbxzvcnbx hgsdzfhgzdxvc ghsdfhgsdvf hgxvchxvhbxbv hdfgjhxdcvjhxv jhfdgbdvxv dhfgbvhxbvx hdsfjxbnxvbjhxv dfgjhvhbxjvb dshfgbxdbvxbv dzfbvjxznbcv dxhfvbjxdzv vfzhvb xfjkvhbxjhbv dfhgbjf sdfhgbsdf sdfgbshanf jhfgbhasnrbf vhsadrgfbasb f sdfnbvsfvbgbvajsaerhnsbfahf ', 50, 'breakfast'),
(3, 'Burger', 'images/burger.jpg', 'jhghjgh', 100, 'breakfast'),
(4, 'Swarma', './images/buy-1-get-1-free-on-your-first-food-order-1488879654.jpg', 'sdjfksjls', 150, 'Snacks'),
(5, 'Chicken Grill', './images/images.jpg', 'shkfhossoeo', 400, 'Dinner'),
(6, 'Noodles', './images/new-user-offer-flat-40-cashback-on-first-food-order-at-foodpanda-1483952952.jpg', 'ladjsldna', 300, 'Breakfast'),
(7, 'Nugget', './images/front-3-1008x500.jpg', 'Kakwkrha', 130, 'Breakfast'),
(8, 'Fried Rice', './images/friedricechikcken.jpg', 'hfhgdsf', 160, 'Lunch'),
(9, 'Faluda', './images/faluda.jpg', 'abcdefgh', 60, 'Snacks'),
(10, 'Donats', './images/donats.jpg', 'abcdefgh', 30, 'Snacks'),
(11, 'Custard', './images/fruit-custard.jpg', 'bvabnva', 55, 'Lunch'),
(12, 'Icecream', './images/icecream.jpeg', 'ice', 70, 'Dinner'),
(13, 'Sandwitch', './images/sandwitch.jpg', 'fhfhhfgcgfd', 25, 'Lunch'),
(14, 'Saslik', './images/saslik.jpg', 'ggshhgd', 35, 'Lunch'),
(15, 'Chicken Biriany', './images/chettinad-chicken-biryani1.jpg', 'rice,meat', 150, 'Dinner');

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
(7, 6, 2, 6),
(8, 1, 1, 7),
(9, 7, 2, 7),
(10, 6, 1, 8),
(11, 3, 1, 9),
(12, 7, 1, 9),
(13, 9, 1, 10),
(14, 15, 2, 10),
(15, 4, 1, 11),
(16, 10, 1, 11),
(17, 12, 2, 12),
(18, 15, 1, 12);

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
(6, '2017-10-23', '2017-10-26', '21:40:00.000000', 1747611697, 'sukdara', 1, 0, 1, 'Thank you very much', 1),
(7, '2017-10-23', '2017-10-27', '14:40:00.000000', 1571777609, 'sukdara', 1, 1, 1, '', 1),
(8, '2017-10-23', '2017-10-26', '05:04:00.000000', 1, 'jk', 1, 0, 0, 'please enter valid address and re order', 1),
(9, '2017-10-25', '2017-10-25', '17:50:00.000000', 1935696971, 'Dumuria', 1, 1, 0, 'We will contact with you in no time', 2),
(10, '2017-10-25', '2017-10-27', '04:05:00.000000', 1717728721, 'Rajshahi', 0, 1, 0, '', 2),
(11, '2017-10-25', '2017-10-28', '17:06:00.000000', 1999626776, 'Dhaka', 1, 0, 0, '', 2),
(12, '2017-10-25', '2017-10-28', '17:30:00.000000', 1999626776, 'Khulna univarsity', 1, 1, 0, 'We will contact with you in no time.', 1);

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
('breakfast'),
('dinner'),
('lunch'),
('snacks');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
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
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `foodmenu`
--
ALTER TABLE `foodmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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

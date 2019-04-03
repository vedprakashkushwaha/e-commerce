-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2015 at 08:33 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mynewecdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `brand_title` text NOT NULL,
  `brand_id` int(100) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_title`, `brand_id`) VALUES
('Nokia', 1),
('Apple', 2),
('Samsung', 3),
('LG', 4),
('Tosiba', 5),
('Micromax', 6),
('HCL', 7),
('Acer', 8),
('Sony', 9),
('Dell', 10),
('Lenovo', 11),
('Intex', 12),
('Carban', 13);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `p_id` int(19) NOT NULL,
  `ip_add` varchar(49) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `checkout_date` date NOT NULL,
  `qty` int(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `userid`, `checkout_date`, `qty`) VALUES
(2, '::1', 'guest', '0000-00-00', 0),
(7, '::1', 'guest', '0000-00-00', 0),
(6, '::1', 'guest', '0000-00-00', 0),
(13, '::1', 'guest', '0000-00-00', 0),
(13, '::1', 'myuserid', '0000-00-00', 0),
(5, '::1', 'myuserid', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(100) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1012 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(1001, 'Laptop'),
(1002, 'Computer'),
(1004, 'CPU'),
(1005, 'Mobile'),
(1006, 'Palmtop'),
(1007, 'Tablet'),
(1008, 'Ipad'),
(1009, 'Ipod'),
(1010, 'Television'),
(1011, 'Pen Drive');

-- --------------------------------------------------------

--
-- Table structure for table `customer_detail`
--

CREATE TABLE IF NOT EXISTS `customer_detail` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `country` varchar(20) NOT NULL,
  `street1` varchar(200) NOT NULL,
  `street2` varchar(200) NOT NULL,
  `city` varchar(20) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_detail`
--

INSERT INTO `customer_detail` (`first_name`, `last_name`, `user_id`, `password`, `email_id`, `country`, `street1`, `street2`, `city`, `zipcode`, `phone`) VALUES
('alay', 'jaiswal', 'ajayuser', '123456', 'ajay@gmail.com', 'india', 'bilandpur', 'near shiv mandir', 'gorakhpur', '273001', '9026282302'),
('akash', 'singh', 'akashuser', '12345', 'akash$gmail.com', 'india', 'bilandpur', 'near shiv mandir', 'deoria', '273001', '8564934685'),
('akhil', 'singh', 'akhiluser', '12345', 'akhil@gmail.com', 'pakishtan', 'gulampur', 'near mchhalihtta lahoir', 'lahoir', '23214', '8986475845'),
('anil', 'chauhan', 'aniluser', '12345', 'anil@gmail.com', 'india', 'bgahachauri, bhaluani', 'deoria', 'deoria', '274501', '8423858436'),
('bheem', 'yadav', 'bheemuser', '12345', 'bheem@gmail.com', 'india', 'bilandpur', 'near shiv mandir', 'gorakhpur', '273001', '8564934685'),
('ved ', 'prakash', 'myuserid', 'mypassword', 'ved.p94@gmail.com', 'india', 'bilandpur', 'near shiv mandir gorakhpur', 'gorakhpur', '273001', '8564934685'),
('satay ', 'prakash', 'stayauser', '12345', 'ved.p94@gmail.com', 'india', 'bilandpur', 'near shiv mandir', 'deoria', '273001', '8564934685');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_title` text NOT NULL,
  `product_category` int(200) NOT NULL,
  `product_brand` int(200) NOT NULL,
  `product_price` double NOT NULL,
  `product_description` text NOT NULL,
  `product_keyword` text NOT NULL,
  `product_image` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_title`, `product_category`, `product_brand`, `product_price`, `product_description`, `product_keyword`, `product_image`) VALUES
(1, 'acer asprie 4315', 1001, 8, 32600, 'intel  core i3 processer', 'acer laptop', 'images1.jpg'),
(2, 'Acer E5-573 ASPIRE E-15 ', 1001, 8, 34900, 'Core i3 4Gen 8GB DDR3/1TB', 'acer laptop', 'images2.jpg'),
(3, 'Acer Aspire E5-551G (Notebook)', 1001, 8, 32800, 'Acer E5-573 Aspire E5-573-39KK Core i3 (4th Gen.) - (8 GB DDR3/1 TB HDD/Free DOS/256 MB Graphics) Notebook ', 'acer laptop', 'images.jpg'),
(4, 'Acer Aspire E5-551G (Notebook) ', 1001, 8, 33100, 'Acer Aspire E5-551G (Notebook) (APU Quad Core A10/ 8GB/ 1TB/ Linux/ 2GB Graph) (NX.MLESI.001) ', 'acer laptop', 'images4.jpg'),
(5, 'Acer E5-573 Aspire E5-573', 1001, 8, 26500, 'Acer E5-573 Aspire E5-573 CI3/4GB 1TB/15.6/LINUX Core i3 - (4 GB DDR3/1 TB HDD/Linux/Ubuntu) Notebook ', 'laptop', 'images6.jpg'),
(6, 'Lenovo B B5080 Core i3 (4th Gen)', 1001, 11, 27490, 'Lenovo B B5080 Core i3 (4th Gen) - (4 GB DDR3/500 GB HDD/Free DOS) Notebook ', 'lenovo,laptop', 'download1.jpg'),
(7, 'Lenovo B B4080 Core i5 (5th Gen)', 1001, 11, 37990, 'Lenovo B B4080 Core i5 (5th Gen) - (4 GB DDR3/500 GB HDD/Free DOS) Notebook ', 'lenovo,laptop', 'images01.jpg'),
(8, 'Acer Aspire R7-571G Laptop', 1001, 8, 69500, 'Acer Aspire R7-571G Laptop (3rd Gen Ci5/ 8GB/ 1TB/ Win8/ 2GB/ Touch) (NX.MA5SI.003) ', 'acer laptop', 'images05.jpg'),
(9, 'sony laptop', 1001, 9, 52790, 'sony intel core i7 processor', 'sony laptop', 'download.jpg'),
(10, 'apple laptop', 1001, 2, 87300, 'apple intel core i7 processor 8GB RAM 5Gen', 'apple,laptop', 'images03.jpg'),
(11, 'dell laptop', 1001, 10, 34000, 'intel  core i3 processer 4GB RAM', 'dell laptop', 'images10.jpg'),
(12, 'apple laptop', 1001, 2, 97500, 'apple intel core i7 processor 8GB RAM 5Gen', 'apple,laptop', 'images34.jpg'),
(13, 'apple iphone', 1001, 2, 97600, 'intel core i7 processor', 'apple,laptop', 'images30.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE IF NOT EXISTS `userlogin` (
  `userid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`userid`, `password`) VALUES
('myuserid1', 'mypass1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

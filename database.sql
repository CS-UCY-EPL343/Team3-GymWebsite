-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2019 at 02:03 PM
-- Server version: 5.5.62
-- PHP Version: 5.6.40

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE IF NOT EXISTS `announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maintext` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `date`, `subject`, `maintext`) VALUES
(43, '2019-05-15', 'Closed on 20/05/2019', 'The gym will be closed for the next Monday'),
(44, '2019-04-21', 'Easter Holidays ', 'The gym will be closed from  26/04 until 30/04 for the Easter Holidays!');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `service` varchar(20) NOT NULL,
  `day` int(11) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `canceled` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=361 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `username`, `service`, `day`, `time`, `canceled`) VALUES
(350, 'aphili01', 'Jaccuzi', 1557781200, '09:00-10:00', 0),
(351, 'aphili01', 'Physiotherapy', 1558386000, '09:00-10:00', 0),
(352, 'aphili01', 'Sauna', 1557781200, '09:00-10:00', 1),
(353, 'aphili01', 'Sauna', 1557781200, '10:00-11:00', 0),
(354, 'aphili01     ', 'Sauna', 1569618000, '09:00-10:00', 0),
(355, 'aphili01     ', 'Jaccuzi', 1557867600, '10:00-11:00', 0),
(356, 'aphili01     ', 'Sauna', 1557954000, '09:00-10:00', 0),
(357, 'aphili01     ', 'Jaccuzi', 1557954000, '09:00-10:00', 0),
(358, 'lvasil01', 'Jaccuzi', 1557954000, '10:00-11:00', 0),
(359, 'lvasil01', 'Massage', 1561064400, '15:00-16:00', 0),
(360, 'lvasil01', 'Physiotherapy', 1559163600, '12:00-13:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `surname` text NOT NULL,
  `telephone` int(18) NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `sex` enum('Male','Female','Other') NOT NULL,
  `program` varchar(250) NOT NULL,
  `role` enum('Admin','customer','physiotherapist','coach','MassageTherapist') NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `surname`, `telephone`, `email`, `username`, `password`, `sex`, `program`, `role`) VALUES
(17, 'Pantelis', 'Panayiotou', 98989898, 'ppantelis.1@gmail.com', 'ppanay10', '2770753ad45feb00fa9e33b9bb9bf53888f11599a139401caef0bc5b2c312a2b', 'Other', '', 'customer'),
(18, 'Menelaos ', 'Artemiou', 97725749, 'melhsixartemiou@gmail.com', 'martem01', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Male', '../uploads/aerial-aerial-view-application-935869.jpg', 'customer'),
(19, 'Loukiana  ', 'Andreou', 99261411, 'loukiana@cs.ucy.ac.cy', 'lvasil01', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Female', '../uploads/download.jpeg', 'customer'),
(27, 'Kyriakos', 'Kosta', 97768561, 'kkosta121@gmail.com', 'kkostas', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Male', '', 'MassageTherapist'),
(28, 'Prodromos', 'Panayiotou', 99365038, 'pgeorg09@cs.ucy.ac.cy', 'pgeorg09', 'b3bc56260b7f4441567a84d4c2dee30af204fd9c3090c187b373b8711e154a97', 'Male', '../uploads/.logo.png', 'customer'),
(29, 'Anna', 'Vasileiou', 97768561, 'anna@gmail.com', 'anna', '6b8c049022f412577c6f549c43d2042efe394911d6ac9142c925ef5d20a8ee5f', 'Female', '', 'customer'),
(30, 'Chris', 'Loukaides', 99665544, 'christodoulos.loukaides@gmail.com', 'clouka01', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4\n', 'Male', '', 'customer'),
(31, ' Alexandros', 'Philippou', 99665544, 'aphili01@cs.ucy.ac.cy', 'aphili01     ', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Male', '', 'Admin'),
(37, 'Pantelis', 'Evripidou', 2147483647, 'ppanay10@cs.ucy.aac.cy', 'pevrip34', '82f261a54e9677ca4ab491c6fc91070e036713797ed01626056af6d428d6a33f', 'Male', '', 'customer'),
(40, 'Loukia', 'Parashou', 325263, 'lva01@cs.ucy.ac.cy', 'vasilouk', '288c8a4137f6198253d619bb7c87b051e7e5a7523c3b0c6bce655e161eb11dd2', 'Female', '', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE IF NOT EXISTS `prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `title`, `price`, `description`) VALUES
(2, '1 Month Subscription', '3', 'One month subscription, including all programs (except RPM).'),
(8, 'Classes (month)', '15', 'all classes (TRX,Zumba,Pilates)'),
(9, 'RPM', '4', 'Use our RPM facilities');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(150) NOT NULL,
  `img_file` varchar(60) NOT NULL,
  `price` varchar(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_id` (`id`),
  KEY `name` (`name`,`description`,`img_file`,`price`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `img_file`, `price`) VALUES
(9, 'Peanut Butter', 'All-natural peanut butter protein 1 kg ', 'shop2.jpg', '15'),
(8, 'Shaker', 'shaker for your protein', 'shop1.jpg', '4');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pdf` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `pdf`) VALUES
(1, '../uploads/proram.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `service_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `capacity` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `title`, `description`, `capacity`, `image`) VALUES
(1, 'Jaccuzi', 'Relax in our refreshing Jacuzzi facility!', 1, 'shop4.jpg'),
(2, 'Sauna', 'Chill out in our Sauna!', 2, 'images.jpeg'),
(9, 'Physiotherapy', 'Book physiotherapy appointments', 1, 'image.jpg'),
(10, 'Massage', 'Enjoy a massage session with our expert Massage staff', 1, 'massage2.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 24, 2020 at 01:20 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dej-24`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mail` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `phone`, `address`, `mail`) VALUES
(1, 'aaa', 2222, 'aa', 'belcaidna@gmail.com'),
(2, 'FDF', 0, 'dsdsd', 'belcaidna@gmail.com'),
(3, 'FDF', 0, 'dsdsd', 'belcaidna@gmail.com'),
(4, 'mail', 2222, 'hut founty agadir ', 'belcaidna@gmail.com'),
(5, 'fdfdf', 2222, 'hut founty agadir ', 'belcaidna@gmail.com'),
(6, 'fdfdf', 2222, 'hut founty agadir ', 'belcaidna@gmail.com'),
(7, 'fdfdf', 2222, 'hut founty agadir ', 'belcaidna@gmail.com'),
(8, 'fdfdf', 2222, 'hut founty agadir ', 'belcaidna@gmail.com'),
(9, 'ggggggggg', 2222, 'hut founty agadir ', 'belcaidna@gmail.com'),
(10, 'ggggg', 2222, 'ggggg', 'belcaidna@gmail.com'),
(11, 'gfgfg', 2222, 'fgfg', 'belcaidna@gmail.com'),
(12, '200', 5555, 'hut founty agadir ', 'cvcv');

-- --------------------------------------------------------

--
-- Table structure for table `cmd`
--

DROP TABLE IF EXISTS `cmd`;
CREATE TABLE IF NOT EXISTS `cmd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `plat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `plat_id` (`plat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmd`
--

INSERT INTO `cmd` (`id`, `client_id`, `plat_id`) VALUES
(1, 9, 4),
(2, 10, 4),
(3, 11, 0),
(4, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plat`
--

DROP TABLE IF EXISTS `plat`;
CREATE TABLE IF NOT EXISTS `plat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plat`
--

INSERT INTO `plat` (`id`, `name`, `img`) VALUES
(1, 'Parmigiana', 'https://www.fod.ma/bundles/anonymousfoodondemandsite/img/products-new/emince-de-poulet.jpg'),
(2, 'Sandwich Italien\r\n', 'https://www.fod.ma/bundles/anonymousfoodondemandsite/img/products-new/fod-signature-pizza.jpg'),
(3, 'Kefta Sandwich\r\n', 'https://www.fod.ma/bundles/anonymousfoodondemandsite/img/products-new/parmigiana.jpg'),
(4, 'Chicken Masala Sandwich\r\n', 'https://www.fod.ma/bundles/anonymousfoodondemandsite/img/products-new/chicken-masala-sandwich.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

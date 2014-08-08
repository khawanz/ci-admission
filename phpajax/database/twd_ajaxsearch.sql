-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2013 at 03:55 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `twd_ajaxsearch`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(75) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `link`) VALUES
(1, 'Menampilkan Jumlah Follower Twitter Dengan PHP', 'http://www.tutorial-webdesign.com/menampilkan-jumlah-follower-twitter-dengan-php/'),
(2, 'Perbedaan Include dan Require dalam PHP', 'http://www.tutorial-webdesign.com/perbedaan-include-dan-require-di-php/'),
(3, 'Membuat Auto Height 100% Dengan CSS (Fullscreen)', 'http://www.tutorial-webdesign.com/membuat-auto-height-dengan-css/'),
(4, 'Membuat Animasi Awan Berjalan Dengan CSS', 'http://www.tutorial-webdesign.com/membuat-animasi-awan-berjalan-dengan-css-css3/'),
(5, '10 Tutorial Android untuk pemula', 'http://www.tutorial-webdesign.com/10-tutorial-android-untuk-pemula/'),
(6, 'Tutorial WPAP dengan Photoshop, Ilustrator dan Corel Draw', 'http://www.tutorial-webdesign.com/tutorial-wpap-dengan-photoshop-ilustrator-dan-coreldraw/'),
(7, 'Tutorial WPAP Dengan Photoshop Dan Illustrator', 'http://www.tutorial-webdesign.com/wpap-photoshop-illustrator/');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

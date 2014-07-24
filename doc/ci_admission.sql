-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2014 at 06:51 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('f8d7d422dabea2b5697ba69f1971e23d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:30.0) Gecko/20100101 Firefox/30.0', 1406184603, 'a:5:{s:9:"user_data";s:0:"";s:8:"username";s:4:"hadi";s:3:"uid";s:1:"1";s:5:"roles";a:0:{}s:5:"login";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `data_parent`
--

CREATE TABLE IF NOT EXISTS `data_parent` (
  `do_id` int(11) NOT NULL AUTO_INCREMENT,
  `do_status` varchar(20) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `do_name` varchar(255) NOT NULL,
  `do_education` varchar(10) NOT NULL,
  `do_job` varchar(50) NOT NULL,
  `do_position` varchar(50) NOT NULL,
  `do_email` varchar(100) DEFAULT NULL,
  `do_office_telp` varchar(10) DEFAULT NULL,
  `do_house_telp` varchar(10) DEFAULT NULL,
  `do_hp` varchar(25) DEFAULT NULL,
  `do_address` varchar(255) NOT NULL,
  `do_city` varchar(50) DEFAULT NULL,
  `do_zipcode` varchar(10) DEFAULT NULL,
  `do_salary` varchar(2) NOT NULL,
  `changed_by` int(11) DEFAULT NULL,
  `changed` int(11) DEFAULT NULL,
  PRIMARY KEY (`do_id`),
  KEY `uid` (`uid`),
  KEY `changed_by` (`changed_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `data_parent`
--

INSERT INTO `data_parent` (`do_id`, `do_status`, `uid`, `do_name`, `do_education`, `do_job`, `do_position`, `do_email`, `do_office_telp`, `do_house_telp`, `do_hp`, `do_address`, `do_city`, `do_zipcode`, `do_salary`, `changed_by`, `changed`) VALUES
(2, 'ayah', 27, 'Solihin', '1', '', '', '', '', '', '', 'jl.karet', '', '', '11', 1, 1406183149);

-- --------------------------------------------------------

--
-- Table structure for table `data_personal`
--

CREATE TABLE IF NOT EXISTS `data_personal` (
  `dp_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `dp_name` varchar(100) NOT NULL,
  `dp_nick` varchar(100) DEFAULT NULL,
  `dp_birthplace` varchar(255) NOT NULL,
  `dp_birthdate` date DEFAULT NULL,
  `dp_religion` varchar(15) DEFAULT NULL,
  `dp_sex` char(1) NOT NULL,
  `dp_status` char(1) DEFAULT NULL,
  `dp_blood` varchar(2) DEFAULT NULL,
  `dp_telp` varchar(10) DEFAULT NULL,
  `dp_hp` varchar(20) DEFAULT NULL,
  `changed_by` int(11) DEFAULT NULL,
  `changed` int(11) DEFAULT NULL,
  PRIMARY KEY (`dp_id`),
  KEY `uid` (`uid`),
  KEY `changed_by` (`changed_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `data_personal`
--

INSERT INTO `data_personal` (`dp_id`, `uid`, `dp_name`, `dp_nick`, `dp_birthplace`, `dp_birthdate`, `dp_religion`, `dp_sex`, `dp_status`, `dp_blood`, `dp_telp`, `dp_hp`, `changed_by`, `changed`) VALUES
(1, 27, 'Faris Maulana Saputra', 'Faris', 'Jakarta', '1998-01-01', '1', 'l', '1', '-', '-', '098888888', 1, 1406183150);

-- --------------------------------------------------------

--
-- Table structure for table `data_school`
--

CREATE TABLE IF NOT EXISTS `data_school` (
  `ds_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `ds_asal` varchar(30) NOT NULL,
  `ds_jurusan` varchar(10) NOT NULL,
  `ds_tahunlulus` varchar(4) NOT NULL,
  `ds_alamat` varchar(255) DEFAULT NULL,
  `ds_kota` varchar(50) DEFAULT NULL,
  `ds_kodepos` varchar(10) DEFAULT NULL,
  `changed_by` int(11) DEFAULT NULL,
  `changed` int(11) DEFAULT NULL,
  PRIMARY KEY (`ds_id`),
  KEY `uid` (`uid`),
  KEY `changed_by` (`changed_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `data_school`
--

INSERT INTO `data_school` (`ds_id`, `uid`, `ds_asal`, `ds_jurusan`, `ds_tahunlulus`, `ds_alamat`, `ds_kota`, `ds_kodepos`, `changed_by`, `changed`) VALUES
(8, 27, 'SMU N 35', 'ipa', '2014', 'jl.mutiara indah', '', '', 1, 1406183149);

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_id` int(11) DEFAULT NULL,
  `dep_code` varchar(5) DEFAULT NULL,
  `dep_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dep_id`),
  KEY `f_id` (`f_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_code` varchar(5) DEFAULT NULL,
  `f_name` varchar(50) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `prg_id` int(11) NOT NULL AUTO_INCREMENT,
  `prg_code` varchar(5) DEFAULT NULL,
  `prg_name` varchar(5) DEFAULT NULL,
  `prg_description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`prg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_fileno` varchar(10) DEFAULT NULL,
  `reg_pay_status` varchar(10) DEFAULT NULL,
  `reg_status` varchar(10) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `sc_id` int(11) NOT NULL,
  `pr_id` int(11) DEFAULT NULL,
  `dep1_id` int(11) DEFAULT NULL,
  `dep2_id` int(11) DEFAULT NULL,
  `dep3_id` int(11) DEFAULT NULL,
  `reg_info` varchar(255) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`reg_id`),
  KEY `added_by` (`added_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`rid`, `name`) VALUES
(1, 'anonymous user'),
(2, 'authenticated user'),
(3, 'super administrator'),
(4, 'administrator'),
(5, 'matriculant');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `sc_id` int(11) NOT NULL AUTO_INCREMENT,
  `sc_gelombang` char(1) NOT NULL,
  `sc_date` date NOT NULL,
  `sc_starttime` varchar(10) NOT NULL,
  `sc_endtime` varchar(10) NOT NULL,
  `sc_place` varchar(50) NOT NULL,
  `sc_address` varchar(250) NOT NULL,
  `sc_city` varchar(25) DEFAULT NULL,
  `sc_capacity` int(11) DEFAULT NULL,
  `sc_doc_deadline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sc_pay_deadline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sc_status` tinyint(1) DEFAULT '0',
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `changed` int(11) DEFAULT NULL,
  PRIMARY KEY (`sc_id`),
  KEY `added_by` (`added_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sc_id`, `sc_gelombang`, `sc_date`, `sc_starttime`, `sc_endtime`, `sc_place`, `sc_address`, `sc_city`, `sc_capacity`, `sc_doc_deadline`, `sc_pay_deadline`, `sc_status`, `added_by`, `updated_by`, `created`, `changed`) VALUES
(1, '1', '2014-07-25', '08:00', '14:00', 'Parkiran', '', 'Pekalongan', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1, 1406004963, 1406004963),
(2, '2', '2014-07-30', '06:00', '11:32', 'Departemen Sosial', '', 'JakSel', 150, '2008-02-13 17:00:00', '0000-00-00 00:00:00', 1, 1, 1, 1406012022, 1406012022),
(4, '3', '0000-00-00', '08:00', '12:24', 'Gedung Sekolah', 'Jl. Buaya 5', 'Brebes', 500, '2007-09-13 17:00:00', '2007-12-13 17:00:00', 0, 1, 1, 1405930478, 1405930478),
(6, '1', '0000-00-00', '14:00', '16:22', 'Aula', 'Jl. Hayam Wuruk', 'Padang', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 1, 1405932897, 1405932897),
(10, '2', '0000-00-00', '16:00', '21:00', 'Taman Kendala', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 1, 1405933697, 1405933697),
(11, '2', '0000-00-00', '07:00', '12:00', 'Belakang Lapangan Banteng', 'Jl.Merdeka Utara Kav 78', 'Jakpus', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 1, 1405994820, 1405994820),
(12, '1', '2014-07-31', '08:00', '14:00', 'Senayan', '', 'Jakpus', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 1, 1406006243, 1406006243);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `email`, `created`) VALUES
(1, 'hadi', '76671d4b83f6e6f953ea2dfb75ded921', NULL, NULL),
(16, 'khawanz', 'e778ac1cf14a08a1e4332ac187c5d05f', 'kd_kurnia@yahoo.com', 1406171333),
(27, 'farismaulana', '7d77e825b80cff62a72e680c1c81424f', 'faris@y.com', 1406183149);

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE IF NOT EXISTS `users_roles` (
  `rid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  KEY `rid` (`rid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`rid`, `uid`) VALUES
(3, 1),
(2, 1),
(2, 27),
(5, 27);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_parent`
--
ALTER TABLE `data_parent`
  ADD CONSTRAINT `data_parent_ibfk_4` FOREIGN KEY (`changed_by`) REFERENCES `users` (`uid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `data_parent_ibfk_3` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_personal`
--
ALTER TABLE `data_personal`
  ADD CONSTRAINT `data_personal_ibfk_3` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `data_personal_ibfk_4` FOREIGN KEY (`changed_by`) REFERENCES `users` (`uid`) ON UPDATE CASCADE;

--
-- Constraints for table `data_school`
--
ALTER TABLE `data_school`
  ADD CONSTRAINT `data_school_ibfk_4` FOREIGN KEY (`changed_by`) REFERENCES `users` (`uid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `data_school_ibfk_3` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `departement`
--
ALTER TABLE `departement`
  ADD CONSTRAINT `departement_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `users` (`uid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `registration_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`uid`) ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`uid`);

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_ibfk_3` FOREIGN KEY (`rid`) REFERENCES `role` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_roles_ibfk_4` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

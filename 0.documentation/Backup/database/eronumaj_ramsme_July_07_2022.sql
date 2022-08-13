-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2022 at 04:35 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eronumaj_ramsme`
--

DELIMITER $$
--
-- Functions
--
$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cbeas_subscription`
--

CREATE TABLE `cbeas_subscription` (
  `id` int(11) NOT NULL,
  `timestamp` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `avenue` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cbeas_subscription`
--

INSERT INTO `cbeas_subscription` (`id`, `timestamp`, `name`, `phone`, `avenue`, `street`) VALUES
(1, '210712', 'Emmanuel Eronu', '8033927733', 'First Avenue', 'Dept. of Electrical/Electronics Engineering, Perma');

-- --------------------------------------------------------

--
-- Table structure for table `complaintb`
--

CREATE TABLE `complaintb` (
  `entry` int(11) NOT NULL,
  `mobile_no` text NOT NULL,
  `name_value` text NOT NULL,
  `complain` text NOT NULL,
  `attachment` text NOT NULL,
  `vdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaintb`
--

INSERT INTO `complaintb` (`entry`, `mobile_no`, `name_value`, `complain`, `attachment`, `vdate`) VALUES
(1, '08058403852', 'Nsikak Ekpo', '', 'doc08058403852IMG-20220610-WA0014~2.jpg', '2022-06-12'),
(2, '08033927733', 'Emmanuel Majiyebo Eronu', '', 'doc08033927733security update receipt july 5 22.pdf', '2022-07-06'),
(3, '08012345678', 'John Adamu Adebayo', '', 'doc08012345678sample receipts.jpg', '2022-07-06'),
(4, '08012345678', 'John Adamu Adebayo', '', 'doc08012345678sample receipts.jpg', '2022-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `entry` int(11) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `name_value` text NOT NULL,
  `pay_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `pay_channel` varchar(10) NOT NULL,
  `service` text NOT NULL,
  `attachment` text NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`entry`, `mobile_no`, `name_value`, `pay_date`, `amount`, `pay_channel`, `service`, `attachment`, `remark`) VALUES
(47, '08033927733', 'Emmanuel Majiyebo Eronu', '2022-05-28', '7000.00', 'others', 'security', 'doc08033927733license.pdf', ''),
(48, '08033927733', 'Emmanuel Majiyebo Eronu', '2022-05-13', '21000.00', 'others', 'Security', '', ''),
(49, '08027423917', 'Kubai Aba Musa', '2022-05-16', '28000.00', 'others', 'security', '', ''),
(50, '08064257904', 'Mr chikoke', '2022-05-16', '21000.00', 'others', 'security', '', ''),
(51, '08024567428', 'Anthony Ogbechie', '2022-05-17', '26000.00', 'others', 'security', '', ''),
(52, '08035411162', 'Sanni Ben', '2022-05-17', '21000.00', 'others', 'security', '', ''),
(53, '08035411162', 'Sanni Ben', '2022-05-17', '21000.00', 'others', 'security', '', ''),
(54, '08036224989', 'Timothy Olusola Aiyedun', '2022-05-17', '28000.00', 'others', 'security', '', ''),
(55, '08035952446', 'pastor Fatolu Segun', '2022-05-16', '28000.00', 'others', 'security', '', ''),
(56, '08030615755', 'Gomina S', '2022-05-17', '49000.00', 'others', 'security', '', ''),
(57, '08056009752', 'Nnomadin vitus', '2022-05-17', '27000.00', 'others', 'Security', '', ''),
(58, '08058403852', 'Nsikak Ekpo', '2022-05-17', '35000.00', 'others', 'Security', '', ''),
(59, '08036224989', 'Timothy Olusola Aiyedun', '2022-05-17', '28000.00', 'others', 'Security', '', ''),
(60, '08035411162', 'Sanni Ben', '2022-05-17', '21000.00', 'others', 'Security', '', ''),
(61, '08034515948', 'Chuks Egemuba', '2022-05-17', '21000.00', 'others', 'Security', '', ''),
(62, '08098949236', 'Mr Augustine Obaze', '2022-05-17', '26000.00', 'others', 'Security', '', ''),
(63, '08034711308', 'Ojuroye Muibat', '2022-05-17', '11000.00', 'others', 'Security', '', ''),
(64, '08035791757', 'Mr Owolabi Odeyemi', '2022-05-17', '41000.00', 'others', 'Security', '', ''),
(65, '08063798426', 'Mrs Oparah Oluchukwu', '2022-05-17', '58000.00', 'others', 'Security', '', ''),
(66, '08100126463', 'Effiong', '2022-05-17', '42000.00', 'others', 'Security', '', ''),
(67, '08137449138', 'Mr Ndubisi Pascal', '2022-05-17', '14000.00', 'others', 'Security', '', ''),
(68, '08062515532', 'Mr Chukwu Emmanuel', '2022-05-17', '70000.00', 'others', 'Security', '', ''),
(69, '09036018723', 'Daniel Kuje', '2022-05-17', '36000.00', 'others', 'Security', '', ''),
(70, '07037898377', 'Pastor Aduloju Afolabi', '2022-05-17', '21000.00', 'others', 'Security', '', ''),
(71, '07037898377', 'Pastor Aduloju Afolabi', '2022-05-17', '21000.00', 'others', 'Security', '', ''),
(72, '08033798422', 'Mojoyinola Bisi', '2022-05-17', '14000.00', 'others', 'Security', '', ''),
(73, '08035952446', 'pastor Fatolu Segun', '2022-05-17', '28000.00', 'others', 'Security', '', ''),
(74, '08038767130', 'Bar Manafas', '2022-05-17', '30000.00', 'others', 'Security', '', ''),
(75, '08069389474', 'Mr Akin Fayeminu', '2022-05-17', '18000.00', 'others', 'Security', '', ''),
(76, '08065646294', 'Mr Infeanyi Ngerem', '2022-05-17', '35000.00', 'others', 'Security', '', ''),
(77, '08034932870', 'Mr Samuel Oyeboade', '2022-05-17', '20000.00', 'others', 'Security', '', ''),
(78, '08035952446', 'pastor Fatolu Segun', '2022-05-20', '7000.00', 'others', 'Security', '', 'May'),
(79, '08035952446', 'pastor Fatolu Segun', '2022-05-20', '28000.00', 'others', 'Security', '', ''),
(80, '08034711308', 'Ojuroye Muibat Olabisis', '2022-05-21', '28000.00', 'others', 'Security', '', ''),
(81, '08037874845', 'Alhaji Ilyasu Adamu', '2022-01-01', '21000.00', 'others', 'Security', '', ''),
(82, '08034711308', 'Ojuroye Muibat Olabisis', '2022-05-22', '7000.00', 'others', 'Security', '', 'Pay'),
(83, '08034515948', 'Chuks Egemuba', '2022-05-31', '7000.00', 'others', 'Security', '', 'Pay'),
(84, '09090256734', 'Moses Nwokedi', '2022-05-31', '21000.00', 'others', 'Security', '', 'Pay'),
(85, '08058403852', 'Nsikak Ekpo', '2022-05-31', '7000.00', 'others', 'Security', '', 'Pay'),
(86, '08035411162', 'Sanni Ben', '2022-05-26', '14000.00', 'others', 'Security', '', 'Pay'),
(87, '08056009752', 'Nnomadin vitus', '2022-06-01', '15000.00', 'others', 'Security', '', 'Pay'),
(88, '08033927733', 'Emmanuel Majiyebo Eronu', '2022-06-01', '8000.00', 'others', 'Security', '', 'Pay'),
(89, '08036224989', 'Timothy Olusola Aiyedun', '2022-06-06', '7000.00', 'others', 'Security', '', 'Pay'),
(90, '08037874845', 'Alhaji Ilyasu Adamu', '2022-05-31', '20000.00', 'others', 'infrastructure', '', 'Pay'),
(91, '08098949236', 'Mr Augustine Obaze', '2022-06-07', '7000.00', 'others', 'Security', '', 'Pay'),
(92, '09036018723', 'Daniel Kuje', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'Initialize'),
(93, '08033927733', 'Emmanuel Majiyebo Eronu', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(94, '08100126463', 'Effiong Helen', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(95, '07037898377', 'Pastor Aduloju Afolabi', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(96, '07052048502', 'Mr Sunday Akor', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(97, '08027423917', 'Kubai Aba Musa', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(98, '08030615755', 'Gomina S Kola', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(99, '08033798422', 'Mojoyinola Bisi', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(100, '08034515948', 'Chuks Egemuba', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(101, '07065581308', 'Alhaji Isa', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(102, '08034932870', 'Mr Samuel Oyeboade', '2022-06-09', '0.00', 'others', 'Security', '', 'initialize'),
(103, '08035411162', 'Sanni Ben', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(104, '08035791757', 'Mr Owolabi Odeyemi', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(105, '08035952446', 'Pastor Fatolu Segun', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(106, '08038767130', 'Bar Manafa Victor Obi', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(107, '08056009752', 'Nnomadin vitus', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(108, '08058403852', 'Nsikak Ekpo', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(109, '08062515532', 'Mr Chukwu Emmanuel', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(110, '08063798426', 'Mrs Oparah Oluchukwu', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(111, '08064257904', 'Mr Onyeama Nathan Chijioke', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(112, '08065646294', 'Mr Infeanyi Ngerem', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(113, '08069389474', 'Mr Akin Fayeminu', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(114, '08098949236', 'Mr Augustine Obaze', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(115, '08137449138', 'Mr Ndubisi Pascal', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(116, '08036224989', 'Timothy Olusola Aiyedun', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(117, '08024567428', 'Anthony Ogbechie', '2022-06-09', '0.00', 'others', 'infrastructure', '', 'initialize'),
(118, '08038767130', 'Bar Manafa Victor Obi', '2022-06-10', '10000.00', 'others', 'Security', '', 'Pay'),
(119, '08030615755', 'Gomina S Kola', '2022-06-11', '14000.00', 'paystack', 'Security', '', 'Security'),
(120, '08034711308', 'Ojuroye Muibat Olabisis', '2022-06-20', '7000.00', 'others', 'Security', '', 'Pay'),
(121, '08063798426', 'Mrs Oparah Oluchukwu', '2022-06-18', '2000.00', 'others', 'Security', '', 'Pay'),
(122, '08035952446', 'Pastor Fatolu Segun', '2022-06-22', '7000.00', 'others', 'Security', '', 'Pay'),
(123, '07065581308', 'Alhaji Isa', '2022-06-22', '7000.00', 'others', 'Security', '', 'Pay'),
(124, '08034711308', 'Ojuroye Muibat Olabisis', '2022-06-22', '7000.00', 'others', 'Security', '', 'Pay'),
(125, '08064257904', 'Mr Onyeama Nathan Chijioke', '2022-06-23', '14000.00', 'others', 'Security', '', 'Pay'),
(126, '08030615755', 'Gomina S Kola', '2022-06-23', '21000.00', 'others', 'Security', '', 'Pay'),
(127, '08024567428', 'Anthony Ogbechie', '2022-06-23', '14000.00', 'others', 'Security', '', 'Pay'),
(128, '08056009752', 'Nnomadin vitus', '2022-06-27', '14000.00', 'others', 'Security', '', 'Two months pay'),
(129, '07034610881', 'Abah E.A. Abah', '2022-06-29', '0.00', 'others', 'Security', '', 'reset'),
(130, '09065506336', 'Demas Daniel Kuje', '2022-06-29', '0.00', 'others', 'Security', '', 'reset'),
(131, '09090256734', 'Moses Nwokedi', '2022-06-29', '0.00', 'others', 'Security', '', 'reset'),
(132, '08058403852', 'Nsikak Ekpo', '2022-06-29', '7000.00', 'others', 'security', '', 'Pay'),
(133, '08063798426', 'Oparrah Lorretto Oluchukwu', '2022-06-27', '20000.00', 'others', 'Security', '', 'Pay'),
(134, '08034515948', 'Chuks Isaiah Egemuba', '2022-06-28', '7000.00', 'others', 'Security', '', 'Pay'),
(135, '07037898377', 'Aduloju Afolabi', '2022-06-30', '7000.00', 'others', 'Security', '', 'Pay'),
(136, '08033927733', 'Emmanuel Majiyebo Eronu', '2022-06-30', '7000.00', 'others', 'Security', '', 'Pay'),
(137, '08100423055', 'Pentecost', '2022-07-01', '21000.00', 'others', 'Security', '', 'Pay'),
(138, '08027423917', 'Kubai Aba Musa', '2022-07-01', '14000.00', 'others', 'Security', '', 'Pay'),
(139, '08036018723', 'Ubi Etta', '2022-07-05', '-87000.00', 'others', 'Security', '', 'update'),
(140, '08037004948', 'Bamidele Joseph Akinola', '2022-07-05', '14000.00', 'others', 'Security', '', 'Update'),
(141, '08067605157', 'Oladimeji Yusuf', '2022-07-05', '35000.00', 'others', 'Security', '', 'update'),
(142, '08064257904', 'Onyeama Nathan Chijioke', '2022-07-05', '10000.00', 'others', 'Security', '', 'update'),
(143, '08100423055', 'Pentecost', '2022-07-05', '14000.00', 'others', 'Security', '', 'update'),
(144, '09065506336', 'Demas Daniel Kuje', '2022-07-05', '36000.00', 'others', 'Security', '', 'update'),
(145, '09090256734', 'Moses Nwokedi', '2022-07-05', '49000.00', 'others', 'Security', '', 'update'),
(146, '09035770341', 'Mohammed Abdulmumin Mohammed', '2022-07-05', '23000.00', 'others', 'Security', '', 'update'),
(148, '08012345678', 'John Adamu Adebayo', '2022-07-01', '20000.00', 'others', 'Security', '', 'update'),
(149, '08098949236', 'Augustine Obazee', '2022-07-06', '7000.00', 'others', 'Security', '', 'Pay'),
(150, '08098949236', 'Augustine Obazee', '2022-07-07', '7000.00', 'others', 'Security', '', 'July Upate'),
(151, '08036018723', 'Ubi Etta', '2022-07-06', '5000.00', 'others', 'Security', '', 'July Update');

-- --------------------------------------------------------

--
-- Table structure for table `pay_sec_update`
--

CREATE TABLE `pay_sec_update` (
  `entry` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `mobile_no` text NOT NULL,
  `name_value` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `service` text NOT NULL,
  `remark` text NOT NULL,
  `attachment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay_sec_update`
--

INSERT INTO `pay_sec_update` (`entry`, `pay_date`, `mobile_no`, `name_value`, `amount`, `service`, `remark`, `attachment`) VALUES
(58, '2022-05-13', '08033927733', 'Emmanuel Majiyebo Eronu', '28000.00', 'Security', '', ''),
(59, '2022-05-16', '08027423917', 'Kubai Aba Musa', '21000.00', 'security', '', ''),
(60, '2022-05-16', '08064257904', 'Mr chikoke', '16000.00', 'security', '', ''),
(61, '2022-07-05', '08024567428', 'Anthony Ogbechie', '35000.00', 'security', '', ''),
(63, '2022-05-17', '08035411162', 'Sanni Ben', '21000.00', 'security', '', ''),
(64, '2022-05-16', '08035952446', 'pastor Fatolu Segun', '18000.00', 'security', '', ''),
(65, '2022-05-17', '08036224989', 'Timothy Olusola Aiyedun', '28000.00', 'security', '', ''),
(66, '2022-05-17', '08030615755', 'Gomina S', '42000.00', 'security', '', ''),
(67, '2022-05-17', '08056009752', 'Nnomadin vitus', '27000.00', 'Security', '', ''),
(68, '2022-05-17', '08058403852', 'Nsikak Ekpo', '35000.00', 'Security', '', ''),
(71, '2022-05-17', '08034515948', 'Chuks Egemuba', '23000.00', 'Security', '', ''),
(72, '2022-05-17', '08098949236', 'Mr Augustine Obaze', '26000.00', 'Security', '', ''),
(74, '2022-05-17', '08034711308', 'Ojuroye Muibat', '14000.00', 'Security', '', ''),
(76, '2022-05-17', '08035791757', 'Mr Owolabi Odeyemi', '41000.00', 'Security', '', ''),
(77, '2022-05-17', '08063798426', 'Mrs Oparah Oluchukwu', '58000.00', 'Security', '', ''),
(78, '2022-05-17', '08100126463', 'Effiong', '42000.00', 'Security', '', ''),
(79, '2022-05-17', '08137449138', 'Mr Ndubisi Pascal', '14000.00', 'Security', '', ''),
(80, '2022-05-17', '08062515532', 'Mr Chukwu Emmanuel', '70000.00', 'Security', '', ''),
(81, '2022-05-17', '09036018723', 'Daniel Kuje', '36000.00', 'Security', '', ''),
(82, '2022-05-17', '07037898377', 'Pastor Aduloju Afolabi', '21000.00', 'Security', '', ''),
(83, '2022-05-17', '07037898377', 'Pastor Aduloju Afolabi', '21000.00', 'Security', '', ''),
(84, '2022-05-17', '08033798422', 'Mojoyinola Bisi', '14000.00', 'Security', '', ''),
(85, '2022-05-17', '08038767130', 'Bar Manafas', '40000.00', 'Security', '', ''),
(86, '2022-05-17', '08069389474', 'Mr Akin Fayeminu', '30000.00', 'Security', '', ''),
(87, '2022-05-17', '08065646294', 'Mr Infeanyi Ngerem', '49000.00', 'Security', '', ''),
(88, '2022-05-17', '08034932870', 'Mr Samuel Oyeboade', '20000.00', 'Security', '', ''),
(89, '2022-05-17', '08035952446', 'pastor Fatolu Segun', '19000.00', 'Security', '', ''),
(90, '2022-05-22', '08034711308', 'Ojuroye Muibat Olabisis', '7000.00', 'Security', '', ''),
(91, '2022-01-01', '08037874845', 'Alhaji Ilyasu Adamu', '14000.00', 'Security', '', ''),
(92, '2022-05-22', '08034711308', 'Ojuroye Muibat Olabisis', '7000.00', 'Security', 'Pay', ''),
(93, '2022-05-31', '08034515948', 'Chuks Egemuba', '7000.00', 'Security', 'Pay', ''),
(95, '2022-05-31', '08058403852', 'Nsikak Ekpo', '7000.00', 'Security', 'Pay', ''),
(96, '2022-05-26', '08035411162', 'Sanni Ben', '14000.00', 'Security', 'Pay', ''),
(97, '2022-06-01', '08056009752', 'Nnomadin vitus', '2000.00', 'Security', 'Pay', ''),
(99, '2022-06-06', '08036224989', 'Timothy Olusola Aiyedun', '7000.00', 'Security', 'Pay', ''),
(100, '2022-05-31', '08037874845', 'Alhaji Ilyasu Adamu', '20000.00', 'infrastructure', 'Pay', ''),
(101, '2022-06-07', '08098949236', 'Mr Augustine Obaze', '7000.00', 'Security', 'Pay', ''),
(103, '2022-06-09', '08033927733', 'Emmanuel Majiyebo Eronu', '0.00', 'infrastructure', 'initialize', ''),
(104, '2022-06-09', '09036018723', 'Daniel Kuje', '0.00', 'infrastructure', 'Initialize', ''),
(105, '2022-06-09', '08100126463', 'Effiong Helen', '0.00', 'infrastructure', 'initialize', ''),
(106, '2022-06-09', '07037898377', 'Pastor Aduloju Afolabi', '0.00', 'infrastructure', 'initialize', ''),
(107, '2022-06-09', '07052048502', 'Mr Sunday Akor', '0.00', 'infrastructure', 'initialize', ''),
(108, '2022-06-09', '08027423917', 'Kubai Aba Musa', '0.00', 'infrastructure', 'initialize', ''),
(109, '2022-06-09', '08030615755', 'Gomina S Kola', '0.00', 'infrastructure', 'initialize', ''),
(110, '2022-06-09', '08033798422', 'Mojoyinola Bisi', '0.00', 'infrastructure', 'initialize', ''),
(111, '2022-06-09', '08034515948', 'Chuks Egemuba', '0.00', 'infrastructure', 'initialize', ''),
(112, '2022-06-09', '07065581308', 'Alhaji Isa', '0.00', 'infrastructure', 'initialize', ''),
(113, '2022-06-09', '08035411162', 'Sanni Ben', '0.00', 'infrastructure', 'initialize', ''),
(114, '2022-06-09', '08035791757', 'Mr Owolabi Odeyemi', '0.00', 'infrastructure', 'initialize', ''),
(115, '2022-06-09', '08035952446', 'Pastor Fatolu Segun', '0.00', 'infrastructure', 'initialize', ''),
(116, '2022-06-09', '08038767130', 'Bar Manafa Victor Obi', '0.00', 'infrastructure', 'initialize', ''),
(117, '2022-06-09', '08056009752', 'Nnomadin vitus', '0.00', 'infrastructure', 'initialize', ''),
(118, '2022-06-09', '08058403852', 'Nsikak Ekpo', '0.00', 'infrastructure', 'initialize', ''),
(119, '2022-06-09', '08062515532', 'Mr Chukwu Emmanuel', '0.00', 'infrastructure', 'initialize', ''),
(120, '2022-06-09', '08063798426', 'Mrs Oparah Oluchukwu', '0.00', 'infrastructure', 'initialize', ''),
(121, '2022-06-09', '08064257904', 'Mr Onyeama Nathan Chijioke', '0.00', 'infrastructure', 'initialize', ''),
(122, '2022-06-09', '08065646294', 'Mr Infeanyi Ngerem', '0.00', 'infrastructure', 'initialize', ''),
(123, '2022-06-09', '08069389474', 'Mr Akin Fayeminu', '0.00', 'infrastructure', 'initialize', ''),
(124, '2022-06-09', '08098949236', 'Mr Augustine Obaze', '0.00', 'infrastructure', 'initialize', ''),
(125, '2022-06-09', '08137449138', 'Mr Ndubisi Pascal', '0.00', 'infrastructure', 'initialize', ''),
(126, '2022-06-09', '08036224989', 'Timothy Olusola Aiyedun', '0.00', 'infrastructure', 'initialize', ''),
(127, '2022-06-09', '08024567428', 'Anthony Ogbechie', '0.00', 'infrastructure', 'initialize', ''),
(128, '2022-06-10', '08038767130', 'Bar Manafa Victor Obi', '10000.00', 'Security', 'Pay', ''),
(129, '0000-00-00', '08035997996', 'John Adamu', '0.00', 'security', 'initiation', ''),
(130, '0000-00-00', '08035997996', 'John Adamu', '0.00', 'infrastructure', 'initiation', ''),
(131, '2022-06-20', '08034711308', 'Ojuroye Muibat Olabisis', '7000.00', 'Security', 'Pay', ''),
(132, '2022-06-18', '08063798426', 'Mrs Oparah Oluchukwu', '20000.00', 'Security', 'Pay', ''),
(133, '2022-06-22', '08035952446', 'Pastor Fatolu Segun', '7000.00', 'Security', 'Pay', ''),
(134, '2022-06-22', '08034711308', 'Ojuroye Muibat Olabisis', '7000.00', 'Security', 'Pay', ''),
(135, '2022-06-23', '08064257904', 'Mr Onyeama Nathan Chijioke', '14000.00', 'Security', 'Pay', ''),
(136, '2022-06-23', '08030615755', 'Gomina S Kola', '21000.00', 'Security', 'Pay', ''),
(137, '2022-06-23', '08024567428', 'Anthony Ogbechie', '14000.00', 'Security', 'Pay', ''),
(138, '0000-00-00', '08037004948', '', '0.00', 'security', 'initiation', ''),
(139, '0000-00-00', '08037004948', '', '0.00', 'infrastructure', 'initiation', ''),
(140, '0000-00-00', '08137363040', 'Oluwafisayo Oluwadamilare Owozo', '0.00', 'security', 'initiation', ''),
(141, '0000-00-00', '08034932990', 'Oluwafisayo Oluwadamilare owzo', '0.00', 'security', 'initiation', ''),
(142, '0000-00-00', '08034932990', 'Oluwafisayo Oluwadamilare owzo', '0.00', 'infrastructure', 'initiation', ''),
(143, '0000-00-00', '08035000168', 'Matthew Ejelikwu Ogah', '0.00', 'security', 'initiation', ''),
(144, '0000-00-00', '08057672807', 'Matthew Kujaghtagher', '0.00', 'security', 'initiation', ''),
(145, '0000-00-00', '08033885902', 'Ikechukwu Daniel Njoku', '0.00', 'security', 'initiation', ''),
(146, '0000-00-00', '08038199096', 'Christian Onuawuchi Udeh', '0.00', 'security', 'initiation', ''),
(147, '0000-00-00', '09038830955', '', '0.00', 'security', 'initiation', ''),
(148, '0000-00-00', '09078503015', 'kalin Barshir abdulahi', '0.00', 'security', 'initiation', ''),
(149, '0000-00-00', '07069558281', 'Mr Abe Olu Gbenga', '0.00', 'security', 'initiation', ''),
(150, '0000-00-00', '08035877231', 'Hon Desmond Igbasi', '0.00', 'security', 'initiation', ''),
(151, '0000-00-00', '08036018723', 'PST Ubi Etta', '0.00', 'security', 'initiation', ''),
(152, '0000-00-00', '08036018723', 'PST Ubi Etta', '0.00', 'infrastructure', 'initiation', ''),
(155, '0000-00-00', '08067605157', '', '0.00', 'security', 'initiation', ''),
(156, '0000-00-00', '08163379286', 'Mrs Edith Nkem Abula', '0.00', 'security', 'initiation', ''),
(157, '0000-00-00', '09011635657', 'Mr Manfred Osobabe', '0.00', 'security', 'initiation', ''),
(158, '0000-00-00', '09023141919', 'Mr Kennedy Ifeanyi Reignard', '0.00', 'security', 'initiation', ''),
(159, '0000-00-00', '', 'Ihimire Erewele', '0.00', 'security', 'initiation', ''),
(160, '0000-00-00', '08035519498', 'Alalibo', '0.00', 'security', 'initiation', ''),
(161, '2022-06-27', '08056009752', 'Nnomadin vitus', '14000.00', 'Security', 'Two months pay', ''),
(162, '0000-00-00', '09035770341', 'Mohammed Abdulmumin Mohammed', '0.00', 'security', 'initiation', ''),
(163, '2022-06-29', '07034610881', 'Abah E.A. Abah', '0.00', 'Security', 'reset', ''),
(164, '2022-06-29', '09065506336', 'Demas Daniel Kuje', '0.00', 'Security', 'reset', ''),
(165, '2022-06-29', '09090256734', 'Moses Nwokedi', '0.00', 'Security', 'reset', ''),
(166, '2022-06-27', '08063798426', 'Oparrah Lorretto Oluchukwu', '20000.00', 'Security', 'Pay', ''),
(167, '2022-06-29', '08058403852', 'Nsikak Ekpo', '7000.00', 'security', 'Pay', ''),
(168, '2022-06-28', '08034515948', 'Chuks Isaiah Egemuba', '7000.00', 'Security', 'Pay', ''),
(169, '2022-06-30', '07037898377', 'Aduloju Afolabi', '7000.00', 'Security', 'Pay', ''),
(170, '2022-06-30', '08033927733', 'Emmanuel Majiyebo Eronu', '7000.00', 'Security', 'Pay', ''),
(171, '2022-07-01', '08100423055', 'Pentecost', '21000.00', 'Security', 'Pay', ''),
(172, '2022-07-01', '08027423917', 'Kubai Aba Musa', '14000.00', 'Security', 'Pay', ''),
(173, '0000-00-00', '08162594573', 'Justina Okopi', '0.00', 'security', 'initiation', ''),
(174, '2022-07-05', '08036018723', 'Ubi Etta', '-87000.00', 'Security', 'update', ''),
(175, '2022-07-05', '08037004948', 'Bamidele Joseph Akinola', '14000.00', 'Security', 'Update', ''),
(176, '2022-07-05', '08067605157', 'Oladimeji Yusuf', '35000.00', 'Security', 'update', ''),
(177, '2022-07-05', '08064257904', 'Onyeama Nathan Chijioke', '10000.00', 'Security', 'update', ''),
(178, '2022-07-05', '08100423055', 'Pentecost', '14000.00', 'Security', 'update', ''),
(179, '2022-07-05', '09065506336', 'Demas Daniel Kuje', '36000.00', 'Security', 'update', ''),
(180, '2022-07-05', '09090256734', 'Moses Nwokedi', '49000.00', 'Security', 'update', ''),
(181, '2022-07-05', '09035770341', 'Mohammed Abdulmumin Mohammed', '42000.00', 'Security', 'update', ''),
(184, '0000-00-00', '08123456789', 'John Adamu Adebayo', '0.00', 'security', 'initiation', ''),
(187, '0000-00-00', '08012345678', 'John Adamu Adebayo', '0.00', 'security', 'initiation', ''),
(188, '2022-07-01', '08012345678', 'John Adamu Adebayo', '20000.00', 'Security', 'update', ''),
(189, '2022-07-06', '08098949236', 'Augustine Obazee', '7000.00', 'Security', 'Pay', ''),
(191, '2022-07-07', '08098949236', 'Augustine Obazee', '7000.00', 'Security', 'July Upate', ''),
(192, '2022-07-06', '08036018723', 'Ubi Etta', '5000.00', 'Security', 'July Update', '');

-- --------------------------------------------------------

--
-- Table structure for table `sitewebhook`
--

CREATE TABLE `sitewebhook` (
  `ref` varchar(20) NOT NULL,
  `email_val` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `service` varchar(10) NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sitewebhook`
--

INSERT INTO `sitewebhook` (`ref`, `email_val`, `amount`, `mobile_no`, `service`, `remark`) VALUES
('fvv2mgbcri', 'majieronu2007@hotmail.com', '5884.00', '', '', ''),
('uq8mvg1ql3', 'majieronu2007@hotmail.com', '8117.00', '', '', ''),
('hvq5l21hfb', 'majieronu2007@hotmail.com', '156.84', '', '', ''),
('3qdcb1f01f', 'majieronu2007@hotmail.com', '788.17', '', '', ''),
('hvq5l21hfb', 'majieronu2007@hotmail.com', '156.84', '', '', ''),
('hvq5l21hfb', 'majieronu2007@hotmail.com', '156.84', '', '', ''),
('yz9rk0uhb4', 'majieronu2007@hotmail.com', '674.49', '', '', ''),
('du5euxajof', 'majieronu2007@hotmail.com', '8208.35', '', '', ''),
('0eym6r7wbh', 'majieronu2007@hotmail.com', '2130.00', '', '', ''),
('a6r9rcwhri', 'majieronu2007@hotmail.com', '2084.00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `mobile_no` varchar(11) NOT NULL,
  `name_value` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `plot_no` text NOT NULL,
  `avenue` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `occupancy` text NOT NULL,
  `no_rooms` int(11) NOT NULL,
  `role` text NOT NULL,
  `location` text NOT NULL,
  `effective_date` date NOT NULL,
  `sec_contr_dec21` decimal(10,2) NOT NULL,
  `infr_contr_dec21` decimal(10,2) NOT NULL,
  `sec_outst_dec21` decimal(10,2) NOT NULL,
  `infr_outst_dec21` decimal(10,2) NOT NULL,
  `addinfo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `mobile_no`, `name_value`, `password`, `plot_no`, `avenue`, `street`, `email`, `occupancy`, `no_rooms`, `role`, `location`, `effective_date`, `sec_contr_dec21`, `infr_contr_dec21`, `sec_outst_dec21`, `infr_outst_dec21`, `addinfo`) VALUES
(2, '08162594573', 'Justina Okopi', '$2y$10$XwXCvzjnK/aZuSnNP2UlUOYC.BwfxSQU1TpvP0oekVO6GxAqgCB8u', '', '', 'I Close', 'admin@ramsme.com', '', 0, '', '08162594573-Justina-08162594573.jpg', '0000-00-00', '0.00', '0.00', '0.00', '0.00', ''),
(7, '08033927733', 'Emmanuel Majiyebo Eronu', '$2y$10$UT7V1Fa4I/qRJXz7Oj6.peflLKyP8bMRIqxNdv3oU0SeMRxsc6MZ.', 'A14', 'First', 'G Close', 'majieronu2007@hotmail.com', 'Landlord', 3, 'admin', '08033927733-passport-1-chiness visa.jpg', '2022-01-01', '151000.00', '590000.00', '0.00', '0.00', 'Chairman, RAMSMEx'),
(60, '08027423917', 'Kubai Aba Musa', '$2y$10$ya60kCLzDDTt3N/NQkEfHupdq5EG/MHYEagKcgyxvnGnTAB/0eo3e', 'C21', 'Second', 'k close', 'makuba@yahoo.com', 'Landlord', 3, 'client', '08027423917-Mr.Kubai-08027423917.jpg', '2022-01-01', '151000.00', '298000.00', '0.00', '0.00', 'Chat Kubai'),
(65, '08031830712', 'Ezekiel yohanna', '$2y$10$oztL4FreKVjUKs6851ayfeEtOlj9Cn0j1rWRThfiAr7JCv9GYFSX.', 'C21', 'Second', 'k close', 'ezekiel@ramsme.com', 'Landlord', 0, 'admin', '08031830712-FB_IMG_16341590521454480.jpg', '2022-01-01', '0.00', '0.00', '0.00', '0.00', 'Admin'),
(66, '08037869900', 'Nnamdi Iwuchuwu', '$2y$10$v2L8DWeFX8sO.k5/gzUYoOjxiXdRJ5nBGDglybADmxD2ia2XG0gVi', 'B71', 'Hill Top', '', 'admin@ramsme.com', 'Landlord', 0, '', '', '2022-01-01', '0.00', '0.00', '0.00', '0.00', ''),
(67, '08064257904', 'Onyeama Nathan Chijioke', '$2y$10$4coXNibeC6PtjbDtudxCzeReveLhrWdIaQwXEc3AJJfPJd6.eBuL2', '', 'first avenue', '', 'admin@ramsme.com', 'Landlord', 0, '', '', '2022-01-01', '146000.00', '305000.00', '5000.00', '0.00', ''),
(68, '08034515948', 'Chuks Isaiah Egemuba', '$2y$10$Ft3SUKVRSFvHhvxmk.5yDeGxGI8mFOFlpalu2CYHUzBl7RHgyXt56', 'A80', 'First avenue', '', 'fegemuka@gmail.com', 'Landlord', 3, '', '08034515948-Mr Chuks-08034515948.jpg', '2022-01-01', '152000.00', '110000.00', '1000.00', '0.00', ''),
(69, '08030615755', 'Gomina Samuel Kola', '$2y$10$GyhAoZCnV7XMqtqXzlqGHOCZo3AQjBPunH1.V1WZEkFwLAVsJmJTm', 'A69B', 'First avenue', '', 'Kolaintegrity23@gmail.com', 'landlord', 3, '', '08030615755-Mr Kola-08030615755.jpg', '2022-01-01', '118000.00', '95000.00', '28000.00', '0.00', 'JAMES GLORY'),
(70, '08100423055', 'Pentecost', '$2y$10$tMCdZDMzd9VGDH72E5/9AObC2IB7D5fza5IjtUSLrSYBrD77g9ooq', '', '', '', 'admin@ramsme.com', 'Landlord', 0, '', '', '2022-01-01', '83000.00', '60000.00', '68000.00', '0.00', ''),
(71, '07065581308', 'Isa', '$2y$10$J6DDwLtxWseeWCp5cAcEjuMk9BqyiiJg2NFKGOJif7k.PB9EaXLVG', '', '', '', 'admin@ramsme.com', 'Landlord', 0, '', '', '2022-01-01', '108000.00', '98000.00', '43000.00', '0.00', ''),
(72, '08056009752', 'Nnomadin vitus', '$2y$10$StnndXBM8jD9AIiMT/enReE10k876sjS4.UgbnYiDg5MYVv75p2bm', 'A49', 'Off first avenue', 'J Crescent', 'admin@ramsme.com', 'Landlord', 0, '', '08056009752-Vitus.png', '2022-01-01', '147000.00', '195000.00', '1000.00', '0.00', ''),
(73, '07034610881', 'Abah E.A. Abah', '$2y$10$NjDVkPUXG8Z/LcXQUEiIQewXDf2d2ftGqHsQOfD872L6kA5AvrPom', 'A72', 'First Avenue', 'First Avenue', 'ericabahabah@gmail.com', 'Landlord', 3, '', '08050768389-Mr. Abah-07034610881.jpg', '2022-01-01', '105000.00', '21000.00', '46000.00', '0.00', ''),
(74, '09090256734', 'Moses Nwokedi', '$2y$10$oHUprWSYFnDBZmB4syen.OR/31qC8AKO3HtbcMShILZJ1fYfcBGUq', 'A133', 'First', '', 'mosesnwokedi256@gmail.com', 'Landlord', 3, '', '09090256734-Moses-09090256734.jpg', '2022-01-01', '158000.00', '518000.00', '7000.00', '0.00', ''),
(75, '08035411162', 'Adekunle Sanni Benjamin', '$2y$10$cbiB/XvcAMmu/u7WlkmpMuAQ8yOq0T5JBYMKE9gn/oAqowBpb3bmO', 'A38', 'Off first avenue', 'I close', 'kunsanni@yahoo.com', 'Landlord', 3, '', '08035411162-Mr. Sanni-08035411162.jpg', '2022-01-01', '151000.00', '550000.00', '0.00', '0.00', ''),
(76, '08036224989', 'Timothy Olusola Aiyedun', '$2y$10$hwqIzvmINQLpylCU9mN5NOObluLb0rHajPJ9u2uRAwzzgfLVeNWdu', 'A37', 'Off first avenue', 'I close', 'timolai2002@gmail.com', 'Landlord', 3, '', '08036224989-Aiyedun-08036224989.jpg', '2022-01-01', '151000.00', '281000.00', '0.00', '0.00', ''),
(77, '08058403852', 'Nsikak Ekpo', '$2y$10$vA3KqAC6pTp7FRZlXTYs/.MTSzZOGEqf/qmTVoeiwnEuxyf.LNoAi', 'A42', 'Off First Avenue', 'I Close', 'Ekpo_2004@yahoo.co.uk', 'Landlord', 0, '', '08058403852-IMG_20220110_081538_244~2.jpg', '2022-01-01', '144000.00', '22000.00', '7000.00', '0.00', ''),
(78, '08024567428', 'Anthony Chijindu Ogbechie', '$2y$10$ZREIReS9RCGmj2OrZyBbz.6a4/E79IetMcILPbfolfIJPXo9sp0Am', 'B136', 'Off Second avenue', 'A close', 'aogbechie@yahoo.com', 'Landlord', 0, '', '08175787225-Mr.Tony-08024567428.jpg', '2022-01-01', '141000.00', '158000.00', '5000.00', '0.00', ''),
(79, '08098949236', 'Augustine Obazee', '$2y$10$mDABUkmdb73u5MBDDYr0bef53r9JT9xUd8sXI7Kl2dysFKVkj7nSq', 'A29', 'off first avenue', 'H close', 'admin@ramsme.com', 'Landlord', 0, '', '08098949236-obazee-08098949236.jpg', '2022-01-01', '139000.00', '99000.00', '12000.00', '0.00', ''),
(80, '08034711308', 'Ojuroye Muibat Olabisis', '$2y$10$1dsXr.7cAEbCq/gPq6DOcuA5G.In2O4eIfR57VzeFhDEsnLbpNffK', 'A18', 'off first avenue', 'G close', 'admin@ramsme.com', 'Landlord', 0, '', '', '2022-01-01', '151000.00', '215000.00', '0.00', '0.00', ''),
(81, '08035791757', 'Marvelous Owolabi Odeyemi', '$2y$10$DnslrnM8hb4dPMAsstqF3uEMm2//i/ARM1l40.TVCQD5xftGdhzRa', 'A19', 'Off First Avenue', 'G close', 'marvellousolu@yahoo.com', 'Landlord', 3, '', '08035791757-Mr. Owolabi-08035791757.jpg', '2022-01-01', '151000.00', '59000.00', '0.00', '0.00', ''),
(82, '08053437717', 'Ruth Achem', '$2y$10$el6b8CgW6dB6O.xHIQIhOu8/KQ5mSeVGX7rXlw2szwToENyPHYGNi', 'E24', 'off first avenue', 'F close', 'admin@ramsme.com', 'Landlord', 0, '', '', '2022-01-01', '6000.00', '0.00', '145000.00', '0.00', ''),
(83, '08062617100', 'Adolfo Amadi', '$2y$10$I1dEEmruQRvtyLfUih9kMOpuDcQn.P9yTZ0yOtyv2RJXBzTwovpP6', '', 'off first avenue', 'F close', 'admin@ramsme.com', 'Landlord', 0, '', '', '2022-01-01', '5000.00', '111000.00', '146000.00', '0.00', ''),
(84, '08063798426', 'Oparrah Lorretto Oluchukwu', '$2y$10$HBkfgiQeqIBhZRlQ1N7Bl.reKD1bMH25GTq0uF0/ULzrhxYunHe1.', '', 'Off First Avenue', 'F close', 'oluchioparrah18@gmail.com', 'Landlord', 3, '', '08063798426-Mrs Oparah-08063798426.jpg', '2022-01-01', '81000.00', '518000.00', '70000.00', '0.00', ''),
(85, '07052048502', 'Sunday Akor', '$2y$10$CgkVikWyrfdZLtp3pbH4ju7xHDvzUMBAmZk/qsd9NtzTLSpCgOacG', 'E23', 'off first avenue', 'E close', 'admin@ramsme.com', 'landlord', 0, '', '', '2022-01-01', '56000.00', '53000.00', '95000.00', '0.00', ''),
(86, '08100126463', 'Edet Ukpong Effiong', '$2y$10$zTKbeGPWvf1juGNhk/aAruZhkY.4geRgm.IE7DxyC/15c0hV2y8Q.', 'E12', 'Off First Avenue', 'E close', 'eddieffiong74@yahoo.com', 'Landlord', 3, '', '07032480742-Brig. Gen. Effiong-08100126463.jpg', '2022-01-01', '151000.00', '140000.00', '0.00', '0.00', ''),
(87, '08137449138', 'Ndubisi Pascal', '$2y$10$/B4VEFLpwaihiwO4zUPD6u.D3h0ZLnS/aQqMsOvCBh5h2y4PSbXk6', 'E13', 'off first avenue', 'E close', 'admin@ramsme.com', 'Landlord', 0, '', '', '2022-01-01', '151000.00', '0.00', '0.00', '0.00', ''),
(88, '08062515532', 'Emmanuel Onovo Chukwu', '$2y$10$cwqLymZoJe4B.rYoO8E5tOuWp12YzlidqYvUTgM0lHJY.6OFrWEhS', 'E19', 'Off first avenue', 'E close', 'emmachuks6655@gmail.com', 'Landlord', 3, '', '08062515532-chukwu-08062515532.jpg', '2022-01-01', '82000.00', '186000.00', '69000.00', '0.00', ''),
(89, '09065506336', 'Demas Daniel Kuje', '$2y$10$7HGJjhV5PJ3s4iJfrj.s/ex4Q4bFdz44JCEfXGH5isAkrDiEqxH6e', 'E10', 'Off first avenue', 'D close', 'dankuje@gmail.com', 'Landlord', 0, '', '07031050688-Mr. Kuje-09065506336.jpg', '2022-01-01', '111000.00', '260000.00', '40000.00', '0.00', ''),
(91, '07037898377', 'Aduloju Afolabi', '$2y$10$cq9sfEcqNte7QNsj3NWN/.B8oH3jazX2I9G4ihyrouOm.RTrevSOa', 'E48', 'off first avenue', 'C close', 'admin@ramsme.com', 'Landlord', 0, '', '', '2022-01-01', '137000.00', '68000.00', '14000.00', '0.00', ''),
(92, '08033798422', 'Mojoyinola Bisi', '$2y$10$vP9PzdDZIqcHtFzc8f6rY.Sel2KWs1iuyOEDVUhuw2sT9kQJTRdjS', '', 'off first avenue', 'B close', 'admin@ramsme.com', 'Landlord', 0, '', '', '2022-01-01', '151000.00', '215000.00', '0.00', '0.00', ''),
(93, '08035952446', 'Fatolu Segun', '$2y$10$3Ev58tBzgGjuNHLfKvtlMO8N6c4vlAqhnLYTR.UcYC3O/Zhm7LOoG', 'k23', 'off first avenue', 'A close', 'admin@ramsme.com', 'Landlord', 0, '', '', '2022-01-01', '152000.00', '365000.00', '1000.00', '0.00', ''),
(94, '07036889034', 'Princes Eleojo', '$2y$10$KQvbGbdRse6WswwIArlVvexRX/wy8H2MVr7y8w1SrEN6pCFY1T98m', '', 'off first avenue', 'A close', 'admin@ramsme.com', 'Landlord', 0, '', '', '2022-01-01', '0.00', '0.00', '0.00', '0.00', ''),
(95, '08038767130', 'Manafa Victor Obi', '$2y$10$dkCW5Jlxtzp.kx68NkeuKOYccrCk76s1T9KBY8Hvdto6RYgttaJKG', 'C13', 'Off second avenue', 'A Close', 'obimmanafa2018@yahoo.com', 'Landlord', 3, '', '08038767130-Manafa-08038767130.jpg', '2022-01-01', '150000.00', '40000.00', '1000.00', '0.00', ''),
(96, '08069389474', 'Akin Fayeminu', '$2y$10$BV8iXO/shKuoMWMSK1CexuZmBT2mqnwm6um810EgH5aoj2.u8ksDW', 'C12', 'off second avenue', 'k close', 'afayinminu@gmail.com', 'Landlord', 3, '', '08069389474-pst Akin-08069389474_0003.jpg', '2022-01-01', '151000.00', '397000.00', '1000.00', '0.00', ''),
(97, '08065646294', 'Infeanyi Ngerem', '$2y$10$IXCri//cczsjdbTHp2w3W.fARfxjjSAqNdnaOtjUfLVdj0IyhaBDq', '', 'off second avenue', 'K close', 'admin@ramsme.com', 'Landlord', 0, '', '', '2022-01-01', '144000.00', '125000.00', '7000.00', '0.00', ''),
(98, '08034932870', 'Samuel Oyeboade', '$2y$10$Gv6qB4h7w5h4JgEfHR80CuP/3PqIxcQWcCK1QsaJ1FQiTi8boSN36', '', 'off second avenue', 'K close', 'admin@ramsme.com', 'Landlord', 0, '', '', '2022-01-01', '129000.00', '379000.00', '22000.00', '0.00', ''),
(99, '08037874845', 'Ilyasu Iman Adamu', '$2y$10$GyVx/djs.WKeWfKSJX6k9ORWl/0vC2stxgpouOHMadU54L6.LXrUS', 'E6', 'Off first avenue', 'D close', 'babaogbo046@gmail.com', 'Landlord', 3, '', '08037874845-Mr. Ilyasu-08037874845.jpg', '2022-01-01', '0.00', '0.00', '0.00', '0.00', ''),
(101, '08037004948', 'Bamidele Joseph Akinola', '$2y$10$qnkKfhHFCTzeYxLWoX8DtuVgHtjmMq9Wb7x2I5uj68rE52PDZf8em', 'A52', '', '', 'admin@ramsme.com', 'landlord', 0, '', '08037004948-pst Bamidele-08037004948.jpg', '2022-04-01', '0.00', '0.00', '0.00', '0.00', ''),
(103, '08137363040', 'Oluwafisayo Oluwadamilare owzo', '$2y$10$ckS0lDwbG82diLKETQAAE.gCPCkKfuDHzKpB/fGGrTIkjkr3XOgH6', '', '', '', 'admin@ramsme.com', 'tenant', 0, '', '08034932990-Mr Oluwafisayo-08137363040-08034932970.jpg', '0000-00-00', '0.00', '0.00', '0.00', '0.00', ''),
(104, '08035000168', 'Matthew Ejelikwu Ogah', '$2y$10$/5TqNseTTX7T7jMpNCCzh.FJY7e1HvxSnDrilN0gImTaS9vcZn9DG', '', 'off first avenue', 'H close', 'meogah@yahoo.com', 'tenant', 3, '', '08035000168-Mr. Ogah-08035000168.jpg', '2022-01-01', '0.00', '0.00', '0.00', '0.00', ''),
(105, '08057672807', 'Matthew Kujaghtagher', '$2y$10$kY.AEhb.eK6jG.xu5OoQzOFD6RziBNh55u7rJgZDtelLbIj20WxI2', 'A111', '', '', 'admin@ramsme.com', 'tenant-special', 1, '', '08057672807-Mr. Matthew-08057672807.jpg', '2022-01-01', '0.00', '0.00', '0.00', '0.00', ''),
(106, '08033885902', 'Ikechukwu Daniel Njoku', '$2y$10$aPwOC.0IdN5re6tytUo8Be75pSXlWoleA9mwIoWlA0pEMzLJdweuW', '119', '', '', 'stilmarciyke@gmail.com', 'tenant', 2, '', '08033885902-Mr. Njoku-08033885902.jpg', '2022-01-01', '0.00', '0.00', '0.00', '0.00', ''),
(107, '08038199096', 'Christian Onuawuchi Udeh', '$2y$10$pWJBlaN3EFeQQe81wz1eD.YCVjtdzJf/5Qxz4bwn5DYopKpdaygku', '27', '', '', 'admin@ramsme.com', 'tenant', 0, '', '08038199096-Mr Udeh-08038199096.jpg', '0000-00-00', '0.00', '0.00', '0.00', '0.00', ''),
(108, '09038830955', 'Ekerendu Asuquo', '$2y$10$l6KM3NfunzY3q3yZTTrIyeveh.3FMewww3i1OT1NebZ6lKUUjaQ5e', '', '', '', 'admin@ramsme.com', 'tenant', 0, '', '', '0000-00-00', '0.00', '0.00', '0.00', '0.00', ''),
(109, '09078503015', 'kalin Barshir Abdulahi', '$2y$10$pw3q6uFVA9/MltLVThXzQeZvg4R24CRi/bTWIX7Q4mqv1NFzfPVga', '', '', '', 'admin@ramsme.com', 'tenant-special', 1, '', '09078503015-Mr.Kolin-09078503015.jpg', '2022-01-01', '0.00', '0.00', '0.00', '0.00', ''),
(110, '07069558281', 'Abe Olu Gbenga', '$2y$10$6HUO0gASrdG.WRCTE1dhrerF8e7NC9SiBlDfmiMEIwvg17gYoAI6i', '', '', '', 'abematthew@yahoo.com', 'Landlord', 0, '', '', '0000-00-00', '0.00', '0.00', '0.00', '0.00', ''),
(111, '08035877231', 'Desmond Igbasi', '$2y$10$lj18O1ilhnVGhfYnVruK7u0c2a38659DASlcnTj1.lXfURhynFiP6', '', '', '', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', '0.00', '0.00', '0.00', '0.00', ''),
(112, '08036018723', 'Ubi Etta', '$2y$10$BeX6O3anOz0KLHIBqx/0I.JDvMvyGFFQV2.Y1wnHe4m/6GLZb.jWm', '134B', 'Off Second avenue', 'K close', 'ubietta9450@gmail.com', 'landlord', 3, '', '08036018723-Pst. Ubi-08036018723_0004.jpg', '2022-01-01', '58000.00', '0.00', '93000.00', '0.00', ''),
(115, '08067605157', 'Oladimeji Yusuf', '$2y$10$RusqubMWuABQlUiyn1Uze.NqWhFr7eZmqjUhbAgfxQd9N.nwx8UTa', 'E2', 'First', 'D Close', 'yusufoladimejimi@gmail.com', 'Landlord', 3, '', '08067605157-Mr Yusuf-08067605157.jpg', '2022-01-01', '0.00', '0.00', '0.00', '0.00', ''),
(116, '08163379286', 'Edith Nkem Abula', '$2y$10$0ee87mr7Fkcjg.aPu38SVeIO.aXT/ZzVsDfg4CFbogObDSCklXtym', 'E3', 'Off First Avenue', 'D Close', 'mummyedithsilva@gmail.com', 'Landlord', 3, '', '08163379286-Mrs Abula-08163379286.jpg', '2022-05-26', '0.00', '100000.00', '0.00', '0.00', ''),
(117, '09011635657', 'Manfred Osobabe', '$2y$10$fN9pdZdH/evZ8Fisnbo8xuEGuW.ppQIV2bpnAT0cGKEhZfyNuX2Xm', 'A15', 'Off First Avenue', 'J Close', 'admin@ramsme.com', 'tenant', 1, '', '09011635657-Mr. Manfred-09011635657.jpg', '2022-01-01', '0.00', '0.00', '0.00', '0.00', ''),
(118, '09023141919', 'Kennedy Ifeanyi Reignard', '$2y$10$v2hLzc/eEuG.G5rcavpGIe5Ey6YwDztMBp9zQDtwVOIyVo16mYMKa', '29', 'Alalibo Estate', '', 'kenobua@gmail.com', 'tenant', 2, '', '09023141919-Mr Kennedy-09023141919.jpg', '2022-05-01', '0.00', '0.00', '0.00', '0.00', ''),
(120, '08035519498', 'Alalibo', '$2y$10$rTeULn3Ofu7DtCGKT7Hj0euaVibv0CSR9rJdTGlf1VXCLKSK2KBEK', '', 'Alalibo Estate', '', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', '0.00', '0.00', '0.00', '0.00', ''),
(121, '09035770341', 'Mohammed Abdulmumin Mohammed', '$2y$10$18rCwg9Ki2JBjyGhX2OM1eKLhkcsAnreMVKZdX0RJzVkV.mhNoDxe', 'A43', 'Off First Avenue', 'I Close', 'abdizzle245@gmail.com', 'Landlord', 0, '', '09035770341-Mohammed-09035770341.jpg', '2022-01-01', '121000.00', '0.00', '23000.00', '0.00', ''),
(123, '08012345678', 'John Adamu Adebayo', '$2y$10$GUan5548M3u8lixQQ9fxJORbiEaKpWSz8BjXkKiw01TPEcaSI7wHi', 'A13', 'First', 'K Close', 'admin@ramsme.com', 'Landlord', 3, '', '08012345678-sampl id passport.png', '2022-01-01', '98000.00', '340000.00', '12000.00', '0.00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cbeas_subscription`
--
ALTER TABLE `cbeas_subscription`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `complaintb`
--
ALTER TABLE `complaintb`
  ADD PRIMARY KEY (`entry`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`entry`);

--
-- Indexes for table `pay_sec_update`
--
ALTER TABLE `pay_sec_update`
  ADD PRIMARY KEY (`entry`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`mobile_no`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cbeas_subscription`
--
ALTER TABLE `cbeas_subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaintb`
--
ALTER TABLE `complaintb`
  MODIFY `entry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `entry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `pay_sec_update`
--
ALTER TABLE `pay_sec_update`
  MODIFY `entry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

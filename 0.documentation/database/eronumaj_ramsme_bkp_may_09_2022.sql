-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2022 at 12:12 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.32

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
('fvv2mgbcri', 'majieronu2007@hotmail.com', 5884.00, '', '', ''),
('uq8mvg1ql3', 'majieronu2007@hotmail.com', 8117.00, '', '', ''),
('hvq5l21hfb', 'majieronu2007@hotmail.com', 156.84, '', '', ''),
('3qdcb1f01f', 'majieronu2007@hotmail.com', 788.17, '', '', ''),
('hvq5l21hfb', 'majieronu2007@hotmail.com', 156.84, '', '', ''),
('hvq5l21hfb', 'majieronu2007@hotmail.com', 156.84, '', '', ''),
('yz9rk0uhb4', 'majieronu2007@hotmail.com', 674.49, '', '', ''),
('du5euxajof', 'majieronu2007@hotmail.com', 8208.35, '', '', ''),
('0eym6r7wbh', 'majieronu2007@hotmail.com', 2130.00, '', '', ''),
('a6r9rcwhri', 'majieronu2007@hotmail.com', 2084.00, '', '', '');

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
(7, '08033927733', 'Emmanuel Majiyebo Eronu', '$2y$10$UT7V1Fa4I/qRJXz7Oj6.peflLKyP8bMRIqxNdv3oU0SeMRxsc6MZ.', 'A14', 'First', 'G Close', 'majieronu2007@hotmail.com', 'Landlord', 3, 'admin', '08033927733-passport-1-chiness visa.jpg', '2022-01-01', 151000.00, 590000.00, 0.00, 0.00, 'Chairman'),
(60, '08027423917', 'Kubai Aba Musa', '$2y$10$ya60kCLzDDTt3N/NQkEfHupdq5EG/MHYEagKcgyxvnGnTAB/0eo3e', 'C21', 'Second', 'k close', 'makuba@yahoo.com', 'Landlord', 3, 'client', '08027423917-MUSA 20220208_131141.jpg', '2022-01-01', 151000.00, 298000.00, 0.00, 0.00, 'Chat Kubai'),
(65, '08031830712', 'Ezekiel yohanna', '$2y$10$oztL4FreKVjUKs6851ayfeEtOlj9Cn0j1rWRThfiAr7JCv9GYFSX.', 'C21', 'Second', 'k close', 'ezekiel@ramsme.com', 'Landlord', 0, 'admin', '08031830712-2022-05-0917.33.48733166201.jpg', '2022-01-01', 0.00, 0.00, 0.00, 0.00, 'Admin'),
(66, '08037869900', 'Mr Nnamdi', '$2y$10$v2L8DWeFX8sO.k5/gzUYoOjxiXdRJ5nBGDglybADmxD2ia2XG0gVi', 'B71', 'Hill Top', '', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(67, '08064257904', 'Mr chikoke', '$2y$10$4coXNibeC6PtjbDtudxCzeReveLhrWdIaQwXEc3AJJfPJd6.eBuL2', '', 'first avenue', '', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(68, '08034515948', 'Chuks Egemuba', '$2y$10$Ft3SUKVRSFvHhvxmk.5yDeGxGI8mFOFlpalu2CYHUzBl7RHgyXt56', 'A80', 'first avenue', '', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(69, '08030615755', 'Gomina S', '$2y$10$GyhAoZCnV7XMqtqXzlqGHOCZo3AQjBPunH1.V1WZEkFwLAVsJmJTm', 'A69b', 'first avenue', '', 'admin@ramsme.com', 'landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(70, '08100423055', 'Pastor Pentecost', '$2y$10$tMCdZDMzd9VGDH72E5/9AObC2IB7D5fza5IjtUSLrSYBrD77g9ooq', '', '', '', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(71, '07065581308', 'Alhaji Isa', '$2y$10$J6DDwLtxWseeWCp5cAcEjuMk9BqyiiJg2NFKGOJif7k.PB9EaXLVG', '', '', '', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(72, '08056009752', 'Nnomadin vitus', '$2y$10$StnndXBM8jD9AIiMT/enReE10k876sjS4.UgbnYiDg5MYVv75p2bm', 'A49', 'Off first avenue', 'J Crescent', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(73, '08050768389', 'Abah E', '$2y$10$NjDVkPUXG8Z/LcXQUEiIQewXDf2d2ftGqHsQOfD872L6kA5AvrPom', 'A72', 'first avenue', '', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(74, '09090256734', 'Moses Nwokedi', '$2y$10$oHUprWSYFnDBZmB4syen.OR/31qC8AKO3HtbcMShILZJ1fYfcBGUq', 'A133', 'First', '', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(75, '08035411162', 'Danni Ben', '$2y$10$cbiB/XvcAMmu/u7WlkmpMuAQ8yOq0T5JBYMKE9gn/oAqowBpb3bmO', 'A38', 'Off first avenue', 'I close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(76, '08158591546', 'pastor Timothy aiyedun', '$2y$10$hwqIzvmINQLpylCU9mN5NOObluLb0rHajPJ9u2uRAwzzgfLVeNWdu', 'A37', 'off first avenue', 'I close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(77, '08058403852', 'Nskak Ekpo', '$2y$10$vA3KqAC6pTp7FRZlXTYs/.MTSzZOGEqf/qmTVoeiwnEuxyf.LNoAi', 'A42', 'off first avenue', 'I close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(78, '08175787225', 'Anthony Ogbechie', '$2y$10$ZREIReS9RCGmj2OrZyBbz.6a4/E79IetMcILPbfolfIJPXo9sp0Am', 'B136', 'off second avenue', 'A close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(79, '08098949236', 'Mr Augustine Obaze', '$2y$10$mDABUkmdb73u5MBDDYr0bef53r9JT9xUd8sXI7Kl2dysFKVkj7nSq', 'A29', 'off first avenue', 'H close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(80, '08034711308', 'Ojuroye Muibat', '$2y$10$1dsXr.7cAEbCq/gPq6DOcuA5G.In2O4eIfR57VzeFhDEsnLbpNffK', 'A18', 'off first avenue', 'G close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(81, '08035791757', 'Mr Owolabi Odeyemi', '$2y$10$DnslrnM8hb4dPMAsstqF3uEMm2//i/ARM1l40.TVCQD5xftGdhzRa', 'A19', 'off first avenue', 'G close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(82, '08053437717', 'Mrs Ruth Achem', '$2y$10$el6b8CgW6dB6O.xHIQIhOu8/KQ5mSeVGX7rXlw2szwToENyPHYGNi', 'E24', 'off first avenue', 'F close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(83, '08062617100', '', '$2y$10$I1dEEmruQRvtyLfUih9kMOpuDcQn.P9yTZ0yOtyv2RJXBzTwovpP6', '', 'off first avenue', 'F close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(84, '08063798426', 'Mrs Oparah Oluchukwu', '$2y$10$HBkfgiQeqIBhZRlQ1N7Bl.reKD1bMH25GTq0uF0/ULzrhxYunHe1.', '', 'off first avenue', 'F close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(85, '07052048502', 'Mr Sunday Akor', '$2y$10$CgkVikWyrfdZLtp3pbH4ju7xHDvzUMBAmZk/qsd9NtzTLSpCgOacG', 'E23', 'off first avenue', 'E close', 'admin@ramsme.com', 'landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(86, '07032480742', '', '$2y$10$zTKbeGPWvf1juGNhk/aAruZhkY.4geRgm.IE7DxyC/15c0hV2y8Q.', 'E12', 'off first avenue', 'E close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(87, '08137449138', 'Mr Ndubisi Pascal', '$2y$10$/B4VEFLpwaihiwO4zUPD6u.D3h0ZLnS/aQqMsOvCBh5h2y4PSbXk6', 'E13', 'off first avenue', 'E close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(88, '08062515532', 'Mr Chukwu Emmanuel', '$2y$10$cwqLymZoJe4B.rYoO8E5tOuWp12YzlidqYvUTgM0lHJY.6OFrWEhS', 'E19', 'off first avenue', 'E close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(89, '07031050688', 'Mr Demas Kuje', '$2y$10$7HGJjhV5PJ3s4iJfrj.s/ex4Q4bFdz44JCEfXGH5isAkrDiEqxH6e', 'E10', 'off first avenue', 'D close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(90, '08037898377', 'Alhaji Ilyasu Adamu', '$2y$10$DshSewf9kTAlORutaajI5.1hf.TYGdxUdcj4oiHBAdtOMIcZRyBBK', 'E6', 'off first avenue', 'D close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(91, '07037898377', 'Pastor Aduloju Afolabi', '$2y$10$cq9sfEcqNte7QNsj3NWN/.B8oH3jazX2I9G4ihyrouOm.RTrevSOa', 'E48', 'off first avenue', 'C close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(92, '08033798422', '', '$2y$10$vP9PzdDZIqcHtFzc8f6rY.Sel2KWs1iuyOEDVUhuw2sT9kQJTRdjS', '', 'off first avenue', 'B close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(93, '08035952446', 'pastor Fatolu Segun', '$2y$10$3Ev58tBzgGjuNHLfKvtlMO8N6c4vlAqhnLYTR.UcYC3O/Zhm7LOoG', 'k23', 'off first avenue', 'A close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(94, '07036889034', 'princes Eleojo', '$2y$10$KQvbGbdRse6WswwIArlVvexRX/wy8H2MVr7y8w1SrEN6pCFY1T98m', '', 'off first avenue', 'A close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(95, '08038767130', 'Bar Manafas', '$2y$10$dkCW5Jlxtzp.kx68NkeuKOYccrCk76s1T9KBY8Hvdto6RYgttaJKG', 'C13', 'off second avenue', 'k close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, 'Xx'),
(96, '08069389474', 'Mr Akin Fayeminu', '$2y$10$BV8iXO/shKuoMWMSK1CexuZmBT2mqnwm6um810EgH5aoj2.u8ksDW', '', 'off second avenue', 'k close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(97, '08065646294', 'Mr Infeanyi Ngerem', '$2y$10$IXCri//cczsjdbTHp2w3W.fARfxjjSAqNdnaOtjUfLVdj0IyhaBDq', '', 'off second avenue', 'K close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, ''),
(98, '08034932870', 'Mr Samuel Oyeboade', '$2y$10$Gv6qB4h7w5h4JgEfHR80CuP/3PqIxcQWcCK1QsaJ1FQiTi8boSN36', '', 'off second avenue', 'K close', 'admin@ramsme.com', 'Landlord', 0, '', '', '0000-00-00', 0.00, 0.00, 0.00, 0.00, '');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`mobile_no`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

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
  MODIFY `entry` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `entry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `pay_sec_update`
--
ALTER TABLE `pay_sec_update`
  MODIFY `entry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

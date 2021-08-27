-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2021 at 10:59 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keputusan`
--

-- --------------------------------------------------------

--
-- Table structure for table `collar`
--

CREATE TABLE `collar` (
  `id_collar` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collar`
--

INSERT INTO `collar` (`id_collar`, `name`, `status`) VALUES
(1, 'AMALFI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `defectmajor`
--

CREATE TABLE `defectmajor` (
  `id_major` int(11) NOT NULL,
  `name` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `defectminor`
--

CREATE TABLE `defectminor` (
  `id_minor` int(11) NOT NULL,
  `name` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `po_number` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `mail_number` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `buyer` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `style_id` int(11) NOT NULL,
  `collar_id` int(11) NOT NULL,
  `qty` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `tgl_pesan` date NOT NULL,
  `buyreq` date NOT NULL,
  `status` int(11) NOT NULL,
  `check_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `po_number`, `mail_number`, `buyer`, `style_id`, `collar_id`, `qty`, `tgl_pesan`, `buyreq`, `status`, `check_by`) VALUES
(8, 'PO1/22313/TES1234', 'PO1/22313/TES1234', 'VAN HUESEN', 1, 1, '350', '2020-10-10', '2020-11-13', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `quality_control`
--

CREATE TABLE `quality_control` (
  `id_qc` int(11) NOT NULL,
  `po_number` int(11) NOT NULL,
  `id_shirt` varchar(11) NOT NULL,
  `front` int(11) NOT NULL,
  `back` int(11) NOT NULL,
  `hand` int(11) NOT NULL,
  `collar` int(11) NOT NULL,
  `cuff` int(11) NOT NULL,
  `pocket` int(11) NOT NULL,
  `label` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `check_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(512) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role_name`, `status`) VALUES
(3, 'kepala qc', 1),
(4, 'staff qc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `cek_info` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `cek_info`) VALUES
(1, 'Active'),
(2, 'Not Active');

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

CREATE TABLE `style` (
  `id_style` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `qty` varchar(512) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `style`
--

INSERT INTO `style` (`id_style`, `name`, `qty`, `status`) VALUES
(1, 'TENDENZ M.F L/S', '2100', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `fullname` varchar(512) NOT NULL,
  `username` varchar(512) NOT NULL,
  `password` varchar(512) NOT NULL,
  `no_hp` varchar(512) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `fullname`, `username`, `password`, `no_hp`, `id_role`) VALUES
(7, 'Meidy', 'admin', 'admin', '081xxxxxxxxx', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collar`
--
ALTER TABLE `collar`
  ADD PRIMARY KEY (`id_collar`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `defectmajor`
--
ALTER TABLE `defectmajor`
  ADD PRIMARY KEY (`id_major`);

--
-- Indexes for table `defectminor`
--
ALTER TABLE `defectminor`
  ADD PRIMARY KEY (`id_minor`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `check_by` (`check_by`),
  ADD KEY `style_id` (`style_id`),
  ADD KEY `collar_id` (`collar_id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `quality_control`
--
ALTER TABLE `quality_control`
  ADD PRIMARY KEY (`id_qc`),
  ADD KEY `check_by` (`check_by`),
  ADD KEY `quality_control_ibfk_1` (`po_number`),
  ADD KEY `status` (`status`),
  ADD KEY `front` (`front`),
  ADD KEY `back` (`back`),
  ADD KEY `hand` (`hand`),
  ADD KEY `collar` (`collar`),
  ADD KEY `cuff` (`cuff`),
  ADD KEY `pocket` (`pocket`),
  ADD KEY `label` (`label`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`id_style`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collar`
--
ALTER TABLE `collar`
  MODIFY `id_collar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `defectmajor`
--
ALTER TABLE `defectmajor`
  MODIFY `id_major` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `defectminor`
--
ALTER TABLE `defectminor`
  MODIFY `id_minor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quality_control`
--
ALTER TABLE `quality_control`
  MODIFY `id_qc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `style`
--
ALTER TABLE `style`
  MODIFY `id_style` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collar`
--
ALTER TABLE `collar`
  ADD CONSTRAINT `collar_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`id_status`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`check_by`) REFERENCES `users` (`id_users`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`style_id`) REFERENCES `style` (`id_style`),
  ADD CONSTRAINT `pesanan_ibfk_3` FOREIGN KEY (`collar_id`) REFERENCES `collar` (`id_collar`),
  ADD CONSTRAINT `pesanan_ibfk_5` FOREIGN KEY (`status`) REFERENCES `status` (`id_status`);

--
-- Constraints for table `quality_control`
--
ALTER TABLE `quality_control`
  ADD CONSTRAINT `quality_control_ibfk_1` FOREIGN KEY (`front`) REFERENCES `defectminor` (`id_minor`),
  ADD CONSTRAINT `quality_control_ibfk_10` FOREIGN KEY (`hand`) REFERENCES `defectmajor` (`id_major`),
  ADD CONSTRAINT `quality_control_ibfk_11` FOREIGN KEY (`collar`) REFERENCES `defectmajor` (`id_major`),
  ADD CONSTRAINT `quality_control_ibfk_12` FOREIGN KEY (`cuff`) REFERENCES `defectmajor` (`id_major`),
  ADD CONSTRAINT `quality_control_ibfk_13` FOREIGN KEY (`pocket`) REFERENCES `defectmajor` (`id_major`),
  ADD CONSTRAINT `quality_control_ibfk_14` FOREIGN KEY (`label`) REFERENCES `defectmajor` (`id_major`),
  ADD CONSTRAINT `quality_control_ibfk_15` FOREIGN KEY (`po_number`) REFERENCES `pesanan` (`id`),
  ADD CONSTRAINT `quality_control_ibfk_16` FOREIGN KEY (`status`) REFERENCES `status` (`id_status`),
  ADD CONSTRAINT `quality_control_ibfk_2` FOREIGN KEY (`back`) REFERENCES `defectminor` (`id_minor`),
  ADD CONSTRAINT `quality_control_ibfk_3` FOREIGN KEY (`hand`) REFERENCES `defectminor` (`id_minor`),
  ADD CONSTRAINT `quality_control_ibfk_4` FOREIGN KEY (`collar`) REFERENCES `defectminor` (`id_minor`),
  ADD CONSTRAINT `quality_control_ibfk_5` FOREIGN KEY (`cuff`) REFERENCES `defectminor` (`id_minor`),
  ADD CONSTRAINT `quality_control_ibfk_6` FOREIGN KEY (`pocket`) REFERENCES `defectminor` (`id_minor`),
  ADD CONSTRAINT `quality_control_ibfk_7` FOREIGN KEY (`label`) REFERENCES `defectminor` (`id_minor`),
  ADD CONSTRAINT `quality_control_ibfk_8` FOREIGN KEY (`front`) REFERENCES `defectmajor` (`id_major`),
  ADD CONSTRAINT `quality_control_ibfk_9` FOREIGN KEY (`back`) REFERENCES `defectmajor` (`id_major`);

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`id_status`);

--
-- Constraints for table `style`
--
ALTER TABLE `style`
  ADD CONSTRAINT `style_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`id_status`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

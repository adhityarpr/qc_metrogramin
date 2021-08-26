-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2021 at 08:23 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

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
-- Table structure for table `mesin`
--

CREATE TABLE `mesin` (
  `id_mesin` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mesin`
--

INSERT INTO `mesin` (`id_mesin`, `name`, `status`) VALUES
(1, 'C', 1);

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id_op` int(11) NOT NULL,
  `nickname` varchar(512) NOT NULL,
  `fullname` varchar(512) NOT NULL,
  `no_hp` varchar(512) NOT NULL,
  `status` int(11) NOT NULL
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
  `mesin_id` int(11) NOT NULL,
  `qty` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `tgl_pesan` date NOT NULL,
  `buyreq` date NOT NULL,
  `status` int(11) NOT NULL,
  `check_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `po_number`, `mail_number`, `buyer`, `style_id`, `collar_id`, `mesin_id`, `qty`, `tgl_pesan`, `buyreq`, `status`, `check_by`) VALUES
(7, 'PO1/22313/TES1234', 'PO1/22313/TES1234', 'VAN HUESEN', 1, 1, 1, '350', '2020-10-10', '2020-11-13', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `quality_control`
--

CREATE TABLE `quality_control` (
  `id_qc` int(11) NOT NULL,
  `po_number` int(11) NOT NULL,
  `id_shirt` varchar(11) NOT NULL,
  `front` varchar(512) NOT NULL,
  `back` varchar(512) NOT NULL,
  `hand` varchar(512) NOT NULL,
  `collar` varchar(512) NOT NULL,
  `cuff` varchar(512) NOT NULL,
  `pocket` varchar(512) NOT NULL,
  `label` varchar(512) NOT NULL,
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
(1, 'active'),
(2, 'not active');

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
-- Indexes for table `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`id_mesin`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_op`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `check_by` (`check_by`),
  ADD KEY `style_id` (`style_id`),
  ADD KEY `collar_id` (`collar_id`),
  ADD KEY `mesin_id` (`mesin_id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `quality_control`
--
ALTER TABLE `quality_control`
  ADD PRIMARY KEY (`id_qc`),
  ADD KEY `check_by` (`check_by`),
  ADD KEY `quality_control_ibfk_1` (`po_number`),
  ADD KEY `status` (`status`);

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
-- AUTO_INCREMENT for table `mesin`
--
ALTER TABLE `mesin`
  MODIFY `id_mesin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id_op` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Constraints for table `mesin`
--
ALTER TABLE `mesin`
  ADD CONSTRAINT `mesin_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`id_status`);

--
-- Constraints for table `operator`
--
ALTER TABLE `operator`
  ADD CONSTRAINT `operator_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`id_status`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`check_by`) REFERENCES `users` (`id_users`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`style_id`) REFERENCES `style` (`id_style`),
  ADD CONSTRAINT `pesanan_ibfk_3` FOREIGN KEY (`collar_id`) REFERENCES `collar` (`id_collar`),
  ADD CONSTRAINT `pesanan_ibfk_4` FOREIGN KEY (`mesin_id`) REFERENCES `mesin` (`id_mesin`),
  ADD CONSTRAINT `pesanan_ibfk_5` FOREIGN KEY (`status`) REFERENCES `status` (`id_status`);

--
-- Constraints for table `quality_control`
--
ALTER TABLE `quality_control`
  ADD CONSTRAINT `quality_control_ibfk_1` FOREIGN KEY (`po_number`) REFERENCES `pesanan` (`id`),
  ADD CONSTRAINT `quality_control_ibfk_2` FOREIGN KEY (`check_by`) REFERENCES `operator` (`id_op`),
  ADD CONSTRAINT `quality_control_ibfk_3` FOREIGN KEY (`status`) REFERENCES `status` (`id_status`);

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

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 11:19 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pencatatan`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_satuan`
--

CREATE TABLE `t_satuan` (
  `id` int(11) NOT NULL,
  `singkatan` varchar(10) NOT NULL,
  `nama_satuan` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_satuan`
--

INSERT INTO `t_satuan` (`id`, `singkatan`, `nama_satuan`, `keterangan`, `status`) VALUES
(2, 'KG', 'Kilogram', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `id` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `nominal` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `jenis_transaksi` int(11) NOT NULL COMMENT '1 = masuk\r\n2 = keluar',
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `tahun` year(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_transaksi`
--

INSERT INTO `t_transaksi` (`id`, `id_satuan`, `id_user`, `jumlah`, `nominal`, `keterangan`, `jenis_transaksi`, `tanggal`, `jam`, `tahun`, `created_at`, `updated_at`) VALUES
(5, 2, 1, '10', '90000', '', 1, '2022-05-06', '19:10:48', 2021, '2022-05-07 00:10:48', '2022-05-06 19:10:48'),
(6, 2, 1, '100', '900000', '', 2, '2022-05-06', '19:13:45', 2022, '2022-05-07 00:13:45', '2022-05-06 19:13:45'),
(7, 2, 1, '20', '180000', '', 1, '2022-06-15', '06:15:43', 2022, '2022-05-07 11:15:43', '2022-05-07 06:15:43'),
(8, 2, 1, '15', '120000', '', 1, '2022-07-28', '06:16:12', 2022, '2022-05-07 11:16:12', '2022-05-07 06:16:12'),
(9, 2, 1, '100', '900000', '', 1, '2022-08-17', '06:16:27', 2022, '2022-05-07 11:16:27', '2022-05-07 06:16:27'),
(10, 2, 1, '90', '800000', '', 1, '2022-04-07', '06:16:58', 2022, '2022-05-07 11:16:58', '2022-05-07 06:16:58'),
(11, 2, 1, '75', '780000', '', 1, '2022-09-23', '06:17:15', 2022, '2022-05-07 11:17:15', '2022-05-07 06:17:15'),
(12, 2, 1, '47', '640000', '', 1, '2022-10-26', '06:17:31', 2022, '2022-05-07 11:17:31', '2022-05-07 06:17:31'),
(13, 2, 1, '1000', '9000000', '', 2, '2022-06-15', '06:17:59', 2022, '2022-05-07 11:17:59', '2022-05-07 06:17:59'),
(14, 2, 1, '1', '8700000', '', 2, '2022-08-17', '06:18:39', 2022, '2022-05-07 11:18:39', '2022-05-07 06:18:39'),
(15, 2, 1, '10', '90000', '', 2, '2022-05-07', '06:20:34', 2022, '2022-05-07 11:20:34', '2022-05-07 06:20:34'),
(16, 2, 1, '1', '9000000', '', 1, '2022-05-07', '06:20:48', 2022, '2022-05-07 11:20:48', '2022-05-07 06:20:48'),
(17, 2, 1, '1000', '9000000', '', 2, '2022-05-25', '06:21:17', 2022, '2022-05-07 11:21:17', '2022-05-07 06:21:17'),
(18, 2, 1, '1500', '13000000', '', 2, '2022-07-14', '06:22:04', 2022, '2022-05-07 11:22:04', '2022-05-07 06:22:04'),
(19, 2, 1, '1000', '1000000', '', 1, '2022-05-12', '03:44:18', 2022, '2022-05-12 08:44:18', '2022-05-12 03:44:18'),
(20, 2, 1, '1000', '18000000', 'Gula cetak organik', 1, '2022-05-05', '03:48:01', 2022, '2022-05-12 08:48:01', '2022-05-12 03:48:01'),
(21, 2, 1, '2000', '23000000', '', 2, '2022-05-12', '03:49:43', 2022, '2022-05-12 08:49:43', '2022-05-12 03:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `level` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `password`, `nama_user`, `no_hp`, `level`, `keterangan`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '', 1, '0', '1'),
(5, 'user', '202cb962ac59075b964b07152d234b70', 'user', '089', 2, 'tes', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_satuan`
--
ALTER TABLE `t_satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_satuan` (`id_satuan`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_satuan`
--
ALTER TABLE `t_satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 08:08 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qr-scan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbadmin`
--

CREATE TABLE `tbadmin` (
  `kode_user` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`kode_user`, `nama`, `pass`) VALUES
('F-1', 'Friz', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbbarang`
--

CREATE TABLE `tbbarang` (
  `kodebarang` varchar(50) NOT NULL,
  `qty` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbdetil`
--

CREATE TABLE `tbdetil` (
  `id` int(11) NOT NULL,
  `kode_user` varchar(50) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `ket` varchar(10) NOT NULL,
  `kodebarang` varchar(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `tgl_pinjam` datetime DEFAULT NULL,
  `tgl_kembali` datetime DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdetil`
--

INSERT INTO `tbdetil` (`id`, `kode_user`, `nama_user`, `ket`, `kodebarang`, `nama_barang`, `qty`, `lokasi`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(48, '6704', 'Frizthover Tediaz', '12 TKJ 3', 'HD-1', 'Hard Disk', '0', 'Lab Lt.2', '2021-09-04 14:21:27', '2021-09-04 15:27:20', 'sudah'),
(49, '6704', 'Frizthover Tediaz', '12 TKJ 3', 'FD-1', 'Floppy Disk', '0', 'Lab Lt.1', '2021-09-04 14:21:27', '2021-09-04 15:28:10', 'sudah'),
(50, '6704', 'Frizthover Tediaz', '12 TKJ 3', 'HD-1', 'Hard Disk', '0', 'Lab Lt.2', '2021-09-04 14:22:29', '2021-09-04 15:27:35', 'sudah'),
(51, '6704', 'Frizthover Tediaz', '12 TKJ 3', 'FD-1', 'Floppy Disk', '0', 'Lab Lt.1', '2021-09-04 14:22:29', '2021-09-04 16:35:44', 'sudah'),
(52, '6704', 'Frizthover Tediaz', '12 TKJ 3', 'FD-1', 'Floppy Disk', '0', 'Lab Lt.1', '2021-09-04 14:26:37', '2021-09-04 16:35:44', 'sudah'),
(53, '6704', 'Frizthover Tediaz', '12 TKJ 3', 'HD-1', 'Hard Disk', '0', 'Lab Lt.2', '2021-09-04 14:26:37', '2021-09-04 16:35:44', 'sudah'),
(54, '6704', 'Frizthover Tediaz', '12 TKJ 3', 'FD-1', 'Floppy Disk', '0', 'Lab Lt.1', '2021-09-04 15:22:43', '2021-09-04 15:27:51', 'sudah'),
(55, '6704', 'Frizthover Tediaz', '12 TKJ 3', 'FD-1', 'Floppy Disk', '0', 'Lab Lt.1', '2021-09-04 16:37:57', '2021-09-04 16:39:16', 'sudah'),
(56, '6704', 'Frizthover Tediaz', '12 TKJ 3', 'HD-1', 'Hard Disk', '0', 'Lab Lt.2', '2021-09-04 16:37:57', '2021-09-04 16:39:16', 'sudah'),
(57, '6704', 'Frizthover Tediaz', '12 TKJ 3', 'HD-1', 'Hard Disk', '0', 'Lab Lt.2', '2021-09-04 16:40:45', '2021-09-04 16:41:36', 'sudah'),
(58, '6704', 'Frizthover Tediaz', '12 TKJ 3', 'FD-1', 'Floppy Disk', '0', 'Lab Lt.1', '2021-09-04 16:40:45', '2021-09-04 16:45:13', 'sudah'),
(59, '6704', 'Frizthover Tediaz', '12 TKJ 3', 'HD-1', 'Hard Disk', '0', 'Lab Lt.2', '2021-09-04 16:42:35', '2021-09-04 16:45:13', 'sudah'),
(60, '6704', 'Frizthover Tediaz', '12 TKJ 3', 'FD-1', 'Floppy Disk', '0', 'Lab Lt.1', '2021-09-05 11:38:52', '2021-09-05 11:40:30', 'sudah'),
(61, '6704', 'Frizthover Tediaz', '12 TKJ 3', 'HD-1', 'Hard Disk', '0', 'Lab Lt.2', '2021-09-05 11:38:52', '2021-09-05 11:40:30', 'sudah'),
(62, '6704', 'Frizthover Tediaz', '12 TKJ 3', 'HD-1', 'Hard Disk', '0', 'Lab Lt.2', '2021-09-05 11:39:26', '2021-09-05 11:40:30', 'sudah'),
(63, '6704', 'Frizthover Tediaz', '12 TKJ 3', 'FD-1', 'Floppy Disk', '0', 'Lab Lt.1', '2021-09-05 11:39:26', '2021-09-05 11:40:30', 'sudah'),
(64, '6704', 'Frizthover Tediaz', 'murid', 'FD-1', 'Floppy Disk', '0', 'Lab Lt.1', '2021-09-05 12:28:21', '2021-09-05 12:32:21', 'sudah'),
(65, '6704', 'Frizthover Tediaz', 'murid', 'HD-1', 'Hard Disk', '0', 'Lab Lt.2', '2021-09-05 12:28:21', '2021-09-05 12:32:21', 'sudah'),
(66, '6705', 'Gabriel', 'murid', 'HD-1', 'Hard Disk', '0', 'Lab Lt.2', '2021-09-05 13:13:18', '2021-09-05 13:30:49', 'sudah'),
(67, '6705', 'Gabriel', 'murid', 'HD-1', 'Hard Disk', '0', 'Lab Lt.2', '2021-09-05 13:26:46', '2021-09-05 13:30:49', 'sudah'),
(68, '6704', 'Frizthover Tediaz', 'murid', 'HD-1', 'Hard Disk', '0', 'Lab Lt.2', '2021-09-05 13:27:23', '2021-09-05 13:31:07', 'sudah'),
(69, '6704', 'Frizthover Tediaz', 'murid', 'FD-1', 'Floppy Disk', '0', 'Lab Lt.1', '2021-09-05 13:27:23', '2021-09-05 13:31:07', 'sudah'),
(70, '6705', 'Gabriel', 'murid', 'FD-1', 'Floppy Disk', '0', 'Lab Lt.1', '2021-09-05 13:27:55', '2021-09-05 13:30:49', 'sudah'),
(71, '6705', 'Gabriel', 'murid', 'HD-1', 'Hard Disk', '0', 'Lab Lt.2', '2021-09-05 13:30:16', '2021-09-05 13:30:49', 'sudah'),
(72, '6705', 'Gabriel', 'murid', 'HD-1', 'Hard Disk', '0', 'Lab Lt.2', '2021-09-05 13:49:40', '2021-09-05 14:00:09', 'sudah'),
(73, '6704', 'Frizthover Tediaz', 'murid', 'HD-1', 'Hard Disk', '0', 'Lab Lt.2', '2021-09-05 13:49:25', '2021-09-05 13:59:28', 'sudah'),
(74, '6704', 'Frizthover Tediaz', 'murid', 'FD-1', 'Floppy Disk', '0', 'Lab Lt.1', '2021-09-05 13:49:25', '2021-09-05 13:59:28', 'sudah'),
(75, '6705', 'Gabriel', 'murid', 'FD-1', 'Floppy Disk', '0', 'Lab Lt.1', '2021-09-05 13:50:28', '2021-09-05 14:00:09', 'sudah'),
(76, '6704', 'Frizthover Tediaz', 'murid', 'FD-1', 'Floppy Disk', '0', 'Lab Lt.1', '2021-09-05 13:50:16', '2021-09-05 13:59:28', 'sudah'),
(77, '6704', 'Frizthover Tediaz', 'murid', 'HD-1', 'Hard Disk', '0', 'Lab Lt.2', '2021-09-05 13:50:16', '2021-09-05 13:59:28', 'sudah');

-- --------------------------------------------------------

--
-- Table structure for table `tbidentity`
--

CREATE TABLE `tbidentity` (
  `id` int(11) NOT NULL,
  `kode_user` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbidentity`
--

INSERT INTO `tbidentity` (`id`, `kode_user`, `nama`, `ket`) VALUES
(27, 6705, 'Gabriel', 'murid');

-- --------------------------------------------------------

--
-- Table structure for table `tbitem`
--

CREATE TABLE `tbitem` (
  `id` int(11) NOT NULL,
  `kode_user` varchar(50) NOT NULL,
  `kodebarang` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `tgl_pinjam` datetime DEFAULT NULL,
  `tgl_kembali` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `kode_user` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`kode_user`, `nama`, `ket`) VALUES
(6704, 'Frizthover Tediaz', 'murid'),
(6705, 'Gabriel', 'murid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`kode_user`);

--
-- Indexes for table `tbbarang`
--
ALTER TABLE `tbbarang`
  ADD PRIMARY KEY (`kodebarang`);

--
-- Indexes for table `tbdetil`
--
ALTER TABLE `tbdetil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbidentity`
--
ALTER TABLE `tbidentity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbitem`
--
ALTER TABLE `tbitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbdetil`
--
ALTER TABLE `tbdetil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbidentity`
--
ALTER TABLE `tbidentity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbitem`
--
ALTER TABLE `tbitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

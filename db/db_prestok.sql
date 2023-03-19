-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2023 at 09:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_prestok`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `bulan_tahun` varchar(255) NOT NULL,
  `jumlah_barang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `kode_barang`, `nama_barang`, `bulan_tahun`, `jumlah_barang`) VALUES
(8, 'BRG001', 'Kartu', ' Januari 2023', 100),
(9, 'BRG002', 'Voucher', ' Januari 2023', 100),
(10, 'BRG003', 'Kartu', ' Februari 2023', 90),
(11, 'BRG004', 'Voucher', ' Februari 2023', 85),
(12, 'BRG005', 'Kartu', ' Maret 2023', 75),
(13, 'BRG006', 'Voucher', ' Maret 2023', 65),
(14, 'BRG007', 'Kartu', ' April 2023', 150),
(15, 'BRG008', 'Voucher', ' April 2023', 120),
(16, 'BRG009', 'Kartu', ' Mei 2023', 190),
(17, 'BRG010', 'Kartu', ' Juli 2023', 123),
(18, 'BRG011', 'Kartu', ' Juni 2023', 141),
(19, 'BRG012', 'Kartu', ' Agustus 2023', 213),
(20, 'BRG013', 'Kartu', ' September 2023', 342),
(21, 'BRG014', 'Kartu', ' Oktober 2023', 341),
(22, 'BRG015', 'Voucher', ' Mei 2023', 23),
(23, 'BRG016', 'Voucher', ' Juni 2023', 210),
(24, 'BRG017', 'Voucher', ' Juli 2023', 312),
(25, 'BRG018', 'Voucher', ' Agustus 2023', 415),
(26, 'BRG019', 'Voucher', ' September 2023', 45),
(27, 'BRG020', 'Voucher', ' Oktober 2023', 123);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `bulan_penjualan` varchar(255) NOT NULL,
  `tahun_penjualan` varchar(255) NOT NULL,
  `jumlah_barang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id`, `kode_barang`, `nama_barang`, `bulan_penjualan`, `tahun_penjualan`, `jumlah_barang`) VALUES
(1, 'BRG001', 'Kartu', '01', '2022', 100),
(2, 'BRG002', 'Voucher', '01', '2022', 100),
(3, 'BRG003', 'Kartu', '02', '2022', 90),
(4, 'BRG004', 'Voucher', '02', '2022', 85),
(5, 'BRG005', 'Kartu', '03', '2022', 75),
(6, 'BRG006', 'Voucher', '03', '2022', 65),
(7, 'BRG007', 'Kartu', '04', '2022', 150),
(8, 'BRG008', 'Voucher', '03', '2022', 120),
(9, 'BRG009', 'Kartu', '05', '2022', 190),
(10, 'BRG010', 'Kartu', '07', '2022', 123),
(11, 'BRG011', 'Kartu', '06', '2022', 141),
(12, 'BRG012', 'Kartu', '08', '2022', 213),
(13, 'BRG013', 'Kartu', '09', '2022', 342),
(14, 'BRG014', 'Kartu', '10', '2022', 341),
(15, 'BRG015', 'Voucher', '05', '2022', 23),
(16, 'BRG016', 'Voucher', '06', '2022', 210),
(17, 'BRG017', 'Voucher', '07', '2022', 312),
(18, 'BRG018', 'Voucher', '08', '2022', 415),
(19, 'BRG019', 'Voucher', '09', '2022', 45),
(20, 'BRG020', 'Voucher', '10', '2022', 123);

-- --------------------------------------------------------

--
-- Table structure for table `tb_peramalan`
--

CREATE TABLE `tb_peramalan` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `bulan_peramalan` varchar(10) NOT NULL,
  `tahun_peramalan` varchar(4) NOT NULL,
  `total_pengeluaran` varchar(256) NOT NULL,
  `total_wma` varchar(255) NOT NULL,
  `total_error` varchar(255) NOT NULL,
  `total_mad` varchar(255) NOT NULL,
  `total_mse` varchar(255) NOT NULL,
  `tgl_create` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_peramalan`
--

INSERT INTO `tb_peramalan` (`id`, `id_barang`, `bulan_peramalan`, `tahun_peramalan`, `total_pengeluaran`, `total_wma`, `total_error`, `total_mad`, `total_mse`, `tgl_create`) VALUES
(1, 2, '03', '2022', '260', '87', '173', '173', '30033', '2023-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img_dir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama_lengkap`, `username`, `password`, `img_dir`) VALUES
(3, 'Audy Ruslan', 'audy', '$2y$10$SgOZa2Nl2sK5osVTPHtD4.lvJen0zxnvCpHXEjjkCxA1/d79MRDyi', 'image/1679121730.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_peramalan`
--
ALTER TABLE `tb_peramalan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_peramalan`
--
ALTER TABLE `tb_peramalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

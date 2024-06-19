-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2024 at 08:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `nama_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `kode_barang`, `nama_barang`) VALUES
(1, 'BRG001', 'Super Lamp'),
(2, 'BRG002', 'Claw');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `penjualan_id` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `bulan_penjualan` varchar(255) NOT NULL,
  `tahun_penjualan` varchar(255) NOT NULL,
  `jumlah_penjualan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`penjualan_id`, `kode_barang`, `bulan_penjualan`, `tahun_penjualan`, `jumlah_penjualan`) VALUES
(1, 'BRG001', 'Januari', '2024', 2),
(2, 'BRG001', 'Februari', '2024', 52),
(3, 'BRG001', 'Maret', '2024', 47),
(4, 'BRG001', 'April', '2024', 44),
(5, 'BRG001', 'Mei', '2024', 38),
(6, 'BRG001', 'Juni', '2024', 36),
(7, 'BRG001', 'Juli', '2024', 36),
(8, 'BRG001', 'Agustus', '2024', 51),
(9, 'BRG002', 'Juli', '2024', 23);

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
(3, 'Audy Ruslan', 'audy', '$2y$10$SgOZa2Nl2sK5osVTPHtD4.lvJen0zxnvCpHXEjjkCxA1/d79MRDyi', 'image/1679121730.png'),
(4, 'Kadek Budi', 'budi', '$2y$10$MEBid6w5/nyrS2Zc6iwp/uxjBLp/ivwu6AG7lOCUF3G1oQ3DzM7iK', 'image/1712239022.png');

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
  ADD PRIMARY KEY (`penjualan_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `penjualan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_peramalan`
--
ALTER TABLE `tb_peramalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

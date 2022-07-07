-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 07:00 PM
-- Server version: 10.4.13-MariaDB-log
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_brg` char(6) NOT NULL,
  `nm_brg` varchar(30) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga` double NOT NULL,
  `harga_beli` double NOT NULL,
  `stok` int(4) NOT NULL,
  `stok_min` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_brg`, `nm_brg`, `satuan`, `harga`, `harga_beli`, `stok`, `stok_min`) VALUES
('001', 'buah Cherry', '12', 70000, 80000, 4, 2),
('002', 'Bunga Anggrek Biru', '2', 140000, 200000, 8, 2),
('003', 'Bunga Anggrek Hijau', '1', 12000, 8000, 100, 5),
('004', 'Bunga Anggrek Putih', '2', 15000, 10000, 50, 4),
('005', 'Anggrek Pink', '5', 15000, 12000, 120, 5),
('3321', 'apple', '10', 25000, 20000, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `detailjual`
--

CREATE TABLE `detailjual` (
  `id` int(10) NOT NULL,
  `no_nota` int(6) NOT NULL,
  `kd_brg` varchar(10) NOT NULL,
  `hrg_brg` decimal(12,2) NOT NULL,
  `hrg_beli` decimal(12,2) NOT NULL,
  `jml_brg` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailjual`
--

INSERT INTO `detailjual` (`id`, `no_nota`, `kd_brg`, `hrg_brg`, `hrg_beli`, `jml_brg`) VALUES
(1, 1, '', '0.00', '0.00', 0),
(2, 8, '', '0.00', '0.00', 0),
(3, 8, '', '0.00', '0.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mjual`
--

CREATE TABLE `mjual` (
  `no_nota` int(11) NOT NULL,
  `kd_kons` char(6) NOT NULL,
  `tgl_jual` date NOT NULL,
  `total_biaya` decimal(12,2) NOT NULL,
  `pembayaran` decimal(12,2) NOT NULL,
  `kembalian` decimal(12,2) NOT NULL,
  `status` int(1) NOT NULL,
  `bukti_tf` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mjual`
--

INSERT INTO `mjual` (`no_nota`, `kd_kons`, `tgl_jual`, `total_biaya`, `pembayaran`, `kembalian`, `status`, `bukti_tf`) VALUES
(1, '', '2021-04-25', '430000.00', '500000.00', '70000.00', 0, ''),
(2, '', '2021-04-25', '430000.00', '5000000.00', '4570000.00', 0, ''),
(3, '', '2021-04-26', '269000.00', '350000.00', '81000.00', 0, ''),
(4, '', '2021-04-26', '430000.00', '500000.00', '70000.00', 0, ''),
(5, '', '2021-04-26', '419000.00', '500000.00', '81000.00', 0, ''),
(6, '', '2021-04-26', '430000.00', '600000.00', '170000.00', 0, ''),
(7, '', '2021-04-26', '419000.00', '700000.00', '281000.00', 0, ''),
(8, '', '2021-04-26', '419000.00', '700000.00', '281000.00', 0, ''),
(9, '', '2021-04-26', '419000.00', '1000000.00', '581000.00', 0, ''),
(10, '', '2021-04-26', '430000.00', '500000.00', '70000.00', 0, ''),
(11, '', '2021-04-26', '559000.00', '700000.00', '141000.00', 0, ''),
(12, '', '2021-04-26', '419000.00', '500000.00', '81000.00', 0, ''),
(13, '', '2022-04-19', '0.00', '0.00', '0.00', 0, ''),
(14, '', '2022-04-19', '20000.00', '100000.00', '80000.00', 0, ''),
(15, '', '2022-06-24', '15000.00', '20000.00', '5000.00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kd_brg` varchar(5) NOT NULL,
  `nm_brg` varchar(30) NOT NULL,
  `satuan` int(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `stok` int(10) NOT NULL,
  `stok_min` int(10) NOT NULL,
  `gambar` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kd_brg`, `nm_brg`, `satuan`, `harga`, `harga_beli`, `stok`, `stok_min`, `gambar`) VALUES
('001', 'buah apple', 12, 25000, 15000, 100, 5, 'apple.png'),
('002', 'Buah Pisan', 12, 25000, 10000, 120, 5, 'banana.png'),
('003', 'Buah Kelapa', 10, 15000, 10000, 129, 5, 'coconut.png'),
('3301', 'Buah Cherry', 10, 20000, 10000, 10, 5, 'cherry.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hak_akses` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `name`, `password`, `hak_akses`) VALUES
(3, 'farudin', 'udin', 'f88ce2e21ee2e24069f88f73aebc3599', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'ade', 'ade'),
(2, 'farhan', '123'),
(3, 'farudin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_brg`);

--
-- Indexes for table `detailjual`
--
ALTER TABLE `detailjual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mjual`
--
ALTER TABLE `mjual`
  ADD PRIMARY KEY (`no_nota`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kd_brg`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailjual`
--
ALTER TABLE `detailjual`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mjual`
--
ALTER TABLE `mjual`
  MODIFY `no_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

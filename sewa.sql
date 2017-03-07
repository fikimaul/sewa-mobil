-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2017 at 12:58 
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewa`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `status_bayar` enum('Lunas','DP') NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `kurang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id_bayar`, `id_sewa`, `tgl_bayar`, `status_bayar`, `total_bayar`, `kurang`) VALUES
(8, 12, '2016-12-13', 'Lunas', 590000, 0),
(9, 13, '2016-12-14', 'Lunas', 350000, 0),
(10, 14, '2017-01-17', 'Lunas', 410000, 0),
(11, 15, '2017-01-18', 'Lunas', 650000, 0),
(12, 16, '2017-01-18', 'Lunas', 950000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jaminan`
--

CREATE TABLE `jaminan` (
  `id_jaminan` int(11) NOT NULL,
  `jenis_jaminan` enum('STNK Motor','KTP') NOT NULL,
  `no_jaminan` varchar(20) NOT NULL,
  `atas_nama` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jaminan`
--

INSERT INTO `jaminan` (`id_jaminan`, `jenis_jaminan`, `no_jaminan`, `atas_nama`) VALUES
(14, 'STNK Motor', 'kSJNDaj', 'amsda'),
(15, 'STNK Motor', '12345667', 'yoga'),
(16, 'KTP', 'lkajdkansd', 'AAa'),
(17, 'STNK Motor', 'AKN1231', 'Edi S'),
(18, 'KTP', '108965435789865', 'DIAN');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `no_polisi` char(10) NOT NULL,
  `merek` varchar(20) NOT NULL,
  `jenis` enum('Matic','Manual') NOT NULL,
  `warna` varchar(15) NOT NULL,
  `status_mobil` enum('Disewa','Tidak Disewa') NOT NULL DEFAULT 'Tidak Disewa',
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `no_polisi`, `merek`, `jenis`, `warna`, `status_mobil`, `harga`) VALUES
(1, 'AB 7777 OM', 'Avansa', 'Manual', 'Hitam', 'Tidak Disewa', 10000),
(2, 'B 1000 AM', 'Kijang', 'Manual', 'Biru', 'Tidak Disewa', 15000),
(5, 'AB 4444 NG', 'JAZZ', 'Matic', 'HITAM', 'Tidak Disewa', 25000),
(7, 'AB 1234 JJ', 'Avansa', 'Matic', 'Hitam', 'Tidak Disewa', 10000),
(8, 'AB 4321 RI', 'MOBILIO', 'Manual', 'PUTIH', 'Tidak Disewa', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_sewa`, `tgl_kembali`, `denda`) VALUES
(9, 12, '2016-12-13', 200000),
(10, 13, '2016-12-14', 0),
(11, 14, '2017-01-17', 0),
(12, 15, '2017-01-18', 0),
(13, 16, '2017-01-18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `id_penyewa` int(11) NOT NULL,
  `nama_penyewa` varchar(45) DEFAULT NULL,
  `alamat_penyewa` varchar(45) DEFAULT NULL,
  `notlp_penyewa` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`id_penyewa`, `nama_penyewa`, `alamat_penyewa`, `notlp_penyewa`) VALUES
(1, 'Fiki Maulana', 'Gunungkidul', '085743036496'),
(2, 'Dahlia', 'Manado', '023423423'),
(3, 'edha', 'yogya', '085788123411'),
(4, 'yoga', 'jogja', '1234567'),
(5, 'Edi', 'Kulonprogo', '0203010'),
(6, 'DIAN', 'YOGYAKARTA', '085788432567');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `id_penyewa` int(11) NOT NULL,
  `id_sopir` int(11) DEFAULT NULL,
  `id_jaminan` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `harga_sewa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_mobil`, `id_penyewa`, `id_sopir`, `id_jaminan`, `tgl_sewa`, `lama_sewa`, `harga_sewa`) VALUES
(12, 2, 2, 1, 14, '2016-12-01', 36, 590000),
(13, 5, 4, 1, 15, '2016-12-14', 12, 350000),
(14, 1, 1, 2, 16, '2017-01-17', 36, 410000),
(15, 7, 5, 4, 17, '2017-01-18', 60, 650000),
(16, 8, 6, 4, 18, '2017-01-18', 36, 950000);

-- --------------------------------------------------------

--
-- Table structure for table `sopir`
--

CREATE TABLE `sopir` (
  `id_sopir` int(11) NOT NULL,
  `nama_sopir` varchar(45) DEFAULT NULL,
  `alamat_sopir` varchar(45) DEFAULT NULL,
  `no_tlp_sopir` char(13) NOT NULL,
  `status_sopir` enum('Disewa','Tidak Disewa') NOT NULL DEFAULT 'Tidak Disewa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sopir`
--

INSERT INTO `sopir` (`id_sopir`, `nama_sopir`, `alamat_sopir`, `no_tlp_sopir`, `status_sopir`) VALUES
(0, 'Tidak Pakai', '-', '-', 'Tidak Disewa'),
(1, 'Suweda Rahman ', 'Lampung', '0865555555', 'Tidak Disewa'),
(2, 'Moh Rizal', 'Palu', '0899999919', 'Tidak Disewa'),
(3, 'eko', 'jogja', '1234567890', 'Tidak Disewa'),
(4, 'Jono', 'Banguntapan', '0203010', 'Tidak Disewa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `id_bayar` (`id_bayar`);

--
-- Indexes for table `jaminan`
--
ALTER TABLE `jaminan`
  ADD PRIMARY KEY (`id_jaminan`),
  ADD KEY `id_jaminan` (`id_jaminan`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`),
  ADD KEY `id_mobil` (`id_mobil`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `id_pengembalian` (`id_pengembalian`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id_penyewa`),
  ADD KEY `id_penyewa` (`id_penyewa`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_sewa` (`id_sewa`);

--
-- Indexes for table `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`id_sopir`),
  ADD KEY `id_sopir` (`id_sopir`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `jaminan`
--
ALTER TABLE `jaminan`
  MODIFY `id_jaminan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id_penyewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `sopir`
--
ALTER TABLE `sopir`
  MODIFY `id_sopir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

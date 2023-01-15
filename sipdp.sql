-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 05:02 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipdp`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori_nota`
--

CREATE TABLE `kategori_nota` (
  `id_kategori` int(11) NOT NULL,
  `nm_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_nota`
--

INSERT INTO `kategori_nota` (`id_kategori`, `nm_kategori`) VALUES
(1, 'BAHAN'),
(2, 'BAYAR-TKG'),
(3, 'BBM');

-- --------------------------------------------------------

--
-- Table structure for table `kode`
--

CREATE TABLE `kode` (
  `id_kode` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nm_kode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kode`
--

INSERT INTO `kode` (`id_kode`, `id_kategori`, `nm_kode`) VALUES
(1, 1, 'CAT'),
(2, 2, 'BYR TKG CAT'),
(3, 3, 'PERTALITE'),
(4, 1, 'PLAMIR');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_kode` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `uraian` text NOT NULL,
  `unit` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `biaya_pengeluaran` int(11) NOT NULL,
  `pekerjaan` text NOT NULL,
  `keterangan` text NOT NULL,
  `gmbr_nota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_nota`, `id_kategori`, `id_kode`, `tgl`, `uraian`, `unit`, `satuan`, `harga_satuan`, `biaya_pengeluaran`, `pekerjaan`, `keterangan`, `gmbr_nota`) VALUES
(2, 1, 1, '2023-01-02', 'CAT MOWILEX E100 @5KG', 3, 'GLN', 350000, 1050000, 'PENGECATAN DINDING KAMAR SHELLA', 'GUNUNG MAS', '846482879_download.png'),
(3, 3, 3, '2023-01-03', 'PERTALITE SEPEDA MOTOR', 2, 'LTR', 20000, 40000, 'PAK SANTOSO', 'SPBU KARANGENTE', '2147393717_download.png'),
(4, 1, 1, '2023-02-04', 'asasa', 1, 'GLN', 350000, 350000, 'asasa', 'asaa', '1420876690_flyer 30des2022.png'),
(5, 1, 4, '2023-02-04', 'qwqqw', 1, 'lbr', 10000, 10000, 'asasa', 'asaa', '919996013_flyer 30des2022.png');

-- --------------------------------------------------------

--
-- Table structure for table `nota_proyek`
--

CREATE TABLE `nota_proyek` (
  `id_notaproyek` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_nota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nota_proyek`
--

INSERT INTO `nota_proyek` (`id_notaproyek`, `id_proyek`, `id_nota`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(11) NOT NULL,
  `nm_kegiatan` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `sumber_dana` varchar(255) DEFAULT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `nilai_kontrak` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `nm_kegiatan`, `lokasi`, `sumber_dana`, `waktu_pelaksanaan`, `nilai_kontrak`) VALUES
(1, 'Pembangnan Vila', 'Jl. Riau', 'Owner', '2023-01-01', 5000000),
(2, 'coba', 'bwi', 'dispar', '2023-02-04', 5000000),
(3, 'coba 2', 'bwi', 'pt ', '2023-03-04', 4000000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level_user` enum('Admin','Manajer','Bos') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level_user`) VALUES
(1, 'admin', 'admin', 'Admin'),
(2, 'manajer', 'manajer', 'Manajer'),
(3, 'bos1', 'bos', 'Bos');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_nota`
--
ALTER TABLE `kategori_nota`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kode`
--
ALTER TABLE `kode`
  ADD PRIMARY KEY (`id_kode`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `nota_proyek`
--
ALTER TABLE `nota_proyek`
  ADD PRIMARY KEY (`id_notaproyek`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_nota`
--
ALTER TABLE `kategori_nota`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kode`
--
ALTER TABLE `kode`
  MODIFY `id_kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nota_proyek`
--
ALTER TABLE `nota_proyek`
  MODIFY `id_notaproyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

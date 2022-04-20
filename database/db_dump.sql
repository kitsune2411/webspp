-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 06:30 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllDataSiswa` ()   BEGIN
SELECT * FROM siswa 
INNER JOIN kelas
ON siswa.id_kelas = kelas.id_kelas
INNER JOIN spp
ON siswa.id_spp = spp.id_spp;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_siswa`
-- (See below for the actual view)
--
CREATE TABLE `data_siswa` (
`nisn` varchar(10)
,`nis` varchar(8)
,`nama` varchar(35)
,`nama_kelas` varchar(10)
,`kopetensi_keahlian` varchar(50)
,`alamat` text
,`no_telp` varchar(13)
,`id_spp` int(11)
,`tahun` int(11)
,`nominal` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kopetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kopetensi_keahlian`) VALUES
(1, 'RPL 2', 'Rekayasa Perangkat Lunak'),
(4, 'RPL 3', 'Rekayasa Perangkat Lunak'),
(5, 'MM 1', 'Multimedia'),
(6, 'MM 2', 'Multimedia'),
(7, 'RPL 1', 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(1) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_dibayar` varchar(9) NOT NULL,
  `tahun_dibayar` varchar(4) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `id_spp`, `jumlah_bayar`) VALUES
(1, 1, '0123456789', '2020-03-09', 'Januari', '2020', 7, 200000),
(6, 1, '0123456789', '2022-04-08', 'Februari', '2022', 7, 200000),
(7, 1, '0123456789', '2022-04-08', 'Maret', '2022', 7, 200000),
(8, 1, '0123456789', '2022-04-08', 'April', '2022', 7, 200000),
(9, 1, '0123456789', '2022-04-08', 'Mei', '2022', 7, 200000),
(10, 1, '0123456789', '2022-04-08', 'Juni', '2022', 7, 200000),
(11, 1, '0123456789', '2022-04-08', 'Juli', '2022', 7, 200000),
(12, 1, '0123456789', '2022-04-08', 'Agustus', '2022', 7, 200000),
(13, 1, '754123215', '2022-04-08', 'Januari', '2022', 9, 250000),
(14, 1, '0123456789', '2022-04-09', 'September', '2022', 7, 200000),
(15, 1, '754123215', '2022-04-09', 'Februari', '2022', 9, 250000),
(16, 1, '754123215', '2022-04-09', 'Maret', '2022', 9, 250000),
(17, 1, '754123215', '2022-04-09', 'April', '2022', 9, 250000),
(18, 1, '754123215', '2022-04-09', 'Mei', '2022', 9, 250000),
(19, 1, '0123456789', '2022-04-09', 'Oktober', '2022', 7, 200000),
(20, 1, '0123456789', '2022-04-09', 'November', '2022', 7, 200000),
(21, 1, '0123456789', '2022-04-09', 'Desember', '2022', 7, 200000),
(22, 1, '754123215', '2022-04-09', 'Juni', '2022', 9, 250000),
(23, 1, '754123215', '2022-04-09', 'Juli', '2022', 9, 250000),
(24, 1, '754123215', '2022-04-09', 'Agustus', '2022', 9, 250000),
(25, 1, '754123215', '2022-04-09', 'September', '2022', 9, 250000),
(26, 1, '754123215', '2022-04-09', 'Oktober', '2022', 9, 250000),
(27, 1, '754123215', '2022-04-09', 'November', '2022', 9, 250000),
(28, 1, '754123215', '2022-04-09', 'Desember', '2022', 9, 250000),
(29, 1, '521111111', '2022-04-09', 'Januari', '2022', 7, 200000),
(30, 1, '521111111', '2022-04-09', 'Februari', '2022', 7, 200000),
(31, 1, '521111111', '2022-04-09', 'Maret', '2022', 7, 200000),
(32, 1, '521111111', '2022-04-09', 'April', '2022', 7, 200000),
(33, 2, '521111111', '2022-04-09', 'Mei', '2022', 7, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nama_petugas` varchar(32) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `nama_petugas`, `password`, `level`) VALUES
(1, 'agung', 'agung kristiawan', '25f9e794323b453885f5181f1b624d0b', 'admin'),
(2, 'claudya', 'claudya', '787f2bff3a2bfce9dc670242b1abdfa4', 'petugas'),
(4, 'v', 'clara venue', '698d51a19d8a121ce581499d7b701668', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(10) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`) VALUES
('0123456789', '12345678', 'sarah', 1, 'jl mawar', '0284512313', 7),
('521111111', '11111', 'jeff', 4, 'jl antasari', '08451232541', 7),
('754123215', '24152', 'Jennie wong', 7, 'JL uma sari ', '08451232541', 9);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
(7, 2019, 200000),
(9, 2020, 250000),
(10, 2021, 285000);

-- --------------------------------------------------------

--
-- Structure for view `data_siswa`
--
DROP TABLE IF EXISTS `data_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_siswa`  AS SELECT `siswa`.`nisn` AS `nisn`, `siswa`.`nis` AS `nis`, `siswa`.`nama` AS `nama`, `kelas`.`nama_kelas` AS `nama_kelas`, `kelas`.`kopetensi_keahlian` AS `kopetensi_keahlian`, `siswa`.`alamat` AS `alamat`, `siswa`.`no_telp` AS `no_telp`, `spp`.`id_spp` AS `id_spp`, `spp`.`tahun` AS `tahun`, `spp`.`nominal` AS `nominal` FROM ((`siswa` join `kelas` on(`siswa`.`id_kelas` = `kelas`.`id_kelas`)) join `spp` on(`siswa`.`id_spp` = `spp`.`id_spp`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_spp` (`id_spp`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_spp`) REFERENCES `siswa` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

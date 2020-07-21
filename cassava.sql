-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2018 at 05:49 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cassava`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_periksa`
--

CREATE TABLE IF NOT EXISTS `detail_periksa` (
`id_detail_periksa` int(5) NOT NULL,
  `id_periksa` int(5) NOT NULL,
  `id_subkriteria` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_periksa`
--

INSERT INTO `detail_periksa` (`id_detail_periksa`, `id_periksa`, `id_subkriteria`) VALUES
(1, 1, 1),
(2, 1, 7),
(3, 1, 12),
(4, 1, 20),
(5, 1, 25),
(6, 2, 2),
(7, 2, 7),
(8, 2, 13),
(9, 2, 22),
(10, 2, 25),
(11, 3, 3),
(12, 3, 8),
(13, 3, 13),
(14, 3, 20),
(15, 3, 26),
(16, 4, 2),
(17, 4, 7),
(18, 4, 13),
(19, 4, 20),
(20, 4, 26);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE IF NOT EXISTS `gender` (
`id_gender` int(1) NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id_gender`, `keterangan`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
`id_kriteria` int(2) NOT NULL,
  `kriteria` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`) VALUES
(1, 'Varietas'),
(2, 'Masa Panen'),
(3, 'Kondisi'),
(4, 'Kadar Air'),
(5, 'Pati Singkong');

-- --------------------------------------------------------

--
-- Table structure for table `levelakses`
--

CREATE TABLE IF NOT EXISTS `levelakses` (
`id_akses` int(1) NOT NULL,
  `keterangan_akses` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levelakses`
--

INSERT INTO `levelakses` (`id_akses`, `keterangan_akses`) VALUES
(1, 'Bos'),
(2, 'Petugas');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE IF NOT EXISTS `periksa` (
`id_periksa` int(5) NOT NULL,
  `id_singkong` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `id_petugas` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id_periksa`, `id_singkong`, `tanggal`, `id_petugas`) VALUES
(1, 1, '2018-03-24', 3),
(2, 4, '2018-03-24', 3),
(3, 2, '2018-04-04', 3),
(4, 3, '2018-04-16', 6);

-- --------------------------------------------------------

--
-- Table structure for table `petani`
--

CREATE TABLE IF NOT EXISTS `petani` (
`id_petani` int(3) NOT NULL,
  `nama_petani` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `jenis_kelamin` int(1) NOT NULL,
  `status_aktif` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petani`
--

INSERT INTO `petani` (`id_petani`, `nama_petani`, `alamat`, `tgl_lahir`, `telepon`, `jenis_kelamin`, `status_aktif`) VALUES
(1, 'Suprayitno Santoso', 'Jl. Jawa II no 82', '1976-01-30', '08585778565', 1, 1),
(2, 'Yadi Mulyo', 'Jl. Kalimantan X no 66', '1978-06-08', '081234556887', 1, 1),
(3, 'Handoko Santosa', 'Jl. Soedirman XX no 42', '2018-01-09', '083847155265', 1, 1),
(4, 'Lastri', 'Jl. Pahlawan no 74', '1985-06-27', '083847456221', 2, 1),
(5, 'Arip Santoso', 'Jl. Merpati no 142', '1974-04-26', '082234691287', 1, 1),
(6, 'Nining', 'jl. Fathol Halim', '1994-05-18', '082231275983', 2, 1),
(7, 'Afif Dwi Jayanto', 'Jl. Nusa Indah 30', '1994-12-23', '082257843870', 1, 1),
(8, 'Robet Maulana', 'Jl. Gunung Batu 65', '1982-03-05', '082257843870', 1, 1),
(9, 'Erisal Dwi Jayanto', 'Jl. Tawang Mangu', '1994-12-23', '082231275983', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promethee`
--

CREATE TABLE IF NOT EXISTS `promethee` (
`id_promethee` int(7) NOT NULL,
  `id_singkong` int(5) NOT NULL,
  `leaving_flow` double NOT NULL,
  `entering_flow` double NOT NULL,
  `net_flow` double NOT NULL,
  `tanggal_penghitungan` date NOT NULL,
  `petugas` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promethee`
--

INSERT INTO `promethee` (`id_promethee`, `id_singkong`, `leaving_flow`, `entering_flow`, `net_flow`, `tanggal_penghitungan`, `petugas`) VALUES
(1, 1, 0.7, 0, 0.7, '2018-04-04', 3),
(2, 2, 0.1, 0.7, -0.6, '2018-04-04', 3),
(3, 4, 0.3, 0.4, -0.1, '2018-04-04', 3);

-- --------------------------------------------------------

--
-- Table structure for table `singkong`
--

CREATE TABLE IF NOT EXISTS `singkong` (
`id_singkong` int(5) NOT NULL,
  `id_petani` int(3) NOT NULL,
  `id_petugas` int(5) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `berat` int(5) NOT NULL,
  `status_singkong` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `singkong`
--

INSERT INTO `singkong` (`id_singkong`, `id_petani`, `id_petugas`, `tanggal_masuk`, `berat`, `status_singkong`) VALUES
(1, 3, 3, '2018-02-23', 45, 3),
(2, 3, 3, '2018-02-23', 30, 3),
(3, 4, 6, '2018-02-24', 50, 2),
(4, 7, 3, '2018-02-26', 50, 3),
(5, 9, 3, '2018-06-04', 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `statusaktif`
--

CREATE TABLE IF NOT EXISTS `statusaktif` (
`id_aktif` int(1) NOT NULL,
  `keterangan_aktif` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statusaktif`
--

INSERT INTO `statusaktif` (`id_aktif`, `keterangan_aktif`) VALUES
(1, 'aktif'),
(2, 'non-aktif');

-- --------------------------------------------------------

--
-- Table structure for table `status_singkong`
--

CREATE TABLE IF NOT EXISTS `status_singkong` (
`id_status` int(1) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_singkong`
--

INSERT INTO `status_singkong` (`id_status`, `keterangan`) VALUES
(1, 'Data Singkong Masuk'),
(2, 'Data Singkong Telah Dinilai'),
(3, 'Promethee Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE IF NOT EXISTS `sub_kriteria` (
`id_sub_kriteria` int(2) NOT NULL,
  `id_kriteria` int(2) NOT NULL,
  `sub_kriteria` varchar(70) NOT NULL,
  `bobot` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `sub_kriteria`, `bobot`) VALUES
(1, 1, 'Cimangu', 6),
(2, 1, 'Ketan', 5),
(3, 1, 'Kaspro', 4),
(4, 1, 'Malang 6', 3),
(5, 1, 'UJ 5', 2),
(6, 1, 'Mentega', 1),
(7, 2, '12 Bulan', 3),
(8, 2, '11 Bulan', 2),
(9, 2, '13 Bulan', 2),
(10, 2, '10 Bulan', 1),
(11, 2, '14 Bulan', 1),
(12, 3, 'Utuh Putih Bersih', 5),
(13, 3, 'Tidak Utuh Putih Bersih', 4),
(14, 3, 'Utuh Putih Bercak', 4),
(15, 3, 'Tidak Utuh Putih Bercak', 3),
(16, 3, 'Utuh Kuning Bersih', 3),
(17, 3, 'Tidak Utuh Kuning Bersih', 2),
(18, 3, 'Utuh Kuning Bercak', 2),
(19, 3, 'Tidak Utuh Kuning Bercak', 1),
(20, 4, '67% - 68%', 3),
(21, 4, '66% - 67%', 2),
(22, 4, '>68% - 69%', 2),
(23, 4, '65% - 66%', 1),
(24, 4, '>69% - 70%', 1),
(25, 5, '25%', 3),
(26, 5, '20%', 2),
(27, 5, '15%', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(5) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `jenis_kelamin` int(1) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `status_aktif` int(1) NOT NULL,
  `level_akses` int(1) NOT NULL,
  `mulai_kerja` date DEFAULT NULL,
  `akhir_kerja` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `jenis_kelamin`, `telephone`, `status_aktif`, `level_akses`, `mulai_kerja`, `akhir_kerja`) VALUES
(1, 'Uc44', 'qweasd', 'Hasan Udin', 'Jalan Manggis 18', 1, '089682269774', 1, 1, '2017-02-14', NULL),
(2, 'A5', 'dj', 'Nining', 'Jalan Fathol Alim', 2, '082231275983', 1, 2, '2018-03-09', NULL),
(3, 'noVaa1', 'qwasde', 'Nova Ayu Pratiwi', 'Jl. Gunung Batu 65', 2, '082235668524', 1, 2, '2018-02-12', NULL),
(4, 'Sy41ful', '123', 'Rahmat Syaifullah', 'Jl. Gunung Batu 65', 1, '082235668524', 2, 2, '2018-03-09', '2018-03-09'),
(5, 'Anxang', '123', 'M Anang ', 'Jl. Semeru xx 25', 1, '083847556897', 1, 2, '2018-02-12', NULL),
(6, 'DeLL1', '123', 'Delisa Putri', 'Jl. Gatoto Subroto 5', 2, '089682658721', 1, 2, '2018-02-12', NULL),
(7, 'le00n', '123', 'Leo Hardi', 'Jl. Gunung Batu 65', 1, '082235642112', 1, 2, '2018-03-05', NULL),
(8, 'r00g3r', '123', 'Albert Roger', 'Jl. Karang 65', 1, '081234587662', 1, 2, '2018-03-05', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
 ADD PRIMARY KEY (`id_detail_periksa`), ADD KEY `id_periksa` (`id_periksa`,`id_subkriteria`), ADD KEY `id_subkriteria` (`id_subkriteria`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
 ADD PRIMARY KEY (`id_gender`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
 ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `levelakses`
--
ALTER TABLE `levelakses`
 ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
 ADD PRIMARY KEY (`id_periksa`), ADD KEY `id_singkong` (`id_singkong`,`id_petugas`), ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `petani`
--
ALTER TABLE `petani`
 ADD PRIMARY KEY (`id_petani`), ADD KEY `status_aktif` (`status_aktif`), ADD KEY `jenis_kelamin` (`jenis_kelamin`);

--
-- Indexes for table `promethee`
--
ALTER TABLE `promethee`
 ADD PRIMARY KEY (`id_promethee`), ADD KEY `id_singkong` (`id_singkong`), ADD KEY `petugas` (`petugas`);

--
-- Indexes for table `singkong`
--
ALTER TABLE `singkong`
 ADD PRIMARY KEY (`id_singkong`), ADD KEY `id_petani` (`id_petani`,`id_petugas`,`status_singkong`), ADD KEY `id_petugas` (`id_petugas`), ADD KEY `status_singkong` (`status_singkong`);

--
-- Indexes for table `statusaktif`
--
ALTER TABLE `statusaktif`
 ADD PRIMARY KEY (`id_aktif`);

--
-- Indexes for table `status_singkong`
--
ALTER TABLE `status_singkong`
 ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
 ADD PRIMARY KEY (`id_sub_kriteria`), ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`), ADD KEY `jenis_kelamin` (`jenis_kelamin`), ADD KEY `status_aktif` (`status_aktif`), ADD KEY `level_akses` (`level_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
MODIFY `id_detail_periksa` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
MODIFY `id_gender` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
MODIFY `id_kriteria` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `levelakses`
--
ALTER TABLE `levelakses`
MODIFY `id_akses` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
MODIFY `id_periksa` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `petani`
--
ALTER TABLE `petani`
MODIFY `id_petani` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `promethee`
--
ALTER TABLE `promethee`
MODIFY `id_promethee` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `singkong`
--
ALTER TABLE `singkong`
MODIFY `id_singkong` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `statusaktif`
--
ALTER TABLE `statusaktif`
MODIFY `id_aktif` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status_singkong`
--
ALTER TABLE `status_singkong`
MODIFY `id_status` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
MODIFY `id_sub_kriteria` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
ADD CONSTRAINT `detail_periksa_ibfk_1` FOREIGN KEY (`id_subkriteria`) REFERENCES `sub_kriteria` (`id_sub_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `detail_periksa_ibfk_2` FOREIGN KEY (`id_periksa`) REFERENCES `periksa` (`id_periksa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `periksa`
--
ALTER TABLE `periksa`
ADD CONSTRAINT `periksa_ibfk_1` FOREIGN KEY (`id_singkong`) REFERENCES `singkong` (`id_singkong`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `periksa_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `petani`
--
ALTER TABLE `petani`
ADD CONSTRAINT `petani_ibfk_1` FOREIGN KEY (`status_aktif`) REFERENCES `statusaktif` (`id_aktif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promethee`
--
ALTER TABLE `promethee`
ADD CONSTRAINT `promethee_ibfk_1` FOREIGN KEY (`id_singkong`) REFERENCES `singkong` (`id_singkong`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `promethee_ibfk_2` FOREIGN KEY (`petugas`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `singkong`
--
ALTER TABLE `singkong`
ADD CONSTRAINT `singkong_ibfk_1` FOREIGN KEY (`id_petani`) REFERENCES `petani` (`id_petani`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `singkong_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `singkong_ibfk_3` FOREIGN KEY (`status_singkong`) REFERENCES `status_singkong` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level_akses`) REFERENCES `levelakses` (`id_akses`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`status_aktif`) REFERENCES `statusaktif` (`id_aktif`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`jenis_kelamin`) REFERENCES `gender` (`id_gender`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

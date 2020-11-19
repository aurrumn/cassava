-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Agu 2020 pada 00.08
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jamurt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_periksa`
--

CREATE TABLE `detail_periksa` (
  `id_detail_periksa` int(5) NOT NULL,
  `id_periksa` int(5) NOT NULL,
  `id_subkriteria` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gender`
--

CREATE TABLE `gender` (
  `id_gender` int(1) NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gender`
--

INSERT INTO `gender` (`id_gender`, `keterangan`) VALUES
(1, 'Laki'),
(2, 'Puan'),
(3, 'Laki'),
(4, 'Puan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jamur`
--

CREATE TABLE `jamur` (
  `id_jamur` int(5) NOT NULL,
  `id_rak` int(3) NOT NULL,
  `id_petugas` int(5) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `berat` int(5) NOT NULL,
  `status_jamur` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(2) NOT NULL,
  `kriteria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `levelakses`
--

CREATE TABLE `levelakses` (
  `id_akses` int(1) NOT NULL,
  `keterangan_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `periksa`
--

CREATE TABLE `periksa` (
  `id_periksa` int(5) NOT NULL,
  `id_jamur` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `id_petugas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `promethee`
--

CREATE TABLE `promethee` (
  `id_promethee` int(7) NOT NULL,
  `id_jamur` int(5) NOT NULL,
  `leaving_flow` double NOT NULL,
  `entering_flow` double NOT NULL,
  `net_flow` double NOT NULL,
  `tanggal_perhitungan` date NOT NULL,
  `petugas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rakjamur`
--

CREATE TABLE `rakjamur` (
  `id_rak` int(3) NOT NULL,
  `nama_rak` varchar(30) NOT NULL,
  `lokasi` varchar(70) NOT NULL,
  `tgl_rak` date NOT NULL,
  `jenis_kelamin` int(1) NOT NULL,
  `status_aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `statusaktif`
--

CREATE TABLE `statusaktif` (
  `id_aktif` int(1) NOT NULL,
  `keterangan_aktif` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_jamurt`
--

CREATE TABLE `status_jamurt` (
  `id_status` int(1) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(2) NOT NULL,
  `id_kriteria` int(2) NOT NULL,
  `sub_kriteria` varchar(70) NOT NULL,
  `bobot` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD PRIMARY KEY (`id_detail_periksa`),
  ADD UNIQUE KEY `id_periksa` (`id_periksa`,`id_subkriteria`),
  ADD KEY `id_subkriteria` (`id_subkriteria`);

--
-- Indeks untuk tabel `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id_gender`);

--
-- Indeks untuk tabel `jamur`
--
ALTER TABLE `jamur`
  ADD PRIMARY KEY (`id_jamur`),
  ADD UNIQUE KEY `id_rak` (`id_rak`,`id_petugas`),
  ADD UNIQUE KEY `status_jamur` (`status_jamur`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `levelakses`
--
ALTER TABLE `levelakses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id_periksa`),
  ADD UNIQUE KEY `id_jamur` (`id_jamur`,`id_petugas`);

--
-- Indeks untuk tabel `promethee`
--
ALTER TABLE `promethee`
  ADD PRIMARY KEY (`id_promethee`),
  ADD UNIQUE KEY `id_jamur` (`id_jamur`,`petugas`),
  ADD KEY `petugas` (`petugas`);

--
-- Indeks untuk tabel `rakjamur`
--
ALTER TABLE `rakjamur`
  ADD PRIMARY KEY (`id_rak`),
  ADD UNIQUE KEY `jenis_kelamin` (`jenis_kelamin`,`status_aktif`);

--
-- Indeks untuk tabel `statusaktif`
--
ALTER TABLE `statusaktif`
  ADD PRIMARY KEY (`id_aktif`);

--
-- Indeks untuk tabel `status_jamurt`
--
ALTER TABLE `status_jamurt`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`),
  ADD UNIQUE KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `jenis_kelamin` (`jenis_kelamin`),
  ADD UNIQUE KEY `status_aktif` (`status_aktif`,`level_akses`),
  ADD KEY `level_akses` (`level_akses`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_periksa`
--
ALTER TABLE `detail_periksa`
  MODIFY `id_detail_periksa` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gender`
--
ALTER TABLE `gender`
  MODIFY `id_gender` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jamur`
--
ALTER TABLE `jamur`
  MODIFY `id_jamur` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `levelakses`
--
ALTER TABLE `levelakses`
  MODIFY `id_akses` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id_periksa` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `promethee`
--
ALTER TABLE `promethee`
  MODIFY `id_promethee` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rakjamur`
--
ALTER TABLE `rakjamur`
  MODIFY `id_rak` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `statusaktif`
--
ALTER TABLE `statusaktif`
  MODIFY `id_aktif` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `status_jamurt`
--
ALTER TABLE `status_jamurt`
  MODIFY `id_status` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD CONSTRAINT `detail_periksa_ibfk_1` FOREIGN KEY (`id_subkriteria`) REFERENCES `sub_kriteria` (`id_sub_kriteria`),
  ADD CONSTRAINT `detail_periksa_ibfk_2` FOREIGN KEY (`id_periksa`) REFERENCES `periksa` (`id_periksa`);

--
-- Ketidakleluasaan untuk tabel `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `periksa_ibfk_1` FOREIGN KEY (`id_jamur`) REFERENCES `jamur` (`id_jamur`);

--
-- Ketidakleluasaan untuk tabel `promethee`
--
ALTER TABLE `promethee`
  ADD CONSTRAINT `promethee_ibfk_1` FOREIGN KEY (`id_jamur`) REFERENCES `jamur` (`id_jamur`),
  ADD CONSTRAINT `promethee_ibfk_2` FOREIGN KEY (`petugas`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `rakjamur`
--
ALTER TABLE `rakjamur`
  ADD CONSTRAINT `rakjamur_ibfk_1` FOREIGN KEY (`id_rak`) REFERENCES `jamur` (`id_rak`);

--
-- Ketidakleluasaan untuk tabel `status_jamurt`
--
ALTER TABLE `status_jamurt`
  ADD CONSTRAINT `status_jamurt_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `jamur` (`status_jamur`);

--
-- Ketidakleluasaan untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level_akses`) REFERENCES `levelakses` (`id_akses`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`status_aktif`) REFERENCES `statusaktif` (`id_aktif`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`jenis_kelamin`) REFERENCES `gender` (`id_gender`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

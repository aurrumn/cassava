-- MariaDB dump 10.17  Distrib 10.4.6-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: jamurt
-- ------------------------------------------------------
-- Server version	10.4.6-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `detail_periksa`
--

DROP TABLE IF EXISTS `detail_periksa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_periksa` (
  `id_detail_periksa` int(5) NOT NULL AUTO_INCREMENT,
  `id_periksa` int(5) NOT NULL,
  `id_subkriteria` int(2) NOT NULL,
  PRIMARY KEY (`id_detail_periksa`),
  UNIQUE KEY `id_periksa` (`id_periksa`,`id_subkriteria`),
  KEY `id_subkriteria` (`id_subkriteria`),
  CONSTRAINT `detail_periksa_ibfk_1` FOREIGN KEY (`id_subkriteria`) REFERENCES `sub_kriteria` (`id_sub_kriteria`),
  CONSTRAINT `detail_periksa_ibfk_2` FOREIGN KEY (`id_periksa`) REFERENCES `periksa` (`id_periksa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_periksa`
--

LOCK TABLES `detail_periksa` WRITE;
/*!40000 ALTER TABLE `detail_periksa` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_periksa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gender` (
  `id_gender` int(1) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_gender`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'Pria'),(2,'Wanita');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jamur`
--

DROP TABLE IF EXISTS `jamur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jamur` (
  `id_jamur` int(5) NOT NULL AUTO_INCREMENT,
  `id_rak` int(3) NOT NULL,
  `id_petugas` int(5) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `berat` int(5) NOT NULL,
  `status_jamur` int(1) NOT NULL,
  PRIMARY KEY (`id_jamur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jamur`
--

LOCK TABLES `jamur` WRITE;
/*!40000 ALTER TABLE `jamur` DISABLE KEYS */;
/*!40000 ALTER TABLE `jamur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jamur_old`
--

DROP TABLE IF EXISTS `jamur_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jamur_old` (
  `id_jamur` int(5) NOT NULL AUTO_INCREMENT,
  `id_rak` int(3) NOT NULL,
  `id_petugas` int(5) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `berat` int(5) NOT NULL,
  `status_jamur` int(1) NOT NULL,
  PRIMARY KEY (`id_jamur`),
  UNIQUE KEY `id_rak` (`id_rak`,`id_petugas`),
  UNIQUE KEY `status_jamur` (`status_jamur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jamur_old`
--

LOCK TABLES `jamur_old` WRITE;
/*!40000 ALTER TABLE `jamur_old` DISABLE KEYS */;
/*!40000 ALTER TABLE `jamur_old` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kriteria`
--

DROP TABLE IF EXISTS `kriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kriteria` (
  `id_kriteria` int(2) NOT NULL AUTO_INCREMENT,
  `kriteria` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kriteria`
--

LOCK TABLES `kriteria` WRITE;
/*!40000 ALTER TABLE `kriteria` DISABLE KEYS */;
/*!40000 ALTER TABLE `kriteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `levelakses`
--

DROP TABLE IF EXISTS `levelakses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `levelakses` (
  `id_akses` int(1) NOT NULL AUTO_INCREMENT,
  `keterangan_akses` varchar(20) NOT NULL,
  PRIMARY KEY (`id_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `levelakses`
--

LOCK TABLES `levelakses` WRITE;
/*!40000 ALTER TABLE `levelakses` DISABLE KEYS */;
INSERT INTO `levelakses` VALUES (1,'Owner'),(2,'Karyawan');
/*!40000 ALTER TABLE `levelakses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periksa`
--

DROP TABLE IF EXISTS `periksa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periksa` (
  `id_periksa` int(5) NOT NULL AUTO_INCREMENT,
  `id_jamur` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `id_petugas` int(5) NOT NULL,
  PRIMARY KEY (`id_periksa`),
  UNIQUE KEY `id_jamur` (`id_jamur`,`id_petugas`),
  CONSTRAINT `periksa_ibfk_1` FOREIGN KEY (`id_jamur`) REFERENCES `jamur_old` (`id_jamur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periksa`
--

LOCK TABLES `periksa` WRITE;
/*!40000 ALTER TABLE `periksa` DISABLE KEYS */;
/*!40000 ALTER TABLE `periksa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promethee`
--

DROP TABLE IF EXISTS `promethee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promethee` (
  `id_promethee` int(7) NOT NULL AUTO_INCREMENT,
  `id_jamur` int(5) NOT NULL,
  `leaving_flow` double NOT NULL,
  `entering_flow` double NOT NULL,
  `net_flow` double NOT NULL,
  `tanggal_perhitungan` date NOT NULL,
  `petugas` int(5) NOT NULL,
  PRIMARY KEY (`id_promethee`),
  UNIQUE KEY `id_jamur` (`id_jamur`,`petugas`),
  KEY `petugas` (`petugas`),
  CONSTRAINT `promethee_ibfk_1` FOREIGN KEY (`id_jamur`) REFERENCES `jamur_old` (`id_jamur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promethee`
--

LOCK TABLES `promethee` WRITE;
/*!40000 ALTER TABLE `promethee` DISABLE KEYS */;
/*!40000 ALTER TABLE `promethee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rakjamur`
--

DROP TABLE IF EXISTS `rakjamur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rakjamur` (
  `id_rak` int(3) NOT NULL AUTO_INCREMENT,
  `nama_rak` varchar(50) NOT NULL,
  `lokasi` varchar(70) NOT NULL,
  `tgl_rak` date NOT NULL,
  `status_aktif` int(1) NOT NULL,
  PRIMARY KEY (`id_rak`),
  KEY `status_aktif` (`status_aktif`),
  CONSTRAINT `rakjamur_ibfk_1` FOREIGN KEY (`status_aktif`) REFERENCES `statusaktif` (`id_aktif`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rakjamur`
--

LOCK TABLES `rakjamur` WRITE;
/*!40000 ALTER TABLE `rakjamur` DISABLE KEYS */;
INSERT INTO `rakjamur` VALUES (1,'Rak Umum1 (U1)','Gedung A Lorong 1','2020-11-15',1),(2,'Rak Khusus(1)','Gedung B Lorong 1','2020-11-15',1),(3,'Rak Umum2','Gedung C Lorong 2','2020-11-15',1);
/*!40000 ALTER TABLE `rakjamur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_jamurt`
--

DROP TABLE IF EXISTS `status_jamurt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_jamurt` (
  `id_status` int(1) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_status`),
  CONSTRAINT `status_jamurt_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `jamur_old` (`status_jamur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_jamurt`
--

LOCK TABLES `status_jamurt` WRITE;
/*!40000 ALTER TABLE `status_jamurt` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_jamurt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statusaktif`
--

DROP TABLE IF EXISTS `statusaktif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statusaktif` (
  `id_aktif` int(1) NOT NULL AUTO_INCREMENT,
  `keterangan_aktif` varchar(10) NOT NULL,
  PRIMARY KEY (`id_aktif`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statusaktif`
--

LOCK TABLES `statusaktif` WRITE;
/*!40000 ALTER TABLE `statusaktif` DISABLE KEYS */;
INSERT INTO `statusaktif` VALUES (1,'Aktif'),(2,'Nonaktif');
/*!40000 ALTER TABLE `statusaktif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_kriteria`
--

DROP TABLE IF EXISTS `sub_kriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(2) NOT NULL AUTO_INCREMENT,
  `id_kriteria` int(2) NOT NULL,
  `sub_kriteria` varchar(70) NOT NULL,
  `bobot` int(3) NOT NULL,
  PRIMARY KEY (`id_sub_kriteria`),
  UNIQUE KEY `id_kriteria` (`id_kriteria`),
  CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_kriteria`
--

LOCK TABLES `sub_kriteria` WRITE;
/*!40000 ALTER TABLE `sub_kriteria` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_kriteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `jenis_kelamin` int(1) NOT NULL,
  `status_aktif` int(1) NOT NULL,
  `level_akses` int(1) NOT NULL,
  `mulai_kerja` date DEFAULT NULL,
  `akhir_kerja` date DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `jenis_kelamin` (`jenis_kelamin`),
  KEY `jenis_kelamin_2` (`jenis_kelamin`),
  KEY `status_aktif` (`status_aktif`),
  KEY `level_akses` (`level_akses`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`jenis_kelamin`) REFERENCES `gender` (`id_gender`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_ibfk_2` FOREIGN KEY (`status_aktif`) REFERENCES `statusaktif` (`id_aktif`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_ibfk_3` FOREIGN KEY (`level_akses`) REFERENCES `levelakses` (`id_akses`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Jo','jojo','Pak Jojo','Jln Kalimantan','089682269773',1,1,1,'2018-07-17','2021-08-27'),(2,'sasaaa','123','Sasa Anwar','Jln Jawa no 187','089765491332',2,1,2,'2020-11-15',NULL),(3,'aldeff','54321','Aldief teha','Jln sumatera 10','089765789332',1,1,2,'2020-11-15',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-15 23:25:13

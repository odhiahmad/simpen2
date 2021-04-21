# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.32)
# Database: simpen
# Generation Time: 2021-04-13 16:15:09 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table d_bagian
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_bagian`;

CREATE TABLE `d_bagian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `direksi` varchar(50) DEFAULT NULL,
  `bagian` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_bagian` WRITE;
/*!40000 ALTER TABLE `d_bagian` DISABLE KEYS */;

INSERT INTO `d_bagian` (`id`, `nama`, `direksi`, `bagian`)
VALUES
	(2,'Enjiniring','Agus Cahyono','Manager Bagian Enjinering'),
	(3,'Keu SDM & Adm','Khairul','Manajer Bagian Keu, SDM & Adm'),
	(4,'Operasi & Pemeliharaan','Anton Gordon Sitohang','Manajer Bagian Operasi dan Pemeliharaan');

/*!40000 ALTER TABLE `d_bagian` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_cara_pembayaran
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_cara_pembayaran`;

CREATE TABLE `d_cara_pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_cara_pembayaran` WRITE;
/*!40000 ALTER TABLE `d_cara_pembayaran` DISABLE KEYS */;

INSERT INTO `d_cara_pembayaran` (`id`, `nama`)
VALUES
	(1,'sistem bulanan'),
	(2,'sistem termin'),
	(3,'pembayaran secara sekaligus');

/*!40000 ALTER TABLE `d_cara_pembayaran` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_coo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_coo`;

CREATE TABLE `d_coo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_coo` WRITE;
/*!40000 ALTER TABLE `d_coo` DISABLE KEYS */;

INSERT INTO `d_coo` (`id`, `nama`)
VALUES
	(1,'Certificate Of Manufacture (COM) dari'),
	(2,'Certificate Of Original (COO) dari'),
	(3,'Surat Asal Usul Barang dari');

/*!40000 ALTER TABLE `d_coo` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_direksi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_direksi`;

CREATE TABLE `d_direksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bagian` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `bagian` varchar(50) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_direksi` WRITE;
/*!40000 ALTER TABLE `d_direksi` DISABLE KEYS */;

INSERT INTO `d_direksi` (`id`, `id_bagian`, `nama`, `bagian`, `created_at`, `updated_at`)
VALUES
	(1,4,'Anton Gordon Sitohang','Manajer Bagian Operasi dan Pemeliharaan','2020-10-22 21:03:39','2020-10-22 20:49:24'),
	(2,3,'Khairul','Manajer Bagian Keu, SDM & ADM','2020-10-22 21:04:43','2020-10-22 20:50:52'),
	(3,2,'Agus Cahyono','Manajer Bagian Enjiniring','2020-10-22 21:04:19','2020-10-22 20:52:25');

/*!40000 ALTER TABLE `d_direksi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_fungsi_pembangkit
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_fungsi_pembangkit`;

CREATE TABLE `d_fungsi_pembangkit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_fungsi_pembangkit` WRITE;
/*!40000 ALTER TABLE `d_fungsi_pembangkit` DISABLE KEYS */;

INSERT INTO `d_fungsi_pembangkit` (`id`, `nama`)
VALUES
	(1,'Pembangkit'),
	(2,'Sarana');

/*!40000 ALTER TABLE `d_fungsi_pembangkit` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_jabatan_pengawas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_jabatan_pengawas`;

CREATE TABLE `d_jabatan_pengawas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_jabatan_pengawas` WRITE;
/*!40000 ALTER TABLE `d_jabatan_pengawas` DISABLE KEYS */;

INSERT INTO `d_jabatan_pengawas` (`id`, `nama`)
VALUES
	(1,'Manager ULPLTG/MG Duri'),
	(2,'Manager ULPLTG Teluk Lembu'),
	(3,'Manager ULPLTA Koto Panjang'),
	(4,'Supv. Rendal Pemeliharaan'),
	(5,'Supv. Rendal Operasi'),
	(6,'Supv. Energi Primer'),
	(7,'Supv. Rendal Op dan Har dan TE '),
	(8,'Pejabat Pelaksana K3 dan Keamanan'),
	(9,'Pejabat Pelaksana Lingkungan'),
	(10,'Supv. Logistik');

/*!40000 ALTER TABLE `d_jabatan_pengawas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_jenis
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_jenis`;

CREATE TABLE `d_jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table d_masa_berlaku
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_masa_berlaku`;

CREATE TABLE `d_masa_berlaku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_masa_berlaku` WRITE;
/*!40000 ALTER TABLE `d_masa_berlaku` DISABLE KEYS */;

INSERT INTO `d_masa_berlaku` (`id`, `nama`)
VALUES
	(1,'120');

/*!40000 ALTER TABLE `d_masa_berlaku` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_masa_garansi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_masa_garansi`;

CREATE TABLE `d_masa_garansi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_masa_garansi` WRITE;
/*!40000 ALTER TABLE `d_masa_garansi` DISABLE KEYS */;

INSERT INTO `d_masa_garansi` (`id`, `nama`)
VALUES
	(1,'0'),
	(2,'3 (tiga) bulan'),
	(3,'6 (enam) bulan'),
	(4,'9 (sembilan) bulan'),
	(5,'12 (dua belas) bulan');

/*!40000 ALTER TABLE `d_masa_garansi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_metode_pengadaan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_metode_pengadaan`;

CREATE TABLE `d_metode_pengadaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_induk` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_metode_pengadaan` WRITE;
/*!40000 ALTER TABLE `d_metode_pengadaan` DISABLE KEYS */;

INSERT INTO `d_metode_pengadaan` (`id`, `id_induk`, `nama`)
VALUES
	(1,0,'PJ'),
	(2,0,'SPK'),
	(3,0,'SPBJ'),
	(4,2,'Barang'),
	(5,2,'Konstruksi'),
	(6,2,'Jasa Lainnya'),
	(7,2,'Jasa Konstruksi'),
	(8,3,'Barang'),
	(9,3,'Konstruksi'),
	(10,3,'Jasa Lainnya'),
	(11,3,'Jasa Konstruksi'),
	(12,1,'Tender Terbuka'),
	(13,1,'Tender Terbatas'),
	(14,1,'Penunjukan Langsung'),
	(15,12,'1 Tahap 1 Sampul'),
	(16,12,'1 Tahap 2 Sampul'),
	(17,12,'2 Tahap 2 Sampul'),
	(18,13,'1 Tahap 1 Sampul'),
	(19,13,'1 Tahap 2 Sampul'),
	(20,14,'Darurat'),
	(21,14,'Normal'),
	(22,15,'Barang'),
	(23,15,'Konstruksi'),
	(24,15,'Jasa Lainnya'),
	(25,15,'Jasa Konstruksi'),
	(26,16,'Barang'),
	(27,16,'Konstruksi'),
	(28,16,'Jasa Lainnya'),
	(29,16,'Jasa Konstruksi'),
	(30,17,'Barang'),
	(31,17,'Konstruksi'),
	(32,17,'Jasa Lainnya'),
	(33,17,'Jasa Konstruksi'),
	(34,18,'Barang'),
	(35,18,'Konstruksi'),
	(36,18,'Jasa Lainnya'),
	(37,18,'Jasa Konstruksi'),
	(38,19,'Barang'),
	(39,19,'Konstruksi'),
	(40,19,'Jasa Lainnya'),
	(41,19,'Jasa Konstruksi'),
	(42,20,'DPT'),
	(43,20,'Tanpa DPT'),
	(44,21,'DPT'),
	(45,21,'Tanpa DPT'),
	(46,42,'Barang'),
	(47,42,'Konstruksi'),
	(48,42,'Jasa Lainnya'),
	(49,42,'Jasa Konstruksi'),
	(50,43,'Barang'),
	(51,43,'Konstruksi'),
	(52,43,'Jasa Lainnya'),
	(53,43,'Jasa Konstruksi'),
	(54,44,'Barang'),
	(55,44,'Konstruksi'),
	(56,44,'Jasa Lainnya'),
	(57,44,'Jasa Konstruksi'),
	(58,45,'Barang'),
	(59,45,'Konstruksi'),
	(60,45,'Jasa Lainnya'),
	(61,45,'Jasa Konstruksi');

/*!40000 ALTER TABLE `d_metode_pengadaan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_mp1
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_mp1`;

CREATE TABLE `d_mp1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mp` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_mp1` WRITE;
/*!40000 ALTER TABLE `d_mp1` DISABLE KEYS */;

INSERT INTO `d_mp1` (`id`, `id_mp`, `nama`)
VALUES
	(1,1,'Tender Terbuka'),
	(2,1,'Tender Terbatas'),
	(3,1,'Penunjukan Langsung'),
	(4,2,'Barang'),
	(5,2,'Konstruksi'),
	(6,2,'Jasa Lainnya'),
	(7,2,'Jasa Konstruksi'),
	(8,3,'Barang'),
	(9,3,'Konstruksi'),
	(10,3,'Jasa Lainnya'),
	(11,3,'Jasa Konstruksi');

/*!40000 ALTER TABLE `d_mp1` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_mp2
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_mp2`;

CREATE TABLE `d_mp2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mp` int(11) DEFAULT NULL,
  `id_mp_a` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_mp2` WRITE;
/*!40000 ALTER TABLE `d_mp2` DISABLE KEYS */;

INSERT INTO `d_mp2` (`id`, `id_mp`, `id_mp_a`, `nama`)
VALUES
	(1,1,1,'1 Tahap 1 Sampul'),
	(2,1,1,'1 Tahap 2 Sampul'),
	(3,1,1,'2 Tahap 2 Sampul'),
	(4,1,2,'1 Tahap 1 Sampul'),
	(5,1,2,'1 Tahap 2 Sampul'),
	(6,1,3,'Darurat'),
	(7,1,3,'Normal');

/*!40000 ALTER TABLE `d_mp2` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_mp3
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_mp3`;

CREATE TABLE `d_mp3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mp` int(11) DEFAULT NULL,
  `id_mp_a` int(11) DEFAULT NULL,
  `id_mp_a_a` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_mp3` WRITE;
/*!40000 ALTER TABLE `d_mp3` DISABLE KEYS */;

INSERT INTO `d_mp3` (`id`, `id_mp`, `id_mp_a`, `id_mp_a_a`, `nama`)
VALUES
	(1,1,3,6,'DPT'),
	(2,1,3,6,'Tanpa DPT'),
	(3,1,3,7,'DPT'),
	(4,1,3,7,'Tanpa DPT');

/*!40000 ALTER TABLE `d_mp3` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_mp4
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_mp4`;

CREATE TABLE `d_mp4` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mp` int(11) DEFAULT NULL,
  `id_mp_a` int(11) DEFAULT NULL,
  `id_mp_a_a` int(11) DEFAULT NULL,
  `id_mp_a_a_a` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_mp4` WRITE;
/*!40000 ALTER TABLE `d_mp4` DISABLE KEYS */;

INSERT INTO `d_mp4` (`id`, `id_mp`, `id_mp_a`, `id_mp_a_a`, `id_mp_a_a_a`, `nama`)
VALUES
	(1,1,3,6,1,'Barang'),
	(2,1,3,6,1,'Konstruksi'),
	(3,1,3,6,1,'Jasa Lainnya'),
	(4,1,3,6,1,'Jasa Konstruksi'),
	(5,1,3,6,2,'Barang'),
	(6,1,3,6,2,'Konstruksi'),
	(7,1,3,6,2,'Jasa Lainnya'),
	(8,1,3,6,2,'Jasa Konstruksi'),
	(9,1,3,7,3,'Barang'),
	(10,1,3,7,3,'Konstruksi'),
	(11,1,3,7,3,'Jasa Lainnya'),
	(12,1,3,7,3,'Jasa Konstruksi'),
	(13,1,3,7,4,'Barang'),
	(14,1,3,7,4,'Konstruksi'),
	(15,1,3,7,4,'Jasa Lainnya'),
	(16,1,3,7,4,'Jasa Konstruksi');

/*!40000 ALTER TABLE `d_mp4` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_pekerjaan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_pekerjaan`;

CREATE TABLE `d_pekerjaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `vol_pekerjaan` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_pekerjaan` WRITE;
/*!40000 ALTER TABLE `d_pekerjaan` DISABLE KEYS */;

INSERT INTO `d_pekerjaan` (`id`, `nama`, `vol_pekerjaan`, `satuan`, `created_at`, `updated_at`)
VALUES
	(1,'Tes',23,'cm','2020-12-10 06:06:13','2020-12-10 06:06:13');

/*!40000 ALTER TABLE `d_pekerjaan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_penerbit_coo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_penerbit_coo`;

CREATE TABLE `d_penerbit_coo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_penerbit_coo` WRITE;
/*!40000 ALTER TABLE `d_penerbit_coo` DISABLE KEYS */;

INSERT INTO `d_penerbit_coo` (`id`, `nama`)
VALUES
	(1,'Agen Tunggal'),
	(2,'Distributor'),
	(3,'Toko');

/*!40000 ALTER TABLE `d_penerbit_coo` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_penerbit_garansi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_penerbit_garansi`;

CREATE TABLE `d_penerbit_garansi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_penerbit_garansi` WRITE;
/*!40000 ALTER TABLE `d_penerbit_garansi` DISABLE KEYS */;

INSERT INTO `d_penerbit_garansi` (`id`, `nama`)
VALUES
	(1,'Produsen/perakit'),
	(2,'Agen Tunggal'),
	(3,'Distributor'),
	(4,'Supplier/Vendor'),
	(5,'Toko');

/*!40000 ALTER TABLE `d_penerbit_garansi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_pengawas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_pengawas`;

CREATE TABLE `d_pengawas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_pengawas` WRITE;
/*!40000 ALTER TABLE `d_pengawas` DISABLE KEYS */;

INSERT INTO `d_pengawas` (`id`, `nama`)
VALUES
	(1,'Mohammad Dhaniel'),
	(2,'Andi Okta Riansyah'),
	(3,'Taufik Abdul Muhammad'),
	(4,'Zulfikar Rambe'),
	(5,'Ridwan Saputra'),
	(6,'Cecep Sofhan Munawar');

/*!40000 ALTER TABLE `d_pengawas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_perjanjian_kontrak
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_perjanjian_kontrak`;

CREATE TABLE `d_perjanjian_kontrak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `metode` varchar(50) NOT NULL DEFAULT '0',
  `nama` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_perjanjian_kontrak` WRITE;
/*!40000 ALTER TABLE `d_perjanjian_kontrak` DISABLE KEYS */;

INSERT INTO `d_perjanjian_kontrak` (`id`, `metode`, `nama`)
VALUES
	(1,'spk','Harga Borongan (Lumpsum)'),
	(2,'spk','Harga Satuan (Unit Price)'),
	(3,'spk','Gabungan Harga Borongan (Lumpsum) & Harga Satuan ('),
	(4,'spk','Terima Jadi (Turn Key)'),
	(5,'spk','Kesepakatan Harga Satuan (KHS)');

/*!40000 ALTER TABLE `d_perjanjian_kontrak` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_pic_pelaksana
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_pic_pelaksana`;

CREATE TABLE `d_pic_pelaksana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `metode` varchar(50) NOT NULL DEFAULT '0',
  `nama` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_pic_pelaksana` WRITE;
/*!40000 ALTER TABLE `d_pic_pelaksana` DISABLE KEYS */;

INSERT INTO `d_pic_pelaksana` (`id`, `metode`, `nama`)
VALUES
	(1,'spk','Alfi Satria '),
	(2,'spk','Kidung Sadewa'),
	(3,'spk','Odi Agung Putra'),
	(4,'spk','Adiwal'),
	(5,'pj','Wira Asrani Sidabutar'),
	(6,'pj','Rahmad Al Hidayat Putra '),
	(7,'pj','Rudy'),
	(8,'pj','Tunggul Yohannes');

/*!40000 ALTER TABLE `d_pic_pelaksana` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_pos_anggaran
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_pos_anggaran`;

CREATE TABLE `d_pos_anggaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_pos_anggaran` WRITE;
/*!40000 ALTER TABLE `d_pos_anggaran` DISABLE KEYS */;

INSERT INTO `d_pos_anggaran` (`id`, `nama`)
VALUES
	(1,'Anggaran Operasi Pos 53.1'),
	(2,'Anggaran Operasi Pos 53.2'),
	(3,'Anggaran Operasi Pos 54'),
	(4,'Emergency'),
	(5,'Anggaran Investasi');

/*!40000 ALTER TABLE `d_pos_anggaran` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_role`;

CREATE TABLE `d_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_role` WRITE;
/*!40000 ALTER TABLE `d_role` DISABLE KEYS */;

INSERT INTO `d_role` (`id`, `nama`)
VALUES
	(1,'Direksi'),
	(2,'Pengawas'),
	(3,'Tim Mutu'),
	(4,'Logistik'),
	(5,'Keuangan');

/*!40000 ALTER TABLE `d_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_sistem_denda
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_sistem_denda`;

CREATE TABLE `d_sistem_denda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_sistem_denda` WRITE;
/*!40000 ALTER TABLE `d_sistem_denda` DISABLE KEYS */;

INSERT INTO `d_sistem_denda` (`id`, `nama`)
VALUES
	(1,'Total nilai Surat Perintah Kerja'),
	(2,'Bagian nilai Surat Perintah Kerja');

/*!40000 ALTER TABLE `d_sistem_denda` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_status`;

CREATE TABLE `d_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_status` WRITE;
/*!40000 ALTER TABLE `d_status` DISABLE KEYS */;

INSERT INTO `d_status` (`id`, `nama`)
VALUES
	(1,'PROSES'),
	(2,'DRAFT'),
	(3,'TTD KONTRAK'),
	(4,'TERKONTRAK'),
	(5,'BACKLOG'),
	(6,'DIBATALKAN');

/*!40000 ALTER TABLE `d_status` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_sub_pekerjaan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_sub_pekerjaan`;

CREATE TABLE `d_sub_pekerjaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pekerjaan` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_sub_pekerjaan` WRITE;
/*!40000 ALTER TABLE `d_sub_pekerjaan` DISABLE KEYS */;

INSERT INTO `d_sub_pekerjaan` (`id`, `id_pekerjaan`, `nama`, `created_at`, `updated_at`)
VALUES
	(1,1,'dsfdsfds','2020-12-04 10:47:48','2020-12-04 10:47:48'),
	(2,1,'Tesss','2020-12-06 20:59:40','2020-12-06 20:59:40'),
	(3,1,'dsfdsfds','2020-12-06 21:01:31','2020-12-06 21:01:31');

/*!40000 ALTER TABLE `d_sub_pekerjaan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_sumber_dana
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_sumber_dana`;

CREATE TABLE `d_sumber_dana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_sumber_dana` WRITE;
/*!40000 ALTER TABLE `d_sumber_dana` DISABLE KEYS */;

INSERT INTO `d_sumber_dana` (`id`, `nama`)
VALUES
	(1,'Operasi');

/*!40000 ALTER TABLE `d_sumber_dana` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_syarat_bidang_usaha
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_syarat_bidang_usaha`;

CREATE TABLE `d_syarat_bidang_usaha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_syarat_bidang_usaha` WRITE;
/*!40000 ALTER TABLE `d_syarat_bidang_usaha` DISABLE KEYS */;

INSERT INTO `d_syarat_bidang_usaha` (`id`, `nama`)
VALUES
	(1,'Pemasokan barang semua bidang'),
	(2,'Pemasokan barang Bidang Pertanian'),
	(3,'Pemasokan barang Bidang Pertambangan Umum'),
	(4,'Pemasokan barang Bidang Telematika'),
	(5,'Pemasokan barang Bidang Perhubungan'),
	(6,'Pemasokan barang Bidang Lain-lainnya');

/*!40000 ALTER TABLE `d_syarat_bidang_usaha` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_tempat_penyerahan_lokasi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_tempat_penyerahan_lokasi`;

CREATE TABLE `d_tempat_penyerahan_lokasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `metode` varchar(50) NOT NULL DEFAULT '0',
  `nama` varchar(200) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_tempat_penyerahan_lokasi` WRITE;
/*!40000 ALTER TABLE `d_tempat_penyerahan_lokasi` DISABLE KEYS */;

INSERT INTO `d_tempat_penyerahan_lokasi` (`id`, `metode`, `nama`, `alamat`)
VALUES
	(1,'spk','ULPLTG Teluk Lembu',NULL),
	(2,'spk','ULPLTA Koto Panjang',NULL),
	(3,'spk','Kantor PT PLN (Persero) Unit Pelaksana Pengendalia',NULL),
	(4,'spk','Gudang PT PLN (Persero) Unit Pelaksana Pengendalia',NULL),
	(5,'spk','ULPLTG/MG Duri',NULL),
	(6,'spk','Kantor Unit Pelaksana, ULPLTG/MG Duri, ULPLTG Telu',NULL),
	(7,'spk','ULPLTG/MG Duri, ULPLTG Teluk Lembu dan ULPLTA Koto',NULL),
	(9,'pj','Kantor PT PLN (Persero) Unit Pelaksana Pengendalia',NULL),
	(10,'pj','Gudang PT PLN (Persero) Unit Pelaksana Pengendalia',NULL),
	(11,'pj','ULPLTA Sipansihaporas',NULL),
	(12,'pj','ULPLTA Renun',NULL),
	(13,'pj','PLTMH Aek Raisan 1',NULL),
	(14,'pj','PLTMH Aek Raisan 2',NULL),
	(15,'pj','PLTMH Batang Gadis',NULL),
	(16,'pj','PLTMH Aek Sibundong',NULL),
	(17,'pj','PLTMH Aek Silang',NULL),
	(18,'pj','PLTMH Boho',NULL),
	(19,'pj','PLTMH Kombih I',NULL),
	(20,'pj','PLTMH Kombih II',NULL),
	(21,'pj','PLTMH Tonduhan',NULL),
	(22,'pj','PLTMH Tersebar',NULL),
	(23,'pj','ULPLTA Renun, ULPLTA Sipansihaporas dan PLTMH Ters',NULL),
	(24,'pj','Kantor Unit Pelaksana, ULPLTA Renun, ULPLTA Sipans',NULL),
	(25,'spbj','ULPLTG Teluk Lembu','Jl. Tanjung Datuk No. 340, Kel. Tanjung RHU, Kec. Lima puluh, Kota Pekanbaru'),
	(26,'spbj','Kantor PT PLN (Persero) Unit Pelaksana Pengendalia','Jl. Tanjung Datuk No. 74, Pesisir, Kec. Lima Puluh, Kota Pekanbaru, Riau 28155'),
	(27,'spbj','Gudang PT PLN (Persero) Unit Pelaksana Pengendalia','Jl. Tanjung Datuk No. 74, Pesisir, Kec. Lima Puluh, Kota Pekanbaru, Riau 28155'),
	(28,'spbj','ULPLTG/MG Duri','Jl. Sungai Kulim, Desa Balai Pungut, Kec. Pinggir, Kab. Bengkalis 28784'),
	(29,'spbj','ULPLTA Koto Panjang','Jl. Raya Pekanbaru - Payakumbuh KM 80, Desa Merangin, Kab. Kampar 28463'),
	(30,'spbj','Kantor Unit Pelaksana, ULPLTG/MG Duri, ULPLTG Telu','-'),
	(31,'spbj','ULPLTA KoULPLTG/MG Duri, ULPLTG Teluk Lembu dan UL','-');

/*!40000 ALTER TABLE `d_tempat_penyerahan_lokasi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table d_vfmc
# ------------------------------------------------------------

DROP TABLE IF EXISTS `d_vfmc`;

CREATE TABLE `d_vfmc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `metode` varchar(50) NOT NULL DEFAULT '0',
  `nama` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `d_vfmc` WRITE;
/*!40000 ALTER TABLE `d_vfmc` DISABLE KEYS */;

INSERT INTO `d_vfmc` (`id`, `metode`, `nama`)
VALUES
	(1,'spk','Tidak Ada'),
	(2,'spk','Khairul'),
	(3,'spk','Agus Cahyono'),
	(4,'pj','Tidak Ada'),
	(5,'pj','Budiman Sitorus'),
	(6,'pj','Zulkifli Shulham'),
	(7,'spbj','Tidak Ada'),
	(8,'spbj','Tidak Ada'),
	(9,'spbj','Tidak Ada');

/*!40000 ALTER TABLE `d_vfmc` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table history_ubah_t_harga
# ------------------------------------------------------------

DROP TABLE IF EXISTS `history_ubah_t_harga`;

CREATE TABLE `history_ubah_t_harga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_database_harga` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `harga_dari` int(11) DEFAULT NULL,
  `harga_ke` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `history_ubah_t_harga` WRITE;
/*!40000 ALTER TABLE `history_ubah_t_harga` DISABLE KEYS */;

INSERT INTO `history_ubah_t_harga` (`id`, `id_database_harga`, `id_user`, `harga_dari`, `harga_ke`, `created_at`, `updated_at`)
VALUES
	(2,6,18,3533333,3500000,'2021-04-07 11:42:10','2020-09-18 08:05:03'),
	(3,8,19,2000,4000,'2021-04-07 11:42:12','2020-09-18 18:37:57'),
	(4,25,18,34534,34534,'2021-04-07 11:42:14','2020-09-21 06:38:51'),
	(5,16,19,30000,30000,'2021-04-07 11:42:16','2020-09-21 06:41:05'),
	(6,16,19,30000,30000,'2021-04-07 11:42:19','2020-09-21 06:41:19'),
	(7,26,18,6000,5000,'2021-04-07 11:42:22','2020-09-21 12:14:50'),
	(8,28,19,4200,4300,'2021-04-07 11:42:25','2020-09-22 13:52:42'),
	(9,27,19,7000,13200,'2021-04-07 11:42:27','2020-09-23 09:34:14'),
	(10,29,18,34344,34344,'2021-04-07 11:42:29','2020-10-01 15:59:59'),
	(11,29,18,34344,34344,'2021-04-07 11:42:31','2020-10-01 16:00:06'),
	(12,29,19,34344,34344,'2021-04-07 11:42:33','2020-10-01 16:00:14'),
	(13,29,18,34344,5000,'2021-04-07 11:42:35','2020-10-01 16:00:20');

/*!40000 ALTER TABLE `history_ubah_t_harga` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table media
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_type` varchar(50) DEFAULT NULL,
  `model_id` bigint(20) DEFAULT NULL,
  `collection_name` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `file_name` varchar(50) DEFAULT NULL,
  `mime_type` varchar(50) DEFAULT NULL,
  `disk` varchar(50) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `manipulations` text,
  `custom_properties` text,
  `responsive_images` text,
  `order_column` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table pos_anggaran
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pos_anggaran`;

CREATE TABLE `pos_anggaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `pos_anggaran` WRITE;
/*!40000 ALTER TABLE `pos_anggaran` DISABLE KEYS */;

INSERT INTO `pos_anggaran` (`id`, `nama`)
VALUES
	(1,'Anggaran Operasi Pos 53.1'),
	(2,'Anggaran Operasi Pos 53.2'),
	(3,'Anggaran Operasi Pos 54'),
	(4,'Emergency'),
	(5,'Anggaran Investasi');

/*!40000 ALTER TABLE `pos_anggaran` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table status_berakhir
# ------------------------------------------------------------

DROP TABLE IF EXISTS `status_berakhir`;

CREATE TABLE `status_berakhir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `status_berakhir` WRITE;
/*!40000 ALTER TABLE `status_berakhir` DISABLE KEYS */;

INSERT INTO `status_berakhir` (`id`, `nama`)
VALUES
	(2,'Sejak BA Terima Lokasi');

/*!40000 ALTER TABLE `status_berakhir` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sub_judul
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sub_judul`;

CREATE TABLE `sub_judul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ips` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `sub_judul` WRITE;
/*!40000 ALTER TABLE `sub_judul` DISABLE KEYS */;

INSERT INTO `sub_judul` (`id`, `id_ips`, `nama`, `created_at`, `updated_at`)
VALUES
	(4,13,'Tes Sub Judul','2020-12-14 10:38:50','2020-12-14 10:38:50');

/*!40000 ALTER TABLE `sub_judul` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sub_sub_judul
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sub_sub_judul`;

CREATE TABLE `sub_sub_judul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ips` int(11) DEFAULT NULL,
  `id_sub_judul` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `sub_sub_judul` WRITE;
/*!40000 ALTER TABLE `sub_sub_judul` DISABLE KEYS */;

INSERT INTO `sub_sub_judul` (`id`, `id_ips`, `id_sub_judul`, `nama`, `created_at`, `updated_at`)
VALUES
	(6,4,13,'ewrewrew','2020-12-15 12:12:08','2020-12-15 12:12:08');

/*!40000 ALTER TABLE `sub_sub_judul` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_harga
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_harga`;

CREATE TABLE `t_harga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) NOT NULL DEFAULT '',
  `satuan` varchar(255) NOT NULL DEFAULT '',
  `harga_satuan` int(11) NOT NULL,
  `spesifikasi` text NOT NULL,
  `foto` varchar(50) NOT NULL DEFAULT '',
  `sertifikat` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabel Database Harga';

LOCK TABLES `t_harga` WRITE;
/*!40000 ALTER TABLE `t_harga` DISABLE KEYS */;

INSERT INTO `t_harga` (`id`, `nama_barang`, `satuan`, `harga_satuan`, `spesifikasi`, `foto`, `sertifikat`, `status`, `created_at`, `updated_at`)
VALUES
	(29,'Where','Tidak Tahu',5000,'Tess','396085034.PNG','278110802.png',1,'2020-10-01 23:00:20','2020-10-01 16:00:20'),
	(30,'ddfg','dfgdfg',32432432,'dsfdf','1337850232.PNG','dsfds',1,'2021-01-29 09:35:00','2021-01-29 09:35:00');

/*!40000 ALTER TABLE `t_harga` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_pembayaran_pengadaan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_pembayaran_pengadaan`;

CREATE TABLE `t_pembayaran_pengadaan` (
  `id` int(11) NOT NULL,
  `id_kontrak` int(11) DEFAULT NULL,
  `harga_penawaran` int(11) DEFAULT NULL,
  `harga_kontrak` int(11) DEFAULT NULL,
  `nilai_jaminan_garansi` int(11) DEFAULT NULL,
  `jangka_waktu_penyelesaian` int(11) DEFAULT NULL,
  `melampirkan_sertifikat_coo` int(11) DEFAULT NULL,
  `coo_asal_usul` varchar(50) DEFAULT NULL,
  `penerbit_coo` varchar(50) DEFAULT NULL,
  `melampirkan_sertifikat_garansi` int(11) DEFAULT NULL,
  `penerbit_sertifikasi_garansi` varchar(50) DEFAULT NULL,
  `melampirkan_msds` int(11) DEFAULT NULL,
  `sistem_denda` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table t_pengadaan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_pengadaan`;

CREATE TABLE `t_pengadaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_proses` varchar(50) NOT NULL DEFAULT '0',
  `no_proses_pengadaan` varchar(50) NOT NULL DEFAULT '0',
  `no_prk` varchar(50) DEFAULT NULL,
  `no_nota_dinas` varchar(50) DEFAULT NULL,
  `tgl_nota_dinas` date DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `tgl_diterima_panitia` date DEFAULT NULL,
  `bagian` varchar(255) DEFAULT NULL,
  `fungsi_pembangkit` varchar(255) DEFAULT NULL,
  `no_undang_pl` varchar(255) DEFAULT NULL,
  `lingkup_pekerjaan` varchar(255) DEFAULT NULL,
  `id_metode_pengadaan` int(11) DEFAULT NULL,
  `id_mp1` int(11) DEFAULT '0',
  `id_mp2` int(11) DEFAULT '0',
  `id_mp3` int(11) DEFAULT '0',
  `id_mp4` int(11) DEFAULT '0',
  `id_mp5` int(11) DEFAULT '0',
  `metode_pengadaan` varchar(255) DEFAULT NULL,
  `metode_pengadaan_detail` varchar(255) DEFAULT NULL,
  `rencana` varchar(255) DEFAULT NULL,
  `tempat_penyerahan` varchar(255) DEFAULT NULL,
  `masa_berlaku_surat` varchar(255) DEFAULT NULL,
  `cara_pembayaran` varchar(255) DEFAULT NULL,
  `jenis_perjanjian` varchar(255) DEFAULT NULL,
  `sumber_dana` varchar(255) DEFAULT NULL,
  `masa_garansi` varchar(255) DEFAULT NULL,
  `syarat_bidang` varchar(255) DEFAULT NULL,
  `alamat_penyerahan` varchar(255) DEFAULT NULL,
  `jabatan_direksi` varchar(255) DEFAULT NULL,
  `vfmc` varchar(255) DEFAULT NULL,
  `vfmc2` varchar(255) DEFAULT NULL,
  `pengguna` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `pejabat_pelaksana` varchar(255) DEFAULT NULL,
  `direksi` varchar(255) DEFAULT NULL,
  `pengawas` varchar(255) DEFAULT NULL,
  `jabatan_pengawas` varchar(255) DEFAULT NULL,
  `ketua_tim` varchar(255) DEFAULT NULL,
  `pic_pelaksana` varchar(255) DEFAULT NULL,
  `hps` int(11) DEFAULT NULL,
  `kontrak` varchar(255) DEFAULT NULL,
  `proses` varchar(255) DEFAULT NULL,
  `rab` int(11) DEFAULT NULL,
  `nilai_kontrak` int(11) DEFAULT NULL,
  `sisa_anggaran` varchar(50) DEFAULT NULL,
  `pos_anggaran` varchar(50) DEFAULT NULL,
  `harga_penawaran` int(11) DEFAULT NULL,
  `harga_kontrak` int(11) DEFAULT NULL,
  `nilai_jaminan` int(11) DEFAULT NULL,
  `jangka_waktu` int(11) DEFAULT NULL,
  `jangka_waktu_hari` varchar(50) DEFAULT NULL,
  `jangka_waktu_tgl` date DEFAULT NULL,
  `coo` varchar(50) DEFAULT NULL,
  `melampirkan_sertifikat_coo` varchar(50) DEFAULT NULL,
  `penerbit_coo` varchar(50) DEFAULT NULL,
  `melampirkan_sertifikat` varchar(50) DEFAULT NULL,
  `penerbit_garansi` varchar(50) DEFAULT NULL,
  `melampirkan_msds` varchar(50) DEFAULT NULL,
  `sistem_denda` varchar(50) DEFAULT NULL,
  `masa_pemeliharaan` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_berakhir` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `t_pengadaan` WRITE;
/*!40000 ALTER TABLE `t_pengadaan` DISABLE KEYS */;

INSERT INTO `t_pengadaan` (`id`, `no_proses`, `no_proses_pengadaan`, `no_prk`, `no_nota_dinas`, `tgl_nota_dinas`, `tgl_mulai`, `judul`, `id_perusahaan`, `tahun`, `tgl_diterima_panitia`, `bagian`, `fungsi_pembangkit`, `no_undang_pl`, `lingkup_pekerjaan`, `id_metode_pengadaan`, `id_mp1`, `id_mp2`, `id_mp3`, `id_mp4`, `id_mp5`, `metode_pengadaan`, `metode_pengadaan_detail`, `rencana`, `tempat_penyerahan`, `masa_berlaku_surat`, `cara_pembayaran`, `jenis_perjanjian`, `sumber_dana`, `masa_garansi`, `syarat_bidang`, `alamat_penyerahan`, `jabatan_direksi`, `vfmc`, `vfmc2`, `pengguna`, `nip`, `pejabat_pelaksana`, `direksi`, `pengawas`, `jabatan_pengawas`, `ketua_tim`, `pic_pelaksana`, `hps`, `kontrak`, `proses`, `rab`, `nilai_kontrak`, `sisa_anggaran`, `pos_anggaran`, `harga_penawaran`, `harga_kontrak`, `nilai_jaminan`, `jangka_waktu`, `jangka_waktu_hari`, `jangka_waktu_tgl`, `coo`, `melampirkan_sertifikat_coo`, `penerbit_coo`, `melampirkan_sertifikat`, `penerbit_garansi`, `melampirkan_msds`, `sistem_denda`, `masa_pemeliharaan`, `status`, `status_berakhir`, `created_at`, `updated_at`)
VALUES
	(31,'34','0','234','234','2021-01-13','2021-01-14','Pengadaan SPK Terbaru',5,'2021','2021-01-13','Enjiniring','Pembangkit','23','sdfdsf',NULL,2,4,NULL,NULL,NULL,'SPK',NULL,'234','ULPLTG Teluk Lembu','120','sistem bulanan','Harga Borongan (Lumpsum)','Operasi','0','Pemasokan barang semua bidang',NULL,NULL,'Khairul','Khairul','sdsdfsd','234234','sdfsdf','sdfsdfds','Mohammad Dhaniel','Manager ULPLTG/MG Duri','sdfsf','Alfi Satria',324,'1779047421.pdf','1707826739.pdf',234444323,23423,'234.420.900,00','Anggaran Operasi Pos 53.2',23432423,23080937,1154047,234,'Kamis','2021-09-16','Certificate Of Manufacture (COM) dari','Ya','Agen Tunggal','Ya','Produsen/perakit','Ya','Total nilai Surat Perintah Kerja',NULL,'TTD KONTRAK','234','2021-01-12 20:45:03','2021-01-21 07:29:42'),
	(32,'1','23','23','1','2021-01-13','2021-01-15','Pengadaan PJ 1sds',5,'2020','2021-01-15','Enjiniring','Sarana','23','dfsdfsdfsdf',NULL,1,12,16,26,NULL,'PJ',NULL,'230','Kantor PT PLN (Persero) Unit Pelaksana Pengendalia','120','sistem bulanan','Harga Borongan (Lumpsum)','Operasi','3 (tiga) bulan','Pemasokan barang semua bidang',NULL,NULL,'Budiman Sitorus','Tidak Ada','sdfdsfsd','2342432','daddsfdsfdsf','sdfdsfsdf','Mohammad Dhaniel','Manager ULPLTG/MG Duri','sdfsdfdsf','Wira Asrani Sidabutar',23,'2136072194.pdf','1969376216.pdf',23423222,232323,'23.190.899,00','Anggaran Operasi Pos 53.1',2342423,2307287,115364,123,NULL,NULL,'Certificate Of Manufacture (COM) dari',NULL,'Agen Tunggal',NULL,'Produsen/perakit',NULL,'Total nilai Surat Perintah Kerja',NULL,'PROSES','123','2021-01-14 09:00:50','2021-04-06 21:40:18'),
	(33,'23','0','234','23','2021-01-19','2021-01-19','sdfsdf',6,'2020','2021-01-20','Enjiniring','Pembangkit','23','fsdfsdf',NULL,2,4,NULL,NULL,NULL,'SPK',NULL,'234','ULPLTG Teluk Lembu','120','sistem bulanan','Harga Borongan (Lumpsum)','Operasi','0','Pemasokan barang semua bidang',NULL,NULL,'Khairul','Tidak Ada','werwerw','234234','yuyuyuyu','ioioioio','Mohammad Dhaniel','Manager ULPLTG/MG Duri','tytytytytyt','Kidung Sadewa',32424,'1901117670.pdf','1036195238.pdf',2342,34,'2.308,00','Anggaran Operasi Pos 53.1',345,340,17,123,'Jumat','2021-06-04','Certificate Of Manufacture (COM) dari','Ya','Agen Tunggal','Ya','Produsen/perakit','Ya','Total nilai Surat Perintah Kerja',NULL,'BACKLOG','123','2021-01-18 08:21:47','2021-01-18 15:04:57'),
	(34,'234','212','23432','234','2021-02-16','2021-02-17','sdfsdfs',6,'2021','2021-02-18','Enjiniring','Pembangkit','234','dsfsd',NULL,3,8,NULL,NULL,NULL,'SPBJ',NULL,NULL,'Kantor PT PLN (Persero) Unit Pelaksana Pengendalia','120','sistem bulanan','Harga Borongan (Lumpsum)','Operasi','6 (enam) bulan','Pemasokan barang semua bidang',NULL,'Manajer Bagian Operasi dan Pemeliharaan','Tidak Ada','Tidak Ada','dfdsfsd','234324','dsfdsfsdf',NULL,'Mohammad Dhaniel','Manager ULPLTG/MG Duri','dsfdsfsdf','Alfi Satria',2323,'467075300.pdf','1882328392.pdf',2342342,232,'2.342.110,00','Anggaran Operasi Pos 53.1',2342342,2307207,115360,232,NULL,NULL,'Certificate Of Original (COO) dari','Ya','Agen Tunggal','Ya','Produsen/perakit','Ya','Total nilai Surat Perintah Kerja',NULL,'BACKLOG','232','2021-02-01 11:16:21','2021-04-13 23:11:17'),
	(35,'1','44','23','1','2021-01-13','2021-01-15','Pengadaan PJ dsfsdf',5,'2020','2021-01-15','Enjiniring','Sarana','23','dfsdfsdfsdf',NULL,1,12,15,22,NULL,'PJ',NULL,'230','Kantor PT PLN (Persero) Unit Pelaksana Pengendalia','120','sistem bulanan','Harga Borongan (Lumpsum)','Operasi','3 (tiga) bulan','Pemasokan barang semua bidang',NULL,NULL,'Budiman Sitorus','Tidak Ada','sdfdsfsd','2342432','daddsfdsfdsf','sdfdsfsdf','Mohammad Dhaniel','Manager ULPLTG/MG Duri','sdfsdfdsf','Wira Asrani Sidabutar',23,'2136072194.pdf','1969376216.pdf',23423222,232323,'23.190.899,00','Anggaran Operasi Pos 53.1',2342423,2307287,115364,123,NULL,NULL,'Certificate Of Manufacture (COM) dari',NULL,'Agen Tunggal',NULL,'Produsen/perakit',NULL,'Total nilai Surat Perintah Kerja',NULL,'PROSES','123','2021-01-14 09:00:50','2021-03-09 15:20:26'),
	(36,'1','34','23','1','2021-01-13','2021-01-15','Pengadaan PJ fsdfdsfs',5,'2020','2021-01-15','Enjiniring','Sarana','23','dfsdfsdfsdf',NULL,1,12,18,30,NULL,'PJ',NULL,'230','Kantor PT PLN (Persero) Unit Pelaksana Pengendalia','120','sistem bulanan','Harga Borongan (Lumpsum)','Operasi','3 (tiga) bulan','Pemasokan barang semua bidang',NULL,NULL,'Budiman Sitorus','Tidak Ada','sdfdsfsd','2342432','daddsfdsfdsf','sdfdsfsdf','Mohammad Dhaniel','Manager ULPLTG/MG Duri','sdfsdfdsf','Wira Asrani Sidabutar',23,'2136072194.pdf','1969376216.pdf',23423222,232323,'23.190.899,00','Anggaran Operasi Pos 53.1',2342423,2307287,115364,123,NULL,NULL,'Certificate Of Manufacture (COM) dari',NULL,'Agen Tunggal',NULL,'Produsen/perakit',NULL,'Total nilai Surat Perintah Kerja',NULL,'PROSES','123','2021-01-14 09:00:50','2021-03-10 08:26:44'),
	(37,'1','23','23','1','2021-01-13','2021-01-15','Pengadaan PJ sfsdfsd',5,'2020','2021-01-15','Enjiniring','Sarana','23','dfsdfsdfsdf',NULL,1,12,19,34,NULL,'PJ',NULL,'230','Kantor PT PLN (Persero) Unit Pelaksana Pengendalia','120','sistem bulanan','Harga Borongan (Lumpsum)','Operasi','3 (tiga) bulan','Pemasokan barang semua bidang',NULL,NULL,'Budiman Sitorus','Tidak Ada','sdfdsfsd','2342432','daddsfdsfdsf','sdfdsfsdf','Mohammad Dhaniel','Manager ULPLTG/MG Duri','sdfsdfdsf','Wira Asrani Sidabutar',23,'2136072194.pdf','1969376216.pdf',23423222,232323,'23.190.899,00','Anggaran Operasi Pos 53.1',2342423,2307287,115364,123,NULL,NULL,'Certificate Of Manufacture (COM) dari',NULL,'Agen Tunggal',NULL,'Produsen/perakit',NULL,'Total nilai Surat Perintah Kerja',NULL,'PROSES','123','2021-01-14 09:00:50','2021-03-10 09:18:17'),
	(38,'23','0','23','234','2021-03-23','2021-03-18','sdfsfsf',NULL,NULL,'2021-03-18',NULL,'Sarana',NULL,NULL,NULL,3,8,NULL,NULL,NULL,'SPBJ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Rahmad Al Hidayat Putra',NULL,NULL,NULL,3423,NULL,NULL,'Anggaran Operasi Pos 53.2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'TERKONTRAK',NULL,'2021-03-20 11:41:52','2021-03-20 11:41:52');

/*!40000 ALTER TABLE `t_pengadaan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_pengadaan_detail_pj
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_pengadaan_detail_pj`;

CREATE TABLE `t_pengadaan_detail_pj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengadaan` int(11) NOT NULL DEFAULT '0',
  `id_metode` int(11) NOT NULL DEFAULT '0',
  `pembukaan_penawaran_jumlah` int(11) DEFAULT NULL,
  `pembukaan_penawaran_tgl` date DEFAULT NULL,
  `pembukaan_penawaran_hari` varchar(50) DEFAULT NULL,
  `pembukaan_penawaran_nomor` varchar(50) DEFAULT NULL,
  `survey_harga_pasar_jumlah` int(11) DEFAULT NULL,
  `survey_harga_pasar_tgl` date DEFAULT NULL,
  `survey_harga_pasar_hari` varchar(255) DEFAULT NULL,
  `survey_harga_pasar_nomor` varchar(255) DEFAULT NULL,
  `hps_jumlah` int(11) DEFAULT NULL,
  `hps_tgl` date DEFAULT NULL,
  `hps_hari` varchar(255) DEFAULT NULL,
  `hps_nomor` varchar(255) DEFAULT NULL,
  `pengumuman_jumlah` int(11) DEFAULT NULL,
  `pengumuman_tgl` date DEFAULT NULL,
  `pengumuman_hari` varchar(255) DEFAULT NULL,
  `pengumuman_nomor` varchar(255) DEFAULT NULL,
  `undangan_aanwijzing_peserta_jumlah` int(11) DEFAULT NULL,
  `undangan_aanwijzing_peserta_tgl` date DEFAULT NULL,
  `undangan_aanwijzing_peserta_hari` varchar(255) DEFAULT NULL,
  `undangan_aanwijzing_peserta_nomor` varchar(255) DEFAULT NULL,
  `undangan_aanwijzing_direksi_pekerjaan_jumlah` int(11) DEFAULT NULL,
  `undangan_aanwijzing_direksi_pekerjaan_tgl` date DEFAULT NULL,
  `undangan_aanwijzing_direksi_pekerjaan_hari` varchar(255) DEFAULT NULL,
  `undangan_aanwijzing_direksi_pekerjaan_nomor` varchar(255) DEFAULT NULL,
  `aanwijzing_jumlah` int(11) DEFAULT NULL,
  `aanwijzing_tgl` date DEFAULT NULL,
  `aanwijzing_hari` varchar(255) DEFAULT NULL,
  `aanwijzing_nomor` varchar(255) DEFAULT NULL,
  `addendum_rks_jumlah` int(11) DEFAULT NULL,
  `addendum_rks_tgl` date DEFAULT NULL,
  `addendum_rks_hari` varchar(255) DEFAULT NULL,
  `addendum_rks_nomor` varchar(255) DEFAULT NULL,
  `pemasukan_dok_penawaran_jumlah` int(11) DEFAULT NULL,
  `pemasukan_dok_penawaran_jumlah_dari` int(11) DEFAULT NULL,
  `pemasukan_dok_penawaran_tgl_dari` date DEFAULT NULL,
  `pemasukan_dok_penawaran_tgl` date DEFAULT NULL,
  `pemasukan_dok_penawaran_hari` varchar(255) DEFAULT NULL,
  `pemasukan_dok_penawaran_hari_dari` varchar(255) DEFAULT NULL,
  `pemasukan_dok_penawaran_nomor` varchar(255) DEFAULT NULL,
  `pembukaan_penawaran_sampul_satu_jumlah` int(11) DEFAULT NULL,
  `pembukaan_penawaran_sampul_satu_tgl` date DEFAULT NULL,
  `pembukaan_penawaran_sampul_satu_hari` varchar(255) DEFAULT NULL,
  `pembukaan_penawaran_sampul_satu_nomor` varchar(255) DEFAULT NULL,
  `evaluasi_dok_penawaran_sampul_satu_jumlah` int(11) DEFAULT NULL,
  `evaluasi_dok_penawaran_sampul_satu_tgl` date DEFAULT NULL,
  `evaluasi_dok_penawaran_sampul_satu_hari` varchar(255) DEFAULT NULL,
  `evaluasi_dok_penawaran_sampul_satu_nomor` varchar(255) DEFAULT NULL,
  `pengumuman_hasil_evaluasi_sampul_satu_jumlah` int(11) DEFAULT NULL,
  `pengumuman_hasil_evaluasi_sampul_satu_tgl` date DEFAULT NULL,
  `pengumuman_hasil_evaluasi_sampul_satu_hari` varchar(255) DEFAULT NULL,
  `pengumuman_hasil_evaluasi_sampul_satu_nomor` varchar(255) DEFAULT NULL,
  `pembukaan_penawaran_sampul_dua_jumlah` int(11) DEFAULT NULL,
  `pembukaan_penawaran_sampul_dua_tgl` date DEFAULT NULL,
  `pembukaan_penawaran_sampul_dua_hari` varchar(255) DEFAULT NULL,
  `pembukaan_penawaran_sampul_dua_nomor` varchar(255) DEFAULT NULL,
  `evaluasi_dok_penawaran_sampul_dua_jumlah` int(11) DEFAULT NULL,
  `evaluasi_dok_penawaran_sampul_dua_tgl` date DEFAULT NULL,
  `evaluasi_dok_penawaran_sampul_dua_hari` varchar(255) DEFAULT NULL,
  `evaluasi_dok_penawaran_sampul_dua_nomor` varchar(255) DEFAULT NULL,
  `pembukaan_dok_penawaran_jumlah` int(11) DEFAULT NULL,
  `pembukaan_dok_penawaran_tgl` date DEFAULT NULL,
  `pembukaan_dok_penawaran_hari` varchar(255) DEFAULT NULL,
  `pembukaan_dok_penawaran_nomor` varchar(255) DEFAULT NULL,
  `evaluasi_dok_penawaran_jumlah` int(11) DEFAULT NULL,
  `evaluasi_dok_penawaran_tgl` date DEFAULT NULL,
  `evaluasi_dok_penawaran_hari` varchar(255) DEFAULT NULL,
  `evaluasi_dok_penawaran_nomor` varchar(255) DEFAULT NULL,
  `undangan_pembuktian_kualifikasi_jumlah` int(11) DEFAULT NULL,
  `undangan_pembuktian_kualifikasi_tgl` date DEFAULT NULL,
  `undangan_pembuktian_kualifikasi_hari` varchar(255) DEFAULT NULL,
  `undangan_pembuktian_kualifikasi_nomor` varchar(255) DEFAULT NULL,
  `pembuktian_kualifikasi_jumlah` int(11) DEFAULT NULL,
  `pembuktian_kualifikasi_tgl` date DEFAULT NULL,
  `pembuktian_kualifikasi_hari` varchar(255) DEFAULT NULL,
  `pembuktian_kualifikasi_nomor` varchar(255) DEFAULT NULL,
  `undangan_klarifikasi_dan_nego_penawaran_jumlah` int(11) DEFAULT NULL,
  `undangan_klarifikasi_dan_nego_penawaran_tgl` date DEFAULT NULL,
  `undangan_klarifikasi_dan_nego_penawaran_hari` varchar(255) DEFAULT NULL,
  `undangan_klarifikasi_dan_nego_penawaran_nomor` varchar(255) DEFAULT NULL,
  `ba_hasil_klarifikasi_dan_nego_penawaran_jumlah` int(11) DEFAULT NULL,
  `ba_hasil_klarifikasi_dan_nego_penawaran_tgl` date DEFAULT NULL,
  `ba_hasil_klarifikasi_dan_nego_penawaran_hari` varchar(255) DEFAULT NULL,
  `ba_hasil_klarifikasi_dan_nego_penawaran_nomor` varchar(255) DEFAULT NULL,
  `laporan_hasil_evaluasi_jumlah` int(11) DEFAULT NULL,
  `laporan_hasil_evaluasi_tgl` date DEFAULT NULL,
  `laporan_hasil_evaluasi_hari` varchar(255) DEFAULT NULL,
  `laporan_hasil_evaluasi_nomor` varchar(255) DEFAULT NULL,
  `nd_usulan_penetapan_calon_pemenang_jumlah` int(11) DEFAULT NULL,
  `nd_usulan_penetapan_calon_pemenang_tgl` date DEFAULT NULL,
  `nd_usulan_penetapan_calon_pemenang_hari` varchar(255) DEFAULT NULL,
  `nd_usulan_penetapan_calon_pemenang_nomor` varchar(255) DEFAULT NULL,
  `nd_penetapan_calon_pemenang_jumlah` int(11) DEFAULT NULL,
  `nd_penetapan_calon_pemenang_tgl` date DEFAULT NULL,
  `nd_penetapan_calon_pemenang_hari` varchar(255) DEFAULT NULL,
  `nd_penetapan_calon_pemenang_nomor` varchar(255) DEFAULT NULL,
  `pengumuman_calon_pemenang_jumlah` int(11) DEFAULT NULL,
  `pengumuman_calon_pemenang_tgl` date DEFAULT NULL,
  `pengumuman_calon_pemenang_hari` varchar(255) DEFAULT NULL,
  `pengumuman_calon_pemenang_nomor` varchar(255) DEFAULT NULL,
  `penunjukan_pemenang_jumlah` int(11) DEFAULT NULL,
  `penunjukan_pemenang_tgl` date DEFAULT NULL,
  `penunjukan_pemenang_hari` varchar(255) DEFAULT NULL,
  `penunjukan_pemenang_nomor` varchar(255) DEFAULT NULL,
  `skkp_jumlah` int(11) DEFAULT NULL,
  `skkp_tgl` date DEFAULT NULL,
  `skkp_hari` varchar(255) DEFAULT NULL,
  `skkp_nomor` varchar(255) DEFAULT NULL,
  `undangan_cda_jumlah` int(11) DEFAULT NULL,
  `undangan_cda_tgl` date DEFAULT NULL,
  `undangan_cda_hari` varchar(255) DEFAULT NULL,
  `undangan_cda_nomor` varchar(255) DEFAULT NULL,
  `cda_jumlah` int(11) DEFAULT NULL,
  `cda_tgl` date DEFAULT NULL,
  `cda_hari` varchar(255) DEFAULT NULL,
  `cda_nomor` varchar(255) DEFAULT NULL,
  `pj_jumlah` int(11) DEFAULT NULL,
  `pj_tgl` date DEFAULT NULL,
  `pj_hari` varchar(255) DEFAULT NULL,
  `pj_nomor` varchar(255) DEFAULT NULL,
  `bastl_jumlah` int(11) DEFAULT NULL,
  `bastl_tgl` date DEFAULT NULL,
  `bastl_hari` varchar(255) DEFAULT NULL,
  `bastl_nomor` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

LOCK TABLES `t_pengadaan_detail_pj` WRITE;
/*!40000 ALTER TABLE `t_pengadaan_detail_pj` DISABLE KEYS */;

INSERT INTO `t_pengadaan_detail_pj` (`id`, `id_pengadaan`, `id_metode`, `pembukaan_penawaran_jumlah`, `pembukaan_penawaran_tgl`, `pembukaan_penawaran_hari`, `pembukaan_penawaran_nomor`, `survey_harga_pasar_jumlah`, `survey_harga_pasar_tgl`, `survey_harga_pasar_hari`, `survey_harga_pasar_nomor`, `hps_jumlah`, `hps_tgl`, `hps_hari`, `hps_nomor`, `pengumuman_jumlah`, `pengumuman_tgl`, `pengumuman_hari`, `pengumuman_nomor`, `undangan_aanwijzing_peserta_jumlah`, `undangan_aanwijzing_peserta_tgl`, `undangan_aanwijzing_peserta_hari`, `undangan_aanwijzing_peserta_nomor`, `undangan_aanwijzing_direksi_pekerjaan_jumlah`, `undangan_aanwijzing_direksi_pekerjaan_tgl`, `undangan_aanwijzing_direksi_pekerjaan_hari`, `undangan_aanwijzing_direksi_pekerjaan_nomor`, `aanwijzing_jumlah`, `aanwijzing_tgl`, `aanwijzing_hari`, `aanwijzing_nomor`, `addendum_rks_jumlah`, `addendum_rks_tgl`, `addendum_rks_hari`, `addendum_rks_nomor`, `pemasukan_dok_penawaran_jumlah`, `pemasukan_dok_penawaran_jumlah_dari`, `pemasukan_dok_penawaran_tgl_dari`, `pemasukan_dok_penawaran_tgl`, `pemasukan_dok_penawaran_hari`, `pemasukan_dok_penawaran_hari_dari`, `pemasukan_dok_penawaran_nomor`, `pembukaan_penawaran_sampul_satu_jumlah`, `pembukaan_penawaran_sampul_satu_tgl`, `pembukaan_penawaran_sampul_satu_hari`, `pembukaan_penawaran_sampul_satu_nomor`, `evaluasi_dok_penawaran_sampul_satu_jumlah`, `evaluasi_dok_penawaran_sampul_satu_tgl`, `evaluasi_dok_penawaran_sampul_satu_hari`, `evaluasi_dok_penawaran_sampul_satu_nomor`, `pengumuman_hasil_evaluasi_sampul_satu_jumlah`, `pengumuman_hasil_evaluasi_sampul_satu_tgl`, `pengumuman_hasil_evaluasi_sampul_satu_hari`, `pengumuman_hasil_evaluasi_sampul_satu_nomor`, `pembukaan_penawaran_sampul_dua_jumlah`, `pembukaan_penawaran_sampul_dua_tgl`, `pembukaan_penawaran_sampul_dua_hari`, `pembukaan_penawaran_sampul_dua_nomor`, `evaluasi_dok_penawaran_sampul_dua_jumlah`, `evaluasi_dok_penawaran_sampul_dua_tgl`, `evaluasi_dok_penawaran_sampul_dua_hari`, `evaluasi_dok_penawaran_sampul_dua_nomor`, `pembukaan_dok_penawaran_jumlah`, `pembukaan_dok_penawaran_tgl`, `pembukaan_dok_penawaran_hari`, `pembukaan_dok_penawaran_nomor`, `evaluasi_dok_penawaran_jumlah`, `evaluasi_dok_penawaran_tgl`, `evaluasi_dok_penawaran_hari`, `evaluasi_dok_penawaran_nomor`, `undangan_pembuktian_kualifikasi_jumlah`, `undangan_pembuktian_kualifikasi_tgl`, `undangan_pembuktian_kualifikasi_hari`, `undangan_pembuktian_kualifikasi_nomor`, `pembuktian_kualifikasi_jumlah`, `pembuktian_kualifikasi_tgl`, `pembuktian_kualifikasi_hari`, `pembuktian_kualifikasi_nomor`, `undangan_klarifikasi_dan_nego_penawaran_jumlah`, `undangan_klarifikasi_dan_nego_penawaran_tgl`, `undangan_klarifikasi_dan_nego_penawaran_hari`, `undangan_klarifikasi_dan_nego_penawaran_nomor`, `ba_hasil_klarifikasi_dan_nego_penawaran_jumlah`, `ba_hasil_klarifikasi_dan_nego_penawaran_tgl`, `ba_hasil_klarifikasi_dan_nego_penawaran_hari`, `ba_hasil_klarifikasi_dan_nego_penawaran_nomor`, `laporan_hasil_evaluasi_jumlah`, `laporan_hasil_evaluasi_tgl`, `laporan_hasil_evaluasi_hari`, `laporan_hasil_evaluasi_nomor`, `nd_usulan_penetapan_calon_pemenang_jumlah`, `nd_usulan_penetapan_calon_pemenang_tgl`, `nd_usulan_penetapan_calon_pemenang_hari`, `nd_usulan_penetapan_calon_pemenang_nomor`, `nd_penetapan_calon_pemenang_jumlah`, `nd_penetapan_calon_pemenang_tgl`, `nd_penetapan_calon_pemenang_hari`, `nd_penetapan_calon_pemenang_nomor`, `pengumuman_calon_pemenang_jumlah`, `pengumuman_calon_pemenang_tgl`, `pengumuman_calon_pemenang_hari`, `pengumuman_calon_pemenang_nomor`, `penunjukan_pemenang_jumlah`, `penunjukan_pemenang_tgl`, `penunjukan_pemenang_hari`, `penunjukan_pemenang_nomor`, `skkp_jumlah`, `skkp_tgl`, `skkp_hari`, `skkp_nomor`, `undangan_cda_jumlah`, `undangan_cda_tgl`, `undangan_cda_hari`, `undangan_cda_nomor`, `cda_jumlah`, `cda_tgl`, `cda_hari`, `cda_nomor`, `pj_jumlah`, `pj_tgl`, `pj_hari`, `pj_nomor`, `bastl_jumlah`, `bastl_tgl`, `bastl_hari`, `bastl_nomor`, `created_at`, `updated_at`)
VALUES
	(23,32,0,NULL,NULL,NULL,NULL,1,'2021-01-16','Sabtu','023.BASVY-PL/DAN.02.07/210200/2020',1,'2021-01-17','Minggu','023.HPS-PL/DAN.02.07/210200/2020',1,'2021-01-18','Senin','023.PENGLLNG/DAN.07.01/210200/2020',1,'2021-01-19','Selasa','023.UND/DAN.02.07/210200/2020',1,'2021-01-20','Rabu','023.UND/DAN.02.07/210200/2020',1,'2021-01-21','Kamis','023.BAANWZ/DAN.02.07/210200/2020',1,'2021-01-22','Jumat','023.RKS/DAN.02.07/210200/2020',1,2,'2021-01-24','2021-01-25','Senin','Minggu',NULL,1,'2021-01-26','Selasa','023.BAPPS1/DAN.02.07/210200/2020',1,'2021-01-27','Rabu','023.BAEPS1/DAN.02.07/210200/2020',1,'2021-01-29','Jumat','023.PHES1/DAN.02.07/210200/2020',1,'2021-01-30','Sabtu','023.BAPPS2/DAN.02.07/210200/2020',1,'2021-01-31','Minggu','023.BAEPS2/DAN.02.07/210200/2020',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-02-01','Senin','023.UNDPK/DAN.02.07/210200/2020',1,'2021-02-02','Selasa','023.BAPK/DAN.02.07/210200/2020',1,'2021-02-03','Rabu','023.UNDKTNH/DAN.02.07/210200/2020',1,'2021-02-04','Kamis','023.BAHKTNH/DAN.02.07/210200/2020',1,'2021-02-05','Jumat','023.LHE/DAN.02.07/210200/2020',1,'2021-02-06','Sabtu','023.NDUP/DAN.02.07/210200/2020',1,'2021-02-07','Minggu','023.NDP/DAN.02.07/210200/2020',1,'2021-02-08','Senin','023.PENGHP/DAN.02.07/210200/2020',1,'2021-02-09','Selasa','023.SPPBJ/DAN.02.07/210200/2020',1,'2021-02-10','Rabu','023.K/DAN.02.07/210200/2020',1,'2021-02-11','Kamis','023.UNDCDA/DAN.02.07/210200/2020',1,'2021-02-12','Jumat','023.BACDA/DAN.02.07/210200/2020',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-14 09:00:50','2021-04-06 21:40:18'),
	(24,35,0,1,'2021-01-25','Senin','044.BAPP1/DAN.02.07/210200/2020',1,'2021-01-16',NULL,'044.BASVY-PL/DAN.02.07/210200/2020',1,'2021-01-17','Minggu','044.HPS-PL/DAN.02.07/210200/2020',1,'2021-01-18','Senin','044.PENGLLNG/DAN.07.01/210200/2020',1,'2021-01-19','Selasa','044.UND/DAN.02.07/210200/2020',1,'2021-01-20','Rabu','044.UND/DAN.02.07/210200/2020',1,'2021-01-21','Kamis','044.BAANWZ/DAN.02.07/210200/2020',1,'2021-01-22','Jumat','044.RKS/DAN.02.07/210200/2020',1,1,'2021-01-23','2021-01-24','Minggu','Sabtu',NULL,1,'2021-01-24','Minggu','023.BAPPS1/DAN.02.07/210200/2020',1,'2021-01-25','Senin','023.BAEPS1/DAN.02.07/210200/2020',1,'2021-01-27','Rabu','023.PHES1/DAN.02.07/210200/2020',1,'2021-01-28','Kamis','023.BAPPS2/DAN.02.07/210200/2020',1,'2021-01-29','Jumat','023.BAEPS2/DAN.02.07/210200/2020',NULL,NULL,NULL,NULL,1,'2021-01-26','Selasa','044.BAEP1/DAN.02.07/210200/2020',1,'2021-01-28','Kamis','044.UNDPK/DAN.02.07/210200/2020',1,'2021-01-29','Jumat','044.BAPK/DAN.02.07/210200/2020',1,'2021-01-30','Sabtu','044.UNDKTNH/DAN.02.07/210200/2020',1,'2021-01-31','Minggu','044.BAHKTNH/DAN.02.07/210200/2020',1,'2021-02-01','Senin','044.LHE/DAN.02.07/210200/2020',1,'2021-02-02','Selasa','044.NDUP/DAN.02.07/210200/2020',1,'2021-02-03','Rabu','044.NDP/DAN.02.07/210200/2020',1,'2021-02-04','Kamis','044.PENGHP/DAN.02.07/210200/2020',1,'2021-02-05','Jumat','044.SPPBJ/DAN.02.07/210200/2020',1,'2021-02-06','Sabtu','044.K/DAN.02.07/210200/2020',1,'2021-02-07','Minggu','044.UNDCDA/DAN.02.07/210200/2020',1,'2021-02-08','Senin','044.BACDA/DAN.02.07/210200/2020',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-14 09:00:50','2021-03-09 15:20:26'),
	(25,36,0,1,'2021-01-26','Selasa','034.BAPP1/DAN.02.07/210200/2020',1,'2021-01-16','Sabtu','034.BASVY-PL/DAN.02.07/210200/2020',1,'2021-01-17','Minggu','034.HPS-PL/DAN.02.07/210200/2020',1,'2021-01-18','Senin','034.PENGLLNG/DAN.07.01/210200/2020',1,'2021-01-19','Selasa','034.UND/DAN.02.07/210200/2020',1,'2021-01-20','Rabu','034.UND/DAN.02.07/210200/2020',1,'2021-01-21','Kamis','034.BAANWZ/DAN.02.07/210200/2020',1,'2021-01-22','Jumat','034.RKS/DAN.02.07/210200/2020',1,2,'2021-01-24','2021-01-25','Senin','Minggu',NULL,1,'2021-01-24','Minggu','023.BAPPS1/DAN.02.07/210200/2020',1,'2021-01-25','Senin','023.BAEPS1/DAN.02.07/210200/2020',1,'2021-01-27','Rabu','023.PHES1/DAN.02.07/210200/2020',1,'2021-01-28','Kamis','023.BAPPS2/DAN.02.07/210200/2020',1,'2021-01-29','Jumat','023.BAEPS2/DAN.02.07/210200/2020',NULL,NULL,NULL,NULL,2,'2021-01-28','Kamis','034.BAEP1/DAN.02.07/210200/2020',1,'2021-01-30','Sabtu','023.UNDPK/DAN.02.07/210200/2020',1,'2021-01-31','Minggu','023.BAPK/DAN.02.07/210200/2020',1,'2021-01-30','Sabtu','034.UNDKTNH/DAN.02.07/210200/2020',1,'2021-01-31','Minggu','034.BAHKTNH/DAN.02.07/210200/2020',1,'2021-02-01','Senin','034.LHE/DAN.02.07/210200/2020',1,'2021-02-02','Selasa','034.NDUP/DAN.02.07/210200/2020',1,'2021-02-03','Rabu','034.NDP/DAN.02.07/210200/2020',1,'2021-02-04','Kamis','034.PENGHP/DAN.02.07/210200/2020',1,'2021-02-05','Jumat','034.SPPBJ/DAN.02.07/210200/2020',1,'2021-02-06','Sabtu','034.K/DAN.02.07/210200/2020',1,'2021-02-07','Minggu','034.UNDCDA/DAN.02.07/210200/2020',1,'2021-02-08','Senin','034.BACDA/DAN.02.07/210200/2020',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-14 09:00:50','2021-03-10 08:26:44'),
	(26,37,0,NULL,NULL,NULL,NULL,1,'2021-01-16','Sabtu','023.BASVY-PL/DAN.02.07/210200/2020',1,'2021-01-17','Minggu','023.HPS-PL/DAN.02.07/210200/2020',1,'2021-01-18','Senin','023.PENGLLNG/DAN.07.01/210200/2020',1,'2021-01-19','Selasa','023.UND/DAN.02.07/210200/2020',1,'2021-01-20','Rabu','023.UND/DAN.02.07/210200/2020',1,'2021-01-21','Kamis','023.BAANWZ/DAN.02.07/210200/2020',1,'2021-01-22','Jumat','023.RKS/DAN.02.07/210200/2020',2,1,'2021-01-23','2021-01-25','Senin','Senin',NULL,1,'2021-01-26','Selasa','023.BAPPS1/DAN.02.07/210200/2020',1,'2021-01-27','Rabu','023.BAEPS1/DAN.02.07/210200/2020',1,'2021-01-29','Jumat','023.PHES1/DAN.02.07/210200/2020',1,'2021-01-30','Sabtu','023.BAPPS2/DAN.02.07/210200/2020',1,'2021-01-31','Minggu','023.BAEPS2/DAN.02.07/210200/2020',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-01-30','Sabtu','023.UNDPK/DAN.02.07/210200/2020',1,'2021-01-31','Minggu','023.BAPK/DAN.02.07/210200/2020',1,'2021-02-01','Senin','023.UNDKTNH/DAN.02.07/210200/2020',1,'2021-02-02','Selasa','023.BAHKTNH/DAN.02.07/210200/2020',1,'2021-02-03','Rabu','023.LHE/DAN.02.07/210200/2020',1,'2021-02-04','Kamis','023.NDUP/DAN.02.07/210200/2020',1,'2021-02-05','Jumat','023.NDP/DAN.02.07/210200/2020',1,'2021-02-06','Sabtu','023.PENGHP/DAN.02.07/210200/2020',1,'2021-02-07','Minggu','023.SPPBJ/DAN.02.07/210200/2020',1,'2021-02-08','Senin','023.K/DAN.02.07/210200/2020',1,'2021-02-09','Selasa','023.UNDCDA/DAN.02.07/210200/2020',1,'2021-02-10','Rabu','023.BACDA/DAN.02.07/210200/2020',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-14 09:00:50','2021-03-10 09:18:17');

/*!40000 ALTER TABLE `t_pengadaan_detail_pj` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_pengadaan_detail_spbj
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_pengadaan_detail_spbj`;

CREATE TABLE `t_pengadaan_detail_spbj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengadaan` int(11) NOT NULL DEFAULT '0',
  `id_metode` int(11) NOT NULL DEFAULT '0',
  `rks_jumlah` int(11) DEFAULT NULL,
  `rks_tgl` date DEFAULT NULL,
  `rks_hari` varchar(255) DEFAULT NULL,
  `rks_nomor` varchar(255) DEFAULT NULL,
  `survey_harga_pasar_jumlah` int(11) DEFAULT NULL,
  `survey_harga_pasar_tgl` date DEFAULT NULL,
  `survey_harga_pasar_hari` varchar(255) DEFAULT NULL,
  `survey_harga_pasar_nomor` varchar(255) DEFAULT NULL,
  `hps_jumlah` int(11) DEFAULT NULL,
  `hps_tgl` date DEFAULT NULL,
  `hps_hari` varchar(255) DEFAULT NULL,
  `hps_nomor` varchar(255) DEFAULT NULL,
  `undangan_pengadaan_langsung_jumlah` int(11) DEFAULT NULL,
  `undangan_pengadaan_langsung_tgl` date DEFAULT NULL,
  `undangan_pengadaan_langsung_hari` varchar(255) DEFAULT NULL,
  `undangan_pengadaan_langsung_nomor` varchar(255) DEFAULT NULL,
  `pemasukan_dok_penawaran_jumlah_dari` int(11) DEFAULT NULL,
  `pemasukan_dok_penawaran_jumlah` int(11) DEFAULT NULL,
  `pemasukan_dok_penawaran_tgl_dari` date DEFAULT NULL,
  `pemasukan_dok_penawaran_tgl` date DEFAULT NULL,
  `pemasukan_dok_penawaran_hari_dari` varchar(255) DEFAULT NULL,
  `pemasukan_dok_penawaran_hari` varchar(255) DEFAULT NULL,
  `evaluasi_dok_penawaran_jumlah_dari` int(11) DEFAULT NULL,
  `evaluasi_dok_penawaran_jumlah` int(11) DEFAULT NULL,
  `evaluasi_dok_penawaran_tgl_dari` date DEFAULT NULL,
  `evaluasi_dok_penawaran_tgl` date DEFAULT NULL,
  `evaluasi_dok_penawaran_hari_dari` varchar(255) DEFAULT NULL,
  `evaluasi_dok_penawaran_hari` varchar(255) DEFAULT NULL,
  `evaluasi_dok_penawaran_nomor` varchar(255) DEFAULT NULL,
  `ba_hasil_klarifikasi_dan_nego_penawaran_jumlah` int(11) DEFAULT NULL,
  `ba_hasil_klarifikasi_dan_nego_penawaran_tgl` date DEFAULT NULL,
  `ba_hasil_klarifikasi_dan_nego_penawaran_hari` varchar(255) DEFAULT NULL,
  `ba_hasil_klarifikasi_dan_nego_penawaran_nomor` varchar(255) DEFAULT NULL,
  `spbj_jumlah` int(11) DEFAULT NULL,
  `spbj_tgl` date DEFAULT NULL,
  `spbj_hari` varchar(255) DEFAULT NULL,
  `spbj_nomor` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

LOCK TABLES `t_pengadaan_detail_spbj` WRITE;
/*!40000 ALTER TABLE `t_pengadaan_detail_spbj` DISABLE KEYS */;

INSERT INTO `t_pengadaan_detail_spbj` (`id`, `id_pengadaan`, `id_metode`, `rks_jumlah`, `rks_tgl`, `rks_hari`, `rks_nomor`, `survey_harga_pasar_jumlah`, `survey_harga_pasar_tgl`, `survey_harga_pasar_hari`, `survey_harga_pasar_nomor`, `hps_jumlah`, `hps_tgl`, `hps_hari`, `hps_nomor`, `undangan_pengadaan_langsung_jumlah`, `undangan_pengadaan_langsung_tgl`, `undangan_pengadaan_langsung_hari`, `undangan_pengadaan_langsung_nomor`, `pemasukan_dok_penawaran_jumlah_dari`, `pemasukan_dok_penawaran_jumlah`, `pemasukan_dok_penawaran_tgl_dari`, `pemasukan_dok_penawaran_tgl`, `pemasukan_dok_penawaran_hari_dari`, `pemasukan_dok_penawaran_hari`, `evaluasi_dok_penawaran_jumlah_dari`, `evaluasi_dok_penawaran_jumlah`, `evaluasi_dok_penawaran_tgl_dari`, `evaluasi_dok_penawaran_tgl`, `evaluasi_dok_penawaran_hari_dari`, `evaluasi_dok_penawaran_hari`, `evaluasi_dok_penawaran_nomor`, `ba_hasil_klarifikasi_dan_nego_penawaran_jumlah`, `ba_hasil_klarifikasi_dan_nego_penawaran_tgl`, `ba_hasil_klarifikasi_dan_nego_penawaran_hari`, `ba_hasil_klarifikasi_dan_nego_penawaran_nomor`, `spbj_jumlah`, `spbj_tgl`, `spbj_hari`, `spbj_nomor`, `created_at`, `updated_at`)
VALUES
	(24,34,0,1,'2021-02-19','Jumat','0212.RKS/DAN.01.01/210200/2021',1,'2021-02-20','Sabtu','0212.BASVY-PL/DAN.02.01/210200/2021',1,'2021-02-21','Minggu','0212.HPS-PL/DAN.02.01/210200/2021',1,'2021-02-25','Senin','0212.UND-SP/DAN.02.01/210200/2021',2,1,'2021-02-24','2021-02-25','Rabu','Kamis',1,1,'2021-02-26','2021-02-27','Jumat','Sabtu','0212.BAEP-SP/DAN.02.01/210200/2021',1,'2021-02-28','Minggu','0212.BAHKTNH/DAN.02.01/210200/2021',1,'2021-03-01','Senin','0212.SPBJ/DAN.02.01/210200/2021','2021-02-01 11:16:22','2021-04-13 23:11:17'),
	(25,38,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-03-20 11:41:52','2021-03-20 11:41:52');

/*!40000 ALTER TABLE `t_pengadaan_detail_spbj` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_pengadaan_detail_spk
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_pengadaan_detail_spk`;

CREATE TABLE `t_pengadaan_detail_spk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengadaan` int(11) NOT NULL DEFAULT '0',
  `id_metode` int(11) NOT NULL DEFAULT '0',
  `no_proses_pengadaan` varchar(50) NOT NULL DEFAULT '0',
  `survei_harga_pasar_jumlah` int(11) DEFAULT NULL,
  `survei_harga_pasar_tgl` date DEFAULT NULL,
  `survei_harga_pasar_hari` varchar(255) DEFAULT NULL,
  `survei_harga_pasar_nomor` varchar(255) DEFAULT NULL,
  `hps_jumlah` int(11) DEFAULT NULL,
  `hps_tgl` date DEFAULT NULL,
  `hps_hari` varchar(255) DEFAULT NULL,
  `hps_nomor` varchar(255) DEFAULT NULL,
  `undangan_pengadaan_langsung_jumlah` int(11) DEFAULT NULL,
  `undangan_pengadaan_langsung_tgl` date DEFAULT NULL,
  `undangan_pengadaan_langsung_hari` varchar(255) DEFAULT NULL,
  `undangan_pengadaan_langsung_nomor` varchar(255) DEFAULT NULL,
  `pemasukan_dok_penawaran_jumlah_dari` int(11) DEFAULT NULL,
  `pemasukan_dok_penawaran_jumlah_sd` int(11) DEFAULT NULL,
  `pemasukan_dok_penawaran_tgl_dari` date DEFAULT NULL,
  `pemasukan_dok_penawaran_tgl_sd` date DEFAULT NULL,
  `pemasukan_dok_penawaran_hari_dari` varchar(255) DEFAULT NULL,
  `pemasukan_dok_penawaran_hari_sd` varchar(255) DEFAULT NULL,
  `evaluasi_dokumen_jumlah_dari` int(11) DEFAULT NULL,
  `evaluasi_dokumen_jumlah_sd` int(11) DEFAULT NULL,
  `evaluasi_dokumen_tgl_dari` date DEFAULT NULL,
  `evaluasi_dokumen_tgl_sd` date DEFAULT NULL,
  `evaluasi_dokumen_hari_dari` varchar(255) DEFAULT NULL,
  `evaluasi_dokumen_hari_sd` varchar(255) DEFAULT NULL,
  `evaluasi_dokumen_nomor` varchar(255) DEFAULT NULL,
  `ba_hasil_klarifikasi_jumlah` int(11) DEFAULT NULL,
  `ba_hasil_klarifikasi_tgl` date DEFAULT NULL,
  `ba_hasil_klarifikasi_hari` varchar(255) DEFAULT NULL,
  `ba_hasil_klarifikasi_nomor` varchar(255) DEFAULT NULL,
  `ba_hasil_pengadaan_jumlah` int(11) DEFAULT NULL,
  `ba_hasil_pengadaan_tgl` date DEFAULT NULL,
  `ba_hasil_pengadaan_hari` varchar(255) DEFAULT NULL,
  `ba_hasil_pengadaan_nomor` varchar(255) DEFAULT NULL,
  `nd_usulan_tetap_pemenang_jumlah` int(11) DEFAULT NULL,
  `nd_usulan_tetap_pemenang_tgl` date DEFAULT NULL,
  `nd_usulan_tetap_pemenang_hari` varchar(255) DEFAULT NULL,
  `nd_usulan_tetap_pemenang_nomor` varchar(255) DEFAULT NULL,
  `nd_penetapan_pemenang_jumlah` int(11) DEFAULT NULL,
  `nd_penetapan_pemenang_tgl` date DEFAULT NULL,
  `nd_penetapan_pemenang_hari` varchar(255) DEFAULT NULL,
  `nd_penetapan_pemenang_nomor` varchar(255) DEFAULT NULL,
  `spk_jumlah` int(11) DEFAULT NULL,
  `spk_tgl` date DEFAULT NULL,
  `spk_hari` varchar(255) DEFAULT NULL,
  `spk_nomor` varchar(255) DEFAULT NULL,
  `rks_jumlah` int(11) DEFAULT NULL,
  `rks_tgl` date DEFAULT NULL,
  `rks_hari` varchar(255) DEFAULT NULL,
  `rks_nomor` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

LOCK TABLES `t_pengadaan_detail_spk` WRITE;
/*!40000 ALTER TABLE `t_pengadaan_detail_spk` DISABLE KEYS */;

INSERT INTO `t_pengadaan_detail_spk` (`id`, `id_pengadaan`, `id_metode`, `no_proses_pengadaan`, `survei_harga_pasar_jumlah`, `survei_harga_pasar_tgl`, `survei_harga_pasar_hari`, `survei_harga_pasar_nomor`, `hps_jumlah`, `hps_tgl`, `hps_hari`, `hps_nomor`, `undangan_pengadaan_langsung_jumlah`, `undangan_pengadaan_langsung_tgl`, `undangan_pengadaan_langsung_hari`, `undangan_pengadaan_langsung_nomor`, `pemasukan_dok_penawaran_jumlah_dari`, `pemasukan_dok_penawaran_jumlah_sd`, `pemasukan_dok_penawaran_tgl_dari`, `pemasukan_dok_penawaran_tgl_sd`, `pemasukan_dok_penawaran_hari_dari`, `pemasukan_dok_penawaran_hari_sd`, `evaluasi_dokumen_jumlah_dari`, `evaluasi_dokumen_jumlah_sd`, `evaluasi_dokumen_tgl_dari`, `evaluasi_dokumen_tgl_sd`, `evaluasi_dokumen_hari_dari`, `evaluasi_dokumen_hari_sd`, `evaluasi_dokumen_nomor`, `ba_hasil_klarifikasi_jumlah`, `ba_hasil_klarifikasi_tgl`, `ba_hasil_klarifikasi_hari`, `ba_hasil_klarifikasi_nomor`, `ba_hasil_pengadaan_jumlah`, `ba_hasil_pengadaan_tgl`, `ba_hasil_pengadaan_hari`, `ba_hasil_pengadaan_nomor`, `nd_usulan_tetap_pemenang_jumlah`, `nd_usulan_tetap_pemenang_tgl`, `nd_usulan_tetap_pemenang_hari`, `nd_usulan_tetap_pemenang_nomor`, `nd_penetapan_pemenang_jumlah`, `nd_penetapan_pemenang_tgl`, `nd_penetapan_pemenang_hari`, `nd_penetapan_pemenang_nomor`, `spk_jumlah`, `spk_tgl`, `spk_hari`, `spk_nomor`, `rks_jumlah`, `rks_tgl`, `rks_hari`, `rks_nomor`, `created_at`, `updated_at`)
VALUES
	(20,31,0,'0',1,'2021-01-15','Jumat','023.BASVY-PL/DAN.02.01/210200/2021',1,'2021-01-16','Sabtu','023.HPS-PL/DAN.02.01/210200/2021',1,'2021-01-17','Minggu','023.UND-PL/DAN.02.01/210200/',1,1,'2021-01-18','2021-01-19','Senin','Selasa',1,1,'2021-01-20','2021-01-21','Rabu','Kamis','023.BAEP-PL/DAN.02.01/210200/2021',1,'2021-01-22','Jumat','023.BAHKTNH-PL/DAN.02.01/210200/2021',1,'2021-01-23','Sabtu','023.BAHPL-PL/DAN.02.01/210200/2021',1,'2021-01-24','Minggu','023.NDUP-PL/DAN.02.01/210200/2021',1,'2021-01-25','Senin','023.NDPP-PL/DAN.02.01/210200/2021',1,'2021-01-26','Selasa','023.SPK/DAN.02.01/210200/2021',1,'2021-01-14','Kamis','023.RKS/DAN.01.01/210200/2021','2021-01-12 20:45:03','2021-01-21 07:29:42'),
	(21,33,0,'0',1,'2021-01-22','Jumat','034.BASVY-PL/DAN.02.01/210200/2020',1,'2021-01-23','Sabtu','034.HPS-PL/DAN.02.01/210200/2020',1,'2021-01-24','Minggu','023.UND-PL/DAN.02.01/210200/2020',1,1,'2021-01-25','2021-01-26','Senin','Selasa',1,1,'2021-01-27','2021-01-28','Rabu','Kamis','034.BAEP-PL/DAN.02.01/210200/2020',1,'2021-01-29','Jumat','034.BAHKTNH-PL/DAN.02.01/210200/2020',1,'2021-01-30','Sabtu','034.BAHPL-PL/DAN.02.01/210200/2020',1,'2021-01-31','Minggu','034.NDUP-PL/DAN.02.01/210200/2020',1,'2021-02-01','Senin','034.NDPP-PL/DAN.02.01/210200/2020',1,'2021-02-02','Selasa','034.SPK/DAN.02.01/210200/2020',1,'2021-01-21','Kamis','034.RKS/DAN.01.01/210200/2020','2021-01-18 08:21:47','2021-01-18 15:04:57');

/*!40000 ALTER TABLE `t_pengadaan_detail_spk` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_pengadaan_sipil
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_pengadaan_sipil`;

CREATE TABLE `t_pengadaan_sipil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `t_pengadaan_sipil` WRITE;
/*!40000 ALTER TABLE `t_pengadaan_sipil` DISABLE KEYS */;

INSERT INTO `t_pengadaan_sipil` (`id`, `judul`, `created_at`, `updated_at`)
VALUES
	(13,'Tes','2020-12-14 10:38:50','2020-12-16 14:46:50'),
	(14,'Tes','2020-12-15 11:45:21','2020-12-15 11:45:21');

/*!40000 ALTER TABLE `t_pengadaan_sipil` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_pengadaan_sipil_pekerjaan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_pengadaan_sipil_pekerjaan`;

CREATE TABLE `t_pengadaan_sipil_pekerjaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ips` int(11) DEFAULT NULL,
  `nama_pekerjaan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `t_pengadaan_sipil_pekerjaan` WRITE;
/*!40000 ALTER TABLE `t_pengadaan_sipil_pekerjaan` DISABLE KEYS */;

INSERT INTO `t_pengadaan_sipil_pekerjaan` (`id`, `id_ips`, `nama_pekerjaan`, `created_at`, `updated_at`)
VALUES
	(35,13,'Pekerjaan 1','2020-12-14 10:38:50','2020-12-14 10:38:50'),
	(36,13,'Pekerjaan 2','2020-12-14 10:38:50','2020-12-14 10:38:50'),
	(37,14,'dsfdsfds','2020-12-15 11:45:21','2020-12-15 11:45:21'),
	(38,14,'sfdsfdsf','2020-12-15 11:45:21','2020-12-15 11:45:21'),
	(39,13,'sdfsdfsd','2020-12-16 14:17:57','2020-12-16 14:17:57'),
	(40,13,'fsdfdsf','2020-12-16 14:17:57','2020-12-16 14:17:57');

/*!40000 ALTER TABLE `t_pengadaan_sipil_pekerjaan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_pengadaan_sipil_sub_pekerjaan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_pengadaan_sipil_sub_pekerjaan`;

CREATE TABLE `t_pengadaan_sipil_sub_pekerjaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ips` int(11) DEFAULT NULL,
  `id_pekerjaan` int(11) DEFAULT NULL,
  `id_ips_pekerjaan` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `vol` double DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `t_pengadaan_sipil_sub_pekerjaan` WRITE;
/*!40000 ALTER TABLE `t_pengadaan_sipil_sub_pekerjaan` DISABLE KEYS */;

INSERT INTO `t_pengadaan_sipil_sub_pekerjaan` (`id`, `id_ips`, `id_pekerjaan`, `id_ips_pekerjaan`, `nama`, `vol`, `harga_jual`, `total_harga`, `created_at`, `updated_at`)
VALUES
	(26,13,1,35,'Tes',23,324324,7459452,'2020-12-15 11:46:01','2020-12-15 11:46:01'),
	(27,13,1,35,'Tes',23,234234,5387382,'2020-12-15 11:46:01','2020-12-15 11:46:01'),
	(28,13,1,35,'Tes',23,32434,745982,'2020-12-15 11:46:01','2020-12-15 11:46:01'),
	(29,13,1,36,'Tes',23,34543,794489,'2020-12-16 10:23:22','2020-12-16 10:23:22'),
	(30,13,1,36,'Tes',23,345345,7942935,'2020-12-16 10:23:22','2020-12-16 10:23:22'),
	(31,13,1,36,'Tes',23,345345,7942935,'2020-12-16 10:23:22','2020-12-16 10:23:22'),
	(32,13,1,36,'Tes',23,34534,794282,'2020-12-16 10:23:22','2020-12-16 10:23:22'),
	(39,13,1,40,'Tes',23,23432432,538945936,'2021-01-05 14:39:46','2021-01-05 14:39:46'),
	(40,13,1,40,'Tes',23,23432,538936,'2021-01-05 14:39:46','2021-01-05 14:39:46'),
	(41,14,1,37,'Tes',23,324324,7459452,'2021-01-05 14:41:21','2021-01-05 14:41:21'),
	(42,14,1,37,'Tes',23,234324,5389452,'2021-01-05 14:41:21','2021-01-05 14:41:21');

/*!40000 ALTER TABLE `t_pengadaan_sipil_sub_pekerjaan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_perusahaan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_perusahaan`;

CREATE TABLE `t_perusahaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `pimpinan` varchar(50) NOT NULL,
  `notaris` text NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `kantor_cabang` varchar(255) NOT NULL,
  `rekening` varchar(255) NOT NULL,
  `npwp` varchar(255) NOT NULL,
  `sebutan_jabatan` varchar(255) NOT NULL,
  `bentuk_perusahaan` varchar(255) NOT NULL,
  `telpon` varchar(255) NOT NULL,
  `faksimili` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `t_perusahaan` WRITE;
/*!40000 ALTER TABLE `t_perusahaan` DISABLE KEYS */;

INSERT INTO `t_perusahaan` (`id`, `nama`, `pimpinan`, `notaris`, `alamat`, `bank`, `kantor_cabang`, `rekening`, `npwp`, `sebutan_jabatan`, `bentuk_perusahaan`, `telpon`, `faksimili`, `foto`, `created_at`, `updated_at`)
VALUES
	(5,'dsfdsfdsf','sdfsdf','sfdsf','sdfdsfds','sdfdsfds','sdfdsf','234324324','3243243243','dsfdsfdsf','sdfdsfdsfds','234324','324432','[\"padangpanjangtimur.png\",\"photo_2020-11-25_10-40-28.png\"]','2021-02-01 15:50:44','2021-02-01 15:50:44'),
	(6,'gbgf','dsdsds','dsdsd','qqdsdsd','dsdsds','dsdsds','23292','23232','asdsdf','sdsd','','','[\"logo.png\",\"logo padang panjang.png\"]','2020-12-01 14:40:27','2020-12-01 14:40:27'),
	(7,'ewrewrew','erwrewr','ewrewrewr','ewrewrewr','ewrwerewr','werwerwe','erwer','23422','dfdsfds','sdfsdf','234234','234324','[\"7313.jpg\",\"padangpanjangtimur.png\"]','2021-02-01 11:36:46','2021-02-01 11:36:46');

/*!40000 ALTER TABLE `t_perusahaan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_userakses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_userakses`;

CREATE TABLE `t_userakses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengadaan` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `t_userakses` WRITE;
/*!40000 ALTER TABLE `t_userakses` DISABLE KEYS */;

INSERT INTO `t_userakses` (`id`, `id_pengadaan`, `id_user`, `role`, `created_at`, `updated_at`)
VALUES
	(44,31,20,'Pengawas','2021-01-14 10:39:24','2021-01-14 10:39:24'),
	(45,31,22,'Pengawas','2021-01-14 10:39:28','2021-01-14 10:39:28'),
	(49,33,20,'Pengawas','2021-01-18 08:49:44','2021-01-18 08:49:44'),
	(50,33,22,'Pengawas','2021-01-18 08:50:14','2021-01-18 08:50:14'),
	(51,33,19,'Pengawas','2021-01-18 08:50:20','2021-01-18 08:50:20'),
	(52,31,19,'Pengawas','2021-01-18 08:51:34','2021-01-18 08:51:34'),
	(57,32,20,'Pengawas','2021-01-18 08:55:28','2021-01-18 08:55:28');

/*!40000 ALTER TABLE `t_userakses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `role_user` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `name`, `password`, `role`, `role_user`, `jabatan`, `no_hp`, `created_at`, `updated_at`)
VALUES
	(1,'admin','Admin','$2y$10$Hj.tbfkmMGGGudVAGG7/eO7/SnoaW/F.OAb/upA2p78Xla6IaDexS','Admin','Admin','Admin','+6285272993360','2021-01-12 22:12:40','2020-10-13 21:03:58'),
	(18,'dhaniel','M. Dhaniel','$2y$10$wWTO1azQJibVIZrOLUjEtO3Jt/kM2TZxRoyH/oOZN8feXRwaO2jBG','Direksi','Direksi','Direksi','+6285272993360','2021-01-12 22:13:53','2020-11-17 12:15:33'),
	(19,'wirman','Wirman Mitra','$2y$10$mPrmOX5qM4nWIX.GJZ5pguz5ug7ZqxLZoc/nVsh/l9VkSQiuJkUDu','Pengawas','Pengawas','Pengawas','+6285272993360','2021-01-12 22:13:55','2020-11-17 12:37:30'),
	(20,'alben','Alben F Dilay','$2y$10$32xHmSZOB/HhlmAONHW59uay2.Y9PbCH3xHA4jFooTCmnr2bAUeL2','Pengawas','Pengawas','Pengawas','+6285272993360','2021-01-12 22:13:58','2020-11-17 12:38:14'),
	(21,'anton','Anton Gordon Sitohang','$2y$10$YYP7FRTQNiMeL0x/FY8G/.aOhrIkpMQHRG1U8831/TS3w9mrR5gw2','Direksi','Direksi','Direksi','+6285272993360','2021-01-12 22:14:00','2020-11-17 12:38:33'),
	(22,'dhani','Dhani Irwansyah','$2y$10$tl65LhEEQkKfHqCOdWi3jeYX9igUMXMmIYu3mHY0Lp16aBBh6L2Qi','Pengawas','Pengawas','Pengawas','+6285272993360','2021-01-12 22:14:04','2020-11-17 12:38:49'),
	(23,'agus','Agus Cahyono','$2y$10$xgWMD2SdVa8gPMnuRVamv.nd6Bgzk6JnEEuTkrEjmOaJzhOv6HsVC','Direksi','Direksi','Direksi','+6285272993360','2021-01-18 08:55:14','2021-01-14 09:53:34'),
	(24,'wahyu','Wahyu Mustapa','$2y$10$PKWdHNQB5.5rK5Ohxhrp5.8PBydFTmMhdcjA5tvdxS6WKWa8uHgSu','Pengawas','Pengawas','Pengawas','+6285272993360','2021-01-12 22:14:08','2020-11-17 12:40:41'),
	(25,'12313213213','Rizki','$2y$10$osov6lPh2eV6rOx1tbL3P.WjP1YPpI5cv/XbqFH3Bz5XxLHnsWgJe',NULL,'Pengawas','Tim Mutu','+6285272993360','2021-01-14 09:53:12','2021-01-14 09:53:12');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

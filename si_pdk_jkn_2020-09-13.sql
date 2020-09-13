# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.26)
# Database: si_pdk_jkn
# Generation Time: 2020-09-13 10:01:22 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tbl_dt_keluarga
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_dt_keluarga`;

CREATE TABLE `tbl_dt_keluarga` (
  `nik_kk` varchar(18) DEFAULT NULL,
  `nm_kpl_keluarga` varchar(30) DEFAULT NULL,
  `alamat` text,
  `rt_rw` varchar(8) DEFAULT NULL,
  `kelurahan` varchar(20) DEFAULT NULL,
  `kecamatan` varchar(20) DEFAULT NULL,
  `kota_kab` varchar(15) DEFAULT NULL,
  `provinsi` varchar(12) DEFAULT NULL,
  `nm_anggota_keluarga` varchar(30) DEFAULT NULL,
  `nik_ktp` varchar(18) DEFAULT NULL,
  `jenis_kelamin` varchar(12) DEFAULT NULL,
  `tmpt_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` varchar(12) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `pendidikan` varchar(20) DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  `gol_darah` char(3) DEFAULT NULL,
  `sts_perkawinan` varchar(15) DEFAULT NULL,
  `tgl_perkawinan` varchar(12) DEFAULT NULL,
  `sts_hub_keluarga` varchar(20) DEFAULT NULL,
  `kewarganegaraan` char(5) DEFAULT NULL,
  `no_paspor` varchar(20) DEFAULT NULL,
  `no_kitap` varchar(20) DEFAULT NULL,
  `nm_ayah` varchar(30) DEFAULT NULL,
  `nm_ibu` varchar(30) DEFAULT NULL,
  `tgl_kk_dikeluarkan` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `tbl_dt_keluarga` WRITE;
/*!40000 ALTER TABLE `tbl_dt_keluarga` DISABLE KEYS */;

INSERT INTO `tbl_dt_keluarga` (`nik_kk`, `nm_kpl_keluarga`, `alamat`, `rt_rw`, `kelurahan`, `kecamatan`, `kota_kab`, `provinsi`, `nm_anggota_keluarga`, `nik_ktp`, `jenis_kelamin`, `tmpt_lahir`, `tgl_lahir`, `agama`, `pendidikan`, `pekerjaan`, `gol_darah`, `sts_perkawinan`, `tgl_perkawinan`, `sts_hub_keluarga`, `kewarganegaraan`, `no_paspor`, `no_kitap`, `nm_ayah`, `nm_ibu`, `tgl_kk_dikeluarkan`)
VALUES
	('4116020803880001','ARIF','KOMP.PERUMAHAN PERMATA DOYO NO.5	','007/001','KAMP.DOYO LAMA','DIST.WAIBU','KAB.JAYAPURA','PAPUA','ARIF','4006020803880003','LAKI-LAKI','MAKASSAR','24-04-1979','ISLAM','SLTA/SEDERAJAT','SWASTA','AB','KAWIN TERCATAT','10-06-2015','KEPALA KELUARGA','WNI','-','-','BAMBANG','HARTATI','12-09-2015'),
	('4116020803880001','ARIF','KOMP.PERUMAHAN PERMATA DOYO NO.5	','007/001','KAMP.DOYO LAMA','DIST.WAIBU','KAB.JAYAPURA','PAPUA','APRILIA','4007020803880007','PEREMPUAN','SENTANI','02-04-1992','ISLAM','SLTA/SEDERAJAT','IBU RUMAH TANGGA','AB','KAWIN TERCATAT','10-06-2015','ISTRI','WNI','-','-','JAYA','INDAH','12-09-2015'),
	('3116020803880003','AGUS','JL.WAENA-SENTANI NO.12B','002/002','KAMP.NENDALI','DIST.SENTANI TIMUR','KAB.JAYAPURA','PAPUA','AGUS','2001020803880006','LAKI-LAKI','SENTANI','17-08-1982','KRISTEN','SLTA/SEDERAJAT','SWASTA','B','KAWIN TERCATAT','18-12-2010','KEPALA KELUARGA','WNI','-','-','ISAK','LIA','05-02-2011'),
	('3116020803880003','AGUS','JL.WAENA-SENTANI NO.12B','002/002','KAMP.NENDALI','DIST.SENTANI TIMUR','KAB.JAYAPURA','PAPUA','LIDIA','-','PEREMPUAN','SENTANI','26-11-1987','KRISTEN','SLTA/SEDERAJAT','IBU RUMAH TANGGA','O','KAWIN TERCATAT','18-12-2010','ISTRI','WNI','-','-','FERI','LIDIA','05-02-2011');

/*!40000 ALTER TABLE `tbl_dt_keluarga` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_dt_penduduk
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_dt_penduduk`;

CREATE TABLE `tbl_dt_penduduk` (
  `nik_ktp` varchar(18) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `tmpt_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` varchar(12) DEFAULT NULL,
  `jenis_kelamin` varchar(12) DEFAULT NULL,
  `gol_darah` char(3) DEFAULT NULL,
  `alamat` text,
  `rt_rw` varchar(8) DEFAULT NULL,
  `kelurahan` varchar(20) DEFAULT NULL,
  `kecamatan` varchar(20) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `sts_perkawinan` varchar(15) DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  `kewarganegaraan` char(5) DEFAULT NULL,
  `masa_berlaku` char(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `tbl_dt_penduduk` WRITE;
/*!40000 ALTER TABLE `tbl_dt_penduduk` DISABLE KEYS */;

INSERT INTO `tbl_dt_penduduk` (`nik_ktp`, `nama`, `tmpt_lahir`, `tgl_lahir`, `jenis_kelamin`, `gol_darah`, `alamat`, `rt_rw`, `kelurahan`, `kecamatan`, `agama`, `sts_perkawinan`, `pekerjaan`, `kewarganegaraan`, `masa_berlaku`)
VALUES
	('1001020803880005','ABDUL','JAYAPURA','07-06-1981','LAKI-LAKI','A','JL.WAENA-SENTANI NO.11A','001/001','KAMP.NENDALI','DIST.SENTANI TIMUR','ISLAM','KAWIN','SWASTA','WNI','SEUMUR HIDUP'),
	('2001020803880006','AGUS','SENTANI','17-08-1982','LAKI-LAKI','B','JL.WAENA-SENTANI NO.12B','002/002','KAMP.NENDALI','DIST.SENTANI TIMUR','KRISTEN','KAWIN','SWASTA','WNI','17-08-2020'),
	('3002020803880006','FRANS','SENTANI','06-02-1989','LAKI-LAKI','O','JL. RAYA PASAR LAMA YAHIM','003/001','KAMP.YAHIM','DIST.SENTANI','KATHOLIK','BELUM KAWIN','KARYAWAN SWASTA','WNI','SEUMUR HIDUP'),
	('3003020803880008','SUPRIYANI','SURABAYA','06-07-1985','PEREMPUAN','A','JL. RAYA PASAR LAMA YAHIM','003/002','KAMP.YAHIM','DIST.SENTANI','ISLAM','KAWIN','SWASTA','WNI','SEUMUR HIDUP'),
	('4005020803880002','RISKA','JAYAPURA','20-11-1990','PEREMPUAN','O','KOMP.PERUMAHAN DAMAI DOYO','001/001','KAMP.DOYO BARU','DIST.WAIBU','ISLAM','BELUM KAWIN','KARYAWAN SWASTA','WNI','SEUMUR HIDUP'),
	('4006020803880003','ARIF','MAKASSAR','24-04-1979','LAKI-LAKI','AB','KOMP.PERUMAHAN PERMATA DOYO NO.5','007/001','KAMP.DOYO LAMA','DIST.WAIBU','ISLAM','KAWIN','SWASTA','WNI','SEUMUR HIDUP'),
	('4007020803880007','APRILIA','SENTANI','02-04-1992','PEREMPUAN','AB','KOMP.PERUMAHAN PERMATA DOYO NO.5','007/001','KAMP.DOYO LAMA','DIST.WAIBU','ISLAM','KAWIN','IBU RUMAH TANGGA','WNI','SEUMUR HIDUP'),
	('5005020803880005','ROY','JAYAPURA','10-10-1985','LAKI-LAKI','O','KAMPUNG SOSIRI','--/--','KAMP.SOSIRI','DIST.WAIBU','KRISTEN','BELUM KAWIN','-','WNI','SEUMUR HIDUP');

/*!40000 ALTER TABLE `tbl_dt_penduduk` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_dt_peserta_apb
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_dt_peserta_apb`;

CREATE TABLE `tbl_dt_peserta_apb` (
  `nik_anggota` varchar(18) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `nik_ktp` varchar(18) DEFAULT NULL,
  `jenis_bantuan_diterima` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `tbl_dt_peserta_apb` WRITE;
/*!40000 ALTER TABLE `tbl_dt_peserta_apb` DISABLE KEYS */;

INSERT INTO `tbl_dt_peserta_apb` (`nik_anggota`, `nama`, `nik_ktp`, `jenis_bantuan_diterima`)
VALUES
	('1001020803880005','Agus','1001020803880005','PKH'),
	('1001020803880006','Bayu','1001020803880006','Sembako'),
	('1001020803880001','Candra','1001020803880001','KIS'),
	('1001020803880002','Deni','1001020803880002','KIP');

/*!40000 ALTER TABLE `tbl_dt_peserta_apb` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_dt_peserta_jkn
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_dt_peserta_jkn`;

CREATE TABLE `tbl_dt_peserta_jkn` (
  `nik_jkn` varchar(18) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `tgl_lahir` varchar(12) DEFAULT NULL,
  `nik_ktp` varchar(18) DEFAULT NULL,
  `faskes_tingkat` char(3) DEFAULT NULL,
  `nama_faskes` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `tbl_dt_peserta_jkn` WRITE;
/*!40000 ALTER TABLE `tbl_dt_peserta_jkn` DISABLE KEYS */;

INSERT INTO `tbl_dt_peserta_jkn` (`nik_jkn`, `nama`, `tgl_lahir`, `nik_ktp`, `faskes_tingkat`, `nama_faskes`)
VALUES
	('100090807011','ARIF','24-04-1979','4006020803880003','II','SENTANI'),
	('100090807022','APRILIA','02-04-1992','4007020803880007','II','SENTANI'),
	('100090807033','FRANS','06-02-1989','3002020803880006','II','SENTANI');

/*!40000 ALTER TABLE `tbl_dt_peserta_jkn` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL DEFAULT '',
  `nama` varchar(100) NOT NULL DEFAULT '',
  `image` text,
  `telepon` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT '',
  `alamat` varchar(255) DEFAULT NULL,
  `password` varchar(191) NOT NULL DEFAULT '',
  `level` tinyint(3) unsigned NOT NULL,
  `token` varchar(191) DEFAULT '',
  `last_login` datetime DEFAULT NULL,
  `total_login` int(10) DEFAULT '0',
  `is_active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `uq_username` (`username`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;

INSERT INTO `tbl_user` (`id`, `username`, `nama`, `image`, `telepon`, `email`, `alamat`, `password`, `level`, `token`, `last_login`, `total_login`, `is_active`, `created_at`, `updated_at`, `created_by`, `updated_by`)
VALUES
	(1,'superuser','SUPERUSER','superuser.jpeg','027434','superuser@mail.com','asd','$2y$10$3/shGiewdcdq1MNDFIq8EuCNg86SEdZB7IalUEFiJlSz8nhq0t.i2',0,'55ac8a5ad4817eb480b1d4fb2c483f0a937eb6f720b49a07557548ce912656f6','2020-09-13 17:00:53',100,1,'2018-08-01 17:01:08','2020-08-03 10:48:34',NULL,NULL);

/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

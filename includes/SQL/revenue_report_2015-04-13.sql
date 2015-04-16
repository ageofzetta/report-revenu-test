# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.33-log)
# Database: revenue_report
# Generation Time: 2015-04-14 02:15:40 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table clients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `client` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;

INSERT INTO `clients` (`id`, `client`)
VALUES
	(1,'Acme'),
	(2,'Apple'),
	(3,'Microsoft');

/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `client` varchar(255) NOT NULL DEFAULT '',
  `product` text NOT NULL,
  `total` float NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `client`, `product`, `total`, `date`)
VALUES
	(1,'Acme','The Matrix Trilogy 1',30,'2015-02-01 00:00:00'),
	(2,'Acme','The Matrix Trilogy 2',31,'2015-02-02 00:00:00'),
	(3,'Acme','The Matrix Trilogy 3',32,'2015-02-03 00:00:00'),
	(4,'Acme','The Matrix Trilogy 4',33,'2015-02-04 00:00:00'),
	(5,'Acme','The Matrix Trilogy 5',34,'2015-02-05 00:00:00'),
	(6,'Acme','The Matrix Trilogy 6',35,'2015-02-06 00:00:00'),
	(7,'Acme','The Matrix Trilogy 7',36,'2015-02-07 00:00:00'),
	(8,'Acme','The Matrix Trilogy 8',37,'2015-02-08 00:00:00'),
	(9,'Acme','The Matrix Trilogy 9',38,'2015-02-09 00:00:00'),
	(10,'Acme','The Matrix Trilogy 10',39,'2015-02-10 00:00:00'),
	(11,'Acme','The Matrix Trilogy 11',40,'2015-02-11 00:00:00'),
	(12,'Acme','The Matrix Trilogy 12',41,'2015-02-12 00:00:00'),
	(13,'Acme','The Matrix Trilogy 13',42,'2015-02-13 00:00:00'),
	(14,'Acme','The Matrix Trilogy 14',43,'2015-02-14 00:00:00'),
	(15,'Acme','The Matrix Trilogy 15',44,'2015-02-15 00:00:00'),
	(16,'Acme','The Matrix Trilogy 16',45,'2015-02-16 00:00:00'),
	(17,'Acme','The Matrix Trilogy 17',46,'2015-02-17 00:00:00'),
	(18,'Acme','The Matrix Trilogy 18',47,'2015-02-18 00:00:00'),
	(19,'Acme','The Matrix Trilogy 19',48,'2015-02-19 00:00:00'),
	(20,'Microsoft','Macbook Air 1',1200,'2015-02-19 00:00:00'),
	(21,'Microsoft','Macbook Air 2',1201,'2015-02-20 00:00:00'),
	(22,'Microsoft','Macbook Air 3',1202,'2015-02-21 00:00:00'),
	(23,'Microsoft','Macbook Air 4',1203,'2015-02-22 00:00:00'),
	(24,'Microsoft','Macbook Air 5',1204,'2015-02-23 00:00:00'),
	(25,'Microsoft','Macbook Air 6',1205,'2015-02-24 00:00:00'),
	(26,'Microsoft','Macbook Air 7',1206,'2015-02-25 00:00:00'),
	(27,'Microsoft','Macbook Air 8',1207,'2015-02-26 00:00:00'),
	(28,'Microsoft','Macbook Air 9',1208,'2015-02-27 00:00:00'),
	(29,'Microsoft','Macbook Air 10',1209,'2015-02-28 00:00:00'),
	(30,'Microsoft','Macbook Air 11',1210,'2015-03-01 00:00:00'),
	(31,'Microsoft','Macbook Air 12',1211,'2015-03-02 00:00:00'),
	(32,'Microsoft','Macbook Air 13',1212,'2015-03-03 00:00:00'),
	(33,'Microsoft','Macbook Air 14',1213,'2015-03-04 00:00:00'),
	(34,'Microsoft','Macbook Air 15',1214,'2015-03-05 00:00:00'),
	(35,'Microsoft','Macbook Air 16',1215,'2015-03-06 00:00:00'),
	(36,'Microsoft','Macbook Air 17',1216,'2015-03-07 00:00:00'),
	(37,'Microsoft','Macbook Air 18',1217,'2015-03-08 00:00:00'),
	(38,'Microsoft','Macbook Air 19',1218,'2015-03-09 00:00:00'),
	(39,'Apple','Server Rack',10000,'2015-02-10 00:00:00'),
	(40,'Apple','Server Farm',100000,'2015-02-28 00:00:00'),
	(41,'Apple','Watch',399,'2015-03-09 00:00:00');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.4.22-MariaDB : Database - projects1_elitereviser
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`projects1_elitereviser` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `projects1_elitereviser`;

/*Table structure for table `accepted_jobs` */

DROP TABLE IF EXISTS `accepted_jobs`;

CREATE TABLE `accepted_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_number` bigint(20) NOT NULL,
  `editor_id` bigint(20) NOT NULL,
  `accepted_date` date NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `editor_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completed_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0:Pending, 1:Process, 2:Rejected,3:Completed by editor',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `accepted_jobs` */

insert  into `accepted_jobs`(`id`,`order_number`,`editor_id`,`accepted_date`,`document`,`editor_note`,`completed_date`,`status`,`created_at`,`updated_at`) values (1,100005,22,'2022-01-05',NULL,NULL,'2022-01-05',3,'2022-01-05 17:52:29','2022-01-05 18:30:13'),(2,100006,22,'2022-01-19',NULL,NULL,NULL,1,'2022-01-20 01:50:52','2022-01-20 01:50:52'),(3,100001,18,'2022-01-28',NULL,NULL,NULL,1,'2022-01-29 00:53:01','2022-01-29 00:53:01');

/*Table structure for table `chats` */

DROP TABLE IF EXISTS `chats`;

CREATE TABLE `chats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_number` bigint(255) DEFAULT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'customer, editor',
  `sender_id` bigint(20) NOT NULL,
  `reciever_id` bigint(20) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active, 0=in-active',
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `chats` */

insert  into `chats`(`id`,`order_number`,`user`,`sender_id`,`reciever_id`,`message`,`attachment`,`date`,`status`,`is_read`,`created_at`,`updated_at`) values (1,100005,'customer',1,25,'<p>hi</p>',NULL,'2022-01-19',1,0,'2022-01-19 12:05:21','2022-01-19 12:05:21'),(2,100005,'customer',1,25,'<p>Hello</p>',NULL,'2022-01-19',1,0,'2022-01-19 12:05:33','2022-01-19 12:05:33'),(3,100005,'customer',1,25,'<p>How are you bro?</p>',NULL,'2022-01-19',1,0,'2022-01-19 12:05:41','2022-01-19 12:05:41'),(4,100005,'customer',25,1,'I am all right sir, How about you?',NULL,'2022-01-19',1,0,'2022-01-19 12:10:14','2022-01-19 12:10:14'),(5,100005,'customer',1,25,'<p>I fine how is going your life bro?</p>',NULL,'2022-01-19',1,0,'2022-01-19 12:10:36','2022-01-19 12:10:36'),(6,100005,'customer',1,25,'<p>Greate job.</p>',NULL,'2022-01-19',1,0,'2022-01-19 12:24:52','2022-01-19 12:24:52'),(7,100005,'customer',25,1,'g',NULL,'2022-01-19',1,0,'2022-01-19 12:25:46','2022-01-19 12:25:46'),(8,100005,'customer',25,1,'Teste',NULL,'2022-01-19',1,0,'2022-01-19 12:33:09','2022-01-19 12:33:09'),(9,100005,'customer',25,1,'Teste',NULL,'2022-01-19',1,0,'2022-01-19 12:33:34','2022-01-19 12:33:34'),(10,100005,'customer',25,1,'d',NULL,'2022-01-19',1,0,'2022-01-19 12:58:41','2022-01-19 12:58:41'),(11,100005,'customer',25,1,'hi',NULL,'2022-01-19',1,0,'2022-01-19 12:58:59','2022-01-19 12:58:59'),(12,100005,'customer',25,1,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',NULL,'2022-01-19',1,0,'2022-01-19 12:59:05','2022-01-19 12:59:05'),(13,100005,'customer',1,25,'<p>tested</p>',NULL,'2022-01-19',1,0,'2022-01-19 13:04:12','2022-01-19 13:04:12'),(14,100005,'customer',25,1,'tedddd',NULL,'2022-01-19',1,0,'2022-01-19 13:05:46','2022-01-19 13:05:46'),(15,100005,'customer',1,25,'<p>hiiiiiiiiiiiiiiiiii?</p>',NULL,'2022-01-19',1,0,'2022-01-19 13:06:11','2022-01-19 13:06:11'),(16,100005,'customer',25,1,'Helloooooooooooooooooooo?',NULL,'2022-01-19',1,0,'2022-01-19 13:09:01','2022-01-19 13:09:01'),(17,100005,'customer',1,25,'<p>What is this????</p>',NULL,'2022-01-19',1,0,'2022-01-19 13:09:15','2022-01-19 13:09:15'),(18,100005,'customer',25,1,'This is your problem...!!!',NULL,'2022-01-19',1,0,'2022-01-19 13:09:37','2022-01-19 13:09:37'),(19,100005,'customer',1,25,'<p>Here it is...!</p>','1642615806.docx','2022-01-19',1,0,'2022-01-19 13:10:06','2022-01-19 13:10:06'),(20,100005,'customer',25,1,'Correct','1642617852.png','2022-01-19',1,0,'2022-01-19 13:44:12','2022-01-19 13:44:12'),(21,100005,'editor',1,22,'<p>tested</p>',NULL,'2022-01-19',1,0,'2022-01-19 14:16:54','2022-01-19 14:16:54'),(22,100005,'editor',1,22,'<p>hi editor</p>',NULL,'2022-01-19',1,0,'2022-01-19 14:17:07','2022-01-19 14:17:07'),(23,100005,'customer',22,1,'<p>testedddddd</p>',NULL,'2022-01-19',1,0,'2022-01-19 14:41:10','2022-01-19 14:41:10'),(24,100005,'customer',22,1,'<p>testedddd</p>',NULL,'2022-01-19',1,0,'2022-01-19 14:42:08','2022-01-19 14:42:08'),(25,100005,'editor',22,1,'<p>gg</p>',NULL,'2022-01-19',1,0,'2022-01-19 14:44:13','2022-01-19 14:44:13'),(26,100005,'editor',1,22,'<p>Jani is project ka kiyaa kiya????????????????</p>',NULL,'2022-01-19',1,0,'2022-01-19 14:48:47','2022-01-19 14:48:47'),(27,100005,'editor',22,1,'<p>Kon sa project??????????????????</p>',NULL,'2022-01-19',1,0,'2022-01-19 14:48:59','2022-01-19 14:48:59'),(28,100005,'editor',1,22,'<p>Ye project</p>','1642621753.docx','2022-01-19',1,0,'2022-01-19 14:49:13','2022-01-19 14:49:13'),(29,100005,'editor',22,1,'<p>Ye to complete kar diya na ye lo</p>','1642621777.png','2022-01-19',1,0,'2022-01-19 14:49:37','2022-01-19 14:49:37'),(30,100006,'customer',1,26,'<p>Hi piter</p>',NULL,'2022-01-19',1,0,'2022-01-20 01:51:23','2022-01-20 01:51:23'),(31,100006,'customer',26,1,'Hello',NULL,'2022-01-19',1,0,'2022-01-20 01:51:36','2022-01-20 01:51:36'),(32,100006,'editor',1,22,'<p>ih murray</p>',NULL,'2022-01-19',1,0,'2022-01-20 01:51:37','2022-01-20 01:51:37'),(33,100006,'editor',22,1,'<p>hello</p>\r\n<p>&nbsp;</p>',NULL,'2022-01-19',1,0,'2022-01-20 01:51:51','2022-01-20 01:51:51'),(34,100006,'editor',22,1,'<p>&nbsp; bb&nbsp; &nbsp; &nbsp;</p>',NULL,'2022-01-19',1,0,'2022-01-20 01:52:07','2022-01-20 01:52:07'),(35,100006,'editor',22,1,'<p>hello&nbsp; &nbsp;</p>\r\n<p>&nbsp;</p>',NULL,'2022-01-19',1,0,'2022-01-20 01:52:18','2022-01-20 01:52:18'),(36,100006,'editor',22,1,'<p>dsdfsdfd</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>',NULL,'2022-01-19',1,0,'2022-01-20 01:52:35','2022-01-20 01:52:35'),(37,100006,'editor',22,1,'<p>fgsdf</p>\r\n<p>f</p>\r\n<p>&nbsp;</p>\r\n<p>dfg</p>\r\n<p>dfgd</p>\r\n<p>fgdf</p>\r\n<p>gdf</p>\r\n<p>g</p>',NULL,'2022-01-19',1,0,'2022-01-20 01:52:43','2022-01-20 01:52:43'),(38,100006,'editor',22,1,'<p>fghfg</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>',NULL,'2022-01-19',1,0,'2022-01-20 01:53:03','2022-01-20 01:53:03'),(39,100006,'customer',1,26,'<p>tsting d</p>',NULL,'2022-01-19',1,0,'2022-01-20 01:54:08','2022-01-20 01:54:08'),(40,100006,'customer',26,1,'great',NULL,'2022-01-19',1,0,'2022-01-20 01:54:40','2022-01-20 01:54:40'),(41,100006,'customer',1,26,'<p>Hello Femi.&nbsp;</p>',NULL,'2022-01-19',1,0,'2022-01-20 04:00:08','2022-01-20 04:00:08'),(42,100006,'customer',1,26,'<p>Hello.</p>',NULL,'2022-01-19',1,0,'2022-01-20 04:01:14','2022-01-20 04:01:14'),(43,100006,'customer',1,26,'<p>Hi</p>',NULL,'2022-01-19',1,0,'2022-01-20 04:56:41','2022-01-20 04:56:41'),(44,100006,'editor',1,22,'<p>hi</p>',NULL,'2022-01-19',1,0,'2022-01-20 04:57:43','2022-01-20 04:57:43'),(45,100001,'customer',1,25,'<p>hi</p>',NULL,'2022-01-20',1,0,'2022-01-20 05:07:28','2022-01-20 05:07:28'),(46,100001,'customer',1,25,'<p>when are we going?</p>',NULL,'2022-01-20',1,0,'2022-01-20 05:10:21','2022-01-20 05:10:21'),(47,100007,'customer',11,1,'Testing',NULL,'2022-01-26',1,0,'2022-01-26 19:06:39','2022-01-26 19:06:39'),(48,100007,'customer',11,1,'working',NULL,'2022-01-26',1,0,'2022-01-26 19:06:55','2022-01-26 19:06:55'),(49,100007,'customer',1,11,'<p>Testing</p>',NULL,'2022-01-26',1,0,'2022-01-26 20:09:26','2022-01-26 20:09:26'),(50,100007,'customer',11,1,'yahoo',NULL,'2022-01-26',1,0,'2022-01-26 20:10:03','2022-01-26 20:10:03'),(51,100007,'customer',11,1,'Testing',NULL,'2022-01-26',1,0,'2022-01-26 20:11:39','2022-01-26 20:11:39'),(52,100007,'customer',1,11,'<p>testing</p>',NULL,'2022-01-26',1,0,'2022-01-26 20:12:14','2022-01-26 20:12:14'),(53,100007,'customer',1,11,'<p>working</p>',NULL,'2022-01-26',1,0,'2022-01-26 20:56:10','2022-01-26 20:56:10'),(54,100007,'customer',1,11,'<p>ok</p>',NULL,'2022-01-26',1,0,'2022-01-26 20:58:39','2022-01-26 20:58:39'),(55,100007,'customer',1,11,'<p>good</p>',NULL,'2022-01-26',1,0,'2022-01-26 20:59:38','2022-01-26 20:59:38'),(56,100007,'customer',1,11,'<p>good working</p>',NULL,'2022-01-26',1,0,'2022-01-26 21:01:26','2022-01-26 21:01:26'),(57,100007,'customer',1,11,'<p>ok</p>',NULL,'2022-01-26',1,0,'2022-01-26 21:03:52','2022-01-26 21:03:52'),(58,100007,'customer',1,11,'<p>working</p>',NULL,'2022-01-26',1,0,'2022-01-26 21:28:12','2022-01-26 21:28:12'),(59,100007,'customer',1,11,'<p>ok testing message&nbsp;</p>',NULL,'2022-01-26',1,0,'2022-01-26 21:34:46','2022-01-26 21:34:46'),(60,100007,'customer',1,11,'<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',NULL,'2022-01-26',1,0,'2022-01-26 21:36:26','2022-01-26 21:36:26'),(61,100007,'customer',1,11,'<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',NULL,'2022-01-26',1,0,'2022-01-26 21:38:45','2022-01-26 21:38:45'),(62,100007,'customer',1,11,'<p>but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',NULL,'2022-01-26',1,0,'2022-01-26 21:40:47','2022-01-26 21:40:47'),(63,100007,'customer',1,11,'<p>woking</p>',NULL,'2022-01-26',1,0,'2022-01-26 21:43:04','2022-01-26 21:43:04'),(64,100007,'customer',1,11,'<p>ok testing</p>',NULL,'2022-01-26',1,0,'2022-01-26 21:46:09','2022-01-26 21:46:09'),(65,100007,'customer',1,11,'<p>but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',NULL,'2022-01-26',1,0,'2022-01-26 21:47:16','2022-01-26 21:47:16'),(66,100007,'customer',11,1,'testing',NULL,'2022-01-26',1,0,'2022-01-26 22:15:13','2022-01-26 22:15:13'),(67,100007,'customer',11,1,'remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',NULL,'2022-01-26',1,0,'2022-01-26 22:19:26','2022-01-26 22:19:26'),(68,100007,'customer',11,1,'popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',NULL,'2022-01-26',1,0,'2022-01-26 22:20:55','2022-01-26 22:20:55'),(69,100007,'customer',11,1,'Testing',NULL,'2022-01-26',1,0,'2022-01-26 22:24:37','2022-01-26 22:24:37'),(70,100006,'editor',1,22,'<p>Testing</p>',NULL,'2022-01-28',1,0,'2022-01-29 00:27:33','2022-01-29 00:27:33'),(71,100006,'editor',1,22,'<p>Testing</p>',NULL,'2022-01-28',1,0,'2022-01-29 00:36:46','2022-01-29 00:36:46'),(72,100006,'editor',1,22,'<p>good</p>',NULL,'2022-01-28',1,0,'2022-01-29 00:38:01','2022-01-29 00:38:01'),(73,100001,'editor',18,1,'<p>Editor Message Testing</p>',NULL,'2022-01-28',1,0,'2022-01-29 00:53:44','2022-01-29 00:53:44'),(74,100001,'editor',18,1,'<p>Test</p>',NULL,'2022-01-28',1,0,'2022-01-29 00:55:11','2022-01-29 00:55:11'),(75,100001,'editor',18,1,'<p>Testing Editor Email&nbsp;</p>',NULL,'2022-01-28',1,0,'2022-01-29 00:57:23','2022-01-29 00:57:23');

/*Table structure for table `contact_us` */

DROP TABLE IF EXISTS `contact_us`;

CREATE TABLE `contact_us` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contact_us` */

insert  into `contact_us`(`id`,`name`,`email`,`phone_number`,`subject`,`message`,`is_read`,`created_at`,`updated_at`) values (1,'Raja Ahsan','raja@madmindscreative.com','1234567890',NULL,'What is Lorem Ipsum?\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nWhy do we use it?\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n\n',0,'2021-09-23 15:09:16','2021-09-23 15:09:16'),(2,'Raja Ahsan','raja@madmindscreative.com','1234567890',NULL,'Testing',0,'2021-09-23 15:14:02','2021-09-23 15:14:02'),(3,'Raja Ahsan','raja@madmindscreative.com','1234567890',NULL,'Testing',0,'2021-09-23 15:14:19','2021-09-23 15:14:19'),(4,'Raja Ahsan','raja@madmindscreative.com','1234567890',NULL,'Testing123',0,'2021-09-23 15:15:34','2021-09-23 15:15:34'),(5,'Raja Ahsan','raja@madmindscreative.com','1234567890',NULL,'Testing',0,'2021-09-23 15:16:03','2021-09-23 15:16:03'),(6,'Raja Ahsan','raja@madmindscreative.com','1234567890',NULL,'Testing dfsgfdfg',1,'2021-09-23 15:17:07','2021-10-04 12:26:11'),(7,'Raja Ahsan','raja@madmindscreative.com','1234567890',NULL,'Testing',1,'2021-09-23 15:18:40','2021-10-04 12:25:40'),(8,'Raja Ahsan','raja@madmindscreative.com','1234567890',NULL,'What is Lorem Ipsum?\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nWhy do we use it?\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n\n',1,'2021-09-23 15:20:29','2021-10-04 12:25:08');

/*Table structure for table `coupon_usages` */

DROP TABLE IF EXISTS `coupon_usages`;

CREATE TABLE `coupon_usages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usages` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `coupon_usages` */

insert  into `coupon_usages`(`id`,`user_id`,`coupon_code`,`usages`,`created_at`,`updated_at`) values (2,2,'if81g',1,'2021-12-30 14:19:18','2021-12-30 14:19:18'),(4,2,'if81g',1,'2021-12-30 19:55:56','2021-12-30 19:55:56'),(6,23,'qj0at',1,'2022-01-03 16:09:16','2022-01-03 16:09:16');

/*Table structure for table `coupons` */

DROP TABLE IF EXISTS `coupons`;

CREATE TABLE `coupons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` bigint(20) NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_purchase` bigint(20) NOT NULL,
  `start_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active, 0=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `coupons` */

insert  into `coupons`(`id`,`user_id`,`title`,`coupon_type`,`discount`,`coupon_code`,`max_purchase`,`start_date`,`expire_date`,`status`,`created_at`,`updated_at`) values (1,1,'One day offer','fix',70,'56lsc',1,'2021-06-28','2021-06-30',1,'2021-06-27 03:18:45','2021-06-27 04:01:08'),(3,1,'One Time Offer','fix',5,'qj0at',1,'2022-01-04','2022-01-20',1,'2021-06-27 14:45:05','2021-06-27 14:45:05'),(5,1,'Lightningdsada','percent',5,'if81g',2,'2021-07-02','2021-12-31',1,'2021-07-02 11:46:48','2021-12-30 12:16:23');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `max_job_lmits` */

DROP TABLE IF EXISTS `max_job_lmits`;

CREATE TABLE `max_job_lmits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `max_jobs_allowed` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `max_job_lmits` */

insert  into `max_job_lmits`(`id`,`max_jobs_allowed`,`created_at`,`updated_at`) values (1,3,'2022-01-27 17:56:31','2022-01-27 18:03:34');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2021_09_20_133804_laratrust_setup_tables',1),(8,'2014_10_12_000000_create_users_table',2),(10,'2021_09_23_173011_create_contact_us_table',3),(12,'2021_09_30_115143_create_subscribes_table',4),(19,'2021_05_25_183507_create_payment_methods_table',7),(22,'2021_09_30_171139_create_services_table',10),(26,'2021_06_23_185753_create_order_payments_table',13),(27,'2021_05_25_193711_create_order_details',14),(29,'2021_05_25_182731_create_orders_table',15),(31,'2022_01_03_235430_create_accepted_jobs_table',16);

/*Table structure for table `order_details` */

DROP TABLE IF EXISTS `order_details`;

CREATE TABLE `order_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `service_id` bigint(20) NOT NULL,
  `sub_service_id` bigint(20) NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `total_words` bigint(20) DEFAULT NULL,
  `total_pages` bigint(255) DEFAULT NULL,
  `service_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trunarround_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_type` bigint(20) DEFAULT NULL,
  `discount_amount` double(8,2) DEFAULT NULL,
  `sub_amount` double(8,2) DEFAULT NULL,
  `total_amount` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `order_details` */

insert  into `order_details`(`id`,`order_id`,`service_id`,`sub_service_id`,`language`,`price`,`total_words`,`total_pages`,`service_type`,`trunarround_time`,`currency`,`discount_type`,`discount_amount`,`sub_amount`,`total_amount`,`created_at`,`updated_at`) values (1,1,2,14,'1',NULL,13,NULL,'Normal Service','18','US Dollar',NULL,NULL,29.00,29.00,'2022-01-03 17:12:07','2022-01-03 17:12:07'),(2,2,39,40,NULL,NULL,NULL,3,NULL,NULL,'US Dollar',NULL,NULL,225.00,225.00,'2022-01-03 17:13:06','2022-01-03 17:13:06'),(3,3,39,41,NULL,NULL,NULL,35,NULL,NULL,'US Dollar',NULL,NULL,1750.00,1750.00,'2022-01-03 17:14:39','2022-01-03 17:14:39'),(4,4,5,30,'1',NULL,108,NULL,'Expedited Service','18','US Dollar',NULL,NULL,35.00,35.00,'2022-01-03 17:16:33','2022-01-03 17:16:33'),(5,5,2,14,'1',NULL,13,NULL,'Normal Service','12','US Dollar',NULL,NULL,0.00,0.00,'2022-01-04 17:45:56','2022-01-04 17:45:56'),(6,6,6,35,'1',NULL,13,NULL,'Expedited Service','12','US Dollar',NULL,NULL,0.00,0.00,'2022-01-04 17:47:00','2022-01-04 17:47:00'),(7,7,39,41,NULL,NULL,NULL,4,NULL,NULL,'US Dollar',NULL,NULL,0.00,0.00,'2022-01-04 17:48:03','2022-01-04 17:48:03'),(8,8,4,26,'1',NULL,13,NULL,'Normal Service','18','US Dollar',NULL,NULL,0.00,0.00,'2022-01-20 01:47:10','2022-01-20 01:47:10'),(9,9,4,28,'2',NULL,74,NULL,'Expedited Service','324','US Dollar',NULL,NULL,0.00,0.00,'2022-01-26 19:04:43','2022-01-26 19:04:43'),(10,10,2,13,'2',NULL,708,NULL,'Expedited Service','18','US Dollar',NULL,NULL,0.00,0.00,'2022-01-28 04:57:38','2022-01-28 04:57:38'),(11,11,1,7,'2',NULL,613,NULL,'Expedited Service','18','US Dollar',NULL,NULL,0.00,0.00,'2022-02-03 18:21:18','2022-02-03 18:21:18'),(12,12,39,41,NULL,NULL,NULL,12,NULL,NULL,'US Dollar',NULL,NULL,0.00,0.00,'2022-02-03 18:22:40','2022-02-03 18:22:40'),(13,13,39,41,NULL,NULL,NULL,12,NULL,NULL,'US Dollar',NULL,NULL,0.00,0.00,'2022-02-06 23:34:11','2022-02-06 23:34:11'),(14,14,1,7,'1',NULL,613,NULL,'Normal Service','24','US Dollar',NULL,NULL,0.00,0.00,'2022-03-09 08:42:40','2022-03-09 08:42:40'),(15,15,1,7,'1',NULL,1215,NULL,'Expedited Service','18','US Dollar',NULL,NULL,0.00,0.00,'2022-04-16 01:21:55','2022-04-16 01:21:55'),(16,16,1,7,'1',NULL,1215,NULL,'Expedited Service','18','US Dollar',NULL,NULL,0.00,0.00,'2022-04-16 01:23:16','2022-04-16 01:23:16'),(17,17,1,7,'1',NULL,0,NULL,'Expedited Service','18','US Dollar',NULL,NULL,0.00,0.00,'2022-04-16 01:26:35','2022-04-16 01:26:35'),(18,18,2,17,'1',NULL,1218,NULL,'Normal Service','24','US Dollar',NULL,NULL,0.00,0.00,'2022-04-18 14:56:28','2022-04-18 14:56:28'),(19,20,2,17,'1',NULL,424,NULL,'Normal Service','24','US Dollar',NULL,NULL,0.00,0.00,'2022-04-18 15:19:57','2022-04-18 15:19:57'),(20,21,1,7,'1',NULL,424,NULL,'Normal Service','24','US Dollar',NULL,NULL,0.00,0.00,'2022-04-18 15:25:34','2022-04-18 15:25:34'),(21,22,3,53,'2',NULL,1218,NULL,'Expedited Service','18','US Dollar',NULL,NULL,0.00,0.00,'2022-04-18 15:26:52','2022-04-18 15:26:52'),(22,23,2,17,'1',NULL,424,NULL,'Normal Service','24','US Dollar',NULL,NULL,0.00,0.00,'2022-04-18 19:20:43','2022-04-18 19:20:43'),(23,24,2,17,'1',NULL,424,NULL,'Normal Service','24','US Dollar',NULL,NULL,0.00,0.00,'2022-04-18 19:25:29','2022-04-18 19:25:29'),(24,25,2,17,'1',NULL,424,NULL,'Normal Service','24','US Dollar',NULL,NULL,0.00,0.00,'2022-04-18 19:28:59','2022-04-18 19:28:59'),(25,26,1,10,'1',NULL,1217,NULL,'Normal Service','24','US Dollar',NULL,NULL,0.00,0.00,'2022-04-18 19:32:46','2022-04-18 19:32:46');

/*Table structure for table `order_payments` */

DROP TABLE IF EXISTS `order_payments`;

CREATE TABLE `order_payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=Completed, 0=Failed',
  `transaction_date` date NOT NULL,
  `total_amount` float NOT NULL,
  `name_on_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiration_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `order_payments` */

insert  into `order_payments`(`id`,`order_id`,`transaction_id`,`transaction_status`,`transaction_date`,`total_amount`,`name_on_card`,`card_number`,`cvc`,`expiration_month`,`expiration_year`,`created_at`,`updated_at`) values (1,100001,'card_1KDyl5JVqnAX4GC8X91jt4aK','succeeded','2022-01-03',29,'Raja',NULL,NULL,'12','2023','2022-01-03 17:12:07','2022-01-03 17:12:07'),(2,100002,'card_1KDym1JVqnAX4GC8ymnDEiR7','succeeded','2022-01-03',225,'Raja',NULL,NULL,'12','2023','2022-01-03 17:13:06','2022-01-03 17:13:06'),(3,100003,'card_1KDynXJVqnAX4GC8fGcAe4U8','succeeded','2022-01-03',1750,'Raja',NULL,NULL,'12','2024','2022-01-03 17:14:39','2022-01-03 17:14:39'),(4,100004,'card_1KDypNJVqnAX4GC8ikOFMwRw','succeeded','2022-01-03',35,'Raja',NULL,NULL,'12','2025','2022-01-03 17:16:33','2022-01-03 17:16:33'),(5,100003,'card_1KELlOJVqnAX4GC8AMNn3dQk','succeeded','2022-01-04',0,'Raja',NULL,NULL,'12','2022','2022-01-04 17:45:56','2022-01-04 17:45:56'),(6,100004,'card_1KELmQJVqnAX4GC8YcOtOZ8w','succeeded','2022-01-04',0,'Raja',NULL,NULL,'12','2024','2022-01-04 17:47:00','2022-01-04 17:47:00'),(7,100005,'card_1KELnQJVqnAX4GC8Xzq33yJp','succeeded','2022-01-04',0,'Raja',NULL,NULL,'12','2023','2022-01-04 17:48:03','2022-01-04 17:48:03'),(8,100006,'card_1KJl3fJVqnAX4GC81wNR5hrB','succeeded','2022-01-19',0,'Tester',NULL,NULL,'12','2022','2022-01-20 01:47:10','2022-01-20 01:47:10'),(9,100007,'card_1KMC73JVqnAX4GC8Enj4mcwT','succeeded','2022-01-26',0,'Testing Jhon',NULL,NULL,'12','2023','2022-01-26 19:04:43','2022-01-26 19:04:43'),(10,100008,'card_1KMhqOJVqnAX4GC8cXUD1aEo','succeeded','2022-01-27',0,'Testing Jhon',NULL,NULL,'12','2023','2022-01-28 04:57:38','2022-01-28 04:57:38'),(11,100009,'card_1KP5FQJVqnAX4GC8n3lkjQLN','succeeded','2022-02-03',0,'Testing',NULL,NULL,'12','2023','2022-02-03 18:21:19','2022-02-03 18:21:19'),(12,100010,'card_1KP5GkJVqnAX4GC83rqu4SNw','succeeded','2022-02-03',0,'testingraja',NULL,NULL,'12','2032','2022-02-03 18:22:40','2022-02-03 18:22:40'),(13,100011,'card_1KQFYqJVqnAX4GC8ebwFUbCF','succeeded','2022-02-06',0,'testing',NULL,NULL,'12','2023','2022-02-06 23:34:11','2022-02-06 23:34:11'),(14,100012,'card_1KbGQ5JVqnAX4GC8w52KQyit','succeeded','2022-03-09',0,'Raja Ahsan',NULL,NULL,'12','2023','2022-03-09 08:42:40','2022-03-09 08:42:40'),(15,100013,'card_1KowaSJVqnAX4GC87hxIn02F','succeeded','2022-04-15',0,'Sufee',NULL,NULL,'12','2025','2022-04-16 01:21:55','2022-04-16 01:21:55'),(16,100014,'card_1KowbmJVqnAX4GC8jlQSyHS0','succeeded','2022-04-15',0,'sufee',NULL,NULL,'12','2028','2022-04-16 01:23:16','2022-04-16 01:23:16'),(17,100015,'card_1KowezJVqnAX4GC8D5pENjg7','succeeded','2022-04-15',0,'name',NULL,NULL,'12','2028','2022-04-16 01:26:35','2022-04-16 01:26:35'),(18,100016,'card_1Kpw05JVqnAX4GC8XqmDcoQ3','succeeded','2022-04-18',0,'Sufee',NULL,NULL,'12','2025','2022-04-18 14:56:28','2022-04-18 14:56:28'),(19,100018,'card_1KpwMoJVqnAX4GC8budH54Mk','succeeded','2022-04-18',0,'Name on Card',NULL,NULL,'12','2025','2022-04-18 15:19:57','2022-04-18 15:19:57'),(20,100019,'card_1KpwSFJVqnAX4GC8yr03dqJ0','succeeded','2022-04-18',0,'Name on Card',NULL,NULL,'12','2025','2022-04-18 15:25:34','2022-04-18 15:25:34'),(21,100020,'card_1KpwTWJVqnAX4GC8sIKF1bNu','succeeded','2022-04-18',0,'name on card',NULL,NULL,'12','2025','2022-04-18 15:26:52','2022-04-18 15:26:52'),(22,100021,'card_1Kq07pJVqnAX4GC8gMooQ6HI','succeeded','2022-04-18',0,'Name on Card',NULL,NULL,'12','2025','2022-04-18 19:20:43','2022-04-18 19:20:43'),(23,100022,'card_1Kq0CQJVqnAX4GC8DpAkjKPB','succeeded','2022-04-18',0,'Name on Card',NULL,NULL,'12','2025','2022-04-18 19:25:29','2022-04-18 19:25:29'),(24,100023,'card_1Kq0FoJVqnAX4GC8lMTJJPgE','succeeded','2022-04-18',0,'Name on Card',NULL,NULL,'12','2025','2022-04-18 19:28:59','2022-04-18 19:28:59'),(25,100024,'card_1Kq0JUJVqnAX4GC8QBay6ouu','succeeded','2022-04-18',0,'Name on Card',NULL,NULL,'12','2025','2022-04-18 19:32:46','2022-04-18 19:32:46');

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL COMMENT 'customer id',
  `coupon_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_number` bigint(20) NOT NULL COMMENT 'Generate 6 digits random number as a order number',
  `order_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'paid' COMMENT 'Paid or Free',
  `total_amount` double(8,2) NOT NULL,
  `discount_amount` double(8,2) DEFAULT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` double(8,2) DEFAULT NULL,
  `net_amount` double DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'succeeded, failed',
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '''unpaid''',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` date NOT NULL,
  `client_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acceptance` bigint(20) DEFAULT NULL COMMENT '0:Pending, 1:Process, 2:Rejected,3:Completed by admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders` */

insert  into `orders`(`id`,`user_id`,`coupon_id`,`order_number`,`order_type`,`total_amount`,`discount_amount`,`discount_type`,`tax`,`net_amount`,`order_status`,`payment_status`,`payment_method`,`order_date`,`client_note`,`document`,`acceptance`,`created_at`,`updated_at`) values (1,25,NULL,100001,'paid',29.00,NULL,NULL,NULL,29,'succeeded','paid','stripe','2022-01-03','Lorem ipsume','counter.docx61d374a154182.docx',1,'2022-01-03 17:12:07','2022-01-29 00:53:01'),(2,25,NULL,100002,'paid',225.00,NULL,NULL,NULL,225,'succeeded','paid','stripe','2022-01-03','Lorem ipsume','sample2.docx61d374dacf08f.docx',NULL,'2022-01-03 17:13:06','2022-01-04 18:36:41'),(5,25,NULL,100003,'paid',33.00,NULL,NULL,NULL,33,'succeeded','paid','stripe','2022-01-04','Lorem ipsum','counter.docx61d4cc845666b.docx',NULL,'2022-01-04 17:45:56','2022-01-04 18:36:38'),(6,25,NULL,100004,'paid',33.00,NULL,NULL,NULL,33,'succeeded','paid','stripe','2022-01-04','Lorem ipsum e','counter.docx61d4ce4d3eb05.docx',NULL,'2022-01-04 17:47:00','2022-01-04 18:36:34'),(7,25,NULL,100005,'paid',200.00,NULL,NULL,NULL,200,'succeeded','paid','stripe','2022-01-04','Lorem ipusm e','sample2.docx61d4ce8e37a39.docx',1,'2022-01-04 17:48:02','2022-01-05 18:06:30'),(8,26,NULL,100006,'paid',29.00,NULL,NULL,NULL,29,'succeeded','paid','stripe','2022-01-19','Lorem ipsum','counter.docx61e878ac2a71a.docx',1,'2022-01-20 01:47:10','2022-01-20 01:50:52'),(9,11,NULL,100007,'paid',37.00,NULL,NULL,NULL,37,'succeeded','paid','stripe','2022-01-26','Testing','stock List.pdf61f154e2b5784.pdf',NULL,'2022-01-26 19:04:43','2022-01-26 19:04:43'),(10,27,NULL,100008,'paid',41.00,NULL,NULL,NULL,41,'succeeded','paid','stripe','2022-01-27',NULL,'Website_response_to_Logozone.docx61f33149d40ee.docx',NULL,'2022-01-28 04:57:38','2022-01-28 04:57:38'),(11,24,NULL,100009,'paid',881.00,NULL,NULL,NULL,881,'succeeded','paid','stripe','2022-02-03','Testign','testfile.docx61fbd68ea7d5f.docx',NULL,'2022-02-03 18:21:18','2022-02-03 18:21:18'),(12,24,NULL,100010,'paid',600.00,NULL,NULL,NULL,600,'succeeded','paid','stripe','2022-02-03',NULL,'Muhammad Asjad Updated Resume.docx61fbd6fe37477.docx',NULL,'2022-02-03 18:22:40','2022-02-03 18:22:40'),(13,24,NULL,100011,'paid',600.00,NULL,NULL,NULL,600,'succeeded','paid','stripe','2022-02-06',NULL,'about-us.jpg62001442541e8.jpg',NULL,'2022-02-06 23:34:11','2022-02-06 23:34:11'),(14,29,NULL,100012,'paid',31.00,NULL,NULL,NULL,31,'succeeded','paid','stripe','2022-03-09','testing','testfile.docx6228216799c3d.docx',NULL,'2022-03-09 08:42:40','2022-03-09 08:42:40'),(15,31,NULL,100013,'paid',70.00,NULL,NULL,NULL,70,'succeeded','paid','stripe','2022-04-15','*Website Developer* *PHP LARAVEL WEBSITE DEVELOPER*  Dear Visitor, I have 6+ yrs experience in.  WEB Development PHP , LARAVEL ,  CODEIGNITER MVC & HMVC,   Api\'s Development.  API’S Integration.   I have developed many projects like.   > E-commerce,  > Customer Relationship Management (CRM),  > Custom Management System (CMS),  > Learning Management Systems ( LMS ) ,    > Point Of Sale (POS) many others too.  I can provide you quality services. Your satisfaction is my first priority. I expect that I will be considered favorably.                              Fiver https://www.fiverr.com/s2/29c1234a5b   Freelance https://www.freelancer.com/u/sufeelatif1  WhatsApp https://wa.me/923242193100    Portfolio https://www.sufeelatif.com/                THANK YOU.','SufeeLatif.pdf6259e192118f9.pdf',NULL,'2022-04-16 01:21:55','2022-04-16 01:21:55'),(16,31,NULL,100014,'paid',70.00,NULL,NULL,NULL,70,'succeeded','paid','stripe','2022-04-15','*Website Developer* *PHP LARAVEL WEBSITE DEVELOPER*  Dear Visitor, I have 6+ yrs experience in.  WEB Development PHP , LARAVEL ,  CODEIGNITER MVC & HMVC,   Api\'s Development.  API’S Integration.   I have developed many projects like.   > E-commerce,  > Customer Relationship Management (CRM),  > Custom Management System (CMS),  > Learning Management Systems ( LMS ) ,    > Point Of Sale (POS) many others too.  I can provide you quality services. Your satisfaction is my first priority. I expect that I will be considered favorably.                              Fiver https://www.fiverr.com/s2/29c1234a5b   Freelance https://www.freelancer.com/u/sufeelatif1  WhatsApp https://wa.me/923242193100    Portfolio https://www.sufeelatif.com/                THANK YOU.','SufeeLatif.pdf6259e226d6918.pdf',NULL,'2022-04-16 01:23:16','2022-04-16 01:23:16'),(17,31,NULL,100015,'paid',70.00,NULL,NULL,NULL,70,'succeeded','paid','stripe','2022-04-15','*Website Developer* *PHP LARAVEL WEBSITE DEVELOPER*  Dear Visitor, I have 6+ yrs experience in.  WEB Development PHP , LARAVEL ,  CODEIGNITER MVC & HMVC,   Api\'s Development.  API’S Integration.   I have developed many projects like.   > E-commerce,  > Customer Relationship Management (CRM),  > Custom Management System (CMS),  > Learning Management Systems ( LMS ) ,    > Point Of Sale (POS) many others too.  I can provide you quality services. Your satisfaction is my first priority. I expect that I will be considered favorably.                              Fiver https://www.fiverr.com/s2/29c1234a5b   Freelance https://www.freelancer.com/u/sufeelatif1  WhatsApp https://wa.me/923242193100    Portfolio https://www.sufeelatif.com/                THANK YOU.','elitereviser.txt6259e2eadb672.txt',NULL,'2022-04-16 01:26:35','2022-04-16 01:26:35'),(18,32,NULL,100016,'paid',61.00,NULL,NULL,NULL,61,'succeeded','paid','stripe','2022-04-18','Client Instruction','SufeeLatif.pdf625d7c03b2a1f.pdf',NULL,'2022-04-18 14:56:28','2022-04-18 14:56:28'),(19,32,NULL,100017,'paid',21.00,NULL,NULL,NULL,21,'succeeded','paid','stripe','2022-04-18','Client Instruction','Sufee Latif.docx625d7f9b0a596.docx',NULL,'2022-04-18 15:11:54','2022-04-18 15:11:54'),(20,32,NULL,100018,'paid',21.00,NULL,NULL,NULL,21,'succeeded','paid','stripe','2022-04-18','Client Instruction','Sufee Latif.docx625d815e46c8c.docx',NULL,'2022-04-18 15:19:57','2022-04-18 15:19:57'),(21,32,NULL,100019,'paid',21.00,NULL,NULL,NULL,21,'succeeded','paid','stripe','2022-04-18','Client Instruction','Sufee Latif.docx625d826f93465.docx',NULL,'2022-04-18 15:25:34','2022-04-18 15:25:34'),(22,1,NULL,100020,'paid',70.00,NULL,NULL,NULL,70,'succeeded','paid','stripe','2022-04-18',NULL,'http___designsvisionary.com_elitereviser_public_assets_website_documents_SufeeLatif.pdf625d7c03b2a1f.pdf625d830b3e0ba.pdf',NULL,'2022-04-18 15:26:52','2022-04-18 15:26:52'),(23,32,NULL,100021,'paid',21.00,NULL,NULL,NULL,21,'succeeded','paid','stripe','2022-04-18','Client Instruction','Sufee Latif.docx625db9d3db3cd.docx',NULL,'2022-04-18 19:20:43','2022-04-18 19:20:43'),(24,32,NULL,100022,'paid',21.00,NULL,NULL,NULL,21,'succeeded','paid','stripe','2022-04-18','Client Instruction','Sufee Latif.docx625dbacf9d4e6.docx',NULL,'2022-04-18 19:25:29','2022-04-18 19:25:29'),(25,32,NULL,100023,'paid',21.00,NULL,NULL,NULL,21,'succeeded','paid','stripe','2022-04-18','Client Instruction…','Sufee Latif.docx625dbb9853321.docx',NULL,'2022-04-18 19:28:59','2022-04-18 19:28:59'),(26,32,NULL,100024,'paid',61.00,NULL,NULL,NULL,61,'succeeded','paid','stripe','2022-04-18','Client Instruction','Sufee Latif.pdf625dbc934980e.pdf',NULL,'2022-04-18 19:32:46','2022-04-18 19:32:46');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `payment_methods` */

DROP TABLE IF EXISTS `payment_methods`;

CREATE TABLE `payment_methods` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active, 0=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `payment_methods` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values (1,'users-create','Create Users','Create Users','2021-09-20 08:43:49','2021-09-20 08:43:49'),(2,'users-read','Read Users','Read Users','2021-09-20 08:43:49','2021-09-20 08:43:49'),(3,'users-update','Update Users','Update Users','2021-09-20 08:43:49','2021-09-20 08:43:49'),(4,'users-delete','Delete Users','Delete Users','2021-09-20 08:43:49','2021-09-20 08:43:49'),(5,'payments-create','Create Payments','Create Payments','2021-09-20 08:43:49','2021-09-20 08:43:49'),(6,'payments-read','Read Payments','Read Payments','2021-09-20 08:43:49','2021-09-20 08:43:49'),(7,'payments-update','Update Payments','Update Payments','2021-09-20 08:43:49','2021-09-20 08:43:49'),(8,'payments-delete','Delete Payments','Delete Payments','2021-09-20 08:43:49','2021-09-20 08:43:49'),(9,'profile-read','Read Profile','Read Profile','2021-09-20 08:43:49','2021-09-20 08:43:49'),(10,'profile-update','Update Profile','Update Profile','2021-09-20 08:43:49','2021-09-20 08:43:49');

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`role_id`,`user_id`,`user_type`) values (1,1,'App\\Models\\User'),(3,2,'App\\Models\\User'),(3,3,'App\\Models\\User'),(3,4,'App\\Models\\User'),(3,5,'App\\Models\\User'),(3,6,'App\\Models\\User'),(3,7,'App\\Models\\User'),(3,8,'App\\Models\\User'),(3,9,'App\\Models\\User'),(3,10,'App\\Models\\User'),(3,11,'App\\Models\\User'),(3,12,'App\\Models\\User'),(2,13,'App\\Models\\User'),(2,14,'App\\Models\\User'),(2,15,'App\\Models\\User'),(2,16,'App\\Models\\User'),(2,17,'App\\Models\\User'),(2,18,'App\\Models\\User'),(2,19,'App\\Models\\User'),(2,20,'App\\Models\\User'),(2,21,'App\\Models\\User'),(2,22,'App\\Models\\User'),(3,23,'App\\Models\\User'),(3,24,'App\\Models\\User'),(3,25,'App\\Models\\User'),(3,26,'App\\Models\\User'),(3,27,'App\\Models\\User'),(3,28,'App\\Models\\User'),(3,29,'App\\Models\\User'),(3,30,'App\\Models\\User'),(3,31,'App\\Models\\User'),(3,32,'App\\Models\\User'),(3,33,'App\\Models\\User'),(3,34,'App\\Models\\User');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values (1,'admin','Admin','Admin','2021-09-20 08:43:49','2021-09-20 08:43:49'),(2,'editor','Editor','Editor','2021-09-20 08:43:49','2021-09-20 08:43:49'),(3,'user','User','User','2021-09-20 08:43:49','2021-09-20 08:43:49');

/*Table structure for table `services` */

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1=active, 2=in-active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `services` */

insert  into `services`(`id`,`user_id`,`parent_id`,`title`,`short_description`,`tags`,`tagline`,`full_description`,`bg_color`,`bg_image`,`status`,`created_at`,`updated_at`) values (1,1,NULL,'ACADEMIC','You want to have your journal article, research proposal, presentation, abstract, or research paper, edited and proofread.','Journal Artical, Research Proposal, Presentation, Abstract, and Research Paper','We deliver the best possible results on all projects. You can always count on us for a work well done.','We take great interest in your scholastic work, and so, we will thoroughly edit and proofread your work to correct misspellings and typos, as well as grammatical errors, to improve readability, articulation, and structure. Your citations and references will also be formatted to the requirements specified by your intended journal for publication.','box-blue','academic.jpg',1,'2021-10-01 07:20:34','2021-10-01 07:20:34'),(2,1,NULL,'BUSINESS/CORPORATION','You want to have your business proposal, business plan, business document, report, website post, or blog, edited and proofread.','Proposal, Plan, Document, \nReport, Post, and Blog','We deliver the best possible results on all projects. You can always count on us for a work well done.','We take great interest in your business endeavors and achievements, and so, we will thoroughly edit and proofread your work to correct misspellings and typos, as well as grammatical errors, to improve readability, articulation, and structure. Your citations and references, if any, will also be formatted to the appropriate specifications of your choice.','box-yellow','box2.png',1,'2021-10-01 07:21:01','2021-12-02 03:04:58'),(3,1,NULL,'NON-ENGLISH SPEAKER','English is your second language, and you need your academic, business, professional, or literary work, edited and proofread.','Academics, Business, and Professional Job','We deliver the best possible results on all projects. You can always count on us for a work well done.','We understand you take great pride in your academic, business, professional, or literary endeavors, and you are non-English speaker. That is why we take great interest, as well. Our editors will correct misspellings, typos, and grammatical errors in your work to make it readable and articulate. We take pride in our services. You have nothing to worry about.','box-blue','box3.png',1,'2021-10-01 07:21:21','2021-10-01 07:21:21'),(4,1,NULL,'PROFESSIONAL','You are an entry-level, early-career, mid-career, or late-career professional, and want your CV, resume, or cover letter, edited.','CV, Resume, Cover Letter, and Interview Letter','We deliver the best possible results on all projects. You can always count on us for a work well done.','We take great interest in your career progress, and because of this, we exercise great thoroughness in editing and proofreading your work to correct misspellings and typos, as well as grammatical errors, to improve readability, articulation, and structure. Your citations and references, if available, will also be formatted to the requirements specified to us.','box-yellow','professional.jpg',1,'2021-10-01 07:21:39','2021-10-01 07:21:39'),(5,1,NULL,'STUDENT','You are an undergrad or grad student, and want your essay, resume, research proposal, thesis, or dissertation, edited and proofread.','Essay, Resume, Research Proposal, Thesis, and Dissertation','We deliver the best possible results on all projects. You can always count on us for a work well done.','We take great interest in your achievements, and so, we will thoroughly edit and proofread your work to correct misspellings and typos, as well as grammatical errors, to improve readability, articulation, and structure. Your citations and references will also be formatted to the requirements specified by your intended journal for publication.','box-blue','box5.png',1,'2021-10-01 07:21:56','2021-10-01 07:21:56'),(6,1,NULL,'WRITER','You are into writing book, manuscript, novel, or screenplay, and you want your work to be edited and proofread for publishing.','Book, Manuscript, Novel, and Screenplay','We deliver the best possible results on all projects. You can always count on us for a work well done.','We are impressed with your writing. Your endeavor toward your work calls for an expert to edit and proofread it to correct misspellings, typos, and grammatical errors, to improve readability and articulation. Being an author is a challenge on its own, and so, we are ready to help. Your citations or references will also be formatted to your specifications.','box-yellow','box6.png',1,'2021-10-01 07:22:16','2021-10-01 07:22:16'),(7,1,1,'Journal Article',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 07:25:08','2021-10-01 07:25:08'),(8,1,1,'Research Proposal',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 07:26:17','2021-10-01 07:26:17'),(9,1,1,'Presentation',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 07:26:28','2021-10-01 07:26:28'),(10,1,1,'Abstract',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 07:26:41','2021-10-01 07:26:41'),(11,1,1,'Research Paper',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 07:26:52','2021-10-01 07:26:52'),(13,1,2,'Plan',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 07:52:55','2022-04-18 13:25:57'),(14,1,2,'Document',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 07:53:07','2021-10-01 07:53:07'),(15,1,2,'Report',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 07:53:16','2022-04-18 13:26:33'),(16,1,2,'Post',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 07:53:26','2022-04-18 13:26:58'),(17,1,2,'Blog',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 07:53:39','2022-02-05 14:47:58'),(22,1,3,'Abstract',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 09:07:38','2022-02-11 01:18:30'),(23,1,3,'Book',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 09:07:53','2022-02-11 01:18:38'),(24,1,3,'Business Plan',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 09:08:07','2022-02-11 01:18:51'),(25,1,3,'Business Report',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 09:08:21','2022-02-11 01:19:00'),(26,1,4,'CV',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 09:09:05','2021-10-01 09:09:05'),(27,1,4,'Resume',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 09:09:22','2021-10-01 09:09:22'),(28,1,4,'Cover Letter',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 09:09:37','2022-04-18 13:45:42'),(29,1,4,'Interview Letter',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 09:09:53','2022-04-18 14:43:09'),(30,1,5,'Essay',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 09:10:34','2021-10-01 09:10:34'),(31,1,5,'Resume',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 09:10:46','2021-10-01 09:10:46'),(32,1,5,'Research Proposal',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 09:10:58','2022-02-05 14:47:04'),(33,1,5,'Thesis',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 09:11:10','2021-10-01 09:11:10'),(34,1,5,'Dissertation',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 09:11:26','2021-10-01 09:11:26'),(35,1,6,'Book',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 09:12:05','2021-10-01 09:12:05'),(36,1,6,'Manuscript',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 09:12:18','2021-10-01 09:12:18'),(37,1,6,'Novel',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 09:12:32','2021-10-01 09:12:32'),(38,1,6,'Screenplay',NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-10-01 09:12:46','2021-10-01 09:12:46'),(39,1,NULL,'Resume/CV','We deliver the best possible results on all projects. You can always count on us for a work well done.',NULL,NULL,NULL,NULL,NULL,1,'2021-12-23 12:30:33','2021-12-23 12:30:33'),(40,1,39,'Resume','We deliver the best possible results on all projects. You can always count on us for a work well done.',NULL,NULL,NULL,NULL,NULL,1,'2021-12-23 12:34:37','2021-12-23 12:34:37'),(41,1,39,'CV','We deliver the best possible results on all projects. You can always count on us for a work well done.',NULL,NULL,NULL,NULL,NULL,1,'2021-12-23 12:35:43','2021-12-23 12:35:43'),(42,1,3,'Cover Letter',NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-02-11 01:19:57','2022-02-11 01:19:57'),(43,1,3,'CV',NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-02-11 01:20:54','2022-02-11 01:20:54'),(44,1,3,'Dissertation',NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-02-11 01:22:02','2022-02-11 01:22:02'),(45,1,3,'Document',NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-02-11 01:22:38','2022-02-11 01:22:38'),(46,1,3,'Essay',NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-02-11 01:25:49','2022-02-11 01:25:49'),(47,1,3,'Interview Letter',NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-02-11 01:26:41','2022-02-11 01:26:41'),(53,1,3,'Journal Article',NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-02-11 01:36:42','2022-02-11 01:36:42'),(55,1,3,'Manuscript',NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-02-11 01:39:05','2022-02-11 01:39:05'),(56,1,3,'Novel',NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-02-11 02:08:07','2022-02-11 02:08:07'),(58,1,3,'Online Blog',NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-02-11 02:08:48','2022-02-11 02:08:48'),(59,1,3,'Presentation',NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-02-11 02:09:08','2022-02-11 02:09:08'),(60,1,3,'Research Proposal',NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-02-11 02:09:38','2022-02-11 02:09:38'),(61,1,3,'Research Paper',NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-02-11 02:10:01','2022-02-11 02:10:01'),(62,1,3,'Resume',NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-02-11 02:10:18','2022-02-11 02:10:18'),(63,1,3,'Screenplay',NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-02-11 02:10:46','2022-02-11 02:10:46'),(64,1,3,'Thesis',NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-02-11 02:11:01','2022-02-11 02:11:01'),(65,1,3,'Website Post',NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-02-11 02:11:17','2022-02-11 02:11:17'),(66,1,2,'Proposal','Proposal Desc',NULL,NULL,NULL,NULL,NULL,1,'2022-04-18 13:22:37','2022-04-18 13:22:37');

/*Table structure for table `subscribes` */

DROP TABLE IF EXISTS `subscribes`;

CREATE TABLE `subscribes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `subscribes` */

insert  into `subscribes`(`id`,`name`,`email`,`status`,`created_at`,`updated_at`) values (1,NULL,'admin@example.com',1,'2021-09-30 11:08:56','2021-09-30 11:08:56'),(2,NULL,'customer@gmail.com',1,'2021-09-30 11:10:20','2021-09-30 11:10:20'),(3,NULL,'ahsan_93raja@yahoo.com',1,'2021-09-30 11:10:34','2021-09-30 11:10:34'),(4,NULL,'haris@gmail.com',1,'2021-09-30 11:10:42','2021-09-30 11:10:42'),(5,NULL,'admin@admin.com',1,'2021-09-30 11:10:52','2021-09-30 11:10:52'),(6,NULL,'customer1@gmail.com',1,'2021-09-30 11:11:19','2021-09-30 11:11:19'),(7,NULL,'customer2@gmail.com',1,'2021-09-30 11:11:30','2021-09-30 11:11:30'),(8,NULL,'customer3@gmail.com',1,'2021-09-30 11:11:42','2021-09-30 11:11:42');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1= "Active", 2= "In active",3= "Block"',
  `status_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` int(11) DEFAULT 1 COMMENT '1=Not Approved, 2= Approved,3= Rejected',
  `approved_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`last_name`,`organization`,`address`,`country`,`state`,`zip_code`,`email`,`phone_number`,`email_verified_at`,`password`,`image`,`status`,`status_reason`,`is_approved`,`approved_reason`,`remember_token`,`created_at`,`updated_at`) values (1,'Admin',NULL,NULL,NULL,NULL,NULL,NULL,'raja@madmindscreative.com','1234567890',NULL,'$2y$10$UTPf5YGIufRROKTAzA5TLec9fQGZTPW56OiP2wcuJfkwk6XWUl6Qi',NULL,1,NULL,1,NULL,NULL,'2021-09-23 10:51:19','2021-09-23 10:51:19'),(2,'User',NULL,NULL,NULL,NULL,NULL,NULL,'user@gmail.com','123456789',NULL,'$2y$10$UTPf5YGIufRROKTAzA5TLec9fQGZTPW56OiP2wcuJfkwk6XWUl6Qi',NULL,1,'Testing',1,NULL,NULL,'2021-09-23 11:26:14','2021-09-27 12:17:26'),(3,'Winston Konopelski',NULL,NULL,NULL,NULL,NULL,NULL,'robel.bianka@example.org',NULL,'2021-09-27 12:31:03','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','',2,NULL,1,NULL,'Bd2Jtoyl0sjnum64byxs8cdP9zDGYyLHrVjfMu8mcNivNaKv15ltYirzkmNI','2021-09-27 12:31:03','2021-09-28 09:30:02'),(4,'Daniela Herzog',NULL,NULL,NULL,NULL,NULL,NULL,'adah79@example.com',NULL,'2021-09-27 12:31:03','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','',1,'',1,NULL,'user@123','2021-09-27 12:31:03','2021-09-27 12:31:03'),(5,'Mr. Richie Kunde MD',NULL,NULL,NULL,NULL,NULL,NULL,'carli26@example.net',NULL,'2021-09-27 12:31:03','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','',1,'',1,NULL,'LR9NuJiIKkDx3kovsgUhKt0GgR78QhavekcLlcrW1tiLXnL5yj9FejvG9e1o','2021-09-27 12:31:03','2021-09-27 12:31:03'),(6,'Cristina Stiedemann',NULL,NULL,NULL,NULL,NULL,NULL,'woodrow08@example.com',NULL,'2021-09-27 12:31:03','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','',1,'',1,NULL,'user@123','2021-09-27 12:31:03','2021-09-27 12:31:03'),(7,'Loyce Wilkinson',NULL,NULL,NULL,NULL,NULL,NULL,'rrice@example.org',NULL,'2021-09-27 12:31:03','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','',1,'',1,NULL,'user@123','2021-09-27 12:31:03','2021-09-27 12:31:03'),(8,'Summer Heaney',NULL,NULL,NULL,NULL,NULL,NULL,'glakin@example.net',NULL,'2021-09-27 12:31:03','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','',1,'',1,NULL,'user@123','2021-09-27 12:31:03','2021-09-27 12:31:03'),(9,'Lance Witting PhD',NULL,NULL,NULL,NULL,NULL,NULL,'kozey.mary@example.com',NULL,'2021-09-27 12:31:03','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','',3,NULL,1,NULL,'user@123','2021-09-27 12:31:03','2021-09-28 10:41:47'),(10,'Emely Crist',NULL,NULL,NULL,NULL,NULL,NULL,'marcelino.schaefer@example.org',NULL,'2021-09-27 12:31:03','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','',1,'',1,NULL,'user@123','2021-09-27 12:31:03','2021-09-27 12:31:03'),(11,'Micah Pacocha',NULL,NULL,NULL,NULL,NULL,NULL,'ahsan_93raja@yahoo.com',NULL,'2021-09-27 12:31:03','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','',1,'',1,NULL,'user@123','2021-09-27 12:31:03','2021-09-27 12:31:03'),(12,'Ronny Kessler',NULL,NULL,NULL,NULL,NULL,NULL,'myron12@example.com',NULL,'2021-09-27 12:31:03','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','',1,'Good one',1,NULL,'user@123','2021-09-27 12:31:03','2021-11-15 08:29:25'),(13,'Jonatan Bernhard',NULL,NULL,NULL,NULL,NULL,NULL,'editor@example.org',NULL,'2021-09-28 11:28:22','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','',1,'',3,NULL,'PYKFoNi4HkvSwiRAMBNl9IHxGcfxyj04qUDw7b4LSvYxKSfejcnDuPpM5qcf','2021-09-28 11:28:22','2021-09-28 17:47:22'),(14,'Nyah Ebert',NULL,NULL,NULL,NULL,NULL,NULL,'little.adelia@example.com',NULL,'2021-09-28 11:28:22','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','',1,'',2,NULL,'user@123','2021-09-28 11:28:22','2021-09-28 17:46:20'),(15,'Alvis Greenholt Jr.',NULL,NULL,NULL,NULL,NULL,NULL,'maryjane.senger@example.org',NULL,'2021-09-28 11:28:22','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','',1,'',1,NULL,'user@123','2021-09-28 11:28:22','2021-09-28 11:28:22'),(16,'Eleanore O\'Conner',NULL,NULL,NULL,NULL,NULL,NULL,'kstiedemann@example.org',NULL,'2021-09-28 11:28:22','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','',3,NULL,1,NULL,'user@123','2021-09-28 11:28:22','2021-09-28 17:45:37'),(17,'Dr. Sibyl Quigley',NULL,NULL,NULL,NULL,NULL,NULL,'pzboncak@example.net',NULL,'2021-09-28 11:28:22','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','',0,'testing',1,NULL,'user@123','2021-09-28 11:28:22','2021-09-28 17:02:56'),(18,'Dr. Wayne Fahey III',NULL,NULL,NULL,NULL,NULL,NULL,'aheller@example.org',NULL,'2021-09-28 11:28:22','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','',1,'',1,NULL,'udCUePcau5k0Ajddi22CtgImTGH3ybHM6IuYo3wNr7YtUfg6pnYPuS6eR6oV','2021-09-28 11:28:22','2021-09-28 11:28:22'),(19,'Iva Nikolaus',NULL,NULL,NULL,NULL,NULL,NULL,'lockman.devin@example.org',NULL,'2021-09-28 11:28:22','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','',3,NULL,2,NULL,'user@123','2021-09-28 11:28:22','2021-09-28 17:41:01'),(20,'Angela Stracke',NULL,NULL,NULL,NULL,NULL,NULL,'freeman.koepp@example.org',NULL,'2021-09-28 11:28:22','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','',1,'',3,NULL,'user@123','2021-09-28 11:28:22','2021-09-28 17:43:44'),(21,'Dion Spinka',NULL,NULL,NULL,NULL,NULL,NULL,'lebsack.violet@example.org','1321313222','2021-09-28 11:28:22','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','',1,NULL,2,'testing','user@123','2021-09-28 11:28:22','2021-09-28 17:42:41'),(22,'Nicolette Murray',NULL,NULL,NULL,NULL,NULL,NULL,'testing@test.com','1321313212','2021-09-28 11:28:22','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','',1,'',2,NULL,'BUBKY4SdMQk0voNtw9MgtFfaOCJaJcq4z5tf5F6dVqLPrzFXQqrqNZb3iQpk','2021-09-28 11:28:22','2021-11-15 08:32:49'),(23,'Test User',NULL,NULL,NULL,NULL,NULL,NULL,'test@user.com','123456789',NULL,'$2y$10$9zDLztJmiJWQYkRGhl8.v.A6Y3LBLo0aeO92wHSwZTk05PyQwGocW',NULL,1,NULL,1,NULL,NULL,'2021-12-12 05:36:18','2021-12-12 05:36:18'),(24,'John123',NULL,NULL,NULL,NULL,NULL,NULL,'john123@gmail.com','1231231231',NULL,'$2y$10$BnCxhXtPt8jlB2Bzmc3HVeEfMRuB/gaZsJfbgpRbbhD9Owbva5V3W',NULL,1,NULL,1,NULL,NULL,'2022-01-03 05:26:54','2022-01-03 05:26:54'),(25,'Stephen',NULL,NULL,NULL,NULL,NULL,NULL,'stephen@mail.com','3434324234',NULL,'$2y$10$TbkneGq3xRcQ0f./T3mESOPgnPz5aS/rktqvpCRHQHQS.z1i1R00u',NULL,1,NULL,1,NULL,NULL,'2022-01-03 17:03:51','2022-01-03 17:03:51'),(26,'Peter',NULL,NULL,NULL,NULL,NULL,NULL,'peter@peter.com','23423434',NULL,'$2y$10$0EuuEjm/XWzQarysles4wOC8AFzTr5A7XZ7xFfyOzCK8z/.3UG76u',NULL,1,NULL,1,NULL,NULL,'2022-01-20 01:46:01','2022-01-20 01:46:01'),(27,'Naveed',NULL,NULL,NULL,NULL,NULL,NULL,'pyra2@mailinator.com','2243470260',NULL,'$2y$10$TGGUjmw0EheLITTM.HarL.M/JuHCVGS4p7dpWXl4IKaTF29wf5.Fu',NULL,1,NULL,1,NULL,NULL,'2022-01-28 04:57:21','2022-01-28 04:57:21'),(28,'Melodie','Tasha','Lester Joyner LLC','Dolore non earum aut','Et cupidatat consect','Possimus non velit','42827','doqi@mailinator.com','+1 (975) 653-7303',NULL,'$2y$10$PHCJAj2SdPYtKdO7gJWRpunEilTNoa2/O1kVaKV.x/vzEks6n3cdS',NULL,1,NULL,1,NULL,NULL,'2022-03-09 08:34:05','2022-03-09 08:34:05'),(29,'Nell','Montana','Wallace and Crosby Plc','Beatae cupiditate es','Exercitation sapient','Aut anim accusantium','26475','muhuky@mailinator.com','Stephanie',NULL,'$2y$10$bVwm5Wnq/ifyum7P.IeLUuj7B6mFrL1ZANSD1sm2c4pChOe3TxPBy',NULL,1,NULL,1,NULL,NULL,'2022-03-09 08:41:52','2022-03-09 08:41:52'),(30,'text','text','text','text','text','text','9999999','text@gmail.com','555555555555555',NULL,'$2y$10$jTm/c.enFidaLBytUr8qAu.lcojI2qoSXhpThAe4/qpWxTj.Aci4W',NULL,1,NULL,1,NULL,NULL,'2022-03-09 08:53:36','2022-03-09 08:53:36'),(31,'Sufee Latif','Latif','Name of Organization/Affiliation','Address','Country','State','Zip Code','safanali@yopmail.com','923242193100',NULL,'$2y$10$5F14Fn6dmo.dtx5V1aFh4.DwxycEx.E1DbBjSlMzNNjrJVyNbXFu6',NULL,1,NULL,1,NULL,NULL,'2022-04-16 01:18:39','2022-04-16 01:18:39'),(32,'Sufee Latif','Latif','Name of Organization/Affiliation','Address','Country','State','Zip Code','sufeelatif@yopmail.com','923242193100',NULL,'$2y$10$QzBxC5RNzCzxpBkjfR4zreKoVjVIk6lwQM/uAJ6jNKZDGA7lQEe/2',NULL,1,NULL,1,NULL,NULL,'2022-04-18 14:54:09','2022-04-18 14:54:09'),(33,'Sabir','Ali','Name of Organization/Affiliation','Address','Country','State','123456','sabir@yopmail.com','923242193100',NULL,'$2y$10$EXaVnVQDPMpqJfg1t7t9heWEHzq5aq9XJoPNUvrLXSZm2Fgw0oq9i',NULL,1,NULL,1,NULL,NULL,'2022-04-22 21:14:18','2022-04-22 21:14:18'),(34,'momin','Ali','Name of Organization/Affiliation','Address','Toranto, Canada','Sindh','Zip Code','momin@yopmail.com','923242193100',NULL,'$2y$10$7NN1FeKeri0e.9nmQh1PWe91kxC2UuzNKZYxpwm8UvFuDCmFdqdd2',NULL,1,NULL,1,NULL,NULL,'2022-04-23 18:33:52','2022-04-23 18:33:52');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

/*
SQLyog Ultimate v11.3 (64 bit)
MySQL - 5.5.55-0ubuntu0.14.04.1 : Database - Enigma
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`Enigma` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `Enigma`;

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_admin` */

/*Table structure for table `tb_code` */

DROP TABLE IF EXISTS `tb_code`;

CREATE TABLE `tb_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phonenumber` varchar(255) NOT NULL,
  `code` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

/*Data for the table `tb_code` */

insert  into `tb_code`(`id`,`phonenumber`,`code`) values (15,'+18184722334','693421'),(16,'+12345678904','340414'),(26,'+18184722336','779061'),(30,'+8618744331234','679045'),(35,'+8617189765306','462435'),(58,'+13104009627','746123'),(64,'+14084066195','844783'),(67,'+14088021945','119004'),(69,'+8617189761111','361358'),(71,'+8617189765309','567213'),(72,'+8618744331001','499716');

/*Table structure for table `tb_contacts` */

DROP TABLE IF EXISTS `tb_contacts`;

CREATE TABLE `tb_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `contact_phonenumber` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `contact_id` (`contact_id`),
  CONSTRAINT `tb_contacts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tb_contacts_ibfk_2` FOREIGN KEY (`contact_id`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

/*Data for the table `tb_contacts` */

insert  into `tb_contacts`(`id`,`user_id`,`contact_id`,`contact_phonenumber`,`contact_name`) values (3,18,17,'+18184722336','Edo'),(15,24,24,'+8618744331234','Alex Johnson'),(16,29,24,'+8618744331234','Alex Johnson'),(20,30,18,'+18184722334','Yulik '),(21,30,17,'+18184722336','Edo '),(22,17,18,'+18184722334','Yulik'),(23,17,17,'+18184722336','Edo'),(24,17,30,'+13104009627','Polaris Ed'),(27,29,35,'+8617189765309','Es Six'),(28,35,29,'+8618744331001','John Doe');

/*Table structure for table `tb_messages` */

DROP TABLE IF EXISTS `tb_messages`;

CREATE TABLE `tb_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(255) NOT NULL,
  `sender` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `deleted1` int(1) NOT NULL DEFAULT '0',
  `deleted2` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8;

/*Data for the table `tb_messages` */

insert  into `tb_messages`(`id`,`room_name`,`sender`,`content`,`created_at`,`status`,`deleted1`,`deleted2`) values (1,'15_16',16,'1','2017-06-30 03:48:50',1,0,0),(2,'17_18',18,'Perezaustila','2017-06-30 04:08:32',1,0,0),(3,'19_20',19,'1','2017-06-30 12:35:05',0,0,0),(4,'21_22',22,'1','2017-06-30 12:50:41',1,0,0),(5,'21_22',22,'2','2017-06-30 12:50:55',1,0,0),(6,'23_24',24,'1','2017-06-30 12:59:29',1,0,0),(7,'17_18',17,'Privet','2017-07-02 15:51:39',1,0,0),(8,'17_18',18,'Privet','2017-07-02 15:55:17',1,0,0),(9,'17_18',17,'Coffee?','2017-07-02 15:55:50',1,0,0),(10,'17_18',18,'Sure','2017-07-02 15:57:07',1,0,0),(11,'17_18',17,'Edgar budet v 5','2017-07-02 19:09:07',1,0,0),(12,'17_18',18,'Ok','2017-07-02 19:42:57',1,0,0),(13,'24_28',28,'1','2017-07-21 03:17:44',0,0,0),(14,'24_29',29,'1','2017-07-21 22:00:51',0,0,0),(15,'28_29',28,'1','2017-07-21 22:15:08',1,0,0),(16,'28_29',29,'2','2017-07-21 22:15:18',1,0,0),(17,'28_29',29,'3','2017-07-21 22:17:12',1,0,0),(18,'28_29',29,'4','2017-07-21 22:23:17',1,0,0),(19,'28_29',28,'5','2017-07-21 22:23:39',1,0,0),(20,'24_28',28,'2','2017-07-21 22:27:01',0,0,0),(21,'28_29',28,'Hello','2017-07-21 22:43:25',1,0,0),(22,'24_28',28,'How are you?','2017-07-21 22:44:15',0,0,0),(23,'28_29',29,'How are you?','2017-07-21 22:44:36',1,0,0),(24,'28_29',28,'I am good, thanks, you?','2017-07-21 22:45:03',1,0,0),(25,'28_29',29,'Fine. Thanks.','2017-07-21 22:45:17',1,0,0),(26,'28_29',29,'What are you doing now?','2017-07-21 22:45:33',1,0,0),(27,'28_29',28,'Now I am sending message via En1gma messenger','2017-07-21 22:46:17',1,0,0),(28,'28_29',29,'Awesome!','2017-07-21 22:46:31',1,0,0),(29,'28_29',29,'When can back home?','2017-07-21 23:01:29',1,0,0),(30,'28_29',29,'I am waiting for you.','2017-07-21 23:11:01',1,0,0),(31,'28_29',29,'Come here please.','2017-07-21 23:12:07',1,0,0),(32,'28_29',28,'Any problem?','2017-07-21 23:12:37',1,0,0),(33,'28_29',29,'Yes','2017-07-21 23:12:42',1,0,0),(34,'28_29',29,'Please','2017-07-21 23:14:25',1,0,0),(35,'28_29',29,'Asap','2017-07-21 23:14:57',1,0,0),(36,'28_29',29,'1','2017-07-21 23:15:09',1,0,0),(37,'28_29',29,'2','2017-07-21 23:15:16',1,0,0),(38,'28_29',28,'Ok','2017-07-21 23:15:29',1,0,0),(39,'28_29',29,'3','2017-07-21 23:15:36',1,0,0),(40,'28_29',29,'4','2017-07-21 23:17:02',1,0,0),(41,'28_29',29,'5','2017-07-21 23:19:13',1,0,0),(42,'28_29',29,'6','2017-07-21 23:20:34',1,0,0),(43,'28_29',29,'7','2017-07-21 23:23:33',1,0,0),(44,'28_29',29,'8','2017-07-21 23:23:51',1,0,0),(45,'28_29',29,'9','2017-07-21 23:24:06',1,0,0),(46,'28_29',28,'10','2017-07-21 23:24:36',1,0,0),(47,'28_29',29,'11','2017-07-21 23:24:40',1,0,0),(48,'28_29',29,'12','2017-07-21 23:24:47',1,0,0),(49,'28_29',29,'Great','2017-07-21 23:25:10',1,0,0),(50,'28_29',28,'Hi','2017-07-24 00:06:48',1,0,0),(51,'28_29',28,'2','2017-07-24 01:05:29',1,0,0),(52,'28_29',28,'1','2017-07-24 01:05:29',1,0,0),(53,'28_29',28,'3','2017-07-24 01:05:30',1,0,0),(54,'28_29',28,'4','2017-07-24 01:05:30',1,0,0),(55,'28_29',28,'5','2017-07-24 01:05:33',1,0,0),(56,'28_29',28,'6','2017-07-24 01:05:34',1,0,0),(57,'28_29',28,'7','2017-07-24 01:05:35',1,0,0),(58,'28_29',28,'8','2017-07-24 01:05:36',1,0,0),(59,'28_29',28,'9','2017-07-24 01:05:37',1,0,0),(60,'28_29',28,'10','2017-07-24 01:05:38',1,0,0),(61,'28_29',28,'11','2017-07-24 01:05:39',1,0,0),(62,'28_29',28,'12','2017-07-24 01:05:40',1,0,0),(63,'28_29',28,'13','2017-07-24 01:05:41',1,0,0),(64,'28_29',28,'14','2017-07-24 01:05:43',1,0,0),(65,'28_29',28,'15','2017-07-24 01:05:44',1,0,0),(66,'28_29',28,'16','2017-07-24 01:05:45',1,0,0),(67,'28_29',28,'17','2017-07-24 01:05:47',1,0,0),(68,'28_29',28,'18','2017-07-24 01:05:48',1,0,0),(69,'28_29',28,'19','2017-07-24 01:05:50',1,0,0),(70,'28_29',28,'20','2017-07-24 01:06:03',1,0,0),(71,'28_29',28,'22','2017-07-24 01:06:05',1,0,0),(72,'28_29',28,'23','2017-07-24 01:06:05',1,0,0),(73,'28_29',28,'21','2017-07-24 01:06:06',1,0,0),(74,'28_29',28,'24','2017-07-24 01:06:07',1,0,0),(75,'28_29',28,'25','2017-07-24 01:06:08',1,0,0),(76,'28_29',28,'26','2017-07-24 01:06:09',1,0,0),(77,'28_29',28,'27','2017-07-24 01:06:10',1,0,0),(78,'28_29',28,'28','2017-07-24 01:06:11',1,0,0),(79,'28_29',28,'29','2017-07-24 01:06:12',1,0,0),(80,'28_29',28,'30','2017-07-24 01:06:15',1,0,0),(81,'28_29',28,'31','2017-07-24 01:32:32',1,0,0),(82,'28_29',28,'32','2017-07-24 01:32:54',1,0,0),(83,'28_29',28,'34','2017-07-24 01:39:48',1,0,0),(84,'28_29',28,'35','2017-07-24 01:40:12',1,0,0),(85,'28_29',28,'36','2017-07-24 01:40:14',1,0,0),(86,'28_29',28,'37','2017-07-24 01:40:16',1,0,0),(87,'28_29',29,'38','2017-07-24 02:09:32',1,0,0),(88,'28_29',29,'39','2017-07-24 02:09:59',1,0,0),(89,'28_29',28,'40','2017-07-24 02:15:13',1,0,0),(90,'28_29',29,'41','2017-07-24 02:15:29',1,0,0),(91,'28_29',29,'42','2017-07-24 02:18:28',1,0,0),(92,'28_29',28,'42','2017-07-24 02:18:40',1,0,0),(93,'28_29',28,'43','2017-07-24 02:19:37',1,0,0),(94,'28_29',28,'45','2017-07-24 02:19:48',1,0,0),(95,'28_29',28,'46','2017-07-24 02:19:54',1,0,0),(96,'28_29',29,'47','2017-07-24 02:20:01',1,0,0),(97,'28_29',29,'48','2017-07-24 02:20:05',1,0,0),(98,'28_29',29,'49','2017-07-24 02:20:36',1,0,0),(99,'28_29',29,'50','2017-07-24 02:23:14',1,0,0),(100,'28_29',29,'51','2017-07-24 02:23:27',1,0,0),(101,'28_29',29,'52','2017-07-24 02:23:35',1,0,0),(102,'28_29',29,'53','2017-07-24 03:15:27',1,0,0),(103,'28_29',29,'54','2017-07-24 03:15:30',1,0,0),(104,'28_29',29,'55','2017-07-24 03:17:46',1,0,0),(105,'28_29',29,'56','2017-07-24 03:17:49',1,0,0),(106,'28_29',29,'57','2017-07-24 03:22:15',1,0,0),(107,'28_29',29,'58','2017-07-24 03:22:27',1,0,0),(108,'28_29',29,'5o','2017-07-24 03:24:22',1,0,0),(109,'28_29',29,'60','2017-07-24 03:24:33',1,0,0),(110,'28_29',29,'61','2017-07-24 03:27:31',1,0,0),(111,'28_29',29,'62','2017-07-24 03:27:35',1,0,0),(112,'28_29',29,'63','2017-07-24 03:29:44',1,0,0),(113,'28_29',29,'64','2017-07-24 03:29:47',1,0,0),(114,'28_29',29,'65','2017-07-25 03:29:54',1,0,0),(115,'28_29',29,'66','2017-07-25 03:31:20',1,0,0),(116,'28_29',29,'67','2017-07-25 03:32:54',1,0,0),(117,'28_29',29,'68','2017-07-25 03:33:01',1,0,0),(118,'28_29',29,'69','2017-07-25 03:46:52',1,0,0),(119,'28_29',28,'70','2017-07-25 03:47:00',1,0,0),(120,'28_29',28,'71','2017-07-25 03:47:44',1,0,0),(121,'17_30',30,'Hello','2017-08-03 14:00:54',1,0,0),(122,'17_30',30,'Shazam','2017-08-03 16:10:31',1,0,0),(123,'18_30',30,'Hello','2017-08-04 20:03:08',1,0,0),(124,'18_30',30,'How is most beautiful girl in universe doing','2017-08-04 20:03:53',1,0,0),(125,'17_30',30,'Test','2017-08-04 20:04:32',1,0,0),(126,'18_30',18,'Very good now','2017-08-04 20:07:41',1,0,0),(127,'18_30',18,'How r you?','2017-08-04 20:07:51',1,0,0),(128,'18_30',30,')))))','2017-08-04 20:07:54',1,0,0),(129,'18_30',30,'Who? most workaholic lion in universe???good','2017-08-04 20:09:30',1,0,0),(130,'18_30',30,'But tired......','2017-08-04 20:09:45',1,0,0),(131,'18_30',30,'Do you think i need group messaging?','2017-08-04 20:10:44',1,0,0),(132,'18_30',30,'\\ud83d\\ude00\\ud83d\\ude04\\ud83d\\ude0c\\ud83d\\ude0d\\ud83d\\ude0e\\ud83e\\udd13\\ud83d\\ude33\\ud83d\\udc40\\ud83d\\udc73\\ud83c\\udffb','2017-08-04 20:12:00',1,0,0),(133,'17_30',30,'\\ud83d\\udc73\\ud83c\\udffb\\ud83d\\udc69\\ud83c\\udffc\\ud83d\\udc40\\ud83d\\ude32\\ud83c\\udf2d\\ud83c\\udf4d\\ud83c\\udfc4\\ud83c\\udffe\\ud83d\\ude85\\ud83d\\udcfa','2017-08-04 20:12:29',1,0,0),(134,'18_30',30,'What did you get?','2017-08-04 20:13:22',1,0,0),(135,'18_30',18,'3000$ and 200$ for you','2017-08-04 20:28:17',1,0,0),(136,'18_30',30,'Yes','2017-08-04 20:28:39',1,0,0),(137,'18_30',30,'Thank you','2017-08-04 20:28:50',1,0,0),(138,'17_30',17,'Hello','2017-08-07 17:40:19',1,0,0),(139,'29_35',29,'1','2017-08-09 08:29:39',1,0,0),(140,'29_35',29,'2','2017-08-09 08:30:26',1,0,0),(141,'29_35',35,'3','2017-08-09 08:31:04',1,0,0),(142,'29_35',35,'4','2017-08-09 08:31:26',1,0,0),(143,'29_35',29,'5','2017-08-09 08:33:30',1,0,0),(144,'29_35',35,'6','2017-08-09 08:33:35',1,0,0),(145,'29_35',29,'7','2017-08-09 08:34:17',1,0,0),(146,'29_35',35,'8','2017-08-09 08:35:16',1,0,0),(147,'29_35',29,'9','2017-08-09 08:51:19',0,0,0),(148,'29_35',35,'10','2017-08-09 08:51:27',1,0,0),(149,'29_35',29,'11','2017-08-09 08:51:30',0,0,0),(150,'29_35',35,'12','2017-08-09 08:51:33',1,0,0);

/*Table structure for table `tb_rooms` */

DROP TABLE IF EXISTS `tb_rooms`;

CREATE TABLE `tb_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user1` (`user1`),
  KEY `user2` (`user2`),
  CONSTRAINT `tb_rooms_ibfk_1` FOREIGN KEY (`user1`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tb_rooms_ibfk_2` FOREIGN KEY (`user2`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `tb_rooms` */

insert  into `tb_rooms`(`id`,`name`,`user1`,`user2`,`created_at`) values (2,'17_18',18,17,'2017-06-30 04:08:23'),(7,'24_29',29,24,'2017-07-21 22:00:12'),(9,'17_30',30,17,'2017-08-03 14:00:50'),(10,'18_30',30,18,'2017-08-04 20:02:56'),(11,'29_35',29,35,'2017-08-09 08:29:36');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phonenumber` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `device_token` varchar(512) NOT NULL,
  `device_type` int(2) NOT NULL COMMENT '0:android, 1:ios',
  `reg_time` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id`,`phonenumber`,`last_login`,`device_token`,`device_type`,`reg_time`,`status`) values (17,'+18184722336','2017-07-20 00:00:18','cSa2X3psZN4:APA91bHTcVHowYn5JNmZ74fhUa1N99k_bF_kf8ZVvQMCE9cXRehAJJNT8KTKX40oJN4k-SDJq-91oxaxcXp5RoLQ2rIfjI_ODG-vUg7lq94UmzEU6jQRNOi_CuqNj9gW_ISipGwySkfF',0,'2017-06-30 03:48:53',1),(18,'+18184722334','2017-07-02 15:52:12','eHTHsd6Xd5k:APA91bF9SDNK0Ij5suu5yBZKYk_vLqWtmxQpNpSH1lcG1DBmu07XIEciP4hx3BjS5Q5gi6HC6qmgsYi4uk7Z13xJbH4aQz1UPC6gUHfTShIK8qSIq_xKNMZ0Ato78NBimrDDc42OWUQk',0,'2017-06-30 04:07:49',1),(24,'+8618744331234','2017-07-21 21:26:14','evNXvy8w274:APA91bEgoLhwOdEMvPs6pYdTYEs9KZvGtKdX6Q4FYLIeb9m_t7H4suNqxLC4q5n1G-ymfXBDxAsJg8IBmayP2NHFXlINhf0BmIUIuNM3Gy-aj5in05BVsTfVHE1BXaXO0rMOkKsvd1XH',0,'2017-06-30 12:59:10',1),(29,'+8618744331001','2017-08-09 08:46:02','cY_Gak3lrg4:APA91bH_A4BQuF5XBoEDIt0WxZ894xYRSzqWOyv74Yw-nv1PnnqHAKX60F6O_eNyg5bFEvL8S2Ws-J7khxqPHzEAU4v_8Xenxki_CUGfAbdwG9hdS8MM89ptPB9TRHlAQX2XKP7NYsmO',0,'2017-07-21 21:37:56',1),(30,'+13104009627','2017-08-03 14:00:40','dwoaOo1mJy8:APA91bGx0U4NgvhqPOaJFKZfrgDLkmTtxzWdahDAgTGok86mTFIqEWUO3GuU88E4tCsUa0EVH8jxwxLHl_ZOlN75XmtGxGGAtjA7ZJt5fa-SSVltHd6xBVV9hTaJw_LvS0qjqihC8MRS',1,'2017-08-03 14:00:40',1),(31,'+14088021945','2017-08-08 13:02:50','co76Ob9Zz9c:APA91bHpbzBzK-FNRsrumMkuSiOhkJYq8otue6cTuAZuTXBaRkCyIQBkl5izTj67F5r3E4EvurK_-DMCu0H2K1p8KAEPFd4X8_nX-re1Tp8BfmB-uaxq9m_2i36FFcwDkS0sInbbCfVr',1,'2017-08-07 21:43:41',1),(32,'+14084066195','2017-08-08 12:53:10','ej6Ocwnrjho:APA91bEqo77IDT_V2pdrRM8_Eql67jDY5-oKJ_0zdz12d5kntSaHHq4jSaV2mLWrysdIy6OwotiPLZqEknrwEEa4_qsEo3MvakO8M_nptNfeybVEnVI1-oxTwJhO3d99bO-MuXbtyw82',1,'2017-08-08 12:53:10',1),(33,'+8617189761111','2017-08-09 03:01:08','',1,'2017-08-09 03:01:08',1),(35,'+8617189765309','2017-08-09 08:28:31','cfEhEUSsMk8:APA91bHw-yPtTsfk5z1Uq1q9XxRv3Bcol6V0nddt4IXmAhhWt3FqWmg9JmiY9ofr2GAEDhB1dNEwDUtfilPVNi9w8j1fpIw6q_LpyS5wMbdQarW0QZm27jf9FxpVIHNek1oSagFUStAJ',1,'2017-08-09 08:28:31',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

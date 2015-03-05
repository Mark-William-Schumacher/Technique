-- MySQL dump 10.13  Distrib 5.6.21, for osx10.8 (x86_64)
--
-- Host: localhost    Database: technique
-- ------------------------------------------------------
-- Server version	5.6.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `difficulty` int(11) NOT NULL,
  `solution` int(11) NOT NULL,
  `solution_file` mediumtext NOT NULL,
  `question_file` mediumtext NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,'2014-10-22 22:46:42',3,4,'Log(N),N*Log(N),Log(N)*N<sup>2</sup> ,N<sup>2</sup>,N<sup>3</sup>','<pre> def mystery1(numbers): </br>     n = len(numbers) </br>     total = 0 </br>     i = 0 </br>     while i < len(numbers): </br>         j = i </br>         while j < len(numbers): </br>             total += numbers[i]*numbers[j] </br>             j += 2 </br>         numbers[i] = total </br>         i += 3\" </br> </pre>');
INSERT INTO `question` VALUES (2,'2014-10-22 22:47:36',3,1,'Log(N),N*Log(N),Log(N)*N<sup>2</sup> ,N<sup>2</sup>,N<sup>3</sup>','<pre>def mystery2(numbers): </br>    n = len(numbers) </br>    size = n-1 </br>    while size > 0: </br>        i = 0 </br>        while i < n: </br>            if numbers[i] > numbers[size]: </br>                numbers[i] += 1 </br>                numbers[size] += 1 </br>            i = i + 1 </br>        size = size / 2 # integer arithmetic, rounded down </br></pre> </br>');
INSERT INTO `question` VALUES (4,'2014-11-14 00:00:00',3,5,'Log(N),N*Log(N),Log(N)*N<sup>2</sup> ,N<sup>2</sup>,N<sup>3</sup>','<pre>def mystery3(numbers):  </br>    n = len(numbers) </br>    i = 0 </br>    while i < n: </br>        total = 0 </br>        j = i </br>        while j >= 0: </br>            for k in range(0, j): </br>                total += numbers[k]-numbers[j] </br>            numbers[j] = total </br>            j = j - 2 </br>        i += 5 </br></pre>');
INSERT INTO `question` VALUES (5,'2014-11-14 00:00:00',3,0,'Log(N),N*Log(N),Log(N)*N<sup>2</sup> ,N<sup>2</sup>,N<sup>3</sup>','<pre>def mystery4(numbers): </br>    n = len(numbers) </br>    maxVal = numbers[0] </br>    index = n-1 </br>    while index > 0: </br>        if numbers[index] > maxVal: </br>            maxVal = numbers[index] </br>        index = (int) (index / 1.5) # division truncated down </br>    numbers[0] = maxVal</br> </pre>');
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question_interaction`
--

DROP TABLE IF EXISTS `question_interaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question_interaction` (
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `current` tinyint(1) NOT NULL,
  `got_correct` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`,`question_id`),
  KEY `fk_question_interaction_users_idx` (`user_id`),
  KEY `fk_question_interaction_question1_idx` (`question_id`),
  KEY `user_id` (`user_id`),
  KEY `question_id` (`question_id`),
  KEY `user_id_2` (`user_id`),
  CONSTRAINT `fk_question_interaction_question1` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_question_interaction_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_interaction`
--

LOCK TABLES `question_interaction` WRITE;
/*!40000 ALTER TABLE `question_interaction` DISABLE KEYS */;
INSERT INTO `question_interaction` VALUES (1,1,0,0);
INSERT INTO `question_interaction` VALUES (1,2,0,0);
INSERT INTO `question_interaction` VALUES (1,4,0,0);
INSERT INTO `question_interaction` VALUES (1,5,0,0);
INSERT INTO `question_interaction` VALUES (2,1,0,0);
INSERT INTO `question_interaction` VALUES (3,1,0,1);
INSERT INTO `question_interaction` VALUES (3,2,0,1);
INSERT INTO `question_interaction` VALUES (4,1,0,1);
INSERT INTO `question_interaction` VALUES (4,2,0,0);
INSERT INTO `question_interaction` VALUES (14,1,0,0);
INSERT INTO `question_interaction` VALUES (14,2,0,0);
INSERT INTO `question_interaction` VALUES (14,4,0,0);
INSERT INTO `question_interaction` VALUES (14,5,0,1);
INSERT INTO `question_interaction` VALUES (17,1,0,0);
INSERT INTO `question_interaction` VALUES (17,2,0,0);
INSERT INTO `question_interaction` VALUES (17,4,0,0);
INSERT INTO `question_interaction` VALUES (17,5,0,0);
INSERT INTO `question_interaction` VALUES (19,1,0,0);
INSERT INTO `question_interaction` VALUES (19,2,0,0);
INSERT INTO `question_interaction` VALUES (19,4,0,0);
INSERT INTO `question_interaction` VALUES (19,5,0,0);
INSERT INTO `question_interaction` VALUES (20,1,0,0);
INSERT INTO `question_interaction` VALUES (20,2,0,0);
INSERT INTO `question_interaction` VALUES (20,4,0,0);
INSERT INTO `question_interaction` VALUES (20,5,1,0);
INSERT INTO `question_interaction` VALUES (21,1,0,0);
INSERT INTO `question_interaction` VALUES (21,2,0,1);
INSERT INTO `question_interaction` VALUES (21,4,0,0);
INSERT INTO `question_interaction` VALUES (21,5,0,0);
INSERT INTO `question_interaction` VALUES (22,1,0,0);
INSERT INTO `question_interaction` VALUES (22,2,0,0);
INSERT INTO `question_interaction` VALUES (22,4,1,0);
INSERT INTO `question_interaction` VALUES (23,1,0,0);
INSERT INTO `question_interaction` VALUES (23,2,0,0);
INSERT INTO `question_interaction` VALUES (23,4,0,0);
INSERT INTO `question_interaction` VALUES (23,5,0,1);
INSERT INTO `question_interaction` VALUES (24,1,0,0);
INSERT INTO `question_interaction` VALUES (24,2,0,1);
INSERT INTO `question_interaction` VALUES (24,4,0,0);
INSERT INTO `question_interaction` VALUES (24,5,0,1);
/*!40000 ALTER TABLE `question_interaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(45) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'User Level');
INSERT INTO `roles` VALUES (10,'Admin Level');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `join_date` datetime NOT NULL,
  `first_name` char(12) NOT NULL,
  `last_name` char(12) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `email_2` (`email`),
  FULLTEXT KEY `email_3` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'9mws@queenus.ca','jan1378','2014-10-22 22:53:46','Mark','Schumacher',9000);
INSERT INTO `users` VALUES (2,'leif@queensu.ca','jan1378','2014-10-22 22:53:46','Joe','Rogan',1);
INSERT INTO `users` VALUES (3,'jacob@queensu.ca','jan1378','2014-10-22 22:57:20','Dr Oz','Andreou',1);
INSERT INTO `users` VALUES (4,'jesslynlaporte@gmail.com','jan1378','2014-10-24 00:00:00','Meep',' Laporte',1);
INSERT INTO `users` VALUES (14,'StevenDavis@hotmail.com','jan1378','2014-11-15 22:47:34','Steven','Davis',2);
INSERT INTO `users` VALUES (16,'c@c.com','jan1378','2014-11-19 14:21:09','a','b',1);
INSERT INTO `users` VALUES (17,'d@d.com','jan1378','2014-11-19 14:21:35','a','b',1);
INSERT INTO `users` VALUES (18,'9mws@queensu.ca','b5e29396c69754d1c9772d344b691218','2014-11-19 15:47:01','Mark','Schuamcher',1);
INSERT INTO `users` VALUES (19,'gg@gg.com','9401c466be24c4991c2bd4178fe5f9ac','2014-11-19 15:52:57','g','g',1);
INSERT INTO `users` VALUES (20,'jj@jj.com','9401c466be24c4991c2bd4178fe5f9ac','2014-11-19 16:15:57','Mark','Shoe',0);
INSERT INTO `users` VALUES (21,'c@c.ca','9401c466be24c4991c2bd4178fe5f9ac','2014-11-19 16:17:17','a','b',1);
INSERT INTO `users` VALUES (22,'x@x.ca','9dd4e461268c8034f5c8564e155c67a6','2014-11-19 16:30:45','x','x',0);
INSERT INTO `users` VALUES (23,'jj@k.com','9401c466be24c4991c2bd4178fe5f9ac','2014-11-22 12:58:57','Mark','Shoe',1);
INSERT INTO `users` VALUES (24,'j@k.com','9401c466be24c4991c2bd4178fe5f9ac','2014-11-22 13:05:13','Rodger','Marris',2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_roles`
--

DROP TABLE IF EXISTS `users_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_roles` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `fk_users_roles_users1_idx` (`user_id`),
  CONSTRAINT `fk_users_roles_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_roles_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_roles`
--

LOCK TABLES `users_roles` WRITE;
/*!40000 ALTER TABLE `users_roles` DISABLE KEYS */;
INSERT INTO `users_roles` VALUES (10,1);
INSERT INTO `users_roles` VALUES (1,2);
INSERT INTO `users_roles` VALUES (1,3);
INSERT INTO `users_roles` VALUES (10,4);
INSERT INTO `users_roles` VALUES (1,14);
INSERT INTO `users_roles` VALUES (1,16);
INSERT INTO `users_roles` VALUES (1,17);
INSERT INTO `users_roles` VALUES (1,18);
INSERT INTO `users_roles` VALUES (1,19);
INSERT INTO `users_roles` VALUES (1,20);
INSERT INTO `users_roles` VALUES (1,21);
INSERT INTO `users_roles` VALUES (1,22);
INSERT INTO `users_roles` VALUES (1,23);
INSERT INTO `users_roles` VALUES (1,24);
/*!40000 ALTER TABLE `users_roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-22 13:06:46

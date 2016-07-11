-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cmlux
-- ------------------------------------------------------
-- Server version	5.7.13-log

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
-- Table structure for table `contenus`
--

DROP TABLE IF EXISTS `contenus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contenus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `con_type` varchar(45) NOT NULL,
  `con_title` varchar(45) NOT NULL,
  `con_dateStart` varchar(45) NOT NULL,
  `con_dateEnd` varchar(45) NOT NULL,
  `con_synopsis` varchar(45) NOT NULL,
  `con_description` varchar(45) DEFAULT NULL,
  `con_avatar` varchar(45) NOT NULL,
  `con_gallery` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Données concernant les informations pour les news, events et reportages';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenus`
--

LOCK TABLES `contenus` WRITE;
/*!40000 ALTER TABLE `contenus` DISABLE KEYS */;
/*!40000 ALTER TABLE `contenus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exposants`
--

DROP TABLE IF EXISTS `exposants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exposants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exp_userName` varchar(45) NOT NULL,
  `exp_nameEposants` varchar(45) NOT NULL,
  `exp_nameInCharge` varchar(45) NOT NULL,
  `exp_firsNameInCharge` varchar(45) NOT NULL,
  `exp_adress` varchar(45) NOT NULL,
  `exp_city` varchar(45) NOT NULL,
  `exp_postCode` varchar(45) NOT NULL,
  `spo_Country` varchar(45) NOT NULL,
  `exp_phone` varchar(45) NOT NULL,
  `exp_mobile` varchar(45) DEFAULT NULL,
  `exp_fax` varchar(45) DEFAULT NULL,
  `exp_emailIncharge` varchar(45) NOT NULL,
  `exp_emailGeneral` varchar(45) DEFAULT NULL,
  `exp_typeExposants` varchar(45) NOT NULL,
  `exp_avatar` varchar(45) DEFAULT NULL,
  `exp_gallery` varchar(45) DEFAULT NULL,
  `exp__descriptionSponsors` varchar(45) DEFAULT NULL,
  `exp_url` varchar(45) DEFAULT NULL,
  `exp_pagote` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Données correspondant à toutes les données pour l''exposant';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exposants`
--

LOCK TABLES `exposants` WRITE;
/*!40000 ALTER TABLE `exposants` DISABLE KEYS */;
/*!40000 ALTER TABLE `exposants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeries`
--

DROP TABLE IF EXISTS `galeries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galeries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gal_name` varchar(45) NOT NULL,
  `gal_path` varchar(45) NOT NULL,
  `gal_legend` varchar(45) DEFAULT NULL,
  `gal_order` varchar(45) DEFAULT NULL,
  `gal_description` varchar(45) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`users_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `gal_name_UNIQUE` (`gal_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='noms des galleries où seront liées aux photos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeries`
--

LOCK TABLES `galeries` WRITE;
/*!40000 ALTER TABLE `galeries` DISABLE KEYS */;
/*!40000 ALTER TABLE `galeries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `par_username` varchar(45) NOT NULL,
  `par_name` varchar(45) NOT NULL,
  `par_firstName` varchar(45) NOT NULL,
  `par_adress` varchar(45) DEFAULT NULL,
  `par_city` varchar(45) DEFAULT NULL,
  `par_postCode` varchar(45) DEFAULT NULL,
  `par_country` varchar(45) DEFAULT NULL,
  `par_phone` varchar(45) NOT NULL,
  `par_fax` varchar(45) DEFAULT NULL,
  `par_email` varchar(45) NOT NULL,
  `par_avatar` varchar(45) DEFAULT NULL,
  `par_gallery` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `par_username_UNIQUE` (`par_username`),
  UNIQUE KEY `par_email_UNIQUE` (`par_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Données cocnernant tous les particpants, privés, socitétés, ou autres, voulant exposer leurs voitures (une ou plusieur)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pho_name` varchar(45) DEFAULT NULL,
  `pho_path` varchar(45) NOT NULL,
  `pho_legend` varchar(45) DEFAULT NULL,
  `pho_date` varchar(45) DEFAULT NULL,
  `phot_order` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='liens de stockages photos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_name` varchar(45) NOT NULL,
  `rol_description` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `rol_name_UNIQUE` (`rol_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Définition des droits d''accès aux différents formulaires et insertions données';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsors`
--

DROP TABLE IF EXISTS `sponsors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spo_userName` varchar(45) NOT NULL,
  `spo_nameSponsors` varchar(45) NOT NULL,
  `spo_nameInCharge` varchar(45) NOT NULL,
  `spo_firsNameInCharge` varchar(45) NOT NULL,
  `spo_adress` varchar(45) NOT NULL,
  `spo_city` varchar(45) NOT NULL,
  `spo_postCode` varchar(45) NOT NULL,
  `spo_Country` varchar(45) NOT NULL,
  `spo_phone` varchar(45) NOT NULL,
  `spo_mobile` varchar(45) DEFAULT NULL,
  `spo_fax` varchar(45) DEFAULT NULL,
  `spo_emailIncharge` varchar(45) NOT NULL,
  `spo_emailGeneral` varchar(45) DEFAULT NULL,
  `spo_typeSponsors` varchar(45) NOT NULL,
  `spo_avatar` varchar(45) DEFAULT NULL,
  `spo_gallery` varchar(45) DEFAULT NULL,
  `spo_url` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `spo_userName_UNIQUE` (`spo_userName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Données reprennant toutes les informations concernant le sponsors et la personnne de contacte';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsors`
--

LOCK TABLES `sponsors` WRITE;
/*!40000 ALTER TABLE `sponsors` DISABLE KEYS */;
/*!40000 ALTER TABLE `sponsors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typ_exposants`
--

DROP TABLE IF EXISTS `typ_exposants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typ_exposants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typ_expo_name` varchar(45) NOT NULL,
  `typ_spon_description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `typ_expo_name_UNIQUE` (`typ_expo_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typ_exposants`
--

LOCK TABLES `typ_exposants` WRITE;
/*!40000 ALTER TABLE `typ_exposants` DISABLE KEYS */;
/*!40000 ALTER TABLE `typ_exposants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typ_sponsors`
--

DROP TABLE IF EXISTS `typ_sponsors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typ_sponsors` (
  `id` int(11) NOT NULL,
  `typ_spon_name` varchar(45) NOT NULL,
  `typ_spon_description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `typ_spon_name_UNIQUE` (`typ_spon_name`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typ_sponsors`
--

LOCK TABLES `typ_sponsors` WRITE;
/*!40000 ALTER TABLE `typ_sponsors` DISABLE KEYS */;
/*!40000 ALTER TABLE `typ_sponsors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `use_userName` varchar(45) NOT NULL,
  `use_name` varchar(45) NOT NULL,
  `use_firstName` varchar(45) NOT NULL,
  `use_adress` varchar(45) NOT NULL,
  `use_postCode` varchar(45) NOT NULL,
  `use_phone` varchar(45) NOT NULL,
  `use_fax` varchar(45) NOT NULL,
  `use_email` varchar(45) NOT NULL,
  `use_password` varchar(45) NOT NULL,
  `use_role` varchar(45) DEFAULT NULL,
  `use_dateCreation` varchar(45) DEFAULT NULL,
  `use_type` varchar(45) DEFAULT NULL,
  `use_roleOpt1` varchar(45) DEFAULT NULL,
  `use_roleOpt2` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `use_userName_UNIQUE` (`use_userName`),
  UNIQUE KEY `use_email_UNIQUE` (`use_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tables pour l''inscription des participants, représentants ou demandeurs pour des exposants ou sponsors';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_has_participants`
--

DROP TABLE IF EXISTS `users_has_participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_has_participants` (
  `users_id` int(11) NOT NULL,
  `users_role_id` int(11) NOT NULL,
  `participants_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_has_participants`
--

LOCK TABLES `users_has_participants` WRITE;
/*!40000 ALTER TABLE `users_has_participants` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_has_participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_has_role`
--

DROP TABLE IF EXISTS `users_has_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_has_role` (
  `users_id` int(11) NOT NULL,
  `users_role_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_has_role`
--

LOCK TABLES `users_has_role` WRITE;
/*!40000 ALTER TABLE `users_has_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_has_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_has_sponsors`
--

DROP TABLE IF EXISTS `users_has_sponsors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_has_sponsors` (
  `users_id` int(11) NOT NULL,
  `users_role_id` int(11) NOT NULL,
  `sponsors_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_has_sponsors`
--

LOCK TABLES `users_has_sponsors` WRITE;
/*!40000 ALTER TABLE `users_has_sponsors` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_has_sponsors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-08 16:26:30

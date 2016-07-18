-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Sam 16 Juillet 2016 à 17:44
-- Version du serveur :  5.7.13-log
-- Version de PHP :  5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cmlux`
--

-- --------------------------------------------------------

--
-- Structure de la table `contenus`
--

CREATE TABLE `contenus` (
  `id` int(11) NOT NULL,
  `con_type` varchar(45) NOT NULL,
  `con_title` varchar(45) NOT NULL,
  `con_dateStart` varchar(45) NOT NULL,
  `con_dateEnd` varchar(45) NOT NULL,
  `con_synopsis` varchar(45) NOT NULL,
  `con_description` varchar(45) DEFAULT NULL,
  `con_avatar` varchar(45) NOT NULL,
  `con_gallery` varchar(45) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `users_role_id` int(11) NOT NULL,
  `contenus_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Données concernant les informations pour les news, events et reportages';

--
-- Contenu de la table `contenus`
--

INSERT INTO `contenus` (`id`, `con_type`, `con_title`, `con_dateStart`, `con_dateEnd`, `con_synopsis`, `con_description`, `con_avatar`, `con_gallery`, `users_id`, `users_role_id`, `contenus_type_id`) VALUES
(2, 'News', 'Test Patrick Modifiééééé', '2016-07-06', '2016-07-21', 'Test petite phrase modifié', 'Connexion avec la base de donnée modifié', 'upload/TestPatrickModifiééééé2.gif', 'patrick', 1, 2, 1),
(3, 'bordel', 'NOVO EVENTO', '2016-07-21', '2016-10-27', 'synopsis', 'azeaz 5646zae aze58464 az e', '', NULL, 1, 1, 2),
(4, 'Cartada', 'Sueca - sobe e desce - Poker', '2016-07-28', '2016-07-30', 'Comes e bebes à parte', 'zerzerzzerzer', '', NULL, 2, 2, 3),
(5, 'Bilhar', 'Bilhar de bolso', '2016-07-14', '2016-10-20', 'Desafio total', 'Bolas nos buracos', '', NULL, 1, 2, 3),
(6, '---', 'AQUI vou EU para a costa', '2016-08-15', '2016-09-14', 'praia praia praia', 'agua+ sal + areia = comichao', '', NULL, 2, 1, 1),
(12, 'News', 'sdfsdf', '2016-07-06', '2016-07-30', 'ssdfsdfsdfs', 'sdfdsfsdf', 'upload/EP-nl7c8lkfOzcu6BCX_.jpg', NULL, 1, 1, 1),
(13, 'News', 'zerze', '2016-07-15', '2016-07-31', 'zerzerzerzer', 'zerzerzerzer', 'upload/DKnqrZ-QUE558YKB__zG.jpg', NULL, 1, 1, 1),
(14, 'Reportages', 'vamos ver se funciona', '2016-07-23', '2016-07-24', 'eyer', 'zerzerzer', 'upload/CPxOsGyOa_AQyJfP2FeD.jpg', NULL, 1, 1, 1),
(15, 'Reportages', 'vamos la', '2016-07-23', '2016-07-31', 'azeazeaz', 'azazaaazeaze4646464645', 'upload/cN1OBaYB_LGzQY50HN23.jpg', NULL, 1, 1, 1),
(16, 'Reportages', 'vamos la', '2016-07-23', '2016-07-31', 'azeazeaz', 'azazaaazeaze4646464645', 'upload/fnndBIsaBu52vKGr9Gw6.jpg', NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contenus_has_galeries`
--

CREATE TABLE `contenus_has_galeries` (
  `contenus_id` int(11) NOT NULL,
  `contenus_users_id` int(11) NOT NULL,
  `galeries_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contenus_has_galeries`
--

INSERT INTO `contenus_has_galeries` (`contenus_id`, `contenus_users_id`, `galeries_id`) VALUES
(2, 1, 1),
(5, 1, 1),
(4, 2, 2),
(5, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `contenus_type`
--

CREATE TABLE `contenus_type` (
  `id` int(11) NOT NULL,
  `ty_name` varchar(45) NOT NULL,
  `ty_description` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contenus_type`
--

INSERT INTO `contenus_type` (`id`, `ty_name`, `ty_description`) VALUES
(1, 'News', 'Des nouvelles à venir courtes'),
(2, 'Reportages', ''),
(3, 'Events', ''),
(4, 'Articles', '');

-- --------------------------------------------------------

--
-- Structure de la table `exposants`
--

CREATE TABLE `exposants` (
  `id` int(11) NOT NULL,
  `exp_name_eposants` varchar(45) NOT NULL,
  `exp_name_in_charge` varchar(45) NOT NULL,
  `exp_firs_name_in_charge` varchar(45) NOT NULL,
  `exp_adress` varchar(45) NOT NULL,
  `exp_city` varchar(45) NOT NULL,
  `exp_post_code` varchar(45) NOT NULL,
  `spo_Country` varchar(45) NOT NULL,
  `exp_phone` varchar(45) NOT NULL,
  `exp_mobile` varchar(45) DEFAULT NULL,
  `exp_fax` varchar(45) DEFAULT NULL,
  `exp_email_incharge` varchar(45) NOT NULL,
  `exp_email_general` varchar(45) DEFAULT NULL,
  `exp_avatar` varchar(45) DEFAULT NULL,
  `exp_gallery` varchar(45) DEFAULT NULL,
  `exp__description_sponsors` varchar(45) DEFAULT NULL,
  `exp_url` varchar(45) DEFAULT NULL,
  `exp_pagote` varchar(45) DEFAULT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Données correspondant à toutes les données pour l''exposant';

-- --------------------------------------------------------

--
-- Structure de la table `exposants_has_typ_exposants`
--

CREATE TABLE `exposants_has_typ_exposants` (
  `exposants_id` int(11) NOT NULL,
  `exposants_users_id` int(11) NOT NULL,
  `typ_exposants_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `galeries`
--

CREATE TABLE `galeries` (
  `id` int(11) NOT NULL,
  `gal_name` varchar(45) NOT NULL,
  `gal_path` varchar(150) NOT NULL,
  `gal_legend` varchar(45) DEFAULT NULL,
  `gal_order` varchar(45) DEFAULT NULL,
  `gal_description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='noms des galleries où seront liées aux photos';

--
-- Contenu de la table `galeries`
--

INSERT INTO `galeries` (`id`, `gal_name`, `gal_path`, `gal_legend`, `gal_order`, `gal_description`) VALUES
(1, 'Concours d\'Elegance 2015', 'C:\\xampp\\htdocs\\patrickPHP\\WF3_MACAP\\WF3_MACAP\\galeries\\2015_concours_elegance', 'Reportage RTL.LU', '1', 'Toutes les voitures des participants 2015'),
(2, 'Concours d\'Elegance 2016', 'C:\\xampp\\htdocs\\patrickPHP\\WF3_MACAP\\WF3_MACAP\\galeries\\2016_concours_elegance', 'Reportage par Albert Wetz', NULL, 'Toutes les voitures des participants 2016'),
(3, 'Rallye Casino 2000 Mondorf 2015', 'C:\\xampp\\htdocs\\patrickPHP\\WF3_MACAP\\WF3_MACAP\\galeries\\2015_rallye', 'Reportage divers 2015', NULL, 'Divers photos des participants 2015'),
(4, 'Rallye Casino 2000 Mondorf 2014', 'C:\\xampp\\htdocs\\patrickPHP\\WF3_MACAP\\WF3_MACAP\\galeries\\2014_rallye', 'Reportage divers 2014', NULL, 'Divers photos des participants 2014');

-- --------------------------------------------------------

--
-- Structure de la table `galeries_has_photos`
--

CREATE TABLE `galeries_has_photos` (
  `galeries_id` int(11) NOT NULL,
  `photos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `galeries_has_photos`
--

INSERT INTO `galeries_has_photos` (`galeries_id`, `photos_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20);

-- --------------------------------------------------------

--
-- Structure de la table `magazine`
--

CREATE TABLE `magazine` (
  `id` int(11) NOT NULL,
  `mag_name` varchar(45) NOT NULL,
  `mag_path` varchar(100) NOT NULL,
  `mag_couverture` varchar(100) NOT NULL,
  `mag_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `magazine`
--

INSERT INTO `magazine` (`id`, `mag_name`, `mag_path`, `mag_couverture`, `mag_date`) VALUES
(1, 'Concours Mondorf-les-Bains 2015', 'WF3_MACAP\\magazines\\MAG MAW 2016 VersionFinaleALBERT.pdf', 'WF3_MACAP\\magazines\\couverture.jpg', '2016-07-14');

-- --------------------------------------------------------

--
-- Structure de la table `magazine_has_users_has_role`
--

CREATE TABLE `magazine_has_users_has_role` (
  `magazine_id` int(11) NOT NULL,
  `users_has_role_users_id` int(11) NOT NULL,
  `users_has_role_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `par_name` varchar(45) NOT NULL,
  `par_first_name` varchar(45) NOT NULL,
  `par_adress` varchar(45) DEFAULT NULL,
  `par_city` varchar(45) DEFAULT NULL,
  `par_post_code` varchar(45) DEFAULT NULL,
  `par_country` varchar(45) DEFAULT NULL,
  `par_phone` varchar(45) NOT NULL,
  `par_fax` varchar(45) DEFAULT NULL,
  `par_email` varchar(45) NOT NULL,
  `par_avatar` varchar(45) DEFAULT NULL,
  `par_gallery` varchar(45) DEFAULT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Données cocnernant tous les particpants, privés, socitétés, ou autres, voulant exposer leurs voitures (une ou plusieur)';

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `pho_name` varchar(45) DEFAULT NULL,
  `pho_path` varchar(100) NOT NULL,
  `pho_legend` varchar(45) DEFAULT NULL,
  `pho_date` varchar(45) DEFAULT NULL,
  `phot_order` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='liens de stockages photos';

--
-- Contenu de la table `photos`
--

INSERT INTO `photos` (`id`, `pho_name`, `pho_path`, `pho_legend`, `pho_date`, `phot_order`) VALUES
(1, '2015-01', 'WF3_MACAP\\photos\\2015_concours_elegance\\2015-01.jpg', 'Ferrari Enzo', '30 August 2015', NULL),
(2, '2015-02', 'WF3_MACAP\\photos\\2015_concours_elegance\\2015-02.jpg', 'Ferrari Club Luxembourg', '30 August 2015', NULL),
(3, '2015-03', 'WF3_MACAP\\photos\\2015_concours_elegance\\2015-03.jpg', 'Ferrari Club Luxembourg', '30 August 2015', NULL),
(4, '2015-04', 'WF3_MACAP\\photos\\2015_concours_elegance\\2015-04.jpg', 'Jaguar', '30 August 2015', NULL),
(5, '2015-05', 'WF3_MACAP\\photos\\2015_concours_elegance\\2015-05.jpg', 'Motos', '30 August 2015', NULL),
(6, '2015-06', 'WF3_MACAP\\photos\\2015_concours_elegance\\2015-06.jpg', 'Old Lady', '30 August 2015', NULL),
(7, '2015-07', 'WF3_MACAP\\photos\\2015_concours_elegance\\2015-07.jpg', 'Chopard', '30 August 2015', NULL),
(8, '2015-08', 'WF3_MACAP\\photos\\2015_concours_elegance\\2015-08.jpg', 'Alfa Romeo', '30 August 2015', NULL),
(9, '2015-09', 'WF3_MACAP\\photos\\2015_concours_elegance\\2015-09.jpg', 'Jaguar', '30 August 2015', NULL),
(10, '2015-10', 'WF3_MACAP\\photos\\2015_concours_elegance\\2015-10.jpg', 'Cadillac', '30 August 2015', NULL),
(11, '2015-11', 'WF3_MACAP\\photos\\2015_concours_elegance\\2015-11.jpg', 'Rolls Royce', '30 August 2015', NULL),
(12, '2015-12', 'WF3_MACAP\\photos\\2015_concours_elegance\\2015-12.jpg', 'Maybach', '30 August 2015', NULL),
(13, '2015-13', 'WF3_MACAP\\photos\\2015_concours_elegance\\2015-13.jpg', 'Renault AX 1910', '30 August 2015', NULL),
(14, '2015-14', 'WF3_MACAP\\photos\\2015_concours_elegance\\2015-14.jpg', 'Mondorf', '30 August 2015', NULL),
(15, '2015-15', 'WF3_MACAP\\photos\\2015_concours_elegance\\2015-15.jpg', 'Promenade', '30 August 2015', NULL),
(16, '2015-16', 'WF3_MACAP\\photos\\2015_concours_elegance\\2015-16.jpg', 'Proud Winners', '30 August 2015', NULL),
(17, '2015-17', 'WF3_MACAP\\photos\\2015_concours_elegance\\2015-17.jpg', 'Promenade style', '30 August 2015', NULL),
(18, '2015-18', 'WF3_MACAP\\photos\\2015_concours_elegance\\2015-18.jpg', 'Bugatti', '30 August 2015', NULL),
(19, '2015-19', 'WF3_MACAP\\photos\\2015_concours_elegance\\2015-19.jpg', 'Promenade', '30 August 2015', NULL),
(20, '2015-20', 'WF3_MACAP\\photos\\2015_concours_elegance\\2015-20.jpg', 'Style at his best', '30 August 2015', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `rol_name` varchar(45) NOT NULL,
  `rol_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Définition des droits d''accès aux différents formulaires et insertions données';

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `rol_name`, `rol_description`) VALUES
(1, 'user', 'role basique'),
(2, 'admin', 'Administrateur du site'),
(3, 'Participant', 'Uniquement les inscrits au concours ou rallye'),
(4, 'Exposant', 'Tous types d\'exposants (voitures, accéssoires, etc.)'),
(5, 'Sponsor', '');

-- --------------------------------------------------------

--
-- Structure de la table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL,
  `spo_name_sponsors` varchar(45) NOT NULL,
  `spo_name_in_charge` varchar(45) NOT NULL,
  `spo_firs_name_in_charge` varchar(45) NOT NULL,
  `spo_adress` varchar(45) NOT NULL,
  `spo_city` varchar(45) NOT NULL,
  `spo_post_code` varchar(45) NOT NULL,
  `spo_country` varchar(45) NOT NULL,
  `spo_phone` varchar(45) NOT NULL,
  `spo_mobile` varchar(45) DEFAULT NULL,
  `spo_fax` varchar(45) DEFAULT NULL,
  `spo_email_incharge` varchar(45) NOT NULL,
  `spo_email_general` varchar(45) DEFAULT NULL,
  `spo_avatar` varchar(45) DEFAULT NULL,
  `spo_gallery` varchar(45) DEFAULT NULL,
  `spo_url` varchar(45) DEFAULT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Données reprennant toutes les informations concernant le sponsors et la personnne de contacte';

-- --------------------------------------------------------

--
-- Structure de la table `sponsors_has_typ_sponsors`
--

CREATE TABLE `sponsors_has_typ_sponsors` (
  `sponsors_id` int(11) NOT NULL,
  `sponsors_users_id` int(11) NOT NULL,
  `typ_sponsors_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typ_exposants`
--

CREATE TABLE `typ_exposants` (
  `id` int(11) NOT NULL,
  `typ_expo_name` varchar(45) NOT NULL,
  `typ_spon_description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typ_sponsors`
--

CREATE TABLE `typ_sponsors` (
  `id` int(11) NOT NULL,
  `typ_spon_name` varchar(45) NOT NULL,
  `typ_spon_description` varchar(45) DEFAULT NULL,
  `users_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `use_userName` varchar(45) NOT NULL,
  `use_name` varchar(45) NOT NULL,
  `use_firstName` varchar(45) NOT NULL,
  `use_adress` varchar(45) NOT NULL,
  `use_post_code` varchar(45) NOT NULL,
  `use_city` varchar(45) DEFAULT NULL,
  `use_phone` varchar(45) NOT NULL,
  `use_fax` varchar(45) NOT NULL,
  `use_email` varchar(45) NOT NULL,
  `use_password` varchar(60) NOT NULL,
  `use_date_creation` date DEFAULT NULL,
  `use_type` varchar(45) DEFAULT NULL,
  `use_role_opt1` varchar(45) DEFAULT NULL,
  `use_role_opt2` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tables pour l''inscription des participants, représentants ou demandeurs pour des exposants ou sponsors';

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `use_userName`, `use_name`, `use_firstName`, `use_adress`, `use_post_code`, `use_city`, `use_phone`, `use_fax`, `use_email`, `use_password`, `use_date_creation`, `use_type`, `use_role_opt1`, `use_role_opt2`) VALUES
(3, 'raven095', 'Reuter', 'Marc', '4a rue du cimetière', '3350 Leudelange', NULL, '621149680', '', 'marc.reuter095@gmail.com', '$2y$10$Le3vp0KfS2zId6WIl9k7Eu2rYyF583oIikZRJiUVQyyU2LJ509Hsi', '2016-07-14', NULL, '2', NULL),
(4, 'pcoelho', 'Coelho', 'Patrick', '39 rue Sigefroi', '3280', NULL, '00352621000000', '', 'pcoelho@psgroup.lu', '$2y$10$mlznUzWGfkKOWvDGs8SAou04XwqjfLoldhOugcubQttX62aYlBM9.', '2016-07-14', NULL, '2', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users_has_contenus`
--

CREATE TABLE `users_has_contenus` (
  `users_id` int(11) NOT NULL,
  `contenus_id` int(11) NOT NULL,
  `contenus_users_id` int(11) NOT NULL,
  `contenus_users_role_id` int(11) NOT NULL,
  `contenus_contenus_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users_has_exposants`
--

CREATE TABLE `users_has_exposants` (
  `users_id` int(11) NOT NULL,
  `exposants_id` int(11) NOT NULL,
  `exposants_users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users_has_participants`
--

CREATE TABLE `users_has_participants` (
  `users_id` int(11) NOT NULL,
  `participants_id` int(11) NOT NULL,
  `participants_users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users_has_role`
--

CREATE TABLE `users_has_role` (
  `users_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users_has_sponsors`
--

CREATE TABLE `users_has_sponsors` (
  `users_id` int(11) NOT NULL,
  `sponsors_id` int(11) NOT NULL,
  `sponsors_users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `contenus`
--
ALTER TABLE `contenus`
  ADD PRIMARY KEY (`id`,`users_id`,`users_role_id`,`contenus_type_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_contenus_users1_idx` (`users_id`,`users_role_id`),
  ADD KEY `fk_contenus_contenus_type1_idx` (`contenus_type_id`);

--
-- Index pour la table `contenus_has_galeries`
--
ALTER TABLE `contenus_has_galeries`
  ADD PRIMARY KEY (`contenus_id`,`contenus_users_id`,`galeries_id`),
  ADD KEY `fk_contenus_has_galeries_galeries1_idx` (`galeries_id`),
  ADD KEY `fk_contenus_has_galeries_contenus1_idx` (`contenus_id`,`contenus_users_id`);

--
-- Index pour la table `contenus_type`
--
ALTER TABLE `contenus_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `ty_name_UNIQUE` (`ty_name`);

--
-- Index pour la table `exposants`
--
ALTER TABLE `exposants`
  ADD PRIMARY KEY (`id`,`users_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_exposants_users1_idx` (`users_id`);

--
-- Index pour la table `exposants_has_typ_exposants`
--
ALTER TABLE `exposants_has_typ_exposants`
  ADD PRIMARY KEY (`exposants_id`,`exposants_users_id`,`typ_exposants_id`),
  ADD KEY `fk_exposants_has_typ_exposants_typ_exposants1_idx` (`typ_exposants_id`),
  ADD KEY `fk_exposants_has_typ_exposants_exposants1_idx` (`exposants_id`,`exposants_users_id`);

--
-- Index pour la table `galeries`
--
ALTER TABLE `galeries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `gal_name_UNIQUE` (`gal_name`);

--
-- Index pour la table `galeries_has_photos`
--
ALTER TABLE `galeries_has_photos`
  ADD PRIMARY KEY (`galeries_id`,`photos_id`),
  ADD KEY `fk_galeries_has_photos_photos1_idx` (`photos_id`),
  ADD KEY `fk_galeries_has_photos_galeries1_idx` (`galeries_id`);

--
-- Index pour la table `magazine`
--
ALTER TABLE `magazine`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mag_name_UNIQUE` (`mag_name`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Index pour la table `magazine_has_users_has_role`
--
ALTER TABLE `magazine_has_users_has_role`
  ADD PRIMARY KEY (`magazine_id`,`users_has_role_users_id`,`users_has_role_role_id`),
  ADD KEY `fk_magazine_has_users_has_role_users_has_role1_idx` (`users_has_role_users_id`,`users_has_role_role_id`),
  ADD KEY `fk_magazine_has_users_has_role_magazine1_idx` (`magazine_id`);

--
-- Index pour la table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`,`users_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `par_email_UNIQUE` (`par_email`),
  ADD KEY `fk_participants_users1_idx` (`users_id`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `rol_name_UNIQUE` (`rol_name`);

--
-- Index pour la table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`,`users_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_sponsors_users1_idx` (`users_id`);

--
-- Index pour la table `sponsors_has_typ_sponsors`
--
ALTER TABLE `sponsors_has_typ_sponsors`
  ADD PRIMARY KEY (`sponsors_id`,`sponsors_users_id`,`typ_sponsors_id`),
  ADD KEY `fk_sponsors_has_typ_sponsors_typ_sponsors1_idx` (`typ_sponsors_id`),
  ADD KEY `fk_sponsors_has_typ_sponsors_sponsors1_idx` (`sponsors_id`,`sponsors_users_id`);

--
-- Index pour la table `typ_exposants`
--
ALTER TABLE `typ_exposants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `typ_expo_name_UNIQUE` (`typ_expo_name`);

--
-- Index pour la table `typ_sponsors`
--
ALTER TABLE `typ_sponsors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `typ_spon_name_UNIQUE` (`typ_spon_name`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `use_userName_UNIQUE` (`use_userName`),
  ADD UNIQUE KEY `use_email_UNIQUE` (`use_email`);

--
-- Index pour la table `users_has_contenus`
--
ALTER TABLE `users_has_contenus`
  ADD PRIMARY KEY (`users_id`,`contenus_id`,`contenus_users_id`,`contenus_users_role_id`,`contenus_contenus_type_id`),
  ADD KEY `fk_users_has_contenus_contenus1_idx` (`contenus_id`,`contenus_users_id`,`contenus_users_role_id`,`contenus_contenus_type_id`),
  ADD KEY `fk_users_has_contenus_users1_idx` (`users_id`);

--
-- Index pour la table `users_has_exposants`
--
ALTER TABLE `users_has_exposants`
  ADD PRIMARY KEY (`users_id`,`exposants_id`,`exposants_users_id`),
  ADD KEY `fk_users_has_exposants_exposants1_idx` (`exposants_id`,`exposants_users_id`),
  ADD KEY `fk_users_has_exposants_users1_idx` (`users_id`);

--
-- Index pour la table `users_has_participants`
--
ALTER TABLE `users_has_participants`
  ADD PRIMARY KEY (`users_id`,`participants_id`,`participants_users_id`),
  ADD KEY `fk_users_has_participants_participants1_idx` (`participants_id`,`participants_users_id`),
  ADD KEY `fk_users_has_participants_users1_idx` (`users_id`);

--
-- Index pour la table `users_has_role`
--
ALTER TABLE `users_has_role`
  ADD PRIMARY KEY (`users_id`,`role_id`),
  ADD KEY `fk_users_has_role_role1_idx` (`role_id`),
  ADD KEY `fk_users_has_role_users1_idx` (`users_id`);

--
-- Index pour la table `users_has_sponsors`
--
ALTER TABLE `users_has_sponsors`
  ADD PRIMARY KEY (`users_id`,`sponsors_id`,`sponsors_users_id`),
  ADD KEY `fk_users_has_sponsors_sponsors1_idx` (`sponsors_id`,`sponsors_users_id`),
  ADD KEY `fk_users_has_sponsors_users1_idx` (`users_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `contenus`
--
ALTER TABLE `contenus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `contenus_has_galeries`
--
ALTER TABLE `contenus_has_galeries`
  MODIFY `contenus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `contenus_type`
--
ALTER TABLE `contenus_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `exposants`
--
ALTER TABLE `exposants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `galeries`
--
ALTER TABLE `galeries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `magazine`
--
ALTER TABLE `magazine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `typ_exposants`
--
ALTER TABLE `typ_exposants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `typ_sponsors`
--
ALTER TABLE `typ_sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `contenus`
--
ALTER TABLE `contenus`
  ADD CONSTRAINT `fk_contenus_contenus_type1` FOREIGN KEY (`contenus_type_id`) REFERENCES `contenus_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `contenus_has_galeries`
--
ALTER TABLE `contenus_has_galeries`
  ADD CONSTRAINT `fk_contenus_has_galeries_contenus1` FOREIGN KEY (`contenus_id`,`contenus_users_id`) REFERENCES `contenus` (`id`, `users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contenus_has_galeries_galeries1` FOREIGN KEY (`galeries_id`) REFERENCES `galeries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `exposants_has_typ_exposants`
--
ALTER TABLE `exposants_has_typ_exposants`
  ADD CONSTRAINT `fk_exposants_has_typ_exposants_exposants1` FOREIGN KEY (`exposants_id`,`exposants_users_id`) REFERENCES `exposants` (`id`, `users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_exposants_has_typ_exposants_typ_exposants1` FOREIGN KEY (`typ_exposants_id`) REFERENCES `typ_exposants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `galeries_has_photos`
--
ALTER TABLE `galeries_has_photos`
  ADD CONSTRAINT `fk_galeries_has_photos_galeries1` FOREIGN KEY (`galeries_id`) REFERENCES `galeries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_galeries_has_photos_photos1` FOREIGN KEY (`photos_id`) REFERENCES `photos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `magazine_has_users_has_role`
--
ALTER TABLE `magazine_has_users_has_role`
  ADD CONSTRAINT `fk_magazine_has_users_has_role_magazine1` FOREIGN KEY (`magazine_id`) REFERENCES `magazine` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_magazine_has_users_has_role_users_has_role1` FOREIGN KEY (`users_has_role_users_id`,`users_has_role_role_id`) REFERENCES `users_has_role` (`users_id`, `role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `sponsors_has_typ_sponsors`
--
ALTER TABLE `sponsors_has_typ_sponsors`
  ADD CONSTRAINT `fk_sponsors_has_typ_sponsors_sponsors1` FOREIGN KEY (`sponsors_id`,`sponsors_users_id`) REFERENCES `sponsors` (`id`, `users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sponsors_has_typ_sponsors_typ_sponsors1` FOREIGN KEY (`typ_sponsors_id`) REFERENCES `typ_sponsors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users_has_contenus`
--
ALTER TABLE `users_has_contenus`
  ADD CONSTRAINT `fk_users_has_contenus_contenus1` FOREIGN KEY (`contenus_id`,`contenus_users_id`,`contenus_users_role_id`,`contenus_contenus_type_id`) REFERENCES `contenus` (`id`, `users_id`, `users_role_id`, `contenus_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_contenus_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users_has_exposants`
--
ALTER TABLE `users_has_exposants`
  ADD CONSTRAINT `fk_users_has_exposants_exposants1` FOREIGN KEY (`exposants_id`,`exposants_users_id`) REFERENCES `exposants` (`id`, `users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_exposants_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users_has_participants`
--
ALTER TABLE `users_has_participants`
  ADD CONSTRAINT `fk_users_has_participants_participants1` FOREIGN KEY (`participants_id`,`participants_users_id`) REFERENCES `participants` (`id`, `users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_participants_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users_has_role`
--
ALTER TABLE `users_has_role`
  ADD CONSTRAINT `fk_users_has_role_role1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_role_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users_has_sponsors`
--
ALTER TABLE `users_has_sponsors`
  ADD CONSTRAINT `fk_users_has_sponsors_sponsors1` FOREIGN KEY (`sponsors_id`,`sponsors_users_id`) REFERENCES `sponsors` (`id`, `users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_sponsors_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

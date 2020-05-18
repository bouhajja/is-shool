-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  Dim 17 mai 2020 à 17:17
-- Version du serveur :  5.7.28
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ischool`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

DROP TABLE IF EXISTS `absence`;
CREATE TABLE IF NOT EXISTS `absence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) DEFAULT NULL,
  `matiere_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_765AE0C967B3B43D` (`users_id`),
  KEY `IDX_765AE0C9F46CD258` (`matiere_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`id`, `users_id`, `matiere_id`, `date`) VALUES
(1, 4, 1, '2020-05-17 17:01:10');

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

DROP TABLE IF EXISTS `fos_user`;
CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(2, 'admin', 'admin', 'admin@gmail.com', 'admin@gmail.com', 1, NULL, '$2y$13$X.VFMxucz0MoK85mahvea.2s8veJe6aHspHJ.KnMvVBDH0QolDN0W', '2020-05-17 11:46:41', NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}'),
(3, 'elev1', 'elev1', 'bouhajja.khaled2@gmail.com', 'elev1@gmail.com', 1, NULL, '$2y$13$5JrAY2BZ8dTrngZVsmrygOQhzrgELX5wsgQPTqUm19.HMFtmn84fK', NULL, NULL, NULL, 'a:1:{i:0;s:12:\"ROLE_STUDENT\";}'),
(4, 'elev2', 'elev2', 'elev2@gmail.com', 'elev2@gmail.com', 1, NULL, '$2y$13$lAADaUtlV9PtuOab72HXg.lR2JBfGQse2PDnjlwAWSCMIJBrh4wbm', NULL, NULL, NULL, 'a:1:{i:0;s:12:\"ROLE_STUDENT\";}'),
(5, 'elev3', 'elev3', 'elev3@gmail.com', 'elev3@gmail.com', 1, NULL, '$2y$13$JAVRYIzVIPU4.cvcI/RSXOP4BO0tKn1eMnKRJHS/eFhR9QM8oUK7.', NULL, NULL, NULL, 'a:1:{i:0;s:12:\"ROLE_STUDENT\";}');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coef` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id`, `nom`, `coef`, `description`) VALUES
(1, 'science', 2, 'zzzzzzzzzzz'),
(2, 'math', 3, 'math');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) DEFAULT NULL,
  `note_ds` double NOT NULL,
  `note_examen` double NOT NULL,
  `moyen` double NOT NULL,
  `matiere_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CFBDFA1467B3B43D` (`users_id`),
  KEY `IDX_CFBDFA14F46CD258` (`matiere_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`id`, `users_id`, `note_ds`, `note_examen`, `moyen`, `matiere_id`, `created_at`) VALUES
(1, 3, 14, 15, 14.6, 1, '2020-05-17 16:16:35'),
(4, 5, 10, 8, 8.8, 1, NULL),
(5, 3, 10, 15, 13, 2, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `FK_765AE0C967B3B43D` FOREIGN KEY (`users_id`) REFERENCES `fos_user` (`id`),
  ADD CONSTRAINT `FK_765AE0C9F46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `FK_CFBDFA1467B3B43D` FOREIGN KEY (`users_id`) REFERENCES `fos_user` (`id`),
  ADD CONSTRAINT `FK_CFBDFA14F46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

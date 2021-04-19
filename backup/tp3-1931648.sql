CREATE DATABASE IF NOT EXISTS `tp3-1931648` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `tp3-1931648`;


DROP TABLE IF EXISTS `utilisateur_1931648`;
CREATE TABLE `utilisateur_1931648` (
  `id_utilisateur` int NOT NULL COMMENT 'Clé primaire de la table utilisateur',
  `courriel` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Adresse courriel de l''utilisateur',
  `mot_passe` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mot de passe de l''utilisateur',
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date de la création du compte',
  `date_suppression` datetime DEFAULT NULL COMMENT 'Date de la suppression du compte'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
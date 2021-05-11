CREATE DATABASE IF NOT EXISTS `tp3-1931648` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `tp3-1931648`;


DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
  `id_utilisateur` int NOT NULL COMMENT 'Clé primaire de la table utilisateur',
  `courriel` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Adresse courriel de l''utilisateur',
  `mot_passe` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mot de passe de l''utilisateur',
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date de la création du compte',
  `date_suppression` datetime DEFAULT NULL COMMENT 'Date de la suppression du compte'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



/*-------------------------------------------------------*/

DROP TABLE IF EXISTS `bieres`;
CREATE TABLE `bieres` (
  `id_biere` int NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nom_brasserie` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `taux` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nom de l''image physique'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `bieres` (`id_biere`, `nom`, `nom_brasserie`, `type`, `taux`, `image`) VALUES
('1', 'MONARK', 'Boréale', 'Imperial', `7`, 'bouteille_monark.jpg'),
(2, "NOKTURN", "Boréale", NULL, 6, "bouteille_nokturn.jpg"),
(3, "SCOTCH ALE DU NORD", "Boréale", 'Scotch Ale', `7.5`, 'bouteillescotchale.jpg'),
('4', 'BORÉALE IPA', 'Boréale', NULL, `6.2`, 'bouteilleipa.jpg'),
('5', 'BORÉALE CUIVRÉE', 'Boréale', 'Pale Ale Belge'; `6.9`, 'bouteillecuivree.png'),

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 09 jan. 2023 à 09:32
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `harpieong`
--

-- --------------------------------------------------------

--
-- Structure de la table `benevole`
--

DROP TABLE IF EXISTS `benevole`;
CREATE TABLE IF NOT EXISTS `benevole` (
  `idBenevoles` int(10) NOT NULL AUTO_INCREMENT,
  `competenceBenevole` varchar(20) DEFAULT NULL,
  `experienceBenevole` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idBenevoles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `choisir`
--

DROP TABLE IF EXISTS `choisir`;
CREATE TABLE IF NOT EXISTS `choisir` (
  `idBenevoles` int(10) NOT NULL AUTO_INCREMENT,
  `idMission` int(10) NOT NULL,
  PRIMARY KEY (`idBenevoles`,`idMission`),
  KEY `FK_Choisir_idMission` (`idMission`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `disponibilité`
--

DROP TABLE IF EXISTS `disponibilité`;
CREATE TABLE IF NOT EXISTS `disponibilité` (
  `idCreneaux` int(10) NOT NULL AUTO_INCREMENT,
  `creneauxDisponibilité` int(8) DEFAULT NULL,
  `horaireMatin` int(10) DEFAULT NULL,
  `horaireApresMidi` int(10) DEFAULT NULL,
  PRIMARY KEY (`idCreneaux`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `disponible`
--

DROP TABLE IF EXISTS `disponible`;
CREATE TABLE IF NOT EXISTS `disponible` (
  `idBenevoles` int(10) NOT NULL AUTO_INCREMENT,
  `idCreneaux` int(10) NOT NULL,
  PRIMARY KEY (`idBenevoles`,`idCreneaux`),
  KEY `FK_Disponible_idCreneaux` (`idCreneaux`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `donateur`
--

DROP TABLE IF EXISTS `donateur`;
CREATE TABLE IF NOT EXISTS `donateur` (
  `idDonateurs` int(10) NOT NULL AUTO_INCREMENT,
  `numeroFiscale` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`idDonateurs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `dons`
--

DROP TABLE IF EXISTS `dons`;
CREATE TABLE IF NOT EXISTS `dons` (
  `idDon` int(10) NOT NULL AUTO_INCREMENT,
  `montantDuDon` int(10) DEFAULT NULL,
  `donUnique` int(10) DEFAULT NULL,
  `abonemment` varchar(20) DEFAULT NULL,
  `typeAbonnement` varchar(15) DEFAULT NULL,
  `recuFiscale` int(13) DEFAULT NULL,
  PRIMARY KEY (`idDon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `mission`
--

DROP TABLE IF EXISTS `mission`;
CREATE TABLE IF NOT EXISTS `mission` (
  `idMission` int(10) NOT NULL AUTO_INCREMENT,
  `interetTypeMission` text,
  `missionPays` varchar(20) DEFAULT NULL,
  `missionRegion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idMission`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `peut_être_`
--

DROP TABLE IF EXISTS `peut_être_`;
CREATE TABLE IF NOT EXISTS `peut_être_` (
  `idBenevoles` int(10) NOT NULL AUTO_INCREMENT,
  `idDonateurs` int(10) NOT NULL,
  `idUtilisateurs` int(10) NOT NULL,
  PRIMARY KEY (`idBenevoles`,`idDonateurs`,`idUtilisateurs`),
  KEY `FK_Peut_être__idDonateurs` (`idDonateurs`),
  KEY `FK_Peut_être__idUtilisateurs` (`idUtilisateurs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `maj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(150) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`id`, `titre`, `text`, `maj`, `image`, `date`) VALUES
(1, 'Construction d\'une nouvelle ecole', 'Nous sommes fière de vous présenter la nouvelle école construite en Ouganda pouvant accueillir 200 élèves', '2022-12-19 14:44:28', './images/image_card_1r', '2022-12-19'),
(2, 'Campagnes de distribution de fournitures scolaire', 'Nous sommes fière de vous partagez la campagne de distribution de fournitures scolaire au Ghana dans le campus scolaire de Aito', '2022-12-19 14:51:19', './images/image_card_2r', '2022-12-19'),
(3, 'AMÉLIORATION DE LA SANTÉ MATERNELLE ET DE LA SANTÉ NÉO-NATALE À CHUADANGA', 'This month we have supported IMPACT to do vital work in providing vital pre and post-natal care to mother\'s in Bangladesh.\r\nThe Maternal Mortality Rate in Bangladesh remains high, especially in rural areas.', '2022-12-19 14:57:10', './images/image_card_3r', '2022-12-14'),
(4, 'AMÉLIORATION DE LA SANTÉ MATERNELLE ET DE LA SANTÉ NÉO-NATALE À CHUADANGA', 'This month we have supported IMPACT to do vital work in providing vital pre and post-natal care to mother\'s in Bangladesh.\r\nThe Maternal Mortality Rate in Bangladesh remains high, especially in rural areas.', '2022-12-19 14:57:10', './images/image_card_3r', '2022-12-14'),
(5, 'AMÉLIORATION DE LA SANTÉ MATERNELLE ET DE LA SANTÉ NÉO-NATALE À CHUADANGA', 'This month we have supported IMPACT to do vital work in providing vital pre and post-natal care to mother\'s in Bangladesh.\r\nThe Maternal Mortality Rate in Bangladesh remains high, especially in rural areas.', '2022-12-19 14:57:10', './images/image_card_3r', '2022-12-14'),
(6, 'Campagnes de distribution de fournitures scolaire', 'Nous sommes fière de vous partagez la campagne de distribution de fournitures scolaire au Ghana dans le campus scolaire de Aito', '2022-12-19 14:51:19', './images/image_card_2r', '2022-12-19');

-- --------------------------------------------------------

--
-- Structure de la table `selectionner`
--

DROP TABLE IF EXISTS `selectionner`;
CREATE TABLE IF NOT EXISTS `selectionner` (
  `idDonateurs` int(10) NOT NULL AUTO_INCREMENT,
  `idDon` int(10) NOT NULL,
  `numeroDon` int(10) DEFAULT NULL,
  PRIMARY KEY (`idDonateurs`,`idDon`),
  KEY `FK_Selectionner_idDon` (`idDon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) DEFAULT NULL,
  `mdp` text,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `telephone` int(15) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `motivation` varchar(300) DEFAULT NULL,
  `date_creation` date NOT NULL,
  `heure_connexion` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `username`, `mdp`, `nom`, `prenom`, `email`, `telephone`, `adresse`, `motivation`, `date_creation`, `heure_connexion`) VALUES
(5, 'admin', '$argon2id$v=19$m=65536,t=4,p=1$c0Jjc0M0SFFOREVLYnpsRw$WdVVepAXbxqxkrHpjr9hsJ8o/xtZMlmAWteNtZK5Kqg', 'root', 'root', 'test@harpie.fr', 123456, 'inconnu', 'test', '2023-01-04', '16:32:24'),
(6, 'test', '$argon2id$v=19$m=65536,t=4,p=1$N2pQb0I3Yy43NDRuNWYwcA$9qqm/nS72Mihd4JcN8iwoouTo938s5eeMQ9o/nty/RE', 'pp', 'ss', 'gg@yahoo.fr', 614785474, '654v45v465bv', 'ojnbvkjdlbvnjeb tojkb', '2023-01-05', '09:59:33');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `choisir`
--
ALTER TABLE `choisir`
  ADD CONSTRAINT `FK_Choisir_idBenevoles` FOREIGN KEY (`idBenevoles`) REFERENCES `benevole` (`idBenevoles`),
  ADD CONSTRAINT `FK_Choisir_idMission` FOREIGN KEY (`idMission`) REFERENCES `mission` (`idMission`);

--
-- Contraintes pour la table `disponible`
--
ALTER TABLE `disponible`
  ADD CONSTRAINT `FK_Disponible_idBenevoles` FOREIGN KEY (`idBenevoles`) REFERENCES `benevole` (`idBenevoles`),
  ADD CONSTRAINT `FK_Disponible_idCreneaux` FOREIGN KEY (`idCreneaux`) REFERENCES `disponibilité` (`idCreneaux`);

--
-- Contraintes pour la table `peut_être_`
--
ALTER TABLE `peut_être_`
  ADD CONSTRAINT `FK_Peut_être__idBenevoles` FOREIGN KEY (`idBenevoles`) REFERENCES `benevole` (`idBenevoles`),
  ADD CONSTRAINT `FK_Peut_être__idDonateurs` FOREIGN KEY (`idDonateurs`) REFERENCES `donateur` (`idDonateurs`),
  ADD CONSTRAINT `FK_Peut_être__idUtilisateurs` FOREIGN KEY (`idUtilisateurs`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `selectionner`
--
ALTER TABLE `selectionner`
  ADD CONSTRAINT `FK_Selectionner_idDon` FOREIGN KEY (`idDon`) REFERENCES `dons` (`idDon`),
  ADD CONSTRAINT `FK_Selectionner_idDonateurs` FOREIGN KEY (`idDonateurs`) REFERENCES `donateur` (`idDonateurs`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 06 juin 2018 à 12:17
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `train`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonne`
--

CREATE TABLE `abonne` (
  `abonneID` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mot_de_passe` varchar(16) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `sexe` varchar(5) NOT NULL,
  `dateN` date NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `ccp` varchar(14) NOT NULL,
  `numcn` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `nbr_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `abonne`
--

INSERT INTO `abonne` (`abonneID`, `email`, `mot_de_passe`, `nom`, `prenom`, `sexe`, `dateN`, `adresse`, `telephone`, `ccp`, `numcn`, `type`, `nbr_points`) VALUES
(7, 'user@mail.com', '0000', 'BOURAHLA', 'Mehdi', 'Homme', '1997-04-27', '24 rue tlemcani zabana Blida', '0552281260', '23682451682186', '109970284020640004', '', 2152);

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `adminID` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mot_de_passe` varchar(16) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `ville` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`adminID`, `nom`, `prenom`, `email`, `mot_de_passe`, `telephone`, `ville`) VALUES
(1, 'BOURAHLA', 'MEHDI', 'admin@mail.com', '0000', '0552281260', 'Blida');

-- --------------------------------------------------------

--
-- Structure de la table `archive`
--

CREATE TABLE `archive` (
  `trainID` int(11) NOT NULL,
  `train_type` varchar(20) NOT NULL,
  `capacite` int(11) NOT NULL,
  `capaciteP` int(11) NOT NULL,
  `capaciteS` int(11) NOT NULL,
  `NbPClasse` int(11) NOT NULL,
  `NbSClasse` int(11) NOT NULL,
  `gare_depart` varchar(20) NOT NULL,
  `gare_arrivee` varchar(20) NOT NULL,
  `date_depart` date NOT NULL,
  `heure_depart` time NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `archive`
--

INSERT INTO `archive` (`trainID`, `train_type`, `capacite`, `capaciteP`, `capaciteS`, `NbPClasse`, `NbSClasse`, `gare_depart`, `gare_arrivee`, `date_depart`, `heure_depart`, `prix`) VALUES
(114, 'Grande ligne', 20, 10, 10, 0, 0, 'ORAN', 'BLIDA', '2018-06-05', '08:00:00', 900),
(132, 'RÃ©gional', 6, 2, 4, 0, 0, 'BLIDA', 'AGHA', '2018-06-05', '08:00:00', 80);

-- --------------------------------------------------------

--
-- Structure de la table `passager`
--

CREATE TABLE `passager` (
  `passagerID` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `CCP` varchar(20) NOT NULL,
  `numcn` varchar(20) NOT NULL,
  `sexe` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `passager`
--

INSERT INTO `passager` (`passagerID`, `nom`, `prenom`, `email`, `telephone`, `CCP`, `numcn`, `sexe`) VALUES
(126, 'BOURAHLA', 'Mehdi', 'Mehdi.Bourahla@outlook.com', '0552281260', '09000', '109970284020640004', 'Homme'),
(127, 'BOURAHLA', 'Mehdi', 'Mehdi.Bourahla@outlook.com', '0552281260', '09000', '109970284020640004', 'Homme'),
(128, 'BOURAHLA', 'Mehdi', 'Mehdi.Bourahla@outlook.com', '0552281260', '09000', '109970284020640004', 'Homme'),
(129, 'BOURAHLA', 'Mehdi', 'Mehdi.Bourahla@outlook.com', '0552281260', '09000', '109970284020640004', 'Homme'),
(130, 'BOURAHLA', 'Mehdi', 'Mehdi.Bourahla@outlook.com', '0552281260', '09000', '109970284020640004', 'Homme'),
(131, 'BOURAHLA', 'Mehdi', 'Mehdi.Bourahla@outlook.com', '0552281260', '09000', '109970284020640004', 'Homme'),
(132, 'BOURAHLA', 'Mehdi', 'Mehdi.Bourahla@outlook.com', '0552281260', '09000', '109970284020640004', 'Homme'),
(133, 'BOURAHLA', 'Mehdi', 'user@mail.com', '0552281260', '23682451682186', '109970284020640004', 'Homme'),
(134, 'BOURAHLA', 'Mehdi', 'user@mail.com', '0552281260', '23682451682186', '109970284020640004', 'Homme'),
(135, 'BOURAHLA', 'Mehdi', 'user@mail.com', '0552281260', '23682451682186', '109970284020640004', 'Homme'),
(136, 'BOURAHLA', 'Mehdi', 'user@mail.com', '0552281260', '23682451682186', '109970284020640004', 'Homme'),
(137, 'BOURAHLA', 'Mehdi', 'user@mail.com', '0552281260', '23682451682186', '109970284020640004', 'Homme'),
(138, 'BOURAHLA', 'Mehdi', 'user@mail.com', '0552281260', '23682451682186', '109970284020640004', 'Homme'),
(139, 'BOURAHLA', 'Mehdi', 'user@mail.com', '0552281260', '23682451682186', '109970284020640004', 'Homme'),
(140, 'BOURAHLA', 'Mehdi', 'user@mail.com', '0552281260', '23682451682186', '109970284020640004', 'Homme'),
(141, 'BOURAHLA', 'Mehdi', 'user@mail.com', '0552281260', '23682451682186', '109970284020640004', 'Homme'),
(142, 'BOURAHLA', 'Mehdi', 'user@mail.com', '0552281260', '23682451682186', '109970284020640004', 'Homme'),
(143, 'BOURAHLA', 'Mehdi', 'user@mail.com', '0552281260', '23682451682186', '109970284020640004', 'Homme'),
(144, 'BOURAHLA', 'Mehdi', 'user@mail.com', '0552281260', '23682451682186', '109970284020640004', 'Homme'),
(145, 'BOURAHLA', 'Mehdi', 'user@mail.com', '0552281260', '23682451682186', '109970284020640004', 'Homme'),
(146, 'BOURAHLA', 'Mehdi', 'user@mail.com', '0552281260', '23682451682186', '109970284020640004', 'Homme'),
(147, 'BOURAHLA', 'Mehdi', 'user@mail.com', '0552281260', '23682451682186', '109970284020640004', 'Homme'),
(148, 'Bourahla', 'Mehdi', 'Mehdi.Bourahla@outlook.com', '0552281260', '16516513216', '235489639395', 'Homme'),
(149, 'Bourahla', 'Mehdi', 'Mehdi.Bourahla@outlook.com', '0552281260', '100546789', '235489639395', 'Homme'),
(150, 'BOURAHLA', 'Mehdi', 'user@mail.com', '0552281260', '23682451682186', '109970284020640004', 'Homme'),
(151, 'BOURAHLA', 'Mehdi', 'user@mail.com', '0552281260', '23682451682186', '109970284020640004', 'Homme');

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

CREATE TABLE `responsable` (
  `responsableID` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mot_de_passe` varchar(16) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `ville` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `responsable`
--

INSERT INTO `responsable` (`responsableID`, `nom`, `prenom`, `email`, `mot_de_passe`, `telephone`, `ville`) VALUES
(1, 'Bourahla', 'Mehdi', 'responsable@mail.com', '0000', '0552281260', 'BLIDA');

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `ticketID` int(11) NOT NULL,
  `passagerID` int(11) NOT NULL,
  `trainID` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `num_siege` int(11) NOT NULL,
  `classe` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`ticketID`, `passagerID`, `trainID`, `type`, `num_siege`, `classe`, `date`) VALUES
(102, 133, 114, 'Aller-retour', 10, 'PremiÃ¨re', '2018-06-05 06:51:21'),
(103, 134, 114, 'Aller-retour', 10, 'DeuxiÃ¨me', '2018-06-05 06:51:32'),
(104, 135, 114, 'Aller-simple', 9, 'PremiÃ¨re', '2018-06-05 06:51:43'),
(105, 136, 114, 'Aller-retour', 9, 'DeuxiÃ¨me', '2018-06-05 06:51:57'),
(106, 137, 114, 'Aller-simple', 8, 'DeuxiÃ¨me', '2018-06-05 06:52:09'),
(107, 138, 114, 'Aller-retour', 8, 'PremiÃ¨re', '2018-06-05 06:52:21'),
(108, 139, 114, 'Aller-simple', 7, 'DeuxiÃ¨me', '2018-06-05 06:52:30'),
(109, 140, 114, 'Aller-retour', 6, 'PremiÃ¨re', '2018-06-05 06:52:38'),
(110, 141, 114, 'Aller-simple', 5, 'DeuxiÃ¨me', '2018-06-05 06:52:47'),
(111, 142, 114, 'Aller-retour', 4, 'PremiÃ¨re', '2018-06-05 06:52:57'),
(112, 143, 114, 'Aller-simple', 2, 'PremiÃ¨re', '2018-06-05 06:55:14'),
(113, 144, 114, 'Aller-retour', 3, 'DeuxiÃ¨me', '2018-06-05 06:55:32'),
(114, 145, 114, 'Aller-retour', 1, 'DeuxiÃ¨me', '2018-06-05 06:55:58'),
(115, 146, 132, 'Aller-simple', 2, 'PremiÃ¨re', '2018-06-05 06:58:18'),
(116, 147, 132, 'Aller-simple', 4, 'DeuxiÃ¨me', '2018-06-05 06:58:27'),
(117, 150, 108, 'Aller-simple', 1, 'PremiÃ¨re', '2018-06-05 11:37:39'),
(118, 151, 108, 'Aller-simple', 0, 'PremiÃ¨re', '2018-06-05 11:37:51');

-- --------------------------------------------------------

--
-- Structure de la table `train`
--

CREATE TABLE `train` (
  `trainID` int(11) NOT NULL,
  `train_type` varchar(15) NOT NULL,
  `capacite` int(11) NOT NULL,
  `capaciteP` int(11) NOT NULL,
  `capaciteS` int(11) NOT NULL,
  `NbPClasse` int(11) NOT NULL,
  `NbSClasse` int(11) NOT NULL,
  `gare_depart` varchar(20) NOT NULL,
  `gare_arrivee` varchar(20) NOT NULL,
  `date_depart` date NOT NULL,
  `heure_depart` time NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `train`
--

INSERT INTO `train` (`trainID`, `train_type`, `capacite`, `capaciteP`, `capaciteS`, `NbPClasse`, `NbSClasse`, `gare_depart`, `gare_arrivee`, `date_depart`, `heure_depart`, `prix`) VALUES
(102, 'Grande ligne', 10, 5, 5, 5, 5, 'BLIDA', 'ORAN', '2018-06-05', '08:00:00', 900),
(103, 'Grande ligne', 10, 5, 5, 3, 5, 'BLIDA', 'ORAN', '2018-06-06', '08:00:00', 900),
(104, 'Grande ligne', 10, 5, 5, 5, 5, 'BLIDA', 'ORAN', '2018-06-07', '08:00:00', 900),
(105, 'Grande ligne', 10, 5, 5, 5, 5, 'BLIDA', 'ORAN', '2018-06-08', '08:00:00', 900),
(106, 'Grande ligne', 10, 5, 5, 5, 5, 'BLIDA', 'ORAN', '2018-06-09', '08:00:00', 900),
(107, 'Grande ligne', 10, 5, 5, 5, 5, 'BLIDA', 'ORAN', '2018-06-10', '08:00:00', 900),
(108, 'Grande ligne', 2, 1, 1, -1, 1, 'BLIDA', 'ORAN', '2018-06-05', '12:00:00', 900),
(109, 'Grande ligne', 2, 1, 1, 1, 1, 'BLIDA', 'ORAN', '2018-06-06', '12:00:00', 900),
(110, 'Grande ligne', 2, 1, 1, 1, 1, 'BLIDA', 'ORAN', '2018-06-07', '12:00:00', 900),
(111, 'Grande ligne', 2, 1, 1, 1, 1, 'BLIDA', 'ORAN', '2018-06-08', '12:00:00', 900),
(112, 'Grande ligne', 2, 1, 1, 1, 1, 'BLIDA', 'ORAN', '2018-06-09', '12:00:00', 900),
(113, 'Grande ligne', 2, 1, 1, 1, 1, 'BLIDA', 'ORAN', '2018-06-10', '12:00:00', 900),
(114, 'Grande ligne', 20, 10, 10, 0, 0, 'ORAN', 'BLIDA', '2018-06-05', '08:00:00', 900),
(115, 'Grande ligne', 20, 10, 10, 10, 10, 'ORAN', 'BLIDA', '2018-06-06', '08:00:00', 900),
(116, 'Grande ligne', 20, 10, 10, 10, 10, 'ORAN', 'BLIDA', '2018-06-07', '08:00:00', 900),
(117, 'Grande ligne', 20, 10, 10, 10, 10, 'ORAN', 'BLIDA', '2018-06-08', '08:00:00', 900),
(118, 'Grande ligne', 20, 10, 10, 10, 10, 'ORAN', 'BLIDA', '2018-06-09', '08:00:00', 900),
(119, 'Grande ligne', 20, 10, 10, 10, 10, 'ORAN', 'BLIDA', '2018-06-10', '08:00:00', 900),
(120, 'Grande ligne', 2, 1, 1, 1, 1, 'ORAN', 'BLIDA', '2018-06-05', '12:00:00', 900),
(121, 'Grande ligne', 2, 1, 1, 1, 1, 'ORAN', 'BLIDA', '2018-06-06', '12:00:00', 900),
(122, 'Grande ligne', 2, 1, 1, 1, 1, 'ORAN', 'BLIDA', '2018-06-07', '12:00:00', 900),
(123, 'Grande ligne', 2, 1, 1, 1, 1, 'ORAN', 'BLIDA', '2018-06-08', '12:00:00', 900),
(124, 'Grande ligne', 2, 1, 1, 1, 1, 'ORAN', 'BLIDA', '2018-06-09', '12:00:00', 900),
(125, 'Grande ligne', 2, 1, 1, 1, 1, 'ORAN', 'BLIDA', '2018-06-10', '12:00:00', 900),
(126, 'RÃ©gional', 6, 2, 4, 2, 4, 'AGHA', 'BLIDA', '2018-06-05', '08:00:00', 80),
(127, 'RÃ©gional', 6, 2, 4, 2, 4, 'AGHA', 'BLIDA', '2018-06-06', '08:00:00', 80),
(128, 'RÃ©gional', 6, 2, 4, 2, 4, 'AGHA', 'BLIDA', '2018-06-07', '08:00:00', 80),
(129, 'RÃ©gional', 6, 2, 4, 2, 4, 'AGHA', 'BLIDA', '2018-06-08', '08:00:00', 80),
(130, 'RÃ©gional', 6, 2, 4, 2, 4, 'AGHA', 'BLIDA', '2018-06-09', '08:00:00', 80),
(131, 'RÃ©gional', 6, 2, 4, 2, 4, 'AGHA', 'BLIDA', '2018-06-10', '08:00:00', 80),
(132, 'RÃ©gional', 6, 2, 4, 0, 0, 'BLIDA', 'AGHA', '2018-06-05', '08:00:00', 80),
(133, 'RÃ©gional', 6, 2, 4, 1, 4, 'BLIDA', 'AGHA', '2018-06-06', '08:00:00', 80),
(134, 'RÃ©gional', 6, 2, 4, 2, 4, 'BLIDA', 'AGHA', '2018-06-07', '08:00:00', 80),
(135, 'RÃ©gional', 6, 2, 4, 2, 4, 'BLIDA', 'AGHA', '2018-06-08', '08:00:00', 80),
(136, 'RÃ©gional', 6, 2, 4, 2, 4, 'BLIDA', 'AGHA', '2018-06-09', '08:00:00', 80),
(137, 'RÃ©gional', 6, 2, 4, 2, 4, 'BLIDA', 'AGHA', '2018-06-10', '08:00:00', 80),
(138, 'Grande ligne', 300, 100, 200, 100, 200, 'BLIDA', 'ORAN', '2018-06-06', '08:00:00', 920),
(139, 'Grande ligne', 300, 100, 200, 100, 200, 'BLIDA', 'ORAN', '2018-06-07', '08:00:00', 920),
(140, 'Grande ligne', 300, 100, 200, 100, 200, 'BLIDA', 'ORAN', '2018-06-08', '08:00:00', 920),
(141, 'Grande ligne', 300, 100, 200, 100, 200, 'BLIDA', 'ORAN', '2018-06-09', '08:00:00', 920),
(142, 'Grande ligne', 300, 100, 200, 100, 200, 'BLIDA', 'ORAN', '2018-06-10', '08:00:00', 920),
(143, 'RÃ©gional', 60, 20, 40, 20, 40, 'AGHA', 'BLIDA', '2018-06-07', '08:00:00', 80),
(144, 'RÃ©gional', 60, 20, 40, 20, 40, 'AGHA', 'BLIDA', '2018-06-08', '08:00:00', 80),
(145, 'RÃ©gional', 60, 20, 40, 20, 40, 'AGHA', 'BLIDA', '2018-06-09', '08:00:00', 80),
(146, 'RÃ©gional', 60, 20, 40, 20, 40, 'AGHA', 'BLIDA', '2018-06-10', '08:00:00', 80),
(147, 'RÃ©gional', 60, 20, 40, 20, 40, 'AGHA', 'BLIDA', '2018-06-11', '08:00:00', 80),
(148, 'RÃ©gional', 60, 20, 40, 20, 40, 'AGHA', 'BLIDA', '2018-06-12', '08:00:00', 80),
(149, 'RÃ©gional', 60, 20, 40, 20, 40, 'AGHA', 'BLIDA', '2018-06-13', '08:00:00', 80),
(150, 'RÃ©gional', 60, 20, 40, 20, 40, 'AGHA', 'BLIDA', '2018-06-14', '08:00:00', 80),
(151, 'RÃ©gional', 60, 20, 40, 20, 40, 'AGHA', 'BLIDA', '2018-06-15', '08:00:00', 80),
(152, 'RÃ©gional', 60, 20, 40, 20, 40, 'AGHA', 'BLIDA', '2018-06-16', '08:00:00', 80),
(153, 'RÃ©gional', 60, 20, 40, 20, 40, 'AGHA', 'BLIDA', '2018-06-17', '08:00:00', 80);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonne`
--
ALTER TABLE `abonne`
  ADD PRIMARY KEY (`abonneID`);

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`adminID`);

--
-- Index pour la table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`trainID`);

--
-- Index pour la table `passager`
--
ALTER TABLE `passager`
  ADD PRIMARY KEY (`passagerID`);

--
-- Index pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`responsableID`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticketID`),
  ADD KEY `passagerID` (`passagerID`),
  ADD KEY `trainID` (`trainID`);

--
-- Index pour la table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`trainID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonne`
--
ALTER TABLE `abonne`
  MODIFY `abonneID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `archive`
--
ALTER TABLE `archive`
  MODIFY `trainID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT pour la table `passager`
--
ALTER TABLE `passager`
  MODIFY `passagerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT pour la table `responsable`
--
ALTER TABLE `responsable`
  MODIFY `responsableID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT pour la table `train`
--
ALTER TABLE `train`
  MODIFY `trainID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`passagerID`) REFERENCES `passager` (`passagerID`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`trainID`) REFERENCES `train` (`trainID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

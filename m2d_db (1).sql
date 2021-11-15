-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 15 nov. 2021 à 03:01
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `m2d_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `id_adherent` int(3) NOT NULL,
  `nom_adherent` varchar(25) DEFAULT NULL,
  `prenom_adherent` varchar(45) DEFAULT NULL,
  `contact_adherent` int(20) DEFAULT NULL,
  `email_adherent` varchar(40) DEFAULT NULL,
  `sexe_adherent` varchar(1) DEFAULT NULL,
  `entreprise_adherent` varchar(50) DEFAULT NULL,
  `commune` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`id_adherent`, `nom_adherent`, `prenom_adherent`, `contact_adherent`, `email_adherent`, `sexe_adherent`, `entreprise_adherent`, `commune`) VALUES
(1, 'ADJE123', 'NDEYE', 708089957, 'Adjendeye@yahoo.fr', 'F', '', 0),
(2, 'AFOLABI', 'LATIF', 505786261, '', 'M', 'ENSEIGNANT', 0),
(3, 'AKA', 'MARCEL', 707738311, 'aka.marcel.kouassi@gmail.com', 'M', 'CRO', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE `commune` (
  `ID_COMMUNE` int(2) NOT NULL,
  `NOM_COMMUNE` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cotisation_deces`
--

CREATE TABLE `cotisation_deces` (
  `ID_COTISATION_DECES` int(3) NOT NULL,
  `DATE_COTISATION` date DEFAULT NULL,
  `MONTANT_COTISATION` int(7) DEFAULT NULL,
  `deces` int(3) NOT NULL,
  `adherent` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cotisation_deces`
--

INSERT INTO `cotisation_deces` (`ID_COTISATION_DECES`, `DATE_COTISATION`, `MONTANT_COTISATION`, `deces`, `adherent`) VALUES
(2, '2021-10-29', 12, 5, 3),
(3, '2021-10-29', 12, 5, 3),
(4, '2021-10-29', 13, 6, 3),
(5, '2021-10-29', 34, 7, 3);

-- --------------------------------------------------------

--
-- Structure de la table `cotisation_mensuelle`
--

CREATE TABLE `cotisation_mensuelle` (
  `ID_COTISATION` int(3) NOT NULL,
  `MOIS_COTISATION` char(15) DEFAULT NULL,
  `MONTANT_COTISATION` decimal(7,0) DEFAULT NULL,
  `ANNEE_COTISATION` int(4) DEFAULT NULL,
  `adherent` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `deces`
--

CREATE TABLE `deces` (
  `ID_DECES` int(3) NOT NULL,
  `adherent` int(3) NOT NULL,
  `DATE_DECES` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `deces`
--

INSERT INTO `deces` (`ID_DECES`, `adherent`, `DATE_DECES`) VALUES
(3, 0, '2021-10-21'),
(4, 0, '0000-00-00'),
(5, 1, '2021-10-14'),
(6, 2, '2021-10-13'),
(7, 2, '2021-10-13');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_USER` int(2) NOT NULL,
  `ID_COMMUNE` int(2) NOT NULL,
  `IDENTITE_USER` varchar(10) DEFAULT NULL,
  `LOGIN_USER` varchar(10) DEFAULT NULL,
  `PWD_USER` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id_adherent`,`commune`),
  ADD KEY `fk_adherent_commune1_idx` (`commune`);

--
-- Index pour la table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`ID_COMMUNE`);

--
-- Index pour la table `cotisation_deces`
--
ALTER TABLE `cotisation_deces`
  ADD PRIMARY KEY (`ID_COTISATION_DECES`,`deces`,`adherent`),
  ADD KEY `fk_cotisation_deces_deces1_idx` (`deces`),
  ADD KEY `fk_cotisation_deces_adherent1_idx` (`adherent`);

--
-- Index pour la table `cotisation_mensuelle`
--
ALTER TABLE `cotisation_mensuelle`
  ADD PRIMARY KEY (`ID_COTISATION`,`adherent`),
  ADD KEY `fk_cotisation_mensuelle_adherent1_idx` (`adherent`);

--
-- Index pour la table `deces`
--
ALTER TABLE `deces`
  ADD PRIMARY KEY (`ID_DECES`,`adherent`),
  ADD KEY `fk_deces_adherent_idx` (`adherent`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `id_adherent` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commune`
--
ALTER TABLE `commune`
  MODIFY `ID_COMMUNE` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cotisation_deces`
--
ALTER TABLE `cotisation_deces`
  MODIFY `ID_COTISATION_DECES` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `cotisation_mensuelle`
--
ALTER TABLE `cotisation_mensuelle`
  MODIFY `ID_COTISATION` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `deces`
--
ALTER TABLE `deces`
  MODIFY `ID_DECES` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_USER` int(2) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `fk_adherent_commune1` FOREIGN KEY (`commune`) REFERENCES `commune` (`ID_COMMUNE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `cotisation_deces`
--
ALTER TABLE `cotisation_deces`
  ADD CONSTRAINT `fk_cotisation_deces_adherent1` FOREIGN KEY (`adherent`) REFERENCES `adherent` (`id_adherent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cotisation_deces_deces1` FOREIGN KEY (`deces`) REFERENCES `deces` (`ID_DECES`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `cotisation_mensuelle`
--
ALTER TABLE `cotisation_mensuelle`
  ADD CONSTRAINT `fk_cotisation_mensuelle_adherent1` FOREIGN KEY (`adherent`) REFERENCES `adherent` (`id_adherent`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `deces`
--
ALTER TABLE `deces`
  ADD CONSTRAINT `fk_deces_adherent` FOREIGN KEY (`adherent`) REFERENCES `adherent` (`id_adherent`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

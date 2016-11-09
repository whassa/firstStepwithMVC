-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 27 Mai 2016 à 19:10
-- Version du serveur :  5.6.28
-- Version de PHP :  5.5.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `africa airline`
--

-- --------------------------------------------------------

--
-- Structure de la table `Audit`
--

CREATE TABLE IF NOT EXISTS `Audit` (
  `id` int(11) NOT NULL,
  `idPass` int(11) NOT NULL,
  `changeType` enum('NEW','EDIT','DELETE','UPDATE') NOT NULL,
  `changeTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Audit`
--

INSERT INTO `Audit` (`id`, `idPass`, `changeType`, `changeTime`) VALUES
(14, 6, 'UPDATE', '2016-05-27 19:06:44'),
(15, 11, 'DELETE', '2016-05-27 19:07:02'),
(16, 34, 'NEW', '2016-05-27 19:08:02'),
(17, 34, 'UPDATE', '2016-05-27 19:08:36'),
(18, 11, 'UPDATE', '2016-05-27 19:10:28'),
(19, 34, 'DELETE', '2016-05-27 19:10:31');

-- --------------------------------------------------------

--
-- Structure de la table `Bookings`
--

CREATE TABLE IF NOT EXISTS `Bookings` (
  `Idbooking` int(11) NOT NULL,
  `idPass` int(11) NOT NULL,
  `booking status code` int(11) NOT NULL DEFAULT '1',
  `travel class code` int(11) NOT NULL DEFAULT '1',
  `date_booking_made` date NOT NULL,
  `number_in_the_party` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Bookings`
--

INSERT INTO `Bookings` (`Idbooking`, `idPass`, `booking status code`, `travel class code`, `date_booking_made`, `number_in_the_party`) VALUES
(9, 6, 1, 1, '2016-04-19', 4),
(10, 7, 1, 1, '2016-04-19', 5),
(11, 11, 1, 1, '2016-04-19', 1),
(12, 7, 1, 1, '2016-04-19', 0),
(21, 6, 1, 1, '2016-05-27', 2),
(22, 34, 1, 1, '2016-05-27', 4);

-- --------------------------------------------------------

--
-- Structure de la table `Passanger`
--

CREATE TABLE IF NOT EXISTS `Passanger` (
  `idPass` int(11) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Adresse` varchar(30) NOT NULL,
  `Pays` varchar(30) NOT NULL,
  `Province` varchar(30) NOT NULL,
  `Ville` varchar(30) NOT NULL,
  `Telephone` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Client_effacer` int(11) NOT NULL,
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Passanger`
--

INSERT INTO `Passanger` (`idPass`, `Nom`, `Prenom`, `Adresse`, `Pays`, `Province`, `Ville`, `Telephone`, `Email`, `Client_effacer`, `Image`) VALUES
(6, 'Vachon', 'Louis', '1232 aremania', 'Canada', 'Quebec', 'laval', '666 666 6666', 'salut@hotmail.com', 0, 'louis.jpg'),
(7, 'Graton', 'Remi', '100 rue Mercier', 'Canada', 'quebec', 'montreal', '111 111 1111', 'wow@gmail.com', 0, 'remi.jpg'),
(11, 'Vongphachan', 'Pravith', '350 rue Persil', 'France', 'Mayenne', 'laval', '321 123 3333	', 'prapra@mail.com', 0, 'pravith.jpg'),
(34, 'lesveques', 'Charles', '125 rue de sarbone', 'Canada', 'Quebec', 'Brossard', '222 222 2224', 'cLevesque@sympatico.ca', 1, '');

--
-- Déclencheurs `Passanger`
--
DELIMITER $$
CREATE TRIGGER `PassangerSupprimer` AFTER UPDATE ON `passanger`
 FOR EACH ROW BEGIN
 
  IF NEW.CLient_Effacer = 1 THEN
   SET @changetype = 'DELETE';
  ELSE
   SET @changetype = 'UPDATE';
  END IF;
    
  INSERT INTO audit (idPass, changetype) VALUES (NEW.idPass, @changetype);
  
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TriggerPassanger` AFTER INSERT ON `passanger`
 FOR EACH ROW BEGIN
 
  IF NEW.CLient_Effacer THEN
   SET @changetype = 'DELETE';
  ELSE
   SET @changetype = 'NEW';
  END IF;
    
  INSERT INTO audit (idPass, changetype) VALUES (NEW.idPass, @changetype);
  
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE IF NOT EXISTS `Utilisateur` (
  `Util_id` int(100) NOT NULL,
  `Nom_Utilisateur` varchar(25) NOT NULL,
  `Mot_de_Passe` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`Util_id`, `Nom_Utilisateur`, `Mot_de_Passe`) VALUES
(1, 'whassa', 'sassas'),
(3, 'admin', 'admin');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Audit`
--
ALTER TABLE `Audit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPass` (`idPass`);

--
-- Index pour la table `Bookings`
--
ALTER TABLE `Bookings`
  ADD PRIMARY KEY (`Idbooking`),
  ADD KEY `idPass` (`idPass`);

--
-- Index pour la table `Passanger`
--
ALTER TABLE `Passanger`
  ADD PRIMARY KEY (`idPass`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`Util_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Audit`
--
ALTER TABLE `Audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `Bookings`
--
ALTER TABLE `Bookings`
  MODIFY `Idbooking` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `Passanger`
--
ALTER TABLE `Passanger`
  MODIFY `idPass` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `Util_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Audit`
--
ALTER TABLE `Audit`
  ADD CONSTRAINT `id` FOREIGN KEY (`idPass`) REFERENCES `Passanger` (`idPass`);

--
-- Contraintes pour la table `Bookings`
--
ALTER TABLE `Bookings`
  ADD CONSTRAINT `idPass` FOREIGN KEY (`idPass`) REFERENCES `Passanger` (`idPass`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

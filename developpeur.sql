-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 22 fév. 2021 à 20:57
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `developpeur`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_com` int(11) NOT NULL,
  `reponse` text NOT NULL,
  `date_com` date NOT NULL,
  `id_dev` int(11) DEFAULT NULL,
  `id_pub` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `dev`
--

CREATE TABLE `dev` (
  `id_dev` int(11) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `userrole` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `dev`
--

INSERT INTO `dev` (`id_dev`, `lastName`, `firstName`, `email`, `mdp`, `userrole`) VALUES
(1, 'Nana ', 'Razack', 'raz@gmail.com', '$2y$10$gg8D696vR.x.EN.C5nsrJehVfhJD72RGoXxo0L.DB6sd5Xy9HprYi', 'developpeur');

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `id_pub` int(11) NOT NULL,
  `categorie` text NOT NULL,
  `message_pub` varchar(255) NOT NULL,
  `date_pub` datetime NOT NULL DEFAULT current_timestamp(),
  `id_dev` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`id_pub`, `categorie`, `message_pub`, `date_pub`, `id_dev`) VALUES
(1, '', 'bqgre.domigmail.com', '0000-00-00 00:00:00', NULL),
(2, '', ' php connexion', '0000-00-00 00:00:00', NULL),
(3, '', '', '0000-00-00 00:00:00', NULL),
(4, '', '', '0000-00-00 00:00:00', NULL),
(5, '', ' sdfghjkl;kjhgfs', '0000-00-00 00:00:00', NULL),
(6, '', ' backend', '0000-00-00 00:00:00', NULL),
(7, '', ' backend', '0000-00-00 00:00:00', NULL),
(8, '', ' css html', '0000-00-00 00:00:00', NULL),
(9, '', ' css html', '0000-00-00 00:00:00', NULL),
(10, '', ' mvc', '0000-00-00 00:00:00', NULL),
(11, '', ' mvc', '0000-00-00 00:00:00', NULL),
(12, '', ' html', '0000-00-00 00:00:00', NULL),
(13, '', ' javascript', '0000-00-00 00:00:00', NULL),
(14, '', ' javascript', '0000-00-00 00:00:00', NULL),
(15, '', ' javascript', '0000-00-00 00:00:00', NULL),
(16, '', ' javascript', '0000-00-00 00:00:00', NULL),
(17, '', ' connexion', '0000-00-00 00:00:00', NULL),
(18, '04:33:17pm', 'categorie', '0000-00-00 00:00:00', NULL),
(19, '04:34:13pm', 'categorie', '0000-00-00 00:00:00', NULL),
(20, 'categorie', ' base de donne', '0000-00-00 00:00:00', NULL),
(21, 'categorie', ' comment', '0000-00-00 00:00:00', NULL),
(22, 'HTML 5', ' INSCRIPTION\r\n', '0000-00-00 00:00:00', NULL),
(23, 'HTML 5', ' vcbjkg', '0000-00-00 00:00:00', NULL),
(24, 'BOOTSTRAP', ' xcvbnm,.,mnb', '0000-00-00 00:00:00', NULL),
(25, 'HTML 5', ' ', '0000-00-00 00:00:00', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `id_dev` (`id_dev`),
  ADD KEY `id_pub` (`id_pub`);

--
-- Index pour la table `dev`
--
ALTER TABLE `dev`
  ADD PRIMARY KEY (`id_dev`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id_pub`),
  ADD KEY `id_dev` (`id_dev`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `dev`
--
ALTER TABLE `dev`
  MODIFY `id_dev` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `id_pub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_dev`) REFERENCES `dev` (`id_dev`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_pub`) REFERENCES `publication` (`id_pub`);

--
-- Contraintes pour la table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`id_dev`) REFERENCES `dev` (`id_dev`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

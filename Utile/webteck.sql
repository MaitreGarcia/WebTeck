-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 06 Octobre 2016 à 07:19
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `webteck`
--

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `idDemande` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `Titre` text NOT NULL,
  `Annonce` text NOT NULL,
  `Categorie` varchar(100) NOT NULL,
  `DtCreate` date NOT NULL,
  `Statut` varchar(50) NOT NULL,
  `Prix` int(11) NOT NULL,
  `login_bienfaiteur` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `demande`
--

INSERT INTO `demande` (`idDemande`, `login`, `Titre`, `Annonce`, `Categorie`, `DtCreate`, `Statut`, `Prix`, `login_bienfaiteur`) VALUES
(7, 'idrame', 'Deuxiemme copine', '<p>Je chercher une copine pour jouer au uno</p>\r\n', 'Tache menagÃ¨res', '2016-10-05', 'Ouvert', 160, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `login` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Statut` varchar(50) NOT NULL,
  `DtCreate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`login`, `Nom`, `Prenom`, `Password`, `Email`, `Statut`, `DtCreate`) VALUES
('lgarcia', 'Garcia Canelo', 'LÃ©o', '$2y$10$X669fTeTMtPdERGlD7DxeOhy.hFsKKLVdMAFwUvr1a0y0naswUFHW', 'garciacanelo.leo14@netcourrier.com', 'Demandeur', '2016-10-04'),
('garcial', 'Garcia Canelo', 'LÃ©o', '$2y$10$vo6pvhtyL8IvUGNZw9SoI.kpJjh5JKrkvmOjOPuYbn7cID9hjLi36', 'gar@5', 'Demandeur', '2016-10-04'),
('gTest', 'Guillaime', 'Test', '$2y$10$OFIVBNDJe8GYmUqzo3ZOLOxl.605kA1T9Xk6STXfTabceOLISBc7q', 'garciacanelo.leo14@netcourrier.com', 'Demandeur', '2016-10-04'),
('yCoucou', 'Coucou', 'Yvon', '$2y$10$d0Dle3gtICtUnNldT3bYyebxgX4aJb9ddwT8Xfn.kqdlDyF6bTbry', 'ycoucou@gmail.com', 'Demandeur', '2016-10-05'),
('mgarcia', 'Garcia Canelo ', 'LÃ©o', '$2y$10$VXc.vHYLJ4QCubtisV989eSUtyL1pEWeK1He6kiP18B1R6BI1fa0e', 'garciacanelo.leo14@netcourrier.com', 'Bienfaiteur', '2016-10-05'),
('idrame', 'Drame', 'Idriss', '$2y$10$HF3.zVIxL31zgEeXY2VI4.6kRWCjBXOdabXEkAHGUBH5MwMkRGeeq', 'idrame@gmail.com', 'Demandeur', '2016-10-05');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`idDemande`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `idDemande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

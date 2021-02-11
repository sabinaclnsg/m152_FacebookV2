-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 11 fév. 2021 à 14:10
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `m152_facebookv2`
--

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modificationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `commentaire` varchar(100) NOT NULL,
  `creationDate` datetime NOT NULL,
  `modificationDate` datetime NOT NULL,
  `image` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `commentaire`, `creationDate`, `modificationDate`, `image`, `type`) VALUES
(21, 'fghfgh', '2021-02-10 15:43:01', '2021-02-10 15:43:01', '0 z5NGBa0DfC26ZPE76023f0f5dad7f.jpg', 'jpg'),
(22, 'fghfgh', '2021-02-10 15:43:01', '2021-02-10 15:43:01', 'eye-image-homepage1920x0x0x1006023f0f5dfd35.jpg', 'jpg'),
(23, 'fghfgh', '2021-02-10 15:43:01', '2021-02-10 15:43:01', 'Image_created_with_a_mobile_phone6023f0f5e0540.png', 'png'),
(24, 'fghfgh', '2021-02-10 15:43:01', '2021-02-10 15:43:01', 'img_lights6023f0f5e0e6f.jpg', 'jpg'),
(25, 'fghfgh', '2021-02-10 15:43:01', '2021-02-10 15:43:01', 'PT_hero_42_1536451596023f0f5e1776.jpg', 'jpg'),
(26, 'fghfgh', '2021-02-10 15:43:01', '2021-02-10 15:43:01', 'slider_puffin_before_mobile6023f0f5e1e95.jpg', 'jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 07 jan. 2024 à 18:36
-- Version du serveur : 10.11.6-MariaDB-1
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `enigmahack`
--
CREATE DATABASE IF NOT EXISTS `enigmahack` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `enigmahack`;

-- --------------------------------------------------------

--
-- Structure de la table `challengeTeam`
--

DROP TABLE IF EXISTS `challengeTeam`;
CREATE TABLE `challengeTeam` (
  `id` int(11) NOT NULL,
  `idTeam` int(11) NOT NULL,
  `idChallenge` int(11) NOT NULL,
  `isFinish` int(11) NOT NULL,
  `beginTime` timestamp NOT NULL,
  `endTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `challengeTeam`
--

INSERT INTO `challengeTeam` (`id`, `idTeam`, `idChallenge`, `isFinish`, `beginTime`, `endTime`) VALUES
(22, 19, 2, 1, '2024-01-07 03:58:43', '2024-01-07 04:07:19'),
(23, 19, 2, 1, '2024-01-07 03:58:43', '2024-01-07 04:07:19'),
(24, 19, 3, 2, '2024-01-07 03:58:43', NULL),
(25, 19, 4, 2, '2024-01-07 03:58:43', NULL),
(26, 19, 5, 2, '2024-01-07 03:58:43', NULL),
(27, 19, 6, 2, '2024-01-07 03:58:43', NULL),
(28, 19, 7, 2, '2024-01-07 03:58:43', NULL),
(29, 19, 8, 2, '2024-01-07 03:58:43', NULL),
(30, 19, 9, 2, '2024-01-07 03:58:43', NULL),
(31, 19, 10, 2, '2024-01-07 03:59:48', NULL),
(32, 19, 1, 1, '2024-01-07 04:00:24', '2024-01-07 04:02:57');

-- --------------------------------------------------------

--
-- Structure de la table `hint`
--

DROP TABLE IF EXISTS `hint`;
CREATE TABLE `hint` (
  `id` int(11) NOT NULL,
  `idChallenge` int(11) NOT NULL,
  `formation` varchar(5) NOT NULL,
  `hint` varchar(1000) NOT NULL,
  `challengeName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hint`
--

INSERT INTO `hint` (`id`, `idChallenge`, `formation`, `hint`, `challengeName`) VALUES
(5, 1, 'RT', 'ctrl maj i', 'ENIGMAHACK'),
(6, 1, 'GEII', 'ctrl maj i', 'ENIGMAHACK'),
(7, 1, 'GCCD', 'ctrl maj i', 'ENIGMAHACK'),
(8, 2, 'RT', 'ouvrir le cadenas', 'SAFE CHEST'),
(9, 2, 'GEII', 'ouvrir le cadenas', 'SAFE CHEST'),
(12, 2, 'GCCD', 'ouvrir le cadenas', 'SAFE CHEST'),
(13, 3, 'RT', 'MES YEUUUX', 'LOOK AROUND'),
(14, 3, 'GEII', 'MES YEUUUX', 'LOOK AROUND'),
(15, 3, 'GCCD', 'MES YEUUUX', 'LOOK AROUND'),
(16, 4, 'RT', '94.3MHz', 'RADIO'),
(17, 4, 'GEII', '94.3MHz', 'RADIO'),
(18, 4, 'GCCD', '94.3MHz', 'RADIO'),
(19, 5, 'RT', 'hydra -l crackme -P /usr/share/wordlists/rockyou.txt ssh://10.102.64.64', 'SSH'),
(20, 5, 'GEII', 'hydra -l crackme -P /usr/share/wordlists/rockyou.txt ssh://10.102.64.64', 'SSH'),
(21, 5, 'GCCD', 'hydra -l crackme -P /usr/share/wordlists/rockyou.txt ssh://10.102.64.64', 'SSH'),
(22, 6, 'GEII', 'cd  -> escapeGame -> memory-game | ./compile', 'YOU CAN DO IT'),
(23, 6, 'GCCD', 'cd  -> escapeGame -> memory-game | ./compile', 'YOU CAN DO IT'),
(24, 6, 'RT', 'cd  -> escapeGame -> memory-game | ./compile', 'YOU CAN DO IT');

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `formation` varchar(5) NOT NULL,
  `teamName` varchar(100) NOT NULL,
  `pwdHash` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `team`
--

INSERT INTO `team` (`id`, `formation`, `teamName`, `pwdHash`) VALUES
(3, 'admin', 'lukas', 'f017527470dbbe0e6f3bcfd12ef43ad4add4e04f9d0e7db76331799620fd2ec6'),
(19, 'RT', 'Toto', 'f017527470dbbe0e6f3bcfd12ef43ad4add4e04f9d0e7db76331799620fd2ec6');

-- --------------------------------------------------------

--
-- Structure de la table `verifyChallenge`
--

DROP TABLE IF EXISTS `verifyChallenge`;
CREATE TABLE `verifyChallenge` (
  `id` int(11) NOT NULL,
  `idChallenge` int(11) NOT NULL,
  `flagHash` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `verifyChallenge`
--

INSERT INTO `verifyChallenge` (`id`, `idChallenge`, `flagHash`) VALUES
(4, 1, 'df5a27c72277cf3ad99f705cc035ce952ace556be538f58189dcbcfa1528be27'),
(5, 2, '6775de85abdb47dbd7f1b1a1d6a10a264b4e68a1f504eb9417763db66a38ef1a'),
(6, 3, 'f39605f73dc1e8ea17dcd827e62566716fc73bb4355c8e0a56bcb22e539ec32c'),
(7, 4, '42b26f671c87fd03dc71eaf4ac7c65bf187273ea99116f174ab8393cd4700214'),
(8, 5, '6701a6a887196926391bba38482414cab32e599c89857b58ba85200fc2b73929'),
(9, 6, '267eb3e4db6c5e74e8b9344e5aa479f3b71642bb5b5fa46f26584819f153a117');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `challengeTeam`
--
ALTER TABLE `challengeTeam`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hint`
--
ALTER TABLE `hint`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teamName` (`teamName`);

--
-- Index pour la table `verifyChallenge`
--
ALTER TABLE `verifyChallenge`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `challengeTeam`
--
ALTER TABLE `challengeTeam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `hint`
--
ALTER TABLE `hint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `verifyChallenge`
--
ALTER TABLE `verifyChallenge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

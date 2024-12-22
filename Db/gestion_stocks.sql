-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 22 déc. 2024 à 09:06
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_stocks`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `tel` char(9) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom`, `prenom`, `adresse`, `tel`, `email`, `password`, `image`, `role`) VALUES
(1, 'victor', 'honore', 'bafoussam', '676289572', 'Admin@gmail.com', 'Admin1234', 'none', '1');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom`) VALUES
(1, 'Ordinateur'),
(2, 'Accessoires'),
(3, 'Imprimante'),
(4, 'Telephone');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `tel` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date_creation` datetime DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `adresse`, `tel`, `email`, `image`, `status`, `date_creation`) VALUES
(1, 'nathand', 'fotso', 'bafoussam', 698567854, 'nathand@gmail.com', '', 0, '2024-12-11 05:07:56'),
(2, 'vino', 'noel', 'yaounde', 123456789, 'vino@gmail.com', '', 0, '2024-12-11 05:07:56'),
(3, 'mero', 'sky', 'buea', 123456789, 'mero@gmail.com', '', 0, '2024-12-11 05:07:56'),
(4, 'tomas', 'shelleby', 'paris', 123456789, 'tomas@gmail.com', '', 1, '2024-12-11 05:07:56'),
(5, 'teles', 'art', 'yaounde', 123456789, 'teles@gmail.com', '', 1, '2024-12-11 05:07:56'),
(6, 'arnold', 'modeste', 'bandjoun', 123456789, 'aaa@gmail.com', '', 0, '2024-12-11 05:07:56'),
(7, 'danielle', 'wingstor', 'paris', 123456789, 'dan@gmail.com', '', 1, '2024-12-11 05:07:56'),
(8, 'kastielle', 'armel', 'yaounde', 123456789, 'kastros@gmail.com', '', 0, '2024-12-11 05:07:56'),
(9, 'atango', 'le blanc', 'france', 123456789, 'tan@gmail.com', '', 0, '2024-12-11 05:29:04'),
(10, 'Suzanne', 'Teffe', 'Bandjoun', 699598983, 'suzanne@gmail.com', '', 0, '2024-12-11 07:11:22'),
(12, 'Alex', 'thimotee', 'garoua', 699587251, 'alex@gmail.com', '', 1, '2024-12-11 11:10:20'),
(14, 'rwerew', 'trer', 'bafoussam', 123456789, 'stevefodjo443@gmail.com', '', 1, '2024-12-18 10:01:53');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `id_fournisseur` int(11) DEFAULT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `date_commande` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_produit`, `id_fournisseur`, `quantite`, `prix`, `date_commande`) VALUES
(1, 1, 1, 43, 129, '0000-00-00 00:00:00'),
(2, 2, 1, 45, 2025, '0000-00-00 00:00:00'),
(3, 3, 1, 23, 1541, '0000-00-00 00:00:00'),
(4, 4, 1, 40, 1800, '0000-00-00 00:00:00'),
(5, 5, 1, 40, 2240, '0000-00-00 00:00:00'),
(7, 15, 1, 12, 7800000, '0000-00-00 00:00:00'),
(8, 14, 2, 20, 1000, '0000-00-00 00:00:00'),
(9, 8, 2, 4, 2266672, '0000-00-00 00:00:00'),
(10, 17, 3, 10, 900000, '0000-00-00 00:00:00'),
(11, 17, 3, 10, 900000, '0000-00-00 00:00:00'),
(12, 17, 3, 10, 900000, '0000-00-00 00:00:00'),
(13, 1, 3, 5, 2000000, '0000-00-00 00:00:00'),
(14, 3, 3, 3, 201, '0000-00-00 00:00:00'),
(15, 1, 3, 12, 4800000, '0000-00-00 00:00:00'),
(16, 1, 4, 2, 800000, '0000-00-00 00:00:00'),
(17, 1, 3, 5, 2000000, '0000-00-00 00:00:00'),
(18, 1, 3, 2, 800000, '0000-00-00 00:00:00'),
(19, 18, 5, 5, 4750000, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fournisseur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `tel` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fournisseur`, `nom`, `prenom`, `adresse`, `tel`, `email`, `role`, `date_creation`) VALUES
(1, 'evrado', 'valdez', 'paris', 658342400, 'evrado@gmail.com', 0, '2024-12-15 12:29:18'),
(2, 'richard', 'ekalle', 'yaounde', 67886543, 'richaed@gmail.com', 0, '2024-12-15 16:28:51'),
(3, 'kali', 'vic', 'douala', 123456789, 'kalivic87@gmail.com', 0, '2024-12-17 10:23:23'),
(4, 'william', 'steve', 'bafoussam', 123456788, 'stevefodjo43@gmail.com', 0, '2024-12-17 14:01:21'),
(5, 'Mr koudjou', 'Blondon', 'bafoussam', 67543424, 'gbprogrammeur@gmail.com', 0, '2024-12-18 10:36:11');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix_u` int(11) NOT NULL,
  `date_fabrication` datetime NOT NULL,
  `date_expiration` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom`, `id_categorie`, `quantite`, `prix_u`, `date_fabrication`, `date_expiration`) VALUES
(1, 'Azus ROG', 1, 30, 400000, '2024-12-10 00:00:00', '2024-12-04 00:00:00'),
(2, 'Web Cam samsung', 2, 55, 45000, '2024-12-18 00:00:00', '2024-12-09 00:00:00'),
(3, 'brosse', 1, 26, 67, '2024-12-18 00:00:00', '2024-12-18 00:00:00'),
(4, 'Souri Gaming', 2, 1, 30000, '2024-12-27 00:00:00', '2024-12-18 00:00:00'),
(5, 'bonbon', 1, 40, 56, '2024-12-02 00:00:00', '2024-12-12 00:00:00'),
(6, 'Clavier Steal series', 2, 12, 75000, '2024-12-12 00:00:00', '2024-12-25 00:00:00'),
(7, 'tunm', 1, 0, 56, '2024-12-04 00:00:00', '2024-12-18 00:00:00'),
(8, 'wdwdew dwedw', 1, 1, 566668, '2024-12-20 00:00:00', '2024-12-03 00:00:00'),
(9, 'wdwdew dweu', 1, 0, 5, '2025-01-01 00:00:00', '2024-12-03 00:00:00'),
(11, 'Dell inspiron', 1, 5, 340000, '2024-12-19 00:00:00', '2024-12-10 00:00:00'),
(12, 'hono', 1, 0, 10, '2024-12-31 00:00:00', '2024-12-04 00:00:00'),
(13, 'ffxwrtfthtus', 1, 0, 45, '2024-04-03 00:00:00', '2024-06-05 00:00:00'),
(14, 'Airpods pro 2', 2, 20, 20000, '2020-01-01 00:00:00', '2025-07-25 00:00:00'),
(15, 'azus', 1, 12, 650000, '2024-12-02 00:00:00', '2024-12-28 00:00:00'),
(16, 'menace', 1, 0, 23, '2024-11-25 00:00:00', '2024-12-27 00:00:00'),
(17, 'Iphone x', 4, 58, 90000, '2016-09-04 00:00:00', '2030-09-08 00:00:00'),
(18, 'iphone 16 pro max', 4, 19, 950000, '2024-09-05 00:00:00', '2028-07-11 00:00:00'),
(19, 'iphone 14', 4, 15, 950777, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE `vente` (
  `id_vente` int(11) NOT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `quantite` int(11) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `date_vente` datetime DEFAULT current_timestamp(),
  `etat` enum('0','1','2') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`id_vente`, `id_produit`, `id_client`, `quantite`, `prix`, `date_vente`, `etat`) VALUES
(18, 2, 1, 65, '455', '2024-12-11 05:47:33', '1'),
(19, 7, 4, 34, '34', '2024-12-11 05:47:33', '0'),
(20, 1, 1, 100, '1', '2024-12-11 05:47:33', '1'),
(21, 1, 1, 100, '23', '2024-12-11 05:47:33', '1'),
(22, 1, 1, 60, '23', '2024-12-11 05:47:33', '1'),
(23, 1, 1, 123, '122', '2024-12-11 05:47:33', '1'),
(24, 1, 1, 200, '23', '2024-12-11 05:47:33', '1'),
(25, 1, 3, 23, '1000', '2024-12-11 05:47:33', '0'),
(26, 1, 1, 466, '23', '2024-12-11 05:47:33', '1'),
(27, 1, 3, 500, '200', '2024-12-11 05:47:33', '0'),
(28, 1, 3, 54, '23', '2024-12-11 05:47:33', '0'),
(30, 1, 1, 2, '22323', '2024-12-11 05:47:33', '1'),
(31, 1, 3, 4, '1000', '2024-12-11 05:47:33', '0'),
(32, 11, 1, 40, '100', '2024-12-11 05:47:33', '1'),
(33, 1, 3, 45, '100000', '2024-12-11 05:47:33', '1'),
(34, 5, 1, 10, '1222', '2024-12-11 05:47:33', '1'),
(35, 1, 1, 50, '1000', '2024-12-11 05:47:33', '1'),
(36, 1, 1, 60, '2002', '2024-12-11 05:47:33', '1'),
(37, 1, 1, 80, '2000', '2024-12-11 05:47:33', '1'),
(38, 1, 1, 90, '232323', '2024-12-11 05:47:33', '1'),
(39, 1, 1, 34, '100', '2024-12-11 05:47:33', '1'),
(40, 1, 1, 40, '23', '2024-12-11 05:47:33', '1'),
(41, 1, 1, 79, '34', '2024-12-11 05:47:33', '1'),
(42, 1, 1, 80, '124', '2024-12-11 05:47:33', '1'),
(43, 2, 2, 70, '1234', '2024-12-11 05:47:33', '1'),
(44, 1, 1, 90, '1000', '2024-12-11 05:47:33', '1'),
(45, 1, 1, 100, '100', '2024-12-11 05:47:33', '1'),
(46, 1, 1, 120, '1000', '2024-12-11 05:47:33', '1'),
(47, 1, 1, 300, '2332', '2024-12-11 05:47:33', '1'),
(48, 1, 1, 340, '200', '2024-12-11 05:47:33', '0'),
(49, 1, 1, 4000, '34', '2024-12-11 05:47:33', '1'),
(50, 1, 1, 10000, '12', '2024-12-11 05:47:33', '1'),
(51, 1, 1, 12, '12', '2024-12-11 05:47:33', '1'),
(52, 1, 1, 14, '23', '2024-12-11 05:47:33', '0'),
(53, 1, 1, 13, '12', '2024-12-11 05:47:33', '0'),
(54, 1, 1, 14, '23', '2024-12-11 05:47:33', '0'),
(55, 1, 1, 16, '23', '2024-12-11 05:47:33', '0'),
(56, 1, 1, 17, '45', '2024-12-11 05:47:33', '0'),
(57, 1, 1, 34, '34', '2024-12-11 05:47:33', '0'),
(58, 2, 3, 46, '45', '2024-12-11 05:47:33', '1'),
(59, 1, 1, 50, '50', '2024-12-11 05:47:33', '0'),
(60, 2, 1, 50, '50', '2024-12-11 05:47:33', '0'),
(61, 1, 1, 34, '45', '2024-12-11 05:47:33', '0'),
(62, 1, 1, 45, '434', '2024-12-11 05:47:33', '0'),
(63, 1, 1, 56, '45', '2024-12-11 05:47:33', '0'),
(64, 1, 1, 34, '34', '2024-12-11 05:47:33', '0'),
(65, 1, 1, 45, '45', '2024-12-11 05:47:33', '0'),
(66, 1, 1, 41, '23', '2024-12-11 05:47:33', '0'),
(67, 1, 1, 50, '3', '2024-12-11 05:47:33', '0'),
(68, 1, 1, 80, '45', '2024-12-11 05:47:33', '0'),
(69, 1, 1, 81, '56', '2024-12-11 05:47:33', '0'),
(70, 1, 1, 80, '34', '2024-12-11 05:47:33', '0'),
(71, 1, 1, 60, '43', '2024-12-11 05:47:33', '0'),
(72, 1, 1, 58, '45', '2024-12-11 05:47:33', '0'),
(73, 1, 1, 57, '34', '2024-12-11 05:47:33', '0'),
(74, 1, 1, 54, '45', '2024-12-11 05:47:33', '0'),
(75, 1, 1, 53, '34', '2024-12-11 05:47:33', '0'),
(76, 1, 1, 52, '23', '2024-12-11 05:47:33', '0'),
(77, 1, 1, 51, '23', '2024-12-11 05:47:33', '0'),
(78, 1, 1, 50, '34', '2024-12-11 05:47:33', '0'),
(79, 1, 1, 49, '34', '2024-12-11 05:47:33', '0'),
(80, 1, 1, 20, '2300', '2024-12-11 07:19:29', '0'),
(81, 1, 1, 1, '100', '2024-12-11 07:19:45', '0'),
(82, 6, 10, 12, '34', '2024-12-11 07:38:46', '1'),
(83, 3, 6, 34, '2278', '2024-12-11 08:04:43', '0'),
(84, 1, 1, 3, '9', '2024-12-11 08:12:16', '0'),
(85, 4, 8, 5, '225', '2024-12-11 08:27:56', '1'),
(86, 3, 9, 2, '134', '2024-12-11 08:33:39', '0'),
(87, 1, 1, 3, '9', '2024-12-11 08:52:29', '0'),
(88, 6, 1, 45, '4005', '2024-12-11 12:38:43', '0'),
(89, 2, 12, 30, '1350', '2024-12-12 06:31:27', '1'),
(90, 6, 10, 12, '1068', '2024-12-12 06:35:29', '1'),
(91, 2, 1, 4, '180', '2024-12-12 08:05:55', '1'),
(92, 2, 1, 2, '90', '2024-12-12 08:12:49', '1'),
(93, 2, 1, 2, '90', '2024-12-12 08:13:54', '1'),
(94, 1, 1, 45, '135', '2024-12-13 05:49:48', '0'),
(95, 1, 1, 55, '165', '2024-12-13 05:49:52', '0'),
(96, 1, 1, 45, '135', '2024-12-13 06:11:17', '0'),
(97, 1, 1, 56, '168', '2024-12-13 06:26:46', '0'),
(98, 1, 1, 67, '201', '2024-12-13 06:34:18', '0'),
(99, 1, 12, 22, '66', '2024-12-13 06:38:31', '0'),
(100, 1, 1, 23, '69', '2024-12-13 06:49:12', '0'),
(101, 1, 1, 45, '135', '2024-12-13 06:52:14', '0'),
(102, 1, 1, 54, '162', '2024-12-13 08:15:48', '0'),
(103, 1, 1, 45, '135', '2024-12-13 08:16:29', '0'),
(104, 1, 1, 4, '12', '2024-12-13 08:16:33', '0'),
(105, 4, 1, 4, '180', '2024-12-13 08:16:43', '0'),
(106, 1, 5, 34, '102', '2024-12-13 08:26:15', '0'),
(107, 4, 1, 1, '45', '2024-12-13 08:26:24', '0'),
(108, 2, 1, 34, '1530', '2024-12-13 08:26:29', '0'),
(109, 1, 3, 345, '1035', '2024-12-13 08:33:57', '0'),
(110, 1, 2, 45, '135', '2024-12-15 12:07:56', '0'),
(111, 4, 1, 30, '1350', '2024-12-15 14:49:29', '0'),
(112, 1, 1, 1000, '3000', '2024-12-15 16:51:53', '0'),
(113, 1, 1, 10000, '30000', '2024-12-15 17:15:36', '0'),
(114, 1, 1, 23, '69', '2024-12-15 20:06:00', '0'),
(115, 2, 1, 2, '90', '2024-12-15 20:06:41', '0'),
(116, 4, 1, 4, '180', '2024-12-15 20:07:01', '0'),
(117, 8, 1, 3, '1700004', '2024-12-15 20:07:09', '0'),
(118, 1, 1, 34, '102', '2024-12-15 20:44:00', '0'),
(119, 1, 1, 4, '1600000', '2024-12-17 11:33:30', '1'),
(120, 1, 1, 15, '6000000', '2024-12-17 11:36:08', '1'),
(121, 17, 2, 1, '90000', '2024-12-17 11:49:25', '0'),
(122, 17, 3, 1, '90000', '2024-12-17 13:59:54', '0'),
(123, 1, 3, 1, '400000', '2024-12-17 14:04:06', '1'),
(124, 4, 1, 1, '45', '2024-12-17 14:04:14', '0'),
(125, 1, 3, 1, '400000', '2024-12-17 14:05:26', '1'),
(126, 17, 3, 1, '90000', '2024-12-17 14:05:34', '1'),
(127, 4, 3, 4, '180', '2024-12-17 14:05:42', '0'),
(128, 1, 1, 12, '4800000', '2024-12-17 14:07:42', '0'),
(129, 1, 1, 2, '800000', '2024-12-17 14:57:01', '0'),
(130, 1, 2, 4, '1600000', '2024-12-18 05:17:43', '0'),
(131, 18, 3, 1, '950000', '2024-12-18 09:59:56', '0'),
(132, 1, 3, 1, '400000', '2024-12-18 10:01:01', '0');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_fournisseur` (`id_fournisseur`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fournisseur`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`id_vente`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_client` (`id_client`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `vente`
--
ALTER TABLE `vente`
  MODIFY `id_vente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id_fournisseur`);

--
-- Contraintes pour la table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `vente_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `vente_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

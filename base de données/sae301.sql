-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 22 déc. 2023 à 11:08
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae301`
--

-- --------------------------------------------------------

--
-- Structure de la table `don`
--

CREATE TABLE `don` (
  `id_don` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `somme` decimal(10,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `don`
--

INSERT INTO `don` (`id_don`, `id_utilisateur`, `somme`, `date`) VALUES
(3, 100, 45.00, '0000-00-00'),
(4, 100, 10.00, '0000-00-00'),
(5, 100, 1.00, '0000-00-00'),
(6, 100, 23.00, '0000-00-00'),
(7, 101, 23.00, '0000-00-00');


-- --------------------------------------------------------

--
-- Structure de la table `inscrit`
--

CREATE TABLE `inscrit` (
  `id_utilisateur` int(11) DEFAULT NULL,
  `nombre_de_place` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inscrit`
--

INSERT INTO `inscrit` (`id_utilisateur`, `nombre_de_place`) VALUES
(99, 6),
(100, 2),
(101, 3);

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE `partenaire` (
  `id_partenaire` int(11) NOT NULL,
  `nom_partenaire` varchar(255) NOT NULL,
  `image_partenaire` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `partenaire`
--

INSERT INTO `partenaire` (`id_partenaire`, `nom_partenaire`, `image_partenaire`) VALUES
(7, 'P\'tites Pétites', 'images/ptitespepites.png'),
(8, 'Salon Cyrano Restaurant & Salon de thé', 'images/saloncyrano.png'),
(9, 'Subway Le Puy-en-Velay', 'images/subway.png'),
(10, 'L\'Atelier des Étoiles - Meubles & Objets anciens revisités.', 'images/atelierdesetoiles.png'),
(11, 'Mairie du Puy-en-Velay', 'images/Rectangle 91.png'),
(12, 'Communauté d\'Agglomération du Puy-en-Velay', 'images/Rectangle 93.png');

-- --------------------------------------------------------

--
-- Structure de la table `programme`
--

CREATE TABLE `programme` (
  `id_activite` int(11) NOT NULL,
  `nom_activite` varchar(255) NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `image_activite` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `programme`
--

INSERT INTO `programme` (`id_activite`, `nom_activite`, `heure_debut`, `heure_fin`, `image_activite`) VALUES
(6, 'Food Truck', '19:30:00', '23:00:00', 'images/foodtruck.png'),
(7, 'Customisation de lanternes', '19:00:00', '23:30:00', 'images/customlantern.png'),
(8, 'Boisson & Apéritif', '19:00:00', '21:00:00', 'images/boisson.png'),
(9, 'Musique & DJ', '21:00:00', '04:00:00', 'images/dj.png'),
(10, 'Lancer de lanterne', '00:00:00', '00:30:00', 'images/lancerlantern.png');

-- --------------------------------------------------------

--
-- Structure de la table `stand_present`
--

CREATE TABLE `stand_present` (
  `id_stand` int(11) NOT NULL,
  `nom_stand` varchar(255) NOT NULL,
  `image_stand` varchar(255) DEFAULT NULL,
  `position_stand` varchar(255) DEFAULT NULL,
  `type_de_stand` varchar(255) DEFAULT NULL,
  `bio_stand` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stand_present`
--

INSERT INTO `stand_present` (`id_stand`, `nom_stand`, `image_stand`, `position_stand`, `type_de_stand`, `bio_stand`) VALUES
(10, 'Subway', 'images/subway.png', '4', 'Restauration & Animation', ' Subway vous régalera en distribuant des cookies délicieusement irrésistibles, une façon savoureuse de célébrer le Nouvel An avec une touche sucrée et réconfortante.'),
(11, 'Salon Cyrano ', 'images/saloncyrano.png', '2', 'Restauration & Animation', 'Le stand vous propose une sélection exquise de petits gâteaux spécialement conçus pour célébrer le Nouvel An.'),
(12, 'P\'tites Pétites', 'images/ptitespepites.png', '2', 'Goodies & Animation', 'Stands de souvenirs exclusifs mettant en avant les beautés et les symboles de la ville.'),
(13, 'L\'atelier des étoiles', 'images/atelierdesetoiles.png', '1', 'Goodies & Animation', 'Atelier de fabrication de lanternes animé par des artisans locaux, mettant en avant les talents créatifs de la région.');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `date_de_naissance` date NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom`, `prenom`, `mail`, `numero`, `date_de_naissance`, `password`) VALUES
(91, 'Chemarin', 'Morgan', 'titi@gmil.com', '0783676506', '2023-12-01', '$2y$10$hno1RtOiDBqgq5SG12AX4uPb/aVosVp8Af9hAPmjbkizXY6WNu./S'),
(92, 'titi', 'lilou', 'lilou@gmai.com', '000', '2023-11-30', '$2y$10$mnkuXjHnBjD8ljOlR3dCN.5rVa.CjT/a9Rf23CVoxRKoseWSTN5cm'),
(93, 'aze', 'aze', 'titi@gfh.com', '09', '2023-12-28', '$2y$10$zSJIpzZ8/96M2vvR0agY9ew.0otY6OM.dPwCpMjeAYWUaBffv5XlC'),
(94, 'Morgan', 'Chemarin', 'azerty@gmail.com', '123456789', '2023-12-30', '$2y$10$HZGzYvOXhtJiY5dMc3jYBOyPnW.xLoM4tEWKAyfIRIn0O0576Lm1u'),
(98, 'Chemarin', 'Morgan', 'momovies@laposte.net', '234567890987654', '2023-12-29', '$2y$10$X8yn.KLIcJ9sCmqtOMknquzJgkUcwGGdzJKHU9YNQ8Zsx8CE3GcuO'),
(99, 'test', 'abDel', 'testtest@gmail.com', '234567', '2004-12-12', '$2y$10$NiVgDKCEuckSTZPGORF7DerKGbE2eAkFXiWb9G/M7ZuNLgEz/PN7O'),
(100, 'testttt', 'test', 'test@gmail.com', '123456789', '2004-05-20', '$2y$10$Hx/i5juOvPFSor3IrXoAcO3p5vjrwblM8dNjOv4cCyQiOoe6McFpK'),
(101, 'momo', 'momo', 'momo@gmail.com', '123456789', '2012-12-12', '$2y$10$eqFj5JJ9DTPn2rVEB4iR7ePTaUpMa9bSx1PzUpeEmrMsYNd14nx6u'),
(102, 'rquejgbqndgq', 'dkndfbn', 'a@a.com', '123456', '2004-05-29', '$2y$10$7587MlF/Sde7dL5B1dpfvOH0Jd/oqosM6hF1ol6l0uB4/lD.w2pjK');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `don`
--
ALTER TABLE `don`
  ADD PRIMARY KEY (`id_don`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `inscrit`
--
ALTER TABLE `inscrit`
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`id_partenaire`);

--
-- Index pour la table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`id_activite`);

--
-- Index pour la table `stand_present`
--
ALTER TABLE `stand_present`
  ADD PRIMARY KEY (`id_stand`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `don`
--
ALTER TABLE `don`
  MODIFY `id_don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `id_partenaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `programme`
--
ALTER TABLE `programme`
  MODIFY `id_activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `stand_present`
--
ALTER TABLE `stand_present`
  MODIFY `id_stand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `don`
--
ALTER TABLE `don`
  ADD CONSTRAINT `don_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `inscrit`
--
ALTER TABLE `inscrit`
  ADD CONSTRAINT `inscrit_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

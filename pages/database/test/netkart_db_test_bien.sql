-- phpMyAdmin SQL Dump
-- version 5.1.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql-netkart.alwaysdata.net
-- Generation Time: Jan 25, 2023 at 09:45 PM
-- Server version: 10.6.11-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netkart_db_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `Circuit`
--

CREATE TABLE `Circuit` (
  `id_circuit` int(11) NOT NULL,
  `nom_circuit` varchar(100) NOT NULL,
  `points` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL,
  `id_joueur` int(11) NOT NULL,
  `id_circuitimage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Circuit`
--

INSERT INTO `Circuit` (`id_circuit`, `nom_circuit`, `points`, `id_theme`, `id_joueur`, `id_circuitimage`) VALUES
(8, 'Adresse IP', 20, 7, 3, 1),
(10, 'VLAN', 20, 8, 3, 2),
(15, 'Codage', 20, 8, 3, 3),
(20, 'Table de routage', 20, 8, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Circuit_Checkpoint`
--

CREATE TABLE `Circuit_Checkpoint` (
  `id_circuitcheckpoint` int(11) NOT NULL,
  `coordonnee_x` decimal(10,0) NOT NULL,
  `coordonnee_y` decimal(10,0) NOT NULL,
  `id_circuitimage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Circuit_Image`
--

CREATE TABLE `Circuit_Image` (
  `id_circuitimage` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Circuit_Image`
--

INSERT INTO `Circuit_Image` (`id_circuitimage`, `image`) VALUES
(1, 'circuit1.jpg'),
(2, 'circuit2.jpg'),
(3, 'circuit3.jpg'),
(4, 'circuit4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Groupe`
--

CREATE TABLE `Groupe` (
  `id_groupe` int(11) NOT NULL,
  `nom_groupe` varchar(200) NOT NULL,
  `code` varchar(6) NOT NULL,
  `debut` datetime NOT NULL,
  `duree` time NOT NULL,
  `id_joueur` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Groupe_Joueur`
--

CREATE TABLE `Groupe_Joueur` (
  `id_groupejoueur` int(11) NOT NULL,
  `pseudo_groupe` varchar(100) NOT NULL,
  `score` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Joueur`
--

CREATE TABLE `Joueur` (
  `id_joueur` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `code_confirmation` varchar(20) NOT NULL,
  `verification` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Joueur`
--

INSERT INTO `Joueur` (`id_joueur`, `nom`, `prenom`, `pseudo`, `email`, `mot_de_passe`, `code_confirmation`, `verification`) VALUES
(3, 'ADMIN', 'admin', 'Admin', 'admin_netkart@gmail.com', 'admin_netkart', '019038239', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Question`
--

CREATE TABLE `Question` (
  `id_question` int(11) NOT NULL,
  `consigne` text NOT NULL,
  `question` varchar(200) NOT NULL,
  `reponse` varchar(200) NOT NULL,
  `id_circuit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Question`
--

INSERT INTO `Question` (`id_question`, `consigne`, `question`, `reponse`, `id_circuit`) VALUES
(13, 'Répondre a la question dans le terminal.', 'Quelle est la commande qui permet d\'afficher l\'adresse MAC depuis un terminal ?', 'ipconfig/all', 8),
(14, 'Déterminez l\'adresse du réseau a partir de l\'adresse IP et du masque', '@IP = 10.124.11.200 Masque = 255.255.0.0', '10.124.0.0/16', 8),
(15, 'Réaliser un ping a l\'adresse publique dans la liste donnée', '10.11.200.11 - 192.168.0.1 - 172.33.200.10 - 172.18.18.200', 'ping 172.33.200.10', 8),
(16, 'Saisir les stations dans le terminal sous ce format : st1, st2, st3', 'Quelles sont les stations qui reçoivent une trame émise en broadcast depuis st4', 'st3, st4, st5', 10),
(17, 'Saisir les stations dans le terminal sous ce format : st1, st2, st3. Supposons maintenant que la liaison 802.1q soit active entre les deux switchs.', 'Quelles sont les stations qui reçoivent une trame en diffusion depuis st1', 'st3, st5', 10),
(18, 'Saisir les stations dans le terminal sous ce format : st1, st2, st3. Supposons maintenant que la liaison 802.1q soit active entre les deux switchs.', 'Quelles sont les stations qui reçoivent une trame en diffusion depuis st2', 'st4', 10),
(19, 'Saisir le code en binaire sous ce format : 0011010101', 'Convertir le codage NRZ de l\'images en binaire', '01010110', 15),
(20, 'Saisir le code en binaire sous ce format : 0011010101', 'Convertir le codage Manchester de l\'images en binaire', '01010110', 15),
(21, 'Saisir le code en binaire sous ce format : 0011010101', 'Convertir le codage bipolaire de l\'images en binaire', '01010110', 15),
(22, 'Pour chaque question, le résultat devra être sous ce format : 150.30.0.1 ', 'Intéressons nous a la table de routage de R2, quelle est l\'interface du routeur associée a la destination 206.20.55.0/24', '120.0.0.2', 20),
(23, 'Pour chaque question, le résultat devra être sous ce format : 150.30.0.1 ', 'Intéressons nous a la table de routage de R3, quelle est l\'interface du routeur associée a la destination 206.20.55.0/24', '0.0.0.0', 20),
(24, 'Pour chaque question, le résultat devra être sous ce format : 150.30.0.1 ', 'Intéressons nous a la table de routage de S2, quelle est l\'interface du routeur associée a la destination 200.50.70.0/24', '120.0.0.1', 20);

-- --------------------------------------------------------

--
-- Table structure for table `Question_Image`
--

CREATE TABLE `Question_Image` (
  `id_questionimage` int(11) NOT NULL,
  `image_question` varchar(255) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Question_Image`
--

INSERT INTO `Question_Image` (`id_questionimage`, `image_question`, `id_question`) VALUES
(18, '6oLJoFUeKZ.png', 16),
(19, '3kz1o0KV3D.png', 17),
(20, 'sa9BiVvHTa.png', 18),
(21, 'aT5CwIXQ6u.png', 19),
(22, 'h06P43T5ZT.png', 20),
(23, 'ced6IhJriM.png', 21),
(24, 'e15LwPQloj.png', 22),
(25, 'MzUegQNPjZ.png', 23),
(26, 'Y3uQbctB4r.png', 24);

-- --------------------------------------------------------

--
-- Table structure for table `Question_Lien`
--

CREATE TABLE `Question_Lien` (
  `id_questionlien` int(11) NOT NULL,
  `lien` varchar(255) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Question_Lien`
--

INSERT INTO `Question_Lien` (`id_questionlien`, `lien`, `id_question`) VALUES
(12, 'https://www.avast.com/fr-fr/c-ip-address-public-vs-private#:~:text=Une%20adresse%20IP%20publique%20vous,d%27autres%20appareils%20du%20r%C3%A9seau.', 15),
(13, 'https://ametice.univ-amu.fr/pluginfile.php/6286449/mod_resource/content/3/couche%20r%C3%A9seau.pdf', 13),
(14, 'https://ametice.univ-amu.fr/pluginfile.php/6286449/mod_resource/content/3/couche%20r%C3%A9seau.pdf', 14),
(15, 'https://ametice.univ-amu.fr/pluginfile.php/6286449/mod_resource/content/3/couche%20r%C3%A9seau.pdf', 15),
(16, 'https://ametice.univ-amu.fr/pluginfile.php/6286449/mod_resource/content/3/couche%20r%C3%A9seau.pdf', 16),
(17, 'https://ametice.univ-amu.fr/pluginfile.php/6286449/mod_resource/content/3/couche%20r%C3%A9seau.pdf', 17),
(18, 'https://ametice.univ-amu.fr/pluginfile.php/6286449/mod_resource/content/3/couche%20r%C3%A9seau.pdf', 18);

-- --------------------------------------------------------

--
-- Table structure for table `Statistiques`
--

CREATE TABLE `Statistiques` (
  `id_joueurStatistiques` int(11) NOT NULL,
  `id_circuitStatistiques` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Theme`
--

CREATE TABLE `Theme` (
  `id_theme` int(11) NOT NULL,
  `nom_theme` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Theme`
--

INSERT INTO `Theme` (`id_theme`, `nom_theme`, `description`) VALUES
(7, 'Base du réseau', 'Thème ayant pour objectif l\'apprentissage des bases du réseau'),
(8, 'Routage', 'Thème ayant pour objectif l\'apprentissage du réseau');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Circuit`
--
ALTER TABLE `Circuit`
  ADD PRIMARY KEY (`id_circuit`),
  ADD KEY `id_theme` (`id_theme`),
  ADD KEY `id_joueur` (`id_joueur`),
  ADD KEY `id_circuitimage_circuit` (`id_circuitimage`);

--
-- Indexes for table `Circuit_Checkpoint`
--
ALTER TABLE `Circuit_Checkpoint`
  ADD PRIMARY KEY (`id_circuitcheckpoint`),
  ADD KEY `id_circuitimage` (`id_circuitimage`);

--
-- Indexes for table `Circuit_Image`
--
ALTER TABLE `Circuit_Image`
  ADD PRIMARY KEY (`id_circuitimage`);

--
-- Indexes for table `Groupe`
--
ALTER TABLE `Groupe`
  ADD PRIMARY KEY (`id_groupe`),
  ADD KEY `id_joueur_groupe` (`id_joueur`),
  ADD KEY `id_theme_groupe` (`id_theme`);

--
-- Indexes for table `Groupe_Joueur`
--
ALTER TABLE `Groupe_Joueur`
  ADD PRIMARY KEY (`id_groupejoueur`),
  ADD KEY `id_groupe` (`id_groupe`);

--
-- Indexes for table `Joueur`
--
ALTER TABLE `Joueur`
  ADD PRIMARY KEY (`id_joueur`);

--
-- Indexes for table `Question`
--
ALTER TABLE `Question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `id_circuit` (`id_circuit`);

--
-- Indexes for table `Question_Image`
--
ALTER TABLE `Question_Image`
  ADD PRIMARY KEY (`id_questionimage`),
  ADD KEY `question_image` (`id_question`);

--
-- Indexes for table `Question_Lien`
--
ALTER TABLE `Question_Lien`
  ADD PRIMARY KEY (`id_questionlien`),
  ADD KEY `id_question` (`id_question`);

--
-- Indexes for table `Statistiques`
--
ALTER TABLE `Statistiques`
  ADD PRIMARY KEY (`id_joueurStatistiques`,`id_circuitStatistiques`),
  ADD KEY `id_circuit_stats` (`id_circuitStatistiques`);

--
-- Indexes for table `Theme`
--
ALTER TABLE `Theme`
  ADD PRIMARY KEY (`id_theme`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Circuit`
--
ALTER TABLE `Circuit`
  MODIFY `id_circuit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `Circuit_Checkpoint`
--
ALTER TABLE `Circuit_Checkpoint`
  MODIFY `id_circuitcheckpoint` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Circuit_Image`
--
ALTER TABLE `Circuit_Image`
  MODIFY `id_circuitimage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Groupe`
--
ALTER TABLE `Groupe`
  MODIFY `id_groupe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Groupe_Joueur`
--
ALTER TABLE `Groupe_Joueur`
  MODIFY `id_groupejoueur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Joueur`
--
ALTER TABLE `Joueur`
  MODIFY `id_joueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Question`
--
ALTER TABLE `Question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `Question_Image`
--
ALTER TABLE `Question_Image`
  MODIFY `id_questionimage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `Question_Lien`
--
ALTER TABLE `Question_Lien`
  MODIFY `id_questionlien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Theme`
--
ALTER TABLE `Theme`
  MODIFY `id_theme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Circuit`
--
ALTER TABLE `Circuit`
  ADD CONSTRAINT `id_circuitimage_circuit` FOREIGN KEY (`id_circuitimage`) REFERENCES `Circuit_Image` (`id_circuitimage`),
  ADD CONSTRAINT `id_joueur` FOREIGN KEY (`id_joueur`) REFERENCES `Joueur` (`id_joueur`),
  ADD CONSTRAINT `id_theme` FOREIGN KEY (`id_theme`) REFERENCES `Theme` (`id_theme`);

--
-- Constraints for table `Circuit_Checkpoint`
--
ALTER TABLE `Circuit_Checkpoint`
  ADD CONSTRAINT `id_circuitimage` FOREIGN KEY (`id_circuitimage`) REFERENCES `Circuit_Image` (`id_circuitimage`);

--
-- Constraints for table `Groupe`
--
ALTER TABLE `Groupe`
  ADD CONSTRAINT `id_joueur_groupe` FOREIGN KEY (`id_joueur`) REFERENCES `Joueur` (`id_joueur`),
  ADD CONSTRAINT `id_theme_groupe` FOREIGN KEY (`id_theme`) REFERENCES `Theme` (`id_theme`);

--
-- Constraints for table `Groupe_Joueur`
--
ALTER TABLE `Groupe_Joueur`
  ADD CONSTRAINT `id_groupe` FOREIGN KEY (`id_groupe`) REFERENCES `Groupe` (`id_groupe`);

--
-- Constraints for table `Question`
--
ALTER TABLE `Question`
  ADD CONSTRAINT `id_circuit` FOREIGN KEY (`id_circuit`) REFERENCES `Circuit` (`id_circuit`);

--
-- Constraints for table `Question_Image`
--
ALTER TABLE `Question_Image`
  ADD CONSTRAINT `question_image` FOREIGN KEY (`id_question`) REFERENCES `Question` (`id_question`);

--
-- Constraints for table `Question_Lien`
--
ALTER TABLE `Question_Lien`
  ADD CONSTRAINT `id_question` FOREIGN KEY (`id_question`) REFERENCES `Question` (`id_question`);

--
-- Constraints for table `Statistiques`
--
ALTER TABLE `Statistiques`
  ADD CONSTRAINT `id_circuit_stats` FOREIGN KEY (`id_circuitStatistiques`) REFERENCES `Circuit` (`id_circuit`),
  ADD CONSTRAINT `id_joueur_stats` FOREIGN KEY (`id_joueurStatistiques`) REFERENCES `Joueur` (`id_joueur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

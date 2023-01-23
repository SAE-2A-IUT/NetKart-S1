-- phpMyAdmin SQL Dump
-- version 5.1.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql-netkart.alwaysdata.net
-- Generation Time: Jan 23, 2023 at 04:00 PM
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
(4, 'Initiation', 20, 4, 1, 1),
(5, 'Intermediaire', 40, 5, 1, 2),
(6, 'Avancé', 30, 6, 1, 4),
(7, 'Test SAE', 100, 6, 1, 4);

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
(1, 'Laé', 'Tibo', 'Tibo', 'tibo@gmail.com', 'tibo', '0891893', 1),
(2, 'V', 'R', 'RV', 'RV@gmail.com', 'rvRVrv', '0E678', 1);

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
(1, 'Pellentesque nibh metus, suscipit a dignissim a, rhoncus vel erat. Nullam urna sapien, varius at tristique vel, vestibulum non orci. Nam quis risus vitae odio varius dictum. Nam lobortis pulvinar tincidunt. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent consectetur aliquet eros, vel aliquam.', 'Question 1 : Initiation', 'Integer vitae', 4),
(2, 'Donec ac aliquet nisl, eu faucibus urna. Ut sollicitudin mauris turpis, non vehicula leo pulvinar bibendum. Cras ullamcorper consectetur rutrum. Vivamus gravida diam vitae accumsan varius. Fusce scelerisque sapien ut mi cursus, in blandit sem tempor. Mauris vehicula justo rutrum.', 'Question 2 : Initiation', 'Maecenas et.', 4),
(3, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nulla facilisi. Praesent convallis at tortor luctus.', 'Question 3 : Initiation', 'Nunc eget', 4),
(4, 'Vivamus sed arcu neque. Praesent et ante iaculis, scelerisque nunc elementum, euismod augue. Aliquam ultrices aliquet elementum. Fusce volutpat, metus eu commodo blandit, felis ex efficitur mauris, sed vehicula quam magna vel ex. Maecenas facilisis scelerisque neque sit amet molestie. Nullam felis lorem, tincidunt eget nulla in, sagittis placerat orci. Sed diam libero, aliquet at.', '1+1 = ?', '1', 5),
(5, 'Suspendisse ac imperdiet magna. Quisque placerat ligula vel metus porta commodo. Vestibulum egestas convallis aliquam. Nam lobortis sagittis eleifend. Integer tincidunt dolor ut felis fermentum efficitur. Sed consequat felis sed consequat dictum. Ut consectetur commodo nunc et fringilla. Nulla quam nibh, eleifend eget gravida nec, pellentesque eget leo. Phasellus viverra sapien risus, egestas congue ligula.', '1+1+1 = ?', '1', 5),
(6, 'Aliquam id tempus eros. Aliquam erat volutpat. Aenean rutrum suscipit elit, ac dignissim dolor rutrum quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eleifend mi non tellus vehicula luctus. Quisque interdum eros at posuere facilisis. Ut in tincidunt justo, eu gravida dolor. Integer lobortis tempor tempor. Maecenas scelerisque, ipsum in vulputate pulvinar, velit.', '1+1+1+1 = ?', '1', 5),
(7, 'Répondre a la question :', 'De quel couleur est le bleu', 'bleu', 6),
(8, 'Répondre a la question :', 'Que vaut 133 ?', '133', 6),
(9, 'Répondre a la question par oui ou bien non', 'Le coca a le gout du pepsi ?', 'non', 6),
(10, '2', '1', '3', 7),
(11, '5', '4', '6', 7),
(12, '8', '7', '9', 7);

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
(1, 'Yfci3YadQp.jpg', 1),
(2, 'n6TsvefckI.webp', 2),
(3, 'fXwtmcbVI7.jpg', 2),
(4, 'ErZV4nL7qj.jpg', 2),
(5, 'KViY4p2EEe.jpg', 3),
(6, 'szcLxT4hj5.webp', 3),
(7, 'LVcaoAc42G.jpg', 4),
(8, 'pHgxpLCGpr.webp', 5),
(9, 'ETdmh4aD9f.jpg', 5),
(10, 'a8nHfO0yPl.webp', 6),
(11, 'nbIvhKU8gc.webp', 6),
(16, 'aA2HsigjMY.', 11),
(17, 'zWII8CSSex.', 12);

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
(1, 'https://www.lipsum.com/feed/html', 1),
(2, 'https://www.lipsum.com/feed/html', 1),
(3, 'https://www.lipsum.com/feed/html', 1),
(4, 'https://www.lipsum.com/feed/html', 2),
(5, 'https://www.lipsum.com/feed/html', 2),
(6, 'https://www.lipsum.com/feed/html', 3),
(7, 'https://www.lipsum.com/feed/html', 4),
(8, 'https://www.lipsum.com/feed/html', 4),
(9, 'https://www.lipsum.com/feed/html', 6),
(10, 'https://www.lipsum.com/feed/html', 6),
(11, 'https://www.lipsum.com/feed/html', 6);

-- --------------------------------------------------------

--
-- Table structure for table `Statistiques`
--

CREATE TABLE `Statistiques` (
  `id_joueurStatistiques` int(11) NOT NULL,
  `id_circuitStatistiques` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Statistiques`
--

INSERT INTO `Statistiques` (`id_joueurStatistiques`, `id_circuitStatistiques`) VALUES
(1, 5),
(1, 6);

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
(4, 'Thème 1', 'Premier thème'),
(5, 'Thème 2', 'Deuxième thème'),
(6, 'Thème 3', 'Troisième thème');

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
  MODIFY `id_circuit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id_joueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Question`
--
ALTER TABLE `Question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Question_Image`
--
ALTER TABLE `Question_Image`
  MODIFY `id_questionimage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `Question_Lien`
--
ALTER TABLE `Question_Lien`
  MODIFY `id_questionlien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Theme`
--
ALTER TABLE `Theme`
  MODIFY `id_theme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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

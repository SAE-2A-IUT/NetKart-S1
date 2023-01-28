-- phpMyAdmin SQL Dump
-- version 5.1.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql-netkart.alwaysdata.net
-- Generation Time: Jan 24, 2023 at 02:04 PM
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
-- Database: `netkart_db_main`
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
(2, 'TIPO ARRETE', 30, 1, 1, 1),
(5, 'Circuit 2', 302, 1, 1, 1),
(29, 'Circuit 3', 302, 1, 1, 1),
(31, 'Circuit 5', 30, 3, 1, 1),
(54, 'TestCircuit', 98, 2, 1, 4),
(58, 'MARIO', 13, 2, 1, 1),
(59, 'Test Circuit', 70, 2, 1, 1);

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
(1, 'nomj1', 'prenomj1', 'joueur1', 'joueur1@gmail.com', 'motdepassejoueur1', '6969696969', 1),
(2, 'nomj2', 'prenomj2', 'joueur2', 'joueur2@gmail.com', 'motdepassejoueur1', '0', 0),
(3, 'test3', 'test3', 'j3', 'j3@gmail.com', 'test', '0', 0),
(12, 'UwU', 'pelote', 'pelote', 'alessio.pulit@gmail.com', '$2y$10$/z2H/HKDpGtwX4TW4f0.uuKrk6FfuNhWwvmze1ztO1d6nG72bMSpC', '2387698829', 1),
(13, 'UwU', 'Alessio', 'pelote_2', 'alessiop001@gmail.com', '$2y$10$I0BQRyfcgkruuQDttycl0enTe4BqDBBlkE/4qSASY0xWXMMrxv2dq', '4948622867', 1),
(14, 'Oui', 'Moi', 'aaaaaaaaaaa', 'aaaaaaaaaaa@tibo.fr', '$2y$10$dcNYbehhxCBs8q/7S2.yueRnek90bOjsfVQ1WlVzrrjTfJqPnumkW', '7527933402', 0),
(15, 'Non', 'Luke', 'wvzugcyzetw', 'lukegontier13@gmail.com', '$2y$10$swZzfXXzapGAwDmFFQc5f.cnErv.xJK2DL0SajEgnmCywH1OzeU5m', '1128033921', 1),
(17, 'Lahaie', 'Thibaut', 'Darkthibaut200903', 'thibautlahaie@gmail.com', '$2y$10$AxBhpEfB1K398HmQmlXQTOgSAe6s5gYPidBh35NClfiCf5ENGA.iK', '9570545777', 0);

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
(1, 'Aenean eu risus a justo iaculis auctor vel quis nisl. Nullam tristique molestie eros quis semper. Nunc mollis congue rutrum. Nulla erat augue, ullamcorper id facilisis nec, consectetur et lectus. Ut a vehicula neque. Curabitur vel lorem elit. Etiam lobortis condimentum purus, id luctus lorem tincidunt ac. Duis bibendum, elit eu tristique vulputate, mi ligula eleifend nulla, in lacinia quam mi ut ante.', '1) Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', '1', 2),
(4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In luctus euismod nisl, et maximus magna suscipit ac. Praesent laoreet leo at ligula congue egestas. Duis risus lacus, pellentesque eu egestas sed, interdum et turpis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut mattis enim magna, vitae luctus ex lacinia non. Sed suscipit bibendum augue, vel ultrices risus suscipit in. Phasellus id pellentesque urna. In fringilla dui eget orci scelerisque fringilla. Pellentesque pellentesque id mi ut mattis. Curabitur et gravida lacus. Sed nisi felis, congue vel euismod a, fermentum et velit. Donec placerat congue ante, a bibendum nisl vestibulum in.', '2) Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '2', 2),
(6, 'Consigne de la question 2', 'Question 2', '1', 5),
(33, 'Duis laoreet aliquam felis, in consectetur nisi pretium sit amet. Sed accumsan eros et elit vestibulum rhoncus. Vivamus ac aliquam nibh. Nullam volutpat augue a velit vehicula, id sagittis tortor porta. Donec vestibulum nibh ut consequat viverra. Donec vel elementum augue, at sagittis tortor. Vestibulum semper dui vel orci feugiat rutrum. Donec luctus libero vel dui viverra, a tristique nisl auctor.', '3) Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '3', 2),
(85, 'Consigne quesiton', 'Question1', 'ReponseQuestion1', 54),
(86, 'consigne question 2', 'Question2', 'ReponseQuestion2', 54),
(87, 'consigne 3', 'Question3', 'ReponseQuestion3', 54),
(97, 'zeicze coznec zejz ecjkze ', 'nczoencioznconzoenczcz', '1', 58),
(98, 'zejfnzjefnozeof onfozrfn iofiznofnz zoinfinzoin zoeinfoi nzoef oizoefoznoie oiznfeize in fe zinf ini ezofnoi neizfonzionf', 'nieznizenfzefnziefnizfnzefnuzefinzfunzuf', '2', 58),
(99, 'az dajzndoazndazoidaozidnoizndoiandoiaznd', 'nzoiandiznadiaunzudia', '3', 58),
(100, 'consigne 1', 'question 1', '1', 59),
(101, 'consigne 2', 'question 2', '2', 59),
(102, 'consigne 3', 'question 2', '3', 59),
(103, 'a', 'a', 'a', 2),
(104, 'aaaa', 'aaaa', 'sss', 2),
(105, 'frffcdf', 'j', 'fqdd', 2),
(106, 'a', 'a', 'a', 2),
(107, 'aaaaaaa', 'a', 'a', 2),
(108, 'aaa', 'aaaa', 'aaaaaaaa', 2);

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
(51, 'image1.png', 1),
(52, 'image2.png', 1),
(53, '22CVJCG4aw.png', 85),
(54, 'JTGVGB1jrK.png', 86),
(55, 'RTXoE5bpXn.png', 86),
(56, 'hHCcio7oIZ.png', 87),
(57, 'image3.png', 33),
(58, 'image4.png', 33),
(59, 'image5.png', 33),
(77, 'TzOCk1QLM7.jpg', 97),
(78, 'CKt36qSaj7.jpg', 98),
(79, 'pxQlNyoAcK.png', 98),
(81, 'b6NMPS0vE2.png', 103),
(82, 'ocl4qhmHWT.png', 104),
(83, 'AhSRHHKNOu.gif', 105),
(84, 'ubfeUYYSKD.png', 103),
(85, 'PTfQ0eN7XQ.', 103),
(86, 'uVbg9CtnqO.', 104);

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
(1, 'https://www.google.com/', 1),
(4, 'https://www.google.com/', 6),
(5, 'https://www.google.fr/', 6),
(96, 'Lien1-1', 85),
(97, 'Lien1-2', 85),
(98, 'Lien2-1', 86),
(99, 'Lien3-1', 87),
(100, 'Lien3-2', 87),
(101, 'Lien3-3', 87),
(102, 'https://google.fr', 97),
(103, 'https://ndaiundoiazndnazudaznodn.com', 97),
(104, 'uznaucizncazcoacnioazcazico', 97),
(105, 'veerveerv', 98),
(106, 'rrevreververv', 98),
(107, 'zndadizdiazndiaundi', 100),
(108, 'azdauzndiazndaidaizd', 100),
(109, 'azdjnazodnazd', 100),
(110, '1', 101),
(111, '2', 101),
(112, '1', 101);

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
(1, 31),
(1, 59),
(14, 29);

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
(1, 'Thème par défaut', 'Ceci est le thème par défaut, si un circuit n\'a pas de thème défini pour lui, il appartient à ce thème'),
(2, 'Theme 2', 'Ceci est la description du theme 2'),
(3, 'Theme 3', 'Ceci est la description du theme 3');

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
  MODIFY `id_circuit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `Circuit_Checkpoint`
--
ALTER TABLE `Circuit_Checkpoint`
  MODIFY `id_circuitcheckpoint` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Circuit_Image`
--
ALTER TABLE `Circuit_Image`
  MODIFY `id_circuitimage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Groupe`
--
ALTER TABLE `Groupe`
  MODIFY `id_groupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `Groupe_Joueur`
--
ALTER TABLE `Groupe_Joueur`
  MODIFY `id_groupejoueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Joueur`
--
ALTER TABLE `Joueur`
  MODIFY `id_joueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `Question`
--
ALTER TABLE `Question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `Question_Image`
--
ALTER TABLE `Question_Image`
  MODIFY `id_questionimage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `Question_Lien`
--
ALTER TABLE `Question_Lien`
  MODIFY `id_questionlien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `Theme`
--
ALTER TABLE `Theme`
  MODIFY `id_theme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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

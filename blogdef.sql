-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2020 at 01:06 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdef`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext DEFAULT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `title`, `content`, `creation_date`) VALUES
(49, 2, 'Questo è un titolo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisl mauris, mollis in tortor sit amet, fringilla pellentesque tellus. Duis pharetra ante metus, in faucibus neque iaculis vitae. Cras eget ex sem. Cras non tincidunt nisl, quis blandit lectus. Praesent mollis lacus elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla aliquam nulla non risus consequat gravida. Aliquam consectetur, nisi nec vehicula viverra, purus nunc tempus nisi, non tempus dolor tortor at nulla. Vestibulum sem nulla, dapibus eget varius id, accumsan sit amet ipsum.', '2020-01-07 23:54:53'),
(51, 2, 'Lorem Ipsum', 'Con il nome di Spedizione Donner (talvolta chiamata Spedizione Donner-Reed) ci si riferisce a un gruppo di pionieri statunitensi che nel corso della presidenza di James Knox Polk partì per la California, riunito in una colonna di carri. Costretti al ritardo da una serie di disavventure, i membri della spedizione dovettero trascorrere l\'inverno tra il 1846 e il 1847 accampati sulla Sierra Nevada. Alcuni emigranti ricorsero al cannibalismo per sopravvivere, nutrendosi dei morti per fame o malattie.', '2020-01-08 00:03:49'),
(52, 1, 'Estratto Wiki Random', 'Per poetica e pensiero di Alessandro Manzoni si intendono le convinzioni poetiche, stilistiche, linguistiche ed ideologiche che hanno delineato la parabola esistenziale e letteraria di Manzoni dagli esordi giacobini e neoclassici fino alla morte. Dopo l\'esperienza neoclassica, che vide il Manzoni impegnarsi in odi ed altra produzione poetica fino al 1810, da quell\'anno aderì al movimento romantico, diventandone uno degli esponenti di punta. Durante il cosiddetto Quindicennio creativo (1812-1827), Manzoni produsse opere letterarie, poetiche, teatrali e saggistiche che cambiarono nel profondo la genetica della letteratura italiana e la sua stessa lingua letteraria, imponendosi come pietra miliare nella storia della letteratura italiana. Tra il 1827 e la sua morte, avvenuta nel lontano 1873, Manzoni continuò la sua ricerca di archetipi estetici scrivendo saggi storico-letterari in contrapposizione con quelli giovanili e, in contemporanea, riflettendo sulla natura della lingua italiana \"viva\" nel contesto del nuovo Regno d\'Italia.', '2020-01-08 00:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`post_id`, `tag_id`) VALUES
(49, 83),
(49, 84),
(51, 87),
(51, 88),
(52, 89),
(52, 90);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`) VALUES
(83, 'Oh Tannenbaum'),
(84, 'Prova'),
(87, 'Wikipedia'),
(88, 'Donner'),
(89, 'Manzoni'),
(90, 'Wikipedia');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(64) NOT NULL,
  `lastName` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 'Daniele', 'Belfiore', 'danielebelfiore7@gmail.com', '$2y$10$E1bHgWPXv3tBX.OucQO4c.V3.RPJYgNycAX6ZpgFrT7xPN0V81gkq'),
(2, 'Pippo', 'Tonio', 'pippotonio@gmail.com', '$2y$10$VxP8C5hJw2V24AHG3Xg6Auc2EK41ZNTZES0ZMhvNHeTvSWlr0z8f2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`post_id`,`tag_id`),
  ADD KEY `fk_tag_id` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `fk_post_id` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

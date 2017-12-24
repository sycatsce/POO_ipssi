-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 24 déc. 2017 à 17:20
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ipssi`
--

-- --------------------------------------------------------

--
-- Structure de la table `attendee`
--

DROP TABLE IF EXISTS `attendee`;
CREATE TABLE IF NOT EXISTS `attendee` (
  `id_user` int(11) NOT NULL,
  `id_meetup` int(11) NOT NULL,
  KEY `fk_attendee_user` (`id_user`),
  KEY `fk_meetup_user` (`id_meetup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `attendee`
--

INSERT INTO `attendee` (`id_user`, `id_meetup`) VALUES
(3, 13),
(4, 13),
(5, 13),
(9, 13),
(10, 14),
(6, 14),
(7, 14),
(9, 14),
(5, 14),
(11, 12),
(7, 12),
(1, 11),
(2, 11),
(3, 15);

-- --------------------------------------------------------

--
-- Structure de la table `communities`
--

DROP TABLE IF EXISTS `communities`;
CREATE TABLE IF NOT EXISTS `communities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `community_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `communities`
--

INSERT INTO `communities` (`id`, `community_name`) VALUES
(1, 'PHP'),
(2, 'JAVA');

-- --------------------------------------------------------

--
-- Structure de la table `lecturers`
--

DROP TABLE IF EXISTS `lecturers`;
CREATE TABLE IF NOT EXISTS `lecturers` (
  `firstname` text NOT NULL,
  `lastname` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `meetup`
--

DROP TABLE IF EXISTS `meetup`;
CREATE TABLE IF NOT EXISTS `meetup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_begin` date NOT NULL,
  `date_end` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text CHARACTER SET utf8mb4 NOT NULL,
  `community_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `community_id` (`community_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `meetup`
--

INSERT INTO `meetup` (`id`, `date_begin`, `date_end`, `title`, `description`, `community_id`) VALUES
(11, '2017-12-01', '2017-12-02', 'Partage d\'expérience JAVA J2EE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquet at magna non fringilla. Morbi venenatis dapibus elit. Etiam id eros felis. Aenean eleifend risus ipsum, eget porta libero eleifend non. Vestibulum cursus ex ut magna euismod mattis. Nulla facilisi. Praesent fringilla gravida finibus.', 2),
(12, '2017-12-03', '2017-12-04', 'LaravelConf Taiwan 2017', 'Donec non augue eu lorem ullamcorper pharetra. Vivamus dictum consectetur odio, vel consectetur nulla condimentum a. Sed pharetra rutrum odio, eu iaculis magna dignissim at. Nunc hendrerit dolor rutrum, molestie nisl quis, imperdiet odio. Ut tellus justo, sagittis eu enim non, lacinia fermentum urna. Pellentesque consectetur diam id justo suscipit laoreet. Ut neque orci, sodales in venenatis sed, mattis ac dolor. Vivamus condimentum blandit dolor, vehicula rutrum sapien elementum ac. Phasellus non iaculis urna, vel ultricies sem. ', 1),
(13, '2017-12-18', '2017-12-19', 'Aliquam bibendum', 'Cras hendrerit ornare nisi nec congue. Pellentesque tempus ipsum eu nunc rhoncus mattis. Nunc et elementum nisi. In hac habitasse platea dictumst. Suspendisse feugiat mattis turpis, a ultricies felis venenatis sit amet. Nullam nec vehicula erat, ac porta nunc. Morbi fermentum turpis eget convallis porttitor. ', 2),
(14, '2018-01-16', '2018-01-17', 'Duis luctus ultricies ipsum', 'Nam in metus tincidunt, mollis odio sed, faucibus nisi. Donec quis interdum eros, vel bibendum felis. Mauris mollis lacus id mattis suscipit. Vivamus interdum mi a tristique feugiat. Maecenas non dui eu orci bibendum convallis.', 2),
(15, '2017-12-13', '2017-12-14', 'Random title', ' Nunc consequat enim eros, ac maximus odio cursus et. Proin accumsan vitae enim non euismod. Aenean tempus quis enim dignissim semper. Morbi mollis, purus ut euismod egestas, leo ligula tempus ante, sed molestie mauris eros nec nisl. ', 2);

-- --------------------------------------------------------

--
-- Structure de la table `organizer`
--

DROP TABLE IF EXISTS `organizer`;
CREATE TABLE IF NOT EXISTS `organizer` (
  `id_meetup` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  KEY `fk_organizer_meetup` (`id_meetup`),
  KEY `fk_organizer_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `organizer`
--

INSERT INTO `organizer` (`id_meetup`, `id_user`) VALUES
(13, 1),
(13, 2),
(14, 3),
(14, 4),
(12, 5),
(12, 6),
(11, 7),
(11, 8),
(11, 9),
(15, 10),
(15, 11);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`name`, `id`) VALUES
('Emmanuel', 1),
('Kevin', 2),
('Paul', 3),
('Jean', 4),
('Bertrand', 5),
('Leonard', 6),
('Jules', 7),
('Johnatan', 8),
('Frank', 9),
('Damien', 10),
('Bryan', 11);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `attendee`
--
ALTER TABLE `attendee`
  ADD CONSTRAINT `fk_attendee_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_meetup_user` FOREIGN KEY (`id_meetup`) REFERENCES `meetup` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `meetup`
--
ALTER TABLE `meetup`
  ADD CONSTRAINT `fk_meetup_commu` FOREIGN KEY (`community_id`) REFERENCES `communities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `organizer`
--
ALTER TABLE `organizer`
  ADD CONSTRAINT `fk_organizer_meetup` FOREIGN KEY (`id_meetup`) REFERENCES `meetup` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_organizer_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

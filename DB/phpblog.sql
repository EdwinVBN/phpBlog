-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                11.4.0-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Versie:              12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Databasestructuur van phpblog wordt geschreven
CREATE DATABASE IF NOT EXISTS `phpblog` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `phpblog`;

-- Structuur van  tabel phpblog.comments wordt geschreven
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `post_id` int(10) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_on` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Structuur van  tabel phpblog.posts wordt geschreven
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `created_on` timestamp NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NULL DEFAULT NULL,
  `deleted_on` timestamp NULL DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumpen data van tabel phpblog.posts: ~9 rows (ongeveer)
INSERT INTO `posts` (`id`, `title`, `description`, `content`, `created_on`, `updated_on`, `deleted_on`, `user_id`) VALUES
(11, 'Titel 1', 'Beschrijving 1', 'Inhoud 1', CURRENT_TIMESTAMP, NULL, NULL, 26),
(12, 'Titel 2', 'Beschrijving 2', 'Inhoud 2', CURRENT_TIMESTAMP, NULL, NULL, 26),
(13, 'Titel 3', 'Beschrijving 3', 'Inhoud 3', CURRENT_TIMESTAMP, NULL, NULL, 26),
(14, 'Titel 4', 'Beschrijving 4', 'Inhoud 4', CURRENT_TIMESTAMP, NULL, NULL, 26),
(15, 'Titel 5', 'Beschrijving 5', 'Inhoud 5', CURRENT_TIMESTAMP, NULL, NULL, 26),
(16, 'Titel 6', 'Beschrijving 6', 'Inhoud 6', CURRENT_TIMESTAMP, NULL, NULL, 26),
(17, 'Titel 7', 'Beschrijving 7', 'Inhoud 7', CURRENT_TIMESTAMP, NULL, NULL, 26),
(18, 'Titel 8', 'Beschrijving 8', 'Inhoud 8', CURRENT_TIMESTAMP, NULL, NULL, 26),
(19, 'Titel 9', 'Beschrijving 9', 'Inhoud 9', CURRENT_TIMESTAMP, NULL, NULL, 26),
(20, 'Titel 10', 'Beschrijving 10', 'Inhoud 10', CURRENT_TIMESTAMP, NULL, NULL, 26),
(21, 'Titel 11', 'Beschrijving 11', 'Inhoud 11', CURRENT_TIMESTAMP, NULL, NULL, 26),
(22, 'Titel 12', 'Beschrijving 12', 'Inhoud 12', CURRENT_TIMESTAMP, NULL, NULL, 26),
(23, 'Titel 13', 'Beschrijving 13', 'Inhoud 13', CURRENT_TIMESTAMP, NULL, NULL, 26),
(24, 'Titel 14', 'Beschrijving 14', 'Inhoud 14', CURRENT_TIMESTAMP, NULL, NULL, 26),
(25, 'Titel 15', 'Beschrijving 15', 'Inhoud 15', CURRENT_TIMESTAMP, NULL, NULL, 26),
(26, 'Titel 16', 'Beschrijving 16', 'Inhoud 16', CURRENT_TIMESTAMP, NULL, NULL, 26),
(27, 'Titel 17', 'Beschrijving 17', 'Inhoud 17', CURRENT_TIMESTAMP, NULL, NULL, 26),
(28, 'Titel 18', 'Beschrijving 18', 'Inhoud 18', CURRENT_TIMESTAMP, NULL, NULL, 26),
(29, 'Titel 19', 'Beschrijving 19', 'Inhoud 19', CURRENT_TIMESTAMP, NULL, NULL, 26),
(30, 'Titel 20', 'Beschrijving 20', 'Inhoud 20', CURRENT_TIMESTAMP, NULL, NULL, 26);

-- Structuur van  tabel phpblog.users wordt geschreven
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumpen data van tabel phpblog.users: ~2 rows (ongeveer)
INSERT INTO `users` (`id`, `username`, `password`, `rol`) VALUES
	(23, 'Edwin', '$2y$10$IOYTsIiBWVkbaC5POSZcie.7P7vPVRVNB3m6kQBOffBQW8FQr5DAC', 1),
	(26, 'edwinuser', '$2y$10$531RHwVavAgePms5JwnadeUrhtEd.sDbvKoD/p4vx1fYxEFwz345a', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

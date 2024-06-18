-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 18 jun 2024 om 19:12
-- Serverversie: 11.4.0-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpblog`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `post_id` int(10) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_on` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `created_on` timestamp NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NULL DEFAULT NULL,
  `deleted_on` timestamp NULL DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `content`, `created_on`, `updated_on`, `deleted_on`, `user_id`) VALUES
(11, 'Titel 1', 'Beschrijving 1', 'Inhoud 1', '2024-06-18 16:56:43', NULL, NULL, 26),
(12, 'Titel 2', 'Beschrijving 2', 'Inhoud 2', '2024-06-18 16:56:43', NULL, NULL, 26),
(13, 'Titel 3', 'Beschrijving 3', 'Inhoud 3', '2024-06-18 16:56:43', NULL, NULL, 26),
(14, 'Titel 4', 'Beschrijving 4', 'Inhoud 4', '2024-06-18 16:56:43', NULL, NULL, 26),
(15, 'Titel 5', 'Beschrijving 5', 'Inhoud 5', '2024-06-18 16:56:43', NULL, NULL, 26),
(16, 'Titel 6', 'Beschrijving 6', 'Inhoud 6', '2024-06-18 16:56:43', NULL, NULL, 26),
(17, 'Titel 7', 'Beschrijving 7', 'Inhoud 7', '2024-06-18 16:56:43', NULL, NULL, 26),
(18, 'Titel 8', 'Beschrijving 8', 'Inhoud 8', '2024-06-18 16:56:43', NULL, NULL, 26),
(19, 'Titel 9', 'Beschrijving 9', 'Inhoud 9', '2024-06-18 16:56:43', NULL, NULL, 26),
(20, 'Titel 10', 'Beschrijving 10', 'Inhoud 10', '2024-06-18 16:56:43', NULL, NULL, 26),
(21, 'Titel 11', 'Beschrijving 11', 'Inhoud 11', '2024-06-18 16:56:43', NULL, NULL, 26),
(22, 'Titel 12', 'Beschrijving 12', 'Inhoud 12', '2024-06-18 16:56:43', NULL, NULL, 26),
(23, 'Titel 13', 'Beschrijving 13', 'Inhoud 13', '2024-06-18 16:56:43', NULL, NULL, 26),
(24, 'Titel 14', 'Beschrijving 14', 'Inhoud 14', '2024-06-18 16:56:43', NULL, NULL, 26),
(25, 'Titel 15', 'Beschrijving 15', 'Inhoud 15', '2024-06-18 16:56:43', NULL, NULL, 26),
(26, 'Titel 16', 'Beschrijving 16', 'Inhoud 16', '2024-06-18 16:56:43', NULL, NULL, 26),
(27, 'Titel 17', 'Beschrijving 17', 'Inhoud 17', '2024-06-18 16:56:43', NULL, NULL, 26),
(28, 'Titel 18', 'Beschrijving 18', 'Inhoud 18', '2024-06-18 16:56:43', NULL, NULL, 26),
(29, 'Titel 19', 'Beschrijving 19', 'Inhoud 19', '2024-06-18 16:56:43', NULL, NULL, 26),
(30, 'Titel 20', 'Beschrijving 20', 'Inhoud 20', '2024-06-18 16:56:43', NULL, NULL, 26);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `rol`) VALUES
(23, 'Edwin', '$2y$10$IOYTsIiBWVkbaC5POSZcie.7P7vPVRVNB3m6kQBOffBQW8FQr5DAC', 1),
(26, 'edwinuser', '$2y$10$531RHwVavAgePms5JwnadeUrhtEd.sDbvKoD/p4vx1fYxEFwz345a', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexen voor tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Beperkingen voor tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

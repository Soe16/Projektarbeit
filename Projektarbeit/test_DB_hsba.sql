-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 16. Okt 2017 um 10:44
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `hsba`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bewertung`
--

CREATE TABLE `bewertung` (
  `id` int(11) NOT NULL,
  `star` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kommentar` varchar(500) NOT NULL,
  `seller` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `bewertung`
--

INSERT INTO `bewertung` (`id`, `star`, `user_id`, `kommentar`, `seller`) VALUES
(3, 4, 5, 'Sehr nett', 1),
(6, 5, 5, 'Hat alles super geklappt. DankeschÃ¶n!', 1),
(7, 1, 3, 'schlecht', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buecher`
--

CREATE TABLE `buecher` (
  `id` int(11) NOT NULL,
  `titel` varchar(260) NOT NULL,
  `autor` varchar(260) NOT NULL,
  `verlag` varchar(260) NOT NULL,
  `zustand` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `adresse` varchar(260) NOT NULL,
  `plz` varchar(10) NOT NULL,
  `ort` varchar(260) NOT NULL,
  `land` varchar(100) NOT NULL,
  `user_id` int(200) NOT NULL,
  `beschreibung` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL,
  `url` varchar(100) NOT NULL,
  `amazon` varchar(260) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `buecher`
--

INSERT INTO `buecher` (`id`, `titel`, `autor`, `verlag`, `zustand`, `price`, `adresse`, `plz`, `ort`, `land`, `user_id`, `beschreibung`, `status`, `url`, `amazon`) VALUES
(1, 'Game of Thrones', 'G.R.R. Martin', 'HBO', 'Gut', '10â‚¬', 'BenzstraÃŸe 2', '22177', 'Hamburg', 'Deutschland', 1, 'BLBlalsldkalkvkdsjgsdjfslkdlksfdsbÃ¶baÃ¶baÃ¶bÃ¶albalba', 'verkauft', '', ''),
(2, 'Buch mit Bild', 'Mo', 'Buch', 'Sehr gut', '50â‚¬', 'BenzstraÃŸe 2', '22177', 'Hamburg', 'Deutschland', 1, 'Text....', 'verkauft', '', ''),
(5, 'Wie werde ich intellent? (2017)', 'Hanz Peter', 'KGV', 'Sehr gut', '10', 'Alter Wall 38', '20457', 'Hamburg', 'Deutschland', 5, 'Warum ist die Schule so schwierig?!', 'angebot', '', ''),
(21, 'Marketing: Grundlagen - Strategien - Instrumente (2013)', 'Michael Bernecker', 'DIM', 'Sehr gut', '20â‚¬', 'PalmerstraÃŸe 13', '20535', 'Hamburg', 'Deutschland', 1, 'Kaum benutzt.', 'angebot', 'uploads/1_marketing_book.png', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `chat_user_id` int(11) DEFAULT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `chats`
--

INSERT INTO `chats` (`id`, `user_id`, `chat_user_id`, `message`, `created_at`) VALUES
(1, 1, 3, 'hallo du noob', '2017-09-17 13:00:48'),
(5, 5, 1, 'Jakob an test', '2017-10-12 19:04:51'),
(6, 1, 5, 'Jetzt mach schon.', '2017-10-12 19:58:35'),
(27, 1, 5, 'ja', '2017-10-15 09:44:49'),
(36, 1, 3, 'selber noob', '2017-10-16 08:18:05'),
(37, 6, 1, 'Hallo test', '2017-10-16 08:25:01');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `vorname` varchar(260) NOT NULL,
  `name` varchar(260) NOT NULL,
  `email` varchar(260) NOT NULL,
  `password` varchar(260) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `vorname`, `name`, `email`, `password`) VALUES
(1, 'test', 'test', 'test', '098f6bcd4621d373cade4e832627b4f6'),
(3, 'moritz', 'nachname', 'mo@test.com', '098f6bcd4621d373cade4e832627b4f6'),
(4, 'Neele', 'Bluhme', 'neele.bluhme@google,de', '598d4c200461b81522a3328565c25f7c'),
(5, 'Jakob', 'Seeber', 'j.seeber@hsba.com', '098f6bcd4621d373cade4e832627b4f6'),
(6, 'Sonja', 'Oppermann', 's.op@hsba.de', '098f6bcd4621d373cade4e832627b4f6');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bewertung`
--
ALTER TABLE `bewertung`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `buecher`
--
ALTER TABLE `buecher`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_user__fk` (`user_id`),
  ADD KEY `chats_user2__fk` (`chat_user_id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bewertung`
--
ALTER TABLE `bewertung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT für Tabelle `buecher`
--
ALTER TABLE `buecher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT für Tabelle `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_user2__fk` FOREIGN KEY (`chat_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `chats_user__fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

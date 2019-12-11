-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Dez 2019 um 20:25
-- Server-Version: 10.4.8-MariaDB
-- PHP-Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `laendlemobil`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buchungen`
--

CREATE TABLE `buchungen` (
  `fahrt_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `buchungen`
--

INSERT INTO `buchungen` (`fahrt_id`, `name`, `email`) VALUES
(2, 'Martin Mitfahrer', 'mitfahrer@beispiel.de'),
(4, 'Martin Mitfahrer', 'mitfahrer@beispiel.de');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `drives`
--

CREATE TABLE `drives` (
  `fahrt_id` int(11) NOT NULL,
  `vorname` text NOT NULL,
  `nachname` text NOT NULL,
  `email` text NOT NULL,
  `abfahrtsort` text NOT NULL,
  `ankunftsort` text NOT NULL,
  `datum` date NOT NULL,
  `abfahrtszeit` time NOT NULL,
  `ankunftszeit` time NOT NULL,
  `zeitraum` text NOT NULL,
  `freieSitzplaetze` int(11) NOT NULL,
  `preis` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `drives`
--

INSERT INTO `drives` (`fahrt_id`, `vorname`, `nachname`, `email`, `abfahrtsort`, `ankunftsort`, `datum`, `abfahrtszeit`, `ankunftszeit`, `zeitraum`, `freieSitzplaetze`, `preis`) VALUES
(1, 'Max', 'Mustermann', 'maxmustermann@beispiel.de', 'Sigmaringendorf', 'Mengen', '2019-12-15', '06:45:00', '07:05:00', 'vor 7 Uhr', 3, '2.50'),
(2, 'Marius', 'Muster', 'muster@beispiel.de', 'Sigmaringendorf', 'Mengen', '2019-12-15', '06:40:00', '07:00:00', 'vor 7 Uhr', 1, '3.00'),
(3, 'Mia', 'Musterle', 'm.musterle@beispiel.de', 'Scheer', 'Bingen', '2019-12-14', '15:00:00', '15:10:00', '15 bis 17 Uhr', 1, '2.20'),
(4, 'Marius', 'Muster', 'muster@beispiel.de', 'Mengen', 'Sigmaringendorf', '2019-12-15', '16:05:00', '16:25:00', '15 bis 17 Uhr', 2, '3.00'),
(5, 'Max', 'Mustermann', 'maxmustermann@beispiel.de', 'Mengen', 'Bad Saulgau', '2019-12-15', '17:15:00', '17:40:00', '17 bis 19 Uhr', 1, '4.00');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `drives`
--
ALTER TABLE `drives`
  ADD PRIMARY KEY (`fahrt_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `drives`
--
ALTER TABLE `drives`
  MODIFY `fahrt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

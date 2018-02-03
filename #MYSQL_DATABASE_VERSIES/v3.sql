-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 feb 2018 om 14:29
-- Serverversie: 10.1.26-MariaDB
-- PHP-versie: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `facturen`
--

CREATE TABLE `facturen` (
  `idfacturen` int(11) NOT NULL,
  `datum` date NOT NULL,
  `gebruikers_idgebruikers` int(11) NOT NULL,
  `functies_idfuncties` int(11) NOT NULL,
  `goedgekeurd?` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `facturen`
--

INSERT INTO `facturen` (`idfacturen`, `datum`, `gebruikers_idgebruikers`, `functies_idfuncties`, `goedgekeurd?`) VALUES
(1, '2018-02-03', 1, 1, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `facturen`
--
ALTER TABLE `facturen`
  ADD PRIMARY KEY (`idfacturen`),
  ADD KEY `fk_facturen_gebruikers1` (`gebruikers_idgebruikers`),
  ADD KEY `fk_facturen_functies1` (`functies_idfuncties`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `facturen`
--
ALTER TABLE `facturen`
  MODIFY `idfacturen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `facturen`
--
ALTER TABLE `facturen`
  ADD CONSTRAINT `fk_facturen_functies1` FOREIGN KEY (`functies_idfuncties`) REFERENCES `functies` (`idfuncties`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_facturen_gebruikers1` FOREIGN KEY (`gebruikers_idgebruikers`) REFERENCES `gebruikers` (`idgebruikers`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

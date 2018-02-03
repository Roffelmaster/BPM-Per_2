-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 feb 2018 om 14:05
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
-- Tabelstructuur voor tabel `bestelregel`
--

CREATE TABLE `bestelregel` (
  `idbestelregel` int(11) NOT NULL,
  `aantal` varchar(45) NOT NULL,
  `facturen_idfacturen` int(11) NOT NULL,
  `producten_idproducten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `bestelregel`
--

INSERT INTO `bestelregel` (`idbestelregel`, `aantal`, `facturen_idfacturen`, `producten_idproducten`) VALUES
(1, '20', 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `facturen`
--

CREATE TABLE `facturen` (
  `idfacturen` int(11) NOT NULL,
  `datum` date NOT NULL,
  `prijs` decimal(10,0) NOT NULL,
  `gebruikers_idgebruikers` int(11) NOT NULL,
  `functies_idfuncties` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `facturen`
--

INSERT INTO `facturen` (`idfacturen`, `datum`, `prijs`, `gebruikers_idgebruikers`, `functies_idfuncties`) VALUES
(1, '2018-02-03', '500', 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `functies`
--

CREATE TABLE `functies` (
  `idfuncties` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `functies`
--

INSERT INTO `functies` (`idfuncties`, `naam`) VALUES
(1, 'Employee'),
(2, 'Department manager'),
(3, 'Purchasing department'),
(4, 'Logistiek medewerker'),
(5, 'Medewerker financien');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `idgebruikers` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL,
  `wachtwoord` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `functies_idfuncties` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`idgebruikers`, `naam`, `wachtwoord`, `email`, `functies_idfuncties`) VALUES
(1, 'Erik Smith', 'test', 'erik@test.nl', 1),
(2, 'Allert Jonkman', 'test', 'allert@test.nl', 2),
(3, 'Mathijs Baas', 'test', 'mathijs@test.nl', 3),
(4, 'Ids Menssink', 'test', 'ids@test.nl', 4),
(5, 'Account 5', 'test', 'account5@test.nl', 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `leverancier`
--

CREATE TABLE `leverancier` (
  `idleverancier` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL,
  `adres` varchar(45) NOT NULL,
  `telefoonnummer` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `leverancier`
--

INSERT INTO `leverancier` (`idleverancier`, `naam`, `adres`, `telefoonnummer`) VALUES
(1, 'Smithcomputerdiensten', 'Oostwoldjerweg 7, 9628 TA Siddeburen', '0617656795'),
(2, 'MediaMarkt', 'Sontplein 2122, 9902 AA Groningen', '0505636363'),
(3, 'Coolblue', 'Damsterdiep 2201, 9902 AA Groningen', '0505474785');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `magazijn`
--

CREATE TABLE `magazijn` (
  `idmagazijn` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL,
  `hoeveelheid` varchar(45) NOT NULL,
  `producten_idproducten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `magazijn`
--

INSERT INTO `magazijn` (`idmagazijn`, `naam`, `hoeveelheid`, `producten_idproducten`) VALUES
(1, 'Corsair toetsenbord', '20', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

CREATE TABLE `producten` (
  `idproducten` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL,
  `omschrijving` longtext NOT NULL,
  `prijs` decimal(10,0) DEFAULT NULL,
  `leverancier_idleverancier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `producten` (`idproducten`, `naam`, `omschrijving`, `prijs`, `leverancier_idleverancier`) VALUES
(1, 'Corsair toetsenbord', 'QWERTY toetsenbord', '55', 1),
(2, 'Shark Force muis', 'Muis met DPI switch', '15', 2),
(3, 'Philips headset', 'Headset met microfoon. ', '22', 3);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestelregel`
--
ALTER TABLE `bestelregel`
  ADD PRIMARY KEY (`idbestelregel`),
  ADD KEY `fk_bestelregel_facturen1` (`facturen_idfacturen`),
  ADD KEY `fk_bestelregel_producten1` (`producten_idproducten`);

--
-- Indexen voor tabel `facturen`
--
ALTER TABLE `facturen`
  ADD PRIMARY KEY (`idfacturen`),
  ADD KEY `fk_facturen_gebruikers1` (`gebruikers_idgebruikers`),
  ADD KEY `fk_facturen_functies1` (`functies_idfuncties`);

--
-- Indexen voor tabel `functies`
--
ALTER TABLE `functies`
  ADD PRIMARY KEY (`idfuncties`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`idgebruikers`,`functies_idfuncties`),
  ADD KEY `fk_gebruikers_functies` (`functies_idfuncties`);

--
-- Indexen voor tabel `leverancier`
--
ALTER TABLE `leverancier`
  ADD PRIMARY KEY (`idleverancier`);

--
-- Indexen voor tabel `magazijn`
--
ALTER TABLE `magazijn`
  ADD PRIMARY KEY (`idmagazijn`,`producten_idproducten`),
  ADD KEY `fk_magazijn_producten1` (`producten_idproducten`);

--
-- Indexen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`idproducten`),
  ADD KEY `fk_producten_leverancier1` (`leverancier_idleverancier`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestelregel`
--
ALTER TABLE `bestelregel`
  MODIFY `idbestelregel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `facturen`
--
ALTER TABLE `facturen`
  MODIFY `idfacturen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `functies`
--
ALTER TABLE `functies`
  MODIFY `idfuncties` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `idgebruikers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `leverancier`
--
ALTER TABLE `leverancier`
  MODIFY `idleverancier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `magazijn`
--
ALTER TABLE `magazijn`
  MODIFY `idmagazijn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `producten`
--
ALTER TABLE `producten`
  MODIFY `idproducten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestelregel`
--
ALTER TABLE `bestelregel`
  ADD CONSTRAINT `fk_bestelregel_facturen1` FOREIGN KEY (`facturen_idfacturen`) REFERENCES `facturen` (`idfacturen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bestelregel_producten1` FOREIGN KEY (`producten_idproducten`) REFERENCES `producten` (`idproducten`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `facturen`
--
ALTER TABLE `facturen`
  ADD CONSTRAINT `fk_facturen_functies1` FOREIGN KEY (`functies_idfuncties`) REFERENCES `functies` (`idfuncties`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_facturen_gebruikers1` FOREIGN KEY (`gebruikers_idgebruikers`) REFERENCES `gebruikers` (`idgebruikers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD CONSTRAINT `fk_gebruikers_functies` FOREIGN KEY (`functies_idfuncties`) REFERENCES `functies` (`idfuncties`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `magazijn`
--
ALTER TABLE `magazijn`
  ADD CONSTRAINT `fk_magazijn_producten1` FOREIGN KEY (`producten_idproducten`) REFERENCES `producten` (`idproducten`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD CONSTRAINT `fk_producten_leverancier1` FOREIGN KEY (`leverancier_idleverancier`) REFERENCES `leverancier` (`idleverancier`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2018 at 10:41 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `met4code`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `KORISNIKID` int(11) NOT NULL,
  `ROLEID` int(11) DEFAULT NULL,
  `USERNAME` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `PASSWORD` varchar(512) COLLATE utf8mb4_bin DEFAULT NULL,
  `EMAIL` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`KORISNIKID`, `ROLEID`, `USERNAME`, `PASSWORD`, `EMAIL`) VALUES
(1, 1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@nesto.com'),
(2, 2, 'lekar', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@nesto.com'),
(3, 3, 'pacijent', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@nesto.com'),
(4, 2, 'lekar2', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@nesto.com'),
(5, 3, 'pacijent2', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@nesto.com'),
(6, 3, 'maki', '7288edd0fc3ffcbe93a0cf06e3568e28521687bc', 'tosicmarija10@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `lekarpacijent`
--

CREATE TABLE `lekarpacijent` (
  `LEKARPACIJENT` int(11) NOT NULL,
  `KORISNIKPACIJENTID` int(11) DEFAULT NULL,
  `TRAUMAID` int(11) DEFAULT NULL,
  `KORISNIKLEKARID` int(11) DEFAULT NULL,
  `ZAVRSENO` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `lekarpacijent`
--

INSERT INTO `lekarpacijent` (`LEKARPACIJENT`, `KORISNIKPACIJENTID`, `TRAUMAID`, `KORISNIKLEKARID`, `ZAVRSENO`) VALUES
(8, 3, 4, 2, 0),
(9, 5, 4, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `ROLEID` int(11) NOT NULL,
  `ROLENAZIV` varchar(1024) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`ROLEID`, `ROLENAZIV`) VALUES
(1, 'admin'),
(2, 'lekar'),
(3, 'pacijent');

-- --------------------------------------------------------

--
-- Table structure for table `terapija`
--

CREATE TABLE `terapija` (
  `TERAPIJAID` int(11) NOT NULL,
  `LEKARPACIJENT` int(11) DEFAULT NULL,
  `VEZBAID` int(11) DEFAULT NULL,
  `RADKOMENTAR` text COLLATE utf8mb4_bin,
  `TERAPIJADATUM` date DEFAULT NULL,
  `UPUTSTVO` text COLLATE utf8mb4_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `terapija`
--

INSERT INTO `terapija` (`TERAPIJAID`, `LEKARPACIJENT`, `VEZBAID`, `RADKOMENTAR`, `TERAPIJADATUM`, `UPUTSTVO`) VALUES
(7, 8, 5, '', '2018-11-11', '<p><img alt=\"\" src=\"https://orthoinfo.aaos.org/globalassets/figures/a00300f11.jpg\" style=\"height:100px; width:237px\" /></p>\r\n'),
(8, 9, 4, '', '2018-11-11', '<p><img alt=\"\" src=\"https://orthoinfo.aaos.org/globalassets/figures/a00300f12.jpg\" style=\"height:100px; width:192px\" /></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `trauma`
--

CREATE TABLE `trauma` (
  `TRAUMAID` int(11) NOT NULL,
  `TRAUMANAZIV` varchar(256) COLLATE utf8mb4_bin DEFAULT NULL,
  `TRAUMAOPIS` text COLLATE utf8mb4_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `trauma`
--

INSERT INTO `trauma` (`TRAUMAID`, `TRAUMANAZIV`, `TRAUMAOPIS`) VALUES
(4, 'Kidanje prednjih ukrstenih ligamenata', 'Često nastaje kod mehaničkih povreda usled fizičkog kontakta. Najčešće se dešava profesionalnim sportistima.'),
(5, 'Povreda meniskusa', 'Nastaje kao posledica prevelikog napora, predugačkih marševa, trčanja i slično');

-- --------------------------------------------------------

--
-- Table structure for table `vezba`
--

CREATE TABLE `vezba` (
  `VEZBAID` int(11) NOT NULL,
  `VEZBANAZIV` varchar(1024) COLLATE utf8mb4_bin DEFAULT NULL,
  `VEZBAOPIS` text COLLATE utf8mb4_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `vezba`
--

INSERT INTO `vezba` (`VEZBAID`, `VEZBANAZIV`, `VEZBAOPIS`) VALUES
(4, 'Bočni iskorak', '1.  Stanite bočno tako da Vam je povređena noga uz kutiju\r\n2. Povređenu nogu stavite na kutiju\r\n3. Lagano se uspravite omoću povređene noge'),
(5, 'Prednji iskorak', '1. Stanite ispred kutije\r\n2. Stavite povređenu nogu na kutiju \r\n3. Lagano se uspravite koristeći povređenu nogu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`KORISNIKID`),
  ADD KEY `FK_ROLE_KORISNIK` (`ROLEID`);

--
-- Indexes for table `lekarpacijent`
--
ALTER TABLE `lekarpacijent`
  ADD PRIMARY KEY (`LEKARPACIJENT`),
  ADD KEY `FK_LEKAR` (`KORISNIKLEKARID`),
  ADD KEY `FK_PACIJENT` (`KORISNIKPACIJENTID`),
  ADD KEY `FK_TRAUMA_PACIJENT` (`TRAUMAID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ROLEID`);

--
-- Indexes for table `terapija`
--
ALTER TABLE `terapija`
  ADD PRIMARY KEY (`TERAPIJAID`),
  ADD KEY `FK_RADI` (`LEKARPACIJENT`),
  ADD KEY `FK_RAD_VEZBA` (`VEZBAID`);

--
-- Indexes for table `trauma`
--
ALTER TABLE `trauma`
  ADD PRIMARY KEY (`TRAUMAID`);

--
-- Indexes for table `vezba`
--
ALTER TABLE `vezba`
  ADD PRIMARY KEY (`VEZBAID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `KORISNIKID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lekarpacijent`
--
ALTER TABLE `lekarpacijent`
  MODIFY `LEKARPACIJENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ROLEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `terapija`
--
ALTER TABLE `terapija`
  MODIFY `TERAPIJAID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trauma`
--
ALTER TABLE `trauma`
  MODIFY `TRAUMAID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vezba`
--
ALTER TABLE `vezba`
  MODIFY `VEZBAID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `FK_ROLE_KORISNIK` FOREIGN KEY (`ROLEID`) REFERENCES `role` (`ROLEID`);

--
-- Constraints for table `lekarpacijent`
--
ALTER TABLE `lekarpacijent`
  ADD CONSTRAINT `FK_LEKAR` FOREIGN KEY (`KORISNIKLEKARID`) REFERENCES `korisnik` (`KORISNIKID`),
  ADD CONSTRAINT `FK_PACIJENT` FOREIGN KEY (`KORISNIKPACIJENTID`) REFERENCES `korisnik` (`KORISNIKID`),
  ADD CONSTRAINT `FK_TRAUMA_PACIJENT` FOREIGN KEY (`TRAUMAID`) REFERENCES `trauma` (`TRAUMAID`);

--
-- Constraints for table `terapija`
--
ALTER TABLE `terapija`
  ADD CONSTRAINT `FK_RADI` FOREIGN KEY (`LEKARPACIJENT`) REFERENCES `lekarpacijent` (`LEKARPACIJENT`),
  ADD CONSTRAINT `FK_RAD_VEZBA` FOREIGN KEY (`VEZBAID`) REFERENCES `vezba` (`VEZBAID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

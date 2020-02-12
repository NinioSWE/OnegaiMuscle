-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1:3306
-- Tid vid skapande: 12 feb 2020 kl 02:13
-- Serverversion: 10.4.10-MariaDB
-- PHP-version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `onegaimuscle`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `times`
--

DROP TABLE IF EXISTS `times`;
CREATE TABLE IF NOT EXISTS `times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(32) NOT NULL,
  `runningTime` time(4) NOT NULL,
  `distance` float NOT NULL,
  `dateOfRun` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `times`
--

INSERT INTO `times` (`id`, `userID`, `runningTime`, `distance`, `dateOfRun`) VALUES
(3, 5, '00:15:00.0000', 2, '2020-02-12 01:15:04'),
(4, 5, '00:15:00.0000', 2.25, '2020-02-12 01:16:24');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `imageURL` varchar(248) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `imageURL`) VALUES
(5, 'Ninio', 'd8c0cd9473c044d4f4af8ee682ea0104', 'https://honeysanime.com/wp-content/uploads/2019/08/Dumbbell-Nan-Kilo-Moteru-Wallpaper.jpg'),
(8, 'Test1', '1d5196408a18b98d9d07e640cca2ad2d', 'https://vignette.wikia.nocookie.net/new-game/images/9/90/Surprised_Aoba.png/revision/latest?cb=20180623090424');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

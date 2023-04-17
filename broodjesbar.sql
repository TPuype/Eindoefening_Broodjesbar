-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 18, 2022 at 01:05 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `broodjesbar`
--

-- --------------------------------------------------------

--
-- Table structure for table `bestellingen`
--

CREATE TABLE `bestellingen` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `broodjeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bestellingen`
--

INSERT INTO `bestellingen` (`id`, `userID`, `broodjeID`) VALUES
(16, 1, 5),
(17, 1, 6),
(18, 1, 9),
(19, 1, 6),
(20, 2, 6),
(21, 2, 1),
(22, 2, 2),
(23, 1, 11),
(24, 1, 1),
(25, 1, 1),
(26, 1, 6),
(27, 1, 1),
(28, 1, 4),
(29, 1, 1),
(30, 1, 6),
(31, 1, 6),
(32, 1, 1),
(33, 1, 1),
(34, 5, 4),
(35, 5, 1),
(36, 5, 6),
(37, 5, 9),
(38, 6, 1),
(39, 6, 10),
(40, 6, 6),
(41, 6, 10),
(42, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `broodjes`
--

CREATE TABLE `broodjes` (
  `ID` int(11) NOT NULL,
  `Naam` varchar(50) NOT NULL,
  `Omschrijving` varchar(500) NOT NULL,
  `Prijs` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `broodjes`
--

INSERT INTO `broodjes` (`ID`, `Naam`, `Omschrijving`, `Prijs`) VALUES
(1, 'Kaas', 'Broodje met jonge kaas', '1.90'),
(2, 'Ham', 'Broodje met natuurham', '1.90'),
(3, 'Kaas en ham', 'Broodje met kaas en ham', '2.10'),
(4, 'Fitness kip', 'kip natuur, yoghurtdressing, perzik, tuinkers, tomaat en komkommer', '3.50'),
(5, 'Broodje Sombrero', 'kip natuur, andalousesaus, rode paprika, maïs, sla, komkommer, tomaat, ei en ui ', '3.70'),
(6, 'Broodje americain-tartaar', 'americain, tartaarsaus, ui, komkommer, ei en tuinkers ', '3.50'),
(7, 'Broodje Indian kip', 'kip natuur, ananas, tuinkers, komkommer en curry dressing', '4.00'),
(8, 'Grieks broodje', 'feta, tuinkers, komkommer, tomaat en olijventapenade', '3.90'),
(9, 'Tonijntino', 'tonijn pikant, ui, augurk, martinosaus en (tabasco)', '2.60'),
(10, 'Wrap exotisch', 'kip natuur, cocktailsaus, sla, tomaat, komkommer, ei en ananas', '3.70'),
(11, 'Wrap kip/spek', 'Kip natuur, spek, BBQ saus, sla, tomaat en komkommer', '4.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wachtwoord` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `naam`, `email`, `wachtwoord`) VALUES
(5, 'Thijs', 'thijs@mail.com', '$2y$10$5jlOE4ciphdrwnCr1ccUG.uHSoDvT8SckJJXalqpElNMi0O9SQRZ2'),
(6, 'Gebruiker2', 'gebruiker@mail.uk', '$2y$10$E1XjpbpWVKzjdAhDFBvEaOV.E2q0mRmQq23c0G29aCU6K72.K4su6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `broodjes`
--
ALTER TABLE `broodjes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bestellingen`
--
ALTER TABLE `bestellingen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `broodjes`
--
ALTER TABLE `broodjes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

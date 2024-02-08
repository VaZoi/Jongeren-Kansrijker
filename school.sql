-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 10, 2023 at 01:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `activiteiten`
--

CREATE TABLE `activiteiten` (
  `activiteitID` int(11) NOT NULL,
  `activiteitNaam` varchar(255) NOT NULL,
  `activiteitStartDatum` date NOT NULL,
  `activiteitEindDatum` date NOT NULL,
  `activiteitLocatie` varchar(255) DEFAULT NULL,
  `activiteitOmschrijving` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activiteiten`
--

INSERT INTO `activiteiten` (`activiteitID`, `activiteitNaam`, `activiteitStartDatum`, `activiteitEindDatum`, `activiteitLocatie`, `activiteitOmschrijving`) VALUES
(1, 'Bijles Rekenen', '2023-11-18', '2024-01-30', 'ROC van Amsterdam', 'Bijles rekenen voor eerste en tweede jaars studenten van de opleidingen van de ICT.'),
(5, 'Sport ', '2024-01-10', '2024-05-30', 'ROC van Amsterdam', 'Sportlessen');

-- --------------------------------------------------------

--
-- Table structure for table `activiteiten_jongeren`
--

CREATE TABLE `activiteiten_jongeren` (
  `id` int(11) NOT NULL,
  `jongereID` int(11) DEFAULT NULL,
  `activiteitID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activiteiten_jongeren`
--

INSERT INTO `activiteiten_jongeren` (`id`, `jongereID`, `activiteitID`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `instituten`
--

CREATE TABLE `instituten` (
  `instituutID` int(11) NOT NULL,
  `instituutNaam` varchar(255) NOT NULL,
  `instituutLocatie` varchar(255) DEFAULT NULL,
  `instituutOmschrijving` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instituten`
--

INSERT INTO `instituten` (`instituutID`, `instituutNaam`, `instituutLocatie`, `instituutOmschrijving`) VALUES
(1, 'ROC van Amsterdam', 'Freijenburg 214', 'MBO school in Amsterdam Zuid-Ost'),
(2, 'ROC van Noord', 'Noord', 'School voor MBO Studenten.');

-- --------------------------------------------------------

--
-- Table structure for table `jongeren`
--

CREATE TABLE `jongeren` (
  `jongereID` int(11) NOT NULL,
  `voornaam` varchar(50) NOT NULL,
  `achternaam` varchar(50) NOT NULL,
  `geboortedatum` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefoonnummer` varchar(20) DEFAULT NULL,
  `instituutID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jongeren`
--

INSERT INTO `jongeren` (`jongereID`, `voornaam`, `achternaam`, `geboortedatum`, `email`, `telefoonnummer`, `instituutID`) VALUES
(1, 'jj', 'ww', '2005-12-01', 'fywoiwo@gmail.com', '', 1),
(2, 'wf', 'wf', '2005-03-12', 'fywoiwo@gmail.com', '0612379551', 2),
(3, 'vz', 'fg', '2000-01-04', 'fywoiwo@gmail.com', '0612379551', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medewerkers`
--

CREATE TABLE `medewerkers` (
  `medewerkerID` int(11) NOT NULL,
  `voornaam` varchar(50) NOT NULL,
  `achternaam` varchar(50) NOT NULL,
  `functie` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medewerkers`
--

INSERT INTO `medewerkers` (`medewerkerID`, `voornaam`, `achternaam`, `functie`, `email`) VALUES
(1, 'Julie', 'Kraanen', 'Software developer', '123abc@gmail.com'),
(3, 'vz', 'fg', 'Software developer', 'ehgrhh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `userEmail`, `userPassword`) VALUES
(1, 'admin', '', '$2y$10$lgO61AcVNIm1rXZsfGR.4.EkKKZkTuHi.92b2OUZqp9OnkkmpmedO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activiteiten`
--
ALTER TABLE `activiteiten`
  ADD PRIMARY KEY (`activiteitID`);

--
-- Indexes for table `activiteiten_jongeren`
--
ALTER TABLE `activiteiten_jongeren`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jongereID` (`jongereID`),
  ADD KEY `activiteitID` (`activiteitID`);

--
-- Indexes for table `instituten`
--
ALTER TABLE `instituten`
  ADD PRIMARY KEY (`instituutID`);

--
-- Indexes for table `jongeren`
--
ALTER TABLE `jongeren`
  ADD PRIMARY KEY (`jongereID`),
  ADD KEY `instituutID` (`instituutID`);

--
-- Indexes for table `medewerkers`
--
ALTER TABLE `medewerkers`
  ADD PRIMARY KEY (`medewerkerID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `idx_username` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activiteiten`
--
ALTER TABLE `activiteiten`
  MODIFY `activiteitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `activiteiten_jongeren`
--
ALTER TABLE `activiteiten_jongeren`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `instituten`
--
ALTER TABLE `instituten`
  MODIFY `instituutID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jongeren`
--
ALTER TABLE `jongeren`
  MODIFY `jongereID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medewerkers`
--
ALTER TABLE `medewerkers`
  MODIFY `medewerkerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activiteiten_jongeren`
--
ALTER TABLE `activiteiten_jongeren`
  ADD CONSTRAINT `activiteiten_jongeren_ibfk_1` FOREIGN KEY (`jongereID`) REFERENCES `jongeren` (`jongereID`) ON DELETE CASCADE,
  ADD CONSTRAINT `activiteiten_jongeren_ibfk_2` FOREIGN KEY (`activiteitID`) REFERENCES `activiteiten` (`activiteitID`) ON DELETE CASCADE;

--
-- Constraints for table `jongeren`
--
ALTER TABLE `jongeren`
  ADD CONSTRAINT `jongeren_ibfk_1` FOREIGN KEY (`instituutID`) REFERENCES `instituten` (`instituutID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

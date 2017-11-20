-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Temps de generació: 20-11-2017 a les 20:16:03
-- Versió del servidor: 5.7.20-0ubuntu0.16.04.1
-- Versió de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `Proyecto_Vota`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `Admins`
--

CREATE TABLE `Admins` (
  `ID` int(3) NOT NULL,
  `Nom` varchar(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de la taula `Consulta`
--

CREATE TABLE `Consulta` (
  `ID` int(3) NOT NULL,
  `Tipo` int(11) NOT NULL,
  `Desc_Pregunta` varchar(150) NOT NULL,
  `ID_Usuario` int(3) NOT NULL,
  `ID_Usuario_Admin` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de la taula `Opciones`
--

CREATE TABLE `Opciones` (
  `ID` int(3) NOT NULL,
  `ID_Consulta` int(3) NOT NULL,
  `Desc_Text` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de la taula `Votantes`
--

CREATE TABLE `Votantes` (
  `ID` int(3) NOT NULL,
  `Nombre` int(15) NOT NULL,
  `Email` int(30) NOT NULL,
  `Password` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de la taula `Votos`
--

CREATE TABLE `Votos` (
  `ID` int(3) NOT NULL,
  `ID_Opcion` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexos per taules bolcades
--

--
-- Index de la taula `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`ID`);

--
-- Index de la taula `Consulta`
--
ALTER TABLE `Consulta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Usuario` (`ID_Usuario`),
  ADD KEY `ID_Usuario_Admin` (`ID_Usuario_Admin`),
  ADD KEY `ID_Usuario_Admin_2` (`ID_Usuario_Admin`);

--
-- Index de la taula `Opciones`
--
ALTER TABLE `Opciones`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Consulta` (`ID_Consulta`),
  ADD KEY `ID_Consulta_2` (`ID_Consulta`);

--
-- Index de la taula `Votantes`
--
ALTER TABLE `Votantes`
  ADD PRIMARY KEY (`ID`);

--
-- Index de la taula `Votos`
--
ALTER TABLE `Votos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Opcion` (`ID_Opcion`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `Admins`
--
ALTER TABLE `Admins`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la taula `Consulta`
--
ALTER TABLE `Consulta`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la taula `Opciones`
--
ALTER TABLE `Opciones`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la taula `Votantes`
--
ALTER TABLE `Votantes`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la taula `Votos`
--
ALTER TABLE `Votos`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;
--
-- Restriccions per taules bolcades
--

--
-- Restriccions per la taula `Admins`
--
ALTER TABLE `Admins`
  ADD CONSTRAINT `Admins_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Consulta` (`ID_Usuario_Admin`);

--
-- Restriccions per la taula `Consulta`
--
ALTER TABLE `Consulta`
  ADD CONSTRAINT `Consulta_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Opciones` (`ID_Consulta`);

--
-- Restriccions per la taula `Opciones`
--
ALTER TABLE `Opciones`
  ADD CONSTRAINT `Opciones_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Votos` (`ID_Opcion`);

--
-- Restriccions per la taula `Votantes`
--
ALTER TABLE `Votantes`
  ADD CONSTRAINT `Votantes_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Consulta` (`ID_Usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

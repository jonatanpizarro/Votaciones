-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-12-2017 a las 16:20:17
-- Versión del servidor: 5.7.20-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Proyecto_Vota`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Consulta`
--

CREATE TABLE `Consulta` (
  `ID` int(3) NOT NULL,
  `Desc_Pregunta` varchar(150) NOT NULL,
  `ID_Usuario` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Consulta`
--

INSERT INTO `Consulta` (`ID`, `Desc_Pregunta`, `ID_Usuario`) VALUES
(77, 'hola', 1),
(78, 'alo', 1),
(79, 'asd', 1),
(80, 'tfyfty', 1),
(81, 'colacao o nesquik', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Opciones`
--

CREATE TABLE `Opciones` (
  `ID` int(3) NOT NULL,
  `ID_Consulta` int(3) NOT NULL,
  `Desc_Text` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Opciones`
--

INSERT INTO `Opciones` (`ID`, `ID_Consulta`, `Desc_Text`) VALUES
(6, 77, 'adios'),
(7, 77, 'hola'),
(8, 78, 'asd'),
(9, 79, 'asd'),
(10, 79, 'dsa'),
(11, 80, 'asd'),
(12, 80, 'zfs'),
(13, 81, 'Nesquik'),
(14, 81, 'Colacao');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `ID` int(3) NOT NULL,
  `Nombre` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `Email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Password` varchar(8) CHARACTER SET latin1 NOT NULL,
  `Admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`ID`, `Nombre`, `Email`, `Password`, `Admin`) VALUES
(1, 'Admin1', 'Admin1@gmail.com', '12345678', 0),
(2, 'loco', 'mam', '123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Voto`
--

CREATE TABLE `Voto` (
  `ID` int(3) NOT NULL,
  `ID_Opcion` int(3) NOT NULL,
  `ID_Usuario` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Voto`
--

INSERT INTO `Voto` (`ID`, `ID_Opcion`, `ID_Usuario`) VALUES
(1, 6, 1),
(2, 13, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Consulta`
--
ALTER TABLE `Consulta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `Opciones`
--
ALTER TABLE `Opciones`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Consulta` (`ID_Consulta`),
  ADD KEY `ID_Consulta_2` (`ID_Consulta`),
  ADD KEY `ID_Consulta_3` (`ID_Consulta`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Voto`
--
ALTER TABLE `Voto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Opcion` (`ID_Opcion`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Consulta`
--
ALTER TABLE `Consulta`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT de la tabla `Opciones`
--
ALTER TABLE `Opciones`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `Voto`
--
ALTER TABLE `Voto`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Consulta`
--
ALTER TABLE `Consulta`
  ADD CONSTRAINT `Consulta_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `Usuarios` (`ID`);

--
-- Filtros para la tabla `Opciones`
--
ALTER TABLE `Opciones`
  ADD CONSTRAINT `Opciones_ibfk_1` FOREIGN KEY (`ID_Consulta`) REFERENCES `Consulta` (`ID`);

--
-- Filtros para la tabla `Voto`
--
ALTER TABLE `Voto`
  ADD CONSTRAINT `Voto_ibfk_1` FOREIGN KEY (`ID_Opcion`) REFERENCES `Opciones` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-04-2016 a las 07:19:36
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--
CREATE DATABASE IF NOT EXISTS `inventario` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `inventario`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hardware`
--

CREATE TABLE `hardware` (
  `id` int(11) NOT NULL,
  `nombre` varchar(512) NOT NULL,
  `caracteristicas` varchar(512) NOT NULL,
  `modelo` varchar(512) NOT NULL,
  `numero_serie` varchar(512) NOT NULL,
  `fecha_de_compra` date NOT NULL,
  `costo` float NOT NULL,
  `tipo` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hardware`
--

INSERT INTO `hardware` (`id`, `nombre`, `caracteristicas`, `modelo`, `numero_serie`, `fecha_de_compra`, `costo`, `tipo`) VALUES
(1, 'Computadora Dell Aspiron', 'Memoria RAM de 4GB y disco duro de 1TB', '54D4534F', '42346457565', '2016-04-06', 7500.5, 'computadora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software`
--

CREATE TABLE `software` (
  `id` int(11) NOT NULL,
  `nombre` varchar(512) NOT NULL,
  `version` varchar(512) NOT NULL,
  `marca` varchar(512) NOT NULL,
  `documento_de_amparo` varchar(512) NOT NULL,
  `numero_licencias` int(11) NOT NULL,
  `plataforma` varchar(512) NOT NULL,
  `clasificacion` varchar(512) NOT NULL,
  `observaciones` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `software`
--

INSERT INTO `software` (`id`, `nombre`, `version`, `marca`, `documento_de_amparo`, `numero_licencias`, `plataforma`, `clasificacion`, `observaciones`) VALUES
(1, 'Avast Antivirus', '1.2.3', 'Avast', 'Contrato', 20, 'Windows', 'Software de Antivirus', 'Este antivirus sera instalado en todas las maquinas para que esten limpias y seguras'),
(2, 'Microsoft Office', '11.3.4', 'Microsoft', 'Contrato', 20, 'Windows', 'Software de AplicaciÃƒÂ³n', 'Software de AplicaciÃ³n'),
(3, 'Adobe Reader', '12.78', 'Adobe', 'Contrato', 20, 'Windows', 'Software de Aplicaion', 'Software de AplicaciÃ³n'),
(5, 'Autocad', '33.4.4', 'Autocad', 'Licencia', 3, 'Windows', 'Software de aplicaciÃ³n', 'Software para dibujo por cumputadora'),
(6, 'Prueba', '1.2.3', 'Marca', 'Licencia', 1, 'Windows', 'Software de sistemas', 'Ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(512) NOT NULL,
  `email` varchar(512) NOT NULL,
  `password` varchar(512) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created`) VALUES
(1, 'ediel', 'ediel@gmail.com', 'ediel', '2016-04-02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hardware`
--
ALTER TABLE `hardware`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hardware`
--
ALTER TABLE `hardware`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `software`
--
ALTER TABLE `software`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

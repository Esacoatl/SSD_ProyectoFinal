-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2018 a las 13:19:33
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemadss`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data1`
--

CREATE TABLE `data1` (
  `PERIODO` int(11) DEFAULT NULL,
  `FRECUENCIA` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `data1`
--

INSERT INTO `data1` (`PERIODO`, `FRECUENCIA`) VALUES
(2008, '52.29'),
(2009, '54.80'),
(2010, '57.46'),
(2011, '59.82'),
(2012, '62.33'),
(2013, '64.76'),
(2014, '67.29'),
(2015, '70.10'),
(2016, '73.40'),
(2017, '80.04'),
(2018, '88.36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data2`
--

CREATE TABLE `data2` (
  `PERIODO` int(11) DEFAULT NULL,
  `FRECUENCIA` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

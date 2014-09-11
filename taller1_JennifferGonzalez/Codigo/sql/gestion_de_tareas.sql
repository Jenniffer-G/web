-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-09-2014 a las 09:07:32
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gestion_de_tareas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE IF NOT EXISTS `tareas` (
  `creacion` varchar(1200) COLLATE utf8_bin NOT NULL,
  `finalizacion` varchar(1200) COLLATE utf8_bin NOT NULL,
  `prioridad` varchar(1200) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(1200) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(1200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`creacion`, `finalizacion`, `prioridad`, `descripcion`, `usuario`) VALUES
('2014-09-25', '2014-09-16', 'media', 'wewweeeeee', 'chocolat'),
('2014-09-10', '2014-09-19', 'baja', 'wewweeeeee', 'chocolat'),
('2014-09-03', '2014-09-17', 'baja', 'wewweeeeee', 'candy'),
('2014-09-16', '2014-09-26', 'baja', 'wewweeeeee', 'chocolat'),
('2014-09-10', '2014-09-18', 'media', 'wewweeeeee', 'chocolat'),
('', '', '', '', ''),
('2014-09-10', '2014-09-12', 'alta', 'wewweeeeee', 'moon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `usuario`, `password`) VALUES
(1, 'luna', 'prueba'),
(2, 'chocolat', 'vainilla'),
(3, 'candy', 'sugar'),
(5, 'moon', 'sun');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

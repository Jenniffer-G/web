-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2014 a las 18:37:05
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mensajes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dislike`
--

CREATE TABLE IF NOT EXISTS `dislike` (
  `Id` int(10) NOT NULL,
  `Id_post` int(10) NOT NULL,
`numDislike` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `dislike`
--

INSERT INTO `dislike` (`Id`, `Id_post`, `numDislike`) VALUES
(1, 1, 1),
(3, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE IF NOT EXISTS `favoritos` (
  `Id_usuario` int(10) NOT NULL,
  `Id_post` int(10) NOT NULL,
`Id_favorito` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`Id_usuario`, `Id_post`, `Id_favorito`) VALUES
(1, 2, 1),
(4, 1, 2),
(4, 2, 3),
(3, 3, 10),
(3, 1, 11),
(3, 2, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(10) NOT NULL,
  `id_post` int(10) NOT NULL,
`numeroLikes` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id`, `id_post`, `numeroLikes`) VALUES
(1, 1, 1),
(1, 1, 2),
(2, 2, 3),
(3, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`Id_mensaje` int(11) NOT NULL,
  `Id_usuario` int(255) NOT NULL,
  `Titulo` text COLLATE utf8_bin,
  `Post` text COLLATE utf8_bin
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`Id_mensaje`, `Id_usuario`, `Titulo`, `Post`) VALUES
(1, 1, 'MOTHERFUCKING', 'Well, the way they make shows is, they make one show. That show''s called a pilot. Then they show that show to the people who make shows, and on the strength of that one show they decide if they''re going to make more shows.'),
(2, 2, 'PLACEHOLDER ', 'The path of the righteous man is beset on all sides by the iniquities of the selfish and the tyranny of evil men. Blessed is he who, in the name of charity and good will, shepherds the weak through the valley of darkness, for he is truly his brother''s keeper and the finder of lost children.'),
(3, 4, 'My money', 'My moneys in that office, right? If she start giving me some bullshit about it aint there, and we got to go someplace else and get it, Im gonna shoot you in the head then and there. Then Im gonna shoot that bitch in the kneecaps, find out where my goddamn money is. She gonna tell me too. Hey, look at me when Im talking to you, motherfucker.'),
(4, 4, 'You listen', 'You listen: we go in there, and that nigga Winston or anybody else is in there, you the first motherfucker to get shot. You understand?'),
(5, 3, 'Blank expression', 'Do you see any Teletubbies in here? Do you see a slender plastic tag clipped to my shirt with my name printed on it? Do you see a little Asian child with a blank expression on his face sitting outside on a mechanical helicopter that shakes when you put quarters in it?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`Id` int(12) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(10) COLLATE utf8_bin NOT NULL,
  `URL` text COLLATE utf8_bin
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Nombre`, `password`, `URL`) VALUES
(1, 'wolf', 'moon', 'css/imagenes/foto.png'),
(2, 'chocolat', 'vanila', 'css/imagenes/foto.png'),
(3, 'tormenta', 'storm', 'css/imagenes/foto.png'),
(4, 'neko', 'gato', 'css/imagenes/foto.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dislike`
--
ALTER TABLE `dislike`
 ADD PRIMARY KEY (`numDislike`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
 ADD PRIMARY KEY (`Id_favorito`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
 ADD PRIMARY KEY (`numeroLikes`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`Id_mensaje`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dislike`
--
ALTER TABLE `dislike`
MODIFY `numDislike` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
MODIFY `Id_favorito` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
MODIFY `numeroLikes` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
MODIFY `Id_mensaje` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `Id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-01-2022 a las 10:39:27
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `jose`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alertas`
--

CREATE TABLE IF NOT EXISTS `alertas` (
  `id_alertas` int(11) NOT NULL AUTO_INCREMENT,
  `id_registro` int(11) NOT NULL,
  `alerta` int(11) NOT NULL,
  PRIMARY KEY (`id_alertas`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `alertas`
--

INSERT INTO `alertas` (`id_alertas`, `id_registro`, `alerta`) VALUES
(1, 1, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cv`
--

CREATE TABLE IF NOT EXISTS `cv` (
  `id_cv` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `cv` text NOT NULL,
  PRIMARY KEY (`id_cv`),
  UNIQUE KEY `id_empleado` (`id_empleado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `id_registro` int(11) NOT NULL,
  `ci` int(8) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `estado_civil` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `telefono` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `id_registro`, `ci`, `nombre`, `apellido`, `fecha_nacimiento`, `estado_civil`, `fecha_ingreso`, `telefono`, `correo`, `direccion`, `fecha_registro`, `status`) VALUES
(3, 1, 20247861, 'Yorman', 'Pinto', '1991-11-24', 'Casado(a)', '2021-11-24', '04243263753', 'yormanpinto2011@gmail.com', 'SJM', '2021-11-24', 1),
(4, 1, 28575008, 'Jose ', 'Lomelly', '2002-09-18', 'Soltero(a)', '2020-01-02', '041278243', 'joselomelly@gmail.com', 'Villa de cura', '2021-12-02', 0),
(5, 1, 8784027, 'Arelis', 'Requena', '1980-02-12', 'Casado(a)', '2019-12-12', '04243263753', 'arelis@gmail.com', 'San Juan De Los Morros Estado Guarico', '2022-01-17', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE IF NOT EXISTS `familia` (
  `id_familia` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `dni` varchar(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `parentesco` varchar(100) NOT NULL,
  PRIMARY KEY (`id_familia`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `familia`
--

INSERT INTO `familia` (`id_familia`, `id_empleado`, `dni`, `nombre`, `apellido`, `fecha_nacimiento`, `parentesco`) VALUES
(7, 1, '20202020', 'Jhonier ', 'Garcia', '2021-11-11', 'Hijo(a)'),
(8, 1, '20202021', 'Jhonier ', 'Garcia', '2021-11-23', 'Hijo(a)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto_usuario`
--

CREATE TABLE IF NOT EXISTS `foto_usuario` (
  `id_foto_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_foto_usuario`),
  UNIQUE KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `foto_usuario`
--

INSERT INTO `foto_usuario` (`id_foto_usuario`, `id_usuario`, `foto`) VALUES
(7, 1, 'usuario.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `id_pagos` int(11) NOT NULL AUTO_INCREMENT,
  `id_registro` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `monto` varchar(11) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id_pagos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulados`
--

CREATE TABLE IF NOT EXISTS `postulados` (
  `id_postulados` int(11) NOT NULL AUTO_INCREMENT,
  `ci` varchar(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `ape` varchar(255) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `correo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_postulados`),
  UNIQUE KEY `ci` (`ci`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sueldo`
--

CREATE TABLE IF NOT EXISTS `sueldo` (
  `id_sueldo` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `sueldo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_sueldo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `sueldo`
--

INSERT INTO `sueldo` (`id_sueldo`, `id_empleado`, `sueldo`) VALUES
(1, 1, '2000'),
(2, 2, '1500'),
(3, 3, '20'),
(4, 4, '15$'),
(5, 5, '100');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `usuario` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(1) NOT NULL,
  `estatus` int(1) NOT NULL,
  `fecha_reg_user` date NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario` (`usuario`),
  UNIQUE KEY `id_empleado` (`id_empleado`),
  UNIQUE KEY `id_empleado_2` (`id_empleado`),
  UNIQUE KEY `id_empleado_3` (`id_empleado`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_empleado`, `usuario`, `pass`, `tipo`, `estatus`, `fecha_reg_user`) VALUES
(1, 1, 'admin@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 1, 1, '2021-09-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacante`
--

CREATE TABLE IF NOT EXISTS `vacante` (
  `id_vacante` int(11) NOT NULL AUTO_INCREMENT,
  `id_registro` int(11) NOT NULL,
  `vacante` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `hora` varchar(10) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_vacante`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `vacante`
--

INSERT INTO `vacante` (`id_vacante`, `id_registro`, `vacante`, `descripcion`, `hora`, `fecha_publicacion`, `status`) VALUES
(1, 1, 'Contratista', 'Contratista\r\n', '19:42:17', '2021-12-02', 0),
(2, 1, 'Desarrollador Web', 'Conocimientos En Php, Html, Bootstrap, Ajax, Javascript', '20:12:02', '2022-01-17', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

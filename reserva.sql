-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2016 a las 04:39:20
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `reserva`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aeropuerto`
--

CREATE TABLE IF NOT EXISTS `aeropuerto` (
  `aer_id` int(11) NOT NULL AUTO_INCREMENT,
  `aer_nombre` varchar(100) NOT NULL,
  `aer_ciudad` varchar(45) NOT NULL,
  `aer_estadoLog` varchar(1) NOT NULL,
  PRIMARY KEY (`aer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `aeropuerto`
--

INSERT INTO `aeropuerto` (`aer_id`, `aer_nombre`, `aer_ciudad`, `aer_estadoLog`) VALUES
(1, 'dfdff', 'yyyyy', 'T');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiento`
--

CREATE TABLE IF NOT EXISTS `asiento` (
  `asi_id` int(11) NOT NULL AUTO_INCREMENT,
  `asi_numero` varchar(5) NOT NULL,
  `asi_estado` tinyint(1) NOT NULL,
  `asi_nombreViajero` varchar(45) NOT NULL,
  `asi_pasaporteViajero` varchar(20) NOT NULL,
  `asi_estadoLog` varchar(1) NOT NULL,
  `res_id` int(11) NOT NULL,
  `avi_id` int(11) NOT NULL,
  PRIMARY KEY (`asi_id`,`res_id`,`avi_id`),
  KEY `fk_Asiento_Reserva1` (`res_id`),
  KEY `fk_Asiento_Avion1_idx` (`avi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avion`
--

CREATE TABLE IF NOT EXISTS `avion` (
  `avi_id` int(11) NOT NULL AUTO_INCREMENT,
  `avi_asientos` varchar(5) NOT NULL,
  `avi_aerolinea` varchar(45) NOT NULL,
  `avi_estadoLog` varchar(1) NOT NULL,
  `aer_id` int(11) NOT NULL,
  PRIMARY KEY (`avi_id`),
  KEY `fk_Avion_Aeropuerto1_idx` (`aer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE IF NOT EXISTS `clase` (
  `cla_id` int(11) NOT NULL,
  `cla_tipo` varchar(15) NOT NULL,
  `cla_asientoInicio` varchar(5) NOT NULL,
  `cla_asientoFin` varchar(5) NOT NULL,
  `cla_costo` double NOT NULL,
  `cla_estadoLog` varchar(1) DEFAULT NULL,
  `avi_id` int(11) NOT NULL,
  PRIMARY KEY (`cla_id`,`avi_id`),
  KEY `fk_Clase_Avion1_idx` (`avi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `cli_id` varchar(15) NOT NULL,
  `cli_nombre` varchar(45) NOT NULL,
  `cli_apellido` varchar(45) NOT NULL,
  `cli_direccion` varchar(100) NOT NULL,
  `cli_telefono` varchar(15) NOT NULL,
  `cli_correo` varchar(75) NOT NULL,
  `cli_tipoCliente` varchar(45) NOT NULL,
  `cli_contrasena` varchar(45) NOT NULL,
  PRIMARY KEY (`cli_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escala`
--

CREATE TABLE IF NOT EXISTS `escala` (
  `esc_id` int(11) NOT NULL AUTO_INCREMENT,
  `esc_lugar` varchar(100) NOT NULL,
  `esc_costo` float NOT NULL,
  `esc_fechaELlegada` date NOT NULL,
  `esc_fechaESalida` date NOT NULL,
  `esc_horaELlegada` time NOT NULL,
  `esc_horaESalida` time NOT NULL,
  `esc_estadoLog` varchar(1) NOT NULL,
  `aer_id` int(11) NOT NULL,
  `vue_id` int(11) NOT NULL,
  PRIMARY KEY (`esc_id`,`aer_id`,`vue_id`),
  KEY `fk_Escala_Aeropuerto` (`aer_id`),
  KEY `fk_Escala_Vuelo1_idx` (`vue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `res_id` int(11) NOT NULL AUTO_INCREMENT,
  `res_codigo` varchar(15) DEFAULT NULL,
  `res_origen` varchar(100) NOT NULL,
  `res_destino` varchar(100) NOT NULL,
  `res_precioTotal` double NOT NULL,
  `res_Pago` tinyint(1) NOT NULL,
  `res_estadoLog` varchar(1) NOT NULL,
  `vue_id` int(11) NOT NULL,
  `cli_id` varchar(15) NOT NULL,
  PRIMARY KEY (`res_id`),
  KEY `fk_Reserva_Vuelo1_idx` (`vue_id`),
  KEY `fk_Reserva_Cliente1_idx` (`cli_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE IF NOT EXISTS `ruta` (
  `rut_id` int(11) NOT NULL AUTO_INCREMENT,
  `rut_estadoLog` varchar(1) NOT NULL,
  `aer_id_origen` int(11) NOT NULL,
  `aer_id_destino` int(11) NOT NULL,
  PRIMARY KEY (`rut_id`),
  KEY `fk_Ruta_Aeropuerto1_idx` (`aer_id_origen`),
  KEY `fk_Ruta_Aeropuerto2_idx` (`aer_id_destino`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelo`
--

CREATE TABLE IF NOT EXISTS `vuelo` (
  `vue_id` int(11) NOT NULL AUTO_INCREMENT,
  `vue_fechaVLlegada` date NOT NULL,
  `vue_fechaVSalida` date NOT NULL,
  `vue_horaVLlegada` time NOT NULL,
  `vue_horaVSalida` time NOT NULL,
  `vue_tipo` varchar(10) NOT NULL,
  `vue_visa` tinyint(1) NOT NULL,
  `vue_estadoLog` varchar(1) NOT NULL,
  `rut_id` int(11) NOT NULL,
  `avi_id` int(11) NOT NULL,
  PRIMARY KEY (`vue_id`),
  KEY `fk_Vuelo_Ruta1_idx` (`rut_id`),
  KEY `fk_Vuelo_Avion1_idx` (`avi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD CONSTRAINT `fk_Asiento_Reserva1` FOREIGN KEY (`res_id`) REFERENCES `reserva` (`res_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Asiento_Avion1` FOREIGN KEY (`avi_id`) REFERENCES `avion` (`avi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `avion`
--
ALTER TABLE `avion`
  ADD CONSTRAINT `fk_Avion_Aeropuerto1` FOREIGN KEY (`aer_id`) REFERENCES `aeropuerto` (`aer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clase`
--
ALTER TABLE `clase`
  ADD CONSTRAINT `fk_Clase_Avion1` FOREIGN KEY (`avi_id`) REFERENCES `avion` (`avi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `escala`
--
ALTER TABLE `escala`
  ADD CONSTRAINT `fk_Escala_Aeropuerto` FOREIGN KEY (`aer_id`) REFERENCES `aeropuerto` (`aer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Escala_Vuelo1` FOREIGN KEY (`vue_id`) REFERENCES `vuelo` (`vue_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_Reserva_Vuelo1` FOREIGN KEY (`vue_id`) REFERENCES `vuelo` (`vue_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reserva_Cliente1` FOREIGN KEY (`cli_id`) REFERENCES `cliente` (`cli_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD CONSTRAINT `fk_Ruta_Aeropuerto1` FOREIGN KEY (`aer_id_origen`) REFERENCES `aeropuerto` (`aer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ruta_Aeropuerto2` FOREIGN KEY (`aer_id_destino`) REFERENCES `aeropuerto` (`aer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD CONSTRAINT `fk_Vuelo_Ruta1` FOREIGN KEY (`rut_id`) REFERENCES `ruta` (`rut_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Vuelo_Avion1` FOREIGN KEY (`avi_id`) REFERENCES `avion` (`avi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

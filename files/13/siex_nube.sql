-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 17-07-2017 a las 06:06:48
-- Versión del servidor: 5.6.35-cll-lve
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `siex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE IF NOT EXISTS `documento` (
  `id_documento` int(11) NOT NULL AUTO_INCREMENT,
  `nom_documento` varchar(120) NOT NULL,
  `ff_file` date NOT NULL,
  `ff_load` date NOT NULL,
  `ruta` varchar(200) DEFAULT NULL,
  `id_proceso` int(11) NOT NULL,
  PRIMARY KEY (`id_documento`,`id_proceso`),
  KEY `fk_documento_proceso1_idx` (`id_proceso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`id_documento`, `nom_documento`, `ff_file`, `ff_load`, `ruta`, `id_proceso`) VALUES
(1, 'oficio persuasivo abril 11 de 2012', '2016-02-25', '2017-05-25', '1/oficio-persuasivo-2012.pdf', 1),
(7, 'EXPEDIENTE 740', '1985-02-19', '0000-00-00', '2/EXPEDIENTE 740.pdf', 2),
(9, 'EXPEDIENTE 742 T', '1987-09-15', '2017-05-30', '3/EXPEDIENTE 742 T.pdf', 3),
(10, 'EXPEDIENTE 987', '1993-05-15', '2017-05-30', '4/EXPEDIENTE 987.pdf', 4),
(13, 'auto solicitud de  Certificado registro', '1987-09-15', '2017-06-05', '5/auto solicitud de  Certificado registro.pdf', 5),
(14, 'Emplazamiento', '1987-09-15', '2017-06-05', '5/Emplazamiento.pdf', 5),
(15, 'Liquidaciones predios', '1993-05-15', '2017-06-05', '5/Liquidaciones predios.pdf', 5),
(16, 'Resolucion de aforo 295 de 24 julio de 2012', '2012-07-24', '2017-06-05', '5/Resolucion de aforo 295 de 24 julio de 2012.pdf', 5),
(17, 'EXPEDIENTE 740', '1985-02-19', '0000-00-00', '6/EXPEDIENTE 740.pdf', 6),
(18, 'EXPEDIENTE 742 T', '1987-09-15', '2017-05-30', '7/EXPEDIENTE 742 T.pdf', 7),
(19, 'EXPEDIENTE 987', '1993-05-15', '2017-05-30', '8/EXPEDIENTE 987.pdf', 8),
(20, 'oficio persuasivo abril 11 de 2012', '2016-02-25', '2017-05-25', '9/oficio-persuasivo-2012.pdf', 9),
(21, 'auto solicitud de  Certificado registro', '1987-09-15', '2017-06-05', '9/auto solicitud de  Certificado registro.pdf', 9),
(22, 'Emplazamiento', '1987-09-15', '2017-06-05', '9/Emplazamiento.pdf', 9),
(23, 'Liquidaciones predios', '1993-05-15', '2017-06-05', '9/Liquidaciones predios.pdf', 9),
(24, 'Resolucion de aforo 295 de 24 julio de 2012', '2012-07-24', '2017-06-05', '9/Resolucion de aforo 295 de 24 julio de 2012.pdf', 9),
(25, 'EXPEDIENTE 740', '1985-02-19', '0000-00-00', '10/EXPEDIENTE 740.pdf', 10),
(26, 'EXPEDIENTE 742 T', '1987-09-15', '2017-05-30', '11/EXPEDIENTE 742 T.pdf', 11),
(27, 'EXPEDIENTE 987', '1993-05-15', '2017-05-30', '12/EXPEDIENTE 987.pdf', 12),
(28, 'oficio persuasivo abril 11 de 2012', '2016-02-25', '2017-05-25', '13/oficio-persuasivo-2012.pdf', 13),
(29, 'auto solicitud de  Certificado registro', '1987-09-15', '2017-06-05', '13/auto solicitud de  Certificado registro.pdf', 13),
(30, 'Emplazamiento', '1987-09-15', '2017-06-05', '13/Emplazamiento.pdf', 13),
(31, 'Liquidaciones predios', '1993-05-15', '2017-06-05', '13/Liquidaciones predios.pdf', 13),
(32, 'Resolucion de aforo 295 de 24 julio de 2012', '2012-07-24', '2017-06-05', '13/Resolucion de aforo 295 de 24 julio de 2012.pdf', 13),
(33, 'EXPEDIENTE 740', '1985-02-19', '0000-00-00', '14/EXPEDIENTE 740.pdf', 14),
(34, 'EXPEDIENTE 742 T', '1987-09-15', '2017-05-30', '15/EXPEDIENTE 742 T.pdf', 15),
(35, 'EXPEDIENTE 987', '1993-05-15', '2017-05-30', '16/EXPEDIENTE 987.pdf', 16),
(36, 'auto solicitud de  Certificado registro', '1987-09-15', '2017-06-05', '1/auto solicitud de  Certificado registro.pdf', 1),
(37, 'Emplazamiento', '1987-09-15', '2017-06-05', '1/Emplazamiento.pdf', 1),
(38, 'Liquidaciones predios', '1993-05-15', '2017-06-05', '1/Liquidaciones predios.pdf', 1),
(39, 'Resolucion de aforo 295 de 24 julio de 2012', '2012-07-24', '2017-06-05', '1/Resolucion de aforo 295 de 24 julio de 2012.pdf', 1),
(40, 'peticion demo', '2017-07-10', '2017-07-10', '1/contrato 296-2017 oscar amortegui-sistemas.pdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE IF NOT EXISTS `proceso` (
  `id_proceso` int(11) NOT NULL AUTO_INCREMENT,
  `ciudad` varchar(120) DEFAULT NULL,
  `nom_empresa` varchar(120) DEFAULT NULL,
  `num_proceso` varchar(30) DEFAULT NULL,
  `demandante` varchar(120) DEFAULT NULL,
  `cc_demandante` varchar(30) DEFAULT NULL,
  `demandado` varchar(120) DEFAULT NULL,
  `cc_demandado` varchar(30) DEFAULT NULL,
  `valor` int(10) DEFAULT NULL,
  `id_tipo_proceso` int(11) NOT NULL,
  PRIMARY KEY (`id_proceso`,`id_tipo_proceso`),
  KEY `fk_proceso_tipo_proceso_idx` (`id_tipo_proceso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `proceso`
--

INSERT INTO `proceso` (`id_proceso`, `ciudad`, `nom_empresa`, `num_proceso`, `demandante`, `cc_demandante`, `demandado`, `cc_demandado`, `valor`, `id_tipo_proceso`) VALUES
(1, 'MUNICIPIO DE PROVIDENCIA Y SANTA CATALINA ISLAS', 'TESORERIA MUNICIPAL', '000100130005000', 'TESORERIA MUNICIPAL', '1232131', 'CAEZ FLOREZ ANGEL MARIA', '000000000', 953928, 1),
(2, 'MUNICIPIO DE PROVIDENCIA Y SANTA CATALINA ISLAS', 'SECRETARIA DE HACIENDA', '740', 'SECRETARIA DE HACIENDA ', '45454521', 'AURA MARIA SANCHEZ GARZON', '5765767', 879562, 1),
(3, 'MUNICIPIO DE PROVIDENCIA Y SANTA CATALINA ISLAS', 'SECRETARIA DE HACIENDA', '524512', 'SECRETARIA DE HACIENDA ', '1108452823', 'RAFAEL ANTONIO MALDONADO', '4546542', 2165430, 1),
(4, 'MUNICIPIO DE PROVIDENCIA Y SANTA CATALINA ISLAS', 'TESORERIA MUNICIPAL', '743', 'TESORERIA MUNICIPAL', '123456', 'ANGEL MARIA CAEZ FLOREZ', '12345678', 953928, 2),
(5, 'GIRARDOT', 'ALCALDIA GIRARDOT', '665', 'TESORERIA MUNICIPAL (GIRARDOT)', '5465465123', 'CRUZ TOQUICA JORGE URBANO', '1108452824', 1808065, 2),
(6, 'GIRARDOT', 'SECRETARIA DE HACIENDA', '840', 'SECRETARIA DE HACIENDA GIRARDOT', '12121212', 'AURA MARIA SANCHEZ GARZON', '23232323', 879562, 1),
(7, 'GIRARDOT', 'SECRETARIA DE HACIENDA', '524512', 'SECRETARIA DE HACIENDA GIRARDOT', '23232323', 'RAFAEL ANTONIO MALDONADO', '121212121', 2165430, 1),
(8, 'GIRARDOT', 'TESORERIA MUNICIPAL', '843', 'TESORERIA MUNICIPAL', '654321', 'ANGEL MARIA CAEZ FLOREZ', '87654321', 953928, 2),
(9, 'RICAURTE', 'TESORERIA MUNICIPAL', '000100130005000', 'TESORERIA MUNICIPAL', '1232131', 'CAEZ FLOREZ ANGEL MARIA', '000000000', 953928, 1),
(10, 'RICAURTE', 'SECRETARIA DE HACIENDA', '740', 'SECRETARIA DE HACIENDA ', '45454521', 'AURA MARIA SANCHEZ GARZON', '5765767', 879562, 1),
(11, 'RICAURTE', 'SECRETARIA DE HACIENDA', '524512', 'SECRETARIA DE HACIENDA ', '1108452823', 'RAFAEL ANTONIO MALDONADO', '4546542', 2165430, 1),
(12, 'RICAURTE', 'TESORERIA MUNICIPAL', '743', 'TESORERIA MUNICIPAL', '123456', 'ANGEL MARIA CAEZ FLOREZ', '12345678', 953928, 2),
(13, 'NILO', 'TESORERIA MUNICIPAL', '000100130005000', 'TESORERIA MUNICIPAL', '1232131', 'CAEZ FLOREZ ANGEL MARIA', '000000000', 953928, 1),
(14, 'NILO', 'SECRETARIA DE HACIENDA', '740', 'SECRETARIA DE HACIENDA ', '45454521', 'AURA MARIA SANCHEZ GARZON', '5765767', 879562, 1),
(15, 'NILO', 'SECRETARIA DE HACIENDA', '524512', 'SECRETARIA DE HACIENDA ', '1108452823', 'RAFAEL ANTONIO MALDONADO', '4546542', 2165430, 1),
(16, 'NILO', 'TESORERIA MUNICIPAL', '743', 'TESORERIA MUNICIPAL', '123456', 'ANGEL MARIA CAEZ FLOREZ', '12345678', 953928, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_proceso`
--

CREATE TABLE IF NOT EXISTS `tipo_proceso` (
  `id_tipo_proceso` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tipo_proceso` varchar(120) NOT NULL,
  `demo` decimal(14,2) NOT NULL,
  PRIMARY KEY (`id_tipo_proceso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipo_proceso`
--

INSERT INTO `tipo_proceso` (`id_tipo_proceso`, `nom_tipo_proceso`, `demo`) VALUES
(1, 'policia', '0.00'),
(2, 'transito', '0.00'),
(3, 'JOSE', '123456789012.12');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `fk_documento_proceso1` FOREIGN KEY (`id_proceso`) REFERENCES `proceso` (`id_proceso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD CONSTRAINT `fk_proceso_tipo_proceso` FOREIGN KEY (`id_tipo_proceso`) REFERENCES `tipo_proceso` (`id_tipo_proceso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

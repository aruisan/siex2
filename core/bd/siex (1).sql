-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2017 a las 15:14:01
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id_archivo` int(11) NOT NULL,
  `nom_archivo` varchar(120) NOT NULL,
  `ff_file` date NOT NULL,
  `ff_load` date NOT NULL,
  `ruta` varchar(200) NOT NULL,
  `id_proceso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id_datos` int(11) NOT NULL,
  `nom_datos` varchar(80) NOT NULL,
  `num_dc` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `direccion` varchar(120) NOT NULL,
  `tipo_persona` varchar(8) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id_datos`, `nom_datos`, `num_dc`, `email`, `direccion`, `tipo_persona`, `telefono`) VALUES
(1, 'carlos alberto peña', '1111111', 'carlos@gmail.com', 'sadas5465 ', 'NATURAL', 3104343164),
(2, 'henrry fabian tovar garcia', '2222222', 'fabian@gmail.com', 'asd4as65d465a ', 'NATURAL', 5544879665),
(3, 'fernando amortegui garcia', '33333333', 'fernando@gmail.com', 's4sd6f4sd6', 'NATURAL', 4654465465),
(4, 'derly johana amortegui garcia', '4444444', 'derly@gmail.com', 'a65d4a654as', 'NATURAL', 4546546546),
(5, 'jony amortegui garcia', '5555555', 'jony@gmail.com', 'as5d46as4d6', 'NATURAL', 4654654654),
(6, 'diana marcela tovar garcia\r\n', '6666666', 'diana@gmail.com', 'as4d6as54d65a6', 'NATURAL', 464121213),
(7, 'radioimagenes odontomedicas S.A', '565656', 'riom@gmail.com', 'sd4a5sd64', 'JURIDICA', 3244542),
(8, 'lina julieth garcia paramo', '456789', 'lina@gmail.com', 'carrera546', 'NATURAL', 465423132),
(9, 'nikolas ochoa amortegui', '5555555', 'nikolas@gmail.com', 'carrera 9b  4-73', 'NATURAL', 45778985),
(10, '', '565656', '', '', 'NATURAL', 0),
(11, '', '565656', '', '', 'NATURAL', 0),
(12, 'radioimagenes odontomedicas S.A', '565656', 'riom@gmail.com', 'sd4a5sd64', 'JURIDICA', 3244542),
(13, 'demo', '444', 'demo@gmail.com', 'sadsad', 'JURIDICA', 451245),
(14, 'juan carlos nieto', '12345', 'oskr@gmail.com', 'carrera pb 4', 'JURIDICA', 3104343164),
(15, 'carlos chayan', '159789', 'chayan@gmail.com', 'casd', 'NATURAL', 454666464),
(16, 'camilo fuentes', '1987', 'cafo@gmail.com', 'carrera', 'NATURAL', 645123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `industria_comercio`
--

CREATE TABLE `industria_comercio` (
  `id_ic` int(11) NOT NULL,
  `ultimo_age_declarado` int(11) NOT NULL,
  `valor_declarado` int(11) NOT NULL,
  `matricula_mercantil` varchar(50) NOT NULL,
  `ff_ultimo_pago` date NOT NULL,
  `id_proceso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL,
  `nom_modulo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes_predios`
--

CREATE TABLE `participantes_predios` (
  `id_participantes_predios` int(11) NOT NULL,
  `id_predio` int(11) NOT NULL,
  `id_participante` int(11) NOT NULL,
  `porcentaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `participantes_predios`
--

INSERT INTO `participantes_predios` (`id_participantes_predios`, `id_predio`, `id_participante`, `porcentaje`) VALUES
(1, 1, 2, 50),
(2, 1, 3, 50),
(3, 2, 5, 100),
(4, 3, 8, 60),
(5, 3, 15, 20),
(6, 3, 16, 10),
(7, 3, 8, 10),
(8, 3, 8, 10),
(9, 3, 8, 10),
(10, 3, 8, 10),
(11, 3, 8, 10),
(12, 3, 8, 10),
(13, 3, 8, 10),
(14, 3, 8, 10),
(15, 3, 8, 10),
(16, 3, 8, 10),
(17, 3, 8, 10),
(18, 3, 8, 10),
(19, 3, 8, 10),
(20, 3, 8, 10),
(21, 1, 8, 10),
(22, 1, 8, 10),
(23, 2, 8, 10),
(24, 1, 1, 3),
(25, 22, 8, 50),
(26, 2, 8, 50),
(27, 3, 1, 10),
(28, 1, 8, 5),
(29, 3, 2, 4),
(30, 2, 2, 8),
(31, 24, 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `nom_perfil` varchar(50) NOT NULL,
  `id_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_modulos`
--

CREATE TABLE `perfil_modulos` (
  `id_perfil_modulos` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `conteo` int(11) NOT NULL,
  `crear` int(11) NOT NULL,
  `leer` int(11) NOT NULL,
  `actualizar` int(11) NOT NULL,
  `borrar` int(11) NOT NULL,
  `imprimir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `predial`
--

CREATE TABLE `predial` (
  `id_predial` int(11) NOT NULL,
  `num_ficha_catastral` varchar(30) NOT NULL,
  `num_matricula_inmoviliaria` varchar(30) NOT NULL,
  `direccion_predio` varchar(45) NOT NULL,
  `barrio_predio` varchar(45) NOT NULL,
  `valor_declarado` int(11) NOT NULL,
  `ultimo_age_declarado` int(11) NOT NULL,
  `ff_ultimo_pago` date NOT NULL,
  `id_proceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `predial`
--

INSERT INTO `predial` (`id_predial`, `num_ficha_catastral`, `num_matricula_inmoviliaria`, `direccion_predio`, `barrio_predio`, `valor_declarado`, `ultimo_age_declarado`, `ff_ultimo_pago`, `id_proceso`) VALUES
(1, '54321', 'asd454656', 'carrera 95 b 45-12', 'santander', 5000000, 2012, '2011-07-05', 2),
(2, '1234', '4321', '452', 'centro', 550000, 2014, '2014-07-19', 5),
(3, 'dsadsadas', '4s6a5d', 'carrera 9b # 4-73', 'santa rita', 525000, 2012, '2012-10-20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos`
--

CREATE TABLE `procesos` (
  `id_proceso` int(11) NOT NULL,
  `ff` date NOT NULL,
  `valor` int(11) NOT NULL,
  `num_expediente` varchar(30) NOT NULL,
  `ciudad` varchar(120) NOT NULL,
  `id_tipo_proceso` int(11) NOT NULL,
  `id_secretaria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `procesos`
--

INSERT INTO `procesos` (`id_proceso`, `ff`, `valor`, `num_expediente`, `ciudad`, `id_tipo_proceso`, `id_secretaria`) VALUES
(1, '2017-09-15', 500000, 'pl12345', 'ricaurte', 2, 1),
(2, '0000-00-00', 250000, '101010', 'girardot', 2, 1),
(3, '2017-06-23', 52542100, 'tr1234', 'flandes', 2, 1),
(4, '2017-06-23', 100000, 'tr54321', 'ricaurte', 2, 1),
(5, '2017-06-23', 5200000, 'tr3321', 'espinal', 2, 1),
(6, '2017-06-23', 652500, 'cc1234', 'girardot', 2, 1),
(7, '2017-06-23', 1250000, 'cc 1234', 'espinal', 2, 1),
(8, '2017-06-23', 1440000, 'demo', 'cucuta', 2, 1),
(9, '2017-06-23', 15263452, 'ok1542', 'ricaurte', 2, 1),
(10, '2017-06-23', 1520000, 'gg1234', 'honda', 2, 1),
(11, '2017-06-23', 15420000, 'pec1234', 'espinal', 2, 1),
(12, '2017-06-30', 15000120, 'rs145', 'flandes', 2, 1),
(13, '2017-07-13', 525500, 'tr123456789', 'guamo', 2, 1),
(14, '2017-07-13', 1987, 'gh112456', 'cali', 2, 1),
(15, '2017-07-13', 1993, 'gh12359', 'leticia', 2, 1),
(16, '2017-07-13', 19931987, 'yiyi1234', 'carabobo', 2, 1),
(17, '2017-07-13', 546879412, 'tete545454', 'caracas', 2, 1),
(18, '2017-07-13', 456123, 'jjjj456123', 'palo quemado', 2, 1),
(19, '2017-07-13', 5421245, 'lll5454', 'cartagena', 2, 1),
(20, '2017-07-13', 4566446, 'sadas465', 'adas4d', 2, 1),
(21, '2017-07-13', 4654646, 'sdas646', 'sa464as', 2, 1),
(22, '2017-07-13', 65465465, 'asd465', '654asd', 2, 1),
(23, '2017-07-13', 46546, 'sadasd', 'dsadas', 2, 1),
(24, '2017-07-13', 465465, 'asdas', '4s6a4da', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relaciones_procesos`
--

CREATE TABLE `relaciones_procesos` (
  `id_relacion_proceso` int(11) NOT NULL,
  `expediente` varchar(30) NOT NULL,
  `id_datos` int(11) DEFAULT NULL,
  `cargo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `relaciones_procesos`
--

INSERT INTO `relaciones_procesos` (`id_relacion_proceso`, `expediente`, `id_datos`, `cargo`) VALUES
(1, 'pl12345', 7, 'DEMANDADO'),
(2, 'pl12345', 7, 'DEMANDANTE'),
(3, '101010', 1, 'DEMANDADO'),
(4, '101010', 4, 'DEMANDANTE'),
(5, 'cc 1234', 5, 'DEMANDANTE'),
(6, 'cc 1234', 6, 'DEMANDADO'),
(7, 'cc 1234', 3, 'ABOGADO DEMANDANTE'),
(8, 'cc 1234', 3, 'ABOGADO DEMANDADO'),
(9, 'cc 1234', 1, 'JUEZ'),
(10, 'demo', 4, 'DEMANDANTE'),
(11, 'demo', 6, 'DEMANDADO'),
(12, 'demo', 3, 'ABOGADO DEMANDANTE'),
(13, 'demo', 3, 'ABOGADO DEMANDADO'),
(14, 'demo', 1, 'JUEZ'),
(15, 'ok1542', 8, 'DEMANDANTE'),
(16, 'ok1542', 9, 'DEMANDADO'),
(17, 'ok1542', 3, 'ABOGADO DEMANDANTE'),
(18, 'ok1542', 3, 'ABOGADO DEMANDADO'),
(19, 'ok1542', 1, 'JUEZ'),
(20, 'gg1234', 3, 'DEMANDANTE'),
(21, 'gg1234', 4, 'DEMANDADO'),
(22, 'gg1234', 3, 'ABOGADO DEMANDANTE'),
(23, 'gg1234', 5, 'ABOGADO DEMANDADO'),
(24, 'gg1234', 4, 'JUEZ'),
(25, 'pec1234', 2, 'DEMANDANTE'),
(26, 'pec1234', 5, 'DEMANDADO'),
(27, 'pec1234', 5, 'ABOGADO DEMANDANTE'),
(28, 'pec1234', 3, 'ABOGADO DEMANDADO'),
(29, 'pec1234', 2, 'JUEZ'),
(30, 'tr1234', 4, 'DEMANDANTE'),
(31, 'tr1234', 4, 'DEMANDADO'),
(32, 'tr1234', 5, 'ABOGADO DEMANDANTE'),
(33, 'tr1234', 5, 'ABOGADO DEMANDADO'),
(34, 'tr1234', 1, 'JUEZ'),
(35, 'tr1234', 6, 'DEMANDANTE'),
(36, 'tr1234', 6, 'DEMANDADO'),
(37, 'tr1234', 3, 'ABOGADO DEMANDANTE'),
(38, 'tr1234', 3, 'ABOGADO DEMANDADO'),
(39, 'tr1234', 4, 'JUEZ'),
(40, 'tr3321', 3, 'DEMANDANTE'),
(41, 'tr3321', 9, 'DEMANDADO'),
(42, 'tr3321', 5, 'ABOGADO DEMANDANTE'),
(43, 'tr3321', 5, 'ABOGADO DEMANDADO'),
(44, 'tr3321', 2, 'JUEZ'),
(45, 'tr3321', 3, 'DEMANDANTE'),
(46, 'tr3321', 5, 'ABOGADO DEMANDADO'),
(47, 'tr3321', 2, 'JUEZ'),
(48, 'tr3321', 9, 'DEMANDADO'),
(49, 'tr3321', 5, 'ABOGADO DEMANDADO'),
(50, 'tr3321', 2, 'JUEZ'),
(51, 'tr3321', 5, 'ABOGADO DEMANDADO'),
(52, 'tr3321', 2, 'JUEZ'),
(53, 'tr3321', 5, 'ABOGADO DEMANDADO'),
(54, 'tr3321', 2, 'JUEZ'),
(55, 'tr3321', 3, 'ABOGADO DEMANDADO'),
(56, 'tr3321', 1, 'JUEZ'),
(57, 'tr54321', 3, 'DEMANDANTE'),
(58, 'tr54321', 3, 'DEMANDADO'),
(59, 'tr54321', 5, 'ABOGADO DEMANDANTE'),
(60, 'tr54321', 5, 'ABOGADO DEMANDADO'),
(61, 'tr54321', 2, 'JUEZ'),
(62, 'tr54321', 2, 'JUEZ'),
(63, 'tr54321', 3, 'DEMANDANTE'),
(64, 'tr54321', 3, 'DEMANDADO'),
(65, 'tr54321', 5, 'ABOGADO DEMANDANTE'),
(66, 'tr54321', 5, 'ABOGADO DEMANDADO'),
(67, 'tr54321', 2, 'JUEZ'),
(68, 'cc1234', 3, 'DEMANDANTE'),
(69, 'cc1234', 3, 'DEMANDADO'),
(70, 'cc1234', 5, 'ABOGADO DEMANDANTE'),
(71, 'cc1234', 5, 'ABOGADO DEMANDADO'),
(72, 'cc1234', 2, 'JUEZ'),
(73, 'tr123456789', 1, 'DEMANDANTE'),
(74, 'tr123456789', 8, 'DEMANDADO'),
(75, 'tr123456789', 3, 'ABOGADO DEMANDANTE'),
(76, 'tr123456789', 5, 'ABOGADO DEMANDADO'),
(77, 'tr123456789', 4, 'JUEZ'),
(78, 'gh112456', 1, 'DEMANDANTE'),
(79, 'gh112456', 15, 'DEMANDADO'),
(80, 'gh112456', 5, 'ABOGADO DEMANDANTE'),
(81, 'gh112456', 3, 'ABOGADO DEMANDADO'),
(82, 'gh112456', 2, 'JUEZ'),
(83, 'gh12359', 12, 'DEMANDANTE'),
(84, 'gh12359', 8, 'DEMANDADO'),
(85, 'gh12359', 5, 'ABOGADO DEMANDANTE'),
(86, 'gh12359', 3, 'ABOGADO DEMANDADO'),
(87, 'gh12359', 1, 'JUEZ'),
(88, 'yiyi1234', 6, 'DEMANDANTE'),
(89, 'yiyi1234', 8, 'DEMANDADO'),
(90, 'yiyi1234', 3, 'ABOGADO DEMANDANTE'),
(91, 'yiyi1234', 5, 'ABOGADO DEMANDADO'),
(92, 'yiyi1234', 1, 'JUEZ'),
(93, 'tete545454', 1, 'DEMANDANTE'),
(94, 'tete545454', 8, 'DEMANDADO'),
(95, 'tete545454', 3, 'ABOGADO DEMANDANTE'),
(96, 'tete545454', 5, 'ABOGADO DEMANDADO'),
(97, 'tete545454', 1, 'JUEZ'),
(98, 'jjjj456123', 14, 'DEMANDANTE'),
(99, 'jjjj456123', 8, 'DEMANDADO'),
(100, 'jjjj456123', 3, 'ABOGADO DEMANDANTE'),
(101, 'jjjj456123', 5, 'ABOGADO DEMANDADO'),
(102, 'jjjj456123', 2, 'JUEZ'),
(103, 'lll5454', 7, 'DEMANDANTE'),
(104, 'lll5454', 8, 'DEMANDADO'),
(105, 'lll5454', 3, 'ABOGADO DEMANDANTE'),
(106, 'lll5454', 5, 'ABOGADO DEMANDADO'),
(107, 'lll5454', 1, 'JUEZ'),
(108, 'sadas465', 1, 'DEMANDANTE'),
(109, 'sadas465', 8, 'DEMANDADO'),
(110, 'sadas465', 3, 'ABOGADO DEMANDANTE'),
(111, 'sadas465', 3, 'ABOGADO DEMANDADO'),
(112, 'sadas465', 4, 'JUEZ'),
(113, 'sdas646', 1, 'DEMANDANTE'),
(114, 'sdas646', 1, 'DEMANDADO'),
(115, 'sdas646', 3, 'ABOGADO DEMANDANTE'),
(116, 'sdas646', 3, 'ABOGADO DEMANDADO'),
(117, 'sdas646', 4, 'JUEZ'),
(118, 'asd465', 1, 'DEMANDANTE'),
(119, 'asd465', 1, 'DEMANDADO'),
(120, 'asd465', 3, 'ABOGADO DEMANDANTE'),
(121, 'asd465', 3, 'ABOGADO DEMANDADO'),
(122, 'asd465', 4, 'JUEZ'),
(123, 'sadasd', 1, 'DEMANDANTE'),
(124, 'sadasd', 1, 'DEMANDADO'),
(125, 'sadasd', 3, 'ABOGADO DEMANDANTE'),
(126, 'sadasd', 3, 'ABOGADO DEMANDADO'),
(127, 'sadasd', 4, 'JUEZ'),
(128, 'asdas', 1, 'DEMANDANTE'),
(129, 'asdas', 8, 'DEMANDADO'),
(130, 'asdas', 3, 'ABOGADO DEMANDANTE'),
(131, 'asdas', 3, 'ABOGADO DEMANDADO'),
(132, 'asdas', 4, 'JUEZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `nom_rol` varchar(30) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`nom_rol`, `id_rol`) VALUES
('admin', 1),
('secretaria', 2),
('abogado', 3),
('juez', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_procesos`
--

CREATE TABLE `tipo_procesos` (
  `id_tipo_proceso` int(11) NOT NULL,
  `nom_tipo_proceso` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_procesos`
--

INSERT INTO `tipo_procesos` (`id_tipo_proceso`, `nom_tipo_proceso`) VALUES
(1, 'transito'),
(2, 'cobro coactivo'),
(3, 'policivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transito`
--

CREATE TABLE `transito` (
  `id_transito` int(11) NOT NULL,
  `num_comparendo` varchar(45) NOT NULL,
  `ff_comparendo` date NOT NULL,
  `id_proceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nick` varchar(16) NOT NULL,
  `id_datos` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `activo` int(11) DEFAULT '0',
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `password`, `nick`, `id_datos`, `id_rol`, `activo`, `id_perfil`) VALUES
(1, '123456', 'demo1', 1, 1, 1, 0),
(2, '123456', 'demo2', 2, 2, 1, 0),
(3, '123456', 'demo3', 3, 3, 1, 0),
(4, '123456', 'demo4', 4, 4, 1, 0),
(5, '123456', 'demo5', 5, 3, 1, 0),
(6, '123456', 'demo6', 2, 4, 1, 0),
(7, '123456', 'demo7', 1, 4, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitantes`
--

CREATE TABLE `visitantes` (
  `id_visitante` int(11) NOT NULL,
  `nom` varchar(120) NOT NULL,
  `num_dc` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `tipo_persona` varchar(9) NOT NULL,
  `nick` varchar(16) NOT NULL,
  `password` varchar(10) NOT NULL,
  `edit_conteo` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id_archivo`);

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id_datos`);

--
-- Indices de la tabla `industria_comercio`
--
ALTER TABLE `industria_comercio`
  ADD PRIMARY KEY (`id_ic`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `participantes_predios`
--
ALTER TABLE `participantes_predios`
  ADD PRIMARY KEY (`id_participantes_predios`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `perfil_modulos`
--
ALTER TABLE `perfil_modulos`
  ADD PRIMARY KEY (`id_perfil_modulos`);

--
-- Indices de la tabla `predial`
--
ALTER TABLE `predial`
  ADD PRIMARY KEY (`id_predial`);

--
-- Indices de la tabla `procesos`
--
ALTER TABLE `procesos`
  ADD PRIMARY KEY (`id_proceso`);

--
-- Indices de la tabla `relaciones_procesos`
--
ALTER TABLE `relaciones_procesos`
  ADD PRIMARY KEY (`id_relacion_proceso`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipo_procesos`
--
ALTER TABLE `tipo_procesos`
  ADD PRIMARY KEY (`id_tipo_proceso`);

--
-- Indices de la tabla `transito`
--
ALTER TABLE `transito`
  ADD PRIMARY KEY (`id_transito`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- Indices de la tabla `visitantes`
--
ALTER TABLE `visitantes`
  ADD PRIMARY KEY (`id_visitante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id_datos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `industria_comercio`
--
ALTER TABLE `industria_comercio`
  MODIFY `id_ic` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `participantes_predios`
--
ALTER TABLE `participantes_predios`
  MODIFY `id_participantes_predios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfil_modulos`
--
ALTER TABLE `perfil_modulos`
  MODIFY `id_perfil_modulos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `predial`
--
ALTER TABLE `predial`
  MODIFY `id_predial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `procesos`
--
ALTER TABLE `procesos`
  MODIFY `id_proceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `relaciones_procesos`
--
ALTER TABLE `relaciones_procesos`
  MODIFY `id_relacion_proceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_procesos`
--
ALTER TABLE `tipo_procesos`
  MODIFY `id_tipo_proceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `transito`
--
ALTER TABLE `transito`
  MODIFY `id_transito` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `visitantes`
--
ALTER TABLE `visitantes`
  MODIFY `id_visitante` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2019 a las 12:22:05
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `salondeeventos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogodeeventos`
--

CREATE TABLE `catalogodeeventos` (
  `idEvento` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `descripcion` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` int(11) NOT NULL,
  `tipoprecio` int(11) NOT NULL,
  `idPaquete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `catalogodeeventos`
--

INSERT INTO `catalogodeeventos` (`idEvento`, `idUsuario`, `descripcion`, `fecha`, `hora`, `estado`, `tipoprecio`, `idPaquete`) VALUES
(1, 4, 'Para my familia', '2019-12-24', '18:00:00', 3, 1, 1),
(2, 5, 'Mi novia Y', '2020-02-14', '20:00:00', 1, 2, 2),
(3, 4, 'nuevo evento', '2019-12-22', '18:00:00', 1, 2, 1),
(4, 5, 'kekflnwelkfnwelnflewnfl', '2020-01-20', '20:00:00', 2, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogodefotosdepaquetes`
--

CREATE TABLE `catalogodefotosdepaquetes` (
  `idFoto` int(11) NOT NULL,
  `idPaquete` int(11) NOT NULL,
  `url` varchar(250) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `catalogodefotosdepaquetes`
--

INSERT INTO `catalogodefotosdepaquetes` (`idFoto`, `idPaquete`, `url`) VALUES
(1, 1, 'foto1.jpg'),
(2, 2, 'foto1.jpg'),
(3, 3, 'foto1.jpg'),
(4, 1, 'foto2.jpg'),
(5, 1, 'foto3.jpg'),
(6, 1, 'foto4.jpg'),
(7, 2, '1p1pg8.jpg'),
(8, 2, '5ewPw2J.jpg'),
(9, 2, '1p1p3r.jpg'),
(10, 7, 'foto1.jpg'),
(11, 7, '17499279_1663138817070339_2588655169470315396_n.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogodepaquetes`
--

CREATE TABLE `catalogodepaquetes` (
  `idPaquete` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `informacion` longtext COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `catalogodepaquetes`
--

INSERT INTO `catalogodepaquetes` (`idPaquete`, `nombre`, `descripcion`, `informacion`) VALUES
(1, 'Paquete Navideño', 'Este paquete es ideal para celebrar las fiestas decembrinas.', '- Básico: 5 sillas, 2 mesas, 1 comida.\r\n\r\n- Intermedio: 10 sillas, 4 mesas, 2 comidas.\r\n\r\n- Avanzado: 20 sillas, 8 mesas, 4 comidas.																																																																						'),
(2, 'Paquete novios es editado', 'Para esa noche especial junto a tu pareja editada', '																																																																																																																																		- Básico: 2 sillas, 1 mesa, 1 vela, 1 cena.\r\n\r\n- Intermedio: 2 sillas, 1 mesa, 3 velas, 1 cena, 1 postre.\r\n\r\n- Avanzado: 3 sillas, 2 mesas, 6 velas, 2 cenas, 2 postres, 3 condones.\r\n\r\n- Un añadido editado																																																																																																																											'),
(3, 'Paquete bautizo 666', 'Para celebrar que tu hijo no entrará al infierno xd', '																																																		- Básico: 10 sillas, 10 ostias, 5 panes, 2 velas.\r\n\r\n- Intermedio: 15 sillas, 2 mesas, 10 panes, 3 velas.\r\n\r\n- Avanzado: 30 sillas, 4 mesas, 15 panes, 3 velas, 1 bebé satánico.																																																						'),
(7, 'Paquete primis', 'Han de ser de Monterrey xdxd', '- Básico: jefilewnlfnwe\r\n\r\n- Intermedio: pifjoewfoewnf\r\n\r\n- Avanzado: eowinfulwenfjlenfkj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosdeeventos`
--

CREATE TABLE `estadosdeeventos` (
  `tipo` int(2) NOT NULL,
  `descripcion` varchar(200) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `estadosdeeventos`
--

INSERT INTO `estadosdeeventos` (`tipo`, `descripcion`) VALUES
(1, 'Pendiente'),
(2, 'Confirmado'),
(3, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE `precios` (
  `idPrecio` int(11) NOT NULL,
  `idPaquete` int(11) NOT NULL,
  `precio` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `tipo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`idPrecio`, `idPaquete`, `precio`, `tipo`) VALUES
(1, 1, '1500', 1),
(2, 1, '3000', 2),
(3, 1, '6666', 3),
(4, 2, '500', 1),
(5, 2, '1000', 2),
(6, 2, '8000', 3),
(7, 3, '3000', 1),
(8, 3, '3600', 2),
(9, 3, '5000', 3),
(16, 7, '111', 1),
(17, 7, '222', 2),
(18, 7, '333', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposdeprecios`
--

CREATE TABLE `tiposdeprecios` (
  `tipo` int(2) NOT NULL,
  `descripcion` varchar(250) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tiposdeprecios`
--

INSERT INTO `tiposdeprecios` (`tipo`, `descripcion`) VALUES
(1, 'Básico'),
(2, 'Intermedio'),
(3, 'Avanzado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposdeusuarios`
--

CREATE TABLE `tiposdeusuarios` (
  `tipo` int(2) NOT NULL,
  `descripcion` varchar(250) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tiposdeusuarios`
--

INSERT INTO `tiposdeusuarios` (`tipo`, `descripcion`) VALUES
(1, 'Cliente'),
(2, 'Empleado'),
(3, 'Gerente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `correo` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `tipousuario` int(2) NOT NULL,
  `activo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellido`, `correo`, `password`, `tipousuario`, `activo`) VALUES
(1, 'Jorge Alberto', 'Albores Jimenez', 'jorge@hotmail.com', 'jorge123', 1, 1),
(2, 'Itzayana Carolina', 'Coutiño Guillen', 'itzayana@hotmail.com', 'itzayana123', 2, 1),
(3, 'Gerardo Alejandro', 'Moreno Trujillo', 'gerardo@hotmail.com', 'gerardo123', 2, 1),
(4, 'Cliente1', 'Cliente2 Apellido', 'cliente1@gmail.com', '12345', 3, 1),
(5, 'Cliente2', 'Cliente2 Apellido', 'cliente2@gmail.com', '54321', 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogodeeventos`
--
ALTER TABLE `catalogodeeventos`
  ADD PRIMARY KEY (`idEvento`);

--
-- Indices de la tabla `catalogodefotosdepaquetes`
--
ALTER TABLE `catalogodefotosdepaquetes`
  ADD PRIMARY KEY (`idFoto`);

--
-- Indices de la tabla `catalogodepaquetes`
--
ALTER TABLE `catalogodepaquetes`
  ADD PRIMARY KEY (`idPaquete`);

--
-- Indices de la tabla `precios`
--
ALTER TABLE `precios`
  ADD PRIMARY KEY (`idPrecio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogodeeventos`
--
ALTER TABLE `catalogodeeventos`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `catalogodefotosdepaquetes`
--
ALTER TABLE `catalogodefotosdepaquetes`
  MODIFY `idFoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `catalogodepaquetes`
--
ALTER TABLE `catalogodepaquetes`
  MODIFY `idPaquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `precios`
--
ALTER TABLE `precios`
  MODIFY `idPrecio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2023 a las 21:01:43
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `thinkbox`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `idservicio` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `cantidad` int(2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `iva` decimal(15,2) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `estatus` int(1) NOT NULL COMMENT '0:activo 1:eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `fecha`, `hora`, `idservicio`, `usuario`, `cantidad`, `subtotal`, `iva`, `total`, `estatus`) VALUES
(1, '2023-12-20', '19:58:11', 1, 2, 1, '2500.00', '400.00', '2900.00', 0),
(2, '2023-12-20', '19:16:33', 2, 1, 1, '3500.00', '560.00', '4060.00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `idusuario` int(11) NOT NULL,
  `servicio` int(11) NOT NULL,
  `total_pago` decimal(15,2) NOT NULL,
  `payment_request_id` varchar(255) NOT NULL,
  `estatus` int(11) NOT NULL COMMENT 'Guarda el estatus de id de estatus_pago'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus_pago`
--

CREATE TABLE `estatus_pago` (
  `id` int(11) NOT NULL,
  `estatus` varchar(30) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estatus_pago`
--

INSERT INTO `estatus_pago` (`id`, `estatus`, `descripcion`) VALUES
(1, 'CHECKOUT_CREATED', 'El link de pago fue creado exitosamente'),
(2, 'CHECKOUT_PENDING', 'El link de pago esta activo y pendiente de ser completado'),
(3, 'CHECKOUT_CANCELLED', 'El link de pago fue cancelado por exceso de intentos (máximo 5)'),
(4, 'CHECKOUT_EXPIRED', 'El link de pago expiro. El link de pago expira despues de 1 hora'),
(5, 'CHECKOUT_COMPLETED', 'El link de pago se liquido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `descripcion`, `precio`) VALUES
(1, '4 menus', '2500.00'),
(2, '5 menus', '3500.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `contrasena` varchar(40) NOT NULL,
  `telefono` varchar(40) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `empresa`, `correo`, `usuario`, `contrasena`, `telefono`, `estado`) VALUES
(1, 'Gerardo Manuel', 'Gomez Vazquez', 'TESCHI', 'correo1@correo.mx', 'gera', 'gera123', '5533883855', 1),
(2, 'Thinkbox User', 'SD', 'Thinkbox SD', 'correo2@correo.mx', 'usuario2', 'usuario2', '5533560098', 1),
(3, 'Thinkbox2', 'SD', 'Thinkbox SD', 'correo2@correo.mx', 'think', 'think', '5520202020', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estatus_pago`
--
ALTER TABLE `estatus_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estatus_pago`
--
ALTER TABLE `estatus_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

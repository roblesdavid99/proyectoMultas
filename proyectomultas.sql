-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2022 a las 19:34:02
-- Versión del servidor: 8.0.25
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectomultas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `nombre`, `created`, `modified`) VALUES
(1, 'Oculus', '2022-02-02 17:24:18', '2022-02-02 17:24:18'),
(2, 'Hololens', '2022-02-02 17:24:31', '2022-02-02 17:24:31'),
(3, 'HTC', '2022-02-02 17:24:41', '2022-02-02 17:24:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multas`
--

CREATE TABLE `multas` (
  `id` int NOT NULL,
  `nombreEquipo` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `multa` decimal(10,2) NOT NULL,
  `prestamo_id` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `multas`
--

INSERT INTO `multas` (`id`, `nombreEquipo`, `usuario`, `multa`, `prestamo_id`, `created`, `modified`) VALUES
(2, 'Hololens', 'Pepe', '35.00', '2', '2022-02-03 17:01:14', '2022-02-03 17:14:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20220202171910, 'CreateEquipos', '2022-02-02 22:19:18', '2022-02-02 22:19:19', 0),
(20220202171946, 'CreatePrestamos', '2022-02-02 22:19:53', '2022-02-02 22:19:53', 0),
(20220202172015, 'CreateMultas', '2022-02-02 22:20:21', '2022-02-02 22:20:21', 0),
(20220202193536, 'CreateMultas', '2022-02-03 00:35:46', '2022-02-03 00:35:46', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id` int NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `fechaEntrega` date DEFAULT NULL,
  `usuario` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `equipo_id` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id`, `fechaInicio`, `fechaFin`, `fechaEntrega`, `usuario`, `estado`, `equipo_id`, `created`, `modified`) VALUES
(1, '2021-12-01', '2022-01-05', '2022-01-05', 'David', 'devuelto', '1', '2022-02-02 17:29:26', '2022-02-03 17:14:47'),
(2, '2022-01-20', '2022-01-27', NULL, 'Pepe', 'prestado', '2', '2022-02-02 18:22:08', '2022-02-03 17:03:49'),
(3, '2022-02-01', '2022-02-10', NULL, 'Larry', 'prestado', '3', '2022-02-03 17:05:01', '2022-02-03 17:05:01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `multas`
--
ALTER TABLE `multas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `multas`
--
ALTER TABLE `multas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

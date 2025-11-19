-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2025 a las 17:57:18
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_ipv_proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_inspeccion`
--

CREATE TABLE `estados_inspeccion` (
  `id_estado` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `color` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados_inspeccion`
--

INSERT INTO `estados_inspeccion` (`id_estado`, `descripcion`, `color`) VALUES
(1, 'Aprobada', '#22c55e'),
(2, 'Pendiente', '#facc15'),
(3, 'Rechazada', '#ef4444');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspecciones`
--

CREATE TABLE `inspecciones` (
  `id_inspeccion` int(11) NOT NULL,
  `id_motivo` int(11) NOT NULL,
  `codigo_vivienda` varchar(50) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `geolocalizacion` varchar(255) NOT NULL,
  `tipo_vivienda_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_inspeccion` date DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivos_inspeccion`
--

CREATE TABLE `motivos_inspeccion` (
  `id_motivo` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `activo` int(11) NOT NULL COMMENT '0=inactivo\r\n1=activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `created_at`) VALUES
(1, 'Administrador', 'Acceso total', '2025-11-19 14:59:54'),
(2, 'Inspector', 'Inspector', '2025-11-19 14:59:54'),
(3, 'Consulta', 'Solo lectura', '2025-11-19 14:59:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_viviendas`
--

CREATE TABLE `tipos_viviendas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_viviendas`
--

INSERT INTO `tipos_viviendas` (`id`, `nombre`, `descripcion`) VALUES
(1, '37m2 c5', 'Prototipo 37m2 c5'),
(2, 'F', 'Prototipo F'),
(3, 'F DIS', 'Prototipo F DIS'),
(4, 'H', 'Prototipo H'),
(5, 'C', 'Prototipo C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_usuario` int(11) NOT NULL,
  `nombrecompleto` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `activo` int(11) NOT NULL COMMENT '1=activo\r\n0=inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_usuario`, `nombrecompleto`, `email`, `password`, `rol_id`, `created_at`, `activo`) VALUES
(1, 'Admin', 'admin@ipv.local', '$2y$10$abcdefghijklmnopqrstuv', 1, '2025-11-19 14:59:55', 0),
(3, 'Inspector Uno', 'inspector@ipv.local', '$2y$10$abcdefghijklmnopqrstuv', 2, '2025-11-19 14:59:55', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estados_inspeccion`
--
ALTER TABLE `estados_inspeccion`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `inspecciones`
--
ALTER TABLE `inspecciones`
  ADD PRIMARY KEY (`id_inspeccion`),
  ADD KEY `tipo_vivienda_id` (`tipo_vivienda_id`),
  ADD KEY `estado_id` (`estado_id`),
  ADD KEY `inspector_id` (`usuario_id`),
  ADD KEY `id_motivo` (`id_motivo`);

--
-- Indices de la tabla `motivos_inspeccion`
--
ALTER TABLE `motivos_inspeccion`
  ADD PRIMARY KEY (`id_motivo`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_viviendas`
--
ALTER TABLE `tipos_viviendas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estados_inspeccion`
--
ALTER TABLE `estados_inspeccion`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `inspecciones`
--
ALTER TABLE `inspecciones`
  MODIFY `id_inspeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `motivos_inspeccion`
--
ALTER TABLE `motivos_inspeccion`
  MODIFY `id_motivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipos_viviendas`
--
ALTER TABLE `tipos_viviendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inspecciones`
--
ALTER TABLE `inspecciones`
  ADD CONSTRAINT `inspecciones_ibfk_1` FOREIGN KEY (`tipo_vivienda_id`) REFERENCES `tipos_viviendas` (`id`),
  ADD CONSTRAINT `inspecciones_ibfk_2` FOREIGN KEY (`estado_id`) REFERENCES `estados_inspeccion` (`id_estado`),
  ADD CONSTRAINT `inspecciones_ibfk_3` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id_usuario`);

--
-- Filtros para la tabla `motivos_inspeccion`
--
ALTER TABLE `motivos_inspeccion`
  ADD CONSTRAINT `motivos_inspeccion_ibfk_1` FOREIGN KEY (`id_motivo`) REFERENCES `inspecciones` (`id_motivo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

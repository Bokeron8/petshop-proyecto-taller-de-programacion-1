-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2025 a las 17:40:54
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
-- Base de datos: `bd_bazzola_zambrano_2025`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `descripcion_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `descripcion_categoria`) VALUES
(1, 'Alimento'),
(2, 'Medicamentos'),
(3, 'Juguetes'),
(4, 'Accesorios'),
(5, 'Higiene');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_productos`
--

CREATE TABLE `categorias_productos` (
  `id_categorias_producto` int(11) NOT NULL,
  `id_producto_categorias_productos` int(11) NOT NULL,
  `id_categoria_categorias_productos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias_productos`
--

INSERT INTO `categorias_productos` (`id_categorias_producto`, `id_producto_categorias_productos`, `id_categoria_categorias_productos`) VALUES
(18, 9, 2),
(19, 9, 4),
(20, 9, 5),
(21, 8, 5),
(24, 16, 1),
(25, 16, 3),
(26, 17, 3),
(27, 18, 3),
(28, 19, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `descripcion_marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `descripcion_marca`) VALUES
(1, 'Pedigree'),
(2, 'Whiskas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id_mensaje` int(11) NOT NULL,
  `nombre_mensaje` varchar(50) NOT NULL,
  `email_mensaje` varchar(50) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha_mensaje` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `descripcion_perfil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `descripcion_perfil`) VALUES
(1, 'cliente'),
(2, 'empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `descripcion_producto` varchar(50) NOT NULL,
  `id_marca_producto` int(11) NOT NULL,
  `stock_producto` int(11) NOT NULL,
  `precio_producto` float NOT NULL,
  `imagen_producto` varchar(200) NOT NULL,
  `estado_producto` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `descripcion_producto`, `id_marca_producto`, `stock_producto`, `precio_producto`, `imagen_producto`, `estado_producto`) VALUES
(8, 'asdasd', 'asdasd', 1, 123213, 213213, '1749214295_3421b6b94cc384f310e9.png', 1),
(9, 'pruebaxd', 'asdaxd', 1, 1, 1, '1749214364_469621753f792c932a57.png', 1),
(16, 'Bolsa de Alimento 20kg', 'askdoáijaijhofoisd', 1, 156, 21568, '1749234294_fe4f3492552df85e4f20.jpg', 1),
(17, 'Bola Leon', 'Bola Leon para jugar y masticar', 1, 5, 12.5, '1749236644_b33cb4c09d834a956a51.jpg', 1),
(18, 'Bola Tigre', 'Bola Tigre para boludear', 1, 6, 12.5, '1749236697_54665aa688d4810ffb6a.jpg', 1),
(19, 'Bola de Mono', 'ViniJR uh uh uh  ahaha ahah', 1, 7, 12.5, '1749236775_6072896120044aa2d056.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido_usuario` varchar(50) NOT NULL,
  `dni_usuario` int(11) NOT NULL,
  `domicilio_usuario` varchar(100) NOT NULL,
  `email_usuario` varchar(50) NOT NULL,
  `contraseña_usuario` varchar(300) NOT NULL,
  `estado_usuario` tinyint(1) NOT NULL,
  `telefono_usuario` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `dni_usuario`, `domicilio_usuario`, `email_usuario`, `contraseña_usuario`, `estado_usuario`, `telefono_usuario`, `perfil_id`) VALUES
(3, 'ar', 'za', 0, '', 'asd@gmail.com', '$2y$10$P63HZRlrY7T.o60ZU/BncO/CvMh8pHDvGM9f8E0UnYepwS6GB5dx.', 1, 0, 2),
(4, 'mensajes', 'asdasd', 0, '', 'nospamfranco2@gmail.com', '$2y$10$n/cUYTtE2smWaF4fnpgx3.J7ufN2PO86hJSKGRnvRH1KnYMdkv3bu', 1, 0, 1),
(5, 'mensajes', 'asdasd', 0, '', 'nospamfranco3@gmail.com', '$2y$10$GZWr12fHoPZFLrThyKrT5.Q3FLG0VWtMmMOWm0ZLKvQTOE.mO0th2', 1, 0, 2),
(6, 'fulanito', 'de tal', 0, '', 'fula@yopmail.com.ar', '$2y$10$kVV4CTMmS8JadbKdVKx0Ge/xX9oMZsm4j72i9bzGxfT19Ev2.lyta', 1, 0, 1),
(7, 'Menganito', 'de tal', 0, '', 'menga@yopmail.com.ar', '$2y$10$kgJ0fo7gHnde/SrC3ADPaenp1K0og26.Yp.TcrO7MhPfjWGY3261G', 1, 0, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `categorias_productos`
--
ALTER TABLE `categorias_productos`
  ADD PRIMARY KEY (`id_categorias_producto`),
  ADD KEY `id_categoria` (`id_categoria_categorias_productos`),
  ADD KEY `id_producto` (`id_producto_categorias_productos`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_marca_producto` (`id_marca_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email_usuario` (`email_usuario`),
  ADD KEY `perfil_id` (`perfil_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias_productos`
--
ALTER TABLE `categorias_productos`
  MODIFY `id_categorias_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias_productos`
--
ALTER TABLE `categorias_productos`
  ADD CONSTRAINT `categorias_productos_ibfk_1` FOREIGN KEY (`id_categoria_categorias_productos`) REFERENCES `categorias` (`id_categoria`),
  ADD CONSTRAINT `categorias_productos_ibfk_2` FOREIGN KEY (`id_producto_categorias_productos`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_marca_producto`) REFERENCES `marcas` (`id_marca`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id_perfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

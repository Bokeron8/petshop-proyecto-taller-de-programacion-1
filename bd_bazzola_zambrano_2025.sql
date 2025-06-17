-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2025 a las 17:03:43
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
(42, 18, 3),
(43, 19, 3),
(44, 20, 1),
(45, 21, 1),
(46, 22, 1),
(47, 16, 1),
(48, 17, 3),
(49, 23, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `detalle_cantidad` int(11) NOT NULL,
  `detalle_precio` decimal(10,0) NOT NULL,
  `detalle_subtotal` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_venta`, `id_producto`, `detalle_cantidad`, `detalle_precio`, `detalle_subtotal`) VALUES
(1, 16, 1, 22000, 22000),
(1, 18, 1, 13, 13),
(1, 19, 2, 13, 25),
(2, 17, 2, 13, 25),
(3, 16, 2, 22000, 44000),
(4, 20, 1, 6000, 6000),
(4, 21, 1, 3000, 3000),
(4, 22, 1, 41000, 41000),
(5, 20, 1, 6000, 6000),
(6, 16, 1, 22000, 22000),
(7, 16, 1, 22000, 22000),
(8, 16, 1, 22000, 22000),
(9, 17, 1, 13, 13),
(10, 16, 1, 22000, 22000),
(11, 16, 1, 22000, 22000),
(12, 17, 2, 13, 25);

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
(2, 'Whiskas'),
(3, 'Dr Perrot'),
(4, 'Cat Chow'),
(5, 'Agility'),
(6, 'Zootec');

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

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id_mensaje`, `nombre_mensaje`, `email_mensaje`, `mensaje`, `fecha_mensaje`) VALUES
(10, 'juan perez', 'juanperez@gmail.com', 'mensaje de prueba ', '2025-06-12');

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
(16, 'Bolsa de Dr.Perrot 20kg', 'Bolsa de Alimento 20kg Dr Perrot. Perro Adulto.', 3, 12, 22000, '1749735374_5925eebc723e54458017.png', 1),
(17, 'Pelota Leon', 'Pelota Leon para que tu mascota juegue.', 6, 23, 12.5, '1749236644_b33cb4c09d834a956a51.jpg', 1),
(18, 'Pelota Tigre', 'Pelota Tigre ', 6, 5, 12.5, '1749236697_54665aa688d4810ffb6a.jpg', 1),
(19, 'Pelota Mono', 'Pelota Mono', 6, 5, 12.5, '1749236775_6072896120044aa2d056.jpg', 1),
(20, 'Bolsa de Pedigree 3kg', 'Bolsa de Alimento 3kg. Pedigree. Perro Adulto.', 1, 23, 6000, '1749736776_2270f3139c8809163d85.avif', 1),
(21, 'Bolsa de Pedigree 1.5kg', 'Bolsa de Alimento 1.5kg. Pedigree. Perro Adulto.', 1, 19, 3000, '1749737107_b281301906f97ffff350.avif', 1),
(22, 'Bolsa de Pedigree 21kg', 'Bolsa de Alimento 21kg. Pedigree. Perro Adulto.', 1, 19, 41000, '1749737175_e24b0d5b858778572bb5.avif', 1),
(23, 'Bolsa de Agility Adultos 3kg', 'Bolsa de Agility Adultos 3kg. Talla mediana.', 5, 23, 5000, '1750170821_538dff0b2798c811eb73.webp', 1);

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
(6, 'fulanito', 'de tal', 0, '', 'fula@yopmail.com.ar', '$2y$10$kVV4CTMmS8JadbKdVKx0Ge/xX9oMZsm4j72i9bzGxfT19Ev2.lyta', 0, 0, 1),
(7, 'Menganito', 'de tal', 0, '', 'menga@yopmail.com.ar', '$2y$10$kgJ0fo7gHnde/SrC3ADPaenp1K0og26.Yp.TcrO7MhPfjWGY3261G', 1, 0, 2),
(8, 'full animal', 'administrador', 0, '', 'admin@tienda.com', '$2y$10$jFS2onakGo4X.lufNAKf/uhx5z09B1LvCSiSpHNw9FR0YQBvyrB96', 1, 0, 2),
(9, 'Marcos', 'Mazzanti', 10000001, 'irigoyen 369 entre don bosco y pago largo', 'marcos@gmail.com', '$2y$10$XloL2Fb1aZV2mDJ6AJMRxORg0KA8rfl.bHhMQRL2dIJuuO4PgUOx.', 1, 2147483647, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `venta_id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `venta_fecha` date NOT NULL,
  `venta_total` decimal(10,0) NOT NULL,
  `venta_forma_pago` text NOT NULL,
  `venta_forma_entrega` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`venta_id`, `id_cliente`, `venta_fecha`, `venta_total`, `venta_forma_pago`, `venta_forma_entrega`) VALUES
(1, 9, '2025-06-17', 22038, 'efectivo', 1),
(2, 9, '2025-06-17', 25, 'transferencia', 0),
(3, 9, '2025-06-17', 44000, 'efectivo', 1),
(4, 9, '2025-06-17', 50000, 'efectivo', 0),
(5, 9, '2025-06-17', 6000, 'efectivo', 0),
(6, 9, '2025-06-17', 22000, 'efectivo', 0),
(7, 9, '2025-06-17', 22000, 'efectivo', 0),
(8, 9, '2025-06-17', 22000, 'efectivo', 0),
(9, 9, '2025-06-17', 13, 'efectivo', 0),
(10, 9, '2025-06-17', 22000, 'efectivo', 0),
(11, 9, '2025-06-17', 22000, 'efectivo', 0),
(12, 9, '2025-06-17', 25, 'efectivo', 0);

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
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`);

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
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`venta_id`),
  ADD KEY `id_cliente` (`id_cliente`);

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
  MODIFY `id_categorias_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `venta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`venta_id`);

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

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

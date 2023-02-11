-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-02-2023 a las 02:02:37
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wallapop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(11) NOT NULL,
  `precio` float NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `imagen` varchar(400) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id`, `precio`, `titulo`, `descripcion`, `fecha`, `imagen`, `id_usuario`) VALUES
(1, 111, 'iPhone 12 PRO - seminuevo', 'Muy poco uso, un solo dueño, comprado hace 6 meses', '2023-02-06 17:40:25', 'iphone12.jpg', 2),
(3, 325, 'Bicicleta de montaña', 'Bicicleta de montaña de alta calidad, con cambios ', '2022-12-14 23:00:00', 'BicicletaMontana.jpg', 1),
(4, 480, 'Televisión OLED', 'Televisión LED de 32 pulgadas en perfecto estado', '2022-11-22 23:00:00', 'Xiaomi2.jpg', 2),
(5, 200, 'Ordenador portátil', 'Ordenador portátil de última generación con i7 y 1', '2022-10-27 22:00:00', 'portatil.jpg', 3),
(6, 75, 'Consola de videojuegos', 'Consola de videojuegos Xbox One en buen estado con', '2022-09-11 22:00:00', 'xbox.jpg', 4),
(8, 3000, 'Bicicleta de competición', 'Bicicleta de competición de alta calidad, con camb', '2022-12-14 23:00:00', 'BicicletaMontana.jpg', 1),
(9, 50, 'Televisión LED', 'Televisión LED de 32 pulgadas en perfecto estado', '2022-11-22 23:00:00', 'Xiaomi.jpg', 2),
(10, 200, 'Ordenador portátil', 'Ordenador portátil de última generación con i7 y 1', '2022-10-27 22:00:00', 'hp.jpg', 3),
(11, 350, 'Consola de videojuegos', 'Consola de videojuegos Xbox One en buen estado con', '2022-09-11 22:00:00', 'xbox.jpg', 4),
(13, 100, 'Bicicleta de trial', 'Bicicleta de montaña de alta calidad, con cambios ', '2022-12-14 23:00:00', 'BicicletaMontana.jpg', 1),
(14, 1200, 'Televisión AMOLED', 'Televisión LED de 32 pulgadas en perfecto estado', '2022-11-22 23:00:00', 'Samsung.jpg', 2),
(15, 200, 'Ordenador portátil', 'Ordenador portátil de última generación con i7 y 1', '2022-10-27 22:00:00', 'hp.jpg', 3),
(16, 275, 'Consola de videojuegos', 'Consola de videojuegos Xbox One en buen estado con', '2022-09-11 22:00:00', 'xbox.jpg', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id_usuario` int(11) NOT NULL,
  `id_anuncio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotografias`
--

CREATE TABLE `fotografias` (
  `id` int(11) NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `foto` varchar(450) NOT NULL,
  `principal` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fotografias`
--

INSERT INTO `fotografias` (`id`, `id_anuncio`, `foto`, `principal`) VALUES
(3, 1, 'iphone.jpg', 1),
(4, 1, 'iphoneRev.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `poblacion` varchar(50) DEFAULT NULL,
  `foto` varchar(400) NOT NULL,
  `uid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `nombre`, `telefono`, `poblacion`, `foto`, `uid`) VALUES
(1, 'user@user.es', '$2y$10$LUo.9HLDX43CLClFvL8tk.13khvTjMZNAM99I11edUeAi4SB06KYq', NULL, NULL, NULL, '', ''),
(2, 'Gustavo', '$2y$10$i5RhEcqo747cIlewK6eR0utiil2i/JjoayAmjyaHrjh0d9G1nQ2lS', NULL, NULL, NULL, '', ''),
(3, 'Txsoky', '$2y$10$EELiUpDXU8xX6.dTcyplQuI/Gy3iFwXMZm0x6uuJ.r8UN/4PZHb6G', NULL, NULL, NULL, '', ''),
(4, 'prueba', '$2y$10$dtULNTRWl1GbvhxmPTu22eAjwrdNB2bLXKwIxNB7hW18dfV4g3wfO', NULL, NULL, NULL, '', ''),
(5, 'Pilar@gmail.com', '$2y$10$cyjJcUjOAFlL31Hr1JMkROYEe6fAsFO/mFikxoxHrQkLXhp3taJGG', 'Pilar López', '666111666', 'Alcázar de San Juan', 'pilar.jpg', '83dea721f30a97bfb651c8f12241420547108f3865ad3c8fb7bbb8a7bb0aac7ac5670c66'),
(6, 'Juanito@gmail.com', '$2y$10$IUXiLAu0gGkvyI4FQYSb/Os4wYwCCnRylPnye.bi/Ir/Q0cvz3xFO', 'Pilar López', '666111666', 'Alcázar de San Juan', '', ''),
(7, 'pepito@gmail.com', '$2y$10$.czsCqRQ8/CPLRAKuGyJuuur147m75zUySg1Zf0ECUlAilVJVwmcG', 'Pepo', '666111666', 'Alcázar de San Juan', '', ''),
(8, 'Pepo@gmail.com', '$2y$10$w3dRCb90AxFLt8WGYRZYTOKoeN/MLjzu8ee5SNT9iEAE6Fhpf7LP6', 'Pilar López', '666111666', 'Alcázar de San Juan', '', ''),
(9, 'joseju@gmail.com', '$2y$10$YH5Sh/aBioaUKVUcLL23SuRANJETu9rbSXnbOE27jFZd7HUPLwRqq', 'JoseJu', '666111666', 'Alcázar de San Juan', '', '02e4eeedad7134c66d970a96757018609b991fcac42390c02464b1cdef7e651c4fef2293'),
(10, 'Mike@gmail.com', '$2y$10$.nXkKHST42DLGgjUzdgc7eNXH77VN108fKGXRFB4wGT8ly77jfe7O', 'Mike', '666111666', 'Alcázar de San Juan', '', ''),
(11, 'coto@hotmail.com', '$2y$10$O1AVhU6.c8LBmYGR0oNNWOPgRJj9C4boU7/RuRssiWfuLHnYmToS2', 'Coto Matamoros', '666111666', 'Alcázar de San Juan', '755cf0701e454bd5999f32df277a260e.jpg', 'be171e640c40ecfd9264b400be5da51b5b77b965ec626e94bf1145119eddac7e29cb8457'),
(12, 'Juana@hotmail.com', '$2y$10$.a.XQSdc0CO7TwdUcjD4o.7GFrdm69xg0lI0cI/ezyHJeBTaDdXs.', 'Juana y su hermana', '666111666', 'Alcázar de San Juan', '38a0da449677994896f791a2e0f6e1a2.png', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_anuncio_usuario` (`id_usuario`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD KEY `fk_favorito_usuario` (`id_usuario`),
  ADD KEY `fk_favorito_anuncio` (`id_anuncio`);

--
-- Indices de la tabla `fotografias`
--
ALTER TABLE `fotografias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_foto_anuncio` (`id_anuncio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `fotografias`
--
ALTER TABLE `fotografias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `fk_anuncio_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `fk_favorito_anuncio` FOREIGN KEY (`id_anuncio`) REFERENCES `anuncios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_favorito_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fotografias`
--
ALTER TABLE `fotografias`
  ADD CONSTRAINT `fk_foto_anuncio` FOREIGN KEY (`id_anuncio`) REFERENCES `anuncios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

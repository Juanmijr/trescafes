-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-01-2020 a las 19:07:26
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `trescafes`
--

-- --------------------------------------------------------
drop database if exists trescafes;
create database trescafes;
use trescafes;
--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `tipo` enum('cafe','reposteria','otro') NOT NULL,
  `nombreProducto` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `imagenProducto` varchar(50) NOT NULL,
  `proteinas` double NOT NULL,
  `carbohidratos` double NOT NULL,
  `grasas` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `tipo`, `nombreProducto`, `descripcion`, `imagenProducto`, `proteinas`, `carbohidratos`, `grasas`) VALUES
(1, 'cafe', 'Loloccino', 'Disfruta del Capuccino especial de la casa, en el que encontrarás una espumosa capa de leche, junto a nuestro acaramelado Espresso y el toque perfecto de cacao espolverizado.', 'img/Productos/loloccino.png', 4.08, 5.81, 3.98),
(2, 'cafe', 'Yorspresso', 'Preparado con café recién molido y una buena capa espesa de crema, nuestro café Yorspresso dejará una experiencia muy aromática e intensa.', 'img/Productos/Espresso.png', 0.07, 0, 0.11),
(3, 'cafe', 'Juanmocha', 'En nuestro Juanmocha se combinan perfectamente la intensidad y la amargura del café, con la dulzura de nuestro suave chocolate.', 'img/Productos/juanmocha.png', 5.3, 12.4, 5.1),
(4, 'reposteria', 'Tartas', 'Aquí encontrarás desde simples tartas de delicioso chocolate hasta tartas de queso con interior de fresas.', 'img/Productos/tarta.png', 2.48, 33.6, 13.08),
(5, 'reposteria', 'Magdalenas', 'Descubre nuestras magdalenas caseras bajas en azúcar o cubiertas en chocolate negro.', 'img/Productos/magdalena.png', 1.31, 15.5, 7.16),
(6, 'reposteria', 'Galletas', 'Podrás probar nuestras galletas de limón, de vainilla, con pepitas de chocolate o, si lo prefieres, bajas en azúcar.', 'img/Productos/galletas.png', 0.27, 3.45, 1.07),
(7, 'reposteria', 'Bizcochos', 'Te encantarán nuestros esponjosos bizcochos de queso y yogurt, naranja y chocolate, manzana y nueces o de calabaza.', 'img/Productos/bizcocho.png', 6, 36.35, 2.71),
(8, 'otro', 'Chocolates', 'Saborea la dulzura y la pureza de nuestros chocolates mezclados delicadamente con leche caliente.', 'img/Productos/chocolate.png', 8.8, 29.9, 5.47),
(9, 'otro', 'Infusiones', 'Manzanillas, valerianas, tés, tilas, de menta... En Tres Cafés contamos con una gran variedad de infusiones que te harán ver la vida desde otra perspectiva.', 'img/Productos/infusion.png', 0, 0.71, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `contrasenia` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido1` varchar(50) NOT NULL,
  `apellido2` varchar(50) DEFAULT NULL,
  `fechaNacimiento` date NOT NULL,
  `pais` varchar(50) NOT NULL,
  `codigoPostal` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `rol` enum('administrador','editor','valorador') NOT NULL,
  `imagenPerfil` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `email`, `nombreUsuario`, `contrasenia`, `nombre`, `apellido1`, `apellido2`, `fechaNacimiento`, `pais`, `codigoPostal`, `telefono`, `rol`, `imagenPerfil`) VALUES
(1, 'jorge.rgdaw@gmail.com', 'Yorch4', 'Jorge_1234', 'Jorge', 'Ruiz', 'Garcia', '2020-01-08', 'España', 14900, 123456789, 'administrador', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `idValoracion` int(11) NOT NULL,
  `usuario` int(11) DEFAULT NULL,
  `producto` int(11) DEFAULT NULL,
  `valoracion` enum('1','2','3','4','5') NOT NULL,
  `comentario` varchar(180) DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`idValoracion`, `usuario`, `producto`, `valoracion`, `comentario`, `fecha`) VALUES
(1, 1, 1, '5', 'Esto esta buenisimo', '2020-01-29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD UNIQUE KEY `nombreProducto` (`nombreProducto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`idValoracion`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `producto` (`producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `idValoracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `valoracion_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idUsuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `valoracion_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `producto` (`idProducto`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

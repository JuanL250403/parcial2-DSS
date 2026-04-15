-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2026 a las 19:16:27
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
-- Base de datos: `desafio2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `nombre`, `descripcion`, `img`) VALUES
(1, 'Cien años de soledad', 'Novela icónica del realismo mágico de Gabriel Garc', 'https://www.mobile.libreriauca.com/system/balloom/product_assets/attachments/000/019/892/normal/LIB-9788497592208.jpg?1737264597'),
(2, 'El principito', 'Fábula poética y filosófica de Antoine de Saint-Ex', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9ZKGxViIXKR08Tq1705ttNvQtFD3bil5LpQ&s'),
(3, '1984', 'Distopía sobre el control social y la vigilancia d', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSb7LeAcvvAmA-QrGQLGHaVsS1bI_jGrWeDKA&s'),
(4, 'Don Quijote de la Mancha', 'Primera novela moderna de Miguel de Cervantes', 'https://m.media-amazon.com/images/I/71NvoKMsh1L._AC_UF1000,1000_QL80_.jpg'),
(5, 'Orgullo y prejuicio', 'Novela romántica y social de Jane Austen', 'https://m.media-amazon.com/images/M/MV5BZjBlODgwZWEtODcxMi00OTY5LWEyOTItODE2MDBjZjU0ZDU3XkEyXkFqcGc@._V1_.jpg'),
(6, 'El amor en los tiempos del cólera', 'Historia de amor eterno de Gabriel García Márquez', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e9/El_amor_en_los_tiempos_del_c%C3%B3lera.png/250px-El_amor_en_los_tiempos_del_c%C3%B3lera.png'),
(7, 'La sombra del viento', 'Misterio literario en la Barcelona de posguerra de', 'https://m.media-amazon.com/images/I/61o82mJDFYL._AC_UF1000,1000_QL80_.jpg'),
(8, 'Cien años de soledad', 'Novela icónica del realismo mágico de Gabriel Garc', 'https://covers.openlibrary.org/b/id/8225261-L.jpg'),
(9, 'El principito', 'Fábula poética y filosófica de Antoine de Saint-Ex', 'https://covers.openlibrary.org/b/id/8231856-L.jpg'),
(10, '1984', 'Distopía sobre el control social y la vigilancia d', 'https://covers.openlibrary.org/b/id/7222246-L.jpg'),
(11, 'Don Quijote de la Mancha', 'Primera novela moderna de Miguel de Cervantes', 'https://covers.openlibrary.org/b/id/8231996-L.jpg'),
(12, 'Orgullo y prejuicio', 'Novela romántica y social de Jane Austen', 'https://covers.openlibrary.org/b/id/8091016-L.jpg'),
(13, 'El amor en los tiempos del cólera', 'Historia de amor eterno de Gabriel García Márquez', 'https://covers.openlibrary.org/b/id/8235081-L.jpg'),
(14, 'La sombra del viento', 'Misterio literario en la Barcelona de posguerra de', 'https://covers.openlibrary.org/b/id/8319256-L.jpg'),
(15, 'Fahrenheit 451', 'Crítica a la censura y la quema de libros de Ray B', 'https://covers.openlibrary.org/b/id/9251996-L.jpg'),
(16, 'El nombre de la rosa', 'Misterio medieval y semiótica de Umberto Eco', 'https://covers.openlibrary.org/b/id/8234140-L.jpg'),
(17, 'Harry Potter y la piedra filosofal', 'Primera aventura del joven mago de J.K. Rowling', 'https://covers.openlibrary.org/b/id/7984916-L.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasenia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasenia`) VALUES
(1, 'Juan Leiva', 'juan.leiva@gmail.com', 'opjwg+nwr+nirwniwip'),
(23, 'Rudy Mauricio', 'rudy@gmail.com', '$2y$10$UicNt/nHmnDNSain5pMIsO30AF7yP9Sj62bwMnlG6SI6nsVSXjC9G');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_libros`
--

CREATE TABLE `usuario_libros` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `libro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_libros`
--

INSERT INTO `usuario_libros` (`id`, `usuario_id`, `libro_id`) VALUES
(1, 1, 1),
(6, 1, 7),
(7, 1, 5),
(8, 23, 10),
(9, 23, 17);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `usuario_libros`
--
ALTER TABLE `usuario_libros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `libro_id` (`libro_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuario_libros`
--
ALTER TABLE `usuario_libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario_libros`
--
ALTER TABLE `usuario_libros`
  ADD CONSTRAINT `usuario_libros_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `usuario_libros_ibfk_2` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

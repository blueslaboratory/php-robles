-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 02-02-2022 a las 16:45:48
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `symfony_master`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `priority` varchar(20) DEFAULT NULL,
  `hours` int(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_task_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `title`, `content`, `priority`, `hours`, `created_at`) VALUES
(1, 1, 'Tarea 1', 'Contenido de prueba 1', 'high', 40, '2022-01-28 18:09:51'),
(2, 1, 'Tarea 2', 'Contenido de prueba 2', 'low', 20, '2022-01-28 18:09:51'),
(3, 2, 'Tarea 3', 'Contenido de prueba 3', 'medium', 10, '2022-01-28 18:09:51'),
(4, 3, 'Tarea 4', 'Contenido de prueba 4', 'high', 50, '2022-01-28 18:09:51'),
(5, 33, 'Maquetar', 'Maquetar pagina de Symfony', 'high', 15, '2022-01-29 16:00:14'),
(8, 33, 'Titulo largo resumido', 'Hola, eu sou un titulo muy muy muy largo con mucha informacion porque no se sintetizar textos mas cortos', 'high', 30, '2022-01-29 17:04:02'),
(9, 1, 'Tarea 1', 'Contenido de prueba 1', 'high', 40, '2022-01-31 16:04:25'),
(10, 1, 'Tarea 2', 'Contenido de prueba 2', 'low', 20, '2022-01-31 16:04:25'),
(11, 2, 'Tarea 3', 'Contenido de prueba 3', 'medium', 10, '2022-01-31 16:04:25'),
(12, 3, 'Tarea 4', 'Contenido de prueba 4', 'high', 50, '2022-01-31 16:04:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(200) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `surname`, `email`, `password`, `created_at`) VALUES
(1, 'ROLE_USER', 'Blue', 'Lab', 'blue@lab.com', '$2y$04$M6x/OdfpUKSRLHpmUuM.rOkycIfsAG6pJYNjPLnv4m37XOtg8nKse', '2022-01-29 16:58:29'),
(2, 'ROLE_USER', 'Red', 'Lab', 'red@lab.com', '$2y$04$qqx8s2nC551S1fHar3s4sOGRvNksUI8z9//dmerSvNyZvpAOkUsHu', '2022-01-29 17:00:06'),
(3, 'ROLE_USER', 'Green', 'Lab', 'green@lab.com', '$2y$04$FokC6m2T3oaxzVBUahHqYesdo4PtWBXGk32.4epp1QdgHpqzEKEFO', '2022-01-29 17:00:21'),
(4, 'ROLE_USER', 'Yellow', 'Lab', 'yellow@lab.com', '1234', '2022-01-28 18:05:39'),
(26, 'ROLE_USER', 'Pepe', 'Rodolfo', 'pepito@gmail.com', '$2y$04$f2XlyFk/H080Q6Xo.FamBut1ii8A4/INTpRBonqWuu2/2zvURCBpq', '2022-01-28 19:39:01'),
(27, 'ROLE_USER', 'Miguel', 'Angelo', 'mangelo@gmail.com', '$2y$04$h31uoOZFWL6RJRDlc1GD4O7uVwQqlmyUx4j9.rczAIr0NVa/s.r5u', '2022-01-28 19:41:52'),
(30, 'ROLE_USER', 'Joanna', 'Arco', 'joanna@gmail.com', '$2y$04$ryHL.0o8PsKEveBsRnw12ezi/Sdsz/wadYxDxK/BZqhdDlm5JOwKO', '2022-01-28 19:43:47'),
(31, 'ROLE_USER', 'Pedro', 'Alfonso', 'pete@gmail.com', '$2y$04$5LNcrn7TqIXaRPyGsSCQh.oS/Nwc75lmIJd2om1aErHvlaS2QwTpy', '2022-01-28 19:44:25'),
(32, 'ROLE_USER', 'Juan', 'Antonio', 'ja@gmail.com', '$2y$04$e2DOv1u9GlPz00qDAf9raOEGtuXOOHIiIOLy8cX/389tYMaN/6LUi', '2022-01-28 19:44:53'),
(33, 'ROLE_USER', 'Paco', 'Paco', 'paco@paco.com', '$2y$04$6Vn6bmSVCDs.igNFReB2G.5bw9i91DnKz01AXonrctBo8bUJPvMJi', '2022-01-28 19:47:10'),
(34, 'ROLE_USER', 'Mario', 'Vazquez', 'mario@mario.com', '$2y$04$Qh9ZztuByWIkUhZ/Mnu37eZWaa1YQ7VpP1vq8wANjKYyn5SWuq4Oq', '2022-01-28 20:17:21'),
(42, 'ROLE_USER', 'Ronny', 'Ronny', 'ronny@ronny.com', '$2y$04$LriXwUjtl/1DxIriErNwfOodSA/n3N76UlCDxl5gNd4ji.9t/v97K', '2022-01-31 17:07:42'),
(43, 'ROLE_USER', 'Fernando', 'Balue', 'balue@balue.com', '$2y$04$AK7g095HYyMNHnwH5nDhDuibxj7E6il6Z33S661HOV5BI0Cjsw6Ri', '2022-01-31 22:28:59');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_task_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2023 a las 06:28:13
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `atxaga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contract`
--

CREATE TABLE `contract` (
  `id` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `person_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `position_id` tinyint(2) UNSIGNED NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `fixedsalary` decimal(7,2) UNSIGNED NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Stores the contracts.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `country`
--

CREATE TABLE `country` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `abbreviation` char(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Stores the countries.';

--
-- Volcado de datos para la tabla `country`
--

INSERT INTO `country` (`id`, `name`, `abbreviation`) VALUES
(1, 'United States', 'US'),
(2, 'Puerto Rico', 'PR'),
(3, 'Perú', 'PE'),
(4, 'Colombia', 'CO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `person`
--

CREATE TABLE `person` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `genre` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'F',
  `country_id` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Stores the persons.';

--
-- Volcado de datos para la tabla `person`
--

INSERT INTO `person` (`id`, `lastname`, `firstname`, `birthdate`, `genre`, `country_id`, `created_at`, `active`) VALUES
('2dc8c5e4-4ef3-42c7-af1f-9d04590037b1', 'McArthur', 'Jonathan', '1995-04-16', 'M', 1, '2023-04-17 02:15:05', 1),
('415ad0b2-0e58-4fa9-95ac-155b0bc62325', 'Santisteban', 'Alexandra', '1994-10-02', 'F', 2, '2023-04-17 02:25:17', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `position`
--

CREATE TABLE `position` (
  `id` tinyint(2) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `basichourlypay` decimal(5,2) UNSIGNED NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Stores the positions.';

--
-- Volcado de datos para la tabla `position`
--

INSERT INTO `position` (`id`, `name`, `basichourlypay`, `active`) VALUES
(1, 'Trainee', '10.00', 1),
(2, 'Junior Software Engineer', '15.00', 1),
(3, 'Semi Senior Software Engineer', '25.00', 1),
(4, 'Senior Software Engineer', '35.00', 1),
(5, 'Junior Data Analyst', '15.00', 1),
(6, 'Junior Data Engineer', '18.00', 1),
(7, 'Semi Senior Data Analyst', '25.00', 1),
(8, 'Semi Senior Data Engineer', '28.00', 1),
(9, 'Senior Data Analyst', '35.00', 1),
(10, 'Senior Data Engineer', '38.00', 1),
(11, 'Software Architect', '45.00', 1),
(12, 'Data Architect', '45.00', 1),
(13, 'Data Scientist', '45.00', 1),
(14, 'Project Manager', '65.00', 1),
(15, 'CTO', '100.00', 1),
(16, 'Principal', '150.00', 1),
(17, 'External Consultant', '20.00', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_contract_person` (`person_id`),
  ADD KEY `FK_contract_position` (`position_id`);

--
-- Indices de la tabla `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_person_country` (`country_id`);

--
-- Indices de la tabla `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `country`
--
ALTER TABLE `country`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `position`
--
ALTER TABLE `position`
  MODIFY `id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `FK_contract_person` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `FK_contract_position` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`);

--
-- Filtros para la tabla `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `FK_person_country` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

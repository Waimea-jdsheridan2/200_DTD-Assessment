-- Adminer 4.8.4 MySQL 8.0.39-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `make` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `colour` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `year` bigint NOT NULL,
  `hmo` int NOT NULL,
  `kilometers` bigint NOT NULL,
  `condition` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `cars` (`id`, `make`, `model`, `colour`, `year`, `hmo`, `kilometers`, `condition`) VALUES
(5,	'Subaru',	'WRX',	'Blue',	2008,	1,	10000,	'Clean'),
(8,	'Nissan',	'Skyline R34',	'Blue',	1999,	1,	10000,	'Clean'),
(9,	'Nissan',	'Cefiro A31',	'Black',	1993,	1,	10000,	'Clean'),
(11,	'Mitsubishi',	'Lancer ',	'White',	2003,	1,	10000,	'Good'),
(12,	'Nissan',	'350Z',	'White',	2003,	2,	20000,	'Good'),
(13,	'Mitsubishi',	'Evolution IX',	'Yellow',	2005,	1,	20000,	'Good');

DROP TABLE IF EXISTS `sightings`;
CREATE TABLE `sightings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `car_id` int NOT NULL,
  `date` datetime NOT NULL,
  `location` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `car_id` (`car_id`),
  CONSTRAINT `sightings_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `sightings` (`id`, `car_id`, `date`, `location`) VALUES
(31,	5,	'2024-06-05 00:00:00',	'Auckland'),
(33,	8,	'2012-05-04 00:00:00',	'Motueka'),
(34,	11,	'2024-06-19 00:00:00',	'Nelson'),
(36,	12,	'2024-08-19 00:00:00',	'Richmond'),
(37,	13,	'2024-08-08 00:00:00',	'Wellington');

-- 2024-09-01 22:51:25

-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.31 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for chapintec
DROP DATABASE IF EXISTS `chapintec`;
CREATE DATABASE IF NOT EXISTS `chapintec` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `chapintec`;

-- Dumping structure for table chapintec.about_us
DROP TABLE IF EXISTS `about_us`;
CREATE TABLE IF NOT EXISTS `about_us` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extracto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extracto_team` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.about_us: 0 rows
DELETE FROM `about_us`;
/*!40000 ALTER TABLE `about_us` DISABLE KEYS */;
/*!40000 ALTER TABLE `about_us` ENABLE KEYS */;

-- Dumping structure for table chapintec.brands
DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table chapintec.brands: ~22 rows (approximately)
DELETE FROM `brands`;
INSERT INTO `brands` (`id`, `name`, `active`) VALUES
	(23, 'Cepsa', 1),
	(24, 'AD', 1),
	(25, 'Citroen', 1),
	(26, 'Fiat', 1),
	(27, 'Hyundai', 1),
	(28, 'Isuzu', 1),
	(30, 'Volkswagen', 1),
	(31, 'Nissan', 1),
	(32, 'Kia', 1),
	(37, 'Peugeot', 1),
	(38, 'Mercedes-Benz', 1),
	(39, 'Renault', 1),
	(40, 'Skoda', 1),
	(41, 'Opel', 1),
	(42, 'Yamaha', 1),
	(43, 'Piaggio', 1),
	(44, 'Rieju', 1),
	(45, 'SYM', 1),
	(46, 'KYMCO', 1),
	(47, 'DEALIM', 1),
	(48, 'B2000', 1),
	(49, 'Moura', 1);

-- Dumping structure for table chapintec.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.categories: ~67 rows (approximately)
DELETE FROM `categories`;
INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`, `views`) VALUES
	(1, 'Motor y Componentes', NULL, 'motor-y-componentes', 1),
	(2, 'Transmisión y Embrague', NULL, 'transmision-y-embrague', 0),
	(3, 'Sistema de Escape', NULL, 'sistema-de-escape', 0),
	(4, 'Suspensión y Dirección', NULL, 'suspension-y-direccion', 0),
	(5, 'Frenos y Componentes', NULL, 'frenos-y-componentes', 0),
	(6, 'Electrónica y Encendido', NULL, 'electronica-y-encendido', 0),
	(7, 'Iluminación y Accesorios', NULL, 'iluminacion-y-accesorios', 0),
	(8, 'Interior y Confort', NULL, 'interior-y-confort', 0),
	(9, 'Exterior y Estilo', NULL, 'exterior-y-estilo', 0),
	(10, 'Ruedas y Neumáticos', NULL, 'ruedas-y-neumaticos', 0),
	(11, 'Motores completos', 1, 'motores-completos', 1),
	(12, 'Bloques de motor', 1, 'bloques-de-motor', 0),
	(13, 'Cigüeñales', 1, 'ciguenales', 0),
	(16, 'Bombas de aceite y agua', 1, 'bombas-de-aceite-y-agua', 0),
	(17, 'Kit de distribución', 1, 'kit-de-distribución', 0),
	(18, 'Transmisiones automáticas', 2, 'transmisiones-automaticas', 0),
	(19, 'Transmisiones manuales', 2, 'transmisiones-manuales', 0),
	(20, 'Embragues y componentes', 2, 'embragues-y-componentes', 0),
	(21, 'Convertidores de par', 2, 'convertidores-de-par', 0),
	(22, 'Kit de embrague', 2, 'kit-de-embrage', 0),
	(23, 'Silenciadores', 3, 'silenciadores', 0),
	(24, 'Tubos de escape', 3, 'tubos-de-escape', 0),
	(25, 'Catalizadores', 3, 'catalizadores', 0),
	(26, 'Colectores de escape', 3, 'colectores-de-escape', 0),
	(27, 'Kits de escape deportivo', 3, 'kits-de-escape-deportivo', 0),
	(28, 'Amortiguadores', 4, 'amortiguadores', 0),
	(29, 'Muelles', 4, 'muelles', 0),
	(30, 'Barras estabilizadoras', 4, 'barras-estabilizadoras', 0),
	(31, 'Brazos de control', 4, 'brazos-de-control', 0),
	(32, 'Direcciones asistidas', 4, 'direcciones-asistidas', 0),
	(33, 'Kits de elevación o rebaje', 4, 'kits-de-elevacion-o-rebaje', 0),
	(34, 'Discos y pastillas de freno', 5, 'discos-y-pastillas-de-freno', 0),
	(35, 'Calibradores', 5, 'calibradores', 0),
	(36, 'Cilindros maestros', 5, 'cilindros-maestros', 0),
	(37, 'Mangueras de freno', 5, 'mangueras-de-freno', 0),
	(38, 'Kits de frenos de alto rendimiento', 5, 'kits-de-frenos-de-alto-rendimiento', 0),
	(39, 'Baterías', 6, 'baterias', 0),
	(40, 'Alternadores', 6, 'alternadores', 0),
	(41, 'Arrancadores', 6, 'arrancadores', 0),
	(42, 'Bobinas de encendido', 6, 'bobinas-de-encendido', 0),
	(43, 'Sensores de oxígeno', 6, 'sensores-de-oxigeno', 0),
	(44, 'Sistemas de encendido electrónico', 6, 'sistemas-de-encendido-electronico', 0),
	(45, 'Faros delanteros', 7, 'faros-delanteros', 0),
	(46, 'Luces traseras', 7, 'luces-traseras', 0),
	(47, 'Luces LED', 7, 'luces-led', 0),
	(48, 'Barras de luz LED', 7, 'barras-de-luz-led', 0),
	(49, 'Kits de conversión HID', 7, 'kits-de-conversion-hid', 0),
	(50, 'Accesorios de iluminación interior y exterior', 7, 'accesorios-de-iluminacion-interior-y-exterior', 0),
	(51, 'Asientos', 8, 'asientos-deportivos', 0),
	(52, 'Volantes', 8, 'volantes-deportivos', 0),
	(53, 'Tapicería', 8, 'tapiceria-personalizada', 0),
	(54, 'Sistemas de sonido y multimedia', 8, 'sistemas-de-sonido-y-multimedia', 0),
	(55, 'Accesorios', 8, 'accesorios-de-climatizacion', 0),
	(56, 'Parachoques delanteros y traseros', 9, 'parachoques-delanteros-y-traseros', 0),
	(57, 'Faldones laterales', 9, 'faldones-laterales', 0),
	(58, 'Alerones y spoilers', 9, 'alerones-y-spoilers', 0),
	(59, 'Parrillas', 9, 'parrillas', 0),
	(60, 'Espejos retrovisores', 9, 'espejos-retrovisores', 0),
	(61, 'Kits de carrocería', 9, 'kits-de-carroceria', 0),
	(62, 'Llantas de aleación', 10, 'llantas-de-aleacion', 0),
	(63, 'Neumáticos de alto rendimiento', 10, 'neumaticos-de-alto-rendimiento', 0),
	(64, 'Accesorios para llantas', 10, 'accesorios-para-llantas', 0),
	(65, 'Cadenas de nieve', 10, 'cadenas-de-nieve', 0),
	(66, 'Tornillos y tuercas de seguridad', 10, 'tornillos-y-tuercas-de-seguridad', 0),
	(67, 'Aceites y Luricantes', NULL, 'aceites-y-luricantes', 2),
	(68, 'Freno de Mano', 5, '1', 0),
	(69, 'Filtro de Combustible y Aceite', 1, '1', 0);

-- Dumping structure for table chapintec.characteristics
DROP TABLE IF EXISTS `characteristics`;
CREATE TABLE IF NOT EXISTS `characteristics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `characteristics_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.characteristics: ~10 rows (approximately)
DELETE FROM `characteristics`;
INSERT INTO `characteristics` (`id`, `name`) VALUES
	(21, 'Amperaje'),
	(11, 'Cantidad'),
	(16, 'Juego'),
	(20, 'Longitud'),
	(14, 'Posición'),
	(17, 'Tamaño RIN'),
	(19, 'Tamaño Rin Juego'),
	(15, 'Tipo'),
	(18, 'Tipo Bombillo'),
	(12, 'Viscosidad');

-- Dumping structure for table chapintec.characteristic_value
DROP TABLE IF EXISTS `characteristic_value`;
CREATE TABLE IF NOT EXISTS `characteristic_value` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `characteristic_id` bigint unsigned NOT NULL,
  `value_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `characteristic_value_characteristic_id_foreign` (`characteristic_id`),
  KEY `characteristic_value_value_id_foreign` (`value_id`),
  CONSTRAINT `characteristic_value_characteristic_id_foreign` FOREIGN KEY (`characteristic_id`) REFERENCES `characteristics` (`id`) ON DELETE CASCADE,
  CONSTRAINT `characteristic_value_value_id_foreign` FOREIGN KEY (`value_id`) REFERENCES `values` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.characteristic_value: ~29 rows (approximately)
DELETE FROM `characteristic_value`;
INSERT INTO `characteristic_value` (`id`, `characteristic_id`, `value_id`) VALUES
	(28, 11, 25),
	(29, 11, 26),
	(30, 11, 27),
	(31, 12, 28),
	(32, 12, 29),
	(43, 12, 40),
	(44, 14, 41),
	(45, 14, 42),
	(46, 15, 43),
	(47, 15, 44),
	(48, 16, 45),
	(49, 16, 46),
	(50, 17, 47),
	(51, 17, 48),
	(52, 17, 49),
	(53, 17, 50),
	(54, 18, 51),
	(55, 18, 52),
	(56, 18, 53),
	(57, 18, 54),
	(58, 19, 55),
	(59, 19, 56),
	(60, 19, 57),
	(61, 19, 58),
	(62, 19, 59),
	(63, 20, 60),
	(64, 20, 61),
	(65, 21, 62),
	(66, 21, 63);

-- Dumping structure for table chapintec.characteristic_variation
DROP TABLE IF EXISTS `characteristic_variation`;
CREATE TABLE IF NOT EXISTS `characteristic_variation` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `variation_id` bigint unsigned NOT NULL,
  `value_id` bigint unsigned NOT NULL,
  `characteristic_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `characteristic_variation_variation_id_foreign` (`variation_id`),
  KEY `characteristic_variation_value_id_foreign` (`value_id`),
  KEY `characteristic_variation_characteristic_id_foreign` (`characteristic_id`),
  CONSTRAINT `characteristic_variation_characteristic_id_foreign` FOREIGN KEY (`characteristic_id`) REFERENCES `characteristics` (`id`),
  CONSTRAINT `characteristic_variation_value_id_foreign` FOREIGN KEY (`value_id`) REFERENCES `values` (`id`),
  CONSTRAINT `characteristic_variation_variation_id_foreign` FOREIGN KEY (`variation_id`) REFERENCES `variations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.characteristic_variation: ~92 rows (approximately)
DELETE FROM `characteristic_variation`;
INSERT INTO `characteristic_variation` (`id`, `variation_id`, `value_id`, `characteristic_id`, `created_at`, `updated_at`) VALUES
	(75, 62, 25, 11, '2024-02-14 18:59:47', '2024-02-14 18:59:47'),
	(76, 62, 28, 12, '2024-02-14 18:59:47', '2024-02-14 18:59:47'),
	(77, 63, 25, 11, '2024-02-14 18:59:47', '2024-02-14 18:59:47'),
	(78, 63, 29, 12, '2024-02-14 18:59:47', '2024-02-14 18:59:47'),
	(79, 64, 26, 11, '2024-02-14 18:59:47', '2024-02-14 18:59:47'),
	(80, 64, 28, 12, '2024-02-14 18:59:47', '2024-02-14 18:59:47'),
	(81, 66, 27, 11, '2024-02-14 19:03:47', '2024-02-14 19:03:47'),
	(92, 103, 41, 14, '2024-02-15 15:27:17', '2024-02-15 15:27:17'),
	(93, 104, 42, 14, '2024-02-15 15:27:17', '2024-02-15 15:27:17'),
	(94, 105, 41, 14, '2024-02-15 15:27:43', '2024-02-15 15:27:43'),
	(95, 106, 42, 14, '2024-02-15 15:27:43', '2024-02-15 15:27:43'),
	(96, 107, 41, 14, '2024-02-15 15:28:01', '2024-02-15 15:28:01'),
	(97, 108, 42, 14, '2024-02-15 15:28:01', '2024-02-15 15:28:01'),
	(98, 109, 41, 14, '2024-02-15 15:28:16', '2024-02-15 15:28:16'),
	(99, 110, 42, 14, '2024-02-15 15:28:16', '2024-02-15 15:28:16'),
	(100, 111, 41, 14, '2024-02-15 15:28:29', '2024-02-15 15:28:29'),
	(101, 112, 42, 14, '2024-02-15 15:28:29', '2024-02-15 15:28:29'),
	(102, 113, 41, 14, '2024-02-15 15:28:47', '2024-02-15 15:28:47'),
	(103, 114, 42, 14, '2024-02-15 15:28:47', '2024-02-15 15:28:47'),
	(104, 115, 41, 14, '2024-02-15 15:29:03', '2024-02-15 15:29:03'),
	(105, 116, 42, 14, '2024-02-15 15:29:03', '2024-02-15 15:29:03'),
	(106, 123, 41, 14, '2024-02-15 15:45:10', '2024-02-15 15:45:10'),
	(107, 124, 42, 14, '2024-02-15 15:45:10', '2024-02-15 15:45:10'),
	(108, 125, 41, 14, '2024-02-15 15:45:18', '2024-02-15 15:45:18'),
	(109, 126, 42, 14, '2024-02-15 15:45:18', '2024-02-15 15:45:18'),
	(110, 127, 41, 14, '2024-02-15 15:45:28', '2024-02-15 15:45:28'),
	(111, 128, 42, 14, '2024-02-15 15:45:28', '2024-02-15 15:45:28'),
	(112, 129, 41, 14, '2024-02-15 15:45:37', '2024-02-15 15:45:37'),
	(113, 130, 42, 14, '2024-02-15 15:45:37', '2024-02-15 15:45:37'),
	(114, 131, 41, 14, '2024-02-15 15:45:46', '2024-02-15 15:45:46'),
	(115, 132, 42, 14, '2024-02-15 15:45:46', '2024-02-15 15:45:46'),
	(116, 134, 43, 15, '2024-02-15 15:49:15', '2024-02-15 15:49:15'),
	(117, 135, 44, 15, '2024-02-15 15:49:15', '2024-02-15 15:49:15'),
	(118, 142, 41, 14, '2024-02-15 16:32:22', '2024-02-15 16:32:22'),
	(119, 143, 42, 14, '2024-02-15 16:32:23', '2024-02-15 16:32:23'),
	(120, 144, 41, 14, '2024-02-15 16:32:31', '2024-02-15 16:32:31'),
	(121, 145, 42, 14, '2024-02-15 16:32:31', '2024-02-15 16:32:31'),
	(122, 146, 41, 14, '2024-02-15 16:32:47', '2024-02-15 16:32:47'),
	(123, 147, 42, 14, '2024-02-15 16:32:47', '2024-02-15 16:32:47'),
	(124, 148, 41, 14, '2024-02-15 16:32:59', '2024-02-15 16:32:59'),
	(125, 149, 42, 14, '2024-02-15 16:32:59', '2024-02-15 16:32:59'),
	(126, 150, 41, 14, '2024-02-15 16:33:10', '2024-02-15 16:33:10'),
	(127, 151, 42, 14, '2024-02-15 16:33:10', '2024-02-15 16:33:10'),
	(128, 154, 45, 16, '2024-02-15 16:39:05', '2024-02-15 16:39:05'),
	(129, 155, 46, 16, '2024-02-15 16:39:05', '2024-02-15 16:39:05'),
	(130, 164, 47, 17, '2024-02-15 17:10:10', '2024-02-15 17:10:10'),
	(131, 165, 48, 17, '2024-02-15 17:10:10', '2024-02-15 17:10:10'),
	(132, 166, 49, 17, '2024-02-15 17:10:10', '2024-02-15 17:10:10'),
	(133, 167, 50, 17, '2024-02-15 17:10:10', '2024-02-15 17:10:10'),
	(134, 168, 47, 17, '2024-02-15 17:10:28', '2024-02-15 17:10:28'),
	(135, 169, 48, 17, '2024-02-15 17:10:28', '2024-02-15 17:10:28'),
	(136, 170, 49, 17, '2024-02-15 17:10:28', '2024-02-15 17:10:28'),
	(137, 171, 50, 17, '2024-02-15 17:10:28', '2024-02-15 17:10:28'),
	(138, 172, 47, 17, '2024-02-15 17:10:38', '2024-02-15 17:10:38'),
	(139, 173, 48, 17, '2024-02-15 17:10:38', '2024-02-15 17:10:38'),
	(140, 174, 49, 17, '2024-02-15 17:10:38', '2024-02-15 17:10:38'),
	(141, 175, 50, 17, '2024-02-15 17:10:38', '2024-02-15 17:10:38'),
	(142, 176, 47, 17, '2024-02-15 17:10:49', '2024-02-15 17:10:49'),
	(143, 177, 48, 17, '2024-02-15 17:10:49', '2024-02-15 17:10:49'),
	(144, 178, 49, 17, '2024-02-15 17:10:49', '2024-02-15 17:10:49'),
	(145, 179, 50, 17, '2024-02-15 17:10:49', '2024-02-15 17:10:49'),
	(146, 180, 47, 17, '2024-02-15 17:11:00', '2024-02-15 17:11:00'),
	(147, 181, 48, 17, '2024-02-15 17:11:00', '2024-02-15 17:11:00'),
	(148, 182, 49, 17, '2024-02-15 17:11:00', '2024-02-15 17:11:00'),
	(149, 183, 50, 17, '2024-02-15 17:11:00', '2024-02-15 17:11:00'),
	(150, 184, 47, 17, '2024-02-15 17:11:15', '2024-02-15 17:11:15'),
	(151, 185, 48, 17, '2024-02-15 17:11:15', '2024-02-15 17:11:15'),
	(152, 186, 49, 17, '2024-02-15 17:11:15', '2024-02-15 17:11:15'),
	(153, 187, 50, 17, '2024-02-15 17:11:15', '2024-02-15 17:11:15'),
	(154, 188, 47, 17, '2024-02-15 17:11:31', '2024-02-15 17:11:31'),
	(155, 189, 48, 17, '2024-02-15 17:11:31', '2024-02-15 17:11:31'),
	(156, 190, 49, 17, '2024-02-15 17:11:31', '2024-02-15 17:11:31'),
	(157, 191, 50, 17, '2024-02-15 17:11:31', '2024-02-15 17:11:31'),
	(158, 192, 47, 17, '2024-02-15 17:11:47', '2024-02-15 17:11:47'),
	(159, 193, 48, 17, '2024-02-15 17:11:47', '2024-02-15 17:11:47'),
	(160, 194, 49, 17, '2024-02-15 17:11:47', '2024-02-15 17:11:47'),
	(161, 195, 50, 17, '2024-02-15 17:11:47', '2024-02-15 17:11:47'),
	(162, 196, 51, 18, '2024-02-15 17:44:31', '2024-02-15 17:44:31'),
	(163, 197, 52, 18, '2024-02-15 17:44:31', '2024-02-15 17:44:31'),
	(164, 198, 53, 18, '2024-02-15 17:44:31', '2024-02-15 17:44:31'),
	(165, 199, 54, 18, '2024-02-15 17:44:31', '2024-02-15 17:44:31'),
	(166, 213, 55, 19, '2024-02-15 20:16:58', '2024-02-15 20:16:58'),
	(167, 214, 56, 19, '2024-02-15 20:16:58', '2024-02-15 20:16:58'),
	(168, 215, 57, 19, '2024-02-15 20:16:58', '2024-02-15 20:16:58'),
	(169, 216, 58, 19, '2024-02-15 20:16:58', '2024-02-15 20:16:58'),
	(170, 217, 59, 19, '2024-02-15 20:16:58', '2024-02-15 20:16:58'),
	(171, 219, 60, 20, '2024-02-15 20:24:54', '2024-02-15 20:24:54'),
	(172, 220, 61, 20, '2024-02-15 20:24:54', '2024-02-15 20:24:54'),
	(173, 224, 62, 21, '2024-02-15 20:43:50', '2024-02-15 20:43:50'),
	(174, 225, 63, 21, '2024-02-15 20:43:50', '2024-02-15 20:43:50'),
	(175, 227, 25, 11, '2024-02-15 20:47:02', '2024-02-15 20:47:02'),
	(176, 228, 26, 11, '2024-02-15 20:47:02', '2024-02-15 20:47:02');

-- Dumping structure for table chapintec.client_contact_informations
DROP TABLE IF EXISTS `client_contact_informations`;
CREATE TABLE IF NOT EXISTS `client_contact_informations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_phone` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reading` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.client_contact_informations: ~0 rows (approximately)
DELETE FROM `client_contact_informations`;

-- Dumping structure for table chapintec.contacts_information
DROP TABLE IF EXISTS `contacts_information`;
CREATE TABLE IF NOT EXISTS `contacts_information` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_contact` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_contacts` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_contacts` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_facebook` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_instagram` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_twitter` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.contacts_information: ~0 rows (approximately)
DELETE FROM `contacts_information`;

-- Dumping structure for table chapintec.currencies
DROP TABLE IF EXISTS `currencies`;
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `decimals` tinyint NOT NULL DEFAULT '2',
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `virtual` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `currencies_code_unique` (`code`),
  UNIQUE KEY `currencies_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.currencies: ~3 rows (approximately)
DELETE FROM `currencies`;
INSERT INTO `currencies` (`id`, `code`, `name`, `symbol`, `decimals`, `is_default`, `active`, `virtual`) VALUES
	(1, 'USD', 'Dolar estadounidense', '$', 2, 1, 1, 0),
	(2, 'MLC', 'Moneda Libre Convertible', '$', 2, 0, 1, 1),
	(3, 'CUP', 'Peso Cubano', '$', 2, 0, 1, 0);

-- Dumping structure for table chapintec.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.failed_jobs: 0 rows
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table chapintec.images
DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_main` tinyint(1) NOT NULL DEFAULT '0',
  `imageable_id` int NOT NULL,
  `imageable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.images: 1 rows
DELETE FROM `images`;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `url`, `is_main`, `imageable_id`, `imageable_type`, `description`, `active`) VALUES
	(17, 'storage/categories/_1707772705.jpg', 0, 71, 'App\\Models\\Category', NULL, 1);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping structure for table chapintec.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.migrations: 18 rows
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2014_10_12_100000_create_password_resets_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2023_12_04_162649_create_categories_table', 1),
	(7, '2023_12_04_172127_create_oferts_table', 1),
	(8, '2023_12_04_173050_create_contacts_information_table', 1),
	(9, '2023_12_04_173459_create_client_contact_informations_table', 1),
	(10, '2023_12_04_182249_create_products_table', 1),
	(11, '2023_12_04_187058_create_images_table', 1),
	(12, '2024_01_03_151445_create_about_us_table', 1),
	(13, '2024_01_04_133715_create_staff_table', 1),
	(14, '2024_01_29_191230_create_variations_table', 1),
	(15, '2024_01_29_192745_create_characteristics_table', 1),
	(16, '2024_01_29_192843_create_values_table', 1),
	(17, '2024_01_29_192915_create_characteristic_value_table', 1),
	(18, '2024_01_29_192947_create_characteristic_variation_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table chapintec.models
DROP TABLE IF EXISTS `models`;
CREATE TABLE IF NOT EXISTS `models` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `brand_id` bigint NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `models_fk1` (`brand_id`),
  CONSTRAINT `models_fk1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table chapintec.models: ~42 rows (approximately)
DELETE FROM `models`;
INSERT INTO `models` (`id`, `name`, `active`, `brand_id`) VALUES
	(18, 'Arga-Litio-EP', 1, 23),
	(19, 'Genuine', 1, 23),
	(20, 'ATF-70', 1, 23),
	(22, 'HHM-Hidraulico', 1, 24),
	(23, 'Dex-ATF', 1, 24),
	(24, 'MHP-Transmiciones', 1, 23),
	(25, 'Transmiciones-EP', 1, 24),
	(27, 'Fiat-Brava(182)', 1, 26),
	(28, 'Fiat-Scudo(222)', 1, 26),
	(29, 'Lantra-Berlina(RD)', 1, 27),
	(30, 'Matrix(FC)', 1, 27),
	(35, 'Jumper', 1, 25),
	(36, 'Coupe(J2)', 1, 27),
	(40, 'Almera(N15)', 1, 31),
	(41, 'C15E-Familiar', 1, 25),
	(42, 'Grand-I0', 1, 27),
	(43, 'Accent(LC)', 1, 27),
	(44, 'Picanto', 1, 32),
	(46, 'Troper', 1, 28),
	(50, 'Tempra-Berlina(159)', 1, 26),
	(52, 'Sonata', 1, 27),
	(53, 'ZX-Tonic', 1, 25),
	(86, '407', 1, 37),
	(87, '207', 1, 37),
	(88, '106(S1)Kid', 1, 37),
	(91, 'Polo(867/871/873)-Fox-Berlina', 1, 30),
	(92, 'MB-100-D', 1, 38),
	(94, '406-Coupe', 1, 37),
	(95, '306-Berlina', 1, 37),
	(96, '309(1986-0)', 1, 37),
	(97, '406-Berlina', 1, 37),
	(98, '19-porton-Trasero', 1, 39),
	(99, 'Passat-Berlina', 1, 30),
	(100, 'Polo-Berlina', 1, 30),
	(101, 'Golf-II(191/193)GTD', 1, 30),
	(102, 'Transporter-T4', 1, 30),
	(103, 'Fabia(6Y2/6Y3)', 1, 40),
	(104, 'Astra-H-Berlina', 1, 41),
	(105, 'Punto-Berlina', 1, 26),
	(106, 'Saxo', 1, 25),
	(107, 'Xsara-Coupe-1.6LX', 1, 25),
	(108, 'Hyundai-Kia', 1, 27);

-- Dumping structure for table chapintec.oferts
DROP TABLE IF EXISTS `oferts`;
CREATE TABLE IF NOT EXISTS `oferts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double(8,2) NOT NULL DEFAULT '0.00',
  `date_ini` timestamp NOT NULL,
  `date_end` timestamp NOT NULL,
  `active` tinyint(1) NOT NULL,
  `Type` enum('FIXED','PERCENT') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `oferts_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.oferts: ~0 rows (approximately)
DELETE FROM `oferts`;

-- Dumping structure for table chapintec.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.password_resets: 0 rows
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table chapintec.password_reset_tokens
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.password_reset_tokens: 0 rows
DELETE FROM `password_reset_tokens`;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

-- Dumping structure for table chapintec.personal_access_tokens
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.personal_access_tokens: 0 rows
DELETE FROM `personal_access_tokens`;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table chapintec.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `price` double(8,2) NOT NULL,
  `quantity` int NOT NULL,
  `quantity_alert` int NOT NULL,
  `act_carusel` tinyint(1) DEFAULT NULL,
  `is_new` tinyint(1) DEFAULT NULL,
  `views` int NOT NULL DEFAULT '0',
  `category_id` bigint unsigned DEFAULT NULL,
  `ofert_id` bigint unsigned DEFAULT NULL,
  `sub_category_id` bigint unsigned DEFAULT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` enum('SIMPLE','VARIABLE') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_id` bigint DEFAULT NULL,
  `brand_id` bigint DEFAULT NULL,
  `garantity_type` enum('DAY','MONTH','YEAR') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `garantity_time` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_ofert_id_foreign` (`ofert_id`),
  KEY `products_sub_category_id_foreign` (`sub_category_id`),
  KEY `product_branch_id_foreign` (`brand_id`) USING BTREE,
  KEY `product_models_id_foreign` (`model_id`) USING BTREE,
  CONSTRAINT `FK_products_chapintec.brands` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  CONSTRAINT `product_models_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `products_ofert_id_foreign` FOREIGN KEY (`ofert_id`) REFERENCES `oferts` (`id`),
  CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.products: ~91 rows (approximately)
DELETE FROM `products`;
INSERT INTO `products` (`id`, `description`, `name`, `price`, `quantity`, `quantity_alert`, `act_carusel`, `is_new`, `views`, `category_id`, `ofert_id`, `sub_category_id`, `details`, `type`, `model_id`, `brand_id`, `garantity_type`, `garantity_time`) VALUES
	(16, NULL, 'GRASA CEPSA ARGA LITIO EP', 20.00, 4, 3, NULL, NULL, 9, 67, NULL, NULL, NULL, 'VARIABLE', 18, 23, NULL, NULL),
	(17, NULL, 'ACEITE CEPSA GENUINE', 20.00, 38, 30, NULL, NULL, 33, 67, NULL, NULL, NULL, 'VARIABLE', 19, 23, NULL, NULL),
	(20, NULL, 'BOMBA HIDRAULICA DIRECCION CITROEN XSARA COUPE 1.6 LX', 20.00, 1, 3, NULL, NULL, 1, 1, NULL, 16, NULL, NULL, 107, 25, NULL, NULL),
	(22, NULL, 'BOMBA HIDRAULICA DIRECCION FIAT BRAVA (182)', 20.00, 1, 3, NULL, NULL, 5, 1, NULL, 16, NULL, NULL, 27, 26, NULL, NULL),
	(23, NULL, 'BOMBA HIDRAULICA DIRECCION  FIAT SCUDO (222)', 20.00, 1, 3, NULL, NULL, 0, 1, NULL, 16, NULL, NULL, 28, 26, NULL, NULL),
	(24, NULL, 'BOMBA HIDRAULICA DIRECCION HYUNDAI LANTRA BERLINA (RD)', 20.00, 1, 3, NULL, NULL, 0, 1, NULL, 16, NULL, NULL, 29, 27, NULL, NULL),
	(25, NULL, 'BOMBA HIDRAULICA DIRECCION ISUZU TROPER', 20.00, 1, 3, NULL, NULL, 0, 1, NULL, 16, NULL, NULL, 46, 28, NULL, NULL),
	(26, NULL, 'BOMBA HIDRAULICA DIRECCION PEUGEOT 306 BERLINA', 20.00, 1, 3, NULL, NULL, 1, 1, NULL, 16, NULL, NULL, 95, 37, NULL, NULL),
	(29, NULL, 'BOMBA HIDRAULICA DIRECCION PEUGEOT 406 COUPE (S1/S2)', 20.00, 1, 3, NULL, NULL, 0, 1, NULL, 16, NULL, NULL, 94, 37, NULL, NULL),
	(30, NULL, 'BOMBA HIDRAULICA DIRECCION PEUGEOT 407', 20.00, 1, 3, NULL, NULL, 0, 1, NULL, 16, NULL, NULL, 86, 37, NULL, NULL),
	(31, NULL, 'BOMBA HIDRAULICA DIRECCION VOLKSWAGEN PASSAT BERLINA', 20.00, 1, 3, NULL, NULL, 0, 1, NULL, 16, NULL, NULL, 99, 30, NULL, NULL),
	(32, NULL, 'BOMBA HIDRAULICA DIRECCION  HYUNDAI MATRIX (FC)', 20.00, 1, 3, NULL, NULL, 0, 1, NULL, 16, NULL, NULL, 30, 27, NULL, NULL),
	(33, NULL, 'BOMBILLO', 20.00, 212, 3, NULL, NULL, 0, 7, NULL, 50, NULL, 'VARIABLE', NULL, NULL, NULL, NULL),
	(34, NULL, 'CREMALLERA HIDRAULICA CITROEN JUMPER', 20.00, 2, 3, NULL, NULL, 0, 2, NULL, 18, NULL, NULL, 35, 25, NULL, NULL),
	(35, NULL, 'CREMALLERA HIDRAULICA HYUNDAI COUPE (J2)', 20.00, 1, 3, NULL, NULL, 0, 2, NULL, 18, NULL, NULL, 36, 27, NULL, NULL),
	(36, NULL, 'CREMALLERA HIDRAULICA  VOLKSWAGEN GOLF II (191/193) GTD', 20.00, 1, 3, NULL, NULL, 0, 2, NULL, 18, NULL, NULL, 101, 30, NULL, NULL),
	(37, NULL, 'CREMALLERA HIDRAULICA VOLKSWAGEN PASSAT BERLINA', 20.00, 1, 3, NULL, NULL, 0, 2, NULL, 18, NULL, NULL, 99, 30, NULL, NULL),
	(38, NULL, 'CREMALLERA HIDRAULICA VOLKSWAGEN POLO BERLINA', 20.00, 1, 3, NULL, NULL, 0, 2, NULL, 18, NULL, NULL, 100, 30, NULL, NULL),
	(39, NULL, 'CREMALLERA HIDRAULICA  NISSAN ALMERA (N15)', 20.00, 1, 3, NULL, NULL, 0, 2, NULL, 18, NULL, NULL, 40, 31, NULL, NULL),
	(40, NULL, 'CREMALLERA MECANICA CITROEN C15', 20.00, 1, 3, NULL, NULL, 0, 2, NULL, 18, NULL, NULL, 41, 25, NULL, NULL),
	(41, NULL, 'CREMALLERA MECANICA HYUNDAI GRAND-I0', 20.00, 2, 3, NULL, NULL, 0, 2, NULL, 18, NULL, NULL, 42, 27, NULL, NULL),
	(42, NULL, 'FAROL TRASERO HYUNDAI ACCENT (LC)', 20.00, 2, 3, NULL, NULL, 0, 7, NULL, 46, NULL, 'SIMPLE', 43, 27, NULL, NULL),
	(43, NULL, 'FAROL TRASERO KIA PICANTO', 20.00, 2, 3, NULL, NULL, 0, 7, NULL, 46, NULL, 'SIMPLE', 44, 32, NULL, NULL),
	(44, NULL, 'FAROL TRASERO PEUGEOT 207', 20.00, 2, 3, NULL, NULL, 0, 7, NULL, 46, NULL, 'SIMPLE', 87, 37, NULL, NULL),
	(45, NULL, 'FAROL TRASERO PEUGEOT 306 BERLINA', 20.00, 2, 3, NULL, NULL, 0, 7, NULL, 46, NULL, 'SIMPLE', 95, 37, NULL, NULL),
	(46, NULL, 'FAROL TRASERO PEUGEOT 407 (2004-2011)', 20.00, 2, 3, NULL, NULL, 0, 7, NULL, 46, NULL, 'SIMPLE', 86, 37, NULL, NULL),
	(47, NULL, 'FAROL TRASERO FIAT TEMPRA BERLINA (159)', 20.00, 1, 3, NULL, NULL, 0, 7, NULL, 46, NULL, 'SIMPLE', 50, 26, NULL, NULL),
	(48, NULL, 'FAROL TRASERO HYUNDAI SONATA (Y4', 20.00, 1, 3, NULL, NULL, 0, 7, NULL, 46, NULL, 'SIMPLE', 52, 27, NULL, NULL),
	(49, NULL, 'LIQUIDO REFRIGERANTE PURO', 20.00, 28, 3, NULL, NULL, 0, 67, NULL, NULL, NULL, 'SIMPLE', NULL, 48, NULL, NULL),
	(50, NULL, 'PANTALLA DELANTERA CITROEN ZX', 20.00, 3, 3, NULL, NULL, 0, 7, NULL, 45, NULL, 'SIMPLE', 53, 25, NULL, NULL),
	(51, NULL, 'PANTALLA DELANTERA  PEUGEOT 106 (S1) Kid', 20.00, 4, 3, NULL, NULL, 0, 7, NULL, 45, NULL, 'SIMPLE', 88, 37, NULL, NULL),
	(52, NULL, 'PANTALLA DELANTERA  PEUGEOT 309 (1986-0)', 20.00, 1, 3, NULL, NULL, 0, 7, NULL, 45, NULL, 'SIMPLE', 96, 37, NULL, NULL),
	(53, NULL, 'PANTALLA DELANTERA VOLKSWAGEN PASSAT BERLINA (312)', 20.00, 1, 3, NULL, NULL, 0, 7, NULL, 45, NULL, 'SIMPLE', 99, 30, NULL, NULL),
	(54, NULL, 'PANTALLA DELANTERA VOLKSWAGEN POLO (867/871/873) Fox Berlina', 20.00, 1, 3, NULL, NULL, 0, 7, NULL, 45, NULL, 'SIMPLE', 91, 30, NULL, NULL),
	(55, NULL, 'ASIENTO AUTO', 20.00, 10, 3, NULL, NULL, 0, 8, NULL, 51, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(56, NULL, 'PALANCA DE EMERGENCIA', 20.00, 5, 3, NULL, NULL, 0, 5, NULL, 68, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(57, NULL, 'HOMOCINETICA DELANTERA CITROEN ZX 1.9', 20.00, 1, 3, NULL, NULL, 0, 2, NULL, 18, NULL, 'SIMPLE', 53, 25, NULL, NULL),
	(58, NULL, 'HOMOCINETICA DELANTERA  PEUGEOT 406 BERLINA (S1/S2)', 20.00, 2, 3, NULL, NULL, 0, 2, NULL, 18, NULL, 'SIMPLE', 97, 37, NULL, NULL),
	(59, NULL, 'HOMOCINETICA DELANTERA MERCEDES-BENZ MB 100 D', 20.00, 1, 3, NULL, NULL, 0, 2, NULL, 18, NULL, 'SIMPLE', 92, 38, NULL, NULL),
	(60, NULL, 'HOMOCINETICA DELANTERA PEUGEOT 309 (1986-0)', 20.00, 1, 3, NULL, NULL, 0, 2, NULL, 18, NULL, 'SIMPLE', 96, 37, NULL, NULL),
	(61, NULL, 'HOMOCINETICA DELANTERA HYUNDAI GRAND I0', 20.00, 1, 3, NULL, NULL, 0, 2, NULL, 18, NULL, 'SIMPLE', 42, 27, NULL, NULL),
	(62, NULL, 'JUNTA DE 5TA PUERTA', 20.00, 7, 3, NULL, NULL, 0, 8, NULL, 55, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(63, NULL, 'JUNTAS DE PUERTA', 20.00, 15, 3, NULL, NULL, 0, 8, NULL, 55, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(64, NULL, 'LLANTA  HIERRO  CITROEN C15', 20.00, 9, 3, NULL, NULL, 0, 10, NULL, 62, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(65, NULL, 'LLANTA HIERRO CITROEN JUMPY', 20.00, 3, 3, NULL, NULL, 0, 10, NULL, 62, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(66, NULL, 'LLANTA HIERRO RENAULT 19 PORTÓN TRASERO', 20.00, 4, 3, NULL, NULL, 0, 10, NULL, 62, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(67, NULL, 'LLANTA HIERRO VOLKSWAGEN T4  TRANSPORTER/FURGONETA', 20.00, 2, 3, NULL, NULL, 0, 10, NULL, 62, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(68, NULL, 'LLANTA HIERRO PEUGEOT 407', 20.00, 3, 3, NULL, NULL, 0, 10, NULL, 62, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(69, NULL, 'LLANTA HIERRO HYUNDAI GRAND I0', 20.00, 4, 3, NULL, NULL, 0, 10, NULL, 62, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(70, NULL, 'LLANTA HIERRO SKODA FABIA (6Y2/6Y3) Fresh', 20.00, 1, 3, NULL, NULL, 0, 10, NULL, 62, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(71, NULL, 'LLANTA HIERRO OPEL ASTRA H BERLINA', 20.00, 1, 3, NULL, NULL, 0, 10, NULL, 62, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(72, NULL, 'MOTOR DE USO CON CAJA DE VELOCIDAD  FIAT BRAVA (182)', 20.00, 1, 3, NULL, NULL, 0, 1, NULL, 11, NULL, 'SIMPLE', 27, 26, NULL, NULL),
	(73, NULL, 'MOTOR DE USO CON CAJA DE VELOCIDAD FIAT PUNTO BERL. (176)', 20.00, 1, 3, NULL, NULL, 0, 1, NULL, 11, NULL, 'SIMPLE', 105, 26, NULL, NULL),
	(74, NULL, 'MOTOR DE USO CON CAJA DE VELOCIDAD  CITROEN SAXO', 20.00, 1, 3, NULL, NULL, 0, 1, NULL, 11, NULL, 'SIMPLE', 106, 25, NULL, NULL),
	(75, NULL, 'MOTOR DE USO CON CAJA DE VELOCIDAD RENAULT  19', 20.00, 1, 3, NULL, NULL, 0, 1, NULL, 11, NULL, 'SIMPLE', 98, 39, NULL, NULL),
	(76, NULL, 'MOTOR DE USO CON CAJA DE VELOCIDAD HYUNDAI ACCENT', 20.00, 1, 3, NULL, NULL, 0, 1, NULL, 11, NULL, 'SIMPLE', 43, 27, NULL, NULL),
	(77, NULL, 'MOTOR DE USO CON CAJA DE VELOCIDAD HYUNDAI KIA', 20.00, 1, 3, NULL, NULL, 0, 1, NULL, 11, NULL, 'SIMPLE', 108, 27, NULL, NULL),
	(78, NULL, 'MOTOR DE USO CON CAJA DE VELOCIDAD FIAT TEMPRA', 20.00, 1, 3, NULL, NULL, 0, 1, NULL, 11, NULL, 'SIMPLE', 50, 26, NULL, NULL),
	(79, NULL, 'MOTOR DE USO CON CAJA DE VELOCIDAD PEUGEOT DW11 2.1 CC 85 MM', 20.00, 1, 3, NULL, NULL, 0, 1, NULL, 11, NULL, 'SIMPLE', NULL, 37, NULL, NULL),
	(80, NULL, 'MOTOR DE USO CON CAJA DE VELOCIDAD PEUGEOT DW10 2.0 CC 85 MM 16 V', 20.00, 1, 3, NULL, NULL, 0, 1, NULL, 11, NULL, 'SIMPLE', NULL, 37, NULL, NULL),
	(81, NULL, 'MOTOR DE USO CON CAJA DE VELOCIDAD PEUGEOT DV6 1.6 CC 75 MM 16V', 20.00, 1, 3, NULL, NULL, 0, 1, NULL, 11, NULL, 'SIMPLE', NULL, 37, NULL, NULL),
	(82, NULL, 'MOTOR DE USO CON CAJA DE VELOCIDAD PEUGEOT DV6 1.6 CC 75 MM 8V', 20.00, 1, 3, NULL, NULL, 0, 1, NULL, 11, NULL, 'SIMPLE', NULL, 37, NULL, NULL),
	(83, NULL, 'MOTOR DE USO CON CAJA DE VELOCIDAD PEUGEOT DW8 1.9 CC 82.2 MM', 20.00, 1, 3, NULL, NULL, 0, 1, NULL, 11, NULL, 'SIMPLE', NULL, 37, NULL, NULL),
	(84, NULL, 'LLANTA ALUMINIO', 20.00, 9, 3, NULL, NULL, 0, 10, NULL, 62, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(85, NULL, 'MUELLES 5TA PUERTA JUEGO 2', 20.00, 0, 3, NULL, NULL, 0, 4, NULL, 31, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(86, NULL, 'Neumáticos 175/70/13', 20.00, 0, 3, NULL, NULL, 0, 10, NULL, 63, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(87, NULL, 'Neumáticos 225/60/17', 20.00, 0, 3, NULL, NULL, 0, 10, NULL, 63, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(88, NULL, 'Baterias Moura', 20.00, 0, 3, NULL, NULL, 0, 6, NULL, 39, NULL, 'SIMPLE', NULL, 49, NULL, NULL),
	(89, NULL, 'ACEITE CAJA AUTOMATICA CEPSA ATF 70', 20.00, 0, 3, NULL, NULL, 0, 67, NULL, NULL, NULL, 'SIMPLE', NULL, 23, NULL, NULL),
	(90, NULL, 'ACEITE CAJA MECANICA AD TRANSMISIONES EP 80W90 5L', 20.00, 0, 3, NULL, NULL, 0, 67, NULL, NULL, NULL, 'SIMPLE', NULL, 24, NULL, NULL),
	(91, NULL, 'ACEITE CAJA MECANICA CEPSA TRANSMISIONES EP 80W90 5L', 20.00, 0, 3, NULL, NULL, 0, 67, NULL, NULL, NULL, 'SIMPLE', NULL, 23, NULL, NULL),
	(92, NULL, 'ACEITE HIDRAULICO AD  5L', 20.00, 0, 3, NULL, NULL, 0, 67, NULL, NULL, NULL, 'SIMPLE', NULL, 24, NULL, NULL),
	(93, NULL, 'AD ATFDEX DEXRON II  1L', 20.00, 0, 3, NULL, NULL, 0, 67, NULL, NULL, NULL, 'SIMPLE', NULL, 24, NULL, NULL),
	(94, NULL, 'BOMBA INYECCION ALTA PRESION', 20.00, 0, 3, NULL, NULL, 0, 1, NULL, 16, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(95, NULL, 'INYECTORES', 20.00, 0, 3, NULL, NULL, 0, 1, NULL, 17, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(96, NULL, 'KIT DE CLOCHE', 20.00, 0, 3, NULL, NULL, 0, 2, NULL, 22, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(97, NULL, 'CORREA DISTRIBUCION DV6 1.6 CC 75 MM 16V', 20.00, 0, 3, NULL, NULL, 0, 1, NULL, 17, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(98, NULL, 'CORREA POLY V  DV6 1.6 CC 75 MM 16V', 20.00, 0, 3, NULL, NULL, 0, 2, NULL, 20, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(99, NULL, 'KIT DISTRIBUCION DV6 1.6 CC 75 MM 16V', 20.00, 0, 3, NULL, NULL, 0, 2, NULL, 20, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(100, NULL, 'UNIDAD MOTOR 49 CC CON TRACCION YAMAHA', 20.00, 0, 3, NULL, NULL, 0, 1, NULL, 11, NULL, 'SIMPLE', NULL, 42, NULL, NULL),
	(101, NULL, 'UNIDAD MOTOR 49 CC CON TRACCION RIEJU', 20.00, 0, 3, NULL, NULL, 0, 1, NULL, 11, NULL, 'SIMPLE', NULL, 44, NULL, NULL),
	(102, NULL, 'UNIDAD MOTOR 49 CC CON TRACCION PIAGGIO', 20.00, 0, 3, NULL, NULL, 0, 1, NULL, 11, NULL, 'SIMPLE', NULL, 43, NULL, NULL),
	(103, NULL, 'UNIDAD MOTOR 125 CC CON TRACCION  SYM', 20.00, 0, 3, NULL, NULL, 0, 1, NULL, 11, NULL, 'SIMPLE', NULL, 45, NULL, NULL),
	(104, NULL, 'UNIDAD MOTOR 125 CC CON TRACCION  KYMCO', 20.00, 0, 3, NULL, NULL, 0, 1, NULL, 11, NULL, 'SIMPLE', NULL, 46, NULL, NULL),
	(105, NULL, 'UNIDAD MOTOR 125 CC CON TRACCION  DAELIM', 20.00, 0, 3, NULL, NULL, 0, 1, NULL, 11, NULL, 'SIMPLE', NULL, 47, NULL, NULL),
	(106, NULL, 'ESCOBILLAS LIMPIAPARABRISAS', 20.00, 0, 3, NULL, NULL, 0, 8, NULL, 55, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(107, NULL, 'BOMBA DE AGUA DV6 1.6 CC 75 MM 16V', 20.00, 0, 3, NULL, NULL, 0, 1, NULL, 16, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(108, NULL, 'FILTRO COMBUSTIBLE', 20.00, 0, 3, NULL, NULL, 0, 1, NULL, 69, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(109, NULL, 'FILTRO ACEITE', 20.00, 0, 3, NULL, NULL, 0, 1, NULL, 69, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(110, NULL, 'BARRA TRANSMISION COMUNES', 20.00, 0, 3, NULL, NULL, 0, 2, NULL, 18, NULL, 'SIMPLE', NULL, NULL, NULL, NULL),
	(111, NULL, 'JUEGO DE AROS', 20.00, 0, 3, NULL, NULL, 0, 1, NULL, 17, NULL, 'SIMPLE', NULL, NULL, NULL, NULL);

-- Dumping structure for table chapintec.prueba
DROP TABLE IF EXISTS `prueba`;
CREATE TABLE IF NOT EXISTS `prueba` (
  `idproducto` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table chapintec.prueba: 3 rows
DELETE FROM `prueba`;
/*!40000 ALTER TABLE `prueba` DISABLE KEYS */;
INSERT INTO `prueba` (`idproducto`) VALUES
	('16'),
	('17'),
	('20');
/*!40000 ALTER TABLE `prueba` ENABLE KEYS */;

-- Dumping structure for table chapintec.staff
DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Twitter` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Instagram` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.staff: 0 rows
DELETE FROM `staff`;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;

-- Dumping structure for table chapintec.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.users: 1 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'javier', 'javier@gmail.com', NULL, '$2y$12$hkjIbv1STVzcSMGiS.w60edNcPCOIBRmBnpxepNAjHgf9ereKjkLq', 'nPFYTVcGIAgi8wYcjFdVJSYEQx60wFXVSyVi9Mr0yVCdmLc6YgeXYcf4gIH5', '2024-01-30 01:48:57', '2024-01-30 01:48:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table chapintec.values
DROP TABLE IF EXISTS `values`;
CREATE TABLE IF NOT EXISTS `values` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `values_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.values: ~39 rows (approximately)
DELETE FROM `values`;
INSERT INTO `values` (`id`, `name`) VALUES
	(52, '1-Filamento'),
	(28, '10W40Max'),
	(26, '1L'),
	(51, '2-Filamentos'),
	(27, '400g'),
	(61, '55-cm'),
	(25, '5L'),
	(40, '5W30'),
	(29, '5W30-Synthetic'),
	(60, '60-cm'),
	(62, '60A'),
	(63, '75A'),
	(30, 'CITROEN-Xsara-Coupe'),
	(42, 'Derecha'),
	(31, 'Fiat-Brava(182)'),
	(32, 'Fiat-Scudo(222)'),
	(54, 'H4'),
	(53, 'H7'),
	(33, 'Hyundai-Lantra-Berlina'),
	(39, 'Hyundai-Matrix(FC)'),
	(34, 'Isuzu-Troper'),
	(41, 'Izquierda'),
	(45, 'Juego-2Puertas'),
	(46, 'Juego-4Puertas'),
	(36, 'Pegeout-406-Coupe'),
	(37, 'Pegeout-407'),
	(35, 'Peugeot-306-Berlina'),
	(47, 'RIN-13'),
	(55, 'Rin-13-Juego'),
	(48, 'RIN-14'),
	(56, 'Rin-14-Juego'),
	(49, 'RIN-15'),
	(57, 'Rin-15-Juego'),
	(50, 'RIN-16'),
	(58, 'Rin-16-Juego'),
	(59, 'Rin-17-Juego'),
	(43, 'Simple'),
	(44, 'Traseros'),
	(38, 'Volskwagen-Passat-Berlina');

-- Dumping structure for table chapintec.variations
DROP TABLE IF EXISTS `variations`;
CREATE TABLE IF NOT EXISTS `variations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `ofert_id` bigint unsigned DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_sku` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `currency_id` bigint unsigned DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stock` int DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `variations_sub_sku_unique` (`sub_sku`),
  KEY `variations_ofert_id_foreign` (`ofert_id`),
  KEY `variations_currency_id_foreign` (`currency_id`),
  KEY `variations_product_id_foreign` (`product_id`),
  CONSTRAINT `variations_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`),
  CONSTRAINT `variations_ofert_id_foreign` FOREIGN KEY (`ofert_id`) REFERENCES `oferts` (`id`),
  CONSTRAINT `variations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.variations: ~146 rows (approximately)
DELETE FROM `variations`;
INSERT INTO `variations` (`id`, `product_id`, `ofert_id`, `name`, `sub_sku`, `price`, `currency_id`, `active`, `created_at`, `updated_at`, `stock`) VALUES
	(62, 17, NULL, 'ACEITE CEPSA GENUINE__5L, 10W40Max', '20240214-0017-1', 80.00, 3, 1, '2024-02-14 18:59:47', '2024-02-14 18:59:47', 17),
	(63, 17, NULL, 'ACEITE CEPSA GENUINE__5L, 5W30-Synthetic', '20240214-0017-2', 40.00, 3, 1, '2024-02-14 18:59:47', '2024-02-14 18:59:47', 11),
	(64, 17, NULL, 'ACEITE CEPSA GENUINE__1L, 10W40Max', '20240214-0017-3', 20.00, 3, 1, '2024-02-14 18:59:47', '2024-02-14 18:59:47', 10),
	(66, 16, NULL, 'GRASA CEPSA ARGA LITIO EP__400g', '20240214-0004-1', 20.00, 3, 1, '2024-02-14 19:03:47', '2024-02-14 19:03:47', 4),
	(77, 20, NULL, 'CHILD', '20240214-0018', 20.00, 3, 1, '2024-02-14 19:36:07', '2024-02-14 19:36:07', 1),
	(78, 22, NULL, 'CHILD', '20240214-0021', 20.00, 3, 1, '2024-02-14 19:37:49', '2024-02-14 19:37:49', 1),
	(79, 23, NULL, 'CHILD', '20240214-0023', 20.00, 3, 1, '2024-02-14 19:39:25', '2024-02-14 19:39:25', 1),
	(80, 24, NULL, 'CHILD', '20240214-0024', 20.00, 3, 1, '2024-02-14 19:40:24', '2024-02-14 19:40:24', 1),
	(81, 25, NULL, 'CHILD', '20240214-0025', 20.00, 3, 1, '2024-02-14 19:41:15', '2024-02-14 19:41:15', 1),
	(82, 26, NULL, 'CHILD', '20240214-0026', 20.00, 3, 1, '2024-02-14 19:42:08', '2024-02-14 19:42:08', 1),
	(83, 29, NULL, 'CHILD', '20240214-0027', 20.00, 3, 1, '2024-02-14 19:44:11', '2024-02-14 19:44:11', 1),
	(84, 30, NULL, 'CHILD', '20240214-0030', 20.00, 3, 1, '2024-02-14 19:45:08', '2024-02-14 19:45:08', 1),
	(85, 31, NULL, 'CHILD', '20240214-0031', 20.00, 3, 1, '2024-02-14 19:45:53', '2024-02-14 19:45:53', 1),
	(86, 32, NULL, 'CHILD', '20240214-0032', 20.00, 3, 1, '2024-02-14 19:46:44', '2024-02-14 19:46:44', 1),
	(88, 34, NULL, 'CHILD', '20240214-0034', 20.00, 3, 1, '2024-02-14 19:50:11', '2024-02-14 19:50:11', 2),
	(89, 35, NULL, 'CHILD', '20240214-0035', 20.00, 3, 1, '2024-02-14 19:50:59', '2024-02-14 19:50:59', 1),
	(90, 36, NULL, 'CHILD', '20240214-0036', 20.00, 3, 1, '2024-02-14 19:52:13', '2024-02-14 19:52:13', 1),
	(91, 37, NULL, 'CHILD', '20240214-0037', 20.00, 3, 1, '2024-02-14 19:53:07', '2024-02-14 19:53:07', 1),
	(92, 38, NULL, 'CHILD', '20240214-0038', 20.00, 3, 1, '2024-02-14 19:53:51', '2024-02-14 19:53:51', 1),
	(93, 39, NULL, 'CHILD', '20240214-0039', 20.00, 3, 1, '2024-02-14 19:54:46', '2024-02-14 19:54:46', 1),
	(94, 40, NULL, 'CHILD', '20240214-0040', 20.00, 3, 1, '2024-02-14 19:55:40', '2024-02-14 19:55:40', 1),
	(95, 41, NULL, 'CHILD', '20240214-0041', 20.00, 3, 1, '2024-02-14 19:56:57', '2024-02-14 19:56:57', 2),
	(103, 42, NULL, 'FAROL TRASERO HYUNDAI ACCENT (LC)__Izquierda', '20240215-0042-1', 20.00, 3, 1, '2024-02-15 15:27:17', '2024-02-15 15:27:17', 1),
	(104, 42, NULL, 'FAROL TRASERO HYUNDAI ACCENT (LC)__Derecha', '20240215-0042-2', 20.00, 3, 1, '2024-02-15 15:27:17', '2024-02-15 15:27:17', 1),
	(105, 43, NULL, 'FAROL TRASERO KIA PICANTO__Izquierda', '20240215-0043-1', 20.00, 3, 1, '2024-02-15 15:27:43', '2024-02-15 15:27:43', 1),
	(106, 43, NULL, 'FAROL TRASERO KIA PICANTO__Derecha', '20240215-0043-2', 20.00, 3, 1, '2024-02-15 15:27:43', '2024-02-15 15:27:43', 1),
	(107, 44, NULL, 'FAROL TRASERO PEUGEOT 207__Izquierda', '20240215-0044-1', 20.00, 3, 1, '2024-02-15 15:28:01', '2024-02-15 15:28:01', 1),
	(108, 44, NULL, 'FAROL TRASERO PEUGEOT 207__Derecha', '20240215-0044-2', 20.00, 3, 1, '2024-02-15 15:28:01', '2024-02-15 15:28:01', 1),
	(109, 45, NULL, 'FAROL TRASERO PEUGEOT 306 BERLINA__Izquierda', '20240215-0045-1', 20.00, 3, 1, '2024-02-15 15:28:16', '2024-02-15 15:28:16', 1),
	(110, 45, NULL, 'FAROL TRASERO PEUGEOT 306 BERLINA__Derecha', '20240215-0045-2', 20.00, 3, 1, '2024-02-15 15:28:16', '2024-02-15 15:28:16', 1),
	(111, 46, NULL, 'FAROL TRASERO PEUGEOT 407 (2004-2011)__Izquierda', '20240215-0046-1', 20.00, 3, 1, '2024-02-15 15:28:29', '2024-02-15 15:28:29', 1),
	(112, 46, NULL, 'FAROL TRASERO PEUGEOT 407 (2004-2011)__Derecha', '20240215-0046-2', 20.00, 3, 1, '2024-02-15 15:28:29', '2024-02-15 15:28:29', 1),
	(113, 47, NULL, 'FAROL TRASERO FIAT TEMPRA BERLINA (159)__Izquierda', '20240215-0047-1', 20.00, 3, 1, '2024-02-15 15:28:47', '2024-02-15 15:28:47', 1),
	(114, 47, NULL, 'FAROL TRASERO FIAT TEMPRA BERLINA (159)__Derecha', '20240215-0047-2', 20.00, 3, 1, '2024-02-15 15:28:47', '2024-02-15 15:28:47', 0),
	(115, 48, NULL, 'FAROL TRASERO HYUNDAI SONATA (Y4__Izquierda', '20240215-0048-1', 20.00, 3, 1, '2024-02-15 15:29:03', '2024-02-15 15:29:03', 1),
	(116, 48, NULL, 'FAROL TRASERO HYUNDAI SONATA (Y4__Derecha', '20240215-0048-2', 20.00, 3, 1, '2024-02-15 15:29:03', '2024-02-15 15:29:03', 0),
	(117, 49, NULL, 'CHILD', '20240215-0049', 20.00, 3, 1, '2024-02-15 15:37:04', '2024-02-15 15:37:04', 28),
	(123, 50, NULL, 'PANTALLA DELANTERA CITROEN ZX__Izquierda', '20240215-0050-1', 20.00, 3, 1, '2024-02-15 15:45:10', '2024-02-15 15:45:10', 1),
	(124, 50, NULL, 'PANTALLA DELANTERA CITROEN ZX__Derecha', '20240215-0050-2', 20.00, 3, 1, '2024-02-15 15:45:10', '2024-02-15 15:45:10', 2),
	(125, 51, NULL, 'PANTALLA DELANTERA  PEUGEOT 106 (S1) Kid__Izquierda', '20240215-0051-1', 20.00, 3, 1, '2024-02-15 15:45:18', '2024-02-15 15:45:18', 2),
	(126, 51, NULL, 'PANTALLA DELANTERA  PEUGEOT 106 (S1) Kid__Derecha', '20240215-0051-2', 20.00, 3, 1, '2024-02-15 15:45:18', '2024-02-15 15:45:18', 2),
	(127, 52, NULL, 'PANTALLA DELANTERA  PEUGEOT 309 (1986-0)__Izquierda', '20240215-0052-1', 20.00, 3, 1, '2024-02-15 15:45:28', '2024-02-15 15:45:28', 0),
	(128, 52, NULL, 'PANTALLA DELANTERA  PEUGEOT 309 (1986-0)__Derecha', '20240215-0052-2', 20.00, 3, 1, '2024-02-15 15:45:28', '2024-02-15 15:45:28', 1),
	(129, 53, NULL, 'PANTALLA DELANTERA VOLKSWAGEN PASSAT BERLINA (312)__Izquierda', '20240215-0053-1', 20.00, 3, 1, '2024-02-15 15:45:37', '2024-02-15 15:45:37', 0),
	(130, 53, NULL, 'PANTALLA DELANTERA VOLKSWAGEN PASSAT BERLINA (312)__Derecha', '20240215-0053-2', 20.00, 3, 1, '2024-02-15 15:45:37', '2024-02-15 15:45:37', 1),
	(131, 54, NULL, 'PANTALLA DELANTERA VOLKSWAGEN POLO (867/871/873) Fox Berlina__Izquierda', '20240215-0054-1', 20.00, 3, 1, '2024-02-15 15:45:46', '2024-02-15 15:45:46', 1),
	(132, 54, NULL, 'PANTALLA DELANTERA VOLKSWAGEN POLO (867/871/873) Fox Berlina__Derecha', '20240215-0054-2', 20.00, 3, 1, '2024-02-15 15:45:46', '2024-02-15 15:45:46', 0),
	(134, 55, NULL, 'ASIENTO AUTO__Simple', '20240215-0055-1', 20.00, 3, 1, '2024-02-15 15:49:15', '2024-02-15 15:49:15', 5),
	(135, 55, NULL, 'ASIENTO AUTO__Traseros', '20240215-0055-2', 20.00, 3, 1, '2024-02-15 15:49:15', '2024-02-15 15:49:15', 5),
	(136, 56, NULL, 'CHILD', '20240215-0056', 20.00, 3, 1, '2024-02-15 15:53:21', '2024-02-15 15:53:21', 5),
	(142, 57, NULL, 'HOMOCINETICA DELANTERA CITROEN ZX 1.9__Izquierda', '20240215-0057-1', 20.00, 3, 1, '2024-02-15 16:32:22', '2024-02-15 16:32:22', 0),
	(143, 57, NULL, 'HOMOCINETICA DELANTERA CITROEN ZX 1.9__Derecha', '20240215-0057-2', 20.00, 3, 1, '2024-02-15 16:32:22', '2024-02-15 16:32:22', 1),
	(144, 58, NULL, 'HOMOCINETICA DELANTERA  PEUGEOT 406 BERLINA (S1/S2)__Izquierda', '20240215-0058-1', 20.00, 3, 1, '2024-02-15 16:32:31', '2024-02-15 16:32:31', 1),
	(145, 58, NULL, 'HOMOCINETICA DELANTERA  PEUGEOT 406 BERLINA (S1/S2)__Derecha', '20240215-0058-2', 20.00, 3, 1, '2024-02-15 16:32:31', '2024-02-15 16:32:31', 1),
	(146, 59, NULL, 'HOMOCINETICA DELANTERA MERCEDES-BENZ MB 100 D__Izquierda', '20240215-0059-1', 20.00, 3, 1, '2024-02-15 16:32:47', '2024-02-15 16:32:47', 1),
	(147, 59, NULL, 'HOMOCINETICA DELANTERA MERCEDES-BENZ MB 100 D__Derecha', '20240215-0059-2', 20.00, 3, 1, '2024-02-15 16:32:47', '2024-02-15 16:32:47', 0),
	(148, 60, NULL, 'HOMOCINETICA DELANTERA PEUGEOT 309 (1986-0)__Izquierda', '20240215-0060-1', 20.00, 3, 1, '2024-02-15 16:32:59', '2024-02-15 16:32:59', 1),
	(149, 60, NULL, 'HOMOCINETICA DELANTERA PEUGEOT 309 (1986-0)__Derecha', '20240215-0060-2', 20.00, 3, 1, '2024-02-15 16:32:59', '2024-02-15 16:32:59', 0),
	(150, 61, NULL, 'HOMOCINETICA DELANTERA HYUNDAI GRAND I0__Izquierda', '20240215-0061-1', 20.00, 3, 1, '2024-02-15 16:33:10', '2024-02-15 16:33:10', 1),
	(151, 61, NULL, 'HOMOCINETICA DELANTERA HYUNDAI GRAND I0__Derecha', '20240215-0061-2', 20.00, 3, 1, '2024-02-15 16:33:10', '2024-02-15 16:33:10', 0),
	(152, 62, NULL, 'CHILD', '20240215-0062', 20.00, 3, 1, '2024-02-15 16:34:55', '2024-02-15 16:34:55', 7),
	(154, 63, NULL, 'JUNTAS DE PUERTA__Juego-2Puertas', '20240215-0063-1', 20.00, 3, 1, '2024-02-15 16:39:05', '2024-02-15 16:39:05', 7),
	(155, 63, NULL, 'JUNTAS DE PUERTA__Juego-4Puertas', '20240215-0063-2', 20.00, 3, 1, '2024-02-15 16:39:05', '2024-02-15 16:39:05', 8),
	(164, 64, NULL, 'LLANTA  HIERRO  CITROEN C15__RIN-13', '20240215-0064-1', 20.00, 3, 1, '2024-02-15 17:10:10', '2024-02-15 17:10:10', 9),
	(165, 64, NULL, 'LLANTA  HIERRO  CITROEN C15__RIN-14', '20240215-0064-2', 20.00, 3, 1, '2024-02-15 17:10:10', '2024-02-15 17:10:10', 0),
	(166, 64, NULL, 'LLANTA  HIERRO  CITROEN C15__RIN-15', '20240215-0064-3', 20.00, 3, 1, '2024-02-15 17:10:10', '2024-02-15 17:10:10', 0),
	(167, 64, NULL, 'LLANTA  HIERRO  CITROEN C15__RIN-16', '20240215-0064-4', 20.00, 3, 1, '2024-02-15 17:10:10', '2024-02-15 17:10:10', 0),
	(168, 65, NULL, 'LLANTA HIERRO CITROEN JUMPY__RIN-13', '20240215-0065-1', 20.00, 3, 1, '2024-02-15 17:10:28', '2024-02-15 17:10:28', 0),
	(169, 65, NULL, 'LLANTA HIERRO CITROEN JUMPY__RIN-14', '20240215-0065-2', 20.00, 3, 1, '2024-02-15 17:10:28', '2024-02-15 17:10:28', 3),
	(170, 65, NULL, 'LLANTA HIERRO CITROEN JUMPY__RIN-15', '20240215-0065-3', 20.00, 3, 1, '2024-02-15 17:10:28', '2024-02-15 17:10:28', 0),
	(171, 65, NULL, 'LLANTA HIERRO CITROEN JUMPY__RIN-16', '20240215-0065-4', 20.00, 3, 1, '2024-02-15 17:10:28', '2024-02-15 17:10:28', 0),
	(172, 66, NULL, 'LLANTA HIERRO RENAULT 19 PORTÓN TRASERO__RIN-13', '20240215-0066-1', 20.00, 3, 1, '2024-02-15 17:10:38', '2024-02-15 17:10:38', 4),
	(173, 66, NULL, 'LLANTA HIERRO RENAULT 19 PORTÓN TRASERO__RIN-14', '20240215-0066-2', 20.00, 3, 1, '2024-02-15 17:10:38', '2024-02-15 17:10:38', 0),
	(174, 66, NULL, 'LLANTA HIERRO RENAULT 19 PORTÓN TRASERO__RIN-15', '20240215-0066-3', 20.00, 3, 1, '2024-02-15 17:10:38', '2024-02-15 17:10:38', 0),
	(175, 66, NULL, 'LLANTA HIERRO RENAULT 19 PORTÓN TRASERO__RIN-16', '20240215-0066-4', 20.00, 3, 1, '2024-02-15 17:10:38', '2024-02-15 17:10:38', 0),
	(176, 67, NULL, 'LLANTA HIERRO VOLKSWAGEN T4  TRANSPORTER/FURGONETA__RIN-13', '20240215-0067-1', 20.00, 3, 1, '2024-02-15 17:10:49', '2024-02-15 17:10:49', 0),
	(177, 67, NULL, 'LLANTA HIERRO VOLKSWAGEN T4  TRANSPORTER/FURGONETA__RIN-14', '20240215-0067-2', 20.00, 3, 1, '2024-02-15 17:10:49', '2024-02-15 17:10:49', 2),
	(178, 67, NULL, 'LLANTA HIERRO VOLKSWAGEN T4  TRANSPORTER/FURGONETA__RIN-15', '20240215-0067-3', 20.00, 3, 1, '2024-02-15 17:10:49', '2024-02-15 17:10:49', 0),
	(179, 67, NULL, 'LLANTA HIERRO VOLKSWAGEN T4  TRANSPORTER/FURGONETA__RIN-16', '20240215-0067-4', 20.00, 3, 1, '2024-02-15 17:10:49', '2024-02-15 17:10:49', 0),
	(180, 68, NULL, 'LLANTA HIERRO PEUGEOT 407__RIN-13', '20240215-0068-1', 20.00, 3, 1, '2024-02-15 17:11:00', '2024-02-15 17:11:00', 0),
	(181, 68, NULL, 'LLANTA HIERRO PEUGEOT 407__RIN-14', '20240215-0068-2', 20.00, 3, 1, '2024-02-15 17:11:00', '2024-02-15 17:11:00', 0),
	(182, 68, NULL, 'LLANTA HIERRO PEUGEOT 407__RIN-15', '20240215-0068-3', 20.00, 3, 1, '2024-02-15 17:11:00', '2024-02-15 17:11:00', 0),
	(183, 68, NULL, 'LLANTA HIERRO PEUGEOT 407__RIN-16', '20240215-0068-4', 20.00, 3, 1, '2024-02-15 17:11:00', '2024-02-15 17:11:00', 3),
	(184, 69, NULL, 'LLANTA HIERRO HYUNDAI GRAND I0__RIN-13', '20240215-0069-1', 20.00, 3, 1, '2024-02-15 17:11:15', '2024-02-15 17:11:15', 0),
	(185, 69, NULL, 'LLANTA HIERRO HYUNDAI GRAND I0__RIN-14', '20240215-0069-2', 20.00, 3, 1, '2024-02-15 17:11:15', '2024-02-15 17:11:15', 4),
	(186, 69, NULL, 'LLANTA HIERRO HYUNDAI GRAND I0__RIN-15', '20240215-0069-3', 20.00, 3, 1, '2024-02-15 17:11:15', '2024-02-15 17:11:15', 0),
	(187, 69, NULL, 'LLANTA HIERRO HYUNDAI GRAND I0__RIN-16', '20240215-0069-4', 20.00, 3, 1, '2024-02-15 17:11:15', '2024-02-15 17:11:15', 0),
	(188, 70, NULL, 'LLANTA HIERRO SKODA FABIA (6Y2/6Y3) Fresh__RIN-13', '20240215-0070-1', 20.00, 3, 1, '2024-02-15 17:11:31', '2024-02-15 17:11:31', 0),
	(189, 70, NULL, 'LLANTA HIERRO SKODA FABIA (6Y2/6Y3) Fresh__RIN-14', '20240215-0070-2', 20.00, 3, 1, '2024-02-15 17:11:31', '2024-02-15 17:11:31', 1),
	(190, 70, NULL, 'LLANTA HIERRO SKODA FABIA (6Y2/6Y3) Fresh__RIN-15', '20240215-0070-3', 20.00, 3, 1, '2024-02-15 17:11:31', '2024-02-15 17:11:31', 0),
	(191, 70, NULL, 'LLANTA HIERRO SKODA FABIA (6Y2/6Y3) Fresh__RIN-16', '20240215-0070-4', 20.00, 3, 1, '2024-02-15 17:11:31', '2024-02-15 17:11:31', 0),
	(192, 71, NULL, 'LLANTA HIERRO OPEL ASTRA H BERLINA__RIN-13', '20240215-0071-1', 20.00, 3, 1, '2024-02-15 17:11:47', '2024-02-15 17:11:47', 0),
	(193, 71, NULL, 'LLANTA HIERRO OPEL ASTRA H BERLINA__RIN-14', '20240215-0071-2', 20.00, 3, 1, '2024-02-15 17:11:47', '2024-02-15 17:11:47', 0),
	(194, 71, NULL, 'LLANTA HIERRO OPEL ASTRA H BERLINA__RIN-15', '20240215-0071-3', 20.00, 3, 1, '2024-02-15 17:11:47', '2024-02-15 17:11:47', 0),
	(195, 71, NULL, 'LLANTA HIERRO OPEL ASTRA H BERLINA__RIN-16', '20240215-0071-4', 20.00, 3, 1, '2024-02-15 17:11:47', '2024-02-15 17:11:47', 1),
	(196, 33, NULL, 'BOMBILLO__2-Filamentos', '20240214-0033-1', 20.00, 3, 1, '2024-02-15 17:44:31', '2024-02-15 17:44:31', 103),
	(197, 33, NULL, 'BOMBILLO__1-Filamento', '20240214-0033-2', 20.00, 3, 1, '2024-02-15 17:44:31', '2024-02-15 17:44:31', 0),
	(198, 33, NULL, 'BOMBILLO__H7', '20240214-0033-3', 20.00, 3, 1, '2024-02-15 17:44:31', '2024-02-15 17:44:31', 109),
	(199, 33, NULL, 'BOMBILLO__H4', '20240214-0033-4', 20.00, 3, 1, '2024-02-15 17:44:31', '2024-02-15 17:44:31', 0),
	(200, 72, NULL, 'CHILD', '20240215-0072', 20.00, 3, 1, '2024-02-15 19:50:40', '2024-02-15 19:50:40', 1),
	(201, 73, NULL, 'CHILD', '20240215-0073', 20.00, 3, 1, '2024-02-15 19:54:17', '2024-02-15 19:54:17', 1),
	(202, 74, NULL, 'CHILD', '20240215-0074', 20.00, 3, 1, '2024-02-15 19:55:03', '2024-02-15 19:55:03', 1),
	(203, 75, NULL, 'CHILD', '20240215-0075', 20.00, 3, 1, '2024-02-15 19:55:52', '2024-02-15 19:55:52', 1),
	(204, 76, NULL, 'CHILD', '20240215-0076', 20.00, 3, 1, '2024-02-15 20:01:24', '2024-02-15 20:01:24', 1),
	(205, 77, NULL, 'CHILD', '20240215-0077', 20.00, 3, 1, '2024-02-15 20:03:40', '2024-02-15 20:03:40', 1),
	(206, 78, NULL, 'CHILD', '20240215-0078', 20.00, 3, 1, '2024-02-15 20:04:18', '2024-02-15 20:04:18', 1),
	(207, 79, NULL, 'CHILD', '20240215-0079', 20.00, 3, 1, '2024-02-15 20:05:39', '2024-02-15 20:05:39', 1),
	(208, 80, NULL, 'CHILD', '20240215-0080', 20.00, 3, 1, '2024-02-15 20:06:24', '2024-02-15 20:06:24', 1),
	(209, 81, NULL, 'CHILD', '20240215-0081', 20.00, 3, 1, '2024-02-15 20:07:32', '2024-02-15 20:07:32', 1),
	(210, 82, NULL, 'CHILD', '20240215-0082', 20.00, 3, 1, '2024-02-15 20:08:11', '2024-02-15 20:08:11', 1),
	(211, 83, NULL, 'CHILD', '20240215-0083', 20.00, 3, 1, '2024-02-15 20:08:42', '2024-02-15 20:08:42', 1),
	(213, 84, NULL, 'LLANTA ALUMINIO__Rin-13-Juego', '20240215-0084-1', 20.00, 3, 1, '2024-02-15 20:16:58', '2024-02-15 20:16:58', 1),
	(214, 84, NULL, 'LLANTA ALUMINIO__Rin-14-Juego', '20240215-0084-2', 20.00, 3, 1, '2024-02-15 20:16:58', '2024-02-15 20:16:58', 2),
	(215, 84, NULL, 'LLANTA ALUMINIO__Rin-15-Juego', '20240215-0084-3', 20.00, 3, 1, '2024-02-15 20:16:58', '2024-02-15 20:16:58', 5),
	(216, 84, NULL, 'LLANTA ALUMINIO__Rin-16-Juego', '20240215-0084-4', 20.00, 3, 1, '2024-02-15 20:16:58', '2024-02-15 20:16:58', 0),
	(217, 84, NULL, 'LLANTA ALUMINIO__Rin-17-Juego', '20240215-0084-5', 20.00, 3, 1, '2024-02-15 20:16:58', '2024-02-15 20:16:58', 1),
	(219, 85, NULL, 'MUELLES 5TA PUERTA JUEGO 2__60-cm', '20240215-0085-1', 20.00, 3, 1, '2024-02-15 20:24:54', '2024-02-15 20:24:54', 0),
	(220, 85, NULL, 'MUELLES 5TA PUERTA JUEGO 2__55-cm', '20240215-0085-2', 20.00, 3, 1, '2024-02-15 20:24:54', '2024-02-15 20:24:54', 0),
	(221, 86, NULL, 'CHILD', '20240215-0086', 20.00, 3, 1, '2024-02-15 20:39:08', '2024-02-15 20:39:08', 0),
	(222, 87, NULL, 'CHILD', '20240215-0087', 20.00, 3, 1, '2024-02-15 20:39:33', '2024-02-15 20:39:33', 0),
	(224, 88, NULL, 'Baterias Moura__60A', '20240215-0088-1', 20.00, 3, 1, '2024-02-15 20:43:50', '2024-02-15 20:43:50', 0),
	(225, 88, NULL, 'Baterias Moura__75A', '20240215-0088-2', 20.00, 3, 1, '2024-02-15 20:43:50', '2024-02-15 20:43:50', 0),
	(227, 89, NULL, 'ACEITE CAJA AUTOMATICA CEPSA ATF 70__5L', '20240215-0089-1', 20.00, 3, 1, '2024-02-15 20:47:02', '2024-02-15 20:47:02', 0),
	(228, 89, NULL, 'ACEITE CAJA AUTOMATICA CEPSA ATF 70__1L', '20240215-0089-2', 20.00, 3, 1, '2024-02-15 20:47:02', '2024-02-15 20:47:02', 0),
	(229, 90, NULL, 'CHILD', '20240215-0090', 20.00, 3, 1, '2024-02-15 20:48:37', '2024-02-15 20:48:37', 0),
	(230, 91, NULL, 'CHILD', '20240215-0091', 20.00, 3, 1, '2024-02-15 20:49:17', '2024-02-15 20:49:17', 0),
	(231, 92, NULL, 'CHILD', '20240215-0092', 20.00, 3, 1, '2024-02-15 20:50:00', '2024-02-15 20:50:00', 0),
	(232, 93, NULL, 'CHILD', '20240215-0093', 20.00, 3, 1, '2024-02-15 20:50:40', '2024-02-15 20:50:40', 0),
	(233, 94, NULL, 'CHILD', '20240215-0094', 20.00, 3, 1, '2024-02-15 20:52:01', '2024-02-15 20:52:01', 0),
	(234, 95, NULL, 'CHILD', '20240215-0095', 20.00, 3, 1, '2024-02-15 20:54:46', '2024-02-15 20:54:46', 0),
	(235, 96, NULL, 'CHILD', '20240215-0096', 20.00, 3, 1, '2024-02-15 20:56:55', '2024-02-15 20:56:55', 0),
	(236, 97, NULL, 'CHILD', '20240215-0097', 20.00, 3, 1, '2024-02-15 21:00:25', '2024-02-15 21:00:25', 0),
	(237, 98, NULL, 'CHILD', '20240215-0098', 20.00, 3, 1, '2024-02-15 21:02:03', '2024-02-15 21:02:03', 0),
	(238, 99, NULL, 'CHILD', '20240215-0099', 20.00, 3, 1, '2024-02-15 21:02:42', '2024-02-15 21:02:42', 0),
	(239, 100, NULL, 'CHILD', '20240215-0100', 20.00, 3, 1, '2024-02-15 21:11:01', '2024-02-15 21:11:01', 0),
	(240, 101, NULL, 'CHILD', '20240215-0101', 20.00, 3, 1, '2024-02-15 21:12:09', '2024-02-15 21:12:09', 0),
	(241, 102, NULL, 'CHILD', '20240215-0102', 20.00, 3, 1, '2024-02-15 21:12:46', '2024-02-15 21:12:46', 0),
	(242, 103, NULL, 'CHILD', '20240215-0103', 20.00, 3, 1, '2024-02-15 21:13:29', '2024-02-15 21:13:29', 0),
	(243, 104, NULL, 'CHILD', '20240215-0104', 20.00, 3, 1, '2024-02-15 21:14:03', '2024-02-15 21:14:03', 0),
	(244, 105, NULL, 'CHILD', '20240215-0105', 20.00, 3, 1, '2024-02-15 21:14:32', '2024-02-15 21:14:32', 0),
	(245, 106, NULL, 'CHILD', '20240215-0106', 20.00, 3, 1, '2024-02-15 21:15:33', '2024-02-15 21:15:33', 0),
	(246, 107, NULL, 'CHILD', '20240215-0107', 20.00, 3, 1, '2024-02-15 21:16:15', '2024-02-15 21:16:15', 0),
	(247, 108, NULL, 'CHILD', '20240215-0108', 20.00, 3, 1, '2024-02-15 21:18:49', '2024-02-15 21:18:49', 0),
	(248, 109, NULL, 'CHILD', '20240215-0109', 20.00, 3, 1, '2024-02-15 21:20:21', '2024-02-15 21:20:21', 0),
	(249, 110, NULL, 'CHILD', '20240215-0110', 20.00, 3, 1, '2024-02-15 21:21:25', '2024-02-15 21:21:25', 0),
	(250, 111, NULL, 'CHILD', '20240215-0111', 20.00, 3, 1, '2024-02-15 21:22:22', '2024-02-15 21:22:22', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

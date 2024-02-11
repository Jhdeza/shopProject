-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.2.0 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
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

-- Dumping data for table chapintec.about_us: 1 rows
DELETE FROM `about_us`;
/*!40000 ALTER TABLE `about_us` DISABLE KEYS */;
INSERT INTO `about_us` (`id`, `titulo`, `extracto`, `extracto_team`) VALUES
	(1, 'Your Trusted & Reliable Partner.', 'Bienvenido a AutoPartes ImportaTodo, tu destino confiable para piezas de automóviles de alta calidad. Nos especializamos en la importación y venta de una amplia gama de piezas para vehículos de todas las marcas y modelos. Desde frenos hasta filtros, y desde sistemas de escape hasta componentes eléctricos, tenemos todo lo que necesitas para mantener tu vehículo en excelente estado.', 'En AutoPartes ImportaTodo, nuestro éxito radica en un equipo apasionado y colaborativo. Desde el equipo de compras hasta el personal de ventas, cada miembro contribuye con habilidades únicas para ofrecer las mejores soluciones en piezas de automóviles. Fomentamos un ambiente de trabajo basado en la integridad y el compromiso con la calidad, valorando la diversidad de ideas. Más que colegas, somos una familia que celebra logros individuales y colectivos. En AutoPartes ImportaTodo, nuestro equipo es el motor que impulsa nuestro éxito, y estamos emocionados de enfrentar futuros desafíos juntos.');
/*!40000 ALTER TABLE `about_us` ENABLE KEYS */;

-- Dumping structure for table chapintec.branch
DROP TABLE IF EXISTS `branch`;
CREATE TABLE IF NOT EXISTS `branch` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `logo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table chapintec.branch: 2 rows
DELETE FROM `branch`;
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
INSERT INTO `branch` (`id`, `name`, `active`, `logo`) VALUES
	(1, 'mercedes', 1, ''),
	(2, 'BMW', 1, '');
/*!40000 ALTER TABLE `branch` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.categories: ~67 rows (approximately)
DELETE FROM `categories`;
INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`, `views`) VALUES
	(1, 'Motor y Componentes', NULL, 'motor-y-componentes', 30),
	(2, 'Transmisión y Embrague', NULL, 'transmision-y-embrague', 12),
	(3, 'Sistema de Escape', NULL, 'sistema-de-escape', 3),
	(4, 'Suspensión y Dirección', NULL, 'suspension-y-direccion', 0),
	(5, 'Frenos y Componentes', NULL, 'frenos-y-componentes', 0),
	(6, 'Electrónica y Encendido', NULL, 'electronica-y-encendido', 8),
	(7, 'Iluminación y Accesorios', NULL, 'iluminacion-y-accesorios', 0),
	(8, 'Interior y Confort', NULL, 'interior-y-confort', 0),
	(9, 'Exterior y Estilo', NULL, 'exterior-y-estilo', 0),
	(10, 'Ruedas y Neumáticos', NULL, 'ruedas-y-neumaticos', 0),
	(11, 'Motores completos', 1, 'motores-completos', 3),
	(12, 'Bloques de motor', 1, 'bloques-de-motor', 0),
	(13, 'Cigüeñales', 1, 'ciguenales', 0),
	(14, 'Culatas', 1, 'culatas', 0),
	(15, 'Pistones y Bielas', 1, 'pistones-y-bielas', 0),
	(16, 'Bombas de aceite y agua', 1, 'bombas-de-aceite-y-agua', 0),
	(17, 'Kit de distribución', 1, 'kit-de-distribución', 0),
	(18, 'Transmisiones automáticas', 2, 'transmisiones-automaticas', 4),
	(19, 'Transmisiones manuales', 2, 'transmisiones-manuales', 3),
	(20, 'Embragues y componentes', 2, 'embragues-y-componentes', 0),
	(21, 'Convertidores de par', 2, 'convertidores-de-par', 1),
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
	(51, 'Asientos deportivos', 8, 'asientos-deportivos', 0),
	(52, 'Volantes deportivos', 8, 'volantes-deportivos', 0),
	(53, 'Tapicería personalizada', 8, 'tapiceria-personalizada', 0),
	(54, 'Sistemas de sonido y multimedia', 8, 'sistemas-de-sonido-y-multimedia', 0),
	(55, 'Accesorios de climatización', 8, 'accesorios-de-climatizacion', 0),
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
	(70, 'Aceites y Luricantes', NULL, 'aceites-y-luricantes', 6);

-- Dumping structure for table chapintec.characteristics
DROP TABLE IF EXISTS `characteristics`;
CREATE TABLE IF NOT EXISTS `characteristics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `characteristics_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.characteristics: ~2 rows (approximately)
DELETE FROM `characteristics`;
INSERT INTO `characteristics` (`id`, `name`) VALUES
	(1, 'Color'),
	(2, 'forma');

-- Dumping structure for table chapintec.characteristic_value
DROP TABLE IF EXISTS `characteristic_value`;
CREATE TABLE IF NOT EXISTS `characteristic_value` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `characteristic_id` bigint unsigned NOT NULL,
  `value_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `characteristic_value_characteristic_id_foreign` (`characteristic_id`),
  KEY `characteristic_value_value_id_foreign` (`value_id`),
  CONSTRAINT `characteristic_value_characteristic_id_foreign` FOREIGN KEY (`characteristic_id`) REFERENCES `characteristics` (`id`),
  CONSTRAINT `characteristic_value_value_id_foreign` FOREIGN KEY (`value_id`) REFERENCES `values` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.characteristic_value: ~9 rows (approximately)
DELETE FROM `characteristic_value`;
INSERT INTO `characteristic_value` (`id`, `characteristic_id`, `value_id`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 1, 3),
	(4, 1, 4),
	(5, 1, 5),
	(6, 1, 6),
	(7, 2, 7),
	(8, 2, 8),
	(9, 2, 9);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.characteristic_variation: ~0 rows (approximately)
DELETE FROM `characteristic_variation`;

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

-- Dumping data for table chapintec.client_contact_informations: ~1 rows (approximately)
DELETE FROM `client_contact_informations`;
INSERT INTO `client_contact_informations` (`id`, `name`, `email_address`, `client_phone`, `message`, `reading`) VALUES
	(7, 'javier', 'javier@gmial.com', '+536608236', 'dghsgdhdfg hfgh dfgh dfgh dfgh dfgh', 0);

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
INSERT INTO `contacts_information` (`id`, `name_contact`, `phone_contacts`, `email`, `address_contacts`, `description`, `social_facebook`, `social_instagram`, `social_twitter`) VALUES
	(1, 'jjaflasfk', '+8951654645', 'javier@gmail.com', 'gsdfgsdfg', 'sdfgsdfgsdf', 'https://www.facebook.com/profile.php?id=100008852024042', NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.images: 10 rows
DELETE FROM `images`;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `url`, `is_main`, `imageable_id`, `imageable_type`, `description`, `active`) VALUES
	(1, 'storage/Logo/1706561413.jpg', 0, 1, 'App\\Models\\Contact_information', NULL, 1),
	(2, 'storage/categories/_1706580510.png', 0, 2, 'App\\Models\\Category', NULL, 1),
	(3, 'storage/products/p_5_170671487378.jpg', 1, 5, 'App\\Models\\Product', NULL, 1),
	(4, 'storage/products/p_6_170671528111.jpg', 1, 6, 'App\\Models\\Product', NULL, 1),
	(12, 'storage/products/p_10_170731690761.jpg', 1, 10, 'App\\Models\\Product', NULL, 1),
	(9, 'storage/products/p_8_170731646686.jpg', 1, 8, 'App\\Models\\Product', NULL, 1),
	(13, 'storage/products/p_7_170731817034.jpg', 1, 7, 'App\\Models\\Product', NULL, 1),
	(14, 'storage/products/p_11_170732074110.jpg', 1, 11, 'App\\Models\\Product', NULL, 1),
	(15, 'storage/products/p_11_170732074288.jpg', 0, 11, 'App\\Models\\Product', NULL, 1),
	(16, 'storage/products/p_11_170732074225.jpg', 0, 11, 'App\\Models\\Product', NULL, 1);
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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table chapintec.models: 2 rows
DELETE FROM `models`;
/*!40000 ALTER TABLE `models` DISABLE KEYS */;
INSERT INTO `models` (`id`, `name`, `active`) VALUES
	(1, 'modelo 1', 1),
	(2, 'modelo 2', 1);
/*!40000 ALTER TABLE `models` ENABLE KEYS */;

-- Dumping structure for table chapintec.oferts
DROP TABLE IF EXISTS `oferts`;
CREATE TABLE IF NOT EXISTS `oferts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double(8,2) NOT NULL DEFAULT '0.00',
  `date_ini` timestamp NOT NULL,
  `date_end` timestamp NOT NULL,
  `active` tinyint(1) NOT NULL,
  `Type` enum('FIXED','PERCENT') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `oferts_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.oferts: ~2 rows (approximately)
DELETE FROM `oferts`;
INSERT INTO `oferts` (`id`, `name`, `value`, `date_ini`, `date_end`, `active`, `Type`) VALUES
	(2, 'pepe', 45.00, '2024-02-03 05:00:00', '2024-02-09 05:00:00', 1, 'PERCENT'),
	(3, 'lajshfasj', 6000.00, '2024-01-31 05:00:00', '2024-02-08 05:00:00', 1, 'FIXED');

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
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
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
  `models_id` bigint DEFAULT NULL,
  `branch_id` bigint DEFAULT NULL,
  `garantity_type` enum('DAY','MONTH','YEAR') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `garantity_time` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_ofert_id_foreign` (`ofert_id`),
  KEY `products_sub_category_id_foreign` (`sub_category_id`),
  KEY `product_models_id_foreign` (`models_id`),
  KEY `product_branch_id_foreign` (`branch_id`),
  CONSTRAINT `product_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`),
  CONSTRAINT `product_models_id_foreign` FOREIGN KEY (`models_id`) REFERENCES `models` (`id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `products_ofert_id_foreign` FOREIGN KEY (`ofert_id`) REFERENCES `oferts` (`id`),
  CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.products: ~5 rows (approximately)
DELETE FROM `products`;
INSERT INTO `products` (`id`, `description`, `name`, `price`, `quantity`, `quantity_alert`, `act_carusel`, `is_new`, `views`, `category_id`, `ofert_id`, `sub_category_id`, `details`, `type`, `models_id`, `branch_id`, `garantity_type`, `garantity_time`) VALUES
	(7, 'jshdflsjkfhdlskjdfhlskjdfhslkfjd', 'Cremallera Hidraulica', 2000.00, 20, 5, 1, 0, 7, 1, NULL, 17, NULL, NULL, NULL, NULL, NULL, NULL),
	(8, 'bomba hidraulica', 'Bomba Hidraulica', 5000.00, 9, 2, 0, 0, 5, 1, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL),
	(9, 'prueba nuevo 1', 'nuevo1', 3000.00, 42, 10, 0, 0, 0, 1, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL),
	(10, 'Grasa de USO MULTIPLE y extrema presión preparadas para su aplicación en todo tipo de rodamientos y cojinetes planos, sistemas centralizados,etc.', 'Grasa Cepsa Arga Litio EP', 10.00, 4, 1, 0, 0, 8, 70, NULL, NULL, '-Es una grasa especialmente recomendada para la lubricación de cojinetes planos, de bolas, rodillos y rodamientos y en general en mecanismos sometidos a cargas elevadas, así donde se necesite protección anti desgaste y elevado rendimiento en la lubricación.', NULL, NULL, NULL, NULL, NULL),
	(11, 'Cepsa Genuine 10W40 MAX es un lubricante universal con tecnología sintética para motores gasolina y diesel en servicios de utilización severos.', 'Aceite Cepsa Genuine', 20.00, 38, 10, 1, 1, 1, 70, NULL, NULL, '<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 0.8rem; font-family: Sora; color: rgb(29, 37, 39); font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"><strong style="box-sizing: border-box; font-weight: bolder;">Cepsa Genuine 10W40</strong><span>&nbsp;</span>es un lubricante sintético diseñado para cumplir con los niveles de calidad exigidos por los fabricantes de motores gasolina y diesel así como LPG y CNG.</p><ul style="box-sizing: border-box; margin-bottom: 0px; margin-top: 0px; list-style: disc; padding: 0.6rem 0.6rem 0.6rem 2rem; color: rgb(29, 37, 39); font-family: Sora; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"><li style="box-sizing: border-box; font-family: Sora;">Facilita el arranque en frio, reduciendo el desgaste del motor.</li><li style="box-sizing: border-box; font-family: Sora;">Presenta un baja volatilidad y bajo consumo de aceite en largos recorridos.</li><li style="box-sizing: border-box; font-family: Sora;">Es compatible con los sistemas catalíticos de eliminación de contaminantes excepto los filtros de partículas DPF.</li><li style="box-sizing: border-box; font-family: Sora;">Posee un elevado poder detergente/dispersante que evita la formación de lodos en los filtros y la obstrucción del circuito de lubricación.</li><li style="box-sizing: border-box; font-family: Sora;">Alto poder antidesgaste.</li><li style="box-sizing: border-box; font-family: Sora;">Usable en cualquier época del año.</li></ul>', NULL, NULL, NULL, NULL, NULL);

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

-- Dumping data for table chapintec.staff: 1 rows
DELETE FROM `staff`;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` (`id`, `name`, `position`, `facebook`, `Twitter`, `Instagram`) VALUES
	(1, 'asfsadfsdf', 'sdafsafd', 'https://www.facebook.com/profile.php?id=100008852024042', NULL, NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.values: ~9 rows (approximately)
DELETE FROM `values`;
INSERT INTO `values` (`id`, `name`) VALUES
	(3, 'azul'),
	(5, 'carmelita'),
	(8, 'cuadrado'),
	(4, 'negro'),
	(7, 'redondo'),
	(1, 'rojo'),
	(6, 'rosado'),
	(9, 'triangular'),
	(2, 'verde');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.variations: ~0 rows (approximately)
DELETE FROM `variations`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

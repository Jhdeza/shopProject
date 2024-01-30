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
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extracto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `extracto_team` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.about_us: 1 rows
DELETE FROM `about_us`;
/*!40000 ALTER TABLE `about_us` DISABLE KEYS */;
INSERT INTO `about_us` (`id`, `titulo`, `extracto`, `extracto_team`) VALUES
	(1, 'Your Trusted & Reliable Partner.', 'Bienvenido a AutoPartes ImportaTodo, tu destino confiable para piezas de automóviles de alta calidad. Nos especializamos en la importación y venta de una amplia gama de piezas para vehículos de todas las marcas y modelos. Desde frenos hasta filtros, y desde sistemas de escape hasta componentes eléctricos, tenemos todo lo que necesitas para mantener tu vehículo en excelente estado.', 'En AutoPartes ImportaTodo, nuestro éxito radica en un equipo apasionado y colaborativo. Desde el equipo de compras hasta el personal de ventas, cada miembro contribuye con habilidades únicas para ofrecer las mejores soluciones en piezas de automóviles. Fomentamos un ambiente de trabajo basado en la integridad y el compromiso con la calidad, valorando la diversidad de ideas. Más que colegas, somos una familia que celebra logros individuales y colectivos. En AutoPartes ImportaTodo, nuestro equipo es el motor que impulsa nuestro éxito, y estamos emocionados de enfrentar futuros desafíos juntos.');
/*!40000 ALTER TABLE `about_us` ENABLE KEYS */;

-- Dumping structure for table chapintec.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.categories: ~6 rows (approximately)
DELETE FROM `categories`;
INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`) VALUES
	(2, 'Automotores', NULL, 'automotores'),
	(3, 'Motos', 2, 'motos'),
	(4, 'Autos', 2, 'autos'),
	(5, 'Camiones', 2, 'camiones'),
	(6, 'Electrodomesticos', NULL, 'electrodomesticos'),
	(7, 'Lavadoras', 6, 'lavadoras');

-- Dumping structure for table chapintec.characteristics
DROP TABLE IF EXISTS `characteristics`;
CREATE TABLE IF NOT EXISTS `characteristics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `characteristics_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.characteristics: ~0 rows (approximately)
DELETE FROM `characteristics`;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.characteristic_value: ~0 rows (approximately)
DELETE FROM `characteristic_value`;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.characteristic_variation: ~0 rows (approximately)
DELETE FROM `characteristic_variation`;

-- Dumping structure for table chapintec.client_contact_informations
DROP TABLE IF EXISTS `client_contact_informations`;
CREATE TABLE IF NOT EXISTS `client_contact_informations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_phone` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reading` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.client_contact_informations: ~1 rows (approximately)
DELETE FROM `client_contact_informations`;
INSERT INTO `client_contact_informations` (`id`, `name`, `email_address`, `client_phone`, `message`, `reading`) VALUES
	(6, 'jafhasjlkfh', 'hksdfg@hgsdh.com', '549846546', 'ksdafklauebcklkasjh h fklhaslkdfjha sklfgdlkasgdflas', NULL);

-- Dumping structure for table chapintec.contacts_information
DROP TABLE IF EXISTS `contacts_information`;
CREATE TABLE IF NOT EXISTS `contacts_information` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_contact` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_contacts` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_contacts` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.contacts_information: ~1 rows (approximately)
DELETE FROM `contacts_information`;
INSERT INTO `contacts_information` (`id`, `name_contact`, `phone_contacts`, `email`, `address_contacts`, `description`, `social_facebook`, `social_instagram`, `social_twitter`) VALUES
	(1, 'jjaflasfk', '+8951654645', 'javier@gmail.com', 'gsdfgsdfg', 'sdfgsdfgsdf', NULL, NULL, NULL);

-- Dumping structure for table chapintec.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `imageable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.images: 2 rows
DELETE FROM `images`;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `url`, `is_main`, `imageable_id`, `imageable_type`, `description`, `active`) VALUES
	(1, 'storage/Logo/1706561413.jpg', 0, 1, 'App\\Models\\Contact_information', NULL, 1),
	(2, 'storage/categories/_1706580510.png', 0, 2, 'App\\Models\\Category', NULL, 1);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping structure for table chapintec.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

-- Dumping structure for table chapintec.oferts
DROP TABLE IF EXISTS `oferts`;
CREATE TABLE IF NOT EXISTS `oferts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` int NOT NULL,
  `date_ini` timestamp NOT NULL,
  `date_end` timestamp NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `oferts_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.oferts: ~2 rows (approximately)
DELETE FROM `oferts`;
INSERT INTO `oferts` (`id`, `name`, `percent`, `date_ini`, `date_end`, `active`) VALUES
	(2, 'pepe', 45, '2024-02-03 05:00:00', '2024-02-09 05:00:00', 0),
	(3, 'lajshfasj', 98, '2024-01-31 05:00:00', '2024-02-08 05:00:00', 0);

-- Dumping structure for table chapintec.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int NOT NULL,
  `quantity_alert` int NOT NULL,
  `act_carusel` tinyint(1) DEFAULT NULL,
  `is_new` tinyint(1) DEFAULT NULL,
  `views` int NOT NULL DEFAULT '0',
  `category_id` bigint unsigned DEFAULT NULL,
  `ofert_id` bigint unsigned DEFAULT NULL,
  `sub_category_id` bigint unsigned DEFAULT NULL,
  `stock` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_ofert_id_foreign` (`ofert_id`),
  KEY `products_sub_category_id_foreign` (`sub_category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `products_ofert_id_foreign` FOREIGN KEY (`ofert_id`) REFERENCES `oferts` (`id`),
  CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.products: ~2 rows (approximately)
DELETE FROM `products`;
INSERT INTO `products` (`id`, `name`, `color`, `form`, `description`, `price`, `quantity`, `quantity_alert`, `act_carusel`, `is_new`, `views`, `category_id`, `ofert_id`, `sub_category_id`, `stock`) VALUES
	(3, 'Auto Toyota', NULL, NULL, 'jfhgsdfg sdfg sdfg sdfg sdf', 5468.00, 98, 5, 1, 0, 0, 2, 2, 4, 0),
	(4, 'moto jawa', NULL, NULL, 'sdfsdf sg sdf', 98568.10, 856, 98, 0, 1, 0, 2, NULL, 3, 0);

-- Dumping structure for table chapintec.staff
DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Twitter` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Instagram` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.staff: 1 rows
DELETE FROM `staff`;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` (`id`, `name`, `position`, `facebook`, `Twitter`, `Instagram`) VALUES
	(1, 'asfsadfsdf', 'sdafsafd', NULL, NULL, NULL);
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;

-- Dumping structure for table chapintec.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.users: 1 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'javier', 'javier@gmail.com', NULL, '$2y$12$hkjIbv1STVzcSMGiS.w60edNcPCOIBRmBnpxepNAjHgf9ereKjkLq', '3z0cEIgNbsJim1nvkbATSTBVeHny4TcSQyZMCjPPNsPNxWvThDHAly5NRRln', '2024-01-30 01:48:57', '2024-01-30 01:48:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table chapintec.values
DROP TABLE IF EXISTS `values`;
CREATE TABLE IF NOT EXISTS `values` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `values_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.values: ~0 rows (approximately)
DELETE FROM `values`;

-- Dumping structure for table chapintec.variations
DROP TABLE IF EXISTS `variations`;
CREATE TABLE IF NOT EXISTS `variations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `ofert_id` bigint unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stock` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `variations_sub_sku_unique` (`sub_sku`),
  KEY `variations_product_id_foreign` (`product_id`),
  KEY `variations_ofert_id_foreign` (`ofert_id`),
  CONSTRAINT `variations_ofert_id_foreign` FOREIGN KEY (`ofert_id`) REFERENCES `oferts` (`id`),
  CONSTRAINT `variations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table chapintec.variations: ~0 rows (approximately)
DELETE FROM `variations`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

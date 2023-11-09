-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table belajar-laravel.categories: ~2 rows (approximately)
REPLACE INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Sport', '2023-11-09 01:50:01', '2023-11-09 01:50:01'),
	(2, 'Daily', '2023-11-09 01:50:01', '2023-11-09 01:50:01');

-- Dumping data for table belajar-laravel.failed_jobs: ~0 rows (approximately)

-- Dumping data for table belajar-laravel.migrations: ~0 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_11_09_014517_create_products_table', 1),
	(6, '2023_11_09_015130_create_categories_table', 1),
	(7, '2023_11_09_051051_create_roles_table', 1);

-- Dumping data for table belajar-laravel.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table belajar-laravel.personal_access_tokens: ~0 rows (approximately)

-- Dumping data for table belajar-laravel.products: ~2 rows (approximately)
REPLACE INTO `products` (`id`, `name`, `category_id`, `product_code`, `description`, `price`, `unit`, `stock`, `created_at`, `updated_at`) VALUES
	(1, 'Al-phard', 1, 'P0001', 'Al-Phard 2000CC Solar', 50000, 'unit', 2, '2023-11-09 01:50:01', '2023-11-09 01:50:01'),
	(2, 'Mercy', 1, 'P0003', 'Mercy 200CC Bensin', 60000, 'unit', 4, '2023-11-09 01:50:01', '2023-11-09 01:50:01');

-- Dumping data for table belajar-laravel.users: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

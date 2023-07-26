-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_ppid
CREATE DATABASE IF NOT EXISTS `db_ppid` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_ppid`;

-- Dumping structure for table db_ppid.anytime_information
CREATE TABLE IF NOT EXISTS `anytime_information` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ppid.anytime_information: ~0 rows (approximately)
/*!40000 ALTER TABLE `anytime_information` DISABLE KEYS */;
/*!40000 ALTER TABLE `anytime_information` ENABLE KEYS */;

-- Dumping structure for table db_ppid.anytime_information_lists
CREATE TABLE IF NOT EXISTS `anytime_information_lists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `anytime_information_lists_parent_id_foreign` (`parent_id`),
  CONSTRAINT `anytime_information_lists_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `anytime_information` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ppid.anytime_information_lists: ~0 rows (approximately)
/*!40000 ALTER TABLE `anytime_information_lists` DISABLE KEYS */;
/*!40000 ALTER TABLE `anytime_information_lists` ENABLE KEYS */;

-- Dumping structure for table db_ppid.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ppid.contacts: ~0 rows (approximately)
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Alamat', 'Layanan Informasi Terpadu (LITe), Badan Standardisasi Nasional, Gedung I BPPT Lantai Dasar, Jl. M.H. Thamrin no. 8, Kebon Sirih, Jakarta Pusat 10340', '2023-07-26 22:39:23', '2023-07-26 22:39:23'),
	(2, 'Email', 'dokinfo@bsn.go.id', '2023-07-26 22:39:54', '2023-07-26 22:39:54'),
	(3, 'Telepon', '(021) 3927422 / (021) 3927527 / (021) 3917300', '2023-07-26 22:40:50', '2023-07-26 22:40:50'),
	(4, 'Whatsapp', '081317761112', '2023-07-26 22:41:06', '2023-07-26 22:41:06');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;

-- Dumping structure for table db_ppid.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ppid.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table db_ppid.faqs
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ppid.faqs: ~0 rows (approximately)
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;

-- Dumping structure for table db_ppid.immediately_information
CREATE TABLE IF NOT EXISTS `immediately_information` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ppid.immediately_information: ~0 rows (approximately)
/*!40000 ALTER TABLE `immediately_information` DISABLE KEYS */;
/*!40000 ALTER TABLE `immediately_information` ENABLE KEYS */;

-- Dumping structure for table db_ppid.immediately_information_lists
CREATE TABLE IF NOT EXISTS `immediately_information_lists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `immediately_information_lists_parent_id_foreign` (`parent_id`),
  CONSTRAINT `immediately_information_lists_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `immediately_information` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ppid.immediately_information_lists: ~0 rows (approximately)
/*!40000 ALTER TABLE `immediately_information_lists` DISABLE KEYS */;
/*!40000 ALTER TABLE `immediately_information_lists` ENABLE KEYS */;

-- Dumping structure for table db_ppid.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ppid.migrations: ~18 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_07_02_104116_create_profiles_table', 1),
	(6, '2023_07_02_104648_create_contacts_table', 1),
	(7, '2023_07_02_111227_create_pi_services_table', 1),
	(8, '2023_07_02_111419_create_faqs_table', 1),
	(9, '2023_07_11_103847_create_regulation_lists_table', 1),
	(10, '2023_07_11_103848_create_regulations_table', 1),
	(11, '2023_07_14_113745_create_anytime_information_lists_table', 1),
	(12, '2023_07_14_113746_create_anytime_information_table', 1),
	(13, '2023_07_14_134242_create_periodic_information_lists_table', 1),
	(14, '2023_07_14_134243_create_periodic_information_table', 1),
	(15, '2023_07_14_134750_create_immediately_information_lists_table', 1),
	(16, '2023_07_14_134751_create_immediately_information_table', 1),
	(17, '2023_07_14_140236_create_other_information_lists_table', 1),
	(18, '2023_07_14_140237_create_other_information_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table db_ppid.other_information
CREATE TABLE IF NOT EXISTS `other_information` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ppid.other_information: ~0 rows (approximately)
/*!40000 ALTER TABLE `other_information` DISABLE KEYS */;
/*!40000 ALTER TABLE `other_information` ENABLE KEYS */;

-- Dumping structure for table db_ppid.other_information_lists
CREATE TABLE IF NOT EXISTS `other_information_lists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `other_information_lists_parent_id_foreign` (`parent_id`),
  CONSTRAINT `other_information_lists_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `other_information` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ppid.other_information_lists: ~0 rows (approximately)
/*!40000 ALTER TABLE `other_information_lists` DISABLE KEYS */;
/*!40000 ALTER TABLE `other_information_lists` ENABLE KEYS */;

-- Dumping structure for table db_ppid.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ppid.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table db_ppid.periodic_information
CREATE TABLE IF NOT EXISTS `periodic_information` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ppid.periodic_information: ~0 rows (approximately)
/*!40000 ALTER TABLE `periodic_information` DISABLE KEYS */;
/*!40000 ALTER TABLE `periodic_information` ENABLE KEYS */;

-- Dumping structure for table db_ppid.periodic_information_lists
CREATE TABLE IF NOT EXISTS `periodic_information_lists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `periodic_information_lists_parent_id_foreign` (`parent_id`),
  CONSTRAINT `periodic_information_lists_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `periodic_information` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ppid.periodic_information_lists: ~0 rows (approximately)
/*!40000 ALTER TABLE `periodic_information_lists` DISABLE KEYS */;
/*!40000 ALTER TABLE `periodic_information_lists` ENABLE KEYS */;

-- Dumping structure for table db_ppid.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ppid.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table db_ppid.pi_services
CREATE TABLE IF NOT EXISTS `pi_services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ppid.pi_services: ~0 rows (approximately)
/*!40000 ALTER TABLE `pi_services` DISABLE KEYS */;
/*!40000 ALTER TABLE `pi_services` ENABLE KEYS */;

-- Dumping structure for table db_ppid.profiles
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ppid.profiles: ~0 rows (approximately)
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` (`id`, `title`, `description`, `img`, `created_at`, `updated_at`) VALUES
	(1, 'Latar Belakang', 'Masyarakat berhak untuk mengetahui rencana pembuatan kebijakan publik, program kebijakan publik, dan proses pengambilan keputusan publik, serta alasan pengambilan suatu keputusan publik. Dengan diberlakukannya Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik, maka Badan Standardisasi Nasional (BSN) – selaku salah satu badan publik - berkewajiban untuk memberikan layanan informasi publik kepada masyarakat, menciptakan dan menjamin kelancaraan dalam pelayanan informasi publik. Layanan informasi publik dapat diakses dengan mudah, bahkan lebih lanjut perlu melakukan pengelolaan informasi publik dan dokumentasi yang dapat menjamin penyediaan informasi yang mudah, cermat, cepat, dan akurat dengan memanfaatkan teknologi informasi dan komunikasi.<br />\r\n<br />\r\nBSN mengeluarkan Keputusan Kepala Badan Standardisasi Nasional Nomor 338/KEP/BSN/8/2020 tentang Penunjukan Pejabat Pengelola Informasi dan Dokumentasi dan Petugas Informasi di lingkungan Badan Standardisasi Nasional. Selain itu, dalam rangka menyelenggarakan pelayanan publik yang baik dan optimal, BSN menyediakan sarana, prasarana, fasilitas berupa pusat layanan informasi, fasilitas pendukung seperti layanan petugas pelaksana layanan informasi, produk pelayanan, serta menetapkan waktu layanan informasi.', NULL, '2023-07-26 22:43:39', '2023-07-26 22:43:39'),
	(2, 'Visi Misi', 'Visi :<br />\r\nTerciptanya layanan informasi publik BSN yang cepat, tepat dan transparan sesuai dengan ketentuan dan peraturan yang berlaku.<br />\r\n<br />\r\nMisi :<br />\r\n1. Meningkatkan sistem layanan informasi publik.<br />\r\n2. Membangun kualitas layanan informasi publik sesuai dengan norma yang berlaku.', NULL, '2023-07-26 22:45:05', '2023-07-26 22:45:05'),
	(3, 'Tugas dan Fungsi', 'Melakukan penyimpanan, pendokumentasian, penyediaan, dan/atau pelayanan informasi publik di Badan Standardisasi Nasional (BSN).', NULL, '2023-07-26 22:46:01', '2023-07-26 22:46:01'),
	(4, 'Struktur Organisasi', 'Berikut adalah gambar struktur organisasi PPID Badan Standardisasi Nasional.', '20230726225004 - Struktur Organisasi.jpg', '2023-07-26 22:50:04', '2023-07-26 22:50:04');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;

-- Dumping structure for table db_ppid.regulations
CREATE TABLE IF NOT EXISTS `regulations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ppid.regulations: ~0 rows (approximately)
/*!40000 ALTER TABLE `regulations` DISABLE KEYS */;
/*!40000 ALTER TABLE `regulations` ENABLE KEYS */;

-- Dumping structure for table db_ppid.regulation_lists
CREATE TABLE IF NOT EXISTS `regulation_lists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `regulation_id` bigint(20) unsigned NOT NULL,
  `regulation_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regulation_about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `regulation_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `regulation_lists_regulation_id_foreign` (`regulation_id`),
  CONSTRAINT `regulation_lists_regulation_id_foreign` FOREIGN KEY (`regulation_id`) REFERENCES `regulations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ppid.regulation_lists: ~0 rows (approximately)
/*!40000 ALTER TABLE `regulation_lists` DISABLE KEYS */;
/*!40000 ALTER TABLE `regulation_lists` ENABLE KEYS */;

-- Dumping structure for table db_ppid.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ppid.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `level`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Super Admin', 'dokinfo@bsn.go.id', 0, NULL, '$2y$10$Oh4mEF2LwdPXozb.Md3f6OsXoic9lBk5UFyzBw7Z4iT63F6bDouWC', NULL, '2023-07-26 22:33:33', '2023-07-26 22:33:33');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

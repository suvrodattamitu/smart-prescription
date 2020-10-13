-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'admin',	'admin@admin.com',	'2020-10-10 23:55:43',	'$2y$10$MdnSm//i6/0U1x.DjJPaPeiV1nyVhMZAwuFyILn2cw/j31f29Zg6e',	'yPAPEmKtY9',	'2020-10-10 23:55:43',	'2020-10-10 23:55:43');

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE `user_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` text COLLATE utf8mb4_unicode_ci,
  `gender` tinyint(1) DEFAULT NULL,
  `website_url` text COLLATE utf8mb4_unicode_ci,
  `designation` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_details_user_id_index` (`user_id`),
  CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `companies` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1,	'Lindgren PLC',	'Optio nesciunt aut suscipit facere quidem reprehenderit veniam. Quo aut qui quia esse expedita qui vero. Est et ea deserunt minus. Esse id ad et culpa.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(2,	'Hahn-Balistreri',	'Et eos tenetur aperiam vero accusantium consequatur sit. Debitis et tempore quis nemo sed et. Ad voluptas vero accusantium aut nulla labore. Consequuntur dolore placeat consequatur ea aut voluptas eaque. Mollitia aut laboriosam consequatur facilis ipsum culpa necessitatibus aut.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(3,	'Bahringer, Rice and O\'Connell',	'Atque et incidunt velit autem quae sit. Quia et blanditiis quo voluptatibus. Doloremque excepturi animi est et perferendis.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(4,	'Lueilwitz, Wintheiser and Stroman',	'Nihil et et totam quia. Molestias fuga aut consectetur nostrum sed distinctio. Eaque aspernatur consequatur numquam a deserunt. Eos nihil excepturi nemo architecto rerum. Rerum et optio quisquam quibusdam recusandae dolor eaque.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(5,	'Schinner, Hand and DuBuque',	'Consequatur sint commodi quae autem at in at. Cupiditate consectetur ipsum nobis. Et doloribus labore ad sint praesentium non delectus.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(6,	'Hermiston-Osinski',	'Assumenda alias exercitationem distinctio dicta tenetur aut quod. Quia consectetur et rem ipsa. Sapiente repellendus nesciunt suscipit sit dolorem deleniti. Ut explicabo in eius vero debitis.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(7,	'Friesen PLC',	'Rerum aut deserunt nesciunt cupiditate deleniti nobis debitis aut. Qui delectus molestias quae recusandae quo. Ipsa dolores assumenda enim voluptatum.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(8,	'Friesen-Bashirian',	'Unde repellendus sapiente reiciendis minima. Omnis et assumenda placeat quo. Illum et debitis aliquid omnis quisquam cum nemo soluta. Ducimus sunt quaerat accusamus.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(9,	'Harris, Jacobi and Kub',	'Illum assumenda quidem laborum explicabo pariatur illo non. Id quo non sed ad est non porro. Voluptatibus recusandae illum voluptatibus dolores maxime nesciunt.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(10,	'Upton and Sons',	'Est explicabo aliquam error dolorem id est. Voluptas suscipit est hic totam autem quos ducimus. Itaque consequuntur iusto placeat dolorem magni laboriosam dolores.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `medical_tests`;
CREATE TABLE `medical_tests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `medical_tests` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1,	'Brakus',	'Fuga placeat et et et omnis iusto quidem cum.',	'2020-10-10 23:55:43',	'2020-10-10 23:55:43'),
(2,	'Emmerich',	'Qui iste modi consectetur totam quia.',	'2020-10-10 23:55:43',	'2020-10-10 23:55:43'),
(3,	'Schuster',	'Laborum et eos velit recusandae animi accusamus.',	'2020-10-10 23:55:43',	'2020-10-10 23:55:43'),
(4,	'Price',	'Voluptas ut dolores non aut consequatur consequatur.',	'2020-10-10 23:55:43',	'2020-10-10 23:55:43'),
(5,	'Hahn',	'Non est corrupti officia consequatur blanditiis.',	'2020-10-10 23:55:43',	'2020-10-10 23:55:43'),
(6,	'Parisian',	'Ut omnis sed nam laboriosam iure.',	'2020-10-10 23:55:43',	'2020-10-10 23:55:43'),
(7,	'Botsford',	'Iste non et nesciunt.',	'2020-10-10 23:55:43',	'2020-10-10 23:55:43'),
(8,	'Gutkowski',	'Aliquid dolor aut tempora.',	'2020-10-10 23:55:43',	'2020-10-10 23:55:43'),
(9,	'Ruecker',	'Fuga mollitia perspiciatis ipsa fugit in et quia.',	'2020-10-10 23:55:43',	'2020-10-10 23:55:43'),
(10,	'Wintheiser',	'Voluptatum quisquam fugiat illo corporis.',	'2020-10-10 23:55:43',	'2020-10-10 23:55:43');

DROP TABLE IF EXISTS `medicine_types`;
CREATE TABLE `medicine_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `medicine_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'King',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(2,	'Durgan',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(3,	'Harber',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(4,	'Stracke',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(5,	'Kuvalis',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(6,	'Legros',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(7,	'Lang',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(8,	'Dickens',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(9,	'Schiller',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(10,	'O\'Kon',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44');

DROP TABLE IF EXISTS `medicine_groups`;
CREATE TABLE `medicine_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `medicine_groups` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1,	'Hermiston',	'Nam inventore commodi unde minima labore. Facere a maxime neque voluptas ut consequatur et. Tempore quibusdam fugiat impedit sequi ratione.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(2,	'Oberbrunner',	'Natus nemo beatae sequi explicabo voluptatem aut. At quis similique ipsum a dolorum enim. Architecto fugiat sit et odio mollitia. Deserunt necessitatibus unde fuga libero explicabo consequatur.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(3,	'Reynolds',	'Debitis blanditiis velit earum quis aspernatur voluptates. Libero ratione eos quaerat nulla. Ipsum natus maiores aut in.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(4,	'Ondricka',	'Culpa tempora eos voluptatum. Reiciendis neque eos nemo. Maxime voluptatem enim sequi totam.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(5,	'Wuckert',	'Sit sapiente dolorum explicabo excepturi sapiente in quia. Rerum totam doloribus itaque nesciunt iste enim veritatis. Nihil beatae possimus voluptas. Labore velit ipsam laboriosam sed.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(6,	'Leannon',	'Et veniam eaque dolorum tempore id ex enim. Error commodi at recusandae nam ut modi. Est recusandae laboriosam necessitatibus sint error.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(7,	'Harber',	'Soluta veniam velit iure omnis. Est eveniet repudiandae non neque labore voluptas. In expedita itaque non. Porro sequi voluptate corporis debitis illum veniam voluptatem.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(8,	'Feil',	'Architecto quo possimus pariatur a aspernatur expedita. Facere sequi ad illum repellendus necessitatibus tenetur ut exercitationem. Hic qui accusantium fugit impedit voluptatem omnis.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(9,	'Carroll',	'Reprehenderit voluptatem deserunt omnis qui nisi voluptas officiis. Totam qui ipsam tempora qui. Cupiditate quos consequuntur magnam. Laudantium a iure molestiae modi.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(10,	'Cole',	'Dolorem aut nihil ut id voluptatem officia explicabo et. Sunt labore vel velit asperiores eaque et quia. Qui rerum maxime qui illo quas et nam suscipit.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44');


DROP TABLE IF EXISTS `medicines`;
CREATE TABLE `medicines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` bigint(20) unsigned NOT NULL,
  `type_id` bigint(20) unsigned NOT NULL,
  `company_id` bigint(20) unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `medicines_group_id_index` (`group_id`),
  KEY `medicines_type_id_index` (`type_id`),
  KEY `medicines_company_id_index` (`company_id`),
  CONSTRAINT `medicines_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  CONSTRAINT `medicines_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `medicine_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `medicines_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `medicine_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `medicines` (`id`, `name`, `group_id`, `type_id`, `company_id`, `description`, `created_at`, `updated_at`) VALUES
(1,	'O\'Conner',	1,	9,	2,	'Quia quod vel sint rerum.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(2,	'Gusikowski',	8,	3,	8,	'Tempore sunt quis facilis voluptatem.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(3,	'Daugherty',	9,	3,	9,	'Quibusdam a dicta at consequatur.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(4,	'Kirlin',	3,	1,	5,	'Debitis ab sed a architecto et distinctio.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(5,	'Durgan',	3,	8,	9,	'Rerum dolore corporis sed aut dolores.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(6,	'Dietrich',	2,	9,	3,	'Dolor velit delectus nihil magni.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(7,	'Medhurst',	1,	9,	9,	'Magnam quam ipsum quae iure.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(8,	'Raynor',	3,	1,	9,	'Ut voluptatem sint officiis aut iure et.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(9,	'Heidenreich',	9,	6,	2,	'Distinctio veritatis exercitationem itaque hic iste dolor sequi.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44'),
(10,	'Turcotte',	4,	4,	2,	'Laudantium labore iste sint aliquid.',	'2020-10-10 23:55:44',	'2020-10-10 23:55:44');




DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(29,	'2014_10_12_000000_create_users_table',	1),
(30,	'2014_10_12_100000_create_password_resets_table',	1),
(31,	'2019_08_19_000000_create_failed_jobs_table',	1),
(32,	'2020_09_13_155419_create_medicine_groups_table',	1),
(33,	'2020_09_13_161910_create_medical_tests_table',	1),
(34,	'2020_09_14_141533_create_medicine_types_table',	1),
(35,	'2020_09_14_152220_create_companies_table',	1),
(36,	'2020_09_14_162017_create_medicines_table',	1),
(37,	'2020_09_14_162104_create_patients_table',	1),
(38,	'2020_09_16_150953_create_user_details_table',	1),
(39,	'2020_09_17_172419_create_prescriptions_table',	1),
(40,	'2020_09_19_030007_create_prescription_medicine_details_table',	1),
(41,	'2020_09_19_031038_create_prescription_medical_test_details_table',	1),
(42,	'2020_10_03_185135_create_prescription_header_footers_table',	1);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `patients`;
CREATE TABLE `patients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `visiting_no` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `regi_no` int(11) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `marital_status` tinyint(1) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` double(8,2) DEFAULT NULL,
  `weight` double(8,2) DEFAULT NULL,
  `c_c` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `on_exam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_a_exam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_prescribed` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `patients` (`id`, `visiting_no`, `name`, `age`, `regi_no`, `gender`, `marital_status`, `address`, `mobile`, `height`, `weight`, `c_c`, `on_exam`, `p_a_exam`, `is_prescribed`, `created_at`, `updated_at`) VALUES
(1,	57,	'Constance Spinka',	21,	811,	1,	0,	'562 Jarrod Point Apt. 995\nNew Lavonne, NC 67923-8319',	'01700000000',	110.00,	64.00,	'Ex aliquam ab nobis facilis magni libero minus.',	'Voluptas sunt qui quo sequi sunt enim.',	'Omnis ducimus perspiciatis ad qui incidunt voluptatibus quos autem.',	0,	'2020-10-10 23:55:43',	'2020-10-10 23:55:43'),
(2,	22,	'June O\'Keefe',	50,	970,	1,	1,	'32415 Asha Light\nEast Emmie, NH 67854',	'01700000000',	194.00,	66.00,	'Soluta cupiditate nihil vel possimus fugiat eligendi.',	'Est rerum aut et nam nam quia facere eum.',	'Ducimus labore temporibus doloribus cum voluptatem quia sit.',	0,	'2020-10-10 23:55:43',	'2020-10-10 23:55:43'),
(3,	17,	'Chadrick Skiles Sr.',	51,	634,	1,	1,	'5257 Barrows Garden\nRossbury, CA 07343-7902',	'01700000000',	115.00,	80.00,	'Sit aut consectetur consequatur dicta quo.',	'Sapiente doloremque vero beatae est facere nihil nihil.',	'Nulla et eveniet occaecati assumenda.',	0,	'2020-10-10 23:55:43',	'2020-10-10 23:55:43'),
(4,	96,	'Dr. Lavada Stiedemann',	69,	841,	1,	0,	'19018 Braun Village\nWest Nyahfurt, WY 15466-0000',	'01700000000',	156.00,	44.00,	'Unde voluptates dolor occaecati et nihil temporibus asperiores autem.',	'Natus at sapiente quos magnam commodi sit.',	'Quas atque iusto dolorem assumenda dolorum.',	0,	'2020-10-10 23:55:43',	'2020-10-10 23:55:43'),
(5,	9,	'Chase Fahey',	21,	139,	1,	1,	'64384 Nolan Street Suite 033\nHickleburgh, CA 78521-5879',	'01700000000',	194.00,	48.00,	'Iste ex fugit veniam doloribus dolores natus.',	'Aperiam earum architecto et.',	'Quaerat consequatur magni rem atque.',	0,	'2020-10-10 23:55:43',	'2020-10-10 23:55:43'),
(6,	59,	'Prof. Valerie Wilderman',	57,	635,	0,	0,	'36295 Mitchell Glen Suite 267\nToyshire, AR 89593-6428',	'01700000000',	162.00,	51.00,	'Placeat dolore dolores sunt quis voluptates et.',	'Possimus aut vitae nam eaque molestias delectus consequatur.',	'Nesciunt facilis sint consequatur quae.',	0,	'2020-10-10 23:55:43',	'2020-10-10 23:55:43'),
(7,	33,	'Roosevelt O\'Reilly',	14,	509,	1,	0,	'47672 McClure Pines\nNorth Carsonbury, AR 72064',	'01700000000',	139.00,	32.00,	'Nisi debitis voluptatem explicabo aperiam fugiat et.',	'Ad ut quis sit.',	'Facere consequatur tempore aut dignissimos commodi sint.',	0,	'2020-10-10 23:55:43',	'2020-10-10 23:55:43'),
(8,	54,	'Mr. Evan Stracke DVM',	56,	593,	0,	0,	'28793 Erling Stream\nSouth Leviside, NY 95729-7135',	'01700000000',	115.00,	91.00,	'Nam ut minus et placeat aut velit.',	'Aspernatur aut reprehenderit ea officia voluptatum velit.',	'Et at sapiente qui voluptas omnis.',	0,	'2020-10-10 23:55:43',	'2020-10-10 23:55:43'),
(9,	77,	'Zachary Bergstrom',	63,	321,	1,	1,	'61156 Norris Orchard\nFlaviomouth, AR 00634-3489',	'01700000000',	123.00,	59.00,	'Voluptatibus sapiente est eos explicabo.',	'Repellendus iste possimus ut in et.',	'Animi blanditiis qui quis corporis ipsam repellat.',	0,	'2020-10-10 23:55:43',	'2020-10-10 23:55:43'),
(10,	94,	'Franz Osinski',	34,	502,	1,	1,	'7543 Conner Club Suite 668\nLittelville, IL 65930-2271',	'01700000000',	183.00,	86.00,	'Suscipit atque amet eligendi debitis consectetur cum.',	'Nulla eos rerum asperiores.',	'Autem velit quam sapiente sit.',	0,	'2020-10-10 23:55:44',	'2020-10-10 23:55:44');

DROP TABLE IF EXISTS `prescriptions`;
CREATE TABLE `prescriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` bigint(20) unsigned NOT NULL,
  `suggestion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prescriptions_patient_id_index` (`patient_id`),
  CONSTRAINT `prescriptions_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `prescription_header_footers`;
CREATE TABLE `prescription_header_footers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `header` text COLLATE utf8mb4_unicode_ci,
  `footer` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `prescription_medical_test_details`;
CREATE TABLE `prescription_medical_test_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prescription_id` bigint(20) unsigned NOT NULL,
  `medical_test_id` bigint(20) unsigned DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prescription_medical_test_details_prescription_id_index` (`prescription_id`),
  KEY `prescription_medical_test_details_medical_test_id_index` (`medical_test_id`),
  CONSTRAINT `prescription_medical_test_details_medical_test_id_foreign` FOREIGN KEY (`medical_test_id`) REFERENCES `medical_tests` (`id`) ON DELETE CASCADE,
  CONSTRAINT `prescription_medical_test_details_prescription_id_foreign` FOREIGN KEY (`prescription_id`) REFERENCES `prescriptions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `prescription_medicine_details`;
CREATE TABLE `prescription_medicine_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prescription_id` bigint(20) unsigned NOT NULL,
  `medicine_id` bigint(20) unsigned DEFAULT NULL,
  `mg_ml` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eating_time_breakfast` tinyint(1) NOT NULL DEFAULT '0',
  `eating_time_lunch` tinyint(1) NOT NULL DEFAULT '0',
  `eating_time_dinner` tinyint(1) NOT NULL DEFAULT '0',
  `eating_term` tinyint(1) DEFAULT NULL,
  `days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prescription_medicine_details_prescription_id_index` (`prescription_id`),
  KEY `prescription_medicine_details_medicine_id_index` (`medicine_id`),
  CONSTRAINT `prescription_medicine_details_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`id`) ON DELETE CASCADE,
  CONSTRAINT `prescription_medicine_details_prescription_id_foreign` FOREIGN KEY (`prescription_id`) REFERENCES `prescriptions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



-- 2020-10-11 05:59:06
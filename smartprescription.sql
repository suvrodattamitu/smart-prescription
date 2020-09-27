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
(1,	'admin',	'admin@admin.com',	'2020-09-27 03:47:51',	'$2y$10$MdnSm//i6/0U1x.DjJPaPeiV1nyVhMZAwuFyILn2cw/j31f29Zg6e',	'nUZMbVUe2T',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51');

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
(1,	'Alice Glover',	'Et nihil non consequatur odit harum. Neque qui porro sed veritatis tempore. Recusandae qui facere magni.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(2,	'Winnifred Hirthe',	'Quo placeat soluta quis sed. Magnam dolorum eius et ullam deserunt. Et praesentium esse voluptas et quasi id.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(3,	'Prudence Spencer',	'In rerum quaerat nam iure numquam sapiente perspiciatis. Non laborum voluptatem distinctio animi consequatur. Laudantium est est aut sit sed nostrum facere.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(4,	'Ms. Nia Shanahan',	'Velit blanditiis magni ducimus dolorem. Corrupti voluptatem non minus veniam hic voluptatem. Quas aperiam nostrum laborum aperiam nulla. Voluptatem tempore nulla voluptates similique quia quisquam.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(5,	'Kaley Walker III',	'Dolores labore vitae quis numquam. Illum id accusantium dicta perspiciatis. Repellendus reiciendis exercitationem sapiente earum illum excepturi omnis. Suscipit quia nesciunt similique quia mollitia.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(6,	'Aliyah White',	'Corporis vel consequuntur deleniti similique voluptate nobis sint est. Sit molestiae culpa nulla sed aut et. Exercitationem officiis omnis sunt quo. Ea aut officia odit voluptas dolores qui.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(7,	'Miss Shakira Stoltenberg V',	'Quibusdam consequatur optio doloremque quibusdam. Quis expedita at eveniet ut in possimus. Quos non laboriosam nobis aperiam dolor ipsa sed.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(8,	'Bettie Paucek',	'Et rerum temporibus ipsam nemo rerum maiores. Natus eveniet ex architecto laborum amet ab perspiciatis. Ab totam perferendis nobis vitae.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(9,	'Miss Kariane Runte III',	'Modi consequuntur enim consequatur aut ex quibusdam. Nesciunt fugiat est omnis et enim. Accusamus perferendis dicta et exercitationem officia rerum commodi. Quos ea voluptate harum aspernatur et excepturi consectetur.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(10,	'Prof. Darius Schaefer',	'Qui rerum accusamus odio nihil ut et voluptas. Rem eos velit minus odio sunt quas repellendus nostrum. Ut saepe saepe porro assumenda minus nemo aperiam. Quaerat facere recusandae dolore quia.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51');

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
(1,	'Bethel Hessel IV',	'Eum ut autem ullam aut. Veniam blanditiis sunt dolores occaecati nihil. Et possimus et natus quisquam est sed. Libero sint illo minus sit libero et.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(2,	'Kenny Kozey',	'Maiores magnam aliquam odit consequatur. Earum ut sit inventore ut temporibus. Ut amet eaque et provident. Et labore dolorem amet. Non sint quae et.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(3,	'Christina Ward',	'Cupiditate eligendi aut voluptas illum excepturi similique optio. Nemo sequi harum est. Non et sed ut consequatur debitis.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(4,	'Dr. Etha Dietrich',	'Soluta neque inventore laborum officia aspernatur sunt. Molestiae consectetur ea sequi beatae impedit officia. Quibusdam ducimus eos molestiae magnam culpa voluptatem. Non assumenda maiores consequatur quidem consequatur.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(5,	'Jaylon Hegmann',	'Nihil perferendis ratione sapiente. Quia quis a dolor repudiandae. Mollitia ratione maiores et. Eaque ut fugit soluta vero explicabo quae nulla.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(6,	'Marc Wiegand',	'Officiis delectus qui dolore rerum id. Suscipit voluptas rerum fugiat quam. Iure dolor dolor sed omnis error.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(7,	'Mrs. Jennifer Ziemann',	'Ut ad provident ex blanditiis expedita aliquid. Et aliquid fugiat eos explicabo esse provident.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(8,	'Wendy Reilly Jr.',	'Eos incidunt porro maiores necessitatibus quibusdam et. Et aspernatur repellendus ex architecto aut aut inventore. Consequatur sed dolorem rem accusamus. Exercitationem id mollitia tenetur suscipit et placeat exercitationem.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(9,	'Nellie Kuhlman',	'Perspiciatis nobis numquam fuga corporis illo impedit fugit. Aspernatur ut fuga et rerum. Sit quo qui molestiae commodi.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(10,	'Bradley Price IV',	'Nemo consequatur adipisci alias quia consequatur. Ad harum molestiae quaerat eaque eos aut. Earum dicta quis illum natus quae dicta dicta qui. Eos autem quod fugiat molestiae quae nulla quia.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51');

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
(1,	'Adonis Romaguera MD',	'Saepe perferendis ut qui. Nobis sunt similique ea. Placeat similique commodi illo aliquid dolorum. Voluptates iste voluptatum porro maxime est cum.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(2,	'Ms. Oceane Veum I',	'Aperiam corrupti unde soluta illum pariatur officia voluptatem. Quo iste aut minus saepe eius ut. Qui et neque animi sapiente. Nam alias temporibus quos aperiam eos. Excepturi rerum necessitatibus sit corrupti.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(3,	'Annie Collins',	'Quia facilis voluptatem dignissimos quidem voluptatibus tempora. Ut illum excepturi aut quis tenetur. Est est eos delectus consectetur.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(4,	'Dr. Agnes Mayert',	'Iure vel quam voluptas provident rerum sit id. Non cumque maxime excepturi sapiente magnam debitis. Ut placeat qui et asperiores id nisi.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(5,	'Nia Paucek',	'Aspernatur natus accusamus omnis voluptate quae. Et veritatis sit fugiat quos animi. Sequi qui deserunt voluptatibus.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(6,	'Urban O\'Conner',	'Veniam enim cumque veritatis. Expedita blanditiis soluta illo. Provident architecto aut non sunt sit perferendis. Quas facilis ipsum sit magni cum.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(7,	'Mr. Colten Romaguera',	'Sint delectus eaque et quaerat est perspiciatis voluptas. Iusto voluptatem itaque consequuntur rerum at molestias. Deleniti et et dolores tempora quo autem. Quis adipisci praesentium deleniti itaque et ut enim.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(8,	'Lucie Hettinger',	'Praesentium ex quae laborum fugit repellendus labore ex. Totam libero dolor optio ut quae libero. Et vel ab delectus illo et facere consequatur magni. Aut beatae omnis quis optio cum eveniet.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(9,	'Kacey McLaughlin',	'Sequi non quae aspernatur incidunt doloribus. Ipsum consequatur et sit numquam. Temporibus quasi iste perferendis id qui non quo.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(10,	'Mr. Gerhard Pfannerstill',	'Aspernatur id eos minus. Accusantium vel quis doloribus maiores repellat rerum. Natus reprehenderit est eaque suscipit porro eum ea. Sed non vel aliquam est ea et.',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51');

DROP TABLE IF EXISTS `medicine_types`;
CREATE TABLE `medicine_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `medicine_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'Gilda Hintz',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(2,	'Mr. Joe Blick',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(3,	'Keven Sawayn MD',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(4,	'Prof. Darrin Beer',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(5,	'Leonora Parker I',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(6,	'Eldon Bosco',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(7,	'Cleo Walsh',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(8,	'Ruthie Gleichner',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(9,	'Ettie Skiles V',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(10,	'Renee Kohler I',	'2020-09-27 03:47:51',	'2020-09-27 03:47:51');

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
(1,	'Amiya Bahringer',	7,	1,	5,	'Odit iure eius quia veniam architecto laborum.',	'2020-09-27 03:47:52',	'2020-09-27 03:47:52'),
(2,	'Ms. Dana Watsica DDS',	4,	7,	5,	'Quisquam neque sit repudiandae consequatur odio nostrum.',	'2020-09-27 03:47:52',	'2020-09-27 03:47:52'),
(3,	'Fern Block',	9,	4,	5,	'Optio sapiente voluptas vero ducimus laudantium minus porro nemo.',	'2020-09-27 03:47:52',	'2020-09-27 03:47:52'),
(4,	'Kelly Waelchi Jr.',	10,	9,	6,	'Aut quo asperiores quisquam culpa sit dignissimos ut.',	'2020-09-27 03:47:52',	'2020-09-27 03:47:52'),
(5,	'Santiago O\'Hara',	2,	3,	8,	'Fugit voluptate sunt nihil iure qui magnam.',	'2020-09-27 03:47:52',	'2020-09-27 03:47:52'),
(6,	'Prof. Elinore Conroy I',	3,	4,	1,	'Est quia aliquam cum illo.',	'2020-09-27 03:47:52',	'2020-09-27 03:47:52'),
(7,	'Mrs. Molly Paucek III',	3,	3,	2,	'Assumenda omnis modi est voluptatibus nemo eligendi.',	'2020-09-27 03:47:52',	'2020-09-27 03:47:52'),
(8,	'Mr. Edd Eichmann DDS',	9,	3,	3,	'Quo quo quisquam quidem possimus.',	'2020-09-27 03:47:52',	'2020-09-27 03:47:52'),
(9,	'Geovanny Schmidt MD',	7,	6,	4,	'Repellat consequuntur ea sed eveniet.',	'2020-09-27 03:47:52',	'2020-09-27 03:47:52'),
(10,	'Anthony Eichmann',	5,	6,	4,	'Rem ut esse nobis sapiente.',	'2020-09-27 03:47:52',	'2020-09-27 03:47:52');


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2020_09_13_155419_create_medicine_groups_table',	1),
(5,	'2020_09_13_161910_create_medical_tests_table',	1),
(6,	'2020_09_14_141533_create_medicine_types_table',	1),
(7,	'2020_09_14_152220_create_companies_table',	1),
(8,	'2020_09_14_162017_create_medicines_table',	1),
(9,	'2020_09_14_162104_create_patients_table',	1),
(10,	'2020_09_16_150953_create_user_details_table',	1),
(11,	'2020_09_17_172419_create_prescriptions_table',	1),
(12,	'2020_09_19_030007_create_prescription_medicine_details_table',	1),
(13,	'2020_09_19_031038_create_prescription_medical_test_details_table',	1);

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
(1,	25,	'Vivianne Hessel',	80,	877,	1,	0,	'522 Rippin Motorway\nSouth Alfburgh, MO 53504-5305',	'01700000000',	126.00,	73.00,	'Iure iusto dolor quia ipsam facere veniam.',	'Illum voluptate aut est voluptas eveniet fugit sit.',	'Rerum et pariatur sit non ab.',	0,	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(2,	65,	'Tracey Lind I',	52,	718,	1,	0,	'7966 Rubie Park\nTesshaven, AR 46089',	'01700000000',	153.00,	78.00,	'Sed impedit possimus repellat quia ducimus occaecati aspernatur.',	'Inventore ea aut asperiores exercitationem.',	'Sequi voluptatem temporibus hic labore voluptas magnam dignissimos.',	0,	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(3,	76,	'Stanton Yundt',	32,	983,	1,	0,	'830 Maximillia Plains Apt. 627\nPort Maverickton, UT 06869-6173',	'01700000000',	116.00,	91.00,	'Quas et inventore voluptate.',	'Illum deserunt et qui dolorem sit ratione.',	'Et doloribus delectus necessitatibus et omnis officia culpa.',	0,	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(4,	8,	'Prof. Theo Heaney',	44,	435,	1,	1,	'32098 Mann Locks Suite 281\nReynaton, FL 04557',	'01700000000',	185.00,	63.00,	'Aut aut perferendis accusamus autem et hic vel.',	'Consequatur rerum consectetur magni enim.',	'Id doloremque eveniet sint eum ad velit harum.',	0,	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(5,	97,	'Prof. Harley Mann Sr.',	74,	480,	1,	1,	'2271 Corwin Canyon Apt. 794\nEast Madisonburgh, NV 97875',	'01700000000',	162.00,	80.00,	'Est non asperiores atque optio quasi.',	'Occaecati error omnis fuga harum fugit aspernatur.',	'Deserunt id voluptatem aliquam aperiam est.',	0,	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(6,	75,	'Dillan Bailey',	29,	428,	0,	0,	'69825 Nader Rapids Apt. 569\nPrudencetown, IN 41821-7703',	'01700000000',	149.00,	79.00,	'Expedita nihil culpa odio error dolorem magni pariatur.',	'Voluptatem autem maxime molestias.',	'Ipsam reiciendis dolores est suscipit.',	0,	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(7,	54,	'Karli Pfannerstill',	95,	103,	0,	0,	'4931 Carrie Parkways Apt. 978\nWest Celestinoshire, NJ 83679-0463',	'01700000000',	154.00,	42.00,	'Suscipit quia est qui ut.',	'Ut consectetur voluptatem reiciendis est optio.',	'Aut delectus sint rem quos dolorem velit.',	0,	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(8,	80,	'Kiarra Price',	25,	113,	0,	1,	'772 Jakob Cliff\nEast Nasirbury, UT 01171',	'01700000000',	181.00,	73.00,	'Minus eum qui itaque quam odio numquam magni voluptatem.',	'Alias odit ipsa autem in inventore.',	'Qui corrupti voluptatem ut est numquam dolor inventore.',	0,	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(9,	12,	'Joanie Hickle',	12,	496,	1,	1,	'36933 Jillian Fort\nEldorahaven, IN 91029',	'01700000000',	154.00,	43.00,	'Aliquid quis est iure vero ut voluptatem.',	'A libero qui voluptatem voluptatum et ea.',	'Autem molestiae et id omnis ut.',	0,	'2020-09-27 03:47:51',	'2020-09-27 03:47:51'),
(10,	91,	'Tomas Gottlieb',	17,	212,	1,	1,	'5276 Jillian Vista Apt. 283\nBergeberg, RI 12946',	'01700000000',	106.00,	79.00,	'Et exercitationem doloremque quod et quis impedit.',	'Repudiandae recusandae aperiam eius numquam cum.',	'Ut doloribus unde sed.',	0,	'2020-09-27 03:47:51',	'2020-09-27 03:47:51');

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





-- 2020-09-27 09:48:35
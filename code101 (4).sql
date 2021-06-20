-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 15 mars 2020 à 22:08
-- Version du serveur :  5.7.28
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `code101`
--

-- --------------------------------------------------------

--
-- Structure de la table `dateetats`
--

DROP TABLE IF EXISTS `dateetats`;
CREATE TABLE IF NOT EXISTS `dateetats` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `quart_id` bigint(20) UNSIGNED NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  `date_acceptation` datetime DEFAULT NULL,
  `date_annulation` datetime DEFAULT NULL,
  `date_realisation` datetime DEFAULT NULL,
  `date_validation` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dateetats_quart_id_foreign` (`quart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `dateetats`
--

INSERT INTO `dateetats` (`id`, `quart_id`, `date_creation`, `date_acceptation`, `date_annulation`, `date_realisation`, `date_validation`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-03-09 12:19:35', '2020-03-09 14:56:31', NULL, '2020-03-09 15:03:40', '2020-03-09 15:04:52', '2020-03-09 11:19:35', '2020-03-09 14:04:52'),
(2, 2, '2020-03-09 12:19:35', '2020-03-12 13:38:13', NULL, '2020-03-12 14:56:32', '2020-03-12 15:02:20', '2020-03-09 11:19:35', '2020-03-12 14:02:20'),
(3, 3, '2020-03-09 17:08:01', NULL, NULL, NULL, NULL, '2020-03-09 16:08:01', '2020-03-09 16:08:01'),
(4, 4, '2020-03-09 17:14:58', NULL, '2020-03-13 10:42:37', NULL, NULL, '2020-03-09 16:14:58', '2020-03-13 09:42:37'),
(5, 5, '2020-03-12 11:38:17', '2020-03-13 17:26:29', NULL, '2020-03-13 17:27:34', '2020-03-13 17:34:18', '2020-03-12 10:38:17', '2020-03-13 16:34:18'),
(6, 6, '2020-03-12 11:38:50', NULL, NULL, NULL, NULL, '2020-03-12 10:38:50', '2020-03-12 10:38:50'),
(7, 7, '2020-03-12 13:45:11', '2020-03-13 17:04:59', NULL, '2020-03-13 17:12:57', '2020-03-13 17:18:51', '2020-03-12 12:45:11', '2020-03-13 16:18:51'),
(8, 8, '2020-03-12 13:45:11', NULL, NULL, NULL, NULL, '2020-03-12 12:45:11', '2020-03-12 12:45:11'),
(9, 9, '2020-03-12 14:46:58', '2020-03-12 16:34:58', NULL, '2020-03-12 16:36:05', '2020-03-12 16:51:22', '2020-03-12 13:46:58', '2020-03-12 15:51:22'),
(10, 10, '2020-03-12 14:51:17', NULL, NULL, NULL, NULL, '2020-03-12 13:51:17', '2020-03-12 13:51:17'),
(11, 11, '2020-03-12 16:18:35', '2020-03-12 17:01:42', NULL, NULL, NULL, '2020-03-12 15:18:35', '2020-03-12 16:01:42');

-- --------------------------------------------------------

--
-- Structure de la table `facturations`
--

DROP TABLE IF EXISTS `facturations`;
CREATE TABLE IF NOT EXISTS `facturations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `quart_id` bigint(20) UNSIGNED NOT NULL,
  `facturation_residence` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remuneration_pro` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `facturations_quart_id_foreign` (`quart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `facturations`
--

INSERT INTO `facturations` (`id`, `quart_id`, `facturation_residence`, `remuneration_pro`, `created_at`, `updated_at`) VALUES
(1, 1, '160', '144', '2020-03-09 14:04:52', '2020-03-09 14:04:52'),
(2, 2, '228', '204', '2020-03-12 14:02:21', '2020-03-12 14:02:21'),
(3, 9, '228', '204', '2020-03-12 15:51:22', '2020-03-12 15:51:22'),
(4, 7, '240', '216', '2020-03-13 16:18:51', '2020-03-13 16:18:51'),
(5, 5, '180', '162', '2020-03-13 16:34:18', '2020-03-13 16:34:18');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jour_feries`
--

DROP TABLE IF EXISTS `jour_feries`;
CREATE TABLE IF NOT EXISTS `jour_feries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_ferie` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_ferie` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `jour_feries`
--

INSERT INTO `jour_feries` (`id`, `name_ferie`, `date_ferie`, `created_at`, `updated_at`) VALUES
(1, 'Noel', '2020-12-25', '2020-02-20 09:40:21', '2020-02-20 09:40:21'),
(2, 'Fete nationale', '2020-05-20', '2020-02-20 09:41:13', '2020-02-20 09:41:13'),
(3, 'Fete de la jeunesse', '2020-02-11', '2020-02-20 09:51:46', '2020-02-20 09:51:46'),
(4, 'Journée de la femme', '2020-03-08', '2020-02-25 12:00:42', '2020-02-25 12:00:42'),
(5, 'Fete du travail', '2020-05-01', '2020-02-25 12:01:12', '2020-02-25 12:01:12');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `msg_content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msg_date` date DEFAULT NULL,
  `read_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_sender_id_foreign` (`sender_id`),
  KEY `messages_receiver_id_foreign` (`receiver_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `msg_content`, `msg_date`, `read_at`, `created_at`, `updated_at`) VALUES
(1, 14, 15, 'Bonjour Professionnel', '2020-03-08', '0000-00-00', NULL, '2020-03-12 07:18:44'),
(2, 15, 14, 'Bonjour Admin', '2020-03-08', '0000-00-00', NULL, '2020-03-15 20:58:34'),
(3, 13, 14, 'Bonjour Admin', '2020-03-08', '0000-00-00', NULL, '2020-03-15 20:58:37'),
(4, 15, 14, 'sdqsdqsdq', NULL, '0000-00-00', '2020-03-08 23:21:39', '2020-03-15 20:58:34'),
(5, 15, 14, 'qsdqsdqsdqsdqsd', NULL, '0000-00-00', '2020-03-08 23:26:00', '2020-03-15 20:58:34'),
(6, 15, 14, 'dfsdfsdfsdfsdfsdfsdfsdfs', NULL, '0000-00-00', '2020-03-08 23:28:23', '2020-03-15 20:58:34'),
(7, 14, 15, 'fgsdfqdssqdqsdqsdqsdqsdqs', NULL, '0000-00-00', '2020-03-08 23:29:07', '2020-03-12 07:18:44'),
(8, 15, 14, 'qsdqsdqsdqsdqsq', NULL, '0000-00-00', '2020-03-08 23:52:35', '2020-03-15 20:58:34'),
(9, 15, 14, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', NULL, '0000-00-00', '2020-03-08 23:54:12', '2020-03-15 20:58:34'),
(10, 15, 14, 'aaaaaaaaaaaaaaaaa aaaaaaaaaa aaaaaaaa', NULL, '0000-00-00', '2020-03-08 23:55:31', '2020-03-15 20:58:34'),
(11, 14, 15, 'Bonjour Le pro', NULL, '0000-00-00', '2020-03-09 07:21:45', '2020-03-12 07:18:44'),
(12, 14, 13, 'Bonjour residence', NULL, '0000-00-00', '2020-03-09 07:23:21', '2020-03-13 09:17:52'),
(13, 15, 14, 'le pusher fonctionne ??', NULL, '0000-00-00', '2020-03-09 08:30:45', '2020-03-15 20:58:34'),
(14, 14, 15, 'apparemment oui', NULL, '0000-00-00', '2020-03-09 08:31:43', '2020-03-12 07:18:44'),
(15, 15, 14, 'Essayons encore', NULL, '0000-00-00', '2020-03-09 08:32:22', '2020-03-15 20:58:34'),
(16, 14, 15, 'ok', NULL, '0000-00-00', '2020-03-09 08:33:35', '2020-03-12 07:18:44'),
(17, 15, 14, 'je ne reçois rien', NULL, '0000-00-00', '2020-03-09 08:34:14', '2020-03-15 20:58:34'),
(18, 14, 15, 'qsdqsdqsdqsdq', NULL, '0000-00-00', '2020-03-09 08:59:38', '2020-03-12 07:18:44'),
(19, 14, 15, 'tjr pas ?', NULL, '0000-00-00', '2020-03-09 09:22:49', '2020-03-12 07:18:44'),
(20, 15, 14, 'Non', NULL, '0000-00-00', '2020-03-09 09:48:55', '2020-03-15 20:58:34'),
(21, 15, 14, 'prkoi ??', NULL, '0000-00-00', '2020-03-09 10:44:53', '2020-03-15 20:58:34'),
(22, 13, 15, 'hello !', NULL, '0000-00-00', '2020-03-13 09:18:03', '2020-03-13 15:50:21'),
(23, 15, 13, 'hi', NULL, '2020-03-13', '2020-03-13 09:19:37', '2020-03-13 09:19:37'),
(24, 14, 13, 'cmt allez-vous ?', NULL, '2020-03-15', '2020-03-15 20:16:10', '2020-03-15 20:16:10'),
(25, 14, 13, 'hello', NULL, '2020-03-15', '2020-03-15 20:16:29', '2020-03-15 20:16:29'),
(26, 14, 13, 'vousetes encore là ????', NULL, '2020-03-15', '2020-03-15 20:16:54', '2020-03-15 20:16:54'),
(27, 14, 15, 'ok good', NULL, '2020-03-15', '2020-03-15 20:17:31', '2020-03-15 20:17:31'),
(28, 14, 15, 'cmt ???', NULL, '2020-03-15', '2020-03-15 20:17:56', '2020-03-15 20:17:56'),
(29, 14, 13, 'Hello', NULL, '2020-03-15', '2020-03-15 20:19:02', '2020-03-15 20:19:02'),
(30, 14, 16, 'bonjour', NULL, '2020-03-15', '2020-03-15 20:39:00', '2020-03-15 20:39:00'),
(31, 14, 16, 'vous etes là ??', NULL, '2020-03-15', '2020-03-15 20:41:23', '2020-03-15 20:41:23'),
(32, 14, 16, 'ok apparemment non', NULL, '2020-03-15', '2020-03-15 20:41:36', '2020-03-15 20:41:36'),
(33, 14, 16, 'heeeoooo ???', NULL, '2020-03-15', '2020-03-15 20:58:03', '2020-03-15 20:58:03'),
(34, 14, 16, 'ok', NULL, '2020-03-15', '2020-03-15 21:00:46', '2020-03-15 21:00:46');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_01_13_113220_add_infos_users_table', 1),
(5, '2020_01_13_114254_create_professionnels_table', 1),
(6, '2020_01_13_115901_create_postes_table', 1),
(7, '2020_01_13_124405_create_roles_table', 1),
(8, '2020_01_13_125601_create_quartdetravails_table', 1),
(9, '2020_01_13_132259_create_residences_table', 1),
(10, '2020_01_13_133302_create_facturations_table', 1),
(11, '2020_01_13_133954_create_tarifs_table', 1),
(12, '2020_01_13_142219_create_messages_table', 1),
(13, '2020_02_08_012628_create_notifications_table', 1),
(14, '2020_02_14_171438_create_dateetats_table', 1),
(15, '2020_02_20_102752_create_jour_feries_table', 1),
(16, '2020_02_28_160107_create_parametres_table', 1),
(17, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(18, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(19, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(20, '2016_06_01_000004_create_oauth_clients_table', 2),
(21, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('2c5100ee-04a1-4c6d-abeb-8f210709ca03', 'App\\Notifications\\QuartCreation', 'App\\User', 15, '{\"titre\":\"Nouveaux quarts disponibles\",\"message\":\"De nouveaux quarts de travail correspondants\\n        \\u00e0 votre profil sont actuellement disponibles. Nous vous invitons \\u00e0 consulter\\n        le calendrier des quarts de travail. \\n        Choisissez vite les quarts de travail qui vous conviennent.\\n        Merci de nous faire confiance.\"}', NULL, '2020-03-10 11:54:47', '2020-03-10 11:54:47');

-- --------------------------------------------------------

--
-- Structure de la table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('7e7473fafc26baf67f4484b8712042d9a919aaf258122be481907479df521f086784779d49122cd0', 16, 1, 'authToken', '[]', 0, '2020-03-10 14:49:14', '2020-03-10 14:49:14', '2021-03-10 15:49:14'),
('9095a045b3add389abb87fc0b2244258827aa76526b22f7c05cb0ad91865adc361fce9fa4e0c2b75', 16, 1, 'authToken', '[]', 0, '2020-03-10 14:50:13', '2020-03-10 14:50:13', '2021-03-10 15:50:13'),
('35251f6a706020256a16476167a58ee5f73df7c9d758d647eb683a3720105048c5993f87dfe2e118', 13, 1, 'authToken', '[]', 0, '2020-03-10 14:51:21', '2020-03-10 14:51:21', '2021-03-10 15:51:21');

-- --------------------------------------------------------

--
-- Structure de la table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'CODE101 Personal Access Client', '0YqYQ1IXXNzXQSlLLRRK6iWWJPPpRvElkc0AEkv7', 'http://localhost', 1, 0, 0, '2020-03-10 14:47:51', '2020-03-10 14:47:51'),
(2, NULL, 'CODE101 Password Grant Client', '4oTeOhaQQQhyCkxG9CAxAY6jDtRizeIR8NxzhLiY', 'http://localhost', 0, 1, 0, '2020-03-10 14:47:51', '2020-03-10 14:47:51');

-- --------------------------------------------------------

--
-- Structure de la table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-03-10 14:47:51', '2020-03-10 14:47:51');

-- --------------------------------------------------------

--
-- Structure de la table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `parametres`
--

DROP TABLE IF EXISTS `parametres`;
CREATE TABLE IF NOT EXISTS `parametres` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `param_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `param_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('bertrand.kouam@perfmindset.com', '$2y$10$9GHUxlyc2FtjwjVjgknp6.lJ8G2wQEq78SwyD6JzIYWG27yXuN516', '2020-02-11 11:48:41');

-- --------------------------------------------------------

--
-- Structure de la table `postes`
--

DROP TABLE IF EXISTS `postes`;
CREATE TABLE IF NOT EXISTS `postes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_tarif_jour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_tarif_soir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_tarif_nuit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `postes`
--

INSERT INTO `postes` (`id`, `post_name`, `post_level`, `post_tarif_jour`, `post_tarif_soir`, `post_tarif_nuit`, `created_at`, `updated_at`) VALUES
(1, 'Préposé aux Bénéficiaires', '1', '17', '18', '19', '2020-02-04 10:36:21', '2020-02-04 10:36:21'),
(2, 'Loi 90', '2', '18', '19', '20', '2020-02-04 12:15:07', '2020-02-04 12:15:07'),
(3, 'Infirmier (e) Aux.', '3', '18', '19', '21', '2020-02-04 12:15:44', '2020-02-04 12:15:44'),
(4, 'Infirmier (e)', '4', '20', '22', '24', '2020-02-16 19:49:26', '2020-02-16 19:49:26');

-- --------------------------------------------------------

--
-- Structure de la table `professionnels`
--

DROP TABLE IF EXISTS `professionnels`;
CREATE TABLE IF NOT EXISTS `professionnels` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `num_pratique` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dist_max` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_exp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `langue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `votre_cv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specimen_cheque` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'cheque.png',
  `diplome_recent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'diplome.png',
  `carte_identite` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'cni.png',
  `condamnations` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carte_rcr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'rcr.png',
  `attestation_pdsb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'pdsb.png',
  `total_percu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_postal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `professionnels_user_id_foreign` (`user_id`),
  KEY `professionnels_post_id_foreign` (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `professionnels`
--

INSERT INTO `professionnels` (`id`, `post_id`, `user_id`, `num_pratique`, `dist_max`, `annee_exp`, `langue`, `votre_cv`, `specimen_cheque`, `diplome_recent`, `carte_identite`, `condamnations`, `carte_rcr`, `attestation_pdsb`, `total_percu`, `adresse1`, `adresse2`, `ville`, `province`, `code_postal`, `created_at`, `updated_at`) VALUES
(1, 3, 5, '258963', '10', '3', 'Français', 'bertrand.jpg', 'cheque.png', 'bertrand.jpg', 'bertrand.jpg', NULL, 'default.png', 'default.png', '0', '2563', '2563', 'Montreal', 'Colombie-Britanique', '2460', '2020-02-04 09:09:12', '2020-02-04 09:09:12'),
(2, 4, 16, '258963', '10', '3', 'Français', 'bertrand.jpg', 'cheque.png', 'bertrand.jpg', 'bertrand.jpg', NULL, 'default.png', 'default.png', '0', '2563', '2563', 'Montreal', 'Colombie-Britanique', '2460', '2020-02-04 09:14:20', '2020-02-04 09:14:20'),
(3, 3, 7, '456+321789', '10', '44545', 'Français', 'Chanelle House.png', 'cheque.png', 'Chanelle House.jpg', 'Chanelle House.jpg', NULL, 'default.png', 'default.png', '0', '2563', '2563', 'Montreal', 'Colombie-Britanique', '2460', '2020-02-04 09:23:38', '2020-02-04 09:23:38'),
(4, 1, 8, 'No degre', '10', '3', 'Français', 'bertrand.png', 'cheque.png', 'bertrand.png', 'bertrand.png', NULL, 'bertrand.PNG', 'bertrand.png', '0', '2563', '2563', 'Montreal', 'Manitoba', '2460', '2020-02-04 09:41:20', '2020-02-04 09:41:20'),
(5, 2, 15, '258963', '10', '3', 'Français', 'bertrand.png', 'cheque.png', 'bertrand.PNG', 'bertrand.png', NULL, 'default.png', 'default.png', '0', '2563', '2563', 'Montreal', 'Colombie-Britanique', '2460', '2020-02-04 12:21:24', '2020-02-04 12:21:24');

-- --------------------------------------------------------

--
-- Structure de la table `quartdetravails`
--

DROP TABLE IF EXISTS `quartdetravails`;
CREATE TABLE IF NOT EXISTS `quartdetravails` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `res_id` bigint(20) UNSIGNED NOT NULL,
  `pro_id` bigint(20) UNSIGNED DEFAULT NULL,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jour_debut` date NOT NULL,
  `jour_fin` date NOT NULL,
  `heure_debut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heure_fin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heure_sup` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `quart_etat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Disponible',
  `temps_repas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '30',
  `commentaires` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `facteur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `departement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Non attribué',
  `mask_residence` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'off',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quartdetravails_res_id_foreign` (`res_id`),
  KEY `quartdetravails_pro_id_foreign` (`pro_id`),
  KEY `quartdetravails_post_id_foreign` (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `quartdetravails`
--

INSERT INTO `quartdetravails` (`id`, `post_id`, `res_id`, `pro_id`, `titre`, `jour_debut`, `jour_fin`, `heure_debut`, `heure_fin`, `heure_sup`, `quart_etat`, `temps_repas`, `commentaires`, `note`, `notif`, `facteur`, `departement`, `mask_residence`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 15, 'CODE101-4880', '2020-03-09', '2020-03-09', '07:00', '15:00', '0', 'Validé', '0', 'ok c\'est bon', '4', '1', '1', 'Non attribué', 'off', '2020-03-09 11:19:35', '2020-03-10 07:30:16'),
(2, 1, 4, 15, 'CODE101-5803', '2020-03-10', '2020-03-10', '07:00', '15:00', '4', 'Validé', '30', 'Plus tot rapide et soigné !', '5', '1', '1', 'Non attribué', 'off', '2020-03-09 11:19:35', '2020-03-12 14:02:20'),
(3, 0, 4, NULL, 'CODE101-3178', '2020-03-09', '2020-03-10', '20:00', '04:00', '0', 'Disponible', '0', NULL, NULL, '1', '1.5', 'Non attribué', 'off', '2020-03-09 16:08:01', '2020-03-10 07:30:16'),
(4, 3, 4, NULL, 'CODE101-6234', '2020-03-06', '2020-03-06', '07:00', '15:00', '0', 'Disponible', '0', NULL, NULL, '1', '1', 'Non attribué', 'off', '2020-03-09 16:14:58', '2020-03-10 07:30:16'),
(5, 2, 4, 15, 'CODE101-3560', '2020-03-13', '2020-03-13', '07:00', '15:00', '1', 'Validé', '30', 'Ok', '4', '0', '1', 'Chirurgie', 'off', '2020-03-12 10:38:17', '2020-03-13 16:34:18'),
(6, 3, 4, NULL, 'CODE101-7353', '2020-03-14', '2020-03-14', '10:00', '18:00', '0', 'Disponible', '0', NULL, NULL, '0', '1.5', 'Chirurgie', 'off', '2020-03-12 10:38:50', '2020-03-12 10:38:50'),
(7, 2, 4, 15, 'CODE101-2296', '2020-03-14', '2020-03-15', '18:00', '02:00', NULL, 'Validé', NULL, NULL, '4', '0', '1.5', 'Pédiatrie', 'off', '2020-03-12 12:45:11', '2020-03-13 16:18:51'),
(8, 2, 4, NULL, 'CODE101-5075', '2020-03-15', '2020-03-16', '18:00', '02:00', '0', 'Disponible', '30', NULL, NULL, '0', '1.5', 'Pédiatrie', 'off', '2020-03-12 12:45:11', '2020-03-12 12:45:11'),
(9, 1, 4, 15, 'CODE101-1277', '2020-03-12', '2020-03-13', '17:00', '01:00', NULL, 'Validé', NULL, 'service excellent', '4', '0', '1.5', 'Pédiatrie', 'off', '2020-03-12 13:46:58', '2020-03-12 15:51:22'),
(10, 4, 4, NULL, 'CODE101-4357', '2020-03-13', '2020-03-13', '12:00', '20:00', '0', 'Disponible', '30', NULL, NULL, '0', '1.5', 'Pédiatrie', 'on', '2020-03-12 13:51:17', '2020-03-12 13:51:17'),
(11, 3, 4, 16, 'CODE101-8494', '2020-03-08', '2020-03-08', '08:00', '16:00', '0', 'Accepté', '30', NULL, NULL, '0', '2', 'Chirurgie', 'off', '2020-03-12 15:18:35', '2020-03-12 16:01:42');

-- --------------------------------------------------------

--
-- Structure de la table `residences`
--

DROP TABLE IF EXISTS `residences`;
CREATE TABLE IF NOT EXISTS `residences` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fact_id` bigint(20) UNSIGNED NOT NULL,
  `resp_id` bigint(20) UNSIGNED NOT NULL,
  `res_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depense` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `res_adresse1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `res_adresse2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `res_ville` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `res_province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `res_code_postal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `residences_fact_id_foreign` (`fact_id`),
  KEY `residences_resp_id_foreign` (`resp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `residences`
--

INSERT INTO `residences` (`id`, `fact_id`, `resp_id`, `res_name`, `res_phone`, `depense`, `res_adresse1`, `res_adresse2`, `res_ville`, `res_province`, `res_code_postal`, `created_at`, `updated_at`) VALUES
(4, 14, 13, 'Chanelle House', '0412365897', '0', '452 Rue St Hubert', '254', 'Moncton', 'Nouveau-Brunskwick', 'K3J 5N9', '2020-02-04 10:35:07', '2020-02-04 10:35:07');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_pro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `role_res` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `role_edimestre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `role_admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `role_pro`, `role_res`, `role_edimestre`, `role_admin`, `created_at`, `updated_at`) VALUES
(1, 'administrateur', '0', '1', '1', '1', '2020-02-26 07:13:26', '2020-02-26 07:13:26');

-- --------------------------------------------------------

--
-- Structure de la table `tarifs`
--

DROP TABLE IF EXISTS `tarifs`;
CREATE TABLE IF NOT EXISTS `tarifs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `res_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tarif_jour` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tarif_soir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tarif_nuit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tarifs_res_id_foreign` (`res_id`),
  KEY `tarifs_post_id_foreign` (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tarifs`
--

INSERT INTO `tarifs` (`id`, `res_id`, `post_id`, `tarif_jour`, `tarif_soir`, `tarif_nuit`, `created_at`, `updated_at`) VALUES
(1, 4, 4, '25', '27', '29', '2020-02-16 19:50:04', '2020-02-16 19:50:04'),
(2, 4, 1, '17', '18', '19', '2020-02-16 19:50:46', '2020-02-16 19:50:46'),
(3, 4, 2, '20', '21', '23', '2020-02-16 19:51:33', '2020-02-16 19:51:33'),
(4, 4, 3, '22', '23', '24', '2020-02-16 19:52:13', '2020-02-16 19:52:13');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cle101` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_auth` tinyint(1) DEFAULT '1',
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `role_id` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `cle101`, `first_auth`, `photo`, `status`, `role_id`, `role`) VALUES
(13, 'Residence', 'kbertrant@yahoo.fr', NULL, '$2y$10$VlLQQSZm8ub3ryuuJr5sreCi9wEyyZgl6XUVQPFVMzYc02yXSVCwW', NULL, '2020-02-04 10:34:59', '2020-02-28 12:31:16', '0412365897', 'cle101-4727', 0, 'default.png', 'on', 2, 'residence'),
(14, 'Administrateur', 'royal@yahoo.fr', NULL, '$2y$10$rexXpSMylAiFQCrUg38zdep./vXe6Crj4UmnqAFwVWggWqnu5UKg6', NULL, '2020-02-04 10:35:03', '2020-02-28 12:31:43', '0412365897', 'cle101-3903', 0, 'default.png', 'on', 2, 'administrateur'),
(15, 'Professionnel', 'bertrand.kouam@perfmindset.com', NULL, '$2y$10$08K7CzamesAIfiJlSOeRKOWSS91gNWzVjm2pDUj95VLvloMHiXdWS', NULL, '2020-02-04 12:21:18', '2020-03-06 20:48:57', '0412365897', 'cle101-1295', 0, 'bertrand.jpg', 'on', 1, 'professionnel'),
(16, 'azerty', 'kbertrant@hotmail.fr', NULL, '$2y$10$ote28q7J3fhry9AFW3m0DO9KNEW9ahrSTbY6.ONDic4U2drNxWyla', NULL, '2020-03-10 14:49:14', '2020-03-12 12:48:36', '258963147', 'cle101-7635', 0, 'default.png', 'off', 0, 'professionnel');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

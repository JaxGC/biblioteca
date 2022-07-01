-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.17-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para biblioteca
CREATE DATABASE IF NOT EXISTS `biblioteca` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `biblioteca`;

-- Volcando estructura para tabla biblioteca.autores
CREATE TABLE IF NOT EXISTS `autores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre_autor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla biblioteca.autores: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `autores` DISABLE KEYS */;
INSERT INTO `autores` (`id`, `Nombre_autor`, `created_at`, `updated_at`) VALUES
	(1, 'Darke Trichar L', '2022-06-30 12:36:13', '2022-06-30 12:36:13'),
	(2, 'Juan Diego Perez Villa', '2022-06-30 12:39:51', '2022-06-30 12:39:51'),
	(3, 'FRANCISCO JAVIER GARCIA RAMIREZ', '2022-06-30 12:42:19', '2022-06-30 12:42:19'),
	(4, 'JOHN KATZENBACH', '2022-06-30 12:42:48', '2022-06-30 12:42:48'),
	(5, 'ANTONIO CARRASCO', '2022-06-30 12:43:01', '2022-06-30 12:43:01'),
	(6, 'SUE MOORHEAD', '2022-06-30 12:43:12', '2022-06-30 12:43:12'),
	(7, 'FERNANDO FLOREZGOMEZ GONZALEZ', '2022-06-30 12:43:33', '2022-06-30 12:43:33'),
	(8, 'EDGARD BAQUEIRO ROJAS', '2022-06-30 12:43:54', '2022-06-30 12:43:54');
/*!40000 ALTER TABLE `autores` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre_categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla biblioteca.categorias: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `Nombre_categoria`, `created_at`, `updated_at`) VALUES
	(1, 'Anatomia', '2022-06-30 12:36:46', '2022-06-30 12:36:46'),
	(2, 'Informatica', '2022-06-30 12:40:45', '2022-06-30 12:40:45'),
	(3, 'DERECHO', '2022-06-30 12:44:14', '2022-06-30 12:44:14'),
	(4, 'ENFERMERIA', '2022-06-30 12:44:20', '2022-06-30 12:44:20'),
	(5, 'PSICOLOGIA', '2022-06-30 12:44:27', '2022-06-30 12:44:27'),
	(6, 'CRIMINOLOGIA', '2022-06-30 12:44:37', '2022-06-30 12:44:37');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.editoriales
CREATE TABLE IF NOT EXISTS `editoriales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre_editorial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla biblioteca.editoriales: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `editoriales` DISABLE KEYS */;
INSERT INTO `editoriales` (`id`, `Nombre_editorial`, `created_at`, `updated_at`) VALUES
	(1, 'Elsevier', '2022-06-30 12:36:34', '2022-06-30 12:36:34'),
	(2, 'Anaya Mulmedia', '2022-06-30 12:40:24', '2022-06-30 12:40:24'),
	(3, 'CESCIJUC', '2022-06-30 12:41:19', '2022-06-30 12:41:19'),
	(4, 'LATRAMA', '2022-06-30 12:41:32', '2022-06-30 12:41:32'),
	(5, 'SISTEMAS INTER', '2022-06-30 12:41:41', '2022-06-30 12:41:41'),
	(6, 'PORRÚA', '2022-06-30 12:41:52', '2022-06-30 12:41:52'),
	(7, 'OXFORD', '2022-06-30 12:41:58', '2022-06-30 12:41:58');
/*!40000 ALTER TABLE `editoriales` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.estadolibros
CREATE TABLE IF NOT EXISTS `estadolibros` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Observaciones` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla biblioteca.estadolibros: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `estadolibros` DISABLE KEYS */;
/*!40000 ALTER TABLE `estadolibros` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.estados
CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(2) NOT NULL COMMENT 'Cve_Ent - Clave de la entidad',
  `nombre` varchar(40) NOT NULL COMMENT 'Nom_Ent  - Nombre de la entidad',
  `abrev` varchar(10) NOT NULL COMMENT 'Nom_Abr - Nombre abreviado de la entidad',
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Tabla de Estados de la República Mexicana';

-- Volcando datos para la tabla biblioteca.estados: 0 rows
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla biblioteca.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.invitados
CREATE TABLE IF NOT EXISTS `invitados` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Name_invitados` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla biblioteca.invitados: ~17 rows (aproximadamente)
/*!40000 ALTER TABLE `invitados` DISABLE KEYS */;
INSERT INTO `invitados` (`id`, `Name_invitados`, `Password`, `created_at`, `updated_at`) VALUES
	(1, 'Admin Admin', 'Admin', '2022-06-30 12:20:31', '2022-06-30 12:20:31'),
	(2, 'Cesar Uriel Segundo Lorenzo', 'Alum', '2022-06-30 12:52:35', '2022-06-30 12:52:35'),
	(3, 'Admin Admin', 'Admin', '2022-06-30 12:53:52', '2022-06-30 12:53:52'),
	(4, 'Admin Admin', 'Admin', '2022-06-30 12:54:01', '2022-06-30 12:54:01'),
	(5, 'Cesar Uriel Segundo Lorenzo', 'CoAdmin', '2022-06-30 12:55:26', '2022-06-30 12:55:26'),
	(6, 'Cesar Uriel Segundo Lorenzo', 'CoAdmin', '2022-06-30 12:55:57', '2022-06-30 12:55:57'),
	(7, 'Cesar Uriel Segundo Lorenzo', 'CoAdmin', '2022-06-30 12:56:20', '2022-06-30 12:56:20'),
	(8, 'Admin Admin', 'Admin', '2022-06-30 12:59:04', '2022-06-30 12:59:04'),
	(9, 'Cesar Uriel Segundo Lorenzo', 'CoAdmin', '2022-06-30 13:15:40', '2022-06-30 13:15:40'),
	(10, 'Cesar Uriel Segundo Lorenzo', 'CoAdmin', '2022-06-30 13:15:45', '2022-06-30 13:15:45'),
	(11, 'Cesar Uriel Segundo Lorenzo', 'CoAdmin', '2022-06-30 13:15:46', '2022-06-30 13:15:46'),
	(12, 'Admin Admin', 'Admin', '2022-06-30 13:18:03', '2022-06-30 13:18:03'),
	(13, 'Admin Admin', 'Admin', '2022-06-30 13:18:58', '2022-06-30 13:18:58'),
	(14, 'Cesar Uriel Segundo Lorenzo', 'Alum', '2022-06-30 13:19:22', '2022-06-30 13:19:22'),
	(15, 'Admin Admin', 'Admin', '2022-06-30 13:21:11', '2022-06-30 13:21:11'),
	(16, 'Admin Admin', 'Admin', '2022-06-30 13:21:37', '2022-06-30 13:21:37'),
	(17, 'Admin Admin', 'Admin', '2022-06-30 13:21:49', '2022-06-30 13:21:49'),
	(18, 'Admin Admin', 'Admin', '2022-06-30 13:21:57', '2022-06-30 13:21:57');
/*!40000 ALTER TABLE `invitados` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.libros
CREATE TABLE IF NOT EXISTS `libros` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre_libro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_autor` bigint(20) unsigned NOT NULL,
  `id_editorial` bigint(20) unsigned NOT NULL,
  `year_edicion` year(4) NOT NULL,
  `fecha_publicacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_categoria` bigint(20) unsigned NOT NULL,
  `ejemplares` bigint(20) NOT NULL,
  `libros_prestados` bigint(20) NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_stand` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `libros_id_autor_foreign` (`id_autor`),
  KEY `libros_id_editorial_foreign` (`id_editorial`),
  KEY `libros_id_categoria_foreign` (`id_categoria`),
  CONSTRAINT `libros_id_autor_foreign` FOREIGN KEY (`id_autor`) REFERENCES `autores` (`id`),
  CONSTRAINT `libros_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  CONSTRAINT `libros_id_editorial_foreign` FOREIGN KEY (`id_editorial`) REFERENCES `editoriales` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla biblioteca.libros: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `libros` DISABLE KEYS */;
INSERT INTO `libros` (`id`, `Nombre_libro`, `id_autor`, `id_editorial`, `year_edicion`, `fecha_publicacion`, `id_categoria`, `ejemplares`, `libros_prestados`, `estado`, `observaciones`, `imagen`, `numero_stand`, `created_at`, `updated_at`) VALUES
	(1, 'Anatomia para estudiantes', 1, 1, '2013', '2022-06-30 12:54:31', 1, 3, 0, 'on', 'ninguna', '20220630123819.png', 1, '2022-06-30 12:38:19', '2022-06-30 12:54:31'),
	(2, 'METODOLOGIA DE LA INVESTIGACION EN LAS CIENCIAS JURIDICAS Y CRIMINOLOGICAS', 3, 3, '2013', '2022-06-30 13:21:00', 6, 0, 0, 'on', 'NINGUNA', '20220630124648.png', 1, '2022-06-30 12:46:48', '2022-06-30 13:21:00'),
	(3, 'EL PSICOANALISTA, UN THRILLER FUERA DE SERIE, IMPOSIBLE DE SOLTAR', 4, 4, '2006', '2022-06-30 12:58:43', 5, 0, 0, 'on', 'NINGUNA', '20220630124852.png', 2, '2022-06-30 12:48:52', '2022-06-30 12:58:43');
/*!40000 ALTER TABLE `libros` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.licenciaturas
CREATE TABLE IF NOT EXISTS `licenciaturas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre_licenciatura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla biblioteca.licenciaturas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `licenciaturas` DISABLE KEYS */;
INSERT INTO `licenciaturas` (`id`, `Nombre_licenciatura`, `created_at`, `updated_at`) VALUES
	(1, 'Lic Informatica', '2022-06-30 12:22:46', '2022-06-30 12:22:46');
/*!40000 ALTER TABLE `licenciaturas` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.localidades
CREATE TABLE IF NOT EXISTS `localidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `municipio_id` int(11) NOT NULL COMMENT 'Relación con municipios.id',
  `clave` varchar(4) NOT NULL COMMENT 'Cve_Loc – Clave de la localidad',
  `nombre` varchar(100) NOT NULL COMMENT 'Nom_Loc – Nombre de la localidad',
  `mapa` int(10) NOT NULL COMMENT 'Mapa - Identificador del INEGI',
  `ambito` varchar(1) NOT NULL COMMENT 'Ámbito - Clasificación',
  `latitud` varchar(20) NOT NULL COMMENT 'Latitud – Latitud en formato DMS',
  `longitud` varchar(20) NOT NULL COMMENT 'Longitud – Longitud en formato DMS',
  `lat` decimal(10,7) NOT NULL COMMENT 'Lat_Decimal - Latitud en formato DD',
  `lng` decimal(10,7) NOT NULL COMMENT 'Lon_Decimal - Longitud en formato DD',
  `altitud` varchar(15) NOT NULL COMMENT 'Altitud – Altitud',
  `carta` varchar(10) NOT NULL COMMENT 'Cve_Carta - Clave de carta topográfica',
  `poblacion` int(11) NOT NULL COMMENT 'Pob_Total – Población Total',
  `masculino` int(11) NOT NULL COMMENT 'Pob_Masculina – Población Masculina',
  `femenino` int(11) NOT NULL COMMENT 'Pob_Femenina – Población Femenina',
  `viviendas` int(11) NOT NULL COMMENT 'Total De Viviendas Habitadas',
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `municipio_id` (`municipio_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Tabla de Localidades de la Republica Mexicana';

-- Volcando datos para la tabla biblioteca.localidades: 0 rows
/*!40000 ALTER TABLE `localidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `localidades` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla biblioteca.migrations: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(16, '2014_10_12_000000_create_users_table', 1),
	(17, '2014_10_12_100000_create_password_resets_table', 1),
	(18, '2019_08_19_000000_create_failed_jobs_table', 1),
	(19, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(20, '2022_04_21_101829_create_invitados_table', 1),
	(21, '2022_04_21_103555_create_categorias_table', 1),
	(22, '2022_04_21_103833_create_licenciaturas_table', 1),
	(23, '2022_04_21_103957_create_editoriales_table', 1),
	(24, '2022_04_21_104138_create_autores_table', 1),
	(25, '2022_04_21_104421_create_libros_table', 1),
	(26, '2022_04_21_104931_create_statuslibros_table', 1),
	(27, '2022_04_21_105216_create_estadolibros_table', 1),
	(28, '2022_04_21_105614_create_status_usuarios_table', 1),
	(29, '2022_04_21_111442_create_prestamos_table', 1),
	(30, '2022_05_18_153236_create_permission_tables', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla biblioteca.model_has_permissions: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla biblioteca.model_has_roles: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Models\\User', 1, '2022-06-30 12:18:21', '2022-06-30 12:18:21'),
	(2, 'App\\Models\\User', 2, NULL, NULL),
	(2, 'App\\Models\\User', 3, NULL, NULL),
	(2, 'App\\Models\\User', 4, NULL, NULL),
	(2, 'App\\Models\\User', 5, NULL, NULL),
	(2, 'App\\Models\\User', 6, NULL, NULL),
	(2, 'App\\Models\\User', 7, NULL, NULL),
	(2, 'App\\Models\\User', 8, NULL, NULL),
	(3, 'App\\Models\\User', 9, NULL, NULL);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.municipios
CREATE TABLE IF NOT EXISTS `municipios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) NOT NULL COMMENT 'Relación con estados.id',
  `clave` varchar(3) NOT NULL COMMENT 'Cve_Mun – Clave del municipio',
  `nombre` varchar(100) NOT NULL COMMENT 'Nom_Mun – Nombre del municipio',
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `estado_id` (`estado_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Tabla de Municipios de la Republica Mexicana';

-- Volcando datos para la tabla biblioteca.municipios: 0 rows
/*!40000 ALTER TABLE `municipios` DISABLE KEYS */;
/*!40000 ALTER TABLE `municipios` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla biblioteca.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla biblioteca.permissions: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'icons3', 'web', '2022-06-30 12:18:19', '2022-06-30 12:18:19'),
	(2, 'PrestamoLibro', 'web', '2022-06-30 12:18:19', '2022-06-30 12:18:19'),
	(3, 'ActivarPrestamos', 'web', '2022-06-30 12:18:20', '2022-06-30 12:18:20');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla biblioteca.personal_access_tokens: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.prestamos
CREATE TABLE IF NOT EXISTS `prestamos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_inicio` timestamp NULL DEFAULT NULL,
  `fecha_limite` timestamp NULL DEFAULT NULL,
  `documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_libro` bigint(20) unsigned NOT NULL,
  `estadolibro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_administrador` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `estado_prestamo` int(11) DEFAULT NULL,
  `devolucion` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prestamos_id_libro_foreign` (`id_libro`),
  CONSTRAINT `prestamos_id_libro_foreign` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla biblioteca.prestamos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `prestamos` DISABLE KEYS */;
INSERT INTO `prestamos` (`id`, `fecha_inicio`, `fecha_limite`, `documento`, `id_libro`, `estadolibro`, `observaciones`, `id_administrador`, `id_alumno`, `estado_prestamo`, `devolucion`, `created_at`, `updated_at`) VALUES
	(1, '2022-06-30 00:00:00', '2022-07-01 00:00:00', 'Credencial UMB', 3, 'Bueno', NULL, 1, 5, 2, 2, '2022-06-30 12:51:40', '2022-06-30 12:55:46'),
	(2, '2022-06-30 00:00:00', '2022-07-06 00:00:00', 'Credencial UMB', 1, 'Regular', NULL, 1, 6, 2, 2, '2022-06-30 12:53:34', '2022-06-30 12:54:31'),
	(3, '2022-06-30 00:00:00', '2022-07-21 00:00:00', 'Credencial UMB', 3, 'Bueno', NULL, 1, 5, 1, 1, '2022-06-30 12:58:43', '2022-06-30 13:21:34'),
	(4, '2022-06-30 00:00:00', '2022-07-07 00:00:00', 'Credencial UMB', 2, 'Malo', 'roto de la pasta', 1, 6, 1, 1, '2022-06-30 13:21:00', '2022-06-30 13:21:28');
/*!40000 ALTER TABLE `prestamos` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla biblioteca.roles: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'web', '2022-06-30 12:18:19', '2022-06-30 12:18:19'),
	(2, 'Alum', 'web', '2022-06-30 12:18:19', '2022-06-30 12:18:19'),
	(3, 'Maes', 'web', '2022-06-30 12:18:19', '2022-06-30 12:18:19'),
	(4, 'Invi', 'web', '2022-06-30 12:18:19', '2022-06-30 12:18:19'),
	(5, 'CoAdmin', 'web', '2022-06-30 12:18:19', '2022-06-30 12:18:19');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla biblioteca.role_has_permissions: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(2, 2),
	(2, 3),
	(3, 1),
	(3, 5);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.statuslibros
CREATE TABLE IF NOT EXISTS `statuslibros` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_status_libro` bigint(20) unsigned NOT NULL,
  `Num_exitentes` int(11) NOT NULL,
  `Prestados` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `statuslibros_id_status_libro_foreign` (`id_status_libro`),
  CONSTRAINT `statuslibros_id_status_libro_foreign` FOREIGN KEY (`id_status_libro`) REFERENCES `libros` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla biblioteca.statuslibros: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `statuslibros` DISABLE KEYS */;
/*!40000 ALTER TABLE `statuslibros` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.status_usuarios
CREATE TABLE IF NOT EXISTS `status_usuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre_status_usu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla biblioteca.status_usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `status_usuarios` DISABLE KEYS */;
INSERT INTO `status_usuarios` (`id`, `Nombre_status_usu`, `created_at`, `updated_at`) VALUES
	(1, 'ACTIVO', '2022-06-30 12:18:20', '2022-06-30 12:18:20'),
	(2, 'BLOQUEADO', '2022-06-30 12:18:20', '2022-06-30 12:18:20');
/*!40000 ALTER TABLE `status_usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_status_usuario` int(11) DEFAULT NULL,
  `rol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clave` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_licenciatura` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_usuario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selectestado` int(11) DEFAULT NULL,
  `selectmunicipio` int(11) DEFAULT NULL,
  `selectlocalidad` int(11) DEFAULT NULL,
  `referencia` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla biblioteca.users: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `id_status_usuario`, `rol`, `clave`, `id_licenciatura`, `imagen_usuario`, `selectestado`, `selectmunicipio`, `selectlocalidad`, `referencia`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin Admin', 'admin@argon.com', '2022-06-30 12:18:21', '$2y$10$A.U4xXLt6ONRUHMepE/BDOT4Ii3oSAH0lkbKDyNhTgyTW8Vc5LCde', 1, 'Admin', '21140280', '1', 'Default.png', 15, 778, 144240, 'CENTRO', NULL, '2022-06-30 12:18:21', '2022-06-30 12:18:21'),
	(2, 'Mauricio Garcia Avila', 'mau1@argon.com', NULL, '$2y$10$.lELbh6FNcuTRCY.vYFQ0.PzUNj0YHkJRaLPsY0EmbN413xAuVqcu', 1, 'Alum', '21180099', 'Lic Informatica', '20220630122446.png', 15, 778, 144240, 'del centro', NULL, '2022-06-30 12:24:47', '2022-06-30 12:24:47'),
	(3, 'Fernando Martinez Lopez', 'fer1@argon.com', NULL, '$2y$10$G1NroidKFvWbTnjsgzQ6d.XesCY42kVc6g7JIDJmUCn0ZeTJ9pg8a', 1, 'Alum', '21172137', 'Lic Informatica', '20220630122601.png', 15, 778, 144240, 'centro', NULL, '2022-06-30 12:26:01', '2022-06-30 12:26:01'),
	(4, 'Jesus Alfredo Martinez Martinez', 'jesusAlfredo@argon.com', NULL, '$2y$10$OmRn4nmAAWfYHOvyLXO/DOtCT5R6tSkOxwrF9pq/f1o4LLM5rmrVi', 1, 'Alum', '21182010', 'Lic Informatica', '20220630122710.png', 15, 778, 144240, 'portales', NULL, '2022-06-30 12:27:10', '2022-06-30 12:27:10'),
	(5, 'Erick Josue Sanchez Salgado', 'josueErick@argon.com', NULL, '$2y$10$LTYIlUUyez1y/LabF5hJdO3rR2jBQr/ARC.M23i01ECsGz4ATPwqu', 1, 'Alum', '21180029', 'Lic Informatica', '20220630122821.png', 15, 778, 144240, 'centro', NULL, '2022-06-30 12:28:22', '2022-06-30 12:28:22'),
	(6, 'Cesar Uriel Segundo Lorenzo', 'cesar1@argon.com', NULL, '$2y$10$bD1rv8WR7rYSaHX.LkZXaO0sXzUu7HCRQvfJ54xifZqgA.MjiSbZi', 1, 'Alum', '21181027', 'Lic Informatica', '20220630122936.png', 15, 778, 144240, 'centro', NULL, '2022-06-30 12:29:36', '2022-06-30 13:18:44'),
	(7, 'Enrique Solis Medina', 'Enrique1@argon.com', NULL, '$2y$10$3accM58BPWDbuZa6dbvii.yTG1nnKfXaVcQ9pNAo.1tC86J924xcu', 1, 'Alum', '21181038', 'Lic Informatica', '20220630123040.png', 15, 778, 144240, 'centro', NULL, '2022-06-30 12:30:40', '2022-06-30 12:30:40'),
	(8, 'Oswaldo Alexis Zepeda Sanchez', 'osvaldo@argon.com', NULL, '$2y$10$ZOmF9Lw3oFOv6hsULwv/g.g5tHaoCdRu1pN/3WOe37N7Kn2OaawVm', 1, 'Alum', '21181086', 'Lic Informatica', '20220630123201.png', 15, 778, 144240, 'centro', NULL, '2022-06-30 12:32:01', '2022-06-30 12:32:01'),
	(9, 'Ivan Santana Carbajal', 'santana@gmail.com', NULL, '$2y$10$xmp1ef6vU5gcWB0IUtDoZu8EmV8toafwDZjnZGDSY9lQKjkQCJM0.', 1, 'Maes', '2592', 'Ingenieria en sistemas computacionales', '20220630123405.png', 15, 778, 144216, 'a un lado de la carretera', NULL, '2022-06-30 12:34:05', '2022-06-30 12:34:05');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

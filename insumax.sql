-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2025 a las 19:35:36
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `insumax`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_09_041219_create_products_table', 1),
(5, '2025_09_09_172429_create_orders_table', 1),
(6, '2025_09_09_173158_create_wishlists_table', 1),
(7, '2025_09_09_233817_create_products_wishlists_table', 1),
(8, '2025_09_11_040844_create_items_table', 1),
(9, '2025_09_11_042434_create_notifications_table', 1),
(10, '2025_09_13_015602_alter_users_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time_interval` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `has_shipped` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `inventory` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `keywords`, `image`, `inventory`, `price`, `created_at`, `updated_at`) VALUES
(3, 'StethoLite Pro Stethoscope', 'Lightweight cardiology-grade stethoscope with dual-head chest piece, tunable diaphragm and soft-seal eartips. Suitable for adults and pediatrics.', 'stethoscope,cardiology,diagnostic,acoustic,patient-monitoring', 'stethoscope.jpg', -49, 89, NULL, '2025-09-23 22:04:17'),
(4, 'ThermoSure Digital Thermometer', 'Fast-read digital thermometer (oral/axillary/rectal), water-resistant tip and memory recall for last 20 measurements.', 'thermometer,digital,temperature,fever,rapid-read', 'digitalThermometer.jpg', 208, 18, NULL, '2025-09-23 22:04:57'),
(5, 'AneroCheck Blood Pressure Kit', 'Manual aneroid sphygmomanometer with soft nylon cuff (adult), calibrated gauge and durable bulb pump.', 'blood pressure,sphygmomanometer,manual,cuff,cardiac', 'pressureKit.jpg', 34, 74, NULL, NULL),
(6, 'AutoPulse Wrist BP Monitor', 'Automatic wrist blood pressure monitor with Bluetooth, multi-user profiles and one-touch operation.', 'bp-monitor,automatic,wrist,bluetooth,home-care', 'pressureMonitor.jpg', 96, 59, NULL, NULL),
(7, 'OtoView LED Otoscope', 'Handheld LED otoscope with disposable specula, 3.5 V bright lighting and magnified inspection lens.', 'otoscope,ear,ENT,led,diagnostic', 'othoscope.jpg', 62, 129, NULL, NULL),
(8, 'VisionScope Direct Ophthalmoscope', 'Compact ophthalmoscope with multiple aperture settings, adjustable illumination and rechargeable battery.', 'ophthalmoscope,eye,vision,diagnostic,rechargeable', 'ophtalmoscope.jpg', 18, 249, NULL, NULL),
(9, 'SurgiEdge Scalpel Set (10 pcs)', 'Sterile disposable scalpel blades and ergonomic handles. Includes assorted blade sizes for general surgical procedures.', 'scalpel,surgical,sterile,disposable,blades', 'scalpel.jpg', 140, 34, NULL, NULL),
(10, 'CardioLead ECG Electrode Pack (50)', 'Pre-gelled adhesive ECG electrodes with snap connector. Low-noise silver/silver chloride material for reliable tracing.', 'ecg,electrodes,cardiac,monitoring,silver-chloride', 'ELECTRODE.jpg', 320, 22, NULL, NULL),
(11, 'PulseOximeter Fingertip Mini', 'Portable fingertip pulse oximeter displaying SpO2 and pulse rate. Automatic power-off and low-battery indicator.', 'pulse-oximeter,spo2,pulse,fingertip,portable', 'pulsoximeter.jpg', 254, 39, NULL, NULL),
(12, 'FlowEase Nebulizer Home Unit', 'Compact compressor nebulizer for respiratory therapies; quiet operation and pediatric mask included.', 'nebulizer,respiratory,inhalation,compressor,home-care', 'nebulizer.jpg', 72, 84, NULL, NULL),
(13, 'InfuMaster Portable Infusion Pump', 'Lightweight volumetric infusion pump with programmable rates, occlusion alarm and rechargeable battery for ambulatory use.', 'infusion-pump,iv,ambulatory,programmable,alarm', 'infusionPump.jpg', 12, 1199, NULL, NULL),
(14, 'UltraGel Medical Ultrasound Gel (250 ml)', 'Non-irritant ultrasound coupling gel, clear, hypoallergenic and water-soluble for diagnostic imaging.', 'ultrasound-gel,sonography,coupling,non-irritant,imaging', 'gel.jpg', 430, 12, NULL, NULL),
(15, 'SpeciCool Transport Cooler (6L)', 'Small sample transport cooler with ice-pack compartment, temperature-stable insulation and secure latch.', 'transport-cooler,specimen,lab,temperature-control,medical-transport', 'cooler.jpg', 26, 69, NULL, NULL),
(16, 'DexiGrip Surgical Forceps (Pack of 6)', 'Stainless steel surgical forceps with serrated tips and box-lock hinge. Sterilizable and corrosion-resistant.', 'forceps,surgical,stainless-steel,sterilizable,instruments', '23.webp', 88, 56, NULL, NULL),
(17, 'QuickSuture Basic Suturing Kit', 'Complete suturing kit with needle driver, forceps, scissors and assorted suture packs for basic wound closure.', 'suture,kit,needle-driver,wound-care,emergency', '17.webp', 150, 45, NULL, '2025-09-23 12:17:41'),
(18, 'MagnaScan 1.5T MRI System', 'High-resolution magnetic resonance imaging system with 1.5 Tesla magnet strength, advanced coils, and patient comfort design.', 'mri,imaging,magnetic resonance,diagnostic,radiology', 'MRI.jpg', 2, 1250000, NULL, NULL),
(19, 'EchoWave Portable Ultrasound', 'Compact portable ultrasound device with color Doppler and touchscreen interface for point-of-care diagnostics.', 'ultrasound,portable,diagnostic,sonography,doppler', 'ultrasound.webp', 15, 18999, NULL, NULL),
(20, 'NeuroQuick EEG Headset', 'Wireless EEG headset for rapid brainwave monitoring, multi-channel recording and cloud data integration.', 'eeg,neurology,brainwave,monitoring,diagnostic', 'EEG.webp', 23, 7999, NULL, '2025-09-23 22:01:18'),
(21, 'VitaFlow Infusion Stand Module', 'Adjustable infusion stand with multiple hooks, stainless steel body and smooth-rolling wheels.', 'infusion,stand,iv,modular,clinical', 'infusion.webp', 50, 249, NULL, NULL),
(22, 'Dermalight Phototherapy Lamp', 'Dermatology phototherapy unit for UV light treatment of skin conditions, adjustable intensity and timer control.', 'phototherapy,dermatology,uv,skin,therapy', 'phototherapy.webp', 8, 4799, NULL, NULL),
(23, 'RespiraMax CPAP Machine', 'Continuous positive airway pressure device with humidifier, auto-adjusting pressure and quiet motor.', 'cpap,sleep apnea,respiratory,therapy,airway', '23.webp', 30, 1199, NULL, '2025-09-23 11:38:47'),
(25, 'MicroTest Blood Glucose Analyzer', 'Handheld glucose analyzer for rapid testing, uses micro-sample strips and provides results in 5 seconds.', 'glucose,analyzer,diabetes,blood,sugar', 'glucoseAnalyzer.jpg', 210, 149, NULL, NULL),
(26, 'FlexiScope Video Laryngoscope', 'High-resolution video laryngoscope with reusable display, anti-fog blade and recording capabilities.', 'laryngoscope,airway,video,ent,intubation', 'videoLaryngoscope.jpg', 12, 2999, NULL, NULL),
(27, 'LabSense Hematology Analyzer', 'Automated hematology analyzer with 5-part differential, touchscreen control and high throughput.', 'hematology,analyzer,blood,lab,automation', 'HematologyAnalyzer.webp', 5, 54999, NULL, NULL),
(28, 'CryoStore Vaccine Freezer (–80°C)', 'Ultra-low temperature freezer for vaccine storage with digital monitoring and alarm system.', 'freezer,vaccine,storage,cryo,temperature', 'vaccineFreezer.webp', 10, 8999, NULL, NULL),
(29, 'OrthoAlign External Fixator Kit', 'Orthopedic external fixator set with adjustable rods, clamps and sterilizable components.', 'orthopedic,fixator,external,surgery,alignment', 'externalFixator.jpg', 18, 2599, NULL, NULL),
(30, 'SafeDraw Phlebotomy Starter Pack', 'Complete starter pack for safe phlebotomy procedures including tourniquets, needles, and collection tubes.', 'phlebotomy,blood,collection,starter,needles', 'phlebotomyStarter.webp', 90, 129, NULL, NULL),
(31, 'BioTrace Rapid PCR Cartridge System', 'Portable PCR testing system with single-use cartridges for fast pathogen detection.', 'pcr,rapid-test,cartridge,diagnostic,laboratory', 'PCR.webp', 25, 15999, NULL, NULL),
(32, 'MediCart Mobile Procedure Trolley', 'Stainless steel mobile trolley with drawers, side rails and locking wheels for clinical procedures.', 'trolley,procedure,mobile,cart,medical', 'trolley.webp', 40, 799, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_wishlist`
--

CREATE TABLE `product_wishlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `wishlist_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('VyTGDswbvFQBfFFecSESMnkBizpBp1nFu5xkkoGw', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSlVzd0U4Z3d2ZmtSTjhoVHNPTDBpMnRhcUdYbmVxVFBBR3ZoWWtBQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzU4NjQ2NzgyO319', 1758647196);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `address`, `balance`, `role`) VALUES
(1, 'Severus Snape', 'severus@admin.com', NULL, '$2y$12$bTYu1uGtHLYowCJ0I7BSZeRxrpGb3jKDTE16QPcd82ppt3Ada9thS', '74GkIJ4vmqXjgoUYfzGchHwIMNRzCKTuJGlxBK15DsVFFEB6Eehc4DKL1g8j', '2025-09-19 05:21:48', '2025-09-23 22:04:57', 'r5ydfh', 999983332, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_product_id_foreign` (`product_id`),
  ADD KEY `items_order_id_foreign` (`order_id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_product_id_foreign` (`product_id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product_wishlist`
--
ALTER TABLE `product_wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_wishlist_product_id_foreign` (`product_id`),
  ADD KEY `product_wishlist_wishlist_id_foreign` (`wishlist_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `product_wishlist`
--
ALTER TABLE `product_wishlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `product_wishlist`
--
ALTER TABLE `product_wishlist`
  ADD CONSTRAINT `product_wishlist_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_wishlist_wishlist_id_foreign` FOREIGN KEY (`wishlist_id`) REFERENCES `wishlists` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

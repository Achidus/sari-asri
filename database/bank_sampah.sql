-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 13, 2025 at 09:19 AM
-- Server version: 8.0.40
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_sampah`
--

-- --------------------------------------------------------

--
-- Table structure for table `aplikasi_android`
--

CREATE TABLE `aplikasi_android` (
  `id` bigint UNSIGNED NOT NULL,
  `versi_aplikasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran_file` bigint NOT NULL,
  `url_apk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` bigint UNSIGNED NOT NULL,
  `judul_postingan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_postingan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','tidak_aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengiriman`
--

CREATE TABLE `detail_pengiriman` (
  `id` bigint UNSIGNED NOT NULL,
  `pengiriman_id` bigint UNSIGNED NOT NULL,
  `sampah_id` bigint UNSIGNED NOT NULL,
  `berat_kg` decimal(15,2) NOT NULL,
  `harga_per_kg` decimal(10,2) NOT NULL,
  `harga_total` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` bigint UNSIGNED NOT NULL,
  `transaksi_id` bigint UNSIGNED NOT NULL,
  `sampah_id` bigint UNSIGNED NOT NULL,
  `berat_kg` decimal(15,2) NOT NULL,
  `harga_per_kg` decimal(10,2) NOT NULL,
  `harga_total` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint UNSIGNED NOT NULL,
  `judul_feedback` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_feedback` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nasabah_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `judul_feedback`, `isi_feedback`, `nasabah_id`, `created_at`, `updated_at`) VALUES
(1, 'Rerum ducimus aut voluptatem.', 'Consequuntur assumenda voluptatem accusantium veritatis sunt. Vel quos deleniti perferendis vitae assumenda nulla omnis. Corrupti necessitatibus eius quod voluptas pariatur harum.', 7, '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(2, 'Libero quos quam consequuntur cumque in sit molestias.', 'Illum ab quas molestiae consequatur provident molestiae ipsam fuga. Impedit iste omnis magnam inventore.', 3, '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(3, 'Nostrum sit accusantium minus.', 'Explicabo eos deleniti deserunt sunt ut corrupti facilis. Veniam quos temporibus et eveniet error ad. Ratione voluptate voluptatem sunt perferendis. Sed non quam perferendis ut earum neque.', 5, '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(4, 'Fuga necessitatibus quia saepe nobis.', 'Veniam sequi sed doloremque voluptas laboriosam beatae repudiandae. Voluptatem expedita asperiores ducimus asperiores blanditiis at.', 7, '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(5, 'Doloribus sit qui est nemo.', 'Molestiae ut quis ratione fugiat voluptates. Impedit quia ullam ut quidem.', 1, '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(6, 'Placeat consequatur accusantium quia voluptas nam quaerat facilis ullam.', 'Molestiae incidunt asperiores ex ab nostrum quidem. Voluptates temporibus vel enim quis. Aliquam non animi tempora ut voluptas et.', 7, '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(7, 'Rem esse quidem ducimus quo.', 'Illum omnis sapiente ea omnis omnis. Et laboriosam optio aut nihil. Omnis maiores sunt est sit ut provident non. Modi nostrum vitae modi enim tenetur harum libero quia.', 5, '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(8, 'Non magnam dicta itaque nam voluptatem.', 'Corporis at quae velit assumenda. Quibusdam quo laudantium natus tempora earum nisi. Magni et sit ut eum iusto et. Rerum dolorem facere voluptate et dignissimos.', 3, '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(9, 'Explicabo optio at ex voluptas.', 'Qui similique unde deleniti id dolorem a. Ipsam ullam perspiciatis quo iusto quidem. Vero quo reiciendis natus nisi tempora doloremque temporibus. Sint atque qui sed animi accusamus ducimus cupiditate. Et perspiciatis tempora veritatis quod.', 1, '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(10, 'Vel magnam omnis architecto ut sapiente.', 'Neque aut ex laborum dolores voluptatem ut nihil ex. Consectetur dolores iste doloremque expedita. At velit autem voluptas at.', 3, '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(11, 'Ratione et eveniet autem quis.', 'Et at iure sequi voluptatem recusandae maxime placeat. Eligendi et eum omnis quisquam porro et. Voluptates excepturi sunt ducimus quos error sunt.', 2, '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(12, 'Sit non facere tempora quaerat tenetur accusamus dolorem.', 'Corrupti dolore ratione quidem. Perspiciatis repellat odio incidunt tenetur itaque. Ut ex eum id rerum aut. Amet ut quo sit aspernatur odio quos consequatur.', 7, '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(13, 'Officiis magni quia exercitationem.', 'Id recusandae pariatur consectetur facere accusamus quaerat veritatis minus. Quos nostrum velit minima veritatis sapiente. Numquam doloremque quisquam velit aut. Ut qui odio dolores animi.', 1, '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(14, 'Fuga qui soluta dolore facilis explicabo quo ut magnam.', 'Qui sed eveniet ipsa et est. Id ullam porro dolorum quis et nemo. Officia sequi harum eos vel eligendi qui assumenda.', 4, '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(15, 'Quia nihil voluptas ut qui tempore ut.', 'Hic omnis blanditiis aut facilis minima. Ut neque voluptatem sapiente soluta cumque et reiciendis voluptates.', 5, '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(16, 'Quia est ut ea necessitatibus quo vitae.', 'Non nobis excepturi voluptas quisquam iusto fugiat. Et error culpa officiis natus. Eos qui aut deleniti officia.', 6, '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(17, 'Animi tenetur soluta voluptas fuga et.', 'Cupiditate aut libero non est aliquid nisi. Sed repudiandae doloremque dolores repudiandae nostrum facilis. Ullam repellendus qui impedit atque.', 2, '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(18, 'Ea tenetur quis culpa perferendis minus.', 'Expedita id veniam accusantium ducimus quae aut. Tempora quaerat et eum beatae. Necessitatibus animi dolore ut aut. Provident accusamus ducimus aperiam quasi temporibus dignissimos.', 3, '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(19, 'Tempore et eius est ipsum.', 'Vel iusto similique iusto deleniti et maxime. Odio ratione quod ea explicabo magni omnis. Autem sit dolores voluptatibus omnis quia repellendus totam.', 1, '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(20, 'Qui iure est aliquid et aut qui eos.', 'Maxime culpa doloremque consectetur dignissimos deserunt officia. Aliquam sed ut repudiandae magni voluptatum.', 4, '2025-01-12 20:41:36', '2025-01-12 20:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `media_artikel`
--

CREATE TABLE `media_artikel` (
  `id` bigint UNSIGNED NOT NULL,
  `artikel_id` bigint UNSIGNED NOT NULL,
  `file_gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metode_pencairan`
--

CREATE TABLE `metode_pencairan` (
  `id` bigint UNSIGNED NOT NULL,
  `nasabah_id` bigint UNSIGNED NOT NULL,
  `nama_metode_pencairan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_10_28_024100_create_nasabah_table', 1),
(5, '2024_10_28_024341_create_saldo_table', 1),
(6, '2024_10_28_024410_create_petugas_table', 1),
(7, '2024_10_28_024430_create_sampah_table', 1),
(8, '2024_10_28_024451_create_pengepul_table', 1),
(9, '2024_10_28_024536_create_transaksi_table', 1),
(10, '2024_10_28_024601_create_detail_transaksi_table', 1),
(11, '2024_10_28_024625_create_pengiriman_pengepul_table', 1),
(12, '2024_10_28_024646_create_detail_pengiriman_table', 1),
(13, '2024_10_28_024700_create_artikel_table', 1),
(14, '2024_10_28_024724_create_media_artikel_table', 1),
(15, '2024_10_28_024742_create_banner_table', 1),
(16, '2024_10_28_024803_create_token_whatsapp_table', 1),
(17, '2024_10_28_024827_create_feedback_table', 1),
(18, '2024_10_28_024859_create_metode_pencairan_table', 1),
(19, '2024_10_28_024920_create_pencairan_saldo_table', 1),
(20, '2024_10_28_024946_create_tentang_kami_table', 1),
(21, '2024_10_28_234621_create_aplikasi_android_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id` bigint UNSIGNED NOT NULL,
  `no_registrasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_lengkap` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profil.png',
  `status` enum('aktif','tidak_aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id`, `no_registrasi`, `nik`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `email`, `username`, `password`, `alamat_lengkap`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(1, 'REG198', '6152223307479543', 'Muhammad Carroll', 'Perempuan', 'Lake Lilianehaven', '1970-08-05', '1-412-831-9205', 'reichert.madalyn@example.org', 'xbraun', '$2y$12$a01DpaXx.ByEcetl5.dQkOCdksSQ8lnsvhGuNZ0/XxwHJuMt6v.RS', '34556 Gino Park\r\nWest Damarishaven, VT 18688', 'default.jpg', 'aktif', '2025-01-12 20:41:32', '2025-01-12 20:43:20'),
(2, 'REG310', '5011940499364232', 'Fermin Emard', 'Perempuan', 'Angelitaton', '1996-11-07', '1-925-480-1014', 'dooley.hettie@example.com', 'precious.heaney', '$2y$12$/sAExsZoXf38pXRZ9YqGmO1K2XK2J7DDRwmt6Hxcf3R/GjbwErrb2', '10694 Corwin Trail Suite 566\nSouth Lottie, WI 00626-3557', 'default.jpg', 'aktif', '2025-01-12 20:41:32', '2025-01-12 20:41:32'),
(3, 'REG941', '1283818141079810', 'Jess VonRueden', 'Perempuan', 'North Elmiramouth', '1999-04-11', '+1-520-468-7097', 'joanne.grady@example.org', 'lemke.nasir', '$2y$12$e5nn9dhZG6iaSmi9HdSXx.nnNk2eP2A1d.Yg9PCyH5ADDqCSXrAwG', '6523 Carley Summit\nNew Jaylin, MD 98143', 'default.jpg', 'aktif', '2025-01-12 20:41:33', '2025-01-12 20:41:33'),
(4, 'REG355', '0078909528350422', 'Horacio Grimes', 'Perempuan', 'Port Amieberg', '1991-05-20', '+1.432.414.2167', 'christian00@example.org', 'aconn', '$2y$12$NyOZqM7.pH1HXlEFmO6qzuwc9bkf3Ew8DjBVfdHfPHVNo3GCRq0Am', '31264 Nicolas Circles Suite 311\nWillville, MA 56198', 'default.jpg', 'aktif', '2025-01-12 20:41:33', '2025-01-12 20:41:33'),
(5, 'REG314', '0000224075583159', 'Kristin Lindgren', 'Perempuan', 'Solonfort', '1985-04-11', '1-458-416-3507', 'feeney.jamey@example.com', 'gwisozk', '$2y$12$rwjjBVE2t0AjdutfYyI3ju8yho1lPi25Z6eEF31do.hwheGE0xohO', '41498 Schimmel Prairie Apt. 577\nStantonfort, NJ 36148', 'default.jpg', 'aktif', '2025-01-12 20:41:33', '2025-01-12 20:41:33'),
(6, 'REG665', '9569643048556494', 'Malcolm McLaughlin', 'Laki-laki', 'Larsonborough', '1994-02-21', '979-622-3821', 'gdonnelly@example.org', 'eichmann.nolan', '$2y$12$WhOmffJo5ZelpIjdyaljCOwy6Joz7on1bh6jWfKVsRMCDC.2mA/rC', '86208 Brenden Pine Apt. 270\nSouth Shana, NV 42739', 'default.jpg', 'aktif', '2025-01-12 20:41:33', '2025-01-12 20:41:33'),
(7, 'REG552', '8083723785439958', 'Antonette O\'Keefe', 'Perempuan', 'South Jimmiechester', '1998-07-17', '223-224-8151', 'wilhelmine63@example.com', 'price.louie', '$2y$12$B.6vNS3nK0SOBtNep0QvOOHPJ77cdU5UfWZsq1JKXO3hUEUjDjk9.', '9579 Consuelo Bypass Apt. 322\nMosciskihaven, AR 27472', 'default.jpg', 'aktif', '2025-01-12 20:41:33', '2025-01-12 20:41:33'),
(8, 'REG985', '3326430903200908', 'Prof. Summer Schaefer', 'Perempuan', 'Darenside', '1971-02-23', '785.758.6211', 'rau.mariam@example.net', 'mhermann', '$2y$12$yoeHljNGLh9IQseV59RC.emrglytLspir0aa6tPJLfmQ1MwyuR0Tu', '36779 Ullrich Prairie\nNorth Gia, NY 93564-1736', 'default.jpg', 'aktif', '2025-01-12 20:41:34', '2025-01-12 20:41:34'),
(9, 'REG201', '7816261090337541', 'Miss Bailee Hansen', 'Perempuan', 'Autumntown', '1984-01-24', '563.566.3095', 'ebert.akeem@example.org', 'nrunolfsdottir', '$2y$12$ZhA/Q8WA.OoghtD.SIVKG.Ys2j9ysVAYF1fvsyPDLr/GYHRyJdN6.', '702 Anibal Walks\nNew Hendersonberg, NE 78154-3558', 'default.jpg', 'aktif', '2025-01-12 20:41:34', '2025-01-12 20:41:34'),
(10, 'REG801', '0081926175688116', 'Isabella Boyer', 'Laki-laki', 'Gutkowskihaven', '1987-05-30', '+1-828-751-6788', 'owolff@example.org', 'anjali10', '$2y$12$F6eLBLlc9aqpxOcA5SVVlOmcLehwMFfTL2u/gZvfLKJ4V2.riO116', '31948 Camden Highway\r\nNew Kendall, ID 00270-3912', 'default.jpg', 'aktif', '2025-01-12 20:41:34', '2025-01-12 20:48:49'),
(11, 'REG939', '4811884126102186', 'Dr. Lexus Daniel', 'Perempuan', 'Port Cassie', '1998-05-10', '+1-646-813-2926', 'willow.durgan@example.com', 'wehner.jeanne', '$2y$12$5qDATPOX0cfc.PO4Ev.vouRijmYdoErr7QpYqjUzbwuMYXO4kVF96', '95648 Gleichner Fort\nQueenville, CO 98695-2372', 'default.jpg', 'aktif', '2025-01-12 20:41:34', '2025-01-12 20:41:34'),
(12, 'REG637', '2039860076348024', 'Jeromy Batz', 'Perempuan', 'Francescoberg', '1982-03-14', '+1 (727) 774-9003', 'ramon.steuber@example.org', 'turner.chadrick', '$2y$12$/7y.26ehReEuFUUdXw.moeT78NaB42A1V5rS6Yug/RkCHu2l07Fhu', '409 Gutkowski Plaza Suite 093\nWest Chester, ME 27117', 'default.jpg', 'aktif', '2025-01-12 20:41:35', '2025-01-12 20:41:35'),
(13, 'REG883', '2298895096960796', 'Sydnee Senger V', 'Laki-laki', 'Titoport', '1980-11-05', '469-852-8367', 'shields.davonte@example.net', 'lkris', '$2y$12$Z5EPnYkhYcEwk71HVAbqyeewr49LIXewfQ4buBBgSkekOtZxhHIrW', '73671 Hyatt Fall\nValliemouth, DC 66997-3986', 'default.jpg', 'aktif', '2025-01-12 20:41:35', '2025-01-12 20:41:35'),
(14, 'REG449', '5422604955761798', 'Ms. Burnice McClure', 'Perempuan', 'Orinland', '1985-10-18', '+1 (239) 379-8888', 'pking@example.net', 'harris.russel', '$2y$12$h4uyGLDeAqpcvPkmQkefIeqHdP9A9yLyoXxta7aYzHKS6fv95K2CK', '243 Marta Shoal\nNew Antoninatown, RI 75767-0950', 'default.jpg', 'aktif', '2025-01-12 20:41:35', '2025-01-12 20:41:35'),
(15, 'REG430', '0846059493416980', 'Lelia Kunze', 'Laki-laki', 'New Martamouth', '1975-02-27', '1-321-976-0749', 'hlynch@example.net', 'ywill', '$2y$12$PBCUdBerDjEvsyI8EnzEEeJ0HwXQ0DSTInCCN9y9IvRTkFraJR3.6', '6704 Hessel Mount\nSouth Henrietteburgh, TX 78863', 'default.jpg', 'aktif', '2025-01-12 20:41:35', '2025-01-12 20:41:35'),
(16, 'REG425', '3342874303841916', 'Jarret Mertz', 'Laki-laki', 'Dibbertside', '1999-05-03', '239.939.7614', 'franecki.trent@example.net', 'mhane', '$2y$12$61djtk5ux0vUno9CKNXRLO7nie8eN2oNcXnq8jq.EvQj/Im4TUgNa', '9260 Verona Mountains Apt. 851\nNew Eliezermouth, CT 56011', 'default.jpg', 'aktif', '2025-01-12 20:41:35', '2025-01-12 20:41:35'),
(17, 'REG603', '5785746544765223', 'Alan Schiller', 'Laki-laki', 'Port Kira', '1983-03-13', '+17329071706', 'natalie.donnelly@example.org', 'electa80', '$2y$12$2qsrPzUDMEnLHGtM1X523eMI2qG9i/RlJzdA1c6ERwotiJE7YuQN6', '3365 Luella Extension\nWest Harrymouth, GA 40231-6958', 'default.jpg', 'aktif', '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(18, 'REG487', '6792312750392535', 'Elyse Morissette DDS', 'Laki-laki', 'West Vestaton', '1980-09-24', '1-718-573-4090', 'margaretta.tremblay@example.org', 'beatty.jefferey', '$2y$12$sGco4QwjGh31Dp/00g/tleJFP.3HY7ptTKQ46V/5nvEtNCEY4iXgW', '46289 Dawn Lights Suite 088\nLanefurt, UT 07877', 'default.jpg', 'aktif', '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(19, 'REG995', '1507620570354282', 'Jeffry Fisher', 'Laki-laki', 'Heidenreichton', '1999-04-04', '330-880-4269', 'ephraim.ondricka@example.com', 'tatyana07', '$2y$12$9t0.gIFRpRNf6HksrZut4u0WeZVkA9xv76ucePg/O/lP39nQ0FRqS', '513 Walker Pike Suite 870\nEmeliefort, SC 22263-8088', 'default.jpg', 'aktif', '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(20, 'REG894', '1435412776116912', 'Prof. Katlyn McGlynn Jr.', 'Perempuan', 'Lakinhaven', '1995-04-07', '+1 (940) 487-6946', 'xrolfson@example.org', 'abshire.forest', '$2y$12$iqRVqyyYFQyCQe1vXGY/uencRVPS6xBR.4o6ygmJSwEriBlQl6/m.', '80881 Karl Meadows Suite 225\nMarvinhaven, NH 05119', 'default.jpg', 'aktif', '2025-01-12 20:41:36', '2025-01-12 20:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pencairan_saldo`
--

CREATE TABLE `pencairan_saldo` (
  `id` bigint UNSIGNED NOT NULL,
  `nasabah_id` bigint UNSIGNED NOT NULL,
  `metode_id` bigint UNSIGNED NOT NULL,
  `jumlah_pencairan` decimal(15,2) NOT NULL,
  `tanggal_pengajuan` timestamp NULL DEFAULT NULL,
  `tanggal_proses` timestamp NULL DEFAULT NULL,
  `status` enum('pending','disetujui','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengepul`
--

CREATE TABLE `pengepul` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengepul`
--

INSERT INTO `pengepul` (`id`, `nama`, `alamat`, `kontak`, `created_at`, `updated_at`) VALUES
(1, 'Macejkovic-Littel', '6741 Stark Landing Suite 992\nSouth Louie, GA 94084-5709', '551.518.2096', '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(2, 'Murray PLC', '2676 Sarina Loop\nEast Sigridfort, CT 01738-5385', '+1-272-390-4161', '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(3, 'Kemmer LLC', '8335 Terry Turnpike\nLake Fletashire, MD 11048-5707', '520-248-7723', '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(4, 'Beahan, Abernathy and Dare', '46108 Rosie Ridge\nNorth Arleneview, CA 55810', '346.358.1462', '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(5, 'Kutch Group', '13412 Devyn Summit\nSouth Tabitha, KS 11251-8485', '+1.803.317.3702', '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(6, 'Eichmann-White', '365 Leuschke Glen\nLillianport, MA 81857-7448', '+1 (502) 953-0139', '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(7, 'Reilly, Marquardt and Grant', '353 Sydney Route\nScarlettshire, SC 99164', '+15599241522', '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(8, 'Zboncak, Feeney and Mayer', '721 Wuckert Garden Suite 532\nLake Deron, GA 86933-2219', '551-201-5184', '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(9, 'Koelpin-Koch', '95865 Goyette Expressway Apt. 882\nEliashaven, HI 65903-8061', '813-659-3929', '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(10, 'Shields-Pollich', '413 Leanne Motorway\nO\'Konhaven, NJ 89972', '+12015967749', '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(11, 'Farrell, Lubowitz and Stracke', '8580 Gislason Points\nEast Vada, IA 45687-2384', '+1.856.999.5522', '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(12, 'Bernhard Inc', '90232 Shyanne Station\nNikotown, TX 93089', '(502) 372-7764', '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(13, 'Kiehn Inc', '9375 Gulgowski Mills Apt. 137\nSouth Gerhard, IL 28537', '219-829-1060', '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(14, 'Orn PLC', '403 Blanda Station Suite 201\nBarbaraport, WV 24924-8145', '862.465.7004', '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(15, 'Borer-Zulauf', '700 Manuel Port Suite 970\nLeonorview, AR 18901', '520.317.9270', '2025-01-12 20:41:36', '2025-01-12 20:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman_pengepul`
--

CREATE TABLE `pengiriman_pengepul` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pengiriman` date DEFAULT NULL,
  `pengepul_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','petugas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'petugas',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `email`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', 'admin', '$2y$12$xsLWbx05JlNHVV2GHEtxVehqtC5vwCtiWy1vuwvDld/Cds5JjHzDm', 'admin', '2025-01-12 20:41:32', '2025-01-12 20:41:32'),
(2, 'Petugas User', 'petugas@example.com', 'petugas', '$2y$12$Mjpe7y9c.4ZmQX471JkY7u0hx9fv84az8duTXkSVHYFHSz8ZpS.KC', 'petugas', '2025-01-12 20:41:32', '2025-01-12 20:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `id` bigint UNSIGNED NOT NULL,
  `nasabah_id` bigint UNSIGNED NOT NULL,
  `saldo` decimal(15,2) NOT NULL,
  `tanggal_update` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`id`, `nasabah_id`, `saldo`, `tanggal_update`, `created_at`, `updated_at`) VALUES
(1, 1, 0.00, '2025-01-12 20:41:32', '2025-01-12 20:41:32', '2025-01-12 20:41:32'),
(2, 2, 0.00, '2025-01-12 20:41:32', '2025-01-12 20:41:32', '2025-01-12 20:41:32'),
(3, 3, 0.00, '2025-01-12 20:41:33', '2025-01-12 20:41:33', '2025-01-12 20:41:33'),
(4, 4, 0.00, '2025-01-12 20:41:33', '2025-01-12 20:41:33', '2025-01-12 20:41:33'),
(5, 5, 0.00, '2025-01-12 20:41:33', '2025-01-12 20:41:33', '2025-01-12 20:41:33'),
(6, 6, 0.00, '2025-01-12 20:41:33', '2025-01-12 20:41:33', '2025-01-12 20:41:33'),
(7, 7, 0.00, '2025-01-12 20:41:33', '2025-01-12 20:41:33', '2025-01-12 20:41:33'),
(8, 8, 0.00, '2025-01-12 20:41:34', '2025-01-12 20:41:34', '2025-01-12 20:41:34'),
(9, 9, 0.00, '2025-01-12 20:41:34', '2025-01-12 20:41:34', '2025-01-12 20:41:34'),
(10, 10, 0.00, '2025-01-12 20:41:34', '2025-01-12 20:41:34', '2025-01-12 20:41:34'),
(11, 11, 0.00, '2025-01-12 20:41:34', '2025-01-12 20:41:34', '2025-01-12 20:41:34'),
(12, 12, 0.00, '2025-01-12 20:41:35', '2025-01-12 20:41:35', '2025-01-12 20:41:35'),
(13, 13, 0.00, '2025-01-12 20:41:35', '2025-01-12 20:41:35', '2025-01-12 20:41:35'),
(14, 14, 0.00, '2025-01-12 20:41:35', '2025-01-12 20:41:35', '2025-01-12 20:41:35'),
(15, 15, 0.00, '2025-01-12 20:41:35', '2025-01-12 20:41:35', '2025-01-12 20:41:35'),
(16, 16, 0.00, '2025-01-12 20:41:35', '2025-01-12 20:41:35', '2025-01-12 20:41:35'),
(17, 17, 0.00, '2025-01-12 20:41:36', '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(18, 18, 0.00, '2025-01-12 20:41:36', '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(19, 19, 0.00, '2025-01-12 20:41:36', '2025-01-12 20:41:36', '2025-01-12 20:41:36'),
(20, 20, 0.00, '2025-01-12 20:41:36', '2025-01-12 20:41:36', '2025-01-12 20:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `sampah`
--

CREATE TABLE `sampah` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_sampah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_per_kg` decimal(10,2) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sampah`
--

INSERT INTO `sampah` (`id`, `nama_sampah`, `harga_per_kg`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Plastik', 5000.00, NULL, '2025-01-12 20:45:10', '2025-01-12 20:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `tentang_kami`
--

CREATE TABLE `tentang_kami` (
  `id` bigint UNSIGNED NOT NULL,
  `isi_tentang_kami` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `token_whatsapp`
--

CREATE TABLE `token_whatsapp` (
  `id` bigint UNSIGNED NOT NULL,
  `token_whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nasabah_id` bigint UNSIGNED NOT NULL,
  `petugas_id` bigint UNSIGNED NOT NULL,
  `tanggal_transaksi` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aplikasi_android`
--
ALTER TABLE `aplikasi_android`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pengiriman_pengiriman_id_foreign` (`pengiriman_id`),
  ADD KEY `detail_pengiriman_sampah_id_foreign` (`sampah_id`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_transaksi_transaksi_id_foreign` (`transaksi_id`),
  ADD KEY `detail_transaksi_sampah_id_foreign` (`sampah_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_nasabah_id_foreign` (`nasabah_id`);

--
-- Indexes for table `media_artikel`
--
ALTER TABLE `media_artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_artikel_artikel_id_foreign` (`artikel_id`);

--
-- Indexes for table `metode_pencairan`
--
ALTER TABLE `metode_pencairan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `metode_pencairan_nasabah_id_foreign` (`nasabah_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nasabah_email_unique` (`email`),
  ADD UNIQUE KEY `nasabah_username_unique` (`username`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pencairan_saldo`
--
ALTER TABLE `pencairan_saldo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pencairan_saldo_nasabah_id_foreign` (`nasabah_id`),
  ADD KEY `pencairan_saldo_metode_id_foreign` (`metode_id`);

--
-- Indexes for table `pengepul`
--
ALTER TABLE `pengepul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengiriman_pengepul`
--
ALTER TABLE `pengiriman_pengepul`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengiriman_pengepul_pengepul_id_foreign` (`pengepul_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `petugas_email_unique` (`email`),
  ADD UNIQUE KEY `petugas_username_unique` (`username`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saldo_nasabah_id_foreign` (`nasabah_id`);

--
-- Indexes for table `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token_whatsapp`
--
ALTER TABLE `token_whatsapp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_nasabah_id_foreign` (`nasabah_id`),
  ADD KEY `transaksi_petugas_id_foreign` (`petugas_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aplikasi_android`
--
ALTER TABLE `aplikasi_android`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `media_artikel`
--
ALTER TABLE `media_artikel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `metode_pencairan`
--
ALTER TABLE `metode_pencairan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pencairan_saldo`
--
ALTER TABLE `pencairan_saldo`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengepul`
--
ALTER TABLE `pengepul`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pengiriman_pengepul`
--
ALTER TABLE `pengiriman_pengepul`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sampah`
--
ALTER TABLE `sampah`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `token_whatsapp`
--
ALTER TABLE `token_whatsapp`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  ADD CONSTRAINT `detail_pengiriman_pengiriman_id_foreign` FOREIGN KEY (`pengiriman_id`) REFERENCES `pengiriman_pengepul` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_pengiriman_sampah_id_foreign` FOREIGN KEY (`sampah_id`) REFERENCES `sampah` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_sampah_id_foreign` FOREIGN KEY (`sampah_id`) REFERENCES `sampah` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_transaksi_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_nasabah_id_foreign` FOREIGN KEY (`nasabah_id`) REFERENCES `nasabah` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `media_artikel`
--
ALTER TABLE `media_artikel`
  ADD CONSTRAINT `media_artikel_artikel_id_foreign` FOREIGN KEY (`artikel_id`) REFERENCES `artikel` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `metode_pencairan`
--
ALTER TABLE `metode_pencairan`
  ADD CONSTRAINT `metode_pencairan_nasabah_id_foreign` FOREIGN KEY (`nasabah_id`) REFERENCES `nasabah` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pencairan_saldo`
--
ALTER TABLE `pencairan_saldo`
  ADD CONSTRAINT `pencairan_saldo_metode_id_foreign` FOREIGN KEY (`metode_id`) REFERENCES `metode_pencairan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pencairan_saldo_nasabah_id_foreign` FOREIGN KEY (`nasabah_id`) REFERENCES `nasabah` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengiriman_pengepul`
--
ALTER TABLE `pengiriman_pengepul`
  ADD CONSTRAINT `pengiriman_pengepul_pengepul_id_foreign` FOREIGN KEY (`pengepul_id`) REFERENCES `pengepul` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `saldo`
--
ALTER TABLE `saldo`
  ADD CONSTRAINT `saldo_nasabah_id_foreign` FOREIGN KEY (`nasabah_id`) REFERENCES `nasabah` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_nasabah_id_foreign` FOREIGN KEY (`nasabah_id`) REFERENCES `nasabah` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

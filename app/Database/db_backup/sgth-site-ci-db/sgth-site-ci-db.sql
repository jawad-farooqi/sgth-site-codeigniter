-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2026 at 08:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sgth-site-ci-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `original_name` varchar(255) NOT NULL,
  `stored_path` varchar(255) NOT NULL,
  `mime_type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `title`, `original_name`, `stored_path`, `mime_type`, `size`, `uploaded_by`, `uploaded_at`) VALUES
(3, 'hello', 'Ehtesham KPPSC Profile.pdf', 'uploads/news/2025/12/31/4/1751925629_f63aebf62394d65bea03.pdf', 'application/pdf', 276350, 1, '2025-07-07 17:00:29'),
(4, 'hel', 'ASSISTANT SUB-INSPECTOR (EXECUTIVE CADRE) - 04-2025 .pdf', 'uploads/news/2025/01/01/5/1751926111_902387c7a221234e101e.pdf', 'application/pdf', 236117, 1, '2025-07-07 17:08:31'),
(5, 'heloo', 'Ehtesham Image.jpg.js', 'uploads/news/2025-02-01/6/1751926604_568b89984f15bed67f5d.jpg', 'image/jpeg', 95803, 1, '2025-07-07 17:16:44'),
(6, 'file 1', 'ASSISTANT SUB-INSPECTOR (EXECUTIVE CADRE) - 04-2025 .pdf', 'uploads/news/2025-01-01/7/1751927045_b264be35b6a90e11c1d7.pdf', 'application/pdf', 236117, 1, '2025-07-07 17:24:05'),
(7, 'file 2', 'Ehtesham KPPSC Profile.pdf', 'uploads/news/2025-01-01/7/1751927045_38cfb7529ac5989be4ce.pdf', 'application/pdf', 276350, 1, '2025-07-07 17:24:05'),
(8, 'form', 'ASSISTANT SUB-INSPECTOR (EXECUTIVE CADRE) - 04-2025 .pdf', 'uploads/news/2025-01-01/8/1751927463_0914641e6316c1784843.pdf', 'application/pdf', 236117, 1, '2025-07-07 17:31:03'),
(9, 'adv', 'Ehtesham KPPSC Profile.pdf', 'uploads/news/2025-01-01/8/1751927463_a76f37766a0f7a5988f5.pdf', 'application/pdf', 276350, 1, '2025-07-07 17:31:03'),
(10, 'file 1', 'ASSISTANT SUB-INSPECTOR (EXECUTIVE CADRE) - 04-2025 .pdf', 'uploads/news/2025-07-08/9/1751928186_3bf918b7ca326878f090.pdf', 'application/pdf', 236117, 1, '2025-07-07 17:43:06'),
(11, 'file 2', 'HSSC DMC.jpg', 'uploads/news/2025-07-08/9/1751928186_00ff08d51499f8baa085.jpg', 'image/jpeg', 269613, 1, '2025-07-07 17:43:06'),
(12, 'file 2', 'CNIC Front.jpg', 'uploads/news/2025-07-08/9/1751928186_a3b534f9a45333479201.jpg', 'image/jpeg', 385209, 1, '2025-07-07 17:43:06'),
(13, 'file 3', 'CNIC Back.jpg', 'uploads/news/2025-07-08/9/1751928186_10c726fb719524075fcf.jpg', 'image/jpeg', 273792, 1, '2025-07-07 17:43:06'),
(14, 'file 5', 'SSC DMC.jpg', 'uploads/news/2025-07-08/9/1751928186_6b867c3a004d8b055e1d.jpg', 'image/jpeg', 999696, 1, '2025-07-07 17:43:06'),
(15, 'file 1', 'HSSC DMC.jpg', 'uploads/news/2025-07-08/10/1751998523_9e116f46e421b8f7ebbd.jpg', 'image/jpeg', 269613, 1, '2025-07-08 18:15:23'),
(16, 'new file', 'Disqualification_Debare_list_updated_05_06_2025.docx', 'uploads/news/2025-07-21/11/1753049728_009deb14ef616d60738c.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 24995, 1, '2025-07-20 22:15:28'),
(17, 'compressed file', 'Ehtesham CV.docx', 'uploads/news/2025-07-21/12/1753051970_63273ac8c5ef2cc60901.zip', 'application/zip', 100486, 1, '2025-07-20 22:52:50'),
(18, 'com test 1', 'cobas 6000 brochure.pdf', 'uploads/news/2025-07-21/13/1753052156_31e2cc8d55b193aa9d48.zip', 'application/zip', 1750091, 1, '2025-07-20 22:55:56'),
(19, 'new file', 'cdb8272d-48ee-4fc8-9a14-d96af9d55193.png', 'uploads/news/2025-07-21/17/1753052977_2a23668c8447e04da94e.png', 'image/png', 3277149, 1, '2025-07-20 23:09:38'),
(20, 'new file 98', 'Ehtesham CV.docx', 'uploads/news/2025-07-21/18/1753053241_de13f267947e39ca06a8.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 104298, 1, '2025-07-20 23:14:01'),
(21, 'image file 77', 'image (1).jpg', 'uploads/news/2025-07-21/19/1753053303_306c5b13ec9ac8123515.jpg', 'image/jpeg', 340832, 1, '2025-07-20 23:15:03'),
(22, 'new file 1', 'Disqualification_Debare_list_updated_05_06_2025.docx', 'uploads/news/2025-07-21/20/1753053389_8394704f6ad2cd9df576.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 24995, 1, '2025-07-20 23:16:29'),
(23, 'new file 2', 'cdb8272d-48ee-4fc8-9a14-d96af9d55193.png', 'uploads/news/2025-07-21/20/1753053389_ea4b96c3ed3eeb49430a.png', 'image/png', 3277149, 1, '2025-07-20 23:16:29'),
(24, 'file1', 'Ehtesham.jpg', 'uploads/news/2025-07-27/25/1753561066_df650725748fb958c628.jpg', 'image/jpeg', 29148, 1, '2025-07-26 20:17:46'),
(25, 'file2', 'Ehtesham Image.jpg', 'uploads/news/2025-07-27/25/1753561066_2be406971a2222006bab.jpg', 'image/jpeg', 30115, 1, '2025-07-26 20:17:46'),
(26, 'file 1', 'Ehtesham.jpg', 'uploads/news/2025-07-27/27/1753565087_62eb45938605d335bf07.jpg', 'image/jpeg', 29148, 1, '2025-07-26 21:24:47'),
(27, 'file 2', 'Ehtesham.jpg', 'uploads/news/2025-07-27/27/1753565087_05ec430b1c2572668f80.jpg', 'image/jpeg', 29148, 1, '2025-07-26 21:24:47'),
(28, 'file 1', 'Ehtesham.jpg', 'uploads/news/2025-07-27/28/1753565168_3382afa472e3ce5ffd46.jpg', 'image/jpeg', 29148, 1, '2025-07-26 21:26:08'),
(29, 'file 1', 'Domicile.jpg', 'uploads/news/2025-07-27/29/1753565420_a3cd125d3556969d19b2.jpg', 'image/jpeg', 467333, 1, '2025-07-26 21:30:20'),
(30, 'news file 1', 'Ehtesham.jpg', 'uploads/news/2025-07-27/30/1753565549_0bc72ee9f7771c54b753.jpg', 'image/jpeg', 29148, 1, '2025-07-26 21:32:29'),
(31, 'news file 2', 'Domicile_2.jpg', 'uploads/news/2025-07-27/30/1753565549_a9f0d940ac2ae4d171ec.jpg', 'image/jpeg', 443815, 1, '2025-07-26 21:32:29'),
(32, 'news file 11', 'Ehtesham FPSC - Lecturer Apply - F91F - 03-2025.pdf', 'uploads/news/2025-07-27/32/1753565686_710cbf1394bdffd8e4ef.pdf', 'application/pdf', 727545, 1, '2025-07-26 21:34:46'),
(33, 'file 1', 'Ehtesham CV.docx', 'uploads/news/2025-07-27/35/1753566011_c9f65a43ab7d732dae47.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 67992, 1, '2025-07-26 21:40:11'),
(34, 'file 2', 'Ehtesham FPSC - Lecturer Apply - F91F - 03-2025.pdf', 'uploads/news/2025-07-27/35/1753566011_3327522b2cbca954bfe5.pdf', 'application/pdf', 727545, 1, '2025-07-26 21:40:11'),
(35, 'file good', 'Ehtesham.jpg', 'uploads/news/2025-07-27/36/1753566095_d4098e2302274fee3a0d.jpg', 'image/jpeg', 29148, 1, '2025-07-26 21:41:35'),
(36, 'file 1', 'Ehtesham CV.docx', 'uploads/news/2025-07-30/38/1753816352_cff3f334a59c55df3541.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 67992, 1, '2025-07-29 19:12:32'),
(37, 'esta code', '1725436931-Esta Code 2024.pdf', 'uploads/news/2025-10-25/39/1761371322_a4aee66c283cbb360966.pdf', 'application/pdf', 5249760, 1, '2025-10-25 05:48:42'),
(38, 'Notification for House job January 2026', 'NOTIFICATION FOR HOUSE JOB ENTRANCE EXAM JANUARY 2026.PDF', 'uploads/news/2026-01-28/40/1769576969_f9cd6454bb64e3aa6981.pdf', 'application/pdf', 490657, 1, '2026-01-28 05:09:29'),
(39, 'spinghar university', 'Spinghar University.jpg', 'uploads/news/2026-02-03/41/1770190812_f2f815cb1b43ec14351c.jpg', 'image/jpeg', 458159, 1, '2026-02-04 07:40:12'),
(40, 'hamza leave', 'Untitled picture.jpg', 'uploads/news/2026-02-03/41/1770190812_a97af4cdbbdc5750a510.jpg', 'image/jpeg', 515794, 1, '2026-02-04 07:40:12'),
(41, 'Syllabus', 'Syllabus_for_SST_General_Bio_Chemistry_Physics_Maths_Stat__IT_11082025 (1).pdf', 'uploads/news/2026-02-24/42/1771902451_be443e9f07be768ac315.pdf', 'application/pdf', 450272, 1, '2026-02-24 03:07:31'),
(42, 'Promotion', 'WhatsApp Image 2026-02-20 at 4.59.29 AM.jpeg', 'uploads/news/2026-02-24/42/1771902451_bedc4b529db4a0960783.jpeg', 'image/jpeg', 208394, 1, '2026-02-24 03:07:31'),
(43, 'Internship certificates', 'Internship certificates.pdf', 'uploads/news/2026-02-24/43/1771904654_c6c7480adbef5f628088.pdf', 'application/pdf', 104360, 1, '2026-02-24 03:44:14'),
(44, 'Intership certificate', 'doctor_212118_3efe58ad16c81fc33f217ac84ffcd7ba.jpg', 'uploads/news/2026-02-24/43/1771904654_d6251f04c9d77424262d.jpg', 'image/jpeg', 67924, 1, '2026-02-24 03:44:14'),
(56, 'medicalallowance', '370714 - 2 - 18-02-26.jpg', 'uploads/news/2026-02-24/44/1771916554_98de63568435e42e3fc9.jpg', 'image/jpeg', 336182, 1, '2026-02-24 07:02:34'),
(58, 'esta code', '370714 - 1 - 18-02-26.jpg', 'uploads/news/2026-02-24/44/1771917450_d4d943c6f3b53f1b30f2.jpg', 'image/jpeg', 336182, 1, '2026-02-24 07:17:30'),
(59, 'Cert 1', '781123 - 23-02-26.jpg', 'uploads/news/2026-02-24/45/1771917554_0df043c0e93753f29df4.jpg', 'image/jpeg', 344838, 1, '2026-02-24 07:19:14'),
(60, 'Cert 2', '887221 - 23-02-26.jpg', 'uploads/news/2026-02-24/45/1771917554_e6b23e8ef0ccc30d1754.jpg', 'image/jpeg', 341109, 1, '2026-02-24 07:19:15'),
(61, 'Cert 3', '654433 - 23-02-2026.jpeg', 'uploads/news/2026-02-24/45/1771917555_9fb4515c29598b5e66ec.jpeg', 'image/jpeg', 151539, 1, '2026-02-24 07:19:15'),
(62, 'Cert 4', '1064644 - 24-02-26.jpeg', 'uploads/news/2026-02-24/45/1771917856_148d86917bb24b0ec914.jpeg', 'image/jpeg', 47691, 1, '2026-02-24 07:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `status` enum('draft','published','archived') NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `slug`, `content`, `author_id`, `status`, `publish_date`, `created_at`, `updated_at`) VALUES
(4, 'great', 'great-2025-12-31', '', 1, 'draft', '2025-12-31 07:59:00', '2025-07-07 17:00:29', '2025-07-07 17:00:29'),
(5, '2nd file', '2nd-file-2025-01-01', '', 1, 'draft', '2024-12-31 19:00:00', '2025-07-07 17:08:31', '2025-07-07 17:08:31'),
(6, '3rd one', '3rd-one-2025-02-01', 'just checking', 1, 'draft', '2025-01-31 20:00:00', '2025-07-07 17:16:44', '2025-07-07 17:16:44'),
(7, 'heljsld', 'heljsld-2025-01-01', '', 1, 'draft', '2024-12-31 20:00:00', '2025-07-07 17:24:05', '2025-07-07 17:24:05'),
(8, 'final test', 'final-test-2025-01-01', '', 1, 'draft', '2024-12-31 20:00:00', '2025-07-07 17:31:03', '2025-07-07 17:31:03'),
(9, 'last test', 'last-test-2025-07-08', '', 1, 'published', '2025-07-07 22:39:00', '2025-07-07 17:43:06', '2025-07-07 17:43:06'),
(10, 'announce1', 'announce1-2025-07-08', '', 1, 'draft', '2025-07-08 18:13:00', '2025-07-08 18:15:23', '2025-07-08 18:15:23'),
(11, 'new file', 'new-file-2025-07-21', '', 1, 'draft', '2025-07-20 22:13:00', '2025-07-20 22:15:28', '2025-07-20 22:15:28'),
(12, 'compressed test 1', 'compressed-test-1-2025-07-21', '', 1, 'draft', '2025-07-20 22:51:00', '2025-07-20 22:52:50', '2025-07-20 22:52:50'),
(13, 'compress test 2', 'compress-test-2-2025-07-21', '', 1, 'draft', '2025-07-20 22:52:00', '2025-07-20 22:55:56', '2025-07-20 22:55:56'),
(17, 'new file 1', 'new-file-1-2025-07-21', '', 1, 'draft', '2025-07-20 23:09:00', '2025-07-20 23:09:37', '2025-07-20 23:09:37'),
(18, 'news 154', 'news-154-2025-07-21', '', 1, 'draft', '2025-07-20 23:12:00', '2025-07-20 23:14:01', '2025-07-20 23:14:01'),
(19, 'new image file', 'new-image-file-2025-07-21', '', 1, 'draft', '2025-07-20 23:14:00', '2025-07-20 23:15:03', '2025-07-20 23:15:03'),
(20, 'news file 189', 'news-file-189-2025-07-21', '', 1, 'draft', '2025-07-20 23:15:00', '2025-07-20 23:16:29', '2025-07-20 23:16:29'),
(25, 'news123', 'news123-2025-07-27', '', 1, 'draft', '2025-07-26 20:17:00', '2025-07-26 20:17:46', '2025-07-26 20:17:46'),
(27, 'news12444', 'news12444-2025-07-27', 'this is the content', 1, 'draft', '2025-07-26 21:23:00', '2025-07-26 21:24:47', '2025-07-26 21:24:47'),
(28, 'announcement 1333', 'announcement-1333-2025-07-27', '', 1, 'draft', '2025-07-26 21:25:00', '2025-07-26 21:26:08', '2025-07-26 21:26:08'),
(29, 'news 901', 'news-901-2025-07-27', '', 1, 'draft', '2025-07-26 21:26:00', '2025-07-26 21:30:20', '2025-07-26 21:30:20'),
(30, 'new files', 'new-files-2025-07-27', '', 1, 'draft', '2025-07-26 21:30:00', '2025-07-26 21:32:29', '2025-07-26 21:32:29'),
(32, 'annouce 193', 'annouce-193-2025-07-27', '', 1, 'draft', '2025-07-26 21:32:00', '2025-07-26 21:34:46', '2025-07-26 21:34:46'),
(35, 'make dir', 'make-dir-2025-07-27', '', 1, 'draft', '2025-07-26 21:38:00', '2025-07-26 21:40:11', '2025-07-26 21:40:11'),
(36, 'hello world', 'hello-world-2025-07-27', '', 1, 'published', '2025-07-26 21:40:00', '2025-07-26 21:41:35', '2025-07-26 21:41:35'),
(38, 'news announcement', 'news-announcement-2025-07-30', '', 1, 'published', '2025-07-29 19:08:00', '2025-07-29 19:12:32', '2025-07-29 19:12:32'),
(39, 'news 1', 'news-1-2025-10-25', '', 1, 'draft', '2025-10-25 05:48:00', '2025-10-25 05:48:42', '2025-10-25 05:48:42'),
(40, 'house job notification 2026', 'house-job-notification-2026-2026-01-28', '', 1, 'published', '2026-01-28 05:07:00', '2026-01-28 05:09:29', '2026-01-28 05:09:29'),
(41, 'news 04-02-2026', 'news-04-02-2026-2026-02-03', 'testing 1', 1, 'draft', '2026-02-03 07:37:00', '2026-02-04 07:40:12', '2026-02-24 06:45:53'),
(42, 'SST Syllabus', 'sst-syllabus-2026-02-24', 'SST ', 1, 'published', '2026-02-24 03:00:00', '2026-02-24 03:07:31', '2026-02-24 03:07:31'),
(43, 'don\'t like the old titles', 'this-is-new-2026-02-24', 'don\'t like descriptions', 1, 'draft', '2026-02-18 03:43:00', '2026-02-24 03:44:14', '2026-02-24 06:46:40'),
(44, 'news 9977', 'news-9977-2026-02-20', 'kj', 1, 'archived', '2026-02-20 07:02:00', '2026-02-24 07:02:34', '2026-02-24 07:39:19'),
(45, 'News 765', 'news-765-2026-02-24', 'this is good one', 1, 'published', '2026-02-19 07:17:00', '2026-02-24 07:19:14', '2026-02-24 07:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `news_files`
--

CREATE TABLE `news_files` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_files`
--

INSERT INTO `news_files` (`id`, `news_id`, `file_id`) VALUES
(1, 4, 3),
(2, 5, 4),
(3, 6, 5),
(4, 7, 6),
(5, 7, 7),
(6, 8, 8),
(7, 8, 9),
(8, 9, 10),
(9, 9, 11),
(10, 9, 12),
(11, 9, 13),
(12, 9, 14),
(13, 10, 15),
(14, 11, 16),
(15, 12, 17),
(16, 13, 18),
(17, 17, 19),
(18, 18, 20),
(19, 19, 21),
(20, 20, 22),
(21, 20, 23),
(22, 25, 24),
(23, 25, 25),
(24, 27, 26),
(25, 27, 27),
(26, 28, 28),
(27, 29, 29),
(28, 30, 30),
(29, 30, 31),
(30, 32, 32),
(31, 35, 33),
(32, 35, 34),
(33, 36, 35),
(34, 38, 36),
(35, 39, 37),
(36, 40, 38),
(37, 41, 39),
(38, 41, 40),
(39, 42, 41),
(40, 42, 42),
(41, 43, 43),
(42, 43, 44),
(43, 44, 56),
(44, 44, 58),
(45, 45, 59),
(46, 45, 60),
(47, 45, 61),
(48, 45, 62);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permission_id` int(11) NOT NULL,
  `permission_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permission_id`, `permission_name`) VALUES
(1, 'create_news'),
(3, 'delete_news'),
(2, 'update_news');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'editor'),
(0, 'no role assigned'),
(5, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`, `email`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Saleem', 'admin', '$2y$10$s57FpTgzp9dWbAXD.O.PpelwfgFjlHIupg.wyqkfmm2gD5vnNGvMi', 'admin@gmail.com', 1, '2025-02-19 04:50:28', '2025-02-19 04:50:28'),
(3, 'Kaleem Khan', 'admin3', '$2y$10$cNA2CWI7YXJb.i54MxCUWO3EZ9rChFYhhOj5Av6q8vv3IppwUcExS', 'nothing3@gmail.com', 1, '2025-03-13 08:26:58', '2025-03-13 08:26:58'),
(4, 'Muhammad Khan', 'muhammadkhan', '$2y$10$mSW0oDEHxlkFXfg4kMJSb.TwtIJQzF51THPqZXNrDz2oLgWLHHasm', 'muhammad.khan@gmail.com', 1, '2025-06-28 18:38:52', '2025-06-28 18:38:52'),
(5, 'hafeez', 'hafeez', '$2y$10$yavMVi9lY2zK3tL5bjRwbOptPerBfWPDzscpf/7icCVFXsVP4jIVu', 'hafeez@gmail.com', 1, '2026-01-28 05:07:03', '2026-01-28 05:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(1, 1),
(3, 2),
(4, 1),
(5, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`),
  ADD UNIQUE KEY `stored_path_UNIQUE` (`stored_path`),
  ADD KEY `fk_user_id_file_idx` (`uploaded_by`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `author_id_idx` (`author_id`);

--
-- Indexes for table `news_files`
--
ALTER TABLE `news_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_file_id_idx` (`file_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permission_id`),
  ADD UNIQUE KEY `permission_name_UNIQUE` (`permission_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name_UNIQUE` (`role_name`),
  ADD UNIQUE KEY `role_id_UNIQUE` (`role_id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`) USING BTREE,
  ADD KEY `permission_id_idx` (`permission_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_id_idx` (`user_id`),
  ADD KEY `role_id_idx` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `news_files`
--
ALTER TABLE `news_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `fk_user_id_file` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_author_id` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `news_files`
--
ALTER TABLE `news_files`
  ADD CONSTRAINT `fk_file_id` FOREIGN KEY (`file_id`) REFERENCES `files` (`file_id`);

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `fk_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`permission_id`),
  ADD CONSTRAINT `fk_role_id_permission` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

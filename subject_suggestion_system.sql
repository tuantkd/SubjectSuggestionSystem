-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 23, 2020 lúc 01:54 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `subject_suggestion_system`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_subjects`
--

CREATE TABLE `category_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_subject_note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(252) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_subjects`
--

INSERT INTO `category_subjects` (`id`, `category_subject_name`, `category_subject_note`, `symbol`, `created_at`, `updated_at`) VALUES
(3, 'Bắt buộc', 'Là loại học phần sinh viên phải tích lũy', 'BB', '2020-12-03 20:22:50', '2020-12-03 20:22:50'),
(5, 'Điều kiện', 'Là học phần mà sinh viên phải hoàn thành nhưng kết quả học phần không dùng để tính điểm trung bình tích lũy', 'ĐK', '2020-12-06 22:52:40', '2020-12-06 22:52:40'),
(6, 'Tự chọn', 'Là học phần sinh viên tự chọn môn học cho mình, đảm bảo phải đủ tín chỉ', 'TC', '2020-12-08 19:37:51', '2020-12-08 19:37:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class_majors`
--

CREATE TABLE `class_majors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `major_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_major_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_major_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `class_majors`
--

INSERT INTO `class_majors` (`id`, `major_id`, `course_id`, `class_major_code`, `class_major_name`, `created_at`, `updated_at`) VALUES
(2, 2, 5, 'HG16V7A1', 'Lớp Chuyên ngành Công Nghệ Thông Tin', '2020-11-28 01:15:16', '2020-12-22 00:35:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class_subjects`
--

CREATE TABLE `class_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `semester_year_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_subject_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_subject_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_subject_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `class_subjects`
--

INSERT INTO `class_subjects` (`id`, `teacher_id`, `semester_year_id`, `subject_id`, `class_subject_code`, `class_subject_name`, `class_subject_note`, `created_at`, `updated_at`) VALUES
(5, 22, 1, 32, 'H02', 'Quản trị hệ thống', 'Không có', '2020-12-18 08:24:21', '2020-12-22 05:11:31'),
(6, 14, 1, 41, 'H01', 'Hệ thống thông tin doanh nghiệp', 'Không có', '2020-12-18 08:25:20', '2020-12-22 05:11:37'),
(8, 21, 1, 50, 'H01', 'Nguyên lý máy học', 'Không có', '2020-12-18 08:34:33', '2020-12-22 05:11:45'),
(9, 20, 1, 58, 'H01', 'Lập trình mạng', 'Không có', '2020-12-18 08:35:21', '2020-12-22 05:11:51'),
(10, 18, 1, 57, 'H05', 'Quản trị mạng', 'Không có', '2020-12-18 08:36:22', '2020-12-22 05:12:00'),
(11, 18, 1, 51, 'H03', 'An toàn hệ thống', 'Không có', '2020-12-18 08:37:00', '2020-12-22 05:11:18'),
(12, 19, 2, 35, 'H03', 'Lập trình hướng đối tượng', 'Không có', '2020-12-22 05:11:04', '2020-12-22 05:11:24'),
(13, 34, 2, 27, 'H04', 'Lập trình căn bản A', 'Không có', '2020-12-22 05:18:36', '2020-12-22 05:18:36'),
(14, 27, 2, 37, 'H01', 'Phân tích và thiết kế thuật toán', 'Không có', '2020-12-22 05:19:42', '2020-12-22 05:19:42'),
(15, 23, 2, 38, 'H05', 'Cơ sở dữ liệu', 'Không có', '2020-12-22 05:20:46', '2020-12-22 05:20:46'),
(16, 13, 2, 42, 'H03', 'Ngôn ngữ mô hình hóa', 'Không có', '2020-12-22 05:21:23', '2020-12-22 05:21:23'),
(17, 22, 2, 39, 'H05', 'Nền tảng công nghệ thông tin', 'Không có', '2020-12-22 06:20:54', '2020-12-22 06:20:54'),
(18, 14, 3, 36, 'H05', 'Lý thuyết đồ thị', 'Không có', '2020-12-22 06:21:51', '2020-12-22 06:21:51'),
(19, 27, 2, 34, 'H01', 'Nhập môn công nghệ phần mềm', 'Không có', '2020-12-22 06:23:11', '2020-12-22 06:23:11'),
(20, 23, 11, 11, 'H04', 'Tin học căn bản (*)', 'Không có', '2020-12-22 07:51:42', '2020-12-22 07:51:42'),
(21, 32, 5, 12, 'H01', 'TT.Tin học căn bản (*)', 'Không có', '2020-12-22 07:53:44', '2020-12-22 07:53:44'),
(22, 20, 4, 13, 'H06', 'Những nguyên lý cơ bản của CN Mác-Lênin 1', 'Không có', '2020-12-22 07:54:33', '2020-12-22 07:54:33'),
(23, NULL, 2, 14, 'G02', 'Những nguyên lý cơ bản của CN Mác-Lênin 2', 'Không có', '2020-12-22 08:00:32', '2020-12-22 08:00:32'),
(24, NULL, 2, 26, 'G02', 'Đại số tuyến tính và hình học', 'Không có', '2020-12-22 08:03:05', '2020-12-22 08:03:05'),
(25, NULL, 2, 24, 'G03', 'Vi - Tích phân A2', NULL, '2020-12-22 08:06:47', '2020-12-22 08:06:47'),
(26, NULL, 1, 17, 'G05', 'Pháp luật đại cương', NULL, '2020-12-22 08:07:49', '2020-12-22 08:07:49'),
(27, NULL, 1, 25, 'G04', 'Xác suất thống kê', NULL, '2020-12-22 08:13:33', '2020-12-22 08:13:33'),
(28, NULL, 3, 1, '01', 'Giáo dục quốc phòng - An ninh 1 (*)', NULL, '2020-12-22 08:14:39', '2020-12-22 08:14:39'),
(29, NULL, 3, 2, '01', 'Giáo dục quốc phòng - An ninh 2 (*)', NULL, '2020-12-22 08:15:05', '2020-12-22 08:15:05'),
(30, NULL, 3, 3, '01', 'Giáo dục quốc phòng - An ninh 3 (*', NULL, '2020-12-22 08:15:28', '2020-12-22 08:15:28'),
(31, NULL, 4, 29, 'H02', 'Cấu trúc dữ liệu', NULL, '2020-12-22 08:18:17', '2020-12-22 08:18:17'),
(32, NULL, 4, 28, 'H01', 'Toán rời rạc', NULL, '2020-12-22 08:19:23', '2020-12-22 08:19:23'),
(33, NULL, 4, 30, 'H01', 'Kiến trúc máy tính', NULL, '2020-12-22 08:22:24', '2020-12-22 08:22:24'),
(34, NULL, 4, 15, 'H04', 'Tư tưởng Hồ Chí Minh', NULL, '2020-12-22 08:22:45', '2020-12-22 08:22:45'),
(35, NULL, 4, 4, 'H08', 'Taekwondo', NULL, '2020-12-22 08:24:33', '2020-12-22 08:24:33'),
(36, NULL, 4, 5, 'H07', 'Anh văn căn bản 1 (*)', NULL, '2020-12-22 08:24:56', '2020-12-22 08:24:56'),
(37, NULL, 4, 16, 'H02', 'Đường lối cách mạng của Đảng cộng sản Việt Nam', NULL, '2020-12-22 08:25:26', '2020-12-22 08:25:26'),
(38, NULL, 4, 31, 'H02', 'Nguyên lý hệ điều hành', NULL, '2020-12-22 08:26:09', '2020-12-22 08:26:09'),
(39, NULL, 5, 36, 'H02', 'Lý thuyết đồ thị', NULL, '2020-12-22 08:28:45', '2020-12-22 08:28:45'),
(40, NULL, 7, 52, 'H01', 'Nguyên lý hệ quản trị cơ sở dữ liệu', NULL, '2020-12-22 08:29:20', '2020-12-22 08:29:20'),
(41, NULL, 5, 54, 'H01', 'Hệ quản trị cơ sở dữ liệu Oracle', NULL, '2020-12-22 08:29:51', '2020-12-22 08:29:51'),
(42, NULL, 7, 62, 'H02', 'Lập trình Web', NULL, '2020-12-22 08:30:16', '2020-12-22 08:30:16'),
(43, NULL, 7, 6, 'H04', 'Anh văn căn bản 2 (*)', NULL, '2020-12-22 08:30:41', '2020-12-22 08:30:41'),
(44, NULL, 5, 33, 'H01', 'Mạng máy tính', NULL, '2020-12-22 08:31:47', '2020-12-22 08:31:47'),
(45, NULL, 5, 40, 'H02', 'Phương pháp Nghiên cứu khoa học', NULL, '2020-12-22 08:32:42', '2020-12-22 08:32:42'),
(46, NULL, 5, 49, 'H01', 'Trí tuệ nhân tạo', NULL, '2020-12-22 08:33:12', '2020-12-22 08:33:12'),
(47, NULL, 5, 7, 'H03', 'Anh văn căn bản 3 (*)', NULL, '2020-12-22 08:33:37', '2020-12-22 08:33:37'),
(48, NULL, 10, 63, '01', 'Thực tập thực tế - CNTT', NULL, '2020-12-22 08:34:21', '2020-12-22 08:34:21'),
(49, NULL, 7, 64, 'H04', 'Niên luận cơ sở - CNTT', NULL, '2020-12-22 08:35:46', '2020-12-22 08:35:46'),
(50, NULL, 7, 20, 'H01', 'Cơ sở văn hóa Việt Nam', NULL, '2020-12-22 08:36:16', '2020-12-22 08:36:16'),
(51, NULL, 8, 48, 'H01', 'Điện toán đám mây', NULL, '2020-12-22 08:36:59', '2020-12-22 08:36:59'),
(52, NULL, 7, 55, 'H01', 'Thiết kế và cài đặt mạng', NULL, '2020-12-22 08:37:32', '2020-12-22 08:37:32'),
(53, NULL, 8, 65, 'H04', 'Niên luận - CNTT', NULL, '2020-12-22 08:37:57', '2020-12-22 08:37:57'),
(54, NULL, 11, 66, 'H01', 'Luận văn tốt nghiệp - CNTT', NULL, '2020-12-22 08:40:33', '2020-12-22 08:40:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_note` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_note`, `created_at`, `updated_at`) VALUES
(5, 'Khóa 43', 'Không có', '2020-12-21 21:20:03', '2020-12-22 00:39:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `degrees`
--

CREATE TABLE `degrees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `degree_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `degrees`
--

INSERT INTO `degrees` (`id`, `degree_name`, `degree_description`, `created_at`, `updated_at`) VALUES
(1, 'Giáo sư', 'Giáo sư hay Professor (viết tắt tiếng Anh là prof.) là một học hàm ở các trường đại học, các cơ sở giáo dục, các học viện và  trung tâm nghiên cứu ở hầu hết các quốc gia trên thế giới.', '2020-11-23 21:07:05', '2020-11-23 21:07:05'),
(2, 'Tiến sĩ', 'Tiến sĩ là một học vị do trường đại học cấp cho nghiên cứu sinh sau đại học, công nhận luận án nghiên cứu của họ đã đáp ứng tiêu chuẩn bậc tiến sĩ, là hoàn toàn mới chưa từng có ai làm qua. Thời gian để hoàn thành luận án tiến sĩ có thể từ 3 đến 5 năm hay dài hơn, tùy vào tình hình hay điều kiện khác nhau của từng nghiên cứu sinh, có thể làm bán thời hay toàn thời.', '2020-11-23 21:11:19', '2020-12-21 20:27:16'),
(3, 'Thạc sĩ', 'Thạc sĩ theo nghĩa đen là từ để chỉ người có học vấn rộng (thạc = rộng lớn; sĩ = người học hay nghiên cứu), nay dùng để chỉ một bậc học vị. Bậc học vị này khác nhau tùy theo hệ thống giáo dục: Học vị thạc sĩ trong tiếng Anh được gọi là Master\'s degree (tiếng Latin là magister), một học vị trên cấp cử nhân, dưới cấp tiến sĩ được cấp bởi trường đại học khi hoàn tất chương trình học chứng tỏ sự nắm vững kiến thức bậc cao của một lĩnh vực nghiên cứu hoặc ngành nghề.', '2020-11-23 21:12:55', '2020-11-23 21:12:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `department_description`, `created_at`, `updated_at`) VALUES
(1, 'Công nghệ Thông tin & Truyền thông', 'Được thành lập năm 1994, Khoa Công nghệ Thông tin và Truyền thông (CNTT&TT), một trong bảy khoa trọng điểm về lĩnh vực công nghệ thông tin của Việt Nam, đã không ngừng hoàn thiện và phát triển vững mạnh. Năm 2019, Khoa nhận được Huân chương lao động hạng ba của Chủ tịch nước. Sứ mệnh của Khoa là đào tạo, nghiên cứu khoa học và chuyển giao công nghệ trong lĩnh vực CNTT&TT. Tầm nhìn đến 2025, Khoa trở thành một trung tâm đào tạo và nghiên cứu khoa học đẳng cấp trong nước và khu vực Đông Nam Á về lĩnh vực CNTT&TT.', '2020-11-24 20:49:32', '2020-11-24 20:49:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_scores`
--

CREATE TABLE `detail_scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `score_char` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score_number` double DEFAULT NULL,
  `score_ladder_four` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detail_scores`
--

INSERT INTO `detail_scores` (`id`, `class_subject_id`, `student_id`, `score_char`, `score_number`, `score_ladder_four`, `created_at`, `updated_at`) VALUES
(1, 11, 80, 'C', 6, 2, '2020-12-19 07:34:51', '2020-12-19 07:35:04'),
(2, 10, 80, 'B', 7, 3, '2020-12-19 07:35:19', '2020-12-19 07:35:25'),
(3, 9, 80, 'B+', 8, 3.5, '2020-12-19 07:35:37', '2020-12-19 07:35:42'),
(4, 8, 80, 'B+', 8, 3.5, '2020-12-19 07:35:58', '2020-12-19 07:36:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `majors`
--

CREATE TABLE `majors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `part_subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `major_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `major_note` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `majors`
--

INSERT INTO `majors` (`id`, `part_subject_id`, `major_name`, `major_note`, `created_at`, `updated_at`) VALUES
(2, 2, 'Công nghê thông tin', 'Ngành Công nghệ thông tin sinh viên có thể nghiên cứu chuyên sâu về Khoa học máy tính, Công nghệ phần mềm, Kỹ thuật máy tính, Hệ thống thông tin, Mạng máy tính và truyền thông, An toàn thông tin mạng.', '2020-11-27 01:17:49', '2020-12-21 21:20:23'),
(4, 7, 'Khoa học máy tính', 'Kiến thức cơ bản về ngành Khoa học máy tính như:\r\nKhoa học máy tính ứng dụng,\r\nGiới thiệu về chương trình Quản lý,\r\nGiới thiệu về hệ thống mạng lưới,\r\nGiới thiệu về Cơ sở dữ liệu,\r\nPhân tích & thiết kế hệ thống,\r\nNguyên tắc cơ bản của phát triển phần mềm,\r\nCác khái niệm toán học cho máy tính,\r\nHệ điều hành & Kiến trúc máy tính', '2020-11-29 23:27:53', '2020-11-29 23:27:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_11_24_020909_create_positions_table', 2),
(6, '2020_11_24_031851_create_degrees_table', 3),
(7, '2020_11_24_071022_create_titles_table', 4),
(8, '2020_11_24_085038_create_roles_table', 5),
(10, '2020_11_25_033250_create_departments_table', 6),
(11, '2020_11_26_031454_create_part_subjects_table', 7),
(13, '2020_11_26_070225_create_teachers_table', 8),
(16, '2020_11_27_070041_create_courses_table', 10),
(17, '2020_11_27_075224_create_majors_table', 11),
(18, '2020_11_28_072803_create_class_majors_table', 12),
(20, '2020_11_29_083452_create_students_table', 13),
(22, '2020_12_02_023840_create_program_trains_table', 14),
(25, '2020_12_03_094536_create_category_subjects_table', 16),
(28, '2020_12_05_032227_create_class_subjects_table', 18),
(31, '2020_12_04_070735_create_subjects_table', 21),
(39, '2020_12_09_034410_create_prerequisite_parallels_table', 22),
(40, '2020_12_09_035621_create_subject_prerequisite_parallels_table', 22),
(41, '2020_12_07_052101_create_program_studies_table', 23),
(42, '2014_10_12_000000_create_users_table', 24),
(43, '2020_12_08_040656_create_detail_scores_table', 25),
(44, '2020_12_03_084646_create_semester_years_table', 26);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `part_subjects`
--

CREATE TABLE `part_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `part_subject_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_subject_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `part_subjects`
--

INSERT INTO `part_subjects` (`id`, `department_id`, `part_subject_name`, `part_subject_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bộ môn Hệ Thống Thông Tin', 'Được thành lập năm 1990 với tên gọi là Bộ môn Tin học cùng với Trung tâm Điện tử - Tin học. Đến năm 1997 Bộ môn Tin học được đổi tên thành Bộ môn Hệ thống thông tin & Toán ứng dụng (tiền thân của Bộ môn Hệ thống thông tin). Sau này, do nhu cầu phát triển, Bộ môn Hệ thống thông tin & Toán ứng dụng được chia tách thành hai bộ môn: Bộ môn Hệ thống thông tin và Bộ môn Công nghệ phần mềm, rồi một lần nữa, năm 2010 lại được chia tách thành Bộ môn Hệ thống thông tin và Bộ môn Khoa học máy tính.', '2020-11-25 20:28:37', '2020-11-25 20:28:37'),
(2, 1, 'Bộ môn Công Nghệ Thông Tin', 'Bộ môn đảm nhận đào tạo kỹ sư ngành Công nghệ thông tin. Mục tiêu đào tạo là cung cấp cho sinh viên kiến thức và kỹ năng để đảm nhận vị trí nghề nghiệp khác nhau trong lĩnh vực công nghệ thông tin, thăng tiến đến vị trí lãnh đạo,  hoặc tiếp tục học cao hơn và có khả năng trở thành những nhà nghiên cứu, chuyên gia cao cấp trong lĩnh vực này. Sinh viên theo học ngành Công nghệ thông tin khi ra trường có thể có các cơ hội nghề nghiệp như là:  Nhà quản lý hệ thống Công nghệ thông tin, tư vấn và giám sát hệ thống công nghệ thông tin, nhà hoạch định chính sách hoặc phản biện về chính sách Công nghệ thông tin, kỹ sư phần mềm, lập trình viên hay đảm nhận các chức danh khác công ty phần mềm và  công ty về giải pháp công nghệ thông tin-truyền thông.', '2020-11-25 20:29:54', '2020-11-25 20:29:54'),
(7, 1, 'Bộ môn Khoa học máy tính', 'Khoa học Máy tính như:\r\nCấu trúc máy tính,\r\nHệ điều hành máy tính,\r\nNgôn ngữ lập trình phần mềm và phần cứng,\r\nTrí tuệ nhân tạo,\r\nBảo mật và an toàn máy tính,\r\nXử lý dữ liệu khối lượng lớn từ mạng internet và các mạng xã hội,\r\nThiết kế và phát triển các ứng dụng cho các thiết bị di động và môi trường web…', '2020-11-29 23:26:33', '2020-11-29 23:26:33'),
(20, 1, 'Bộ môn Mạng máy tính & Truyền thông (MMT&TT)', 'Bộ môn MMT&TT tham gia hoạt động giảng dạy cho chương trình đại học Mạng máy tính và Truyền thông dữ liệu, sau đại học về Khoa học máy tính và các ngành thuộc lĩnh vực Công nghệ thông tin. Chương trình giảng dạy được thiết kế theo hướng chuyên sâu về hệ thống máy tính, mạng máy tính, dữ liệu lớn và tính toán hiệu năng cao. Sinh viên được trang bị khối kiến thức lý thuyết và kỹ năng thực hành về: phát triển phần mềm trên thiết bị di động, phần mềm tự do nguồn mở, ứng dụng web, dịch vụ web, mô hình client-server, ứng dụng mạng, cài đặt, quản trị, khắc phục sự cố hệ thống mạng máy tính, an ninh mạng, robot, tính toán lưới, điện toán đám mây, dữ liệu lớn, giải thuật song song, phân tán và internet kết nối vạn vật.', '2020-12-18 08:15:21', '2020-12-18 08:15:21'),
(21, 1, 'Bộ môn Công nghệ Phần mềm', 'Kỹ thuật phần mềm trang bị cho sinh viên kiến thức chuyên sâu về quy trình, phương pháp, kỹ thuật và công nghệ trong phân tích, thiết kế, lập trình, kiểm thử & đảm bảo chất lượng, quản lý dự án và bảo trì phần mềm. Người học có khả năng phát triển các hệ thống phần mềm theo các hướng chính như: phần mềm nhúng trên các thiết bị di động, thiết bị điện tử, thiết bị điều khiển,…; phần mềm quản lý nghiệp vụ dùng cho các các cơ quan, doanh nghiệp,…; phần mềm hướng tác tử dùng mô phỏng các vấn đề về biến đổi khí hậu, giao thông, nuôi trồng, dịch bệnh,…; ứng dụng IoT, mạng cảm biến trong giám sát và dự báo môi trường. Ngoài ra, người học cũng được cung cấp kiến thức cơ bản về tổ chức và quản lý công nghệ phần mềm để có khả năng đàm phán, làm việc hiệu quả và giao tiếp tốt với các đối tác trong môi trường phát triển phần mềm.', '2020-12-18 08:16:31', '2020-12-18 08:16:31'),
(22, 1, 'Bộ môn Tin học ứng dụng', 'Tin học ứng dụng đào tạo kỹ sư có khả năng ứng dụng các công nghệ Web tiên tiến, các công cụ lập trình và trí tuệ nhân tạo để thiết kế, lập trình và quản trị các hệ thống thông tin trực tuyến; quản trị hệ thống thông tin doanh nghiệp; xây dựng các ứng dụng phần mềm phân tích và xử lý dữ liệu cho công ty, doanh nghiệp. Người học được trải nghiệm thực tế tại công ty có bộ phận tin học; được cung cấp các kiến thức thực tế chuyên sâu về công nghệ thông tin thông qua các khóa học do các chuyên gia tin học trong và ngoài nước giảng dạy.', '2020-12-18 08:17:23', '2020-12-18 08:17:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `positions`
--

INSERT INTO `positions` (`id`, `position_name`, `position_description`, `created_at`, `updated_at`) VALUES
(2, 'Trưởng khoa', 'Là trưởng của 1 tập thể, trưởng khoa đóng vai trò hết sức quan trọng. Người lãnh đạo của 1 nhóm thành viên, làm việc dưới sự kiểm soát của Hiệu trưởng, Phó hiệu trưởng.', '2020-11-23 19:30:37', '2020-11-23 19:30:37'),
(3, 'Phó Trưởng khoa', 'Giúp trưởng khoa trong việc quản lý và thực hiện kế hoạch đào tạo, nghiên cứu khoa học, các hoạt động phong trào đoàn thể nhằm đảm bảo, sự phát triển toàn vẹn và bền vững của Khoa', '2020-11-23 19:41:48', '2020-11-23 19:41:48'),
(5, 'Trưởng bộ môn', 'Giúp Ban chủ nhiệm khoa trong việc quản lý và kế hoạch đào tạo, nghiên cứu khoa học, quản lý về chuyên môn, ra đề thi và lưu đề thi của bộ môn theo quy định của nhà Trường và của Khoa.', '2020-11-23 23:49:12', '2020-12-21 20:15:56'),
(6, 'Phó Trưởng bộ môn', 'Phê duyệt các Đề cương chi tiết của GV trong Bộ môn hoặc của GV thỉnh giảng của Bộ môn trước khi đưa vào giảng dạy. Tổ chức cải tiến phương pháp giảng dạy – học tập trong Bộ môn. Quản lý trực tiếp các GV, CBVC, HSSV trong Bộ môn theo phân cấp của Hiệu trưởng. Được quyền triển khai các hoạt động Bộ môn học và công nghệ đã được Hiệu trưởng phê duyệt nhằm nâng cao chất lượng đào tạo và nghiên cứu Bộ môn.', '2020-11-23 23:52:09', '2020-11-23 23:52:09'),
(7, 'Giảng viên', 'Giảng viên là công chức chuyên môn đảm nhiệm việc giảng dạy và đào tạo ở bậc đại học, cao đẳng thuộc một chuyên ngành đào tạo của trường đại học hoặc cao đẳng. Giảng viên chính là công chức chuyên môn đảm nhiệm vai trò chủ chốt trong giảng dạy và đào tạo ở bậc đại học, cao đẳng và sau đại học, thuộc một chuyên ngành đào tạo của trường đại học, cao đẳng.', '2020-11-23 23:55:13', '2020-11-23 23:55:13'),
(8, 'Khác (Sinh viên)', 'Chức năng này đăng nhập hệ thống xem kết quả học tập', '2020-11-25 23:48:04', '2020-12-21 20:16:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prerequisite_parallels`
--

CREATE TABLE `prerequisite_parallels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prerequisite_parallel_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `prerequisite_parallels`
--

INSERT INTO `prerequisite_parallels` (`id`, `subject_code`, `prerequisite_parallel_note`, `created_at`, `updated_at`) VALUES
(1, 'XH023', 'Tiên quyết', '2020-12-09 08:25:13', '2020-12-09 08:25:13'),
(2, 'CT176', 'Tiên quyết', '2020-12-09 09:20:22', '2020-12-09 09:20:22'),
(3, 'CT180', 'Tiên quyết', '2020-12-09 09:20:33', '2020-12-09 09:20:33'),
(4, 'XH024', 'Tiên quyết', '2020-12-10 01:09:29', '2020-12-10 01:09:29'),
(5, 'XH004', 'Tiên quyết', '2020-12-10 01:12:46', '2020-12-10 01:12:46'),
(6, 'XH005', 'Tiên quyết', '2020-12-10 01:14:50', '2020-12-10 01:14:50'),
(7, 'ML009', 'Tiên quyết', '2020-12-10 01:15:37', '2020-12-10 01:15:37'),
(8, 'ML010', 'Tiên quyết', '2020-12-10 01:16:03', '2020-12-10 01:16:03'),
(9, 'ML006', 'Tiên quyết', '2020-12-10 01:16:25', '2020-12-10 01:16:25'),
(10, 'TN001', 'Tiên quyết', '2020-12-10 01:17:04', '2020-12-10 01:17:04'),
(11, 'CT101', 'Tiên quyết', '2020-12-10 01:17:38', '2020-12-10 01:17:38'),
(12, 'CT173', 'Tiên quyết', '2020-12-10 01:18:07', '2020-12-10 01:18:07'),
(13, 'CT178', 'Tiên quyết', '2020-12-10 01:18:40', '2020-12-10 01:18:40'),
(14, 'CT101', 'Tiên quyết', '2020-12-10 01:20:31', '2020-12-10 01:20:31'),
(15, 'CT103', 'Tiên quyết', '2020-12-10 01:21:02', '2020-12-10 01:21:02'),
(16, 'CT103', 'Tiên quyết', '2020-12-10 01:21:35', '2020-12-10 01:21:35'),
(17, 'CT103', 'Tiên quyết', '2020-12-10 01:22:06', '2020-12-10 01:22:06'),
(18, 'CT103', 'Tiên quyết', '2020-12-10 01:22:26', '2020-12-10 01:22:26'),
(19, 'XH025', 'Tiên quyết', '2020-12-10 01:24:11', '2020-12-10 01:24:11'),
(20, 'CT183', 'Tiên quyết', '2020-12-10 01:25:30', '2020-12-10 01:25:30'),
(21, 'XH006', 'Tiên quyết', '2020-12-10 01:26:07', '2020-12-10 01:26:07'),
(22, 'CT185', 'Tiên quyết', '2020-12-10 01:26:28', '2020-12-10 01:26:28'),
(23, 'CT180', 'Tiên quyết', '2020-12-10 01:26:52', '2020-12-10 01:26:52'),
(24, 'CT112', 'Tiên quyết', '2020-12-10 01:27:17', '2020-12-10 01:27:17'),
(25, 'CT112', 'Tiên quyết', '2020-12-10 01:27:44', '2020-12-10 01:27:44'),
(26, 'CT112', 'Tiên quyết', '2020-12-10 01:28:06', '2020-12-10 01:28:06'),
(27, 'CT112', 'Tiên quyết', '2020-12-10 01:28:30', '2020-12-10 01:28:30'),
(28, 'CT112', 'Tiên quyết', '2020-12-10 01:29:19', '2020-12-10 01:29:19'),
(29, 'CT176', 'Tiên quyết', '2020-12-10 01:29:42', '2020-12-10 01:29:42'),
(30, 'CT180', 'Tiên quyết', '2020-12-10 01:29:54', '2020-12-10 01:29:54'),
(31, 'CT176', 'Tiên quyết', '2020-12-10 01:32:32', '2020-12-10 01:32:32'),
(32, 'CT180', 'Tiên quyết', '2020-12-10 01:32:44', '2020-12-10 01:32:44'),
(33, 'CT101', 'Tiên quyết', '2020-12-10 01:33:43', '2020-12-10 01:33:43'),
(34, 'CT176', 'Tiên quyết', '2020-12-10 01:34:27', '2020-12-10 01:34:27'),
(35, 'CT171', 'Tiên quyết', '2020-12-10 01:34:52', '2020-12-10 01:34:52'),
(36, 'CT176', 'Tiên quyết', '2020-12-10 01:35:15', '2020-12-10 01:35:15'),
(37, 'ML010', 'Tiên quyết', '2020-12-14 01:17:10', '2020-12-14 01:17:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `program_studies`
--

CREATE TABLE `program_studies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `program_train_id` bigint(20) UNSIGNED DEFAULT NULL,
  `program_studie_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `program_studies`
--

INSERT INTO `program_studies` (`id`, `category_subject_id`, `subject_id`, `program_train_id`, `program_studie_note`, `created_at`, `updated_at`) VALUES
(109, 3, 1, 6, 'Bố trí theo nhóm ngành', '2020-12-22 02:11:55', '2020-12-22 02:11:55'),
(110, 3, 2, 6, 'Bố trí theo nhóm ngành', '2020-12-22 02:12:07', '2020-12-22 02:12:07'),
(111, 3, 3, 6, 'Bố trí theo nhóm ngành', '2020-12-22 02:12:15', '2020-12-22 02:12:15'),
(112, 6, 4, 6, NULL, '2020-12-22 02:12:39', '2020-12-22 02:12:39'),
(113, 6, 5, 6, '10 TC nhóm AVCB', '2020-12-22 02:13:23', '2020-12-22 02:13:23'),
(114, 6, 6, 6, '10 TC nhóm AVCB', '2020-12-22 02:13:35', '2020-12-22 02:13:35'),
(115, 6, 7, 6, '10 TC nhóm AVCB', '2020-12-22 02:13:48', '2020-12-22 02:13:48'),
(116, 3, 11, 6, NULL, '2020-12-22 02:14:18', '2020-12-22 02:14:18'),
(117, 3, 12, 6, NULL, '2020-12-22 02:14:33', '2020-12-22 02:14:33'),
(118, 3, 13, 6, NULL, '2020-12-22 02:15:04', '2020-12-22 02:15:04'),
(119, 3, 14, 6, NULL, '2020-12-22 02:15:14', '2020-12-22 02:15:14'),
(120, 3, 15, 6, NULL, '2020-12-22 02:15:28', '2020-12-22 02:15:28'),
(121, 3, 16, 6, NULL, '2020-12-22 02:15:42', '2020-12-22 02:15:42'),
(122, 3, 17, 6, NULL, '2020-12-22 02:16:00', '2020-12-22 02:16:00'),
(123, 6, 20, 6, 'Nhóm tự chọn 2 tin chỉ', '2020-12-22 02:16:35', '2020-12-22 02:16:35'),
(124, 3, 23, 6, NULL, '2020-12-22 02:17:03', '2020-12-22 02:17:03'),
(125, 3, 24, 6, NULL, '2020-12-22 02:17:13', '2020-12-22 02:17:13'),
(126, 3, 25, 6, NULL, '2020-12-22 02:17:25', '2020-12-22 02:17:25'),
(127, 3, 26, 6, NULL, '2020-12-22 02:17:36', '2020-12-22 02:17:36'),
(128, 3, 27, 6, NULL, '2020-12-22 02:17:47', '2020-12-22 02:17:47'),
(129, 3, 28, 6, NULL, '2020-12-22 02:18:01', '2020-12-22 02:18:01'),
(130, 3, 29, 6, NULL, '2020-12-22 02:18:11', '2020-12-22 02:18:11'),
(131, 3, 30, 6, NULL, '2020-12-22 02:18:23', '2020-12-22 02:18:23'),
(132, 3, 31, 6, NULL, '2020-12-22 02:18:39', '2020-12-22 02:18:39'),
(133, 3, 32, 6, NULL, '2020-12-22 02:18:50', '2020-12-22 02:18:50'),
(134, 3, 33, 6, NULL, '2020-12-22 02:19:01', '2020-12-22 02:19:01'),
(135, 3, 34, 6, NULL, '2020-12-22 02:19:12', '2020-12-22 02:19:12'),
(136, 3, 35, 6, NULL, '2020-12-22 02:19:23', '2020-12-22 02:19:23'),
(137, 3, 36, 6, NULL, '2020-12-22 02:19:34', '2020-12-22 02:19:34'),
(138, 3, 37, 6, NULL, '2020-12-22 02:19:46', '2020-12-22 02:19:46'),
(139, 3, 38, 6, NULL, '2020-12-22 02:19:58', '2020-12-22 02:19:58'),
(140, 3, 39, 6, NULL, '2020-12-22 02:21:16', '2020-12-22 02:21:16'),
(141, 3, 40, 6, NULL, '2020-12-22 02:21:26', '2020-12-22 02:21:26'),
(142, 6, 41, 6, 'Nhóm tự chọn N1', '2020-12-22 02:22:06', '2020-12-22 02:22:06'),
(143, 6, 42, 6, 'Nhóm tự chọn N1', '2020-12-22 02:22:22', '2020-12-22 02:22:22'),
(144, 3, 47, 6, NULL, '2020-12-22 02:22:40', '2020-12-22 02:22:40'),
(145, 3, 48, 6, NULL, '2020-12-22 02:22:50', '2020-12-22 02:22:50'),
(146, 3, 49, 6, NULL, '2020-12-22 02:23:03', '2020-12-22 02:23:03'),
(147, 3, 50, 6, NULL, '2020-12-22 02:23:14', '2020-12-22 02:23:14'),
(148, 3, 51, 6, NULL, '2020-12-22 02:23:24', '2020-12-22 02:23:24'),
(149, 3, 52, 6, NULL, '2020-12-22 02:23:36', '2020-12-22 02:23:36'),
(150, 6, 54, 6, 'Tự chọn 2 TC', '2020-12-22 02:24:00', '2020-12-22 02:24:00'),
(151, 3, 55, 6, NULL, '2020-12-22 02:24:12', '2020-12-22 02:24:12'),
(152, 6, 57, 6, 'Tự chọn 2 TC', '2020-12-22 02:24:30', '2020-12-22 02:24:30'),
(153, 3, 58, 6, NULL, '2020-12-22 02:24:42', '2020-12-22 02:24:42'),
(154, 6, 61, 6, 'Tự chọn 3 TC', '2020-12-22 02:25:11', '2020-12-22 02:25:11'),
(155, 3, 62, 6, NULL, '2020-12-22 02:25:27', '2020-12-22 02:25:27'),
(156, 3, 63, 6, NULL, '2020-12-22 02:25:39', '2020-12-22 02:25:39'),
(157, 3, 64, 6, NULL, '2020-12-22 02:25:49', '2020-12-22 02:25:49'),
(158, 3, 65, 6, NULL, '2020-12-22 02:26:00', '2020-12-22 02:26:00'),
(159, 6, 66, 6, 'Tự chọn 10TC', '2020-12-22 02:26:24', '2020-12-22 02:26:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `program_trains`
--

CREATE TABLE `program_trains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `major_id` bigint(20) UNSIGNED DEFAULT NULL,
  `program_train_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_train_date_begin` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `program_trains`
--

INSERT INTO `program_trains` (`id`, `course_id`, `major_id`, `program_train_name`, `program_train_date_begin`, `created_at`, `updated_at`) VALUES
(6, 5, 2, 'CTĐT khóa 43', '2017-09-10', '2020-12-22 02:09:20', '2020-12-22 02:09:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `position_id`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị', 2, '2020-11-24 01:58:45', '2020-11-24 01:58:45'),
(2, 'Giảng viên', 7, '2020-11-24 20:13:43', '2020-11-24 20:13:43'),
(3, 'Sinh viên', 8, '2020-11-25 23:48:21', '2020-11-25 23:48:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `semester_years`
--

CREATE TABLE `semester_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semester_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semesteryear` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_begin` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `semester_years`
--

INSERT INTO `semester_years` (`id`, `semester_year`, `semesteryear`, `date_begin`, `date_end`, `created_at`, `updated_at`) VALUES
(1, '2017 - 2018', '12017', '2017-09-09', '2018-01-15', '2020-12-22 01:49:44', '2020-12-22 01:49:44'),
(2, '2017 - 2018', '22017', '2018-01-25', '2018-06-20', '2020-12-22 02:00:21', '2020-12-22 02:00:21'),
(3, '2017 - 2018', '32017', '2018-07-25', '2018-08-15', '2020-12-22 02:01:02', '2020-12-22 02:01:02'),
(4, '2018 - 2019', '12018', '2018-09-09', '2019-01-20', '2020-12-22 02:02:07', '2020-12-22 02:02:07'),
(5, '2018 - 2019', '22018', '2019-02-20', '2019-06-15', '2020-12-22 02:04:15', '2020-12-22 07:38:25'),
(6, '2018 - 2019', '32018', '2019-07-10', '2019-08-20', '2020-12-22 02:04:44', '2020-12-22 07:39:08'),
(7, '2019 - 2020', '12019', '2019-09-10', '2020-01-25', '2020-12-22 02:05:32', '2020-12-22 07:39:40'),
(8, '2019 - 2020', '22019', '2020-02-25', '2020-06-10', '2020-12-22 02:06:09', '2020-12-22 02:06:09'),
(10, '2019 - 2020', '32019', '2020-07-25', '2020-08-30', '2020-12-22 07:40:36', '2020-12-22 07:40:36'),
(11, '2020 - 2021', '12020', '2020-09-09', '2021-01-10', '2020-12-22 07:41:48', '2020-12-22 07:46:23'),
(12, '2020 - 2021', '22020', '2021-01-25', '2021-05-20', '2020-12-22 07:47:08', '2020-12-22 07:47:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_major_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`id`, `class_major_id`, `student_code`, `student_fullname`, `student_birthday`, `student_sex`, `student_phone`, `student_email`, `student_address`, `student_avatar`, `created_at`, `updated_at`) VALUES
(62, 2, 'B1607049', 'Tạ Chí Bão', '35073', 'Nam', '0326958963', NULL, 'Vị Thủy - Hậu Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(63, 2, 'B1607050', 'Nguyễn Nam Bắc', '35409', 'Nam', '0326958964', NULL, 'Vị Thủy - Hậu Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(64, 2, 'B1607056', 'Nguyễn Văn Cõ', '36137', 'Nam', '0326958965', NULL, 'Vị Thủy - Hậu Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(65, 2, 'B1607058', 'Nguyễn Thị Kiều Diễm', '1998-12-17', 'Nữ', '0326958966', 'diemb1607058@student.ctu.edu.vn', 'Vị Thủy - Hậu Giang', NULL, '2020-11-30 20:27:39', '2020-12-12 01:08:55'),
(66, 2, 'B1607061', 'Trần Thanh Duy', '6/14/1998', 'Nam', '0326958967', NULL, 'Vị Thủy - Hậu Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(67, 2, 'B1607062', 'Nguyễn Thị Mỹ Duyên', '9/15/1998', 'Nam', '0326958968', NULL, 'Vị Thủy - Hậu Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(68, 2, 'B1607063', 'Hồ Thuỳ Dương', '1998-12-17', 'Nam', '0326958969', 'duongb1607063@student.ctu.edu.vn', 'Vị Thủy - Hậu Giang', NULL, '2020-11-30 20:27:39', '2020-12-01 19:19:17'),
(69, 2, 'B1607064', 'Lê Văn Đạt', '36073', 'Nam', '0326958970', NULL, 'Vị Thủy - Hậu Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(70, 2, 'B1607066', 'Đinh Hoàng Ngọc Giao', '35951', 'Nam', '0326958971', NULL, 'Vị Thủy - Hậu Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(71, 2, 'B1607071', 'Trần Thị Huỳnh Hoa', '8/16/1998', 'Nam', '0326958972', NULL, 'Vị Thủy - Hậu Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(72, 2, 'B1607072', 'Nguyễn Minh Hoàng', '35797', 'Nam', '0326958973', NULL, 'Vị Thủy - Hậu Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(73, 2, 'B1607073', 'Trần Xuân Hồng', '11/18/1998', 'Nam', '0326958974', NULL, 'Vị Thủy - Hậu Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(74, 2, 'B1607074', 'Nguyễn Hoàng Huy', '36039', 'Nam', '0326958975', NULL, 'Vị Thủy - Hậu Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(75, 2, 'B1607078', 'Nguyễn Minh Kha', '11/16/1998', 'Nam', '0326958976', NULL, 'Vĩnh Châu - Sóc Trăng', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(76, 2, 'B1607080', 'Trần Tuấn Khanh', '35531', 'Nam', '0326958977', NULL, 'Vĩnh Châu - Sóc Trăng', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(77, 2, 'B1607081', 'Nguyễn Việt Khái', '35587', 'Nam', '0326958978', NULL, 'Vĩnh Châu - Sóc Trăng', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(79, 2, 'B1607090', 'Lâm Minh Mẫn', '1998-12-31', 'Nam', '0326958980', 'manb1607090@student.ctu.edu.vn', 'Vĩnh Châu - Sóc Trăng', NULL, '2020-11-30 20:27:39', '2020-12-01 00:06:03'),
(80, 2, 'B1607092', 'Huỳnh Mi Nết', '10/28/1998', 'Nam', '0326958981', NULL, 'Vĩnh Châu - Sóc Trăng', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(81, 2, 'B1607096', 'Phạm Thị Hồng Ngọc', '6/25/1998', 'Nữ', '0326958982', NULL, 'Vĩnh Châu - Sóc Trăng', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(82, 2, 'B1607097', 'Phạm Thanh Nhã', '7/29/1998', 'Nữ', '0326958983', NULL, 'Vĩnh Châu - Sóc Trăng', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(83, 2, 'B1607099', 'Lê Minh Nhí', '11/20/1998', 'Nữ', '0326958984', NULL, 'Vĩnh Châu - Sóc Trăng', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(84, 2, 'B1607102', 'Trần Lâm Đại Đình Oai', '11/19/1998', 'Nữ', '0326958985', NULL, 'Vĩnh Châu - Sóc Trăng', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(85, 2, 'B1607104', 'Lê Tấn Phúc', '6/23/1998', 'Nữ', '0326958986', NULL, 'Vĩnh Châu - Sóc Trăng', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(86, 2, 'B1607105', 'Nguyễn Minh Phục', '12/20/1998', 'Nữ', '0326958987', NULL, 'Vĩnh Châu - Sóc Trăng', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(87, 2, 'B1607108', 'Lê Thị Hồng Sương', '36016', 'Nữ', '0326958988', NULL, 'Lai Vung - Đồng Tháp', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(88, 2, 'B1607112', 'Đặng Minh Thành', '6/15/1998', 'Nữ', '0326958989', NULL, 'Lai Vung - Đồng Tháp', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(89, 2, 'B1607115', 'Huỳnh Minh Thiện', '36080', 'Nữ', '0326958990', NULL, 'Lai Vung - Đồng Tháp', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(90, 2, 'B1607116', 'Trịnh Phước Thiện', '5/18/1998', 'Nữ', '0326958991', NULL, 'Lai Vung - Đồng Tháp', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(91, 2, 'B1607117', 'Lê Văn Thịnh', '12/27/1998', 'Nữ', '0326958992', NULL, 'Lai Vung - Đồng Tháp', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(92, 2, 'B1607119', 'Nguyễn Hồng Thủy', '36130', 'Nữ', '0326958993', NULL, 'Lai Vung - Đồng Tháp', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(93, 2, 'B1607122', 'Trần Thị Anh Thư', '36016', 'Nữ', '0326958994', NULL, 'Lai Vung - Đồng Tháp', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(94, 2, 'B1607123', 'Phạm Hoài Thương', '36048', 'Nữ', '0326958995', NULL, 'Lai Vung - Đồng Tháp', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(95, 2, 'B1607125', 'Võ Hoàng Tiến', '35838', 'Nữ', '0326958996', NULL, 'Lai Vung - Đồng Tháp', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(96, 2, 'B1607126', 'Nguyễn Ngọc Tiền', '35981', 'Nữ', '0326958997', NULL, 'Lai Vung - Đồng Tháp', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(97, 2, 'B1607127', 'Đặng Trung Tính', '4/26/1998', 'Nữ', '0326958998', NULL, 'Lai Vung - Đồng Tháp', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(98, 2, 'B1607129', 'Thái Thanh Toàn', '3/26/1998', 'Nữ', '0326958999', NULL, 'Lai Vung - Đồng Tháp', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(99, 2, 'B1607131', 'Bùi Ngọc Bảo Trân', '35858', 'Nữ', '0326959000', NULL, 'Tam Bình - Vĩnh Long', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(100, 2, 'B1607132', 'Đổ Huy Trọng', '11/16/1998', 'Nữ', '0326959001', NULL, 'Tam Bình - Vĩnh Long', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(101, 2, 'B1607133', 'Hồ Văn Trọng', '36069', 'Nữ', '0326959002', NULL, 'Tam Bình - Vĩnh Long', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(102, 2, 'B1607135', 'Phan Minh Truyền', '6/13/1998', 'Nữ', '0326959003', NULL, 'Tam Bình - Vĩnh Long', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(103, 2, 'B1607138', 'Nguyễn Văn Tuấn', '00/00/98', 'Nữ', '0326959004', NULL, 'Tam Bình - Vĩnh Long', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(104, 2, 'B1607139', 'Lưu Vĩnh Tuy', '1/25/1998', 'Nữ', '0326959005', NULL, 'Tam Bình - Vĩnh Long', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(105, 2, 'B1607141', 'Dương Thị Cẩm Tú', '9/29/1998', 'Nữ', '0326959006', NULL, 'Tam Bình - Vĩnh Long', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(106, 2, 'B1607142', 'Nguyễn Hoàng Ngọc Tú', '36016', 'Nữ', '0326959007', NULL, 'Tam Bình - Vĩnh Long', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(107, 2, 'B1607143', 'Phan Trương Anh Tú', '1/13/1998', 'Nữ', '0326959008', NULL, 'Tam Bình - Vĩnh Long', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(108, 2, 'B1607144', 'Nguyễn Thanh Tùng', '35837', 'Nữ', '0326959009', NULL, 'Tam Bình - Vĩnh Long', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(109, 2, 'B1607145', 'Thạch Thị Thúy Uyên', '36138', 'Nữ', '0326959010', NULL, 'Tam Bình - Vĩnh Long', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(110, 2, 'B1607146', 'Nguyễn Hoàng Vẹn', '7/15/1998', 'Nữ', '0326959011', NULL, 'Tam Bình - Vĩnh Long', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(111, 2, 'B1607148', 'Lê Thiên Vĩ', '35715', 'Nữ', '0326959012', NULL, 'Tam Bình - Vĩnh Long', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(112, 2, 'B1607150', 'Nguyễn Ngọc Tường Vy', '11/20/1998', 'Nữ', '0326959013', NULL, 'Tam Bình - Vĩnh Long', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(113, 2, 'B1607151', 'Nguyễn Hồng Kim Yến', '36133', 'Nữ', '0326959014', NULL, 'Tam Bình - Vĩnh Long', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(114, 2, 'B1609943', 'Nguyễn Nguyên Duy Phương', '35804', 'Nữ', '0326959015', NULL, 'Tri Tôn - An Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(115, 2, 'B1610692', 'Huỳnh Văn An', '35984', 'Nữ', '0326959016', NULL, 'Tri Tôn - An Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(116, 2, 'B1610693', 'Nguyễn Thị Mỹ Hương', '1/15/1998', 'Nữ', '0326959017', NULL, 'Tri Tôn - An Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(117, 2, 'B1610694', 'Lê Hoàng Nam', '9/24/1998', 'Nữ', '0326959018', NULL, 'Tri Tôn - An Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(118, 2, 'B1610696', 'Trần Bá Thịnh', '35894', 'Nữ', '0326959019', NULL, 'Tri Tôn - An Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(119, 2, 'B1610698', 'Nguyễn Thị Minh Thư', '35432', 'Nữ', '0326959020', NULL, 'Tri Tôn - An Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(120, 2, 'B1610701', 'Liễu Minh Trí', '35829', 'Nữ', '0326959021', NULL, 'Tri Tôn - An Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(121, 2, 'B1610705', 'Nhan Triệu Vĩ', '8/25/1998', 'Nữ', '0326959022', NULL, 'Tri Tôn - An Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(122, 2, 'B1610706', 'Hồ Hoàng Vũ', '35831', 'Nữ', '0326959023', NULL, 'Tri Tôn - An Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_number_credit` int(11) DEFAULT NULL,
  `subject_number_theory` int(11) DEFAULT NULL,
  `subject_number_practice` int(11) DEFAULT NULL,
  `subject_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`id`, `subject_code`, `subject_name`, `subject_number_credit`, `subject_number_theory`, `subject_number_practice`, `subject_status`, `created_at`, `updated_at`) VALUES
(1, 'QP003', 'Giáo dục quốc phòng – An ninh 1 (*)', 3, 45, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(2, 'QP004', 'Giáo dục quốc phòng – An ninh 2 (*)', 2, 30, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(3, 'QP005', 'Giáo dục quốc phòng – An ninh 3 (*)', 3, 30, 45, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(4, 'TC100', 'Giáo dục thể chất 1+2 +3(*)', 3, NULL, 90, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(5, 'XH023', 'Anh văn căn bản 1 (*)', 4, 60, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(6, 'XH024', 'Anh văn căn bản 2 (*)', 3, 45, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(7, 'XH025', 'Anh văn căn bản 3 (*)', 3, 45, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(8, 'XH004', 'Pháp văn căn bản 1 (*)', 3, 45, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(9, 'XH005', 'Pháp văn căn bản 2 (*)', 3, 45, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(10, 'XH006', 'Pháp văn căn bản 3 (*)', 4, 60, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(11, 'TN033', 'Tin học căn bản (*) ', 1, 15, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(12, 'TN034', 'TT.Tin học căn bản (*) ', 2, NULL, 60, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(13, 'ML009', 'Những nguyên lý cơ bản của CN Mác-Lênin 1', 2, 30, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(14, 'ML010', 'Những nguyên lý cơ bản của CN Mác-Lênin 2', 3, 45, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(15, 'ML006', 'Tư tưởng Hồ Chí Minh', 2, 30, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(16, 'ML011', 'Đường lối cách mạng của Đảng Cộng sản Việt Nam', 3, 45, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(17, 'KL001', 'Pháp luật đại cương', 2, 30, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(18, 'ML007', 'Logic học đại cương', 2, 30, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(19, 'XH028', 'Xã hội học đại cương', 2, 30, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(20, 'XH011', 'Cơ sở văn hóa Việt Nam', 2, 30, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(21, 'XH012', 'Tiếng Việt thực hành', 2, 30, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(22, 'XH014', 'Văn bản và lưu trữ học đại cương', 2, 30, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(23, 'TN001', 'Vi - Tích phân A1', 3, 45, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(24, 'TN002', 'Vi - Tích phân A2', 4, 60, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(25, 'TN010', 'Xác suất thống kê ', 3, 45, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(26, 'TN012', 'Đại số tuyến tính và hình học', 4, 60, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(27, 'CT101', 'Lập trình căn bản A', 4, 30, 60, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(28, 'CT172', 'Toán rời rạc ', 4, 60, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(29, 'CT103', 'Cấu trúc dữ liệu', 4, 45, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(30, 'CT173', 'Kiến trúc máy tính', 3, 45, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(31, 'CT178', 'Nguyên lý hệ điều hành', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(32, 'CT179', 'Quản trị hệ thống', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(33, 'CT112', 'Mạng máy tính', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(34, 'CT171', 'Nhập môn công nghệ phần mềm', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(35, 'CT176', 'Lập trình hướng đối tượng', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(36, 'CT175', 'Lý thuyết đồ thị', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(37, 'CT174', 'Phân tích và thiết kế thuật toán', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(38, 'CT180', 'Cơ sở dữ liệu', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(39, 'CT187', 'Nền tảng công nghệ thông tin', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(40, 'CT311', 'Phương pháp nghiên cứu khoa học', 2, 20, 20, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(41, 'CT181', 'Hệ thống thông tin doanh nghiệp', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(42, 'CT182', 'Ngôn ngữ mô hình hóa', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(43, 'CT183', 'Anh văn chuyên môn CNTT 1', 3, 45, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(44, 'CT184', 'Anh văn chuyên môn CNTT 2', 3, 45, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(45, 'CT185', 'Pháp văn chuyên môn CNTT 1', 3, 45, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(46, 'CT186', 'Pháp văn chuyên môn CNTT 2', 3, 45, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(47, 'CT109', 'Phân tích và thiết kế hệ thống thông tin', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(48, 'CT233', 'Điện toán đám mây', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(49, 'CT332', 'Trí tuệ nhân tạo', 3, 45, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(50, 'CT202', 'Nguyên lý máy học', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(51, 'CT222', 'An toàn hệ thống', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(52, 'CT237', 'Nguyên lý hệ quản trị cơ sở dữ liệu ', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(53, 'CT236', 'Quản trị cơ sở dữ liệu trên Windows', 2, 15, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(54, 'CT269', 'Hệ quản trị CSDL Oracle', 2, 15, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(55, 'CT335', 'Thiết kế và cài đặt mạng', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(56, 'CT235', 'Quản trị mạng trên MS Windows', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(57, 'CT212', 'Quản trị mạng', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(58, 'CT221', 'Lập trình mạng', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(59, 'CT206', 'Phát triển ứng dụng trên Linux', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(60, 'CT251', 'Phát triển ứng dụng trên Windows', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(61, 'CT207', 'Phát triển phần mềm mã nguồn mở', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(62, 'CT428', 'Lập trình Web', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(63, 'CT450', 'Thực tập thực tế - CNTT', 2, NULL, 60, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(64, 'CT271', 'Niên luận cơ sở - CNTT', 3, NULL, 90, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(65, 'CT466', 'Niên luận - CNTT', 3, NULL, 90, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(66, 'CT593', 'Luận văn tốt nghiệp - CNTT', 10, NULL, 300, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(67, 'CT468', 'Tiểu luận tốt nghiệp - CNTT', 4, NULL, 120, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(68, 'CT272', 'Thương mại điện tử - CNTT', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(69, 'CT273', 'Giao diện người – máy', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(70, 'CT338', 'Mạng không dây và di động', 2, 30, NULL, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(71, 'CT274', 'Lập trình cho thiết bị di động', 2, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(72, 'CT223', 'Quản lý dự án phần mềm', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(73, 'CT211', 'An ninh mạng', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(74, 'CT275', 'Công nghệ Web', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(75, 'CT224', 'Công nghệ J2EE', 2, 15, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44'),
(76, 'CT231', 'Lập trình song song', 3, 30, 30, 0, '2020-12-08 18:51:44', '2020-12-08 18:51:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subject_prerequisite_parallels`
--

CREATE TABLE `subject_prerequisite_parallels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `prerequisite_parallel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subject_prerequisite_parallels`
--

INSERT INTO `subject_prerequisite_parallels` (`id`, `subject_id`, `prerequisite_parallel_id`, `created_at`, `updated_at`) VALUES
(1, 6, 1, '2020-12-09 08:25:13', '2020-12-09 08:25:13'),
(3, 60, 3, '2020-12-09 09:20:33', '2020-12-09 09:20:33'),
(4, 7, 4, '2020-12-10 01:09:29', '2020-12-10 01:09:29'),
(5, 9, 5, '2020-12-10 01:12:46', '2020-12-10 01:12:46'),
(6, 10, 6, '2020-12-10 01:14:50', '2020-12-10 01:14:50'),
(7, 14, 7, '2020-12-10 01:15:37', '2020-12-10 01:15:37'),
(8, 15, 8, '2020-12-10 01:16:03', '2020-12-10 01:16:03'),
(9, 16, 9, '2020-12-10 01:16:25', '2020-12-10 01:16:25'),
(10, 24, 10, '2020-12-10 01:17:04', '2020-12-10 01:17:04'),
(11, 29, 11, '2020-12-10 01:17:38', '2020-12-10 01:17:38'),
(12, 31, 12, '2020-12-10 01:18:07', '2020-12-10 01:18:07'),
(13, 33, 13, '2020-12-10 01:18:40', '2020-12-10 01:18:40'),
(14, 35, 14, '2020-12-10 01:20:31', '2020-12-10 01:20:31'),
(15, 36, 15, '2020-12-10 01:21:02', '2020-12-10 01:21:02'),
(16, 36, 16, '2020-12-10 01:21:35', '2020-12-10 01:21:35'),
(17, 37, 17, '2020-12-10 01:22:06', '2020-12-10 01:22:06'),
(18, 38, 18, '2020-12-10 01:22:26', '2020-12-10 01:22:26'),
(19, 43, 19, '2020-12-10 01:24:11', '2020-12-10 01:24:11'),
(20, 44, 20, '2020-12-10 01:25:30', '2020-12-10 01:25:30'),
(21, 45, 21, '2020-12-10 01:26:08', '2020-12-10 01:26:08'),
(22, 46, 22, '2020-12-10 01:26:28', '2020-12-10 01:26:28'),
(23, 47, 23, '2020-12-10 01:26:52', '2020-12-10 01:26:52'),
(24, 48, 24, '2020-12-10 01:27:17', '2020-12-10 01:27:17'),
(25, 55, 25, '2020-12-10 01:27:44', '2020-12-10 01:27:44'),
(26, 56, 26, '2020-12-10 01:28:06', '2020-12-10 01:28:06'),
(27, 57, 27, '2020-12-10 01:28:30', '2020-12-10 01:28:30'),
(28, 58, 28, '2020-12-10 01:29:19', '2020-12-10 01:29:19'),
(29, 59, 29, '2020-12-10 01:29:42', '2020-12-10 01:29:42'),
(30, 59, 30, '2020-12-10 01:29:54', '2020-12-10 01:29:54'),
(31, 60, 31, '2020-12-10 01:32:32', '2020-12-10 01:32:32'),
(33, 61, 33, '2020-12-10 01:33:43', '2020-12-10 01:33:43'),
(34, 71, 34, '2020-12-10 01:34:27', '2020-12-10 01:34:27'),
(35, 72, 35, '2020-12-10 01:34:52', '2020-12-10 01:34:52'),
(36, 75, 36, '2020-12-10 01:35:15', '2020-12-10 01:35:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `part_subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_id` bigint(20) UNSIGNED DEFAULT NULL,
  `degree_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `teachers`
--

INSERT INTO `teachers` (`id`, `part_subject_id`, `title_id`, `degree_id`, `position_id`, `fullname`, `birthday`, `sex`, `phone`, `email`, `address`, `avatar`, `created_at`, `updated_at`) VALUES
(13, 1, 5, 2, 7, 'Nguyễn Thanh Hải', '1989-11-30', 'Nam', '0325689963', 'thanhhai@gmail.com', 'Đường 3/2, Phường Xuân Khánh, Quận Ninh Kiều, Thành Phố Cần Thơ', '1607757985-avatar.png', '2020-11-29 23:17:22', '2020-12-12 00:26:25'),
(14, 2, 6, 3, 7, 'Cao Hoàng Tiến', '1978-12-15', 'Nam', '0235896369', 'hoangtien@gmail.com', 'Cầu Móng - Hậu Giang', '1607394754-user2-160x160.jpg', '2020-12-05 01:30:40', '2020-12-07 19:32:34'),
(18, 2, 5, 2, 5, 'Phạm Thế Phi', '1978-12-18', 'Nam', '0235689369', 'ptphi@cit.ctu.edu.vn', 'Cần Thơ', NULL, '2020-12-18 07:40:00', '2020-12-18 07:40:00'),
(19, 2, 5, 2, 6, 'Trần Công Án', '1989-12-03', 'Nam', '0459636989', 'tcan@cit.ctu.edu.vn', 'Cần Thơ', NULL, '2020-12-18 07:41:44', '2020-12-18 07:41:44'),
(20, 2, 5, 2, 7, 'Trần Ngân Bình', '1987-11-03', 'Nam', '0789689987', 'tnbinh@cit.ctu.edu.vn', 'Cần Thơ', NULL, '2020-12-18 07:43:11', '2020-12-18 07:43:11'),
(21, 2, 5, 2, 7, 'Lâm Nhựt Khang', '1987-11-07', 'Nữ', '0568969345', 'lnkhang@cit.ctu.edu.vn', 'Cần Thơ', NULL, '2020-12-18 07:44:40', '2020-12-18 07:44:40'),
(22, 2, 5, 2, 7, 'Thái Minh Tuấn', '1985-11-06', 'Nam', '0789589456', 'tmtuan@cit.ctu.edu.vn', 'Cần Thơ', NULL, '2020-12-18 07:45:55', '2020-12-18 07:45:55'),
(23, 2, 3, 2, 7, 'Trần Cao Đệ', '1978-12-05', 'Nam', '0568969852', 'tcde@ctu.edu.vn', 'Cần Thơ', NULL, '2020-12-18 07:47:03', '2020-12-18 07:47:03'),
(24, 1, 3, 1, 6, 'Nguyễn Thái Nghe', '1985-12-11', 'Nam', '0328974569', 'ntnghe@cit.ctu.edu.vn', 'Cần Thơ', NULL, '2020-12-18 07:48:46', '2020-12-18 07:48:46'),
(25, NULL, NULL, NULL, 2, 'Nguyễn Hữu Hòa', '1979-11-11', 'Nam', '02923734715', 'nhhoa@ctu.edu.vn', 'Cần Thơ', '1608303921-NHHOA.jpg', '2020-12-18 08:05:21', '2020-12-18 08:05:21'),
(26, NULL, NULL, NULL, 3, 'Ngô Bá Hùng', '1986-12-02', 'Nam', '02923734711', 'nbhung@cit.ctu.edu.vn', 'Cần Thơ', '1608304209-Ngo Ba Hung.jpg', '2020-12-18 08:10:09', '2020-12-18 08:10:09'),
(27, NULL, NULL, NULL, 3, 'Huỳnh Xuân Hiệp', '1976-09-30', 'Nam', '02923734714', 'hxhiep@cit.ctu.edu.vn', 'Hậu Giang', '1608304314-hxhiep-23082011.jpg', '2020-12-18 08:11:54', '2020-12-18 08:11:54'),
(28, NULL, NULL, NULL, 3, 'Phạm Nguyên Khang', '1981-10-14', 'Nam', '02923885333', 'pnkhang@cit.ctu.edu.vn', 'Cần Thơ', '1608304374-khang.png', '2020-12-18 08:12:54', '2020-12-18 08:12:54'),
(29, 7, 5, 2, 7, 'Trần Nguyễn Minh Thư', '1989-12-16', 'Nữ', '0214596369', 'tnmthu@ctu.edu.vn', 'Cần Thơ', NULL, '2020-12-19 02:18:42', '2020-12-19 02:18:42'),
(30, 7, 5, 2, 6, 'Trần Việt Châu', '1985-10-17', 'Nam', '0256369845', 'tvchau@cit.ctu.edu.vn', 'Cần Thơ', NULL, '2020-12-19 02:20:20', '2020-12-19 02:20:20'),
(31, 7, 6, 3, 7, 'Phạm Xuân Hiền', '1989-07-19', 'Nữ', '0258969789', 'pxhien@cit.ctu.edu.vn', 'Cần Thơ', NULL, '2020-12-19 02:21:27', '2020-12-19 02:21:27'),
(32, 7, 6, 3, 7, 'Trần Nguyễn Dương Chi', '1987-09-19', 'Nữ', '0142536987', 'tndchi@cit.ctu.edu.vn', 'Cần Thơ', NULL, '2020-12-19 02:22:41', '2020-12-19 02:22:41'),
(33, 20, 6, 3, 7, 'Phạm Hữu Tài', '1978-09-03', 'Nam', '0145263987', 'phtai@cit.ctu.edu.vn', 'Cần Thơ', NULL, '2020-12-19 02:37:50', '2020-12-19 02:37:50'),
(34, 20, 6, 3, 7, 'Nguyễn Hữu Vân Long', '1987-09-16', 'Nam', '0235487963', 'nhvlong@cit.ctu.edu.vn', 'Cần Thơ', NULL, '2020-12-19 02:39:40', '2020-12-19 02:39:40'),
(35, 20, 6, 3, 8, 'Trần Thanh Điện', '1985-07-19', 'Nam', '0963214852', 'thanhdien@ctu.edu.vn', 'Cần Thơ', NULL, '2020-12-19 02:40:58', '2020-12-19 02:40:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `titles`
--

CREATE TABLE `titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `titles`
--

INSERT INTO `titles` (`id`, `title_name`, `title_description`, `created_at`, `updated_at`) VALUES
(2, 'Giáo sư', 'Giáo sư Việt Nam hoặc đơn giản là Giáo sư (professor) là tên gọi một học hàm, hoặc chức danh hoặc chức vụ khoa học dành cho các cán bộ giảng dạy cao cấp ở các bộ môn thuộc trường đại học hoặc viện nghiên cứu, được nhà nước Việt Nam phong tặng vì đáp ứng đủ các tiêu chí do luật định trong các hoạt động đào tạo và nghiên cứu khoa học.', '2020-11-24 00:20:01', '2020-12-21 20:40:09'),
(3, 'Phó Giáo sư', 'Phó Giáo sư (associate professor) là một chức danh khoa học dành cho người nghiên cứu và giảng dạy bậc đại học, sau đại học nhưng ở cấp thấp hơn giáo sư (professor). Đầu thập kỷ 80 của thế kỷ XX, Phó Giáo sư còn được gọi là \"Giáo sư cấp I\". Nhưng thực tế thường bị \"mất\" đi cái đuôi \"cấp I\" nên để tránh nhầm lẫn với Giáo sư (professor), từ năm 1988 đã có quy định thống nhất chỉ dùng chức danh \"Phó Giáo sư\", mà không dùng \"Giáo sư cấp I\" nữa.', '2020-11-24 00:21:51', '2020-11-24 00:21:51'),
(5, 'Tiến sĩ', 'Tiến sĩ là một học vị do trường đại học cấp cho nghiên cứu sinh sau đại học, công nhận luận án nghiên cứu của họ đã đáp ứng tiêu chuẩn bậc tiến sĩ, là hoàn toàn mới chưa từng có ai làm qua.', '2020-11-24 00:29:12', '2020-11-24 00:29:12'),
(6, 'Thạc sĩ', 'Thạc sĩ  chỉ người có học vấn rộng nay dùng để chỉ một bậc học vị. Bậc Chức Danh này khác nhau tùy theo hệ thống giáo dục, Một học vị trên cấp cử nhân, dưới cấp tiến sĩ được cấp bởi trường đại học khi hoàn tất chương trình học chứng tỏ sự nắm vững kiến thức bậc cao của một lĩnh vực nghiên cứu.', '2020-11-24 00:31:06', '2020-12-21 20:39:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `teacher_id`, `student_id`, `role_id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 13, NULL, 2, '002267', '$2y$10$XDWUWNg/A8ajCziPSegMR.sd/qVEuZJ5178G37cYpLfa/8Z3Tmkma', NULL, '2020-11-29 16:17:32', '2020-11-29 16:17:32'),
(11, 14, NULL, 2, '002508', '$2y$10$6Lp2eGhqNvHy9Sk.tqVsMuBc/G8ZoOpdekIjXJA2q/8npkP/j3s3y', NULL, '2020-12-04 18:30:52', '2020-12-04 18:30:52'),
(12, NULL, 79, 3, 'B1607090', '$2y$10$TT432QzTg4RcK2uk7NqkQO6oG3h1.JU7OqYCI9QMlxf4LTgjLjBFq', NULL, '2020-12-10 19:17:39', '2020-12-10 19:17:39'),
(13, NULL, 80, 3, 'B1607092', '$2y$10$dckthBpN4b8D8Ig8AfcM4eP93GIPNl.92lnCWuohPTwqDcCt2j7A.', 'wcMsc9oIMRYBOHdyvDdRSQAF9EaQ1je7IquhcmagJszBjzNWwsQto9mt0Gm4', '2020-12-12 01:18:42', '2020-12-12 01:18:42'),
(17, 18, NULL, 2, '001229', '$2y$10$MRxgJcZWfujbzHUeLgZAWe5gi5vIUGHa/ge3c143dKqUO9MfdABnu', NULL, '2020-12-18 07:40:27', '2020-12-18 07:40:27'),
(18, 19, NULL, 2, '001533', '$2y$10$zlbK4KCrGcBAe9TC5HCqpuKC1Tr7ccs4gvoEVM0.9CdXY8h74iIZa', NULL, '2020-12-18 07:41:55', '2020-12-18 07:41:55'),
(19, 20, NULL, 2, '001231', '$2y$10$nH0ovMT69CvHyU.vYM8Ba.EndP4Y5jUV5ZFaKyYzbgy53zR5/TzVC', NULL, '2020-12-18 07:43:26', '2020-12-18 07:43:26'),
(20, 21, NULL, 2, '001943', '$2y$10$ahWpk/OBJ7.TmW4x3bffl.jN9cXWK8IpjpBP5sXIl3NtepuNyEskK', NULL, '2020-12-18 07:44:53', '2020-12-18 07:44:53'),
(21, 22, NULL, 2, '001944', '$2y$10$9j1r1ZsZ/E8i6U5ZEBBPO.auBgWNPzrsdy7sMXpzejoGVHH9gOtDO', NULL, '2020-12-18 07:46:04', '2020-12-18 07:46:04'),
(22, 23, NULL, 2, '000517', '$2y$10$K1D/vhWE/U9mXV2UDJcdaOA0T1xVJy/dy34vSWYy5nPMwssfTuBwm', NULL, '2020-12-18 07:47:14', '2020-12-18 07:47:14'),
(23, 24, NULL, 2, '001352', '$2y$10$2Sc5v4UQNypL8SmmPNF69ukDob7BiSCixfcrCWUiK0hZBrGSMKqoq', NULL, '2020-12-18 07:49:04', '2020-12-18 07:49:04'),
(24, 25, NULL, 1, '001048', '$2y$10$SOrgXQ7KkeWn/NEeZvQYfuY1FtMGGLYhk4bnxHVxBpB.BVDYR4eKC', NULL, '2020-12-18 08:05:39', '2020-12-18 08:05:39'),
(25, 26, NULL, 1, '001124', '$2y$10$Zf2NZ0K3k2If4WwZDUbm0OmGtjnw2MPOwqcVdDgZc1Qb5XO6Ppy0K', NULL, '2020-12-18 08:10:20', '2020-12-18 08:10:20'),
(26, 27, NULL, 1, '001067', '$2y$10$vqSSkhJKFwtc6ItPStzEkOpA9rA3GxTP2eQHtgoezJFC2UfT248aG', NULL, '2020-12-18 08:12:07', '2020-12-18 08:12:07'),
(27, 28, NULL, 1, '001348', '$2y$10$IliE2ynFsDLOnE/4CtSl4uGOMQuVixA9O.kKB3ha2ta3m/KL1IdlW', NULL, '2020-12-18 08:13:03', '2020-12-18 08:13:03'),
(28, 29, NULL, 2, '002635', '$2y$10$t8etpCMvRNMYDo.gMy0PketbF2tLC3qpRobZO4WiOp4wvDkfRI1iG', NULL, '2020-12-19 02:18:58', '2020-12-19 02:18:58'),
(29, 30, NULL, 2, '002692', '$2y$10$ygffge1CflX7atGJTHwg0eSIjHyX2vD5anWQd8YZ0PINryzMoVbIi', NULL, '2020-12-19 02:20:30', '2020-12-19 02:20:30'),
(30, 31, NULL, 2, '001707', '$2y$10$JihKj5n/XmdTGsC.65Jz6O0E5kz01c17rjUoSADeKGpZqlOeeSBIS', NULL, '2020-12-19 02:21:35', '2020-12-19 02:21:35'),
(31, 32, NULL, 2, '002684', '$2y$10$B/nNNK6pSmBfmiLmwA9Wlec2G77YxwSD4oWV5dVyXrCjzDGMT.AeC', NULL, '2020-12-19 02:22:59', '2020-12-19 02:22:59'),
(32, 33, NULL, 2, '001128', '$2y$10$qikGK24URlgcj6coUAK43OPyRNk7LWvyRZEkMcXXgxbpc6FAr1TWu', NULL, '2020-12-19 02:37:58', '2020-12-19 02:37:58'),
(33, 34, NULL, 2, '002367', '$2y$10$EbGFXpr2q4Re0aI9.vLGTu7yZ3sIcs6AnuEVKyn9VfcLYM6uI1sg6', NULL, '2020-12-19 02:39:52', '2020-12-19 02:39:52'),
(34, 35, NULL, 2, '001324', '$2y$10$znrFLtpZPCLcaOX9Js6fYuFMcn08v4ZFrNZb8ySdcN/CsdhTI5Axq', NULL, '2020-12-19 02:41:07', '2020-12-19 02:41:07');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category_subjects`
--
ALTER TABLE `category_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `class_majors`
--
ALTER TABLE `class_majors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_majors_class_major_code_unique` (`class_major_code`),
  ADD KEY `class_majors_major_id_foreign` (`major_id`),
  ADD KEY `class_majors_course_id_foreign` (`course_id`);

--
-- Chỉ mục cho bảng `class_subjects`
--
ALTER TABLE `class_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_subjects_teacher_id_foreign` (`teacher_id`),
  ADD KEY `class_subjects_semester_year_id_foreign` (`semester_year_id`),
  ADD KEY `class_subjects_subject_id_foreign` (`subject_id`);

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_course_name_unique` (`course_name`);

--
-- Chỉ mục cho bảng `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_department_name_unique` (`department_name`);

--
-- Chỉ mục cho bảng `detail_scores`
--
ALTER TABLE `detail_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_scores_class_subject_id_foreign` (`class_subject_id`),
  ADD KEY `detail_scores_student_id_foreign` (`student_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `majors_major_name_unique` (`major_name`),
  ADD KEY `majors_part_subject_id_foreign` (`part_subject_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `part_subjects`
--
ALTER TABLE `part_subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `part_subjects_part_subject_name_unique` (`part_subject_name`),
  ADD KEY `part_subjects_department_id_foreign` (`department_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `prerequisite_parallels`
--
ALTER TABLE `prerequisite_parallels`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `program_studies`
--
ALTER TABLE `program_studies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_studies_category_subject_id_foreign` (`category_subject_id`),
  ADD KEY `program_studies_subject_id_foreign` (`subject_id`),
  ADD KEY `program_studies_program_train_id_foreign` (`program_train_id`);

--
-- Chỉ mục cho bảng `program_trains`
--
ALTER TABLE `program_trains`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `program_trains_course_id_unique` (`course_id`),
  ADD KEY `program_trains_major_id_foreign` (`major_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_position_id_foreign` (`position_id`);

--
-- Chỉ mục cho bảng `semester_years`
--
ALTER TABLE `semester_years`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_student_code_unique` (`student_code`),
  ADD KEY `students_class_major_id_foreign` (`class_major_id`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subject_prerequisite_parallels`
--
ALTER TABLE `subject_prerequisite_parallels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_prerequisite_parallels_subject_id_foreign` (`subject_id`),
  ADD KEY `subject_prerequisite_parallels_prerequisite_parallel_id_foreign` (`prerequisite_parallel_id`);

--
-- Chỉ mục cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_fullname_unique` (`fullname`),
  ADD KEY `teachers_part_subject_id_foreign` (`part_subject_id`),
  ADD KEY `teachers_title_id_foreign` (`title_id`),
  ADD KEY `teachers_degree_id_foreign` (`degree_id`),
  ADD KEY `teachers_position_id_foreign` (`position_id`);

--
-- Chỉ mục cho bảng `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_teacher_id_foreign` (`teacher_id`),
  ADD KEY `users_student_id_foreign` (`student_id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category_subjects`
--
ALTER TABLE `category_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `class_majors`
--
ALTER TABLE `class_majors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `class_subjects`
--
ALTER TABLE `class_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `detail_scores`
--
ALTER TABLE `detail_scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `majors`
--
ALTER TABLE `majors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `part_subjects`
--
ALTER TABLE `part_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `prerequisite_parallels`
--
ALTER TABLE `prerequisite_parallels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `program_studies`
--
ALTER TABLE `program_studies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT cho bảng `program_trains`
--
ALTER TABLE `program_trains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `semester_years`
--
ALTER TABLE `semester_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `subject_prerequisite_parallels`
--
ALTER TABLE `subject_prerequisite_parallels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `titles`
--
ALTER TABLE `titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `class_majors`
--
ALTER TABLE `class_majors`
  ADD CONSTRAINT `class_majors_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_majors_major_id_foreign` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `class_subjects`
--
ALTER TABLE `class_subjects`
  ADD CONSTRAINT `class_subjects_semester_year_id_foreign` FOREIGN KEY (`semester_year_id`) REFERENCES `semester_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_subjects_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `detail_scores`
--
ALTER TABLE `detail_scores`
  ADD CONSTRAINT `detail_scores_class_subject_id_foreign` FOREIGN KEY (`class_subject_id`) REFERENCES `class_subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_scores_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `majors`
--
ALTER TABLE `majors`
  ADD CONSTRAINT `majors_part_subject_id_foreign` FOREIGN KEY (`part_subject_id`) REFERENCES `part_subjects` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `part_subjects`
--
ALTER TABLE `part_subjects`
  ADD CONSTRAINT `part_subjects_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `program_studies`
--
ALTER TABLE `program_studies`
  ADD CONSTRAINT `program_studies_category_subject_id_foreign` FOREIGN KEY (`category_subject_id`) REFERENCES `category_subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `program_studies_program_train_id_foreign` FOREIGN KEY (`program_train_id`) REFERENCES `program_trains` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `program_studies_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `program_trains`
--
ALTER TABLE `program_trains`
  ADD CONSTRAINT `program_trains_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `program_trains_major_id_foreign` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_class_major_id_foreign` FOREIGN KEY (`class_major_id`) REFERENCES `class_majors` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `subject_prerequisite_parallels`
--
ALTER TABLE `subject_prerequisite_parallels`
  ADD CONSTRAINT `subject_prerequisite_parallels_prerequisite_parallel_id_foreign` FOREIGN KEY (`prerequisite_parallel_id`) REFERENCES `prerequisite_parallels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_prerequisite_parallels_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_degree_id_foreign` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teachers_part_subject_id_foreign` FOREIGN KEY (`part_subject_id`) REFERENCES `part_subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teachers_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teachers_title_id_foreign` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

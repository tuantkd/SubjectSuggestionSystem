-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 07:42 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `subject_suggestion_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_subjects`
--

CREATE TABLE `category_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_subject_note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_subjects`
--

INSERT INTO `category_subjects` (`id`, `category_subject_name`, `category_subject_note`, `created_at`, `updated_at`) VALUES
(2, 'Tiên quyết', 'Là loại học phần sinh viên phải tích lũy trước mới được đăng ký học phần tiếp theo', '2020-12-03 20:22:23', '2020-12-03 20:22:23'),
(3, 'Bắt buộc', 'Là loại học phần sinh viên phải tích lũy', '2020-12-03 20:22:50', '2020-12-03 20:22:50'),
(4, 'Song hành', 'Là loại học phần mà sinh viên phải học trước hoặc học cùng  lúc', '2020-12-03 20:24:14', '2020-12-03 20:24:14'),
(5, 'Điều kiện', 'Là học phần mà sinh viên phải hoàn thành nhưng kết quả học phần không dùng để tính điểm trung bình tích lũy', '2020-12-06 22:52:40', '2020-12-06 22:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `class_majors`
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
-- Dumping data for table `class_majors`
--

INSERT INTO `class_majors` (`id`, `major_id`, `course_id`, `class_major_code`, `class_major_name`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'HG16V7A1', 'Lớp CNTT', '2020-11-28 01:15:16', '2020-11-29 23:29:11'),
(3, 4, 3, 'HG16V7A5', 'Lớp Khoa học máy tính', '2020-11-29 23:24:25', '2020-11-29 23:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `class_subjects`
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
-- Dumping data for table `class_subjects`
--

INSERT INTO `class_subjects` (`id`, `teacher_id`, `semester_year_id`, `subject_id`, `class_subject_code`, `class_subject_name`, `class_subject_note`, `created_at`, `updated_at`) VALUES
(2, 13, 3, 160, 'H02', 'Lớp lập trình web', 'Lớp học phần lập trình web học cơ bản', '2020-12-06 21:05:31', '2020-12-06 21:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_note` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_note`, `created_at`, `updated_at`) VALUES
(1, 'Khóa 44', 'Không có', '2020-11-27 00:11:17', '2020-11-27 00:11:17'),
(3, 'Khóa 45', 'Không có', '2020-11-27 00:40:45', '2020-11-27 00:40:45'),
(4, 'Khóa 43', 'Không có', '2020-11-29 23:36:26', '2020-11-29 23:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `degree_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`id`, `degree_name`, `degree_description`, `created_at`, `updated_at`) VALUES
(1, 'Giáo sư', 'Giáo sư hay Professor (viết tắt tiếng Anh là prof.) là một học hàm ở các trường đại học, các cơ sở giáo dục, các học viện và  trung tâm nghiên cứu ở hầu hết các quốc gia trên thế giới.', '2020-11-23 21:07:05', '2020-11-23 21:07:05'),
(2, 'Tiến sĩ', 'Tiến sĩ là một học vị do trường đại học cấp cho nghiên cứu sinh sau đại học, công nhận luận án nghiên cứu của họ đã đáp ứng tiêu chuẩn bậc tiến sĩ, là hoàn toàn mới chưa từng có ai làm qua. Thời gian để hoàn thành luận án tiến sĩ có thể từ 3 đến 5 năm hay dài hơn, tùy thuộc vào tình hình hay điều kiện khác nhau của từng nghiên cứu sinh, có thể làm bán thời hay toàn thời.', '2020-11-23 21:11:19', '2020-11-23 21:11:19'),
(3, 'Thạc sĩ', 'Thạc sĩ theo nghĩa đen là từ để chỉ người có học vấn rộng (thạc = rộng lớn; sĩ = người học hay nghiên cứu), nay dùng để chỉ một bậc học vị. Bậc học vị này khác nhau tùy theo hệ thống giáo dục: Học vị thạc sĩ trong tiếng Anh được gọi là Master\'s degree (tiếng Latin là magister), một học vị trên cấp cử nhân, dưới cấp tiến sĩ được cấp bởi trường đại học khi hoàn tất chương trình học chứng tỏ sự nắm vững kiến thức bậc cao của một lĩnh vực nghiên cứu hoặc ngành nghề.', '2020-11-23 21:12:55', '2020-11-23 21:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `department_description`, `created_at`, `updated_at`) VALUES
(1, 'Công nghệ Thông tin & Truyền thông', 'Được thành lập năm 1994, Khoa Công nghệ Thông tin và Truyền thông (CNTT&TT), một trong bảy khoa trọng điểm về lĩnh vực công nghệ thông tin của Việt Nam, đã không ngừng hoàn thiện và phát triển vững mạnh. Năm 2019, Khoa nhận được Huân chương lao động hạng ba của Chủ tịch nước. Sứ mệnh của Khoa là đào tạo, nghiên cứu khoa học và chuyển giao công nghệ trong lĩnh vực CNTT&TT. Tầm nhìn đến 2025, Khoa trở thành một trung tâm đào tạo và nghiên cứu khoa học đẳng cấp trong nước và khu vực Đông Nam Á về lĩnh vực CNTT&TT.', '2020-11-24 20:49:32', '2020-11-24 20:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `majors`
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
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `part_subject_id`, `major_name`, `major_note`, `created_at`, `updated_at`) VALUES
(2, 2, 'Công nghê thông tin - THUD', 'Ngành Công nghệ thông tin sinh viên có thể nghiên cứu chuyên sâu về Khoa học máy tính, Công nghệ phần mềm, Kỹ thuật máy tính, Hệ thống thông tin, Mạng máy tính và truyền thông, An toàn thông tin mạng.', '2020-11-27 01:17:49', '2020-11-27 23:55:59'),
(4, 7, 'Khoa học máy tính', 'Kiến thức cơ bản về ngành Khoa học máy tính như:\r\nKhoa học máy tính ứng dụng,\r\nGiới thiệu về chương trình Quản lý,\r\nGiới thiệu về hệ thống mạng lưới,\r\nGiới thiệu về Cơ sở dữ liệu,\r\nPhân tích & thiết kế hệ thống,\r\nNguyên tắc cơ bản của phát triển phần mềm,\r\nCác khái niệm toán học cho máy tính,\r\nHệ điều hành & Kiến trúc máy tính', '2020-11-29 23:27:53', '2020-11-29 23:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
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
(15, '2014_10_12_000000_create_users_table', 9),
(16, '2020_11_27_070041_create_courses_table', 10),
(17, '2020_11_27_075224_create_majors_table', 11),
(18, '2020_11_28_072803_create_class_majors_table', 12),
(20, '2020_11_29_083452_create_students_table', 13),
(22, '2020_12_02_023840_create_program_trains_table', 14),
(24, '2020_12_03_084646_create_semester_years_table', 15),
(25, '2020_12_03_094536_create_category_subjects_table', 16),
(27, '2020_12_04_070735_create_subjects_table', 17),
(28, '2020_12_05_032227_create_class_subjects_table', 18),
(29, '2020_12_07_052101_create_program_studies_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `part_subjects`
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
-- Dumping data for table `part_subjects`
--

INSERT INTO `part_subjects` (`id`, `department_id`, `part_subject_name`, `part_subject_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bộ môn Hệ Thống Thông Tin', 'Được thành lập năm 1990 với tên gọi là Bộ môn Tin học cùng với Trung tâm Điện tử - Tin học. Đến năm 1997 Bộ môn Tin học được đổi tên thành Bộ môn Hệ thống thông tin & Toán ứng dụng (tiền thân của Bộ môn Hệ thống thông tin). Sau này, do nhu cầu phát triển, Bộ môn Hệ thống thông tin & Toán ứng dụng được chia tách thành hai bộ môn: Bộ môn Hệ thống thông tin và Bộ môn Công nghệ phần mềm, rồi một lần nữa, năm 2010 lại được chia tách thành Bộ môn Hệ thống thông tin và Bộ môn Khoa học máy tính.', '2020-11-25 20:28:37', '2020-11-25 20:28:37'),
(2, 1, 'Bộ môn Công Nghệ Thông Tin', 'Bộ môn đảm nhận đào tạo kỹ sư ngành Công nghệ thông tin. Mục tiêu đào tạo là cung cấp cho sinh viên kiến thức và kỹ năng để đảm nhận vị trí nghề nghiệp khác nhau trong lĩnh vực công nghệ thông tin, thăng tiến đến vị trí lãnh đạo,  hoặc tiếp tục học cao hơn và có khả năng trở thành những nhà nghiên cứu, chuyên gia cao cấp trong lĩnh vực này. Sinh viên theo học ngành Công nghệ thông tin khi ra trường có thể có các cơ hội nghề nghiệp như là:  Nhà quản lý hệ thống Công nghệ thông tin, tư vấn và giám sát hệ thống công nghệ thông tin, nhà hoạch định chính sách hoặc phản biện về chính sách Công nghệ thông tin, kỹ sư phần mềm, lập trình viên hay đảm nhận các chức danh khác công ty phần mềm và  công ty về giải pháp công nghệ thông tin-truyền thông.', '2020-11-25 20:29:54', '2020-11-25 20:29:54'),
(7, 1, 'Bộ môn Khoa học máy tính', 'Khoa học Máy tính như:\r\nCấu trúc máy tính,\r\nHệ điều hành máy tính,\r\nNgôn ngữ lập trình phần mềm và phần cứng,\r\nTrí tuệ nhân tạo,\r\nBảo mật và an toàn máy tính,\r\nXử lý dữ liệu khối lượng lớn từ mạng internet và các mạng xã hội,\r\nThiết kế và phát triển các ứng dụng cho các thiết bị di động và môi trường web…', '2020-11-29 23:26:33', '2020-11-29 23:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position_name`, `position_description`, `created_at`, `updated_at`) VALUES
(2, 'Trưởng khoa', 'Là trưởng của 1 tập thể, trưởng khoa đóng vai trò hết sức quan trọng. Người lãnh đạo của 1 nhóm thành viên, làm việc dưới sự kiểm soát của Hiệu trưởng, Phó hiệu trưởng.', '2020-11-23 19:30:37', '2020-11-23 19:30:37'),
(3, 'Phó Trưởng khoa', 'Giúp trưởng khoa trong việc quản lý và thực hiện kế hoạch đào tạo, nghiên cứu khoa học, các hoạt động phong trào đoàn thể nhằm đảm bảo, sự phát triển toàn vẹn và bền vững của Khoa', '2020-11-23 19:41:48', '2020-11-23 19:41:48'),
(5, 'Trưởng bộ môn', 'Giúp Ban chủ nhiệm khoa trong việc quản lý và kế hoạch đào tạo, nghiên cứu khoa học, quản lý về chuyên môn, ra đề thi và lưu đề thi của bộ môn theo quy định của nhà Trường và của Khoa', '2020-11-23 23:49:12', '2020-11-23 23:49:12'),
(6, 'Phó Trưởng bộ môn', 'Phê duyệt các Đề cương chi tiết của GV trong Bộ môn hoặc của GV thỉnh giảng của Bộ môn trước khi đưa vào giảng dạy. Tổ chức cải tiến phương pháp giảng dạy – học tập trong Bộ môn. Quản lý trực tiếp các GV, CBVC, HSSV trong Bộ môn theo phân cấp của Hiệu trưởng. Được quyền triển khai các hoạt động Bộ môn học và công nghệ đã được Hiệu trưởng phê duyệt nhằm nâng cao chất lượng đào tạo và nghiên cứu Bộ môn.', '2020-11-23 23:52:09', '2020-11-23 23:52:09'),
(7, 'Giảng viên', 'Giảng viên là công chức chuyên môn đảm nhiệm việc giảng dạy và đào tạo ở bậc đại học, cao đẳng thuộc một chuyên ngành đào tạo của trường đại học hoặc cao đẳng. Giảng viên chính là công chức chuyên môn đảm nhiệm vai trò chủ chốt trong giảng dạy và đào tạo ở bậc đại học, cao đẳng và sau đại học, thuộc một chuyên ngành đào tạo của trường đại học, cao đẳng.', '2020-11-23 23:55:13', '2020-11-23 23:55:13'),
(8, 'Khác', 'Ngoài chức vụ đã liệt kê trong hệ thống', '2020-11-25 23:48:04', '2020-11-25 23:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `program_studies`
--

CREATE TABLE `program_studies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `program_train_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_studies`
--

INSERT INTO `program_studies` (`id`, `category_subject_id`, `subject_id`, `program_train_id`, `created_at`, `updated_at`) VALUES
(3, 5, 195, 1, '2020-12-06 23:21:28', '2020-12-06 23:21:28'),
(4, 5, 196, 1, '2020-12-06 23:41:30', '2020-12-06 23:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `program_trains`
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
-- Dumping data for table `program_trains`
--

INSERT INTO `program_trains` (`id`, `course_id`, `major_id`, `program_train_name`, `program_train_date_begin`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Chương trình đào tạo khóa 44', '2018-12-03', '2020-12-01 20:10:22', '2020-12-01 20:10:22'),
(3, 3, 4, 'Chương trình đào tạo khóa 45', '2019-09-16', '2020-12-03 01:30:13', '2020-12-03 01:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `position_id`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị', 2, '2020-11-24 01:58:45', '2020-11-24 01:58:45'),
(2, 'Giảng viên', 7, '2020-11-24 20:13:43', '2020-11-24 20:13:43'),
(3, 'Sinh viên', 8, '2020-11-25 23:48:21', '2020-11-25 23:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `semester_years`
--

CREATE TABLE `semester_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semester_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_begin` date NOT NULL,
  `date_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semester_years`
--

INSERT INTO `semester_years` (`id`, `semester_year`, `date_begin`, `date_end`, `created_at`, `updated_at`) VALUES
(3, '22020', '2021-01-25', '2021-06-10', '2020-12-03 02:31:50', '2020-12-03 02:31:50');

-- --------------------------------------------------------

--
-- Table structure for table `students`
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
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `class_major_id`, `student_code`, `student_fullname`, `student_birthday`, `student_sex`, `student_phone`, `student_email`, `student_address`, `student_avatar`, `created_at`, `updated_at`) VALUES
(62, 2, 'B1607049', 'Tạ Chí Bão', '35073', 'Nam', '0326958963', NULL, 'Vị Thủy - Hậu Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(63, 2, 'B1607050', 'Nguyễn Nam Bắc', '35409', 'Nam', '0326958964', NULL, 'Vị Thủy - Hậu Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(64, 2, 'B1607056', 'Nguyễn Văn Cõ', '36137', 'Nam', '0326958965', NULL, 'Vị Thủy - Hậu Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
(65, 2, 'B1607058', 'Nguyễn Thị Kiều Diễm', '5/25/1998', 'Nam', '0326958966', NULL, 'Vị Thủy - Hậu Giang', NULL, '2020-11-30 20:27:39', '2020-11-30 20:27:39'),
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
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_number_credit` int(11) DEFAULT NULL,
  `subject_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_code`, `subject_name`, `subject_number_credit`, `subject_status`, `created_at`, `updated_at`) VALUES
(140, 'CT180', 'Cơ sở dữ liệu', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(141, 'CT109', 'Phân tích và thiết kế hệ thống TT', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(142, 'CT311', 'Phương pháp NCKH', 2, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(143, 'CT181', 'Hệ thống thông tin doanh nghiệp', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(144, 'CT182', 'Ngôn ngữ mô hình hóa', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(145, 'CT187', 'Nền tảng công nghệ thông tin', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(146, 'CT183', 'Anh văn chuyên môn CNTT 1', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(147, 'CT184', 'Anh văn chuyên môn CNTT 2', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(148, 'CT185', 'Pháp văn chuyên môn CNTT 1', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(149, 'CT186', 'Pháp văn chuyên môn CNTT 2', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(150, 'CT201', 'Niên luận cơ sở ngành Khoa học máy tính', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(151, 'CT123', 'Quy hoạch tuyến tính - CNTT', 2, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(152, 'CT124', 'Phương pháp tính - CNTT', 2, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(153, 'CT127', 'Lý thuyết thông tin', 2, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(154, 'CT121', 'Tin học lý thuyết', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(155, 'CT332', 'Trí tuệ nhân tạo', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(156, 'CT202', 'Nguyên lý máy học', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(157, 'CT203', 'Đồ họa máy tính', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(158, 'CT204', 'An toàn và bảo mật thông tin', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(159, 'CT205', 'Quản trị cơ sở dữ liệu', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(160, 'CT428', 'Lập trình Web', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(161, 'CT251', 'Phát triển ứng dụng trên Windows', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(162, 'CT206', 'Phát triển ứng dụng trên Linux', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(163, 'CT207', 'Phát triển phần mềm mã nguồn mở', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(164, 'CT208', 'Niên luận ngành Khoa học máy tính', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(165, 'CT316', 'Xử lý ảnh', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(166, 'CT209', 'Đồ hoạ nâng cao', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(167, 'CT210', 'Thị giác máy tính', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(168, 'CT211', 'An ninh mạng', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(169, 'CT212', 'Quản trị mạng', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(170, 'CT213', 'Mật mã nâng cao', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(171, 'CT312', 'Khai khoáng dữ liệu', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(172, 'CT214', 'Máy học nâng cao', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(173, 'CT215', 'Hệ thống gợi Ý', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(174, 'CT125', 'Mô phỏng', 2, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(175, 'CT126', 'Lý thuyết xếp hàng', 2, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(176, 'CT330', 'Hệ thống Multi-Agent', 2, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(177, 'CT446', 'Ngôn ngữ lập trình mô phỏng', 3, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(178, 'CT455', 'Thực tập thực tế - KHMT', 2, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(179, 'CT595', 'Luận văn tốt nghiệp - KHMT', 10, 0, '2020-12-04 01:58:18', '2020-12-04 01:58:18'),
(191, 'QP003', 'Giáo dục quốc phòng - An ninh 1 (*)', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(192, 'QP004', 'Giáo dục quốc phòng - An ninh 2 (*)', 2, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(193, 'QP005', 'Giáo dục quốc phòng - An ninh 3 (*)', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(194, 'TC100', 'Giáo dục thể chất 1+2+3 (*)', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(195, 'XH023', 'Anh văn căn bản 1 (*)', 4, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(196, 'XH024', 'Anh văn căn bản 2 (*)', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(197, 'XH025', 'Anh văn căn bản 3 (*)', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(198, 'XH031', 'Anh văn tăng cường 1 (*)', 4, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(199, 'XH032', 'Anh văn tăng cường 2 (*)', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(200, 'XH033', 'Anh văn tăng cường 3 (*)', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(201, 'XH004', 'Pháp văn căn bản 1 (*)', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(202, 'XH005', 'Pháp văn căn bản 2 (*)', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(203, 'XH006', 'Pháp văn căn bản 3 (*)', 4, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(204, 'FL004', 'Pháp văn tăng cường 1 (*)', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(205, 'FL005', 'Pháp văn tăng cường 2 (*)', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(206, 'FL006', 'Pháp văn tăng cường 3 (*)', 4, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(207, 'TN033', 'Tin học căn bản (*)', 1, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(208, 'TN034', 'TT.Tin học căn bản (*)', 2, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(209, 'ML009', 'Những Ng.Lý CB của CN Mác-Lênin 1', 2, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(210, 'ML010', 'Những Ng.Lý CB của CN Mác-Lênin 2', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(211, 'ML006', 'Tư tưởng Hồ Chí Minh', 2, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(212, 'ML011', 'Đường lối cách mạng của ĐCSVN', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(213, 'KL001', 'Pháp luật đại cương', 2, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(214, 'ML007', 'Logic học đại cương', 2, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(215, 'XH028', 'Xã hội học đại cương', 2, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(216, 'XH011', 'Cơ sở văn hóa Việt Nam', 2, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(217, 'XH012', 'Tiếng Việt thực hành', 2, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(218, 'XH014', 'Văn bản và lưu trữ học đại cương', 2, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(219, 'KN001', 'Kỹ năng mềm', 2, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(220, 'TN001', 'Vi - Tích phân A1', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(221, 'TN002', 'Vi - Tích phân A2', 4, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(222, 'TN010', 'Xác suất thống kê', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(223, 'TN012', 'Đại số tuyến tính và hình học', 4, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(224, 'CT101', 'Lập trình căn bản A', 4, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(225, 'CT172', 'Toán rời rạc', 4, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(226, 'CT103', 'Cấu trúc dữ liệu', 4, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(227, 'CT173', 'Kiến trúc máy tính', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(228, 'CT178', 'Nguyên lý hệ điều hành', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(229, 'CT179', 'Quản trị hệ thống', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(230, 'CT112', 'Mạng máy tính', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(231, 'CT171', 'Nhập môn công nghệ phần mềm', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(232, 'CT176', 'Lập trình hướng đối tượng', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(233, 'CT175', 'Lý thuyết đồ thị', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55'),
(234, 'CT174', 'Phân tích và thiết kế thuật toán', 3, 0, '2020-12-06 23:06:55', '2020-12-06 23:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
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
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `part_subject_id`, `title_id`, `degree_id`, `position_id`, `fullname`, `birthday`, `sex`, `phone`, `email`, `address`, `avatar`, `created_at`, `updated_at`) VALUES
(4, NULL, NULL, NULL, 2, 'Phạm Bá Hùng', '2020-11-26', 'Nam', '032659896', 'bahung@gmail.com', 'Cần Thơ', '1606379491-avatar04.png', '2020-11-26 01:31:31', '2020-11-26 01:31:31'),
(12, 1, 6, 3, 8, 'Trần Thanh Điện', '1979-11-27', 'Nam', '0236958963', 'thanhdien@gmail.com', 'Sóc Trăng', '1606448709-avatar5.png', '2020-11-26 20:45:09', '2020-11-26 20:45:09'),
(13, 1, 5, 2, 7, 'Nguyễn Thanh Hải', '1989-11-30', 'Nam', '0325689963', 'thanhhai@gmail.com', 'Cần Thơ', NULL, '2020-11-29 23:17:22', '2020-11-29 23:17:22'),
(14, 2, 6, 3, 7, 'Cao Hoàng Tiến', '1978-12-15', NULL, '0235896369', 'hoangtien@gmail.com', 'Cầu Móng - Hậu Giang', NULL, '2020-12-05 01:30:40', '2020-12-05 01:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `title_name`, `title_description`, `created_at`, `updated_at`) VALUES
(2, 'Giáo sư', 'Giáo sư Việt Nam hoặc đơn giản là Giáo sư (professor) là tên gọi một học hàm, hoặc chức danh hoặc chức vụ khoa học dành cho các cán bộ giảng dạy cao cấp ở các bộ môn thuộc trường đại học hoặc viện nghiên cứu, được nhà nước Việt Nam phong tặng vì đáp ứng đủ các tiêu chí do luật định trong các hoạt động (lĩnh vực) đào tạo và nghiên cứu khoa học.', '2020-11-24 00:20:01', '2020-11-24 00:20:01'),
(3, 'Phó Giáo sư', 'Phó Giáo sư (associate professor) là một chức danh khoa học dành cho người nghiên cứu và giảng dạy bậc đại học, sau đại học nhưng ở cấp thấp hơn giáo sư (professor). Đầu thập kỷ 80 của thế kỷ XX, Phó Giáo sư còn được gọi là \"Giáo sư cấp I\". Nhưng thực tế thường bị \"mất\" đi cái đuôi \"cấp I\" nên để tránh nhầm lẫn với Giáo sư (professor), từ năm 1988 đã có quy định thống nhất chỉ dùng chức danh \"Phó Giáo sư\", mà không dùng \"Giáo sư cấp I\" nữa.', '2020-11-24 00:21:51', '2020-11-24 00:21:51'),
(5, 'Tiến sĩ', 'Tiến sĩ là một học vị do trường đại học cấp cho nghiên cứu sinh sau đại học, công nhận luận án nghiên cứu của họ đã đáp ứng tiêu chuẩn bậc tiến sĩ, là hoàn toàn mới chưa từng có ai làm qua.', '2020-11-24 00:29:12', '2020-11-24 00:29:12'),
(6, 'Thạc sĩ', 'Thạc sĩ  chỉ người có học vấn rộng nay dùng để chỉ một bậc học vị. Bậc Chức Danh này khác nhau tùy theo hệ thống giáo dục, Một học vị trên cấp cử nhân, dưới cấp tiến sĩ được cấp bởi trường đại học khi hoàn tất chương trình học chứng tỏ sự nắm vững kiến thức bậc cao của một lĩnh vực nghiên cứu hoặc ngành nghề', '2020-11-24 00:31:06', '2020-11-24 00:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `teacher_id`, `role_id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 4, 1, 'bahung', '$2y$10$e09Q1cJFe/DA3DLajYAQoe.IBVKauEvX0N7k17iSX.b0rTug5V80y', NULL, '2020-11-26 01:31:40', '2020-11-26 01:31:40'),
(9, 12, 1, 'thanhdien', '$2y$10$6XGkqC2YDcQ4.ontZEjE9OHY7ojfwTwKWJYsPrWzftI5EnuQts0mu', 'bDhJ4jETKqFQQXTm6R7Lq64uetfIYeqZ3ba9vFJV7echTOTDdBrzaa5tMXY5', '2020-11-26 20:45:22', '2020-11-26 23:01:30'),
(10, 13, 2, 'thanhhai', '$2y$10$XDWUWNg/A8ajCziPSegMR.sd/qVEuZJ5178G37cYpLfa/8Z3Tmkma', NULL, '2020-11-29 23:17:32', '2020-11-29 23:17:32'),
(11, 14, 2, 'hoangtien', '$2y$10$6Lp2eGhqNvHy9Sk.tqVsMuBc/G8ZoOpdekIjXJA2q/8npkP/j3s3y', NULL, '2020-12-05 01:30:52', '2020-12-05 01:30:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_subjects`
--
ALTER TABLE `category_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_majors`
--
ALTER TABLE `class_majors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_majors_class_major_code_unique` (`class_major_code`),
  ADD KEY `class_majors_major_id_foreign` (`major_id`),
  ADD KEY `class_majors_course_id_foreign` (`course_id`);

--
-- Indexes for table `class_subjects`
--
ALTER TABLE `class_subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_subjects_class_subject_code_unique` (`class_subject_code`),
  ADD KEY `class_subjects_teacher_id_foreign` (`teacher_id`),
  ADD KEY `class_subjects_semester_year_id_foreign` (`semester_year_id`),
  ADD KEY `class_subjects_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_course_name_unique` (`course_name`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_department_name_unique` (`department_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `majors_major_name_unique` (`major_name`),
  ADD KEY `majors_part_subject_id_foreign` (`part_subject_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part_subjects`
--
ALTER TABLE `part_subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `part_subjects_part_subject_name_unique` (`part_subject_name`),
  ADD KEY `part_subjects_department_id_foreign` (`department_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_studies`
--
ALTER TABLE `program_studies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_studies_category_subject_id_foreign` (`category_subject_id`),
  ADD KEY `program_studies_subject_id_foreign` (`subject_id`),
  ADD KEY `program_studies_program_train_id_foreign` (`program_train_id`);

--
-- Indexes for table `program_trains`
--
ALTER TABLE `program_trains`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `program_trains_course_id_unique` (`course_id`),
  ADD KEY `program_trains_major_id_foreign` (`major_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_position_id_foreign` (`position_id`);

--
-- Indexes for table `semester_years`
--
ALTER TABLE `semester_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_student_code_unique` (`student_code`),
  ADD KEY `students_class_major_id_foreign` (`class_major_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_fullname_unique` (`fullname`),
  ADD KEY `teachers_part_subject_id_foreign` (`part_subject_id`),
  ADD KEY `teachers_title_id_foreign` (`title_id`),
  ADD KEY `teachers_degree_id_foreign` (`degree_id`),
  ADD KEY `teachers_position_id_foreign` (`position_id`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_teacher_id_foreign` (`teacher_id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_subjects`
--
ALTER TABLE `category_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class_majors`
--
ALTER TABLE `class_majors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class_subjects`
--
ALTER TABLE `class_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `part_subjects`
--
ALTER TABLE `part_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `program_studies`
--
ALTER TABLE `program_studies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `program_trains`
--
ALTER TABLE `program_trains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semester_years`
--
ALTER TABLE `semester_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_majors`
--
ALTER TABLE `class_majors`
  ADD CONSTRAINT `class_majors_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_majors_major_id_foreign` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `class_subjects`
--
ALTER TABLE `class_subjects`
  ADD CONSTRAINT `class_subjects_semester_year_id_foreign` FOREIGN KEY (`semester_year_id`) REFERENCES `semester_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_subjects_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `majors`
--
ALTER TABLE `majors`
  ADD CONSTRAINT `majors_part_subject_id_foreign` FOREIGN KEY (`part_subject_id`) REFERENCES `part_subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `part_subjects`
--
ALTER TABLE `part_subjects`
  ADD CONSTRAINT `part_subjects_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `program_studies`
--
ALTER TABLE `program_studies`
  ADD CONSTRAINT `program_studies_category_subject_id_foreign` FOREIGN KEY (`category_subject_id`) REFERENCES `category_subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `program_studies_program_train_id_foreign` FOREIGN KEY (`program_train_id`) REFERENCES `program_trains` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `program_studies_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `program_trains`
--
ALTER TABLE `program_trains`
  ADD CONSTRAINT `program_trains_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `program_trains_major_id_foreign` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_class_major_id_foreign` FOREIGN KEY (`class_major_id`) REFERENCES `class_majors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_degree_id_foreign` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teachers_part_subject_id_foreign` FOREIGN KEY (`part_subject_id`) REFERENCES `part_subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teachers_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teachers_title_id_foreign` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

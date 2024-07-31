-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th7 31, 2024 lúc 03:49 PM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `asignment-web4013-wd18039`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Đời sống', 1, NULL, NULL),
(2, 'Thể thao', 1, NULL, NULL),
(3, 'Sức khỏe', 1, NULL, '2024-07-15 11:43:17'),
(4, 'Du lịch', 1, NULL, NULL),
(5, 'Giải trí', 1, '2024-07-27 15:54:46', '2024-07-27 15:54:46'),
(6, 'Khoa học', 1, '2024-07-27 15:55:01', '2024-07-27 15:55:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị', NULL, NULL),
(2, 'Người dùng', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_new`
--

CREATE TABLE `detail_new` (
  `id` bigint UNSIGNED NOT NULL,
  `main_content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `order_index` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `new_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detail_new`
--

INSERT INTO `detail_new` (`id`, `main_content`, `order_index`, `created_at`, `updated_at`, `new_id`) VALUES
(6, 'Điểm sôi của nước là điểm nhiệt tại đó nhiệt độ và áp suất đủ để chất lỏng biến thành hơi. Điểm sôi của nước đạt được khi áp suất hơi nước bằng với áp suất xung quanh. Ở điều kiện bình thường, áp suất không khí là 1 atm thì điểm sôi của nước là 100 độ C. Khi thêm muối vào nước (trước khi sôi) sẽ có nồng độ các chất tan cao hơn nước tinh khiết vì thế làm thay đổi tính chất lý hóa trong đó có nhiệt độ sôi. Tùy thuộc lượng muối thêm vào mà nhiệt độ sôi có thể tăng một vài độ. Chú ý cho muối vào nước trước khi bật bếp.', 1, '2024-07-27 16:49:59', '2024-07-27 16:49:59', 23),
(7, 'Trong rau củ quả nói chung đều có chất diệp lục Chlorophyll khi tác dụng với axit, kiềm dưới tác động bởi nhiệt độ sẽ tạo màu khác nhau như vàng úa, xanh sẫm hoặc nâu xỉn. Vì thế cần rút gọn thời gian luộc rau để hạn chế các phản ứng xảy ra. Một trong những kinh nghiệm dân gian từ xưa là nên cho nhúm muối nhỏ vào nồi nước. Lúc này muối làm tăng nhiệt độ sôi nên giúp rau chín nhanh và không bị thất thoát vitamin. Ngoài ra, các ion Na+, K+ trong muối sẽ có tác dụng làm giảm sự hoạt động của ion axit H+ (có sẵn trong nước) nên rau sẽ xanh hơn.', 2, '2024-07-27 16:50:12', '2024-07-27 16:50:12', 23),
(8, 'Chú ý tránh cho rau vào khi nước chưa sôi hoặc đang luộc thiếu nước thêm nước lạnh vào. Như vậy kéo dài thời gian đun nấu và làm vỡ các tế bào thực vật cũng như tăng lượng axit trong nước khiến rau vàng úa, xỉn màu.', 3, '2024-07-27 16:50:35', '2024-07-27 16:50:35', 23),
(9, 'Nhà văn Băng Sơn trong cuốn \'\'Thú ăn chơi của người Hà Nội\'\' từng đề cập, nhiều gia đình các bà các mẹ kỹ tính còn dạy con cái khi gắp ra đĩa nên đặt từng cọng song song, thứ tự hàng ngang rồi dọc để khi ăn dễ dàng hơn. Ông nhấn mạnh, biết làm món luộc, biết sắp xếp đĩa luộc, đâu phải dễ làm sao để toát lên nét tinh khiết, ngon lành, mềm mại, có màu sắc ngon mắt ngon miệng thì người nội trợ \'\'là viên tướng cầm quân\'\'.', 4, '2024-07-27 16:51:34', '2024-07-27 16:51:34', 23);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(57, '2024_07_12_221958_create_detal_new_table', 1),
(58, '2024_07_12_223124_alter_detal_new_table', 1),
(61, '2014_10_12_000000_create_users_table', 2),
(62, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(63, '2019_08_19_000000_create_failed_jobs_table', 2),
(64, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(65, '2024_07_03_145546_create_user_status_table', 2),
(66, '2024_07_03_145621_create_departments_table', 2),
(67, '2024_07_03_150512_alter_users_table', 2),
(68, '2024_07_11_194450_create_categories_table', 2),
(69, '2024_07_12_221916_create_news_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `title_new` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `short_content` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `status_new` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title_new`, `image`, `short_content`, `category_id`, `status_new`, `created_at`, `updated_at`) VALUES
(23, 'Tại sao cho muối khi luộc rau?', '\"1722095898_new1.jpg\"', 'Muối ngoài việc làm cho món rau luộc thêm đậm đà, còn có thể giúp giữ cho rau sau khi luộc xong có màu xanh bắt mắt.', 1, 1, '2024-07-27 15:58:18', '2024-07-27 15:58:18'),
(24, '5 đồ gia dụng được quảng cáo thổi phồng nhất', '\"1722095953_new2.jpg\"', 'Xem quảng cáo trên mạng nhiều người mê những món đồ gia dụng thông minh, tiện lợi nhưng đem về dùng chỉ thấy bực mình vì nhiều thứ chẳng khác gì món đồ chơi.', 1, 1, '2024-07-27 15:59:13', '2024-07-27 15:59:13'),
(25, 'Khóa tiếng Anh 4.0 cho lãnh đạo, cam kết thành thạo sau 6 tháng', '\"1722096015_new3.png\"', 'Giờ học linh hoạt 24/24, học 1 - 1 với giáo viên Âu, Mỹ, lộ trình xây dựng theo mục tiêu.', 1, 1, '2024-07-27 16:00:15', '2024-07-27 16:00:15'),
(26, 'Những khoảnh khắc ấn tượng tại lễ khai mạc Olympic 2024', '\"1722096081_new4.jpg\"', 'Lễ khai mạc Olympic Paris 2024 thành công với nhiều màn trình diễn ấn tượng, bất chấp cơn mưa nặng hạt và sự cố đường sắt cao tốc.', 2, 1, '2024-07-27 16:01:21', '2024-07-27 16:01:21'),
(27, 'VĐV rút khỏi Olympic Paris 2024 vì ngược đãi ngựa', '\"1722098083_new5.jpg\"', 'Charlotte Dujardin, VĐV cưỡi ngựa từng giành ba HC vàng Olympic cho Anh quốc, rút lui khỏi Thế vận hội Paris...', 2, 1, '2024-07-27 16:34:43', '2024-07-27 16:34:43'),
(28, 'Dubai chi 600 triệu USD mở rộng trung tâm mua sắm lớn nhất thế giới', '\"1722098153_new6.png\"', 'Trung tâm mua sắm Dubai Mall với diện tích lớn nhất thế giới đón 105 triệu lượt khách năm 2023 tiếp tục được mở rộng thêm diện tích.', 4, 1, '2024-07-27 16:35:53', '2024-07-27 16:35:53'),
(29, 'Phan Mạnh Quỳnh viết ca khúc tưởng niệm các anh hùng liệt sĩ', '\"1722098286_new7.jpg\"', 'Phan Mạnh Quỳnh viết \"Đưa anh về\" dựa trên chuyện có thật về một người em gái dành cả đời tìm mộ các anh trai hy sinh trên chiến trường.', 5, 1, '2024-07-27 16:38:06', '2024-07-27 16:38:06'),
(30, 'Vali sale chỉ từ 599.000 đồng cùng quà tặng lên tới 1 triệu đồng', '\"1722098459_new8.jpeg\"', 'Săn vali giá 99.000 đồng, mua nhiều giảm thêm tới 1 triệu đồng tại \'Đại tiệc', 5, 1, '2024-07-27 16:40:59', '2024-07-27 16:40:59'),
(31, 'Tập gym có gây yếu sinh lý đàn ông?', '\"1722098501_new9.jpg\"', 'Nhiều người cho rằng đàn ông tập gym dễ bị suy giảm sinh lý. Điều này có phải sự thật? (Hùng, 28 tuổi, TP HCM)', 3, 1, '2024-07-27 16:41:41', '2024-07-27 16:41:41'),
(32, 'Paris bị khách nhà giàu quay lưng dịp Olympic', '\"1722098571_new10.jpg\"', 'Tỷ lệ đặt phòng tại các khách sạn giá từ 800 euro trở lên giảm 20-50% so với cùng kỳ năm ngoái do nhiều người e ngại giao thông tắc nghẽn dịp Olympic.', 4, 1, '2024-07-27 16:42:51', '2024-07-27 16:42:51'),
(33, 'Những động vật gây hại chiến thắng biến đổi khí hậu', '\"1722098771_new11.jpg\"', 'Biến đổi khí hậu khiến mùa đông trở nên ấm hơn, tạo điều kiện lý tưởng cho gián, chuột, muỗi… xuất hiện ở những khu vực địa lý mới.', 6, 1, '2024-07-27 16:46:11', '2024-07-27 16:46:11'),
(34, 'Người Ai Cập có thể dùng thang thủy lực để xây kim tự tháp', '\"1722098838_new12.jpg\"', 'Người Ai Cập cổ đại có thể dựa vào một hầm thẳng đứng chứa đầy nước cùng với mạng lưới kênh dẫn nước và cấu trúc lọc để xây dựng kim tự tháp bậc thang Djoser 4.500 năm trước.', 6, 1, '2024-07-27 16:47:18', '2024-07-27 16:47:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb3_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `change_password_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `status_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `avatar`, `username`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `login_at`, `change_password_at`, `created_at`, `updated_at`, `department_id`, `status_id`) VALUES
(1, NULL, 'admin', 'Admin', 'admin@gmail.com', NULL, '$2y$12$wv.vfHniHESzYbdpVW18z.wS7nrWV1IWsdm4dgzSlaDzHtKU9ECrC', NULL, NULL, NULL, NULL, NULL, 1, 1),
(8, '\"1721747870_avt.jpeg\"', 'simon', 'Đặng Tài Luân', 'luan2334@gmail.com', NULL, '$2y$12$nAXulzdmv0/MFfyQRdMcl.RCJogq3sfpAUsKZrWTFtx/NqPGT5Q3G', NULL, NULL, NULL, '2024-07-23 15:17:51', '2024-07-23 15:17:51', 2, 1),
(9, NULL, 'nguyenduydung', 'Nguyễn Duy Dũng', 'nguyenduydung1809@gmail.com', NULL, '$2y$12$P3dZLCYQJoxJFhmxxn.B4umTPqNmtZmyibWPm/CzdfslCcH9gtrF2', NULL, NULL, '2024-07-27 15:02:42', '2024-07-23 15:49:34', '2024-07-27 15:02:42', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_status`
--

CREATE TABLE `user_status` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_status`
--

INSERT INTO `user_status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hoạt động', NULL, NULL),
(2, 'Tạm khóa', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `detail_new`
--
ALTER TABLE `detail_new`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_news_id_foreign` (`new_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_department_id_foreign` (`department_id`),
  ADD KEY `users_status_id_foreign` (`status_id`);

--
-- Chỉ mục cho bảng `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `detail_new`
--
ALTER TABLE `detail_new`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `users_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `user_status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

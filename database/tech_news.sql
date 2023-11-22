-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2023 lúc 11:30 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tech_news`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `fullname`, `username`, `password`, `email`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Bảo Sơn', 'son', 'e10adc3949ba59abbe56e057f20f883e', 'toilaone12@gmail.com', 0, '2023-11-06 16:08:46', '2023-11-06 16:08:46'),
(7, 'Nga', 'nga', 'aadc03fecca9b5cc2fd64b333cb0875e', 'baooson3005@gmail.com', 1, '2023-11-21 15:37:33', '2023-11-21 15:56:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(10) UNSIGNED NOT NULL,
  `name_category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_parent` int(11) NOT NULL,
  `slug_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `name_category`, `id_parent`, `slug_category`, `created_at`, `updated_at`) VALUES
(1, 'Đời sống', 0, 'doi-song', '2023-11-10 16:50:26', '2023-11-16 15:35:29'),
(2, 'Thể thao', 0, 'the-thao', '2023-11-10 16:51:03', '2023-11-10 17:37:25'),
(3, 'Thời sự', 0, 'thoi-su', '2023-11-10 17:14:49', '2023-11-10 17:14:49'),
(4, 'Chính trị', 3, 'chinh-tri', '2023-11-10 17:19:32', '2023-11-10 17:19:32'),
(6, 'Dân sinh', 3, 'dan-sinh', '2023-11-10 17:44:04', '2023-11-10 17:44:04'),
(7, 'Ý kiến', 0, 'y-kien', '2023-11-14 15:52:54', '2023-11-16 15:36:49'),
(8, 'Thế giới', 0, 'the-gioi', '2023-11-14 15:53:14', '2023-11-14 15:53:14'),
(9, 'Kinh doanh', 0, 'kinh-doanh', '2023-11-14 15:53:29', '2023-11-14 15:53:29'),
(10, 'Bất động sản', 0, 'bat-dong-san', '2023-11-14 15:53:38', '2023-11-14 15:53:38'),
(11, 'Khoa học', 0, 'khoa-hoc', '2023-11-14 15:53:45', '2023-11-14 15:53:45'),
(12, 'Giải trí', 0, 'giai-tri', '2023-11-14 15:54:00', '2023-11-14 15:54:00'),
(13, 'Pháp luật', 0, 'phap-luat', '2023-11-14 15:54:10', '2023-11-14 15:54:10'),
(14, 'Lao động việc làm', 3, 'lao-dong-viec-lam', '2023-11-15 15:47:01', '2023-11-15 15:47:01'),
(15, 'Giao thông', 3, 'giao-thong', '2023-11-15 15:47:33', '2023-11-15 15:47:33'),
(16, 'Tư liệu', 8, 'tu-lieu', '2023-11-15 15:48:08', '2023-11-15 15:48:08'),
(17, 'Người Việt 5 Châu', 8, 'nguoi-viet-5-chau', '2023-11-15 15:49:01', '2023-11-15 15:49:01'),
(18, 'Phân tích', 8, 'phan-tich', '2023-11-15 15:49:13', '2023-11-15 15:49:13'),
(19, 'Quân sự', 8, 'quan-su', '2023-11-15 15:49:25', '2023-11-15 15:49:25'),
(20, 'Bóng đá', 2, 'bong-da', '2023-11-15 15:49:48', '2023-11-15 15:49:48'),
(21, 'Lịch thi đấu', 2, 'lich-thi-dau', '2023-11-15 15:49:55', '2023-11-15 15:49:55'),
(22, 'Tennis', 2, 'tennis', '2023-11-15 15:50:00', '2023-11-15 15:50:00'),
(23, 'Marathon', 2, 'marathon', '2023-11-15 15:50:20', '2023-11-15 15:50:20'),
(24, 'Chính sách', 10, 'chinh-sach', '2023-11-15 15:50:38', '2023-11-15 15:50:38'),
(25, 'Thị trường', 10, 'thi-truong', '2023-11-15 15:50:44', '2023-11-15 15:50:44'),
(26, 'Không gian sống', 10, 'khong-gian-song', '2023-11-15 15:50:53', '2023-11-15 15:50:53'),
(27, 'Dự án', 10, 'du-an', '2023-11-15 15:51:02', '2023-11-15 15:51:02'),
(28, 'Giới sao', 12, 'gioi-sao', '2023-11-15 15:51:39', '2023-11-15 15:51:39'),
(29, 'Sách', 12, 'sach', '2023-11-15 15:51:46', '2023-11-15 15:51:46'),
(30, 'Thời trang', 12, 'thoi-trang', '2023-11-15 15:52:10', '2023-11-15 15:52:10'),
(31, 'Làm đẹp', 12, 'lam-dep', '2023-11-15 15:52:18', '2023-11-15 15:52:18'),
(32, 'Khoa học trong nước', 11, 'khoa-hoc-trong-nuoc', '2023-11-15 16:16:33', '2023-11-15 16:16:33'),
(33, 'Tin tức', 11, 'tin-tuc', '2023-11-15 16:16:43', '2023-11-15 16:16:43'),
(34, 'Phát minh', 11, 'phat-minh', '2023-11-15 16:16:49', '2023-11-15 16:16:49'),
(35, 'Ứng dụng', 11, 'ung-dung', '2023-11-15 16:16:56', '2023-11-15 16:16:56'),
(36, 'Thế giới tự nhiên', 11, 'the-gioi-tu-nhien', '2023-11-15 16:17:06', '2023-11-15 16:17:06'),
(37, 'Hồ sơ phá án', 13, 'ho-so-pha-an', '2023-11-15 16:17:22', '2023-11-15 16:17:22'),
(38, 'Quốc tế', 9, 'quoc-te', '2023-11-15 16:17:49', '2023-11-15 16:17:49'),
(39, 'Doanh nghiệp', 9, 'doanh-nghiep', '2023-11-15 16:18:00', '2023-11-15 16:18:00'),
(40, 'Chứng khoán', 9, 'chung-khoan', '2023-11-15 16:18:06', '2023-11-15 16:18:06'),
(41, 'Nhịp sống', 1, 'nhip-song', '2023-11-16 15:35:45', '2023-11-16 15:35:45'),
(42, 'Tổ ấm', 1, 'to-am', '2023-11-16 15:35:50', '2023-11-16 15:35:50'),
(43, 'Tiêu dùng', 1, 'tieu-dung', '2023-11-16 15:35:57', '2023-11-16 15:35:57'),
(44, 'Thời sự', 7, 'thoi-su', '2023-11-16 15:37:03', '2023-11-16 15:37:03'),
(45, 'Đời sống', 7, 'doi-song', '2023-11-16 15:37:09', '2023-11-16 15:37:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_reply` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id_comment`, `id_user`, `id_news`, `comment`, `id_reply`, `created_at`, `updated_at`) VALUES
(1, 8, 9, 'avb', 0, '2023-11-19 08:57:05', '2023-11-19 08:57:05'),
(2, 8, 1, 'troi oi', 0, '2023-11-22 10:11:46', '2023-11-22 10:11:46'),
(3, 8, 1, 'troi oi', 0, '2023-11-22 10:11:50', '2023-11-22 10:11:50'),
(4, 8, 1, 'troi oi', 0, '2023-11-22 10:11:56', '2023-11-22 10:11:56'),
(5, 1, 1, 'cam on', 2, '2023-11-22 10:22:12', '2023-11-22 10:22:12');

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
(1, '2022_07_13_105244_create_admin_table', 1),
(2, '2022_07_14_100611_create_news', 1),
(3, '2022_07_14_100636_create_tag', 1),
(4, '2022_07_19_100915_create_user', 1),
(5, '2022_07_19_101511_create_comment', 1),
(6, '2023_11_06_151900_create_category', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id_news` int(10) UNSIGNED NOT NULL,
  `id_category` int(11) NOT NULL,
  `image_news` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_news` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_news` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary_news` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_news` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_comments` int(11) NOT NULL,
  `number_views` int(11) NOT NULL,
  `is_hot` tinyint(4) NOT NULL,
  `tag_news` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id_news`, `id_category`, `image_news`, `title_news`, `slug_news`, `summary_news`, `content_news`, `number_comments`, `number_views`, `is_hot`, `tag_news`, `created_at`, `updated_at`) VALUES
(1, 6, '/storage/news/dan_sinh-233507.jpg', 'Hàng chục nghìn hộ ở TP Thủ Đức và Nam Sài Gòn bị cắt nước', 'hang-chuc-nghin-ho-o-tp-thu-duc-va-nam-sai-gon-bi-cat-nuoc', 'Để bảo trì tủ điện nhà máy nước BOO Thủ Đức, hàng chục nghìn hộ ở quận 7, 8, Nhà Bè, Cần Giờ, Bình Chánh, TP Thủ Đức sẽ bị cắt nước, nước yếu đêm cuối tuần.', '<p>Để bảo trì tủ điện nhà máy nước BOO Thủ Đức, hàng chục nghìn hộ ở quận 7, 8, Nhà Bè, Cần Giờ, Bình Chánh, TP Thủ Đức sẽ bị cắt nước, nước yếu đêm cuối tuần.</p>\r\n\r\n<p>Nước sẽ bị cắt trong 3 giờ, từ 23h ngày 11 đến 2h ngày 12/11. Trong đó, khu vực bị cắt nước toàn bộ gồm: quận 7 (trừ Khu chế xuất Tân Thuận), huyện Nhà Bè và Cần Giờ. Quận 8 gồm các phường: 1, 2, 3, 4, 5, 8, 9.</p>\r\n\r\n<p>11 khu vực ở TP Thủ Đức cũng bị cắt nước trong thời gian bảo trì, gồm: phường An Phú, Bình An, Bình Khánh, An Khánh, Thủ Thiêm, An Lợi Đông, Phước Bình, Phước Long A, Phước Long B, Tăng Nhơn Phú B và Khu Công nghệ cao. Tại Bình Chánh, nước sẽ cắt toàn bộ ở xã Bình Hưng và xã Phong Phú bị nước yếu.</p>\r\n\r\n<p><img alt=\"Công nhân kiểm tra hệ thống cấp nước ở nhà máy BOO Thủ Đức. Ảnh: Sawaco\" src=\"https://i1-vnexpress.vnecdn.net/2023/11/10/Co-ng-nha-n-Nha-ma-y-nu-o-c-BO-8241-3756-1699589144.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=oNgkZoGp8cAd50nReRmqnw\" /></p>\r\n\r\n<p style=\"text-align:center\">Công nhân kiểm tra hệ thống cấp nước ở nhà máy BOO Thủ Đức. Ảnh:&nbsp;<em>Sawaco</em></p>\r\n\r\n<p>Tổng Công ty Cấp nước Sài Gòn (Sawaco), cho biết khi hệ thống cấp nước hoạt động lại, một số nơi xa nguồn có thể sẽ phục hồi chậm hơn dự kiến. Đơn vị sẽ điều tiết mạng lưới cấp nước, đồng thời tăng cường tiếp nước bằng xe bồn đến các nơi quan trọng bị ảnh hưởng.</p>\r\n\r\n<p>Nhà máy nước BOO Thủ Đức khánh thành năm 2010 với tổng mức đầu tư 1.600 tỷ đồng, cung cấp nước sạch cho gần một triệu người ở các quận huyện phía Đông và Nam của TP HCM. Công trình có trạm bơm nước thô công suất 315.000 m3/ngày; nhà máy nước xử lý nước công suất 300.000 m3/ngày; tuyến ống chuyển tải nước sạch chiều dài gần 26 km có đường kính từ D900 mm đến D2000 mm.</p>', 0, 12, 1, '[\"2\",\"3\",\"4\"]', '2023-11-11 15:25:47', '2023-11-22 10:11:39'),
(2, 4, '/storage/news/chinh_tri-224141.jpg', '\'Dự án cảng Liên Chiểu là động lực dài hạn cho Đà Nẵng\'', 'du-an-cang-lien-chieu-la-dong-luc-dai-han-cho-da-nang', 'Đà Nẵng bắt đầu chững lại sau \"những bước tiến dài\", do vậy dự án cảng Liên Chiểu là động lực dài hạn cho thành phố thời gian tới, theo Chủ tịch Quốc hội.', '<p>Đà Nẵng bắt đầu chững lại sau \"những bước tiến dài\", do vậy dự án cảng Liên Chiểu là động lực dài hạn cho thành phố thời gian tới, theo Chủ tịch Quốc hội.</p>\r\n\r\n<p>Sáng 11/11, Chủ tịch Quốc hội Vương Đình Huệ dự Ngày hội đại đoàn kết toàn dân tộc ở Khu dân cư 10, phường Hòa Hiệp Bắc, quận Liên Chiểu sau khi kiểm tra thực tế tiến độ dự án cảng Liên Chiểu dưới chân đèo Hải Vân. Đây là khu dân cư gần biển, ga đường sắt Kim Liên, nơi thành phố đang triển khai dự án cảng.</p>\r\n\r\n<p><img alt=\"Chủ tịch Quốc hội kiểm tra tiến độ thi công Cảng Liên Chiểu. Ảnh: Nguyễn Đông\" src=\"https://i1-vnexpress.vnecdn.net/2023/11/11/z4869713458395-711d11fb5c89edc-1539-5784-1699692998.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=GXkTGKgPVAYaMUpINeagzg\" /></p>\r\n\r\n<p style=\"text-align:center\">Chủ tịch Quốc hội kiểm tra tiến độ thi công Cảng Liên Chiểu. Ảnh:&nbsp;<em>Nguyễn Đông</em></p>\r\n\r\n<p>Nói chuyện với người dân, ông Huệ cho hay Liên Chiểu theo quy hoạch là cảng nước sâu loại I có vị trí quan trọng, điểm kết nối của hành lang kinh tế Đông Tây quốc tế, cửa ngõ của cả miền Trung.</p>\r\n\r\n<p>Công suất tính toán của cảng đến năm 2045 lên đến 100 triệu tấn hàng hóa thông qua một năm. Khi đi vào sử dụng, bến tàu tổng hợp của cảng có quy mô 100.000 tấn, bến cảng container 200.000 tấn. Theo Chủ tịch Quốc hội, hiếm có cảng nào trong thành phố có quy mô như Cảng Liên Chiểu. Nhà nước sẽ đầu tư 3.000 tỉ đồng để đầu tư hạ tầng dùng chung, kêu gọi đầu tư đồng bộ cảng này.</p>\r\n\r\n<p>\"TP Hải Phòng thu ngân sách hơn 100.000 tỷ đồng một năm nhờ vào cảng. TP HCM thu xuất nhập khẩu mỗi năm 140.000 tỷ đồng cũng nhờ có cảng. Còn TP Đà Nẵng chỉ loanh quanh ở mức vài chục ngàn tỷ đồng\", ông Huệ nói, cho hay 10 tháng qua, thành phố thu ngân sách chỉ 18.000-19.000 tỷ đồng. Do vậy, cảng Liên Chiểu sẽ giúp tăng thu ngân sách và là một trong những động lực dài hạn cho Đà Nẵng thời gian tới.</p>\r\n\r\n<p><img alt=\"Khu vực cảng Liên Chiểu đang thi công. Ảnh: Nguyễn Đông\" src=\"https://i1-vnexpress.vnecdn.net/2023/11/11/lie-n-chie-u-jpeg-1975-1699703346.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=MM7YUFCVTDKehDQUZ-caJw\" /></p>\r\n\r\n<p style=\"text-align:center\">Khu vực cảng Liên Chiểu đang thi công. Ảnh:&nbsp;<em>Nguyễn Đông</em></p>\r\n\r\n<p>Khu dân cư Hiệp Hòa Bắc có tổng số hồ sơ phải giải tỏa của dự án là 255, trong đó có 40 hồ sơ đất ở, 196 hồ sơ đất nông nghiệp; 19 hồ sơ đất khác. Phản ánh tới Chủ tịch Quốc hội, nhiều hộ dân cho biết giá trị đền bù đất, nhà, vật kiến trúc khác, không đủ tiền để nộp tiền đất tái định cư và xây dựng lại nhà ở. Trong khi đó, bà con không thuộc diện được nợ tiền đất tái định cư theo quy định.</p>\r\n\r\n<p>Ngoài ra, một số hộ đông nhân khẩu, ba thế hệ sinh sống, bị thu hồi đất nhưng được bố trí một lô tái định cư hoặc một căn hộ chung cư nên rất chật chội, không đảm bảo cuộc sống tốt hơn nơi ở cũ theo tinh thần Nghị quyết số 18 của Trung ương.</p>\r\n\r\n<p>Ghi nhận ý kiến, Chủ tịch Quốc hội yêu cầu địa phương chăm lo hơn nữa đời sống nhân dân trong vùng, nhất là các hộ dân bị ảnh hưởng vì phải giải tỏa để nhường đất cho dự án. Đồng thời, chính quyền cần quan tâm sinh kế của người dân khi thực hiện dự án, chuyển đổi từ nghề nông, ngư nghiệp sang dịch vụ logistics, nghề thủ công... để nâng cao thu nhập.</p>\r\n\r\n<p>Cho rằng khi thi công dự án không tránh khỏi vướng mắc, phát sinh và ít nhiều ảnh hưởng đến đời sống của người dân, ông đề nghị người dân \"chung tay, đồng thuận với chính quyền địa phương trong thực hiện dự án\".</p>\r\n\r\n<p>Dự án Cảng Liên Chiểu có diện tích 450 ha, gồm 8 bến container tiếp nhận tàu 30.000-200.000 DWT; 6 bến tổng hợp tiếp nhận tàu 30.000-100.000 DWT; 1.200m bến thủy nội địa và 6 bến hàng lỏng, khí; công suất khai thác đạt 50 triệu tấn mỗi năm vào năm 2050. Tổng mức đầu tư hơn 3.400 tỷ đồng, trong đó nguồn vốn từ ngân sách trung ương giai đoạn 2021-2025 khoảng 3.000 tỷ đồng, phần còn lại sử dụng ngân sách địa phương.</p>\r\n\r\n<p>Dự án khởi công cuối năm 2022, dự kiến hoàn thành cuối năm 2025. Khi Cảng Liên Chiểu đi vào khai thác sẽ giảm tải cho Cảng Tiên Sa hiện hữu (dự kiến chuyển đổi chuyên phục vụ tàu du lịch), đồng thời giảm áp lực vận tải trong nội đô.</p>', 0, 6, 1, '0', '2023-11-11 15:41:41', '2023-11-20 15:28:40'),
(4, 4, '/storage/news/chinh_tri1-222944.jpg', 'Hà Nội có thể được tăng quyền ở nhiều lĩnh vực', 'ha-noi-co-the-duoc-tang-quyen-o-nhieu-linh-vuc', 'Hà Nội được quyết định chủ trương dự án đầu tư công số vốn đến 20.000 tỷ, lập cơ quan chuyên trách, tăng đại biểu HĐND TP là những chính sách lớn trong dự thảo Luật Thủ đô sửa đổi.', '<p>Hà Nội được quyết định chủ trương dự án đầu tư công số vốn đến 20.000 tỷ, lập cơ quan chuyên trách, tăng đại biểu HĐND TP là những chính sách lớn trong dự thảo Luật Thủ đô sửa đổi.</p>\r\n\r\n<p>Phân cấp thẩm quyền quyết định đầu tư</p>\r\n\r\n<p>Tại Điều 43 dự thảo, Chính phủ đề xuất HĐND TP Hà Nội được quyết định chủ trương dự án đường sắt đô thị; dự án sử dụng vốn đầu tư công tối đa 20.000 tỷ đồng; dự án sử dụng ngân sách trung ương, nguồn vốn ODA, vốn vay ưu đãi của nước ngoài; dự án đầu tư công liên tỉnh nằm trong vùng Thủ đô.</p>\r\n\r\n<p>Theo Luật Đầu tư công hiện nay, những dự án quan trọng quốc gia (số vốn từ 10.000 tỷ đồng) thuộc thẩm quyền quyết định của Quốc hội. Dự án đầu tư sử dụng vốn vay ODA và vốn vay ưu đãi của các nhà tài trợ nước ngoài thuộc thẩm quyền Thủ tướng.</p>\r\n\r\n<p>Ngoài ra, dự thảo cũng phân quyền cho UBND TP Hà Nội chấp thuận chủ trương đầu tư các dự án thuộc thẩm quyền của Thủ tướng theo Luật Đầu tư, Luật Công nghệ cao như dự án đầu tư xây dựng nhà ở (để bán, cho thuê, cho thuê mua), khu đô thị có quy mô sử dụng dưới 500 ha hoặc quy mô dân số từ 50.000 người trở lên; dự án đầu tư xây dựng và kinh doanh kết cấu hạ tầng khu công nghiệp, khu chế xuất, khu công nghệ cao.</p>\r\n\r\n<p>Phát biểu tại phiên họp tổ về dự thảo luật chiều 10/11, Bí thư Thành ủy Hà Nội Đinh Tiến Dũng cho rằng việc phân cấp mạnh mẽ về thẩm quyền đầu tư giúp Thủ đô tháo gỡ nhiều rào cản trong những dự án trọng điểm, tác động lớn và dự án đường sắt đô thị. Thành phố có thể tự giải quyết nhiều vấn đề cấp thiết, tránh phải xin ý kiến Chính phủ hoặc chờ Quốc hội họp để quyết định.</p>\r\n\r\n<p>Tàu chạy thử trên tuyến đường sắt đô thị Nhổn - Ga Hà Nội tháng 12/2022. Ảnh: Ngọc Thành<br />\r\nTàu chạy thử trên tuyến đường sắt đô thị Nhổn - Ga Hà Nội tháng 12/2022. Ảnh: Ngọc Thành</p>\r\n\r\n<p>Tăng thêm 30 đại biểu HĐND TP Hà Nội</p>\r\n\r\n<p>Chính phủ đề xuất tăng số lượng đại biểu HĐND từ 95 lên 125, tăng tỷ lệ đại biểu HĐND chuyên trách từ 20% lên 25% nhằm nâng cao năng lực, tính chuyên nghiệp và hiệu quả hoạt động của HĐND.</p>\r\n\r\n<p>Theo lý giải của cơ quan soạn thảo, số lượng người cư trú thường xuyên và làm việc tại Hà Nội trên 10 triệu, 95 đại biểu HĐND TP như hiện nay, bình quân 105.000 người dân có một đại biểu, thấp hơn bình quân chung cả nước. Nếu không đủ số lượng đại biểu HĐND thì không bảo đảm được tính đại diện, quyền lợi của cử tri và nhân dân Thủ đô.</p>\r\n\r\n<p>HĐND TP dự kiến sẽ có thêm hơn 110 nhiệm vụ, quyền hạn có yêu cầu phân cấp, phân quyền mạnh mẽ hơn trong Luật Thủ đô. Do đó, yêu cầu đặt ra là tổ chức, cơ cấu bộ máy của HĐND TP phải đủ mạnh để nâng cao chất lượng hoạt động, giám sát.</p>\r\n\r\n<p>Cùng với đó, dự thảo cũng cho phép tăng một phó chủ tịch HĐND (hiện hành là 2), mở rộng thành phần của Thường trực HĐND so với quy định của Luật Tổ chức chính quyền địa phương, nhằm bảo đảm nguồn nhân lực lãnh đạo, chỉ đạo, điều hành.</p>\r\n\r\n<p>Theo báo cáo đánh giá tác động của Bộ Tư pháp, với việc không tổ chức HĐND cấp phường nhiệm kỳ 2026-2031, số đại biểu HĐND các cấp của Hà Nội sẽ ít hơn so với quy định khoảng 7.000. \"Như vậy việc tăng thêm 30 đại biểu HĐND TP như dự kiến không làm phát sinh thêm ngân sách của thành phố\", Bộ Tư pháp nêu.</p>\r\n\r\n<p>Khung pháp lý cho hai thành phố trực thuộc</p>\r\n\r\n<p>Ngoài 20 đô thị được xác định tại Quy hoạch chung Thủ đô, Hà Nội sẽ hình thành thêm 2 thành phố trực thuộc tại khu vực phía Bắc - thành phố logistic, dịch vụ (vùng Đông Anh, Mê Linh, Sóc Sơn) và phía Tây - thành phố về giáo dục, đào tạo, khoa học (vùng Hòa Lạc, Xuân Mai).</p>\r\n\r\n<p>Về cơ cấu tổ chức, dự thảo cũng cho phép xây dựng HĐND, UBND TP thuộc Hà Nội và được áp dụng một số đặc thù vượt trội so với cơ cấu tổ chức của quận, huyện, thị xã. Số lượng phó chủ tịch HĐND tăng từ một lên hai, phó chủ tịch UBND từ ba lên bốn và đại biểu HĐND chuyên trách từ sáu lên chín.</p>\r\n\r\n<p>Để thực hiện quy hoạch trên, Bộ Tư pháp (cơ quan chủ trì soạn thảo) cho rằng, Hà Nội phải có giải pháp, nguồn lực tài chính phát triển hệ thống vận tải hành khách đồng bộ, đặc biệt là hệ thống đường sắt đô thị, xe buýt nhanh (BRT) và xe buýt thường.</p>\r\n\r\n<p>Do vậy, dự thảo luật cho phép HĐND TP Hà Nội quyết định chủ trương đầu tư dự án TOD (phát triển đô thị dựa trên giao thông công cộng) phù hợp điều kiện về ngân sách, diện tích đất có thể đấu giá để thực hiện tái thiết, xây dựng đô thị mới; sử dụng ngân sách địa phương để bồi thường, hỗ trợ, tái định cư.</p>\r\n\r\n<p>Các cơ chế huy động nguồn lực để phát triển đường sắt đô thị bao gồm đấu giá quyền sử dụng đất, quyền sử dụng không gian ngầm, khoảng không trên cao trong khu vực TOD. Tiền thu được phục vụ đầu tư đường sắt đô thị, hệ thống giao thông công cộng kết nối với hệ thống đường sắt đô thị, hạ tầng kỹ thuật kết nối đến nhà ga.</p>\r\n\r\n<p>Trung tâm Đổi mới sáng tạo Quốc gia tại Khu Công nghệ cao Hòa Lạc (NIC cơ sở Hòa Lạc). Ảnh: Giang Huy<br />\r\nTrung tâm Đổi mới sáng tạo Quốc gia tại Khu Công nghệ cao Hòa Lạc (NIC cơ sở Hòa Lạc). Ảnh: Giang Huy</p>\r\n\r\n<p>Hà Nội được thành lập thêm cơ quan chuyên môn trực thuộc</p>\r\n\r\n<p>Dự thảo quy định phân quyền cho UBND TP Hà Nội điều chỉnh một số nhiệm vụ, quyền hạn của cơ quan chuyên môn, tổ chức hành chính khác thuộc UBND quận, huyện, thị xã; quy định tổ chức bộ máy, chức năng, nhiệm vụ, quyền hạn của cơ quan chuyên môn, tổ chức hành chính đặc thù thuộc UBND TP Hà Nội, UBND quận, huyện, thị xã; quyết định thành lập, tổ chức lại, giải thể đơn vị sự nghiệp công lập thuộc phạm vi quản lý.</p>\r\n\r\n<p>Cơ chế này tương ứng việc Ban Quản lý an toàn thực phẩm - một mô hình riêng của TP HCM có thể được nâng lên thành Sở để thực hiện hiệu quả công tác quản lý nhà nước về vệ sinh, an toàn thực phẩm trên địa bàn. Đây cũng là một nội dung đáng chú ý trong Nghị quyết 98 về thí điểm một số cơ chế, chính sách đặc thù phát triển TP HCM.</p>\r\n\r\n<p>Mô hình này sẽ khắc phục hạn chế về công tác bảo đảm vệ sinh, an toàn thực phẩm mà hiện theo pháp luật hiện hành được quản lý bởi 3 cơ quan y tế, nông nghiệp, công thương, vốn gặp nhiều vướng mắc trong thực tiễn các đô thị lớn như Hà Nội, TP HCM.</p>\r\n\r\n<p>Dự thảo Luật Thủ đô (sửa đổi) dự kiến được Quốc hội xem xét, thông qua tại kỳ họp giữa năm 2024.</p>', 0, 1, 1, '[\"4\"]', '2023-11-12 15:29:45', '2023-11-18 08:50:52'),
(5, 3, '/storage/news/thoi_su-225936.jpg', 'Người Huế trở tay không kịp vì lũ lên nhanh', 'nguoi-hue-tro-tay-khong-kip-vi-lu-len-nhanh', 'Người Huế trở tay không kịp vì lũ lên nhanh', '<p>THỪA THIÊN - HUẾSau hai tiếng mưa xối xả và lũ từ thượng đổ về, nhà anh Phan Văn Hóa ở trung tâm TP Huế ngập gần một mét, nhiều đồ đạc ngâm trong lũ.</p>\r\n\r\n<p>17h hôm qua, anh Phan Văn Hóa, 33 tuổi, chạy bộ 5 km ven sông Hương vừa thể dục, vừa quan sát mực nước. Nhà cạnh sông Như Ý, cách Đập Đá thông với sông Hương chỉ 50 m, anh và gia đình đã quen sống chung với lũ. Thấy nước sông Hương lên chậm, anh Hóa đoán đợt lũ này không lớn.</p>\r\n\r\n<p>Hơn 20h, bất ngờ mưa như trút nước, lũ từ thượng nguồn tràn qua Đập Đá. Anh Hóa vội vàng dắt hai xe máy từ sân vào nhà, cùng vợ kê tủ lạnh, máy giặt lên cao. Chiếc sup cũng được bơm căng để đi lại khi cần thiết. Khoảng 30 phút sau, nước ào vào nhà, nhanh chóng dâng lên gần một mét.</p>\r\n\r\n<p><img alt=\"Xe máy được anh Hóa dắt vào nhà. Ảnh: Vạn An\" src=\"https://i1-vnexpress.vnecdn.net/2023/11/15/001-6289-1700037781.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=vkXFbrybXineVw8R9ZDB9w\" /></p>\r\n\r\n<p>Nước tràn vào phòng khách nhà anh Hóa. Ảnh:&nbsp;<em>Vạn An</em></p>\r\n\r\n<p>Vợ chồng anh Hóa phải thức trắng đêm canh lũ và di chuyển đồ đạc lên tầng hai. \"So với trận lũ năm 2022, đợt này nước dâng cao hơn khoảng 5 cm, đặc biệt quá nhanh khiến gia đình không kịp trở tay. Nhiều bàn ghế của quán cà phê không kịp di chuyển đành buộc lại, ngâm trong dòng lũ\", anh Hóa nói.</p>\r\n\r\n<p>Xác định với mức ngập sâu thế này sẽ khó có thể rút hết trong 1-2 ngày tới, anh Hóa đã chèo sup đi mua thực phẩm dự trữ, mua đèn pin dự phòng.</p>\r\n\r\n<p>Nhà cách sông Hương 2 km, chị Trần Thị My Ni, 33 tuổi, ở phường An Đông cũng bất ngờ khi nước lũ dâng nhanh trong đêm. Vợ chồng chị chỉ kịp di chuyển đồ điện tử lên cao, kê cao xe máy, còn lại hầu hết đồ đạc ngâm lũ.</p>\r\n\r\n<p>\"Tôi đã nhận thông tin lũ trên sông Hương, nhưng chiều qua thấy trời không mưa, nước sông Hương lên chậm nên chủ quan không kê đồ lên cao. Sau 2-3 tiếng buổi tối, nước đã ngập đường, tràn vào nhà 0,5 m\", chị Ni kể.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Cảnh sát giúp sơ tán người dân khỏi vùng ngập sâu. Ảnh: Vạn An\" src=\"https://i1-vnexpress.vnecdn.net/2023/11/15/so-tan1-1700053881-2574-1700053933.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=U6RPcKeUs69ZUbyq2OZelg\" /></p>\r\n\r\n<p>Cảnh sát sơ tán người dân khỏi vùng ngập sâu. Ảnh:&nbsp;<em>Vạn An</em></p>\r\n\r\n<p>Nước lũ dâng nhanh nên nhiều cư dân sống trong khu đô thị mới An Vân Dương, TP Huế đã cẩn thận di chuyển ôtô lên khu đất cao ráo phía trước trong đêm. Tuy nhiên, đến sáng nay nhiều ôtô vẫn ngập nửa bánh xe.</p>\r\n\r\n<p>Thống kê của Ban Chỉ huy phòng chống thiên tai và Tìm kiếm cứu nạn Thừa Thiên Huế, trừ A Lưới, 8 huyện thị của tỉnh đều ngập. Nằm ở hạ du ven sông Hương, toàn bộ 36 phường, xã của TP Huế đang ngập 0,5-1,2 m, trong đó khoảng 8.500 hộ dân ngập sâu 0,8-1,2 m.</p>\r\n\r\n<p>7 huyện thị khác gồm Phong Điền, Quảng Điền, Hương Trà, Hương Thủy, Phú Vang, Phú Lộc, Nam Đông có khoảng 8.000 hộ dân bị ngập 0,3-0,6 m. Trừ quốc lộ 1 đã thông tuyến chiều nay, các tuyến quốc lộ khác, tỉnh lộ, huyện lộ, liên xã có nhiều đoạn chìm trong biển nước, giao thông chia cắt.</p>\r\n\r\n<p>Để đảm bảo an toàn, tỉnh đã cho toàn bộ học sinh nghỉ học hôm nay và ngày mai. Hơn 3.400 hộ dân với 8.800 người đã được sơ tán khỏi nơi ngập sâu, nguy cơ sạt lở. Điện lực đã cắt điện 824 trạm biến áp vùng thấp trũng, ngừng cấp điện cho 137.000 khách hàng, chiếm 41% tổng số khách toàn tỉnh.</p>\r\n\r\n<p><img alt=\"Người dân vất vả di chuyển trên các tuyến đường ngập ở TP Huế chiều 15/11. Ảnh: Vạn An\" src=\"https://i1-vnexpress.vnecdn.net/2023/11/15/lu-1700053615-3912-1700053621.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=7iHnhZsmYCbwR957NzMrZQ\" /></p>\r\n\r\n<p>Người dân vất vả di chuyển trên đường Hùng Vương, TP Huế, chiều 15/11. Ảnh:&nbsp;<em>Vạn An</em></p>\r\n\r\n<p>Lý giải về tình trạng lũ lên nhanh khiến người dân không kịp xoay xở, ông Đặng Văn Hòa, Chánh văn phòng Ban Chỉ huy Phòng chống thiên tai và Tìm kiếm cứu nạn tỉnh Thừa Thiên Huế, do mưa quá cực đoan, gấp nhiều lần dự báo, buộc các hồ điều tiết nước về hạ du.</p>\r\n\r\n<p>Dự báo Thừa Thiên Huế mưa cả đợt ngày 13-17/11 250-400 mm, nhưng mới ba ngày huyện Nam Đông và một số nơi của huyện Phú Lộc mưa 500-900 mm. Có nơi cao hơn như: Vườn quốc gia Bạch Mã 1.000 mm; Thượng Quảng 1.020 mm; Hương Sơn, thủy điện Bình Điền - Hương Trà 1.100 mm; Xuân Lộc 1.110 mm.</p>\r\n\r\n<p>Trả lời vì sao các hồ thủy điện, thủy lợi lại xả để làm tăng mức lũ, ông Hòa nói trong tháng 10, các hồ ở thượng nguồn đã làm tốt việc cắt lũ cho hạ du. Trước đợt lũ này, ngày 10-13/11 các hồ như Hương Điền, Bình Điền, Tả Trạch, A Lưới đã điều tiết nước về hạ du nhằm chủ động đón lũ.</p>\r\n\r\n<p>Tuy nhiên, mưa lớn đã vượt ra ngoài kịch bản điều tiết nước của các hồ ở thượng nguồn. \"Huyện Nam Đông mưa 4 giờ trên 800 mm, các hồ không thể chịu nổi\", ông Hòa nói và cho biết trận lũ này gần giống với trận lụt lịch sử tháng 11/1999.</p>\r\n\r\n<p>Năm đó 10 tỉnh miền Trung ngập lụt, làm 595 người chết và mất tích. Riêng Thừa Thiên Huế ngập nặng nhất với 352 người chết, 21 người mất tích, 900.000 dân bị thiếu đói trong nhiều ngày, thiệt hại vật chất hơn 1.760 tỷ đồng.</p>\r\n\r\n<p>Chiều nay, nhiều khu vực Thừa Thiên Huế vẫn mưa to, lũ sông Hương tại Kim Long đã đạt đỉnh, vượt báo động ba 0,78 m; sông Bồ tại Phú Ốc trên báo động ba 0,37 m. Dự báo từ nay đến 17/11, địa bàn tiếp tục mưa 100-300 mm, có nơi trên 400 mm. Lũ các sông duy trì trên báo động ba, gây ngập lụt diện rộng.</p>', 0, 10, 1, '[\"6\"]', '2023-11-15 15:59:36', '2023-11-20 15:32:52'),
(6, 4, '/storage/news/chinh_tri-230251.jpg', 'Chủ tịch nước Võ Văn Thưởng sắp thăm Nhật Bản', 'chu-tich-nuoc-vo-van-thuong-sap-tham-nhat-ban', 'Chủ tịch nước Võ Văn Thưởng và phu nhân dự kiến thăm chính thức Nhật Bản ngày 27-30/11, nhằm góp phần đưa quan hệ song phương lên tầm cao mới.', '<p>Chủ tịch nước Võ Văn Thưởng và phu nhân dự kiến thăm chính thức Nhật Bản ngày 27-30/11, nhằm góp phần đưa quan hệ song phương lên tầm cao mới.</p>\r\n\r\n<p>Người phát ngôn Bộ Ngoại giao Phạm Thu Hằng hôm nay cho biết chuyến thăm của Chủ tịch nước theo lời mời của nhà nước Nhật Bản sẽ diễn ra trong bối cảnh quan hệ đối tác chiến lược sâu rộng Việt - Nhật đang phát triển mạnh mẽ, toàn diện và nhân dịp kỷ niệm 50 năm hai nước thiết lập quan hệ ngoại giao.</p>\r\n\r\n<p>\"Chúng tôi tin tưởng chuyến thăm của Chủ tịch nước Võ Văn Thưởng sẽ góp phần làm sâu sắc hơn nữa quan hệ Việt Nam - Nhật Bản, đưa quan hệ hai nước phát triển lên tầm cao mới, thực chất, hiệu quả và lâu dài trên mọi lĩnh vực, vì hòa bình, ổn định, và phát triển mỗi nước cũng như tại khu vực và trên thế giới\", bà Hằng cho hay.</p>\r\n\r\n<p><img alt=\"[Chủ tịch nước Võ Văn Thưởng tại Hà Nội ngày 4/4. Ảnh: TTXVN\" src=\"https://i1-vnexpress.vnecdn.net/2023/11/15/vvt-1-3104-1700034310.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=NagsmjNh8DErmLrB8hwcjw\" /></p>\r\n\r\n<p>Chủ tịch nước Võ Văn Thưởng tại Hà Nội ngày 4/4. Ảnh:&nbsp;<em>TTXVN</em></p>\r\n\r\n<p>Bộ Ngoại giao Nhật Bản cùng ngày thông báo&nbsp;<a href=\"https://vnexpress.net/chu-de/chu-tich-nuoc-vo-van-thuong-1670\" rel=\"dofollow\">Chủ tịch nước Võ Văn Thưởng</a>&nbsp;và phu nhân sẽ thăm chính thức nước này vào cuối tháng 11, gặp Nhật hoàng Naruhito và Hoàng hậu Masako, hội kiến với Thủ tướng Nhật Bản Fumio Kishida, thăm nhiều địa điểm tại thủ đô Tokyo và tỉnh Fukuoka.</p>\r\n\r\n<p>\"Chính phủ Nhật Bản vui mừng chào đón chuyến thăm của Chủ tịch nước Võ Văn Thưởng và phu nhân, tin tưởng rằng sự kiện này sẽ củng cố quan hệ hữu nghị giữa hai nước\", thông cáo của Bộ Ngoại giao Nhật Bản có đoạn.</p>\r\n\r\n<p><a href=\"https://vnexpress.net/no_script_;\" rel=\"nofollow\">Việt Nam</a>&nbsp;- Nhật Bản thiết lập quan hệ ngoại giao vào ngày 21/9/1973 và xác lập quan hệ Đối tác chiến lược năm 2009. Vào năm 2014, hai nước xác lập quan hệ Đối tác chiến lược sâu rộng vì hòa bình và thịnh vượng ở châu Á.</p>\r\n\r\n<p>Nhật là nước G7 đầu tiên công nhận quy chế kinh tế thị trường của Việt Nam và đã hai lần mời Việt Nam dự Hội nghị thượng đỉnh G7 mở rộng. Quan hệ Việt Nam -&nbsp;<a href=\"https://vnexpress.net/chu-de/nhat-ban-709\" rel=\"dofollow\">Nhật Bản</a>&nbsp;có sự tin cậy chính trị cao, liên kết khu vực ngày càng chặt chẽ, chia sẻ quan điểm chung trong nhiều vấn đề hợp tác khu vực, quốc tế.</p>\r\n\r\n<p>Nhật Bản là đối tác kinh tế quan trọng hàng đầu của Việt Nam, đứng thứ nhất về cung cấp viện trợ ODA, thứ hai về hợp tác lao động, thứ ba về đầu tư và du lịch, thứ 4 về thương mại. Kim ngạch thương mại song phương năm 2022 đạt gần 50 tỷ USD, trong đó Việt Nam xuất khẩu sang Nhật Bản 24,2 tỷ USD và nhập khẩu 23,4 tỷ USD.</p>', 0, 25, 1, '[\"4\"]', '2023-11-15 16:02:51', '2023-11-18 08:26:45'),
(7, 14, '/storage/news/laodongvieclam-231355.jpg', 'Nhà máy có đơn hàng trở lại', 'nha-may-co-don-hang-tro-lai', 'TP HCM - Đơn hàng ở nhiều nhà máy dần phục hồi, công nhân làm đủ 8 tiếng hoặc tăng ca giúp cải thiện thu nhập dịp cuối năm.', '<p>TP HCMĐơn hàng ở nhiều nhà máy dần phục hồi, công nhân làm đủ 8 tiếng hoặc tăng ca giúp cải thiện thu nhập dịp cuối năm.</p>\r\n\r\n<p>Hơn tháng qua, chị Huỳnh Mỹ Trúc, làm việc tại khu K của Công ty TNHH Pouyuen Việt Nam (quận Bình Tân), thường xuyên tăng ca 30 phút mỗi ngày. Nếu làm đều, mỗi tháng chị có thêm một triệu đồng. Số tiền đủ để chị ăn sáng, trả tiền xe đưa đón 6.000 đồng mỗi ngày.</p>\r\n\r\n<p>\"Có tăng ca thì mình không phải tiêu vào lương cứng, để dành nuôi con\", chị Trúc nói. Ở tuổi 45, chị có hơn 20 năm gắn bó với Pouyuen, lương căn bản gần 11 triệu đồng mỗi tháng. Chồng mất sớm, chị một mình nuôi hai con và mẹ già. Hồi tháng 2, khi công ty bắt đầu đợt giảm lao động đầu tiên trong năm, trong lòng chị luôn bất an, sợ danh sách \"gọi đến tên mình\".</p>\r\n\r\n<p>\"Hôm tổ trưởng thông báo tăng ca, lo lắng của tôi tan biến\", chị Trúc nói. Với kinh nghiệm lâu năm, nữ công nhân cho rằng làm thêm giờ là dấu hiệu rõ ràng nhất của đơn hàng nhà máy phục hồi.</p>\r\n\r\n<p><img alt=\"Công nhân Công ty Pouyuen, quận Bình Tân sau giờ làm. Ảnh: Quỳnh Trần\" src=\"https://i1-vnexpress.vnecdn.net/2023/11/13/37db655d6f76b928e067-3055-1699-1873-8764-1699809922.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=ELyEIIsvpZKvUuJ7RKBjSw\" /></p>\r\n\r\n<p>Công nhân Công ty Pouyuen, quận Bình Tân sau giờ làm, tháng 11/2023. Ảnh:&nbsp;<em>Quỳnh Trần</em></p>\r\n\r\n<p>Ông Củ Phát Nghiệp, Chủ tịch công đoàn Công ty Pouyuen Việt Nam, cho biết đơn hàng của nhà máy đã dần phục hồi. Hiện một số xưởng sản xuất bố trí cho công nhân đăng ký tăng ca 30-60 phút vào một số ngày trong tuần.</p>\r\n\r\n<p>\"Nhiều đơn hàng do đối tác chủ động đặt\", chủ tịch công đoàn doanh nghiệp đông lao động nhất thành phố (hiện gần 39.000 lao động) nói. Theo ông khi đơn hàng tăng, tình hình lao động của doanh nghiệp từ nay đến cuối năm sẽ ổn định hơn. Công nhân an tâm làm việc.</p>\r\n\r\n<p>Tương tự, hơn tháng qua không khí sản xuất ở Công ty cổ phần sản xuất giày Khải Hoàn (Bình Chánh) nhộn nhịp trở lại vì đơn hàng nhích dần. Sau thời gian phải nghỉ luân phiên, giảm giờ làm, đỉnh điểm là tháng 9 phải nghỉ chờ việc vì đơn hàng cạn kiệt, từ tháng 10 hơn 1.100 công nhân bắt đầu tăng ca trở lại.</p>\r\n\r\n<p>Chị Nguyễn Thị Thanh, 34 tuổi, gắn bó hơn 5 năm ở công ty, cho biết khi đơn hàng không có, thu nhập giảm nhiều đồng nghiệp đã nghỉ việc. Tuy nhiên chị vẫn cố gắng bám trụ bởi ngay cả khi không có việc, công ty vẫn có khoản hỗ trợ cho người lao động.</p>\r\n\r\n<p>\"Công ty cố gắng giữ người thì chắc chắn sẽ nỗ lực tìm đơn hàng\", chị Thanh nói. Từ tháng 10, đơn hàng của nhà máy phục hồi, công nhân được bố trí tăng ca để kịp tiến độ, Mỗi tháng làm thêm tầm 30 giờ, chị có thêm khoảng hai triệu đồng. Ngoài ra, khi tăng ca, công ty lo luôn bữa ăn tối giúp chị tiết kiệm một phần chi phí.</p>\r\n\r\n<p>Người mẹ đơn thân kỳ vọng công ty sẽ duy trì việc đều đến cuối năm để có thêm tiền mua sắm áo quần mới cho con trai gửi ở quê.</p>\r\n\r\n<p>Pouyen, Khải Hoàn là hai trong số các doanh nghiệp thuộc ngành giày da có đơn hàng trở lại. Bà Phan Thị Thanh Xuân, Tổng thư ký hiệp hội Da, giày, túi xách Việt Nam, cho biết hiện tại tình hình đơn hàng các nhà máy có cải thiện, nhiều đối tác quay trở lại đặt hàng. Nguyên nhân giúp đơn ký kết phục hồi là hàng tồn kho lâu nay của các nhãn hàng đã giảm và thị trường chuẩn bị bước vào đợt mua sắm cuối năm. Trước mắt, công nhân có việc để làm, chủ yếu đủ 8 tiếng hành chính, một số ít nhà máy có tăng ca.</p>\r\n\r\n<p><img alt=\"Công nhân may Nhà Bè được sắp xếp tăng ca khi nhà máy có đơn hàng trở lại. Ảnh: An Phương\" src=\"https://i1-vnexpress.vnecdn.net/2023/11/13/img-0595-3435-1699788987-16998-8719-1608-1699809666.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=phomwEmdi7IF7B6Baky3MA\" /></p>\r\n\r\n<p>Công nhân may Nhà Bè được sắp xếp tăng ca khi nhà máy có đơn hàng trở lại. Ảnh:&nbsp;<em>An Phương</em></p>\r\n\r\n<p>Đối với ngành may, ông Phạm Xuân Hồng, Chủ tịch Hội dệt may thêu đan TP HCM, thông tin hiện đơn hàng đáp ứng được 85-90% năng lực sản xuất của các nhà máy. Các đơn hàng trở lại chủ yếu thuộc nhóm nhỏ lẻ, yêu cầu kiểu dáng, thời trang và đơn giá rất cạnh tranh. Trước đây, vào thời điểm cuối năm, các nhà máy may đã sắp xếp được lịch sản xuất đến giữa năm hoặc hết quý 3 năm sau.</p>\r\n\r\n<p>\"Mặc dù không được như dự báo hồi giữa năm nhưng trong bối cảnh khó khăn như hiện nay, đơn hàng phục hồi là tín hiệu mừng\", ông Hồng nói. Thời gian qua, nhiều nhà máy phải cho công nghỉ chờ việc, giảm lương, số khác buộc phải cắt lao động. Thêm đơn hàng giúp các doanh nghiệp có việc để làm, giữ lao động ở lại, đặc biệt có ý nghĩa khi Tết đã đến gần.</p>\r\n\r\n<p>Ông Hồng đơn cử Công ty may Sài Gòn 3, nơi ông làm chủ tịch hội đồng quản trị, đơn hàng hiện đạt 90% công suất. Điều này giúp nhà máy duy trì việc đều đặn cho công nhân, giữ họ ở lại để chờ thị trường phục hồi hoàn toàn.</p>\r\n\r\n<p>\"Chúng tôi vẫn tiếp tục đi kiếm đối tác, khách hàng mới\", ông Hồng nói. Theo ông, thời gian qua, sự nỗ lực của các ngành chức năng trong việc kết nối các thị trường mới phần nào có hiệu quả. Thời gian tới vẫn sẽ còn nhiều khó khăn nên cần thực hiện cùng lúc nhiều giải pháp để hỗ trợ doanh nghiệp.</p>\r\n\r\n<p>Giám đốc Sở Lao động, Thương binh và Xã hội TP HCM Lê Văn Thinh cho rằng tình hình sản xuất ở một số doanh nghiệp có tín hiệu tích cực. Các ngành may mặc, da giày, thực phẩm thêm đơn hàng. Một số nhà máy tuyển mới lao động, tổ chức tăng ca. Tuy nhiên, theo lãnh đạo ngành lao động thành phố, các đơn hàng hiện nay chủ yếu là ngắn hạn, phục vụ giáng sinh, năm mới. Dự báo tình hình sắp tới còn khó khăn.</p>\r\n\r\n<p>\"Trong bối cảnh này, công ty nào làm thêm giờ là công nhân mừng\", ông Thinh nói, cho biết sau thời gian hụt đơn hàng, lao động phải giảm lương, việc tăng ca lúc này như một khoản bù đắp thu nhập, đặc biệt khi Tết sắp đến.</p>', 0, 1, 0, '[\"2\"]', '2023-11-15 16:13:55', '2023-11-18 08:51:02'),
(8, 15, '/storage/news/giaothong-231503.jpg', 'Đường sắt bị chia cắt vì mưa lũ', 'duong-sat-bi-chia-cat-vi-mua-lu', 'Mưa lớn, nước lũ dâng cao khiến nhiều đoạn đường sắt qua tỉnh Thừa Thiên Huế bị ngập sâu, 6 đoàn tàu khách đang phải dừng chờ ở các ga dọc tuyến.', '<p>Mưa lớn, nước lũ dâng cao khiến nhiều đoạn đường sắt qua tỉnh Thừa Thiên Huế bị ngập sâu, 6 đoàn tàu khách đang phải dừng chờ ở các ga dọc tuyến.</p>\r\n\r\n<p>Ảnh hưởng của không khí lạnh và gió đông trên cao, Thừa Thiên Huế mưa rất to. Hơn 10h sáng nay, đường sắt Bắc Nam qua ga Văn Xá, thị xã Hương Trà, tỉnh Thừa Thiên Huế chìm trong nước lũ. Nước chảy xiết, tràn qua mặt ray khiến đoạn đường sắt Văn Xá - Hiền Sỹ phải phong tỏa.</p>\r\n\r\n<p>Cũng trong sáng nay, mưa lớn đã làm hư hỏng một số vị trí kết cấu hạ tầng như cầu đường sắt, hầm số 8 tại cung đường Thừa Lưu - Lăng Cô. Một số vị trí đường ray ngập 20-30 cm khiến đoạn đường này phải phong tỏa, theo Công ty cổ phần Đường sắt Bình Trị Thiên.</p>\r\n\r\n<p>Đến 10h, đoạn Thừa Lưu - Lăng Cô được thông đường, cho phép tàu đi qua với tốc độ 5 km/h. Tại một số vị trí, nước còn ngập đỉnh ray khoảng 8 cm.</p>\r\n\r\n<p><img alt=\"Nước ngập cầu chui qua đường sắt khu vực Thừa Thiên Huế. Ảnh: Xuân Hoa\" src=\"https://i1-vnexpress.vnecdn.net/2023/11/15/duong-sat-9693-1700028323.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=JRbfUQ0kZkJa9p_QCC2g3w\" /></p>\r\n\r\n<p>Nước ngập cầu chui qua đường sắt khu vực Thừa Thiên Huế. Ảnh:&nbsp;<em>Xuân Hoa</em></p>\r\n\r\n<p>Công ty cổ phần Đường sắt Quảng Nam - Đà Nẵng cho biết tại khu vực ga Hải Vân, mái taluy phía sau ga bị sụt trượt. Lớp cát đệm vữa của mái taluy đã trôi theo dòng nước xuống đường ray và qua ga Hải Vân.</p>\r\n\r\n<p>Nhờ các bức tường chắn bêtông dày 0,5 m nên tàu vẫn chạy an toàn qua ga Hải Vân và đỉnh đèo. Công ty cổ phần Đường sắt Quảng Nam - Đà Nẵng đã cử người theo dõi và xúc cát để tạo dòng chảy về hạ lưu. Tuy nhiên, cung đường Hải Vân Bắc - Lăng Cô có đá rơi uy hiếp an toàn nên phải phong tỏa.</p>\r\n\r\n<p>Theo Tổng công ty Đường sắt Việt Nam, đến trưa nay, 6 đoàn tàu khách SE1/2, SE3/4, SE6, SE19 vẫn đỗ dừng chờ thông đường sắt tại các ga Hiền Sỹ, Đông Hà, Đà Nẵng.</p>\r\n\r\n<p>Trong khi đó, theo Khu Quản lý đường bộ II, các tuyến quốc lộ 1, quốc lộ 49B qua tỉnh Thừa Thiên Huế, quốc lộ 49C qua Quảng Trị có nhiều đoạn bị ngập sâu 0,5 m khiến giao thông ách tắc từ sáng sớm.</p>\r\n\r\n<p>Chiều nay, nhiều phương tiện được phân luồng đi quốc lộ 1 tuyến tránh Huế hoặc đi tuyến cao tốc Cam Lộ - Túy Loan. Cao tốc La Sơn - Túy Loan nối Đà Nẵng và Thừa Thiên Huế cũng bị sạt lở một số đoạn song chưa cấm đường, phương tiện lưu thông chậm.</p>\r\n\r\n<p>Mưa lớn cộng với nước lũ từ thượng nguồn sông Hương đổ về nhanh, gây ngập TP Huế và nhiều huyện thị trong tỉnh từ đêm qua. Các tỉnh Nghệ An, Hà Tĩnh, Quảng Trị, Quảng Nam, Quảng Ngãi trước đó cũng mưa lớn, gây ngập cục bộ, sạt lở một số tuyến đường.</p>', 0, 0, 1, '', '2023-11-15 16:15:04', '2023-11-15 16:15:04'),
(9, 24, '/storage/news/trungquoc-234320.jpg', 'Giới chức Trung Quốc đã làm gì để cứu bất động sản?', 'gioi-chuc-trung-quoc-da-lam-gi-de-cuu-bat-dong-san', 'gioi-chuc-trung-quoc-da-lam-gi-de-cuu-bat-dong-san', '<p>Sau hơn 2 năm khủng hoảng địa ốc, Trung Quốc đã áp dụng nhiều biện pháp, từ hạ lãi suất, nới quy định mua nhà đến khuyến khích đầu tư.</p>\r\n\r\n<p>Hôm 8/11,&nbsp;<em>Reuters</em>&nbsp;trích nguồn tin thân cận cho biết giới chức Trung Quốc đã đề nghị đại gia bảo hiểm Ping An Insurance Group mua cổ phần kiểm soát trong&nbsp;<a href=\"https://vnexpress.net/country-garden-can-ke-nguy-co-vo-no-4665897.html\" rel=\"dofollow\">Country Garden</a>&nbsp;- hãng bất động sản tư nhân lớn nhất Trung Quốc đang ngập trong rắc rối. Theo nguồn tin này, chính phủ Trung Quốc đã chỉ đạo chính quyền tỉnh Quảng Đông - nơi đặt trụ sở của cả hai công ty - làm trung gian hỗ trợ Ping An giải cứu Country Garden.</p>\r\n\r\n<p>Ping An được chọn vì đang là cổ đông lớn của Country Garden. Giới chức Trung Quốc muốn vấn đề thanh khoản của Country Garden được giải quyết trong phạm vi tỉnh.</p>\r\n\r\n<p>Country Garden có khối nợ 1.400 tỷ nhân dân tệ (190 tỷ USD), tính đến hết tháng 6. Họ hiện có khoảng 3.000 dự án đang xây dựng tại Trung Quốc. Country Garden rơi vào khó khăn vài tháng qua, liên tục cận kề nguy cơ vỡ nợ.</p>\r\n\r\n<p>Việc giới chức chỉ đạo một công ty tiếp quản công ty khác không phải chưa từng có tiền lệ tại Trung Quốc. Nhưng nếu xảy ra, đây sẽ là một trong những động thái can thiệp mạnh tay nhất đến nay của Trung Quốc, nhằm giải cứu lĩnh vực bất động sản đang ngập trong nợ nần và thiếu thanh khoản.</p>\r\n\r\n<p>Dù nhiều hãng địa ốc Trung Quốc khác, trong đó có China Evergrande, đã vỡ nợ, các chính sách của nước này đến nay vẫn chủ yếu tập trung vào giảm lãi suất cho vay và nới lỏng các quy định mua nhà. Tin tức về Ping An là tín hiệu chính phủ Trung Quốc sẵn sàng đóng vai trò lớn hơn trong quá trình này.</p>\r\n\r\n<p>Đầu tuần này, cổ đông hàng đầu của China Vanke là công ty quốc doanh Shenzhen Metro cũng thông báo đã chuẩn bị khoảng 10 tỷ nhân dân tệ (1,4 tỷ USD) để hỗ trợ hãng bất động sản lớn nhì Trung Quốc.</p>\r\n\r\n<p><img alt=\"Một dự án của Country Garden tại Thiên Tân (Trung Quốc) hồi tháng 8/2023. Ảnh: Reuters\" src=\"https://i1-kinhdoanh.vnecdn.net/2023/11/09/country-garden-reuters-2-2992-1699504944.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=2ZDLOqn7_MGHYwXFgbe1-g\" /></p>\r\n\r\n<p style=\"text-align:center\">Một dự án của Country Garden tại Thiên Tân (Trung Quốc) hồi tháng 8/2023. Ảnh:&nbsp;<em>Reuters</em></p>\r\n\r\n<p>Thị trường bất động sản Trung Quốc rơi vào khủng hoảng từ giữa năm 2021. Khi đó, hàng loạt doanh nghiệp, từ các hãng tư nhân lớn như&nbsp;<a href=\"https://vnexpress.net/chu-de/evergrande-3774\" rel=\"dofollow\">China Evergrande Group</a>&nbsp;đến các công ty được chính phủ hậu thuẫn như CIFI Holdings, đều gặp khó về dòng tiền và khả năng trả nợ.</p>\r\n\r\n<p>Nguyên nhân được cho là chính sách \"ba lằn ranh đỏ\" của Bắc Kinh, được tung ra nhằm giảm rủi ro hệ thống bằng cách hạn chế khả năng vay mới của các công ty bất động sản. Đây được coi là nguyên nhân chính khiến nhiều hãng địa ốc nước này vỡ nợ. Hai năm qua, có khoảng 50 hãng đã vỡ nợ trái phiếu nước ngoài, với quy mô 100 tỷ USD, theo JPMorgan. Những doanh nghiệp thoát vỡ nợ thì luôn trong tình trạng bấp bênh và khó vay vốn mới.</p>\r\n\r\n<p>Đến giữa năm ngoái, tình hình càng nghiêm trọng. Giá nhà tại Trung Quốc liên tục lao dốc. Nhiều dự án đình trệ vì thiếu vốn. Làn sóng&nbsp;<a href=\"https://vnexpress.net/khung-hoang-bat-dong-san-o-trung-quoc-leo-thang-4487348.html\" rel=\"dofollow\">ngừng trả nợ mua nhà</a>&nbsp;bùng lên khắp nơi. Chiến dịch chống Covid-19 cứng rắn của Trung Quốc càng giáng đòn lên niềm tin trên thị trường.</p>\r\n\r\n<p>Bất động sản hiện đóng góp tới 25% GDP Trung Quốc. Rắc rối của lĩnh vực này vì thế đang châm ngòi cho lo ngại gây ra khủng hoảng tài chính trên diện rộng.</p>\r\n\r\n<p>Bắc Kinh vì thế phải thay đổi chính sách, tìm cách vực dậy ngành này. Tháng 3/2022, chính phủ Trung Quốc ngừng chương trình thử nghiệm áp thuế bất động sản. Họ cũng liên tiếp thúc giục các tổ chức tài chính&nbsp;<a href=\"https://vnexpress.net/trung-quoc-se-bom-von-cho-nganh-bat-dong-san-4502097.html\" rel=\"dofollow\">hỗ trợ ngành này.</a></p>\r\n\r\n<p>Đến tháng 11 năm ngoái, Bắc Kinh tung Kế hoạch 16 điểm nhằm cứu thị trường bất động sản đã được Ngân hàng Trung ương Trung Quốc (PBOC) và Ủy ban Quản lý Ngân hàng - Bảo hiểm Trung Quốc (CBIRC) đưa ra hồi giữa tháng. Kế hoạch này cung cấp hướng dẫn cho giới chức tài chính trên cả nước, tập trung giải quyết cuộc khủng hoảng thanh khoản của các doanh nghiệp và sẽ nới lỏng tạm thời hạn chế về vay ngân hàng.</p>\r\n\r\n<p>Việc này đánh dấu nỗ lực toàn diện của Trung Quốc nhằm giải cứu thị trường mà cựu Thống đốc Yi Gang từng kỳ vọng sẽ \"hạ cánh mềm\". Vài tuần sau đó, hàng loạt ngân hàng Trung Quốc thông báo sẽ bơm hàng trăm tỷ USD vào bất động sản. Đây được coi là thành công bước đầu của kế hoạch này.</p>\r\n\r\n<p>Cụ thể, sáu ngân hàng quốc doanh lớn của Trung Quốc lên kế hoạch bơm 140 tỷ USD vào thị trường. Số vốn trên chủ yếu để phát triển bất động sản, thế chấp cho khách hàng, mua bán - sáp nhập, cung cấp tài chính cho chuỗi cung ứng và đầu tư trái phiếu.</p>\r\n\r\n<p>Giữa năm nay, PBOC bắt đầu giảm hàng loạt lãi suất cho vay. Họ cũng gia hạn một số chính sách trong gói giải cứu 16 điểm đến hết năm 2024.</p>\r\n\r\n<p>Chính phủ Trung Quốc cũng thông qua các kế hoạch xây nhà ở giá rẻ và cải tạo nhiều vùng chưa được phát triển tại các thành phố lớn, nhằm thúc đẩy đầu tư trong lĩnh vực bất động sản. Họ còn nới lỏng một số quy định, như giảm lãi vay với người mua lần đầu và giảm tiền trả trước mua nhà với một số thành phố.</p>\r\n\r\n<p>Các nhà băng cũng nghĩ ra những cách chưa từng có để khuyến khích vay mua nhà. Hồi đầu năm, một số ngân hàng tại Nam Ninh, Hàng Châu, Ninh Ba và Bắc Kinh&nbsp;<a href=\"https://vnexpress.net/kinh-doanh/nha-bang-trung-quoc-cho-khach-vay-mua-nha-den-nam-95-tuoi-4572082.html\" rel=\"dofollow\">nâng giới hạn tuổi</a>&nbsp;của người vay mua nhà lên 80-95 tuổi. Điều này đồng nghĩa người 70 tuổi cũng có thể vay với kỳ hạn 10-25 năm. Đây là công cụ kích cầu, do nó có thể giảm được gánh nặng trả nợ hàng tháng.</p>\r\n\r\n<p>Chính quyền địa phương cũng tham gia công cuộc giải cứu. Tháng 6/2022, Meishan - thành phố tại Tứ Xuyên - cho biết trợ giá cho việc mua nhà mới trong năm. Ôn Châu - một thành phố ở Chiết Giang - cho phép người mua nhà lần đầu chỉ trả lãi trong 3 năm đầu. Huainan - thành phố tại An Huy - đã đề nghị các ngân hàng tăng cho vay và giảm thời gian chấp thuận vay với người mua nhà lần đầu.</p>\r\n\r\n<p>Bản thân các công ty địa ốc cũng đưa ra nhiều ưu đãi để hút khách hàng. Tháng 6/2022, hãng địa ốc Central China Real Estate<a href=\"https://vnexpress.net/kinh-doanh/cong-ty-trung-quoc-cho-khach-mua-nha-bang-toi-lua-my-4478610.html\" rel=\"dofollow\">&nbsp;nhận thanh toán bằng lúa mỳ</a>, tài trợ cho các nông dân tối đa 160.000 nhân dân tệ (24.000 USD) để bù vào khoản tiền trả trước mua nhà trong dự án chung cư River Mansion của công ty này ở Thương Khâu (Hà Nam). Vài tuần trước đó, họ cũng đề nghị nhận thanh toán bằng tỏi từ những người đang tìm mua nhà ở một dự án khác tại thành phố Khai Phong.</p>\r\n\r\n<p>Ở Vu Hồ (An Huy), thay vì bám sát giá sàn được chính phủ quy định, Golden Scale House - một dự án chung cư ở ngoại ô thành phố - đã chào mời khoản hỗ trợ sửa chữa lên tới 230.000 nhân dân tệ trong vòng một tháng sau khi giao dịch hoàn tất.</p>\r\n\r\n<p><strong>Dù vậy, thị trường bất động sản Trung Quốc được đánh giá chưa cải thiện nhiều.</strong>&nbsp;Số liệu công bố tháng trước cho thấy giá nhà mới tại Trung Quốc đã giảm 3 tháng liên tiếp, tính đến hết tháng 9.</p>\r\n\r\n<p>Doanh số bán bất động sản (tính theo diện tích sàn) tháng 9 cũng giảm gần 20% so với cùng kỳ năm ngoái. Đầu tư vào bất động sản giảm 9,1% trong 9 tháng đầu năm.</p>\r\n\r\n<p>Người mua nhà chần chừ vì muốn chờ giá giảm thêm. Tâm lý này đang làm cho tình hình trở nên tồi tệ hơn, vì các hãng địa ốc cần bán thêm nhà để thu về tiền mặt và tránh vỡ nợ.</p>\r\n\r\n<p>Đầu tuần này, Quỹ Tiền tệ Quốc tế (IMF) nâng dự báo tăng trưởng của Trung Quốc lên 5,4% năm nay. Tuy nhiên, cơ quan này cảnh báo kinh tế Trung Quốc còn đối mặt với nhiều rủi ro trong lĩnh vực tài chính và bất động sản. Họ cho rằng lĩnh vực địa ốc nước này hiện \"còn khá yếu\".</p>\r\n\r\n<p>IMF kêu gọi Trung Quốc để các hãng bất động sản không có khả năng hồi phục rời thị trường. Họ cho rằng việc Trung Quốc cho phép các doanh nghiệp yếu tiếp tục hoạt động đã kìm hãm đà phục hồi của ngành này.</p>\r\n\r\n<p>Trong một diễn đàn tài chính tại Hong Kong đầu tuần này, Phó thống đốc PBOC Zhang Qingsong cũng thừa nhận lĩnh vực địa ốc đang đi xuống.</p>\r\n\r\n<p>\"Chúng ta cần kiểm soát chặt chẽ hơn tốc độ này, để tránh sụt giảm quá mạnh và gây ra các hậu quả ngoài dự đoán. Chúng tôi đã đưa ra nhiều chính sách để bình ổn thị trường bất động sản\". Ông cũng kêu gọi giới chức tìm ra cách mới để duy trì tăng trưởng kinh tế, vì \"mô hình cũ dựa vào đầu tư và bất động sản đã không còn bền vững\".</p>', 0, 119, 0, '[\"14\"]', '2023-11-18 08:55:12', '2023-11-19 16:43:20'),
(10, 3, '/storage/news/thoi_su1-234133.jpg', 'Nghiên cứu sửa quy định cấp phép karaoke, vũ trường', 'nghien-cuu-sua-quy-dinh-cap-phep-karaoke-vu-truong', 'Bộ Văn hóa Thể thao và Du lịch nghiên cứu sửa quy định về cấp giấy phép kinh doanh dịch vụ karaoke, vũ trường trong tháng 12, Thủ tướng chỉ đạo.', '<p>Bộ Văn hóa Thể thao và Du lịch nghiên cứu sửa quy định về cấp giấy phép kinh doanh dịch vụ karaoke, vũ trường trong tháng 12, Thủ tướng chỉ đạo.</p>\r\n\r\n<p>Ngày 18/11, Văn phòng Chính phủ thông báo chỉ đạo của Thủ tướng Phạm Minh Chính đồng thời yêu cầu Bộ Văn hóa Thể thao và Du lịch khẩn trương hoàn thành rà soát, đánh giá để đề xuất sửa đổi, bổ sung theo trình tự rút gọn nghị định về kinh doanh dịch vụ karaoke, vũ trường cho phù hợp.</p>\r\n\r\n<p>Theo quy định hiện hành, công an cấp huyện chịu trách nhiệm tiếp nhận hồ sơ và thẩm định cấp giấy chứng nhận đủ điều kiện về an ninh, trật tự và quản lý các cơ sở. Sau đó, Sở Văn hóa Thể thao Du lịch cấp phép cho các cơ sở kinh doanh karaoke, vũ trường đủ điều kiện.</p>\r\n\r\n<p>Điều kiện để cấp phép cơ sở kinh doanh karaoke là phải đảm bảo phòng cháy và an ninh trật tự. Phòng hát rộng từ 20 m2, không kể công trình phụ. Các phòng không được đặt chốt cửa bên trong.</p>\r\n\r\n<p>Cơ sở kinh doanh vũ trường cũng phải đáp ứng yêu cầu phòng cháy, phòng rộng từ 80 m2, không đặt chốt cửa bên trong. Vũ trường cách trường học, bệnh viện, cơ sở tôn giáo tín ngưỡng tối thiểu 200 m.</p>\r\n\r\n<p>Sau vụ cháy karake An Phú (Bình Dương) khiến 32 người thiệt mạng hồi tháng 9/2022, Bộ Công an đã kiểm tra tổng thể các cơ sở kinh doanh karaoke và siết kiểm định phòng cháy chữa cháy, nhất là ở thành phố lớn.</p>\r\n\r\n<p>Tháng 4, ông Huỳnh Mạnh Hùng (Hà Nội) đại diện cho hàng chục hộ kinh doanh karaoke tại 10 tỉnh, thành phố cả nước kiến nghị Thủ tướng hướng dẫn quy chuẩn phòng cháy chữa cháy để tháo gỡ cho ngành nghề karaoke. Một tháng sau, Thủ tướng yêu cầu ba bộ Công an, Xây dựng, Văn hóa Thể thao Du lịch xử lý vướng mắc về phòng cháy chữa cháy cho các hộ kinh doanh karaoke.</p>\r\n\r\n<p><img alt=\"Quán karaoke trên đường Sư Vạn Hạnh, quận 10, TP HCM trả mặt bằng, tháng 2/2023. Ảnh: Quỳnh Trần\" src=\"https://i1-vnexpress.vnecdn.net/2023/11/19/233A6270-6137-1700390624.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=-rqgCHWrAx0-w_re37PsGg\" /></p>\r\n\r\n<p style=\"text-align:center\">Quán karaoke trên đường Sư Vạn Hạnh, quận 10, TP HCM trả mặt bằng, tháng 2/2023. Ảnh:&nbsp;<em>Quỳnh Trần</em></p>\r\n\r\n<p>Theo thông báo của Văn phòng Chính phủ hôm qua, Thủ tướng chỉ đạo tiếp tục tổng kiểm tra phòng cháy với chung cư; nhà ở riêng lẻ nhiều tầng, nhiều căn hộ (chung cư mini), cơ sở thuê trọ mật độ cao; nhà ở kết hợp sản xuất kinh doanh. Các đơn vị làm rõ trách nhiệm của tổ chức, cá nhân, xử lý vi phạm \"không vùng cấm, không ngoại lệ\".</p>\r\n\r\n<p>Bộ Công an sớm hoàn thiện hồ sơ đề nghị xây dựng Luật Phòng cháy chữa cháy và cứu nạn cứu hộ. Bộ cùng các đơn vị liên quan sửa quy định về phòng cháy chữa cháy, quy chuẩn kỹ thuật đảm bảo thống nhất, giảm tối đa chi phí không cần thiết cho người dân, doanh nghiệp.</p>\r\n\r\n<p>Quy chế thẩm duyệt thiết kế, nghiệm thu phòng cháy cháy phải minh bạch, không gây phiền hà cho người dân, doanh nghiệp.</p>\r\n\r\n<p>Bộ Xây dựng được giao hoàn thành tiêu chuẩn yêu cầu chung về thiết kế nhà ở riêng lẻ trong tháng 12 và thanh tra toàn diện quản lý xây dựng chung cư mini.</p>', 0, 0, 1, '[\"4\"]', '2023-11-19 16:41:33', '2023-11-19 16:41:33');
INSERT INTO `news` (`id_news`, `id_category`, `image_news`, `title_news`, `slug_news`, `summary_news`, `content_news`, `number_comments`, `number_views`, `is_hot`, `tag_news`, `created_at`, `updated_at`) VALUES
(11, 1, '/storage/news/xoi_trang-235617.jpg', 'Xôi trắng thịt kho tàu chuẩn vị Bắc', 'xoi-trang-thit-kho-tau-chuan-vi-bac', 'Từng hạt xôi căng mọng, dẻo mềm ăn cùng thịt kho trứng chả đậm vị, rưới nước sốt sánh thơm giúp bữa sáng chắc dạ, ấm bụng vào ngày đông.', '<h2>Cách làm</h2>\r\n\r\n<p><strong><em>a. Đồ xôi</em></strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Gạo nếp vo sạch rồi ngâm nước xâm xấp, thêm chút muối hạt rồi ngâm từ 6 - 8 tiếng cho hạt nếp ngậm no nước. Sau đó trút gạo ra rổ, xả nước rửa nhẹ nhàng, để ráo nước. Việc này giúp cho xôi khi đồ sẽ căng mọng, dẻo mềm.&nbsp;</p>\r\n	<img alt=\"\" src=\"https://i1-giadinh.vnecdn.net/2023/11/19/Buoc-1-1-7825-1700369781.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=eEcbd6HjmpvBO4TTyvkzPA\" />\r\n	<p>&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p>Đồ xôi hai lần là bí quyết giúp xôi dẻo mềm, căng bóng.&nbsp;Lần 1,&nbsp;đun sôi nước, cho gạo nếp vào chõ dàn đều ra, chọc mấy lỗ to để thoát nhiệt, thông khí rồi đồ xôi. Dùng vải màn hoặc khăn xô to sạch phủ kín để nước không đọng, chảy xuống làm nhão xôi. Thỉnh thoảng mở nắp ra ngoài để chảy bớt phần hơi nước bốc lên, xới cho xôi chín đều.&nbsp;</p>\r\n	<img alt=\"\" src=\"https://i1-giadinh.vnecdn.net/2023/11/19/Buoc-2-2-7546-1700369782.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=6WZJ_ZajjvXcSPouvnw_Gg\" />\r\n	<p>&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p>Sau 30-35 phút khi xôi chín 80%&nbsp;lấy ra, tãi đều trên mẹt rồi hong cho nguội. Việc này giúp hạt xôi \'\'hồi lại\'\', khi đồ tiếp lửa 2 sẽ dẻo mềm dù để lâu. Nếu đồ nhiều thì khâu này chia xôi đã nguội vào các hộp tương đương mỗi bữa sang rồi đem trữ đông.&nbsp;</p>\r\n	<img alt=\"\" src=\"https://i1-giadinh.vnecdn.net/2023/11/19/Buoc-3-3-9280-1700369782.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=FWMrfEP4sqoooqcl-EJP2A\" />\r\n	<p>&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p>Lần 2: Trước tiên, vẩy chút nước lạnh nhẹ đều, đánh cho xôi tơi ra rồi cho lên chõ đồ thêm 15-20 phút. Lúc này hạt xôi hút đẫy nước trở nên dẻo mềm, căng bóng là được.&nbsp;</p>\r\n	<img alt=\"\" src=\"https://i1-giadinh.vnecdn.net/2023/11/19/Buoc-4-4-8960-1700369782.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=1hAghIMhDiY6KGQEuYC_rg\" />\r\n	<p>&nbsp;</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong><em>&nbsp;b. Làm thịt kho trứng, chả (nên kho trước lửa 1)</em></strong></p>\r\n\r\n<ul>\r\n	<li>Thịt ba chỉ cạo rửa sạch, áp chảo phần bì rồi cắt miếng to bao diêm, chần sơ rồi rửa sạch cho hết tạp chất. Tùy khẩu vị mà kho thịt kèm chả quế, chả mỡ hoặc chả lụa đều ngon. Ướp thịt với chút mắm, muối, đường, hạt tiêu cho thấm vị. Thịt kho 2 lần lửa sẽ đượm màu đượm vị. Ban đầu, bật bếp đảo cho thịt săn lại giúp gia vị ướp ngấm vào trong thớ thịt. Trút nước nóng vào xâm xấp bề mặt rồi đun sôi, hớt bỏ bọt nếu có rồi hạ lửa nhỏ kho liu riu. Trứng gà luộc chín, bóc vỏ, rán xém vàng. Phần chả mỡ chiên sơ cho se bề mặt. Cho trứng và chả mỡ vào kho cùng. Nêm nếm lại gia vị cho vừa miệng. Sau khoảng 20 phút tắt bếp, để nguội cho \'\'thịt hồi\'\' giúp thịt, trứng, chả đượm màu hơn khi kho lửa 2. Trước khi ăn kho tiếp lửa 2 cho tới khi thịt mềm, trứng và chả ngấm vị, chuyển màu hổ phách, nước kho hơi sánh là được.<img alt=\"\" src=\"https://i1-giadinh.vnecdn.net/2023/11/19/Buoc-5-5-6157-1700369782.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=2Ae73EegTMSvbxysFS1ZKw\" />\r\n	<p>&nbsp;</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong><em>c. Làm hành phi (nên làm sẵn trước)</em></strong></p>\r\n\r\n<ul>\r\n	<li>Hành bóc vỏ, thái đều tay. Thử độ nóng của dầu (sủi tăm đầu đũa là đạt) mới cho hành vào để yên, thỉnh thoảng đảo nhẹ tay cho hành chín đều. Khi hành chiên se lại, hơi ngả màu vàng chanh, đạt khoảng 80% tắt bếp, vớt nhanh ra để vào giấy thấm dầu, dàn đều. Hành lúc này vẫn chín tiếp do còn nhiệt. Khi nguội, hành sẽ vàng và giòn rụm. Mỡ hành để riêng dùng cho các món xôi lúa, xôi xéo rất ngon.&nbsp;<img alt=\"\" src=\"https://i1-giadinh.vnecdn.net/2023/11/19/Buoc-6-6-1153-1700369782.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=_XemQ-H52AHbv5xeHFeVwA\" />\r\n	<p>&nbsp;</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong><em>d. Làm dưa góp</em></strong></p>\r\n\r\n<ul>\r\n	<li>Dưa chuột rửa sạch, để nguyên vỏ,&nbsp; cắt miếng vừa ăn, thêm chút muối ướp một lúc cho ra nước rồi vắt ráo, việc này giúp dưa giòn hơn. Sau đó, thêm chút đường, giấm (hoặc chanh), tỏi cho vừa vị là được.&nbsp;<img alt=\"\" src=\"https://i1-giadinh.vnecdn.net/2023/11/19/Buoc-7-7-7037-1700369782.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=_PVIsDG5xW4RyfQTuO0iqw\" />\r\n	<p>&nbsp;</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong><em>e. Trình bày và thưởng thức</em></strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Múc xôi nóng hổi ra bát, gắp thịt kho chả trứng, rưới nước sốt thịt kho sánh đượm, thêm hành phi và dưa góp và thưởng thức. Một số hàng quán thêm topping phong phú như pate, lạp xưởng tăng thêm hương vị và sự đầy đặn.&nbsp;</p>\r\n	<img alt=\"\" src=\"https://i1-giadinh.vnecdn.net/2023/11/19/Buoc-8-Thanh-pham1-8-2252-1700369782.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=iDhquxdUucOoDCn7LVYekA\" />\r\n	<p>&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p>Yêu cầu thành phẩm: Xôi căng bóng dẻo mềm, thịt kho mềm mọng, trứng dai bùi, chả mỡ ngậy thơm, nước sốt kho đậm đà ăn rất hao. Món này thường được nhiều người lựa chọn vào mỗi buổi sáng mùa đông bởi dễ ăn lại chắc dạ, ấm bụng.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>Chú ý:</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Theo kinh nghiệm từ xưa, để có món xôi ngon thì gạo nếp quyết định tới 70%. Nên chọn nếp cái hoa vàng hoặc nếp Tú Lệ, nếp nương Điện Biên, nếp ngỗng, nếp nhung... thổi xôi ít bị hao, hạt đều, bóng đẹp, dẻo thơm.</p>\r\n	</li>\r\n	<li>\r\n	<p>Vì xôi đồ chín bằng hơi nước nên cần ngâm gạo từ 6 - 8 tiếng tùy theo từng loại để giúp gạo nếp \'\'ngậm tròn\'\' nước, khi chín sẽ nở ra dẻo thơm.</p>\r\n	</li>\r\n	<li>\r\n	<p>Các loại xôi nói chung&nbsp;nên đồ từ 2 - 3 lần lửa là bí quyết vàng để giúp hạt xôi căng bóng, dẻo mềm dù để lâu.</p>\r\n	</li>\r\n	<li>\r\n	<p>Thịt kho kiểu Bắc thường đi kèm hành khô. Thuở xưa, các bà các mẹ thường tận dụng cả vỏ hành khô kho cùng, vừa tiết kiệm lại vừa tạo vị dẻo bùi rất riêng. Các món kho nói chung cũng cần 2 lửa mới lên màu đẹp và đượm vị hơn.</p>\r\n	</li>\r\n</ul>', 0, 11, 1, '', '2023-11-19 16:56:17', '2023-11-19 17:01:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(10) UNSIGNED NOT NULL,
  `title_tag` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tag`
--

INSERT INTO `tag` (`id_tag`, `title_tag`, `slug_tag`, `created_at`, `updated_at`) VALUES
(1, 'dự án', 'du-an', NULL, '2023-11-18 08:18:07'),
(2, 'sài gòn', 'sai-gon', NULL, '2023-11-18 08:20:37'),
(3, 'cắt nước', 'cat-nuoc', NULL, '2023-11-18 08:20:37'),
(4, 'hà nội', 'ha-noi', NULL, '2023-11-18 08:20:37'),
(5, 'đà nẵng', 'da-nang', NULL, '2023-11-18 08:20:37'),
(6, 'thời tiết', 'thoi-tiet', NULL, '2023-11-18 08:20:37'),
(7, 'ngoại hạng anh', 'ngoai-hang-anh', NULL, '2023-11-18 08:20:37'),
(8, 'cây xanh', 'cay-xanh', NULL, '2023-11-18 08:20:37'),
(9, 'quốc hội', 'quoc-hoi', NULL, '2023-11-18 08:20:37'),
(10, 'trường học', 'truong-hoc', NULL, '2023-11-18 08:20:37'),
(11, 'phụ nữ', 'phu-nu', '2023-11-13 16:47:23', '2023-11-18 08:20:37'),
(12, 'pháp luật', 'phap-luat', '2023-11-13 16:59:59', '2023-11-18 08:20:37'),
(14, 'trung quốc', 'trung-quoc', '2023-11-18 08:20:59', '2023-11-18 08:20:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `fullname_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `fullname_user`, `username`, `email_user`, `password_user`, `created_at`, `updated_at`) VALUES
(2, 'Bảo Sơn', 'son123', 'toilaone12@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2023-11-19 07:56:15', '2023-11-19 07:56:15'),
(3, 'Bảo Sơn', 'son12345', 'toilaone12@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2023-11-19 07:58:24', '2023-11-19 07:58:24'),
(5, 'Tuấn', 'tuan', 'baooson3005@gmail.com', '69b21e9c5b38d7c34449a5b290363487', '2023-11-21 16:31:59', '2023-11-21 16:31:59'),
(6, 'Nga', 'nga', 'nga@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2023-11-21 16:33:26', '2023-11-21 16:33:26'),
(7, 'hải', 'hai', 'hai@gmail.com', '3eaba18b022be27a509fd60c1d35a342', '2023-11-21 16:34:42', '2023-11-21 16:34:42'),
(8, 'Thành', 'thanh', 'thanh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2023-11-21 16:36:46', '2023-11-21 16:43:27');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Chỉ mục cho bảng `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

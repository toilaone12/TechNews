-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2023 lúc 04:53 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.3.33

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
  `username` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'son', 'e10adc3949ba59abbe56e057f20f883e', 0, '2023-11-06 16:08:46', '2023-11-06 16:08:46');

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
(1, 'Xã hội', 0, 'xa-hoi', '2023-11-10 16:50:26', '2023-11-10 16:50:26'),
(2, 'Thể thao', 0, 'the-thao', '2023-11-10 16:51:03', '2023-11-10 17:37:25'),
(3, 'Thời sự', 0, 'thoi-su', '2023-11-10 17:14:49', '2023-11-10 17:14:49'),
(4, 'Chính trị', 3, 'chinh-tri', '2023-11-10 17:19:32', '2023-11-10 17:19:32'),
(6, 'Dân sinh', 3, 'dan-sinh', '2023-11-10 17:44:04', '2023-11-10 17:44:04');

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
(1, 6, '/storage/news/dan_sinh-233507.jpg', 'Hàng chục nghìn hộ ở TP Thủ Đức và Nam Sài Gòn bị cắt nước', 'hang-chuc-nghin-ho-o-tp-thu-duc-va-nam-sai-gon-bi-cat-nuoc', 'Để bảo trì tủ điện nhà máy nước BOO Thủ Đức, hàng chục nghìn hộ ở quận 7, 8, Nhà Bè, Cần Giờ, Bình Chánh, TP Thủ Đức sẽ bị cắt nước, nước yếu đêm cuối tuần.', '<p>Để bảo trì tủ điện nhà máy nước BOO Thủ Đức, hàng chục nghìn hộ ở quận 7, 8, Nhà Bè, Cần Giờ, Bình Chánh, TP Thủ Đức sẽ bị cắt nước, nước yếu đêm cuối tuần.</p>\r\n\r\n<p>Nước sẽ bị cắt trong 3 giờ, từ 23h ngày 11 đến 2h ngày 12/11. Trong đó, khu vực bị cắt nước toàn bộ gồm: quận 7 (trừ Khu chế xuất Tân Thuận), huyện Nhà Bè và Cần Giờ. Quận 8 gồm các phường: 1, 2, 3, 4, 5, 8, 9.</p>\r\n\r\n<p>11 khu vực ở TP Thủ Đức cũng bị cắt nước trong thời gian bảo trì, gồm: phường An Phú, Bình An, Bình Khánh, An Khánh, Thủ Thiêm, An Lợi Đông, Phước Bình, Phước Long A, Phước Long B, Tăng Nhơn Phú B và Khu Công nghệ cao. Tại Bình Chánh, nước sẽ cắt toàn bộ ở xã Bình Hưng và xã Phong Phú bị nước yếu.</p>\r\n\r\n<p><img alt=\"Công nhân kiểm tra hệ thống cấp nước ở nhà máy BOO Thủ Đức. Ảnh: Sawaco\" src=\"https://i1-vnexpress.vnecdn.net/2023/11/10/Co-ng-nha-n-Nha-ma-y-nu-o-c-BO-8241-3756-1699589144.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=oNgkZoGp8cAd50nReRmqnw\" /></p>\r\n\r\n<p style=\"text-align:center\">Công nhân kiểm tra hệ thống cấp nước ở nhà máy BOO Thủ Đức. Ảnh:&nbsp;<em>Sawaco</em></p>\r\n\r\n<p>Tổng Công ty Cấp nước Sài Gòn (Sawaco), cho biết khi hệ thống cấp nước hoạt động lại, một số nơi xa nguồn có thể sẽ phục hồi chậm hơn dự kiến. Đơn vị sẽ điều tiết mạng lưới cấp nước, đồng thời tăng cường tiếp nước bằng xe bồn đến các nơi quan trọng bị ảnh hưởng.</p>\r\n\r\n<p>Nhà máy nước BOO Thủ Đức khánh thành năm 2010 với tổng mức đầu tư 1.600 tỷ đồng, cung cấp nước sạch cho gần một triệu người ở các quận huyện phía Đông và Nam của TP HCM. Công trình có trạm bơm nước thô công suất 315.000 m3/ngày; nhà máy nước xử lý nước công suất 300.000 m3/ngày; tuyến ống chuyển tải nước sạch chiều dài gần 26 km có đường kính từ D900 mm đến D2000 mm.</p>', 0, 0, 1, '[\"2\",\"3\",\"4\"]', '2023-11-11 15:25:47', '2023-11-12 15:52:38'),
(2, 4, '/storage/news/chinh_tri-224141.jpg', '\'Dự án cảng Liên Chiểu là động lực dài hạn cho Đà Nẵng\'', 'du-an-cang-lien-chieu-la-dong-luc-dai-han-cho-da-nang', 'Đà Nẵng bắt đầu chững lại sau \"những bước tiến dài\", do vậy dự án cảng Liên Chiểu là động lực dài hạn cho thành phố thời gian tới, theo Chủ tịch Quốc hội.', '<p>Đà Nẵng bắt đầu chững lại sau \"những bước tiến dài\", do vậy dự án cảng Liên Chiểu là động lực dài hạn cho thành phố thời gian tới, theo Chủ tịch Quốc hội.</p>\r\n\r\n<p>Sáng 11/11, Chủ tịch Quốc hội Vương Đình Huệ dự Ngày hội đại đoàn kết toàn dân tộc ở Khu dân cư 10, phường Hòa Hiệp Bắc, quận Liên Chiểu sau khi kiểm tra thực tế tiến độ dự án cảng Liên Chiểu dưới chân đèo Hải Vân. Đây là khu dân cư gần biển, ga đường sắt Kim Liên, nơi thành phố đang triển khai dự án cảng.</p>\r\n\r\n<p><img alt=\"Chủ tịch Quốc hội kiểm tra tiến độ thi công Cảng Liên Chiểu. Ảnh: Nguyễn Đông\" src=\"https://i1-vnexpress.vnecdn.net/2023/11/11/z4869713458395-711d11fb5c89edc-1539-5784-1699692998.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=GXkTGKgPVAYaMUpINeagzg\" /></p>\r\n\r\n<p>Chủ tịch Quốc hội kiểm tra tiến độ thi công Cảng Liên Chiểu. Ảnh:&nbsp;<em>Nguyễn Đông</em></p>\r\n\r\n<p>Nói chuyện với người dân, ông Huệ cho hay Liên Chiểu theo quy hoạch là cảng nước sâu loại I có vị trí quan trọng, điểm kết nối của hành lang kinh tế Đông Tây quốc tế, cửa ngõ của cả miền Trung.</p>\r\n\r\n<p>Công suất tính toán của cảng đến năm 2045 lên đến 100 triệu tấn hàng hóa thông qua một năm. Khi đi vào sử dụng, bến tàu tổng hợp của cảng có quy mô 100.000 tấn, bến cảng container 200.000 tấn. Theo Chủ tịch Quốc hội, hiếm có cảng nào trong thành phố có quy mô như Cảng Liên Chiểu. Nhà nước sẽ đầu tư 3.000 tỉ đồng để đầu tư hạ tầng dùng chung, kêu gọi đầu tư đồng bộ cảng này.</p>\r\n\r\n<p>\"TP Hải Phòng thu ngân sách hơn 100.000 tỷ đồng một năm nhờ vào cảng. TP HCM thu xuất nhập khẩu mỗi năm 140.000 tỷ đồng cũng nhờ có cảng. Còn TP Đà Nẵng chỉ loanh quanh ở mức vài chục ngàn tỷ đồng\", ông Huệ nói, cho hay 10 tháng qua, thành phố thu ngân sách chỉ 18.000-19.000 tỷ đồng. Do vậy, cảng Liên Chiểu sẽ giúp tăng thu ngân sách và là một trong những động lực dài hạn cho Đà Nẵng thời gian tới.</p>\r\n\r\n<p><img alt=\"Khu vực cảng Liên Chiểu đang thi công. Ảnh: Nguyễn Đông\" src=\"https://i1-vnexpress.vnecdn.net/2023/11/11/lie-n-chie-u-jpeg-1975-1699703346.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=MM7YUFCVTDKehDQUZ-caJw\" /></p>\r\n\r\n<p>Khu vực cảng Liên Chiểu đang thi công. Ảnh:&nbsp;<em>Nguyễn Đông</em></p>\r\n\r\n<p>Khu dân cư Hiệp Hòa Bắc có tổng số hồ sơ phải giải tỏa của dự án là 255, trong đó có 40 hồ sơ đất ở, 196 hồ sơ đất nông nghiệp; 19 hồ sơ đất khác. Phản ánh tới Chủ tịch Quốc hội, nhiều hộ dân cho biết giá trị đền bù đất, nhà, vật kiến trúc khác, không đủ tiền để nộp tiền đất tái định cư và xây dựng lại nhà ở. Trong khi đó, bà con không thuộc diện được nợ tiền đất tái định cư theo quy định.</p>\r\n\r\n<p>Ngoài ra, một số hộ đông nhân khẩu, ba thế hệ sinh sống, bị thu hồi đất nhưng được bố trí một lô tái định cư hoặc một căn hộ chung cư nên rất chật chội, không đảm bảo cuộc sống tốt hơn nơi ở cũ theo tinh thần Nghị quyết số 18 của Trung ương.</p>\r\n\r\n<p>Ghi nhận ý kiến, Chủ tịch Quốc hội yêu cầu địa phương chăm lo hơn nữa đời sống nhân dân trong vùng, nhất là các hộ dân bị ảnh hưởng vì phải giải tỏa để nhường đất cho dự án. Đồng thời, chính quyền cần quan tâm sinh kế của người dân khi thực hiện dự án, chuyển đổi từ nghề nông, ngư nghiệp sang dịch vụ logistics, nghề thủ công... để nâng cao thu nhập.</p>\r\n\r\n<p>Cho rằng khi thi công dự án không tránh khỏi vướng mắc, phát sinh và ít nhiều ảnh hưởng đến đời sống của người dân, ông đề nghị người dân \"chung tay, đồng thuận với chính quyền địa phương trong thực hiện dự án\".</p>\r\n\r\n<p>Dự án Cảng Liên Chiểu có diện tích 450 ha, gồm 8 bến container tiếp nhận tàu 30.000-200.000 DWT; 6 bến tổng hợp tiếp nhận tàu 30.000-100.000 DWT; 1.200m bến thủy nội địa và 6 bến hàng lỏng, khí; công suất khai thác đạt 50 triệu tấn mỗi năm vào năm 2050. Tổng mức đầu tư hơn 3.400 tỷ đồng, trong đó nguồn vốn từ ngân sách trung ương giai đoạn 2021-2025 khoảng 3.000 tỷ đồng, phần còn lại sử dụng ngân sách địa phương.</p>\r\n\r\n<p>Dự án khởi công cuối năm 2022, dự kiến hoàn thành cuối năm 2025. Khi Cảng Liên Chiểu đi vào khai thác sẽ giảm tải cho Cảng Tiên Sa hiện hữu (dự kiến chuyển đổi chuyên phục vụ tàu du lịch), đồng thời giảm áp lực vận tải trong nội đô.</p>', 0, 0, 1, '0', '2023-11-11 15:41:41', '2023-11-12 15:08:30'),
(4, 4, '/storage/news/chinh_tri1-222944.jpg', 'Hà Nội có thể được tăng quyền ở nhiều lĩnh vực', 'ha-noi-co-the-duoc-tang-quyen-o-nhieu-linh-vuc', 'Hà Nội được quyết định chủ trương dự án đầu tư công số vốn đến 20.000 tỷ, lập cơ quan chuyên trách, tăng đại biểu HĐND TP là những chính sách lớn trong dự thảo Luật Thủ đô sửa đổi.', '<p>Hà Nội được quyết định chủ trương dự án đầu tư công số vốn đến 20.000 tỷ, lập cơ quan chuyên trách, tăng đại biểu HĐND TP là những chính sách lớn trong dự thảo Luật Thủ đô sửa đổi.</p>\r\n\r\n<p>Phân cấp thẩm quyền quyết định đầu tư</p>\r\n\r\n<p>Tại Điều 43 dự thảo, Chính phủ đề xuất HĐND TP Hà Nội được quyết định chủ trương dự án đường sắt đô thị; dự án sử dụng vốn đầu tư công tối đa 20.000 tỷ đồng; dự án sử dụng ngân sách trung ương, nguồn vốn ODA, vốn vay ưu đãi của nước ngoài; dự án đầu tư công liên tỉnh nằm trong vùng Thủ đô.</p>\r\n\r\n<p>Theo Luật Đầu tư công hiện nay, những dự án quan trọng quốc gia (số vốn từ 10.000 tỷ đồng) thuộc thẩm quyền quyết định của Quốc hội. Dự án đầu tư sử dụng vốn vay ODA và vốn vay ưu đãi của các nhà tài trợ nước ngoài thuộc thẩm quyền Thủ tướng.</p>\r\n\r\n<p>Ngoài ra, dự thảo cũng phân quyền cho UBND TP Hà Nội chấp thuận chủ trương đầu tư các dự án thuộc thẩm quyền của Thủ tướng theo Luật Đầu tư, Luật Công nghệ cao như dự án đầu tư xây dựng nhà ở (để bán, cho thuê, cho thuê mua), khu đô thị có quy mô sử dụng dưới 500 ha hoặc quy mô dân số từ 50.000 người trở lên; dự án đầu tư xây dựng và kinh doanh kết cấu hạ tầng khu công nghiệp, khu chế xuất, khu công nghệ cao.</p>\r\n\r\n<p>Phát biểu tại phiên họp tổ về dự thảo luật chiều 10/11, Bí thư Thành ủy Hà Nội Đinh Tiến Dũng cho rằng việc phân cấp mạnh mẽ về thẩm quyền đầu tư giúp Thủ đô tháo gỡ nhiều rào cản trong những dự án trọng điểm, tác động lớn và dự án đường sắt đô thị. Thành phố có thể tự giải quyết nhiều vấn đề cấp thiết, tránh phải xin ý kiến Chính phủ hoặc chờ Quốc hội họp để quyết định.</p>\r\n\r\n<p>Tàu chạy thử trên tuyến đường sắt đô thị Nhổn - Ga Hà Nội tháng 12/2022. Ảnh: Ngọc Thành<br />\r\nTàu chạy thử trên tuyến đường sắt đô thị Nhổn - Ga Hà Nội tháng 12/2022. Ảnh: Ngọc Thành</p>\r\n\r\n<p>Tăng thêm 30 đại biểu HĐND TP Hà Nội</p>\r\n\r\n<p>Chính phủ đề xuất tăng số lượng đại biểu HĐND từ 95 lên 125, tăng tỷ lệ đại biểu HĐND chuyên trách từ 20% lên 25% nhằm nâng cao năng lực, tính chuyên nghiệp và hiệu quả hoạt động của HĐND.</p>\r\n\r\n<p>Theo lý giải của cơ quan soạn thảo, số lượng người cư trú thường xuyên và làm việc tại Hà Nội trên 10 triệu, 95 đại biểu HĐND TP như hiện nay, bình quân 105.000 người dân có một đại biểu, thấp hơn bình quân chung cả nước. Nếu không đủ số lượng đại biểu HĐND thì không bảo đảm được tính đại diện, quyền lợi của cử tri và nhân dân Thủ đô.</p>\r\n\r\n<p>HĐND TP dự kiến sẽ có thêm hơn 110 nhiệm vụ, quyền hạn có yêu cầu phân cấp, phân quyền mạnh mẽ hơn trong Luật Thủ đô. Do đó, yêu cầu đặt ra là tổ chức, cơ cấu bộ máy của HĐND TP phải đủ mạnh để nâng cao chất lượng hoạt động, giám sát.</p>\r\n\r\n<p>Cùng với đó, dự thảo cũng cho phép tăng một phó chủ tịch HĐND (hiện hành là 2), mở rộng thành phần của Thường trực HĐND so với quy định của Luật Tổ chức chính quyền địa phương, nhằm bảo đảm nguồn nhân lực lãnh đạo, chỉ đạo, điều hành.</p>\r\n\r\n<p>Theo báo cáo đánh giá tác động của Bộ Tư pháp, với việc không tổ chức HĐND cấp phường nhiệm kỳ 2026-2031, số đại biểu HĐND các cấp của Hà Nội sẽ ít hơn so với quy định khoảng 7.000. \"Như vậy việc tăng thêm 30 đại biểu HĐND TP như dự kiến không làm phát sinh thêm ngân sách của thành phố\", Bộ Tư pháp nêu.</p>\r\n\r\n<p>Khung pháp lý cho hai thành phố trực thuộc</p>\r\n\r\n<p>Ngoài 20 đô thị được xác định tại Quy hoạch chung Thủ đô, Hà Nội sẽ hình thành thêm 2 thành phố trực thuộc tại khu vực phía Bắc - thành phố logistic, dịch vụ (vùng Đông Anh, Mê Linh, Sóc Sơn) và phía Tây - thành phố về giáo dục, đào tạo, khoa học (vùng Hòa Lạc, Xuân Mai).</p>\r\n\r\n<p>Về cơ cấu tổ chức, dự thảo cũng cho phép xây dựng HĐND, UBND TP thuộc Hà Nội và được áp dụng một số đặc thù vượt trội so với cơ cấu tổ chức của quận, huyện, thị xã. Số lượng phó chủ tịch HĐND tăng từ một lên hai, phó chủ tịch UBND từ ba lên bốn và đại biểu HĐND chuyên trách từ sáu lên chín.</p>\r\n\r\n<p>Để thực hiện quy hoạch trên, Bộ Tư pháp (cơ quan chủ trì soạn thảo) cho rằng, Hà Nội phải có giải pháp, nguồn lực tài chính phát triển hệ thống vận tải hành khách đồng bộ, đặc biệt là hệ thống đường sắt đô thị, xe buýt nhanh (BRT) và xe buýt thường.</p>\r\n\r\n<p>Do vậy, dự thảo luật cho phép HĐND TP Hà Nội quyết định chủ trương đầu tư dự án TOD (phát triển đô thị dựa trên giao thông công cộng) phù hợp điều kiện về ngân sách, diện tích đất có thể đấu giá để thực hiện tái thiết, xây dựng đô thị mới; sử dụng ngân sách địa phương để bồi thường, hỗ trợ, tái định cư.</p>\r\n\r\n<p>Các cơ chế huy động nguồn lực để phát triển đường sắt đô thị bao gồm đấu giá quyền sử dụng đất, quyền sử dụng không gian ngầm, khoảng không trên cao trong khu vực TOD. Tiền thu được phục vụ đầu tư đường sắt đô thị, hệ thống giao thông công cộng kết nối với hệ thống đường sắt đô thị, hạ tầng kỹ thuật kết nối đến nhà ga.</p>\r\n\r\n<p>Trung tâm Đổi mới sáng tạo Quốc gia tại Khu Công nghệ cao Hòa Lạc (NIC cơ sở Hòa Lạc). Ảnh: Giang Huy<br />\r\nTrung tâm Đổi mới sáng tạo Quốc gia tại Khu Công nghệ cao Hòa Lạc (NIC cơ sở Hòa Lạc). Ảnh: Giang Huy</p>\r\n\r\n<p>Hà Nội được thành lập thêm cơ quan chuyên môn trực thuộc</p>\r\n\r\n<p>Dự thảo quy định phân quyền cho UBND TP Hà Nội điều chỉnh một số nhiệm vụ, quyền hạn của cơ quan chuyên môn, tổ chức hành chính khác thuộc UBND quận, huyện, thị xã; quy định tổ chức bộ máy, chức năng, nhiệm vụ, quyền hạn của cơ quan chuyên môn, tổ chức hành chính đặc thù thuộc UBND TP Hà Nội, UBND quận, huyện, thị xã; quyết định thành lập, tổ chức lại, giải thể đơn vị sự nghiệp công lập thuộc phạm vi quản lý.</p>\r\n\r\n<p>Cơ chế này tương ứng việc Ban Quản lý an toàn thực phẩm - một mô hình riêng của TP HCM có thể được nâng lên thành Sở để thực hiện hiệu quả công tác quản lý nhà nước về vệ sinh, an toàn thực phẩm trên địa bàn. Đây cũng là một nội dung đáng chú ý trong Nghị quyết 98 về thí điểm một số cơ chế, chính sách đặc thù phát triển TP HCM.</p>\r\n\r\n<p>Mô hình này sẽ khắc phục hạn chế về công tác bảo đảm vệ sinh, an toàn thực phẩm mà hiện theo pháp luật hiện hành được quản lý bởi 3 cơ quan y tế, nông nghiệp, công thương, vốn gặp nhiều vướng mắc trong thực tiễn các đô thị lớn như Hà Nội, TP HCM.</p>\r\n\r\n<p>Dự thảo Luật Thủ đô (sửa đổi) dự kiến được Quốc hội xem xét, thông qua tại kỳ họp giữa năm 2024.</p>', 0, 0, 1, '[\"4\"]', '2023-11-12 15:29:45', '2023-11-12 15:29:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(10) UNSIGNED NOT NULL,
  `title_tag` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tag`
--

INSERT INTO `tag` (`id_tag`, `title_tag`, `created_at`, `updated_at`) VALUES
(1, 'dự án', NULL, NULL),
(2, 'sài gòn', NULL, NULL),
(3, 'cắt nước', NULL, NULL),
(4, 'hà nội', NULL, NULL),
(5, 'đà nẵng', NULL, NULL),
(6, 'thời tiết', NULL, NULL),
(7, 'ngoại hạng anh', NULL, NULL),
(8, 'cây xanh', NULL, NULL),
(9, 'quốc hội', NULL, NULL),
(10, 'trường học', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `name_user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

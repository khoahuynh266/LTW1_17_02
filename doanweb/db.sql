-- phpMyAdmin SQL Dump
-- version 474
-- https://wwwphpmyadminnet/
--
-- Máy chủ: 127001
-- Thời gian đã tạo: Th1 07, 2018 lúc 05:28 AM
-- Phiên bản máy phục vụ: 10128-MariaDB
-- Phiên bản PHP: 7110

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `a`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id_donhang` int(11) UNSIGNED NOT NULL,
  `id_sanpham` int(11) UNSIGNED NOT NULL,
  `soluong` int(11) NOT NULL COMMENT 'số lượng',
  `giaban` double NOT NULL,
  `giatien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_nguoidung` int(11) UNSIGNED NOT NULL,
  `tongsp` int(11) DEFAULT NULL COMMENT 'tổng số sản phẩm',
  `tongtien` int(11) DEFAULT NULL COMMENT 'tổng giá trị',
  `trangthai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_nguoidung` int(11) UNSIGNED NOT NULL,
  `id_sanpham` int(11) UNSIGNED NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_san_pham`
--

CREATE TABLE `loai_san_pham` (
  `id` int(11) UNSIGNED NOT NULL,
  `ten` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_san_pham`
--

INSERT INTO `loai_san_pham` (`id`, `ten`) VALUES
(1, 'Điện thoại'),
(2, 'LapTop'),
(3, 'Máy tính bảng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_san_xuat`
--

CREATE TABLE `nha_san_xuat` (
  `id` int(11) UNSIGNED NOT NULL,
  `ten` varchar(50) CHARACTER SET utf8 NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` text CHARACTER SET utf8,
  `phone` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_san_xuat`
--

INSERT INTO `nha_san_xuat` (`id`, `ten`, `diachi`, `email`, `phone`, `images`) VALUES
(1, 'SamSung', 'Seoul, Hàn Quốc', 'support@samsungvn', '1800 588 890', 'images/SamSung.jpg'),
(2, 'Oppo', 'Đông Hoản, Trung Quốc', 'service@oppovn', '(028)38229844', 'images/Oppo.jpg'),
(3, 'Apple', 'Cupertino, California', 'support@Applevn', '358 63 53 47 005', 'images/apple.jpg'),
(4, 'Sony', 'Minato, Tokyo, Tōkyō, Nhật Bản', 'support@Sonyvn', '180 058 885', 'images/sony.jpg'),
(5, 'Nokia', 'Karaportti 3, 02611 Espoo, Finland', 'support@nokiacom', '358 11 44 88 000', 'images/Nokia.jpg'),
(6, 'HTC', 'Tân Bắc, Đài Loan', 'support@htcvn', '1900 555567', 'images/HTC.jpg'),
(7, 'Xiaomi', 'Hải Điến, Bắc Kinh, Trung Quốc', 'support@Xiaomivn', '351 04 48 80 003', 'images/Xiaomi.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) UNSIGNED NOT NULL,
  `tensp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loai` int(11) UNSIGNED NOT NULL,
  `id_nsx` int(11) UNSIGNED NOT NULL,
  `gia` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `mota` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xuatsu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `luotxem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `tensp`, `loai`, `id_nsx`, `gia`, `soluong`, `mota`, `image`, `xuatsu`, `created_at`, `luotxem`) VALUES
(1, 'Điện thoại Samsung Galaxy Note 8', 1, 1, 22490000, 100, 'Galaxy Note 8 là niềm hy vọng vực lại dòng Note danh tiếng của Samsung với diện mạo nam tính, sang trọng. Trang bị camera kép xóa phông thời thượng, màn hình vô cực như trên S8 Plus, bút Spen với nhiều tính năng mới và nhiều công nghệ được Samsung ưu ái đem lên Note 8.', 'images/1.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(2, 'Điện thoại Samsung Galaxy S8 Plus', 1, 1, 20490000, 100, 'Galaxy S8 và S8 Plus hiện đang là chuẩn mực smartphone về thiết kế trong tương lai', 'images/2.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(3, 'Điện thoại Samsung Galaxy S8', 1, 1, 18490000, 100, 'Galaxy S8 và S8 Plus hiện đang là chuẩn mực smartphone về thiết kế trong tương lai', 'images/3.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(4, 'Điện thoại Samsung Galaxy Note FE', 1, 1, 13990000, 100, 'Đúng như tên gọi, Samsung Galaxy Note FE (Fan Edition) được ra mắt dành cho các fan trung thành của dòng sản phẩm này, thuộc phân khúc cao cấp, Note FE trang bị những tính năng hàng đầu, giá tốt', 'images/4.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(5, 'Điện thoại Samsung Galaxy ', 1, 1, 10990000, 100, 'Camera selfie kép chuyên nghiệpThiết kế hoàn hảo trong lòng bàn tayChuẩn kháng nước và bụi đỉnh cao', 'images/5.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(6, 'Điện thoại Samsung Galaxy A8+ (2018)', 1, 1, 13490000, 100, 'Camera selfie kép chuyên nghiệpThiết kế hoàn hảo trong lòng bàn tayChuẩn kháng nước và bụi đỉnh cao', 'images/6.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(7, 'Điện thoại Samsung Galaxy A7 (2017)', 1, 1, 9990000, 100, 'Samsung Galaxy A7 (2017) tạo bước đột phá cho dòng A với thiết kế sang trọng và đẳng cấp, cấu hình mạnh mẽ, nhiều tiện ích cao cấp', 'images/7.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(8, 'Điện thoại Samsung Galaxy C9 Pro', 1, 1, 9990000, 100, 'Samsung Galaxy C9 Pro gây được sự chú ý cho người dùng bởi nó sở hữu mức RAM lên tới 6 GB, lần đầu tiên có một chiếc Galaxy đến từ Samsung sở hữu mức RAM đó', 'images/8.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(9, 'Điện thoại Samsung Galaxy J7+', 1, 1, 8690000, 100, 'Samsung Galaxy J7+ là dòng smartphone tầm trung nhưng được trang bị camera kép có khả năng chụp ảnh xóa phông chân dung cùng thiết kế đẹp và hiệu năng mạnh mẽ', 'images/9.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(10, 'Điện thoại Samsung Galaxy A5 (2017)', 1, 1, 7990000, 100, 'Đẳng cấp, sang trọng, dẫn đầu xu thế là những từ ngữ chuẩn xác để miêu tả về điện thoại Samsung Galaxy A5(2017)', 'images/10.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(11, 'Điện thoại Oppo F5', 1, 2, 6990000, 100, 'OPPO F5, chuyên gia selfie mới nổi bật với màn hình tràn cạnh thời trang và camera tích hợp trí tuệ nhân tạo AI để càng chụp càng đẹp', 'images/11.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(12, 'Điện thoại OPPO F3 Plus', 1, 2, 10690000, 100, 'Sau sự thành công của F1 Plus, OPPO F3 Plus đang được người dùng quan tâm yêu thích với cụm camera selfie kép, công nghệ chụp thiếu sáng đỉnh cao, cấu hình mạnh mẽ và tất nhiên đó là thiết kế nguyên khối quá ư là sang trọng', 'images/12.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(13, 'Điện thoại OPPO F5 6GB', 1, 2, 8990000, 100, 'OPPO F5 6GB là phiên bản nâng cấp cấu hình của chiếc OPPO F5, chuyên gia selfie làm đẹp thông minh và màn hình tràn viền tuyệt đẹp', 'images/13.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(14, 'Điện thoại OPPO F5 Youth', 1, 2, 6190000, 100, 'OPPO F5 Youth, phiên bản giá rẻ của chuyên gia selfie, màn hình tràn cạnh OPPO F5 với thiết kế và tính năng hoàn toàn tương đương nhưng thông số cấu mình phần cứng kém hơn một chút', 'images/14.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(15, 'Điện thoại OPPO F3 Lite (A57)', 1, 2, 5490000, 100, 'OPPO A57 là phiên bản rút gọn của Oppo F1s có mức giá dễ chịu hơn nhưng vẫn cho những trải nghiệm gần như tương đương', 'images/15.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(16, 'Điện thoại iPhone X 256GB', 1, 3, 34790000, 100, 'iPhone X mang trên mình thiết kế hoàn toàn mới với màn hình Super Retina viền cực mỏng và trang bị nhiều công nghệ hiện đại như nhận diện khuôn mặt Face ID, sạc pin nhanh và sạc không dây cùng khả năng chống nước bụi cao cấp', 'images/16.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(17, 'Điện thoại iPhone X 64GB', 1, 3, 29990000, 100, '"iPhone X giá" là cụm từ được rất nhiều người mong chờ và tìm kiếm trên Google bởi đây là chiếc điện thoại mà Apple kỉ niệm 10 năm iPhone đầu tiên được bán ra', 'images/17.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(18, 'Điện thoại iPhone 8 Plus 256GB', 1, 3, 28790000, 100, 'iPhone 8 Plus là bản nâng cấp nhẹ của chiếc iPhone 7 Plus đã ra mắt trước đó với cấu hình mạnh mẽ cùng camera có nhiều cải tiến', 'images/18.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(19, 'Điện thoại iPhone 8 256GB', 1, 3, 25790000, 100, 'iPhone 8 là bản nâng cấp nhẹ của chiếc iPhone 7 đã ra mắt trước đó với cấu hình mạnh mẽ cùng camera có nhiều cải tiến', 'images/19.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(20, 'Điện thoại iPhone 8 Plus 64GB', 1, 3, 23990000, 200, 'Thừa hưởng thiết kế đã đạt đến độ chuẩn mực, thế hệ iPhone 8 Plus thay đổi phong cách bóng bẩy hơn và bổ sung hàng loạt tính năng cao cấp cho trải nghiệm sử dụng vô cùng tuyệt vờ', 'images/20.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(21, 'Điện thoại iPhone 7 Plus 256GB', 1, 3, 23990000, 100, 'Với thiết kế không quá nhiều thay đổi, vẫn bảo tồn vẻ đẹp truyền thống từ thời iPhone 6 Plus,  iPhone 7 Plus được trang bị nhiều nâng cấp đáng giá như camera kép, đạt chuẩn chống nước chống bụi cùng cấu hình cực mạnh', 'images/21.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(22, 'Điện thoại iPhone 7 Plus Red 256GB', 1, 3, 23990000, 100, 'iPhone 7 Plus Red 256GB là phiên bản iPhone 7 Plus mới được Apple giới thiệu với màu sắc mới là màu Red nhằm kỉ niệm 10 năm hợp tác giữa Apple và (RED) – một tổ chức gây quỹ hỗ trợ phòng chống AIDS', 'images/22.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(23, 'Điện thoại iPhone 7 Plus 128GB', 1, 3, 22990000, 100, 'Với thiết kế không quá nhiều thay đổi, vẫn bảo tồn vẻ đẹp truyền thống từ thời iPhone 6 Plus,  iPhone 7 Plus được trang bị nhiều nâng cấp đáng giá như camera kép, đạt chuẩn chống nước chống bụi cùng cấu hình cực mạnh', 'images/23.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(24, 'Điện thoại iPhone 8 64GB', 1, 3, 20990000, 200, 'iPhone 8 64GB nổi bật với điểm nhấn mặt lưng kính kết hợp cạnh viền và mặt trước giữ nguyên thiết kế như iPhone 7, cùng với đó là hàng loạt công nghệ đáng mong đợi như sạc nhanh, không dây hay hỗ trợ thực tế ảo AR', 'images/24.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(25, 'Điện thoại iPhone 7 Plus 32GB', 1, 3, 19990000, 100, 'Với thiết kế không quá nhiều thay đổi, vẫn bảo tồn vẻ đẹp truyền thống từ thời iPhone 6 Plus,  iPhone 7 Plus 32GB được trang bị nhiều nâng cấp đáng giá như camera kép, đạt chuẩn chống nước chống bụi cùng cấu hình cực mạnh', 'images/25.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(26, 'Điện thoại iPhone 7 256GB', 1, 3, 19990000, 200, 'iPhone 7 256 GB mang trên mình thiết kế quen thuộc từ thời iPhone 6, máy được trang bị bộ nhớ lưu trữ lớn, khả năng chống nước cao cấp, dàn loa stereo cho âm thanh hay và cấu hình cực mạnh', 'images/26.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(27, 'Điện thoại iPhone 7 128GB', 1, 3, 18990000, 200, 'iPhone 7 128 GB mang trên mình thiết kế quen thuộc từ thời iPhone 6, máy được trang bị bộ nhớ lưu trữ lớn, khả năng chống nước cao cấp, dàn loa stereo cho âm thanh hay và cấu hình cực mạnh', 'images/27.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(28, 'Điện thoại iPhone 6s 128GB', 1, 3, 16990000, 200, 'iPhone 6s xứng đáng là phiên bản nâng cấp hoàn hảo từ iPhone 6 với nhiều tính năng mới hấp dẫn', 'images/28.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(29, 'Điện thoại iPhone 7 32GB', 1, 3, 15990000, 200, 'iPhone 7 32 GB vẫn mang trên mình thiết kế quen thuộc của từ thời iPhone 6 nhưng có nhiều thay đổi lớn về phần cứng như trang bị khả năng chống nước, dàn loa stereo và cấu hình cực mạnh', 'images/29.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(30, 'Điện thoại iPhone 6s Plus 32GB', 1, 3, 13990000, 200, 'iPhone 6s Plus 32 GB là phiên bản nâng cấp hoàn hảo từ iPhone 6 Plus với nhiều tính năng mới hấp dẫn', 'images/30.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234);
(31, 'Điện thoại iPhone 6 32GB', 1, 3, 8490000, 100, 'iPhone 6 là một trong những smartphone được yêu thích nhất của Apple. Lắng nghe nhu cầu về thiết kế, khả năng lưu trữ và giá cả, iPhone 6 32GB được chính thức phân phối chính hãng tại Việt Nam hứa hẹn sẽ là một sản phẩm rất "Hot".', 'images/31.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(32, 'Điện thoại iPhone 5S 16GB', 1, 3, 5990000, 100, 'Thiết kế sang trọng, gia công tỉ mỉ, tích hợp cảm biến vân tay cao cấp hơn, camera cho hình ảnh đẹp và sáng hơn.', 'images/32.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(33, 'Điện thoại Sony Xperia XZ Premium', 1, 4, 17990000, 100, 'Sony Xperia XZ Premium là flagship của Sony trong năm 2017 với vẻ ngoài hào nhoáng, màn hình cao cấp cũng nhiều trang bị hàng đầu khác.', 'images/33.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(34, 'Điện thoại Sony Xperia XZ Premium Pink Gold', 1, 4, 16490000, 200, 'Sony Xperia XZ Premium Pink Gold là một phiên bản khác của chiếc Sony Xperia XZ Premium với khác biệt duy nhất đến từ màu Pink Gold quyến rũ.', 'images/34.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(35, 'Điện thoại Sony Xperia XZ1', 1, 4, 15990000, 100, 'Sony Xperia XZ1 là mẫu flagship kế tiếp của Sony tiếp nối sự thành công của chiếc Xperia XZs đã ra mắt trước đó với những nâng cấp nhẹ về mặt cấu hình và thiết kế.', 'images/35.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(36, 'Điện thoại Sony Xperia XZs', 1, 4, 12990000, 200, 'Sony Xperia XZs là smartphone được Sony đầu tư mạnh mẽ về camera với hàng loạt các trang bị cao cấp và sở hữu cho mình một mức giá bán hợp lý với người tiêu dùng.', 'images/36.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(37, 'Điện thoại Sony Xperia XZ Dual', 1, 4, 9990000, 200, 'Sony Xperia XZ với thiết kế cực đẹp, cùng camera chất lượng hơn, nhiều tính năng tiện ích hơn.', 'images/37.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(38, 'Điện thoại Sony Xperia XA1 Ultra', 1, 4, 8490000, 200, 'Kế nhiệm sự thành công của phablet không viền Sony Xperia XA Ultra thì Sony giới thiệu phiên bản XA1 Ultra với nhiều cải tiến đáng giá.', 'images/38.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(39, 'Điện thoại Sony Xperia XA1 Ultra Pink', 1, 3, 7490000, 200, 'Sau một thời gian xuất hiện tại Việt Nam và nhận được nhiều sự quan tâm từ người dùng thì mới đây Sony đã tung ra phiên bản màu hồng cho chiếc Sony Xperia XA1 Ultra để phục vụ riêng cho "phái đẹp".', 'images/39..jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234),
(40, 'Điện thoại Sony Xperia X', 1, 3, 7490000, 200, 'Sony vừa giới thiệu dòng sản phẩm X Serie mới của hãng trong năm 2016 tại triển lãm MWC. Xperia X là chiếc smartphone tầm trung mới với nhiều điểm nhấn đáng chú ý.', 'images/40..jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `type`) VALUES
(2, 'admin', 'admin@gmailcom', 'admin', 1),
(3, 'Khoa huynh', 'yumiling1001@gmailcom', '$2y$11$hQSVhxhIWPJz91GMB2FGie7Yjt9hpTDN8aAOZosb7ns8JmSGxkJe', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id_donhang`,`id_sanpham`) USING BTREE,
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nguoidung` (`id_nguoidung`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nguoidung` (`id_nguoidung`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Chỉ mục cho bảng `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nha_san_xuat`
--
ALTER TABLE `nha_san_xuat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loai` (`loai`),
  ADD KEY `id_nsx` (`id_nsx`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`id_donhang`) REFERENCES `don_hang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`id_sanpham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`id_nguoidung`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`id_nguoidung`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gio_hang_ibfk_2` FOREIGN KEY (`id_sanpham`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`id_nsx`) REFERENCES `nha_san_xuat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `san_pham_ibfk_2` FOREIGN KEY (`loai`) REFERENCES `loai_san_pham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

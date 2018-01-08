-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 07, 2018 at 05:56 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ban_hang`
--

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang`
--

DROP TABLE IF EXISTS `chi_tiet_don_hang`;
CREATE TABLE IF NOT EXISTS `chi_tiet_don_hang` (
  `id_donhang` int(10) NOT NULL,
  `id_sanpham` int(10) NOT NULL,
  `soluong` int(11) NOT NULL COMMENT 'số lượng',
  `giaban` double NOT NULL,
  `giatien` int(11) NOT NULL,
  PRIMARY KEY (`id_donhang`,`id_sanpham`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

DROP TABLE IF EXISTS `don_hang`;
CREATE TABLE IF NOT EXISTS `don_hang` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_nguoidung` int(11) DEFAULT NULL,
  `tongsp` int(11) DEFAULT NULL COMMENT 'tổng số sản phẩm',
  `tongtien` int(11) DEFAULT NULL COMMENT 'tổng giá trị',
  `trangthai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gio_hang`
--

DROP TABLE IF EXISTS `gio_hang`;
CREATE TABLE IF NOT EXISTS `gio_hang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_nguoidung` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `tinhtrang` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `gio_hang`
--

INSERT INTO `gio_hang` (`id`, `id_nguoidung`, `id_sanpham`, `soluong`, `tinhtrang`) VALUES
(10, 1, 2, 3, 1),
(84, 4, 2, 1, 1),
(102, 4, 2, 1, 0),
(103, 4, 24, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `loai_san_pham`
--

DROP TABLE IF EXISTS `loai_san_pham`;
CREATE TABLE IF NOT EXISTS `loai_san_pham` (
  `id` int(11) NOT NULL,
  `ten_loai` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `loai_san_pham`
--

INSERT INTO `loai_san_pham` (`id`, `ten_loai`) VALUES
(1, 'Sam'),
(2, 'Op'),
(3, 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `nha_san_xuat`
--

DROP TABLE IF EXISTS `nha_san_xuat`;
CREATE TABLE IF NOT EXISTS `nha_san_xuat` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ten_nsx` varchar(50) CHARACTER SET utf8 NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` text CHARACTER SET utf8,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nha_san_xuat`
--

INSERT INTO `nha_san_xuat` (`id`, `ten_nsx`, `diachi`, `email`, `phone`) VALUES
(1, 'Sam Sung', 'China', 'SamSung@gmail', '01231456789'),
(2, 'Oppo', 'China', 'Oppo@gmail', '01231456788'),
(3, 'Apple', 'Usa', 'Apple@gmail', '01231456787');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

DROP TABLE IF EXISTS `san_pham`;
CREATE TABLE IF NOT EXISTS `san_pham` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tensp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loai` int(10) UNSIGNED NOT NULL,
  `id_nsx` int(10) UNSIGNED DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `mota` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xuatsu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `luotxem` int(11) DEFAULT NULL,
  `DaBan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id`, `tensp`, `loai`, `id_nsx`, `gia`, `soluong`, `mota`, `image`, `xuatsu`, `created_at`, `luotxem`, `DaBan`) VALUES
(1, 'Điện thoại 1', 1, 1, 7500000, 100, '', 'images/1.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1, 20),
(2, 'Điện thoại 2', 1, 1, 9000000, 100, '', 'images/2.jpg', 'Việt Nam', '2017-12-26 10:00:00', 2, 15),
(3, 'Điện thoại 3', 1, 1, 3000000, 100, '', 'images/3.jpg', 'Việt Nam', '2017-12-26 10:00:00', 3, 12),
(4, 'Điện thoại 4', 1, 1, 4000000, 100, 'Đã lâu lắm rồi Apple mới ra mắt một sản phẩm với thiết kế đột phá và liều lĩnh. Dù vấp phải khá nhiều ý kiến trái chiều nhưng cũng không thể phủ nhận độ hấp dẫn của chiếc iPhone thế hệ thứ 10 này. Công nghệ bảo mật mới, loại bỏ nút home truyền thống, camera với những tính năng độc quyền, tất cả đã khiến người dùng đứng ngồi không yên cho đến khi được trên tay.', 'images/4.jpg', 'Việt Nam', '2017-12-26 10:00:00', 4, 12),
(5, 'Điện thoại 5', 1, 1, 5000, 100, '', 'images/5.jpg', 'Việt Nam', '2017-12-26 10:00:00', 5, 23),
(6, 'Điện thoại 6', 1, 1, 6000, 100, '', 'images/6.jpg', 'Việt Nam', '2017-12-26 10:00:00', 7, 3),
(7, 'Điện thoại 7', 1, 1, 7000, 100, '', 'images/7.jpg', 'Việt Nam', '2017-12-26 10:00:00', 8, 9),
(8, 'Điện thoại 8', 1, 1, 8000, 100, '', 'images/8.jpg', 'Việt Nam', '2017-12-26 10:00:00', 12, 6),
(9, 'Điện thoại 9', 1, 1, 9000, 100, '', 'images/9.jpg', 'Việt Nam', '2017-12-26 10:00:00', 34, 5),
(10, 'Điện thoại 10', 1, 1, 10000, 100, '', 'images/10.jpg', 'Việt Nam', '2017-12-26 10:00:00', 45, 3),
(11, 'Điện thoại 11', 2, 2, 11000, 100, '', 'images/11.jpg', 'Việt Nam', '2017-12-26 10:00:00', 67, 9),
(12, 'Điện thoại 12', 2, 2, 12000, 100, '', 'images/12.jpg', 'Việt Nam', '2017-12-26 10:00:00', 78, 5),
(13, 'Điện thoại 13', 2, 2, 13000, 100, '', 'images/13.jpg', 'Việt Nam', '2017-12-26 10:00:00', 89, 19),
(14, 'Điện thoại 14', 2, 2, 14000, 100, '', 'images/14.jpg', 'Việt Nam', '2017-12-26 10:00:00', 34, 0),
(15, 'Điện thoại 15', 2, 2, 15000, 100, '', 'images/15.jpg', 'Việt Nam', '2017-12-26 10:00:00', 34, 0),
(16, 'Điện thoại 16', 3, 3, 16000, 100, '', 'images/16.jpg', 'Việt Nam', '2017-12-26 10:00:00', 45, 0),
(17, 'Điện thoại 17', 3, 3, 17000, 100, '', 'images/17.jpg', 'Việt Nam', '2017-12-26 10:00:00', 23, 0),
(18, 'Điện thoại 18', 3, 3, 18000, 100, '', 'images/18.jpg', 'Việt Nam', '2017-12-26 10:00:00', 12, 0),
(19, 'Điện thoại 19', 3, 3, 19000, 100, '', 'images/19.jpg', 'Việt Nam', '2017-12-26 10:00:00', 76, 0),
(20, 'Điện thoại 20', 3, 3, 20000, 200, '', 'images/20.jpg', 'Việt Nam', '2017-12-26 10:00:00', 56, 0),
(21, 'Điện thoại 21', 3, 3, 21000, 100, '', 'images/21.jpg', 'Việt Nam', '2017-12-26 10:00:00', 54, 0),
(22, 'Điện thoại 22', 3, 3, 22000, 100, '', 'images/22.jpg', 'Việt Nam', '2017-12-26 10:00:00', 64, 0),
(23, 'Điện thoại 23', 3, 3, 23000, 100, '', 'images/23.jpg', 'Việt Nam', '2017-12-26 10:00:00', 94, 0),
(24, 'Điện thoại 24', 3, 3, 24000, 200, '', 'images/24.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234, 0),
(25, 'Điện thoại 25', 3, 3, 25000, 100, '', 'images/25.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234, 0),
(26, 'Điện thoại 26', 3, 3, 26000, 200, '', 'images/26.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234, 0),
(27, 'Điện thoại 27', 3, 3, 27000, 200, '', 'images/27.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234, 0),
(28, 'Điện thoại 28', 3, 3, 28000, 200, '', 'images/28.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234, 0),
(29, 'Điện thoại 29', 3, 3, 29000, 200, '', 'images/29.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234, 0),
(30, 'Điện thoại 30', 3, 3, 20000, 200, '', 'images/30.jpg', 'Việt Nam', '2017-12-26 10:00:00', 1234, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(255) DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `type`, `phone`) VALUES
(1, 'Huỳnh anh khoa', 'yumiling1001@gmail.com', '123123123', 1, '0'),
(2, 'admin', 'admin@gmail.com', 'admin', 1, '0'),
(3, 'khanh', 'khanhthangngulol@gmail.com', '$2y$10$gP0faF7xtpIeurNtCw.JPeSVTMWrfAjeh7z/u.WHM7j/UiE3ecdPW', NULL, '0'),
(4, 'khanhvo1', 'khanhthangngulol1@gmail.com', '$2y$10$Zs3586jvp5BbTxKjcMly8.y0.TtcjOa/mPDa0hzmpaE1AtUI/hwcS', NULL, '01649502951');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

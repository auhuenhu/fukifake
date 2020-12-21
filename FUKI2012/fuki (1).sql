-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 21, 2020 at 04:32 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuki`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `hoten` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `matkhauad` varchar(50) NOT NULL,
  `quyen` int NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`hoten`, `email`, `matkhauad`, `quyen`) VALUES
('Âu Huệ Như', 'auhuenhu2015@gmail.com', '0cb6838b729aac48f5ed54c93f73e7d1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chitiethd`
--

DROP TABLE IF EXISTS `chitiethd`;
CREATE TABLE IF NOT EXISTS `chitiethd` (
  `mahd` int NOT NULL AUTO_INCREMENT,
  `tensp` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `masp` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `loai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gia` int NOT NULL,
  `ngaymua` datetime NOT NULL,
  `soluong` tinyint NOT NULL,
  `vanchuyen` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thanhtoan` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinh` varchar(50) NOT NULL,
  KEY `mahd` (`mahd`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chitiethd`
--

INSERT INTO `chitiethd` (`mahd`, `tensp`, `masp`, `loai`, `gia`, `ngaymua`, `soluong`, `vanchuyen`, `thanhtoan`, `hinh`) VALUES
(1, 'Tranh vải hoạt hình', 'TV01', 'Thỏ cherry', 100000, '2020-12-07 19:46:53', 1, 'Giao tận nơi', 'Thanh toán khi giao hàng (COD)', 'tranh-vai-hoat-hinh.jpg'),
(2, 'Túi vải giả túi nilon', 'T02', 'Trắng', 80000, '2020-12-07 19:54:19', 2, 'Giao tận nơi', 'Thanh toán khi giao hàng (COD)', 'tui-vai-gia-tui-nilon.jpg'),
(3, 'Gương gập Bow Bubbles', 'G01', 'Tím', 45000, '2020-12-07 20:16:52', 2, 'Giao tận nơi', 'Thanh toán khi giao hàng (COD)', 'guong-gap-blow-bubbles.jpg'),
(4, 'Bút highlight Mo huan bi', 'BHL01', 'Tím', 20000, '2020-12-07 20:20:19', 2, 'Nhận tại cửa hàng', 'Thanh toán tiền mặt tại cửa hàng', 'but-highlight-mo-huan-bi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chitietloai`
--

DROP TABLE IF EXISTS `chitietloai`;
CREATE TABLE IF NOT EXISTS `chitietloai` (
  `tenloaichitiet` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maloai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`tenloaichitiet`),
  KEY `maloai` (`maloai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chitietloai`
--

INSERT INTO `chitietloai` (`tenloaichitiet`, `maloai`) VALUES
('Bút gel', 'but'),
('Bút highlight', 'but'),
('Hộp, túi bút', 'ddvp'),
('Gương, lược', 'pkld'),
('Giấy note', 'so'),
('Sổ ghi chép ', 'so');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE IF NOT EXISTS `hoadon` (
  `mahd` int NOT NULL AUTO_INCREMENT,
  `tenkh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaymua` datetime NOT NULL,
  `tinhtrang` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`mahd`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`mahd`, `tenkh`, `diachi`, `sdt`, `email`, `ngaymua`, `tinhtrang`) VALUES
(1, 'Âu Huệ Như', '240 sư vạn hạnh phường 2 quận 10 ', 933714383, 'auhuenhu2015@gmail.com', '2020-12-07 19:46:53', 'Chưa hoàn thành'),
(2, 'Kim Hào', '320 Phạm Hùng quận 8', 936018819, 'haovip185@gmail.com', '2020-12-07 19:54:19', 'Chưa hoàn thành'),
(3, 'Xuân Mai', 'Lý Thái Tổ quận 10 ', 909888999, 'auhuenhu2015@gmail.com', '2020-12-07 20:16:52', 'Chưa hoàn thành'),
(4, 'Tấn Phong', 'Quận Bình Chánh', 933714383, 'auhuenhu2015@gmail.com', '2020-12-07 20:20:19', 'Hoàn thành');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `tenkh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `matkhaukh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gtinh` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`tenkh`, `sdt`, `diachi`, `email`, `matkhaukh`, `gtinh`) VALUES
('Âu Huệ Như', 933714383, '41/5/1 Sư Vạn Hạnh phường 3 quận 10 ', 'auhuenhu2015@gmail.com', '0cb6838b729aac48f5ed54c93f73e7d1', 'Nữ'),
('Lưu Kim Hào', 936018819, 'Phạm Hùng Quận 8 ', 'haovip185@gmail.com', '28495dcbd854d6934b9a16acdb7548a1', 'Nam'),
('Huỳnh Xuân Mai ', 908999666, 'Lý Thái Tổ Quận 10', 'huynhxuanmai@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nữ'),
('Mỹ Tiên', 909090909, '157 đường 3/2 quận 10 ', 'nguyenngocmytien@gmail.com', '0d7507413740776a2525166c15a16f16', 'Nam');

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

DROP TABLE IF EXISTS `loai`;
CREATE TABLE IF NOT EXISTS `loai` (
  `maloai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenloai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`maloai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`) VALUES
('bk', 'Băng keo trang trí '),
('but', 'Bút'),
('ddvp', 'Đồ dùng văn phòng'),
('den', 'Đèn'),
('kl', 'Khung lưới trang trí'),
('lich', 'Lịch'),
('ly', 'Ly, cốc'),
('pkld', 'Phụ kiện làm đẹp'),
('so', 'Sổ, vở'),
('st', 'Sticker'),
('tu', 'Tủ'),
('tui', 'Túi'),
('tv', 'Tranh vải');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `masp` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tensp` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `giaban` int NOT NULL,
  `mota` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soluong` tinyint NOT NULL,
  `hinh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maloai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dacdiem` json DEFAULT NULL,
  `masukien` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenloaichitiet` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` datetime NOT NULL,
  PRIMARY KEY (`masp`),
  KEY `maloai` (`maloai`),
  KEY `masukien` (`masukien`),
  KEY `tenloaichitiet` (`tenloaichitiet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `giaban`, `mota`, `soluong`, `hinh`, `maloai`, `dacdiem`, `masukien`, `tenloaichitiet`, `ngaynhap`) VALUES
('BG01', 'Bút gel mochi có đuôi', 10000, '✨ Set 8 bút gel bấm nhiều hình<br>\r\n\r\n✨ Set bút gel với nét viết nhỏ và êm, mực xuống đều không bị nghẹt mực. Đầu bút và thân bút được làm từ nhựa đặc biệt rất bền và đẹp.<br>\r\n\r\n✨ Bút gel thích hợp cho học sinh, sinh viên và cả các bạn văn phòng.<br>\r\n\r\n✨ Ngòi bút: 0.5 mm, nhiều màu mực.<br>\r\n\r\n✨ Set gồm 8 bút kích thước mỗi cây 14 cm.<br>\r\n\r\n✨ Trọng lượng: 200 gram.<br>', 10, 'but-gel-mochi-co-duoi.jpg', 'but', '{\"dd\": [{\"name\": \"Chuột\"}, {\"name\": \"Mèo\"}, {\"name\": \"Heo\"}, {\"name\": \"Thỏ\"}]}', NULL, 'Bút gel', '2020-10-19 21:58:33'),
('BG02', 'Bút gel thân trắng nhiều hình', 15000, '✨ Bút gel thân trắng nhiều hình.<br>\r\n\r\n✨ Bút gel với rất nhiều màu sắc dễ thương đính nhân vật hoạt hình ở đầu bút.<br>\r\n\r\n✨ Nét viết nhỏ và êm, mực xuống đều không bị nghẹt mực. Đầu bút và thân bút được làm từ nhựa đặc biệt rất bền và đẹp.<br> \r\n\r\n✨ Bút gel thích hợp cho học sinh, sinh viên và cả các bạn văn phòng!<br>\r\n\r\n✨ Ngòi bút: 0.5 mm, mực đen.<br>\r\n\r\n✨ Kích thước: 14 cm.<br> \r\n\r\n✨ Trọng lượng: 50 gram.<br>', 10, 'but-gel-than-trang-nhieu-hinh.jpg', 'but', '{\"dd\": [{\"name\": \"Đùi gà\"}, {\"name\": \"Chuối\"}, {\"name\": \"Kem ốc quế\"}, {\"name\": \"Bắp rang bơ\"}, {\"name\": \"Sữa chua\"}, {\"name\": \"Kẹo\"}, {\"name\": \"Bánh mỳ\"}]}', NULL, 'Bút gel', '2020-10-12 21:58:52'),
('BHL01', 'Bút highlight Mo huan bi', 20000, '', 8, 'but-highlight-mo-huan-bi.jpg', 'but', '{\"dd\": [{\"name\": \"Hồng\"}, {\"name\": \"Tím\"}, {\"name\": \"Xanh lá\"}]}', NULL, 'Bút highlight', '2020-09-10 01:17:59'),
('BK01', 'Masking tape Food girl', 10000, '✨ Masking tape Food girl. <br>\r\n\r\n✨ Băng dính washi tape siêu siêu hot với nhiều họa tiết đáng yêu.<br>\r\n\r\n✨ Dùng làm trang trí các quyển sổ tay hoặc planner để thật nổi bật.<br>\r\n\r\n✨ Rất dễ sử dụng, xé được bằng tay và tái sử dụng nhiều lần.<br>\r\n\r\n✨ Chất liệu: Giấy washi.<br>\r\n\r\n✨ Kích thước: 35 x 6 cm.<br>\r\n\r\n✨ Trọng lượng: 50g.<br>', 10, 'masking-tape-food-girl.jpg', 'bk', '{\"dd\": [{\"name\": \"Nâu\"}, {\"name\": \"Xanh lá\"}, {\"name\": \"Vàng\"}, {\"name\": \"Đỏ\"}]}', NULL, NULL, '2020-12-02 12:26:53'),
('DDVP01', 'Khay để tài liệu trong suốt', 100000, '✨ Khay để tài liệu trong suốt <br>\r\n\r\n✨ Khay để tài liệu giúp bạn cất giữ tài liệu được ngay ngắn, gọn gàng không gấp nhàu.<br>\r\n\r\n\r\n✨ Thiết kế mỏng nhẹ thuận tiện cho việc di dời, nhỏ gọn rất dễ sử dụng.<br>\r\n\r\n\r\n✨ Sản phẩm còn là phụ kiện trang trí cho bàn làm việc thêm đẹp mắt.<br>\r\n\r\n\r\n✨ Chất liệu: Nhựa PP.<br>\r\n\r\n\r\n\r\n✨ Kích thước D x R x C: 26 x 10 x 31 cm.<br>\r\n', 10, 'khay-de-tai-lieu-trong-suot.jpg', 'ddvp', '{\"dd\": [{\"name\": \"Mặc định\"}]}', NULL, NULL, '2020-10-28 22:51:06'),
('G01', 'Gương gập Bow Bubbles', 45000, '✨ Đẹp hơn, nhanh hơn và sang trọng hơn nhờ chiếc gương gập tiện lợi. <br>\r\n\r\n✨ Tiết kiệm diện tích, mang đi du lịch cực dễ dàng.<br>\r\n\r\n\r\n✨ Vật trang trí đẹp mắt giúp tôn lên vẻ chuyên nghiệp và sang trọng nơi bàn trang điểm của bạn.<br>\r\n\r\n\r\n✨ Chất liệu: Giấy, kính<br>\r\n\r\n\r\n✨ Kích thước: 11 x 15,2 cm.<br>\r\n\r\n\r\n✨ Trọng lượng: 100 gram.<br>\r\n', 8, 'guong-gap-blow-bubbles.jpg', 'pkld', '{\"dd\": [{\"name\": \"Hồng\"}, {\"name\": \"Tím\"}, {\"name\": \"Xanh lá\"}]}', NULL, 'Gương, lược', '2020-10-28 22:05:21'),
('T01', 'Túi chéo 2 khóa da', 190000, '✨ Túi chéo 2 khóa da<br>\r\n\r\n✨ Túi đeo chéo cực xinh lại đựng được rất nhiều đồ nhé!<br>\r\n\r\n✨ Có em túi này thì tha hồ đi chơi, đi học hay đi làm đựng được nhiều đồ mà lại rất phong cách nữa.<br>\r\n\r\n✨ Chất liệu: Vải dệt bóng + Khóa da.<br>\r\n\r\n✨ Kích thước D x R x C: 19 x 6 x 15 cm, dây dài 19 cm.<br>\r\n\r\n✨ Trọng lượng: 100 gram.<br>', 10, 'tui-cheo-2-khoa-da.jpg;tui-cheo-2-khoa-da-2.jpg', 'tui', '{\"dd\": [{\"name\": \"Xanh dương\"}, {\"name\": \"Xanh lá\"}, {\"name\": \"Vàng\"}, {\"name\": \"Hồng\"}, {\"name\": \"Đen\"}]}', NULL, NULL, '2020-10-28 22:55:16'),
('T02', 'Túi vải giả túi nilon', 80000, '✨ Túi vải cực xinh lại đựng được rất nhiều đồ nhé! <br>\r\n\r\n✨ Có em túi vải này thì tha hồ đi chơi, đi học hay đi làm đựng được nhiều đồ mà lại gọn nữa.<br>\r\n\r\n✨ Chất liệu: Vải canvas.<br>\r\n\r\n✨ Kích thước: 30 x 49 cm.<br>', 8, 'tui-vai-gia-tui-nilon.jpg', 'tui', '{\"dd\": [{\"name\": \"Đen\"}, {\"name\": \"Be\"}, {\"name\": \"Trắng\"}]}', NULL, NULL, '2020-10-01 22:41:03'),
('TV01', 'Tranh vải hoạt hình', 100000, '✨ Tranh vải hoạt hình<br>\r\n\r\n✨ Tranh vải trang trí cực kỳ độc đáo và mới lạ, được rất nhiều bạn trẻ yêu thích.<br>\r\n\r\n✨ Dùng để trang trí tường hoặc có thể biến hóa làm rèm cửa, khăn trải bàn.<br>\r\n\r\n✨ Có thể kết hợp với dây đèn sẽ tạo ra một không gian thật sự lung linh và ấm cúng. <br>\r\n\r\n✨ Tranh có kích thước 100 x 70 cm.<br>\r\n\r\n✨ Chất liệu: Vải lanh.<br>\r\n\r\n✨ Trọng lượng: 50 gram. <br>', 9, 'tranh-vai-hoat-hinh.jpg', 'tv', '{\"dd\": [{\"name\": \"Gấu đào\"}, {\"name\": \"Dâu tây\"}, {\"name\": \"Gấu cosplay\"}, {\"name\": \"Thỏ cherry\"}]}', NULL, NULL, '2020-10-28 22:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `sukien`
--

DROP TABLE IF EXISTS `sukien`;
CREATE TABLE IF NOT EXISTS `sukien` (
  `masukien` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tieude` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaydang` datetime NOT NULL,
  PRIMARY KEY (`masukien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD CONSTRAINT `chitiethd_ibfk_1` FOREIGN KEY (`mahd`) REFERENCES `hoadon` (`mahd`);

--
-- Constraints for table `chitietloai`
--
ALTER TABLE `chitietloai`
  ADD CONSTRAINT `chitietloai_ibfk_1` FOREIGN KEY (`maloai`) REFERENCES `loai` (`maloai`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`email`) REFERENCES `khachhang` (`email`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`masukien`) REFERENCES `sukien` (`masukien`),
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`tenloaichitiet`) REFERENCES `chitietloai` (`tenloaichitiet`),
  ADD CONSTRAINT `sanpham_ibfk_4` FOREIGN KEY (`maloai`) REFERENCES `loai` (`maloai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

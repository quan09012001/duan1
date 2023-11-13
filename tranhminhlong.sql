-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2023 lúc 06:18 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tranhminhlong`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_bl` int(11) NOT NULL COMMENT 'Mã bình luận',
  `noi_dung` varchar(255) NOT NULL COMMENT 'Nội dung bình luận',
  `ma_hh` int(11) NOT NULL COMMENT 'Mã hàng hoá',
  `ma_kh` varchar(20) NOT NULL COMMENT 'Mã khách hàng',
  `ngay_bl` date NOT NULL COMMENT 'Ngày bình luận',
  `rating` tinyint(5) NOT NULL DEFAULT 5 COMMENT 'Xếp hạng bình luận'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`ma_bl`, `noi_dung`, `ma_hh`, `ma_kh`, `ngay_bl`, `rating`) VALUES
(3, 'tuyệt vời', 8, 'hongquan', '2023-10-27', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_hoa`
--

CREATE TABLE `hang_hoa` (
  `ma_hh` int(11) NOT NULL COMMENT 'Mã hàng hoá',
  `ten_hh` varchar(50) NOT NULL COMMENT 'Tên hàng hoá',
  `don_gia` int(11) NOT NULL COMMENT 'Đơn giá',
  `giam_gia` int(11) DEFAULT 0 COMMENT 'Giảm giá',
  `hinh` varchar(50) NOT NULL COMMENT 'Hình ảnh',
  `ngay_nhap` date DEFAULT NULL COMMENT 'Ngày nhập',
  `mo_ta` text NOT NULL COMMENT 'Đặc biệt',
  `dac_biet` bit(1) NOT NULL DEFAULT b'0' COMMENT 'Số lượt xem',
  `so_luot_xem` int(11) NOT NULL DEFAULT 0 COMMENT 'Mã loại',
  `ma_loai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hang_hoa`
--

INSERT INTO `hang_hoa` (`ma_hh`, `ten_hh`, `don_gia`, `giam_gia`, `hinh`, `ngay_nhap`, `mo_ta`, `dac_biet`, `so_luot_xem`, `ma_loai`) VALUES
(8, 'HD4956', 600000, 2000, 'HD4956.jpg', '2023-10-27', '', b'1', 17, 3),
(9, 'HD5014', 620000, 20000, 'HD5014.jpg', '2023-10-27', '', b'0', 1, 3),
(10, 'DC524', 700000, 100000, 'DC524.jpg', '2023-10-27', '', b'1', 4, 3),
(11, 'HD5293-1', 1500000, 300000, 'HD5293-1.jpg', '2023-10-27', 'Tranh gỗ MDF 5 tấm', b'1', 2, 4),
(12, 'HD5869', 1500000, 300000, 'HD5869.jpg', '2023-10-27', 'Tranh gỗ MDF 5 tấm', b'1', 0, 4),
(13, 'HD3393', 1500000, 300000, 'HD3393.jpg', '2023-10-27', 'Tranh gỗ MDF 5 tấm', b'1', 0, 4),
(14, 'HD5935', 900000, 50000, 'HD5935.jpg', '2023-10-27', 'Tranh gỗ MDF 5 tấm', b'1', 0, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` varchar(20) NOT NULL COMMENT 'Mã khách hàng',
  `mat_khau` varchar(50) NOT NULL COMMENT 'Mật khẩu',
  `ho_ten` varchar(50) NOT NULL COMMENT 'Họ tên khách hàng',
  `kich_hoat` bit(1) NOT NULL DEFAULT b'0' COMMENT 'Trạng thái kích hoạt',
  `hinh` varchar(255) DEFAULT NULL COMMENT 'Hình ảnh',
  `email` varchar(50) NOT NULL COMMENT 'Email',
  `vai_tro` bit(1) NOT NULL DEFAULT b'0' COMMENT 'Vai trò (true là quản trị)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `mat_khau`, `ho_ten`, `kich_hoat`, `hinh`, `email`, `vai_tro`) VALUES
('admin', '111111', 'nhq.it@vn.vn', b'0', '_bb34f3f1-9d14-4158-91d8-9a25400d2673.jpg', 'nhq.it@vn.vn', b'0'),
('admin111', '111111', 'Nguyễn Hồng Quân', b'1', 'banner.png', 'hongquan@gmail.com', b'0'),
('hongquan', '111111', 'Nguyễn Hồng Quân', b'1', 'ico.png', 'nhq.it@vn.vn', b'1'),
('hongquan1', '111111', 'qUÂN', b'1', 'a8291636c01913474a08.jpg', 'nhq.vn@vtv.vn', b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `ma_loai` int(11) NOT NULL COMMENT 'Mã loại hàng',
  `ten_loai` varchar(50) NOT NULL COMMENT 'Tên loại hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`ma_loai`, `ten_loai`) VALUES
(3, 'Tranh 1 tấm'),
(4, 'Tranh 5 tấm'),
(5, 'Tranh 3 tấm'),
(6, 'Tranh Thiên Chúa Giáo');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `binh_luan_ibfk_1` (`ma_hh`),
  ADD KEY `binh_luan_ibfk_2` (`ma_kh`);

--
-- Chỉ mục cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD PRIMARY KEY (`ma_hh`),
  ADD KEY `hang_hoa_ibfk_1` (`ma_loai`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`ma_loai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã bình luận', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  MODIFY `ma_hh` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã hàng hoá', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã loại hàng', AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`) ON DELETE CASCADE,
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD CONSTRAINT `hang_hoa_ibfk_1` FOREIGN KEY (`ma_loai`) REFERENCES `loai` (`ma_loai`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2017 lúc 09:57 CH
-- Phiên bản máy phục vụ: 5.7.14
-- Phiên bản PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qltv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cttra`
--

CREATE TABLE `cttra` (
  `Id` bigint(20) NOT NULL,
  `MaNV` bigint(10) NOT NULL,
  `MaDG` bigint(10) NOT NULL,
  `MaS` bigint(10) NOT NULL,
  `NgayTra` date NOT NULL,
  `SLTra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cttra`
--

INSERT INTO `cttra` (`Id`, `MaNV`, `MaDG`, `MaS`, `NgayTra`, `SLTra`) VALUES
(1, 331892182, 14004045, 5, '2017-11-07', 2),
(2, 331892182, 14004045, 5, '2017-11-07', 1),
(3, 331892182, 14004038, 5, '2017-11-08', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `docgia`
--

CREATE TABLE `docgia` (
  `Id` bigint(20) NOT NULL,
  `MaDG` varchar(20) NOT NULL,
  `TenDG` varchar(50) NOT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChiDG` text NOT NULL,
  `NgayLapThe` date NOT NULL,
  `TaiKhoanDG` varchar(50) NOT NULL,
  `MatKhauDG` varchar(50) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `MaL` varchar(10) NOT NULL,
  `TrangThai` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `docgia`
--

INSERT INTO `docgia` (`Id`, `MaDG`, `TenDG`, `NgaySinh`, `DiaChiDG`, `NgayLapThe`, `TaiKhoanDG`, `MatKhauDG`, `Mail`, `MaL`, `TrangThai`) VALUES
(1, '14004038', 'Trần Thị Tuyết Linh', '1996-11-15', 'Đồng Tháp', '2017-10-30', 'tuyetlinh', 'e10adc3949ba59abbe56e057f20f883e', 'tuyetlinhcntt2014@gmail.com', '1CTT14A', 0),
(2, '14004006', 'Phan Thế Anh', '1996-11-05', 'Vĩnh Long', '2017-11-05', '14004006', 'e10adc3949ba59abbe56e057f20f883e', '14004006@student.vlute.edu.vn', '1CTT14A', 0),
(3, '14004005', 'Nguyễn Hoàng Anh', '1996-10-05', 'Vĩnh Long', '2017-11-05', '14004005', 'e10adc3949ba59abbe56e057f20f883e', '14004005@student.vlute.edu.vn', '1CTT14A', 0),
(4, '14004046', 'Lê Thị Huế Minh', '1996-02-02', 'Vĩnh Long', '2017-11-05', '14004046', 'e10adc3949ba59abbe56e057f20f883e', '14004046@student.vlute.edu.vn', '1CTT14A', 0),
(5, '14004045', 'Nguyễn Hoàng Hải', '1995-02-02', 'Vĩnh Long', '2017-11-05', '14004045', 'e10adc3949ba59abbe56e057f20f883e', '14004045@student.vlute.edu.vn', '1CTT14A', 0),
(6, '14004002', 'Nguyễn Ngọc Lan Anh', '1996-11-06', 'Tiềng Giang', '2017-11-06', '14004002', 'e10adc3949ba59abbe56e057f20f883e', '14004002@student.vlute.edu.vn', '1CTT14A', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `MaK` varchar(10) NOT NULL,
  `TenK` varchar(50) NOT NULL,
  `DiaChiK` varchar(50) NOT NULL,
  `SDT` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`MaK`, `TenK`, `DiaChiK`, `SDT`) VALUES
('CKC', 'Công Nghệ Cơ Khí', 'Khu A-Tầng1', '0178256173'),
('CTP', 'Công nghệ thực phẩm', 'Khu C- Lầu 6', '0134567192'),
('CTT', 'Công nghệ thông tin', 'Khu C- Lầu 6', '0123456789'),
('OTO', 'Công Nghệ Ô Tô', 'Khu C- Lầu 8', '01256381755');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisach`
--

CREATE TABLE `loaisach` (
  `MaLS` bigint(10) NOT NULL,
  `TenLS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaisach`
--

INSERT INTO `loaisach` (`MaLS`, `TenLS`) VALUES
(1, 'Sách cơ bản'),
(2, 'Sách nâng cao'),
(3, 'Sách tham khảo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `MaL` varchar(10) NOT NULL,
  `TenL` varchar(50) NOT NULL,
  `MaK` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`MaL`, `TenL`, `MaK`) VALUES
('1CKC14A', 'Kỹ thuật Cơ Khí', 'CKC'),
('1CTP14A', 'Công Nghệ Thực Phẩm', 'CTP'),
('1CTT14A', 'Công Nghệ Thông Tin 2014', 'CTT'),
('1DDT14A', 'Điện Tử', 'DDT'),
('1OTO14A', 'Công Nghệ Ô Tô', 'OTO');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muontra`
--

CREATE TABLE `muontra` (
  `Id` bigint(20) NOT NULL,
  `MaNV` bigint(10) NOT NULL,
  `MaDG` bigint(10) NOT NULL,
  `MaS` bigint(10) NOT NULL,
  `NgayMuon` date NOT NULL,
  `NgayTra` date NOT NULL,
  `TrangThai` tinyint(1) NOT NULL DEFAULT '0',
  `SLMuon` int(11) NOT NULL,
  `SLThucTe` int(11) NOT NULL DEFAULT '0',
  `GiaHan` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `muontra`
--

INSERT INTO `muontra` (`Id`, `MaNV`, `MaDG`, `MaS`, `NgayMuon`, `NgayTra`, `TrangThai`, `SLMuon`, `SLThucTe`, `GiaHan`) VALUES
(1, 331892182, 14004046, 1, '2017-11-07', '2017-11-14', 0, 2, 2, 0),
(2, 331892182, 14004005, 3, '2017-11-07', '2017-11-17', 0, 1, 1, 1),
(3, 331892182, 14004045, 5, '2017-11-07', '2017-11-14', 1, 0, 3, 0),
(4, 331892182, 14004045, 3, '2017-11-07', '2017-11-14', 0, 3, 3, 0),
(5, 331892182, 14004038, 5, '2017-10-31', '2017-11-07', 0, 2, 3, 0),
(6, 331892182, 14004006, 4, '2017-11-07', '2017-11-14', 0, 1, 1, 0),
(7, 331892182, 14004005, 4, '2017-11-07', '2017-11-14', 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `Id` bigint(20) NOT NULL,
  `MaNV` varchar(10) NOT NULL,
  `TenNV` varchar(50) NOT NULL,
  `DiaChiNV` text NOT NULL,
  `TenDangNhap` varchar(50) NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `TrangThaiNV` int(1) DEFAULT '0',
  `HeSoPhuCap` float NOT NULL DEFAULT '1',
  `LoaiNV` int(2) NOT NULL DEFAULT '2',
  `DaXoa` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`Id`, `MaNV`, `TenNV`, `DiaChiNV`, `TenDangNhap`, `MatKhau`, `Mail`, `TrangThaiNV`, `HeSoPhuCap`, `LoaiNV`, `DaXoa`) VALUES
(1, '331892182', 'Nguyễn Thị Ràng', '72 Nguyen Hue-P2-TPVL', 'rangvlute', 'fcea920f7412b5da7be0cf42b8c93759', 'lythanhngodev@gmail.com', 0, 2.53, 0, 0),
(2, '331298374', 'Tran Thi Hoa', '82/7C Phó cơ điều-p3-TPVL', 'hoavlute', 'fcea920f7412b5da7be0cf42b8c93759', 'trenthituyetlinhcntt2014@gmail.com', 0, 2.1, 0, 0),
(7, '331256324', 'Nguyễn Thanh Hoàng', 'TP. Vĩnh Long', 'thanhhoang', 'fcea920f7412b5da7be0cf42b8c93759', 'nguyenth@vlite.edu.vn', 0, 3.2, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhapsach`
--

CREATE TABLE `nhapsach` (
  `id` bigint(20) NOT NULL,
  `NgayNhap` date NOT NULL,
  `MaS` bigint(10) NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `GhiChu` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhapsach`
--

INSERT INTO `nhapsach` (`id`, `NgayNhap`, `MaS`, `SoLuong`, `GhiChu`) VALUES
(1, '2017-10-29', 5, 20, 'ghichu'),
(2, '2017-10-29', 5, 20, 'ghichu'),
(3, '2017-10-29', 4, 1, 'ghichu'),
(4, '2017-10-29', 4, 9, 'ghichu'),
(5, '2017-10-29', 5, 1, ''),
(6, '2017-11-06', 1, 1, ''),
(7, '2017-11-11', 6, 100, ''),
(8, '2017-11-11', 7, 100, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhaxuatban`
--

CREATE TABLE `nhaxuatban` (
  `MaNXB` bigint(10) NOT NULL,
  `TenNXB` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhaxuatban`
--

INSERT INTO `nhaxuatban` (`MaNXB`, `TenNXB`) VALUES
(1, 'Nguyễn Trãi'),
(2, 'Nguyễn Trọng Đạt'),
(3, 'Trần Trí Dũng'),
(4, 'Nguyễn Văn Cao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `MaS` bigint(10) NOT NULL,
  `TenS` varchar(50) NOT NULL,
  `MaLS` bigint(10) NOT NULL,
  `MaTG` bigint(10) NOT NULL,
  `MaNXB` bigint(10) NOT NULL,
  `NamXB` int(11) NOT NULL,
  `SoTrang` int(11) NOT NULL,
  `HinhAnhS` text NOT NULL,
  `SL` int(11) NOT NULL,
  `Gia` decimal(11,0) NOT NULL,
  `NgayNhap` date NOT NULL,
  `XoaSach` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`MaS`, `TenS`, `MaLS`, `MaTG`, `MaNXB`, `NamXB`, `SoTrang`, `HinhAnhS`, `SL`, `Gia`, `NgayNhap`, `XoaSach`) VALUES
(1, 'Cơ Sở Dữ Liệu', 2, 1, 3, 1996, 60, 'images/hoahong.jpg', 24, '350000', '2017-10-01', 0),
(2, 'Nhập Môn Công Nghệ Phần Mềm', 1, 2, 1, 2001, 40, 'images/sach.jpg', 26, '20000', '2017-07-10', 1),
(3, 'Phân Tích Thiết Kế Hệ Thống', 3, 2, 2, 2003, 30, 'images/hoahong.jpg', 11, '40000', '2017-04-11', 0),
(4, 'Tin Học Cơ Sở', 2, 3, 1, 2009, 40, 'images/kinhnghiem.jpg', 17, '30000', '2017-03-27', 0),
(5, 'Trí Tuệ Nhân Tạo', 1, 1, 2, 2000, 100, 'images/thanhpho.jpg', 7, '123000', '2017-06-12', 0),
(6, 'qdqwwqd', 3, 3, 4, 1992, 9, 'images/ngaynang.jpg', 100, '10000', '2017-11-06', 1),
(7, 'Công nghệ phần mềm', 2, 2, 2, 1990, 100, 'images/kinhnghiem.jpg', 88, '10000', '2017-11-06', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tacgia`
--

CREATE TABLE `tacgia` (
  `MaTG` bigint(10) NOT NULL,
  `TenTG` varchar(11) NOT NULL,
  `DiaChiTG` text NOT NULL,
  `MoTa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tacgia`
--

INSERT INTO `tacgia` (`MaTG`, `TenTG`, `DiaChiTG`, `MoTa`) VALUES
(1, 'Xuân Quỳnh', 'Làng La Khê, xã Văn Khê, thị xã Hà Đông, tỉnh Hà Tây', 'Xuân Quỳnh, sinh ngày 6 tháng 10 năm 1942 tại làng La Khê, xã Văn Khê, thị xã Hà Đông, tỉnh Hà Tây (nay là quận Hà Đông, Hà Nội). Xuất thân trong một gia đình công chức, mẹ mất sớm, bố thường xuyên công tác xa gia đình, bà được bà nội nuôi dạy từ nhỏ đến khi trưởng thành'),
(2, 'Nam Cao', 'Làng Đại Hoàng, tổng Cao Đà, huyện Nam Sang, phủ Lý Nhân (nay là xã Hòa Hậu, huyện Lý Nhân, Hà Nam)', 'Ông xuất thân từ một gia đình Công giáo bậc trung. Cha ông là ông Trần Hữu Huệ, làm nghề thợ mộc và thầy lang trong làng. Mẹ ông là bà Trần Thị Minh, vừa là nội trợ, làm vườn, làm ruộng và dệt vải.\r\nThuở nhỏ, ông học sơ học ở trường làng. Đến cấp tiểu học và bậc trung học, gia đình gửi ông xuống Nam Định học ở trường Cửa Bắc rồi trường Thành Chung (nay là trường THPT Chuyên Lê Hồng Phong- Nam Định). Nhưng vì thể chất yếu, chưa kịp thi Thành Chung, ông đã phải về nhà chữa bệnh, rồi cưới vợ năm 18 tuổi.'),
(3, 'Tô Hoài', 'Làng Nghĩa Đô, huyện Từ Liêm, phủ Hoài Đức, tỉnh Hà Đông ', 'Tô Hoài sinh ra tại quê nội ở thôn Cát Động, Thị trấn Kim Bài, huyện Thanh Oai, tỉnh Hà Đông cũ trong một gia đình thợ thủ công. Tuy nhiên, ông lớn lên ở quê ngoại là làng Nghĩa Đô, huyện Từ Liêm, phủ Hoài Đức, tỉnh Hà Đông (nay thuộc phường Nghĩa Đô, quận Cầu Giấy, Hà Nội, Việt Nam[2]). Bút danh Tô Hoài gắn với hai địa danh: sông Tô Lịch và phủ Hoài Đức.\r\n\r\nBước vào tuổi thanh niên, ông đã phải làm nhiều công việc để kiếm sống như dạy trẻ, bán hàng, kế toán hiệu buôn,... nhưng có những lúc thất nghiệp. Khi đến với văn chương, ông nhanh chóng được người đọc chú ý, nhất là qua truyện Dế Mèn phiêu lưu ký. Năm 1943, Tô Hoài gia nhập Hội Văn hóa cứu quốc. Trong chiến tranh Đông Dương, ông chủ yếu hoạt động trong lĩnh vực báo chí, nhưng vẫn có một số thành tựu quan trọng như Truyện Tây Bắc.'),
(4, 'Nguyễn Tuân', 'Phố Hàng Bạc, Hà Nội, quê ở thôn Thượng Đình, xã Nhân Mục (tên nôm là làng Mọc), nay thuộc phường Nhân Chính, quận Thanh Xuân, Hà Nội', 'Nguyễn Tuân (10/ 7/ 1910 – 28 / 7/1987) quê ở Hà Nội, là một nhà văn của Việt Nam, sở trường về tùy bút và ký, được tặng Giải thưởng Hồ Chí Minh về văn học nghệ thuật năm 1996. Tác phẩm của Nguyễn Tuân luôn thể hiện phong cách độc đáo, tài hoa, sự hiểu biết phong phú nhiều mặt và vốn ngôn ngữ, giàu có, điêu luyện. Sách giáo khoa hiện hành xếp ông vào một trong 9 tác giả tiêu biểu của văn học Việt Nam hiện đại. Ông viết văn với một phong cách tài hoa uyên bác và được xem là bậc thầy trong việc sáng tạo và sử dụng Tiếng Việt. Hiện nay, ở Hà Nội có một con đường mang tên ông, nối từ đường Nguyễn Trãi cắt ngang qua các phố Nguyễn Huy Tưởng, Ngụy Như Kon Tum đến đường Lê Văn Lương, nối với phố Hoàng Minh Giám.'),
(5, 'Tố Hữu', 'Làng Phù Lai, nay thuộc xã Quảng Thọ, huyện Quảng Điền, tỉnh Thừa Thiên-Huế.', 'Tố Hữu, tên thật là Nguyễn Kim Thành (4 tháng 10 năm 1920 – 9 tháng 12 năm 2002), quê gốc ở làng Phù Lai, nay thuộc xã Quảng Thọ, huyện Quảng Điền, tỉnh Thừa Thiên-Huế.Ông là một nhà thơ tiêu biểu của thơ cách mạng Việt Nam, đồng thời là một chính trị gia. Ông đã từng giữ các chức vụ quan trọng trong hệ thống chính trị của Việt Nam như Ủy viên Bộ Chính trị, Bí thư Ban Chấp hành Trung ương Đảng Cộng sản Việt Nam, Phó Chủ tịch thứ Nhất Hội đồng Bộ trưởng nước Cộng hòa Xã hội Chủ nghĩa Việt Nam.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xuatsach`
--

CREATE TABLE `xuatsach` (
  `id` bigint(20) NOT NULL,
  `NgayXuat` date NOT NULL,
  `MaS` bigint(10) NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `GhiChu` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `xuatsach`
--

INSERT INTO `xuatsach` (`id`, `NgayXuat`, `MaS`, `SoLuong`, `GhiChu`) VALUES
(1, '2017-10-29', 1, 1, ''),
(2, '2017-10-29', 5, 1, ''),
(3, '2017-10-29', 5, 20, 'Tại thích'),
(4, '2017-11-13', 7, 12, '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cttra`
--
ALTER TABLE `cttra`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `docgia`
--
ALTER TABLE `docgia`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `MaDG` (`MaDG`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`MaK`);

--
-- Chỉ mục cho bảng `loaisach`
--
ALTER TABLE `loaisach`
  ADD PRIMARY KEY (`MaLS`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`MaL`);

--
-- Chỉ mục cho bảng `muontra`
--
ALTER TABLE `muontra`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `TenDangNhap` (`TenDangNhap`),
  ADD UNIQUE KEY `Mail` (`Mail`),
  ADD UNIQUE KEY `MaNV` (`MaNV`);

--
-- Chỉ mục cho bảng `nhapsach`
--
ALTER TABLE `nhapsach`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  ADD PRIMARY KEY (`MaNXB`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`MaS`);

--
-- Chỉ mục cho bảng `tacgia`
--
ALTER TABLE `tacgia`
  ADD PRIMARY KEY (`MaTG`);

--
-- Chỉ mục cho bảng `xuatsach`
--
ALTER TABLE `xuatsach`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cttra`
--
ALTER TABLE `cttra`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `docgia`
--
ALTER TABLE `docgia`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `loaisach`
--
ALTER TABLE `loaisach`
  MODIFY `MaLS` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `muontra`
--
ALTER TABLE `muontra`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `nhapsach`
--
ALTER TABLE `nhapsach`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  MODIFY `MaNXB` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `MaS` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `tacgia`
--
ALTER TABLE `tacgia`
  MODIFY `MaTG` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `xuatsach`
--
ALTER TABLE `xuatsach`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

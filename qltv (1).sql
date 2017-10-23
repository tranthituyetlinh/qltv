-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2017 lúc 04:16 SA
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
-- Cấu trúc bảng cho bảng `docgia`
--

CREATE TABLE `docgia` (
  `MaDG` int(11) NOT NULL,
  `TenDG` varchar(50) NOT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChiDG` text NOT NULL,
  `NgayLapThe` date NOT NULL,
  `TaiKhoanDG` varchar(50) NOT NULL,
  `MatKhauDG` varchar(50) NOT NULL,
  `HinhAnhDG` text NOT NULL,
  `MaL` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `docgia`
--

INSERT INTO `docgia` (`MaDG`, `TenDG`, `NgaySinh`, `DiaChiDG`, `NgayLapThe`, `TaiKhoanDG`, `MatKhauDG`, `HinhAnhDG`, `MaL`) VALUES
(1, 'Tran Thi Tuyet Linh', '1996-10-11', 'Cao lãnh-Đồng Tháp', '2017-10-01', 'Tuyetlinh', '123456', '', ''),
(2, 'Nguyen Thanh Liem', '1996-10-10', 'Long Hồ-Vĩnh Long', '2017-10-11', 'Thanhliem', '123456', '', ''),
(3, 'Lê Thị Huế Minh', '1996-10-09', 'Tam Bình-Vĩnh Long', '2017-10-01', 'Hueminh', '123456', '', ''),
(4, 'Lê Huyền Thanh', '1996-10-01', 'Long Hồ-Vĩnh Long', '2014-12-05', 'huyenthanh', '123456', '', ''),
(5, 'Nguyễn Quốc Duy', '1996-10-15', 'Long Hồ-Vĩnh Long', '2017-10-29', 'Quocduy', '123456', '\r\n', '');

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
('1CCK', 'Khoa Công Nghệ Cơ Khí', 'Khu A-Tầng1', '0178256173'),
('1CTP', 'Khoa Cong Nghe Thuc Pham', 'Khu C- Lầu 6', '0134567192'),
('1CTT', 'Khoa Cong Nghe Thong Tin', 'Khu C- Lầu 6', '0123456789'),
('1OTO', 'Khoa Công Nghệ Ô Tô', 'Khu C- Lầu 8', '01256381755');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisach`
--

CREATE TABLE `loaisach` (
  `MaLS` varchar(10) NOT NULL,
  `TenLS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaisach`
--

INSERT INTO `loaisach` (`MaLS`, `TenLS`) VALUES
('1CB', 'Sach Co Ban'),
('1TK', 'Sách Tham Khảo'),
('2NC', 'Sach Nang Cao');

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
('14A1CNOTO', 'Công Nghệ Ô Tô', ''),
('14A1CTP', 'Công Nghệ Thực Phẩm', ''),
('14A1CTT', 'Công Nghệ Thông Tin', ''),
('14A1DT', 'Điện Tử', ''),
('14A1KTCK', 'Kỹ thuật Cơ Khí', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muon-tra`
--

CREATE TABLE `muon-tra` (
  `MaNV` varchar(10) NOT NULL,
  `MaDG` varchar(10) NOT NULL,
  `NgayMuon` date NOT NULL,
  `NgayTra` date NOT NULL,
  `TrangThai` tinyint(1) NOT NULL,
  `SLMuon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` varchar(10) NOT NULL,
  `TenNV` varchar(50) NOT NULL,
  `DiaChiNV` text NOT NULL,
  `TenDangNhap` varchar(50) NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `HinhAnhNV` text NOT NULL,
  `TrangThaiNV` tinyint(1) NOT NULL,
  `HeSoPhuCap` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `TenNV`, `DiaChiNV`, `TenDangNhap`, `MatKhau`, `HinhAnhNV`, `TrangThaiNV`, `HeSoPhuCap`) VALUES
('NV1', 'Nguyen Thi Rang', '72 Nguyen Hue-P2-TPVL', 'rangvlute', '1234567', '', 1, 2.53),
('NV2', 'Tran Thi Hoa', '82/7C Phó cơ điều-p3-TPVL', 'hoavlute', '1234567', '', 1, 2.1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhaxuatban`
--

CREATE TABLE `nhaxuatban` (
  `MaNXB` varchar(11) NOT NULL,
  `TenNXB` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhaxuatban`
--

INSERT INTO `nhaxuatban` (`MaNXB`, `TenNXB`) VALUES
('NXB1', 'Nguyen Trãi'),
('NXB2', 'Nguyễn Trọng Đạt'),
('NXB3', 'Trần Trí Dũng'),
('NXB4', 'Nguyễn Văn Cao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `MaS` varchar(11) NOT NULL,
  `TenS` varchar(50) NOT NULL,
  `MaLS` varchar(10) NOT NULL,
  `MaTG` varchar(10) NOT NULL,
  `MaNXB` varchar(11) NOT NULL,
  `NamXB` int(11) NOT NULL,
  `SoTrang` int(11) NOT NULL,
  `HinhAnhS` text NOT NULL,
  `SL` int(11) NOT NULL,
  `Gia` int(11) NOT NULL,
  `NgayNhap` date NOT NULL,
  `TrangThaiS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`MaS`, `TenS`, `MaLS`, `MaTG`, `MaNXB`, `NamXB`, `SoTrang`, `HinhAnhS`, `SL`, `Gia`, `NgayNhap`, `TrangThaiS`) VALUES
('1CSDL', 'Cơ Sở Dữ Liệu', '', '', '', 1996, 60, '', 5, 350000, '2017-10-01', 1),
('1NMPM', 'Nhập Môn Công Nghệ Phần Mềm', '', '', '', 2001, 40, '', 12, 20000, '2017-07-10', 1),
('1PTTKHT', 'Phân Tích Thiết Kế Hệ Thống', '', '', '', 2003, 30, '', 13, 40000, '2017-04-11', 1),
('1THCS', 'Tin Học Cơ Sở', '', '', '', 2009, 40, '', 10, 30000, '2017-03-27', 1),
('1TTNT', 'Trí Tuệ Nhân Tạo', '', '', '', 2000, 50, '', 18, 30000, '2017-06-12', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tacgia`
--

CREATE TABLE `tacgia` (
  `MaTG` varchar(10) NOT NULL,
  `TenTG` varchar(11) NOT NULL,
  `DiaChiTG` text NOT NULL,
  `MoTa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tacgia`
--

INSERT INTO `tacgia` (`MaTG`, `TenTG`, `DiaChiTG`, `MoTa`) VALUES
('TG1', 'Xuân Quỳnh', 'Làng La Khê, xã Văn Khê, thị xã Hà Đông, tỉnh Hà Tây ', 'Xuân Quỳnh, sinh ngày 6 tháng 10 năm 1942 tại làng La Khê, xã Văn Khê, thị xã Hà Đông, tỉnh Hà Tây (nay là quận Hà Đông, Hà Nội). Xuất thân trong một gia đình công chức, mẹ mất sớm, bố thường xuyên công tác xa gia đình, bà được bà nội nuôi dạy từ nhỏ đến khi trưởng thành'),
('TG2', 'Nam Cao', 'Làng Đại Hoàng, tổng Cao Đà, huyện Nam Sang, phủ Lý Nhân (nay là xã Hòa Hậu, huyện Lý Nhân, Hà Nam)', 'Ông xuất thân từ một gia đình Công giáo bậc trung. Cha ông là ông Trần Hữu Huệ, làm nghề thợ mộc và thầy lang trong làng. Mẹ ông là bà Trần Thị Minh, vừa là nội trợ, làm vườn, làm ruộng và dệt vải.\r\nThuở nhỏ, ông học sơ học ở trường làng. Đến cấp tiểu học và bậc trung học, gia đình gửi ông xuống Nam Định học ở trường Cửa Bắc rồi trường Thành Chung (nay là trường THPT Chuyên Lê Hồng Phong- Nam Định). Nhưng vì thể chất yếu, chưa kịp thi Thành Chung, ông đã phải về nhà chữa bệnh, rồi cưới vợ năm 18 tuổi.'),
('TG3', 'Tô Hoài', 'Làng Nghĩa Đô, huyện Từ Liêm, phủ Hoài Đức, tỉnh Hà Đông ', 'Tô Hoài sinh ra tại quê nội ở thôn Cát Động, Thị trấn Kim Bài, huyện Thanh Oai, tỉnh Hà Đông cũ trong một gia đình thợ thủ công. Tuy nhiên, ông lớn lên ở quê ngoại là làng Nghĩa Đô, huyện Từ Liêm, phủ Hoài Đức, tỉnh Hà Đông (nay thuộc phường Nghĩa Đô, quận Cầu Giấy, Hà Nội, Việt Nam[2]). Bút danh Tô Hoài gắn với hai địa danh: sông Tô Lịch và phủ Hoài Đức.\r\n\r\nBước vào tuổi thanh niên, ông đã phải làm nhiều công việc để kiếm sống như dạy trẻ, bán hàng, kế toán hiệu buôn,... nhưng có những lúc thất nghiệp. Khi đến với văn chương, ông nhanh chóng được người đọc chú ý, nhất là qua truyện Dế Mèn phiêu lưu ký. Năm 1943, Tô Hoài gia nhập Hội Văn hóa cứu quốc. Trong chiến tranh Đông Dương, ông chủ yếu hoạt động trong lĩnh vực báo chí, nhưng vẫn có một số thành tựu quan trọng như Truyện Tây Bắc.'),
('TG4', 'Nguyễn Tuân', 'Phố Hàng Bạc, Hà Nội, quê ở thôn Thượng Đình, xã Nhân Mục (tên nôm là làng Mọc), nay thuộc phường Nhân Chính, quận Thanh Xuân, Hà Nội', 'Nguyễn Tuân (10/ 7/ 1910 – 28 / 7/1987) quê ở Hà Nội, là một nhà văn của Việt Nam, sở trường về tùy bút và ký, được tặng Giải thưởng Hồ Chí Minh về văn học nghệ thuật năm 1996. Tác phẩm của Nguyễn Tuân luôn thể hiện phong cách độc đáo, tài hoa, sự hiểu biết phong phú nhiều mặt và vốn ngôn ngữ, giàu có, điêu luyện. Sách giáo khoa hiện hành xếp ông vào một trong 9 tác giả tiêu biểu của văn học Việt Nam hiện đại. Ông viết văn với một phong cách tài hoa uyên bác và được xem là bậc thầy trong việc sáng tạo và sử dụng Tiếng Việt. Hiện nay, ở Hà Nội có một con đường mang tên ông, nối từ đường Nguyễn Trãi cắt ngang qua các phố Nguyễn Huy Tưởng, Ngụy Như Kon Tum đến đường Lê Văn Lương, nối với phố Hoàng Minh Giám.'),
('TG5', 'Tố Hữu', 'Làng Phù Lai, nay thuộc xã Quảng Thọ, huyện Quảng Điền, tỉnh Thừa Thiên-Huế.', 'Tố Hữu, tên thật là Nguyễn Kim Thành (4 tháng 10 năm 1920 – 9 tháng 12 năm 2002), quê gốc ở làng Phù Lai, nay thuộc xã Quảng Thọ, huyện Quảng Điền, tỉnh Thừa Thiên-Huế.\r\n\r\nÔng là một nhà thơ tiêu biểu của thơ cách mạng Việt Nam, đồng thời là một chính trị gia. Ông đã từng giữ các chức vụ quan trọng trong hệ thống chính trị của Việt Nam như Ủy viên Bộ Chính trị, Bí thư Ban Chấp hành Trung ương Đảng Cộng sản Việt Nam, Phó Chủ tịch thứ Nhất Hội đồng Bộ trưởng nước Cộng hòa Xã hội Chủ nghĩa Việt Nam.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `docgia`
--
ALTER TABLE `docgia`
  ADD PRIMARY KEY (`MaDG`);

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
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

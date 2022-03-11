-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 11, 2022 lúc 01:36 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `imets`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dept`
--

CREATE TABLE `dept` (
  `ID_Dept` int(11) NOT NULL,
  `Name_Dept` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dept`
--

INSERT INTO `dept` (`ID_Dept`, `Name_Dept`) VALUES
(0, 'Phòng Hành chính'),
(1, 'Khoa Nội tổng hợp'),
(2, 'Khoa Cấp cứu'),
(3, 'Khoa Nhi'),
(4, 'Khoa Mắt'),
(5, 'Khoa Sản'),
(6, 'Khoa Da liễu'),
(7, 'Khoa Thần kinh'),
(8, 'Khoa Tim mạch'),
(9, 'Khoa Dược'),
(10, 'Khoa Nhiễm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img_staff`
--

CREATE TABLE `img_staff` (
  `ID_ImgStaff` int(11) NOT NULL,
  `ID_Staff` int(11) DEFAULT NULL,
  `imgName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `img_staff`
--

INSERT INTO `img_staff` (`ID_ImgStaff`, `ID_Staff`, `imgName`) VALUES
(4, 1, 'rounded.png'),
(9, 4, 'nhu_img3.jpeg'),
(10, 4, 'nhu_img2.jpg'),
(11, 4, 'nhu_img1.jpg'),
(14, 6, 'leeikjun_2.jpeg'),
(15, 6, 'leeikjun_1.png'),
(16, 6, 'leeikjun_3.jpg'),
(17, 7, 'img_1.jpg'),
(18, 7, 'img_2.jpg'),
(19, 7, 'img_3.jpg'),
(20, 7, 'img_4.jpg'),
(21, 7, 'img_5.jpg'),
(22, 8, 'ahn_3.jpg'),
(23, 8, 'ahn_2.jpg'),
(24, 8, 'ahn_1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `patient`
--

CREATE TABLE `patient` (
  `ID_Patient` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `Sex` varchar(10) NOT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `CMND` varchar(15) DEFAULT NULL,
  `PhoneNumber` varchar(25) NOT NULL,
  `ID_BHYT` varchar(20) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `patient`
--

INSERT INTO `patient` (`ID_Patient`, `Name`, `DOB`, `Sex`, `Address`, `CMND`, `PhoneNumber`, `ID_BHYT`, `UserName`, `Password`) VALUES
(1, 'nghia', '2012-12-12', 'nam', '40', 'xxx', '123', '1234', 'tran', '345453'),
(2, 'Trần Nhân Nghĩa', '2000-01-24', 'Nam', NULL, NULL, '0939635755', NULL, 'trannhannghia@gmail.com', '593992d613b77c065055acd511edab67');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `ID_Staff` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `Sex` varchar(10) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `CMND` varchar(15) NOT NULL,
  `PhoneNumber` varchar(25) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `ID_Dept` int(11) NOT NULL,
  `DateStartWork` date NOT NULL,
  `VoteRate` double NOT NULL DEFAULT 0,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`ID_Staff`, `Name`, `DOB`, `Sex`, `Address`, `CMND`, `PhoneNumber`, `Position`, `ID_Dept`, `DateStartWork`, `VoteRate`, `UserName`, `Password`) VALUES
(1, 'Trần Nhân Nghĩa', '2000-01-24', 'Nam', 'An Khánh', '092200000280', '0939635755', 'Admin', 0, '2020-01-24', 0, 'admin', '19513b313f52755a0956c2be7f48d86f'),
(4, 'Chae Song-hwa', '1982-08-04', 'Nữ', 'Nguyễn Đệ, Bình Thủy, Cần Thơ', '312328285', '0939017069', 'Bác sĩ', 7, '2010-07-10', 4.4, 'chae', '40a0a40b8110608cf0866037654e3f74'),
(6, 'Lee Ik-jun', '1980-12-26', 'Nam', 'Nguyễn Đệ, Bình Thủy, Cần Thơ', '09220000123', '0989123456', 'Bác sĩ', 1, '2000-10-19', 4.9, 'lee', 'b0f8b49f22c718e9924f5b1165111a67'),
(7, 'Lê Doãn Khánh', '2000-04-17', 'Nam', 'Bình Thủy, Cần Thơ', '092200000154', '01234567', 'Bác sĩ', 5, '2020-06-30', 3.4, 'ledoankhanh', 'bbee2e7c540fde597ad1a708bc30b51c'),
(8, 'Yoo Yeon-seok', '1984-04-11', 'Nam', 'Cần Thơ', '09220000555', '09897887665', 'Bác sĩ', 3, '2003-10-22', 2.1, 'yoo', 'a95b429d7a93263081a83b9bf7c9f7e3');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`ID_Dept`);

--
-- Chỉ mục cho bảng `img_staff`
--
ALTER TABLE `img_staff`
  ADD PRIMARY KEY (`ID_ImgStaff`),
  ADD KEY `img_staff_ibfk_1` (`ID_Staff`);

--
-- Chỉ mục cho bảng `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`ID_Patient`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID_Staff`),
  ADD KEY `ID_Dept` (`ID_Dept`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dept`
--
ALTER TABLE `dept`
  MODIFY `ID_Dept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `img_staff`
--
ALTER TABLE `img_staff`
  MODIFY `ID_ImgStaff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `patient`
--
ALTER TABLE `patient`
  MODIFY `ID_Patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `staff`
--
ALTER TABLE `staff`
  MODIFY `ID_Staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `img_staff`
--
ALTER TABLE `img_staff`
  ADD CONSTRAINT `img_staff_ibfk_1` FOREIGN KEY (`ID_Staff`) REFERENCES `staff` (`ID_Staff`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`ID_Dept`) REFERENCES `dept` (`ID_Dept`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

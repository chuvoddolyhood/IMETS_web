-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 10, 2022 lúc 05:49 PM
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
(11, 4, 'nhu_img1.jpg');

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
(2, 'Trần Nhân Nghĩa', '2000-01-24', 'Nam', NULL, NULL, '0939635755', NULL, 'trannhannghia@gmail.com', '202cb962ac59075b964b07152d234b70');

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
  `VoteRate` double DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`ID_Staff`, `Name`, `DOB`, `Sex`, `Address`, `CMND`, `PhoneNumber`, `Position`, `ID_Dept`, `DateStartWork`, `VoteRate`, `UserName`, `Password`) VALUES
(1, 'Trần Nhân Nghĩa', '2000-01-24', 'Nam', 'An Khánh', '092200000280', '0939635755', 'Admin', 0, '2020-01-24', 0, 'admin', '19513b313f52755a0956c2be7f48d86f'),
(4, 'Trần Thị Ánh Như ', '1994-03-07', 'Nữ', 'Nguyễn Đệ, Bình Thủy, Cần Thơ', '312328285', '0939017069', 'Dược sĩ', 9, '2018-07-10', NULL, 'nhu004', 'nhu004');

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
  MODIFY `ID_ImgStaff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `patient`
--
ALTER TABLE `patient`
  MODIFY `ID_Patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `staff`
--
ALTER TABLE `staff`
  MODIFY `ID_Staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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

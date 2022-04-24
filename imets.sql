-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 03:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imets`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `ID_Appointment` int(11) NOT NULL,
  `ID_Staff` int(11) NOT NULL,
  `ID_Patient` int(11) NOT NULL,
  `Date_Booking` datetime NOT NULL,
  `Date_Checkup` int(11) NOT NULL,
  `Date_HospitalDischarge` datetime DEFAULT NULL,
  `Date_ReCheckup` date DEFAULT NULL,
  `BHYT_Checkin` float NOT NULL,
  `ID_PaymentMethod` int(11) DEFAULT NULL,
  `StatusAppointment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`ID_Appointment`, `ID_Staff`, `ID_Patient`, `Date_Booking`, `Date_Checkup`, `Date_HospitalDischarge`, `Date_ReCheckup`, `BHYT_Checkin`, `ID_PaymentMethod`, `StatusAppointment`) VALUES
(1, 9, 2, '2022-01-24 15:03:46', 38, '2022-01-24 16:03:46', NULL, 0.8, NULL, NULL),
(2, 6, 2, '2022-02-15 15:03:46', 93, '2022-02-15 17:03:46', NULL, 0.8, NULL, NULL),
(3, 7, 2, '2022-03-07 15:07:34', 100, '2022-03-07 15:59:33', NULL, 0, NULL, NULL),
(16, 4, 2, '2022-03-25 20:51:45', 38, '2022-04-09 21:11:49', NULL, 0.8, NULL, 'Đã khám'),
(33, 4, 2, '2022-04-13 22:09:24', 100, '2022-04-13 22:11:07', '0000-00-00', 0.8, NULL, 'Đã khám'),
(36, 4, 2, '2022-04-14 10:17:35', 104, '2022-04-14 10:47:14', '0000-00-00', 0.8, NULL, 'Đã khám'),
(37, 4, 2, '2022-04-14 23:14:15', 114, '2022-04-14 23:15:42', '0000-00-00', 0.8, NULL, 'Đã khám'),
(38, 4, 2, '2022-04-24 07:48:55', 123, '2022-04-24 07:54:52', NULL, 0.8, NULL, 'Đã khám'),
(39, 4, 2, '2022-04-24 08:07:23', 125, '2022-04-24 08:12:06', NULL, 0.8, NULL, 'Đã khám'),
(40, 4, 2, '2022-04-24 08:15:30', 127, '2022-04-24 08:16:01', NULL, 0.8, NULL, 'Đã khám');

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `ID_Dept` int(11) NOT NULL,
  `Name_Dept` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept`
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
-- Table structure for table `diagnose`
--

CREATE TABLE `diagnose` (
  `ID_Diagnose` int(11) NOT NULL,
  `ID_Disease` int(11) NOT NULL,
  `ID_MedicalRecord` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnose`
--

INSERT INTO `diagnose` (`ID_Diagnose`, `ID_Disease`, `ID_MedicalRecord`) VALUES
(19, 1, 295),
(24, 2, 304),
(26, 2, 306),
(27, 2, 307),
(28, 1, 308),
(29, 1, 309);

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `ID_Disease` int(11) NOT NULL,
  `TitleDisease` varchar(100) NOT NULL,
  `ContentDisease` text NOT NULL,
  `Symptom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`ID_Disease`, `TitleDisease`, `ContentDisease`, `Symptom`) VALUES
(1, 'Viêm họng cấp', 'Viêm họng cấp là hiện tượng viêm của tổ chức niêm mạc nằm ở phần sau của cổ họng. Triệu chứng thường gặp là đau họng. Ngoài ra viêm họng còn gây ra các triệu chứng như ngứa họng hoặc nuốt vướng, nuốt đau.', 'Nuốt rất đau\r\nSưng các hạch vùng cổ\r\nThấy các mảng màu trắng ở trong họng khi soi qua gương hoặc đèn pin.\r\nAmydan 2 bên sung đỏ.\r\nĐau đầu, đau bụng\r\nNôn, buồn nôn.\r\nNổi ban.\r\n'),
(2, 'Bệnh trào ngược dạ dày - thực quản', 'Bệnh trào ngược dạ dày – thực quản (GERD) là hiện tượng xảy ra khi dịch tiêu hoá của dạ dày thường xuyên bị chảy ngược vào thực quản (là một ống dẫn đưa thức ăn từ miệng vào dạ dày). Vì dịch này có tính axit nên có thể gây kích ứng và làm viêm niêm mạc thực quản của bạn.', 'Ợ hơi: xảy ra thường xuyên và ngay cả khi đói hoặc không ăn gì.\r\nỢ nóng: nóng rát từ dạ dày hay vùng ngực dưới, lan hướng lên cổ, có khi lan tới cả hạ họng, mang tai. Cùng với đó là vị chua ở trong miệng.\r\nỢ chua: thức ăn hoặc chất lỏng chua từ dạ dày bị đẩy lên cuống họng thường sau khi ăn, có thể tồi tệ hơn vào ban đêm.\r\nNôn và buồn nôn: xuất hiện khi ăn quá no, nằm ngay khi ăn, không kê đầu cao khi ngủ.\r\nCảm giác nóng trong ngực, tức ngực\r\nNhiều nước bọt, khó nuốt, cảm giác vướng vùng họng');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `ID_Evaluation` int(11) NOT NULL,
  `PatientStart` int(11) DEFAULT NULL,
  `DoctorComment` text DEFAULT NULL,
  `DoctorStar` int(11) DEFAULT NULL,
  `PatientComment` text DEFAULT NULL,
  `ID_Appointment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`ID_Evaluation`, `PatientStart`, `DoctorComment`, `DoctorStar`, `PatientComment`, `ID_Appointment`) VALUES
(13, 5, 'Bệnh nhân vui vẻ hòa đồng', NULL, NULL, 16),
(19, 5, 'ok', NULL, NULL, 33),
(21, 3, 'tốt', 3, 'tuyệt', 37),
(22, 4, 'ok', NULL, NULL, 38),
(23, 3, 'dfffff', NULL, NULL, 39),
(24, 4, 'sdfa', NULL, NULL, 40);

-- --------------------------------------------------------

--
-- Table structure for table `img_staff`
--

CREATE TABLE `img_staff` (
  `ID_ImgStaff` int(11) NOT NULL,
  `ID_Staff` int(11) DEFAULT NULL,
  `imgName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `img_staff`
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
(24, 8, 'ahn_1.jpg'),
(25, 9, 'img3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `medicalrecord`
--

CREATE TABLE `medicalrecord` (
  `ID_MedicalRecord` int(11) NOT NULL,
  `ID_Appointment` int(11) NOT NULL,
  `ReasonCheckup` varchar(50) DEFAULT NULL,
  `BodyCheck` varchar(50) DEFAULT NULL,
  `BodyPartsCheck` varchar(50) DEFAULT NULL,
  `PulseRate` int(11) DEFAULT NULL,
  `Temp` float DEFAULT NULL,
  `BloodPressure` varchar(10) DEFAULT NULL,
  `Breathing` int(11) DEFAULT NULL,
  `Height` float DEFAULT NULL,
  `Weight` float DEFAULT NULL,
  `Result` varchar(255) DEFAULT NULL,
  `TreatmentDirection` varchar(255) DEFAULT NULL,
  `Advice` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicalrecord`
--

INSERT INTO `medicalrecord` (`ID_MedicalRecord`, `ID_Appointment`, `ReasonCheckup`, `BodyCheck`, `BodyPartsCheck`, `PulseRate`, `Temp`, `BloodPressure`, `Breathing`, `Height`, `Weight`, `Result`, `TreatmentDirection`, `Advice`) VALUES
(295, 16, 'đau họng', 'Bình thường', 'Bình thường', 80, 37, '170/30', 100, 1.73, 67, 'Viêm họng cấp', 'uống thuốc đầy đủ', 'hạn chế uống nước đá'),
(304, 33, 'đau bụng', 'Bình thường', 'Bình thường', 0, 0, '', 0, 0, 0, 'av', '', ''),
(306, 37, 'đau họng', 'Bình thường', 'Bình thường', 0, 0, '', 0, 0, 0, '', '', ''),
(307, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(308, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(309, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `ID_Medicine` int(11) NOT NULL,
  `TitleMedicine` varchar(255) NOT NULL,
  `Ingredients` varchar(255) NOT NULL,
  `MedicineContent` text NOT NULL,
  `PrescriptionDrug` text NOT NULL,
  `ContraindicationsDrug` text NOT NULL,
  `Production` varchar(100) NOT NULL,
  `UnitPrice` int(11) NOT NULL,
  `Type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`ID_Medicine`, `TitleMedicine`, `Ingredients`, `MedicineContent`, `PrescriptionDrug`, `ContraindicationsDrug`, `Production`, `UnitPrice`, `Type`) VALUES
(1, 'Natri Clorid', 'Natri Clorid 0.9%', 'NaCl 0,9% được sử dụng để điều trị hoặc ngăn ngừa tình trạng mất muối bởi tình trạng mất nước do tiê', 'Nhỏ mắt người lớn', 'Chống chỉ định', 'Việt Nam', 1320, 'Lọ'),
(2, 'PARACETAMOL 650MG', 'PARACETAMOL 650MG', 'Hạ nhiệt, giảm đau. Không gây lệ thuộc thuốc, không gây kích ứng đường tiêu hóa.', 'Paracetamol được dùng làm thuốc giảm đau và hạ sốt từ nhẹ đến vừa. \n\nĐiều trị các chứng đau do ngu', 'Quá mẫn cảm với thuốc.\nNgười bệnh suy gan hoặc thận nặng.\nThiếu hụt glucose-6-phosphat dehydrogena', 'Việt Nam', 147, 'Viên'),
(3, 'Augbidil', 'Amoxicilin 875mg + Axit clavulanic 125mg', 'điều trị các trường hợp nhiễm khuẩn nặng đường tiết niệu – sinh dục gây ra do các chủng E.coli, Klebsiella và Enterobacter (viêm bàng quang, viêm bể thận, viêm niệu đạo), bệnh nhiễm khuẩn da và mô mềm (áp xe, mụn nhọt, vết thương nhiễm khuẩn), áp xe khi mổ răng, viêm tủy xương.', 'Điều trị trong thời gian ngắn các trường hợp nhiễm khuẩn đường hô hấp trên nặng như viêm xoang, viêm amidan, viêm tai giữa đã điều trị bằng các loại thuốc kháng sinh thông thường nhưng không cải thiện.\r\nĐiều trị nhiễm khuẩn đường hô hấp dưới do các chủng vi khuẩn H. influenzae và Branhamella catarrhalis sản sinh beta – lactamase như viêm phế quản cấp và mạn, viêm phổi.\r\nThuốc Augbidil còn được sử dụng để điều trị nhiễm khuẩn đường tiết niệu – sinh dục nặng do các chủng vi khuẩn E.coli, Klebsiella và Enterobacter sản sinh như viêm bàng quang, viêm niệu đạo, viêm bể thận.\r\nĐiều trị nhiễm khuẩn da và mô mềm như mụn nhọt, áp xe, nhiễm khuẩn vết thương.\r\nĐiều trị viêm tủy xương, áp xe ổ răng.', 'dị ứng với  amoxicillin, axit clavulanic, penicillin, cephalosporin hoặc bất kỳ thành phần nào của thuốc', 'Việt Nam', 100, 'Viên');

-- --------------------------------------------------------

--
-- Table structure for table `medicinesfortreatment`
--

CREATE TABLE `medicinesfortreatment` (
  `ID_Prescription` int(11) NOT NULL,
  `ID_Medicine` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `TotalMoney` int(11) NOT NULL,
  `DescriptionTreatment` varchar(100) NOT NULL,
  `Morning` tinyint(1) DEFAULT NULL,
  `Afternoon` tinyint(1) DEFAULT NULL,
  `Evening` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicinesfortreatment`
--

INSERT INTO `medicinesfortreatment` (`ID_Prescription`, `ID_Medicine`, `Amount`, `TotalMoney`, `DescriptionTreatment`, `Morning`, `Afternoon`, `Evening`) VALUES
(55, 2, 12, 1764, '', 1, 1, 0),
(62, 2, 12, 1764, 'Uống sau khi ăn', 1, 1, 0),
(64, 1, 5, 6600, 'Nhỏ rửa mắt, ngày 2 lần, mỗi lần 2-3 giọt', 0, 0, 0),
(64, 2, 20, 2940, 'Uống sau khi ăn', 1, 1, 0),
(64, 3, 10, 1000, 'Uống sau khi ăn', 1, 1, 0),
(65, 1, 232, 306240, 'Nhỏ rửa mắt, ngày 2 lần, mỗi lần 2-3 giọt', 0, 0, 0),
(65, 2, 1222, 179634, 'Uống sau khi ăn', 1, 0, 0),
(65, 3, 100, 10000, 'Uống sau khi ăn', 1, 1, 0),
(66, 3, 10000, 1000000, 'Nhỏ rửa mắt, ngày 2 lần, mỗi lần 2-3 giọt', 1, 1, 0),
(67, 3, 11111, 1111100, 'Uống sau khi ăn', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
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
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`ID_Patient`, `Name`, `DOB`, `Sex`, `Address`, `CMND`, `PhoneNumber`, `ID_BHYT`, `UserName`, `Password`) VALUES
(1, 'nghia', '2012-12-12', 'nam', '40', 'xxx', '123', '9222590774', 'tran', '345453'),
(2, 'Trần Nhân Nghĩa', '2000-01-24', 'Nam', 'Số 40, đường số 3, KDC Thới Nhựt 2, phường An Khánh, quận Ninh Kiều, TP Cần Thơ', NULL, '0939635755', 'GD4929222590774', 'trannhannghia@gmail.com', '593992d613b77c065055acd511edab67');

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `ID_PaymentMethod` int(11) NOT NULL,
  `Title_PaymentMethod` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `presciption`
--

CREATE TABLE `presciption` (
  `ID_Prescription` int(11) NOT NULL,
  `ID_Appointment` int(11) NOT NULL,
  `TotalAmount` int(11) DEFAULT NULL,
  `BHYT_Pay` int(11) DEFAULT NULL,
  `Patient_Pay` int(11) DEFAULT NULL,
  `expDate` date DEFAULT NULL,
  `Status_Pay` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presciption`
--

INSERT INTO `presciption` (`ID_Prescription`, `ID_Appointment`, `TotalAmount`, `BHYT_Pay`, `Patient_Pay`, `expDate`, `Status_Pay`) VALUES
(1, 1, 12000, 120000, 0, NULL, 'Đã thanh toán'),
(2, 2, 50000, 50000, 0, NULL, 'Đã thanh toán'),
(3, 3, 200000, 200000, 0, NULL, 'Đã thanh toán'),
(55, 16, 1764, 1764, 100000, '0000-00-00', 'Chưa thanh toán'),
(62, 33, 1764, 1764, 0, '2022-04-22', 'Chưa thanh toán'),
(64, 37, 10540, 10540, 0, '2022-04-24', 'Chưa thanh toán'),
(65, 38, 495874, 396699, 99175, '2028-09-24', 'Chưa thanh toán'),
(66, 39, 1000000, 800000, 200000, '2022-05-04', 'Chưa thanh toán'),
(67, 40, 1111100, 888880, 222220, '2022-05-06', 'Đã thanh toán');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `ID_Room` int(11) NOT NULL,
  `Name_Room` varchar(100) NOT NULL,
  `ID_Dept` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`ID_Room`, `Name_Room`, `ID_Dept`) VALUES
(11, 'Phòng 11', 1),
(12, 'Phòng 12', 1),
(21, 'Phòng 21', 2),
(22, 'Phòng 22', 2),
(31, 'Phòng 31', 3),
(32, 'Phòng 32', 3),
(71, 'Phòng 71', 7),
(72, 'Phòng 72', 7);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `ID_schedule` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `Session` varchar(15) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `ID_Staff` int(11) NOT NULL,
  `ID_Room` int(11) NOT NULL,
  `t_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`ID_schedule`, `title`, `Session`, `start`, `end`, `ID_Staff`, `ID_Room`, `t_stamp`) VALUES
(38, 'Khám ngoại', 'Sáng', '2022-03-30 07:30:00', '2022-03-30 08:00:00', 4, 71, '2022-03-30 09:07:16'),
(39, 'Khám ngoại', 'Sáng', '2022-03-30 08:00:00', '2022-03-30 08:30:00', 4, 71, '2022-03-30 09:07:16'),
(40, 'Khám ngoại', 'Sáng', '2022-03-30 08:30:00', '2022-03-30 09:00:00', 4, 71, '2022-03-30 09:07:16'),
(41, 'Khám ngoại', 'Sáng', '2022-03-30 09:00:00', '2022-03-30 09:30:00', 4, 71, '2022-03-30 09:07:16'),
(42, 'Khám ngoại', 'Sáng', '2022-03-30 09:30:00', '2022-03-30 10:00:00', 4, 71, '2022-03-30 09:07:16'),
(43, 'Khám ngoại', 'Sáng', '2022-03-30 10:00:00', '2022-03-30 10:30:00', 4, 71, '2022-03-30 09:07:16'),
(44, 'Khám ngoại', 'Sáng', '2022-03-30 10:30:00', '2022-03-30 11:00:00', 4, 71, '2022-03-30 09:07:16'),
(45, 'Khám ngoại', 'Sáng', '2022-03-30 11:00:00', '2022-03-30 11:30:00', 4, 71, '2022-03-30 09:07:16'),
(46, 'Khám ngoại', 'Chiều', '2022-03-30 13:00:00', '2022-03-30 17:00:00', 4, 72, '2022-03-30 09:07:30'),
(47, 'Khám ngoại', 'Chiều', '2022-03-30 13:30:00', '2022-03-30 17:30:00', 4, 72, '2022-03-30 09:07:30'),
(48, 'Khám ngoại', 'Chiều', '2022-03-30 14:00:00', '2022-03-30 18:00:00', 4, 72, '2022-03-30 09:07:30'),
(49, 'Khám ngoại', 'Chiều', '2022-03-30 14:30:00', '2022-03-30 18:30:00', 4, 72, '2022-03-30 09:07:30'),
(50, 'Khám ngoại', 'Chiều', '2022-03-30 15:00:00', '2022-03-30 19:00:00', 4, 72, '2022-03-30 09:07:30'),
(51, 'Khám ngoại', 'Chiều', '2022-03-30 15:30:00', '2022-03-30 19:30:00', 4, 72, '2022-03-30 09:07:30'),
(52, 'Khám ngoại', 'Chiều', '2022-03-30 16:00:00', '2022-03-30 20:00:00', 4, 72, '2022-03-30 09:07:30'),
(53, 'Khám ngoại', 'Chiều', '2022-03-30 16:30:00', '2022-03-30 20:30:00', 4, 72, '2022-03-30 09:07:30'),
(54, 'Khám ngoại', 'Ngoài giờ', '2022-03-30 18:30:00', '2022-03-30 21:30:00', 4, 72, '2022-03-30 09:07:42'),
(55, 'Khám ngoại', 'Ngoài giờ', '2022-03-30 19:00:00', '2022-03-30 22:00:00', 4, 72, '2022-03-30 09:07:42'),
(56, 'Khám ngoại', 'Ngoài giờ', '2022-03-30 19:30:00', '2022-03-30 22:30:00', 4, 72, '2022-03-30 09:07:42'),
(57, 'Khám ngoại', 'Ngoài giờ', '2022-03-30 20:00:00', '2022-03-30 23:00:00', 4, 72, '2022-03-30 09:07:42'),
(58, 'Khám ngoại', 'Ngoài giờ', '2022-03-30 20:30:00', '2022-03-30 23:30:00', 4, 72, '2022-03-30 09:07:42'),
(59, 'Khám ngoại', 'Ngoài giờ', '2022-03-30 21:00:00', '2022-03-31 00:00:00', 4, 72, '2022-03-30 09:07:42'),
(60, 'Khám ngoại', 'Chiều', '2022-04-03 13:00:00', '2022-04-03 17:00:00', 4, 72, '2022-04-03 08:40:38'),
(61, 'Khám ngoại', 'Chiều', '2022-04-03 13:30:00', '2022-04-03 17:30:00', 4, 72, '2022-04-03 08:40:38'),
(62, 'Khám ngoại', 'Chiều', '2022-04-03 14:00:00', '2022-04-03 18:00:00', 4, 72, '2022-04-03 08:40:38'),
(63, 'Khám ngoại', 'Chiều', '2022-04-03 14:30:00', '2022-04-03 18:30:00', 4, 72, '2022-04-03 08:40:38'),
(64, 'Khám ngoại', 'Chiều', '2022-04-03 15:00:00', '2022-04-03 19:00:00', 4, 72, '2022-04-03 08:40:38'),
(65, 'Khám ngoại', 'Chiều', '2022-04-03 15:30:00', '2022-04-03 19:30:00', 4, 72, '2022-04-03 08:40:38'),
(66, 'Khám ngoại', 'Chiều', '2022-04-03 16:00:00', '2022-04-03 20:00:00', 4, 72, '2022-04-03 08:40:38'),
(67, 'Khám ngoại', 'Chiều', '2022-04-03 16:30:00', '2022-04-03 20:30:00', 4, 72, '2022-04-03 08:40:38'),
(68, 'Khám ngoại', 'Sáng', '2022-04-08 07:30:00', '2022-04-08 08:00:00', 4, 72, '2022-04-08 14:10:32'),
(69, 'Khám ngoại', 'Sáng', '2022-04-08 08:00:00', '2022-04-08 08:30:00', 4, 72, '2022-04-08 14:10:32'),
(70, 'Khám ngoại', 'Sáng', '2022-04-08 08:30:00', '2022-04-08 09:00:00', 4, 72, '2022-04-08 14:10:32'),
(71, 'Khám ngoại', 'Sáng', '2022-04-08 09:00:00', '2022-04-08 09:30:00', 4, 72, '2022-04-08 14:10:32'),
(72, 'Khám ngoại', 'Sáng', '2022-04-08 09:30:00', '2022-04-08 10:00:00', 4, 72, '2022-04-08 14:10:32'),
(73, 'Khám ngoại', 'Sáng', '2022-04-08 10:00:00', '2022-04-08 10:30:00', 4, 72, '2022-04-08 14:10:32'),
(74, 'Khám ngoại', 'Sáng', '2022-04-08 10:30:00', '2022-04-08 11:00:00', 4, 72, '2022-04-08 14:10:32'),
(75, 'Khám ngoại', 'Sáng', '2022-04-08 11:00:00', '2022-04-08 11:30:00', 4, 72, '2022-04-08 14:10:32'),
(76, 'Khám ngoại', 'Chiều', '2022-04-08 13:00:00', '2022-04-08 17:00:00', 4, 72, '2022-04-08 14:10:47'),
(77, 'Khám ngoại', 'Chiều', '2022-04-08 13:30:00', '2022-04-08 17:30:00', 4, 72, '2022-04-08 14:10:47'),
(78, 'Khám ngoại', 'Chiều', '2022-04-08 14:00:00', '2022-04-08 18:00:00', 4, 72, '2022-04-08 14:10:47'),
(79, 'Khám ngoại', 'Chiều', '2022-04-08 14:30:00', '2022-04-08 18:30:00', 4, 72, '2022-04-08 14:10:47'),
(80, 'Khám ngoại', 'Chiều', '2022-04-08 15:00:00', '2022-04-08 19:00:00', 4, 72, '2022-04-08 14:10:47'),
(81, 'Khám ngoại', 'Chiều', '2022-04-08 15:30:00', '2022-04-08 19:30:00', 4, 72, '2022-04-08 14:10:47'),
(82, 'Khám ngoại', 'Chiều', '2022-04-08 16:00:00', '2022-04-08 20:00:00', 4, 72, '2022-04-08 14:10:47'),
(83, 'Khám ngoại', 'Chiều', '2022-04-08 16:30:00', '2022-04-08 20:30:00', 4, 72, '2022-04-08 14:10:47'),
(84, 'Khám ngoại', 'Sáng', '2022-04-09 07:30:00', '2022-04-09 08:00:00', 4, 71, '2022-04-09 01:43:56'),
(85, 'Khám ngoại', 'Sáng', '2022-04-09 08:00:00', '2022-04-09 08:30:00', 4, 71, '2022-04-09 01:43:56'),
(86, 'Khám ngoại', 'Sáng', '2022-04-09 08:30:00', '2022-04-09 09:00:00', 4, 71, '2022-04-09 01:43:56'),
(87, 'Khám ngoại', 'Sáng', '2022-04-09 09:00:00', '2022-04-09 09:30:00', 4, 71, '2022-04-09 01:43:56'),
(88, 'Khám ngoại', 'Sáng', '2022-04-09 09:30:00', '2022-04-09 10:00:00', 4, 71, '2022-04-09 01:43:56'),
(89, 'Khám ngoại', 'Sáng', '2022-04-09 10:00:00', '2022-04-09 10:30:00', 4, 71, '2022-04-09 01:43:56'),
(90, 'Khám ngoại', 'Sáng', '2022-04-09 10:30:00', '2022-04-09 11:00:00', 4, 71, '2022-04-09 01:43:56'),
(91, 'Khám ngoại', 'Sáng', '2022-04-09 11:00:00', '2022-04-09 11:30:00', 4, 71, '2022-04-09 01:43:56'),
(92, 'Khám ngoại', 'Sáng', '2022-04-13 07:30:00', '2022-04-13 08:00:00', 4, 71, '2022-04-13 02:36:48'),
(93, 'Khám ngoại', 'Sáng', '2022-04-13 08:00:00', '2022-04-13 08:30:00', 4, 71, '2022-04-13 02:36:48'),
(94, 'Khám ngoại', 'Sáng', '2022-04-13 08:30:00', '2022-04-13 09:00:00', 4, 71, '2022-04-13 02:36:48'),
(95, 'Khám ngoại', 'Sáng', '2022-04-13 09:00:00', '2022-04-13 09:30:00', 4, 71, '2022-04-13 02:36:48'),
(96, 'Khám ngoại', 'Sáng', '2022-04-13 09:30:00', '2022-04-13 10:00:00', 4, 71, '2022-04-13 02:36:48'),
(97, 'Khám ngoại', 'Sáng', '2022-04-13 10:00:00', '2022-04-13 10:30:00', 4, 71, '2022-04-13 02:36:48'),
(98, 'Khám ngoại', 'Sáng', '2022-04-13 10:30:00', '2022-04-13 11:00:00', 4, 71, '2022-04-13 02:36:48'),
(99, 'Khám ngoại', 'Sáng', '2022-04-13 11:00:00', '2022-04-13 11:30:00', 4, 71, '2022-04-13 02:36:48'),
(100, 'Khám ngoại', 'Chiều', '2022-04-14 13:00:00', '2022-04-14 17:00:00', 4, 71, '2022-04-13 02:36:58'),
(101, 'Khám ngoại', 'Chiều', '2022-04-14 13:30:00', '2022-04-14 17:30:00', 4, 71, '2022-04-13 02:36:58'),
(102, 'Khám ngoại', 'Chiều', '2022-04-14 14:00:00', '2022-04-14 18:00:00', 4, 71, '2022-04-13 02:36:58'),
(103, 'Khám ngoại', 'Chiều', '2022-04-14 14:30:00', '2022-04-14 18:30:00', 4, 71, '2022-04-13 02:36:58'),
(104, 'Khám ngoại', 'Chiều', '2022-04-14 15:00:00', '2022-04-14 19:00:00', 4, 71, '2022-04-13 02:36:58'),
(105, 'Khám ngoại', 'Chiều', '2022-04-14 15:30:00', '2022-04-14 19:30:00', 4, 71, '2022-04-13 02:36:58'),
(106, 'Khám ngoại', 'Chiều', '2022-04-14 16:00:00', '2022-04-14 20:00:00', 4, 71, '2022-04-13 02:36:58'),
(107, 'Khám ngoại', 'Chiều', '2022-04-14 16:30:00', '2022-04-14 20:30:00', 4, 71, '2022-04-13 02:36:58'),
(114, 'Khám ngoại', 'Sáng', '2022-04-15 07:30:00', '2022-04-15 08:00:00', 4, 72, '2022-04-14 16:14:05'),
(115, 'Khám ngoại', 'Sáng', '2022-04-15 08:00:00', '2022-04-15 08:30:00', 4, 72, '2022-04-14 16:14:05'),
(116, 'Khám ngoại', 'Sáng', '2022-04-15 08:30:00', '2022-04-15 09:00:00', 4, 72, '2022-04-14 16:14:05'),
(117, 'Khám ngoại', 'Sáng', '2022-04-15 09:00:00', '2022-04-15 09:30:00', 4, 72, '2022-04-14 16:14:05'),
(118, 'Khám ngoại', 'Sáng', '2022-04-15 09:30:00', '2022-04-15 10:00:00', 4, 72, '2022-04-14 16:14:05'),
(119, 'Khám ngoại', 'Sáng', '2022-04-15 10:00:00', '2022-04-15 10:30:00', 4, 72, '2022-04-14 16:14:05'),
(120, 'Khám ngoại', 'Sáng', '2022-04-15 10:30:00', '2022-04-15 11:00:00', 4, 72, '2022-04-14 16:14:05'),
(121, 'Khám ngoại', 'Sáng', '2022-04-15 11:00:00', '2022-04-15 11:30:00', 4, 72, '2022-04-14 16:14:05'),
(122, 'Khám ngoại', 'Chiều', '2022-04-24 13:00:00', '2022-04-24 17:00:00', 4, 71, '2022-04-24 00:48:23'),
(123, 'Khám ngoại', 'Chiều', '2022-04-24 13:30:00', '2022-04-24 17:30:00', 4, 71, '2022-04-24 00:48:23'),
(124, 'Khám ngoại', 'Chiều', '2022-04-24 14:00:00', '2022-04-24 18:00:00', 4, 71, '2022-04-24 00:48:23'),
(125, 'Khám ngoại', 'Chiều', '2022-04-24 14:30:00', '2022-04-24 18:30:00', 4, 71, '2022-04-24 00:48:23'),
(126, 'Khám ngoại', 'Chiều', '2022-04-24 15:00:00', '2022-04-24 19:00:00', 4, 71, '2022-04-24 00:48:23'),
(127, 'Khám ngoại', 'Chiều', '2022-04-24 15:30:00', '2022-04-24 19:30:00', 4, 71, '2022-04-24 00:48:23'),
(128, 'Khám ngoại', 'Chiều', '2022-04-24 16:00:00', '2022-04-24 20:00:00', 4, 71, '2022-04-24 00:48:23'),
(129, 'Khám ngoại', 'Chiều', '2022-04-24 16:30:00', '2022-04-24 20:30:00', 4, 71, '2022-04-24 00:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `ID_Staff` int(11) NOT NULL,
  `Name_Staff` varchar(100) NOT NULL,
  `DOB_Staff` date NOT NULL,
  `Sex_Staff` varchar(10) NOT NULL,
  `Address_Staff` varchar(200) NOT NULL,
  `CMND_Staff` varchar(15) NOT NULL,
  `PhoneNumber_Staff` varchar(25) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `ID_Dept` int(11) NOT NULL,
  `DateStartWork` date NOT NULL,
  `VoteRate` double NOT NULL DEFAULT 0,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID_Staff`, `Name_Staff`, `DOB_Staff`, `Sex_Staff`, `Address_Staff`, `CMND_Staff`, `PhoneNumber_Staff`, `Position`, `ID_Dept`, `DateStartWork`, `VoteRate`, `UserName`, `Password`) VALUES
(1, 'Trần Nhân Nghĩa', '2000-01-24', 'Nam', 'An Khánh', '092200000280', '0939635755', 'Admin', 0, '2020-01-24', 0, 'admin', '19513b313f52755a0956c2be7f48d86f'),
(4, 'Chae Song-hwa', '1982-08-04', 'Nữ', 'Nguyễn Đệ, Bình Thủy, Cần Thơ', '312328285', '0939017069', 'Bác sĩ', 7, '2010-07-10', 4.4, 'chae', '40a0a40b8110608cf0866037654e3f74'),
(6, 'Lee Ik-jun', '1980-12-26', 'Nam', 'Nguyễn Đệ, Bình Thủy, Cần Thơ', '09220000123', '0989123456', 'Bác sĩ', 1, '2000-10-19', 4.9, 'lee', 'b0f8b49f22c718e9924f5b1165111a67'),
(7, 'Lê Doãn Khánh', '2000-04-17', 'Nam', 'Bình Thủy, Cần Thơ', '092200000154', '01234567', 'Bác sĩ', 5, '2020-06-30', 3.4, 'ledoankhanh', 'bbee2e7c540fde597ad1a708bc30b51c'),
(8, 'Yoo Yeon-seok', '1984-04-11', 'Nam', 'Cần Thơ', '09220000555', '09897887665', 'Bác sĩ', 3, '2003-10-22', 2.1, 'yoo', 'a95b429d7a93263081a83b9bf7c9f7e3'),
(9, 'Harry Waston', '1970-12-04', 'Nam', 'An Khánh, Ninh Kiều, Cần Thơ', '09220003456', '09123456', 'Bác sĩ', 7, '2000-04-05', 0, 'harry', '3b87c97d15e8eb11e51aa25e9a5770e9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`ID_Appointment`),
  ADD KEY `ID_Patient` (`ID_Patient`),
  ADD KEY `ID_PaymentMethod` (`ID_PaymentMethod`),
  ADD KEY `ID_Staff` (`ID_Staff`),
  ADD KEY `Date_Checkup` (`Date_Checkup`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`ID_Dept`);

--
-- Indexes for table `diagnose`
--
ALTER TABLE `diagnose`
  ADD PRIMARY KEY (`ID_Diagnose`),
  ADD KEY `ID_Disease` (`ID_Disease`),
  ADD KEY `ID_MedicalRecord` (`ID_MedicalRecord`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`ID_Disease`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`ID_Evaluation`),
  ADD KEY `ID_Appointment` (`ID_Appointment`);

--
-- Indexes for table `img_staff`
--
ALTER TABLE `img_staff`
  ADD PRIMARY KEY (`ID_ImgStaff`),
  ADD KEY `img_staff_ibfk_1` (`ID_Staff`);

--
-- Indexes for table `medicalrecord`
--
ALTER TABLE `medicalrecord`
  ADD PRIMARY KEY (`ID_MedicalRecord`),
  ADD KEY `ID_Appointment` (`ID_Appointment`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`ID_Medicine`);

--
-- Indexes for table `medicinesfortreatment`
--
ALTER TABLE `medicinesfortreatment`
  ADD PRIMARY KEY (`ID_Prescription`,`ID_Medicine`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`ID_Patient`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`ID_PaymentMethod`);

--
-- Indexes for table `presciption`
--
ALTER TABLE `presciption`
  ADD PRIMARY KEY (`ID_Prescription`),
  ADD KEY `ID_Appointment` (`ID_Appointment`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`ID_Room`),
  ADD KEY `ID_Dept` (`ID_Dept`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`ID_schedule`),
  ADD KEY `ID_Room` (`ID_Room`),
  ADD KEY `ID_Staff` (`ID_Staff`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID_Staff`),
  ADD KEY `ID_Dept` (`ID_Dept`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `ID_Appointment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `ID_Dept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `diagnose`
--
ALTER TABLE `diagnose`
  MODIFY `ID_Diagnose` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `ID_Disease` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `ID_Evaluation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `img_staff`
--
ALTER TABLE `img_staff`
  MODIFY `ID_ImgStaff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `medicalrecord`
--
ALTER TABLE `medicalrecord`
  MODIFY `ID_MedicalRecord` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `ID_Medicine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `ID_Patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `ID_PaymentMethod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presciption`
--
ALTER TABLE `presciption`
  MODIFY `ID_Prescription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `ID_schedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `ID_Staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`ID_Patient`) REFERENCES `patient` (`ID_Patient`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`ID_PaymentMethod`) REFERENCES `paymentmethod` (`ID_PaymentMethod`),
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`ID_Staff`) REFERENCES `staff` (`ID_Staff`),
  ADD CONSTRAINT `appointment_ibfk_4` FOREIGN KEY (`Date_Checkup`) REFERENCES `schedule` (`ID_schedule`);

--
-- Constraints for table `diagnose`
--
ALTER TABLE `diagnose`
  ADD CONSTRAINT `diagnose_ibfk_2` FOREIGN KEY (`ID_Disease`) REFERENCES `disease` (`ID_Disease`),
  ADD CONSTRAINT `diagnose_ibfk_3` FOREIGN KEY (`ID_MedicalRecord`) REFERENCES `medicalrecord` (`ID_MedicalRecord`);

--
-- Constraints for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_ibfk_1` FOREIGN KEY (`ID_Appointment`) REFERENCES `appointment` (`ID_Appointment`);

--
-- Constraints for table `img_staff`
--
ALTER TABLE `img_staff`
  ADD CONSTRAINT `img_staff_ibfk_1` FOREIGN KEY (`ID_Staff`) REFERENCES `staff` (`ID_Staff`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medicalrecord`
--
ALTER TABLE `medicalrecord`
  ADD CONSTRAINT `medicalrecord_ibfk_1` FOREIGN KEY (`ID_Appointment`) REFERENCES `appointment` (`ID_Appointment`);

--
-- Constraints for table `medicinesfortreatment`
--
ALTER TABLE `medicinesfortreatment`
  ADD CONSTRAINT `medicinesfortreatment_ibfk_1` FOREIGN KEY (`ID_Medicine`) REFERENCES `medicine` (`ID_Medicine`),
  ADD CONSTRAINT `medicinesfortreatment_ibfk_2` FOREIGN KEY (`ID_Prescription`) REFERENCES `presciption` (`ID_Prescription`);

--
-- Constraints for table `presciption`
--
ALTER TABLE `presciption`
  ADD CONSTRAINT `presciption_ibfk_1` FOREIGN KEY (`ID_Appointment`) REFERENCES `appointment` (`ID_Appointment`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`ID_Dept`) REFERENCES `dept` (`ID_Dept`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`ID_Room`) REFERENCES `room` (`ID_Room`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`ID_Staff`) REFERENCES `staff` (`ID_Staff`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`ID_Dept`) REFERENCES `dept` (`ID_Dept`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

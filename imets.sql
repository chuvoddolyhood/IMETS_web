-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 06:40 PM
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
  `Date_HospitalDischarge` date DEFAULT NULL,
  `Date_ReCheckup` date DEFAULT NULL,
  `ID_Prescription` int(11) DEFAULT NULL,
  `ID_PaymentMethod` int(11) DEFAULT NULL,
  `StatusAppointment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`ID_Appointment`, `ID_Staff`, `ID_Patient`, `Date_Booking`, `Date_Checkup`, `Date_HospitalDischarge`, `Date_ReCheckup`, `ID_Prescription`, `ID_PaymentMethod`, `StatusAppointment`) VALUES
(16, 4, 2, '2022-03-25 20:51:45', 38, NULL, '0000-00-00', NULL, NULL, 'Nhận bệnh');

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
(8, 1, 2);

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
  `PatientStart` float NOT NULL,
  `DoctorStar` float NOT NULL,
  `PatientComment` text NOT NULL,
  `DoctorComment` text NOT NULL,
  `ID_Appointment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `medical`
--

CREATE TABLE `medical` (
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
-- Dumping data for table `medical`
--

INSERT INTO `medical` (`ID_Medicine`, `TitleMedicine`, `Ingredients`, `MedicineContent`, `PrescriptionDrug`, `ContraindicationsDrug`, `Production`, `UnitPrice`, `Type`) VALUES
(1, 'Natri Clorid', 'Natri Clorid 0.9%', 'NaCl 0,9% được sử dụng để điều trị hoặc ngăn ngừa tình trạng mất muối bởi tình trạng mất nước do tiê', 'Nhỏ mắt người lớn', 'Chống chỉ định', 'Việt Nam', 1320, 'Lọ'),
(2, 'PARACETAMOL 650MG', 'PARACETAMOL 650MG', 'Hạ nhiệt, giảm đau. Không gây lệ thuộc thuốc, không gây kích ứng đường tiêu hóa.', 'Paracetamol được dùng làm thuốc giảm đau và hạ sốt từ nhẹ đến vừa. \n\nĐiều trị các chứng đau do ngu', 'Quá mẫn cảm với thuốc.\nNgười bệnh suy gan hoặc thận nặng.\nThiếu hụt glucose-6-phosphat dehydrogena', 'Việt Nam', 147, 'Viên');

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
  `BloodPressure` int(11) DEFAULT NULL,
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
(2, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 16, 'đau họng', 'Bình thường', 'Bình thường', 1, 1, 1, 1, 1, 1, '', '', ''),
(77, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 16, 'đau họng', 'Bình thường', 'Bình thường', 0, 0, 0, 0, 0, 0, '', '', ''),
(99, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicinesfortreatment`
--

CREATE TABLE `medicinesfortreatment` (
  `ID_Prescription` int(11) NOT NULL,
  `ID_Medicine` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `TotalMoney` int(11) NOT NULL,
  `DescriptionTreatment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'Trần Nhân Nghĩa', '2000-01-24', 'Nam', NULL, NULL, '0939635755', NULL, 'trannhannghia@gmail.com', '593992d613b77c065055acd511edab67');

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
  `Description` text NOT NULL,
  `TotalAmount` int(11) NOT NULL,
  `assuranceHealth` float NOT NULL,
  `PatientPays` int(11) NOT NULL,
  `expDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `DateWorking` date DEFAULT NULL,
  `TimeStart` time DEFAULT NULL,
  `Session` varchar(15) NOT NULL,
  `ID_Staff` int(11) NOT NULL,
  `ID_Room` int(11) NOT NULL,
  `t_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`ID_schedule`, `title`, `DateWorking`, `TimeStart`, `Session`, `ID_Staff`, `ID_Room`, `t_stamp`, `start`, `end`) VALUES
(38, 'Khám ngoại', NULL, NULL, 'Sáng', 4, 71, '2022-03-30 09:07:16', '2022-03-30 07:30:00', '2022-03-30 08:00:00'),
(39, 'Khám ngoại', NULL, NULL, 'Sáng', 4, 71, '2022-03-30 09:07:16', '2022-03-30 08:00:00', '2022-03-30 08:30:00'),
(40, 'Khám ngoại', NULL, NULL, 'Sáng', 4, 71, '2022-03-30 09:07:16', '2022-03-30 08:30:00', '2022-03-30 09:00:00'),
(41, 'Khám ngoại', NULL, NULL, 'Sáng', 4, 71, '2022-03-30 09:07:16', '2022-03-30 09:00:00', '2022-03-30 09:30:00'),
(42, 'Khám ngoại', NULL, NULL, 'Sáng', 4, 71, '2022-03-30 09:07:16', '2022-03-30 09:30:00', '2022-03-30 10:00:00'),
(43, 'Khám ngoại', NULL, NULL, 'Sáng', 4, 71, '2022-03-30 09:07:16', '2022-03-30 10:00:00', '2022-03-30 10:30:00'),
(44, 'Khám ngoại', NULL, NULL, 'Sáng', 4, 71, '2022-03-30 09:07:16', '2022-03-30 10:30:00', '2022-03-30 11:00:00'),
(45, 'Khám ngoại', NULL, NULL, 'Sáng', 4, 71, '2022-03-30 09:07:16', '2022-03-30 11:00:00', '2022-03-30 11:30:00'),
(46, 'Khám ngoại', NULL, NULL, 'Chiều', 4, 72, '2022-03-30 09:07:30', '2022-03-30 13:00:00', '2022-03-30 17:00:00'),
(47, 'Khám ngoại', NULL, NULL, 'Chiều', 4, 72, '2022-03-30 09:07:30', '2022-03-30 13:30:00', '2022-03-30 17:30:00'),
(48, 'Khám ngoại', NULL, NULL, 'Chiều', 4, 72, '2022-03-30 09:07:30', '2022-03-30 14:00:00', '2022-03-30 18:00:00'),
(49, 'Khám ngoại', NULL, NULL, 'Chiều', 4, 72, '2022-03-30 09:07:30', '2022-03-30 14:30:00', '2022-03-30 18:30:00'),
(50, 'Khám ngoại', NULL, NULL, 'Chiều', 4, 72, '2022-03-30 09:07:30', '2022-03-30 15:00:00', '2022-03-30 19:00:00'),
(51, 'Khám ngoại', NULL, NULL, 'Chiều', 4, 72, '2022-03-30 09:07:30', '2022-03-30 15:30:00', '2022-03-30 19:30:00'),
(52, 'Khám ngoại', NULL, NULL, 'Chiều', 4, 72, '2022-03-30 09:07:30', '2022-03-30 16:00:00', '2022-03-30 20:00:00'),
(53, 'Khám ngoại', NULL, NULL, 'Chiều', 4, 72, '2022-03-30 09:07:30', '2022-03-30 16:30:00', '2022-03-30 20:30:00'),
(54, 'Khám ngoại', NULL, NULL, 'Ngoài giờ', 4, 72, '2022-03-30 09:07:42', '2022-03-30 18:30:00', '2022-03-30 21:30:00'),
(55, 'Khám ngoại', NULL, NULL, 'Ngoài giờ', 4, 72, '2022-03-30 09:07:42', '2022-03-30 19:00:00', '2022-03-30 22:00:00'),
(56, 'Khám ngoại', NULL, NULL, 'Ngoài giờ', 4, 72, '2022-03-30 09:07:42', '2022-03-30 19:30:00', '2022-03-30 22:30:00'),
(57, 'Khám ngoại', NULL, NULL, 'Ngoài giờ', 4, 72, '2022-03-30 09:07:42', '2022-03-30 20:00:00', '2022-03-30 23:00:00'),
(58, 'Khám ngoại', NULL, NULL, 'Ngoài giờ', 4, 72, '2022-03-30 09:07:42', '2022-03-30 20:30:00', '2022-03-30 23:30:00'),
(59, 'Khám ngoại', NULL, NULL, 'Ngoài giờ', 4, 72, '2022-03-30 09:07:42', '2022-03-30 21:00:00', '2022-03-31 00:00:00'),
(60, 'Khám ngoại', NULL, NULL, 'Chiều', 4, 72, '2022-04-03 08:40:38', '2022-04-03 13:00:00', '2022-04-03 17:00:00'),
(61, 'Khám ngoại', NULL, NULL, 'Chiều', 4, 72, '2022-04-03 08:40:38', '2022-04-03 13:30:00', '2022-04-03 17:30:00'),
(62, 'Khám ngoại', NULL, NULL, 'Chiều', 4, 72, '2022-04-03 08:40:38', '2022-04-03 14:00:00', '2022-04-03 18:00:00'),
(63, 'Khám ngoại', NULL, NULL, 'Chiều', 4, 72, '2022-04-03 08:40:38', '2022-04-03 14:30:00', '2022-04-03 18:30:00'),
(64, 'Khám ngoại', NULL, NULL, 'Chiều', 4, 72, '2022-04-03 08:40:38', '2022-04-03 15:00:00', '2022-04-03 19:00:00'),
(65, 'Khám ngoại', NULL, NULL, 'Chiều', 4, 72, '2022-04-03 08:40:38', '2022-04-03 15:30:00', '2022-04-03 19:30:00'),
(66, 'Khám ngoại', NULL, NULL, 'Chiều', 4, 72, '2022-04-03 08:40:38', '2022-04-03 16:00:00', '2022-04-03 20:00:00'),
(67, 'Khám ngoại', NULL, NULL, 'Chiều', 4, 72, '2022-04-03 08:40:38', '2022-04-03 16:30:00', '2022-04-03 20:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
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
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID_Staff`, `Name`, `DOB`, `Sex`, `Address`, `CMND`, `PhoneNumber`, `Position`, `ID_Dept`, `DateStartWork`, `VoteRate`, `UserName`, `Password`) VALUES
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
  ADD KEY `Date_Checkup` (`Date_Checkup`),
  ADD KEY `ID_Prescription` (`ID_Prescription`);

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
-- Indexes for table `medical`
--
ALTER TABLE `medical`
  ADD PRIMARY KEY (`ID_Medicine`);

--
-- Indexes for table `medicalrecord`
--
ALTER TABLE `medicalrecord`
  ADD PRIMARY KEY (`ID_MedicalRecord`),
  ADD KEY `ID_Appointment` (`ID_Appointment`);

--
-- Indexes for table `medicinesfortreatment`
--
ALTER TABLE `medicinesfortreatment`
  ADD KEY `ID_Medicine` (`ID_Medicine`),
  ADD KEY `ID_Prescription` (`ID_Prescription`);

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
  ADD PRIMARY KEY (`ID_Prescription`);

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
  MODIFY `ID_Appointment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `ID_Dept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `diagnose`
--
ALTER TABLE `diagnose`
  MODIFY `ID_Diagnose` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `ID_Disease` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `ID_Evaluation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `img_staff`
--
ALTER TABLE `img_staff`
  MODIFY `ID_ImgStaff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `medical`
--
ALTER TABLE `medical`
  MODIFY `ID_Medicine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicalrecord`
--
ALTER TABLE `medicalrecord`
  MODIFY `ID_MedicalRecord` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

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
  MODIFY `ID_Prescription` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `ID_schedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

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
  ADD CONSTRAINT `appointment_ibfk_4` FOREIGN KEY (`Date_Checkup`) REFERENCES `schedule` (`ID_schedule`),
  ADD CONSTRAINT `appointment_ibfk_5` FOREIGN KEY (`ID_Prescription`) REFERENCES `presciption` (`ID_Prescription`);

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
  ADD CONSTRAINT `medicinesfortreatment_ibfk_1` FOREIGN KEY (`ID_Medicine`) REFERENCES `medical` (`ID_Medicine`),
  ADD CONSTRAINT `medicinesfortreatment_ibfk_2` FOREIGN KEY (`ID_Prescription`) REFERENCES `presciption` (`ID_Prescription`);

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

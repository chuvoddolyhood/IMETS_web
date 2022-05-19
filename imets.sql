-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 07:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
(44, 7, 8, '2022-01-17 07:24:37', 231, '2022-01-17 11:26:14', NULL, 0.8, NULL, 'Đã khám'),
(45, 7, 8, '2022-02-17 07:30:39', 240, '2022-02-17 07:31:45', NULL, 0, 2, 'Đã khám'),
(46, 6, 2, '2022-03-17 07:40:24', 247, '2022-03-17 07:42:08', '2022-03-24', 0, 2, 'Đã khám'),
(47, 6, 2, '2022-04-17 07:49:09', 254, '2022-04-17 07:50:04', NULL, 0.8, 2, 'Đã khám'),
(48, 4, 2, '2022-05-10 07:55:09', 260, '2022-05-10 07:56:41', NULL, 0.8, 2, 'Đã khám'),
(49, 4, 2, '2022-02-27 08:14:38', 268, '2022-05-18 17:16:46', NULL, 0.8, 2, 'Đã khám'),
(50, 4, 9, '2022-03-25 08:36:20', 275, '2022-03-26 21:36:51', NULL, 0.8, NULL, 'Đã khám'),
(58, 4, 10, '2022-05-18 19:21:10', 333, '2022-05-18 19:28:19', '0000-00-00', 0.8, NULL, 'Đã khám'),
(59, 4, 10, '2022-05-18 19:34:07', 358, '2022-05-18 19:34:39', NULL, 0.8, 2, 'Đã khám'),
(61, 4, 2, '2022-05-19 21:48:46', 369, '2022-05-19 21:51:45', '0000-00-00', 0.8, 2, 'Đã khám');

--
-- Triggers `appointment`
--
DELIMITER $$
CREATE TRIGGER `changeInfo_DELETE` AFTER DELETE ON `appointment` FOR EACH ROW INSERT INTO `medicalrecord_log`(`ID_Appointment`, `AtTable`, `Operation`, `UpdateAt`) VALUES (OLD.ID_Appointment,'appointment','DELETE',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `changeInfo_INSERT` AFTER INSERT ON `appointment` FOR EACH ROW INSERT INTO `medicalrecord_log`(`ID_Appointment`, `AtTable`, `Operation`, `UpdateAt`) VALUES (NEW.ID_Appointment,'appointment','INSERT',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `changeInfo_UPDATE` AFTER UPDATE ON `appointment` FOR EACH ROW INSERT INTO `medicalrecord_log`(`ID_Appointment`, `AtTable`, `Operation`, `UpdateAt`) VALUES (NEW.ID_Appointment,'appointment','UPDATE',NOW())
$$
DELIMITER ;

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
(31, 5, 313),
(32, 2, 314),
(33, 2, 315),
(34, 5, 315),
(35, 5, 316),
(36, 4, 317),
(37, 4, 318),
(38, 4, 319),
(39, 4, 320),
(40, 4, 321),
(41, 4, 322);

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
(2, 'Bệnh trào ngược dạ dày - thực quản', 'Bệnh trào ngược dạ dày – thực quản (GERD) là hiện tượng xảy ra khi dịch tiêu hoá của dạ dày thường xuyên bị chảy ngược vào thực quản (là một ống dẫn đưa thức ăn từ miệng vào dạ dày). Vì dịch này có tính axit nên có thể gây kích ứng và làm viêm niêm mạc thực quản của bạn.', 'Ợ hơi: xảy ra thường xuyên và ngay cả khi đói hoặc không ăn gì.\r\nỢ nóng: nóng rát từ dạ dày hay vùng ngực dưới, lan hướng lên cổ, có khi lan tới cả hạ họng, mang tai. Cùng với đó là vị chua ở trong miệng.\r\nỢ chua: thức ăn hoặc chất lỏng chua từ dạ dày bị đẩy lên cuống họng thường sau khi ăn, có thể tồi tệ hơn vào ban đêm.\r\nNôn và buồn nôn: xuất hiện khi ăn quá no, nằm ngay khi ăn, không kê đầu cao khi ngủ.\r\nCảm giác nóng trong ngực, tức ngực\r\nNhiều nước bọt, khó nuốt, cảm giác vướng vùng họng'),
(3, 'Viêm xoang cấp', '', ''),
(4, 'Đau dây thần kinh và viêm dây thần kinh', '', ''),
(5, 'Rối loạn chức năng gan', '', ''),
(6, 'Viêm mũi vận mạch và viêm mũi dị ứng', '', ''),
(7, 'Viêm phế quản phổi không phân loại', '', ''),
(8, 'Viêm da tiếp xúc dị ứng', '', ''),
(9, 'Viêm amydan cấp', '', ''),
(10, 'Viêm kết mạc', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `ID_Evaluation` int(11) NOT NULL,
  `PatientStar` int(11) DEFAULT NULL,
  `DoctorComment` text DEFAULT NULL,
  `DoctorStar` int(11) DEFAULT NULL,
  `PatientComment` text DEFAULT NULL,
  `ID_Appointment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`ID_Evaluation`, `PatientStar`, `DoctorComment`, `DoctorStar`, `PatientComment`, `ID_Appointment`) VALUES
(28, 5, 'Ổn', 5, 'Bác sĩ quá tuyệt vời', 44),
(29, 4, 'Okay ổn', 4, 'Bác sĩ ổn nhe', 45),
(30, 3, 'Hơi kỳ', 2, 'Không chấp nhận được :(((', 46),
(31, 5, 'Ổn', 5, 'ok', 47),
(32, 5, 'Tốt', 5, 'Bác sĩ nhiệt tình lắm!', 48),
(33, 4, 'ok tốt', 5, 'Quá ổn', 49),
(34, 3, '', 5, NULL, 50),
(35, 5, 'Bệnh nhân tiếp nhận điều trị tốt', 5, 'Bac sĩ nhiệt tình', 58),
(36, 5, 'tốt', 1, 'ko tốt', 59),
(37, 5, 'Tốt', 5, 'ok', 61);

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
(313, 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(314, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(315, 46, 'Đau bụng', '', '', 0, 0, '', 0, 0, 0, '', '', 'Uống ít bia rượu'),
(316, 47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(317, 48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(318, 49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(319, 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(320, 58, 'đau họng', '', '', 0, 0, '', 0, 0, 0, '', '', ''),
(321, 59, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(322, 61, 'đau đầu nặng', '', '', 0, 0, '', 0, 0, 0, '', '', '');

--
-- Triggers `medicalrecord`
--
DELIMITER $$
CREATE TRIGGER `changeInfo_DELETE_medicalrecord` AFTER DELETE ON `medicalrecord` FOR EACH ROW INSERT INTO `medicalrecord_log`(`ID_Appointment`, `AtTable`, `Operation`, `UpdateAt`) VALUES (OLD.ID_Appointment,'medicalrecord','DELETE',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `changeInfo_INSERT_medicalrecord` AFTER INSERT ON `medicalrecord` FOR EACH ROW INSERT INTO `medicalrecord_log`(`ID_Appointment`, `AtTable`, `Operation`, `UpdateAt`) VALUES (NEW.ID_Appointment,'medicalrecord','INSERT',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `changeInfo_UPDATE_medicalrecord` AFTER UPDATE ON `medicalrecord` FOR EACH ROW INSERT INTO `medicalrecord_log`(`ID_Appointment`, `AtTable`, `Operation`, `UpdateAt`) VALUES (NEW.ID_Appointment,'medicalrecord','UPDATE',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `medicalrecord_log`
--

CREATE TABLE `medicalrecord_log` (
  `ID_Log` int(11) NOT NULL,
  `ID_Appointment` int(11) NOT NULL,
  `AtTable` varchar(50) NOT NULL,
  `Operation` varchar(50) NOT NULL,
  `UpdateAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicalrecord_log`
--

INSERT INTO `medicalrecord_log` (`ID_Log`, `ID_Appointment`, `AtTable`, `Operation`, `UpdateAt`) VALUES
(41, 44, 'appointment', 'INSERT', '2022-05-17 07:24:37'),
(42, 44, 'appointment', 'UPDATE', '2022-05-17 07:24:45'),
(43, 44, 'medicalrecord', 'INSERT', '2022-05-17 07:24:45'),
(44, 44, 'prescription', 'INSERT', '2022-05-17 07:24:45'),
(45, 44, 'prescription', 'UPDATE', '2022-05-17 07:26:14'),
(46, 44, 'appointment', 'UPDATE', '2022-05-17 07:26:14'),
(47, 44, 'appointment', 'UPDATE', '2022-05-17 07:28:41'),
(48, 44, 'appointment', 'UPDATE', '2022-05-17 07:28:48'),
(49, 45, 'appointment', 'INSERT', '2022-05-17 07:30:39'),
(50, 45, 'appointment', 'UPDATE', '2022-05-17 07:30:51'),
(51, 45, 'medicalrecord', 'INSERT', '2022-05-17 07:30:51'),
(52, 45, 'prescription', 'INSERT', '2022-05-17 07:30:51'),
(53, 45, 'prescription', 'UPDATE', '2022-05-17 07:31:45'),
(54, 45, 'appointment', 'UPDATE', '2022-05-17 07:31:45'),
(55, 45, 'prescription', 'UPDATE', '2022-05-17 07:33:13'),
(56, 45, 'appointment', 'UPDATE', '2022-05-17 07:33:13'),
(57, 45, 'appointment', 'UPDATE', '2022-05-17 07:39:36'),
(58, 45, 'appointment', 'UPDATE', '2022-05-17 07:39:41'),
(59, 46, 'appointment', 'INSERT', '2022-05-17 07:40:24'),
(60, 46, 'appointment', 'UPDATE', '2022-05-17 07:40:37'),
(61, 46, 'medicalrecord', 'INSERT', '2022-05-17 07:40:37'),
(62, 46, 'prescription', 'INSERT', '2022-05-17 07:40:37'),
(63, 46, 'medicalrecord', 'UPDATE', '2022-05-17 07:41:06'),
(64, 46, 'appointment', 'UPDATE', '2022-05-17 07:41:06'),
(65, 46, 'prescription', 'UPDATE', '2022-05-17 07:42:08'),
(66, 46, 'appointment', 'UPDATE', '2022-05-17 07:42:08'),
(67, 46, 'prescription', 'UPDATE', '2022-05-17 07:43:39'),
(68, 46, 'appointment', 'UPDATE', '2022-05-17 07:43:39'),
(69, 46, 'appointment', 'UPDATE', '2022-05-17 07:46:57'),
(70, 46, 'appointment', 'UPDATE', '2022-05-17 07:47:00'),
(71, 46, 'appointment', 'UPDATE', '2022-05-17 07:47:12'),
(72, 46, 'prescription', 'UPDATE', '2022-05-17 07:47:19'),
(73, 47, 'appointment', 'INSERT', '2022-05-17 07:49:09'),
(74, 47, 'appointment', 'UPDATE', '2022-05-17 07:49:32'),
(75, 47, 'medicalrecord', 'INSERT', '2022-05-17 07:49:32'),
(76, 47, 'prescription', 'INSERT', '2022-05-17 07:49:32'),
(77, 47, 'prescription', 'UPDATE', '2022-05-17 07:50:04'),
(78, 47, 'appointment', 'UPDATE', '2022-05-17 07:50:04'),
(79, 47, 'prescription', 'UPDATE', '2022-05-17 07:51:01'),
(80, 47, 'appointment', 'UPDATE', '2022-05-17 07:51:01'),
(81, 47, 'appointment', 'UPDATE', '2022-05-17 07:53:56'),
(82, 47, 'appointment', 'UPDATE', '2022-05-17 07:54:00'),
(83, 47, 'prescription', 'UPDATE', '2022-05-17 07:54:08'),
(84, 48, 'appointment', 'INSERT', '2022-05-17 07:55:09'),
(85, 48, 'appointment', 'UPDATE', '2022-05-17 07:55:20'),
(86, 48, 'medicalrecord', 'INSERT', '2022-05-17 07:55:20'),
(87, 48, 'prescription', 'INSERT', '2022-05-17 07:55:20'),
(88, 48, 'prescription', 'UPDATE', '2022-05-17 07:56:41'),
(89, 48, 'appointment', 'UPDATE', '2022-05-17 07:56:41'),
(90, 48, 'prescription', 'UPDATE', '2022-05-17 07:59:28'),
(91, 48, 'appointment', 'UPDATE', '2022-05-17 08:01:46'),
(92, 48, 'appointment', 'UPDATE', '2022-05-17 08:01:50'),
(93, 48, 'appointment', 'UPDATE', '2022-05-17 08:01:56'),
(94, 48, 'prescription', 'UPDATE', '2022-05-17 08:02:23'),
(95, 48, 'prescription', 'UPDATE', '2022-05-17 08:02:29'),
(96, 49, 'appointment', 'INSERT', '2022-05-17 08:14:38'),
(97, 49, 'appointment', 'UPDATE', '2022-05-17 08:14:46'),
(98, 49, 'medicalrecord', 'INSERT', '2022-05-17 08:14:46'),
(99, 49, 'prescription', 'INSERT', '2022-05-17 08:14:46'),
(100, 49, 'prescription', 'UPDATE', '2022-05-17 08:16:13'),
(101, 49, 'appointment', 'UPDATE', '2022-05-17 08:16:13'),
(102, 49, 'prescription', 'UPDATE', '2022-05-17 08:25:02'),
(103, 49, 'prescription', 'UPDATE', '2022-05-17 08:25:19'),
(104, 49, 'prescription', 'UPDATE', '2022-05-17 08:25:29'),
(105, 49, 'prescription', 'UPDATE', '2022-05-17 08:26:45'),
(106, 49, 'appointment', 'UPDATE', '2022-05-17 08:29:20'),
(107, 49, 'appointment', 'UPDATE', '2022-05-17 08:29:26'),
(108, 49, 'appointment', 'UPDATE', '2022-05-17 08:29:53'),
(109, 49, 'appointment', 'UPDATE', '2022-05-17 08:30:59'),
(110, 49, 'prescription', 'UPDATE', '2022-05-17 08:31:13'),
(111, 49, 'prescription', 'UPDATE', '2022-05-17 08:31:17'),
(112, 50, 'appointment', 'INSERT', '2022-05-17 08:36:20'),
(113, 50, 'appointment', 'UPDATE', '2022-05-17 08:36:29'),
(114, 50, 'medicalrecord', 'INSERT', '2022-05-17 08:36:29'),
(115, 50, 'prescription', 'INSERT', '2022-05-17 08:36:29'),
(116, 50, 'prescription', 'UPDATE', '2022-05-17 08:36:51'),
(117, 50, 'appointment', 'UPDATE', '2022-05-17 08:36:51'),
(118, 50, 'appointment', 'UPDATE', '2022-05-17 08:39:18'),
(119, 50, 'appointment', 'UPDATE', '2022-05-17 08:39:33'),
(120, 50, 'prescription', 'UPDATE', '2022-05-17 08:40:10'),
(121, 50, 'prescription', 'UPDATE', '2022-05-17 08:45:28'),
(122, 50, 'prescription', 'UPDATE', '2022-05-17 08:45:33'),
(123, 50, 'prescription', 'UPDATE', '2022-05-17 08:46:20'),
(124, 51, 'appointment', 'INSERT', '2022-05-17 09:26:30'),
(125, 52, 'appointment', 'INSERT', '2022-05-17 10:41:29'),
(126, 52, 'appointment', 'DELETE', '2022-05-17 10:52:29'),
(127, 51, 'appointment', 'DELETE', '2022-05-17 10:53:40'),
(128, 53, 'appointment', 'INSERT', '2022-05-17 11:19:35'),
(129, 53, 'appointment', 'DELETE', '2022-05-17 11:26:56'),
(130, 54, 'appointment', 'INSERT', '2022-05-18 10:16:26'),
(131, 54, 'appointment', 'DELETE', '2022-05-18 10:16:32'),
(132, 55, 'appointment', 'INSERT', '2022-05-18 10:23:09'),
(133, 55, 'appointment', 'DELETE', '2022-05-18 10:23:17'),
(134, 56, 'appointment', 'INSERT', '2022-05-18 10:45:35'),
(135, 56, 'appointment', 'DELETE', '2022-05-18 10:45:45'),
(136, 49, 'prescription', 'UPDATE', '2022-05-18 17:16:02'),
(137, 49, 'appointment', 'UPDATE', '2022-05-18 17:16:02'),
(138, 49, 'prescription', 'UPDATE', '2022-05-18 17:16:46'),
(139, 49, 'appointment', 'UPDATE', '2022-05-18 17:16:46'),
(140, 57, 'appointment', 'INSERT', '2022-05-18 19:19:46'),
(141, 57, 'appointment', 'DELETE', '2022-05-18 19:20:46'),
(142, 58, 'appointment', 'INSERT', '2022-05-18 19:21:10'),
(143, 58, 'appointment', 'UPDATE', '2022-05-18 19:23:18'),
(144, 58, 'medicalrecord', 'INSERT', '2022-05-18 19:23:18'),
(145, 58, 'prescription', 'INSERT', '2022-05-18 19:23:18'),
(146, 58, 'prescription', 'UPDATE', '2022-05-18 19:28:19'),
(147, 58, 'appointment', 'UPDATE', '2022-05-18 19:28:19'),
(148, 58, 'medicalrecord', 'UPDATE', '2022-05-18 19:29:59'),
(149, 58, 'appointment', 'UPDATE', '2022-05-18 19:29:59'),
(150, 59, 'appointment', 'INSERT', '2022-05-18 19:34:07'),
(151, 59, 'appointment', 'UPDATE', '2022-05-18 19:34:15'),
(152, 59, 'medicalrecord', 'INSERT', '2022-05-18 19:34:15'),
(153, 59, 'prescription', 'INSERT', '2022-05-18 19:34:15'),
(154, 59, 'prescription', 'UPDATE', '2022-05-18 19:34:39'),
(155, 59, 'appointment', 'UPDATE', '2022-05-18 19:34:39'),
(156, 59, 'prescription', 'UPDATE', '2022-05-18 19:35:49'),
(157, 59, 'appointment', 'UPDATE', '2022-05-18 19:35:49'),
(158, 60, 'appointment', 'INSERT', '2022-05-19 21:47:55'),
(159, 60, 'appointment', 'DELETE', '2022-05-19 21:48:36'),
(160, 61, 'appointment', 'INSERT', '2022-05-19 21:48:46'),
(161, 61, 'appointment', 'UPDATE', '2022-05-19 21:49:53'),
(162, 61, 'medicalrecord', 'INSERT', '2022-05-19 21:49:53'),
(163, 61, 'prescription', 'INSERT', '2022-05-19 21:49:53'),
(164, 61, 'medicalrecord', 'UPDATE', '2022-05-19 21:50:37'),
(165, 61, 'appointment', 'UPDATE', '2022-05-19 21:50:37'),
(166, 61, 'prescription', 'UPDATE', '2022-05-19 21:51:45'),
(167, 61, 'appointment', 'UPDATE', '2022-05-19 21:51:45'),
(168, 61, 'medicalrecord', 'UPDATE', '2022-05-19 21:53:04'),
(169, 61, 'appointment', 'UPDATE', '2022-05-19 21:53:04'),
(170, 61, 'prescription', 'UPDATE', '2022-05-19 22:14:10'),
(171, 61, 'appointment', 'UPDATE', '2022-05-19 22:14:10');

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
(3, 'Augbidil', 'Amoxicilin 875mg + Axit clavulanic 125mg', 'điều trị các trường hợp nhiễm khuẩn nặng đường tiết niệu – sinh dục gây ra do các chủng E.coli, Klebsiella và Enterobacter (viêm bàng quang, viêm bể thận, viêm niệu đạo), bệnh nhiễm khuẩn da và mô mềm (áp xe, mụn nhọt, vết thương nhiễm khuẩn), áp xe khi mổ răng, viêm tủy xương.', 'Điều trị trong thời gian ngắn các trường hợp nhiễm khuẩn đường hô hấp trên nặng như viêm xoang, viêm amidan, viêm tai giữa đã điều trị bằng các loại thuốc kháng sinh thông thường nhưng không cải thiện.\r\nĐiều trị nhiễm khuẩn đường hô hấp dưới do các chủng vi khuẩn H. influenzae và Branhamella catarrhalis sản sinh beta – lactamase như viêm phế quản cấp và mạn, viêm phổi.\r\nThuốc Augbidil còn được sử dụng để điều trị nhiễm khuẩn đường tiết niệu – sinh dục nặng do các chủng vi khuẩn E.coli, Klebsiella và Enterobacter sản sinh như viêm bàng quang, viêm niệu đạo, viêm bể thận.\r\nĐiều trị nhiễm khuẩn da và mô mềm như mụn nhọt, áp xe, nhiễm khuẩn vết thương.\r\nĐiều trị viêm tủy xương, áp xe ổ răng.', 'dị ứng với  amoxicillin, axit clavulanic, penicillin, cephalosporin hoặc bất kỳ thành phần nào của thuốc', 'Việt Nam', 100, 'Viên'),
(4, 'Khám nội', '', '', '', '', '', 30500, 'Lần'),
(5, 'Khám tai mũi họng', '', '', '', '', '', 34500, 'Lần'),
(6, 'Ofmantine-Domesco 1g', '', '', '', '', '', 2373, 'Viên'),
(7, 'Methylsolon 16', '', '', '', '', '', 678, 'Viên'),
(8, 'Panactol 650', '', '', '', '', '', 115, 'Viên'),
(9, 'Hoạt huyết dưỡng não', '', '', '', '', '', 160, 'Viên'),
(10, 'Khám sản', '', '', '', '', '', 40000, 'Lần'),
(11, 'Khám da liễu', '', '', '', '', '', 34500, 'Lần'),
(12, 'Fefasdin', '', '', '', '', '', 719, 'Viên'),
(13, 'Vitamin C 500mg', '', '', '', '', '', 186, 'Viên'),
(14, 'Vedanal fort', '', '', '', '', '', 60000, 'Viên'),
(15, 'Ciloxan', 'Ciloxan', '', '', '', '', 69000, 'Lọ');

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
(71, 4, 1, 30500, '', 0, 0, 0),
(71, 7, 14, 9492, '', 1, 1, 0),
(71, 9, 21, 3360, '', 1, 1, 1),
(71, 13, 14, 2604, '', 1, 0, 1),
(72, 3, 14, 1400, '', 1, 1, 0),
(72, 4, 1, 30500, '', 0, 0, 0),
(72, 15, 14, 966000, '', 1, 1, 0),
(73, 4, 1, 30500, '', 0, 0, 0),
(73, 8, 14, 1610, '', 1, 1, 0),
(73, 12, 14, 10066, '', 1, 1, 0),
(73, 13, 21, 3906, '', 1, 1, 1),
(73, 15, 7, 483000, '', 1, 1, 0),
(74, 8, 14, 1610, '', 1, 1, 0),
(74, 15, 7, 483000, '', 1, 1, 0),
(75, 2, 14, 2058, '', 1, 1, 0),
(75, 8, 14, 1610, '', 1, 1, 0),
(75, 9, 21, 3360, '', 1, 1, 1),
(75, 15, 7, 483000, '', 1, 1, 0),
(76, 2, 42, 6174, '', 1, 1, 0),
(77, 2, 14, 2058, '', 1, 1, 0),
(77, 9, 14, 2240, '', 1, 1, 0),
(78, 6, 14, 33222, '', 1, 1, 0),
(78, 9, 21, 3360, 'Uống sau khi ăn', 1, 1, 1),
(79, 15, 10, 690000, 'Uống sau khi ăn', 0, 0, 0),
(80, 9, 12, 1920, '', 1, 1, 0),
(80, 15, 5, 345000, 'Uống sau khi ăn', 1, 1, 0);

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
  `VoteRate` double NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`ID_Patient`, `Name`, `DOB`, `Sex`, `Address`, `CMND`, `PhoneNumber`, `ID_BHYT`, `VoteRate`, `UserName`, `Password`) VALUES
(2, 'Trần Nhân Nghĩa', '2000-01-24', 'Nam', 'Số 40, đường số 3, KDC Thới Nhựt 2, phường An Khánh, quận Ninh Kiều, TP Cần Thơ', '1900', '0939635755', 'GD4929222590774', 4.4, 'trannhannghia.24012000@gmail.com', 'f03bbf95e3e6dd1725ea9aa87ea5b7f1'),
(8, 'Trần Thị Ánh Như', '1994-03-07', 'Nữ', 'Cần Thơ', '362881077', '0939017060', 'GD4929222590775', 4.5, 'nhu@gmail.com', 'b3d46ca8efda775e17d6134dc01db42f'),
(9, 'Trần Ngọc Mai', '1989-11-19', 'Nữ', 'Thảo Điền, Quận 2, TP Hồ Chí Minh', '361123456', '0906627513', 'GD4929222590774', 3, 'mai@gmail.com', '9bb173ba8935836ffaca2280491d8965'),
(10, 'Ngô Quý Nhân', '1992-03-17', 'Nam', 'Quận 2, TP Hồ Chí Minh', '1234567890', '0939635855', 'GD492200989', 5, 'nhan@gmail.com', '1cd57a0481e4eb0ae544d994641abc54');

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `ID_PaymentMethod` int(11) NOT NULL,
  `Title_PaymentMethod` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentmethod`
--

INSERT INTO `paymentmethod` (`ID_PaymentMethod`, `Title_PaymentMethod`) VALUES
(1, 'Trả tiền mặt'),
(2, 'VNPay'),
(3, 'Momo'),
(4, 'ZaloPay');

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
(71, 44, 45956, 45956, 0, '0000-00-00', 'Đã thanh toán'),
(72, 45, 997900, 0, 997900, '0000-00-00', 'Đã thanh toán'),
(73, 46, 529082, 0, 529082, '2022-03-24', 'Đã thanh toán'),
(74, 47, 484610, 387688, 96922, '2022-04-24', 'Đã thanh toán'),
(75, 48, 490028, 392022, 98006, '2022-05-17', 'Đã thanh toán'),
(76, 49, 6174, 6174, 0, '0000-00-00', 'Đã thanh toán'),
(77, 50, 4298, 4298, 0, '2022-05-02', 'Đã thanh toán'),
(78, 58, 36582, 36582, 0, '2022-05-25', 'Đã thanh toán'),
(79, 59, 690000, 552000, 138000, '0000-00-00', 'Đã thanh toán'),
(80, 61, 346920, 277536, 69384, '2022-05-26', 'Đã thanh toán');

--
-- Triggers `presciption`
--
DELIMITER $$
CREATE TRIGGER `changeInfo_DELETE_prescription` AFTER DELETE ON `presciption` FOR EACH ROW INSERT INTO `medicalrecord_log`(`ID_Appointment`, `AtTable`, `Operation`, `UpdateAt`) VALUES (OLD.ID_Appointment,'prescription','DELETE',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `changeInfo_INSERT_prescription` AFTER INSERT ON `presciption` FOR EACH ROW INSERT INTO `medicalrecord_log`(`ID_Appointment`, `AtTable`, `Operation`, `UpdateAt`) VALUES (NEW.ID_Appointment,'prescription','INSERT',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `changeInfo_UPDATE_prescription` AFTER UPDATE ON `presciption` FOR EACH ROW INSERT INTO `medicalrecord_log`(`ID_Appointment`, `AtTable`, `Operation`, `UpdateAt`) VALUES (NEW.ID_Appointment,'prescription','UPDATE',NOW())
$$
DELIMITER ;

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
(41, 'Phòng 41', 4),
(42, 'Phòng 42', 4),
(51, 'Phòng 51', 5),
(52, 'Phòng 52', 5),
(61, 'Phòng 61', 6),
(62, 'Phòng 62', 6),
(71, 'Phòng 71', 7),
(72, 'Phòng 72', 7),
(81, 'Phòng 81', 8),
(82, 'Phòng 82', 8),
(91, 'Phòng 91', 9),
(92, 'Phòng 92', 9),
(101, 'Phòng 101', 10),
(102, 'Phòng 102', 10);

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
  `t_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_schedule` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`ID_schedule`, `title`, `Session`, `start`, `end`, `ID_Staff`, `ID_Room`, `t_stamp`, `status_schedule`) VALUES
(230, 'Khám ngoại', 'Sáng', '2022-01-17 07:30:00', '2022-01-17 08:00:00', 7, 51, '2022-01-17 00:22:59', ''),
(231, 'Khám ngoại', 'Sáng', '2022-01-17 08:00:00', '2022-01-17 08:30:00', 7, 51, '2022-01-17 00:22:59', ''),
(232, 'Khám ngoại', 'Sáng', '2022-01-17 08:30:00', '2022-01-17 09:00:00', 7, 51, '2022-01-17 00:22:59', ''),
(233, 'Khám ngoại', 'Sáng', '2022-01-17 09:00:00', '2022-01-17 09:30:00', 7, 51, '2022-01-17 00:22:59', ''),
(234, 'Khám ngoại', 'Sáng', '2022-01-17 09:30:00', '2022-01-17 10:00:00', 7, 51, '2022-01-17 00:22:59', ''),
(235, 'Khám ngoại', 'Sáng', '2022-01-17 10:00:00', '2022-01-17 10:30:00', 7, 51, '2022-01-17 00:22:59', ''),
(236, 'Khám ngoại', 'Sáng', '2022-01-17 10:30:00', '2022-01-17 11:00:00', 7, 51, '2022-01-17 00:22:59', ''),
(237, 'Khám ngoại', 'Sáng', '2022-01-17 11:00:00', '2022-01-17 11:30:00', 7, 51, '2022-01-17 00:22:59', ''),
(238, 'Khám ngoại', 'Ngoài giờ', '2022-02-18 18:30:00', '2022-02-18 21:30:00', 7, 52, '2022-02-17 00:30:02', ''),
(239, 'Khám ngoại', 'Ngoài giờ', '2022-02-18 19:00:00', '2022-02-18 22:00:00', 7, 52, '2022-02-17 00:30:02', ''),
(240, 'Khám ngoại', 'Ngoài giờ', '2022-02-18 19:30:00', '2022-02-18 22:30:00', 7, 52, '2022-02-17 00:30:02', ''),
(241, 'Khám ngoại', 'Ngoài giờ', '2022-02-18 20:00:00', '2022-02-18 23:00:00', 7, 52, '2022-02-17 00:30:02', ''),
(242, 'Khám ngoại', 'Ngoài giờ', '2022-02-18 20:30:00', '2022-02-18 23:30:00', 7, 52, '2022-02-17 00:30:02', ''),
(243, 'Khám ngoại', 'Ngoài giờ', '2022-02-18 21:00:00', '2022-02-19 00:00:00', 7, 52, '2022-02-17 00:30:02', ''),
(244, 'Khám ngoại', 'Ngoài giờ', '2022-03-20 18:30:00', '2022-03-20 21:30:00', 6, 11, '2022-03-17 00:36:14', ''),
(245, 'Khám ngoại', 'Ngoài giờ', '2022-03-20 19:00:00', '2022-03-20 22:00:00', 6, 11, '2022-03-17 00:36:14', ''),
(246, 'Khám ngoại', 'Ngoài giờ', '2022-03-20 19:30:00', '2022-03-20 22:30:00', 6, 11, '2022-03-17 00:36:14', ''),
(247, 'Khám ngoại', 'Ngoài giờ', '2022-03-20 20:00:00', '2022-03-20 23:00:00', 6, 11, '2022-03-17 00:36:14', ''),
(248, 'Khám ngoại', 'Ngoài giờ', '2022-03-20 20:30:00', '2022-03-20 23:30:00', 6, 11, '2022-03-17 00:36:14', ''),
(249, 'Khám ngoại', 'Ngoài giờ', '2022-03-20 21:00:00', '2022-03-21 00:00:00', 6, 11, '2022-03-17 00:36:14', ''),
(250, 'Khám ngoại', 'Chiều', '2022-04-29 13:00:00', '2022-04-29 17:00:00', 6, 12, '2022-04-17 00:48:54', ''),
(251, 'Khám ngoại', 'Chiều', '2022-04-29 13:30:00', '2022-04-29 17:30:00', 6, 12, '2022-04-17 00:48:54', ''),
(252, 'Khám ngoại', 'Chiều', '2022-04-29 14:00:00', '2022-04-29 18:00:00', 6, 12, '2022-04-17 00:48:54', ''),
(253, 'Khám ngoại', 'Chiều', '2022-04-29 14:30:00', '2022-04-29 18:30:00', 6, 12, '2022-04-17 00:48:54', ''),
(254, 'Khám ngoại', 'Chiều', '2022-04-29 15:00:00', '2022-04-29 19:00:00', 6, 12, '2022-04-17 00:48:54', ''),
(255, 'Khám ngoại', 'Chiều', '2022-04-29 15:30:00', '2022-04-29 19:30:00', 6, 12, '2022-04-17 00:48:54', ''),
(256, 'Khám ngoại', 'Chiều', '2022-04-29 16:00:00', '2022-04-29 20:00:00', 6, 12, '2022-04-17 00:48:54', ''),
(257, 'Khám ngoại', 'Chiều', '2022-04-29 16:30:00', '2022-04-29 20:30:00', 6, 12, '2022-04-17 00:48:54', ''),
(258, 'Khám ngoại', 'Chiều', '2022-05-10 13:00:00', '2022-05-10 17:00:00', 4, 71, '2022-05-10 00:54:49', ''),
(259, 'Khám ngoại', 'Chiều', '2022-05-10 13:30:00', '2022-05-10 17:30:00', 4, 71, '2022-05-10 00:54:49', ''),
(260, 'Khám ngoại', 'Chiều', '2022-05-10 14:00:00', '2022-05-10 18:00:00', 4, 71, '2022-05-10 00:54:49', ''),
(261, 'Khám ngoại', 'Chiều', '2022-05-10 14:30:00', '2022-05-10 18:30:00', 4, 71, '2022-05-10 00:54:49', ''),
(262, 'Khám ngoại', 'Chiều', '2022-05-10 15:00:00', '2022-05-10 19:00:00', 4, 71, '2022-05-10 00:54:49', ''),
(263, 'Khám ngoại', 'Chiều', '2022-05-10 15:30:00', '2022-05-10 19:30:00', 4, 71, '2022-05-10 00:54:49', ''),
(264, 'Khám ngoại', 'Chiều', '2022-05-10 16:00:00', '2022-05-10 20:00:00', 4, 71, '2022-05-10 00:54:49', ''),
(265, 'Khám ngoại', 'Chiều', '2022-05-10 16:30:00', '2022-05-10 20:30:00', 4, 71, '2022-05-10 00:54:49', ''),
(266, 'Khám ngoại', 'Ngoài giờ', '2022-02-27 18:30:00', '2022-02-27 21:30:00', 4, 72, '2022-02-27 01:13:08', ''),
(267, 'Khám ngoại', 'Ngoài giờ', '2022-02-27 19:00:00', '2022-02-27 22:00:00', 4, 72, '2022-02-27 01:13:08', ''),
(268, 'Khám ngoại', 'Ngoài giờ', '2022-02-27 19:30:00', '2022-02-27 22:30:00', 4, 72, '2022-02-27 01:13:08', ''),
(269, 'Khám ngoại', 'Ngoài giờ', '2022-02-27 20:00:00', '2022-02-27 23:00:00', 4, 72, '2022-02-27 01:13:08', ''),
(270, 'Khám ngoại', 'Ngoài giờ', '2022-02-27 20:30:00', '2022-02-27 23:30:00', 4, 72, '2022-02-27 01:13:08', ''),
(271, 'Khám ngoại', 'Ngoài giờ', '2022-02-27 21:00:00', '2022-02-27 00:00:00', 4, 72, '2022-02-27 01:13:08', ''),
(272, 'Khám ngoại', 'Ngoài giờ', '2022-03-26 18:30:00', '2022-03-26 21:30:00', 4, 71, '2022-03-17 01:34:53', ''),
(273, 'Khám ngoại', 'Ngoài giờ', '2022-03-26 19:00:00', '2022-03-26 22:00:00', 4, 71, '2022-03-17 01:34:53', ''),
(274, 'Khám ngoại', 'Ngoài giờ', '2022-03-26 19:30:00', '2022-03-26 22:30:00', 4, 71, '2022-03-17 01:34:53', ''),
(275, 'Khám ngoại', 'Ngoài giờ', '2022-03-26 20:00:00', '2022-03-26 23:00:00', 4, 71, '2022-03-17 01:34:53', ''),
(276, 'Khám ngoại', 'Ngoài giờ', '2022-03-26 20:30:00', '2022-03-26 23:30:00', 4, 71, '2022-03-17 01:34:53', ''),
(277, 'Khám ngoại', 'Ngoài giờ', '2022-03-26 21:00:00', '2022-03-27 00:00:00', 4, 71, '2022-03-17 01:34:53', ''),
(278, 'Khám ngoại', 'Sáng', '2022-05-17 07:30:00', '2022-05-17 08:00:00', 4, 71, '2022-05-17 02:17:52', ''),
(279, 'Khám ngoại', 'Sáng', '2022-05-17 08:00:00', '2022-05-17 08:30:00', 4, 71, '2022-05-17 02:17:52', ''),
(280, 'Khám ngoại', 'Sáng', '2022-05-17 08:30:00', '2022-05-17 09:00:00', 4, 71, '2022-05-17 02:17:52', ''),
(281, 'Khám ngoại', 'Sáng', '2022-05-17 09:00:00', '2022-05-17 09:30:00', 4, 71, '2022-05-17 02:17:52', ''),
(282, 'Khám ngoại', 'Sáng', '2022-05-17 09:30:00', '2022-05-17 10:00:00', 4, 71, '2022-05-17 02:17:52', ''),
(283, 'Khám ngoại', 'Sáng', '2022-05-17 10:00:00', '2022-05-17 10:30:00', 4, 71, '2022-05-17 02:17:52', ''),
(284, 'Khám ngoại', 'Sáng', '2022-05-17 10:30:00', '2022-05-17 11:00:00', 4, 71, '2022-05-17 02:17:52', ''),
(285, 'Khám ngoại', 'Sáng', '2022-05-17 11:00:00', '2022-05-17 11:30:00', 4, 71, '2022-05-17 02:17:52', ''),
(286, 'Khám ngoại', 'Ngoài giờ', '2022-05-17 18:30:00', '2022-05-17 21:30:00', 4, 72, '2022-05-17 04:18:37', ''),
(287, 'Khám ngoại', 'Ngoài giờ', '2022-05-17 19:00:00', '2022-05-17 22:00:00', 4, 72, '2022-05-17 04:26:56', ''),
(288, 'Khám ngoại', 'Ngoài giờ', '2022-05-17 19:30:00', '2022-05-17 22:30:00', 4, 72, '2022-05-17 04:18:37', ''),
(289, 'Khám ngoại', 'Ngoài giờ', '2022-05-17 20:00:00', '2022-05-17 23:00:00', 4, 72, '2022-05-17 04:18:37', ''),
(290, 'Khám ngoại', 'Ngoài giờ', '2022-05-17 20:30:00', '2022-05-17 23:30:00', 4, 72, '2022-05-17 04:18:37', ''),
(291, 'Khám ngoại', 'Ngoài giờ', '2022-05-17 21:00:00', '2022-05-18 00:00:00', 4, 72, '2022-05-17 04:18:37', ''),
(292, 'Khám ngoại', 'Chiều', '2022-05-17 13:00:00', '2022-05-17 17:00:00', 4, 71, '2022-05-17 04:29:55', ''),
(293, 'Khám ngoại', 'Chiều', '2022-05-17 13:30:00', '2022-05-17 17:30:00', 4, 71, '2022-05-17 04:29:55', ''),
(294, 'Khám ngoại', 'Chiều', '2022-05-17 14:00:00', '2022-05-17 18:00:00', 4, 71, '2022-05-17 04:29:55', ''),
(295, 'Khám ngoại', 'Chiều', '2022-05-17 14:30:00', '2022-05-17 18:30:00', 4, 71, '2022-05-17 04:29:55', ''),
(296, 'Khám ngoại', 'Chiều', '2022-05-17 15:00:00', '2022-05-17 19:00:00', 4, 71, '2022-05-17 04:29:55', ''),
(297, 'Khám ngoại', 'Chiều', '2022-05-17 15:30:00', '2022-05-17 19:30:00', 4, 71, '2022-05-17 04:29:55', ''),
(298, 'Khám ngoại', 'Chiều', '2022-05-17 16:00:00', '2022-05-17 20:00:00', 4, 71, '2022-05-17 04:29:55', ''),
(299, 'Khám ngoại', 'Chiều', '2022-05-17 16:30:00', '2022-05-17 20:30:00', 4, 71, '2022-05-17 04:29:55', ''),
(300, 'Khám ngoại', 'Sáng', '2022-05-18 07:30:00', '2022-05-18 08:00:00', 4, 71, '2022-05-17 04:30:03', ''),
(301, 'Khám ngoại', 'Sáng', '2022-05-18 08:00:00', '2022-05-18 08:30:00', 4, 71, '2022-05-17 04:30:03', ''),
(302, 'Khám ngoại', 'Sáng', '2022-05-18 08:30:00', '2022-05-18 09:00:00', 4, 71, '2022-05-17 04:30:03', ''),
(303, 'Khám ngoại', 'Sáng', '2022-05-18 09:00:00', '2022-05-18 09:30:00', 4, 71, '2022-05-17 04:30:03', ''),
(304, 'Khám ngoại', 'Sáng', '2022-05-18 09:30:00', '2022-05-18 10:00:00', 4, 71, '2022-05-17 04:30:03', ''),
(305, 'Khám ngoại', 'Sáng', '2022-05-18 10:00:00', '2022-05-18 10:30:00', 4, 71, '2022-05-17 04:30:03', ''),
(306, 'Khám ngoại', 'Sáng', '2022-05-18 10:30:00', '2022-05-18 11:00:00', 4, 71, '2022-05-18 03:23:17', ''),
(307, 'Khám ngoại', 'Sáng', '2022-05-18 11:00:00', '2022-05-18 11:30:00', 4, 71, '2022-05-17 04:30:03', ''),
(308, 'Khám ngoại', 'Ngoài giờ', '2022-05-19 18:30:00', '2022-05-19 21:30:00', 4, 72, '2022-05-17 04:30:12', ''),
(309, 'Khám ngoại', 'Ngoài giờ', '2022-05-19 19:00:00', '2022-05-19 22:00:00', 4, 72, '2022-05-17 04:30:12', ''),
(310, 'Khám ngoại', 'Ngoài giờ', '2022-05-19 19:30:00', '2022-05-19 22:30:00', 4, 72, '2022-05-17 04:30:12', ''),
(311, 'Khám ngoại', 'Ngoài giờ', '2022-05-19 20:00:00', '2022-05-19 23:00:00', 4, 72, '2022-05-17 04:30:12', ''),
(312, 'Khám ngoại', 'Ngoài giờ', '2022-05-19 20:30:00', '2022-05-19 23:30:00', 4, 72, '2022-05-17 04:30:12', ''),
(313, 'Khám ngoại', 'Ngoài giờ', '2022-05-19 21:00:00', '2022-05-20 00:00:00', 4, 72, '2022-05-17 04:30:12', ''),
(314, 'Khám ngoại', 'Chiều', '2022-05-18 13:00:00', '2022-05-18 17:00:00', 4, 72, '2022-05-18 03:18:50', ''),
(315, 'Khám ngoại', 'Chiều', '2022-05-18 13:30:00', '2022-05-18 17:30:00', 4, 72, '2022-05-18 03:18:50', ''),
(316, 'Khám ngoại', 'Chiều', '2022-05-18 14:00:00', '2022-05-18 18:00:00', 4, 72, '2022-05-18 03:18:50', ''),
(317, 'Khám ngoại', 'Chiều', '2022-05-18 14:30:00', '2022-05-18 18:30:00', 4, 72, '2022-05-18 03:18:50', ''),
(318, 'Khám ngoại', 'Chiều', '2022-05-18 15:00:00', '2022-05-18 19:00:00', 4, 72, '2022-05-18 03:18:50', ''),
(319, 'Khám ngoại', 'Chiều', '2022-05-18 15:30:00', '2022-05-18 19:30:00', 4, 72, '2022-05-18 03:18:50', ''),
(320, 'Khám ngoại', 'Chiều', '2022-05-18 16:00:00', '2022-05-18 20:00:00', 4, 72, '2022-05-18 03:18:50', ''),
(321, 'Khám ngoại', 'Chiều', '2022-05-18 16:30:00', '2022-05-18 20:30:00', 4, 72, '2022-05-18 03:18:50', ''),
(322, 'Khám ngoại', 'Ngoài giờ', '2022-05-18 18:30:00', '2022-05-18 21:30:00', 4, 72, '2022-05-18 03:19:02', ''),
(323, 'Khám ngoại', 'Ngoài giờ', '2022-05-18 19:00:00', '2022-05-18 22:00:00', 4, 72, '2022-05-18 03:19:02', ''),
(324, 'Khám ngoại', 'Ngoài giờ', '2022-05-18 19:30:00', '2022-05-18 22:30:00', 4, 72, '2022-05-18 03:45:45', ''),
(325, 'Khám ngoại', 'Ngoài giờ', '2022-05-18 20:00:00', '2022-05-18 23:00:00', 4, 72, '2022-05-18 03:19:02', ''),
(326, 'Khám ngoại', 'Ngoài giờ', '2022-05-18 20:30:00', '2022-05-18 23:30:00', 4, 72, '2022-05-18 03:19:02', ''),
(327, 'Khám ngoại', 'Ngoài giờ', '2022-05-18 21:00:00', '2022-05-19 00:00:00', 4, 72, '2022-05-18 03:19:02', ''),
(328, 'khám ngoại', 'Sáng', '2022-05-21 07:30:00', '2022-05-21 08:00:00', 4, 71, '2022-05-18 11:21:52', ''),
(329, 'khám ngoại', 'Sáng', '2022-05-21 08:00:00', '2022-05-21 08:30:00', 4, 71, '2022-05-18 11:21:52', ''),
(330, 'khám ngoại', 'Sáng', '2022-05-21 08:30:00', '2022-05-21 09:00:00', 4, 71, '2022-05-18 11:21:52', ''),
(331, 'khám ngoại', 'Sáng', '2022-05-21 09:00:00', '2022-05-21 09:30:00', 4, 71, '2022-05-18 12:20:46', ''),
(332, 'khám ngoại', 'Sáng', '2022-05-21 09:30:00', '2022-05-21 10:00:00', 4, 71, '2022-05-18 11:21:52', ''),
(333, 'khám ngoại', 'Sáng', '2022-05-21 10:00:00', '2022-05-21 10:30:00', 4, 71, '2022-05-18 12:21:10', 'Có lịch'),
(334, 'khám ngoại', 'Sáng', '2022-05-21 10:30:00', '2022-05-21 11:00:00', 4, 71, '2022-05-18 11:21:52', ''),
(335, 'khám ngoại', 'Sáng', '2022-05-21 11:00:00', '2022-05-21 11:30:00', 4, 71, '2022-05-18 11:21:52', ''),
(336, 'Khám ngoại', 'Ngoài giờ', '2022-05-21 18:30:00', '2022-05-21 21:30:00', 4, 71, '2022-05-18 11:28:58', ''),
(337, 'Khám ngoại', 'Ngoài giờ', '2022-05-21 19:00:00', '2022-05-21 22:00:00', 4, 71, '2022-05-18 11:28:58', ''),
(338, 'Khám ngoại', 'Ngoài giờ', '2022-05-21 19:30:00', '2022-05-21 22:30:00', 4, 71, '2022-05-18 11:28:58', ''),
(339, 'Khám ngoại', 'Ngoài giờ', '2022-05-21 20:00:00', '2022-05-21 23:00:00', 4, 71, '2022-05-18 11:28:58', ''),
(340, 'Khám ngoại', 'Ngoài giờ', '2022-05-21 20:30:00', '2022-05-21 23:30:00', 4, 71, '2022-05-18 11:28:58', ''),
(341, 'Khám ngoại', 'Ngoài giờ', '2022-05-21 21:00:00', '2022-05-22 00:00:00', 4, 71, '2022-05-18 11:28:58', ''),
(348, 'Khám ngoại', 'Chiều', '2022-05-21 13:00:00', '2022-05-21 17:00:00', 4, 71, '2022-05-18 11:38:56', ''),
(349, 'Khám ngoại', 'Chiều', '2022-05-21 13:30:00', '2022-05-21 17:30:00', 4, 71, '2022-05-18 11:38:56', ''),
(350, 'Khám ngoại', 'Chiều', '2022-05-21 14:00:00', '2022-05-21 18:00:00', 4, 71, '2022-05-18 11:38:56', ''),
(351, 'Khám ngoại', 'Chiều', '2022-05-21 14:30:00', '2022-05-21 18:30:00', 4, 71, '2022-05-18 11:38:56', ''),
(352, 'Khám ngoại', 'Chiều', '2022-05-21 15:00:00', '2022-05-21 19:00:00', 4, 71, '2022-05-18 11:38:56', ''),
(353, 'Khám ngoại', 'Chiều', '2022-05-21 15:30:00', '2022-05-21 19:30:00', 4, 71, '2022-05-18 11:38:56', ''),
(354, 'Khám ngoại', 'Chiều', '2022-05-21 16:00:00', '2022-05-21 20:00:00', 4, 71, '2022-05-18 11:38:56', ''),
(355, 'Khám ngoại', 'Chiều', '2022-05-21 16:30:00', '2022-05-21 20:30:00', 4, 71, '2022-05-18 11:38:56', ''),
(356, 'Khám ngoại', 'Sáng', '2022-05-20 07:30:00', '2022-05-20 08:00:00', 4, 71, '2022-05-18 12:32:05', ''),
(357, 'Khám ngoại', 'Sáng', '2022-05-20 08:00:00', '2022-05-20 08:30:00', 4, 71, '2022-05-18 12:32:05', ''),
(358, 'Khám ngoại', 'Sáng', '2022-05-20 08:30:00', '2022-05-20 09:00:00', 4, 71, '2022-05-18 12:34:07', 'Có lịch'),
(359, 'Khám ngoại', 'Sáng', '2022-05-20 09:00:00', '2022-05-20 09:30:00', 4, 71, '2022-05-18 12:32:05', ''),
(360, 'Khám ngoại', 'Sáng', '2022-05-20 09:30:00', '2022-05-20 10:00:00', 4, 71, '2022-05-18 12:32:05', ''),
(361, 'Khám ngoại', 'Sáng', '2022-05-20 10:00:00', '2022-05-20 10:30:00', 4, 71, '2022-05-18 12:32:05', ''),
(362, 'Khám ngoại', 'Sáng', '2022-05-20 10:30:00', '2022-05-20 11:00:00', 4, 71, '2022-05-18 12:32:05', ''),
(363, 'Khám ngoại', 'Sáng', '2022-05-20 11:00:00', '2022-05-20 11:30:00', 4, 71, '2022-05-18 12:32:05', ''),
(364, 'Khám ngoại', 'Sáng', '2022-05-22 07:30:00', '2022-05-22 08:00:00', 4, 71, '2022-05-19 13:02:57', ''),
(365, 'Khám ngoại', 'Sáng', '2022-05-22 08:00:00', '2022-05-22 08:30:00', 4, 71, '2022-05-19 13:02:57', ''),
(366, 'Khám ngoại', 'Sáng', '2022-05-22 08:30:00', '2022-05-22 09:00:00', 4, 71, '2022-05-19 13:02:57', ''),
(367, 'Khám ngoại', 'Sáng', '2022-05-22 09:00:00', '2022-05-22 09:30:00', 4, 71, '2022-05-19 13:02:57', ''),
(368, 'Khám ngoại', 'Sáng', '2022-05-22 09:30:00', '2022-05-22 10:00:00', 4, 71, '2022-05-19 14:48:36', ''),
(369, 'Khám ngoại', 'Sáng', '2022-05-22 10:00:00', '2022-05-22 10:30:00', 4, 71, '2022-05-19 14:48:46', 'Có lịch'),
(370, 'Khám ngoại', 'Sáng', '2022-05-22 10:30:00', '2022-05-22 11:00:00', 4, 71, '2022-05-19 13:02:57', ''),
(371, 'Khám ngoại', 'Sáng', '2022-05-22 11:00:00', '2022-05-22 11:30:00', 4, 71, '2022-05-19 13:02:57', ''),
(372, 'Khám ngoại', 'Chiều', '2022-05-22 13:00:00', '2022-05-22 13:30:00', 4, 71, '2022-05-19 13:05:33', ''),
(373, 'Khám ngoại', 'Chiều', '2022-05-22 13:30:00', '2022-05-22 14:00:00', 4, 71, '2022-05-19 13:05:33', ''),
(374, 'Khám ngoại', 'Chiều', '2022-05-22 14:00:00', '2022-05-22 14:30:00', 4, 71, '2022-05-19 13:05:33', ''),
(375, 'Khám ngoại', 'Chiều', '2022-05-22 14:30:00', '2022-05-22 15:00:00', 4, 71, '2022-05-19 13:05:33', ''),
(376, 'Khám ngoại', 'Chiều', '2022-05-22 15:00:00', '2022-05-22 15:30:00', 4, 71, '2022-05-19 13:05:33', ''),
(377, 'Khám ngoại', 'Chiều', '2022-05-22 15:30:00', '2022-05-22 16:00:00', 4, 71, '2022-05-19 13:05:33', ''),
(378, 'Khám ngoại', 'Chiều', '2022-05-22 16:00:00', '2022-05-22 16:30:00', 4, 71, '2022-05-19 13:05:33', ''),
(379, 'Khám ngoại', 'Chiều', '2022-05-22 16:30:00', '2022-05-22 17:00:00', 4, 71, '2022-05-19 13:05:33', ''),
(380, 'Khám ngoại', 'Ngoài giờ', '2022-05-22 18:30:00', '2022-05-22 19:00:00', 4, 71, '2022-05-19 13:06:00', ''),
(381, 'Khám ngoại', 'Ngoài giờ', '2022-05-22 19:00:00', '2022-05-22 19:30:00', 4, 71, '2022-05-19 13:06:00', ''),
(382, 'Khám ngoại', 'Ngoài giờ', '2022-05-22 19:30:00', '2022-05-22 20:00:00', 4, 71, '2022-05-19 13:06:00', ''),
(383, 'Khám ngoại', 'Ngoài giờ', '2022-05-22 20:00:00', '2022-05-22 20:30:00', 4, 71, '2022-05-19 13:06:00', ''),
(384, 'Khám ngoại', 'Ngoài giờ', '2022-05-22 20:30:00', '2022-05-22 21:00:00', 4, 71, '2022-05-19 13:06:00', ''),
(385, 'Khám ngoại', 'Ngoài giờ', '2022-05-22 21:00:00', '2022-05-22 21:30:00', 4, 71, '2022-05-19 13:06:00', ''),
(386, 'Khám ngoại', 'Ngoài giờ', '2022-05-23 18:30:00', '2022-05-23 19:00:00', 4, 71, '2022-05-19 13:08:23', ''),
(387, 'Khám ngoại', 'Ngoài giờ', '2022-05-23 19:00:00', '2022-05-23 19:30:00', 4, 71, '2022-05-19 13:08:23', ''),
(388, 'Khám ngoại', 'Ngoài giờ', '2022-05-23 19:30:00', '2022-05-23 20:00:00', 4, 71, '2022-05-19 13:08:23', ''),
(389, 'Khám ngoại', 'Ngoài giờ', '2022-05-23 20:00:00', '2022-05-23 20:30:00', 4, 71, '2022-05-19 13:08:23', ''),
(390, 'Khám ngoại', 'Ngoài giờ', '2022-05-23 20:30:00', '2022-05-23 21:00:00', 4, 71, '2022-05-19 13:08:23', ''),
(391, 'Khám ngoại', 'Ngoài giờ', '2022-05-23 21:00:00', '2022-05-23 21:30:00', 4, 71, '2022-05-19 13:08:23', '');

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
(4, 'Võ Thị Thái', '1982-08-04', 'Nữ', 'Nguyễn Đệ, Bình Thủy, Cần Thơ', '312328285', '0939017069', 'Bác sĩ', 7, '2010-07-10', 4.3333333333333, 'thai', '1aafcfcd9efdd2e7ac43e80ce77bba79'),
(6, 'Nguyễn Lê Thanh Cao', '1980-12-26', 'Nam', 'Nguyễn Đệ, Bình Thủy, Cần Thơ', '09220000123', '0989123456', 'Bác sĩ', 1, '2000-10-19', 3.5, 'cao', '18452d47d97eb0f306c59ae38087fcb0'),
(7, 'Lê Doãn Khánh', '2000-04-17', 'Nam', 'Bình Thủy, Cần Thơ', '092200000154', '01234567', 'Bác sĩ', 5, '2020-06-30', 4.5, 'ledoankhanh', 'bbee2e7c540fde597ad1a708bc30b51c'),
(8, 'Lê Minh Tuấn', '1984-04-11', 'Nam', 'Cần Thơ', '09220000555', '09897887665', 'Bác sĩ', 3, '2003-10-22', 0, 'tuan', 'd6b8cc42803ea100735c719f1d7f5e11'),
(9, 'Nguyễn Lê Thanh Bạch', '1970-12-04', 'Nam', 'An Khánh, Ninh Kiều, Cần Thơ', '09220003456', '09123456', 'Bác sĩ', 7, '2000-04-05', 0, 'bach', '8dc01b0de0431cb7eced92277c1f04c7');

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
-- Indexes for table `medicalrecord_log`
--
ALTER TABLE `medicalrecord_log`
  ADD PRIMARY KEY (`ID_Log`),
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
  ADD PRIMARY KEY (`ID_Prescription`,`ID_Medicine`),
  ADD KEY `medicinesfortreatment_ibfk_1` (`ID_Medicine`);

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
  MODIFY `ID_Appointment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `ID_Dept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `diagnose`
--
ALTER TABLE `diagnose`
  MODIFY `ID_Diagnose` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `ID_Disease` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `ID_Evaluation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `img_staff`
--
ALTER TABLE `img_staff`
  MODIFY `ID_ImgStaff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `medicalrecord`
--
ALTER TABLE `medicalrecord`
  MODIFY `ID_MedicalRecord` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT for table `medicalrecord_log`
--
ALTER TABLE `medicalrecord_log`
  MODIFY `ID_Log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `ID_Medicine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `ID_Patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `ID_PaymentMethod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `presciption`
--
ALTER TABLE `presciption`
  MODIFY `ID_Prescription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `ID_schedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=398;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `ID_Staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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

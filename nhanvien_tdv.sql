-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 03:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k22cntt3_tranduyvu`
--

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien_tdv`
--

CREATE TABLE `nhanvien_tdv` (
  `MANV_TDV` char(5) NOT NULL,
  `HOTEN_TDV` varchar(30) NOT NULL,
  `NGAYSINH_TDV` date NOT NULL,
  `GIOITINH_TDV` tinyint(1) NOT NULL,
  `EMAIL_TDV` varchar(50) NOT NULL,
  `TRANGTHAI_TDV` tinyint(1) NOT NULL,
  `MAPB_TDV` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nhanvien_tdv`
--

INSERT INTO `nhanvien_tdv` (`MANV_TDV`, `HOTEN_TDV`, `NGAYSINH_TDV`, `GIOITINH_TDV`, `EMAIL_TDV`, `TRANGTHAI_TDV`, `MAPB_TDV`) VALUES
('1', '1', '2023-10-04', 1, '11', 1, '1'),
('NV001', 'Tran Duy Vu', '2004-11-25', 1, 'duyvutran2004@gmail.com', 1, 'P0001'),
('NV003', '123', '2023-09-27', 1, 'vu@gmail.com', 1, 'P0001'),
('NV004', '123', '2023-09-27', 1, 'vu@gmail.com', 1, 'P0001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nhanvien_tdv`
--
ALTER TABLE `nhanvien_tdv`
  ADD PRIMARY KEY (`MANV_TDV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

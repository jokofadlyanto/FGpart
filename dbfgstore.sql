-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 05:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbfgstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbbarang`
--

CREATE TABLE `tbbarang` (
  `id_barang` int(15) NOT NULL,
  `part_number` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `standart_pack` varchar(15) NOT NULL,
  `alamat` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbbarang`
--

INSERT INTO `tbbarang` (`id_barang`, `part_number`, `nama`, `customer`, `standart_pack`, `alamat`) VALUES
(17, '90520028380080', '', 'IPI/YAMAHA', '100', 'A1 (KIRI)'),
(18, '90520020140080', '', 'IPI/YAMAHA', '40', 'A1 (TENGAH)'),
(19, '90520208230080', '', 'IPI/YAMAHA', '100', 'A1 (KANAN)'),
(20, '90520058320080', '', 'IPI/YAMAHA', '100', 'A2 (KIRI)'),
(21, '90520108530080', '', 'IPI/YAMAHA', '40', 'A2 (KANAN)'),
(22, '90520188000080', '', 'IPI/YAMAHA', '20', 'A3 (KIRI)'),
(23, '90520068080080', '', 'IPI/YAMAHA', '40', 'A3 (KANAN)'),
(24, '90520208130080', '', 'IPI/YAMAHA', '100', 'A4 (KIRI)'),
(25, '90520208190080', '', 'IPI/YAMAHA', '20', 'A4 (KANAN)'),
(26, '90520018040080', '', 'IPI/YAMAHA', '100', 'A5 (KIRI)'),
(27, '905200381300M0', '', 'IPI/YAMAHA', '40', 'A5 (KANAN)'),
(28, '90520028480080', '', 'IPI/YAMAHA', '40', 'A6 (KIRI)'),
(29, '90520038410080', '', 'IPI/YAMAHA', '40', 'A6 (KANAN)'),
(30, '90520068210080', '', 'IPI/YAMAHA', '40', 'A7 (KIRI)'),
(31, '90520040150080', '', 'IPI/YAMAHA', '40', 'A7 (KANAN)'),
(32, '90520028620080', '', 'IPI/YAMAHA', '100', 'A8 (KIRI)'),
(33, '90520028230080', '', 'IPI/YAMAHA', '100', 'A8 (KANAN)'),
(34, '90520208190080', '', 'IPI/YAMAHA', '80', 'A9 (KIRI)'),
(35, '905200280400M0', '', 'IPI/YAMAHA', '40', 'A9 (KANAN)'),
(36, '90520028500080', '', 'IPI/YAMAHA', '40', 'A10 (KIRI)'),
(37, '905200681700M0', '', 'IPI/YAMAHA', '40', 'A10 (KANAN)'),
(38, '90520108440080', '', 'IPI/YAMAHA', '40', 'A11 (KIRI)'),
(39, '90520078080080', '', 'IPI/YAMAHA', '40', 'A11 (KANAN)'),
(40, '905200281300M0', '', 'IPI/YAMAHA', '100', 'A12 (KIRI)'),
(41, '905200880300M0', '', 'IPI/YAMAHA', '40', 'A12 (TENGAH)'),
(42, '90520108260080', '', 'IPI/YAMAHA', '40', 'A12 (KANAN)'),
(43, '865E5316000080', '', 'IPI/YAMAHA', '10', 'B1 (KANAN)'),
(44, '2BUF61130000M0', '', 'IPI/YAMAHA', '100', 'B1 (TENGAH)'),
(47, 'B5DF1524100080', '', 'IPI/YAMAHA', '20', 'B1 (KIRI)'),
(48, 'B6HF1746000080', '', 'IPI/YAMAHA', '40', 'B2 (KANAN)'),
(49, '905201580300M0', '', 'IPI/YAMAHA', '40', 'B2 (KIRI)'),
(50, 'BS7F8415000080', '', 'IPI/YAMAHA', '40', 'B3 (KANAN)'),
(51, '90520108500080', '', 'IPI/YAMAHA', '40', 'B3 (TENGAH)'),
(52, '90520030200080', '', 'IPI/YAMAHA', '40', 'B3 (KIRI)'),
(53, '90520308050080', '', 'IPI/YAMAHA', '40', 'B4 (KANAN)'),
(54, '90520048120080', '', 'IPI/YAMAHA', '40', 'B4 (KIRI)'),
(55, '1DYF83710000MO', '', 'IPI/YAMAHA', '50', 'B5 (KANAN)'),
(56, '90520208310080', '', 'IPI/YAMAHA', '40', 'B5 (KIRI)'),
(57, '905200280600M0', '', 'IPI/YAMAHA', '100', 'B6 (KANAN)'),
(58, 'BKAF4723000080', '', 'IPI/YAMAHA', '20', 'B6 (KIRI)'),
(59, '90520208000080', '', 'IPI/YAMAHA', '40', 'B7 (KANAN)'),
(60, '90520080070080', '', 'IPI/YAMAHA', '100', 'B7 (KIRI)'),
(61, '1DYF836U0000MO', '', 'IPI/YAMAHA', '50', 'B8 (KANAN)'),
(62, '1UBF61130000M0', '', 'IPI/YAMAHA', '100', 'B8 (KIRI)'),
(63, 'B5DF1524100080', '', 'IPI/YAMAHA', '40', 'B9 (KANAN)'),
(64, '90520068100080', '', 'IPI/YAMAHA', '40', 'B9 (KIRI)'),
(65, '90520108560080', '', 'IPI/YAMAHA', '40', 'B10'),
(66, '90520048120080', '', 'IPI/YAMAHA', '100', 'B11 (KANAN)'),
(67, '905202081100M0', '', 'IPI/YAMAHA', '100', 'B11 (KIRI)'),
(68, '90520028490080', '', 'IPI/YAMAHA', '40', 'B12 (KANAN)'),
(69, '905200480600M0', '', 'IPI/YAMAHA', '40', 'B12 (KIRI)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbbarang`
--
ALTER TABLE `tbbarang`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbbarang`
--
ALTER TABLE `tbbarang`
  MODIFY `id_barang` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2021 at 12:10 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cucimobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `idAdmin` varchar(10) NOT NULL,
  `namaLengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggalBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`idAdmin`, `namaLengkap`, `email`, `password`, `status`, `tanggalBuat`, `token`) VALUES
('ADM01', 'Rian Wahyu Sahadah', 'rianwahyu26@gmail.com', 'b7c16b1afb8f46023bcc249b597090b0', 1, '2021-03-12 19:52:50', '0');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `idBanner` int(11) NOT NULL,
  `namaBanner` varchar(100) NOT NULL,
  `file` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`idBanner`, `namaBanner`, `file`, `status`) VALUES
(4, 'testing', 'ed02f7074cf1140f0ff35815c3f68031.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenisharga`
--

CREATE TABLE `jenisharga` (
  `idHarga` int(11) NOT NULL,
  `idJenis` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenisharga`
--

INSERT INTO `jenisharga` (`idHarga`, `idJenis`, `keterangan`, `harga`) VALUES
(1, 1, 'Air Dari customer', 45000),
(2, 1, 'Include Air', 50000),
(3, 2, 'Air dari customer', 50000),
(4, 2, 'Include Air', 55000);

-- --------------------------------------------------------

--
-- Table structure for table `jeniskendaraan`
--

CREATE TABLE `jeniskendaraan` (
  `idJenis` int(11) NOT NULL,
  `idKategori` int(11) NOT NULL,
  `namaJenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jeniskendaraan`
--

INSERT INTO `jeniskendaraan` (`idJenis`, `idKategori`, `namaJenis`) VALUES
(1, 1, 'City Car'),
(2, 1, 'Car Lol');

-- --------------------------------------------------------

--
-- Table structure for table `kategorikendaraan`
--

CREATE TABLE `kategorikendaraan` (
  `idKategori` int(11) NOT NULL,
  `namaKategori` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorikendaraan`
--

INSERT INTO `kategorikendaraan` (`idKategori`, `namaKategori`, `foto`) VALUES
(1, 'Mobil', ''),
(2, 'Motor', '');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `idMember` varchar(10) NOT NULL,
  `namaLengkap` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `noHp` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` text NOT NULL,
  `tanggalRegistrasi` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`idBanner`);

--
-- Indexes for table `jenisharga`
--
ALTER TABLE `jenisharga`
  ADD PRIMARY KEY (`idHarga`);

--
-- Indexes for table `jeniskendaraan`
--
ALTER TABLE `jeniskendaraan`
  ADD PRIMARY KEY (`idJenis`);

--
-- Indexes for table `kategorikendaraan`
--
ALTER TABLE `kategorikendaraan`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idMember`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `idBanner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenisharga`
--
ALTER TABLE `jenisharga`
  MODIFY `idHarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jeniskendaraan`
--
ALTER TABLE `jeniskendaraan`
  MODIFY `idJenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategorikendaraan`
--
ALTER TABLE `kategorikendaraan`
  MODIFY `idKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

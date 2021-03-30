-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2021 at 11:43 AM
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
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `orderID` varchar(10) NOT NULL,
  `userID` varchar(50) NOT NULL,
  `tipeKendaraan` varchar(200) NOT NULL,
  `idKategori` int(11) NOT NULL,
  `idJenis` int(11) NOT NULL,
  `idHarga` int(11) NOT NULL,
  `alamatOrder` varchar(200) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `tanggalOrder` date NOT NULL,
  `waktuOrder` time NOT NULL,
  `statusOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `idMember` varchar(50) NOT NULL,
  `namaLengkap` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL DEFAULT ' ',
  `noHp` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` text NOT NULL DEFAULT ' ',
  `tanggalRegistrasi` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`idMember`, `namaLengkap`, `alamat`, `noHp`, `email`, `password`, `token`, `tanggalRegistrasi`) VALUES
('XEZXSSv2r0bbCu1FIrdOvrFoMCA3', 'Rian Wahyu', ' ', '', 'riansahadah@gmail.com', '256fa07ec1bff2c9ce5e104ad65cb36a', ' ', '2021-03-30 09:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idPembayaran` int(11) NOT NULL,
  `namaPembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`idPembayaran`, `namaPembayaran`) VALUES
(1, 'COD');

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
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`orderID`);

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
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idPembayaran`);

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

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idPembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Apr 2021 pada 02.31
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.3.23

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
-- Struktur dari tabel `administrator`
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
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`idAdmin`, `namaLengkap`, `email`, `password`, `status`, `tanggalBuat`, `token`) VALUES
('ADM01', 'Rian Wahyu Sahadah', 'rianwahyu26@gmail.com', 'b7c16b1afb8f46023bcc249b597090b0', 1, '2021-03-12 19:52:50', 'cfSOG4zoRLyYWTzj7oY63x:APA91bH9OHuMA13ipoDw_1FbvRZdgujj14l-vmL5v3rQDYPXuwr18ovbgQhdVPm_D5C8cRTqBgUJkYSgBuCF7L0P7dJxx228-84bSe_s9kx3_EfUiUnClAf_ifvGEkWyr_ey5UiQG6Xo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `idBanner` int(11) NOT NULL,
  `namaBanner` varchar(100) NOT NULL,
  `file` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`idBanner`, `namaBanner`, `file`, `status`) VALUES
(4, 'testing', 'ed02f7074cf1140f0ff35815c3f68031.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
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

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`orderID`, `userID`, `tipeKendaraan`, `idKategori`, `idJenis`, `idHarga`, `alamatOrder`, `latitude`, `longitude`, `tanggalOrder`, `waktuOrder`, `statusOrder`) VALUES
('CML0000001', 'XEZXSSv2r0bbCu1FIrdOvrFoMCA3', 'Toyota Rush', 1, 1, 1, 'Jl. Muncul No.168, Jl. Raya, Gedangan, Kec. Gedangan, Kabupaten Sidoarjo, Jawa Timur 61254, Indonesia, Indonesia', '-7.383946768114289', '112.72341141477227', '2021-03-31', '09:50:00', 3),
('CML0000002', 'XEZXSSv2r0bbCu1FIrdOvrFoMCA3', 'Rush', 1, 1, 1, 'Griya Permata Gedangan E3-38, Sikep, Keboansikep, Gedangan, Sidoarjo Regency, East Java 61254, Indonesia, Indonesia', '-7.38271819460467', '112.71898375824094', '2021-04-01', '15:12:00', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookingvalue`
--

CREATE TABLE `bookingvalue` (
  `id` int(11) NOT NULL,
  `orderID` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(11) NOT NULL,
  `tanggalValue` datetime NOT NULL DEFAULT current_timestamp(),
  `userAdmin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bookingvalue`
--

INSERT INTO `bookingvalue` (`id`, `orderID`, `keterangan`, `status`, `tanggalValue`, `userAdmin`) VALUES
(2, 'CML0000001', 'Pesanan telah dibuat', 0, '2021-03-31 04:51:17', ''),
(3, 'CML0000001', 'Pesanan telah diproses', 1, '2021-03-31 04:51:17', ''),
(4, 'CML0000001', 'Cimoling dalam perjalanan', 2, '2021-03-31 04:51:17', ''),
(5, 'CML0000001', 'Cimoling mencuci kendaraan', 3, '2021-03-31 04:51:17', ''),
(6, 'CML0000001', 'Proses cuci kendaraan selesai', 4, '2021-03-31 04:51:17', ''),
(7, 'CML0000001', 'Pembayaran COD diterima cimoling', 5, '2021-03-31 04:51:17', ''),
(8, 'CML0000001', 'Order Selesai. Terima kasih telah menggunakan cimoling', 6, '2021-03-31 04:51:17', ''),
(9, 'CML0000002', 'Pesanan telah dibuat', 0, '2021-04-01 10:12:39', ''),
(10, 'CML0000002', 'Pesanan telah di proses admin', 1, '2021-04-06 22:22:18', 'ADM01'),
(11, 'CML0000002', 'Cimoling konfirmasi order dan menuju lokasi pelanggan', 2, '2021-04-06 22:22:26', 'ADM01'),
(12, 'CML0000002', 'Cimoling sampai di lokasi', 3, '2021-04-06 22:22:29', 'ADM01'),
(13, 'CML0000002', 'Cimoling sedang mencuci kendaraan pelanggan', 4, '2021-04-06 22:30:04', 'ADM01'),
(14, 'CML0000001', 'Cimoling konfirmasi order dan menuju lokasi pelanggan', 2, '2021-04-06 22:46:04', 'ADM01'),
(15, 'CML0000001', 'Cimoling sampai di lokasi', 3, '2021-04-06 22:46:19', 'ADM01'),
(16, 'CML0000002', 'Cimoling selesai mencuci kendaraan', 5, '2021-04-06 22:53:42', 'ADM01'),
(18, 'CML0000002', 'Pembayaran di terima pihak Cimoling', 6, '2021-04-06 23:18:13', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisharga`
--

CREATE TABLE `jenisharga` (
  `idHarga` int(11) NOT NULL,
  `idJenis` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenisharga`
--

INSERT INTO `jenisharga` (`idHarga`, `idJenis`, `keterangan`, `harga`) VALUES
(1, 1, 'Air Dari customer', 45000),
(2, 1, 'Include Air', 50000),
(3, 2, 'Air dari customer', 50000),
(4, 2, 'Include Air', 55000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jeniskendaraan`
--

CREATE TABLE `jeniskendaraan` (
  `idJenis` int(11) NOT NULL,
  `idKategori` int(11) NOT NULL,
  `namaJenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jeniskendaraan`
--

INSERT INTO `jeniskendaraan` (`idJenis`, `idKategori`, `namaJenis`) VALUES
(1, 1, 'City Car'),
(2, 1, 'Car Lol');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategorikendaraan`
--

CREATE TABLE `kategorikendaraan` (
  `idKategori` int(11) NOT NULL,
  `namaKategori` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategorikendaraan`
--

INSERT INTO `kategorikendaraan` (`idKategori`, `namaKategori`, `foto`) VALUES
(1, 'Mobil', ''),
(2, 'Motor', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `idReport` int(11) NOT NULL,
  `orderID` varchar(50) NOT NULL,
  `hargaFinal` int(11) NOT NULL,
  `hargaKetFinal` varchar(100) NOT NULL,
  `tanggalOrder` datetime NOT NULL,
  `tanggalSelesaiOrder` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`idReport`, `orderID`, `hargaFinal`, `hargaKetFinal`, `tanggalOrder`, `tanggalSelesaiOrder`) VALUES
(2, 'CML0000002', 45000, 'Air Dari customer', '2021-04-01 15:12:00', '2021-04-06 23:18:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
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
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`idMember`, `namaLengkap`, `alamat`, `noHp`, `email`, `password`, `token`, `tanggalRegistrasi`) VALUES
('XEZXSSv2r0bbCu1FIrdOvrFoMCA3', 'Rian Wahyu', ' ', '', 'riansahadah@gmail.com', '256fa07ec1bff2c9ce5e104ad65cb36a', 'e4HTrWSPQ_Ka3He_yjI0Pk:APA91bE79ZNNKCRJ1RSoqaDJjRWNSf8xcf8siLiCLiFfKsH2el3aXtWsJvm4P2vPJmxTe_NqeurytqDermmUU5ccA_YnaQtfA5k_TsXg5hgMheVuQB8cOGuKGTftZCrRjfVm42M-9HR8', '2021-03-30 09:34:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `idNotifikasi` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pesan` text NOT NULL,
  `tanggalNotifikasi` datetime NOT NULL DEFAULT current_timestamp(),
  `userID` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`idNotifikasi`, `judul`, `pesan`, `tanggalNotifikasi`, `userID`, `status`) VALUES
(2, 'tes 2', 'ini pesan. 2', '2021-04-01 14:15:58', 'XEZXSSv2r0bbCu1FIrdOvrFoMCA3', 0),
(3, 'tes 3', 'ini pesan. 3', '2021-04-01 14:15:58', 'XEZXSSv2r0bbCu1FIrdOvrFoMCA3', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idPembayaran` int(11) NOT NULL,
  `namaPembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`idPembayaran`, `namaPembayaran`) VALUES
(1, 'COD');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indeks untuk tabel `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`idBanner`);

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`orderID`);

--
-- Indeks untuk tabel `bookingvalue`
--
ALTER TABLE `bookingvalue`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenisharga`
--
ALTER TABLE `jenisharga`
  ADD PRIMARY KEY (`idHarga`);

--
-- Indeks untuk tabel `jeniskendaraan`
--
ALTER TABLE `jeniskendaraan`
  ADD PRIMARY KEY (`idJenis`);

--
-- Indeks untuk tabel `kategorikendaraan`
--
ALTER TABLE `kategorikendaraan`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`idReport`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idMember`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`idNotifikasi`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idPembayaran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `banner`
--
ALTER TABLE `banner`
  MODIFY `idBanner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bookingvalue`
--
ALTER TABLE `bookingvalue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `jenisharga`
--
ALTER TABLE `jenisharga`
  MODIFY `idHarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jeniskendaraan`
--
ALTER TABLE `jeniskendaraan`
  MODIFY `idJenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategorikendaraan`
--
ALTER TABLE `kategorikendaraan`
  MODIFY `idKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `idReport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `idNotifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idPembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

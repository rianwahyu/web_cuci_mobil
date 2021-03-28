-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Mar 2021 pada 17.03
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
('ADM01', 'Rian Wahyu Sahadah', 'rianwahyu26@gmail.com', 'b7c16b1afb8f46023bcc249b597090b0', 1, '2021-03-12 19:52:50', '0');

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
(2, 1, 'Include Air', 50000);

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
(1, 1, 'City Car \r\n');

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
-- Struktur dari tabel `member`
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
-- Indeks untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`idAdmin`);

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
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idMember`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenisharga`
--
ALTER TABLE `jenisharga`
  MODIFY `idHarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jeniskendaraan`
--
ALTER TABLE `jeniskendaraan`
  MODIFY `idJenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategorikendaraan`
--
ALTER TABLE `kategorikendaraan`
  MODIFY `idKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

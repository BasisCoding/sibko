-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2020 pada 18.48
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ortu`
--

CREATE TABLE `ortu` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(15) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `foto` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ortu`
--

INSERT INTO `ortu` (`id`, `username`, `email`, `password`, `nama_lengkap`, `alamat`, `hp`, `pekerjaan`, `pendidikan`, `agama`, `jenis_kelamin`, `foto`, `status`, `level`) VALUES
(1, 'orangtua', 'orangua@gmail.com', '75f6f5649f707e10f29bbd1122f124a5f8c4698785411d32eb0ceffcc344983ee8229b7fce2e29a40b60889906b68d86f14994f693928d20eb683f59c26f0e95', 'Orang Tua', 'jl. raya cilegon km. 03', '089676490971', 'PNS', 'SMK', 'Islam', 'Laki-Laki', '', 'Aktif', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ortu`
--
ALTER TABLE `ortu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ortu`
--
ALTER TABLE `ortu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

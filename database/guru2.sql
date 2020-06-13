-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2020 pada 20.46
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(15) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `foto` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `username`, `email`, `password`, `nik`, `nama_lengkap`, `alamat`, `hp`, `pendidikan`, `agama`, `jenis_kelamin`, `foto`, `status`, `level`, `created_at`, `created_by`) VALUES
(1, 'Mohamad Masdiki', 'moh.masdiki21@gmail.com', '75f6f5649f707e10f29bbd1122f124a5f8c4698785411d32eb0ceffcc344983ee8229b7fce2e29a40b60889906b68d86f14994f693928d20eb683f59c26f0e95', '1234567678900', 'Mohamad Masdiki,S.Kom', 'Jl. Raya Serang-Petir', '089676490971', 'Strata 1', 'Islam', 'Laki-Laki', '', 'Aktif', 2, NULL, 0),
(7, 'Maryati', 'maryati@gmail.com', '75f6f5649f707e10f29bbd1122f124a5f8c4698785411d32eb0ceffcc344983ee8229b7fce2e29a40b60889906b68d86f14994f693928d20eb683f59c26f0e95', '1234567678900', 'Maryati Intan Solehah,S.Pd', 'Jl. Raya Serang-Petir', '089676490971', 'Strata 1', 'Islam', 'Perempuan', '', 'Aktif', 2, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

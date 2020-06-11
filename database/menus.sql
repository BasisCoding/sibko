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
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(150) NOT NULL,
  `link` varchar(200) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `sub_menu` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `warna` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `nama_menu`, `link`, `icon`, `sub_menu`, `level`, `warna`) VALUES
(1, 'Dashboard', 'Dashboard', 'ni ni-tv-2', 0, 1, 'text-warning'),
(3, 'Data Siswa', 'Master/Data_Siswa', 'ni ni-circle-08', 0, 1, 'text-primary'),
(4, 'Data Jurusan', 'Master/Data_Jurusan', 'ni ni-send', 0, 1, 'text-dark'),
(5, 'Data Guru', 'Master/Data_Guru', 'ni ni-satisfied', 0, 1, 'text-info'),
(6, 'Data Konseling', 'Master/Data_Konseling', 'ni ni-key-25', 0, 1, 'text-danger'),
(7, 'Data Orang Tua', 'Master/Data_Ortu', 'ni ni-circle-08', 0, 1, 'text-success');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

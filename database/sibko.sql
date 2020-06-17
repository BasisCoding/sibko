-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2020 pada 15.35
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(15) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_user`, `nama_lengkap`, `username`, `email`, `password`, `status`, `foto`, `level`) VALUES
(1, 'Ahmad Fatoni', 'admin', 'achmad.fatoni33@gmail.com', '0ae02c00d2b1196589a5be37f718fbeec0c6f07968f90f41dbc2b167fdd919f57e9616c08130157ed4a22f7f7cae387276d456d01a98310f1b1d5f00999d5cb0', 'Aktif', 'admin.png', 1);

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
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `kode_jurusan` varchar(10) NOT NULL,
  `nama_jurusan` varchar(150) NOT NULL,
  `semester` int(11) NOT NULL,
  `kepala_jurusan` int(11) NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `kode_jurusan`, `nama_jurusan`, `semester`, `kepala_jurusan`, `logo`) VALUES
(1, 'AP', 'Administrasi Perkantoran', 21, 0, 'aas.png'),
(2, 'TKJ', 'Teknik Komputer Jaringan', 2, 0, 'TKJ.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `tingkat` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `tingkat`, `id_jurusan`) VALUES
(9, 2, 2),
(10, 3, 1),
(11, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konseling`
--

CREATE TABLE `konseling` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_pelangaran` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(5, 'Data Kelas', 'Master/Data_Kelas', 'ni ni-building', 0, 1, 'text-warning'),
(6, 'Data Guru', 'Master/Data_Guru', 'ni ni-satisfied', 0, 1, 'text-info'),
(7, 'Data Orang Tua', 'Master/Data_Ortu', 'ni ni-circle-08', 0, 1, 'text-success'),
(9, 'Data Konseling', 'Master/Data_Konseling', 'ni ni-key-25', 0, 1, 'text-danger');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ortu`
--

CREATE TABLE `ortu` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(15) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
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
-- Dumping data untuk tabel `ortu`
--

INSERT INTO `ortu` (`id`, `username`, `email`, `password`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `hp`, `pekerjaan`, `pendidikan`, `agama`, `jenis_kelamin`, `foto`, `status`, `level`, `created_at`, `created_by`) VALUES
(11, 'username', '', 'password', '1235678', 'Jsjajas', 'Serang', '1997-02-01', 'Kele', '', '', 'SD Sederajat', '', 'Laki-Laki', '.jpg', '', 0, '2020-06-17 12:25:09', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id` int(11) NOT NULL,
  `jenis_pelanggaran` varchar(150) NOT NULL,
  `tingkat` int(11) NOT NULL,
  `max_langgaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggaran`
--

INSERT INTO `pelanggaran` (`id`, `jenis_pelanggaran`, `tingkat`, `max_langgaran`) VALUES
(1, 'Keluar Dari Sekolah', 2, 3),
(2, 'Merokok Di Sekolah', 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` int(10) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `alamat` text,
  `hp` varchar(15) DEFAULT NULL,
  `id_ortu` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `foto` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama_lengkap`, `email`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `anak_ke`, `alamat`, `hp`, `id_ortu`, `id_kelas`, `foto`, `created_at`, `created_by`) VALUES
(10, 1101161014, 'Ahmad Fatoni', '', 'Serang', '1997-08-20', 'Laki-Laki', '', 0, 'Jl', '', 0, NULL, '1101161014.jpg', '2020-06-17 12:30:58', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `nama_akses` varchar(150) NOT NULL,
  `level` int(11) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_group`
--

INSERT INTO `user_group` (`id`, `nama_akses`, `level`, `link`) VALUES
(1, 'Administrator', 1, 'admin'),
(2, 'Orang Tua', 2, 'ortu'),
(3, 'Guru', 3, 'guru');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konseling`
--
ALTER TABLE `konseling`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ortu`
--
ALTER TABLE `ortu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `konseling`
--
ALTER TABLE `konseling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `ortu`
--
ALTER TABLE `ortu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

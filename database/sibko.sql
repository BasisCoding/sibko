-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2020 pada 14.41
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
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(15) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama_lengkap`, `username`, `email`, `password`, `status`, `foto`, `level`) VALUES
(1, 'Ahmad Fatoni', 'admin', 'achmad.fatoni33@gmail.com', 'ef415bf39f252fa3f88ae7cca99fa4f4a7f4144ca2bcc20d47bb581f684566e6c7037c668c574fa223ae4c0083fcc12868cf12ad6fa9895d541b4056387ac19a', 'Aktif', 'admin.png', 1);

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

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `username`, `email`, `password`, `nik`, `nama_lengkap`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `hp`, `pendidikan`, `agama`, `jenis_kelamin`, `foto`, `status`, `level`, `created_at`, `created_by`) VALUES
(1, 'guru', 'guru@gmail.com', '0ae02c00d2b1196589a5be37f718fbeec0c6f07968f90f41dbc2b167fdd919f57e9616c08130157ed4a22f7f7cae387276d456d01a98310f1b1d5f00999d5cb0', '1234567891258', 'Debi Sutisna', '2020-06-03', 'Serang', 'Jl.Raya Cilegon Km.03', '089676490971', 'SMA', 'Islam', 'Lai-Laki', '1234567891258.png', 'Aktif', 3, '2020-06-17 05:13:12', 1),
(2, 'rizky', 'dikiaja2011@java.com', '0ae02c00d2b1196589a5be37f718fbeec0c6f07968f90f41dbc2b167fdd919f57e9616c08130157ed4a22f7f7cae387276d456d01a98310f1b1d5f00999d5cb0', '3604193008910000', 'Rizky Amanda,S.Kom', '1991-08-03', 'Serang', 'Kp. Cirogol RT 02/01 Ds. Cirogol Kec. Cikeusal Kab. Serang', '081123456876', 'S1', '', 'Perempuan', '3604193008910000.png', 'Aktif', 3, '2020-06-20 16:15:24', 1),
(3, 'taufik', 'M.taufik@gmail.com', '0ae02c00d2b1196589a5be37f718fbeec0c6f07968f90f41dbc2b167fdd919f57e9616c08130157ed4a22f7f7cae387276d456d01a98310f1b1d5f00999d5cb0', '3604190984635000', 'Muhamad Taufik, ST', '1987-07-08', 'Serang', 'Komp. Korem RT 008/04 Kel. Cipocok Kec. Cipocok-Serang', '089736454637', 'S1', '', 'Laki-Laki', '', 'Aktif', 3, '2020-06-20 16:19:13', 1),
(4, 'masitoh', 'masitoh@gmail.com', '0ae02c00d2b1196589a5be37f718fbeec0c6f07968f90f41dbc2b167fdd919f57e9616c08130157ed4a22f7f7cae387276d456d01a98310f1b1d5f00999d5cb0', '360412345960000', 'Masitoh,S.Pd', '1997-06-07', 'Cilegon', 'Kp, Panyairan RT 08/05 Ds. Cikeusal Kec.Cikeusal Kab Serang', '08123456098', '', '', 'Laki-Laki', '', 'Aktif', 3, '2020-06-20 16:21:16', 1),
(5, 'hadi', 'hadisupriyadi@gmail.com', '0ae02c00d2b1196589a5be37f718fbeec0c6f07968f90f41dbc2b167fdd919f57e9616c08130157ed4a22f7f7cae387276d456d01a98310f1b1d5f00999d5cb0', '3450856435341000', 'Hadi Supriyadi,S.Ag', '1987-02-08', 'Serang', 'Kp. Curug RT 08/01 Kel. Curug Kec. Curug-Serang', '081234556677', '', '', 'Laki-Laki', '', 'Aktif', 3, '2020-06-20 16:23:15', 1),
(6, 'guru', 'masdikiaww12@gmail.com', '0ae02c00d2b1196589a5be37f718fbeec0c6f07968f90f41dbc2b167fdd919f57e9616c08130157ed4a22f7f7cae387276d456d01a98310f1b1d5f00999d5cb0', '360412345600001', 'Ir. Mohamad Masduki,MT', '1981-01-09', 'Ambon', 'Kp. Cibuah RT 02/01 Ds. Mangga Kec. Asem', '0812344556687', 'S2', '', 'Laki-Laki', '', 'Aktif', 3, '2020-06-20 16:41:11', 1);

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
(1, 'AP', 'Administrasi Perkantoran', 21, 1, 'aas.png'),
(2, 'TKJ', 'Teknik Komputer Jaringan', 2, 0, 'TKJ.png'),
(3, '11ARG01', 'Agribisnis', 1, 3, ''),
(4, '110IGR01', 'B. Inggris', 1, 4, ''),
(5, '11TMN01', 'Teknik Mesin', 1, 6, ''),
(6, 'AP', 'Administrasi Perkantoran', 21, 1, 'aas.png'),
(7, 'TKJ', 'Teknik Komputer Jaringan', 2, 2, 'TKJ.png');

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
(11, 2, 1),
(12, 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepsek`
--

CREATE TABLE `kepsek` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(15) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kepsek`
--

INSERT INTO `kepsek` (`id`, `nama_lengkap`, `username`, `email`, `password`, `status`, `foto`, `level`) VALUES
(1, 'Kepala Sekolah', 'kepsek', 'kepsek@gmail.com', 'ef415bf39f252fa3f88ae7cca99fa4f4a7f4144ca2bcc20d47bb581f684566e6c7037c668c574fa223ae4c0083fcc12868cf12ad6fa9895d541b4056387ac19a', 'Aktif', 'admin.png', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konseling`
--

CREATE TABLE `konseling` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_pelanggaran` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konseling`
--

INSERT INTO `konseling` (`id`, `id_siswa`, `id_guru`, `id_pelanggaran`, `keterangan`, `tanggal`) VALUES
(3, 10, 1, 4, 'Anak ini enak banget', '2020-06-24');

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
(9, 'Data Konseling', 'Master/Data_Konseling', 'ni ni-key-25', 0, 1, 'text-danger'),
(10, 'Dashboard', 'Dashboard', 'ni ni-tv-2', 0, 3, 'text-warning'),
(11, 'Data Siswa', 'Master/Data_Siswa', 'ni ni-circle-08', 0, 3, 'text-primary'),
(13, 'Data Kelas', 'Master/Data_Kelas', 'ni ni-building', 0, 3, 'text-warning'),
(15, 'Data Orang Tua', 'Master/Data_Ortu', 'ni ni-circle-08', 0, 3, 'text-success'),
(16, 'Data Konseling', 'Master/Data_Konseling', 'ni ni-key-25', 0, 3, 'text-danger'),
(17, 'Dashboard', 'Dashboard', 'ni ni-tv-2', 0, 2, 'text-warning'),
(18, 'Data Anak', 'Data_Anak', 'ni ni-circle-08', 0, 2, 'text-primary'),
(19, 'Data Konseling', 'Data_Anak/konseling', 'ni ni-key-25', 0, 2, 'text-danger'),
(20, 'Dashboard', 'Dashboard', 'ni ni-tv-2', 0, 4, 'text-warning'),
(21, 'Data Siswa', 'Master/Data_Siswa', 'ni ni-circle-08', 0, 4, 'text-primary'),
(22, 'Data Kelas', 'Master/Data_Kelas', 'ni ni-building', 0, 4, 'text-warning'),
(23, 'Data Orang Tua', 'Master/Data_Ortu', 'ni ni-circle-08', 0, 4, 'text-success'),
(24, 'Data Konseling', 'Master/Data_Konseling', 'ni ni-key-25', 0, 4, 'text-danger');

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
(11, 'ortu', '', 'cdd1778f41bb937fee97bcc8d310cd56c9ca39ad87be31c26b93a534356189b222e47a5b5657816269bcd213ed4c6b0618053d0a2d2b370ae5125ecc97a58580', '1235678', 'Jsjajas', 'Serang', '1997-02-01', 'Kele', '', '', 'SD Sederajat', '', 'Laki-Laki', '.jpg', 'Aktif', 2, '2020-06-17 12:25:09', 1),
(12, 'ortu', '', 'cdd1778f41bb937fee97bcc8d310cd56c9ca39ad87be31c26b93a534356189b222e47a5b5657816269bcd213ed4c6b0618053d0a2d2b370ae5125ecc97a58580', '123567887', 'Orang Tua', 'Searng', '2552-02-01', '', '', '', 'SD Sederajat', 'Islam', 'Laki-Laki', '123567887.png', 'Aktif', 2, '2020-06-20 17:26:43', 1);

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
(3, 'tidur di sekolah', 1, 5),
(4, 'Keluar dari kelas', 2, 3),
(5, 'Merokok di kelas', 2, 3);

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
  `minat_bakat` varchar(250) NOT NULL,
  `foto` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama_lengkap`, `email`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `anak_ke`, `alamat`, `hp`, `id_ortu`, `id_kelas`, `minat_bakat`, `foto`, `created_at`, `created_by`) VALUES
(11, 1122435401, 'Ardelia Zahra', 'Aslanali742@gmail.com', 'Serang', '2000-07-08', 'Perempuan', '', 1, 'Komp. Perum. Kelutuk RT 001/001 Ds. Siki Kec. Ambon', '08121333453', 11, 10, 'Sepak Bola', '', '2020-06-21 14:38:43', 1),
(13, 1123123446, 'Kokom', 'kokom@gmail.com', 'Serang', '2000-01-01', 'Perempuan', '', 1, 'Kp. Mangga RT 08/01 Ds. Manggis Kec. Asem ', '0812345567788', 0, 11, 'Sepak Bola', '', '2020-06-21 14:39:03', 1),
(14, 1123123447, 'Sarikam', 'sarikam', 'Serang', '2000-07-08', 'Laki-Laki', '', 1, 'Kp. Kokosan RT. 008/01 Kel. Pisangan Kec. Ambon', '0812345465768', 0, 12, 'Menyanyi', '', '2020-06-21 14:39:14', 1);

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
(3, 'Guru', 3, 'guru'),
(4, 'Kepala Sekolah', 4, 'kepsek');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `kepsek`
--
ALTER TABLE `kepsek`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kepsek`
--
ALTER TABLE `kepsek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `konseling`
--
ALTER TABLE `konseling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `ortu`
--
ALTER TABLE `ortu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

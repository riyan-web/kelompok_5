-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2020 pada 14.29
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sipeka`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `noKk` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ketuart`
--

CREATE TABLE `tb_ketuart` (
  `id_ketua_rt` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `noKk` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ketuart`
--

INSERT INTO `tb_ketuart` (`id_ketua_rt`, `nik`, `noKk`, `user_id`) VALUES
(1, '3511020284838282', '2222333344445555', 6),
(2, '35346455685633', '3333444455556666', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kk`
--

CREATE TABLE `tb_kk` (
  `noKk` varchar(20) NOT NULL,
  `namaKk` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `kodepos` varchar(10) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `dikeluarkanTanggal` varchar(20) NOT NULL,
  `kodeRt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kk`
--

INSERT INTO `tb_kk` (`noKk`, `namaKk`, `alamat`, `kelurahan`, `kecamatan`, `kabupaten`, `kodepos`, `provinsi`, `dikeluarkanTanggal`, `kodeRt`) VALUES
('2222333344445555', 'aldi', 'shsadsjshc', 'fcsdhvds', 'dsfhdshfdh', 'sddhsfh', 'sdhhdfsd', 'dssdbbsd', 'sdbsdhs', 1),
('3333444455556666', 'rudi', 'sdsachschs', 'dsvndsvhsd', 'sshshh', 'dshdshchv', 'sdsdmcsdm', 'sncsdnvv', 'dndvcndvn', 4),
('4444555566667777', 'budi', 'hshchhhx', 'reghferh', 'gasgsgs', 'snsnns', 'hshsh', 'hshsh', 'hedyewfew', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ktp`
--

CREATE TABLE `tb_ktp` (
  `nik` varchar(16) NOT NULL,
  `noKk` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempatLahir` varchar(50) NOT NULL,
  `tanggalLahir` varchar(20) NOT NULL,
  `jenisKelamin` varchar(10) NOT NULL,
  `golDarah` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `kodeRt` int(11) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `statusPerkawinan` varchar(12) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(50) NOT NULL,
  `berlakuHingga` varchar(20) NOT NULL,
  `gambar_ktp` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ktp`
--

INSERT INTO `tb_ktp` (`nik`, `noKk`, `nama`, `tempatLahir`, `tanggalLahir`, `jenisKelamin`, `golDarah`, `alamat`, `kodeRt`, `kelurahan`, `kecamatan`, `agama`, `statusPerkawinan`, `pekerjaan`, `kewarganegaraan`, `berlakuHingga`, `gambar_ktp`) VALUES
('3511020284838282', '2222333344445555', 'fian', 'bondowoso', '21-06-1999', 'laki-laki', 'o', 'schsacscjsj', 1, 'grehergwege', 'siliwangi', 'ewgewgweb', 'belum kawin', 'ewwegregg', 'indonesia', 'seumur hidup', 'default.jpg'),
('3522878767675454', '4444555566667777', 'abidin', 'dsjdssh', '1987-08-08', 'Laki-Laki', 'A', 'jl.nchsddshcsd', 1, 'bungurasih', '', 'Kristen', 'Belum kawin', 'wiraswasta', 'indonesia', 'seumur hidup', 'default.jpg'),
('35346455685633', '3333444455556666', 'fiki', 'asasah', 'hahadjd', 'laki-laki', 'o', 'cbscsbcsba', 4, 'cjscjsjdsj', 'dsbshs', 'andsn', 'sdhhdhs', 'sdshdhs', 'sshdhd', 'sdgsgd', 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rt_rw`
--

CREATE TABLE `tb_rt_rw` (
  `kodeRt` int(11) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rt_rw`
--

INSERT INTO `tb_rt_rw` (`kodeRt`, `rt`, `rw`) VALUES
(1, '1', 1),
(2, '2', 1),
(3, '3', 2),
(4, '4', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(6, 'riyan yudi iriyanto', 'riyanyudi@gmail.com', 'default.png', '$2y$10$k9eyF39d10pFnGjpQBRR3OyduVQs5xrc1jN67urNex2WCVaca3GAO', 2, 1, 1586712946),
(7, 'yudi iriyanto', 'yudiiriyanto7@gmail.com', 'avatar04.png', '$2y$10$vZg95oJGXsGgA8IO/zwbNuMWLv4pB3pv56kK0p9E8uM80DIDSelCe', 1, 1, 1586798280),
(8, 'andi ahmad', 'andiahmad@gmail.com', 'default.png', '$2y$10$zqV.hqwPIRg6CNeHF65X8O0h2QwkeGMD4NMErgy7cZBuTnPn.IL8e', 2, 1, 1590591982);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'profile'),
(3, 'data_warga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'profile', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'profile/edit', 'fas fa-fw fa-user-edit', 1),
(4, 2, 'ganti password', 'profile/ganti_password', 'fas fa-fw fa-key', 1),
(5, 3, 'Kartu Penduduk', 'data_warga/ktp', 'fas fa-fw fa-address-card', 1),
(6, 3, 'Kartu Keluarga', 'data_warga/kartu_keluarga', 'fas fa-fw fa-credit-card', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `noKk` (`noKk`),
  ADD KEY `nik` (`nik`),
  ADD KEY `noKk_2` (`noKk`),
  ADD KEY `nik_2` (`nik`),
  ADD KEY `noKk_3` (`noKk`),
  ADD KEY `nik_3` (`nik`);

--
-- Indeks untuk tabel `tb_ketuart`
--
ALTER TABLE `tb_ketuart`
  ADD PRIMARY KEY (`id_ketua_rt`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `noKk` (`noKk`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `noKk_2` (`noKk`),
  ADD KEY `nik_2` (`nik`);

--
-- Indeks untuk tabel `tb_kk`
--
ALTER TABLE `tb_kk`
  ADD PRIMARY KEY (`noKk`),
  ADD KEY `kodeRt` (`kodeRt`);

--
-- Indeks untuk tabel `tb_ktp`
--
ALTER TABLE `tb_ktp`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `kodeRt` (`kodeRt`),
  ADD KEY `noKk` (`noKk`),
  ADD KEY `noKk_3` (`noKk`),
  ADD KEY `noKk_4` (`noKk`),
  ADD KEY `noKk_2` (`noKk`) USING BTREE;

--
-- Indeks untuk tabel `tb_rt_rw`
--
ALTER TABLE `tb_rt_rw`
  ADD PRIMARY KEY (`kodeRt`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_ketuart`
--
ALTER TABLE `tb_ketuart`
  MODIFY `id_ketua_rt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_rt_rw`
--
ALTER TABLE `tb_rt_rw`
  MODIFY `kodeRt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`noKk`) REFERENCES `tb_kk` (`noKk`),
  ADD CONSTRAINT `tb_anggota_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `tb_ktp` (`nik`);

--
-- Ketidakleluasaan untuk tabel `tb_ketuart`
--
ALTER TABLE `tb_ketuart`
  ADD CONSTRAINT `tb_ketuart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `tb_ketuart_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `tb_ktp` (`nik`),
  ADD CONSTRAINT `tb_ketuart_ibfk_3` FOREIGN KEY (`noKk`) REFERENCES `tb_kk` (`noKk`);

--
-- Ketidakleluasaan untuk tabel `tb_kk`
--
ALTER TABLE `tb_kk`
  ADD CONSTRAINT `tb_kk_ibfk_1` FOREIGN KEY (`kodeRt`) REFERENCES `tb_rt_rw` (`kodeRt`);

--
-- Ketidakleluasaan untuk tabel `tb_ktp`
--
ALTER TABLE `tb_ktp`
  ADD CONSTRAINT `tb_ktp_ibfk_1` FOREIGN KEY (`kodeRt`) REFERENCES `tb_rt_rw` (`kodeRt`),
  ADD CONSTRAINT `tb_ktp_ibfk_2` FOREIGN KEY (`noKk`) REFERENCES `tb_kk` (`noKk`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`),
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

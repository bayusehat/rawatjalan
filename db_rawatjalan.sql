-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2018 pada 08.49
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rawatjalan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `no_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(200) NOT NULL,
  `alamat_dokter` varchar(200) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dokter`
--

INSERT INTO `tb_dokter` (`no_dokter`, `nama_dokter`, `alamat_dokter`, `created`, `updated`, `deleted`) VALUES
(1, 'DR. RAMLI', 'Jl.Sawo', '2018-12-06 12:47:05', '2018-12-06 12:47:05', 0),
(2, 'Dr. Suseno', 'Jl.Rajawali No 1', '2018-12-06 14:39:25', '2018-12-06 14:39:25', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keluarga_pasien`
--

CREATE TABLE `tb_keluarga_pasien` (
  `no_kp` int(11) NOT NULL,
  `nama_keluarga` varchar(255) NOT NULL,
  `hubungan` enum('Suami','Istri','Adik','Kakak','Anak') NOT NULL,
  `id_pasien` varchar(200) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_keluarga_pasien`
--

INSERT INTO `tb_keluarga_pasien` (`no_kp`, `nama_keluarga`, `hubungan`, `id_pasien`, `created`, `updated`, `deleted`) VALUES
(1, 'Yuna', 'Kakak', '1', '2018-12-06 12:17:20', '2018-12-06 12:17:20', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `no_rm` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `alamat_pasien` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(200) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(200) NOT NULL,
  `status` enum('Dilayani','Tidak dilayani') NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`no_rm`, `nama_pasien`, `alamat_pasien`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `status`, `created`, `updated`, `deleted`) VALUES
(1, 'Arya Bayu', 'Sidoarjo', 'Laki - laki', 'Kediri', '0000-00-00', '0895364791632', 'Dilayani', '2018-12-06 12:17:20', '2018-12-06 12:17:20', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `no_pembayaran` int(11) NOT NULL,
  `no_rj` varchar(255) NOT NULL,
  `nominal` double NOT NULL,
  `jenis_pembayaran` varchar(200) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rawat_jalan`
--

CREATE TABLE `tb_rawat_jalan` (
  `no_rj` int(11) NOT NULL,
  `pembayaran` varchar(255) NOT NULL,
  `no_asuransi` varchar(200) NOT NULL,
  `penanggung_jawab` varchar(200) NOT NULL,
  `kadaluarsa` datetime NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `unit` varchar(200) NOT NULL,
  `cara_masuk` varchar(200) NOT NULL,
  `id_pasien` varchar(200) NOT NULL,
  `id_dokter` varchar(200) NOT NULL,
  `tarif` double NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rawat_jalan`
--

INSERT INTO `tb_rawat_jalan` (`no_rj`, `pembayaran`, `no_asuransi`, `penanggung_jawab`, `kadaluarsa`, `kelas`, `unit`, `cara_masuk`, `id_pasien`, `id_dokter`, `tarif`, `created`, `updated`, `deleted`) VALUES
(1, 'Umum', '', 'Pemkot', '2018-12-29 00:00:00', 'III', 'Gigi', 'Datang Sendiri', '1', '1', 900000, '2018-12-06 13:40:31', '2018-12-06 13:40:31', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`no_dokter`);

--
-- Indeks untuk tabel `tb_keluarga_pasien`
--
ALTER TABLE `tb_keluarga_pasien`
  ADD PRIMARY KEY (`no_kp`);

--
-- Indeks untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`no_rm`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`no_pembayaran`);

--
-- Indeks untuk tabel `tb_rawat_jalan`
--
ALTER TABLE `tb_rawat_jalan`
  ADD PRIMARY KEY (`no_rj`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `no_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_keluarga_pasien`
--
ALTER TABLE `tb_keluarga_pasien`
  MODIFY `no_kp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `no_rm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `no_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_rawat_jalan`
--
ALTER TABLE `tb_rawat_jalan`
  MODIFY `no_rj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

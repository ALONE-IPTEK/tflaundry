-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 27 Des 2020 pada 11.21
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--
CREATE DATABASE IF NOT EXISTS `db_laundry` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_laundry`;
-- --------------------------------------------------------

--
-- Struktur dari tabel `barangg`
--

CREATE TABLE `barangg` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl_update` date NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id` int(10) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id`, `jenis`, `harga`) VALUES
(1, 'Paket 1', 10000),
(2, 'Paket 2', 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`id`, `nama`, `alamat`, `telp`) VALUES
(1, 'Irwansyah', 'Jl. Wild West No.12', '082445129182');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemakaian`
--

CREATE TABLE `pemakaian` (
  `id` int(10) NOT NULL,
  `tgl_pakai` date NOT NULL,
  `barang` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemakaian`
--

INSERT INTO `pemakaian` (`id`, `tgl_pakai`, `barang`, `jumlah`) VALUES
(1, '2016-02-23', 'Deterjen Bubuk', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `no` int(10) NOT NULL,
  `tgl` date NOT NULL,
  `totali` int(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `totalh` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('Administrator','Karyawan','Konsumen') NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `gender` enum('Laki laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `username`, `password`, `level`, `nik`, `alamat`, `telp`, `gender`) VALUES
(1, 'Tio Irfan Antoni', 'sityoy', '4b98fb5647589473b739ce856356b193', 'Administrator', '123456789', 'Sumedang', '085221445987', 'Laki laki'),
(6, 'Anisa Putri', 'anisa', '40cc8f68f52757aff1ad39a006bfbf11', 'Karyawan', '4172939182', 'Jl prima', '9823918309', 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `alamat`, `telp`) VALUES
(1, 'Who', 'Jl. Water Park No.18', '0833666');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(5) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `tarif` int(100) NOT NULL,
  `diskon` int(100) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `tgl_ambil` date NOT NULL,
  `berat` int(10) NOT NULL,
  `pengguna` varchar(100) NOT NULL,
  `konsumen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `jenis`, `tarif`, `diskon`, `tgl_transaksi`, `tgl_ambil`, `berat`, `pengguna`, `konsumen`) VALUES
(1, 'Paket 1', 100000, 0, '2016-02-23', '2016-03-01', 10, 'khalid', 'Irwansyah'),
(2, 'Paket 2', 50000, 0, '2016-02-23', '2016-03-01', 10, 'khalid', 'Irwansyah'),
(3, 'Paket 1', 180000, 0, '2016-02-23', '2016-03-01', 20, 'khalid', 'Irwansyah'),
(4, 'Paket 2', 90000, 0, '2016-02-23', '2016-03-01', 20, 'khalid', 'Irwansyah'),
(5, 'Paket 2', 20000, 0, '2020-12-26', '2020-12-26', 4, 'sityoy', 'Irwansyah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangg`
--
ALTER TABLE `barangg`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemakaian`
--
ALTER TABLE `pemakaian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangg`
--
ALTER TABLE `barangg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemakaian`
--
ALTER TABLE `pemakaian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

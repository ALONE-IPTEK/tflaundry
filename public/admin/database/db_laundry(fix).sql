-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Mar 2022 pada 03.23
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

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
(1, 'Express 1 Hari (LEBIH DARI) > 5KG (Cuci Gosok 8000/kg) ', 8000),
(2, 'Express 1 Hari (KURANG DARI) < 5Kg (Cuci Gosok/10000kg)', 10000),
(4, 'Cuci Gosok', 8000),
(5, 'Gosok Aja', 6000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis2`
--

CREATE TABLE `jenis2` (
  `id` int(10) NOT NULL,
  `jenis2` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis2`
--

INSERT INTO `jenis2` (`id`, `jenis2`, `harga`) VALUES
(1, 'Karpet Standard', 65000),
(2, 'Karpet Besar', 100000);

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
(1, 'Irsyad', 'Jl. Prima', '0');

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
(2, 'Anisa Putri', 'anisa', '40cc8f68f52757aff1ad39a006bfbf11', 'Karyawan', '4172939182', 'Jl prima', '9823918309', 'Perempuan'),
(4, 'Tio Irfan Antoni', 'si_tyoy', '902856808887ae856c34962084afdf5a', 'Administrator', '3175030401010006', 'Jl. Prima', '081383205359', 'Laki laki');

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
  `jenis2` varchar(100) NOT NULL,
  `tarif` int(100) NOT NULL,
  `tarif2` int(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `diskon` int(100) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `tgl_ambil` date NOT NULL,
  `berat` varchar(10) NOT NULL,
  `berat2` int(11) NOT NULL,
  `pengguna` varchar(100) NOT NULL,
  `konsumen` varchar(100) NOT NULL,
  `nota` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `jenis`, `jenis2`, `tarif`, `tarif2`, `jumlah`, `diskon`, `tgl_transaksi`, `tgl_ambil`, `berat`, `berat2`, `pengguna`, `konsumen`, `nota`) VALUES
(19, 'Express 1 Hari (LEBIH DARI) > 5KG (Cuci Gosok 8000/kg) ', 'Karpet Standard', 16000, 260000, 276000, 0, '2022-03-06', '2022-03-07', '2', 4, 'si_tyoy', 'Irsyad', 4),
(20, 'Express 1 Hari (KURANG DARI) < 5Kg (Cuci Gosok/10000kg)', 'Karpet Standard', 30000, 260000, 290000, 0, '2022-03-07', '2022-03-08', '3', 4, 'si_tyoy', 'Irsyad', 3);

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
-- Indeks untuk tabel `jenis2`
--
ALTER TABLE `jenis2`
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jenis2`
--
ALTER TABLE `jenis2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

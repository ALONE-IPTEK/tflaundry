-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 05:37 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(10) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `jenis`, `harga`) VALUES
(1, 'Express 1 Hari (LEBIH DARI) > 5KG (Cuci Gosok 8000/kg) ', 8000),
(2, 'Express 1 Hari (KURANG DARI) < 5Kg (Cuci Gosok/10000kg)', 10000),
(4, 'Cuci Gosok', 8000),
(5, 'Gosok Aja', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis2`
--

CREATE TABLE `jenis2` (
  `id` int(10) NOT NULL,
  `jenis2` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis2`
--

INSERT INTO `jenis2` (`id`, `jenis2`, `harga`) VALUES
(1, 'Karpet Standard', 65000),
(2, 'Karpet Besar', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id`, `nama`, `alamat`, `telp`) VALUES
(1, 'Irsyad', 'Jl. Prima', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
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
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `username`, `password`, `level`, `nik`, `alamat`, `telp`, `gender`) VALUES
(2, 'Anisa Putri', 'anisa', '40cc8f68f52757aff1ad39a006bfbf11', 'Karyawan', '4172939182', 'Jl prima', '9823918309', 'Perempuan'),
(4, 'Tio Irfan Antoni', 'tyoy', '902856808887ae856c34962084afdf5a', 'Administrator', '3175030401010006', 'Jl. Prima', '081383205359', 'Laki laki');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
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
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `jenis`, `jenis2`, `tarif`, `tarif2`, `jumlah`, `diskon`, `tgl_transaksi`, `tgl_ambil`, `berat`, `berat2`, `pengguna`, `konsumen`, `nota`) VALUES
(19, 'Express 1 Hari (LEBIH DARI) > 5KG (Cuci Gosok 8000/kg) ', 'Karpet Standard', 16000, 260000, 276000, 0, '2022-03-06', '2022-03-07', '2', 4, 'si_tyoy', 'Irsyad', 4),
(20, 'Express 1 Hari (KURANG DARI) < 5Kg (Cuci Gosok/10000kg)', 'Karpet Standard', 30000, 260000, 290000, 0, '2022-03-07', '2022-03-08', '3', 4, 'si_tyoy', 'Irsyad', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis2`
--
ALTER TABLE `jenis2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis2`
--
ALTER TABLE `jenis2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

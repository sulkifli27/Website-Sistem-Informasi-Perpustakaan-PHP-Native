-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2020 at 09:52 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `kode_anggota` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`kode_anggota`, `nama`, `jenis_kelamin`, `alamat`, `foto`) VALUES
('K001', 'sulkifli ', 'L', 'sinjai', ''),
('K002', 'sul', 'L', 'sinjai', ''),
('K003', 'sulkifli sul', 'L', 'sinjai', 'add user sign icon design.jpg'),
('K004', 'ijul sul', 'L', 'sinjai', ''),
('K005', 'ijul', 'L', 'sinjai', 'add people.jpg'),
('K006', 'panjul', 'L', 'sinjai', ''),
('K007', 'susiyanti', 'P', 'sinjai', 'add user sign icon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kode_buku` varchar(10) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `tahun_terbit` varchar(5) DEFAULT NULL,
  `sampul` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul`, `penerbit`, `tahun_terbit`, `sampul`) VALUES
('001', 'komputer ', 'erlanga', '2020', ''),
('002', 'bahasa inggris', 'sulkifli', '2020', 'add archive icon.jpg'),
('003', 'bahasa indonesia', 'ijul', '2020', ''),
('004', 'manajemen', 'sul', '2020', 'award sign icon.jpg'),
('005', 'web developer', 'sul', '2020', 'approv message.jpg'),
('006', 'komputer grafik sul', 'ijul', '2020', 'arrow lingkarans.jpg'),
('007', 'agama', 'erlanga', '2020', 'approv message.jpg'),
('008', 'sistem komputer manajemen', 'erlanga', '2020', '');

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `b_waktu_peminjaman` int(11) DEFAULT NULL,
  `denda` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`b_waktu_peminjaman`, `denda`) VALUES
(14, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'sulkifli', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `kode_peminjaman` varchar(15) NOT NULL,
  `tanggal_peminjaman` date DEFAULT NULL,
  `kode_buku` varchar(10) DEFAULT NULL,
  `kode_anggota` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`kode_peminjaman`, `tanggal_peminjaman`, `kode_buku`, `kode_anggota`) VALUES
('KP001', '2020-02-19', '003', 'K003'),
('KP002', '2020-02-19', '003', 'K003'),
('KP003', '2020-02-19', '001', 'K003'),
('KP006', '2020-02-19', '002', 'K006'),
('KP007', '2020-02-19', '004', 'K005');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(10) NOT NULL,
  `kode_peminjaman` varchar(15) DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `denda` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `kode_peminjaman`, `tgl_pengembalian`, `denda`) VALUES
(15, 'KP003', '2020-03-12', 15000),
(16, 'KP002', '2020-03-21', 15000),
(18, 'KP006', '2020-03-21', 15000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`kode_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`kode_peminjaman`),
  ADD KEY `kode_buku` (`kode_buku`),
  ADD KEY `kode_anggota` (`kode_anggota`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_peminjaman` (`kode_peminjaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `FK_peminjaman1` FOREIGN KEY (`kode_buku`) REFERENCES `buku` (`kode_buku`),
  ADD CONSTRAINT `FK_peminjaman2` FOREIGN KEY (`kode_anggota`) REFERENCES `anggota` (`kode_anggota`);

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `FK_pengembalian1` FOREIGN KEY (`kode_peminjaman`) REFERENCES `peminjaman` (`kode_peminjaman`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2018 at 09:52 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko1`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` varchar(20) NOT NULL,
  `Nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `Nama_kategori`) VALUES
('kat001', 'makanan'),
('kat002', 'minuman'),
('kat003', 'alat mandi');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `kode_log` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`kode_log`, `username`, `tanggal`, `ip`, `status`) VALUES
(1, 'mal', '2018-07-13 20:20:21', '::1', 'berhasil'),
(2, 'mal', '2018-07-13 20:36:26', '::1', 'berhasil'),
(3, 'mal', '2018-07-14 13:27:52', '::1', 'berhasil'),
(4, 'mal', '2018-07-15 21:03:43', '::1', 'berhasil'),
(5, 'mal', '2018-07-15 21:04:06', '::1', 'berhasil'),
(6, 'mal', '2018-07-15 21:23:20', '::1', 'berhasil'),
(7, 'mal', '2018-07-16 17:48:19', '::1', 'berhasil'),
(8, 'mal', '2018-07-17 00:29:30', '::1', 'berhasil'),
(9, 'mal', '2018-07-17 01:13:19', '::1', 'berhasil'),
(10, 'mal', '2018-07-17 20:21:54', '::1', 'berhasil'),
(11, 'mal', '2018-07-18 11:56:55', '::1', 'berhasil'),
(12, 'mal', '2018-07-18 13:59:22', '::1', 'berhasil'),
(13, 'admin', '2018-07-18 14:21:12', '::1', 'berhasil'),
(14, 'admin', '2018-07-18 16:01:12', '::1', 'berhasil'),
(15, 'mal', '2018-07-18 16:45:04', '::1', 'berhasil'),
(16, 'admin', '2018-07-18 19:06:05', '::1', 'berhasil'),
(17, 'mal', '2018-07-18 19:06:57', '::1', 'berhasil'),
(18, 'admin', '2018-07-18 22:40:15', '::1', 'berhasil'),
(19, 'mal', '2018-07-18 22:41:43', '::1', 'berhasil'),
(20, 'user001', '2018-07-19 15:02:28', '::1', 'berhasil'),
(21, 'admin', '2018-07-19 15:13:31', '::1', 'berhasil'),
(22, 'admin', '2018-07-19 15:50:57', '::1', 'berhasil'),
(23, 'admin', '2018-07-19 15:51:03', '::1', 'berhasil'),
(24, 'mal', '2018-07-19 16:12:31', '::1', 'berhasil'),
(25, 'mal', '2018-07-19 16:46:48', '::1', 'berhasil'),
(26, 'wisnu', '2018-07-19 17:54:20', '::1', 'berhasil'),
(27, 'admin', '2018-07-19 18:01:08', '::1', 'berhasil'),
(28, 'wisnu', '2018-07-19 18:02:03', '::1', 'berhasil'),
(29, 'admin', '2018-07-19 18:05:14', '::1', 'berhasil'),
(30, 'mal', '2018-07-22 20:11:07', '::1', 'berhasil'),
(31, 'mal2', '2018-07-22 20:29:22', '::1', 'berhasil'),
(32, 'mal2', '2018-07-22 22:52:23', '::1', 'berhasil'),
(33, 'mal', '2018-07-23 23:49:35', '::1', 'berhasil');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `email`, `level`) VALUES
('admin', 'admin', 'admin@admin.com', 1),
('mal', 'mal', 'mal@mal.com', 4),
('mal2', 'mal', 'mal@mal.com', 4),
('user001', 'user001', 'user@gmaiil.com', 4),
('wisnu', '12345', 'wisnuwinz@gmail.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `kode_pembelian` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `metode_packing` varchar(20) NOT NULL,
  `metode_pengiriman` varchar(20) NOT NULL,
  `catatan_pembelian` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `tanggal_pembelian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `namalengkap` varchar(255) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`kode_pembelian`, `username`, `metode_packing`, `metode_pengiriman`, `catatan_pembelian`, `status`, `tanggal_pembelian`, `namalengkap`, `telepon`, `alamat`) VALUES
(3, 'mal', 'Kardus', 'Diantar', '', '', '2018-07-24 01:11:11', 'mal', '+622187704765', 'JALAN KELAPA DUA WETAN III NO 29'),
(4, 'mal', 'semen', 'Go Send', '', '', '2018-07-24 01:13:51', 'Mal', '+622187704765', 'JALAN KELAPA DUA WETAN III NO 29'),
(5, 'mal', 'Kardus', 'Diambil', '', '', '2018-07-24 01:16:33', 'Mal', '+622187704765', 'JALAN KELAPA DUA WETAN III NO 29');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `kode_pembelian_detail` int(11) NOT NULL,
  `kode_pembelian` int(11) NOT NULL,
  `jumlah_item_pembelian_detail` int(11) NOT NULL,
  `kode_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`kode_pembelian_detail`, `kode_pembelian`, `jumlah_item_pembelian_detail`, `kode_produk`) VALUES
(1, 3, 10, 1),
(2, 3, 10, 4),
(3, 4, 40, 5),
(4, 5, 100, 8);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kode_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `kode_kategory` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `satuan_produk` varchar(20) NOT NULL,
  `gambar_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode_produk`, `nama_produk`, `kode_kategory`, `harga_produk`, `deskripsi_produk`, `satuan_produk`, `gambar_produk`) VALUES
(1, 'Beras 20Kg Pandan Wangi', 'kat001', 240000, 'Beras asli cianjur', 'karung', 'beras-pandan-wangi.png'),
(2, 'Jas Jus Mangga', 'kat002', 40000, 'Minuman bubuk jas jus rasa mangga', 'renceng', 'jas-jus-mangga.jpg'),
(3, 'Kopi Kapal Api Saset', 'kat002', 35000, 'Minuman bubuk kopi kapal api', 'renceng', 'kopi-kapal-api.jpg'),
(4, 'Kuaci Saset Rebo', 'kat001', 78000, 'Makanan ringan kuaci', 'pak', 'kuaci-rebo.jpg'),
(5, 'Minyak Goreng Bimolo 1.5 liter', 'kat001', 90000, 'Minyak goreng jernih ', 'pak', 'minyak-goreng-bimoli.jpg'),
(6, 'Nutri Sari Jeruk Peras Saset', 'kat002', 43000, 'Minuman bubuk Nutri Sari rasa jeruk peras', 'roll', 'nutri-sari-jeruk-peras.jpg'),
(7, 'Pop Ice', 'kat002', 120000, 'Es krim batangan pop ice', 'pak', 'pop-ice.jpeg'),
(8, 'Sabun Dettol Batangan', 'kat003', 31500, 'Sabun Dettol batangan isi 10', 'pak', 'sabun-batangan-dettol.jpg'),
(9, 'Sabun Batangan Lifebuoy', 'kat003', 40000, 'Sabun batangan Lifebuoy isi 10', 'pak', 'sabun-batangan-lifebuoy.jpg'),
(10, 'Sabun Mandi Cair Dove 100ml', 'kat003', 400000, 'Sabun Badan Cair Dove 100ml', 'dus', 'sabun-mandi-cair-dove.jpg'),
(11, 'Sampo Head and Shoulders Saset', 'kat003', 61000, 'Sabun sasetan head and shoulders', 'renceng', 'sampo-saset-head-and-shoulders.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `kode_stok` int(11) NOT NULL,
  `kode_produk` int(11) NOT NULL,
  `jumlah_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`kode_stok`, `kode_produk`, `jumlah_stok`) VALUES
(1, 1, 100),
(2, 2, 300),
(3, 3, 250),
(4, 4, 400),
(5, 5, 125),
(6, 6, 180),
(7, 7, 700),
(8, 8, 325),
(9, 9, 113),
(10, 10, 44),
(11, 11, 555);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`kode_log`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`kode_pembelian`);

--
-- Indexes for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`kode_pembelian_detail`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`kode_stok`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `kode_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `kode_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `kode_pembelian_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `kode_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `kode_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

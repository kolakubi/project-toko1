-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2018 at 11:25 AM
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

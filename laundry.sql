-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2020 at 05:23 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` int(11) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `nama_bahan`, `tgl_pembelian`, `jumlah`, `harga`) VALUES
(2, 'Sabun', '2019-10-19', 10, 450000),
(3, 'Parfume', '2019-10-17', 5, 10000),
(4, 'Gas', '2019-11-20', 2, 75000),
(5, 'Gasoline', '2019-11-29', 2, 75000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembayaran`
--

INSERT INTO `detail_pembayaran` (`id_pembayaran`, `id_transaksi`, `total`, `tgl_bayar`) VALUES
(1, 1, 25000, '2019-12-04'),
(2, 2, 58000, '2019-12-03'),
(3, 3, 12000, '2019-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jnsbrg` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jnsbrg`, `nama_barang`, `harga`) VALUES
(1, 'Bed Cover Kecil', 10000),
(2, 'Bed Cover Sedang', 15000),
(3, 'Bed Cover Besar', 18000),
(4, 'Sprei Kecil', 10000),
(5, 'Sprei Sedang', 12000),
(6, 'Sprei Besar', 15000),
(7, 'Selimut Tipis', 10000),
(8, 'Selimut Sedang', 15000),
(9, 'Selimut Tebal', 18000),
(10, 'Tas Kecil', 10000),
(11, 'Tas Sedang', 15000),
(12, 'Tas Besar', 15000),
(13, '-', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan`
-- (See below for the actual view)
--
CREATE TABLE `laporan` (
`tgl_bayar` date
,`total` int(11)
,`tgl_pembelian` date
,`harga` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga`) VALUES
(1, 'Reguler (2 Hari)', 5000),
(2, 'Express (1 Hari)', 6000),
(4, 'Setrika (2 hari)', 3000),
(5, 'Cuci Kering (2 hari)', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `tgl_masuk`, `id_user`, `alamat`, `telepon`, `id_paket`, `status`) VALUES
(1, '2019-12-30', 14, 'Jl Perintis Kemerdekaan 33 C', '082323843848', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_nota` varchar(20) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `nama` varchar(250) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_jnsbrg` int(11) NOT NULL,
  `tgl_selesai` date NOT NULL,
  `total` int(11) NOT NULL,
  `pembayaran` varchar(15) NOT NULL,
  `status` varchar(50) NOT NULL,
  `Kg` int(11) NOT NULL,
  `sub_harga` int(11) NOT NULL,
  `sub_harga_jenis` int(11) DEFAULT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `feedback` int(11) NOT NULL DEFAULT '0',
  `tanggal` int(15) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_nota`, `username`, `nama`, `telepon`, `id_paket`, `id_jnsbrg`, `tgl_selesai`, `total`, `pembayaran`, `status`, `Kg`, `sub_harga`, `sub_harga_jenis`, `id_pesanan`, `feedback`, `tanggal`, `time`) VALUES
(1, '0412190001', 'member', 'Andre Kusuma Jakti', '082323843848', 1, 2, '2019-12-06', 25000, 'DIBAYAR', 'DIAMBIL', 2, 5000, 15000, NULL, 0, 1575428477, '2019-12-04 03:09:23'),
(2, '0412190002', '-', 'Haikal', '082323843848', 2, 1, '2019-12-05', 58000, 'DIBAYAR', 'DIAMBIL', 8, 6000, 10000, NULL, 0, 1575429460, '2019-12-04 03:17:44'),
(3, '2612190001', 'member', 'Andre Kusuma Jakti', '082323843848', 4, 13, '2019-12-28', 12000, 'DIBAYAR', 'DIAMBIL', 4, 3000, 0, 1, 0, 1577370995, '2019-12-26 14:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `telepon` varchar(14) NOT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `email`, `password`, `image`, `telepon`, `alamat`, `role_id`, `is_active`) VALUES
(11, 'admin', 'Admin', 'admin@gmail.com', '$2y$10$OIjKAGgLmbKbMOXAq2juLuHzEoYixsaStsDB5Yqq7KzULDptS.8l2', 'default.jpg', '0895341765157', 'Komplek Bumi Tabalong Damai Blok D7', 2, 1),
(12, 'owner', 'Owner', 'owner@gmail.com', '$2y$10$5nIaXqZ4XbJZIad/CDIi6u.nualD5pAoO5On2fJvyFw4YF5JizyfW', 'default.jpg', '089686255451', 'Jl Laksda Adisucipto 26', 1, 1),
(13, 'kurir', 'Kurir', 'kurir@gmail.com', '$2y$10$Ql4UC/xwgK1gQ5nh1HpSCOly7TBYW5u4ngqlxL25EfqLi93b71GBa', 'default.jpg', '085754993467', 'Jl Merpati 86 A Mancasan Lor Yogyakarta', 3, 1),
(14, 'member', 'Andre Kusuma Jakti', 'member@gmail.com', '$2y$10$CBp/4SViRyYlwsSCYZPtU.eekKrXgBZ03.EuV0lauTEjUmOKm7j6q', 'default.jpg', '082323843848', 'Jl Perintis Kemerdekaan 33 C', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(6, 2, 2),
(9, 3, 3),
(29, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Owner'),
(2, 'Admin'),
(3, 'Kurir'),
(4, 'Home');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'owner'),
(2, 'admin'),
(3, 'kurir'),
(4, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'owner', 'fa fa-home', 1),
(2, 1, 'Role & Menu Management', 'owner/rolemenu', 'fa fa-desktop', 1),
(4, 2, 'Dashboard', 'admin', 'fa fa-home', 1),
(5, 2, 'Transaksi', 'admin/transaksi', 'fa fa-dropbox', 1),
(6, 2, 'Pesanan', 'admin/pesanan', 'fa fa-motorcycle', 1),
(7, 1, 'Jenis Barang', 'owner/jenis', 'fa fa-tag', 1),
(9, 1, 'Paket', 'owner/paket', 'fa fa-archive', 1),
(10, 1, 'Pembelian Bahan', 'owner/bahan', 'fa fa-shopping-cart', 1),
(11, 3, 'Penjemputan', 'kurir/penjemputan', 'fa fa-arrow-down', 1),
(12, 3, 'Pengantaran', 'kurir/pengantaran', 'fa fa-arrow-up', 1),
(14, 1, 'Report', 'owner/report', 'fa fa-th-list', 1);

-- --------------------------------------------------------

--
-- Structure for view `laporan`
--
DROP TABLE IF EXISTS `laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan`  AS  select `a`.`tgl_bayar` AS `tgl_bayar`,`a`.`total` AS `total`,`b`.`tgl_pembelian` AS `tgl_pembelian`,`b`.`harga` AS `harga` from (`detail_pembayaran` `a` join `bahan` `b`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jnsbrg`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jnsbrg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

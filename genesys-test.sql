-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Nov 2021 pada 10.00
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genesys-test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akun`
--

CREATE TABLE `tb_akun` (
  `user_id` int(11) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_akun`
--

INSERT INTO `tb_akun` (`user_id`, `username`, `password`, `level`, `date_created`, `status`) VALUES
(1, 'iqbal', '$2a$12$UErU0y6G7P0A4XDyhg/rbOye45N4l8QywOkRTRWVa1qxIcO7NDBBq', 1, 1637914844, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buy`
--

CREATE TABLE `tb_buy` (
  `buy_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `jml_pembelian` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_inventory`
--

CREATE TABLE `tb_inventory` (
  `inventory_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sell`
--

CREATE TABLE `tb_sell` (
  `sell_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `jml_penjualan` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `jml_transaksi` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `jenis_transaksi` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `tb_buy`
--
ALTER TABLE `tb_buy`
  ADD PRIMARY KEY (`buy_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `inventory_id` (`inventory_id`);

--
-- Indeks untuk tabel `tb_inventory`
--
ALTER TABLE `tb_inventory`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indeks untuk tabel `tb_sell`
--
ALTER TABLE `tb_sell`
  ADD PRIMARY KEY (`sell_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `inventory_id` (`inventory_id`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `inventory_id` (`inventory_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_buy`
--
ALTER TABLE `tb_buy`
  MODIFY `buy_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_inventory`
--
ALTER TABLE `tb_inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_sell`
--
ALTER TABLE `tb_sell`
  MODIFY `sell_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_akun` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`inventory_id`) REFERENCES `tb_inventory` (`inventory_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

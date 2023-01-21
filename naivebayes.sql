-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 21 Jan 2023 pada 19.18
-- Versi server: 8.0.17
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naivebayes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `No` int(11) NOT NULL,
  `Kode_Gejala` varchar(50) NOT NULL,
  `Nama_Gejala` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`No`, `Kode_Gejala`, `Nama_Gejala`) VALUES
(1, 'G01', 'Dehidrasi'),
(2, 'G02', 'Sering Mual'),
(3, 'G03', 'Sering Sendawa'),
(4, 'G04', 'Rasa Terbakar di perut bagian atas'),
(5, 'G05', 'Berasa penuh di perut karena terlalu\r\nkenyang dan sebagainya'),
(6, 'G06', 'Penurunan Berat Badan'),
(7, 'G07', 'Nafsu makan berkurang'),
(8, 'G08', 'Sering Buang Air Besar'),
(9, 'G09', 'Sesak atau nyeri pada bagian ulu hati'),
(10, 'G10', 'Sulit untuk buang air besar'),
(11, 'G11', 'Tinja Berwarna gelap akibat terdapat darah\r\npada aktifitas usus'),
(12, 'G12', 'Muntah Darah'),
(13, 'G13', 'Muntah'),
(14, 'G14', 'Anemia'),
(15, 'G15', 'Nyeri pada perut bagian bawah'),
(16, 'G16', 'Demam'),
(17, 'G17', 'Nafsu makan berkurang'),
(18, 'G18', 'Nyeri pada perut bagian atas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id` int(11) NOT NULL,
  `jawab` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id`, `jawab`) VALUES
(1, 'Maag');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `No` int(11) NOT NULL,
  `Kode_Penyakit` varchar(50) NOT NULL,
  `Nama_Penyakit` varchar(50) NOT NULL,
  `Kode_Gejala` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`No`, `Kode_Penyakit`, `Nama_Penyakit`, `Kode_Gejala`) VALUES
(1, 'P01', 'Dispepsia', 'G02, G03, G04, G05, G06, G09, G13, G14'),
(2, 'P02', 'Maag', 'G02, G03, G04, G06 , G07, G09, G12, G13'),
(3, 'P03', 'Kanker Lambung', 'G01, G04, G08, G11'),
(4, 'P04', 'GERD', 'G01, G10, G15, G16'),
(5, 'P05', 'Gastritis', 'G10, G11, G17, G18');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`No`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`No`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

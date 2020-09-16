-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2020 pada 12.37
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelulusan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nisn` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `nisn`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(6, 'echizen riyooma', '12345678', 'Koala1.jpg', '$2y$10$8BpkUyEAHDyjdrNTYNJZ1eWJB7gO160MRJHPVVjZyLflANd8liwSa', 1, 1, 1584097734),
(7, 'echizen riyoma', '123456', 'coins.png', '$2y$10$/IDSfgrRlthdTPRUR/GNcuRBDv8NTp9.TAzSWkL.3F4dSEUZMkOuW', 2, 1, 1584101317),
(8, 'jajang', '1234567', 'default.jpg', '$2y$10$RonVG9g6xrGTXwwArnlvX.QJEUtEoUMjehHxYG7u7MqTvA777t4ei', 2, 1, 1585034470),
(9, 'akmalatif khalif', '12345679', 'default.jpg', '$2y$10$50LxjUvHNkZ4wpxQqt2wNeFiTlWJ0cWpIQJHccgxJDRnG.yR8fNim', 2, 1, 1585035154),
(10, 'yazid kurnia', '1234568', 'default.jpg', '$2y$10$vQvrzPAka0/m2O2OTUUmMOcb11twFh0e908e4FyEqKNaaMThQ/ewy', 2, 1, 1585067822),
(11, 'andriansyah', '12345677', 'default.jpg', '$2y$10$brUBNE8zibO.hOpa3kt22eBvxhcXMCsXbmGlEGBkGcYiEkbslmWG6', 2, 1, 1585360483),
(12, 'aaaaa', '12345671', 'default.jpg', '$2y$10$2PE8mJwFOVFcqhc0OfpsSuaggHh/q0l21OAPjIzGrZTVEicc5GeLG', 2, 1, 1585386183),
(13, 'reza', '1111111', 'default.jpg', '$2y$10$XsbRvXbjSfQqmVrvb6GHQ.UwSRQWEVpLq8i3irzy2.KNEdG8VkkGC', 2, 0, 1585574559);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

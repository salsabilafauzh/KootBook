-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2023 pada 13.59
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookmark`
--

CREATE TABLE `bookmark` (
  `ID_User` int(11) NOT NULL,
  `ID_Buku` int(11) NOT NULL,
  `Judul` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `ID_Buku` int(11) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Penulis` varchar(255) NOT NULL,
  `Penerbit` varchar(255) NOT NULL,
  `Tahun_Terbit` date NOT NULL,
  `Sinopsis` varchar(255) NOT NULL,
  `Stock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`ID_Buku`, `Judul`, `Penulis`, `Penerbit`, `Tahun_Terbit`, `Sinopsis`, `Stock`) VALUES
(2, 'Pengaruh Kpop pada remaja saat', 'Ilana', 'Anon', '2020-12-12', '  remaja merupakan blabalnadbaskjfhdsakfhksdhfkjdssnk     ', 5),
(4, 'Manfaat jambu pada ibu hamil', 'sadsda', 'sda', '0000-00-00', ' dsdasdsadsadas    ', 16),
(7, 'asasASA', 'Anon', 'Anon', '2020-12-11', ' dhjvfbjshdcksjhlcjdchkjsd ', 0),
(8, 'asasadasfrgrtg', 'fdgdfgfdgfd', 'gfdgfdgdf', '2020-12-12', ' fgfdgfdgfdgfd ', 0),
(9, 'difjgsdvkshdbvnsdv', 'sdgdfahgdjhkhf', 'Anon', '2020-12-10', ' sadsafdgdhgakjhsjdiaekfjeblfajf;ajsfljzcxc QEFHKJEDFJKBDKGHSDHGFKHDSJBFJD SBKVBDKA', 5),
(10, 'sdasfdafdsfd', 'Anon', 'caca', '2020-12-11', ' zdxscascas sadfs fsf  FSAF', 3),
(11, 'Pengaruh Permainan Angka', 'dsfsdgfdgdg', 'Anon', '2020-12-11', ' sfasfdsg dsgsdgsd  dsgfdsgdsg', 3),
(12, 'adagfkukjhjkhgkg', 'gghkgkg', 'hkghkghkgh', '2020-12-11', ' hgkhkgdhdthgkhgtkhgkgkgkg', 1),
(13, 'hkghkghkg', 'Anon', 'Anon', '2020-12-19', ' hjghjhasgdhjvshbfkdbkjf djfhdkshfjsbdfbhdsbfhsbdf', 2),
(14, 'asdfdakfgksbdkfbdskbfbsbfhdbfh', 'dfdsgfds', 'Anon', '2020-12-11', ' sfdaslkfhdhfhsdhf sd sjahdfiakshdjashkdas', 3),
(15, 'fadsfaksdjbfkjsbadkjfbcjdscjd', 'Anon', 'Anon', '2020-12-11', ' safdaljshcklabJSCBKJBSDJKV', 3),
(16, 'fgbdfbhgdefnfdb', 'dfngngns', 'ndnsdgnds', '2020-12-11', ' dndgnkjsbdkanlfkjsnjfndjnfsaldfbajskdbvkjsv', 6),
(17, 'djvsdbvkjnsdlkvlnsdvsd', 'dfsdvljknsnvjkdvdfv', 'dfdfsfdsfdfs', '2020-12-12', ' skjdbajsblkasbcldjslcnsdlbvkjasdbvkbdsjv', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `ID_User` int(11) NOT NULL,
  `ID_Buku` int(11) NOT NULL,
  `Judul` varchar(1000) NOT NULL,
  `Tanggal_Pinjam` date NOT NULL,
  `Tanggal_Expired` date NOT NULL,
  `Alasan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`ID_User`, `ID_Buku`, `Judul`, `Tanggal_Pinjam`, `Tanggal_Expired`, `Alasan`) VALUES
(10, 4, 'Manfaat jambu pada ibu hamil', '1970-01-01', '2023-08-06', ''),
(3, 4, 'Manfaat jambu pada ibu hamil', '2023-08-06', '1970-01-01', 'alasan apa kek'),
(5, 10, 'sdasfdafdsfd', '2023-08-06', '1970-01-01', 'alasan karena ingin mencoba saja'),
(5, 4, 'Manfaat jambu pada ibu hamil', '2023-08-06', '1970-01-01', 'mau coba lagi'),
(5, 4, 'Manfaat jambu pada ibu hamil', '2023-08-06', '1970-01-01', 'adasfdsgdf'),
(5, 4, 'Manfaat jambu pada ibu hamil', '2023-08-06', '1970-01-01', 'dsjgfhjsdfbkjgdbsfkvbafd'),
(5, 4, 'Manfaat jambu pada ibu hamil', '2023-08-06', '1970-01-01', 'apaaaaa'),
(5, 4, 'Manfaat jambu pada ibu hamil', '2023-08-06', '1970-01-01', 'sfsdgfdgbfd'),
(5, 17, 'djvsdbvkjnsdlkvlnsdvsd', '2023-08-06', '1970-01-01', 'Aku butuh uang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID_User` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_User`, `Username`, `Email`, `Password`, `Role`) VALUES
(3, 'Bima', 'bima.sukoco17@gmail.com', '12bima12', 'Admin'),
(5, 'salsa', 'test@gmail.com', 'test123', 'user'),
(6, 'caca', 'test2@gmail.com', 'test123', 'user'),
(7, 'huhaaa', 'test3@gmail.com', 'test123', 'user'),
(8, 'hamnur', 'test4@gmail.com', 'test123', 'user'),
(9, 'keshi', 'test5@gmail.com', 'test123', 'user'),
(10, 'jaehyun', 'test6@gmail.com', 'test123', 'user'),
(11, 'ilham', 'ilhamgame@gmail.com', 'test123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bookmark`
--
ALTER TABLE `bookmark`
  ADD KEY `ID Buku` (`ID_Buku`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ID_Buku`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD KEY `ID_User` (`ID_User`),
  ADD KEY `ID Buku` (`ID_Buku`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `ID_Buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bookmark`
--
ALTER TABLE `bookmark`
  ADD CONSTRAINT `bookmark_ibfk_1` FOREIGN KEY (`ID_Buku`) REFERENCES `buku` (`ID_Buku`),
  ADD CONSTRAINT `bookmark_ibfk_2` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`);

--
-- Ketidakleluasaan untuk tabel `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`ID_Buku`) REFERENCES `buku` (`ID_Buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

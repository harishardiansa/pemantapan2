-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2024 at 06:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemantapan2`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahun_terbit` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `deskripsi`, `stok`, `foto`) VALUES
(11, 12, 'Danur', 'Risa Saraswati', 'Bukune', '2011', 'Bercerita tentang persahabatan tokoh Risa seorang manusia dengan tokoh Peter, William, Hans, Hendrik, dan Janshen yang di dalam novel itu diceritakan sebagai hantu Belanda.', 10, 'h.jpg'),
(12, 5, '25 Rasul', 'Bagas', 'Wahyu', '2011', 'Menceritakan tentang 25 rasul allah swt, yang menyebarkan agama islam ', 10, '23.jpg'),
(13, 6, 'Naruto shippuden', 'Masashi Kimoto', 'Masashi Kimoto', '2000', 'Naruto Uzumaki, seorang ninja yang hiperaktif, periang, dan ambisius yang ingin mewujudkan keinginannya untuk mendapatkan gelar Hokage.', 10, 'n.jpg'),
(14, 13, 'Dilan', 'Pidi baiq', 'Pastel books', '2019', 'Novel ini menceritakan kisah cinta remaja antara Dilan, tokoh utama pria, dengan Milea, tokoh utama wanita. ', 10, 'di.jpg'),
(15, 8, 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', '2005', 'Buku ini menceritakan tentang perjuangan Bu Muslimah dan Pak Harfan berjuang untuk memajukan pendidikan di desa Gantong satu desa terpencil.', 10, 'las.jpg'),
(16, 1, 'Si Juki', 'Faza Meonk', 'Bukune', '2017', ' Kisah Si Juki yang melakukan perjalanan ke Labuan Bajo bersama seekor macan bernama Mang Awung untuk menyelesaikan sebuah misi rahasia.', 10, 'si.jpg'),
(17, 12, 'Kampung Jabang Mayit', 'Qwertyping', 'Qwertyping', '2022', 'Seorang dukun yang sering menumbalkan bayi yang baru lahir, demi mempersempunakan ilmu hitam nya', 10, 'ja.jpg'),
(19, 9, 'Kamus bahasa Korea', 'Chaerina Ayu', 'Chaerina Ayu', '2022', 'Buku yang mengajarkan kita bahasa korea dengan mudah', 10, '1.jpg'),
(20, 10, 'Pulang', ' Leila Salikha Chudori', 'Kepustakaan Populer Gramedia', '2012', 'Empat mantan wartawan yang menjadi buronan tentara', 10, '2.jpg'),
(21, 11, 'Tumbuhan', 'Tim GIP', 'Gema Insani', '2017', 'Mengenalkan kita tentang tumbuhan yang ada di dunia inii', 10, 'e.jpg'),
(22, 8, 'Keluaga Cemara', 'Arswendo Atmowiloto', 'Gramedia Pustaka Utama', '1999', 'kehidupan keluarga di Jakarta yang sebelumnya berkecukupan dan kemudian berubah ketika mereka mengalami masa sulit akibat paman yang meminjam sertifikat rumah milik Abah (Ringgo Agus Rahman) yang membuat Abah bangkrut.', 10, 'cemara.jpg'),
(23, 8, 'Filosofi Kopi', 'Dewi Lestari', 'Trudee Books & Gagas Media', '2006', 'Cerita tentang pencarian jiwa dan perjalanan berdamai dengan masa lalu melalui kopi. Ben dan Jody adalah sahabat yang membangun kedai \"Filosofi Kopi\"', 10, 'ko.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Komik'),
(5, 'Islami'),
(6, 'Manga'),
(8, 'Novel '),
(9, 'Kamus '),
(10, 'Sejarah'),
(11, 'Ensiklopedia'),
(12, 'Horror'),
(13, 'Romansa'),
(14, 'Fiksi');

-- --------------------------------------------------------

--
-- Table structure for table `koleksi_pribadi`
--

CREATE TABLE `koleksi_pribadi` (
  `id_koleksi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `koleksi_pribadi`
--

INSERT INTO `koleksi_pribadi` (`id_koleksi`, `id_user`, `id_buku`) VALUES
(31, 3, 14);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `tanggal_peminjaman` varchar(255) DEFAULT NULL,
  `tanggal_pengembalian` varchar(255) DEFAULT NULL,
  `status_peminjaman` enum('dipinjam','dikembalikan') DEFAULT NULL,
  `jumlah` int(50) DEFAULT NULL,
  `kode_pinjam` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_user`, `id_buku`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status_peminjaman`, `jumlah`, `kode_pinjam`) VALUES
(1, 3, 11, '24-02-18', '24-02-25', 'dikembalikan', 3, NULL),
(3, 3, 11, '24-02-18', '24-02-25', 'dikembalikan', 1, NULL),
(6, 3, 12, '24-02-20', '24-02-27', 'dikembalikan', 1, NULL),
(9, 3, 13, '24-02-22', '24-02-29', 'dikembalikan', 1, NULL),
(10, 3, 12, '24-02-24', '24-03-02', 'dikembalikan', 1, NULL),
(11, 3, 17, '24-02-24', '24-03-02', 'dikembalikan', 1, NULL);

--
-- Triggers `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `pengembalian` AFTER UPDATE ON `peminjaman` FOR EACH ROW BEGIN
UPDATE buku SET stok=stok+old.jumlah
WHERE id_buku=old.id_buku;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pinjam` AFTER INSERT ON `peminjaman` FOR EACH ROW BEGIN 
UPDATE buku SET stok=stok-new.jumlah
WHERE id_buku=new.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `ulasan` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `level` enum('admin','petugas','peminjam') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`, `alamat`, `no_telp`, `level`) VALUES
(1, 'administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'batujajar', '0895703066975', 'admin'),
(2, 'petugas', 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'petugas@gmail.com', 'batujajar', '089567321921', 'petugas'),
(3, 'peminjam', 'peminjam', '55f3894bc5fc71fead8412d321c2952c', 'peminjam@gmail.com', 'cangkorah', '08967122341', 'peminjam'),
(6, 'Haris Hardiansah', 'Haris', '73542c20b82d945d8731852d755de9dd', 'harishardiansah05@gmail.com', 'cangkorah', '0895703066975', 'peminjam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `fk_id_kategori_buku` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  ADD PRIMARY KEY (`id_koleksi`),
  ADD KEY `fk_id_user_koleksi_pribadi` (`id_user`),
  ADD KEY `fk_id_buku_koleksi_pribadi` (`id_buku`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `fk_id_user_peminjaman` (`id_user`),
  ADD KEY `fk_id_buku_buku` (`id_buku`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `fk_id_user_user` (`id_user`),
  ADD KEY `fk_id_buku_ulasan` (`id_buku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  MODIFY `id_koleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_id_kategori_buku` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE;

--
-- Constraints for table `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  ADD CONSTRAINT `fk_id_buku_koleksi_pribadi` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_user_koleksi_pribadi` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_id_buku_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_user_peminjaman` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `fk_id_buku_ulasan` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_user_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

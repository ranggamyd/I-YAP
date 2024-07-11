-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 05:53 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp_itik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `analisa_krit`
--

CREATE TABLE `analisa_krit` (
  `id_penyakit` int(11) NOT NULL,
  `kriteria_x` varchar(2) NOT NULL,
  `nilai_krit` float NOT NULL,
  `hasil_analis` double NOT NULL,
  `kriteria_y` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisa_krit`
--

INSERT INTO `analisa_krit` (`id_penyakit`, `kriteria_x`, `nilai_krit`, `hasil_analis`, `kriteria_y`) VALUES
(1, '1', 1, 0, '1'),
(1, '1', 1, 0, '2'),
(1, '1', 2, 0, '3'),
(1, '1', 3, 0, '4'),
(1, '1', 5, 0, '5'),
(1, '1', 6, 0, '6'),
(1, '2', 1, 0, '1'),
(1, '2', 1, 0, '2'),
(1, '2', 7, 0, '3'),
(1, '2', 8, 0, '4'),
(1, '2', 9, 0, '5'),
(1, '2', 5, 0, '6'),
(1, '3', 0.5, 0, '1'),
(1, '3', 0.142857, 0, '2'),
(1, '3', 1, 0, '3'),
(1, '3', 1, 0, '4'),
(1, '3', 1, 0, '5'),
(1, '3', 6, 0, '6'),
(1, '4', 0.333333, 0, '1'),
(1, '4', 0.125, 0, '2'),
(1, '4', 1, 0, '3'),
(1, '4', 1, 0, '4'),
(1, '4', 1, 0, '5'),
(1, '4', 2, 0, '6'),
(1, '5', 0.2, 0, '1'),
(1, '5', 0.111111, 0, '2'),
(1, '5', 1, 0, '3'),
(1, '5', 1, 0, '4'),
(1, '5', 1, 0, '5'),
(1, '5', 2, 0, '6'),
(1, '6', 0.166667, 0, '1'),
(1, '6', 0.2, 0, '2'),
(1, '6', 0.166667, 0, '3'),
(1, '6', 0.5, 0, '4'),
(1, '6', 0.5, 0, '5'),
(1, '6', 1, 0, '6');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode_gejala` varchar(10) NOT NULL,
  `nama_gejala` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `kode_gejala`, `nama_gejala`) VALUES
(1, 'G01', 'Unggas terlihat mengantuk dan sayap turun'),
(2, 'G02', 'Keluar lendir dari hidung, kental berwarna kekuningan dan berbau'),
(3, 'G03', 'Muka dan mata bengkak akibat pembengkakan sinus infra orbital'),
(4, 'G04', 'Terdapat kerak hidung'),
(5, 'G05', 'Napsu makan menurun sehingga tembolok kosong jika di raba'),
(6, 'G06', 'Mengorok dan sukar bernapas'),
(7, 'G07', 'Kotoran encer dan bercampur butiran-butiran putih seperti kapur'),
(8, 'G08', 'Bulu dubur melekat satu dengan yang lain'),
(9, 'G09', 'Sayap berwarna keabuan anak unggas menjadi menunduk'),
(10, 'G10', 'Sayap terkulai'),
(11, 'G11', 'Sulit bernapas'),
(12, 'G12', 'Berak mengalami mencret'),
(13, 'G13', 'Kotoran berwarna kuning, coklat atau hijau berlendir dan berbau busuk'),
(14, 'G14', 'Sayap dan pial bengkak serta kepala berwarna kebiruan'),
(15, 'G15', 'Sering menggeleng-gelengkan kepala'),
(16, 'G16', 'Kaki dan sayap bengkak disertai kelumpuhan'),
(17, 'G17', 'Kotoran itik encer bewarna hijau keputihan'),
(18, 'G18', 'Warna bulu terlihat kusam'),
(19, 'G19', 'Batuk batuk, terutama pada malam hari'),
(20, 'G20', 'Keluar cairan terus dari hidung'),
(21, 'G21', 'Pendarahan titik (plechie) pada daerah dada, kaki dan telapak kaki'),
(22, 'G22', 'Produksi telur menurun'),
(23, 'G23', 'Kematian mendadak dalam jumlah banyak');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(15) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `gejala` varchar(250) NOT NULL,
  `penyakit` varchar(250) NOT NULL,
  `hasil_id` int(11) NOT NULL,
  `hasil_nilai` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `kode_kondisi` varchar(20) NOT NULL,
  `nama_kondisi` varchar(100) NOT NULL,
  `nilai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id_kondisi`, `kode_kondisi`, `nama_kondisi`, `nilai`) VALUES
(1, 'K01', 'Sangat Yakin', '1.0'),
(2, 'K02', 'Yakin', '0.8'),
(3, 'K03', 'Cukup Yakin', '0.6'),
(4, 'K04', 'Sedikit Yakin', '0.4'),
(5, 'K05', 'Tidak Tahu', '0.2'),
(10, 'K06', 'Tidak', '0');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `jum_nilai` double NOT NULL,
  `ket_nilai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `jum_nilai`, `ket_nilai`) VALUES
(2, 9, 'Mutlak sangat penting dari'),
(3, 8, 'Mendekati mutlak dari'),
(8, 7, 'Sangat penting dari'),
(9, 6, 'Mendekati sangat penting dari'),
(10, 5, 'Lebih penting dari'),
(11, 4, 'Mendekati lebih penting dari'),
(12, 3, 'Sedikit lebih penting dari'),
(13, 2, 'Mendekati sedikit lebih penting dari'),
(14, 1, 'Sama penting dengan');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `umur` varchar(50) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `kode_penyakit` varchar(10) NOT NULL,
  `nama_penyakit` varchar(100) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `kode_penyakit`, `nama_penyakit`, `solusi`) VALUES
(1, 'P01', 'Pilek (Snot/Coryza)', 'Diobati dengan Streptomycin, Dihydrostreptomycin, Sulphonamides, Tylosin, Erythromycin, Flouroquinolones.\r\n'),
(2, 'P02', 'Berak Kapur atau Pullorum', 'Menyuntikkan antibiotik seperti furozolidon, coccilin, neo terramycin, tetra atau mycomas di dada itik. Melakukan desinfeksi pada kandang dengan formaldehyde 40%.\r\n'),
(3, 'P03', 'Kolera', 'Diobati menggunakan preparat sulfat atau antibiotik seperti noxal, ampisol atau inequil. Menjaga kebersihan peralatan kandang. Memberikan vitamin dan pakan yang cukup agar stamina itik tetap terjaga.\r\n'),
(4, 'P04', 'Salmonellosis', 'Segera pisahkan itik yang terinfeksi, berikan antibiotik sesuai anjuran dokter hewan, jaga kebersihan kandang, dan berikan vitamin serta elektrolit.\r\n'),
(5, 'P05', 'Ngorok', 'Isolasi itik yang sakit, berikan antibiotik yang tepat, pastikan ventilasi kandang baik, sediakan penghangat di malam hari, dan pastikan nutrisi serta air minum yang cukup.\r\n'),
(6, 'P06', 'Avian Influenza', 'Isolasi ketat, depopulasi jika perlu, disinfeksi kandang dan peralatan, tingkatkan biosekuriti, laporkan kasus ke otoritas veteriner, dan lakukan vaksinasi jika tersedia.');

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `id_rule` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `cf_pakar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`id_rule`, `id_penyakit`, `id_gejala`, `cf_pakar`) VALUES
(1, 1, 1, 0),
(2, 1, 2, 0),
(3, 1, 3, 0),
(4, 1, 4, 0),
(5, 1, 5, 0),
(6, 1, 6, 0),
(7, 2, 5, 0),
(8, 2, 7, 0),
(9, 2, 8, 0),
(10, 2, 9, 0),
(11, 2, 10, 0),
(12, 3, 5, 0),
(13, 3, 11, 0),
(14, 3, 12, 0),
(15, 3, 13, 0),
(16, 3, 14, 0),
(17, 3, 15, 0),
(18, 3, 16, 0),
(19, 4, 10, 0),
(20, 4, 11, 0),
(21, 4, 17, 0),
(22, 4, 18, 0),
(23, 5, 6, 0),
(24, 5, 15, 0),
(25, 5, 19, 0),
(26, 5, 20, 0),
(27, 6, 21, 0),
(28, 6, 22, 0),
(29, 6, 23, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `analisa_krit`
--
ALTER TABLE `analisa_krit`
  ADD KEY `id_penyakit` (`id_penyakit`),
  ADD KEY `kriteria_x` (`kriteria_x`);
ALTER TABLE `analisa_krit` ADD FULLTEXT KEY `kriteria_x_2` (`kriteria_x`);
ALTER TABLE `analisa_krit` ADD FULLTEXT KEY `kriteria_x_3` (`kriteria_x`,`kriteria_y`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id_rule`),
  ADD KEY `id_penyakit` (`id_penyakit`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

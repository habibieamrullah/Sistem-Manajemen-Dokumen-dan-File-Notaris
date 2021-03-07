-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2019 at 04:32 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_file`
--

-- --------------------------------------------------------

--
-- Table structure for table `dok_kerja`
--

CREATE TABLE `dok_kerja` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dok_kerja`
--

INSERT INTO `dok_kerja` (`id`, `id_user`, `nama_file`, `date_upload`, `date_edit`, `jam_upload`, `jam_edit`, `file_upload`) VALUES
(28, 15, 'Dokumen Kerja Saya 1', '2019-10-12', '0000-00-00', '21:22:50', '00:00:00', 'Welcome_to_Word1.docx'),
(29, 15, 'Dokumen Kerja Saya 2', '2019-10-12', '0000-00-00', '21:23:26', '00:00:00', 'Welcome_to_Word_(2).docx');

-- --------------------------------------------------------

--
-- Table structure for table `dok_pribadi`
--

CREATE TABLE `dok_pribadi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `nomor_akta` text NOT NULL,
  `unid` text NOT NULL,
  `keterangan` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dok_pribadi`
--

INSERT INTO `dok_pribadi` (`id`, `id_user`, `nama_file`, `date_upload`, `date_edit`, `jam_upload`, `jam_edit`, `file_upload`) VALUES
(27, 15, 'Coba Upload File 2', '2019-10-12', '2019-10-12', '21:24:04', '21:24:41', 'Welcome_to_Word_(2).docx'),
(28, 15, 'Dokumen Kerja Saya 1', '2019-10-12', '0000-00-00', '21:24:14', '00:00:00', 'Welcome_to_Word.docx');

-- --------------------------------------------------------

--
-- Table structure for table `lap_bulanan`
--

CREATE TABLE `lap_bulanan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `nomor_akta` text NOT NULL,
  `unid` text NOT NULL,
  `keterangan` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lap_bulanan`
--

INSERT INTO `lap_bulanan` (`id`, `id_user`, `nama_file`, `date_upload`, `date_edit`, `jam_upload`, `jam_edit`, `file_upload`) VALUES
(24, 15, 'Laporan Bulanan', '2019-10-12', '0000-00-00', '21:20:08', '00:00:00', 'Welcome_to_Word_(1).docx'),
(25, 15, 'Laporan Bulanan 2 - edit', '2019-10-12', '2019-10-12', '21:20:27', '21:21:21', 'Welcome_to_Word_(1)1.docx');

-- --------------------------------------------------------

--
-- Table structure for table `lap_harian`
--

CREATE TABLE `lap_harian` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `nomor_akta` text NOT NULL,
  `unid` text NOT NULL,
  `keterangan` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lap_harian`
--

INSERT INTO `lap_harian` (`id`, `id_user`, `nama_file`, `date_upload`, `date_edit`, `jam_upload`, `jam_edit`, `file_upload`) VALUES
(26, 15, 'Upload laporan harian 1 - edit', '2019-10-12', '2019-10-12', '21:17:37', '21:18:19', 'Welcome_to_Word_(2).docx');

-- --------------------------------------------------------

--
-- Table structure for table `lap_lain`
--

CREATE TABLE `lap_lain` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `nomor_akta` text NOT NULL,
  `unid` text NOT NULL,
  `keterangan` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lap_tahunan`
--

CREATE TABLE `lap_tahunan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `nomor_akta` text NOT NULL,
  `unid` text NOT NULL,
  `keterangan` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lap_tahunan`
--

INSERT INTO `lap_tahunan` (`id`, `id_user`, `nama_file`, `date_upload`, `date_edit`, `jam_upload`, `jam_edit`, `file_upload`) VALUES
(22, 15, 'Laporan Tahunan', '2019-10-12', '0000-00-00', '21:21:46', '00:00:00', 'Welcome_to_Word_(1).docx'),
(23, 15, 'laporan tahun 2', '2019-10-12', '0000-00-00', '21:22:04', '00:00:00', 'Welcome_to_Word_(1)1.docx'),
(24, 15, 'TOT 20 Maret 2019', '2019-10-12', '0000-00-00', '21:22:26', '00:00:00', 'Welcome_to_Word_(2).docx');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE `mst_user` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `is_active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`id`, `nama`, `username`, `password`, `image`, `role_id`, `date_created`, `is_active`) VALUES
(9, 'DONNY KURNIAWAN', 'admin', '$2y$10$uhx1qHfUw1s.RlhrSqfgku51cLjRZUL56ogKPKyhcFIhhcBYlSYMm', 'avatar04.png', 1, '2019-08-06', 1),
(15, 'Adonia Vincent Natanael', 'user', '$2y$10$Nku6Q8QLo5ylTTt9Y/yexe5olpEmJre5Tec1Sc53V6woKKH7YdWne', 'avatar4.png', 2, '2019-10-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `scan_pendukung`
--

CREATE TABLE `scan_pendukung` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scan_pendukung`
--

INSERT INTO `scan_pendukung` (`id`, `id_user`, `nama_file`, `date_upload`, `date_edit`, `jam_upload`, `jam_edit`, `file_upload`) VALUES
(26, 15, 'berkas 1', '2019-10-12', '0000-00-00', '21:26:44', '00:00:00', 'avatar2.png'),
(27, 15, 'berkas 2', '2019-10-12', '0000-00-00', '21:26:59', '00:00:00', 'adonia_(2).png');

-- --------------------------------------------------------

--
-- Table structure for table `scan_utama`
--

CREATE TABLE `scan_utama` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scan_utama`
--

INSERT INTO `scan_utama` (`id`, `id_user`, `nama_file`, `date_upload`, `date_edit`, `jam_upload`, `jam_edit`, `file_upload`) VALUES
(28, 15, 'foto 1', '2019-10-12', '0000-00-00', '21:25:15', '00:00:00', 'photo4_(1).jpg'),
(29, 15, 'foto 2', '2019-10-12', '2019-10-12', '21:25:29', '21:25:57', 'photo3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dok_kerja`
--
ALTER TABLE `dok_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dok_pribadi`
--
ALTER TABLE `dok_pribadi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lap_bulanan`
--
ALTER TABLE `lap_bulanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lap_harian`
--
ALTER TABLE `lap_harian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lap_lain`
--
ALTER TABLE `lap_lain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lap_tahunan`
--
ALTER TABLE `lap_tahunan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scan_pendukung`
--
ALTER TABLE `scan_pendukung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scan_utama`
--
ALTER TABLE `scan_utama`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dok_kerja`
--
ALTER TABLE `dok_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `dok_pribadi`
--
ALTER TABLE `dok_pribadi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `lap_bulanan`
--
ALTER TABLE `lap_bulanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `lap_harian`
--
ALTER TABLE `lap_harian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `lap_lain`
--
ALTER TABLE `lap_lain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `lap_tahunan`
--
ALTER TABLE `lap_tahunan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `scan_pendukung`
--
ALTER TABLE `scan_pendukung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `scan_utama`
--
ALTER TABLE `scan_utama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

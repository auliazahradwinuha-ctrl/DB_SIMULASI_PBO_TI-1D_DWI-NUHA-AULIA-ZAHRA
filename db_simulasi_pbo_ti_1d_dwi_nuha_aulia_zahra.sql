-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2026 at 06:47 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_ti_1d_dwi_nuha_aulia_zahra`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(100) DEFAULT NULL,
  `lokasi_kampus` varchar(100) DEFAULT NULL,
  `jenis_prestasi` varchar(100) DEFAULT NULL,
  `tingkat_prestasi` varchar(50) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Ahmad Fauzi', 'SMAN 1 Jakarta', 85.50, 250000.00, 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Budi Santoso', 'SMAN 3 Bandung', 78.25, 250000.00, 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Citra Lestari', 'SMAN 2 Surabaya', 90.00, 250000.00, 'Reguler', 'Ilmu Komunikasi', 'Kampus B', NULL, NULL, NULL, NULL),
(4, 'Dedi Wijaya', 'SMKN 1 Yogyakarta', 82.10, 250000.00, 'Reguler', 'Teknik Elektro', 'Kampus Utama', NULL, NULL, NULL, NULL),
(5, 'Eka Putri', 'SMAN 5 Semarang', 88.40, 250000.00, 'Reguler', 'Akuntansi', 'Kampus B', NULL, NULL, NULL, NULL),
(6, 'Fajar Ramadhan', 'SMAN 1 Medan', 79.90, 250000.00, 'Reguler', 'Manajemen', 'Kampus B', NULL, NULL, NULL, NULL),
(7, 'Gita Permata', 'SMAN 8 Denpasar', 84.75, 250000.00, 'Reguler', 'Psikologi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(8, 'Hendra Wijaya', 'SMAN 3 Manokwari', 92.00, 150000.00, 'Prestasi', 'Teknik Informatika', 'Kampus Utama', 'Olimpiade Matematika', 'Nasional', NULL, NULL),
(9, 'Indah Cahyani', 'SMAN 1 Solo', 91.50, 150000.00, 'Prestasi', 'Kedokteran', 'Kampus Utama', 'Futsal Putri', 'Provinsi', NULL, NULL),
(10, 'Joko Tarub', 'SMAN 2 Malang', 89.00, 150000.00, 'Prestasi', 'Hukum', 'Kampus B', 'Karya Ilmiah Remaja', 'Nasional', NULL, NULL),
(11, 'Kartika Sari', 'SMAN 4 Balikpapan', 95.30, 150000.00, 'Prestasi', 'Sistem Informasi', 'Kampus Utama', 'Debat Bahasa Inggris', 'Internasional', NULL, NULL),
(12, 'Laksana Tri', 'SMKN 26 Jakarta', 87.80, 150000.00, 'Prestasi', 'Teknik Mesin', 'Kampus Utama', 'Lomba Kompetensi Siswa', 'Nasional', NULL, NULL),
(13, 'Mega Utami', 'SMAN 1 Makassar', 90.10, 150000.00, 'Prestasi', 'Farmasi', 'Kampus B', 'Pena Bulutangkis', 'Provinsi', NULL, NULL),
(14, 'Naufal Abdi', 'SMAN 1 Garut', 86.00, 350000.00, 'Kedinasan', 'Statistika', 'Kampus Utama', NULL, NULL, 'SK-990/BPS/2026', 'Badan Pusat Statistik'),
(15, 'Oki Setiawan', 'SMAN 6 Palembang', 83.45, 350000.00, 'Kedinasan', 'Akuntansi Sektor Publik', 'Kampus B', NULL, NULL, 'SK-112/KEMENKEU/2026', 'Kementerian Keuangan'),
(16, 'Putri Ayu', 'SMAN 1 Padang', 88.20, 350000.00, 'Kedinasan', 'Studi Demografi', 'Kampus Utama', NULL, NULL, 'SK-455/BKKBN/2026', 'BKKBN'),
(17, 'Qomaruddin', 'SMAN 2 Pontianak', 81.15, 350000.00, 'Kedinasan', 'Manajemen Transportasi', 'Kampus B', NULL, NULL, 'SK-882/KEMENHUB/2026', 'Kementerian Perhubungan'),
(18, 'Rina Marlina', 'SMAN 1 Bogor', 89.60, 350000.00, 'Kedinasan', 'Teknik Telekomunikasi', 'Kampus Utama', NULL, NULL, 'SK-204/KOMINFO/2026', 'Kementerian Kominfo'),
(19, 'Rizky Billar', 'SMAN 3 Cimahi', 84.00, 350000.00, 'Kedinasan', 'Administrasi Pemerintahan', 'Kampus B', NULL, NULL, 'SK-301/KEMENDAGRI/2026', 'Kementerian Dalam Negeri'),
(20, 'Siti Aminah', 'SMAN 10 Samarinda', 87.35, 350000.00, 'Kedinasan', 'Sistem Informasi Siber', 'Kampus Utama', NULL, NULL, 'SK-771/BSSN/2026', 'Badan Siber dan Sandi Negara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

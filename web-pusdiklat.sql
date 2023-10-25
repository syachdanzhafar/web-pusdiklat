-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 07:28 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-pusdiklat`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivasi`
--

CREATE TABLE `aktivasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(60) NOT NULL,
  `universitas` varchar(70) NOT NULL,
  `fakultas` varchar(70) NOT NULL,
  `token` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aktivasi`
--

INSERT INTO `aktivasi` (`id`, `nama`, `email`, `password`, `universitas`, `fakultas`, `token`) VALUES
(10, 'Aris Setyawan', 'aris.setyawan354313@gmail.com', '$2y$10$Vb2ZYfWgb7CVlHGuq9ilh.t5GnrVLUPJvDpLefvruuPRsySZ33lqS', 'Pusdiklat', 'Admin Pusat', 'XKlA1ASENUvUSu0SncCDaZzlPZ1EGS+YxaA/Ap90KdA='),
(11, 'Aris Setyawan', 'aris.setyawan354313@gmail.com', '$2y$10$5bReRltlU3ljLcfu45jBCOATne2wefOBr1WUPxEq8kYUccwhzipuO', 'Pusdiklat', 'Admin Pusat', 'sz3UjlfrnJiLzhUpwJsA1qy5DlxDrr0L6x0zu8T1FWY=');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(5) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role_id` int(11) NOT NULL,
  `id_unit_kerja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `role_id`, `id_unit_kerja`) VALUES
(1, 'Rina_Wahyuni@pusdiklat.com', 'rina123', 1, 15),
(2, 'PUSDIKLAT@pusdiklat.com', 'pusdiklat', 2, 1),
(4, 'sleepyweppy@gmail.com', '$2y$10$DdBChV.YU3FTnxPkB79i5.8BE0Vd8IuvHCAK.lpJLn8mJG6OMlT.q', 3, 1),
(7, 'muhammadrizkyardiansah93@gmail.com', '$2y$10$nW05HXtM1qi4tiUnHZz6l.Hn/9Axhu8.r72.l4.cm3xnhRXPz8Pa.', 3, 2),
(12, 'aris.cemumut@gmail.com', '$2y$10$iyfHzFi2BWMJLLA2xeGCNeGZVQ/dzLB2TRNIjhLxJBvbBYrA7RVvO', 2, 1),
(13, 'ariss@upnvj.ac.id', '$2y$10$2DaeegN8jbjjb72MiSuB1.2oEjgXBD0Paq6yMkwQl/dEz7FbAZspm', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

CREATE TABLE `pelamar` (
  `id` int(11) NOT NULL,
  `nama_pelamar` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `universitas` varchar(70) NOT NULL,
  `fakultas` varchar(70) NOT NULL,
  `prodi` varchar(70) DEFAULT NULL,
  `nim` varchar(30) DEFAULT NULL,
  `semester` int(2) DEFAULT NULL,
  `no_telpon` varchar(15) DEFAULT NULL,
  `nama_file_khs` varchar(100) DEFAULT NULL,
  `nama_file_cv` varchar(100) DEFAULT NULL,
  `foto_profil` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`id`, `nama_pelamar`, `email`, `universitas`, `fakultas`, `prodi`, `nim`, `semester`, `no_telpon`, `nama_file_khs`, `nama_file_cv`, `foto_profil`) VALUES
(1, 'Muhammad Rizky', 'sleepyweppy@gmail.com', 'Universitas Yarsi', 'Teknologi Informasi', NULL, NULL, NULL, NULL, NULL, NULL, 'default.jpg'),
(5, 'Muhammad Rizky Ardiansah', 'muhammadrizkyardiansah93@gmail.com', 'Universitas Yarsi', 'Teknologi Informasi', 'Teknik Informatika', '1402018149', 6, '085972875509', 'Pelamar_KHS_1629192040.pdf', 'Pelamar_CV_1629192074.pdf', 'default.jpg'),
(8, 'Aris Setyawan', 'aris.setyawan@gmail.com', 'UPN Veteran Jakarta', 'Ilmu Komputer', 'Sistem Informasi', '1810512022', 6, '0895340442948', 'Contoh KHS.pdf', 'Contoh CV.pdf', 'default.jpg'),
(9, 'Albert Lim', 'albert.lim@gmail.com', 'UPN Veteran Jakarta', 'Ilmu Komputer', 'Sistem Informasi', '1810512021', 6, '08123457438', 'Contoh KHS Albert.pdf', 'Contoh CV Albert.pdf', 'default.jpg'),
(10, 'Nurul Aini', 'nurula@gmail.com', 'UPN Veteran Jakarta', 'Ilmu Komputer', 'Sistem Informasi', '1810512028', 6, '0812341223', 'Contoh KHS Nurul.pdf', 'Contoh CV Nurul.pdf', 'default.jpg'),
(11, 'Yuli Febyola', 'yuli.f@gmail.com', 'UPN Veteran Jakarta', 'Ilmu Komputer', 'Sistem Informasi', '1810512038', 6, '08123432421', 'Contoh KHS Feby.pdf', 'Contoh CV Feby.pdf', 'default.jpg'),
(12, 'Mastono Aji', 'masaji@gmail.com', 'Universitas Ageng Tirtayasa', 'Teknik', 'Teknik Industri', '18002832123', 6, '089544221123', 'Contoh KHS Aji.pdf', 'Contoh CV Aji.pdf', 'default.jpg'),
(13, 'Rania Ramadhina', 'raniarans@gmail.com', 'UPN Veteran Jakarta', 'Ilmu Komputer', 'informatika', '18002376712', 6, '0896656121', 'Contoh KHS Rania.pdf', 'Contoh CV Rania.pdf', 'default.jpg'),
(14, 'Idham', 'idham@gmail.com', 'Universitas Ageng Tirtayasa', 'Teknik', 'Teknik Elektro', '18106123372', 6, '0812377239342', 'Contoh KHS Idham.pdf', 'Contoh CV Idham.pdf', 'default.jpg'),
(15, 'Gilang Akbar P', 'gilangakbar@gmail.com', 'UPN Veteran Jakarta', 'Ilmu Komputer', 'Informatika', '1810601239', 6, '08924447771', 'Contoh KHS Gilang.pdf', 'Contoh CV Gilang.pdf', 'default.jpg'),
(16, 'Dani Ali Cahyono', 'danialicah@gmail.com', 'UPN Veteran Jakarta', 'Ilmu Komputer', 'Sistem Informasi', '1806615528', 6, '08921374324', 'Contoh KHS Dani.pdf', 'Contoh CV Dani.pdf', 'default.jpg'),
(17, 'Aji Suryana', 'ajisuryani@gmail.com', 'UPN Veteran Jakarta', 'Ilmu Komputer', 'Informatika', '18980982391', 6, '089932546213', 'Contoh KHS Surnaya.pdf', 'Contoh CV Surnaya.pdf', 'default.jpg'),
(18, 'Aldi Ramadhan', 'aldi@upnvj.ac.id', 'UPN Veteran Jakarta', 'Ilmu Komputer', 'Sistem informasi', '181066299123', 6, '08993277123', 'Contoh KHS Aldi.pdf', 'Contoh CV Aldi.pdf', 'default.jpg'),
(19, 'Rio Pratamtam', 'pratamtam@gmail.com', 'UPN veteran Jakarta', 'Ilmu Komputer', 'Informatika', '18977239983', 6, '08994367612', 'Contoh KHS Rio.pdf', 'Contoh CV Rio.pdf', 'default.jpg'),
(20, 'Gladis Federica', 'gladis.f@gmail.com', 'Universitas Gadjah Mada', 'Ilmu Sosial dan Politik', 'Ilmu Politik', '8831877821', 6, '08991328671', 'KHS Gladis.pdf', 'CV Gladis.pdf', 'default.jpg'),
(21, 'Budi Sujatmiko', 'budidudedo@gmail.com', 'Universitas Indonesia', 'Hukum', 'Hukum Internasional', '88675671293', 6, '08983176321', 'budi KHS.pdf', 'budi CV.pdf', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Administrator Pusat'),
(2, 'Administrator Unit Kerja'),
(3, 'Pelamar');

-- --------------------------------------------------------

--
-- Table structure for table `surat_balasan`
--

CREATE TABLE `surat_balasan` (
  `id_surat_balasan` int(11) NOT NULL,
  `id_surat_permohonan` int(11) NOT NULL,
  `tgl_surat` date NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `no_surat_balasan` varchar(50) NOT NULL,
  `nama_surat_balasan` varchar(50) DEFAULT NULL,
  `lampiran` varchar(50) NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `alasan` text NOT NULL,
  `jangka_waktu` varchar(50) DEFAULT NULL,
  `tembusan1` text NOT NULL,
  `tembusan2` text NOT NULL,
  `tembusan3` text NOT NULL,
  `tembusan4` text NOT NULL,
  `tembusan5` text NOT NULL,
  `is_uploaded` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_balasan`
--

INSERT INTO `surat_balasan` (`id_surat_balasan`, `id_surat_permohonan`, `tgl_surat`, `perihal`, `no_surat_balasan`, `nama_surat_balasan`, `lampiran`, `kepada`, `alasan`, `jangka_waktu`, `tembusan1`, `tembusan2`, `tembusan3`, `tembusan4`, `tembusan5`, `is_uploaded`) VALUES
(8, 11, '2021-08-19', 'Balasan Magang', '001/11/2021', NULL, '1', '', ' Kegiatan magang dilaksanakan dengan tujuan untuk memenuhi persyaratan akademik perkuliahan dan dilaksanakan dengan tetap memperhatikan protokol Kesehatan (Memakai masker & Wajib membawa hasil tes, minimal swab antigen/ genose). ', NULL, 'Kepala Perpustakan Nasional RI', 'Sekretaris Utama Perpustakaan Nasional RI', 'Sekretaris Utama Perpustakaan Nasional RI', 'Deputi Bidang Pengembangan Sumber Daya Perpustakaan', '', 'FALSE');

-- --------------------------------------------------------

--
-- Table structure for table `surat_permohonan`
--

CREATE TABLE `surat_permohonan` (
  `id_permohonan` int(12) NOT NULL,
  `id_unit` int(5) NOT NULL,
  `id_pelamar` int(11) NOT NULL,
  `no_surat_permohonan` varchar(10) NOT NULL,
  `nama_file_surat_permohonan` varchar(65) NOT NULL,
  `tanggal_permohonan` date NOT NULL,
  `status` varchar(35) DEFAULT NULL,
  `tanggal_persetujuan` date DEFAULT NULL,
  `ket` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_permohonan`
--

INSERT INTO `surat_permohonan` (`id_permohonan`, `id_unit`, `id_pelamar`, `no_surat_permohonan`, `nama_file_surat_permohonan`, `tanggal_permohonan`, `status`, `tanggal_persetujuan`, `ket`) VALUES
(1, 1, 8, 'MG_01', 'Contoh Surat Permohonan Aris.pdf', '2021-08-01', 'Ditolak', '2021-08-12', 'ok'),
(2, 1, 9, 'MG_02', 'Contoh Surat Permohonan Albert.pdf', '2021-08-02', 'Ditolak', '2021-08-14', 'berkas kurang lengkap dan karena situasi dan kondisi saat ini sedang '),
(3, 1, 10, 'MG_02', 'Contoh Surat Permohonan Nurul.pdf', '2021-08-02', 'Disetujui', '2021-08-14', 'Memenuhi Kriteria'),
(4, 1, 11, 'MG_01', 'Contoh Surat Permohonan Feby.pdf', '2021-08-01', 'Ditolak', '2021-08-14', 'Berkas Kurang Lengkap'),
(5, 2, 12, 'MG_03', 'Contoh Surat Permohonan Aji.pdf', '2021-08-03', 'Disetujui', '2021-08-11', 'siap'),
(6, 2, 14, 'MG_03', 'Contoh Surat Permohonan Idham.pdf', '2021-08-03', 'Ditolak', '2021-08-11', 'kjhij'),
(7, 2, 17, 'MG_04', 'Contoh Surat Permohonan Aji Suryana.pdf', '2021-08-04', 'Ditolak', '2021-08-13', 'Lah iya\r\n'),
(8, 1, 18, 'MG_05', 'Surat Lamaran Aldi Ramadhan.pdf', '2021-08-03', 'Disetujui', '2021-08-04', 'Data Telah Sesuai'),
(9, 2, 19, 'MG_05', 'Surat Lamaran Perpusnas Rio.pdf', '2021-08-03', 'Disetujui', '2021-08-11', 'ok'),
(10, 5, 20, 'MG/001', 'Gladis Federica UGM.pdf', '2021-08-04', 'Ditolak', '2021-08-05', 'Kelengkapan Dokumen Masih Kurang'),
(11, 6, 21, 'UI/MG-001', 'Surat Magang Budi Sujatmiko.pdf', '2021-08-06', 'Ditolak', '2021-08-07', 'Kelengkapan Dokumen Masih Kurang'),
(12, 1, 5, 'MG_08', 'Pelamar_SuratPermohonan_1629081155.pdf', '2021-08-16', 'Menunggu verifikasi', NULL, NULL),
(13, 15, 5, 'MG_007', 'Pelamar_SuratPermohonan_1629081230.pdf', '2021-08-16', 'Ditolak', '2021-08-17', NULL),
(14, 8, 5, 'N123/2/19/', 'Pelamar_SuratPermohonan_1629081293.pdf', '2021-08-16', 'Disetujui', '2021-08-18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id` int(11) NOT NULL,
  `nama_unit` varchar(70) NOT NULL,
  `keterangan` mediumtext NOT NULL,
  `url_gambar` varchar(256) NOT NULL,
  `url_halaman` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit_kerja`
--

INSERT INTO `unit_kerja` (`id`, `nama_unit`, `keterangan`, `url_gambar`, `url_halaman`) VALUES
(1, 'Biro Perencanaan dan Keuangan', 'Biro Perencanaan dan Keuangan mempunyai tugas melaksanakan koordinasi dan penyusunan rencana, program dan anggaran, pemantauan, evaluasi, dan pelaporan, serta pengelolaan administrasi keuangan.', '-', '-'),
(2, 'Biro Hukum, Organisasi, Kerja Sama dan Hubungan Masyarakat', 'Biro Hukum, Organisasi, Kerja Sama, dan Hubungan Masyarakat mempunyai tugas melaksanakan koordinasi dan pelayanan di bidang hukum, organisasi, kerja sama, hubungan masyarakat, dan penerbitan.', '-', '-'),
(3, 'Biro SDM dan Umum', 'Biro Sumber Daya Manusia dan Umum mempunyai tugas melaksanakan koordinasi dan penyusunan urusan sumber daya manusia, rumah tangga, kearsipan, persandian, keprotokolan, administrasi tata usaha, dan layanan pengadaan barang dan jasa.', '-', '-'),
(4, 'Direktorat Deposit dan Pengembangan Koleksi Perpustakaan', 'Direktorat Deposit dan Pengembangan Koleksi Perpustakaan mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, penyusunan norma, standar, prosedur, dan kriteria, pelaksanaan fasilitasi, bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang deposit dan pengembangan koleksi perpustakaan.', '-', '-'),
(5, 'Pusat Bibliografi dan Pengolahan Bahan Perpustakaan', 'Pusat Bibliografi dan Pengolahan Bahan Perpustakaan mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, fasilitasi, bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang bibliografi dan pengolahan bahan perpustakaan.', '-', '-'),
(6, 'Pusat Preservasi dan Alih Media Bahan Perpustakaan', 'Pusat Preservasi dan Alih Media Bahan Perpustakaan mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, fasilitasi, bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang pelestarian fisik dan informasi bahan perpustakaan.', '-', '-'),
(7, 'Pusat Jasa Informasi Perpustakaan dan Pengelolaan Naskah Nusantara', 'Pusat Jasa Informasi Perpustakaan dan Pengelolaan Naskah Nusantara mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, fasilitasi, bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang jasa informasi dan layanan perpustakaan serta pengelolaan naskah nusantara.', '-', '-'),
(8, 'Direktorat Standarisasi dan Akreditasi', 'Direktorat Standardisasi dan Akreditasi mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, penyusunan norma, standar, prosedur, dan kriteria, pelaksanaan fasilitasi, bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang standardisasi dan akreditasi perpustakaan.', '-', '-'),
(9, 'Pusat Pengembangan Perpustakaan Umum dan Khusus', 'Pusat Pengembangan Perpustakaan Umum dan Khusus mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, fasilitasi, pelaksanaan bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang pengembangan dan pembinaan perpustakaan umum dan perpustakaan khusus.', '-', '-'),
(10, 'Pusat Pengembangan Perpustakaan Sekolah/Madrasah dan Perguruan Tinggi', 'Pusat Pengembangan Perpustakaan Sekolah/Madrasah dan Perguruan Tinggi mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, fasilitasi, pelaksanaan bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang pengembangan dan pembinaan perpustakaan sekolah/madrasah dan perpustakaan perguruan tinggi.', '-', '-'),
(11, 'Pusat Analisis Perpustakaan dan Pengembangan Budaya Baca', 'Pusat Analisis Perpustakaan dan Pengembangan Budaya Baca mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, fasilitasi, bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang analisis kebijakan perpustakaan dan pengembangan budaya baca.', '-', '-'),
(12, 'Pusat Data dan Informasi', 'Pusat Data dan Informasi mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, fasilitasi, bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang pengelolaan data dan informasi perpustakaan.', '-', '-'),
(13, 'Pusat Pembinaan Pustakawan', 'Pusat Pembinaan Pustakawan mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, fasilitasi, bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang pembinaan dan pengembangan pustakawan.', '-', '-'),
(14, 'Pusat Pendidikan dan Pelatihan', 'Pusat Pendidikan dan Pelatihan mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, fasilitasi, bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang pendidikan dan pelatihan.', '-', '-'),
(15, 'Inspektorat', 'Inspektorat mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, fasilitasi, bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang pengawasan internal.', '-', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivasi`
--
ALTER TABLE `aktivasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `id_unit_kerja` (`id_unit_kerja`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_balasan`
--
ALTER TABLE `surat_balasan`
  ADD PRIMARY KEY (`id_surat_balasan`),
  ADD KEY `id_surat_permohonan` (`id_surat_permohonan`);

--
-- Indexes for table `surat_permohonan`
--
ALTER TABLE `surat_permohonan`
  ADD PRIMARY KEY (`id_permohonan`),
  ADD KEY `id_unit_kerja` (`id_unit`),
  ADD KEY `id_pelamar` (`id_pelamar`) USING BTREE;

--
-- Indexes for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktivasi`
--
ALTER TABLE `aktivasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surat_balasan`
--
ALTER TABLE `surat_balasan`
  MODIFY `id_surat_balasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `surat_permohonan`
--
ALTER TABLE `surat_permohonan`
  MODIFY `id_permohonan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_balasan`
--
ALTER TABLE `surat_balasan`
  ADD CONSTRAINT `surat_balasan_ibfk_1` FOREIGN KEY (`id_surat_permohonan`) REFERENCES `surat_permohonan` (`id_permohonan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_permohonan`
--
ALTER TABLE `surat_permohonan`
  ADD CONSTRAINT `surat_permohonan_ibfk_2` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_permohonan_ibfk_3` FOREIGN KEY (`id_unit`) REFERENCES `unit_kerja` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

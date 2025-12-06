-- =====================================================
-- Database: db_event_orginir (Updated - Separated Tables)
-- Memisahkan tabel users menjadi admin dan mahasiswa
-- =====================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------
-- Drop existing tables (jika ingin fresh install)
-- --------------------------------------------------------
-- DROP TABLE IF EXISTS rundown_event;
-- DROP TABLE IF EXISTS pembicara;
-- DROP TABLE IF EXISTS notifikasi;
-- DROP TABLE IF EXISTS pengajuan_event;
-- DROP TABLE IF EXISTS events;
-- DROP TABLE IF EXISTS kategori_event;
-- DROP TABLE IF EXISTS mahasiswa;
-- DROP TABLE IF EXISTS admin;

-- --------------------------------------------------------
-- Tabel admin
-- --------------------------------------------------------
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data admin
INSERT INTO `admin` (`id`, `nama`, `email`, `password`, `no_hp`) VALUES
(1, 'Administrator', 'admin@kampus.ac.id', MD5('admin123'), NULL),
(2, 'dzul', 'dzul@ac.id', MD5('dzul123'), NULL);

-- --------------------------------------------------------
-- Tabel mahasiswa
-- --------------------------------------------------------
CREATE TABLE `mahasiswa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `fakultas` varchar(100) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nim` (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data mahasiswa
INSERT INTO `mahasiswa` (`id`, `nama`, `email`, `password`, `nim`, `fakultas`, `prodi`, `no_hp`) VALUES
(1, 'Ahmad Rizki', 'ahmad.rizki@student.kampus.ac.id', MD5('mahasiswa123'), '2021001001', 'Fakultas Teknik', 'Teknik Informatika', '081234567890'),
(2, 'Siti Nurhaliza', 'siti.nur@student.kampus.ac.id', MD5('mahasiswa123'), '2021001002', 'Fakultas Ekonomi', 'Manajemen', '081234567891'),
(3, 'Budi Santoso', 'budi.s@student.kampus.ac.id', MD5('mahasiswa123'), '2021001003', 'Fakultas Teknik', 'Sistem Informasi', '081234567892');

-- --------------------------------------------------------
-- Tabel kategori_event
-- --------------------------------------------------------
CREATE TABLE `kategori_event` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  `warna` varchar(20) DEFAULT '#3b82f6',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `kategori_event` (`id`, `nama_kategori`, `warna`) VALUES
(1, 'Seminar', '#3b82f6'),
(2, 'Workshop', '#10b981'),
(3, 'Lomba', '#f59e0b'),
(4, 'Talkshow', '#8b5cf6'),
(5, 'Webinar', '#06b6d4'),
(6, 'Pelatihan', '#ec4899'),
(7, 'Konferensi', '#6366f1');

-- --------------------------------------------------------
-- Tabel events
-- --------------------------------------------------------
CREATE TABLE `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `deskripsi` text,
  `kategori_id` int DEFAULT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `lokasi` varchar(200) DEFAULT NULL,
  `tipe_lokasi` enum('offline','online','hybrid') DEFAULT 'offline',
  `link_online` varchar(255) DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `kuota_peserta` int DEFAULT '0',
  `link_google_form` varchar(255) DEFAULT NULL,
  `link_spreadsheet` varchar(255) DEFAULT NULL,
  `biaya` decimal(10,2) DEFAULT '0.00',
  `status` enum('aktif','selesai','batal') DEFAULT 'aktif',
  `pengaju_id` int DEFAULT NULL,
  `approved_by` int DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `kategori_id` (`kategori_id`),
  KEY `pengaju_id` (`pengaju_id`),
  KEY `approved_by` (`approved_by`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_event` (`id`) ON DELETE SET NULL,
  CONSTRAINT `events_ibfk_2` FOREIGN KEY (`pengaju_id`) REFERENCES `mahasiswa` (`id`) ON DELETE SET NULL,
  CONSTRAINT `events_ibfk_3` FOREIGN KEY (`approved_by`) REFERENCES `admin` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `events` (`id`, `judul`, `deskripsi`, `kategori_id`, `tanggal_mulai`, `tanggal_selesai`, `waktu_mulai`, `waktu_selesai`, `lokasi`, `tipe_lokasi`, `link_online`, `poster`, `kuota_peserta`, `link_google_form`, `biaya`, `status`, `pengaju_id`, `approved_by`, `approved_at`) VALUES
(1, 'Seminar Nasional Teknologi AI 2024', 'Seminar tentang perkembangan teknologi Artificial Intelligence dan dampaknya terhadap industri di Indonesia.', 1, '2024-12-20', '2024-12-20', '08:00:00', '16:00:00', 'Auditorium Utama Gedung A', 'offline', NULL, NULL, 500, 'https://forms.google.com/example1', '0.00', 'aktif', 1, 1, NOW()),
(2, 'Workshop Web Development', 'Belajar membuat website modern dengan HTML, CSS, dan JavaScript dari dasar hingga mahir.', 2, '2024-12-25', '2024-12-26', '09:00:00', '15:00:00', 'Lab Komputer Lt. 3', 'offline', NULL, NULL, 50, 'https://forms.google.com/example2', '50000.00', 'aktif', 2, 1, NOW()),
(3, 'Talkshow Karir di Era Digital', 'Diskusi bersama praktisi industri tentang peluang karir di era digital.', 4, '2024-12-28', '2024-12-28', '13:00:00', '17:00:00', 'Zoom Meeting', 'online', NULL, NULL, 200, 'https://forms.google.com/example3', '0.00', 'aktif', 1, 1, NOW());

-- --------------------------------------------------------
-- Tabel pengajuan_event
-- --------------------------------------------------------
CREATE TABLE `pengajuan_event` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `deskripsi` text,
  `kategori_id` int DEFAULT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `lokasi` varchar(200) DEFAULT NULL,
  `tipe_lokasi` enum('offline','online','hybrid') DEFAULT 'offline',
  `link_online` varchar(255) DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `kuota_peserta` int DEFAULT '0',
  `link_google_form` varchar(255) DEFAULT NULL,
  `link_spreadsheet` varchar(255) DEFAULT NULL,
  `biaya` decimal(10,2) DEFAULT '0.00',
  `nama_organisasi` varchar(100) DEFAULT NULL,
  `kontak_pengaju` varchar(100) DEFAULT NULL,
  `pengaju_id` int DEFAULT NULL,
  `status` enum('menunggu','disetujui','ditolak','revisi') DEFAULT 'menunggu',
  `catatan_admin` text,
  `reviewed_by` int DEFAULT NULL,
  `reviewed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `kategori_id` (`kategori_id`),
  KEY `pengaju_id` (`pengaju_id`),
  KEY `reviewed_by` (`reviewed_by`),
  CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_event` (`id`) ON DELETE SET NULL,
  CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`pengaju_id`) REFERENCES `mahasiswa` (`id`) ON DELETE SET NULL,
  CONSTRAINT `pengajuan_ibfk_3` FOREIGN KEY (`reviewed_by`) REFERENCES `admin` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `pengajuan_event` (`id`, `judul`, `deskripsi`, `kategori_id`, `tanggal_mulai`, `waktu_mulai`, `waktu_selesai`, `lokasi`, `tipe_lokasi`, `kuota_peserta`, `link_google_form`, `biaya`, `nama_organisasi`, `kontak_pengaju`, `pengaju_id`, `status`) VALUES
(1, 'Lomba Hackathon 2024', 'Kompetisi pemrograman 24 jam untuk mahasiswa seluruh Indonesia.', 3, '2025-01-15', '08:00:00', '08:00:00', 'Gedung Serbaguna', 'offline', 100, 'https://forms.google.com/hackathon', '0.00', 'HMIF', '081234567890', 1, 'menunggu'),
(2, 'Webinar Machine Learning', 'Pengenalan dasar Machine Learning untuk pemula.', 5, '2025-01-20', '19:00:00', '21:00:00', 'Google Meet', 'online', 300, 'https://forms.google.com/ml-webinar', '0.00', 'UKM Programming', '081234567891', 2, 'menunggu');

-- --------------------------------------------------------
-- Tabel pembicara
-- --------------------------------------------------------
CREATE TABLE `pembicara` (
  `id` int NOT NULL AUTO_INCREMENT,
  `event_id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `instansi` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `topik` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `pembicara_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `pembicara` (`event_id`, `nama`, `jabatan`, `instansi`, `topik`) VALUES
(1, 'Dr. Ir. Budi Rahardjo, M.Sc', 'Pakar Keamanan Siber', 'ITB', 'AI dalam Keamanan Siber'),
(1, 'Prof. Rini Wulandari, Ph.D', 'Peneliti AI', 'BRIN', 'Masa Depan AI di Indonesia'),
(2, 'Andi Pratama', 'Senior Frontend Developer', 'Tokopedia', 'Modern Web Development'),
(3, 'Sarah Johnson', 'HR Director', 'Google Indonesia', 'Skill yang Dibutuhkan di Era Digital');

-- --------------------------------------------------------
-- Tabel rundown_event
-- --------------------------------------------------------
CREATE TABLE `rundown_event` (
  `id` int NOT NULL AUTO_INCREMENT,
  `event_id` int NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `kegiatan` varchar(200) NOT NULL,
  `keterangan` text,
  `urutan` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `rundown_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `rundown_event` (`event_id`, `waktu_mulai`, `waktu_selesai`, `kegiatan`, `urutan`) VALUES
(1, '08:00:00', '08:30:00', 'Registrasi Peserta', 1),
(1, '08:30:00', '09:00:00', 'Pembukaan', 2),
(1, '09:00:00', '10:30:00', 'Sesi 1: AI dalam Keamanan Siber', 3),
(1, '10:30:00', '10:45:00', 'Coffee Break', 4),
(1, '10:45:00', '12:15:00', 'Sesi 2: Masa Depan AI di Indonesia', 5),
(1, '12:15:00', '13:30:00', 'ISHOMA', 6),
(1, '13:30:00', '15:00:00', 'Panel Diskusi', 7),
(1, '15:00:00', '16:00:00', 'Penutupan & Networking', 8);

-- --------------------------------------------------------
-- Tabel notifikasi (untuk mahasiswa)
-- --------------------------------------------------------
CREATE TABLE `notifikasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mahasiswa_id` int NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pesan` text,
  `tipe` enum('info','success','warning','error') DEFAULT 'info',
  `is_read` tinyint(1) DEFAULT '0',
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `mahasiswa_id` (`mahasiswa_id`),
  CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `notifikasi` (`mahasiswa_id`, `judul`, `pesan`, `tipe`, `is_read`) VALUES
(1, 'Pengajuan Diterima', 'Pengajuan event "Seminar Nasional Teknologi AI 2024" telah disetujui oleh admin.', 'success', 1),
(1, 'Event Baru Tersedia', 'Workshop Web Development akan segera dilaksanakan. Daftar sekarang!', 'info', 0),
(2, 'Pengajuan Diterima', 'Pengajuan event "Workshop Web Development" telah disetujui oleh admin.', 'success', 1);

COMMIT;

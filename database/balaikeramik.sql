-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2019 at 07:35 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balaikeramik`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_sampling_plan`
--

CREATE TABLE `audit_sampling_plan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doc_maker` bigint(20) UNSIGNED DEFAULT NULL,
  `audit_plan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sampling_plan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bahan_hasil`
--

CREATE TABLE `bahan_hasil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lengkap` int(11) DEFAULT NULL,
  `form_21` varchar(255) DEFAULT NULL,
  `spek_pembelian` text,
  `form_42` varchar(255) DEFAULT NULL,
  `peralatan` text,
  `form_22` varchar(255) DEFAULT NULL,
  `form_31` varchar(255) DEFAULT NULL,
  `form_32` varchar(255) DEFAULT NULL,
  `form_41` varchar(255) DEFAULT NULL,
  `form_511` varchar(255) DEFAULT NULL,
  `form_512` varchar(255) DEFAULT NULL,
  `form_521` varchar(255) DEFAULT NULL,
  `form_522` varchar(255) DEFAULT NULL,
  `form_523` varchar(255) DEFAULT NULL,
  `form_524` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bid_price`
--

CREATE TABLE `bid_price` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doc_maker` bigint(20) UNSIGNED DEFAULT NULL,
  `bid_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_pembuatan` date DEFAULT NULL,
  `hal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `verifikasi_bayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bukti_bayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apprv_bukti_bayar` int(11) DEFAULT NULL,
  `bpn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_ntpn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_byr_keuangan` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `defaultharga`
--

CREATE TABLE `defaultharga` (
  `id` bigint(20) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `defaultharga`
--

INSERT INTO `defaultharga` (`id`, `jenis`, `harga`) VALUES
(1, 'sertifikasi produk', 21000000);

-- --------------------------------------------------------

--
-- Table structure for table `dok_importir`
--

CREATE TABLE `dok_importir` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lengkap` int(11) DEFAULT NULL,
  `surat_permohonan_importer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daftar_isian_dan_kuesioner_importer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_iui` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_akte_notaris_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_npwp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_tdp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_api` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_sert_patent_merek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penunjukkan_distributor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `struktur_organisasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ilustrasi_pembubuhan_tanda_sni` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tabel_daftar_tipe_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar_dan_spesifikasi_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sert_smm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `laporan_pengawasan_iso_9001_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_dok_importir_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dok_manufaktur`
--

CREATE TABLE `dok_manufaktur` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sni` int(11) DEFAULT NULL,
  `surat_permohonan_dari_manufaktur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daftar_isian_dan_kuesioner_manufaktur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `izin_usaha_manufaktur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sert_iso_9001` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `laporan_pengawasan_iso_9001_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `struktur_organisasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagram_alir_produksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panduan_mutu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daftar_induk_dok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_penunjukkan_wakil_manajemen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tata_letak_pabrik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peta_rute_pabrik_dari_bandara_terdekat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_dok_manufaktur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `format_file`
--

CREATE TABLE `format_file` (
  `id` bigint(20) NOT NULL,
  `format` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `format_file`
--

INSERT INTO `format_file` (`id`, `format`, `file`, `created_at`, `updated_at`) VALUES
(5, 'Surat Permohonan F.03.01', 'surat_permohonan_F.03.01.doc', '2019-12-02 01:43:10', '2019-12-02 01:43:10'),
(7, 'Surat Pemberitahuan Jadwal Audit', 'surat_pemberitahuan_jadwal_audit.doc', '2019-12-03 00:06:55', '2019-12-03 00:06:55'),
(10, 'Audit Plan', 'audit_plan.pdf', '2019-12-03 00:43:21', '2019-12-03 00:43:21'),
(11, 'Sampling Plan', 'sampling_plan.doc', '2019-12-03 00:43:43', '2019-12-03 00:43:43'),
(12, 'Lembar Konfirmasi Penerbitan Sertifikat SPPT SNI', 'lembar_konfirmasi_penerbitan_sertifikat_sppt_sni.docx', '2019-12-06 05:47:31', '2019-12-06 05:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `group_tahapan`
--

CREATE TABLE `group_tahapan` (
  `id` bigint(20) NOT NULL,
  `role_seksi` bigint(20) NOT NULL,
  `tahap` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_tahapan`
--

INSERT INTO `group_tahapan` (`id`, `role_seksi`, `tahap`) VALUES
(1, 2, '[10,13,22]'),
(2, 3, '[11,12]'),
(3, 4, '[13]'),
(4, 5, '[14,15]'),
(5, 6, '[16,18,19,20,21]'),
(6, 7, '[17]'),
(7, 8, '[16]'),
(8, 9, '[19]'),
(9, 10, '[19]'),
(10, 11, '[22]'),
(11, 12, '[19]'),
(12, 13, '[20]');

-- --------------------------------------------------------

--
-- Table structure for table `info_tambahan`
--

CREATE TABLE `info_tambahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lengkap` int(11) DEFAULT NULL,
  `kuis1_opsi` tinyint(1) DEFAULT NULL,
  `kuis1_isi` varchar(255) DEFAULT NULL,
  `kuis2_opsi` tinyint(1) DEFAULT NULL,
  `kuis2_isi` varchar(255) DEFAULT NULL,
  `kuis3_opsi` tinyint(1) DEFAULT NULL,
  `kuis3_isi` varchar(255) DEFAULT NULL,
  `kuis4_opsi` tinyint(1) DEFAULT NULL,
  `kuis4_isi` varchar(255) DEFAULT NULL,
  `kuis5_opsi` tinyint(1) DEFAULT NULL,
  `kuis6` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doc_maker` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `tgl_pembuatan` date DEFAULT NULL,
  `kode_biling` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `masa_kode_biling` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_audit`
--

CREATE TABLE `jadwal_audit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jadwal_audit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apprv` int(11) DEFAULT NULL,
  `doc_maker` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner`
--

CREATE TABLE `kuesioner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `lengkap` int(11) DEFAULT NULL,
  `kuis1` varchar(255) DEFAULT NULL,
  `kuis2` int(2) DEFAULT NULL,
  `kuis3` varchar(255) DEFAULT NULL,
  `kuis4` varchar(255) DEFAULT NULL,
  `kuis_111` varchar(255) DEFAULT NULL,
  `kuis_112` varchar(255) DEFAULT NULL,
  `kuis_113` text,
  `kuis_121` varchar(255) DEFAULT NULL,
  `kuis_122` varchar(255) DEFAULT NULL,
  `kuis_123` text,
  `kuis_124` varchar(255) DEFAULT NULL,
  `kuis_125` int(2) DEFAULT NULL,
  `kuis_126` varchar(255) DEFAULT NULL,
  `kuis_127` varchar(255) DEFAULT NULL,
  `kuis_128` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_audit`
--

CREATE TABLE `laporan_audit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `auditor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dok_importir_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dok_manufaktur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tinjauan_pp_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jadwal_audit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tgl_audit` date DEFAULT NULL,
  `ringkasan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_hasil_sert`
--

CREATE TABLE `laporan_hasil_sert` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `shu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bapc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closed_ncr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelengkapan_dok` int(11) DEFAULT NULL,
  `doc_maker` bigint(20) UNSIGNED DEFAULT NULL,
  `laporan_hasil_sert` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_audit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tim_audit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil_assesmen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifikasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bapc_lap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil_pengujian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rekomendasi` text COLLATE utf8mb4_unicode_ci,
  `status_timTeknis` int(11) DEFAULT NULL,
  `input_evaluasi_tt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signed_lapSert` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_tahap`
--

CREATE TABLE `master_tahap` (
  `id` bigint(20) NOT NULL,
  `kode_tahap` int(2) DEFAULT NULL,
  `tahapan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_tahap`
--

INSERT INTO `master_tahap` (`id`, `kode_tahap`, `tahapan`) VALUES
(14, 10, 'Apply SA'),
(15, 11, 'Apply SA'),
(16, 12, 'Pembuatan MOU'),
(17, 13, 'Sign MOU'),
(18, 14, 'Pembuatan Penawaran Harga'),
(19, 15, 'Pembuatan Invoice dan Upload Kode Biling'),
(20, 16, 'Bukti Pembayaran'),
(21, 17, 'Surat Pemberitahuan Jadwal dan Tim Audit'),
(22, 18, 'Laporan Audit Kecukupan Sertifikasi Produk'),
(23, 19, 'Upload Audit Plan dan Sampling Plan'),
(24, 20, 'Pembuatan Dokumen Laporan Hasil Sertifikasi'),
(25, 21, 'Pembuatan Draft Sertifikasi'),
(26, 22, 'Cetak Draft Sertifikasi'),
(27, 23, 'Penjadwalan Ambil/Kirim Sertifikat'),
(28, 24, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mou`
--

CREATE TABLE `mou` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doc_maker` bigint(20) UNSIGNED DEFAULT NULL,
  `mou` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_kontrak` date DEFAULT NULL,
  `tgl_exp` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notif_log`
--

CREATE TABLE `notif_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `produk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `notif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_tahap` int(2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1: success, 2: warning, 3: danger',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `no_surat`
--

CREATE TABLE `no_surat` (
  `id` bigint(20) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `dok` varchar(255) NOT NULL,
  `no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persyaratan_dok_dalam_negeri`
--

CREATE TABLE `persyaratan_dok_dalam_negeri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sni` int(2) DEFAULT NULL,
  `pesan_form_kuesioner` text COLLATE utf8mb4_unicode_ci,
  `dok_tidak_lengkap` text COLLATE utf8mb4_unicode_ci,
  `surat_permohonan_sertifikat_sni` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'sa, importir',
  `copy_iui` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'sa, importir',
  `copy_akte_notaris_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'sa, importir',
  `copy_tdp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'sa, importir',
  `copy_npwp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'sa, importir',
  `copy_sert_patent_merek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'sa, importir',
  `copy_sert_iso_9001` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'sa',
  `laporan_audit_sistem_mutu_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'sa',
  `panduan_mutu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'sa',
  `daftar_induk_dok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'sa',
  `struktur_organisasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'sa, importir',
  `diagram_alir_proses_produksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'sa',
  `surat_pertunjukkan_wakil_manajemen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'sa',
  `ilustrasi_pembubuhan_tanda_sni` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'sa, importir',
  `tabel_daftar_tipe_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'sa, importir',
  `gambar_dan_spesifikasi_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'sa, importir',
  `tata_letak_pabrik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'sa',
  `peta_rute_pabrik_dari_bandara_terdekat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'sa',
  `daftar_isian_dan_kuesioner_importer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'importir',
  `copy_api` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'importir',
  `penunjukkan_distributor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'importir',
  `sert_smm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'importir',
  `laporan_pengawasan_iso_9001_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'importir',
  `review_dok_importir_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persyaratan_dok_luar_negeri`
--

CREATE TABLE `persyaratan_dok_luar_negeri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sni` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan_form_kuesioner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dok_importir_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dok_manufaktur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` bigint(20) NOT NULL,
  `client` bigint(20) UNSIGNED DEFAULT NULL,
  `admin` bigint(20) UNSIGNED DEFAULT NULL,
  `produk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode_tahap` int(2) DEFAULT NULL,
  `pesan` text,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_tahap` int(2) NOT NULL DEFAULT '10',
  `lembar_konSert` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_konSert` int(11) DEFAULT NULL,
  `verify_msg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `draft_sert` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_sert_jadi` int(11) DEFAULT NULL COMMENT '1: approved, 2: printed, 3: done, 4: rejected',
  `pesan_sert` text COLLATE utf8mb4_unicode_ci,
  `request_sert` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_request_sert` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resi_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kon_resi` int(11) DEFAULT NULL,
  `alamat_kirim` text COLLATE utf8mb4_unicode_ci,
  `terima_sert` int(11) DEFAULT NULL,
  `tgl_terima_sert` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review_dok_importir`
--

CREATE TABLE `review_dok_importir` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surat_permohonan_sertifikat_sni` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daftar_isian_dan_kuesioner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_iui` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_akte_notaris_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_npwp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_tdp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_api` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_sert_patent_merek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penunjukkan_distributor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `struktur_organisasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ilustrasi_pembubuhan_tanda_sni` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tabel_daftar_tipe_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar_dan_spesifikasi_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sert_smm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `laporan_pengawasan_iso_9001_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review_dok_manufaktur`
--

CREATE TABLE `review_dok_manufaktur` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surat_permohonan_dari_manufaktur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daftar_isian_dan_kuesioner_manufaktur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `izin_usaha_manufaktur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sert_iso_9001` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `laporan_pengawasan_iso_9001_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `struktur_organisasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagram_alir_produksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panduan_mutu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daftar_induk_dok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_penunjukkan_wakil_manajemen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tata_letak_pabrik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peta_rute_pabrik_dari_bandara_terdekat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review_tinjauan_pp`
--

CREATE TABLE `review_tinjauan_pp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `struktur_organisasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagram_alir_produksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daftar_peralatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spesifikasi_peralatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tata_letak_pabrik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peta_letak_pabrik_dari_bandara_terdekat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `role_name`, `manual`) VALUES
(1, 'client', 'Client', 'manual_book_Client.docx'),
(2, 'pemasaran', 'Seksi Pemasaran', NULL),
(3, 'kerjasama', 'Seksi Kerjasama', NULL),
(4, 'kabidpjt', 'Kabid PJT', NULL),
(5, 'keuangan', 'Seksi Keuangan', NULL),
(6, 'sertifikasi', 'Seksi Sertifikasi', NULL),
(7, 'auditor', 'Auditor', NULL),
(8, 'kabidpaskal', 'Kabid Paskal', NULL),
(9, 'tim_teknis', 'Tim Teknis', NULL),
(10, 'komite_timTeknis', 'Komite Evaluasi Tim Teknis', NULL),
(11, 'subag_umum', 'Subag Umum', NULL),
(12, 'ketua_tim_teknis', 'Ketua Tim Teknis', NULL),
(13, 'ketua_sertifikasi', 'Ketua Seksi Sertifikasi', NULL),
(14, 'super_admin', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sert`
--

CREATE TABLE `sert` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sert_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `produk_id` bigint(20) DEFAULT NULL,
  `pengisian_data` int(11) DEFAULT NULL,
  `nomor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe_jenis` text COLLATE utf8mb4_unicode_ci,
  `regulasi_skema` text COLLATE utf8mb4_unicode_ci,
  `skema_sert` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `sert_doc`
-- (See below for the actual view)
--
CREATE TABLE `sert_doc` (
`produk_id` bigint(20) unsigned
,`surat_permohonan_sertifikat_sni` varchar(255)
,`copy_iui` varchar(255)
,`copy_akte_notaris_perusahaan` varchar(255)
,`copy_tdp` varchar(255)
,`copy_npwp` varchar(255)
,`copy_sert_patent_merek` varchar(255)
,`copy_sert_iso_9001` varchar(255)
,`laporan_audit_sistem_mutu_terakhir` varchar(255)
,`panduan_mutu` varchar(255)
,`daftar_induk_dok` varchar(255)
,`struktur_organisasi` varchar(255)
,`diagram_alir_proses_produksi` varchar(255)
,`surat_pertunjukkan_wakil_manajemen` varchar(255)
,`ilustrasi_pembubuhan_tanda_sni` varchar(255)
,`tabel_daftar_tipe_produk` varchar(255)
,`gambar_dan_spesifikasi_produk` varchar(255)
,`tata_letak_pabrik` varchar(255)
,`peta_rute_pabrik_dari_bandara_terdekat` varchar(255)
,`daftar_isian_dan_kuesioner_importer` varchar(255)
,`copy_api` varchar(255)
,`penunjukkan_distributor` varchar(255)
,`laporan_pengawasan_iso_9001_terakhir` varchar(255)
,`mou` varchar(255)
,`bid_price` varchar(255)
,`bukti_bayar` varchar(255)
,`bpn` varchar(255)
,`invoice` varchar(255)
,`kode_biling` varchar(255)
,`jadwal_audit` varchar(255)
,`struktur_organisasi_tp` varchar(255)
,`diagram_alir_produksi` varchar(255)
,`daftar_peralatan` varchar(255)
,`spesifikasi_peralatan` varchar(255)
,`tata_letak_pabrik_tp` varchar(255)
,`peta_letak_pabrik_dari_bandara_terdekat` varchar(255)
,`audit_plan` varchar(255)
,`sampling_plan` varchar(255)
,`shu` varchar(255)
,`bapc` varchar(255)
,`closed_ncr` varchar(255)
,`laporan_hasil_sert` varchar(255)
,`lembar_konSert` varchar(255)
,`draft_sert` varchar(255)
,`resi_pengiriman` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `tinjauan_pp`
--

CREATE TABLE `tinjauan_pp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sni` int(11) DEFAULT NULL,
  `dok_tidak_lengkap` text COLLATE utf8mb4_unicode_ci,
  `struktur_organisasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagram_alir_produksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daftar_peralatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spesifikasi_peralatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tata_letak_pabrik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peta_letak_pabrik_dari_bandara_terdekat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_tinjauan_pp_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registeredDeviceId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `negeri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pimpinan_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_perusahaan` text COLLATE utf8mb4_unicode_ci,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_pengguna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_pabrik` text COLLATE utf8mb4_unicode_ci,
  `telp_pabrik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax_pabrik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jml_pegawai_tetap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jml_pegawai_tidak_tetap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jml_line_produksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_npwp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_nib` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nib` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `verified`, `email_verified_at`, `password`, `registeredDeviceId`, `role_id`, `negeri`, `nama_perusahaan`, `pimpinan_perusahaan`, `alamat_perusahaan`, `kota`, `provinsi`, `kode_pos`, `no_telp`, `no_fax`, `email_pengguna`, `alamat_pabrik`, `telp_pabrik`, `fax_pabrik`, `email_perusahaan`, `jml_pegawai_tetap`, `jml_pegawai_tidak_tetap`, `jml_line_produksi`, `contact_person`, `cp_num`, `no_npwp`, `npwp`, `no_nib`, `nib`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Testingg', 'naufalrifqi203@gmail.com', NULL, NULL, '12345678', NULL, NULL, NULL, 'PT. Sejahtera Keramik', 'Pimpinan Perusaaan', 'Jl. Bandung Tengah No. 110', 'Bandung', 'Jawa Barat', '40233', '022938949', '022384988', 'pengguna@mail.domain', 'Jl. Bandung Selatan', '02233897', '02238489', 'perusahaan@mail.domain', '120', '10', '12', '087777888', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'pemasaran', 'bebas_pemasaran@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0897672', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-17 20:04:34', '2019-12-02 21:39:48'),
(4, 'kerjasama', 'bebas_kerjasama@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08928323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(5, 'kabidPjt', 'bebas_kabidpjt@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'C8GWmbvrhoFFBvrX495b3uOJpIyZW50atBQxMGwHigMDS2seYunQ2R0Z5JCl', '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(6, 'keuangan', 'bebas_keuangan@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(7, 'sertifikasi', 'bebas_sertifikasi@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4tLw268cG4pdksuzmIPiRcgdyRzkMcYGX4anGvZbSpHGXOO8aAZpseKiLI9Y', '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(8, 'auditor', 'bebas_auditor@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'R1eencFRE1jb0QsGEbmIu0fcwpKECBkY3bfHZA98y4RVJSvLHU862hCSulYg', '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(9, 'kabidpaskal', 'bebas_kabidpaskal@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5jXAI7k3r7S8ND75WULieCGy6opWNb1yikCpIn4nw2Yg9u9JLuGxqAVjdl63', '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(10, 'tim_teknis', 'bebas_tim_teknis@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(12, 'subag_umum', 'bebas_subag@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y9RLuA0kOFNiW92MKaitOiDNKuTdkFai9UmktBnKxV4E01GvzRjk4DglseRP', '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(13, 'tim_teknis2', 'bebas_tim_teknis2@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(14, 'ketua_komite_timTeknis', 'bebas_komite_timTeknis@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(24, 'ketua_tim_teknis', 'bebas_ketua_tim_teknis@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(25, 'ketua_sertifikasi', 'bebas_ketua_sertifikasi@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(32, 'super_admin', 'bebas_super_admin@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$7NfhfvHWB5VA3D0bQl65T.XKnKPWv4RcbaTajbnqEmnemk.QtyNmi', NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-13 23:51:27', '2019-12-01 21:55:47');

-- --------------------------------------------------------

--
-- Structure for view `sert_doc`
--
DROP TABLE IF EXISTS `sert_doc`;

CREATE ALGORITHM=MERGE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sert_doc`  AS  select `p`.`id` AS `produk_id`,`sa`.`surat_permohonan_sertifikat_sni` AS `surat_permohonan_sertifikat_sni`,`sa`.`copy_iui` AS `copy_iui`,`sa`.`copy_akte_notaris_perusahaan` AS `copy_akte_notaris_perusahaan`,`sa`.`copy_tdp` AS `copy_tdp`,`sa`.`copy_npwp` AS `copy_npwp`,`sa`.`copy_sert_patent_merek` AS `copy_sert_patent_merek`,`sa`.`copy_sert_iso_9001` AS `copy_sert_iso_9001`,`sa`.`laporan_audit_sistem_mutu_terakhir` AS `laporan_audit_sistem_mutu_terakhir`,`sa`.`panduan_mutu` AS `panduan_mutu`,`sa`.`daftar_induk_dok` AS `daftar_induk_dok`,`sa`.`struktur_organisasi` AS `struktur_organisasi`,`sa`.`diagram_alir_proses_produksi` AS `diagram_alir_proses_produksi`,`sa`.`surat_pertunjukkan_wakil_manajemen` AS `surat_pertunjukkan_wakil_manajemen`,`sa`.`ilustrasi_pembubuhan_tanda_sni` AS `ilustrasi_pembubuhan_tanda_sni`,`sa`.`tabel_daftar_tipe_produk` AS `tabel_daftar_tipe_produk`,`sa`.`gambar_dan_spesifikasi_produk` AS `gambar_dan_spesifikasi_produk`,`sa`.`tata_letak_pabrik` AS `tata_letak_pabrik`,`sa`.`peta_rute_pabrik_dari_bandara_terdekat` AS `peta_rute_pabrik_dari_bandara_terdekat`,`sa`.`daftar_isian_dan_kuesioner_importer` AS `daftar_isian_dan_kuesioner_importer`,`sa`.`copy_api` AS `copy_api`,`sa`.`penunjukkan_distributor` AS `penunjukkan_distributor`,`sa`.`laporan_pengawasan_iso_9001_terakhir` AS `laporan_pengawasan_iso_9001_terakhir`,`mou`.`mou` AS `mou`,`bp`.`bid_price` AS `bid_price`,`bp`.`bukti_bayar` AS `bukti_bayar`,`bp`.`bpn` AS `bpn`,`inv`.`invoice` AS `invoice`,`inv`.`kode_biling` AS `kode_biling`,`ja`.`jadwal_audit` AS `jadwal_audit`,`tp`.`struktur_organisasi` AS `struktur_organisasi_tp`,`tp`.`diagram_alir_produksi` AS `diagram_alir_produksi`,`tp`.`daftar_peralatan` AS `daftar_peralatan`,`tp`.`spesifikasi_peralatan` AS `spesifikasi_peralatan`,`tp`.`tata_letak_pabrik` AS `tata_letak_pabrik_tp`,`tp`.`peta_letak_pabrik_dari_bandara_terdekat` AS `peta_letak_pabrik_dari_bandara_terdekat`,`ap_sp`.`audit_plan` AS `audit_plan`,`ap_sp`.`sampling_plan` AS `sampling_plan`,`lap_sert`.`shu` AS `shu`,`lap_sert`.`bapc` AS `bapc`,`lap_sert`.`closed_ncr` AS `closed_ncr`,`lap_sert`.`laporan_hasil_sert` AS `laporan_hasil_sert`,`p`.`lembar_konSert` AS `lembar_konSert`,`p`.`draft_sert` AS `draft_sert`,`p`.`resi_pengiriman` AS `resi_pengiriman` from (((((((((`produk` `p` left join `persyaratan_dok_dalam_negeri` `sa` on((`sa`.`produk_id` = `p`.`id`))) left join `mou` on((`mou`.`produk_id` = `p`.`id`))) left join `bid_price` `bp` on((`bp`.`produk_id` = `p`.`id`))) left join `invoice` `inv` on((`inv`.`id` = `bp`.`invoice_id`))) left join `laporan_audit` `la` on((`la`.`produk_id` = `p`.`id`))) left join `jadwal_audit` `ja` on((`ja`.`id` = `la`.`jadwal_audit_id`))) left join `tinjauan_pp` `tp` on((`tp`.`id` = `la`.`tinjauan_pp_id`))) left join `audit_sampling_plan` `ap_sp` on((`ap_sp`.`produk_id` = `p`.`id`))) left join `laporan_hasil_sert` `lap_sert` on((`lap_sert`.`produk_id` = `p`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_sampling_plan`
--
ALTER TABLE `audit_sampling_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audit_sampling_plan_produk_id_foreign` (`produk_id`),
  ADD KEY `audit_sampling_plan_doc_maker_foreign` (`doc_maker`);

--
-- Indexes for table `bahan_hasil`
--
ALTER TABLE `bahan_hasil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `bid_price`
--
ALTER TABLE `bid_price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bid_price_produk_id_foreign` (`produk_id`),
  ADD KEY `bid_price_doc_maker_foreign` (`doc_maker`),
  ADD KEY `bid_price_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `defaultharga`
--
ALTER TABLE `defaultharga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dok_importir`
--
ALTER TABLE `dok_importir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dok_importir_review_dok_importir_id_foreign` (`review_dok_importir_id`);

--
-- Indexes for table `dok_manufaktur`
--
ALTER TABLE `dok_manufaktur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dok_manufaktur_review_dok_manufaktur_id_foreign` (`review_dok_manufaktur_id`);

--
-- Indexes for table `format_file`
--
ALTER TABLE `format_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_tahapan`
--
ALTER TABLE `group_tahapan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_seksi` (`role_seksi`);

--
-- Indexes for table `info_tambahan`
--
ALTER TABLE `info_tambahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_user_id_foreign` (`doc_maker`);

--
-- Indexes for table `jadwal_audit`
--
ALTER TABLE `jadwal_audit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_audit_user_id_foreign` (`doc_maker`);

--
-- Indexes for table `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `laporan_audit`
--
ALTER TABLE `laporan_audit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporan_audit_produk_id_foreign` (`produk_id`),
  ADD KEY `laporan_audit_auditor_foreign` (`auditor`(191)),
  ADD KEY `laporan_audit_jadwal_audit_id_foreign` (`jadwal_audit_id`),
  ADD KEY `laporan_audit_dok_importir_id_foreign` (`dok_importir_id`),
  ADD KEY `laporan_audit_dok_manufaktur_id_foreign` (`dok_manufaktur_id`),
  ADD KEY `laporan_audit_tinjauan_pp_id_foreign` (`tinjauan_pp_id`),
  ADD KEY `auditor` (`auditor`(191)),
  ADD KEY `auditor_2` (`auditor`(191));

--
-- Indexes for table `laporan_hasil_sert`
--
ALTER TABLE `laporan_hasil_sert`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporan_hasil_sert_produk_id_foreign` (`produk_id`),
  ADD KEY `laporan_hasil_sert_doc_maker_foreign` (`doc_maker`);

--
-- Indexes for table `master_tahap`
--
ALTER TABLE `master_tahap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mou`
--
ALTER TABLE `mou`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mou_produk_id_foreign` (`produk_id`),
  ADD KEY `mou_doc_maker_foreign` (`doc_maker`);

--
-- Indexes for table `notif_log`
--
ALTER TABLE `notif_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notif_log_user_id_foreign` (`user_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `no_surat`
--
ALTER TABLE `no_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `persyaratan_dok_dalam_negeri`
--
ALTER TABLE `persyaratan_dok_dalam_negeri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persyaratan_dok_dalam_negeri_produk_id_foreign` (`produk_id`),
  ADD KEY `review_dok_importir_id` (`review_dok_importir_id`);

--
-- Indexes for table `persyaratan_dok_luar_negeri`
--
ALTER TABLE `persyaratan_dok_luar_negeri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persyaratan_dok_luar_negeri_produk_id_foreign` (`produk_id`),
  ADD KEY `persyaratan_dok_luar_negeri_dok_importir_id_foreign` (`dok_importir_id`),
  ADD KEY `persyaratan_dok_luar_negeri_dok_manufaktur_id_foreign` (`dok_manufaktur_id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengirim_foreign` (`client`),
  ADD KEY `penerima_foreign` (`admin`),
  ADD KEY `produk_foreign` (`produk_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_user_id_foreign` (`user_id`);

--
-- Indexes for table `review_dok_importir`
--
ALTER TABLE `review_dok_importir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_dok_manufaktur`
--
ALTER TABLE `review_dok_manufaktur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_tinjauan_pp`
--
ALTER TABLE `review_tinjauan_pp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sert`
--
ALTER TABLE `sert`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `tinjauan_pp`
--
ALTER TABLE `tinjauan_pp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tinjauan_pp_review_tinjauan_pp_id_foreign` (`review_tinjauan_pp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_sampling_plan`
--
ALTER TABLE `audit_sampling_plan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_sampling_plan`
--
ALTER TABLE `audit_sampling_plan`
  ADD CONSTRAINT `audit_sampling_plan_doc_maker_foreign` FOREIGN KEY (`doc_maker`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `audit_sampling_plan_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bahan_hasil`
--
ALTER TABLE `bahan_hasil`
  ADD CONSTRAINT `bahan_hasil_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bid_price`
--
ALTER TABLE `bid_price`
  ADD CONSTRAINT `bid_price_doc_maker_foreign` FOREIGN KEY (`doc_maker`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bid_price_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bid_price_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dok_importir`
--
ALTER TABLE `dok_importir`
  ADD CONSTRAINT `dok_importir_review_dok_importir_id_foreign` FOREIGN KEY (`review_dok_importir_id`) REFERENCES `review_dok_importir` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dok_manufaktur`
--
ALTER TABLE `dok_manufaktur`
  ADD CONSTRAINT `dok_manufaktur_review_dok_manufaktur_id_foreign` FOREIGN KEY (`review_dok_manufaktur_id`) REFERENCES `review_dok_manufaktur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `info_tambahan`
--
ALTER TABLE `info_tambahan`
  ADD CONSTRAINT `info_tambahan_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_user_id_foreign` FOREIGN KEY (`doc_maker`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_audit`
--
ALTER TABLE `jadwal_audit`
  ADD CONSTRAINT `jadwal_audit_user_id_foreign` FOREIGN KEY (`doc_maker`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD CONSTRAINT `kuesioner_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laporan_audit`
--
ALTER TABLE `laporan_audit`
  ADD CONSTRAINT `laporan_audit_dok_importir_id_foreign` FOREIGN KEY (`dok_importir_id`) REFERENCES `persyaratan_dok_dalam_negeri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laporan_audit_dok_manufaktur_id_foreign` FOREIGN KEY (`dok_manufaktur_id`) REFERENCES `dok_manufaktur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laporan_audit_jadwal_audit_id_foreign` FOREIGN KEY (`jadwal_audit_id`) REFERENCES `jadwal_audit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laporan_audit_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laporan_audit_tinjauan_pp_id_foreign` FOREIGN KEY (`tinjauan_pp_id`) REFERENCES `tinjauan_pp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laporan_hasil_sert`
--
ALTER TABLE `laporan_hasil_sert`
  ADD CONSTRAINT `laporan_hasil_sert_doc_maker_foreign` FOREIGN KEY (`doc_maker`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laporan_hasil_sert_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mou`
--
ALTER TABLE `mou`
  ADD CONSTRAINT `mou_doc_maker_foreign` FOREIGN KEY (`doc_maker`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mou_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notif_log`
--
ALTER TABLE `notif_log`
  ADD CONSTRAINT `notif_log_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `persyaratan_dok_dalam_negeri`
--
ALTER TABLE `persyaratan_dok_dalam_negeri`
  ADD CONSTRAINT `persyaratan_dok_dalam_negeri_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `persyaratan_dok_luar_negeri`
--
ALTER TABLE `persyaratan_dok_luar_negeri`
  ADD CONSTRAINT `persyaratan_dok_luar_negeri_dok_importir_id_foreign` FOREIGN KEY (`dok_importir_id`) REFERENCES `dok_importir` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `persyaratan_dok_luar_negeri_dok_manufaktur_id_foreign` FOREIGN KEY (`dok_manufaktur_id`) REFERENCES `dok_manufaktur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `persyaratan_dok_luar_negeri_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `penerima_foreign` FOREIGN KEY (`admin`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pengirim_foreign` FOREIGN KEY (`client`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `produk_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tinjauan_pp`
--
ALTER TABLE `tinjauan_pp`
  ADD CONSTRAINT `tinjauan_pp_review_tinjauan_pp_id_foreign` FOREIGN KEY (`review_tinjauan_pp_id`) REFERENCES `review_tinjauan_pp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

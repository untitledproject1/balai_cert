-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2019 at 11:31 AM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.22-1+ubuntu18.04.1+deb.sury.org+1

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

--
-- Dumping data for table `audit_sampling_plan`
--

INSERT INTO `audit_sampling_plan` (`id`, `produk_id`, `doc_maker`, `audit_plan`, `sampling_plan`, `created_at`, `updated_at`) VALUES
(25, 71, 7, 'audit_plan-Test12-tes1-5de75239a42ea.pdf', 'sampling_plan-Test12-tes1-5de7527a55e62.pdf', '2019-12-04 06:29:13', '2019-12-04 06:30:24'),
(26, 75, 7, 'audit_plan-PT_MUTIARA_INDAH-sendok_keramik-5de8ca1e88db1.pdf', 'sampling_plan-PT_MUTIARA_INDAH-sendok_keramik-5de8ca24dcd03.pdf', '2019-12-05 09:13:02', '2019-12-05 09:13:13'),
(27, 73, 7, 'audit_plan-Maju_Jaya_Keramik-Kloset_Berdiri-5de8d9a61f3db.pdf', 'sampling_plan-Maju_Jaya_Keramik-Kloset_Berdiri-5de8d9aba5871.pdf', '2019-12-05 10:19:18', '2019-12-05 10:19:27'),
(28, 76, 7, 'audit_plan-qwoeiu-Produk5-5de99c329863d.pdf', 'sampling_plan-qwoeiu-Produk5-5de99c36a938a.pdf', '2019-12-06 00:09:22', '2019-12-06 00:09:31'),
(29, 74, 7, 'audit_plan-testinggg-Ubinss-5de9ef2a1a78e.pdf', 'sampling_plan-testinggg-Ubinss-5de9ef35a9f33.pdf', '2019-12-06 06:03:22', '2019-12-06 06:03:47');

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

--
-- Dumping data for table `bahan_hasil`
--

INSERT INTO `bahan_hasil` (`id`, `produk_id`, `lengkap`, `form_21`, `spek_pembelian`, `form_42`, `peralatan`, `form_22`, `form_31`, `form_32`, `form_41`, `form_511`, `form_512`, `form_521`, `form_522`, `form_523`, `form_524`) VALUES
(53, 71, 1, NULL, '[{\"jenis_bahan\":null,\"spesifikasi\":null,\"pemasok\":null}]', NULL, '[{\"nama_alat\":null,\"nama_pembuat\":null,\"acuan\":null,\"sistem\":null,\"sertifikat\":null}]', '[null,\"sad\"]', '[null,null]', '[null,null]', '[null,null]', '[null,null]', '[null,null]', '[null,null]', '[null,null]', '[null,null]', '[null,null,null]'),
(55, 73, 1, NULL, '[{\"jenis_bahan\":\"zinum\",\"spesifikasi\":\"kon\",\"pemasok\":\"lop\"},{\"jenis_bahan\":\"asd\",\"spesifikasi\":\"ad\",\"pemasok\":\"ad\"},{\"jenis_bahan\":\"aafafa\",\"spesifikasi\":\"asas\",\"pemasok\":\"dadad\"}]', 'B.4_4.2-Maju_Jaya_Keramik-Kloset_Berdiri-5de883f617d3d.pdf', '[{\"nama_alat\":\"saasfa\",\"nama_pembuat\":\"fafaf\",\"acuan\":\"sfsag\",\"sistem\":\"asgsg\",\"sertifikat\":\"vzcvdsaf\"},{\"nama_alat\":\"asfASFA\",\"nama_pembuat\":\"FSAFAW\",\"acuan\":\"WF\",\"sistem\":\"SFASFA\",\"sertifikat\":\"FASFSF\"},{\"nama_alat\":\"ADASDA\",\"nama_pembuat\":\"AWFEWAF\",\"acuan\":\"SDFSFSF\",\"sistem\":\"FQWFWF\",\"sertifikat\":\"SFSFS\"}]', '[null,\"asdfdfdg\"]', '[\"B.3_3.2-Maju_Jaya_Keramik-Kloset_Berdiri-5de882c1295a0.pdf\",null]', '[null,\"asdadaw\"]', '[\"B.4_4.1-Maju_Jaya_Keramik-Kloset_Berdiri-5de886bc03e03.pdf\",\"abcdefg\"]', '[\"B.5_5.1.1-Maju_Jaya_Keramik-Kloset_Berdiri-5de87b4d03004.pdf\",null]', '[\"B.5_5.1.2-Maju_Jaya_Keramik-Kloset_Berdiri-5de87b63285cc.pdf\",null]', '[\"B.5_5.2.1-Maju_Jaya_Keramik-Kloset_Berdiri-5de87b7cb0e37.pdf\",null]', '[\"B.5_5.2.2-Maju_Jaya_Keramik-Kloset_Berdiri-5de8856d7e700.pdf\",\"absbsddsf\"]', '[null,\"ajibeh\"]', '[0,null,null]'),
(56, 75, 1, NULL, '[{\"jenis_bahan\":\"abu rokok\",\"spesifikasi\":\"dengan nikotin tinggi\",\"pemasok\":\"sampoerni\"}]', NULL, '[{\"nama_alat\":\"gunting\",\"nama_pembuat\":\"pak ginting\",\"acuan\":\"bantal guling\",\"sistem\":\"setiap jam\",\"sertifikat\":\"blm ada\"}]', '[null,\"dengan metode akupuntur yang digunakan sejak jaman dahulu\"]', '[\"B.3_3.2-PT_MUTIARA_INDAH-sendok_keramik-5de89ead58422.pdf\",null]', '[null,\"ini masuk ga\"]', '[\"B.4_4.1-PT_MUTIARA_INDAH-sendok_keramik-5de89ebb299d0.pdf\",\"pengendalian yang dilakukan oleh pengendalian air\"]', '[\"B.5_5.1.1-PT_MUTIARA_INDAH-sendok_keramik-5de89f8275b20.pdf\",null]', '[\"B.5_5.1.2-PT_MUTIARA_INDAH-sendok_keramik-5de89f8aa2455.pdf\",null]', '[\"B.5_5.2.1-PT_MUTIARA_INDAH-sendok_keramik-5de89f917a458.pdf\",null]', '[\"B.5_5.2.2-PT_MUTIARA_INDAH-sendok_keramik-5de89f9734a2d.pdf\",\"ini masuk ga 522\"]', '[\"B.5_5.2.3-PT_MUTIARA_INDAH-sendok_keramik-5de89f9dbcbe6.pdf\",null]', '[0,null,null]'),
(57, 74, 1, NULL, '[{\"jenis_bahan\":null,\"spesifikasi\":null,\"pemasok\":null}]', NULL, '[{\"nama_alat\":null,\"nama_pembuat\":null,\"acuan\":null,\"sistem\":null,\"sertifikat\":null}]', '[null,null]', '[null,null]', '[null,null]', '[null,null]', '[null,null]', '[null,null]', '[null,null]', '[null,null]', '[null,null]', '[null,null,null]'),
(58, 76, 1, NULL, '[{\"jenis_bahan\":null,\"spesifikasi\":null,\"pemasok\":null}]', NULL, '[{\"nama_alat\":null,\"nama_pembuat\":null,\"acuan\":null,\"sistem\":null,\"sertifikat\":null}]', '[null,null]', '[null,null]', '[null,null]', '[null,null]', '[\"B.5_5.1.1-qwoeiu-Produk5-5de9819d36832.pdf\",\"lakjsl\"]', '[null,null]', '[null,null]', '[null,null]', '[null,null]', '[null,null,null]'),
(59, 77, 1, 'B.2_2.1-PT_SARI_WARNA-Gelas_Keramik-5de9f474a573e.pdf', NULL, 'B.4_4.2-PT_SARI_WARNA-Gelas_Keramik-5de9f49e12bd3.pdf', NULL, '[\"B.2_2.2-PT_SARI_WARNA-Gelas_Keramik-5de9f47b15091.pdf\",null]', '[\"B.3_3.2-PT_SARI_WARNA-Gelas_Keramik-5de9f48f78494.pdf\",null]', '[null,null]', '[\"B.4_4.1-PT_SARI_WARNA-Gelas_Keramik-5de9f494081c0.pdf\",\"ini rincianya\"]', '[\"B.5_5.1.1-PT_SARI_WARNA-Gelas_Keramik-5de9f4a2442a8.pdf\",\"ini manual\"]', '[\"B.5_5.1.2-PT_SARI_WARNA-Gelas_Keramik-5de9f4aa4ed91.pdf\",\"ini manualya\"]', '[\"B.5_5.2.1-PT_SARI_WARNA-Gelas_Keramik-5de9f4b555ef2.pdf\",\"ini manualnya\"]', '[\"B.5_5.2.2-PT_SARI_WARNA-Gelas_Keramik-5de9f4c0c480a.pdf\",\"ini manualmya\"]', '[\"B.5_5.2.3-PT_SARI_WARNA-Gelas_Keramik-5de9f4c9b16d8.pdf\",\"ini manual\"]', '[0,null,null]'),
(60, 79, 1, NULL, '[{\"jenis_bahan\":null,\"spesifikasi\":null,\"pemasok\":null}]', NULL, '[{\"nama_alat\":null,\"nama_pembuat\":null,\"acuan\":null,\"sistem\":null,\"sertifikat\":null}]', '[null,null]', '[null,null]', '[null,null]', '[null,null]', '[null,null]', '[null,null]', '[null,null]', '[null,null]', '[null,null]', '[null,null,null]');

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

--
-- Dumping data for table `bid_price`
--

INSERT INTO `bid_price` (`id`, `produk_id`, `doc_maker`, `bid_price`, `tgl_pembuatan`, `hal`, `harga`, `status`, `verifikasi_bayar`, `tanggal_bayar`, `invoice_id`, `bukti_bayar`, `apprv_bukti_bayar`, `bpn`, `kode_ntpn`, `tgl_byr_keuangan`, `created_at`, `updated_at`) VALUES
(98, 71, 3, 'Penawaran_harga-5de7486186a1020191204124713.pdf', '2019-12-04', 'sdfsdf', '{\"b_permohonan\":1000000,\"b_audit1\":1000000,\"b_kepala\":1000000,\"b_ppc\":1000000,\"b_pTeknis\":1000000,\"b_sert\":1000000,\"b_total\":6000000}', 1, '1', '2019-12-04', 27, 'Bukti_pembayaran-5de74d3133ee620191204130745.pdf', 1, 'BPN-5de750971abd620191204132215.pdf', 'asd87', '2019-12-04', '2019-12-04 05:47:13', '2019-12-04 06:22:15'),
(103, 73, 3, 'Penawaran_harga-Maju_Jaya_Keramik-Kloset_Berdiri-5de8b8b4778f5.pdf', '2019-12-06', 'asdad', '{\"b_permohonan\":123123,\"b_audit1\":123123,\"b_kepala\":123123,\"b_ppc\":123123,\"b_pTeknis\":123123,\"b_sert\":123123,\"b_total\":738738}', 1, NULL, NULL, 29, 'Bukti_pembayaran-5de8c614ae94d20191205155548.pdf', 1, 'BPN-5de8c741bc75320191205160049.pdf', 'asdqewq', '2019-12-05', '2019-12-05 07:58:32', '2019-12-05 09:00:49'),
(104, 75, 3, 'Penawaran_harga-5de8b98de717f20191205150221.pdf', '2019-12-26', 'ini halnya', '{\"b_permohonan\":3000000,\"b_audit1\":7000000,\"b_kepala\":900000,\"b_ppc\":900000,\"b_pTeknis\":1000000,\"b_sert\":3000000,\"b_total\":15800000}', 1, '1', '2019-12-12', 32, 'Bukti_pembayaran-5de8c19bdb96420191205153643.pdf', 1, 'BPN-5de8c74d35ea320191205160101.pdf', '121', '2019-12-18', '2019-12-05 08:00:43', '2019-12-05 09:01:01'),
(105, 74, 3, 'Penawaran_harga-testinggg-Ubinss-5de8b943ed864.pdf', '2019-12-05', 'ini adalah hal', '{\"b_permohonan\":2000000,\"b_audit1\":1200000,\"b_kepala\":1500000,\"b_ppc\":1230000,\"b_pTeknis\":1500000,\"b_sert\":2000000,\"b_total\":9430000}', 1, NULL, NULL, 30, 'Bukti_pembayaran-5de8bfcbdb94f20191205152859.pdf', 1, 'BPN-5de8ccddee54120191205162445.pdf', '1222334', '2019-12-05', '2019-12-05 08:00:53', '2019-12-05 09:24:45'),
(106, 76, 3, 'Penawaran_harga-qwoeiu-Produk5-5de9905415d58.pdf', '2019-12-06', 'asdad', '{\"b_permohonan\":123123,\"b_audit1\":123123,\"b_kepala\":123123,\"b_ppc\":123123,\"b_pTeknis\":123123,\"b_sert\":123123,\"b_total\":738738}', 1, '1', '2019-12-06', 33, 'Bukti_pembayaran-5de99ac99618320191206070321.pdf', 1, 'BPN-5de99ae96146220191206070353.pdf', 'asd8723', '2019-12-06', '2019-12-05 23:12:09', '2019-12-06 00:03:53'),
(107, 77, 3, 'Penawaran_harga-PT_SARI_WARNA-Gelas_Keramik-5dea0ea695018.pdf', '2019-12-18', 'ini hal', '{\"b_permohonan\":10,\"b_audit1\":20,\"b_kepala\":10,\"b_ppc\":1,\"b_pTeknis\":1,\"b_sert\":1,\"b_total\":43}', 1, NULL, NULL, 34, NULL, NULL, NULL, NULL, NULL, '2019-12-06 08:14:57', '2019-12-06 08:28:53'),
(115, 79, 3, 'Penawaran_harga-Test12-ProdukTest_5df73c6a2d33f.pdf', '2019-12-16', 'asdasd', '{\"b_permohonan\":2110043,\"b_audit1\":2000043,\"b_kepala\":2000043,\"b_ppc\":2000043,\"b_pTeknis\":2000043,\"b_sert\":2000043,\"b_total\":12110258}', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-16 07:15:25', '2019-12-16 08:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `defaultHarga`
--

CREATE TABLE `defaultHarga` (
  `id` bigint(20) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `defaultHarga`
--

INSERT INTO `defaultHarga` (`id`, `jenis`, `harga`) VALUES
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

--
-- Dumping data for table `info_tambahan`
--

INSERT INTO `info_tambahan` (`id`, `produk_id`, `lengkap`, `kuis1_opsi`, `kuis1_isi`, `kuis2_opsi`, `kuis2_isi`, `kuis3_opsi`, `kuis3_isi`, `kuis4_opsi`, `kuis4_isi`, `kuis5_opsi`, `kuis6`) VALUES
(56, 71, 1, 0, 'null', NULL, 'null', NULL, 'null', NULL, 'null', NULL, NULL),
(58, 73, 1, 1, '[\"Mizan\",\"20 sep 2019\"]', 1, 'BCA Group', 1, '[\"Wafer Tango\",\"Jl. Trunojoyo, no. 7\"]', 1, '[[\"MUI\",\"20 september 2019\"],null]', 1, '2019-12-06'),
(59, 75, 1, 0, 'null', 1, 'Group dari PT MSN', 1, '[\"PT MSN\",\"jalan kayu agung 2 no 09\"]', 1, '[[\"PT HEXA\",\"maret 2020\"],null]', 1, '2019-12-19'),
(60, 74, 1, 1, '[\"PT. Balai Keramik\",\"2020\"]', 1, 'null', NULL, 'null', NULL, 'null', NULL, NULL),
(61, 76, 1, NULL, 'null', NULL, 'null', NULL, 'null', 1, '[[\"BKK\",\"2020\"],null]', NULL, NULL),
(62, 77, 1, 0, 'null', 1, 'PT MSN', 0, 'null', 1, '[[\"PT HEXA\",\"20 Maret 2020\"],null]', 1, '2019-12-25'),
(63, 79, 1, NULL, 'null', NULL, 'null', NULL, 'null', NULL, 'null', NULL, NULL);

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

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `doc_maker`, `invoice`, `status`, `tgl_pembuatan`, `kode_biling`, `masa_kode_biling`, `created_at`, `updated_at`) VALUES
(27, 6, 'Invoice-5de748ef9995d20191204124935.pdf', 1, '2019-12-03', 'Kode_Biling-5de749257436220191204125029.pdf', '2019-12-11', '2019-12-04 05:49:35', '2019-12-04 05:50:29'),
(29, 6, 'Invoice-Maju_Jaya_Keramik-Kloset_Berdiri-5de8bfc4f3fa6.pdf', 1, '2019-12-05', 'Kode_Biling-5de8c1048a5a120191205153412.pdf', '2019-12-12', '2019-12-05 07:59:51', '2019-12-05 08:34:12'),
(30, 6, 'Invoice-testinggg-Ubinss-5de8ca453436c.pdf', 1, '2019-12-05', 'Kode_Biling-5de8cd028cb7420191205162522.pdf', '2019-12-12', '2019-12-05 08:03:11', '2019-12-05 09:25:22'),
(32, 6, 'Invoice-PT_MUTIARA_INDAH-sendok_keramik-5de8c0a11622d.pdf', 1, '2019-12-03', 'Kode_Biling-5de8c0cb941bf20191205153315.pdf', '2020-01-02', '2019-12-05 08:32:15', '2019-12-05 08:33:15'),
(33, 6, 'Invoice-qwoeiu-Produk5-5de997fe4f2ff.pdf', 1, '2019-12-06', 'Kode_Biling-5de99aab58e1c20191206070251.pdf', '2019-12-13', '2019-12-05 23:21:39', '2019-12-06 00:02:51'),
(34, 6, 'Invoice-PT_SARI_WARNA-Gelas_Keramik-5dea11d805a5a.pdf', 1, '2019-12-19', 'Kode_Biling-5dea120caaeb620191206153212.pdf', '2019-12-26', '2019-12-06 08:28:53', '2019-12-06 08:32:12');

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

--
-- Dumping data for table `jadwal_audit`
--

INSERT INTO `jadwal_audit` (`id`, `jadwal_audit`, `apprv`, `doc_maker`, `created_at`, `updated_at`) VALUES
(4, 'Surat_Pemberitahuan_Jadwal_Audit-5de7517c8658d20191204132604.pdf', 1, 7, '2019-12-04 06:26:04', '2019-12-04 06:26:44'),
(5, 'Surat_Pemberitahuan_Jadwal_Audit-5de8c80651fe920191205160406.pdf', 1, 7, '2019-12-05 09:04:06', '2019-12-05 09:04:38'),
(6, 'Surat_Pemberitahuan_Jadwal_Audit-5de8d4fe4198320191205165926.pdf', 1, 7, '2019-12-05 09:59:26', '2019-12-05 10:02:41'),
(7, 'Surat_Pemberitahuan_Jadwal_Audit-5de8d77c079e120191205171004.pdf', 1, 7, '2019-12-05 10:10:04', '2019-12-05 10:12:16'),
(8, 'Surat_Pemberitahuan_Jadwal_Audit-5de99b5375e7320191206070539.pdf', 1, 7, '2019-12-06 00:05:39', '2019-12-06 00:06:15');

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

--
-- Dumping data for table `kuesioner`
--

INSERT INTO `kuesioner` (`id`, `produk_id`, `lengkap`, `kuis1`, `kuis2`, `kuis3`, `kuis4`, `kuis_111`, `kuis_112`, `kuis_113`, `kuis_121`, `kuis_122`, `kuis_123`, `kuis_124`, `kuis_125`, `kuis_126`, `kuis_127`, `kuis_128`) VALUES
(52, 71, 1, NULL, 0, '[null,null]', '[null,null]', '[null,null]', '[null,null,null]', NULL, NULL, NULL, '[null,null]', NULL, NULL, '[[null,null,null],null]', '[null,null]', NULL),
(54, 73, 1, '2019-12-06', 1, '[1,null]', '[1,\"B_4-Maju_Jaya_Keramik-Kloset_Berdiri-5de883a2b0134.pdf\"]', '[0,null]', '[1,2,null]', 'ISO meren', 'Uzumaki', 'Naruto', '[1,\"Di sunter\"]', 'Inspektur Jarjit', 1, '[[1,1,1],0]', '[0,null]', 'oke lah'),
(55, 75, 1, '2019-12-25', 1, '[0,\"28-12-2019\"]', '[1,\"B_4-PT_MUTIARA_INDAH-sendok_keramik-5de88c0dd7f38.pdf\"]', '[1,0]', '[1,3,null]', 'sistem hidrolik bertingkat', 'insan kamil', 'syahrini', '[1,\"dipisah karena biar tidak bentrok\"]', 'boy kamil', 1, '[[0,0,1],1]', '[0,null]', 'organisasi ini berjalan rahasia dibawah kepimimpinan kerajaan konoha'),
(56, 74, 1, '2019-12-12', 1, '[1,null]', '[null,null]', '[null,null]', '[null,null,null]', NULL, NULL, NULL, '[null,null]', NULL, NULL, '[[null,null,null],null]', '[null,null]', NULL),
(57, 76, 1, NULL, NULL, '[null,null]', '[null,null]', '[null,null]', '[null,null,null]', NULL, NULL, NULL, '[null,null]', NULL, NULL, '[[null,null,null],null]', '[0,null]', NULL),
(58, 77, 1, '2019-12-26', 1, '[1,null]', '[1,\"B_4-PT_SARI_WARNA-Gelas_Keramik-5de9f4031df8b.pdf\"]', '[1,1]', '[0,null,\"cara dengan menggunakan piring\"]', 'sistem sertifikasi BBK', 'Insan kamil', 'Bagus', '[0,null]', 'Ipin', 1, '[[1,0,0],0]', '[0,null]', 'oprasional mutu'),
(59, 79, 1, NULL, NULL, '[null,null]', '[null,null]', '[null,null]', '[null,null,null]', NULL, NULL, NULL, '[null,null]', NULL, NULL, '[[null,null,null],null]', '[null,null]', NULL);

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

--
-- Dumping data for table `laporan_audit`
--

INSERT INTO `laporan_audit` (`id`, `produk_id`, `auditor`, `dok_importir_id`, `dok_manufaktur_id`, `tinjauan_pp_id`, `jadwal_audit_id`, `tgl_audit`, `ringkasan`, `created_at`, `updated_at`) VALUES
(4, 71, 'Auditor1', 69, NULL, 36, 4, '2019-12-04', 'asdiuads', '2019-12-04 06:26:04', '2019-12-04 06:28:15'),
(5, 75, 'rizal fuzi', 72, NULL, 37, 5, '2019-12-05', 'dokumen sudah lengkap bro lanjtkan', '2019-12-05 09:04:06', '2019-12-05 09:11:28'),
(6, 74, 'Lucas Barden', 73, NULL, 40, 6, '2019-12-06', 'semua data anda bagus! 10/10', '2019-12-05 09:59:26', '2019-12-06 02:34:25'),
(7, 73, 'Auditor1', 71, NULL, 38, 7, '2019-12-05', 'lengkap', '2019-12-05 10:10:04', '2019-12-05 10:15:06'),
(8, 76, 'Auditor3', 74, NULL, 39, 8, '2019-12-06', 'asdasd', '2019-12-06 00:05:39', '2019-12-06 00:08:22');

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

--
-- Dumping data for table `laporan_hasil_sert`
--

INSERT INTO `laporan_hasil_sert` (`id`, `produk_id`, `shu`, `bapc`, `closed_ncr`, `kelengkapan_dok`, `doc_maker`, `laporan_hasil_sert`, `tanggal_audit`, `tim_audit`, `hasil_assesmen`, `verifikasi`, `bapc_lap`, `hasil_pengujian`, `rekomendasi`, `status_timTeknis`, `input_evaluasi_tt`, `signed_lapSert`, `created_at`, `updated_at`) VALUES
(23, 71, 'shu-Test12-tes1-5de753100104b.pdf', 'bapc-Test12-tes1-5de7531bc3ec1.pdf', 'closed_ncr-Test12-tes1-5de7531442c8d.pdf', 1, 7, 'Laporan_Hasil_Sertifikasi-5de80f70582c1.pdf', '4-4 Desember 2019', 'Tim1, Tim2, dan Tim3', '1', '1', '1', '0', 'nama: tim teknis1\r\nrekomendasi: asdkasdkjak\r\n\r\nnama: tim teknis2\r\nrekomendasi: asdkasdkjak', 1, NULL, 1, '2019-12-04 06:32:48', '2019-12-04 19:56:32'),
(24, 75, 'shu-PT_MUTIARA_INDAH-sendok_keramik-5de8cae0dbad5.pdf', 'bapc-PT_MUTIARA_INDAH-sendok_keramik-5de8cae874771.pdf', 'closed_ncr-PT_MUTIARA_INDAH-sendok_keramik-5de8caed3916b.pdf', 1, 7, 'Laporan_Hasil_Sertifikasi-5de8d20ad286e.pdf', '11-13 Desember 2019', 'tim1,tim2', '0', '0', '1', '1', 'nama : insanx\r\nket : bagus lanjutkanx\r\n\r\nnama : ardin\r\nket : memuaskan lanjut\r\n\r\nnama: yoni\r\nket : sangat bagus lanjutkan\r\n\r\nnama: rifki\r\nket : mantul', 1, 'lanjutkan', 1, '2019-12-05 09:16:16', '2019-12-05 09:46:50'),
(25, 73, 'shu-Maju_Jaya_Keramik-Kloset_Berdiri-5de8d9d3b850d.pdf', 'bapc-Maju_Jaya_Keramik-Kloset_Berdiri-5de8d9e0609d3.pdf', 'closed_ncr-Maju_Jaya_Keramik-Kloset_Berdiri-5de8d9e520a74.pdf', 1, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-05 10:20:03', '2019-12-05 10:20:35'),
(26, 76, 'shu-qwoeiu-Produk5-5de99c687bc20.pdf', 'bapc-qwoeiu-Produk5-5de99c9846c7e.pdf', 'closed_ncr-qwoeiu-Produk5-5de99c9ceb8d7.pdf', 1, 7, 'Laporan_Hasil_Sertifikasi-5de9a497cb8b6.pdf', '6-7 Desember 2019', 'asd,as', '1', '1', '1', '1', 'nama: asd\r\nrekomendasi: asd', 1, 'zcxzxc', 1, '2019-12-06 00:10:16', '2019-12-06 00:45:11'),
(27, 74, 'shu-testinggg-Ubinss-5de9efc87bd18.pdf', 'bapc-testinggg-Ubinss-5de9efcf90896.pdf', 'closed_ncr-testinggg-Ubinss-5de9efe05e641.pdf', 1, 7, 'Laporan_Hasil_Sertifikasi-5dea182d6ebc2.pdf', '6-8 Desember 2019', 'tim audit 1, tim audit 2', '1', '1', '1', '1', 'isi rekomendasi di sini...', 1, 'ini keputusan dari komite evaluasi rapat teknis', 1, '2019-12-06 06:06:00', '2019-12-06 08:58:21');

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

--
-- Dumping data for table `mou`
--

INSERT INTO `mou` (`id`, `produk_id`, `doc_maker`, `mou`, `tgl_kontrak`, `tgl_exp`, `status`, `created_at`, `updated_at`) VALUES
(36, 71, 4, '5de7486232a4120191204124714.pdf', '2019-12-04', '2019-12-07', 2, '2019-12-04 05:44:53', '2019-12-04 05:47:14'),
(40, 73, 4, '5de8b8a8c27b320191205145832.pdf', '2019-12-05', '2019-12-08', 2, '2019-12-05 06:49:16', '2019-12-05 07:58:32'),
(45, 74, 4, '5de8b9362bbaa20191205150054.pdf', '2019-12-05', '2019-12-08', 2, '2019-12-05 07:56:05', '2019-12-05 08:00:54'),
(46, 75, 4, '5de8b92c6155d20191205150044.pdf', '2019-12-18', '2019-12-21', 2, '2019-12-05 07:56:53', '2019-12-05 08:00:44'),
(47, 76, 4, '5de98eca9487220191206061210.pdf', '2019-12-06', '2019-12-09', 2, '2019-12-05 22:59:16', '2019-12-05 23:12:10'),
(48, 77, 4, '5dea0e0287fb320191206151458.pdf', '2019-12-09', '2019-12-09', 2, '2019-12-06 07:40:49', '2019-12-06 08:14:58'),
(51, 79, 4, 'MOU-Test12-ProdukTest-5df72f0f82a3d.pdf', '2019-12-16', '2019-12-19', 2, '2019-12-16 07:02:12', '2019-12-16 07:15:27');

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

--
-- Dumping data for table `no_surat`
--

INSERT INTO `no_surat` (`id`, `jenis`, `dok`, `no`) VALUES
(95, 'mou', '5ddf925415b1a20191128162436.pdf', '100000/LSPro-BBK'),
(96, 'penawaran_harga', 'Penawaran_harga-5ddf92d65bb4c20191128162646.pdf', '7546468512'),
(97, 'invoice', 'Invoice-5ddf9341c7f0520191128162833.pdf', '99887554215'),
(98, 'mou', '5de05da2e199420191129065202.pdf', '100000/LSPro-BBK'),
(99, 'penawaran_harga', 'Penawaran_harga-5de05da239ffd20191129065202.pdf', '7546468512'),
(100, 'invoice', 'Invoice-5de060bc762d620191129070516.pdf', '10887554215'),
(101, 'mou', '201912021741155de4ea4b1b46a.pdf', '100001/LSPro-BBK'),
(102, 'mou', '201912030535485de591c4bcd86.pdf', '100002/LSPro-BBK'),
(103, 'penawaran_harga', 'Penawaran_harga-5de5910dc57fe20191203053245.pdf', '7546468513'),
(104, 'invoice', 'Invoice-5de59bc4b94db20191203061828.pdf', '10887554216'),
(105, 'mou', '5de5d7c6d1dc820191203103430.pdf', '100003/LSPro-BBK'),
(106, 'penawaran_harga', 'Penawaran_harga-5de5d7c63271520191203103430.pdf', '7546468514'),
(107, 'invoice', 'Invoice-5de5da498368920191203104513.pdf', '151/BPPI/BBK/INV-S/12/2019'),
(108, 'mou', '5de6f5e2bdf6d20191204065514.pdf', '100004/LSPro-BBK'),
(109, 'penawaran_harga', 'Penawaran_harga-5de6f5e2210aa20191204065514.pdf', '7546468515'),
(110, 'invoice', 'Invoice-5de6f6b0bbc0d20191204065840.pdf', '152/BPPI/BBK/INV-S/12/2019'),
(111, 'mou', '5de7486232a4120191204124714.pdf', '100005/LSPro-BBK'),
(112, 'penawaran_harga', 'Penawaran_harga-5de7486186a1020191204124713.pdf', '7546468516'),
(113, 'invoice', 'Invoice-5de748ef9995d20191204124935.pdf', '153/BPPI/BBK/INV-S/12/2019'),
(114, 'mou', '5de77e02b825920191204163602.pdf', '123/LSPro-BBK'),
(115, 'penawaran_harga', 'Penawaran_harga-5de77f37edbbd20191204164111.pdf', 'keramichh-04122019'),
(116, 'mou', '5de889f4c266f20191205113916.pdf', '1234/LSPro-BBK'),
(117, 'mou', '5de8a5396592820191205133537.pdf', '1235/LSPro-BBK'),
(118, 'mou', '5de8a86c8c62920191205134916.pdf', '122/LSPro-BBK'),
(119, 'mou', '5de8b8a8c27b320191205145832.pdf', '1235/LSPro-BBK'),
(120, 'penawaran_harga', 'Penawaran_harga-5de8ab26c446920191205140054.pdf', 'kloset-berdiri-010233'),
(121, 'invoice', 'Invoice-5de8ad6c2495520191205141036.pdf', 'kloset-berdiri-INV-199488'),
(122, 'mou', '5de8add6627de20191205141222.pdf', '1236/LSPro-BBK'),
(123, 'penawaran_harga', 'Penawaran_harga-5de8b3cc2481320191205143748.pdf', 'kloset-berdiri-010233'),
(124, 'penawaran_harga', 'Penawaran_harga-Maju_Jaya_Keramik-Kloset_Berdiri-5de8b66b8ab38.pdf', 'kloset-berdiri-010233'),
(125, 'mou', '5de8b6be4369820191205145022.pdf', 'ubinss/LSPro/BBK'),
(126, 'mou', 'mou--Ubinss-5de8b7db1785c.pdf', 'ubinss/LSPro/BBK'),
(127, 'mou', '5de8b9362bbaa20191205150054.pdf', 'ubinss/LSPro/bbk'),
(128, 'mou', '5de8b92c6155d20191205150044.pdf', 'ubinsqq/LSPro/bbk'),
(129, 'penawaran_harga', 'Penawaran_harga-Maju_Jaya_Keramik-Kloset_Berdiri-5de8b8b4778f5.pdf', 'kloset-berdiri-010234'),
(130, 'invoice', 'Invoice-Maju_Jaya_Keramik-Kloset_Berdiri-5de8bfc4f3fa6.pdf', 'kloset-berdiri-INV-199489'),
(131, 'penawaran_harga', 'Penawaran_harga-5de8b98de717f20191205150221.pdf', 'sendok-010234'),
(132, 'penawaran_harga', 'Penawaran_harga-testinggg-Ubinss-5de8b943ed864.pdf', 'ubinss/102108'),
(133, 'invoice', 'Invoice-testinggg-Ubinss-5de8ca453436c.pdf', 'ubinss-INV-199488'),
(134, 'invoice', 'Invoice-5de8bacee3baa20191205150742.pdf', 'sendok-INV-199488'),
(135, 'invoice', 'Invoice-PT_MUTIARA_INDAH-sendok_keramik-5de8c0a11622d.pdf', 'sendokx-INV-199488'),
(136, 'mou', '5de98eca9487220191206061210.pdf', 'ubinsqq1/LSPro/bbk'),
(137, 'penawaran_harga', 'Penawaran_harga-qwoeiu-Produk5-5de9905415d58.pdf', 'ubinss/102108'),
(138, 'invoice', 'Invoice-qwoeiu-Produk5-5de997fe4f2ff.pdf', 'sendokx-INV-199489'),
(139, 'mou', '5dea0e0287fb320191206151458.pdf', 'ub34/LSPro/bbk'),
(140, 'penawaran_harga', 'Penawaran_harga-PT_SARI_WARNA-Gelas_Keramik-5dea0ea695018.pdf', '883/102108'),
(141, 'invoice', 'Invoice-PT_SARI_WARNA-Gelas_Keramik-5dea11d805a5a.pdf', '343-INV-199489'),
(142, 'mou', '5df33dc52698d20191213142909.pdf', 'ub35/LSPro/bbk'),
(143, 'mou', 'MOU-Test12-ProdukTest-5df724388e80f.pdf', 'ub36/LSPro/bbk'),
(144, 'penawaran_harga', 'Penawaran_harga-5df6f914d6ac820191216102508.pdf', '883/102108'),
(145, 'penawaran_harga', 'Penawaran_harga-Test12-ProdukTest-5df6fdffa6e81.pdf', '883/102108'),
(146, 'penawaran_harga', 'Penawaran_harga-Test12-ProdukTest-5df6fe97952af.pdf', '883/102109'),
(147, 'penawaran_harga', 'Penawaran_harga-Test12-ProdukTest-5df704dbdc071.pdf', '883/102109'),
(148, 'penawaran_harga', 'Penawaran_harga-Test12-ProdukTest-5df72436d1933.pdf', '883/102109'),
(149, 'mou', 'MOU-Test12-ProdukTest-5df72f0f82a3d.pdf', 'ub37/LSPro/bbk'),
(150, 'penawaran_harga', 'Penawaran_harga-Test12-ProdukTest_5df73c6a2d33f.pdf', '884/102109');

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

--
-- Dumping data for table `persyaratan_dok_dalam_negeri`
--

INSERT INTO `persyaratan_dok_dalam_negeri` (`id`, `produk_id`, `sni`, `pesan_form_kuesioner`, `dok_tidak_lengkap`, `surat_permohonan_sertifikat_sni`, `copy_iui`, `copy_akte_notaris_perusahaan`, `copy_tdp`, `copy_npwp`, `copy_sert_patent_merek`, `copy_sert_iso_9001`, `laporan_audit_sistem_mutu_terakhir`, `panduan_mutu`, `daftar_induk_dok`, `struktur_organisasi`, `diagram_alir_proses_produksi`, `surat_pertunjukkan_wakil_manajemen`, `ilustrasi_pembubuhan_tanda_sni`, `tabel_daftar_tipe_produk`, `gambar_dan_spesifikasi_produk`, `tata_letak_pabrik`, `peta_rute_pabrik_dari_bandara_terdekat`, `daftar_isian_dan_kuesioner_importer`, `copy_api`, `penunjukkan_distributor`, `sert_smm`, `laporan_pengawasan_iso_9001_terakhir`, `review_dok_importir_id`, `created_at`, `updated_at`) VALUES
(69, 71, 1, NULL, NULL, 'surat_permohonan_sertifikat_sni-Test12-tes1-5de7432eae8bb.pdf', 'copy_iui-Test12-tes1-5de74333e2eac.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 29, '2019-12-04 05:25:02', '2019-12-04 06:28:15'),
(71, 73, 1, NULL, NULL, 'surat_permohonan_sertifikat_sni-Maju_Jaya_Keramik-Kloset_Berdiri-5de877ff47919.doc', 'copy_iui-Maju_Jaya_Keramik-Kloset_Berdiri-5de878190212b.pdf', 'copy_akte_notaris_perusahaan-Maju_Jaya_Keramik-Kloset_Berdiri-5de8781e3b25c.pdf', 'copy_tdp-Maju_Jaya_Keramik-Kloset_Berdiri-5de8784c5b5ee.pdf', 'copy_npwp-Maju_Jaya_Keramik-Kloset_Berdiri-5de8785159b6c.pdf', 'copy_sert_patent_merek-Maju_Jaya_Keramik-Kloset_Berdiri-5de8785c8275c.pdf', 'copy_sert_iso_9001-Maju_Jaya_Keramik-Kloset_Berdiri-5de87861bb8f6.pdf', 'laporan_audit_sistem_mutu_terakhir-Maju_Jaya_Keramik-Kloset_Berdiri-5de87866016b6.pdf', 'panduan_mutu-Maju_Jaya_Keramik-Kloset_Berdiri-5de8786c5440f.pdf', 'daftar_induk_dok-Maju_Jaya_Keramik-Kloset_Berdiri-5de8787136525.pdf', 'struktur_organisasi-Maju_Jaya_Keramik-Kloset_Berdiri-5de8787649897.pdf', 'diagram_alir_proses_produksi-Maju_Jaya_Keramik-Kloset_Berdiri-5de8787bb6295.pdf', 'surat_pertunjukkan_wakil_manajemen-Maju_Jaya_Keramik-Kloset_Berdiri-5de87885c35de.pdf', 'ilustrasi_pembubuhan_tanda_sni-Maju_Jaya_Keramik-Kloset_Berdiri-5de8788b13cee.pdf', 'tabel_daftar_tipe_produk-Maju_Jaya_Keramik-Kloset_Berdiri-5de878909c3b2.pdf', 'gambar_dan_spesifikasi_produk-Maju_Jaya_Keramik-Kloset_Berdiri-5de878953ce4d.pdf', 'tata_letak_pabrik-Maju_Jaya_Keramik-Kloset_Berdiri-5de8789a56b54.pdf', 'peta_rute_pabrik_dari_bandara_terdekat-Maju_Jaya_Keramik-Kloset_Berdiri-5de878a03d98e.pdf', NULL, NULL, NULL, NULL, NULL, 31, '2019-12-05 03:22:39', '2019-12-05 10:15:06'),
(72, 75, 1, NULL, NULL, 'surat_permohonan_sertifikat_sni-PT_MUTIARA_INDAH-sendok_keramik-5de88a5635ef6.pdf', 'copy_iui-PT_MUTIARA_INDAH-sendok_keramik-5de88a826c177.pdf', 'copy_akte_notaris_perusahaan-PT_MUTIARA_INDAH-sendok_keramik-5de88a897f900.pdf', 'copy_tdp-PT_MUTIARA_INDAH-sendok_keramik-5de88a90c35b3.pdf', 'copy_npwp-PT_MUTIARA_INDAH-sendok_keramik-5de88a9822b8d.pdf', 'copy_sert_patent_merek-PT_MUTIARA_INDAH-sendok_keramik-5de88a9e87bc5.pdf', 'copy_sert_iso_9001-PT_MUTIARA_INDAH-sendok_keramik-5de88aa8163e7.pdf', 'laporan_audit_sistem_mutu_terakhir-PT_MUTIARA_INDAH-sendok_keramik-5de88aadb95fd.pdf', 'panduan_mutu-PT_MUTIARA_INDAH-sendok_keramik-5de88ab44fc91.pdf', 'daftar_induk_dok-PT_MUTIARA_INDAH-sendok_keramik-5de88aba6e13d.pdf', 'struktur_organisasi-PT_MUTIARA_INDAH-sendok_keramik-5de88ac08ba20.pdf', 'diagram_alir_proses_produksi-PT_MUTIARA_INDAH-sendok_keramik-5de88ac5871a8.pdf', 'surat_pertunjukkan_wakil_manajemen-PT_MUTIARA_INDAH-sendok_keramik-5de88acae0abc.pdf', 'ilustrasi_pembubuhan_tanda_sni-PT_MUTIARA_INDAH-sendok_keramik-5de88ad20f785.pdf', 'tabel_daftar_tipe_produk-PT_MUTIARA_INDAH-sendok_keramik-5de88ad9205a4.pdf', 'gambar_dan_spesifikasi_produk-PT_MUTIARA_INDAH-sendok_keramik-5de88adf989c8.pdf', 'tata_letak_pabrik-PT_MUTIARA_INDAH-sendok_keramik-5de88ae4d391f.pdf', 'peta_rute_pabrik_dari_bandara_terdekat-PT_MUTIARA_INDAH-sendok_keramik-5de88aea81be3.pdf', NULL, 'copy_api-PT_MUTIARA_INDAH-sendok_keramik-5de8c8f128567.pdf', 'penunjukkan_distributor-PT_MUTIARA_INDAH-sendok_keramik-5de8c8f7e6a0b.pdf', NULL, 'laporan_pengawasan_iso_9001_terakhir-PT_MUTIARA_INDAH-sendok_keramik-5de8c900ce074.pdf', 30, '2019-12-05 04:40:27', '2019-12-05 09:11:28'),
(73, 74, 1, NULL, NULL, 'surat_permohonan_sertifikat_sni-testinggg-Ubinss-5de8aed6c08ec.pdf', 'copy_iui-testinggg-Ubinss-5de8af57e1e6f.jpg', 'copy_akte_notaris_perusahaan-testinggg-Ubinss-5de8aff50b507.jpg', 'copy_tdp-testinggg-Ubinss-5de8affbd0f12.jpg', 'copy_npwp-testinggg-Ubinss-5de8b00b63621.pdf', 'copy_sert_patent_merek-testinggg-Ubinss-5de8b012813cc.pdf', 'copy_sert_iso_9001-testinggg-Ubinss-5de8b0205fc6e.png', 'laporan_audit_sistem_mutu_terakhir-testinggg-Ubinss-5de8b025786ef.png', 'panduan_mutu-testinggg-Ubinss-5de8b02d25260.jpg', 'daftar_induk_dok-testinggg-Ubinss-5de8b03589122.png', 'struktur_organisasi-testinggg-Ubinss-5de8b03e24f1a.jpg', 'diagram_alir_proses_produksi-testinggg-Ubinss-5de8b04278274.jpg', 'surat_pertunjukkan_wakil_manajemen-testinggg-Ubinss-5de8b046b8ebe.jpg', 'ilustrasi_pembubuhan_tanda_sni-testinggg-Ubinss-5de8b04c2f88a.jpg', 'tabel_daftar_tipe_produk-testinggg-Ubinss-5de8b050712d0.jpg', 'gambar_dan_spesifikasi_produk-testinggg-Ubinss-5de8b054990ca.jpg', 'tata_letak_pabrik-testinggg-Ubinss-5de8b059d0d0b.jpg', 'peta_rute_pabrik_dari_bandara_terdekat-testinggg-Ubinss-5de8b05f4cc1d.jpg', NULL, 'copy_api-testinggg-Ubinss-5de9be5857ea8.jpg', 'penunjukkan_distributor-testinggg-Ubinss-5de9be62305d0.jpg', NULL, 'laporan_pengawasan_iso_9001_terakhir-testinggg-Ubinss-5de9be6bc68ea.jpg', 33, '2019-12-05 07:16:38', '2019-12-06 03:29:39'),
(74, 76, 1, 'asmn', NULL, 'surat_permohonan_sertifikat_sni-qwoeiu-Produk5-5de96b8a72eb7.pdf', 'copy_iui-qwoeiu-Produk5-5de96b8f6939a.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32, '2019-12-05 20:41:46', '2019-12-06 00:08:22'),
(75, 77, 1, NULL, NULL, 'surat_permohonan_sertifikat_sni-PT_SARI_WARNA-Gelas_Keramik-5de9f35d9f06a.pdf', 'copy_iui-PT_SARI_WARNA-Gelas_Keramik-5de9f3625e357.pdf', 'copy_akte_notaris_perusahaan-PT_SARI_WARNA-Gelas_Keramik-5de9f36728181.pdf', 'copy_tdp-PT_SARI_WARNA-Gelas_Keramik-5de9f370e51fc.pdf', 'copy_npwp-PT_SARI_WARNA-Gelas_Keramik-5de9f377440a5.pdf', 'copy_sert_patent_merek-PT_SARI_WARNA-Gelas_Keramik-5de9f3850f8e8.pdf', 'copy_sert_iso_9001-PT_SARI_WARNA-Gelas_Keramik-5de9f38ab1f68.pdf', 'laporan_audit_sistem_mutu_terakhir-PT_SARI_WARNA-Gelas_Keramik-5de9f3953176b.pdf', 'panduan_mutu-PT_SARI_WARNA-Gelas_Keramik-5de9f39fe3594.pdf', 'daftar_induk_dok-PT_SARI_WARNA-Gelas_Keramik-5de9f3a62ec81.pdf', 'struktur_organisasi-PT_SARI_WARNA-Gelas_Keramik-5de9f3ab1532c.pdf', 'diagram_alir_proses_produksi-PT_SARI_WARNA-Gelas_Keramik-5de9f3b06c6cb.pdf', 'surat_pertunjukkan_wakil_manajemen-PT_SARI_WARNA-Gelas_Keramik-5de9f3b4ad9b5.pdf', 'ilustrasi_pembubuhan_tanda_sni-PT_SARI_WARNA-Gelas_Keramik-5de9f3b9b170d.pdf', 'tabel_daftar_tipe_produk-PT_SARI_WARNA-Gelas_Keramik-5de9f3c0b6c81.pdf', 'gambar_dan_spesifikasi_produk-PT_SARI_WARNA-Gelas_Keramik-5de9f3c615257.pdf', 'tata_letak_pabrik-PT_SARI_WARNA-Gelas_Keramik-5de9f3ca48fe3.pdf', 'peta_rute_pabrik_dari_bandara_terdekat-PT_SARI_WARNA-Gelas_Keramik-5de9ff5cf4105.pdf', NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-06 06:21:17', '2019-12-06 07:23:23'),
(76, 79, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-12 06:51:39', '2019-12-12 06:51:39');

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

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `user_id`, `produk`, `jenis_produk`, `kode_tahap`, `lembar_konSert`, `verify_konSert`, `verify_msg`, `draft_sert`, `status_sert_jadi`, `pesan_sert`, `request_sert`, `tgl_request_sert`, `resi_pengiriman`, `kon_resi`, `alamat_kirim`, `terima_sert`, `tgl_terima_sert`, `created_at`, `updated_at`) VALUES
(71, 31, 'tes1', 'abc2', 24, 'Lembar_Konfirmasi_Penerbitan_Sertifikat_SPPT_SNI-5de858d8c2c2020191205.pdf', 1, NULL, 'Sertifikat_Produk-Test12-tes1-5de8594bcf8a0.pdf', 2, NULL, 'kirim', '2019-05-12', 'Resi_Pengiriman_tes1(Test12)5de862f660251.pdf', 1, NULL, 1, '2019-12-05', '2019-12-03 08:57:52', '2019-12-05 03:14:51'),
(73, 34, 'Kloset Berdiri', 'Kloset keramik', 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-05 03:22:00', '2019-12-05 10:19:27'),
(74, 29, 'Ubinss', 'alat bangunan', 24, 'Lembar_Konfirmasi_Penerbitan_Sertifikat_SPPT_SNI-testinggg-Ubinss-5dea1a1adf30b.pdf', 1, NULL, 'Sertifikat_Produk-testinggg-Ubinss-5dea1b80d660d.pdf', 2, NULL, 'kirim', '2019-12-06', 'Resi_Pengiriman_Ubinss(testinggg)5dea22895c4c4.pdf', 1, NULL, 1, '2019-12-06', '2019-12-05 03:44:38', '2019-12-06 09:50:52'),
(75, 35, 'sendok keramik', 'Peralatan makan', 24, 'Lembar_Konfirmasi_Penerbitan_Sertifikat_SPPT_SNI-5de8d2501852320191205.pdf', 1, NULL, 'Sertifikat_Produk-PT_MUTIARA_INDAH-sendok_keramik-5de8d31610c30.pdf', 2, NULL, 'kirim', '1970-01-01', 'Resi_Pengiriman_sendok keramik(PT MUTIARA INDAH)5de8d39826705.pdf', 1, NULL, 1, '2019-12-05', '2019-12-05 04:40:20', '2019-12-05 09:59:02'),
(76, 36, 'Produk5', 'Keramik', 22, 'Lembar_Konfirmasi_Penerbitan_Sertifikat_SPPT_SNI-qwoeiu-Produk5-5de9feeee28ae.pdf', 1, 'asdjhasd', 'Sertifikat_Produk-qwoeiu-Produk5-5dea01726f299.pdf', 2, 'MXZnasd', 'ambil', NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-05 20:40:57', '2019-12-06 09:10:35'),
(77, 37, 'Gelas Keramik', 'Peralatan Makan', 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-06 06:14:03', '2019-12-06 08:32:12'),
(78, 29, 'Wastafel', 'Kebersihan', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-07 10:08:30', '2019-12-07 10:08:30'),
(79, 31, 'ProdukTest', 'Keramik', 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-10 07:44:49', '2019-12-16 08:13:21'),
(80, 31, 'vas bunga1', 'dekorasi ruangan', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-13 03:49:31', '2019-12-13 07:18:54'),
(81, 31, 'askdjh', 'kjahsd', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-13 03:59:27', '2019-12-13 03:59:27'),
(82, 31, 'zzzzzzz', 'zzzzzzzzzzzzz', 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-13 04:00:01', '2019-12-13 04:00:01'),
(83, 31, 'qqqqqqqqq', 'qqqqqqq', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-13 04:00:25', '2019-12-13 04:00:25');

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

--
-- Dumping data for table `review_dok_importir`
--

INSERT INTO `review_dok_importir` (`id`, `surat_permohonan_sertifikat_sni`, `daftar_isian_dan_kuesioner`, `copy_iui`, `copy_akte_notaris_perusahaan`, `copy_npwp`, `copy_tdp`, `copy_api`, `copy_sert_patent_merek`, `penunjukkan_distributor`, `struktur_organisasi`, `ilustrasi_pembubuhan_tanda_sni`, `tabel_daftar_tipe_produk`, `gambar_dan_spesifikasi_produk`, `sert_smm`, `laporan_pengawasan_iso_9001_terakhir`, `created_at`, `updated_at`) VALUES
(29, '[\"ada\",\"null\"]', '[\"ada\",\"null\"]', '[\"ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '2019-12-04 06:28:15', '2019-12-04 06:28:15'),
(30, '[\"ada\",\"oke\"]', '[\"ada\",\"oke\"]', '[\"ada\",\"oke\"]', '[\"ada\",\"oke\"]', '[\"ada\",\"oke\"]', '[\"ada\",\"oke\"]', '[\"ada\",\"oke\"]', '[\"ada\",\"oke\"]', '[\"ada\",\"oke\"]', '[\"ada\",\"oke\"]', '[\"ada\",\"oke\"]', '[\"ada\",\"oke\"]', '[\"ada\",\"oke\"]', '[\"tidak_ada\",\"null\"]', '[\"ada\",\"oke\"]', '2019-12-05 09:07:00', '2019-12-05 09:11:28'),
(31, '[\"ada\",\"null\"]', '[\"ada\",\"null\"]', '[\"ada\",\"null\"]', '[\"ada\",\"null\"]', '[\"ada\",\"null\"]', '[\"ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"ada\",\"null\"]', '[\"ada\",\"null\"]', '[\"ada\",\"null\"]', '[\"ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '2019-12-05 10:15:06', '2019-12-05 10:15:06'),
(32, '[\"ada\",\"null\"]', '[\"ada\",\"null\"]', '[\"ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '2019-12-06 00:08:22', '2019-12-06 00:08:22'),
(33, '[\"ada\",\"guddd\"]', '[\"ada\",\"mantullss\"]', '[\"ada\",\"hahahaaa\"]', '[\"ada\",\"hhhhhhhh\"]', '[\"ada\",\"qwerty\"]', '[\"ada\",\"123 testing\"]', '[\"ada\",\"abcdefghijklmnopqrstuvwxyz\"]', '[\"ada\",\"fefhffei\"]', '[\"ada\",\"ihfhiehf\"]', '[\"ada\",\"fheihfeihfie\"]', '[\"ada\",\"ihfehfeifh\"]', '[\"ada\",\"feifheifhiehfi\"]', '[\"ada\",\"fiheifhieh\"]', '[\"tidak_ada\",\"null\"]', '[\"ada\",\"feihfehf\"]', '2019-12-06 02:34:25', '2019-12-06 02:35:23');

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

--
-- Dumping data for table `review_tinjauan_pp`
--

INSERT INTO `review_tinjauan_pp` (`id`, `struktur_organisasi`, `diagram_alir_produksi`, `daftar_peralatan`, `spesifikasi_peralatan`, `tata_letak_pabrik`, `peta_letak_pabrik_dari_bandara_terdekat`, `created_at`, `updated_at`) VALUES
(28, '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '2019-11-28 09:54:59', '2019-11-28 09:54:59'),
(30, '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '2019-11-28 10:23:16', '2019-11-28 10:23:16'),
(34, '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '2019-12-04 06:28:15', '2019-12-04 06:28:15'),
(35, '[\"ada\",\"oke\"]', '[\"ada\",\"oke\"]', '[\"ada\",\"oke\"]', '[\"ada\",\"oke\"]', '[\"ada\",\"oke\"]', '[\"ada\",\"oke\"]', '2019-12-05 09:07:00', '2019-12-05 09:11:28'),
(36, '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '2019-12-05 10:15:06', '2019-12-05 10:15:06'),
(37, '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '[\"tidak_ada\",\"null\"]', '2019-12-06 00:08:22', '2019-12-06 00:08:22'),
(38, '[\"ada\",\"ehihfeifhef\"]', '[\"ada\",\"hfiehfeifi\"]', '[\"ada\",\"gudd\"]', '[\"ada\",\"aallaal\"]', '[\"ada\",\"ddwjoqo\"]', '[\"ada\",\"qwww\"]', '2019-12-06 02:34:25', '2019-12-06 02:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `role_name`, `manual`) VALUES
(1, 'client', 'Client', 'manual_book_Client.pdf'),
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

--
-- Dumping data for table `sert`
--

INSERT INTO `sert` (`id`, `sert_name`, `produk_id`, `pengisian_data`, `nomor`, `merek`, `tipe_jenis`, `regulasi_skema`, `skema_sert`, `created_at`, `updated_at`) VALUES
(15, NULL, 69, NULL, 'cpcb-0001-IDN', 'oke', 'wahsdown; c55', 'permenperin no 85', 'tipe 5', '2019-12-03 04:48:17', '2019-12-03 04:48:17'),
(16, NULL, 71, NULL, 'qweu87', 'sad', 'ksdj', 'kasjd', 'kasjd', '2019-12-04 06:31:34', '2019-12-04 06:31:34'),
(17, NULL, 75, NULL, '123xy', 'sanyoxy', 'single dinamoxy', 'skema 441xy', 'skema produk baruxy', '2019-12-05 09:16:05', '2019-12-05 09:48:11'),
(18, NULL, 73, NULL, 'zxmcnb', 'jahd', 'jhgasdj', 'jhgasdj', 'jhgasd', '2019-12-05 10:19:47', '2019-12-05 10:19:47'),
(19, NULL, 76, NULL, 'asd', 'as', 'asd', 'asda', 'ds', '2019-12-06 00:09:50', '2019-12-06 00:09:50'),
(20, NULL, 74, NULL, '009988288', 'Ubinsss.merk', 'tipe/jenis', 'regulasi/skema', 'skema sertifikasi produk', '2019-12-06 06:05:10', '2019-12-06 06:05:10');

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

--
-- Dumping data for table `tinjauan_pp`
--

INSERT INTO `tinjauan_pp` (`id`, `sni`, `dok_tidak_lengkap`, `struktur_organisasi`, `diagram_alir_produksi`, `daftar_peralatan`, `spesifikasi_peralatan`, `tata_letak_pabrik`, `peta_letak_pabrik_dari_bandara_terdekat`, `review_tinjauan_pp_id`, `created_at`, `updated_at`) VALUES
(31, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, '2019-11-28 10:23:16', '2019-11-28 10:26:01'),
(32, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, '2019-11-28 10:23:16', '2019-11-28 10:26:01'),
(36, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 34, '2019-12-04 06:28:15', '2019-12-04 06:28:15'),
(37, 1, NULL, 'struktur_organisasi-PT_MUTIARA_INDAH-sendok_keramik-5de8c90939c94.pdf', 'diagram_alir_produksi-PT_MUTIARA_INDAH-sendok_keramik-5de8c90e4dbeb.pdf', 'daftar_peralatan-PT_MUTIARA_INDAH-sendok_keramik-5de8c91395fdd.pdf', 'spesifikasi_peralatan-PT_MUTIARA_INDAH-sendok_keramik-5de8c918bdd18.pdf', 'tata_letak_pabrik-PT_MUTIARA_INDAH-sendok_keramik-5de8c91ee8f2d.pdf', 'peta_letak_pabrik_dari_bandara_terdekat-PT_MUTIARA_INDAH-sendok_keramik-5de8c92385620.pdf', 35, '2019-12-05 09:07:00', '2019-12-05 09:11:28'),
(38, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 36, '2019-12-05 10:15:06', '2019-12-05 10:15:06'),
(39, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 37, '2019-12-06 00:08:22', '2019-12-06 00:08:22'),
(40, 1, NULL, 'struktur_organisasi-testinggg-Ubinss-5de9be77a3595.jpeg', 'diagram_alir_produksi-testinggg-Ubinss-5de9be7e5612f.jpeg', 'daftar_peralatan-testinggg-Ubinss-5de9be8662326.jpeg', 'spesifikasi_peralatan-testinggg-Ubinss-5de9be967768a.jpeg', 'tata_letak_pabrik-testinggg-Ubinss-5de9be9f82b8e.jpeg', 'peta_letak_pabrik_dari_bandara_terdekat-testinggg-Ubinss-5de9bea5cf851.jpeg', 38, '2019-12-06 02:34:25', '2019-12-06 03:29:39');

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
(3, 'pemasaran', 'bebas_pemasaran@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0897672', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-17 20:04:34', '2019-12-02 21:39:48'),
(4, 'kerjasama', 'bebas_kerjasama@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08928323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(5, 'kabidPjt', 'bebas_kabidpjt@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N3Q54cf40dqb3a5mWdryGP6D3QSoCxeSJySkcvejh2BnxhjK0ebFbS9GzXIC', '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(6, 'keuangan', 'bebas_keuangan@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(7, 'sertifikasi', 'bebas_sertifikasi@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jEbeyg3RdJrYyzmLOINmTqDnhKgHDZm8D1t8kPSFfXnnv3wBrjhTf8Wp9MvP', '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(8, 'auditor', 'bebas_auditor@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'V6btVOKQKKziIzG6ptEIUCODQpv1nNBcO3jpeDphnYLj9wTuDALEOi0xk5co', '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(9, 'kabidpaskal', 'bebas_kabidpaskal@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hY9dJln4Z7qqgGuiBSGOqMWCGTn4AEnSRlPOs4egE20vLLwqdhvGqdaJzeaj', '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(10, 'tim_teknis', 'bebas_tim_teknis@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(12, 'subag_umum', 'bebas_subag@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mtSA9iTJA8lwA2VRlEoeOLaVp706TPiZNqfoOEgVYEC7epXzmfNQQ5p1kHtG', '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(13, 'tim_teknis2', 'bebas_tim_teknis2@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(14, 'ketua_komite_timTeknis', 'bebas_komite_timTeknis@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(24, 'ketua_tim_teknis', 'bebas_ketua_tim_teknis@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(25, 'ketua_sertifikasi', 'bebas_ketua_sertifikasi@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-13 23:51:27', '2019-08-13 23:51:27'),
(28, 'Tri', 'syabanat@gmail.com', 1, '2019-11-28 07:20:17', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', NULL, 1, '1', 'PT Sejahtera', 'Ir.Tri Syabana Octabiar', 'Jl Masih Panjang dan Berliku No 28', 'Bandung', 'Jawa Barat', '40226', '087822851783', '1234502828', 'syabanat@gmail.com', 'Jl Hidup Tak akan pernah Lurus', '087654321123', '99792827781', 'syabanat@gmail.com', '900', '100', '1000', 'Dudung', '087822851786', NULL, 'npwp-PT_Sejahtera-5ddf742cebd49.pdf', NULL, 'nib-PT_Sejahtera-5ddf742cebd92.pdf', NULL, '2019-11-28 07:15:57', '2019-11-28 07:20:17'),
(29, 'Testing untuk debug', 'naufalrifqi203@gmail.com', 1, '2019-11-28 07:55:43', '$2y$10$no1UxEGq3Bb7Lp6CRPygaOo8nC8JqX9YxD0XinnD8khXz0eWzx7NW', NULL, 1, '1', 'testinggg', 'andy', 'jalan jalan saja', 'bandung', 'jawa barat', '402324', '022231388', '2922984', 'email@mail.domain', 'jalan pabrik', '0292938984', '0299398', 'testing@mail.com', '121', '12', '20', 'Ali', '089892737', NULL, 'npwp-testinggg-5ddf7d5de813f.pdf', NULL, 'nib-testinggg-5ddf7d5de8189.pdf', NULL, '2019-11-28 07:55:10', '2019-11-28 07:55:43'),
(31, 'Test', 'bebas1@gmail.com', 1, '2019-07-15 20:32:20', '$2y$10$HIeJ/qm4aUI0E7GxTM/SWu0rnJT1IwjycTY/FIMJcv.aM.RUvdVo.', 'fv2KXvmD7w4:APA91bEWuKpuTV2a3aujHd-6BbpdCeAeB7CFBwOukaHm7rb_kVqctcyy5cR2gYM484qz_O67JcNgjgP_OE9GnY232pxJj5ZoKqk7fxAMz7SKKPAGRPuXUBX2fOrMx9UR3rC7NVefK3iS', 1, '1', 'Test12', 'Testasd', 'qweqjkweh', 'weqweq', 'weqwe', '123118', '123123', '12313', 'asd@asd.asd', 'qweqwe', '123', '123123', 'asd@asd.asd', '123', '123', '123', 'asdasd', '08927831', '23489234', 'npwp_201911290459165de0433445bf4.pdf', NULL, 'nib_201911290459165de0433445c45.pdf', 'vJdLZ4sA8o3mKV02G8LZbO8J1qtadHW0FBfkzC23AFD4ZSXBAm0IBWQPNd6r', '2019-11-28 21:54:02', '2019-12-04 03:01:22'),
(32, 'super_admin', 'bebas_super_admin@gmail.com', NULL, '2019-07-15 20:32:20', '$2y$10$7NfhfvHWB5VA3D0bQl65T.XKnKPWv4RcbaTajbnqEmnemk.QtyNmi', NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-13 23:51:27', '2019-12-01 21:55:47'),
(34, 'ican', 'muhammadinkamil@gmail.com', 1, '2019-12-05 03:18:44', '$2y$10$45TuShgTBsK.qHPKoqjwuuexya4Wr7iXIRiktR2zOnnQeA4kvq6dy', NULL, 1, '1', 'Maju Jaya Keramik', 'Muhammad Insan Kamil', 'Jl. Kayu Agung II no. 9 Turangga, Lengkong', 'Bandung', 'Jawa Barat', '40264', '081219052453', '0227117389', 'muhammadinkamil@gmail.com', 'Jl. Trunojoyo no.7, Bandung', '022809908', '022809908', 'maju@gmail.com', '300', '50', '40', 'Rizal Fuzi', '0878223456', '8873364753920012', 'npwp-Maju_Jaya_Keramik-5de8768ef3b84.pdf', '7786854535323', 'nib-Maju_Jaya_Keramik-5de8768ef3bcf.pdf', NULL, '2019-12-05 03:16:31', '2019-12-05 03:18:44'),
(35, 'yoni kristikto', 'yoni.kristikto@gmail.com', 1, '2019-12-05 04:39:37', '$2y$10$UIN8kemXN1rKzCm1PFPXG.1OdYS1aqOXrz964E1jGo9GrI6lEqu1K', NULL, 1, '1', 'PT MUTIARA INDAH', 'Mr. Budi Setiawan', 'Jl. Pluto timur No 21, Cicadas.', 'Bandung', 'Jawa Barat', '33412', '022 61231', '02221', 'yoni.kristikto@gmail.com', 'Jl. Cagar Alam Indah No 30, Jayagiri', '022 21212', '01122', 'yoni.kristikto@gmail.com', '20', '50', '10', 'yoni kristikt', '087823165341', '90846135481274617', 'npwp-PT_MUTIARA_INDAH-5de88906daf00.pdf', '893657323435', 'nib-PT_MUTIARA_INDAH-5de88906daf49.pdf', NULL, '2019-12-05 04:35:18', '2019-12-05 04:39:37'),
(36, 'asodiuo', 'bebas2@gmail.com', 1, '2019-07-15 20:32:20', '$2y$10$lnxYl8VU6A0Pts7Zriy9iuent0Cx5ZeZ7/ZhA0VEwiy1I.su6aJKq', NULL, 1, '1', 'qwoeiu', 'aksdjh', 'asdiou', 'oqiwue', 'oiu', '123', '089878273', '2321', 'asd@as.asd', 'aasdjkh', '01928309', '123879', 'qw@asd.asd', '123', '12', '123', 'aksjdhkah askdjhka skdjhakjshdkjas', '0898768768', '213987', 'npwp-qwoeiu-5de96aa7e8ac1.pdf', '0898232', 'nib-qwoeiu-5de96aa7e8b09.pdf', NULL, '2019-12-05 20:38:00', '2019-12-05 20:39:34'),
(37, 'Sukma andini', 'yoni.kristikto@widyatama.ac.id', 1, '2019-12-06 06:07:19', '$2y$10$UZpMCJ7cHolH3ygyMqzBieLi7Bruj40RERNShjqyfoUlKU6iVkSZK', NULL, 1, '1', 'PT SARI WARNA', 'Mr. Andy Setiawan', 'Jalan Pelan sari 9 No 02', 'Bandung', 'Jawa Barat', '12343', '022 4231', '022 2231', 'yoni.kristikto@widyatama.ac.id', 'Jalan hanya Itu 8 No 11', '021 4341', '232323', 'yoni.kristikto@widyatama.ac.id', '30', '10', '5', 'Albert patriyanto', '0977654', '12233445566778', 'npwp-PT_SARI_WARNA-5de9ef10ec27b.pdf', '893657323435', 'nib-PT_SARI_WARNA-5de9ef10ec2c5.pdf', NULL, '2019-12-06 06:02:57', '2019-12-06 06:07:19'),
(38, 'asd', 'asd@asd.asd', NULL, NULL, '$2y$10$2fJPJl8/wB/1hrgcwjxjP.B2fJuaTdeBiXRbpA8Jf0ythC9oUDg2.', NULL, 1, '1', 'asdkj', 'kjashdk', 'asdkjh', 'Bandung', 'Jawa Barat', '40235', '089871236', '12378', 'asd@asda.asd', 'asdoiuadso', '123876', '87123', 'kjh@kjh.asd', '13', '123', '123', 'qweqwe', '0898823', '182376', 'npwp-asdkj-5df32e8c9dcad.pdf', NULL, 'nib-asdkj-5df32e8c9dcb6.pdf', NULL, '2019-12-13 06:24:12', '2019-12-13 06:24:12');

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
-- Indexes for table `defaultHarga`
--
ALTER TABLE `defaultHarga`
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
  ADD KEY `laporan_audit_auditor_foreign` (`auditor`),
  ADD KEY `laporan_audit_jadwal_audit_id_foreign` (`jadwal_audit_id`),
  ADD KEY `laporan_audit_dok_importir_id_foreign` (`dok_importir_id`),
  ADD KEY `laporan_audit_dok_manufaktur_id_foreign` (`dok_manufaktur_id`),
  ADD KEY `laporan_audit_tinjauan_pp_id_foreign` (`tinjauan_pp_id`),
  ADD KEY `auditor` (`auditor`),
  ADD KEY `auditor_2` (`auditor`);

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
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_sampling_plan`
--
ALTER TABLE `audit_sampling_plan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `bahan_hasil`
--
ALTER TABLE `bahan_hasil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `bid_price`
--
ALTER TABLE `bid_price`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `defaultHarga`
--
ALTER TABLE `defaultHarga`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dok_importir`
--
ALTER TABLE `dok_importir`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dok_manufaktur`
--
ALTER TABLE `dok_manufaktur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `format_file`
--
ALTER TABLE `format_file`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `group_tahapan`
--
ALTER TABLE `group_tahapan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `info_tambahan`
--
ALTER TABLE `info_tambahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `jadwal_audit`
--
ALTER TABLE `jadwal_audit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kuesioner`
--
ALTER TABLE `kuesioner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `laporan_audit`
--
ALTER TABLE `laporan_audit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `laporan_hasil_sert`
--
ALTER TABLE `laporan_hasil_sert`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `master_tahap`
--
ALTER TABLE `master_tahap`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mou`
--
ALTER TABLE `mou`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `notif_log`
--
ALTER TABLE `notif_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `no_surat`
--
ALTER TABLE `no_surat`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `persyaratan_dok_dalam_negeri`
--
ALTER TABLE `persyaratan_dok_dalam_negeri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `persyaratan_dok_luar_negeri`
--
ALTER TABLE `persyaratan_dok_luar_negeri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `review_dok_importir`
--
ALTER TABLE `review_dok_importir`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `review_dok_manufaktur`
--
ALTER TABLE `review_dok_manufaktur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review_tinjauan_pp`
--
ALTER TABLE `review_tinjauan_pp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sert`
--
ALTER TABLE `sert`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tinjauan_pp`
--
ALTER TABLE `tinjauan_pp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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

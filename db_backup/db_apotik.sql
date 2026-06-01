-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2026 at 10:34 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apotik`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksis`
--

CREATE TABLE `detail_transaksis` (
  `id_detail` bigint UNSIGNED NOT NULL,
  `id_transaksi` bigint UNSIGNED NOT NULL,
  `id_obat` bigint UNSIGNED NOT NULL,
  `jumlah` int NOT NULL,
  `harga` int NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transaksis`
--

INSERT INTO `detail_transaksis` (`id_detail`, `id_transaksi`, `id_obat`, `jumlah`, `harga`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 3, 80000, 240000, NULL, NULL),
(2, 2, 12, 11, 34000, 374000, '2026-06-01 09:37:23', '2026-06-01 09:37:23'),
(3, 3, 14, 8, 300000, 2400000, '2026-06-01 09:48:07', '2026-06-01 09:48:07'),
(4, 4, 16, 1, 3600, 3600, '2026-06-01 10:29:25', '2026-06-01 10:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id_kategori` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id_kategori`, `nama_kategori`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Obat Bebas', NULL, NULL, NULL),
(2, 'Obat Keras', NULL, NULL, NULL),
(3, 'Antibiotik\r\n', NULL, NULL, NULL),
(4, 'OTC', NULL, NULL, NULL),
(5, 'Pil KB & Hormonal', NULL, NULL, NULL),
(6, 'Vitamin & Suplement', NULL, NULL, NULL),
(7, 'Flu & Batuk', NULL, NULL, NULL),
(8, 'Obat Herbal', NULL, NULL, NULL),
(9, 'Obat Diabetes', NULL, NULL, NULL),
(10, 'Obat Hipertensi', NULL, NULL, NULL),
(11, 'Obat Kolesterol', NULL, NULL, NULL),
(12, 'Kesehatan Seksual', NULL, NULL, NULL),
(13, 'Kecantikan & Keperawatan Diri', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laporans`
--

CREATE TABLE `laporans` (
  `id_laporan` int NOT NULL,
  `periode_awal` date NOT NULL,
  `periode_akhir` date NOT NULL,
  `total_transaksi` int NOT NULL DEFAULT '0',
  `total_pendapatan` int NOT NULL DEFAULT '0',
  `dibuat_pada` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `laporans`
--

INSERT INTO `laporans` (`id_laporan`, `periode_awal`, `periode_akhir`, `total_transaksi`, `total_pendapatan`, `dibuat_pada`) VALUES
(1, '2026-06-01', '2026-06-30', 4, 3017600, '2026-06-01 10:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_02_25_000000_create_jobs_table', 1),
(5, '2022_02_25_000001_create_users_table', 1),
(6, '2022_02_25_000002_create_permission_tables', 1),
(7, '2026_05_08_161857_create_kategoris_table', 1),
(8, '2026_05_08_163305_create_obats_table', 2),
(11, '2026_05_08_163558_create_transaksis_table', 3),
(12, '2026_05_08_163612_create_detail_transaksis_table', 3),
(13, '2026_05_11_020334_add_deskripsi_to_obats_table', 4),
(14, '2026_05_14_151852_add_foto_to_obats_table', 5),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `obats`
--

CREATE TABLE `obats` (
  `id_obat` bigint UNSIGNED NOT NULL,
  `nama_obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `id_kategori` bigint UNSIGNED NOT NULL,
  `harga_obat` bigint NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL,
  `tanggal_exp` date NOT NULL,
  `waktu_produksi` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obats`
--

INSERT INTO `obats` (`id_obat`, `nama_obat`, `foto`, `deskripsi`, `id_kategori`, `harga_obat`, `satuan`, `stok`, `tanggal_exp`, `waktu_produksi`, `created_at`, `updated_at`) VALUES
(15, 'MIXAGRIP', '1780307830_obat fllu & batuk.jpg', '-Mengandung Paracetamol 500 mg, Pseudoefedrin HCl 30 mg, Dextromethorphan HBr 10 mg\r\n-Meredakan demam, batuk, sakit kepala, hidung tersumbat, alergi\r\nTerdapat 4 kapsul dalam 1 strip\r\nRingankan gejala flu disertai batuk bersama MIXAGRIP Flu & Batuk New Kapsul 4 Kaplet.\r\nMIXAGRIP Flu & Batuk Kapsul 4 Kaplet merupakan jenis obat yang digunakan untuk mengobati gejala flu seperti demam, sakit kepala, hidung tersumbat, dan bersin disertai batuk. Mixagrip Flu & Batuk Kapsul ini mengandung paracetamol, obat yang memiliki aktivitas sebagai antipyretic sekaligus analgetic, pseudoefedrin, obat nasal decongestan yang merupakan stereoisomer dari norephedrine dan dextromethorphan, obat penekan batuk dari kelas morphinan. Terdapat 4 kapsul dalam 1 strip MIXAGRIP Flu & Batuk New Kapsul 4 Kaplet. Segera pulihkan dirimu dan kembali semangat beraktivitas bersama MIXAGRIP Flu & Batuk New Kapsul 4 Kaplet ketika flu dan batuk menyerang.\r\n\r\nNo. BPOM: DTL 1604429504A1', 7, 4300, 'Tablet', 20, '2026-06-30', '2026-06-01', '2026-06-01 09:57:10', '2026-06-01 09:57:10'),
(16, 'CLYCLOGYNON', '1780308029_pil kb.jpg', 'kontraindikasi\r\nPasien dengan riwayat atau mengalami gangguan troboflebtis atau troboembolik penyakit arteri serebrovaskuler atau koroner. Diduga atau diketahui kanker payudara. Kanker endometrium atau diduga neoplasia yang tergantung estrogen. Perdarahan abnormal genital yang tidak diketahui penyebabnya, ikterus selama hamil atau karena penggunaan obat kontrasepsi sebelumnya. Penyakit hati berat atau kanker hati. Diketahui atau diduga adanya kehamilan. Anemia sel sabit. Diabetes mellitus berat dengan gangguan vaskuler. Gangguan metabolismelipid. Riwayat herpes gestational. Otosklerosis yang memburuk selama hamil\r\nEfek Samping\r\nKloasma yang dieksaserbasi oleh sinar matahari, penurunan toleransi terhadap lensa kontak, Tromboflebtis, troboemboli arterial, emboli pulmoner, infark miokard, perdarahan serebral, trobosis serebral, hipertensi, penyakit kandung empedu, penyakit hati berat, tumor ganas hati. Trombosis mesemterik, trombosis retinal, mual, muntah, keram perut, spotting breakthrough, bleeding, perubahan haid, amenore, perubahan pada payudara, ikterus kolestatik, migrain, ruam kulit, depres mental, kandidiasis vagina. Anomali kongenital, sindrom premenstrual, katarak, neuritis optik, perubahan nafsu makan, sakit kepala, gugup, pusing, hirsutisme, rambut rontok, eritema multi formis, eritema nodosum, erupsi hemoragik, gvaginitis, porfiria, gangguan fungsi ginjal, jerawat, perubahan libido, kolitis, serebrovaskuler, sindrom yang menyerupai lupus sindrom Budd-Chiari, sindrom yang penyerupai sistitis', 5, 3600, 'Tablet', 19, '2026-06-30', '2026-06-01', '2026-06-01 10:00:29', '2026-06-01 10:29:26'),
(17, 'ENERVON-C', '1780309018_vitamin.jpg', 'Multivitamin\r\nMengandung kombinasi Vitamin C dan B kompleks\r\nMembantu menjaga daya tahan tubuh\r\nMemulihkan kondisi tubuh setelah sakit\r\nAman dikonsumsi setiap hari\r\nTersedia dalam kemasan strip isi 4 tablet\r\nEnervon-C Multivitamin 4 Tablet adalah suplemen makanan multivitamin yang mengandung vitamin C untuk menjaga daya tahan tubuh, dan vitamin B Kompleks (B1, B2, B3, B5, B6, dan B12) untuk proses metabolisme dalam menghasilkan energi. Aman dikonsumsi setiap hari dan halal. Anjuran pemakaian : Untuk dewasa 1 tablet Enervon-C Multivitamin per hari. Tersedia dalam kemasan strip isi 4 tablet.\r\n\r\nNo. Sertifikasi Halal: 280092971218\r\n\r\nNo. BPOM: SD 011501011', 6, 7200, 'Tablet', 30, '2026-06-30', '2026-06-01', '2026-06-01 10:16:58', '2026-06-01 10:16:58'),
(18, 'OB-HERBAL', '1780309195_obherbal.jpg', 'READY STOCK! LANGSUNG BISA ORDER! Jika ada pertanyaan silakan ajukan melalui Diskusi / Inbox Seluruh pertanyaan dijawab oleh Ahli Kesehatan amp; Farmasi kami (Apoteker) Ob Herbal Sirup Cair 100 ml - Obat Batuk, Sakit Tenggorokan tokopedia.com/sehatindonesia HARGA LEBIH TERJANGKAU, 100% ASLI amp; READY STOCK Melayani pembelian Ecer, Box / Dus, dan Karton / Jumlah Banyak Silakan kirim Diskusi / Inbox untuk informasi lebih lanjut Kadaluwarsa / Expired Date Aman - Memiliki jangka waktu kadaluwarsa yang aman, baik untuk dikonsumsi langsung, disimpan atau diperdagangkan kembali - Memiliki rata-rata kadaluwarsa / expired date 3 tahun s/d 5 tahun - Menjamin seluruh produk yang kami kirimkan ke pembeli tidak ada yang melewati batas kadaluwarsa / expired date - Selalu memiliki stok produk terbaru, karena perputaran / rotasi penjualan produk kami cepat dan teratur A B H', 8, 27000, 'Botol', 20, '2026-06-30', '2026-06-01', '2026-06-01 10:19:55', '2026-06-01 10:19:55'),
(19, 'GLINBLENCLAMIDE', '1780309320_obat diabetes.jfif', 'Glibenclamide 5 mg KF\r\n\r\nGlibenclamide adalah obat yang digunakan untuk mengendalikan kadar gula darah tinggi pada penderita diabetes melitus tipe 2.\r\n\r\nObat ini bekerja dengan cara merangsang produksi insulin di tubuh sehingga dapat mengikat glukosa di dalam aliran darah.\r\n\r\nPerlu diingat, obat ini tidak diperuntukkan bagi penderita diabetes tipe 1 atau pasien yang mengalami komplikasi ketoasidosis diabetik.\r\n\r\nHARUS SESUAI DENGAN PETUNJUK DOKTER. Glibenclamide termasuk golongan obat keras sehingga hanya boleh digunakan sesuai dengan rekomendasi atau anjuran dari dokter.\r\n\r\nDetail Produk:\r\n• Komposisi: Glibenclamide 5 mg\r\n• Golongan: Obat keras\r\n• Perlu resep: Ya\r\n• Rute obat: Oral\r\n• Kategori C: Penelitian pada hewan menunjukkan adanya efek samping terhadap janin. Namun, belum ada studi terkontrol pada ibu hamil. Obat hanya boleh digunakan jika manfaatnya lebih besar dibandingkan dengan risikonya pada janin\r\n• Keamanan menyusui: Belum diketahui apakah glibenclamide dapat terserap ke dalam ASI. Ibu menyusui tidak boleh mengonsumsi obat tanpa berkonsultasi dengan dokter terlebih dulu\r\n• Kemasan: Dus, 10 strip @ 10 tablet\r\n• Bentuk obat: Tablet\r\n• Pabrik/Manufaktur: Kimia Farma\r\n• No. BPOM: GKL 9512427210A1', 9, 4000, 'Tablet', 20, '2026-06-30', '2026-06-01', '2026-06-01 10:22:00', '2026-06-01 10:22:00'),
(20, 'GLINBLENCLAMIDE', '1780309320_obat diabetes.jfif', 'Glibenclamide 5 mg KF\r\n\r\nGlibenclamide adalah obat yang digunakan untuk mengendalikan kadar gula darah tinggi pada penderita diabetes melitus tipe 2.\r\n\r\nObat ini bekerja dengan cara merangsang produksi insulin di tubuh sehingga dapat mengikat glukosa di dalam aliran darah.\r\n\r\nPerlu diingat, obat ini tidak diperuntukkan bagi penderita diabetes tipe 1 atau pasien yang mengalami komplikasi ketoasidosis diabetik.\r\n\r\nHARUS SESUAI DENGAN PETUNJUK DOKTER. Glibenclamide termasuk golongan obat keras sehingga hanya boleh digunakan sesuai dengan rekomendasi atau anjuran dari dokter.\r\n\r\nDetail Produk:\r\n• Komposisi: Glibenclamide 5 mg\r\n• Golongan: Obat keras\r\n• Perlu resep: Ya\r\n• Rute obat: Oral\r\n• Kategori C: Penelitian pada hewan menunjukkan adanya efek samping terhadap janin. Namun, belum ada studi terkontrol pada ibu hamil. Obat hanya boleh digunakan jika manfaatnya lebih besar dibandingkan dengan risikonya pada janin\r\n• Keamanan menyusui: Belum diketahui apakah glibenclamide dapat terserap ke dalam ASI. Ibu menyusui tidak boleh mengonsumsi obat tanpa berkonsultasi dengan dokter terlebih dulu\r\n• Kemasan: Dus, 10 strip @ 10 tablet\r\n• Bentuk obat: Tablet\r\n• Pabrik/Manufaktur: Kimia Farma\r\n• No. BPOM: GKL 9512427210A1', 9, 4000, 'Tablet', 20, '2026-06-30', '2026-06-01', '2026-06-01 10:22:00', '2026-06-01 10:22:00');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id_transaksi` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `total_harga` int NOT NULL,
  `bayar` int NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id_transaksi`, `id_user`, `total_harga`, `bayar`, `tanggal_transaksi`, `created_at`, `updated_at`) VALUES
(1, 2, 240000, 240000, '2026-06-01 15:49:30', NULL, NULL),
(2, 2, 374000, 374000, '2026-06-01 16:37:23', NULL, NULL),
(3, 2, 2400000, 2400000, '2026-06-01 16:48:07', NULL, NULL),
(4, 2, 3600, 3600, '2026-06-01 17:29:25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint UNSIGNED NOT NULL,
  `nama_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `username`, `email`, `email_verified_at`, `password`, `role`, `no_hp`, `alamat`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin Apotek', 'admin_sis', 'admin@mail.com', '2026-05-28 18:23:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', NULL, NULL, NULL, '2026-05-28 18:23:10', '2026-05-28 18:23:10'),
(2, 'aira camp', 'aira', 'marvellbintang.maulana@gmail.com', '2026-05-29 03:27:03', '$2y$10$Aq5YfcEdWkxWYTzkF5iP6.lyhqQZNI5gT4viUH9uTRL9YGNUjsWoK', 'customer', '089523429806', 'tipar nangka sahabat baik', NULL, '2026-05-29 03:14:34', '2026-05-29 03:26:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `laporans`
--
ALTER TABLE `laporans`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obats`
--
ALTER TABLE `obats`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `obats_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  MODIFY `id_detail` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id_kategori` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id_laporan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `obats`
--
ALTER TABLE `obats`
  MODIFY `id_obat` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id_transaksi` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  ADD CONSTRAINT `detail_transaksis_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksis` (`id_transaksi`) ON DELETE CASCADE;

--
-- Constraints for table `obats`
--
ALTER TABLE `obats`
  ADD CONSTRAINT `obats_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id_kategori`) ON DELETE CASCADE;

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

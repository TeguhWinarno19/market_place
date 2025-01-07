-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2025 pada 15.03
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market_place`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat`
--

CREATE TABLE `alamat` (
  `id_alamat` varchar(7) NOT NULL,
  `id_user` varchar(7) NOT NULL,
  `nama_penerima` varchar(125) NOT NULL,
  `alamat` varchar(125) NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `kodepos` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `id_user`, `nama_penerima`, `alamat`, `rt`, `rw`, `kodepos`, `id_kota`, `id_provinsi`) VALUES
('ADD0001', 'USR0002', 'ibu ismiah', 'Resinda', 1, 1, 1234, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(7) NOT NULL,
  `id_toko` varchar(7) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `keterangan` text NOT NULL,
  `id_kategori` varchar(7) NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `status_barang` enum('nonaktif','aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_toko`, `nama_barang`, `keterangan`, `id_kategori`, `kondisi`, `harga`, `stok`, `gambar`, `status_barang`) VALUES
('BRG0001', 'SHP0001', 'Action Figure Iron Man', 'Action figure Ironman dengan bahan resin. tinggi 25 cm dan berat 500 gram.', 'KTG0013', 'Baru', 150000, 3, '673f3f2b39f4b.jpg', 'nonaktif'),
('BRG0002', 'SHP0001', 'Action Figure Iron Man', 'Mainan Ironman', 'KTG0013', 'Baru', 150000, 3, '673f3fd5813de.jpg', 'nonaktif'),
('BRG0003', 'SHP0001', 'Iphone 15', 'Iphone Keluaran Terbaru dengan fitur canggih', 'KTG0019', 'Baru', 15000000, 1, '673f40e6f1010.jpg', 'nonaktif'),
('BRG0004', 'SHP0001', 'Action Figure Iron Man akurat 100%', 'Mainan Action Figure Ironman tinggi 25 cm dengan berat 500 gram. varian silver dan merah', 'KTG0013', 'Baru', 150000, 20, '673f4139a159f.jpg', 'aktif'),
('BRG0005', 'SHP0001', 'Souvenir tas hitam', 'Tas tangan untuk souvenir pernikahan.', 'KTG0020', 'Baru', 5000, 10, '6742c45d65d5d.jpg', 'aktif'),
('BRG0006', 'SHP0001', 'Ini buku strategi', 'Buku strategi dapat beasiswa', 'KTG0002', 'Baru', 150000, 25, '67433573e3823.jpg', 'aktif'),
('BRG0007', 'SHP0001', 'RAKET BADMINTON LINING TECTONIC 7', 'RAKET', 'KTG0018', 'Baru', 300000, 10, '674343137c6cb.jpg', 'aktif'),
('BRG0008', 'SHP0002', 'Gantungan Kunci Botol mini aestetic', 'Introducing the \"ONEPERZEN\" Gantungan Kunci Botol mini estetik, sebuah produk yang dapat memberikan tampilan menarik pada kunci Anda. Produk ini hadir dengan desain botol mini yang unik dan estetis, terbuat dari kaca berkualitas tinggi sehingga memberikan kesan mewah dan elegan.\r\n\r\nGantungan kunci ini memiliki bentuk yang sangat menarik dengan tinggi sekitar 5 cm serta dilengkapi dengan pelapis logam dan plastik. Produk ini cocok untuk membuat tampilan kunci Anda semakin menarik dan berbeda dari yang lain.\r\n\r\nSelain itu, gantungan kunci botol \"ONEPERZEN\" juga dapat menjadi pilihan hadiah bagi orang-orang terdekat Anda. Dengan bentuknya yang unik serta kesannya yang mewah, hadiah ini sangat cocok untuk orang-orang tercinta di sekitar Anda.\r\n\r\nNamun perlu diingat bahwa gantungan hanya digunakan sebagai hiasan saja. Jangan digunakan untuk membuka botol atau membuka benda apapun ya!\r\n\r\nDapatkan Gantungan Kunci Botol Aestetic \"ONE PERZEN\" sekarang juga!', 'KTG0020', 'Baru', 7000, 98, '674ac7cc91914.jpg', 'aktif'),
('BRG0009', 'SHP0003', 'iSUN Mini BiLED Projie Double-Lens Headlamp Lampu Utama Y6D H4 DC9-36V', 'ISUN H4 MB35D MINI PROJIE\r\n(Harga untuk 1 pcs bukan sepasang)\r\n\r\nDeskripsi :\r\nMini projie H4 dengan upgrade light-pattern menyerupai BILED Projector dengan dual-lens dan pada saat high-beam menyerupai laser beam.\r\nDapat diggunakan untuk motor / mobil maupun truck dengan arus mencapai 36V.\r\nDapat diandalkan dan terjamin mutu dan kualitas produk ini.\r\n\r\nSpesifikasi :\r\nMerk : ISUN\r\nInput Voltage : DC9-36V\r\nPower : 30/37W (High/Low-Beam)\r\nJenis Chip : CSP 3570 6-Core + CSP 3-Core (Dual Chip)\r\nCut-off : FLAT semi-circle\r\nLumens : 4.000 Lm\r\nDiameter : 3.2cm / 32mm (pastikan diameter untuk bohlam sesuai)\r\nBahan : Full Aviation Allumunium\r\nPembuang panas : Magnetic-Turbo Fan\r\nWarna lampu : Diamond White (6000K)\r\nFungsi :\r\n- Lampu headlamp motor / mobil\r\nGaransi : 6 bulan', 'KTG0024', 'Baru', 50000, 10, '674c234ee82ed.jpg', 'aktif'),
('BRG0010', 'SHP0001', 'kipas merah', 'kipas souvenir murah meriah', 'KTG0020', 'Baru', 2500, 150, '6755c067ba22f.jpg', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beranda`
--

CREATE TABLE `beranda` (
  `id_beranda` varchar(7) NOT NULL,
  `id_toko` varchar(7) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat_list`
--

CREATE TABLE `chat_list` (
  `id_chat` varchar(11) NOT NULL,
  `id_user` varchar(7) NOT NULL,
  `id_toko` varchar(7) NOT NULL,
  `sender` varchar(7) NOT NULL,
  `pesan` text NOT NULL,
  `dilihat` varchar(1) NOT NULL,
  `id_barang` varchar(7) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `chat_list`
--

INSERT INTO `chat_list` (`id_chat`, `id_user`, `id_toko`, `sender`, `pesan`, `dilihat`, `id_barang`, `created_at`) VALUES
('CHT0000001', 'USR0002', 'SHP0002', 'USR0002', 'Barang ready gan?', '1', 'BRG0008', 1733041859),
('CHT0000002', 'USR0002', 'SHP0002', 'SHP0002', 'Ready', '1', '', 1733041900),
('CHT0000003', 'USR0002', 'SHP0003', 'USR0002', 'Ready gan?', '1', 'BRG0009', 1733043053),
('CHT0000004', 'USR0002', 'SHP0002', 'USR0002', 'bisa kirim hari ini?', '1', '', 1733043816),
('CHT0000005', 'USR0002', 'SHP0002', 'USR0002', 'butuh cepet', '1', '', 1733043883),
('CHT0000006', 'USR0002', 'SHP0002', 'USR0002', 'bisa gan?', '1', '', 1733044253),
('CHT0000007', 'USR0002', 'SHP0002', 'USR0002', 'p', '1', '', 1733044338),
('CHT0000008', 'USR0004', 'SHP0001', 'USR0004', 'Ready om?', '1', 'BRG0004', 1733047412),
('CHT0000009', 'USR0004', 'SHP0001', 'USR0004', 'Ready om?', '1', 'BRG0005', 1733047429),
('CHT0000010', 'USR0004', 'SHP0001', 'USR0004', 'barang nya bisa dikirim?', '1', '', 1733049676),
('CHT0000011', 'USR0002', 'SHP0002', 'USR0002', 'halo', '1', '', 1733054622),
('CHT0000013', 'USR0004', 'SHP0001', 'SHP0001', 'bisa', '1', '', 1733056622),
('CHT0000014', 'USR0004', 'SHP0001', 'SHP0001', 'barang ready gan', '1', '', 1733056729),
('CHT0000015', 'USR0004', 'SHP0001', 'SHP0001', 'silahkan order', '1', '', 1733057584),
('CHT0000016', 'USR0002', 'SHP0003', 'USR0002', 'barang ready gan?', '1', 'BRG0009', 1733060786),
('CHT0000017', 'USR0002', 'SHP0003', 'SHP0003', 'ready', '1', '', 1733061994),
('CHT0000018', 'USR0002', 'SHP0003', 'USR0002', 'bisa kirim hari ini?', '1', '', 1733062013),
('CHT0000019', 'USR0002', 'SHP0003', 'USR0002', 'bisa', '1', '', 1733062372),
('CHT0000020', 'USR0002', 'SHP0003', 'USR0002', 'silahkan order', '1', '', 1733062379),
('CHT0000021', 'USR0002', 'SHP0003', 'SHP0003', 'kebalik pak', '1', '', 1733063917),
('CHT0000022', 'USR0002', 'SHP0003', 'SHP0003', 'silahkan di order pak. sertakan alamat dan no telfon. jangan lupa titik di google maps', '1', '', 1733064029),
('CHT0000023', 'USR0002', 'SHP0003', 'USR0002', 'siap pak saya akan kirimkan semua detail alamat pengiriman. tolong periksa ya pak', '1', '', 1733064321),
('CHT0000024', 'USR0002', 'SHP0003', 'USR0002', 'minimal order berapa pak?', '1', '', 1733064574),
('CHT0000025', 'USR0002', 'SHP0002', 'SHP0002', 'maaf pak baru on', '1', '', 1733107116),
('CHT0000026', 'USR0002', 'SHP0002', 'SHP0002', 'ready pak', '1', '', 1733107429),
('CHT0000027', 'USR0002', 'SHP0002', 'USR0002', 'oke saya order sekarang', '1', '', 1733107508),
('CHT0000028', 'USR0003', 'SHP0001', 'USR0003', 'harga berapa?', '1', 'BRG0005', 1733118867),
('CHT0000029', 'USR0003', 'SHP0001', 'SHP0001', 'bisa kurang kalau beli banyak kak.', '1', '', 1733119247),
('CHT0000030', 'USR0002', 'SHP0003', 'USR0002', 'bisa minta sample tidak?', '1', '', 1733130625),
('CHT0000031', 'USR0003', 'SHP0001', 'SHP0001', 'halo', '1', '', 1733274573),
('CHT0000032', 'USR0003', 'SHP0001', 'USR0003', 'maaf pak. ga jadi', '1', '', 1733296987),
('CHT0000033', 'USR0003', 'SHP0001', 'SHP0001', 'oke', '0', '', 1733297022),
('CHT0000034', 'USR0002', 'SHP0003', 'USR0002', 'barang ready?', '1', 'BRG0009', 1734191913),
('CHT0000035', 'USR0002', 'SHP0003', 'SHP0003', 'ready pak', '1', '', 1734192183);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` varchar(7) NOT NULL,
  `id_transaksi` varchar(7) NOT NULL,
  `id_barang` varchar(7) NOT NULL,
  `id_toko` varchar(7) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_barang`, `id_toko`, `nama_barang`, `jumlah`, `harga`) VALUES
('DTL0001', 'INV0001', 'BRG0003', 'SHP0001', 'Iphone 15', 1, 15000000),
('DTL0002', 'INV0002', 'BRG0003', 'SHP0001', 'Iphone 15', 2, 15000000),
('DTL0003', 'INV0002', 'BRG0004', 'SHP0001', 'Action Figure Iron Man', 2, 150000),
('DTL0004', 'INV0003', 'BRG0003', 'SHP0001', 'Iphone 15', 1, 15000000),
('DTL0005', 'INV0004', 'BRG0005', 'SHP0001', 'Souvenir tas hitam', 1, 5000),
('DTL0006', 'INV0005', 'BRG0008', 'SHP0002', 'Gantungan Kunci Botol mini aestetic', 1, 7000),
('DTL0007', 'INV0006', 'BRG0005', 'SHP0001', 'Souvenir tas hitam', 1, 5000),
('DTL0008', 'INV0007', 'BRG0004', 'SHP0001', 'Action Figure Iron Man', 1, 150000),
('DTL0009', 'INV0008', 'BRG0009', 'SHP0003', 'iSUN Mini BiLED Projie Double-Lens Headlamp Lampu Utama Y6D H4 DC9-36V', 1, 50000),
('DTL0010', 'INV0008', 'BRG0008', 'SHP0002', 'Gantungan Kunci Botol mini aestetic', 1, 7000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(7) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `gambar_kategori` text NOT NULL,
  `status_kategori` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `gambar_kategori`, `status_kategori`) VALUES
('KTG0001', 'Aksesoris Fashion', '673c446b22061.jpeg', ''),
('KTG0002', 'Buku & alat tulis', '673c4484ef604.jpeg', ''),
('KTG0003', 'fashion bayi & anak', '673c44a314b13.jpeg', '1'),
('KTG0004', 'fashion Muslim', '673c44bf1a064.jpeg', ''),
('KTG0005', 'Jam Tangan', '673c44dd99018.jpeg', ''),
('KTG0006', 'Peralatan Dapur', '673c450e7fcce.jpeg', ''),
('KTG0007', 'Kesehatan', '673c455f92055.jpeg', ''),
('KTG0008', 'Ibu dan anak', '673c457549ed3.jpeg', ''),
('KTG0009', 'Makanan dan Minuman', '673e794a1795f.jpeg', ''),
('KTG0010', 'Pakaian Pria', '673e796c608c8.jpeg', ''),
('KTG0011', 'Pakaian Pria', '673e797b39323.jpeg', ''),
('KTG0012', 'Kosmetik', '673e79916a684.jpeg', ''),
('KTG0013', 'Action Figure', '673e79b00645f.png', ''),
('KTG0014', 'Tas Pria', '673e7a5294e3e.jpeg', ''),
('KTG0015', 'Hijab', '673f2b590e159.jpeg', ''),
('KTG0016', 'Sepatu Wanita hak ti', '673f2b69bbdbf.jpeg', ''),
('KTG0017', 'Sepatu Pria', '673f2b7d08a90.jpeg', ''),
('KTG0018', 'Peralatan Olahraga', '673f2ba35cd2b.png', ''),
('KTG0019', 'Gadget', '673f2bd13ccf9.png', ''),
('KTG0020', 'Souvenir', '673f2bfa844d0.png', ''),
('KTG0021', 'Perkakas', '673f2c34109db.png', ''),
('KTG0022', 'Game dan Console', '673f2c664583d.png', ''),
('KTG0023', 'Audio', '673f2c7d38cd3.png', ''),
('KTG0024', 'Peralatan Elektronik', '673f2caed2ea8.png', ''),
('KTG0025', 'Furnitur', '673f2cc3d920b.png', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_favorit`
--

CREATE TABLE `kategori_favorit` (
  `id_kategori` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori_favorit`
--

INSERT INTO `kategori_favorit` (`id_kategori`) VALUES
('KTG0004'),
('KTG0005'),
('KTG0007');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klaim_dana_toko`
--

CREATE TABLE `klaim_dana_toko` (
  `id_klaim` varchar(11) NOT NULL,
  `id_order` varchar(11) NOT NULL,
  `status` enum('diajukan','disetujui') NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `klaim_dana_toko`
--

INSERT INTO `klaim_dana_toko` (`id_klaim`, `id_order`, `status`, `gambar`) VALUES
('KLM00000001', 'ODR00000004', 'diajukan', ''),
('KLM00000002', 'ODR00000007', 'disetujui', '677d22ff3238e.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `id_provinsi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `kota`, `id_provinsi`) VALUES
(1, 'Kabupaten Karawang', 1),
(2, 'Kota Bandung', 1),
(3, 'Jakarta Pusat', 2),
(4, 'Jakarta Utara', 2),
(5, 'Jakarta Timur', 2),
(6, 'Jakarta Barat', 2),
(7, 'Jakarta Selatan', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_order` varchar(11) NOT NULL,
  `id_transaksi` varchar(7) NOT NULL,
  `id_toko` varchar(7) NOT NULL,
  `id_user` varchar(7) NOT NULL,
  `id_alamat` varchar(7) NOT NULL,
  `resi` varchar(128) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status_pesanan` enum('Menunggu Konfirmasi','Diproses','Dikirim','Tiba Tujuan','Selesai','Batal') DEFAULT NULL,
  `image` text NOT NULL,
  `waktu` int(11) NOT NULL,
  `id_klaim` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_order`, `id_transaksi`, `id_toko`, `id_user`, `id_alamat`, `resi`, `total_harga`, `status_pesanan`, `image`, `waktu`, `id_klaim`) VALUES
('ODR00000001', 'INV0001', 'SHP0001', 'USR0002', 'ADD0001', 'Belum Tersedia', 15016000, 'Batal', '', 1732199416, ''),
('ODR00000002', 'INV0002', 'SHP0001', 'USR0002', 'ADD0001', 'Ninja Express|11223344', 30316000, 'Selesai', '67451eded2374.jpg', 1732199460, ''),
('ODR00000003', 'INV0003', 'SHP0001', 'USR0002', 'ADD0001', 'JNE|11223344', 15016000, 'Selesai', '6743c06961a47.jpeg', 1732425400, ''),
('ODR00000004', 'INV0004', 'SHP0001', 'USR0002', 'ADD0001', 'J&T|1122', 21000, 'Selesai', '674aa01201b30.jpg', 1732943764, 'KLM00000001'),
('ODR00000005', 'INV0005', 'SHP0002', 'USR0002', 'ADD0001', 'Belum Tersedia', 23000, 'Batal', '', 1732954795, ''),
('ODR00000006', 'INV0006', 'SHP0001', 'USR0002', 'ADD0001', 'J&T|11122', 21000, 'Selesai', '674facbad2155.jpg', 1733274329, ''),
('ODR00000007', 'INV0007', 'SHP0001', 'USR0002', 'ADD0001', 'J&T|12345678', 166000, 'Selesai', '6750d9be28f54.jpg', 1733351530, 'KLM00000002'),
('ODR00000008', 'INV0008', 'SHP0003', 'USR0002', 'ADD0001', 'JNE|11112222', 66000, 'Dikirim', '', 1734191999, ''),
('ODR00000009', 'INV0008', 'SHP0002', 'USR0002', 'ADD0001', 'Belum Tersedia', 23000, 'Batal', '', 1734191999, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `id_detail` varchar(11) NOT NULL,
  `id_order` varchar(11) NOT NULL,
  `id_barang` varchar(7) NOT NULL,
  `qty` int(11) NOT NULL,
  `ulasan_lock` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order_detail`
--

INSERT INTO `order_detail` (`id_detail`, `id_order`, `id_barang`, `qty`, `ulasan_lock`) VALUES
('ODT00000001', 'ODR00000001', 'BRG0003', 1, 1),
('ODT00000002', 'ODR00000002', 'BRG0003', 2, 1),
('ODT00000003', 'ODR00000002', 'BRG0004', 2, 1),
('ODT00000004', 'ODR00000003', 'BRG0003', 1, 1),
('ODT00000005', 'ODR00000004', 'BRG0005', 1, 1),
('ODT00000006', 'ODR00000005', 'BRG0008', 1, 1),
('ODT00000007', 'ODR00000006', 'BRG0005', 1, 1),
('ODT00000008', 'ODR00000007', 'BRG0004', 1, 1),
('ODT00000009', 'ODR00000008', 'BRG0009', 1, 0),
('ODT00000010', 'ODR00000009', 'BRG0008', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pilihan`
--

CREATE TABLE `pilihan` (
  `id_pilihan` int(11) NOT NULL,
  `id_barang` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pilihan`
--

INSERT INTO `pilihan` (`id_pilihan`, `id_barang`) VALUES
(2, 'BRG0006'),
(6, 'BRG0008'),
(7, 'BRG0007');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `provinsi`) VALUES
(1, 'JAWA BARAT'),
(2, 'DKI JAKARTA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` varchar(7) NOT NULL,
  `id_user` varchar(7) NOT NULL,
  `nama_toko` varchar(126) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `bank` varchar(120) NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  `logo_toko` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `waktu_daftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `id_user`, `nama_toko`, `id_kota`, `bank`, `no_rekening`, `logo_toko`, `status`, `waktu_daftar`) VALUES
('SHP0001', 'USR0002', 'Karawang techno 1', 1, 'BCA', '11223344', 'default.jpg', 0, 1732003291),
('SHP0002', 'USR0003', 'aestetic shop', 1, 'BNI', '123123123', 'default.jpg', 0, 1732953960),
('SHP0003', 'USR0004', 'motor_jaya_1', 3, 'BCA', '11223344', 'default.jpg', 0, 1733042904);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(7) NOT NULL,
  `id_user` varchar(7) NOT NULL,
  `id_alamat` varchar(7) NOT NULL,
  `total_harga_barang` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `biaya_aplikasi` int(11) NOT NULL,
  `asuransi` int(11) NOT NULL,
  `pajak` int(11) NOT NULL,
  `total_belanja` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_alamat`, `total_harga_barang`, `ongkir`, `biaya_aplikasi`, `asuransi`, `pajak`, `total_belanja`, `tanggal_transaksi`) VALUES
('INV0001', 'USR0002', 'ADD0001', 15000000, 16000, 1000, 500, 1802100, 16819600, '2024-11-21 15:30:16'),
('INV0002', 'USR0002', 'ADD0001', 30300000, 16000, 1000, 500, 3638100, 33955600, '2024-11-21 15:31:00'),
('INV0003', 'USR0002', 'ADD0001', 15000000, 16000, 1000, 500, 1802100, 16819600, '2024-11-24 06:16:40'),
('INV0004', 'USR0002', 'ADD0001', 5000, 16000, 1000, 500, 2700, 25200, '2024-11-30 06:16:04'),
('INV0005', 'USR0002', 'ADD0001', 7000, 16000, 1000, 500, 2940, 27440, '2024-11-30 09:19:55'),
('INV0006', 'USR0002', 'ADD0001', 5000, 16000, 1000, 500, 2700, 25200, '2024-12-04 02:05:29'),
('INV0007', 'USR0002', 'ADD0001', 150000, 16000, 1000, 500, 20100, 187600, '2024-12-04 23:32:10'),
('INV0008', 'USR0002', 'ADD0001', 57000, 32000, 1000, 1000, 10920, 101920, '2024-12-14 16:59:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan_produk`
--

CREATE TABLE `ulasan_produk` (
  `id_ulasan` varchar(11) NOT NULL,
  `id_barang` varchar(7) NOT NULL,
  `rating` int(3) NOT NULL,
  `ulasan` text NOT NULL,
  `id_detail` varchar(11) NOT NULL,
  `nama_user` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ulasan_produk`
--

INSERT INTO `ulasan_produk` (`id_ulasan`, `id_barang`, `rating`, `ulasan`, `id_detail`, `nama_user`) VALUES
('REV00000001', 'BRG0004', 5, 'barang bagus dan detail', 'ODT00000003', 'Teguh Winarno'),
('REV00000002', 'BRG0003', 4, 'Barang bagus pengiriman lama', 'ODT00000002', 'Teguh Winarno'),
('REV00000003', 'BRG0003', 5, 'barang bagus kualitas bintang 5', 'ODT00000004', 'Teguh Winarno'),
('REV00000004', 'BRG0005', 4, 'bagus', 'ODT00000005', 'dodi'),
('REV00000005', 'BRG0004', 5, 'bagus', 'ODT00000008', 'dodi'),
('REV00000006', 'BRG0005', 4, 'sesuai harga', 'ODT00000007', 'nur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(7) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_telepon` int(12) NOT NULL,
  `role` int(1) NOT NULL,
  `aktif` int(1) NOT NULL,
  `image` text NOT NULL,
  `waktu_daftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `password`, `email`, `no_telepon`, `role`, `aktif`, `image`, `waktu_daftar`) VALUES
('USR0001', 'Yolooooo', '$2y$10$wY/jYJAa3ZiouikodRL4Zu0i0gl4Xzmhtt.SYofbgqi.cHwJrhxJO', 'admin@gmail.com', 2147483647, 1, 1, 'default.jpg', 1731999306),
('USR0002', 'Teguh Winarno', '$2y$10$6ApmJ5mBJFmYNS/keKedtO1Ab7L5LWLo7Kg5NGKwkAra9pQ6KPUue', 'teguhwinarno777@gmail.com', 2147483647, 2, 1, 'default.jpg', 1732003248),
('USR0003', 'apri andini', '$2y$10$xlCowubz5Efot1ELrHkhF.Ufj35vi2sURcBYWS7rF8boWXU/l858G', 'apri123@gmail.com', 2147483647, 2, 1, 'default.jpg', 1732953917),
('USR0004', 'Tri Lesmana', '$2y$10$SO04rp3lsvHAr1I42tiXbuyK6EEtsXR209h53j8VMotXCCcRXQzY6', 'lesmanatri8@gmail.com', 2147483647, 2, 1, 'default.jpg', 1733042861),
('USR0005', 'arsad', '$2y$10$Jr/n8nRmDhXuw5faxdudV.YJlEQAmueC4qWoRRu8QPM4Du6Cv0auq', 'arsadi@gmail.com', 2147483647, 2, 1, 'default.jpg', 1733297352);

-- --------------------------------------------------------

--
-- Struktur dari tabel `whistlist`
--

CREATE TABLE `whistlist` (
  `id_whistlist` varchar(7) NOT NULL,
  `id_user` varchar(7) NOT NULL,
  `id_barang` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `whistlist`
--

INSERT INTO `whistlist` (`id_whistlist`, `id_user`, `id_barang`) VALUES
('WLT0001', 'USR0002', 'BRG0004'),
('WLT0002', 'USR0005', 'BRG0009'),
('WLT0003', 'USR0002', 'BRG0003'),
('WLT0004', 'USR0002', 'BRG0007'),
('WLT0005', 'USR0002', 'BRG0008'),
('WLT0006', 'USR0002', 'BRG0009');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `chat_list`
--
ALTER TABLE `chat_list`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kategori_favorit`
--
ALTER TABLE `kategori_favorit`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `klaim_dana_toko`
--
ALTER TABLE `klaim_dana_toko`
  ADD PRIMARY KEY (`id_klaim`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `pilihan`
--
ALTER TABLE `pilihan`
  ADD PRIMARY KEY (`id_pilihan`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `whistlist`
--
ALTER TABLE `whistlist`
  ADD PRIMARY KEY (`id_whistlist`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pilihan`
--
ALTER TABLE `pilihan`
  MODIFY `id_pilihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2017 at 05:25 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `paripelalawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `objek_wisata`
--

CREATE TABLE IF NOT EXISTS `objek_wisata` (
  `id_objek` int(11) NOT NULL,
  `nama_objek` varchar(30) NOT NULL,
  `alamat_objek` varchar(45) NOT NULL,
  `gambar_objek` text NOT NULL,
  `ket_objek` text NOT NULL,
  `rincian_objek` text NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `lat_objek` double NOT NULL,
  `long_objek` double NOT NULL,
  `featured_objek` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `objek_wisata`
--

INSERT INTO `objek_wisata` (`id_objek`, `nama_objek`, `alamat_objek`, `gambar_objek`, `ket_objek`, `rincian_objek`, `id_wisata`, `lat_objek`, `long_objek`, `featured_objek`) VALUES
(1, 'Hotel Pangeran', 'Jl.  Jend. Sudirman no. 142', '', '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla blandit justo a metus. Donec diam eros, tristique sit amet, pretium vel, pellentesque ut, neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. In hac habitasse platea dictumst. Aenean scelerisque metus eget sem. In hac habitasse platea dictumst. Phasellus magna sem, vulputate eget, ornare sed, dignissim sit amet, pede. Suspendisse viverra placerat tortor. Praesent aliquet, neque pretium congue mattis, ipsum augue dignissim ante, ac pretium nisl lectus at magna. Cras facilisis felis sit amet lorem.</p>\r\n<p style="text-align: justify;">Mauris tempor ultrices justo. Aenean turpis ipsum, rhoncus vitae, posuere vitae, euismod sed, ligula. Donec tempus quam quis neque. Aliquam velit dui, commodo quis, porttitor eget, convallis et, nisi. Integer risus velit, facilisis eget, viverra et, venenatis id, leo. Proin dolor sapien, adipiscing id, sagittis eu, molestie viverra, mauris. Curabitur risus urna, placerat et, luctus pulvinar, auctor vel, orci. Nam consectetuer mollis dolor.</p>\r\n<p style="text-align: justify;">Etiam non neque ac mi vestibulum placerat. Nam sed nisl nec elit suscipit ullamcorper. Etiam non neque ac mi vestibulum placerat. Sed non ipsum. Pellentesque suscipit accumsan massa. Aenean luctus vulputate turpis. Nunc metus. Donec ut urna. Phasellus auctor enim eget sem. Vivamus feugiat. Aenean luctus vulputate turpis. Quisque aliquam, nulla ac scelerisque convallis, nisi ligula sagittis risus, at nonummy arcu urna pulvinar nibh. Pellentesque convallis dolor vel libero. Vivamus posuere, ante eu tempor dictum, felis nibh facilisis sem, eu auctor metus nulla non lorem. Sed at turpis vitae velit euismod aliquet. Nullam sapien mauris, venenatis at, fermentum at, tempus eu, urna. Integer tempus malesuada pede. Aenean ligula. Vestibulum viverra varius enim. Donec at diam a tellus dignissim vestibulum. Phasellus hendrerit. Etiam non neque ac mi vestibulum placerat. Sed non ipsum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>', '{"Telepon":"076156789","Tarif":"250000","Jenis Penginapan":"Hotel"}', 1, 0, 0, 0),
(2, 'Masda Wisma', 'Jl. Lebak no. 12', '20170417_162336.jpg', '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla blandit justo a metus. Donec diam eros, tristique sit amet, pretium vel, pellentesque ut, neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. In hac habitasse platea dictumst. Aenean scelerisque metus eget sem. In hac habitasse platea dictumst. Phasellus magna sem, vulputate eget, ornare sed, dignissim sit amet, pede. Suspendisse viverra placerat tortor. Praesent aliquet, neque pretium congue mattis, ipsum augue dignissim ante, ac pretium nisl lectus at magna. Cras facilisis felis sit amet lorem.</p>\r\n<p style="text-align: justify;">Mauris tempor ultrices justo. Aenean turpis ipsum, rhoncus vitae, posuere vitae, euismod sed, ligula. Donec tempus quam quis neque. Aliquam velit dui, commodo quis, porttitor eget, convallis et, nisi. Integer risus velit, facilisis eget, viverra et, venenatis id, leo. Proin dolor sapien, adipiscing id, sagittis eu, molestie viverra, mauris. Curabitur risus urna, placerat et, luctus pulvinar, auctor vel, orci. Nam consectetuer mollis dolor.</p>\r\n<p style="text-align: justify;">Etiam non neque ac mi vestibulum placerat. Nam sed nisl nec elit suscipit ullamcorper. Etiam non neque ac mi vestibulum placerat. Sed non ipsum. Pellentesque suscipit accumsan massa. Aenean luctus vulputate turpis. Nunc metus. Donec ut urna. Phasellus auctor enim eget sem. Vivamus feugiat. Aenean luctus vulputate turpis. Quisque aliquam, nulla ac scelerisque convallis, nisi ligula sagittis risus, at nonummy arcu urna pulvinar nibh. Pellentesque convallis dolor vel libero. Vivamus posuere, ante eu tempor dictum, felis nibh facilisis sem, eu auctor metus nulla non lorem. Sed at turpis vitae velit euismod aliquet. Nullam sapien mauris, venenatis at, fermentum at, tempus eu, urna. Integer tempus malesuada pede. Aenean ligula. Vestibulum viverra varius enim. Donec at diam a tellus dignissim vestibulum. Phasellus hendrerit. Etiam non neque ac mi vestibulum placerat. Sed non ipsum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>', '{"Telepon":"1290","Tarif":"200000","Jenis Penginapan":"Wisma"}', 1, 0, 0, 0),
(3, 'Masda Wisma 2', 'Jl. Paus no. 34', '20170417_1522582.jpg', '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla blandit justo a metus. Donec diam eros, tristique sit amet, pretium vel, pellentesque ut, neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. In hac habitasse platea dictumst. Aenean scelerisque metus eget sem. In hac habitasse platea dictumst. Phasellus magna sem, vulputate eget, ornare sed, dignissim sit amet, pede. Suspendisse viverra placerat tortor. Praesent aliquet, neque pretium congue mattis, ipsum augue dignissim ante, ac pretium nisl lectus at magna. Cras facilisis felis sit amet lorem.</p>\r\n<p style="text-align: justify;">Mauris tempor ultrices justo. Aenean turpis ipsum, rhoncus vitae, posuere vitae, euismod sed, ligula. Donec tempus quam quis neque. Aliquam velit dui, commodo quis, porttitor eget, convallis et, nisi. Integer risus velit, facilisis eget, viverra et, venenatis id, leo. Proin dolor sapien, adipiscing id, sagittis eu, molestie viverra, mauris. Curabitur risus urna, placerat et, luctus pulvinar, auctor vel, orci. Nam consectetuer mollis dolor.</p>\r\n<p style="text-align: justify;">Etiam non neque ac mi vestibulum placerat. Nam sed nisl nec elit suscipit ullamcorper. Etiam non neque ac mi vestibulum placerat. Sed non ipsum. Pellentesque suscipit accumsan massa. Aenean luctus vulputate turpis. Nunc metus. Donec ut urna. Phasellus auctor enim eget sem. Vivamus feugiat. Aenean luctus vulputate turpis. Quisque aliquam, nulla ac scelerisque convallis, nisi ligula sagittis risus, at nonummy arcu urna pulvinar nibh. Pellentesque convallis dolor vel libero. Vivamus posuere, ante eu tempor dictum, felis nibh facilisis sem, eu auctor metus nulla non lorem. Sed at turpis vitae velit euismod aliquet. Nullam sapien mauris, venenatis at, fermentum at, tempus eu, urna. Integer tempus malesuada pede. Aenean ligula. Vestibulum viverra varius enim. Donec at diam a tellus dignissim vestibulum. Phasellus hendrerit. Etiam non neque ac mi vestibulum placerat. Sed non ipsum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>', '{"Telepon":"076215271","Tarif":"250000","Jenis Penginapan":"Wisma"}', 1, 0, 0, 0),
(4, 'Masda Wisma 3', 'Jl. Pagoda no. 1', '20170417_1522583.jpg', '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla blandit justo a metus. Donec diam eros, tristique sit amet, pretium vel, pellentesque ut, neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. In hac habitasse platea dictumst. Aenean scelerisque metus eget sem. In hac habitasse platea dictumst. Phasellus magna sem, vulputate eget, ornare sed, dignissim sit amet, pede. Suspendisse viverra placerat tortor. Praesent aliquet, neque pretium congue mattis, ipsum augue dignissim ante, ac pretium nisl lectus at magna. Cras facilisis felis sit amet lorem.</p>\r\n<p style="text-align: justify;">Mauris tempor ultrices justo. Aenean turpis ipsum, rhoncus vitae, posuere vitae, euismod sed, ligula. Donec tempus quam quis neque. Aliquam velit dui, commodo quis, porttitor eget, convallis et, nisi. Integer risus velit, facilisis eget, viverra et, venenatis id, leo. Proin dolor sapien, adipiscing id, sagittis eu, molestie viverra, mauris. Curabitur risus urna, placerat et, luctus pulvinar, auctor vel, orci. Nam consectetuer mollis dolor.</p>\r\n<p style="text-align: justify;">Etiam non neque ac mi vestibulum placerat. Nam sed nisl nec elit suscipit ullamcorper. Etiam non neque ac mi vestibulum placerat. Sed non ipsum. Pellentesque suscipit accumsan massa. Aenean luctus vulputate turpis. Nunc metus. Donec ut urna. Phasellus auctor enim eget sem. Vivamus feugiat. Aenean luctus vulputate turpis. Quisque aliquam, nulla ac scelerisque convallis, nisi ligula sagittis risus, at nonummy arcu urna pulvinar nibh. Pellentesque convallis dolor vel libero. Vivamus posuere, ante eu tempor dictum, felis nibh facilisis sem, eu auctor metus nulla non lorem. Sed at turpis vitae velit euismod aliquet. Nullam sapien mauris, venenatis at, fermentum at, tempus eu, urna. Integer tempus malesuada pede. Aenean ligula. Vestibulum viverra varius enim. Donec at diam a tellus dignissim vestibulum. Phasellus hendrerit. Etiam non neque ac mi vestibulum placerat. Sed non ipsum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>', '{"Telepon":"089999","Tarif":"205000","Jenis Penginapan":"Wisma"}', 1, 0.4433292, 102.0854197, 1),
(5, 'Masda Wisma 4', 'Jl. Milton no. 43', '', '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla blandit justo a metus. Donec diam eros, tristique sit amet, pretium vel, pellentesque ut, neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. In hac habitasse platea dictumst. Aenean scelerisque metus eget sem. In hac habitasse platea dictumst. Phasellus magna sem, vulputate eget, ornare sed, dignissim sit amet, pede. Suspendisse viverra placerat tortor. Praesent aliquet, neque pretium congue mattis, ipsum augue dignissim ante, ac pretium nisl lectus at magna. Cras facilisis felis sit amet lorem.</p>\r\n<p style="text-align: justify;">Mauris tempor ultrices justo. Aenean turpis ipsum, rhoncus vitae, posuere vitae, euismod sed, ligula. Donec tempus quam quis neque. Aliquam velit dui, commodo quis, porttitor eget, convallis et, nisi. Integer risus velit, facilisis eget, viverra et, venenatis id, leo. Proin dolor sapien, adipiscing id, sagittis eu, molestie viverra, mauris. Curabitur risus urna, placerat et, luctus pulvinar, auctor vel, orci. Nam consectetuer mollis dolor.</p>\r\n<p style="text-align: justify;">Etiam non neque ac mi vestibulum placerat. Nam sed nisl nec elit suscipit ullamcorper. Etiam non neque ac mi vestibulum placerat. Sed non ipsum. Pellentesque suscipit accumsan massa. Aenean luctus vulputate turpis. Nunc metus. Donec ut urna. Phasellus auctor enim eget sem. Vivamus feugiat. Aenean luctus vulputate turpis. Quisque aliquam, nulla ac scelerisque convallis, nisi ligula sagittis risus, at nonummy arcu urna pulvinar nibh. Pellentesque convallis dolor vel libero. Vivamus posuere, ante eu tempor dictum, felis nibh facilisis sem, eu auctor metus nulla non lorem. Sed at turpis vitae velit euismod aliquet. Nullam sapien mauris, venenatis at, fermentum at, tempus eu, urna. Integer tempus malesuada pede. Aenean ligula. Vestibulum viverra varius enim. Donec at diam a tellus dignissim vestibulum. Phasellus hendrerit. Etiam non neque ac mi vestibulum placerat. Sed non ipsum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>', '{"Telepon":"07888888","Tarif":"250000","Jenis Penginapan":"Wisma"}', 1, 23.021760940551758, 43.37299346923828, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `ni_pegawai` varchar(15) NOT NULL,
  `nama_pegawai` varchar(20) NOT NULL,
  `alamat_pegawai` varchar(35) NOT NULL,
  `telp_pegawai` varchar(15) NOT NULL,
  `username_pegawai` varchar(15) NOT NULL,
  `password_pegawai` varchar(100) NOT NULL,
  `level_sistem_pegawai` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `ni_pegawai`, `nama_pegawai`, `alamat_pegawai`, `telp_pegawai`, `username_pegawai`, `password_pegawai`, `level_sistem_pegawai`) VALUES
(3, '197806271290100', 'Armin Effendi', 'Jl. Kebagusan gg. Banjar No. 12', '0899765432110', 'armin_admin', '$2y$10$XZsgS9pIed3MUBSxl4ChvO/by2A.VSyQS8JSChA4XpR95pJN0fp6m', 2);

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE IF NOT EXISTS `testimoni` (
  `id_testi` int(11) NOT NULL,
  `id_objek` int(11) NOT NULL,
  `tgl_testi` datetime NOT NULL,
  `nama_pengirim_testi` varchar(25) NOT NULL,
  `isi_testi` text,
  `nilai_testi` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testi`, `id_objek`, `tgl_testi`, `nama_pengirim_testi`, `isi_testi`, `nilai_testi`) VALUES
(1, 4, '2017-09-30 13:51:50', 'Budi Muhaimin', 'Penginapannya bagus dan nyaman!', 4),
(2, 4, '2017-10-01 07:57:06', 'Ahmad Budi', 'Makanannya enak!', 5);

-- --------------------------------------------------------

--
-- Table structure for table `webinfo_artikel`
--

CREATE TABLE IF NOT EXISTS `webinfo_artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul_artikel` varchar(70) NOT NULL,
  `tgl_terbit_artikel` datetime NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `isi_artikel` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `cover_artikel` varchar(35) NOT NULL,
  `highlight_slider` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webinfo_artikel`
--

INSERT INTO `webinfo_artikel` (`id_artikel`, `judul_artikel`, `tgl_terbit_artikel`, `id_pegawai`, `isi_artikel`, `id_kategori`, `cover_artikel`, `highlight_slider`) VALUES
(1, 'Visi, Misi dan Tujuan', '2017-09-23 13:48:49', 3, '<h4 style="margin: 10px 0px; font-family: ''Droid Sans'', sans-serif; line-height: 20px; text-rendering: optimizeLegibility; font-size: 17.5px; text-align: justify;">VISI, MISI DAN TUJUAN</h4>\r\n<p style="margin: 0px 0px 10px; font-family: ''Droid Sans'', sans-serif; font-size: 14px; text-align: justify;">Berdasarkan analisa terhadap pernyataan politik Bupati dan Wakil Bupati semasa kampanye Pilkada, kemudian kondisi umum dan masalah pembangunan serta isu-isu strategis Kabupaten Pelalawan saat ini yang menjadi tantangan lima tahunan kedepan, dengan memperhitungkan sumber daya sebagai modal dasar yang dimiliki. Maka Visi pembangunan RPJMD Kabupaten Tahun 2011 &ndash; 2016 :</p>\r\n<div style="margin: 10px 0px; font-family: ''Droid Sans'', sans-serif; font-size: 16px; text-align: center; font-weight: bold;">VISI KABUPATEN PELALAWAN</div>\r\n<p>&nbsp;</p>\r\n<div style="margin: 10px 0px; font-family: ''Droid Sans'', sans-serif; font-size: 12px; text-align: center; font-weight: bold;">" TERWUJUDNYA KABUPATEN PELALAWAN MAJU DAN SEJAHTERA, MELALUI PEMBERDAYAAN EKONOMI KERAKYATAN YANG DIDUKUNG OLEH PERTANIAN YANG UNGGUL DAN INDUSTRI YANG TANGGUH DALAM MASYARAKAT YANG BERADAT, BERIMAN, BERTAQWA DAN BEBUDAYA MELAYU TAHUN 2030 "</div>\r\n<p>&nbsp;</p>\r\n<p style="margin: 0px 0px 10px; font-family: ''Droid Sans'', sans-serif; font-size: 14px; text-align: justify;">Rumusan Visi tersebut diatas mengandung makna sebagai berikut :</p>\r\n<ul style="padding: 0px; margin: 0px 0px 10px 25px; font-family: ''Droid Sans'', sans-serif; font-size: 14px; text-align: justify;">\r\n<li style="line-height: 20px;">Kabupaten Pelalawan yang maju dan sejahtera</li>\r\n<li style="line-height: 20px;">Pemberdayaan Ekonomi Kerakyatan</li>\r\n<li style="line-height: 20px;">Pertanian yang unggul</li>\r\n<li style="line-height: 20px;">Masyarakat beriman dan bertaqwa serta bebudaya melayu</li>\r\n</ul>\r\n<p style="margin: 0px 0px 10px; font-family: ''Droid Sans'', sans-serif; font-size: 14px; text-align: justify;">&nbsp;</p>\r\n<div style="margin: 10px 0px; font-family: ''Droid Sans'', sans-serif; font-size: 16px; text-align: center; font-weight: bold;">MISI KABUPATEN PELALAWAN</div>\r\n<p style="margin: 0px 0px 10px; font-family: ''Droid Sans'', sans-serif; font-size: 14px; text-align: justify;">Meningkatkan kualitas kehidupan dengan terpenuhinya kebutuhan dasar, sandang pangan, papan, pendidikan, kesehatan, bermartabat dan berbudaya. Menciptakan lapangan kerja yang meningkatkan pendapatan masyarakat masyarakat melalui pembangunan usaha ekonomi kerakyatan. Meningkatkan hasil dan mutu pertanian melalui pemanfaatkan teknologi berbasis agrobisnis serta pengelolaan hutan-hutan yang lestari. Menciptakan dan membina industri yang mampu menghasilkan produk yang berdaya saing dan berwawasan lingkungan. Peningkatan pengamalan ajaran agama dalam kehidupan sehari-hari melalui pendidikan agama dan memfungsikan lembaga-lembaga keagamaan sebagai wadah pembinaan umat.</p>', 7, '', 0),
(2, 'Mau Liburan? Nih 5 Destinasi Wisata Terbaik di Riau', '2017-10-01 09:10:00', 3, '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla blandit justo a metus. Donec diam eros, tristique sit amet, pretium vel, pellentesque ut, neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. In hac habitasse platea dictumst. Aenean scelerisque metus eget sem. In hac habitasse platea dictumst. Phasellus magna sem, vulputate eget, ornare sed, dignissim sit amet, pede. Suspendisse viverra placerat tortor. Praesent aliquet, neque pretium congue mattis, ipsum augue dignissim ante, ac pretium nisl lectus at magna. Cras facilisis felis sit amet lorem.</p>\r\n<p style="text-align: justify;">Mauris tempor ultrices justo. Aenean turpis ipsum, rhoncus vitae, posuere vitae, euismod sed, ligula. Donec tempus quam quis neque. Aliquam velit dui, commodo quis, porttitor eget, convallis et, nisi. Integer risus velit, facilisis eget, viverra et, venenatis id, leo. Proin dolor sapien, adipiscing id, sagittis eu, molestie viverra, mauris. Curabitur risus urna, placerat et, luctus pulvinar, auctor vel, orci. Nam consectetuer mollis dolor.</p>\r\n<p style="text-align: justify;">Etiam non neque ac mi vestibulum placerat. Nam sed nisl nec elit suscipit ullamcorper. Etiam non neque ac mi vestibulum placerat. Sed non ipsum. Pellentesque suscipit accumsan massa. Aenean luctus vulputate turpis. Nunc metus. Donec ut urna. Phasellus auctor enim eget sem. Vivamus feugiat. Aenean luctus vulputate turpis. Quisque aliquam, nulla ac scelerisque convallis, nisi ligula sagittis risus, at nonummy arcu urna pulvinar nibh. Pellentesque convallis dolor vel libero. Vivamus posuere, ante eu tempor dictum, felis nibh facilisis sem, eu auctor metus nulla non lorem. Sed at turpis vitae velit euismod aliquet. Nullam sapien mauris, venenatis at, fermentum at, tempus eu, urna. Integer tempus malesuada pede. Aenean ligula. Vestibulum viverra varius enim. Donec at diam a tellus dignissim vestibulum. Phasellus hendrerit. Etiam non neque ac mi vestibulum placerat. Sed non ipsum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>', 6, '', 1),
(3, 'Struktur Organisasi', '2017-10-01 09:54:57', 3, '', 7, '', 0),
(4, 'Penginapan Terbaik di Pelalawan', '2017-10-11 10:15:14', 3, '<p style="text-align: justify;"><img class="img img-responsive" src="../../images/crop.jpg" alt="" />Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla blandit justo a metus. Donec diam eros, tristique sit amet, pretium vel, pellentesque ut, neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. In hac habitasse platea dictumst. Aenean scelerisque metus eget sem. In hac habitasse platea dictumst. Phasellus magna sem, vulputate eget, ornare sed, dignissim sit amet, pede. Suspendisse viverra placerat tortor. Praesent aliquet, neque pretium congue mattis, ipsum augue dignissim ante, ac pretium nisl lectus at magna. Cras facilisis felis sit amet lorem.</p>\r\n<p style="text-align: justify;">Mauris tempor ultrices justo. Aenean turpis ipsum, rhoncus vitae, posuere vitae, euismod sed, ligula. Donec tempus quam quis neque. Aliquam velit dui, commodo quis, porttitor eget, convallis et, nisi. Integer risus velit, facilisis eget, viverra et, venenatis id, leo. Proin dolor sapien, adipiscing id, sagittis eu, molestie viverra, mauris. Curabitur risus urna, placerat et, luctus pulvinar, auctor vel, orci. Nam consectetuer mollis dolor.</p>\r\n<p style="text-align: justify;">Etiam non neque ac mi vestibulum placerat. Nam sed nisl nec elit suscipit ullamcorper. Etiam non neque ac mi vestibulum placerat. Sed non ipsum. Pellentesque suscipit accumsan massa. Aenean luctus vulputate turpis. Nunc metus. Donec ut urna. Phasellus auctor enim eget sem. Vivamus feugiat. Aenean luctus vulputate turpis. Quisque aliquam, nulla ac scelerisque convallis, nisi ligula sagittis risus, at nonummy arcu urna pulvinar nibh. Pellentesque convallis dolor vel libero. Vivamus posuere, ante eu tempor dictum, felis nibh facilisis sem, eu auctor metus nulla non lorem. Sed at turpis vitae velit euismod aliquet. Nullam sapien mauris, venenatis at, fermentum at, tempus eu, urna. Integer tempus malesuada pede. Aenean ligula. Vestibulum viverra varius enim. Donec at diam a tellus dignissim vestibulum. Phasellus hendrerit. Etiam non neque ac mi vestibulum placerat. Sed non ipsum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>', 1, 'images/crop.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `webinfo_kategori`
--

CREATE TABLE IF NOT EXISTS `webinfo_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webinfo_kategori`
--

INSERT INTO `webinfo_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Hotel'),
(2, 'Restaurant'),
(3, 'Biro Wisata'),
(4, 'Event'),
(5, 'Kerajinan'),
(6, 'Informasi Publik'),
(7, 'Profil');

-- --------------------------------------------------------

--
-- Table structure for table `webinfo_komentar`
--

CREATE TABLE IF NOT EXISTS `webinfo_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `tgl_komentar` datetime NOT NULL,
  `nama_pengirim_komentar` varchar(25) NOT NULL,
  `isi_komentar` text NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webinfo_komentar`
--

INSERT INTO `webinfo_komentar` (`id_komentar`, `id_artikel`, `tgl_komentar`, `nama_pengirim_komentar`, `isi_komentar`, `parent_id`) VALUES
(1, 1, '2017-09-30 11:29:29', 'Hai', 'Halo Semua!', 0),
(2, 4, '2017-10-11 11:26:18', 'Hai', 'Hai Semuanya', 0),
(3, 4, '2017-10-11 11:29:02', 'Siapa', 'Juga', 2);

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE IF NOT EXISTS `wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama_wisata`) VALUES
(1, 'Hotel dan Penginapan'),
(2, 'Kuliner'),
(3, 'Biro Wisata'),
(4, 'Event'),
(5, 'Kerajinan Lokal'),
(6, 'Objek Wisata');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `objek_wisata`
--
ALTER TABLE `objek_wisata`
  ADD PRIMARY KEY (`id_objek`), ADD KEY `id_wisata` (`id_wisata`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testi`), ADD KEY `id_artikel` (`id_objek`);

--
-- Indexes for table `webinfo_artikel`
--
ALTER TABLE `webinfo_artikel`
  ADD PRIMARY KEY (`id_artikel`), ADD KEY `id_pegawai` (`id_pegawai`), ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `webinfo_kategori`
--
ALTER TABLE `webinfo_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `webinfo_komentar`
--
ALTER TABLE `webinfo_komentar`
  ADD PRIMARY KEY (`id_komentar`), ADD KEY `id_artikel` (`id_artikel`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `objek_wisata`
--
ALTER TABLE `objek_wisata`
  MODIFY `id_objek` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `webinfo_artikel`
--
ALTER TABLE `webinfo_artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `webinfo_kategori`
--
ALTER TABLE `webinfo_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `webinfo_komentar`
--
ALTER TABLE `webinfo_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `objek_wisata`
--
ALTER TABLE `objek_wisata`
ADD CONSTRAINT `objek_wisata_ibfk_1` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id_wisata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testimoni`
--
ALTER TABLE `testimoni`
ADD CONSTRAINT `testimoni_ibfk_1` FOREIGN KEY (`id_objek`) REFERENCES `objek_wisata` (`id_objek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `webinfo_artikel`
--
ALTER TABLE `webinfo_artikel`
ADD CONSTRAINT `webinfo_artikel_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `webinfo_artikel_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `webinfo_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `webinfo_komentar`
--
ALTER TABLE `webinfo_komentar`
ADD CONSTRAINT `webinfo_komentar_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `webinfo_artikel` (`id_artikel`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

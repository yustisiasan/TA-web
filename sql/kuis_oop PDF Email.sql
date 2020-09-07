-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2016 at 02:22 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kuis_oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenisKelamin` varchar(100) NOT NULL,
  `hobi` varchar(100) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `jenisKelamin`, `hobi`) VALUES
('6301134050', 'Shervano Naodias', 'Bali', 'Laki-laki', 'Terbang'),
('6301134051', 'Malikha', 'Denpasar', 'Perempuan', 'Terbang, Ngoding'),
('6301134052', 'Husky', 'Sukabirus', 'Laki-laki', 'Salto, Terbang, Ngoding'),
('6301134053', 'Shiori Kutsuna', 'Bandung', 'Perempuan', 'Salto, Ngoding'),
('6301134054', 'Azharuddin Arrosis', 'GBA', 'Laki-laki', 'Salto');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `noTelp` varchar(100) NOT NULL,
  `jenis_akses` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `kode_aktivasi` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `noTelp`, `jenis_akses`, `status`, `kode_aktivasi`) VALUES
('admin', 'admin', 'admin@gmail.com', '123456789011', 'admin', 'aktif', ''),
('malikha', 'malikha', 'malikha@gmail.com', '123456789011', 'user', 'aktif', ''),
('sgracias', 'sgracias', 'sgracias@gmail.com', '123456789011', 'user', 'aktif', ''),
('zeuz', 'zeuz', 'shervano.naodias@gmail.com', '123456789011', 'user', 'non-aktif', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

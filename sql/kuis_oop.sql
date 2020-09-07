-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2016 at 01:55 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

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
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
`userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `noTelp` int(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`userid`, `username`, `password`, `nama`, `jenis`, `email`, `noTelp`) VALUES
(1, 'admin', 'admin', 'admin', 'Admin', 'admin@gmail.com', 2147483647),
(2, 'willy', 'willy', 'willy', 'Mahasiswa', 'willy@gmail.com', 2147483647),
(3, 'udin', 'udin', 'udin', 'Dosen', 'dosen@gmail.com', 2147483647),
(4, 'a', 'a', 'a', '2', 'admin@gmail.com', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenisKelamin` varchar(100) NOT NULL,
  `hobi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `jenisKelamin`, `hobi`) VALUES
('6301134050', 'Shervano Naodias', 'Bali', 'Laki-laki', 'Terbang'),
('6301134051', 'Malikha', 'Denpasar', 'Perempuan', 'Terbang, Ngoding'),
('6301134053', 'Shiori Kutsuna', 'Bandung', 'Perempuan', 'Salto, Ngoding'),
('6301134054', 'Azharuddin Arrosis', 'GBA', 'Laki-laki', 'Salto, Terbang');

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
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `noTelp`, `jenis_akses`, `status`) VALUES
('admin', 'admin', 'admin@gmail.com', '123456789011', 'admin', 'aktif'),
('anisa', 'anisa', 'anisa@gmail.com', '081231231231', 'user', 'non-aktif'),
('azhar', 'azhar', 'azhar@gmail.com', '081234123423', 'user', 'aktif'),
('fira', 'fira', 'fira@gmail.com', '081234123428', 'user', 'non-aktif'),
('nanang', 'nanang', 'nanang@gmail.com', '081231231235', 'user', 'non-aktif'),
('rachel', 'rachel', 'rachel@gmail.com', '081231231123', 'user', 'aktif'),
('rahmat', 'rahmat', 'rahmat@gmail.com', '082123123211', 'user', 'non-aktif'),
('sgracias', 'sgracias', 'sgracias@gmail.com', '123456789011', 'user', 'aktif'),
('willy', 'willy', '9j.willyamaludinsanjaya2@gmail.com', '089999722202', 'user', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
 ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
 ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

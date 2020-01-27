-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 06:00 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sba`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_headset_hl`
--

CREATE TABLE IF NOT EXISTS `tbl_headset_hl` (
  `nis` char(10) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jabatan` varchar(30) NOT NULL,
  `satuan_kerja` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `it` varchar(50) NOT NULL,
  `merek` varchar(10) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `sn` varchar(20) NOT NULL,
  `no_inventory` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `sfile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_headset_hl`
--

INSERT INTO `tbl_headset_hl` (`nis`, `nama`, `jabatan`, `satuan_kerja`, `tgl_surat`, `no_surat`, `it`, `merek`, `type`, `sn`, `no_inventory`, `keterangan`, `sfile`) VALUES
('0005', 'AHYYA PUTRI ANDIAZ01', 'Penyuluh Online', '2019-09-19', '2019-09-19', '1772/PJ/MAPANOS1/020819', 'Arifudin Gani', 'Arifudin G', 'Redmi 5A', '17010/10365292', '1771.H004.23.3.18', 'Redmi 5A', 'tidak ada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_headset_pb`
--

CREATE TABLE IF NOT EXISTS `tbl_headset_pb` (
  `nis` char(10) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jabatan` varchar(30) NOT NULL,
  `satuan_kerja` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `it` varchar(50) NOT NULL,
  `merek` varchar(10) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `sn` varchar(20) NOT NULL,
  `no_inventory` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `sfile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_headset_pb`
--

INSERT INTO `tbl_headset_pb` (`nis`, `nama`, `jabatan`, `satuan_kerja`, `tgl_surat`, `no_surat`, `it`, `merek`, `type`, `sn`, `no_inventory`, `keterangan`, `sfile`) VALUES
('0005', 'AHYYA PUTRI ANDIAZ01', 'Penyuluh Online', '2019-09-19', '2019-09-19', '1772/PJ/MAPANOS1/020819', 'Arifudin Gani', 'Arifudin G', 'Redmi 5A', '17010/10365292', '1771.H004.23.3.18', 'Redmi 5A', 'tidak ada'),
('127', '', '', '', '0000-00-00', '', '', 'XIAO', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_headset_pj`
--

CREATE TABLE IF NOT EXISTS `tbl_headset_pj` (
  `nis` char(10) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jabatan` varchar(30) NOT NULL,
  `satuan_kerja` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `it` varchar(50) NOT NULL,
  `merek` varchar(10) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `sn` varchar(20) NOT NULL,
  `no_inventory` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `sfile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_headset_pj`
--

INSERT INTO `tbl_headset_pj` (`nis`, `nama`, `jabatan`, `satuan_kerja`, `tgl_surat`, `no_surat`, `it`, `merek`, `type`, `sn`, `no_inventory`, `keterangan`, `sfile`) VALUES
('0005', 'AHYYA PUTRI ANDIAZ01', 'Penyuluh Online', '2019-09-19', '2019-09-19', '1772/PJ/MAPANOS1/020819', 'Arifudin Gani', 'Arifudin G', 'Redmi 5A', '17010/10365292', '1771.H004.23.3.18', 'Redmi 5A', 'tidak ada'),
('127', '', '', '', '0000-00-00', '', '', 'XIAO', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hp_hl`
--

CREATE TABLE IF NOT EXISTS `tbl_hp_hl` (
  `nis` char(10) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jabatan` varchar(30) NOT NULL,
  `satuan_kerja` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `it` varchar(50) NOT NULL,
  `merek` varchar(10) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `sn` varchar(20) NOT NULL,
  `no_inventory` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `sfile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_hp_hl`
--

INSERT INTO `tbl_hp_hl` (`nis`, `nama`, `jabatan`, `satuan_kerja`, `tgl_surat`, `no_surat`, `it`, `merek`, `type`, `sn`, `no_inventory`, `keterangan`, `sfile`) VALUES
('1990', 'AHYYA PUTRI ANDIAZ', 'Penyuluh Online', 'Online Sales', '2019-09-09', '1772/PJ/MAPANOS1/020819', 'Arifudin Gani', 'XIAOMI', 'Redmi 5A', '17010/10367449', '1771.H004.23.3.18', '+', 'tidak ada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hp_pb`
--

CREATE TABLE IF NOT EXISTS `tbl_hp_pb` (
  `nis` char(10) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jabatan` varchar(30) NOT NULL,
  `satuan_kerja` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `it` varchar(50) NOT NULL,
  `merek` varchar(10) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `sn` varchar(20) NOT NULL,
  `no_inventory` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `sfile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_hp_pb`
--

INSERT INTO `tbl_hp_pb` (`nis`, `nama`, `jabatan`, `satuan_kerja`, `tgl_surat`, `no_surat`, `it`, `merek`, `type`, `sn`, `no_inventory`, `keterangan`, `sfile`) VALUES
('1990', 'AHYYA PUTRI ANDIAZ', 'Penyuluh Online', '2019-09-12', '2019-09-12', '1878/PJ/MAPANOS2/250719', 'Arifudin Gani', 'Arifudin G', 'Redmi 5A', '17010/10190727', '1761.H004.23.3.18', '+', 'tidak ada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hp_pj`
--

CREATE TABLE IF NOT EXISTS `tbl_hp_pj` (
  `nis` char(10) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jabatan` varchar(30) NOT NULL,
  `satuan_kerja` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `it` varchar(50) NOT NULL,
  `merek` varchar(10) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `sn` varchar(20) NOT NULL,
  `no_inventory` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `sfile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_hp_pj`
--

INSERT INTO `tbl_hp_pj` (`nis`, `nama`, `jabatan`, `satuan_kerja`, `tgl_surat`, `no_surat`, `it`, `merek`, `type`, `sn`, `no_inventory`, `keterangan`, `sfile`) VALUES
('0005', 'AHYYA PUTRI ANDIAZ', 'Penyuluh Online', 'Online Sales', '2019-09-19', '1772/PJ/MAPANOS1/020819', 'Arifudin Gani', 'XIAOMI', 'Redmi 5A', '17010/10365292', '1771.H004.23.3.18', '+', 'tidak ada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laptop_hl`
--

CREATE TABLE IF NOT EXISTS `tbl_laptop_hl` (
  `nis` char(10) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jabatan` varchar(30) NOT NULL,
  `satuan_kerja` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `it` varchar(50) NOT NULL,
  `merek` varchar(10) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `sn` varchar(20) NOT NULL,
  `no_inventory` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `sfile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_laptop_hl`
--

INSERT INTO `tbl_laptop_hl` (`nis`, `nama`, `jabatan`, `satuan_kerja`, `tgl_surat`, `no_surat`, `it`, `merek`, `type`, `sn`, `no_inventory`, `keterangan`, `sfile`) VALUES
('1990', 'AHYYA PUTRI ANDIAZ', 'Penyuluh Online', '2019-09-19', '2019-09-19', '1907/HL/MAPANOS2/250719', 'Arifudin Gani', 'XIAOMI', 'Redmi 5A', '17010/10190727', '1771.H004.23.3.18', '-', 'tidak ada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laptop_pb`
--

CREATE TABLE IF NOT EXISTS `tbl_laptop_pb` (
  `nis` char(10) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jabatan` varchar(30) NOT NULL,
  `satuan_kerja` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `it` varchar(50) NOT NULL,
  `merek` varchar(10) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `sn` varchar(20) NOT NULL,
  `no_inventory` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `sfile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_laptop_pb`
--

INSERT INTO `tbl_laptop_pb` (`nis`, `nama`, `jabatan`, `satuan_kerja`, `tgl_surat`, `no_surat`, `it`, `merek`, `type`, `sn`, `no_inventory`, `keterangan`, `sfile`) VALUES
('1990', 'AHYYA PUTRI ANDIAZ', 'Penyuluh Online', '2019-09-19', '2019-09-19', '1878/PJ/MAPANOS2/250719', 'Arifudin Gani', 'XIAOMI', 'Redmi 5A', '17010/10367449', '1761.H004.23.3.18', '( + ) Charger', 'tidak ada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laptop_pj`
--

CREATE TABLE IF NOT EXISTS `tbl_laptop_pj` (
  `nis` char(10) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jabatan` varchar(30) NOT NULL,
  `satuan_kerja` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `it` varchar(50) NOT NULL,
  `merek` varchar(10) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `sn` varchar(20) NOT NULL,
  `no_inventory` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `sfile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_laptop_pj`
--

INSERT INTO `tbl_laptop_pj` (`nis`, `nama`, `jabatan`, `satuan_kerja`, `tgl_surat`, `no_surat`, `it`, `merek`, `type`, `sn`, `no_inventory`, `keterangan`, `sfile`) VALUES
('1990', 'AHYYA PUTRI ANDIAZ', 'Penyuluh Online', 'Online Sales', '2019-02-02', '1771/PJ/MAPANOS1/020819', 'Arifudin Gani', 'XIAOMI', 'Redmi 5A', '17010/10365292', '1771.H004.23.3.18', '+', 'tidak ada');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`iduser` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `fullname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `admin`, `fullname`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_headset_hl`
--
ALTER TABLE `tbl_headset_hl`
 ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_headset_pb`
--
ALTER TABLE `tbl_headset_pb`
 ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_headset_pj`
--
ALTER TABLE `tbl_headset_pj`
 ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_hp_hl`
--
ALTER TABLE `tbl_hp_hl`
 ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_hp_pb`
--
ALTER TABLE `tbl_hp_pb`
 ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_hp_pj`
--
ALTER TABLE `tbl_hp_pj`
 ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_laptop_hl`
--
ALTER TABLE `tbl_laptop_hl`
 ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_laptop_pb`
--
ALTER TABLE `tbl_laptop_pb`
 ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_laptop_pj`
--
ALTER TABLE `tbl_laptop_pj`
 ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`iduser`), ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

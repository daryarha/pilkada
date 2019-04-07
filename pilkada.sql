-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2018 at 10:42 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pilkada`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `konfirmasi` tinyint(1) DEFAULT '0',
  `statusvote` tinyint(1) NOT NULL DEFAULT '0',
  `tipeakun` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `password`, `konfirmasi`, `statusvote`, `tipeakun`) VALUES
('aa', '4124bc0a9335c27f086f24ba207a4912', 0, 1, 1),
('ff', '633de4b0c14ca52ea2432a3c8a5c4c31', 0, 0, 1),
('gg', '73c18c59a39b18382081ec00bb456d43', 0, 0, 1),
('sd', '6226f7cbe59e99a90b5cef6f94f966fd', 0, 1, 1),
('test2', 'ad0234829205b9033196ba818f7a872b', 1, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `calon`
--

CREATE TABLE `calon` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `visi_misi` varchar(255) DEFAULT NULL,
  `url_foto` varchar(255) NOT NULL,
  `hasilvote` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon`
--

INSERT INTO `calon` (`id`, `nama`, `email`, `no_hp`, `visi_misi`, `url_foto`, `hasilvote`) VALUES
(1, 'ah', 's@a.com', '222', 'jkt', 'uploads/foto/ahok.png', 1),
(2, 'ssdd', 'dd@gmail.c', 'aaaa', 'aaaassss', 'uploads/foto/174281.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `calon`
--
ALTER TABLE `calon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon`
--
ALTER TABLE `calon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

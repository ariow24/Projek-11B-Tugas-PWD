-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2025 at 07:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `universitas`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_mhs`
--

CREATE TABLE `table_mhs` (
  `id` int(8) NOT NULL,
  `nim` varchar(14) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `umur` int(3) NOT NULL,
  `tempatLahir` varchar(25) NOT NULL,
  `tanggaLahir` date NOT NULL,
  `jmlSaudara` int(2) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `noHP` varchar(20) NOT NULL,
  `jenisKelamin` varchar(12) NOT NULL,
  `status` varchar(15) NOT NULL,
  `hobi` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_mhs`
--
ALTER TABLE `table_mhs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_mhs`
--
ALTER TABLE `table_mhs`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 09, 2020 at 08:48 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `age` date NOT NULL,
  `permits` int(11) NOT NULL,
  `cookie` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `age`, `permits`, `cookie`) VALUES
(46, 'Lam Tran Tuan', '25d55ad283aa400af464c76d713c07ad', 'lnd.1223@gmail.com', '0000-00-00', 0, ''),
(54, 'Nguyen Minh Tuấn', '25d55ad283aa400af464c76d713c07ad', 'nmt.060708@gmail.com', '0000-00-00', 1, 'otwjdyATyw2VlOxcsywF8HkG9iFIl8Ew'),
(55, 'Nguyen Ba Hao A', '25d55ad283aa400af464c76d713c07ad', 'nbh.no1@gmail.com', '0000-00-00', 0, '8P6Dnm5nNeI9zM9AtaP1kdXF63xlwI58'),
(60, 'Duong Tung Duong', '25d55ad283aa400af464c76d713c07ad', 'nbh.no2@gmail.com', '0000-00-00', 0, ''),
(61, 'Vu Song Vu', 'e10adc3949ba59abbe56e057f20f883e', 'double   V@gmail.com', '0000-00-00', 0, ''),
(62, 'Duong Tung Duong', '25d55ad283aa400af464c76d713c07ad', 'doubleVA@gmail.com', '0000-00-00', 0, ''),
(65, 'Lam Tran Tuan', '25d55ad283aa400af464c76d713c07ad', 'nmt.060708aaa@gmail.com', '0000-00-00', 0, ''),
(67, 'Lam Tran Tuannnn', '25d55ad283aa400af464c76d713c07ad', 'nmt.0607012318@gmail.com', '0000-00-00', 0, ''),
(68, 'Duong Tung Dnng B', 'fcea920f7412b5da7be0cf42b8c93759', 'quang.lx@ga.comqqqqq', '0000-00-00', 0, ''),
(69, 'Duong Tung Duong c', '25d55ad283aa400af464c76d713c07ad', 'doubleVaaa@gmail.com', '0000-00-00', 0, ''),
(70, 'Ellen Jule', 'e10adc3949ba59abbe56e057f20f883e', 'jule@gmail.com', '2000-12-06', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

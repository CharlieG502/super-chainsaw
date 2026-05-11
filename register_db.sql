-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2026 at 08:20 AM
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
-- Database: `register_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `register_list`
--

CREATE TABLE `register_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_list`
--

INSERT INTO `register_list` (`id`, `fullname`, `username`, `email`, `password`) VALUES
(13, 'Charlie Sinting', 'Sabong', 'Tae@gmail.com', '$2y$10$87LTQ7zwjfe1yE4GwbkTK.3Rn4uxB3r0KvyM6sK2lKUw34SqW0wd.'),
(14, 'Marinel', 'nel26', 'msinting@gmail.com', '$2y$10$P8d1QW2PqomzmF6VHVGpbet/T9Df.qJEwMseVo6HysFTwWab.EREm'),
(15, 'Arjay', 'rj08', 'arjaysinting@gmail.com', '$2y$10$VVYRGOxf269g9eYLd3pHWeEnbEOB3Nq6hZl7yyk.a.6kD4bqeisX.'),
(17, 'Charlie Sinting', 'Sabong', 'Charlie9@gmail.com', '$2y$10$aePuFXDaQbwuocAbwKrIqukEVIqbLrs4nw0typFhxoQMCUyyQFJ8S'),
(18, 'Justine Gyle', '123', 'gylejustine2@gmail.com', '$2y$10$8zv64wkdkLrxfjI1z.wby.cmFEfwp3xfH7ZRvH9W.wTNduclgEBDa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register_list`
--
ALTER TABLE `register_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register_list`
--
ALTER TABLE `register_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

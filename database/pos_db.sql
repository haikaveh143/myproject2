-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2026 at 05:10 PM
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
-- Database: `pos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES
(1, 'Luke Pearce', 'luke.pearce@email.com', '09999999999', '2026-09-30 04:13:32'),
(2, 'Marius Von Hagen', 'marius.vonhagen@email.com', '09999999999', '2026-09-30 04:13:32'),
(3, 'Artem Wing', 'artem.wing@email.com', '09999999999', '2026-09-30 04:13:32'),
(4, 'Vyn Richter', 'vyn.richter@email.com', '09999999999', '2026-09-30 04:13:32'),
(5, 'Kagura Blossom', 'kagura.blossom@email.com', '09999999999', '2026-09-30 04:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `avatar`, `created_at`) VALUES
(1, 'admin', '$2y$10$yYKdwCRlIX4FtxYwkWLNeecg8uO8XJcjWVH9a2HoRinNWZ2q8i7SS', 'Administrator', NULL, '2026-09-30 04:13:32'),
(2, 'lpearce', '$2y$10$1xawbE2GOjcI6L9Eb9i9M.wYwqWm.1nWVhs6IlFL4FLud8C.7dNAK', 'Luke Pearce', NULL, '2026-09-30 04:13:32'),
(3, 'mvonhagen', '$2y$10$1xawbE2GOjcI6L9Eb9i9M.wYwqWm.1nWVhs6IlFL4FLud8C.7dNAK', 'Marius Von Hagen', NULL, '2026-09-30 04:13:32'),
(4, 'vrichter', '$2y$10$1xawbE2GOjcI6L9Eb9i9M.wYwqWm.1nWVhs6IlFL4FLud8C.7dNAK', 'Vyn Richter', NULL, '2026-09-30 04:13:32'),
(5, 'kblossom', '$2y$10$1xawbE2GOjcI6L9Eb9i9M.wYwqWm.1nWVhs6IlFL4FLud8C.7dNAK', 'Kagura Blossom', NULL, '2026-09-30 04:13:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

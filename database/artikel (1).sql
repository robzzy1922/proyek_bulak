-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2024 at 01:00 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int NOT NULL,
  `admin_id` int DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `admin_id`, `judul`, `konten`, `image`, `created_at`, `updated_at`) VALUES
(5, 1, 'Masyarakat mlbb pindah ke Honor Of Kings!', 'Masyarakat mlbb berbondong bondong pindah ke moba lain yaitu honor of king dan menjadi dark sistem baru di game tersebut, sehingga banyak orang yang mengeluhkan tentang dark sistem ini.', 'HOK-2.jpg', '2024-07-18 04:20:07', '2024-07-18 04:20:07'),
(6, 1, 'jkbjkbdjkabjkbasjksbaj', 'asbdbjkasbkjabdjkasbdbaskdbwqdjqbwjdbqbwdjkbkqbwdkbkqwbkbqjkdbjqdbjkqbbjkbkbqjkbdjkbqjkdbqwbjqdbjqkwdbkbjkqdbqbdjkbjdkqwjkbdjkbdjdjbjdwbjkdqbdjbdjkqb', 'HOK-2.jpg', '2024-07-18 04:29:30', '2024-07-18 04:29:30'),
(7, NULL, 'akndadlk', 'nskln', 'codeimage-snippet_19.png', '2024-07-18 04:39:00', '2024-07-18 04:40:09'),
(8, NULL, 'ndkasndklndksland', 'nadklandklasdad', 'ProfSiakad.jpg', '2024-07-18 04:41:00', '2024-07-18 04:41:18'),
(10, NULL, 'wojdwodj', 'imiomdiom', 'icons8-write-90.png', '2024-07-18 05:00:06', '2024-07-18 05:00:06'),
(11, NULL, 'alkndlkn', 'knkldnklnlk', 'bayar.jpg', '2024-07-18 05:00:50', '2024-07-18 05:00:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

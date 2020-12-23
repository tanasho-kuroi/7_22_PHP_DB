-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 23, 2020 at 10:02 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsacf_d07_22`
--

-- --------------------------------------------------------

--
-- Table structure for table `joblist_table`
--

CREATE TABLE `joblist_table` (
  `id` int(12) NOT NULL,
  `joblist` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resistDate` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `joblist_table`
--

INSERT INTO `joblist_table` (`id`, `joblist`, `skill`, `region`, `resistDate`, `created_at`, `updated_at`) VALUES
(6, 'dada', 'deedefde', 'hokkaido', '2020-12-16', '2020-12-23 20:06:31', '2020-12-23 20:06:31'),
(9, 'ああ', 'aa', 'aaaaa', '2020-12-10', '2020-12-23 20:08:23', '2020-12-23 20:08:23');

-- --------------------------------------------------------

--
-- Table structure for table `todo_table`
--

CREATE TABLE `todo_table` (
  `id` int(12) NOT NULL,
  `todo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todo_table`
--

INSERT INTO `todo_table` (`id`, `todo`, `deadline`, `created_at`, `updated_at`) VALUES
(15, 'PHP課題', '2020-12-03', '2020-12-22 23:41:55', '2020-12-22 23:41:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `joblist_table`
--
ALTER TABLE `joblist_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo_table`
--
ALTER TABLE `todo_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `joblist_table`
--
ALTER TABLE `joblist_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `todo_table`
--
ALTER TABLE `todo_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Túın: MariaDB-10.4
-- Jasaý ýaqyty: 2025-11-18, 19:03
-- Server nusqasy: 10.4.32-MariaDB
-- PHP nusqasy: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Derekqor: `library_books_base`
--

-- --------------------------------------------------------

--
-- Keste úshin keste qurylymy `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Keste úshin derekterdi damptaý `books`
--

INSERT INTO `books` (`id`, `title`, `body`) VALUES
(1, 'Updated title', 'Updated body'),
(2, 'title book 2', 'body book 2'),
(3, 'title book 3', 'body book 3'),
(4, 'title book 4', 'body book 4'),
(5, 'title book 5', 'body book 5'),
(6, 'title book 6', 'body book 6'),
(7, 'title book 7', 'body book 7'),
(8, 'title book 8', 'body book 8'),
(9, 'title book 9', 'body book 9'),
(10, 'title book 10', 'body book 10');

--
-- Damptalǵan kesteler úshin ındekster
--

--
-- Keste úshin ındekster `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Damptalǵan kesteler úshin AUTO_INCREMENT
--

--
-- Keste úshin AUTO_INCREMENT `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

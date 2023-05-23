-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 07:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `relation.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `comment`, `created_at`) VALUES
(1, 2, 1, 'Good day brother', '2023-05-23 14:15:06');

-- --------------------------------------------------------

--
-- Table structure for table `like_unlike`
--

CREATE TABLE `like_unlike` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `like_unlike`
--

INSERT INTO `like_unlike` (`id`, `user_id`, `post_id`, `type`, `created_at`) VALUES
(1, 2, 1, 1, '2023-05-23 14:12:58'),
(2, 4, 2, 1, '2023-05-23 14:22:57'),
(3, 4, 1, 1, '2023-05-23 14:22:59'),
(4, 4, 3, 1, '2023-05-23 14:23:01'),
(5, 1, 4, 1, '2023-05-23 14:31:44'),
(6, 1, 3, 1, '2023-05-23 14:31:45'),
(7, 1, 2, 1, '2023-05-23 14:31:47'),
(8, 1, 1, 0, '2023-05-23 14:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text_des` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `text_des`, `image`, `created_at`) VALUES
(1, 2, '“মনে পরে তোমাকে\nযখন থাকি নীরবে,\nভাবি শুধু তোমাকে..\nসব সময় অনুভবে,\nসপ্নে দেখি তোমাকে..\nচোখের প্রতি পলকে,\nআপন ভাবি তোমাকে..\nআমার প্রতি নিঃস্বাসে ও বিশ্বাসে।”', '1684851175.jpg', '2023-05-23 14:12:55'),
(2, 3, '“যত দূরেই যাইনা কেনো..\nথাকবো তোমার পাশে।\nযেমন করে শিশির ফোঁটা..\nজড়িয়ে থাকে ঘাসে,\nসকল কষ্ট মুছে..\nদেবো মুখের হাসি,\nহৃদয় থেকে বলছি..\nতোমাকেই ভালোবাসি।”', '1684851449.jpg', '2023-05-23 14:17:29'),
(3, 4, '“আমি একটা দিন চাই\r\nআলােয় আলােয় ভরা।\r\nআমি একটা রাত চাই\r\nঅন্ধকার ছাড়া।\r\nআমি একটা ফুল চাই\r\nসুন্দর সুবাস ভরা।\r\nআর একটা ভালাে বন্ধু চাই\r\nসবার চেয়ে সেরা।”', '1684851728.jpg', '2023-05-23 14:22:08'),
(4, 1, '“চোখের আড়াল হতে পারি\r\nমনের আড়াল নয়।\r\nমন যে আমার সব সময়..\r\nতোমার কথা কয়।\r\nমনকে যদি প্রশ্ন করো..\r\nতোমার আপন কে ?\r\nমন বলে, এখন\r\nতোমার লেখা পড়ছে যে ।”', '1684852286.jpeg', '2023-05-23 14:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `profile_image` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `bio` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `profile_image`, `password`, `role_as`, `bio`, `created_at`) VALUES
(1, 'Abu Naiim - Admin', 'abu15-13860@diu.edu.bd', '1679078358.jpeg', '1111', 1, '', '2023-03-17 18:39:18'),
(2, 'Tusar', 'naiimabu25@gmail.com', '1684851278.jpg', '1111', 0, '', '2023-03-17 18:42:11'),
(3, 'Fahmid', 'abunaiim4@gmail.com', '1684851415.jpg', '1111', 0, 'Happy boy', '2023-03-17 19:20:03'),
(4, 'Sumaiya', 'abunaiim23@gmail.com', '1684851653.jpg', '1111', 0, 'kicu boltam na', '2023-03-21 15:46:04'),
(6, 'Naiim', 'dr_absiddique@yahoo.com', '1679498068.jpg', '1111', 0, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', '2023-03-22 10:09:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_unlike`
--
ALTER TABLE `like_unlike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `like_unlike`
--
ALTER TABLE `like_unlike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

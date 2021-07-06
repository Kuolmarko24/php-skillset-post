-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 03:16 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `feat_image` varchar(255) NOT NULL,
  `user_role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `category`, `feat_image`, `user_role`) VALUES
(1, 'Things Fall Apart', 'Things Fall Apart is an African Novel. Authored by Chinua Achebe.', 'Entertainment', '0', 0),
(2, 'Betrayal in The City', '1907 Novel', 'Entertainment', '////assets/featuredimages/IMG_20210120_152120.jpg', 0),
(3, 'SS Football Tournament', 'Venue Nsambya play ground', 'Sports', '////assets/featuredimages/IMG_20210120_151657.jpg', 0),
(4, 'Iphone 12', 'latest iphone in the market', 'Technology', '////assets/featuredimages/IMG_20210328_170541.jpg', 0),
(5, 'Lenovo ThinkPad', 'core i5 5th generation laptop ', 'Entertainment', '////assets/featuredimages/IMG_20210120_141945.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(100) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `profile_image` varchar(200) NOT NULL,
  `user_role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_role`) VALUES
(2, 'Abdul Karim', 'abdukarim@gmail.com', '1cc8c68e2c956d4329ee972d707568d3', 1),
(3, 'Anjelo Garang', 'anjelogarang@gmail.com', 'ecbe563d0669d2b9f8b96cb1541340f3', 1),
(4, 'Albert Cook', 'albertcook@gmail.com', '7aec076da3222a9687950ce83dfbcc2d', 0),
(5, 'Yaml Axcel', 'yaml23@gmail.com', '626d7bb7b720a79910c41cd4895a17e5', 0),
(6, 'Ayuen Deng', 'ayuendeng@gmail.com', '14224a6e7c069de646ca7895a4c6a939', 0),
(7, 'Nyibol Hellen', 'nyibolhellen@gmail.com', '043ed53018533e9c13c4b94d14f5099e', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

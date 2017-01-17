-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 18, 2017 at 12:40 AM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `linkify`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `published` varchar(140) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `uid`, `content`, `post_id`, `published`) VALUES
(13, 6, 'Ola-la', 8, '2017-01-12 15:44:12'),
(14, 6, 'Hm', 8, '2017-01-12 15:44:38'),
(15, 6, 'Opps', 8, '2017-01-12 15:45:58'),
(16, 7, 'Hellje', 8, '2017-01-12 15:46:28'),
(19, 6, '1111111', 9, '2017-01-12 15:56:25'),
(20, 6, 'bla-bla-bla', 21, '2017-01-17 17:20:29'),
(21, 6, 'This is my girl!', 16, '2017-01-17 18:04:43'),
(22, 6, 'My wifee!!!!', 16, '2017-01-17 18:05:06'),
(23, 8, 'It is you who are bla-bla-bla', 20, '2017-01-17 18:23:26'),
(24, 8, 'Best mom in the world!', 16, '2017-01-17 18:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `postid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `uid`, `postid`) VALUES
(31, 6, 16),
(32, 6, 15),
(33, 7, 16),
(34, 6, 17),
(35, 6, 20),
(36, 8, 21),
(37, 8, 16);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `published` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `uid`, `title`, `content`, `link`, `published`) VALUES
(16, 7, 'Olala', 'OLA LA', 'www.olala.com', '2017-01-15 20:21:49'),
(20, 6, 'Somebody', 'SOME BODY!', 'www.somebody.com', '2017-01-17 11:31:27'),
(21, 8, 'Something', 'SOME THING', 'www.something.com', '2017-01-17 13:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `unlikes`
--

CREATE TABLE `unlikes` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `postid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unlikes`
--

INSERT INTO `unlikes` (`id`, `uid`, `postid`) VALUES
(1, 6, 16),
(2, 6, 15),
(3, 7, 16),
(4, 7, 15),
(5, 6, 17),
(6, 6, 20),
(7, 8, 20),
(8, 8, 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `avatar`, `password`) VALUES
(6, 'Homer Simpson', 'homer', 'mrdonut@simpsons.com', '7PQz1HadwuDfpQKjIDzS2G9UEW9JNSOK.jpg', '$2y$10$uhjcZzYfBg47iyYELuHzz.L4jzFHDmZsioDjBCgXq8rGA/Lkj6AtW'),
(7, 'Marge Simpson', 'Marge', 'marge@simpsons.com', 'sFmv9vA0VGMWaZTjkFKdRNIsy5cSp6Mw.png', '$2y$10$tNeEi1K/XxCaJmFqQF85be5Ylu9euruS/UwXtz64cZxq4guJ1cwVW'),
(8, 'Bart Simpson', 'elbarto', 'caramba@simpsons.com', 'Cs6NJtajntTd58UDNKgOS3WvMohyfAbg.jpg', '$2y$10$Hjt2DJ1X6R/d5rQf8OLTxOQuMmI78SFNHEfHtmXSztarRbuTBo8Ky'),
(10, 'aaa', 'aaa', 'aaa@simpsons.com', NULL, '$2y$10$.PDCD6koAFVyOCNJbmt0YewVAOlQ14WDcNdujb2kHKngpMsHG9b9O');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unlikes`
--
ALTER TABLE `unlikes`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `unlikes`
--
ALTER TABLE `unlikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

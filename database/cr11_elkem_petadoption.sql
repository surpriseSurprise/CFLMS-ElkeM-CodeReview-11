-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2020 at 04:35 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_elkem_petadoption`
--
CREATE DATABASE IF NOT EXISTS `cr11_elkem_petadoption` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr11_elkem_petadoption`;

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `an_id` int(11) NOT NULL,
  `type` enum('small','large','senior') DEFAULT NULL,
  `loc` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(55) DEFAULT NULL,
  `descr` varchar(255) DEFAULT NULL,
  `hobbies` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`an_id`, `type`, `loc`, `image`, `name`, `descr`, `hobbies`, `age`) VALUES
(1, 'small', 'Süßenbrunner Str. 101, 1220 Wien', 'https://d17fnq9dkz9hgj.cloudfront.net/breed-uploads/2018/08/abyssinian-detail.jpg?bust=1535664455&width=355', 'Abyssinian', 'An elegant creature', 'Jumping, Singing', 2),
(2, 'small', 'Süßenbrunner Str. 101, 1220 Wien', 'https://d17fnq9dkz9hgj.cloudfront.net/breed-uploads/2018/08/balinese-detail.jpg?bust=1535566910&width=355', 'Balinese', 'A blue-eyed fairy', 'Eating, Exploring', 3),
(3, 'small', 'Süßenbrunner Str. 101, 1220 Wien', 'https://d17fnq9dkz9hgj.cloudfront.net/breed-uploads/2018/08/Burmese-01.jpg?bust=1539031130&width=355', 'Burmese', 'An exotic beauty', 'Watching, Sleeping', 4),
(4, 'small', 'Süßenbrunner Str. 101, 1220 Wien', 'https://d17fnq9dkz9hgj.cloudfront.net/breed-uploads/2018/08/cornish-rex-detail.jpg?bust=1535566983&width=355', 'Cornish Rex', 'A real cutie', 'Grooming, Moaning', 5),
(5, 'large', 'Rauchengern 7, 3021 Pressbaum', 'https://d17fnq9dkz9hgj.cloudfront.net/breed-uploads/2018/08/laperm-detail.jpg?bust=1535567062&width=355', 'LaPerm', 'A playful companion', 'Sleeping, Hunting', 4),
(6, 'large', 'Rauchengern 7, 3021 Pressbaum', 'https://d17fnq9dkz9hgj.cloudfront.net/breed-uploads/2018/08/ragamuffin-detail.jpg?bust=1535567123&width=355', 'Ragamuffin', 'Your big-eyed soulmate', 'Eating, Exploring', 5),
(7, 'large', 'Rauchengern 7, 3021 Pressbaum', 'https://d17fnq9dkz9hgj.cloudfront.net/breed-uploads/2018/08/Siberian-02.jpg?bust=1539031326&width=355', 'Siberian', 'An outdoorsy friend', 'Hunting, Chilling', 6),
(8, 'large', 'Rauchengern 7, 3021 Pressbaum', 'https://d17fnq9dkz9hgj.cloudfront.net/breed-uploads/2018/08/norwegian-forest-cat-detail.jpg?bust=1535567083&width=355', 'Norwegian Forest', 'Wild Northern creature', 'Exploring, Scratching', 7),
(9, 'senior', 'Wolfholzgasse 12, 2345 Brunn', 'https://d17fnq9dkz9hgj.cloudfront.net/breed-uploads/2018/08/oriental-short-hair-detail.jpg?bust=1535567104&width=355', 'Oriental Shorthair', 'Your household goblin', 'Jumping, Singing', 9),
(10, 'senior', 'Wolfholzgasse 12, 2345 Brunn', 'https://d17fnq9dkz9hgj.cloudfront.net/breed-uploads/2018/08/american-shorthair-detail.jpg?bust=1535566898&width=355', 'American  Shorthair', 'A house and farm cat', 'Grooming, Moaning', 10),
(11, 'senior', 'Wolfholzgasse 12, 2345 Brunn', 'https://d17fnq9dkz9hgj.cloudfront.net/breed-uploads/2018/08/bombay-detail.jpg?bust=1535566943&width=355', 'Bombay', 'The nicest black devil', 'Cuddling, Eating', 11),
(12, 'senior', 'Wolfholzgasse 12, 2345 Brunn', 'https://d17fnq9dkz9hgj.cloudfront.net/breed-uploads/2018/08/turkish-angora-detail.jpg?bust=1535567220&width=355', 'Turkish Angora', 'A delicate being', 'Watching, Sleeping', 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `image`, `status`) VALUES
(1, 'User', 'user@cats.at', '9fe0960f2b186c9f288574f6c510841ffd7847998bedd67aac05e0f19657784d', 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909__340.png', 'user'),
(2, 'Admin', 'admin@cats.at', '9599b9e3c0c685f0fff38fe0aead6b4040a56f4484f957e6c219b0764abdf69e', 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909__340.png', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`an_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `an_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

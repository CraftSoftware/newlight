-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2016 at 12:03 
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_system`
--
CREATE DATABASE IF NOT EXISTS `new_system` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `new_system`;

-- --------------------------------------------------------

--
-- Table structure for table `messeges`
--

CREATE TABLE `messeges` (
  `id_message` double NOT NULL,
  `from_` varchar(200) NOT NULL,
  `to_` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messeges`
--

INSERT INTO `messeges` (`id_message`, `from_`, `to_`, `message`, `status`) VALUES
(1, 'lextefasu@gmail.com', 'admin@gmail.com', 'This is a super tool :D', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` double NOT NULL,
  `name` varchar(60) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `position` varchar(80) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `pass`, `img`, `position`, `email`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '', 'Administrador', 'admin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messeges`
--
ALTER TABLE `messeges`
  ADD PRIMARY KEY (`id_message`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`name`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messeges`
--
ALTER TABLE `messeges`
  MODIFY `id_message` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

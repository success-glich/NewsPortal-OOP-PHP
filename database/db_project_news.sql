-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2022 at 06:05 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(7) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rank` int(7) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `modified_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `rank`, `status`, `created_date`, `created_by`, `modified_by`, `modified_date`) VALUES
(1, 'College', 2, 0, '2022-09-04', 'admin', 'admin', '2022-09-04'),
(2, 'politics', 1, 1, '2022-09-04', 'admin', 'admin', '2022-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(7) NOT NULL,
  `category_id` int(7) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `breaking_key` int(7) DEFAULT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `feature_key` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `category_id`, `title`, `short_description`, `description`, `breaking_key`, `feature_image`, `create_date`, `modified_date`, `created_by`, `modified_by`, `feature_key`) VALUES
(1, 1, 'sdfsdf', 'dsfsdfdsf', '<p>sdfsdf</p>\r\n', 1, '6314c84e6820a_licence.jpg', '2022-09-04', NULL, 'admin', NULL, NULL),
(2, 1, 'sdfsdfsdfsdf sffsdfsd', 'dsfsdfdsf', '<p>sdfssdfdsfdsfds sdfsddf</p>\r\n', 1, '6314c84e6820a_licence.jpg', '2022-09-04', NULL, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `STATUS` tinyint(1) DEFAULT NULL,
  `role` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `email`, `PASSWORD`, `last_login`, `STATUS`, `role`) VALUES
(1, 'admin', 'admin@123', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '2022-09-04 14:04:23', 1, 'admin'),
(3, 'admin', 'admin@1233', 'admin@admin.com', 'c4ca4238a0b923820dcc509a6f75849b', '2022-09-04 14:04:23', 1, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

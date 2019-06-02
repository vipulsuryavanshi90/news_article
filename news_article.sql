-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 02, 2019 at 03:32 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_article`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `description`, `content`, `image`, `author`) VALUES
(1, 'test news article', 'description  test news  article \r\ndescription  test news  article', 'content  test news  article\r\ncontent  test news  article\r\ncontent  test news  article\r\ncontent  test news  article\r\ncontent  test news  article', 'nature.jpg', 'Vipul Suryavanshi'),
(2, 'sed tristique pulvinar sem, ac tempus neque maximus id', 'Vivamus congue lacus imperdiet lorem scelerisque, in posuere nulla pharetra. Nulla hendrerit mollis nisi eget pellentesque. Quisque semper', 'leo ut vulputate dignissim, massa orci semper dolor, quis porttitor ligula ante et sapien. Quisque sodales urna vitae ex luctus, et porta nunc sagittis. Praesent facilisis ultrices nulla tincidunt tempus. Nulla rhoncus accumsan vestibulum. Donec eu interdum metus. Mauris quis arcu eleifend, condimentum neque non, tempor nulla. Nullam erat dui, dictum quis turpis in, molestie consectetur quam.', 'download.jpg', 'Vipul Suryavanshi'),
(3, 'Title', 'onsequat magna imperdiet, hendrerit tellus eu, elementum nisl. Curabitur nisl ante, maximus rhoncus eleifend nec, sodales sit amet diam.', 'onsequat magna imperdiet, hendrerit tellus eu, elementum nisl. Curabitur nisl ante, maximus rhoncus eleifend nec, sodales sit amet diam.\r\nonsequat magna imperdiet, hendrerit tellus eu, elementum nisl. Curabitur nisl ante, maximus rhoncus eleifend nec, sodales sit amet diam.', 'nature.jpg', 'steve jobs');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

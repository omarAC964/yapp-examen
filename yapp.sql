-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2017 at 06:09 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `dias_trabajo`
--

CREATE TABLE `dias_trabajo` (
  `id` int(10) UNSIGNED NOT NULL,
  `dia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `restaurants_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dias_trabajo`
--

INSERT INTO `dias_trabajo` (`id`, `dia`, `hora_inicio`, `hora_fin`, `restaurants_id`, `created_at`, `updated_at`) VALUES
(1, 'Lunes', '00:00:00', '00:00:00', 1, '2017-01-09 04:40:33', '2017-01-09 04:40:33'),
(2, 'Martes', '00:00:00', '00:00:00', 1, '2017-01-09 04:40:33', '2017-01-09 04:40:33'),
(3, 'Miercoles', '14:00:00', '11:59:00', 1, '2017-01-09 04:40:33', '2017-01-09 04:40:33'),
(4, 'Jueves', '14:00:00', '11:59:00', 1, '2017-01-09 04:40:33', '2017-01-09 04:40:33'),
(5, 'Viernes', '14:00:00', '11:59:00', 1, '2017-01-09 04:40:33', '2017-01-09 04:40:33'),
(6, 'Sabado', '14:00:00', '11:59:00', 1, '2017-01-09 04:40:33', '2017-01-09 04:40:33'),
(7, 'Domingo', '14:00:00', '11:59:00', 1, '2017-01-09 04:40:33', '2017-01-09 04:40:33'),
(8, 'Lunes', '00:00:00', '00:00:00', 2, '2017-01-09 05:09:25', '2017-01-09 05:09:25'),
(9, 'Martes', '09:00:00', '18:00:00', 2, '2017-01-09 05:09:25', '2017-01-09 05:09:25'),
(10, 'Miercoles', '09:00:00', '18:00:00', 2, '2017-01-09 05:09:25', '2017-01-09 05:09:25'),
(11, 'Jueves', '09:00:00', '18:00:00', 2, '2017-01-09 05:09:26', '2017-01-09 05:09:26'),
(12, 'Viernes', '09:00:00', '18:00:00', 2, '2017-01-09 05:09:26', '2017-01-09 05:09:26'),
(13, 'Sabado', '09:00:00', '18:00:00', 2, '2017-01-09 05:09:26', '2017-01-09 05:09:26'),
(14, 'Domingo', '00:00:00', '00:00:00', 2, '2017-01-09 05:09:26', '2017-01-09 05:09:26'),
(15, 'Lunes', '19:00:00', '06:00:00', 3, '2017-01-09 05:11:42', '2017-01-09 05:11:42'),
(16, 'Martes', '19:00:00', '03:00:00', 3, '2017-01-09 05:11:42', '2017-01-09 05:11:42'),
(17, 'Miercoles', '19:00:00', '03:00:00', 3, '2017-01-09 05:11:42', '2017-01-09 05:11:42'),
(18, 'Jueves', '19:00:00', '03:00:00', 3, '2017-01-09 05:11:42', '2017-01-09 05:11:42'),
(19, 'Viernes', '19:00:00', '03:00:00', 3, '2017-01-09 05:11:42', '2017-01-09 05:11:42'),
(20, 'Sabado', '19:00:00', '03:00:00', 3, '2017-01-09 05:11:42', '2017-01-09 05:11:42'),
(21, 'Domingo', '19:00:00', '03:00:00', 3, '2017-01-09 05:11:42', '2017-01-09 05:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2017_01_07_153301_create_restaurants_table', 1),
('2017_01_07_192945_create_dias_trabajo_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `restautants`
--

CREATE TABLE `restautants` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_restaurante` text COLLATE utf8_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8_unicode_ci NOT NULL,
  `telefono` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `restautants`
--

INSERT INTO `restautants` (`id`, `nombre_restaurante`, `direccion`, `telefono`, `created_at`, `updated_at`) VALUES
(1, 'Mariscos Iván', 'Enrique Segoviano #55 ', '55-55-55-5', '2017-01-09 04:40:33', '2017-01-09 04:40:33'),
(2, 'La Abeja Miope', 'Wenseslao San de La Barquera #13', '11-11-11-1', '2017-01-09 05:09:25', '2017-01-09 05:09:25'),
(3, 'El Zancudo Loco', 'Prolongación Corregidora sur #48', '44-44-44-4', '2017-01-09 05:11:42', '2017-01-09 05:11:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dias_trabajo`
--
ALTER TABLE `dias_trabajo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restautants`
--
ALTER TABLE `restautants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dias_trabajo`
--
ALTER TABLE `dias_trabajo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `restautants`
--
ALTER TABLE `restautants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

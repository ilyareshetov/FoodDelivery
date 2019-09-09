-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2017 at 11:23 PM
-- Server version: 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homemade`
--
CREATE DATABASE IF NOT EXISTS `homemade` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `homemade`;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(40) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `id_user` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `image`, `price`, `description`, `id_user`) VALUES
(1, 'Gyro Wrap', 'images/gyroWrap.png', 20, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis blanditiis voluptas at esse ab quibusdam, facilis, aliquid rerum nulla, repellat suscipit earum distinctio dolorum animi laboriosam, similique molestias alias tempore.', 1),
(2, 'Season Salad', 'images/seasonSalad.png', 30, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis blanditiis voluptas at esse ab quibusdam, facilis, aliquid rerum nulla, repellat suscipit earum distinctio dolorum animi laboriosam, similique molestias alias tempore.', 1),
(3, 'Veggie Pasta', 'images/veggiePasta.png', 15, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis blanditiis voluptas at esse ab quibusdam, facilis, aliquid rerum nulla, repellat suscipit earum distinctio dolorum animi laboriosam, similique molestias alias tempore.', 1),
(4, 'Chicken Saute', 'images/chickenSaute.png', 25, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis blanditiis voluptas at esse ab quibusdam, facilis, aliquid rerum nulla, repellat suscipit earum distinctio dolorum animi laboriosam, similique molestias alias tempore.', 1),
(5, 'Chicken Meatball', 'images/chickenMeatball.png', 28, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis blanditiis voluptas at esse ab quibusdam, facilis, aliquid rerum nulla, repellat suscipit earum distinctio dolorum animi laboriosam, similique molestias alias tempore.', 1),
(6, 'Sausage Pizza', 'images/sausagePizza.png', 40, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis blanditiis voluptas at esse ab quibusdam, facilis, aliquid rerum nulla, repellat suscipit earum distinctio dolorum animi laboriosam, similique molestias alias tempore.', 1),
(7, 'Beef and Salad Tacos', 'images/beefAndSaladTacos.png', 32, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis blanditiis voluptas at esse ab quibusdam, facilis, aliquid rerum nulla, repellat suscipit earum distinctio dolorum animi laboriosam, similique molestias alias tempore.', 1),
(8, 'Strawberry Cheesecake', 'images/strawberryCheesecake.png', 21, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis blanditiis voluptas at esse ab quibusdam, facilis, aliquid rerum nulla, repellat suscipit earum distinctio dolorum animi laboriosam, similique molestias alias tempore.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `price` double NOT NULL,
  `receiptAddress` varchar(40) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE IF NOT EXISTS `order_products` (
  `id` int(10) unsigned NOT NULL,
  `id_order` int(10) unsigned NOT NULL,
  `id_product` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `about` text
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `surname`, `about`) VALUES
(1, 'fbalki@student.alamo.edu', 'Letmein', 'fbalki', 'fbalki', NULL),
(2, 'judy@sabluetoast.com', 'Letmein', 'judy', 'judy', NULL),
(3, 'ccelestino7@student.alamo.edu', 'Letmein', 'ccelestino7', 'ccelestino7', NULL),
(4, 'acisneros69@student.alamo.edu', 'Letmein', 'acisneros69', 'acisneros69', NULL),
(5, 'lgarcia757@student.alamo.edu', 'Letmein', 'lgarcia757', 'lgarcia757', NULL),
(6, 'mgonzales365@student.alamo.edu', 'Letmein', 'mgonzales365', 'mgonzales365', NULL),
(7, 'egonzalez543@student.alamo.edu', 'Letmein', 'egonzalez543', 'egonzalez543', NULL),
(8, 'rmartinez113@student.alamo.edu', 'Letmein', 'rmartinez113', 'rmartinez113', NULL),
(9, 'hngo7@student.alamo.edu', 'Letmein', 'hngo7', 'hngo7', NULL),
(10, 'jstoeltje@student.alamo.edu', 'Letmein', 'jstoeltje', 'jstoeltje', NULL),
(11, 'jtrevinoiii1@student.alamo.edu', 'Letmein', 'jtrevinoiii1', 'jtrevinoiii1', NULL),
(12, 'gtroyer@student.alamo.edu', 'Letmein', 'gtroyer', 'gtroyer', NULL),
(13, 'avalverde21@student.alamo.edu', 'Letmein', 'avalverde21', 'avalverde21', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

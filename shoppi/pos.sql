-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2018 at 07:34 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chocolate`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_code` char(5) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_price` decimal(5,2) NOT NULL,
  `product_stock` int(3) NOT NULL,
  `product_isDelete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `product` (`product_code`, `product_name`, `product_image`, `product_price`, `product_stock`, `product_isDelete`) VALUES
('p1', 'A','image/product1.png', '45.90', 15, 0),
('p2', 'B','image/product2.png', '32.00', 7, 0),
('p3', 'C','image/product3.png', '29.90', 20, 0),
('p4', 'D','image/product4.png', '54.00', 9, 0);

-- --------------------------------------------------------

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `purchase_name` varchar(100) NOT NULL,
  `purchase_quantity` int(3) NOT NULL,
  `purchase_product_price` decimal(5,2) NOT NULL,
  `purchase_product_code` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `purchase` (`purchase_id`, `purchase_name`, `purchase_quantity`, `purchase_product_price`, `purchase_product_code`) VALUES
(1, 'Yap Hui Yen', 10, '45.90', 'C101'),
(2, 'Khoh', 50, '29.90', 'C121');


ALTER TABLE `product`
  ADD PRIMARY KEY (`product_code`);

ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

CREATE TABLE IF NOT EXISTS `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(50) DEFAULT NULL,
 `password` varchar(50) DEFAULT NULL,
 `email` varchar(50) DEFAULT NULL,
 `phone_number` VARCHAR(15)  DEFAULT NULL,
 `gender` VARCHAR(10) DEFAULT NULL,
 `user_isDelete` int(1) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone_number`, `gender`,`user_isDelete`) VALUES
(1, 'Manju Srivatav', '4456464654', 'manju@gmail.com', '4456464654', 'M',0),
(2, 'Kishan', '9871987979', 'kishan@gmail.com', '9871987979', 'M',0),
(3, 'Salvi Chandra', '1398756416', 'salvi@gmail.com', '1398756416', 'M',0),
(4, 'Abir', '4789756456', 'abir@gmail.com', '4789756456', 'M',0 ),
(5, 'Test', '1987894654', 'anuj@gmail.com', '1987894654', 'M',0);


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `product` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_code` char(5) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_price` decimal(5,2) NOT NULL,
  `product_stock` int(3) NOT NULL,
  `product_isDelete` int(1) NOT NULL DEFAULT '0',
   PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `product` (`product_id`,`product_code`, `product_name`, `product_image`, `product_price`, `product_stock`, `product_isDelete`) VALUES
(1,'p1', 'A','product1.png', '99.00', 100, 0),
(2,'p2', 'B','product2.png', '100.00', 100, 0),
(3,'p3', 'C','product3.png', '120.00', 100, 0),
(4,'p4', 'D','product4.png', '99.00', 100, 0),
(5,'p5', 'E','product5.jpg', '100.00', 100, 0),
(6,'p6', 'F','product6.jpg', '110.00', 100, 0),
(7,'p7', 'G','product7.jpg', '120.00', 100, 0),
(8,'p8', 'H','product8.jpg', '99.00', 100, 0);


-- --------------------------------------------------------

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `purchase_name` varchar(100) NOT NULL,
  `cemail` varchar(50) DEFAULT NULL,
  `cid` int(50) DEFAULT NULL,
  `purchase_quantity` int(3) NOT NULL,
  `purchase_product_price` decimal(5,2) NOT NULL,
  `purchase_product_code` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


/*INSERT INTO `purchase` (`purchase_id`, `purchase_name`,`cemail`, `cid`,`purchase_quantity`, `purchase_product_price`, `purchase_product_code`) VALUES
(10, 'Lim Zheng Ming', 'Ming@gmail.com',1, 10, '45.00', 'C101'),
(11, 'Khoh', 'Khoh@gmail.com',2, 50, '30.00', 'C121');*/

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
 `phone_number` varchar(15)  DEFAULT NULL,
 `gender` varchar(10) DEFAULT NULL,
 `user_isDelete` int(1) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `admin` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(50) DEFAULT NULL,
 `password` varchar(50) DEFAULT NULL,
 `email` varchar(50) DEFAULT NULL,
 `phone_number` varchar(15)  DEFAULT NULL,
 `gender` varchar(10) DEFAULT NULL,
 `user_isDelete` int(1) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `phone_number`, `gender`,`user_isDelete`) VALUES
(1, 'admin', '123456789', 'admin@gmail.com', '4456464654', 'M', 0);

/*INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone_number`, `gender`,`user_isDelete`) VALUES
(1, 'Manju Srivatav', '4456464654', 'manju@gmail.com', '4456464654', 'M',0),
(2, 'Kishan', '9871987979', 'kishan@gmail.com', '9871987979', 'M',0),
(3, 'Salvi Chandra', '1398756416', 'salvi@gmail.com', '1398756416', 'M',0),
(4, 'Abir', '4789756456', 'abir@gmail.com', '4789756456', 'M',0 ),
(5, 'Test', '1987894654', 'anuj@gmail.com', '1987894654', 'M',0);*/

CREATE TABLE `orders` (
 `orderid` int(11) NOT NULL AUTO_INCREMENT,
 `fname` varchar(100) NOT NULL,
 `email` varchar(255) NOT NULL,
 `phone` int(15) NULL,
 `address` varchar(100) NOT NULL,
 `cname` varchar(100)  NOT NULL,
 `cnum` int(20) NOT NULL,
 `expt` int(5)  NOT NULL,
 `cvv` int(5) NOT NULL,
 `totalprice` int(100) NOT NULL,
 `orderpurchase_id` char(5) NOT NULL,
 `cid` int(50) DEFAULT NULL,
 PRIMARY KEY (`orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `order_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `orders_id` int(10) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` int(10) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `pass_reset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL, 
   PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;
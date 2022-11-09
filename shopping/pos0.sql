SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

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

CREATE TABLE IF NOT EXISTS `product`(
`id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`product_name` VARCHAR (25) NOT NULL,
`product_price` FLOAT,
`product_image` VARCHAR (100),
`product_stock` int(3) NOT NULL,
`product_isDelete` int(1) NOT NULL DEFAULT '0'
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `product` (`product_name`, `product_price`, `product_image`,`product_stock`,`product_isDelete`)VALUES 
('p1',100,'./upload/product 1.png','5',0),
('p2',200,'./upload/product 2.png','5',0),
('p3',300,'./upload/product 3.png','5',0),
('p4',400,'./upload/product 4.png','5',0);  


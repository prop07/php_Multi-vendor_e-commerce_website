-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2021 at 06:56 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_info`
--

CREATE TABLE `cart_info` (
  `cart_id` int(20) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Quantity` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_info`
--

INSERT INTO `cart_info` (`cart_id`, `Product_id`, `Quantity`, `user_id`, `total`) VALUES
(203, 48, 1, 87, 5000),
(204, 44, 1, 87, 4000),
(205, 52, 1, 88, 2500),
(206, 50, 1, 88, 3000),
(211, 56, 1, 86, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `check_out`
--

CREATE TABLE `check_out` (
  `check_out_id` int(11) NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `check_out`
--

INSERT INTO `check_out` (`check_out_id`, `Customer_id`, `product_id`, `user_id`, `quantity`, `total`, `date`) VALUES
(111, 89, 44, 84, 1, 4000, '2021-12-23 16:44:42'),
(112, 89, 55, 85, 1, 2000, '2021-12-23 16:44:42'),
(113, 89, 52, 84, 1, 2500, '2021-12-23 16:44:43'),
(114, 86, 51, 84, 1, 500, '2021-12-23 17:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `order_confirm`
--

CREATE TABLE `order_confirm` (
  `confirm_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `checkout_id` int(11) NOT NULL,
  `pname` varchar(40) NOT NULL,
  `pprice` int(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_confirm`
--

INSERT INTO `order_confirm` (`confirm_id`, `product_id`, `checkout_id`, `pname`, `pprice`, `quantity`, `total`, `user_id`, `date`) VALUES
(22, 44, 111, 'All Black Grey Air Max', 4000, 1, 4000, 84, '2021-12-23 17:47:21'),
(23, 52, 113, 'Women Printed Rayon Flared Kurta', 2500, 1, 2500, 84, '2021-12-23 17:47:31'),
(24, 51, 114, 'Solid Woolen Winter Cap Cap', 500, 1, 500, 84, '2021-12-23 17:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `product_id` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pprice` text NOT NULL,
  `pquantity` int(30) NOT NULL,
  `ptype` varchar(20) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `pdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `disc` varchar(200) NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`product_id`, `pname`, `pprice`, `pquantity`, `ptype`, `img_url`, `pdate`, `disc`, `vendor_id`) VALUES
(44, 'All Black Grey Air Max', '4000', 9, 'MensWear', 'img-61c47b73970ee7.80090629.png', '2021-12-23 17:47:21', 'Item specifics\r\n\r\nCondition:	\r\nNew with box: A brand-new, unused, and unworn item (including handmade items) in the original ... Read moreabout the condition.\r\n\r\nBrand:	\r\nUnbranded\r\n\r\nColour:	\r\nBlack	', 57),
(45, 'Sleeve Polar Fleece Jacket', '3000', 5, 'MensWear', 'img-61c47eb39b5cd6.10696146.jpeg', '2021-12-23 16:08:18', '100% Polyester.\r\nImported.\r\nbutton closure.\r\nMachine Wash.\r\nThis mid-weight fleece shirt jacket features two welt pockets and two chest flap pockets with button closures.\r\nWith a full button front.', 57),
(46, 'Slim Men Black Jeans', '2000', 20, 'MensWear', 'img-61c48020105eb4.17226941.jpeg', '2021-12-23 13:56:48', 'STRAIGHT FIT. With a straight fit through the hip and thigh, these jeans sit just below the waist with an Extreme Flex waistband for natural comfort.\r\nCLASSIC 5-POCKET STYLING. A classic fit jean desi', 57),
(47, 'Women Black Heels Sandal', '2000', 10, 'WomensWear', 'img-61c482cf9a7e86.05287823.jpeg', '2021-12-23 14:08:51', 'Made in USA and Imported.\r\nLIGHTWEIGHT AND LIFTED: We love the block heel to give us the perfect boost in height and these are wearable all day long. Ultra lightweight design featuring a buckle enclos', 58),
(48, 'Printed Daily Wear Georgette Saree', '5000', 10, 'WomensWear', 'img-61c483e21baeb5.39776582.jpeg', '2021-12-23 14:12:50', 'Khadi Silk.\r\nDry Clean Only.\r\nSaree Fabric : Khadi silk (Art silk) || Saree Blouse Fabric : Khadi silk (Art silk).\r\nSaree Length : 5.5mtr || Saree Blouse Size : 0.8mtr.\r\nSaree Work : Printed (Varli).\r', 58),
(49, 'Solid Men Hooded Neck Yellow T-Shirt', '1000', 10, 'MensWear', 'img-61c484f8e52fc1.99412620.jpeg', '2021-12-23 14:17:28', '100% Cotton.\r\nImported.\r\nMachine Wash.\r\nAthletic fit for comfort.', 58),
(50, 'Self Design Satin Blend Stitched Anarkali Gown', '3000', 10, 'WomensWear', 'img-61c486769c4057.12240447.jpeg', '2021-12-23 14:23:51', '60% Cotton, 35% Polyester, 5% Spandex\r\nEasy and Relaxed fit! Ultra-soft and lightweight fabric fits elegant women for deep sleep & relaxation.\r\nFeaturing casual loungewear design, sexy v neck short sl', 57),
(51, 'Solid Woolen Winter Cap Cap', '500', 18, 'MensWear', 'img-61c48762bf6f65.95100911.jpeg', '2021-12-23 17:47:37', '60% Cotton, 35% Polyester, 5% Spandex\r\nEasy and Relaxed fit! Ultra-soft and lightweight fabric fits elegant  relaxation.', 57),
(52, 'Women Printed Rayon Flared Kurta', '2500', 9, 'WomensWear', 'img-61c48895786b58.09244360.jpeg', '2021-12-23 17:47:30', 'Hand Wash.\r\nFabric:- Crepe.\r\nColor:- Dark Green.\r\nThis is comfortable, soft and highly durable. It is perfect for daily, casual and party wear\r\nWash Care: Hand wash or dry clean. Package contents: 1 K', 57),
(54, 'Jorden 2s classic', '2500', 10, 'MensWear', 'img-61c48b547b9b64.02547933.jpeg', '2021-12-23 14:44:36', 'Rubber sole.Regular fit.OrthoLite sockliner.Basketball-inspired winter boots', 58),
(55, 'Men Dark Blue Sweater', '2000', 10, 'MensWear', 'img-61c48dae34e7f1.78319973.jpeg', '2021-12-23 14:54:38', 'Sweater material.\r\nNote: Because of the different monitors in each computer, the pictures and objects will be slightly different. And please mind that petite people will run a little bit large.', 58),
(56, 'Square Neck Women Blouse', '5000', 10, 'WomensWear', 'img-61c48ef54f41c8.77045875.jpeg', '2021-12-23 15:00:05', '100% Viscose.Imported.Button closure.Machine Wash.This elevated blouse features clean lines and a lightweight fabric ideal for layering.With a rounded shirt-tail hem, back button closure.', 58);

-- --------------------------------------------------------

--
-- Table structure for table `shiping_data`
--

CREATE TABLE `shiping_data` (
  `shipping_id` int(11) NOT NULL,
  `check_out_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `streetadd` varchar(90) NOT NULL,
  `town` varchar(50) NOT NULL,
  `postal` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `add_info` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shiping_data`
--

INSERT INTO `shiping_data` (`shipping_id`, `check_out_id`, `fname`, `lname`, `streetadd`, `town`, `postal`, `phone`, `email`, `add_info`) VALUES
(101, 112, 'ram', 'magar', 'kotwashore 4,ktm', 'kotwashore 4,ktm', 'kotwashore 4,ktm', 2147483647, 'ram@gmail.com', 'please deliver in morning 6-10am.');

-- --------------------------------------------------------

--
-- Table structure for table `user_add`
--

CREATE TABLE `user_add` (
  `user_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `cpassword` text NOT NULL,
  `account_type` varchar(30) NOT NULL,
  `reg_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_add`
--

INSERT INTO `user_add` (`user_id`, `email`, `username`, `password`, `cpassword`, `account_type`, `reg_time`) VALUES
(84, 'rijalmanoj07@gmail.com', 'prop07', 'manoj', 'manoj', 'vendor', '2021-12-23 19:13:26'),
(85, 'vijaya@gmail.com', 'vijaya', 'vijaya', 'vijaya', 'vendor', '2021-12-23 19:45:22'),
(86, 'akril@gmail.com', 'akril', 'akril', 'akril', 'customer', '2021-12-23 20:46:07'),
(87, 'vision@gmail.com', 'vision', 'vision', 'vision', 'customer', '2021-12-23 20:47:54'),
(88, 'shiva@gmail.com', 'shiva', 'shiva', 'shiva', 'customer', '2021-12-23 20:49:07'),
(89, 'ram@gmail.com', 'ram', 'ram', 'ram', 'customer', '2021-12-23 21:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_p`
--

CREATE TABLE `vendor_p` (
  `pid` int(11) NOT NULL,
  `shop_name` varchar(60) NOT NULL,
  `full_name` varchar(60) NOT NULL,
  `img_location` varchar(100) NOT NULL,
  `address` varchar(80) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_p`
--

INSERT INTO `vendor_p` (`pid`, `shop_name`, `full_name`, `img_location`, `address`, `phone`, `user_id`) VALUES
(57, 'prop07 store', 'Manoj Rijal', 'img-61c479e3b73ad3.58830133.jpg', 'Kotweshor ktm', '9867777777', 84),
(58, 'vijaya store', 'vijaya bahadur bohara', 'img-61c4819ee09578.88105838.jpg', 'kirtipur ktm', '9866666666', 85);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_info`
--
ALTER TABLE `cart_info`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk4` (`Product_id`),
  ADD KEY `fk3` (`user_id`);

--
-- Indexes for table `check_out`
--
ALTER TABLE `check_out`
  ADD PRIMARY KEY (`check_out_id`),
  ADD KEY `fk12` (`Customer_id`),
  ADD KEY `fk13` (`user_id`),
  ADD KEY `fk14` (`product_id`);

--
-- Indexes for table `order_confirm`
--
ALTER TABLE `order_confirm`
  ADD PRIMARY KEY (`confirm_id`),
  ADD KEY `fk45` (`checkout_id`),
  ADD KEY `fk46` (`product_id`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk56` (`vendor_id`);

--
-- Indexes for table `shiping_data`
--
ALTER TABLE `shiping_data`
  ADD PRIMARY KEY (`shipping_id`),
  ADD KEY `fk23` (`check_out_id`);

--
-- Indexes for table `user_add`
--
ALTER TABLE `user_add`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendor_p`
--
ALTER TABLE `vendor_p`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `fk1` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_info`
--
ALTER TABLE `cart_info`
  MODIFY `cart_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `check_out`
--
ALTER TABLE `check_out`
  MODIFY `check_out_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `order_confirm`
--
ALTER TABLE `order_confirm`
  MODIFY `confirm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `shiping_data`
--
ALTER TABLE `shiping_data`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `user_add`
--
ALTER TABLE `user_add`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `vendor_p`
--
ALTER TABLE `vendor_p`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_info`
--
ALTER TABLE `cart_info`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`user_id`) REFERENCES `user_add` (`user_id`),
  ADD CONSTRAINT `fk4` FOREIGN KEY (`Product_id`) REFERENCES `product_info` (`product_id`);

--
-- Constraints for table `check_out`
--
ALTER TABLE `check_out`
  ADD CONSTRAINT `fk13` FOREIGN KEY (`user_id`) REFERENCES `user_add` (`user_id`),
  ADD CONSTRAINT `fk14` FOREIGN KEY (`product_id`) REFERENCES `product_info` (`product_id`);

--
-- Constraints for table `order_confirm`
--
ALTER TABLE `order_confirm`
  ADD CONSTRAINT `fk45` FOREIGN KEY (`checkout_id`) REFERENCES `check_out` (`check_out_id`),
  ADD CONSTRAINT `fk46` FOREIGN KEY (`product_id`) REFERENCES `product_info` (`product_id`);

--
-- Constraints for table `product_info`
--
ALTER TABLE `product_info`
  ADD CONSTRAINT `fk56` FOREIGN KEY (`vendor_id`) REFERENCES `vendor_p` (`pid`);

--
-- Constraints for table `shiping_data`
--
ALTER TABLE `shiping_data`
  ADD CONSTRAINT `fk23` FOREIGN KEY (`check_out_id`) REFERENCES `check_out` (`check_out_id`);

--
-- Constraints for table `vendor_p`
--
ALTER TABLE `vendor_p`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`user_id`) REFERENCES `user_add` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

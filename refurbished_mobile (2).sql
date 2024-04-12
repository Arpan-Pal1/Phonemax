-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 05:33 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `refurbished_mobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `last_name`, `email`, `phone`, `password`, `cpassword`) VALUES
(1, 'Admin', 'A', 'admin@admin.com', '8637878108', '$2y$10$VNo0lTmLpVDGPS.2RntDm.hJAfxoNCVHyGs4lxkmm0ipraAjTAn1q', '$2y$10$JLww42OlJv4gXbGW3Skzh.bvvLQhZ8y8nnuosoEpZ7izSXI4W8aoi');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'apple'),
(2, 'nokia'),
(3, 'poco'),
(4, 'realme'),
(5, 'samsung'),
(6, 'vivo'),
(7, 'oppo'),
(8, 'oneplus'),
(9, 'xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product_id`, `ip_address`, `qty`) VALUES
(5, '::1', 1),
(8, '::1', 1),
(1, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `msg`) VALUES
(1, 'Arpan Pal', 'arpanpalme@gmail.com', '0', 'hello'),
(2, 'Arpan Pal', 'arpanpalme@gmail.com', 'Array', 'hello'),
(3, 'Arpan Pal', 'arpanpalme@gmail.com', '8637878108', 'hello'),
(4, 'Arpan Pal', 'arpanpalme@gmail.com', '8637878108', 'hello'),
(5, 'Arpan Pal', 'arpanpalme@gmail.com', '8637878108', 'hello 2'),
(6, 'Arpan ', 'arpanpalme5@gmail.com', '8637878108', 'hiiiiii');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `payment_method` enum('Pay on Delivery','Online Payment') NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('successful','unsuccessful') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `invoice_no`, `payment_method`, `time`, `status`) VALUES
(1, 1, 1, 3, '1924514318', 'Pay on Delivery', '2022-05-10 06:06:53', 'successful'),
(2, 1, 3, 1, '2623878146', 'Pay on Delivery', '2022-05-25 16:22:44', 'successful');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_quality` varchar(255) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `brand_id`, `product_desc`, `product_quality`, `product_qty`, `product_price`, `product_keywords`, `product_image`) VALUES
(1, 'Apple iPhone XS', 1, '12 MP + 12MP Rear Camera ,7  MP Front Camera, Ram & Storage - 4 GB , 64 GB, Screen - 5.8 inches OLED Screen', 'Good', 4, '23999', 'apple', '../uploads/iphone XS.jpg'),
(3, 'POCO F1', 3, '12 MP + 5 MP Rear Camera 20 MP Front Camera, Graphite black, Ram & Storage - 6 GB , 128 GB\r\n	Screen - 6.18 inches IPS LCD Screen', 'Good', 8, '13999', 'poco', '../uploads/poco F1.jpg'),
(4, 'POCO X2', 3, '64MP + 8MP + 2MP + 2MP Rear Camera 20MP + 2MP Front Camera, 8 GB , 256 GB 6.67 inches IPS LCD Screen, Qualcomm Snapdragon 730G Processor', 'superb', 5, '11999', 'poco x2', '../uploads/Poco X2.jpg'),
(5, 'Realme 5 pro', 4, 'Crystal Green  4GB , 64GB, 6.5 inches Full HD+ Display Qualcomm Snapdragon 712Processor, Battery - 4035 mAh, Camera -  48MP + 8MP + 2MP + 2MP Rear Camera 16 MP Front Camera', 'Fair', 7, '6299', 'realme', '../uploads/Reamle 5 pro.png'),
(6, 'Realme 7i ', 4, 'Fusion blue, Ram & Storage -  4GB , 128GB, Screen - 6.5 inches Full HD+ LCD In-cell Display Qualcomm Snapdragon 662 Processor, 5000 mAh, 64MP + 8MP + 2MP + 2MP Rear Camera 16 MP Front Camera', 'Good', 6, '6999', 'realme 7i', '../uploads/Realme 7i.jpg'),
(7, 'Samsung Galaxy A52s 5G', 5, ' Awesome Mint, Ram & Storage -  8GB , 128GB 6.5 inches Full HD+ 120Hz sAMOLED Display, Qualcomm Snapdragon 778G(6nm) Processor, 4500 mAh, 64MP + 12MP + 5MP + 5MP Rear Camera 32 MP Front Camera', 'superb', 3, '21999', 'samsung', '../uploads/Samsung galaxy a52s 5G.jpg'),
(8, 'Samsung Galaxy S20 FE 5G', 5, 'Green 8GB , 128GB 6.5 inches Infinity-O 120Hz Super AMOLED Display Qualcomm Snapdragon 865 Octa-Core processor, 4500 mAh, 12MP + 8MP + 12MP  Rear Camera 32 MP Front Camera', 'Good', 3, '23999', 'samsung', '../uploads/samsung galaxy s20 FE 5G.jpg'),
(9, 'vivo X50 pro ', 6, 'Alpha Grey, 8GB , 256GB, 6.5 inches Full HD+ E3 sAMOLED Display, Qualcomm Snapdragon 765G Processor 4315 mAh, 48MP + 13MP + 8MP + 8MP Rear Camera(Sony IMX598 sensor) 32 MP Front Camera', 'superb', 5, '40999', 'vivo x50', '../uploads/vivo X50 pro.jpg'),
(10, 'vivo Y73', 6, 'Roman Black, Ram & Storage -  8GB , 128GB, 6.44 inches Full HD+ AMOLED Display MediaTek Helio G95 Processor, 4000 mAh, 64MP + 2MP + 2MP Rear Camera 16 MP Front Camera', 'Fair', 12, '12399', 'vivo y73', '../uploads/vivo y73.jpg'),
(11, 'Oppo A96', 7, 'Sunset Blue, 8GB , 128GB, 6.59 inches Full HD+ Display, Qualcomm Snapdragon 680 Processor, 5000 mAh, 50MP + 2MP  Rear Camera 16 MP Front Camera ', 'Fair', 13, '10499', 'oppo', '../uploads/oppo A96.jpg'),
(12, 'Oppo Reno4 pro ', 7, 'Silky White. 8GB , 128GB, 6.5 inches Full HD+ AMOLED Display, Qualcomm Snapdragon 720G Processor, 5000 mAh, 48MP + 8MP + 2MP + 2MP Rear Camera 32 MP Front Camera ', 'Good', 0, '20999', 'oppo', '../uploads/oppo reno4 pro.jpg'),
(13, 'Nokia G20', 2, 'Blue, 4GB , 64GB, 6.5 inches HD+ Display, MediaTek Helio G35 Octa Core Processor 5000 mAh, 48MP + 5MP + 2MP + 2MP   Rear Camera 8 MP Front Camera', 'Fair', 14, '3999', 'nokia', '../uploads/Nokia G20.jpg'),
(14, 'Oneplus Nord 2 5G', 8, 'Gray Sierra,  8GB , 128GB 6.43 inches 90Hz Fluid AMOLED display, MediaTek Dimensity 1200-AI, 4500 mAh, 50 MP + 8 MP + 2 MP   Rear Camera 32 MP Front Camera ', 'superb', 4, '22999', 'oneplus', '../uploads/Oneplus Nord 2 5G.jpg'),
(15, 'Xiaomi 11T Pro 5G Hyperphone', 9, 'Meteorite Black, 8GB , 256GB, 6.67 inches 120Hz True 10-bit AMOLED display, Qualcomm® Snapdragon™ 888 5G, 5000 mAh, 108 MP + 8MP + 5MP  Rear Camera 16 MP Front Camera', 'superb', 12, '31999', 'xiaomi', '../uploads/Xiaomi 11T Pro 5G.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `phone`, `password`, `address`) VALUES
(1, 'Arpan', 'Pal', 'arpanpalme@gmail.com', '8637878108', '$2y$10$u3/X7bgaUV9lKhMGPmFWVui85ejxT6DxlBp2TQUEwqez5ZyD3Crhm', 'BARUIPARA SONAMUKHI BANKURA'),
(2, 'Arpan', 'Pal', 'arpanpalme@gamil.com', '08637878108', '$2y$10$7M7lJEKMDfTObnqMS26rT.GmCKPqGAOS0VhadGMuE1/1gaTVRHfj2', 'BARUIPARA SONAMUKHI BANKURA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

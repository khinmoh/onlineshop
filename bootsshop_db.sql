-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2017 at 07:31 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bootsshop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `trans_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `tans_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `item_amount` decimal(6,2) NOT NULL,
  `amount` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `meta_title` varchar(45) DEFAULT NULL,
  `meta_description` varchar(45) DEFAULT NULL,
  `meta_keywords` varchar(45) DEFAULT NULL,
  `content` text,
  `created_from_ip` varchar(45) DEFAULT NULL,
  `updated_from_ip` varchar(45) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `meta_title`, `meta_description`, `meta_keywords`, `content`, `created_from_ip`, `updated_from_ip`, `date_created`, `date_updated`) VALUES
(1, 'About us', 'Bootsshop is a CodeIgniter powered online sto', 'bootsshop', '<p>Bootsshop about us content goes here</>', '127.0.0.1', '127.0.0.1', '2015-05-18 00:00:00', '2015-05-18 00:00:00'),
(2, 'Delivery', 'Bootsshop can deliver the products that you b', 'bootsshop delivery', '<p>Bootsshop delivery content goes here</>', '127.0.0.1', '127.0.0.1', '2015-05-18 00:00:00', '2015-05-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `total` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `zip` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(245) DEFAULT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `product_model` varchar(45) DEFAULT NULL,
  `product_brand_id` int(11) DEFAULT NULL,
  `tag_line` varchar(245) DEFAULT NULL,
  `features_description` text,
  `product_price` decimal(10,2) DEFAULT '0.00',
  `qty_at_hand` int(11) DEFAULT '0',
  `editorial_reviews` text,
  `created_from_ip` varchar(45) DEFAULT NULL,
  `updated_from_ip` varchar(45) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category_id`, `product_model`, `product_brand_id`, `tag_line`, `features_description`, `product_price`, `qty_at_hand`, `editorial_reviews`, `created_from_ip`, `updated_from_ip`, `date_created`, `date_updated`) VALUES
(1, 'Fujifilm FinePix S2950 Digital Camera', 1, 'FinePix S2950HD', 1, '- (14MP, 18x Optical Zoom) 3-inch LCD', '14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos and 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced resolution. Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Blink detection and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. Weight 0.341kg (excluding battery and memory card). Weight 0.437kg (including battery and memory card). ', '220.00', 0, '<h5>Manufacturer''s Description </h5>', '127.0.0.1', '127.0.0.1', '2015-05-18 00:00:00', '2015-05-18 00:00:00'),
(2, 'Scandisk', 1, 'FinePix S2950HD', 1, '- (14MP, 18x Optical Zoom) 3-inch LCD', '14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos and 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced resolution. Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Blink detection and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. Weight 0.341kg (excluding battery and memory card). Weight 0.437kg (including battery and memory card). ', '220.00', 32, '<h5>Manufacturer''s Description </h5>', '127.0.0.1', '127.0.0.1', '2015-05-18 00:00:00', '2015-05-18 00:00:00'),
(3, 'Mini FinePix S2950 Digital Camera', 1, 'FinePix S2950HD', 1, '- (14MP, 18x Optical Zoom) 3-inch LCD', '14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos and 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced resolution. Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Blink detection and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. Weight 0.341kg (excluding battery and memory card). Weight 0.437kg (including battery and memory card). ', '220.00', 34, '<h5>Manufacturer''s Description </h5>', '127.0.0.1', '127.0.0.1', '2015-05-18 00:00:00', '2015-05-18 00:00:00'),
(4, 'samsaung note 5', 1, NULL, 1, '"Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'All this modern technology just makes people try to do everything at once.', '350.50', 10, NULL, NULL, NULL, '2017-08-25 08:00:00', '2017-08-25 11:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `product_brands`
--

CREATE TABLE `product_brands` (
  `brand_id` int(11) NOT NULL,
  `brand_description` varchar(45) DEFAULT NULL,
  `created_from_ip` varchar(45) DEFAULT NULL,
  `updated_from_ip` varchar(45) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_brands`
--

INSERT INTO `product_brands` (`brand_id`, `brand_description`, `created_from_ip`, `updated_from_ip`, `date_created`, `date_updated`) VALUES
(1, 'Fujifilm', '127.0.0.1', '127.0.0.1', '2015-05-18 00:00:00', '2015-05-18 00:00:00'),
(2, 'Samsung', '127.0.0.1', '127.0.0.1', '2015-05-18 00:00:00', '2015-05-18 00:00:00'),
(3, 'Apple', '127.0.0.1', '127.0.0.1', '2015-05-18 00:00:00', '2015-05-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `category_id` int(11) NOT NULL,
  `category_description` varchar(95) DEFAULT NULL,
  `created_from_ip` varchar(45) DEFAULT NULL,
  `updated_from_ip` varchar(45) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`category_id`, `category_description`, `created_from_ip`, `updated_from_ip`, `date_created`, `date_updated`) VALUES
(1, 'Electronics', '127.0.0.1', '127.0.0.1', '2015-05-18 00:00:00', '2015-05-18 00:00:00'),
(2, 'Clothes', '127.0.0.1', '127.0.0.1', '2015-05-18 00:00:00', '2015-05-18 00:00:00'),
(3, 'Books', '127.0.0.1', '127.0.0.1', '2015-05-18 00:00:00', '2015-05-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_colours`
--

CREATE TABLE `product_colours` (
  `record_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `colour` varchar(75) DEFAULT NULL,
  `created_from_ip` varchar(45) DEFAULT NULL,
  `updated_from_ip` varchar(45) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `image_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `featured` bit(1) DEFAULT b'0',
  `image_path` varchar(245) DEFAULT NULL,
  `created_from_ip` varchar(45) DEFAULT NULL,
  `updated_from_ip` varchar(45) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`image_id`, `product_id`, `featured`, `image_path`, `created_from_ip`, `updated_from_ip`, `date_created`, `date_updated`) VALUES
(1, 1, b'1', 'assets\\frontend\\assets\\products\\large\\9.jpg', '127.0.0.1', '127.0.0.1', '2015-05-18 00:00:00', '2015-05-18 00:00:00'),
(2, 1, b'0', 'assets\\frontend\\assets\\products\\large\\10.jpg', '127.0.0.1', '127.0.0.1', '2015-05-18 00:00:00', '2015-05-18 00:00:00'),
(3, 1, b'0', 'assets\\frontend\\assets\\products\\large\\12.jpg', '127.0.0.1', '127.0.0.1', '2015-05-18 00:00:00', '2015-05-18 00:00:00'),
(4, 2, b'1', 'assets\\frontend\\assets\\products\\6.jpg', '127.0.0.1', '127.0.0.1', '2015-05-18 00:00:00', '2015-05-18 00:00:00'),
(5, 2, b'0', 'assets\\frontend\\assets\\products\\8.jpg', '127.0.0.1', '127.0.0.1', '2015-05-18 00:00:00', '2015-05-18 00:00:00'),
(6, 2, b'0', 'assets\\frontend\\assets\\products\\12.jpg', '127.0.0.1', '127.0.0.1', '2015-05-18 00:00:00', '2015-05-18 00:00:00'),
(7, 3, b'1', 'assets\\frontend\\assets\\products\\1.jpg', '127.0.0.1', '127.0.0.1', '2015-05-18 00:00:00', '2015-05-18 00:00:00'),
(8, 3, b'0', 'assets\\frontend\\assets\\products\\2.jpg', '127.0.0.1', '127.0.0.1', '2015-05-18 00:00:00', '2015-05-18 00:00:00'),
(9, 3, b'0', 'assets\\frontend\\assets\\products\\3.jpg', '127.0.0.1', '127.0.0.1', '2015-05-18 00:00:00', '2015-05-18 00:00:00'),
(10, 4, b'0', 'assets\\frontend\\assets\\products\\note5_1.jpg', '127.0.0.1', '127.0.0.1', '2017-08-25 00:00:00', '2017-08-25 00:00:00'),
(11, 4, b'1', 'assets\\frontend\\assets\\products\\note5_2.jpg', '127.0.0.1', '127.0.0.1', '2017-08-25 00:00:00', '2017-08-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `saved_cart`
--

CREATE TABLE `saved_cart` (
  `id` int(20) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `voucher_code` varchar(20) DEFAULT NULL,
  `total_price` varchar(10) DEFAULT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `item_amount` decimal(6,2) DEFAULT NULL,
  `amount` decimal(6,2) NOT NULL,
  `currency` varchar(11) NOT NULL DEFAULT 'SGD',
  `payment_id` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `date_purchased` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `phone`, `created`, `modified`, `status`) VALUES
(1, 'khin', 'khin@acpcomputer.edu.sg', '7e8d6b2fe3006ed9d6a7e374f1853fb3', 'Male', '', '2017-08-15 09:12:09', '2017-08-15 09:12:09', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_products_product_categories_idx` (`product_category_id`),
  ADD KEY `fk_products_product_brands1_idx` (`product_brand_id`);

--
-- Indexes for table `product_brands`
--
ALTER TABLE `product_brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product_colours`
--
ALTER TABLE `product_colours`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `fk_product_colours_products1_idx` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `fk_product_images_products1_idx` (`product_id`);

--
-- Indexes for table `saved_cart`
--
ALTER TABLE `saved_cart`
  ADD UNIQUE KEY `id_3` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_4` (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product_brands`
--
ALTER TABLE `product_brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_colours`
--
ALTER TABLE `product_colours`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `saved_cart`
--
ALTER TABLE `saved_cart`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_product_brands1` FOREIGN KEY (`product_brand_id`) REFERENCES `product_brands` (`brand_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_product_categories` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_colours`
--
ALTER TABLE `product_colours`
  ADD CONSTRAINT `fk_product_colours_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `fk_product_images_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

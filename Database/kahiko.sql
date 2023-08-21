-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2022 at 09:04 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kahiko`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_apiproductpaths`
--

CREATE TABLE `tbl_apiproductpaths` (
  `apiproductpath_id` int(11) NOT NULL,
  `producttype` enum('userdetails','products','transactions') DEFAULT NULL,
  `path` varchar(100) NOT NULL,
  `added_by` int(11) NOT NULL DEFAULT 33,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_apiproductpaths`
--

INSERT INTO `tbl_apiproductpaths` (`apiproductpath_id`, `producttype`, `path`, `added_by`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'userdetails', 'http://localhost:8080/Api/usersList', 33, '2022-01-24 05:48:21', '2022-01-24 05:48:21', 0),
(2, 'userdetails', 'http://localhost:8080/Api/usersListGender', 33, '2022-01-24 05:48:21', '2022-01-24 05:48:21', 0),
(3, 'userdetails', 'http://localhost:8080/Api/usersListEmail', 33, '2022-01-24 05:48:21', '2022-01-24 05:48:21', 0),
(4, 'userdetails', 'http://localhost:8080/Api/usersListItemBought', 33, '2022-01-24 05:48:21', '2022-01-24 05:48:21', 0),
(5, 'userdetails', 'http://localhost:8080/Api/usersListAge', 33, '2022-01-24 05:48:21', '2022-01-24 05:48:21', 0),
(6, 'products', 'http://localhost:8080/Api/productList', 33, '2022-01-24 05:48:21', '2022-01-24 05:48:21', 0),
(7, 'products', 'http://localhost:8080/Api/productListID', 33, '2022-01-24 05:48:21', '2022-01-24 05:48:21', 0),
(8, 'products', 'http://localhost:8080/Api/ productListCAT', 33, '2022-01-24 05:48:21', '2022-01-24 05:48:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_apiproducts`
--

CREATE TABLE `tbl_apiproducts` (
  `apiproduct_id` int(11) NOT NULL,
  `productname` enum('userdetails','products','transactions') DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_apiproducts`
--

INSERT INTO `tbl_apiproducts` (`apiproduct_id`, `productname`, `added_by`, `created_at`, `updated_on`, `is_deleted`) VALUES
(1, 'userdetails', 31, '2022-01-04 18:44:33', '2022-01-04 18:44:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_apitokens`
--

CREATE TABLE `tbl_apitokens` (
  `apitoken_id` int(11) NOT NULL,
  `api_userid` int(11) NOT NULL,
  `api_productid` int(11) NOT NULL DEFAULT 1,
  `api_token` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `expires_on` datetime DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_apitokens`
--

INSERT INTO `tbl_apitokens` (`apitoken_id`, `api_userid`, `api_productid`, `api_token`, `created_at`, `expires_on`, `is_deleted`) VALUES
(7, 17, 1, 'PcefQ20v5ydqCVoj', '2022-01-25 14:37:50', NULL, NULL),
(8, 18, 1, '0p37PK1s6m4Mf5gI', '2022-01-26 10:31:05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_apiusers`
--

CREATE TABLE `tbl_apiusers` (
  `apiuser_id` int(11) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `user_key` varchar(60) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL DEFAULT 40,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_apiusers`
--

INSERT INTO `tbl_apiusers` (`apiuser_id`, `username`, `user_key`, `created_at`, `updated_on`, `added_by`, `is_deleted`) VALUES
(17, 'IAN', 'ian', '2022-01-25 14:37:43', '2022-01-25 14:37:43', 40, 0),
(18, 'tester', 'test', '2022-01-26 10:30:59', '2022-01-26 10:30:59', 40, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `order_number` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `category_name`, `is_deleted`) VALUES
(1, 'Kids', 0),
(2, 'Men', 0),
(3, 'Women', 0),
(4, 'Unisex', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_amount` double DEFAULT 1,
  `order_status` enum('pending','pending payment','paid') DEFAULT 'paid',
  `created_at` datetime DEFAULT current_timestamp(),
  `payment_type` int(11) NOT NULL DEFAULT 4,
  `updated_at` datetime DEFAULT current_timestamp(),
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paymenttypes`
--

CREATE TABLE `tbl_paymenttypes` (
  `paymenttype_id` int(11) NOT NULL,
  `paymenttype_name` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_paymenttypes`
--

INSERT INTO `tbl_paymenttypes` (`paymenttype_id`, `paymenttype_name`, `description`, `is_deleted`) VALUES
(1, 'Card', 'Payment by Card', 0),
(2, 'Cash', 'Physical Cash, on delivery or in person', 0),
(3, 'Mpesa', 'Payment using the Mobile Money Transfer Platform ', 0),
(4, 'Wallet', 'Payment using the store\'s wallet system', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productimages`
--

CREATE TABLE `tbl_productimages` (
  `productimages_id` int(11) NOT NULL,
  `product_image` varchar(40) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(40) DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `available_quantity` int(11) DEFAULT NULL,
  `gender` text NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_name`, `product_description`, `product_image`, `unit_price`, `available_quantity`, `gender`, `subcategory_id`, `created_at`, `updated_at`, `added_by`, `is_deleted`) VALUES
(34, 'Black Puffer', 'Black Polymer and Cotton Puffer Coat', '/images/Products/black-puffer.webp', 5000, 50, 'female', 3, '2022-01-25 12:57:10', '2022-01-25 12:57:10', 40, 0),
(35, 'Green Puffer', 'Green Puffer Coat ', '/images/Products/green-puffer.webp', 5000, 50, 'female', 3, '2022-01-25 12:59:26', '2022-01-25 12:59:26', 40, 0),
(36, 'Gray Jacket', 'Gray standalone Official Jacket ', '/images/Products/grey-suit-jacket.webp', 3500, 50, 'female', 4, '2022-01-25 12:59:26', '2022-01-25 12:59:26', 40, 0),
(37, 'Jumper Dress', 'Gray Long Jumper that can be used as a dress for the lazy days', '/images/Products/jumper-dress.webp', 2500, 50, 'female', 3, '2022-01-25 13:01:24', '2022-01-25 13:01:24', 40, 0),
(38, 'Long Gathered Dress', 'Long Cream Gathered Dress', '/images/Products/long-gathered.webp', 6000, 10, 'female', 3, '2022-01-25 13:01:24', '2022-01-25 13:01:24', 40, 0),
(39, 'Long Knitted Dress', 'Long Woolen Knitted Dress', '/images/Products/long-knitted.webp', 12500, 10, 'female', 4, '2022-01-25 13:03:35', '2022-01-25 13:03:35', 40, 0),
(40, 'Maxi Dress', 'Maxi Dress for the Cocktail Nights at The Office', '/images/Products/maxi-dress.webp', 6000, 20, 'female', 4, '2022-01-25 13:03:35', '2022-01-25 13:03:35', 40, 0),
(41, 'Plush Felt Coat', 'Wolen Plush Felt Coat', '/images/Products/plush-felt.webp', 8000, 2, 'female', 3, '2022-01-25 13:07:35', '2022-01-25 13:07:35', 40, 0),
(42, 'V-neck Wolen Dress', 'Knitted V-Neck dress. Warm yet Stylish', '/images/Products/vneck-wool.webp', 6500, 2, 'female', 3, '2022-01-25 13:07:35', '2022-01-25 13:07:35', 40, 0),
(43, 'Wrapped Mini-Dress', 'Purple Wrapped Mini Dress', '/images/Products/wrap-mini.webp', 5000, 2, 'female', 3, '2022-01-25 13:08:26', '2022-01-25 13:08:26', 40, 0),
(44, 'Black Jeans', 'Black Cotton Jeans', '/images/Products/black-jeans.webp', 2500, 50, 'male', 2, '2022-01-25 13:41:34', '2022-01-25 13:41:34', 40, 0),
(45, 'Black Raincoat', 'Black Waterproof raincoat', '/images/Products/black-raincoat.webp', 1200, 20, 'male', 2, '2022-01-25 13:41:34', '2022-01-25 13:41:34', 40, 0),
(46, 'Cotton Sweater', '100% Cotton Sweater', '/images/Products/cotton-sweater.webp', 4500, 50, 'male', 2, '2022-01-25 13:41:34', '2022-01-25 13:41:34', 40, 0),
(47, 'Sweat Pants', 'Cotton Sweats', '/images/Products/cotton-sweats.webp', 1200, 20, 'male', 2, '2022-01-25 13:41:34', '2022-01-25 13:41:34', 40, 0),
(48, 'Jeans', 'Blue Wash Jeans', '/images/Products/jeans.webp', 1200, 50, 'male', 2, '2022-01-25 13:41:34', '2022-01-25 13:41:34', 40, 0),
(49, 'Trenchcoat', 'Felt Trench Coat', '/images/Products/trenchcoat.webp', 4500, 40, 'male', 1, '2022-01-25 13:41:34', '2022-01-25 13:41:34', 40, 0),
(50, 'Puffer Jacket', 'Puffer Jacket for Men', '/images/Products/men-puffer.webp', 3500, 20, 'male', 2, '2022-01-25 13:41:34', '2022-01-25 13:41:34', 40, 0),
(51, 'White T-Shirt', 'White Cotton Tshirt', '/images/Products/white-tee.webp', 500, 1000, 'male', 2, '2022-01-25 13:41:34', '2022-01-25 13:41:34', 40, 0),
(52, 'Woolen Sweater', 'Men\'s sweater made of Wool', '/images/Products/wolen-sweater.webp', 4500, 20, 'male', 2, '2022-01-25 13:41:34', '2022-01-25 13:41:34', 40, 0),
(53, 'Black Trouser', 'Black Satin Mens trouser', '/images/Products/black-trouser.webp', 1200, 50, 'male', 2, '2022-01-25 13:43:06', '2022-01-25 13:43:06', 40, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchases`
--

CREATE TABLE `tbl_purchases` (
  `purchase_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_purchases`
--

INSERT INTO `tbl_purchases` (`purchase_id`, `user_id`, `product_name`, `unit_price`, `date_created`) VALUES
(5, 47, 'Gray Jacket', 3500, '2022-01-26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(15) NOT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `role_name`, `is_deleted`) VALUES
(1, 'User', 0),
(3, 'Administrator', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategories`
--

CREATE TABLE `tbl_subcategories` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(25) NOT NULL,
  `category` int(11) NOT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategories`
--

INSERT INTO `tbl_subcategories` (`subcategory_id`, `subcategory_name`, `category`, `is_deleted`) VALUES
(1, 'Official Men', 2, 0),
(2, 'Casual Men', 2, 0),
(3, 'Casual Women', 3, 0),
(4, 'Official Women', 3, 0),
(5, 'Sports', 4, 1),
(6, 'Kids', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userlogins`
--

CREATE TABLE `tbl_userlogins` (
  `userlogin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_ip` varchar(25) DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `role` int(11) NOT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `gender`, `role`, `is_deleted`) VALUES
(40, 'Test', 'Admin', 'test@gmail.com', 'test', 'male', 3, 0),
(47, 'Tester', 'Test', 'tester@gmail.com', 'tester', 'male', 1, 0);

--
-- Triggers `tbl_users`
--
DELIMITER $$
CREATE TRIGGER `Wallet Creation` AFTER INSERT ON `tbl_users` FOR EACH ROW insert into tbl_wallet(user_id)VALUES(new.user_id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallet`
--

CREATE TABLE `tbl_wallet` (
  `wallet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_available` double DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wallet`
--

INSERT INTO `tbl_wallet` (`wallet_id`, `user_id`, `amount_available`, `created_at`, `updated_at`, `is_deleted`) VALUES
(8, 47, 5000, '2022-01-26 10:28:01', '2022-01-26 10:28:01', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_apiproductpaths`
--
ALTER TABLE `tbl_apiproductpaths`
  ADD PRIMARY KEY (`apiproductpath_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `tbl_apiproducts`
--
ALTER TABLE `tbl_apiproducts`
  ADD PRIMARY KEY (`apiproduct_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `tbl_apitokens`
--
ALTER TABLE `tbl_apitokens`
  ADD PRIMARY KEY (`apitoken_id`),
  ADD KEY `api_userid` (`api_userid`),
  ADD KEY `api_productid` (`api_productid`);

--
-- Indexes for table `tbl_apiusers`
--
ALTER TABLE `tbl_apiusers`
  ADD PRIMARY KEY (`apiuser_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`order_number`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `tbl_orders_ibfk_5` (`payment_type`);

--
-- Indexes for table `tbl_paymenttypes`
--
ALTER TABLE `tbl_paymenttypes`
  ADD PRIMARY KEY (`paymenttype_id`);

--
-- Indexes for table `tbl_productimages`
--
ALTER TABLE `tbl_productimages`
  ADD PRIMARY KEY (`productimages_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `subcategory_id` (`subcategory_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `tbl_purchases`
--
ALTER TABLE `tbl_purchases`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_subcategories`
--
ALTER TABLE `tbl_subcategories`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `tbl_userlogins`
--
ALTER TABLE `tbl_userlogins`
  ADD PRIMARY KEY (`userlogin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  ADD PRIMARY KEY (`wallet_id`),
  ADD KEY `customer_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_apiproductpaths`
--
ALTER TABLE `tbl_apiproductpaths`
  MODIFY `apiproductpath_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_apiproducts`
--
ALTER TABLE `tbl_apiproducts`
  MODIFY `apiproduct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_apitokens`
--
ALTER TABLE `tbl_apitokens`
  MODIFY `apitoken_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_apiusers`
--
ALTER TABLE `tbl_apiusers`
  MODIFY `apiuser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `order_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_paymenttypes`
--
ALTER TABLE `tbl_paymenttypes`
  MODIFY `paymenttype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_productimages`
--
ALTER TABLE `tbl_productimages`
  MODIFY `productimages_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_purchases`
--
ALTER TABLE `tbl_purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_subcategories`
--
ALTER TABLE `tbl_subcategories`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_userlogins`
--
ALTER TABLE `tbl_userlogins`
  MODIFY `userlogin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_apiproductpaths`
--
ALTER TABLE `tbl_apiproductpaths`
  ADD CONSTRAINT `tbl_apiproductpaths_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_apiproducts`
--
ALTER TABLE `tbl_apiproducts`
  ADD CONSTRAINT `tbl_apiproducts_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_apitokens`
--
ALTER TABLE `tbl_apitokens`
  ADD CONSTRAINT `tbl_apitokens_ibfk_1` FOREIGN KEY (`api_userid`) REFERENCES `tbl_apiusers` (`apiuser_id`),
  ADD CONSTRAINT `tbl_apitokens_ibfk_2` FOREIGN KEY (`api_productid`) REFERENCES `tbl_apiproducts` (`apiproduct_id`);

--
-- Constraints for table `tbl_apiusers`
--
ALTER TABLE `tbl_apiusers`
  ADD CONSTRAINT `tbl_apiusers_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `tbl_orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `tbl_orders_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `tbl_orders_ibfk_4` FOREIGN KEY (`customer_id`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `tbl_orders_ibfk_5` FOREIGN KEY (`payment_type`) REFERENCES `tbl_paymenttypes` (`paymenttype_id`);

--
-- Constraints for table `tbl_productimages`
--
ALTER TABLE `tbl_productimages`
  ADD CONSTRAINT `tbl_productimages_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`product_id`),
  ADD CONSTRAINT `tbl_productimages_ibfk_2` FOREIGN KEY (`added_by`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`subcategory_id`) REFERENCES `tbl_subcategories` (`subcategory_id`),
  ADD CONSTRAINT `tbl_products_ibfk_2` FOREIGN KEY (`added_by`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_purchases`
--
ALTER TABLE `tbl_purchases`
  ADD CONSTRAINT `tbl_purchases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_subcategories`
--
ALTER TABLE `tbl_subcategories`
  ADD CONSTRAINT `tbl_subcategories_ibfk_1` FOREIGN KEY (`category`) REFERENCES `tbl_categories` (`category_id`);

--
-- Constraints for table `tbl_userlogins`
--
ALTER TABLE `tbl_userlogins`
  ADD CONSTRAINT `tbl_userlogins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `tbl_roles` (`role_id`);

--
-- Constraints for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  ADD CONSTRAINT `tbl_wallet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

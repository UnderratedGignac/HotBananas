-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2025 at 01:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotbananas`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `Account_id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `PostalCode` varchar(20) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `unhashed_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Account_id`, `Username`, `Password`, `Email`, `FullName`, `PhoneNumber`, `Address`, `City`, `State`, `PostalCode`, `Country`, `DateOfBirth`, `DateCreated`, `unhashed_password`) VALUES
(35, 'Underratedgignac', '$2y$10$VpA.4gUll27quTw6PSNrXOaK9QbTarAFby.n1YtTwu1EF9.hkvuqq', 'Eliehaddadh2@gmail.com', 'Elie', '+96171089646', 'Dekwene', 'beirut', 'beirut', '0000', 'Lebanon', '2002-11-21', '2024-11-21 14:50:03', 'Smash'),
(37, 'Smash', '$2y$10$gZkKV3Fh.lsJ4LvHmuBw0OAx/R2H2amWgax.UteRTbHzw7H1bj/Rq', 'eliehasad47@gmail.com', 'Elie siuu', '+96171089646', '0 road street', 'dkwene', 'siu', '0000', 'siu', '2002-11-21', '2024-11-28 17:57:17', 'Smash');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_item_id` int(11) NOT NULL,
  `customer_username` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_item_id`, `customer_username`, `product_id`, `quantity`, `price`) VALUES
(14, 'Underratedgignac', 22, 1, 34.00);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_id` int(11) NOT NULL,
  `Category_name` varchar(50) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_id`, `Category_name`, `Description`) VALUES
(1, 'Hoodie', 'Hoodie'),
(2, 'T-Shirts', 'T-shirt'),
(3, 'Accessories', 'Accessories'),
(4, 'Shoes', 'Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `feedback`, `submitted_at`) VALUES
(1, 'mx z', 'Eliehaddadh2@gmail.com', 'el', '2024-12-28 10:33:41'),
(2, 'mx z', 'Eliehaddadh2@gmail.com', 'el', '2024-12-28 10:33:47'),
(3, 'mx z', 'Eliehaddadh2@gmail.com', 'el', '2024-12-28 10:34:30'),
(4, 'elie', 'siu@gmail.com', 'elie', '2024-12-28 10:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_id` int(11) NOT NULL,
  `Account_id` int(11) DEFAULT NULL,
  `Order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Total` decimal(10,2) NOT NULL,
  `Status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `Order_item_id` int(11) NOT NULL,
  `Order_id` int(11) DEFAULT NULL,
  `Product_id` int(11) DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `Payment_id` int(11) NOT NULL,
  `Account_id` int(11) DEFAULT NULL,
  `Payment_type` varchar(50) NOT NULL,
  `Card_number` varchar(16) DEFAULT NULL,
  `Expiry_date` varchar(5) DEFAULT NULL,
  `Cvv` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`Payment_id`, `Account_id`, `Payment_type`, `Card_number`, `Expiry_date`, `Cvv`) VALUES
(3, 35, 'Credit Card', '2213123', '22/20', '2222');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_id` int(11) NOT NULL,
  `Product_name` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Category_id` int(11) DEFAULT NULL,
  `Image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_id`, `Product_name`, `Description`, `Price`, `Stock`, `Category_id`, `Image_url`) VALUES
(2, 'Bucciarati shoes x converse', 'A Converse design as a jojo character', 75.00, 70, 4, 'Images/bucciarati.jpg'),
(6, 'Stone Ocean Shoes', 'Converse X JOJO Collab', 40.00, 80, 4, 'Images/s-l1200.jpg'),
(7, 'Yoshikage Kira Tie', 'Jojo Tie', 10.00, 50, 3, 'Images/YoshikageKira.jpg'),
(8, 'Rohan Earings', 'JOJO Earings', 10.00, 120, 3, 'Images/Rohan.jpg'),
(9, 'Killer Queen Ring', 'Ring', 5.00, 100, 3, 'Images/KillerQueen.jpg'),
(10, 'SEIKO X JOJO Watch', 'Watch', 65.00, 100, 3, 'Images/JOJOXGUCCI.png'),
(11, 'JOJO Hoodie', 'JOJO X Jesus', 60.00, 30, 1, 'Images/JOJOXJesus.jpg'),
(12, 'JOJO Greek Design T-Shirt', 'T-shirt', 15.00, 100, 2, 'Images/jojoTshirt.jpg'),
(22, 'ddf', 'e', 34.00, 0, 1, 'Images/jojostar-removebg-preview.png'),
(23, 'Made In Heaven Hoodie', 'Hoodie', 69.00, 0, 1, 'Images/madeInHeaven.png');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `Shipping_id` int(11) NOT NULL,
  `Order_id` int(11) DEFAULT NULL,
  `Address` text NOT NULL,
  `City` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `Postal_code` varchar(20) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `Shipping_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Account_id`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `customer_username` (`customer_username`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `Account_id` (`Account_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`Order_item_id`),
  ADD KEY `Order_id` (`Order_id`),
  ADD KEY `Product_id` (`Product_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`Payment_id`),
  ADD KEY `Account_id` (`Account_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`Shipping_id`),
  ADD KEY `Order_id` (`Order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `Account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `Order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `Payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `Shipping_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_username`) REFERENCES `account` (`Username`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`Product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Account_id`) REFERENCES `account` (`Account_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`Order_id`) REFERENCES `orders` (`Order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`Product_id`) REFERENCES `products` (`Product_id`);

--
-- Constraints for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD CONSTRAINT `payment_methods_ibfk_1` FOREIGN KEY (`Account_id`) REFERENCES `account` (`Account_id`);

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `shipping_ibfk_1` FOREIGN KEY (`Order_id`) REFERENCES `orders` (`Order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

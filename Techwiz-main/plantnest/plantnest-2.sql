-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 09:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plantnest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(225) DEFAULT NULL,
  `adminEmail` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `adminImage` varchar(325) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminID`, `adminName`, `adminEmail`, `password`, `adminImage`) VALUES
(1, 'Admin', 'admin@gmail.com', '1234', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(225) DEFAULT NULL,
  `categoryImage` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`, `categoryImage`) VALUES
(1, 'Indoor plants', 'quick-shop-1.png'),
(2, 'Outdoor plants', 'quick-shop-2.png'),
(3, 'Flowering plants', 'quick-shop-4.png'),
(4, 'Non-flowering plants', 'quick-shop-3.png'),
(5, 'Succulents', 'quick-shop-5.png'),
(8, 'Accessories', 'quick-shop-8.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(11) NOT NULL,
  `feedbackUserID` int(11) DEFAULT NULL,
  `feedback` varchar(325) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackID`, `feedbackUserID`, `feedback`) VALUES
(1, 6, 'Satisfied');

-- --------------------------------------------------------

--
-- Table structure for table `final_order`
--

CREATE TABLE `final_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullName` varchar(225) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `city` varchar(225) DEFAULT NULL,
  `userState` varchar(225) DEFAULT NULL,
  `zipCode` int(8) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date_of_order` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `orderStatus` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `billing_address` text NOT NULL,
  `shipping_address` text NOT NULL,
  `payment_method` enum('COD','Card') NOT NULL,
  `card_number` varchar(222) NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `cvv` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final_order`
--

INSERT INTO `final_order` (`order_id`, `user_id`, `fullName`, `phone`, `city`, `userState`, `zipCode`, `qty`, `total_price`, `date_of_order`, `orderStatus`, `billing_address`, `shipping_address`, `payment_method`, `card_number`, `expiry_date`, `cvv`) VALUES
(1, 13, 'Iman', 2147483647, 'PAF base', 'Karachi', 134567, 6, 144, '2023-09-19 16:16:14', 'pending', 'SFC', 'Korangi', 'COD', '', '0000-00-00', ''),
(2, 13, 'Iman', 2147483647, 'PAF base', 'Karachi', 13950, 6, 232, '2023-09-19 18:45:51', 'pending', 'SFC', 'Korangi', 'COD', '', '0000-00-00', ''),
(3, 6, 'User', 2147483647, 'Karachi', 'Karachi', 13950, 2, 64, '2023-09-19 19:12:33', 'pending', 'Shahrah-e-Faisal', 'Aptech SFC', 'COD', '', '0000-00-00', ''),
(7, 14, 'Fiza', 2147483647, 'SFC', 'Karachi', 1356788, 1, 24, '2023-09-20 07:21:08', 'pending', 'SFC', 'Karachi', 'COD', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `productQuantity` varchar(225) DEFAULT NULL,
  `totalAmount` varchar(225) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `userID`, `productID`, `productQuantity`, `totalAmount`, `date`) VALUES
(1, 13, 9, '6', '143.94', '2023-09-19 16:16:14'),
(2, 13, 3, '2', '71.98', '2023-09-19 18:45:51'),
(3, 13, 1, '4', '159.96', '2023-09-19 18:45:51'),
(4, 6, 2, '1', '39.99', '2023-09-19 19:12:33'),
(5, 6, 9, '1', '23.99', '2023-09-19 19:12:33'),
(6, 14, 2, '1', '39.99', '2023-09-20 05:34:59'),
(7, 14, 2, '4', '159.96', '2023-09-20 05:49:30'),
(8, 14, 9, '1', '23.99', '2023-09-20 06:53:00'),
(9, 14, 9, '1', '23.99', '2023-09-20 07:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE `productreviews` (
  `reviewID` int(11) NOT NULL,
  `reviews` varchar(255) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productreviews`
--

INSERT INTO `productreviews` (`reviewID`, `reviews`, `productID`, `userID`, `date`) VALUES
(1, 'loved this product', 2, 6, '2023-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productName` varchar(225) DEFAULT NULL,
  `productDescription` varchar(225) DEFAULT NULL,
  `productPrice` varchar(225) DEFAULT NULL,
  `productImage` varchar(225) DEFAULT NULL,
  `productStock` varchar(255) NOT NULL,
  `categoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `productDescription`, `productPrice`, `productImage`, `productStock`, `categoryID`) VALUES
(1, 'Bambino dwarf', 'Ficus lyrata Bambino has an extremely compact, upright, branching nature; slightly smaller and thicker leaves compared to Ficus lyrata', '39.99', 'product-01.png', '24', 1),
(2, 'Golden pothos', 'Epipremnum aureum commonly called golden pothos or devil\'s ivy, is native to the Solomon Islands.', '39.99', 'product-02.png', '20', 1),
(3, 'Ninja jewel alocasia', 'Alocasia \'Ninja\' is a compact Jewel Alocasia with deep green to black, rounded shield leaves and striking white veining. ', '35.99', 'product-03.png', '36', 1),
(4, 'Croton', 'Croton is a small shrub used as a landscape plant in tropical climates. In its native habitat, croton is a branching, bushy shrub.', '25.99', 'product-04.png', '15', 2),
(5, 'Pentas', 'Colorful pentas, also known as Egyptian starcluster or star flower, are one of the best choices to attract pollinators like butterflies.', '26.99', 'product-05.png', '17', 2),
(6, 'Lantana', 'Lantana is an annual or perennial, small, broadleaf evergreen shrub in the Verbenaceae (verbena) family that has woody stems but a sprawling habit.', '23.99', 'product-06.png', '34', 2),
(7, 'Coleus', 'The coleus is a brightly colored shrub with square stems and leaves ranging from heart-shaped to deeply fringed.', '25.99', 'product-07.png', '24', 2),
(8, 'Bromeliad', 'Bromeliads typically have bright red, orange, purple, or blue flowers, and can grow in a number of different ways.', '34.99', 'product-08.png', '23', 3),
(9, 'Caladium', 'Caladiums are tropical perennials with colorful, heart-shaped leaves native to tropical forests in South and Central America.', '23.99', 'product-09.png', '24', 3),
(10, 'New Guinea Impatiens', 'New Guinea impatiens form compact, succulent subshrubs with branches growing 1 to 2 feet tall by summer\'s end.', '23.99', 'product-10.png', '30', 3),
(11, 'Heliotrope', 'It has fragrant, purple to white, flat-clustered, five-lobed flowers in coiled sprays.', '25.99', 'product-11.png', '23', 4),
(12, 'Million Bells', 'These are compact, mounded plants which grow 3-9” tall on mostly trailing stems.', '35.99', 'product-17.jpg', '34', 4),
(13, 'Burro’s Tail', 'Also known as the donkey tail plant, this succulent is one of the easiest plants to propagate and care for, which makes it a popular houseplant.', '24.99', 'product-14.jpg', '24', 5),
(14, 'Crown of Thorns', 'The crown of thorns is a great houseplant because it adjusts well to dry indoor environments and room temperatures.', '26.99', 'product-15.jpg', '23', 5),
(15, 'Flaming Katy', 'The flaming katy is a common houseplant that is native to Madagascar. It prefers temperatures from 60 to 85 degrees.', '27.99', 'product-16.jpg', '12', 5),
(16, 'Faithful Springs Watercane', 'It is a portable container, usually with a handle and a funnel, used to water plants by hand.', '26.99', 'accessories-7.jfif', '34', 8),
(17, 'Aqua Dreams watercane', 'It is consists of plastic and metal options, as they are the most durable and withstood our drop tests best.', '25.99', 'accessories-8.jfif', '13', 8),
(18, 'Clear Blue Ocean', 'It can be used for the administration of some pesticides, herbicides.', '34.99', 'accessories-9.jfif', '14', 8),
(19, 'The Boundary Waters', 'It is used to apply liquid fertilizer, wetting of cement blocks with water during construction of farm structures', '26.99', 'accessories-10.jfif', '24', 8),
(20, 'Pura Vida', 'It can be used for the administration of some pesticides, herbicides, fungicides, etc', '34.99', 'accessories-11.png', '15', 8),
(21, 'Sandy soil', 'Sandy Soil is light, warm, dry and tends to be acidic and low in nutrients.', '24.99', 'accessories-13.jfif', '16', 8),
(22, 'Silt Soil', 'Silty soil is slippery when wet, not grainy or rocky.', '34.99', 'accessories-14.jfif', '14', 8),
(23, 'Clay Soil', 'Clay Soil is a heavy soil type that benefits from high nutrients. Clay soils remain wet and cold in winter and dry out in summer.', '34.99', 'accessories-15.jfif', '15', 8),
(24, 'U-M Plastic Empty', 'Spray Bottle, Leak-Proof Fine Mist Trigger Sprayer, Refillable Spray Container.', '24.99', 'accessories-16.jfif', '15', 8),
(26, 'T4U Glass Plant Mister 200ML', 'Vintage Spray Bottle with Top Pump Fine Mist Flower Garden Sprayer.', '34.99', 'accessories-18.jfif', '15', 8),
(27, 'Imirootree 200m', 'Black Continuous Spray Bottle Fine Mist Sprayer Bottle for Hairstyling, Cleaning.', '23.99', 'accessories-19.jfif', '13', 8),
(28, 'Daylogic Spray Bottles', 'Travel-Sized, Clear, Empty Bottles, For Hair Product & Skincare On-The-Go, Mist ', '23.99', 'accessories-17.jfif', '15', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(225) DEFAULT NULL,
  `lastName` varchar(225) DEFAULT NULL,
  `userEmail` varchar(225) NOT NULL,
  `userPassword` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `userEmail`, `userPassword`) VALUES
(6, 'user', 'user', 'user@gmail.com', '$2y$10$kKffEgWCHe5M9H3H4oWlTOZg2Mu9cjJ7e.Lk50ZxF8pkQJsXmP/Fi'),
(12, 'Talib', 'Baloch', 'talib@gmail.com', '$2y$10$0WYiFviwAiuJsCakzYb01.sZ9A2YZa5rJPqe9d/f1X70gGFxECNBm'),
(13, 'Iman', 'Malik', 'iman@gmail.com', '$2y$10$zJua.Jnem76CQQAXrPN2duiRLsJW11Q1pqFKtoIG1wJboKIF8RPiW'),
(14, 'Fiza', 'Batol', 'fiza@gmail.com', '$2y$10$I6UzrrBlS5boMiN7kLs8zu1T.dOGgWJO8398Tz3.RwdW/8GSPzq6C');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlistID` int(11) NOT NULL,
  `customerID` int(11) DEFAULT NULL,
  `wishlistProductID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlistID`, `customerID`, `wishlistProductID`) VALUES
(30, 6, 1),
(33, 6, 2),
(34, 6, 2),
(35, 6, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `adminEmail` (`adminEmail`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`),
  ADD KEY `feedbackKey` (`feedbackUserID`);

--
-- Indexes for table `final_order`
--
ALTER TABLE `final_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `p_fk` (`productID`),
  ADD KEY `u_fk` (`userID`) USING BTREE;

--
-- Indexes for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `pr_id` (`productID`),
  ADD KEY `user_id` (`userID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `c_fk` (`categoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlistID`),
  ADD KEY `customerIdKey` (`customerID`),
  ADD KEY `productIdKey` (`wishlistProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `final_order`
--
ALTER TABLE `final_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedbackKey` FOREIGN KEY (`feedbackUserID`) REFERENCES `users` (`userID`) ON DELETE SET NULL;

--
-- Constraints for table `final_order`
--
ALTER TABLE `final_order`
  ADD CONSTRAINT `final_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `p_fk` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `u_fk` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD CONSTRAINT `pr_id` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE SET NULL,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `c_fk` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `productIdKey` FOREIGN KEY (`wishlistProductID`) REFERENCES `products` (`productID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2022 at 07:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tnan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `adminUsername` varchar(250) NOT NULL,
  `adminPassword` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminUsername`, `adminPassword`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `p_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `user_id`, `qty`) VALUES
(111, 9, 6, 1),
(112, 12, 6, 1),
(113, 20, 6, 2),
(114, 11, 7, 2),
(115, 13, 7, 1),
(116, 18, 7, 1),
(117, 14, 7, 1),
(350, 9, 19, 1),
(445, 9, 47, 1),
(446, 10, 47, 1),
(450, 10, 50, 2),
(451, 12, 50, 1),
(452, 11, 50, 1),
(453, 9, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_ID` int(11) NOT NULL,
  `categories` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_ID`, `categories`) VALUES
(1, 'Blouse'),
(2, 'Crop Top'),
(3, 'Sweater/Jacket'),
(4, 'Tube top'),
(5, 'Pants/Trousers'),
(6, 'Shorts'),
(7, 'Skirts'),
(8, 'Shirt'),
(9, 'Dress'),
(12, 'Swim Suits');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL,
  `customerImage` varchar(250) NOT NULL,
  `customerName` varchar(250) NOT NULL,
  `customerContact` varchar(250) NOT NULL,
  `customerAddress` varchar(250) NOT NULL,
  `customerEmail` varchar(250) NOT NULL,
  `customerUsername` varchar(250) NOT NULL,
  `customerPassword` varchar(250) NOT NULL,
  `customerStatus` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `customerImage`, `customerName`, `customerContact`, `customerAddress`, `customerEmail`, `customerUsername`, `customerPassword`, `customerStatus`) VALUES
(40, 'icon1.png', 'Mang Juan', '09398320588', 'Domingo St. Gordon Heights Olongapo City', 'Juan@gmail.com', 'Juan123', '$d41d8cd98f00b204e9800998ecf8427e', 0),
(41, 'default.png', 'Juan Dela Cruz', '09398320588', 'Domingo St. Gordon Heights Olongapo City', 'Cruz@gmail.com', 'Cruz123', '$d41d8cd98f00b204e9800998ecf8427e', 0),
(42, 'icon1.png', 'John Kalang', '09398320588', 'Domingo St. Gordon Heights Olongapo City', 'John @gmail.com', 'John123', 'd41d8cd98f00b204e9800998ecf8427e', 0),
(43, 'default.png', 'jojo rockstar', '09398320588', 'Domingo St. Gordon Heights Olongapo City', 'jojo@gmail.com', 'jojo123', '$d41d8cd98f00b204e9800998ecf8427e', 0),
(44, 'icon1.png', 'Jiean Estudillo', '09398320588', 'Domingo St. Gordon Heights Olongapo City', 'Jiean123@gmail.com', 'Jiean123', '$d41d8cd98f00b204e9800998ecf8427e', 0),
(45, 'default.png', 'Julia', '', '', '', 'Julia123', '8f3af6dd20c51a8aea355f8c97b53415', 1),
(46, 'default.png', 'Julia', '', '', '', 'Julia123', '8f3af6dd20c51a8aea355f8c97b53415', 1),
(47, 'default.png', 'Baron Easter', '', '', '', 'Baron123', '50e4029b7a1fd4028ed87b80eff78130', 1),
(50, 'default.png', 'John Paul Gingpis', '', '', '', 'Jpaul123', 'e8b8b4c961e7f200f4acbc422c6aba0e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodID` int(11) NOT NULL,
  `foodImage` varchar(250) NOT NULL,
  `foodName` varchar(250) NOT NULL,
  `foodCategory` int(20) NOT NULL,
  `foodStock` varchar(250) NOT NULL,
  `foodDescription` varchar(250) NOT NULL,
  `foodPrice` float NOT NULL,
  `foodStatus` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodID`, `foodImage`, `foodName`, `foodCategory`, `foodStock`, `foodDescription`, `foodPrice`, `foodStatus`) VALUES
(9, 'aa.jpg', 'Outfit (22)', 3, '12', '1 BuFashion for Lorem ipsum dolor si', 500, 0),
(10, 'i.jpg', 'Outfit (21)', 1, '1', '2 LitFashion for Lorem ipsum dolor si', 600, 0),
(11, 'c.jpg', 'Outfit (22)', 10, '23', 'PansFashion for Lorem ipsum dolor si', 850, 0),
(12, 'd.jpg', 'Outfit (20)', 9, '8', 'GrahFashion for Lorem ipsum dolor si', 500, 0),
(13, 'e.jpg', 'Outfit (19)', 8, '9', 'SiniFashion for Lorem ipsum dolor si', 700, 0),
(14, 'f.jpg', 'Outfit (18)', 7, '6', 'PinakbeFashion for Lorem ipsum dolor si', 400, 0),
(15, 'g.jpg', 'Outfit (17)', 7, '5', 'TakoFashion for Lorem ipsum dolor si', 500, 0),
(16, 'h.jpg', 'Outfit (16)', 6, '13', 'SizzlFashion for Lorem ipsum dolor si', 300, 0),
(17, 'b.jpg', 'Outfit (15)', 5, '4', 'ChFashion for Lorem ipsum dolor si', 600, 0),
(18, 'j.jpg', 'Outfit (14)', 4, '2', 'HoliFashion for Lorem ipsum dolor si', 500, 0),
(19, 'k.jpg', 'Outfit (13)', 3, '1', 'goFashion for Lorem ipsum dolor si', 600, 0),
(20, 'l.jpg', 'Outfit (12)', 2, '9', 'An iFashion for Lorem ipsum dolor si', 1000, 0),
(21, 'm.jpg', 'Outfit (11)', 1, '5', '1.Fashion for Lorem ipsum dolor si', 500, 0),
(22, 'n.jpg', 'Outfit (11)', 10, '4', 'FiliFashion for Lorem ipsum dolor si', 850, 0),
(23, 'o.jpg', 'Outfit (10)', 9, '4', 'StraFashion for Lorem ipsum dolor si', 500, 0),
(24, 'p.jpg', 'Outfit (09)', 8, '2', 'AdFashion for Lorem ipsum dolor si', 160, 0),
(25, 'q.jpg', 'Outfit (08)', 7, '5', 'GiniFashion for Lorem ipsum dolor si', 600, 0),
(26, 'r.jpg', 'Outfit (07)', 6, '7', 'NilFashion for Lorem ipsum dolor si', 800, 0),
(27, 's.jpg', 'Outfit (06)', 5, '8', 'A salaFashion for Lorem ipsum dolor si', 600, 0),
(28, 't.jpg', 'Outfit (05)', 2, '3', 'KapeFashion for Lorem ipsum dolor si', 450, 0),
(29, 'u.jpg', 'Outfit (04)', 6, '4', 'Fashion for Lorem ipsum dolor si', 700, 0),
(30, 'v.jpg', 'Outfit (03)', 6, '3', 'Fashion for Lorem ipsum dolor si', 800, 0),
(33, 'w.jpg', 'Outfit (02)', 6, '1', 'Fashion for Lorem ipsum dolor si', 1000, 0),
(34, 'x.jpg', 'Outfit (01)', 4, '1', 'Lorem ipsum dolor Fashion for Fashion for ', 500, 0),
(35, 'y.jpg', 'Outfit (23) ', 1, '1', 'Lorem ipsum dolor si si la feisi a feisi  a feisi ', 300, 0),
(36, 'tire.jpg', 'Outfit (243) ', 1, '', 'fashion for leni robredo', 300, 0),
(37, 'tire.jpg', 'Outfit (24) ', 1, '2', 'Tmfksdsd  dps fmosd m df sp ps ', 300, 0),
(38, 'wd-40.png', 'Outfit (25) ', 4, '4', 'ad ad asd as as das da da sda s ad', 300, 0),
(39, 'helmet.jpg', 'Outfit (26) ', 8, '4', 'dasdad asd ads da sda sd a', 300, 0),
(40, 'fttcs.jpg', 'Outfit (27) ', 3, '3', 'try ged asda sd das da sd', 300, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `inbox_id` int(11) NOT NULL,
  `complaintID` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`inbox_id`, `complaintID`, `user_Id`, `message`, `date_time`, `is_deleted`) VALUES
(61, 93, 44, 'Kasi ang sapatos ng pagmamahal ay hinambalos sa pagibig ko sa yo ', '2021-12-17 18:54:40', 1),
(62, 5, 25, 'Hi din', '2021-12-19 06:06:47', 1),
(63, 5, 25, 'Hi din', '2021-12-19 06:06:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `order_id` int(11) NOT NULL,
  `user_id` int(250) NOT NULL,
  `total_amount` float NOT NULL,
  `payment_option` varchar(250) NOT NULL,
  `date_time_bought` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_manager`
--

INSERT INTO `order_manager` (`order_id`, `user_id`, `total_amount`, `payment_option`, `date_time_bought`, `order_status`) VALUES
(73, 39, 340, 'Cash On Delivery', '2021-12-17 18:28:07', '1'),
(74, 40, 570, 'Cash On Delivery', '2021-12-17 17:56:38', 'complete'),
(75, 41, 800, 'Cash On Delivery', '2021-12-17 18:05:36', 'complete'),
(76, 42, 570, 'Cash On Delivery', '2021-12-17 18:24:59', 'complete'),
(77, 43, 680, 'Cash On Delivery', '2021-12-17 18:38:53', 'complete'),
(78, 44, 800, 'Cash On Delivery', '2021-12-17 18:53:39', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `product` varchar(250) NOT NULL,
  `product_price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` float NOT NULL,
  `date_time_bought` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `product`, `product_price`, `quantity`, `total`, `date_time_bought`) VALUES
(52, 'Array', 120, 3, 360, '2021-12-13 08:26:35'),
(53, 'Array', 20, 1, 20, '2021-12-13 08:29:26'),
(54, 'Coke Sakto is one of my favorite soda', 20, 11, 220, '2021-12-13 08:30:40'),
(55, 'Chicken Adobo with rice and ice tea', 120, 1, 120, '2021-12-13 11:52:35'),
(56, 'Pansit Palabok good for 10 person with 1.5 coke ', 850, 1, 850, '2021-12-14 21:17:38'),
(57, 'Sizzling Sisig with rice and ice tea ', 200, 1, 200, '2021-12-14 21:41:13'),
(58, 'Lechon Paksiw with 1 rice and ice tea ', 180, 1, 180, '2021-12-14 21:51:42'),
(62, '1 Bucket of San Mig Apple with 1 order sizzling sisig2 Liters of Royal with cup good for your hang out', 170, 1, 500170, '2021-12-15 05:24:53'),
(63, '1 Bucket of San Mig Apple with 1 order sizzling sisig2 Liters of Royal with cup good for your hang out', 170, 1, 4000170, '2021-12-15 05:40:04'),
(66, '1 Bucket of San Mig Apple with 1 order sizzling sisig2 Liters of Royal with cup good for your hang out', 170, 1, 500170, '2021-12-15 07:11:40'),
(67, '1 Bucket of San Mig Apple with 1 order sizzling sisig', 500, 1, 500, '2021-12-15 08:03:13'),
(68, 'Pansit Palabok good for 10 person with 1.5 coke ', 850, 1, 850, '2021-12-16 15:23:47'),
(69, '2 Liters of Royal with cup good for your hang out', 170, 1, 170, '2021-12-17 14:20:42'),
(70, 'Menudo with 1 rice and ice tea for your cravings ', 160, 3, 480, '2021-12-17 17:04:01'),
(71, 'Sizzling Sisig with rice and ice tea ', 200, 3, 600, '2021-12-17 17:20:55'),
(72, 'Menudo with 1 rice and ice tea for your cravings ', 170, 1, 170, '2021-12-17 17:30:34'),
(73, 'Menudo with 1 rice and ice tea for your cravings ', 170, 2, 340, '2021-12-17 17:46:48'),
(74, 'Kare-Kare with 1 rice and ice tea for your cravings', 190, 3, 570, '2021-12-17 17:54:26'),
(75, 'Sizzling Sisig with rice and ice tea ', 200, 4, 800, '2021-12-17 18:02:34'),
(76, 'Kare-Kare with 1 rice and ice tea for your cravings', 190, 3, 570, '2021-12-17 18:21:51'),
(77, 'Menudo with 1 rice and ice tea for your cravings ', 170, 4, 680, '2021-12-17 18:35:30'),
(78, 'Sizzling Sisig with rice and ice tea ', 200, 4, 800, '2021-12-17 18:50:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodID`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=454;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `inbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

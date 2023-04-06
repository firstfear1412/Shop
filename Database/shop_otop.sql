-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 07:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_otop`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `username`, `password`, `name`, `email`, `address`) VALUES
(1, 'terza', '1234', 'twgsd', 'dsgasg@sgd.com', 'home'),
(2, 'user', 'pass1234', 'testname', 'dsgasg@sgd.com', 'home 2'),
(5, 'sdhdfh', 'sdhsh', 'A B', 'dsgasg@sgd.comasf', 'asasfasfafazzzzzzzzz'),
(6, 'asfasasasf', 'asfasf', 'A Basf', 'dsgasg@sgd.comasf', 'asasfasfafazzzzzzzzz'),
(7, 'sdh', 'sdhdsh', 'se', 'hsdh@seg.com', 'sdhshd'),
(8, 'new1', '123', 'new asf', 'asf@Qdgs.com', 'home asfasf'),
(9, 'admin', '1234', 'Pamornpon Teethong', 'dsgasg@sgd.comasf', 'home admin in backend'),
(10, 'zzz', 'sgds', 'asfasf asf', 'afsasaf@afs.com', 'adasf'),
(11, 'tfjf436', 'asfasf', 'wsehy rdud', 'Fhdjjd@fjfjjf.com', 'asfasf'),
(12, 'asfasf', 'asfasf', 'asfasf', 'asfas@asf.com', 'asfa'),
(13, 'asgag', 'asgsag', 'asg', 'asgags@agag.com', 'sagag'),
(14, 'abc123', '123456', 'pamornpon teethong', 'laasga@sdgsg.com', 'ม.เกษตร ศรีราชา อ่าวอุดม ศรีราชา 10230');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `member_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `total_ship` int(11) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'กำลังจัดเตรียมสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `date`, `member_id`, `name`, `email`, `address`, `total_ship`, `phone`, `status`) VALUES
(127, '2023-03-31 01:44:33', 1, 'twgsd', 'dsgasg@sgd.com', 'home', 2705, '0970849519', 'กำลังจัดเตรียมสินค้า'),
(128, '2023-03-31 02:57:54', 1, 'twgsd', 'dsgasg@sgd.com', 'home', 625, 'asa', 'กำลังจัดเตรียมสินค้า'),
(129, '2023-04-01 14:48:57', 9, 'Pamornpon Teethong', 'dsgasg@sgd.comasf', 'home admin in backend', 1765, '0970849519', 'กำลังจัดเตรียมสินค้า'),
(130, '2023-04-01 14:53:27', 9, 'Pamornpon Teethong', 'dsgasg@sgd.comasf', 'home admin in backend', 425, '', 'กำลังจัดเตรียมสินค้า'),
(131, '2023-04-01 14:54:52', 9, 'Pamornpon Teethong', 'dsgasg@sgd.comasf', 'home admin in backend', 425, '0970849519', 'กำลังจัดเตรียมสินค้า'),
(132, '2023-04-02 01:00:40', 9, 'Pamornpon Teethong', 'dsgasg@sgd.comasf', 'home admin in backend', 1385, '0970849519', 'กำลังจัดเตรียมสินค้า'),
(133, '2023-04-02 01:01:26', 0, 'ter za', 'ssdggs@shs.com', 'บ้าน', 425, '0970849519', 'กำลังจัดเตรียมสินค้า'),
(134, '2023-04-02 01:02:29', 1, 'twgsd', 'dsgasg@sgd.com', 'home', 425, '0940849519', 'สินค้าถูกส่งกลับ'),
(135, '2023-04-02 14:53:38', 9, 'Pamornpon Teethong', 'dsgasg@sgd.comasf', 'home admin in backend', 425, '0970849519', 'กำลังจัดเตรียมสินค้า');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sumPeritem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `prod_id`, `quantity`, `sumPeritem`) VALUES
(127, 2, 4, 1520),
(127, 4, 3, 1140),
(128, 3, 1, 580),
(129, 2, 3, 1140),
(129, 3, 1, 580),
(130, 2, 1, 380),
(132, 2, 2, 760),
(132, 3, 1, 580),
(133, 2, 1, 380),
(134, 2, 1, 380),
(135, 2, 1, 380);

-- --------------------------------------------------------

--
-- Table structure for table `shop_prod`
--

CREATE TABLE `shop_prod` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_detail` text DEFAULT NULL,
  `prod_price` float NOT NULL,
  `prod_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `shop_prod`
--

INSERT INTO `shop_prod` (`prod_id`, `prod_name`, `prod_detail`, `prod_price`, `prod_img`) VALUES
(1, 'กระเป๋าสานจากกก ใบใหญ่', 'กระเป๋าสานจากกก(อ.นาหว้า) มีรูปทรงสวยงาม ใบใหญ่', 1000, '../p_img/1.jpg'),
(2, 'กระเป๋าสาน ใบใหญ่', 'กระเป๋าสานใบใหญ่ลายลูกแก้ว ย้อมสีครามน้ำเงิน', 380, '../p_img/2.jpg'),
(3, 'กระเป๋าสานจากต้นกก ใบใหญ่', 'งานเป็นการสานลายหมี่เส้นกกย้อมสีครามน้ำเงินผสมสีกฏธรรมชาติ', 580, '../p_img/3.jpg'),
(4, 'กระเป๋าสานจากกก ใบใหญ่', 'กระเป๋าจักสานจากต้นกก ใบใหญ่ ลายสีม่วง ขอบโบว์สีน้ำตาล', 380, '../p_img/4.jpg'),
(5, 'กระเป๋าจักสานจากต้นกก ใบเล็ก', 'กระเป๋าจักสานจากต้นกก ใบเล็ก ลายสีเขียว', 200, '../p_img/5.jpg'),
(6, 'กระเป๋าจักสานจากต้นกก ใบเล็ก', 'กระเป๋าจักสานจากต้นกก ใบเล็ก ลายดั้งเดิมสีครีม', 200, '../p_img/6.jpg'),
(7, 'กระเป๋าจักสานจากต้นกก ใบใหญ่', 'กระเป๋าจักสานจากต้นกก ใบใหญ่ ลายสีรุ้ง', 250, '../p_img/7.jpg'),
(8, 'กระเป๋าจักสานจากต้นกก ใบใหญ่', 'กระเป๋าจักสานจากต้นกก ใบใหญ่ ลายสีส้ม', 1280, '../p_img/8.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `shop_prod`
--
ALTER TABLE `shop_prod`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `shop_prod`
--
ALTER TABLE `shop_prod`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

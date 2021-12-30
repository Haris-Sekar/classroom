-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql111.byetcluster.com
-- Generation Time: Dec 14, 2021 at 04:55 AM
-- Server version: 5.7.35-38
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_28492601_avs_enterprises`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `autho` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `autho`) VALUES
(5, 'sekar', '1244', 'admin'),
(7, 'dinesh', '1234', 'worker'),
(8, 'Deva', '1400', 'admin'),
(9, 'Haris', '1400', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_compnay_reg`
--

CREATE TABLE `buyer_compnay_reg` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `gst` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer_compnay_reg`
--

INSERT INTO `buyer_compnay_reg` (`id`, `company_name`, `phone`, `gst`, `address`, `balance`) VALUES
(1, 'EVER FRESH GRAMENTS', 41561, 'sdf1180sdf', 'Thriupur', 49000);

-- --------------------------------------------------------

--
-- Table structure for table `customer_balance_details`
--

CREATE TABLE `customer_balance_details` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `balance` int(11) NOT NULL,
  `gst_number` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_balance_details`
--

INSERT INTO `customer_balance_details` (`id`, `shop_name`, `balance`, `gst_number`) VALUES
(11, 'AVS TEXTILES', 23950, '123ASDF123'),
(12, 'BANU TEX', 5750, 'asdf1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `phone_number` bigint(10) NOT NULL,
  `gst_number` varchar(50) NOT NULL,
  `area_name` varchar(50) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `shop_name`, `phone_number`, `gst_number`, `area_name`, `address`) VALUES
(1, 'AVS TEXTILES', 9080342386, '123ASDF123', 'AMMAPET', '345 A Kandhaswamy pudur,\r\nthathampatti(po),\r\nsalem-636014'),
(2, 'BANU TEX', 9080234578, 'ASDEFW1463', 'KARUMANTHURAI', 'NEAR KARUMANTHURAI BUS STOP, KARUMANTHURAI, SALEM');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `style` varchar(23) DEFAULT NULL,
  `Manufacture` varchar(10) DEFAULT NULL,
  `item_group` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `style`, `Manufacture`, `item_group`) VALUES
(1, 'ARROW WHITE RN', 'EVER FRESH', 'VEST'),
(2, 'ARROW WHITE RNS', 'EVER FRESH', 'VEST'),
(3, 'MATRIX WHITE RN', 'EVER FRESH', 'VEST'),
(4, 'MATRIX WHITE RNS', 'EVER FRESH', 'VEST'),
(5, 'BEAT COLOR RN', 'EVER FRESH', 'VEST'),
(6, 'BEAT COLOR RNS', 'EVER FRESH', 'VEST'),
(7, 'BEAT WHITE RN', 'EVER FRESH', 'VEST'),
(8, 'BEAT WHITE RNS', 'EVER FRESH', 'VEST'),
(10, 'LIVA PLAIN BABY', 'EVER FRESH', 'GYM VEST'),
(11, 'LIVA PLAIN', 'EVER FRESH', 'GYM VEST'),
(12, 'LIVA -DESIGNER', 'EVER FRESH', 'GYM VEST'),
(13, 'BEAT PLAIN', 'EVER FRESH', 'GYM VEST'),
(14, 'BEAT PIPING', 'EVER FRESH', 'GYM VEST'),
(15, 'RTIZ PLAIN & STRIPES ', 'EVER FRESH', 'TRUNKS'),
(16, 'RITZ PLAIN ', 'EVER FRESH', 'TRUNKS'),
(17, 'GRAND LEG FOLDING ', 'EVER FRESH', 'TRUNKS'),
(18, 'DENIM PLAIN ', 'EVER FRESH', 'TRUNKS'),
(19, 'TUNIC  POCKET ', 'EVER FRESH', 'TRUNKS'),
(20, 'AMAZE B.PATTY ', 'EVER FRESH', 'TRUNKS'),
(21, 'BREEZE IE', 'EVER FRESH', 'BRIEF'),
(22, 'BREEZE OE', 'EVER FRESH', 'BRIEF'),
(23, 'ELITE', 'EVER FRESH', 'BRIEF'),
(24, 'ECO', 'EVER FRESH', 'BRIEF'),
(25, 'BUTTERFLY', 'EVER FRESH', 'SLIPS '),
(26, 'NAYAN', 'EVER FRESH', 'SLIPS '),
(27, 'AMALA', 'EVER FRESH', 'SLIPS '),
(28, 'PRINCE SLIP', 'EVER FRESH', 'SLIPS '),
(29, 'RIYA', 'EVER FRESH', 'SLIPS '),
(30, 'NIGHTY SLIP', 'EVER FRESH', 'SLIPS '),
(31, 'JHILMIL', 'EVER FRESH', 'BRASSIERES'),
(32, 'SPORTY', 'EVER FRESH', 'BRASSIERES'),
(33, 'BUTTER CUP', 'EVER FRESH', 'BRASSIERES'),
(34, 'DAISY PLAIN', 'EVER FRESH', 'PANTIES'),
(35, 'DAISY PRINT', 'EVER FRESH', 'PANTIES'),
(36, 'MISSY PLAIN', 'EVER FRESH', 'PANTIES'),
(37, 'MISSY PRINT', 'EVER FRESH', 'PANTIES'),
(38, 'ROSY PRINT IE', 'EVER FRESH', 'PANTIES'),
(39, 'ROSY PRINT OE', 'EVER FRESH', 'PANTIES'),
(40, 'IRIS PLAIN', 'EVER FRESH', 'PANTIES'),
(41, 'IRIS PRINT', 'EVER FRESH', 'PANTIES'),
(42, 'CHILLIN PLAIN', 'EVER FRESH', 'PANTIES'),
(43, 'CHILLIN PRINT', 'EVER FRESH', 'PANTIES'),
(44, 'REEMA', 'EVER FRESH', ' SHORTS'),
(45, 'BOY LEG SHORTS', 'EVER FRESH', 'FANCY   MODELS'),
(46, 'JOY DRAWER PLAIN', 'EVER FRESH', 'KIDS INNER'),
(47, 'JOY DRAWER PRINT', 'EVER FRESH', 'KIDS INNER'),
(48, 'JOY JETTY PLAIN', 'EVER FRESH', 'KIDS INNER'),
(49, 'JOY JETTY PRINT', 'EVER FRESH', 'KIDS INNER'),
(50, 'JOY JETTY FRILL', 'EVER FRESH', 'KIDS INNER'),
(51, 'BABY ELITE', 'EVER FRESH', 'KIDS INNER'),
(52, 'JOY JETTY PLAIN OE', 'EVER FRESH', 'KIDS INNER'),
(53, 'JOY DRAWER PLAIN OE', 'EVER FRESH', 'KIDS INNER'),
(54, 'DORA PRINT', 'EVER FRESH', 'KIDS INNER'),
(55, 'ANKLE PANT', 'EVER FRESH', 'FANCY   MODELS'),
(56, 'FROCK PLAIN', 'EVER FRESH', 'FANCY   MODELS'),
(57, 'FROCK PRINT', 'EVER FRESH', 'FANCY   MODELS'),
(58, 'RNBS', 'EVER FRESH', 'BOYS OUTER'),
(59, 'PHANTOM RNBS', 'EVER FRESH', 'BOYS OUTER'),
(60, 'RNS', 'EVER FRESH', 'BOYS OUTER'),
(61, 'ALPHA', 'EVER FRESH', 'BOYS OUTER'),
(62, 'CHROME', 'EVER FRESH', 'BOYS OUTER'),
(63, 'MARVEL', 'EVER FRESH', 'BOYS OUTER'),
(64, 'STEP UP', 'EVER FRESH', 'BOYS OUTER'),
(65, 'ZOOP', 'EVER FRESH', 'BOYS OUTER'),
(66, 'CHAMP COLLOR', 'EVER FRESH', 'BOYS OUTER'),
(67, 'JACK COLLER', 'EVER FRESH', 'BOYS OUTER'),
(68, 'SUPREME  ', 'EVER FRESH', 'BOYS OUTER'),
(69, 'R.NECK F.S', 'EVER FRESH', 'BOYS OUTER'),
(70, 'V.NECK F.S', 'EVER FRESH', 'BOYS OUTER'),
(71, 'DR.SLEEVE', 'EVER FRESH', 'BOYS OUTER'),
(72, 'SPERTAN', 'EVER FRESH', 'BOYS OUTER'),
(73, 'FASHION STAR', 'EVER FRESH', 'BOYS OUTER'),
(74, 'APEX', 'EVER FRESH', 'BOYS OUTER'),
(75, '333-BERMUDA', 'EVER FRESH', 'BOYS OUTER'),
(76, '444 BURMUDA (10 PC PACK', 'EVER FRESH', 'BOYS OUTER'),
(77, '555-3/4 TH', 'EVER FRESH', 'BOYS OUTER'),
(78, '999-3/4 TH', 'EVER FRESH', 'BOYS OUTER'),
(79, 'BOOM-F.PHANT', 'EVER FRESH', 'BOYS OUTER'),
(80, 'BOOM STAR PANT', 'EVER FRESH', 'BOYS OUTER'),
(81, '101 SET', 'EVER FRESH', 'BOYS OUTER'),
(82, 'CORAL RNS SET', 'EVER FRESH', 'BOYS OUTER'),
(83, 'CASIO RNBS SET', 'EVER FRESH', 'BOYS OUTER'),
(84, 'TROPIC', 'EVER FRESH', 'BOYS OUTER'),
(85, 'TOP', 'EVER FRESH', 'GIRLS OUTER'),
(86, 'RHYTHM', 'EVER FRESH', 'GIRLS OUTER'),
(87, 'KAVI', 'EVER FRESH', 'GIRLS OUTER'),
(88, 'OVIYA', 'EVER FRESH', 'GIRLS OUTER'),
(89, 'BUBBLE', 'EVER FRESH', 'GIRLS OUTER'),
(90, 'ELLORA', 'EVER FRESH', 'GIRLS OUTER'),
(91, 'DREAMY', 'EVER FRESH', 'GIRLS OUTER'),
(92, 'AURA', 'EVER FRESH', 'GIRLS OUTER'),
(93, 'PRINCE', 'EVER FRESH', 'GIRLS OUTER'),
(94, 'PIXIE', 'EVER FRESH', 'GIRLS OUTER'),
(95, 'APOORVA(SHORTS-303)', 'EVER FRESH', 'GIRLS OUTER'),
(96, '3/4 TH-BOTTOM', 'EVER FRESH', 'GIRLS OUTER'),
(97, 'RUBY 3/4TH SET', 'EVER FRESH', 'GIRLS OUTER'),
(98, '3/4 TH-SET', 'EVER FRESH', 'GIRLS OUTER'),
(99, 'FULL PHANT SET', 'EVER FRESH', 'GIRLS OUTER'),
(100, 'LILAC ', 'EVER FRESH', 'LADIES  '),
(101, 'BLUE BELL SET ', 'EVER FRESH', 'LADIES  '),
(102, 'TRACK JOGG-PHANT', 'EVER FRESH', 'MENS  '),
(103, 'TRACK JOGG-SHORTS', 'EVER FRESH', 'MENS  '),
(104, 'MENS PRINTED T-SHIRTS ', 'EVER FRESH', 'MENS  '),
(105, 'MENS PLAIN T-SHIRTS ', 'EVER FRESH', 'MENS  '),
(106, 'MENS-COLLER T-SHIRTS', 'EVER FRESH', 'MENS  '),
(107, 'EPIC MENS RNBS T-SHIRT', 'EVER FRESH', 'MENS  '),
(108, 'CHICKEN', 'SAKTHI', 'FOOD');

-- --------------------------------------------------------

--
-- Table structure for table `price_list`
--

CREATE TABLE `price_list` (
  `id` int(11) NOT NULL,
  `file_name` varchar(25) NOT NULL,
  `pdf_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `price_list`
--

INSERT INTO `price_list` (`id`, `file_name`, `pdf_file`) VALUES
(1, 'Apr-2021', '9969-PRICE LIST APR (1).pdf'),
(3, 'Mar-2021', '3984-UNIT V.pdf'),
(4, 'sale', '5069-index.html'),
(5, 'hi', '3541-hackthon.png'),
(6, 'APR-21', '2480-Price list apr 2021.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_bill`
--

CREATE TABLE `purchase_bill` (
  `bill_no` int(11) NOT NULL,
  `bill_date` date NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `amt_withoutgst` int(11) NOT NULL,
  `net_amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_recipt`
--

CREATE TABLE `purchase_recipt` (
  `recipt_no` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `amt` int(11) NOT NULL,
  `date` date NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_recipt`
--

INSERT INTO `purchase_recipt` (`recipt_no`, `company_name`, `amt`, `date`, `user`) VALUES
(1, 'EVER FRESH GRAMENTS', 50000, '2021-07-22', 'haris'),
(2, 'EVER FRESH GRAMENTS', 1000, '2021-07-22', 'haris');

-- --------------------------------------------------------

--
-- Table structure for table `sales_bill`
--

CREATE TABLE `sales_bill` (
  `bill_no` int(4) NOT NULL,
  `bill_date` date NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `amt_withoutgst` int(11) NOT NULL,
  `net_amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_bill`
--

INSERT INTO `sales_bill` (`bill_no`, `bill_date`, `shop_name`, `amt_withoutgst`, `net_amt`) VALUES
(123, '2021-10-12', 'AVS TEXTILES', 5000, 5250);

-- --------------------------------------------------------

--
-- Table structure for table `sales_bill_without`
--

CREATE TABLE `sales_bill_without` (
  `bill_no` int(4) NOT NULL,
  `bill_date` date NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `net_amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_bill_without`
--

INSERT INTO `sales_bill_without` (`bill_no`, `bill_date`, `shop_name`, `net_amt`) VALUES
(1, '2021-07-19', 'AVS TEXTILES', 500),
(3, '2021-08-14', 'BANU TEX', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `sales_payment_cheque_details`
--

CREATE TABLE `sales_payment_cheque_details` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(25) NOT NULL,
  `chq_date` date NOT NULL,
  `chq_recive_date` date NOT NULL,
  `chq_number` int(11) NOT NULL,
  `chq_bank` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales_recipt`
--

CREATE TABLE `sales_recipt` (
  `recipt_no` int(11) NOT NULL,
  `shop_name` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `amt` int(11) NOT NULL,
  `payment_method` varchar(10) NOT NULL,
  `user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_recipt`
--

INSERT INTO `sales_recipt` (`recipt_no`, `shop_name`, `date`, `amt`, `payment_method`, `user`) VALUES
(4, 'AVS TEXTILES', '2021-07-19', 200, 'cash', 'haris'),
(5, 'AVS TEXTILES', '2021-07-20', 100, 'cash', 'haris'),
(6, 'BANU TEX', '2021-08-14', 5000, 'cash', 'Haris'),
(7, 'AVS TEXTILES', '2021-11-03', 5000, 'cash', 'Haris');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `buyer_compnay_reg`
--
ALTER TABLE `buyer_compnay_reg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_name` (`company_name`);

--
-- Indexes for table `customer_balance_details`
--
ALTER TABLE `customer_balance_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_name` (`shop_name`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shop_name` (`shop_name`),
  ADD UNIQUE KEY `gst_number` (`gst_number`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `style` (`style`);

--
-- Indexes for table `price_list`
--
ALTER TABLE `price_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_bill`
--
ALTER TABLE `purchase_bill`
  ADD PRIMARY KEY (`bill_no`),
  ADD KEY `company_name` (`company_name`);

--
-- Indexes for table `purchase_recipt`
--
ALTER TABLE `purchase_recipt`
  ADD PRIMARY KEY (`recipt_no`);

--
-- Indexes for table `sales_bill`
--
ALTER TABLE `sales_bill`
  ADD PRIMARY KEY (`bill_no`),
  ADD KEY `customer_name` (`shop_name`);

--
-- Indexes for table `sales_bill_without`
--
ALTER TABLE `sales_bill_without`
  ADD PRIMARY KEY (`bill_no`),
  ADD KEY `customer_name` (`shop_name`);

--
-- Indexes for table `sales_payment_cheque_details`
--
ALTER TABLE `sales_payment_cheque_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shop_name` (`shop_name`),
  ADD KEY `shop_name_2` (`shop_name`);

--
-- Indexes for table `sales_recipt`
--
ALTER TABLE `sales_recipt`
  ADD PRIMARY KEY (`recipt_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `buyer_compnay_reg`
--
ALTER TABLE `buyer_compnay_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_balance_details`
--
ALTER TABLE `customer_balance_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `price_list`
--
ALTER TABLE `price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase_recipt`
--
ALTER TABLE `purchase_recipt`
  MODIFY `recipt_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales_payment_cheque_details`
--
ALTER TABLE `sales_payment_cheque_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_recipt`
--
ALTER TABLE `sales_recipt`
  MODIFY `recipt_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

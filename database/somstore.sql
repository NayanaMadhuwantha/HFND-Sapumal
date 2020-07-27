-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2020 at 07:32 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `somstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_ID` int(255) NOT NULL,
  `Category_Name` varchar(123) NOT NULL,
  `Discription` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Name`, `Discription`, `Picture`) VALUES
(42, 'cardiovascular diseases', 'cardiovascular diseases', ''),
(43, 'Cardiovascular disease', 'Cardiovascular disease', ''),
(44, 'Cancer', 'Cancer', ''),
(45, 'Diabetes', 'Diabete', '');

-- --------------------------------------------------------

--
-- Table structure for table `chatting`
--

CREATE TABLE `chatting` (
  `id` int(11) NOT NULL,
  `user` varchar(60) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatting`
--

INSERT INTO `chatting` (`id`, `user`, `message`, `date_time`, `ip_address`) VALUES
(16, 'lihini', 'hi', '2020-04-18 13:02:04', '::1'),
(17, 'chathura', 'hi', '2020-04-18 13:02:18', '::1'),
(18, 'methsarani', 'hi', '2020-04-18 13:02:30', '::1'),
(19, 'ishan', 'hi', '2020-04-18 13:15:22', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `contact` varchar(40) DEFAULT NULL,
  `address` text,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `website` varchar(40) DEFAULT NULL,
  `comments` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(29) NOT NULL,
  `Phone` varchar(29) NOT NULL,
  `Subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `Name`, `Email`, `Phone`, `Subject`) VALUES
(1, 'Sapumal Bandara', 'Anusapumal8@gmail.com', '0766462180', 'Admmin');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cust_Id` int(15) NOT NULL,
  `FullName` varchar(25) NOT NULL DEFAULT '',
  `UserName` varchar(255) NOT NULL DEFAULT '',
  `Phone` varchar(25) NOT NULL DEFAULT '',
  `Email` varchar(55) NOT NULL DEFAULT '',
  `Password` varchar(20) NOT NULL DEFAULT '',
  `Re_Password` varchar(20) NOT NULL DEFAULT '',
  `Country` varchar(25) NOT NULL DEFAULT '',
  `City` varchar(25) NOT NULL DEFAULT '',
  `Adress` varchar(55) NOT NULL DEFAULT '',
  `PostalCode` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cust_Id`, `FullName`, `UserName`, `Phone`, `Email`, `Password`, `Re_Password`, `Country`, `City`, `Adress`, `PostalCode`) VALUES
(32, 'Sapumal Bandara', 'Anuththara Sapumal', '0766462180', 'anusapumal8@gmail.com', 'Sa0766462180', 'Sa0766462180', 'Sri Lanka', 'Uva', 'bandarawela', '909090'),
(34, 'Anuththara Sapumal', 'Sapumal BM', '0766462180', 'sapumal@gmail.com', 'Ta0877665345', 'Ta0877665345', 'Sri Lanka', 'Uva', 'welimada ', '909090');

-- --------------------------------------------------------

--
-- Table structure for table `diabetes`
--

CREATE TABLE `diabetes` (
  `Product_ID` int(255) NOT NULL,
  `ProductName` varchar(77) NOT NULL,
  `Category_ID` int(255) NOT NULL,
  `Model` varchar(77) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Warehouse_ID` int(255) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diabetes`
--

INSERT INTO `diabetes` (`Product_ID`, `ProductName`, `Category_ID`, `Model`, `Type`, `Warehouse_ID`, `Description`, `Price`, `Picture`) VALUES
(2, '\r\nBilberry extract', 1, 'DB', 'type 1 diabetes', 2, 'type 1 diabetes', '1', 'ok.png'),
(3, 'Bitter melon', 1, 'DB', 'type 1 diabetes', 2, 'type 1 diabetes', '1', 'ooooo.png'),
(4, 'Cinnamon', 1, 'DB', 'type 1 diabetes', 2, 'type 1 diabetes', '1', 'cv.png'),
(5, 'Fenugreek', 1, 'DB', 'type 1 diabetes', 2, 'type 1 diabetes', '1', 'mn.png'),
(6, 'Ginger', 1, 'DB', 'type 1 diabetes', 2, 'type 1 diabetes', '1', 'ss.png'),
(7, 'Okra', 42, 'DB', 'type 1 diabetes', 7, 'type 1 diabetes', '22', 'cm.PNG'),
(11, 'Aloe Vera', 42, 'DB', 'type 1 diabetes', 7, 'type 1 diabetes', '22', 'qq.png');

-- --------------------------------------------------------

--
-- Table structure for table `diabetest2`
--

CREATE TABLE `diabetest2` (
  `Product_ID` int(255) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `Category_ID` int(77) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Warehouse_ID` int(255) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diabetest2`
--

INSERT INTO `diabetest2` (`Product_ID`, `ProductName`, `Category_ID`, `Model`, `Type`, `Warehouse_ID`, `Description`, `Price`, `Picture`) VALUES
(6, 'Giger', 42, 'Diabetes', 'Diabetes', 0, '10g per 1$', '1', 'ss.png'),
(8, 'Aloe vera', 42, 'Diabetes', 'Diabetes', 0, '10g per 1$', '1', 'qq.png'),
(9, 'Milk thistle', 42, 'Diabetes', 'Diabetes', 0, '10g per 1$', '1', 'cm.png'),
(10, 'Cinnamon', 42, 'Diabetes', 'Diabetes', 0, '10g per 1$', '1', 'mn.png'),
(11, 'Fenugreek', 42, 'Diabetes', 'Diabetes', 0, '10g per 1$', '1', 'm2.png'),
(13, 'gymnema', 42, 'Diabetes', 'Diabetes', 0, '10g per 1$', '1', 'ly.png');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_ID` int(95) NOT NULL,
  `Employee_Name` varchar(25) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `Employee_Name`, `Username`, `Password`, `Picture`) VALUES
(2, 'Anuththara Sp', 'Anuththara Sapumal', 'Sa0766462180', ''),
(3, 'Anuththara Sapumal', 'Sapumal Bandara', 'Sa0766462180', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Due',
  `date_due` date DEFAULT NULL,
  `client` int(10) UNSIGNED DEFAULT NULL,
  `client_contact` int(10) UNSIGNED DEFAULT NULL,
  `client_address` int(10) UNSIGNED DEFAULT NULL,
  `client_phone` int(10) UNSIGNED DEFAULT NULL,
  `client_email` int(10) UNSIGNED DEFAULT NULL,
  `client_website` int(10) UNSIGNED DEFAULT NULL,
  `client_comments` int(10) UNSIGNED DEFAULT NULL,
  `subtotal` decimal(9,2) DEFAULT NULL,
  `discount` decimal(4,2) DEFAULT '0.00',
  `tax` decimal(9,2) DEFAULT NULL,
  `total` decimal(9,2) DEFAULT '0.00',
  `comments` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice` int(10) UNSIGNED DEFAULT NULL,
  `item` varchar(200) DEFAULT NULL,
  `unit_price` decimal(9,2) DEFAULT '0.00',
  `qty` decimal(9,3) DEFAULT '1.000',
  `tax` decimal(4,2) DEFAULT '0.00',
  `price` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `membership_grouppermissions`
--

CREATE TABLE `membership_grouppermissions` (
  `permissionID` int(10) UNSIGNED NOT NULL,
  `groupID` int(11) DEFAULT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `allowInsert` tinyint(4) DEFAULT NULL,
  `allowView` tinyint(4) NOT NULL DEFAULT '0',
  `allowEdit` tinyint(4) NOT NULL DEFAULT '0',
  `allowDelete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_grouppermissions`
--

INSERT INTO `membership_grouppermissions` (`permissionID`, `groupID`, `tableName`, `allowInsert`, `allowView`, `allowEdit`, `allowDelete`) VALUES
(1, 1, 'clients', 0, 0, 0, 0),
(2, 1, 'invoices', 0, 0, 0, 0),
(3, 1, 'invoice_items', 0, 0, 0, 0),
(4, 2, 'clients', 0, 0, 0, 0),
(5, 2, 'invoices', 0, 0, 0, 0),
(6, 2, 'invoice_items', 0, 0, 0, 0),
(7, 3, 'clients', 1, 3, 3, 3),
(8, 3, 'invoices', 1, 3, 3, 3),
(9, 3, 'invoice_items', 1, 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `membership_groups`
--

CREATE TABLE `membership_groups` (
  `groupID` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `description` text,
  `allowSignup` tinyint(4) DEFAULT NULL,
  `needsApproval` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_groups`
--

INSERT INTO `membership_groups` (`groupID`, `name`, `description`, `allowSignup`, `needsApproval`) VALUES
(1, 'anonymous', 'Anonymous group created automatically on 2014-08-17', 0, 0),
(2, 'anonymous', 'Anonymous group created automatically on 2014-08-17', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `membership_userrecords`
--

CREATE TABLE `membership_userrecords` (
  `recID` bigint(20) UNSIGNED NOT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `pkValue` varchar(255) DEFAULT NULL,
  `memberID` varchar(20) DEFAULT NULL,
  `dateAdded` bigint(20) UNSIGNED DEFAULT NULL,
  `dateUpdated` bigint(20) UNSIGNED DEFAULT NULL,
  `groupID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `membership_users`
--

CREATE TABLE `membership_users` (
  `memberID` varchar(20) NOT NULL,
  `passMD5` varchar(40) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `signupDate` date DEFAULT NULL,
  `groupID` int(10) UNSIGNED DEFAULT NULL,
  `isBanned` tinyint(4) DEFAULT NULL,
  `isApproved` tinyint(4) DEFAULT NULL,
  `custom1` text,
  `custom2` text,
  `custom3` text,
  `custom4` text,
  `comments` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_users`
--

INSERT INTO `membership_users` (`memberID`, `passMD5`, `email`, `signupDate`, `groupID`, `isBanned`, `isApproved`, `custom1`, `custom2`, `custom3`, `custom4`, `comments`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@localhost', '2014-08-17', 3, 0, 1, '', '', '', '', 'Admin member created automatically on 2014-08-17'),
('guest', '', '', '2014-08-17', 1, 0, 1, '', '', '', '', 'Anonymous member created automatically on 2014-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `order_ID` int(255) NOT NULL,
  `Full_Name` varchar(25) NOT NULL,
  `Email` varchar(55) NOT NULL,
  `Postal_Code` varchar(55) NOT NULL,
  `Address` varchar(55) NOT NULL,
  `Country` varchar(55) NOT NULL,
  `City` varchar(55) NOT NULL,
  `Phone` varchar(55) NOT NULL,
  `Warehouse_ID` int(255) NOT NULL,
  `Dilivery_Address` varchar(75) NOT NULL,
  `Total_Amount` varchar(55) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`order_ID`, `Full_Name`, `Email`, `Postal_Code`, `Address`, `Country`, `City`, `Phone`, `Warehouse_ID`, `Dilivery_Address`, `Total_Amount`, `date`) VALUES
(5, 'Anuththara Sapumal', 'sapumalb97@gmail.com', '909090', 'badulla', 'LK', 'Uva', '0766462180', 8, '2020-02-02', '2$', '0000-00-00'),
(6, 'Sapumal BM', 'sapumalb97@gmail.com', '909090', 'welimada ', 'LK', 'Uva', '0766462180', 8, '2020-02-02', '2$', '0000-00-00'),
(7, 'Sapumal BM', 'wathsala@gmail.com', '909090', 'bandarawela', 'LK', 'Uva', '0766462180', 8, '2020-02-02', '2$', '0000-00-00'),
(8, 'Sapumal BM', 'wathsala@gmail.com', '909090', 'bandarawela', 'LK', 'Uva', '0766462180', 8, '2020-02-30', '2$', '0000-00-00'),
(9, 'Sapumal BM', 'wathsala@gmail.com', '909090', 'bandarawela', 'LK', 'Uva', '0766462180', 7, '2020-02-28', '2$', '0000-00-00'),
(10, 'Sapumal BM', 'wathsala@gmail.com', '909090', 'bandarawela', 'LK', 'Uva', '0766462180', 8, '2020-02-27', '2$', '0000-00-00'),
(11, 'sapumal BM', 'wathsala@gmail.com', '909090', 'bandarawela', 'LK', 'Uva', '0766462180', 10, '2020-02-26', '2$', '0000-00-00'),
(12, 'Anuththara Sapumal', 'sapumalb97@gmail.com', '909090', 'welimada', 'LK', 'Uva', '0766462180', 9, '2020-02-25', '2$', '0000-00-00'),
(14, 'Sapumal BM', 'Anusapumal8@gmail.com', '909090', 'bandarawela', 'LK', 'Uva', '0766462180', 7, '2020-02-24', '2$', '0000-00-00'),
(15, 'Sapumal BM', 'sapumalb97@gmail.com', '909090', 'bandarawela', 'LK', 'Uva', '0987654456', 7, '2020-02-23', '2$', '0000-00-00'),
(16, 'Sapumal BM', 'sapumalb97@gmail.com', '909090', 'welimada ', 'LK', 'Uva', '766462180', 8, '2020-02-22', '2$', '0000-00-00'),
(17, 'sapumal BM', 'sapumalb97@gmail.com', '909090', 'welimada', 'LK', 'Uva', '0785290889', 9, '2002-02-20', '2$', '0000-00-00'),
(18, 'Sapumal BM', 'wathsala@gmail.com', '909090', 'bandarawela', 'LK', 'Uva', '0724698767', 8, '2020-02-22', '2$', '0000-00-00'),
(19, 'Sapumal BM', 'wathsala@gmail.com', '909090', 'bandarawela', 'LK', 'Uva', '0909087654', 8, '2020-02-02', '2$', '0000-00-00'),
(20, 'Anuththara Sapumal', 'sapumalb97@gmail.com', '909090', 'welimada ', 'LK', 'Uva', '0766462180', 7, '2020-02-02', '2$', '0000-00-00'),
(21, 'Sapumal BM', 'Sapumal@gmail.com', '909090', 'bandarawela', 'LK', 'Uva', '0766462180', 7, '2020-02-02', '2$', '0000-00-00'),
(22, 'Sapumal BM', 'wathsala@gmail.com', '909090', 'bandarawela', 'LK', 'Uva', '0766462180', 8, '2020-02-22', '2$', '0000-00-00'),
(23, 'A.B.M.Wathsala Sewmini', 'wathsala@gmail.com', '909090', 'bandarawela', 'LK', 'Select State', '766462180', 8, '2020-12-31', '', '0000-00-00'),
(24, 'w', 'sapumalb97@gmail.com', '909090', 'welimada bandarawela', 'LK', 'Uva', '0766462180', 7, '2222-02-22', '', '0000-00-00'),
(25, 'wsw', 'wathsala@gmail.com', '909090', 'bandarawela', 'LK', 'Uva', '+94766462180', 8, '3333-03-31', '', '0000-00-00'),
(26, 'A.B.M.Wathsala Sewmini', 'wathsala@gmail.com', '909090', 'bandarawela', 'LK', 'te', '0766462180', 8, '2222-02-22', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` int(255) NOT NULL,
  `productName` varchar(77) NOT NULL,
  `Category_ID` int(255) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Warehouse_ID` int(255) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `productName`, `Category_ID`, `Model`, `Type`, `Warehouse_ID`, `Description`, `Price`, `Picture`) VALUES
(1, 'Aloe Vera', 42, 'heart failure', 'Diabetes', 7, 'Aloe Vera', '1', 'cm.png'),
(2, 'Bilberry extract', 42, 'heart failure', 'Diabetes', 7, 'Bilberry extract', '1', 'ok.png'),
(3, 'Bitter melon', 43, ' lung cancer\r\n', 'Diabetes', 7, 'Bitter melon', '1', 'ooooo.png'),
(4, 'Cinnamon', 43, ' lung cancer\r\n', 'Cardiovascular disease', 8, 'cinnamon', '1', 'cv.png'),
(7, 'Okra', 45, 'Diabetes', 'cardiovascular diseases', 9, 'okra', '1', 'cm.PNG'),
(8, 'Jiaogulan', 45, 'Diabetes', 'cardiovascular diseases', 9, 'Jiaogulan', '1', 'bb.png'),
(11, 'Garlic', 45, 'Diabetes ', 'Diabetes ', 8, 'Garlic', '1', 'glcc.png'),
(14, 'gymnema', 45, 'Diabetes ', 'Diabetes ', 9, '	 gymnema', '1', 'ly.png'),
(19, '\r\n\r\nSaw palmetto', 44, 'cancer', 'cancer', 10, 'Saw palmetto', '1', 'sawpal.png');

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `id` int(6) UNSIGNED NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`id`, `Name`) VALUES
(1, 'David Copperfield'),
(2, 'Ricky Ponting'),
(3, 'Cristiano Ronaldo'),
(4, 'Lionel Messi'),
(5, 'Shane Watson');

-- --------------------------------------------------------

--
-- Table structure for table `tblsongs`
--

CREATE TABLE `tblsongs` (
  `id` int(100) NOT NULL,
  `songsinger` varchar(100) DEFAULT NULL,
  `songfile` varchar(50) DEFAULT NULL,
  `songwriter` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsongs`
--

INSERT INTO `tblsongs` (`id`, `songsinger`, `songfile`, `songwriter`) VALUES
(38, 'Parokya ', 'Parokya Ni Edgar - One And Only You.mp3', 'Parokya '),
(37, 'Amber Pacific', 'Amber Pacific - Falling Away.mp3', 'Them'),
(42, 'Parokya ', 'Parokya Ni Edgar - Gitara.mp3', 'Parokya '),
(43, 'Boyce Avenue', 'Boyce Avenue - Because of You.mp3', 'Boyce Avenue'),
(44, 'Boyce Avenue', 'Boyce Avenue - Every Breath.mp3', 'Boyce Avenue'),
(45, 'Eminem', 'Eminen 8 miles.mp3', 'Eminem');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `Warehouse_ID` int(255) NOT NULL,
  `Country` varchar(25) NOT NULL,
  `City` varchar(25) NOT NULL,
  `Address` varchar(55) NOT NULL,
  `PostalCode` varchar(55) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Warehouse` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`Warehouse_ID`, `Country`, `City`, `Address`, `PostalCode`, `Email`, `Warehouse`) VALUES
(7, '', 'bandarawela', 'bandarawela', '90100', 'anuththarasapumal30@gmail.com', 'Herbls'),
(8, '', 'badulla', 'welimada', '9010', 'anusapumal8@gmail.com', 'fruits'),
(9, '', 'Wellawaya', 'Monaragala', 'Ar271', 'wellawaya@gmail.com', 'Som Home Staff'),
(10, '', 'Welimada', 'Bandarawela', 'Hr302', 'Welimadab@gmail.com', 'Som Clothes'),
(13, 'SOM', 'badulla', 'bandarawela', '901', 'wth@gmail.com', 'Herbls');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cust_Id`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `diabetes`
--
ALTER TABLE `diabetes`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `diabetest2`
--
ALTER TABLE `diabetest2`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_ID`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `client` (`client`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice` (`invoice`);

--
-- Indexes for table `membership_grouppermissions`
--
ALTER TABLE `membership_grouppermissions`
  ADD PRIMARY KEY (`permissionID`);

--
-- Indexes for table `membership_groups`
--
ALTER TABLE `membership_groups`
  ADD PRIMARY KEY (`groupID`);

--
-- Indexes for table `membership_userrecords`
--
ALTER TABLE `membership_userrecords`
  ADD PRIMARY KEY (`recID`),
  ADD KEY `pkValue` (`pkValue`),
  ADD KEY `tableName` (`tableName`);

--
-- Indexes for table `membership_users`
--
ALTER TABLE `membership_users`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `Warehouse_ID` (`Warehouse_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `Category_ID` (`Category_ID`),
  ADD KEY `Warehouse_ID` (`Warehouse_ID`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsongs`
--
ALTER TABLE `tblsongs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`Warehouse_ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `PostalCode` (`PostalCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `chatting`
--
ALTER TABLE `chatting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Cust_Id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Employee_ID` int(95) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membership_grouppermissions`
--
ALTER TABLE `membership_grouppermissions`
  MODIFY `permissionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `membership_groups`
--
ALTER TABLE `membership_groups`
  MODIFY `groupID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `membership_userrecords`
--
ALTER TABLE `membership_userrecords`
  MODIFY `recID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `order_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblsongs`
--
ALTER TABLE `tblsongs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `Warehouse_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Warehouse_ID`) REFERENCES `warehouse` (`Warehouse_ID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`Category_ID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`Warehouse_ID`) REFERENCES `warehouse` (`Warehouse_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

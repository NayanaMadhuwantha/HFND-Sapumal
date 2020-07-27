DROP TABLE IF EXISTS category;

CREATE TABLE `category` (
  `Category_ID` int(255) NOT NULL AUTO_INCREMENT,
  `Category_Name` varchar(123) NOT NULL,
  `Discription` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

INSERT INTO category VALUES("42","Fruits","fruits","l.png");
INSERT INTO category VALUES("43","Herbals","herbals","b.png");
INSERT INTO category VALUES("44","Seeds","seeds","55.png");
INSERT INTO category VALUES("45","Cleaning Materials ","Toilet And House Cleanning","ab.png");


DROP TABLE IF EXISTS chatting;

CREATE TABLE `chatting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(60) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO chatting VALUES("16","lihini","hi","2020-04-18 06:02:04","::1");
INSERT INTO chatting VALUES("17","chathura","hi","2020-04-18 06:02:18","::1");
INSERT INTO chatting VALUES("18","methsarani","hi","2020-04-18 06:02:30","::1");
INSERT INTO chatting VALUES("19","ishan","hi","2020-04-18 06:15:22","::1");


DROP TABLE IF EXISTS clients;

CREATE TABLE `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `contact` varchar(40) DEFAULT NULL,
  `address` text,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `website` varchar(40) DEFAULT NULL,
  `comments` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS clung;

CREATE TABLE `clung` (
  `Product_ID` int(255) NOT NULL,
  `ProductName` varchar(77) NOT NULL,
  `Category_ID` int(255) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Warehouse_ID` int(255) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  PRIMARY KEY (`Product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO clung VALUES("1","","0","","","0","","","ooooo.png");
INSERT INTO clung VALUES("2","","0","","","0","","","tmm.png");
INSERT INTO clung VALUES("3","","0","","","0","","","cm.png");
INSERT INTO clung VALUES("4","","0","","","0","","","glcc.png");


DROP TABLE IF EXISTS contact;

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(29) NOT NULL,
  `Phone` varchar(29) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO contact VALUES("1","Sapumal Bandara","Anusapumal8@gmail.com","0766462180","Admmin");
INSERT INTO contact VALUES("2","AS.Bandara","Anuththarasapumal30@gmail.com","0729157395","Storekeeper");


DROP TABLE IF EXISTS customer;

CREATE TABLE `customer` (
  `Cust_Id` int(15) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(25) NOT NULL DEFAULT '',
  `UserName` varchar(255) NOT NULL DEFAULT '',
  `Phone` varchar(25) NOT NULL DEFAULT '',
  `Email` varchar(55) NOT NULL DEFAULT '',
  `Password` varchar(20) NOT NULL DEFAULT '',
  `Re_Password` varchar(20) NOT NULL DEFAULT '',
  `Country` varchar(25) NOT NULL DEFAULT '',
  `City` varchar(25) NOT NULL DEFAULT '',
  `Adress` varchar(55) NOT NULL DEFAULT '',
  `PostalCode` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`Cust_Id`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO customer VALUES("20","sapumal bandara","sapumal","","anusapumal8@gmail.com","admin123","admin123","Sri Lanka","Uva","welimada","90100");


DROP TABLE IF EXISTS diabetes;

CREATE TABLE `diabetes` (
  `Product_ID` int(255) NOT NULL,
  `ProductName` varchar(77) NOT NULL,
  `Category_ID` int(255) NOT NULL,
  `Model` varchar(77) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Warehouse_ID` int(255) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  PRIMARY KEY (`Product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO diabetes VALUES("1","Aloe Vera","1","DB","","2","type 1 diabetes","1","qq.png");
INSERT INTO diabetes VALUES("2","\nBilberry extract","1","DB","","2","type 1 diabetes","2","ok.png");
INSERT INTO diabetes VALUES("3","Bitter melon","1","DB","","2","type 1 diabetes","1","ooooo.png");
INSERT INTO diabetes VALUES("4","Cinnamon","1","DB","","2","type 1 diabetes","1","cv.png");
INSERT INTO diabetes VALUES("5","Fenugreek","1","DB","","2","type 1 diabetes","3","mn.png");
INSERT INTO diabetes VALUES("6","Ginger","1","DB","","2","type 1 diabetes","3","ss.png");
INSERT INTO diabetes VALUES("7","Okra","1","DB","","2","type 1 diabetes","1","cm.PNG");


DROP TABLE IF EXISTS diabetest2;

CREATE TABLE `diabetest2` (
  `Product_ID` int(255) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `Category_ID` int(77) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Warehouse_ID` int(255) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  PRIMARY KEY (`Product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO diabetest2 VALUES("8","efefe","42","Diabetes","er","0","e","33","qq.png");
INSERT INTO diabetest2 VALUES("9","","0","","","0","","","cm.png");
INSERT INTO diabetest2 VALUES("10","","0","","","0","","","mn.png");
INSERT INTO diabetest2 VALUES("11","","0","","","0","","","m2.png");
INSERT INTO diabetest2 VALUES("12","","0","","","0","","","ss.png");
INSERT INTO diabetest2 VALUES("13","","0","","","0","","","ly.png");
INSERT INTO diabetest2 VALUES("14","","0","","","0","","","ooooo.png");


DROP TABLE IF EXISTS employee;

CREATE TABLE `employee` (
  `Employee_ID` int(95) NOT NULL AUTO_INCREMENT,
  `Employee_Name` varchar(25) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  PRIMARY KEY (`Employee_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

INSERT INTO employee VALUES("2","Anuththara Sm","Sapumal","Sa0766462180","");
INSERT INTO employee VALUES("52","Anuththara Sapumal","sapumal","Sa0766462180","jana.jpg");


DROP TABLE IF EXISTS gs;

CREATE TABLE `gs` (
  `Product_ID` int(255) NOT NULL,
  `ProductName` varchar(77) NOT NULL,
  `Category_ID` int(255) NOT NULL,
  `Model` varchar(77) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Warehouse_ID` int(255) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  PRIMARY KEY (`Product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO gs VALUES("1","","0","","","0","","","sss.png");
INSERT INTO gs VALUES("2","","0","","","0","","","opop.png");


DROP TABLE IF EXISTS invoice_items;

CREATE TABLE `invoice_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice` int(10) unsigned DEFAULT NULL,
  `item` varchar(200) DEFAULT NULL,
  `unit_price` decimal(9,2) DEFAULT '0.00',
  `qty` decimal(9,3) DEFAULT '1.000',
  `tax` decimal(4,2) DEFAULT '0.00',
  `price` decimal(9,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice` (`invoice`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS invoices;

CREATE TABLE `invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Due',
  `date_due` date DEFAULT NULL,
  `client` int(10) unsigned DEFAULT NULL,
  `client_contact` int(10) unsigned DEFAULT NULL,
  `client_address` int(10) unsigned DEFAULT NULL,
  `client_phone` int(10) unsigned DEFAULT NULL,
  `client_email` int(10) unsigned DEFAULT NULL,
  `client_website` int(10) unsigned DEFAULT NULL,
  `client_comments` int(10) unsigned DEFAULT NULL,
  `subtotal` decimal(9,2) DEFAULT NULL,
  `discount` decimal(4,2) DEFAULT '0.00',
  `tax` decimal(9,2) DEFAULT NULL,
  `total` decimal(9,2) DEFAULT '0.00',
  `comments` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `client` (`client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS membership_grouppermissions;

CREATE TABLE `membership_grouppermissions` (
  `permissionID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `groupID` int(11) DEFAULT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `allowInsert` tinyint(4) DEFAULT NULL,
  `allowView` tinyint(4) NOT NULL DEFAULT '0',
  `allowEdit` tinyint(4) NOT NULL DEFAULT '0',
  `allowDelete` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`permissionID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO membership_grouppermissions VALUES("1","1","clients","0","0","0","0");
INSERT INTO membership_grouppermissions VALUES("2","1","invoices","0","0","0","0");
INSERT INTO membership_grouppermissions VALUES("3","1","invoice_items","0","0","0","0");
INSERT INTO membership_grouppermissions VALUES("4","2","clients","0","0","0","0");
INSERT INTO membership_grouppermissions VALUES("5","2","invoices","0","0","0","0");
INSERT INTO membership_grouppermissions VALUES("6","2","invoice_items","0","0","0","0");
INSERT INTO membership_grouppermissions VALUES("7","3","clients","1","3","3","3");
INSERT INTO membership_grouppermissions VALUES("8","3","invoices","1","3","3","3");
INSERT INTO membership_grouppermissions VALUES("9","3","invoice_items","1","3","3","3");


DROP TABLE IF EXISTS membership_groups;

CREATE TABLE `membership_groups` (
  `groupID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `description` text,
  `allowSignup` tinyint(4) DEFAULT NULL,
  `needsApproval` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`groupID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO membership_groups VALUES("1","anonymous","Anonymous group created automatically on 2014-08-17","0","0");
INSERT INTO membership_groups VALUES("2","anonymous","Anonymous group created automatically on 2014-08-17","0","0");


DROP TABLE IF EXISTS membership_userrecords;

CREATE TABLE `membership_userrecords` (
  `recID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tableName` varchar(100) DEFAULT NULL,
  `pkValue` varchar(255) DEFAULT NULL,
  `memberID` varchar(20) DEFAULT NULL,
  `dateAdded` bigint(20) unsigned DEFAULT NULL,
  `dateUpdated` bigint(20) unsigned DEFAULT NULL,
  `groupID` int(11) DEFAULT NULL,
  PRIMARY KEY (`recID`),
  KEY `pkValue` (`pkValue`),
  KEY `tableName` (`tableName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS membership_users;

CREATE TABLE `membership_users` (
  `memberID` varchar(20) NOT NULL,
  `passMD5` varchar(40) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `signupDate` date DEFAULT NULL,
  `groupID` int(10) unsigned DEFAULT NULL,
  `isBanned` tinyint(4) DEFAULT NULL,
  `isApproved` tinyint(4) DEFAULT NULL,
  `custom1` text,
  `custom2` text,
  `custom3` text,
  `custom4` text,
  `comments` text,
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO membership_users VALUES("admin","21232f297a57a5a743894a0e4a801fc3","admin@localhost","2014-08-17","3","0","1","","","","","Admin member created automatically on 2014-08-17");
INSERT INTO membership_users VALUES("guest","","","2014-08-17","1","0","1","","","","","Anonymous member created automatically on 2014-08-17");


DROP TABLE IF EXISTS payment;

CREATE TABLE `payment` (
  `order_ID` int(255) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`order_ID`),
  KEY `Warehouse_ID` (`Warehouse_ID`),
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Warehouse_ID`) REFERENCES `warehouse` (`Warehouse_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO payment VALUES("4","A.S Bandara","anuththarasapumal30@gmail.com","90100","uva","LK","Welimada","0766462180","8","uva","1$");


DROP TABLE IF EXISTS product;

CREATE TABLE `product` (
  `Product_ID` int(255) NOT NULL AUTO_INCREMENT,
  `productName` varchar(77) NOT NULL,
  `Category_ID` int(255) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Warehouse_ID` int(255) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  PRIMARY KEY (`Product_ID`),
  KEY `Category_ID` (`Category_ID`),
  KEY `Warehouse_ID` (`Warehouse_ID`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`Category_ID`),
  CONSTRAINT `product_ibfk_2` FOREIGN KEY (`Warehouse_ID`) REFERENCES `warehouse` (`Warehouse_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO product VALUES("1","Aloe Vera","42","Orange202","Orage Arabsiyo","7","Aloe Vera","3","l.png");
INSERT INTO product VALUES("2","Apple","42","apple23","fruits","7","for eating","1","k.png");
INSERT INTO product VALUES("3","grapes","42","grap123","grape fruit","7","food stuff","2","e.png");
INSERT INTO product VALUES("4","pepsi","42","bav121","drinks","8","soda drinks","1","b.png");
INSERT INTO product VALUES("5","Coca","43","coc2232","drinks","8","soda drinks","1","a.png");
INSERT INTO product VALUES("6","Rani","43","ran12","drinks","8","IS DRINKS","1","a.png");
INSERT INTO product VALUES("7","fairy","45","fairy12","cleaning","9","for cleaning house","2.5","ab.png");
INSERT INTO product VALUES("8","harpic","45","ahr980","cleaning","9","for cleaning house","2","bb.png");
INSERT INTO product VALUES("10","balayee","45","545ss","cleaning","9","for cleaning house","3","bb.png");


DROP TABLE IF EXISTS tblsongs;

CREATE TABLE `tblsongs` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `songsinger` varchar(100) DEFAULT NULL,
  `songfile` varchar(50) DEFAULT NULL,
  `songwriter` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

INSERT INTO tblsongs VALUES("38","Parokya ","Parokya Ni Edgar - One And Only You.mp3","Parokya ");
INSERT INTO tblsongs VALUES("37","Amber Pacific","Amber Pacific - Falling Away.mp3","Them");
INSERT INTO tblsongs VALUES("42","Parokya ","Parokya Ni Edgar - Gitara.mp3","Parokya ");
INSERT INTO tblsongs VALUES("43","Boyce Avenue","Boyce Avenue - Because of You.mp3","Boyce Avenue");
INSERT INTO tblsongs VALUES("44","Boyce Avenue","Boyce Avenue - Every Breath.mp3","Boyce Avenue");
INSERT INTO tblsongs VALUES("45","Eminem","Eminen 8 miles.mp3","Eminem");


DROP TABLE IF EXISTS warehouse;

CREATE TABLE `warehouse` (
  `Warehouse_ID` int(255) NOT NULL AUTO_INCREMENT,
  `Country` varchar(25) NOT NULL,
  `City` varchar(25) NOT NULL,
  `Address` varchar(55) NOT NULL,
  `PostalCode` varchar(55) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Warehouse` varchar(55) NOT NULL,
  PRIMARY KEY (`Warehouse_ID`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `PostalCode` (`PostalCode`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO warehouse VALUES("7","","bandarawela","bandarawela","90100","anuththarasapumal30@gmail.com","Herbls");
INSERT INTO warehouse VALUES("8","","badulla","welimada","9010","anusapumal8@gmail.com","fruits");
INSERT INTO warehouse VALUES("9","","Arabsiyo","Arabsiyo","Ar271","somstore@somestore.com","Som Home Staff");
INSERT INTO warehouse VALUES("10","","Hargeisa","Hargeisa","Hr302","nation@gmail.com","Som Clothes");



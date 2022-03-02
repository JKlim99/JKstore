-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2019 at 08:16 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jkstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

DROP TABLE IF EXISTS `ordertable`;
CREATE TABLE IF NOT EXISTS `ordertable` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `orderStatus` int(1) NOT NULL,
  `orderDate` datetime NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`orderID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`orderID`, `orderStatus`, `orderDate`, `userID`) VALUES
(23, 1, '2019-10-23 20:20:42', 3),
(24, 1, '2019-10-23 22:21:12', 3),
(25, 1, '2019-10-24 13:51:54', 3),
(29, 1, '2019-10-29 21:08:07', 3),
(30, 1, '2019-11-02 17:49:17', 3),
(31, 1, '2019-11-02 17:49:46', 3),
(32, 1, '2019-11-02 17:51:32', 3),
(33, 0, '2019-11-02 00:00:00', 3),
(34, 1, '2019-11-05 12:29:01', 9);

-- --------------------------------------------------------

--
-- Table structure for table `ordertable_product`
--

DROP TABLE IF EXISTS `ordertable_product`;
CREATE TABLE IF NOT EXISTS `ordertable_product` (
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `rateStatus` int(1) DEFAULT '0',
  `shippingStatus` int(1) DEFAULT '0',
  KEY `orderID` (`orderID`,`productID`),
  KEY `product_order` (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertable_product`
--

INSERT INTO `ordertable_product` (`orderID`, `productID`, `quantity`, `price`, `rateStatus`, `shippingStatus`) VALUES
(23, 4, 7, '743.40', 1, 3),
(23, 3, 1, '118.00', 1, 3),
(24, 3, 1, '118.00', 0, 0),
(25, 3, 1, '118.00', 0, 0),
(29, 3, 10, '1180.00', 1, 3),
(30, 24, 1, '44.50', 0, 0),
(30, 21, 1, '860.30', 0, 0),
(31, 21, 1, '860.30', 0, 0),
(32, 23, 1, '3144.15', 0, 3),
(33, 24, 1, NULL, 0, 0),
(34, 22, 1, '1899.00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(255) NOT NULL,
  `productDescription` varchar(500) NOT NULL,
  `quantity` int(11) NOT NULL,
  `productCategory` varchar(30) NOT NULL,
  `productListedDate` date NOT NULL,
  `productImageURL` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `sale` int(1) DEFAULT NULL,
  `salePercentage` int(2) DEFAULT '0',
  `productStatus` varchar(12) NOT NULL DEFAULT '1',
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`productID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `productDescription`, `quantity`, `productCategory`, `productListedDate`, `productImageURL`, `price`, `sale`, `salePercentage`, `productStatus`, `userID`) VALUES
(3, 'Quilted Backpack', 'This a good quality backpack ever.', 1, 'fashion', '2019-10-13', '3.jpg', '118', 0, 0, '1', 2),
(4, 'Student stationery notebook son kraft paper coil manual', '32k &quot;Inside Page Of Blank Section&quot;.', 100, 'homeAndLifestyle', '2019-10-13', '4.jpg', '10', 0, 0, '1', 2),
(20, 'Nvidia Geforce GTX 1070 Ti', 'Features\r\nPowered by GeForceÂ® GTX 1070 Ti\r\nIntegrated with 8GB GDDR5 256bit memory \r\nWINDFORCE 3X with Blade Fan Design\r\nProtection Metal Back Plate\r\nRGB Fusion-16.7M Customizable Color Lighting\r\nSupport up to 8K display @60Hz (requires 2*DP1.3 connectors)\r\n\r\nCore Clock\r\nBoost:1721 MHz / Base:1632 MHz (OC Mode) \r\nBoost:1683 MHz / Base:1607MHz (Gaming Mode)', 100, 'electronicDevices', '2019-10-27', '20.jpg', '2599', 1, 5, '1', 7),
(21, 'Nvidia Geforce RTX 2060', 'Engine Clock: 1770MHz (Boost)\r\nCUDA cores: 1536\r\nVideo Memory: 6GB GDDR6\r\nRecommended PSU: 450W\r\nPower Input: 1x 8-pin\r\nDimension:173.4mm x 111.15mm x 35.3mm', 48, 'electronicDevices', '2019-10-27', '21.jfif', '1229', 1, 30, '1', 7),
(22, 'Asus Nvidia Geforce Strix ROG GTX 1070 8GB Gaming with Warranty', 'NVIDIA GameWorksâ„¢provides an interactive and cinematic experience, as well as incredibly smooth gameplay.\r\nWarranty until 2021\r\n90% used card', 99, 'electronicDevices', '2019-10-27', '22.jpg', '1899', NULL, 0, '1', 7),
(23, 'ASUS DUAL NVIDIA GeForceÂ® RTXâ„¢ 2070 O8G', 'NVIDIA TURINGâ„¢\r\n8GB GDDR6\r\nMEMORY INTERFACE: 256-bit\r\nCUDA CORE: 2944\r\nDIMENSION: 10.53 &quot; x 4.47 &quot; x 2.28 &quot; Inch', 19, 'electronicDevices', '2019-10-27', '23.jpg', '3699', 1, 15, '1', 7),
(24, 'Metal Drink Bottle', 'Keep your drink cool (or hot!) in this Typo metal drink bottle. \r\n', 49, 'homeAndLifestyle', '2019-10-27', '24.jpg', '89', 1, 50, '1', 2),
(25, 'Monsieur Notebook Leather Journal - Brown Plain Small A6', 'These classically designed leather journals are made out of real leather resulting in a durable, tough notebook a great alternative to other non-leather premium notebook brands.- Ivory paper, perfect for pencils and inks- Matching ribbon- Smyth-sewn binding provides a strong notebook that can lie-flat once your leather is softened- Journal measures 4 inches by 6 inches- 192 pages\"', 50, 'homeAndLifestyle', '2019-10-27', '25.jpg', '58', NULL, 0, '1', 2),
(26, '2B pencil (2pcs)', 'Convenient and easy to use, simply shake twice and it\'s ready to write.', 200, 'homeAndLifestyle', '2019-10-27', '26.jpg', '5', NULL, 0, '1', 2),
(27, 'Move Fast And Break Things Book', 'Non-fiction book\r\nAuthor: Jonathan Taplin', 50, 'homeAndLifestyle', '2019-10-28', '27.jpg', '56', NULL, 0, '1', 2),
(28, 'NIKE Air Max Running Shoes', 'Gender: Men\r\nBrand Name: Nike\r\nOutsole Material: Cow Muscle\r\nUpper Material: Genuine Leather\r\nFeature: Breathable,Height Increasing\r\nShoe Width: Medium(B,M)\r\nClosure Type: Elastic band\r\nFunction: Stability', 50, 'sports', '2019-11-06', '28.jpg', '500', NULL, 0, '1', 8),
(29, 'Running Shoes Light Green Nike Sports Shoes', 'Nike running shoes\r\nColor: light green', 50, 'sports', '2019-11-06', '29.jpg', '500', NULL, 0, '1', 8),
(30, 'NIKE AIR VAPORMAX FLYKNIT', 'Gender: Unisex\r\nBrand Name: Nike\r\nOutsole Material: Rubber\r\nUpper Material: Mesh (Air mesh)\r\nFeature: Breathable\r\nShoe Width: Medium(B,M)\r\nClosure Type: Lace-Up\r\nRelease Date: Spring2018\r\nFunction: Stability', 50, 'sports', '2019-11-06', '30.jpg', '500', NULL, 0, '1', 8),
(31, 'Nike Roll Top Backpack - Anthracite', 'The Nike Swim Roll Top Backpack is a stylish and comfortable solution for carrying all your essential swimming gear to and from the pool.', 50, 'fashion', '2019-11-06', '31.jpg', '200', NULL, 0, '1', 8),
(32, 'Nike Tops Short Sleeve Crew Logo Tee', 't features the iconic Nike Swoosh printed to the front in a large graphic design.', 100, 'fashion', '2019-11-06', '32.jpg', '120', NULL, 0, '1', 8),
(33, 'Adidas Pure Mens Running Shoes', 'Athletic Shoe Type: Running ShoesDepartment Name: AdultOutsole Material: RubberTechnology: DMXModel Number: EE4281Shoe Width: Medium(B,M)Upper Height: LowUpper Material: PU+FabricFeature: BreathableInsole Material: RubberClosure Type: Lace-UpFunction: CushioningGender: Men', 50, 'sports', '2019-11-06', '33.jpg', '500', 0, 0, '1', 10),
(34, 'Adidas Mad Bounce 2018 Basketball Shoes', 'Basketball Shoes Built with updates to keep you at the top of your game, the adidasÂ® Mad Bounce 2018 ', 20, 'sports', '2019-11-06', '34.jfif', '500', 0, 0, '1', 10),
(35, 'Razer Deathadder Elite', 'Designing a gaming mouse to meet the exacting demands of the esports elite, takes cutting-edge technology, coupled with ergonomics.', 20, 'electronicDevices', '2019-11-06', '35.jfif', '150', NULL, 0, '1', 11),
(36, 'Razer Raiju Ultimate PS4 Controller', 'Bluetooth and wired connectionInterchangeable thumbsticks and D-PadRazer chrom4 Multi-function buttonsMulti-color Razer chroma lighting stripTrigger.', 20, 'electronicDevices', '2019-11-06', '36.png', '400', NULL, 0, '1', 11),
(37, 'Sharp 700L Side by Side Refrigerator SHP-SJF858VMBK', 'LED Interior LightingActifresh Hybrid Cooling SystemPlasmacluster Ion TechnologyExtra Cool CompartmentEco Mode', 10, 'homeAppliance', '2019-11-06', '37.jfif', '1000', NULL, 0, '1', 12),
(38, 'Sharp SJ-XG740G-BK Free standing Fridge Freezer', 'Total Net Capacity: 600ltrs, Full No Frost, Plasmacluster technology, In-door Ice maker, H x W x D = 187 x 86,5 x 74 cm, Color: Glass Black', 5, 'homeAppliance', '2019-11-06', '38.jpg', '1200', NULL, 0, '1', 12),
(39, 'SHARP AHAP9SMD/AUAP9SMD AIR COND', 'Buy SHARP AHAP9SMD/AUAP9SMD AIR COND 1.0HP PLASMA CLUSTER ION GAS R410A .Lots of discount and promotional sales.', 10, 'homeAppliance', '2019-11-06', '39.jpg', '800', 1, 30, '1', 12);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `ratingID` int(11) NOT NULL AUTO_INCREMENT,
  `rate` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  PRIMARY KEY (`ratingID`),
  KEY `userID` (`userID`,`productID`),
  KEY `rating_product` (`productID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`ratingID`, `rate`, `userID`, `productID`) VALUES
(2, 5, 3, 3),
(3, 3, 3, 4),
(4, 5, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `site_feedback`
--

DROP TABLE IF EXISTS `site_feedback`;
CREATE TABLE IF NOT EXISTS `site_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(345) NOT NULL,
  `title` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `replied` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_feedback`
--

INSERT INTO `site_feedback` (`id`, `name`, `email`, `title`, `message`, `replied`) VALUES
(1, 'LIM JINQ KUEN', 'jinqkuenlim@outlook.com', '1', '18, JALAN P16D/1, PRESINT 16', 1),
(2, 'LIM JINQ KUEN', 'jinnlim@outlook.com', '1', '18, JALAN P16D/1, PRESINT 16', 1),
(3, 'Lim Jinq Kuen', 'jinqkuenlim@outlook', 'Query about seller', 'Any requirements to become a seller in jkstore?\r\nHow we receive our profit when there is someone buying our products?', 0),
(4, 'LIM JINQ KUEN', 'jinqkuenlim@outlook.com', '123', '18, JALAN P16D/1, PRESINT 16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(345) NOT NULL,
  `userUsername` varchar(50) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userPhoneNumber` varchar(12) NOT NULL,
  `userType` int(1) NOT NULL,
  `userPicture` varchar(255) DEFAULT NULL,
  `sellerDescription` varchar(500) DEFAULT NULL,
  `sellerShortDescription` varchar(50) DEFAULT NULL,
  `userStreet` varchar(50) NOT NULL,
  `userCity` varchar(50) NOT NULL,
  `userState` varchar(50) NOT NULL,
  `userCountry` varchar(50) NOT NULL,
  `userPostalCode` int(5) NOT NULL,
  `userBank` varchar(50) DEFAULT NULL,
  `userAccountNumber` varchar(50) DEFAULT NULL,
  `isActive` int(1) NOT NULL,
  `request_password` int(1) NOT NULL,
  `temp_password` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userEmail`, `userUsername`, `userPassword`, `userPhoneNumber`, `userType`, `userPicture`, `sellerDescription`, `sellerShortDescription`, `userStreet`, `userCity`, `userState`, `userCountry`, `userPostalCode`, `userBank`, `userAccountNumber`, `isActive`, `request_password`, `temp_password`) VALUES
(2, 'popular@hotmail.com', 'Popular', '25d55ad283aa400af464c76d713c07ad', '601126481393', 2, 'popular.jpg', 'POPULAR sells a wide variety of fiction, non-fiction and general interest books in English, Chinese and Malay languages, as well as school textbooks and revision books. In addition, it also offers a large selection of magazines, stationery, multi-media products, gift items and CDs. ', 'Established in January 1984, POPULAR Book Company.', '18, Jalan P16D/1', 'Presint 16', 'Putrajaya', 'Malaysia', 62150, 'CIMB', '7068605119', 2, 0, ''),
(3, 'jinqkuenl@gmail.com', 'jinqkuenlim', '25d55ad283aa400af464c76d713c07ad', '01126481393', 1, NULL, NULL, NULL, '18, JALAN P16D/1, PRESINT 16', 'PUTRAJAYA', 'PULAU PINANG', 'Malaysia', 62150, NULL, NULL, 1, 1, 'ToPEipo8MJ'),
(4, 'jinqkuenlim@outlook.com', 'Lim Jinq Kuen', '25d55ad283aa400af464c76d713c07ad', '01126481393', 0, NULL, NULL, NULL, '18, JALAN P16D/1, PRESINT 16', 'PUTRAJAYA', 'PULAU PINANG', 'Malaysia', 62150, NULL, NULL, 1, 0, ''),
(7, 'nvidiageforce@hotmail.com', 'NVIDIA GEFORCE', '25d55ad283aa400af464c76d713c07ad', '601126481393', 2, '7.jpg', 'The place to buy SHIELD, GeForce GTX Graphics Cards, Quadro Graphics Cards and official NVIDIA gear.', 'GeForce is a brand of graphics processing units.', '18, JALAN P16D/1, PRESINT 16', 'PUTRAJAYA', 'PULAU PINANG', 'Malaysia', 62150, 'Maybank', '1234566778887', 2, 0, ''),
(8, 'nike@hotmail.com', 'Nike', '25d55ad283aa400af464c76d713c07ad', '1126481393', 2, '8.jpg', 'The company was founded on January 25, 1964, as Blue Ribbon Sports, by Bill Bowerman and Phil Knight, and officially became Nike, Inc. on May 30, 1971. The company takes its name from Nike, the Greek goddess of victory.[8] Nike markets its products under its own brand, as well as Nike Golf, Nike Pro, Nike+, Air Jordan, Nike Blazers, Air Force 1, Nike Dunk, Air Max, Foamposite, Nike Skateboarding, Nike CR7,[9] and subsidiaries including Brand Jordan, Hurley International and Converse.', 'Nike, an American multinational corporation', '18, JALAN P16D/1, PRESINT 16', 'PUTRAJAYA', 'PULAU PINANG', 'Malaysia', 621500, 'CIMB', '12345678912414', 2, 0, NULL),
(9, 'chia_00@hotmail.com', 'Chia Kong Weng', 'c69874b898abb180ac71bd99bc16f8fb', '01923456789', 1, 'jkstore-profile-default.png', NULL, NULL, 'Jalan Hihi', 'New York', 'Mumbai', 'Bangladesh', 56789, NULL, NULL, 1, 0, NULL),
(10, 'adidas@hotmail.com', 'Adidas', '25d55ad283aa400af464c76d713c07ad', '1234567890', 2, '10.jpg', 'Adidas AG (German: [ËˆÊ”adiËŒdas] AH-dee-DAHS; stylized as É‘didÉ‘s since 1949[3]) is a multinational corporation, founded and headquartered in Herzogenaurach, Germany, that designs and manufactures shoes, clothing and accessories.', 'Adidas, the fashion company.', '123, Jalan ABC', 'Bukit Jalil', 'Selangor', 'Malaysia', 12312, 'CIMB', '123123123', 2, 0, NULL),
(11, 'razer@hotmail.com', 'Razer', '25d55ad283aa400af464c76d713c07ad', '1234567890', 2, '11.jpg', 'Razer Inc. is a global gaming hardware manufacturing company, as well as an esports and financial services provider established in 2005 in San Diego, California by Singaporean entrepreneur Min-Liang.', 'A global gaming hardware manufacturing company', '123, Jalan ABC', 'Bukit Jalil', 'Selangor', 'Malaysia', 12312, 'CIMB', '1231231231', 2, 0, NULL),
(12, 'sharp@hotmail.com', 'Sharp', '25d55ad283aa400af464c76d713c07ad', '1234567890', 2, '12.jpg', 'Sharp Corporation is a Japanese multinational corporation that designs and manufactures electronic products, headquartered in Sakai-ku, Sakai. Since 2016 it has been a subsidiary of Taiwan-based Foxconn Group.', 'A Japanese multinational corporation', '123, Jalan ABC', 'Bukit Jalil', 'Selangor', 'Malaysia', 12312, 'CIMB', '123132123', 2, 0, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD CONSTRAINT `user_order` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ordertable_product`
--
ALTER TABLE `ordertable_product`
  ADD CONSTRAINT `order_product` FOREIGN KEY (`orderID`) REFERENCES `ordertable` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_order` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `user_product` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_product` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_user` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

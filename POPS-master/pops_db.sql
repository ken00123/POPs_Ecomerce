-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2019 at 11:25 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pops_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE IF NOT EXISTS `Admin` (
  `Admin_ID` int(20) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Phone_Number` varchar(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`Admin_ID`, `First_Name`, `Last_Name`, `Phone_Number`, `Email`, `Password`) VALUES
(1, 'Jeremy', 'Perez', '7879552864', 'jeremy.perez2@upr.edu', '123456'),
(2, 'Kevin', 'Alicea', '7879868486', 'kevin.alicea@upr.edu', '123456'),
(3, 'Kenneth', 'Gonzalez', '7872329012', 'kenneth.gonzalez11@upr.edu', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE IF NOT EXISTS `Customer` (
  `Customer_ID` int(20) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Middle_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Street_Name` text NOT NULL,
  `Apt_Number` int(6) NOT NULL,
  `City` varchar(18) NOT NULL,
  `State` varchar(2) NOT NULL,
  `Zip` varchar(6) NOT NULL,
  `Address_Type` varchar(10) NOT NULL,
  `Phone_Number` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Member_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`Customer_ID`, `First_Name`, `Middle_Name`, `Last_Name`, `Street_Name`, `Apt_Number`, `City`, `State`, `Zip`, `Address_Type`, `Phone_Number`, `Email`, `Password`, `Member_Date`) VALUES
(3, 'Kenneth', 'S', 'Gonzalez', 'Calle Francesco', 214, 'Quebradillas', 'PR', '00678', 'Shipping', '7872329012', 'kenneth.gonzalez11@upr.edu', '1234', '2019-03-06 19:25:32'),
(5, 'Nelky', '', 'Nieves', 'Calle Francesco', 214, 'Quebradillas', 'PR', '00678', 'Both', '7876162499', 'nnelky@gmail.com', 'octubre1975', '2019-03-06 22:51:33'),
(8, 'Jose', 'S', 'Gonz', 'Calle Franc', 213, 'queb', 'PR', '00678', 'Billing', '7872329012', 'ksgonzalez14@gmail.com', '1234', '2019-04-03 01:30:35'),
(9, 'Thalia', 'Meliz', 'Vazquez', 'HC 2 Box', 6802, 'Barranquitas', 'PR', '00794', 'Both', '7872086195', 'thaliameliz@gmail.com', '1111', '2019-04-05 18:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE IF NOT EXISTS `Orders` (
  `Order_Num` int(10) NOT NULL,
  `Item_ID` int(10) NOT NULL,
  `Customer_ID` int(20) NOT NULL,
  `Price` int(10) NOT NULL,
  `Item_Quantity` int(3) NOT NULL,
  `Street_Name` varchar(20) NOT NULL,
  `Apt_Number` int(7) NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Zip` varchar(5) NOT NULL,
  `Payment_Type` varchar(20) NOT NULL,
  `Tracking_Num` varchar(10) NOT NULL,
  `Order_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`Order_Num`, `Item_ID`, `Customer_ID`, `Price`, `Item_Quantity`, `Street_Name`, `Apt_Number`, `City`, `State`, `Zip`, `Payment_Type`, `Tracking_Num`, `Order_Date`, `Status`) VALUES
(10465461, 20, 3, 20, 1, 'Calle Francesco', 214, 'queb', 'PR', '00678', 'Paypal', '1608302175', '2019-04-17 23:06:36', 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `Payment_info`
--

CREATE TABLE IF NOT EXISTS `Payment_info` (
  `Order_Num` varchar(15) NOT NULL,
  `Payment_Type` varchar(16) NOT NULL,
  `Total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Payment_info`
--

INSERT INTO `Payment_info` (`Order_Num`, `Payment_Type`, `Total`) VALUES
('10465461', 'Paypal', 20);

-- --------------------------------------------------------

--
-- Table structure for table `pop_products`
--

CREATE TABLE IF NOT EXISTS `pop_products` (
  `Item_Id` int(11) NOT NULL,
  `Item_Name` varchar(35) NOT NULL,
  `Item_Image` varchar(150) NOT NULL,
  `Amount_Remaining` int(4) NOT NULL,
  `Price` int(6) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Item_Category` varchar(20) NOT NULL,
  `Item_Subcategory` varchar(20) NOT NULL,
  `Date_Added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Active` int(1) NOT NULL DEFAULT '1',
  `Distributor_price` int(5) NOT NULL DEFAULT '10'
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pop_products`
--

INSERT INTO `pop_products` (`Item_Id`, `Item_Name`, `Item_Image`, `Amount_Remaining`, `Price`, `Description`, `Item_Category`, `Item_Subcategory`, `Date_Added`, `Active`, `Distributor_price`) VALUES
(1, 'Tokyo Ghoul - Ken Kaneki', 'img/anime1.jpg', 0, 20, 'Great Item', 'Series', 'Animation', '0000-00-00 00:00:00', 1, 10),
(2, 'Soul Eater - Maka', 'img/anime2.jpg', 0, 20, 'Great Item', 'Series', 'Animation', '0000-00-00 00:00:00', 1, 10),
(3, 'Once Piece - Monkey. D. Luffy', 'img/anime3.jpg', 1, 20, 'Great Item', 'Series', 'Animation', '0000-00-00 00:00:00', 1, 10),
(4, 'Naruto Shippuden - Naruto', 'img/anime4.jpg', 0, 20, 'Great Item', 'Series', 'Animation', '0000-00-00 00:00:00', 1, 10),
(5, 'NBA - LAKERS - Lebron', 'img/basketball1.png', 0, 20, 'Great Item', 'Sports', 'Basketball', '2019-03-06 20:06:18', 0, 10),
(6, 'NBA - 76ers - Joel Embiid', 'img/basketball2.png', 11, 20, 'Great Item', 'Sports', 'Basketball', '0000-00-00 00:00:00', 1, 10),
(7, 'NBA - GSW - Thompson', 'img/basketball3.png', 11, 20, 'Great Item', 'Sports', 'Basketball', '0000-00-00 00:00:00', 1, 10),
(8, 'NBA - GSW - Stephen Curry', 'img/basketball4.png', 5, 20, 'Great Item', 'Sports', 'Basketball', '0000-00-00 00:00:00', 1, 10),
(9, 'The Witcher III - Geralt', 'img/rpg1.jpg', 9, 20, 'Great Item', 'Video Games', 'RPG', '0000-00-00 00:00:00', 1, 10),
(10, 'The Witcher III - Eredin', 'img/rpg2.jpg', 14, 20, 'Great Item', 'Video Games', 'RPG', '0000-00-00 00:00:00', 1, 10),
(11, 'Destiny - Emperor Calus', 'img/rpg3.jpg', 15, 20, 'Great Item', 'Video Games', 'RPG', '0000-00-00 00:00:00', 1, 10),
(12, 'Overwatch - Soldier:76', 'img/rpg4.jpg', 13, 20, 'Great Item', 'Video Games', 'RPG', '0000-00-00 00:00:00', 1, 10),
(14, 'Avengers-Vision', 'img/vision.png', 3, 30, 'Special Edition', 'Series', 'Heroes', '0000-00-00 00:00:00', 1, 10),
(15, 'Avengers-Thanos', 'img/thanos.png', 0, 75, 'Special Edition', 'Series', 'Heroes', '0000-00-00 00:00:00', 1, 10),
(16, 'Flash-Zoom', 'img/zoom.png', 9, 200, 'Special Edition', 'Series', 'Heroes', '0000-00-00 00:00:00', 1, 10),
(17, 'Avengers-Ultron', 'img/ultron.png', 8, 50, 'Special Edition', 'Series', 'Heroes', '0000-00-00 00:00:00', 1, 10),
(18, 'Overwatch-Tracer', 'img/overwatch_Tracer_92.jpg', 48, 20, 'Overwatch', 'Video Games', 'MOBA', '2019-03-08 03:16:42', 1, 10),
(19, 'Overwatch-Torbjorn', 'img/overwatch_Torbjorn_350.png', 43, 20, 'Overwatch', 'Video Games', 'MOBA', '2019-03-08 03:16:42', 1, 10),
(20, 'Overwatch-McCree', 'img/overwatch_McCree_182.jpg', 47, 20, 'Overwatch', 'Video Games', 'MOBA', '2019-03-08 03:16:42', 1, 10),
(21, 'Overwatch-Genji', 'img/overwatch_Genji_347.png', 50, 20, 'Overwatch', 'Video Games', 'MOBA', '2019-03-08 03:16:42', 1, 10),
(22, 'Harry Potter - Potter', 'img/HarryPoter_Potter_42.jpg', 42, 20, 'Harry Potter', 'Series', 'ScienceFiction', '2019-03-08 04:32:23', 1, 10),
(23, 'Star Wars - Chewbacca', 'img/StarWarsChewbacca_195.jpg', 49, 20, 'Star Wars', 'Series', 'ScienceFiction', '2019-03-08 04:32:23', 1, 10),
(24, 'Ghostbuster - Slimer', 'img/GhostBuster_Slimer_108.jpg', 26, 20, 'Ghostbuster', 'Series', 'ScienceFiction', '2019-03-08 04:32:23', 1, 10),
(25, 'GoT - Daenerys', 'img/GoT_Daenerys_59.png', 50, 20, 'GoT', 'Series', 'ScienceFiction', '2019-03-08 04:32:23', 1, 10),
(26, 'MLB - Nationals - Scherzer', 'img/baseball1.png', 20, 18, 'Great Baseball Player', 'Sports', 'Baseball', '2000-02-24 04:00:00', 1, 10),
(27, 'MLB - Cardinals - Molina', 'img/baseball2.png', 20, 18, 'Great Baseball Player', 'Sports', 'Baseball', '2000-02-24 04:00:00', 1, 10),
(28, 'MLB - Mariners - Robinson', 'img/baseball3.png', 20, 18, 'Great Baseball Player', 'Sports', 'Baseball', '2000-02-24 04:00:00', 1, 10),
(29, 'MLB - Angels - Mike Trout', 'img/baseball4.png', 20, 18, 'Great Baseball Player', 'Sports', 'Baseball', '2000-02-24 04:00:00', 1, 10),
(30, 'WWE - Undertaker', 'img/wwe1.jpg', 20, 21, 'Great wrestler', 'Sports', 'Wrestling', '2000-02-24 04:00:00', 1, 10),
(31, 'WWE - Rey Mysterio', 'img/wwe2.jpg', 20, 19, 'Great wrestler', 'Sports', 'Wrestling', '2000-02-24 04:00:00', 1, 10),
(32, 'WWE - John Cena', 'img/wwe3.jpg', 20, 19, 'Great wrestler', 'Sports', 'Wrestling', '2000-02-24 04:00:00', 1, 10),
(33, 'WWE - The Rock', 'img/wwe4.png', 20, 19, 'Great wrestler', 'Sports', 'Wrestling', '2000-02-24 04:00:00', 1, 10),
(34, 'Halo-Chief', 'img/chief.png', 10, 20, 'Halo', 'Video Games', 'Shooter', '2019-03-10 21:10:19', 1, 10),
(35, 'Halo-Cortana', 'img/cortana.png', 8, 20, 'Halo', 'Video Games', 'Shooter', '2019-03-10 21:10:19', 1, 10),
(36, 'Halo-Red Sparta', 'img/redSparta.png', 10, 20, 'Halo', 'Video Games', 'Shooter', '2019-03-10 21:10:19', 1, 10),
(37, 'Halo-Blue Sparta', 'img/blueSparta.png', 10, 20, 'Halo', 'Video Games', 'Shooter', '2019-03-10 21:10:19', 1, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `pop_products`
--
ALTER TABLE `pop_products`
  ADD PRIMARY KEY (`Item_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `Admin_ID` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `Customer_ID` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pop_products`
--
ALTER TABLE `pop_products`
  MODIFY `Item_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

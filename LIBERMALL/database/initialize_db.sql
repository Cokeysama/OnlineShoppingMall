-- phpMyAdmin SQL Dump
-- version 5.0.2
-- Host: 127.0.0.1
-- Generation Time: Mar 7, 2020 at 02:40 PM
-- Server version: 10.4.11
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

CREATE TABLE `Administrator` (
  `AdminID` varchar(20) PRIMARY KEY,
  `Password` varchar(20) NOT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

 INSERT INTO `Administrator` (`AdminID`, `Password`) VALUES
('liuyuan', '123456');

-- --------------------------------------------------------

CREATE TABLE `Account` (
  `Username` varchar(20) PRIMARY KEY,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Age` int(10) NOT NULL,
  `Gender` varchar(5) NOT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

CREATE TABLE `Products` (
  `SKU` varchar(10) PRIMARY KEY,
  `Name` varchar(50) NOT NULL,
  `Price` float NOT NULL,
  `Image` varchar(300) NOT NULL,
  `Inventory` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

INSERT INTO `Products` (`SKU`, `Name`, `Price`, `Image`, `Inventory`) VALUES
('001', '鼠标', 150, 'mouse.jpg', 99),
('002', '耳机', 1900, 'headphone.jpg', 99),
('003', '移动硬盘', 500, 'external_hard_drive.jpg', 99),
('004', 'iphone', 5999, 'iphone.jpg', 99),
('005', '电子手表', 2400, 'watch.jpg', 99),
('006', '小型摄像头', 800, 'camera.jpg', 99),
('007', '帆布鞋', 450, 'shoe.jpg', 99),
('008', '手提包', 1199, 'bag.jpg', 99),
('009', '外套', 199, 'coat.jpg', 99);

-- --------------------------------------------------------

CREATE TABLE `Order` (
  `Ordernumber` int(10) PRIMARY KEY,
  `Username` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  FOREIGN KEY(Username) REFERENCES Account(Username) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

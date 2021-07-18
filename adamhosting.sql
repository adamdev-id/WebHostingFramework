-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2021 at 07:04 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adamhosting`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Birthdate` date NOT NULL,
  `Packages` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Username`, `Password`, `Email`, `Birthdate`, `Packages`) VALUES
('ahmad', '123456', 'ahmad@gmail.com', '2001-06-17', ''),
('andi', '123456', 'andi@gmail.com', '2001-01-01', ''),
('farhan', 'farhan123', 'farhan@gmail.com', '2001-08-22', '');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `ID` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Birthdate` date NOT NULL,
  `Job` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`ID`, `Name`, `Password`, `Birthdate`, `Job`) VALUES
('1', 'Adam', '123', '2001-07-05', 'CEO'),
('2', 'Najib', '', '2001-01-01', 'Administrator'),
('3', 'Slamet', '', '2000-01-01', 'Administrator'),
('4', 'Hapis', '', '2000-06-06', 'Cybersecurity'),
('5', 'Hendra', '', '2000-03-08', 'Customer Support'),
('6', 'Ahmad Burhan', '', '2021-06-19', 'Customer Support'),
('7', 'Roys', '', '2021-06-16', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `serverlist`
--

CREATE TABLE `serverlist` (
  `ID` varchar(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Category` varchar(10) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `serverlist`
--

INSERT INTO `serverlist` (`ID`, `Name`, `Category`, `Price`) VALUES
('DP_B1', 'Dedicated Premium', 'Premium', 65000),
('DR_A1', 'Dedicated Regular', 'Regular', 55000),
('P_B1', 'Premium 1', 'Premium', 35000),
('P_B2', 'Premium 2', 'Premium', 45000),
('R_A1', 'Regular 1', 'Regular', 15000),
('R_A2', 'Regular 2', 'Regular', 25000),
('R_A3', 'Regular 3', 'Regular', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `ID` int(10) NOT NULL,
  `Package_ID` varchar(10) NOT NULL,
  `Customer_ID` varchar(20) NOT NULL,
  `Payment` varchar(100) NOT NULL,
  `Coupon` varchar(20) NOT NULL,
  `Total` int(11) NOT NULL,
  `Purchase_Date` date NOT NULL,
  `Expired_Date` date NOT NULL,
  `Upgrade_Package` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`ID`, `Package_ID`, `Customer_ID`, `Payment`, `Coupon`, `Total`, `Purchase_Date`, `Expired_Date`, `Upgrade_Package`) VALUES
(1, 'DP_B1', 'ahmad', 'PayPal', '', 65000, '2021-07-05', '2021-10-05', 'UPPREM1'),
(2, 'DP_B1', 'andi', 'VISA / Mastercard', 'Holiday2020', 50000, '2021-07-05', '2021-10-05', 'None'),
(3, 'R_A1', 'andi', 'PayPal', '', 15000, '2021-07-18', '2022-05-18', 'None'),
(4, 'P_B1', 'farhan', 'Visa / Mastercard', 'Holiday', 30000, '2020-02-12', '2020-05-12', 'None'),
(5, 'R_A1', 'ahmad', 'PayPal', '', 15000, '2020-01-01', '2020-04-01', 'UPPREM2'),
(6, 'DP_B1', 'andi', 'Card', '', 65000, '2021-07-18', '2021-10-18', 'None'),
(9, 'DR_A1', 'farhan', 'PayPal', '', 55000, '2021-07-18', '2021-08-18', 'None'),
(10, 'DR_A1', 'farhan', 'PayPal', '', 44550, '2021-07-18', '2021-10-18', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `upgrade`
--

CREATE TABLE `upgrade` (
  `ID` int(11) NOT NULL,
  `Upgrade_ID` varchar(10) NOT NULL,
  `Purchase_Date` date NOT NULL,
  `Payment` varchar(100) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upgrade`
--

INSERT INTO `upgrade` (`ID`, `Upgrade_ID`, `Purchase_Date`, `Payment`, `Total`) VALUES
(1, 'UPPREM1', '2021-07-18', 'PayPal', 15000),
(5, 'UPPREM2', '2021-07-18', 'Card', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `upgrade_parts`
--

CREATE TABLE `upgrade_parts` (
  `ID` varchar(10) NOT NULL,
  `RAM` varchar(10) NOT NULL,
  `Storage` varchar(10) NOT NULL,
  `CPU` varchar(10) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upgrade_parts`
--

INSERT INTO `upgrade_parts` (`ID`, `RAM`, `Storage`, `CPU`, `Price`) VALUES
('UPPREM1', '3 GB', '15 GB', '2 Cores', 15000),
('UPPREM2', '4 GB', '20 GB', '4 Cores', 20000),
('UPREG1', '1 GB', '5 GB', 'Inherit', 5000),
('UPREG2', '2 GB', '10 GB', 'Inherit', 10000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `serverlist`
--
ALTER TABLE `serverlist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_SERVER_ID` (`Package_ID`),
  ADD KEY `FK_CUSTOMER_ID` (`Customer_ID`) USING BTREE;

--
-- Indexes for table `upgrade`
--
ALTER TABLE `upgrade`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Upgrade_ID` (`Upgrade_ID`);

--
-- Indexes for table `upgrade_parts`
--
ALTER TABLE `upgrade_parts`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `FK_CUSTOMER_ID` FOREIGN KEY (`Customer_ID`) REFERENCES `customers` (`Username`),
  ADD CONSTRAINT `FK_SERVER_ID` FOREIGN KEY (`Package_ID`) REFERENCES `serverlist` (`ID`);

--
-- Constraints for table `upgrade`
--
ALTER TABLE `upgrade`
  ADD CONSTRAINT `FK_Transaction_ID` FOREIGN KEY (`ID`) REFERENCES `transaction` (`ID`),
  ADD CONSTRAINT `FK_Upgrade_ID` FOREIGN KEY (`Upgrade_ID`) REFERENCES `upgrade_parts` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

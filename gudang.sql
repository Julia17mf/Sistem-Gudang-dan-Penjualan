-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2020 at 05:29 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bag`
--

CREATE TABLE `bag` (
  `id_bag` int(11) NOT NULL,
  `id_bag_type` int(11) NOT NULL,
  `id_bag_model` int(11) NOT NULL,
  `bag_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bag`
--

INSERT INTO `bag` (`id_bag`, `id_bag_type`, `id_bag_model`, `bag_price`) VALUES
(1, 1, 1, 500000),
(2, 1, 2, 750000),
(3, 2, 1, 300000),
(4, 2, 2, 400000);

-- --------------------------------------------------------

--
-- Table structure for table `bag_model`
--

CREATE TABLE `bag_model` (
  `id_bag_model` int(11) NOT NULL,
  `bag_model` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bag_model`
--

INSERT INTO `bag_model` (`id_bag_model`, `bag_model`) VALUES
(1, 'Ransel'),
(2, 'Genggam');

-- --------------------------------------------------------

--
-- Table structure for table `bag_type`
--

CREATE TABLE `bag_type` (
  `id_bag_type` int(11) NOT NULL,
  `bag_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bag_type`
--

INSERT INTO `bag_type` (`id_bag_type`, `bag_type`) VALUES
(1, 'Tas Kulit'),
(2, 'Tas Rajut');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id_bag` int(11) NOT NULL,
  `bag_qty` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `id_month` varchar(2) NOT NULL,
  `month` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`id_month`, `month`) VALUES
('01', 'Januari'),
('02', 'Februari'),
('03', 'Maret'),
('04', 'April'),
('05', 'Mei'),
('06', 'Juni'),
('07', 'Juli'),
('08', 'Agustus'),
('09', 'September'),
('10', 'Oktober'),
('11', 'November'),
('12', 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id_sale` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id_sale`, `date`) VALUES
(3, '2020-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `sale_report`
--

CREATE TABLE `sale_report` (
  `id_sale` int(11) NOT NULL,
  `id_bag` int(11) NOT NULL,
  `bag_qty` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale_report`
--

INSERT INTO `sale_report` (`id_sale`, `id_bag`, `bag_qty`, `total`) VALUES
(3, 1, 2, 1000000),
(3, 2, 2, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `code` int(11) NOT NULL,
  `type_code` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`code`, `type_code`, `qty`) VALUES
(11, 1, 3),
(12, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `stock_report`
--

CREATE TABLE `stock_report` (
  `type_code` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_report`
--

INSERT INTO `stock_report` (`type_code`, `qty`, `price`, `total`, `date`) VALUES
(1, 1, 10000, 10000, '2020-04-19'),
(1, 2, 5000, 10000, '2020-04-19'),
(2, 3, 2000, 6000, '2020-04-19'),
(2, 2, 10000, 20000, '2020-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_code` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_code`, `type`) VALUES
(1, 'Kulit'),
(2, 'Benang');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_akun`, `username`, `password`) VALUES
(1, 'user1', 'user1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `bag`
--
ALTER TABLE `bag`
  ADD PRIMARY KEY (`id_bag`),
  ADD KEY `fk_id_bag_type` (`id_bag_type`),
  ADD KEY `fk_id_bag_model` (`id_bag_model`);

--
-- Indexes for table `bag_model`
--
ALTER TABLE `bag_model`
  ADD PRIMARY KEY (`id_bag_model`);

--
-- Indexes for table `bag_type`
--
ALTER TABLE `bag_type`
  ADD PRIMARY KEY (`id_bag_type`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD KEY `fk_id_bag` (`id_bag`);

--
-- Indexes for table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`id_month`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id_sale`);

--
-- Indexes for table `sale_report`
--
ALTER TABLE `sale_report`
  ADD KEY `fk_id_sale` (`id_sale`),
  ADD KEY `fk_id_bag_sale` (`id_bag`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`code`),
  ADD KEY `fk_type_code` (`type_code`);

--
-- Indexes for table `stock_report`
--
ALTER TABLE `stock_report`
  ADD KEY `fk_type_code_stock` (`type_code`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_akun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id_sale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bag`
--
ALTER TABLE `bag`
  ADD CONSTRAINT `fk_id_bag_model` FOREIGN KEY (`id_bag_model`) REFERENCES `bag_model` (`id_bag_model`),
  ADD CONSTRAINT `fk_id_bag_type` FOREIGN KEY (`id_bag_type`) REFERENCES `bag_type` (`id_bag_type`);

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_id_bag` FOREIGN KEY (`id_bag`) REFERENCES `bag` (`id_bag`);

--
-- Constraints for table `sale_report`
--
ALTER TABLE `sale_report`
  ADD CONSTRAINT `fk_id_bag_sale` FOREIGN KEY (`id_bag`) REFERENCES `bag` (`id_bag`),
  ADD CONSTRAINT `fk_id_sale` FOREIGN KEY (`id_sale`) REFERENCES `sale` (`id_sale`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_type_code` FOREIGN KEY (`type_code`) REFERENCES `type` (`type_code`);

--
-- Constraints for table `stock_report`
--
ALTER TABLE `stock_report`
  ADD CONSTRAINT `fk_type_code_stock` FOREIGN KEY (`type_code`) REFERENCES `type` (`type_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

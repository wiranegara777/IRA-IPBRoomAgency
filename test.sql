-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2018 at 10:49 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_room`
--

CREATE TABLE `order_room` (
  `id_order` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pj` int(11) NOT NULL,
  `sum_price` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_room`
--

INSERT INTO `order_room` (`id_order`, `id_room`, `id_user`, `id_pj`, `sum_price`, `duration`, `date`, `month`, `year`, `payment`) VALUES
(1, 3, 10, 10, 18000, 3, 17, 3, 2018, 1),
(2, 6, 10, 10, 16000, 2, 19, 3, 2018, 1),
(4, 3, 3, 10, 12000, 2, 2, 4, 2018, 1),
(5, 1, 3, 10, 4000, 2, 28, 3, 2018, 1),
(6, 8, 3, 10, 54000, 6, 14, 4, 2018, 2);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id_room` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `address` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id_room`, `id_user`, `title`, `body`, `address`, `image`, `lat`, `lng`, `price`) VALUES
(1, 10, 'sd', '<p>assahsa</p>\r\n', 'sa', 'img/032120180303pm.png', -6.599825, 106.801331, 2000),
(2, 10, 'yoshhhh', '<p>asjfhbskjf</p>\r\n', 'djkaszd', 'img/032120180306pm.jpg', -6.600848, 106.803047, 5000),
(3, 10, 'LoGue', '<p>ini adlah sesuatu yang harus dilupakan olehmu nak ahaha</p>\r\n', 'Bogor Agricultural', 'img/032720180124am.png', -6.596414, 106.799614, 6000),
(5, 10, 'tes2', '<p>Midtrans are the</p>\r\n', 'Jakarta', 'img/032920180700pm.PNG', -6.596909, 106.797173, 7000),
(6, 10, 'qwertty', '<p>adasdasd</p>\r\n', 'asdasd', 'img/032920180704pm.jpg', -6.561651, 106.769745, 8000),
(8, 10, 'sadas', '<p>dasdasd</p>\r\n', 'dasdas', 'img/032920180700pm.PNG', -6.572224, 106.692154, 9000),
(9, 10, 'ganteng', '<p>ini</p>\r\n', 'lampung', 'img/032920180704pm.jpg', -6.568131, 106.675842, 1000),
(10, 10, 'dia', '<p>asdasdasdasdxzc</p>\r\n', 'qweq', 'img/032920180708pm.jpg', -6.620312, 106.728714, 1000),
(11, 10, 'polo', '<p>testsetfgfdg</p>\r\n', 'dimana', 'img/033020180137pm.jpg', -6.597462, 106.803734, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `departemen` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `nim`, `phone`, `departemen`, `level`) VALUES
(2, 'Furqan', 'furqan@gmail.com', 'qwerty', 'G641500589', '', 'FEM', 2),
(3, 'Sultanzz', 'sultan@sultan.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'G6450087', '', 'Ilkom', 2),
(10, 'wira', 'muhammadwiranegara777@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'G64150058', '', 'Ilkom', 1),
(11, 'ira', 'ipbroomagency@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'g641', '', 'G6', 2),
(12, 'Wira ganteng', 'haha@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', '0812', '', 3),
(13, 'Wira ganteng 2', 'haha2@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', '0812', '', 3),
(21, 'weeaw', 'aa@ddd.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', '123456', '', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_room`
--
ALTER TABLE `order_room`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_room`
--
ALTER TABLE `order_room`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

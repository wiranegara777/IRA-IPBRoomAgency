-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2018 at 01:37 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

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
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pj` int(11) NOT NULL,
  `conversation` text NOT NULL,
  `dates` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id_message`, `id_user`, `id_pj`, `conversation`, `dates`, `sender`) VALUES
(1, 3, 10, 'hey pak wira', '2018-04-11 07:04:36', 1),
(3, 3, 10, 'hmm', '2018-04-15 11:22:59', 1),
(4, 3, 9, 'tes', '2018-04-15 11:39:34', 0),
(5, 3, 10, 'Apa sul?', '2018-04-15 12:18:55', 0),
(6, 11, 10, 'Assalamu\'alaikum apakah aman?', '2018-04-15 12:22:06', 1),
(7, 11, 10, 'Disini sudah ada apa saja pak?', '2018-04-15 12:22:25', 1),
(8, 11, 10, 'Ada macem-macem sih ra', '2018-04-15 12:23:35', 0),
(9, 3, 10, 'WOY jawab nape', '2018-04-15 21:09:53', 0),
(10, 3, 10, 'eh ', '2018-04-17 23:21:31', 1),
(11, 3, 10, 'cups', '2018-04-17 23:23:06', 1),
(12, 3, 10, 'tes wir', '2018-04-17 23:23:57', 1),
(13, 3, 10, 'apaan sih lu', '2018-04-17 23:26:01', 1),
(14, 3, 10, 'berisik jing', '2018-04-17 23:28:27', 0),
(15, 3, 10, 'berisik jing2', '2018-04-17 23:31:29', 0),
(16, 3, 10, 'berisik jing3', '2018-04-17 23:32:20', 0),
(17, 0, 10, 'berisik 4', '2018-04-17 23:34:00', 0),
(18, 3, 10, 'berisik 4', '2018-04-17 23:34:59', 0),
(19, 3, 10, 'dih gajelas', '2018-04-17 23:35:45', 1),
(20, 3, 10, 'biasa dong gausah ngegas', '2018-04-17 23:36:12', 0),
(21, 10, 10, 'oy', '2018-04-20 13:58:01', 0),
(22, 11, 10, 'HOY', '2018-04-20 14:27:24', 1),
(23, 11, 10, 'Oy sultan', '2018-04-20 14:27:49', 0),
(24, 11, 10, 'ape', '2018-04-20 14:27:54', 1),
(25, 11, 10, 'iya sini aja', '2018-04-20 14:28:04', 0);

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
(6, 8, 3, 10, 54000, 6, 14, 4, 2018, 2),
(7, 9, 11, 10, 3000, 3, 17, 4, 2018, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id_rating`, `id_user`, `id_room`, `rating`, `comment`) VALUES
(1, 10, 2, 3, 'hhaaa'),
(2, 10, 2, 3, 'hhaaa'),
(3, 10, 1, 4, 'hehehe'),
(4, 10, 1, 4, 'hehehe'),
(5, 10, 1, 2, 'hehehe');

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
  `price` int(11) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `fakultas` varchar(255) NOT NULL,
  `fasilitas` text NOT NULL,
  `kapasitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id_room`, `id_user`, `title`, `body`, `address`, `image`, `lat`, `lng`, `price`, `image2`, `image3`, `fakultas`, `fasilitas`, `kapasitas`) VALUES
(1, 10, 'RK.X303', '<p>assahsa</p>\r\n', 'sa', 'img/032120180303pm.png', -6.599825, 106.801331, 2000, 'img/032720180124am.png', 'img/032720180124am.png', 'FMIPA', 'AC,proyektor,Kursi', 200),
(2, 10, 'Audit Mandiri', '<p>asjfhbskjf</p>\r\n', 'djkaszd', 'img/032120180306pm.jpg', -6.600848, 106.803047, 5000, 'img/032720180124am.png', 'img/032720180124am.png', 'FAHUTAN', 'AC,proyektor,Kursi', 200),
(3, 10, 'Audit PPKU', '<p>ini adlah sesuatu yang harus dilupakan olehmu nak ahaha</p>\r\n', 'Bogor Agricultural', 'img/032720180124am.png', -6.596414, 106.799614, 6000, 'img/032720180124am.png', 'img/032720180124am.png', 'FAHUTAN', 'AC,proyektor,Kursi', 200),
(5, 10, 'RK.U201', '<p>Midtrans are the</p>\r\n', 'Jakarta', 'img/032920180700pm.PNG', -6.596909, 106.797173, 7000, 'img/032720180124am.png', 'img/032720180124am.png', 'FATETA', 'AC,proyektor,Kursi', 200),
(6, 10, 'FAC.207', '<p>adasdasd</p>\r\n', 'asdasd', 'img/032920180704pm.jpg', -6.561651, 106.769745, 8000, 'img/032720180124am.png', 'img/032720180124am.png', 'FMIPA', 'AC,proyektor,Kursi', 200),
(8, 10, 'LSI', '<p>dasdasd</p>\r\n', 'dasdas', 'img/032920180700pm.PNG', -6.572224, 106.692154, 9000, 'img/032720180124am.png', 'img/032720180124am.png', 'FMIPA', 'AC,proyektor,Kursi', 200),
(9, 10, 'Rektorat', '<p>ini</p>\r\n', 'lampung', 'img/032920180704pm.jpg', -6.568131, 106.675842, 1000, 'img/032720180124am.png', 'img/032720180124am.png', 'FPIK', 'AC,proyektor,Kursi', 200),
(10, 10, 'R.Sidang Ilkom IPB', '<p>asdasdasdasdxzc</p>\r\n', 'qweq', 'img/032920180708pm.jpg', -6.620312, 106.728714, 1000, 'img/032720180124am.png', 'img/032720180124am.png', 'PPKU', 'AC,proyektor,Kursi', 200),
(11, 10, 'Audit AHN', '<p>testsetfgfdg</p>\r\n', 'dimana', 'img/033020180137pm.jpg', -6.597462, 106.803734, 50000, 'img/032720180124am.png', 'img/032720180124am.png', 'UMUM', 'AC,proyektor,Kursi', 200),
(13, 2, 'RK.X304', '<p>dfgdgg</p>\r\n', 'dasd', 'img/043020180117am.jpg', -6.598461, 106.702110, 1000, 'img/043020180117am.jpg', 'img/043020180117am.jpg', 'dasd', 'sad', 30),
(14, 2, 'RK.X30455', '<p>dfgdgg</p>\r\n', 'dasd', 'img/043020180122am.jpg', -6.598461, 106.702110, 1000, 'img/043020180122am.jpg', 'img/043020180122am.jpg', 'dasd', 'sad', 30),
(15, 2, 'RKRKRKR', '<p>dfgdgg</p>\r\n', 'dasd', 'img/043020180127am.jpg', -6.639385, 106.561005, 1000, 'img/social_share_room.jpg', 'img/DeluxeSuite_FINAL_large.jpg', 'dasd', 'sad', 30);

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
  `level` int(11) NOT NULL,
  `fakultas` varchar(255) NOT NULL,
  `angkatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `nim`, `phone`, `departemen`, `level`, `fakultas`, `angkatan`) VALUES
(2, 'Furqan', 'furqan@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'G641500589', '', 'FEM', 1, '', ''),
(3, 'Sultanzz', 'sultan@sultan.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'G6450087', '', 'Ilkom', 2, '', ''),
(10, 'wira', 'muhammadwiranegara777@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'G64150058', '', 'Ilkom', 1, '', ''),
(11, 'ira', 'ipbroomagency@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'g641', '', 'G6', 2, '', ''),
(12, 'Wira ganteng', 'haha@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', '0812', '', 3, '', ''),
(13, 'Wira ganteng 2', 'haha2@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', '0812', '', 3, '', ''),
(21, 'weeaw', 'aa@ddd.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', '123456', '', 3, '', ''),
(24, 'Muhammad Wiranegara Girinata', 'wiranegara_777@apps.ipb.ac.id', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'G64150058', '35235234623', 'Ilmu Komputer', 2, 'FMIPA', '2015');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Indexes for table `order_room`
--
ALTER TABLE `order_room`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

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
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_room`
--
ALTER TABLE `order_room`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-10-19 17:36:02
-- 伺服器版本: 10.1.21-MariaDB
-- PHP 版本： 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `ci03`
--

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `p_name` varchar(250) NOT NULL,
  `p_price` varchar(30) NOT NULL,
  `p_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`p_id`, `cat_id`, `p_name`, `p_price`, `p_image`) VALUES
(1, 2, 'sneakers01', '79.00', 'sneakers01.png'),
(2, 1, 'sneakers02', '89.00', 'sneakers02.png'),
(3, 2, 'sneakers03', '129.00', 'sneakers03.png'),
(4, 1, 'sneakers04', '59.00', 'sneakers04.png'),
(5, 3, 'sneakers05', '80.00', 'sneakers05.png'),
(9, 3, 'sneakers06', '77.00', 'sneakers06.png'),
(10, 1, 'sneakers07', '138.00', 'sneakers07.png');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

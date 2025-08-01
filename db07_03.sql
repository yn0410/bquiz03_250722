-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-08-01 08:02:14
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db07_03`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL COMMENT '電影片名',
  `level` int(1) UNSIGNED NOT NULL COMMENT '分級',
  `length` int(10) UNSIGNED NOT NULL COMMENT '時長',
  `ondate` date NOT NULL COMMENT '上映日期',
  `publish` text NOT NULL COMMENT '發行商',
  `director` text NOT NULL COMMENT '導演',
  `trailer` text NOT NULL COMMENT '預告影片',
  `poster` text NOT NULL COMMENT '電影海報',
  `intro` text NOT NULL COMMENT '劇情簡介',
  `sh` int(1) NOT NULL COMMENT '顯示?',
  `rank` int(10) UNSIGNED NOT NULL COMMENT '排序'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movies`
--

INSERT INTO `movies` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `trailer`, `poster`, `intro`, `sh`, `rank`) VALUES
(1, '院線片01', 1, 120, '2025-07-30', '院線片01的發行商', '院線片01的導演', '03B01v.mp4', '03B01.png', '院線片01的劇情簡介院線片01的劇情簡介院線片01的劇情簡介院線片01的劇情簡介院線片01的劇情簡介院線片01的劇情簡介院線片01的劇情簡介院線片01的劇情簡介', 1, 2),
(2, '院線片02', 2, 90, '2025-07-31', '院線片02的發行商', '院線片02的導演', '03B02v.mp4', '03B02.png', '院線片02劇情簡介,院線片02劇情簡介院線片02劇情簡介', 1, 3),
(3, '院線片03333', 3, 90, '2025-08-01', '院線片03的發行商', '院線片03的導演', '03B03v.mp4', '03B03.png', '院線片03的劇情簡介', 1, 1),
(4, '院線片04', 4, 90, '2025-08-01', '院線片04的發行商', '院線片04的導演', '03B04v.mp4', '03B04.png', '院線片04的劇情簡介', 1, 4),
(5, '院線片05', 1, 90, '2025-07-31', '院線片05的發行商', '院線片05的導演', '03B05v.mp4', '03B05.png', '院線片05的劇情簡介', 1, 5),
(6, '院線片06', 2, 90, '2025-07-30', '院線片06的發行商', '院線片06的導演', '03B06v.mp4', '03B06.png', '院線片06的劇情簡介', 1, 6),
(7, '院線片07', 3, 90, '2025-07-27', '院線片07的發行商', '院線片07的導演', '03B07v.mp4', '03B07.png', '院線片07的劇情簡介', 1, 7),
(8, '院線片08', 4, 90, '2025-07-24', '院線片08的發行商', '院線片08的導演', '03B08v.mp4', '03B08.png', '院線片08的劇情簡介', 1, 8),
(9, '院線片09', 1, 90, '2025-07-24', '院線片09的發行商', '院線片09的導演', '03B09v.mp4', '03B09.png', '院線片09的劇情簡介', 1, 9),
(11, '院線片11', 3, 90, '2025-07-24', '院線片11的發行商', '院線片11的導演', '03B11v.mp4', '03B11.png', '院線片11的劇情簡介', 1, 11),
(12, '院線片12', 4, 90, '2025-07-24', '院線片12的發行商', '院線片12的導演', '03B12v.mp4', '03B12.png', '院線片12的劇情簡介', 1, 12),
(14, 'F1', 3, 180, '2025-07-27', 'f1的發行商', 'F1的導演', '03B25v.mp4', '03B25.png', 'F1車車', 1, 13);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie` text NOT NULL COMMENT '電影名稱',
  `date` date NOT NULL COMMENT '日期',
  `session` text NOT NULL COMMENT '場次時間',
  `tickets` int(10) UNSIGNED NOT NULL COMMENT '訂購數量',
  `seats` text NOT NULL COMMENT '座位(排/號)',
  `no` text NOT NULL COMMENT '訂單編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `movie`, `date`, `session`, `tickets`, `seats`, `no`) VALUES
(1, '院線片03333', '2025-08-01', '14:00~16:00', 4, 'a:4:{i:0;s:1:\"0\";i:1;s:1:\"1\";i:2;s:1:\"2\";i:3;s:1:\"3\";}', '202508010001'),
(2, '院線片02', '2025-08-02', '22:00~24:00', 1, 'a:1:{i:0;s:2:\"19\";}', '202508010002'),
(3, '院線片05', '2025-08-02', '18:00~20:00', 3, 'a:3:{i:0;s:1:\"7\";i:1;s:2:\"12\";i:2;s:2:\"17\";}', '202508010003');

-- --------------------------------------------------------

--
-- 資料表結構 `posters`
--

CREATE TABLE `posters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL COMMENT '排序?',
  `ani` int(1) UNSIGNED NOT NULL COMMENT '動畫'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `posters`
--

INSERT INTO `posters` (`id`, `name`, `img`, `sh`, `rank`, `ani`) VALUES
(1, '預告片01', '03A01.jpg', 1, 1, 2),
(3, '預告片三', '03A03.jpg', 1, 3, 1),
(4, '預告片二', '03A02.jpg', 1, 4, 3),
(5, '預告片四', '03A04.jpg', 1, 5, 2),
(6, '預告片五', '03A05.jpg', 1, 6, 1),
(7, '預告片六', '03A06.jpg', 1, 7, 3);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `posters`
--
ALTER TABLE `posters`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `posters`
--
ALTER TABLE `posters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

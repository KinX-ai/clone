-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 22, 2020 lúc 04:55 AM
-- Phiên bản máy phục vụ: 5.6.38
-- Phiên bản PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `block_ip`
--

CREATE TABLE `block_ip` (
  `id` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `block_ip`
--

INSERT INTO `block_ip` (`id`, `ip`, `time`) VALUES
(1, '1.1.1.1', '1111-11-11 11:11:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sim`
--

CREATE TABLE `sim` (
  `stt` int(32) NOT NULL,
  `ask` varchar(5000) NOT NULL,
  `ans` varchar(5000) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sim`
--

INSERT INTO `sim` (`stt`, `ask`, `ans`, `ip`, `time`) VALUES
(1, 'xin chào', 'Dạ simsimi chào anh/chị ạ', '', '0000-00-00 00:00:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sim`
--
ALTER TABLE `sim`
  ADD PRIMARY KEY (`stt`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `sim`
--
ALTER TABLE `sim`
  MODIFY `stt` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9582;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

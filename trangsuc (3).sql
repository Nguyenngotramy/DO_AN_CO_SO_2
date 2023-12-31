-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 31, 2023 lúc 04:39 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `trangsuc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`, `categoryImage`) VALUES
(1, 'Rings', '../view/image/rings.png'),
(2, 'Earrings', '../view/image/earrings.png'),
(3, 'Bracelets', '../view/image/bracelet.png'),
(4, 'Necklaces', '../view/image/necklace.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `colorID` int(11) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`colorID`, `color`) VALUES
(1, 'yellow'),
(2, 'red'),
(3, 'blue'),
(4, 'green');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `material`
--

CREATE TABLE `material` (
  `materialID` int(11) NOT NULL,
  `materialName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `material`
--

INSERT INTO `material` (`materialID`, `materialName`) VALUES
(1, 'gold'),
(2, 'silver');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `idOrder` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL,
  `orderNotes` text NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`idOrder`, `userID`, `firstName`, `lastName`, `address`, `phoneNumber`, `orderNotes`, `date`, `status`) VALUES
(1, 12, 'hahah', 'hyhy', 'dadadadada', '0123456789', 'adadadadad', '2023-12-31', 0),
(2, 12, 'hanhi', 'nguyen', '17 Phú Lộc 15', '0702192094', 'Gói hàng cho kĩ dô', '2023-12-31', 0),
(3, 12, 'hanhiii', 'nguyen', '17 Phú Lộc 15', '0123456789', 'hehehe', '2023-12-31', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL,
  `idProductDetails` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `idOrder`, `idProductDetails`, `quantity`) VALUES
(1, 1, 8, 1),
(2, 2, 19, 1),
(3, 2, 26, 1),
(4, 3, 147, 1),
(5, 3, 9, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productdetails`
--

CREATE TABLE `productdetails` (
  `id` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `materialID` int(20) NOT NULL,
  `sizeID` int(11) DEFAULT NULL,
  `colorID` int(20) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `productdetails`
--

INSERT INTO `productdetails` (`id`, `productID`, `materialID`, `sizeID`, `colorID`, `weight`, `quantity`, `price`) VALUES
(1, 1, 1, 1, 1, 10, 50, 560.12),
(2, 1, 1, 2, 1, 10, 50, 560.12),
(3, 1, 1, 1, 2, 10, 50, 560.12),
(4, 1, 1, 2, 2, 10, 50, 560.12),
(5, 1, 1, 1, 3, 10, 50, 560.12),
(6, 1, 1, 2, 3, 10, 50, 560.12),
(7, 2, 2, 1, 1, 10, 70, 500.12),
(8, 2, 2, 2, 1, 10, 90, 500.12),
(9, 2, 2, 1, 2, 10, 70, 500.12),
(10, 2, 2, 2, 2, 10, 70, 500.12),
(11, 2, 2, 1, 3, 10, 70, 500.12),
(12, 2, 2, 2, 3, 10, 70, 500.12),
(13, 3, 1, 1, 1, 10, 50, 400.12),
(14, 3, 1, 2, 1, 10, 50, 400.12),
(15, 3, 1, 3, 1, 10, 50, 400.12),
(16, 3, 1, 1, 2, 10, 50, 400.12),
(17, 3, 1, 2, 2, 10, 50, 400.12),
(18, 3, 1, 3, 2, 10, 50, 400.12),
(19, 3, 1, 1, 4, 10, 50, 400.12),
(20, 3, 1, 2, 4, 10, 50, 400.12),
(21, 3, 1, 3, 4, 10, 50, 400.12),
(22, 4, 1, 1, 1, 10, 50, 600.48),
(23, 4, 1, 2, 1, 10, 50, 600.48),
(24, 4, 1, 1, 2, 10, 50, 600.48),
(25, 4, 1, 2, 2, 10, 50, 600.48),
(26, 4, 1, 1, 3, 10, 50, 600.48),
(27, 4, 1, 2, 3, 10, 50, 600.48),
(28, 8, 2, 1, 1, 10, 50, 500.12),
(29, 8, 2, 2, 1, 10, 50, 500.12),
(30, 8, 2, 1, 2, 10, 50, 500.12),
(31, 8, 2, 2, 2, 10, 50, 500.12),
(32, 8, 2, 1, 3, 10, 50, 500.12),
(33, 8, 2, 2, 3, 10, 50, 500.12),
(34, 10, 2, 1, 1, 10, 50, 400.12),
(35, 10, 2, 2, 1, 10, 50, 400.12),
(36, 10, 2, 3, 1, 10, 50, 400.12),
(37, 10, 2, 1, 2, 10, 50, 400.12),
(38, 10, 2, 2, 2, 10, 50, 400.12),
(39, 10, 2, 3, 2, 10, 50, 400.12),
(40, 10, 2, 1, 4, 10, 50, 400.12),
(41, 10, 2, 2, 4, 10, 50, 400.12),
(42, 10, 2, 3, 4, 10, 50, 400.12),
(43, 11, 1, 1, 1, 10, 50, 300.12),
(45, 11, 1, 1, 2, 10, 50, 300.12),
(48, 11, 1, 1, 3, 10, 50, 300.12),
(49, 12, 1, 1, 2, 10, 50, 350.12),
(51, 12, 1, 1, 1, 10, 50, 350.12),
(52, 12, 1, 1, 3, 10, 50, 350.12),
(53, 13, 1, 1, 2, 10, 50, 480.12),
(54, 13, 1, 2, 2, 10, 50, 480.12),
(55, 13, 1, 3, 2, 10, 50, 480.12),
(56, 13, 1, 1, 4, 10, 50, 480.12),
(57, 13, 1, 2, 4, 10, 50, 480.12),
(58, 13, 1, 3, 4, 10, 50, 480.12),
(59, 14, 2, 1, 1, 10, 50, 560.12),
(61, 14, 2, 1, 3, 10, 50, 560.12),
(63, 15, 2, 1, 1, 10, 50, 500.12),
(65, 15, 2, 1, 3, 10, 50, 500.12),
(66, 15, 2, 1, 2, 10, 50, 500.12),
(67, 16, 2, 1, 1, 10, 50, 400.12),
(72, 16, 2, 1, 2, 10, 50, 400.12),
(73, 17, 1, 4, 1, 10, 50, 560.12),
(74, 17, 1, 5, 1, 10, 50, 560.12),
(75, 17, 1, 4, 2, 10, 50, 560.12),
(76, 17, 1, 5, 2, 10, 50, 560.12),
(77, 17, 1, 4, 3, 10, 50, 560.12),
(78, 17, 1, 5, 3, 10, 50, 560.12),
(79, 18, 2, 4, 2, 10, 50, 500.12),
(80, 18, 2, 5, 2, 10, 50, 500.12),
(81, 18, 2, 4, 3, 10, 50, 500.12),
(82, 18, 2, 5, 3, 10, 50, 500.12),
(83, 19, 1, 4, 1, 10, 50, 400.12),
(84, 19, 1, 5, 1, 10, 50, 400.12),
(85, 19, 1, 6, 1, 10, 50, 400.12),
(86, 19, 1, 4, 2, 10, 50, 400.12),
(87, 19, 1, 5, 2, 10, 50, 400.12),
(88, 19, 1, 6, 2, 10, 50, 400.12),
(89, 19, 1, 4, 4, 10, 50, 400.12),
(90, 19, 1, 5, 4, 10, 50, 400.12),
(91, 19, 1, 6, 4, 10, 50, 400.12),
(92, 20, 2, 4, 1, 10, 50, 560.12),
(93, 20, 2, 5, 1, 10, 50, 560.12),
(94, 20, 2, 4, 2, 10, 50, 560.12),
(95, 20, 2, 5, 2, 10, 50, 560.12),
(96, 20, 2, 4, 3, 10, 50, 560.12),
(97, 20, 2, 5, 3, 10, 50, 560.12),
(98, 21, 2, 4, 2, 10, 50, 500.12),
(99, 21, 2, 5, 2, 10, 50, 500.12),
(100, 21, 2, 4, 3, 10, 50, 500.12),
(101, 21, 2, 5, 3, 10, 50, 500.12),
(102, 22, 2, 4, 1, 10, 50, 400.12),
(103, 22, 2, 5, 1, 10, 50, 400.12),
(104, 22, 2, 6, 1, 10, 50, 400.12),
(105, 22, 2, 4, 2, 10, 50, 400.12),
(106, 22, 2, 5, 2, 10, 50, 400.12),
(107, 22, 2, 6, 2, 10, 50, 400.12),
(108, 22, 2, 4, 4, 10, 50, 400.12),
(109, 22, 2, 5, 4, 10, 50, 400.12),
(110, 22, 2, 6, 4, 10, 50, 400.12),
(111, 23, 1, 7, 1, 10, 50, 560.12),
(112, 23, 1, 8, 1, 10, 50, 560.12),
(113, 23, 1, 7, 2, 10, 50, 560.12),
(114, 23, 1, 8, 2, 10, 50, 560.12),
(115, 23, 1, 7, 3, 10, 50, 560.12),
(116, 23, 1, 8, 3, 10, 50, 560.12),
(117, 24, 1, 9, 2, 10, 50, 500.12),
(118, 24, 1, 10, 2, 10, 50, 500.12),
(119, 24, 1, 9, 3, 10, 50, 500.12),
(120, 24, 1, 10, 3, 10, 50, 500.12),
(121, 25, 1, 7, 1, 10, 50, 400.12),
(122, 25, 1, 9, 1, 10, 50, 400.12),
(123, 25, 1, 8, 1, 10, 50, 400.12),
(124, 25, 1, 7, 2, 10, 50, 400.12),
(125, 25, 1, 9, 2, 10, 50, 400.12),
(126, 25, 1, 8, 2, 10, 50, 400.12),
(127, 25, 1, 7, 4, 10, 50, 400.12),
(128, 25, 1, 9, 4, 10, 50, 400.12),
(129, 25, 1, 8, 4, 10, 50, 400.12),
(130, 26, 2, 7, 1, 10, 50, 560.12),
(131, 26, 2, 8, 1, 10, 50, 560.12),
(132, 26, 2, 7, 2, 10, 50, 560.12),
(133, 26, 2, 8, 2, 10, 50, 560.12),
(134, 26, 2, 7, 3, 10, 50, 560.12),
(135, 26, 2, 8, 3, 10, 50, 560.12),
(136, 27, 2, 9, 2, 10, 50, 500.12),
(137, 27, 2, 10, 2, 10, 50, 500.12),
(138, 27, 2, 9, 3, 10, 50, 500.12),
(139, 27, 2, 10, 3, 10, 50, 500.12),
(140, 27, 2, 7, 1, 10, 50, 400.12),
(141, 27, 2, 9, 1, 10, 50, 400.12),
(142, 27, 2, 8, 1, 10, 50, 400.12),
(143, 27, 2, 7, 2, 10, 50, 400.12),
(144, 27, 2, 9, 2, 10, 50, 400.12),
(145, 27, 2, 8, 2, 10, 50, 400.12),
(146, 27, 2, 7, 4, 10, 50, 400.12),
(147, 27, 2, 9, 4, 10, 50, 400.12),
(148, 27, 2, 8, 4, 10, 50, 400.12),
(149, 30, 2, 6, 3, 3, 1, 1),
(150, 31, 1, 6, 2, 3, 1, 1),
(151, 31, 1, 10, 3, 3, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productimages`
--

CREATE TABLE `productimages` (
  `id` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `productimages`
--

INSERT INTO `productimages` (`id`, `productID`, `image`) VALUES
(1, 1, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/128/gnctxmy000460-nhan-vang-18k-dinh-da-citrine-pnj-1.png'),
(2, 1, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/128/gnctxmy000460-nhan-vang-18k-dinh-da-citrine-pnj-2.png'),
(3, 1, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/128/gnctxmy000460-nhan-vang-18k-dinh-da-citrine-pnj-3.png'),
(4, 1, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/128/gnctxmy000460-nhan-vang-18k-dinh-da-citrine-pnj-4.jpg'),
(5, 1, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/128/gnctxmy000460-nhan-vang-18k-dinh-da-citrine-pnj-5.jpg'),
(6, 2, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/119/snxmxmw060031-nhan-bac-dinh-da-pnjsilver-1.png'),
(7, 2, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/119/snxmxmw060031-nhan-bac-dinh-da-pnjsilver-2.png'),
(8, 2, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/119/snxmxmw060031-nhan-bac-dinh-da-pnjsilver-3.png'),
(9, 2, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/119/snxmxmw060031-nhan-bac-dinh-da-pnjsilver-4.jpg'),
(10, 2, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/119/snxmxmw060031-nhan-bac-dinh-da-pnjsilver-5.jpg'),
(11, 3, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/118/gnddddy000585-nhan-cuoi-kim-cuong-vang-18k-pnj-1.png'),
(12, 3, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/118/gnddddy000585-nhan-cuoi-kim-cuong-vang-18k-pnj-2.png'),
(13, 3, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/118/gnddddy000585-nhan-cuoi-kim-cuong-vang-18k-pnj-3.png'),
(14, 3, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/119/gnddddy000585-nhan-cuoi-kim-cuong-vang-18k-pnj-4.jpg'),
(15, 3, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/119/gnddddy000585-nhan-cuoi-kim-cuong-vang-18k-pnj-5.jpg'),
(16, 4, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/117/gnsp00w000060-nhan-cuoi-kim-cuong-vang-trang-14k-pnj-01.png'),
(17, 4, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/127/gnsp00w000060-nhan-cuoi-vang-trang-14k-dinh-da-saphire-pnj-true-love-2.png'),
(18, 4, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/127/gnsp00w000060-nhan-cuoi-vang-trang-14k-dinh-da-saphire-pnj-true-love-3.png'),
(19, 4, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/127/gnsp00w000060-nhan-cuoi-vang-trang-14k-dinh-da-saphire-pnj-true-love-4.jpg'),
(20, 4, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/127/gnsp00w000060-nhan-cuoi-vang-trang-14k-dinh-da-saphire-pnj-true-love-5.jpg'),
(21, 8, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/189/sp-gn0000w002804-nhan-cuoi-nam-vang-trang-14k-pnj-trau-cau-1.png'),
(22, 8, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/189/sp-gn0000w002804-nhan-cuoi-nam-vang-trang-14k-pnj-trau-cau-2.png'),
(23, 8, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/189/sp-gn0000w002804-nhan-cuoi-nam-vang-trang-14k-pnj-trau-cau-3.png'),
(24, 8, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/190/on-gn0000w002804-nhan-cuoi-nam-vang-trang-14k-pnj-trau-cau-1.jpg'),
(25, 8, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/190/on-gn0000w002804-nhan-cuoi-nam-vang-trang-14k-pnj-trau-cau-2.jpg'),
(26, 10, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/82/gnxmxmw001734-nhan-vang-trang-10k-dinh-da-ecz-swarovski-pnj-0001.png'),
(27, 10, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/82/gnxmxmw001734-nhan-vang-trang-10k-dinh-da-ecz-swarovski-pnj-1.png'),
(28, 10, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/82/gnxmxmw001734-nhan-vang-trang-10k-dinh-da-ecz-swarovski-pnj-2.png'),
(29, 10, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/82/gnxmxmw001734-nhan-vang-trang-10k-dinh-da-ecz-swarovski-pnj-3.jpg'),
(30, 11, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/190/sp-gbxmxmh000167-bong-tai-vang-10k-dinh-da-ecz-pnj-niem-tin-01.png'),
(31, 11, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/190/sp-gbxmxmh000167-bong-tai-vang-10k-dinh-da-ecz-pnj-niem-tin-02.png'),
(32, 11, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/189/on-gbxmxmh000167-bong-tai-vang-10k-dinh-da-ecz-pnj-niem-tin-1.jpg'),
(33, 11, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/189/on-gbxmxmh000167-bong-tai-vang-10k-dinh-da-ecz-pnj-niem-tin-2.jpg'),
(34, 11, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/189/on-gbxmxmh000167-bong-tai-vang-10k-dinh-da-ecz-pnj-niem-tin-3.jpg'),
(35, 12, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/188/sp-gb0000y002623-bong-tai-vang-24k-pnj-1.png'),
(36, 12, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/188/sp-gb0000y002623-bong-tai-vang-24k-pnj-2.png'),
(37, 12, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/188/on-gb0000y002623-bong-tai-vang-24k-pnj-1.jpg'),
(38, 12, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/188/on-gb0000y002623-bong-tai-vang-24k-pnj-2.jpg'),
(39, 12, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/188/on-gb0000y002623-bong-tai-vang-24k-pnj-3.jpg'),
(40, 13, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/184/sp-gb0000y002683-bong-tai-cuoi-vang-18k-pnj-trau-cau-1.png'),
(41, 13, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/184/sp-gb0000y002683-bong-tai-cuoi-vang-18k-pnj-trau-cau-2.png'),
(42, 13, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/183/on-bo-trang-suc-cuoi-vang-18k-pnj-trau-cau-00229-02683-1.jpg'),
(43, 13, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/184/on-gb0000y002683-bong-tai-cuoi-vang-18k-pnj-trau-cau-1.jpg'),
(44, 13, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/184/on-gb0000y002683-bong-tai-cuoi-vang-18k-pnj-trau-cau-2.jpg'),
(45, 14, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/183/sp-SBXMXMW060194-bong-tai-bac-dinh-da-pnjsilver-1.png'),
(46, 14, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/183/sp-SBXMXMW060194-bong-tai-bac-dinh-da-pnjsilver-2.png'),
(47, 14, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/183/on-SBXMXMW060194-bong-tai-bac-dinh-da-pnjsilver-1.jpg'),
(48, 14, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/183/on-SBXMXMW060194-bong-tai-bac-dinh-da-pnjsilver-2.jpg'),
(49, 14, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/183/on-SBXMXMW060194-bong-tai-bac-dinh-da-pnjsilver-3.jpg'),
(50, 15, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/183/sp-SBXMXMW060189-bong-tai-bac-dinh-da-pnjsilver-1.png'),
(51, 15, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/183/sp-SBXMXMW060189-bong-tai-bac-dinh-da-pnjsilver-2.png'),
(52, 15, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/183/on-SBXMXMW060189-bong-tai-bac-dinh-da-pnjsilver-1.jpg'),
(53, 15, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/183/on-SBXMXMW060189-bong-tai-bac-dinh-da-pnjsilver-2.jpg'),
(54, 15, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/183/on-SBXMXMW060189-bong-tai-bac-dinh-da-pnjsilver-3.jpg'),
(55, 16, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/183/sp-SBXMXMW060192-bong-tai-bac-dinh-da-pnjsilver-1.png'),
(56, 16, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/183/sp-SBXMXMW060192-bong-tai-bac-dinh-da-pnjsilver-2.png'),
(57, 16, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/183/on-SBXMXMW060192-bong-tai-bac-dinh-da-pnjsilver-1.jpg'),
(58, 16, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/183/on-SBXMXMW060192-bong-tai-bac-dinh-da-pnjsilver-2.jpg'),
(59, 16, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/183/on-SBXMXMW060192-bong-tai-bac-dinh-da-pnjsilver-3.jpg'),
(60, 17, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/186/sp-gvxmmxy000001-vong-tay-vang-10k-dinh-da-ecz-pnj-sunnyva-1.png'),
(61, 17, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/186/sp-gvxmmxy000001-vong-tay-vang-10k-dinh-da-ecz-pnj-sunnyva-2.png'),
(62, 17, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/186/on-gvxmmxy000001-vong-tay-vang-10k-dinh-da-ecz-pnj-sunnyva-1.jpg'),
(63, 17, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/186/on-gvxmmxy000001-vong-tay-vang-10k-dinh-da-ecz-pnj-sunnyva-2.jpg'),
(64, 17, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/186/on-gvxmmxy000001-vong-tay-vang-10k-dinh-da-ecz-pnj-sunnyva-3.jpg'),
(65, 18, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/175/sp-gvxmxmy002863-vong-tay-vang-18k-dinh-da-cz-pnj-1.png'),
(66, 18, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/175/sp-gvxmxmy002863-vong-tay-vang-18k-dinh-da-cz-pnj-2.png'),
(67, 18, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/188/on-gvxmxmy002863-vong-tay-vang-18k-dinh-da-cz-pnj-1.jpg'),
(68, 18, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/188/on-gvxmxmy002863-vong-tay-vang-18k-dinh-da-cz-pnj-2.jpg'),
(69, 18, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/188/on-gvxmxmy002863-vong-tay-vang-18k-dinh-da-cz-pnj-3.jpg'),
(70, 19, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/175/sp-gvatxmx000001-vong-tay-vang-14k-dinh-da-disney-pnj-tangled-01.png'),
(71, 19, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/174/sp-gvatxmx000001-vong-tay-vang-14k-dinh-da-disney-pnj-tangled-2.png'),
(72, 19, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/174/on-gvatxmx000001-vong-tay-vang-14k-dinh-da-disney-pnj-tangled-1.jpg'),
(73, 19, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/174/on-gvatxmx000001-vong-tay-vang-14k-dinh-da-disney-pnj-tangled-2.jpg'),
(74, 19, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/174/on-gvatxmx000001-vong-tay-vang-14k-dinh-da-disney-pnj-tangled-3.jpg'),
(75, 20, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/175/sp-svztztw000005-vong-tay-bac-dinh-da-sythertic-style-by-pnj-unisex-1.png'),
(76, 20, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/175/sp-svztztw000005-vong-tay-bac-dinh-da-sythertic-style-by-pnj-unisex-2.png'),
(77, 20, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/175/on-svztztw000005-vong-tay-bac-dinh-da-sythertic-style-by-pnj-unisex-1.jpg'),
(78, 20, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/175/on-svztztw000005-vong-tay-bac-dinh-da-sythertic-style-by-pnj-unisex-2.jpg'),
(79, 20, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/175/on-svztztw000005-vong-tay-bac-dinh-da-sythertic-style-by-pnj-unisex-3.jpg'),
(80, 21, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/166/sp-svxmxmw060009-vong-tay-bac-dinh-da-cz-pnjsilver-1.png'),
(81, 21, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/166/sp-svxmxmw060009-vong-tay-bac-dinh-da-cz-pnjsilver-2.png'),
(82, 21, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/172/on-svxmxmw060009-vong-tay-bac-dinh-da-pnjsilver-1.jpg'),
(83, 21, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/172/on-svxmxmw060009-vong-tay-bac-dinh-da-pnjsilver-2.jpg'),
(84, 22, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/162/svxmxmw060005-vong-tay-bac-dinh-da-pnjsilver-thanh-gia-1.png'),
(85, 22, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/162/svxmxmw060005-vong-tay-bac-dinh-da-pnjsilver-thanh-gia-2.png'),
(86, 22, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/162/svxmxmw060005-vong-tay-bac-dinh-da-pnjsilver-thanh-gia-3.jpg'),
(87, 22, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/162/svxmxmw060005-vong-tay-bac-dinh-da-pnjsilver-thanh-gia-4.jpg'),
(88, 22, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/162/svxmxmw060005-vong-tay-bac-dinh-da-pnjsilver-thanh-gia-5.jpg'),
(89, 23, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/177/sp-gd0000y060507-day-chuyen-vang-18k-pnj-1.png'),
(90, 23, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/177/sp-gd0000y060507-day-chuyen-vang-18k-pnj-2.png'),
(91, 23, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/177/sp-gd0000y060507-day-chuyen-vang-18k-pnj-3.png'),
(92, 23, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/177/on-gd0000y060507-day-chuyen-vang-18k-pnj-1.jpg'),
(93, 23, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/177/on-gd0000y060507-day-chuyen-vang-18k-pnj-2.jpg'),
(94, 24, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/141/gd0000y060460-day-chuyen-vang-y-18k-pnj-1.png'),
(95, 24, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/141/gd0000y060460-day-chuyen-vang-y-18k-pnj-2.png'),
(96, 24, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/141/gd0000y060460-day-chuyen-vang-y-18k-pnj-3.png'),
(97, 24, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/180/on-GD0000Y060460-day-chuyen-vang-y-18k-pnj-1.jpg'),
(98, 24, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/180/on-GD0000Y060460-day-chuyen-vang-y-18k-pnj-2.jpg'),
(99, 25, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/149/gd0000w000818-day-chuyen-vang-trang-y-18k-pnj.png'),
(100, 25, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/149/gd0000w000818-day-chuyen-vang-trang-y-18k-pnj-01.png'),
(101, 25, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/149/gd0000w000818-day-chuyen-vang-trang-y-18k-pnj-02.png'),
(102, 25, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/149/gd0000w000818-day-chuyen-vang-trang-y-18k-pnj-03.png'),
(103, 25, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/149/gd0000w000818-day-chuyen-vang-trang-y-18k-pnj-04.jpg'),
(104, 26, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/182/sp-SD0000W060094-day-chuyen-bac-pnjsilver-1.png'),
(105, 26, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/182/sp-SD0000W060094-day-chuyen-bac-pnjsilver-2.png'),
(106, 26, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/182/sp-SD0000W060094-day-chuyen-bac-pnjsilver-3.png'),
(107, 26, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/182/on-SD0000W060094-day-chuyen-bac-pnjsilver-1.jpg'),
(108, 26, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/182/on-SD0000W060094-day-chuyen-bac-pnjsilver-2.jpg'),
(109, 27, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/138/sd0000w060070-day-chuyen-nam-bac-y-pnjsilver.png'),
(110, 27, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/138/sd0000w060070-day-chuyen-nam-bac-y-pnjsilver-01.png'),
(111, 27, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/138/sd0000w060070-day-chuyen-nam-bac-y-pnjsilver-02.png'),
(112, 27, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/172/on-sd0000w060070-day-chuyen-nam-bac-y-pnjsilver-1.jpg'),
(113, 27, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/172/on-sd0000w060070-day-chuyen-nam-bac-y-pnjsilver-2.jpg'),
(114, 28, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/138/sd0000h060001-day-chuyen-bac-y-pnjsilver-1.png'),
(115, 28, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/138/sd0000h060001-day-chuyen-bac-y-pnjsilver-2.png'),
(116, 28, 'https://cdn.pnj.io/images/thumbnails/485/485/detailed/138/sd0000h060001-day-chuyen-bac-y-pnjsilver-3.png'),
(117, 30, '20220517-IMG_8768.jpg'),
(118, 31, 'dangyeu.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `origin` varchar(20) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`productID`, `productName`, `description`, `origin`, `categoryID`) VALUES
(1, '18K Gold Ring With Citrine Crystal', 'Standing out with its hot orange-yellow color, Citrine always brings radiant beauty and shine when worn on the body. The ring is made from 18K gold and Citrine stone, providing luxurious and noble jewelry for ladies. Besides, Citrine jewelry is also quite suitable for many different ages, and on every skin type, it exudes a unique beauty.', 'VietNam', 1),
(2, 'Crystal-Encrusted Silver Ring STYLE ', 'Explore and let our vibrant and colorful designs inspire you to tell your own story in a fun way. Possessing a unique design with sparkling colorful stone accents, the STYLE silver ring will highlight the beauty, personality and sophistication of the beautiful lady.', 'VietNam', 1),
(3, '18K Gold Diamond Wedding Ring', 'Diamonds are inherently a piece of jewelry that brings pride and endless fashion inspiration. Owning your own diamond jewelry is what everyone desires. The ring is crafted from 18K gold with diamond accents with 57 precisely cut facets, creating jewelry full of luxury and class.', 'VietNam', 1),
(4, '14K White Gold Wedding Ring With True Love Sapphire', 'A gold ring studded with Sapphire is like a diary, helping couples preserve the sweet moments of their rustic and simple love story. Possessing high hardness, impact resistance and seductive beauty, the Sapphire stone is delicately attached to the product thanks to the talent of the jewelry team.', 'VietNam', 1),
(8, 'Silver Ring With Silver Stone', 'With a trendy design and stones attached around the surface of the ring on 92.5 silver material, PNJSilver brings a ring with youthful beauty but no less unconventional, helping girls look outstanding.', 'VietNam', 1),
(10, 'Silver Ring With Pearls Silver', 'With a trendy design and stones attached around the surface of the ring on 92.5 silver material, PNJSilver brings a ring with youthful beauty but no less unconventional, helping girls look outstanding.', 'VietNam', 1),
(11, '10K Gold Earrings With ECZ Crystal Belief', 'The 10K gold earring has a stylized design inspired by the sun combined with sparkling ECZ stones, and will be a piece of jewelry that enhances the personality as well as marks the wearer\'s personal style.', 'VietNam', 2),
(12, '24K Gold Earrings', 'Giving top priority to new brides, we offer earrings with both modern and classic designs. Crafted from 24K gold (99% pure gold), with soft properties, these jewelry items usually have eye-catching and sophisticated designs.', 'VietNam', 2),
(13, '18K Gold Earrings With CZ Crystal', 'Glittering and beautiful like the flowers blooming in the forest, our earring design is created with a combination of 18K gold and sparkling CZ stones. Each soft border is vividly crafted, combined with small round CZ stones, all of which create outstanding earrings with delicate beauty.', 'VietNam', 2),
(14, 'Silver Earrings With STYLE Crystal', 'Silver earrings from STYLE are designed in a unique and sophisticated style with stone accents on 92.5 silver material, sparkling as a background to create a highlight to help highlight the beauty of the pretty girl, impressing many people around her.', 'VietNam', 2),
(15, 'Silver Earrings With CZ STYLE Crystal', 'Silver earrings from STYLE are designed in a unique and sophisticated style with stone accents on 92.5 silver material, sparkling as a background to create a highlight to help highlight the beauty of the pretty girl, impressing many people around her.', 'VietNam', 2),
(16, 'Silver Earrings Studded With Pearls', 'Different levels of emotions are always an endless source of inspiration for creations in the field of art. Capturing the diversity of women\'s emotions, PNJSilver has launched the My Feeling collection with many diverse products, suitable for many different personalities and styles of women. A bit of aimless sadness, a bit of mixed joy, are all captured in the PNJSilver My Feeling silver teardrop earrings.', 'VietNam', 2),
(17, '10K Gold Bracelet With Synthetic Crystal', 'Inspired by Sunflowers (also known as sunflowers), a beautiful flower that symbolizes positivity and strength towards the light, we bring the Sunnyva Collection with unique jewelry models, in The bracelet is made from 10K gold with Synthetic stone accents, giving it a youthful yet personal look.', 'Japan', 3),
(18, '18K Gold Bracelet With CZ Crystal', 'Shining like a star, spreading strong love and trust, to PNJ she is a symbol of faith and the best things. To honor that belief, PNJ launched a sophisticated bracelet design, a harmonious combination of perfect white stones and standard 18K gold.', 'Japan', 3),
(19, 'Disney Amethyst 14K Gold Bracelet', 'Like spring flower buds waiting to bloom, the gold bracelet in the Tangled Collection has soft edges and combines the purple color of the Amethyst stone with small round stones, highlighting the bright main stone. brilliant. Besides, with the use of 10K gold material to craft, the product also has a noble design, worthy of being an \"assistant\" that doubles her elegance.', 'Japan', 3),
(20, 'Silver Bracelet With STYLE Stones', 'Like spring flower buds waiting to bloom, the gold bracelet in the Tangled Collection has soft edges and combines the purple color of the Amethyst stone with small round stones, highlighting the bright main stone. brilliant. Besides, with the use of 10K gold material to craft, the product also has a noble design, worthy of being an \"assistant\" that doubles her elegance.', 'Japan', 3),
(21, 'Italian Silver Bracelet', 'Wearing multiple bracelets also has the advantage of helping the wrist become noticeably slimmer. Not limited to plain bracelets, you can make your wrist more sparkling with lots of stone-encrusted bracelets or pretty little rings right on your finger.', 'Japan', 3),
(22, 'Silver Friendzone Breaker Silver Bracelet Shaped Like Love', 'Originating from the story \"Belt of Friendship\" when young people are still hesitant, hesitantly closing themselves in the safety belt of the theory called friendship, or to expand it, the struggle \"Attack/ Be proactive or wait?!\", PNJSilver\'s Friendzone Breaker was born from there, encouraging young people not to hesitate to \"break\" the barriers that have been holding them back for so long.', 'Japan', 3),
(23, '18K Italian Gold Necklace', 'By combining 18K gold material with delicate design, the necklace is the highlight, adding to her elegant and graceful beauty. Thin straps are suitable for outfits with many patterns, while also creating a balanced look with other large accessories.', 'England', 4),
(24, '18K Gold Necklace With Curved Letters', 'By combining 18K gold material with delicate design, the necklace is the highlight, adding to her elegant and graceful beauty. Thin straps are suitable for outfits with many patterns, while also creating a balanced look with other large accessories.', 'England', 4),
(25, '18K White Gold Necklace', 'By combining 18K gold material with delicate design, the necklace is the highlight, adding to her elegant and graceful beauty. Thin straps are suitable for outfits with many patterns, while also creating a balanced look with other large accessories.', 'England', 4),
(26, 'Italian Silver Necklace', 'Continuing the trend of youthful and personality-style jewelry, jewelry from PNJSilver will definitely make waves in the fashion world of young girls. A necklace with completely new design inspiration, coming from emotions that will take her to her own world.', 'England', 4),
(27, 'PNJSilver Silver Necklace With S-shaped Woven Wire', 'Silver is a material widely used in the jewelry industry. Although the price is much cheaper than Gold, it is no less luxurious and sophisticated, which is why silver jewelry is increasingly loved by many people. PNJSilver silver necklace is exquisitely crafted from the highest quality materials, grasp and start the style to be ready to renew yourself and experience wonderful gifts from life.', 'England', 4),
(28, 'Silver Chain Ball Chain Style', 'Whenever it comes to holidays, anniversaries, birthdays or any other day, guys often think about giving gifts to their girlfriends and lovers. Choose a silver necklace because it has many meanings of love. A silver necklace is a gift that suits her preferences.', 'England', 4),
(29, 'jhjjhhjjjh', 'hghgh', 'ggggg', 1),
(30, 'testnhieulam roi đc di voi lay', 'jjfsjhs', 'ssss', 3),
(31, 'testnhieulam roi đc di voi lay', 'x', 'ssss', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `sizeID` int(11) NOT NULL,
  `size` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`sizeID`, `size`) VALUES
(1, 12),
(2, 13),
(3, 14),
(4, 51),
(5, 52),
(6, 53),
(7, 45),
(8, 50),
(9, 48),
(10, 52);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`userID`, `userName`, `email`, `password`, `role`) VALUES
(1, 'hanhi', 'hanhi@gmail.com', 'a18786ae', 0),
(2, 'mymy', 'Nguyenngotramy2427@gmail.com', 'Ngotramynguyen', 0),
(3, 'mymy', 'Nguyenngotramy2427@gmail.com', '12121212', 0),
(4, 'mymy', 'Nguyenngotramy2427@gmail.com', '12121212', 0),
(5, 'mymylala', 'abc@gmail.com', 'abcdefghiklm', 0),
(6, 'Admin', 'Admin123@gmail.com', 'admin123', 1),
(7, 'hanhinguyen', 'hanhi@gmail.com', 'hanhinguyen', 0),
(8, 'elsa', 'elsa@gmail.com', '12345', 0),
(9, 'haha', 'haha@gmail.com', 'haha', 0),
(10, 'hyhy', 'hyhy@gmail.com', 'hyhy', 0),
(11, 'shizuka', 'hehe@gmail.com', '$2y$10$VC2aPLwCwmWZAbCYs2VuYubuWRoj1FXeLK9uRZfn/Q5NSDGzd2/kW', 0),
(12, 'nhielsa', 'nhielsa@gmail.com', '$2y$10$gThY1aDT2EEv3c9qihqCkeGCKTjoHUQ7eOeah75A0uxrh7ZJ0UjNi', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`colorID`);

--
-- Chỉ mục cho bảng `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`materialID`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `userID` (`userID`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idOrder` (`idOrder`),
  ADD KEY `idProductDetails` (`idProductDetails`);

--
-- Chỉ mục cho bảng `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productID` (`productID`),
  ADD KEY `productdetails_ibfk_2` (`colorID`),
  ADD KEY `productdetails_ibfk_3` (`materialID`),
  ADD KEY `productdetails_ibfk_4` (`sizeID`);

--
-- Chỉ mục cho bảng `productimages`
--
ALTER TABLE `productimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productID` (`productID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`sizeID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `colorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `material`
--
ALTER TABLE `material`
  MODIFY `materialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT cho bảng `productimages`
--
ALTER TABLE `productimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `sizeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `order` (`idOrder`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`idProductDetails`) REFERENCES `productdetails` (`id`);

--
-- Các ràng buộc cho bảng `productdetails`
--
ALTER TABLE `productdetails`
  ADD CONSTRAINT `productdetails_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`),
  ADD CONSTRAINT `productdetails_ibfk_2` FOREIGN KEY (`colorID`) REFERENCES `color` (`colorID`),
  ADD CONSTRAINT `productdetails_ibfk_3` FOREIGN KEY (`materialID`) REFERENCES `material` (`materialID`),
  ADD CONSTRAINT `productdetails_ibfk_4` FOREIGN KEY (`sizeID`) REFERENCES `size` (`sizeID`);

--
-- Các ràng buộc cho bảng `productimages`
--
ALTER TABLE `productimages`
  ADD CONSTRAINT `productimages_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

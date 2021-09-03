-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 03, 2021 lúc 11:22 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `admin_user` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_phone` int(10) NOT NULL,
  `id_users` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `banner_name` varchar(255) NOT NULL,
  `banner_status` int(11) NOT NULL,
  `banner_images` varchar(100) NOT NULL,
  `banner_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) UNSIGNED NOT NULL,
  `brand_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `brand_slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `brand_desc` text NOT NULL,
  `brand_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id_brand`, `brand_name`, `brand_slug`, `brand_desc`, `brand_status`) VALUES
(11, 'Impulse', 'impulse', 'Thương hiệu được nhắc đến đầu tiên đó chính là Impulse. Thương hiệu máy tập gym này đến từ Đài Loan và được thành lập từ năm 1975. Các sản phẩm của hãng luôn được cải tiến và đổi mới về cả hình thức và tính năng. Impulse luôn là một trong những cái tên đứng ở top đầu chuyên thiết kế, sản xuất và tiếp thị các thiết bị tập thể dục.', 0),
(12, 'Matrix Fitness', 'matrix-fitness', 'Matrix Fitness là công ty chuyên sản xuất các thiết bị thể dục, thể thao hàng đầu thế giới ra đời vào năm 2001 có trụ sở tại Landmark Drive Cottage Grove, Mỹ. Các thiết bị của thương hiệu này hiện đang có mặt tại 85 quốc gia.', 0),
(13, 'MBH GYM', 'mbh-gym', 'Các sản phẩm máy tập gym của MBH GYM bắt đầu xuất hiện trên thị trường vào năm 2001. Công ty có trụ sở và nhà máy sản xuất tại Dezhou, Sangdong, Trung Quốc.', 0),
(14, 'Elip', 'elip', 'Elip là một trong các các hãng máy tập gym “thuần Việt” thống lĩnh thị trường máy tập gym nội địa tại Việt Nam. Các sản phẩm của Elip được yêu thích nhờ mẫu mã đẹp và mang lại hiệu quả trong quá trình luyện tập.', 0),
(15, 'PAVO', 'pavo', 'PAVO Đẳng cấp cho sự quý phái', 0),
(16, 'Dual Bike', 'dual-bike', 'Xe đạp tập thể dục Dual Bike mang đến những bài tập giãn cơ giúp người cao tuổi, người bị tai biến, những người cần phục hồi chức năng và mới ốm dậy cảm thấy thoải mái sống vui khỏe mỗi ngày.', 0),
(17, 'Icado', 'icado', 'Kiểu dáng: Áo thể thao dành cho nữ', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_name` varchar(250) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_products` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id_comment`, `comment`, `comment_name`, `comment_date`, `id_products`) VALUES
(9, 'assss', '33333333333', '2021-07-30 11:31:38', 50),
(10, 'quan dep', 'phan ha', '2021-07-30 11:34:21', 49),
(15, '123456', 'phan van ha', '2021-08-02 07:22:38', 52),
(28, 'áo đẹp lắm ạ', 'phan van ha', '2021-08-02 08:06:15', 52),
(29, 'áo đẹp lắm', 'phan văn hà', '2021-08-02 08:13:08', 51),
(30, 'test ok', 'phan hòa', '2021-08-02 08:48:57', 52),
(31, 'chất lượng', 'phan hà', '2021-08-02 09:13:06', 40),
(32, 'máy tốt', 'phan hoa', '2021-08-02 17:39:36', 41),
(33, 'ao dep lam', 'phan hà', '2021-08-14 07:57:58', 51),
(34, 'hàng tốt lắm', 'hoa hoa', '2021-08-18 14:15:21', 50),
(36, 'đẹp', 'minh', '2021-08-21 06:06:50', 49),
(37, 'áo đẹp lắm', 'phan hang', '2021-08-27 14:12:53', 48),
(38, 'quần đẹp', 'hà', '2021-09-01 04:23:20', 48),
(39, 'áo đẹp quá', 'phan văn hà', '2021-09-01 07:42:00', 45),
(40, 'Máy này bền không shop', 'Phan Hà', '2021-09-01 11:21:26', 34);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon`
--

CREATE TABLE `coupon` (
  `id_coupon` int(11) DEFAULT NULL,
  `coupon_name` varchar(150) NOT NULL,
  `coupon_time` int(11) NOT NULL COMMENT ' số lượng code',
  `coupon_condition` int(11) NOT NULL COMMENT 'tính năng giảm giá tiền %',
  `coupon_number` int(11) NOT NULL,
  `coupon_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `coupon_status` int(11) NOT NULL DEFAULT 1,
  `coupon_date_start` date DEFAULT NULL,
  `coupon_date_end` date DEFAULT NULL,
  `coupon_user` varchar(255) DEFAULT NULL COMMENT 'mỗi user chỉ nhập đc 1 mã giảm giá'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `coupon`
--

INSERT INTO `coupon` (`id_coupon`, `coupon_name`, `coupon_time`, `coupon_condition`, `coupon_number`, `coupon_code`, `coupon_status`, `coupon_date_start`, `coupon_date_end`, `coupon_user`) VALUES
(NULL, 'KMCOVID', 100, 1, 100000, '30041975', 1, '2021-08-31', '2021-08-31', NULL),
(NULL, 'covid', 12, 2, 15000, 'KMCOVID', 1, '2021-08-20', '2021-08-29', NULL),
(10, 'Quốc Khanh', 10, 1, 50, 'QK29', 1, '2021-08-27', '2021-08-29', NULL),
(4, 'covid', 100, 2, 100000, 'covid100', 1, '2021-08-11', '2021-08-21', NULL),
(1, 'covid', 10, 1, 10, 'covid_4', 1, '2021-08-13', '2021-08-29', NULL),
(11, 'covid', 12, 2, 100000, 'money', 1, '2021-08-27', '2021-08-29', NULL),
(NULL, 'covid21', 3, 1, 10, 'vn20', 1, '2021-08-29', '2021-09-02', NULL),
(0, 'covid', 55, 1, 20, 'vn2001', 1, '2021-08-28', '2021-09-04', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `customer_name` varchar(250) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_phone` int(10) DEFAULT NULL,
  `customer_address` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `order_code` varchar(50) DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `id_shipping` int(11) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_destroy` text DEFAULT NULL COMMENT 'lý do hủy hàng',
  `order_total` varchar(50) DEFAULT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id_order`, `order_code`, `id_users`, `payment_id`, `id_shipping`, `order_status`, `order_destroy`, `order_total`, `order_date`) VALUES
(170, '26c4b', 19, 208, 114, '1', NULL, '265000', '2021-08-25 00:00:00'),
(171, '4e82b', 19, 209, 115, '4', NULL, '2145000', '2021-07-25 00:00:00'),
(172, 'a69fd', 19, 210, 116, '2', NULL, '261000', '2021-08-25 00:00:00'),
(173, 'e74d3', 19, 211, 117, '4', NULL, '1930500', '2021-08-25 00:00:00'),
(174, '51368', 19, 212, 118, '5', NULL, '2601000', '2021-08-25 00:00:00'),
(175, 'fa6d3', 19, 213, 119, '4', NULL, '252000', '2021-08-25 00:00:00'),
(176, 'ea8dd', 1, 214, 120, '2', NULL, '1044000', '2021-08-25 00:00:00'),
(177, 'bb929', 1, 215, 121, '4', NULL, '4700000', '2021-08-27 00:00:00'),
(178, 'fb1e0', 1, 216, 122, '5', 'ko thích nữa', '1476000', '2021-08-27 00:00:00'),
(179, '3ecea', 1, 217, 123, '3', NULL, '3495000', '2021-08-27 00:00:00'),
(180, '38e9d', 1, 218, 124, '4', NULL, '2890000', '2021-08-27 00:00:00'),
(181, '4d3f1', 1, 219, 125, '4', NULL, '1450000', '2021-08-27 00:00:00'),
(183, '569d6', 24, 221, 126, '4', NULL, '1060000', '2021-08-27 00:00:00'),
(184, '5ad33', 24, 222, 127, '5', 'hết tiền', '320000', '2021-08-27 00:00:00'),
(185, 'dc8e1', 1, 223, 129, '5', 'dd', '5565000', '2021-08-27 00:00:00'),
(186, 'dae8c', 24, 224, 128, '1', NULL, '5565000', '2021-08-27 00:00:00'),
(187, '732d0', 24, 225, 131, '4', NULL, '11950000', '2021-08-27 00:00:00'),
(188, 'dc1b3', 24, 226, 133, '5', NULL, '290000', '2021-08-27 00:00:00'),
(189, '0d4af', 1, 227, 134, '2', NULL, '165000', '2021-08-27 00:00:00'),
(190, '8cef3', 24, 228, 135, '2', NULL, '1590000', '2021-08-27 00:00:00'),
(191, 'dd328', 1, 229, 136, '5', 'ko thích đặt', '1590000', '2021-08-27 00:00:00'),
(192, '326b1', 1, 230, 137, '4', NULL, '2601000', '2021-08-28 00:00:00'),
(193, '6ec64', 1, 231, 138, '4', NULL, '27000000', '2021-08-29 00:00:00'),
(194, 'e251a', 1, 232, 139, '1', NULL, '15650000', '2021-08-30 00:00:00'),
(195, '5e8d9', 25, 233, 141, '2', NULL, '4028000', '2021-08-30 00:00:00'),
(196, '76b8a', 19, 234, 142, '1', NULL, '2350000', '2021-08-31 00:00:00'),
(197, 'ad229', 19, 235, 142, '1', NULL, '2350000', '2021-08-31 00:00:00'),
(198, '36dbb', 19, 236, 142, '1', NULL, '2350000', '2021-08-31 00:00:00'),
(199, '76abc', 19, 237, 142, '1', NULL, '2350000', '2021-08-31 00:00:00'),
(200, 'e53dd', 19, 238, 142, '1', NULL, '2350000', '2021-08-31 00:00:00'),
(201, '00e46', 19, 239, 142, '1', NULL, '2350000', '2021-08-31 00:00:00'),
(202, 'e5d32', 19, 240, 144, '1', NULL, '13072000', '2021-09-01 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id_order_details` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `id_orders` int(11) DEFAULT NULL,
  `orders_code` varchar(50) DEFAULT NULL,
  `product_coupon` varchar(50) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id_order_details`, `id_products`, `id_orders`, `orders_code`, `product_coupon`, `product_name`, `product_price`, `product_quantity`, `created_at`, `update_at`) VALUES
(123, 49, 170, '26c4b', 'Không Khuyến Mãi', 'Quần Đùi tập gym yoga nam PAVO AT4', 265000, 1, '2021-08-25 02:25:43', '2021-08-25 02:25:43'),
(124, 40, 171, '4e82b', 'Không Khuyến Mãi', 'Máy tập thể dục đa năng TT-002', 2145000, 1, '2021-08-25 02:27:06', '2021-08-25 02:27:06'),
(125, 48, 172, 'a69fd', 'covid_4', 'Quần Dài Thể Thao nam JOGGER SỌC LƯỚI SG9', 290000, 1, '2021-08-25 02:39:44', '2021-08-25 02:39:44'),
(126, 40, 173, 'e74d3', 'covid_4', 'Máy tập thể dục đa năng TT-002', 2145000, 1, '2021-08-25 02:40:45', '2021-08-25 02:40:45'),
(127, 39, 174, '51368', 'covid_4', 'Xe đạp tập thể dục Dual Bike MO-2060', 2890000, 1, '2021-08-25 02:42:10', '2021-08-25 02:42:10'),
(128, 28, 175, 'fa6d3', 'covid_4', 'Áo ngắn tay tập gym yoga Nam PAVO AT5', 280000, 1, '2021-08-25 02:43:37', '2021-08-25 02:43:37'),
(129, 48, 176, 'ea8dd', 'covid_4', 'Quần Dài Thể Thao nam JOGGER SỌC LƯỚI SG9', 290000, 4, '2021-08-25 09:36:18', '2021-08-25 09:36:18'),
(130, 38, 177, 'bb929', 'Không Khuyến Mãi', 'Dụng cụ tập phục hồi chức năng 3 in 1', 2350000, 2, '2021-08-27 02:52:28', '2021-08-27 02:52:28'),
(131, 37, 178, 'fb1e0', 'covid_4', 'Xe đạp tập thể dục Dual Bike', 1640000, 1, '2021-08-27 05:01:47', '2021-08-27 05:01:47'),
(132, 42, 179, '3ecea', 'QK209', 'Ghế tập bụng đa năng MK-BS028', 1450000, 1, '2021-08-27 05:05:10', '2021-08-27 05:05:10'),
(133, 40, 179, '3ecea', 'QK209', 'Máy tập thể dục đa năng TT-002', 2145000, 1, '2021-08-27 05:05:10', '2021-08-27 05:05:10'),
(134, 39, 180, '38e9d', 'Không Khuyến Mãi', 'Xe đạp tập thể dục Dual Bike MO-2060', 2890000, 1, '2021-08-27 10:03:16', '2021-08-27 10:03:16'),
(135, 42, 181, '4d3f1', 'Không Khuyến Mãi', 'Ghế tập bụng đa năng MK-BS028', 1450000, 1, '2021-08-27 10:08:29', '2021-08-27 10:08:29'),
(136, 49, 183, '569d6', 'Không Khuyến Mãi', 'Quần Đùi tập gym yoga nam PAVO AT4', 265000, 4, '2021-08-27 14:12:10', '2021-08-27 14:12:10'),
(137, 46, 184, '5ad33', 'Không Khuyến Mãi', 'Quần Đùi Tập Gym Yoga Nam PAVO 2 lớp AT3', 320000, 1, '2021-08-27 14:16:08', '2021-08-27 14:16:08'),
(138, 47, 185, 'dc8e1', 'Không Khuyến Mãi', 'Quần đùi Tập Gym Yoga Nam PAVO AT8', 265000, 21, '2021-08-27 14:17:33', '2021-08-27 14:17:33'),
(139, 33, 187, '732d0', 'Không Khuyến Mãi', 'Máy chạy bộ điện đa năng HQ-V1C', 11950000, 1, '2021-08-27 14:20:51', '2021-08-27 14:20:51'),
(140, 48, 188, 'dc1b3', 'Không Khuyến Mãi', 'Quần Dài Thể Thao nam JOGGER SỌC LƯỚI SG9', 290000, 1, '2021-08-27 14:31:07', '2021-08-27 14:31:07'),
(141, 47, 189, '0d4af', 'money', 'Quần đùi Tập Gym Yoga Nam PAVO AT8', 265000, 1, '2021-08-27 14:35:49', '2021-08-27 14:35:49'),
(142, 52, 190, '8cef3', 'Không Khuyến Mãi', 'Áo Ngắn Tay Thể Thao nam ICADO AT2', 265000, 6, '2021-08-27 14:42:59', '2021-08-27 14:42:59'),
(143, 39, 192, '326b1', 'covid_4', 'Xe đạp tập thể dục Dual Bike MO-2060', 2890000, 1, '2021-08-28 13:55:37', '2021-08-28 13:55:37'),
(144, 31, 193, '6ec64', 'Không Khuyến Mãi', 'Máy chạy bộ điện đa năng Oreni RE-6', 27000000, 1, '2021-08-29 03:31:58', '2021-08-29 03:31:58'),
(145, 48, 194, 'e251a', 'Không Khuyến Mãi', 'Quần Dài Thể Thao nam JOGGER SỌC LƯỚI SG9', 290000, 1, '2021-08-30 06:28:19', '2021-08-30 06:28:19'),
(146, 46, 194, 'e251a', 'Không Khuyến Mãi', 'Quần Đùi Tập Gym Yoga Nam PAVO 2 lớp AT3', 320000, 1, '2021-08-30 06:28:19', '2021-08-30 06:28:19'),
(147, 37, 194, 'e251a', 'Không Khuyến Mãi', 'Xe đạp tập thể dục Dual Bike', 1640000, 1, '2021-08-30 06:28:19', '2021-08-30 06:28:19'),
(148, 42, 194, 'e251a', 'Không Khuyến Mãi', 'Ghế tập bụng đa năng MK-BS028', 1450000, 1, '2021-08-30 06:28:19', '2021-08-30 06:28:19'),
(149, 33, 194, 'e251a', 'Không Khuyến Mãi', 'Máy chạy bộ điện đa năng HQ-V1C', 11950000, 1, '2021-08-30 06:28:19', '2021-08-30 06:28:19'),
(150, 40, 195, '5e8d9', 'vn2001', 'Máy tập thể dục đa năng TT-002', 2145000, 1, '2021-08-30 09:58:04', '2021-08-30 09:58:04'),
(151, 39, 195, '5e8d9', 'vn2001', 'Xe đạp tập thể dục Dual Bike MO-2060', 2890000, 1, '2021-08-30 09:58:04', '2021-08-30 09:58:04'),
(152, 38, 196, '76b8a', 'Không Khuyến Mãi', 'Dụng cụ tập phục hồi chức năng 3 in 1', 2350000, 1, '2021-08-31 04:13:02', '2021-08-31 04:13:02'),
(153, 38, 197, 'ad229', 'Không Khuyến Mãi', 'Dụng cụ tập phục hồi chức năng 3 in 1', 2350000, 1, '2021-08-31 04:13:39', '2021-08-31 04:13:39'),
(154, 38, 198, '36dbb', 'Không Khuyến Mãi', 'Dụng cụ tập phục hồi chức năng 3 in 1', 2350000, 1, '2021-08-31 04:14:02', '2021-08-31 04:14:02'),
(155, 38, 199, '76abc', 'Không Khuyến Mãi', 'Dụng cụ tập phục hồi chức năng 3 in 1', 2350000, 1, '2021-08-31 04:14:33', '2021-08-31 04:14:33'),
(156, 38, 200, 'e53dd', 'Không Khuyến Mãi', 'Dụng cụ tập phục hồi chức năng 3 in 1', 2350000, 1, '2021-08-31 04:14:36', '2021-08-31 04:14:36'),
(157, 38, 201, '00e46', 'Không Khuyến Mãi', 'Dụng cụ tập phục hồi chức năng 3 in 1', 2350000, 1, '2021-08-31 04:14:43', '2021-08-31 04:14:43'),
(158, 39, 202, 'e5d32', 'vn2001', 'Xe đạp tập thể dục Dual Bike MO-2060', 2890000, 1, '2021-09-01 11:33:55', '2021-09-01 11:33:55'),
(159, 34, 202, 'e5d32', 'vn2001', 'Máy chạy bộ điện Sakura S33', 13450000, 1, '2021-09-01 11:33:55', '2021-09-01 11:33:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `payment_method` varchar(255) NOT NULL COMMENT 'phương thức thanh toán',
  `payment_status` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`payment_id`, `id_order`, `payment_method`, `payment_status`, `created_at`, `update_at`) VALUES
(208, NULL, '1', 'Đang chờ xử lý', '2021-08-25 02:25:43', NULL),
(209, 170, '1', 'Đang chờ xử lý', '2021-08-25 02:27:06', NULL),
(210, 171, '1', 'Đang chờ xử lý', '2021-08-25 02:39:44', NULL),
(211, 172, '1', 'Đang chờ xử lý', '2021-08-25 02:40:45', NULL),
(212, 173, '1', 'Đang chờ xử lý', '2021-08-25 02:42:10', NULL),
(213, 174, '1', 'Đang chờ xử lý', '2021-08-25 02:43:37', NULL),
(214, NULL, '1', 'Đang chờ xử lý', '2021-08-25 09:36:18', NULL),
(215, NULL, '1', 'Đang chờ xử lý', '2021-08-27 02:52:28', NULL),
(216, 177, '1', 'Đang chờ xử lý', '2021-08-27 05:01:47', NULL),
(217, 178, '2', 'Đang chờ xử lý', '2021-08-27 05:05:10', NULL),
(218, NULL, '1', 'Đang chờ xử lý', '2021-08-27 10:03:16', NULL),
(219, 180, '1', 'Đang chờ xử lý', '2021-08-27 10:08:29', NULL),
(220, 181, '1', 'Đang chờ xử lý', '2021-08-27 10:30:27', NULL),
(221, NULL, '1', 'Đang chờ xử lý', '2021-08-27 14:12:10', NULL),
(222, NULL, '1', 'Đang chờ xử lý', '2021-08-27 14:16:08', NULL),
(223, 183, '1', 'Đang chờ xử lý', '2021-08-27 14:17:33', NULL),
(224, 184, '1', 'Đang chờ xử lý', '2021-08-27 14:17:38', NULL),
(225, 186, '1', 'Đang chờ xử lý', '2021-08-27 14:20:51', NULL),
(226, 187, '1', 'Đang chờ xử lý', '2021-08-27 14:31:07', NULL),
(227, 185, '1', 'Đang chờ xử lý', '2021-08-27 14:35:49', NULL),
(228, 188, '1', 'Đang chờ xử lý', '2021-08-27 14:42:59', NULL),
(229, 189, '1', 'Đang chờ xử lý', '2021-08-27 14:43:04', NULL),
(230, NULL, '1', 'Đang chờ xử lý', '2021-08-28 13:55:37', NULL),
(231, NULL, '1', 'Đang chờ xử lý', '2021-08-29 03:31:58', NULL),
(232, NULL, '1', 'Đang chờ xử lý', '2021-08-30 06:28:19', NULL),
(233, NULL, '1', 'Đang chờ xử lý', '2021-08-30 09:58:04', NULL),
(234, NULL, '0', 'Đang chờ xử lý', '2021-08-31 04:13:02', NULL),
(235, 196, '0', 'Đang chờ xử lý', '2021-08-31 04:13:39', NULL),
(236, 197, '0', 'Đang chờ xử lý', '2021-08-31 04:14:02', NULL),
(237, 198, '0', 'Đang chờ xử lý', '2021-08-31 04:14:33', NULL),
(238, 199, '0', 'Đang chờ xử lý', '2021-08-31 04:14:36', NULL),
(239, 200, '0', 'Đang chờ xử lý', '2021-08-31 04:14:43', NULL),
(240, NULL, '1', 'Đang chờ xử lý', '2021-09-01 11:33:55', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id_products` int(11) NOT NULL,
  `id_brand` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `product_desc` longtext DEFAULT NULL COMMENT 'chi tiết sản phẩm',
  `product_content` text CHARACTER SET utf8 NOT NULL COMMENT 'nội dung sản phẩm',
  `product_status` int(11) NOT NULL,
  `id_type` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id_products`, `id_brand`, `product_name`, `product_quantity`, `product_slug`, `product_image`, `product_price`, `product_desc`, `product_content`, `product_status`, `id_type`) VALUES
(28, 15, 'Áo ngắn tay tập gym yoga Nam PAVO AT5', 20, 'ao-ngan-tay-tap-gym-yoga-nam-pavo-at5', 'ACT11240-ACT-NAM-PAVO-AT5-212.jpg', 280000, 'Chất liệu: 88% Polyester, 12% spandex\r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần\r\nĐường may: 4 kim tinh tế, sắc sảo\r\nThiết kế: Form ôm', 'Co giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng\r\nPhong cách althei-sure năng động', 0, 17),
(29, 15, 'Áo TankTop Tập Gym Yoga nam Pavo AT1', 19, 'ao-tanktop-tap-gym-yoga-nam-pavo-at1', 'ao-tanktop-yoga-nam-pavo-at1-5-181.jpg', 250000, 'Chất liệu: 88% Polyester, 12% spandex \r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần \r\nĐường may: 4 kim tinh tế, sắc sảo\r\nThiết kế: Form ôm', 'Co giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng\r\nPhong cách althei-sure năng động', 0, 17),
(31, 11, 'Máy chạy bộ điện đa năng Oreni RE-6', 29, 'may-chay-bo-dien-da-nang-oreni-re-6', 'hinh-anh-may-chay-bo-dien-da-nang-oreni-re-6-1(1)40.jpg', 27000000, '1. Thông tin máy chạy bộ điện đa năng Impluse RE-6.\r\n- Mã sản phẩm: RE-6.\r\n\r\n- Thương hiệu: Impluse .\r\n\r\n- Công nghệ: Nhật Bản.\r\n\r\n- Xuất xứ: Đài Loan - TQ.\r\n\r\n- Bảo hành: 5 năm.', 'Máy chạy bộ điện đa năng Oreni RE-6 với thiết kế chắc chắn, công nghệ hiện đại, động cơ với công suất lên tới 4.0Hp mang lại trải nghiệm tuyệt vời cho người luyện tập.', 0, 14),
(32, 13, 'Ghế tập tạ đa năng T058', 20, 'ghe-tap-ta-da-nang-t058', 'Ghe-tap-ta-da-nang-T052-151.jpg', 3795000, 'Thông tin ghế tập tạ đa năng T058.\r\n- Mã sản phẩm: T058.\r\n\r\n- Hãng nhập khẩu: Thiên Trường Sport.\r\n\r\n- Xuất xứ: Trung Quốc.', 'Ghế tập tạ đa năng T058 được thiết kế chắc chắn từ khung thép hộp cực dày, sơn tĩnh điện chống trầy xước và nệm ghế nằm tập cực êm.\r\n- Màu sắc: đen xám.\r\n- Diện tích lắp đặt giàn tạ: 2390 x 900 x 2350 mm (dài x rộng x cao). Vì sử dụng đòn tạ 1.5m để đẩy nên chiều rộng tối thiểu khi tập là 1.6 m.', 0, 14),
(33, 12, 'Máy chạy bộ điện đa năng HQ-V1C', 13, 'may-chay-bo-dien-da-nang-hq-v1c', 'May-chay-bo-dien-da-nang-HQ-V1C-148.jpg', 11950000, 'Thông tin máy chạy bộ điện đa năng HQ-V1C.\r\n- Mã sản phẩm: HQ-V1C.\r\n\r\n- Sản xuất: Theo công nghệ Nhật Bản.\r\n\r\n- Lắp ráp: Đài Loan, Trung Quốc.\r\n\r\n- Đơn vị nhập khẩu: Thiên Trường Sport.', '- Máy chạy bộ điện đa năng HQ-V1C chính hãng được thiết kế nhỏ gọn, sử dụng động cơ DC có công suất 2.5Hp và phù hợp dùng tập cho gia đình. Thông số cơ bản của máy chạy bộ HQ-V1C gồm:\r\n\r\n+ Động cơ DC: 2.5Hp\r\n\r\n+ Tốc độ điều chỉnh: 1 - 16 km/h.\r\n\r\n+ Độ dốc tự động: 0 - 16 %.\r\n\r\n+ Kích thước bàn chạy: 1200 x 425 mm.', 0, 14),
(34, 14, 'Máy chạy bộ điện Sakura S33', 22, 'may-chay-bo-dien-sakura-s33', 'hinh-anh-may-chay-bo-sakura-s335.jpg', 13450000, 'Thông tin máy chạy bộ điện Sakura S33.\r\n- Mã sản phẩm: S33.\r\n\r\n- Thương hiệu: Sakura.\r\n\r\n- Xuất xứ: Đài Loan.\r\n\r\n- Đơn vị nhập khẩu: Thiên Trường Sport.\r\n\r\n- Bảo hành: 1 năm.', '- Máy chạy bộ điện Sakura S33 với kiểu dáng thiết kế chắc chắn, được trang bị những công nghệ hiện đại, công suất máy 2.5Hp rất thích hợp sử dụng cho gia đình.\r\n- Khung máy chạy Sakura S33 cấu tạo từ thép vô cùng cứng cáp cho khả năng chịu tải trọng tốt lên tới 110Kg. Bên ngoài được phủ lớp sơn tĩnh điện giúp chống rỉ sét, bong tróc sau quá trình dài sử dụng.', 0, 14),
(35, 11, 'Máy chạy bộ điện Sakura HQ-V3C', 30, 'may-chay-bo-dien-sakura-hq-v3c', 'may-chay-bo-sakura-hq-v3c72.jpg', 14450000, 'Thông tin máy chạy bộ điện Impulse HQ-V3C.\r\n- Mã sản phẩm: HQ-V3C.\r\n\r\n- Đơn vị nhập khẩu: Thiên Trường Sport.\r\n\r\n- Bảo hành: 1 năm.', '- Máy chạy bộ điện Impulse HQ-V3C với thiết kế nhỏ gọn, đẹp mắt, hỗ trợ nhiều bài tập khác nhau là thiết bị rèn luyện sức khỏe đáng sở hữu trong ngôi nhà của bạn.', 0, 14),
(36, 11, 'Máy chạy bộ điện Impulse RT500', 21, 'may-chay-bo-dien-impulse-rt500', 'May-chay-bo-dien-Impulse-RT500-15.jpg', 56500000, 'Thông tin máy chạy bộ điện Impulse RT500.\r\n- Mã sản phẩm: RT500.\r\n\r\n- Hãng sản xuất: Impulse.\r\n\r\n- Xuất xứ: Trung Quốc.', '- Máy chạy bộ điện Impulse RT500 được thiết kế cho phòng tập với khung máy cực kỳ chắc chắn và sử dụng motor AC 3.0HP có công suất tối đa 5.0HP.\r\n\r\n- Khung máy được làm từ chất liệu thép cực dày và sơn hai lớp chống gỉ.\r\n\r\n- Máy chạy bộ Impulse được tích hợp màn hình LCD có chức năng dùng hiển thị các thông số tập luyện gồm quảng đường, nhịp tim, thời gian, tốc độ và calo.', 0, 14),
(37, 16, 'Xe đạp tập thể dục Dual Bike', 29, 'xe-dap-tap-the-duc-dual-bike', 'Xe-dap-tap-the-duc-Dual-Bike(1)10.jpg', 1640000, 'Thông tin xe đạp tập thể dục Dual Bike.\r\n- Mã sản phẩm: Dual Bike.\r\n\r\n- Xuất xứ: Trung Quốc.\r\n- Màu sắc: đen.\r\n\r\n- Trọng lượng xe đạp tập: 8 kg.\r\n\r\n- Trọng lượng đóng thùng: 9 kg.\r\n\r\n- Kích thước đóng hộp: 470 x 430 x 130 mm.\r\n\r\n- Diện tích đặt máy tập: 420 x 410 x 1050 mm.', 'Thiết kế chi tiết của xe đạp tập thể dục Dual Bike gồm:\r\n\r\n- Khung chính của xe làm từ thép dày và sơn tĩnh điện cao cấp giúp chống rỉ sét.\r\n\r\n- Bàn đạp xe thiết kế chống trơn trượt, có quai đeo và di chuyển bằng trục bi cực êm.\r\n\r\n- Bộ phận tập tay được bọc nệm mút và chuyển động êm ái bằng trục bi.\r\n\r\n- Cả bộ phận đạp chân và tập tay đều có chức năng điều chỉnh mức độ nặng nhẹ dễ dàng khi sử dụng.\r\n\r\n- Xe đạp tập trong nhà tích hợp đồng hồ có chức năng thống kê và hiển thị thời gian tập, quãng đường đạp xe, số vòng quay...\r\n\r\n- Chân đế của xe được bọc nhựa giúp tránh làm hư hỏng nền sàn tập.', 0, 14),
(38, 16, 'Dụng cụ tập phục hồi chức năng 3 in 1', 4, 'dung-cu-tap-phuc-hoi-chuc-nang-3-in-1', 'dung-cu-tap-phuc-hoi-chuc-nang-3-in-161.jpg', 2350000, 'Thông tin dụng cụ tập phục hồi chức năng 3 in 1.\r\n- Mã sản phẩm: DCPHCN.\r\n- Xuất xứ: Việt Nam.\r\n- Màu sắc: xanh + xám.\r\n- Diện tích lắp đặt: 560 x 440 x 1600 mm.\r\n- Trọng lượng ngưới tập tối đa: 100 kg.', '- Dụng cụ tập phục hồi chức năng 3 in 1 được thiết kế chắc chắn, đa năng và chuyên dụng cho người cần tập phục hồi chức năng vận động sau khi bị tai biến. Thiết kế chi tiết của dụng cụ này như sau:\r\n+ Toàn bộ phần khung của thiết bị được làm từ thép hộp và thép tròn dày, sơn tĩnh điện chống rỉ.\r\n+ Bộ phận đạp xe và tập vận động cho tay sử dụng hệ thống chuyển động bằng trục bi, có thể điều chỉnh mức độ nặng nhẹ khi tập. 2 bộ phận này có thể điều chỉnh xa - gần sao cho phù hợp với chiều cao của người sử dụng.', 0, 14),
(39, 16, 'Xe đạp tập thể dục Dual Bike MO-2060', 25, 'xe-dap-tap-the-duc-dual-bike-mo-2060', 'Xe-dap-tap-MO-206051.jpg', 2890000, 'Thông số xe đạp tập thể dục  Dual BikeMO-2060.\r\n- Mã sản phẩm: MO-2060.\r\n\r\n- Hãng nhập khẩu:  Dual Bike.\r\n\r\n- Xuất xứ: Trung Quốc.', '- Xe đạp tập thể dục  Dual BikeMO-2060 chính hãng được làm chắc chắn, nhỏ gọn và chuyên sử dụng tập luyện toàn thân hiệu quả tại nhà. Thiết kế chi tiết của xe đạp tập  Dual BikeMO-2060 gồm:\r\n+ Khung xe sử dụng sắt Ф25, Ф32 và Ф60 dày tới 1.5mm cực kỳ chắc chắn, sơn tĩnh điện chống bong tróc cực bền.\r\n+ Yên xe bọc da cực dày và có thể điều chỉnh cao thấp dễ dàng giúp phù hợp cho mọi đối tượng tập luyện bao gồm cả trẻ em, người lớn và người cao tuổi.', 0, 14),
(40, 16, 'Máy tập thể dục đa năng TT-002', 21, 'may-tap-the-duc-da-nang-tt-002', 'May-tap-the-duc-da-nang-TT-0028.jpg', 2145000, '. Thông tin máy tập thể dục đa năng TT-002.\r\n- Mã sản phẩm: TT-002.\r\n\r\n- Thương hiệu: Mobius.\r\n\r\n- Xuất xứ: Trung Quốc.', '- Máy tập thể dục đa năng TT-002 được thiết kế chắc chắn và hỗ trợ nhiều động tác giúp tập toàn thân hiệu quả. Chi tiết cấu tạo của máy tập TT-002 bao gồm:\r\n\r\n+ Khung chính của máy làm từ thép chịu lực, cực dày và được sơn tĩnh điện chống rỉ sét, bong tróc.\r\n\r\n+ TT-002 tích hợp đồng hồ hiển thị có chức năng thống kê các thông số trong quá trình tập gồm thời gian tập, số lần tập... giúp bạn theo dõi hiệu quả tập luyện của mình.', 0, 14),
(41, 16, 'Máy tập tăng chiều cao 2016', 35, 'may-tap-tang-chieu-cao-2016', 'May-tap-tang-chieu-cao67.jpg', 3750000, 'Thông tin máy tập tăng chiều cao 2016.\r\n- Mã sản phẩm: MTTCC16.\r\n\r\n- Hãng nhập khẩu: Thiên Trường.\r\n\r\n- Xuất xứ: Trung Quốc.', '- Máy tập tăng chiều cao 2016 được làm chắc chắn, hỗ trợ tập kéo giãn xương khớp và phát triển chiều cao hiệu quả. Thiết kế chi tiết của máy tập chiều cao gồm:\r\n+ Khung máy làm từ thép hộp cực dày và sơn tĩnh điện chống rỉ sét.\r\n+ Yên ghế nằm tập được bọc nệm da cực dày, êm và rất bền.\r\n+ Hệ thống vít và điều chỉnh chiều cao được làm chắc chắn, đảm bảo an toàn tuyệt đối khi sử dụng.\r\n+ Chân đế được bọc nhựa giúp tăng độ ma sát, đứng vững hơn và bảo vệ nền nhà tránh trầy xước.', 0, 14),
(42, 16, 'Ghế tập bụng đa năng MK-BS028', 18, 'ghe-tap-bung-da-nang-mk-bs028', 'ghe-tap-bung-mk-bs20856.jpg', 1450000, 'Thông tin ghế tập bụng đa năng MK-BS028.\r\n- Mã sản phẩm: MK-BS028.\r\n\r\n- Đơn vị nhập khẩu: Thiên Trường Sport.\r\n\r\n- Xuất xứ: Trung Quốc.', '- Ghế tập bụng đa năng MK-BS028 được thiết kế chắc chắn, có chức năng điều chỉnh độ dốc dễ dàng khi sử dụng và tích hợp nhiều bài tập thể hình hiệu quả. Thiết kế chi tiết của mẫu ghế tập bụng này như sau:\r\n\r\n+ Khung chính của ghế làm từ thép hộp 40 x 40mm, dày 1.2mm và chịu được tải trọng lên tới 150kg.', 0, 14),
(43, 15, 'Áo Ngắn Tay Thể Thao nam PAVO AH1', 0, 'ao-ngan-tay-the-thao-nam-pavo-ah1', 'ao-thun-the-thao-nam-ah1-4-283.jpg', 275000, 'Mô tả áo ngắn tay thể thao nam\r\nChất liệu: 88% Polyester, 12% spandex\r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần\r\nĐường may: 4 kim tinh tế, sắc sảo\r\nThiết kế: Form ôm', 'Đặc điểm nổi bật:\r\nCo giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng\r\nPhong cách althei-sure năng động', 0, 17),
(44, 15, 'Áo Ngắn Tay Tập Gym Yoga nam PAVO AA10', 0, 'ao-ngan-tay-tap-gym-yoga-nam-pavo-aa10', 'Ao-Ngan-Tay-Tap-Gym-Yoga-nam-ICADO-AA10-658.jpg', 280000, 'Mô tả áo ngắn tay tập gym yoga nam\r\nChất liệu: 88% Polyester, 12% spandex\r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần\r\nĐường may: 4 kim tinh tế, sắc sảo\r\nThiết kế: Form ôm', 'Co giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng\r\nPhong cách althei-sure năng động', 0, 17),
(45, 15, 'Áo Ngắn Tay nam PAVOAT5', 31, 'ao-ngan-tay-nam-pavoat5', 'ao-ngan-tay-nam-icado-at564.jpg', 280000, 'Mô tả áo ngắn tay tập gym yoga nam\r\nChất liệu: 88% Polyester, 12% spandex\r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần\r\nĐường may: 4 kim tinh tế, sắc sảo\r\nThiết kế: Form ôm', 'Đặc điểm nổi bật:\r\nCo giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng\r\nPhong cách althei-sure năng động', 0, 17),
(46, 15, 'Quần Đùi Tập Gym Yoga Nam PAVO 2 lớp AT3', 18, 'quan-dui-tap-gym-yoga-nam-pavo-2-lop-at3', 'Q44.jpg', 320000, 'Mô tả quần đùi tập gym yoga nam\r\nChất liệu: 88% Polyester, 12% spandex\r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần\r\nĐường may: 4 kim tinh tế, sắc sảo\r\nThiết kế: Form ôm', 'Đặc điểm nổi bật:\r\nCo giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng\r\nPhong cách althei-sure năng động', 0, 17),
(47, 15, 'Quần đùi Tập Gym Yoga Nam PAVO AT8', 20, 'quan-dui-tap-gym-yoga-nam-pavo-at8', 'QN11242-Q66.jpg', 265000, 'Mô tả quần dài tập gym yoga nam\r\nChất liệu: 88% Polyester, 12% spandex\r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần\r\nĐường may: 4 kim tinh tế, sắc sảo\r\nThiết kế: Form ôm', 'Đặc điểm nổi bật:\r\nCo giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng\r\nPhong cách althei-sure năng động', 0, 17),
(48, 15, 'Quần Dài Thể Thao nam JOGGER SỌC LƯỚI SG9', 12, 'quan-dai-the-thao-nam-jogger-soc-luoi-sg9', 'quan-dai-joger-tap-gym-yoga-nam-soc-luoi-sg9-hinh-5-166.jpg', 290000, 'Mô tả áo khoác tập gym yoga nam\r\nChất liệu: 88% Polyester, 12% spandex\r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần\r\nĐường may: 4 kim tinh tế, sắc sảo\r\nThiết kế: Form ôm', 'Đặc điểm nổi bật:\r\nCo giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng\r\nPhong cách althei-sure năng động', 0, 17),
(49, 15, 'Quần Đùi tập gym yoga nam PAVO AT4', 0, 'quan-dui-tap-gym-yoga-nam-pavo-at4', 'TGDT13234678.jpg', 265000, 'Mô tả quần đùi tập gym yoga nam\r\nChất liệu: 88% Polyester, 12% spandex\r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần\r\nĐường may: 4 kim tinh tế, sắc sảo\r\nThiết kế: Form ôm', 'Đặc điểm nổi bật:\r\nCo giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng\r\nPhong cách althei-sure năng động', 0, 17),
(50, 15, 'Áo Ngắn Tay Tập Gym Yoga nam Icado AH1', 0, 'ao-ngan-tay-tap-gym-yoga-nam-icado-ah1', 'ao-thun-the-thao-nam-ah1-3-400x50041.jpg', 295000, 'Mô tả áo khoác tập gym yoga nam\r\nChất liệu: 88% Polyester, 12% spandex\r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần\r\nĐường may: 4 kim tinh tế, sắc sảo\r\nThiết kế: Form ôm', 'Đặc điểm nổi bật:\r\nCo giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng\r\nPhong cách althei-sure năng động', 0, 17),
(51, 15, 'Áo Ba Lỗ Thể Thao Yoga nam Pavo AT1', 0, 'ao-ba-lo-the-thao-yoga-nam-pavo-at1', 'ao-ba-lo-the-thao-yoga-nam-pavo-at1-400x50067.jpg', 250000, 'Mô tả áo ba lỗ tập gym yoga nam\r\nChất liệu: 88% Polyester, 12% spandex\r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần\r\nĐường may: 4 kim tinh tế, sắc sảo\r\nThiết kế: Form ôm', 'Đặc điểm nổi bật:\r\nCo giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng\r\nPhong cách althei-sure năng động', 0, 17),
(52, 15, 'Áo Ngắn Tay Thể Thao nam ICADO AT2', 10, 'ao-ngan-tay-the-thao-nam-icado-at2', 'set-nam-ao-ngan-tay-icado-at2-quan-dui-icado-phoi-tui-at4-477.jpg', 265000, 'Mô tả áo ngắn tay thể thao nam\r\nChất liệu: 88% Polyester, 12% spandex\r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần\r\nĐường may: 4 kim tinh tế, sắc sảo\r\nThiết kế: Form ôm', 'Đặc điểm nổi bật:\r\nCo giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng\r\nPhong cách althei-sure năng động', 0, 17),
(53, 17, 'Áo Tanktop Tập Gym Yoga Nữ Icado SG2', 21, 'ao-tanktop-tap-gym-yoga-nu-icado-sg2', 'TANKTOP-ICADO-SG2-838.png', 150000, 'Mô tả áo tanktop thể thao nữ\r\nChất liệu: 88% Polyester, 12% spandex\r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần\r\nĐường may: 4 kim tinh tế, sắc sảo\r\nThiết kế: Form ôm', 'Đặc điểm nổi bật:\r\nCo giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng\r\nPhong cách althei-sure năng động', 0, 16),
(54, 17, 'Áo Bra tập gym yoga nữ Dệt CH14', 22, 'ao-bra-tap-gym-yoga-nu-det-ch14', 'BR21237-BRA-DET-CH148.jpg', 165000, 'Mô tả áo khoác tập gym yoga nữ\r\nChất liệu: 88% Polyester, 12% spandex\r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần\r\nĐường may: 4 kim tinh tế, sắc sảo\r\nThiết kế: Form ôm', 'Đặc điểm nổi bật:\r\nCo giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng\r\nPhong cách althei-sure năng động', 0, 16),
(55, 17, 'Áo Ngắn Tay Nữ ICADO phối tay AT12', 22, 'ao-ngan-tay-nu-icado-phoi-tay-at12', 'ACT-NU-ICADO-PHOI-LUOI-TAY-AT1298.jpg', 265000, 'Mô tả áo ngắn tay tập gym yoga nữ\r\nChất liệu: 88% Polyester, 12% spandex\r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần\r\nĐường may: 4 kim tinh tế, sắc sảo\r\nThiết kế: Form ôm', 'Đặc điểm nổi bật:\r\nCo giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng\r\nPhong cách althei-sure năng động', 0, 16),
(56, 17, 'Áo Tanktop Tập Gym Yoga nữ lưới Icado HN4', 30, 'ao-tanktop-tap-gym-yoga-nu-luoi-icado-hn4', '173.jpg', 250000, 'Mô tả áo khoác tập gym yoga nữ\r\nChất liệu: 88% Polyester, 12% spandex\r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần\r\nĐường may: 4 kim tinh tế, sắc sảo\r\nThiết kế: Form ôm', 'Đặc điểm nổi bật:\r\nCo giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng\r\nPhong cách althei-sure năng động', 0, 16),
(57, 17, 'Áo Ngắn Tay Nữ ICADO dây rút AT8', 30, 'ao-ngan-tay-nu-icado-day-rut-at8', 'Ao-Ngan-Tay-Nu-ICADO-day-rut-AT881.jpg', 265000, 'Mô tả áo ngắn tay tập gym yoga nữ\r\nChất liệu: 88% Polyester, 12% spandex\r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần\r\nĐường may: 4 kim tinh tế, sắc sảo\r\nThiết kế: Form ôm', 'Đặc điểm nổi bật:\r\nCo giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng\r\nPhong cách althei-sure năng động', 0, 16),
(58, 17, 'Áo Tanktop Tập Gym Yoga nữ Lưới HN2', 50, 'ao-tanktop-tap-gym-yoga-nu-luoi-hn2', 'ao-tanktop-tap-gym-yoga-nu-li-hn269.jpg', 270000, 'Mô tả áo khoác tập gym yoga nữ\r\nChất liệu: 88% Polyester, 12% spandex\r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần\r\nĐường may: 4 kim tinh tế, sắc sảo\r\nThiết kế: Form ôm', 'Đặc điểm nổi bật:\r\nCo giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng\r\nPhong cách althei-sure năng động', 0, 16),
(59, 17, 'Quần dài tập gym yoga nữ ICADO phối lưới QD-38', 63, 'quan-dai-tap-gym-yoga-nu-icado-phoi-luoi-qd-38', 'ArtboarQ54.jpg', 295000, 'Mô tả quần tập gym yoga nữ <br>\r\nChất liệu: 88% Polyester, 12% spandex<br>\r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần<br>\r\nĐường may: 4 kim tinh tế, sắc sảo<br>\r\nThiết kế: Form ôm<br>', 'Đặc điểm nổi bật:<br>\r\nCo giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện<br>\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt<br>\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng<br>\r\nPhong cách althei-sure năng động<br>', 0, 16),
(60, 17, 'Áo Ba Lỗ Tập Gym Yoga nữ ICADO AT2', 21, 'ao-ba-lo-tap-gym-yoga-nu-icado-at2', 'ao-ba-lo-tap-gym-yoga-nu-icado-at265.jpg', 235000, 'Mô tả áo ba lỗ tập gym yoga nữ\r\nChất liệu: 88% Polyester, 12% spandex\r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần\r\nĐường may: 4 kim tinh tế, sắc sảo\r\nThiết kế: Form ôm', 'Đặc điểm nổi bật:\r\nCo giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng\r\nPhong cách althei-sure năng động', 0, 16),
(61, 17, 'Áo Ba Lỗ nữ Icado AT1', 30, 'ao-ba-lo-nu-icado-at1', 'ao-ba-lo-tap-gym-nu-at139.jpg', 200000, 'Mô tả áo ba lỗ tập gym yoga nữ\r\nChất liệu: 88% Polyester, 12% spandex\r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần\r\nĐường may: 4 kim tinh tế, sắc sảo\r\nThiết kế: Form ôm', 'Đặc điểm nổi bật:\r\nCo giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng\r\nPhong cách althei-sure năng động', 0, 16),
(62, 17, 'Áo Ngắn Tay tập gym yoga Nữ ICADO AT11', 30, 'ao-ngan-tay-tap-gym-yoga-nu-icado-at11', 'Ao-Ngan-Tay-tap-gym-yoga-Nu-ICADO-AT1180.jpg', 250000, 'Mô tả áo ngắn tay tập gym yoga nữ\r\nChất liệu: 88% Polyester, 12% spandex\r\nSợi vải coolmax. Làm mát và thoáng khí x2 lần\r\nĐường may: 4 kim tinh tế, sắc sảo\r\nThiết kế: Form ôm', 'Đặc điểm nổi bật:\r\nCo giãn 4 chiều, tăng độ đàn hồi bảo vệ cơ khi tập luyện\r\nThấm hút mồ hôi, thoáng mát và khử mùi tốt\r\nChống tia UV cực tốt, bảo vệ da, không bị kích ứng\r\nPhong cách althei-sure năng động', 0, 16),
(65, 14, 'Bộ dây tập thể lực 5 màu', 30, 'bo-day-tap-the-luc-5-mau', 'bo-day-dan-hoi-tap-the-hinh-resistantband56.jpg', 390000, '+ 01 sợi dây màu vàng có lực đàn hồi tương đương 10 Lbs.\r\n\r\n+ 01 sợi dây màu xanh lam có lực đàn hồi tương đương 15 Lbs.\r\n\r\n+ 01 sợi dây màu đỏ có lực đàn hồi tương đương 20 Lbs.\r\n\r\n+ 01 sợi dây màu xanh lục có lực đàn hồi tương đương 25 Lbs.\r\n\r\n+ 01 sợi dây màu đen có lực đàn hồi tương đương 30 Lbs.', 'Thông tin dây đàn hồi tập thể hình Resistant Band.\r\n- Mã sản phẩm: Resistant Band.\r\n\r\n- Xuất xứ: Trung Quốc.', 0, 15),
(66, 14, 'Đĩa tập thăng bằng', 30, 'dia-tap-thang-bang', 'dia-tap-thang-bang95.jpg', 395000, 'hông tin đĩa tập thăng bằng.\r\n- Mã sản phẩm: DTTB.\r\n\r\n- Xuất xứ: Trung Quốc.', 'Đĩa tập thăng bằng được làm từ chất liệu nhựa ABS, khả năng chịu lực cao và hỗ trợ các bài tập giúp tăng khả năng giữ thăng bằng, giúp giảm cân hiệu quả. Thiết kế chi tiết của đĩa tập thăng bằng gồm có:', 0, 15),
(67, 14, 'Găng tay tập Gym HJ-C1007', 21, 'gang-tay-tap-gym-hj-c1007', 'gang-tay-tap-gym-hj-c100772.jpg', 390000, 'Thông tin găng tay tập Gym HJ-C1007.\r\n- Mã sản phẩm: HJ-C1007.\r\n\r\n- Thương hiệu: Huijun.\r\n\r\n- Xuất xứ: Trung Quốc.', '- Găng tay tập Gym HJ-C1007 chính hãng Huijun được thiết kế đẹp, may chắc chắn từ chất liệu da + vải lưới và có tác dụng bảo vệ tay khi nâng tạ, tập Gym. Thiết kế chi tiết của găng tay tập Gym như sau:', 0, 15),
(68, 14, 'Dụng cụ hít đất', 20, 'dung-cu-hit-dat', 'hinh-anh-dung-cu-hit-dat-Iron-Push-Up-Bar35.jpg', 100000, 'Thông tin dụng cụ hít đất.\r\n- Mã sản phẩm: DCHD.\r\n\r\n- Thương hiệu: Pro Sport Land.\r\n\r\n- Xuất xứ: Việt Nam.', '- Kích thước lắp đặt (1 bên): 23 x 18 x 15.5 cm (dài x rộng x cao).\r\n\r\n- Kích thước hộp đựng: 24 x 8 x 15.5 cm.\r\n\r\n- Trọng lượng bộ hít đất: 1.2 kg.\r\n\r\n- Trọng lượng người tập tối đa: 110 kg.\r\n\r\n- Dụng cụ hít đất phù hợp sử dụng để tập Gym, tập thể hình và thể lực hiệu quả tại nhà.', 0, 15),
(69, 14, 'Dụng cụ tập Gym TRX Rip Trainer', 21, 'dung-cu-tap-gym-trx-rip-trainer', 'Dung-cu-tap-Gym-TRX-Rip-Trainer64.jpg', 990000, 'Thông tin dụng cụ tập Gym TRX Rip Trainer.\r\n- Mã: Rip Trainer.\r\n\r\n- Thương hiệu: TRX.\r\n\r\n- Xuất xứ: Trung Quốc.', '- Dụng cụ tập Gym TRX Rip Trainer hỗ trợ tập thể lực, giúp tập giảm béo và làm săn chắc cơ bắp hiệu quả. Bộ dụng cụ TRX Rip Trainer gồm có:\r\n\r\n+ 01 gậy được làm từ thép, sơn tĩnh điện và bọc mút ở 2 đầu tay cầm cực giúp tránh chai tay khi tập luyện lâu ngày.', 0, 15),
(70, 14, 'Tập chống đẩy Perfect Push Up', 21, 'tap-chong-day-perfect-push-up', 'Tap-chong-day-Perfect-Push-Up55.jpg', 350000, 'Thông tin tập chống đẩy Perfect Push Up.\r\n- Mã sản phẩm: Perfect Push Up.\r\n\r\n- Xuất xứ: Trung Quốc.', '- Tập chống đẩy Perfect Push Up được thiết kế chắc chắn, có thể xoay cổ tay khi tập và hỗ trợ nhiều động tác tập hít đất hiệu quả tại nhà. Cấu tạo chi tiết của tập chống đẩy gồm:\r\n\r\n+ Phần khung làm từ nhựa ABS cao cấp chịu lực tốt và cực bền.', 0, 15),
(71, 11, 'Tay kéo xô đôi TT03', 44, 'tay-keo-xo-doi-tt03', 'Tay-keo-xo-doi-TT0336.jpg', 350000, 'Thông tin tay kéo xô đôi TT03. <br>\r\n- Mã sản phẩm: TT03.<br>\r\n\r\n- Hãng nhập khẩu: Thiên Trường Sport.<br>\r\n\r\n- Xuất xứ: Trung Quốc.<br>', 'Tay kéo xô đôi TT03 được làm từ thép cao cấp, mạ inox sáng bóng và tay cầm bọc cao su giúp cầm êm, chắc hơn khi sử dụng.<br>\r\n\r\n- Màu sắc:<br>\r\n\r\n+ Khung thép đươc mạ inox màu sáng bóng.<br>\r\n\r\n+ Tay cầm bọc cao su màu đen.<br>', 0, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id_role`, `name`) VALUES
(1, 'admin'),
(2, 'customer'),
(3, 'author');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping`
--

CREATE TABLE `shipping` (
  `id_shipping` int(11) NOT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `shipping_address` text NOT NULL,
  `shipping_phone` int(10) NOT NULL,
  `shipping_email` varchar(255) NOT NULL,
  `shipping_method` int(11) DEFAULT NULL COMMENT 'dung de danh dau don hang van chuyen hay chua',
  `shipping_note` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shipping`
--

INSERT INTO `shipping` (`id_shipping`, `shipping_name`, `id_users`, `shipping_address`, `shipping_phone`, `shipping_email`, `shipping_method`, `shipping_note`, `created_at`, `update_at`) VALUES
(114, 'Admin', 19, 'Quận Thủ Đức Thành Phố Hồ chí minh', 974135239, 'admin1@gmail.com', 0, NULL, '2021-08-24 19:24:45', NULL),
(115, 'Admin', 19, 'Quận Thủ Đức Thành Phố Hồ chí minh', 974135239, 'admin1@gmail.com', 0, NULL, '2021-08-24 19:27:02', NULL),
(116, 'Admin', 19, 'Quận Thủ Đức Thành Phố Hồ chí minh', 974135239, 'admin1@gmail.com', 0, NULL, '2021-08-24 19:39:39', NULL),
(117, 'Admin', 19, 'Quận Thủ Đức Thành Phố Hồ chí minh', 974135239, 'admin1@gmail.com', 0, NULL, '2021-08-24 19:40:40', NULL),
(118, 'Admin', 19, 'Quận Thủ Đức Thành Phố Hồ chí minh', 974135239, 'admin1@gmail.com', 0, NULL, '2021-08-24 19:42:05', NULL),
(119, 'Admin', 19, 'Quận Thủ Đức Thành Phố Hồ chí minh', 974135239, 'admin1@gmail.com', 0, NULL, '2021-08-24 19:43:33', NULL),
(120, 'phan ha', 1, 'Xã Hợp Thành, Huyện Yên Thành Tỉnh Nghệ An', 974135239, 'phanvanha1234567@gmail.com', 0, NULL, '2021-08-25 02:36:14', NULL),
(121, 'phan ha', 1, 'Xã Hợp Thành, Huyện Yên Thành Tỉnh Nghệ An', 974135239, 'phanvanha1234567@gmail.com', 0, NULL, '2021-08-26 19:52:23', NULL),
(122, 'phan ha', 1, 'Xã Hợp Thành, Huyện Yên Thành Tỉnh Nghệ An', 974135239, 'phanvanha1234567@gmail.com', 0, NULL, '2021-08-26 22:01:41', NULL),
(123, 'phan ha', 1, 'Xã Hợp Thành, Huyện Yên Thành Tỉnh Nghệ An', 974135239, 'phanvanha1234567@gmail.com', 0, NULL, '2021-08-26 22:04:52', NULL),
(124, 'phan ha', 1, 'Xã Hợp Thành, Huyện Yên Thành Tỉnh Nghệ An', 974135239, 'phanvanha1234567@gmail.com', 0, NULL, '2021-08-27 03:03:13', NULL),
(125, 'phan ha', 1, 'Xã Hợp Thành, Huyện Yên Thành Tỉnh Nghệ An', 974135239, 'phanvanha1234567@gmail.com', 0, NULL, '2021-08-27 03:08:26', NULL),
(126, 'Phan Văn Hà', 24, 'Man Thiện', 974135239, 'phanha@gmail.com', 0, 'số 97', '2021-08-27 07:11:54', NULL),
(127, 'Phan Văn Hà', 24, 'Man Thiện', 974135239, 'phanha@gmail.com', 0, NULL, '2021-08-27 07:16:04', NULL),
(128, 'Phan Văn Hà', 24, 'Man Thiện', 974135239, 'phanha@gmail.com', 0, NULL, '2021-08-27 07:17:19', NULL),
(129, 'phan ha', 1, 'Xã Hợp Thành, Huyện Yên Thành Tỉnh Nghệ An', 974135239, 'phanvanha1234567@gmail.com', 0, NULL, '2021-08-27 07:17:21', NULL),
(130, 'Phan Văn Hà', 24, 'Man Thiện', 974135239, 'phanha@gmail.com', 0, NULL, '2021-08-27 07:20:37', NULL),
(131, 'Phan Văn Hà', 24, 'Man Thiện', 974135239, 'phanha@gmail.com', 0, NULL, '2021-08-27 07:20:48', NULL),
(132, 'Phan Văn Hà', 24, 'Man Thiện', 974135239, 'phanha@gmail.com', 0, NULL, '2021-08-27 07:30:46', NULL),
(133, 'Phan Văn Hà', 24, 'Man Thiện', 974135239, 'phanha@gmail.com', 0, NULL, '2021-08-27 07:31:04', NULL),
(134, 'phan ha', 1, 'Xã Hợp Thành, Huyện Yên Thành Tỉnh Nghệ An', 974135239, 'phanvanha1234567@gmail.com', 0, NULL, '2021-08-27 07:35:41', NULL),
(135, 'Phan Văn Hà', 24, 'Man Thiện', 974135239, 'phanha@gmail.com', 0, NULL, '2021-08-27 07:42:40', NULL),
(136, 'phan ha', 1, 'Xã Hợp Thành, Huyện Yên Thành Tỉnh Nghệ An', 974135239, 'phanvanha1234567@gmail.com', 0, NULL, '2021-08-27 07:42:48', NULL),
(137, 'phan ha', 1, 'Xã Hợp Thành, Huyện Yên Thành Tỉnh Nghệ An', 974135239, 'phanvanha1234567@gmail.com', 0, NULL, '2021-08-28 06:55:34', NULL),
(138, 'phan ha', 1, 'Xã Hợp Thành, Huyện Yên Thành Tỉnh Nghệ An', 974135239, 'phanvanha1234567@gmail.com', 0, NULL, '2021-08-28 20:31:55', NULL),
(139, 'phan ha', 1, 'Xã Hợp Thành, Huyện Yên Thành Tỉnh Nghệ An', 974135239, 'phanvanha1234567@gmail.com', 0, NULL, '2021-08-29 23:28:15', NULL),
(140, 'phan văn hà', 20, 'A8, Khu cảnh vệ,Đường man thiện,Phường tăng nhơn phú a, Thành Phố Thủ Đức', 974135239, 'phanvanha01234567@gmail.com', 0, NULL, '2021-08-30 01:35:22', NULL),
(141, 'Test', 25, 'Test', 985485365, 'test@gmail.com', 0, NULL, '2021-08-30 02:58:01', NULL),
(142, 'Admin', 19, 'Quận Thủ Đức Thành Phố Hồ chí minh', 974135239, 'admin1@gmail.com', 0, NULL, '2021-08-30 21:11:06', NULL),
(143, 'phan ha', 1, 'Xã Hợp Thành, Huyện Yên Thành Tỉnh Nghệ An', 974135239, 'phanvanha1234567@gmail.com', 0, NULL, '2021-09-01 01:06:44', NULL),
(144, 'Admin', 19, 'Quận Thủ Đức Thành Phố Hồ chí minh', 974135239, 'admin1@gmail.com', 0, NULL, '2021-09-01 04:31:36', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id_type` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `type_image` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `meta_keywords` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id_type`, `name`, `type_image`, `slug`, `description`, `meta_keywords`, `status`) VALUES
(14, 'Thiết bị tập gym', 'Hinh-anh-may-chay-bo-dien-gia-bao-nhieu-147.jpg', 'thiet-bi-tap-gym', 'thiết bị tập gym', 'thiết bị tập gym', 0),
(15, 'Phụ kiện tập gym', 'Artboard-10-383.jpg', 'phu-kien-tap-gym', 'thiết bị tập gym', 'thiết bị tập gym', 0),
(16, 'đồ tập gym nữ', 'set-do-tap-nu-ao-icado-at12-quan-dai-icado-qd36-238.jpg', 'do-tap-gym-nu', 'đồ tập gym nữ', 'đồ tập gym nữ', 0),
(17, 'đồ tập gym nam', 'ACT11240-ACT-NAM-PAVO-AT5-29.jpg', 'do-tap-gym-nam', 'dụng cụ tập gym', 'dụng cụ tập gym', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `fullname` varchar(250) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `address` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_users`, `id_role`, `fullname`, `email`, `password`, `phone`, `address`) VALUES
(1, 1, 'phan ha', 'phanvanha1234567@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 974135239, 'Xã Hợp Thành, Huyện Yên Thành Tỉnh Nghệ An'),
(2, 1, 'phan van ha', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 974135239, NULL),
(19, 2, 'Admin', 'admin1@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 974135239, 'Quận Thủ Đức Thành Phố Hồ chí minh'),
(20, 2, 'phan văn hà', 'phanvanha01234567@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 974135239, 'A8, Khu cảnh vệ,Đường man thiện,Phường tăng nhơn phú a, Thành Phố Thủ Đức'),
(21, 2, 'PHan Văn Hà', 'phanvanha123444567@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 974135239, NULL),
(22, 2, 'phan ha', 'phanvanha@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 974135239, 'A8 Man Thiện'),
(24, 2, 'Phan Văn Hà', 'phanha@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 974135239, 'Man Thiện'),
(25, 2, 'Test', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 985485365, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_users` (`id_users`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`),
  ADD KEY `id_brand` (`id_brand`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_products` (`id_products`);

--
-- Chỉ mục cho bảng `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_code`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_users_2` (`id_users`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_products` (`payment_id`),
  ADD KEY `id_shipping` (`id_shipping`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id_order_details`),
  ADD KEY `id_orders` (`id_order_details`),
  ADD KEY `id_products` (`id_products`),
  ADD KEY `id_products_2` (`id_products`),
  ADD KEY `id_orders_2` (`id_orders`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `id` (`payment_id`),
  ADD KEY `id_order` (`id_order`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_products`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_products` (`id_products`),
  ADD KEY `id_brand` (`id_brand`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Chỉ mục cho bảng `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id_shipping`),
  ADD KEY `id_shipping` (`id_shipping`),
  ADD KEY `id_users` (`id_users`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id_type`),
  ADD KEY `id_type` (`id_type`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id_order_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id_shipping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id_type` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_products`) REFERENCES `products` (`id_products`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_shipping`) REFERENCES `shipping` (`id_shipping`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_4` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`payment_id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`id_products`) REFERENCES `products` (`id_products`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`id_orders`) REFERENCES `order` (`id_order`);

--
-- Các ràng buộc cho bảng `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id_brand`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id_type`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `shipping_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

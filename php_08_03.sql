-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th7 28, 2021 lúc 03:01 AM
-- Phiên bản máy phục vụ: 5.7.24
-- Phiên bản PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php_08_03`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(255) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_thumb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `customer_id`, `product_id`, `price`, `qty`, `product_name`, `product_thumb`) VALUES
(11, 17, 27, 450000, 1, 'Áo sơ mi nam caro', '/uploads/2021/07/26/product-11.jpg'),
(12, 17, 28, 1000000, 1, 'Vest nữ độc quyền', '/uploads/2021/07/26/slide-05.jpg'),
(15, 20, 17, 330000, 1, 'Denim jacket Blue', '/uploads/2021/07/02/item-14.jpg'),
(16, 21, 30, 2000000, 1, 'Vest nam Thời thượng', '/uploads/2021/07/27/blog-02.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_confirm` int(1) NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `message`, `is_confirm`, `updated_at`, `created_at`) VALUES
(2, 'Phạm văn Trí', '0912934132', 'treefarm@gmail.com', 'Y tá', 1, '2021-07-26 10:03:53', '2021-07-26 10:03:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `is_view` int(1) NOT NULL,
  `discount` int(255) NOT NULL,
  `total` int(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `code`, `phone`, `address`, `email`, `note`, `is_view`, `discount`, `total`, `created_at`, `updated_at`) VALUES
(17, 'Phương Huyền Anh', '3bn6nv', '0835111222', '100 Hào Khê', 'huyenanh@gmail.com', '', 1, 0, 0, '2021-07-27 23:33:30', '2021-07-27 23:33:30'),
(20, 'Dương', 'mVu4Vs', '2525234534', '3453dfgdg', 'duong@gmail.com', '36362354', 0, 0, 310000, '2021-07-28 02:28:30', '2021-07-28 02:28:30'),
(21, 'Dương', 'bVlj8F', '123423', '100 Hào Khê', 'thanhduong@gmail.com', 'Giao giờ hành chính', 0, 35000, 1965000, '2021-07-28 02:34:42', '2021-07-28 02:34:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(20) NOT NULL,
  `description` text NOT NULL,
  `order_by` int(20) NOT NULL,
  `active` int(1) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `description`, `order_by`, `active`, `slug`, `created_at`, `updated_at`) VALUES
(24, 'ÁO', 0, 'ÁO', 1, 1, 'ao', '2021-06-23 02:39:48', '2021-06-23 02:39:48'),
(25, 'QUẦN', 0, 'QUẦN', 2, 1, 'quan', '2021-06-23 02:40:06', '2021-06-23 02:40:06'),
(26, 'BALO - TÚI XÁCH', 0, 'BALO, TÚI XÁCH', 3, 1, 'balo-tui-xach', '2021-06-23 02:40:28', '2021-07-26 07:40:11'),
(27, 'GIÀY - DÉP', 28, 'GIÀY DÉP', 4, 1, 'giay-dep', '2021-06-23 02:40:43', '2021-07-17 21:36:54'),
(28, 'PHỤ KIỆN KHÁC', 0, 'ví, thắt lưng, bình nước ...', 5, 1, 'phu-kien-khac', '2021-06-23 02:41:18', '2021-06-23 02:41:18'),
(29, 'ÁO SƠ MI', 24, 'ÁO SƠ MI', 6, 1, 'ao-so-mi', '2021-06-23 02:41:50', '2021-06-23 02:43:06'),
(30, 'ÁO THUN', 24, 'ÁO THUN', 7, 1, 'ao-thun', '2021-06-23 02:42:00', '2021-06-23 02:43:20'),
(31, 'ÁO POLO', 24, 'Áo polo', 8, 1, 'ao-polo', '2021-06-23 02:42:29', '2021-06-23 02:43:24'),
(33, 'QUẦN JEAN', 25, 'quần jean', 10, 1, 'quan-jean', '2021-06-23 02:44:23', '2021-06-23 02:44:23'),
(35, 'QUẦN SHORT', 25, 'quần short', 13, 1, 'quan-short', '2021-06-23 02:44:46', '2021-06-23 02:45:22'),
(37, 'MẮT KÍNH', 28, 'Mắt kính', 16, 1, 'mat-kinh', '2021-06-23 02:46:25', '2021-06-23 02:46:25'),
(38, 'THẮT LƯNG', 28, 'Thắt lưng', 34, 1, 'that-lung', '2021-06-23 02:46:39', '2021-06-23 02:46:39'),
(40, 'ĐỒNG HỒ', 28, 'Đồng hồ đeo tay', 45, 1, 'dong-ho', '2021-06-29 09:24:36', '2021-06-29 09:24:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `sort_by` int(10) NOT NULL,
  `active` int(1) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `author`, `file`, `content`, `url`, `sort_by`, `active`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Món quà ý nghĩa với áo sơ mi nam cho các chàng trai', 'Nancy Ward', '/uploads/2021/07/01/blog-03.jpg', '&lt;p&gt;Bạn đ&amp;atilde; bao giờ cảm thấy đau đầu v&amp;igrave; kh&amp;ocirc;ng biết phải tặng g&amp;igrave; cho c&amp;aacute;c ch&amp;agrave;ng trai của m&amp;igrave;nh trong c&amp;aacute;c dịp đặc biệt như sinh nhật, kỷ niệm v&amp;agrave; thậm ch&amp;iacute; những ng&amp;agrave;y b&amp;igrave;nh thường. Shop Quần &amp;Aacute;o Nam L2H Store tin rằng &amp;aacute;o sơ mi nam sẽ l&amp;agrave; một lựa chọn ho&amp;agrave;n hảo kh&amp;ocirc;ng chỉ về kiểu d&amp;aacute;ng m&amp;agrave; c&amp;ograve;n &amp;yacute; nghĩa ẩn chứa trong sản phẩm nữa đấy nha!!! &amp;Aacute;o sơ mi một items lu&amp;ocirc;n gắn liền với nam giới, mang đến cho người mặc trở n&amp;ecirc;n trẻ trung hơn v&amp;agrave; kh&amp;ocirc;ng k&amp;eacute;m phần lịch l&amp;atilde;m. Đặc biệt, cứ ch&amp;agrave;ng trai n&amp;agrave;o bận &amp;aacute;o sơ mi nam l&amp;agrave; auto trở th&amp;agrave;nh so&amp;aacute;i ca trong mắt của chị em phụ nữ.&lt;/p&gt;', '', 2, 1, 'mon-qua-y-nghia-voi-ao-so-mi-nam-cho-cac-chang-trai', '2021-06-30 15:29:09', '2021-07-26 07:22:02'),
(3, '5 TIPS ĐƠN GIẢN LẤY LẠI VÓC DÁNG SAU TẾT NHANH CHÓNG', 'Nancy Ward', '/uploads/2021/07/26/blog-09.jpg', '&lt;p&gt;Sau một khoảng thời gian nghỉ Tết d&amp;agrave;i dẳng, chắc hẳn ai trong số ch&amp;uacute;ng ta đều rất vui vẻ &amp;amp; thoải m&amp;aacute;i c&amp;ugrave;ng bạn b&amp;egrave;, gia đ&amp;igrave;nh v&amp;agrave; người th&amp;acirc;n.&lt;/p&gt;\r\n\r\n&lt;p&gt;Tất nhi&amp;ecirc;n việc lấy lại v&amp;oacute;c d&amp;aacute;ng lu&amp;ocirc;n l&amp;agrave; t&amp;acirc;m điểm của mọi người ngay l&amp;uacute;c n&amp;agrave;y. Thấu hiểu được điều đ&amp;oacute; L2H Store bất m&amp;iacute; cho c&amp;aacute;c ch&amp;agrave;ng trai&lt;/p&gt;\r\n\r\n&lt;p&gt;5 TIPs đơn giản lấy lại v&amp;oacute;c d&amp;aacute;ng sau Tết nhanh ch&amp;oacute;ng.rước c&amp;aacute;c bữa ăn ch&amp;iacute;nh bạn n&amp;ecirc;n ăn nhẹ bằng c&amp;aacute;c thực phẩm như rau củ, điều n&amp;agrave;y&lt;/p&gt;\r\n\r\n&lt;p&gt;sẽ gi&amp;uacute;p bạn hạn chế lượng tinh bột v&amp;agrave; đồ ăn dầu mỡ nạp v&amp;agrave;o cơ thể c&amp;ugrave;ng với việc đảm bảo qu&amp;aacute; tr&amp;igrave;nh giảm c&amp;acirc;n tập luyện của bạn một c&amp;aacute;ch hiệu quả hơn.&lt;/p&gt;\r\n\r\n&lt;p&gt;Nếu Tết bạn đ&amp;atilde; lỡ tay qu&amp;aacute; ch&amp;eacute;n lượng đồ ăn đầy dầu mỡ v&amp;agrave;o cơ thể th&amp;igrave; đ&amp;acirc;y sẽ l&amp;agrave; c&amp;aacute;ch gi&amp;uacute;p bạn ngon miệng hơn v&amp;agrave; nhanh ch&amp;oacute;ng l&amp;aacute;i lại v&amp;oacute;c d&amp;aacute;ng.&lt;/p&gt;', '', 1, 1, '5-tips-don-gian-lay-lai-voc-dang-sau-tet-nhanh-chong', '2021-06-30 15:29:56', '2021-07-26 07:38:50'),
(5, 'Hành động vì cộng đồng cùng cửa hàng với chương trình', 'Nguyễn Thành Dương', '/uploads/2021/07/26/blog-08.jpg', '&lt;p style=&quot;text-align:justify&quot;&gt;&lt;span style=&quot;font-size:16px&quot;&gt;H&amp;agrave;nh động v&amp;igrave; cộng đồng c&amp;ugrave;ng L2H Store với chương tr&amp;igrave;nh &amp;quot;Mặc Xanh - Thu Nhận Đồ Cũ&amp;quot; trong năm 2021&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;&lt;span style=&quot;font-size:16px&quot;&gt;Chương tr&amp;igrave;nh &amp;quot;Mặc Xanh - Thu Nhận Đồ Cũ&amp;quot; l&amp;agrave; một trong những hoạt động đầu ti&amp;ecirc;n của thương hiệu thời trang nam L2H Store được khởi động v&amp;igrave; mục đ&amp;iacute;ch cộng đồng, cũng như g&amp;oacute;p phần x&amp;acirc;y dựng cuộc sống tốt đẹp hơn.&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;&lt;img src=&quot;https://file.hstatic.net/1000253775/file/389c4936d36c2132787d_5a9be9aa8cac4c7b8325768ed8b7590d_grande.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;div&gt;\r\n&lt;p style=&quot;text-align:justify&quot;&gt;&lt;span style=&quot;font-size:16px&quot;&gt;Thời trang l&amp;agrave; những m&amp;oacute;n đồ v&amp;ocirc; c&amp;ugrave;ng quen thuộc v&amp;agrave; quan trọng với tất cả ch&amp;uacute;ng ta nhưng lại t&amp;igrave;nh cờ dễ d&amp;agrave;ng bị l&amp;atilde;ng qu&amp;ecirc;n trong tận c&amp;ugrave;ng tủ đồ v&amp;agrave; trở n&amp;ecirc;n l&amp;atilde;ng ph&amp;iacute; sau khoảng thời gian sử dụng. Đ&amp;oacute; l&amp;agrave; một trong những l&amp;yacute; do để L2H Store khởi động c&amp;aacute;c chương tr&amp;igrave;nh v&amp;igrave; cộng động trong khoảng thời gian qua. Năm 2020, thương hiệu thời trang nam L2H Store đ&amp;atilde; chung tay quy&amp;ecirc;n g&amp;oacute;p ủng hộ đồng b&amp;agrave;o miền Trung chịu ảnh hưởng nghi&amp;ecirc;m trọng bởi thời tiết với chương tr&amp;igrave;nh &amp;quot;Chung Tay Quy&amp;ecirc;n G&amp;oacute;p Ủng Hộ Đồng B&amp;agrave;o Miền Trung&amp;quot;. Mỗi sản phẩm b&amp;aacute;n ra L2H Store cam kết sẽ tr&amp;iacute;ch 10.000 VND để tham gia ủng hộ người d&amp;acirc;n miền Trung đang bị b&amp;atilde;o lụt, qua đ&amp;oacute; t&amp;iacute;ch lũy được 50.000.000 VND c&amp;ugrave;ng với số lượng lớn quần &amp;aacute;o. Với số tiền t&amp;iacute;ch lũy v&amp;agrave; những m&amp;oacute;n quần &amp;aacute;o được thu về, L2H Store đ&amp;atilde; gửi đến ca sĩ Thủy Ti&amp;ecirc;n c&amp;ugrave;ng c&amp;aacute;c trung t&amp;acirc;m từ thiện.&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;&lt;img src=&quot;https://file.hstatic.net/1000253775/file/photo_2019-11-27_19-35-01_6d1823c1c8f848a38b3027fe0a2eccb3_grande.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;&lt;span style=&quot;font-size:16px&quot;&gt;V&amp;agrave;o đầu năm 2021, L2H Store ch&amp;iacute;nh thức khởi động chương tr&amp;igrave;nh v&amp;igrave; cộng đồng &amp;quot;Mặc Xanh - Thu Nhận Đồ Cũ&amp;quot;, được diễn ra tại tất cả c&amp;aacute;c cửa h&amp;agrave;ng L2H Store tr&amp;ecirc;n to&amp;agrave;n quốc từ ng&amp;agrave;y 27/03/2021 đến hết ng&amp;agrave;y 31/03/2021. Mỗi lần đến quy&amp;ecirc;n g&amp;oacute;p quần &amp;aacute;o cũ, thay cho lời cảm ơn L2H Store xin gửi tặng đến qu&amp;yacute; kh&amp;aacute;ch h&amp;agrave;ng voucher ưu đ&amp;atilde;i giảm gi&amp;aacute; 10% (mỗi kh&amp;aacute;ch h&amp;agrave;ng c&amp;oacute; thể đ&amp;oacute;ng g&amp;oacute;p nhiều lần v&amp;agrave; nhận được nhiều voucher). Tất cả quần &amp;aacute;o quy&amp;ecirc;n g&amp;oacute;p được, L2H Store sẽ gửi đến c&amp;aacute;c trung t&amp;acirc;m từ thiện v&amp;agrave; trao đến tận tay người d&amp;acirc;n c&amp;oacute; ho&amp;agrave;n cảnh kh&amp;oacute; khăn ở khu vực v&amp;ugrave;ng s&amp;acirc;u v&amp;ugrave;ng xa.&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;&lt;img src=&quot;https://file.hstatic.net/1000253775/file/photo_2019-11-27_21-38-45_a5873a99937e46da96f4bb1632732e54_grande.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;&lt;span style=&quot;font-size:16px&quot;&gt;L2H Store đặc biệt sở hữu đội ngũ nh&amp;acirc;n vi&amp;ecirc;n trẻ trung, năng động, lu&amp;ocirc;n nhiệt t&amp;igrave;nh v&amp;agrave; chuy&amp;ecirc;n nghiệp. D&amp;ugrave; chẳng phải l&amp;agrave; điều g&amp;igrave; lớn lao hay vĩ đại, nhưng ch&amp;uacute;ng t&amp;ocirc;i hy vọng c&amp;oacute; thể mang đến cho những người d&amp;acirc;n c&amp;oacute; ho&amp;agrave;n cảnh kh&amp;oacute; khăn ch&amp;uacute;t niềm tin v&amp;agrave;o cuộc sống, t&amp;igrave;nh người.&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:center&quot;&gt;&lt;img src=&quot;https://file.hstatic.net/1000253775/file/e97dc3f1bb644b3a1275_9561320932a8403fba4817f96a8a91e2_grande.jpg&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;&lt;span style=&quot;font-size:16px&quot;&gt;Với mục ti&amp;ecirc;u con người lu&amp;ocirc;n l&amp;agrave; yếu tố h&amp;agrave;ng đầu, L2H Store lu&amp;ocirc;n mong muốn v&amp;agrave; kh&amp;ocirc;ng ngừng thực hiện những hoạt động x&amp;atilde; hội bền vững. Qua đ&amp;oacute; kh&amp;ocirc;ng chỉ đ&amp;oacute;ng g&amp;oacute;p cho cộng đồng m&amp;agrave; c&amp;ograve;n gắn kết kh&amp;aacute;ch h&amp;agrave;ng với h&amp;agrave;nh tr&amp;igrave;nh x&amp;acirc;y dựng cuộc sống tốt đẹp hơn v&amp;agrave; c&amp;ugrave;ng nhau lan tỏa y&amp;ecirc;u thương.&lt;/span&gt;&lt;/p&gt;\r\n&lt;/div&gt;', '', 1, 1, 'hanh-dong-vi-cong-dong-cung-cua-hang-voi-chuong-trinh', '2021-07-01 08:28:00', '2021-07-26 10:20:12'),
(6, 'Hướng dẫn chọn size', 'Admin', '/uploads/2021/07/26/blog-05.jpg', '&lt;h3&gt;&lt;span style=&quot;font-size:16px&quot;&gt;&lt;strong&gt;1. Bảng size &amp;aacute;o chuẩn&lt;/strong&gt;&lt;/span&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;Bảng size &amp;aacute;o chuẩn gồm c&amp;oacute;:&lt;br /&gt;\r\n- Chọn &amp;aacute;o c&amp;oacute; size theo c&amp;acirc;n nặng, số đo c&amp;aacute;c v&amp;ograve;ng tr&amp;ecirc;n người như v&amp;ograve;ng 1, v&amp;ograve;ng 2, v&amp;ograve;ng 3 v&amp;agrave; chiều d&amp;agrave;i của &amp;aacute;o.&lt;br /&gt;\r\n- Dựa v&amp;agrave;o th&amp;ocirc;ng số cơ thể, chiều cao, c&amp;acirc;n nặng, bạn c&amp;oacute; thể lựa chọn &amp;aacute;o thun, &amp;aacute;o sơ mi, &amp;aacute;o form xu&amp;ocirc;ng cho c&amp;aacute;c đối tượng dễ d&amp;agrave;ng.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h3&gt;&lt;span style=&quot;font-size:16px&quot;&gt;&lt;strong&gt;2. Chọn size &amp;aacute;o S, M, L ... theo d&amp;aacute;ng người&lt;/strong&gt;&lt;/span&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;T&amp;ugrave;y v&amp;agrave;o từng d&amp;aacute;ng người m&amp;agrave; bạn chọn size &amp;aacute;o cũng kh&amp;aacute;c nhau như:&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;* Chọn size &amp;aacute;o cho người c&amp;oacute; th&amp;acirc;n h&amp;igrave;nh cao to&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Việc chọn &amp;aacute;o c&amp;oacute; size ph&amp;ugrave; hợp cho người c&amp;oacute; th&amp;acirc;n h&amp;igrave;nh cao to được xem l&amp;agrave; đơn giản hơn cả. Bạn cao to, bạn chỉ cần chọn kiểu &amp;aacute;o m&amp;agrave; bạn th&amp;iacute;ch l&amp;agrave; được, kh&amp;ocirc;ng cần quan t&amp;acirc;m đến kiểu &amp;aacute;o kẻ sọc, kẻ ngang hay m&amp;agrave;u sắc của &amp;aacute;o. Nhưng để việc di chuyển, vận động thuận tiện hơn th&amp;igrave; bạn n&amp;ecirc;n chọn chiếc &amp;aacute;o vừa vặn, tr&amp;aacute;nh b&amp;oacute; s&amp;aacute;t lấy người.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;* Chọn size &amp;aacute;o cho người gầy&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;C&amp;oacute; thể chọn &amp;aacute;o cho người gầy kh&amp;oacute; chọn &amp;aacute;o c&amp;oacute; size ph&amp;ugrave; hợp cho người mập. Đặc biệt, nhiều &amp;aacute;o d&amp;ugrave; ghi size nhưng kh&amp;ocirc;ng vừa với người gầy nhưng chiếc &amp;aacute;o size S kh&amp;aacute;c lại vừa. Do đ&amp;oacute;, bạn cần d&amp;agrave;nh thời gian ra để t&amp;igrave;m kiếm, thử đồ. Tốt nhất, với người gầy th&amp;igrave; n&amp;ecirc;n chọn chiếc &amp;aacute;o vừa vặn, kh&amp;ocirc;ng qu&amp;aacute; rộng m&amp;agrave; cũng kh&amp;ocirc;ng qu&amp;aacute; b&amp;oacute;, &amp;ocirc;m s&amp;aacute;t lấy cơ thể bởi chiếc &amp;aacute;o n&amp;agrave;y sẽ gi&amp;uacute;p bạn trở n&amp;ecirc;n c&amp;acirc;n đối hơn. B&amp;ecirc;n cạnh đ&amp;oacute;, bạn cũng c&amp;oacute; thể chọn &amp;aacute;o m&amp;agrave;u s&amp;aacute;ng, sọc ngang, tr&amp;aacute;nh &amp;aacute;o kẻ sọc để tạo ra cảm gi&amp;aacute;c người c&amp;acirc;n đối, đầy đặn hơn.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;* Người c&amp;oacute; th&amp;acirc;n h&amp;igrave;nh nhỏ nhắn, thấp b&amp;eacute;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;Aacute;o&amp;nbsp;size S hoặc XS ph&amp;ugrave; hợp với những người c&amp;oacute; th&amp;acirc;n h&amp;igrave;nh thấp b&amp;eacute;, nhỏ nhắn Bởi kiểu &amp;aacute;o n&amp;agrave;y kh&amp;ocirc;ng qu&amp;aacute; lớn v&amp;agrave; kh&amp;ocirc;ng qu&amp;aacute; nhỏ, mặc v&amp;agrave;o người rất vừa vặn.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;*&amp;nbsp; Người c&amp;oacute; th&amp;acirc;n h&amp;igrave;nh gầy cao&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Những người cao gầy l&amp;agrave; những người c&amp;oacute; th&amp;acirc;n h&amp;igrave;nh c&amp;ograve; hương n&amp;ecirc;n việc kiếm chiếc &amp;aacute;o c&amp;oacute;&amp;nbsp;size ph&amp;ugrave; hợp v&amp;agrave; vừa vặn với th&amp;acirc;n người th&amp;igrave; rất kh&amp;oacute;, thường g&amp;igrave; vừa với chiều d&amp;agrave;i lại khiến bạn mặc rộng th&amp;ugrave;ng th&amp;igrave;nh, c&amp;ograve;n chọn &amp;aacute;o vừa với bề ngang th&amp;acirc;n người th&amp;igrave; &amp;aacute;o đ&amp;oacute; lại cộc. Bạn c&amp;oacute; thể s&amp;aacute;ng tạo bằng c&amp;aacute;ch chọn &amp;aacute;o size L, XL rồi mang đi b&amp;oacute;p chiều rộng lại để chiếc &amp;aacute;o mặc vừa vặn với th&amp;acirc;n người.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h3&gt;&lt;br /&gt;\r\n&lt;span style=&quot;font-size:16px&quot;&gt;&lt;strong&gt;3. Chọn size &amp;aacute;o order dựa v&amp;agrave;o chỉ số của Anh, Mỹ&lt;/strong&gt;&lt;/span&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;&amp;Aacute;o của Mỹ, Anh thường c&amp;oacute; k&amp;iacute;ch thước lớn hơn so với &amp;aacute;o người ch&amp;acirc;u &amp;Aacute; v&amp;agrave; quy định size &amp;aacute;o (sai &amp;aacute;o) cũng kh&amp;aacute;c n&amp;ecirc;n khi bạn mua &amp;aacute;o order của Mỹ, Anh, bạn n&amp;ecirc;n ch&amp;uacute; &amp;yacute;:&lt;br /&gt;\r\n- Với &amp;aacute;o nam: Bạn cần t&amp;iacute;nh theo số đo v&amp;ograve;ng&amp;nbsp; cổ, v&amp;ograve;ng bụng v&amp;agrave; v&amp;ograve;ng ngực.&lt;br /&gt;\r\n- Với &amp;aacute;o nữ: Bạn c&amp;acirc;n t&amp;iacute;nh theo số đo v&amp;ograve;ng ngực, v&amp;ograve;ng 2, v&amp;ograve;ng 3, chiều cao ....&lt;/p&gt;', '', 23, 1, 'huong-dan-chon-size', '2021-07-25 01:07:40', '2021-07-26 07:38:32'),
(7, 'Hướng dẫn Đặt hàng', 'Admin', '/uploads/2021/07/25/blog-06.jpg', '&lt;p&gt;&lt;span style=&quot;font-size:11pt&quot;&gt;&lt;span style=&quot;font-family:Calibri,sans-serif&quot;&gt;T&amp;igrave;m kiếm sản phẩm bạn cần mua bằng một trong c&amp;aacute;ch g&amp;otilde; từ kh&amp;oacute;a&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p dir=&quot;ltr&quot;&gt;&lt;span style=&quot;font-size:11pt&quot;&gt;&lt;span style=&quot;font-family:Calibri,sans-serif&quot;&gt;Tham khảo v&amp;agrave; lựa chọn sản phẩm ph&amp;ugrave; hợp&lt;br /&gt;\r\n&lt;br /&gt;\r\nMột số th&amp;ocirc;ng tin cần biết khi chọn sản phẩm:&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-size:11pt&quot;&gt;&lt;span style=&quot;font-family:Calibri,sans-serif&quot;&gt;H&amp;igrave;nh ảnh, t&amp;ecirc;n sản phẩm&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-size:11pt&quot;&gt;&lt;span style=&quot;font-family:Calibri,sans-serif&quot;&gt;Ph&amp;acirc;n loại Người b&amp;aacute;n (Shop Thường, Shop Y&amp;ecirc;u Th&amp;iacute;ch, Shop Y&amp;ecirc;u Th&amp;iacute;ch+, Shopee Mall)&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-size:11pt&quot;&gt;&lt;span style=&quot;font-family:Calibri,sans-serif&quot;&gt;Gi&amp;aacute; sản phẩm (gi&amp;aacute; gốc / gi&amp;aacute; ưu đ&amp;atilde;i)&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-size:11pt&quot;&gt;&lt;span style=&quot;font-family:Calibri,sans-serif&quot;&gt;Nơi b&amp;aacute;n (tỉnh / th&amp;agrave;nh phố)&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-size:11pt&quot;&gt;&lt;span style=&quot;font-family:Calibri,sans-serif&quot;&gt;Đ&amp;aacute;nh gi&amp;aacute; sản phẩm&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-size:11pt&quot;&gt;&lt;span style=&quot;font-family:Calibri,sans-serif&quot;&gt;Số sản phẩm b&amp;aacute;n ra&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;span style=&quot;font-size:11pt&quot;&gt;&lt;span style=&quot;font-family:Calibri,sans-serif&quot;&gt;Th&amp;ocirc;ng tin kết cấu, t&amp;iacute;nh năng, chế độ bảo h&amp;agrave;nh (nếu c&amp;oacute;)&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;font-size:11pt&quot;&gt;&lt;span style=&quot;font-family:Calibri,sans-serif&quot;&gt;Chọn sản phẩm&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;font-size:11pt&quot;&gt;&lt;span style=&quot;font-family:Calibri,sans-serif&quot;&gt;Sử dụng m&amp;atilde; giảm gi&amp;aacute;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;font-size:11pt&quot;&gt;&lt;span style=&quot;font-family:Calibri,sans-serif&quot;&gt;Nếu c&amp;oacute; y&amp;ecirc;u cầu đặc biệt g&amp;igrave; cho Người b&amp;aacute;n, bạn c&amp;oacute; thể nhấn v&amp;agrave;o n&amp;uacute;t &amp;ldquo;Tin nhắn&amp;rdquo;.&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;', '', 12, 1, 'huong-dan-dat-hang', '2021-07-25 01:45:42', '2021-07-27 22:28:19'),
(8, 'Chính sách đổi trả', 'Admin', '/uploads/2021/07/25/blog-08.jpg', '&lt;p&gt;2.1. Bảo h&amp;agrave;nh c&amp;oacute; cam kết trong 12 th&amp;aacute;ng&lt;/p&gt;\r\n\r\n&lt;p&gt;2.2. Hư g&amp;igrave; đổi nấy ngay v&amp;agrave; lu&amp;ocirc;n&lt;/p&gt;\r\n\r\n&lt;p&gt;2.3. Ho&amp;agrave;n tiền&lt;/p&gt;\r\n\r\n&lt;p&gt;2.4. Sản phẩm đ&amp;atilde; qua sử dụng&lt;/p&gt;', '', 0, 1, 'chinh-sach-doi-tra', '2021-07-25 01:47:40', '2021-07-25 22:59:22'),
(9, 'Chính sách khách hàng', 'Admin', '/uploads/2021/07/26/blog-05.jpg', '&lt;p style=&quot;text-align:justify&quot;&gt;Kh&amp;aacute;ch VIP HERADG l&amp;agrave; g&amp;igrave;?&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;VIP HERADG l&amp;agrave; chương tr&amp;igrave;nh d&amp;agrave;nh cho kh&amp;aacute;ch h&amp;agrave;ng th&amp;acirc;n thiết sử dụng sản phẩm HeraDG l&amp;acirc;u d&amp;agrave;i hoặc d&amp;agrave;nh trọn niềm tin y&amp;ecirc;u trong một lần mua sắm&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;với gi&amp;aacute; trị h&amp;oacute;a đơn lớn. Kh&amp;aacute;ch VIP sẽ được HeraDG d&amp;agrave;nh tặng những ưu đ&amp;atilde;i v&amp;agrave; quyền lợi đặc biệt.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;L&amp;agrave;m sao để trở th&amp;agrave;nh kh&amp;aacute;ch VIP HERADG?&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;Ngay từ khi mua sản phẩm đầu ti&amp;ecirc;n tại bất cứ cửa h&amp;agrave;ng n&amp;agrave;o tr&amp;ecirc;n hệ thống hoặc mua online khi để lại SĐT qu&amp;yacute; kh&amp;aacute;ch đều được lưu lại th&amp;ocirc;ng tin l&amp;agrave;m cơ sở cho những h&amp;oacute;a đơn sau.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;Khi đạt điều kiện n&amp;acirc;ng hạng thẻ, hệ thống sẽ tự động n&amp;acirc;ng v&amp;agrave; cập nhật ưu đ&amp;atilde;i tương đồng thứ hạng thẻ.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;C&amp;aacute;ch thức xếp hạng thẻ VIP HERADG&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;THẺ BẠC: C&amp;oacute; gi&amp;aacute; trị h&amp;oacute;a đơn 15tr trở l&amp;ecirc;n trong 1 năm hoặc c&amp;oacute; h&amp;oacute;a đơn mua h&amp;agrave;ng trị gi&amp;aacute; 5 triệu trong 01 lần mua.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;THẺ V&amp;Agrave;NG: C&amp;oacute; gi&amp;aacute; trị h&amp;oacute;a đơn thanh to&amp;aacute;n 25 triệu trong 1 năm hoặc 01 lần mua c&amp;oacute; gi&amp;aacute; trị h&amp;oacute;a đơn 8 triệu.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;THẺ KIM CƯƠNG: Gi&amp;aacute; trị h&amp;oacute;a đơn thanh to&amp;aacute;n thực 35 triệu trong 1 năm hoặc 01 lần mua c&amp;oacute; tổng gi&amp;aacute; trị h&amp;oacute;a đơn 10 triệu.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;L&amp;agrave;m sao để được t&amp;iacute;ch lũy chi ti&amp;ecirc;u?&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;Rất đơn giản, khi thanh to&amp;aacute;n, kh&amp;aacute;ch h&amp;agrave;ng cung cấp SĐT cho nh&amp;acirc;n vi&amp;ecirc;n tại cửa h&amp;agrave;ng hoặc nh&amp;acirc;n vi&amp;ecirc;n tư vấn. Ngay lập tức th&amp;ocirc;ng tin mua sắm của&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;qu&amp;yacute; kh&amp;aacute;ch h&amp;agrave;ng sẽ được lưu lại v&amp;agrave; t&amp;iacute;ch điểm cho lần mua sắm sau.&lt;/p&gt;', '', 1, 1, 'chinh-sach-khach-hang', '2021-07-25 01:48:38', '2021-07-26 07:22:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `menu_id` int(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(255) NOT NULL,
  `price_sale` int(255) NOT NULL,
  `content` longtext NOT NULL,
  `file` varchar(255) NOT NULL,
  `active` int(1) NOT NULL,
  `featured` int(1) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `menu_id`, `description`, `price`, `price_sale`, `content`, `file`, `active`, `featured`, `slug`, `created_at`, `updated_at`) VALUES
(3, 'Herschel supply co 25l', 26, 'Balo Herschel supply co 25l', 250000, 235000, '&lt;p&gt;Balo Herschel supply co 25l kiểu d&amp;aacute;ng, thiết kế đẹp, ph&amp;ugrave; hợp với mọi lứa tuổi&lt;/p&gt;', '/uploads/2021/06/29/item-02.jpg', 1, 1, 'herschel-supply-co-25l', '2021-06-28 09:54:15', '2021-06-29 09:20:42'),
(5, 'Coach slim easton black', 40, 'Đồng hồ đeo tay Coach slim easton black', 2000000, 0, '&lt;p&gt;Đồng hồ đeo tay Coach slim easton black&lt;/p&gt;', '/uploads/2021/06/29/item-05.jpg', 1, 0, 'coach-slim-easton-black', '2021-06-29 09:26:15', '2021-06-29 09:26:15'),
(6, 'Frayed denim shorts', 35, 'Quần short nữ Frayed denim shorts', 300000, 290000, '&lt;p&gt;Quần short nữ Frayed denim shorts&lt;/p&gt;', '/uploads/2021/06/29/item-07.jpg', 1, 1, 'frayed-denim-shorts', '2021-06-29 09:27:29', '2021-06-29 09:27:29'),
(7, 'Balo Mikkor The Edwin Premier M Graphite', 26, 'Balo Mikkor The Edwin Premier M Graphite', 400000, 350000, '&lt;h1&gt;&lt;span style=&quot;font-size:18px&quot;&gt;Balo Mikkor The Edwin Premier M Graphite&lt;/span&gt;&lt;/h1&gt;', '/uploads/2021/06/29/item-01.jpg', 1, 1, 'balo-mikkor-the-edwin-premier-m-graphite', '2021-06-29 09:30:31', '2021-06-29 09:30:31'),
(8, 'Đồng hồ đeo tay seiko', 40, 'Đồng hồ đeo tay seiko', 2000000, 0, '&lt;p&gt;&lt;span style=&quot;font-size:20px&quot;&gt;Đồng hồ đeo tay seiko&lt;/span&gt;&lt;/p&gt;', '/uploads/2021/06/29/item-08.jpg', 1, 0, 'dong-ho-deo-tay-seiko', '2021-06-29 09:31:45', '2021-06-29 09:31:45'),
(9, 'Giày converse', 27, 'Giày converse', 1300000, 0, '&lt;p&gt;Gi&amp;agrave;y converse&lt;/p&gt;', '/uploads/2021/06/29/item-17.jpg', 1, 0, 'giay-converse', '2021-06-29 09:32:45', '2021-06-29 09:32:45'),
(10, 'Áo thun nữ', 30, 'Áo thun nữ co giãn', 200000, 190000, '&lt;p&gt;&amp;Aacute;o thun nữ co gi&amp;atilde;n th&amp;iacute;ch hợp ng&amp;agrave;y h&amp;egrave;&lt;/p&gt;', '/uploads/2021/06/29/item-10.jpg', 1, 0, 'ao-thun-nu', '2021-06-29 09:34:03', '2021-06-29 09:34:03'),
(11, 'Quần Jean nữ', 33, 'Quần Jean nữ', 340000, 0, '&lt;p&gt;Quần Jean nữ&lt;/p&gt;', '/uploads/2021/06/29/item-12.jpg', 1, 0, 'quan-jean-nu', '2021-06-29 09:35:16', '2021-07-02 11:50:04'),
(16, 'Mắt kính C.Hearts ss20', 37, 'Mắt kính C.Hearts ss20', 500000, 450000, '&lt;p&gt;Mắt k&amp;iacute;nh C.Hearts ss20&lt;/p&gt;', '/uploads/2021/07/26/kinh.png', 1, 1, 'mat-kinh-c-hearts-ss20', '2021-07-02 09:41:57', '2021-07-25 22:20:21'),
(17, 'Denim jacket Blue', 29, 'Denim jacket blue', 340000, 330000, '&lt;p&gt;&lt;a class=&quot;block2-name dis-block s-text3 p-b-5&quot; href=&quot;product-detail.html&quot; style=&quot;box-sizing: border-box; margin: 0px; padding: 0px 0px 5px; color: rgb(230, 85, 64); text-decoration: none; background-color: rgb(255, 255, 255); touch-action: manipulation; font-family: Montserrat-Regular; font-weight: 400; font-size: 15px; line-height: 1.5; transition: all 0.4s ease 0s; display: block; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;&quot;&gt;Denim jacket blue&lt;/a&gt;&lt;/p&gt;', '/uploads/2021/07/02/item-14.jpg', 1, 1, 'denim-jacket-blue', '2021-07-02 11:55:26', '2021-07-02 11:55:26'),
(18, 'Đồng hồ nixson', 40, 'Đồng hồ nixson', 2000000, 1900000, '&lt;p&gt;Đồng hồ nixson&lt;/p&gt;', '/uploads/2021/07/02/item-09.jpg', 1, 0, 'dong-ho-nixson', '2021-07-02 11:57:02', '2021-07-02 11:57:02'),
(19, 'Sơ mi trắng nữ', 29, 'Sơ mi trắng nữ', 250000, 0, '&lt;p&gt;Sơ mi trắng nữ&lt;/p&gt;', '/uploads/2021/07/02/item-16.jpg', 1, 1, 'so-mi-trang-nu', '2021-07-02 11:58:34', '2021-07-02 11:58:34'),
(21, 'Balo Xám', 26, 'BALO LAPTOP CAO CẤP\r\nCHÍNH HÃNG MARK RYDEN\r\nMIỄN PHÍ VẬN CHUYỂN TOÀN QUỐC', 740000, 0, '&lt;p&gt;Thương Hiệu &lt;strong&gt;Mark Ryden&lt;/strong&gt; l&amp;agrave; thương hiệu số 1 tr&amp;ecirc;n thị trường thế giới,xuất xứ Anh Quốc,c&amp;oacute; nh&amp;agrave; m&amp;aacute;y đặt tại ngay gần cảng Thẩm Quyến,rất thuận lợi cho việc xuất khẩu.Chất lượng v&amp;agrave; kiểu d&amp;aacute;ng của Mark Ryden đều thuộc ph&amp;acirc;n kh&amp;uacute;c cao cấp.Tại c&amp;aacute;c nước tr&amp;ecirc;n thế giới,bạn chỉ c&amp;oacute; thể mua được ở c&amp;aacute;c trung t&amp;acirc;m thương mai hoặc đặt h&amp;agrave;ng online,nhưng tại Việt Nam,nhớ c&amp;oacute; điều kiện thuận lợi về địa l&amp;yacute; n&amp;ecirc;n gi&amp;aacute; kh&amp;aacute; hợp l&amp;yacute; so với t&amp;uacute;i tiền Việt&lt;br /&gt;\r\n&lt;strong&gt;&lt;a href=&quot;http://BALOHAIPHONG.COM&quot;&gt;MARK RYDEN &lt;/a&gt;LARGY 9668&amp;nbsp;&amp;nbsp;&lt;/strong&gt;l&amp;agrave; sản phẩm của Mark Ryden c&amp;oacute; kiểu d&amp;aacute;ng thiết kế hiện đại,năng động ph&amp;ugrave; hợp nam giới.Chất Liệu Cao Cấp Chống Thấm Nước,Giữ Form.&lt;/p&gt;\r\n\r\n&lt;p&gt;Balo&amp;nbsp;&lt;strong&gt;Mark Ryden MR9668&amp;nbsp;&lt;/strong&gt;sẽ mang lại 1 trải nghiệm ho&amp;agrave;n to&amp;agrave;n kh&amp;aacute;c so với c&amp;aacute;c d&amp;ograve;ng Balo th&amp;ocirc;ng thường tr&amp;ecirc;n thị trường.Xứng Đ&amp;aacute;ng của 1 thương hiệu lớn của Ch&amp;acirc;u &amp;Acirc;u&lt;/p&gt;', '/uploads/2021/07/26/banner-06.jpg', 1, 1, 'balo-xam', '2021-07-25 22:07:42', '2021-07-25 22:07:42'),
(22, 'Áo thun đỏ nữ', 30, 'Áo phông chất liệu 100% cotton USA, có hình in trước ngực\r\nDáng regular, cổ tròn, tay cộc.', 400000, 300000, '&lt;p&gt;H&amp;igrave;nh dạng, mẫu m&amp;atilde; bắt mắt người xem, Sản phẩm b&amp;aacute;n chạy nhất năm 2020&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;a class=&quot;product-detail-tab-label&quot; href=&quot;https://canifa.com/catalog/product/view/id/223443/s/ao-phong-nam-8ts21s020/category/104/#product-detail-tab-content-2&quot;&gt;Chất liệu&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;div class=&quot;product-detail-tab-content&quot; id=&quot;product-detail-tab-content-2&quot;&gt;100% cotton&lt;/div&gt;\r\n\r\n&lt;div class=&quot;product-detail-tab-content&quot; id=&quot;product-detail-tab-content-3&quot;&gt;Giặt m&amp;aacute;y ở chế độ nhẹ, nhiệt độ thường.&lt;br /&gt;\r\nKh&amp;ocirc;ng sử dụng h&amp;oacute;a chất tẩy c&amp;oacute; chứa Clo.&lt;br /&gt;\r\nPhơi trong b&amp;oacute;ng m&amp;aacute;t.&lt;br /&gt;\r\nSấy th&amp;ugrave;ng, chế độ nhẹ nh&amp;agrave;ng.&lt;br /&gt;\r\nL&amp;agrave; ở nhiệt độ trung b&amp;igrave;nh 150 độ C.&lt;br /&gt;\r\nGiặt với sản phẩm c&amp;ugrave;ng m&amp;agrave;u.&lt;br /&gt;\r\nKh&amp;ocirc;ng l&amp;agrave; l&amp;ecirc;n chi tiết trang tr&amp;iacute;.&lt;/div&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '/uploads/2021/07/26/about-02.jpg', 1, 1, 'ao-thun-do-nu', '2021-07-25 22:12:31', '2021-07-25 22:12:31'),
(23, 'Áo Jean Nữ thời trang', 24, 'Áo bò nữ chất liệu tự nhiên', 500000, 0, '&lt;p&gt;Giặt m&amp;aacute;y ở chế độ nhẹ, nhiệt độ thường.&lt;br /&gt;\r\nGiặt với sản phẩm c&amp;ugrave;ng m&amp;agrave;u.&lt;br /&gt;\r\nKh&amp;ocirc;ng sử dụng ho&amp;aacute; chất tẩy c&amp;oacute; chứa Clo.&lt;br /&gt;\r\nPhơi trong b&amp;oacute;ng m&amp;aacute;t.&lt;br /&gt;\r\nSấy kh&amp;ocirc; ở nhiệt độ thường.&lt;br /&gt;\r\nL&amp;agrave; ở nhiệt độ thấp 110 độ C.&lt;br /&gt;\r\nKh&amp;ocirc;ng l&amp;agrave; l&amp;ecirc;n chi tiết trang tr&amp;iacute;.&lt;/p&gt;', '/uploads/2021/07/26/gallery-06.jpg', 1, 1, 'ao-jean-nu-thoi-trang', '2021-07-25 22:16:27', '2021-07-25 22:16:27'),
(24, 'Váy nữ thời trang', 24, 'Váy nữ thời trang hot nhất 2020', 399000, 300000, '&lt;p&gt;Giặt m&amp;aacute;y ở chế độ nhẹ, nhiệt độ thường.&lt;br /&gt;\r\nGiặt với sản phẩm c&amp;ugrave;ng m&amp;agrave;u.&lt;br /&gt;\r\nKh&amp;ocirc;ng sử dụng ho&amp;aacute; chất tẩy c&amp;oacute; chứa Clo.&lt;br /&gt;\r\nPhơi trong b&amp;oacute;ng m&amp;aacute;t.&lt;br /&gt;\r\nSấy kh&amp;ocirc; ở nhiệt độ thường.&lt;br /&gt;\r\nL&amp;agrave; ở nhiệt độ thấp 110 độ C.&lt;br /&gt;\r\nKh&amp;ocirc;ng l&amp;agrave; l&amp;ecirc;n chi tiết trang tr&amp;iacute;.&lt;/p&gt;', '/uploads/2021/07/26/banner-01.jpg', 1, 1, 'vay-nu-thoi-trang', '2021-07-25 22:30:55', '2021-07-25 22:30:55'),
(25, 'Croptop nữ', 24, 'Phom regular, dáng dài, cổ cao, có mũ, tay dài xỏ ngón.\r\nPhối lưới thoáng khí phần sườn.\r\nThùy khuyết tròn, luồn dây dệt.\r\nKiểu dáng năng động, thoải mái. Thích hợp mặc chống nắng.\r\nPhù hợp mặc quanh năm.', 300000, 0, '&lt;p&gt;Phom regular, d&amp;aacute;ng d&amp;agrave;i, cổ cao, c&amp;oacute; mũ, tay d&amp;agrave;i xỏ ng&amp;oacute;n.&lt;br /&gt;\r\nPhối lưới tho&amp;aacute;ng kh&amp;iacute; phần sườn.&lt;br /&gt;\r\nTh&amp;ugrave;y khuyết tr&amp;ograve;n, luồn d&amp;acirc;y dệt.&lt;br /&gt;\r\nKiểu d&amp;aacute;ng năng động, thoải m&amp;aacute;i. Th&amp;iacute;ch hợp mặc chống nắng.&lt;br /&gt;\r\nPh&amp;ugrave; hợp mặc quanh năm.&lt;/p&gt;', '/uploads/2021/07/26/product-14.jpg', 1, 1, 'croptop-nu', '2021-07-25 22:35:06', '2021-07-25 22:35:06'),
(26, 'Thắt lưng hermes', 38, 'Chất liệu : da bò \r\n\r\n- Kích thước: 3.5cmx 120cm \r\n\r\n- Màu sắc: đen \r\n\r\n- Sản xuất: Việt Nam \r\n\r\n- Bảo hành 1 năm \r\n\r\n- Đổi trả trong 15 ngày', 400000, 299999, '&lt;p&gt;&lt;strong&gt;Chất liệu : da b&amp;ograve;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;hr /&gt;\r\n&lt;p&gt;&lt;strong&gt;- K&amp;iacute;ch thước: 3.5cmx 120cm&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;hr /&gt;\r\n&lt;p&gt;&lt;strong&gt;- M&amp;agrave;u sắc: đen&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;hr /&gt;\r\n&lt;p&gt;&lt;strong&gt;- Sản xuất: Việt Nam&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;hr /&gt;\r\n&lt;p&gt;&lt;strong&gt;- Bảo h&amp;agrave;nh 1 năm&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;hr /&gt;\r\n&lt;p&gt;&lt;strong&gt;- Đổi trả trong 15 ng&amp;agrave;y&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;', '/uploads/2021/07/26/product-12.jpg', 1, 1, 'that-lung-hermes', '2021-07-25 22:37:09', '2021-07-25 22:37:09'),
(27, 'Áo sơ mi nam caro', 29, 'Phom regular, dáng dài, cổ cao, có mũ, tay dài xỏ ngón.\r\nPhối lưới thoáng khí phần sườn.\r\nThùy khuyết tròn, luồn dây dệt.\r\nKiểu dáng năng động, thoải mái.\r\nPhù hợp mặc quanh năm.', 500000, 450000, '&lt;p&gt;Phom regular, d&amp;aacute;ng d&amp;agrave;i, cổ cao, c&amp;oacute; mũ, tay d&amp;agrave;i xỏ ng&amp;oacute;n.&lt;br /&gt;\r\nPhối lưới tho&amp;aacute;ng kh&amp;iacute; phần sườn.&lt;br /&gt;\r\nTh&amp;ugrave;y khuyết tr&amp;ograve;n, luồn d&amp;acirc;y dệt.&lt;br /&gt;\r\nKiểu d&amp;aacute;ng năng động, thoải m&amp;aacute;i. Th&amp;iacute;ch hợp mặc chống nắng.&lt;br /&gt;\r\nPh&amp;ugrave; hợp mặc quanh năm.&lt;/p&gt;', '/uploads/2021/07/26/product-11.jpg', 1, 1, 'ao-so-mi-nam-caro', '2021-07-25 22:39:46', '2021-07-25 22:39:46'),
(28, 'Vest nữ độc quyền', 24, 'BÔ VEST NỮ THỜI TRANG HÀN QUỐC DN19112420', 1500000, 1000000, '&lt;p&gt;Phom regular, d&amp;aacute;ng d&amp;agrave;i, cổ cao, c&amp;oacute; mũ, tay d&amp;agrave;i xỏ ng&amp;oacute;n.&lt;br /&gt;\r\nPhối lưới tho&amp;aacute;ng kh&amp;iacute; phần sườn.&lt;br /&gt;\r\nTh&amp;ugrave;y khuyết tr&amp;ograve;n, luồn d&amp;acirc;y dệt.&lt;br /&gt;\r\nKiểu d&amp;aacute;ng năng động, thoải m&amp;aacute;i. Th&amp;iacute;ch hợp mặc chống nắng.&lt;br /&gt;\r\nPh&amp;ugrave; hợp mặc quanh năm.&lt;/p&gt;', '/uploads/2021/07/26/slide-05.jpg', 1, 0, 'vest-nu-doc-quyen', '2021-07-25 22:44:18', '2021-07-25 22:44:18'),
(29, 'Túi xách thời trang', 26, 'Túi xách thời trang\r\nChất liệu: Da PU bóng mờ cao cấp, bền đẹp, dễ vệ sinh\r\nHọa tiết ô trám, khóa gập Phụ kiện dây da phối xích\r\nNhiều ngăn nhỏ bên trong, tiện lợi cho nàng sắp xếp những vật dụng cần thiết\r\nGam màu hiện đại, dễ dàng phối với nhiều trang phục và phụ kiện\r\nKích thước: Dài 20 x Cao 10 x Rộng 4 (cm)', 0, 0, '&lt;p&gt;Chất liệu: Da PU b&amp;oacute;ng mờ cao cấp, bền đẹp, dễ vệ sinh&lt;br /&gt;\r\nHọa tiết &amp;ocirc; tr&amp;aacute;m, kh&amp;oacute;a gập Phụ kiện d&amp;acirc;y da phối x&amp;iacute;ch&lt;br /&gt;\r\nNhiều ngăn nhỏ b&amp;ecirc;n trong, tiện lợi cho n&amp;agrave;ng sắp xếp những vật dụng cần thiết&lt;br /&gt;\r\nGam m&amp;agrave;u hiện đại, dễ d&amp;agrave;ng phối với nhiều trang phục v&amp;agrave; phụ kiện&lt;br /&gt;\r\nK&amp;iacute;ch thước: D&amp;agrave;i 20 x Cao 10 x Rộng 4 (cm)&lt;br /&gt;\r\n&lt;br /&gt;\r\n* ̛̛́ ̂̃ ̛̉ ̣ :&lt;br /&gt;\r\n- Kh&amp;ocirc;ng giặt tẩy bằng c&amp;aacute;c chất tẩy rửa mạnh, c&amp;oacute; thể d&amp;ugrave;ng ( cồn, kem lau t&amp;uacute;i, )&lt;br /&gt;\r\n- Kh&amp;ocirc;ng tiếp x&amp;uacute;c với nhiệt độ cao, bỏ cốp xe,&lt;br /&gt;\r\n- Với c&amp;aacute;c s&amp;agrave;n phẩm s&amp;aacute;ng m&amp;agrave;u, n&amp;ecirc;n vệ sinh thường xuy&amp;ecirc;n&lt;br /&gt;\r\n- Bảo quản sản phẩm tr&amp;aacute;nh c&amp;aacute;c khu vực c&amp;oacute; c&amp;ocirc;n tr&amp;ugrave;ng&lt;br /&gt;\r\n- Trong trường hợp sản phẩm d&amp;iacute;nh nước, n&amp;ecirc;n lau kh&amp;ocirc; &amp;amp; để nơi kh&amp;ocirc; r&amp;aacute;o&lt;br /&gt;\r\n&amp;nbsp;&lt;/p&gt;', '/uploads/2021/07/26/banner-08.jpg', 1, 1, 'tui-xach-thoi-trang', '2021-07-25 22:46:32', '2021-07-25 22:46:32'),
(30, 'Vest nam Thời thượng', 24, 'Amonte được biết đến là một công ty chuyên thiết kế và cung cấp những sản phẩm thời trang sang cao cấp, sang trọng cho phái mạnh. Trong tiếng Ý, Amonte có nghĩa là “Thượng lưu” và đó chính cũng là giá trị mà thương hiệu mong muốn và luôn cố gắng sẽ đem đến cho khách hàng. Mỗi sản phẩm mà Amonte cung cấp ra thị trường đều là sự kết hợp hài hòa giữa 4 yếu tố cổ điển, sang trọng và tinh tế, mang đậm nét độc đáo và cuốn hút của thời trang Ý, từ đó tạo dựng cho khách hàng một phong cách quý ông đầy lịch lãm.', 2000000, 0, '&lt;p&gt;Vốn nổi tiếng&amp;nbsp;l&amp;agrave; thương hiệu h&amp;agrave;ng đầu Việt Nam trong lĩnh vực vest cưới, vest nam đồng thời cũng l&amp;agrave; đơn vị đi ti&amp;ecirc;n phong trong việc khẳng định, tạo dựng phong c&amp;aacute;ch vest đẹp, trong suốt thời gian qua&amp;nbsp;NTQ Luxury&amp;nbsp;đ&amp;atilde; nhận được rất nhiều sự ủng hộ nhiệt t&amp;igrave;nh từ ph&amp;iacute;a c&amp;aacute;c kh&amp;aacute;ch h&amp;agrave;ng. Với ưu thế nổi bật trong c&amp;aacute;c sản phẩm đẳng cấp chẳng hạn như vest h&amp;agrave;n quốc, vest c&amp;ocirc;ng sở nam, thời trang nam c&amp;ocirc;ng sở,&amp;nbsp;NTQ Luxury&amp;nbsp;lu&amp;ocirc;n tự h&amp;agrave;o v&amp;igrave; g&amp;oacute;p phần v&amp;agrave;o sự ho&amp;agrave;n thiện c&amp;aacute;i đẹp th&amp;ocirc;ng qua c&amp;aacute;c mẫu vest đẹp v&amp;agrave; nổi bật.&amp;nbsp;Với bề d&amp;agrave;y kinh nghiệm v&amp;agrave; sự cảm nhận tinh tế về chất liệu từng loại vải của&amp;nbsp;đội ngũ những thợ may t&amp;agrave;i giỏi, đầy t&amp;acirc;m huyết, đảm bảo rằng&amp;nbsp;NTQ Luxury&amp;nbsp;sẽ mang tới cho bạn những sản phẩm được cắt may v&amp;ocirc; c&amp;ugrave;ng đẹp, tỉ mỉ, mang t&amp;iacute;nh thời trang, cũng như sẽ l&amp;agrave;m bạn h&amp;agrave;i l&amp;ograve;ng từ chất lượng sản phẩm cho đến chất lượng dịch vụ.&lt;/p&gt;', '/uploads/2021/07/27/blog-02.jpg', 1, 1, 'vest-nam-thoi-thuong', '2021-07-27 14:10:07', '2021-07-27 14:10:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_slider`
--

CREATE TABLE `product_slider` (
  `id` int(255) NOT NULL,
  `products_id` int(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_slider`
--

INSERT INTO `product_slider` (`id`, `products_id`, `file`) VALUES
(16, 19, '/uploads/2021/07/02/item-16.jpg'),
(17, 19, '/uploads/2021/07/17/product-detail-02.jpg'),
(18, 19, '/uploads/2021/07/17/product-detail-03.jpg'),
(80, 18, '/uploads/2021/07/18/item-08.jpg'),
(81, 18, '/uploads/2021/07/02/item-09.jpg'),
(82, 27, '/uploads/2021/07/26/product-03.jpg'),
(83, 27, '/uploads/2021/07/26/product-11.jpg'),
(84, 25, '/uploads/2021/07/26/slide-04.jpg'),
(85, 25, '/uploads/2021/07/26/product-14.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `sort_by` int(10) NOT NULL,
  `active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `file`, `url`, `sort_by`, `active`, `created_at`, `updated_at`) VALUES
(8, 'SALE UP TO 50%', '/uploads/2021/06/27/bg-banner-01.jpg', 'https://www.facebook.com/', 3, 1, '2021-06-27 14:12:03', '2021-07-13 02:38:32'),
(12, 'BIRTHDAY OFFER', '/uploads/2021/06/28/bg-banner-02.jpg', 'https://www.facebook.com/', 6, 1, '2021-06-28 09:32:35', '2021-07-13 02:39:29'),
(15, 'MIX - MATCH', '/uploads/2021/06/28/master-slide-05.jpg', 'https://www.facebook.com/', 1, 1, '2021-06-28 10:11:42', '2021-07-13 02:41:43'),
(16, 'New Arrivals', '/uploads/2021/07/23/master-slide-02.jpg', 'https://l2h.test/#new-products', 23, 1, '2021-07-23 00:51:54', '2021-07-23 00:51:54'),
(17, 'Best of Sale', '/uploads/2021/07/23/master-slide-06.jpg', 'htttps://l2h.test/#featured-products', 24, 1, '2021-07-23 00:54:22', '2021-07-23 00:54:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `info` text,
  `is_delete` int(1) DEFAULT NULL,
  `token` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `address`, `info`, `is_delete`, `token`, `created_at`) VALUES
(1, 'admin@localhost', '$2y$10$R/sAiJaWCxOGcQc9vHLAze41td7f.R3nEB9unfysj/NL/AhM5KvLu', NULL, NULL, NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9', '2021-06-14 12:58:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `code` varchar(6) NOT NULL,
  `value` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `vouchers`
--

INSERT INTO `vouchers` (`id`, `code`, `value`, `description`, `active`) VALUES
(1, 'FSHP', 35000, 'FreeShip toàn quốc', 1),
(3, 'TRU20K', 20000, 'Giảm 20.000', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_cart` (`customer_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_slider`
--
ALTER TABLE `product_slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `product_slider`
--
ALTER TABLE `product_slider`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `lk_cart` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

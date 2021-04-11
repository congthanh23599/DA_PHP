-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 11, 2021 lúc 05:19 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopee`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(50) NOT NULL,
  `adminEmail` varchar(50) NOT NULL,
  `adminUser` varchar(50) NOT NULL,
  `adminPass` varchar(50) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminID`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'thanh', 'congthanh23599@gmail.com', 'thanhAdmin', 'e10adc3949ba59abbe56e057f20f883e', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandID` int(11) NOT NULL,
  `brandName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandID`, `brandName`) VALUES
(8, 'Miami'),
(9, 'Lazboy'),
(10, 'Maxine'),
(11, 'Fermob bistro');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `sID` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` int(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catID` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catID`, `catName`) VALUES
(20, 'Phòng Khách'),
(21, 'Phòng ăn'),
(22, 'Phòng ngủ'),
(23, 'Phòng làm việc'),
(24, 'Tủ bếp'),
(25, 'Hàng trang trí'),
(26, 'Ngoại thất'),
(27, 'Bộ sưu tập'),
(28, 'Thiết kế nội thất'),
(29, 'Mẫu thiết kế');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catID` int(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` int(200) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productID`, `productName`, `catID`, `brandID`, `product_desc`, `type`, `price`, `image`) VALUES
(22, 'Bàn ', 21, 8, '<p>Miami</p>', 1, 33000000, 'de0c96d45f.jpg'),
(23, 'Bàn ', 21, 8, '<p>Miami</p>', 1, 33000000, 'de0c96d45f.jpg'),
(24, 'Giường ngủ gỗ Maxine 1m6', 22, 10, '<p><br />Giường ngủ gỗ Maxine 1m6 với đường n&eacute;t thiết kế đến điểm nhấn đều h&agrave;i h&ograve;a v&agrave; đều rất gi&aacute; trị. Sản phẩm sử dụng khung gỗ ho&agrave;n thiện mdf veneer v&agrave; kim loại đồng l&agrave;m ch&acirc;n v&agrave; điểm nhấn. Giường Maxine gi&uacute;p cho kh&ocirc;ng gian ph&ograve;ng ngủ trở n&ecirc;n độc đ&aacute;o, đậm chất thư gi&atilde;n v&agrave; sang trọng. Giường Maxine c&oacute; 2 k&iacute;ch thước 1m6 v&agrave; 1m8.</p>', 1, 32500000, '66137b3002.jpg'),
(25, 'Bàn đầu giường Maxine', 22, 10, '<p><span>L&agrave; một sản phẩm bổ sung cho kh&ocirc;ng gian ph&ograve;ng ngủ, b&agrave;n đầu giường Maxine sử dụng khung gỗ ho&agrave;n thiện mdf veneer kết hợp với kim loại mạ đồng sang trọng. C&aacute;c ngăn k&eacute;o được bố tr&iacute; th&ocirc;ng minh, đ&aacute;p ứng c&ocirc;ng năng trong ph&ograve;ng ngủ.</span><br /><span>Maxine &ndash; N&eacute;t n&acirc;u trầm sang trọng</span><br /><span>Maxine, mang thiết kế vượt thời gian, gửi gắm v&agrave; g&oacute;i gọn lại những n&eacute;t đẹp của thi&ecirc;n nhi&ecirc;n v&agrave; con người nhưng vẫn đầy t&iacute;nh ứng dụng cao trong suốt h&agrave;nh tr&igrave;nh phi&ecirc;u lưu của nh&agrave; thiết kế người Ph&aacute;p Dominique Moal. Bộ sưu tập nổi bật với m&agrave;u sắc n&acirc;u trầm sang trọng, l&agrave; sự kết hợp giữa gỗ, da b&ograve; v&agrave; kim loại v&agrave;ng b&oacute;ng. Đặc biệt tr&ecirc;n mỗi sản phẩm, những n&eacute;t bo vi&ecirc;n, chi tiết kết nối được sử dụng k&eacute;o l&eacute;o tạo ra điểm nhất rất ri&ecirc;ng cho bộ sưu tập. Maxine thể hiện n&eacute;t trầm tư, thư gi&atilde;n để tận hưởng kh&ocirc;ng gian sống trong nhịp sống hiện đại. Sản phẩm thuộc BST Maxine được sản xuất tại Việt Nam.</span></p>', 0, 15900000, '5fb32272bd.jpg'),
(26, 'Ghế ngoài trời Fermob Bistro Carrot Hàng thương hiệu Pháp - Fermob', 29, 11, '<p><span>Ra mắt v&agrave;o cuối thế kỷ 19, một sản phẩm đường thời của Th&aacute;p Eiffel, ghế xếp Bistro c&oacute; thiết kế tinh giản v&agrave; chắc chắn đ&atilde; trở n&ecirc;n phổ biến v&agrave; ng&agrave;y c&agrave;ng được y&ecirc;u th&iacute;ch. Cho đến ng&agrave;y nay, chiếc ghế Bistro vẫn cuốn h&uacute;t v&agrave; hấp dẫn hơn bao giờ hết. Được thiết kế tạo h&igrave;nh bởi Fermob, ghế Bistro c&oacute; kết cấu chắc chắn, nổi bật với nhiều m&agrave;u sắc kh&aacute;c nhau chuy&ecirc;n d&ugrave;ng ngo&agrave;i trời</span><br /><span>C&acirc;n nặng: 4,8 kg</span><br /><span>Tải trọng 300kg.</span><br /><span>Vật liệu: th&eacute;p</span><br /><span>Kẹp nhựa để gấp v&agrave; mở an to&agrave;n</span><br /><span>24 m&agrave;u t&ugrave;y chọn.</span></p>\r\n<p></p>', 1, 20000000, '783ab615c6.jpg'),
(27, 'Bàn ngoài trời Fermob Bistro Turquoise Hàng thương hiệu Pháp - Fermob', 29, 11, '<p><span>Sản phẩm nhập khẩu từ Ph&aacute;p, của thương hiệu Fermob. B&agrave;n Bistro c&oacute; kiểu d&aacute;ng thanh mảnh nhưng chắc chắn về cấu tr&uacute;c. Sản phẩm chuy&ecirc;n d&ugrave;ng ngo&agrave;i trời với nhiều m&agrave;u sắc nổi bật, được l&agrave;m bằng chất liệu th&eacute;p sơn lacquer cao cấp. Bề mặt b&agrave;n l&agrave; tấm th&eacute;p được xử l&yacute; kh&eacute;o l&eacute;o, c&oacute; độ bền m&agrave;u cao cho vẻ đẹp ho&agrave;n hảo</span></p>', 0, 7900000, 'ff66f98533.jpg'),
(28, 'Sofa Miami 2 chỗ hiện đại vải hồng', 20, 8, '<p><span>Sofa Miami 2 chỗ l&agrave; một thiết kế tối giản cho kh&ocirc;ng gian ph&ograve;ng kh&aacute;ch hiện đại, chất liệu sofa vải cao cấp tr&ecirc;n t&ocirc;ng m&agrave;u x&aacute;m nhạt rất dễ d&agrave;ng phối hợp c&ugrave;ng c&aacute;c sản phẩm kh&aacute;c. K&iacute;ch thước nhỏ gọn 2 chỗ sẽ ph&ugrave; hợp cho c&aacute;c căn hộ, hoặc những g&oacute;c nhỏ trong ng&ocirc;i nh&agrave; của bạn.</span></p>', 1, 13000000, 'b89ef989b5.jpg'),
(29, 'Sofa Miami 3 chỗ và 1 armchair hiện đại vải Belfas', 20, 8, '<p><span>Sofa Miami 3 chỗ v&agrave; 1 armchair đặc trưng của phong c&aacute;ch Scandinavian đơn giản. Kiểu d&aacute;ng hướng đến sự ph&ugrave; hợp với nhiều đối tượng sử dụng kh&aacute;c nhau. Thiết kế dạng 3.1 chỗ cho ph&eacute;p chủ nh&acirc;n c&oacute; th&ecirc;m nhiều lựa chọn trong việc sắp đặt để c&oacute; kh&ocirc;ng gian ph&ograve;ng kh&aacute;ch ưng &yacute;. Lưng sofa bọc c&aacute;ch điệu tạo điểm nhấn cho cả kh&ocirc;ng gian ph&ograve;ng kh&aacute;ch nh&agrave; bạn. Tại Nh&agrave; Xinh c&oacute; đa dạng c&aacute;c mẫu sofa đẹp hiện đại, đa dạng kiểu d&aacute;ng, ph&ugrave; hợp cho từng kh&ocirc;ng gian ph&ograve;ng kh&aacute;ch nh&agrave; bạn.</span></p>', 1, 23000000, '956178a9cd.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Gender` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`ID`, `Name`, `Address`, `Phone`, `Gender`, `Email`, `Password`) VALUES
(5, 'Nguyễn Công Thành', '82/24', '0767022305', 1, 'congthanh23599@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `register_date`) VALUES
(1, 'Daily', 'Tuition', '2020-03-28 13:07:17'),
(2, 'Akshay', 'Kashyap', '2020-03-28 13:07:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandID`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catID`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productID`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

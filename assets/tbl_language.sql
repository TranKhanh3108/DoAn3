-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4320
-- Generation Time: May 12, 2023 at 03:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_language`
--

CREATE TABLE `tbl_language` (
  `lang_id` int(11) NOT NULL,
  `lang_name` varchar(255) NOT NULL,
  `lang_value` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_language`
--

INSERT INTO `tbl_language` (`lang_id`, `lang_name`, `lang_value`) VALUES
(1, 'Currency', 'VND'),
(2, 'Search Product', 'Tìm mặt hàng'),
(3, 'Search', 'Tìm kiếm'),
(4, 'Submit', 'Xác Nhận'),
(5, 'Update', 'Cập Nhật'),
(6, 'Read More', 'Đọc Thêm'),
(7, 'Serial', 'Serial'),
(8, 'Photo', 'Ảnh'),
(9, 'Login', 'Đăng nhập'),
(10, 'Customer Login', 'Đăng nhập'),
(11, 'Click here to login', 'Bấm đây để đăng nhập'),
(12, 'Back to Login Page', 'Quay về trang đăng nhập'),
(13, 'Logged in as', ''),
(14, 'Logout', 'Đăng xuất'),
(15, 'Register', 'Đăng ký'),
(16, 'Customer Registration', 'Đăng ký'),
(17, 'Registration Successful', 'Đăng ký thành công'),
(18, 'Cart', 'Giỏ hàng'),
(19, 'View Cart', 'Xem giỏ hàng'),
(20, 'Update Cart', 'Cập nhật giỏ hàng'),
(21, 'Back to Cart', 'Quay về giỏ hàng'),
(22, 'Checkout', 'Thanh toán'),
(23, 'Proceed to Checkout', 'Tiếp tục thanh toán'),
(24, 'Orders', 'Đơn hàng'),
(25, 'Order History', 'Lịch sử đơn hàng'),
(26, 'Order Details', 'Chi tiết đơn hàng'),
(27, 'Payment Date and Time', 'Ngày thành toán'),
(28, 'Transaction ID', 'ID Giao dịch'),
(29, 'Paid Amount', 'Số tiền đã trả'),
(30, 'Payment Status', 'Tình trạng thanh toán'),
(31, 'Payment Method', 'Phương thức thanh toán'),
(32, 'Payment ID', 'ID Thanh toán'),
(33, 'Payment Section', 'Payment Section'),
(34, 'Select Payment Method', 'Chọn phương thức thanh toán'),
(35, 'Select a Method', 'Chọn cách'),
(36, 'PayPal', 'PayPal'),
(38, 'Bank Deposit', 'Ngân hàng'),
(39, 'Card Number', 'Số thẻ'),
(40, 'CVV', 'CVV'),
(41, 'Month', 'Tháng'),
(42, 'Year', 'Năm'),
(43, 'Send to this Details', 'Gửi tới địa chỉ'),
(44, 'Transaction Information', 'Thông tin giao dịch'),
(45, 'Include transaction id and other information correctly', 'Hãy nhập dữ liệu chính xác'),
(46, 'Pay Now', 'Thanh toán ngay'),
(47, 'Product Name', 'Tên mặt hàng'),
(48, 'Product Details', 'Mô tả mặt hàng'),
(49, 'Categories', 'Phân loại'),
(50, 'Category:', 'Phân loại theo:'),
(51, 'All Products Under', 'Tất cả mặt hàng trong'),
(52, 'Select Size', 'Chọn kích thước'),
(53, 'Select Color', 'Chọn màu'),
(54, 'Product Price', 'Giá mặt hàng'),
(55, 'Quantity', 'Số lượng'),
(56, 'Out of Stock', 'Hết hàng'),
(57, 'Share This', 'Chia sẻ'),
(58, 'Share This Product', 'Chia sẻ mặt hàng này'),
(59, 'Product Description', 'Mô tả mặt hàng'),
(60, 'Features', 'Tính năng'),
(61, 'Conditions', 'Tình trạng'),
(62, 'Return Policy', 'Chính sách hoàn trả'),
(63, 'Reviews', 'Reviews'),
(64, 'Review', 'Review'),
(65, 'Give a Review', 'Give a Review'),
(66, 'Write your comment (Optional)', 'Viết bình luận (tùy chọn)'),
(67, 'Submit Review', 'Đăng Review'),
(68, 'You already have given a rating!', 'Bạn đã đánh giá rồi!'),
(69, 'You must have to login to give a review', 'Bạn phải đăng nhập để đánh giá'),
(70, 'No description found', 'Không có mô tả'),
(71, 'No feature found', 'Không có tính năng'),
(72, 'No condition found', 'Không có tình trạng'),
(73, 'No return policy found', 'Không có chính sách hoàn trả'),
(74, 'No Review is Found', 'Không có review'),
(75, 'Customer Name', 'Tên khách hàng'),
(76, 'Comment', 'Bình luận'),
(77, 'Comments', 'Bình luận'),
(78, 'Rating', 'Đánh giá'),
(79, 'Previous', 'Trước'),
(80, 'Next', 'Sau'),
(81, 'Sub Total', 'Giá trị đơn hàng'),
(82, 'Total', 'Tổng giá trị'),
(83, 'Action', 'Hành động'),
(84, 'Shipping Cost', 'Chi phí giao hàng'),
(85, 'Continue Shipping', 'Tiếp tục đến giao hành'),
(86, 'Update Billing Address', 'Cập nhật địa chỉ thanh toán'),
(87, 'Update Shipping Address', 'Cập nhật địa chỉ giao hàng'),
(88, 'Update Billing and Shipping Info', 'Cập nhật địa chỉ thanh toán và giao hàng'),
(89, 'Dashboard', 'Trang cá nhân'),
(90, 'Welcome to the Dashboard', 'Chào mừng đến đây'),
(91, 'Back to Dashboard', 'Về trang cá nhân'),
(92, 'Subscribe', 'Đăng ký'),
(93, 'Subscribe To Our Newsletter', 'Đăng ký nhận thông báo sản phẩm'),
(94, 'Email Address', 'Email'),
(95, 'Enter Your Email Address', 'Nhập địa chỉ email'),
(96, 'Password', 'Mật khẩu'),
(97, 'Forget Password', 'Quên mật khẩu'),
(98, 'Retype Password', 'Nhập lại mật khẩu'),
(99, 'Update Password', 'Cập nhật mật khẩu'),
(100, 'New Password', 'Mật khẩu mới'),
(101, 'Retype New Password', 'Nhập lại mật khẩu mới'),
(102, 'Full Name', 'Họ và tên'),
(103, 'Company Name', 'Tên công ty'),
(104, 'Phone Number', 'Số điện thoại'),
(105, 'Address', 'Địa chỉ'),
(106, 'Country', 'Quốc gia'),
(107, 'City', 'Thành phố'),
(108, 'State', 'Quận/huyện'),
(109, 'Zip Code', 'Zip Code'),
(110, 'About Us', 'Về chúng tôi'),
(111, 'Featured Posts', 'Sản phẩm nổi bật'),
(112, 'Popular Posts', 'Sản phẩm ưa thích'),
(113, 'Recent Posts', 'Sản phẩm gần đây'),
(114, 'Contact Information', 'Thông tin liên lạc'),
(115, 'Contact Form', 'Form liên lạc'),
(116, 'Our Office', 'Văn phòng'),
(117, 'Update Profile', 'Cập nhật thông tin'),
(118, 'Send Message', 'Gửi tin nhắn'),
(119, 'Message', 'Tin nhắn'),
(121, 'Congratulation! Payment is successful.', 'Chúc mừng, thanh toán thành công!'),
(122, 'Billing and Shipping Information is updated successfully.', 'Cập nhật thông tin thanh toán và nhận hàng thành công!'),
(123, 'Customer Name can not be empty.', 'Tên khách hàng không được để trống.'),
(124, 'Phone Number can not be empty.', 'Số điện thoại không được để trống'),
(125, 'Address can not be empty.', 'Địa chỉ không được để trống'),
(126, 'You must have to select a country.', 'Bạn phải chọn một quốc gia'),
(127, 'City can not be empty.', 'Thành phố không được để trống'),
(128, 'State can not be empty.', 'Quận/Huyện không được để trống'),
(129, 'Zip Code can not be empty.', 'Zip Code không được để trống'),
(130, 'Profile Information is updated successfully.', 'Thông tin cá nhân cập nhật thành công'),
(131, 'Email Address can not be empty', 'Email không được để trống'),
(132, 'Email and/or Password can not be empty.', 'Email hoặc mật khẩu không được để trống'),
(133, 'Email Address does not match.', 'Email không giống'),
(134, 'Email address must be valid.', 'Email không hợp lệ'),
(135, 'You email address is not found in our system.', 'Tài khoản của bạn không tồn tại '),
(136, 'Please check your email and confirm your subscription.', 'Hãy kiểm tra email để xác nhận đăng ký thông báo'),
(137, 'Your email is verified successfully. You can now login to our website.', 'Email của bạn đã được xác nhận!'),
(138, 'Password can not be empty.', 'Mật khẩu không được để trống'),
(139, 'Passwords do not match.', 'Mật khẩu không giống'),
(140, 'Please enter new and retype passwords.', 'Hãy nhập mật khẩu mới và nhập lại '),
(141, 'Password is updated successfully.', 'Mật khẩu đã được cập nhật!'),
(142, 'To reset your password, please click on the link below.', 'Để reset mật khẩu hãy bấm vào link dưới đây'),
(143, 'PASSWORD RESET REQUEST - YOUR WEBSITE.COM', 'PASSWORD RESET REQUEST - YOUR WEBSITE.COM'),
(144, 'The password reset email time (24 hours) has expired. Please again try to reset your password.', 'The password reset email time (24 hours) has expired. Please again try to reset your password.'),
(145, 'A confirmation link is sent to your email address. You will get the password reset information in there.', 'A confirmation link is sent to your email address. You will get the password reset information in there.'),
(146, 'Password is reset successfully. You can now login.', 'Mật khẩu đã được reset thành công, hãy đăng nhập lại'),
(147, 'Email Address Already Exists', 'Email đã tồn tại'),
(148, 'Sorry! Your account is inactive. Please contact to the administrator.', 'Sorry! Your account is inactive. Please contact to the administrator.'),
(149, 'Change Password', 'Đổi mật khẩu'),
(150, 'Registration Email Confirmation for YOUR WEBSITE', 'Registration Email Confirmation for YOUR WEBSITE.'),
(151, 'Thank you for your registration! Your account has been created. To active your account click on the link below:', 'Thank you for your registration! Your account has been created. To active your account click on the link below:'),
(152, 'Your registration is completed. Please check your email address to follow the process to confirm your registration.', 'Your registration is completed. Please check your email address to follow the process to confirm your registration.'),
(153, 'No Product Found', 'No Product Found'),
(154, 'Add to Cart', 'Thêm vào giỏ hàng'),
(155, 'Related Products', 'Sản phẩm liên quan'),
(156, 'See all related products from below', 'Xem các sản phẩm liên quan bên dưới!'),
(157, 'Size', 'Kích thước'),
(158, 'Color', 'Màu sắc'),
(159, 'Price', 'Giá'),
(160, 'Please login as customer to checkout', 'Làm ơn hãy đăng nhập để thanh toán!'),
(161, 'Billing Address', 'Địa chỉ thanh toán'),
(162, 'Shipping Address', 'Địa chỉ nhận hàng'),
(163, 'Rating is Submitted Successfully!', 'Đánh giá thành công');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_language`
--
ALTER TABLE `tbl_language`
  ADD PRIMARY KEY (`lang_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_language`
--
ALTER TABLE `tbl_language`
  MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

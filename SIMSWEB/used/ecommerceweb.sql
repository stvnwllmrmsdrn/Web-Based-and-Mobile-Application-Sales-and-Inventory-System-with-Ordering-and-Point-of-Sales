-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2023 at 10:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerceweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE `tbl_color` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`color_id`, `color_name`) VALUES
(1, 'Red'),
(2, 'Black'),
(3, 'Blue'),
(4, 'Yellow'),
(5, 'Green'),
(6, 'White'),
(7, 'Orange'),
(8, 'Brown'),
(9, 'Tan'),
(10, 'Pink'),
(11, 'Mixed'),
(12, 'Lightblue'),
(13, 'Violet'),
(14, 'Light Purple'),
(15, 'Salmon'),
(16, 'Gold'),
(17, 'Gray'),
(18, 'Ash'),
(19, 'Maroon'),
(20, 'Silver'),
(21, 'Dark Clay'),
(22, 'Cognac'),
(23, 'Coffee'),
(24, 'Charcoal'),
(25, 'Navy'),
(26, 'Fuchsia'),
(27, 'Olive'),
(28, 'Burgundy'),
(29, 'Midnight Blue');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`country_id`, `country_name`) VALUES
(25, 'Philippines');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_cname` varchar(100) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_phone` varchar(50) NOT NULL,
  `cust_country` int(11) NOT NULL,
  `cust_address` text NOT NULL,
  `cust_city` varchar(100) NOT NULL,
  `cust_state` varchar(100) NOT NULL,
  `cust_zip` varchar(30) NOT NULL,
  `cust_b_name` varchar(100) NOT NULL,
  `cust_b_cname` varchar(100) NOT NULL,
  `cust_b_phone` varchar(50) NOT NULL,
  `cust_b_country` int(11) NOT NULL,
  `cust_b_address` text NOT NULL,
  `cust_b_city` varchar(100) NOT NULL,
  `cust_b_state` varchar(100) NOT NULL,
  `cust_b_zip` varchar(30) NOT NULL,
  `cust_s_name` varchar(100) NOT NULL,
  `cust_s_cname` varchar(100) NOT NULL,
  `cust_s_phone` varchar(50) NOT NULL,
  `cust_s_country` int(11) NOT NULL,
  `cust_s_address` text NOT NULL,
  `cust_s_city` varchar(100) NOT NULL,
  `cust_s_state` varchar(100) NOT NULL,
  `cust_s_zip` varchar(30) NOT NULL,
  `cust_password` varchar(100) NOT NULL,
  `cust_token` varchar(255) NOT NULL,
  `cust_datetime` varchar(100) NOT NULL,
  `cust_timestamp` varchar(100) NOT NULL,
  `cust_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cust_id`, `cust_name`, `cust_cname`, `cust_email`, `cust_phone`, `cust_country`, `cust_address`, `cust_city`, `cust_state`, `cust_zip`, `cust_b_name`, `cust_b_cname`, `cust_b_phone`, `cust_b_country`, `cust_b_address`, `cust_b_city`, `cust_b_state`, `cust_b_zip`, `cust_s_name`, `cust_s_cname`, `cust_s_phone`, `cust_s_country`, `cust_s_address`, `cust_s_city`, `cust_s_state`, `cust_s_zip`, `cust_password`, `cust_token`, `cust_datetime`, `cust_timestamp`, `cust_status`) VALUES
(11, 'Jovan Talagtag', 'PhotoBooth Central', 'jovantalagtag14@gmail.com', '09156524892', 25, 'Blk 33 Lot 12 Tokyo st. Cuidad grande', 'Meycauayan', 'Bulacan', '3020', 'Jovan Talagtag', 'PhotoBooth Central', '09156524892', 25, 'Blk 33 Lot 12 Tokyo st. Cuidad grande', 'Meycauayan', 'Bulacan', '3020', 'Jovan Talagtag', 'PhotoBooth Central', '09156524892', 25, 'Blk 33 Lot 12 Tokyo st. Cuidad grande', 'Meycauayan', 'Bulacan', '3020', '44a7a238fd14564832705ce07128e3e1', '397f31a2d2a2320abd56c69efd785264', '2023-05-22 11:04:23', '1684778663', 1),
(12, 'Steven Duran', 'ATS ', 'stevenduran@gmail.com', '09156524892', 25, 'Blk 33 Lot 12 Tokyo st. Cuidad grande', 'Meycauayan', 'Bulacan', '3020', 'Steven Duran', 'ATS', '09156524892', 25, 'Blk 33 Lot 12 Tokyo st. Cuidad grande', 'Meycauayan', 'Bulacan', '3020', 'Steven Duran', 'ATS', '09156524892', 25, 'Blk 33 Lot 12 Tokyo st. Cuidad grande', 'Meycauayan', 'Bulacan', '3020', 'f35644dd55a57b18213cd3bfd9ac87bc', '18ff16fde17b6b2e0b35fec51a470ec5', '2023-05-23 11:31:04', '1684866664', 1),
(13, 'Divina Marie Grajo', 'PhotoBooth Central', 'gonzalesdivine05@gmail.com', '(0926) 547-0308', 25, 'Blk 5 lot 53 Deca Homes Abangan Sur Marilao Bulavan', 'MARILAO', 'BULACAN', '3020', '', '', '', 0, '', '', '', '', '', '', '', 0, '', '', '', '', '67d46ec7d84ba284982e634970c5b7df', 'cdac23570495bb5b13ce94f370e37e96', '2023-06-05 10:33:32', '1685986412', 1),
(14, 'Ronald Mcdo', 'PhotoBooth Central', 'ronald05@gmail.com', '(0926) 547-0309', 25, 'Blk 5 lot 53 Deca Homes Abangan Sur Marilao Bulavan', 'MARILAO', 'BULACAN', '3020', '', '', '', 0, '', '', '', '', '', '', '', 0, '', '', '', '', '5af0a0feb2094f43bebb50c518c1ebfe', '9563a652681c45dbe8e64dc84ff305e7', '2023-06-05 10:42:03', '1685986923', 0),
(15, 'Mailyn Tudlasan', 'PhotoBooth Central', 'mailyntudlasan@gmail.com', '(0926) 547-0301', 25, 'Blk 5 lot 53 Deca Homes Abangan Sur Marilao Bulavan', 'MARILAO', 'BULACAN', '3020', '', '', '', 0, '', '', '', '', '', '', '', 0, '', '', '', '', 'be67b41796afaa597ecd3173903ccfce', 'dec103a66db5be0abe993a5cd41b8097', '2023-06-05 10:51:31', '1685987491', 0),
(16, 'August Lemon', 'ATS ', 'augustlemon@gmail.com', '09195864281', 25, '640 t. SANTIAGO ST LINGUNAN VALENZUELA CITY', 'VALENZUELA CITY', 'METRO MANILA, THIRD DISTRICT', '1446', '', '', '', 0, '', '', '', '', '', '', '', 0, '', '', '', '', '3f24e567591e9cbab2a7d2f1f748a1d4', 'e9e805d1af6552f340bdc30150ac0288', '2023-06-07 07:45:02', '1686192302', 0),
(17, 'eduardo baral talagtag', '', 'sdasd@mail.com', '0959565sd6s5d', 25, '640 t. SANTIAGO ST LINGUNAN VALENZUELA CITY', 'VALENZUELA CITY', 'METRO MANILA, THIRD DISTRICT', '1446', '', '', '', 0, '', '', '', '', '', '', '', 0, '', '', '', '', '098f6bcd4621d373cade4e832627b4f6', 'f57a683573c05dc4b350eabb2c9a0168', '2023-06-07 08:20:41', '1686194441', 0),
(18, 'Jovan Talagtagss', 'PhotoBooth Central', 'jovantaladsgtag14@gmail.com', '09156524891', 25, 'Blk 33 Lot 12 Tokyo st. Cuidad grande', 'Meycauayan', 'Bulacan', '3020', '', '', '', 0, '', '', '', '', '', '', '', 0, '', '', '', '', 'cc0bd5832b4e1465a6987d953bb767af', '3e0b59555b238a9f7647703be54a2f96', '2023-06-07 08:58:16', '1686196696', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_message`
--

CREATE TABLE `tbl_customer_message` (
  `customer_message_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `order_detail` text NOT NULL,
  `cust_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_customer_message`
--

INSERT INTO `tbl_customer_message` (`customer_message_id`, `subject`, `message`, `order_detail`, `cust_id`) VALUES
(9, 'Send payment', 'Thank you for your order. Please send payment to process the placement of your order. ', '\nCustomer Name: Jovan Talagtag<br>\nCustomer Email: jovantalagtag14@gmail.com<br>\nPayment Method: PayPal<br>\nPayment Date: 2023-05-23 10:53:12<br>\nPayment Details: <br>\nTransaction Id: <br>\n        		<br>\nPaid Amount: 1176<br>\nPayment Status: Pending<br>\nShipping Status: Pending<br>\nPayment Id: 1684864392<br>\n            \n<br><b><u>Product Item 1</u></b><br>\nProduct Name: LED Smart Bulbs<br>\nSize: 24 Plus<br>\nColor: White<br>\nQuantity: 4<br>\nUnit Price: 269<br>\n            ', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_end_category`
--

CREATE TABLE `tbl_end_category` (
  `ecat_id` int(11) NOT NULL,
  `ecat_name` varchar(255) NOT NULL,
  `mcat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_end_category`
--

INSERT INTO `tbl_end_category` (`ecat_id`, `ecat_name`, `mcat_id`) VALUES
(1, 'Prevent Oil Migration', 1),
(2, 'Non-Slip or Anti-Skid', 1),
(3, 'Nucleation', 1),
(4, 'Mar Abrasion-Scratch Resistance', 2),
(5, 'Lowers Melt Temperature', 2),
(6, 'Lower Temperature Applications', 3),
(7, 'Low Temperature Adhesion', 3),
(8, 'Indirect Food Contact', 4),
(9, 'Increase Tack', 4),
(11, 'BR bulged reflector', 2),
(12, 'Increase Heat Resistance', 6),
(13, 'Reflector', 6),
(14, 'Improves Gloss', 7),
(15, 'Improves Metal Release', 7),
(16, 'Improves Slip', 8),
(17, 'Improves Rub', 8),
(18, 'Improves Gloss', 8),
(19, 'Improves Extrusion Output', 8),
(20, 'Improves External Lubrication', 9),
(21, 'Improved Release', 9),
(22, 'Improved Release', 9),
(23, 'High Clarity Applications', 9),
(24, 'Gloss Control', 9),
(25, 'Fusion Time Speeds', 2),
(26, 'Fusion Time Delay', 10),
(27, 'FT Replacement', 10),
(28, 'FT Placement', 11),
(29, 'Fischer-Tropsch Wax Extender', 11),
(30, 'Filler-Pigment Dispersion', 12),
(31, 'Filler-Pigment Dispersion', 12),
(32, 'Filler Dispersion', 7),
(33, 'Decreases Die Pressure', 7),
(34, 'Coupling Agent', 7),
(35, 'Compatibilizer', 7),
(36, 'Boost Adhesion', 7),
(37, 'Anti-Blocking', 7),
(38, 'Paints and Coating Products', 7),
(39, 'Five-pin socket', 3),
(40, 'Two-pin sockets', 3),
(41, 'Bell Push Switches', 3),
(42, 'PAR38', 4),
(43, 'Three-pin sockets', 3),
(44, 'Two-Way/Intermediate Switches', 3),
(45, 'Double Pole Switches', 3),
(46, 'Single Pole Switches', 3),
(47, 'R50', 4),
(48, 'B15 (Small Bayonet)', 4),
(49, 'E14 (Small Edison Screw)', 4),
(50, 'Basic Floodlight', 6),
(51, 'Rechargable Flood light', 6),
(52, 'Electrodeless induction floodligh', 6),
(53, 'Halogen floodlight', 6),
(54, 'LED floodlights', 6),
(55, 'Metal halide floodlight', 6),
(56, 'Sealey Tools', 2),
(57, 'Draper Tools', 1),
(58, 'Faithfull Tools', 1),
(59, 'Other Accessories', 1),
(60, 'E27 (Edison Screw)', 4),
(61, 'Colored cement', 14),
(62, 'High Alumina Cement', 14),
(63, 'Blast Furnace Slag Cement', 14),
(64, 'Sulfates resisting cement', 14),
(65, 'Low Heat Cement', 14),
(66, 'Quick setting cement', 14),
(67, 'Rapid Hardening Cement', 15),
(68, 'Ordinary Portland Cement', 15),
(69, 'Moderate heat of hydration', 15),
(70, 'High sulfate resistance', 15),
(71, 'Moderate Sulfate Resistance', 15),
(72, 'Ternary blended cement ', 15),
(73, 'Portland-slag cement', 16),
(74, 'Portland-pozzolana cement', 16),
(75, 'Portland-limestone cement', 16),
(76, 'Metal Concrete Floor Hardener', 16),
(77, 'Pre Mix Concrete', 17),
(78, 'Cement Waterproofing Compound', 17),
(79, 'Eagle Cement', 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `faq_id` int(11) NOT NULL,
  `faq_title` varchar(255) NOT NULL,
  `faq_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`faq_id`, `faq_title`, `faq_content`) VALUES
(1, 'How to find an item?', '<h3 class=\"checkout-complete-box font-bold txt16\" style=\"box-sizing: inherit; text-rendering: optimizeLegibility; margin: 0.2rem 0px 0.5rem; padding: 0px; line-height: 1.4; background-color: rgb(250, 250, 250);\"><font color=\"#222222\" face=\"opensans, Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif\"><span style=\"font-size: 15.7143px;\">We have a wide range of fabulous products to choose from.</span></font></h3><h3 class=\"checkout-complete-box font-bold txt16\" style=\"box-sizing: inherit; text-rendering: optimizeLegibility; margin: 0.2rem 0px 0.5rem; padding: 0px; line-height: 1.4; background-color: rgb(250, 250, 250);\"><span style=\"font-size: 15.7143px; color: rgb(34, 34, 34); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\">Tip 1: If you\'re looking for a specific product, use the keyword search box located at the top of the site. Simply type what you are looking for, and prepare to be amazed!</span></h3><h3 class=\"checkout-complete-box font-bold txt16\" style=\"box-sizing: inherit; text-rendering: optimizeLegibility; margin: 0.2rem 0px 0.5rem; padding: 0px; line-height: 1.4; background-color: rgb(250, 250, 250);\"><font color=\"#222222\" face=\"opensans, Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif\"><span style=\"font-size: 15.7143px;\">Tip 2: If you want to explore a category of products, use the Shop Categories in the upper menu, and navigate through your favorite categories where we\'ll feature the best products in each.</span></font><br><br></h3>\r\n'),
(2, 'What is your return policy?', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; text-align: center;\">You have 15 days to make a refund request after your order has been delivered.</span><br></p>\r\n'),
(3, ' I received a defective/damaged item, can I get a refund?', '<p>In case the item you received is damaged or defective, you could return an item in the same condition as you received it with the original box and/or packaging intact. Once we receive the returned item, we will inspect it and if the item is found to be defective or damaged, we will process the refund along with any shipping fees incurred.<br></p>\r\n'),
(4, 'When are ‘Returns’ not possible?', '<p class=\"a  \" style=\"box-sizing: inherit; text-rendering: optimizeLegibility; line-height: 1.6; margin-bottom: 0.714286rem; padding: 0px; font-size: 14px; color: rgb(10, 10, 10); font-family: opensans, &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; background-color: rgb(250, 250, 250);\">There are a few certain scenarios where it is difficult for us to support returns:</p><ol style=\"box-sizing: inherit; line-height: 1.6; margin-right: 0px; margin-bottom: 0px; margin-left: 1.25rem; padding: 0px; list-style-position: outside; color: rgb(10, 10, 10); font-family: opensans, &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(250, 250, 250);\"><li style=\"box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;\">Return request is made outside the specified time frame, of 15 days from delivery.</li><li style=\"box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;\">Product is used, damaged, or is not in the same condition as you received it.</li><li style=\"box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;\">Specific categories like innerwear, lingerie, socks and clothing freebies etc.</li><li style=\"box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;\">Defective products which are covered under the manufacturer\'s warranty.</li><li style=\"box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;\">Any consumable item which has been used or installed.</li><li style=\"box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;\">Products with tampered or missing serial numbers.</li><li style=\"box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;\">Anything missing from the package you\'ve received including price tags, labels, original packing, freebies and accessories.</li><li style=\"box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;\">Fragile items, hygiene related items.</li></ol>\r\n'),
(5, 'What are the items that cannot be returned?', '<p>The items that can not be returned are:</p><p>Clearance items clearly marked as such and displaying a No-Return Policy<br></p><p>When the offer notes states so specifically are items that cannot be returned.</p><p>Items that fall into the below product types-</p><ul><li>Underwear</li><li>Lingerie</li><li>Socks</li><li>Software</li><li>Music albums</li><li>Books</li><li>Swimwear</li><li>Beauty &amp; Fragrances</li><li>Hosiery</li></ul><p>Also, any consumable items that are used or installed cannot be returned. As outlined in consumer Protection Rights and concerning section on non-returnable items<br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_language`
--

CREATE TABLE `tbl_language` (
  `lang_id` int(11) NOT NULL,
  `lang_name` varchar(255) NOT NULL,
  `lang_value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_language`
--

INSERT INTO `tbl_language` (`lang_id`, `lang_name`, `lang_value`) VALUES
(1, 'Currency', 'Php'),
(2, 'Search Product', 'Search Product'),
(3, 'Search', 'Search'),
(4, 'Submit', 'Submit'),
(5, 'Update', 'Update'),
(6, 'Read More', 'Read More'),
(7, 'Serial', 'Serial'),
(8, 'Photo', 'Photo'),
(9, 'Login', 'Login'),
(10, 'Customer Login', 'Customer Login'),
(11, 'Click here to login', 'Click here to login'),
(12, 'Back to Login Page', 'Back to Login Page'),
(13, 'Logged in as', 'Logged in as'),
(14, 'Logout', 'Logout'),
(15, 'Register', 'Register'),
(16, 'Customer Registration', 'Customer Registration'),
(17, 'Registration Successful', 'Registration Successful'),
(18, 'Cart', 'Cart'),
(19, 'View Cart', 'View Cart'),
(20, 'Update Cart', 'Update Cart'),
(21, 'Back to Cart', 'Back to Cart'),
(22, 'Checkout', 'Checkout'),
(23, 'Proceed to Checkout', 'Proceed to Checkout'),
(24, 'Orders', 'Orders'),
(25, 'Order History', 'Order History'),
(26, 'Order Details', 'Order Details'),
(27, 'Payment Date and Time', 'Payment Date and Time'),
(28, 'Transaction ID', 'Transaction ID'),
(29, 'Paid Amount', 'Paid Amount'),
(30, 'Payment Status', 'Payment Status'),
(31, 'Payment Method', 'Payment Method'),
(32, 'Payment ID', 'Payment ID'),
(33, 'Payment Section', 'Payment Section'),
(34, 'Select Payment Method', 'Select Payment Method'),
(35, 'Select a Method', 'Select a Method'),
(36, 'PayPal', 'PayPal'),
(37, 'Stripe', 'Stripe'),
(38, 'Bank Deposit', 'Bank Deposit'),
(39, 'Card Number', 'Card Number'),
(40, 'CVV', 'CVV'),
(41, 'Month', 'Month'),
(42, 'Year', 'Year'),
(43, 'Send to this Details', 'Send to this Details'),
(44, 'Transaction Information', 'Transaction Information'),
(45, 'Include transaction id and other information correctly', 'Include transaction id and other information correctly'),
(46, 'Pay Now', 'Pay Now'),
(47, 'Product Name', 'Product Name'),
(48, 'Product Details', 'Product Details'),
(49, 'Categories', 'Categories'),
(50, 'Category:', 'Category:'),
(51, 'All Products Under', 'All Products Under'),
(52, 'Select Size', 'Select Size'),
(53, 'Select Color', 'Select Color'),
(54, 'Product Price', 'Product Price'),
(55, 'Quantity', 'Quantity'),
(56, 'Out of Stock', 'Out of Stock'),
(57, 'Share This', 'Share This'),
(58, 'Share This Product', 'Share This Product'),
(59, 'Product Description', 'Product Description'),
(60, 'Features', 'Features'),
(61, 'Conditions', 'Conditions'),
(62, 'Return Policy', 'Return Policy'),
(63, 'Reviews', 'Reviews'),
(64, 'Review', 'Review'),
(65, 'Give a Review', 'Give a Review'),
(66, 'Write your comment (Optional)', 'Write your comment (Optional)'),
(67, 'Submit Review', 'Submit Review'),
(68, 'You already have given a rating!', 'You already have given a rating!'),
(69, 'You must have to login to give a review', 'You must have to login to give a review'),
(70, 'No description found', 'No description found'),
(71, 'No feature found', 'No feature found'),
(72, 'No condition found', 'No condition found'),
(73, 'No return policy found', 'No return policy found'),
(74, 'Review not found', 'Review not found'),
(75, 'Customer Name', 'Customer Name'),
(76, 'Comment', 'Comment'),
(77, 'Comments', 'Comments'),
(78, 'Rating', 'Rating'),
(79, 'Previous', 'Previous'),
(80, 'Next', 'Next'),
(81, 'Sub Total', 'Sub Total'),
(82, 'Total', 'Total'),
(83, 'Action', 'Action'),
(84, 'Shipping Cost', 'Shipping Cost'),
(85, 'Continue Shopping', 'Continue Shopping'),
(86, 'Update Billing Address', 'Update Billing Address'),
(87, 'Update Shipping Address', 'Update Shipping Address'),
(88, 'Update Billing and Shipping Info', 'Update Billing and Shipping Info'),
(89, 'Dashboard', 'Dashboard'),
(90, 'Welcome to the Dashboard', 'Welcome to the Dashboard'),
(91, 'Back to Dashboard', 'Back to Dashboard'),
(92, 'Subscribe', 'Subscribe'),
(93, 'Subscribe To Our Newsletter', 'Subscribe To Our Newsletter'),
(94, 'Email Address', 'Email Address'),
(95, 'Enter Your Email Address', 'Enter Your Email Address'),
(96, 'Password', 'Password'),
(97, 'Forget Password', 'Forget Password'),
(98, 'Retype Password', 'Retype Password'),
(99, 'Update Password', 'Update Password'),
(100, 'New Password', 'New Password'),
(101, 'Retype New Password', 'Retype New Password'),
(102, 'Full Name', 'Full Name'),
(103, 'Company Name', 'Company Name'),
(104, 'Phone Number', 'Phone Number'),
(105, 'Address', 'Address'),
(106, 'Country', 'Country'),
(107, 'City', 'City'),
(108, 'State', 'State'),
(109, 'Zip Code', 'Zip Code'),
(110, 'About Us', 'About Us'),
(111, 'Featured Posts', 'Featured Posts'),
(112, 'Popular Posts', 'Popular Posts'),
(113, 'Recent Posts', 'Recent Posts'),
(114, 'Contact Information', 'Contact Information'),
(115, 'Contact Form', 'Contact Form'),
(116, 'Our Office', 'Our Office'),
(117, 'Update Profile', 'Update Profile'),
(118, 'Send Message', 'Send Message'),
(119, 'Message', 'Message'),
(120, 'Find Us On Map', 'Find Us On Map'),
(121, 'Congratulation! Payment is successful.', 'Congratulation! Payment is successful.'),
(122, 'Billing and Shipping Information is updated successfully.', 'Billing and Shipping Information is updated successfully.'),
(123, 'Customer Name can not be empty.', 'Customer Name can not be empty.'),
(124, 'Phone Number can not be empty.', 'Phone Number can not be empty.'),
(125, 'Address can not be empty.', 'Address can not be empty.'),
(126, 'You must have to select a country.', 'You must have to select a country.'),
(127, 'City can not be empty.', 'City can not be empty.'),
(128, 'State can not be empty.', 'State can not be empty.'),
(129, 'Zip Code can not be empty.', 'Zip Code can not be empty.'),
(130, 'Profile Information is updated successfully.', 'Profile Information is updated successfully.'),
(131, 'Email Address can not be empty', 'Email Address can not be empty'),
(132, 'Email and/or Password can not be empty.', 'Email and/or Password can not be empty.'),
(133, 'Email Address does not match.', 'Email Address does not match.'),
(134, 'Email address must be valid.', 'Email address must be valid.'),
(135, 'You email address is not found in our system.', 'You email address is not found in our system.'),
(136, 'Please check your email and confirm your subscription.', 'Please check your email and confirm your subscription.'),
(137, 'Your email is verified successfully. You can now login to our website.', 'Your email is verified successfully. You can now login to our website.'),
(138, 'Password can not be empty.', 'Password can not be empty.'),
(139, 'Passwords do not match.', 'Passwords do not match.'),
(140, 'Please enter new and retype passwords.', 'Please enter new and retype passwords.'),
(141, 'Password is updated successfully.', 'Password is updated successfully.'),
(142, 'To reset your password, please click on the link below.', 'To reset your password, please click on the link below.'),
(143, 'PASSWORD RESET REQUEST - YOUR WEBSITE.COM', 'PASSWORD RESET REQUEST - YOUR WEBSITE.COM'),
(144, 'The password reset email time (24 hours) has expired. Please again try to reset your password.', 'The password reset email time (24 hours) has expired. Please again try to reset your password.'),
(145, 'A confirmation link is sent to your email address. You will get the password reset information in there.', 'A confirmation link is sent to your email address. You will get the password reset information in there.'),
(146, 'Password is reset successfully. You can now login.', 'Password is reset successfully. You can now login.'),
(147, 'Email Address Already Exists', 'Email Address Already Exists.'),
(148, 'Sorry! Your account is inactive. Please contact to the administrator.', 'Sorry! Your account is inactive. Please contact to the administrator.'),
(149, 'Change Password', 'Change Password'),
(150, 'Registration Email Confirmation for YOUR WEBSITE', 'Registration Email Confirmation for YOUR WEBSITE.'),
(151, 'Thank you for your registration! Your account has been created. To active your account click on the link below:', 'Thank you for your registration! Your account has been created. To active your account click on the link below:'),
(152, 'Your registration is completed. Please check your email address to follow the process to confirm your registration.', 'Your registration is completed. Please check your email address to follow the process to confirm your registration.'),
(153, 'No Product Found', 'No Product Found'),
(154, 'Add to Cart', 'Add to Cart'),
(155, 'Related Products', 'Related Products'),
(156, 'See all related products from below', 'See all the related products from below'),
(157, 'Size', 'Size'),
(158, 'Color', 'Color'),
(159, 'Price', 'Price'),
(160, 'Please login as customer to checkout', 'Please login as customer to checkout'),
(161, 'Billing Address', 'Billing Address'),
(162, 'Shipping Address', 'Shipping Address'),
(163, 'Rating is Submitted Successfully!', 'Rating is Submitted Successfully!'),
(0, 'Peso', '\'?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mid_category`
--

CREATE TABLE `tbl_mid_category` (
  `mcat_id` int(11) NOT NULL,
  `mcat_name` varchar(255) NOT NULL,
  `tcat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_mid_category`
--

INSERT INTO `tbl_mid_category` (`mcat_id`, `mcat_name`, `tcat_id`) VALUES
(1, 'Pry bars & Nail pullers', 1),
(2, 'Leveling & Squares', 1),
(3, 'Switches And Sockets', 2),
(4, 'LED Bulbs', 2),
(6, 'Flood Lights', 2),
(7, 'Polyurethane Paint', 3),
(8, 'Asphalt Anticorrosive Paint', 3),
(9, 'Antistatic Paint', 3),
(10, 'Acrilic Paint', 3),
(11, 'Zinc Rich Paint', 3),
(12, 'Concrete', 5),
(14, 'Ready Mix Concrete', 5),
(15, 'Concrete Hollow Block', 5),
(16, 'Cement', 5),
(17, 'Aggregates', 5),
(18, 'Solar Lights', 2),
(19, 'Gypsum Board', 4),
(20, 'Phenolic Board', 4),
(21, 'Fiber Cement Board', 4),
(22, 'Plywood', 4),
(23, 'Plyboard', 4),
(24, 'Hammers', 1),
(25, 'Marking Tools', 1),
(26, 'Sledgehammers', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `size` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `unit_price` varchar(50) NOT NULL,
  `payment_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `product_id`, `product_name`, `size`, `color`, `quantity`, `unit_price`, `payment_id`) VALUES
(7, 103, 'Hand Drill', 'S', 'Black', '1', '889', '1684782608'),
(8, 104, 'LED Smart Bulbs', '24 Plus', 'White', '4', '269', '1684864392'),
(9, 104, 'LED Smart Bulbs', '24 Plus', 'White', '1', '269', '1684926656'),
(15, 124, 'Ingco Inverter MMA Welding Machine 220A', 'One Size for All', 'Orange', '1', '6600', '1685302211'),
(16, 122, 'Ingco Digital AC Clamp Meter', 'One Size for All', 'Yellow', '1', '1600', '1685302266'),
(20, 125, 'Ingco Rotary Sander 320W', 'One Size for All', 'Yellow', '10', '4800', '1685302832'),
(21, 123, 'EAGLE EID-519 IMPACT DRILL 600W 13MM 220V', 'One Size for All', 'Red', '1', '1950', '1686039541'),
(22, 125, 'Ingco Rotary Sander 320W', 'One Size for All', 'Yellow', '15', '4800', '1686039541');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `about_title` varchar(255) NOT NULL,
  `about_content` text NOT NULL,
  `about_banner` varchar(255) NOT NULL,
  `about_meta_title` varchar(255) NOT NULL,
  `about_meta_keyword` text NOT NULL,
  `about_meta_description` text NOT NULL,
  `faq_title` varchar(255) NOT NULL,
  `faq_banner` varchar(255) NOT NULL,
  `faq_meta_title` varchar(255) NOT NULL,
  `faq_meta_keyword` text NOT NULL,
  `faq_meta_description` text NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_banner` varchar(255) NOT NULL,
  `blog_meta_title` varchar(255) NOT NULL,
  `blog_meta_keyword` text NOT NULL,
  `blog_meta_description` text NOT NULL,
  `contact_title` varchar(255) NOT NULL,
  `contact_banner` varchar(255) NOT NULL,
  `contact_meta_title` varchar(255) NOT NULL,
  `contact_meta_keyword` text NOT NULL,
  `contact_meta_description` text NOT NULL,
  `pgallery_title` varchar(255) NOT NULL,
  `pgallery_banner` varchar(255) NOT NULL,
  `pgallery_meta_title` varchar(255) NOT NULL,
  `pgallery_meta_keyword` text NOT NULL,
  `pgallery_meta_description` text NOT NULL,
  `vgallery_title` varchar(255) NOT NULL,
  `vgallery_banner` varchar(255) NOT NULL,
  `vgallery_meta_title` varchar(255) NOT NULL,
  `vgallery_meta_keyword` text NOT NULL,
  `vgallery_meta_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `about_title`, `about_content`, `about_banner`, `about_meta_title`, `about_meta_keyword`, `about_meta_description`, `faq_title`, `faq_banner`, `faq_meta_title`, `faq_meta_keyword`, `faq_meta_description`, `blog_title`, `blog_banner`, `blog_meta_title`, `blog_meta_keyword`, `blog_meta_description`, `contact_title`, `contact_banner`, `contact_meta_title`, `contact_meta_keyword`, `contact_meta_description`, `pgallery_title`, `pgallery_banner`, `pgallery_meta_title`, `pgallery_meta_keyword`, `pgallery_meta_description`, `vgallery_title`, `vgallery_banner`, `vgallery_meta_title`, `vgallery_meta_keyword`, `vgallery_meta_description`) VALUES
(1, 'About Us', '<p style=\"border: 0px solid; margin-top: 1.5rem; margin-bottom: 0px;\">Welcome to Standley Hardware Store</p><p style=\"border: 0px solid; margin-top: 1.5rem; margin-bottom: 0px;\"><span style=\"border: 0px solid;\">We aim to offer our customers a variety of the latest [PRODUCTS_CATEGORY_NAME]. We\'ve come a long way, so we know exactly which direction to take when supplying you with high-quality yet budget-friendly products. We offer all of this while providing excellent customer service and friendly support.</span></p><p style=\"border: 0px solid; margin-top: 1.5rem; margin-bottom: 0px;\"><span style=\"border: 0px solid;\">We always keep an eye on the latest trends in [PRODUCTS CATEGORY NAME] and put our customersâ€™ wishes first. That is why we have satisfied customers all over the world, and are thrilled to be a part of the [PRODUCTS CATEGORY NAME] industry.</span></p><p style=\"border: 0px solid; margin-top: 1.5rem; margin-bottom: 0px;\"><span style=\"border: 0px solid;\">The interests of our customers are always a top priority for us, so we hope you will enjoy our products as much as we enjoy making them available to you.</span></p><p style=\"\">We make sure you get the best quality outfits with a hassle-free returns and exchanges policy. We ensure what you see is exactly what you get!</p><ul><li style=\"text-align: justify;\"><font face=\"apercu, Arial, sans-serif\"><span style=\"font-size: 14px;\"><b>Low Price Guarantee</b></span></font></li><li style=\"text-align: justify;\"><font face=\"apercu, Arial, sans-serif\"><span style=\"font-size: 14px;\"><b>24/7 Customer Support</b></span></font></li><li style=\"text-align: justify;\"><font face=\"apercu, Arial, sans-serif\"><span style=\"font-size: 14px;\"><b>E-Mail - Text - Call</b></span></font></li><li style=\"text-align: justify;\"><font face=\"apercu, Arial, sans-serif\"><span style=\"font-size: 14px;\"><b>We are here for you 24/7 online and via phone.</b></span></font></li><li style=\"text-align: justify;\"><font face=\"apercu, Arial, sans-serif\"><span style=\"font-size: 14px;\"><b>Sizing &amp; Color</b></span></font></li><li style=\"text-align: justify;\"><font face=\"apercu, Arial, sans-serif\"><span style=\"font-size: 14px;\"><b>Worldwide Shipping</b></span></font></li><li style=\"text-align: justify;\"><font face=\"apercu, Arial, sans-serif\"><span style=\"font-size: 14px;\"><b>We love to expand our business internationally soon.</b></span></font></li><li style=\"text-align: justify;\"><font face=\"apercu, Arial, sans-serif\"><span style=\"font-size: 14px;\"><b>Easy Returns</b></span></font></li></ul><p style=\"text-align: justify; \"><font face=\"apercu, Arial, sans-serif\"><span style=\"font-size: 14px;\">Bought an outfit but want to return it. We have a 3 days easy return policy. Please mail us at <b>support@standlyhardware.com</b> for more details.</span></font></p><p style=\"text-align: justify; \"><font face=\"apercu, Arial, sans-serif\"><span style=\"font-size: 14px;\"><b>All kinds of Hardware Equipments</b></span></font></p><p style=\"text-align: justify; \"><font face=\"apercu, Arial, sans-serif\"><span style=\"font-size: 14px;\">Standlyhardwares.com carries all carefully handpicked by our stylists. If you are interested in a particular model please mail us we will try our best to offer you the loved dress.</span></font></p><p style=\"text-align: justify; \"><font face=\"apercu, Arial, sans-serif\"><span style=\"font-size: 14px;\"><b>Verified Security</b></span></font></p><p style=\"text-align: justify; \"><font face=\"apercu, Arial, sans-serif\"><span style=\"font-size: 14px;\">All our transactions are Verified by Norton and with the highest standards of security. Plus, there\'s a lot to go around too through regular exciting offers and gifts, so spread the word and refer us to everyone from your family, friends, and colleagues and get rewarded for it. And to top it all, you can share your user experience by posting reviews. Donate wait any longer Sign up with us now! start stalking, start buying, start loving, and start Introducing the beauty in you.</span></font></p>\r\n', 'about-banner.jpeg', 'Standley Hardware Store - About Us', 'about, about us, about fashion, about company, about ecommerce php project', 'Our goal has always been to get the best in you we brought a huge collection whether youâ€™re attending a party, wedding, and all those events that require a WOW dress.', 'FAQ', 'faq-banner.jpeg', 'Stanley Hardware Store - FAQ', '', '', 'Blog', 'blog-banner.jpg', 'Ecommerce - Blog', '', '', 'Contact Us', 'contact-banner.jpeg', 'Stanley Hardware Store - Contact', 'Stanley Hardware Store - ContactStanley Hardware Store - Contact', '', 'Photo Gallery', 'pgallery-banner.jpg', 'Ecommerce - Photo Gallery', '', '', 'Video Gallery', 'vgallery-banner.jpg', 'Ecommerce - Video Gallery', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `payment_date` varchar(50) NOT NULL,
  `txnid` varchar(255) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `card_number` varchar(50) NOT NULL,
  `card_cvv` varchar(10) NOT NULL,
  `card_month` varchar(10) NOT NULL,
  `card_year` varchar(10) NOT NULL,
  `bank_transaction_info` text NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `shipping_status` varchar(20) NOT NULL,
  `payment_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `customer_id`, `customer_name`, `customer_email`, `payment_date`, `txnid`, `paid_amount`, `card_number`, `card_cvv`, `card_month`, `card_year`, `bank_transaction_info`, `payment_method`, `payment_status`, `shipping_status`, `payment_id`) VALUES
(57, 11, 'Jovan Talagtag', 'jovantalagtag14@gmail.com', '2023-05-23 10:53:12', '', 1176, '', '', '', '', '', 'PayPal', 'Completed', 'Completed', '1684864392'),
(58, 12, 'Steven Duran', 'stevenduran@gmail.com', '2023-05-24 04:10:56', '', 369, '', '', '', '', '', 'PayPal', 'Completed', 'Pending', '1684926656'),
(61, 12, 'Steven Duran', 'stevenduran@gmail.com', '2023-05-28 12:30:11', '', 6700, '', '', '', '', 'yeah', 'Bank Deposit', 'Completed', 'Completed', '1685302211'),
(62, 12, 'Steven Duran', 'stevenduran@gmail.com', '2023-05-28 12:31:06', '', 1700, '', '', '', '', 'thanks', 'Bank Deposit', 'Completed', 'Completed', '1685302266'),
(69, 12, 'Steven Duran', 'stevenduran@gmail.com', '2023-05-28 12:40:32', '', 48100, '', '', '', '', 'good deal', 'Bank Deposit', 'Completed', 'Pending', '1685302832'),
(70, 12, 'Steven Duran', 'stevenduran@gmail.com', '2023-06-06 01:19:01', '', 74050, '', '', '', '', 'jhhk', 'Bank Deposit', 'Completed', 'Pending', '1686039541');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_photo`
--

CREATE TABLE `tbl_photo` (
  `id` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_photo`
--

INSERT INTO `tbl_photo` (`id`, `caption`, `photo`) VALUES
(1, 'Photo 1', 'photo-1.jpg'),
(2, 'Photo 2', 'photo-2.jpg'),
(3, 'Photo 3', 'photo-3.jpg'),
(4, 'Photo 4', 'photo-4.jpg'),
(5, 'Photo 5', 'photo-5.jpg'),
(6, 'Photo 6', 'photo-6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_slug` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `total_view` int(11) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`post_id`, `post_title`, `post_slug`, `post_content`, `post_date`, `photo`, `category_id`, `total_view`, `meta_title`, `meta_keyword`, `meta_description`) VALUES
(1, 'Cu vel choro exerci pri et oratio iisque', 'cu-vel-choro-exerci-pri-et-oratio-iisque', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', '05-09-2017', 'news-1.jpg', 3, 14, 'Cu vel choro exerci pri et oratio iisque', '', ''),
(2, 'Epicurei necessitatibus eu facilisi postulant ', 'epicurei-necessitatibus-eu-facilisi-postulant-', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', '05-09-2017', 'news-2.jpg', 3, 6, 'Epicurei necessitatibus eu facilisi postulant ', '', ''),
(3, 'Mei ut errem legimus periculis eos liber', 'mei-ut-errem-legimus-periculis-eos-liber', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', '05-09-2017', 'news-3.jpg', 3, 1, 'Mei ut errem legimus periculis eos liber', '', ''),
(4, 'Id pro unum pertinax oportere vel', 'id-pro-unum-pertinax-oportere-vel', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', '05-09-2017', 'news-4.jpg', 4, 0, 'Id pro unum pertinax oportere vel', '', ''),
(5, 'Tollit cetero cu usu etiam evertitur', 'tollit-cetero-cu-usu-etiam-evertitur', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', '05-09-2017', 'news-5.jpg', 4, 24, 'Tollit cetero cu usu etiam evertitur', '', ''),
(6, 'Omnes ornatus qui et te aeterno', 'omnes-ornatus-qui-et-te-aeterno', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', '05-09-2017', 'news-6.jpg', 4, 2, 'Omnes ornatus qui et te aeterno', '', ''),
(7, 'Vix tale noluisse voluptua ad ne', 'vix-tale-noluisse-voluptua-ad-ne', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', '05-09-2017', 'news-7.jpg', 2, 0, 'Vix tale noluisse voluptua ad ne', '', ''),
(8, 'Liber utroque vim an ne his brute', 'liber-utroque-vim-an-ne-his-brute', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', '05-09-2017', 'news-8.jpg', 2, 12, 'Liber utroque vim an ne his brute', '', ''),
(9, 'Nostrum copiosae argumentum has', 'nostrum-copiosae-argumentum-has', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', '05-09-2017', 'news-9.jpg', 1, 12, 'Nostrum copiosae argumentum has', '', ''),
(10, 'An labores explicari qui eu', 'an-labores-explicari-qui-eu', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', '05-09-2017', 'news-10.jpg', 1, 4, 'An labores explicari qui eu', '', ''),
(11, 'Lorem ipsum dolor sit amet', 'lorem-ipsum-dolor-sit-amet', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', '05-09-2017', 'news-11.jpg', 1, 18, 'Lorem ipsum dolor sit amet', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_old_price` varchar(10) NOT NULL,
  `p_current_price` varchar(10) NOT NULL,
  `p_qty` int(10) NOT NULL,
  `p_featured_photo` varchar(255) NOT NULL,
  `p_description` text NOT NULL,
  `p_short_description` text NOT NULL,
  `p_feature` text NOT NULL,
  `p_condition` text NOT NULL,
  `p_return_policy` text NOT NULL,
  `p_total_view` int(11) NOT NULL,
  `p_is_featured` int(1) NOT NULL,
  `p_is_active` int(1) NOT NULL,
  `ecat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `p_name`, `p_old_price`, `p_current_price`, `p_qty`, `p_featured_photo`, `p_description`, `p_short_description`, `p_feature`, `p_condition`, `p_return_policy`, `p_total_view`, `p_is_featured`, `p_is_active`, `ecat_id`) VALUES
(103, 'Hand Drill', '900', '889', 9, 'product-featured-103.jpg', '<p><b>Hand Drill Hand Drill</b><br></p>', '<p>Hand Drill Hand Drill<br></p>', '<p>Hand Drill<br></p>', '<p>Hand Drill<br></p>', '<p>Hand Drill<br></p>', 43, 1, 1, 64),
(104, 'LED Smart Bulbs', '290', '269', 95, 'product-featured-104.jpg', '<p><span style=\"color: rgb(34, 34, 34); font-family: &quot;Open Sans&quot;; font-size: 14px;\">LED lighting is ever-evolving and getting smarter too. Now you can fit your home with \'</span><a href=\"https://www.ledhut.co.uk/smart-home/smart-lighting.html\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"margin: 0px; color: var(--brand-main); outline: 0px; transition: color 0.2s ease-in 0s; font-family: &quot;Open Sans&quot;; font-size: 14px; background-color: rgb(255, 255, 255);\">Smart Bulbs</a><span style=\"color: rgb(34, 34, 34); font-family: &quot;Open Sans&quot;; font-size: 14px;\">\', which are incredibly convenient and versatile, and allow you to remotely manage your lighting through voice-control or from a mobile device. The Philips Hue Smart Bulb system allows you to control up to 50 bulbs from your mobile device or through a voice-command system such as Amazon Echo. Through the Philips Hue app, you can: • Switch bulbs off and on remotely and from anywhere in the world • Choose from 16 millions shades of white light to really set the mood across multiple rooms in your home • Dim the lights to create the perfect ambience • Control up to 50 bulbs from a single area • Set-up motion sensor technology to save even more money on your energy bills</span><br></p>', '<table width=\"1182\" style=\"margin: 0px; width: 1123.56px; color: rgb(34, 34, 34); font-family: &quot;Open Sans&quot;; font-size: 14px; background-color: rgb(255, 255, 255); height: 229px;\"><tbody style=\"margin: 0px;\"><tr style=\"margin: 0px;\"><td style=\"margin: 0px;\"><img class=\"alignleft wp-image-3563 size-full\" src=\"https://cdn.shopify.com/s/files/1/0249/0286/0888/files/9-PAR38-LED-Bulb.jpg\" alt=\"PAR38 LED Bulb\" width=\"250\" height=\"189\" style=\"margin: 48px auto; max-width: 100%; display: block;\"><h3 style=\"margin: 0px 0px 15px; font-family: var(--heading-family); font-weight: var(--heading-weight); font-style: var(--heading-style); letter-spacing: var(--heading-spacing); line-height: 1.2; font-size: var(--h3-size);\">PAR38</h3><a href=\"https://www.ledhut.co.uk/led-bulbs/par38.html\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"margin: 0px; color: var(--brand-main); outline: 0px; transition: color 0.2s ease-in 0s;\">The PAR38 is a bulb that kicks-out a lot of lumens</a>&nbsp;(brightness). It comes with a screw fitting and is often used for workshops, security and commercial lighting.</td></tr></tbody></table>', '<table width=\"1182\" style=\"margin: 0px; width: 1123.56px; color: rgb(34, 34, 34); font-family: &quot;Open Sans&quot;; font-size: 14px; background-color: rgb(255, 255, 255); height: 229px;\"><tbody style=\"margin: 0px;\"><tr style=\"margin: 0px;\"><td style=\"margin: 0px;\"><img class=\"alignleft wp-image-3563 size-full\" src=\"https://cdn.shopify.com/s/files/1/0249/0286/0888/files/9-PAR38-LED-Bulb.jpg\" alt=\"PAR38 LED Bulb\" width=\"250\" height=\"189\" style=\"margin: 48px auto; max-width: 100%; display: block;\"><h3 style=\"margin: 0px 0px 15px; font-family: var(--heading-family); font-weight: var(--heading-weight); font-style: var(--heading-style); letter-spacing: var(--heading-spacing); line-height: 1.2; font-size: var(--h3-size);\">PAR38</h3><a href=\"https://www.ledhut.co.uk/led-bulbs/par38.html\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"margin: 0px; color: var(--brand-main); outline: 0px; transition: color 0.2s ease-in 0s;\">The PAR38 is a bulb that kicks-out a lot of lumens</a>&nbsp;(brightness). It comes with a screw fitting and is often used for workshops, security and commercial lighting.</td></tr></tbody></table>', '', '', 30, 1, 1, 30),
(105, 'BOSCH ROTARY HAMMER GBH 180-LI', '11800', '11099', 100, 'product-featured-105.jpg', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 10px; padding: 0px; font-family: Montserrat, sans-serif; font-size: 15px; color: rgb(170, 170, 170);\"><li>Product specifications and prices may change without prior notice.</li><li>Product availability varies for each sales channel. Call 11223 for inquiries.</li><li>Actual price may vary per outlet and or per e-commerce portal.</li></ul>', '<p><span style=\"color: rgb(102, 102, 102); font-family: Montserrat, sans-serif; font-size: 15px;\">A reliable and powerful drill driver for minor home projects.</span><br data-mce-fragment=\"1\" style=\"color: rgb(102, 102, 102); font-family: Montserrat, sans-serif; font-size: 15px;\"></p><ul style=\"margin-right: 0px; margin-left: 20px; padding: 0px; list-style-position: outside; list-style-image: initial; color: rgb(102, 102, 102); font-family: Montserrat, sans-serif; font-size: 15px;\"><li style=\"margin-bottom: 10px;\">Motor has changeable carbon brushes for easy maintenance</li><li style=\"margin-bottom: 10px;\">Designed with robust housing and battery cell protection</li><li style=\"margin-bottom: 10px;\">Optimized torque for screwdriving and speed for drilling thanks to 2-speed planetary gearbox Forward/reverse rotation for inserting and removing screws</li><li style=\"margin-bottom: 10px;\">Convenient change of accessories - keyless chuck opens and closes easily</li><li style=\"margin-bottom: 10px;\">Variable speed RPM control</li><li style=\"margin-bottom: 10px;\">Comfortable handling with Soft Grip technology</li><li style=\"margin-bottom: 0px;\">Ideal for metal and woodworking</li></ul>', '<p><span style=\"color: rgb(102, 102, 102); font-family: Montserrat, sans-serif; font-size: 15px;\">A reliable and powerful drill driver for minor home projects.</span><br data-mce-fragment=\"1\" style=\"color: rgb(102, 102, 102); font-family: Montserrat, sans-serif; font-size: 15px;\"></p><ul style=\"margin-right: 0px; margin-left: 20px; padding: 0px; list-style-position: outside; list-style-image: initial; color: rgb(102, 102, 102); font-family: Montserrat, sans-serif; font-size: 15px;\"><li style=\"margin-bottom: 10px;\">Motor has changeable carbon brushes for easy maintenance</li><li style=\"margin-bottom: 10px;\">Designed with robust housing and battery cell protection</li><li style=\"margin-bottom: 10px;\">Optimized torque for screwdriving and speed for drilling thanks to 2-speed planetary gearbox Forward/reverse rotation for inserting and removing screws</li><li style=\"margin-bottom: 10px;\">Convenient change of accessories - keyless chuck opens and closes easily</li><li style=\"margin-bottom: 10px;\">Variable speed RPM control</li><li style=\"margin-bottom: 10px;\">Comfortable handling with Soft Grip technology</li><li style=\"margin-bottom: 0px;\">Ideal for metal and woodworking</li></ul>', '<p><span style=\"color: rgb(102, 102, 102); font-family: Montserrat, sans-serif; font-size: 15px;\">A reliable and powerful drill driver for minor home projects.</span><br data-mce-fragment=\"1\" style=\"color: rgb(102, 102, 102); font-family: Montserrat, sans-serif; font-size: 15px;\"></p><ul style=\"margin-right: 0px; margin-left: 20px; padding: 0px; list-style-position: outside; list-style-image: initial; color: rgb(102, 102, 102); font-family: Montserrat, sans-serif; font-size: 15px;\"><li style=\"margin-bottom: 10px;\">Motor has changeable carbon brushes for easy maintenance</li><li style=\"margin-bottom: 10px;\">Designed with robust housing and battery cell protection</li><li style=\"margin-bottom: 10px;\">Optimized torque for screwdriving and speed for drilling thanks to 2-speed planetary gearbox Forward/reverse rotation for inserting and removing screws</li><li style=\"margin-bottom: 10px;\">Convenient change of accessories - keyless chuck opens and closes easily</li><li style=\"margin-bottom: 10px;\">Variable speed RPM control</li><li style=\"margin-bottom: 10px;\">Comfortable handling with Soft Grip technology</li><li style=\"margin-bottom: 0px;\">Ideal for metal and woodworking</li></ul>', '<p><span style=\"color: rgb(102, 102, 102); font-family: Montserrat, sans-serif; font-size: 15px;\">A reliable and powerful drill driver for minor home projects.</span><br data-mce-fragment=\"1\" style=\"color: rgb(102, 102, 102); font-family: Montserrat, sans-serif; font-size: 15px;\"></p><ul style=\"margin-right: 0px; margin-left: 20px; padding: 0px; list-style-position: outside; list-style-image: initial; color: rgb(102, 102, 102); font-family: Montserrat, sans-serif; font-size: 15px;\"><li style=\"margin-bottom: 10px;\">Motor has changeable carbon brushes for easy maintenance</li><li style=\"margin-bottom: 10px;\">Designed with robust housing and battery cell protection</li><li style=\"margin-bottom: 10px;\">Optimized torque for screwdriving and speed for drilling thanks to 2-speed planetary gearbox Forward/reverse rotation for inserting and removing screws</li><li style=\"margin-bottom: 10px;\">Convenient change of accessories - keyless chuck opens and closes easily</li><li style=\"margin-bottom: 10px;\">Variable speed RPM control</li><li style=\"margin-bottom: 10px;\">Comfortable handling with Soft Grip technology</li><li style=\"margin-bottom: 0px;\">Ideal for metal and woodworking</li></ul>', 16, 1, 1, 2),
(106, 'BN015C', '300', '290', 100, 'product-featured-106.jpg', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">16W, 8W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">1600, 800</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">6500</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">16W, 8W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">1600, 800</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">6500</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">16W, 8W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">1600, 800</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">6500</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">16W, 8W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">1600, 800</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">6500</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">16W, 8W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">1600, 800</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">6500</p></td></tr></tbody></table>', 10, 1, 1, 47),
(107, 'TCH086 1XTL5', '630', '600', 100, 'product-featured-107.jpg', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">14W, 21W, 28W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">3000, 4000, 6500</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">14W, 21W, 28W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">3000, 4000, 6500</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">14W, 21W, 28W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">3000, 4000, 6500</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">14W, 21W, 28W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">3000, 4000, 6500</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">14W, 21W, 28W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">3000, 4000, 6500</p></td></tr></tbody></table>', 5, 1, 1, 47),
(108, 'BN068C LED G2', '340', '319', 100, 'product-featured-108.jpg', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">14W, 21W, 28W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">3000, 4000, 6500</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">14W, 21W, 28W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">3000, 4000, 6500</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">14W, 21W, 28W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">3000, 4000, 6500</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">14W, 21W, 28W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">3000, 4000, 6500</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">14W, 21W, 28W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">3000, 4000, 6500</p></td></tr></tbody></table>', 1, 1, 1, 47);
INSERT INTO `tbl_product` (`p_id`, `p_name`, `p_old_price`, `p_current_price`, `p_qty`, `p_featured_photo`, `p_description`, `p_short_description`, `p_feature`, `p_condition`, `p_return_policy`, `p_total_view`, `p_is_featured`, `p_is_active`, `ecat_id`) VALUES
(109, 'Boysen Acqua Epoxy Reducer', '690', '620', 100, 'product-featured-109.jpg', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Gallon</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Gallon</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Gallon</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Gallon</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Gallon</p></td></tr></tbody></table>', 4, 1, 1, 38),
(110, 'Boysen Lacquer Primer Surfacer', '270', '250', 100, 'product-featured-110.jpg', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Gallon, Liter</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Gallon, Liter</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Gallon, Liter</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Gallon, Liter</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Gallon, Liter</p></td></tr></tbody></table>', 5, 1, 1, 18),
(111, 'Boysen Patching Compound', '500', '450', 100, 'product-featured-111.jpg', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Kilo, Sack</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Kilo, Sack</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Kilo, Sack</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Kilo, Sack</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Kilo, Sack</p></td></tr></tbody></table>', 1, 1, 1, 35),
(112, 'Boysen Plexibond Textile Finish', '1100', '900', 100, 'product-featured-112.jpg', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Gallon, Tin</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Gallon, Tin</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Gallon, Tin</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Gallon, Tin</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Gallon, Tin</p></td></tr></tbody></table>', 1, 1, 1, 21),
(113, 'RAIN OR SHINE TOP WHITE – 4L', '600', '570', 100, 'product-featured-113.jpg', '<p>BRAND</p><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Rain or Shine</p>', '<p>BRAND</p><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Rain or Shine</p>', '<p>BRAND</p><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Rain or Shine</p>', '<p>BRAND</p><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Rain or Shine</p>', '<p>BRAND</p><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Rain or Shine</p>', 0, 1, 1, 16),
(114, 'Boysen Curing Agent for Acqua Epoxy', '230', '210', 100, 'product-featured-114.jpg', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Liter</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Liter</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Liter</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Liter</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Boysen</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_unit\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">UNIT</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Liter</p></td></tr></tbody></table>', 0, 1, 1, 14),
(115, 'RAIN OR SHINE DIRT SHIELD', '850', '830', 100, 'product-featured-115.jpg', '<p><span style=\"color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;\">Rain or Shine Paints Dirt Shield- Dirt Resisting Paint</span><br></p>', '<p><span style=\"color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;\">Rain or Shine Paints Dirt Shield- Dirt Resisting Paint</span><br></p>', '<p><span style=\"color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;\">Rain or Shine Paints Dirt Shield- Dirt Resisting Paint</span><br></p>', '<p><span style=\"color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;\">Rain or Shine Paints Dirt Shield- Dirt Resisting Paint</span><br></p>', '<p><span style=\"color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px;\">Rain or Shine Paints Dirt Shield- Dirt Resisting Paint</span><br></p>', 0, 1, 1, 33);
INSERT INTO `tbl_product` (`p_id`, `p_name`, `p_old_price`, `p_current_price`, `p_qty`, `p_featured_photo`, `p_description`, `p_short_description`, `p_feature`, `p_condition`, `p_return_policy`, `p_total_view`, `p_is_featured`, `p_is_active`, `ecat_id`) VALUES
(116, 'BVC080 LED15/765', '3800', '3750', 100, 'product-featured-116.jpg', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">10W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">1500</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">6500</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">10W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">1500</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">6500</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">10W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">1500</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">6500</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">10W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">1500</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">6500</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">10W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">1500</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">6500</p></td></tr></tbody></table>', 2, 1, 1, 51),
(117, 'BVP175 LED', '13000', '12800', 100, 'product-featured-117.jpg', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">150W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">14200</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">5700</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">150W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">14200</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">5700</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">150W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">14200</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">5700</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">150W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">14200</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">5700</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">150W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">14200</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">5700</p></td></tr></tbody></table>', 0, 1, 1, 50),
(118, 'BVP080 LED10/757 060', '4500', '4200', 100, 'product-featured-118.jpg', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">10W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">1000</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">5700</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">10W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">1000</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">5700</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">10W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">1000</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">5700</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">10W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">1000</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">5700</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">10W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">1000</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">5700</p></td></tr></tbody></table>', 0, 1, 1, 51);
INSERT INTO `tbl_product` (`p_id`, `p_name`, `p_old_price`, `p_current_price`, `p_qty`, `p_featured_photo`, `p_description`, `p_short_description`, `p_feature`, `p_condition`, `p_return_policy`, `p_total_view`, `p_is_featured`, `p_is_active`, `ecat_id`) VALUES
(119, 'BVP172 LED', '4200', '4100', 100, 'product-featured-119.jpg', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">50W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">4300</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">3000, 5700</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">50W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">4300</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">3000, 5700</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">50W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">4300</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">3000, 5700</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">50W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">4300</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">3000, 5700</p></td></tr></tbody></table>', '<table class=\"woocommerce-product-attributes shop_attributes\" style=\"width: 1340px; margin-bottom: 1em; border-color: rgb(236, 236, 236); color: rgb(119, 119, 119); font-family: kanit-reg, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><tbody><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_brand\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">BRAND</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">Philips</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_power-w\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">POWER (W)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">50W</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_lum-flux-lm\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">LUM. FLUX (LM)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">4300</p></td></tr><tr class=\"woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_cct-k\"><th class=\"woocommerce-product-attributes-item__label\" style=\"padding-top: 0.5em; padding-right: 0.5em; padding-bottom: 0.5em; border-bottom: 0px; line-height: 1.05; font-size: 0.9em; letter-spacing: 0.05em; text-transform: uppercase;\">CCT (K)</th><td class=\"woocommerce-product-attributes-item__value\" style=\"padding-top: 0.5em; padding-bottom: 0.5em; padding-left: 0.5em; border-bottom: 0px; line-height: 1.3; font-size: 0.9em; color: rgb(102, 102, 102);\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em;\">3000, 5700</p></td></tr></tbody></table>', 3, 1, 1, 50),
(120, 'DEWALT DCD700C1-B1 10.8V LI-ION DRILL DRIVER W/1 1.3AH BATTERY', '5800', '5790', 100, 'product-featured-120.jpg', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">DEWALT DCD700C1-B1 10.8V LI-ION DRILL DRIVER W/1 1.3AH BATTERY</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">DEWALT DCD700C1-B1 10.8V LI-ION DRILL DRIVER W/1 1.3AH BATTERY</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">DEWALT DCD700C1-B1 10.8V LI-ION DRILL DRIVER W/1 1.3AH BATTERY</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">DEWALT DCD700C1-B1 10.8V LI-ION DRILL DRIVER W/1 1.3AH BATTERY</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">DEWALT DCD700C1-B1 10.8V LI-ION DRILL DRIVER W/1 1.3AH BATTERY</h1>', 2, 1, 1, 3),
(121, 'EAGLE ECS-7006 CIRCULAR SAW 1300W 185MM', '3800', '3700', 100, 'product-featured-121.jpg', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">EAGLE ECS-7006 CIRCULAR SAW 1300W 185MM</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">EAGLE ECS-7006 CIRCULAR SAW 1300W 185MM</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">EAGLE ECS-7006 CIRCULAR SAW 1300W 185MM</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">EAGLE ECS-7006 CIRCULAR SAW 1300W 185MM</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">EAGLE ECS-7006 CIRCULAR SAW 1300W 185MM</h1>', 9, 1, 1, 57),
(122, 'Ingco Digital AC Clamp Meter', '1650', '1600', 99, 'product-featured-122.jpg', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">Ingco Digital AC Clamp Meter</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">Ingco Digital AC Clamp Meter</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">Ingco Digital AC Clamp Meter</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">Ingco Digital AC Clamp Meter</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">Ingco Digital AC Clamp Meter</h1>', 10, 1, 1, 1),
(123, 'EAGLE EID-519 IMPACT DRILL 600W 13MM 220V', '2000', '1950', 99, 'product-featured-123.jpg', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">EAGLE EID-519 IMPACT DRILL 600W 13MM 220V</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">EAGLE EID-519 IMPACT DRILL 600W 13MM 220V</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">EAGLE EID-519 IMPACT DRILL 600W 13MM 220V</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">EAGLE EID-519 IMPACT DRILL 600W 13MM 220V</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">EAGLE EID-519 IMPACT DRILL 600W 13MM 220V</h1>', 10, 1, 1, 57),
(124, 'Ingco Inverter MMA Welding Machine 220A', '6700', '6600', 99, 'product-featured-124.jpg', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">Ingco Inverter MMA Welding Machine 220A</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">Ingco Inverter MMA Welding Machine 220A</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">Ingco Inverter MMA Welding Machine 220A</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">Ingco Inverter MMA Welding Machine 220A</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">Ingco Inverter MMA Welding Machine 220A</h1>', 6, 1, 1, 4),
(125, 'Ingco Rotary Sander 320W', '5000', '4800', 75, 'product-featured-125.jpg', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">Ingco Rotary Sander 320W</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">Ingco Rotary Sander 320W</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">Ingco Rotary Sander 320W</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">Ingco Rotary Sander 320W</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">Ingco Rotary Sander 320W</h1>', 13, 1, 1, 57),
(126, 'Ingco Angle Grinder 4? 900W (Toggle Switch)', '4,000', '3,800', 100, 'product-featured-126.jpg', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">Ingco Angle Grinder 4? 900W (Toggle Switch)</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">Ingco Angle Grinder 4? 900W (Toggle Switch)</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">Ingco Angle Grinder 4? 900W (Toggle Switch)</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">Ingco Angle Grinder 4? 900W (Toggle Switch)</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">Ingco Angle Grinder 4? 900W (Toggle Switch)</h1>', 13, 1, 1, 56),
(127, 'EAGLE EMC-4100 MARBLE CUTTER 1350W 110MM', '2,800', '2,700', 100, 'product-featured-127.jpg', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">EAGLE EMC-4100 MARBLE CUTTER 1350W 110MM</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">EAGLE EMC-4100 MARBLE CUTTER 1350W 110MM</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">EAGLE EMC-4100 MARBLE CUTTER 1350W 110MM</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">EAGLE EMC-4100 MARBLE CUTTER 1350W 110MM</h1>', '<h1 class=\"product-title product_title entry-title\" style=\"color: rgb(85, 85, 85); width: 524.844px; margin-top: 0px; margin-bottom: 0.5em; text-rendering: optimizespeed; font-size: 1.7em; line-height: 1.3; font-family: kanit-reg, sans-serif; font-weight: 700;\">EAGLE EMC-4100 MARBLE CUTTER 1350W 110MM</h1>', 13, 1, 1, 56),
(129, 'Black & Decker Drill 550 Watts HD555KMPR B1', '3,999', '3199', 100, 'product-featured-129.jpg', '<p style=\"-webkit-font-smoothing: antialiased; font-size: 16px; margin-bottom: 0.7em; font-family: &quot;DIN Next&quot;, sans-serif;\">Perfect for building.<br style=\"-webkit-font-smoothing: antialiased;\"></p><p style=\"-webkit-font-smoothing: antialiased; font-size: 16px; margin-bottom: 0px; font-family: &quot;DIN Next&quot;, sans-serif;\">220-240V 60hz, 550W 13mm chuck capacity<br style=\"-webkit-font-smoothing: antialiased;\">0-2,800/minute load speed<br style=\"-webkit-font-smoothing: antialiased;\">Drill capacity: steel 13mm / wood 25mm / masonry 16mm</p>', '<p style=\"-webkit-font-smoothing: antialiased; font-size: 16px; margin-bottom: 0.7em; font-family: &quot;DIN Next&quot;, sans-serif;\">Perfect for building.<br style=\"-webkit-font-smoothing: antialiased;\"></p><p style=\"-webkit-font-smoothing: antialiased; font-size: 16px; margin-bottom: 0px; font-family: &quot;DIN Next&quot;, sans-serif;\">220-240V 60hz, 550W 13mm chuck capacity<br style=\"-webkit-font-smoothing: antialiased;\">0-2,800/minute load speed<br style=\"-webkit-font-smoothing: antialiased;\">Drill capacity: steel 13mm / wood 25mm / masonry 16mm</p>', '<p style=\"-webkit-font-smoothing: antialiased; font-size: 16px; margin-bottom: 0.7em; font-family: &quot;DIN Next&quot;, sans-serif;\">Perfect for building.<br style=\"-webkit-font-smoothing: antialiased;\"></p><p style=\"-webkit-font-smoothing: antialiased; font-size: 16px; margin-bottom: 0px; font-family: &quot;DIN Next&quot;, sans-serif;\">220-240V 60hz, 550W 13mm chuck capacity<br style=\"-webkit-font-smoothing: antialiased;\">0-2,800/minute load speed<br style=\"-webkit-font-smoothing: antialiased;\">Drill capacity: steel 13mm / wood 25mm / masonry 16mm</p>', '<p style=\"-webkit-font-smoothing: antialiased; font-size: 16px; margin-bottom: 0.7em; font-family: &quot;DIN Next&quot;, sans-serif;\">Perfect for building.<br style=\"-webkit-font-smoothing: antialiased;\"></p><p style=\"-webkit-font-smoothing: antialiased; font-size: 16px; margin-bottom: 0px; font-family: &quot;DIN Next&quot;, sans-serif;\">220-240V 60hz, 550W 13mm chuck capacity<br style=\"-webkit-font-smoothing: antialiased;\">0-2,800/minute load speed<br style=\"-webkit-font-smoothing: antialiased;\">Drill capacity: steel 13mm / wood 25mm / masonry 16mm</p>', '<p style=\"-webkit-font-smoothing: antialiased; font-size: 16px; margin-bottom: 0.7em; font-family: &quot;DIN Next&quot;, sans-serif;\">Perfect for building.<br style=\"-webkit-font-smoothing: antialiased;\"></p><p style=\"-webkit-font-smoothing: antialiased; font-size: 16px; margin-bottom: 0px; font-family: &quot;DIN Next&quot;, sans-serif;\">220-240V 60hz, 550W 13mm chuck capacity<br style=\"-webkit-font-smoothing: antialiased;\">0-2,800/minute load speed<br style=\"-webkit-font-smoothing: antialiased;\">Drill capacity: steel 13mm / wood 25mm / masonry 16mm</p>', 27, 1, 1, 57);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_color`
--

CREATE TABLE `tbl_product_color` (
  `id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product_color`
--

INSERT INTO `tbl_product_color` (`id`, `color_id`, `p_id`) VALUES
(69, 1, 4),
(70, 4, 4),
(77, 6, 6),
(82, 2, 12),
(83, 9, 13),
(84, 3, 14),
(85, 2, 15),
(86, 6, 15),
(87, 3, 16),
(88, 3, 17),
(89, 2, 18),
(90, 3, 19),
(91, 1, 20),
(92, 8, 21),
(93, 2, 22),
(94, 2, 23),
(95, 2, 25),
(96, 5, 26),
(97, 2, 27),
(98, 4, 27),
(99, 5, 28),
(100, 7, 29),
(101, 10, 30),
(102, 11, 31),
(103, 14, 32),
(105, 2, 34),
(106, 1, 35),
(107, 3, 36),
(109, 6, 38),
(110, 2, 39),
(111, 11, 42),
(149, 3, 10),
(150, 6, 9),
(151, 3, 8),
(152, 7, 7),
(159, 2, 77),
(163, 17, 79),
(164, 2, 78),
(167, 3, 80),
(168, 2, 81),
(172, 1, 82),
(173, 2, 82),
(174, 4, 82),
(273, 2, 103),
(274, 3, 103),
(275, 4, 103),
(276, 6, 104),
(277, 3, 105),
(278, 6, 106),
(279, 6, 107),
(280, 6, 108),
(281, 6, 109),
(282, 6, 110),
(283, 6, 111),
(284, 6, 112),
(285, 6, 113),
(286, 6, 114),
(287, 6, 115),
(288, 6, 116),
(289, 6, 117),
(290, 2, 118),
(291, 6, 119),
(292, 4, 120),
(293, 7, 121),
(294, 4, 122),
(295, 7, 122),
(296, 1, 123),
(297, 7, 124),
(298, 4, 125),
(301, 8, 128),
(302, 7, 127),
(303, 4, 126),
(304, 1, 129),
(305, 2, 129),
(306, 4, 129);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_photo`
--

CREATE TABLE `tbl_product_photo` (
  `pp_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product_photo`
--

INSERT INTO `tbl_product_photo` (`pp_id`, `photo`, `p_id`) VALUES
(134, '134.jpg', 103),
(135, '135.jpg', 104),
(136, '136.jpg', 129);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_size`
--

CREATE TABLE `tbl_product_size` (
  `id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product_size`
--

INSERT INTO `tbl_product_size` (`id`, `size_id`, `p_id`) VALUES
(44, 1, 6),
(56, 8, 12),
(57, 9, 12),
(58, 10, 12),
(59, 11, 12),
(60, 12, 12),
(61, 13, 12),
(62, 9, 13),
(63, 11, 13),
(64, 13, 13),
(65, 15, 13),
(66, 9, 14),
(67, 11, 14),
(68, 12, 14),
(69, 13, 14),
(70, 9, 15),
(71, 11, 15),
(72, 13, 15),
(73, 15, 16),
(74, 16, 16),
(75, 17, 16),
(76, 16, 17),
(77, 17, 17),
(78, 14, 18),
(79, 15, 18),
(80, 16, 18),
(81, 17, 18),
(82, 15, 19),
(83, 16, 19),
(84, 17, 19),
(85, 14, 20),
(86, 15, 20),
(87, 17, 20),
(88, 15, 21),
(89, 17, 21),
(90, 15, 22),
(91, 16, 22),
(92, 17, 22),
(93, 15, 23),
(94, 16, 23),
(95, 17, 23),
(96, 18, 25),
(97, 19, 25),
(98, 20, 25),
(99, 21, 25),
(100, 19, 26),
(101, 21, 26),
(102, 22, 26),
(103, 23, 26),
(104, 19, 27),
(105, 20, 27),
(106, 21, 27),
(107, 22, 27),
(108, 19, 28),
(109, 20, 28),
(110, 21, 28),
(111, 19, 29),
(112, 20, 29),
(113, 22, 29),
(114, 1, 30),
(115, 2, 30),
(116, 3, 30),
(117, 4, 30),
(118, 23, 31),
(119, 26, 32),
(123, 2, 34),
(124, 2, 35),
(125, 2, 36),
(126, 3, 36),
(129, 2, 38),
(130, 3, 38),
(131, 4, 38),
(132, 5, 38),
(133, 27, 39),
(134, 8, 42),
(210, 3, 10),
(211, 4, 10),
(212, 5, 10),
(213, 6, 10),
(214, 3, 9),
(215, 4, 9),
(216, 3, 8),
(217, 4, 8),
(218, 2, 7),
(219, 3, 7),
(220, 4, 7),
(249, 1, 79),
(250, 2, 79),
(251, 3, 79),
(252, 1, 78),
(253, 2, 78),
(254, 3, 78),
(255, 4, 78),
(256, 5, 78),
(259, 26, 80),
(262, 3, 82),
(263, 4, 82),
(453, 2, 103),
(454, 3, 103),
(455, 4, 103),
(456, 5, 103),
(457, 47, 104),
(458, 27, 105),
(459, 27, 106),
(460, 27, 107),
(461, 27, 108),
(462, 27, 109),
(463, 27, 110),
(464, 27, 111),
(465, 27, 112),
(466, 27, 113),
(467, 27, 114),
(468, 27, 115),
(469, 27, 116),
(470, 27, 117),
(471, 27, 118),
(472, 27, 119),
(473, 27, 120),
(474, 27, 121),
(475, 27, 122),
(476, 27, 123),
(477, 27, 124),
(478, 27, 125),
(481, 27, 128),
(482, 27, 127),
(483, 27, 126),
(484, 26, 129),
(485, 27, 129);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rt_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id`, `title`, `content`, `photo`) VALUES
(11, 'Outsourcing', 'standleyhardware@gmail.com', 'service-11.png'),
(12, 'Fast Shipping', 'Items are shipped within 24 hours.', 'service-12.png'),
(13, 'Secure Checkout', 'Providing Secure Checkout Options for all', 'service-13.png'),
(14, 'Satisfaction Guarantee', 'We guarantee you with our quality satisfaction.', 'service-14.png'),
(16, 'Money Back Guarantee', 'Offer money back guarantee on our products', 'service-16.png'),
(17, 'Easy Returns', 'Return any item before 15 days!', 'service-17.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `footer_about` text NOT NULL,
  `footer_copyright` text NOT NULL,
  `contact_address` text NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_fax` varchar(255) NOT NULL,
  `contact_map_iframe` text NOT NULL,
  `receive_email` varchar(255) NOT NULL,
  `receive_email_subject` varchar(255) NOT NULL,
  `receive_email_thank_you_message` text NOT NULL,
  `forget_password_message` text NOT NULL,
  `total_recent_post_footer` int(10) NOT NULL,
  `total_popular_post_footer` int(10) NOT NULL,
  `total_recent_post_sidebar` int(11) NOT NULL,
  `total_popular_post_sidebar` int(11) NOT NULL,
  `total_featured_product_home` int(11) NOT NULL,
  `total_latest_product_home` int(11) NOT NULL,
  `total_popular_product_home` int(11) NOT NULL,
  `meta_title_home` text NOT NULL,
  `meta_keyword_home` text NOT NULL,
  `meta_description_home` text NOT NULL,
  `banner_login` varchar(255) NOT NULL,
  `banner_registration` varchar(255) NOT NULL,
  `banner_forget_password` varchar(255) NOT NULL,
  `banner_reset_password` varchar(255) NOT NULL,
  `banner_search` varchar(255) NOT NULL,
  `banner_cart` varchar(255) NOT NULL,
  `banner_checkout` varchar(255) NOT NULL,
  `banner_product_category` varchar(255) NOT NULL,
  `banner_blog` varchar(255) NOT NULL,
  `cta_title` varchar(255) NOT NULL,
  `cta_content` text NOT NULL,
  `cta_read_more_text` varchar(255) NOT NULL,
  `cta_read_more_url` varchar(255) NOT NULL,
  `cta_photo` varchar(255) NOT NULL,
  `featured_product_title` varchar(255) NOT NULL,
  `featured_product_subtitle` varchar(255) NOT NULL,
  `latest_product_title` varchar(255) NOT NULL,
  `latest_product_subtitle` varchar(255) NOT NULL,
  `popular_product_title` varchar(255) NOT NULL,
  `popular_product_subtitle` varchar(255) NOT NULL,
  `testimonial_title` varchar(255) NOT NULL,
  `testimonial_subtitle` varchar(255) NOT NULL,
  `testimonial_photo` varchar(255) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_subtitle` varchar(255) NOT NULL,
  `newsletter_text` text NOT NULL,
  `paypal_email` varchar(255) NOT NULL,
  `stripe_public_key` varchar(255) NOT NULL,
  `stripe_secret_key` varchar(255) NOT NULL,
  `bank_detail` text NOT NULL,
  `before_head` text NOT NULL,
  `after_body` text NOT NULL,
  `before_body` text NOT NULL,
  `home_service_on_off` int(11) NOT NULL,
  `home_welcome_on_off` int(11) NOT NULL,
  `home_featured_product_on_off` int(11) NOT NULL,
  `home_latest_product_on_off` int(11) NOT NULL,
  `home_popular_product_on_off` int(11) NOT NULL,
  `home_testimonial_on_off` int(11) NOT NULL,
  `home_blog_on_off` int(11) NOT NULL,
  `newsletter_on_off` int(11) NOT NULL,
  `ads_above_welcome_on_off` int(1) NOT NULL,
  `ads_above_featured_product_on_off` int(1) NOT NULL,
  `ads_above_latest_product_on_off` int(1) NOT NULL,
  `ads_above_popular_product_on_off` int(1) NOT NULL,
  `ads_above_testimonial_on_off` int(1) NOT NULL,
  `ads_category_sidebar_on_off` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPRESSED;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `logo`, `favicon`, `footer_about`, `footer_copyright`, `contact_address`, `contact_email`, `contact_phone`, `contact_fax`, `contact_map_iframe`, `receive_email`, `receive_email_subject`, `receive_email_thank_you_message`, `forget_password_message`, `total_recent_post_footer`, `total_popular_post_footer`, `total_recent_post_sidebar`, `total_popular_post_sidebar`, `total_featured_product_home`, `total_latest_product_home`, `total_popular_product_home`, `meta_title_home`, `meta_keyword_home`, `meta_description_home`, `banner_login`, `banner_registration`, `banner_forget_password`, `banner_reset_password`, `banner_search`, `banner_cart`, `banner_checkout`, `banner_product_category`, `banner_blog`, `cta_title`, `cta_content`, `cta_read_more_text`, `cta_read_more_url`, `cta_photo`, `featured_product_title`, `featured_product_subtitle`, `latest_product_title`, `latest_product_subtitle`, `popular_product_title`, `popular_product_subtitle`, `testimonial_title`, `testimonial_subtitle`, `testimonial_photo`, `blog_title`, `blog_subtitle`, `newsletter_text`, `paypal_email`, `stripe_public_key`, `stripe_secret_key`, `bank_detail`, `before_head`, `after_body`, `before_body`, `home_service_on_off`, `home_welcome_on_off`, `home_featured_product_on_off`, `home_latest_product_on_off`, `home_popular_product_on_off`, `home_testimonial_on_off`, `home_blog_on_off`, `newsletter_on_off`, `ads_above_welcome_on_off`, `ads_above_featured_product_on_off`, `ads_above_latest_product_on_off`, `ads_above_popular_product_on_off`, `ads_above_testimonial_on_off`, `ads_category_sidebar_on_off`) VALUES
(1, 'logo.png', 'favicon.png', '<p>Lorem ipsum dolor sit amet, omnis signiferumque in mei, mei ex enim concludaturque. Senserit salutandi euripidis no per, modus maiestatis scribentur est an.Â Ea suas pertinax has.</p>\r\n', 'Copyright 2023 - Standly Hardware Store Admin', 'QX24+3C Meycauayan, Bulacan, Philippines', 'standlyhardware@gmail.com', '+639917864562', '', '<div class=\"mapouter\"><div class=\"gmap_canvas\"><iframe class=\"gmap_iframe\" width=\"100%\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"https://maps.google.com/maps?width=655&height=289&hl=en&q=jollitex trading&t=p&z=14&ie=UTF8&iwloc=B&output=embed\"></iframe><a href=\"https://capcuttemplate.org/\">Capcut Template</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:299px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:289px;}.gmap_iframe {height:289px!important;}</style></div>', 'standlyhardware@gmail.com', 'Standly Hardware Store', 'Thank you for sending email. We will contact you shortly.', 'A confirmation link is sent to your email address. You will get the password reset information in there.', 4, 4, 5, 5, 8, 8, 8, 'Standly Hardware Store', 'Standly Hardware Store', 'Standly Hardware Store provides a bunch variety of products.', 'banner_login.jpeg', 'banner_registration.jpg', 'banner_forget_password.jpg', 'banner_reset_password.jpg', 'banner_search.jpg', 'banner_cart.jpg', 'banner_checkout.jpg', 'banner_product_category.jpg', 'banner_blog.jpg', 'Welcome To Our Ecommerce Website', 'Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, \r\nat usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. ', 'Read More', '#', 'cta.jpg', 'Featured Products', 'Our list on Top Featured Products', 'Latest Products', 'Our list of recently added products', 'Popular Products', 'Popular products based on customer\'s choice', 'Testimonials', 'See what our clients tell about us', 'testimonial.jpg', 'Latest Blog', 'See all our latest articles and news from below', 'Sign-up to our newsletter for latest promotions and discounts.', 'standlyhardware@gmail.com', 'pk_test_0SwMWadgu8DwmEcPdUPRsZ7b', 'sk_test_TFcsLJ7xxUtpALbDo1L5c1PN', 'Bank Name: BDO\r\nAccount Number: PH100270589600\r\nBranch Name: Marilao branch\r\nCountry: Philippines', '', '<div id=\"fb-root\"></div>\r\n<script>(function(d, s, id) {\r\n  var js, fjs = d.getElementsByTagName(s)[0];\r\n  if (d.getElementById(id)) return;\r\n  js = d.createElement(s); js.id = id;\r\n  js.src = \"//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=323620764400430\";\r\n  fjs.parentNode.insertBefore(js, fjs);\r\n}(document, \'script\', \'facebook-jssdk\'));</script>', '<!--Start of Tawk.to Script-->\r\n<script type=\"text/javascript\">\r\nvar Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n(function(){\r\nvar s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\r\ns1.async=true;\r\ns1.src=\'https://embed.tawk.to/5ae370d7227d3d7edc24cb96/default\';\r\ns1.charset=\'UTF-8\';\r\ns1.setAttribute(\'crossorigin\',\'*\');\r\ns0.parentNode.insertBefore(s1,s0);\r\n})();\r\n</script>\r\n<!--End of Tawk.to Script-->', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping_cost`
--

CREATE TABLE `tbl_shipping_cost` (
  `shipping_cost_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `amount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_shipping_cost`
--

INSERT INTO `tbl_shipping_cost` (`shipping_cost_id`, `country_id`, `amount`) VALUES
(1, 228, '11'),
(2, 167, '10'),
(3, 13, '8'),
(4, 233, '2'),
(5, 25, '100');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping_cost_all`
--

CREATE TABLE `tbl_shipping_cost_all` (
  `sca_id` int(11) NOT NULL,
  `amount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_shipping_cost_all`
--

INSERT INTO `tbl_shipping_cost_all` (`sca_id`, `amount`) VALUES
(1, '100');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_size`
--

CREATE TABLE `tbl_size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_size`
--

INSERT INTO `tbl_size` (`size_id`, `size_name`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(6, 'XXL'),
(7, '3XL'),
(8, '31'),
(9, '32'),
(10, '33'),
(11, '34'),
(12, '35'),
(13, '36'),
(14, '37'),
(15, '38'),
(16, '39'),
(17, '40'),
(18, '41'),
(19, '42'),
(20, '43'),
(21, '44'),
(22, '45'),
(23, '46'),
(24, '47'),
(25, '48'),
(26, 'Free Size'),
(27, 'One Size for All'),
(28, '10'),
(29, '12 Months'),
(30, '2T'),
(31, '3T'),
(32, '4T'),
(33, '5T'),
(34, '6 Years'),
(35, '7 Years'),
(36, '8 Years'),
(37, '10 Years'),
(38, '12 Years'),
(39, '14 Years'),
(40, '256 GB'),
(41, '128 GB'),
(42, '14 Plus'),
(43, '16 Plus'),
(44, '18 Plus'),
(45, '20 Plus'),
(46, '22 Plus'),
(47, '24 Plus');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `button_text` varchar(255) NOT NULL,
  `button_url` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `photo`, `heading`, `content`, `button_text`, `button_url`, `position`) VALUES
(6, 'slider-6.jpg', 'Trending Item', 'LATEST AUTOMOTIVE PRODUCTS', 'starting at ? 199.00', 'http://localhost/StandlyStore/product-category.php?id=1&type=top-category', 'Left'),
(7, 'slider-7.jpg', 'Trending Accessories', 'MODERN HAND TOOLS', 'starting at ? 115.00', 'http://localhost/StandlyStore/product-category.php?id=1&type=top-category', 'Left'),
(8, 'slider-8.jpg', 'Sale Offer', 'LATEST PLUMBING PRODUCTS AND PIPES', 'starting at ? 209.99', 'http://localhost/StandlyStore/product-category.php?id=1&type=top-category', 'Left');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `social_id` int(11) NOT NULL,
  `social_name` varchar(30) NOT NULL,
  `social_url` varchar(255) NOT NULL,
  `social_icon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`social_id`, `social_name`, `social_url`, `social_icon`) VALUES
(1, 'Facebook', 'https://www.facebook.com/#', 'fa fa-facebook'),
(2, 'Twitter', 'https://www.twitter.com/#', 'fa fa-twitter'),
(3, 'LinkedIn', '', 'fa fa-linkedin'),
(4, 'Google Plus', '', 'fa fa-google-plus'),
(5, 'Pinterest', '', 'fa fa-pinterest'),
(6, 'YouTube', 'https://www.youtube.com/#', 'fa fa-youtube'),
(7, 'Instagram', 'https://www.instagram.com/#', 'fa fa-instagram'),
(8, 'Tumblr', '', 'fa fa-tumblr'),
(9, 'Flickr', '', 'fa fa-flickr'),
(10, 'Reddit', '', 'fa fa-reddit'),
(11, 'Snapchat', '', 'fa fa-snapchat'),
(12, 'WhatsApp', 'https://www.whatsapp.com/#', 'fa fa-whatsapp'),
(13, 'Quora', '', 'fa fa-quora'),
(14, 'StumbleUpon', '', 'fa fa-stumbleupon'),
(15, 'Delicious', '', 'fa fa-delicious'),
(16, 'Digg', '', 'fa fa-digg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscriber`
--

CREATE TABLE `tbl_subscriber` (
  `subs_id` int(11) NOT NULL,
  `subs_email` varchar(255) NOT NULL,
  `subs_date` varchar(100) NOT NULL,
  `subs_date_time` varchar(100) NOT NULL,
  `subs_hash` varchar(255) NOT NULL,
  `subs_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_subscriber`
--

INSERT INTO `tbl_subscriber` (`subs_id`, `subs_email`, `subs_date`, `subs_date_time`, `subs_hash`, `subs_active`) VALUES
(5, 'greenwd1154@mail.com', '2022-03-20', '2022-03-20 10:28:09', '279ecfe9debbb091c664641f534857ee', 1),
(6, 'awsm785@mail.com', '2022-03-20', '2022-03-20 10:28:21', '94096ae01fc65e71c50c7843d096e041', 1),
(10, 'stevenduran@gmail.com', '2023-06-04', '2023-06-04 21:20:25', '5a0461e5c9fff29207f6bee3fc0664fa', 0),
(11, 'jovantalagtag14@gmail.com', '2023-06-04', '2023-06-04 21:20:40', 'd34aa055195e69df0d44b7c7b39ff482', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_top_category`
--

CREATE TABLE `tbl_top_category` (
  `tcat_id` int(11) NOT NULL,
  `tcat_name` varchar(255) NOT NULL,
  `show_on_menu` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_top_category`
--

INSERT INTO `tbl_top_category` (`tcat_id`, `tcat_name`, `show_on_menu`) VALUES
(1, 'Hand Tools', 1),
(2, 'Electrical', 1),
(3, 'Paints & Coatings ', 1),
(4, 'Board Products', 1),
(5, 'Cement & Concrete', 1),
(6, 'Plumbing', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `full_name`, `email`, `phone`, `password`, `photo`, `role`, `status`) VALUES
(1, 'Administrator', 'admin@mail.com', '09916414675', 'b59c6e9b344bae1a36fe427a42889265', 'user-1.jpg', 'Super Admin', 'Active'),
(2, 'Christine', 'christine@mail.com', '4444444444', '81dc9bdb52d04dc20036dbd8313ed055', 'user-13.jpg', 'Admin', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `iframe_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`id`, `title`, `iframe_code`) VALUES
(1, 'Video 1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/L3XAFSMdVWU\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>'),
(2, 'Video 2', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/sinQ06YzbJI\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>'),
(4, 'Video 3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ViZNgU-Yt-Y\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `tbl_customer_message`
--
ALTER TABLE `tbl_customer_message`
  ADD PRIMARY KEY (`customer_message_id`);

--
-- Indexes for table `tbl_end_category`
--
ALTER TABLE `tbl_end_category`
  ADD PRIMARY KEY (`ecat_id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `tbl_language`
--
ALTER TABLE `tbl_language`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `tbl_mid_category`
--
ALTER TABLE `tbl_mid_category`
  ADD PRIMARY KEY (`mcat_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_product_color`
--
ALTER TABLE `tbl_product_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_photo`
--
ALTER TABLE `tbl_product_photo`
  ADD PRIMARY KEY (`pp_id`);

--
-- Indexes for table `tbl_product_size`
--
ALTER TABLE `tbl_product_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`rt_id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shipping_cost`
--
ALTER TABLE `tbl_shipping_cost`
  ADD PRIMARY KEY (`shipping_cost_id`);

--
-- Indexes for table `tbl_shipping_cost_all`
--
ALTER TABLE `tbl_shipping_cost_all`
  ADD PRIMARY KEY (`sca_id`);

--
-- Indexes for table `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`social_id`);

--
-- Indexes for table `tbl_subscriber`
--
ALTER TABLE `tbl_subscriber`
  ADD PRIMARY KEY (`subs_id`);

--
-- Indexes for table `tbl_top_category`
--
ALTER TABLE `tbl_top_category`
  ADD PRIMARY KEY (`tcat_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_customer_message`
--
ALTER TABLE `tbl_customer_message`
  MODIFY `customer_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_end_category`
--
ALTER TABLE `tbl_end_category`
  MODIFY `ecat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_language`
--
ALTER TABLE `tbl_language`
  MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `tbl_mid_category`
--
ALTER TABLE `tbl_mid_category`
  MODIFY `mcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `tbl_product_color`
--
ALTER TABLE `tbl_product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `tbl_product_photo`
--
ALTER TABLE `tbl_product_photo`
  MODIFY `pp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `tbl_product_size`
--
ALTER TABLE `tbl_product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=486;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `rt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_shipping_cost`
--
ALTER TABLE `tbl_shipping_cost`
  MODIFY `shipping_cost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_shipping_cost_all`
--
ALTER TABLE `tbl_shipping_cost_all`
  MODIFY `sca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_subscriber`
--
ALTER TABLE `tbl_subscriber`
  MODIFY `subs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_top_category`
--
ALTER TABLE `tbl_top_category`
  MODIFY `tcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

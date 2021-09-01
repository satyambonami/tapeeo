-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2021 at 09:07 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bnmi_tappeo`
--

-- --------------------------------------------------------

--
-- Table structure for table `bnmi_cart`
--

CREATE TABLE `bnmi_cart` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `prod_id` int(10) DEFAULT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `variant` varchar(50) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bnmi_cms_pages`
--

CREATE TABLE `bnmi_cms_pages` (
  `id` int(10) NOT NULL,
  `type` tinyint(2) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `img` varchar(300) DEFAULT 'default.jpg',
  `desc` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 2 COMMENT '0=delete, 1=inactive, 2=active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bnmi_cms_pages`
--

INSERT INTO `bnmi_cms_pages` (`id`, `type`, `title`, `img`, `desc`, `status`) VALUES
(14, 1, 'Section Title', '4025_1621763427.jpg', '&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n', 2),
(15, 1, 'Section Title', '9042_1621763480.jpg', '&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n', 2),
(16, 2, 'Happy Customers', '4819_1621763569.png', '100', 2),
(17, 2, 'Delivery', '6432_1621763647.png', '100', 2),
(18, 2, 'Support', '2368_1621763679.png', '100', 2),
(20, 1, 'Section Title', '3935_1621763506.jpg', '&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bnmi_general`
--

CREATE TABLE `bnmi_general` (
  `id` int(100) NOT NULL,
  `key_name` varchar(255) NOT NULL,
  `key_value` text NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bnmi_general`
--

INSERT INTO `bnmi_general` (`id`, `key_name`, `key_value`, `status`) VALUES
(1, 'logo', 'logo.png', 2),
(2, 'favicon', 'favicon.png', 2),
(3, 'facebook', 'https://www.facebook.com/ecommerce', 2),
(4, 'linkedin', 'https://www.linkedin.com/company/ecommerce', 2),
(5, 'twitter', 'https://www.twitter.com/in/ecommerce', 2),
(6, 'youtube', '', 2),
(7, 'instagram', 'https://www.instagram.com/ecommerce', 2),
(8, 'pinterest', '', 2),
(10, 'website_name', 'Ecommerce', 2),
(11, 'phone_number', '9015111393', 2),
(12, 'email', 'info@ecomm.com', 2),
(13, 'address', 'Delhi-93, India', 2),
(14, 'desc', '', 2),
(15, 'meta_title', 'Meta Title will Go Here', 2),
(16, 'meta_desc', 'Meta description will go here...', 2),
(17, 'meta_key', 'keyword1, keyword2, keyword3...', 2),
(18, 'meta_body', '', 2),
(19, 'header_bg', '#ef5350', 2),
(20, 'header_text', '#ffffff', 2),
(21, 'btn_bg', '#ef5350', 2),
(22, 'btn_text', '&lt;h3&gt;Privacy &amp;amp; Policy&lt;/h3&gt;\r\n\r\n&lt;hr /&gt;\r\n&lt;p&gt;Work direction and development for a team of executives (15-20 in number). Monitor schedule adherence of the executives and advise the leadership team of issues negatively impacting service levels. Provide operational floor management by monitoring service levels, making appropriate decisions, responsible for the daily monitoring of quality and production of the outbound / inbound status group and manual processes. Provide performance feedback to the executives. Assist with training and identify training needs within the group and provide feedback. Mentor and assist new hires. Act as a central point of contact to reporting &amp;amp; escalating system issues to technology &amp;amp; the leadership. CRITICAL SKILLS REQUIRED Customer Service(Inbound)Skills.&amp;nbsp;Work direction and development for a team of executives (15-20 in number). Monitor schedule adherence of the executives and advise the leadership team of issues negatively impacting service levels. Provide operational floor management by monitoring service levels, making appropriate decisions, responsible for the daily monitoring of quality and production of the outbound / inbound status group and manual processes. Provide performance feedback to the executives. Assist with training and identify training needs within the group and provide feedback. Mentor and assist new hires. Act as a central point of contact to reporting &amp;amp; escalating system issues to technology &amp;amp; the leadership. CRITICAL SKILLS REQUIRED Customer Service(Inbound)Skills.&amp;nbsp;Work direction and development for a team of executives (15-20 in number). Monitor schedule adherence of the executives and advise the leadership team of issues negatively impacting service levels. Provide operational floor management by monitoring service levels, making appropriate decisions, responsible for the daily monitoring of quality and production of the outbound / inbound status group and manual processes. Provide performance feedback to the executives. Assist with training and identify training needs within the group and provide feedback. Mentor and assist new hires. Act as a central point of contact to reporting &amp;amp; escalating system issues to technology &amp;amp; the leadership. CRITICAL SKILLS REQUIRED Customer Service(Inbound)Skills.&amp;nbsp;Work direction and development for a team of executives (15-20 in number). Monitor schedule adherence of the executives and advise the leadership team of issues negatively impacting service levels. Provide operational floor management by monitoring service levels, making appropriate decisions, responsible for the daily monitoring of quality and production of the outbound / inbound status group and manual processes. Provide performance feedback to the executives. Assist with training and identify training needs within the group and provide feedback. Mentor and assist new hires. Act as a central point of contact to reporting &amp;amp; escalating system issues to technology &amp;amp; the leadership. CRITICAL SKILLS REQUIRED Customer Service(Inbound)Skills.&amp;nbsp;Work direction and development for a team of executives (15-20 in number). Monitor schedule adherence of the executives and advise the leadership team of issues negatively impacting service levels. Provide operational floor management by monitoring service levels, making appropriate decisions, responsible for the daily monitoring of quality and production of the outbound / inbound status group and manual processes. Provide performance feedback to the executives. Assist with training and identify training needs within the group and provide feedback. Mentor and assist new hires. Act as a central point of contact to reporting &amp;amp; escalating system issues to technology &amp;amp; the leadership. CRITICAL SKILLS REQUIRED Customer Service(Inbound)Skills.&amp;nbsp;Work direction and development for a team of executives (15-20 in number). Monitor schedule adherence of the executives and advise the leadership team of issues negatively impacting service levels. Provide operational floor management by monitoring service levels, making appropriate decisions, responsible for the daily monitoring of quality and production of the outbound / inbound status group and manual processes. Provide performance feedback to the executives. Assist with training and identify training needs within the group and provide feedback. Mentor and assist new hires. Act as a central point of contact to reporting &amp;amp; escalating system issues to technology &amp;amp; the leadership. CRITICAL SKILLS REQUIRED Customer Service(Inbound)Skills.&amp;nbsp;Work direction and development for a team of executives (15-20 in number). Monitor schedule adherence of the executives and advise the leadership team of issues negatively impacting service levels. Provide operational floor management by monitoring service levels, making appropriate decisions, responsible for the daily monitoring of quality and production of the outbound / inbound status group and manual processes. Provide performance feedback to the executives. Assist with training and identify training needs within the group and provide feedback. Mentor and assist new hires. Act as a central point of contact to reporting &amp;amp; escalating system issues to technology &amp;amp; the leadership. CRITICAL SKILLS REQUIRED Customer Service(Inbound)Skills.&amp;nbsp;&lt;/p&gt;\r\n', 2),
(26, 'maps', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13998.564143122005!2d77.2773484!3d28.7003827!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe63184f23b0716ee!2sProfshineTech.com%20%7C%20Website%20Design%2C%20Software%20Development%20%26%20Digital%20Marketing%20Company%20in%20Delhi!5e0!3m2!1sen!2sin!4v1590400330480!5m2!1sen!2sin', 2),
(27, 'mailer_email', 'noreply@ecomm.com', 2),
(29, 'footer-about', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt dolor voluptatibus vel dignissimos odio quis a? Ratione aperiam mollitia repellat magnam corporis nisi maxime, vitae esse tempore neque quisquam cupiditate!', 2),
(501, 'privacy', '&lt;h3&gt;&lt;strong&gt;Privacy &amp;amp; Policy&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', 2),
(502, 'terms', '&lt;h3&gt;&lt;strong&gt;Terms &amp;amp; Conditions&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;hr /&gt;\r\n&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n', 2),
(503, 'meta_keywords', '', 2),
(510, 'tax', '0', 2),
(511, 'shipping_charge', '', 2),
(512, 'pg_key', '', 2),
(513, 'pg_salt', '', 2),
(514, 'ship_key', '', 2),
(515, 'ship_salt', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bnmi_help_desk`
--

CREATE TABLE `bnmi_help_desk` (
  `id` int(10) NOT NULL,
  `user` int(10) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `question_user` varchar(500) DEFAULT NULL,
  `answer_admin` varchar(500) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bnmi_orders`
--

CREATE TABLE `bnmi_orders` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `prod_id` text DEFAULT NULL,
  `prod_prices` text DEFAULT NULL,
  `prod_quantity` text DEFAULT NULL,
  `product_variants` text DEFAULT NULL,
  `coupon_code` varchar(100) DEFAULT NULL,
  `address_id` int(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 2 COMMENT '0=deleted, 1= cancelled, 2=processing, 3= packaging, 4=out for delivery, 5=delivered',
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bnmi_order_txn`
--

CREATE TABLE `bnmi_order_txn` (
  `id` int(10) NOT NULL,
  `txn_id` varchar(15) DEFAULT NULL,
  `payu_txnid` varchar(100) DEFAULT NULL,
  `order_id` int(10) DEFAULT NULL,
  `total_amount` decimal(7,2) DEFAULT NULL,
  `total_discount` decimal(7,2) DEFAULT NULL,
  `payable_amount` decimal(7,2) DEFAULT NULL,
  `payment_method` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=COD, 1=Online',
  `payment_status` varchar(100) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bnmi_products`
--

CREATE TABLE `bnmi_products` (
  `pid` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1,
  `sub_id` int(10) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `fulldesc` text DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `discount` int(3) DEFAULT NULL COMMENT 'discount in %',
  `offer_price` decimal(10,2) DEFAULT NULL,
  `meta_title` varchar(60) DEFAULT NULL,
  `meta_desc` varchar(300) DEFAULT NULL,
  `meta_keywords` varchar(1000) DEFAULT NULL,
  `home` tinyint(1) DEFAULT 0 COMMENT '0=general, 1= home category, 2=home best prod, 3=home top product',
  `current_date` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bnmi_users`
--

CREATE TABLE `bnmi_users` (
  `id` int(10) NOT NULL,
  `type` tinyint(1) DEFAULT 0 COMMENT '0=user,1=admin',
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `phone` bigint(12) DEFAULT NULL,
  `whatsapp_num` int(10) DEFAULT NULL,
  `token` varchar(500) DEFAULT NULL,
  `img` varchar(100) DEFAULT 'user.png',
  `city` int(10) DEFAULT NULL,
  `state` int(10) DEFAULT NULL,
  `country` int(10) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `pincode` int(6) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 2 COMMENT '0=delete, 1=inactive, 2=active, 3=account verified'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bnmi_users`
--

INSERT INTO `bnmi_users` (`id`, `type`, `name`, `email`, `password`, `phone`, `whatsapp_num`, `token`, `img`, `city`, `state`, `country`, `address`, `pincode`, `date_time`, `status`) VALUES
(1, 1, 'Senior Admin', 'admin@gmail.com', '587ead5e7a5d98901db606b6e2a6ebc8c041e5e8386c4d1af919ebf1c59bb3aeb0277ad144ea551876ef03d60602351a6ed1b2574feaf842bf0a8b6598aa5a75', 1234567890, NULL, NULL, '3305_1606043869.png', NULL, NULL, NULL, '', NULL, '2020-02-01 00:00:00', 2),
(12, 0, 'Aditya', 'user@gmail.com', '8203df72998c29502fb6d2b9f924b83645011de63cb585b1f36cac15330645ca2c644cb535bd3b281090c6e4d9e724d3a057fc7d63b64d85e4fd9b3458a39201', 1234567890, 1234567890, NULL, 'user.png', 0, 0, 1, 'Delhi, India', 110093, '2021-05-28 21:21:17', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bnmi_user_address`
--

CREATE TABLE `bnmi_user_address` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `default` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=general, 1=default',
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` bigint(12) DEFAULT NULL,
  `whatsapp` bigint(12) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `pincode` int(6) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bnmi_cart`
--
ALTER TABLE `bnmi_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bnmi_cms_pages`
--
ALTER TABLE `bnmi_cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bnmi_general`
--
ALTER TABLE `bnmi_general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bnmi_help_desk`
--
ALTER TABLE `bnmi_help_desk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bnmi_orders`
--
ALTER TABLE `bnmi_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bnmi_order_txn`
--
ALTER TABLE `bnmi_order_txn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bnmi_products`
--
ALTER TABLE `bnmi_products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `bnmi_users`
--
ALTER TABLE `bnmi_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bnmi_user_address`
--
ALTER TABLE `bnmi_user_address`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bnmi_cart`
--
ALTER TABLE `bnmi_cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bnmi_cms_pages`
--
ALTER TABLE `bnmi_cms_pages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bnmi_general`
--
ALTER TABLE `bnmi_general`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=516;

--
-- AUTO_INCREMENT for table `bnmi_help_desk`
--
ALTER TABLE `bnmi_help_desk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bnmi_orders`
--
ALTER TABLE `bnmi_orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bnmi_order_txn`
--
ALTER TABLE `bnmi_order_txn`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bnmi_products`
--
ALTER TABLE `bnmi_products`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bnmi_users`
--
ALTER TABLE `bnmi_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bnmi_user_address`
--
ALTER TABLE `bnmi_user_address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 10, 2016 at 12:06 PM
-- Server version: 5.6.33
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wechatecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `shop_categories`
--

CREATE TABLE `shop_categories` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Entity ID',
  `name` varchar(50) NOT NULL,
  `attribute_set_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Attriute Set ID',
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Parent Category ID',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Creation Time',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Update Time',
  `path` varchar(255) NOT NULL COMMENT 'Tree Path',
  `position` int(11) NOT NULL COMMENT 'Position',
  `level` int(11) NOT NULL DEFAULT '0' COMMENT 'Tree Level',
  `children_count` int(11) NOT NULL COMMENT 'Child Count'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Catalog Category Table';

--
-- Dumping data for table `shop_categories`
--

INSERT INTO `shop_categories` (`id`, `name`, `attribute_set_id`, `parent_id`, `created_at`, `updated_at`, `path`, `position`, `level`, `children_count`) VALUES
(3, '最新', 0, 0, '2016-08-19 10:10:29', '2016-08-19 10:10:29', '', 0, 0, 0),
(4, '现货', 0, 0, '2016-08-19 10:10:29', '2016-08-19 10:10:29', '', 0, 0, 0),
(5, '人气预售', 0, 0, '2016-08-19 10:10:29', '2016-08-19 10:10:29', '', 0, 0, 0),
(6, '人气现货', 0, 0, '2016-08-19 10:10:29', '2016-08-19 10:10:29', '', 0, 0, 0),
(7, '高端定制', 0, 0, '2016-08-19 10:10:29', '2016-08-19 10:10:29', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop_configurations`
--

CREATE TABLE `shop_configurations` (
  `config_id` int(10) UNSIGNED NOT NULL,
  `scope` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scope_id` int(11) DEFAULT '0',
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shop_configurations`
--

INSERT INTO `shop_configurations` (`config_id`, `scope`, `scope_id`, `path`, `value`) VALUES
(1, '11', 1, '1', '1'),
(2, '2', 2, '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `shop_customers`
--

CREATE TABLE `shop_customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `nickname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telphone` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `credit` decimal(15,2) DEFAULT NULL,
  `realname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shop_customers`
--

INSERT INTO `shop_customers` (`id`, `nickname`, `gender`, `user_name`, `telphone`, `amount`, `credit`, `realname`, `email`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', '1', 1.00, 1.00, '1', '1', '1970-01-01 00:00:01', '1970-01-01 00:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `shop_customer_addresses`
--

CREATE TABLE `shop_customer_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `is_default` tinyint(1) DEFAULT NULL,
  `receiver` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shop_customer_addresses`
--

INSERT INTO `shop_customer_addresses` (`id`, `customer_id`, `is_default`, `receiver`, `address`, `city`, `province`, `country`, `zip_code`, `phone`, `fax`, `created_at`, `updated_at`) VALUES
(2, 2, 2, '2', '2', '2', '2', '2', 2, '2', '2', '1970-01-01 00:00:02', '1970-01-01 00:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `shop_migrations`
--

CREATE TABLE `shop_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shop_migrations`
--

INSERT INTO `shop_migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_08_21_032542_create_configurations_table', 1),
('2016_08_21_032600_create_categories_table', 2),
('2016_08_21_032612_create_customer_addresses_table', 3),
('2016_08_21_032623_create_customers_table', 3),
('2016_08_21_032634_create_order_payments_table', 4),
('2016_08_21_032646_create_orders_table', 4),
('2016_08_21_032657_create_products_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `shop_orders`
--

CREATE TABLE `shop_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `repeat_purchase_amount` decimal(15,2) DEFAULT NULL,
  `increment_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `single_amount` decimal(15,2) DEFAULT NULL,
  `total_amount` decimal(15,2) DEFAULT NULL,
  `status` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remote_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `x_forwarded_for` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_note` text COLLATE utf8_unicode_ci,
  `total_item_count` smallint(5) DEFAULT NULL,
  `customer_gender` int(11) DEFAULT NULL,
  `shipping_arrival_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shop_orders`
--

INSERT INTO `shop_orders` (`id`, `repeat_purchase_amount`, `increment_id`, `customer_id`, `product_id`, `quantity`, `single_amount`, `total_amount`, `status`, `customer_email`, `customer_name`, `customer_address`, `remote_ip`, `shipping_method`, `x_forwarded_for`, `customer_note`, `total_item_count`, `customer_gender`, `shipping_arrival_date`, `created_at`, `updated_at`) VALUES
(1, 1.00, 1, 1, 1, 1, 1.00, 1.00, '1', '1', '1', '1', '1', '1', '1', '1', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shop_order_payments`
--

CREATE TABLE `shop_order_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `payment_gateway` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_amount` decimal(15,2) DEFAULT NULL,
  `ip_address` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `successful_at` datetime DEFAULT NULL,
  `status` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shop_order_payments`
--

INSERT INTO `shop_order_payments` (`id`, `order_id`, `payment_gateway`, `total_amount`, `ip_address`, `created_at`, `successful_at`, `status`) VALUES
(1, 1, '1', 1.00, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `shop_password_resets`
--

CREATE TABLE `shop_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_products`
--

CREATE TABLE `shop_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(54) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `price_original` decimal(15,2) NOT NULL,
  `commission` decimal(15,2) NOT NULL,
  `sort` smallint(6) NOT NULL,
  `limit_quantity` smallint(11) NOT NULL,
  `virtual_membership_duration` smallint(4) NOT NULL,
  `specification_name1` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `specification_category1` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `specification_name2` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `specification_category2` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `specification_quantity` int(11) DEFAULT NULL,
  `specification_price` decimal(15,2) DEFAULT NULL,
  `image` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `repeat_purchase_amount` decimal(15,2) DEFAULT NULL,
  `repeat_purchase_discount` decimal(15,2) DEFAULT NULL,
  `shipping_price` decimal(15,2) DEFAULT NULL,
  `shipping_fee` decimal(15,2) DEFAULT NULL,
  `automatically_be_canceled_aging` int(11) DEFAULT NULL,
  `one_level_distribution_commission` decimal(15,2) DEFAULT NULL,
  `two_level_distribution_commission` decimal(15,2) DEFAULT NULL,
  `three_level_distribution_commission` decimal(15,2) DEFAULT NULL,
  `days_automatic_goods_after_delivery` smallint(5) DEFAULT NULL,
  `days_withdraw_cash_after_goods` smallint(5) DEFAULT NULL,
  `money_can_withdraw_cash` decimal(15,2) DEFAULT NULL,
  `withdraw_message` text COLLATE utf8_unicode_ci,
  `daily_order_limit` decimal(15,2) DEFAULT NULL,
  `commission_payment_type` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_purchase_amount_limit_as_member` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_as_member` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pop_product` int(11) DEFAULT NULL,
  `pop_content` text COLLATE utf8_unicode_ci,
  `height` decimal(15,1) DEFAULT NULL,
  `sku` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_from_date` datetime DEFAULT NULL,
  `news_to_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shop_products`
--

INSERT INTO `shop_products` (`id`, `category_id`, `name`, `price`, `price_original`, `commission`, `sort`, `limit_quantity`, `virtual_membership_duration`, `specification_name1`, `specification_category1`, `specification_name2`, `specification_category2`, `specification_quantity`, `specification_price`, `image`, `status`, `detail`, `repeat_purchase_amount`, `repeat_purchase_discount`, `shipping_price`, `shipping_fee`, `automatically_be_canceled_aging`, `one_level_distribution_commission`, `two_level_distribution_commission`, `three_level_distribution_commission`, `days_automatic_goods_after_delivery`, `days_withdraw_cash_after_goods`, `money_can_withdraw_cash`, `withdraw_message`, `daily_order_limit`, `commission_payment_type`, `total_purchase_amount_limit_as_member`, `purchase_as_member`, `pop_product`, `pop_content`, `height`, `sku`, `news_from_date`, `news_to_date`, `created_at`, `updated_at`) VALUES
(8, 5, '1Apple MF839B/A 13-Inch MacBook Pro with Retina Displa', 869.99, 869.99, 869.99, 1, 1, 1, '1', '11', '1', '1', 1, 1.00, '8.jpg', '0', '<p>The tiny Mac mini gives you everything you expect from a Mac, and more. It&#39;s packing a fourth-generation Intel Core processor, faster integrated graphics, large Fusion Drive, Thunderbolt 2 ports and next generation Wi-Fi, all housed within a unobtrusive design.</p>\r\n\r\n<p><strong>Fourth-generation Intel processor</strong><br />\r\nIntel&#39;s fourth generation Core i5 processor provides stunning performance for anything from web browsing to video editing. i5 processors feature a turbo boost function, that ensures your Mac mini can keep up with more intensive tasks, and hyper-threading technology to help take on multitasking more efficiently.</p>\r\n\r\n<p><strong>Intel Iris Graphics</strong><br />\r\nIntel&#39;s fourth generation processors work with Intel Iris graphics to deliver eye popping graphics and incredible multimedia experiences, without the need for an additional graphics card.</p>\r\n\r\n<p><strong>Fusion Drive</strong><br />\r\nA 1TB Fusion Drive gives you the best of both capacity and speed. Fusion Drive automatically and intelligently manages your data to ensure that frequently used apps, documents, photos and other files load quickly from the integrated flash storage, while lesser used files are still accessible on the hard drive. The more you use your Mac mini, the more it will learn about how you work, optimising your performance even more.</p>\r\n\r\n<p><strong>Space saver</strong><br />\r\nMac mini won&#39;t take up much room in your office. It measures less than 20cm in width and depth, and just 3.6cm in height. When we say &#39;mini&#39; we really mean it.</p>\r\n\r\n<p><strong>Ultra fast connections</strong><br />\r\nMac mini is packed with an array of technologies to help you connect to more. Connect to a monitor using Thunderbolt 2 or HDMI and output at up to 4096 x 2160 pixels at 24Hz. Thunderbolt 2 delivers speeds of up to 20Gbps, letting you connect high performance peripherals such as external drives, cameras, and audio and video devices for the fastest data transfer yet. Four USB 3.0 ports will let you connect to even more devices, providing up to ten times the speed of USB 2.0, with full compatibility with USB 2.0 devices, while Gigabit Ethernet will give you the fastest, most reliable network connection possible.<br />\r\n&nbsp;<br />\r\nWhen connected to an 802.11ac Wi-Fi base station, Mac mini will achieve incredible wireless speeds that are up to 3 times faster than 802.11n, as well as improved reception. The addition of Bluetooth 4.0 wireless technology means that you can connect compatible speakers, smartphones and other devices straight out of the box.</p>\r\n\r\n<p><strong>Mac OS X El Capitan</strong><br />\r\nBuilding on the successful design of OS X Yosemite, the latest version is enhanced to deliver an updated interface, new full-screen views and a change to the way you arrange the windows on your desktop. In addition to the full-screen view, there&rsquo;s also a new Split View to let you see the two apps you have open next to each other.</p>\r\n\r\n<p>Plus, OS X El Capitan has a large variety to new functions and features to make your life even easier. For example, the just wiggle your finger trackpad or shake your mouse to find your cursor, which to help you spot it momentarily grows in size. Also, Spotlight lets you search for your documents and apps using everyday language, helping you to find what you&rsquo;re looking for. Notepad isn&rsquo;t just dealing with text, but will be able to handle PDFs, photos, URLs and map locations.</p>\r\n\r\n<p>If you own and iPhone, iPad or iPod touch running iOS 9, then you can move between devices in even smarter ways. Make and receive iPhone calls on your Mac, even if your iPhone is in another room. Send and receive both iMessage and SMS text messages on your Mac. Start an email, document or browsing session on one device and instantly pick it up on another.</p>\r\n\r\n<p><strong>Apps Included</strong><br />\r\n| Safari | Mail | iBooks | Mac App Store | iPhoto | iMovie | GarageBand | Pages | Numbers | Keynote | Maps | Calendar | FaceTime | Messages | Contacts | Reminders | Preview | Notes | iTunes | Game Center | Time Machine | Photo Booth |</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Accessories Included</p>\r\n\r\n<p>Power lead</p>\r\n\r\n<p>Bluetooth Enabled&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>Yes - 4.0</p>\r\n\r\n<p>Brand</p>\r\n\r\n<div style="background:transparent; border:0px; padding:0px">Apple</div>\r\n\r\n<p>Camera (front-facing)&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>N/A</p>\r\n\r\n<p>CD/DVD/Blu-ray Drive&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>No</p>\r\n\r\n<p>Computer Support Helpline&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>Free 90 day computer support</p>\r\n\r\n<p>Dimensions</p>\r\n\r\n<p>H3.6 x W19.7 x D19.7cm</p>\r\n\r\n<p>Ethernet Port&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>10/100/1000BASE‑T Ethernet (RJ-45 connector)</p>\r\n\r\n<p>Finish</p>\r\n\r\n<p>Aluminium</p>\r\n\r\n<p>Graphics card&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>Intel Iris Graphics</p>\r\n\r\n<p>Graphics card type&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>Shared</p>\r\n\r\n<p>Hard drive&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>1TB Fusion Drive</p>\r\n\r\n<p>Manufacturer Part Number (MPN)</p>\r\n\r\n<p>MGEQ2B/A</p>\r\n\r\n<p>Memory (RAM)&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>8GB</p>\r\n\r\n<p>Memory Card Slots&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>SDXC</p>\r\n\r\n<p>Model name / number</p>\r\n\r\n<p>Mac mini</p>\r\n\r\n<p>NFC enabled&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>No</p>\r\n\r\n<p>Operating system&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>Mac OS X El Capitan</p>\r\n\r\n<p>Ports&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>4x USB 3.0</p>\r\n\r\n<p>Processor&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>4th generation dual-core Intel Core i5</p>\r\n\r\n<p>Processor speed&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>2.8GHz to 3.3GHz with Turbo Boost</p>\r\n\r\n<p>Screen finish&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>N/A</p>\r\n\r\n<p>Screen Resolution&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>Not applicable</p>\r\n\r\n<p>Screen size&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>N/A</p>\r\n\r\n<p>Screen Type</p>\r\n\r\n<p>N/A</p>\r\n\r\n<p>Sound</p>\r\n\r\n<p>Built-in speaker</p>\r\n\r\n<p>Touch Screen</p>\r\n\r\n<p>No</p>\r\n\r\n<p>TV tuner card&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>No</p>\r\n\r\n<p>Type</p>\r\n\r\n<p>Small Form Factor</p>\r\n\r\n<p>Voice Recognition&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>No</p>\r\n\r\n<p>Wall Mountable</p>\r\n\r\n<p>No</p>\r\n\r\n<p>Weight</p>\r\n\r\n<p>1.22kg</p>\r\n\r\n<p>Wireless Display&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>No</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wireless networking</p>\r\n\r\n<p>Wi-Fi- 802.11a/b/g/n/ac</p>\r\n', 1.00, 1.00, 1.00, 1.00, 1, 88.00, 88.00, 88.00, 7, 1, 1.00, '1473495409-20160910081649.jpg', 1.00, '0', '1', '0', 9, '<p>The tiny Mac mini gives you everything you expect from a Mac, and more. It&#39;s packing a fourth-generation Intel Core processor, faster integrated graphics, large Fusion Drive, Thunderbolt 2 ports and next generation Wi-Fi, all housed within a unobtrusive design.</p>\r\n\r\n<p><strong>Fourth-generation Intel processor</strong><br />\r\nIntel&#39;s fourth generation Core i5 processor provides stunning performance for anything from web browsing to video editing. i5 processors feature a turbo boost function, that ensures your Mac mini can keep up with more intensive tasks, and hyper-threading technology to help take on multitasking more efficiently.</p>\r\n\r\n<p><strong>Intel Iris Graphics</strong><br />\r\nIntel&#39;s fourth generation processors work with Intel Iris graphics to deliver eye popping graphics and incredible multimedia experiences, without the need for an additional graphics card.</p>\r\n\r\n<p><strong>Fusion Drive</strong><br />\r\nA 1TB Fusion Drive gives you the best of both capacity and speed. Fusion Drive automatically and intelligently manages your data to ensure that frequently used apps, documents, photos and other files load quickly from the integrated flash storage, while lesser used files are still accessible on the hard drive. The more you use your Mac mini, the more it will learn about how you work, optimising your performance even more.</p>\r\n\r\n<p><strong>Space saver</strong><br />\r\nMac mini won&#39;t take up much room in your office. It measures less than 20cm in width and depth, and just 3.6cm in height. When we say &#39;mini&#39; we really mean it.</p>\r\n\r\n<p><strong>Ultra fast connections</strong><br />\r\nMac mini is packed with an array of technologies to help you connect to more. Connect to a monitor using Thunderbolt 2 or HDMI and output at up to 4096 x 2160 pixels at 24Hz. Thunderbolt 2 delivers speeds of up to 20Gbps, letting you connect high performance peripherals such as external drives, cameras, and audio and video devices for the fastest data transfer yet. Four USB 3.0 ports will let you connect to even more devices, providing up to ten times the speed of USB 2.0, with full compatibility with USB 2.0 devices, while Gigabit Ethernet will give you the fastest, most reliable network connection possible.<br />\r\n&nbsp;<br />\r\nWhen connected to an 802.11ac Wi-Fi base station, Mac mini will achieve incredible wireless speeds that are up to 3 times faster than 802.11n, as well as improved reception. The addition of Bluetooth 4.0 wireless technology means that you can connect compatible speakers, smartphones and other devices straight out of the box.</p>\r\n\r\n<p><strong>Mac OS X El Capitan</strong><br />\r\nBuilding on the successful design of OS X Yosemite, the latest version is enhanced to deliver an updated interface, new full-screen views and a change to the way you arrange the windows on your desktop. In addition to the full-screen view, there&rsquo;s also a new Split View to let you see the two apps you have open next to each other.</p>\r\n\r\n<p>Plus, OS X El Capitan has a large variety to new functions and features to make your life even easier. For example, the just wiggle your finger trackpad or shake your mouse to find your cursor, which to help you spot it momentarily grows in size. Also, Spotlight lets you search for your documents and apps using everyday language, helping you to find what you&rsquo;re looking for. Notepad isn&rsquo;t just dealing with text, but will be able to handle PDFs, photos, URLs and map locations.</p>\r\n\r\n<p>If you own and iPhone, iPad or iPod touch running iOS 9, then you can move between devices in even smarter ways. Make and receive iPhone calls on your Mac, even if your iPhone is in another room. Send and receive both iMessage and SMS text messages on your Mac. Start an email, document or browsing session on one device and instantly pick it up on another.</p>\r\n\r\n<p><strong>Apps Included</strong><br />\r\n| Safari | Mail | iBooks | Mac App Store | iPhoto | iMovie | GarageBand | Pages | Numbers | Keynote | Maps | Calendar | FaceTime | Messages | Contacts | Reminders | Preview | Notes | iTunes | Game Center | Time Machine | Photo Booth |</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Accessories Included</p>\r\n\r\n<p>Power lead</p>\r\n\r\n<p>Bluetooth Enabled&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>Yes - 4.0</p>\r\n\r\n<p>Brand</p>\r\n\r\n<div style="background:transparent; border:0px; padding:0px">Apple</div>\r\n\r\n<p>Camera (front-facing)&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>N/A</p>\r\n\r\n<p>CD/DVD/Blu-ray Drive&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>No</p>\r\n\r\n<p>Computer Support Helpline&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>Free 90 day computer support</p>\r\n\r\n<p>Dimensions</p>\r\n\r\n<p>H3.6 x W19.7 x D19.7cm</p>\r\n\r\n<p>Ethernet Port&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>10/100/1000BASE‑T Ethernet (RJ-45 connector)</p>\r\n\r\n<p>Finish</p>\r\n\r\n<p>Aluminium</p>\r\n\r\n<p>Graphics card&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>Intel Iris Graphics</p>\r\n\r\n<p>Graphics card type&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>Shared</p>\r\n\r\n<p>Hard drive&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>1TB Fusion Drive</p>\r\n\r\n<p>Manufacturer Part Number (MPN)</p>\r\n\r\n<p>MGEQ2B/A</p>\r\n\r\n<p>Memory (RAM)&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>8GB</p>\r\n\r\n<p>Memory Card Slots&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>SDXC</p>\r\n\r\n<p>Model name / number</p>\r\n\r\n<p>Mac mini</p>\r\n\r\n<p>NFC enabled&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>No</p>\r\n\r\n<p>Operating system&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>Mac OS X El Capitan</p>\r\n\r\n<p>Ports&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>4x USB 3.0</p>\r\n\r\n<p>Processor&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>4th generation dual-core Intel Core i5</p>\r\n\r\n<p>Processor speed&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>2.8GHz to 3.3GHz with Turbo Boost</p>\r\n\r\n<p>Screen finish&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>N/A</p>\r\n\r\n<p>Screen Resolution&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>Not applicable</p>\r\n\r\n<p>Screen size&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>N/A</p>\r\n\r\n<p>Screen Type</p>\r\n\r\n<p>N/A</p>\r\n\r\n<p>Sound</p>\r\n\r\n<p>Built-in speaker</p>\r\n\r\n<p>Touch Screen</p>\r\n\r\n<p>No</p>\r\n\r\n<p>TV tuner card&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>No</p>\r\n\r\n<p>Type</p>\r\n\r\n<p>Small Form Factor</p>\r\n\r\n<p>Voice Recognition&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>No</p>\r\n\r\n<p>Wall Mountable</p>\r\n\r\n<p>No</p>\r\n\r\n<p>Weight</p>\r\n\r\n<p>1.22kg</p>\r\n\r\n<p>Wireless Display&nbsp;<a href="http://www.johnlewis.com/apple-mac-mini-mgeq2b-a-desktop-computer-intel-core-i5-8gb-ram-1tb-fusion-drive/p1741284#tooltip">Information</a></p>\r\n\r\n<p>No</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wireless networking</p>\r\n\r\n<p>Wi-Fi- 802.11a/b/g/n/ac</p>\r\n', NULL, NULL, NULL, NULL, '2016-09-02 18:22:22', '2016-09-10 03:30:15'),
(9, 7, 'Apple MGEQ2B/A Mac Mini (Intel Core i5 2.8GHz, 8GB RAM', 653.99, 653.99, 653.99, 0, 1, 1, '1', '11', '111', '1', 11, 1.00, '9.jpg', '0', '<h3>Previous versions</h3>\r\n\r\n<p>Download the following if you require older versions of CKEditor.</p>\r\n\r\n<ul>\r\n	<li><a href="http://download.cksource.com/CKEditor/CKEditor/CKEditor%204.4.8/ckeditor_4.4.8_standard.zip">CKEditor 4.4.8</a>&nbsp;(1 Jul 2015)</li>\r\n	<li><a href="http://download.cksource.com/CKEditor/CKEditor/CKEditor%203.6.6.2/ckeditor_3.6.6.2.zip">CKEditor 3.6.6.2</a>&nbsp;(15 Jul 2014)</li>\r\n</ul>\r\n\r\n<p><a href="http://ckeditor.com/download/releases">View all</a></p>\r\n\r\n<h3>Additional Assets</h3>\r\n\r\n<p><a href="http://nightly.ckeditor.com/">Download CKEditor nightly build</a></p>\r\n\r\n<p>The nightly build is updated daily. It contains the &quot;master&quot; branch of CKEditor ready for release.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href="http://sdk.ckeditor.com/ckeditor_4.5.10_sdk.zip?referer=cke_download">Download CKEditor SDK</a></p>\r\n\r\n<p>A huge collection of developer resources to help you implement, configure and integrate CKEditor.</p>\r\n\r\n<h3>CKEditor 3.6.6.2 for ASP.NET</h3>\r\n\r\n<p>Released&nbsp;15 Jul 2014</p>\r\n\r\n<p>ASP.NET Control to easily integrate CKEditor on ASP.NET pages.</p>\r\n\r\n<ul>\r\n	<li><a href="http://download.cksource.com/CKEditor/CKEditor.NET/CKEditor.NET%203.6.6.2/ckeditor_aspnet_3.6.6.2.zip">Download now</a></li>\r\n	<li><a href="http://ckeditor.com/whatsnew-asp.net">Changelog</a></li>\r\n	<li><a href="http://docs.cksource.com/CKEditor_3.x/Developers_Guide/ASP.NET/Integration_Advanced">How to install</a></li>\r\n	<li><a href="http://ckeditor.com/about/license">License</a></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>CKEditor 3.6.6.2 for Java</h3>\r\n\r\n<p>Released&nbsp;15 Jul 2014</p>\r\n\r\n<p>CKEditor server-side integration for Java.</p>\r\n\r\n<ul>\r\n	<li><a href="http://download.cksource.com/CKEditor/CKEditor%20for%20Java/CKEditor%20for%20Java%203.5.3/ckeditor-java-core-3.5.3.zip">Download .jar</a></li>\r\n	<li><a href="http://download.cksource.com/CKEditor/CKEditor%20for%20Java/CKEditor%20for%20Java%203.6.6.2/ckeditor-java-3.6.6.2.war">Download .war</a></li>\r\n	<li><a href="http://docs.cksource.com/CKEditor_3.x/Developers_Guide/Java/Integration">How to install</a></li>\r\n	<li><a href="http://ckeditor.com/about/license">License</a></li>\r\n</ul>\r\n', NULL, NULL, NULL, NULL, NULL, 666.00, 66.00, 6666.00, 1, 1, 1.00, '1473495474-20160910081754.jpg', 1.00, '0', '1', '0', 9, '<ul>\r\n	<li><strong>NEW!</strong>&nbsp;Read our hands on:&nbsp;<a href="http://www.techradar.com/reviews/phones/mobile-phones/iphone-7-1327947/review">iPhone 7 review</a></li>\r\n</ul>\r\n\r\n<p><a href="http://www.techradar.com/news/phone-and-communications/mobile-phones/apple-leaks-water-resistant-iphone-7-on-twitter-1328126">Say hello</a>&nbsp;to the iPhone 7 &ndash; Apple&#39;s latest flagship smartphone, with upgraded cameras, water resistance, stereo speakers and a longer battery life.</p>\r\n\r\n<p>Tim Cook took to the stage at the Bill Graham Civic in San Francisco and told us: &quot;We have created the world&#39;s most advanced smartphone &ndash; the best iPhone we have ever created. This is iPhone 7.&quot;</p>\r\n\r\n<p>Obviously Apple would say that, but we&#39;ll let you make up your own mind as you read through all the new features below - oh and the headphone jack? Yeah, that&#39;s gone.</p>\r\n\r\n<ul>\r\n	<li>Everything you need to know about the&nbsp;<a href="http://www.techradar.com/news/phone-and-communications/mobile-phones/iphone-7-plus-1328075">iPhone 7 Plus</a></li>\r\n</ul>\r\n\r\n<h3>Cut to the chase</h3>\r\n\r\n<ul>\r\n	<li><strong>What is it?</strong>&nbsp;Apple&#39;s new iPhone</li>\r\n	<li><strong>When is it out?</strong>&nbsp;Pre-order now, shipping from Sept 16</li>\r\n	<li><strong>What will it cost?</strong>&nbsp;Starts at $649 (&pound;599, AU$1,079)</li>\r\n</ul>\r\n\r\n<h3>iPhone 7 release date</h3>\r\n\r\n<p><strong>Hottest facts:</strong></p>\r\n\r\n<ul>\r\n	<li>Pre-order now</li>\r\n	<li>Shipping from September 16</li>\r\n</ul>\r\n\r\n<p>The&nbsp;<a href="http://www.techradar.com/iphone">iPhone</a>&nbsp;7 release date is set for Friday September 16 in 28 countries including the US and UK, with iPhone 7 pre-orders already open.</p>\r\n\r\n<p>Demand looks to be high though, with Jet Black orders now quoting November for shipping. If you haven&#39;t already pre-ordered online it looks unlikely you&#39;ll get any variant of the new iPhone 7 on release day, unless you queue up.</p>\r\n\r\n<p>A week after September 16, the iPhone 7 will also be available in a further 30 countries too.</p>\r\n\r\n<ul>\r\n	<li>Everything you need to know about the&nbsp;<a href="http://www.techradar.com/news/phone-and-communications/mobile-phones/iphone-7-release-date-when-can-you-get-it--1327945">iPhone 7 release date</a></li>\r\n</ul>\r\n\r\n<h3>iPhone 7 cost</h3>\r\n\r\n<p><strong>Hottest facts:</strong></p>\r\n\r\n<ul>\r\n	<li>32GB - $649 (&pound;599, AU$1,079)</li>\r\n	<li>128GB - $749 (&pound;699, AU$1,229)</li>\r\n	<li>256GB - $849 (&pound;799, AU$1,379)</li>\r\n</ul>\r\n\r\n<p>Loading iPhone 7 deals...</p>\r\n', NULL, NULL, NULL, NULL, '2016-09-02 18:33:22', '2016-09-10 03:26:32'),
(10, 3, 'Silicon Valley', 1.00, 1.00, 1.00, 1, 1, 1, '1', '1', '1', '1', 1, 1.00, '10.jpg', '0', '<p>The word &quot;valley&quot; refers to the Santa Clara Valley, where the region has traditionally been centered, which includes the city of&nbsp;<a href="https://en.wikipedia.org/wiki/San_Jose,_California">San Jose</a>&nbsp;and surrounding cities and towns. The word &quot;silicon&quot; originally referred to the large number of&nbsp;<a href="https://en.wikipedia.org/wiki/Silicon">silicon</a>&nbsp;<a href="https://en.wikipedia.org/wiki/Integrated_circuit">chip</a>&nbsp;<a href="https://en.wikipedia.org/wiki/Innovator">innovators</a>&nbsp;and&nbsp;<a href="https://en.wikipedia.org/wiki/Manufacturing">manufacturers</a>&nbsp;in the region. The term &quot;Silicon Valley&quot; eventually came to refer to all&nbsp;<a href="https://en.wikipedia.org/wiki/High_tech">high tech</a>businesses in the area, and is now generally used as a&nbsp;<a href="https://en.wikipedia.org/wiki/Synecdoche">synecdoche</a>&nbsp;for the American high-technology&nbsp;<a href="https://en.wikipedia.org/wiki/Economic_sector">economic sector</a>. It also became a global synonym for leading high-tech research and enterprises, and thus inspired&nbsp;<a href="https://en.wikipedia.org/wiki/List_of_places_with_%22Silicon%22_names">similar named locations</a>, as well as&nbsp;<a href="https://en.wikipedia.org/wiki/List_of_research_parks">research parks</a>&nbsp;and&nbsp;<a href="https://en.wikipedia.org/wiki/List_of_technology_centers">technology centers</a>&nbsp;with a comparable structure all around the world.</p>\r\n\r\n<p>Silicon Valley is a leading hub and&nbsp;<a href="https://en.wikipedia.org/wiki/Startup_ecosystem">startup ecosystem</a>&nbsp;for high-tech innovation and development, accounting for one-third of all of the&nbsp;<a href="https://en.wikipedia.org/wiki/Venture_capital">venture capital</a>&nbsp;investment in the United States. It was in the Valley that the silicon-based integrated circuit, the<a href="https://en.wikipedia.org/wiki/Microprocessor">microprocessor</a>, and the microcomputer, among other key technologies, were developed. As of 2013, the region employed about a quarter of a million&nbsp;<a href="https://en.wikipedia.org/wiki/Information_technology">information technology</a>&nbsp;workers.<a href="https://en.wikipedia.org/wiki/Silicon_Valley#cite_note-1">[1]</a></p>\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-10 03:38:40', '2016-09-10 03:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `shop_users`
--

CREATE TABLE `shop_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shop_users`
--

INSERT INTO `shop_users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', '1', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shop_categories`
--
ALTER TABLE `shop_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CATALOG_CATEGORY_ENTITY_LEVEL` (`level`),
  ADD KEY `IDX_CATALOG_CATEGORY_ENTITY_PATH_ENTITY_ID` (`path`,`id`);

--
-- Indexes for table `shop_configurations`
--
ALTER TABLE `shop_configurations`
  ADD PRIMARY KEY (`config_id`);

--
-- Indexes for table `shop_customers`
--
ALTER TABLE `shop_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_customer_addresses`
--
ALTER TABLE `shop_customer_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_orders`
--
ALTER TABLE `shop_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_order_payments`
--
ALTER TABLE `shop_order_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_password_resets`
--
ALTER TABLE `shop_password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `shop_products`
--
ALTER TABLE `shop_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_users`
--
ALTER TABLE `shop_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shop_categories`
--
ALTER TABLE `shop_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Entity ID', AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `shop_configurations`
--
ALTER TABLE `shop_configurations`
  MODIFY `config_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shop_customers`
--
ALTER TABLE `shop_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shop_customer_addresses`
--
ALTER TABLE `shop_customer_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shop_orders`
--
ALTER TABLE `shop_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shop_order_payments`
--
ALTER TABLE `shop_order_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shop_products`
--
ALTER TABLE `shop_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `shop_users`
--
ALTER TABLE `shop_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

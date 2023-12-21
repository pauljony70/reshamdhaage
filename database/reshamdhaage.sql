-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 21, 2023 at 01:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reshamdhaage`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `user_id` int(11) NOT NULL,
  `addressarray` text NOT NULL,
  `defaultaddress` int(11) NOT NULL,
  `org_addressarray` text NOT NULL,
  `pincode` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`user_id`, `addressarray`, `defaultaddress`, `org_addressarray`, `pincode`) VALUES
(10001, '[{\"address_id\":1,\"fullname\":\"chirag\",\"email\":\"chiragsavaliya67@gmail.com\",\"address1\":\"vrachha\",\"address2\":null,\"landmark\":\"\",\"city\":\"surat\",\"state\":\"gujrat\",\"pincode\":\"395010\",\"phone\":\"8200721023\"},{\"address_id\":2,\"fullname\":\"cscs\",\"email\":\"cscs@gmail.com\",\"address1\":\"cs\",\"address2\":null,\"landmark\":\"\",\"city\":\"surat\",\"state\":\"gujrat\",\"pincode\":\"369855\",\"phone\":\"9865365544\"},{\"address_id\":3,\"fullname\":\"cks\",\"email\":\"cks@gmail.com\",\"address1\":\"vrachha\",\"address2\":null,\"landmark\":\"\",\"city\":\"surat\",\"state\":\"gujrat\",\"pincode\":\"110030\",\"phone\":\"9659656333\"},{\"address_id\":4,\"fullname\":\"Yuvraj \",\"email\":\"yuvi384756@gmail.com\",\"address1\":\"bhoapl\",\"address2\":\"bhopal\",\"landmark\":\"\",\"city\":\"hopal\",\"state\":\"madhya pradesh\",\"pincode\":\"462420\",\"phone\":\"2345678901\"},{\"address_id\":5,\"fullname\":\"Yuvraj \",\"email\":\"yuvi384756@gmail.com\",\"address1\":\"bhoapl\",\"address2\":\"bhopal\",\"landmark\":\"\",\"city\":\"Bhopal\",\"state\":\"Madhya Pradesh\",\"pincode\":\"462420\",\"phone\":\"2345678901\"},{\"address_id\":6,\"fullname\":\"Yuvraj \",\"email\":\"yuvrajsinghsolanki2406@gmail.com\",\"address1\":\"bhoapl\",\"address2\":\"bhopal\",\"landmark\":\"\",\"city\":\"Bhopal\",\"state\":\"Madhya Pradesh\",\"pincode\":\"462420\",\"phone\":\"2345678901\"}]', 6, '[{\"address_id\":1,\"fullname\":\"chirag\",\"email\":\"chiragsavaliya67@gmail.com\",\"address1\":\"vrachha\",\"address2\":null,\"landmark\":\"\",\"city\":\"surat\",\"state\":\"gujrat\",\"pincode\":\"395010\",\"phone\":\"8200721023\"},{\"address_id\":2,\"fullname\":\"cscs\",\"email\":\"cscs@gmail.com\",\"address1\":\"cs\",\"address2\":null,\"landmark\":\"\",\"city\":\"surat\",\"state\":\"gujrat\",\"pincode\":\"369855\",\"phone\":\"9865365544\"},{\"address_id\":3,\"fullname\":\"cks\",\"email\":\"cks@gmail.com\",\"address1\":\"vrachha\",\"address2\":null,\"landmark\":\"\",\"city\":\"surat\",\"state\":\"gujrat\",\"pincode\":\"110030\",\"phone\":\"9659656333\"},{\"address_id\":4,\"fullname\":\"Yuvraj \",\"email\":\"yuvi384756@gmail.com\",\"address1\":\"bhoapl\",\"address2\":\"bhopal\",\"landmark\":\"\",\"city\":\"hopal\",\"state\":\"madhya pradesh\",\"pincode\":\"462420\",\"phone\":\"2345678901\"},{\"address_id\":5,\"fullname\":\"Yuvraj \",\"email\":\"yuvi384756@gmail.com\",\"address1\":\"bhoapl\",\"address2\":\"bhopal\",\"landmark\":\"\",\"city\":\"Bhopal\",\"state\":\"Madhya Pradesh\",\"pincode\":\"462420\",\"phone\":\"2345678901\"},{\"address_id\":6,\"fullname\":\"Yuvraj \",\"email\":\"yuvrajsinghsolanki2406@gmail.com\",\"address1\":\"bhoapl\",\"address2\":\"bhopal\",\"landmark\":\"\",\"city\":\"Bhopal\",\"state\":\"Madhya Pradesh\",\"pincode\":\"462420\",\"phone\":\"2345678901\"}]', 0),
(10002, '[{\"address_id\":1,\"fullname\":\"kamal\",\"email\":\"kamal.bunkar07@gmail.com\",\"address1\":\"flat 03\",\"address2\":\"street abc\",\"landmark\":\"near ground\",\"city\":\"dehradun\",\"state\":\"UK\",\"pincode\":\"\",\"phone\":\"9144040888\"}]', 1, '[{\"address_id\":1,\"fullname\":\"kamal\",\"email\":\"kamal.bunkar07@gmail.com\",\"address1\":\"flat 03\",\"address2\":\"street abc\",\"landmark\":\"near ground\",\"city\":\"dehradun\",\"state\":\"UK\",\"pincode\":\"\",\"phone\":\"9144040888\"}]', 0),
(10003, '[{\"address_id\":1,\"fullname\":\"bapan\",\"email\":\"amitkumar7361@gmail.com\",\"address1\":\"hsjjs\",\"address2\":\"\",\"landmark\":\"jzjsj\",\"city\":\"sjjs\",\"state\":\"delhi\",\"pincode\":\"\",\"phone\":\"9717999121\"},{\"address_id\":2,\"fullname\":\"dhhff\",\"email\":\"amitkumar7361@gmail.com\",\"address1\":\"dgc\",\"address2\":\"dgg\",\"landmark\":\"dfg\",\"city\":\"fh\",\"state\":\"ft\",\"pincode\":\"110030\",\"phone\":\"8888888888\"},{\"address_id\":3,\"fullname\":\"xgh\",\"email\":\"\",\"address1\":\"xgg\",\"address2\":\"dgg\",\"landmark\":\"dg\",\"city\":\"ft\",\"state\":\"fy\",\"pincode\":\"110030\",\"phone\":\"8888888888\"},{\"address_id\":4,\"fullname\":\"Dgg\",\"email\":\"amitkumar7361@gmail.com\",\"address1\":\"Saidulajab Gali No 3 F Flor A 49 Near Sabji Mandi\",\"address2\":\"No\",\"landmark\":\"\",\"city\":\"New Delhi\",\"state\":\"Delhi\",\"pincode\":\"110030\",\"phone\":\"9717999121\"}]', 4, '[{\"address_id\":1,\"fullname\":\"bapan\",\"email\":\"amitkumar7361@gmail.com\",\"address1\":\"hsjjs\",\"address2\":\"\",\"landmark\":\"jzjsj\",\"city\":\"sjjs\",\"state\":\"delhi\",\"pincode\":\"\",\"phone\":\"9717999121\"},{\"address_id\":2,\"fullname\":\"dhhff\",\"email\":\"amitkumar7361@gmail.com\",\"address1\":\"dgc\",\"address2\":\"dgg\",\"landmark\":\"dfg\",\"city\":\"fh\",\"state\":\"ft\",\"pincode\":\"110030\",\"phone\":\"8888888888\"},{\"address_id\":3,\"fullname\":\"xgh\",\"email\":\"\",\"address1\":\"xgg\",\"address2\":\"dgg\",\"landmark\":\"dg\",\"city\":\"ft\",\"state\":\"fy\",\"pincode\":\"110030\",\"phone\":\"8888888888\"},{\"address_id\":4,\"fullname\":\"Dgg\",\"email\":\"amitkumar7361@gmail.com\",\"address1\":\"Saidulajab Gali No 3 F Flor A 49 Near Sabji Mandi\",\"address2\":\"No\",\"landmark\":\"\",\"city\":\"New Delhi\",\"state\":\"Delhi\",\"pincode\":\"110030\",\"phone\":\"9717999121\"}]', 110030),
(10004, '[{\"address_id\":1,\"fullname\":\"kamal\",\"email\":\"kamal.bunkar07@gmail.com\",\"address1\":\"flat ih\",\"address2\":\"street gh\",\"landmark\":\"\",\"city\":\"Delhi\",\"state\":\"Delhi\",\"pincode\":\"110005\",\"phone\":\"9144040888\"},{\"address_id\":2,\"fullname\":\"kk\",\"email\":\"\",\"address1\":\"ghh\",\"address2\":\"gh\",\"landmark\":\"hhhj\",\"city\":\"ghh\",\"state\":\"hj\",\"pincode\":\"110030\",\"phone\":\"9144040888\"}]', 1, '[{\"address_id\":1,\"fullname\":\"kamal\",\"email\":\"kamal.bunkar07@gmail.com\",\"address1\":\"flat ih\",\"address2\":\"street gh\",\"landmark\":\"\",\"city\":\"Delhi\",\"state\":\"Delhi\",\"pincode\":\"110005\",\"phone\":\"9144040888\"},{\"address_id\":2,\"fullname\":\"kk\",\"email\":\"\",\"address1\":\"ghh\",\"address2\":\"gh\",\"landmark\":\"hhhj\",\"city\":\"ghh\",\"state\":\"hj\",\"pincode\":\"110030\",\"phone\":\"9144040888\"}]', 0),
(10005, '[{\"address_id\":1,\"fullname\":\"ccc\",\"email\":\"ccc@bmail.com\",\"address1\":\"vrcha\",\"address2\":null,\"landmark\":\"\",\"city\":\"surat\",\"state\":\"gujrat\",\"pincode\":\"110030\",\"phone\":\"9856325666\"},{\"address_id\":2,\"fullname\":\"chirag\",\"email\":\"\",\"address1\":\"vrachha\",\"address2\":\"punagam\",\"landmark\":\"\",\"city\":\"surat\",\"state\":\"gujrat\",\"pincode\":\"110030\",\"phone\":\"9856325566\"}]', 2, '[{\"address_id\":1,\"fullname\":\"ccc\",\"email\":\"ccc@bmail.com\",\"address1\":\"vrcha\",\"address2\":null,\"landmark\":\"\",\"city\":\"surat\",\"state\":\"gujrat\",\"pincode\":\"110030\",\"phone\":\"9856325666\"},{\"address_id\":2,\"fullname\":\"chirag\",\"email\":\"\",\"address1\":\"vrachha\",\"address2\":\"punagam\",\"landmark\":\"\",\"city\":\"surat\",\"state\":\"gujrat\",\"pincode\":\"110030\",\"phone\":\"9856325566\"}]', 110030),
(10009, '[{\"address_id\":1,\"fullname\":\"Rintu sir \",\"email\":\"\",\"address1\":\"H.N-411, B5 3rd floor \",\"address2\":\"Amar Singh Appartment saidulajab \",\"landmark\":\"Choudary bartan bhandar\",\"city\":\"saidulajab \",\"state\":\"New Delhi \",\"pincode\":\"110030\",\"phone\":\"6205862843\"}]', 1, '[{\"address_id\":1,\"fullname\":\"Rintu sir \",\"email\":\"\",\"address1\":\"H.N-411, B5 3rd floor \",\"address2\":\"Amar Singh Appartment saidulajab \",\"landmark\":\"Choudary bartan bhandar\",\"city\":\"saidulajab \",\"state\":\"New Delhi \",\"pincode\":\"110030\",\"phone\":\"6205862843\"}]', 110030),
(10011, '[{\"address_id\":1,\"fullname\":\"Manoj Prasad Sah \",\"email\":\"\",\"address1\":\"House no.581\",\"address2\":\"Gali no.1,Near Mother Dairy, Opposite Raj Super store \",\"landmark\":\"Saidullajab \",\"city\":\"New Delhi \",\"state\":\"India \",\"pincode\":\"110030\",\"phone\":\"8851937101\"}]', 1, '[{\"address_id\":1,\"fullname\":\"Manoj Prasad Sah \",\"email\":\"\",\"address1\":\"House no.581\",\"address2\":\"Gali no.1,Near Mother Dairy, Opposite Raj Super store \",\"landmark\":\"Saidullajab \",\"city\":\"New Delhi \",\"state\":\"India \",\"pincode\":\"110030\",\"phone\":\"8851937101\"}]', 110030);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `brand_img` text NOT NULL,
  `brand_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_img`, `brand_order`) VALUES
(22, 'Noodle/Semai', '2023-02-02/Screenshot_2023-02-02-02-24-59-08_680d03679600f7af0b4c700c6b270fe7~2.jpg', 0),
(15, 'Oil', '2023-02-01/Screenshot_2023-02-01-17-33-03-38_680d03679600f7af0b4c700c6b270fe7~2.jpg', 0),
(18, 'Ghee', '2023-02-01/Screenshot_2023-02-01-17-45-22-02_680d03679600f7af0b4c700c6b270fe7~2.jpg', 0),
(23, 'Chocolate ', '2023-02-02/Screenshot_2023-02-02-11-55-03-30_680d03679600f7af0b4c700c6b270fe7~2.jpg', 0),
(21, 'Besan/Sooji ', '2023-02-02/InCollage_20230202_015006819.jpg', 0),
(36, 'Medicated ', '2023-02-06/InCollage_20230206_040856679.jpg', 0),
(37, 'Pooja need ', '2023-02-07/InCollage_20230129_011852889.jpg', 0),
(38, 'Sabut masala ', '2023-02-09/Screenshot_2023-02-09-10-29-15-87_965bbf4d18d205f782c6b8409c5773a4~2.jpg', 0),
(34, 'Baby/Dairy product ', '2023-02-06/InCollage_20230206_030944865.jpg', 0),
(33, 'Spices Powder ', '2023-02-05/Screenshot_2023-02-05-03-19-41-07_680d03679600f7af0b4c700c6b270fe7~2.jpg', 0),
(11, 'Detergent powder ', '2023-02-01/Screenshot_2023-02-01-17-05-44-70_680d03679600f7af0b4c700c6b270fe7~2.jpg', 0),
(12, 'Detergent Bar', '2023-02-01/Screenshot_2023-02-01-17-06-58-63_680d03679600f7af0b4c700c6b270fe7~2.jpg', 0),
(13, 'Pulse (Dal)', '2023-02-01/Screenshot_2023-02-01-17-21-51-06_680d03679600f7af0b4c700c6b270fe7~2.jpg', 0),
(17, 'All Rice', '2023-02-01/Screenshot_2023-02-01-17-30-03-47_680d03679600f7af0b4c700c6b270fe7~2.jpg', 0),
(16, 'All Bathing soap', '2023-02-01/Screenshot_2023-02-01-17-37-40-89_680d03679600f7af0b4c700c6b270fe7~2.jpg', 0),
(19, 'Dental care ', '2023-02-01/Screenshot_2023-02-01-18-24-54-25_680d03679600f7af0b4c700c6b270fe7~2.jpg', 0),
(20, 'Kitchen Need', '2023-02-02/InCollage_20230202_000721912.jpg', 0),
(24, 'Namkeen ', '2023-02-02/Screenshot_2023-02-02-12-18-27-19_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg', 0),
(25, 'Honey/Dry fruits ', '2023-02-03/InCollage_20230203_015713232.jpg', 0),
(26, 'Tea/coffee ', '2023-02-03/InCollage_20230203_235646298.jpg', 0),
(27, 'Hair oil ', '2023-02-04/InCollage_20230204_011055105.jpg', 0),
(28, 'Health needs ', '2023-02-04/InCollage_20230204_024157251.jpg', 0),
(29, 'Biscuits ', '2023-02-05/InCollage_20230205_012649480.jpg', 0),
(31, 'Pickle ', '2023-02-05/Screenshot_2023-02-05-01-59-36-15_680d03679600f7af0b4c700c6b270fe7~2.jpg', 0),
(32, 'Sauce ', '2023-02-05/Screenshot_2023-02-05-02-00-26-33_680d03679600f7af0b4c700c6b270fe7~2.jpg', 0),
(39, 'Pan masala ', '2023-02-09/Screenshot_2023-02-01-18-55-03-68_680d03679600f7af0b4c700c6b270fe7~2.jpg', 0),
(40, 'Face/Body Care', '2023-02-10/InCollage_20230210_111806091.jpg', 0),
(41, 'Drink item ', '2023-02-10/InCollage_20230210_123904952.jpg', 0),
(42, 'Home care ', '2023-02-20/InCollage_20230205_014319732.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cartdetails`
--

CREATE TABLE `cartdetails` (
  `user_id` int(11) NOT NULL,
  `prod_id` text NOT NULL,
  `qoute_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cartdetails`
--

INSERT INTO `cartdetails` (`user_id`, `prod_id`, `qoute_id`) VALUES
(10017, '[{\"index\":0,\"prod_id\":\"114\",\"qty\":\"3\",\"size\":\"\",\"color\":\"\",\"price\":\"104.00\",\"date\":\"2023-05-23\",\"referid\":\"\",\"msgoncake\":\"\",\"eggless\":\"\"},{\"index\":1,\"prod_id\":\"113\",\"qty\":\"1\",\"size\":\"\",\"color\":\"\",\"price\":\"104.00\",\"date\":\"2023-05-23\",\"referid\":\"\",\"msgoncake\":\"\",\"eggless\":\"\"},{\"index\":2,\"prod_id\":\"33\",\"qty\":\"1\",\"size\":\"\",\"color\":\"\",\"price\":\"128.00\",\"date\":\"2023-05-23\",\"referid\":\"\",\"msgoncake\":\"\",\"eggless\":\"\"},{\"index\":4,\"prod_id\":\"22\",\"qty\":\"5\",\"size\":\"\",\"color\":\"\",\"price\":\"63.00\",\"date\":\"2023-05-23\",\"referid\":\"\",\"msgoncake\":\"\",\"eggless\":\"\"},{\"index\":5,\"prod_id\":\"208\",\"qty\":\"10\",\"size\":\"\",\"color\":\"\",\"price\":\"28.00\",\"date\":\"2023-05-23\",\"referid\":\"\",\"msgoncake\":\"\",\"eggless\":\"\"}]', 1011),
(10008, '[{\"prod_id\":\"40\",\"qty\":\"5\",\"size\":\"\",\"color\":\"\",\"price\":\"92\",\"date\":\"2023-02-11\",\"referid\":\"\",\"custom_title\":null,\"custom_image\":\"92.000\",\"msgoncake\":\"\",\"eggless\":\"\"},{\"prod_id\":\"128\",\"qty\":\"1\",\"size\":\"\",\"color\":\"\",\"price\":\"161\",\"date\":\"2023-02-11\",\"referid\":\"\",\"custom_title\":null,\"custom_image\":\"161.000\",\"msgoncake\":\"\",\"eggless\":\"\"},{\"prod_id\":\"182\",\"qty\":\"3\",\"size\":\"\",\"color\":\"\",\"price\":\"90\",\"date\":\"2023-02-11\",\"referid\":\"\",\"custom_title\":null,\"custom_image\":\"90.000\",\"msgoncake\":\"\",\"eggless\":\"\"}]', 1006),
(10002, '[]', 1002),
(10004, '[{\"index\":0,\"prod_id\":\"1\",\"qty\":\"1\",\"size\":\"\",\"color\":\"\",\"price\":\"199\",\"date\":\"2023-01-20\",\"referid\":\"\",\"msgoncake\":\"\",\"eggless\":\"\"}]', 1003),
(10006, '[{\"index\":0,\"prod_id\":\"1\",\"qty\":\"1\",\"size\":\"\",\"color\":\"\",\"price\":\"199.000\",\"date\":\"2023-01-24\",\"referid\":\"\",\"msgoncake\":\"\",\"eggless\":\"\"},{\"index\":1,\"prod_id\":\"6\",\"qty\":\"5\",\"size\":\"\",\"color\":\"\",\"price\":\"50.000\",\"date\":\"2023-01-24\",\"referid\":\"\",\"msgoncake\":\"\",\"eggless\":\"\"},{\"index\":2,\"prod_id\":\"3\",\"qty\":\"1\",\"size\":\"\",\"color\":\"\",\"price\":\"1299.00\",\"date\":\"2023-01-24\",\"referid\":\"\",\"msgoncake\":\"\",\"eggless\":\"\"}]', 1005),
(10010, '[]', 1007),
(10012, '[{\"prod_id\":\"302\",\"qty\":\"2\",\"size\":\"\",\"color\":\"\",\"price\":\"145\",\"date\":\"2023-04-15\",\"referid\":\"\",\"custom_title\":null,\"custom_image\":\"145.000\",\"msgoncake\":\"\",\"eggless\":\"\"},{\"prod_id\":\"18\",\"qty\":\"4\",\"size\":\"\",\"color\":\"\",\"price\":\"150\",\"date\":\"2023-04-15\",\"referid\":\"\",\"custom_title\":null,\"custom_image\":\"150.000\",\"msgoncake\":\"\",\"eggless\":\"\"}]', 1008),
(10013, '[{\"prod_id\":\"226\",\"qty\":\"1\",\"size\":\"\",\"color\":\"\",\"price\":\"320\",\"date\":\"2023-04-22\",\"referid\":\"\",\"custom_title\":null,\"custom_image\":\"320.000\",\"msgoncake\":\"\",\"eggless\":\"\"},{\"prod_id\":\"20\",\"qty\":\"5\",\"size\":\"\",\"color\":\"\",\"price\":\"97\",\"date\":\"2023-04-22\",\"referid\":\"\",\"custom_title\":null,\"custom_image\":\"97.000\",\"msgoncake\":\"\",\"eggless\":\"\"},{\"prod_id\":\"91\",\"qty\":\"3\",\"size\":\"\",\"color\":\"\",\"price\":\"103\",\"date\":\"2023-04-22\",\"referid\":\"\",\"custom_title\":null,\"custom_image\":\"103.000\",\"msgoncake\":\"\",\"eggless\":\"\"},{\"prod_id\":\"37\",\"qty\":\"2\",\"size\":\"\",\"color\":\"\",\"price\":\"200\",\"date\":\"2023-04-22\",\"referid\":\"\",\"custom_title\":null,\"custom_image\":\"200.000\",\"msgoncake\":\"\",\"eggless\":\"\"}]', 1009),
(10014, '[{\"index\":0,\"prod_id\":\"68\",\"qty\":\"1\",\"size\":\"\",\"color\":\"\",\"price\":\"38.00\",\"date\":\"2023-04-26\",\"referid\":\"\",\"msgoncake\":\"\",\"eggless\":\"\"},{\"index\":1,\"prod_id\":\"30\",\"qty\":\"1\",\"size\":\"\",\"color\":\"\",\"price\":\"205.00\",\"date\":\"2023-04-26\",\"referid\":\"\",\"msgoncake\":\"\",\"eggless\":\"\"},{\"index\":2,\"prod_id\":\"160\",\"qty\":\"12\",\"size\":\"\",\"color\":\"\",\"price\":\"46.000\",\"date\":\"2023-04-26\",\"referid\":\"\",\"msgoncake\":\"\",\"eggless\":\"\"}]', 1010),
(10019, '[{\"prod_id\":\"47\",\"qty\":\"1\",\"size\":\"\",\"color\":\"\",\"price\":\"590\",\"date\":\"2023-08-28\",\"referid\":\"\",\"custom_title\":null,\"custom_image\":\"590.000\",\"msgoncake\":\"\",\"eggless\":\"\"}]', 1012),
(10001, '[{\"prod_id\":\"21\",\"qty\":\"1\",\"size\":\"\",\"color\":\"\",\"price\":\"122.00\",\"date\":\"2023-09-30\",\"referid\":\"\",\"custom_title\":null,\"custom_image\":null,\"msgoncake\":\"\",\"eggless\":\"\"}]', 1013);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(80) NOT NULL,
  `cat_name_ar` varchar(80) NOT NULL,
  `cat_img` text NOT NULL,
  `parent_id` int(11) NOT NULL,
  `cat_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_name_ar`, `cat_img`, `parent_id`, `cat_order`) VALUES
(37, 'Oil', '', '2023-02-01/Screenshot_2023-02-01-17-33-03-38_680d03679600f7af0b4c700c6b270fe7~2.jpg', 27, 0),
(35, 'Spice', '', '2023-02-01/InCollage_20230201_185326695.jpg', 0, 0),
(36, 'Pan masala ', '', '2023-02-01/Screenshot_2023-02-01-18-55-03-68_680d03679600f7af0b4c700c6b270fe7~2.jpg', 0, 0),
(29, 'Biscuits/Namkeen ', '', '2023-02-01/InCollage_20230129_011410095.jpg', 0, 0),
(33, 'Personal care', '', '2023-02-01/InCollage_20230201_184025831.jpg', 0, 0),
(34, 'Instant Food ', '', '2023-02-01/InCollage_20230129_010805316.jpg', 0, 0),
(31, 'Pooja need ', '', '2023-02-01/InCollage_20230129_011852889.jpg', 0, 0),
(32, 'House hold care', '', '2023-02-01/Screenshot_2023-02-01-18-32-42-76_680d03679600f7af0b4c700c6b270fe7~2.jpg', 0, 0),
(27, 'Oil/Ghee', '', '2023-02-01/InCollage_20230129_010528100.jpg', 0, 0),
(28, 'Atta/Rice/dal', '', '2023-02-01/InCollage_20230129_010322208.jpg', 0, 0),
(38, 'Ghee', '', '2023-02-01/Screenshot_2023-02-01-17-45-22-02_680d03679600f7af0b4c700c6b270fe7~2.jpg', 27, 0),
(39, 'Dental care ', '', '2023-02-01/Screenshot_2023-02-01-18-24-54-25_680d03679600f7af0b4c700c6b270fe7~2.jpg', 33, 0),
(40, 'Kitchen Need ', '', '2023-02-02/InCollage_20230202_000721912.jpg', 32, 0),
(41, 'Detergent powder ', '', '2023-02-02/Screenshot_2023-02-01-17-05-44-70_680d03679600f7af0b4c700c6b270fe7~2.jpg', 32, 0),
(42, 'Detergent Bar ', '', '2023-02-02/Screenshot_2023-02-01-17-06-58-63_680d03679600f7af0b4c700c6b270fe7~2.jpg', 32, 0),
(43, 'Besan/sooji', '', '2023-02-02/InCollage_20230202_015006819.jpg', 28, 0),
(44, 'Noodle/Semai ', '', '2023-02-02/Screenshot_2023-02-02-02-24-59-08_680d03679600f7af0b4c700c6b270fe7~2.jpg', 34, 0),
(45, 'Chocolate ', '', '2023-02-02/Screenshot_2023-02-02-11-55-03-30_680d03679600f7af0b4c700c6b270fe7~2.jpg', 29, 0),
(58, 'Soap ', '', '2023-02-06/InCollage_20230206_013244188.jpg', 33, 0),
(57, 'Spices Powder ', '', '2023-02-05/Screenshot_2023-02-05-03-19-41-07_680d03679600f7af0b4c700c6b270fe7~2.jpg', 35, 0),
(48, 'Namkeen ', '', '2023-02-02/InCollage_20230202_122823457.jpg', 29, 0),
(64, 'Sabut masala ', '', '2023-02-09/Screenshot_2023-02-09-10-29-15-87_965bbf4d18d205f782c6b8409c5773a4~2.jpg', 35, 0),
(50, 'Tea/Coffee ', '', '2023-02-03/InCollage_20230203_235646298.jpg', 0, 0),
(52, 'Hair oil ', '', '2023-02-04/InCollage_20230204_011055105.jpg', 33, 0),
(53, 'Health needs ', '', '2023-02-04/InCollage_20230204_024157251.jpg', 0, 0),
(54, 'Biscuits ', '', '2023-02-05/InCollage_20230205_012649480.jpg', 29, 0),
(55, 'Home care ', '', '2023-02-20/InCollage_20230205_014319732.jpg', 32, 0),
(56, 'Pickle/Sauce', '', '2023-02-05/InCollage_20230205_015730446.jpg', 0, 0),
(59, 'Baby/Dairy product ', '', '2023-02-06/InCollage_20230206_030944865.jpg', 0, 0),
(60, 'Rice', '', '2023-02-06/Screenshot_2023-02-06-03-37-34-52_965bbf4d18d205f782c6b8409c5773a4~3.jpg', 28, 0),
(61, 'Pulses (Dal)', '', '2023-02-06/Screenshot_2023-02-06-03-37-40-57_965bbf4d18d205f782c6b8409c5773a4~2.jpg', 28, 0),
(62, 'Medicated', '', '2023-02-06/InCollage_20230206_040856679.jpg', 33, 0),
(63, 'Honey/Dry fruits ', '', '2023-02-09/InCollage_20230203_015713232.jpg', 0, 0),
(65, 'Face/Body Care ', '', '2023-02-10/InCollage_20230210_111806091.jpg', 33, 0);

-- --------------------------------------------------------

--
-- Table structure for table `deliverytime`
--

CREATE TABLE `deliverytime` (
  `sno` int(11) NOT NULL,
  `timevalue` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `deliverytime`
--

INSERT INTO `deliverytime` (`sno`, `timevalue`) VALUES
(1, '4 to 5 Business Days');

-- --------------------------------------------------------

--
-- Table structure for table `discountprod`
--

CREATE TABLE `discountprod` (
  `sno` int(11) NOT NULL,
  `prodid` int(11) NOT NULL,
  `prodname` varchar(300) NOT NULL,
  `orderid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homecat`
--

CREATE TABLE `homecat` (
  `sno` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `catname` varchar(100) NOT NULL,
  `catorder` int(11) NOT NULL,
  `layout_type` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `clicktype` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(300) NOT NULL,
  `img_url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homepage_banner`
--

CREATE TABLE `homepage_banner` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `link` text NOT NULL,
  `section` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homepage_banner`
--

INSERT INTO `homepage_banner` (`id`, `type`, `image`, `link`, `section`) VALUES
(1, 'topbar', 'AND It\'s a wrap 2023', 'https://reshamdhaage.com/', 'topbar_section'),
(2, 'top_video', '2023/12/09/d32ab901b28d2428846717777a933e58_1702115912.mp4', 'https://reshamdhaage.com/', 'top_video'),
(3, 'top_link_1', 'New Arrivals', 'https://reshamdhaage.com/', 'top_link_section'),
(4, 'top_link_2', 'AND It\'s a wrap 2023', 'https://reshamdhaage.com/', 'top_link_section'),
(5, 'top_link_3', 'Winter Wear', 'https://reshamdhaage.com/', 'top_link_section'),
(6, 'cat_1', '2023/12/09/a442d545bed573a2ae4deeaf0b713225_1702115938.webp', 'https://reshamdhaage.com/', 'top_category'),
(7, 'cat_2', '2023/12/09/1fa5930f4df318c89e52d860dc654266_1702116043.webp', 'https://reshamdhaage.com/', 'top_category'),
(8, 'cat_3', '2023/12/09/db376d4bb858f6add38d77c3cf33ee15_1702116052.webp', 'https://reshamdhaage.com/', 'top_category'),
(9, 'cat_4', '2023/12/09/3112fa1c82f8b2ad521deb701abe53e8_1702116061.webp', 'https://reshamdhaage.com/', 'top_category'),
(10, 'trend_1', '2023/12/09/c061318daac1e1ca4c497ab0d64375c8_1702134743.webp', 'https://reshamdhaage.com/', 'trending_section'),
(11, 'trend_2', '2023/12/09/111d5e367123df63a7a64d737a00f466_1702134860.webp', 'https://reshamdhaage.com/', 'trending_section'),
(12, 'trend_3', '2023/12/09/ef81c7806c2ee869ef16f141f6b57f7c_1702134867.webp', 'https://reshamdhaage.com/', 'trending_section'),
(13, 'promo_1', '2023/12/09/079b907deeaec7a1476cb61139723e16_1702135590.webp', 'https://reshamdhaage.com/', 'promotion_section'),
(14, 'promo_2', '2023/12/09/edd0c8fbbcb25f1cb43399658ea76424_1702135598.webp', 'https://reshamdhaage.com/', 'promotion_section'),
(15, 'promo_3', '2023/12/09/48e03f2d75a49efa1625b982fdedfa4b_1702135604.webp', 'https://reshamdhaage.com/', 'promotion_section'),
(16, 'bottom_link_1', 'Shop Jwelleries', 'https://reshamdhaage.com/', 'bottom_link_section'),
(17, 'bottom_link_2', 'Shop Bags', 'https://reshamdhaage.com/', 'bottom_link_section'),
(18, 'bottom_link_3', 'Shop Footwears', 'https://reshamdhaage.com/', 'bottom_link_section'),
(19, 'bottom_link_4', 'Shop Scraves', 'https://reshamdhaage.com/', 'bottom_link_section');

-- --------------------------------------------------------

--
-- Table structure for table `home_banner`
--

CREATE TABLE `home_banner` (
  `home_banner_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `img_url` text NOT NULL,
  `datetime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_custom_banner`
--

CREATE TABLE `home_custom_banner` (
  `id` int(11) NOT NULL,
  `img_url` text NOT NULL,
  `banner_id` varchar(100) NOT NULL,
  `clicktype` int(11) NOT NULL,
  `banner_for` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `knet_payment`
--

CREATE TABLE `knet_payment` (
  `sno` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `amount` text NOT NULL,
  `order_no` text NOT NULL,
  `result` text NOT NULL,
  `gateway_response` text NOT NULL,
  `reference_number` text NOT NULL,
  `customer_email` text NOT NULL,
  `cmp_res` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `latestprod`
--

CREATE TABLE `latestprod` (
  `sno` int(11) NOT NULL,
  `prodid` int(11) NOT NULL,
  `prodname` varchar(300) NOT NULL,
  `orderid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layoutsection`
--

CREATE TABLE `layoutsection` (
  `sno` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `layoutsection`
--

INSERT INTO `layoutsection` (`sno`, `name`, `type`) VALUES
(1, 'section1', 'top1'),
(2, 'section1', 'top2'),
(3, 'section1', 'top3'),
(4, 'section2', 'cat1'),
(5, 'section2', 'cat2'),
(6, 'section2', 'cat3'),
(7, 'section4', 'img1'),
(8, 'section4', 'img2'),
(9, 'section5', 'bottom1'),
(10, 'section5', 'bottom4');

-- --------------------------------------------------------

--
-- Table structure for table `notifyme`
--

CREATE TABLE `notifyme` (
  `sno` int(11) NOT NULL,
  `prodid` int(11) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `createby` datetime NOT NULL,
  `updateby` datetime NOT NULL,
  `action` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offerzone`
--

CREATE TABLE `offerzone` (
  `sno` int(11) NOT NULL,
  `prodid` int(11) NOT NULL,
  `prodname` varchar(300) NOT NULL,
  `orderid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `sno` int(11) NOT NULL,
  `order_id` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `prod_details` text NOT NULL,
  `address_id` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `payment_orderid` text NOT NULL,
  `payment_id` text NOT NULL,
  `delivery_mode` varchar(20) NOT NULL,
  `qoute_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `curriername` varchar(100) NOT NULL,
  `trackid` text NOT NULL,
  `deliveryid` varchar(100) NOT NULL,
  `walletcoins` int(11) NOT NULL,
  `discountid` int(11) NOT NULL,
  `discountvalue` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `deliveryid` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(300) NOT NULL,
  `prod_img` text NOT NULL,
  `prod_attr` text NOT NULL,
  `qty` int(11) NOT NULL,
  `org_qty` int(11) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `prod_price` float NOT NULL,
  `cgst` float NOT NULL,
  `sgst` float NOT NULL,
  `igst` float NOT NULL,
  `shipping` float NOT NULL,
  `total` float NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `status` varchar(15) NOT NULL,
  `status_date` datetime NOT NULL,
  `refund_amt` int(11) NOT NULL,
  `refund_txnno` varchar(20) NOT NULL,
  `refund_date` datetime NOT NULL,
  `pickup_date` datetime NOT NULL,
  `return_status` int(11) NOT NULL,
  `return_reason` text NOT NULL,
  `return_updateby` datetime NOT NULL,
  `sellername` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `deliveryid`, `user_id`, `prod_id`, `prod_name`, `prod_img`, `prod_attr`, `qty`, `org_qty`, `unit`, `prod_price`, `cgst`, `sgst`, `igst`, `shipping`, `total`, `create_date`, `update_date`, `status`, `status_date`, `refund_amt`, `refund_txnno`, `refund_date`, `pickup_date`, `return_status`, `return_reason`, `return_updateby`, `sellername`) VALUES
(1, '100001', '', 10003, 1, 'Mahakosh Refined Soyabean Oil Pouch', '../media/2022-12-28/-original-imagahyvptejcgum.png', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 199, 0, 0, 0, 0, 199, '2023-01-24 22:54:40', '2023-01-24 22:54:40', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(2, '100001', '', 10003, 3, 'BORGES Extra Light Olive Oil Plastic Bottle', '../media/2022-12-28/2-extra-light-plastic-bottle-1-olive-oil-borges-original-imagg574rh9mdvfb.png', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 1299, 0, 0, 0, 0, 1299, '2023-01-24 22:54:40', '2023-01-24 22:54:40', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(3, '100001', '', 10003, 6, 'Harpic ', '../media/2023-01-03/Screenshot_2023-01-01-01-10-58-65_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 3, 3, '', 50, 0, 0, 0, 0, 150, '2023-01-24 22:54:40', '2023-01-24 22:54:40', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(4, '100002', '', 10003, 6, 'Harpic ', '../media/2023-01-03/Screenshot_2023-01-01-01-10-58-65_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 3, 3, '', 50, 0, 0, 0, 80, 150, '2023-01-24 22:57:05', '2023-01-24 22:57:05', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(5, '100003', '', 10005, 1, 'Mahakosh Refined Soyabean Oil Pouch', '../media/2022-12-28/-original-imagahyvptejcgum.png', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 199, 0, 0, 0, 0, 199, '2023-01-25 11:04:52', '2023-01-25 11:04:52', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(6, '100003', '', 10005, 3, 'BORGES Extra Light Olive Oil Plastic Bottle', '../media/2022-12-28/2-extra-light-plastic-bottle-1-olive-oil-borges-original-imagg574rh9mdvfb.png', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 1299, 0, 0, 0, 0, 1299, '2023-01-25 11:04:52', '2023-01-25 11:04:52', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(7, '100004', '', 10005, 1, 'Mahakosh Refined Soyabean Oil Pouch', '../media/2022-12-28/-original-imagahyvptejcgum.png', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 199, 0, 0, 0, 0, 199, '2023-01-25 11:14:15', '2023-01-25 11:14:15', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(8, '100005', '', 10005, 1, 'Mahakosh Refined Soyabean Oil Pouch', '../media/2022-12-28/-original-imagahyvptejcgum.png', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 199, 0, 0, 0, 0, 199, '2023-01-25 15:15:04', '2023-01-25 15:15:04', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(9, '100005', '', 10005, 3, 'BORGES Extra Light Olive Oil Plastic Bottle', '../media/2022-12-28/2-extra-light-plastic-bottle-1-olive-oil-borges-original-imagg574rh9mdvfb.png', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 1299, 0, 0, 0, 0, 1299, '2023-01-25 15:15:04', '2023-01-25 15:15:04', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(10, '100006', '', 10003, 3, 'BORGES Extra Light Olive Oil Plastic Bottle', '../media/2022-12-28/2-extra-light-plastic-bottle-1-olive-oil-borges-original-imagg574rh9mdvfb.png', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 1299, 0, 0, 0, 0, 1299, '2023-01-26 00:15:05', '2023-01-26 00:15:05', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(11, '100007', '', 10005, 1, 'Mahakosh Refined Soyabean Oil Pouch', '../media/2022-12-28/-original-imagahyvptejcgum.png', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 199, 0, 0, 0, 0, 199, '2023-01-27 10:54:06', '2023-01-27 10:54:06', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(12, '100008', '', 10003, 3, 'BORGES Extra Light Olive Oil Plastic Bottle', '../media/2022-12-28/2-extra-light-plastic-bottle-1-olive-oil-borges-original-imagg574rh9mdvfb.png', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 1299, 0, 0, 0, 0, 1299, '2023-01-27 12:27:54', '2023-01-27 12:27:54', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(13, '100009', '', 10001, 3, 'BORGES Extra Light Olive Oil Plastic Bottle', '../media/2022-12-28/2-extra-light-plastic-bottle-1-olive-oil-borges-original-imagg574rh9mdvfb.png', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 1299, 0, 0, 0, 0, 1299, '2023-01-30 21:55:07', '2023-01-30 21:55:07', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(14, '100009', '', 10001, 4, 'Multi grain atta ', '../media/2022-12-31/aata-2.jpeg', 'Size : 1Kg | Color :  | Eggless :  | MSG : ', 1, 1, '', 195, 0, 0, 0, 0, 195, '2023-01-30 21:55:07', '2023-01-30 21:55:07', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(15, '100010', '', 10009, 154, 'Mangaldeep Bouquet agarbatti 76 stick ', '../media/2023-02-08/Screenshot_2023-02-08-11-32-34-41_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 3, 3, '', 38, 0, 0, 0, 0, 114, '2023-02-17 09:22:12', '2023-02-17 09:22:12', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(16, '100010', '', 10009, 152, 'Mangaldeep Rose agarbatti 76 stick ', '../media/2023-02-08/Screenshot_2023-02-07-16-10-34-70_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 3, 3, '', 38, 0, 0, 0, 0, 114, '2023-02-17 09:22:12', '2023-02-17 09:22:12', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(17, '100010', '', 10009, 151, 'Mangaldeep sandal agarbatti 72 stick', '../media/2023-02-08/Screenshot_2023-02-08-11-16-50-89_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 2, 2, '', 38, 0, 0, 0, 0, 76, '2023-02-17 09:22:12', '2023-02-17 09:22:12', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(18, '100010', '', 10009, 158, 'Mishri dana prasad 250 g', '../media/2023-02-08/IMG_20230203_220121~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 20, 0, 0, 0, 0, 20, '2023-02-17 09:22:12', '2023-02-17 09:22:12', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(19, '100010', '', 10009, 232, 'Posto dana(khus khus) 100g ', '../media/2023-02-15/IMG_20230210_155809~3.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 190, 0, 0, 0, 0, 190, '2023-02-17 09:22:12', '2023-02-17 09:22:12', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(20, '100010', '', 10009, 51, 'Khatta meetha haldirams 400 gm ', '../media/2023-02-03/Screenshot_2023-02-03-01-38-32-78_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 90, 0, 0, 0, 0, 90, '2023-02-17 09:22:12', '2023-02-17 09:22:12', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(21, '100010', '', 10009, 10, 'Fortune Mustard oil 1 Ltr ', '../media/2023-02-01/Screenshot_2023-01-28-21-39-01-23_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 150, 0, 0, 0, 0, 150, '2023-02-17 09:22:12', '2023-02-17 09:22:12', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(22, '100010', '', 10009, 188, 'Arhar/Toor unpolished dal 1 kg ', '../media/2023-02-10/IMG_20230203_221525~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 115, 0, 0, 0, 0, 115, '2023-02-17 09:22:12', '2023-02-17 09:22:12', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(23, '100013', '', 10003, 6, 'Harpic ', '../media/2023-01-03/Screenshot_2023-01-01-01-10-58-65_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 50, 0, 0, 0, 0, 50, '2023-03-21 15:10:22', '2023-03-21 15:10:22', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(24, '100013', '', 10003, 10, 'Fortune Mustard oil 1 Ltr ', '../media/2023-02-01/Screenshot_2023-01-28-21-39-01-23_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 6, 6, '', 145, 0, 0, 0, 0, 870, '2023-03-21 15:10:22', '2023-03-21 15:10:22', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(25, '100016', '', 10003, 10, 'Fortune Mustard oil 1 Ltr ', '../media/2023-02-01/Screenshot_2023-01-28-21-39-01-23_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 6, 6, '', 145, 0, 0, 0, 0, 870, '2023-03-21 15:13:42', '2023-03-21 15:13:42', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(26, '100019', '', 10003, 10, 'Fortune Mustard oil 1 Ltr ', '../media/2023-02-01/Screenshot_2023-01-28-21-39-01-23_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 6, 6, '', 145, 0, 0, 0, 0, 870, '2023-03-21 15:14:52', '2023-03-21 15:14:52', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(27, '100021', '', 10003, 10, 'Fortune Mustard oil 1 Ltr ', '../media/2023-02-01/Screenshot_2023-01-28-21-39-01-23_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 6, 6, '', 145, 0, 0, 0, 0, 870, '2023-03-21 15:16:33', '2023-03-21 15:16:33', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(28, '100022', '', 10003, 46, 'Babaji mustard oil 1 ltr', '../media/2023-02-03/Screenshot_2023-01-29-10-00-17-87_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 7, 7, '', 128, 0, 0, 0, 0, 896, '2023-03-21 15:17:55', '2023-03-21 15:17:55', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(29, '100024', '', 10011, 118, 'Amul butter 100 g', '../media/2023-02-06/Screenshot_2023-02-06-03-02-59-35_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 5, 5, '', 53, 0, 0, 0, 0, 265, '2023-03-22 08:23:57', '2023-03-22 08:23:57', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(30, '100024', '', 10011, 39, 'Maggi atta noodle 72 Gm', '../media/2023-02-02/Screenshot_2023-02-02-11-26-10-84_d4e8097ba36c48a408135806b3f44b78~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 5, 5, '', 23, 0, 0, 0, 0, 115, '2023-03-22 08:23:57', '2023-03-22 08:23:57', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(31, '100024', '', 10011, 29, 'Ghadi Detergent Bar(10rs × 10pc)', '../media/2023-02-02/Screenshot_2023-02-02-01-24-18-76_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 2, 2, '', 90, 0, 0, 0, 0, 180, '2023-03-22 08:23:57', '2023-03-22 08:23:57', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(32, '100024', '', 10011, 266, 'Mortein coil ', '../media/2023-02-23/Screenshot_2023-02-23-00-08-52-59_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 5, 5, '', 25, 0, 0, 0, 0, 125, '2023-03-22 08:23:57', '2023-03-22 08:23:57', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(33, '100024', '', 10011, 38, 'Colgate strong teeth 100 Gm', '../media/2023-02-02/Screenshot_2023-02-02-11-20-16-79_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 4, 4, '', 61, 0, 0, 0, 0, 244, '2023-03-22 08:23:57', '2023-03-22 08:23:57', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(34, '100030', '', 10003, 46, 'Babaji mustard oil 1 ltr', '../media/2023-02-03/Screenshot_2023-01-29-10-00-17-87_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 5, 5, '', 128, 0, 0, 0, 0, 640, '2023-03-22 10:44:41', '2023-03-22 10:44:41', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(35, '100030', '', 10003, 10, 'Fortune Mustard oil 1 Ltr ', '../media/2023-02-01/Screenshot_2023-01-28-21-39-01-23_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 3, 3, '', 145, 0, 0, 0, 0, 435, '2023-03-22 10:44:41', '2023-03-22 10:44:41', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(36, '100036', '', 10001, 1, 'Mahakosh Refined Soyabean Oil Pouch', '../media/2022-12-28/-original-imagahyvptejcgum.png', 'Size :  | Color :  | Eggless :  | MSG : ', 4, 4, '', 199, 0, 0, 0, 0, 796, '2023-09-16 12:26:40', '2023-09-16 12:26:40', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(37, '100036', '', 10001, 12, 'Patanjali cow ghee 1 Ltr ', '../media/2023-02-01/Screenshot_2023-02-01-19-49-24-66_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 640, 0, 0, 0, 0, 640, '2023-09-16 12:26:40', '2023-09-16 12:26:40', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(38, '100037', '', 10001, 57, 'Ankur tea 250 Gm', '../media/2023-02-04/Screenshot_2023-02-04-00-26-44-72_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 2, 2, '', 63, 0, 0, 0, 0, 126, '2023-09-27 17:07:47', '2023-09-27 17:07:47', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(39, '100037', '', 10001, 12, 'Patanjali cow ghee 1 Ltr ', '../media/2023-02-01/Screenshot_2023-02-01-19-49-24-66_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 640, 0, 0, 0, 0, 640, '2023-09-27 17:07:47', '2023-09-27 17:07:47', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(40, '100037', '', 10001, 222, 'Gold Flake small', '../media/2023-02-12/Screenshot_2023-02-10-13-17-33-90_965bbf4d18d205f782c6b8409c5773a4~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 2, 2, '', 90, 0, 0, 0, 0, 180, '2023-09-27 17:07:47', '2023-09-27 17:07:47', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(41, '100038', '', 10001, 12, 'Patanjali cow ghee 1 Ltr ', '../media/2023-02-01/Screenshot_2023-02-01-19-49-24-66_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 640, 0, 0, 0, 0, 640, '2023-09-27 22:40:14', '2023-09-27 22:40:14', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(42, '100039', '', 10001, 43, 'Maida pkt 500g', '../media/2023-04-15/Screenshot_2023-04-15-16-45-07-44_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 25, 0, 0, 0, 0, 25, '2023-09-27 23:22:43', '2023-09-27 23:22:43', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(43, '100039', '', 10001, 21, 'Surf excel surf 1 kg', '../media/2023-02-02/Screenshot_2023-02-02-00-24-02-49_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 122, 0, 0, 0, 0, 122, '2023-09-27 23:22:43', '2023-09-27 23:22:43', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(44, '100039', '', 10001, 58, 'Nova tea 250 gm', '../media/2023-02-04/Screenshot_2023-02-04-00-31-18-50_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 84, 0, 0, 0, 0, 84, '2023-09-27 23:22:43', '2023-09-27 23:22:43', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(45, '100039', '', 10001, 32, 'Rajdhani Besan 500 Gm', '../media/2023-02-02/Screenshot_2023-02-01-23-36-50-89_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 45, 0, 0, 0, 0, 45, '2023-09-27 23:22:43', '2023-09-27 23:22:43', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(46, '100039', '', 10001, 19, 'Patanjali dant kanti toothpaste 100 gm ', '../media/2023-02-01/Screenshot_2023-02-01-20-51-36-79_d4e8097ba36c48a408135806b3f44b78~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 52, 0, 0, 0, 0, 52, '2023-09-27 23:22:43', '2023-09-27 23:22:43', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(47, '100040', '', 10001, 12, 'Patanjali cow ghee 1 Ltr ', '../media/2023-02-01/Screenshot_2023-02-01-19-49-24-66_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 1, '', 640, 0, 0, 0, 0, 640, '2023-09-30 08:43:15', '2023-10-07 02:48:14', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', ''),
(48, '100040', '', 10001, 47, 'Babaji mustard oil 5 ltr', '../media/2023-02-03/Screenshot_2023-01-29-10-00-08-45_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'Size :  | Color :  | Eggless :  | MSG : ', 1, 2, '', 590, 0, 0, 0, 0, 590, '2023-09-30 08:43:15', '2023-10-07 02:48:14', '', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `pincode`
--

CREATE TABLE `pincode` (
  `pincode` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `shippingfee` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pincode`
--

INSERT INTO `pincode` (`pincode`, `name`, `shippingfee`) VALUES
(110030, 'Paryavaran complex/ saidulajab ', 0),
(462420, 'Bhopal', 100);

-- --------------------------------------------------------

--
-- Table structure for table `popularprod`
--

CREATE TABLE `popularprod` (
  `sno` int(11) NOT NULL,
  `prodid` int(11) NOT NULL,
  `prodname` varchar(300) NOT NULL,
  `orderid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `popularprod`
--

INSERT INTO `popularprod` (`sno`, `prodid`, `prodname`, `orderid`) VALUES
(9, 46, 'Babaji mustard oil 1 ltr', 0),
(10, 261, 'Maanik kachi ghani mustard oil 1 ltr', 0),
(11, 10, 'Fortune Mustard oil 1 Ltr', 0),
(12, 7, 'Fortune Soyabean oil 1 ltr', 0),
(13, 116, 'Atta Bag 10 kg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `popular_product`
--

CREATE TABLE `popular_product` (
  `id` int(11) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `popular_product`
--

INSERT INTO `popular_product` (`id`, `product_id`, `type`, `created_at`) VALUES
(1, '12', 'New', '2023-09-16 04:09:11'),
(2, '14', 'New', '2023-09-11 05:13:00'),
(3, '21', 'New', '2023-09-16 04:09:27'),
(4, '14', 'Offers', '2023-09-11 05:13:05'),
(5, '22', 'Offers', '2023-09-16 04:10:20'),
(6, '31', 'Offers', '2023-09-16 04:10:25'),
(7, '23', 'Popular', '2023-09-16 04:10:34'),
(8, '32', 'Popular', '2023-09-16 04:10:37'),
(9, '19', 'Popular', '2023-09-16 04:10:41'),
(10, '18', 'Recommended', '2023-09-16 04:10:45'),
(11, '43', 'New', '2023-09-16 04:10:48'),
(12, '101', 'New', '2023-09-16 04:10:50'),
(13, '58', 'Recommended', '2023-09-16 04:10:45'),
(14, '57', 'New', '2023-09-16 04:10:48'),
(15, '54', 'New', '2023-09-16 04:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(300) NOT NULL,
  `prod_stock` int(11) NOT NULL,
  `prod_brand_id` int(11) NOT NULL,
  `prod_cat_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_stock`, `prod_brand_id`, `prod_cat_id`, `status`) VALUES
(1, 'Mahakosh Refined Soyabean Oil Pouch', 2, 1, 37, 'active'),
(2, 'Saffola Gold Refined Cooking oil', 3, 1, 17, 'inactive'),
(3, 'BORGES Extra Light Olive Oil Plastic Bottle', 3, 1, 17, 'inactive'),
(4, 'Multi grain atta ', 30, 1, 4, 'inactive'),
(6, 'Harpic ', 10, 2, 26, 'inactive'),
(7, 'Fortune Soyabean oil 1 ltr', 16, 15, 37, 'active'),
(287, 'Tata tea premium 250g', 4, 26, 50, 'active'),
(9, 'Raag gold palmolein oil 1 ltr ', 0, 15, 37, 'active'),
(10, 'Fortune Mustard oil 1 Ltr ', 11, 15, 37, 'active'),
(263, 'Good Knight Gold flash Refill 45 ml', 5, 42, 55, 'active'),
(12, 'Patanjali cow ghee 1 Ltr ', 1, 18, 38, 'active'),
(313, 'Milkfood Desi ghee 1 Ltr ', 1, 18, 38, 'active'),
(17, 'Madhusudhan Desi ghee 1 Ltr ', 1, 18, 38, 'active'),
(18, 'Rizolo Rice bran oil 1 Ltr ', 5, 15, 37, 'active'),
(19, 'Patanjali dant kanti toothpaste 100 gm ', 12, 19, 39, 'active'),
(20, 'Patanjali dant kanti  toothpaste 200 Gm', 6, 19, 39, 'active'),
(21, 'Surf excel surf 1 kg', 10, 11, 41, 'active'),
(22, 'Fena Detergent powder 1 Kg', 25, 11, 41, 'active'),
(23, 'Rin Detergent powder 1 Kg ', 3, 11, 41, 'active'),
(24, 'Tide detergent powder 1 Kg Rose Jasmine ', 6, 11, 41, 'active'),
(26, 'Surf excel Detergent Bar 250 Gm', 10, 12, 42, 'active'),
(28, 'Fena Detergent Bar (140g × 4 pcs)', 20, 12, 42, 'active'),
(29, 'Ghadi Detergent Bar(10rs × 10pc)', 3, 12, 42, 'active'),
(30, 'AASHIRVAAD Atta 5 kg', 2, 21, 43, 'active'),
(31, 'Rajdhani Dalia 500 gm', 10, 21, 43, 'active'),
(32, 'Rajdhani Besan 500 Gm', 10, 21, 43, 'active'),
(33, 'Maggi(14 rs × 10 pc)', 10, 22, 44, 'active'),
(35, 'Yippee noodle (12 rs × 10 pc)', 2, 22, 44, 'active'),
(36, 'Tops Plain noodle 300 Gm', 2, 22, 44, 'active'),
(41, 'Dairy milk chocolate 123 gm', 3, 23, 45, 'active'),
(42, 'Haldirams Navrattan namkeen 400 Gm', 0, 24, 48, 'active'),
(43, 'Maida pkt 500g', 10, 21, 43, 'active'),
(44, 'Sooji pkt 500 g', 10, 21, 43, 'active'),
(317, 'Babaji mustard oil 1 ltr', 12, 15, 37, 'active'),
(47, 'Babaji mustard oil 5 ltr', 2, 15, 37, 'active'),
(48, 'Lijjat Punjabi masala papad 200 gm', 3, 22, 44, 'active'),
(50, 'Kaju mixture haldirams 200 gm', 1, 24, 48, 'active'),
(51, 'Khatta meetha haldirams 400 gm ', 1, 24, 48, 'active'),
(53, 'Hamdard Honey 500 gm', 2, 25, 63, 'active'),
(54, 'Tata tea premium (100g×3pcs) ', 5, 26, 50, 'active'),
(55, 'Taaza tea 250 Gm', 5, 26, 50, 'active'),
(56, 'Red label tea (100g × 3pcs)', 3, 26, 50, 'active'),
(57, 'Ankur tea 250 Gm', 10, 26, 50, 'active'),
(58, 'Nova tea 250 gm', 5, 26, 50, 'active'),
(59, 'Tata tea gold 500 gm', 0, 26, 50, 'active'),
(61, 'Bajaj Almond hair oil 285 ML ', 5, 27, 52, 'active'),
(62, 'Parachute Coconut hair oil 100 Ml', 10, 27, 52, 'active'),
(63, 'Parachute Coconut hair oil 500 Ml', 4, 27, 52, 'active'),
(64, 'Parachute Jasmine hair oil 190 Ml', 5, 27, 52, 'active'),
(65, 'Navratna Ayurvedic Cool Hair Oil 500 ml', 2, 27, 52, 'active'),
(66, 'Hair and care Hair oil 200 Ml', 6, 27, 52, 'active'),
(67, 'Kesh King Ayurvedic hair oil 100 Ml', 2, 27, 52, 'active'),
(68, 'Haldirams macaroni 450 gm ', 3, 22, 44, 'active'),
(69, 'Vermicelli (semai)Agastya 450 Gm', 3, 22, 44, 'active'),
(70, 'Fusilli pasta Agastya 450 Gm', 3, 22, 44, 'active'),
(71, 'Baidyanath chyawanprash 1 kg', 2, 28, 53, 'active'),
(73, 'Quaker Oats 1 kg', 2, 28, 53, 'active'),
(74, 'Kelloggs Muesli fruit and nut 500 Gm', 0, 28, 53, 'active'),
(75, 'Horlicks classic malt 1 kg', 1, 28, 53, 'active'),
(76, 'Cadbury Bournvita 1 kg', 2, 28, 53, 'active'),
(77, 'Cadbury Bournvita 500 gm', 2, 28, 53, 'active'),
(78, 'Kissan Peanut Butter crunchy 920 gm ', 1, 28, 53, 'active'),
(80, 'Ezee detergent liquid 1 kg', 2, 11, 41, 'active'),
(81, 'Lotte choco pie 18 pcs Box', 0, 29, 54, 'active'),
(82, 'Trishul White Phenyl 1 Ltr ', 10, 42, 55, 'active'),
(83, 'Nilons Rajasthani green chilli 800 g', 1, 31, 56, 'active'),
(84, 'Nilons Rajasthani Mixed pickle 800 gm', 1, 31, 56, 'active'),
(85, 'Tops mixed pickle 900 gm', 1, 31, 56, 'active'),
(87, 'Kissan tomato ketchup 1.2 kg', 1, 32, 56, 'active'),
(88, 'Rajdhani chana sattu 500 gm', 2, 21, 43, 'active'),
(90, 'Colgate zigzag Medium brush 1 pcs ', 6, 19, 39, 'active'),
(91, 'Dabur red paste 200 gm', 3, 19, 39, 'active'),
(92, 'Everest Turmeric powder 200 gm', 20, 33, 57, 'active'),
(95, 'Mdh garam masala 100 gm', 5, 33, 57, 'active'),
(97, 'Mdh Deggi mirch 100 gm', 3, 33, 57, 'active'),
(99, 'Mdh white pepper powder 100 gm', 2, 33, 57, 'active'),
(100, 'Everest Garam masala 100 gm ', 5, 33, 57, 'active'),
(101, 'Everest jeera powder 100 gm', 5, 33, 57, 'active'),
(102, 'Everest chaat masala 50 gm', 10, 33, 57, 'active'),
(103, 'Everest hingraj powder 50 gm', 5, 33, 57, 'active'),
(104, 'Fard date crown 500 gm', 1, 28, 53, 'active'),
(105, 'Tops cornflakes 500 g pouch', 1, 28, 53, 'active'),
(106, 'Dettol Original soap 75 g × 5 pcs', 3, 16, 58, 'active'),
(107, 'Dettol Original soap 125 g × 5 pcs', 3, 16, 58, 'active'),
(108, 'Dove soap 75 g × 3 pcs ', 4, 16, 58, 'active'),
(109, 'Lifebuoy total soap 125g × 5 pcs', 4, 16, 58, 'active'),
(110, 'Santoor soap 100g×4pcs haldi chandan ', 3, 16, 58, 'active'),
(111, 'Margo soap 100g × 5 pcs', 3, 16, 58, 'active'),
(112, 'Lux soap pink 100g × 5 pcs', 5, 16, 58, 'active'),
(113, 'Godrej no 1 100g×5 haldi chandan ', 3, 16, 58, 'active'),
(114, 'Godrej no 1 lime 100g × 5', 3, 16, 58, 'active'),
(115, 'Vivel soap 100g×4 Aloe vera.', 1, 16, 58, 'active'),
(116, 'Atta Bag 10 kg', 5, 21, 43, 'active'),
(117, 'Hit red 200 ml ', 3, 42, 55, 'active'),
(118, 'Amul butter 100 g', 10, 34, 59, 'active'),
(120, 'Pampers L 1pkt = 2 pcs', 8, 34, 59, 'active'),
(121, 'Pampers s 1pkt=2 pcs', 16, 34, 59, 'active'),
(122, 'India gate feast rozzana 1 kg rice ', 4, 17, 60, 'active'),
(124, 'Dettol Antiseptic Liquid 250 ml', 3, 36, 62, 'active'),
(308, 'India gate dubar rice basmati 1 kg', 5, 17, 60, 'active'),
(126, 'Cinthol lime soap 100g×4pcs', 3, 16, 58, 'active'),
(127, 'Dairy milk silk fruit and nut 137 g', 1, 23, 45, 'active'),
(128, 'Dairy milk silk Bubbly 120 g', 1, 23, 45, 'active'),
(129, 'Dairy milk chocolate 50 g', 5, 23, 45, 'active'),
(152, 'Mangaldeep Rose agarbatti 76 stick ', 3, 37, 31, 'active'),
(151, 'Mangaldeep sandal agarbatti 72 stick', 6, 37, 31, 'active'),
(150, 'Zed Black agarbatti 100 g', 6, 37, 31, 'active'),
(149, 'Nilons ginger garlic paste 200 g', 5, 32, 56, 'active'),
(148, 'Savlon Glycerin soap 125g × 4pcs', 3, 16, 58, 'active'),
(147, 'Nilons Rajasthani Mango 900 g', 1, 31, 56, 'active'),
(146, 'Pears soap 75g × 4 pcs ', 2, 16, 58, 'active'),
(153, 'Cycle 3 in 1 agarbatti 97 g', 6, 37, 31, 'active'),
(154, 'Mangaldeep Bouquet agarbatti 76 stick ', 2, 37, 31, 'active'),
(155, 'Whisper choice ultra XL 6 Pad', 6, 36, 62, 'active'),
(156, 'Whisper choice XL 6 Pad ', 30, 36, 62, 'active'),
(157, 'Stayfree Secure XL 6 Pad ', 5, 36, 62, 'active'),
(158, 'Mishri dana prasad 250 g', 20, 37, 31, 'active'),
(159, 'Loose Basmati rice 6 no tuta - 1 kg', 30, 17, 60, 'active'),
(160, 'Loose White sella rice 1 kg', 30, 17, 60, 'active'),
(161, 'Loose golden sella Double chabi 1 kg', 5, 17, 60, 'active'),
(162, 'Loose Sona masoori Basmati rice 1 kg', 30, 17, 60, 'active'),
(163, 'Loose  Madhumati basmati rice 1 kg', 30, 17, 60, 'active'),
(164, 'Loose Royal Biryani Basmati rice 1 kg ', 30, 17, 60, 'active'),
(165, 'Raisin / kismis Gol dana 250 g', 10, 25, 63, 'active'),
(167, 'Cashew Nuts/Kaju 250g W-320 loose', 10, 25, 63, 'active'),
(169, 'Almond/Badam California 250g loose', 8, 25, 63, 'active'),
(171, 'Walnut/Akhrot kernels vacuum pack 250g', 2, 25, 63, 'active'),
(173, 'Supari piece 250 g', 4, 39, 36, 'active'),
(174, 'Sugar pkt 1 kg', 0, 21, 43, 'active'),
(175, 'Saraswati camphor 1 box= 20 tablet ', 5, 37, 31, 'active'),
(176, 'Mishri dana prasad 1 kg ', 5, 37, 31, 'active'),
(177, 'Kissan mixed fruit jam 500 g', 3, 28, 53, 'active'),
(178, 'Dabur Amal Hair oil 275 ml', 4, 27, 52, 'active'),
(179, 'Indulekha bringha hair oil 50 ml', 0, 27, 52, 'active'),
(180, 'Himalaya neem face wash 100 ml', 2, 40, 65, 'active'),
(181, 'Clean and clear oil free face wash 50 ml', 5, 40, 65, 'active'),
(182, 'Parle melody candy 371 g', 4, 23, 45, 'active'),
(183, 'Jeera sabut shiv pujari 100 g', 20, 38, 64, 'active'),
(184, 'Makhana 250 g', 3, 25, 63, 'active'),
(186, 'Masoor/Malka unpolished dal 1 kg loose', 10, 13, 61, 'active'),
(316, 'Sabji masala Everest 100g', 10, 33, 57, 'active'),
(188, 'Arhar/Toor unpolished dal 1 kg  loose', 9, 13, 61, 'active'),
(190, 'Chana dal 1 kg loose', 10, 13, 61, 'active'),
(192, 'Kala chana 1 kg loose', 10, 13, 61, 'active'),
(194, 'Moong chilka tuta 1 kg ', 5, 13, 61, 'active'),
(195, 'Urad chilka tuta 500 g', 10, 13, 61, 'active'),
(196, 'Urad chilka tuta 1 kg', 5, 13, 61, 'active'),
(197, 'Razma chitra 500 g', 10, 13, 61, 'active'),
(198, 'Razma chitra 1 kg', 10, 13, 61, 'active'),
(315, 'Kashmiri mirch powder Everest 100g', 2, 33, 57, 'active'),
(200, 'Moong pila 1 kg', 10, 13, 61, 'active'),
(201, 'Ajwain 100 g loose', 10, 38, 64, 'active'),
(202, 'Soaf moti 100 g loose', 10, 38, 64, 'active'),
(203, 'Kali mirch 100 g', 10, 38, 64, 'active'),
(204, 'Long 100 g', 10, 38, 64, 'active'),
(205, 'Red bull Energy Drink 250 ml', 10, 41, 66, 'active'),
(206, 'Sting Energy Drink 250 ml', 30, 41, 66, 'active'),
(207, 'Exo Dishwash tub bar 500 g ', 5, 20, 40, 'active'),
(208, 'Vim Dishwash bar 90g×4(3+1)', 20, 20, 40, 'active'),
(209, 'Kali sarso 250 g', 8, 38, 64, 'active'),
(210, 'Pila sarso 250 g', 8, 38, 64, 'active'),
(211, 'Methi dana 250 g', 10, 38, 64, 'active'),
(212, 'Sabudana 250 g', 10, 38, 64, 'active'),
(213, 'Sabudana 1 kg', 5, 38, 64, 'active'),
(214, 'Safed til 250 g', 4, 38, 64, 'active'),
(215, 'Safed til 1 kg', 1, 38, 64, 'active'),
(216, 'Imli 100 g', 10, 38, 64, 'active'),
(217, 'Scotch brite silver sparks 15rs ', 20, 20, 40, 'active'),
(218, 'Scotch brite sponge scrub 35rs', 5, 20, 40, 'active'),
(219, 'Tops Tomato ketchup 900g', 2, 32, 56, 'active'),
(220, 'Peanut 250g', 4, 25, 63, 'active'),
(221, 'Peanut 1 kg', 4, 25, 63, 'active'),
(222, 'Gold Flake small', 50, 39, 36, 'active'),
(223, 'Gold Flake king ', 50, 39, 36, 'active'),
(224, 'Marlboro advance small ', 20, 39, 36, 'active'),
(225, 'Marlboro advance big 20pcs', 10, 39, 36, 'active'),
(226, 'Classic Regular 20 pcs', 10, 39, 36, 'active'),
(227, 'Classic mild 20 pcs', 10, 39, 36, 'active'),
(228, 'Classic ice Burst 20 pcs', 10, 39, 36, 'active'),
(229, 'Classic ultra mild 20 pcs', 10, 39, 36, 'active'),
(230, 'Tata Tea Elaichi  250 g', 6, 26, 50, 'active'),
(232, 'Posto dana(khus khus) 100g  loose', 4, 38, 64, 'active'),
(233, 'Tata tea Agni 250 g', 10, 26, 50, 'active'),
(234, 'Tops Mango pickle 900g', 1, 31, 56, 'active'),
(236, 'Dettol Original Hand wash 675 ml', 2, 40, 65, 'active'),
(237, 'Godrej expert Natural black 1 kit', 8, 40, 65, 'active'),
(239, 'Dabur red paste 200+100+toothbrush ', 2, 19, 39, 'active'),
(240, 'Cherry  blossom black 40g ', 1, 40, 65, 'active'),
(241, 'Cherry liquid shoe polish Black 75 ml', 1, 40, 65, 'active'),
(288, 'Tops white vinegar 180ml', 4, 32, 56, 'active'),
(244, 'Mdh Kali mirch powder 100 gm ', 2, 33, 57, 'active'),
(245, 'Everest Chhole masala 50 g ', 4, 33, 57, 'active'),
(246, 'Colgate strong teeth 200 g toothpaste ', 3, 19, 39, 'active'),
(247, 'Lipton green tea 25 tea bag', 2, 26, 50, 'active'),
(248, 'Amulspray 500g', 2, 34, 59, 'active'),
(249, 'Eveready Battery AA 1 pcs', 10, 42, 55, 'active'),
(250, 'Eveready Battery AAA 1 pcs', 10, 42, 55, 'active'),
(251, 'Good day Butter Britannia 10 rs×6pcs', 10, 29, 54, 'active'),
(252, 'Marie gold biscuits 10rs×6 pcs', 10, 29, 54, 'active'),
(253, 'Oreo Vanilla Biscuits 10rs × 12 pc', 5, 29, 54, 'active'),
(255, 'Mangaldeep 3 in 1 agarbatti 102g', 3, 37, 31, 'active'),
(256, 'Mangaldeep sandal Dhoop 20 bati', 12, 37, 31, 'active'),
(257, 'Mangaldeep Rose Dhoop 20 bati ', 12, 37, 31, 'active'),
(258, 'Olive pomace oil 1 ltr (oleev)', 2, 15, 37, 'active'),
(262, 'Good Knight Gold flash combo ', 5, 42, 55, 'active'),
(260, 'Loose Laxmi basmati rice 1 kg ', 26, 17, 60, 'active'),
(278, 'Lizol citrus 500 ml', 1, 42, 55, 'active'),
(264, 'Harpic 1 ltr original ', 0, 42, 55, 'active'),
(266, 'Mortein coil ', 15, 42, 55, 'active'),
(271, 'Anjeer 250 g', 1, 25, 63, 'active'),
(273, 'Real mixed fruit juice 1 ltr', 5, 41, 66, 'active'),
(275, 'Woosh detergent powder 1 kg', 4, 11, 41, 'active'),
(314, 'Brown rice Dawat 1 kg', 4, 17, 60, 'active'),
(277, 'Oral B criss cross brush soft ', 3, 19, 39, 'active'),
(279, 'Impact Detergent powder 1 kg (free bar 10rs)', 5, 11, 41, 'active'),
(280, 'Nip Dishwash 5 Rs × 10 pcs', 10, 20, 40, 'active'),
(281, 'Sugar loose 1 kg', 10, 21, 43, 'active'),
(282, 'Horlicks classic malt 500 g', 2, 28, 53, 'active'),
(283, 'Macroni loose 1 kg', 5, 21, 43, 'active'),
(285, 'Roohafza hamdard 750 ml', 10, 41, 66, 'active'),
(286, 'Digestive biscuits nutri choice 100g ', 10, 29, 54, 'active'),
(289, 'Tops green chilli sauce 200 g', 2, 32, 56, 'active'),
(290, 'Tops Red chilli sauce 200g', 3, 32, 56, 'active'),
(291, 'Tops Dark soya sauce 200 ml', 3, 32, 56, 'active'),
(292, 'Tops Mango pickle 200g', 1, 32, 56, 'active'),
(293, 'Tops mixed pickle 200g', 1, 32, 56, 'active'),
(294, 'Tops lime pickle 200g', 1, 32, 56, 'active'),
(295, 'Madhusudhan paneer 200g', 0, 34, 59, 'active'),
(296, 'Glucon D orange 1 kg ', 2, 41, 66, 'active'),
(297, 'Hell Energy Drink 250ml', 10, 41, 66, 'active'),
(298, 'Glucon D orange 450 g', 2, 41, 66, 'active'),
(300, 'Poha Mota loose 1 kg ', 5, 21, 43, 'active'),
(301, 'Poha pkt 500 g Mk', 10, 21, 43, 'active'),
(302, 'Kanodia mustard oil 1 ltr', 5, 15, 37, 'active'),
(303, 'Singhada atta 250 g ', 8, 21, 43, 'active'),
(304, 'Kuttu atta 250 g', 0, 21, 43, 'active'),
(305, 'Samak rice (Brat rice) 250 g', 6, 21, 43, 'active'),
(306, 'Loose White sella 36rs kg ', 30, 17, 60, 'active'),
(307, 'Loose Basmati rice 35 rs kg tuta', 30, 17, 60, 'active'),
(309, 'Comfort 860 ml', 1, 12, 55, 'active'),
(310, 'Glow and lovely 50 g', 1, 40, 65, 'active'),
(311, 'Liril lime soap 125g×4pcs', 1, 16, 58, 'active'),
(319, 'Test Product', 100, 16, 43, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE `productdetails` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(300) NOT NULL,
  `prod_desc` text NOT NULL,
  `prod_fulldetail` text NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `short_ar` text NOT NULL,
  `desc_ar` text NOT NULL,
  `prod_mrp` float NOT NULL,
  `prod_price` float NOT NULL,
  `cgst` float NOT NULL,
  `sgst` float NOT NULL,
  `igst` float NOT NULL,
  `shipping` float NOT NULL,
  `hsn_code` varchar(50) NOT NULL,
  `w_price` float NOT NULL,
  `w_qty` int(11) NOT NULL,
  `other_attribute` text NOT NULL,
  `stock` int(11) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `prod_rating` int(11) NOT NULL,
  `prod_rating_count` int(11) NOT NULL,
  `prod_img_url` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `create_by` date NOT NULL,
  `update_by` date NOT NULL,
  `coins` int(11) NOT NULL,
  `discount_coins` int(11) NOT NULL,
  `pricearray` text NOT NULL,
  `displaystock` int(11) NOT NULL,
  `sellername` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prod_remark` varchar(200) NOT NULL,
  `freeship` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`prod_id`, `prod_name`, `prod_desc`, `prod_fulldetail`, `name_ar`, `short_ar`, `desc_ar`, `prod_mrp`, `prod_price`, `cgst`, `sgst`, `igst`, `shipping`, `hsn_code`, `w_price`, `w_qty`, `other_attribute`, `stock`, `unit`, `prod_rating`, `prod_rating_count`, `prod_img_url`, `cat_id`, `brand_id`, `review_id`, `create_by`, `update_by`, `coins`, `discount_coins`, `pricearray`, `displaystock`, `sellername`, `prod_remark`, `freeship`) VALUES
(1, 'Mahakosh Refined Soyabean Oil Pouch', 'Soyabean Oil', 'Soyabean Oil\nQuantity\n1 L\nUsed For\nCooking\nProcessing Type\nRefined\nMaximum Shelf Life\n9 Months\nFood Preference\nVegetarian\nDietary Preference\nNo Cholesterol\nContainer Type\nPouch\nOrganic\nNo', '', '', '', 299, 199, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 4, '', 4, 1, '[{\"id\":\"1\",\"url\":\"2022-12-28/-original-imagahyvptejcgum.png\"},{\"id\":2,\"url\":\"2022-12-28/-original-imagahyv8ap4sfaa.png\"},{\"id\":3,\"url\":\"2022-12-28/-original-imagahyv3z9adzve.png\"}]', 37, 1, 2, '2022-12-28', '2023-01-09', 0, 0, '[]', 0, '', '', 0),
(2, 'Saffola Gold Refined Cooking oil', 'Blended Rice Bran & Corn oil, Helps Keep Heart Healthy Blended Oil Pouch  (4 x 1 L)', 'We understand that your familys health and your health is ever so important to you. You constantly look for simple ways to keep everyone healthy by looking for healthier foods and for healthier ingredients in your meals. When it comes to ingredients, it is important to choose the right cooking oil, since it is part of most of the meals we cook. The right cooking oil is one that is not just health but heart healthy. Choose Saffola Gold, it is better for you because it is better for your heart. This multisource edible oil comes with the Power of 3 that includes 15% more Oryzanol that helps manage cholesterol, Triple Antioxidant system that helps improve immunity and a good balance of healthy fats, MUFA & PUFA. Saffola Gold cooking oil comes with LOSORB technology which results in lesser oil absorption in food. Saffola encourages you to follow a balanced diet & active lifestyle. *As compared to commonly consumed cooking oils; basis frying studies on potato, 2022.', '', '', '', 999, 699, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 0, '', 0, 0, '[{\"url\":\"2022-12-28/4-gold-refined-cooking-oil-blended-rice-bran-corn-oil-helps-keep-original-imagfyagjkhjdsk4.png\"},{\"url\":\"2022-12-28/3-refined-cooking-oil-blend-of-rice-bran-sunflower-oil-helps-original-imag99g63rzfatqd.png\"}]', 17, 1, 0, '2022-12-28', '2023-01-09', 0, 0, '[]', 0, '', '', 0),
(3, 'BORGES Extra Light Olive Oil Plastic Bottle', 'Borges Olive Oil for Indian Cooking – The Mild & Versatile Olive Oil for Indian Cooking.', 'Borges Olive Oil for Indian Cooking – The Mild & Versatile Olive Oil for Indian Cooking. It has a neutral taste of olives. Specially crafted by Borges for the Indian market so that our favourite Indian dishes can be cooked in Olive oil and yet retains the original flavour of your food. The oil has a high smoking point, which makes it ideal for deep frying, and sautéing making it suitable for Indian style of high-heat cooking.\n', '', '', '', 1499, 1299, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 1, '[{\"id\":2,\"url\":\"2022-12-28/2-extra-light-plastic-bottle-1-olive-oil-borges-original-imagg574rh9mdvfb.png\"}]', 17, 1, 1, '2022-12-28', '2023-01-24', 0, 0, '[]', 0, '', '', 0),
(4, 'Multi grain atta ', 'aashirvaad atta multi grain', 'At AASHIRVAAD, extra care is taken to keep things as natural as possible. The way Mother Nature intended for them to be. In our quest to provide you wholesome goodness, whole wheat grains are sourced, directly from the farmers.\n\nAASHIRVAAD Whole Wheat Atta was launched on 27th May 2002 and now has become the number one in branded packaged atta across the country.\n\nAASHIRVAAD Whole Wheat Atta is made from the grains which are heavy on the palm, golden amber in colour and hard in bite. It is carefully ground using modern \'chakki - grinding\' process which ensures that AASHIRVAAD Atta contains 0% Maida and is 100% Sampoorna Atta. Thus we ensure you get superior chakki atta, through our 4 Step Advantage process of sourcing, cleaning, grinding and nutrition lockage.\n\nBy ensuring that all the nutrients of the grain stay intact and protected in our packaging, we deliver the freshness of the fields combined with the power of the whole wheat.\n\nThe dough made from AASHIRVAAD Atta absorbs more water, hence rotis remain softer for longer. This means you serve soft, fluffy rotis to your family which powers them through their day!', '', '', '', 420, 370, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 385, '[{\"id\":\"1\",\"url\":\"2022-12-31/aata-2.jpeg\"}]', 4, 1, 0, '2022-12-31', '2022-12-31', 0, 0, '[{\"attrnam\":\"1Kg\",\"attrvalue\":\"195\",\"attrstockvalue\":0,\"attrmrpvalue\":\"200\",\"attrimage\":[{\"id\":0,\"url\":\"2022-12-31\\/aata-2.jpeg\"}],\"attrskuvalue\":\"\"},{\"attrnam\":\"5kg\",\"attrvalue\":\"1100\",\"attrstockvalue\":\"2\",\"attrmrpvalue\":\"1200\",\"attrimage\":[{\"id\":2,\"url\":\"2022-12-31\\/aata-5.jpeg\"}],\"attrskuvalue\":\"\"}]', 0, '', 'Best quality product', 0),
(6, 'Harpic ', 'Fhgcc', 'Dhhccx', '', '', '', 100, 50, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 9, '', 0, 0, '[{\"url\":\"2023-01-03/Screenshot_2023-01-01-01-10-58-65_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 26, 2, 0, '2023-01-03', '2023-01-24', 0, 0, '[]', 0, '', '', 0),
(7, 'Fortune Soyabean oil 1 ltr', 'Soyabean oil', 'Fortune Soya Health Oil is certified as India\'s No 1 cooking oil* and is processed with next gen High Absorbent Refining Technology (H.A.R.T.) that makes it a safe & pure healthy oil. It makes your bones stronger and is also rich in omega 3 which keeps your heart healthy.', '', '', '', 170, 118, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 16, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-01/Screenshot_2023-01-28-16-30-54-14_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 37, 15, 0, '2023-02-01', '2023-05-19', 0, 0, '[]', 0, '', '', 0),
(288, 'Tops white vinegar 180ml', 'Tops white vinegar 180ml', 'Tops white vinegar 180ml', '', '', '', 40, 33, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 4, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-15/Screenshot_2023-03-15-15-37-23-68_680d03679600f7af0b4c700c6b270fe7~3.jpg\"}]', 56, 32, 0, '2023-03-15', '2023-03-15', 0, 0, '[]', 0, '', '', 0),
(9, 'Raag gold palmolein oil 1 ltr ', 'Raag gold palmolein oil', 'Description; Raag Gold Palmolein Oil (Pouch) Palm oil is extracted from the flesh of the fruit of Elaeis Guineensis using pressure. Palm oil is used for shallow and deep-frying in Indian kitchens. The oil is semi-solid at room temperature and is highly resistant to oxidation and prolonged exposure.', '', '', '', 130, 110, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 0, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-01/Screenshot_2023-01-29-16-14-32-15_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 37, 15, 0, '2023-02-01', '2023-05-19', 0, 0, '[]', 0, '', '', 0),
(10, 'Fortune Mustard oil 1 Ltr ', 'Mustard oil ', 'Fortune Premium Kachi Ghani Pure Mustard Oil, traditionally extracted from the first press of mustard seeds, comes with a high pungency level and strong aroma. Being pure, our cooking oil retains its natural properties and mustard oil benefits. Its strong aroma and pungency will spice up your cooking.', '', '', '', 185, 130, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 11, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-01/Screenshot_2023-01-28-21-39-01-23_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 37, 15, 0, '2023-02-01', '2023-05-19', 0, 0, '[]', 0, '', '', 0),
(264, 'Harpic 1 ltr original ', 'Harpic 1 ltr original ', 'Harpic 1 ltr original ', '', '', '', 195, 170, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 0, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-23/Screenshot_2023-02-22-16-48-31-15_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 55, 42, 0, '2023-02-22', '2023-05-19', 0, 0, '[]', 0, '', '', 0),
(12, 'Patanjali cow ghee 1 Ltr ', 'Cow ghee ', 'Patanjali Cow Ghee is full of nutritive properties and an ideal diet. Cow ghee increases memory, intellect, the power of digestion, Ojas, Kapha and fat. Regular consumption of ghee or inclusion of ghee as part of the diet, is recommended for those seeking weight gain.', '', '', '', 665, 640, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-01/Screenshot_2023-02-01-19-49-24-66_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 38, 18, 0, '2023-02-01', '2023-04-10', 0, 0, '[]', 0, '', '', 0),
(263, 'Good Knight Gold flash Refill 45 ml', 'Good Knight Gold flash Refill 45 ml', 'Good Knight Gold flash Refill 45 ml', '', '', '', 70, 65, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-22/Screenshot_2023-02-22-17-05-52-98_d4e8097ba36c48a408135806b3f44b78~2.jpg\"}]', 55, 42, 0, '2023-02-22', '2023-04-10', 0, 0, '[]', 0, '', '', 0),
(287, 'Tata tea premium 250g', 'Tata tea premium 250g', 'Tata tea premium 250g', '', '', '', 130, 120, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 4, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-15/Screenshot_2023-03-15-11-37-36-38_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 50, 26, 0, '2023-03-15', '2023-03-15', 0, 0, '[]', 0, '', '', 0),
(313, 'Milkfood Desi ghee 1 Ltr ', 'Milkfood Desi ghee 1 Ltr ', 'Milkfood Desi ghee 1 Ltr ', '', '', '', 650, 540, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-27/Screenshot_2023-03-27-15-20-58-15_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 38, 18, 0, '2023-03-27', '2023-04-10', 0, 0, '[]', 0, '', '', 0),
(316, 'Sabji masala Everest 100g', 'Sabji masala Everest 100g', 'Sabji masala Everest 100g', '', '', '', 64, 54, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-04-12/Screenshot_2023-04-12-10-36-43-17_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 57, 33, 0, '2023-04-12', '2023-04-12', 0, 0, '[]', 0, '', '', 0),
(17, 'Madhusudhan Desi ghee 1 Ltr ', 'Desi ghee ', 'Desi ghee ', '', '', '', 660, 540, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-01/Screenshot_2023-02-01-20-33-57-55_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 38, 18, 0, '2023-02-01', '2023-04-17', 0, 0, '[]', 0, '', '', 0),
(18, 'Rizolo Rice bran oil 1 Ltr ', '100% Rice bran oil ', 'Rizolo Rice Bran Oil-\"Rizolo\", India\'s finest Rice Bran Oil, is a revolution in the cooking oil segment. It is a naturally healthy oil enriched with “Oryzonal” and other multiple nutrients. It is best for everyday cooking & suitable to all Indian food type. 100% rice bran oil extracted from super fine basmati rice.', '', '', '', 215, 130, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-01/Screenshot_2023-02-01-20-41-59-30_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 37, 15, 0, '2023-02-01', '2023-04-15', 0, 0, '[]', 0, '', '', 0),
(19, 'Patanjali dant kanti toothpaste 100 gm ', 'Toothpaste ', 'Product description Patanjali dant kanti toothpaste is herbal toothpaste ', '', '', '', 55, 52, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-01/Screenshot_2023-02-01-20-51-36-79_d4e8097ba36c48a408135806b3f44b78~2.jpg\"}]', 39, 19, 0, '2023-02-01', '2023-02-01', 0, 0, '[]', 0, '', '', 0),
(20, 'Patanjali dant kanti  toothpaste 200 Gm', 'Herb toothpaste ', 'Patanjali dant kanti natural toothpaste is herbal toothpaste containing herbs and ayurvedic ingredients and essential oil. It can also help to prevent and reduce pain in the gums and teeth. It provides a refreshing smell and can help people get rid of bad breath.', '', '', '', 105, 97, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 6, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-01/Screenshot_2023-01-29-16-24-17-01_d4e8097ba36c48a408135806b3f44b78~2.jpg\"}]', 39, 19, 0, '2023-02-01', '2023-02-02', 0, 0, '[]', 0, '', '', 0),
(21, 'Surf excel surf 1 kg', 'Detergent powder ', 'Surf excel is engineered with modern and path-breaking technology that offers consumer benefits such as tough stain removal, easy dissolution, superior fragrance, and more.', '', '', '', 134, 122, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-02/Screenshot_2023-02-02-00-24-02-49_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 41, 11, 0, '2023-02-01', '2023-02-01', 0, 0, '[]', 0, '', '', 0),
(22, 'Fena Detergent powder 1 Kg', 'Super wash powder ', 'Fena Superwash GermClean Detergent Powder designed to give you a premium washing experience with Rose & Chandan perfume, dirt and stain removing active ingredients, & optical brightener for dazzling whiteness.', '', '', '', 71, 63, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 25, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-02/Screenshot_2023-02-02-00-28-20-73_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 41, 11, 0, '2023-02-01', '2023-02-01', 0, 0, '[]', 0, '', '', 0),
(23, 'Rin Detergent powder 1 Kg ', 'Detergent powder ', 'Rin Detergent powder ', '', '', '', 94, 87, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-02/Screenshot_2023-02-02-00-37-25-64_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 41, 11, 0, '2023-02-01', '2023-02-01', 0, 0, '[]', 0, '', '', 0),
(24, 'Tide detergent powder 1 Kg Rose Jasmine ', 'Rose Jasmine ', 'Keep clothes looking fresh and clean with Tide Lemon & Mint Detergent Powder that ensures tough stain removal from your clothes. This detergent powder is suitable for both your whites and coloured clothes. It removes dirt from clothes, thereby removing dullness from them and leaving a pleasant fragrance.', '', '', '', 128, 112, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 6, '', 5, 0, '[{\"url\":\"2023-02-20/Screenshot_2023-02-20-17-36-10-74_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 41, 11, 0, '2023-02-01', '2023-02-20', 0, 0, '[]', 0, '', '', 0),
(26, 'Surf excel Detergent Bar 250 Gm', 'Detergent Bar ', 'Surf excel Bar combines the cleaning benefits similar to that of vinegar, blue, bleach, and lemon. Removes tough stains such as tea, coffee, turmeric, curry, ketchup and chocolate with just one product. Gentle on both your clothes and your hand. Makes your laundry easy.', '', '', '', 38, 36, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-02/Screenshot_2023-02-02-01-02-30-10_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 42, 12, 0, '2023-02-01', '2023-02-01', 0, 0, '[]', 0, '', '', 0),
(28, 'Fena Detergent Bar (140g × 4 pcs)', 'Detergent Bar ', 'Detergent Bar ', '', '', '', 38, 36, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 20, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-02/Screenshot_2023-02-02-01-14-06-62_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 42, 12, 0, '2023-02-01', '2023-02-01', 0, 0, '[]', 0, '', '', 0),
(29, 'Ghadi Detergent Bar(10rs × 10pc)', '130 gm', 'Detergent Bar ', '', '', '', 100, 90, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-02/Screenshot_2023-02-02-01-24-18-76_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 42, 12, 0, '2023-02-01', '2023-02-01', 0, 0, '[]', 0, '', '', 0),
(30, 'AASHIRVAAD Atta 5 kg', 'AttA', 'AASHIRVAAD Whole Wheat Atta is made from the grains which are heavy on the palm, golden amber in colour and hard in bite. It is carefully ground using modern \'chakki - grinding\' process which ensures that AASHIRVAAD Atta contains 0% Maida and is 100% Sampoorna Atta.', '', '', '', 236, 205, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 0, 0, '[{\"id\":\"1\",\"url\":\"2023-02-02/Screenshot_2023-02-02-01-57-20-09_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 43, 21, 0, '2023-02-01', '2023-04-15', 0, 0, '[]', 0, '', '', 0),
(31, 'Rajdhani Dalia 500 gm', 'Dalia', 'Dalia', '', '', '', 43, 29, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-02/Screenshot_2023-02-02-01-46-34-50_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 43, 21, 0, '2023-02-01', '2023-02-01', 0, 0, '[]', 0, '', '', 0),
(32, 'Rajdhani Besan 500 Gm', 'Besan', 'About the Product. Besan or Gram Flour made from ground chickpea or channa dal is a wheat-free product wealthy in fiber and nutrients.', '', '', '', 65, 45, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-02/Screenshot_2023-02-01-23-36-50-89_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 43, 21, 0, '2023-02-01', '2023-03-25', 0, 0, '[]', 0, '', '', 0),
(33, 'Maggi(14 rs × 10 pc)', 'Maggi noodle 70 gm', 'Maggi noodles are dried noodles fused with oil, and sold with a packet of flavorings. These noodles are usually eaten after being cooked in boiling water for 3 to 5 minutes or eaten straight from the packet. Just boil the water, add the tastemaker and noodles and your maggi is ready within 2 to 3 minutes', '', '', '', 140, 128, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-02/Screenshot_2023-02-02-02-18-22-41_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 44, 22, 0, '2023-02-02', '2023-02-02', 0, 0, '[]', 0, '', '', 0),
(35, 'Yippee noodle (12 rs × 10 pc)', 'Yippee noodle 60 Gm', 'Yippee noodles are India\'s only round noodle block resulting in a long slurpy noodles when cooked. Magic Masala with dehydrated vegetables is the most popular variant. Yippee noodles are 100% vegetarian with no synthetic colours used in the masala mix.', '', '', '', 120, 112, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-02/Screenshot_2023-02-02-02-36-19-00_680d03679600f7af0b4c700c6b270fe7~2.jpg\"},{\"id\":\"1\",\"url\":\"2023-02-02/Screenshot_2023-02-02-02-36-19-00_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 44, 22, 0, '2023-02-02', '2023-02-02', 0, 0, '[]', 0, '', '', 0),
(36, 'Tops Plain noodle 300 Gm', 'Tops Plain noodle ', 'Contains zero cholesterol and is free from trans fat. Contains no artificial colour and added flavours. TOPS Plain noodles don\'t become soggy & mushy when cooked. Cook the way you want with your favourite veggies & TOPS culinary Sauces.', '', '', '', 55, 48, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-02/Screenshot_2023-02-02-02-45-33-63_d4e8097ba36c48a408135806b3f44b78~2.jpg\"}]', 44, 22, 0, '2023-02-02', '2023-02-02', 0, 0, '[]', 0, '', '', 0),
(41, 'Dairy milk chocolate 123 gm', 'Cadbury Dairy Milk\'s classic milk chocolate', 'Cadbury Dairy Milk\'s classic milk chocolate combines the finest ingredients and flavours that bring the delicious taste of generosity to every slab. Each dairy milk chocolate slab has a smooth and creamy wave of deliciousness moulded into a unique chocolate taste – a treasured national favourite.', '', '', '', 100, 93, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-02/Screenshot_2023-02-02-12-01-53-94_d4e8097ba36c48a408135806b3f44b78~2.jpg\"}]', 45, 23, 0, '2023-02-02', '2023-02-02', 0, 0, '[]', 0, '', '', 0),
(42, 'Haldirams Navrattan namkeen 400 Gm', 'Haldiram navrattan namkeen ', 'Navratan Mixture offers you an appetizing blend of dried nuts, deep-fried beaten rice and the exotic flavours of classic Indian spices. Navratan Mixture will make your tea-time snacking experience into an unmatchable delight', '', '', '', 99, 90, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 0, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-02/Screenshot_2023-02-02-12-30-48-20_965bbf4d18d205f782c6b8409c5773a4~2.jpg\"}]', 48, 24, 0, '2023-02-02', '2023-03-27', 0, 0, '[]', 0, '', '', 0),
(43, 'Maida pkt 500g', 'Maida', 'Maida ', '', '', '', 45, 25, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"url\":\"2023-04-15/Screenshot_2023-04-15-16-45-07-44_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 43, 21, 0, '2023-02-02', '2023-04-15', 0, 0, '[]', 0, '', '', 0),
(44, 'Sooji pkt 500 g', 'Sooji', 'Sooji', '', '', '', 45, 25, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"url\":\"2023-04-15/Screenshot_2023-04-15-16-41-54-79_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 43, 21, 0, '2023-02-02', '2023-04-15', 0, 0, '[]', 0, '', '', 0),
(317, 'Babaji mustard oil 1 ltr', 'Babaji mustard oil 1 ltr', 'Babaji mustard oil 1 ltr', '', '', '', 185, 120, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 12, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-04-15/Screenshot_2023-04-15-16-40-21-39_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 37, 15, 0, '2023-04-15', '2023-07-16', 0, 0, '[]', 0, '', '', 0),
(47, 'Babaji mustard oil 5 ltr', 'Kacchi Ghani mustard oil ', 'Babaji brand kachi ghani mustard oil, traditionally extracted from the first press of mustard seeds, comes with a high pungency level and strong aroma. Being pure, our cooking oil retains its natural properties and mustard oil benefits. Its strong aroma and pungency spice up your cooking.', '', '', '', 950, 590, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-03/Screenshot_2023-01-29-10-00-08-45_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 37, 15, 0, '2023-02-02', '2023-07-16', 0, 0, '[]', 0, '', '', 0),
(48, 'Lijjat Punjabi masala papad 200 gm', 'Papad', 'Punjabi masala papad ', '', '', '', 80, 72, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-03/Screenshot_2023-02-03-01-05-31-65_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 44, 22, 0, '2023-02-02', '2023-02-17', 0, 0, '[]', 0, '', '', 0),
(50, 'Kaju mixture haldirams 200 gm', 'Namkeen ', 'Namkeen ', '', '', '', 86, 80, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-03/Screenshot_2023-02-03-01-30-15-76_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 48, 24, 0, '2023-02-02', '2023-02-02', 0, 0, '[]', 0, '', '', 0),
(51, 'Khatta meetha haldirams 400 gm ', 'Namkeen ', 'Namkeen ', '', '', '', 99, 90, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-03/Screenshot_2023-02-03-01-38-32-78_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 48, 24, 0, '2023-02-02', '2023-03-27', 0, 0, '[]', 0, '', '', 0),
(53, 'Hamdard Honey 500 gm', 'Hamdard Natural Blossom Honey', 'Hamdard Natural Blossom Honey is a product of strict quality measures true to Hamdards standards. This honey is pure as it can be. Hamdard Natural Blossom Honey is assumed to have the following health benefits - Natural Probiotic, Immunity booster, rich in antioxidants nutrients. Provides relief in cough.', '', '', '', 185, 140, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-03/Screenshot_2023-02-03-02-02-53-30_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 63, 25, 0, '2023-02-02', '2023-02-09', 0, 0, '[]', 0, '', '', 0),
(54, 'Tata tea premium (100g×3pcs) ', 'Tata tea premium ', 'Tata tea premium ', '', '', '', 105, 97, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-00-08-34-24_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 50, 26, 0, '2023-02-03', '2023-02-03', 0, 0, '[]', 0, '', '', 0),
(55, 'Taaza tea 250 Gm', 'Tea', 'Taaza tea ', '', '', '', 50, 47, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-00-16-13-62_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 50, 26, 0, '2023-02-03', '2023-02-03', 0, 0, '[]', 0, '', '', 0),
(56, 'Red label tea (100g × 3pcs)', 'Tea pouch', 'Red label tea ', '', '', '', 90, 82, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-00-21-53-62_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 50, 26, 0, '2023-02-03', '2023-02-03', 0, 0, '[]', 0, '', '', 0),
(57, 'Ankur tea 250 Gm', 'Tea pouch ', 'Ankur tea pouch 250g', '', '', '', 70, 63, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-00-26-44-72_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 50, 26, 0, '2023-02-03', '2023-05-18', 0, 0, '[]', 0, '', '', 0),
(58, 'Nova tea 250 gm', 'Tea pouch ', 'Nova tea pouch ', '', '', '', 91, 84, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-00-31-18-50_680d03679600f7af0b4c700c6b270fe7~2.jpg\"},{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-00-31-18-50_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 50, 26, 0, '2023-02-03', '2023-02-03', 0, 0, '[]', 0, '', '', 0),
(59, 'Tata tea gold 500 gm', 'Tea pouch ', 'Tata tea gold ', '', '', '', 320, 260, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 0, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-03-23-51-30-82_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 50, 26, 0, '2023-02-03', '2023-05-19', 0, 0, '[]', 0, '', '', 0),
(61, 'Bajaj Almond hair oil 285 ML ', 'Bajaj Almond drop hair oil ', 'Hair oil ', '', '', '', 195, 175, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-01-05-28-85_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 52, 27, 0, '2023-02-03', '2023-02-03', 0, 0, '[]', 0, '', '', 0),
(62, 'Parachute Coconut hair oil 100 Ml', 'Parachute Coconut oil', 'Parachute Coconut oil- India\'s No. 1 coconut oil contains only the goodness of 100% pure coconut oil. It is made from naturally sun-dried coconuts sourced from the finest farms in our country.', '', '', '', 40, 36, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-01-24-13-94_680d03679600f7af0b4c700c6b270fe7~2.jpg\"},{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-01-24-13-94_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 52, 27, 0, '2023-02-03', '2023-02-03', 0, 0, '[]', 0, '', '', 0),
(63, 'Parachute Coconut hair oil 500 Ml', 'Parachute Coconut oil hair ', 'Parachute Coconut oil- India\'s No. 1 coconut oil contains only the goodness of 100% pure coconut oil. It is made from naturally sun-dried coconuts sourced from the finest farms in our country.', '', '', '', 215, 193, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 4, '', 5, 0, '[{\"url\":\"2023-03-16/Screenshot_2023-03-16-01-32-10-37_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 52, 27, 0, '2023-02-03', '2023-03-15', 0, 0, '[]', 0, '', '', 0),
(64, 'Parachute Jasmine hair oil 190 Ml', 'Hair oil ', 'Jasmine hair oil parachute ', '', '', '', 84, 75, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-01-04-04-87_680d03679600f7af0b4c700c6b270fe7~2.jpg\"},{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-01-04-04-87_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 52, 27, 0, '2023-02-03', '2023-02-03', 0, 0, '[]', 0, '', '', 0),
(65, 'Navratna Ayurvedic Cool Hair Oil 500 ml', 'Hair oil ', 'Navratna Ayurvedic Cool Hair Oil with 9 Active Herbal Ingredients 500 ml\n', '', '', '', 330, 297, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-01-39-32-14_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 52, 27, 0, '2023-02-03', '2023-02-03', 0, 0, '[]', 0, '', '', 0),
(66, 'Hair and care Hair oil 200 Ml', 'Hair oil ', 'Hair oil ', '', '', '', 120, 105, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 6, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-01-48-27-22_d4e8097ba36c48a408135806b3f44b78~2.jpg\"}]', 52, 27, 0, '2023-02-03', '2023-02-03', 0, 0, '[]', 0, '', '', 0),
(67, 'Kesh King Ayurvedic hair oil 100 Ml', 'Kesh king ayurvedic hair oil ', 'Description. Kesh King Ayurvedic Oil is a potent hair health recipe designed for optimal hair fall control, hair growth and solving other hair problems.', '', '', '', 170, 145, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-01-53-13-70_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 52, 27, 0, '2023-02-03', '2023-02-03', 0, 0, '[]', 0, '', '', 0),
(68, 'Haldirams macaroni 450 gm ', 'Sooji 100% macaroni ', 'Macaroni ', '', '', '', 45, 38, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 0, 0, '[{\"url\":\"2023-02-04/Screenshot_2023-02-04-02-01-32-78_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 44, 22, 0, '2023-02-03', '2023-02-03', 0, 0, '[]', 0, '', '', 0),
(69, 'Vermicelli (semai)Agastya 450 Gm', 'Roasted (No maida) wheat ki shakti ', 'No maida ', '', '', '', 100, 38, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-02-15-26-19_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 44, 22, 0, '2023-02-03', '2023-02-03', 0, 0, '[]', 0, '', '', 0),
(70, 'Fusilli pasta Agastya 450 Gm', 'No maida wheat ki shakti ', 'No maida ', '', '', '', 138, 45, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-02-23-53-95_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 44, 22, 0, '2023-02-04', '2023-02-08', 0, 0, '[]', 0, '', '', 0),
(71, 'Baidyanath chyawanprash 1 kg', 'Sugar free ', 'Baidyanath chyawanprash is an ayurvedic concoction, which is not only natural but also sugar-free. The Chyawanprash contains honey, which naturally sweetens it. This chyawanprash has amla and 52 other essential herbs that help build the body\'s natural immunity, thus protecting it from many diseases and infections.', '', '', '', 360, 280, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-02-51-32-26_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 53, 28, 0, '2023-02-04', '2023-02-04', 0, 0, '[]', 0, '', '', 0),
(73, 'Quaker Oats 1 kg', 'Quaker Oats', 'Quaker Oats is 100% whole grains for lasting energy and may help reduce the risk of heart disease. 3 grams of soluble fiber from oatmeal daily in a diet low in saturated fat and cholesterol may reduce this risk of heart disease. This cereal has 2 grams per serving.', '', '', '', 199, 160, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-02-40-21-31_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 53, 28, 0, '2023-02-04', '2023-02-04', 0, 0, '[]', 0, '', '', 0),
(74, 'Kelloggs Muesli fruit and nut 500 Gm', 'Kellogg\'s Muesli fruit and nut ', 'Kellogg\'s Muesli Crunchy Fruit and Nut is a tasty and nourishing breakfast cereal made with five nutritious grains (wheat, corn, rice, barley and oats) and five delicious inclusions (almonds, raisins and candied fruits - papaya, apple, peach).', '', '', '', 345, 290, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 0, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-03-13-50-53_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 53, 28, 0, '2023-02-04', '2023-03-15', 0, 0, '[]', 0, '', '', 0),
(75, 'Horlicks classic malt 1 kg', 'Horlicks classic malt ', 'Horlicks classic malt ', '', '', '', 574, 539, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-11-46-17-05_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 53, 28, 0, '2023-02-04', '2023-05-19', 0, 0, '[]', 0, '', '', 0),
(76, 'Cadbury Bournvita 1 kg', 'Cadbury Bournvita', 'Cadbury Bournvita is a health food drink with inner strength formula which has nutrients that support - Immune system(8 immunity nutrients), Strong bones (Vitamin D, Phosphorous), Strong muscles (Protein, Vitamin D) and Active Brain(Iron, Iodine, Vitamin B2, Vitamin B12).', '', '', '', 450, 420, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-11-55-19-92_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 53, 28, 0, '2023-02-04', '2023-05-19', 0, 0, '[]', 0, '', '', 0),
(77, 'Cadbury Bournvita 500 gm', 'Cadbury Bournvita jar', 'Cadbury Bournvita', '', '', '', 245, 227, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-11-53-58-11_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 53, 28, 0, '2023-02-04', '2023-02-17', 0, 0, '[]', 0, '', '', 0),
(78, 'Kissan Peanut Butter crunchy 920 gm ', 'Crunchy ', 'Product description\nKissan Peanut Butter, with 100% real peanuts handpicked from the farms of Gujarat, is a rich source of protein. An ideal option for mothers looking for protein-based food for their children. The product has no added colours and flavours.', '', '', '', 415, 332, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-04/Screenshot_2023-02-04-12-21-41-53_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 53, 28, 0, '2023-02-04', '2023-02-04', 0, 0, '[]', 0, '', '', 0),
(80, 'Ezee detergent liquid 1 kg', 'Esee', 'Detergent liquid ', '', '', '', 210, 185, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-05/Screenshot_2023-02-05-01-15-22-48_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 41, 11, 0, '2023-02-04', '2023-02-04', 0, 0, '[]', 0, '', '', 0),
(81, 'Lotte choco pie 18 pcs Box', 'Lotte choco pie ', '18 pcs 1 box', '', '', '', 180, 145, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 0, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-05/Screenshot_2023-02-05-01-30-44-27_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 54, 29, 0, '2023-02-04', '2023-04-16', 0, 0, '[]', 0, '', '', 0),
(82, 'Trishul White Phenyl 1 Ltr ', 'Trishul White Phenyl ', 'White phenyl ', '', '', '', 69, 42, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-05/Screenshot_2023-02-05-01-42-02-05_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 55, 42, 0, '2023-02-04', '2023-02-20', 0, 0, '[]', 0, '', '', 0),
(83, 'Nilons Rajasthani green chilli 800 g', 'Pickle ', 'Rajasthani pickle ', '', '', '', 211, 165, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"url\":\"2023-02-05/Screenshot_2023-02-05-02-05-11-02_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 56, 31, 0, '2023-02-04', '2023-02-04', 0, 0, '[]', 0, '', '', 0),
(84, 'Nilons Rajasthani Mixed pickle 800 gm', 'Mixed pickle ', 'Pickle ', '', '', '', 211, 165, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-05/Screenshot_2023-02-05-02-14-55-82_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 56, 31, 0, '2023-02-04', '2023-02-04', 0, 0, '[]', 0, '', '', 0),
(85, 'Tops mixed pickle 900 gm', 'Mixed pickle ', 'Mixed pickle ', '', '', '', 185, 140, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-05/Screenshot_2023-02-05-02-20-33-15_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 56, 31, 0, '2023-02-04', '2023-02-04', 0, 0, '[]', 0, '', '', 0),
(87, 'Kissan tomato ketchup 1.2 kg', 'Tomato ketchup ', 'Tomato ketchup ', '', '', '', 160, 130, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-05/Screenshot_2023-02-05-02-30-03-05_d4e8097ba36c48a408135806b3f44b78~2.jpg\"}]', 56, 32, 0, '2023-02-05', '2023-02-05', 0, 0, '[]', 0, '', '', 0),
(88, 'Rajdhani chana sattu 500 gm', 'Channa sattu ', 'Chana sattu ', '', '', '', 80, 60, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-05/Screenshot_2023-02-05-02-46-34-31_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 43, 21, 0, '2023-02-05', '2023-05-19', 0, 0, '[]', 0, '', '', 0),
(90, 'Colgate zigzag Medium brush 1 pcs ', 'Toothbrush ', 'Toothbrush ', '', '', '', 30, 22, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 6, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-05/Screenshot_2023-02-05-02-59-33-90_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 39, 19, 0, '2023-02-05', '2023-02-18', 0, 0, '[]', 0, '', '', 0),
(91, 'Dabur red paste 200 gm', 'Toothpaste ', 'Dabur red toothpaste ', '', '', '', 117, 103, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-05/Screenshot_2023-02-05-03-08-06-40_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 39, 19, 0, '2023-02-05', '2023-02-05', 0, 0, '[]', 0, '', '', 0),
(92, 'Everest Turmeric powder 200 gm', 'Pouch turmeric powder ', 'Everest Turmeric powder ', '', '', '', 70, 55, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 20, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-05/Screenshot_2023-02-05-03-16-21-38_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 57, 33, 0, '2023-02-05', '2023-02-09', 0, 0, '[]', 0, '', '', 0),
(95, 'Mdh garam masala 100 gm', 'Garam masala powder ', 'Garam masala ', '', '', '', 92, 76, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-05/Screenshot_2023-02-05-03-42-28-24_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 57, 33, 0, '2023-02-05', '2023-02-05', 0, 0, '[]', 0, '', '', 0),
(97, 'Mdh Deggi mirch 100 gm', 'Deggi mirch powder ', 'Degi mirch powder ', '', '', '', 96, 79, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-05/Screenshot_2023-02-05-03-55-06-36_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 57, 33, 0, '2023-02-05', '2023-02-05', 0, 0, '[]', 0, '', '', 0),
(99, 'Mdh white pepper powder 100 gm', 'White pepper powder ', 'White pepper powder ', '', '', '', 212, 174, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-05/Screenshot_2023-02-05-04-06-40-19_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 57, 33, 0, '2023-02-05', '2023-02-05', 0, 0, '[]', 0, '', '', 0),
(100, 'Everest Garam masala 100 gm ', 'Garam masala powder box', '100 gm garam masala ', '', '', '', 88, 71, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-05/Screenshot_2023-02-05-04-13-51-84_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 57, 33, 0, '2023-02-05', '2023-02-05', 0, 0, '[]', 0, '', '', 0),
(101, 'Everest jeera powder 100 gm', 'Jeera powder box', '100 gm jeera powder ', '', '', '', 70, 59, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-05/Screenshot_2023-02-05-04-23-10-34_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 57, 33, 0, '2023-02-05', '2023-04-12', 0, 0, '[]', 0, '', '', 0),
(102, 'Everest chaat masala 50 gm', 'Chat masala box', 'Chat masala ', '', '', '', 39, 32, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-05/Screenshot_2023-02-05-04-29-15-98_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 57, 33, 0, '2023-02-05', '2023-02-05', 0, 0, '[]', 0, '', '', 0),
(103, 'Everest hingraj powder 50 gm', 'Hing powder', '50 g hing powder ', '', '', '', 125, 100, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-05/Screenshot_2023-02-05-04-33-59-03_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 57, 33, 0, '2023-02-05', '2023-02-07', 0, 0, '[]', 0, '', '', 0),
(104, 'Fard date crown 500 gm', 'Fard date crown ', 'Fard date crown ', '', '', '', 252, 175, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-05/Screenshot_2023-02-05-04-40-48-64_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 53, 28, 0, '2023-02-05', '2023-02-05', 0, 0, '[]', 0, '', '', 0),
(105, 'Tops cornflakes 500 g pouch', 'Cornflakes ', 'Tops cornflakes ', '', '', '', 135, 110, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-05/Screenshot_2023-02-05-04-46-33-46_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 53, 28, 0, '2023-02-05', '2023-03-29', 0, 0, '[]', 0, '', '', 0),
(106, 'Dettol Original soap 75 g × 5 pcs', 'Dettol Original soap 4+1', 'Dettol Original soap ', '', '', '', 199, 177, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-06/Screenshot_2023-02-05-13-40-15-56_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 58, 16, 0, '2023-02-05', '2023-02-05', 0, 0, '[]', 0, '', '', 0),
(107, 'Dettol Original soap 125 g × 5 pcs', 'Dettol Original soap 4+1', 'Dettol Original soap ', '', '', '', 322, 287, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-06/Screenshot_2023-02-05-13-40-15-56_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 58, 16, 0, '2023-02-05', '2023-02-05', 0, 0, '[]', 0, '', '', 0),
(108, 'Dove soap 75 g × 3 pcs ', 'Dove soap ', 'Dove soap ', '', '', '', 150, 135, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 4, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-06/Screenshot_2023-02-06-01-49-37-33_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 58, 16, 0, '2023-02-05', '2023-02-05', 0, 0, '[]', 0, '', '', 0),
(109, 'Lifebuoy total soap 125g × 5 pcs', 'Lifebuoy total soap 4+1', 'Lifebuoy total soap 4+1', '', '', '', 144, 136, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 4, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-06/Screenshot_2023-02-06-01-56-36-24_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 58, 16, 0, '2023-02-05', '2023-02-05', 0, 0, '[]', 0, '', '', 0),
(110, 'Santoor soap 100g×4pcs haldi chandan ', 'Haldi chandan ', 'Santoor soap haldi chandan ', '', '', '', 134, 122, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-06/Screenshot_2023-02-05-13-40-38-21_680d03679600f7af0b4c700c6b270fe7~2.jpg\"},{\"id\":\"1\",\"url\":\"2023-02-06/Screenshot_2023-02-05-13-40-38-21_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 58, 16, 0, '2023-02-05', '2023-02-05', 0, 0, '[]', 0, '', '', 0),
(111, 'Margo soap 100g × 5 pcs', 'Margo soap 4+1', 'Margo ', '', '', '', 160, 150, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-06/Screenshot_2023-02-06-02-12-43-50_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 58, 16, 0, '2023-02-05', '2023-02-05', 0, 0, '[]', 0, '', '', 0),
(112, 'Lux soap pink 100g × 5 pcs', 'Lux 4+1', 'Lux soap 4+1', '', '', '', 138, 129, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-06/Screenshot_2023-02-05-13-45-04-73_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 58, 16, 0, '2023-02-05', '2023-02-05', 0, 0, '[]', 0, '', '', 0),
(113, 'Godrej no 1 100g×5 haldi chandan ', 'Soap 4+1', 'Haldi chandan ', '', '', '', 115, 104, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-06/Screenshot_2023-02-05-13-39-25-02_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 58, 16, 0, '2023-02-06', '2023-03-12', 0, 0, '[]', 0, '', '', 0),
(114, 'Godrej no 1 lime 100g × 5', 'Soap 4+1', '4+1', '', '', '', 115, 104, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-06/Screenshot_2023-02-05-13-39-14-60_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 58, 16, 0, '2023-02-06', '2023-03-12', 0, 0, '[]', 0, '', '', 0),
(115, 'Vivel soap 100g×4 Aloe vera.', 'Soap 3+1', 'Vivel soap Aloe vera 3+1', '', '', '', 96, 86, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"url\":\"2023-03-24/Screenshot_2023-03-24-16-59-59-81_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 58, 16, 0, '2023-02-06', '2023-03-24', 0, 0, '[]', 0, '', '', 0),
(116, 'Atta Bag 10 kg', '10 kg thela ', 'Atta', '', '', '', 400, 290, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"url\":\"2023-02-22/InCollage_20230222_121713199~3.jpg\"}]', 43, 21, 0, '2023-02-06', '2023-07-16', 0, 0, '[]', 0, '', '', 0),
(175, 'Saraswati camphor 1 box= 20 tablet ', 'Saraswati camphor 1 box= 20 tablet ', 'Saraswati camphor 1 box= 20 tablet ', '', '', '', 115, 60, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/Screenshot_2023-02-10-10-45-02-38_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 31, 37, 0, '2023-02-10', '2023-02-10', 0, 0, '[]', 0, '', '', 0),
(117, 'Hit red 200 ml ', 'Hit red', 'Hit red', '', '', '', 115, 105, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-06/Screenshot_2023-02-06-03-06-28-04_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 55, 42, 0, '2023-02-06', '2023-02-20', 0, 0, '[]', 0, '', '', 0),
(249, 'Eveready Battery AA 1 pcs', 'Eveready Battery AA 1 pcs', 'Eveready Battery AA 1 pcs', '', '', '', 18, 13, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-20/Screenshot_2023-02-20-08-06-12-40_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 55, 42, 0, '2023-02-20', '2023-02-20', 0, 0, '[]', 0, '', '', 0),
(118, 'Amul butter 100 g', 'Amul butter ', 'Amul butter ', '', '', '', 56, 53, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-06/Screenshot_2023-02-06-03-02-59-35_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 59, 34, 0, '2023-02-06', '2023-03-22', 0, 0, '[]', 0, '', '', 0),
(120, 'Pampers L 1pkt = 2 pcs', 'Pamper size Large ', 'Pampers ', '', '', '', 30, 26, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 8, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-06/Screenshot_2023-02-06-03-04-50-97_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 59, 34, 0, '2023-02-06', '2023-04-10', 0, 0, '[]', 0, '', '', 0),
(121, 'Pampers s 1pkt=2 pcs', 'Pampers small ', 'Pampers small ', '', '', '', 20, 17, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 16, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-06/Screenshot_2023-02-06-03-33-09-39_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 59, 34, 0, '2023-02-06', '2023-02-06', 0, 0, '[]', 0, '', '', 0),
(122, 'India gate feast rozzana 1 kg rice ', 'India gate rice', 'India gate feast rozzana ', '', '', '', 118, 85, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 4, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-06/Screenshot_2023-02-06-03-43-39-06_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 60, 17, 0, '2023-02-06', '2023-02-06', 0, 0, '[]', 0, '', '', 0),
(124, 'Dettol Antiseptic Liquid 250 ml', 'Dettol Antiseptic Liquid', 'Dettol Antiseptic Liquid', '', '', '', 128, 115, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-06/Screenshot_2023-02-06-03-49-37-13_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 62, 36, 0, '2023-02-06', '2023-02-06', 0, 0, '[]', 0, '', '', 0),
(308, 'India gate dubar rice basmati 1 kg', 'India gate dubar rice basmati 1 kg', 'India gate dubar rice basmati 1 kg', '', '', '', 141, 120, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-23/Screenshot_2023-03-23-17-37-39-91_680d03679600f7af0b4c700c6b270fe7~2.jpg\"},{\"id\":\"1\",\"url\":\"2023-03-23/Screenshot_2023-03-23-17-37-39-91_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 60, 17, 0, '2023-03-23', '2023-03-23', 0, 0, '[]', 0, '', '', 0),
(126, 'Cinthol lime soap 100g×4pcs', 'Soap ', 'Soap ', '', '', '', 140, 130, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-07/Screenshot_2023-02-07-12-06-18-07_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 58, 16, 0, '2023-02-07', '2023-07-16', 0, 0, '[]', 0, '', '', 0),
(127, 'Dairy milk silk fruit and nut 137 g', 'Chocolate ', 'Cadbury Dairy Milk\'s chocolate ', '', '', '', 175, 161, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-07/Screenshot_2023-02-07-11-55-37-42_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 45, 23, 0, '2023-02-07', '2023-02-07', 0, 0, '[]', 0, '', '', 0);
INSERT INTO `productdetails` (`prod_id`, `prod_name`, `prod_desc`, `prod_fulldetail`, `name_ar`, `short_ar`, `desc_ar`, `prod_mrp`, `prod_price`, `cgst`, `sgst`, `igst`, `shipping`, `hsn_code`, `w_price`, `w_qty`, `other_attribute`, `stock`, `unit`, `prod_rating`, `prod_rating_count`, `prod_img_url`, `cat_id`, `brand_id`, `review_id`, `create_by`, `update_by`, `coins`, `discount_coins`, `pricearray`, `displaystock`, `sellername`, `prod_remark`, `freeship`) VALUES
(128, 'Dairy milk silk Bubbly 120 g', 'Chocolate Cadbury ', 'Cadbury Dairy milk chocolate ', '', '', '', 175, 161, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-07/Screenshot_2023-02-07-11-56-28-76_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 45, 23, 0, '2023-02-07', '2023-02-07', 0, 0, '[]', 0, '', '', 0),
(129, 'Dairy milk chocolate 50 g', 'Cadbury Dairy milk chocolate ', 'Dairy milk chocolate ', '', '', '', 40, 38, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-07/Screenshot_2023-02-07-12-01-57-84_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 45, 23, 0, '2023-02-07', '2023-02-07', 0, 0, '[]', 0, '', '', 0),
(156, 'Whisper choice XL 6 Pad ', 'Xl', 'Whisper ', '', '', '', 34, 30, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 30, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-08/Screenshot_2023-02-08-11-48-48-10_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 62, 36, 0, '2023-02-08', '2023-02-08', 0, 0, '[]', 0, '', '', 0),
(155, 'Whisper choice ultra XL 6 Pad', 'Whisper', 'Whisper', '', '', '', 45, 38, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 6, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-08/Screenshot_2023-02-06-04-04-08-99_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 62, 36, 0, '2023-02-08', '2023-02-08', 0, 0, '[]', 0, '', '', 0),
(154, 'Mangaldeep Bouquet agarbatti 76 stick ', 'Free match Box ', 'Mangaldeep Bouquet agarbatti 76 stick with match Box ', '', '', '', 50, 45, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-08/Screenshot_2023-02-08-11-32-34-41_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 31, 37, 0, '2023-02-08', '2023-04-12', 0, 0, '[]', 0, '', '', 0),
(153, 'Cycle 3 in 1 agarbatti 97 g', 'Free match Box ', 'Cycle ', '', '', '', 50, 45, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 6, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-08/Screenshot_2023-02-08-11-26-08-93_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 31, 37, 0, '2023-02-08', '2023-02-08', 0, 0, '[]', 0, '', '', 0),
(152, 'Mangaldeep Rose agarbatti 76 stick ', 'Free match Box ', 'Mangaldeep ', '', '', '', 50, 45, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-08/Screenshot_2023-02-07-16-10-34-70_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 31, 37, 0, '2023-02-08', '2023-04-12', 0, 0, '[]', 0, '', '', 0),
(151, 'Mangaldeep sandal agarbatti 72 stick', 'Free match Box ', 'Mangaldeep ', '', '', '', 50, 45, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 6, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-08/Screenshot_2023-02-08-11-16-50-89_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 31, 37, 0, '2023-02-08', '2023-04-12', 0, 0, '[]', 0, '', '', 0),
(278, 'Lizol citrus 500 ml', 'Lizol citrus 500 ml', 'Lizol citrus 500 ml', '', '', '', 103, 93, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-02/Screenshot_2023-03-02-11-40-53-81_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 55, 42, 0, '2023-03-02', '2023-03-02', 0, 0, '[]', 0, '', '', 0),
(150, 'Zed Black agarbatti 100 g', 'Free match Box ', 'Agarbatti ', '', '', '', 60, 45, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 6, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-08/Screenshot_2023-02-07-16-00-10-73_680d03679600f7af0b4c700c6b270fe7~3.jpg\"}]', 31, 37, 0, '2023-02-08', '2023-03-06', 0, 0, '[]', 0, '', '', 0),
(149, 'Nilons ginger garlic paste 200 g', 'Ginger garlic paste ', 'Nilons', '', '', '', 60, 33, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-08/Screenshot_2023-02-08-10-55-52-89_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 56, 32, 0, '2023-02-08', '2023-02-08', 0, 0, '[]', 0, '', '', 0),
(148, 'Savlon Glycerin soap 125g × 4pcs', 'Soap 3+1', 'Savlon', '', '', '', 225, 200, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-08/Screenshot_2023-02-07-15-43-58-33_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 58, 16, 0, '2023-02-08', '2023-03-02', 0, 0, '[]', 0, '', '', 0),
(147, 'Nilons Rajasthani Mango 900 g', 'Mango pickle ', 'Mango pickle ', '', '', '', 211, 165, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-07/Screenshot_2023-02-07-15-48-03-90_680d03679600f7af0b4c700c6b270fe7.jpg\"}]', 56, 31, 0, '2023-02-07', '2023-02-07', 0, 0, '[]', 0, '', '', 0),
(146, 'Pears soap 75g × 4 pcs ', 'Pears pure and jentle', 'Pears', '', '', '', 162, 150, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-07/Screenshot_2023-02-07-12-46-49-50_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 58, 16, 0, '2023-02-07', '2023-02-07', 0, 0, '[]', 0, '', '', 0),
(157, 'Stayfree Secure XL 6 Pad ', 'Cottony soft cover pad', 'Stayfree ', '', '', '', 40, 36, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-08/Screenshot_2023-02-08-11-52-32-45_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 62, 36, 0, '2023-02-08', '2023-02-08', 0, 0, '[]', 0, '', '', 0),
(158, 'Mishri dana prasad 250 g', 'Mishri dana ', 'Mishri dana ', '', '', '', 40, 20, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 19, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-08/IMG_20230203_220121~2.jpg\"}]', 31, 37, 0, '2023-02-08', '2023-02-08', 0, 0, '[]', 0, '', '', 0),
(159, 'Loose Basmati rice 6 no tuta - 1 kg', 'Loose Rice ', 'Loose Rice basmati ', '', '', '', 60, 40, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 30, '', 5, 0, '[{\"url\":\"2023-02-08/Screenshot_2023-02-08-12-24-54-21_88f0690420da2c25a8dbd811c36db030~2.jpg\"}]', 60, 17, 0, '2023-02-08', '2023-02-21', 0, 0, '[]', 0, '', '', 0),
(160, 'Loose White sella rice 1 kg', 'Sella rice ', 'Sella rice ', '', '', '', 60, 46, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 30, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-08/IMG_20230203_213339~2.jpg\"}]', 60, 17, 0, '2023-02-08', '2023-02-08', 0, 0, '[]', 0, '', '', 0),
(161, 'Loose golden sella Double chabi 1 kg', 'Sella golden ', 'Golden sella ', '', '', '', 150, 110, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-08/IMG_20230203_211919~2.jpg\"}]', 60, 17, 0, '2023-02-08', '2023-02-08', 0, 0, '[]', 0, '', '', 0),
(162, 'Loose Sona masoori Basmati rice 1 kg', 'Sona masoori ', 'Sona masoori ', '', '', '', 65, 45, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 30, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-08/IMG_20230203_213545~5.jpg\"}]', 60, 17, 0, '2023-02-08', '2023-03-03', 0, 0, '[]', 0, '', '', 0),
(163, 'Loose  Madhumati basmati rice 1 kg', 'Loose Basmati rice Rozana ', 'Loose Basmati rice ', '', '', '', 100, 60, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 30, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-08/IMG_20230203_213912~2.jpg\"}]', 60, 17, 0, '2023-02-08', '2023-04-10', 0, 0, '[]', 0, '', '', 0),
(164, 'Loose Royal Biryani Basmati rice 1 kg ', 'Basmati rice royal ', 'Biryani rice ', '', '', '', 180, 110, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 30, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-08/IMG_20230203_214139~2.jpg\"}]', 60, 17, 0, '2023-02-08', '2023-02-21', 0, 0, '[]', 0, '', '', 0),
(165, 'Raisin / kismis Gol dana 250 g', 'Raisin / kismis  250 g', 'Raisin / kismis  250 g', '', '', '', 85, 85, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"url\":\"2023-02-09/IMG_20230208_165051~2.jpg\"}]', 63, 25, 0, '2023-02-09', '2023-04-15', 0, 0, '[]', 0, '', '', 0),
(167, 'Cashew Nuts/Kaju 250g W-320 loose', 'Cashew Nuts/Kaju 250g', 'Cashew Nuts/Kaju 250g', '', '', '', 200, 200, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-09/IMG_20230203_215805~2.jpg\"}]', 63, 25, 0, '2023-02-09', '2023-05-19', 0, 0, '[]', 0, '', '', 0),
(169, 'Almond/Badam California 250g loose', 'Almond/Badam California 250g', 'Almond/Badam California 250g', '', '', '', 185, 185, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 8, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-09/IMG_20230203_220017~2.jpg\"}]', 63, 25, 0, '2023-02-09', '2023-05-18', 0, 0, '[]', 0, '', '', 0),
(171, 'Walnut/Akhrot kernels vacuum pack 250g', 'Walnut/Akhrot kernels vacuum pack 250g', 'Walnut/Akhrot kernels vacuum pack 250g', '', '', '', 670, 290, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-09/IMG_20230208_170052~2.jpg\"}]', 63, 25, 0, '2023-02-09', '2023-02-09', 0, 0, '[]', 0, '', '', 0),
(173, 'Supari piece 250 g', 'Supari piece 250 g', 'Supari piece 250 g', '', '', '', 250, 170, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 4, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-09/IMG_20230203_220206~3.jpg\"}]', 36, 39, 0, '2023-02-09', '2023-02-09', 0, 0, '[]', 0, '', '', 0),
(174, 'Sugar pkt 1 kg', 'Uttam sugar Sulphur free ', 'Sugar ', '', '', '', 65, 45, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 0, '', 5, 0, '[{\"url\":\"2023-04-12/Screenshot_2023-04-12-10-46-59-12_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 43, 21, 0, '2023-02-09', '2023-04-12', 0, 0, '[]', 0, '', '', 0),
(176, 'Mishri dana prasad 1 kg ', 'Mishri dana prasad 1 kg ', 'Mishri dana prasad 1 kg ', '', '', '', 140, 70, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/IMG_20230203_220121~2.jpg\"}]', 31, 37, 0, '2023-02-10', '2023-02-10', 0, 0, '[]', 0, '', '', 0),
(177, 'Kissan mixed fruit jam 500 g', 'Kissan mixed fruit jam 500 g', 'Kissan mixed fruit jam 500 g', '', '', '', 170, 151, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/Screenshot_2023-02-10-10-46-08-00_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 53, 28, 0, '2023-02-10', '2023-02-10', 0, 0, '[]', 0, '', '', 0),
(178, 'Dabur Amal Hair oil 275 ml', 'Dabur Amal Hair oil 275 ml', 'Dabur Amal Hair oil 275 ml', '', '', '', 145, 130, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 4, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/Screenshot_2023-02-10-10-43-44-87_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 52, 27, 0, '2023-02-10', '2023-02-10', 0, 0, '[]', 0, '', '', 0),
(179, 'Indulekha bringha hair oil 50 ml', 'Indulekha hair oil 50 ml', 'Indulekha bringha hair oil 50 ml', '', '', '', 234, 200, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 0, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/Screenshot_2023-02-10-10-42-42-80_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 52, 27, 0, '2023-02-10', '2023-03-09', 0, 0, '[]', 0, '', '', 0),
(180, 'Himalaya neem face wash 100 ml', 'Himalaya neem face wash 100 ml', 'Himalaya neem face wash 100 ml', '', '', '', 140, 115, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/Screenshot_2023-02-10-10-48-53-65_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 65, 40, 0, '2023-02-10', '2023-02-10', 0, 0, '[]', 0, '', '', 0),
(181, 'Clean and clear oil free face wash 50 ml', 'Clean and clear oil free face wash 50 ml', 'Clean and clear oil free face wash 50 ml', '', '', '', 80, 70, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/Screenshot_2023-02-10-11-22-53-94_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 65, 40, 0, '2023-02-10', '2023-02-10', 0, 0, '[]', 0, '', '', 0),
(182, 'Parle melody candy 371 g', 'Parle melody candy 371 g', 'Parle melody candy 371 g', '', '', '', 100, 90, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 4, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/Screenshot_2023-02-10-11-29-44-83_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 45, 23, 0, '2023-02-10', '2023-02-10', 0, 0, '[]', 0, '', '', 0),
(183, 'Jeera sabut shiv pujari 100 g', 'Jeera sabut shiv pujari 100 g', 'Jeera sabut shiv pujari 100 g', '', '', '', 65, 60, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 20, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/Screenshot_2023-02-09-10-34-16-37_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 64, 38, 0, '2023-02-10', '2023-05-19', 0, 0, '[]', 0, '', '', 0),
(184, 'Makhana 250 g', 'Makhana', 'Makhana ', '', '', '', 250, 150, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/IMG_20230209_155753~2.jpg\"}]', 63, 25, 0, '2023-02-10', '2023-05-19', 0, 0, '[]', 0, '', '', 0),
(186, 'Masoor/Malka unpolished dal 1 kg loose', 'Masoor/Malka unpolished dal 1 kg', 'Masoor/Malka unpolished dal 1 kg', '', '', '', 180, 88, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/IMG_20230203_221608~2.jpg\"}]', 61, 13, 0, '2023-02-10', '2023-04-10', 0, 0, '[]', 0, '', '', 0),
(188, 'Arhar/Toor unpolished dal 1 kg  loose', 'Arhar/Toor unpolished dal 1 kg ', 'Arhar/Toor unpolished dal 1 kg ', '', '', '', 200, 150, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 9, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/IMG_20230203_221525~2.jpg\"}]', 61, 13, 0, '2023-02-10', '2023-07-16', 0, 0, '[]', 0, '', '', 0),
(190, 'Chana dal 1 kg loose', 'Chana dal 1 kg', 'Chana dal 1 kg', '', '', '', 130, 70, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/IMG_20230203_221726~2.jpg\"}]', 61, 13, 0, '2023-02-10', '2023-07-16', 0, 0, '[]', 0, '', '', 0),
(192, 'Kala chana 1 kg loose', 'Kala chana 1 kg', 'Kala chana 1 kg', '', '', '', 140, 70, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/IMG_20230203_221649~2.jpg\"}]', 61, 13, 0, '2023-02-10', '2023-04-10', 0, 0, '[]', 0, '', '', 0),
(194, 'Moong chilka tuta 1 kg ', 'Moong chilka tuta 1 kg ', 'Moong chilka tuta 1 kg ', '', '', '', 200, 110, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"url\":\"2023-02-10/IMG_20230203_222047~2.jpg\"}]', 61, 13, 0, '2023-02-10', '2023-03-05', 0, 0, '[]', 0, '', '', 0),
(195, 'Urad chilka tuta 500 g', 'Urad chilka tuta 500 g', 'Urad chilka tuta 500 g', '', '', '', 120, 60, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/IMG_20230203_221939~2.jpg\"}]', 61, 13, 0, '2023-02-10', '2023-02-10', 0, 0, '[]', 0, '', '', 0),
(196, 'Urad chilka tuta 1 kg', 'Urad chilka tuta 1 kg', 'Urad chilka tuta 1 kg', '', '', '', 200, 110, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/IMG_20230203_221939~2.jpg\"}]', 61, 13, 0, '2023-02-10', '2023-03-05', 0, 0, '[]', 0, '', '', 0),
(197, 'Razma chitra 500 g', 'Razma chitra 500 g', 'Razma chitra 500 g', '', '', '', 160, 80, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/IMG_20230203_221826~2.jpg\"}]', 61, 13, 0, '2023-02-10', '2023-02-10', 0, 0, '[]', 0, '', '', 0),
(198, 'Razma chitra 1 kg', 'Razma chitra 1 kg', 'Razma chitra 1 kg', '', '', '', 220, 150, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/IMG_20230203_221826~2.jpg\"}]', 61, 13, 0, '2023-02-10', '2023-05-19', 0, 0, '[]', 0, '', '', 0),
(315, 'Kashmiri mirch powder Everest 100g', 'Kashmiri mirch powder Everest 100g', 'Kashmiri mirch powder Everest 100g', '', '', '', 110, 94, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-04-12/Screenshot_2023-04-11-00-09-19-14_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 57, 33, 0, '2023-04-12', '2023-04-12', 0, 0, '[]', 0, '', '', 0),
(200, 'Moong pila 1 kg', 'Moong pila 1 kg', 'Moong pila 1 kg', '', '', '', 200, 110, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/IMG_20230203_221430~3.jpg\"}]', 61, 13, 0, '2023-02-10', '2023-03-05', 0, 0, '[]', 0, '', '', 0),
(201, 'Ajwain 100 g loose', 'Ajwain 100 g', 'Ajwain 100 g', '', '', '', 70, 35, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"url\":\"2023-02-10/IMG_20230203_220629~5.jpg\"}]', 64, 38, 0, '2023-02-10', '2023-05-18', 0, 0, '[]', 0, '', '', 0),
(202, 'Soaf moti 100 g loose', 'Soaf moti 100 g', 'Soaf moti 100 g', '', '', '', 80, 40, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/IMG_20230203_220735~2.jpg\"}]', 64, 38, 0, '2023-02-10', '2023-05-19', 0, 0, '[]', 0, '', '', 0),
(203, 'Kali mirch 100 g', 'Kali mirch 100 g', 'Kali mirch 100 g', '', '', '', 140, 70, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/IMG_20230203_220352~3.jpg\"}]', 64, 38, 0, '2023-02-10', '2023-02-10', 0, 0, '[]', 0, '', '', 0),
(204, 'Long 100 g', 'Long 100 g', 'Long 100 g', '', '', '', 200, 100, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/IMG_20230203_220524~3.jpg\"}]', 64, 38, 0, '2023-02-10', '2023-02-10', 0, 0, '[]', 0, '', '', 0),
(205, 'Red bull Energy Drink 250 ml', 'Red bull Energy Drink 250 ml', 'Red bull Energy Drink 250 ml', '', '', '', 125, 99, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/Screenshot_2023-02-10-12-40-56-42_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 66, 41, 0, '2023-02-10', '2023-02-10', 0, 0, '[]', 0, '', '', 0),
(206, 'Sting Energy Drink 250 ml', 'Sting Energy Drink 250 ml', 'Sting Energy Drink 250 ml', '', '', '', 20, 18, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 30, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-10/Screenshot_2023-02-10-12-45-23-62_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 66, 41, 0, '2023-02-10', '2023-02-10', 0, 0, '[]', 0, '', '', 0),
(207, 'Exo Dishwash tub bar 500 g ', 'Round tub bar dishwash', 'Dishwash', '', '', '', 60, 55, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-11/Screenshot_2023-02-11-16-24-07-88_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 40, 20, 0, '2023-02-11', '2023-02-11', 0, 0, '[]', 0, '', '', 0),
(208, 'Vim Dishwash bar 90g×4(3+1)', 'Dishwash ', 'Dishwash ', '', '', '', 30, 28, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 20, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-11/Screenshot_2023-02-11-16-42-07-80_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 40, 20, 0, '2023-02-11', '2023-02-11', 0, 0, '[]', 0, '', '', 0),
(209, 'Kali sarso 250 g', 'Kali sarso 250 g', 'Kali sarso 250 g', '', '', '', 70, 35, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 8, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-11/IMG_20230210_161240~3.jpg\"}]', 64, 38, 0, '2023-02-11', '2023-02-11', 0, 0, '[]', 0, '', '', 0),
(210, 'Pila sarso 250 g', 'Pila sarso 250 g', 'Pila sarso 250 g', '', '', '', 70, 35, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 8, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-11/IMG_20230210_155934~3.jpg\"}]', 64, 38, 0, '2023-02-11', '2023-02-11', 0, 0, '[]', 0, '', '', 0),
(211, 'Methi dana 250 g', 'Methi dana 250 g', 'Methi dana 250 g', '', '', '', 80, 38, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-11/IMG_20230210_161717~3.jpg\"}]', 64, 38, 0, '2023-02-11', '2023-02-11', 0, 0, '[]', 0, '', '', 0),
(212, 'Sabudana 250 g', 'Sabudana 250 g', 'Sabudana 250 g', '', '', '', 60, 30, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-11/IMG_20230210_155649~2.jpg\"}]', 64, 38, 0, '2023-02-11', '2023-02-11', 0, 0, '[]', 0, '', '', 0),
(213, 'Sabudana 1 kg', 'Sabudana 1 kg', 'Sabudana 1 kg', '', '', '', 200, 100, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-11/IMG_20230210_155649~2.jpg\"}]', 64, 38, 0, '2023-02-11', '2023-02-11', 0, 0, '[]', 0, '', '', 0),
(214, 'Safed til 250 g', 'Safed til 250 g', 'Safed til 250 g', '', '', '', 120, 70, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 4, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-11/IMG_20230210_161441~2.jpg\"}]', 64, 38, 0, '2023-02-11', '2023-02-11', 0, 0, '[]', 0, '', '', 0),
(215, 'Safed til 1 kg', 'Safed til 1 kg', 'Safed til 1 kg', '', '', '', 400, 260, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-11/IMG_20230210_161441~2.jpg\"}]', 64, 38, 0, '2023-02-11', '2023-02-11', 0, 0, '[]', 0, '', '', 0),
(216, 'Imli 100 g', 'Imli 100 g', 'Imli 100 g', '', '', '', 35, 20, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-11/IMG_20230210_161909~2.jpg\"}]', 64, 38, 0, '2023-02-11', '2023-02-11', 0, 0, '[]', 0, '', '', 0),
(217, 'Scotch brite silver sparks 15rs ', 'Scotch brite silver sparks 15rs ', 'Scotch brite silver sparks 15rs', '', '', '', 15, 13, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 20, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-12/Screenshot_2023-02-11-23-39-14-50_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 40, 20, 0, '2023-02-11', '2023-02-11', 0, 0, '[]', 0, '', '', 0),
(218, 'Scotch brite sponge scrub 35rs', 'Scotch brite sponge scrub 35rs', 'Scotch brite sponge scrub 35rs', '', '', '', 35, 31, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-12/Screenshot_2023-02-11-23-37-00-04_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 40, 20, 0, '2023-02-11', '2023-02-11', 0, 0, '[]', 0, '', '', 0),
(219, 'Tops Tomato ketchup 900g', 'Tops Tomato ketchup 900g', 'Tops Tomato ketchup 900g', '', '', '', 140, 70, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-12/Screenshot_2023-02-12-01-44-59-99_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 56, 32, 0, '2023-02-11', '2023-02-11', 0, 0, '[]', 0, '', '', 0),
(220, 'Peanut 250g', 'Peanut 250g', 'Peanut 250g', '', '', '', 70, 40, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 4, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-12/IMG_20230210_144530.jpg\"}]', 63, 25, 0, '2023-02-11', '2023-02-22', 0, 0, '[]', 0, '', '', 0),
(221, 'Peanut 1 kg', 'Peanut 1 kg', 'Peanut 1 kg', '', '', '', 250, 150, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 4, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-12/IMG_20230210_144530.jpg\"}]', 63, 25, 0, '2023-02-11', '2023-02-22', 0, 0, '[]', 0, '', '', 0),
(222, 'Gold Flake small', 'Gold Flake small 10 pcs', 'Gold Flake small', '', '', '', 95, 90, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-12/Screenshot_2023-02-10-13-17-33-90_965bbf4d18d205f782c6b8409c5773a4~2.jpg\"}]', 36, 39, 0, '2023-02-11', '2023-02-11', 0, 0, '[]', 0, '', '', 0),
(223, 'Gold Flake king ', '10 pcs ', 'Gold Flake king ', '', '', '', 165, 160, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 50, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-12/Screenshot_2023-02-10-13-17-33-90_965bbf4d18d205f782c6b8409c5773a4~2.jpg\"}]', 36, 39, 0, '2023-02-11', '2023-02-11', 0, 0, '[]', 0, '', '', 0),
(224, 'Marlboro advance small ', 'Marlboro advance small ', 'Marlboro advance small ', '', '', '', 95, 90, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 20, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-12/Screenshot_2023-02-10-13-17-33-90_965bbf4d18d205f782c6b8409c5773a4~2.jpg\"}]', 36, 39, 0, '2023-02-12', '2023-05-19', 0, 0, '[]', 0, '', '', 0),
(225, 'Marlboro advance big 20pcs', 'Marlboro advance big 20pcs', 'Marlboro advance big 20pcs', '', '', '', 340, 320, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-12/Screenshot_2023-02-10-13-17-33-90_965bbf4d18d205f782c6b8409c5773a4~2.jpg\"},{\"id\":\"1\",\"url\":\"2023-02-12/Screenshot_2023-02-10-13-17-33-90_965bbf4d18d205f782c6b8409c5773a4~2.jpg\"}]', 36, 39, 0, '2023-02-12', '2023-04-10', 0, 0, '[]', 0, '', '', 0),
(226, 'Classic Regular 20 pcs', 'Classic Regular 20 pcs', 'Classic Regular 20 pcs', '', '', '', 340, 320, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-12/Screenshot_2023-02-10-13-17-33-90_965bbf4d18d205f782c6b8409c5773a4~2.jpg\"}]', 36, 39, 0, '2023-02-12', '2023-04-10', 0, 0, '[]', 0, '', '', 0),
(227, 'Classic mild 20 pcs', 'Classic mild 20 pcs', 'Classic mild 20 pcs', '', '', '', 340, 320, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-12/Screenshot_2023-02-10-13-17-33-90_965bbf4d18d205f782c6b8409c5773a4~2.jpg\"}]', 36, 39, 0, '2023-02-12', '2023-04-10', 0, 0, '[]', 0, '', '', 0),
(228, 'Classic ice Burst 20 pcs', 'Classic ice Burst 20 pcs', 'Classic ice Burst 20 pcs', '', '', '', 340, 320, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-12/Screenshot_2023-02-10-13-17-33-90_965bbf4d18d205f782c6b8409c5773a4~2.jpg\"}]', 36, 39, 0, '2023-02-12', '2023-05-19', 0, 0, '[]', 0, '', '', 0),
(229, 'Classic ultra mild 20 pcs', 'Classic ultra mild 20 pcs', 'Classic ultra mild 20 pcs', '', '', '', 340, 320, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-12/Screenshot_2023-02-10-13-17-33-90_965bbf4d18d205f782c6b8409c5773a4~2.jpg\"}]', 36, 39, 0, '2023-02-12', '2023-04-10', 0, 0, '[]', 0, '', '', 0),
(230, 'Tata Tea Elaichi  250 g', 'Tata Tea Elaichi  250 g', 'Tata Tea Elaichi  250 g', '', '', '', 80, 73, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 6, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-12/Screenshot_2023-02-12-22-48-04-97_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 50, 26, 0, '2023-02-12', '2023-02-12', 0, 0, '[]', 0, '', '', 0),
(232, 'Posto dana(khus khus) 100g  loose', 'Posto dana(khus khus) 100g ', 'Posto dana(khus khus) 100g ', '', '', '', 380, 200, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 4, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-15/IMG_20230210_155809~3.jpg\"}]', 64, 38, 0, '2023-02-15', '2023-05-19', 0, 0, '[]', 0, '', '', 0),
(260, 'Loose Laxmi basmati rice 1 kg ', 'Loose pulav Basmati rice 1 kg', 'Loose pulav Basmati rice 1 kg', '', '', '', 160, 85, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 26, '', 5, 0, '[{\"url\":\"2023-02-22/IMG_20230222_145006~2.jpg\"}]', 60, 17, 0, '2023-02-22', '2023-04-10', 0, 0, '[]', 0, '', '', 0),
(233, 'Tata tea Agni 250 g', 'Tata tea Agni 250 g', 'Tata tea Agni 250 g', '', '', '', 50, 46, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-17/Screenshot_2023-02-17-16-36-13-97_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 50, 26, 0, '2023-02-17', '2023-02-17', 0, 0, '[]', 0, '', '', 0),
(234, 'Tops Mango pickle 900g', 'Tops Mango pickle 900g', 'Tops Mango pickle 900g', '', '', '', 185, 140, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-17/Screenshot_2023-02-17-15-06-23-35_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 56, 31, 0, '2023-02-17', '2023-02-17', 0, 0, '[]', 0, '', '', 0),
(236, 'Dettol Original Hand wash 675 ml', 'Dettol Original Hand wash 675 ml liquid ', 'Dettol Original Hand wash 675 ml', '', '', '', 99, 88, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-17/Screenshot_2023-02-16-09-21-56-14_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 65, 40, 0, '2023-02-17', '2023-03-16', 0, 0, '[]', 0, '', '', 0),
(237, 'Godrej expert Natural black 1 kit', 'Godrej expert Natural black 1 kit', 'Godrej expert Natural black 1 kit', '', '', '', 35, 30, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 8, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-17/Screenshot_2023-02-16-09-01-14-65_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 65, 40, 0, '2023-02-17', '2023-02-17', 0, 0, '[]', 0, '', '', 0),
(239, 'Dabur red paste 200+100+toothbrush ', 'Dabur red paste 200+100+toothbrush ', 'Dabur red paste 200+100+toothbrush ', '', '', '', 188, 141, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-18/Screenshot_2023-02-17-23-41-44-78_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 39, 19, 0, '2023-02-18', '2023-02-18', 0, 0, '[]', 0, '', '', 0),
(240, 'Cherry  blossom black 40g ', 'Shoe polish ', 'Shoe polish ', '', '', '', 68, 61, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-18/Screenshot_2023-02-18-23-08-24-28_d4e8097ba36c48a408135806b3f44b78~2.jpg\"}]', 65, 40, 0, '2023-02-18', '2023-02-18', 0, 0, '[]', 0, '', '', 0),
(241, 'Cherry liquid shoe polish Black 75 ml', 'Cherry liquid shoe polish Black 75 ml', 'Cherry liquid shoe polish Black 75 ml', '', '', '', 98, 93, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-18/Screenshot_2023-02-18-23-08-37-46_d4e8097ba36c48a408135806b3f44b78~2.jpg\"}]', 65, 40, 0, '2023-02-18', '2023-02-18', 0, 0, '[]', 0, '', '', 0),
(289, 'Tops green chilli sauce 200 g', 'Tops green chilli sauce 200 g', 'Tops green chilli sauce 200 g', '', '', '', 60, 52, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-15/Screenshot_2023-03-15-15-42-24-25_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 56, 32, 0, '2023-03-15', '2023-03-15', 0, 0, '[]', 0, '', '', 0),
(244, 'Mdh Kali mirch powder 100 gm ', 'Mdh Kali mirch powder 100 gm ', 'Mdh Kali mirch powder 100 gm ', '', '', '', 147, 121, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-18/Screenshot_2023-02-18-23-33-22-63_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 57, 33, 0, '2023-02-18', '2023-02-18', 0, 0, '[]', 0, '', '', 0),
(245, 'Everest Chhole masala 50 g ', 'Everest Chhole masala 50 g ', 'Everest Chhole masala 50 g ', '', '', '', 40, 32, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 4, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-18/Screenshot_2023-02-18-23-37-35-66_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 57, 33, 0, '2023-02-18', '2023-02-18', 0, 0, '[]', 0, '', '', 0),
(246, 'Colgate strong teeth 200 g toothpaste ', 'Toothpaste ', 'Toothpaste ', '', '', '', 120, 110, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-18/Screenshot_2023-02-18-23-46-26-65_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 39, 19, 0, '2023-02-18', '2023-02-18', 0, 0, '[]', 0, '', '', 0),
(247, 'Lipton green tea 25 tea bag', 'Lipton green tea 25 tea bag', 'Lipton green tea 25 tea bag', '', '', '', 170, 140, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-19/Screenshot_2023-02-19-23-13-57-03_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 50, 26, 0, '2023-02-19', '2023-02-19', 0, 0, '[]', 0, '', '', 0),
(248, 'Amulspray 500g', 'Amulspray 500g', 'Amulspray 500g', '', '', '', 230, 220, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-19/Screenshot_2023-02-19-23-14-34-08_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 59, 34, 0, '2023-02-19', '2023-02-19', 0, 0, '[]', 0, '', '', 0),
(250, 'Eveready Battery AAA 1 pcs', 'Eveready Battery AAA 1 pcs', 'Eveready Battery AAA 1 pcs', '', '', '', 18, 13, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-20/Screenshot_2023-02-20-08-06-12-40_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 55, 42, 0, '2023-02-20', '2023-02-20', 0, 0, '[]', 0, '', '', 0),
(251, 'Good day Butter Britannia 10 rs×6pcs', 'Biscuits ', 'Biscuits ', '', '', '', 60, 55, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-20/Screenshot_2023-02-20-08-32-48-70_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 54, 29, 0, '2023-02-20', '2023-02-20', 0, 0, '[]', 0, '', '', 0),
(252, 'Marie gold biscuits 10rs×6 pcs', 'Marie gold biscuits 10rs×6 pcs', 'Marie gold biscuits 10rs×6 pcs', '', '', '', 60, 55, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-20/Screenshot_2023-02-20-08-33-30-38_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 54, 29, 0, '2023-02-20', '2023-02-20', 0, 0, '[]', 0, '', '', 0),
(253, 'Oreo Vanilla Biscuits 10rs × 12 pc', 'Oreo Vanilla Biscuits 10rs × 12 pc', 'Oreo Vanilla Biscuits 10rs × 12 pc', '', '', '', 120, 111, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-20/Screenshot_2023-02-20-08-33-49-22_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 54, 29, 0, '2023-02-20', '2023-02-20', 0, 0, '[]', 0, '', '', 0),
(255, 'Mangaldeep 3 in 1 agarbatti 102g', 'Mangaldeep 3 in 1 agarbatti 102g', 'Mangaldeep 3 in 1 agarbatti 102g', '', '', '', 60, 50, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-21/Screenshot_2023-02-21-15-42-56-57_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 31, 37, 0, '2023-02-21', '2023-04-10', 0, 0, '[]', 0, '', '', 0),
(256, 'Mangaldeep sandal Dhoop 20 bati', 'Mangaldeep sandal Dhoop 20 bati', 'Mangaldeep sandal Dhoop 20 bati', '', '', '', 15, 8, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 12, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-21/Screenshot_2023-02-21-16-02-48-75_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 31, 37, 0, '2023-02-21', '2023-02-21', 0, 0, '[]', 0, '', '', 0),
(257, 'Mangaldeep Rose Dhoop 20 bati ', 'Mangaldeep Rose Dhoop 20 bati ', 'Mangaldeep Rose Dhoop 20 bati ', '', '', '', 15, 8, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 12, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-21/Screenshot_2023-02-21-16-50-32-59_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 31, 37, 0, '2023-02-21', '2023-02-21', 0, 0, '[]', 0, '', '', 0),
(258, 'Olive pomace oil 1 ltr (oleev)', 'Olive pomace oil 1 ltr (oleev)', 'Olive pomace oil 1 ltr (oleev)', '', '', '', 1100, 400, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-21/Screenshot_2023-02-21-16-49-14-86_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 37, 15, 0, '2023-02-21', '2023-02-21', 0, 0, '[]', 0, '', '', 0),
(262, 'Good Knight Gold flash combo ', '1 machine 1 refil', '1 machine 1 refil', '', '', '', 95, 86, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-22/Screenshot_2023-02-22-17-05-35-22_d4e8097ba36c48a408135806b3f44b78~2.jpg\"}]', 55, 42, 0, '2023-02-22', '2023-02-22', 0, 0, '[]', 0, '', '', 0),
(279, 'Impact Detergent powder 1 kg (free bar 10rs)', 'Impact Detergent powder 1 kg ', 'Impact Detergent powder 1 kg ', '', '', '', 125, 111, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-03/Screenshot_2023-03-03-15-39-19-19_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 41, 11, 0, '2023-03-03', '2023-03-03', 0, 0, '[]', 0, '', '', 0),
(266, 'Mortein coil ', '10 pcs coil', 'Coil', '', '', '', 30, 25, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 15, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-23/Screenshot_2023-02-23-00-08-52-59_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 55, 42, 0, '2023-02-22', '2023-03-22', 0, 0, '[]', 0, '', '', 0),
(271, 'Anjeer 250 g', 'Anjeer 250 g', 'Anjeer 250 g', '', '', '', 495, 280, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"url\":\"2023-02-26/InCollage_20230223_170618874~3.jpg\"}]', 63, 25, 0, '2023-02-24', '2023-02-26', 0, 0, '[]', 0, '', '', 0),
(273, 'Real mixed fruit juice 1 ltr', 'Real mixed fruit juice 1 ltr', 'Real mixed fruit juice 1 ltr', '', '', '', 125, 100, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-24/Screenshot_2023-02-24-22-55-13-32_965bbf4d18d205f782c6b8409c5773a4~2.jpg\"}]', 66, 41, 0, '2023-02-24', '2023-02-24', 0, 0, '[]', 0, '', '', 0),
(275, 'Woosh detergent powder 1 kg', 'Woosh detergent powder 1 kg', 'Woosh detergent powder 1 kg', '', '', '', 75, 60, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 4, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-02-28/Screenshot_2023-02-28-15-46-00-64_680d03679600f7af0b4c700c6b270fe7~3.jpg\"}]', 41, 11, 0, '2023-02-28', '2023-02-28', 0, 0, '[]', 0, '', '', 0),
(314, 'Brown rice Dawat 1 kg', 'Brown rice Dawat 1 kg', 'Brown rice Dawat 1 kg', '', '', '', 160, 130, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 4, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-04-11/Screenshot_2023-04-11-16-59-40-68_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 60, 17, 0, '2023-04-11', '2023-04-11', 0, 0, '[]', 0, '', '', 0),
(277, 'Oral B criss cross brush soft ', 'Toothbrush ', 'Oral B ', '', '', '', 50, 30, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-01/Screenshot_2023-03-01-11-55-25-68_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 39, 19, 0, '2023-03-01', '2023-03-01', 0, 0, '[]', 0, '', '', 0),
(280, 'Nip Dishwash 5 Rs × 10 pcs', 'Nip 5 Rs × 10 pcs', 'Nip 5 Rs × 10 pcs', '', '', '', 50, 45, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-04/Screenshot_2023-03-04-01-03-01-91_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 40, 20, 0, '2023-03-03', '2023-03-03', 0, 0, '[]', 0, '', '', 0),
(281, 'Sugar loose 1 kg', 'Sugar loose 1 kg', 'Sugar loose 1 kg', '', '', '', 55, 42, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-04/Screenshot_2023-03-04-11-19-24-83_680d03679600f7af0b4c700c6b270fe7~2.jpg\"},{\"id\":\"1\",\"url\":\"2023-03-04/Screenshot_2023-03-04-11-19-24-83_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 43, 21, 0, '2023-03-04', '2023-04-11', 0, 0, '[]', 0, '', '', 0),
(282, 'Horlicks classic malt 500 g', 'Horlicks classic malt 500 g', 'Horlicks classic malt 500 g', '', '', '', 275, 253, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-04/Screenshot_2023-03-04-23-50-09-55_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 53, 28, 0, '2023-03-04', '2023-03-10', 0, 0, '[]', 0, '', '', 0),
(283, 'Macroni loose 1 kg', 'Macroni loose 1 kg', 'Macroni loose 1 kg', '', '', '', 100, 55, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-04/Screenshot_2023-03-04-23-54-58-74_680d03679600f7af0b4c700c6b270fe7~2.jpg\"},{\"id\":\"1\",\"url\":\"2023-03-04/Screenshot_2023-03-04-23-54-58-74_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 43, 21, 0, '2023-03-04', '2023-03-04', 0, 0, '[]', 0, '', '', 0),
(285, 'Roohafza hamdard 750 ml', 'Roohafza hamdard 750 ml', 'Roohafza hamdard 750 ml', '', '', '', 170, 155, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-08/Screenshot_2023-03-08-08-38-04-83_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 66, 41, 0, '2023-03-08', '2023-03-08', 0, 0, '[]', 0, '', '', 0),
(286, 'Digestive biscuits nutri choice 100g ', 'Digestive biscuits nutri choice 100g ', 'Digestive biscuits nutri choice 100g ', '', '', '', 20, 18, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-08/Screenshot_2023-03-08-09-06-26-09_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 54, 29, 0, '2023-03-08', '2023-03-08', 0, 0, '[]', 0, '', '', 0),
(290, 'Tops Red chilli sauce 200g', 'Tops Red chilli sauce 200g', 'Tops Red chilli sauce 200g', '', '', '', 60, 52, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-15/Screenshot_2023-03-15-15-42-46-54_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 56, 32, 0, '2023-03-15', '2023-03-15', 0, 0, '[]', 0, '', '', 0),
(291, 'Tops Dark soya sauce 200 ml', 'Tops Dark soya sauce 200 ml', 'Tops Dark soya sauce 200 ml', '', '', '', 60, 52, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 3, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-15/Screenshot_2023-03-15-15-48-09-33_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 56, 32, 0, '2023-03-15', '2023-03-15', 0, 0, '[]', 0, '', '', 0),
(292, 'Tops Mango pickle 200g', 'Tops Mango pickle 200g', 'Tops Mango pickle 200g', '', '', '', 75, 52, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-15/Screenshot_2023-03-15-15-52-00-73_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 56, 32, 0, '2023-03-15', '2023-03-15', 0, 0, '[]', 0, '', '', 0),
(293, 'Tops mixed pickle 200g', 'Tops mixed pickle 200g', 'Tops mixed pickle 200g', '', '', '', 75, 52, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-15/Screenshot_2023-03-15-15-51-42-38_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 56, 32, 0, '2023-03-15', '2023-03-15', 0, 0, '[]', 0, '', '', 0),
(294, 'Tops lime pickle 200g', 'Tops lime pickle 200g', 'Tops lime pickle 200g', '', '', '', 75, 52, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-15/Screenshot_2023-03-15-15-51-11-32_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 56, 32, 0, '2023-03-15', '2023-03-15', 0, 0, '[]', 0, '', '', 0),
(295, 'Madhusudhan paneer 200g', 'Madhusudhan paneer 200g', 'Madhusudhan paneer 200g', '', '', '', 85, 71, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 0, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-16/Screenshot_2023-03-16-01-52-32-70_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 59, 34, 0, '2023-03-15', '2023-04-10', 0, 0, '[]', 0, '', '', 0),
(296, 'Glucon D orange 1 kg ', 'Glucon D orange 1 kg free bottle ', 'Glucon D orange 1 kg ', '', '', '', 380, 315, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[]', 66, 41, 0, '2023-03-16', '2023-05-19', 0, 0, '[]', 0, '', '', 0),
(297, 'Hell Energy Drink 250ml', 'Hell Energy Drink 250ml', 'Hell Energy Drink 250ml', '', '', '', 60, 55, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-16/Screenshot_2023-03-16-13-36-04-99_d4e8097ba36c48a408135806b3f44b78~2.jpg\"}]', 66, 41, 0, '2023-03-16', '2023-05-19', 0, 0, '[]', 0, '', '', 0),
(298, 'Glucon D orange 450 g', 'Glucon D orange 450 g', 'Glucon D orange 450 g', '', '', '', 189, 153, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 2, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-16/Screenshot_2023-03-16-13-26-49-48_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 66, 41, 0, '2023-03-16', '2023-03-16', 0, 0, '[]', 0, '', '', 0),
(300, 'Poha Mota loose 1 kg ', 'Poha Mota loose 1 kg ', 'Poha Mota loose 1 kg ', '', '', '', 80, 50, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-19/Screenshot_2023-03-19-09-46-04-60_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 43, 21, 0, '2023-03-19', '2023-03-19', 0, 0, '[]', 0, '', '', 0),
(301, 'Poha pkt 500 g Mk', 'Poha pkt 500 g Mk', 'Poha pkt 500 g Mk', '', '', '', 70, 35, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 10, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-21/Screenshot_2023-03-19-09-50-33-38_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 43, 21, 0, '2023-03-21', '2023-03-21', 0, 0, '[]', 0, '', '', 0),
(302, 'Kanodia mustard oil 1 ltr', 'Kanodia mustard oil 1 ltr', 'Kanodia mustard oil 1 ltr', '', '', '', 200, 140, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 5, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-22/Screenshot_2023-03-22-00-34-17-07_40deb401b9ffe8e1df2f1cc5ba480b12~2.jpg\"}]', 37, 15, 0, '2023-03-21', '2023-04-15', 0, 0, '[]', 0, '', '', 0),
(303, 'Singhada atta 250 g ', 'Singhada atta 250 g ', 'Singhada atta 250 g ', '', '', '', 90, 45, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 8, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-23/Screenshot_2023-03-22-16-40-56-43_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 43, 21, 0, '2023-03-23', '2023-03-23', 0, 0, '[]', 0, '', '', 0),
(304, 'Kuttu atta 250 g', 'Kuttu atta 250 g', 'Kuttu atta 250 g', '', '', '', 80, 35, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 0, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-23/Screenshot_2023-03-22-23-06-46-85_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 43, 21, 0, '2023-03-23', '2023-04-10', 0, 0, '[]', 0, '', '', 0),
(305, 'Samak rice (Brat rice) 250 g', 'Samak rice (Brat rice) 250 g', 'Samak rice (Brat rice) 250 g', '', '', '', 90, 40, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 6, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-23/Screenshot_2023-03-22-23-07-25-84_680d03679600f7af0b4c700c6b270fe7.jpg\"}]', 43, 21, 0, '2023-03-23', '2023-03-23', 0, 0, '[]', 0, '', '', 0),
(306, 'Loose White sella 36rs kg ', 'Loose White sella 36rs kg ', 'Loose White sella 36rs kg ', '', '', '', 36, 36, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 30, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-23/IMG_20230323_165027~2.jpg\"}]', 60, 17, 0, '2023-03-23', '2023-03-23', 0, 0, '[]', 0, '', '', 0),
(307, 'Loose Basmati rice 35 rs kg tuta', 'Loose Basmati rice 35 rs kg', 'Loose Basmati rice 35 rs kg', '', '', '', 35, 35, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 30, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-23/IMG_20230323_165112~2.jpg\"}]', 60, 17, 0, '2023-03-23', '2023-04-10', 0, 0, '[]', 0, '', '', 0),
(309, 'Comfort 860 ml', 'Fabric conditioner ', 'Fabric conditioner ', '', '', '', 235, 210, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-24/Screenshot_2023-03-24-16-15-22-54_680d03679600f7af0b4c700c6b270fe7~2.jpg\"}]', 55, 12, 0, '2023-03-24', '2023-03-24', 0, 0, '[]', 0, '', '', 0),
(310, 'Glow and lovely 50 g', 'Glow and lovely 50 g', 'Glow and lovely 50 g', '', '', '', 122, 113, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-24/Screenshot_2023-03-24-15-23-22-06_680d03679600f7af0b4c700c6b270fe7~3.jpg\"}]', 65, 40, 0, '2023-03-24', '2023-03-24', 0, 0, '[]', 0, '', '', 0),
(311, 'Liril lime soap 125g×4pcs', '3+1', 'Lime', '', '', '', 235, 200, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 1, '', 5, 0, '[{\"id\":\"1\",\"url\":\"2023-03-24/Screenshot_2023-03-24-16-20-56-15_d4e8097ba36c48a408135806b3f44b78~2.jpg\"}]', 58, 16, 0, '2023-03-24', '2023-03-24', 0, 0, '[]', 0, '', '', 0);
INSERT INTO `productdetails` (`prod_id`, `prod_name`, `prod_desc`, `prod_fulldetail`, `name_ar`, `short_ar`, `desc_ar`, `prod_mrp`, `prod_price`, `cgst`, `sgst`, `igst`, `shipping`, `hsn_code`, `w_price`, `w_qty`, `other_attribute`, `stock`, `unit`, `prod_rating`, `prod_rating_count`, `prod_img_url`, `cat_id`, `brand_id`, `review_id`, `create_by`, `update_by`, `coins`, `discount_coins`, `pricearray`, `displaystock`, `sellername`, `prod_remark`, `freeship`) VALUES
(319, 'Test Product', '', '<p>Test Product</p>\n<p>Test Product</p>\n<p>Test Product</p>', '', '', '', 299, 100, 0, 0, 0, 0, '', 0, 0, '{\"size\":\"\",\"color\":\"\",\"weight\":\"\"}', 100, '', 0, 0, '[{\"id\":\"1\",\"url\":\"2023/12/20/9a0b749cd9624920c39fd3a1ed5e71db_1703057231.webp\"},{\"id\":4,\"url\":\"2023/12/20/b6c1f1f947975af4917b0e638ed324d7_1703057233.webp\"}]', 43, 16, 0, '2023-12-20', '2023-12-20', 0, 0, '[{\"attrnam\":\"#4287f5\",\"attrvalue\":\"100\",\"attrstockvalue\":\"100\",\"attrmrpvalue\":\"200\",\"attrimage\":[],\"attrskuvalue\":\"\"},{\"attrnam\":\"#ff6600\",\"attrvalue\":\"200\",\"attrstockvalue\":\"100\",\"attrmrpvalue\":\"300\",\"attrimage\":[{\"id\":1,\"url\":\"{\"status\":\"success\",\"message\":\"Image uploaded successfully\",\"data\":{\"filePath\":\"2023\\/12\\/20\\/2209ab4a4e7cf0ed5c23406465eccaea_1703057181.webp\",\"link\":null}}\"}],\"attrskuvalue\":\"\"},{\"attrnam\":\"#ff6600\",\"attrvalue\":\"200\",\"attrstockvalue\":\"100\",\"attrmrpvalue\":\"300\",\"attrimage\":[{\"id\":1,\"url\":\"{\"status\":\"success\",\"message\":\"Image uploaded successfully\",\"data\":{\"filePath\":\"2023\\/12\\/20\\/2209ab4a4e7cf0ed5c23406465eccaea_1703057181.webp\",\"link\":null}}\"}],\"attrskuvalue\":\"\"}]', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute`
--

CREATE TABLE `product_attribute` (
  `id` int(11) NOT NULL,
  `prod_attr_id` int(11) NOT NULL,
  `prod_id` varchar(100) NOT NULL,
  `attr_value` varchar(1000) NOT NULL,
  `vendor_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes_conf`
--

CREATE TABLE `product_attributes_conf` (
  `id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `attribute_value` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_attributes_conf`
--

INSERT INTO `product_attributes_conf` (`id`, `attribute_id`, `attribute_value`) VALUES
(8, 4, '#483794'),
(9, 4, '#b9aee8'),
(10, 5, 'S'),
(11, 5, 'M'),
(12, 5, 'L'),
(13, 5, 'XL'),
(14, 4, '#d17bc4'),
(15, 4, '#ff6600');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes_set`
--

CREATE TABLE `product_attributes_set` (
  `id` int(11) NOT NULL,
  `attribute` varchar(200) NOT NULL,
  `attribute_ar` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_attributes_set`
--

INSERT INTO `product_attributes_set` (`id`, `attribute`, `attribute_ar`, `created_at`, `updated_at`) VALUES
(4, 'Color', 'null', '2023-12-21 16:26:48', '2023-12-21 10:56:52'),
(5, 'Size', 'null', '2023-12-21 16:26:59', '2023-12-21 10:56:59'),
(10, 'Storage', '', '2023-12-21 16:31:07', '2023-12-21 11:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `product_variant_cat`
--

CREATE TABLE `product_variant_cat` (
  `variant_id` int(11) NOT NULL,
  `variant_name` varchar(150) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `variant_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product_variant_cat`
--

INSERT INTO `product_variant_cat` (`variant_id`, `variant_name`, `parent_id`, `variant_order`) VALUES
(34, 'Colour', 0, 0),
(35, '#ff6600', 34, 0),
(36, '#4287f5', 34, 0),
(37, '#c416b9', 34, 0),
(39, 'Ram', 0, 0),
(40, 'Storage', 0, 0),
(41, '500 MB', 39, 0),
(42, '1 GB', 39, 0),
(43, '1.5 GB', 39, 0),
(45, 'Size', 0, 0),
(46, '1 GB', 40, 0),
(48, '2 GB', 40, 0),
(49, '4 GB', 40, 0),
(50, '8 GB', 40, 0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `review_array` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `review_array`) VALUES
(1, '[{\"title\":\"good\",\"feedback\":\"good\",\"rating\":\"5\",\"username\":\"cks\",\"userid\":\"10001\",\"date\":\"02\\/01\\/2023\"}]'),
(2, '[{\"title\":\"good\",\"feedback\":\"good\",\"rating\":\"4\",\"username\":\"ravi\",\"userid\":\"10001\",\"date\":\"02\\/01\\/2023\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `sectionvalue`
--

CREATE TABLE `sectionvalue` (
  `id` int(11) NOT NULL,
  `layoutsection_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `button` text NOT NULL,
  `onclick_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sectionvalue`
--

INSERT INTO `sectionvalue` (`id`, `layoutsection_id`, `title`, `description`, `image`, `button`, `onclick_url`) VALUES
(2, 1, '', '', '2023-02-23/Screenshot_2023-02-23-00-13-55-59_680d03679600f7af0b4c700c6b270fe7~2.jpg', 'test', '#'),
(3, 2, 'test1', 'test1', '2022-12-29/online-grocery-store-in-delhi-ncr.png', 'test1', '#'),
(4, 3, 'test2', 'test2', '2022-12-29/3712e4921086beef88529eccdd522a0a.png', 'test2', '#'),
(5, 4, 'BORGES Extra Light Olive Oil', '', '2022-12-31/2-extra-light-plastic-bottle-1-olive-oil-borges-original-imagg574rh9mdvfb.png', '', '#'),
(6, 5, 'Saffola Gold Refined Cooking oil', '', '2022-12-31/4-gold-refined-cooking-oil-blended-rice-bran-corn-oil-helps-keep-original-imagfyagjkhjdsk4.png', '', '#'),
(7, 6, 'Mahakosh Refined Soyabean Oil', '', '2022-12-31/-original-imagahyv8ap4sfaa.png', '', '#'),
(8, 7, '', '', '2022-12-31/64a419c14d778bf1559b1b6063ee8676.jpg', '', '#'),
(9, 8, '', '', '2022-12-31/Why_20Ensure_201064_20x_20960.png', '', '#'),
(10, 9, 'test1', 'test1', '2022-12-29/banner-for-supermarkets-and-grocery-image_csp42487071.png', 'test1', '#'),
(11, 10, 'test1', 'test1', '2022-12-29/130cafb9ec2f9cc60f7c0586e6cfe16f.png', 'test1', '#');

-- --------------------------------------------------------

--
-- Table structure for table `seller_login`
--

CREATE TABLE `seller_login` (
  `seller_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `roll` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `seller_login`
--

INSERT INTO `seller_login` (`seller_id`, `fname`, `lname`, `phone`, `email`, `password`, `address`, `status`, `roll`, `date`) VALUES
(1, 'bapan halder', '', '9717999121', 'paul.jony70@gmail.com', 'Admin@123', 'address : abc', 'active', 'admin', '2022-05-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'gtag_manager', '<script async src=\"https://www.googletagmanager.com/gtag/js?id=G-HFKCQNVVT5\"></script>\r\n<script>\r\n  window.dataLayer = window.dataLayer || [];\r\n  function gtag(){dataLayer.push(arguments);}\r\n  gtag(\"js\", new Date());\r\n\r\n  gtag(\"config\", \"G-HFKCQNVVT5\");\r\n</script>'),
(2, 'facebook_pixel', '<script async src=\"https://www.googletagmanager.com/gtag/js?id=G-HFKCQNVVT5\"></script>\r\n<script>\r\n  window.dataLayer = window.dataLayer || [];\r\n  function gtag(){dataLayer.push(arguments);}\r\n  gtag(\"js\", new Date());\r\n\r\n  gtag(\"config\", \"G-HFKCQNVVT5\");\r\n</script>'),
(3, 'topbar_offer', 'Free Shipping on All Orders | Get Extra ₹100 OFF on Spent of ₹1499 Use Code: BLUEAPP19985 2'),
(4, 'theme_color', '#ee2c61'),
(5, 'system_currency_symbol', '₹');

-- --------------------------------------------------------

--
-- Table structure for table `store_config`
--

CREATE TABLE `store_config` (
  `sno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  `other` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `store_config`
--

INSERT INTO `store_config` (`sno`, `name`, `value`, `other`) VALUES
(1, 'newuser_coins', '10', ''),
(2, 'coins_discount_percent', '5', ''),
(3, 'minorder', '800', ''),
(4, 'allindia_ship', '65', ''),
(5, 'freeship', '800', ''),
(6, 'cashondelivery', 'enable', ''),
(7, 'showcgst', 'false', ''),
(8, 'mh_ship', '65', ''),
(9, 'working_hour_start', '', ''),
(10, 'working_hour_end', '', ''),
(11, 'store_open_status', '0', '0 means open 1 means store is off');

-- --------------------------------------------------------

--
-- Table structure for table `store_setting`
--

CREATE TABLE `store_setting` (
  `seller_id` int(11) NOT NULL,
  `store_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `tax_no` varchar(30) NOT NULL,
  `logo` text NOT NULL,
  `web_url` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `whatsappno` varchar(14) NOT NULL,
  `termcondition` text NOT NULL,
  `aboutus` text NOT NULL,
  `youtubeurl` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `store_setting`
--

INSERT INTO `store_setting` (`seller_id`, `store_name`, `address`, `phone`, `tax_no`, `logo`, `web_url`, `email`, `whatsappno`, `termcondition`, `aboutus`, `youtubeurl`) VALUES
(1, 'Reshamdhaage', 'Delhi', '9717999121', '', '', '', 'amitkumar7361@gmail.com', '919717999121', 'TERMS AND CONDITIONS :\n', 'about us  MK Kirana', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `sno` int(11) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone_no` varchar(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `display_name` varchar(60) DEFAULT NULL,
  `date` date NOT NULL,
  `interestid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`sno`, `full_name`, `address`, `email`, `phone_no`, `password`, `user_id`, `display_name`, `date`, `interestid`) VALUES
(32, 'Yuvraj ', '', 'yuvrainghsolanki2406@gmail.com', '7354570394', '7354570394', 10001, 'Yuvraj ', '2023-09-14', 0),
(33, 'yuvraj', '', '', '9302650674', '9302650674', 10002, NULL, '2023-09-27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `user_id` int(11) NOT NULL,
  `prod_id` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`user_id`, `prod_id`) VALUES
(10001, '[{\"prod_id\":\"12\",\"size\":\"\",\"color\":\"\",\"price\":\"640.000\",\"date\":\"2023-09-28\"},{\"prod_id\":\"47\",\"size\":\"\",\"color\":\"\",\"price\":\"590.000\",\"date\":\"2023-09-30\"}]'),
(10003, '[]'),
(0, '[{\"prod_id\":\"2\",\"size\":\"\",\"color\":\"\",\"price\":\"0\",\"date\":\"2023-01-23\"}]'),
(10005, '[{\"prod_id\":\"1\",\"size\":\"\",\"color\":\"\",\"price\":\"0\",\"date\":\"2023-01-23\"}]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cartdetails`
--
ALTER TABLE `cartdetails`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `deliverytime`
--
ALTER TABLE `deliverytime`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `discountprod`
--
ALTER TABLE `discountprod`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `homecat`
--
ALTER TABLE `homecat`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `homepage_banner`
--
ALTER TABLE `homepage_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banner`
--
ALTER TABLE `home_banner`
  ADD PRIMARY KEY (`home_banner_id`);

--
-- Indexes for table `knet_payment`
--
ALTER TABLE `knet_payment`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `latestprod`
--
ALTER TABLE `latestprod`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `layoutsection`
--
ALTER TABLE `layoutsection`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `notifyme`
--
ALTER TABLE `notifyme`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `offerzone`
--
ALTER TABLE `offerzone`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pincode`
--
ALTER TABLE `pincode`
  ADD PRIMARY KEY (`pincode`);

--
-- Indexes for table `popularprod`
--
ALTER TABLE `popularprod`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `popular_product`
--
ALTER TABLE `popular_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes_conf`
--
ALTER TABLE `product_attributes_conf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes_set`
--
ALTER TABLE `product_attributes_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variant_cat`
--
ALTER TABLE `product_variant_cat`
  ADD PRIMARY KEY (`variant_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `sectionvalue`
--
ALTER TABLE `sectionvalue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_login`
--
ALTER TABLE `seller_login`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `store_config`
--
ALTER TABLE `store_config`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `store_setting`
--
ALTER TABLE `store_setting`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `deliverytime`
--
ALTER TABLE `deliverytime`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discountprod`
--
ALTER TABLE `discountprod`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homecat`
--
ALTER TABLE `homecat`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `homepage_banner`
--
ALTER TABLE `homepage_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `home_banner`
--
ALTER TABLE `home_banner`
  MODIFY `home_banner_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `knet_payment`
--
ALTER TABLE `knet_payment`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `latestprod`
--
ALTER TABLE `latestprod`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layoutsection`
--
ALTER TABLE `layoutsection`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notifyme`
--
ALTER TABLE `notifyme`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offerzone`
--
ALTER TABLE `offerzone`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `popularprod`
--
ALTER TABLE `popularprod`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `popular_product`
--
ALTER TABLE `popular_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=320;

--
-- AUTO_INCREMENT for table `product_attribute`
--
ALTER TABLE `product_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_attributes_conf`
--
ALTER TABLE `product_attributes_conf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_attributes_set`
--
ALTER TABLE `product_attributes_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_variant_cat`
--
ALTER TABLE `product_variant_cat`
  MODIFY `variant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sectionvalue`
--
ALTER TABLE `sectionvalue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `seller_login`
--
ALTER TABLE `seller_login`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `store_config`
--
ALTER TABLE `store_config`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

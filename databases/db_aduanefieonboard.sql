-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2025 at 02:06 PM
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
-- Database: `db_aduanefieonboard`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `logindetails`
-- (See below for the actual view)
--
CREATE TABLE `logindetails` (
`id` int(20)
,`email` varchar(50)
,`first_name` varchar(100)
,`last_name` varchar(100)
,`phone_number` varchar(20)
,`password` varchar(100)
,`user_id` int(1)
,`user_role` varchar(50)
,`date_created` datetime
,`status` int(1)
,`organization` varchar(100)
,`aduanefie_image` varchar(100)
,`update_permission` int(1)
,`delete_permission` int(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastlogin` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `email`, `address`, `timestamp`, `lastlogin`) VALUES
(1, 'gaduanefie@gmail.com', '127.0.0.1', '2025-03-13 22:16:14', '2025-03-13 22:16:14'),
(2, 'gaduanefie@gmail.com', '127.0.0.1', '2025-03-13 22:21:55', '2025-03-13 22:21:55'),
(3, 'baduanefie@gmail.com', '127.0.0.1', '2025-03-13 22:23:04', '2025-03-13 22:23:04'),
(4, 'gaduanefie@gmail.com', '127.0.0.1', '2025-03-20 12:05:40', '2025-03-20 12:05:40'),
(5, 'aduanefie@gmail.com', '127.0.0.1', '2025-03-21 09:46:48', '2025-03-21 09:46:48'),
(6, 'rm@gmail.com', '127.0.0.1', '2025-03-21 09:57:08', '2025-03-21 09:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audittrail`
--

CREATE TABLE `tbl_audittrail` (
  `id` bigint(20) NOT NULL,
  `activity` varchar(100) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_audittrail`
--

INSERT INTO `tbl_audittrail` (`id`, `activity`, `details`, `date_time`, `user`) VALUES
(1, 'Successful Login', 'User Successfully Logged Into The System', '2025-03-13 22:16:14', 'Mirabelle Elinam'),
(2, 'Successful Login', 'User Successfully Logged Into The System', '2025-03-13 22:21:55', 'Mirabelle Elinam'),
(3, 'Successful Login', 'User Successfully Logged Into The System', '2025-03-13 22:23:04', 'Christopher Klutse'),
(4, 'Successful Login', 'User Successfully Logged Into The System', '2025-03-20 12:05:40', 'Mirabelle Elinam'),
(5, 'Successful Login', 'User Successfully Logged Into The System', '2025-03-21 09:46:48', 'Johnson Excellent-Emmanuel'),
(6, 'Successful Login', 'User Successfully Logged Into The System', '2025-03-21 09:57:08', 'Gilbert Amoa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cropsgrowned`
--

CREATE TABLE `tbl_cropsgrowned` (
  `id` bigint(20) NOT NULL,
  `crop_name` varchar(100) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cropsgrowned`
--

INSERT INTO `tbl_cropsgrowned` (`id`, `crop_name`, `description`, `date_time`) VALUES
(1, 'Maize', 'Maize', '0000-00-00 00:00:00'),
(2, 'Rice', 'Rice', '0000-00-00 00:00:00'),
(3, 'Cassava', 'Cassava', '0000-00-00 00:00:00'),
(4, 'Yam', 'Yam', '0000-00-00 00:00:00'),
(5, 'Plantain', 'Plantain', '0000-00-00 00:00:00'),
(6, 'Cocoyam (Taro)', 'Cocoyam (Taro)', '0000-00-00 00:00:00'),
(7, 'Sweet Potatoes', 'Sweet Potatoes', '0000-00-00 00:00:00'),
(8, 'Sorghum', 'Sorghum', '0000-00-00 00:00:00'),
(9, 'Millet', 'Millet', '0000-00-00 00:00:00'),
(10, 'Fonio (Acha)', 'Fonio (Acha)', '0000-00-00 00:00:00'),
(11, 'Cocoa', 'Cocoa', '0000-00-00 00:00:00'),
(12, 'Oil Palm', 'Oil Palm', '0000-00-00 00:00:00'),
(13, 'Rubber', 'Rubber', '0000-00-00 00:00:00'),
(14, 'Shea Nuts', 'Shea Nuts', '0000-00-00 00:00:00'),
(15, 'Cashew Nuts', 'Cashew Nuts', '0000-00-00 00:00:00'),
(16, 'Cotton', 'Cotton', '0000-00-00 00:00:00'),
(17, 'Coffee', 'Coffee', '0000-00-00 00:00:00'),
(18, 'Tobacco', 'Tobacco', '0000-00-00 00:00:00'),
(20, 'Tomatoes', 'Tomatoes', '0000-00-00 00:00:00'),
(21, 'Onions', 'Onions', '0000-00-00 00:00:00'),
(22, 'Pepper', 'Pepper', '0000-00-00 00:00:00'),
(23, 'Garden Eggs', 'Garden Eggs', '0000-00-00 00:00:00'),
(24, 'Okra', 'Okra', '0000-00-00 00:00:00'),
(25, 'Carrots', 'Carrots', '0000-00-00 00:00:00'),
(26, 'Lettuce', 'Lettuce', '0000-00-00 00:00:00'),
(27, 'Cabbage', 'Cabbage', '0000-00-00 00:00:00'),
(28, 'Spinach', 'Spinach', '0000-00-00 00:00:00'),
(29, 'Green Beans', 'Green Beans', '0000-00-00 00:00:00'),
(30, 'Cucumber', 'Cucumber', '0000-00-00 00:00:00'),
(31, 'Cowpea', 'Cowpea', '0000-00-00 00:00:00'),
(32, 'Soybeans', 'Soybeans', '0000-00-00 00:00:00'),
(33, 'Groundnuts (Peanuts)', 'Groundnuts (Peanuts)', '0000-00-00 00:00:00'),
(34, 'Bambara Beans', 'Bambara Beans', '0000-00-00 00:00:00'),
(35, 'Mango', 'Mango', '0000-00-00 00:00:00'),
(36, 'Orange', 'Orange', '0000-00-00 00:00:00'),
(37, 'Banana', 'Banana', '0000-00-00 00:00:00'),
(38, 'Pineapple', 'Pineapple', '0000-00-00 00:00:00'),
(39, 'Watermelon', 'Watermelon', '0000-00-00 00:00:00'),
(40, 'Coconut', 'Coconut', '0000-00-00 00:00:00'),
(41, 'Papaya (Pawpaw)', 'Papaya (Pawpaw)', '0000-00-00 00:00:00'),
(42, 'Avocado', 'Avocado', '0000-00-00 00:00:00'),
(43, 'Grapefruit', 'Grapefruit', '0000-00-00 00:00:00'),
(44, 'Tangerines', 'Tangerines', '0000-00-00 00:00:00'),
(45, 'Lemon & Lime', 'Lemon & Lime', '0000-00-00 00:00:00'),
(46, 'Guava', 'Guava', '0000-00-00 00:00:00'),
(47, 'Soursop', 'Soursop', '0000-00-00 00:00:00'),
(48, 'Passion Fruit', 'Passion Fruit', '0000-00-00 00:00:00'),
(49, 'Apples', 'Apples', '0000-00-00 00:00:00'),
(50, 'Pomegranate (Rare)', 'Pomegranate (Rare)', '0000-00-00 00:00:00'),
(51, 'Spices & Herbs', 'Spices & Herbs', '0000-00-00 00:00:00'),
(52, 'Ginger', 'Ginger', '0000-00-00 00:00:00'),
(53, 'Turmeric', 'Turmeric', '0000-00-00 00:00:00'),
(54, 'Cloves', 'Cloves', '0000-00-00 00:00:00'),
(55, 'Bay Leaves', 'Bay Leaves', '0000-00-00 00:00:00'),
(56, 'African Nutmeg', 'African Nutmeg', '0000-00-00 00:00:00'),
(57, 'Dawadawa', 'Dawadawa', '0000-00-00 00:00:00'),
(58, 'Basil (Akuko Besa)', 'Basil (Akuko Besa)', '0000-00-00 00:00:00'),
(59, 'Rosemary', 'Rosemary', '0000-00-00 00:00:00'),
(60, 'Mint', 'Mint', '0000-00-00 00:00:00'),
(61, 'Thyme', 'Thyme', '0000-00-00 00:00:00'),
(62, 'Lemongrass', 'Lemongrass', '0000-00-00 00:00:00'),
(63, 'Vanilla', 'Vanilla', '0000-00-00 00:00:00'),
(64, 'Strawberries', 'Strawberries', '0000-00-00 00:00:00'),
(65, 'Dragon Fruit', 'Dragon Fruit', '0000-00-00 00:00:00'),
(66, 'Macadamia Nuts', 'Macadamia Nuts', '0000-00-00 00:00:00'),
(67, 'Almonds', 'Almonds', '0000-00-00 00:00:00'),
(68, 'Chia Seeds', 'Chia Seeds', '0000-00-00 00:00:00'),
(69, 'Quinoa', 'Quinoa', '0000-00-00 00:00:00'),
(70, 'Blueberries', 'Blueberries', '0000-00-00 00:00:00'),
(71, 'Date Palm', 'Date Palm', '0000-00-00 00:00:00'),
(72, 'Teak', 'Teak', '0000-00-00 00:00:00'),
(73, 'Mahogany', 'Mahogany', '0000-00-00 00:00:00'),
(74, 'Neem Tree', 'Neem Tree', '0000-00-00 00:00:00'),
(75, 'Moringa', 'Moringa', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `id` bigint(20) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `othernames` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `branch_code` varchar(20) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_districts`
--

CREATE TABLE `tbl_districts` (
  `id` bigint(20) NOT NULL,
  `district_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_districts`
--

INSERT INTO `tbl_districts` (`id`, `district_name`) VALUES
(1, 'Asunafo North Municipal'),
(2, 'Asunafo South District'),
(3, 'Asutifi North District'),
(4, 'Asutifi South District'),
(5, 'Tano North Municipal'),
(6, 'Tano South Municipal'),
(7, 'Adansi North District'),
(8, 'Adansi South District'),
(9, 'Afigya Kwabre South District'),
(10, 'Ahafo Ano North Municipal'),
(11, 'Ahafo Ano South West District'),
(12, 'Amansie Central District'),
(13, 'Amansie West District'),
(14, 'Asante Akim Central Municipal'),
(15, 'Asante Akim North District'),
(16, 'Asante Akim South Municipal'),
(17, 'Asokore Mampong Municipal'),
(18, 'Atwima Kwanwoma District'),
(19, 'Atwima Mponua District'),
(20, 'Atwima Nwabiagya Municipal'),
(21, 'Bekwai Municipal'),
(22, 'Bosome Freho District'),
(23, 'Bosomtwe District'),
(24, 'Ejisu Municipal'),
(25, 'Ejura Sekyedumase Municipal'),
(26, 'Kumasi Metropolitan'),
(27, 'Kwabre East Municipal'),
(28, 'Mampong Municipal '),
(29, 'Obuasi Municipal'),
(30, 'Offinso Municipal'),
(31, 'Offinso North District'),
(32, 'Sekyere Afram Plains District'),
(33, 'Sekyere Central District'),
(34, 'Sekyere East District'),
(35, 'Sekyere Kumawu District'),
(36, 'Sekyere South District'),
(37, 'Oforikrom Municipal'),
(38, 'Kwadaso Municipal'),
(39, 'Old Tafo Municipal'),
(40, 'Asokwa Municipal'),
(41, 'Suame Municipal'),
(42, 'Juaben Municipal'),
(43, 'Ahafo Ano South East District'),
(44, 'Amansie South District'),
(45, 'Atwima Nwabiagya North District'),
(46, 'Akrofuom District'),
(47, 'Adansi Asokwa District'),
(48, 'Obuasi East District'),
(49, 'Afigya Kwabre North District'),
(50, 'Banda District'),
(51, 'Berekum East Municipal'),
(52, 'Dormaa Central Municipal'),
(53, 'Dormaa East District'),
(54, 'Dormaa West District'),
(55, 'Jaman North District'),
(56, 'Jaman South Municipal'),
(57, 'Sunyani Municipal'),
(58, 'Sunyani West District'),
(59, 'Tain District'),
(60, 'Wenchi Municipal'),
(61, 'Berekum West District'),
(62, 'Atebubu Amantin Municipal'),
(63, 'Kintampo North Municipal'),
(64, 'Kintampo South District'),
(65, 'Nkoranza South Municipal '),
(66, 'Nkoranza  North District'),
(67, 'Pru East District'),
(68, 'Sene East District'),
(69, 'Sene West District'),
(70, 'Techiman Municipal'),
(71, 'Techiman North District'),
(72, 'Pru West District'),
(73, 'Abura Asebu Kwamankese District'),
(74, 'Agona East District'),
(75, 'Agona West Municipal'),
(76, 'Ajumako Enyan Essiam District'),
(77, 'Asikuma Odoben Brankwa District'),
(78, 'Assin Central Municipal'),
(79, 'Assin South District'),
(80, 'Awutu Senya East Municipal'),
(81, 'Awutu Senya West District'),
(82, 'Cape Coast Metropolitan'),
(83, 'Effutu Municipal'),
(84, 'Ekumfi District'),
(85, 'Gomoa Central District'),
(86, 'Gomoa West District'),
(87, 'Komenda Edina Eguafo Abirem Municipal'),
(88, 'Mfantseman Municipal'),
(89, 'Twifo Atti Morkwa District'),
(90, 'Twifo Heman Lower Denkyira District'),
(91, 'Upper Denkyira East Municipal'),
(92, 'Upper Denkyira West District'),
(93, 'Assin North District'),
(94, 'Gomoa East District'),
(95, 'Akuapem North Municipal'),
(96, 'Akwapim South District'),
(97, 'Akyemansa District'),
(98, 'Asuogyaman District'),
(99, 'Atiwa West District'),
(100, 'Ayensuano District'),
(101, 'Birim Central Municipal'),
(102, 'Birim North District'),
(103, 'Birim South District'),
(104, 'Denkyembour District'),
(105, 'Abuakwa South Municipal'),
(106, 'Fanteakwa North District'),
(107, 'Kwaebibirem Municipal'),
(108, 'Kwahu Afram Plains North District'),
(109, 'Kwahu Afram Plains South District'),
(110, 'Kwahu East District'),
(111, 'Kwahu South District'),
(112, 'Kwahu West Municipal'),
(113, 'Lower Manya Krobo Municipal'),
(114, 'New Juaben South Municipal'),
(115, 'Nsawam Adoagyiri Municipal'),
(116, 'Suhum Municipal'),
(117, 'Upper Manya Krobo District'),
(118, 'Upper West Akim District'),
(119, 'West Akim Municipal'),
(120, 'Yilo Krobo Municipal'),
(121, 'Okere District'),
(122, 'Atiwa East District'),
(123, 'Fanteakwa South District'),
(124, 'Asene Manso Akroso District'),
(125, 'Abuakwa North Municipal'),
(126, 'New Juaben North Municipal'),
(127, 'Achiase District'),
(128, 'Accra Metropolitan'),
(129, 'Ada West District'),
(130, 'Ada East District'),
(131, 'Adentan Municipal'),
(132, 'Ashaiman Municipal'),
(133, 'Ga Central Municipal'),
(134, 'Ga South Municipal'),
(135, 'Ga East Municipal'),
(136, 'Ga West Municipal'),
(137, 'La Dade Kotopon Municipal'),
(138, 'Ledzekuku Municipal'),
(139, 'La Nkwantanang Madina Municipal'),
(140, 'Ningo Prampram District'),
(141, 'Shai Osudoku District'),
(142, 'Tema Metropolitan'),
(143, 'Kpone Katamanso Municipal'),
(144, 'Okaikwei North Municipal'),
(145, 'Ablekuma North Municipal'),
(146, 'Ablekuma West Municipal'),
(147, 'Ayawaso East Municipal'),
(148, 'Ayawaso North Municipal'),
(149, 'Ayawaso West Municipal'),
(150, 'Ga North Municipal'),
(151, 'Weija Gbawe Municipal'),
(152, 'Tema West Municipal'),
(153, 'Krowor Municipal'),
(154, 'Korle Klottey Municipal'),
(155, 'Ablekuma Central Municipal'),
(156, 'Ayawaso Central Municipal'),
(157, 'Bunkpurugu Nyankpanduri District'),
(158, 'Chereponi District'),
(159, 'East Mamprusi Municipal'),
(160, 'Mamprugu Moagduri District'),
(161, 'West Mamprusi Municipal'),
(162, 'Yunyoo-Nasuan District'),
(163, 'Gushegu Municipal'),
(164, 'Karaga District'),
(165, 'Kpandai District'),
(166, 'Kumbungu District'),
(167, 'Mion District'),
(168, 'Nanumba North Municipal'),
(169, 'Nanumba South District'),
(170, 'Saboba District'),
(171, 'Sagnarigu Municipal'),
(172, 'Savelugu Municipal'),
(173, 'Tamale Metropolitan'),
(174, 'Tatale/Sanguli District'),
(175, 'Tolon District'),
(176, 'Yendi Municipal'),
(177, 'Zabzugu District'),
(178, 'Nanton District'),
(179, 'Biakoye District'),
(180, 'Jasikan District'),
(181, 'Kadjebi District'),
(182, 'Krachi East Municipal'),
(183, 'Krachi Nchumuru District'),
(184, 'Krachi West District'),
(185, 'Nkwanta North District'),
(186, 'Nkwanta South Municipal'),
(187, 'Bole District'),
(188, 'Central Gonja District'),
(189, 'East Gonja Municipal'),
(190, 'North Gonja District'),
(191, 'Sawla-Tuna-Kalba District'),
(192, 'West Gonja Municipal'),
(193, 'North East Gonja District'),
(194, 'Bawku Municipal'),
(195, 'Bawku West District'),
(196, 'Binduri District'),
(197, 'Bolgatanga Municipal'),
(198, 'Bongo District'),
(199, 'Builsa North Municipal'),
(200, 'Builsa South District'),
(201, 'Garu District'),
(202, 'Kassena Nankana Municipal'),
(203, 'Kassena Nankana West District'),
(204, 'Nabdam District'),
(205, 'Pusiga District'),
(206, 'Talensi District'),
(207, 'Bolgatanga East District'),
(208, 'Tempane District'),
(209, 'Daffiama Bussie Issa District'),
(210, 'Jirapa Municipal'),
(211, 'Lambussie Karni District'),
(212, 'Lawra Municipal'),
(213, 'Nadowli Kaleo District'),
(214, 'Nandom Municipal'),
(215, 'Sissala East Municipal'),
(216, 'Sissala West District'),
(217, 'Wa East District'),
(218, 'Wa Municipal'),
(219, 'Wa West District'),
(220, 'Adaklu District'),
(221, 'Afadzato South District'),
(222, 'Agotime Ziope District'),
(223, 'Akatsi North District'),
(224, 'Akatsi South District'),
(225, 'Central Tongu District'),
(226, 'Ho Municipal'),
(227, 'Ho West District'),
(228, 'Hohoe Municipal'),
(229, 'Keta Municipal'),
(230, 'Ketu North Municipal'),
(231, 'Ketu South Municipal'),
(232, 'Kpando Municipal'),
(233, 'North Dayi District'),
(234, 'North Tongu District'),
(235, 'South Dayi District'),
(236, 'South Tongu District'),
(237, 'Anloga District'),
(238, 'Ahanta West Municipal'),
(239, 'Amenfi Central District'),
(240, 'Wassa Amenfi East Municipal'),
(241, 'Amenfi West Municipal'),
(242, 'Ellembelle District'),
(243, 'Jomoro Municipal'),
(244, 'Mpohor District'),
(245, 'Nzema East Municipal'),
(246, 'Prestea-Huni Valley Municipal'),
(247, 'Sekondi Takoradi Metropolitan'),
(248, 'Shama District'),
(249, 'Tarkwa Nsuaem Municipal'),
(250, 'Wassa East District'),
(251, 'Effia Kwesimintsim Municipal'),
(252, 'Aowin Municipal'),
(253, 'Bia East District'),
(254, 'Bia West District'),
(255, 'Bibiani-Anhwiaso Bekwai Municipal'),
(256, 'Bodi District'),
(257, 'Juaboso District'),
(258, 'Sefwi Akontombra District'),
(259, 'Sefwi Wiawso Municipal'),
(260, 'Suaman District');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_growersdata`
--

CREATE TABLE `tbl_growersdata` (
  `id` bigint(20) NOT NULL,
  `pix` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `other_names` varchar(100) DEFAULT NULL,
  `ghana_card` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `farm_region` varchar(100) DEFAULT NULL,
  `farm_district` varchar(100) DEFAULT NULL,
  `crop_detail` varchar(250) NOT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  `assistant` varchar(10) DEFAULT NULL,
  `assistant_details` text DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `marketer_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_growersdata`
--

INSERT INTO `tbl_growersdata` (`id`, `pix`, `first_name`, `surname`, `other_names`, `ghana_card`, `phone_number`, `email_address`, `farm_region`, `farm_district`, `crop_detail`, `payment_method`, `assistant`, `assistant_details`, `date_time`, `marketer_id`) VALUES
(1, '0', 'Gabriel', 'Duon-naah', '', 'GHA-12343243', '0248383212', 'naahgabby1@gmail.com', '10', '220', '220', 'MOMO_GH', 'YES', 'Help nedd', '2025-03-21 10:48:25', 'Gilbert Amoa'),
(2, 'pixx.jpeg', 'Muniru', 'Acquah', '', 'GHA-12324-14524', '025651442', 'naahgabby1@gmail.com', 'Greater Accra', 'Accra Metropolitan', 'Tomatoes', 'MOMO_GH', 'NO', '', '2025-03-21 11:10:53', 'rm@gmail.com'),
(3, '645c3e59-cc2f-473c-96f4-96e24873997b.jpeg', 'Daniella', 'Akuffo Addo', '', 'GHA-234234', '0266025932', 'naahgabby1@gmail.com', 'Northern', 'Adentan Municipal', 'Cloves', 'MOMO_GH', 'YES', 'Financial Assistant', '2025-03-21 12:24:12', 'rm@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organization`
--

CREATE TABLE `tbl_organization` (
  `id` int(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_organization`
--

INSERT INTO `tbl_organization` (`id`, `name`, `phone_number`, `image`, `date_created`) VALUES
(1, 'Aduanefie', '0248383212', 'shopimg.png', '2023-03-04 11:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_regions`
--

CREATE TABLE `tbl_regions` (
  `id` bigint(20) NOT NULL,
  `region_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_regions`
--

INSERT INTO `tbl_regions` (`id`, `region_name`) VALUES
(1, 'Greater Accra'),
(2, 'Ashanti '),
(3, 'Central'),
(4, 'Eastern'),
(5, 'Western'),
(6, 'Western North'),
(7, 'Volta'),
(8, 'Oti'),
(9, 'Bono'),
(10, 'Bono East'),
(11, 'Ahafo'),
(12, 'Northern'),
(13, 'North East'),
(14, 'Savannah'),
(15, 'Upper East'),
(16, 'Upper West');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(3) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `user_role`, `status`) VALUES
(1, 'Admin', 1),
(2, 'Grower', 1),
(3, 'Buyer', 1),
(4, 'Remote Marketer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_thisyearfarmers`
--

CREATE TABLE `tbl_thisyearfarmers` (
  `id` bigint(20) NOT NULL,
  `farmer_id` varchar(25) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `farm_size` double DEFAULT NULL,
  `crop` varchar(100) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `registered_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_thisyearfarmers`
--

INSERT INTO `tbl_thisyearfarmers` (`id`, `farmer_id`, `location`, `farm_size`, `crop`, `date_time`, `registered_by`) VALUES
(1, '2', 'Adenta', 100, 'Cassava', '2025-03-21 12:21:16', 'rm@gmail.com'),
(2, '2', 'Dodowa', 20, 'Cashew Nuts', '2025-03-21 12:22:40', 'rm@gmail.com'),
(3, '3', 'Accra', 12, 'Basil (Akuko Besa)', '2025-03-21 12:24:37', 'rm@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_role` int(1) DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT 0,
  `update_permission` int(1) NOT NULL DEFAULT 0,
  `delete_permission` int(1) NOT NULL DEFAULT 0,
  `organization` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `email`, `country`, `first_name`, `last_name`, `phone_number`, `password`, `user_role`, `date_created`, `status`, `update_permission`, `delete_permission`, `organization`) VALUES
(1, 'aduanefie@gmail.com', 'Ghana', 'Johnson', 'Excellent-Emmanuel', '0242371341', '827ccb0eea8a706c4c34a16891f84e7b', 1, '2023-03-02 16:03:29', 1, 1, 1, '1'),
(2, 'gaduanefie@gmail.com', 'Ghana', 'Mirabelle', 'Elinam', '0248383212', '827ccb0eea8a706c4c34a16891f84e7b', 2, '2025-03-01 16:03:59', 1, 0, 0, '1'),
(3, 'baduanefie@gmail.com', 'Ghana', 'Christopher', 'Klutse', '0266025932', '827ccb0eea8a706c4c34a16891f84e7b', 3, '2025-03-02 22:25:01', 1, 0, 0, '1'),
(4, 'rm@gmail.com', 'Ghana', 'Gilbert', 'Amoa', '0266025932', '827ccb0eea8a706c4c34a16891f84e7b', 4, '2025-03-02 22:25:01', 1, 0, 0, '1');

-- --------------------------------------------------------

--
-- Structure for view `logindetails`
--
DROP TABLE IF EXISTS `logindetails`;

CREATE VIEW `logindetails`  AS SELECT `tbl_users`.`id` AS `id`, `tbl_users`.`email` AS `email`, `tbl_users`.`first_name` AS `first_name`, `tbl_users`.`last_name` AS `last_name`, `tbl_users`.`phone_number` AS `phone_number`, `tbl_users`.`password` AS `password`, `tbl_users`.`user_role` AS `user_id`, `tbl_roles`.`user_role` AS `user_role`, `tbl_users`.`date_created` AS `date_created`, `tbl_users`.`status` AS `status`, `tbl_organization`.`name` AS `organization`, `tbl_organization`.`image` AS `aduanefie_image`, `tbl_users`.`update_permission` AS `update_permission`, `tbl_users`.`delete_permission` AS `delete_permission` FROM ((`tbl_users` join `tbl_roles` on(`tbl_users`.`user_role` = `tbl_roles`.`id`)) join `tbl_organization` on(`tbl_users`.`organization` = `tbl_organization`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_audittrail`
--
ALTER TABLE `tbl_audittrail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cropsgrowned`
--
ALTER TABLE `tbl_cropsgrowned`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_districts`
--
ALTER TABLE `tbl_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_growersdata`
--
ALTER TABLE `tbl_growersdata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marketer_id` (`marketer_id`);

--
-- Indexes for table `tbl_organization`
--
ALTER TABLE `tbl_organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_regions`
--
ALTER TABLE `tbl_regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_thisyearfarmers`
--
ALTER TABLE `tbl_thisyearfarmers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmer_id` (`farmer_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`phone_number`),
  ADD KEY `user_role` (`user_role`),
  ADD KEY `status` (`status`),
  ADD KEY `phone_number` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_audittrail`
--
ALTER TABLE `tbl_audittrail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_cropsgrowned`
--
ALTER TABLE `tbl_cropsgrowned`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_growersdata`
--
ALTER TABLE `tbl_growersdata`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_organization`
--
ALTER TABLE `tbl_organization`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_regions`
--
ALTER TABLE `tbl_regions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_thisyearfarmers`
--
ALTER TABLE `tbl_thisyearfarmers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

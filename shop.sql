-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2023 at 06:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `a` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `pass` varchar(55) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `pass`, `date_creation`) VALUES
(1, 'admin', 'admin', '2023-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `libell` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `libell`, `description`, `icon`, `date_creation`) VALUES
(1, 'Fitness', 'Fitness is a state of physical and mental well-being achieved through regular exercise, a balanced diet, and healthy habits. It improves strength, flexibility, cardiovascular health, and overall vitality. Consistency and lifestyle adjustments are key to a', 'fa-solid fa-dumbbell', '2023-07-24 08:34:58'),
(2, 'Running', 'Running is a form of aerobic exercise where one moves rapidly on foot. It improves cardiovascular fitness, strengthens muscles and bones, and aids in weight management. With various physical and mental benefits, running is a versatile and accessible activ', 'fa-solid fa-person-running', '2023-07-24 08:36:23'),
(3, 'Basketball', 'Basketball is a team sport played on a rectangular court, aiming to score points by shooting the ball through the opponent\'s hoop. Players use dribbling, passing, and shooting skills to move the ball and compete to win by scoring more points than the oppo', 'fa-solid fa-basketball', '2023-07-24 08:37:27'),
(4, 'Volleyball', 'Volleyball is a team sport played on a rectangular court with a net in the middle. The objective is to score points by hitting the ball over the net, aiming to make it land in the opponent\'s court while preventing them from doing the same. It requires tea', 'fa-solid fa-volleyball', '2023-07-24 08:38:30'),
(5, 'Football', 'Football is a team sport played with a round ball, where two teams of eleven players each aim to score goals by getting the ball into the opposing team\'s net. It is a fast-paced and highly competitive game enjoyed worldwide.', 'fa-solid fa-futbol', '2023-07-24 08:39:25'),
(6, 'Swimming', 'Swimming is a water-based activity that involves using arm and leg movements to propel oneself through the water. It provides a full-body workout, improving strength, endurance, and cardiovascular health. With low-impact on joints, it is suitable for peop', 'fa-solid fa-person-swimming', '2023-07-24 08:40:28'),
(7, 'Cyclisme', 'Cycling, or \"Cyclisme,\" is the activity of riding bicycles. It is a popular sport and form of exercise that offers low-impact, full-body workout benefits, promoting cardiovascular health, muscle strength, and mental well-being.', 'fa-solid fa-bicycle', '2023-07-24 08:41:17'),
(8, 'Sports Essentials', '\"Sports Essentials: Your one-stop destination for all your sporting needs. Discover a curated selection of top-quality gear and equipment for football, volleyball, fitness, tennis, and more. Whether you\'re a beginner or a seasoned athlete, we\'ve got you c', 'fa-solid fa-medal', '2023-07-26 12:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `orderr`
--

CREATE TABLE `orderr` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `valid` int(11) NOT NULL DEFAULT 0,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderr`
--

INSERT INTO `orderr` (`id`, `id_user`, `total`, `valid`, `date_creation`) VALUES
(1, 1, '5396', 1, '2023-07-31 00:06:37'),
(2, 1, '275', 0, '2023-07-31 00:12:55'),
(3, 1, '460', 1, '2023-07-31 00:26:32'),
(4, 1, '1194', 0, '2023-07-31 22:31:26'),
(5, 1, '796', 0, '2023-07-31 22:33:04'),
(6, 1, '98', 0, '2023-07-31 22:46:14'),
(7, 1, '825', 0, '2023-07-31 23:36:19'),
(8, 2, '398', 0, '2023-08-01 16:17:05'),
(9, 3, '574', 1, '2023-08-01 16:45:42'),
(10, 4, '1116', 1, '2023-08-01 16:53:39'),
(11, 4, '460', 1, '2023-08-01 16:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

CREATE TABLE `order_line` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_orderr` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_line`
--

INSERT INTO `order_line` (`id`, `id_product`, `id_orderr`, `price`, `quantity`, `total`) VALUES
(1, 3, 1, '299', 1, '299'),
(2, 6, 1, '4199', 1, '4199'),
(3, 8, 1, '699', 1, '699'),
(4, 10, 1, '199', 1, '199'),
(5, 11, 2, '275', 1, '275'),
(6, 12, 3, '460', 1, '460'),
(7, 10, 4, '199', 6, '1194'),
(8, 10, 5, '199', 4, '796'),
(9, 13, 6, '49', 2, '98'),
(10, 11, 7, '275', 3, '825'),
(11, 10, 8, '199', 2, '398'),
(12, 3, 9, '299', 1, '299'),
(13, 11, 9, '275', 1, '275'),
(14, 3, 10, '299', 2, '598'),
(15, 4, 10, '259', 2, '518'),
(16, 12, 11, '460', 1, '460');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `libell` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `discount` int(11) DEFAULT 0,
  `finalePrice` decimal(10,0) NOT NULL DEFAULT (`price` - `price` * `discount` / 100),
  `date_creation` datetime DEFAULT NULL,
  `image_product` varchar(255) DEFAULT NULL,
  `gender` char(100) DEFAULT 'both',
  `is_accessory` varchar(10) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `libell`, `description`, `price`, `discount`, `finalePrice`, `date_creation`, `image_product`, `gender`, `is_accessory`, `id_category`) VALUES
(1, 'CHAUSSURE DE RUNNING HOMME RUN ACTIVE GRIP NOIR GR', 'Lightweight, stylish & supportive shoes - 295g (size 43), sizes 40 to 47 available. 10mm drop for a natural stride; comfort & performance combined.', '399', 0, '399', '2023-07-25 11:52:13', 'product250723115213.jpg', 'men', 'no', 2),
(2, 'CHAUSSURES DE RUNNING FEMME KALENJI RUN ACTIVE ROS', 'Pointures disponibles: 36 au 42.\r\nPoids d\'une chaussure Run Active: 204 g (pointure 39).', '349', 42, '202', '2023-07-25 11:57:47', 'product250723115747.jpg', 'women', 'no', 2),
(3, 'KIT HALTÈRES MUSCULATION 10 KG', '- 2 kg bar \r\n- 2 disc stops\r\n- 4 x 1 kg weights \r\n- 2 x 2 kg weights ', '299', 16, '251', '2023-07-26 12:13:51', 'product260723121351.jpg', 'both', 'no', 1),
(4, 'FAUTEUIL PLIANT POUR LE CAMPING - BAS', 'Durable camping chairs for occasional outdoor use. Avoid prolonged UV exposure for optimal lifespan. Store when not in use for lasting performance.', '259', 0, '259', '2023-07-26 12:25:04', 'product260723122504.jpg', 'men', 'yes', 8),
(5, 'BALLON DE BASKET  TAILLE 7 MARRON FIBA  À PARTIR D', 'Size 7 Basketball: Indoor and outdoor play. For boys and men (13+). FIBA regulation approved.', '299', 0, '299', '2023-07-26 12:34:46', 'product260723123446.jpg', 'both', 'no', 3),
(6, 'VÉLO VTT ST 100 JAUNE AF 27,5', 'VTT Sizes: XS to XL (1.40m - 2.00m). Tips: Toes touch ground seated, slight knee bend at lowest pedal.', '4199', 28, '3023', '2023-07-26 12:38:24', 'product260723123824.jpg', 'both', 'no', 7),
(7, 'BALLON DE VOLLEY-BALL V900 BLANC/ROUGE', 'Player-inspired ball: Lightweight, durable, and pro-standard. Comfortable touch, iconic design, and controlled trajectories for an elevated game.', '299', 0, '299', '2023-07-26 12:43:35', 'product260723124335.jpg', 'both', 'no', 4),
(8, 'CHAUSSURES DE FOOTBALL ', 'Discover VIRALTO III football shoes with Kipsta 3D Air Mesh for superior comfort, ball touch, and durability. Personalize your pair at DECATHLON Atelier for a unique touch on the field.', '699', 57, '301', '2023-07-26 12:48:30', 'product260723124830.jpg', 'men', 'no', 5),
(9, 'BURKINI DANA 500', 'Our top is made of 100% polyester with PBT fibers, offering elasticity, chlorine-resistance, and quick-drying benefits. It includes a built-in bra for chest protection and added comfort.', '699', 0, '699', '2023-07-26 12:51:46', 'product260723125146.jpg', 'women', 'no', 6),
(10, 'Gym Ball avec pompe', 'Strengthen, balance, and flex with our gym ball. Anti-slip, anti-explosion, 900g, pump included.', '199', 0, '199', '2023-07-26 12:58:48', 'product260723125848.jpg', 'both', 'yes', 1),
(11, 'BASEB CLASS TRE', 'BASEB CLASS TRE - Streetwear for boys. A perfect blend of comfort and style, ready to elevate your daily look.', '275', 0, '275', '2023-07-26 01:09:41', 'product260723010941.jpg', 'men', 'yes', 8),
(12, 'W MARIM LAI DUF WHITEBLACK', 'Elevate fitness with \"W MARIM LAI DUF WHITEBLACK\" sports bra. Empowering style and support for medium impact workouts.', '460', 0, '460', '2023-07-26 01:12:51', 'product260723011650.jpg', 'both', 'yes', 1),
(13, 'TONGS HOMME TO 100 NOIR', 'OLAIAN\'s iconic flip-flops: Surfer\'s choice for comfort and convenience. Easy slip-on, perfect for pre and post-surf sessions.', '49', 0, '49', '2023-07-26 01:21:34', 'product260723012134.jpg', 'men', 'no', 8),
(18, 'DOUDOUNE SYNTHÉTIQUE', 'Warm & eco-friendly Doudoune: -5°C thermal comfort, windproof, PFC-free water repellent, and reduced CO2 emissions.', '600', 20, '480', '2023-07-26 11:46:18', 'product260723114618.jpg', 'women', 'no', 8),
(19, 'ROULEAU DE MASSAGE / FOAM ROLLER 500 HARD', 'The Foam Roller 500 Hard: Intense self-massage for enhanced muscle recovery.', '350', 20, '280', '2023-07-26 11:47:56', 'product260723114756.jpg', 'both', 'yes', 8),
(20, 'CN 1P DRESS SUE SNAKE', 'OLAIAN offers beginner surfers a comfortable and stylish SUE one-piece swimsuit with removable integrated cups, perfect for occasional surfing in small waves.', '299', 0, '299', '2023-07-26 11:49:46', 'product260723114946.jpg', 'women', 'no', 8);

-- --------------------------------------------------------

--
-- Table structure for table `userr`
--

CREATE TABLE `userr` (
  `id_user` int(11) NOT NULL,
  `fname` varchar(55) DEFAULT NULL,
  `lname` varchar(55) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `numero` varchar(55) DEFAULT NULL,
  `pass` varchar(55) DEFAULT NULL,
  `country` varchar(55) DEFAULT NULL,
  `city` varchar(55) DEFAULT NULL,
  `adress1` varchar(255) DEFAULT NULL,
  `adress2` varchar(255) DEFAULT NULL,
  `zipcode` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userr`
--

INSERT INTO `userr` (`id_user`, `fname`, `lname`, `email`, `numero`, `pass`, `country`, `city`, `adress1`, `adress2`, `zipcode`) VALUES
(1, 'Soufiane', 'Mouahhidi', 'mouahhidisoufiane3@gmail.com', '+212568678878', 'mansfiani', 'Morocco', 'Agadir', 'rue bin el ouidane', '', '80000'),
(2, 'Soufiane', 'Mouahhidi', 'mouahhidisoufiane3@gmail.com', '+212565485213', '12345678', 'Morocco', 'Agadir', '', '', '80000'),
(3, 'test', 'test', 'soufiane@sfiani.com', '+212568678852', 'soufiane', 'Morocco', 'agadir', 'rue bin el ouidane', '', '80000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `orderr`
--
ALTER TABLE `orderr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_line`
--
ALTER TABLE `order_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkproduct` (`id_product`),
  ADD KEY `fkorderr` (`id_orderr`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `userr`
--
ALTER TABLE `userr`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`,`pass`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orderr`
--
ALTER TABLE `orderr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_line`
--
ALTER TABLE `order_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `userr`
--
ALTER TABLE `userr`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_line`
--
ALTER TABLE `order_line`
  ADD CONSTRAINT `fkorderr` FOREIGN KEY (`id_orderr`) REFERENCES `orderr` (`id`),
  ADD CONSTRAINT `fkproduct` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

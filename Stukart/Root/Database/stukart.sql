-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2022 at 05:32 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stukart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`) VALUES
(277, 28, 22),
(278, 28, 21),
(279, 28, 27);

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `fav_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`fav_id`, `user_id`, `item_id`) VALUES
(177, 25, 8),
(178, 25, 12),
(185, 28, 27),
(188, 28, 19);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `ord_date` varchar(20) NOT NULL,
  `ord_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `user_id`, `item_id`, `ord_date`, `ord_time`) VALUES
(34, 28, 27, '18 Jan,2022', '14:04'),
(35, 28, 23, '18 Jan,2022', '14:04'),
(36, 28, 26, '18 Jan,2022', '14:04');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_seller` varchar(200) NOT NULL,
  `item_category` varchar(10) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_mrp` double(10,2) NOT NULL,
  `item_selling_price` double(10,2) NOT NULL,
  `item_image_url` varchar(200) NOT NULL,
  `item_description` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_seller`, `item_category`, `item_name`, `item_mrp`, `item_selling_price`, `item_image_url`, `item_description`) VALUES
(19, 'Mohit Sharma', 'Stationary', 'Database Management Systems (Dbms)', 699.00, 499.00, 'IMG-61e54dd8356f69.62878735.jpg', 'Reading books is a kind of enjoyment. Reading books is a good habit. We bring you a different kinds of books. You can carry this book where ever you want. It is easy to carry. It can be an ideal gift to yourself and to your loved ones. Care instruction keep away from fire.'),
(20, 'Mohit Sharma', 'Stationary', 'Computer Networking – A top down approach featuring the Internet', 999.00, 772.00, 'IMG-61e54e5a1c3127.28071659.jpg', 'Building on the successful top-down approach of previous editions, the Sixth Edition of Computer Networking continues with an early emphasis on application-layer paradigms and application programming interfaces (the top layer), encouraging a hands-on experience with protocols and networking concepts, before working down the protocol stack to more abstract layers.\r\n\r\n\r\nThis book has become the dominant book for this course because of the authors’ reputations, the precision of explanation, the quality of the art program and the value of their own supplements.\r\nFeatures A balanced presentation focuses on the Internet as a specific motivating example of a network and also introduces students to protocols in a more theoretical context.\r\nA chapter on wireless and mobility includes insight into 802.11 and coverage of ad hoc networking.\r\nPrinciples and Practice boxes throughout demonstrate real-world applications of the principles studied.\r\nCase History boxes are sprinkled in to help tell the story of the history and development of computer networking.\r\nMaterial on application programming development is included, along with numerous programming assignments.\r\nA highly developed art program enhances the descriptions of concepts.\r\nA comprehensive Companion Website, which includes additional learning material, links to relevant online resources and lab material'),
(21, 'Mohit Sharma', 'Stationary', 'Automata Theory Language & Computation', 899.00, 734.00, 'IMG-61e5506ce64be0.66670988.jpg', 'This classic book on formal languages, automata theory and computational complexity has been updated to present theoretical concepts in a concise and straightforward manner with the increase of hands-on, practical applications. This new edition comes with Gradiance, an online assessment tool developed for computer science. Gradiance is the most advanced online assessment tool developed for the computer science discipline. With its innovative underlying technology, Gradiance turns basic homework assignments and programming labs into an interactive learning experience for students. By using a series of root questions and hints, it simulates a one-on-one teacher-student tutorial that allows for the student to more easily learn the material. Through the programming labs, instructors are capable of testing, tracking and honing their skills, both in terms of syntax and semantics, with an unprecedented level of assessment never before offered.'),
(22, 'Mohit Sharma', 'Gadgets', 'Casio FX-991EX Classwiz Non-Programmable Scientific Calculator, 552 Functions with Menu Driven Interface', 1499.00, 999.00, 'IMG-61e5512e591216.65048828.jpg', 'Non-Programmable Scientific Calculator with 552 Functions\r\n4-times better resolution than Casio 991ES Plus for easier viewing of long expressions\r\nNatural Textbook Display- Input and display fractions, powers, logarithms, roots, and other mathematical formulas and symbol just as they appear in textbooks\r\nScientific Calculator with inbuilt QR Code function --Calculator can generate QR Code -- Useful from graphical visualization & accessing user manual using your smart phone\r\nFaster than any previous Casio Non-Programmable Scientific Calculator\r\nUp to Four Degree Simultaneous and Polynomial Solver, Numerical Integration, Differentiation, Statistics, Matrix, Vector Calculation\r\nAttractive and elegant look with metallic keys, Colour coded keypad for easy key differentiation\r\nDual Powered - Solar & Battery Solar powered when light is sufficient, battery powered when light is insufficient.\r\nRecommended for Engineering, Polytechnic and various others Under Graduate courses'),
(24, 'Mohit Sharma', 'Gadgets', 'Redmi 9 Activ (Coral Green, 4GB RAM, 64GB Storage)', 10999.00, 6999.00, 'IMG-61e55269cd75b2.36382665.jpg', 'Processor: Octa-core Helio G35 and upto 2.3GHz clock speed\r\nCamera: 13+2 MP Dual Rear camera with AI portrait| 5 MP front camera\r\nDisplay: 16.58 centimeters (6.53-inch) HD+ display with 720x1600 pixels and 20:9 aspect ratio\r\nBattery: 5000 mAH large battery with 10W wired charger in-box\r\nMemory, Storage & SIM: 4GB RAM | 64GB storage | Dual SIM (nano+nano) + Dedicated SD card slot'),
(25, 'Mohit Sharma', 'Furniture', 'Nilkamal EeezyGo Plastic Chair (Brown), 60 * 57 * 74 (CHREEEZYGOSRB)', 999.00, 500.00, 'IMG-61e552f64e7a96.96618207.jpg', 'Dimension(cm); Width : 60; Depth : 57; Height : 74\r\nIt is premium mid back chair comes in bucket design matt finish & made of durable moulded plastic which is long lasting comfortable chair. Material : Plastic\r\nCan be used for outdoor, Indoor, Garden, cafeteria, office, waiting chair, events, etc. Weight Bearing Capacity : 125 Kg'),
(26, 'Mohit Sharma', 'Gadgets', 'ASUS VivoBook 14 (2021), 14-inch (35.56 cms) FHD, Intel Core i7-1065G7 10th Gen, Thin and Light Laptop (16GB/512GB SSD/Integrated Graphics/Office 2021/Windows 11/Silver/1.6 Kg), X415JA-EK701WS', 82990.00, 39999.00, 'IMG-61e55363ca9a93.09829363.jpg', 'Processor: Intel Core i7-1065G7, 1.3 GHz Base Speed, Up to 3.9 GHz Max Turbo Speed, 4 cores, 8 Threads, 8MB Cache\r\nMemory: 16GB (8GB onboard + 8GB SO-DIMM) DDR4 3200MHz | Storage: 512GB M.2 NVMe PCIe 3.0 SSD with 1x 2.5-inch SATA slot for HDD/SSD Storage upgrade up to 1TB\r\nGraphics: Integrated Intel UHD Graphics\r\nDisplay: 14-Inch (35.56 cms) LED-Backlit LCD, FHD (1920 x 1080) 16:9, 220nits, NanoEdge bezel, Anti-Glare Plane with 45% NTSC, 82% Screen-To-Body Ratio\r\nOperating System: Windows 11 Home with Lifetime Validity | Software Included: Office Home and Student 2021\r\nDesign & battery: Up to 19.9mm Thin | NanoEdge Bezels | Thin and Light Laptop | Laptop weight: 1.6 kg | 37WHrs, 2-cell Li-ion battery | Up to 6 hours battery life ;Note: Battery life depends on conditions of usage\r\nKeyboard: Chiclet Keyboard with 1.4mm Key Travel'),
(27, 'Mohit Sharma', 'Others', 'Ajanta Extension Board Heavy Duty Wire Spike & Surge Guard | 4 Way Extension Boards (White) - 4 Meter', 695.00, 299.00, 'IMG-61e5544281d237.68341468.jpg', '4 -Way Extension Board\r\n4-Universal Socket Specially Designed to Accommodate Plugs of Different Design & Types\r\nHeavy - Duty Brass Contact With Hard Spring for Long Life.\r\nHeavy Duty Cable as per Bis Standard for High Current Carrying Capacity & Enhanced Safety\r\nEnergy Saving Due to Special Contact Design & Low Contact Resistance');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` int(6) NOT NULL,
  `gender` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `phone`, `email`, `password`, `age`, `city`, `pincode`, `gender`) VALUES
(28, 'Mohit Sharma', 6006114929, 'bmohits0203@gmail.com', '123', 20, 'Bangalore', 560068, 'Male'),
(29, 'Mudagandur Nirbhaymanoj', 8378042805, 'nirbhay.sainik@gmail.com', '123', 19, 'Bangalore', 560068, 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`fav_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

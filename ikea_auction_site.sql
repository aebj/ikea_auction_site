-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 10, 2021 at 10:15 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ikea_auction_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

CREATE TABLE `auctions` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_users_id` int(11) NOT NULL,
  `expiration` datetime NOT NULL,
  `minimum_price` int(11) NOT NULL,
  `items_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auctions`
--

INSERT INTO `auctions` (`id`, `created_at`, `created_by_users_id`, `expiration`, `minimum_price`, `items_id`) VALUES
(1, '2021-06-08 14:16:25', 2, '2021-07-11 12:00:00', 1000, 2),
(2, '2021-06-09 19:19:32', 3, '2021-07-15 12:00:00', 700, 4),
(3, '2021-06-09 19:19:32', 1, '2021-07-01 12:00:00', 500, 3),
(4, '2021-06-10 23:16:09', 5, '2021-06-24 10:00:00', 900, 5),
(5, '2021-06-10 23:23:01', 5, '2021-06-26 14:00:00', 500, 6),
(6, '2021-06-10 23:25:04', 5, '2021-06-27 18:00:00', 400, 7),
(7, '2021-06-10 23:29:33', 6, '2021-07-22 20:00:00', 300, 8),
(8, '2021-06-10 23:31:32', 6, '2021-08-01 10:00:00', 1000, 9),
(9, '2021-06-10 23:33:27', 6, '2021-07-01 21:00:00', 350, 10),
(10, '2021-06-10 23:38:09', 7, '2021-06-23 16:00:00', 250, 11),
(11, '2021-06-10 23:41:17', 7, '2021-06-25 23:59:00', 1200, 12),
(12, '2021-06-10 23:44:08', 7, '2021-06-28 14:00:00', 600, 13),
(13, '2021-06-10 23:48:01', 8, '2021-07-07 17:00:00', 350, 14),
(14, '2021-06-10 23:51:56', 8, '2021-07-02 12:00:00', 450, 15),
(15, '2021-06-10 23:57:10', 8, '2021-07-04 07:00:00', 1700, 16);

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auctions_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `amount`, `created_at`, `auctions_id`, `users_id`) VALUES
(1, 250, '2021-06-08 14:17:02', 1, 3),
(2, 300, '2021-06-08 14:17:22', 1, 1),
(3, 350, '2021-06-08 14:17:50', 1, 3),
(4, 100, '2021-06-09 19:20:25', 3, 2),
(5, 150, '2021-06-09 19:20:25', 2, 2),
(6, 150, '2021-06-10 23:58:28', 3, 8),
(7, 150, '2021-06-10 23:59:04', 4, 8),
(8, 50, '2021-06-10 23:59:22', 7, 8),
(9, 100, '2021-06-10 23:59:57', 11, 8),
(10, 200, '2021-06-11 00:00:33', 2, 8),
(11, 300, '2021-06-11 00:00:54', 8, 8),
(12, 500, '2021-06-11 00:02:30', 15, 5),
(13, 100, '2021-06-11 00:03:24', 9, 5),
(14, 50, '2021-06-11 00:03:45', 10, 5),
(15, 200, '2021-06-11 00:04:07', 11, 5),
(16, 100, '2021-06-11 00:04:34', 13, 5),
(17, 400, '2021-06-11 00:05:43', 1, 5),
(18, 200, '2021-06-11 00:06:37', 5, 7),
(19, 200, '2021-06-11 00:06:55', 12, 7),
(20, 200, '2021-06-11 00:07:06', 3, 7),
(21, 150, '2021-06-11 00:07:15', 6, 7),
(22, 400, '2021-06-11 00:07:35', 8, 7),
(23, 150, '2021-06-11 00:08:12', 9, 7),
(24, 400, '2021-06-11 00:08:29', 2, 7),
(25, 300, '2021-06-11 00:08:44', 4, 7),
(26, 200, '2021-06-11 00:08:59', 14, 7),
(27, 700, '2021-06-11 00:09:31', 15, 7),
(28, 250, '2021-06-11 00:10:47', 14, 3),
(29, 150, '2021-06-11 00:11:04', 13, 3),
(30, 250, '2021-06-11 00:11:17', 5, 3),
(31, 200, '2021-06-11 00:11:31', 9, 3),
(32, 100, '2021-06-11 00:11:40', 7, 3),
(33, 100, '2021-06-11 00:11:51', 10, 3),
(34, 201, '2021-06-11 00:12:06', 11, 3),
(35, 300, '2021-06-11 00:12:20', 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Chairs'),
(2, 'Tables'),
(3, 'Lamps');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `description`, `image`, `cat_id`) VALUES
(2, 'Velourovertrukket gulvlampe', '4 år gammel - let slidt\r\n150 cm høj', 'gulvlampe.jpg', 3),
(3, 'Hvidt spisebord', '1 år gammelt', 'dethvidespisebord.jpg', 2),
(4, 'Blomsterovertrukket lænestol', '5 år\r\nOmpolstret i 2020', 'derkommerblomster.jpg', 1),
(5, 'Guld skrivebordslampe', 'Fejlkøb. Helt ny lampe, slet ikke brugt. NP: 1000 kr.', 'lampe2.jpg', 3),
(6, 'Skrivebord med træbordplade', 'Skrivebord med 3 skuffer', 'bord3.jpg', 2),
(7, 'Kontorstol', 'Sort kontorstol med et net som ryglæn - super behagelig.', 'stol3.jpg', 1),
(8, 'Loftslampe', 'Lavet med flettet net og hænger i en sort ledning til loftet', 'lampe3.jpeg', 3),
(9, 'Træ stol', '4 stk. meget behagelige træstole - matcher godt med andre træ møbler', 'stol4.jpg', 1),
(10, 'Træ sofabord', 'Lettere brugt sofabord - fejler intet. Har en \"hylde\" under bordpladen til ekstra plads', 'bord4.jpg', 2),
(11, '\"Sky\" lampe', 'Lampeskærmen er lavet af noget stof som gør at lampen er tændt samtidig med at det er mørkt udenfor, så ligner det lampen en sky oppe i loftet', 'lampe5.jpg', 3),
(12, 'Blogger bord', 'Mega kendt lille natbord som alle bare kender og gerne vil have fat i. Bordet er sort og har bare stået i et hjørne', 'bord5.jpg', 2),
(13, 'Betrukket spisebordsstol', '6 stk i hvidt stof. 2 år gamle ', 'stol5.jpg', 1),
(14, 'Bord lampe', 'Sølv skrivebordslampe. 1 år gammel - så god som ny', 'lampe4.jpg', 3),
(15, 'Spisebord med klapside', 'Lækkert bord til små lejligheder fordi bordpladen kan klappes ned. Har stået i køkkenet til ekstra bordplads. 2 år gammelt.', 'bord2.jpeg', 2),
(16, 'Lænestol med tilhørende fodskammel', 'Den bedste lænestol nogensinde! Sælges grundet flytning og jeg har ikke længere plads til den, så nu er der en anden som kan få glæde af den. Ca. 3 måneder gammel', 'stol2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `phone_no`, `email`, `password`) VALUES
(1, 'Jens', 'Christensen', 'jc2000', 12309874, 'jc2000@hotmail.com', '4321'),
(2, 'Frank', 'Hvam', 'klovn', 12345678, 'dervarengang@zulu.dk', '0123'),
(3, 'Søren', 'Jørgensen', 'sonnyboi', 48302943, 'boi1234@gmail.com', '5555'),
(4, 'admini', 'strator', 'admin', 1010101, 'admin@admin.dk', 'admin'),
(5, 'Anders', 'Hemmingsen', 'Baloo', 49124209, 'baloo@hotmail.com', '5436'),
(6, 'Andrea', 'Mortensen', 'mortensen425', 90215406, 'am12@gmail.com', 'dervarengang12'),
(7, 'Lisa', 'Frandsen', 'Hans-Jørgen', 49206820, 'frandsendk@ibc.dk', '0987654321'),
(8, 'Jonathan', 'Simonsen', 'kitkat', 47104729, 'hr_kitkat@hotmail.dk', 'jegelskerkitkat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auctions`
--
ALTER TABLE `auctions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_created_by_users_id_idx` (`created_by_users_id`),
  ADD KEY `fk_items_items_id_idx` (`items_id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_users_id_idx` (`users_id`),
  ADD KEY `fk_auctions_auctions_id_idx` (`auctions_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categories_cat_id_idx` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auctions`
--
ALTER TABLE `auctions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auctions`
--
ALTER TABLE `auctions`
  ADD CONSTRAINT `fk_items_items_id` FOREIGN KEY (`items_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `fk_users_created_by_users_id` FOREIGN KEY (`created_by_users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `fk_auctions_auctions_id` FOREIGN KEY (`auctions_id`) REFERENCES `auctions` (`id`),
  ADD CONSTRAINT `fk_users_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_categories_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

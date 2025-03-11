-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2024 at 03:27 PM
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
-- Database: `home_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
('BcjKNX58e4x7bIqIvxG7', 'Rishi', 'dd010fbe6b6fda5e0792c19c7b401066ae1e26c4'),
('3Ad3CFUBAaagxsVLTzE5', 'webbuilders', '8cb2237d0679ca88db6464eac60da96345513964');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(20) NOT NULL,
  `receiver_id` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `property_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `price` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `offer` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `furnished` varchar(50) NOT NULL,
  `bhk` varchar(10) NOT NULL,
  `deposite` varchar(10) NOT NULL,
  `bedroom` varchar(10) NOT NULL,
  `bathroom` varchar(10) NOT NULL,
  `balcony` varchar(10) NOT NULL,
  `carpet` varchar(10) NOT NULL,
  `age` varchar(2) NOT NULL,
  `total_floors` varchar(2) NOT NULL,
  `room_floor` varchar(2) NOT NULL,
  `loan` varchar(50) NOT NULL,
  `lift` varchar(3) NOT NULL DEFAULT 'no',
  `security_guard` varchar(3) NOT NULL DEFAULT 'no',
  `play_ground` varchar(3) NOT NULL DEFAULT 'no',
  `garden` varchar(3) NOT NULL DEFAULT 'no',
  `water_supply` varchar(3) NOT NULL DEFAULT 'no',
  `power_backup` varchar(3) NOT NULL DEFAULT 'no',
  `parking_area` varchar(3) NOT NULL DEFAULT 'no',
  `gym` varchar(3) NOT NULL DEFAULT 'no',
  `shopping_mall` varchar(3) NOT NULL DEFAULT 'no',
  `hospital` varchar(3) NOT NULL DEFAULT 'no',
  `school` varchar(3) NOT NULL DEFAULT 'no',
  `market_area` varchar(3) NOT NULL DEFAULT 'no',
  `image_01` varchar(50) NOT NULL,
  `image_02` varchar(50) NOT NULL,
  `image_03` varchar(50) NOT NULL,
  `image_04` varchar(50) NOT NULL,
  `image_05` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `approval_status` enum('pending','approved','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `user_id`, `property_name`, `address`, `price`, `type`, `offer`, `status`, `furnished`, `bhk`, `deposite`, `bedroom`, `bathroom`, `balcony`, `carpet`, `age`, `total_floors`, `room_floor`, `loan`, `lift`, `security_guard`, `play_ground`, `garden`, `water_supply`, `power_backup`, `parking_area`, `gym`, `shopping_mall`, `hospital`, `school`, `market_area`, `image_01`, `image_02`, `image_03`, `image_04`, `image_05`, `description`, `date`, `approval_status`) VALUES
('Pd0sng1C8wVFemyqnQXc', '0mWVPTuMmBIN5dYm57ic', 'shop', 'urumpirai', '52000', 'house', 'rent', 'ready to move', 'furnished', '3', '25000', '1', '2', '0', '1', '12', '2', '0', 'available', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '0wyCse2dRKVD0lBN8UAg.jpg', 'A31TQgPKkmGukv55c7O3.webp', 'dzgt8KiLuayDRWI9T39d.webp', 'JBvyYGXw8w6wSLYzntsK.jpg', 'XRnSSTA7Jr1JHwcJKb5k.webp', 'fun thamai', '2024-04-19', 'pending'),
('kiLMuue6n641ktW8oYsN', '0mWVPTuMmBIN5dYm57ic', 'ironmanhouse ', 'newyork', '7400000', 'house', 'sale', 'under construction', 'furnished', '5', '52800', '1', '1', '2', '24', '2', '12', '0', 'available', 'yes', 'yes', 'no', 'yes', 'yes', 'no', 'yes', 'yes', 'no', 'no', 'no', 'no', 'vu5HUhDlRu3LOppxmPEU.webp', '', '', '', '', 'love u 3000', '2024-04-26', 'approved'),
('zWlHCPku2mxnBiUfsELZ', 'mZOmrbWLE0AMhM5mZKE0', 'Village house', 'Hatton,Dickoya,summerville6', '6000', 'house', 'rent', 'ready to move', 'furnished', '', '', '2', '', '', '2', '', '', '', 'available', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'NVCapL9rspHHASNVBRXy.jpg', '', '', '', '', 'beautiful houses with natural scenic', '2024-05-10', 'approved'),
('KFJb0MXtNFHgBH85noNf', 'ielfWePQodxsyr4KFTmD', 'HillStation Villa', 'Nuwareliya North,Dumro', '16000000', 'house', 'sale', 'ready to move', 'furnished', '', '', '4', '', '', '10', '', '', '1', 'available', 'no', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'no', 'no', 'no', 'no', 'UVsitdffDUbF2Z5XzGOL.jpg', 'ESzn3fs0oVwwF5JWNugm.jpg', 'btXTb0dNt6mjuyYySzgx.jpg', '', '', 'nature view with rain feel best for honey moon couples', '2024-05-10', 'approved'),
('6Fk7CrgkL1vg4MbNsw7t', '0mWVPTuMmBIN5dYm57ic', 'shop', 'kokkuvil', '5000', 'flat', 'sale', 'ready to move', '', '', '', '', '', '', '2', '', '', '', 'available', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'i4jz6BnRQrMWi5MdbKn2.jpg', '', '', '', '', 'hij', '2024-05-15', 'pending'),
('y0rHf9eY99E4piMhCxfq', '0mWVPTuMmBIN5dYm57ic', 'jano', 'urumpirai', '400', 'flat', 'sale', 'ready to move', '', '', '', '', '', '', '2', '', '', '', 'available', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'JHGX2P5hO6kIPUNL2BFn.jpg', '', '', '', '', 'kijkjki', '2024-05-15', 'approved'),
('eHJXhGKUZdTc6qTVHRtO', '0mWVPTuMmBIN5dYm57ic', 'ironmanhouse ', 'urumpirai', '40000', 'house', 'sale', 'ready to move', '', '', '', '', '', '', '5', '', '', '', 'available', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'PfftTbGlkY1NfNIrtNNr.jpg', '', '', '', '', 'hiii', '2024-07-08', 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` varchar(20) NOT NULL,
  `property_id` varchar(20) NOT NULL,
  `sender` varchar(20) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `property_id`, `sender`, `receiver`, `date`) VALUES
('KfPrNXlJFkG5zVnS9R8r', 'kiLMuue6n641ktW8oYsN', '0mWVPTuMmBIN5dYm57ic', '0mWVPTuMmBIN5dYm57ic', '2024-04-26'),
('lGiMv3wY9h971Gouxbhe', 'uk8XkMVvqSo31QrN387h', '0mWVPTuMmBIN5dYm57ic', '0mWVPTuMmBIN5dYm57ic', '2024-05-03'),
('UEx7WIeTgD2FzieaLKp2', 'aayraFkQLSPlGcIhnh1j', 'OdLMZXzcT0jb0Pgur3b0', '0mWVPTuMmBIN5dYm57ic', '2024-05-06'),
('v59yfHPBwR7DWccx9Hgz', 'KFJb0MXtNFHgBH85noNf', '0mWVPTuMmBIN5dYm57ic', 'ielfWePQodxsyr4KFTmD', '2024-07-08'),
('gcaR4gNdjnrpee32r9Uu', 'y0rHf9eY99E4piMhCxfq', '0mWVPTuMmBIN5dYm57ic', '0mWVPTuMmBIN5dYm57ic', '2024-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

CREATE TABLE `saved` (
  `id` varchar(20) NOT NULL,
  `property_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saved`
--

INSERT INTO `saved` (`id`, `property_id`, `user_id`) VALUES
('97Bfs3QZymVaIISKd949', 'Pd0sng1C8wVFemyqnQXc', '0mWVPTuMmBIN5dYm57ic');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image_01` varchar(255) DEFAULT 'default_image.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `number`, `email`, `password`, `image_01`) VALUES
('0mWVPTuMmBIN5dYm57ic', 'Rishi', '0771234561', 'hii@gmail.com', '70e793ff87fb8179dd0bad6a6ea68a2ca9f3541d', 'photo_2023-07-24_20-59-17.jpg'),
('HBkOx8yFMKnlS9qKnLD9', 'Kisha', '0701882465', 'kirushaniramajeyam@gmail.com', 'cbcd791770979dc255fec5017034eef2256dbbce', 'IMG_20230122_093019.jpg'),
('OdLMZXzcT0jb0Pgur3b0', 'Noyal', '0753495114', 'jenijeniston05@gmail.com', '7f6b77bf1c74c986aeb2080eddf7d500dafa9f26', 'img5.jpg'),
('ieDRr1soGnotUUBY1W9E', 'RJ Styles', '0771978220', 'rjstyles19@gmail.com', '0eb59c29b4a2ba03805b274ee15e75434b5e9157', 'img7.png'),
('X7DXI6kRevNNnTNDdK6f', 'saraon', '0757392865', 'sarankaruna48@gmail.com', '19e4cfe04a60a4f9fe3ba944a6fed16a9cfc59b3', 'img4.jpg'),
('ielfWePQodxsyr4KFTmD', 'shanuja', '0774765626', 'rshanushanuja@gmail.com', 'c9a793900189b4feeae1266132d69e76c50d3efa', 'img9.jpg'),
('mZOmrbWLE0AMhM5mZKE0', 'Sahari Pons', '0760463531', 'antonrexsahari26@gmail.com', '13ab3e5b7a160aa030e7aec61bd119b52f66ec5b', 'img10.jpg'),
('5nVuuJOwt5TcmqiNIKzj', 'Jo', '0770707868', 'jothikajo01@gmail.com', '7f6b77bf1c74c986aeb2080eddf7d500dafa9f26', 'img11.jpg'),
('3rdzeJj0EVv9uJSEh5j0', 'Mayushan', '0754405314', 'rox.mau28@gmail.com', 'a4ac914c09d7c097fe1f4f96b897e625b6922069', 'default_image.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

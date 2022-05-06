-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 03:57 PM
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
-- Database: `mismatch`
--

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `response_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `response` int(1) DEFAULT 0,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`response_id`, `user_id`, `response`, `topic_id`) VALUES
(98, 2, 2, 2),
(99, 2, 1, 4),
(100, 2, 1, 3),
(101, 2, 2, 1),
(102, 2, 1, 5),
(103, 2, 1, 6),
(104, 2, 1, 8),
(105, 2, 1, 7),
(106, 2, 1, 13),
(107, 2, 1, 11),
(108, 2, 2, 12),
(109, 2, 1, 9),
(110, 2, 2, 10),
(111, 2, 1, 22),
(112, 2, 1, 24),
(113, 2, 2, 21),
(114, 2, 1, 23),
(115, 2, 0, 20),
(116, 2, 0, 19),
(117, 2, 2, 14),
(118, 2, 2, 15),
(119, 2, 1, 17),
(120, 2, 0, 16),
(121, 2, 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='the category and names of topic users will be matched with o';

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `category`, `name`) VALUES
(1, 'Appearance', 'Tattos'),
(2, 'Appearance', 'Body piercings'),
(3, 'Appearance', 'Long hair'),
(4, 'Appearance', 'Gold chains'),
(5, 'Entertainment', 'Gaming'),
(6, 'Entertainment', 'Horror movies'),
(7, 'Entertainment', 'Reality show'),
(8, 'Entertainment', 'Professional Wrestling'),
(9, 'Food', 'Spicy food'),
(10, 'Food', 'Sushi'),
(11, 'Food', 'Rice'),
(12, 'Food', 'Shawarma'),
(13, 'Food', 'Bread'),
(14, 'People', 'Buhari'),
(15, 'People', 'Donald Trump'),
(16, 'People', 'Joe Biden'),
(17, 'People', 'Elon Musk'),
(18, 'People', 'Mr. Beast'),
(19, 'Hobby', 'Yoga'),
(20, 'Hobby', 'Weight Lifting'),
(21, 'Hobby', 'Reading'),
(22, 'Hobby', 'Chatting'),
(23, 'Hobby', 'Sleeping'),
(24, 'Hobby', 'Eating');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `profile_picture` text NOT NULL,
  `bio` text NOT NULL,
  `work` text NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone_number` text DEFAULT '',
  `email_address` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `city` varchar(20) NOT NULL,
  `required_profile` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `first_name`, `last_name`, `profile_picture`, `bio`, `work`, `date_registered`, `phone_number`, `email_address`, `password`, `city`, `required_profile`) VALUES
(2, 'Timadey', 'Timothy', 'Adeleke', 'IMG_20220311_103207_334_2.jpg', 'First bio', 'Mismatch Admin', '2022-04-11 07:48:24', '01234567891', 'admin@mismatch.com', '4af67bc03bbf0a58993499baf7c176426645bba0', 'Ibadan', 1),
(3, 'Teeny', 'Gracie', 'James', 'Screenshot 2021-09-09 091538.png', '', 'Heart', '2022-04-10 18:47:54', '09076543218', 'grace@mismatch.com', '4af67bc03bbf0a58993499baf7c176426645bba0', '', 1),
(4, 'Lanre', 'Lanre', 'Olakanmi', 'Screenshot 2021-09-09 094800.png', '', 'Model', '2022-04-10 19:22:55', '0123839439', 'lanre@mismatch.com', '4af67bc03bbf0a58993499baf7c176426645bba0', '', 1),
(5, 'Mike', 'Oladele', 'Mike', 'Screenshot 2021-09-09 092156.png', '', 'Mismatch Support', '2022-04-10 19:24:29', '09084773788', 'mike@mismatch.com', '4af67bc03bbf0a58993499baf7c176426645bba0', '', 1),
(6, 'Tolu', 'Tolu', 'Ayewada', 'Screenshot 2021-09-09 091239.png', '', 'Mismatch Admin', '2022-04-10 19:25:39', '87665354544', 'tolu@mismatch.com', '4af67bc03bbf0a58993499baf7c176426645bba0', '', 1),
(7, 'Honey', 'Adeyemi', 'Oyin', 'Screenshot 2021-09-09 091538.png', '', 'Gem', '2022-04-10 19:29:19', '09289282928', 'sonya@mismatch.com', '4af67bc03bbf0a58993499baf7c176426645bba0', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`response_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `response_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `response_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

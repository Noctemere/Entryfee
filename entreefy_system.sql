-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2024 at 02:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `entreefy_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_reservations`
--

CREATE TABLE `event_reservations` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `organizer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_reservations`
--

INSERT INTO `event_reservations` (`id`, `title`, `date`, `time`, `organizer_id`, `created_at`) VALUES
(1, 'Wedding', '2024-06-10', '14:00:00', 9, '2024-07-10 06:58:11'),
(2, 'Birthday', '2024-06-20', '16:00:00', 9, '2024-07-10 06:58:11'),
(3, 'Graduation', '2024-07-11', '18:00:00', 9, '2024-07-10 06:58:11'),
(4, 'HAHAHAH', '2024-07-20', '10:00:00', 9, '2024-07-11 13:57:55'),
(5, 'HAHAHAH', '2024-07-20', '10:00:00', 9, '2024-07-11 14:02:25'),
(6, 'HAHAHAH', '2024-07-20', '10:00:00', 9, '2024-07-11 14:02:39'),
(7, 'HEHE', '2024-07-19', '10:05:00', 9, '2024-07-11 14:05:57'),
(8, 'HAPPY BIRTHDAY!', '2024-07-19', '08:17:00', 9, '2024-07-12 00:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `event_venue`
--

CREATE TABLE `event_venue` (
  `event_id` int(11) NOT NULL,
  `venue_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_venue`
--

INSERT INTO `event_venue` (`event_id`, `venue_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 1),
(5, 1),
(6, 1),
(7, 2),
(8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `reservation_id`, `amount`, `payment_date`, `payment_method`) VALUES
(1, 1, 100.00, '2024-06-10 04:00:00', 'credit card'),
(2, 2, 150.00, '2024-06-20 06:00:00', 'debit card'),
(3, 3, 200.00, '2024-07-01 12:00:00', 'gcash'),
(4, 6, 324000.00, '2024-07-11 16:00:00', 'credit_card'),
(5, 7, 432000.00, '2024-07-11 16:00:00', 'credit_card'),
(6, 8, 288000.00, '2024-07-11 16:00:00', 'gcash');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `first_name`, `last_name`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(9, 'Skullcrusher', '$2y$10$yHwTqLjgUPyNAUtQE0yFJ.GEbTtW1j.xPo86IMwWyafyleawi7x7S', 'jhayjay.david11@gmail.com', 'John', 'Carpio', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id`, `name`) VALUES
(1, 'Brooklyn Botanic Garden'),
(2, 'Lotte Hotel'),
(3, 'Vernant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_reservations`
--
ALTER TABLE `event_reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organizer_id` (`organizer_id`);

--
-- Indexes for table `event_venue`
--
ALTER TABLE `event_venue`
  ADD PRIMARY KEY (`event_id`,`venue_id`),
  ADD KEY `venue_id` (`venue_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_reservations`
--
ALTER TABLE `event_reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_reservations`
--
ALTER TABLE `event_reservations`
  ADD CONSTRAINT `event_reservations_ibfk_1` FOREIGN KEY (`organizer_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `event_venue`
--
ALTER TABLE `event_venue`
  ADD CONSTRAINT `event_venue_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event_reservations` (`id`),
  ADD CONSTRAINT `event_venue_ibfk_2` FOREIGN KEY (`venue_id`) REFERENCES `venues` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `event_reservations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

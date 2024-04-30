-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 01:41 PM
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
-- Database: `pio`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_profile`
--

CREATE TABLE `customer_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `interests` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_profile`
--

INSERT INTO `customer_profile` (`id`, `name`, `email`, `location`, `interests`, `about`) VALUES
(1, 'kayihura pio', 'kayihurapio@gmail.com', 'huye', 'music', 'i like to sing');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_description` text DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `organizer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_description`, `event_date`, `event_time`, `organizer_id`) VALUES
(16, 'bruce melody', 'AT MUHANGA STADIUM', '2024-04-27', '14:21:00', NULL),
(17, 'mbonyi concert', 'BK ARENA', '2024-04-30', '12:58:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organizers`
--

CREATE TABLE `organizers` (
  `organizer_id` int(11) NOT NULL,
  `organizer_name` varchar(100) NOT NULL,
  `organizer_email` varchar(100) NOT NULL,
  `organizer_phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promoters_profile`
--

CREATE TABLE `promoters_profile` (
  `promoter_id` int(11) NOT NULL,
  `promoter_name` varchar(100) DEFAULT NULL,
  `promoter_email` varchar(100) DEFAULT NULL,
  `promoter_bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promoters_profile`
--

INSERT INTO `promoters_profile` (`promoter_id`, `promoter_name`, `promoter_email`, `promoter_bio`) VALUES
(1, 'pio', 'pio@gmail.com', '22 years old/kamonyi');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `ticket_price` decimal(10,2) NOT NULL,
  `ticket_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `event_id`, `ticket_price`, `ticket_quantity`) VALUES
(4, 0, 1000.00, 0),
(5, 0, 2000.00, 0),
(6, 0, 5000.00, 0),
(7, 0, 2000.00, 0),
(8, 0, 3000.00, 0),
(9, 0, 10000.00, 0),
(10, 0, 1000.00, 0),
(11, 0, 2000.00, 0),
(12, 0, 5000.00, 0),
(13, 0, 2000.00, 0),
(14, 0, 3000.00, 0),
(15, 0, 10000.00, 0),
(16, 0, 0.00, 0),
(17, 0, 0.00, 0),
(18, 0, 0.00, 0),
(19, 0, 0.00, 0),
(20, 0, 0.00, 0),
(21, 0, 0.00, 0),
(22, 0, 300.00, 0),
(23, 0, 2000.00, 0),
(24, 0, 5000.00, 0),
(25, 0, 0.00, 0),
(26, 0, 0.00, 0),
(27, 0, 0.00, 0),
(28, 0, 0.00, 0),
(29, 0, 0.00, 0),
(30, 0, 0.00, 0),
(31, 0, 0.00, 0),
(32, 0, 0.00, 0),
(33, 0, 0.00, 0),
(34, 0, 2000.00, 0),
(35, 0, 1000.00, 0),
(36, 0, 5000.00, 0),
(37, 0, 0.00, 0),
(38, 0, 0.00, 0),
(39, 0, 0.00, 0),
(40, 0, 0.00, 0),
(41, 0, 0.00, 0),
(42, 0, 0.00, 0),
(43, 0, 0.00, 0),
(44, 0, 0.00, 0),
(45, 0, 0.00, 0),
(46, 0, 0.00, 0),
(47, 0, 0.00, 0),
(48, 0, 0.00, 0),
(49, 0, 2000.00, 0),
(50, 0, 1000.00, 0),
(51, 0, 5000.00, 0),
(52, 0, 0.00, 0),
(53, 0, 0.00, 0),
(54, 0, 0.00, 0),
(55, 0, 1000.00, 0),
(56, 0, 2000.00, 0),
(57, 0, 10000.00, 0),
(58, 0, 0.00, 0),
(59, 0, 0.00, 0),
(60, 0, 0.00, 0),
(61, 0, 2576.00, 0),
(62, 0, 2345.00, 0),
(63, 0, 2345.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `ticket_type` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `event_id`, `ticket_type`, `quantity`, `transaction_date`) VALUES
(27, 16, 'General', 1, '2024-04-27 12:33:23'),
(28, 16, 'VIP', 2, '2024-04-30 10:50:39'),
(29, 16, 'Regular', 1, '2024-04-30 10:50:58'),
(30, 16, 'Regular', 2, '2024-04-30 10:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'customer',
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`, `approved`, `registration_date`) VALUES
(4, 'Kayihura', 'kayihurapio@gmail.com', '$2y$10$yW8SjAm02JDalepIZBaqguAN8M7R5fy.23K6m75XhjS7N42jxrHkG', 'promoter', 0, '2024-04-20 11:45:12'),
(5, 'pio', 'piok@gmail.com', '$2y$10$PuZ3.GT4iZQ4uFeYsX3ld.aQ8I0os7dKhfUPSIF0yMrsiwGAQFq/m', 'customer', 0, '2024-04-20 11:51:57'),
(6, 'piokayihura', 'pio@gmail.com', '$2y$10$HKFf7deBnOfObvNoXi4BFeeSPizz7xhujRFIDNcnGtSZ5kaK5RIdG', 'customer', 0, '2024-04-20 12:02:33'),
(7, 'piokayihura', 'pio@gmail.com', '$2y$10$/cs.KRroA2kTkxVF3KAnxuQCwQa/Lw0C2IBny0fUvWUU0qm1Yo0xi', 'customer', 0, '2024-04-20 12:10:07'),
(8, 'jeanpaul', 'jeanpaul@gmail.com', '$2y$10$UuNn.OaHlKnQcJrsEeF73.w03eOKCtqG.ER1VHDJjMzp5nYSQjCU6', 'customer', 0, '2024-04-22 18:19:43'),
(9, 'Kayihura', 'kp@gmail.com', '$2y$10$49vO0CEt54gQzaG2064fye.N4u2ga2BLEfSXrWbXStvxZicY461mi', 'promoter', 0, '2024-04-22 18:27:13'),
(12, 'Kayihura', 'kp@gmail.com', '$2y$10$m3Z2O4UNvlaphCqzzSBPce5VmCqda/xr8ldS9D6oghZqtOYuHysyK', 'promoter', 0, '2024-04-22 18:30:52'),
(13, 'kayihurapio', 'piok@gmail.com', '$2y$10$4fdH6P1xOHLXDdkH7hNptevfbWRJlVuC628Du5Qgute8IwLjTAo5S', 'promoter', 0, '2024-04-22 18:35:23'),
(14, 'Kayihura', 'kayihurapio@gmail.com', '$2y$10$Lgd17FjPCtYjLDJgWFVSVeUUn5W4G/vliPP8pwX3rbjxUQNE6Dy9a', 'promoter', 0, '2024-04-23 09:23:44'),
(15, 'Kayihura', 'kayihurapio@gmail.com', '$2y$10$PU9AeU/vdsK4ox9Tp2ipvO8bqRqqf4l.DSd9ZKK4IncYiPPC3.9oC', 'promoter', 0, '2024-04-27 08:04:56'),
(16, 'jeanpaul', 'jeanpaul@gmail.com', '$2y$10$CR5NEHcE1bYS.9i3ABJ7de1kD01e8A/M3msmRzaj3GT9.HGO2saZi', 'customer', 0, '2024-04-27 08:11:14'),
(17, 'jeanpaul', 'jeanpaulsemugisha@gmail.com', '$2y$10$JLUtYDgTvDTp7lK1N1a1QeBhQMSpGjTrjwRLKYGJN2T40J3addYmS', 'customer', 0, '2024-04-27 08:25:46'),
(18, 'prince', 'prince@gmail.com', '$2y$10$I/XUexgtx9rFPxc9gDh4uuwBQ199W8scJBBczt1cNpHvjrjjPJUpe', 'customer', 0, '2024-04-27 08:26:48'),
(19, 'kayihuraprince', 'prince10@gmail.com', '$2y$10$MURYv3kTKBTPty1UAJtbO.gr0sAyT6mwoJsPw9kMFI3waZ.uR6NTa', 'promoter', 0, '2024-04-27 08:37:56'),
(20, 'kayihurapio', 'kayi@gmail.com', '$2y$10$8Dr8.SmCXWFPeCX2UhI/luG2gpNoQZgFhEJNWe2XA93M1jRoL.1gy', 'customer', 0, '2024-04-27 10:02:43'),
(21, 'Kayihura', 'kayihura@gmail.com', '$2y$10$dB7/3Wh8jFnd1wWXUR5Wv.onlqs7gx7PyJh5cxQsa0fFevvqJE.Ea', 'promoter', 0, '2024-04-27 10:06:31'),
(22, 'pio', 'pio@gmail.com', '$2y$10$xgVozVHKcFlOavMpl/0ze.Q9SepVa9ivWG1Ou5LaJC1ZPIYQHaG62', 'customer', 0, '2024-04-27 12:32:24'),
(23, 'Kayihura', 'kayihurapio@gmail.com', '$2y$10$7ba1t/hqqRe0sAEtNranueShpHGVGBV23PxyE/f6hXsHK5GjybSRS', 'promoter', 0, '2024-04-29 10:18:31'),
(24, 'pio', 'pio@gmail.com', '$2y$10$yWdD/0gIWzJHIqK7xBT29OqtkyBynAPp1rtBKtEeVggrgnlKBO9sq', 'customer', 0, '2024-04-29 10:21:18'),
(25, 'PIO', 'kay@gmail.com', '$2y$10$CrdGpmtAkc9ZAMS5bvjPi.vSMAFxqz3iDZjp7.RH48/AQELt/mPY2', 'customer', 0, '2024-04-29 10:25:33'),
(26, 'jay', 'jayp@gmail.com', '$2y$10$2LtjC/A/QVnswpfO.C2sCehgiYebo8X9GWLxasvG6XvRiy5Om5VMu', 'customer', 0, '2024-04-30 10:49:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_profile`
--
ALTER TABLE `customer_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `organizers`
--
ALTER TABLE `organizers`
  ADD PRIMARY KEY (`organizer_id`);

--
-- Indexes for table `promoters_profile`
--
ALTER TABLE `promoters_profile`
  ADD PRIMARY KEY (`promoter_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_profile`
--
ALTER TABLE `customer_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `organizers`
--
ALTER TABLE `organizers`
  MODIFY `organizer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promoters_profile`
--
ALTER TABLE `promoters_profile`
  MODIFY `promoter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

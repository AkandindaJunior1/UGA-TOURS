-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 06:41 PM
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
-- Database: `ugatours`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activity_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `tour_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `name`, `description`, `tour_id`) VALUES
(1, 'Gorilla Trekking', 'An activity involving tracking and viewing mountain gorillas in their natural habitat', NULL),
(2, 'Game Drives', 'Safari tours to view wildlife, including big game animals', NULL),
(3, 'Bird Watching', 'An activity for spotting and identifying various bird species in their natural habitats', NULL),
(4, 'Boat Cruises', 'Relaxing cruises along rivers or lakes, often for wildlife viewing', NULL),
(5, 'Hiking and Mountain Climbing', 'Outdoor activity involving hiking and climbing mountains for adventure and scenic views', NULL),
(6, 'White-water Rafting', 'Adventure activity that involves navigating rivers with rapid water currents', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `tour_id` int(11) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `tour_id`, `user_email`, `booking_date`, `user_id`) VALUES
(1, 1, 'mutesifk19@gmail.com', '2024-11-02 08:42:25', 5),
(2, 2, 'mutesifk19@gmail.com', '2024-11-02 08:50:20', 5),
(3, 6, 'ann3@gmail.com', '2024-11-02 09:43:10', 6),
(4, 1, 'ohlivefeza@gmail.com', '2024-11-04 11:34:52', 7),
(12, 5, 'chris@gmail.com', '2024-11-07 08:27:01', 8),
(13, 5, 'kihembodaniel@gmail.com', '2024-11-07 08:59:45', 9),
(14, 2, 'kihembodaniel@gmail.com', '2024-11-07 09:12:55', 9),
(15, 1, '12vicu@gmail.com', '2024-11-07 21:25:50', 10),
(36, 2, 'ayebarepraise@gmail.com', '2024-11-12 19:53:26', 3),
(37, 6, 'ayebarepraise@gmail.com', '2024-11-14 19:47:33', 3),
(38, 6, 'mutesi@gmail.com', '2024-11-14 20:25:56', 11),
(39, 1, 'mutesi@gmail.com', '2024-11-14 21:00:10', 11),
(40, 1, 'mutesi@gmail.com', '2024-11-14 21:04:34', 11),
(41, 1, 'mutesi@gmail.com', '2024-11-21 12:45:55', 11),
(45, 1, 'praise12@gmail.com', '2024-11-28 17:31:01', 12);

-- --------------------------------------------------------

--
-- Table structure for table `contact_information`
--

CREATE TABLE `contact_information` (
  `contact_id` int(11) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `hours` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_information`
--

INSERT INTO `contact_information` (`contact_id`, `phone`, `email`, `address`, `hours`) VALUES
(1, '+256 712 345 678', 'info@ugatours.ug', 'www.ugatours.ug', 'Monday to Friday: 8:00 AM - 6:00 PM, Saturday: 9:00 AM - 4:00 PM, Sunday: Closed');

-- --------------------------------------------------------

--
-- Table structure for table `cultural_sites`
--

CREATE TABLE `cultural_sites` (
  `site_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `significance` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cultural_sites`
--

INSERT INTO `cultural_sites` (`site_id`, `name`, `description`, `location`, `significance`) VALUES
(1, 'Kasubi Tombs', 'A UNESCO World Heritage Site, the burial grounds of Buganda kings', 'Kampala, Uganda', 'UNESCO World Heritage Site, burial grounds of Buganda kings'),
(2, 'Namugongo Martyrs Shrine', 'A significant religious site commemorating the Uganda Martyrs', 'Namugongo, Uganda', 'Commemorates Uganda Martyrs'),
(3, 'Ndere Cultural Centre', 'A hub for Ugandan cultural performances and traditional dances', 'Kampala, Uganda', 'Cultural performances, traditional dances'),
(4, 'Igongo Cultural Centre', 'Showcases the Ankole culture and history', 'Mbarara, Uganda', 'Ankole culture and history'),
(5, 'Mparo Tombs', 'The royal burial grounds of the Bunyoro kings', 'Hoima, Uganda', 'Royal burial grounds of Bunyoro kings'),
(6, 'Kabaka\'s Palace (Lubiri)', 'The official residence of the Buganda king', 'Mengo, Kampala, Uganda', 'Residence of the Buganda king'),
(7, 'Nyero Rock Paintings', 'Ancient rock art depicting early human life', 'Kumi, Uganda', 'Ancient rock art'),
(8, 'Ssezibwa Falls', 'A cultural heritage site with a spiritual significance among the Baganda people', 'Mukono, Uganda', 'Spiritual significance to Baganda people');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'Kihembo Daniel', 'kihembo@gmail.com', 'Thank you for your services!', '2024-10-31 14:51:11'),
(2, 'Flavia Kirabo', 'mutesifk19@gmail.com', 'Thank you!', '2024-10-31 14:51:41'),
(3, 'Kirabo Flavia', 'kirabo@gmail.com', 'Hello UgaTours, I would like to thank you for your hospitality.', '2024-10-31 14:58:39'),
(4, 'Mutesi Kirabo', 'kirabo@gmail.com', 'The Kidepo trip was amazing!', '2024-10-31 15:20:50'),
(5, 'Flavia Kirabo', 'mutesifk19@gmail.com', 'i liked the trip', '2024-11-01 13:09:07'),
(6, 'Flavia Kirabo', 'mutesifk19@gmail.com', 'hello', '2024-11-02 09:04:19'),
(7, 'Flavia Kirabo', 'mutesifk19@gmail.com', 'hello', '2024-11-02 09:05:30'),
(8, 'TINDYEBWA IGNATIOUS', 'ohlivefeza@gmail.com', 'hey,how is the going.i wanted to book but i failed may be give me some steps to follow', '2024-11-04 11:16:52'),
(9, 'Kihembo Daniel', 'kihembo@gmail.com', 'I liked the services\r\nwill come back later with my firends/\r\n\r\nthanks everyone', '2024-11-07 09:00:48'),
(10, 'CURTIS VICTOR', '12vicu@gmail.com', 'no message', '2024-11-07 21:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `national_parks`
--

CREATE TABLE `national_parks` (
  `park_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `highlights` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `national_parks`
--

INSERT INTO `national_parks` (`park_id`, `name`, `description`, `location`, `highlights`) VALUES
(1, 'Bwindi Impenetrable National Park', 'Famous for mountain gorilla trekking', 'Uganda', 'Mountain gorilla trekking'),
(2, 'Queen Elizabeth National Park', 'Known for its diverse wildlife, including tree-climbing lions', 'Uganda', 'Diverse wildlife, tree-climbing lions'),
(3, 'Murchison Falls National Park', 'Renowned for the powerful Murchison Falls and big game', 'Uganda', 'Powerful falls, big game'),
(4, 'Bwindi Impenetrable National Park', 'Famous for mountain gorilla trekking', 'Uganda', 'Mountain gorilla trekking'),
(5, 'Queen Elizabeth National Park', 'Known for its diverse wildlife, including tree-climbing lions', 'Uganda', 'Diverse wildlife, tree-climbing lions'),
(6, 'Murchison Falls National Park', 'Renowned for the powerful Murchison Falls and big game', 'Uganda', 'Powerful falls, big game');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `tour_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`tour_id`, `name`, `description`, `price`, `duration`, `category`) VALUES
(1, 'Queen Elizabeth National Park', 'Full accommodation 3-star hotel, includes a game drive', 150000.00, '3 days', 'National Park'),
(2, 'Queen Elizabeth National Park', 'Full accommodation 3-star hotel, includes a game drive', 350000.00, '1 week', 'National Park'),
(3, 'Murchison Falls National Park', 'Full accommodation 3-star hotel, includes a game drive', 150000.00, '3 days', 'National Park'),
(4, 'Murchison Falls National Park', 'Full accommodation 3-star hotel, includes a game drive', 350000.00, '1 week', 'National Park'),
(5, 'Kideppo National Park', 'Full accommodation 3-star hotel, includes a game drive', 150000.00, '3 days', 'National Park'),
(6, 'Kideppo National Park', 'Full accommodation 3-star hotel, includes a game drive', 350000.00, '1 week', 'National Park');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `phone_number`, `password`, `created_at`) VALUES
(1, 'Kihembo Daniel', 'kihembo@gmail.com', '0743752260', '$2y$10$G8UuExL/pUsCgoembnYPuu1cvrlNpk/mt56y84ShT1vFcHZ5J.M4G', '2024-10-31 12:35:19'),
(2, 'Ann Chris', 'annchris@gmail.com', '0743764312', '$2y$10$X8my3qvbADzC4QrS4RfaX.KVuNDy0i2QqpxELl2z6hWDBADpDW2r2', '2024-10-31 12:37:52'),
(3, 'Ayebare Praise', 'ayebarepraise@gmail.com', '0756879423', '$2y$10$8rt7rLuyH7Bzh.SY173qDeAuspzHtzKxkMx7cCxL/ot4DUfdtb.iO', '2024-10-31 13:09:47'),
(4, 'Kirabo Flavia', 'kirabo@gmail.com', '0774434996', '$2y$10$NCO9tj2yFOMQpZCuBP0vNOMvTwO1e5rSWgqlAKaQHkUJ4WkUpO76C', '2024-10-31 13:19:16'),
(5, 'Flavia Kirabo', 'mutesifk19@gmail.com', '0743752260', '$2y$10$JpAUZKx4oQy6NCpOJN6P.emHv7jI1x44PWE/sp1sVQAkMwwRv6r3O', '2024-11-02 08:41:10'),
(6, 'Nansubuga Ann', 'ann3@gmail.com', '0725369852', '$2y$10$cL3KggruszSMNTstz8mVROnymJlXGXV/f5Sgee5WQBu/A6BW7w/m6', '2024-11-02 09:42:38'),
(7, 'TINDYEBWA IGNATIOUS', 'ohlivefeza@gmail.com', '0762560175', '$2y$10$n44EyFyFMN6DGcgE3bHJIeBSeB09f0hoc7pjrHqMTSkgz2qDLIc0O', '2024-11-04 11:11:59'),
(8, 'Christine ', 'chris@gmail.com', '0723126745', '$2y$10$13tz8GbHwRmu3HT0uH/7HeaM8T8jc7.6A4s77ZVDtJz7Qhp3MV2tu', '2024-11-07 08:26:25'),
(9, 'Daniel Kihembo', 'kihembodaniel@gmail.com', '0743756767', '$2y$10$.flF572e.lgQQy0ScVnW9uKFP/A87lczFROf4QnY62GH98ZFVWfQK', '2024-11-07 08:58:31'),
(10, 'CURTIS VICTOR', '12vicu@gmail.com', '0781283838', '$2y$10$8ztrk0RlHovkmJl5xkNj3OKXAaHDrRX1wBgKIm3LzCi2eJuOe3tpC', '2024-11-07 21:24:43'),
(11, 'Mutesi Kirabo', 'mutesi@gmail.com', '0756327864', '$2y$10$EJV.LXGmcaPJvl5xUayhz.nWiAR284/FFGHFOOl5c8CUjpNs9yi/a', '2024-11-14 20:25:36'),
(12, 'Patience Praise', 'praise12@gmail.com', '0743764312', '$2y$10$lOXUY1IwzPLqEG.vtHw5XumAdIfhHB/ZX5EK0Q28KFdBLLIeQxs.u', '2024-11-28 16:23:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `tour_id` (`tour_id`),
  ADD KEY `user_tour_idx` (`user_id`);

--
-- Indexes for table `contact_information`
--
ALTER TABLE `contact_information`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `cultural_sites`
--
ALTER TABLE `cultural_sites`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `national_parks`
--
ALTER TABLE `national_parks`
  ADD PRIMARY KEY (`park_id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `contact_information`
--
ALTER TABLE `contact_information`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cultural_sites`
--
ALTER TABLE `cultural_sites`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `national_parks`
--
ALTER TABLE `national_parks`
  MODIFY `park_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`tour_id`) ON DELETE SET NULL;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`tour_id`),
  ADD CONSTRAINT `user_tour` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

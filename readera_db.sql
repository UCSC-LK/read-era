-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2021 at 03:45 PM
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
-- Database: `readera_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE `catalogs` (
  `id` int(11) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `CallNo` varchar(10) NOT NULL,
  `LanguageCode` varchar(255) NOT NULL,
  `Author` varchar(60) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `SubTitle` varchar(100) NOT NULL,
  `StatementOfResposiblity` varchar(255) NOT NULL,
  `Edition` varchar(50) NOT NULL,
  `PlaceOfPublication` varchar(100) NOT NULL,
  `NameOfPublisher` varchar(100) NOT NULL,
  `YearOfPublication` int(11) NOT NULL,
  `PhysicalDescription` varchar(255) NOT NULL,
  `Series` varchar(100) NOT NULL,
  `GeneralNote` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `URL` varchar(255) NOT NULL,
  `AddedEntry` varchar(255) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Collection` varchar(20) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `ISBN`, `CallNo`, `LanguageCode`, `Author`, `Title`, `SubTitle`, `StatementOfResposiblity`, `Edition`, `PlaceOfPublication`, `NameOfPublisher`, `YearOfPublication`, `PhysicalDescription`, `Series`, `GeneralNote`, `Subject`, `URL`, `AddedEntry`, `Type`, `Collection`, `Status`, `date`) VALUES
(4, '450-702-0086-921', 'BX 35', 'eng', 'Williams', 'JavaScript Fundamentals', 'None', 'None', 'Second', 'California', 'PWA', 1999, 'The JavaScript Fundamentals is a comprehensive monograph written by computer scientist William. William began the project, originally conceived as a single book with twelve chapters, in 1999.', 'None', 'None', 'Programming', 'https://www.amazon.com/Programming-Fundamentals-JavaScript-Rex-Barzee-ebook/dp/B0727XJR94', 'None', 'Textbook', 'Lending', 'Available', '2021-09-07 19:52:43'),
(5, '789-390-1098-255', 'XD 565', '250', 'Ronald Revest', 'Software engineering ', 'A comperensive guide', 'None', 'second', 'Newyork', 'Oxford', 2010, 'None', 'None', 'None', 'Software engineering', 'https://www.amazon.com/Software-Design-Engineering-Books/b?ie=UTF8&node=491316', 'None', 'Textbook', 'Lending', 'Available', '2021-09-12 18:37:16'),
(6, '761-450-4667-011', 'CV 12', '500', 'Clifort stain', 'Introduction to Algorithms', 'None', 'None', 'second', 'Sri lanka', 'PWA', 1999, 'None', 'None', 'None', 'Algorithms', 'https://www.amazon.com/Introduction-Algorithms-3rd-MIT-Press/dp/0262033844', 'None', 'Textbook', 'Lending', 'Available', '2021-09-15 11:30:57'),
(7, '646-686-1232-709', 'MB 790', '250', 'Steve McConnell', 'Code Complete', 'None', 'None', 'Third', 'Boston', 'PWA', 2007, 'None', 'None', 'None', 'Programming', 'https://www.amazon.com/Code-Complete-Practical-Handbook-Construction/dp/0735619670', 'None', 'Textbook', 'Lending', 'Available', '2021-09-15 11:56:55'),
(12, '908-6540-34-1056', 'HB 670', '260', 'Eric Matthes', 'Python Crash Course', 'A Hands-On, Project-Based Introduction to Programming', 'None', 'second', 'Sri lanka', 'PWA', 1998, 'None', 'None', 'None', 'Programming', 'https://www.amazon.com/Python-Crash-Course-2nd-Edition/dp/1593279280', 'None', 'Textbook', 'Lending', 'Available', '2021-09-27 07:16:25'),
(13, '123-456-789-1024', '57576', '4567', 'Mark', 'Data structures and Algorithms', 'None', 'None', 'Second', 'Newyork', 'PWA', 2019, 'None', 'None', 'None', 'Data structure', 'https://www.amazon.com/Common-Sense-Guide-Structures-Algorithms-Second/dp/1680507222/ref=sr_1_1?dchild=1&keywords=Data+Structures+and+Algorithms&qid=1634574667&sr=8-1', 'None', 'Textbook', 'Lending', 'Available', '2021-09-30 14:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `circulations`
--

CREATE TABLE `circulations` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `issue_date` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `returned_date` datetime NOT NULL,
  `fine` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`id`, `email`, `code`, `expire`) VALUES
(1, 'gsribarathvajasarma@gmail.com', '82243', 1632911168),
(2, 'gsribarathvajasarma@gmail.com', '58457', 1632911575),
(3, 'gsribarathvajasarma@gmail.com', '74351', 1632912416),
(4, 'gsribarathvajasarma@gmail.com', '96302', 1632912615),
(5, 'gsribarathvajasarma@gmail.com', '14833', 1632912709),
(6, 'gsribarathvajasarma@gmail.com', '10460', 1632912945),
(7, 'gsribarathvajasarma@gmail.com', '41786', 1632914137),
(8, 'gsribarathvajasarma@gmail.com', '61067', 1632914330),
(9, 'gsribarathvajasarma@gmail.com', '83600', 1632914938),
(10, 'gsribarathvajasarma@gmail.com', '78951', 1632915072),
(11, 'gsribarathvajasarma@gmail.com', '59119', 1632915143),
(12, 'gsribarathvajasarma@gmail.com', '70268', 1632923295),
(13, 'gsribarathvajasarma@gmail.com', '44384', 1633002491),
(14, 'gsribarathvajasarma@gmail.com', '70067', 1633002605),
(15, 'gsribarathvajasarma@gmail.com', '17798', 1633002764),
(16, 'gsribarathvajasarma@gmail.com', '35026', 1633005551),
(17, 'gsribarathvajasarma@gmail.com', '19652', 1633011210),
(18, 'gsribarathvajasarma@gmail.com', '77440', 1633015460),
(19, 'gsribarathvajasarma@gmail.com', '35883', 1633015556),
(20, 'gsribarathvajasarma@gmail.com', '57421', 1633346026),
(21, 'gsribarathvajasarma@gmail.com', '36140', 1633350397),
(22, 'gsribarathvajasarma@gmail.com', '60338', 1633350910),
(23, 'gsribarathvajasarma@gmail.com', '61361', 1633350916),
(24, 'gsribarathvajasarma@gmail.com', '29501', 1633352094),
(25, 'gsribarathvajasarma@gmail.com', '84141', 1633352207),
(26, 'gsribarathvajasarma@gmail.com', '15695', 1633352566),
(27, 'gsribarathvajasarma@gmail.com', '69851', 1634212570),
(28, 'gsribarathvajasarma@gmail.com', '55620', 1634213298),
(29, 'gsribarathvajasarma@gmail.com', '34974', 1634213622),
(30, 'gsribarathvajasarma@gmail.com', '92331', 1634227809),
(31, 'gsribarathvajasarma@gmail.com', '18508', 1634233893),
(32, 'gsribarathvajasarma@gmail.com', '47688', 1634324135),
(33, 'gsribarathvajasarma@gmail.com', '14868', 1634324215),
(34, 'gsribarathvajasarma@gmail.com', '82616', 1634368898),
(35, 'gsribarathvajasarma@gmail.com', '50085', 1634444158);

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` int(11) NOT NULL,
  `user_management` enum('No','Yes') NOT NULL,
  `book_management` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `user_management`, `book_management`) VALUES
(30, 'No', 'No'),
(71, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `reserved_date` datetime NOT NULL,
  `expire_date` datetime NOT NULL,
  `state` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `book_id`, `member_id`, `reserved_date`, `expire_date`, `state`) VALUES
(1, 4, 8, '2021-10-25 13:42:45', '2022-01-25 13:42:45', 'removed'),
(2, 4, 8, '2021-10-25 13:55:54', '2022-01-25 13:55:54', 'removed'),
(3, 4, 8, '2021-10-25 15:24:54', '2022-01-25 15:24:54', 'removed'),
(4, 4, 8, '2021-10-25 15:24:59', '2022-01-25 15:24:59', 'reserved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `gender` varchar(6) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `rank` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `date`, `gender`, `user_id`, `rank`, `password`, `image`) VALUES
(4, 'Rumesha', 'Chathumini', 'rumesha@mail.com', '2021-09-01 08:26:14', 'Female', '', 'Librarian', '$2y$10$D1adzqDCn4g4C1569pLuqey/6bdli0QIzJVztc.uqc2C2RynZHNFm', 'uploads/assassin.jfif'),
(5, 'Anton', 'Sinthujan', 'anton@mail.com', '2021-09-02 16:42:19', 'Male', '', 'Librarian', '$2y$10$EWALn/8ioqI9v5yLbtt6A.zlFvyL6dJkv6JimM2a/B3en.lJZTlWW', ''),
(6, 'Kamal', 'Raj', 'kamal@mail.com', '2021-09-08 14:39:34', 'Male', '', 'Undergraduate', '$2y$10$YQNoPJQyQryiS871DecPEOK4IoYYjG4mgVNzTAyhTOZsP8boJmcZ6', ''),
(8, 'Barath', 'sarma', 'gsribarathvajasarma@gmail.com', '2021-09-24 16:15:10', 'Male', '', 'Librarian', '$2y$10$MqDMfqPRjHHbAu8.f7wMweUROAhQcSpclDhfRR6..Eyn7iy4uhcCy', 'uploads/photo.jpeg'),
(9, 'Suman', 'raj', 'barath0769838892@gmail.com', '2021-09-26 22:40:17', 'Male', '', 'Undergraduate', '$2y$10$ZzJkFP136FKy2QzeJcG4Ge6MlQnuFnSczTHVe9h1SPLaeUAQXgvNa', ''),
(10, 'Dulanjana', 'Indrajith', 'dulanjana@mail.com', '2021-09-28 04:34:06', 'Male', '', 'Librarian', '$2y$10$Q5dKgf2G0VSKS2y5VnJZweQHl1Lm14c2c4kVaiDNwQeMNNZ77oBPO', ''),
(11, 'Vijay', 'Kumar', 'vijay@mail.com', '2021-09-28 04:36:26', 'Male', '', 'Postgraduate', '$2y$10$0Z1SzJx9jIUtq8FixcSGDufAKi0pznzJYjoQBtRw21fqzfx4ZzVhy', ''),
(12, 'Karan', 'kumar', 'karan@mail.com', '2021-09-28 05:19:15', 'Male', '', 'Senior Lecturer', '$2y$10$yjl6EwEkF.6dirlKDWhd2.ycLWlTUU2VJKKr0n8PbthZB6u9QvoK2', ''),
(30, 'Ravi', 'kumar', 'ravi@mail.com', '2021-10-15 20:17:18', 'Male', '', 'Library Staff', '$2y$10$9zr81iD.3uQrLf9emzCEO.TWF072K686nrexBKzR6w1YXUKnnetvG', ''),
(60, 'Kavin', 'Kumar', 'kavin@mail.com', '2021-10-21 13:56:37', 'Female', '', 'Non Academic', '$2y$10$iPOAKs8l1w1tJicHlTTQK.EisapBl9Eq6VLOlC2Y3nxr.FzvprbzK', ''),
(71, 'Kannan', 'mano', 'mano@mail.com', '2021-10-23 16:29:42', 'Male', '', 'Library Staff', '$2y$10$EVIJ9c1JHiJ/7pCnEUiXP.UpaF6QMk9Zap95Eu8YeMu2WL8necC5.', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `circulations`
--
ALTER TABLE `circulations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_book` (`book_id`),
  ADD KEY `FK_member` (`member_id`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_reservation_book_id` (`book_id`),
  ADD KEY `FK_reservation_member_id` (`member_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `date` (`date`),
  ADD KEY `gender` (`gender`),
  ADD KEY `rank` (`rank`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `circulations`
--
ALTER TABLE `circulations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `circulations`
--
ALTER TABLE `circulations`
  ADD CONSTRAINT `FK_book` FOREIGN KEY (`book_id`) REFERENCES `catalogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_member` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `privileges`
--
ALTER TABLE `privileges`
  ADD CONSTRAINT `privileges_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `FK_reservation_book_id` FOREIGN KEY (`book_id`) REFERENCES `catalogs` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_reservation_member_id` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2021 at 06:13 PM
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
  `CallNo` int(11) NOT NULL,
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
  `Status` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `ISBN`, `CallNo`, `LanguageCode`, `Author`, `Title`, `SubTitle`, `StatementOfResposiblity`, `Edition`, `PlaceOfPublication`, `NameOfPublisher`, `YearOfPublication`, `PhysicalDescription`, `Series`, `GeneralNote`, `Subject`, `URL`, `AddedEntry`, `Status`, `date`) VALUES
(4, 'fhffhrttff', 34657, 'sdfsdfsdf', 'zczczxcdc', 'xxcvxvcdvdv', 'ddfsdfwe', 'xxxsdfedcxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'xvdvefsed', 'xdsfefefsd', 'xvvsdsdv', 7889, 'sdfsdfdf', 'sddsfdsf', 'aiosfdfdi', 'sisdfsdfoi', 'xpoxpxcov', 'zxczccdcdc', 'xzxxxzxz', '2021-09-07 19:52:43'),
(5, 'dssdfds', 123, 'zxzcxcx', 'dddfvdf', 'sfdfsdf', 'sdsdvdsv', 'zvvvcxvcx', 'zcxvvcxv', 'xxvxcvxc', 'xcvcbcxb', 1234, 'cxvcbxcb', 'xvcxvxc', 'xcvcvxv', 'xvxvxcvxcv', 'xcvxcvxcvxc', 'vdvdfbf', 'xcvxcvxc', '2021-09-12 18:37:16'),
(6, 'gggggggggg', 12345, 'ddddd', 'ddddd', 'ddddd', 'ddddd', 'ddddd', 'ddddd', 'xxcccc', 'ddddd', 1222, 'ddddd', 'ddddd', 'ddddd', 'ddddd', 'ddddd', 'vvvvvvv', 'vvvvvvv', '2021-09-15 11:30:57'),
(7, 'cccccccc', 12345, 'ddddd', 'ddddd', 'ddddd', 'ddddd', 'ddddd', 'ddddd', 'xxcccc', 'ddddd', 1222, 'ddddd', 'ddddd', 'ddddd', 'ddddd', 'ddddd', 'vvvvvvv', 'vvvvvvv', '2021-09-15 11:56:55'),
(8, 'bbbbbbbb', 4555, 'cccccccc', 'cccccccc', 'cccccccc', 'xxxxxxxxx', 'ccccccccc', 'xxxxxxxxxxx', 'hhhhhhhhhhh', 'ccccccccc', 4444, 'ccccccccccc', 'cccccccccc', 'vfffffffffff', 'cccccccccc', 'gvgggggggg', 'kkkkkkkkk', 'pppppppp', '2021-09-15 11:56:55'),
(11, 'vvvv', 1234, 'vvvv', 'vvvv', 'vvvv', 'vvvv', 'vvvv', 'vvvv', 'vvvv', 'vvvv', 333, 'vvvv', 'vvvv', 'vvvv', 'vvvv', 'vvvv', 'vvvv', 'vvvv', '2021-09-26 22:39:25'),
(12, 'vcvc', 456, 'xxxx', 'bbb', 'xxcvxvcdvdv', 'bbbb', 'bbbb', 'bbbb', 'bbbb', 'bbbb', 3455, 'bbbb', 'bbbb', 'bbbb', 'bbbb', 'bbbb', 'bbbb', 'bbbb', '2021-09-27 07:16:25'),
(13, 'rugjoof', 57576, 'dlfdfgdfg', 'ddvfsfd', 'ffjjrrifivik', 'kdfjkfkdk', 'sdvdskjsd', 'dmfmrk', 'crkrkrmfmv', 'kkkfrmrmvm', 2019, 'ddsvdsv', 'ddfddf', 'dfvdfvdfv', 'svivdvdr', 'dfdvegr', 'fvnvivfdij', 'dfvmdjkf', '2021-09-30 14:30:28');

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

--
-- Dumping data for table `circulations`
--

INSERT INTO `circulations` (`id`, `book_id`, `member_id`, `issue_date`, `deadline`, `returned_date`, `fine`) VALUES
(1, 4, 3, '2021-09-27 05:31:20', '2021-12-27 05:31:20', '0000-00-00 00:00:00', 0),
(2, 6, 5, '2021-09-27 05:46:16', '2021-12-27 05:46:16', '0000-00-00 00:00:00', 0),
(3, 12, 3, '2021-09-27 07:16:45', '2021-12-27 07:16:45', '0000-00-00 00:00:00', 0),
(4, 7, 3, '2021-09-27 12:42:00', '2021-12-27 12:42:00', '0000-00-00 00:00:00', 0),
(5, 7, 3, '2021-09-30 14:36:42', '2021-12-30 14:36:42', '0000-00-00 00:00:00', 0);

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
(26, 'gsribarathvajasarma@gmail.com', '15695', 1633352566);

-- --------------------------------------------------------

--
-- Table structure for table `patrons`
--

CREATE TABLE `patrons` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nic` varchar(15) NOT NULL,
  `phone_num` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `gender` varchar(6) NOT NULL,
  `rank` varchar(20) NOT NULL,
  `user_id` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patrons`
--

INSERT INTO `patrons` (`id`, `firstname`, `middlename`, `lastname`, `email`, `nic`, `phone_num`, `date`, `gender`, `rank`, `user_id`) VALUES
(2, 'Amanda', 'L', 'Gunawardhana', 'ag@gmail.com', '963655758', 785968633, '2021-09-10 07:38:41', 'male', 'lecturer', ''),
(3, 'Madushi', 'G', 'Gamage', 'mg@gmail.com', '901174562', 702586988, '2021-09-10 07:40:15', 'female', 'professor', ''),
(5, 'Amila', 'S', 'Dewon', 'ade@gmail.com', '998957412', 714545889, '2021-09-13 04:41:44', 'male', 'student', ''),
(8, 'barath', 'vvccvvv', 'sarma', 'fkfkfk@mail.com', '58584848', 769838892, '2021-09-30 14:33:42', 'male', 'student', '');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `reserved_date` datetime NOT NULL,
  `expire_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `book_id`, `member_id`, `reserved_date`, `expire_date`) VALUES
(1, 4, 7, '2021-09-21 10:42:36', '0000-00-00 00:00:00'),
(2, 6, 4, '2021-09-22 14:19:45', '0000-00-00 00:00:00'),
(3, 6, 4, '2021-09-22 14:20:27', '0000-00-00 00:00:00'),
(4, 8, 4, '2021-09-22 14:46:10', '2021-09-22 14:46:10'),
(5, 5, 4, '2021-09-22 15:36:41', '2021-12-22 00:00:00'),
(6, 6, 4, '2021-09-22 15:37:21', '2021-12-22 15:37:21'),
(7, 6, 4, '2021-09-22 16:35:40', '2021-12-22 16:35:40'),
(8, 4, 4, '2021-09-24 06:26:25', '2021-12-24 06:26:25'),
(9, 6, 4, '2021-09-24 06:28:07', '2021-12-24 06:28:07'),
(10, 6, 4, '2021-09-24 06:42:54', '2021-12-24 06:42:54'),
(11, 4, 8, '2021-09-24 16:15:22', '2021-12-24 16:15:22'),
(12, 6, 8, '2021-09-24 16:16:11', '2021-12-24 16:16:11'),
(13, 6, 8, '2021-09-24 16:16:14', '2021-12-24 16:16:14'),
(14, 6, 8, '2021-09-24 16:16:53', '2021-12-24 16:16:53'),
(15, 6, 8, '2021-09-26 20:14:05', '2021-12-26 20:14:05'),
(16, 5, 8, '2021-09-27 12:28:30', '2021-12-27 12:28:30'),
(17, 7, 8, '2021-09-27 12:36:50', '2021-12-27 12:36:50'),
(18, 4, 8, '2021-09-29 10:23:07', '2021-12-29 10:23:07'),
(19, 12, 8, '2021-09-29 16:00:51', '2021-12-29 16:00:51'),
(20, 4, 8, '2021-09-30 14:26:37', '2021-12-30 14:26:37'),
(21, 4, 8, '2021-09-30 16:07:25', '2021-12-30 16:07:25');

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
  `user_id` varchar(60) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `rank` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `date`, `user_id`, `gender`, `school_id`, `rank`, `password`, `image`) VALUES
(3, 'sssss', 'sarma', 'rajuakilan2@gmail.com', '2021-08-31 21:00:15', '4IFsYXGmlruWlYTR7BTPblkYAaDvgDBTDraDexABYmpqspWeKgl4KtprqL08', 'male', '', 'student', '$2y$10$cSpwzLCrhUV4kjuDhrV7J.Vw78fAZHUnPzUWp72XobMKXvMSlKBJ2', 'uploads/2355624.jpg'),
(4, 'Mary', 'soori', 'soori@gmail.com', '2021-09-01 08:26:14', '1rdLLKbmD3uMRruvOrprN1L93t200E343puwMpqdE6o10bMgEMW5ka70FaQD', 'female', '', 'librarian', '$2y$10$D1adzqDCn4g4C1569pLuqey/6bdli0QIzJVztc.uqc2C2RynZHNFm', 'uploads/assassin.jfif'),
(5, 'bbbbb', 'rrrrrrr', 'abc@gmail.com', '2021-09-02 16:42:19', 'CKSX873TzWPNKOVhEfRUwLfnwj3KtfLpj5PlKyw4nkYjmsV2EcdPmzyHwDFT', 'male', '', 'lecturer', '$2y$10$EWALn/8ioqI9v5yLbtt6A.zlFvyL6dJkv6JimM2a/B3en.lJZTlWW', ''),
(6, 'aaa', 'bbb', 'mmm@mail.com', '2021-09-08 14:39:34', 'HW1k2NSjKur0uYShydH2FlQpgWwQVvHuWXYaucb47TzpQkjlzQ7cmUX2CjB9', 'male', '', 'student', '$2y$10$o7LYPTKC.w92tGzoo8MnO.Ksuz4Iow2NkWIHyMNdG9DpXVvkMBfOe', ''),
(7, 'barath', 'sarma', 'barath@gmail.com', '2021-09-21 10:32:48', '1anxnKv9WKUHCaRBRbOuVoJKcDbOVj8tfBdSNhXkvkoy4JdHE1AUoeR9IrfT', 'male', '', 'librarian', '$2y$10$qSY8mHd60Zb38MYdLtpgMOJox/VMTtYPndYsS1iaoT/vdVc7sbVke', ''),
(8, 'barath', 'sarma', 'gsribarathvajasarma@gmail.com', '2021-09-24 16:15:10', 'tkOekHA0Wuxuv8X3XKo7mh9Mnf8t0CRuYgTus5Gclff6xw0e2blepgv7yLrR', 'male', '', 'librarian', '$2y$10$R7SMNeTglW07UonMY1.5o.ob0cW.lyu1ObNRsFMM59InZTMCAaMim', 'uploads/2355624.jpg'),
(9, 'vvvv', 'vvvv', 'vvvv@gmail.com', '2021-09-26 22:40:17', 'S3jL3tpVwh83bHqAdxefFkniJHJWyIqSz4tvMVJXklDfaLremrjeqDaAI1xI', 'male', '', 'librarian', '$2y$10$ZzJkFP136FKy2QzeJcG4Ge6MlQnuFnSczTHVe9h1SPLaeUAQXgvNa', ''),
(10, 'jane', 'ggjgjgh', 'jane@mail.com', '2021-09-28 04:34:06', 'OldyhSewy4sAzntqGiVgqWeRBs10nilAj6mefEAzAILrRLQqsLESn3f5zCHj', 'male', '', 'student', '$2y$10$Q5dKgf2G0VSKS2y5VnJZweQHl1Lm14c2c4kVaiDNwQeMNNZ77oBPO', ''),
(11, 'abcc', 'fggb', 'fdfvdfv@mail.com', '2021-09-28 04:36:26', 'eCov5l4IwRmtf5jVF5Whsl767Bb2K4qVomU18xwqpg0V0m17P4wXnAKzYTFG', 'male', '', 'student', '$2y$10$0Z1SzJx9jIUtq8FixcSGDufAKi0pznzJYjoQBtRw21fqzfx4ZzVhy', ''),
(12, 'barath', 'dsfsfsdf', 'efgh@gmail.com', '2021-09-28 05:19:15', '0MtH03zSpykCI0Vpllp8iSkxf30b7vqGRrycmtpHHLwc2Bq6kr7N6f0WnChd', 'male', '', 'librarian', '$2y$10$yjl6EwEkF.6dirlKDWhd2.ycLWlTUU2VJKKr0n8PbthZB6u9QvoK2', ''),
(13, 'ravi', 'kumar', 'ravi@mail.com', '2021-09-30 14:23:39', 'FU0O3FlpYAhUbLYnhVyKgkFFOTCEBBtLiK9VxVSuYWXcGNpSyrxpjwixu7Ad', 'male', '', 'librarian', '$2y$10$VvNyzJZbRNilkvHhZ34LqejWWhTO5lhEJ3RsH7PFdKoMpvGS.EA22', '');

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
-- Indexes for table `patrons`
--
ALTER TABLE `patrons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `middlename` (`middlename`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `email` (`email`),
  ADD KEY `nic` (`nic`),
  ADD KEY `phone_num` (`phone_num`),
  ADD KEY `date` (`date`),
  ADD KEY `gender` (`gender`),
  ADD KEY `rank` (`rank`),
  ADD KEY `user_id` (`user_id`);

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `gender` (`gender`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `rank` (`rank`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `circulations`
--
ALTER TABLE `circulations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `patrons`
--
ALTER TABLE `patrons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `FK_reservation_book_id` FOREIGN KEY (`book_id`) REFERENCES `catalogs` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_reservation_member_id` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

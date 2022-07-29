-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2022 at 04:46 PM
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
  `copy_id` varchar(20) NOT NULL,
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
  `damageState` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `ISBN`, `copy_id`, `CallNo`, `LanguageCode`, `Author`, `Title`, `SubTitle`, `StatementOfResposiblity`, `Edition`, `PlaceOfPublication`, `NameOfPublisher`, `YearOfPublication`, `PhysicalDescription`, `Series`, `GeneralNote`, `Subject`, `URL`, `AddedEntry`, `Type`, `Collection`, `damageState`, `Status`, `date`, `price`) VALUES
(4, '450-702-0086-923', '00001', 'BX 12', 'eng', 'Williams', 'JavaScript Fundamentals', 'None', 'None', 'Second', 'California', 'PWA', 1999, 'The JavaScript Fundamentals is a comprehensive monograph written by computer scientist William. William began the project, originally conceived as a single book with twelve chapters, in 1999.', 'None', 'None', 'Programming', 'https://www.amazon.com/Programming-Fundamentals-JavaScript-Rex-Barzee-ebook/dp/B0727XJR94', 'None', 'Textbook', 'Lending', 'OK', 'Available', '2021-09-07 19:52:43', '10000.00'),
(5, '789-390-1098-255', '00001', 'XD 565', 'eng', 'Ronald Revest', 'Software Engineering ', 'A comperensive guide', 'None', 'second', 'Newyork', 'Oxford', 2010, 'None', 'None', 'None', 'Software engineering', 'https://www.amazon.com/Software-Design-Engineering-Books/b?ie=UTF8&node=491316', 'None', 'Textbook', 'Lending', 'OK', 'Available', '2021-09-12 18:37:16', '10000.00'),
(6, '761-450-4667-011', '00001', 'CV 12', 'eng', 'Clifort Stain', 'Introduction to Algorithms', 'None', 'None', 'second', 'Sri lanka', 'PWA', 1999, 'None', 'None', 'None', 'Algorithms', 'https://www.amazon.com/Introduction-Algorithms-3rd-MIT-Press/dp/0262033844', 'None', 'Textbook', 'Lending', 'OK', 'Available', '2021-09-15 11:30:57', '12200.00'),
(7, '646-686-1232-709', '00001', 'MB 790', 'eng', 'Steve McConnell', 'Code Complete', 'None', 'None', 'Third', 'Boston', 'PWA', 2007, 'None', 'None', 'None', 'Programming', 'https://www.amazon.com/Code-Complete-Practical-Handbook-Construction/dp/0735619670', 'None', 'Textbook', 'Lending', 'OK', 'Available', '2021-09-15 11:56:55', '15000.00'),
(12, '908-6540-34-1056', '00001', 'HB 670', 'snh', 'Eric Matthes', 'Python Crash Course', 'A Hands-On, Project-Based Introduction to Programming', 'None', 'second', 'Sri lanka', 'PWA', 1998, 'None', 'None', 'None', 'Programming', 'https://www.amazon.com/Python-Crash-Course-2nd-Edition/dp/1593279280', 'None', 'Textbook', 'Lending', 'OK', 'Available', '2021-09-27 07:16:25', '45000.00'),
(13, '123-456-789-1024', '00001', '57576', 'tam', 'Mark', 'Data Structures and Algorithms', 'None', 'None', 'Second', 'Newyork', 'PWA', 2019, 'None', 'None', 'None', 'Data structure', 'https://www.amazon.com/Common-Sense-Guide-Structures-Algorithms-Second/dp/1680507222/ref=sr_1_1?dchild=1&keywords=Data+Structures+and+Algorithms&qid=1634574667&sr=8-1', 'None', 'Textbook', 'Lending', 'OK', 'Available', '2021-09-30 14:30:28', '25000.00'),
(54, '4010-54-222-429-7', '00001', 'RT 90', 'eng', 'Donald Knuth', 'Head First Design Patterns', 'None', 'None', 'First', 'Newyork', 'PWS', 1999, '200 pages', 'The art of computing', 'None', 'Computing', 'https://www.amazon.com/Computer-Programming-Volumes-1-4A-Boxed/dp/0321751043', 'None', 'CD/DVD', 'lending', 'OK', 'Available', '2021-11-26 09:59:44', '10000.00'),
(55, '809-56-7968-2237', '00001', 'MD 567', 'eng', 'Michael Sipser', 'Clean Code', 'None', 'None', 'First', 'Boston', 'PWS', 1997, '300 pages', 'Introduction  to the Theory of Computation ', 'None', 'Computing', 'https://www.amazon.com/Introduction-Theory-Computation-Michael-Sipser/dp/113318779X', 'None', 'textbook', 'lending', 'OK', 'Available', '2021-11-26 09:59:44', '10000.00'),
(56, '7845-23-897-877-5', '00001', 'RT 90', 'eng', 'Martin Kleppmann', 'Designing Data-Intensive Applications', 'The Big Ideas Behind Reliable, Scalable, and Maintainable Systems', 'None', 'First', 'Newyork', 'PWS', 1999, '200 pages', 'The art of computing', 'None', 'Computing', 'https://www.amazon.com/Computer-Programming-Volumes-1-4A-Boxed/dp/0321751043', 'None', 'textbook', 'lending', 'OK', 'Borrowed', '2021-12-09 18:40:28', '25000.00'),
(57, '869-67-8902-6734', '00001', 'MD 56', 'eng', 'Michael Sipser', 'Automata theory', 'None', 'None', 'First', 'Boston', 'PWS', 1997, '300 pages', 'Automata theory ', 'None', 'Computing', 'https://www.amazon.com/Introduction-Theory-Computation-Michael-Sipser/dp/113318779X', 'None', 'textbook', 'lending', 'OK', 'Borrowed', '2021-12-09 18:40:28', '0.00');

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
  `fine` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `circulations`
--

INSERT INTO `circulations` (`id`, `book_id`, `member_id`, `issue_date`, `deadline`, `returned_date`, `fine`, `status`) VALUES
(3, 4, 89, '2022-03-23 15:09:17', '2022-04-22 15:09:17', '2022-03-23 15:10:34', '0.00', 'Returned'),
(4, 55, 89, '2022-03-23 15:11:20', '2022-04-22 15:11:20', '2022-03-23 15:19:25', '0.00', 'Damaged'),
(5, 56, 8, '2022-03-26 17:09:58', '2022-05-05 17:09:58', '0000-00-00 00:00:00', '0.00', 'Renewed'),
(6, 57, 89, '2022-03-23 15:16:52', '2022-04-22 15:16:52', '0000-00-00 00:00:00', '0.00', 'borrowed'),
(7, 4, 89, '2022-03-23 23:40:11', '2022-04-22 23:40:11', '2022-03-23 23:41:16', '0.00', 'Damaged'),
(8, 55, 89, '2022-03-24 11:47:57', '2022-04-23 11:47:57', '2022-03-26 12:36:15', '0.00', 'Returned'),
(9, 4, 89, '2022-03-24 11:46:48', '2022-04-23 11:46:48', '2022-03-24 11:47:33', '0.00', 'Damaged');

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
(35, 'gsribarathvajasarma@gmail.com', '50085', 1634444158),
(36, 'gsribarathvajasarma@gmail.com', '87973', 1637918082),
(37, 'gsribarathvajasarma@gmail.com', '69085', 1642599123),
(38, 'gsribarathvajasarma@gmail.com', '15763', 1647604852),
(39, 'gsribarathvajasarma@gmail.com', '52729', 1647604892),
(40, 'gsribarathvajasarma@gmail.com', '98392', 1647945414),
(41, 'gsribarathvajasarma@gmail.com', '99632', 1647945478),
(42, 'gsribarathvajasarma@gmail.com', '14571', 1648016398),
(43, 'gsribarathvajasarma@gmail.com', '54257', 1648024609),
(44, 'gsribarathvajasarma@gmail.com', '51312', 1648026516),
(45, 'gsribarathvajasarma@gmail.com', '29384', 1648059770);

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `initialFine` decimal(10,2) NOT NULL,
  `finePerHour` decimal(10,2) NOT NULL,
  `BorrowPeriod` int(11) NOT NULL,
  `ReservedPeriod` int(11) NOT NULL,
  `max_borrow` int(11) NOT NULL,
  `max_reserve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `category`, `initialFine`, `finePerHour`, `BorrowPeriod`, `ReservedPeriod`, `max_borrow`, `max_reserve`) VALUES
(1, 'Librarian', '30.00', '1.00', 40, 40, 5, 5),
(2, 'Library Staff', '20.00', '1.00', 30, 30, 5, 5),
(3, 'Senior Lecturer', '20.00', '1.00', 30, 30, 5, 5),
(4, 'Lecturer', '20.00', '1.00', 30, 30, 5, 5),
(5, 'Assistant Lecturer', '20.00', '1.00', 30, 30, 5, 5),
(6, 'Instructor', '20.00', '1.00', 30, 30, 5, 5),
(7, 'Undergraduate', '20.00', '1.00', 10, 10, 6, 5),
(8, 'Postgraduate', '20.00', '1.00', 30, 30, 5, 5),
(9, 'Non Academic', '20.00', '1.00', 30, 30, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `patronpreviews`
--

CREATE TABLE `patronpreviews` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `gender` varchar(6) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `rank` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `borrowed_books` int(11) NOT NULL,
  `reserved_books` int(11) NOT NULL,
  `title` varchar(5) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_num` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penaltys`
--

CREATE TABLE `penaltys` (
  `id` int(11) NOT NULL,
  `bookName` varchar(255) NOT NULL,
  `bookISBN` varchar(100) NOT NULL,
  `memberName` varchar(100) NOT NULL,
  `memberEmail` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `method` varchar(50) NOT NULL,
  `penalty` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penaltys`
--

INSERT INTO `penaltys` (`id`, `bookName`, `bookISBN`, `memberName`, `memberEmail`, `price`, `method`, `penalty`, `date`) VALUES
(1, 'JavaScript Fundamentals', '450-702-0086-921', 'Barath', 'gsribarathvajasarma@gmail.com', '125.00', 'Damaged', '0.00', '2021-12-10 09:14:58'),
(2, 'JavaScript Fundamentals', '450-702-0086-921', 'Barath', 'gsribarathvajasarma@gmail.com', '100.00', 'Damaged', '125.00', '2021-12-10 09:16:24'),
(3, 'JavaScript Fundamentals', '450-702-0086-921', 'Barath', 'gsribarathvajasarma@gmail.com', '100.00', 'Damaged', '125.00', '2021-12-10 09:58:54'),
(4, 'JavaScript Fundamentals', '450-702-0086-921', 'Barath', 'gsribarathvajasarma@gmail.com', '100.00', 'Lost', '125.00', '2021-12-10 10:07:19'),
(5, 'JavaScript Fundamentals', '450-702-0086-921', 'Barath', 'gsribarathvajasarma@gmail.com', '100.00', 'Lost', '125.00', '2021-12-10 10:24:20'),
(6, 'JavaScript Fundamentals', '450-702-0086-921', 'Barath', 'gsribarathvajasarma@gmail.com', '100.00', 'Damaged', '125.00', '2021-12-10 10:25:11'),
(7, 'JavaScript Fundamentals', '450-702-0086-923', 'abcd', 'sribarathvajasarma@gmail.com', '100.00', 'Damaged', '125.00', '2022-01-06 08:10:17'),
(8, 'JavaScript Fundamentals', '450-702-0086-923', 'Barath', 'gsribarathvajasarma@gmail.com', '100.00', 'Lost', '125.00', '2022-03-20 03:38:19'),
(9, 'Introduction to the Theory of Computation', '140-95-5028-0045', 'Saman', 'barathsarma@gmail.com', '0.00', 'Damaged', '0.00', '2022-03-23 10:49:25'),
(10, 'JavaScript Fundamentals', '450-702-0086-923', 'Saman', 'barathsarma@gmail.com', '100.00', 'Damaged', '125.00', '2022-03-23 19:11:16'),
(11, 'JavaScript Fundamentals', '450-702-0086-923', 'Saman', 'barathsarma@gmail.com', '10000.00', 'Damaged', '12500.00', '2022-03-24 07:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `previews`
--

CREATE TABLE `previews` (
  `id` int(11) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `copy_id` varchar(20) NOT NULL,
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
  `damageState` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(30, 'Yes', 'Yes'),
(77, 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `renews`
--

CREATE TABLE `renews` (
  `id` int(11) NOT NULL,
  `circulation_id` int(11) NOT NULL,
  `old_issue_date` datetime NOT NULL,
  `old_deadline` datetime NOT NULL,
  `old_fine` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renews`
--

INSERT INTO `renews` (`id`, `circulation_id`, `old_issue_date`, `old_deadline`, `old_fine`, `date`) VALUES
(4, 3, '2021-12-10 13:06:00', '2022-03-10 13:06:00', 0, '2021-12-16 22:06:41'),
(5, 4, '2021-12-10 13:17:30', '2022-03-10 13:17:30', 0, '2021-12-16 22:07:02'),
(9, 6, '2021-12-10 13:25:55', '2022-03-10 13:25:55', 0, '2021-12-16 22:36:34'),
(10, 7, '2021-12-10 18:12:00', '2022-03-10 18:12:00', 0, '2021-12-16 23:23:21'),
(11, 7, '2021-12-10 18:12:00', '2022-03-10 18:12:00', 0, '2021-12-16 23:23:37'),
(12, 7, '2021-12-10 18:12:00', '2022-03-10 18:12:00', 0, '2021-12-16 23:25:24'),
(13, 7, '2021-12-10 18:12:00', '2022-03-10 18:12:00', 0, '2021-12-16 23:27:23'),
(14, 8, '2021-12-10 21:28:24', '2022-01-10 21:28:24', 0, '2021-12-16 23:29:20'),
(15, 8, '2022-03-24 07:04:49', '2022-04-23 07:04:49', 0, '2022-03-24 11:47:57'),
(16, 5, '2022-03-23 15:14:10', '2022-05-02 15:14:10', 0, '2022-03-26 17:09:58');

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
(1, 4, 8, '2022-03-22 11:38:02', '2022-06-22 11:38:02', 'removed'),
(2, 5, 8, '2022-03-25 02:58:17', '2022-06-25 02:58:17', 'removed'),
(3, 4, 9, '2022-03-26 06:49:59', '2022-06-26 06:49:59', 'removed'),
(4, 4, 8, '2022-03-26 14:54:18', '2022-06-26 14:54:18', 'removed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `gender` varchar(6) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `rank` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `borrowed_books` int(11) NOT NULL,
  `reserved_books` int(11) NOT NULL,
  `title` varchar(5) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_num` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `nic`, `date`, `gender`, `user_id`, `rank`, `password`, `image`, `borrowed_books`, `reserved_books`, `title`, `address`, `phone_num`) VALUES
(4, 'Rumesha', 'Chathumini', 'rumesha@gmail.com', '874567237V', '2021-09-01 08:26:14', 'Female', '', 'Librarian', '$2y$10$D1adzqDCn4g4C1569pLuqey/6bdli0QIzJVztc.uqc2C2RynZHNFm', 'uploads/assassin.jfif', 0, 0, 'Ms.', 'abcd', '07694843'),
(5, 'Anton', 'Sinthujan', 'anton@gmail.com', '936789325V', '2021-09-02 16:42:19', 'Male', '', 'Librarian', '$2y$10$EWALn/8ioqI9v5yLbtt6A.zlFvyL6dJkv6JimM2a/B3en.lJZTlWW', '', 0, 0, 'Mr.', 'abcd', '5848373758'),
(6, 'Kamala', 'Raj', 'kamal@gmail.com', '904532561V', '2021-09-08 14:39:34', 'Male', '', 'Undergraduate', '$2y$10$YQNoPJQyQryiS871DecPEOK4IoYYjG4mgVNzTAyhTOZsP8boJmcZ6', '', 0, 0, 'Mr.', 'abcd', '574783845'),
(8, 'Barath', 'Sarma', 'gsribarathvajasarma@gmail.com', '894626589V', '2021-09-24 16:15:10', 'Male', '', 'Librarian', '$2y$10$Q/QVZZ6DIpP0XJ4c9v.uSerm.nUEdAhN06Zrgf1D0nviZ9CbmK0em', 'uploads/photo.jpeg', 1, 0, 'Mr.', 'abcd', '7888483395'),
(9, 'Suman', 'Raj', 'barath0769838892@gmail.com', '869785949V', '2021-09-26 22:40:17', 'Male', '', 'Undergraduate', '$2y$10$ZzJkFP136FKy2QzeJcG4Ge6MlQnuFnSczTHVe9h1SPLaeUAQXgvNa', '', 0, 0, 'Mr.', 'abcd', '784339294'),
(10, 'Dulanjana', 'Indrajith', 'dulanjana@gmail.com', '984759697V', '2021-09-28 04:34:06', 'Male', '', 'Librarian', '$2y$10$Q5dKgf2G0VSKS2y5VnJZweQHl1Lm14c2c4kVaiDNwQeMNNZ77oBPO', '', 0, 0, 'Mr.', 'abcd', '231457689'),
(11, 'Vijay', 'Kumar', 'vijay@gmail.com', '786574838V', '2021-09-28 04:36:26', 'Male', '', 'Postgraduate', '$2y$10$0Z1SzJx9jIUtq8FixcSGDufAKi0pznzJYjoQBtRw21fqzfx4ZzVhy', '', 0, 0, 'Mr.', 'abcd', '7367866996'),
(12, 'Karan', 'Kumar', 'karan@gmail.com', '868594945V', '2021-09-28 05:19:15', 'Male', '', 'Senior Lecturer', '$2y$10$yjl6EwEkF.6dirlKDWhd2.ycLWlTUU2VJKKr0n8PbthZB6u9QvoK2', '', 0, 0, 'Mr.', 'abcd', '88076959449'),
(30, 'Gavi', 'Kumar', 'ravi@gmail.com', '985488699V', '2021-10-15 20:17:18', 'Male', '', 'Library Staff', '$2y$10$9zr81iD.3uQrLf9emzCEO.TWF072K686nrexBKzR6w1YXUKnnetvG', '', 0, 0, 'Mr.', 'abcd', '78839394954'),
(77, 'Ravi', 'Gamage', 'mano@gmail.com', '994573823V', '2022-01-19 14:04:48', 'Male', '', 'Library Staff', '$2y$10$vQ3OClkiu9/Y7ylNC97dgeBcVpgLtPOlAAwg4luLtnrMu0IW9pDpS', '', 0, 0, 'Mr.', 'abcd', '87996848483'),
(89, 'Saman', 'Perera', 'barathsarma@gmail.com', '993551295V', '2022-03-23 10:28:32', 'Male', '', 'Senior Lecturer', '$2y$10$OM/1r4/XwCmMChAjrDRbK.iAmKAjO7Plxge6zFhMUG24wGA3jARlq', '', 1, 0, 'Mr.', 'No 35, araliya road, Matara.', '0763472108'),
(95, 'Amal', 'Ranasingha', 'amal@gmail.com', '991833730V', '2022-03-24 07:15:16', 'Male', '', 'Senior Lecturer', '$2y$10$ZcI2yPrYXVbhsxTTsYKpsuFkJ/nHI9uKYGjeuDEVV4xF7r/.uvv2i', '', 0, 0, '', 'No 35, araliya road, Matara.', '0788385946');

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
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penaltys`
--
ALTER TABLE `penaltys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `previews`
--
ALTER TABLE `previews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renews`
--
ALTER TABLE `renews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_circulation` (`circulation_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `circulations`
--
ALTER TABLE `circulations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penaltys`
--
ALTER TABLE `penaltys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `previews`
--
ALTER TABLE `previews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `renews`
--
ALTER TABLE `renews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

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
-- Constraints for table `renews`
--
ALTER TABLE `renews`
  ADD CONSTRAINT `FK_circulation` FOREIGN KEY (`circulation_id`) REFERENCES `circulations` (`id`) ON DELETE CASCADE;

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

DROP DATABASE IF EXISTS test_db;

CREATE DATABASE test_db;

USE test_db;

SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE `catalogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4;

INSERT INTO catalogs VALUES("4","450-702-0086-923","00001","BX 12","eng","Williams","JavaScript Fundamentals","None","None","Second","California","PWA","1999","The JavaScript Fundamentals is a comprehensive monograph written by computer scientist William. William began the project, originally conceived as a single book with twelve chapters, in 1999.","None","None","Programming","https://www.amazon.com/Programming-Fundamentals-JavaScript-Rex-Barzee-ebook/dp/B0727XJR94","None","Textbook","Lending","D","Not Available","2021-09-07 19:52:43","10000.00");
INSERT INTO catalogs VALUES("5","789-390-1098-255","00001","XD 565","eng","Ronald Revest","Software engineering ","A comperensive guide","None","second","Newyork","Oxford","2010","None","None","None","Software engineering","https://www.amazon.com/Software-Design-Engineering-Books/b?ie=UTF8&node=491316","None","Textbook","Lending","OK","Available","2021-09-12 18:37:16","10000.00");
INSERT INTO catalogs VALUES("6","761-450-4667-011","00001","CV 12","eng","Clifort stain","Introduction to Algorithms","None","None","second","Sri lanka","PWA","1999","None","None","None","Algorithms","https://www.amazon.com/Introduction-Algorithms-3rd-MIT-Press/dp/0262033844","None","Textbook","Lending","OK","Available","2021-09-15 11:30:57","12200.00");
INSERT INTO catalogs VALUES("7","646-686-1232-709","00001","MB 790","eng","Steve McConnell","Code Complete","None","None","Third","Boston","PWA","2007","None","None","None","Programming","https://www.amazon.com/Code-Complete-Practical-Handbook-Construction/dp/0735619670","None","Textbook","Lending","OK","Available","2021-09-15 11:56:55","15000.00");
INSERT INTO catalogs VALUES("12","908-6540-34-1056","00001","HB 670","snh","Eric Matthes","Python Crash Course","A Hands-On, Project-Based Introduction to Programming","None","second","Sri lanka","PWA","1998","None","None","None","Programming","https://www.amazon.com/Python-Crash-Course-2nd-Edition/dp/1593279280","None","Textbook","Lending","OK","Available","2021-09-27 07:16:25","45000.00");
INSERT INTO catalogs VALUES("13","123-456-789-1024","00001","57576","tam","Mark","Data structures and Algorithms","None","None","Second","Newyork","PWA","2019","None","None","None","Data structure","https://www.amazon.com/Common-Sense-Guide-Structures-Algorithms-Second/dp/1680507222/ref=sr_1_1?dchild=1&keywords=Data+Structures+and+Algorithms&qid=1634574667&sr=8-1","None","Textbook","Lending","OK","Available","2021-09-30 14:30:28","25000.00");
INSERT INTO catalogs VALUES("54","4010-54-222-429-7","00001","RT 90","eng","Donald Knuth","Head First Design Patterns","None","None","First","Newyork","PWS","1999","200 pages","The art of computing","None","Computing","https://www.amazon.com/Computer-Programming-Volumes-1-4A-Boxed/dp/0321751043","None","CD/DVD","lending","OK","Available","2021-11-26 09:59:44","10000.00");
INSERT INTO catalogs VALUES("55","809-56-7968-2237","00001","MD 567","eng","Michael Sipser","Clean Code","None","None","First","Boston","PWS","1997","300 pages","Introduction  to the Theory of Computation ","None","Computing","https://www.amazon.com/Introduction-Theory-Computation-Michael-Sipser/dp/113318779X","None","textbook","lending","OK","Borrowed","2021-11-26 09:59:44","10000.00");
INSERT INTO catalogs VALUES("56","7845-23-897-877-5","00001","RT 90","eng","Martin Kleppmann","Designing Data-Intensive Applications","The Big Ideas Behind Reliable, Scalable, and Maintainable Systems","None","First","Newyork","PWS","1999","200 pages","The art of computing","None","Computing","https://www.amazon.com/Computer-Programming-Volumes-1-4A-Boxed/dp/0321751043","None","textbook","lending","OK","Borrowed","2021-12-09 18:40:28","25000.00");
INSERT INTO catalogs VALUES("57","869-67-8902-6734","00001","MD 56","eng","Michael Sipser","Automata theory","None","None","First","Boston","PWS","1997","300 pages","Automata theory ","None","Computing","https://www.amazon.com/Introduction-Theory-Computation-Michael-Sipser/dp/113318779X","None","textbook","lending","OK","Borrowed","2021-12-09 18:40:28","0.00");
INSERT INTO catalogs VALUES("91","4095-34-120-567-2","00001","TC 90","250","Donald Knuth","The Art of Computing","None","None","First","Newyork","PWS","1999","200 pages","The art of computing","None","Computing","https://www.amazon.com/Computer-Programming-Volumes-1-4A-Boxed/dp/0321751043","None","textbook","lending","OK","Available","2022-03-24 07:14:33","1500.00");
INSERT INTO catalogs VALUES("92","140-95-5028-0046","00001","YU 45","250","Michael Sipser","Introduction to the Theory of Computation","None","None","First","Boston","PWS","1997","300 pages","Introduction  to the Theory of Computation ","None","Computing","https://www.amazon.com/Introduction-Theory-Computation-Michael-Sipser/dp/113318779X","None","textbook","lending","OK","Available","2022-03-24 07:14:33","1500.00");



CREATE TABLE `circulations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `issue_date` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `returned_date` datetime NOT NULL,
  `fine` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_book` (`book_id`),
  KEY `FK_member` (`member_id`),
  CONSTRAINT `FK_book` FOREIGN KEY (`book_id`) REFERENCES `catalogs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_member` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO circulations VALUES("3","4","89","2022-03-23 15:09:17","2022-04-22 15:09:17","2022-03-23 15:10:34","0.00","Returned");
INSERT INTO circulations VALUES("4","55","89","2022-03-23 15:11:20","2022-04-22 15:11:20","2022-03-23 15:19:25","0.00","Damaged");
INSERT INTO circulations VALUES("5","56","8","2022-03-23 15:14:10","2022-05-02 15:14:10","0000-00-00 00:00:00","0.00","borrowed");
INSERT INTO circulations VALUES("6","57","89","2022-03-23 15:16:52","2022-04-22 15:16:52","0000-00-00 00:00:00","0.00","borrowed");
INSERT INTO circulations VALUES("7","4","89","2022-03-23 23:40:11","2022-04-22 23:40:11","2022-03-23 23:41:16","0.00","Damaged");
INSERT INTO circulations VALUES("8","55","89","2022-03-24 11:47:57","2022-04-23 11:47:57","0000-00-00 00:00:00","0.00","Renewed");
INSERT INTO circulations VALUES("9","4","89","2022-03-24 11:46:48","2022-04-23 11:46:48","2022-03-24 11:47:33","0.00","Damaged");



CREATE TABLE `codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `expire` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

INSERT INTO codes VALUES("1","gsribarathvajasarma@gmail.com","82243","1632911168");
INSERT INTO codes VALUES("2","gsribarathvajasarma@gmail.com","58457","1632911575");
INSERT INTO codes VALUES("3","gsribarathvajasarma@gmail.com","74351","1632912416");
INSERT INTO codes VALUES("4","gsribarathvajasarma@gmail.com","96302","1632912615");
INSERT INTO codes VALUES("5","gsribarathvajasarma@gmail.com","14833","1632912709");
INSERT INTO codes VALUES("6","gsribarathvajasarma@gmail.com","10460","1632912945");
INSERT INTO codes VALUES("7","gsribarathvajasarma@gmail.com","41786","1632914137");
INSERT INTO codes VALUES("8","gsribarathvajasarma@gmail.com","61067","1632914330");
INSERT INTO codes VALUES("9","gsribarathvajasarma@gmail.com","83600","1632914938");
INSERT INTO codes VALUES("10","gsribarathvajasarma@gmail.com","78951","1632915072");
INSERT INTO codes VALUES("11","gsribarathvajasarma@gmail.com","59119","1632915143");
INSERT INTO codes VALUES("12","gsribarathvajasarma@gmail.com","70268","1632923295");
INSERT INTO codes VALUES("13","gsribarathvajasarma@gmail.com","44384","1633002491");
INSERT INTO codes VALUES("14","gsribarathvajasarma@gmail.com","70067","1633002605");
INSERT INTO codes VALUES("15","gsribarathvajasarma@gmail.com","17798","1633002764");
INSERT INTO codes VALUES("16","gsribarathvajasarma@gmail.com","35026","1633005551");
INSERT INTO codes VALUES("17","gsribarathvajasarma@gmail.com","19652","1633011210");
INSERT INTO codes VALUES("18","gsribarathvajasarma@gmail.com","77440","1633015460");
INSERT INTO codes VALUES("19","gsribarathvajasarma@gmail.com","35883","1633015556");
INSERT INTO codes VALUES("20","gsribarathvajasarma@gmail.com","57421","1633346026");
INSERT INTO codes VALUES("21","gsribarathvajasarma@gmail.com","36140","1633350397");
INSERT INTO codes VALUES("22","gsribarathvajasarma@gmail.com","60338","1633350910");
INSERT INTO codes VALUES("23","gsribarathvajasarma@gmail.com","61361","1633350916");
INSERT INTO codes VALUES("24","gsribarathvajasarma@gmail.com","29501","1633352094");
INSERT INTO codes VALUES("25","gsribarathvajasarma@gmail.com","84141","1633352207");
INSERT INTO codes VALUES("26","gsribarathvajasarma@gmail.com","15695","1633352566");
INSERT INTO codes VALUES("27","gsribarathvajasarma@gmail.com","69851","1634212570");
INSERT INTO codes VALUES("28","gsribarathvajasarma@gmail.com","55620","1634213298");
INSERT INTO codes VALUES("29","gsribarathvajasarma@gmail.com","34974","1634213622");
INSERT INTO codes VALUES("30","gsribarathvajasarma@gmail.com","92331","1634227809");
INSERT INTO codes VALUES("31","gsribarathvajasarma@gmail.com","18508","1634233893");
INSERT INTO codes VALUES("32","gsribarathvajasarma@gmail.com","47688","1634324135");
INSERT INTO codes VALUES("33","gsribarathvajasarma@gmail.com","14868","1634324215");
INSERT INTO codes VALUES("34","gsribarathvajasarma@gmail.com","82616","1634368898");
INSERT INTO codes VALUES("35","gsribarathvajasarma@gmail.com","50085","1634444158");
INSERT INTO codes VALUES("36","gsribarathvajasarma@gmail.com","87973","1637918082");
INSERT INTO codes VALUES("37","gsribarathvajasarma@gmail.com","69085","1642599123");
INSERT INTO codes VALUES("38","gsribarathvajasarma@gmail.com","15763","1647604852");
INSERT INTO codes VALUES("39","gsribarathvajasarma@gmail.com","52729","1647604892");
INSERT INTO codes VALUES("40","gsribarathvajasarma@gmail.com","98392","1647945414");
INSERT INTO codes VALUES("41","gsribarathvajasarma@gmail.com","99632","1647945478");
INSERT INTO codes VALUES("42","gsribarathvajasarma@gmail.com","14571","1648016398");
INSERT INTO codes VALUES("43","gsribarathvajasarma@gmail.com","54257","1648024609");
INSERT INTO codes VALUES("44","gsribarathvajasarma@gmail.com","51312","1648026516");
INSERT INTO codes VALUES("45","gsribarathvajasarma@gmail.com","29384","1648059770");



CREATE TABLE `configurations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  `initialFine` decimal(10,2) NOT NULL,
  `finePerHour` decimal(10,2) NOT NULL,
  `BorrowPeriod` int(11) NOT NULL,
  `ReservedPeriod` int(11) NOT NULL,
  `max_borrow` int(11) NOT NULL,
  `max_reserve` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO configurations VALUES("1","Librarian","30.00","1.00","40","40","5","5");
INSERT INTO configurations VALUES("2","Library Staff","20.00","1.00","30","30","5","5");
INSERT INTO configurations VALUES("3","Senior Lecturer","20.00","1.00","30","30","5","5");
INSERT INTO configurations VALUES("4","Lecturer","20.00","1.00","30","30","5","5");
INSERT INTO configurations VALUES("5","Assistant Lecturer","20.00","1.00","30","30","5","5");
INSERT INTO configurations VALUES("6","Instructor","20.00","1.00","30","30","5","5");
INSERT INTO configurations VALUES("7","Undergraduate","20.00","1.00","10","10","6","5");
INSERT INTO configurations VALUES("8","Postgraduate","20.00","1.00","30","30","5","5");
INSERT INTO configurations VALUES("9","Non Academic","20.00","1.00","30","30","5","5");



CREATE TABLE `penaltys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bookName` varchar(255) NOT NULL,
  `bookISBN` varchar(100) NOT NULL,
  `memberName` varchar(100) NOT NULL,
  `memberEmail` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `method` varchar(50) NOT NULL,
  `penalty` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO penaltys VALUES("1","JavaScript Fundamentals","450-702-0086-921","Barath","gsribarathvajasarma@gmail.com","125.00","Damaged","0.00","2021-12-10 09:14:58");
INSERT INTO penaltys VALUES("2","JavaScript Fundamentals","450-702-0086-921","Barath","gsribarathvajasarma@gmail.com","100.00","Damaged","125.00","2021-12-10 09:16:24");
INSERT INTO penaltys VALUES("3","JavaScript Fundamentals","450-702-0086-921","Barath","gsribarathvajasarma@gmail.com","100.00","Damaged","125.00","2021-12-10 09:58:54");
INSERT INTO penaltys VALUES("4","JavaScript Fundamentals","450-702-0086-921","Barath","gsribarathvajasarma@gmail.com","100.00","Lost","125.00","2021-12-10 10:07:19");
INSERT INTO penaltys VALUES("5","JavaScript Fundamentals","450-702-0086-921","Barath","gsribarathvajasarma@gmail.com","100.00","Lost","125.00","2021-12-10 10:24:20");
INSERT INTO penaltys VALUES("6","JavaScript Fundamentals","450-702-0086-921","Barath","gsribarathvajasarma@gmail.com","100.00","Damaged","125.00","2021-12-10 10:25:11");
INSERT INTO penaltys VALUES("7","JavaScript Fundamentals","450-702-0086-923","abcd","sribarathvajasarma@gmail.com","100.00","Damaged","125.00","2022-01-06 08:10:17");
INSERT INTO penaltys VALUES("8","JavaScript Fundamentals","450-702-0086-923","Barath","gsribarathvajasarma@gmail.com","100.00","Lost","125.00","2022-03-20 03:38:19");
INSERT INTO penaltys VALUES("9","Introduction to the Theory of Computation","140-95-5028-0045","Saman","barathsarma@gmail.com","0.00","Damaged","0.00","2022-03-23 10:49:25");
INSERT INTO penaltys VALUES("10","JavaScript Fundamentals","450-702-0086-923","Saman","barathsarma@gmail.com","100.00","Damaged","125.00","2022-03-23 19:11:16");
INSERT INTO penaltys VALUES("11","JavaScript Fundamentals","450-702-0086-923","Saman","barathsarma@gmail.com","10000.00","Damaged","12500.00","2022-03-24 07:17:33");



CREATE TABLE `privileges` (
  `id` int(11) NOT NULL,
  `user_management` enum('No','Yes') NOT NULL,
  `book_management` enum('Yes','No') NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `privileges_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO privileges VALUES("30","Yes","Yes");
INSERT INTO privileges VALUES("77","No","Yes");



CREATE TABLE `renews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `circulation_id` int(11) NOT NULL,
  `old_issue_date` datetime NOT NULL,
  `old_deadline` datetime NOT NULL,
  `old_fine` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_circulation` (`circulation_id`),
  CONSTRAINT `FK_circulation` FOREIGN KEY (`circulation_id`) REFERENCES `circulations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

INSERT INTO renews VALUES("4","3","2021-12-10 13:06:00","2022-03-10 13:06:00","0","2021-12-16 22:06:41");
INSERT INTO renews VALUES("5","4","2021-12-10 13:17:30","2022-03-10 13:17:30","0","2021-12-16 22:07:02");
INSERT INTO renews VALUES("9","6","2021-12-10 13:25:55","2022-03-10 13:25:55","0","2021-12-16 22:36:34");
INSERT INTO renews VALUES("10","7","2021-12-10 18:12:00","2022-03-10 18:12:00","0","2021-12-16 23:23:21");
INSERT INTO renews VALUES("11","7","2021-12-10 18:12:00","2022-03-10 18:12:00","0","2021-12-16 23:23:37");
INSERT INTO renews VALUES("12","7","2021-12-10 18:12:00","2022-03-10 18:12:00","0","2021-12-16 23:25:24");
INSERT INTO renews VALUES("13","7","2021-12-10 18:12:00","2022-03-10 18:12:00","0","2021-12-16 23:27:23");
INSERT INTO renews VALUES("14","8","2021-12-10 21:28:24","2022-01-10 21:28:24","0","2021-12-16 23:29:20");
INSERT INTO renews VALUES("15","8","2022-03-24 07:04:49","2022-04-23 07:04:49","0","2022-03-24 11:47:57");



CREATE TABLE `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `reserved_date` datetime NOT NULL,
  `expire_date` datetime NOT NULL,
  `state` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_reservation_book_id` (`book_id`),
  KEY `FK_reservation_member_id` (`member_id`),
  CONSTRAINT `FK_reservation_book_id` FOREIGN KEY (`book_id`) REFERENCES `catalogs` (`id`) ON DELETE NO ACTION,
  CONSTRAINT `FK_reservation_member_id` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO reservations VALUES("1","4","8","2022-03-22 11:38:02","2022-06-22 11:38:02","removed");



CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `phone_num` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `firstname` (`firstname`),
  KEY `lastname` (`lastname`),
  KEY `date` (`date`),
  KEY `gender` (`gender`),
  KEY `rank` (`rank`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES("4","Rumesha","Chathumini","rumesha@mail.com","874567237V","2021-09-01 08:26:14","Female","","Librarian","$2y$10$D1adzqDCn4g4C1569pLuqey/6bdli0QIzJVztc.uqc2C2RynZHNFm","uploads/assassin.jfif","0","0","Ms.","abcd","07694843");
INSERT INTO users VALUES("5","Anton","Sinthujan","anton@mail.com","936789325V","2021-09-02 16:42:19","Male","","Librarian","$2y$10$EWALn/8ioqI9v5yLbtt6A.zlFvyL6dJkv6JimM2a/B3en.lJZTlWW","","0","0","Mr.","abcd","5848373758");
INSERT INTO users VALUES("6","Kamal","Raj","kamal@mail.com","904532561V","2021-09-08 14:39:34","Male","","Undergraduate","$2y$10$YQNoPJQyQryiS871DecPEOK4IoYYjG4mgVNzTAyhTOZsP8boJmcZ6","","0","0","Mr.","abcd","574783845");
INSERT INTO users VALUES("8","Barath","Sarma","gsribarathvajasarma@gmail.com","894626589V","2021-09-24 16:15:10","Male","","Librarian","$2y$10$Q/QVZZ6DIpP0XJ4c9v.uSerm.nUEdAhN06Zrgf1D0nviZ9CbmK0em","uploads/photo.jpeg","1","0","Mr.","abcd","7888483395");
INSERT INTO users VALUES("9","Suman","Raj","barath0769838892@gmail.com","869785949V","2021-09-26 22:40:17","Male","","Undergraduate","$2y$10$ZzJkFP136FKy2QzeJcG4Ge6MlQnuFnSczTHVe9h1SPLaeUAQXgvNa","","0","0","Mr.","abcd","784339294");
INSERT INTO users VALUES("10","Dulanjana","Indrajith","dulanjana@mail.com","984759697V","2021-09-28 04:34:06","Male","","Librarian","$2y$10$Q5dKgf2G0VSKS2y5VnJZweQHl1Lm14c2c4kVaiDNwQeMNNZ77oBPO","","0","0","Mr.","abcd","231457689");
INSERT INTO users VALUES("11","Vijay","Kumar","vijay@mail.com","786574838V","2021-09-28 04:36:26","Male","","Postgraduate","$2y$10$0Z1SzJx9jIUtq8FixcSGDufAKi0pznzJYjoQBtRw21fqzfx4ZzVhy","","0","0","Mr.","abcd","7367866996");
INSERT INTO users VALUES("12","Karan","Kumar","karan@mail.com","868594945V","2021-09-28 05:19:15","Male","","Senior Lecturer","$2y$10$yjl6EwEkF.6dirlKDWhd2.ycLWlTUU2VJKKr0n8PbthZB6u9QvoK2","","0","0","Mr.","abcd","88076959449");
INSERT INTO users VALUES("30","Gavi","Kumar","ravi@mail.com","985488699V","2021-10-15 20:17:18","Male","","Library Staff","$2y$10$9zr81iD.3uQrLf9emzCEO.TWF072K686nrexBKzR6w1YXUKnnetvG","","0","0","Mr.","abcd","78839394954");
INSERT INTO users VALUES("77","Ravi","Gamage","mano@mail.com","994573823V","2022-01-19 14:04:48","Male","","Library Staff","$2y$10$vQ3OClkiu9/Y7ylNC97dgeBcVpgLtPOlAAwg4luLtnrMu0IW9pDpS","","0","0","Mr.","abcd","87996848483");
INSERT INTO users VALUES("89","Saman","Perera","barathsarma@gmail.com","993551295V","2022-03-23 10:28:32","Male","","Senior Lecturer","$2y$10$OM/1r4/XwCmMChAjrDRbK.iAmKAjO7Plxge6zFhMUG24wGA3jARlq","","5","0","Mr.","No 35, araliya road, Matara.","0763472108");
INSERT INTO users VALUES("95","Amal","Ranasingha","amal@gmail.com","991833730v","2022-03-24 07:15:16","Male","","Senior Lecturer","$2y$10$ZcI2yPrYXVbhsxTTsYKpsuFkJ/nHI9uKYGjeuDEVV4xF7r/.uvv2i","","0","0","","No 35, araliya road, Matara.","0788385946");
INSERT INTO users VALUES("96","Nalika","Fernando","nalika@gmail.com","945541410v","2022-03-24 07:15:49","male","","Lecturer","$2y$10$HOMUR319nispmVket7tlt.5kv2ntEX4HmnbCS3sOAQ.Xv77eyIefS","","0","0","","No35,Gamage road,Galle","0718282946");
INSERT INTO users VALUES("97","Jayanthi","Gamage","jayanthi@gmail.com","697954541v","2022-03-24 07:15:49","female","","Lecturer","$2y$10$8csq9Tc2GFAEGsWXmQXTpupIFcdXqKo64QCm826YrZXLZ99PFszGe","","0","0","","	No35,Gamage road,Galle","0778978512");

SET FOREIGN_KEY_CHECKS = 1;
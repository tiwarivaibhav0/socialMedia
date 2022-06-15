-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Jun 15, 2022 at 05:15 AM
-- Server version: 8.0.19
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_media`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int UNSIGNED NOT NULL,
  `post_id` int UNSIGNED DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `comment` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `replies` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_name`, `comment`, `replies`) VALUES
(1, 12, '2', '12', b'0'),
(2, 12, '2', '12', b'0'),
(3, 12, '2', '12', b'0'),
(4, 12, '2', '', b'0'),
(5, 12, '2', '', b'0'),
(6, 12, '2', 'comment', b'0'),
(7, 12, '2', 'comment', b'0'),
(8, 12, '2', 'comment', b'0'),
(9, 12, '2', 'comment', b'0'),
(10, 12, '2', 'comment', b'0'),
(11, 12, '2', 'Hello this is anew comment!', b'0'),
(12, 12, '2', 'another new comment', b'0'),
(13, 12, 'Vaibhav Tiwari', 'this comment was made after updationg the id to username', b'0'),
(14, 12, 'Vaibhav Tiwari', 'rgrg', b'0'),
(15, 12, 'Vaibhav Tiwari', 'tytytyty', b'0'),
(16, 12, 'Vaibhav Tiwari', 'will this work?', b'0'),
(17, 12, 'Vaibhav Tiwari', 'gggggggggggggggg', b'0'),
(18, 12, 'Vaibhav Tiwari', 'check', b'0'),
(19, 12, 'Vaibhav Tiwari', '2check', b'0'),
(20, 12, 'Vaibhav Tiwari', '8888888888888888888888888888888888888', b'0'),
(21, 12, 'Vaibhav Tiwari', '999999999999999', b'0'),
(22, 12, 'Vaibhav Tiwari', '00000', b'0'),
(23, 12, 'Vaibhav Tiwari', 'Final check', b'0'),
(24, 12, 'Vaibhav Tiwari', 'inc count', b'0'),
(25, 12, 'Vaibhav Tiwari', 'count comment', b'0'),
(26, 12, 'Vaibhav Tiwari', 'count comment 2', b'0'),
(27, 8, 'Vaibhav Tiwari', '1st comment on this', b'0'),
(28, 8, 'Vaibhav Tiwari', 'kkk', b'0'),
(29, 8, 'Vaibhav Tiwari', 'sdsdsd', b'0'),
(30, 8, 'Vaibhav Tiwari', 'dsdsd', b'0'),
(31, 8, 'Vaibhav Tiwari', 'dsdsdsdsd', b'0'),
(32, 8, 'Vaibhav Tiwari', 'wqeq', b'0'),
(33, 1, 'Aksh Again', 'my 1st comment', b'0'),
(34, 1, 'Aksh Again', 'my 2nd comment', b'0'),
(35, 10, 'Aksh Again', 'rfrf', b'0'),
(36, 21, 'Aksh Again', 'Nice video!', b'0'),
(37, 8, 'Vaibhav Tiwari', 'edewde', b'0'),
(38, 8, 'Vaibhav Tiwari', 'hhh', b'0'),
(39, 8, 'Vaibhav Tiwari', 'kk', b'0'),
(40, 8, 'Vaibhav Tiwari', 'ytu6yujy', b'0'),
(41, 8, 'Vaibhav Tiwari', '88', b'0'),
(42, 25, 'Vaibhav Tiwari', 'fefe', b'0'),
(43, 25, 'Vaibhav Tiwari', 'wdwdw', b'0'),
(44, 25, 'Vaibhav Tiwari', 'wdwdw', b'0'),
(45, 25, 'Vaibhav Tiwari', 'wd232', b'0'),
(46, 25, 'tiwarivaibhav0', 'ee55', b'0'),
(47, 25, 'tiwarivaibhav0', 'eee', b'0'),
(48, 25, 'tiwarivaibhav0', '5555', b'0'),
(49, 1, 'Gangwar', 'ee', b'0'),
(50, 1, 'Gangwar', 'fefef', b'0'),
(51, 1, 'Gangwar', 'regrgrg', b'0'),
(52, 1, 'Gangwar', 'Sumit comment', b'0'),
(53, 27, '', '1st comment', b'0'),
(54, 25, 'tiwarivaibhav0', '5555555555', b'0'),
(55, 26, 'tiwarivaibhav0', 'myComment', b'0'),
(56, 26, 'soniAks', 'aksh comment', b'0'),
(57, 26, 'soniAks', 'another aksh comment!', b'0'),
(58, 1, 'soniAks', 'AkshComment', b'0'),
(59, 1, 'soniAks', 'aksh\'s comment', b'0'),
(60, 1, 'soniAks', 'ff', b'0'),
(61, 1, 'tiwarivaibhav0', 'tiwarivaibhav0 comment', b'0'),
(62, 1, 'tiwarivaibhav0', 'abcd', b'0'),
(63, 1, 'tiwarivaibhav0', 'abc\'d', b'0'),
(64, 8, 'tiwarivaibhav0', 'tiwarivaibhav0 comment', b'0'),
(66, 1, 'User11@gmail.com', 'aaa66666666', b'0'),
(67, 1, 'User11@gmail.com', 'Commnet1', b'0'),
(68, 1, 'User11@gmail.com', 'user\'s comment', b'0'),
(69, 1, 'User11@gmail.com', 'tiwarivaibhav1comment', b'0'),
(70, 1, 'User11@gmail.com', 'tiwarivaibhav0\'s comment', b'0'),
(71, 1, 'User11@gmail.com', ' apostrophe\'s', b'0'),
(73, 1, 'User11@gmail.com', 'tiwarivaibhav0\"s comment', b'0'),
(74, 1, 'User11@gmail.com', 'tiwarivaibhav01 comment', b'0'),
(75, 7, 'User11@gmail.com', 'HEllo8988+8', b'0'),
(76, 7, 'User11@gmail.com', 'HEllo8988+8', b'0'),
(77, 25, 'tiwarivaibhav0', 'new cmnt', b'0'),
(78, 25, 'tiwarivaibhav0', 'fdfd', b'0'),
(79, 25, 'tiwarivaibhav0', 'EEEEEEEEEEEE', b'0'),
(80, 25, 'tiwarivaibhav0', 'this is a multi line commentthis is a multi line comment', b'0'),
(81, 25, 'tiwarivaibhav0', 'fefe', b'0'),
(82, 25, 'tiwarivaibhav0', 'this is a multi line commentthis is a multi line commentthis is a multi line commentthis is a multi line commentthis is a multi line commentthis is a multi line comment', b'0'),
(83, 25, 'tiwarivaibhav0', 'sujeet\'s comment', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `user_id` int UNSIGNED NOT NULL,
  `friend_id` int UNSIGNED NOT NULL,
  `mute` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`user_id`, `friend_id`, `mute`) VALUES
(2, 3, b'1'),
(2, 5, b'0'),
(2, 6, b'0'),
(2, 10, b'0'),
(2, 11, b'0'),
(2, 12, b'0'),
(3, 2, b'0'),
(3, 5, b'0'),
(3, 6, b'0'),
(5, 2, b'0'),
(5, 3, b'0'),
(6, 2, b'0'),
(6, 3, b'0'),
(10, 2, b'0'),
(11, 2, b'0'),
(12, 2, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_id` int NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `file`, `type`, `size`) VALUES
(1, '6June.png', 'image/png', '121184'),
(2, '2June.png', 'image/png', '110224'),
(3, '9June.png', 'image/png', '106817'),
(4, '9June.png', 'image/png', '106817'),
(5, '9June.png', 'image/png', '106817'),
(6, '9June.png', 'image/png', '106817'),
(7, '9June.png', 'image/png', '106817'),
(8, '9June.png', 'image/png', '106817'),
(9, '2June.png', 'image/png', '110224'),
(10, '4may.png', 'image/png', '119017'),
(11, '2June.png', 'image/png', '110224'),
(12, 'Learn PHP in 15 minutes.mp4', 'video/mp4', '19386591'),
(13, 'Screenshot at 2022-05-23 18-58-11.png', 'image/png', '105460'),
(14, 'Learn PHP in 15 minutes.mp4', 'video/mp4', '19386591');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `user_id` int UNSIGNED DEFAULT NULL,
  `post_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`user_id`, `post_id`) VALUES
(2, 25),
(2, 27),
(2, 25),
(2, 27),
(2, 25),
(2, 28),
(2, 25),
(2, 25),
(2, 12),
(2, 29),
(5, 10),
(5, 11),
(5, 13),
(5, 14),
(5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `Post`
--

CREATE TABLE `Post` (
  `post_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `details` varchar(400) DEFAULT NULL,
  `post_date` timestamp NULL DEFAULT NULL,
  `likes` int DEFAULT NULL,
  `comments` int DEFAULT NULL,
  `username` varchar(60) NOT NULL,
  `video` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Post`
--

INSERT INTO `Post` (`post_id`, `user_id`, `image`, `details`, `post_date`, `likes`, `comments`, `username`, `video`) VALUES
(10, 2, '9June.png', 'June 3 image posting', '2022-06-10 12:41:56', 12, 1, 'Vaibhav Tiwari', b'0'),
(11, 2, '2June.png', 'June 1 image posting', '2022-06-10 12:46:53', 6, 0, 'Vaibhav Tiwari', b'0'),
(12, 6, '4may.png', '', '2022-06-10 13:02:01', 37, 2, 'Aksh Again', b'0'),
(13, 2, NULL, 'It is a sunny day', '2022-06-10 13:18:01', 3, 0, 'Vaibhav Tiwari', b'0'),
(14, 2, NULL, 'It is a sunny day', '2022-06-10 13:18:20', 1, 0, 'Vaibhav Tiwari', b'0'),
(15, 2, NULL, 'It is a sunny day fhfhfhfhfh', '2022-06-10 13:19:03', 2, 0, 'Vaibhav Tiwari', b'0'),
(16, 2, NULL, '45454546', '2022-06-10 13:22:34', 3, 0, 'Vaibhav Tiwari', b'0'),
(17, 2, NULL, '688888888867689888', '2022-06-10 13:23:38', 3, 0, 'Vaibhav Tiwari', b'0'),
(18, 2, NULL, '', '2022-06-10 13:24:55', 2, 0, 'Vaibhav Tiwari', b'0'),
(19, 2, NULL, '688888888867689888', '2022-06-10 13:26:13', 1, 0, 'Vaibhav Tiwari', b'0'),
(21, 2, 'Learn PHP in 15 minutes.mp4', 'Test video', '2022-06-13 05:10:11', 6, 1, 'Vaibhav Tiwari', b'1'),
(22, 2, '4may.png', '', '2022-06-13 09:40:26', 0, 0, 'Vaibhav Tiwari', b'0'),
(24, 2, '4may.png', '', '2022-06-13 09:48:00', 0, 0, 'Vaibhav Tiwari', b'0'),
(25, 5, NULL, 'Post by username aksh', '2022-06-13 10:23:02', 33, 15, 'Aksh Again', b'0'),
(27, 5, 'Learn PHP in 15 minutes.mp4', 'Test video', '2022-06-13 10:25:25', 24, 1, 'Aksh Again', b'1'),
(28, 5, '9June.png', 'June 3 image posting', '2022-06-13 11:28:45', 33, 0, 'Aksh Again', b'0'),
(29, 12, NULL, 'yjyjyjy', '2022-06-13 12:39:03', 6, 0, 'Sumit Gangwar', b'0'),
(30, 2, NULL, 'Updated post after image video separation', '2022-06-14 09:26:03', 0, 0, 'Vaibhav Tiwari', b'0'),
(31, 2, 'Screenshot at 2022-05-23 18-58-11.png', 'updated image', '2022-06-14 09:27:06', 0, 0, 'Vaibhav Tiwari', b'0'),
(32, 2, 'Learn PHP in 15 minutes.mp4', 'Updated Video', '2022-06-14 09:27:59', 0, 0, 'Vaibhav Tiwari', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `user_id` int UNSIGNED NOT NULL,
  `request_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`user_id`, `request_id`) VALUES
(1, 5),
(6, 5),
(7, 5),
(9, 5),
(10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `user_id` int UNSIGNED NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(60) NOT NULL,
  `mobile` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL,
  `country` varchar(60) DEFAULT NULL,
  `pin` int NOT NULL,
  `password` varchar(60) NOT NULL,
  `user_type` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `picture` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`user_id`, `fname`, `lname`, `email`, `username`, `mobile`, `city`, `country`, `pin`, `password`, `user_type`, `picture`) VALUES
(1, 'Admin', '1', 'admin@gmail.com', 'admin', '8090556578', 'Lucknow', 'India', 226016, 'admin', 'admin', 'https://www.pngfind.com/pngs/m/610-6104451_image-placeholder-png-user-profile-placeholder-image-png.png'),
(2, 'Vaibhav', 'Tiwari', 'Vaibhav@gmail.com', 'tiwarivaibhav0', '8090556578', 'Lucknow', 'India', 226016, 'Vaibhav', 'user', 'https://www.pngfind.com/pngs/m/610-6104451_image-placeholder-png-user-profile-placeholder-image-png.png'),
(3, 'V', 'T', 'User4@gmail.com', '4444444', '444', '44', '44', 44, '44', 'user', 'https://www.pngfind.com/pngs/m/610-6104451_image-placeholder-png-user-profile-placeholder-image-png.png'),
(5, 'Aksh', 'Again', 'Aksh@gmail.com', 'soniAks', '4444', 'Lucknow', '44', 545454, '44', 'user', 'https://www.pngfind.com/pngs/m/610-6104451_image-placeholder-png-user-profile-placeholder-image-png.png'),
(6, 'Aksh', 'Again', 'Akssh@gmail.com', 'soniAksh', '4444', 'Lucknow', '44', 545454, '44', 'user', 'https://www.pngfind.com/pngs/m/610-6104451_image-placeholder-png-user-profile-placeholder-image-png.png'),
(7, 'Aksh', 'Again', 'Akssh4@gmail.com', 'soniAksh44', '4444', 'Lucknow', '44', 545454, '44', 'user', 'https://www.pngfind.com/pngs/m/610-6104451_image-placeholder-png-user-profile-placeholder-image-png.png'),
(8, 'User11', 'User11', 'User11@gmail.com', 'User11@gmail.com', '.546564666', 'Ballia', 'India', 226016, 'ppp', 'user', 'https://www.pngfind.com/pngs/m/610-6104451_image-placeholder-png-user-profile-placeholder-image-png.png'),
(9, 'grg', 'gg', 'g@gmail.com', 'dcec', '333', '444444', '444444', 545454, '33', 'user', 'https://www.pngfind.com/pngs/m/610-6104451_image-placeholder-png-user-profile-placeholder-image-png.png'),
(10, 'Yash', 'm', 'Yash@gmail.com', 'Yashyyyy', '8675765', 'kanpur', 'USA', 55555, 'rr', 'user', 'https://www.pngfind.com/pngs/m/610-6104451_image-placeholder-png-user-profile-placeholder-image-png.png'),
(12, 'Sumit', 'Gangwar', 'Sumit@gmail.com', 'Gangwar', '5255252525', 'lucknbow', 'India', 555555, '55', 'user', 'https://www.pngfind.com/pngs/m/610-6104451_image-placeholder-png-user-profile-placeholder-image-png.png'),
(13, 'New', 'User', 'New@gmail.com', 'userNew', '8888888888', 'lucknbow', 'India', 555555, 'New', 'user', 'https://www.pngfind.com/pngs/m/610-6104451_image-placeholder-png-user-profile-placeholder-image-png.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`user_id`,`friend_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`user_id`,`request_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Post`
--
ALTER TABLE `Post`
  MODIFY `post_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Post`
--
ALTER TABLE `Post`
  ADD CONSTRAINT `Post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

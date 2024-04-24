-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 08:41 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techquery`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answer_id` varchar(20) NOT NULL,
  `questionid` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answerdesc` text NOT NULL,
  `answereddate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `questionid`, `user_id`, `answerdesc`, `answereddate`) VALUES
('aa20662950df7c666', 'cc10662950a3898de', 3, 'I added margin:2px to your day class and that made the gaps consistent.  ', '2024-04-25 00:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionid` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `qimage` varchar(500) NOT NULL,
  `questioneddate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionid`, `user_id`, `title`, `description`, `qimage`, `questioneddate`) VALUES
('cc10662950a3898de', 1, 'Replicating calendar layout from leetcode with flexbox but gaps are uneven and unconsistent', 'It\'s done with svg so the responsive part is handled intrinsically. I have challenged myself to replicate it just using css, and so far, it is not a successful challenge.\r\n\r\nIf you follow this link, you\'ll see my best attempt at it.\r\n\r\nYou\'ll notice that the gaps in between the days of the calendar are inconsistent. For some viewport widths, it seems to be consistent throughout the grid not but for all of them. This is the case whether I put a fixed or adaptive value as gap. Indeed, I have tried to set the gaps as fixed units and the \'.day\' element were still being squashed by the gaps which would then appear bigger than it should have. This is true for horizontal and vertical gaps.', 'uploads/OIP (1).jpg', '2024-04-25 00:04:11'),
('cc1066295169cb784', 3, 'Remove unwanted extra gap before first box in flexbox layout', 'I am creating a calendar layout using flexbox. I am getting an extra gap before my first box:\r\nBelow is my code. Could anyone suggest what is creating this additional gap and how I can remove it?html {\r\n  font-size: 62, 5%;\r\n  box-sizing: border-box;\r\n}\r\n\r\n*,::before, ::after {\r\n  box-sizing: inherit;\r\n}\r\n\r\nbody {\r\n  font-size: 1.6rem;\r\n  padding: 0;\r\n  margin: 0;\r\n  display: flex;\r\n  flex-direction:column;\r\n}\r\n\r\nheader.header-news {\r\n    &amp; &gt; button {\r\n        position: absolute;\r\n        top: 0;\r\n        height: 100%;\r\n        opacity: .5;\r\n     &amp;.last {\r\n       right: 0;\r\n     }   \r\n\r\n    }\r\n    &amp; &gt; div.header-news_container {\r\n        display: flex;\r\n    }\r\n    &amp; &gt; div {\r\n        flex: 1 0 0;\r\n    }\r\n  min-height: 18rem;\r\n  position: relative;\r\n}\r\n\r\nsection.main-content {\r\n  padding-top: 2rem;\r\n  display: flex;\r\n  flex-wrap: wrap;\r\n  gap: 1rem;\r\n  padding-left: 1rem;\r\n}\r\n\r\n.main-content__day {\r\n  aspect-ratio: 1/1;\r\n  width: calc(100% /7 - 1rem);\r\n  display:flex;\r\n  border: 1px solid rgba(0, 0, 0, .3);\r\n  align-items: center;\r\n  border-radius: .5rem;\r\n  justify-content: center;\r\n  cursor: pointer;\r\n  transition: .5s;\r\n}', 'uploads/Ucz3t.jpg', '2024-04-25 00:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `questiontag`
--

CREATE TABLE `questiontag` (
  `tagid` int(11) NOT NULL,
  `questionid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questiontag`
--

INSERT INTO `questiontag` (`tagid`, `questionid`) VALUES
(1, 'cc10662950a3898de'),
(2, 'cc10662950a3898de'),
(1, 'cc1066295169cb784'),
(3, 'cc1066295169cb784');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tagid` int(11) NOT NULL,
  `tagname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tagid`, `tagname`) VALUES
(1, 'flexbox'),
(2, 'leetcode'),
(3, 'layout');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `joindate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `u_email`, `password`, `joindate`) VALUES
(1, 'anish', 'anish@gmail.com', 'password', '2024-04-16'),
(2, 'akhil k', 'akhil@gmail.com', 'password', '2024-04-16'),
(3, 'manish kumar', 'manish@gmail.com', 'password', '2024-04-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionid`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tagid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tagid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

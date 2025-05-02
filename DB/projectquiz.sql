-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 01:53 PM
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
-- Database: `projectquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `qno` int(11) NOT NULL,
  `question` text NOT NULL,
  `ans1` text NOT NULL,
  `ans2` text NOT NULL,
  `ans3` text NOT NULL,
  `ans4` text NOT NULL,
  `correct_answer` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `qno`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `correct_answer`) VALUES
(9, 5, 'What is a correct way to add a comment in PHP?', '&lt;!--&hellip;--&gt;', '/*&hellip;*/', '*\\..\\*', '&lt;comment&gt;&hellip;&lt;/comment&gt;', 'b'),
(8, 3, 'The PHP syntax is most similar to:', 'Perl and C', 'VBscript', 'Javascript', 'none of these', 'a'),
(7, 2, 'How do you write \"Hello World\" in PHP?', 'echo \"Hello World\";', 'Document.Write(\"Hello World\");', '\"Hello World\";', 'none of these', 'a'),
(6, 1, 'What does PHP stand for?', 'Personal Hypertext Processor\r\n', 'Private Home Page', 'Personal Home Page', 'PHP: Hypertext Preprocessor', 'd'),
(5, 4, 'How do you get information from a form that is submitted using the &quot;get&quot; method?', '$_GET[];', 'Request.Form;', 'Request.QueryString;', 'none of these', 'a'),
(10, 6, 'When using the POST method, variables are displayed in the URL:', 'True', 'False', 'Can\'t say', 'none of these', 'b'),
(11, 7, ' Which of the following function is used to get the size of a file?', 'fopen()', 'fread()', 'fsize()', 'filesize()', 'd'),
(12, 8, 'Which of the following is used to delete a cookie?', 'setcookie()', '$_COOKIE variable', 'isset() function', 'none of the above', 'a'),
(13, 9, 'Python is an ________ language?', 'script language', 'markup language', 'interpreter language', 'none of the above', 'c'),
(14, 10, 'what is an alphebetic character in english?', 'a,e,i,o,u', 'a,b,c,d,e', 'x,y,z', 'p,q,r,s', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `played_on` varchar(225) NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `played_on`, `score`) VALUES
(78, 'hemant@vv.com', '2017-07-31 06:52:45', 0),
(68, 'admin@gmail.com', '2017-07-31 05:01:43', 0),
(77, 'root@gmail.com', '2017-07-31 06:52:09', 1),
(70, 'anirban@gmail.com', '2017-07-31 05:58:32', 3),
(76, 'john@gmail.com', '2017-07-31 06:51:41', 1),
(72, 'local@gmail.com', '2024-06-01 13:52:15', 0),
(75, 'dfgh@fgg.nn', '2017-07-31 06:43:01', 0),
(74, 'vishal@gmail.com', '2017-07-31 06:35:35', 6),
(79, 'rupesh@dffd.cvvc', '2017-07-31 06:53:37', 5),
(80, 'hello@gmail.com', '2017-07-31 06:58:18', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `played_on` varchar(225) NOT NULL,
  `score` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `usertype`, `played_on`, `score`) VALUES
(1, 'dinesh', 'dinesh@gmail.com', '72ea9b10ad081b41a57c4982649ee7fd', 'admin', '', 0),
(3, 'barath', 'barath@gmail.com', '640e185ca68111c9cf417ed3484146d5', 'user', '2024-06-01 14:39:18', 2),
(4, 'ramji', 'ramji@gmail.com', '20774c63e56c9c175de2a53c978c8db2', 'user', '2024-06-01 14:06:47', 1),
(5, 'akash', 'akash@gmail.com', 'cb7c5f69ff356ecca55b7d08df877991', 'user', '2024-06-01 14:09:47', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

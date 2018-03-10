-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2018 at 08:27 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_t`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `email`, `password`, `hash`, `active`) VALUES
(2, 'Anthony', 'Tandoh', 'tanamoinc@gmail.com', '$2y$10$JHJ1MsB9gCINNtc0AOnbqurKXR0hoy8QJASnfh9E7N6UftxpeMa1K', 'acc3e0404646c57502b480dc052c4fe1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `imageurl` varchar(600) NOT NULL,
  `smallimageurl` varchar(600) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `imageurl`, `smallimageurl`) VALUES
(122, 'http://localhost/Project-T/config/../public/sto/test4.png', 'http://localhost/Project-T/config/../public/sto/test4_small.png'),
(123, 'http://localhost/Project-T/config/../public/sto/test1.png', 'http://localhost/Project-T/config/../public/sto/test1_small.png'),
(124, 'http://localhost/Project-T/config/../public/sto/test5.png', 'http://localhost/Project-T/config/../public/sto/test5_small.png'),
(121, 'http://localhost/Project-T/config/../public/sto/test3.png', 'http://localhost/Project-T/config/../public/sto/test3_small.png'),
(120, 'http://localhost/Project-T/config/../public/sto/test2.png', 'http://localhost/Project-T/config/../public/sto/test2_small.png'),
(119, 'http://localhost/Project-T/config/../public/sto/test1.png', 'http://localhost/Project-T/config/../public/sto/test1_small.png');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(400) NOT NULL,
  `news` varchar(10000) NOT NULL,
  `time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `news`, `time`) VALUES
(11, 'Messi to Miss Malaga Clash', 'The La Liga leaders will be wiihout their Argentine ace for the 7:45 pm GMT kick-off.\r\nA barcelona statement read:\"A last minute change to the FC Barcelona squad.\"\r\n\"Leo Messi has withdrawn for personal reasons and Yerry Mina takes his place.\"\r\n\"The Colombian central defender enters the list of 18 players summoned to travel to Malaga, where the Blaugranes will visit La Rosaleda for the match corresponding to the 28th day of the league championship.\"\r\nMessi has been stunning from again this season, netting 32 goals and 16 assists in all competitions.\r\nBarcelona currently sit top of La Liga, eight points clear of closest challengers Atletico Madrid.', '0000-00-00 00:00:00'),
(13, 'Ghana@ 61 Independence Day', 'Ghana marked its 61st Independnce anniversary at the black Star Square in Accra with a  parade.', '0000-00-00 00:00:00'),
(10, 'The world\'s largest DDoS Attack took Github offloine for less than tens  minutes.', 'In a growing sign of the  increased sophistication of both cyber attacks and defences,GitHub has revealed that it weathered the largest-known DDoS attack history this week. DDoS - or distributed denial of service in full - is a cyber attack that aims to bring websites and web-based services down by bombarding them with so much traffic that their services and infrastructure are unable to handle it all.It\'s a fairly common tactic used to force targets offline.\r\nGitHub is a common target - the Chinese government is widely-suspected to be behind a five- day-long attack in 2015 over its hosting of software to bypass its internet censorship system -and the newest assault tipped the scales at an incredible 1.35Tbps at peak.\r\n\r\nA blog post retelling the incident, GitHub said the attackers hijacked\r\nsomething called \"memcaching\" - a distributed memory system known for high-performance and demand - to massively amplify the traffic volumes they were firing at GitHub\'s IP address and took control of memcached instances that GitHub said are \"inadvertently accessible on the public internet.\"', '2018-03-10 17:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `podcast`
--

CREATE TABLE `podcast` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `lyric` varchar(10000) NOT NULL,
  `imageurl` varchar(600) NOT NULL,
  `soundurl` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `podcast`
--

INSERT INTO `podcast` (`id`, `title`, `lyric`, `imageurl`, `soundurl`) VALUES
(22, 'NUMBERS 3:', 'Yesterday we heard about the organization of Israel\'s camp, having three tribes on each of the four sides of the tabernacle. This also determined their marching position when the whole group moved.', 'http://localhost/Project-T/config/../public/sto/aa1.jpg', ''),
(23, 'PSALM 27', 'This is a beautiful song, expressing David\'s confidence in the Lordâ€™s protection, and he asks the Lord...', 'http://localhost/Project-T/config/../public/sto/logo.png', ''),
(24, 'NUMBERS 1', 'Numbers is the 4th of Moses\' 5 books. And this is the one that I have looked forward to as the hardest book of all to read in the podcast! In this book we will see that unbelief hinders God\'s blessings for Israel. HC Mears says, â€œNumbers might be called the Wilderness Wanderings,â€ because it chronicles...', 'http://localhost/Project-T/config/../public/sto/c.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(150) NOT NULL,
  `title` varchar(300) NOT NULL,
  `vimg` varchar(600) NOT NULL,
  `vurl` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `vimg`, `vurl`) VALUES
(11, 'History of the Church', 'http://localhost/Project-T/config/../public/sto/a1.jpg', ''),
(8, 'Black Panther', 'http://localhost/Project-T/config/../public/sto/ts.jpg', ''),
(10, 'History Of Ghana', 'http://localhost/Project-T/config/../public/sto/h3.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `podcast`
--
ALTER TABLE `podcast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `podcast`
--
ALTER TABLE `podcast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql313.epizy.com
-- Generation Time: Apr 08, 2022 at 12:40 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_26738007_cat2link`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `ProfileName` text NOT NULL,
  `ProfileDescription` text NOT NULL,
  `ProfileProfileImage` text NOT NULL,
  `WebsiteAbout` text NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `ProfileName`, `ProfileDescription`, `ProfileProfileImage`, `WebsiteAbout`, `Timestamp`) VALUES
(1, 'Joseph Lee', 'Hi, I am Joseph Lee. Since young I have been fascinated with technology and the internet as it provides us with a wealth of information that we can learn and study without the need of another person to teach.\r\n\r\nI started programming back in secondary 3 with the help of Scratch, a block-based game editor (https://scratch.mit.edu)\r\n\r\nThe current project list is not completed yet. I will add the rest of my projects at a later date\r\n', './img/Personal/profile.webp', 'This website is developed with PHP and SQL to store the project information.\r\n\r\nThe website uses these tools:\r\n- Bootstrap for responsive design and grid system\r\n- IAD Project for website design (notice how it feels similar)', '2021-07-22 09:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `Projects`
--

CREATE TABLE `Projects` (
  `id` int(11) NOT NULL,
  `ProjectName` text NOT NULL,
  `ProjectShortName` text NOT NULL,
  `ProjectDescription` text NOT NULL,
  `ProjectShortDesc` text NOT NULL,
  `ProjectType` text NOT NULL,
  `ProjectLink` text NOT NULL,
  `LinkType` text NOT NULL,
  `ProjectGallery` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `ProjectYear` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Projects`
--

INSERT INTO `Projects` (`id`, `ProjectName`, `ProjectShortName`, `ProjectDescription`, `ProjectShortDesc`, `ProjectType`, `ProjectLink`, `LinkType`, `ProjectGallery`, `ProjectYear`) VALUES
(1, 'Online sign-up website (Innovate Training)', 'Innovate Training', 'Theme:\r\nCourse sign-up website\r\n\r\nBackground:\r\nInnovate Training, a continuous education and training company, has entrusted you to create an online website to promote its popular courses.\r\n\r\nThe layout of the website should be consistent, user friendly and mobile friendly. The website comprises a database application running at the backend.\r\n\r\nFrameworks/libraries used:\r\n- JQuery: For various functions and to support bootstrap\r\n- Bootstrap: For responsive design and certain styling\r\n- AnimeJS: For various animations across the website', 'My IAD project with a theme of a website for a training company to promote their courses online', 'IAD Project', './IAD_Project', 'View Website', '{\r\n\"1\": \"./img/IAD_Project/1.webp\",\r\n\"2\": \"./img/IAD_Project/2.webp\",\r\n\"3\": \"./img/IAD_Project/3.webp\",\r\n\"4\": \"./img/IAD_Project/4.webp\",\r\n\"5\": \"./img/IAD_Project/5.webp\",\r\n\"6\": \"./img/IAD_Project/6.webp\",\r\n\"7\": \"./img/IAD_Project/7.webp\"\r\n}', '2021'),
(2, 'MobileMD - Android Mangadex Client', 'MobileMD', 'MoblieMD is an app where you can read comics and manga from MangaDex without using a browser. Its lighter than Tachiyomi in terms of app size (22.14MB vs 6MB)\r\n\r\nIts the biggest project I had built so far with 6500+ blocks and 7K+ downloads on the Play Store. ', 'MoblieMD is a Android Managdex client built with Kodular, a fork of MIT App Inventor with advanced features', 'Android App', 'https://community.kodular.io/t/os-mobilemd-kodular-mangadex-client-new-api/120424', 'View on Kodular', '{\r\n\"1\": \"./img/MobileMD/1.webp\",\r\n\"2\": \"./img/MobileMD/icon.webp\",\r\n\"3\": \"./img/MobileMD/2.webp\",\r\n\"4\": \"./img/MobileMD/3.webp\",\r\n\"5\": \"./img/MobileMD/4.webp\",\r\n\"6\": \"./img/MobileMD/5.webp\",\r\n\"7\": \"./img/MobileMD/6.webp\",\r\n\"8\": \"./img/MobileMD/7.webp\",\r\n\"9\": \"./img/MobileMD/8.webp\",\r\n\"10\": \"./img/MobileMD/9.webp\"\r\n}', '2021'),
(3, 'MaterialAnimeList', 'MaterialAnimeList', 'This app uses the Jikan API to retrieve information from MyAnimeList. Search and find any title that exist in the anime universe with a clean material design interface.', 'MaterialAnimeList is an app to search manga on MyAnimeList through Jikan API', 'Android App', 'https://play.google.com/store/apps/details?id=come.memelabs.mmlist&hl=en_SG&gl=US', 'View on Play Store', '{\r\n\"1\": \"./img/MMList/1.webp\",\r\n\"2\": \"./img/MMList/2.webp\",\r\n\"3\": \"./img/MMList/3.webp\",\r\n\"4\": \"./img/MMList/4.webp\",\r\n\"5\": \"./img/MMList/5.webp\",\r\n\"6\": \"./img/MMList/6.webp\"\r\n}', '2020'),
(4, 'BMI Calculator', 'BMI Calculator', 'This is a BMI calculator build for one of my practical assignments for school. It is built with HTML, JavaScript (functions) and CSS (Styling)\r\n\r\nThis BMI calculator features 2 input fields you are able to input their height and weight to determine their BMI. It also indicates whether your BMI is in a healthy range and shows a different colour depending on the BMI level.', 'A BMI calculator built with simple HTML, Javascript and CSS', 'PFM PA2', './PFM_PA2', 'View Website', '{\r\n\"1\": \"./img/PFM_PA2/1.webp\",\r\n\"2\": \"./img/PFM_PA2/2.webp\"\r\n}', '2020'),
(5, 'Online Shop Prototype (GameStart)', 'GameStart', 'GameStart is a non-functional, Bootstrap based prototype for a online game shop website.\r\n\r\nThis website is fully mobile-friendly with responsive layout design that moves or changes content on the website based on the screen size which is being viewed on\r\n\r\nProject source code is available on Github:\r\nhttps://github.com/josephlee222/GameStart-prototype', 'GameStart is a non-functional, Bootstrap based prototype for a online game shop website.', 'UED Project', './GameStart', 'View Website', '{\r\n\"1\": \"./img/UED_Project/logo.webp\",\r\n\"2\": \"./img/UED_Project/1.webp\",\r\n\"3\": \"./img/UED_Project/2.webp\",\r\n\"4\": \"./img/UED_Project/3.webp\",\r\n\"5\": \"./img/UED_Project/4.webp\",\r\n\"5\": \"./img/UED_Project/c_1.webp\",\r\n\"7\": \"./img/UED_Project/c_2.webp\",\r\n\"8\": \"./img/UED_Project/c_3.webp\"\r\n}', '2020'),
(6, 'Trip planner app design', 'Trip planner', 'This is a prototype layout design for a travel planner app that can help you store your travel plans as well as help to estimate travel times. The app is also able to book for hotel rooms.\r\n\r\nThis prototype is made using Adobe XD and Photoshop.', 'An app prototype for a trip planner app made in Photoshop', 'UED PA2', '', '', '{\r\n\"1\": \"./img/UED_PA2/placeholder.webp\",\r\n\"2\": \"./img/UED_PA2/1.webp\",\r\n\"3\": \"./img/UED_PA2/2.webp\",\r\n\"4\": \"./img/UED_PA2/3.webp\",\r\n\"5\": \"./img/UED_PA2/4.webp\"\r\n}', '2020'),
(7, 'GameOn Website Prototype', 'GameOn', 'A website of a school games club (GameOn). This prototype focuses on the various aspects of user interface design to create a good website.\r\n\r\nYou can read the report on how this project is made', 'A website prototype for a school games club', 'UED PA1', './UED_PA1/UED_PA1.pdf', 'View Report', '{\r\n\"1\": \"./img/UED_PA1/1.webp\",\r\n\"2\": \"./img/UED_PA1/2.webp\"\r\n}', '2020'),
(8, 'Bus Time Checker with LTA Datamall', 'Buschecker', 'A simple bus time checker using LTA APIs (LTA Datamall) that is able to display the arrival times in minutes and the bus operator that servicing the bus number.\r\n\r\nThis was my first project using PHP to display websites. The website design is almost identical to the GameStart project.', 'A simple bus time checker using LTA APIs', 'Website', './buschecker', 'View Website', '{\r\n\"1\": \"./img/buschecker/1.webp\",\r\n\"2\": \"./img/buschecker/2.webp\"\r\n}', '2020'),
(9, 'ITE Info Tech Website', 'ITE Information Technology introduction website', 'Theme:\r\nITE Information Technology course introduction website\r\n\r\nBackground:\r\nThis is a simple website that showcases certain courses, gives a introduction to potential applicants and provide dates for the open house.\r\n\r\nThe website is made from scratch. No additional CSS frameworks except for jQuery to meet requirements', 'A simple introduction website for ITE Information Technology', 'IAD PA1', './ite_infocomm_tech', 'View Website', '{\r\n\"1\": \"./img/ite_infocomm/1.webp\",\r\n\"2\": \"./img/ite_infocomm/2.webp\",\r\n\"3\": \"./img/ite_infocomm/3.webp\",\r\n\"4\": \"./img/ite_infocomm/4.webp\"\r\n}', '2021'),
(10, 'Singapore Visitor Counter and statistics (1978 - 1987)', 'Singapore Visitor statistics', 'This project takes the number of visitors that visited Singapore during a time period (Excel sheet) and display statistics from it.\r\n\r\nThe statistics generated are top 3 countries that visited Singapore and all countries sorted by number of visitors in descending order \r\n\r\nThe start year and end year is configurable. Feel free to download the source code and change the start and end year for different result!\r\n\r\nLibraries used:\r\n- Pandas: Lists calculation\r\n- matplotlib: Generate graphs\r\n', 'Singapore visitor stats graph generator in Python', 'ASP Project', 'https://github.com/josephlee222/ASP-Project/', 'View on Github', '{\r\n\"1\": \"./img/asp_project/1.webp\",\r\n\"2\": \"./img/asp_project/2.webp\"\r\n}', '2021'),
(11, 'Nerf blaster shop app (Kangaroo Shop)', 'Kangaroo Shop', 'Simple iOS storefront that sells Nerf and X-Shot blasters as well as darts. Built with XCode and Swift (Storyboard)\r\n\r\nFeatures:\r\n- View products and categories\r\n- Search by product name\r\n- Cart features (Add, Delete, Edit quantity, Delete All)\r\n- Checkout summary\r\n- Delivery Address features (Add address, Delete address, Edit, sort addresses by name or address location)\r\n- Recharge/Add credits (Virtual currency used in the app)\r\n- Edit account details (E-mail and password)\r\n- Dark/light modes\r\n', 'Simple iOS storefront that sells Nerf blasters.', 'MSD Project', 'https://github.com/josephlee222/NerfGunShop', 'View on Github', '{\r\n\"1\": \"./img/Kangaroo/1.webp\",\r\n\"2\": \"./img/Kangaroo/2.webp\",\r\n\"3\": \"./img/Kangaroo/3.webp\",\r\n\"4\": \"./img/Kangaroo/4.webp\",\r\n\"5\": \"./img/Kangaroo/5.webp\",\r\n\"6\": \"./img/Kangaroo/6.webp\",\r\n\"7\": \"./img/Kangaroo/7.webp\",\r\n\"8\": \"./img/Kangaroo/8.webp\",\r\n\"9\": \"./img/Kangaroo/9.webp\",\r\n\"10\": \"./img/Kangaroo/10.webp\",\r\n\"11\": \"./img/Kangaroo/11.webp\",\r\n\"12\": \"./img/Kangaroo/12.webp\",\r\n\"13\": \"./img/Kangaroo/13.webp\"\r\n}', '2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Projects`
--
ALTER TABLE `Projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Projects`
--
ALTER TABLE `Projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

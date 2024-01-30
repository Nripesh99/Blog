-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 08:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_published` date NOT NULL DEFAULT curdate(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `content`, `image`, `date_published`, `user_id`) VALUES
(1, 'Natus sed neque dolojjjjjjjjjjjjjjjj', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  ', '../view/assets/upload/userUpload8376911257380Screenshot 2024-01-10 080906.png', '2024-01-16', 1),
(12, 'Optio impedit amet', 'Lorem ipsum dolor sit amet consectetur adipiscing elit et massa, fringilla himenaeos ad cubilia ullamcorper etiam tortor sollicitudin odio, lobortis sem justo porta quis vestibulum ornare porttitor. Et massa tristique suscipit tempus lacus platea nulla bibendum pretium sem vel id, natoque nibh mauris pulvinar metus pellentesque rutrum ac auctor dictumst nostra nascetur, aliquet mattis urna fusce phasellus varius mollis morbi sollicitudin etiam inceptos. Posuere molestie nulla potenti nunc congue a feugiat bibendum penatibus vestibulum, \njusto\n sed sociis et aliquam leo quisque dictumst scelerisque, mus platea taciti cursus lacinia euismod ultrices non auctor. Phasellus mus mattis fusce sagittis nisi nostra euismod tempor faucibus sodales, rhoncus class eros per cubilia varius litora mollis tortor enim fames, molestie placerat elementum eu proin hendrerit metus senectus mi. Mus tempor pellentesque venenatis dignissim id ut imperdiet augue, viverra sociis lectus facilisis sed praesent aptent maecenas eros, molestie nulla platea tristique morbi fringilla tempus. Volutpat nascetur pellentesque sodales sem lectus elementum gravida justo posuere sed ultricies tortor mi, molestie euismod purus sollicitudin accumsan et facilisi nisl conubia arcu habitasse. Nostra tellus maecenas est donec duis libero, proin sed accumsan habitasse congue himenaeos vulputate, condimentum nullam sociosqu ridiculus per. Parturient fames sed eget ultrices ante dignissim, primis risus lacus felis ridiculus, tempus montes etiam dui cras.', '../view/assets/upload/userUpload5660152277813Screenshot 2021-04-28 091010.png', '2024-01-16', 6),
(13, 'Praesentium rerum am', 'Ipsum in exercitatio', '../view/assets/upload/userUpload4086819689746Screenshot 2021-04-28 091151.png', '2024-01-16', 6),
(15, 'Nisi qui voluptates ', 'Autem nihil delenitia tere bhi me aapfknfakgoakg kanea klaga uhon ', '../view/assets/upload/userUpload31081009832978Screenshot 2021-04-28 095241.png', '2024-01-17', 6),
(19, 'Quia et qui quia quo', 'Facilis necessitatib\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit.\r\nNon varius bibendum justo a, fames tincidunt feugiat.\r\nNatoque fames tortor fusce dictumst, tempor ornare.\r\nDonec cum ante odio magna mus ornare, felis himenaeos ut lobortis cursus.\r\nArcu cursus consequat magnis interdum nec, metus nullam a.\r\nNec eros eu suspendisse maecenas potenti, phasellus varius donec.\r\nDapibus inceptos vivamus id ultrices volutpat, cursus nascetur hendrerit.', '../view/assets/upload/userUpload62871759598345IMG_2340.JPG', '2024-01-19', 1),
(20, 'Iste dolor aut aut e', 'Assumenda qui quidem', '../view/assets/upload/userUpload8991530065178Screenshot (10).png', '2024-01-21', 1),
(22, 'Possimus esse elige', 'Quo architecto id vo', '../view/assets/upload/userUpload11481570334838Screenshot 2024-01-04 105057.png', '2024-01-22', 1),
(26, 'Amet consectetur qu', 'Officiis est ducimu', '../view/assets/upload/userUpload47241981215458Screenshot (114).png', '2024-01-22', 1),
(27, 'Facere deserunt fugi', 'Sit aperiam nobis au', '../view/assets/upload/userUpload4286347465185Screenshot 2024-01-04 110910.png', '2024-01-22', 1),
(29, 'Facere deserunt fugi', 'Sit aperiam nobis auqwqwewq', '../view/assets/upload/userUpload122616087531345172658.jpg', '2024-01-22', 1),
(30, 'Nemo eiusmod labore ', 'Molestias delectus ', '../view/assets/upload/userUpload847181491080blogger-logo-icon-png-10163.png', '2024-01-22', 1),
(35, 'Facilis elit non am', 'Tempore quos tenetu', '../view/assets/upload/userUpload10004583310551234.png', '2024-01-25', 1),
(36, 'Facilis elit non am', 'Tempore quos tenetu', '../view/assets/upload/userUpload396216867767771234.png', '2024-01-25', 1),
(38, 'aweaw', '<ul><li>das<ol><li>adsasda</li><li>asd</li></ol></li><li>as</li><li><p>famska</p><figure class=\"table\"><table><tbody><tr><td>asf</td><td>fa</td><td>svv</td></tr><tr><td>fs</td><td>fs</td><td>sdf</td></tr><tr><td>sf</td><td>sdf</td><td><p>sf</p><p>asad</p><blockquote><p>&nbsp;</p></blockquote></td></tr></tbody></table></figure><p>&nbsp;</p><p>&nbsp;</p></li></ul>', '../view/assets/upload/userUpload72468503815125172658.jpg', '2024-01-25', 13),
(40, 'Et voluptatum repreh', '<p>This is the bulllet point where it is used the most</p><p><strong>adadas</strong></p><figure class=\"media\"><oembed url=\"https://www.youtube.com/watch?v=3Yzuoelmjn8\"></oembed></figure><p><i><strong>adadassd</strong></i></p><figure class=\"image\"><img style=\"aspect-ratio:715/536;\" src=\"../../../view/assets/upload/userUpload/123.png\" width=\"715\" height=\"536\"><figcaption>&nbsp;</figcaption></figure><figure class=\"table\"><table><tbody><tr><td><strong>TBHRE</strong></td><td><strong>afsa</strong></td><td><strong>afsa</strong></td><td>gag</td><td>agd</td><td>&nbsp;</td></tr><tr><td>afsaffa</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table></figure>', '../view/assets/upload/userUpload637920531374781234.png', '2024-01-26', 1),
(41, 'Qui sed veritatis et', '<figure class=\"image\"><img style=\"aspect-ratio:715/536;\" src=\"../../../view/assets/upload/userUpload/123.png\" width=\"715\" height=\"536\"></figure>', '../view/assets/upload/userUpload3822918218704123.png', '2024-01-26', 1),
(45, 'Enim in quo nulla si', '<figure class=\"image\"><img style=\"aspect-ratio:811/608;\" src=\"../../../view/assets/upload/userUpload/Screenshot 2021-05-07 101931.png\" width=\"811\" height=\"608\"></figure>', '../view/assets/upload/userUpload5430663725954Screenshot 2021-05-05 071107.png', '2024-01-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `blog_category_id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`blog_category_id`, `blog_id`, `category_id`) VALUES
(1, 35, 6),
(2, 36, 6),
(4, 38, 12),
(6, 40, 14),
(7, 41, 9),
(11, 45, 7);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(34) DEFAULT NULL,
  `category_parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_parent_id`) VALUES
(1, 'Science', NULL),
(2, 'Business', NULL),
(5, 'qrmwqrwq', NULL),
(6, 'rq', 1),
(7, 'Politics', NULL),
(8, 'World-Politics', 7),
(9, 'Us-Politics', 8),
(10, 'afafaf', NULL),
(12, 'News', NULL),
(13, 'World-News', 1),
(14, 'World-News', 12);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `commenter_name` varchar(29) NOT NULL,
  `comment_text` varchar(1000) NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  `comment_timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `blog_id`, `commenter_name`, `comment_text`, `parent_comment_id`, `comment_timestamp`) VALUES
(1, 38, 'Admin', 'jbbjbbnjn', NULL, '2024-01-26 13:57:21'),
(2, 35, 'Admin', 'affsafs', NULL, '2024-01-26 14:33:11'),
(3, 36, 'Admin', 'hbkjbkhih', NULL, '2024-01-26 16:07:40'),
(4, 40, 'Admin', 'Proident sint dolor\r\n', NULL, '2024-01-26 16:12:47'),
(5, 40, 'Admin', 'Reiciendis mollit eu', NULL, '2024-01-26 16:13:00'),
(6, 40, 'Admin', 'Dolorem repudiandae ', NULL, '2024-01-26 16:13:11'),
(7, 40, 'Admin', 'Minima est et sed re\r\n', NULL, '2024-01-26 16:13:16'),
(16, 41, 'Admin', 'Hello This is a comment', NULL, '2024-01-29 14:46:12'),
(17, 41, 'Admin', 'This is a reply', 16, '2024-01-29 14:46:20'),
(18, 41, 'Admin', 'This is new reply', 16, '2024-01-29 14:46:37'),
(19, 41, 'Admin', 'hlhjblhb', 16, '2024-01-29 15:11:06'),
(20, 40, 'Admin', 'sdfs', 4, '2024-01-29 16:27:41'),
(21, 30, 'Admin', 'This is comment', NULL, '2024-01-29 17:14:29'),
(22, 45, 'Admin', 'Hello this is new comment\r\n', NULL, '2024-01-30 11:45:18'),
(23, 45, 'Admin', 'This is the reply of the comment', 22, '2024-01-30 11:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(256) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1,
  `user_image` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `user_type`, `user_image`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$or0Kk1IC.ZqCKPpAuDJUMeBAZs0SXe3mJR4j.z4Vxuv4h/lW8wNSG', 1, NULL),
(6, 'Nripesh Parajuli', 'nripesh@gmail.com', '$2y$10$RLb5MV4r2UBAweUNRjRhQeq44GIsLxO2FpZ/8OzQYP0sRyy6hWvfq', 1, NULL),
(7, 'Joseph Burks', 'hocuropa@mailinator.com', '$2y$10$RLd573cpgtYTKtR/7qxuSuJsvFgc1djq9DHlCOiy6E1M5XiPFI3Lm', 1, '../view/assets/upload65802102083618Screenshot 2021-04-28 091010.png'),
(8, 'Fletcher Bartlett', 'vibitig@mailinator.com', '$2y$10$150WLJiMlqSD43Ojxg3.BeX2SnQxx1Rfr7h/oPt1RjjdQi2vXkK5q', 1, '../view/assets/upload8875137230073Screenshot 2021-05-06 092424.png'),
(9, 'Fletcher Bartlett', 'vibitig@mailinator.com', '$2y$10$SiuI7fOKcVrHrlfqjN4r/.OSbq3omAOR0QJ0ltgUyWcg1McP43gKi', 1, '../view/assets/upload1081635704286Screenshot 2021-05-06 092424.png'),
(10, 'Jesse Gonzalez', 'jygu@mailinator.com', '$2y$10$0Q376mGnx.eH9txqOYOwm.RDqYgsaNGl.At5DATOKOzDieG3KmZ0y', 1, '../view/assets/upload2012434545804123.png'),
(11, 'Jesse Gonzalez', 'jygu@mailinator.com', '$2y$10$GY/ssj9Y9LZypX41xBrJ8uElZYD/PEtMHEDdhmwWZmfHvA.1WIxOu', 1, '../view/assets/upload13191784754914123.png'),
(12, 'nripesh', 'nripesh123@gmail.com', '$2y$10$PTrq6rTYLqo4DELyi8gnT.JvBZiU0PYYU4qV2Y6t.mPjbJExmAKiu', 1, '../view/assets/upload8171446631824Screenshot 2024-01-04 110910.png'),
(13, 'Gil Carver', 'pyzesam@mailinator.com', '$2y$10$yDbwwG/BJ2VHYUmRIy8iDuc51pqmodJwH5EZIMY4kEJyqgMLff3hy', 1, '../view/assets/upload5698225146923Screenshot (664).png'),
(14, 'Nyssa Case', 'goxosiquc@mailinator.com', '$2y$10$atKjNsiL0nt/vp1iltmisuoPk8eayYyiqri7wcOJDrMCWKjeG87fS', 1, '../view/assets/upload467215207403215172658.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`blog_category_id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_parent_id` (`category_parent_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_ibfk_1` (`blog_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `blog_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD CONSTRAINT `blog_category_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`category_parent_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

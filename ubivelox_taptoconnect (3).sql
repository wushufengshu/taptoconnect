-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 03:36 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ubivelox_taptoconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `meeting_date` date NOT NULL,
  `meeting_name` text DEFAULT NULL,
  `time_from` time DEFAULT NULL,
  `time_to` time DEFAULT NULL,
  `organized_by` text DEFAULT NULL,
  `meeting_place` text DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `trashed` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `user_id`, `meeting_date`, `meeting_name`, `time_from`, `time_to`, `organized_by`, `meeting_place`, `created`, `created_by`, `modified`, `modified_by`, `trashed`, `deleted_by`) VALUES
(1, 1, '2022-04-06', 'Pa Meeting ni Mayor', '10:30:00', '12:30:00', 'Mr. ChouXXX', 'ManilaXXX', '2022-04-06 02:18:08', NULL, '2022-04-06 05:03:04', NULL, '2022-04-06 02:18:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `music_video`
--

CREATE TABLE `music_video` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `music_video_link` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `trashed` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `music_video`
--

INSERT INTO `music_video` (`id`, `user_id`, `music_video_link`, `created`, `created_by`, `modified`, `modified_by`, `trashed`, `deleted_by`) VALUES
(1, 1, 'www.spotify.com', '2022-04-06 02:58:24', NULL, '2022-04-06 02:58:24', NULL, '2022-04-06 02:58:24', NULL),
(2, 1, 'www.sayawancom', '2022-04-06 03:50:39', NULL, '2022-04-06 03:54:59', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_list`
--

CREATE TABLE `social_list` (
  `id` int(11) NOT NULL,
  `social_name` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_list`
--

INSERT INTO `social_list` (`id`, `social_name`, `image`) VALUES
(1, 'Facebook', 'facebook.png'),
(2, 'Twitter', 'twitter.png'),
(3, 'LinkedIn', 'linkedin.png'),
(4, 'Instagram', 'instagram.png'),
(5, 'Snapchat', 'snapchat.png'),
(6, 'TikTok', 'tiktok.png'),
(7, 'Pinterest', 'pinterest.png'),
(8, 'Reddit', 'reddit.png'),
(9, 'YouTube', 'youtube.png'),
(10, 'WhatsApp', 'whatsapp.png'),
(11, 'Tumblr', 'tumblr.png'),
(12, 'WeChat', 'wechat.png'),
(13, 'Viber', 'viber.png'),
(14, 'Kumu', 'kumu.png'),
(15, 'Bigo Live', 'bigo.png');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `social_list_id` int(11) NOT NULL,
  `social_link` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `trashed` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `user_id`, `social_list_id`, `social_link`, `created`, `created_by`, `modified`, `modified_by`, `trashed`, `deleted_by`) VALUES
(1, 1, 9, 'www.youtube.com', '2022-04-06 01:55:00', NULL, '2022-04-06 01:55:00', NULL, NULL, NULL),
(2, 1, 7, 'www.pinterest.com', '2022-04-06 02:05:33', NULL, '2022-04-07 02:49:43', NULL, '2022-04-06 02:05:33', NULL),
(3, 1, 2, 'www.twitter.com', '2022-04-06 02:05:33', NULL, '2022-04-06 02:05:33', NULL, '2022-04-06 02:05:33', NULL),
(4, 5, 6, 'www.tiktok.com/admin', '2022-04-06 04:29:13', NULL, '2022-04-06 04:33:39', NULL, NULL, NULL),
(5, 3, 1, 'www.facebook.com', '2022-04-07 02:29:13', NULL, '2022-04-07 02:29:13', NULL, NULL, NULL),
(6, 1, 13, 'www.viber.com', '2022-04-07 02:29:33', NULL, '2022-04-07 02:29:33', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `birth_date` date NOT NULL,
  `address` text DEFAULT NULL,
  `user_desc` text DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` varchar(50) NOT NULL,
  `website` text DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `pronouns` varchar(255) DEFAULT NULL,
  `activated` int(11) NOT NULL DEFAULT 0,
  `image` text DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `trashed` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `firstname`, `lastname`, `middlename`, `birth_date`, `address`, `user_desc`, `email`, `contactno`, `website`, `username`, `password`, `gender`, `pronouns`, `activated`, `image`, `created`, `created_by`, `modified`, `modified_by`, `trashed`, `deleted_by`) VALUES
(1, 1, 'Ed', 'Caluag', '', '2022-04-06', 'Calatagan, Batangas', 'Software engineers focus on applying the principles of engineering to software development. Their role includes analyzing and modifying existing software as well as designing, constructing and testing end-user applications that meet user needs — all through software programming languages.', 'ed@caluag.com', '09698758911', 'www.facebook.com/edcaluag', 'admin', '$2y$10$Nz9NMRyxpDUmhRAi8O8XgOb/aFQB9f1m4vcVCfUqOzx7lIUaDdvUG', NULL, NULL, 1, 'ed.jpg', '2022-04-05 03:59:06', NULL, '2022-04-06 06:58:12', NULL, NULL, NULL),
(2, 2, 'test', 'test', 'test', '2022-04-06', 'adasd', 'asds', 'admin@admin.admin', '2423423', 'www.asd.com', 'asd', 'asd', NULL, NULL, 0, '', '2022-04-05 08:18:10', NULL, '2022-04-06 07:00:44', NULL, NULL, NULL),
(3, 2, 'qwe', 'qwe', '', '0000-00-00', '', '', 'qwe@qwe.qwe', '123123', '', 'qwe', 'qwe', NULL, NULL, 0, NULL, '2022-04-05 08:53:19', NULL, '2022-04-05 08:53:19', NULL, NULL, NULL),
(4, 2, 'zxc', 'zxc', 'zxc', '0000-00-00', 'zxc', 'zxc', 'zxc@zxc.com', '123123', 'zxc.zxc.com', 'zxc', '$2y$10$5orAXWnvMOllt0pVoWnpouN0eHV2eCsDYBss1taKYiFRWBuBJ9S4m', NULL, NULL, 0, NULL, '2022-04-06 01:01:03', NULL, '2022-04-06 01:01:03', NULL, NULL, NULL),
(5, 1, 'Admin', 'Admin', 'Admin', '0000-00-00', 'batangas', 'yes sir!', 'admin@admin.com', '123123123', 'www.admin.com', 'admin1', '$2y$10$Nz9NMRyxpDUmhRAi8O8XgOb/aFQB9f1m4vcVCfUqOzx7lIUaDdvUG', NULL, NULL, 1, NULL, '2022-04-06 03:33:18', NULL, '2022-04-06 03:33:18', NULL, NULL, NULL),
(6, 1, 'aa', 'aa', 'aa', '2022-04-06', 'aa', 'aa', 'aa@aa.com', '11', 'aa', 'aa', '$2y$10$M5WnHJfoca.HHj1.RyDisuMvDuJR0PAbVgr2RY6NCDTiEqB3SC7Wa', NULL, NULL, 0, NULL, '2022-04-06 06:58:29', NULL, '2022-04-06 06:58:29', NULL, NULL, NULL),
(7, 1, 'rr', 'rr', 'rr', '2022-04-30', 'rr', 'rr', 'rr@rr.com', '2222', 'rr', 'rr', '$2y$10$wllBvaJO7u/VFurHsW2pSOGG4jlLjrQ1CsZQXfR6UYWQ8AQpzXScW', 'Female', 'She/Hers', 0, NULL, '2022-04-06 08:16:14', NULL, '2022-04-06 08:24:14', NULL, NULL, NULL),
(8, 1, 'gg', 'gg', 'gg', '2022-04-22', 'gg', 'gg', 'gg@gg.com', '3333333', 'gg', 'gg', '$2y$10$X44p.vlVGuUbAS.jF9JFRu/UZGcY6/p12UIeTeBNaS57L9TYwr.V2', 'Male', 'He/Him', 1, NULL, '2022-04-06 08:29:31', NULL, '2022-04-06 08:30:37', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role`, `created`, `modified`) VALUES
(1, 'administrator', '2022-04-06 06:46:02', '2022-04-06 06:46:11'),
(2, 'user', '2022-04-06 06:46:17', '2022-04-06 06:46:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `music_video`
--
ALTER TABLE `music_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_list`
--
ALTER TABLE `social_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `music_video`
--
ALTER TABLE `music_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `social_list`
--
ALTER TABLE `social_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

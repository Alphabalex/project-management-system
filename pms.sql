-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2021 at 09:21 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `model` enum('projects','tasks') NOT NULL,
  `model_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `model`, `model_id`, `user_id`, `comment`, `created`, `modified`) VALUES
(1, 'projects', 1, 1, 'You can take full advantage of elements by using requestAction(), which fetches view variables from a controller action and returns them as an array. This enables your elements to perform in true MVC style. Create a controller action that prepares the view variables for your elements, then call requestAction() inside the second parameter of element() to feed the element the view variables from your controller.\r\n\r\nTo do this, in your controller add something like the following for the Post example', '2021-08-02 03:12:10', '2021-08-02 05:24:12'),
(2, 'projects', 1, 1, 'lorem lorem lorem lorem', '2021-08-18 04:07:12', '2021-08-19 06:14:14'),
(3, 'projects', 2, 1, ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2021-08-02 12:50:29', '2021-08-02 12:50:29'),
(4, 'projects', 2, 1, 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software.', '2021-08-02 13:02:21', '2021-08-02 13:02:21'),
(5, 'tasks', 1, 1, ' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2021-08-02 06:15:22', '2021-08-03 13:32:26'),
(6, 'tasks', 2, 1, 'testing testing', '2021-08-02 13:22:29', '2021-08-02 13:22:29'),
(7, 'projects', 3, 1, 'lorem lorem lorem', '2021-08-03 14:08:55', '2021-08-03 14:08:55'),
(8, 'projects', 11, 1, 'i want Abdulmalik to finish', '2021-08-03 17:18:54', '2021-08-03 17:37:32'),
(9, 'projects', 11, 1, 'hello world', '2021-08-03 17:40:20', '2021-08-03 17:40:20'),
(12, 'projects', 11, 1, 'hello world', '2021-08-03 18:07:14', '2021-08-03 18:07:14'),
(13, 'tasks', 9, 1, 'test comment on test task', '2021-08-03 18:14:23', '2021-08-03 18:14:23'),
(14, 'projects', 12, 1, 'We are starting this project today', '2021-08-04 12:22:21', '2021-08-04 12:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `type_id`, `user_id`, `status`, `created`, `modified`) VALUES
(2, 'Majadtek Nigeria Company', '16 Gobi plaza, Ilepo Alhaji, Egbeda, Lagos Nigeria', 3, 1, 'active', '2021-07-26 15:57:58', '2021-07-26 15:57:58'),
(3, 'INITS', '16 Majaro street, onike yaba Lagos', 3, 6, 'active', '2021-07-26 16:09:15', '2021-07-26 16:09:15'),
(4, 'softek inc', 'Garki Abuja', 2, 6, 'active', '2021-07-26 16:10:00', '2021-07-26 16:10:00'),
(5, 'Kits Technologies', '12 Raji Ajanaku street Megida bustop Ipaja Ayobo', 3, 1, 'active', '2021-07-28 17:21:29', '2021-07-28 17:21:29'),
(8, 'test company', 'test', 2, 1, 'test', '2021-08-03 17:14:19', '2021-08-03 17:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `companies_users`
--

CREATE TABLE `companies_users` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies_users`
--

INSERT INTO `companies_users` (`id`, `company_id`, `user_id`, `role_id`, `created`, `modified`) VALUES
(4, 2, 3, 2, '2021-07-26 16:07:32', '2021-07-26 16:07:32'),
(5, 3, 7, 5, '2021-07-26 17:09:31', '2021-07-26 17:09:31'),
(6, 4, 1, 4, '2021-07-26 17:09:46', '2021-07-29 11:54:54'),
(7, 3, 1, 6, '2021-07-29 11:53:30', '2021-07-29 11:53:30'),
(8, 5, 4, 1, '2021-07-29 12:12:11', '2021-07-29 12:12:11'),
(12, 8, 4, 1, '2021-08-03 17:16:52', '2021-08-03 17:16:52'),
(13, 2, 4, 1, '2021-08-04 12:10:19', '2021-08-04 12:10:19'),
(14, 2, 6, 2, '2021-08-04 12:13:04', '2021-08-04 12:17:22'),
(15, 2, 7, 7, '2021-08-04 12:17:42', '2021-08-04 12:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `priority` int(3) NOT NULL,
  `status` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `due_date` date NOT NULL,
  `company_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `priority`, `status`, `start_date`, `due_date`, `company_id`, `created`, `modified`) VALUES
(3, 'flight Booking system', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', 1, 'active', '2021-06-26', '2021-09-26', 2, '2021-07-26 16:05:34', '2021-07-26 16:05:34'),
(4, 'INEC online voters registration', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', 1, 'active', '2021-06-26', '2021-10-30', 3, '2021-07-26 16:11:07', '2021-07-26 16:11:07'),
(5, 'FSI', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', 1, 'active', '2021-05-10', '2021-09-26', 4, '2021-07-26 16:12:13', '2021-07-26 16:12:13'),
(11, 'test project', 'test test test', 2, 'archived', '2021-08-03', '2021-08-03', 8, '2021-08-03 17:16:00', '2021-08-03 17:16:00'),
(12, 'Lagos state land use charge', 'Returns a set of numbers for the paged result set. Uses a modulus to decide how many numbers to show on each side of the current page By default 8 links on either side of the current page will be created if those pages exist. Links will not be generated for pages that do not exist. The current page is also not a link.', 2, 'active', '2021-08-04', '2021-09-04', 2, '2021-08-04 12:18:46', '2021-08-04 12:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created`, `modified`) VALUES
(1, 'Human Resource', '2021-07-26 15:50:52', '2021-07-26 15:50:52'),
(2, 'Vue developer', '2021-07-26 15:51:08', '2021-07-26 15:51:08'),
(3, 'React developer', '2021-07-26 15:51:33', '2021-07-26 15:51:33'),
(4, 'Laravel developer', '2021-07-26 15:51:54', '2021-07-26 15:51:54'),
(5, 'PHP developer', '2021-07-26 15:52:14', '2021-07-26 15:52:14'),
(6, 'cakePHP developer', '2021-07-26 15:52:34', '2021-07-26 15:52:34'),
(7, 'UI/UX developer', '2021-07-26 15:53:10', '2021-07-26 15:53:10'),
(8, 'QA', '2021-07-26 15:53:23', '2021-07-26 15:53:23'),
(9, 'project manager', '2021-07-26 15:53:43', '2021-07-26 15:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `priority` int(3) NOT NULL,
  `status` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `due_date` date NOT NULL,
  `project_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `priority`, `status`, `start_date`, `due_date`, `project_id`, `created`, `modified`) VALUES
(1, 'Frontend design', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', 1, 'active', '2021-07-26', '2021-07-30', 1, '2021-07-26 16:18:34', '2021-08-03 17:06:22'),
(2, 'payment integration', 'Section 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"v', 2, 'active', '2021-07-30', '2021-08-26', 2, '2021-07-26 16:37:40', '2021-07-29 13:10:26'),
(3, 'UI/UX', 'Section 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"', 1, 'active', '2021-07-26', '2021-08-26', 3, '2021-07-26 17:12:08', '2021-07-26 17:12:08'),
(4, 'Application testing updated again', 'Views are the V in MVC. Views are responsible for generating the specific output required for the request. Often this is in the form of HTML, XML, or JSON, but streaming files and creating PDFs that users can download are also responsibilities of the View Layer.\r\n\r\nCakePHP comes with a few built-in View classes for handling the most common rendering scenarios', 1, 'active', '2021-07-29', '2021-08-10', 1, '2021-07-29 13:13:19', '2021-08-02 14:20:21'),
(5, 'UI/UX', 'lorem test test test', 2, 'pending', '2021-08-02', '2021-08-15', 2, '2021-08-02 11:53:06', '2021-08-02 11:53:06'),
(6, 'test', 'test test test test', 3, 'archived', '2021-08-02', '2021-09-02', 2, '2021-08-02 11:58:03', '2021-08-02 11:58:03'),
(7, 'test updated', 'test updated', 5, 'pending', '2021-08-02', '2021-08-02', 1, '2021-08-02 14:41:53', '2021-08-03 17:04:43'),
(8, 'Admin dashboard', 'lorem lorem', 2, 'active', '2021-08-03', '2021-08-03', 3, '2021-08-03 14:15:24', '2021-08-03 14:15:24'),
(9, 'test task', 'test description', 2, 'pending', '2021-08-03', '2021-08-03', 11, '2021-08-03 17:18:15', '2021-08-03 17:18:15'),
(10, 'Frontend design', 'Returns a set of numbers for the paged result set. Uses a modulus to decide how many numbers to show on each side of the current page By default 8 links on either side of the current page will be created if those pages exist. Links will not be generated for pages that do not exist. The current page is also not a link.', 1, 'active', '2021-08-04', '2021-08-06', 12, '2021-08-04 12:24:15', '2021-08-04 12:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `tasks_users`
--

CREATE TABLE `tasks_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks_users`
--

INSERT INTO `tasks_users` (`id`, `user_id`, `task_id`) VALUES
(1, 2, 2),
(2, 3, 2),
(4, 2, 4),
(6, 3, 1),
(7, 5, 5),
(8, 2, 5),
(9, 4, 6),
(10, 3, 4),
(13, 2, 7),
(14, 5, 8),
(15, 2, 8),
(16, 3, 7),
(17, 2, 1),
(18, 4, 1),
(19, 5, 9),
(20, 2, 9),
(21, 3, 10),
(22, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type`, `created`, `modified`) VALUES
(1, 'CCTV', '2021-07-26 15:49:05', '2021-07-26 15:49:05'),
(2, 'software development ', '2021-07-26 15:49:30', '2021-07-26 15:49:30'),
(3, 'IT service provider', '2021-07-26 15:49:54', '2021-07-26 15:49:54'),
(4, 'Banking and finance', '2021-07-26 15:50:22', '2021-07-26 15:50:22'),
(5, 'Insurance', '2021-07-26 15:50:36', '2021-07-26 15:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `created`, `modified`) VALUES
(1, 'Balogun Abdulquddus', 'balex', '$2a$10$WcTLCITkHjk1ZV.7bIU9BeazpRHZe0lFb.gu3LVOkc9EBX6wPNuSC', '2021-07-26 15:48:33', '2021-07-26 15:48:33'),
(2, 'Abdulsalam Shakirah', 'divaspenzy', '$2a$10$23PY8E9LCRcFFArrIUXtPu40xpTQN6bfXBO8xTvgVS/WSndFxRgU2', '2021-07-26 15:54:01', '2021-07-26 15:54:01'),
(3, 'Tahir Hussayn', 'ustorG', '$2a$10$K4vKpKb.eyeE98VFMuG6o.NAueDJKvW23BICpzgZu46ESleHEHAnO', '2021-07-26 15:54:29', '2021-07-26 15:54:29'),
(4, 'Balogun Monsurah', 'balo', '$2a$10$jxOJ9HfjlVLRAzwDDw/FEe8TDThzAsvPTOPh3DJuirllFf7p.qh/i', '2021-07-26 15:54:56', '2021-07-26 15:54:56'),
(5, 'Abdulmaalik ibrahim', 'ibro', '$2a$10$uZr9gZFfege0kCECwwhlCORhcOBpCreMhVL3XZrgT8z/68yBcepwi', '2021-07-26 15:55:25', '2021-07-26 15:55:25'),
(6, 'Raji Rasheed', 'rajrash', '$2a$10$l2nBZJ.Vz3l/VGGcRRXXmezB4bLYvF2RB6kjJDsD7wvAq4sN1HZgG', '2021-07-26 15:56:00', '2021-07-26 15:56:00'),
(7, 'yusuf jamiu', 'jamo', '$2a$10$xnLKjvhOtolltKp0inUZu.EMeb0aIwDi5TDJwY/WzRLVndBP/Ei2C', '2021-07-26 17:08:23', '2021-07-26 17:08:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies_users`
--
ALTER TABLE `companies_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks_users`
--
ALTER TABLE `tasks_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `companies_users`
--
ALTER TABLE `companies_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tasks_users`
--
ALTER TABLE `tasks_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

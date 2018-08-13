-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2018 at 06:51 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `volunteer`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` varchar(10) NOT NULL,
  `max_no` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `category` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `e_name` varchar(40) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `registration_id` varchar(10) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT '0',
  `img` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `max_no`, `description`, `category`, `date`, `time`, `e_name`, `venue`, `registration_id`, `flag`, `img`) VALUES
('1', 20, 'Plant trees and get donuts.', 'Environment', '2018-05-10', '12:00:00', 'Give back', 'Dallas', '3', 1, 'plant tree'),
('200', 3, 'We care', 'animals', '2018-10-06', '12:00:00', 'We care for you', 'Dallas', '100', 0, 'animals'),
('26', 2, 'build animal houses', 'animals', '2018-09-07', '12:50:00', 'Build Houses', 'Texas', '1', 0, 'animals'),
('3', 1, 'Play and feed with dogs', 'Animals', '2018-08-05', '12:00:00', 'Fun time', 'Houston', '1', 0, 'dog'),
('30', 40, 'March ', 'Animals', '2017-07-08', '10:00:00', 'Cat Care', 'Dallas', '1', 0, 'cat'),
('4', 50, 'Road Clean up', 'Environment', '2018-08-05', '11:00:00', 'Adopt a highway', 'Dallas', '1', 1, 'road clean'),
('6', 20, 'Each one Teach one.', 'children and youth', '2018-09-05', '12:00:00', 'Educate', 'Irving', '2', 0, 'kids');

-- --------------------------------------------------------

--
-- Table structure for table `ngo`
--

CREATE TABLE `ngo` (
  `ngo_name` varchar(40) NOT NULL,
  `registration_id` varchar(10) NOT NULL,
  `city` varchar(30) NOT NULL,
  `description_ngo` varchar(200) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ngo`
--

INSERT INTO `ngo` (`ngo_name`, `registration_id`, `city`, `description_ngo`, `flag`) VALUES
('Animal Care Group', '1', 'Dallas', 'We care you pet', 0),
('Wecare', '100', 'Dallas', 'We work to help others.', 0),
('For kids', '2', 'Dallas', 'Help children', 0),
('Nature Care', '3', 'Dallas', 'Help Nature', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `email` varchar(50) NOT NULL,
  `event_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `cancel` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`email`, `event_id`, `date`, `cancel`) VALUES
('asokanagha@gmail.com', '1', '2018-04-19', 0),
('asokanagha@gmail.com', '200', '2018-04-19', 0),
('asokanagha@gmail.com', '3', '2018-04-19', 0),
('asokanagha@gmail.com', '4', '2018-04-19', 0),
('asokanagha@gmail.com', '6', '2018-04-19', 1),
('rajatkoti@gmail.com', '1', '2018-04-19', 0),
('rajatkoti@gmail.com', '3', '2018-04-19', 1),
('rajatkoti@gmail.com', '4', '2018-04-19', 1),
('rajatkoti@gmail.com', '6', '2018-04-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `userlevel` varchar(10) DEFAULT 'u'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `fname`, `lname`, `userlevel`) VALUES
('admin@admin.com', '22b7dec7305d63e2c769b0c9141114e69a194cc853b444c73b7be3a0771b628a', 'Admin', 'Admin', 'a'),
('asokanagha@gmail.com', '3ea04672c15956ffcf2fdc1145c47848266af2e5b43b1abcd3bce8bb7928441f', 'Anagha', 'Asok', 'u'),
('rajatkoti@gmail.com', '5dc2c6aa87aaed8406b78309e45b19c01dd90bec799f166efd007812f5c9927d', 'Rajat', 'Koti', 'u');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `email` varchar(50) NOT NULL,
  `event_id` varchar(10) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `ngo`
--
ALTER TABLE `ngo`
  ADD PRIMARY KEY (`registration_id`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`email`,`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`email`,`event_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

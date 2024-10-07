-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 07, 2024 at 01:40 PM
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
-- Database: `try_your_luck`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `img` text NOT NULL DEFAULT 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOMAAADeCAMAAAD4tEcNAAAAgVBMVEXu7u4AAABmZmbz8/Ojo6NhYWFqamrj4+OYmJjx8fHm5uZjY2NdXV13d3dycnLGxsaFhYV9fX2Li4tSUlLa2tqVlZUqKiqpqaltbW3MzMxZWVlISEixsbEjIyMvLy+CgoILCwsVFRW/v788PDywsLBDQ0MbGxv///89PT1NTU01NTV3vw3CAAAEOklEQVR4nO3cCXOaQBjGcV9czuVcFjlEQYxpk+//AbviEQ9M0olNXPr8xpmagBn/7vIO6XQ6mQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD8M9P7+OmM90zD4h7CR46cWtww+NeoH2A9dqMh7a+SxqM32u4Xf4Zrj79xgsYfh8ZPQuOP+5tGdzodPnU0ja5b1p0cbBlL47QsKt+vhDdw9kgaXemrezbDMIOBgyNpnAZ9omH4+XXOOBrVMu4SDV6MtjE6NBrVaBvLY6M5msar7/HDXhUjaXTt8uJNT5+qXaIvr0/XsdH1Ej+6eNeuU6lf+U2/G6jRsNGdBKbhX61kKYrQGbzR0a/R9VSimp+Xke72798G55N2jWqjmrsBerldb9Kt8Zio5svNSPd8PXVrfEs0+K2VdL3m7NZcr8Z+3Ly5Gjy7k7zAD08jtWrcj5uTyIGVdL2QGzw8eZlOjSfX4vHO7SpSfQ68/yXLPh7RqHEg0eCXg6dfxf5IcHyhPo1DiVeDZ7+K/RIfr0ltGi/GzfDgOUlU+YdIXRqvxs3Q4Dlu1EPk7rWaNA5v1IvBc7aKxm7wbF+sR+O7iYfBc7GK/ZE+UoPGydndzc2VvFrF/sD2mtSgUa3EzWvxsF5q8Awl9oNnqkHj9Pa4eeN3g4nblbS9h2/0Ptqo+5bhxO01Ka1Hb5TNZxLfwcOHX8dPbNQPPXrjrT04psZ7QOMPQyMatWk0zHswHrrRuY9Hbvwf/o0uAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD81+70P2w8sgkbvwmNHxrHAY3jsG8MVkTF6/Xhlyw4/bINv+Et3d2+MbKI3OM3y8OTmc27nOrjgVVJGto38k49zKjcPJcyFr+6VSkZRTKRRMvol5hLaVEuO4ooMr7njcU09/snm1n/R8LSdHdkYZ2fyRORV5kTCFYI0QixSRlfMkHqsXO4HkvqUvlilZ2vls2mjlMU2gsStqzaiOQzyaCmIIy679qtNTlVnCxZkjOTcaepySqtxlkLJxXJguLts5ecZQ45lObqM5kv1X7jYZ21NT2ZbZ69BsZ5Y23YNIlFEC1oqRrlK7GsI/OFNvI52m7ejsXUzqT8rkYzcERe5rRJfjNiNfmZyFbquknIkgG1ORUNdXEyr1dxu4pDYtQGMT2RP8ue1BdVnKvg88bUZdQJR8Sd2p+en3ShXJc095L6qfXWNRPlqwxLqyR7YDL9E7KwmjiIRSGyIGNUByzz8yZhTZixeZrHJmuyOJ7Xqelnjl9YMybCNFY7NHQCxsvQd9jmvJHU+q8SFc6bGaUJ+fGSTHUxNAVRyClMWvodp8Rpk35T41p98LP+QZXaW4uqXWwWKc3UY7FcHp6tZoxoPqdZS+sXWra0VO+val8rk+ZrumjU1urDM/Rv/BgaxwGN4/AH6s9mPGHx5tYAAAAASUVORK5CYII=',
  `price` int(11) UNSIGNED NOT NULL,
  `target` bigint(20) UNSIGNED NOT NULL,
  `sd` date NOT NULL DEFAULT current_timestamp(),
  `about` text NOT NULL,
  `is_end` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `img`, `price`, `target`, `sd`, `about`, `is_end`) VALUES
(16, 'School Bag', 'https://media.istockphoto.com/id/1886884898/photo/yellow-backpack-suspended-in-air-on-blue-background.webp?a=1&b=1&s=612x612&w=0&k=20&c=Q0cKwSQoQ28e17ty7-LN07OzH_Uprib0NpnZRtT33CA=', 500, 1, '2024-10-06', 'when 1 tickets sold then declare Winner', 1),
(17, 'Lunch BOx', 'https://media.istockphoto.com/id/1397286350/photo/top-view-of-a-lunch-box-on-color-background.webp?a=1&b=1&s=612x612&w=0&k=20&c=W7J79OMcL_8egd4JHxkd9h37JvcXP1GrkSZCrrs5NM0=', 20, 4, '2024-10-06', 'when 4 tickets sold then declare Winner', 0),
(18, 'Water Bottol', 'https://images.unsplash.com/photo-1530711654140-23ef9ad45094?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fHdhdGVyJTIwYm90dGxlfGVufDB8fDB8fHww', 9, 5, '2024-10-06', 'when 5 tickets sold then declare Winner', 0),
(19, 'Badminton Kit', 'https://images.unsplash.com/photo-1721760886982-3c643f05813d?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fGJhZG1pbnRvbiUyMGtpdHxlbnwwfHwwfHx8MA%3D%3D', 7, 10, '2024-10-06', 'when 10 tickets sold then declare Winner', 0),
(20, 'stationery items', 'https://media.istockphoto.com/id/1298288294/photo/various-stationery-arranged-in-order.jpg?s=1024x1024&w=is&k=20&c=aWqX_RYQyg5JYHTtdFyaLcmBTzPfQBHnd-i-J4Gz9VA=', 5, 11, '2024-10-06', 'when 11 tickets sold then declare Winner', 0),
(21, 'volleyball', 'https://media.istockphoto.com/id/618341990/photo/volleyball-ball-isolated-on-white-background.webp?a=1&b=1&s=612x612&w=0&k=20&c=UrWV10e1sReO8wi9qrV8zKW1NPzby0oFn9E0hMhZYSk=', 11, 5, '2024-10-06', 'when 5 tickets sold then declare Winner', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) UNSIGNED NOT NULL,
  `pay_id` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `item_id` int(11) UNSIGNED NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `pay_id`, `user_id`, `item_id`, `date`) VALUES
(16, 'pay_P5oF6UJTBknxFz', 32, 19, '2024-10-06 21:26:55'),
(17, 'pay_P5pYvMKikQf9TF', 32, 18, '2024-10-06 22:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `photo` text NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `password`, `email`, `dob`, `phone_no`, `photo`) VALUES
(27, 'minaxi', '774d34d9e117cabebc8bf570a9b786b9', 'minaxi@gmail.com', '2024-10-17', '', 'lofi-girl-5120x2880-14892.jpg'),
(28, 'ratnesh singh', 'e867c749580357a5da2b20967b2ee867', 'ratnesh@gmail.com', '2024-10-11', '', 'img173681481728193598.jpg'),
(29, 'amarjeet', 'ce89baf749a129e94727c43b98587264', 'amarjeet@gmail.com', '2024-10-12', '', 'img510034461728194854.png'),
(32, 'hiteshkumar', '80e2235fd9a018996178a07a6a3f4fff', 'hiteshchaudhary811818@gmail.com', '2024-10-22', '', 'img90951941728213957.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

CREATE TABLE `winners` (
  `id` int(10) UNSIGNED NOT NULL,
  `winner_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `lucky_no` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `winners`
--

INSERT INTO `winners` (`id`, `winner_id`, `item_id`, `lucky_no`, `date`) VALUES
(10, 27, 16, 15, '2024-10-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `winners`
--
ALTER TABLE `winners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

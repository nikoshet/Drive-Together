-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 14 Φεβ 2018 στις 22:21:01
-- Έκδοση διακομιστή: 5.7.20-0ubuntu0.16.04.1
-- Έκδοση PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `drive_together`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `admins`
--

CREATE TABLE `admins` (
  `username` varchar(40) DEFAULT NULL,
  `pass` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `admins`
--

INSERT INTO `admins` (`username`, `pass`) VALUES
('admin@admin.admin', 'admin');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `drivers`
--

CREATE TABLE `drivers` (
  `email` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `drivers`
--


-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `passengers`
--

CREATE TABLE `passengers` (
  `passenger_id` int(11) NOT NULL,
  `passenger_email` varchar(30) NOT NULL,
  `trip_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `passengers`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `driver_email` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Άδειασμα δεδομένων του πίνακα `rating`
--


-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `recommendedtripids`
--

CREATE TABLE `recommendedtripids` (
  `tripid1` bigint(20) DEFAULT NULL,
  `tripid2` bigint(20) DEFAULT NULL,
  `tripid3` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `recommendedtripids`
--

INSERT INTO `recommendedtripids` (`tripid1`, `tripid2`, `tripid3`) VALUES
(38, 35, 36);

-- --------------------------------------------------------
--
-- Δομή πίνακα για τον πίνακα `trips_proposed`
--

CREATE TABLE `trips_proposed` (
  `trip_id` int(11) NOT NULL,
  `driver_email` varchar(30) NOT NULL,
  `departure` varchar(100) NOT NULL,
  `arrival` varchar(100) NOT NULL,
  `datee` date NOT NULL,
  `timee` varchar(10) NOT NULL,
  `available_seats` int(11) NOT NULL,
  `value_per_seat` float NOT NULL,
  `info` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `trips_proposed`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user`
--

CREATE TABLE `user` (
  `email` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `password` char(64) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `age` int(11) NOT NULL,
  `salt` char(16) NOT NULL,
  `imagepath` char(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `user`
--

-- --------------------------------------------------------

-- Ευρετήρια για άχρηστους πίνακες
--


--
-- Ευρετήρια για πίνακα `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`email`);

--
-- Ευρετήρια για πίνακα `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`passenger_id`),
  ADD KEY `Passengers_fk0` (`passenger_email`),
  ADD KEY `Passengers_fk1` (`trip_id`);

--
-- Ευρετήρια για πίνακα `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `trips_proposed`
--
ALTER TABLE `trips_proposed`
  ADD PRIMARY KEY (`trip_id`);

--
-- Ευρετήρια για πίνακα `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);


--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `passengers`
--
ALTER TABLE `passengers`
  MODIFY `passenger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT για πίνακα `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT για πίνακα `trips_proposed`
--
ALTER TABLE `trips_proposed`
  MODIFY `trip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

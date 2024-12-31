-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2024 at 10:04 PM
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
-- Database: `drive_loc`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `id_agency` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`id_agency`, `name`, `city`) VALUES
(1, 'Elite Car Rentals', 'Casablanca'),
(2, 'Marrakech Motors', 'Marrakech'),
(3, 'Rabat Ride Solutions', 'Rabat'),
(4, 'Fes Auto Hub', 'Fes'),
(5, 'Tangier Travel Cars', 'Tangier'),
(6, 'Agadir Auto Rentals', 'Agadir'),
(7, 'Oujda Car Hire', 'Oujda'),
(8, 'Meknes Mobility', 'Meknes'),
(9, 'Essaouira Elite Cars', 'Essaouira'),
(10, 'Safi Vehicle Rentals', 'Safi'),
(11, 'Ifrane Luxury Motors', 'Ifrane'),
(12, 'Salé Speedy Rentals', 'Salé');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name`, `description`) VALUES
(1, 'Sedan', 'A passenger car with a separate trunk and seating for four or more.'),
(2, 'SUV', 'A sport utility vehicle with increased ground clearance and off-road capability.'),
(3, 'Hatchback', 'A car with a rear door that swings upward and a flexible cargo area.'),
(4, 'Convertible', 'A car with a retractable roof for open-air driving.'),
(5, 'Coupe', 'A two-door car often with a sporty design and style.'),
(6, 'Pickup Truck', 'A light-duty truck with an open cargo area in the back.'),
(7, 'Minivan', 'A family-oriented vehicle with multiple rows of seating and sliding doors.'),
(8, 'Electric Vehicle (EV)', 'A vehicle powered entirely by an electric motor and battery.'),
(9, 'Hybrid', 'A car with a combination of a fuel engine and an electric motor.'),
(10, 'Luxury', 'A premium car with high-end features and superior comfort.'),
(11, 'Diesel', 'Vehicles powered by diesel engines, known for fuel efficiency.'),
(12, 'Crossover', 'A mix between a passenger car and an SUV, often with unibody construction.');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_vehicule` int(11) DEFAULT NULL,
  `status` enum('pending','confirmed','canceled') DEFAULT 'pending',
  `start_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_date` date DEFAULT NULL,
  `pickup_address` varchar(250) DEFAULT NULL,
  `dropoff_adress` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `id_user`, `id_vehicule`, `status`, `start_date`, `end_date`, `pickup_address`, `dropoff_adress`) VALUES
(1, 1, 2, 'confirmed', '2023-12-31 23:00:00', '2024-01-07', 'Boulevard Mohammed V, Casablanca', 'Boulevard Zerktouni, Casablanca'),
(2, 2, 3, 'pending', '2024-01-02 23:00:00', '2024-01-10', 'Avenue Hassan II, Marrakech', 'Rue Yves Saint Laurent, Marrakech'),
(3, 3, 5, 'canceled', '2024-01-04 23:00:00', '2024-01-08', 'Avenue Al Massira, Rabat', 'Rue Mohammed Ben Abdellah, Rabat'),
(4, 4, 7, 'confirmed', '2024-01-09 23:00:00', '2024-01-15', 'Rue Mohammed El Yazidi, Fes', 'Boulevard Allal El Fassi, Fes'),
(5, 5, 9, 'pending', '2024-01-11 23:00:00', '2024-01-18', 'Place Moulay Hassan, Essaouira', 'Rue Chbanat, Essaouira'),
(6, 6, 11, 'confirmed', '2024-01-14 23:00:00', '2024-01-20', 'Avenue Laayoune, Agadir', 'Boulevard Mohammed V, Agadir'),
(7, 7, 4, 'canceled', '2024-01-17 23:00:00', '2024-01-22', 'Rue Moulay Idriss, Tangier', 'Boulevard Pasteur, Tangier'),
(8, 8, 6, 'confirmed', '2024-01-19 23:00:00', '2024-01-25', 'Avenue Annakhil, Salé', 'Rue Tazi, Salé'),
(9, 9, 8, 'pending', '2024-01-21 23:00:00', '2024-01-28', 'Avenue Mohammed V, Meknes', 'Rue Dar Smen, Meknes'),
(10, 10, 10, 'confirmed', '2024-01-24 23:00:00', '2024-01-30', 'Rue El Khattabi, Oujda', 'Boulevard Mohammed VI, Oujda'),
(11, 11, 1, 'canceled', '2024-01-27 23:00:00', '2024-02-02', 'Rue Tafilalet, Safi', 'Boulevard Mohammed V, Safi'),
(12, 12, 12, 'confirmed', '2024-01-29 23:00:00', '2024-02-05', 'Rue Taddart, Ifrane', 'Boulevard Al Akhawayn, Ifrane');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_vehicule` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` >= 1 and `rating` <= 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `id_user`, `id_vehicule`, `rating`) VALUES
(1, 1, 2, 4),
(2, 2, 3, 3),
(3, 3, 5, 5),
(4, 4, 7, 2),
(5, 5, 9, 4),
(6, 6, 11, 3),
(7, 7, 4, 5),
(8, 8, 6, 2),
(9, 9, 8, 4),
(10, 10, 10, 3),
(11, 11, 12, 5),
(12, 12, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` enum('admin','client') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'client');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` enum('admin','client') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `password`, `role`) VALUES
(1, 'John Doe', 'john.doe@example.com', 'password123', 'client'),
(2, 'Jane Smith', 'jane.smith@example.com', 'password123', 'client'),
(3, 'Alice Johnson', 'alice.johnson@example.com', 'password123', 'client'),
(4, 'Robert Brown', 'robert.brown@example.com', 'password123', 'client'),
(5, 'Emily Davis', 'emily.davis@example.com', 'password123', 'client'),
(6, 'Michael Wilson', 'michael.wilson@example.com', 'password123', 'client'),
(7, 'Linda Martinez', 'linda.martinez@example.com', 'password123', 'client'),
(8, 'David Garcia', 'david.garcia@example.com', 'password123', 'client'),
(9, 'Sarah Taylor', 'sarah.taylor@example.com', 'password123', 'client'),
(10, 'Daniel Moore', 'daniel.moore@example.com', 'password123', 'client'),
(11, 'Jessica Lee', 'jessica.lee@example.com', 'password123', 'client'),
(12, 'Chris White', 'chris.white@example.com', 'password123', 'client');

-- --------------------------------------------------------

--
-- Table structure for table `vehicule`
--

CREATE TABLE `vehicule` (
  `id_vehicule` int(11) NOT NULL,
  `model` varchar(250) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `availability` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicule`
--

INSERT INTO `vehicule` (`id_vehicule`, `model`, `id_category`, `price`, `availability`) VALUES
(1, 'Toyota Corolla', 1, 15000, 1),
(2, 'Honda Civic', 1, 16000, 1),
(3, 'Ford Explorer', 2, 30000, 1),
(4, 'Jeep Grand Cherokee', 2, 35000, 1),
(5, 'Volkswagen Golf', 3, 18000, 1),
(6, 'Ford Mustang', 5, 40000, 1),
(7, 'Mazda MX-5 Miata', 4, 35000, 0),
(8, 'Ram 1500', 6, 45000, 1),
(9, 'Toyota Sienna', 7, 32000, 1),
(10, 'Tesla Model S', 8, 80000, 1),
(11, 'Toyota Prius', 9, 25000, 1),
(12, 'BMW X1', 12, 42000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`id_agency`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_vehicule` (`id_vehicule`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_vehicule` (`id_vehicule`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id_vehicule`),
  ADD KEY `id_category` (`id_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agency`
--
ALTER TABLE `agency`
  MODIFY `id_agency` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id_vehicule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id_vehicule`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id_vehicule`);

--
-- Constraints for table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `vehicule_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

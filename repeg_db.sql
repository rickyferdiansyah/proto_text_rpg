-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 25, 2023 at 09:48 AM
-- Server version: 8.0.34-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repeg_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `player_tb`
--

CREATE TABLE `player_tb` (
  `id` int NOT NULL,
  `exp` int NOT NULL,
  `level` int NOT NULL,
  `normal_attack` enum('true','false') COLLATE utf8mb4_general_ci NOT NULL,
  `shadow_step` enum('true','false') COLLATE utf8mb4_general_ci NOT NULL,
  `fireball` enum('true','false') COLLATE utf8mb4_general_ci NOT NULL,
  `thunderbolt` enum('true','false') COLLATE utf8mb4_general_ci NOT NULL,
  `meteor_shower` enum('true','false') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `player_tb`
--

INSERT INTO `player_tb` (`id`, `exp`, `level`, `normal_attack`, `shadow_step`, `fireball`, `thunderbolt`, `meteor_shower`) VALUES
(1, 100, 2, 'true', 'true', 'false', 'false', 'false');

--
-- Triggers `player_tb`
--
DELIMITER $$
CREATE TRIGGER `Trigger_Update_Player` BEFORE UPDATE ON `player_tb` FOR EACH ROW BEGIN
    SET NEW.level = 
        CASE
            WHEN NEW.exp >= 2500 THEN 7
            WHEN NEW.exp >= 1500 AND NEW.exp < 2500 THEN 6
            WHEN NEW.exp >= 1000 AND NEW.exp < 1500 THEN 5
            WHEN NEW.exp >= 600 AND NEW.exp < 1000 THEN 4
            WHEN NEW.exp >= 300 AND NEW.exp < 600 THEN 3
            WHEN NEW.exp >= 100 AND NEW.exp < 300 THEN 2
            WHEN NEW.exp <100 THEN 1
        END;
		
        IF NEW.exp >= 1500 THEN
        	SET NEW.meteor_shower = "true";
        ELSEIF NEW.exp >= 1000 THEN
        	SET NEW.thunderbolt = "true";
        ELSEIF NEW.exp >= 600 THEN
        	SET NEW.fireball = "true";
        ELSEIF NEW.exp >= 100 THEN
        	SET NEW.shadow_step = "true";    
        ELSE 
        	SET NEW.shadow_step = "false";
            SET NEW.fireball = "false";
            SET NEW.thunderbolt = "false";
            SET NEW.meteor_shower = "false";
		END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `player_tb`
--
ALTER TABLE `player_tb`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for todo-list
CREATE DATABASE IF NOT EXISTS `todo-list` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `todo-list`;

-- Dumping structure for table todo-list.works
CREATE TABLE IF NOT EXISTS `works` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `status` enum('Planning','Doing','Complete') NOT NULL DEFAULT 'Planning',
  `last_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

-- Dumping data for table todo-list.works: ~4 rows (approximately)
DELETE FROM `works`;
/*!40000 ALTER TABLE `works` DISABLE KEYS */;
INSERT INTO `works` (`id`, `name`, `starting_date`, `ending_date`, `status`, `last_updated`) VALUES
	(1, 'Sunday Cyclinghere', '2020-03-28', '2020-03-30', 'Doing', '2020-03-27 22:04:30'),
	(12, 'Running after work', '2020-03-26', '2020-03-29', 'Planning', '2020-03-27 20:30:09'),
	(27, 'Good days start here', '2020-03-20', '2020-03-20', 'Planning', '2020-03-27 20:30:03'),
	(38, 'Sparring with Thinh', '2020-03-18', '2020-03-18', 'Complete', '2020-03-27 12:58:31');
/*!40000 ALTER TABLE `works` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

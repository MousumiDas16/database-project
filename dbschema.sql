-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.12 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for carshop
DROP DATABASE IF EXISTS `carshop`;
CREATE DATABASE IF NOT EXISTS `carshop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `carshop`;

-- Dumping structure for table carshop.account_managers
DROP TABLE IF EXISTS `account_managers`;
CREATE TABLE IF NOT EXISTS `account_managers` (
  `employee_ID` int(11) NOT NULL,
  `salary` double NOT NULL,
  `license_number` varchar(50) NOT NULL,
  PRIMARY KEY (`employee_ID`),
  CONSTRAINT `FK1_am_employees` FOREIGN KEY (`employee_ID`) REFERENCES `employees` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table carshop.account_managers: ~1 rows (approximately)
/*!40000 ALTER TABLE `account_managers` DISABLE KEYS */;
INSERT INTO `account_managers` (`employee_ID`, `salary`, `license_number`) VALUES
	(4, 74987, '2176671497813');
/*!40000 ALTER TABLE `account_managers` ENABLE KEYS */;

-- Dumping structure for table carshop.cars
DROP TABLE IF EXISTS `cars`;
CREATE TABLE IF NOT EXISTS `cars` (
  `car_ID` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_manager_ID` int(11) NOT NULL,
  `car_make` varchar(50) NOT NULL,
  `car_model` varchar(50) NOT NULL,
  `car_year` int(11) NOT NULL,
  `car_trim` varchar(50) NOT NULL,
  `car_price` double NOT NULL,
  `car_mileage` int(11) NOT NULL,
  `car_engine` varchar(50) NOT NULL,
  `car_transmission` varchar(50) NOT NULL DEFAULT 'Automatic',
  `car_color` varchar(50) DEFAULT 'White',
  `car_body_type` varchar(50) DEFAULT NULL,
  `car_condition` varchar(50) DEFAULT 'Average',
  `car_description` text NOT NULL,
  `VIN` varchar(50) DEFAULT NULL,
  `car_status` tinyint(1) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`car_ID`),
  UNIQUE KEY `car_ID` (`car_ID`),
  KEY `cars_fk_1` (`inventory_manager_ID`),
  CONSTRAINT `cars_fk_1` FOREIGN KEY (`inventory_manager_ID`) REFERENCES `inventory_managers` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table carshop.cars: ~0 rows (approximately)
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` (`car_ID`, `inventory_manager_ID`, `car_make`, `car_model`, `car_year`, `car_trim`, `car_price`, `car_mileage`, `car_engine`, `car_transmission`, `car_color`, `car_body_type`, `car_condition`, `car_description`, `VIN`, `car_status`, `date_added`) VALUES
	(1, 3, 'Chevrolet', 'Malibu', 2010, 'LS', 16789, 96782, '1.5L 4 Cylinder', 'Automatic', 'White', 'Sedan', 'Good', 'coming soon', '1G6KY5294VU856219', 1, '2018-07-19'),
	(2, 3, 'Cadillac', 'Mazda3', 2020, 'Premium', 20189, 40987, '2.5L 4 Cylinder', 'Automatic', 'Grey', 'Sedan', 'Like New', 'coming soon', '1FTFW1EF0EFB39089', 1, '2021-08-09'),
	(3, 3, 'Honda', 'Accord', 2016, 'Sport', 23897, 23987, '1.5L 4 Cylinder', 'Manual', 'Blue', 'Sedan', 'Average', 'coming soon', 'JN1CA21A3WM895534', 1, '2021-04-18'),
	(5, 3, 'Jeep', 'Cherokee', 2021, 'Trailhawk', 28852, 50327, '3.2L 6 Cylinder', 'Automatic', 'White', 'SUV', 'Average', 'coming soon', 'WDDGF54X59F288227', 1, '2017-09-22'),
	(6, 3, 'Acura', '500', 2020, 'Abarth', 17854, 30728, '1.4L 4 Cylinder', 'Manual', 'Black', 'Sedan', 'Like New', 'coming soon', 'JM1BK32F781119739', 1, '2020-12-26'),
	(11, 1, 'Chrysler', '500', 2021, 'SEX', 39999, 1500, '3.5 Litre', 'Manual', 'White', 'Sedan', 'Poor', 'Absolutely gorgeous', 'JH4DC445X1S045036', 1, '2021-12-12');
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;

-- Dumping structure for table carshop.customers
DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_ID` int(11) NOT NULL AUTO_INCREMENT,
  `customer_first_name` varchar(50) NOT NULL,
  `customer_last_name` varchar(50) NOT NULL,
  `customer_street` varchar(50) NOT NULL,
  `customer_city` varchar(50) NOT NULL,
  `customer_state` varchar(50) NOT NULL,
  `customer_zip_code` int(11) NOT NULL,
  `customer_phone_number` varchar(11) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `customer_DOB` date NOT NULL,
  PRIMARY KEY (`customer_ID`),
  UNIQUE KEY `customer_ID` (`customer_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table carshop.customers: ~5 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`customer_ID`, `customer_first_name`, `customer_last_name`, `customer_street`, `customer_city`, `customer_state`, `customer_zip_code`, `customer_phone_number`, `customer_email`, `customer_username`, `customer_DOB`) VALUES
	(1, 'Jerry', 'Springer', '1234 First Street', 'Austin', 'Texas', 23409, '2349230572', 'jerryspringer@gmail.com', 'jspringer', '1982-10-31'),
	(2, 'Zach', 'Smith', '2305 Second Street', 'New Orleans', 'Louisiana', 22352, '8820381832', 'zachsmith@gmail.com', 'zsmith', '1995-04-04'),
	(3, 'Bill', 'Howard', '93453 Third Street', 'New York', 'New York', 19341, '8239292753', 'billhoward@gmail.com', 'bhoward', '1974-06-18'),
	(4, 'Janice', 'Wills', '8491 Fourth Street', 'Detroit', 'Michigan', 39130, '8302840293', 'janicewills@gmail.com', 'jwills', '2000-05-22'),
	(5, 'Tina', 'Fey', '8428 Fifth Street', 'Los Angeles', 'California', 39023, '4637582057', 'tinafey@gmail.com', 'tfey', '1976-12-13');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for table carshop.dealership
DROP TABLE IF EXISTS `dealership`;
CREATE TABLE IF NOT EXISTS `dealership` (
  `dealership_id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`dealership_id`),
  UNIQUE KEY `dealership_id` (`dealership_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table carshop.dealership: ~1 rows (approximately)
/*!40000 ALTER TABLE `dealership` DISABLE KEYS */;
INSERT INTO `dealership` (`dealership_id`, `owner_id`, `street`, `city`, `state`, `zip_code`, `country`, `name`) VALUES
	(1, 1, '3298 Seventh Street', 'Green Bay', 'Wisconsin', 23590, 'USA', '');
/*!40000 ALTER TABLE `dealership` ENABLE KEYS */;

-- Dumping structure for table carshop.employees
DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `employee_ID` int(11) NOT NULL AUTO_INCREMENT,
  `role_ID` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `SSN` varchar(10) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `start_date` date NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`employee_ID`),
  UNIQUE KEY `employee_ID` (`employee_ID`),
  KEY `employees_fk_1` (`role_ID`),
  CONSTRAINT `employees_fk_1` FOREIGN KEY (`role_ID`) REFERENCES `roles` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table carshop.employees: ~0 rows (approximately)
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` (`employee_ID`, `role_ID`, `first_name`, `last_name`, `SSN`, `street`, `city`, `state`, `zip_code`, `phone_number`, `email`, `username`, `DOB`, `start_date`, `password`) VALUES
	(1, 1, 'Bill', 'Burr', '238302237', '2305 Forest Drive', 'St. Louis', 'Missouri', 23529, '1340329573', 'billburr@gmail.com', 'billburr', '1987-01-15', '2003-03-14', '12345'),
	(2, 1, 'James', 'Foley', '342918572', '2309 Beach Lane', 'Houston', 'Texas', 45555, '1395230295', 'jamesfoley@gmail.com', 'jamesfoley', '1996-08-30', '2010-05-01', '78989'),
	(3, 1, 'William', 'DaFoe', '427459238', '73228 Water Street', 'Miami', 'Florida', 32520, '1249102492', 'willdafoe@gmail.com', 'williamdafoe', '1987-03-14', '2017-08-08', 'babui'),
	(4, 3, 'Jim', 'Halpert', '203952210', '3982 West Street', 'Scranton', 'Pennsylvania', 23902, '493205832', 'halpertjim@gmail.com', 'jimhalpert', '1986-11-09', '2008-10-18', 'Th3Off1ce'),
	(6, 2, 'Mousumi', 'Bosu', '456568987', '656 Bill Blvd', 'Tory', 'Ohio', 47899, '4565665899', 'mousumidas@oakland.edu', 'mousumidas', '1989-12-03', '2021-12-23', '12456'),
	(7, 1, 'Aanvik', 'Bosu', '457896668', '45 Latic Bvld', 'Canton', 'MI', 45888, '205-886-7323', 'aanvik@gmail.com', 'aanvik', '1986-12-18', '2021-12-17', '2345');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;

-- Dumping structure for table carshop.inventory_managers
DROP TABLE IF EXISTS `inventory_managers`;
CREATE TABLE IF NOT EXISTS `inventory_managers` (
  `employee_ID` int(11) NOT NULL,
  `commission_percentage` double NOT NULL,
  `license_number` varchar(50) NOT NULL,
  PRIMARY KEY (`employee_ID`),
  CONSTRAINT `FK1_im_employees` FOREIGN KEY (`employee_ID`) REFERENCES `employees` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table carshop.inventory_managers: ~1 rows (approximately)
/*!40000 ALTER TABLE `inventory_managers` DISABLE KEYS */;
INSERT INTO `inventory_managers` (`employee_ID`, `commission_percentage`, `license_number`) VALUES
	(1, 10, '42131041300234540'),
	(3, 16.65, '90787345790134590');
/*!40000 ALTER TABLE `inventory_managers` ENABLE KEYS */;

-- Dumping structure for table carshop.order_status
DROP TABLE IF EXISTS `order_status`;
CREATE TABLE IF NOT EXISTS `order_status` (
  `order_status_ID` int(11) NOT NULL AUTO_INCREMENT,
  `sales_order_ID` int(11) NOT NULL,
  `description` varchar(500) NOT NULL DEFAULT 'Incomplete',
  `last_updated` date NOT NULL,
  PRIMARY KEY (`order_status_ID`),
  UNIQUE KEY `order_status_ID` (`order_status_ID`),
  KEY `FK1_os_so` (`sales_order_ID`),
  CONSTRAINT `FK1_os_so` FOREIGN KEY (`sales_order_ID`) REFERENCES `sales_orders` (`sales_order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table carshop.order_status: ~2 rows (approximately)
/*!40000 ALTER TABLE `order_status` DISABLE KEYS */;
INSERT INTO `order_status` (`order_status_ID`, `sales_order_ID`, `description`, `last_updated`) VALUES
	(1, 1, '2016 Chevrolet Malibu LS, $16789, 96782 miles, good condition. Customer picked up from the delearship.', '2019-04-17'),
	(2, 2, '2020 Mazda3 Premium, $20189, 40987 miles, great condition. We are waiting for the car to arrive from factory.', '2021-09-10');
/*!40000 ALTER TABLE `order_status` ENABLE KEYS */;

-- Dumping structure for table carshop.permissions
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `permission_ID` int(11) NOT NULL,
  `permission_name` varchar(50) NOT NULL,
  `permission_description` varchar(500) NOT NULL,
  PRIMARY KEY (`permission_ID`),
  UNIQUE KEY `permission_ID` (`permission_ID`),
  UNIQUE KEY `permission_name` (`permission_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table carshop.permissions: ~6 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`permission_ID`, `permission_name`, `permission_description`) VALUES
	(1, 'adjust_inventory', 'Allows user to edit car inventory.'),
	(2, 'adjust_accounts', 'Allows user to edit accounts.'),
	(3, 'add_inventory', 'Allows user to add cars to inventory.'),
	(4, 'delete_inventory', 'Allows user to delete cars from inventory.'),
	(5, 'add_accounts', 'Allows user to add accounts.'),
	(6, 'delete_accounts', 'Allows user to delete accounts.');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table carshop.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_ID` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_description` varchar(500) NOT NULL,
  PRIMARY KEY (`role_ID`),
  UNIQUE KEY `role_ID` (`role_ID`),
  UNIQUE KEY `role_name` (`role_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table carshop.roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`role_ID`, `role_name`, `role_description`) VALUES
	(1, 'Sales Representative', 'Sells the cars'),
	(2, 'Inventory Manager', 'Manages the inventory of cars'),
	(3, 'Account Manager', 'Manages customer accounts');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table carshop.role_permissions
DROP TABLE IF EXISTS `role_permissions`;
CREATE TABLE IF NOT EXISTS `role_permissions` (
  `permission_ID` int(11) NOT NULL,
  `role_ID` int(11) NOT NULL,
  PRIMARY KEY (`permission_ID`,`role_ID`),
  KEY `role_permission_fk_2` (`role_ID`),
  CONSTRAINT `role_permission_fk_1` FOREIGN KEY (`permission_ID`) REFERENCES `permissions` (`permission_id`),
  CONSTRAINT `role_permission_fk_2` FOREIGN KEY (`role_ID`) REFERENCES `roles` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table carshop.role_permissions: ~7 rows (approximately)
/*!40000 ALTER TABLE `role_permissions` DISABLE KEYS */;
INSERT INTO `role_permissions` (`permission_ID`, `role_ID`) VALUES
	(1, 1),
	(1, 2),
	(3, 2),
	(4, 2),
	(2, 3),
	(5, 3),
	(6, 3);
/*!40000 ALTER TABLE `role_permissions` ENABLE KEYS */;

-- Dumping structure for table carshop.sales_orders
DROP TABLE IF EXISTS `sales_orders`;
CREATE TABLE IF NOT EXISTS `sales_orders` (
  `sales_order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `customer_ID` int(11) NOT NULL,
  `car_ID` int(11) NOT NULL,
  `employee_ID` int(11) NOT NULL,
  `date_sold` date NOT NULL,
  `price_sold` double NOT NULL,
  PRIMARY KEY (`sales_order_ID`),
  UNIQUE KEY `sales_order_ID` (`sales_order_ID`),
  KEY `FK1_sales_order_customer` (`customer_ID`),
  KEY `FK2_sales_order_cars` (`car_ID`),
  KEY `FK3_sales_order_employee` (`employee_ID`),
  CONSTRAINT `FK1_sales_order_customer` FOREIGN KEY (`customer_ID`) REFERENCES `customers` (`customer_id`),
  CONSTRAINT `FK2_sales_order_cars` FOREIGN KEY (`car_ID`) REFERENCES `cars` (`car_id`),
  CONSTRAINT `FK3_sales_order_employee` FOREIGN KEY (`employee_ID`) REFERENCES `employees` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table carshop.sales_orders: ~0 rows (approximately)
/*!40000 ALTER TABLE `sales_orders` DISABLE KEYS */;
INSERT INTO `sales_orders` (`sales_order_ID`, `customer_ID`, `car_ID`, `employee_ID`, `date_sold`, `price_sold`) VALUES
	(1, 1, 1, 1, '2021-04-16', 16789),
	(2, 4, 2, 2, '2021-09-09', 20189);
/*!40000 ALTER TABLE `sales_orders` ENABLE KEYS */;

-- Dumping structure for table carshop.sales_representatives
DROP TABLE IF EXISTS `sales_representatives`;
CREATE TABLE IF NOT EXISTS `sales_representatives` (
  `employee_ID` int(11) NOT NULL,
  `commission_percentage` double NOT NULL,
  `license_number` varchar(50) NOT NULL,
  PRIMARY KEY (`employee_ID`),
  CONSTRAINT `FK1_sr_employees` FOREIGN KEY (`employee_ID`) REFERENCES `employees` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table carshop.sales_representatives: ~2 rows (approximately)
/*!40000 ALTER TABLE `sales_representatives` DISABLE KEYS */;
INSERT INTO `sales_representatives` (`employee_ID`, `commission_percentage`, `license_number`) VALUES
	(1, 15.87, '9801275098125124'),
	(2, 13.79, '9183465098127123');
/*!40000 ALTER TABLE `sales_representatives` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: stock
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `ttcode` varchar(11) NOT NULL,
  `cnic` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `emp_pic` varchar(100) NOT NULL,
  `job_role` varchar(20) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `doj` date NOT NULL,
  `edu` varchar(100) NOT NULL,
  `location` varchar(30) NOT NULL,
  `project` varchar(30) NOT NULL,
  `experience` varchar(1000) NOT NULL,
  PRIMARY KEY (`ttcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES ('0001','12101-475452-1','Atif','atif@email.com','0333-1234567','password','c.jpg','Employee','Salesman','2018-04-10','Engineering','Riyadh','Frozen Food','5 Years'),('0002','13503-86155761-5','Naveed','naveed@email.com','0300-1234567','p@ssword','download.jpg','Admin','Owner','2018-01-01','MS(Project Mgmt)','Jeddah','All','5 Years'),('0003','1350397523010','tufail shah','fghjkl@jj.mm','09956','pass','image.png','Employee','Salesman','2020-04-16','education','location','furniture','25411 hjj yui');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory` (
  `inv_ID` int(10) NOT NULL AUTO_INCREMENT,
  `item_ID` int(10) NOT NULL,
  `weight` float(5,2) NOT NULL,
  `comments` text NOT NULL,
  `quantity` int(10) NOT NULL,
  `supp_ID` int(10) NOT NULL,
  `purchase_order` int(11) NOT NULL,
  `shipped_date` text NOT NULL,
  `price` int(10) NOT NULL,
  `cashcredit` varchar(7) NOT NULL,
  `shop_returned` int(10) NOT NULL,
  `veh_returned` int(10) NOT NULL,
  PRIMARY KEY (`inv_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (2,5,15.00,'Got from supplier 2',50,2,2,'29/04/2020',200,'Credit',0,0),(4,4,20.00,'mn',60,1,1,'30/04/2020',300,'',0,0),(17,1,0.00,'test',0,1,4,'12/05/2020',0,'Cash',0,0),(18,5,2.00,'test',2,1,4,'12/05/2020',2,'Credit',0,0),(19,1,-2.00,'test1',3,1,5,'12/05/2020',500,'Credit',0,0),(21,4,0.00,'Received form supplier new',0,1,6,'15/05/2020',0,'Credit',0,0),(22,5,12.00,'Received form supplier new',2,1,6,'15/05/2020',400,'Credit',0,0),(23,6,5.00,'testing',1,2,7,'15/05/2020',250,'Credit',0,0),(31,6,30.00,'not now',30,0,0,'16/05/2020',330,'Credit',0,1),(32,5,5.00,'not now',5,0,0,'16/05/2020',100,'Cash',1,0),(33,1,7.00,'latest',2,1,8,'22/06/2020',20,'Cash',0,0),(34,8,2.00,'latest',10,1,8,'22/06/2020',4,'Cash',0,0),(35,4,10.00,'quantity check',5,1,9,'05/07/2020',100,'Cash',0,0),(36,4,50.00,'quantity 2',50,20,10,'05/07/2020',500,'Credit',0,0),(37,4,10.00,'ceck',10,1,10,'05/07/2020',10,'Cash',0,0),(38,8,50.00,'ceck',50,1,10,'05/07/2020',50,'Cash',0,0),(39,4,1.00,'test',1,1,11,'05/07/2020',1,'Cash',0,0),(40,8,1.00,'test',1,1,11,'05/07/2020',1,'Cash',0,0),(41,4,2.00,'test',2,1,12,'05/07/2020',2,'Cash',0,0),(42,8,2.00,'test',2,1,12,'05/07/2020',2,'Cash',0,0),(43,4,3.00,'test',3,1,13,'05/07/2020',3,'Cash',0,0),(44,4,4.00,'test',4,1,14,'05/07/2020',4,'Cash',0,0),(45,4,5.00,'no comments',5,1,15,'05/07/2020',5,'Cash',0,0),(46,4,1.00,'test 2 quantity',1,2,16,'05/07/2020',1,'Cash',0,0),(47,8,1.00,'test 2 quantity',1,2,16,'05/07/2020',1,'Cash',0,0),(48,4,0.00,'NA',0,0,0,'11/07/2020',0,'Cash',0,0),(49,1,100.00,'Test',40,1,17,'14/07/2020',8000,'Cash',0,0),(50,4,50.00,'Test',10,1,17,'14/07/2020',1500,'Cash',0,0),(51,8,2.00,'Faulty',1,0,0,'14/07/2020',6,'',1,0),(52,8,0.00,'check',0,0,0,'14/07/2020',0,'',1,0),(53,8,0.00,'',0,0,0,'14/07/2020',0,'',1,0),(54,3,4.00,'faulty',4,0,0,'14/07/2020',4,'',0,2);
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `item_ID` int(10) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `arabic_name` varchar(25) NOT NULL,
  `type` text NOT NULL,
  `min_level` int(10) NOT NULL,
  `unit` text NOT NULL,
  `totalstock` int(50) NOT NULL,
  PRIMARY KEY (`item_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'Chicken','دجاج','Frozen Food',500,'KG',40),(4,'Lentils','','Dry Item',50,'KG',40),(5,'Nuggets','','Frozen Food',20,'KG',0),(6,'Rice','','Dry Item',40,'KG',241),(8,'chick','دجاج','Frozen Food',0,'KG',3),(9,'Peanuts','','Dry Item',100,'KG',0);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop` (
  `shop_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `location` text NOT NULL,
  `owner` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`shop_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop`
--

LOCK TABLES `shop` WRITE;
/*!40000 ALTER TABLE `shop` DISABLE KEYS */;
INSERT INTO `shop` VALUES (1,'Shop 1','Makkah','Owner 1','+96632659874','owner1@email.com'),(2,'Shop # 2','Madina','Owner 2','+966632468743','ownerofshop2@email.com');
/*!40000 ALTER TABLE `shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier` (
  `supp_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Address` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`supp_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (1,'Supplier 1','Islamabad','+9365848413','supp1@email.com'),(2,'Supplier Name #  2','jeddah','+9658622','supplier2@email.com'),(5,'New Supplier','Jeddah','+966123456789','new@supplier.com');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction` (
  `trans_ID` int(11) NOT NULL AUTO_INCREMENT,
  `item_ID` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `weight` float(5,2) NOT NULL,
  `date` text NOT NULL,
  `invoice` int(11) NOT NULL,
  `comments` text NOT NULL,
  `price` int(10) NOT NULL,
  `cashcredit` varchar(8) NOT NULL,
  `vehicle_ID` int(10) NOT NULL DEFAULT 0,
  `shop_ID` int(10) NOT NULL DEFAULT 0,
  `inv_ID` int(10) NOT NULL,
  PRIMARY KEY (`trans_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` VALUES (2,1,50,3.40,'12/05/2020',4,'Delivered to shop',250,'',0,1,0),(5,6,200,120.00,'13/05/2020',2,'naa',123126,'',1,0,0),(6,1,10,150.00,'15/05/2020',5,'no comments',250,'',0,0,0),(7,1,10,-22.00,'15/05/2020',6,'no comments now',100,'',0,0,0),(8,1,1,1.00,'15/05/2020',7,'no comments',100,'',0,0,0),(9,4,10,50.00,'15/05/2020',8,'Delivered to shop num 1',750,'',0,1,0),(10,4,10,50.00,'15/05/2020',9,'naaa na',750,'',1,0,0),(11,5,5,5.00,'15/05/2020',10,'test to shop',200,'',0,1,0),(12,5,1,8.00,'16/05/2020',10,'testing inv_ID',400,'',1,0,22),(13,0,0,0.00,'',0,'',0,'',0,0,0),(14,0,0,0.00,'',0,'',0,'',0,0,0),(15,0,0,0.00,'',0,'',0,'',0,0,0),(16,8,0,0.00,'05/07/2020',10,'testing cash',0,'',0,1,34),(17,1,1,3.00,'05/07/2020',10,'test',10,'',0,1,33),(18,1,1,1.00,'05/07/2020',10,'check',1,'',0,2,17),(19,1,1,1.00,'05/07/2020',10,'checking',250,'credit',1,0,19),(20,4,1,1.00,'14/07/2020',11,'new checking of deliveries',1,'Credit',0,1,0),(21,6,2,2.00,'14/07/2020',11,'new checking of deliveries',2,'Credit',0,1,0),(22,1,3,3.00,'14/07/2020',12,'vehicle test',3,'Cash',2,0,0),(24,8,10,1.00,'14/07/2020',13,'Shift',10,'credit',0,1,34);
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle` (
  `vehicle_ID` int(10) NOT NULL AUTO_INCREMENT,
  `driver` text NOT NULL,
  `passport` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `area` text NOT NULL,
  `veh_num` text NOT NULL,
  PRIMARY KEY (`vehicle_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle`
--

LOCK TABLES `vehicle` WRITE;
/*!40000 ALTER TABLE `vehicle` DISABLE KEYS */;
INSERT INTO `vehicle` VALUES (1,'Driver Name','Passport 123456','+9662587413','driver@email.com','Riyadh','veh 001'),(2,'Driver # 2','Passport 2 123654','+96685236985','driver2@email.com','Jeddah Area','veh 002'),(5,'Shakoor','789','74185963','ghjkl;','isl','abc 56789');
/*!40000 ALTER TABLE `vehicle` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-15  2:58:13

/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : R2

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-11-08 02:36:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for AreaUnits
-- ----------------------------
DROP TABLE IF EXISTS `AreaUnits`;
CREATE TABLE `AreaUnits` (
  `AreaUnitId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Comment` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`AreaUnitId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of AreaUnits
-- ----------------------------
INSERT INTO `AreaUnits` VALUES ('1', 'متر', '-');

-- ----------------------------
-- Table structure for BrokerProperties
-- ----------------------------
DROP TABLE IF EXISTS `BrokerProperties`;
CREATE TABLE `BrokerProperties` (
  `BrokerPropertyId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Value` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Broker` bigint(255) DEFAULT NULL,
  `Comment` varchar(1000) COLLATE utf8_persian_ci DEFAULT NULL,
  `BrokerPropertyType` bigint(255) DEFAULT NULL,
  PRIMARY KEY (`BrokerPropertyId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of BrokerProperties
-- ----------------------------

-- ----------------------------
-- Table structure for BrokerPropertyTypes
-- ----------------------------
DROP TABLE IF EXISTS `BrokerPropertyTypes`;
CREATE TABLE `BrokerPropertyTypes` (
  `BrokerPropertyTypeId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Comment` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`BrokerPropertyTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of BrokerPropertyTypes
-- ----------------------------

-- ----------------------------
-- Table structure for Brokers
-- ----------------------------
DROP TABLE IF EXISTS `Brokers`;
CREATE TABLE `Brokers` (
  `BrokerId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Address` text COLLATE utf8_persian_ci,
  PRIMARY KEY (`BrokerId`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of Brokers
-- ----------------------------
INSERT INTO `Brokers` VALUES ('1', 'آی املاک', 'لنگرود - خیابان آزادی - پلاک 22');

-- ----------------------------
-- Table structure for BrokerUsers
-- ----------------------------
DROP TABLE IF EXISTS `BrokerUsers`;
CREATE TABLE `BrokerUsers` (
  `BrokerUserId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Family` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Username` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Passwd` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Broker` bigint(255) DEFAULT NULL,
  `Mobile` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`BrokerUserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of BrokerUsers
-- ----------------------------

-- ----------------------------
-- Table structure for DisplayTypes
-- ----------------------------
DROP TABLE IF EXISTS `DisplayTypes`;
CREATE TABLE `DisplayTypes` (
  `DisplayTypeId` bigint(255) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Comment` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`DisplayTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of DisplayTypes
-- ----------------------------
INSERT INTO `DisplayTypes` VALUES ('1', 'Normal', '-');
INSERT INTO `DisplayTypes` VALUES ('2', 'Banner', '-');
INSERT INTO `DisplayTypes` VALUES ('3', 'MainBox', '-');

-- ----------------------------
-- Table structure for EstateProperties
-- ----------------------------
DROP TABLE IF EXISTS `EstateProperties`;
CREATE TABLE `EstateProperties` (
  `EstatePropertyId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Value` varchar(10000) COLLATE utf8_persian_ci DEFAULT NULL,
  `Estate` bigint(255) DEFAULT NULL,
  `EstatePropertyType` bigint(255) DEFAULT NULL,
  PRIMARY KEY (`EstatePropertyId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of EstateProperties
-- ----------------------------
INSERT INTO `EstateProperties` VALUES ('5', '200 متر', '1', '1');
INSERT INTO `EstateProperties` VALUES ('6', '130 متر', '1', '5');
INSERT INTO `EstateProperties` VALUES ('7', 'سند رسمی', '1', '6');

-- ----------------------------
-- Table structure for EstatePropertyTypes
-- ----------------------------
DROP TABLE IF EXISTS `EstatePropertyTypes`;
CREATE TABLE `EstatePropertyTypes` (
  `EstatePropertyTypeId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Comment` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`EstatePropertyTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of EstatePropertyTypes
-- ----------------------------
INSERT INTO `EstatePropertyTypes` VALUES ('1', 'عرصه', '-');
INSERT INTO `EstatePropertyTypes` VALUES ('5', 'اعیان', null);
INSERT INTO `EstatePropertyTypes` VALUES ('6', 'سند', '');

-- ----------------------------
-- Table structure for Estates
-- ----------------------------
DROP TABLE IF EXISTS `Estates`;
CREATE TABLE `Estates` (
  `EstateId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Comment` varchar(10000) COLLATE utf8_persian_ci DEFAULT NULL,
  `Address` varchar(10000) COLLATE utf8_persian_ci DEFAULT NULL,
  `Price` bigint(20) DEFAULT NULL,
  `Area` bigint(255) DEFAULT NULL,
  `PriceType` bigint(255) DEFAULT NULL,
  `PriceUnit` bigint(255) DEFAULT NULL,
  `EstateType` bigint(255) DEFAULT NULL,
  `AreaUnit` bigint(255) DEFAULT NULL,
  `Broker` bigint(255) DEFAULT NULL,
  `DisplayType` bigint(255) DEFAULT NULL,
  PRIMARY KEY (`EstateId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of Estates
-- ----------------------------
INSERT INTO `Estates` VALUES ('1', 'آپارتمان 130 متری لوکس', '<li>محوطه سازی شده</li>                <li>نما کاری شده</li>                <li>دور محصور (دیوار کشی )</li>                <li>دارای پوشش دیواری (کنیتکس )</li>                <li>دارای امکانات آب ، برق و گاز</li>', 'گیلان - لنگرود -جمخاله - داخل محل', '130000000', '130', '1', '1', '1', '1', '1', '3');
INSERT INTO `Estates` VALUES ('2', 'ویلا 180 متری ', '<li>محوطه سازی شده</li>\r\n                <li>نما کاری شده</li>\r\n                <li>دور محصور (دیوار کشی )</li>\r\n                <li>دارای پوشش دیواری (کنیتکس )</li>\r\n                <li>دارای امکانات آب ، برق و گاز</li>', 'گیلان - لنگرود -جمخاله - داخل محل', '870000000', '180', '1', '1', '1', '1', '1', '1');
INSERT INTO `Estates` VALUES ('3', 'ویلا 250  متری لوکس', '<li>محوطه سازی شده</li>\r\n                <li>نما کاری شده</li>\r\n                <li>دور محصور (دیوار کشی )</li>\r\n                <li>دارای پوشش دیواری (کنیتکس )</li>\r\n                <li>دارای امکانات آب ، برق و گاز</li>', 'گیلان - لنگرود -جمخاله - داخل محل', '1200000000', '250', '1', '1', '1', '1', '1', '2');
INSERT INTO `Estates` VALUES ('4', 'آپارتمان 70  متری ', '<li>محوطه سازی شده</li>\r\n                <li>نما کاری شده</li>\r\n                <li>دور محصور (دیوار کشی )</li>\r\n                <li>دارای پوشش دیواری (کنیتکس )</li>\r\n                <li>دارای امکانات آب ، برق و گاز</li>', 'گیلان - لنگرود -جمخاله - داخل محل', '40000000', '70', '1', '1', '1', '1', '1', '2');
INSERT INTO `Estates` VALUES ('5', 'آپارتمان 130 متری لوکس', '<li>محوطه سازی شده</li>\r\n                <li>نما کاری شده</li>\r\n                <li>دور محصور (دیوار کشی )</li>\r\n                <li>دارای پوشش دیواری (کنیتکس )</li>\r\n                <li>دارای امکانات آب ، برق و گاز</li>', 'گیلان - لنگرود -جمخاله - داخل محل', '130000000', '130', '1', '1', '1', '1', '1', '3');
INSERT INTO `Estates` VALUES ('6', 'ویلا 180 متری ', '<li>محوطه سازی شده</li>\r\n                <li>نما کاری شده</li>\r\n                <li>دور محصور (دیوار کشی )</li>\r\n                <li>دارای پوشش دیواری (کنیتکس )</li>\r\n                <li>دارای امکانات آب ، برق و گاز</li>', 'گیلان - لنگرود -جمخاله - داخل محل', '870000000', '180', '1', '1', '1', '1', '1', '3');
INSERT INTO `Estates` VALUES ('7', 'ویلا 250  متری لوکس', '<li>محوطه سازی شده</li>\r\n                <li>نما کاری شده</li>\r\n                <li>دور محصور (دیوار کشی )</li>\r\n                <li>دارای پوشش دیواری (کنیتکس )</li>\r\n                <li>دارای امکانات آب ، برق و گاز</li>', 'گیلان - لنگرود -جمخاله - داخل محل', '1200000000', '250', '1', '1', '1', '1', '1', '3');
INSERT INTO `Estates` VALUES ('8', 'آپارتمان 70  متری ', '<li>محوطه سازی شده</li>\r\n                <li>نما کاری شده</li>\r\n                <li>دور محصور (دیوار کشی )</li>\r\n                <li>دارای پوشش دیواری (کنیتکس )</li>\r\n                <li>دارای امکانات آب ، برق و گاز</li>', 'گیلان - لنگرود -جمخاله - داخل محل', '40000000', '70', '1', '1', '1', '1', '1', '3');

-- ----------------------------
-- Table structure for EstateTypes
-- ----------------------------
DROP TABLE IF EXISTS `EstateTypes`;
CREATE TABLE `EstateTypes` (
  `EstateTypeId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Comment` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`EstateTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of EstateTypes
-- ----------------------------
INSERT INTO `EstateTypes` VALUES ('1', 'آپارتمان', '-');
INSERT INTO `EstateTypes` VALUES ('2', 'ویلا', '-');

-- ----------------------------
-- Table structure for LoggedinUsers
-- ----------------------------
DROP TABLE IF EXISTS `LoggedinUsers`;
CREATE TABLE `LoggedinUsers` (
  `LoggedinUserId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Passwd` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `SessionId` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `IP` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`LoggedinUserId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of LoggedinUsers
-- ----------------------------
INSERT INTO `LoggedinUsers` VALUES ('12', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'th94nburp2fje573is2oev1cn2', '::1');
INSERT INTO `LoggedinUsers` VALUES ('13', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 's9jmgiaffrlvkjldlnjpvg0hf2', '::1');

-- ----------------------------
-- Table structure for Options
-- ----------------------------
DROP TABLE IF EXISTS `Options`;
CREATE TABLE `Options` (
  `OptionId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` text COLLATE utf8_persian_ci,
  `Value` text COLLATE utf8_persian_ci,
  PRIMARY KEY (`OptionId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of Options
-- ----------------------------
INSERT INTO `Options` VALUES ('1', 'SiteTitle', 'املاک و مستغلات گیلان');
INSERT INTO `Options` VALUES ('3', 'SiteDescription', 'خرید و فروش املاک و مستقلات در گیلان');
INSERT INTO `Options` VALUES ('4', 'SiteKeywords', 'گیلان, املاک و مستقلات گیلان , خرید و فروش زمین درچاف , خرید و فروش زمین در چمخاله , خرید ویلا در چاف و چمخاله');

-- ----------------------------
-- Table structure for PriceTypes
-- ----------------------------
DROP TABLE IF EXISTS `PriceTypes`;
CREATE TABLE `PriceTypes` (
  `PriceTypeId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Comment` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`PriceTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of PriceTypes
-- ----------------------------
INSERT INTO `PriceTypes` VALUES ('1', 'تومان', '-');

-- ----------------------------
-- Table structure for PriceUnits
-- ----------------------------
DROP TABLE IF EXISTS `PriceUnits`;
CREATE TABLE `PriceUnits` (
  `PriceUnitId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Comment` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`PriceUnitId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of PriceUnits
-- ----------------------------
INSERT INTO `PriceUnits` VALUES ('1', '', '-');
INSERT INTO `PriceUnits` VALUES ('2', 'متر', '-');

-- ----------------------------
-- Table structure for Users
-- ----------------------------
DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `UserId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Passwd` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of Users
-- ----------------------------
INSERT INTO `Users` VALUES ('1', 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- ----------------------------
-- View structure for v1
-- ----------------------------
DROP VIEW IF EXISTS `v1`;
CREATE ALGORITHM=UNDEFINED DEFINER=`kami`@`localhost`  VIEW `v1` AS SELECT
Estates.EstateId AS `Estate.EstateId`,
Estates.Title AS `Estate.Title`,
Estates.`Comment` AS `Estate.Comment`,
Estates.Address AS `Estate.Address`,
Estates.Price AS `Estate.Price`,
Estates.PriceType AS `Estate.PriceType`,
Estates.PriceUnit AS `Estate.PriceUnit`,
Estates.AreaUnit AS `Estate.AreaUnit`,
Estates.Broker AS `Estate.Broker`,
Estates.EstateType AS `Estate.EstateType`,
PriceTypes.PriceTypeId AS `PriceType.PriceTypeId`,
PriceTypes.`Name` AS `PriceType.Name`,
PriceTypes.Comment AS `PriceType.Comment`,
PriceUnits.PriceUnitId AS `PriceUnit.PriceUnitId`,
PriceUnits.`Name` AS `PriceUnit.Name`,
PriceUnits.`Comment` AS `PriceUnit.Comment`,
AreaUnits.AreaUnitId AS `AreaUnit.AreaUnitId`,
AreaUnits.`Name` AS `AreaUnit.Name`,
AreaUnits.`Comment` AS `AreaUnit.Comment`,
EstateTypes.EstateTypeId AS `EstateType.EstateTypeId`,
EstateTypes.`Name` AS `EstateType.Name`,
EstateTypes.`Comment` AS `EstateType.Comment`,
Brokers.BrokerId AS `Broker.BrokerId`,
Brokers.`Name` AS `Broker.Name`,
Brokers.Address AS `Broker.Address`
FROM
Estates
INNER JOIN PriceTypes ON PriceTypes.PriceTypeId = Estates.PriceType
INNER JOIN PriceUnits ON PriceUnits.PriceUnitId = Estates.PriceUnit
INNER JOIN AreaUnits ON AreaUnits.AreaUnitId = Estates.AreaUnit
INNER JOIN EstateTypes ON EstateTypes.EstateTypeId = Estates.EstateType
INNER JOIN Brokers ON Brokers.BrokerId = Estates.Broker ; ;

-- ----------------------------
-- View structure for vvvvvvvv1
-- ----------------------------
DROP VIEW IF EXISTS `vvvvvvvv1`;
CREATE ALGORITHM=UNDEFINED DEFINER=`kami`@`localhost` SQL SECURITY DEFINER  VIEW `vvvvvvvv1` AS SELECT
EstatePropertyTypes.EstatePropertyTypeId AS `EstatePropertyType.EstatePropertyTypeId`,
EstatePropertyTypes.`Name` AS `EstatePropertyType.Name`,
EstatePropertyTypes.`Comment` AS `EstatePropertyType.Comment`,
EstateProperties.EstatePropertyId AS `EstateProperty.EstatePropertyId`,
EstateProperties.`Value` AS `EstateProperty.Value`,
EstateProperties.Estate AS `EstateProperty.Estate`,
EstateProperties.EstatePropertyType AS `EstateProperty.EstatePropertyType`
FROM
EstateProperties
INNER JOIN EstatePropertyTypes ON EstateProperties.EstatePropertyType = EstatePropertyTypes.EstatePropertyTypeId ;

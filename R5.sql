/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : R5

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-11-17 03:59:13
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
-- Table structure for Documents
-- ----------------------------
DROP TABLE IF EXISTS `Documents`;
CREATE TABLE `Documents` (
  `DocumentId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Comment` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`DocumentId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of Documents
-- ----------------------------
INSERT INTO `Documents` VALUES ('1', 'سند رسمی', null);
INSERT INTO `Documents` VALUES ('5', 'بنچاق', '');

-- ----------------------------
-- Table structure for EstateFacilities
-- ----------------------------
DROP TABLE IF EXISTS `EstateFacilities`;
CREATE TABLE `EstateFacilities` (
  `EstateFacilityId` bigint(20) NOT NULL AUTO_INCREMENT,
  `EstateFacilityType` bigint(255) DEFAULT NULL,
  `Estate` bigint(255) DEFAULT NULL,
  `Value` bigint(255) DEFAULT NULL,
  PRIMARY KEY (`EstateFacilityId`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of EstateFacilities
-- ----------------------------
INSERT INTO `EstateFacilities` VALUES ('11', '2', '9', '0');
INSERT INTO `EstateFacilities` VALUES ('12', '6', '9', '0');
INSERT INTO `EstateFacilities` VALUES ('13', '10', '9', '0');
INSERT INTO `EstateFacilities` VALUES ('14', '14', '9', '0');
INSERT INTO `EstateFacilities` VALUES ('15', '18', '9', '0');
INSERT INTO `EstateFacilities` VALUES ('16', '2', '2', '0');
INSERT INTO `EstateFacilities` VALUES ('17', '3', '2', '0');
INSERT INTO `EstateFacilities` VALUES ('18', '6', '2', '0');
INSERT INTO `EstateFacilities` VALUES ('19', '7', '2', '0');
INSERT INTO `EstateFacilities` VALUES ('20', '1', '1', '0');
INSERT INTO `EstateFacilities` VALUES ('21', '2', '1', '0');
INSERT INTO `EstateFacilities` VALUES ('22', '3', '1', '0');
INSERT INTO `EstateFacilities` VALUES ('23', '4', '1', '0');
INSERT INTO `EstateFacilities` VALUES ('24', '5', '1', '0');

-- ----------------------------
-- Table structure for EstateFacilityTypes
-- ----------------------------
DROP TABLE IF EXISTS `EstateFacilityTypes`;
CREATE TABLE `EstateFacilityTypes` (
  `EstateFacilityTypeId` bigint(255) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Comment` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`EstateFacilityTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of EstateFacilityTypes
-- ----------------------------
INSERT INTO `EstateFacilityTypes` VALUES ('1', 'شومینه', null);
INSERT INTO `EstateFacilityTypes` VALUES ('2', 'آسانسور', null);
INSERT INTO `EstateFacilityTypes` VALUES ('3', 'آنتن مركزي', null);
INSERT INTO `EstateFacilityTypes` VALUES ('4', 'آيفون تصويري', null);
INSERT INTO `EstateFacilityTypes` VALUES ('5', 'استخر', null);
INSERT INTO `EstateFacilityTypes` VALUES ('6', 'اطفاء حريق', null);
INSERT INTO `EstateFacilityTypes` VALUES ('7', 'اينترنت مركزي', null);
INSERT INTO `EstateFacilityTypes` VALUES ('8', 'باربيكيو', null);
INSERT INTO `EstateFacilityTypes` VALUES ('9', 'جكوزي', null);
INSERT INTO `EstateFacilityTypes` VALUES ('10', 'چيلر', null);
INSERT INTO `EstateFacilityTypes` VALUES ('11', 'برق سه فاز', null);
INSERT INTO `EstateFacilityTypes` VALUES ('12', 'درب ريموت', null);
INSERT INTO `EstateFacilityTypes` VALUES ('13', 'دوربين مدار بسته', null);
INSERT INTO `EstateFacilityTypes` VALUES ('14', 'سالن كنفرانس', null);
INSERT INTO `EstateFacilityTypes` VALUES ('15', 'سرايداري', null);
INSERT INTO `EstateFacilityTypes` VALUES ('16', 'سونا', null);
INSERT INTO `EstateFacilityTypes` VALUES ('17', 'فضاي سبز', null);
INSERT INTO `EstateFacilityTypes` VALUES ('18', 'لابي', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of EstateProperties
-- ----------------------------
INSERT INTO `EstateProperties` VALUES ('9', '234432', '9', '1');
INSERT INTO `EstateProperties` VALUES ('10', 'سنگ', '9', '6');
INSERT INTO `EstateProperties` VALUES ('11', '234', '9', '8');
INSERT INTO `EstateProperties` VALUES ('12', 'خالی', '9', '10');
INSERT INTO `EstateProperties` VALUES ('13', 'ایرانی', '9', '11');
INSERT INTO `EstateProperties` VALUES ('14', '234', '9', '12');
INSERT INTO `EstateProperties` VALUES ('15', 'کامپوزیت', '2', '6');
INSERT INTO `EstateProperties` VALUES ('16', 'در حال سکونت', '2', '10');
INSERT INTO `EstateProperties` VALUES ('17', 'ایرانی و فرنگی', '2', '11');
INSERT INTO `EstateProperties` VALUES ('18', 'نوساز', '1', '1');
INSERT INTO `EstateProperties` VALUES ('19', 'مرمر', '1', '6');
INSERT INTO `EstateProperties` VALUES ('20', 'خالی', '1', '10');
INSERT INTO `EstateProperties` VALUES ('21', 'ایرانی', '1', '11');

-- ----------------------------
-- Table structure for EstatePropertyTypes
-- ----------------------------
DROP TABLE IF EXISTS `EstatePropertyTypes`;
CREATE TABLE `EstatePropertyTypes` (
  `EstatePropertyTypeId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Comment` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Values` varchar(1000) COLLATE utf8_persian_ci DEFAULT '-',
  PRIMARY KEY (`EstatePropertyTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of EstatePropertyTypes
-- ----------------------------
INSERT INTO `EstatePropertyTypes` VALUES ('1', 'سن بنا(سال)', '-', '-');
INSERT INTO `EstatePropertyTypes` VALUES ('5', 'موقعیت جغرافیائی	', '', '-');
INSERT INTO `EstatePropertyTypes` VALUES ('6', 'نما', '-', 'سنگ-کامپوزیت-مرمر');
INSERT INTO `EstatePropertyTypes` VALUES ('7', 'جمع واحدها	', '', '-');
INSERT INTO `EstatePropertyTypes` VALUES ('8', 'تعداد واحد در طبقه	', '', '-');
INSERT INTO `EstatePropertyTypes` VALUES ('9', 'تعداد طبقات	', '', '-');
INSERT INTO `EstatePropertyTypes` VALUES ('10', 'وضعیت سکونت	', '', 'خالی-نامعلوم-در حال سکونت');
INSERT INTO `EstatePropertyTypes` VALUES ('11', 'سرویس بهداشتی	', '', 'ایرانی-فرنگی-ایرانی و فرنگی');
INSERT INTO `EstatePropertyTypes` VALUES ('12', 'تعداد پارکینگ', '', '-');
INSERT INTO `EstatePropertyTypes` VALUES ('13', 'کف پوش', '', '-');
INSERT INTO `EstatePropertyTypes` VALUES ('14', 'طبقه', '', '-');
INSERT INTO `EstatePropertyTypes` VALUES ('15', 'تعداد اتاق	', '', '-');

-- ----------------------------
-- Table structure for Estates
-- ----------------------------
DROP TABLE IF EXISTS `Estates`;
CREATE TABLE `Estates` (
  `EstateId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `Comment` varchar(10000) COLLATE utf8_persian_ci DEFAULT NULL,
  `Address` varchar(10000) COLLATE utf8_persian_ci DEFAULT NULL,
  `PricePerMeter` bigint(20) DEFAULT NULL,
  `TotalArea` bigint(255) DEFAULT NULL,
  `BuildingArea` bigint(255) DEFAULT NULL,
  `TotalPrice` bigint(255) DEFAULT NULL,
  `EstateType` bigint(255) DEFAULT NULL,
  `Document` bigint(255) DEFAULT NULL,
  `Broker` bigint(255) DEFAULT NULL,
  `DisplayType` bigint(255) DEFAULT NULL,
  PRIMARY KEY (`EstateId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of Estates
-- ----------------------------
INSERT INTO `Estates` VALUES ('1', 'آپارتمان 130 متری لوکس', '', 'گیلان - لنگرود -جمخاله - داخل محل', '10000000', '130', '1', '10000000', '1', '1', '1', '3');
INSERT INTO `Estates` VALUES ('2', 'ویلا 180 متری ', '', 'گیلان - لنگرود -جمخاله - داخل محل', '120000000', '180', '1', '120000000', '1', '1', '1', '2');
INSERT INTO `Estates` VALUES ('3', 'ویلا 250  متری لوکس', '<li>محوطه سازی شده</li>\r\n                <li>نما کاری شده</li>\r\n                <li>دور محصور (دیوار کشی )</li>\r\n                <li>دارای پوشش دیواری (کنیتکس )</li>\r\n                <li>دارای امکانات آب ، برق و گاز</li>', 'گیلان - لنگرود -جمخاله - داخل محل', '1200000000', '250', '1', '120001000', '1', '1', '1', '2');
INSERT INTO `Estates` VALUES ('4', 'آپارتمان 70  متری ', '<li>محوطه سازی شده</li>\r\n                <li>نما کاری شده</li>\r\n                <li>دور محصور (دیوار کشی )</li>\r\n                <li>دارای پوشش دیواری (کنیتکس )</li>\r\n                <li>دارای امکانات آب ، برق و گاز</li>', 'گیلان - لنگرود -جمخاله - داخل محل', '40000000', '70', '1', '1200000', '1', '1', '1', '2');
INSERT INTO `Estates` VALUES ('5', 'آپارتمان 130 متری لوکس', '<li>محوطه سازی شده</li>\r\n                <li>نما کاری شده</li>\r\n                <li>دور محصور (دیوار کشی )</li>\r\n                <li>دارای پوشش دیواری (کنیتکس )</li>\r\n                <li>دارای امکانات آب ، برق و گاز</li>', 'گیلان - لنگرود -جمخاله - داخل محل', '130000000', '130', '1', '200000', '1', '1', '1', '3');
INSERT INTO `Estates` VALUES ('6', 'ویلا 180 متری ', '<li>محوطه سازی شده</li>\r\n                <li>نما کاری شده</li>\r\n                <li>دور محصور (دیوار کشی )</li>\r\n                <li>دارای پوشش دیواری (کنیتکس )</li>\r\n                <li>دارای امکانات آب ، برق و گاز</li>', 'گیلان - لنگرود -جمخاله - داخل محل', '870000000', '180', '1', '2100000', '1', '1', '1', '3');
INSERT INTO `Estates` VALUES ('7', 'ویلا 250  متری لوکس', '<li>محوطه سازی شده</li>\r\n                <li>نما کاری شده</li>\r\n                <li>دور محصور (دیوار کشی )</li>\r\n                <li>دارای پوشش دیواری (کنیتکس )</li>\r\n                <li>دارای امکانات آب ، برق و گاز</li>', 'گیلان - لنگرود -جمخاله - داخل محل', '1200000000', '250', '1', '1500000000', '1', '1', '1', '3');
INSERT INTO `Estates` VALUES ('8', 'آپارتمان 70  متری ', '<li>محوطه سازی شده</li>\r\n                <li>نما کاری شده</li>\r\n                <li>دور محصور (دیوار کشی )</li>\r\n                <li>دارای پوشش دیواری (کنیتکس )</li>\r\n                <li>دارای امکانات آب ، برق و گاز</li>', 'گیلان - لنگرود -جمخاله - داخل محل', '40000000', '70', '1', '100000000', '1', '1', '1', '3');
INSERT INTO `Estates` VALUES ('9', 'sfdsdfsdf', '234234234432243', '234234234', '32423423', '234234', '234234', '32423423', '1', '5', '1', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of LoggedinUsers
-- ----------------------------
INSERT INTO `LoggedinUsers` VALUES ('12', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'th94nburp2fje573is2oev1cn2', '::1');
INSERT INTO `LoggedinUsers` VALUES ('13', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 's9jmgiaffrlvkjldlnjpvg0hf2', '::1');
INSERT INTO `LoggedinUsers` VALUES ('14', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '36g7pu3ppl1fmgh40p49pqfvd5', '::1');
INSERT INTO `LoggedinUsers` VALUES ('15', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'r9bg141b0krmur0ocs6o61oh96', '::1');
INSERT INTO `LoggedinUsers` VALUES ('16', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 't51rbhqcnq1j1kal51oinmp0h7', '::1');
INSERT INTO `LoggedinUsers` VALUES ('17', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'slicvo6sl05e05tro72o2n0331', '::1');

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

/*
 Navicat MySQL Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100418
 Source Host           : localhost:3306
 Source Schema         : ci4_1

 Target Server Type    : MySQL
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 13/08/2021 14:30:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for clients
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients`  (
  `client_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`client_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of clients
-- ----------------------------
INSERT INTO `clients` VALUES (1, 'Ghanshyam ', 'tuladharprithvi@gmail.com', 'Dhanga', '2021-08-13 00:00:00', NULL, NULL, 'invusername', 'ea6e7e0254dbe23088baa63d6f6762af');

-- ----------------------------
-- Table structure for expenses
-- ----------------------------
DROP TABLE IF EXISTS `expenses`;
CREATE TABLE `expenses`  (
  `exp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `exp_heading` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `amount` float(10, 2) NOT NULL,
  `client_id` int(10) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `week` int(2) NOT NULL,
  PRIMARY KEY (`exp_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of expenses
-- ----------------------------
INSERT INTO `expenses` VALUES (1, 'Super Haul', '2021-08-11', 2300.00, 1, '2021-08-13 00:00:00', NULL, NULL, 32);

-- ----------------------------
-- Table structure for incomes
-- ----------------------------
DROP TABLE IF EXISTS `incomes`;
CREATE TABLE `incomes`  (
  `income_id` int(10) NOT NULL AUTO_INCREMENT,
  `income_heading` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `amount` float(10, 2) NOT NULL,
  `client_id` int(10) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `date` date NOT NULL,
  `week` int(2) NOT NULL,
  PRIMARY KEY (`income_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of incomes
-- ----------------------------
INSERT INTO `incomes` VALUES (1, 'White Money', 2000.50, 1, '2021-08-13 00:00:00', '2021-08-13 00:00:00', NULL, '2021-08-11', 32);
INSERT INTO `incomes` VALUES (2, 'Black Money', 2300.50, 1, '2021-08-13 00:00:00', NULL, NULL, '2021-08-04', 31);
INSERT INTO `incomes` VALUES (3, 'Green Money', 2500.00, 1, '2021-08-13 00:00:00', NULL, NULL, '2021-07-15', 28);

SET FOREIGN_KEY_CHECKS = 1;

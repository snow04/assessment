/*
 Navicat Premium Data Transfer

 Source Server         : MyConnection
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : assessment

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 18/08/2021 04:22:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `stock` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `price` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'Gatas', '9', 12.00);
INSERT INTO `products` VALUES (2, 'Milo', '0', 12.00);

-- ----------------------------
-- Table structure for sales
-- ----------------------------
DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `quantity` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `price` decimal(10, 2) NULL DEFAULT NULL,
  `amount` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sales
-- ----------------------------
INSERT INTO `sales` VALUES (1, '2', '2', 12.00, 24.00);
INSERT INTO `sales` VALUES (2, '1', '5', 12.00, 60.00);
INSERT INTO `sales` VALUES (3, '2', '2', 12.00, 24.00);
INSERT INTO `sales` VALUES (4, '2', '2', 12.00, 24.00);
INSERT INTO `sales` VALUES (5, '2', '3', 12.00, 36.00);
INSERT INTO `sales` VALUES (6, '2', '2', 12.00, 24.00);
INSERT INTO `sales` VALUES (7, '2', '3', 12.00, 36.00);
INSERT INTO `sales` VALUES (8, '2', '3', 12.00, 36.00);
INSERT INTO `sales` VALUES (9, '2', '13', 12.00, 156.00);
INSERT INTO `sales` VALUES (10, '2', '1', 12.00, 12.00);
INSERT INTO `sales` VALUES (11, '1', '3', 12.00, 36.00);

SET FOREIGN_KEY_CHECKS = 1;

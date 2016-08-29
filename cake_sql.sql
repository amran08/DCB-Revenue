/*
Navicat MySQL Data Transfer

Source Server         : xampp
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : mazbas_cake1.2

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2016-07-20 15:43:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tasks`
-- ----------------------------
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `name_en` varchar(155) NOT NULL,
  `name_bn` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(100) NOT NULL DEFAULT 'fa fa-tasks fa-fw',
  `controller` varchar(155) DEFAULT NULL,
  `method` varchar(100) DEFAULT NULL,
  `ordering` int(11) DEFAULT '999',
  `position_left_01` tinyint(4) DEFAULT NULL,
  `position_top_01` tinyint(4) DEFAULT NULL,
  `position_right_01` tinyint(4) NOT NULL,
  `position_bottom_01` tinyint(4) NOT NULL,
  `position_middle_01` tinyint(4) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_date` int(11) NOT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_date` int(11) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tasks
-- ----------------------------
INSERT INTO `tasks` VALUES ('1', null, 'Dashboard', 'Dashboard', 'fasfs', 'fa fa-dashboard', 'Dashboard', 'index', '1', '1', '1', '0', '0', '0', '1', '1452682673', '1', '1460811591', '1');
INSERT INTO `tasks` VALUES ('2', '0', 'System Management', 'System Management', 'System Management', 'fa  fa-compass ', 'Dashboard', null, '1', '1', '1', '0', '0', '0', '1', '1452682858', null, null, '1');
INSERT INTO `tasks` VALUES ('3', '2', 'User Management', 'User Management', 'User Management', 'fa fa-users ', '', null, '1', '1', '1', '0', '0', '0', '1', '1452682914', null, null, '1');
INSERT INTO `tasks` VALUES ('4', null, 'Create User', 'Create User', 'Create User', 'fa fa-user', 'Users', 'index', '1', '1', '1', '0', '0', '0', '1', '1452683264', '1', '1464518051', '0');
INSERT INTO `tasks` VALUES ('5', '2', 'Add Task', 'Add Task', 'Add Task', 'fa fa-flag ', 'Tasks', 'index', '1', '1', '1', '0', '0', '0', '1', '1452684258', null, null, '1');
INSERT INTO `tasks` VALUES ('6', '3', 'User Group List', 'User Group List', 'User Group List', 'fa fa-users', 'UserGroups', 'index', '1', '1', '1', '0', '0', '0', '1', '1452684316', null, null, '1');
INSERT INTO `tasks` VALUES ('7', '3', 'User Group Role Management', 'User Group Role Management', 'User Group Role Management', 'fa fa-sliders ', 'UserGroupPermissions', 'index', '1', '1', '1', '0', '0', '0', '1', '1452684399', null, null, '1');
INSERT INTO `tasks` VALUES ('8', null, 'LOGOUT', 'LOGOUT', 'LOGOUT', 'fa fa-power-off ', 'Dashboard', 'logout', '1', '1', '1', '0', '0', '0', '1', '1452684680', '1', '1460957204', '2');

-- ----------------------------
-- Table structure for `user_group_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `user_group_permissions`;
CREATE TABLE `user_group_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_group_id` int(10) unsigned NOT NULL,
  `controller` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `action` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_group_permissions
-- ----------------------------
INSERT INTO `user_group_permissions` VALUES ('1', '1', 'Tasks', 'index', '1', '1', '1452322074', '1', '1452419002');
INSERT INTO `user_group_permissions` VALUES ('2', '1', 'Tasks', 'view', '1', '1', '1452322074', '1', '1452419002');
INSERT INTO `user_group_permissions` VALUES ('16', '1', 'Tasks', 'add', '1', '1', '1452414407', '1', '1452419002');
INSERT INTO `user_group_permissions` VALUES ('18', '1', 'Tasks', 'edit', '1', '1', '1452414690', '1', '1452600804');
INSERT INTO `user_group_permissions` VALUES ('19', '1', 'UserGroupPermissions', 'index', '1', '1', '1452418811', '1', '1452419002');
INSERT INTO `user_group_permissions` VALUES ('20', '1', 'UserGroupPermissions', 'edit', '1', '1', '1452418811', '1', '1452419002');
INSERT INTO `user_group_permissions` VALUES ('21', '1', 'UserGroups', 'view', '1', '1', '1452418822', '1', '1452600804');
INSERT INTO `user_group_permissions` VALUES ('22', '1', 'Dashboard', 'index', '1', '1', '1452600804', null, null);
INSERT INTO `user_group_permissions` VALUES ('23', '1', 'Dashboard', 'login', '1', '1', '1452600804', null, null);
INSERT INTO `user_group_permissions` VALUES ('24', '1', 'Dashboard', 'logout', '1', '1', '1452600804', null, null);
INSERT INTO `user_group_permissions` VALUES ('25', '1', 'Test', 'index', '0', '1', '1452662829', '2', '29');
INSERT INTO `user_group_permissions` VALUES ('26', '1', 'Test', 'method1', '0', '1', '1452662829', '2', '29');
INSERT INTO `user_group_permissions` VALUES ('27', '1', 'Test', 'method2', '0', '1', '1452662829', '2', '29');
INSERT INTO `user_group_permissions` VALUES ('28', '1', 'Test', 'method3', '0', '1', '1452662829', '2', '29');
INSERT INTO `user_group_permissions` VALUES ('29', '1', 'Test', 'method4', '0', '1', '1452662829', '2', '29');
INSERT INTO `user_group_permissions` VALUES ('30', '1', 'UserGroups', 'index', '1', '1', '1452662829', null, null);
INSERT INTO `user_group_permissions` VALUES ('31', '1', 'UserGroups', 'add', '1', '1', '1452662829', null, null);
INSERT INTO `user_group_permissions` VALUES ('32', '1', 'UserGroups', 'edit', '1', '1', '1452662829', null, null);
INSERT INTO `user_group_permissions` VALUES ('33', '1', 'UserGroups', 'delete', '1', '1', '1452662829', null, null);
INSERT INTO `user_group_permissions` VALUES ('39', '1', 'Tasks', 'ajax', '1', '1', '1452683187', null, null);

-- ----------------------------
-- Table structure for `user_groups`
-- ----------------------------
DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_en` varchar(100) DEFAULT NULL,
  `title_bn` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(150) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_time` int(150) DEFAULT NULL,
  `ordering` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_groups
-- ----------------------------
INSERT INTO `user_groups` VALUES ('1', 'Super Admin', 'সুপার এডমিন', '1', '1', '2', '1461409709', '1', '1');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `division_id` int(11) NOT NULL,
  `district_id` int(11) DEFAULT NULL,
  `upazila_id` int(11) DEFAULT NULL,
  `office_id` int(11) NOT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `user_group_id` int(11) NOT NULL,
  `full_name_bn` varchar(150) NOT NULL,
  `full_name_en` varchar(80) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture_alt` varchar(100) DEFAULT NULL,
  `picture` varchar(200) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `create_by` int(11) NOT NULL,
  `create_date` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '0', null, null, '1', null, '2', 'Shawon', 'Shawon', 'shawon', '$2y$10$v5rEc6bV0cMw20j.iQBb7e.BLu06Dxoh9bGBrBjHkXkvcB4yRfBeC', 'shawon', '10410321_1005129129532327_6815767925945332231_n.jpg', '1', '1', '1460730836', '2', '1464505305');
INSERT INTO `users` VALUES ('2', '1', null, null, '3', null, '1', 'Mazba ', 'Mazbaa', 'mazba', '$2y$10$DVoBmhKlKRg/rrC40CzCSuVhi93gXh8l1nXyf9bIgr7cp0HLnPZFC', 'mazba', '1464601985_adef87a98125d30629377bb486d13d52.jpg', '1', '1', '1', '2', '1464601984');


SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `order_items`
-- ----------------------------
DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `quantity` int(11) NOT NULL,
  `weight` decimal(8,2) unsigned NOT NULL DEFAULT '0.00',
  `price` decimal(8,2) unsigned NOT NULL,
  `subtotal` decimal(8,2) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight` decimal(8,2) unsigned NOT NULL DEFAULT '0.00',
  `order_item_count` int(11) NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `tax` decimal(8,2) NOT NULL,
  `shipping` decimal(8,2) NOT NULL,
  `total` decimal(8,2) unsigned NOT NULL,
  `order_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `weight` decimal(8,2) NOT NULL,
  `active` int(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `modified` (`modified`),
  KEY `name_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `products`
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES ('baf7d29c-2b09-11e2-8a48-f23c91934b7a', 'Product 1', 'product1', 'description product 1', '1.jpg', '9.95', '1.00', '1', '2011-10-12 04:04:08', '2011-11-28 06:32:03'), ('baf99ba0-2b09-11e2-8a48-f23c91934b7a', 'Product 10', 'product10', 'description producy 10', '10.jpg', '99.99', '10.00', '1', '2011-10-12 04:04:10', '2011-11-27 07:43:26'), ('baf99dd2-2b09-11e2-8a48-f23c91934b7a', 'Product 2', 'product2', 'description product 2', '2.jpg', '19.95', '2.00', '1', '2011-10-12 04:04:08', '2011-11-28 15:49:29'), ('baf9a001-2b09-11e2-8a48-f23c91934b7a', 'Product 3', 'product3', 'description product 3', '3.jpg', '19.95', '3.00', '1', '2011-10-12 04:04:10', '2011-11-28 00:50:07'), ('baf9a22d-2b09-11e2-8a48-f23c91934b7a', 'Product 4', 'product4', 'description product 4', '4.jpg', '19.95', '4.00', '1', '2011-10-12 04:04:10', '2011-11-27 13:08:33'), ('baf9a3f0-2b09-11e2-8a48-f23c91934b7a', 'Product 5', 'product5', 'description product 5', '5.jpg', '19.95', '5.00', '1', '2011-10-12 04:04:10', '2011-11-28 15:43:53'), ('baf9a5d0-2b09-11e2-8a48-f23c91934b7a', 'Product 6', 'product6', 'description product 6', '6.jpg', '49.95', '6.00', '1', '2011-10-12 04:04:10', '2011-11-27 04:19:02'), ('baf9a7d8-2b09-11e2-8a48-f23c91934b7a', 'Product 7', 'product7', 'description product 7', '7.jpg', '19.95', '7.00', '1', '2011-10-12 04:04:10', '2011-11-27 09:43:42'), ('baf9a9bb-2b09-11e2-8a48-f23c91934b7a', 'Product 8', 'product8', 'description product 8', '8.jpg', '79.95', '8.00', '1', '2011-10-12 04:04:10', '2011-11-27 12:05:26'), ('baf9abc4-2b09-11e2-8a48-f23c91934b7a', 'Product 9', 'product9', 'description product 9', '9.jpg', '19.95', '9.00', '1', '2011-10-12 04:04:10', '2011-11-28 00:50:03');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('4e800ecf-b5bc-4fc6-b78f-67884317134f', 'a', '6cfb5e7ba5fa202e923f45c534b87344440591e9', '1', '2011-09-26 00:34:07', '2011-09-26 00:34:07');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

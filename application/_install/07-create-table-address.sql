CREATE TABLE IF NOT EXISTS `address` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `country` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address1` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `lng` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `postcode` varchar(20) COLLATE utf8_unicode_ci NULL,
  `created_time` datetime NOT NULL,
  `updated_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;
CREATE TABLE IF NOT EXISTS `store` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT "广东省",
  `city` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT "广州市",
  `district` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(40) COLLATE utf8_unicode_ci,
  `lon` varchar(40) COLLATE utf8_unicode_ci,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci,
  `status` int(1) NOT NULL DEFAULT 1,
  `tag` varchar(40) COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

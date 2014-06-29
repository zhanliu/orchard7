CREATE TABLE IF NOT EXISTS `store` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address_id` varchar(20) NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `tag` varchar(40) COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

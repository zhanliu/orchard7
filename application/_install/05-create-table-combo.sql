CREATE TABLE IF NOT EXISTS `combo` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `tag` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_url` varchar(80) NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `created_time` datetime NOT NULL,
  `updated_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `combo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `tag` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_archived` int(1) NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL,
  `updated_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
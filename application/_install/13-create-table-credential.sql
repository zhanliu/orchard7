CREATE TABLE IF NOT EXISTS `orchard7`.`credential` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `role_id` int(20) NOT NULL,
  `login` varchar(40)COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `access_log` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `wechat_id` varchar(10) NOT NULL,
  `created_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

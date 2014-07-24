CREATE TABLE IF NOT EXISTS `store_staff` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `wechat_id` varchar(60) NOT NULL,
  `name` varchar(40) NOT NULL,
  `cellphone` varchar(20) NOT NULL,
  `store_id` int(20) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` varchar(2) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
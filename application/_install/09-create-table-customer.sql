CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NULL,
  `gender` varchar(10) NULL,
  `login` varchar(20) NULL,
  `password` varchar(20) NULL,
  `wechat_id` varchar(20) NULL,
  `cellphone` varchar(20) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
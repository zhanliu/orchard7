CREATE TABLE IF NOT EXISTS `order_process` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(20) NOT NULL,
  `operator` varchar(20) NOT NULL,
  `from_status` int(2) NOT NULL,
  `to_status` int(2) NULL,
  `created_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
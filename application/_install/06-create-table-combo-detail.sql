CREATE TABLE IF NOT EXISTS `combo_detail` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `combo_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
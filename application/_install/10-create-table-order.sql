CREATE TABLE IF NOT EXISTS `orchard7`.`order1` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `is_diy` int(1) NOT NULL,
  `total_amount` double(10,2) NULL,
  `address_id` varchar(20) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
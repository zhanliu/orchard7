CREATE TABLE IF NOT EXISTS `order_status` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `status_code` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

insert into order_status (status_code, status) values ("0", "初始状态");
insert into order_status (status_code, status) values ("1", "订单确认");
insert into order_status (status_code, status) values ("2", "发货");
insert into order_status (status_code, status) values ("3", "订单完成");
insert into order_status (status_code, status) values ("4", "用户放弃");
insert into order_status (status_code, status) values ("5", "取消");

CREATE TABLE IF NOT EXISTS `orchard7`.`order_status` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `status_code` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

insert into order_status (status_code, status) values ("0", "init");
insert into order_status (status_code, status) values ("1", "start_operate");
insert into order_status (status_code, status) values ("2", "start_deliver");
insert into order_status (status_code, status) values ("3", "success");
insert into order_status (status_code, status) values ("4", "user_drop");
insert into order_status (status_code, status) values ("5", "cancel");

CREATE TABLE IF NOT EXISTS `channel` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `is_active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


insert into channel (name, description, is_active) values ("水果拼盘", "水果拼盘", 1);
insert into channel (name, description, is_active) values ("时令鲜果", "时令鲜果", 2);
insert into channel (name, description, is_active) values ("香脆坚果", "香脆坚果", 3);
insert into channel (name, description, is_active) values ("商务拼盘", "商务拼盘", 4);

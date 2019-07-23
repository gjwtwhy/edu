CREATE TABLE `b_goods`(
`id` int(4) not null auto_increment comment '商品ID',
`name` VARCHAR(50) not null comment '商品名称',
`pic` VARCHAR(100) not null comment '商品图片',
`price` FLOAT(10,2) not null comment '商品价格',
PRIMARY key (`id`)
) engine='InnoDB' DEFAULT charset='utf8';

CREATE TABLE `b_attr`(
`id` int(4) not null auto_increment comment '规格ID',
`name` VARCHAR(20) not null comment '规格名称',
PRIMARY key (`id`)
) engine='InnoDB' DEFAULT charset='utf8';

CREATE TABLE `b_attr_v`(
`id` int(4) not null auto_increment comment '值ID',
`attr_id` int(4) not null comment '规格ID',
`v` VARCHAR(20) not null comment '规格值',
PRIMARY KEY (`id`)
) engine='InnoDB' DEFAULT charset='utf8';

CREATE TABLE `b_goods_sku`(
`id` int(4) not null auto_increment comment 'sku_id',
`goods_id` int(4) not null  comment '商品ID',
`v_ids` VARCHAR(20) not null comment '规格值ID组合',
`price` FLOAT(10,2) not null comment '价格',
PRIMARY KEY (`id`)
) engine='InnoDB' DEFAULT charset='utf8';
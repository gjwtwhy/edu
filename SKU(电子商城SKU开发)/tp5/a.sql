CREATE TABLE `a_product`(
`id` int(4) not null auto_increment comment '产品ID',
`name` VARCHAR(30) not null comment '产品名称',
PRIMARY KEY (`id`)
) engine='InnoDB' DEFAULT charset='utf8';

CREATE TABLE `a_saler`(
`id` int(4) not null auto_increment comment '销售人员ID',
`name` VARCHAR(30) not null comment '销售姓名',
PRIMARY KEY (`id`)
) engine='InnoDB' DEFAULT charset='utf8';

CREATE TABLE `a_payment`(
`id` int(4) not null auto_increment comment '支付方式ID',
`name` VARCHAR(30) not null comment '支付方式',
PRIMARY KEY (`id`)
) engine='InnoDB' DEFAULT charset='utf8';

CREATE TABLE `a_logistics`(
`id` int(4) not null auto_increment comment '物流ID',
`name` VARCHAR(30) not null comment '物流方式名称',
PRIMARY KEY (`id`)
) engine='InnoDB' DEFAULT charset='utf8';

CREATE TABLE `a_contract`(
`id` int(4) not null auto_increment comment 'ID',
`c_no` VARCHAR(30) not null comment '合同编号',
`price` int(10) not null comment '合同金额（单位：分）',
`saler_id` int(4) not null comment '销售人员ID',
`product_id` int(4) not null comment '产品ID',
`pay_id` int(4) not null comment '支付方式ID',
`log_id` int(4) not null comment '物流方式ID',
`status` tinyint(1) DEFAULT '1' not null comment '状态：1代表正常 2 代表删除',
`y` SMALLINT(2) not null comment '年',
`m` tinyint(1) not null comment '月',
`d` tinyint(1) not null comment '日',
`create_time` int(10) not null comment '创建时间',
PRIMARY KEY (`id`),
UNIQUE KEY `c_no` (`c_no`)
) engine='InnoDB' DEFAULT charset='utf8';
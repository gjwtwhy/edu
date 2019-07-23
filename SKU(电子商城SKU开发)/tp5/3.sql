create table `admin`(
`id` int(4) NOT NULL AUTO_INCREAMENT COMMENT '用户ID',
`username` VARCHAR(20) NOT NULL COMMENT '用户名',
`passwd` CHAR（32） NOT NULL COMMENT '密码',
PRIMARY KEY (`id`)
) ENGINE='InnoDB' DEFAULT CHARSET='utf8';

CREATE table `user` (
    `id` int(4) not null AUTO_INCREMENT COMMENT '用户ID',
    `name` VARCHAR(20) NOT NULL COMMENT '姓名',
    `sex` tinyint(1) NOT NULL COMMENT '性别',
    `age` int(2) NOT NULL COMMENT '年龄',
    `mobile` VARCHAR(10) NOT NULL COMMENT '手机号',
    `city_id` int(4) NOT NULL COMMENT '城市ID',
    `create_time` int(10) NOT NULL COMMENT '注册时间',
    PRIMARY key (`id`)
) ENGINE='InnoDB' DEFAULT CHARSET='utf8';

 create table `city`(
    `id` int(4) not null auto_increment comment '城市ID',
    `pid` int(4) not null comment '父ID',
    `name` varchar(20) not null comment '城市名称',
    primary key (`id`)
    ) engine='InnoDB' default charset='utf8';
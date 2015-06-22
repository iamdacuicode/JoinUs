drop table if exists `join_user_admin`;
create table `join_user_admin`(
	id tinyint primary key auto_increment unsigned,
	username varchar(255) not null comment `管理员帐号`,
	password varchar(255) not null comment `后台登录密码`,
	nickname varchar(50) comment `昵称`,
	authkey  varchar(255) not null comment `验证密钥`,
	accesstoken varchar(255) not null comment `访问验证`,
	lasttime datetime not null comment `最后次访问时间`,
	updatetime datetime not null comment `更新时间`,
	loginnum  int comment `登录次数`,
	thumb  varchar(255) comment `头像`,
	lastip varchar(100) comment `上次登录地址`,
	email varchar(100) comment `邮箱`
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

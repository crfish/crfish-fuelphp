<?php

namespace Fuel\Migrations;

class Account_suspended
{

	public function up()
	{
		\DB::query("
			CREATE TABLE `account_suspended` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `login_id` varchar(50) NOT NULL,
			  `attempts` int(50) NOT NULL,
			  `ip` varchar(25) NOT NULL,
			  `last_attempt_at` int(11) NOT NULL,
			  `suspended_at` int(11) NOT NULL,
			  `unsuspend_at` int(11) NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		")->execute();

	}


	public function down()
	{
		\DB::query("
			DROP TABLE IF EXISTS `account_suspended`;
		")->execute();

	}

}
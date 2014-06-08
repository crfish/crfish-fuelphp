<?php

namespace Fuel\Migrations;

class Account_metadata
{

	public function up()
	{
		\DB::query("
			CREATE TABLE `account_metadata` (
			  `account_id` int(11) NOT NULL,
			  `dob` varchar(10) DEFAULT NULL,
			  `first_name` varchar(50) NOT NULL,
			  `last_name` varchar(50) NOT NULL,
			  PRIMARY KEY (`account_id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		")->execute();
	}


	public function down()
	{
		\DB::query("
			DROP TABLE IF EXISTS `account_metadata`;
		")->execute();
	}

}
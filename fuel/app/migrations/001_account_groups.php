<?php

namespace Fuel\Migrations;

class Account_groups
{

	public function up()
	{
		\DB::query("
			CREATE TABLE `account_groups` (
			  `account_id` int(11) NOT NULL,
			  `group_id` int(11) NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		")->execute();

	}


	public function down()
	{
		\DB::query("
			DROP TABLE IF EXISTS `account_groups`;
		")->execute();

	}
	
}
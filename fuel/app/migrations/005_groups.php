<?php

namespace Fuel\Migrations;

class Groups
{

	public function up()
	{
		\DB::query("
			CREATE TABLE `groups` (
			  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
			  `name` varchar(200) NOT NULL,
			  `permissions` text NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		")->execute();

	}


	public function down()
	{
		\DB::query("
			DROP TABLE IF EXISTS `groups`;
		")->execute();

	}

}
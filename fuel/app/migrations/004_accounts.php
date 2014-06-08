<?php

namespace Fuel\Migrations;

class Accounts
{

	public function up()
	{
		\DB::query("
			CREATE TABLE `accounts` (
			  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			  `username` varchar(50) NOT NULL,
			  `email` varchar(50) NOT NULL,
			  `password` varchar(81) NOT NULL,
			  `password_reset_hash` varchar(81) NOT NULL,
			  `temp_password` varchar(81) NOT NULL,
			  `remember_me` varchar(81) NOT NULL,
			  `activation_hash` varchar(81) NOT NULL,
			  `last_login` int(11) NOT NULL,
			  `ip_address` varchar(50) NOT NULL,
			  `status` tinyint(1) NOT NULL,
			  `activated` tinyint(4) NOT NULL,
			  `permissions` text NOT NULL,
			  `created_at` int(11) NOT NULL,
			  `updated_at` int(11) NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		")->execute();

	}


	public function down()
	{
		\DB::query("
			DROP TABLE IF EXISTS `accounts`;
		")->execute();

	}

}
<?php

class Model_Account extends \Orm\Model
{
	protected static $_table_name = 'accounts';

	protected static $_properties = array(
		'id',
		'username',
		'email',
		'password',
		'password_reset_hash',
		'temp_password',
		'remember_me',
		'activation_hash',
		'last_login',
		'ip_address',
		'updated_at',
		'created_at',
		'status',
		'activated',
		'permissions',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function get_by_id($id)
	{
		return static::find($id);
	}

	public static function register($data)
	{
		// create the user - no activation required
		$account_id = Sentry::user()->create(array(
			'email'    => $data->email,
			'password' => $data->password,
			'username' => $data->username,
			'metadata' => array(
				'dob' => 0,//$data->dob,
				'first_name' => 0,//$data->fname,
				'last_name' => 0,//$data->lname,
			)
		));
	}

	public static function login_username($data)
	{
		$username = static::query()->where('username', $data)->get_one();
		if($username)
		{
			return $username->username;
		}
		else
		{
			$username = static::query()->where('email', $data)->get_one();
			return $username ? $username->username : null;
		}
	}
}

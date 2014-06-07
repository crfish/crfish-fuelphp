<?php

#
#
#

class Controller_Base extends Controller_Hybrid
{

	public function before()
	{
		parent::before();
	}
	#
	#
	#
	public function get_data()
	{
		foreach (func_get_args() as $arg)
		{
			$data[$arg] = new Model_Input($arg, Input::get($arg));
		}
		return (object) $data;
	}


	#
	#
	#
	public function post_data()
	{
		foreach (func_get_args() as $arg)
		{
			$data[$arg] = new Model_Input($arg, Input::post($arg));
		}
		return (object) $data;
	}


	#
	#
	#
	public function http_method($is)
	{
		return (Input::method() === strtoupper($is));
	}


	#
	#
	#
	public function redirect($location, $type = null, $message = null)
	{
		if (!is_null($type) and !is_null($message))
		{
			Session::set_flash($type, $message);
		}

		Response::redirect($location);
	}
	
}
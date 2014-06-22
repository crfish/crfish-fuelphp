<?php

class Controller_Account extends Controller_App
{

	public function post_login()
	{
		$post = $this->post_data('username','password');

		try
		{
			$login = Sentry::login($post->username->value, $post->password->value);
			if($login)
			{
				$this->redirect('/', 'success', 'Welcome Back');
			}
			else
			{
				$this->redirect('register', 'error', 'Invaild Username or Password');
			}
		}
		catch (SentryAuthException $e)
		{
			$this->redirect('login', 'error', $e->getMessage());
		}
	}

	public function action_register()
	{
		$this->template->content1 = View::forge('landing/register');
	}

	public function post_register()
	{
		$post = $this->post_data('username','email','password','dob','type', 'fname', 'lname', 'country');

		try
		{
			$account = Model_Account::register($post);
		}
		catch (Exception $e)
		{
			throw $e;
			
			$this->redirect('register', 'error', $e->getMessage());
		}

		Sentry::login($post->username->value, $post->password->value);
		$this->redirect('/', 'success', 'You are now registered');
	}

	public function get_logout()
	{
		Sentry::logout();
		$this->redirect('/', 'success', 'You are now logged out. Come back soon!');
	}

}
<?php

class Model_Input
{
	public function __construct($name, $value)
	{
		$this->name = $name;
		$this->value = $value;
	}
	
	public function __toString()
	{
		return isset($this->value) ? $this->value : '';
	}

	public function is_empty()
	{
		return empty($this->value);
	}

	public function val()
	{
		return $this->value;
	}

	public function is_equal_to($value)
	{
		if (is_object($value) and get_class($value) == 'Model_Input')
		{
			return $this->value === $value->value ? true : false;
		}
		return $value === $value ? true : false;
	}

	public function length($operator, $characters)
	{
		if ($operator == '>' and strlen($this->value) > $characters) return true;
		elseif ($operator == '<' and strlen($this->value) < $characters) return true;
		else return false;
	}

	public function valid_email()
	{
		return filter_var($this->value, FILTER_VALIDATE_EMAIL);
	}
}
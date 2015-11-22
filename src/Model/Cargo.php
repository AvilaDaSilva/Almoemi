<?php

namespace Model;

class Cargo
{

	/**
	*
	*@var string
	*/

	protected $table_name = 'cargo';

	/**
	*@var serial
	*
	*/

	protected $id;

	/**
	*@var string
	*
	*/
	
	protected $desc_cargo;

	public function __set($key, $value)
	{
		$this->$key = trim(strip_tags($value));
	}

    public function __get($key)
    {
		return $this->$key;
    }
}
































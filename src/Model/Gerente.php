<?php

namespace Model;

class Gerente extends Pessoa
{

	/**
	*
	*@var string
	*/

	protected $table_name = 'gerente';

	/**
	*@var int
	*
	*/

	protected $matricula;


	public function __set($key, $value)
	{
		$this->$key = trim(strip_tags($value));
	}

    public function __get($key)
    {
		return $this->$key;
    }
}
































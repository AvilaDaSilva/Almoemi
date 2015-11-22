<?php

namespace Model;

class Itens
{

	/**
	*
	*@var string
	*/

	protected $table_name = 'itens';

	/**
	*@var int
	*
	*/

	protected $id;

	/**
	*@var string
	*
	*/
	
	protected $nome;

	/**
	*@var int
	*
	*/
	
	protected $cod_barra;

	/**
	*@var int
	*
	*/

	protected $quantidade;

	/**
	*@var int
	*
	*/

	protected $corredor;

	/**
	*@var int
	*
	*/

	protected $prateleira;


	public function __set($key, $value)
	{
		$this->$key = trim(strip_tags($value));
	}

    public function __get($key)
    {
		return $this->$key;
    }

	public function setData($values)
	{

		foreach($values as $key => $value){
			$this->$key = trim(strip_tags($value));
		}

	}

	public function getArrayCopy()
	{
		return get_object_vars($this);
	}

}
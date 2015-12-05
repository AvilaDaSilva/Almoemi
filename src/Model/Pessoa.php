<?php

namespace Model;

class Pessoa
{

	/**
	*
	*@var string
	*/

	protected $table_name = 'pessoa';

	/**
	*@var int
	*
	*/

	protected $matricula;

	/**
	*@var string
	*
	*/
	
	protected $nome;

	/**
	*@var string
	*
	*/
	
	protected $status;

	/**
	*@var string
	*
	*/

	protected $cpf;

	/**
	*@var string
	*
	*/

	protected $senha;

    /**
     *@var int
     *
     */

    protected $cargo;


    public function __set($atrib, $value){
        $this->$atrib = $value;
    }

    public function __get($atrib){
        return $this->$atrib;
    }

	public function getArrayCopy()
	{
		return get_object_vars($this);
	}
}
































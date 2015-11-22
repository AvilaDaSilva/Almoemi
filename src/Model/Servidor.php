<?php

namespace Model;

class Servidor extends Pessoa
{

    /**
     *
     *@var string
     */

    protected $table_name = 'servidor';

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
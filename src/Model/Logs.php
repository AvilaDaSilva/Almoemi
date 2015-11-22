<?php

namespace Model;

class Logs
{

    /**
     *
     *@var string
     */

    protected $table_name = 'logs';

    /**
     *@var serial
     *
     */

    protected $id;

    /**
     *@var int
     *
     */

    protected $gerente;

    /**
     *@var int
     *
     */

    protected $servidor;

    /**
     *@var int
     *
     */

    protected $itens;

    /**
     *@var int
     *
     */

    protected $quantidade;


    public function __set($key, $value)
    {
        $this->$key = trim(strip_tags($value));
    }

    public function __get($key)
    {
        return $this->$key;
    }
}
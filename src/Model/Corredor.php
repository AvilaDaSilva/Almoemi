<?php

namespace Model;

class Corredor
{

    /**
     *
     *@var string
     */

    protected $table_name = 'corredor';

    /**
     *@var serial
     *
     */

    protected $id;

    /**
     *@var string
     *
     */

    protected $desc_corredor;


    public function __set($key, $value)
    {
        $this->$key = trim(strip_tags($value));
    }

    public function __get($key)
    {
        return $this->$key;
    }
}
<?php

namespace Model;

class Prateleira
{

    /**
     *
     *@var string
     */

    protected $table_name = 'prateleira';

    /**
     *@var serial
     *
     */

    protected $id;

    /**
     *@var string
     *
     */

    protected $desc_prateleira;


    public function __set($key, $value)
    {
        $this->$key = trim(strip_tags($value));
    }

    public function __get($key)
    {
        return $this->$key;
    }
}
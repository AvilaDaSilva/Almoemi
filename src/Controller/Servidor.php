<?php

namespace Controller;

use \Db\DbAdapter as DbAdapter;

class Servidor
{

    public function indexAction()
    {
        $adapter = new DbAdapter();
        $this->result = $adapter->fetchAll('servidor', "JOIN pessoa ON servidor.matricula = pessoa.matricula");
        var_dump($this->result);exit;
        require '../view/servidor/index.phtml';
    }
    public function saveAction()
    {
        $adapter = new DbAdapter();

        require '../view/servidor/save.phtml';
    }
}

<?php

namespace Controller;

use \Db\DbAdapter as DbAdapter;

class Servidor
{

    public function indexAction()
    {
        $adapter = new DbAdapter();
        $this->result = $adapter->fetchAll('servidor', "JOIN pessoa ON servidor.matricula = pessoa.matricula JOIN cargo ON cargo.id = pessoa.cargo");
        require '../view/servidor/index.phtml';
    }
    public function saveAction()
    {
        $adapter = new DbAdapter();
        $this->cargo = $adapter->fetchAll('cargo');
        $servidor = new \Model\Servidor();
        $pessoa = new \Model\Pessoa();
        $post = $_POST;
        if($post != null && $post != '') {
            $servidor->matricula = $post['matricula'];
            $pessoa->matricula = $post['matricula'];
            $pessoa->nome = $post['nome'];
            $pessoa->status = $post['status'];
            $pessoa->cpf = $post['cpf'];
            $pessoa->senha = $post['senha'];
            $pessoa->cargo = $post['cargo'];
            try {

                $adapter->insert($servidor);
                $adapter->insert($pessoa);
                die('teste');
                $_SESSION['sucesso'] = "Gravado com sucesso";
                header('Location: /servidor');
                exit;
            } catch(\Exception $e) {
                $_SESSION['erro'] = "Falha na gravação";
                header('Location: /servidor/save');
                exit;
            }
        }
        require '../view/servidor/save.phtml';
    }
}

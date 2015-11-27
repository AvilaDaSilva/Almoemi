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
        $post = $_POST;
        if($post != null && $post != '') {
            $servidor->matricula->matricula = $post['matricula'];
            $servidor->matricula = $post['matricula'];
            $servidor->matricula->nome = $post['nome'];
            $servidor->matricula->status = $post['status'];
            $servidor->matricula->cpf = $post['cpf'];
            $servidor->matricula->senha = $post['senha'];
            $servidor->matricula->cargo = $post['cargo'];
            try {
                $adapter->insert($servidor);
                $_SESSION['sucesso'] = "Gravado com sucesso";
                header('Location: /servidor');
                exit;
            } catch(\Exception $e) {
                $_SESSION['erro'] = "Falhar na gravação";
                header('Location: /servidor/save');
                exit;
            }
        }
        require '../view/servidor/save.phtml';
    }
}

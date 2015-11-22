<?php

namespace Controller;

use \Db\DbAdapter as DbAdapter;

class Login
{
    public function indexAction()
    {
        $post = $_POST;
        $adapter = new DbAdapter;
        if($post != '' && $post != null) {
            $result = $adapter->getLogin($post['matricula'], $post['senha']);
            if($result == false) {
                $_SESSION['erro'] = "Login Inválido";
                require '../view/login/index.phtml';//COISA QUE TU QUIZER RETORNAR NA VIEW
                exit;
            }else{
                $_SESSION['nome'] = $result[0]['nome'];
                header('Location: /itens');
            }
        }

        require '../view/login/index.phtml';//OUTRA COISA CASO DE BOSTA
        exit;
    }
}

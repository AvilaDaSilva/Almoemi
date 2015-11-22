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
                require '../view/login/index.phtml';
                exit;
            } else {
                $_SESSION['nome'] = $result[0]['nome'];
                if($result[0]['cargo'] == 1) {
                    $_SESSION['permissao'] = 1;
                } else {
                    $_SESSION['permissao'] = 0;
                }
                header('Location: /itens');
            }
        }

        require '../view/login/index.phtml';//OUTRA COISA CASO DE BOSTA
        exit;
    }
}

<?php

namespace Controller;

use \Db\DbAdapter as DbAdapter;

class Itens
{

    public function indexAction()
    {
        $adapter = new DbAdapter();
        $this->result = $adapter->fetchAll('itens', "JOIN corredor ON itens.corredor = corredor.id JOIN prateleira ON itens.prateleira = prateleira.id");
        require '../view/itens/index.phtml';
    }
    public function saveAction()
    {
        $adapter = new DbAdapter();
        $this->corredor = $adapter->fetchAll('corredor');
        $this->prateleira = $adapter->fetchAll('prateleira');
        $post = $_POST;
        if($post != null && $post != '') {
//                $lala = strripos($post['nome'], "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_");
            $itens = new \Model\Itens();
            $itens->nome = $post['nome'];
            $itens->cod_barra = $post['cod_barras'];
            $itens->quantidade = $post['quantidade'];
            $itens->corredor = $post['corredor'];
            $itens->prateleira = $post['prateleira'];
            try {
                $adapter->insert($itens);
                $_SESSION['sucesso'] = "Gravado com sucesso";
                header('Location: /itens');
                exit;
            } catch(\Exception $e) {
                $_SESSION['erro'] = "Falhar na gravação";
                header('Location: /itens/save');
                exit;
            }
        }
        require '../view/itens/save.phtml';
    }
}

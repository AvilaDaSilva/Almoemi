<?php  
ini_set('error_reporting', E_ALL);  
ini_set('display_errors',1);
ini_set('display_startup_erros',1);

include 'bootstrap.php';  

use Controller\Login as Login;
use Controller\Itens as Itens;
use Controller\Servidor as Servidor;

$login = new Login();
$itens = new Itens();
$servidor = new Servidor();
session_start();
$uri = $_SERVER['REQUEST_URI'];

/* LOGIN */
if($uri == '/login')
{
    $login->indexAction();
}
elseif($uri == '/itens' && $_SESSION['nome'] != ''){
    $itens->indexAction();
}
elseif($uri == '/itens/save' && $_SESSION['nome'] != '' && $_SESSION['permissao'] == 1){
    $itens->saveAction();
}
elseif($uri == '/servidor' && $_SESSION['nome'] != '' && $_SESSION['permissao'] == 1){
    $servidor->indexAction();
}
elseif($uri == '/servidor/save' && $_SESSION['nome'] != '' && $_SESSION['permissao'] == 1){
    $servidor->saveAction();
}
else
{
    header('Status: 404 Not Found');
    echo "<html><body><h1>Page Not Found</h1></body></html>";
}


<?php  
ini_set('error_reporting', E_ALL);  
ini_set('display_errors',1);
ini_set('display_startup_erros',1);

include 'bootstrap.php';  

use Controller\Login as Login;
use Controller\Itens as Itens;

$login = new Login();
$itens = new Itens();
session_start();
$uri = $_SERVER['REQUEST_URI'];

/* LOGIN */
if($uri == '/login')
{
    $login->indexAction();
}
/* Pagina Itens */
elseif($uri == '/itens' && @$_SESSION['nome'] != ''){
    $itens->indexAction();
}
elseif($uri == '/itens/save' && @$_SESSION['nome'] != ''){
    $itens->saveAction();
}
else
{
    header('Status: 404 Not Found');
    echo "<html><body><h1>Page Not Found</h1></body></html>";
}


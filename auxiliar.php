<?php 
error_reporting(E_ALL);
ini_set('display_errors', true);

include_once("controllers/UsuarioControler.php");
$senha = "";
$email = "";
if(isset($_REQUEST['email'])){
    $email = $_REQUEST['email'];
}
if(isset($_REQUEST['senha'])){
    $senha = $_REQUEST['senha'];
}

$user = new UsuarioControler($email, $senha);
$user->validaAcesso();
?>
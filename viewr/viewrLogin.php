<?php include_once("../classes/Usuario.class.php");
    $email = $_REQUEST['email'];
    $senha = $_REQUEST['senha'];
    $usuario = new Usuario($email, $senha);
    $usuario->acessa();
?>
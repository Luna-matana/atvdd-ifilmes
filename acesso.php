<?php
include 'conexao.php'
//dados do usuario da sessão
$email = $_REQUEST['email'];
$senha = $_REQUEST['senha'];

//verificou se há usuario
//lembrar de verificar a senha/usuário do banco
$mysqli = new mysqli('localhost','root','','localdb'); //PDO ??
$query  = "SELECT * FROM funcionario AS func WHERE email='".$email."' AND senha='".$senha."'";
$result = $mysqli->query($query);

//Caso consiga logar cria a sessão
if ($result->fetch_object() > 0) {
    // session_start inicia a sessão
    session_start();     
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
	header('location:adm.php');	
}
//Caso contrário redireciona para a página de autenticação
else {
    //Destrói a sessão
    session_destroy();  
    //Limpa as variáveis
    unset($_SESSION['login']);
    unset($_SESSION['senha']); 

    //fecha as coneções
    $result->close();
    $mysqli->close();
    //Redireciona para a página de autenticação
    header('location:index.php');
}   
?>
<?php include_once("Conexao.class.php");
include 'error.php';

//dados do usuario da sessão
$email = $_REQUEST['email'];
$senha = $_REQUEST['senha'];

//PDO:
$db = new Conexao();
$conecta = $db->get_conexao();
$result = $conecta->query("SELECT * FROM funcionario AS func WHERE email='".$email."' AND senha='".$senha."'");

//Caso consiga logar cria a sessão
if($result->fetch(PDO::FETCH_OBJ)>0){
    // session_start inicia a sessão
    session_start();     
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
	header('location:../adm.php');
} 
//Caso contrário redireciona para a página de autenticação
else {
    header('location:../index.php');
}
?>
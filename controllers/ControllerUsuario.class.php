<?php include_once("../models/ModelUsuario.php");

 class Usuario{
    private $email;
    private $senha;

    function __construct($email, $senha){
        $this->email = $email;
        $this->senha = $senha;
        $this->acessa();
        echo "aaaaa";
    }

    function acessa(){
        $user = new Usuario($this->email, $this->senha);
        $user->acessa();
    }
}
/*
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
}*/
?>
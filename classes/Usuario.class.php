<?php include_once("Conexao.class.php");
include 'error.php';

 class Usuario{
    private $email;
    private $senha;
    private $con;

    function __construct($email, $senha){
        $this->email = $email;
        $this->senha = $senha;
        $this->con = new Conexao();
    }

    function acessa(){
        $query = "SELECT * FROM funcionario AS func WHERE email='".$this->email."' AND senha='".$this->senha."'";
        $result = $this->con->executaQuery($query);
        //Caso consiga logar cria a sessão
        if($result->fetch(PDO::FETCH_OBJ)>0){
            // session_start inicia a sessão
            session_start();     
            $linha = $result->fetch(PDO::FETCH_OBJ);
            $_SESSION['login'] = $this->email;
            $_SESSION['senha'] = $this->senha;
            header('location:../adm.php');
        } 
        //Caso contrário redireciona para a página de autenticação
        else {
            header('location:../index.php');
        }
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
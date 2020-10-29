<?php
Class ModelUsuario{
    private $email = "";
    private $senha = "";
    private $conexao;

    public function __construct($sen, $em)
    {
        $this->email = $em;
        $this->senha = $sen;
        if(is_null($this->conexao)){
            $this->conexao = Conexao::getConection();
        }
    }

    public function acessa(){
        $stmt = $this->conexao->prepare("SELECT * FROM funcionario AS func WHERE email=\'?\' AND senha=\'?\'");
        $stmt->bindParam(1, $this->email);
        $stmt->bindParam(2,$this->senha);
        /*$query = "SELECT * FROM funcionario AS func WHERE email='".$this->email."' AND senha='".$this->senha."'";*/
        if($stmt->execute()){
            if($row = $stmt->fetch(PDO::FETCH_OBJ)>0){
                // session_start inicia a sessão
            session_start();     
            $linha = $stmt->fetch(PDO::FETCH_OBJ);
            $_SESSION['login'] = $this->email;
            $_SESSION['senha'] = $this->senha;
            header('location:../adm.php');
            }//Caso contrário redireciona para a página de autenticação
            else {
                header('location:../index.php');
            }
        }
    }


}
?>
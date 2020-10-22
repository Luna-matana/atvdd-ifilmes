<?php
include_once("Conexao.class.php");


class Funcoes{
    private $con;
    private $legenda = "";
    private $action = "";
    private $titulofilme = "";
    private $sinopse = "";
    private $quantidade = "";
    private $trailer = "";

    function __construct(){
        //inicia sessão  
        session_start();
        $this->con = new Conexao();
        
        //Caso o usuário não esteja autenticado, limpa os dados e redireciona
        if ( !isset($_SESSION['login']) and !isset($_SESSION['senha']) ) {    
        session_destroy(); //Destrói a sessão

        //Limpa
        unset ($_SESSION['login']);
        unset ($_SESSION['senha']);

        //Redireciona para a página de autenticação
        header('location:index.php');	
        }
        //acesso ao banco e tabelas do sistema
        if(!isset($_REQUEST['codigo'])){
            $this->action = "inserir_filme.php";
            $this->legenda = "Incluir";
            $this->titulofilme = "";
            $this->sinopse     = "";
            $this->quantidade  = "";
            $this->trailer     = "";
        } else {     
            $this->action = "alterar_filme.php?codigo=".$_REQUEST['codigo'];
            $this->legenda = "Alterar";
            $query = "SELECT * FROM filme WHERE codigo = ".$_REQUEST['codigo'];
            $conecta = $this->con->get_conexao();     
            $result = $conecta->query($query);
            $linha = $result->fetch(PDO::FETCH_OBJ);
            $this->titulofilme = $linha->titulo;
            $this->sinopse     = $linha->sinopse;
            $this->quantidade  = $linha->quantidade;
            $this->trailer     = $linha->trailer;  
        } 
    }
    function getLegenda(){
        return $this->legenda;
    }

    function getTitulo(){
        return $this->titulofilme;
    }

    function getAction(){
        return $this->action;
    }

    function getSinopse(){
        return $this->titulofilme;
    }

    function getQuantidade(){
        return $this->quantidade;
    }

    function getTrailer(){
        return $this->trailer;
    }

    function imprimeFilmes(){
        global $mysqli; //chamando variavem global de conexao.php
        $query = "SELECT * FROM filme";    
        $conecta = $this->con->get_conexao();                      
        $result = $conecta->query($query);
        while($linha = $result->fetch(PDO::FETCH_OBJ)){        
            echo '<tr> 
            <td scope="row">'.$linha->titulo.'</td>
            <td><a class="btn btn-warning" href="adm.php?codigo='.$linha->codigo.'" role="button">Alterar</a></td>
            <td><a class="btn btn-success" href="imprimir_filme.php?opcao=2&codigo='.$linha->codigo.'" role="button" target="_blank">Imprimir</a></td>
            <td><a class="btn btn-danger" href="excluir_filme.php?codigo='.$linha->codigo.'" role="button">Excluir</a></td>
            </tr>';
        }
    }
}

?>
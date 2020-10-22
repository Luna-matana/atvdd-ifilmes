<?php
include_once("Conexao.class.php");
include_once("error.php");


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
        } else {
            $this->retornaFilmes();
        }

    }

    function retornaFilmes(){
        //acesso ao banco e tabelas do sistema
        if(!isset($_REQUEST['codigo'])){
            $this->action = "inserir_filme.php";
            $this->legenda = "Incluir";
            $this->titulofilme = "";
            $this->sinopse     = "";
            $this->quantidade  = "";
            $this->trailer     = "";
        } else {     
            $this->action = "viewr/viewrAltera.php?codigo=".$_REQUEST['codigo'];
            $this->legenda = "Alterar";
            $query = "SELECT * FROM filme WHERE codigo = ".$_REQUEST['codigo'];    
            $result = $this->con->executaQuery($query);
            $linha = $result->fetch(PDO::FETCH_OBJ);
            $this->titulofilme = $linha->titulo;
            $this->sinopse     = $linha->sinopse;
            $this->quantidade  = $linha->quantidade;
            $this->trailer     = $linha->trailer;  
        }
    }

    function imprimeFilmes(){
        $query = "SELECT * FROM filme";    
        //$conecta = $this->con->get_conexao();                      
        //$result = $conecta->query($query);
        $result = $this->con->executaQuery($query);
        while($linha = $result->fetch(PDO::FETCH_OBJ)){        
            echo '<tr> 
            <td scope="row">'.$linha->titulo.'</td>
            <td><a class="btn btn-warning" href="adm.php?codigo='.$linha->codigo.'" role="button">Alterar</a></td>
            <td><a class="btn btn-success" href="imprimir_filme.php?opcao=2&codigo='.$linha->codigo.'" role="button" target="_blank">Imprimir</a></td>
            <td><a class="btn btn-danger" href="viewr/viewrExclui.php?codigo='.$linha->codigo.'" role="button">Excluir</a></td>
            </tr>';
        }
    }

    function excluirFilme($cod){
        $codigo	= $_REQUEST['codigo'];	
        //query
        $query = "DELETE FROM filme WHERE codigo=".$codigo;
        $this->con->exclui($query);
        header('Location:../adm.php');		
    }

    function alterafilme($query){

            $result = $this->con->executaQuery($query);
            if($result){ echo "<br/>Dados alterados com sucesso.<br/>";	} 
            else { echo "<br/>Erro ao alterar dados.<br/>"; }
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
        return $this->sinopse;
    }

    function getQuantidade(){
        return $this->quantidade;
    }

    function getTrailer(){
        return $this->trailer;
    }
}
?>
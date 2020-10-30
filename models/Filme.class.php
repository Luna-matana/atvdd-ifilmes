<?php include_once("Conexao.php");
class Filme{
    private $legenda = "";
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

    private function retornaFilmes(){
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

    public function imprimeFilmes(){
        //$query = "SELECT * FROM filme"; 
        $con = (new Conexao())->get_conexao();

        $resultado = $con->prepare("SELECT * FROM filme");
        $resultado->execute();
        while($linha = $resultado->fetch(PDO::FETCH_OBJ)){        
            echo '<tr> 
            <td scope="row">'.$linha->titulo.'</td>
            <td><a class="btn btn-warning" href="adm.php?codigo='.$linha->codigo.'" role="button">Alterar</a></td>
            <td><a class="btn btn-success" href="viewr/viewrImprime.php?opcao=2&codigo='.$linha->codigo.'" role="button" target="_blank">Imprimir</a></td>
            <td><a class="btn btn-danger" href="viewr/viewrExclui.php?codigo='.$linha->codigo.'" role="button">Excluir</a></td>
            </tr>';
        }
    }

    public function getLegenda(){
        return $this->legenda;
    }

    public function getTitulo(){
        return $this->titulofilme;
    }

    public function getAction(){
        return $this->action;
    }

    public function getSinopse(){
        return $this->sinopse;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }

    public function getTrailer(){
        return $this->trailer;
    }
}
?>
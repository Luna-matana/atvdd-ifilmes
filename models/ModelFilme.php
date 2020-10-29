<?php
include_once("Conexao.php");
class ModelFilme{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConection();
    }

    public function salvaFilme($dados){

    }

    public function excluiFilme($id){

    }

    public function getById($id){

    }

    public function all(){
        $resultado = $this->conexao->query("SELECT * FROM filme");
        while($linha = $resultado->fetch(PDO::FETCH_OBJ)){
            echo '<tr> 
            <td scope="row">'.$linha->titulo.'</td>
            <td><a class="btn btn-warning" href="adm.php?codigo='.$linha->codigo.'" role="button">Alterar</a></td>
            <td><a class="btn btn-success" href="viewr/viewrImprime.php?opcao=2&codigo='.$linha->codigo.'" role="button" target="_blank">Imprimir</a></td>
            <td><a class="btn btn-danger" href="viewr/viewrExclui.php?codigo='.$linha->codigo.'" role="button">Excluir</a></td>
            </tr>';
        }
    }
}

?>
<?php
include_once("Conexao.php");

class Cliente{
    private $con;

    function __construct(){
        $this->con = new Conexao();
    }

    public function listaClientes(){
        $resultado = $this->con->get_conexao()->prepare("SELECT * FROM cliente");
        $resultado->execute();
        while($linha = $resultado->fetch(PDO::FETCH_OBJ)){        
            echo '<tr> 
            <td scope="row">'.'<h4>Nome</h4> </td> <td scope="row">'.'<h4>CPF</h4></td> <td scope="row">'.'<h4>Telefone</h4></td> <td scope="row">'.'<h4>Endereço</h4></td> <td scope="row">'.'<h4>E-mail</h4></td> </tr><tr> 
            <td scope="row">'.$linha->nome.'</td> <td scope="row">'.$linha->cpf.'</td> <td scope="row">'.$linha->telefone.'</td> <td scope="row">'.$linha->endereco.'</td> <td scope="row">'.$linha->email.'</td> </tr>
            <tr> <td><a class="btn btn-warning" href="adm.php?codigo='.$linha->codigo.'" role="button">Alterar</a></td>
            <td><a class="btn btn-success" href="auxiliar.php?opcao=2&codigoImp='.$linha->codigo.'" role="button" target="_blank">Imprimir</a></td>
            <td><a class="btn btn-danger" href="auxiliar.php?codigo='.$linha->codigo.'" role="button">Excluir</a></td>
            </tr>';
        }
    }
}
?>
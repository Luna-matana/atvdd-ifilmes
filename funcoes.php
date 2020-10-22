<?php
include 'conexao.php';
//inicia sessão  
session_start();
 
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
    $action = "inserir_filme.php";
    $legenda = "Incluir";
    $titulofilme = "";
    $sinopse     = "";
    $quantidade  = "";
    $trailer     = "";
 } else {     
    $action = "alterar_filme.php?codigo=".$_REQUEST['codigo'];
    $legenda = "Alterar";
    $query = "SELECT * FROM filme WHERE codigo = ".$_REQUEST['codigo'];     
    $result = $mysqli->query($query);
    $linha = $result->fetch_object();
    $titulofilme = $linha->titulo;
    $sinopse     = $linha->sinopse;
    $quantidade  = $linha->quantidade;
    $trailer     = $linha->trailer;  
} 

function imprimeFilmes(){
    global $mysqli; //chamando variavem global de conexao.php
    $query = "SELECT * FROM filme";                          
    $result = $mysqli->query($query);
    while($linha = $result->fetch_object()){        
        echo '<tr> 
        <td scope="row">'.$linha->titulo.'</td>
        <td><a class="btn btn-warning" href="adm.php?codigo='.$linha->codigo.'" role="button">Alterar</a></td>
        <td><a class="btn btn-success" href="imprimir_filme.php?opcao=2&codigo='.$linha->codigo.'" role="button" target="_blank">Imprimir</a></td>
        <td><a class="btn btn-danger" href="excluir_filme.php?codigo='.$linha->codigo.'" role="button">Excluir</a></td>
        </tr>';
    }
}
?>
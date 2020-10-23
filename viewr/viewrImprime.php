<?php
//include_once("../classes/error.php");
include_once("../classes/Impressao.class.php");

$imprime = new Impressao();
$opcao = $_GET['opcao'];

if($opcao == 1){
    $imprime->imprimeTodos();
} else if($opcao==2){
    $codigo = $_GET['codigo'];
    $imprime->imprimeById($codigo);
} else {
    //echo "Opção não válida ou variável não setada";
}
?>
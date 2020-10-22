<?php include_once("../classes/Funcoes.class.php");
include_once("../classes/error.php");
    $func = new Funcoes();
    if(isset($_REQUEST['codigo'])){//dados do filme a ser inserido 
        $codigo	= $_REQUEST['codigo'];
        $func->excluirFilme($codigo);
    }
?>
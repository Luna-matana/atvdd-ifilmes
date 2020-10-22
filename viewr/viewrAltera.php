<?php include_once("../classes/Funcoes.class.php");
include_once("../classes/error.php");
    $func = new Funcoes();
    if(isset($_REQUEST['codigo'])){
        $titulo 	= $_REQUEST['titulofilme'];
        $sinopse	= $_REQUEST['sinopse'];
        $quantidade = $_REQUEST['quantidade'];
        $trailer	= $_REQUEST['trailer'];
        $codigo		= $_REQUEST['codigo'];
        $query = "UPDATE filme SET titulo='$titulo', sinopse='$sinopse',quantidade='$quantidade',trailer='$trailer' where codigo=".$codigo;
        echo $query;
        $func->alterafilme($codigo);
    }
?>
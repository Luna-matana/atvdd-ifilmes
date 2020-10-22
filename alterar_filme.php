<?php
//acesso ao banco
include 'conexao.php';	
//testa se foi enviado algum dado para esta pagina
if(isset($_REQUEST['codigo'])){
	$titulo 	= $_REQUEST['titulofilme'];
	$sinopse	= $_REQUEST['sinopse'];
	$quantidade = $_REQUEST['quantidade'];
	$trailer	= $_REQUEST['trailer'];
	$codigo		= $_REQUEST['codigo'];
	//query para atualizar o dado
	$query = "UPDATE filme SET titulo='$titulo', sinopse='$sinopse',quantidade='$quantidade',trailer='$trailer' where codigo=".$codigo;
	$result = $mysqli->query($query);
	if($result){ echo "<br/>Dados alterados com sucesso.<br/>";	} 
	else { echo "<br/>Erro ao alterar dados.<br/>"; }
	$mysqli->close();
	header('Location:adm.php'); //retorna para página do adm
} else{//caso não tenha nenhum dado!
	header("Location:adm.php");
}
?>
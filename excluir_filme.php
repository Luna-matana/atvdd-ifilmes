<?php  
//acesso ao banco
include 'conexao.php';

if(isset($_REQUEST['codigo'])){//dados do filme a ser inserido 
	$codigo	= $_REQUEST['codigo'];	
	//query
	$query = "DELETE FROM filme WHERE codigo=".$codigo;

	$result = $mysqli->query($query);		
	$mysqli->close();

	header('Location:adm.php');		
} else{ //caso não tenha nenhum dado!
	header("Location:adm.php");
}
?>
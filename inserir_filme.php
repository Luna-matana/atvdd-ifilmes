<?php
    //acesso ao banco
    include 'conexao.php';
    
    //dados do filme a ser inserido
    $titulo 	=	$_REQUEST['titulofilme'];
	$sinopse	=	$_REQUEST['sinopse'];
	$quantidade =	$_REQUEST['quantidade'];
	$trailer	=	$_REQUEST['trailer'];
	$codigo		=	"DEFAULT";

	$query = "INSERT INTO filme(codigo,titulo,sinopse,quantidade,trailer) VALUES (".$codigo.",'".$titulo."','".$sinopse."','".$quantidade."','".$trailer."')";
	
	$result = $mysqli->query($query);
	if($result){
		echo "<br/>Dados inseridos com sucesso.<br/>";
	} else {
		echo "<br/>Erro ao inserir dados.<br/>";
	}
	$mysqli->close();
	header('Location:adm.php');
?>
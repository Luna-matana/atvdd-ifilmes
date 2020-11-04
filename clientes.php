<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

include_once("controllers/ClienteControler.php");
$cliente = new ClienteControler();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>IFilmes</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <!--[if lt IE 9]>
  <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link href="css/styles.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid"> <!-- Bootstrap, usado para o container fluir com o tamanho da janela e/ou com mobile -->
<div class="row">

  <!-- nav -->    	
  <div class="column-sm-4"> 
   <?php include "sidebar.php"; ?> <!-- Barra lateral-->
  </div>
  <!-- formulario -->
    <div class="column col-sm-7">
        <div class="container-fluid">  
            <div class="page-header text-muted divider">
            Clientes Cadastrados
            </div>
        </div>    


        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col" class="col-sm-3">Clientes</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                    <?php                       
                        $cliente->getClientes();  //Lista filmes no banco    
                    ?>   
                </tbody>                     	
        </table>


    

    <?php include "rodape.php"; ?>
    </div> <!-- /col-7 --> 
  </div>  <!-- /row --> 
 </div>  <!-- /container-fluid -->    
  <!-- script references -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>
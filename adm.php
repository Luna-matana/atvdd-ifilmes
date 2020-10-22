<?php
 include 'classes/Conexao.class.php'; 
 include "funcoes.php";  
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
    <div class="page-header text-muted">Filmes </div>
      <form class="form-horizontal" action="<?php echo $action; ?>" method="post"> 
        <fieldset>
          <!-- Form Name -->
          <legend><?php echo $legenda; ?> Filme</legend>

          <!-- Text input-->
          <div class="form-group">
            <label for="titulofilme">Filme</label>
            <input type="text" class="form-control" id="titulofilme" name="titulofilme" value="<?php echo $titulofilme; ?>" >
          </div>
          <!-- Textarea -->
          <div class="form-group">
            <label for="sinopse">Sinopse</label>
            <textarea id="sinopse" name="sinopse"> <?php echo $sinopse; ?>  </textarea>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="text" class="form-control" id="quantidade" name="quantidade" value="<?php echo $quantidade; ?>"  class="input-xxlarge">
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label for="trailer">Trailer</label>
            <input type="text" class="form-control" id="trailer" name="trailer" value="<?php echo $trailer; ?>"  class="input-xxlarge">
          </div> 
          <!-- Button -->
          <div class="form-group">
            <input name="enviar" id="enviar" type="submit" value="Enviar"  class="btn btn-primary " />
          </div>
        </fieldset>
      </form>  
  <!-- /formulario -->

  <!-- lista -->
  <div class="container-fluid">  
    <div class="page-header text-muted divider">
      Filmes Cadastrados
    </div>
  </div>
  
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col" class="col-sm-3">Filme</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
      <?php                       
        imprimeFilmes();  //Lista filmes no banco    
      ?>   
    </tbody>                     	
  </table>                      
  <hr>
    <a class="btn btn-info" href="<?php echo "imprimir_filme.php?opcao=1"; ?>" role="button">Imprimir Listagem de Filmes</a>  
  <hr>
  <!-- /lista -->
  <hr />
  <!-- rodape -->    	
  <?php include "rodape.php"; ?>
  </div> <!-- /col-7 --> 
  </div>  <!-- /row --> 
 </div>  <!-- /container-fluid -->    
  <!-- script references -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>
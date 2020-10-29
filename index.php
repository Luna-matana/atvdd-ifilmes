
<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

spl_autoload_register(function($class) {
    if (file_exists("$class.php")) {
        require_once "$class.php";
        return true;
    }
});
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>IFilmes</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<title>IFilmes</title>	
		<?php include_once("controllers/ControllerUsuario.class.php");
			$controlador = New Usuario();
		?>	
	</head>
<body>

	<?php
        if ($_GET) {
            $controller = isset($_GET['controller']) ? ((class_exists($_GET['controller'])) ? new $_GET['controller'] : NULL ) : null;
            $method     = isset($_GET['method']) ? $_GET['method'] : null;
            if ($controller && $method) {
                if (method_exists($controller, $method)) {
                    $parameters = $_GET;
                    unset($parameters['controller']);
                    unset($parameters['method']);
                    call_user_func(array($controller, $method), $parameters);
                } else {
                    echo "Método não encontrado!";
                }
            } else {
                echo "Controller não encontrado!";
            }
        } else {
            echo '<h1>Contatos</h1><hr><div class="container">';
            echo 'Bem-vindo ao aplicativo MVC Contatos! <br /><br />';
            echo '<a href="?controller=ContatosController&method=listar" class="btn btn-success">Vamos Começar!</a></div>';
        }
    ?>
	<img src="images/marca.png" >
<?php
	include 'login.php';
	include 'rodape.php';
?>
	
</body>

</html>
<?php
   //finalizar sessão
    session_destroy();
    //Redireciona para a página de autenticação
    header('location:../index.php');
?>
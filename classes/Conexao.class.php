<?php
//include 'error.php';
class Conexao{
    private $con;

    function get_conexao(){
        try {
        $this->con = new PDO("mysql:host=localhost;dbname=localdb", "root", "holy2905");
        } catch (PDOException $erro) {
                echo $erro -> getMessage();
        }
        return $this->con;
    }

    function executaQuery($query){
        $conec = $this->get_conexao();
        return $conec->query($query);
    }

    function exclui($query){
        $conec = $this->get_conexao();
        $conec->query($query);
    }
}


?>
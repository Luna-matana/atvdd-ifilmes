<?php
include 'error.php';
class Conexao{

    public function get_conexao(){
        try {
        $con = new PDO("mysql:host=localhost;dbname=localdb", "root", "holy2905");
        } catch (PDOException $erro) {
                echo $erro -> getMessage();
        }
        return $con;
    }
}


?>
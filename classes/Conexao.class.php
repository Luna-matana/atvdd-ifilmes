<?php
class Conexao{
    private $user = "root";
    private $password = "holy2905";
    private $db = "mysqli:";
    private $host="host=localhost";
    private $dbNome = "dbname=localdb";
    private $conexao = "";

    public function get_conexao(){
        try {
        $conexao = new PDO("mysql:host=localhost;dbname=localdb", "root", "holy2905");
        } catch (PDOException $erro) {
                echo $erro -> getMessage();
        }
        return $conexao;
    }
}


?>
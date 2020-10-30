<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
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
}
?>
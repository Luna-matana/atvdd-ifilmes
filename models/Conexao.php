<?php
Class Conexao{
    private static $conexao;

    private function __construct(){

    }

    public static function getConection(){
        if(is_null(self::$conexao)){
            self::$conexao = new PDO("mysql:"."host=localhost;"."dbname=localdb"."root"."holy2905");
            self::$conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$conexao->exec('set names utf8');
        }
        return self::$conexao;
    }
}
?>
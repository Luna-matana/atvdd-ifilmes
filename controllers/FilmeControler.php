<?php
include_once("models/Filme.class.php");
class FilmeControler{

    private $filme;

    function __construct(){
        $this->filme = new Filme();
    }

    public function imprimeFilmes(){
        $this->filme->imprimeFilmes();
    }

    function getLegenda(){
        return $this->filme->getLegenda();
    }

    function getTitulo(){
        return $this->filme->getTitulo();
    }

    function getAction(){
        return $this->filme->getAction();
    }

    function getSinopse(){
        return $this->filme->getSinopse();
    }

    function getQuantidade(){
        return $this->filme->getQuantidade();
    }

    function getTrailer(){
        return $this->filme->getTrailer();
    }
}
?>
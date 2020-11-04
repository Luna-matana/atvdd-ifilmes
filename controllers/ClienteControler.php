<?php
include_once("models/Cliente.class.php");
class ClienteControler{

    private $cliente;

    function __construct(){
        $this->cliente = new Cliente();
    }

    public function getClientes(){
        $this->cliente->listaClientes();
    }

    public function getClienteById($id){

    }
}
?>
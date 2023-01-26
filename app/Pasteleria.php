<?php
namespace app;

use util\DulceNoEncontradoException;
use util\ClienteNoEncontradoException;
use util\LogFactory;

include_once("autoload.php");
include_once("Bollo.php");
include_once("Chocolate.php");
include_once("Tarta.php");

    class Pasteleria{
        private $log;
        private $clientes = array();
        private $productos = array();
        
        public function __construct(
            private string $nombre,
        ) {
        $this->log = LogFactory::getLogger();
        }
        private function incluirProducto(Dulces $dulce){
            $this->productos[] = $dulce;
        }
        function incluirTarta($nombre,$precio,$rellenos,$numPisos,$maxNumComensales,$minNumComensales=2){
            $tarta = new Tarta($nombre,$this->getNumProductos(),$precio,$rellenos,$numPisos,$maxNumComensales,$minNumComensales);  
            $this->incluirProducto($tarta);
        }

        function incluirChocolate($nombre,$precio,$porcentajeCacao,$peso){
            $chocolate = new Chocolate($nombre,$this->getNumProductos(),$precio,$porcentajeCacao,$peso); 
            $this->incluirProducto($chocolate);
        }

        function incluirBollo($nombre,$precio,$relleno){
            $bollo = new Bollo($nombre,$this->getNumProductos(),$precio,$relleno); 
            $this->incluirProducto($bollo); 
        }
        function incluirCliente($nombre,$numero,$numDulcesComprados){
            $cliente = new Cliente($nombre,$numero,$numDulcesComprados);
            $this->clientes[] = $cliente;
        }
        function listarProductos(){
            echo "<br>";
            foreach ($this->productos as $key) {
                print_r($key);
                echo "<br>";
            }
        }
        function listarClientes(){
            echo "<br>";
            foreach ($this->clientes as $key) {
                print_r($key);
                echo "<br>";
            }
        }

        public function getNumProductos()
        {
            return count($this->productos);
        }
        public function getNumCliente()
        {
            return count($this->clientes);
        }
        public function comprarClienteProducto($numCliente,$numDulce)
        {
            $saveCliente = "";
            $dulce = "";
            try {
                foreach ($this->clientes as $key => $obj) {
                    if ($obj->getNumero() == $numCliente) {
                        $saveCliente = $obj;
                            foreach ($this->productos as $value => $prod) {
                        
                                if ($prod->getNumero() == $numDulce) {
                                    $dulce = $prod;
                                    $saveCliente->comprar($dulce);
                                    return $this;
                                }
                            }
                            if($dulce == null){
                                $this->log->warning("El dulce no se ha encontrado",[$numDulce]);
                                throw new DulceNoEncontradoException();
                            }
                    }
                }
                if ($saveCliente == "") {
                    $this->log->alert("El cliente no se ha encontrado",[$this->getNumCliente()]);
                    throw new ClienteNoEncontradoException();
                }
            } catch (ClienteNoEncontradoException $e) {
                echo $e->getMessage();
            } catch (DulceNoEncontradoException $e) { 
                echo $e->getMessage();
            }
            return $this;
        }

            /**
             * Get the value of nombre
             */ 
            public function getNombre()
            {
                        return $this->nombre;
            }
    }
?>
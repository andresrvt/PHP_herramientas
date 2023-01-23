<?php
namespace app;

use PHP_herramientas\util\DulceNoEncontradoException;
use PHP_herramientas\util\ClienteNoEncontradoException;
include_once("autoload.php");
include_once("Bollo.php");
include_once("Chocolate.php");
include_once("Tarta.php");

    class Pasteleria{
        private $clientes = array();
        private $productos = array();
        private int $numProductos = $this->getNumProductos();

        public function __construct(
            private string $nombre,
            private int $numClientes,
        ) {
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
        public function comprarClienteProducto(int $numeroCliente, int $numeroDulce)
        {
            $saveCliente = "";
            $dulce = "";
            try {
                foreach ($this->clientes as $key => $obj) {
                    if ($obj->getNumero() == $numeroCliente) {
                        $saveCliente = $obj;
                            foreach ($this->productos as $value => $prod) {
                        
                                if ($prod->getNumero() == $numeroDulce) {
                                    $dulce = $prod;
                                    $saveCliente->comprar($dulce);
                                    return $this;
                                }
                            }
                            if($dulce == null){
                                throw new DulceNoEncontradoException();
                            }
                    }
                }
                if ($saveCliente == "") {
                    throw new ClienteNoEncontradoException();
                }
            } catch (ClienteNoEncontradoException $e) {
                echo $e->getMessage();
            } catch (DulceNoEncontradoException $e) { 
                echo $e->getMessage();
            }
            return $this;
        }
    }
?>